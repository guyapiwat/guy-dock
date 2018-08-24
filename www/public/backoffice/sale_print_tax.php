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
if($_GET["txtKeyword"] == "")
	{
 
	 
	$strSQL =  $sql;
	$strSQL .= " order by sano ASC";
	$page = 1;
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	
	$sql_1 = "select inv_desc from ".$dbprefix."invent  where inv_code = '$inv' ";
	$r1 = mysql_query($sql_1);
	$rs1=mysql_fetch_object($r1);
	?>



	<table width="100%" border="0">
		<tr>
 			<td align="right"  width="50%" colspan='2' >
				<?php echo $page;?>		
			</td>
		</tr>		 
		<tr>
 			<td align="center"  width="50%" colspan='2' >
				<h2>รายงานภาษีขาย</h2>	
			</td>
		</tr>
		<tr>
 			<td align="center"  width="50%" colspan='2' >
				 ระหว่างวันที่   <?=$fdate?> ถึง <?=$tdate?> 
			</td>
		</tr>
		<tr>
			<td align="left" width="50%"><b>ชื่อผู้ประกอบการ  </b> บริษัท ลาชูเล่  (เอเชีย)จำกัด  </td>
			<td align="left" width="60%"><b>เลขที่ประจำผู้เสียภาษีอากร  </b>0105541041740</td>
		</tr>
		<tr>
			<td align="left" width="50%"><b>ชื่อสถานประกอบการ </b> บริษัท ลาชูเล่  (เอเชีย)จำกัด  </td>
			<td align="left" width="40%"><b>สาขา</b> <?=$rs1->inv_desc;?></td>
		</tr>
	</table>
	 
	<div class="CSSTableGenerator" >
		<table style=' margin:0 auto;' border="1">
		  <tr>	
			<th><div align="center" style="width:100px;">วันที่ซื้อ </div></th>		
			<th><div align="center" >เลขบิล </div></th>	
			<th ><div align="center" style="width:190px;">ชื่อผู้ซื้อ</div></th>		
			<th><div align="center">เลขประจำตัว </div></th>
			<th><div align="center">สถานประกอบการ</div></th>
			<th><div align="right">จำนวนเงิน</div></th>
			<th><div align="right">ภาษี</div></th>
			<th><div align="center">หมายเหตุ</div></th>
		  </tr>
		<?
		$rr = 0;
		
		while($objResult = mysql_fetch_array($objQuery))
		{		
			  $rr++;
			  if($rr==30){
				  $rr=0;
				  $page++;
		?>
		</table>
	</div> 
	
	
	<table width="100%" border="0" style="page-break-before: always" >
		<tr>
 			<td align="right"  width="50%" colspan='2' >
				<?php echo $page;?>		
			</td>
		</tr>		 
		<tr>
 			<td align="center"  width="50%" colspan='2' >
				<h2>รายงานภาษีขาย</h2>	
			</td>
		</tr>
		<tr>
 			<td align="center"  width="50%" colspan='2' >
				 ระหว่างวันที่   <?=$fdate?> ถึง <?=$tdate?> 
			</td>
		</tr>
		<tr>
			<td align="left" width="50%"><b>ชื่อผู้ประกอบการ  </b> บริษัท ลาชูเล่  (เอเชีย)จำกัด  </td>
			<td align="left" width="50%"><b>เลขที่ประจำผู้เสียภาษีอากร  </b>0105541041740</td>
		</tr>
		<tr>
			<td align="left" width="50%"><b>ชื่อสถานประกอบการ </b> บริษัท ลาชูเล่  (เอเชีย)จำกัด  </td>
			<td align="left" width="50%"><b>สาขา</b> <?=$objResult["lid"];?></td>
		</tr>
	</table>
	<div class="CSSTableGenerator" >
	<table width="" border="1">
	<tr>	
	    <th><div align="center" style="width:100px;">วันที่ซื้อ </div></th>		
	    <th><div align="center" >เลขบิล </div></th>	
	    <th ><div align="center" style="width:190px;">ชื่อผู้ซื้อ</div></th>		
		<th><div align="center">เลขประจำตัว </div></th>
		<th><div align="center">สถานประกอบการ</div></th>
		<th><div align="center">จำนวนเงิน</div></th>
		<th><div align="center">ภาษี</div></th>
		<th><div align="center">หมายเหตุ</div></th>
	  </tr>
	<?	
		  }
 
	?>
	  <tr>
		<td align="center"><div align="left"><?=$objResult["sadate"];?></div></td>
		<td><div align="center"><?=$objResult["sano"];?></div></td>
		<td align="left"><div align="left"><?=$objResult["name_t"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["id_card"];?></div></td>
		<td align="right"><div align="center">00000</div></td>
		<td align="right"><div align="right"><?=$objResult["total_tax"];?></div></td>
		<td align="right"><div align="right"><?=$objResult["tax"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["cencels"];?></div></td>
	  </tr>
	<?
	} 
	?>
	  </tr>



	</table>
	</div>
	 
	<?
	mysql_close($link);



}
?>
</body>
</html>