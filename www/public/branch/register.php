<?
if($_GET['state']==0){
				$pcode = $GLOBALS["pcode_register"];
					//package
					
				//echo $sano;
				//exit;
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


					$sql1 = "SELECT *  FROM ".$dbprefix."product where pcode = '$pcode' ";
					$rs1 = mysql_query($sql1);
					$total11  = mysql_result($rs1,0,'price');
					$btotal11  = mysql_result($rs1,0,'bprice');
					$ctotal11  = mysql_result($rs1,0,'customer_price');
					$pdesc11  = mysql_result($rs1,0,'pdesc');
					$tot_pv11  = mysql_result($rs1,0,'pv');
					//$mcode = $stk[0][$i];
					//$inv_code = $strCode;
						//$inv_code = $_SESSION["inv_ref"];
						//$inv_code="";

					if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="A";}
					if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate=$_SESSION["datetimezone"];}
					
						//$mid = ++$sano;
						$txtInternet = 0;$txtCash = 0;$txtCredit1 = 0;$txtTransfer = 0;
						$chkCash = '';$chkInternet = '';$chkCredit1 = '';$chkTransfer = '';
						$optionCash = '';$optionCredit1 = '';$optionTransfer = '';
					/*	if($pay=='1'){
						    $chkCash = 'on';
						    $txtCash = $total11;
						}else if($pay=='2'){
							$chkTransfer = 'on';
						    $txtTransfer = $total11;
						}else{
							$chkCredit1 = 'on';
						    $txtCredit1 = $total11;
						}
						*/
						$inv_code = $_SESSION['admininvent'];


						$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."asaleh   ";
						$rs = mysql_query($sql);
						$mid = mysql_result($rs,0,'id')+1;

						//$sano = gencodesale_REGIS($sanof);
						$sanof  = "";
					//	$sano = gencodesale($sanof);
						 $sano = gencodesale_news('S','ali_asaleh',$_SESSION['admininvent']); 
						
						if($sletter=="จัดส่ง"){
							$sletter=1;
						}else if($sletter=="1"){
							$sletter=2;
						}
						else{
							$sletter=1;
						}
						$sql="insert into ".$dbprefix."asaleh (id,  name_t,sano, sadate,  mcode,sp_code,  sa_type, inv_code,  total,bprice,customer_total, tot_pv, uid,remark,txtInternet,chkInternet,txtTransfer,chkTransfer,txtCash,chkCash,txtCredit1,chkCredit1 ,send,scheck,lid,checkportal,optionCash,optionCredit1,optionTransfer,locationbase,name_f,mbase,crate,cprovinceId,camphurId,cdistrictId,czip,caddress) values ('$mid' ,'$name_t','$sano' ,'$sadate' ,'$mcode','$sp_code', '$satype' ,'$inv_code' ,'$total11' ,'$btotal11','$ctotal11' ,'$tot_pv11' ,'".$_SESSION["inv_usercode"]."','','$txtInternet','$chkInternet','$txtTransfer','$chkTransfer','$txtCash','$chkCash','$txtCredit1','$chkCredit1','$sletter','register','".$_SESSION['admininvent']."','2','$optionCash','$optionCredit1','$optionTransfer','".$_SESSION['inv_locationbase']."','$name_f','$locationbase','".$_SESSION["inv_crate"]."','$province','$amphur','$district' ,'$zip','$address') ";						//====================LOG===========================
					
					//=================END LOG===========================

		
				if (! mysql_query($sql)) {
						$sql_delete = "DELETE FROM ".$dbprefix."member WHERE mcode = '".$mcode."' ";
						mysql_query($sql_delete);
						echo "<script language='JavaScript'>alert('สมัครสมาชิกไม่สำเร็จค่ะ กรุณาสมัครใหม่อีกครั้ง');window.location='index.php?sessiontab=1&sub=3'</script>";
							exit;  
				}else{
						$text="uid=".$_SESSION["inv_usercode"]." action=saleoperate =>$sql";
						writelogfile($text);
						logtext(true,$_SESSION["inv_usercode"],'สาขาเพิ่มบิล',$mid);
						$pcode1["0"] = $pcode;
						$price["0"] = $total11;
						$bprice["0"] = $btotal11;
						$cprice["0"] = $ctotal11;
						$pdesc1["0"]=$pdesc11;
						$pv["0"]=$tot_pv11;
						$qty["0"]='1';
						$totalprice["0"]=$total11;
						for($i=0;$i<sizeof($pcode1);$i++){
							$sql="insert into ".$dbprefix."asaled (sano,inv_code,pcode,pdesc,price,bprice,customer_price,pv,qty,amt,locationbase) values ('$mid','$inv_code','$pcode1[$i]','$pdesc1[$i]','$price[$i]','$bprice[$i]' ,'$cprice[$i]' ,'$pv[$i]','$qty[$i]','$totalprice[$i]','".$_SESSION["inv_locationbase"]."') ";
							//====================LOG===========================
							$text="uid=".$mcode." action=saleoperate =>$sql";
							writelogfile($text);
							//=================END LOG===========================
							//echo $sql."<br />";
							mysql_query($sql);
								//updatestockcard($dbprefix,$mcode,$_SESSION["admininvent"],$_SESSION["admininvent"],$sano,$sanox,$sadate,$rccode,$satype,$pcode1[$i],$mcode,$qty[$i],$price[$i],$totalprice[$i]);
								//calc_stock('ali_',$pcode1[$i],$_SESSION["admininvent"],$qty[$i],$sano,$mcode,$_SESSION["admininvent"],$satype,'0');
						}
				}
				
                
                   if($_POST['chk_pay']){
                        $txt = 'txt'.$_POST['chk_pay'];
                        $select = 'select'.$_POST['chk_pay'];
                        $chk = 'chk'.$_POST['chk_pay']; 
                        $update[$chk] = 'on';
                        $update[$txt] = $total11;
                        $update[$select] = $_POST[$select];
                        update("ali_asaleh",$update," id = {$mid}");                        
                    }
                
                
					$object_stocks = new stocks ();
					$object_stocks->set_data($mid,"asale","sender","2");
				/*
				if($total11>0){
				updateewalletcard($dbprefix,$mcode,$mcode,'',$sano,date("Y-m-d H:i:s"),'OUT2','',$total11,$mcode,'3','1');

				$sqlUpdate1 = "update ".$dbprefix."member set ewallet = ewallet-'$total11', bewallet = bewallet-'$total11' WHERE mcode='$mcode' ";
				echo $sqlUpdate1;
				$rs = mysql_query($sqlUpdate1);
				} 
				*/
			
		}
					
?>