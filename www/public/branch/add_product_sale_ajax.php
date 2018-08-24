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
 //$value = "0000001";
  //$value1 = "0000009";
  //echo $value1.' '.$value;
  //exit;
  if(!empty($value)){
//if(!empty($value)){
		//	echo ':'.$value.':'.$price.":".$pv.":".$qty.":".$pcode.":".$barcode.":".$serial;
	$cvalue = $value.$_SESSION["inv_cshort"];

$sss = 0;
	$sql1 = "select pcode,barcode,serial FROM ".$dbprefix."aging where serial = '$value' ";
	$result1 = mysql_query($sql1) or die("haha") ;
	if(mysql_num_rows($result1) > 0){
		$data1 = mysql_fetch_object($result1);
		$pcode = $data1->pcode;
		$barcode = $data1->barcode;
		$serial = $data1->serial;
		$sss = '1';
	}

	if(empty($pcode))$pcode = $value;

	$sql1 = "select pcode,barcode,pv,price,pdesc FROM ".$dbprefix."product where (barcode = '$pcode' or pcode = '$pcode' or pcode = '$cvalue') and locationbase = '".$_SESSION["inv_locationbase"]."' ";
	$result1 = mysql_query($sql1) or die("haha") ;
	if(mysql_num_rows($result1) > 0){
		$data1 = mysql_fetch_object($result1);
		$pcode = $data1->pcode;
		$barcode = $data1->barcode;
		$pv = $data1->pv;
		$pdesc = $data1->pdesc;
		$price = $data1->price;
		$sss = '1';
	}

	$sql1 = "select pcode,barcode,pv,price,pdesc FROM ".$dbprefix."product_package where (barcode = '$pcode' or pcode = '$pcode' or pcode = '$cvalue') and locationbase = '".$_SESSION["inv_locationbase"]."'";
	$result1 = mysql_query($sql1) or die("haha") ;
	if(mysql_num_rows($result1) > 0){
		$data1 = mysql_fetch_object($result1);
		$pcode = $data1->pcode;
		$barcode = $data1->barcode;
		$pv = $data1->pv;
		$pdesc = $data1->pdesc;
		$price = $data1->price;
		$sss = '1';
	}


		if($pcode <> '' and $sss == '1'){
		
			echo ':'.$pdesc.':'.$price.":".$pv.":".$qty.":".$pcode.":".$barcode.":".$serial;
			exit;
		}else{
			echo "1234";
		}	
  }else{
		echo '1234';
  }
 function isLine($dbprefix,$scode,$testcode){
		$sql = "SELECT upa_code FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
		$rs = mysql_query($sql);
		//echo $scode.' '.$testcode.'<br>';
		if($scode==$testcode)
			return true;
		if(mysql_num_rows($rs)<=0)
			return false;
		else if(mysql_result($rs,0,'upa_code')!=$testcode)
			return isLine($dbprefix,mysql_result($rs,0,'upa_code'),$testcode);
		else
			return true;
	}

?>