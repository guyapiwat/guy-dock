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
 
	 
	$strSQL = $sql;

	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
	<table width="100%" border="0">
		<tr>
		<td align="left" width="50%">��������Ҫԡ</td>
		<td align="right"  width="50%">������ѹ��� <? echo date("Y-m-d")?></td>
		</tr>
	</table>
	<div class="CSSTableGenerator" >
	
	<table style=' margin:0 auto;' border="1">
	  <tr>	
	    <th><div align="center">������Ҫԡ </div></th>		
	    <th><div align="center" style="width:190px;">���� </div></th>	
	    <th><div align="center">���ʼ�ҹ </div></th>		
	    <th ><div align="center" >���ʻ�ЪҪ�</div></th>		
		<th><div align="center" style="width:100px;">�ѹ�����Ѥ� </div></th>			
		<th><div align="center">���˹� </div></th>
		<th><div align="center">���õ���</div></th>
		<th><div align="center">�����Ѿ�Ź� </div></th>
		<th><div align="center">��ҹ</div></th>
		<th><div align="center">���ʼ���й�</div></th>
		<th><div align="center">��ṹ pv ��ǹ���</div></th>
		<th><div align="center">�͡���</div></th>
		<th><div align="center">Suspend</div></th>
		<th><div align="center">Terminate</div></th>
		<th><div align="center">ewallet</div></th>
		<th><div align="center">������</div></th>
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
		<td align="left" width="50%">��������Ҫԡ</td>
		<td align="right"  width="50%">������ѹ��� <? echo date("Y-m-d")?></td>
		</tr>
	</table>
	<div class="CSSTableGenerator" >
	<table width="" border="1">
	<tr>	
	    <th><div align="center">������Ҫԡ </div></th>		
	    <th><div align="center" style="width:190px;">���� </div></th>	
	    <th><div align="center">���ʼ�ҹ </div></th>		
	    <th ><div align="center">���ʻ�ЪҪ�</div></th>		
		<th><div align="center" style="width:100px;">�ѹ�����Ѥ� </div></th>			
		<th><div align="center">���˹� </div></th>
		<th><div align="center">���õ���</div></th>
		<th><div align="center">�����Ѿ�Ź� </div></th>
		<th><div align="center">��ҹ</div></th>
		<th><div align="center">���ʼ���й�</div></th>
		<th><div align="center">��ṹ pv ��ǹ���</div></th>
		<th><div align="center">�͡���</div></th>
		<th><div align="center">Suspend</div></th>
		<th><div align="center">Terminate</div></th>
		<th><div align="center">ewallet</div></th>
		<th><div align="center">������</div></th>
	  </tr>
	<?	
		  }
 
	?>
	  <tr>
		<td align="center"><div align="left"><?=$objResult["mcode"];?></div></td>
		<td><div align="center"><?=$objResult["name_t"];?></div></td>
		<td align="center"><div align="center"><?=$objResult["sv_code"];?></div></td>
		<td align="left"><div align="left"><?=$objResult["id_card"];?></div></td>
		<td align="center"><div align="center"><?=$objResult["mdate"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["pos_cur"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["pos_cur2"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["upa_code"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["statur_lr"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["sp_code"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["pvh"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["status_doc"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["status_suspend"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["status_terminate1"];?></div></td>
		<td align="right"><div align="center"><?=$objResult["ewallet"];?></div></td>
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