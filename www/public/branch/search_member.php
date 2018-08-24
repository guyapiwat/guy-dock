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
  $sql = "SELECT cname,ewallet,voucher,eatoship,mdate,pos_cur,pos_cur2,name_t,name_f,mcode,caddress,cbuilding,cvillage,csoi,cstreet,czip,cprovinceId,cdistrictId,camphurId ";
//  $sql .= " FROM ".$dbprefix."member  where mcode = '%$value%' limit 0,1";
		$sql .= " FROM ".$dbprefix."member  left join ".$dbprefix."location_base on (".$dbprefix."member.locationbase = ".$dbprefix."location_base.cid) where mcode like '%$value%' limit 0,1";
		
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
		$pos_cur = $data->pos_cur;
		$pos_cur2 = $data->pos_cur2;
		$mdate = $data->mdate;
		$czip = $data->czip;
		$ewallet = $data->ewallet;
		$voucher = $data->voucher;
		$eatoship = $data->eatoship;
		$locationbase = $data->cname;
		$chkshow = "";
		if(!empty($data->name_f))$chkshow .= $data->name_f.' ';
		$chkshow .= $data->name_t.' <br>';

		$sql = "SELECT date_change FROM ".$dbprefix."calc_poschange WHERE pos_after = '$pos_cur' and mcode='$cmc'  ";
		//echo $sql;
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$date_change = mysql_result($rs,0,'date_change'); 
			mysql_free_result($rs);
		}

		$sql = "SELECT sum(tot_pv) AS all_pv FROM ".$dbprefix."asaleh WHERE sadate like '%".date("Y-m")."%' and mcode='$cmc' and  (sa_type='A') and cancel = 0 ";
		//echo $sql;
		$rs = mysql_query($sql);
		$all_pv = mysql_result($rs,0,'all_pv')+gettotalpv($dbprefix,$cmc); 
		mysql_free_result($rs);

		$sql = "SELECT sum(tot_pv) AS all_pv FROM ".$dbprefix."holdhead WHERE sadate like '%".date("Y-m")."%' and mcode='$cmc' and  (sa_type='A') and cancel = 0 ";
		//echo $sql;
		$rs = mysql_query($sql);
		$all_pv = ($all_pv+mysql_result($rs,0,'all_pv')); 
		mysql_free_result($rs);
		$chkshow .= 'PV ส่วนตัวเดือนนี้ : '.$all_pv.' <br>';
		
	$array_mpos = array(''=>"-",'MB'=>"Member",'SU'=>"Supervisor",'EX'=>"Executive",'BR'=>"Bronze",'SI'=>"Silver",'GO'=>"Gold",'PL'=>"Platinum",'PE'=>"Pearl"
	,'RU'=>"Ruby",'SA'=>"Sapphire",'EM'=>"Emerald",'DI'=>"Diamond",'BD'=>"Blue Diamond",'BL'=>"Black Diamond"
	,'CD'=>"Crown Diamond",'ID'=>"Imperial Diamond",'PD'=>"Presidential Diamond",'RD'=>"Royal Diamond");
	
	
		//$chkshow .= 'ระดับการสมัคร : '.$array_mpos[$pos_cur].' ('.$date_change.')<br>หมดอายุสะสมอัพเกรต('.date('Y-m-d',expdate($mdate,'60')).')<br>';
		$chkshow .= 'ระดับการสมัคร : '.$pos_cur.'<br>';
	//	$chkshow .= 'ตำแหน่งธุรกิจ : '.$array_mpos[$pos_cur2].' <br>';
		$chkshow .= 'E-wallet : '.$ewallet.' <br>';
		//$chkshow .= 'E-Autoship : '.$eatoship.' <br>';
		//$chkshow .= 'E-Voucher : '.$voucher.' <br>';
		$chkshow .= 'Location Base : '.$locationbase.' <br>';

		/*$all_pvQ = 0;
		$sql = "SELECT sum(tot_pv) AS all_pv FROM ".$dbprefix."asaleh WHERE mcode='$cmc' and  (sa_type='Q') and cancel = 0 ";
		//echo $sql;
		$rs = mysql_query($sql);
		$all_pvQ = mysql_result($rs,0,'all_pv')+gettotalpv1($dbprefix,$cmc); 
		mysql_free_result($rs);

		$sql = "SELECT sum(tot_pv) AS all_pv FROM ".$dbprefix."holdhead WHERE mcode='$cmc' and  (sa_type='Q') and cancel = 0 ";
		//echo $sql;
		$rs = mysql_query($sql);
		$all_pvQ = ($all_pv+mysql_result($rs,0,'all_pv')); 
		mysql_free_result($rs);
		$caddress = $data->caddress;
		$cbuilding = $data->cbuilding;
		$cvillage = $data->cvillage;
		$csoi = $data->csoi;
		$cstreet = $data->cstreet;

		$chkshow .= 'PV รักษายอด : '.$all_pvQ.' <br>';
		*/echo $chkshow;
		}else{
			echo "1234";
		}	
  }else{
		echo '1234';
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
  function gettotalpv1($dbprefix,$mcode){
	$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ".$dbprefix."special_point WHERE  sa_type='VQ' AND mcode='$mcode' group by mcode ";
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
function expdate($startdate,$datenum){
 $startdatec=strtotime($startdate); // ทำให้ข้อความเป็นวินาที
 $tod=$datenum*86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
 $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
 return $ndate; // ส่งค่ากลับ
}
?>