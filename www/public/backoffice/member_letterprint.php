<? include ("connectmysql.php");?>
<? ob_start();?>
<?
if(isset($_GET['bmcode']))
	$mcode=$_GET['bmcode'];
	$dbprefix="ali_";
?>

<?
$sql = "SELECT * FROM ".$dbprefix."member WHERE mcode='$mcode' ";
//echo $sql;
$rs=mysql_query($sql);
if(mysql_num_rows($rs)<=0){
	
	?><table width="300" align="center" bgcolor="#990000"><tr><td align="center">ไม่พบข้อมูลของบิลเลขที่ <?=$mcode?>
	<br /><input type="button" value="ปิดหน้านี้" onClick="window.close()" /></td></tr></table><?
	exit;
}

for($i=0;$i<mysql_num_rows($rs);$i++) {
	//$obj = mysql_fetch_object($rs);
	//$mcode[$i]=$obj->mcode;
	$sql2 = "SELECT * FROM ".$dbprefix."member ";
	$sql2 .= "LEFT JOIN district ON (".$dbprefix."member.cdistrictId=district.districtId) ";
	$sql2 .= "LEFT JOIN amphur ON (".$dbprefix."member.camphurId=amphur.amphurId) ";
	$sql2 .= "LEFT JOIN province ON (".$dbprefix."member.cprovinceId=province.provinceId) ";
	$sql2 .= "WHERE mcode='$mcode' LIMIT 1";
	//echo $sql2;
	$rs2 = mysql_query($sql2);
	$name[$mcode[$i]] = mysql_result($rs2,0,'name_t');
	$add[$mcode[$i]] = mysql_result($rs2,0,'address');
	$add1[$mcode[$i]] = mysql_result($rs2,0,'cdistrictId')==""?"":" ต.".mysql_result($rs2,0,'cdistrictId');
	$add1[$mcode[$i]] .= mysql_result($rs2,0,'camphurId')==""?"":"อ.".mysql_result($rs2,0,'camphurId');
	$add2[$mcode[$i]] = mysql_result($rs2,0,'cprovinceId')==""?"":" จ.".mysql_result($rs2,0,'cprovinceId');
	$add2[$mcode[$i]] .= mysql_result($rs2,0,'zip')==""?"":"   ".mysql_result($rs2,0,'zip');
	//echo "<br>".$name[$mcode[$i]]."<br>".$add[$mcode[$i]]."<br>".$add1[$mcode[$i]]."<br>".$zip[$mcode[$i]];
	
	mysql_free_result($rs2);
}
mysql_free_result($rs);

define('FPDF_FONTPATH','fpdf/font/');
require('./fpdf/fpdf.php');
//$pdf=new FPDF('P','mm','Letter');

$pgsize = array(235,108);
$pdf = new FPDF('P','mm',$pgsize);
$pdf -> AddFont('angsa','','angsa.php');
$rem = 0;
$nitem = 10;

for($i=0;$i<sizeof($mcode);$i++) {

$pdf -> AddPage();
$pdf -> SetTopMargin(0);
$pdf -> SetRightMargin(0);

$offsetx = -5;
$offsety = 0;
$offsettab = 15;
$offsetnline = 4;

$pdf -> SetFont('angsa','',12);

$pdf -> SetY($offsety+$offsetnline);
$pdf -> SetX($offsetx+(13*$offsettab));
$pdf -> Cell(2*$offsettab,20,"สแตมป์",1,0,"C");

$pdf -> SetY($offsety+(11*$offsetnline));
$pdf -> SetX($offsetx+(7*$offsettab));
$pdf -> Cell(4*$offsettab,10,$name[$mcode[$i]],0,0,"L");

$pdf -> SetY($offsety+(13*$offsetnline));
$pdf -> SetX($offsetx+(7*$offsettab));
$pdf -> Cell(4*$offsettab,10,$add[$mcode[$i]],0,0,"L");

$pdf -> SetY($offsety+(15*$offsetnline));
$pdf ->	SetX($offsetx+(7*$offsettab));
$pdf -> Cell(4*$offsettab,10,$add1[$mcode[$i]],0,0,"L");

$pdf -> SetY($offsety+(17*$offsetnline));
$pdf -> SetX($offsetx+(7*$offsettab));
$pdf -> Cell(4*$offsettab,10,$add2[$mcode[$i]],0,0,"L");
}

$pdf->Output("./pdf/letter.pdf");

?>
<? ob_end_flush();?>
<meta content="0;URl=./pdfshow1.php" http-equiv="refresh" />
