<?
define('FPDF_FONTPATH','font/'); 
require('fpdf.php'); 
$pdf=new FPDF('P','mm','A4');
//$pdf=new FPDF('P','mm','Letter');
//$pgsize=array(230,140);
//$pdf=new FPDF('P','mm',$pgsize);
$pdf->AddPage(); 
$pdf->SetTopMargin(0); 
$pdf->SetRightMargin(0); 
$pdf->SetAutoPageBreak(true,10);

$pdf->AddFont('angsa','','angsa.php'); 
$pdf->AddFont('angsab','','angsab.php'); 
$pdf->AddFont('tahoma','','tahoma.php'); 
$pdf->AddFont('tahomabd','','tahomabd.php'); 

//$pdf->image("ตัวอย่างใบเสนอราคา.jpg",0,0,210);

$offsetx=0;
$offsety=0;
$lh=6.5;

//////////////////////////////////////////////////////////////////
//อ่านฐานข้อมูล

require 'connectmysql.php';
include_once "function.php";
$max_item=20;

	$result=mysql_query("select * from ".$dbprefix."QUOTATION_H where ID='$oid'");
	if (mysql_num_rows($result) > 0) {
		$row = mysql_fetch_assoc($result);
		$id=$row["ID"];
		$qno=$row["QNO"];
		$qdate=$row["QDATE"];
		$qvalid=$row["QVALID"];
		$qpayterm=$row["QPAYTERM"];
		$qdelivery=$row["QDELIVERY"];
		$cus_name=$row["CUS_NAME"];
		$cus_contact=$row["CUS_CONTACT"];
		$cus_addr1=$row["CUS_ADDR1"];
		$cus_addr2=$row["CUS_ADDR2"];
		$cus_province=$row["CUS_PROVINCE"];
		$cus_zip=$row["CUS_ZIP"];
		$cus_tel=$row["CUS_TEL"];
		$cus_fax=$row["CUS_FAX"];
		$subtotal=$row["SUBTOTAL"];
		$discount=$row["DISCOUNT"];
		$after_disc=$row["AFTER_DISC"];
		$vat=$row["VAT"];
		$total=$row["TOTAL"];
		$totaltext=$row["TOTALTEXT"];
		$remark=$row["REMARK"];
		if ($qdate=="") {
			$qdate_d="";
			$qdate_m="";
			$qdate_y="";
		}
		else {
			$dash1=strpos($qdate,"-");
			$dash2=strpos($qdate,"-",$dash1+1);
			$qdate_d=substr($qdate,8);
			$qdate_m=substr($qdate,5,2);
			$qdate_y=substr($qdate,0,4);
			if ($qdate_y>"0"){
				$qdate_y+=543;
			}
			else {$qdate_y="";}
		}
		// อ่านรายละเอียด
		$sql="select * from ".$dbprefix."QUOTATION_D where QID='$id' order by ID ";
		//echo "sql=$sql<BR>";
		$result1=mysql_query($sql);
		for ($i=0;$i<mysql_num_rows($result1);$i++){
			$row1 = mysql_fetch_assoc($result1);
			$did[$i]=$row1["ID"];
			$itemno[$i]=$row1["ITEMNO"];
			$itemdesc[$i]=$row1["ITEMDESC"];
			$unitprice[$i]=$row1["UNITPRICE"];
			$qty[$i]=$row1["QTY"];
			$amt[$i]=$row1["AMT"];
		}
		mysql_free_result($result1);

	} 
	else {
		//echo "เกิดข้อผิดพลาด ไม่พบข้อมูล ที่ต้องการ";
		exit;
	}

	if ($qdate=="") {
		$qdate_d="";
		$qdate_m="";
		$qdate_y="";
	}
	else {
		$dash1=strpos($qdate,"-");
		$dash2=strpos($qdate,"-",$dash1+1);
		$qdate_d=substr($qdate,8);
		$qdate_m=substr($qdate,5,2);
		$qdate_y=substr($qdate,0,4);
		if ($qdate_y>"0"){
			$qdate_y+=543;
		}
		else {$qdate_y="";}
	}



//////////////////////////////////////////////////////////////////
$company_name="บริษัท เอลิสิโอ จำกัด ALISIO CO., LTD.";
$company_logo="./images/alisio_logo_02.jpg";
$company_address="54/70 หมู่ 6 ซอยชินเขต 2/38 แขวงทุ่งสองห้อง เขตหลักสี่ กรุงเทพฯ 10210";
$company_tel="โทร. 02-954-8087, 02-954-8880 โทรสาร 02-954-8086";
$company_taxid="เลขประจำตัวผู้เสียภาษี 3-0315-0232-1";
$doc_name="ใบเสนอราคา / Quotation";

//Horizontal Rulers
/*
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
*/

// Vertical Ruller
/*
$hx=5;
$pdf->SetFont('tahoma','',8); 
$pdf->Line($hx, 0, $hx, 290);
for ($i=0;$i<29;$i++){
	$pdf->Line($hx,$i*10, $hx+3,$i*10);
	$pdf->Line($hx,$i*10+5, $hx+1,$i*10+5);
	if ($i<>'0'){
		$pdf->SetY($i*10-5);
		$pdf->SetX($hx+3);
		$pdf->Cell(10,10,$i); 
	}
}
*/


////////////////////////////////////////
$pdf->SetFont('tahomabd','',14); 

//บริษัท-ชื่อ
$pdf->SetY($offsety+6);
$pdf->SetX($offsetx+75);
$pdf->Cell(40,10,$company_name,0,0,"L"); 

//บริษัท-โลโก้
$pdf->image($company_logo,183,7,15);

$pdf->SetFont('tahoma','',10); 

//บริษัท-ที่อยู่
$pdf->SetY($offsety+6+($lh));
$pdf->SetX($offsetx+75);
$pdf->Cell(40,10,$company_address,0,0,"L"); 

//บริษัท-โทร/โทรสาร
$pdf->SetY($offsety+6+(2*$lh));
$pdf->SetX($offsetx+75);
$pdf->Cell(40,10,$company_tel,0,0,"L"); 

//บริษัท-เลขประจำตัวผู้เสียภาษี
$pdf->SetY($offsety+6+(3*$lh));
$pdf->SetX($offsetx+75);
$pdf->Cell(40,10,$company_taxid,0,0,"L"); 

////////////////////////////////////////
//กรอบ-ใบเสนอราคา
$pdf->SetFont('tahomabd','',14); 
$pdf->SetY($offsety+35);
$pdf->SetX($offsetx+125);
$pdf->Cell(40,10,$doc_name,0,0,"L"); 

$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+105, $offsety+35, 93, 9);

////////////////////////////////////////
//กรอบ-ลูกค้า
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12, $offsety+44, 93, $lh*6);

$pdf->SetFont('tahoma','',10); 

//เรียน
$pdf->SetY($offsety+42);
$pdf->SetX($offsetx+12+1);
$pdf->Cell(40,10,"เรียน",0,0,"L"); 

//cus_contact
$pdf->SetY($offsety+42);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(40,10,"$cus_contact",0,0,"L"); 

//ลูกค้า - บริษัท
$pdf->SetY($offsety+42+$lh);
$pdf->SetX($offsetx+12+1);
$pdf->Cell(40,10,"บริษัท",0,0,"L"); 

//cus_name
$pdf->SetY($offsety+42+$lh);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(40,10,"$cus_name",0,0,"L"); 

//ลูกค้า - ที่อยู่
$pdf->SetY($offsety+42+$lh*2);
$pdf->SetX($offsetx+12+1);
$pdf->Cell(40,10,"ทีอยู่",0,0,"L"); 

//cus_addr1
$pdf->SetY($offsety+42+$lh*2);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(40,10,"$cus_addr1",0,0,"L"); 

//cus_addr cus_province cus_zip
$pdf->SetY($offsety+42+$lh*3);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(40,10,"$cus_addr2 $cus_province $cus_zip",0,0,"L"); 

//ลูกค้า - โทร
$pdf->SetY($offsety+42+$lh*4);
$pdf->SetX($offsetx+12+1);
$pdf->Cell(40,10,"โทร",0,0,"L"); 

//cus_tel
$pdf->SetY($offsety+42+$lh*4);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(40,10,"$cus_tel",0,0,"L"); 

//ลูกค้า - โทรสาร
$pdf->SetY($offsety+42+$lh*5);
$pdf->SetX($offsetx+12+1);
$pdf->Cell(40,10,"$โทรสาร",0,0,"L"); 

//cus_fax
$pdf->SetY($offsety+42+$lh*5);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(40,10,"$cus_fax",0,0,"L"); 

//กรอบ-ลูกค้า-หัวซ้าย
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+44, 20, $lh*6);

//กรอบ-ลูกค้า-เรียน
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+44, 93, $lh*2);

//กรอบ-ลูกค้า-ที่อยู่
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+44, 93, $lh*2);

//กรอบ-ลูกค้า-โทร
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+44+$lh*4, 93, $lh);

//กรอบ-ลูกค้า-โทรสาร
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+44+$lh*5, 93, $lh);

////////////////////////////////////////
//กรอบ-ใบเสนอราคา-รายละเอียด
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+105, $offsety+44, 93, $lh*6);

//เลขที่
$pdf->SetY($offsety+42);
$pdf->SetX($offsetx+105+1);
$pdf->Cell(40,10,"เลขที่",0,0,"L"); 

//qno
$pdf->SetY($offsety+42);
$pdf->SetX($offsetx+105+1+30);
$pdf->Cell(40,10,"$qno",0,0,"L"); 

//วันที่
$pdf->SetY($offsety+42+$lh);
$pdf->SetX($offsetx+105+1);
$pdf->Cell(40,10,"วันที่",0,0,"L"); 

//qdate
$pdf->SetY($offsety+42+$lh);
$pdf->SetX($offsetx+105+1+30);
$pdf->Cell(40,10,"$qdate",0,0,"L"); 

//กำหนดยืนราคา
$pdf->SetY($offsety+42+$lh*2);
$pdf->SetX($offsetx+105+1);
$pdf->Cell(40,10,"กำหนดยืนราคา",0,0,"L"); 

//qvalid
$pdf->SetY($offsety+42+$lh*2);
$pdf->SetX($offsetx+105+1+30);
$pdf->Cell(40,10,"$qvalid",0,0,"L"); 

//กำหนดส่งมอบ
$pdf->SetY($offsety+42+$lh*3);
$pdf->SetX($offsetx+105+1);
$pdf->Cell(40,10,"กำหนดส่งมอบ",0,0,"L"); 

//qdelivery
$pdf->SetY($offsety+42+$lh*3);
$pdf->SetX($offsetx+105+1+30);
$pdf->Cell(40,10,"$qdelivery",0,0,"L"); 

//เงื่อนไขชำระเงิน
$pdf->SetY($offsety+42+$lh*4);
$pdf->SetX($offsetx+105+1);
$pdf->Cell(40,10,"เงื่อนไขชำระเงิน",0,0,"L"); 

//qpayterm
$pdf->SetY($offsety+42+($lh*4)+2);
$pdf->SetX($offsetx+105+1+30);
$pdf->MultiCell(60,5,$qpayterm,0,"L");
//Cell(40,10,"$qpayterm",0,0,"L"); 

//กรอบ-ใบเสนอราคา-หัวซ้าย
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+105, $offsety+44, 30, $lh*6);

//กรอบ-เลขที่
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+105, $offsety+44, 93, $lh);

//กรอบ-วันที่
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+105, $offsety+44+$lh, 93, $lh);

//กรอบ-กำหนดยืนราคา
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+105, $offsety+44+$lh*2, 93, $lh);

//กรอบ-กำหนดส่งมอบ
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+105, $offsety+44+$lh*3, 93, $lh);

//กรอบ-เงื่อนไขการชำระเงิน
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+105, $offsety+44+$lh*4, 93, $lh*2);

///////////////////////////////////////
//กรอบ-รายการ
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12, $offsety+87, 93*2, $lh*21);

//กรอบ-รายการ-หัวรายการ
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12, $offsety+87, 93*2, $lh);

//ลำดับ
$pdf->SetY($offsety+85);
$pdf->SetX($offsetx+12+1);
$pdf->Cell(40,10,"ลำดับ",0,0,"L"); 

//กรอบ-รายการ-ลำดับ
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+87, 20, $lh*21);

//กรอบ-รายการ-รายการ
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+87, 111, $lh*21);

//รายการ
$pdf->SetY($offsety+85);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(91,10,"รายการ",0,0,"C"); 

//กรอบ-รายการ-ราคาต่อหน่วย
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+87, 136, $lh*21);

//ราคาต่อหน่วย
$pdf->SetY($offsety+85);
$pdf->SetX($offsetx+12+1+111);
$pdf->Cell(25,10,"ราคาต่อหน่วย",0,0,"C"); 

//กรอบ-รายการ-จำนวนหน่วย
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+87, 161, $lh*21);

//ราคาต่อหน่วย
$pdf->SetY($offsety+85);
$pdf->SetX($offsetx+12+1+136);
$pdf->Cell(25,10,"จำนวน",0,0,"C"); 

//จำนวนเงิน
$pdf->SetY($offsety+85);
$pdf->SetX($offsetx+12+1+161);
$pdf->Cell(25,10,"จำนวนเงิน",0,0,"C"); 

//////////////////////////////////////////////
// รายการ-รายละเอียด สินค้า
for($i=0;$i<$max_item;$i++){

	if ($itemdesc[$i]<>""){
	//ลำดับ
	$pdf->SetY($offsety+85+$lh*($i+1));
	$pdf->SetX($offsetx+12+1);
	$pdf->Cell(40,10,$itemno[$i],0,0,"L"); 

	//รายการ สินค้า
	$pdf->SetY($offsety+85+$lh*($i+1));
	$pdf->SetX($offsetx+12+1+20);
	$pdf->Cell(91,10,$itemdesc[$i],0,0,"L"); 

	if($unitprice[$i]==0){$unitprice[$i]="";}else{$unitprice[$i]=MoneyFormat($unitprice[$i]);}
	if($qty[$i]==0){$qty[$i]="";}else{$qty[$i]=MoneyFormat($qty[$i]);}
	if($amt[$i]==0){$amt[$i]="";}else{$amt[$i]=MoneyFormat($amt[$i]);}
	//ราคาต่อหน่วย
	$pdf->SetY($offsety+85+$lh*($i+1));
	$pdf->SetX($offsetx+12+1+111);
	$pdf->Cell(24,10,$unitprice[$i],0,0,"R"); 

	//ราคาต่อหน่วย
	$pdf->SetY($offsety+85+$lh*($i+1));
	$pdf->SetX($offsetx+12+1+136);
	$pdf->Cell(24,10,$qty[$i],0,0,"R"); 

	//จำนวนเงิน
	$pdf->SetY($offsety+85+$lh*($i+1));
	$pdf->SetX($offsetx+12+1+161);
	$pdf->Cell(24,10,$amt[$i],0,0,"R"); 
	}

}



//////////////////////////////////////////////
//กรอบ-หมายเหตุ
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12, $offsety+87+$lh*21, 111, $lh*5);

//หมายเหตุ
$pdf->SetY($offsety+85+$lh*21);
$pdf->SetX($offsetx+12+2);
$pdf->Cell(40,10,"หมายเหตุ",0,0,"L"); 

//remark
$pdf->SetY($offsety+85+$lh*22+1);
$pdf->SetX($offsetx+12+2+4);
$pdf->MultiCell(90,5,$remark,0,"L");
//$pdf->Cell(40,10,"$remark",0,0,"L"); 

//กรอบ-ตัวอักษร
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+87+$lh*25, 111, $lh);

//ตัวอักษร
//$pdf->SetY($offsety+85+$lh*25);
//$pdf->SetX($offsetx+12+2);
//$pdf->Cell(40,10,"ตัวอักษร",0,0,"L"); 

//totaltext
$pdf->SetY($offsety+85+$lh*25);
$pdf->SetX($offsetx+12+2);
$pdf->Cell(40,10,"$totaltext",0,0,"L"); 

//กรอบ-รวมเงิน
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12+111, $offsety+87+$lh*21, 75, $lh*5);

//กรอบ-รวมเงิน-หัว
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12+111+50, $offsety+87+$lh*21, 25, $lh*5);

//กรอบ-รวมราคาสินค้า
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12+111, $offsety+87+$lh*21, 75, $lh);

$pdf->SetFont('tahoma','',10); 

$msg="รวมราคาสินค้า";
$pdf->SetY($offsety+85+$lh*21);
$pdf->SetX($offsetx+12+111+1);
$pdf->Cell(20,10,$msg,0,0,"L"); 

$msg=MoneyFormat($subtotal);
$pdf->SetY($offsety+85+$lh*21);
$pdf->SetX($offsetx+12+111+55);
$pdf->Cell(20,10,$msg,0,0,"R"); 

//กรอบ-ส่วนลด
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12+111, $offsety+87+$lh*22, 75, $lh);

$msg="ส่วนลด";
$pdf->SetY($offsety+85+$lh*22);
$pdf->SetX($offsetx+12+111+1);
$pdf->Cell(20,10,$msg,0,0,"L"); 

$msg=MoneyFormat($discount);
$pdf->SetY($offsety+85+$lh*22);
$pdf->SetX($offsetx+12+111+55);
$pdf->Cell(20,10,$msg,0,0,"R"); 

//กรอบ-จำนวนเงินหักส่วนลด
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12+111, $offsety+87+$lh*23, 75, $lh);

$msg="จำนวนเงินหักส่วนลด";
$pdf->SetY($offsety+85+$lh*23);
$pdf->SetX($offsetx+12+111+1);
$pdf->Cell(20,10,$msg,0,0,"L"); 

$msg=MoneyFormat($after_disc);
$pdf->SetY($offsety+85+$lh*23);
$pdf->SetX($offsetx+12+111+55);
$pdf->Cell(20,10,$msg,0,0,"R"); 

//กรอบ-ภาษีมูลค่าเพิ่ม 7%
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12+111, $offsety+87+$lh*24, 75, $lh);

$msg="ภาษีมูลค่าเพิ่ม 7%";
$pdf->SetY($offsety+85+$lh*24);
$pdf->SetX($offsetx+12+111+1);
$pdf->Cell(20,10,$msg,0,0,"L"); 

$msg=MoneyFormat($vat);
$pdf->SetY($offsety+85+$lh*24);
$pdf->SetX($offsetx+12+111+55);
$pdf->Cell(20,10,$msg,0,0,"R"); 

//กรอบ-รวมเงินทั้งสิ้น
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12+111, $offsety+87+$lh*25, 75, $lh);

$msg="รวมเงินทั้งสิ้น";
$pdf->SetY($offsety+85+$lh*25);
$pdf->SetX($offsetx+12+111+1);
$pdf->Cell(20,10,$msg,0,0,"L"); 

$msg=MoneyFormat($total);
$pdf->SetY($offsety+85+$lh*25);
$pdf->SetX($offsetx+12+111+55);
$pdf->Cell(20,10,$msg,0,0,"R"); 

//กรอบ-ผู้เสนอราคา-อนุมัติ
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12, $offsety+87+$lh*26, 93*2, $lh*5);

//กรอบ-ผู้เสนอราคา
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+87+$lh*26, 56, $lh*5);

$msg="ลงชื่อ";
$pdf->SetY($offsety+85+$lh*28-2);
$pdf->SetX($offsetx+12+2);
$pdf->Cell(20,10,$msg,0,0,"L"); 
$pdf->Line($offsetx+12+2+10, $offsety+85+$lh*28+4, $offsetx+12+2+5+40, $offsety+85+$lh*28+4);

$msg="ผู้เสนอราคา";
$pdf->SetY($offsety+85+$lh*29-2);
$pdf->SetX($offsetx+12+2+10);
$pdf->Cell(35,10,$msg,0,0,"C"); 

$msg="วันที่";
$pdf->SetY($offsety+85+$lh*30-3);
$pdf->SetX($offsetx+12+2);
$pdf->Cell(20,10,$msg,0,0,"L"); 
$pdf->Line($offsetx+12+2+9, $offsety+85+$lh*30+3, $offsetx+12+2+5+40, $offsety+85+$lh*30+3);

//กรอบ-ผู้มีอำนาจ

$msg="ลงชื่อ";
$pdf->SetY($offsety+85+$lh*28-2);
$pdf->SetX($offsetx+12+2+55);
$pdf->Cell(20,10,$msg,0,0,"L"); 
$pdf->Line($offsetx+12+2+10+55, $offsety+85+$lh*28+4, $offsetx+12+2+5+55+40, $offsety+85+$lh*28+4);

$msg="ผู้อนุมัติ";
$pdf->SetY($offsety+85+$lh*29-2);
$pdf->SetX($offsetx+12+2+10+55);
$pdf->Cell(35,10,$msg,0,0,"C"); 

$msg="วันที่";
$pdf->SetY($offsety+85+$lh*30-3);
$pdf->SetX($offsetx+12+2+55);
$pdf->Cell(20,10,$msg,0,0,"L"); 
$pdf->Line($offsetx+12+2+10+54, $offsety+85+$lh*30+3, $offsetx+12+2+5+55+40, $offsety+85+$lh*30+3);

//กรอบ-ผู้อนุมัติสั่งซื้อ
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12+56+55, $offsety+87+$lh*26, 75, $lh*5);

$msg="(อนุมัติสั่งซื้อโดย)";
$pdf->SetY($offsety+85+$lh*26);
$pdf->SetX($offsetx+12+56+55+2);
$pdf->Cell(20,10,$msg,0,0,"L"); 

$msg="ลงชื่อ";
$pdf->SetY($offsety+85+$lh*28-2);
$pdf->SetX($offsetx+12+56+55+2);
$pdf->Cell(20,10,$msg,0,0,"L"); 
$pdf->SetLineWidth(0.2);
$pdf->Line($offsetx+12+56+55+2+10, $offsety+85+$lh*28+4, $offsetx+12+56+55+2+5+52, $offsety+85+$lh*28+4);

$msg="ตำแหน่ง";
$pdf->SetY($offsety+85+$lh*29-2);
$pdf->SetX($offsetx+12+56+55+2);
$pdf->Cell(35,10,$msg,0,0,"L"); 
$pdf->Line($offsetx+12+56+55+2+14, $offsety+85+$lh*29+3.5, $offsetx+12+56+55+2+5+52, $offsety+85+$lh*29+3.5);

$msg="วันที่";
$pdf->SetY($offsety+85+$lh*30-3);
$pdf->SetX($offsetx+12+56+55+2);
$pdf->Cell(20,10,$msg,0,0,"L"); 
$pdf->Line($offsetx+12+56+55+2+8, $offsety+85+$lh*30+3, $offsetx+12+56+55+2+5+52, $offsety+85+$lh*30+3);
$pdf->Output(); 

?>