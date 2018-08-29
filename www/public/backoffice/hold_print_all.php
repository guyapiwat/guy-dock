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

 
</style>
</head>
<body>
 
<?
if($_GET["txtKeyword"] == "")
	{
 
	 
	$strSQL =  $sql;

	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
	<table width="100%" border="0">
		<tr>
		<td align="left" width="50%">บิลแจงยอด  ระหว่างวันที่   <?=$fdate?> ถึง <?=$tdate?>             </td>
		<td align="right"  width="50%">พิมพ์วันที่ <? echo date("Y-m-d")?></td>
		</tr>
	</table>
	<div class="CSSTableGenerator" >
	
	<table style=' margin:0 auto;' border="1">
	  <tr>	
	     <th><div align="center">เลขบิล </div></th>		
	    <th><div align="center" style="width:100px;">ประเภท </div></th>	
	    <th><div align="center">รหัสผู้ซื้อ </div></th>		
	    <th ><div align="center" style="width:190px;">ชื่อผู้ซื้อ</div></th>		
		<th><div align="center" >ผู้แนะนำ </div></th>			
		<th><div align="center">ตำแหน่งผู้แนะนำ </div></th>
		<th><div align="center" style="width:100px;">วันที่ซื้อ</div></th>
		<th><div align="center">จำนวนรวม  PV</div></th>
		<th><div align="center">จำนวนเงินรวม</div></th>
		<th><div align="center">เลขที่บิล HOLD</div></th>
		<th><div align="center">รหัสผู้ซื้อ HOLD</div></th>
		<th><div align="center" style="width:190px;">ชื่อผู้ซื้อ HOLD</div></th>
		<th><div align="center">ผู้บันทึก</div></th>
	  </tr>
	<?
	$rr = 0;
	while($objResult = mysql_fetch_array($objQuery))
	{		
		  $rr++;
		  if($rr==20){
			  $rr=0;
	?>
	</table>
	</div> 
	<table width="100%" border="0" style="page-break-before: always">
		<tr>
		<td align="left" width="50%">บิลแจงยอด  ระหว่างวันที่   <?=$fdate?> ถึง <?=$tdate?>             </td>
		<td align="right"  width="50%">พิมพ์วันที่ <? echo date("Y-m-d")?></td>
		</tr>
	</table>
	<div class="CSSTableGenerator" >
	<table width="" border="1">
	<tr>	
	    <th><div align="center">เลขบิล </div></th>		
	    <th><div align="center" style="width:100px;">ประเภท </div></th>	
	    <th><div align="center">รหัสผู้ซื้อ </div></th>		
	    <th ><div align="center" style="width:190px;">ชื่อผู้ซื้อ</div></th>		
		<th><div align="center" >ผู้แนะนำ </div></th>			
		<th><div align="center">ตำแหน่งผู้แนะนำ </div></th>
		<th><div align="center" style="width:100px;">วันที่ซื้อ</div></th>
		<th><div align="center">จำนวนรวม  PV</div></th>
		<th><div align="center">จำนวนเงินรวม</div></th>
		<th><div align="center">เลขที่บิล HOLD</div></th>
		<th><div align="center">รหัสผู้ซื้อ HOLD</div></th>
		<th><div align="center" style="width:190px;">ชื่อผู้ซื้อ HOLD</div></th>
		<th><div align="center">ผู้บันทึก</div></th>
	  </tr>
	<?	
		  }
 
	?>
	  <tr>
		<td align="center"><div align="left"><?=$objResult["hono"];?></div></td>
		<td><div align="center"><?=$objResult["preserve"];?></div></td>
		<td align="center"><div align="center"><?=$objResult["smcode"];?></div></td>
		<td align="left"><div align="left"><?=$objResult["name_t"];?></div></td>
		<td align="center"><div align="center"><?=$objResult["sp_code"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["sp_pos"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["sadate"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["tot_pv"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["total"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["ssano"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["smcode1"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["sname_t"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["uid"];?></div></td>
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