<?
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include("prefix.php");
include("connectmysql.php");
//echo $_GET['fchk'];
$flist = explode(',',$_GET['fchk']);
$fval = explode(',',$_GET['fval']);
$fskip = explode(',',$_GET['fskip']);
$fdesc = explode(',',$_GET['fdesc']);
$farglist = explode(',',$_GET['farg']);
$table = $_GET['tb'];
$mcode = $_GET['nchk'];//echo $_GET['nchk'].'=GET[nchk]<br>';
$errmsg = "";
$flag = 0;

for($i=0;$i<sizeof($flist);$i++){ 
	$arglist = explode('-',$farglist[$i]);
	//echo  $flist[$i]."-".$farglist[$i]."--".$fval[$i].",a<br />";
	if($arglist[0]==1 && $fval[$i]==""){ //null
		$errmsg .= "ข้อมูลในช่อง ".$fdesc[$i]." ไม่ได้กรอก</br>";
	}
	if($arglist[1]>0 && strlen($fval[$i])!=$arglist[1] && $fval[$i]!=""){ //size
		$errmsg .= "ข้อมูลในช่อง ".$fdesc[$i]." ต้องมีความยาว ".$arglist[1]." เท่านั้น</br>";
	}
	/*if($arglist[2]==1 && $fval[0]==""){ //format
		$errmsg += "ข้อมูลในช่อง ".$fdesc[$i]." ไม่ได้กรอก</br>";
	}*/
	if($arglist[3]==1 && $fval[$i]!="" && $fval[$i]!=$fskip[$i]){ //duplicate
		if((strlen($fval[$i])>0)&&(strlen($fval[$i])<7)){
			//echo 'wi;tclfff';
			$aa = 7-strlen(trim($fval[$i]));
			for($x=0;$x<$aa;$x++){
				$fval[$i]  = '0'.$fval[$i];
			}
		}
		//echo $fval[$i]."=".$fskip[$i].",b<br />";
		$exlist = explode('#',$flist[$i]);
		$exval = explode('#',$fval[$i]);
		//echo sizeof($exlist);
		if(sizeof($exlist)>=2){
			mysql_query("SET NAMES 'utf8'");
			$sql = "SELECT * FROM ".$dbprefix.$table." WHERE ";
			for($j=0;$j<sizeof($exlist);$j++){
				$sql .= $exlist[$j]."='".$exval[$j]."' ";
				$sql .= $j<sizeof($exlist)-1?" AND ":"";				
			}
			$sql .= " LIMIT 1";
			$rs = mysql_query($sql);
			//echo $sql;
			if(mysql_num_rows($rs)>0)	
				$errmsg .= "ข้อมูลในช่อง ".$fdesc[$i]." มีอยู่ในระบบแล้ว</br>";
			mysql_free_result($rs);
		}else{
			mysql_query("SET NAMES 'utf8'");
			$rs = mysql_query("SELECT * FROM ".$dbprefix.$table." WHERE ".$flist[$i]."='".$fval[$i]."' LIMIT 1");
			//echo "SELECT * FROM ".$dbprefix.$table." WHERE ".$flist[$i]."='".$fval[$i]."' LIMIT 1,c";
			if(mysql_num_rows($rs)>0)	
				$errmsg .= "ข้อมูลในช่อง ".$fdesc[$i]." มีอยู่ในระบบแล้ว</br>";
			mysql_free_result($rs);
		}
	}
	/*if($arglist[4]==1 && $fval[$i]!=""){ //real
		if((strlen($fval[$i])>0)&&(strlen($fval[$i])<7)){
			//echo 'wi;tclfff';
			$aa = 7-strlen(trim($fval[$i]));
			for($x=0;$x<$aa;$x++){
				$fval[$i]  = '0'.$fval[$i];
			}
		}
		mysql_query("SET NAMES 'utf8'");
		$rs = mysql_query("SELECT * FROM ".$dbprefix.$table." WHERE ".$flist[$i]."='".$fval[$i]."' LIMIT 1");
		echo "SELECT * FROM ".$dbprefix.$table." WHERE ".$flist[$i]."='".$fval[$i]."' LIMIT 1,d";
		if(mysql_num_rows($rs)<=0)	
			$errmsg .= "ข้อมูลในช่อง ".$fdesc[$i]." ไม่มีอยู่ในระบบ</br>";
		mysql_free_result($rs);
	}*/
	if($arglist[5]==1){ //loop
		if((strlen($fval[$i])>0)&&(strlen($fval[$i])<7)){
			//echo 'wi;tclfff';
			$aa = 7-strlen(trim($fval[$i]));
			for($x=0;$x<$aa;$x++){
				$fval[$i]  = '0'.$fval[$i];
			}
		}
		if($fval[$i]==$fval[0])
			$errmsg .= "ข้อมูลในช่อง ".$fdesc[$i]." เป็นรหัสตัวเองไม่ได้</br>";
		else{
			$up = $fval[$i];
			mysql_query("SET NAMES 'utf8'");
			while(($up!="")&&(strcmp(trim($up),"X")==0)){
				//echo "SELECT ".$flist[$i]." FROM ".$dbprefix.$table." WHERE ".$flist[0]."='".$up."' LIMIT 1";
				$rs = mysql_query("SELECT ".$flist[$i]." FROM ".$dbprefix.$table." WHERE ".$flist[0]."='".$up."' LIMIT 1");
				//echo "SELECT ".$flist[$i]." FROM ".$dbprefix.$table." WHERE ".$flist[0]."='".$up."' LIMIT 1<br />";
				if(mysql_num_rows($rs)<=0) {
					$errmsg .= "ข้อมูลในช่อง ".$fdesc[$i]." ไม่มีอยู่ในระบบ</br>";
					break;
				}
				$up = mysql_result($rs,0,$flist[$i]);
				//echo trim($up)."--".$fval[0];
				if($up==$fval[0]){
					$errmsg .= "ข้อมูลในช่อง ".$fdesc[$i]." เป็นรหัสที่อยู่ในชั้นล่างกว่า</br>";
					break;
				}
				mysql_free_result($rs);
			}
			//$rs = mysql_query("SELECT * FROM ".$dbprefix.$table." WHERE ".$flist[$i]."='".$up."' LIMIT 1");
			/*if(mysql_num_rows($rs)<=0)	
				$errmsg .= "ข้อมูลในช่อง ".$fdesc[$i]." ไม่มีอยู่ในระบบ</br>";
			mysql_free_result($rs);*/
		}
	}
	//echo $flist[$i];
	//echo $fval[$i];
	//echo $fdesc[$i];
	//print_r($arglist);
	//echo "ทดสอบครั<br />";
	
}

if($errmsg==""){
	if((strlen($mcode)>0)&&(strlen($mcode)<7)){
			//echo 'wi;tclfff';
			$aa = 7-strlen(trim($mcode));
			for($x=0;$x<$aa;$x++){
				$mcode  = '0'.$mcode;
			}
		}
	$sql = "SELECT name_t FROM ".$dbprefix."member WHERE mcode='".$mcode."'";
	//echo $sql;
	mysql_query("SET NAMES 'utf8'");
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		$name_t = mysql_result($rs,0,'name_t');
		$flag = 1;
	}
}

if($errmsg==""){
	if($flag == 0){
		echo "<font color='#009900'>>>>pass<<<</font>";
	}else if($flag == 1){
		echo "pass,".$name_t;
	}
}else{
	echo "<table><tr><td align='left'><font color='#990000'>".$errmsg."</font></td></tr></table>";
}
/*
	echo "0";
else
	echo "1";
*/
?>
