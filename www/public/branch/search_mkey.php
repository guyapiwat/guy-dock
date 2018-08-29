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
  if(!empty($value)){
//if(!empty($value)){
  $sql = "SELECT cname,ewallet,voucher,name_t,eatoship,mdate,pos_cur,mtype1,pos_cur2,name_t,name_f,mcode,caddress,cbuilding,cvillage,csoi,cstreet,czip,cprovinceId,cdistrictId,camphurId ";
//  $sql .= " FROM ".$dbprefix."member  where mcode = '%$value%' limit 0,1";
		$sql .= " FROM ".$dbprefix."member  left join ".$dbprefix."location_base on (".$dbprefix."member.locationbase = ".$dbprefix."location_base.cid) where mcode like '%$value%' limit 0,1";

		$result = mysql_query($sql) or die("ระบบไม่สามารถค้นหาได้") ;
		if(mysql_num_rows($result) > 0){
		$data = mysql_fetch_object($result);
		$cmc = $data->mcode;
		$caddress = $data->caddress;
		$cbuilding = $data->cbuilding;
		$name_t = $data->name_t;
		$cvillage = $data->cvillage;
		$csoi = $data->csoi;
		$cstreet = $data->cstreet;
		$caddress = $caddress.' '.$cbuilding.' '.$cvillage.' '.$csoi.' '.$cstreet;
		$cprovinceId = $data->cprovinceId;
		$cdistrictId = $data->cdistrictId;
		$camphurId = $data->camphurId;
		$pos_cur = $data->pos_cur;
		$pos_cur2 = $data->pos_cur2;
		$mdate = $data->mdate;
		$mtype1 = $data->mtype1;
		$czip = $data->czip;
		$ewallet = $data->ewallet;
		$voucher = $data->voucher;
		$eatoship = $data->eatoship;
		$locationbase = $data->cname;
		$chkshow = "";
		if(!empty($data->name_f))$chkshow .= $data->name_f.' ';
		$chkshow .= $data->name_t.' <br>';

	
				if($mtype1 > 0){			
					$chkshow = 'ประเภทสมาชิก : '.$arr_mtype1[$mtype1].' <br>';
					$chkshow .= 'ชื่อ : '.$name_t.' <br>';
					echo $chkshow;
				}else{
					echo "1234";
				}
		}else{
			echo "1234";
		}	
  }else{
		echo '1234';
  }
 
?>