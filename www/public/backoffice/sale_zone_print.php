<? 
session_start();

include("prefix.php");?>
 
 <html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title></title>
<style>
	body {
			position: relative;
			display: block;
			border-bottom: 1px solid #ccc; 
		margin: 0;
		padding: 20px;
		font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
	   	font-weight: 300;
	}

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
    border-spacing: 1;
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
}
.CSSTableGenerator tr th{ background-color:#cccccc; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
	vertical-align:middle;
	border:1px solid #000000;
	border-width:1px 1px 1px 1px;
	text-align:left;
	padding:7px;
	font-size:12px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:1px 1px 1px 1px;
}.CSSTableGenerator tr td:last-child{
	border-width:1px 1px 1px 1px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:1px 1px 1px 1px;
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
	height: 50px;
} 
</style>
</head>
<body>
 
<?
if($_GET["txtKeyword"] == "")
	{
 
	 
	$strSQL =  $sql;
	//$strSQL .= " order by sano ASC";
	//echo $strSQL;
	$page = 1;
	$objQuery = mysql_query($strSQL);
	?>



	<table width="100%" border="0">
		<tr>
 			<td align="right"  width="50%" colspan='2' >
				<?php echo $page;?>		
			</td>
		</tr>		 
		<tr>
 			<td align="center"  width="50%" colspan='2' >
				<h2>รายงานยอดขายตามภาค</h2>	
			</td>
		</tr>
		<tr >
 			<td align="center"  width="50%" colspan='2' style="font-size:14px;" >
			<? if($fdate!=''){?>ประจำวันที่   <?=$fdate?> ถึง <?=$tdate?>
			<? }else{ ?>ประจำวันที่ทั้งหมด<? } ?>
			</td>
		</tr>
	<!--	<tr>
			<td align="left" width="50%"><b>ชื่อผู้ประกอบการ  </b> บริษัท ลาชูเล่  (เอเชีย)จำกัด  </td>
			<td align="left" width="60%"><b>เลขที่ประจำผู้เสียภาษีอากร  </b>0105541041740</td>
		</tr> -->

	</table>
	 
	<div class="CSSTableGenerator" >
		<table style=' margin:0 auto;' border="1">
		  <tr>	
			<th width="70%"><div align="center" >ภาค/จังหวัด </div></th>		
			<th width="30%"><div align="center" >มูลค่า </div></th>	
		  </tr>
		<?
		$rr = 0;
		while($objResult = mysql_fetch_array($objQuery))
		{		
			  $rr++;
			  if($rr==25){
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
				<h2 >รายงานยอดขายตามภาค</h2>	
			</td>
		</tr>
		<tr >
 			<td align="center"  width="50%" colspan='2' style="font-size:14px;" >
				<? if($fdate!=''){?>ประจำวันที่   <?=$fdate?> ถึง <?=$tdate?>
			<? }else{ ?>ประจำวันที่ทั้งหมด<? } ?>
			</td>
		</tr>
	</table>
	<div class="CSSTableGenerator" >
	<table width="" border="1">
	<tr>	
	  	<th width="65%"><div align="center" >ภาค/จังหวัด </div></th>		
			<th width="35%"><div align="center" >มูลค่า </div></th>	
	  </tr>
	<?	
		  }
 
	?>
	<? if($objResult["tr"] == ""){  ?>
	  <tr style="background-color: #cccccc;" >
		<td align="left"><div align="left"> <?=$objResult["province_name"];?></div></td>
		<td><div align="right"> <?=number_format($objResult["total"],2);?></div></td>
	  </tr>
	<? } else{ ?>
		<tr >
		<td align="left"><div align="left"> <?=$objResult["province_name"];?></div></td>
		<td><div align="right"> <?=number_format($objResult["total"],2);?></div></td>
	  </tr>
	<? } ?>
	<?
	} 
	?>
	</table>
	</div>
	 
	<?
	mysql_close($link);
}
?>
</body>
</html>