<?
define('FPDF_FONTPATH','./font/'); 
require('fpdf.php'); 
//$pdf=new FPDF('P','mm','A4');
//$pdf=new FPDF('P','mm','Letter');
$pgsize=array(230,140);
$pdf=new FPDF('P','mm',$pgsize);
$pdf->AddPage(); 
$pdf->SetTopMargin(0); 
$pdf->SetRightMargin(0); 

$pdf->AddFont('angsa','','angsa.php'); 
$pdf->AddFont('tahoma','','tahoma.php'); 

//$pdf->image("sale_form.jpg",0,0,230);

$offsetx=0;
$offsety=0;

//Horizontal Rulers
$vy= 5;
$pdf->SetFont('tahoma','',8); 
$pdf->Line(0, $vy, 230, $vy);
for ($i=0;$i<24;$i++){
	$pdf->Line($i*10, $vy, $i*10, $vy+3);
	$pdf->Line($i*10+5, $vy, $i*10+5, $vy+1);
	if ($i<>'0'){
		$pdf->SetY($vy+3);
		$pdf->SetX($i*10);
		$pdf->Cell(10,10,$i); 
	}
}


// Vertical Ruller
$hx=5;
$pdf->SetFont('tahoma','',8); 
$pdf->Line($hx, 0, $hx, 140);
for ($i=0;$i<11;$i++){
	$pdf->Line($hx,$i*10, $hx+3,$i*10);
	$pdf->Line($hx,$i*10+5, $hx+1,$i*10+5);
	if ($i<>'0'){
		$pdf->SetY($i*10-5);
		$pdf->SetX($hx+3);
		$pdf->Cell(10,10,$i); 
	}
}

$pdf->SetFont('tahoma','',8); 

$pdf->SetY($offsety+19);
$pdf->SetX($offsetx+30);
$pdf->Cell(40,10,'NAME_T',0,"L"); 

$pdf->SetY($offsety+19);
$pdf->SetX($offsetx+130);
$pdf->Cell(40,10,'MCODE',0,"L"); 

$pdf->SetY($offsety+19);
$pdf->SetX($offsetx+175);
$pdf->Cell(40,10,'SANO',0,"L"); 

$pdf->SetY($offsety+24);
$pdf->SetX($offsetx+30);
$pdf->Cell(40,10,'ADDRESS1 ADDRESS2 PROVINCE ZIP',0,"L"); 

$pdf->SetY($offsety+24);
$pdf->SetX($offsetx+175);
$pdf->Cell(40,10,'YYYY-MM-DD',0,"L"); 

$ls=5;
for ($i=0;$i<8;$i++) {
	$msg=$i+1;
	$pdf->SetY($offsety+42+($i*$ls));
	$pdf->SetX($offsetx+10);
	$pdf->Cell(20,10,$msg,0,0,"R"); 

	$msg="PCODE รายละเอียดสินค้า และบริการ";
	$pdf->SetY($offsety+42+($i*$ls));
	$pdf->SetX($offsetx+35);
	$pdf->Cell(20,10,$msg,0,0,"L"); 

	$msg="PVX,XXX";
	$pdf->SetY($offsety+42+($i*$ls));
	$pdf->SetX($offsetx+113);
	$pdf->Cell(20,10,$msg,0,0,"R"); 

	$msg="PR,ICE,XXX,XX";
	$pdf->SetY($offsety+42+($i*$ls));
	$pdf->SetX($offsetx+140);
	$pdf->Cell(20,10,$msg,0,0,"R"); 

	$msg="QTY";
	$pdf->SetY($offsety+42+($i*$ls));
	$pdf->SetX($offsetx+157);
	$pdf->Cell(20,10,$msg,0,0,"R"); 

	$msg="PR,ICE,XXX,XX";
	$pdf->SetY($offsety+42+($i*$ls));
	$pdf->SetX($offsetx+190);
	$pdf->Cell(20,10,$msg,0,0,"R"); 
}

	$suby=87;

	//เงินสด
	$msg="X";
	$pdf->SetY($offsety+$suby+1);
	$pdf->SetX($offsetx+38);
	$pdf->Cell(20,10,$msg,0,0,"L"); 

	//เงินสด
	$msg="XX,XXX.XX";
	$pdf->SetY($offsety+$suby+1);
	$pdf->SetX($offsetx+50);
	$pdf->Cell(20,10,$msg,0,0,"L"); 

	//คูปอง
	$msg="X";
	$pdf->SetY($offsety+$suby+1);
	$pdf->SetX($offsetx+67);
	$pdf->Cell(20,10,$msg,0,0,"L"); 

	//คูปอง
	$msg="X,XXX.XX";
	$pdf->SetY($offsety+$suby+1);
	$pdf->SetX($offsetx+78);
	$pdf->Cell(20,10,$msg,0,0,"L"); 

	//บัตรเครดิต
	$msg="X";
	$pdf->SetY($offsety+$suby+1);
	$pdf->SetX($offsetx+93);
	$pdf->Cell(20,10,$msg,0,0,"L"); 

	$msg="TOT,PVX,XXX";
	$pdf->SetY($offsety+$suby+1);
	$pdf->SetX($offsetx+113);
	$pdf->Cell(20,10,$msg,0,0,"R"); 

	$msg="รวม";
	$pdf->SetY($offsety+$suby);
	$pdf->SetX($offsetx+180);
	$pdf->Cell(20,10,$msg,0,0,"L"); 

	$msg="SU,BXX,XXX,XX";
	$pdf->SetY($offsety+$suby);
	$pdf->SetX($offsetx+190);
	$pdf->Cell(20,10,$msg,0,0,"R"); 

	$msg="VAT";
	$pdf->SetY($offsety+$suby+(4));
	$pdf->SetX($offsetx+180);
	$pdf->Cell(20,10,$msg,0,0,"L"); 

	$msg="VAT,XXX,XX";
	$pdf->SetY($offsety+$suby+(4));
	$pdf->SetX($offsetx+190);
	$pdf->Cell(20,10,$msg,0,0,"R"); 

	$msg="รวมทั้งสิ้น";
	$pdf->SetY($offsety+$suby+(2*4));
	$pdf->SetX($offsetx+180);
	$pdf->Cell(20,10,$msg,0,0,"L"); 
	
	$msg="TO,TAL,XXX,XX";
	$pdf->SetY($offsety+$suby+(2*4));
	$pdf->SetX($offsetx+190);
	$pdf->Cell(20,10,$msg,0,0,"R"); 

	//หมายเหตุ
	$msg="หมายเหตุ XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
	$pdf->SetY($offsety+$suby+(2*4));
	$pdf->SetX($offsetx+40);
	$pdf->Cell(20,10,$msg,0,0,"L"); 

$pdf->Output(); 

?>