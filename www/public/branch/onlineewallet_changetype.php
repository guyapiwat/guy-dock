<?
session_start();

$id = $_GET['id'];
 if(isset($_GET['tstype'])){
 	$sql = "UPDATE ".$dbprefix."transferewallet_h SET transtype='".$_GET['tstype']."' WHERE id='".$id."' and cancel = 0 ";
	mysql_query($sql);
 }else if(isset($_GET['ptype']) and $_GET['ptype'] == '1'){

	 $sql = "SELECT *  FROM ".$dbprefix."transferewallet_h  WHERE id='".$id."' and cancel = 0 and credittype = '1' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		 echo "<script language='JavaScript'>alert('บิลนี้ได้ชำระผ่านบัตรเครดิตแล้ว');window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";
		exit;
	}

	$sql = "UPDATE ".$dbprefix."transferewallet_h SET paytype='".$_GET['ptype']."',paydate = '".date("Y-m-d H:i:s")."' WHERE id='".$id."' and cancel = 0 and credittype <> '1' ";
	$rsss = mysql_query($sql);
			$ref2 = $id;
			//$sql = "SELECT MAX(id) AS id  FROM ".$dbprefix."ewallet   ";
			//$rs = mysql_query($sql);
			//$sano = $mid = mysql_result($rs,0,'id')+1;
			
				$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."ewallet   ";
				$rs = mysql_query($sql);
				$mid = mysql_result($rs,0,'id')+1;
				$sano = gencodesale('E','ewallet');
				//mysql_free_result($rs);

			//$sano = gencodesale();
			$sql = "select * from ali_transferewallet_h  WHERE id='".$id."' and cancel = 0 and credittype <> '1' ";
			
			$result123=mysql_query($sql);
				
			$sql = "select * from ali_transferewallet_h where id = '".$ref2."' ";
			
			$result=mysql_query($sql);
			if (mysql_num_rows($result)>0 and mysql_num_rows($result123)>0 ) {
				$row = mysql_fetch_object($result);
				$sadate= date("Y-m-d");
				$mcode=$row->mcode;
				$satype=$row->sa_type;
				$inv_code=$row->inv_code;
				$txtMoney = $total=$row->total;
				$tot_pv=$row->tot_pv;
				$tot_weight=$row->tot_weight;
				$tot_fv=$row->tot_fv;
				$uid=$row->uid;
				$uid=$_SESSION["adminusercode"];
				$radsend=$row->radsend;
				$txtoption=$row->txtoption;
				$chkCredit1="";
				$trnf=$row->trnf;
				$name_t=$row->name_t;
				$caddress=$row->caddress;
				$cdistrict=$row->cdistrict;
				$camphur=$row->camphur;
				$cprovince=$row->cprovince;
				$czip=$row->czip;
				$tot_pv=$row->tot_pv;
				$total=$row->total;
				$hdate=$row->hdate;
				$bprice=$row->bprice;
				
				$locationbase=$row->locationbase;
				$sqlewallet = " select ewallet,mobile,name_f,name_t from ".$dbprefix."member where mcode = '".$mcode."'";
				$rsewallet = mysql_query($sqlewallet);
				$ewallet_before=mysql_result($rsewallet,0,'ewallet');
				$mobile=mysql_result($rsewallet,0,'mobile');
				$name_f=mysql_result($rsewallet,0,'name_f');
				$name_t=mysql_result($rsewallet,0,'name_t');

				$crate=$row->crate;
				//echo 's';exit;
				$ewallet_after = $ewallet_before-$total;

				$sql="insert into ".$dbprefix."ewallet (id,  sano, sadate,  mcode,  sa_type, inv_code,  total,  uid,send,txtoption,
				txtMoney,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,
				optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,ewallet_before,ewallet_after,checkportal,bprice,locationbase,name_f,lid,name_t,crate
				
				) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'".$_SESSION["admininvent"]."' ,'$total' ,'".$_SESSION["inv_usercode"]."','$radsend','$txtoption'
				,'$txtMoney','$chkCash','$chkFuture','on','','$chkCredit2','$chkCredit3','$txtCash','$txtFuture',
				'$total','0','$txtCredit2','$txtCredit3','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','".$ewallet_before."','".$ewallet_after."','2','$bprice','$locationbase','$name_f','".$_SESSION["admininvent"]."','$name_t','$crate'
				) ";


				mysql_query($sql);

				$arr_member = array();
				$arr_member = searchlocationbase($dbprefix,$locationbase);
				$bprice = $arr_member["crate"]*$txtMoney;
				mysql_query("update ".$dbprefix."member set ewallet = ewallet+".$txtMoney.", bewallet = bewallet+".$bprice."  where mcode='".$mcode."' ");
				mysql_query("update ".$dbprefix."transferewallet_h set sano = '$mid' where id = '".$ref2."'" );
					echo "<script language='JavaScript'>window.open('invoice_aprintw.php?bid=".$mid."');</script>";	

				
			}
 }else if(isset($_GET['stype'])){
	$sql = "UPDATE ".$dbprefix."transferewallet_h SET sendtype='".$_GET['stype']."' WHERE id='".$id."' and cancel = 0 ";
	mysql_query($sql);

 }
 
 echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";

?>