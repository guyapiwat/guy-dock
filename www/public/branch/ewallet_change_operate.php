<?
session_start();
$dbprefix = "ali_";
$sesstiontab=6;
$sub=201;
$sadate=date("Y-m-d");
$sctime=date("Y-m-d H:i:s");
if($_GET["status"] == 'approved'){
	$sqlxx  = "SELECT * FROM ali_transfer_ewallet_confirm ";
	$sqlxx .= "WHERE 1 = 1 ";
	$sqlxx .= "and id='".$_GET["bid"]."' and approved_status = '0' ";
	$rsxx   = mysql_query($sqlxx);
	if(mysql_num_rows($rsxx) > 0){
		$object = mysql_fetch_object($rsxx);	
		$mcode 		 	= $object->mcode;
		$inv_code 	 	= "";
		$total	     	= $object->total;
		$chkTransfer 	= "on";
		$txtTransfer 	= $object->total;
		$image_transfer = $object->img_pay;
		$data 			= get_detail_meber($mcode);
		$name_t 		= $data["name_t"];
		$arr_member 	= searchmember("ali_",$mcode);
		
		
		
		
		$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ali_ewallet ";
		$rs = mysql_query($sql);
		$mid = mysql_result($rs,0,'id')+1;
		//$sano = @gencodesale_EW();
		$sano = gencodesale_news('E','ali_ewallet',$_SESSION['admininvent']);
		mysql_free_result($rs);
		
		
		
		$sql="insert into ".$dbprefix."ewallet (id,  sano, sadate,  mcode,  sa_type, inv_code,  total,bprice,  uid,lid,send,txtoption,
		txtMoney,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,
		optionCash,optionFuture,image_transfer,optionCredit1,optionCredit2,optionCredit3,ewallet_before,ewallet_after,checkportal,locationbase,name_f,name_t,mbase,crate,sano_temp
		
		) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$txtTransfer','$bprice' ,'".$_SESSION['inv_usercode']."','".$_SESSION['admininvent']."','$radsend','$txtoption'
		,'$txtTransfer','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','$txtCash','$txtFuture',
		'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$optionCash','$optionFuture','$image_transfer','$optionCredit1','$optionCredit2','$optionCredit3','".$ewallet_before."','".$ewallet_after."','2','".$_SESSION["inv_locationbase"]."','$name_f','$name_t','".$arr_member["locationbase"]."','".$_SESSION["inv_crate"]."','".$_GET["bid"]."'
		) ";
		
		//====================LOG===========================
		logtext(true,$_SESSION['inv_usercode'],'เติม  Ewallet รหัส : '.$mid.' จำนวน : '.$txtTransfer.' ยอดเดิม :'.$ewallet_before.' คงเหลือ : '.$ewallet_after,$mid);
		$text="uid=".$_SESSION["inv_usercode"]." action=ewalletoperate =>$sql";
		writelogfile($text);
		if (! mysql_query($sql)) {	
				echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."')window.location='index.php?sessiontab=6&sub=146&state=2'</script>";
				exit;
			}
				// update credit branch
				$sql_upcredit="update ".$dbprefix."user set limitcredit = limitcredit-'$txtMoney' where uid='".$_SESSION["inv_userid"]."'";
				mysql_query($sql_upcredit) or die(mysql_error());

		if(empty($inv_code))
		mysql_query("update ".$dbprefix."member set ewallet = ewallet+".$txtTransfer.", bewallet = bewallet+".$txtTransfer." where mcode='".$mcode."' ");
		else if(empty($mcode))
		mysql_query("update ".$dbprefix."invent set ewallet = ewallet+".$txtTransfer.", bewallet = bewallet+".$txtTransfer." where inv_code='".$inv_code."' ");

		 log_ewallet('ewallet',$mcode,$sano,$txtTransfer,'I',$sadate,"Ewallet($sano)"); 

		//====================LOG===========================
		$text="uid=".$_SESSION["inv_usercode"]." action=ewallet_update=>update ".$dbprefix."member set ewallet = ewallet+".$txtTransfer.", bewallet = bewallet+".$txtTransfer." where mcode='".$mcode."' ";
		writelogfile($text);
		
		mysql_query("update ali_transfer_ewallet_confirm set approved_status='1', approved_uid='".$_SESSION['inv_usercode']."', approved_sctime='".$sctime."', sano_ref='".$sano."'  where mcode='".$mcode."' and id='".$_GET["bid"]."' ");
		echo "<script language='JavaScript'>alert('ทำการอนุมัติเรียบร้อยค่ะ');window.location='index.php?sessiontab=$sesstiontab&sub=$sub';</script>";    
		exit;
	}
	echo "<script language='JavaScript'>alert('เกิดข้อผิดพลาด');window.location='index.php?sessiontab=$sesstiontab&sub=$sub';</script>";    
	exit;
}

if($_GET["status"] == 'cancel'){
	if(!empty($_GET["bid"])){
		$sql  = "SELECT * FROM ali_transfer_ewallet_confirm ";
		$sql .= "WHERE 1 = 1 and id='".$_GET["bid"]."' ";
		$rs   = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$object = mysql_fetch_object($rs);	
			$mcode = $object->mcode;
			$approved_status = $object->approved_status;
			$cancel_status = $object->cancel_status;
			
			if($approved_status == 0 and $cancel_status == 0){
				mysql_query("update ali_transfer_ewallet_confirm set cancel_status='1', cancel_uid='".$_SESSION['inv_usercode']."', cancel_sctime='".$sctime."'  where mcode='".$mcode."' and id='".$_GET["bid"]."' ");
			}
			else{
				echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกได้ค่ะ');window.location='index.php?sessiontab=$sesstiontab&sub=$sub';</script>";
				exit;
			}
		}
		echo "<script language='JavaScript'>alert('ทำการยกเลิกเรียบร้อยค่ะ');window.location='index.php?sessiontab=$sesstiontab&sub=$sub';</script>";    
		exit;		
	}
	echo "<script language='JavaScript'>alert('เกิดข้อผิดพลาด');window.location='index.php?sessiontab=$sesstiontab&sub=$sub';</script>";    
	exit;		
}



//log_ewallet('ewallet',$mcode,$sano,$txtMoney,'I',$sadate,"Ewallet($sano)"); 

?>