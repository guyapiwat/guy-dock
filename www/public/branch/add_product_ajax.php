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
  if(!empty($value) and !empty($value1)){
	   $sss = '0';
//if(!empty($value)){

	$cvalue = $value.$_SESSION["inv_cshort"];
	$sql1 = "select pcode,barcode,serial FROM ".$dbprefix."aging where serial = '$value' ";
	$result1 = mysql_query($sql1) or die("haha") ;
	if(mysql_num_rows($result1) > 0){
		$data1 = mysql_fetch_object($result1);
		$pcode = $data1->pcode;
		$barcode = $data1->barcode;
		$serial = $data1->serial;
		$sss = '1';
	}

	$sql1 = "select pcode,barcode FROM ".$dbprefix."product where (barcode = '$value' or pcode = '$value' or pcode = '$cvalue') and locationbase = '".$_SESSION["inv_locationbase"]."' ";
	$result1 = mysql_query($sql1) or die("haha") ;
	if(mysql_num_rows($result1) > 0){
		$data1 = mysql_fetch_object($result1);
		$pcode = $data1->pcode;
		$barcode = $data1->barcode;
		$sss = '1';
	}

	$sql1 = "select pcode,barcode FROM ".$dbprefix."product_package where (barcode = '$value' or pcode = '$value' or pcode = '$cvalue') and locationbase = '".$_SESSION["inv_locationbase"]."' ";
	$result1 = mysql_query($sql1) or die("haha") ;
	if(mysql_num_rows($result1) > 0){
		$data1 = mysql_fetch_object($result1);
		$pcode = $data1->pcode;
		$barcode = $data1->barcode;
		$sss = '1';
	}



		//	echo ':'.$pcode.':'.$barcode.":".$value;

//exit;
	$sql = "select * from (SELECT ".$dbprefix."asaled.pcode,".$dbprefix."asaled.pdesc,".$dbprefix."asaled.price,";
	$sql .= $dbprefix."asaled.pv,(".$dbprefix."asaled.qty-IFNULL(SUM(".$dbprefix."rasaled.qty),0)) AS qty FROM ".$dbprefix."asaled ";//,(".$dbprefix."asaled.qty-".$dbprefix."rasaled.qty)
	$sql .= "LEFT JOIN ".$dbprefix."rasaleh ON (".$dbprefix."asaled.sano=".$dbprefix."rasaleh.sano and ".$dbprefix."rasaleh.cancel = 0)  ";
	$sql .= "LEFT JOIN ".$dbprefix."rasaled ";
	$sql .= "ON (".$dbprefix."rasaleh.hono=".$dbprefix."rasaled.hono AND ".$dbprefix."rasaled.pcode=".$dbprefix."asaled.pcode) ";
	//$sql .= "LEFT JOIN ".$dbprefix."rasaled WHERE sano='".$_GET['bid']."' ";pcode,pdesc,price,pv,qty
	$sql .= "WHERE ".$dbprefix."asaled.sano='".$value1."' GROUP BY pcode) as a where a.qty > 0 and a.pcode = '".$pcode."' ";
		$result = mysql_query($sql) or die("haha") ;
		if(mysql_num_rows($result) > 0 and $sss == '1'){
			$data = mysql_fetch_object($result);
			$pdesc = $data->pdesc;
			$price = $data->price;
			$pv = $data->pv;
			$qty = $data->qty;
			$pcode = $data->pcode;
			$barcode = $data->barcode;
		
			echo ':'.$pdesc.':'.$price.":".$pv.":".$qty.":".$pcode.":".$barcode.":".$serial;
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