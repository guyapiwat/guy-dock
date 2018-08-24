<? require "adminchecklogin.php";?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php"); ?>
<script language="javascript" type="text/javascript" src="datetimepick/datetimepicker.js"></script>
<script language="javascript">
var wi=null;
function get_mem_listpicker_sp_code(){
		if (wi) wi.close();
		wi=window.open("mem_listpicker_sp_code.php?name="+this.frm.sp_name.value+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_mem_listpicker_upa_code(){
		if (wi) wi.close();
	wi=window.open("mem_listpicker_upa_code.php?name="+this.frm.upa_name.value+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_mem_listpicker_mcode_acc(){
		if (wi) wi.close();
	//alert(this.getElementById('mcode_acc_name').innerHTML);
	wi=window.open("mem_listpicker_mcode_acc.php?name=ก","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	//wi=window.open("mem_listpicker_mcode_acc.php?name="+this.getElementById('mcode_acc_name').innerHTML+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
</script>

<? 
require_once 'function.php';?>
<?php
if (isset($_GET["edit"])){$edit=$_GET["edit"];}else{$edit="";}
if (isset($_GET["mid"])){$oid=$_GET["mid"];}else{$oid="";}

if (isset($_GET["dosave"])){$dosave=$_GET["dosave"];}else{$dosave="";}
if (isset($_GET["page"])){$page=$_GET["page"];}else{$page="";}
// connect to database 
require 'connectmysql.php';

//ตรวจสอบว่า $cmc อยู่ใน INV_CODE นี้หรือไม่
if ($edit=="1"){
	$result=mysql_query("select * from ".$dbprefix."member where id='".$oid ."' ");
	if (mysql_num_rows($result)==0) {
		require "header.php";
		echo "<font color=c00000><br>ไม่สามารถแก้ไขข้อมูลได้เพราะ<br>";
		echo "รหัสนี้ ไม่อยู่ในข้อมูลสมาชิก<br></font>";
		exit;
	}
	mysql_free_result($result);
}

if ($dosave=="1" and $edit==""){		
	?>
	<html>
	<meta http-equiv="Content-Language" content="th">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
	<title>เพิ่ม ข้อมูล สมาชิกใหม่</title>
 	<body>
	<?
	// อ่านค่าที่ส่งมาจากการ POST
	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}
	if (isset($_POST["lid"])){$lid=$_POST["lid"];}else{$lid="";}
	if (isset($_POST["fmcode"])){$mcode=$_POST["fmcode"];}else{$fmcode="";}
	if (isset($_POST["name_f"])){$name_f=$_POST["name_f"];}else{$name_f="";}
	if (isset($_POST["name_t"])){$name_t=$_POST["name_t"];}else{$name_t="";}
	if (isset($_POST["name_e"])){$name_e=$_POST["name_e"];}else{$name_e="";}
	if (isset($_POST["mdate"])){$mdate=$_POST["mdate"];}else{$mdate="";}
	if (isset($_POST["birthday"])){$birthday=$_POST["birthday"];}else{$birthday="";}
	if (isset($_POST["national"])){$national=$_POST["national"];}else{$national="";}
	if (isset($_POST["id_tax"])){$id_tax=$_POST["id_tax"];}else{$id_tax="";}
	if (isset($_POST["id_card"])){$id_card=$_POST["id_card"];}else{$id_card="";}
	if (isset($_POST["address1"])){$address1=$_POST["address1"];}else{$address1="";}
	if (isset($_POST["address2"])){$address2=$_POST["address2"];}else{$address2="";}
	if (isset($_POST["province"])){$province=$_POST["province"];}else{$province="";}
	if (isset($_POST["zip"])){$zip=$_POST["zip"];}else{$zip="";}
	if (isset($_POST["home_t"])){$home_t=$_POST["home_t"];}else{$home_t="";}
	if (isset($_POST["office_t"])){$office_t=$_POST["office_t"];}else{$office_t="";}
	if (isset($_POST["mobile"])){$mobile=$_POST["mobile"];}else{$mobile="";}
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
	if (isset($_POST["lr"])){$lr=$_POST["lr"];}else{$lr="";}
	if (isset($_POST["upb_code"])){$upb_code=$_POST["upb_code"];}else{$upb_code="";}
	if (isset($_POST["upb_name"])){$upb_name=$_POST["upb_name"];}else{$upb_name="";}
	if (isset($_POST["complete"])){$complete=$_POST["complete"];}else{$complete="";}
	if (isset($_POST["compdate_d"])){$compdate_d=$_POST["compdate_d"];}else{$compdate_d="";}
	if (isset($_POST["compdate_m"])){$compdate_m=$_POST["compdate_m"];}else{$compdate_m="";}
	if (isset($_POST["compdate_y"])){$compdate_y=$_POST["compdate_y"];}else{$compdate_y="";}
	if (isset($_POST["mo"])){$mo=$_POST["mo"];}else{$mo="";}
	if (isset($_POST["modate_d"])){$modate_d=$_POST["modate_d"];}else{$modate_d="";}
	if (isset($_POST["modate_m"])){$modate_m=$_POST["modate_m"];}else{$modate_m="";}
	if (isset($_POST["modate_y"])){$modate_y=$_POST["modate_y"];}else{$modate_y="";}
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
	
	if (isset($_POST["posid"])){$posid=$_POST["posid"];}else{$posid="";}
	if (isset($_POST["pos_cur"])){$pos_cur=$_POST["pos_cur"];}else{$pos_cur="";}
	if (isset($_POST["memdesc"])){$memdesc=$_POST["memdesc"];}else{$memdesc="";}
	if (isset($_POST["C1"])){$C1=$_POST["C1"];}else{$C1="";}
	$mcode = $fmcode.$lid;
	$lr = $upa_code==""?"":$lr;
	$oktosave=true;
	// ตรวจสอบ
	if($C1=='') {
		$oktosave=false;
		echo "<font color='#FF0000'>ไม่ได้ยืนยัน ข้อมูลถูกต้อง</font><br>";
	}
	if($mcode=='') {
		$oktosave=false;
		echo "<font color='#FF0000'>รหัสสมาชิก ไม่ได้ป้อน</font><br>";
	}else{
		//for ($i=strlen($mcode);$i<7;$i++) {$mcode="0".$mcode;}
		// ตรวจสอบกับ MEMBER
		$result1=mysql_query("select * from ".$dbprefix."member where mcode='$mcode' ");
		if (mysql_num_rows($result1) > 0) {
			$oktosave=false;
			echo "<font color='#FF0000'>รหัสสมาชิก ซ้ำ</font><br>";
		}
		mysql_free_result($result1);

	}
	if($name_t=='') {
		$oktosave=false;
		echo "<font color='#FF0000'>ชื่อ-สกุล ไม่ได้ป้อน</font><br>";
	}
	if($mdate<>'') {	//วันที่สมัคร
		if (! isvaliddate( $mdate) ){
			$oktosave=false;
			echo "<font color='#FF0000'>วันที่สมัคร ไม่ถูกต้อง</font><br>";
		}
	}
	else {
		$oktosave=false;
		echo "<font color='#FF0000'>วันที่สมัคร ไม่ได้ป้อน</font><br>";
	}	
	if($birthday<>'' and $birthday<>'0000-00-00') {	//วันเกิด
		if (! isvaliddate( $birthday) ){
			$oktosave=false;
			echo "<font color='#FF0000'>วันเกิด ไม่ถูกต้อง</font><br>";
		}
	}
	if($compdate_d<>'' or $compdate_m<>'' or $compdate_y<>'') {	//วันที่ครบ 1 set
		if (! checkdate( (int) $compdate_m, (int) $compdate_d, (int) $compdate_y-543)) {
			$oktosave=false;
			echo "<font color='#FF0000'>วันที่ครบ 1 set ไม่ถูกต้อง</font><br>";
			$compdate="";
		}
		else {
			if (strlen($compdate_m)<2) {$compdate_m="0".$compdate_m;}
			if (strlen($compdate_d)<2) {$compdate_d="0".$compdate_d;}
			$compdate=($compdate_y-543)."-".$compdate_m."-".$compdate_d;
		}
	}
	if($modate_d<>'' or $modate_m<>'' or $modate_y<>'') {	//วันที่เป็นโมบาย
		if (! checkdate( (int) $modate_m, (int) $modate_d, (int) $modate_y-543)) {
			$oktosave=false;
			echo "<font color='#FF0000'>วันที่เป็นโมบาย ไม่ถูกต้อง</font><br>";
			$modate="";
		}
		else {
			if (strlen($modate_m)<2) {$modate_m="0".$modate_m;}
			if (strlen($modate_d)<2) {$modate_d="0".$modate_d;}
			$modate=($modate_y-543)."-".$modate_m."-".$modate_d;
		}
	}
	if ($sp_code=="") {
		//$oktosave=false;
		//echo "<font color='#FF0000'>รหัสผู้แนะนำ ไม่ได้ป้อน</font><br>";
	}else{
		for ($i=strlen($sp_code);$i<7;$i++) {$sp_code="0".$sp_code;}
	}

	if ($upa_code=="") {
		//$oktosave=false;
		//echo "<font color='#FF0000'>รหัสอัพไลน์ A ไม่ได้ป้อน</font><br>";
	}else{
		for ($i=strlen($upa_code);$i<7;$i++) {$upa_code="0".$upa_code;}
		if ($mcode==$upa_code) {
			$oktosave=false;
			echo "<font color='#FF0000'>รหัสอัพไลน์ A แนะนำตัวเอง</font><br>";
		}
	}


	if ($upb_code=="") {
		//$oktosave=false;
		//echo "<font color='#FF0000'>รหัสอัพไลน์ B ไม่ได้ป้อน</font><br>";
	}else{
		for ($i=strlen($upb_code);$i<7;$i++) {$upb_code="0".$upb_code;}
		if ($mcode==$upb_code) {
			$oktosave=false;
			echo "<font color='#FF0000'>รหัสอัพไลน์ B แนะนำตัวเอง</font><br>";
		}
	}
	if ($mcode_acc<>"") {
		for ($i=strlen($mcode_acc);$i<7;$i++) {$mcode_acc="0".$mcode_acc;}
	}

	if ($lr=="") {
		//$oktosave=false;
		//echo "<font color='#FF0000'>ด้าน LCR ไม่ได้ป้อน</font><br>";
		$sql="select * from ".$dbprefix."member where upa_code='$upa_code' and mcode<>'$mcode' and upa_code<>'' ";
		$result1=mysql_query($sql);
		if (mysql_num_rows($result1) >= 3) {
			$oktosave=false;
			echo "<font color='#FF0000'>รหัสสมาชิก $upa_code มีลูกทีมอยู่ครบ 3 แล้ว</font><br>";
		}

	}else{
		if ($lr<0 || $lr>$GLOBALS["numofchild"]){
			$oktosave=false;
			echo "<font color='#FF0000'>ด้าน LCR ไม่ถูกต้อง</font><br>";
		}else{
			//ตรวจว่ามีด้านนี้อยู่แล้วหรือไม่
			$sql="select * from ".$dbprefix."member where upa_code='$upa_code' and lr='$lr' and mcode<>'$mcode' ";
			$result1=mysql_query($sql);
			//echo "$sql<BR>";
			$lr_desc = array("ซ้าย","กลาง","ขวา");
			if (mysql_num_rows($result1) > 0) {
				$oktosave=false;
				echo "<font color='#FF0000'>รหัสสมาชิก $upa_code มีด้าน $lr_desc[$lr] อยู่แล้ว</font><br>";
			}

		}
	}


	// บันทึกรายการเพิ่ม
	if ($oktosave){
		$sql="insert into ".$dbprefix."member (mcode ,name_f ,name_t ,name_e ,mdate ,birthday ,national ,id_tax ,id_card ,address1 ,address2 ,province ,zip ,home_t ,office_t ,mobile ,mcode_acc, bonusrec ,bankcode ,branch ,acc_type ,acc_no ,acc_name ,acc_prov ,sv_code ,sp_code ,sp_name ,upa_code ,upa_name ,lr ,upb_code ,upb_name ,complete ,compdate ,mo ,modate ,inv_code ,uid ,dl,posid,pos_cur,memdesc) values ('$mcode' ,'$name_f' ,'$name_t' ,'$name_e' ,'$mdate' ,'$birthday' ,'$national' ,'$id_tax' ,'$id_card' ,'$address1' ,'$address2' ,'$province' ,'$zip' ,'$home_t' ,'$office_t' ,'$mobile' , '$mcode_acc' ,'$bonusrec' ,'$bankcode' ,'$branch' ,'$acc_type' ,'$acc_no' ,'$acc_name' ,'$acc_prov' ,'$sv_code' ,'$sp_code' ,'$sp_name' ,'$upa_code' ,'$upa_name' ,'$lr' ,'$upb_code' ,'$upb_name' ,'$complete' ,'$compdate' ,'$mo' ,'$modate' ,'".$_SESSION["admininvent"]."' ,'".$_SESSION["adminuserid"]."' ,'$dl','$posid','$pos_cur','$memdesc') ";
		//====================LOG===========================
		$text="uid=".$_SESSION["adminuserid"]." action=confirm_mem =>$sql";
		writelogfile($text);
		//=================END LOG===========================
		if (! mysql_query($sql)) {
			echo "<font color='#FF0000'>มีข้อผิดพลาด ในคำสั่ง SQL บันทึกไม่ได้</font><br>";
			echo  "$sql";		
		}
		else {
			mysql_query("COMMIT");
			//====================LOG===========================
		$text="uid=".$_SESSION["adminuserid"]." action=confirm_mem =>DELETE FROM ".$dbprefix."premember WHERE id='$oid' LIMIT 1";
		writelogfile($text);
		//=================END LOG===========================
			mysql_query("DELETE FROM ".$dbprefix."premember WHERE id='$oid' LIMIT 1 ");
			if($refresh_opener<>'1'){
				echo "<br /><br /><br /><br /><br /><br /><p align='center'><font color='#339900'>บันทึกข้อมูล $mcode ชื่อ $name_t แล้ว ... </font><img src='images/correctsign.gif' width='16' height='16'></p><br>";
				echo "<script language='JavaScript'>opener.location.reload()</script>";
				$rs = mysql_query("SELECT id FROM ".$dbprefix."premember WHERE id>'$oid' AND mdate='".$_GET['dt']."' ORDER BY mdate LIMIT 1");
				//echo "SELECT id FROM ".$dbprefix."premember WHERE mdate='".$_GET['dt']."' ORDER BY mdate LIMIT 1";
				if(mysql_num_rows($rs)>0)
					echo "<p align='center'>[<a href=\"./confirm.php?dt=".$_GET['dt']."&mid=".mysql_result($rs,0,'id')."\">ถัดไป</a>]</p>";
					else
					echo "<p align='center'>[<a href=\"javascript:window.close();\">ปิดหน้านี้</a>]</p>";
				// reset all fields
				$oid="";
				$id="";
				$mcode="";
				$name_f="";
				$name_t="";
				$name_e="";
				$mdate="";
				$birthday="";
				$national="";
				$id_tax="";
				$id_card="";
				$address1="";
				$address2="";
				$province="";
				$zip="";
				$home_t="";
				$office_t="";
				$mobile="";
				$mcode_acc="";
				$bonusrec="";
				$bankcode="";
				$branch="";
				$acc_type="";
				$acc_no="";
				$acc_name="";
				$acc_prov="";
				$sv_code="";
				$sp_code="";
				$sp_name="";
				$upa_code="";
				$upa_name="";
				$lr="";
				$upb_code="";
				$upb_name="";
				$complete="";
				$compdate="";
				$mo="";
				$modate="";
				$stockist="";
				$inv_code="";
				$usercode="";
				$dl="";
				$posid="";
				$pos_cur="";
				$memdesc="";
			}
			else{
				echo "<script language='JavaScript'>opener.location.reload()</script>";
				echo "<script language='JavaScript'>self.close()</script>";
			}
			exit;
		}
	}
	else {
		echo "<font color='#FF0000'>ข้อมูลยังไม่ถูกต้อง กรุณาแก้ไข</font><br>";
	}
}
// -------------------- NO SAVE -------------------- 
if ($dosave<>"1"){
$edit=1;
	?>
	<html>
	<meta http-equiv="Content-Language" content="th">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
	<title><? if ($edit=="1") {echo "แก้ไข";} else {echo "เพิ่ม";}?> ข้อมูล สมาชิกใหม่</title>

	<link href="istyle.css" rel="stylesheet" type="text/css">

	<body>
	<?
	// อ่านข้อมูล สมาชิกใหม่ เดิม จากฐานข้อมูล
	if ($edit=="1") {
		$result=mysql_query("select * from ".$dbprefix."premember where id='$oid'");
		if (mysql_num_rows($result) > 0) {
			$row = mysql_fetch_object($result);
			$id=$row->id;
			$oid=$row->id;
			$mcode=$row->mcode;
			$name_f=$row->name_f;
			$name_t=$row->name_t;
			$name_e=$row->name_e;
			$mdate=$row->mdate;
			$birthday=$row->birthday;
			$national=$row->national;
			$id_tax=$row->id_tax;
			$id_card=$row->id_card;
			$address1=$row->address1;
			$address2=$row->address2;
			$province=$row->province;
			$zip=$row->zip;
			$home_t=$row->home_t;
			$office_t=$row->office_t;
			$mobile=$row->mobile;
			$mcode_acc=$row->mcode_acc;
			$mcode_acc_name=get_data("name_t","member","mcode='$mcode_acc'");
			$bonusrec=$row->bonusrec;
			$bankcode=$row->bankcode;
			$branch=$row->branch;
			$acc_type=$row->acc_type;
			$acc_no=$row->acc_no;
			$acc_name=$row->acc_name;
			$acc_prov=$row->acc_prov;
			$sv_code=$row->sv_code;
			$sp_code=$row->sp_code;
			$sp_name=$row->sp_name;
			$upa_code=$row->upa_code;
			$upa_name=$row->upa_name;
			$lr=$row->lr;
			$upb_code=$row->upb_code;
			$upb_name=$row->upb_name;
			$complete=$row->complete;
			$compdate=$row->compdate;
			$mo=$row->mo;
			$modate=$row->modate;
			$stockist=$row->stockist;
			$inv_code=$row->inv_code;
			$usercode=$row->usercode;
			$dl=$row->dl;
			$posid=$row->posid;
			$pos_cur=$row->pos_cur;
			$memdesc=$row->memdesc;

	$fmcode = substr($mcode,0,8);
	$lid = substr($mcode,9,2);
			if ($mdate=="") {
				$mdate_d="";
				$mdate_m="";
				$mdate_y="";
			}
			else {
				$dash1=strpos($mdate,"-");
				$dash2=strpos($mdate,"-",$dash1+1);
				$mdate_d=substr($mdate,8);
				$mdate_m=substr($mdate,5,2);
				$mdate_y=substr($mdate,0,4);
				if ($mdate_y>"0"){
					$mdate_y+=543;
				}
				else {$mdate_y="";}
			}
			if ($birthday=="") {
				$birthday_d="";
				$birthday_m="";
				$birthday_y="";
			}
			else {
				$dash1=strpos($birthday,"-");
				$dash2=strpos($birthday,"-",$dash1+1);
				$birthday_d=substr($birthday,8);
				$birthday_m=substr($birthday,5,2);
				$birthday_y=substr($birthday,0,4);
				if ($birthday_y>"0"){
					$birthday_y+=543;
				}
				else {$birthday_y="";}
			}
			if ($compdate=="") {
				$compdate_d="";
				$compdate_m="";
				$compdate_y="";
			}
			else {
				$dash1=strpos($compdate,"-");
				$dash2=strpos($compdate,"-",$dash1+1);
				$compdate_d=substr($compdate,8);
				$compdate_m=substr($compdate,5,2);
				$compdate_y=substr($compdate,0,4);
				if ($compdate_y>"0"){
					$compdate_y+=543;
				}
				else {$compdate_y="";}
			}
			if ($modate=="") {
				$modate_d="";
				$modate_m="";
				$modate_y="";
			}
			else {
				$dash1=strpos($modate,"-");
				$dash2=strpos($modate,"-",$dash1+1);
				$modate_d=substr($modate,8);
				$modate_m=substr($modate,5,2);
				$modate_y=substr($modate,0,4);
				if ($modate_y>"0"){
					$modate_y+=543;
				}
				else {$modate_y="";}
			}
		} 
		else {
			echo "เกิดข้อผิดพลาด ไม่พบข้อความ ที่ต้องการแก้ไข";
			exit;
		}
	}
	else {
		$oid="";
		$id="";
		$mcode="";
		$name_f="";
		$name_t="";
		$name_e="";
		$mdate=date("Y-m-d");
		$birthday="";
		$national="";
		$id_tax="";
		$id_card="";
		$address1="";
		$address2="";
		$province="";
		$zip="";
		$home_t="";
		$office_t="";
		$mobile="";
		$mcode_acc="";
		$bonusrec="";
		$bankcode="";
		$branch="";
		$acc_type="";
		$acc_no="";
		$acc_name="";
		$acc_prov="";
		$sv_code="";
		$sp_code="";
		$sp_name="";
		$upa_code="";
		$upa_name="";
		$lr="";
		$upb_code="";
		$upb_name="";
		$complete="";
		$compdate="";
		$mo="";
		$modate="";
		$stockist="";
		$inv_code="";
		$usercode="";
		$dl="";
		$posid="";
		$pos_cur="";
		$memdesc="";

		// ต่อด้านที่เลือกไว้
		if (isset($_GET["sp_code"])){$sp_code=$_GET["sp_code"];}
		if (isset($_GET["name"])){$sp_name=$_GET["name"];}
		if (isset($_GET["upa_code"])){$upa_code=$_GET["upa_code"];}
		if (isset($_GET["name"])){$upa_name=$_GET["name"];}
		if (isset($_GET["upb_code"])){$upb_code=$_GET["upb_code"];}
		if (isset($_GET["name"])){$upb_name=$_GET["name"];}
		if (isset($_GET["lr"])){$lr=$_GET["lr"];}

		if ($mdate=="") {
			$mdate_d="";
			$mdate_m="";
			$mdate_y="";
		}
		else {
			$dash1=strpos($mdate,"-");
			$dash2=strpos($mdate,"-",$dash1+1);
			$mdate_d=substr($mdate,8);
			$mdate_m=substr($mdate,5,2);
			$mdate_y=substr($mdate,0,4);
			if ($mdate_y>"0"){
				$mdate_y+=543;
			}
			else {$mdate_y="";}
		}
		if ($birthday=="") {
			$birthday_d="";
			$birthday_m="";
			$birthday_y="";
		}
		else {
			$dash1=strpos($birthday,"-");
			$dash2=strpos($birthday,"-",$dash1+1);
			$birthday_d=substr($birthday,8);
			$birthday_m=substr($birthday,5,2);
			$birthday_y=substr($birthday,0,4);
			if ($birthday_y>"0"){
				$birthday_y+=543;
			}
			else {$birthday_y="";}
		}
		if ($compdate=="") {
			$compdate_d="";
			$compdate_m="";
			$compdate_y="";
		}
		else {
			$dash1=strpos($compdate,"-");
			$dash2=strpos($compdate,"-",$dash1+1);
			$compdate_d=substr($compdate,8);
			$compdate_m=substr($compdate,5,2);
			$compdate_y=substr($compdate,0,4);
			if ($compdate_y>"0"){
				$compdate_y+=543;
			}
			else {$compdate_y="";}
		}
		if ($modate=="") {
			$modate_d="";
			$modate_m="";
			$modate_y="";
		}
		else {
			$dash1=strpos($modate,"-");
			$dash2=strpos($modate,"-",$dash1+1);
			$modate_d=substr($modate,8);
			$modate_m=substr($modate,5,2);
			$modate_y=substr($modate,0,4);
			if ($modate_y>"0"){
				$modate_y+=543;
			}
			else {$modate_y="";}
		}
	}
}

// แสดงผลข้อมูล สมาชิกใหม่
//generate user code 
$fcsize = 8;
$sql = "SELECT MAX(mcode) AS code FROM ".$dbprefix."member ";
$rs = mysql_query($sql);
$code = mysql_result($rs,0,'code');
$fmcode = substr($code,1,$fcsize-1);
$fmcode +=1;
for($i=strlen($fmcode);$i<$fcsize;$i++){
	$fmcode = "0".$fmcode;
}

mysql_free_result($rs);

?>
<form name='frm' method="post" action="confirm_mem.php?dt=<?=$_GET['dt']?>&dosave=1<? if ($oid<>""){echo "&oid=$oid";}?>&page=<?=$page?>">
	<input type="hidden" name="oid" value="<?=$oid?>">
	<input type="hidden" name="refresh_opener" value="<?=$refresh_opener?>">
	

        <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <td width="49%" valign="top">
			<? /////// ช่องซ้าย /////// ?>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
				  <tr>
					<td width="26%" valign="top" align="right" >รหัสสมาชิก <font color="#ff0000">*</font></td>
					<td width="74%">&nbsp;
				    <input type="text" name="fmcode" size="20" maxlength="8" value="<?=$fmcode?>">
				    <select name="lid">
                      <option value="01" <?=($lid=='01'?"selected":"")?>>01</option>
                      <option value="02" <?=($lid=='02'?"selected":"")?>>02</option>
                      <option value="03" <?=($lid=='03'?"selected":"")?>>03</option>
                      <option value="04" <?=($lid=='04'?"selected":"")?>>04</option>
                    </select></td>
				  </tr>
				  <tr>
					<td width="26%" valign="top" align="right" >คำนำหน้าชื่อ</td>
					<td width="74%">&nbsp;
				    <input type="text" name="name_f" size="20" maxlength="20" value="<?=$name_f?>"> <font color="#808080">(นาย นาง นางสาว)</font></td>
				  </tr>
				  <tr>
					<td width="26%" valign="top" align="right" >ชื่อไทย </td>
					<td width="74%">&nbsp;
				    <input type="text" name="name_t" size="40" maxlength="40" value="<?=$name_t?>"></td>
				  </tr>
				  <tr>
					<td width="26%" valign="top" align="right" >ชื่ออังกฤษ</td>
					<td width="74%">&nbsp;
				    <input type="text" name="name_e" size="40" maxlength="40" value="<?=$name_e?>"></td>
				  </tr>
				  <tr>
					<td width="26%" valign="top" align="right" >วันที่สมัคร </td>
					<td width="74%">&nbsp;
					  <input type="text" name="mdate" size="10" maxlength="10" value="<?=($mdate==""?date("Y-m-d"):$mdate)?>">&nbsp;<a href="javascript:NewCal('mdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a> <font color="#808080">(ปปปป-ดด-วว)</font>
				    </td>
				  </tr>
				  <tr>
					<td width="26%" valign="top" align="right" >รหัสส่วนตัว</td>
					<td width="74%">&nbsp;
				    <input type="text" name="sv_code" size="4"  maxlength="4" value="<?=$sv_code?>"></td>
				  </tr>
				  <tr>
					<td width="26%" valign="top" align="right" >รหัสผู้แนะนำ</td>
					<td width="74%">&nbsp;
				    <input type="text" name="sp_code" size="20"  maxlength="20" value="<?=$sp_code?>"> <input type="button" value="เลือก" onClick="get_mem_listpicker_sp_code()"><br><font color="#808080">(ใส่ชื่อที่ต้องการค้นในช่อง ชื่อผู้แนะนำ แล้วกด [เลือก])</font></td>
				  </tr>
				  <tr>
					<td width="26%" valign="top" align="right" >ชื่อผู้แนะนำ</td>
					<td width="74%">&nbsp;
				    <input type="text" name="sp_name" size="40"  maxlength="40" value="<?=$sp_name?>"></td>
				  </tr>
 				 <tr>
					<td width="26%" valign="top" align="right" >รหัสอัพไลน์</td>
					<td width="74%">&nbsp;
				   <input type="text" name="upa_code" size="20"  maxlength="20" value="<?=$upa_code?>"> <input type="button" value="เลือก" onClick="get_mem_listpicker_upa_code()"><br><font color="#808080">(ใส่ชื่อที่ต้องการค้นในช่อง ชื่ออัพไลน์ แล้วกด [เลือก])</font></td>
				  </tr>
				  <tr>
					<td width="26%" valign="top" align="right" >ชื่ออัพไลน์</td>
					<td width="74%">&nbsp;
				    <input type="text" name="upa_name" size="40" maxlength="40" value="<?=$upa_name?>"></td>
				  </tr>
  				  <tr>
					<td width="26%" valign="top" align="right" >ด้าน ซ้าย/ขวา</td>
					<td width="74%">
						<table width="100%" border="0">
						  <tr>
						  <?
							for($i=0;$i<$GLOBALS["numofchild"];$i++){
							?><td>
							<input type="radio"  name="lr" value="<?=$i?>" <? if ($lr==$i) {echo "checked=\"checked\"";}?>>&nbsp;<?=$GLOBALS["mem_def"][($i)]?>
							</td><?
							}
						  ?>
						  </tr>
						</table>
				  </tr>
<!-- 
				  <tr>
					<td width="23%" valign="top" align="right" >รหัสอัพไลน์ <font color=ff0000>*</font></td>
					<td width="77%">&nbsp;<input type="text" name="upb_code" size="20" maxlength=20 value="<?=$upb_code?>"></td>
				  </tr>
				  <tr>
					<td width="23%" valign="top" align="right" >ชื่ออัพไลน์</td>
					<td width="77%">&nbsp;<input type="text" name="upb_name" size="40" maxlength=40 value="<?=$upb_name?>"></td>
				  </tr>
 -->
				  <tr>
					<td width="26%" valign="top" align="right" >รหัสรับโอนเงิน</td>
					<td width="74%">&nbsp;
				    <input type="text" name="mcode_acc" size="20" maxlength="20" value="<?=$mcode_acc?>"> <input type="button" value="เลือก" onClick="get_mem_listpicker_mcode_acc()"> <div id='mcode_acc_name'><?=$mcode_acc_name?></div></td>
				  </tr>
			  </table>

			</td>
            <td width="51%" valign="top">
			<? /////// ช่องขวา /////// ?>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
				  <tr>
					<td width="28%" valign="top" align="right" >วันที่เกิด</td>
					<td width="72%">&nbsp;
					  <input type="text" name="birthday" size="10" maxlength=10 value="<?=$birthday?>">&nbsp;<a href="javascript:NewCal('birthday','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a> <font color="808080">(ปปปป-ดด-วว)</font>
					</td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >สัญชาติ</td>
					<td width="72%">&nbsp;
				    <input type="text" name="national" size="20" maxlength="20" value="<?=$national?>"></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >เลขประจำตัวผู้เสียภาษี</td>
					<td width="72%">&nbsp;
				    <input type="text" name="id_tax" size="10" maxlength="10" value="<?=$id_tax?>"></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >เลขประจำตัวประชาชน</td>
					<td width="72%">&nbsp;
				    <input type="text" name="id_card" size="20" maxlength="20" value="<?=$id_card?>"></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >ที่อยู่ปัจจุบัน</td>
					<td width="72%">&nbsp;
				    <input type="text" name="address1" size="40" maxlength="40" value="<?=$address1?>"></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" ></td>
					<td width="72%">&nbsp;
				    <input type="text" name="address2" size="40" maxlength="40" value="<?=$address2?>"></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >จังหวัด</td>
					<td width="72%">&nbsp;
					  <select size="1" name="province">
						<option value="" <? if ($province=="") {echo "selected";}?>> </option>
						<?					
						
						$result1=mysql_query("select * from ".$dbprefix."province order by provname");
						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							echo "<option value=\"".$row1->provname."\" ";
							if ($province==$row1->provname) {echo "selected";}
							echo ">".$row1->provname."</option>";
						}
						?>
					  </select>
            </td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >รหัสไปรษณีย์</td>
					<td width="72%">&nbsp;
				    <input type="text" name="zip" size="5" maxlength="5" value="<?=$zip?>"></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >โทรศัพท์บ้าน</td>
					<td width="72%">&nbsp;
				    <input type="text" name="home_t" size="20" maxlength="20" value="<?=$home_t?>"></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >โทรศัพท์งาน</td>
					<td width="72%">&nbsp;
				    <input type="text" name="office_t" size="20" maxlength="20" value="<?=$office_t?>"></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >มือถือ</td>
					<td width="72%">&nbsp;
				    <input type="text" name="mobile" size="20" maxlength="20" value="<?=$mobile?>"></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >รับโบนัสผ่าน</td>
					<td width="72%">&nbsp;
					  <input type="radio" value="1" <? if ($bonusrec=="1") {echo "checked";}?> name="bonusrec">ธนาคาร
				    <input type="radio" <? if ($bonusrec=="2") {echo "checked";}?> name="bonusrec" value="2">รับเอง</td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >ธนาคาร</td>
					<td width="72%">&nbsp;
					  <select size="1" name="bankcode">
						<option value="" <? if ($bankcode=="") {echo "selected";}?>> </option>
						<?					
						$result1=mysql_query("select * from ".$dbprefix."bank order by bankname");
						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							echo "<option value=\"".$row1->bankcode."\" ";
							if ($bankcode==$row1->bankcode) {echo "selected";}
							echo ">".$row1->bankname."</option>";
						}
						?>
				    </select></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >สาขา</td>
					<td width="72%">&nbsp;
					  <input type="text" name="branch" size="20" maxlength="50" value="<?=$branch?>">					
					</td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >จังหวัด</td>
					<td width="72%">&nbsp;
					  <select size="1" name="acc_prov">
						<option value="" <? if ($acc_prov=="") {echo "selected";}?>> </option>
						<?					
						$result1=mysql_query("select * from ".$dbprefix."province order by provname");
						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							echo "<option value=\"".$row1->provname."\" ";
							if ($acc_prov==$row1->provname) {echo "selected";}
							echo ">".$row1->provname."</option>";
						}
						?>
					  </select>	  				
					</td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >ประเภทบัญชี</td>
					<td width="72%">&nbsp;
				    <input type="text" name="acc_type" size="20"  maxlength="20" value="<?=$acc_type?>"></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >เลขที่บัญชี</td>
					<td width="72%">&nbsp;
				    <input type="text" name="acc_no" size="13"  maxlength="13" value="<?=$acc_no?>"></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >ชื่อบัญชี</td>
					<td width="72%">&nbsp;
				    <input type="text" name="acc_name" size="40"  maxlength="40" value="<?=$acc_name?>"></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" >หมายเหตุ</td>
					<td width="72%">&nbsp;
				    <input type="text" name="memdesc" size="40" value="<?=$memdesc?>"></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" ></td>
					<td width="72%">&nbsp;</td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" ></td>
					<td width="72%">&nbsp;
				    <input type="checkbox" name="C1" value="ok">ข้อมูลถูกต้อง <font color="#ff0000">*</font></td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" ></td>
					<td width="72%">&nbsp;</td>
				  </tr>
				  <tr>
					<td width="28%" valign="top" align="right" ></td>
					<td width="72%">&nbsp;
				    <input type="submit" value="บันทึก" name="B1">&nbsp; <input type="button" value="ลบ" name="del" onClick="window.open('./delpremem.php?dt=<?=$_GET['dt']?>&did=<?=$oid?>','del','width=200 height=100')" >&nbsp; <input type="reset" value="ยกเลิก" name="B2">&nbsp; 
				<? 
					//echo "SELECT id FROM ".$dbprefix."premember WHERE mdate='".$_GET['dt']."' ORDER BY mdate LIMIT 1";
					$rs = mysql_query("SELECT id FROM ".$dbprefix."premember WHERE id>'$oid' AND mdate='".$_GET['dt']."' ORDER BY id LIMIT 1");
					if(mysql_num_rows($rs)>0)
						echo "<input type='button' value='ถัดไป' onclick=\"window.location='./confirm_mem.php?dt=".$_GET['dt']."&mid=".mysql_result($rs,0,'id')."'\" >";
						//echo "window.location='./confirm.php?dt=".$_GET['dt']."&mid=".mysql_result($rs,0,'id');
						mysql_free_result($rs);
					?>
				<? 
					$rs = mysql_query("SELECT id FROM ".$dbprefix."premember WHERE id<'$oid' AND mdate='".$_GET['dt']."' ORDER BY id DESC LIMIT 1");
					//echo "SELECT id FROM ".$dbprefix."premember WHERE id<'$oid' AND mdate='".$_GET['dt']."' ORDER BY id,mdate DESC LIMIT 1";
					if(mysql_num_rows($rs)>0)
						echo "<input type='button' value='ก่อนหน้า' onclick=\"window.location='./confirm_mem.php?dt=".$_GET['dt']."&mid=".mysql_result($rs,0,'id')."'\" >";
						//echo "window.location='./confirm.php?dt=".$_GET['dt']."&mid=".mysql_result($rs,0,'id');
						mysql_free_result($rs);
					?>
					</td>
				  </tr>
				</table>
			</td>
          <tr>
		</table>
</form>
</body>                       
</html> 

<?
function get_data($field,$table,$field_and_value){
	//อ่านค่า จาก  select $field from $table where $field_and_value
	// $field=field name to get data
	// table=scm_xxxxxx ไม่ต้องใส่ scm
	// $field_and_value="fieldname='value' "
	global $dbprefix;
	$sql="select * from ".$dbprefix."$table where $field_and_value ";
	$result=mysql_query($sql);
	if($result){
		if($row=mysql_fetch_object($result)){
			return $row->$field;
		}
	}
	return false;
}
?>