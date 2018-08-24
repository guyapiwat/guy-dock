<?
require("connectmysql.php");
require("./cls/repGenerator.php");
require_once("logtext.php");
require_once ("function.log.inc.php");

	$dbprefix="ali_";

$rec = new repGenerator();
//$rec->setQuery($sql);
//echo $sql;

$sql = "SELECT * FROM ".$dbprefix."member ";
$sql .= "LEFT JOIN (SELECT districtId AS sdistrictId,districtName FROM district) AS tab ON (".$dbprefix."member.cdistrictId=tab.sdistrictId) ";
$sql .= "LEFT JOIN (SELECT amphurId AS samphurId,amphurName FROM amphur) AS tab1 ON (".$dbprefix."member.camphurId=tab1.samphurId) ";
$sql .= "LEFT JOIN (SELECT provinceId AS sprovinceId,provinceName FROM province) AS tab2 ON (".$dbprefix."member.cprovinceId=tab2.sprovinceId) ";
//$sql .=$rec->getSQL();
//echo $sql1;
//$sql=$rec->getSQL;
//echo $sql;

logtext(true,$_SESSION["adminusercode"],'พิมพ์ : ที่อยู่สมาชิก','');
$text="uid=".$_SESSION["adminusercode"]." action=member_export_excel =>$sql";
writelogfile($text);

$rs=mysql_query($sql);
if(mysql_num_rows($rs)<=0){
	
	?><table width="300" align="center" bgcolor="#990000"><tr><td align="center">ไม่พบข้อมูลของบิลเลขที่ <?=$mcode?>
	<br /><input type="button" value="ปิดหน้านี้" onClick="window.close()" /></td></tr></table><?
	exit;
}

for($i=0;$i<mysql_num_rows($rs);$i++) {
	$obj = mysql_fetch_object($rs);
	$mcode[$i]=$obj->mcode;
	$sql2 = "SELECT * FROM ".$dbprefix."member ";
	$sql2 .= "LEFT JOIN district ON (".$dbprefix."member.districtId=district.districtId) ";
	$sql2 .= "LEFT JOIN amphur ON (".$dbprefix."member.amphurId=amphur.amphurId) ";
	$sql2 .= "LEFT JOIN province ON (".$dbprefix."member.provinceId=province.provinceId) ";
	$sql2 .= "WHERE mcode='$mcode[$i]'";
	//$sql2 .= $rec->getSQL("");

	//echo $sql3;
	$rs2 = mysql_query($sql2);

	$name[$mcode[$i]] = mysql_result($rs2,0,'name_t');
	$add[$mcode[$i]] = mysql_result($rs2,0,'address');
	$add1[$mcode[$i]] = mysql_result($rs2,0,'districtId')==""?"":"ต.".mysql_result($rs2,0,'districtId');
	$add1[$mcode[$i]] .= mysql_result($rs2,0,'amphurId')==""?"":"  อ.".mysql_result($rs2,0,'amphurId');
	$add2[$mcode[$i]] = mysql_result($rs2,0,'provinceId')==""?"":"จ.".mysql_result($rs2,0,'provinceId');
	$add2[$mcode[$i]] .= mysql_result($rs2,0,'zip')==""?"":"   ".mysql_result($rs2,0,'zip');
	//echo "<br>".$name[$mcode[$i]]."<br>".$add[$mcode[$i]]."<br>".$add1[$mcode[$i]]."<br>".$zip[$mcode[$i]];
	mysql_free_result($rs2);
}
//mysql_free_result($rs);

define('FPDF_FONTPATH','fpdf/font/');
require('./fpdf/fpdf.php');
$pdf = new FPDF('P','mm','A4');

$pdf -> AddFont('angsa','','angsa.php');

$pdf -> AddPage();
$pdf -> SetTopMargin(10);
$pdf -> SetRightMargin(0);

$offsetx = -5;
$offsety = 0;
$offsettab = 15;
$offsetnline = 4;

$pdf -> SetFont('angsa','',12);

$pdf->SetLeftMargin($offsetx+$offsettab);
$pdf->SetAutoPageBreak(true,10);
//$pdf->SetY($offsety+$offsetnline);

$a = $b = $c = $d = 1;
for ($i=0;$i<sizeof($mcode);$i++) {

$z = $i%sizeof($mcode);
$z=$i;
//echo $z;
/*$pdf -> SetY($offsety+($a*$offsetnline));
$pdf -> SetX($offsetx+$offsettab);
$pdf -> Cell((4*$offsettab),32,"",1,0,"C");

$pdf -> SetY($offsety+($a*$offsetnline));
$pdf -> SetX($offsetx+(5*$offsettab));
$pdf -> Cell((4*$offsettab),32,"",1,0,"C");

$pdf -> SetY($offsety+($a*$offsetnline));
$pdf -> SetX($offsetx+(9*$offsettab));
$pdf -> Cell((4*$offsettab),32,"",1,0,"C");
$a = $a+8;*/

if (($z%3)==0&&$z!=0) {
	$pdf->Ln($offsetnline*8);
}
//$pdf -> SetY($offsety+($b*$offsetnline));
//$pdf -> SetX($offsetx+$offsettab);
$x = $pdf->GetX();
$pdf->Cell((4*$offsettab),32,'',1,0,"L");
$y = $pdf->GetY();
$pdf->SetX($x);
$pdf->MultiCell($offsettab*4,6,$name[$mcode[$i]]."\n".$add[$mcode[$i]].' '.$add1[$mcode[$i]].' '.$add2[$mcode[$i]],0,"L");

//$pdf -> SetY($y+2);//$offsety+($b*$offsetnline));
//$pdf -> SetX($x);//$offsetx+$offsettab);
//$pdf -> Cell((4*$offsettab),6,$name[$mcode[$i]],0,2,"L");

//$pdf -> SetY($offsety+($b*$offsetnline+6));
//$pdf -> SetX($offsetx+$offsettab);
//$pdf -> Cell((4*$offsettab),6,$add[$mcode[$i]],0,2,"L");

//$pdf -> SetY($offsety+($b*$offsetnline+12));
//$pdf -> SetX($offsetx+$offsettab);
//$pdf -> Cell((4*$offsettab),6,$add1[$mcode[$i]],0,2,"L");

//$pdf -> SetY($offsety+($b*$offsetnline+18));
//$pdf -> SetX($offsetx+$offsettab);
//$pdf -> Cell((4*$offsettab),6,$add2[$mcode[$i]],0,0,"L");
//$x=$pdf->GetX();
$pdf->SetY($y);
if($z%3<2){
	$pdf->SetX($x+$offsettab*4);
}
//$b = $b+8;
//}

//if (($z%3)==1) {
//$pdf -> SetY($offsety+($c*$offsetnline));
//$pdf -> SetX($offsetx+(5*$offsettab));
//$pdf -> Cell((4*$offsettab),32,"",1,0,"C");

//$pdf -> SetY($offsety+($c*$offsetnline));
//$pdf -> SetX($offsetx+(5*$offsettab));
//$pdf -> Cell((4*$offsettab),10,$name[$mcode[$i]],0,0,"L");

//$pdf -> SetY($offsety+($c*$offsetnline+6));
//$pdf -> SetX($offsetx+(5*$offsettab));
//$pdf -> Cell((4*$offsettab),10,$add[$mcode[$i]],0,0,"L");

//$pdf -> SetY($offsety+($c*$offsetnline+12));
//$pdf -> SetX($offsetx+(5*$offsettab));
//$pdf -> Cell((4*$offsettab),10,$add1[$mcode[$i]],0,0,"L");

//$pdf -> SetY($offsety+($c*$offsetnline+18));
//$pdf -> SetX($offsetx+(5*$offsettab));
//$pdf -> Cell((4*$offsettab),10,$add2[$mcode[$i]],0,0,"L");
//$c = $c+8;
//}

//if (($z%3)==2) {
//$pdf -> SetY($offsety+($d*$offsetnline));
//$pdf -> SetX($offsetx+(9*$offsettab));
//$pdf -> Cell((4*$offsettab),32,"",1,0,"C");

//$pdf -> SetY($offsety+($d*$offsetnline));
//$pdf -> SetX($offsetx+(9*$offsettab));
//$pdf -> Cell((4*$offsettab),10,$name[$mcode[$i]],0,0,"L");

//$pdf -> SetY($offsety+($d*$offsetnline+6));
//$pdf -> SetX($offsetx+(9*$offsettab));
//$pdf -> Cell((4*$offsettab),10,$add[$mcode[$i]],0,0,"L");

//$pdf -> SetY($offsety+($d*$offsetnline+12));
//$pdf -> SetX($offsetx+(9*$offsettab));
//$pdf -> Cell((4*$offsettab),10,$add1[$mcode[$i]],0,0,"L");

//$pdf -> SetY($offsety+($d*$offsetnline+18));
//$pdf -> SetX($offsetx+(9*$offsettab));
//$pdf -> Cell((4*$offsettab),10,$add2[$mcode[$i]],0,0,"L");
//$d = $d+8;
//}

//echo $mcode[$i]."<br>".$add[$mcode[$i]]."<br>";

}

$pdf -> Output("./pdf/letter_all.pdf");
?>

<? ob_end_flush();?>

<meta content = "0;URL=./pdfshow2.php" http-equiv="refresh" />
