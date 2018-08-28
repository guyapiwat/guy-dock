<? require "adminchecklogin.php";?>
<? include("fcommon.php");?>
<? include("prefix.php");?>
<? require_once 'function.php';?>
<? require_once ("function.log.inc.php");
$dbhead=$dbprefix."stock_sendhead";	
$dbdesc=$dbprefix."stock_senddesc";	
$dbstock=$dbprefix."stock";	
$dbinvent=$dbprefix."invent";	
$dbproduct=$dbprefix."product";
$max_item =20;

$title="ข้อมูลการส่งสินค้าระหว่างสาขา";								// หัวเรื่อง
$mlink ="stock_outmain.php";
$debug= false;

//get data from post
$tablesize = sizeof($_POST['pcode']);

if(isset($_POST['finv_code']) && $_POST['finv_code'] != '') {
	list($finv_code,$finv_codename) =  split('[|]',$_POST['finv_code']);	
}
if(isset($_POST['tinv_code']) && $_POST['tinv_code'] != '') {
	list($tinv_code,$tinv_codename) =  split('[|]',$_POST['tinv_code']);	
}

?>
	<html>
	<meta http-equiv="Content-Language" content="th">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
	<link href="./../style.css" rel="stylesheet" type="text/css">
<title><?=$title?></title>
<script language="javascript">
var wi=null;
function get_sales_listpicker_mcode(){
		if (wi) wi.close();
		wi=window.open("sales_a_listpicker_mcode.php?name=" + "กz" + "","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_sales_listpicker_pcode(idx){
		if (wi) wi.close();
		wi=window.open("sales_a_listpicker_pcode.php?idx=" + idx + "","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_sales_listpicker_invent(idx){
		if (wi) wi.close();
		wi=window.open("invent_listpicker.php?idx=" + idx + "","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
 
function isnumeric(expression) {
	var nums = "0123456789.-,";
	if (expression.length==0)return(false);
	for (var n=0; n < expression.length; n++){
		if(nums.indexOf(expression.charAt(n))==-1)return(false);
	}
	return(true);
}

function calc_total(idx){
	var total=0;
	var total_pv=0;
	if(isnumeric(document.frm.elements["price[]"][idx].value) && isnumeric(document.frm.elements["qty[]"][idx].value)){
		document.frm.elements["amt[]"][idx].value = (document.frm.elements["price[]"][idx].value) * (document.frm.elements["qty[]"][idx].value);
	}
	//$max_item=20
	for(var i=0;i<20;i++){
		if(isnumeric(document.frm.elements["price[]"][i].value) && isnumeric(document.frm.elements["qty[]"][i].value)){
			document.frm.elements["amt[]"][i].value = (document.frm.elements["price[]"][i].value) * (document.frm.elements["qty[]"][i].value);
			total+=(document.frm.elements["price[]"][i].value) * (document.frm.elements["qty[]"][i].value);
		}
		if(isnumeric(document.frm.elements["pv[]"][i].value) && isnumeric(document.frm.elements["qty[]"][i].value)){
			total_pv+=(document.frm.elements["pv[]"][i].value) * (document.frm.elements["qty[]"][i].value);
		}
	}
	document.frm.total.value=total;
	document.frm.tot_pv.value=total_pv;
}
</script>
</head>
 	<body>
	<?include 'header.php';?>
		[<a href="<?=$mlink?>?page=<?=$page?>">กลับค้นหา <?=$title?></a>]<br>
<br>
<form name="frm"  method="post" action="<?=$_SERVER['PHP_SELF']?>?dosave=1<?if ($edit=="1"){echo "&edit=1";}?><?if ($oid<>""){echo "&oid=$oid";}?>&page=<?=$page?>">
<?
//---------------------------------------- SAVE ADD--------------------------
if ($dosave=="1" and $edit==""){		
		mysql_query("START TRANSACTION");
		$oktosave=true;
		// ตรวจสอบ
		if($C1=='') {
				$oktosave=false;
				echo "<font color='#FF0000'>ไม่ได้ยืนยัน ข้อมูลถูกต้อง</font><br>";
	 	}
		
 
	 	if($tinv_code == '') {
				$oktosave=false;
				echo "<font color='#FF0000'>ไม่ได้เลือกสาขาต้นทาง</font><br>";	 	
 		}
	 	if($finv_code == '') {
				$oktosave=false;
				echo "<font color='#FF0000'>ไม่ได้เลือกสาขาปลายทาง</font><br>";	 	
 		}
 		if($tinv_code == $finv_code) {
				$oktosave=false;
				echo "<font color='#FF0000'>สาขาต้นทาง ซ้ำกับ สาขาปลายทาง</font><br>";	 	
 		}
 		if(! is_valid_mysql_date($senddate) ) {
				$oktosave=false;
				echo "<font color='#FF0000'>วันที่นำส่งไม่ถูกต้อง</font><br>";	 	
 		}		
		
		//2.ตรวจสอบสินค้า มีเพียงพอหรือไม่
		for ($i=0; $i < sizeof($pcode); $i++) {
				   if($pcode[$i] != '' ){		
					   //ตรวจสอบห้ามใส่ pcode ซ้ำ
  						for($j = $i+1 ; $j < $max_item ; $j++) {
								if($pcode[$i] == $pcode[$j]){
										$oktosave=false;
										echo "<font color='#FF0000'>ห้ามกรอก $pcode[$i] ซ้ำ </font><br>";	 												
								}								
						}
						
					   //2.2. ตรวจสอบว่า pcode นั้นมีอยู่ที่สาขาต้นทางนั้นจริง และจำนวนเป็นพอ
					   $sql ="select pcode , inv_code , sum(qty) as qty  
					   						from  ".$dbprefix."stock  
					   						where pcode = '$pcode[$i]'  
					   						and inv_code = '$finv_code' 
					   						group by pcode ,inv_code ";
					   if($debug) echo " $sql <br>";
						$result = mysql_query($sql) or die ("Not found" . mysql_error());
						if($row  = mysql_fetch_assoc($result)  ) {
							$s_qty = $row['qty'];
							if($s_qty  <  $qty[$i]) {
								$oktosave = false;
								echo "<font color='#FF0000'> จำนวนไม่พอ รหัส $pcode[$i] มี $s_qty ชิ้นในสต๊อก</font>&nbsp;   <br>";			
							}
						}else {
								$oktosave = false;
								echo "<font color='#FF0000'>ไม่พบรายการ $pcode[$i] ในคงคลัง</font>&nbsp;   <br>";										
						}
						
						if(number_format($price[$i]) <= 0 ) {
							$j = $i+ 1;
							$oktosave = false;
							echo "<font color='#FF0000'>รายการ $j ราคาไม่ถูกต้อง</font>&nbsp;   <br>";										
						}
						if(number_format($vat[$i]) < 0) {
							$j = $i+ 1;
							$oktosave = false;
							echo "<font color='#FF0000'>รายการ $j  vat ไม่ถูกต้อง</font>&nbsp;   <br>";										
						}
				   }
   		}
		
		// 3. ทำการบันทึกข้อมูล
		if($oktosave) {
			//รวมเงิน
			for ($i=0; $i < $max_item; $i++) {
				   if($pcode[$i] != '' ){
					   $total = $total + ($price[$i] * $qty[$i]);
				   }
			  }					
			//3.1. ทำการบันทึกลง send_h
				$sql  = " insert into ".$dbhead."  (  `id` , `senddate` , `finv_code` , `tinv_code` , `uid` ,  `total`  ,  `remark` )  VALUES ('', '$senddate','$finv_code','$tinv_code','$adminuserid', '$total','$remark' )";	
				//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=stock_outeditadd =>$sql";
writelogfile($text);
//=================END LOG===========================			 
				if($debug) echo " insert head ==> $sql <br>";
 
				$result = mysql_query($sql) or die(mysql_error() . mysql_query("ROLLBACK") .$oktosave =false) ; 
				$sendid = mysql_insert_id();			
				
		}
		
		if($oktosave) {
			$itemno = 1;
				for ($i=0;$i < $max_item ; $i++) { 
					  	if($pcode[$i] != ''  ){
							//3.2  ตดัรายการย่อยๆจากการนำเข้า เพื่อรวมเป็น 1 รายการในการย้ายไปปลายทาง			
				 			  $cutqty = 0;
							  $remain  = $qty[$i];
							
							  $hasstockfstock = "select  *   from  ". $dbstock ."   where pcode = '".$pcode[$i] ."' and inv_code = ".$finv_code." and qty >0  order by sdate "  ;
							  $result = mysql_query($hasstockfstock) or die("Cutstock1".mysql_error());
							
							while($oktosave && ($remain> 0)  && ($row = mysql_fetch_assoc($result))){
											
										   if(  $remain >= $row['qty'] ){
											   //change inv_code && sdate
											   $sql = "update ". $dbstock ."   set  qty =  0   
																			where pcode = '".$pcode[$i] ."' 
																			and inv_code = '".$finv_code."' 
																			and id ='".$row['stockid'] ."'" ;
												//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=stock_outeditadd =>$sql";
writelogfile($text);
//=================END LOG===========================									
												mysql_query($sql) or die(mysql_error() .$oktosave=false);		
												$remain =  $remain  - $row['qty'];
				
										   }else { //insert and cut stock 
												$sql = "update ". $dbstock ."   set   qty = qty - ". $remain."  where id ='".$row['stockid']."'";
												//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=stock_outeditadd =>$sql";
writelogfile($text);
//=================END LOG===========================		
												mysql_query($sql) or die(mysql_error() .$oktosave=false);		
												$remain =  $remain  - $row['qty'];
										   }
										   
							  }	  //while
			  				  			
							if($oktosave) {							  
										//เก็บข้อมูล rocord ใหม่ของที่ย้าย โดยดูจากค่าของ sendid
										$sql =" INSERT INTO ".$dbstock." ( sendid, `pcode` , `inv_code` , `cost`,`vat`  ,  `qty` , `sdate` ,tmporder ) 
													 values  (  '$sendid' , '$pcode[$i]' , '$tinv_code' , '$price[$i]' , '$vat[$i]' , '$qty[$i]' , now(), '$i' ) ";
													 //====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=stock_outeditadd =>$sql";
writelogfile($text);
//=================END LOG===========================		
										$result = mysql_query($sql) or die(mysql_error() . $oktosave =false) ; 				
										$id = mysql_insert_id();				
										if($debug) echo " insert stock==> $sql  , id = $id <br>";
							
										//3.3. ทำการบันทึกลง send_d โดยต้องเก็บค่า stockid ที่ทำการเปลี่ยนแปลง
										$sql =" insert into ".$dbdesc."  (  `id` , stockid , `sendid`  ,itemno, `pcode`  , `qty` , `cost`, `vat` ) 	
														values ('' , '$id' , '$sendid' ,'$itemno' , '$pcode[$i]', '$qty[$i]', '$price[$i]' , '$vat[$i]'  )" ;
			 							//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=stock_outeditadd =>$sql";
writelogfile($text);
//=================END LOG===========================		
										if($debug) echo " $sql <br>";
										$result = mysql_query($sql) or die(mysql_error() . mysql_query("ROLLBACK") .$oktosave =false) ; 			
																									
						 				$itemno++;
							}							  				  			
						 }
					}// else
		} // if $oktosave

	 if($oktosave) {
			mysql_query("COMMIT");			
		 	echo "<font color='#339900'>บันทึกข้อมูลแล้ว ... </font>&nbsp;  <a href='stockout_print.php?oid=$sendid' target=_blank>พิมพ์ใบส่งสินค้าระหว่างสาขา</a> <br>";
			
	 		$sendid="";
			$in_s_no ="";
			$tinv_code ="";
			$finv_code ="";
			$remark ="";
			$senddate = date('Y-m-d');
			for($i = 0 ;$i < $max_item; $i++) {
				$pcode[$i] = "";
				$pdesc[$i] = "";
				$price[$i] = "0";
				$qty[$i] = "1";
				$vat[$i] = "0";
				$amt[$i] = "0";
			}			

	 }else {
			mysql_query("ROLLBACK");			
			echo "<font color='#FF0000'>ไม่สามารถบันทึกข้อมูลได้ ... </font>&nbsp;   <br>";		 
	 }
 }else 		 
//---------------------------------------- SAVE EDIT  -------------------------
if ($dosave=="1" and $edit=="1"){		
		mysql_query("START TRANSACTION");
		$oktosave=true;
		// 1. ตรวจสอบ input 
		if($C1=='') {
				$oktosave=false;
				echo "<font color='#FF0000'>ไม่ได้ยืนยัน ข้อมูลถูกต้อง</font><br>";
	 	}
 
	 	if($tinv_code == '') {
				$oktosave=false;
				echo "<font color='#FF0000'>ไม่ได้เลือกสาขาต้นทาง</font><br>";	 	
 		}
	 	if($finv_code == '') {
				$oktosave=false;
				echo "<font color='#FF0000'>ไม่ได้เลือกสาขาปลายทาง</font><br>";	 	
 		}
 		if($tinv_code == $finv_code) {
				$oktosave=false;
				echo "<font color='#FF0000'>สาขาต้นทาง ซ้ำกับ สาขาปลายทาง</font><br>";	 	
 		} 		
 		if(! is_valid_mysql_date($senddate) ) {
				$oktosave=false;
				echo "<font color='#FF0000'>วันที่นำส่งไม่ถูกต้อง</font><br>";	 	
 		}	
	
 		//ตรวจสอบ input ของรายการ
		for ($i=0; $i < sizeof($pcode); $i++) {
				   if($pcode[$i] != '' ){		
					   
 						for($j = $i+1 ; $j < $max_item ; $j++) {
								if($pcode[$i] == $pcode[$j]){
										$oktosave=false;
										echo "<font color='#FF0000'>ห้ามกรอก $pcode[$i] ซ้ำ </font><br>";	 												
								}								
						}
						
						if(number_format($price[$i]) <= 0 ) {
							$j = $i+ 1;
							$oktosave = false;
							echo "<font color='#FF0000'>รายการ $j ราคาไม่ถูกต้อง</font>&nbsp;   <br>";										
						}
						if(number_format($vat[$i]) < 0) {
							$j = $i+ 1;
							$oktosave = false;
							echo "<font color='#FF0000'>รายการ $j  vat ไม่ถูกต้อง</font>&nbsp;   <br>";										
						}

				   }
   		}


		//2. ตรวจสอบสินค้าที่ทำการกรอกเข้ามาแบบ มีเพียงพอหรือไ่ม่
		for ($i=0; $i < sizeof($pcode); $i++) {
				   if($pcode[$i] != '' ){		
					   //2.1. ตรวจสอบว่าไม่มีการเปลี่ยนแปลงสินค้าที่ทำการย้ายมาก่อนมีอยู่ record เดียวของแต่ละ pcode 
					   $sql ="select d.qty as d_qty , s.qty  as s_qty , h.finv_code ,  h.tinv_code , s.inv_code 
						from ". $dbstock."  s , ".$dbdesc." d  ,  ".$dbhead." h
							where s.pcode = '$pcode[$i]'  
							and s.pcode = d.pcode 
							and d.sendid = '$sendid'
							and d.sendid = s.sendid
							and h.id = d.sendid
							and s.qty > 0 ";
							if($debug) echo " $sql <br>";
							$result = mysql_query($sql) or die ("Not found" . mysql_error());
							if($row = mysql_fetch_assoc($result)) {
							
									if($row['s_qty'] <> $row['d_qty'] ) {
										$oktosave = false;
										echo "<font color='#FF0000'> $pcode[$i] นำส่ง $row[d_qty]  แต่พบสินค้า $row[s_qty]  </font>&nbsp;   <br>";			
									}
									
									if($row['tinv_code'] <> $row['inv_code'] ) {
										$oktosave = false;
										echo "<font color='#FF0000'> นำส่งที่สาขา $row[tinv_code]  แต่พบสินค้าที่สาขา $row[inv_code] </font>&nbsp;   <br>";			
									}							
										
							}else { //กรณีที่ไม่พบข้อมูลเลย
								$oktosave = false;
								echo "<font color='#FF0000'> ไม่พบรายการ $pcode[$i]  </font>&nbsp;   <br>";																		
							}
 

							//ตรวจสอบจำนวนว่าพอจากข้อมูลหน้าจอที่กรอก ต้องเอาต้นทาง + ที่ save แล้วเทียบกับที่กรอก
							$sql = "select (s.qty + d.qty)   as qty 
											from ".$dbprefix."stock s  
											left outer join  ".$dbdesc." d on d.pcode = s.pcode and d.sendid ='$sendid'  
											where inv_code = '$finv_code' 
											and s.pcode = '$pcode[$i]' ";
					   		if($debug) echo " $sql <br>";
							$result = mysql_query($sql) or die ("Not found" . mysql_error());
							
							if($row = mysql_fetch_assoc($result)){
								//เอาจำนวนของต้นทาง +  รายการที่เคยบันทึก ต้องมากกว่าที่กรอก
								if($row['qty']  <  $qty[$i] ) {
									$oktosave = false;
									echo "<font color='#FF0000'> สินค้ามีไม่พอย้าย สินค้ามีเพียง ".$row['qty']."   ชิ้นในสต๊อก</font>&nbsp;   <br>";			
								}
							}else {
								$oktosave = false;
								echo "<font color='#FF0000'> ไม่พบสินค้า $pcode[$i] </font>&nbsp;   <br>";			
							}
							
						if($price[$i] <= 0 ) {
							$j = $i+ 1;
							$oktosave = false;
							echo "<font color='#FF0000'>รายการ $j ราคาไม่ถูกต้อง</font>&nbsp;   <br>";										
						}
						
						if($vat[$i] < 0) {
							$j = $i+ 1;
							$oktosave = false;
							echo "<font color='#FF0000'>รายการ $j  vat ไม่ถูกต้อง</font>&nbsp;   <br>";										
						}						
						
				   }
   		}
 

		//3. ทำการเก็บข้อมูลลง database		
		if($oktosave) {
			//รวมเงิน
			for ($i=0; $i < $max_item; $i++) {
				   if($pcode[$i] != '' ){
					   $total = $total + ($price[$i] * $qty[$i]);
				   }
			  }	
			  //3.0 update ข้อมูล head 			
				$sql =" update ".$dbhead." set  senddate = '$senddate'  , uid = '$adminuserid', tinv_code = '$tinv_code' ,total ='$total' ,remark = '$remark' where id = '$oid' ";
				//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=stock_outeditadd =>$sql";
writelogfile($text);
//=================END LOG===========================		
				if($debug) echo " $sql <br>";
				$result = mysql_query($sql) or die(mysql_error() . mysql_query("ROLLBACK") .$oktosave =false) ; 	
 			
						  	
				//3.1  ทำการคืนค่าจำนวนสินค้าให้ต้นทางโดยคืนรายการทั้งก้อนให้กับ สาขาต้นทาง
	  			$sql =  "update  ". $dbstock ." s   , ".$dbdesc." d
	  							set  s.inv_code = d.finv_code 
	  								where s.pcode  = '$pcode[$i]' 
	  									and s.pcode = d.pcode 
	  									and s.sendid = d.sendid 
	  									and d.sendid = '$sendid' ";			
				//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=stock_outeditadd =>$sql";
writelogfile($text);
//=================END LOG===========================			  			
				if($debug) echo " $sql <br>";
				$result = mysql_query($sql) or die(mysql_error() . mysql_query("ROLLBACK") .$oktosave =false) ; 			
						  					
  		}

		if($oktosave) {
			//3.1  ทำการลบข้อมูลใน table send_d			
  			$sql =  "delete from $dbdesc  where sendid = '$sendid' ";  			
			//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=stock_outeditadd =>$sql";
writelogfile($text);
//=================END LOG===========================		
			if($debug) echo " $sql <br>";
			$result = mysql_query($sql) or die(mysql_error() . mysql_query("ROLLBACK") .$oktosave =false) ; 			
						
			$itemno = 1;
				for ($i=0;$i < $max_item ; $i++) { 
					  	if($pcode[$i] != ''  ){
										//3.2 เก็บข้อมูล rocord ใหม่ของที่ย้าย โดยดูจากค่าของ sendid
										$sql =" INSERT INTO ".$dbstock." ( sendid, `pcode` , `inv_code` , `cost`,`vat`  ,  `qty` , `sdate` ,tmporder ) 
													 values  (  '$sendid' , '$pcode[$i]' , '$tinv_code' , '$price[$i]' , '$vat[$i]' , '$qty[$i]' , now(), '$i' ) ";
										//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=stock_outeditadd =>$sql";
writelogfile($text);
//=================END LOG===========================		
										$result = mysql_query($sql) or die(mysql_error() . $oktosave =false) ; 								
										if($debug) echo " insert stock==> $sql  , id = $id <br>";
							
										//3.3. ทำการบันทึกลง send_d โดยต้องเก็บค่า stockid ที่ทำการเปลี่ยนแปลง
										$sql =" insert into ".$dbdesc."  (  `id` , `sendid`  ,itemno, `pcode`  , `qty` , `cost`, `vat` ) 	
														values ('' , '$sendid' ,'$itemno' , '$pcode[$i]', '$qty[$i]', '$price[$i]' , '$vat[$i]'  )" ;
			 							//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=stock_outeditadd =>$sql";
writelogfile($text);
//=================END LOG===========================		
										if($debug) echo " $sql <br>";
										$result = mysql_query($sql) or die(mysql_error() . mysql_query("ROLLBACK") .$oktosave =false) ; 			
																									
						 				$itemno++;
						 }
					}// else
		} // if $oktosave

		if ($oktosave) {
			mysql_query("COMMIT");
			 echo "<script language='JavaScript'>self.location='$mlink'</script>";				
		 }else {
			mysql_query("ROLLBACK");
			// rollback ข้อมูล stock คืน
			if($rollback){
				//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=stock_outeditadd =>update  ". $dbstock." set inv_code = '$old_tinv_code'   where sendid = '$sendid' and  inv_code = '$old_finv_code'   and qty = 1";
writelogfile($text);
//=================END LOG===========================		
				$result = mysql_query("update  ". $dbstock." set inv_code = '$old_tinv_code'   where sendid = '$sendid' and  inv_code = '$old_finv_code'   and qty = 1") or die ("Not found" . mysql_error().$oktosave=false);
				
				$rollback = true;				
			}
			
			echo "<font color='#FF0000'>ไม่สามารถแก้ไขได้ ข้อมูลผิดพลาด</font>&nbsp;   <br>";		 
		 }
}

if ($dosave <> "1"  && $edit == "1" ) {
//------------GET DATA FOR EDIT ------------------------//
	$sql = "select * from ".$dbhead ." where id =".$oid;
	$result = mysql_query ($sql) or die(mysql_error() );

	if ($row = mysql_fetch_assoc($result)){
		$sendid = $row['id'];
		$senddate = $row['senddate'];
		$tinv_code = $row['tinv_code'];
		$finv_code = $row['finv_code'];
		$remark = $row['remark'];
	}
}else if ($dosave <> "1"  && $edit == "" ) {
//------------ ADD  NEW PAGE------------------------//	
			$sendid ="";
			$in_s_no ="";
			$tinv_code ="";
			$finv_code ="";
			$remark ="";
			$senddate = date('Y-m-d');
			for($i = 0 ;$i < $max_item; $i++) {
				$pcode[$i] = "";
				$imei[$i] = "";
				$pcode[$i] = "";
				$pdesc[$i] = "";
				$price[$i] = "0";
				$qty[$i] = "1";
				$vat[$i] = "0";
				$amt[$i] = "0";
			}			

}
?>


<table width="100%"  border="0" cellpadding="0" cellspacing="0">
    <tr >
      <td width="20%" ><div align="left"> เลขที่ส่งสินค้าออก </div></td>
      <td width="21%" ><div align="left">
		 <input name="sendid" type="text"  value="<?= $sendid  ?> " readonly/>
      </td>
      <td width="14%" align="left" > วันที่ (ว-ด-ป)</td>
      <td width="17%" ><div align="left">
          <input type="text" name="senddate" size="10"  value="<?=$senddate ?>"/>
          <a href='javascript://' onclick='callPick(document.frm.senddate)'><img src='./datepicker/images/cal.gif' border=0></a>
		</td>
      <td width="34%" ></td>
    </tr>
    <tr >
      <td ><div align="left"> จากสาขา </div></td>
      <td ><div align="left"><? 
      		 $showfield[0] = 'INV_CODE';
      		 $showfield[1] ='INV_DESC';
      		 showoptionlists('finv_code', 'invent','INV_CODE', $showfield);?>
      </div></td>
      <td>&nbsp;</td>
      <td >&nbsp;</td>
      <td ></td>
    </tr>
    <tr >
      <td ><div align="left"> ไปยังสาขา</div></td>
      <td ><div align="left"><? 
      		 $showfield[0] = 'INV_CODE';
      		 $showfield[1] ='INV_DESC';
      		 showoptionlists('tinv_code', 'invent','INV_CODE', $showfield);?>
      </div></td>
      <td></td>
      <td >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr >
      <td ><div align="left">รายละเอียด</div></td>
      <td ><div align="left">
          <input type="text" name="remark"   size="40" value="<?=$remark?>"/>
      </div></td>
      <td ></td>
      <td >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5"  align="center">  <div id="error"></div></td>
    </tr>    	
  </table>
<?/////////////////////////// รายการ ///////////////////////////?>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr bgcolor=80c0ff>
      <td width="5%" align=center>ลำดับ</td>
      <td width="30%" align=center>รหัสสินค้า</td>
      <td width="10%" align=center>รายละเอียดสินค้า</td>
      <td width="5%" align=center>ราคา</td>
      <td width="5%" align=center>PV</td>
      <td width="5%" align=center>จำนวน</td>
      <td width="30%" align=left>จำนวนเงิน</td>
    </tr>
	<?
	for ($i=0;$i<$max_item;$i++){
		?>
		<tr <?if (($i % 2)<>1) {echo "bgcolor=d0e0ff";}?>>
		  <td width="5%" align=center><?=$i+1?></td>
		  <td width="30%" align=center><input type="text" name="pcode[]" size="20" maxlength=20 value="<?=$pcode[$i]?>"> <input type="button" value="เลือก" onClick="get_sales_listpicker_pcode(<?=$i?>)"> </td>
		  <td width="10%" align=center><input type="text" name="pdesc[]" size="40" value="<?=$pdesc[$i]?>"></td>
		  <td width="5%" align=center><input type="text" name="price[]" size="7" value="<?=$price[$i]?>"></td>
		  <td width="5%" align=center><input type="text" name="pv[]" size="7" value="<?=$pv[$i]?>"></td>
		  <td width="5%" align=center><input type="text" name="qty[]" size="7" value="<?=$qty[$i]?>" autocomplete=off onBlur="calc_total(<?=$i?>)"></td>
		  <td width="30%" align=left><input type="text" name="amt[]" size="8" value="<?=$amt[$i]?>" autocomplete=off onFocus="calc_total(<?=$i?>)" onBlur="calc_total(<?=$i?>)"></td>
		</tr>
		<?
	}
	?>
    <tr bgcolor=d0e0ff>
      <td width="50%" align=right colspan=4>รวม</td>
      <td width="5%" align=center><input type="text" name="tot_pv" size="7" value="<?=$tot_pv?>"></td>
      <td width="5%" align=center>&nbsp;</td>
      <td width="30%" align=left colspan=2><input type="text" name="total" size="8" value="<?=$total?>"></td>
    </tr>
  </table>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td width="100"></td>
      <td width="300">
        <input type="checkbox" name="C1" value="ok">ข้อมูลถูกต้อง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="บันทึก" name="B1"></td>
    </tr>
  </table>
</form>
</body>
</html>
