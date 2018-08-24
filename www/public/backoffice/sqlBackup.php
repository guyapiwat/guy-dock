<?
//require_once(dirname(__FILE__)."/connectSql.php");
class sqlBackup{
	private $dumpDir;
	private $dumpName = "backup";
	private $attr   = array('COMPRESS'=>"none",'DROP'=>true,'TABLE'=>false,'DATA'=>true,'FIXDB'=>false,'INDEX'=>true);
	private $buff	= 65536;
	public function __construct(){
	//	parent::__construct();
	}
	public function dump_dir($dir){
		$this->dumpDir = $dir;
	}
	public function dump_name($name){
		$this->dumpName = $name;
	}
	public function dump_attr($compress,$drop,$data,$lockdb){
		$this->attr = array('COMPRESS'=>$compress,'TABLE'=>false,'DROP'=>$drop,'DATA'=>$data,'FIXDB'=>$lockdb,'INDEX'=>true);
	}
	public function mysql_dump($database){
		set_time_limit(0);
       	$query = '';
	   	$tables = @mysql_list_tables($database);
		while ($row = @mysql_fetch_row($tables)){
			$table_list[] = $row[0];
		}
		for($i=0;$i<@count($table_list);$i++){
			$db = $this->attr['FIXDB']==true?"`".$database."`.":"";
			$results = mysql_query("DESCRIBE ".$db."`".$table_list[$i]."`");
			$query .= "DROP TABLE IF EXISTS ".$db."`".$table_list[$i]."`;"."\n";
			$query .= "\n"."CREATE TABLE ".$db."`".$table_list[$i]."` ("."\n";
          	$tmp = "";
          	while ($row = @mysql_fetch_assoc($results)){
            	$query .= "`".$row['Field']."` ".$row['Type'];
             	if ($row['Null'] != 'YES'){
 					$query .= " NOT NULL";
 				}
				if ($row['Default'] != ''){
 					$query .= " DEFAULT '".$row['Default']."'";
 				}
            	if ($row['Extra']){
 					$query .= " ".strtoupper($row['Extra']);
 				}
            	if ($row['Key'] == 'PRI'){
 					$tmp .= "`".$row['Field']."`,";
 				}
            	 $query .= ","."\n";
          	}
			if($tmp==''){
				$query = trim($query,","."\n");
			}else{
				$query .= "PRIMARY KEY(".trim($tmp,",").")";
			}
			$query .= "\n".");".str_repeat("\n", 2);
			if($this->attr['INDEX']==true){
				$results 	= mysql_query("SHOW INDEX FROM ".$db."`".$table_list[$i]."`");
				$old_key 	= "";
				$col_list	= array();
				while ($row = @mysql_fetch_assoc($results)){
					if($row['Key_name']=='PRIMARY') continue;
					if($old_key!=$row['Key_name']){
						unset($col_list);
						$query .= "ALTER TABLE ".$db."`".$table_list[$i]."` ";
						$query .= "ADD INDEX `".$row['Key_name']."` (`".$row['Column_name']."`);"."\n";
						$col_list[] = $row['Column_name'];
						$old_key	= $row['Key_name'];
					}else{
						$col_list[] = $row['Column_name'];
						$query .= "ALTER TABLE ".$db."`".$table_list[$i]."` DROP INDEX `".$row['Key_name']."` ,"."\n";
						$query .= "ADD INDEX `".$row['Key_name']."` (`".join("`,`",$col_list)."`);"."\n";
					}
				}
			}
			if($this->attr['DATA']==true){
				$results = mysql_query("SELECT * FROM ".$db."`".$table_list[$i]."`");
				while ($row = @mysql_fetch_assoc($results)){
					$query .= "INSERT INTO ".$db."`".$table_list[$i]."` ";
					$data = Array();
					while (list($key, $value) = @each($row)){
						$data['keys'][] = $key;
						$data['values'][] = addslashes($value);
					}
					if($this->attr['TABLE']==true)
						$query .= "(`".join($data['keys'], "`, `")."`)"."\n";
					$query .= "VALUES ('".join($data['values'], "', '")."');"."\n";
					if(strlen($query)>$this->buff){
						$this->dump_file($query,"a");
						unset($query);
						$query = "";
					}
				}
			}
			$query .= str_repeat("\n", 2);
       	}
		if(strlen($query)>0){
			$this->dump_file($query,"a");
			unset($query);
			$query = "";
		}
    }
	public function dump_file($str,$mode){
		$this->dumpDir = trim($this->dumpDir,'/');
		$this->dumpDir = trim($this->dumpDir,'\\');
		
		if(!is_dir($this->dumpDir)){
			mkdir($this->dumpDir);
		}
		
		switch($this->attr['COMPRESS']){
			case 'gz':
				$name = $this->dumpName.".sql.gz";
				$fp = gzopen($this->dumpDir.'/'.$name,$mode);
				gzwrite($fp,$str);
				gzclose($fp);
				break;
			default :
				$name = $this->dumpName.".sql";
				$fp = fopen($this->dumpDir.'/'.$name,$mode);
				fwrite($fp,$str);
				fclose($fp);
		}
		return $name;
	}
	public function mysql_restore($file){
		$qry = '';
		set_time_limit(0);
		switch($this->attr['COMPRESS']){
			case 'gz' :
				$fp=gzopen($file,'r') or die("can't open file ".$file);			
				while(!gzeof($fp)){	
					$qry .= gzgets($fp);
					if(strpos($qry,';')!==false){
						mysql_query($qry) or die("$qry<br />");
						unset($qry);
						$qry = '';
					}
				}
				gzclose($fp);
				break;
			default :
				$fp  = fopen($file,'r') or die("can't open file ".$file);
				while(!feof($fp)){
					$qry .= fgets($fp);
					if(strpos($qry,';')!==false){
						mysql_query($qry) or die("$qry<br />");
						unset($qry);
						$qry = '';
					}
				}
				fclose($fp);
				break;
		}
    }
}
?>
