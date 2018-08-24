<?
class dirInfor{
	public $dirList;
	public function __construct(){
	}
    public function dir_tree($dir='.'){
        $handle = opendir($dir);
        while(false !== ($readdir = readdir($handle))){
            if($readdir != '.' && $readdir != '..'){
                $path = $dir.'/'.$readdir;
				$output[]['PATH'] = $dir;
                if (is_file($path)) {
                    $output[sizeof($output)-1]['FILE'] = $readdir;
                    $output[sizeof($output)-1]['TYPE'] = "FILE";
                    $output[sizeof($output)-1]['SIZE'] = filesize($path);
					$output[sizeof($output)-1]['TIME'] = date("F d Y H:i:s.", fileatime($path));
                } elseif (is_dir($path)) {
                    $output[sizeof($output)-1]['FILE'] = $readdir.'/';
                    $output[sizeof($output)-1]['TYPE'] = "DIR";
					$output[sizeof($output)-1]['TIME'] = date("F d Y H:i:s.", fileatime($path));
                    $output = array_merge($output, $this->build_tree($path));
                }
            }
        }
        closedir($handle);
		$this->dirList = $output;
		//print_r($output);
        return $output;
    }
	public function getInfoWithOut($without=''){
		$clean = explode(",",$without);
		foreach(array_keys($this->dirList) as $key){
			$clear = false;
			foreach(array_keys($clean) as $skey){
				if(strpos($this->dirList[$key]['FILE'],$clean[$skey])!==false)
					$clear = true;
			}
			if(!$clear)
				$output[] = $this->dirList[$key];
		}
		return $output;
	}
	public function printBackupInfo($backupDir,$list,$dbName,$message){
		echo "<script type=\"text/javascript\">";
		echo "function confirmClick(title,path) {";
		echo "	var input=confirm(title);";
		echo "	if (input) window.location.href=path;";
		echo "}";
		echo "</script>";
		
		echo "<tr>";
		echo "  <td></td>";
		echo "  <td>".$message."</td>";
		echo "</tr>";
		if(sizeof($list) > 0){
			echo "<tr>";
			echo "  <td><th colspan='2' align='center'>".$dbName."";
			echo " <a href='javascript:confirmClick(\"Do you really want to delete all backups of this database?\",\"./index.php?sessiontab=5&sub=1";
			echo "&delall=1\")'>[delete all backups]</a></th></td>";
			echo "</tr>";
			//echo "<tr>";
			//echo "<td></td>";
			//echo "<td>";
			//echo "<table width='100%' border='0'>";
		/*	echo "  <tr align='center' >";
			echo "    <td width='30%'><b>FILE</b></td>";
			echo "    <td width='15%'><b>SIZE(Byte)</b></td>";
			echo "    <td width='25%'><b>DATE</b></td>";
			echo "    <td width='10%'><b>DOWNLOAD</b></td>";
			echo "    <td width='10%'><b>IMPORT</b></td>";
			echo "    <td width='10%'><b>DELETE</b></td>";
			echo "  </tr>";
		*/
			for($i=0;$i<sizeof($list);$i++){
				$totsize +=$list[$i]['SIZE'];
				echo "<tr>";
				echo "  <td  width='40%'>".$list[$i]['FILE']."</td>";
				echo "  <td width='10%' align='right'>".$list[$i]['SIZE']." byte</td>";
				echo "  <td width='20%' align='right'>".$list[$i]['TIME']."</td>";
				echo "  <td width='10%' align='center'><a href='.".$backupDir.$list[$i]['FILE']."'>download</a></td>";
				echo "  <td width='10%' align='center'><a href='./index.php?sessiontab=5&sub=1&imp=".$list[$i]['FILE']."'>import</a></td>";
				echo "  <td width='10%' align='center'><a href='./index.php?sessiontab=5&sub=1&del=".$list[$i]['FILE']."'>delete</a></td>";
				echo "</tr>";
			}
			echo "</table>";
			echo "</td>";
			echo "<td></td>";
			echo "</tr>";
			
			echo "<tr><td colspan='2' height='20'></td></tr>";
			echo "<tr>";
			echo "<td ></td>";
			echo "<td >Total size of all backups: ".$totsize." byte - Last backup built on : ".$list[sizeof($list)-1]['TIME']."</td>";
			echo "</tr>";
		}
	}
}
?>