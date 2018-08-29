<? 
session_start();

include("prefix.php");?>
 
 <html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title></title>
<style>
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:100%;
	border:0px solid #000000;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;

	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}.CSSTableGenerator tr:hover td{
	
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#e5e5e5; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
	vertical-align:middle;
	
	
	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:7px;
	font-size:12px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #cccccc 5%, #b2b2b2 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #b2b2b2) );
	background:-moz-linear-gradient( center top, #cccccc 5%, #b2b2b2 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#b2b2b2");	background: -o-linear-gradient(top,#cccccc,b2b2b2);

	background-color:#cccccc;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:12px;
	font-family:Arial;
	font-weight:bold;
	color:#000000;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #cccccc 5%, #b2b2b2 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #b2b2b2) );
	background:-moz-linear-gradient( center top, #cccccc 5%, #b2b2b2 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#b2b2b2");	background: -o-linear-gradient(top,#cccccc,b2b2b2);

	background-color:#cccccc;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
.CSSTableGenerator tr th{
	font-size:12px;
	font-family:Arial;

}
 
</style>
</head>
<body>
 
<?
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$skey = $_POST['skey']==""?$_GET['skey']:$_POST['skey'];
$scause = $_POST['scause']==""?$_GET['scause']:$_POST['scause'];
$inv = $_POST['inv']==""?$_GET['inv']:$_POST['inv'];
if($_GET["txtKeyword"] == "")
	{
 
	 
	$strSQL =  $sql;
	$strSQL .= " order by sano ASC";
 	$page = 1;
	$no = 0;
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
    $inv_code =mysql_result($objQuery,0,'lid');
	?>
		



	<table width="100%" border="0">
		<tr>		
		<td align="center" width="100%" colspan='3'><b><font size='4'> บริษัท ลาชูเล่  (เอเชีย) จำกัด   </b></font></td>
		</tr>
		<tr>
			<td align="left" width="20%"></td>
			<td align="center" width="60%"><b><font size='2'>รายงานการขายประจำวัน  สรุปการชำระเงิน  รายสาขา </b></font></td>
			<td align="right" width="20%">หน้า <?php echo $page;?></td>
		</tr>
		<tr>
			<td align="left" width="20%"></td>
			<td align="center" width="60%"><b><font size='2'>สำหรับสาขา <?=mysql_result($objQuery,0,'lid');?></b></font></td>
			<td align="right" width="20%">วันที่พิมพ์ <?php echo date("d/m/Y");?></td>
		</tr>
		<tr>
			<td align="left" width="20%"></td>

			<?php if($_GET['fdate'] == ''){ ?>
			<td align="center" width="60%"><b><font size='2'>ประจำวันที่ ทั้งหมด</b></font></td>
			<?}else{ ?>
			<td align="center" width="60%"><b><font size='2'>ประจำวันที่ <?php echo $_GET['fdate']?> ถึง <?php echo $_GET['tdate']?> </b></font></td>
			<?}?>
			
			<td align="right" width="20%">เวลาที่พิมพ์ <?php echo date("H:i:s");?></td>
		</tr>
	</table>
	 
	<div class="CSSTableGenerator" >
		<table style=' margin:0 auto;' border="1">
		   <tr>	
			<th><div align="center" >ลำดับ </div></th>	
			<th><div align="center" >เลขบิล </div></th>	
			<th ><div align="center" style="width:190px;">ชื่อผู้ซื้อ</div></th>		
			<th><div align="center">รหัสสมาชิก </div></th>
			<th><div align="center">ยอดขาย</div></th>
			<th><div align="right">เงินสด</div></th>
 			<th><div align="right">บัตรเครดิต</div></th>
			<th><div align="right">เครดิต</div></th>
			<th><div align="right">เงินโอน</div></th>
			<th><div align="right">โอนธนาคาร</div></th>
			<th><div align="right">Ewallet</div></th>
			<th><div align="right">Voucher</div></th>
			<th><div align="right">หมายเหตุ</div></th>
		  </tr>
		<?
		$rr = 0;
		
		while($objResult = mysql_fetch_array($objQuery))
		{		
			  $rr++;
			  $no++;
			  if($rr==15){
				  $rr=0;
				  $page++;
		?>
		</table>
	</div> 
	
	
	<table width="100%" border="0" style="page-break-before: always" >
				<tr>		
		<td align="center" width="100%" colspan='3'><b><font size='4'> บริษัท ลาชูเล่  (เอเชีย) จำกัด   </b></font></td>
		</tr>
		<tr>
			<td align="left" width="20%"></td>
			<td align="center" width="60%"><b><font size='2'>รายงานการขายประจำวัน  สรุปการชำระเงิน  รายสาขา </b></font></td>
			<td align="right" width="20%">หน้า <?php echo $page;?></td>
		</tr>
		<tr>
			<td align="left" width="20%"></td>
			<td align="center" width="60%"><b><font size='2'>สำหรับสาขา <?=$objResult["lid"];?></b></font></td>
			<td align="right" width="20%">วันที่พิมพ์ <?php echo date("d/m/Y");?></td>
		</tr>
		<tr>
			<td align="left" width="20%"></td>
			<?php if($_GET['fdate'] == ''){ ?>
			<td align="center" width="60%"><b><font size='2'>ประจำวันที่ ทั้งหมด</b></font></td>
			<?}else{ ?>
			<td align="center" width="60%"><b><font size='2'>ประจำวันที่ <?php echo $_GET['fdate']?> ถึง <?php echo $_GET['tdate']?> </b></font></td>
			<?}?>
			
			<td align="right" width="20%">เวลาที่พิมพ์ <?php echo date("H:i:s");?></td>
		</tr>

	</table>
	<div class="CSSTableGenerator" >
	<table width="" border="1">
	<tr>	
			<th><div align="center" >ลำดับ </div></th>	
			<th><div align="center" >เลขบิล </div></th>	
			<th ><div align="center" style="width:190px;">ชื่อผู้ซื้อ</div></th>		
			<th><div align="center">รหัสสมาชิก </div></th>
			<th><div align="center">ยอดขาย</div></th>
			<th><div align="right">เงินสด</div></th>
			<th><div align="right">บัตรเครดิต</div></th>
 			<th><div align="right">เครดิต</div></th>
			<th><div align="right">เงินโอน</div></th>
			<th><div align="right">โอนธนาคาร</div></th>
			<th><div align="right">Ewallet</div></th>
			<th><div align="right">Voucher</div></th>
			<th><div align="right">หมายเหตุ</div></th>
	
		  </tr>
	<?	
		  }
 
	?>
	   <tr>
		<td><div align="center"><?=$no;?></div></td>
 		<td><div align="center"><?=$objResult["sano"];?></div></td>
		<td align="left"><div align="left"><?=$objResult["name_t"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["smcode"];?></div></td>
		<td align="right"><div align="right"><?=number_format($objResult["total"],2,'.',',');?></div></td>
		<td align="right"><div align="right"><?=number_format($objResult["txtCash"],2,'.',',');?></div></td>
		<td align="right"><div align="right"><?=number_format($objResult["txtCredit"],2,'.',',');?></div></td>
		<td align="right"><div align="right"><?=number_format($objResult["CreditCS"],2,'.',',');?></div></td>
		<td align="right"><div align="right"><?=number_format($objResult["txtTransfer"],2,'.',',');?></div></td>
		<td align="right"><div align="right"><?=$objResult["optionTransfer"];?></div></td>
		<td align="right"><div align="right"><?=number_format($objResult["txtInternet"],2,'.',',');?></div></td>
		<td align="right"><div align="right"><?=number_format($objResult["txtDiscount"],2,'.',',');?></div></td>
 		<td align="right"><div align="right"><?=$objResult["cencels"];?></div></td>
	  </tr>
	<?
	} 
	?>


	<?
	$sql = " SELECT ";
	$sql .= " SUM(total)  AS total ";
	$sql .= ",SUM(txtCash)  as txtCash " ;
	$sql .= ",SUM((txtTransfer+txtFuture)) as txtTransfer" ;
	$sql .= ",SUM((txtCredit1+txtCredit2+txtCredit3))  as txtCredit" ;
	$sql .= ",SUM(txtCredit4)  as CreditCS" ;
	$sql .= ",SUM(txtInternet)  as txtInternet" ;
	$sql .= ",SUM(txtDiscount)  as txtDiscount" ;
	$sql .= " FROM ".$dbprefix."asaleh ";
	$sql .= " where 1=1 and sano <> '' and lid <> '' and cancel = 0 "; 
	if(!empty($fdate)){
		$sql .= " and sadate >= '$fdate'  and sadate <= '$tdate'  ";
	}
	if(!empty($inv)){
		$sql .= " and lid = '$inv' ";
	}

	$sql .= " GROUP BY lid";
//echo $sql;
 	$rs = mysql_query($sql) or die ("Error Query [".$sql."]");
	$objrs = mysql_fetch_array($rs);
	?>
	<tr>
		<td bgcolor='#ccc'><div align="center"> </div></td>
 		<td bgcolor='#ccc'><div align="center"> </div></td>
		<td bgcolor='#ccc' align="left"><div align="left"></div></td>
		<td bgcolor='#ccc' align="right"><div align="center">รวม</div></td>
		<td bgcolor='#ccc' align="right"><div align="right"><?=number_format($objrs["total"],2,'.',',');?></div></td>
		<td bgcolor='#ccc' align="right"><div align="right"><?=number_format($objrs["txtCash"],2,'.',',');?></div></td>
		<td bgcolor='#ccc' align="right"><div align="right"><?=number_format($objrs["txtCredit"],2,'.',',');?></div></td>
		<td bgcolor='#ccc' align="right"><div align="right"><?=number_format($objrs["CreditCS"],2,'.',',');?></div></td>
		<td bgcolor='#ccc' align="right"><div align="right"><?=number_format($objrs["txtTransfer"],2,'.',',');?></div></td>
		<td bgcolor='#ccc' align="right"><div align="right"><?=$objrs["optionTransfer"]?></div></td>
		<td bgcolor='#ccc' align="right"><div align="right"><?=number_format($objrs["txtInternet"],2,'.',',');?></div></td>
		<td bgcolor='#ccc' align="right"><div align="right"><?=number_format($objrs["txtDiscount"],2,'.',',');?></div></td>
 		<td bgcolor='#ccc' align="right"><div align="right"></div></td>
	  </tr>

</table>
</div>
<center>
<table border='0'>
	<tr>
			<td ><div align="center"> </div></td>
				<td ><div align="center"> </div></td>
				<td align="left"><div align="left"></div></td>
				<td align="right"><div align="center"></div></td>
				<td  align="right"><div align="right"></div>สรุปเงินโอน :</td>
				<td  align="right"><div align="right"></div></td>
				<td  align="right"><div align="right"></div></td>
				<td align="right"><div align="right"> </div></td>
				<td  align="right"><div align="right"></div></td>
				<td align="right"><div align="right"></div></td>
				<td  align="right"><div align="right"></div></td>
				<td align="right"><div align="right"></div></td>
	</tr>
	<?php
		$sql2 .= "SELECT pm.inv_ref,pm.pay_type,pm.pay_desc,pm.mapping_code,ifnull((SELECT sum(a.txtTransfer) as pva FROM ali_asaleh a WHERE a.lid = '".$inv_code."' and a.sadate >='".$_GET['fdate']."' and a.sadate <='".$_GET['tdate']."' and a.optionTransfer=pm.mapping_code and a.cancel = 0 and a.sano <> '' GROUP BY a.optionTransfer),0) as total FROM ali_payment_type pm WHERE inv_ref='".$inv_code."' and pay_type ='เงินโอน' 
		";
//echo $sql;
 		$rs2 = mysql_query($sql2) or die ("Error Query [".$sql2."]");
	 	while($objResult2 = mysql_fetch_array($rs2))
		{
 		?>
			
			<tr>
				<td ><div align="center"> </div></td>
				<td ><div align="center"> </div></td>
				<td align="left"><div align="left"></div></td>
				<td align="right"><div align="center"></div></td>
				<td  align="right"><div align="right"></div></td>
				<td  align="left" style="width:190px;" ><div align="left"><?=$objResult2["pay_desc"];?></div></td>
				<td  align="right"><div align="right"></div></td>
				<td align="right"><div align="right"><?=number_format($objResult2["total"],2,'.',',');?></div></td>
				<td  align="right"><div align="right"></div></td>
				<td align="right"><div align="right"></div></td>
				<td  align="right"><div align="right"></div></td>
				<td align="right"><div align="right"></div></td>
			  </tr>	
	   <?   
		}
		?>

			<tr>
				<td ><div align="center"> </div></td>
				<td ><div align="center"> </div></td>
				<td align="left"><div align="left"></div></td>
				<td align="right"><div align="center"></div></td>
				<td  align="right"><div align="right"></div></td>
				<td  align="left" style="width:190px;" > </div></td>
				<td  align="right"><div align="right"></div></td>
				<td align="right" style="width:80px;" ><div style='border-top:1px solid #000 ;border-bottom:1px solid #000'align="right"><?=number_format($objrs["txtTransfer"],2,'.',',');?></div></td>
				<td  align="right"><div align="right"></div></td>
				<td align="right"><div align="right"></div></td>
				<td  align="right"><div align="right"></div></td>
				<td align="right"><div align="right"></div></td>
			  </tr>	
	</table>
</center>	
	 
	<?
	mysql_close($link);



}
?>
</body>
</html>