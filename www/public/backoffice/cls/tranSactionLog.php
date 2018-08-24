<?
	class tranSactionLog{
		private $operation;
		private $table;
		private $field;
		private $oldValue;
		private $newValue;
		private $Condition;
		private $description;
		private $primval;
		private $log_mode;
		private $path;
		
		public function __construct($mode='DB',$path='./logs'){
			//MODE will be <DB,FILE,BOTH>
			$this->log_mode = $mode;
			$this->path		= $path;
		}
		public function str_merge($mstr,$wstr,$str){
        	$strtmp = $str; 
        	do{
                $str = $strtmp;
                $strtmp = str_replace($mstr,$wstr,$strtmp);
        	}while($strtmp != $str);
        	return $str;
		}
		public function SReplace($i,$str,$rep){
			$frontStr = substr($str,0,$i);
			$allowStr = substr($str,$i+1,strlen($str)-$i);
			$str = $frontStr.$rep.$allowStr;
			return $str;
		}
		public function SString($str){
			$en = 0;
			$len = strlen($str);
			for($i=0;$i<$len;$i++){
				if($str[$i] == '#'){
					$en = ($en+1)%2;
				}
				if($en!=0){
					switch($str[$i]){
						case ' ':
							$str = $this->SReplace($i++,$str,"!_");
							$len = strlen($str);
							break;
						case ',':
							$str = $this->SReplace($i++,$str,"!$");
							$len = strlen($str);
							break;
						case '(':
							$str = $this->SReplace($i++,$str,"!<");
							$len = strlen($str);
							break;
						case ')':
							$str = $this->SReplace($i++,$str,"!>");
							$len = strlen($str);
							break;
					}
				}
			}
			return $str;
		}
		public function getPRI($table){
			$rs = mysql_query("SHOW COLUMNS FROM $table ");
			if (!$rs) {
				echo 'Could not run query: ' . mysql_error();
				exit;
			}
			if (mysql_num_rows($rs) > 0) {
				while ($row = mysql_fetch_assoc($rs)) {
					if($row['Key']=='PRI')
						return $row['Field'];
				}
			}
			return '';
		}
		public function reverseCondition($field,$value){
			$flist = explode(",",$field);
			$vlist = explode(",",$value);
			$prim  = $this->getPRI($this->table);
			foreach(array_keys($flist) as $key){
				if($flist[$key]==$prim && $vlist[$key]=='##'){
					return $flist[$key]."=#".$this->primval."#";
				}else{
					return $flist[$key]."=".$vlist[$key];
				}
			}
		}
		public function replaceNullValPRI($field,$value){
			$flist = explode(",",$field);
			$vlist = explode(",",$value);
			$prim  = $this->getPRI($this->table);
			foreach(array_keys($flist) as $key){
				if($flist[$key]==$prim && $vlist[$key]=='##'){
					$vlist[$key] = "#".$this->primval."#";
				}
			}
			return join(",", $vlist);
		}
		public function pprocessTxlog($query){
			$this->qry 	= $query;
			$Value		= "";
			$Condition	= "";
			$Field		= "";
			$this->primval = mysql_insert_id();
			$query = trim($query," ;");
			$query = str_replace("'","#",$query);
			$query = $this->SString($query);
			$query = str_replace("("," ",$query);
			$query = str_replace(")"," ",$query);
			$query = $this->str_merge("  "," ",$query);
			
			$word = explode(" ",$query);
			if(!(strtolower($word[0]) == "update" || strtolower($word[0]) == "delete" || strtolower($word[0]) == "insert")){
				return;
			}
			$this->operation = strtolower($word[0]);
			$isValue = 0;
			$isCondition = 0;
			$isField = 0;
			if(strtolower($word[0])=="update"){
				$this->table = $word[1];
				$this->description = "แก้ไขข้อมูลในตาราง ".$word[1];
			}else if(strtolower($word[0])=="delete" || strtolower($word[0])=="insert"){
				$this->table = $word[2];
				if(strtolower($word[0])=="delete"){
					$this->description = "ลบข้อมูลในตาราง ".$word[2];
				}else if(strtolower($word[0])=="insert"){
					$this->description = "ใส่ข้อมูลในตาราง ".$word[2];
				}
			}
			for($i=0;$i<sizeof($word);$i++){
				if($isValue){
					if(strtolower($word[$i])=="where"){
                                        	$isValue = 0;
                                        	$isCondition = 1;
	                                }else{
						$Value .= $word[$i];
					}
				}else if($isCondition){
					$Condition .= $word[$i]." ";
				}else if($isField){

					$Field .= $word[$i]." ";
				}
				if(strtolower($word[$i])=="set" || strtolower($word[$i])=="values" || strtolower($word[$i])=="value"){
					$isValue = 1;
					$isCondition = 0;
					$isField = 0;
				}else if(strtolower($word[$i])=="where"){
                                       	$isValue = 0;
                                       	$isCondition = 1;
					$isField = 0;
	                        }else if(strtolower($word[0]) == "insert" && $i==2 && (strtolower($word[3]) != "value" && strtolower($word[3]) != "values")){
					$isField = 1;
				}
			}
			if(strtolower($word[0]) == "update"){
				$this->newValue = $this->toValue($Value);
				$this->field = $this->toField($Value);
			}else{
				$this->newValue = $Value;
				$this->field = $Field;
				if(strpos($this->field,"value")!==false)
					$this->field = substr($this->field,0,strpos($this->field,"value"));
				else if(strpos($this->field,"VALUE")!==false)
					$this->field = substr($this->field,0,strpos($this->field,"VALUE"));
				$this->newValue = $this->replaceNullValPRI($this->field,$this->newValue);
			}
			if($this->field==NULL){
				$this->field = "*";
			}
			if(strtolower($word[0])!=="insert"){
				$this->Condition = $Condition;
			}else{
				$this->Condition = $this->reverseCondition($this->field,$this->newValue);
			}
			unset($Field);
			unset($Value);
			if(strtolower($word[0]) == "update" || strtolower($word[0]) == "delete"){
				$sql = "SELECT ".$this->field." FROM ".$this->table." WHERE ".($Condition==''?'1':$Condition);
				$sql = str_replace("#","'",$sql);
				$rs = mysql_query($sql);
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$row = mysql_fetch_assoc($rs);
					foreach(array_keys($row) as $key){
						$Field[] = $key;
						$Value[] = "#".$row[$key]."#";
					}
					$this->oldValue = join(",",$Value);
					$this->field 	= join(",",$Field);
				}
			}
		}
		public function toField($word){
			$field="";
			$word = str_replace(",","=",$word);
			$preField = explode("=",$word);
			for($i=0;$i<sizeof($preField);$i++){
				if($i%2 == 0){
					$field .= $preField[$i];
					if((sizeof($preField)-2) == $i)
						break;
					$field .= ",";	
				}
			}
			return $field;
		}
		public function toValue($word){
			$value="";
			$word = str_replace(",","=",$word);
			$preValue = explode("=",$word);
			for($i=0;$i<sizeof($preValue);$i++){
				if($i%2 == 1){
					$value .= $preValue[$i];
					if((sizeof($preValue)-1) == $i)
						break;
					$value .= ",";	
				}
			}
			return $value;
		}
		public function toReversQuery($id){
			$sql = "SELECT * FROM txlog WHERE query_id='$id' LIMIT 1 ";
			$rs = mysql_query($sql);
			$data = mysql_fetch_assoc($rs);
			if($data['operation']=="update"){
			//echo $data[5];
				$sql = "UPDATE ".$data['tablename']." SET ";
				$field = explode(",",$data['fieldname']);
				$value = explode(",",$data['oldV']);
				$info = "";
				for($i=0;$i<sizeof($field);$i++){
					$info[$i] = $info." ".$field[$i]."='".$value[$i]."'";
				}
				$sql .= join(",",$info)." WHERE ".$data['Condition'];
			}else if(strtolower($data['operation'])=="insert"){
				$sql = "DELETE FROM ".$data['tablename']." WHERE ".$data['Condition'];
			}else if(strtolower($data['operation'])=="delete"){
				$sql = "INSERT INTO ".$data['tablename']." ";
				if($data['fieldname']!='' && $data['fieldname']!='*'){
					$sql .= "(".$data['fieldname'].") ";
				}
				$sql .= "VALUES(".$data['oldV'].")";
			}else if(strtolower($data['operation'])=="special"){
				$sql = $data[4];
			}
			$sql = str_replace("!_"," ",$sql);
			$sql = str_replace("!$",",",$sql);
			$sql = str_replace("!<","(",$sql);
			$sql = str_replace("!>",")",$sql);
			$sql = str_replace("#","'",$sql);
			return $sql;
			
		}
		public function toQuery($id){
			$sql = "SELECT * FROM txlog WHERE query_id='$id' LIMIT 1 ";
			$rs = mysql_query($sql);
			$data = mysql_fetch_assoc($rs);
			if($data['operation']=="update"){
			//echo $data[5];
				$sql = "UPDATE ".$data['tablename']." SET ";
				$field = explode(",",$data['fieldname']);
				$value = explode(",",$data['oldV']);
				$info = "";
				for($i=0;$i<sizeof($field);$i++){
					$info[$i] = $info." ".$field[$i]."='".$value[$i]."'";
				}
				$sql .= join(",",$info)." WHERE ".$data['Condition'];
			}else if(strtolower($data['operation'])=="insert"){
				$sql = "INSERT INTO ".$data['tablename']." ";
				if($data['fieldname']!='' && $data['fieldname']!='*'){
					$sql .= "(".$data['fieldname'].") ";
				}
				$sql .= "VALUES(".$data['newV'].")";
			}else if(strtolower($data['operation'])=="delete"){
				$sql = "DELETE FROM ".$data['tablename']." WHERE ".$data['Condition'];
			}else if(strtolower($data['operation'])=="special"){
				$sql = $data[4];
			}
			$sql = str_replace("!_"," ",$sql);
			$sql = str_replace("!$",",",$sql);
			$sql = str_replace("!<","(",$sql);
			$sql = str_replace("!>",")",$sql);
			$sql = str_replace("#","'",$sql);
			return $sql;
			
		}
			
		public function createTxlog($user_access=''){
			if($this->operation == null){
				return;
			}
			$d = date("Y-m-d");
			$t = date("H:i:s"); 
			if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){ 
				$ip = $_SERVER['REMOTE_ADDR'].":".$_SERVER['HTTP_X_FORWARDED_FOR'];
			}else{ 
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			switch($this->log_mode){
				case 'DB' :
					$sql = "INSERT INTO txlog VALUES('','".$this->operation."','".$this->table."',";
					$sql .= "'".$this->field."','".$this->oldValue."','".$this->newValue."','".$this->Condition."',";
					$sql .= "'".$this->description."','".$d."','".$t."','".$ip."','".$user_access."')";
					//echo $sql."<br />";
					mysql_query($sql);
					break;
				case 'FILE' :
					$fname 	= "log".date("Ymd").".txt";
					$fp		= fopen($this->path."/".$fname,'a+');
					fprintf($fp,"LOG : ".date("Y-m-d H:i:s")." # UID[$user_access] IP[$ip]\n--".$this->qry."\n");
					fclose($fp);
					
					break;
				case 'BOTH' :
					$fname 	= "log".date("Ymd").".txt";
					$fp		= fopen($this->path."/".$fname,'a+');
					fprintf($fp,"LOG : ".date("Y-m-d H:i:s")." # UID[$user_access] IP[$ip]\n--".$this->qry."\n");
					fclose($fp);

					$sql = "INSERT INTO txlog VALUES('','".$this->operation."','".$this->table."',";
					$sql .= "'".$this->field."','".$this->oldValue."','".$this->newValue."','".$this->Condition."',";
					$sql .= "'".$this->description."','".$d."','".$t."','".$ip."','".$user_access."')";
					//echo $sql."<br />";
					mysql_query($sql);
					break;
			}
				
		}
	}
?>
