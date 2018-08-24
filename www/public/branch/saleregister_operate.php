<?
	$sql = "SELECT pos_cur,name_t,mdate,caddress,czip,cdistrictId,camphurId,cprovinceId,pos_cur,name_f,sp_code,mtype1 from ".$dbprefix."member WHERE mcode='$mcode' ";
						$rs = mysql_query($sql);
						$pos_old = '';
						if(mysql_num_rows($rs)>0) {
							$pos_old = mysql_result($rs,0,'pos_cur');
							$name_t = mysql_result($rs,0,'name_t');
							$name_f = mysql_result($rs,0,'name_f');
							$sp_code = mysql_result($rs,0,'sp_code');
							$pos_cur = mysql_result($rs,0,'pos_cur');
							$mdate = mysql_result($rs,0,'mdate');
							$mtype = mysql_result($rs,0,'mtype1');
						}
						mysql_free_result($rs);


					$sql1 = "SELECT *  FROM ".$dbprefix."product_package where pcode = '$pcode' ";
					$rs1 = mysql_query($sql1);
					if(mysql_num_rows($rs1)>0){
					$total  = mysql_result($rs1,0,'price');
					$btotal  = mysql_result($rs1,0,'bprice');
					$ctotal  = mysql_result($rs1,0,'customer_price');
					$pdesc  = mysql_result($rs1,0,'pdesc');
					$tot_pv  = mysql_result($rs1,0,'pv');
					}
					//$mcode = $stk[0][$i];
					//$inv_code = $strCode;
						$inv_code = $_SESSION["inv_ref"];

					if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="A";}
					if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate=$_SESSION["datetimezone"];}
					if($_GET['state']==0){
						//$mid = ++$sano;
						$txtInternet = 0;$txtCash = 0;$txtCredit1 = 0;$txtTransfer = 0;
						$chkCash = '';$chkInternet = '';$chkCredit1 = '';$chkTransfer = '';
						$optionCash = '';$optionCredit1 = '';$optionTransfer = '';
						if($payment == '1'){
							$chkCash = 'on';
							$txtCash = $total;$optionCash = $optionpayment;
						}else if($payment == '2'){
							$chkCredit1 = 'on';$txtCredit1 = $total;$optionCredit1 = $optionpayment;
						}else{
							$chkTransfer = 'on';$txtTransfer = $total;$optionTransfer = $optionpayment;
						}
						
						$inv_code = $_SESSION['admininvent'];


						$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."asaleh   ";
						$rs = mysql_query($sql);
						$mid = mysql_result($rs,0,'id')+1;

						$sano = gencodesale_IV($sanof);

						if($sletter=="จัดส่ง"){
							$sletter=1;
						}else if($sletter=="1"){
							$sletter=2;
						}
						$sql="insert into ".$dbprefix."asaleh (id,  name_t,sano, sadate,  mcode,sp_code,  sa_type, inv_code,  total,bprice,customer_total, tot_pv, uid,remark,txtInternet,chkInternet,txtTransfer,chkTransfer,txtCash,chkCash,txtCredit1,chkCredit1 ,send,scheck,lid,checkportal,optionCash,optionCredit1,optionTransfer,locationbase,name_f,mbase,crate,cprovinceId,camphurId,cdistrictId,czip,caddress) values ('$mid' ,'$name_t','$sano' ,'$sadate' ,'$mcode','$sp_code', '$satype' ,'$inv_code' ,'$total' ,'$btotal','$ctotal' ,'$tot_pv' ,'".$_SESSION['inv_usercode']."','','$txtInternet','$chkInternet','$txtTransfer','$chkTransfer','$txtCash','$chkCash','$txtCredit1','$chkCredit1','$radsend','register','".$_SESSION['admininvent']."','2','$optionCash','$optionCredit1','$optionTransfer','".$_SESSION["inv_locationbase"]."','$name_f','$locationbase','".$_SESSION["inv_crate"]."','$province','$amphur','$district' ,'$zip','$address') ";						//====================LOG===========================
					
					//=================END LOG===========================
				if (! mysql_query($sql)) {
						$sql_delete = "DELETE FROM ".$dbprefix."member WHERE mcode = '".$mcode."' ";
						mysql_query($sql_delete);
						echo "<script language='JavaScript'>alert('สมัครสมาชิกไม่สำเร็จค่ะ กรุณาสมัครใหม่อีกครั้ง');window.location='index.php?sessiontab=1&sub=910'</script>";
							exit;  
				}else{
					$text="uid=".$_SESSION["inv_usercode"]." action=saleoperate =>$sql";
					writelogfile($text);
					logtext(true,$_SESSION['admininvent'],'สาขาเพิ่มบิล',$mid);
					if(isset($_POST['pcode'])){
							$pcode=$_POST['pcode'];
							$pdesc=$_POST['pdesc'];
							$price=$_POST['price'];
							$pv=$_POST['pv'];
							$qty=$_POST['qty'];
							$totalprice=$_POST['totalprice'];
						}
						for($i=0;$i<sizeof($pcode);$i++){
							$sql="insert into ".$dbprefix."asaled (sano,inv_code,pcode,pdesc,price,bprice,customer_price,pv,qty,amt,locationbase) values ('$mid','".$_SESSION["admininvent"]."','$pcode[$i]','$pdesc[$i]','$price[$i]','$bprice[$i]' ,'$cprice[$i]' ,'$pv[$i]','$qty[$i]','$totalprice[$i]','".$_SESSION["inv_locationbase"]."') ";
							//====================LOG===========================
							$text="uid=".$_SESSION["inv_usercode"]." action=saleoperate =>$sql";
							writelogfile($text);
							//=================END LOG===========================
							//echo $sql."<br />";
							mysql_query($sql);
							
							updatestockcard($dbprefix,$mcode,$inv_code,$_SESSION["admininvent"],$sano,$sanox,$sadate,$rccode,$satype,$pcode[$i],$_SESSION["inv_usercode"],$qty[$i],$price[$i],$totalprice[$i]);
							calc_stock($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION["inv_usercode"],$_SESSION["admininvent"],$satype,'0');
						}
					}
			}
			////////////////
	?>