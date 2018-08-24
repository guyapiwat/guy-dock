<? include("connectmysql.php");?>
<? include("money2text.php");?>
<? include("inc.wording.php");?>
<? ob_start();?>
<?
if(isset($_GET['bid']))
	$sano = $_GET['bid'];
	$dbprefix = "ali_";
	$employee_name = $wording_lan["company_name"];
?>
<?
//list($fsano,$tsano)=explode("-",$sano);
/*if($tsano==""){
	$tsano = $fsano;
}*/
$sql = "SELECT * FROM ".$dbprefix."asaleh WHERE id='$sano' ";
//echo $sql;
$rs=mysql_query($sql);
if(mysql_num_rows($rs)<=0){
	
	?><table width="300" align="center" bgcolor="#990000"><tr><td align="center">ไม่พบข้อมูลของบิลเลขที่ <?=$sano?>
	<br /><input type="button" value="ปิดหน้านี้" onClick="window.close()" /></td></tr></table><?
	exit;
}
$typedef = array('A'=>"".$word_lan["invoice_A"]."",'Q'=>"".$word_lan["invoice_Q"]."",'H'=>"".$word_lan["invoice_H"]."",'B'=>"".$word_lan["invoice_B"]."");
for($i=0;$i<mysql_num_rows($rs);$i++){
	$obj = mysql_fetch_object($rs);
	$bill[$i] = $obj->sano;
	$mcode[$i] = $obj->mcode;
	$sa_type[$i] = $obj->sa_type;
	$pv[$i] = $obj->tot_pv;
	$sql2 = "SELECT * FROM ".$dbprefix."member ";
	$sql2 .= "LEFT JOIN district ON (".$dbprefix."member.districtId=district.districtId)";
	$sql2 .= "LEFT JOIN amphur ON (".$dbprefix."member.amphurId=amphur.amphurId)";
	$sql2 .= "LEFT JOIN province ON (".$dbprefix."member.provinceId=province.provinceId)";
	$sql2 .= "WHERE mcode='".$mcode[$i]."' LIMIT 1 ";
	//echo $sql2;
	$rs2 = mysql_query($sql2);
	$name[$mcode[$i]] = mysql_result($rs2,0,'name_t');
	$add[$mcode[$i]] = mysql_result($rs2,0,'address');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'districtName')==""?"":" ต.".mysql_result($rs2,0,'districtName');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'amphurName')==""?"":" อ.".mysql_result($rs2,0,'amphurName');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'provinceName')==""?"":" จ.".mysql_result($rs2,0,'provinceName');
	$add[$mcode[$i]] .= " ".mysql_result($rs2,0,'zip');
	$sp_code[$mcode[$i]] = mysql_result($rs2,0,'sp_code');
	$sp_name[$mcode[$i]] = mysql_result($rs2,0,'sp_name');
	mysql_free_result($rs2);
}
list($y,$m,$d) = explode('-',date("Y-m-d"));
mysql_free_result($rs);
//$pdf->AddFont('tahoma','','tahoma.php'); 
define('FPDF_FONTPATH','fpdf/font/'); 
require('./fpdf/fpdf.php'); 
//require('table1.php');
//$pdf=new FPDF('P','mm','A4');
//$pdf=new FPDF('P','mm','Letter');
$pgsize=array(170,216);			// (width,height)
$pdf=new FPDF('P','mm',$pgsize);
$pdf->AddFont('angsa','','angsa.php'); 
$rem = 0;
$nitem = 10;
for($i=0;$i<sizeof($bill);$i++){
	$sql="SELECT * FROM ".$dbprefix."asaled WHERE sano='$bill[$i]' ";
	$rs=mysql_query($sql);
	$npage = ceil(mysql_num_rows($rs)/$nitem);
	mysql_free_result($rs);
	$sum = 0;
	$sumpv = 0;
	for($k=0;$k<$npage;$k++){
	$sql="SELECT * FROM ".$dbprefix."asaled WHERE sano='$bill[$i]' LIMIT ".($k*$nitem).", $nitem ";
	$rs=mysql_query($sql);
	
	$pdf->AddPage(); 
	//$pdf->image("sale_form.jpg",0,0,230);
	
	$pdf->SetTopMargin(0); 
	$pdf->SetRightMargin(0); 
	
	$offsetx=-5;
	$offsety=0;
	$offsettab = 15;
	$offsetnline = 4;
	
	$pdf->SetFont('angsa','',10); 
	//$logo = "./Logo.jpg";
	$pdf->SetY($offsety+$offsetnline);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab,10,$logo,0,0,"L"); 
	//$pdf->image("Logo.jpg",10,7,14);

	$pdf->SetFont('angsa','',12); 
	
	$pdf->SetY($offsety+$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell((4*$offsettab),10,"บริษัท $employee_name",0,0,"L"); 
	$pdf->SetY($offsety+2*$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell((4*$offsettab),10,$wording_lan["company_address"],0,0,"L"); 
	$pdf->SetY($offsety+3*$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell((4*$offsettab),10,$wording_lan["company_phone"],0,0,"L"); 
	
	$pdf->SetFont('angsa','',10); 
	
	//$pdf->SetY($offsety+$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+5);
	//$pdf->Cell($offsettab,10,"ใบรับเงิน",1,0,"C"); 
	//$pdf->SetY($offsety+3*$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+5);
	//$pdf->Cell($offsettab,10,"(เอกสารออกเป็นชุด)",0,0,"C"); 
	
	//$pdf->SetY($offsety+(6*$offsetnline));
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell((2*$offsettab),10,"เลขประจำตัวผู้เสียภาษีอากร",0,0,"L"); 
	
	$pdf->SetY($offsety+(5*$offsetnline)-2);
	$pdf->SetX($offsetx+(4*$offsettab));
	$pdf->Cell((4*$offsettab),10,"ใบเสร็จรับเงิน / ใบกำกับภาษี",0,0,"C"); 



	//$pdf->Cell((3*$offsettab),10,"RECEIPT/ TAX INVOICE/PACKING LIST",0,0,"C"); 
	//-------------------table---------------------
	$pdf->SetY($offsety+(9*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,6,"",1,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,6,"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(23*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+2);
	$pdf->Cell(21,8,"",1,0,"L"); 
	//-----------------------รายเซ็นต์
	$pdf->SetY($offsety+(27*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,(5*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(27*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(3*$offsettab-7,(5*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(27*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(7*$offsettab-7,(5*$offsetnline),"",1,0,"L"); 
	//checkbox
	$pdf->SetY($offsety+(24*$offsetnline)-2);
	$pdf->SetX($offsetx+(2*$offsettab)-2);
	$pdf->Cell(4,4,"",1,0,"L"); 
	$pdf->SetY($offsety+(24*$offsetnline)-2);
	$pdf->SetX($offsetx+(3*$offsettab)-2);
	$pdf->Cell(4,4,"",1,0,"L"); 
	$pdf->SetY($offsety+(24*$offsetnline)-2);
	$pdf->SetX($offsetx+(4*$offsettab)-2);
	$pdf->Cell(4,4,"",1,0,"L");
	
	$pdf->SetY($offsety+(24*$offsetnline)+3);
	$pdf->SetX($offsetx+(2*$offsettab)-2);
	$pdf->Cell(4,4,"",1,0,"L"); 
	$pdf->SetY($offsety+(24*$offsetnline)+3);
	$pdf->SetX($offsetx+(3*$offsettab)-2);
	$pdf->Cell(4,4,"",1,0,"L"); 
	$pdf->SetY($offsety+(24*$offsetnline)+3);
	$pdf->SetX($offsetx+(4*$offsettab)-2);
	$pdf->Cell(4,4,"",1,0,"L"); 
		//-------------------column---------------
	$pdf->SetY($offsety+(9*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab-5,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(2*$offsettab,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(5*$offsettab,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(6*$offsettab+2,(13*$offsetnline)+2,"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(7*$offsettab+2,(13*$offsetnline)+2,"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(8*$offsettab+2,(13*$offsetnline)+2,"",1,0,"L");
	//-------------------table---------------------
	
	/*$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"เลขที่........................",0,0,"R"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"รหัสสมาชิก...............................วันที่........................",0,0,"R"); 
	$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"ซื้อเพื่อ........................",0,0,"R"); 
//info---------------------------------------
	$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,$bill[$i],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)-1);
	$pdf->SetX($offsetx+(8*$offsettab)+2);
	$pdf->Cell((3*$offsettab),10,$mcode[$i],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"$d-$m-$y",0,0,"L");
	$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,$typedef[$sa_type[$i]],0,0,"L"); */
//---------------------------------------------
	
	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"ชื่อ-สกุลผู้จำหน่ายอิสระ",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"จัดส่งตามที่อยู่",0,0,"L"); 
	
	//$pdf->SetY($offsety+(7*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell((2*$offsettab),10,"ชื่อผู้แนะนำ",0,0,"L"); 
	
	//$pdf->SetY($offsety+(8*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell((2*$offsettab),10,"รหัส",0,0,"L"); 
//info---------------------------------------
	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(2*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,$name[$mcode[$i]],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell((2*$offsettab),10,$add[$mcode[$i]],0,0,"L"); 

	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(5*$offsettab)+20);
	$pdf->Cell((2*$offsettab),10,"รหัสสมาชิก",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(5*$offsettab)+20);
	$pdf->Cell((2*$offsettab),10,"โทรศัพท์",0,0,"L"); 

	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(6*$offsettab)+20);
	$pdf->Cell((2*$offsettab),10,$mcode[$i],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(6*$offsettab)+20);
	$pdf->Cell((2*$offsettab),10,$home_t[$mcode[$i]],0,0,"L"); 

	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(8*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,"เลขที่บิล",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(8*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,"วันที่",0,0,"L");

	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,$bill[$i],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,"$d-$m-$y",0,0,"L");
	
/*	$pdf->SetY($offsety+(7*$offsetnline)+2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"ผู้จำหน่ายอิสระบริษัท ไชนี่ อินเตอร์คอร์ปอเรชั่น จำกัด	",0,0,"L");
	$pdf->SetY($offsety+(7*$offsetnline)+2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"ผู้จำหน่ายอิสระบริษัท ไชนี่ อินเตอร์คอร์ปอเรชั่น จำกัด	",0,0,"L"); */

	$offsetx=-3;
	$offsety=3;
	//$pdf->SetY($offsety+(7*$offsetnline));
	//$pdf->SetX($offsetx+(8*$offsettab));
	//$pdf->Cell((2*$offsettab),10,$sp_name[$mcode[$i]],0,0,"L"); 
	
	//$pdf->SetY($offsety+(8*$offsetnline));
	//$pdf->SetX($offsetx+(8*$offsettab));
	//$pdf->Cell((2*$offsettab),10,$sp_code[$mcode[$i]],0,0,"L"); 
//------------------------------------------
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab,10,"ลำดับ",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx-10+(2*$offsettab)+5);
	$pdf->Cell($offsettab,10,"รหัสสินค้า",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(3*$offsettab));
	$pdf->Cell($offsettab,10,"รายการ",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(6*$offsettab));
	$pdf->Cell($offsettab,10,"จำนวน/หน่วย",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab));
	$pdf->Cell($offsettab,10,"ราคาต่อ/หน่วย",0,0,"L"); 

	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)+5);
	$pdf->Cell($offsettab,10,"คะแนน",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)+2);
	$pdf->Cell($offsettab,10,"จำนวนเงินสุทธิ",0,0,"L"); 
	
	//$pdf->SetY($offsety+(21*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell($offsettab,10,"รวมราคาสินค้าที่รวมภาษีมูลค่าเพิ่ม",0,0,"L"); 
	
	$pdf->SetY($offsety+(21*$offsetnline)+1);
	$pdf->SetX($offsetx+(8*$offsettab)-4);
	$pdf->Cell($offsettab,10,"ภาษีมูลค่าเพิ่ม",0,0,"L");
	
	$pdf->SetY($offsety+(22*$offsetnline)+1);
	$pdf->SetX($offsetx+(8*$offsettab)-4);
	$pdf->Cell($offsettab,10,"รวมเป็นเงินทั้งสิ้น",0,0,"L");
	
	$pdf->SetY($offsety+(20*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab,10,"จำนวนเงินทั้งสิ้น (",0,0,"L"); 
	$pdf->SetY($offsety+(20*$offsetnline));
	$pdf->SetX($offsetx+(6*$offsettab));
	$pdf->Cell($offsettab,10,")",0,0,"L"); 
	$pdf->SetY($offsety+(20*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab));
	$pdf->Cell($offsettab,10,"รวมเป็นเงิน",0,0,"L"); 

	$pdf->SetY($offsety+(26*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+2);
	$pdf->Cell((2*$offsettab),10,"ลงชื่อ....................................................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"ผู้รับเงิน",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"......../......../........",0,0,"C");
	
	$pdf->SetY($offsety+(26*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab)-7);
	$pdf->Cell((2*$offsettab),10,"ลงชื่อ....................................................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab)-7);
	$pdf->Cell((2*$offsettab),10,"ผู้จัดส่งสินค้า",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab)-7);
	$pdf->Cell((2*$offsettab),10,"......../......../........",0,0,"C");
	
	$pdf->SetY($offsety+(26*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-16.5);
	$pdf->Cell((2*$offsettab),10,"ลงชื่อ....................................................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-15);
	$pdf->Cell((2*$offsettab),10,"ผู้รับสินค้า",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-15);
	$pdf->Cell((2*$offsettab),10,"......../......../........",0,0,"C");
	
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"ชำระโดย",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell($offsettab,10,"เงินสด",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(3*$offsettab));
	$pdf->Cell($offsettab,10,"เครดิต",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(4*$offsettab));
	$pdf->Cell($offsettab,10,"โอนธนาคาร..........................................................",0,0,"L");
	
	$pdf->SetY($offsety+(22*$offsetnline)+5);
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"ซื้อเพื่อ",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline)+5);
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell($offsettab,10,"โฮลด์ยอด",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline)+5);
	$pdf->SetX($offsetx+(3*$offsettab));
	$pdf->Cell($offsettab,10,"รักษายอด",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline)+5);
	$pdf->SetX($offsetx+(4*$offsettab));
	$pdf->Cell($offsettab,10,"เลขที่บิลลูกค้า............................................ว/ด/ป.................................................",0,0,"L");

	$pdf->SetFont('angsa','',8); 
	$pdf->SetY($offsety+(23*$offsetnline)+6);
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับผลิตภัณฑ์ที่ระบุไว้ข้างต้นพร้อมตรวจนับจำนวนในสภาพที่สมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	//$pdf->SetY($offsety+(23*$offsetnline)+1);
	//$pdf->SetX($offsetx+(5*$offsettab));
	//$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับผลิตภัณฑ์ที่ระบุไว้ข้างต้น และตรวจจำนวนในสภาพที่สมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	$pdf->SetFont('angsa','',10);
 
	$offsety = 4;
	for($j=0;$j<mysql_num_rows($rs);$j++){	
		$obj = mysql_fetch_object($rs);
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell($offsettab,10,($j+1+($k*$nitem)),0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx-10+(2*$offsettab)+5);
		$pdf->Cell($offsettab,10,$obj->pcode,0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(3*$offsettab));
		$pdf->Cell($offsettab,10,$obj->pdesc,0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(6*$offsettab)-3);
		$pdf->Cell($offsettab,10,$obj->qty,0,0,"R"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(7*$offsettab));
		$pdf->Cell($offsettab,10,number_format($obj->price,2,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab));
		$pdf->Cell($offsettab,10,number_format(($obj->pv*$obj->qty),0,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab)+2);
		$pdf->Cell($offsettab,10,number_format(($obj->price*$obj->qty),2,'.',','),0,0,"R"); 
		$sum += $obj->price*$obj->qty;
		$sumpv += $obj->pv*$obj->qty;
	}
	if($k==$npage-1){
		$offsety = 3;
		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 
		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sumpv,2,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+(21*$offsetnline)+1);
		$pdf->SetX($offsetx+(9*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sum*7/107,2,'.',','),0,0,"R");
		
		$pdf->SetY($offsety+(22*$offsetnline)+1);
		$pdf->SetX($offsetx+(9*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sum-($sum*7/107),2,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(4*$offsettab)-5);
		$pdf->Cell($offsettab,10,moneytotext($sum),0,0,"C"); 
	}
}}
$pdf->Output("./pdf/doc.pdf");

?>
<? ob_end_flush();?>
<meta content="0;URl=./pdfshow.php" http-equiv="refresh" />
