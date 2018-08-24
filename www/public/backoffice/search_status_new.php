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
	$status = 0;
  $sql = "SELECT name_t,mcode,pos_cur";
//  $sql .= " FROM ".$dbprefix."member  where mcode = '%$value%' limit 0,1";
		
		$sql .= " FROM ".$dbprefix."member  where mcode like '%$value%' limit 0,1";
		$result = mysql_query($sql) or die("ระบบไม่สามารถค้นหาได้") ;
		if(mysql_num_rows($result) > 0){
		$data = mysql_fetch_object($result);
		$mcode = $data->mcode;
		$pos_cur = $data->pos_cur;
		//$year = date('Y');
		//$month = date('m');
		$tomorrow = mktime(0,0,0,date("m")+1,date("d"),date("Y"));
		$monthpv = date("Ym", $tomorrow);

		//$monthpv = $year.$month;
	$array_mpos = array('MB'=>0,'GC'=>125,'GB'=>125,'GS'=>125,'GG'=>125);
		$sql = "SELECT status FROM ali_status WHERE mcode='$mcode' and month_pv = '$monthpv' order by month_pv desc limit 0,1 ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$status = mysql_result($rs,0,'status'); 
			mysql_free_result($rs);
		}else{
			$status = 0;
		}
		if($status == 1)echo $status;
		else echo $array_mpos[$pos_cur];
		}else{
			echo $array_mpos[$pos_cur];
		}	
  }else{
		echo $array_mpos[$pos_cur];
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

?>