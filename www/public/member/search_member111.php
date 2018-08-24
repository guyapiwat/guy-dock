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
 $id_card=(isset($_POST["value1"])) ? $_POST["value1"] : $_GET["value1"];
 //$value = "0000001";
  $value1 = "";
  //echo $value1.' '.$value;
  //exit;
$sql = " select mcode from ".$dbprefix."member  where id_card = '$id_card' and id > 127 order by id asc limit 0,1";
$result = mysql_query($sql) or die("haha") ;
if(mysql_num_rows($result) > 0){
	$data = mysql_fetch_object($result);
	$value1 = $data->mcode;
}
  if(!empty($value) and (empty($value1) or isLineID($dbprefix,$value,$value1))){
			echo "1111";

  }else{
		echo '1234';
  }
 function isLineID($dbprefix,$value,$testcode){
	 //$value = upline
	 //$testcode = id_card
		
		$sql = "SELECT upa_code FROM ".$dbprefix."member WHERE mcode='$value' LIMIT 1 ";
		$rs = mysql_query($sql);
		
		if($value==$testcode)
			return true;
		if(mysql_num_rows($rs)<=0)
			return false;
		else if(mysql_result($rs,0,'upa_code')!=$testcode)
			return isLineID($dbprefix,mysql_result($rs,0,'upa_code'),$testcode);
		else
			return true;
	}

?>