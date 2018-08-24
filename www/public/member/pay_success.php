<?
@session_start();
require("connectmysql.php");
require("./cls/repGenerator.php");
include("prefix.php");
require_once("gencode.php");
require_once("function.php");
require_once ("function.log.inc.php");
require_once("logtext.php");
require_once("global.php");


$PMGWRESP = $_POST['PMGWRESP'];

//$PMGWRESP = "00XXXXXXXXXXXX002413XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX00000000001423022015113309000000000300XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXVISACARDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX764XXXXXXXXXXXX";

echo "<br/>ResponseCode ".$ResponseCode = substr($PMGWRESP, 0, 2);
echo "<br/>Reserved1 ".$Reserved1 = substr($PMGWRESP, 2, 12);
echo "<br/>Authorize ".$Authorize = substr($PMGWRESP, 14, 6);
echo "<br/>Reserved2 ".$Reserved2 = substr($PMGWRESP, 20, 36);
echo "<br/>InvoiceNo ".$InvoiceNo = substr($PMGWRESP, 56, 12);
echo "<br/>Timestamp ".$Timestamp = substr($PMGWRESP, 68, 14);
echo "<br/>TransAmount ".$TransAmount = substr($PMGWRESP, 82, 12);
echo "<br/>Reserved3 ".$Reserved3 = substr($PMGWRESP, 40, 94);
echo "<br/>CardType ".$CardType = substr($PMGWRESP, 134, 20);
echo "<br/>Reserved4 ".$Reserved4 = substr($PMGWRESP, 154, 40);
echo "<br/>THBAmount ".$THBAmount = substr($PMGWRESP, 194, 12);
echo "<br/>TransCurrencyISO ".$TransCurrencyISO = substr($PMGWRESP, 206, 3);
echo "<br/>FXRate ".$FXRate = substr($PMGWRESP, 209, 12);




/*
$PMGWRESP2 = $_POST['PMGWRESP2'];

//$PMGWRESP2 = "01104010016057825217035217800764000000000049290120151431394005XXXXXXXX0001XXXXXXXXXXX00000033460000435280001XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXsale-49XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX183.89.226.77XXXXXRKasikornbank Public Company LimitedXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXTHAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX000730303030303030303030303030303030303030300000000000000000000000000000000000000000";

echo "<br/>TransCode ".$TransCode = substr($PMGWRESP2, 0, 4);
echo "<br/>MerchantID ".$MerchantID = substr($PMGWRESP2, 4, 15);
echo "<br/>TerminalID ".$TerminalID = substr($PMGWRESP2, 19, 8);
echo "<br/>ShopNo ".$ShopNo = substr($PMGWRESP2, 27, 2);
echo "<br/>CurrencyCode ".$CurrencyCode = substr($PMGWRESP2, 29, 3);
echo "<br/>InvoiceNo ".$InvoiceNo = substr($PMGWRESP2, 32, 12);
echo "<br/>Datee ".$Datee = substr($PMGWRESP2, 44, 8);
echo "<br/> Timee".$Timee = substr($PMGWRESP2, 52, 6);
echo "<br/>CardNo ".$CardNo = substr($PMGWRESP2, 58, 19);
echo "<br/>ExpiredDate ".$ExpiredDate = substr($PMGWRESP2, 77, 4);
echo "<br/>CVV2_CVC2 ".$CVV2_CVC2 = substr($PMGWRESP2, 81, 4);
echo "<br/>TransAmount ".$TransAmount = substr($PMGWRESP2, 85, 12);
echo "<br/>ResponseCode ".$ResponseCode = substr($PMGWRESP2, 97, 2);
echo "<br/>ApprovalCode ".$ApprovalCode = substr($PMGWRESP2, 99, 6);
echo "<br/>CardType ".$CardType = substr($PMGWRESP2, 105, 3);
echo "<br/>Reference1 ".$Reference1 = substr($PMGWRESP2, 108, 20);
echo "<br/>PlanID ".$PlanID = substr($PMGWRESP2, 128, 3);
echo "<br/>PayMonth ".$PayMonth = substr($PMGWRESP2, 131, 2);
echo "<br/>InterestType ".$InterestType = substr($PMGWRESP2, 133, 1);
echo "<br/>InterestRate ".$InterestRate = substr($PMGWRESP2, 134, 6);
echo "<br/>AmountPerMonth ".$AmountPerMonth = substr($PMGWRESP2, 140, 9);
echo "<br/>TotalAmount ".$TotalAmount = substr($PMGWRESP2, 149, 12);
echo "<br/>ManagementFee ".$ManagementFee = substr($PMGWRESP2, 161, 5);
echo "<br/>InterestMode ".$InterestMode = substr($PMGWRESP2, 166, 2);
echo "<br/>FXRate ".$FXRate = substr($PMGWRESP2, 168, 20);
echo "<br/>THBAmount ".$THBAmount = substr($PMGWRESP2, 188, 20);
echo "<br/>CustomerEmail ".$CustomerEmail = substr($PMGWRESP2, 208, 100);
echo "<br/>Description ".$Description = substr($PMGWRESP2, 308, 150);
echo "<br/>PayerIPAddress ".$PayerIPAddress = substr($PMGWRESP2, 458, 18);
echo "<br/>WarningLight ".$WarningLight = substr($PMGWRESP2, 476, 1);
echo "<br/>SelectedBank ".$SelectedBank = substr($PMGWRESP2, 477, 60);
echo "<br/>IssuerBank ".$IssuerBank = substr($PMGWRESP2, 537, 60);
echo "<br/>SelectedCountry ".$SelectedCountry = substr($PMGWRESP2, 597, 45);
echo "<br/>IPCountry ".$IPCountry = substr($PMGWRESP2, 642, 45);
echo "<br/>IssuerCountry ".$IssuerCountry = substr($PMGWRESP2, 687, 45);
echo "<br/>ECI ".$ECI = substr($PMGWRESP2, 732, 4);
echo "<br/>XID ".$XID = substr($PMGWRESP2, 736, 40);
echo "<br/>CAVV ".$CAVV = substr($PMGWRESP2, 776, 40);



 
*/

//$ref2 = 'regis-18';
//$resp_code = 0;
//$ref2 = 'ewallet-3';
//$successcode = 0;
if (!empty($PMGWRESP)){
	 //do success process

	//$checktype = explode('-',$ref2);
	$checktype[0] = "sale";
	$checktype[1] = (int)$InvoiceNo;
	$successcode = $ResponseCode;
	  echo 'ok';
	  $Q_kbank = "insert into ali_log_kbank_production(ResponseCode,Reserved1,Authorize,Reserved2,InvoiceNo,Timestamp,TransAmount,Reserved3,CardType,Reserved4,TransCurrencyISO,THBAmount,FXRate,PMGWRESP)  values('$ResponseCode','$Reserved1','$Authorize','$Reserved2','$InvoiceNo','$Timestamp','$TransAmount','$Reserved3','$CardType','$Reserved4','$TransCurrencyISO','$THBAmount','$FXRate','$PMGWRESP') ";
	 mysql_query($Q_kbank);
		

	//$selectch = "select name_f from  ".$dbprefix."member where mcode = '$mcode'";
	//$rsch = mysql_query($selectch);
	//$name_f = mysql_result($rsch,0,'name_f');
//var_dump($checktype);
//exit;
if($checktype[0] == 'regis'){
	exit;
    $ref2 = $checktype[1];
	$strSQL = "update ".$dbprefix."member_tmp set credittype = '1',paydate = '".date("Y-m-d H:i:s")."' where id = '".$ref2."' ";
	$objQuery = mysql_query($strSQL);
	$sql = "select * from ".$dbprefix."member_tmp where id = '".$ref2."' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_object($result);
		//checkMember($dbprefix,$mcode);
		$name_f=$row->name_f; $name_t=$row->name_t; $name_e=$row->name_e; $sex=$row->sex; $mdate=$row->mdate;
		$birthday=$row->birthday; $age=$row->age; $occupation=$row->occupation; $status=$row->status; $mar_name=$row->mar_name;
		$mar_age=$row->mar_age; $email=$row->email; $beneficiaries=$row->beneficiaries; $relation=$row->relation; $national=$row->national;
		$id_tax=$row->id_tax;$id_card=$row->id_card;$address=$row->address;$province=$row->province;$amphur=$row->amphur;
		$district=$row->district;$zip=$row->zip;$home_t=$row->home_t;$fax=$row->fax;$mobile=$row->mobile;
		$mcode_acc=$row->mcode_acc;$bonusrec=$row->bonusrec;$bankcode=$row->bankcode;$branch=$row->branch;$acc_type=$row->acc_type;
		$acc_no=$row->acc_no;$acc_name=$row->acc_name;$acc_prov=$row->acc_prov;$sv_code=$row->sv_code;$sp_code=$row->sp_code;
		$sp_name=$row->sp_name;$upa_code=$row->upa_code;$upa_name=$row->upa_name;$inv_code=$row->inv_code;$uid=$row->uid;
		$posid=$row->posid;$pos_cur=$row->pos_cur;$memdesc=$row->memdesc;$lr=$row->lr;$cmp=$row->cmp;$cmp2=$row->cmp2;$cmp3=$row->cmp3;
		$bmdate1=$row->bmdate1;$bmdate2=$row->bmdate2;$bmdate3=$row->bmdate3;$ccmp=$row->ccmp;$ccmp2=$row->ccmp2;$ccmp3=$row->ccmp3;
		$cbmdate1=$row->cbmdate1;$iphone=$row->iphone;$iid_card=$row->iid_card;$sletter=$row->sletter;$sinv_code=$row->sinv_code;
		$irelation=$row->irelation;$cbmdate2=$row->cbmdate2;$cbmdate3=$row->cbmdate3;$iname_f=$row->iname_f;$iname_t=$row->iname_t;
		$cname_f=$row->cname_f;$cname_t=$row->cname_t;$cname_e=$row->cname_e;$cname_b=$row->cname_b;$cbirthday=$row->cbirthday;
		$cnational=$row->cnational;$cid_tax=$row->cid_tax;$cid_card=$row->cid_card;$caddress=$row->caddress;$czip=$row->czip;
		$chome_t=$row->chome_t;$coffice_t=$row->coffice_t;$cmobile=$row->cmobile;$csex=$row->csex;$cemail=$row->cemail;
		$cdistrict=$row->cdistrict;$camphur=$row->camphur;$cprovince=$row->cprovince;$cfax=$row->cfax;$street=$row->street;
		$building=$row->building;$village=$row->village;$soi=$row->soi;$cstreet=$row->cstreet;$cbuilding=$row->cbuilding;
		$cvillage=$row->cvillage;$csoi=$row->csoi;$oid=$row->id;$sbook=$row->sbook;$sbinv_code=$row->sbinv_code;$locationbase=$row->locationbase;$cid_mobile=$row->cid_mobile;


			$sql = "SELECT * FROM ".$dbprefix."member where mcode = '".$sp_code."' ";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs)>0){
					$selfregis = mysql_result($rs,0,'setregis');
					$slr = mysql_result($rs,0,'slr');
					$semail = mysql_result($rs,0,'email');
				}

				if($selfregis == 0){
					if($slr == 0 or $slr == 2){
					$slr = 1;
					}else $slr = 2;
					mysql_query("update ".$dbprefix."member set slr = '$slr' where mcode = '".$sp_code."'  ");
				}else if($selfregis == 1){
					$slr = getweakstrong($dbprefix,$sp_code,'1');
				}else if($selfregis == 2){
					$slr = getweakstrong($dbprefix,$sp_code,'2');
				}

				$upa_code = lrMost($dbprefix,$sp_code,$slr);
				$lr = $slr;

		$upa_code = strtoupper($upa_code);
		$sp_code = strtoupper($sp_code);
		$upa_name = getMember($dbprefix,$upa_code);
		$sp_name =  getMember($dbprefix,$sp_code);
		$sv_code =  substr($id_card, -4, 4); 
		$arr_member = array();
		$arr_member = searchlocationbase($dbprefix,$locationbase);
		$pcode = $arr_member["pcode_register"];
		$crate = $arr_member["crate"];


		$sql = "SELECT MAX(mcode) AS code FROM ".$dbprefix."member ";
		$rs = mysql_query($sql);
		$code = mysql_result($rs,0,'code');
		$mcode = gencode($code+1);

		$sql="insert into ".$dbprefix."member (id,mcode ,name_f ,name_t ,name_e ,name_b ,sex ,mdate ,birthday ,age ,occupation ,status ,mar_name ,mar_age ,email ,beneficiaries ,relation ,national ,id_tax ,id_card ,address ,provinceId,amphurId,districtId ,zip ,home_t ,fax,mobile ,mcode_acc, bonusrec ,bankcode ,branch ,acc_type ,acc_no ,acc_name ,acc_prov ,sv_code ,sp_code ,sp_name ,upa_code ,upa_name ,inv_code ,uid ,posid,pos_cur,memdesc,lr,cmp,cmp2,cmp3,bmdate1,bmdate2,bmdate3,ccmp,ccmp2,ccmp3,cbmdate1,cbmdate2,cbmdate3,iname_f,iname_t,irelation,iphone,iid_card,sletter,sinv_code

		,cname_f,cname_t,cname_e,cname_b,cbirthday,cnational,cid_tax,cid_card,caddress,czip,chome_t,coffice_t,cmobile,csex,cemail,cdistrictId,camphurId,cprovinceId,cfax

		,street,building,village,soi,cstreet,cbuilding,cvillage,csoi,oid,locatinobase,cid_mobile
		
		) values ('','$mcode' ,'$name_f' ,'$name_t' ,'$name_e','$name_b' ,'$sex' ,'$mdate' ,'$birthday' ,'$age' ,'$occupation' ,'$status' ,'$mar_name' ,'$mar_age' ,'$email' ,'$beneficiaries' ,'$relation' ,'$national' ,'$id_tax' ,'$id_card' ,'$address'  ,'$province','$amphur','$district' ,'$zip' ,'$home_t' ,'$fax','$mobile' , '$mcode_acc' ,'$bonusrec' ,'$bankcode' ,'$branch' ,'$acc_type' ,'$acc_no' ,'$acc_name' ,'$acc_prov' ,'$sv_code' ,'$sp_code' ,'$sp_name' ,'$upa_code' ,'$upa_name' ,'".$inv_code."' ,'$uid' ,'$posid','$pos_cur','$memdesc','$lr','$cmp','$cmp2','$cmp3','$bmdate1','$bmdate2','$bmdate3','$ccmp','$ccmp2','$ccmp3','$cbmdate1','$cbmdate2','$cbmdate3','$iname_f','$iname_t','$irelation','$iphone','$iid_card','$sletter','$sinv_code'
		
		,'$cname_f','$cname_t','$cname_e','$cname_b','$cbirthday','$cnational','$cid_tax','$cid_card','$caddress','$czip','$chome_t','$coffice_t','$cmobile','$csex','$cemail','$cdistrict','$camphur','$cprovince','$cfax'

		,'$street','$building','$village','$soi','$cstreet','$cbuilding','$cvillage','$csoi','$oid','$locationbase','$cid_mobile'
		) ";
		if (! mysql_query($sql)) {	
			echo "<script language='JavaScript'>alert('พบข้อผิดพลาดในการบันทึกกรุณาลองใหม่อีกครั้ง')window.location='index.php?sessiontab=1&sub=3'</script>";
			exit;
		}else {
			mysql_free_result($rs);
			$sql = "UPDATE ".$dbprefix."member_tmp SET mcode_ref='$mcode' WHERE id='".$ref2."'  ";
			mysql_query($sql);

				if($GLOBALS["status_member"] == 1){
				//if($GLOBALS["sms_credits"] > 0 ){
					if(!empty($mobile)){
						$msisdn = $mobile;
						$subname = substr($name_t,0,15);
						$message = "ยินดีต้อนรับสู่ Lachule Asia
	ชื่อ $name_t 
	รหัส $mcode
	รหัสผ่าน $sv_code
	ส่งเอกสารก่อน ".date("d-m-Y",strtotime("+1 Month",strtotime($mdate)))." ";
						//$message = "ยินดีต้อนรับสู่ ซัคเซสมอร์ บีอิ้ง รหัส : ".$mcode." รหัสผ่าน : ".$sv_code;
						$arr_member1 = array();
						$arr_member1 =  searchlocationbase($dbprefix,$cid_mobile);
						if($arr_member1["smssending"]=='1')sendsms($dbprefix,$msisdn,$message,$ScheduledDelivery="",$mcode);
					}
				//}
			}

		if($email){
			$strTo = "$email";
			$strSubject = "=?UTF-8?B?".base64_encode("Welcome to Lachule Asia ")."?=";
			//$strHeader .= "MIME-Version: 1.0' . \r\n";
			$strHeader = "Content-type: text/html; charset=windows-874\r\n"; 
			$strHeader .= "From: Lachule Asia Information<info@lachule.com>";
			//$strVar = "ข้อความภาษาไทย";
			$strMessage = "ยินดีต้อนรับสู่ Lachule Asia
				<br><br> รหัสสมาชิกของคุณคือ : $mcode 
				<br> ชื่อผู้สมัครหลัก : $name_f $name_t
				<br> รหัสผ่านสำหรับเข้าระบบ Online : คือ 4 ตัวท้ายของหมายเลขบัตรประชาชนของผู้สมัครหลัก  
				<br><br> ท่านสามารถเข้าสู่ระบบ Lachule Asia Online Member Service เพื่อสั่งซื้อสินค้า,สมัครสมาชิกใหม่,เช็คโบนัส หรือดูแลองค์กรของท่านได้ที่ <br> <a href='http://www.lachule.com'>www.lachule.com</a>
				<br> กรุณาส่งใบสมัครและเอกสารประกอบการสมัครภายในวันที่  ".date("d-m-Y",strtotime("+1 Month",strtotime($mdate)))."
				<br><br> หากมีคำถามหรือข้อสงสัยประการใด กรุณาติดต่อ
				<br><br> แผนกดูแลลูกค้า ( Customer Support )";
			$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);
			//	mail("$email","","From:Webmaster<webmaster@cabnetsystem.com>","webmaster@cabnetsystem.com");
		}
//			$insert_id = mysql_insert_id($link);

			$select = "select max(id) as id from  ".$dbprefix."member";
			$rs = mysql_query($select);
			$idi = mysql_result($rs,0,'id');
		
			$sql = "INSERT INTO ".$dbprefix."expdate (mid,exp_date,date_change) VALUES('".$idi."',ADDDATE('".$mdate."', INTERVAL 1 YEAR),'".$arr_member["datetimezone"]."')";
			mysql_query($sql);

			//package
			$_GET['state'] = 1;
			if(isset($_GET['state'])){
			$sql = "SELECT MAX(id) AS id  FROM ".$dbprefix."asaleh ";
			$rs = mysql_query($sql);
			$mid = $sano = mysql_result($rs,0,'id');
			mysql_free_result($rs);
			
		
			$sql1 = "SELECT *  FROM ".$dbprefix."product where pcode = '$pcode' ";
			$rs1 = mysql_query($sql1);
			$total  = mysql_result($rs1,0,'price');
			$bprice  = mysql_result($rs1,0,'bprice');
			$cprice  = mysql_result($rs1,0,'customer_price');
			$pdesc  = mysql_result($rs1,0,'pdesc');
			$tot_pv  = mysql_result($rs1,0,'pv');
			$mcode = $mcode;
			$inv_code = $strCode;
			//if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
			//if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
			//if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
			if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="A";}
			if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate=$arr_member["datetimezone"];}
			//if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
			//if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
				//$mid = ++$sano;
				$sql = "SELECT MAX(id) AS id  FROM ".$dbprefix."asaleh   ";
				$rs = mysql_query($sql);
				$mid = mysql_result($rs,0,'id')+1;
				$arr_member = array();
				$arr_member =  searchlocationbase($dbprefix,$locationbase);
				$sano = gencodesale_ON($sanof);

				logtext(true,$_SESSION['usercode'],'เพิ่มบิล',$mid);
				$sql="insert into ".$dbprefix."asaleh (id,  sano,name_t, sadate,  mcode,  sa_type, inv_code,  total,bprice,customer_total, tot_pv, uid,remark,txtCredit1,chkCredit1,scheck,checkportal,send,caddress,cdistrictId,camphurId,cprovinceId,czip,locationbase,name_f ,crate) values ('$mid' ,'$sano' ,'$name_t','$sadate' ,'$mcode', '$satype' ,'$sbinv_code' ,'$total','$bprice' ,'$cprice' ,'$tot_pv' ,'$mcode','','$total','on','register','3','$sbook','$caddress1','$cdistrict','$camphur','$cprovince','$czip','$locationbase','$name_f','$crate') ";
				//====================LOG===========================

			$text="uid=".$_SESSION["usercode"]." action=saleoperate =>$sql";
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
					$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,bprice,pv,qty,amt,locationbase,customer_price) values ('$mid','$pcode1[$i]','$pdesc1[$i]','$price[$i]' ,'$bprice' ,'$pv[$i]','$qty[$i]','$totalprice[$i]','$locationbase','$cprice') ";
					//====================LOG===========================
			$text="uid=".$_SESSION["usercode"]." action=saleoperate =>$sql";
			writelogfile($text);
			//=================END LOG===========================
					//echo $sql."<br />";
					mysql_query($sql);
					updatestockcard($dbprefix,$mcode,$sbinv_code,"ONLIN",$sano,$sanox,$sadate,$rccode,$satype,$pcode1[$i],$mcode,$qty[$i],$price[$i],$totalprice[$i]);
					calc_stock($dbprefix,$pcode1[$i],$sbinv_code,$qty[$i],$sano,$mcode,$inv_code,$satype,'0');

					/// ป๋มเพิ่มเอง เรื่อง stock
					//$sql = "update ".$dbprefix."product set qty=qty-$qty[$i] where pcode='$pcode1[$i]'";
					//mysql_query($sql);
					//$sql = "update tbl_stock set stock_quantity = stock_quantity-1 where product_ID = '$pcode1[$i]' and user_ID = '{$_SESSION["usercode"]}' ";
					//mysql_query($sql);
					/// ป๋มเพิ่มเอง เรื่อง stock
				}
					
				}
			}
	}


}else if($checktype[0] == 'ewallet'){
		exit;
		$ref2 = $checktype[1];
		if($successcode == '0'){
			$strSQL = "update ali_transferewallet_h set credittype = '1',paydate = '".date("Y-m-d H:i:s")."' where id = '".$ref2."' ";
			 $objQuery = mysql_query($strSQL);

			$sql = "SELECT MAX(id) AS id  FROM ".$dbprefix."ewallet   ";
			$rs = mysql_query($sql);
			$sano = $mid = mysql_result($rs,0,'id')+1;

			//$sano = gencodesale();
			$sql = "select * from ali_transferewallet_h where id = '".$ref2."' ";
			$result=mysql_query($sql);
			if (mysql_num_rows($result)>0) {
				$row = mysql_fetch_object($result);

				
				$mcode=$row->mcode;
				$satype=$row->sa_type;
				$inv_code=$row->inv_code;
				$txtMoney = $total=$row->total;
				$tot_pv=$row->tot_pv;
				$tot_weight=$row->tot_weight;
				$tot_fv=$row->tot_fv;
				$uid=$row->uid;
				$radsend=$row->radsend;
				$txtoption=$row->txtoption;
				$chkCredit1=$row->total;
				$trnf=$row->trnf;
				$name_t=$row->name_t;
				$caddress=$row->caddress;
				$cdistrict=$row->cdistrict;
				$camphur=$row->camphur;
				$cprovince=$row->cprovince;
				$czip=$row->czip;
				$tot_pv=$row->tot_pv;
				$total=$row->total;
				$bprice=$row->bprice;
				$locationbase=$row->locationbase;
				$arr_member = array();
				$arr_member =  searchlocationbase($dbprefix,$locationbase);
				$sadate= $arr_member["datetimezone"];
				$mbase=$row->mbase;
				$crate=$row->crate;
				$hdate = $arr_member["edatetimezone"];
				$sqlewallet = " select ewallet,mobile,name_f,name_t from ".$dbprefix."member where mcode = '".$mcode."'";
				//echo $sqlewallet;
				
				$rsewallet = mysql_query($sqlewallet);
				$ewallet_before=mysql_result($rsewallet,0,'ewallet');
				$mobile=mysql_result($rsewallet,0,'mobile');
				$name_f=mysql_result($rsewallet,0,'name_f');
				$name_t=mysql_result($rsewallet,0,'name_t');
				//echo 's';exit;
				$ewallet_after = $ewallet_before-$total;

				$sql = "SELECT MAX(id) AS id  FROM ".$dbprefix."ewallet   ";
				$rs = mysql_query($sql);
				$mid = mysql_result($rs,0,'id')+1;
				$arr_member = array();
				$arr_member =  searchlocationbase($dbprefix,$locationbase);
				$sano = gencodesale_online1($arr_member["cshort"]);



				$sql="insert into ".$dbprefix."ewallet (id,  sano, sadate,  mcode,  sa_type, inv_code,  total,bprice,  uid,send,txtoption,
				txtMoney,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,
				optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,ewallet_before,ewallet_after,checkportal,locationbase,name_f,name_t,mbase,crate
				
				) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$uid','$radsend','$txtoption'
				,'$txtMoney','$bprice','$chkCash','$chkFuture','$chkTransfer','on','$chkCredit2','$chkCredit3','$txtCash','$txtFuture',
				'$txtTransfer','$total','$txtCredit2','$txtCredit3','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','".$ewallet_before."','".$ewallet_after."','3','$locationbase','$name_f','$name_t','$mbase','$crate'
				) ";
				

				mysql_query($sql);

				mysql_query("update ".$dbprefix."member set ewallet = ewallet+".$txtMoney.",bewallet = bewallet+".$bprice." where mcode='".$mcode."' ");
				mysql_query("update ".$dbprefix."transferewallet_h set sano = '$mid' where id = '".$ref2."'" );

				
			}
		}
	}else if($checktype[0] == 'sale'){

		$ref2 = $checktype[1];
		$chkBill = "select * from ".$dbprefix."transfersale_h where id = '".$ref2."' and credittype=0 and sano=''";
		$rBill=mysql_query($chkBill);
		$countBill = mysql_num_rows($rBill);
		
		if($successcode == '00' and ($countBill>0)){
			echo "<br><br><br><br><br><br>Okkkkkkkk";
			$strSQL = "update ali_transfersale_h set credittype = '1',paydate = '".date("Y-m-d H:i:s")."' where id = '".$ref2."' ";
			$objQuery = mysql_query($strSQL);

			$sql = "SELECT MAX(id) AS id  FROM ".$dbprefix."asaleh   ";
			$rs = mysql_query($sql);
			$mid = mysql_result($rs,0,'id')+1;

			echo "<br><br><br><br><br><br>Okkkkkkkk".$mid;

			
			$sql = "select * from ".$dbprefix."transfersale_h where id = '".$ref2."' ";
			$result=mysql_query($sql);
			if (mysql_num_rows($result)>0) {
				$row = mysql_fetch_object($result);
					//$sadate= date("Y-m-d");
					$mcode=$row->mcode;
					$satype=$row->sa_type;
					$inv_code=$row->inv_code;
					$total=$row->total;
					$tot_pv=$row->tot_pv;
					$tot_weight=$row->tot_weight;
					$tot_fv=$row->tot_fv;
					$uid=$row->uid;
					$radsend=$row->send;
					$txtoption=$row->txtoption;
					$chkCredit1=$row->total;
					$trnf=$row->trnf;
					$name_t=$row->name_t;
					$caddress=$row->caddress;
					$cdistrict=$row->cdistrictId;
					$camphur=$row->camphurId;
					$cprovince=$row->cprovinceId;
					$czip=$row->czip;
					$tot_pv=$row->tot_pv;
					$total=$row->total;
					$locationbase=$row->locationbase;
					$bprice=$row->bprice;
					$cprice=$row->customer_total;
					$mbase=$row->mbase;
					$crate=$row->crate;
					$cmobile=$row->cmobile;
					$cname=$row->cname;
					$scheck=$row->scheck;

					$sql = "SELECT name_f  FROM ".$dbprefix."member where mcode = '$mcode'   ";
					$rs = mysql_query($sql);
					$name_f = mysql_result($rs,0,'name_f');
					$arr_member = array();
					$arr_member =  searchlocationbase($dbprefix,$locationbase);
					$sano = gencodesale_ON($inv_code);

					mysql_query("update ".$dbprefix."transfersale_h set sano = '$sano' where id = '".$ref2."'" );

//					$hdate=$row->hdate;
					//$hdate= date("Y-m-t");
					$sadate= $arr_member["datetimezone"];
					$hdate = $arr_member["edatetimezone"];
					 $sql="insert into ".$dbprefix."asaleh (id,  sano, sadate,  mcode,  sa_type, inv_code,  total,bprice,customer_total, tot_pv,tot_weight,tot_fv, uid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
					optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther,trnf,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,online,checkportal,hpv,htotal,hdate,locationbase,mbase,cname,cmobile,name_f,crate,scheck) 
					
					values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total','$bprice','$cprice' ,'$tot_pv','$tot_weight','$tot_fv' ,'$uid','$radsend','$txtoption','$chkCash','$chkFuture','$chkTransfer','on','$chkCredit2','$chkCredit3','','$chkDiscount','$chkOther','$txtCash','$txtFuture',
					'$txtTransfer','$total','$txtCredit2','$txtCredit3','0','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','$trnf','$name_t','$caddress','$cdistrict','$camphur','$cprovince','$czip','1','3','$tot_pv','$total','$hdate','$locationbase','$mbase','$cname','$cmobile','$name_f','$crate','$scheck') ";
					echo "<br><br><br><br><br><br>".$sql;
					mysql_query($sql);
					
					echo "<br><br><br><br><br><br>Okkkkk888".$sql;
					echo "<br><br><br><br><br><br>Okkkkk9999".$mid;
					$sql = "select * from ".$dbprefix."transfersale_d where sano='$ref2'";
					echo "<br><br><br><br><br><br>".$sql;
					//exit;
					$result1234 = mysql_query($sql);
					for($i=0;$i<mysql_num_rows($result1234);$i++){
						$data = mysql_fetch_object($result1234);
						$pcode[$i] =$data->pcode;
						$qty[$i] =$data->qty;
						$pdesc[$i] =$data->pdesc;
						$price[$i] =$data->price;
						$pv[$i] =$data->pv;
						$totalprice[$i] =$data->amt;
						//$inv_code[$i] =$data->inv_code;
						$unit[$i] =$data->unit;
						$customer_price =$data->customer_price;

						//$inv_codeold =$data->inv_code;
						$sql="SELECT weight,unit,bprice,customer_price,vat FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
						$rs = mysql_query($sql);
						if(mysql_num_rows($rs) > 0)
						{
							for($m=0;$m<mysql_num_rows($rs);$m++){
								
								$sqlObj = mysql_fetch_object($rs);
								$weight[$i] =$sqlObj->weight;	
								$bprice[$i] =$sqlObj->bprice;	
								$cprice[$i] =$sqlObj->customer_price;	
								$unit[$i] =$sqlObj->unit;	
								$vat =$sqlObj->vat;
							}
						}else{
							$sql="SELECT weight,unit,bprice,customer_price,vat FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
							$rs = mysql_query($sql);
							if(mysql_num_rows($rs) > 0)
							{
								$sqlObj = mysql_fetch_object($rs);
								$weight[$i] =$sqlObj->weight;	
								$bprice[$i] =$sqlObj->bprice;	
								$cprice[$i] =$sqlObj->customer_price;	
								$unit[$i] =$sqlObj->unit;	
								$vat =$sqlObj->vat;
							}
						}

						if($pcode[$i] == $GLOBALS["pcode_extend"]){
							$selectch = "select id as id,mdate from  ".$dbprefix."member where mcode = '$mcode'";
							$rsch = mysql_query($selectch);
							$idi = mysql_result($rsch,0,'id');
							$mdate = mysql_result($rsch,0,'mdate');
							$select = "SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate where mid='$idi' GROUP BY mid";
							$rs = mysql_query($select);
							if(mysql_num_rows($rs) > 0)	$exp_date = mysql_result($rs,0,'exp_date');
							if(empty($exp_date))$exp_date = $mdate;
							$sql = "INSERT INTO ".$dbprefix."expdate (mid,exp_date,date_change,exp_type,sano) VALUES('".$idi."',ADDDATE('".$exp_date."', INTERVAL 1 YEAR),'".$arr_member["datetimezone"]."','extend','$mid')";
							//echo $sql;
							//exit;
							mysql_query($sql);
							//$sql="update ".$dbprefix."expdate set exp_date=ADDDATE(exp_date, INTERVAL 1 YEAR) where mid=$idi ";
								//exit;	//====================LOG===========================
							//$text="uid=".$_SESSION["adminuserid"]." action=memoperate =>$sql";
							//mysql_query($sql);
						}

						// Sum Vat ////////
						if($vat == '0'){
							$total_exvat+=($qty[$i]*$price[$i]); //รราคา ไม่รวม vat
						}else{
							$vat_sum = ($qty[$i]*$price[$i]*$vat/(100+$vat));
							//$total_invat+= ($qty[$i]*$price[$i]) - $vat; 	//รราคาก่อน vat
							$total_vat+=($qty[$i]*$price[$i]*$vat/(100+$vat));
							//$total_vat+=($qty[$i]*$price[$i]*100/(100+$vat[$i]));
							$total_invat_sum+= ($qty[$i]*$price[$i])-$vat_sum;
						}
						$total_all+=($qty[$i]*$price[$i]);

					$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,bprice,customer_price,pv,weight,fv,qty,amt,inv_code,unit,locationbase,vat) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]','$bprice[$i]' ,'$customer_price' ,'$pv[$i]','$weight[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code','$unit[$i]','$locationbase','$vat') ";
					//echo $sql.'<br>';
					echo "<br><br><br><br><br><br>".$sql;
					mysql_query($sql);

					updatestockcard($dbprefix,$mcode,$inv_code,"ONLIN",$sano,$sanox,$sadate,$rccode,$satype,$pcode[$i],$mcode,$qty[$i],$price[$i],$totalprice[$i]);
					calc_stock($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$mcode,$inv_code,$satype,'0');
					//minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
				}
				//if($satype == 'A')updatePos($dbprefix,$mcode,date("Y-m-d"),$tot_pv);
				
				// UPDATE Vat ////////
				$total_net=$total_all-$total_vat;
				$total_vat=  round($total_vat,2); 
				$total_net= round($total_net,2); 
				$total_invat = round($total_invat,2); 
				$total_exvat = round($total_exvat,2); 
				$Qvat = "update ".$dbprefix."asaleh set total_vat= '$total_vat',total_net='$total_net',total_invat='$total_invat_sum',total_exvat='$total_exvat' where id = '$mid' ";
				mysql_query($Qvat);

			}
		}
	}


		
		/*$sql = "SELECT mcode FROM ".$dbprefix."asaleh where id = '".$checktype[0]."'  ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$mcode = mysql_result($rs,0,'mcode');
			$sql11 = "UPDATE ".$dbprefix."membertmp SET transfer=1 WHERE mcode = '$mcode' ";
			mysql_query($sql11);
			mysql_free_result($rs);
		}*/


}
else{
//do error process
echo 'not ok';
}





?>
<?
function minusProduct1($dbprefix,$pcode,$invent,$qty,$sano,$uid){

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
				  values('$sano','Head Office','$invent','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','คีย์รับที่สาขา','$uid')";
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
				  values('$sano','Head Office','$invent','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','คีย์รับที่สาขา','$uid')";
				mysql_query($sql);



			$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
			$rs1 = mysql_query($sql);
			if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
			else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode','-$qty','$invent')";
			mysql_query($sql);

		}
}

function minusProduct($dbprefix,$pcode,$invent,$qty,$sano){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	//$pcode1 = explode('_',$pcode);
	//if($pcode1[0] == 'PD'){

	//$ewallet_after = $ewallet_before-$total;
	

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
				  values('$sano','Head Office','Head Office','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','บิลขาย','$invent')";
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
			  values('$sano','Head Office','Head Office','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','บิลขาย','$invent')";
			mysql_query($sql);

			$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
			mysql_query($sql);


		}
	
}
 
function dateDiff($startDate, $endDate) { 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 

} 
function expdate($startdate,$datenum){
 $startdatec=strtotime($startdate); // ทำให้ข้อความเป็นวินาที
 $tod=$datenum*86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
 $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
 return $ndate; // ส่งค่ากลับ
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
function minusProduct22($dbprefix,$pcode,$invent,$qty,$sano,$uid,$inv_code){

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

function minusProduct21($dbprefix,$pcode,$invent,$qty,$sano,$uid){

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

function getweakstrong($dbprefix,$sp_code,$checkws){

	$sql="SELECT rcode,fdate,tdate FROM ".$dbprefix."around WHERE calc='1' and tdate like '%".date("Y-m", strtotime("-1 month", strtotime(date("F") . "10")) )."%' ORDER BY rcode DESC LIMIT 1";
	//echo $sql;
	$rs = mysql_query($sql);
	$where_cause = "";
	$max_rcode = 0;
	if(mysql_num_rows($rs)>0){
		$where_cause = "AND sadate>'".mysql_result($rs,0,'tdate')."' ";
		$max_rcodeo = mysql_result($rs,0,'rcode');
	}

	$sql="SELECT * FROM ".$dbprefix."asaleh  WHERE sa_type='A'  and cancel = 0 $where_cause ORDER BY sadate"; //AND (sa_type='T' OR sa_type='P') AND sa_type='A'
		//echo $sql;
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;
			$mexp[$sqlObj->mcode] += $sqlObj->tot_pv;
		}
		mysql_free_result($rs);
		$sql="SELECT * FROM ".$dbprefix."holdhead  WHERE sa_type='A' and cancel = 0 $where_cause ORDER BY sadate"; //AND (sa_type='T' OR sa_type='P') AND sa_type='A'
		//echo $sql;
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;
			$mexp[$sqlObj->mcode] += $sqlObj->tot_pv;
		}
		mysql_free_result($rs);

		
		for($i=0;$i<sizeof($mcode);$i++){
			$up = $mcode[$i];
			if(isLine($dbprefix,$mcode,$sp_code) == true){
				while($up <> ""){
					if($up == "") break;
					if($upa_code[$up] <>""){
						$sum_pv[$upa_code[$up]][$lr[$up]] += $tot_pv[$mcode[$i]];
						if($tot_pv[$mcode[$i]] > 0)
							$count[$upa_code[$up]][$lr[$up]]++;
					}
					$up = $upa_code[$up];
				}
			}
		}

		$sql="SELECT * FROM ".$dbprefix."bmbonus WHERE rcode='$max_rcodeo' and mcode = '$sp_code' ";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$pcarry_l  = $sqlObj->carry_l;
			$pcarry_c  = $sqlObj->carry_c;
		}
		$sum_l = $pcarry_l+$sum_pv[$sp_code][1] ;
		$sum_r = $pcarry_l+$sum_pv[$sp_code][1] ;
		if($checkws == '1'){
			if($sum_l <= $sum_r)$slr = 1;
			else $slr = 2;
		}else if($checkws == '2'){
			if($sum_l <= $sum_r)$slr = 2;
			else $slr = 1;
		}
		return $slr;

}
function isLine($dbprefix,$mcode,$sp_code){
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