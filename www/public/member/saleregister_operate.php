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
							$chkCash = '3162';
							$txtCash = $total;$optionCash = $optionpayment;
						}else if($payment == '2'){
							$chkCredit1 = '3268';$txtCredit1 = $total;$optionCredit1 = $optionpayment;
						}else{
							$chkTransfer = '3193';$txtTransfer = $total;$optionTransfer = $optionpayment;
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
						$sql="insert into ".$dbprefix."asaleh (id,  name_t,sano, sadate,  mcode,sp_code,  sa_type, inv_code,  total,bprice,customer_total, tot_pv, uid,remark,txtInternet,chkInternet,txtTransfer,chkTransfer,txtCash,chkCash,txtCredit1,chkCredit1 ,send,scheck,lid,checkportal,optionCash,optionCredit1,optionTransfer,locationbase,name_f,mbase,crate) values ('$mid' ,'$name_t','$sano' ,'$sadate' ,'$mcode','$sp_code', '$satype' ,'$inv_code' ,'$total' ,'$btotal','$ctotal' ,'$tot_pv' ,'".$_SESSION['inv_usercode']."','','$txtInternet','$chkInternet','$txtTransfer','$chkTransfer','$txtCash','$chkCash','$txtCredit1','$chkCredit1','$radsend','register','".$_SESSION['admininvent']."','2','$optionCash','$optionCredit1','$optionTransfer','".$_SESSION["inv_locationbase"]."','$name_f','$locationbase','".$_SESSION["inv_crate"]."') ";						//====================LOG===========================
					$text="uid=".$_SESSION["inv_usercode"]." action=saleoperate =>$sql";
					writelogfile($text);
					//=================END LOG===========================
					echo $sql;
						mysql_query($sql);
						logtext(true,$_SESSION['admininvent'],'สาขาเพิ่มบิล',$mid);
						$pcode1["0"] = $pcode;
						$price["0"] = $total;
						$bprice["0"] = $btotal;
						$cprice["0"] = $ctotal;
						$pdesc1["0"]=$pdesc;
						$pv["0"]=$tot_pv;
						$qty["0"]='1';
						$totalprice["0"]=$total;
						for($i=0;$i<sizeof($pcode1);$i++){
							$sql="insert into ".$dbprefix."asaled (sano,inv_code,pcode,pdesc,price,bprice,customer_price,pv,qty,amt,locationbase) values ('$mid','".$_SESSION["admininvent"]."','$pcode1[$i]','$pdesc1[$i]','$price[$i]','$bprice[$i]' ,'$cprice[$i]' ,'$pv[$i]','$qty[$i]','$totalprice[$i]','".$_SESSION["inv_locationbase"]."') ";
							//====================LOG===========================
							$text="uid=".$_SESSION["inv_usercode"]." action=saleoperate =>$sql";
							writelogfile($text);
							//=================END LOG===========================
							//echo $sql."<br />";
							mysql_query($sql);
							
							updatestockcard($dbprefix,$mcode,$inv_code,$_SESSION["admininvent"],$sano,$sanox,$sadate,$rccode,$satype,$pcode1[$i],$_SESSION["inv_usercode"],$qty[$i],$price[$i],$totalprice[$i]);
							if(empty($inv_code))minusProduct($dbprefix,$pcode1[$i],$_SESSION['admininvent'],$qty[$i],$sano,$_SESSION["inv_usercode"]);
							else minusProduct1($dbprefix,$pcode1[$i],$inv_code,$qty[$i],$sano,$_SESSION["inv_usercode"],$_SESSION["admininvent"]);
						}
					}

			////////////////
	?>