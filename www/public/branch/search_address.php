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
include("function.php");
 $value=(isset($_POST["value"])) ? $_POST["value"] : $_GET["value"];
  //$value = "0000005";
//  if(!empty($value) and isLine($dbprefix,$value,$_SESSION["usercode"])){
if(!empty($value)){
  $sql = "SELECT name_t,name_f,mcode,caddress,cbuilding,cvillage,csoi,cstreet,czip,cprovinceId,cdistrictId,camphurId,mobile,locationbase ";
//  $sql .= " FROM ".$dbprefix."member  where mcode = '%$value%' limit 0,1";
		$sql .= " FROM ".$dbprefix."member  where mcode like '%$value%' limit 0,1";
		$result = mysql_query($sql) or die("ระบบไม่สามารถค้นหาได้") ;
		if(mysql_num_rows($result) > 0){
		$data = mysql_fetch_object($result);
		$cmc = $data->mcode;
		if(!empty($data->caddress))$caddress = 'บ้านเลขที่  '.$data->caddress.' , ';
		if(!empty($data->cbuilding))$cbuilding = 'อาคาร '.$data->cbuilding.' , ';
		if(!empty($data->cvillage))$cvillage = 'หมู่บ้าน/คอนโด '.$data->cvillage.' , ';
		if(!empty($data->csoi))$csoi = 'ตรอก/ซอย '.$data->csoi.' , ';
		if(!empty($data->cstreet))$cstreet = 'ถนน '.$data->cstreet;
		$caddress = $caddress.' '.$cbuilding.' '.$cvillage.' '.$csoi.' '.$cstreet;
		$cprovinceId = $data->cprovinceId;
		$cdistrictId = $data->cdistrictId;
		$camphurId = $data->camphurId;
		
		$locationbase = $data->locationbase;
		$name_t = $data->name_t;
		$mobile = $data->mobile;
		$czip = $data->czip;
		$chkshow = ' <table> <tr valign="top">
                        <td colspan="2" align="right">ชื่อผู้รับ</td>
                        <td colspan="2"><input type="textbox" name="cname" id="cname" value="'.$name_t.'"></td>
                      </tr>
					  <tr valign="top">
                        <td colspan="2" align="right">เบอร์ติดต่อ</td>
                        <td colspan="2"><input type="textbox" name="cmobile" id="cmobile" value="'.$mobile.'"></td>
                      </tr>
					  <tr valign="top">
                        <td colspan="2" align="right">&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;</td>
                        <td colspan="2"><textarea name="caddress" id="caddress" cols="50" rows="3" tabindex="14">'.$caddress.'</textarea></td>
                      </tr>
                   ';
				echo   $chkshow .= ' <tr valign="top">
                  <td colspan="2" align="right">&nbsp;</td>
                  <td colspan="2">';
			
		if($locationbase == '1'){
			$cprovinceId = getprovinceId($cprovinceId);
			$camphurId = getamphurId($camphurId);
			$cdistrictId = getdistrictId1($cdistrictId,$camphurId,$cprovinceId);
			
			if($cprovinceId==""){
				include("cthaiaddress.php");
			}else{
				include("cthaiaddressShow.php");
			}
		}else{
			$cdistrictId = getdistrict($cdistrictId);
			$camphurId = getamphur($camphurId);
			$cprovinceId = getprovince($cprovinceId);
			echo $chkshow = '<table><tr valign="top">
                        <td colspan="2" align="right">Sub-District</td>
                        <td colspan="2"><input type="textbox" name="cdistrict" id="cdistrict" value="'.$cdistrictId.'"></td>
                      </tr>
					  
					  <tr valign="top">
                        <td colspan="2" align="right">District</td>
                        <td colspan="2"><input type="textbox" name="camphur" id="camphur" value="'.$camphurId.'"></td>
                      </tr>
					  
					  <tr valign="top">
                        <td colspan="2" align="right">Province</td>
                        <td colspan="2"><input type="textbox" name="cprovince" id="cprovince" value="'.$cprovinceId.'"></td>
                      </tr></table>';
		}
		$chkshow = '</td>
                </tr>
                
                <tr valign="top">
                  <td height="29" colspan="2" align="right">&#3619;&#3627;&#3633;&#3626;&#3652;&#3611;&#3619;&#3625;&#3603;&#3637;&#3618;&#3660;</td>
                  <td colspan="2"><input name="czip" tabindex="18" type="text" id="czip" size="60"  value="'.$czip.'" />
				  
				  <input name="button4" tabindex="48" type="button" onclick=check_zipcode1(document.getElementById("cprovince").value,document.getElementById("camphur").value,document.getElementById("cdistrict").value) value="ค้นหา">
				  
				  </td>
                </tr></table>';
		
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

?>