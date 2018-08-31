<? session_start();?>
<?
  //ไม่ไปเอาจาก cache
  header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
  header("Last-Modified: ".gmdate( "D, d M Y H:i:s")."GMT");
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  
  //กำหนด header ตอนรับ
  header("content-type: application/x-javascript; charset=utf8");
// echo("กำหนด header ตอนรับ");
// exit;
include("prefix.php");
include("connectmysql.php");
 $value=(isset($_POST["value"])) ? $_POST["value"] : $_GET["value"];
$mcode1 = $_SESSION["usercode"];
	//$value = "0000005";
	//if(!empty($value) and isLine($dbprefix,$value,$_SESSION["usercode"])){
	//if(!empty($value) and isLine("ali_",$value,$_SESSION["usercode"])){
	
$sql = "SELECT mtype1 ";
$sql .= " FROM ".$dbprefix."member  where mcode = '$mcode1' ";
$sql .= " limit 0,1";
$result = mysql_query($sql) or die("ระบบไม่สามารถค้นหาได้") ;
$data = mysql_fetch_object($result);
$mtype1 = $data->mtype1;      

if($mtype1 == "0"){
  if(!empty($value) and isLine("ali_",$value,$_SESSION["usercode"]) ){
	$sql = "SELECT locationbase,name_t,name_f,mcode,caddress,cbuilding,cvillage,csoi,cstreet,czip,cprovinceId,cdistrictId,camphurId ";
	//  $sql .= " FROM ".$dbprefix."member  where mcode = '%$value%' limit 0,1";
		$sql .= " FROM ".$dbprefix."member  where mcode = '$value' ";
		//if($value != $_SESSION["usercode"])$sql .= "and id > 127 ";
		$sql .= " limit 0,1";
		$result = mysql_query($sql) or die("ระบบไม่สามารถค้นหาได้") ;

		if(mysql_num_rows($result) > 0){
		$data = mysql_fetch_object($result);
	//var_dump($data);
		$cmc = $data->mcode;      
		$caddress = $data->caddress;
		$cbuilding = $data->cbuilding;
		$cvillage = $data->cvillage;
		$csoi = $data->csoi;
		$cstreet = $data->cstreet;
		$caddress = $caddress.' '.$cbuilding.' '.$cvillage.' '.$csoi.' '.$cstreet;
		$cprovinceId = $data->cprovinceId;
		$cdistrictId = $data->cdistrictId;
		$camphurId = $data->camphurId;
		$czip = $data->czip;
		$locationbase = $data->locationbase;
		$chkshow = "";
		if($locationbase != $_SESSION["m_locationbase"]){
			echo "1234";
			exit;
		}
		
		
		$l1 = lrMost($dbprefix,$cmc,'1');
		$namel = getMember($dbprefix,$l1);
		$l2 = lrMost($dbprefix,$cmc,'2');
		$namer = getMember($dbprefix,$l2);
		$l3 = lrMost($dbprefix,$cmc,'3');
		$namec = getMember($dbprefix,$l3);
		if(strpos($l1,$cmc)."x"=="x"){
		echo $data->name_t;
		echo '|'.$l1.' '.$namel;
		echo '|'.$l2.' '.$namer;
		echo '|'.$l3.' '.$namec;
		}

		}else{
			echo "1234";
		}	
  }else{
		echo '1234';
  }
}else{
    //if(!empty($value) and isLine("ali_",$value,$_SESSION["usercode"]) ){
	$sql = "SELECT locationbase,name_t,name_f,mcode,caddress,cbuilding,cvillage,csoi,cstreet,czip,cprovinceId,cdistrictId,camphurId ";
	//  $sql .= " FROM ".$dbprefix."member  where mcode = '%$value%' limit 0,1";
		$sql .= " FROM ".$dbprefix."member  where mcode = '$value' ";
		//if($value != $_SESSION["usercode"])$sql .= "and id > 127 ";
		$sql .= " limit 0,1";
		$result = mysql_query($sql) or die("ระบบไม่สามารถค้นหาได้") ;
		if(mysql_num_rows($result) > 0){
		$data = mysql_fetch_object($result);
		$cmc = $data->mcode;      
		$caddress = $data->caddress;
		$cbuilding = $data->cbuilding;
		$cvillage = $data->cvillage;
		$csoi = $data->csoi;
		$cstreet = $data->cstreet;
		$caddress = $caddress.' '.$cbuilding.' '.$cvillage.' '.$csoi.' '.$cstreet;
		$cprovinceId = $data->cprovinceId;
		$cdistrictId = $data->cdistrictId;
		$camphurId = $data->camphurId;
		$czip = $data->czip;
		$locationbase = $data->locationbase;
		$chkshow = "";
		if($locationbase != $_SESSION["m_locationbase"]){
			echo "1234";
			exit;
		}
		echo $data->name_t;
		$l1 = lrMost($dbprefix,$cmc,'1');
		$namel = getMember($dbprefix,$l1);
		$l2 = lrMost($dbprefix,$cmc,'2');
		$namer = getMember($dbprefix,$l2);
		$l3 = lrMost($dbprefix,$cmc,'3');
		$namec = getMember($dbprefix,$l3);
		echo '|'.$l1.' '.$namel;
		echo '|'.$l2.' '.$namer;
		echo '|'.$l3.' '.$namec;

		}else{
			echo "1234";
		}	
 // }else{
//		echo '1234';
 // }
}
 function isLine($dbprefix,$scode,$testcode){
		$sql = "SELECT upa_code FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
		$rs = mysql_query($sql);
		if($scode==$testcode)
			return true;
		if(mysql_num_rows($rs)<=0)
			return false;
		else if(mysql_result($rs,0,'upa_code')!=$testcode)
			return isLine($dbprefix,mysql_result($rs,0,'upa_code'),$testcode);
		else
			return true;
	}
  function gettotalpv($dbprefix,$mcode){
	$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ".$dbprefix."special_point WHERE  sa_type='VA' AND mcode='$mcode' group by mcode ";
				//if($mcode == '0000075')echo "$sql3<BR>";
				$rs3=mysql_query($sql3);
				if (mysql_num_rows($rs3)>0) {
					$sqlObj3 = mysql_fetch_object($rs3);
					$total_fv3= $sqlObj3->tot_pv;
				}else{
					$total_fv3=0;
				}
				mysql_free_result($rs3);
				//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_fv3;
} 

function lrMost($dbprefix,$scode,$lr_val){
		$sql = "SELECT mcode,lr FROM ".$dbprefix."member WHERE upa_code='$scode' AND lr='$lr_val' LIMIT 1 ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0)
			return $scode;
		else
			return lrMost($dbprefix,mysql_result($rs,0,'mcode'),$lr_val);
}
function getMember($dbprefix,$mcode){
		$sql = "select * from ".$dbprefix."member  where mcode='$mcode' ";
		$query = mysql_query($sql);
		if(mysql_num_rows($query) > 0){
			$name = mysql_result(mysql_query($sql),0,'name_t');
		}
		return $name;
		//$vip_point = mysql_result(mysql_query($sql),0,'tot_pv');
		//return $vip_point;
}

?>