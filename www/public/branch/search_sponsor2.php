<? session_start();?>
<?
//  ไม่ไปเอาจาก cache
  header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
  header("Last-Modified: ".gmdate( "D, d M Y H:i:s")."GMT");
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  
  //กำหนด header ตอนรับ
  header("content-type: application/x-javascript; charset=TIS-620");

include("prefix.php");
include("connectmysql.php");
 $value=(isset($_POST["value"])) ? $_POST["value"] : $_GET["value"];
 $value1=(isset($_POST["value1"])) ? $_POST["value1"] : $_GET["value1"];
 $dbprefix = "ali_";
 //exit;
if(!empty($value) and isLine($dbprefix,$value,$value1) ){
	$sql  = "SELECT IFNULL(COUNT(sp_code2),0) as c_sp_code2 FROM ali_member ";
	$sql .= "WHERE 1 = 1 and sp_code2 LIKE '%".$value."%' ";
	$rs   = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		$object = mysql_fetch_object($rs);	
		if($object->c_sp_code2 < 5){
			$sql1  = "SELECT mcode,name_t FROM ali_member ";
			$sql1 .= "WHERE 1 = 1 and mcode LIKE '%".$value."%'";
			$rs1   = mysql_query($sql1);
			if(mysql_num_rows($rs1) > 0){
				$object1 = mysql_fetch_object($rs1);	
				echo "YES:".$object1->mcode.":".$object1->name_t;
			}
			else{
				echo "YES";
			}
		}
		else{
			echo "FULL:ใต้ผู้แนะนำรหัส ".$object->sp_code2." เต็ม";
		}
	}
	else{
		echo "NODATA:ไม่อยู่ในสายงาน";
	}
}
else{
	echo "CANNOTFOUND:ไม่อยู่ในสายงาน";
}
 
 
 
function isLine($dbprefix,$scode,$testcode){
	$sql = "SELECT sp_code FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
	$rs = mysql_query($sql);
	//echo $scode.' '.$testcode.'<br>';
	if($scode==$testcode)
		return true;
	if(mysql_num_rows($rs)<=0)
		return false;
	else if(mysql_result($rs,0,'sp_code')!=$testcode)
		return isLine($dbprefix,mysql_result($rs,0,'sp_code'),$testcode);
	else
		return true;
}




?>