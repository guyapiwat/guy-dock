<? session_start();?>
<?
  //������Ҩҡ cache
  header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
  header("Last-Modified: ".gmdate( "D, d M Y H:i:s")."GMT");
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  
  //��˹� header �͹�Ѻ
  header("content-type: application/x-javascript; charset=TIS-620");

include("prefix.php");
include("connectmysql.php");
include("global.php");
 $value=(isset($_POST["value"])) ? $_POST["value"] : $_GET["value"];
  //$value = "0000005";
if($_SESSION["m_mtype1"] == '0')$isline = isLine($dbprefix,$value,$_SESSION["usercode"]);
else $isline = true;
$isline = true;
  if(!empty($value) and $isline){
  $sql = "SELECT locationbase,pos_cur,pos_cur1,name_t,name_f,mcode,caddress,cbuilding,cvillage,csoi,cstreet,czip,cprovinceId,cdistrictId,camphurId ";
//  $sql .= " FROM ".$dbprefix."member  where mcode = '%$value%' limit 0,1";
		$sql .= " FROM ".$dbprefix."member  where mcode like '%$value%'  and mtype1 = '1' and status_suspend = '0' and  status_terminate = '0'  limit 0,1";
		$result = mysql_query($sql) or die("�к��������ö������") ;
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
		$locationbase = $data->locationbase;
		$czip = $data->czip;
		$chkshow = "";
		if(!empty($data->name_f))$chkshow .= $data->name_f.' ';
		$chkshow .= $data->name_t.' <br>';

		if($locationbase != $_SESSION["m_locationbase"]){
			echo "1234";
			exit;
		}
		echo $chkshow;
		}else{
			echo "1234";
		}	
  }else{
		echo '1234';
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

?>