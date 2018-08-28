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

 $province=(isset($_POST["value"])) ? $_POST["value"] : $_GET["value"];
 $amphur=(isset($_POST["value1"])) ? $_POST["value1"] : $_GET["value1"];
 $district=(isset($_POST["value2"])) ? $_POST["value2"] : $_GET["value2"];
  //$value = "0000005";
//  if(!empty($value) and isLine($dbprefix,$value,$_SESSION["usercode"])){
if(!empty($province) and !empty($amphur) and !empty($district)){
		$status = 0;
		 $sql = "SELECT * FROM district WHERE provinceId='".$province."' AND amphurId='$amphur' and districtId = '$district'  order by districtName asc";

		$result = mysql_query($sql) or die("ระบบไม่สามารถค้นหาได้") ;
		if(mysql_num_rows($result) > 0){
			$data = mysql_fetch_object($result);
			$zipcode = $data->zipcode;
			echo $zipcode;
		}else{
			echo '1234';
		}
  }else{
		echo '1234';
  }

?>