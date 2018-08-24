<? session_start();?>
<?
  //ไม่ไปเอาจาก cache
  header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
  header("Last-Modified: ".gmdate( "D, d M Y H:i:s")."GMT");
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  
  //กำหนด header ตอนรับ
  header("content-type: application/x-javascript; charset=TIS-620");

include("prefix.php");
include("connectmysql.php");
 $value=(isset($_POST["value"])) ? $_POST["value"] : $_GET["value"];
  //$value = "0000005";
//  if(!empty($value) and isLine($dbprefix,$value,$_SESSION["usercode"])){
if(!empty($value)){
 // $sql = "SELECT name_t";
//  $sql .= " FROM ".$dbprefix."member  where mcode = '%$value%' limit 0,1";
	//	$sql .= " FROM ".$dbprefix."invent  where mcode like '%$value%' limit 0,1";
		$sql = "SELECT inv_code,inv_desc,ewallet,CASE inv_type WHEN '1' THEN 'ศูนย์' WHEN '2' THEN 'โมบาย' END AS inv_type FROM ".$dbprefix."invent where inv_code like '$value' and inv_code <> '".$_SESSION["admininvent"]."' ";

		$result = mysql_query($sql) or die("ระบบไม่สามารถค้นหาได้") ;
		if(mysql_num_rows($result) > 0){
		$data = mysql_fetch_object($result);
		echo $data->inv_desc.' ';
		}else{
			echo "1234";
		}	
  }else{
		echo '1234';
  }

?>