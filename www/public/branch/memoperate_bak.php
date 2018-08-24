<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require("adminchecklogin.php");
include("gencode.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
include("global.php");
if(isset($_GET['state'])){

	/*$sql = "SELECT MAX(mcode) AS code FROM ".$dbprefix."member ";
	$rs = mysql_query($sql);
	$code = mysql_result($rs,0,'code');
	$mcode = gencode($code+1);
	$sv_code = substr($mcode,3,strlen($mcode));
	mysql_free_result($rs);*/
	if (isset($_POST["txtoption"])){$txtoption=$_POST["txtoption"];}else{$txtoption="";}

	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}
	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}
	if (isset($_POST["name_f"])){$name_f=$_POST["name_f"];}
	if (isset($_POST["name_ff"])){$name_f=$_POST["name_ff"];}else{$name_f="";}
	if (isset($_POST["name_t"])){$name_t=$_POST["name_t"];}else{$name_t="";}
	if (isset($_POST["name_e"])){$name_e=$_POST["name_e"];}else{$name_e="";}
	if (isset($_POST["name_b"])){$name_b=$_POST["name_b"];}else{$name_e="";}
	if (isset($_POST["sex"])){$sex=$_POST["sex"];}else{$sex="";}
	if (isset($_POST["sletter"])){$sletter=$_POST["sletter"];}else{$sletter="";}
	if (isset($_POST["sinv_code"])){$sinv_code=$_POST["sinv_code"];}else{$sinv_code="";}
	if (isset($_POST["birthday1"])){$birthday1=$_POST["birthday1"];}else{$birthday1="";}
	if (isset($_POST["birthday2"])){$birthday2=$_POST["birthday2"];}else{$birthday2="";}
	if (isset($_POST["birthday3"])){$birthday3=$_POST["birthday3"];}else{$birthday3="";}

	if (isset($_POST["cbirthday1"])){$cbirthday1=$_POST["cbirthday1"];}else{$cbirthday1="";}
	if (isset($_POST["cbirthday2"])){$cbirthday2=$_POST["cbirthday2"];}else{$cbirthday2="";}
	if (isset($_POST["cbirthday3"])){$cbirthday3=$_POST["cbirthday3"];}else{$cbirthday3="";}

			if (isset($_POST["cname_f"])){$cname_f=$_POST["cname_f"];}else{$cname_f="";}
			if (isset($_POST["cname_ff"])){$cname_f=$_POST["cname_ff"];}
			if (isset($_POST["cname_t"])){$cname_t=$_POST["cname_t"];}else{$cname_t="";}
			if (isset($_POST["cname_e"])){$cname_e=$_POST["cname_e"];}else{$cname_e="";}
			if (isset($_POST["cname_b"])){$cname_b=$_POST["cname_b"];}else{$cname_b="";}
			if (isset($_POST["csex"])){$csex=$_POST["csex"];}else{$csex="";}
//var_dump($_POST);
//echo $name_f;
//echo $cname_f;
//exit;
	if (isset($_POST["mdate"])){$mdate=$_POST["mdate"];}else{$mdate="";}
	if (isset($_POST["birthday"])){$birthday=$_POST["birthday"];}else{$birthday="";}
	if (isset($_POST["age"])){$age=$_POST["age"];}else{$age="";}

			if (isset($_POST["cbirthday"])){$cbirthday=$_POST["cbirthday"];}else{$cbirthday="";}
			if (isset($_POST["cage"])){$cage=$_POST["cage"];}else{$cage="";}

	if (isset($_POST["occupation"])){$occupation=$_POST["occupation"];}else{$occupation="";}
	if (isset($_POST["status"])){$status=$_POST["status"];}else{$status="";}
	if (isset($_POST["mar_name"])){$mar_name=$_POST["mar_name"];}else{$mar_name="";}
	if (isset($_POST["mar_age"])){$mar_age=$_POST["mar_age"];}else{$mar_age="";}
	if (isset($_POST["email"])){$email=$_POST["email"];}else{$email="";}

			if (isset($_POST["cemail"])){$cemail=$_POST["cemail"];}else{$cemail="";}

	if (isset($_POST["beneficiaries"])){$beneficiaries=$_POST["beneficiaries"];}else{$beneficiaries="";}
	if (isset($_POST["relation"])){$relation=$_POST["relation"];}else{$relation="";}
	if (isset($_POST["national"])){$national=$_POST["national"];}else{$national="";}
	if (isset($_POST["id_tax"])){$id_tax=$_POST["id_tax"];}else{$id_tax="";}
	if (isset($_POST["id_card"])){$id_card=$_POST["id_card"];}else{$id_card="";}
	if (isset($_POST["address"])){$address=$_POST["address"];}else{$address="";}
	if (isset($_POST["street"])){$street=$_POST["street"];}else{$street="";}
	if (isset($_POST["building"])){$building=$_POST["building"];}else{$building="";}
	if (isset($_POST["village"])){$village=$_POST["village"];}else{$village="";}
	if (isset($_POST["soi"])){$soi=$_POST["soi"];}else{$soi="";}
	if (isset($_POST["province"])){$province=$_POST["province"];}else{$province="";}
	if (isset($_POST["amphur"])){$amphur=$_POST["amphur"];}else{$amphur="";}
	if (isset($_POST["district"])){$district=$_POST["district"];}else{$district="";}
	if (isset($_POST["zip"])){$zip=$_POST["zip"];}else{$zip="";}
	if (isset($_POST["zip_1"])){$zip_1=$_POST["zip_1"];}else{$zip_1="";}
	if (isset($_POST["zip_2"])){$zip_2=$_POST["zip_2"];}else{$zip_2="";}
	if (isset($_POST["zip_3"])){$zip_3=$_POST["zip_3"];}else{$zip_3="";}
	if (isset($_POST["zip_4"])){$zip_4=$_POST["zip_4"];}else{$zip_4="";}
	if (isset($_POST["zip_5"])){$zip_5=$_POST["zip_5"];}else{$zip_5="";}

	if (isset($_POST["home_t"])){$home_t=$_POST["home_t"];}else{$home_t="";}
	if (isset($_POST["mobile"])){$mobile=$_POST["mobile"];}else{$mobile="";}
	if (isset($_POST["fax"])){$fax=$_POST["fax"];}else{$fax="";}

			if (isset($_POST["cnational"])){$cnational=$_POST["cnational"];}else{$cnational="";}
			if (isset($_POST["cid_tax"])){$cid_tax=$_POST["cid_tax"];}else{$cid_tax="";}
			if (isset($_POST["cid_card"])){$cid_card=$_POST["cid_card"];}else{$cid_card="";}
			if (isset($_POST["caddress"])){$caddress=$_POST["caddress"];}else{$caddress="";}
			if (isset($_POST["cstreet"])){$cstreet=$_POST["cstreet"];}else{$cstreet="";}
			if (isset($_POST["cbuilding"])){$cbuilding=$_POST["cbuilding"];}else{$cbuilding="";}
			if (isset($_POST["cvillage"])){$cvillage=$_POST["cvillage"];}else{$cvillage="";}
			if (isset($_POST["csoi"])){$csoi=$_POST["csoi"];}else{$csoi="";}
			if (isset($_POST["cprovince"])){$cprovince=$_POST["cprovince"];}else{$cprovince="";}
			if (isset($_POST["camphur"])){$camphur=$_POST["camphur"];}else{$camphur="";}
			if (isset($_POST["cdistrict"])){$cdistrict=$_POST["cdistrict"];}else{$cdistrict="";}
			if (isset($_POST["czip"])){$czip=$_POST["czip"];}else{$czip="";}
			if (isset($_POST["chome_t"])){$chome_t=$_POST["chome_t"];}else{$chome_t="";}
			if (isset($_POST["cmobile"])){$cmobile=$_POST["cmobile"];}else{$cmobile="";}
			if (isset($_POST["cfax"])){$cfax=$_POST["cfax"];}else{$cfax="";}
			if (isset($_POST["czip_1"])){$czip_1=$_POST["czip_1"];}else{$czip_1="";}
			if (isset($_POST["czip_2"])){$czip_2=$_POST["czip_2"];}else{$czip_2="";}
			if (isset($_POST["czip_3"])){$czip_3=$_POST["czip_3"];}else{$czip_3="";}
			if (isset($_POST["czip_4"])){$czip_4=$_POST["czip_4"];}else{$czip_4="";}
			if (isset($_POST["czip_5"])){$czip_5=$_POST["czip_5"];}else{$czip_5="";}

	if (isset($_POST["mcode_acc"])){$mcode_acc=$_POST["mcode_acc"];}else{$mcode_acc="";}
	if (isset($_POST["bonusrec"])){$bonusrec=$_POST["bonusrec"];}else{$bonusrec="";}
	
	if (isset($_POST["bankcode"])){$bankcode=$_POST["bankcode"];}else{$bankcode="";}
	if (isset($_POST["branch"])){$branch=$_POST["branch"];}else{$branch="";}
	if (isset($_POST["acc_type"])){$acc_type=$_POST["acc_type"];}else{$acc_type="";}
	if (isset($_POST["acc_no"])){$acc_no=$_POST["acc_no"];}else{$acc_no="";}
	if (isset($_POST["acc_name"])){$acc_name=$_POST["acc_name"];}else{$acc_name="";}
	if (isset($_POST["acc_prov"])){$acc_prov=$_POST["acc_prov"];}else{$acc_prov="";}
	if (isset($_POST["sv_code"])){$sv_code=$_POST["sv_code"];}else{$sv_code="";}
	if (isset($_POST["sp_code"])){$sp_code=$_POST["sp_code"];}else{$sp_code="";}
	if (isset($_POST["sp_name"])){$sp_name=$_POST["sp_name"];}else{$sp_name="";}
	if (isset($_POST["upa_code"])){$upa_code=$_POST["upa_code"];}else{$upa_code="";}
	if (isset($_POST["upa_name"])){$upa_name=$_POST["upa_name"];}else{$upa_name="";}
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
	
	if (isset($_POST["lr"])){$lr=$_POST["lr"];}else{$lr="";}
	if (isset($_POST["posid"])){$posid=$_POST["posid"];}else{$posid="";}
	if (isset($_POST["pos_cur"])){$pos_cur=$_POST["pos_cur"];}else{$pos_cur="MB";}
	if (isset($_POST["memdesc"])){$memdesc=$_POST["memdesc"];}else{$memdesc="";}
	if (isset($_POST["cmp2"])){$cmp2=$_POST["cmp2"];}else{$cmp2="";}
	if (isset($_POST["cmp3"])){$cmp3=$_POST["cmp3"];}else{$cmp3="";}
	if (isset($_POST["cmp"])){$cmp=$_POST["cmp"];}else{$cmp="";}
	if (isset($_POST["ccmp2"])){$ccmp2=$_POST["ccmp2"];}else{$ccmp2="";}
	if (isset($_POST["ccmp3"])){$ccmp3=$_POST["ccmp3"];}else{$ccmp3="";}
	if (isset($_POST["ccmp"])){$ccmp=$_POST["ccmp"];}else{$ccmp="";}
	if (isset($_POST["ncode"])){$ncode=$_POST["ncode"];}else{$ncode="";}
	if (isset($_POST["bmdate1"])){$bmdate1=$_POST["bmdate1"];}else{$bmdate1="";}
	if (isset($_POST["bmdate2"])){$bmdate2=$_POST["bmdate2"];}else{$bmdate2="";}
	if (isset($_POST["bmdate3"])){$bmdate3=$_POST["bmdate3"];}else{$bmdate3="";}
	if (isset($_POST["cbmdate1"])){$cbmdate1=$_POST["cbmdate1"];}else{$cbmdate1="";}
	if (isset($_POST["cbmdate2"])){$cbmdate2=$_POST["cbmdate2"];}else{$cbmdate2="";}
	if (isset($_POST["cbmdate3"])){$cbmdate3=$_POST["cbmdate3"];}else{$cbmdate3="";}
	if (isset($_POST["chkaddress"])){$chkaddress=$_POST["chkaddress"];}else{$chkaddress="";}
	if (isset($_POST["iname_t"])){$iname_t=$_POST["iname_t"];}else{$iname_t="";}
	if (isset($_POST["iname_f"])){$iname_f=$_POST["iname_f"];}else{$iname_f="";}
	if (isset($_POST["iname_ff"])){$iname_f=$_POST["iname_ff"];}
	if (isset($_POST["irelation"])){$irelation=$_POST["irelation"];}else{$irelation="";}
	if (isset($_POST["iphone"])){$iphone=$_POST["iphone"];}else{$iphone="";}
	if (isset($_POST["iid_card"])){$iid_card=$_POST["iid_card"];}else{$iid_card="";}
	if (isset($_POST["payment"])){$payment=$_POST["payment"];}else{$payment="";}
}
		$zip = $zip_1.$zip_2.$zip_3.$zip_4.$zip_5;

if($chkaddress == '1'){

	$caddress = $address;
	$cstreet = $street;
	$cbuilding = $building;
	$cvillage = $village;
	$csoi = $soi;
	$cprovince = $province;
	$camphur = $amphur;
	$cdistrict = $district;
	$czip = $zip;
}
$upa_code = lrMost($dbprefix,$sp_code,$lr);
//echo $upa_code;
//exit;
//echo $province.' '.$amphur.' '.$district.' '.$zip.'<br>';
//exit;
//echo $cprovince.' '.$camphur.' '.$cdistrict.' '.$czip;
//exit;
//var_dump($pos_cur);
//exit;
/*$birthday1 = explode("-",$birthday);
$birthday1[0] = $birthday1[0]-543;
$birthday = $birthday1[0].'-'.$birthday1[1].'-'.$birthday1[2];
if(!empty($cbirthday)){
	$cbirthday1 = explode("-",$cbirthday);
	$cbirthday1[0] = $cbirthday1[0]-543;
	$cbirthday = $cbirthday1[0].'-'.$cbirthday1[1].'-'.$cbirthday1[2];
}*/
$birthday3 = $birthday3-543;
$birthday = $birthday3.'-'.$birthday2.'-'.$birthday1;
if(!empty($cbirthday3)){
	$cbirthday3 = $cbirthday3-543;
	$cbirthday = $cbirthday3.'-'.$cbirthday2.'-'.$cbirthday1;
}
$total=0;
$id_card1 = explode('-',$id_card);
$id_card = $id_card1[0].$id_card1[1].$id_card1[2].$id_card1[3].$id_card1[4];
	if($_GET['state']==0){
		//$sql = "SELECT mcode AS code FROM ".$dbprefix."member where mcode = '$mcode' ";
		//$rs = mysql_query($sql);
	//	$code = mysql_result($rs,0,'code');
	//	$mcode11 = gencode($code+1);
		//if(mysql_num_rows($rs) > 0){
		//	echo "<script language='JavaScript'>alert('รหัสสมาชิกซ้ำกรุณาสมัครอีกรอบ');window.location='index.php?sessiontab=3&sub=666&state=2'</script>";	
		//}
		$result1=mysql_query("select * from ".$dbprefix."member where id_card = '$id_card'");
		if(mysql_num_rows($result1) > 0){
				echo "<script language='JavaScript'>alert('รหัสบัตรประชาขนนี้ได้ทำการสมัครไปเรียบร้อยแล้ว');window.location='index.php?sessiontab=3&sub=666'</script>";	
				exit;
		}
		$sql = "SELECT MAX(mcode) AS code FROM ".$dbprefix."member ";
		$rs = mysql_query($sql);
		$code = mysql_result($rs,0,'code');
		$mcode = gencode($code+1);
		//$sv_code = substr($mcode,3,strlen($mcode));
		mysql_free_result($rs);

		$sv_code = substr($id_card, -4, 4); 


		
		//$acc_no = $acc_no_1.$acc_no_2.$acc_no_3.$acc_no_4.$acc_no_5.$acc_no_6.$acc_no_7.$acc_no_8.$acc_no_9.$acc_no_10;
		$sql="insert into ".$dbprefix."member (id,mcode ,name_f ,name_t ,name_e ,name_b ,sex ,mdate ,birthday ,age ,occupation ,status ,mar_name ,mar_age ,email ,beneficiaries ,relation ,national ,id_tax ,id_card ,address ,provinceId,amphurId,districtId ,zip ,home_t ,fax,mobile ,mcode_acc, bonusrec ,bankcode ,branch ,acc_type ,acc_no ,acc_name ,acc_prov ,sv_code ,sp_code ,sp_name ,upa_code ,upa_name ,inv_code ,uid ,posid,pos_cur,memdesc,lr,cmp,cmp2,cmp3,bmdate1,bmdate2,bmdate3,iname_f,iname_t,irelation,iphone,iid_card,sletter,sinv_code

		,cname_f,cname_t,cname_e,cname_b,cbirthday,cnational,cid_tax,cid_card,caddress,czip,chome_t,coffice_t,cmobile,csex,cemail,cdistrictId,camphurId,cprovinceId,cfax,txtoption
		
		) values ('','$mcode' ,'$name_f' ,'$name_t' ,'$name_e','$name_b' ,'$sex' ,'$mdate' ,'$birthday' ,'$age' ,'$occupation' ,'$status' ,'$mar_name' ,'$mar_age' ,'$email' ,'$beneficiaries' ,'$relation' ,'$national' ,'$id_tax' ,'$id_card' ,'$address'  ,'$province','$amphur','$district' ,'$zip' ,'$home_t' ,'$fax','$mobile' , '$mcode_acc' ,'$bonusrec' ,'$bankcode' ,'$branch' ,'$acc_type' ,'$acc_no' ,'$acc_name' ,'$acc_prov' ,'$sv_code' ,'$sp_code' ,'$sp_name' ,'$upa_code' ,'$upa_name' ,'".$_SESSION["admininvent"]."' ,'".$_SESSION["inv_usercode"]."' ,'$posid','$pos_cur','$memdesc','$lr','$cmp','$cmp2','$cmp3','$bmdate1','$bmdate2','$bmdate3','$iname_f','$iname_t','$irelation','$iphone','$iid_card','$sletter','$sinv_code'
		
		,'$cname_f','$cname_t','$cname_e','$cname_b','$cbirthday','$cnational','$cid_tax','$cid_card','$caddress','$czip','$chome_t','$coffice_t','$cmobile','$csex','$cemail','$cdistrict','$camphur','$cprovince','$cfax','$txtoption'
		) ";
			//echo $sql;
			//====================LOG===========================

//=================END LOG===========================
		if (! mysql_query($sql)) {
//			echo "<font color='#FF0000'>error</font><br>";
//			echo  "$sql";	
			echo "<script language='JavaScript'>alert('พบข้อผิดพลาดในการบันทึกกรุณาลองใหม่อีกครั้ง')window.location='index.php?sessiontab=3&sub=666&state=2'</script>";	
			exit;

		}else {
$text="uid=".$_SESSION["admininvent"]." action=memoperate =>$sql";
writelogfile($text);
			if($GLOBALS["status_member"] == 1){
				//if($GLOBALS["sms_credits"] > 0 ){
					if(!empty($mobile)){
						$msisdn = $mobile;
						$subname = substr($name_t,0,15);
					$message = "ยินดีต้อนรับสู่ SUCCESSMORE
ชื่อ $name_t 
รหัส $mcode
รหัสผ่าน $sv_code
ส่งเอกสารก่อน ".date("d-m-Y",strtotime("+1 Month",strtotime($mdate)))." ";
						//$message = "ยินดีต้อนรับสู่ ซัคเซสมอร์ บีอิ้ง รหัส : ".$mcode." รหัสผ่าน : ".$sv_code;
						sendsms($dbprefix,$msisdn,$message,$ScheduledDelivery="",$mcode);
					}
				//}
			}
				if($email){
			$strTo = "$email";
			$strSubject = "=?UTF-8?B?".base64_encode("Welcome to SUCCESSMORE")."?=";
			//$strHeader .= "MIME-Version: 1.0' . \r\n";
			$strHeader = "Content-type: text/html; charset=windows-874\r\n"; 
			$strHeader .= "From: SUCCESSMORE Information<info@successmore.com>";
			//$strVar = "ข้อความภาษาไทย";
			$strMessage = "ยินดีต้อนรับสู่ SUCCESSMORE
				<br><br> รหัสสมาชิกของคุณคือ : $mcode 
				<br> ชื่อผู้สมัครหลัก : $name_f $name_t
				<br> รหัสผ่านสำหรับเข้าระบบ Online : คือ 4 ตัวท้ายของหมายเลขบัตรประชาชนของผู้สมัครหลัก  
				<br><br> ท่านสามารถเข้าสู่ระบบ SUCCESSMORE Online Member Service เพื่อสั่งซื้อสินค้า,สมัครสมาชิกใหม่,เช็คโบนัส หรือดูแลองค์กรของท่านได้ที่ <br> <a href='http://www.successmore.com'>www.successmore.com</a>
				<br> กรุณาส่งใบสมัครและเอกสารประกอบการสมัครภายในวันที่  ".date("d-m-Y",strtotime("+1 Month",strtotime($mdate)))."
				<br><br> หากมีคำถามหรือข้อสงสัยประการใด กรุณาติดต่อ
				<br><br> แผนกดูแลลูกค้า ( Customer Support )
				<br> บริษัท ซัคเซสมอร์ บีอิ้งค์ จำกัด
				<br> โทรศัพท์ 02-5415655 
				<br> Fax 02-5415653 
				<br> Email : <a href='mailto:support@successmore.com'>support@successmore.com</a>
				<br><Br>SUCCESSMORE
				<br> “Inspiration for your Being” 
				<br> “แรงบันดาลใจที่เปลี่ยนชีวิตคุณได้” ";
			$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);
			//	mail("$email","","From:Webmaster<webmaster@cabnetsystem.com>","webmaster@cabnetsystem.com");
		}
			$select = "select max(id) as id from  ".$dbprefix."member ";
			$rs = mysql_query($select);
			$idi = mysql_result($rs,0,'id');
			logtext(true,$_SESSION['admininvent'],'เพิ่มสมาชิก',$idi);
			$sql = "INSERT INTO ".$dbprefix."expdate (mid,exp_date,date_change) VALUES('".$idi."',ADDDATE('".$mdate."', INTERVAL 1 YEAR),'".date("Y-m-d")."')";
			mysql_query($sql);
			if(!empty($cname_t)){
				if($cmp == 'ครบ' and $cmp2 =='ครบ' and $cmp3 =='ครบ' and  $ccmp == 'ครบ'){
					$sql="update ".$dbprefix."member set status_doc = 1 where id=$idi  ";
					mysql_query($sql);

				}else{
					$sql="update ".$dbprefix."member set status_doc = 0 where id=$idi  ";
					mysql_query($sql);

				}
			}else{
				if($cmp == 'ครบ' and $cmp2 =='ครบ' and $cmp3 =='ครบ'){
					$sql="update ".$dbprefix."member set status_doc = 1 where id=$idi  ";
					mysql_query($sql);

				}else{
					$sql="update ".$dbprefix."member set status_doc = 0 where id=$idi  ";
					mysql_query($sql);

				}
			}
			$pcode = "0001";
					//package
					$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."asaleh   ";
					$rs = mysql_query($sql);
					$mid = mysql_result($rs,0,'id')+1;

				$sano = gencodesale();

				//echo $sano;
				//exit;
					
					$sql1 = "SELECT *  FROM ".$dbprefix."product where pcode = '$pcode' ";
					$rs1 = mysql_query($sql1);
					$total  = mysql_result($rs1,0,'price');
					$pdesc  = mysql_result($rs1,0,'pdesc');
					$tot_pv  = mysql_result($rs1,0,'pv');
					//$mcode = $stk[0][$i];
					//$inv_code = $strCode;
						$inv_code = $_SESSION["inv_ref"];

					if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="A";}
					if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate=date("Y-m-d");}
					if($_GET['state']==0){
						//$mid = ++$sano;
						$txtInternet = 0;$txtCash = 0;$txtCredit1 = 0;
						$chkCash = '';$chkInternet = '';$chkCredit1 = '';
						if($payment == '1'){
							$chkCash = 'on';$txtCash = $total;
						}else{
							$chkCredit1 = 'on';$txtCredit1 = $total;
						}
						logtext(true,$_SESSION['admininvent'],'สาขาเพิ่มบิล',$mid);
						$inv_code = $_SESSION['admininvent'];
						$sql="insert into ".$dbprefix."asaleh (id,  name_t,sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv, uid,remark,txtInternet,chkInternet,txtCash,chkCash,txtCredit1,chkCredit1 ,send,scheck,lid,checkportal) values ('$mid' ,'$name_t','$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv' ,'".$_SESSION['inv_usercode']."','','$txtInternet','$chkInternet','$txtCash','$chkCash','$txtCredit1','$chkCredit1','2','register','".$_SESSION['admininvent']."','2') ";						//====================LOG===========================
					$text="uid=".$_SESSION["inv_usercode"]." action=saleoperate =>$sql";
					writelogfile($text);
					//=================END LOG===========================
						mysql_query($sql);
						$pcode1["0"] = $pcode;
						$price["0"] = $total;
						$pdesc1["0"]=$pdesc;
						$pv["0"]=$tot_pv;
						$qty["0"]='1';
						$totalprice["0"]=$total;
						for($i=0;$i<sizeof($pcode1);$i++){
							$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,qty,amt) values ('$mid','$pcode1[$i]','$pdesc1[$i]','$price[$i]' ,'$pv[$i]','$qty[$i]','$totalprice[$i]') ";
							//====================LOG===========================
							$text="uid=".$_SESSION["inv_usercode"]." action=saleoperate =>$sql";
							writelogfile($text);
							//=================END LOG===========================
							//echo $sql."<br />";
							mysql_query($sql);
							if(empty($inv_code))minusProduct($dbprefix,$pcode1[$i],$_SESSION['admininvent'],$qty[$i],$sano,$_SESSION["inv_usercode"]);
							else minusProduct1($dbprefix,$pcode1[$i],$inv_code,$qty[$i],$sano,$_SESSION["inv_usercode"],$_SESSION["admininvent"]);
						}
					}
			
			mysql_query("COMMIT");
			ob_end_clean();
		//	echo "<script language='JavaScript'>window.location='index.php?sessiontab=3'</script>";	
			 echo "<script language='JavaScript'>window.location='index.php?sessiontab=1&sub=12&cmc=$mcode'</script>";	
		}


	}else if($_GET['state']==1 && !system_code($mcode)){
		$objtext = "name_ff : $name_f <br>";
		$objtext .= "name_t : $name_t <br>";
		$objtext .= "name_e : $name_e <br>";
		$objtext .= "name_b : $name_b <br>";
		$objtext .= "sex : $sex <br>";
		$objtext .= "cname_ff : $cname_f <br>";
		$objtext .= "cname_e : $cname_e <br>";
		$objtext .= "cname_b : $cname_b <br>";
		$objtext .= "csex : $csex <br>";
		$objtext .= "mdate : $mdate <br>";
		$objtext .= "birthday : $birthday <br>";
		$objtext .= "age : $age <br>";
		$objtext .= "cbirthday : $cbirthday <br>";
		$objtext .= "cage : $cage <br>";
		$objtext .= "occupation : $occupation <br>";
		$objtext .= "status : $status <br>";
		$objtext .= "mar_name : $mar_name <br>";
		$objtext .= "mar_age : $mar_age <br>";
		$objtext .= "email : $email <br>";
		$objtext .= "cemail : $cemail <br>";
		$objtext .= "beneficiaries : $beneficiaries <br>";
		$objtext .= "relation : $relation <br>";
		$objtext .= "national : $national <br>";
		$objtext .= "id_tax : $id_tax <br>";
		$objtext .= "id_card : $id_card <br>";
		$objtext .= "address : $address <br>";
		$objtext .= "street : $street <br>";
		$objtext .= "building : $building <br>";
		$objtext .= "village : $village <br>";
		$objtext .= "soi : $soi <br>";
		$objtext .= "province : $province <br>";
		$objtext .= "amphur : $amphur <br>";
		$objtext .= "district : $district <br>";
		$objtext .= "zip : $zip_1 $zip_2 $zip_3 $zip_4 $zip_5 <br>";
		$objtext .= "home_t : $home_t <br>";
		$objtext .= "mobile : $mobile <br>";
		$objtext .= "cnational : $cnational <br>";
		$objtext .= "cid_tax : $cid_tax <br>";
		$objtext .= "cid_card : $cid_card <br>";
		$objtext .= "caddress : $caddress <br>";
		$objtext .= "cstreet : $cstreet <br>";
		$objtext .= "cbuilding : $cbuilding <br>";
		$objtext .= "cvillage : $cvillage <br>";
		$objtext .= "camphur : $camphur <br>";
		$objtext .= "cdistrict : $cdistrict <br>";
		$objtext .= "czip : $czip <br>";
		$objtext .= "chome_t : $chome_t <br>";
		$objtext .= "cmobile : $cmobile <br>";
		$objtext .= "cfax : $cfax <br>";
		$objtext .= "czip_1 : $czip_1 $czip_2 $czip_3 $czip_4 $czip_5 <br>";
		$objtext .= "mcode_acc : $mcode_acc <br>";
		$objtext .= "bonusrec : $bonusrec <br>";
		$objtext .= "bankcode : $bankcode <br>";
		$objtext .= "branch : $branch <br>";
		$objtext .= "acc_type : $acc_type <br>";
		$objtext .= "acc_no : $acc_no <br>";
		$objtext .= "acc_name : $acc_name <br>";
		$objtext .= "acc_prov : $acc_prov <br>";
		$objtext .= "sv_code : $sv_code <br>";
		$objtext .= "sp_code : $sp_code <br>";
		$objtext .= "sp_name : $sp_name <br>";
		$objtext .= "upa_code : $upa_code <br>";
		$objtext .= "upa_name : $upa_name <br>";
		$objtext .= "inv_code : $inv_code <br>";
		$objtext .= "lr : $lr <br>";
		$objtext .= "posid : $posid <br>";
		$objtext .= "pos_cur : $pos_cur <br>";
		$objtext .= "memdesc : $memdesc <br>";
		$objtext .= "cmp2 : $cmp2 <br>";
		$objtext .= "cmp3 : $cmp3 <br>";
		$objtext .= "cmp : $cmp <br>";
		$objtext .= "ccmp2 : $ccmp2 <br>";
		$objtext .= "ccmp3 : $ccmp3 <br>";
		$objtext .= "ccmp : $ccmp <br>";
		$objtext .= "bmdate1 : $bmdate1 <br>";
		$objtext .= "bmdate2 : $bmdate2 <br>";
		$objtext .= "bmdate3 : $bmdate3 <br>";
		$objtext .= "cbmdate1 : $cbmdate1 <br>";
		$objtext .= "cbmdate2 : $cbmdate2 <br>";
		$objtext .= "cbmdate3 : $cbmdate3 <br>";
		$objtext .= "chkaddress : $chkaddress <br>";
		$objtext .= "iname_f : $iname_f <br>";
		$objtext .= "iname_t : $iname_t <br>";
		$objtext .= "irelation : $irelation <br>";
		$objtext .= "iphone : $iphone <br>";
		$objtext .= "iid_card : $iid_card <br>";

	//echo $zip;
	//exit;
		logtext1(true,$_SESSION['inv_usercode'],'แก้ไขสมาชิก',$oid,$objtext);
		//$acc_no = $acc_no_1.$acc_no_2.$acc_no_3.$acc_no_4.$acc_no_5.$acc_no_6.$acc_no_7.$acc_no_8.$acc_no_9.$acc_no_10;
		//echo $zip;
		//exit;
		$sql="update ".$dbprefix."member set mcode='$mcode', name_f='$name_f', name_t='$name_t', name_b='$name_b', name_e='$name_e' where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
		$sql="update ".$dbprefix."member set mdate='$mdate', birthday='$birthday',bmdate1 = '$bmdate1',bmdate2 = '$bmdate2', bmdate3 = '$bmdate3',cbmdate1 = '$cbmdate1',cbmdate2 = '$cbmdate2', cbmdate3 = '$cbmdate3', national='$national', id_tax='$id_tax', id_card='$id_card' where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
		$sql="update ".$dbprefix."member set sex='$sex', age='$age', occupation='$occupation', status='$status', mar_name='$mar_name' where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
		$sql="update ".$dbprefix."member set mar_age='$mar_age',sletter='$sletter',sinv_code='$sinv_code', email='$email', beneficiaries='$beneficiaries', relation='$relation' where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
		$sql="update ".$dbprefix."member set address='$address' , provinceId='$province' , amphurId='$amphur' , districtId='$district', posid='$posid'  where id=$oid ";//, pos_cur='$pos_cur'
		mysql_query($sql);
		$sql="update ".$dbprefix."member set zip='$zip', home_t='$home_t',fax='$fax', mobile='$mobile', bonusrec='$bonusrec', bankcode='$bankcode' where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
		$sql="update ".$dbprefix."member set branch='$branch', acc_type='$acc_type', acc_no='$acc_no', acc_name='$acc_name', acc_prov='$acc_prov' where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
		$sql="update ".$dbprefix."member set  sp_code='$sp_code',sp_name='$sp_name'  where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
		$sql="update ".$dbprefix."member set mcode_acc='$mcode_acc',txtoption= '$txtoption' where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
	/*	$sql="update ".$dbprefix."member set lr='$lr' where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================

		mysql_query($sql);*/
		if(!empty($cname_t)){
				if($cmp == 'ครบ' and $cmp2 =='ครบ' and $cmp3 =='ครบ' and  $ccmp == 'ครบ'){
					$sql="update ".$dbprefix."member set status_doc = 1 where id=$oid  ";
					mysql_query($sql);

				}else{
					$sql="update ".$dbprefix."member set status_doc = 0 where id=$oid  ";
					mysql_query($sql);

				}
			}else{
				if($cmp == 'ครบ' and $cmp2 =='ครบ' and $cmp3 =='ครบ'){
					$sql="update ".$dbprefix."member set status_doc = 1 where id=$oid  ";
					mysql_query($sql);

				}else{
					$sql="update ".$dbprefix."member set status_doc = 0 where id=$oid  ";
					mysql_query($sql);

				}
			}
		$sql="update ".$dbprefix."member set memdesc='$memdesc',cmp='$cmp',cmp2='$cmp2' ,cmp3='$cmp3',ccmp='$ccmp',ccmp2='$ccmp2' ,ccmp3='$ccmp3' ,iname_f='$iname_f',iname_t='$iname_t',irelation='$irelation',iphone='$iphone',iid_card='$iid_card' 
		
		,cname_f = '$cname_f',cname_t = '$cname_t',cname_e='$cname_e',cbirthday='$cbirthday',cnational='$cnational',cid_tax='$cid_tax',cid_card='$cid_card',caddress='$caddress',czip='$czip',chome_t='$chome_t',coffice_t='$coffice_t',cmobile='$cmobile',csex='$csex',cemail='$cemail',cdistrictId='$cdistrict',camphurId='$camphur',cprovinceId='$cprovince',cname_b='$cname_b',cfax='$cfax'

		,street='$street',building='$building',village='$village',soi='$soi',cstreet='$cstreet',cbuilding='$cbuilding',cvillage='$cvillage',csoi='$csoi',czip='$czip_1'
		
		
		where id=$oid ";
		//echo $sql;
		///exit;
		//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================


		//$sql = "UPDATE ".$dbprefix."expdate SET exp_date=ADDDATE('".$mdate."', INTERVAL 1 MONTH) WHERE mid='".."' "
		//echo $sql;
		if (!mysql_query($sql)) {
			ob_end_flush();
			echo "<font color='#FF0000'>error</font><br>";
			echo "$sql<br>";
		}
		else {
			mysql_query("COMMIT");
			ob_end_clean();
			//include "mem_main.php";
			 echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=666'</script>";	
			exit;  // done in MEMBEReditadd.php
		}
	}
	function system_code($code){
		$sys_code = array('');
		$code = strtoupper($code);
		for($i=0;$i<sizeof($sys_code);$i++){
			if($sys_code===$code)
				return true;
		}
		return false;
	}
	function genformorecode($start,$ncode){
		$stk[0] = $start;
		$k=0;
		for($i=1;$i<$ncode;$i++){
			$mcodelist[$i-1] = gencode($start+$i);//"TH"."".""
			$stk[sizeof($stk)] = $mcodelist[$i-1];
			$upa_codelist[$mcodelist[$i-1]] = $stk[$k];
			$lrlist[$mcodelist[$i-1]] = ($i%2==0?1:0)+1;
			if($i%2==0) $k++;			
		}
		//print_r($mcodelist);
		//print_r($upa_codelist);
		return array($mcodelist,$upa_codelist,$lrlist);
	}
function minusProduct1($dbprefix,$pcode,$invent,$qty,$sano,$uid,$inv_code){

		 $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
		//exit;
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$pcode2 =$sqlObj->pcode;	
				$qty2 =$sqlObj->qty*$qty;	

				$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode2."' and inv_code = '$invent'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before-$qty2;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','$inv_code','$invent','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','คีย์รับที่สาขา','$uid')";
				mysql_query($sql);

				
				$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode2' and inv_code = '$invent'";
				$rs1 = mysql_query($sql);
				if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";
				else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode2','-$qty2','$invent')";
			//	echo $sql;
			//	exit;
				mysql_query($sql);
			
			}
		}else{


				$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode."' and inv_code = '$invent'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before-$qty;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','$inv_code','$invent','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','คีย์รับที่สาขา','$uid')";
				mysql_query($sql);



			$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
			$rs1 = mysql_query($sql);
			if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
			else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode','-$qty','$invent')";
			mysql_query($sql);

		}
}

function minusProduct($dbprefix,$pcode,$invent,$qty,$sano,$uid){

		 $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
		//exit;
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$pcode2 =$sqlObj->pcode;	
				$qty2 =$sqlObj->qty*$qty;

				$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode2."'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before-$qty2;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','$invent','Head Office','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','บิลขาย','$uid')";
				mysql_query($sql);


				$sql = "update ".$dbprefix."product set qty = qty-$qty2 WHERE pcode='$pcode2' ";
				$rs1 = mysql_query($sql);

			}
		}else{
			$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode."'";
			$rsewallet = mysql_query($sqlewallet);
			if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
			$qty_after=$qty_before-$qty;
			$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
			  values('$sano','$invent','Head Office','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','บิลขาย','$uid')";
			mysql_query($sql);

			$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
			mysql_query($sql);


		}



}
function lrMost($dbprefix,$scode,$lr_val){
		$sql = "SELECT mcode,lr FROM ".$dbprefix."member WHERE upa_code='$scode' AND lr='$lr_val' LIMIT 1 ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0)
			return $scode;
		else
			return lrMost($dbprefix,mysql_result($rs,0,'mcode'),$lr_val);
	}
?>
