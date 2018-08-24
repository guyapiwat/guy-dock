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
  $sql = "SELECT locationbase ";
//  $sql .= " FROM ".$dbprefix."member  where mcode = '%$value%' limit 0,1";
		$sql .= " FROM ".$dbprefix."member  where mcode like '%$value%' limit 0,1";
		$result = mysql_query($sql) or die("ระบบไม่สามารถค้นหาได้") ;
		if(mysql_num_rows($result) > 0){
		$data = mysql_fetch_object($result);
		$cmc = $data->mcode;
		$chkshow = $data->locationbase;
		
		echo $chkshow;
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