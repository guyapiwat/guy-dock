<? include("connectmysql.php");?>
<? include("money2text.php");?>
<? include("inc.wording.php");?>
<? ob_start();?>
<?
$sadate = date("d-m-Y");
$dbprefix = "ali_";
$ftrcode = $_GET['ftrcode'];
$fdate = $_GET['fdate'];
$tdate = $_GET['tdate'];
$mcode = $_GET['mcode'];
$total_fast = $_GET['total_fast'];
$total_team = $_GET['total_team'];
$total_matching = $_GET['total_matching'];
$total = $_GET['total'];

$sql2 = "SELECT * FROM ".$dbprefix."member ";
$sql2 .= "LEFT JOIN district ON (".$dbprefix."member.districtId=district.districtId)";
$sql2 .= "LEFT JOIN amphur ON (".$dbprefix."member.amphurId=amphur.amphurId)";
$sql2 .= "LEFT JOIN province ON (".$dbprefix."member.provinceId=province.provinceId)";
$sql2 .= "WHERE mcode='".$mcode."' LIMIT 1 ";
//echo $sql2;
$rs2 = mysql_query($sql2);
$name_f = mysql_result($rs2,0,'name_f');
$name_t =mysql_result($rs2,0,'name_t');
$name  = $name_f .' '.$name_t;
$mobile = mysql_result($rs2,0,'mobile');
$id_card = mysql_result($rs2,0,'id_card');
$id_tax = mysql_result($rs2,0,'id_tax');
if(!empty($id_card) and $name_f != 'บริษัท' and $name_f != 'ห้างหุ้นส่วนจำกัด')$name  .= ' เลขบัตรประชาชน : '.$id_card;
if(!empty($id_tax) and ($name_f == 'บริษัท' or $name_f == 'ห้างหุ้นส่วนจำกัด'))$name  .= ' เลขประจำตัวผู้เสียภาษี : '.$id_card;
if(!empty($mobile))$name  .= ' เบอร์มือถือ : '.$mobile;
$add  = mysql_result($rs2,0,'address');
$add .= mysql_result($rs2,0,'districtName')==""?"":" ต.".mysql_result($rs2,0,'districtName');
$add .= mysql_result($rs2,0,'amphurName')==""?"":" อ.".mysql_result($rs2,0,'amphurName');
$add .= mysql_result($rs2,0,'provinceName')==""?"":" จ.".mysql_result($rs2,0,'provinceName');
$add .= " ".mysql_result($rs2,0,'zip');
$sp_code= mysql_result($rs2,0,'sp_code');
$sp_name = mysql_result($rs2,0,'sp_name');
mysql_free_result($rs2);

list($y,$m,$d) = explode('-',date("Y-m-d"));
mysql_free_result($rs);
//$pdf->AddFont('tahoma','','tahoma.php'); 
define('FPDF_FONTPATH','fpdf/font/'); 
require('./fpdf/fpdf.php'); 
//require('table1.php');
$pdf=new FPDF('P','mm','A4');
//$pdf=new FPDF('P','mm','Letter');
//$pgsize=array(170,216);			// (width,height)
//$pgsize=array(148,210);
//$pdf=new FPDF('P','mm',$pgsize);
//$pdf=new FPDF('P','mm','A5');
$pdf->AddFont('angsa','','angsa.php'); 
$rem = 0;
$nitem = 16;
$ssss = 0;
$ssss2 = 0;
$kkk = 1;
$chklimit[0] = 0;
//$chklimit1[0] = 0;
$chkpage = 0;
for($i=0;$i<sizeof($mcode);$i++){
	 
	$pdf->AddPage();     
	$pdf->SetTopMargin(0); 
	$pdf->SetRightMargin(0); 
	
	$offsetx=-10;
	$offsety=0;
	$offsety1=100;
	$offsettab = 20;
	$offsetnline = 5;
	$inv_ref = "";
	$pdf->SetFont('angsa','',14);  

	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX(($offsetx-5)+$offsettab*5);
	$pdf->Image('../logo.jpg',$offsetx-3+$offsettab*5,$offsety+1*$offsetnline+2,40);
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX(($offsetx-5)+$offsettab*5);
	$pdf->Cell((2*$offsettab),10,"บริษัท ".$wording_lan["company_name"]." ",0,0,"L")
		; 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+$offsettab*3);
	$pdf->Cell((2*$offsettab),10,$wording_lan["company_address"],0,0,"L"); 

	$pdf->MultiCell(140,5,$inv_address[$i],0,'L');
	$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell((2*$offsettab),10,"15 SUKSAWAD 36,BANGPKKOK,RASBURANA,BANGKOK 10140 TEL.(02) 4270088",0,0,"L"); 
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+$offsettab*4);
	$pdf->Cell((2*$offsettab),10,"รายงานรายได้รอบที่ ".$ftrcode." วันที่  ".$fdate." ถึง " .$tdate,0,0,"L"); 

	$pdf->SetFont('angsa','',14);  
	//$pdf->SetY($offsety+$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+8);
	//$pdf->Cell($offsettab,10,"ใบสั่งซื้อสินค้า",1,0,"C"); 
	//$pdf->SetY($offsety+3*$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+5);
	//$pdf->Cell($offsettab,10,"(เอกสารออกเป็นชุด)",0,0,"C"); 
	
	//$pdf->SetY($offsety+(6*$offsetnline));
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell((2*$offsettab),10,"เลขประจำตัวผู้เสียภาษีอากร",0,0,"L"); 
	
	$pdf->SetY($offsety+(2*$offsetnline)-5);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$showtitle,0,0,"C"); 
	$pdf->SetY($offsety+(2*$offsetnline)-1);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$showtitle1,0,0,"C"); 
	//$pdf->SetY($offsety+(6*$offsetnline));
	//$pdf->SetX($offsetx+(4*$offsettab));
	//$pdf->Cell((3*$offsettab),10,"RECEIPT/ TAX INVOICE/PACKING LIST",0,0,"C"); 
	//-------------------table---------------------
	//$pdf->SetY($offsety+(9*$offsetnline));
	

	$offsety = 40;
	//กรอบบน
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
 
	$offsety = 160-$offsety1;

	//กรอบล่าง
	$pdf->SetY($offsety+(21*$offsetnline)-2);
	$pdf->SetX($offsetx+$offsettab);
//	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+6);
	$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	//เส้นบรรทัด ภาษี 7%
	$pdf->SetY($offsety+(21*$offsetnline)+10);
	$pdf->SetX($offsetx+(10*$offsettab)-3);
	//$pdf->Cell(10,0,"",1,0,"L"); 
	//เส้นบรรทัด มูลค่าสินค้า
	$pdf->SetY($offsety+(21*$offsetnline)+15);
	$pdf->SetX($offsetx+(10*$offsettab)-3);
//	$pdf->Cell(10,0,"",1,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+16);
	$pdf->SetX($offsetx+(10*$offsettab)-3);
//	$pdf->Cell(10,0,"",1,0,"L"); 
	
	$pdf->SetFont('angsa','',14);  
 	$offsety = 165-$offsety1;
//  Text down 1

	$pdf->SetY($offsety+(21*$offsetnline)-8);
	$pdf->SetX($offsetx+$offsettab);
 
//////////////  STATUS //////////////
 
//////////////  STATUS //////////////
 
	 $pdf->SetFont('angsa','',16); 
		$pdf->SetY($offsety+(21*$offsetnline)+33);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"     รายได้สุทธิดังกล่าวจะโอนเข้าบัญชีของท่าน  ตามหมายเลขที่ท่านได้แจ้งไว้กับทางบริษัทฯ บริษัทฯขอขอบคุณเป็นอย่างยิ่ง ",0,0,"L"); 
		$pdf->SetY($offsety+(21*$offsetnline)+38);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"ที่ท่านร่วมทำธุรกิจ และหวังเป็นอย่างยื่งว่าท่านที่ปรึกษาทางธุรกิจจะให้ความสนับสนุนบริษัทตลอดไป",0,0,"L"); 
		$pdf->SetY($offsety+(21*$offsetnline)+43);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"หมายเหตุค่าธรรมเนียมในรอบถัดไป  หากเงินที่ได้สุทธิ ของท่านน้อยกว่า หรือเท่ากับ 100.- บาท บริษัทฯจะขอสงวนสิทธิ์",0,0,"L"); 
		$pdf->SetY($offsety+(21*$offsetnline)+48);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"ในการเก็บเงินได้ดังกล่าวเต็มจำนวนไว้ในระบบคอมพิวเตอร์  สะสมไว้ให้เกิน 100.- บาททางบริษัทฯ
จะทำการโอนเงินเข้า",0,0,"L"); 
		$pdf->SetY($offsety+(21*$offsetnline)+53);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"บัญชีธนาคารให้  กรณีโอนเข้าธนาคารค่าธรรมเนียมโอนเงินผ่านธนาคารครั้งละ 25.- บาท ต่อ 1 รอบ การโอนจะถูกหัก ",0,0,"L");
		$pdf->SetY($offsety+(21*$offsetnline)+58);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"ออกจากรายได้สุทธิ",0,0,"L");
	 

		$offsetx = -10;
		$pdf->SetFont('angsa','',14);  
		$offsety=40;
	
//-------------------table--------------------- 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+33);
	$pdf->Cell((3*$offsettab),10,"วันที่",0,0,"L"); 
 	$pdf->SetY($offsety+1+(6*$offsetnline)-1);
	$pdf->SetX($offsetx-2+(9*$offsettab)+5);
	$pdf->Cell((3*$offsettab),10,$sadate,0,0,"L");
	$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+5);
//---------------------------------------------
	
	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"รหัสสมาชิก",0,0,"L"); 

	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+50);
	$pdf->Cell((2*$offsettab),10,$txtoption[$i],0,0,"L"); 

	
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"ชื่อ",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"ที่อยู่",0,0,"L"); 
 	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell((2*$offsettab),10,$mcode,0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab)-11);
	$pdf->Cell((2*$offsettab),10,$name ,0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+3);
	$pdf->SetX($offsetx+(2*$offsettab)-11);
 	$pdf->MultiCell(120,4,$add ,0,'L');
 	$offsetx=-3;
 
 	$pdf->SetFont('angsa','',12); 
//------------------------------------------

	$pdf->SetY($offsety+(23*$offsetnline));
	$pdf->SetX($offsetx+($offsettab));
 	$pdf->SetFont('angsa','',14); 
	
	$offsety = -15;
	$offsetx = 80;
	$pdf->SetY($offsety+(21*$offsetnline)+3);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"เงินโบนัส(Bonus)                   ",0,0,"L");
	
	$pdf->SetY($offsety+(21*$offsetnline)+3);
	$pdf->SetX($offsetx-60+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"รายรับ                  ",0,0,"L");
 
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+(21*$offsetnline)+11);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"1. คอมมิชชั่นผู้แนะนำ                                             ..............................บาท",0,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+10);
	$pdf->SetX($offsetx+$offsettab+70);
	$pdf->Cell($offsettab,0,number_format($total_fast,2,'.',','),0,0,"R"); 


	$pdf->SetY($offsety+(21*$offsetnline)+19);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"2.คอมมิชชั่นบริหารทีมขาย                                      ..............................บาท",0,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+18);
	$pdf->SetX($offsetx+$offsettab+70);
	$pdf->Cell($offsettab,0,number_format($total_team,2,'.',','),0,0,"R"); 

	$pdf->SetY($offsety+(21*$offsetnline)+27);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"3.คอมมิชชั่นแมชชิ่ง                                                 ..............................บาท",0,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+26);
	$pdf->SetX($offsetx+$offsettab+70);
	$pdf->Cell($offsettab,0,number_format($total_matching,2,'.',','),0,0,"R"); 
 
    $pdf->SetY($offsety+(21*$offsetnline)+35);
	$pdf->SetX($offsetx-60+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"รายการหัก",0,0,"L"); 
	


	$pdf->SetY($offsety+(21*$offsetnline)+35);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"ภาษีเงินได้ (Tax Income) 7%                                   ..............................บาท",0,0,"L"); 
	
	$total = ($total_fast+$total_team+$total_matching);
	$pdf->SetY($offsety+(21*$offsetnline)+34);
	$pdf->SetX($offsetx+$offsettab+70);
	$pdf->Cell($offsettab,0,number_format($total*7/107,2,'.',','),0,0,"R"); 
	$pdf->SetY($offsety+(21*$offsetnline)+43);
	$pdf->SetX($offsetx+$offsettab);
	$total_service = 25;
	$round = 1;
	$pdf->Cell(10*$offsettab-7,0,"ค่าธรรมเนียมโอนผ่านธนาคาร  ".$round."  รอบ                   ..............................บาท",0,0,"L"); 
	
	$total_service = $total_service*$round;
 	$pdf->SetY($offsety+(21*$offsetnline)+42);
	$pdf->SetX($offsetx+$offsettab+70);
	$pdf->Cell($offsettab,0,number_format($total_service,2,'.',','),0,0,"R"); 
	
 	$pdf->SetY($offsety+(21*$offsetnline)+59);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"รวมเป็นรายได้สุทธิ                                                  ..............................บาท",0,0,"L"); 

	$pdf->SetY($offsety+(21*$offsetnline)+58);
	$pdf->SetX($offsetx+$offsettab+70);
    $pdf->Cell($offsettab,0,number_format($total-($total*7/107),2,'.',','),0,0,"R"); 
 

	
}
$pdf->Output("./pdf/doc.pdf");

 
?>
<? ob_end_flush();?>
<meta content="0;URl=./pdfshow.php" http-equiv="refresh" />
