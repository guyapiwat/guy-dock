<?
require_once("gencode.php");
require_once("global.php");
$id = $_GET['id'];
 if(isset($_GET['tstype'])){
 	$sql = "UPDATE ".$dbprefix."member_tmp SET transtype='".$_GET['tstype']."' WHERE id='".$id."' and cancel = 0 ";
	mysql_query($sql);
 }else if(isset($_GET['ptype']) and $_GET['ptype'] == '1'){

	 $sql = "SELECT *  FROM ".$dbprefix."member_tmp  WHERE id='".$id."' and cancel = 0 and credittype = '1' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		 echo "<script language='JavaScript'>alert('รหัสนี้ได้ชำระผ่านบัตรเครดิตแล้ว');window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";
		exit;
	}

	$sql = "UPDATE ".$dbprefix."member_tmp SET paytype='".$_GET['ptype']."',paydate = '".date("Y-m-d H:i:s")."' WHERE id='".$id."' and cancel = 0 and credittype <> '1' ";
	$rsss = mysql_query($sql);
			$ref2 = $id;
			$sql = "SELECT MAX(id) AS id  FROM ".$dbprefix."ewallet   ";
			$rs = mysql_query($sql);
			$sano = $mid = mysql_result($rs,0,'id')+1;

			//$sano = gencodesale();
			$sql = "select * from ali_member_tmp  WHERE id='".$id."' and cancel = 0 and credittype <> '1' ";
			
			$result123=mysql_query($sql);
				
			$sql = "select * from ali_member_tmp where id = '".$id."' ";
			
			$result=mysql_query($sql);
			if (mysql_num_rows($result)>0 and mysql_num_rows($result123)>0  ) {
				$row = mysql_fetch_object($result);
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

				$sql = "SELECT MAX(mcode) AS code FROM ".$dbprefix."member ";
				$rs = mysql_query($sql);
				$code = mysql_result($rs,0,'code');
				$mcode = gencode($code+1);

				$sql="insert into ".$dbprefix."member (id,mcode ,name_f ,name_t ,name_e ,name_b ,sex ,mdate ,birthday ,age ,occupation ,status ,mar_name ,mar_age ,email ,beneficiaries ,relation ,national ,id_tax ,id_card ,address ,provinceId,amphurId,districtId ,zip ,home_t ,fax,mobile ,mcode_acc, bonusrec ,bankcode ,branch ,acc_type ,acc_no ,acc_name ,acc_prov ,sv_code ,sp_code ,sp_name ,upa_code ,upa_name ,inv_code ,uid ,posid,pos_cur,memdesc,lr,cmp,cmp2,cmp3,bmdate1,bmdate2,bmdate3,ccmp,ccmp2,ccmp3,cbmdate1,cbmdate2,cbmdate3,iname_f,iname_t,irelation,iphone,iid_card,sletter,sinv_code

				,cname_f,cname_t,cname_e,cname_b,cbirthday,cnational,cid_tax,cid_card,caddress,czip,chome_t,coffice_t,cmobile,csex,cemail,cdistrictId,camphurId,cprovinceId,cfax

				,street,building,village,soi,cstreet,cbuilding,cvillage,csoi,oid,locationbase,cid_mobile
				
				) values ('','$mcode' ,'$name_f' ,'$name_t' ,'$name_e','$name_b' ,'$sex' ,'$mdate' ,'$birthday' ,'$age' ,'$occupation' ,'$status' ,'$mar_name' ,'$mar_age' ,'$email' ,'$beneficiaries' ,'$relation' ,'$national' ,'$id_tax' ,'$id_card' ,'$address'  ,'$province','$amphur','$district' ,'$zip' ,'$home_t' ,'$fax','$mobile' , '$mcode_acc' ,'$bonusrec' ,'$bankcode' ,'$branch' ,'$acc_type' ,'$acc_no' ,'$acc_name' ,'$acc_prov' ,'$sv_code' ,'$sp_code' ,'$sp_name' ,'$upa_code' ,'$upa_name' ,'".$inv_code."' ,'".$_SESSION["adminusercode"]."' ,'$posid','$pos_cur','$memdesc','$lr','$cmp','$cmp2','$cmp3','$bmdate1','$bmdate2','$bmdate3','$ccmp','$ccmp2','$ccmp3','$cbmdate1','$cbmdate2','$cbmdate3','$iname_f','$iname_t','$irelation','$iphone','$iid_card','$sletter','$sinv_code'
				
				,'$cname_f','$cname_t','$cname_e','$cname_b','$cbirthday','$cnational','$cid_tax','$cid_card','$caddress','$czip','$chome_t','$coffice_t','$cmobile','$csex','$cemail','$cdistrict','$camphur','$cprovince','$cfax'

				,'$street','$building','$village','$soi','$cstreet','$cbuilding','$cvillage','$csoi','$oid','$locationbase','$cid_mobile'
				) ";
				if (! mysql_query($sql)) {
		//			echo "<font color='#FF0000'>error</font><br>";
		//			echo  "$sql";		
					echo "<script language='JavaScript'>alert('พบข้อผิดพลาดในการบันทึกกรุณาลองใหม่อีกครั้ง')window.location='index.php?sessiontab=3&sub=44'</script>";
					exit;
				}else {
					mysql_free_result($rs);
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
								if($cid_mobile == '1')sendsms($dbprefix,$msisdn,$message,$ScheduledDelivery="",$mcode);
								
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

					if($semail){
						$strTo = "$semail";
						$strSubject = "=?UTF-8?B?".base64_encode("You have new Successmore Member")."?=";
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
		//			$insert_id = mysql_insert_id($link);
					$select = "select max(id) as id from  ".$dbprefix."member";
					$rs = mysql_query($select);
					$idi = mysql_result($rs,0,'id');

					$sql = "INSERT INTO ".$dbprefix."expdate (mid,exp_date,date_change) VALUES('".$idi."',ADDDATE('".$mdate."', INTERVAL 1 YEAR),'".date("Y-m-d")."')";
					mysql_query($sql);

					//package
					if(isset($_GET['state'])){
					$sql = "SELECT MAX(id) AS id  FROM ".$dbprefix."asaleh ";
					$rs = mysql_query($sql);
					$mid = $sano = mysql_result($rs,0,'id');
					mysql_free_result($rs);
					
				
					$sql1 = "SELECT *  FROM ".$dbprefix."product where pcode = '$pcode' ";
					$rs1 = mysql_query($sql1);
					$total  = mysql_result($rs1,0,'price');
					$bprice  = mysql_result($rs1,0,'bprice');
					$pdesc  = mysql_result($rs1,0,'pdesc');
					$tot_pv  = mysql_result($rs1,0,'pv');
					$mcode = $mcode;
					$inv_code = $strCode;
					//if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
					//if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
					//if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
					if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="A";}
					if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate=date("Y-m-d");}
					//if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
					//if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
						//$mid = ++$sano;
						$sql = "SELECT MAX(id) AS id  FROM ".$dbprefix."asaleh   ";
						$rs = mysql_query($sql);
						$mid = mysql_result($rs,0,'id')+1;
						$sano = gencodesale();

						logtext(true,$_SESSION['usercode'],'เพิ่มบิล',$mid);
						$sql="insert into ".$dbprefix."asaleh (id,  sano,name_t, sadate,  mcode,  sa_type, inv_code,  total,bprice, tot_pv, uid,remark,txtTransfer,chkTransfer,scheck,checkportal,send,caddress,cdistrictId,camphurId,cprovinceId,czip ,locationbase) values ('$mid' ,'$sano' ,'$name_t','$sadate' ,'$mcode', '$satype' ,'$sbinv_code' ,'$total' ,'$tot_pv' ,'".$_SESSION['adminusercode']."','','$total','$bprice','on','register','3','$sbook','$caddress1','$cdistrict','$camphur','$cprovince','$czip','$locationbase') ";
						//====================LOG===========================
			
					$text="uid=".$_SESSION["usercode"]." action=saleoperate =>$sql";
					writelogfile($text);
					//=================END LOG===========================
						mysql_query($sql);
						/*if(isset($_POST['pcode'])){
							$pcode=$_POST['pcode'];
							$pdesc=$_POST['pdesc'];
							$price=$_POST['price'];
							$pv=$_POST['pv'];
							$qty=$_POST['qty'];
							$totalprice=$_POST['totalprice'];
						}*/
						$pcode1["0"] = $pcode;
						$price["0"] = $total;
						$pdesc1["0"]=$pdesc;
						$pv["0"]=$tot_pv;
						$qty["0"]='1';
						$totalprice["0"]=$total;
						for($i=0;$i<sizeof($pcode1);$i++){
							$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,bprice,pv,qty,amt,locationbase) values ('$mid','$pcode1[$i]','$pdesc1[$i]','$price[$i]' ,'$bprice' ,'$pv[$i]','$qty[$i]','$totalprice[$i]','$locationbase') ";
							//====================LOG===========================
					$text="uid=".$_SESSION["usercode"]." action=saleoperate =>$sql";
					writelogfile($text);
					//=================END LOG===========================
							//echo $sql."<br />";
							mysql_query($sql);
							if(empty($sbinv_code))minusProduct21($dbprefix,$pcode1[$i],$sbinv_code,$qty[$i],$sano,$_SESSION["usercode"]);
							else minusProduct22($dbprefix,$pcode1[$i],$sbinv_code,$qty[$i],$sano,$_SESSION["usercode"],$sbinv_code);

						}
							
						}
					}
			}
			$sql = "UPDATE ".$dbprefix."member_tmp SET mcode_ref='$mcode' WHERE id='".$id."'  ";
	mysql_query($sql);
 }else if(isset($_GET['stype'])){
	$sql = "UPDATE ".$dbprefix."member_tmp SET sendtype='".$_GET['stype']."' WHERE id='".$id."' and cancel = 0 ";
	mysql_query($sql);

 }
 
 echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";

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