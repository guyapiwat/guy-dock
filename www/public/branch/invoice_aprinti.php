<? include("connectmysql.php");?>
<? include("money2text.php");?>
<? include("inc.wording.php");?>
<? ob_start();?>
<?
if(isset($_GET['bid']))
	$id = $_GET['bid'];
	$dbprefix = "ali_";
	$employee_name = $wording_lan["company_name"];
?>
<?
//list($fsano,$tsano)=explode("-",$sano);
/*if($tsano==""){
	$tsano = $fsano;
}*/
$sql = "SELECT * FROM ".$dbprefix."isaleh WHERE id='$id' ";
$sqlLog1 = "SELECT sys_id,logdate,logtime FROM ".$dbprefix."log  WHERE object ='$sano' and subject = 'ยืนยันการสั่งซื้อ' order by id desc";
$sqlLog2 = "SELECT sys_id,logdate,logtime  FROM ".$dbprefix."log  WHERE object ='$sano' and subject = 'แก้ไขบิล' order by id desc";

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
	$bill[$i] = $obj->id;
	$sano[$i] = $obj->sano;
	$mcode[$i] = $obj->inv_code;
	$uid[$i] = $obj->uid;
	$selectqq = "select * from ".$dbprefix."user where usercode = '$uid[$i]' ";
	$query = mysql_query($selectqq);
	$objse = mysql_fetch_object($query);
	$uid[$i] = $objse->username;	
	$sa_type[$i] = $obj->sa_type;
	$pv[$i] = $obj->tot_pv;
	$sadate[$i] = $obj->sadate;
	$sadate = explode('-',$sadate[$i]);
	$sadate = $sadate[2].'-'.$sadate[1].'-'.$sadate[0];
	$txtoption[$i] = $obj->txtoption;
	//if(!empty($txtoption[$i]))
	$chkCash[$i] = $obj->chkCash;
	$send[$i] = $obj->send;
	if($send[$i] == '1')$send[$i] = 'จัดส่ง';else $send[$i]  = "";
	$chkFuture[$i] = $obj->chkFuture;
	$chkTransfer[$i] = $obj->chkTransfer;
	$chkCredit1[$i] = $obj->chkCredit1;
	$chkCredit2[$i] = $obj->chkCredit2;
	$chkCredit3[$i] = $obj->chkCredit3;
	$inv_code[$i] = $obj->inv_code;
	if(empty($inv_code[$i]))$inv_code[$i] = 'Head Office';

	$rs1=mysql_query($sqlLog1);
	if(mysql_num_rows($rs1) > 0){
		$obj1 = mysql_fetch_object($rs1);
		$uid1[$i] = $obj1->sys_id; 
		$selectqq = "select * from ".$dbprefix."user where usercode = '$uid1[$i]' ";
		$query = mysql_query($selectqq);
		$objse = mysql_fetch_object($query);
		$uid1[$i] = $objse->username;	
		$logdate1[$i] = $obj1->logdate;
		$logdate11 = explode('-',$logdate1[$i]);
		$logdate11 = $logdate11[2].'-'.$logdate11[1].'-'.$logdate11[0];
		$logtime1[$i] = $obj1->logtime;
	}
	$rs2=mysql_query($sqlLog2);
	if(mysql_num_rows($rs2) > 0){
		$obj2 = mysql_fetch_object($rs2);
		$uid2[$i] = $obj2->sys_id; 
		$selectqq = "select * from ".$dbprefix."user where usercode = '$uid2[$i]' ";
		$query = mysql_query($selectqq);
		$objse = mysql_fetch_object($query);
		$uid2[$i] = $objse->username;	
		$logdate2[$i] = $obj2->logdate;
		$logdate21 = explode('-',$logdate2[$i]);
		$logdate21 = $logdate21[2].'-'.$logdate21[1].'-'.$logdate21[0];
		$logtime2[$i] = $obj2->logtime;
	}
	


	$txtCash[$i] = $obj->txtCash;
	$txtFuture[$i] = $obj->txtFuture;
	$txtTransfer[$i] = $obj->txtTransfer;
	$txtCredit1[$i] = $obj->txtCredit1;
	$txtCredit2[$i] = $obj->txtCredit2;
	$txtCredit3[$i] = $obj->txtCredit3;
	$txtAllCredit[$i] = $txtCredit1[$i]+$txtCredit2[$i]+$txtCredit3[$i];

	$txtShow[$i] = "";
	if($chkCash[$i] == 'on') $txtShow[$i] .= ' Cash : '.$txtCash[$i];
	if($chkFuture[$i] == 'on') $txtShow[$i] .= ' Future : '.$txtFuture[$i];
	if($chkTransfer[$i] == 'on') $txtShow[$i] .= ' Transfer : '.$txtTransfer[$i];
	if($chkCredit1[$i] == 'on' or $chkCredit2[$i] == 'on' or $chkCredit3[$i] == 'on') $txtShow[$i] .= ' Credit : '.$txtAllCredit[$i];
	$sql2 = "SELECT * FROM ".$dbprefix."invent ";
	$sql2 .= "LEFT JOIN district ON (".$dbprefix."invent.districtId=district.districtId)";
	$sql2 .= "LEFT JOIN amphur ON (".$dbprefix."invent.amphurId=amphur.amphurId)";
	$sql2 .= "LEFT JOIN province ON (".$dbprefix."invent.provinceId=province.provinceId)";
	$sql2 .= "WHERE inv_code='".$mcode[$i]."' LIMIT 1 ";
	//echo $sql2;
	$rs2 = mysql_query($sql2);
	$name[$mcode[$i]] = mysql_result($rs2,0,'inv_desc');
	$add[$mcode[$i]] = mysql_result($rs2,0,'address');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'districtName')==""?"":" ต.".mysql_result($rs2,0,'districtName');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'amphurName')==""?"":" อ.".mysql_result($rs2,0,'amphurName');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'provinceName')==""?"":" จ.".mysql_result($rs2,0,'provinceName');
	$add[$mcode[$i]] .= " ".mysql_result($rs2,0,'zip');
	//$sp_code[$mcode[$i]] = mysql_result($rs2,0,'sp_code');
	//$sp_name[$mcode[$i]] = mysql_result($rs2,0,'sp_name');
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
//$pgsize=array(170,216);			// (width,height)
//$pgsize=array(200,210);
$pgsize=array(200,160);
$pdf=new FPDF('P','mm',$pgsize);

//$pdf=new FPDF('P','mm','A5');
$pdf->AddFont('angsa','','angsa.php'); 
$rem = 0;
$nitem = 10;
for($i=0;$i<sizeof($bill);$i++){
	$sql="SELECT * FROM ".$dbprefix."isaled WHERE sano='$bill[$i]' ";
	$rs=mysql_query($sql);
	$npage = ceil(mysql_num_rows($rs)/$nitem);
	mysql_free_result($rs);
	$sum = 0;
	$sumpv = 0;
	for($k=0;$k<$npage;$k++){
	$sql="SELECT * FROM ".$dbprefix."isaled WHERE sano='$bill[$i]' LIMIT ".($k*$nitem).", $nitem ";
	$rs=mysql_query($sql);
	
	$pdf->AddPage(); 
	//$pdf->image("sale_form.jpg",0,0,230);
	
	$pdf->SetTopMargin(0); 
	$pdf->SetRightMargin(0); 
	
	$offsetx=0;
	$offsety=0;
	$offsettab = 19;
	$offsetnline = 4;
	
	$pdf->SetFont('angsa','',10); 
	//$logo = "./Logo.jpg";
	$pdf->SetY($offsety+$offsetnline);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab,10,$logo,0,0,"L"); 
	$pdf->Image('../logo.jpg',$offsetx+$offsettab,$offsety+$offsetnline+2,14); //file,x,y,w=0,h=0

	$pdf->SetFont('angsa','',12); 
	
	$pdf->SetY($offsety+$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,$employee_name,0,0,"L"); 
	$pdf->SetY($offsety+2*$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,$wording_lan["company_address"],0,0,"L"); 
	$pdf->SetY($offsety+3*$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,$wording_lan["company_phone"],0,0,"L"); 
	
	$pdf->SetFont('angsa','',10); 
	
	//$pdf->SetY($offsety+$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+8);
	//$pdf->Cell($offsettab,10,"ใบสั่งซื้อสินค้า",1,0,"C"); 
	//$pdf->SetY($offsety+3*$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+5);
	//$pdf->Cell($offsettab,10,"(เอกสารออกเป็นชุด)",0,0,"C"); 
	
	//$pdf->SetY($offsety+(6*$offsetnline));
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell((2*$offsettab),10,"เลขประจำตัวผู้เสียภาษีอากร",0,0,"L"); 
	
	//$pdf->SetY($offsety+(5*$offsetnline));
	//$pdf->SetX($offsetx+(4*$offsettab));
	//$pdf->Cell((3*$offsettab),10,"ใบเสร็จรับเงิน/ใบกำกับภาษี/ใบส่งสินค้า",0,0,"C"); 
	//$pdf->SetY($offsety+(6*$offsetnline));
	//$pdf->SetX($offsetx+(4*$offsettab));
	//$pdf->Cell((3*$offsettab),10,"RECEIPT/ TAX INVOICE/PACKING LIST",0,0,"C"); 
	//-------------------table---------------------
	//$pdf->SetY($offsety+(9*$offsetnline));
	//กรอบบน
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline)+6);
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	//กรอบล่าง
	$pdf->SetY($offsety+(21*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+7);
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	//เส้นบรรทัด ภาษี 7%
	//$pdf->SetY($offsety+(21*$offsetnline)+10);
	//$pdf->SetX($offsetx+(9*$offsettab)+6-10);
	//$pdf->Cell(10,0,"",1,0,"L"); 
	//เส้นบรรทัด มูลค่าสินค้า
	$pdf->SetY($offsety+(21*$offsetnline)+14);
	$pdf->SetX($offsetx+(9*$offsettab)+4);
	$pdf->Cell(15,0,"",1,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+14.5);
	$pdf->SetX($offsetx+(9*$offsettab)+4);
	$pdf->Cell(15,0,"",1,0,"L"); 
	//$pdf->SetY($offsety+(9*$offsetnline));
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell(10*$offsettab-7,(12*$offsetnline),"",1,0,"L"); 
	//$pdf->SetY($offsety+(23*$offsetnline)-2);
	//$pdf->SetX($offsetx+(9*$offsettab)+2);
	//$pdf->Cell(21,8,"",1,0,"L"); 
	//-----------------------รายเซ็นต์
	/*$pdf->SetY($offsety+(27*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,(5*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(27*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(3*$offsettab-7,(5*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(27*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(7*$offsettab-7,(5*$offsetnline),"",1,0,"L"); */
	//checkbox
	/*$pdf->SetY($offsety+(24*$offsetnline)-2);
	$pdf->SetX($offsetx+(2*$offsettab)-2);
	$pdf->Cell(4,4,"",1,0,"L"); 
	$pdf->SetY($offsety+(24*$offsetnline)-2);
	$pdf->SetX($offsetx+(3*$offsettab)-2);
	$pdf->Cell(4,4,"",1,0,"L"); 
	$pdf->SetY($offsety+(24*$offsetnline)-2);
	$pdf->SetX($offsetx+(4*$offsettab)-2);
	$pdf->Cell(4,4,"",1,0,"L"); 
	$pdf->SetY($offsety+(24*$offsetnline)-2);
	$pdf->SetX($offsetx+(5*$offsettab)-2);
	$pdf->Cell(4,4,"",1,0,"L"); */
		//-------------------column ช่อง---------------
	/*$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-10);//ลำดับ
	$pdf->Cell($offsettab-8,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);//รหัสสินค้า
	$pdf->Cell(2*$offsettab-8,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+5);//รายการสินค้า
	$pdf->Cell(5*$offsettab-8,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-8);//pv
	$pdf->Cell(6*$offsettab-14,(13*$offsetnline)+3,"",1,0,"L");
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);//pv
	$pdf->Cell(6*$offsettab-5,(13*$offsetnline)+3,"",1,0,"L");
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+5);//pv
	$pdf->Cell(6*$offsettab+4,(13*$offsetnline)+3,"",1,0,"L");
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+6);
	$pdf->Cell(7*$offsettab+2,(13*$offsetnline)+3,"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+19);
	$pdf->Cell(8*$offsettab+2,(13*$offsetnline)+3,"",1,0,"L");*/
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell($offsettab-9,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell(2*$offsettab+4,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell(5*$offsettab+10,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell(6*$offsettab+12,(13*$offsetnline)+3,"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell(7*$offsettab+12,(13*$offsetnline)+3,"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+173);
	$pdf->Cell(8*$offsettab-171,(13*$offsetnline)+3,"",1,0,"L");
	//-------------------table---------------------
	$pdf->SetFont('angsa','',12);
	$pdf->SetY($offsety+$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+1);
	$pdf->Cell((3*$offsettab),10,"ใบสั่งซื้อ HOLD",0,0,"R"); 
	$pdf->SetY($offsety+(5*$offsetnline)-5);
	$pdf->SetX($offsetx+(7*$offsettab)+1);
	$pdf->Cell((3*$offsettab),10,"สาขา..........................................",0,0,"R"); 

	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+1);
	$pdf->Cell((3*$offsettab),10,"เลขที่..........................................",0,0,"R"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+1);
	$pdf->Cell((3*$offsettab),10,"วันที่............................................",0,0,"R"); 
	/*$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+1);
	$pdf->Cell((3*$offsettab),10,"ซื้อเพื่อ...........................",0,0,"R"); */
//info---------------------------------------
	
	/*$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(8*$offsettab)+6);
	$pdf->Cell((3*$offsettab),10,$uid[$i],0,0,"L"); */
	
	$pdf->SetY($offsety+$offsetnline+4);
	$pdf->SetX($offsetx+(9*$offsettab));
	$pdf->Cell((3*$offsettab),10,$send[$i],0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline)-6);
	$pdf->SetX($offsetx+(8.5*$offsettab));
	$pdf->Cell((3*$offsettab),10,$inv_code[$i],0,0,"L");


	$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(8.5*$offsettab));
	$pdf->Cell((3*$offsettab),10,$sano[$i],0,0,"L"); 
	/*$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)-10);
	$pdf->Cell((3*$offsettab),10,$mcode[$i],0,0,"L"); */
	$pdf->SetY($offsety+(6*$offsetnline)-1);
	$pdf->SetX($offsetx+(8.5*$offsettab));
	$pdf->Cell((3*$offsettab),10,$sadate,0,0,"L");
	$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(8.5*$offsettab));
	$pdf->Cell((3*$offsettab),10,$typedef[$sa_type[$i]],0,0,"L"); 
	$pdf->SetFont('angsa','',10); 
//---------------------------------------------
	
	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"รหัสสาขา",0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"Name ",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"Address",0,0,"L"); 
	/*$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"หมายเหตุ",0,0,"L"); */
	
	//$pdf->SetY($offsety+(7*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell((2*$offsettab),10,"ชื่อผู้แนะนำ",0,0,"L"); 
	
	//$pdf->SetY($offsety+(8*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell((2*$offsettab),10,"รหัส",0,0,"L"); 
//info---------------------------------------
	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((2*$offsettab),10,$mcode[$i],0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((2*$offsettab),10,$name[$mcode[$i]],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((2*$offsettab),10,$add[$mcode[$i]],0,0,"L"); 
	$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((2*$offsettab),10,$txtoption[$i],0,0,"L"); 
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
	$pdf->SetX($offsetx+$offsettab-5);
	$pdf->Cell($offsettab,10,"No.",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx-10+(2*$offsettab)-5);
	$pdf->Cell($offsettab,10,"Product Code",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(3*$offsettab));
	$pdf->Cell($offsettab,10,"Description",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(6*$offsettab)+8);
	$pdf->Cell($offsettab,10,"Quantity",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell($offsettab,10,"Unit Price",0,0,"L"); 

	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)+11);
	$pdf->Cell($offsettab,10,"(PV)",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell($offsettab,10,"Amount",0,0,"L"); 

		$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)-4-10);
	$pdf->Cell($offsettab,10,"มูลค่าสินค้า",0,0,"L");

	
	//$pdf->SetY($offsety+(20*$offsetnline));
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell($offsettab,10,"จำนวนเงินทั้งสิ้น (",0,0,"L"); 
	//$pdf->SetY($offsety+(20*$offsetnline));
	//$pdf->SetX($offsetx+(6*$offsettab)-15);
	//$pdf->Cell($offsettab,10,")",0,0,"L"); 
	/*$pdf->SetY($offsety+(20*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab));
	$pdf->Cell($offsettab,10,"จำนวนรวม",0,0,"L"); */
	
	//$pdf->SetY($offsety+(26*$offsetnline)-1);
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell((2*$offsettab),10,$uid[$i],0,0,"C");
	$pdf->SetY($offsety+(26*$offsetnline)+3);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,".............................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"Received By",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"Date ......../......../........",0,0,"C");
	
	//$pdf->SetY($offsety+(26*$offsetnline));
	//$pdf->SetX($offsetx+(5*$offsettab)-7);
	//$pdf->Cell((2*$offsettab),10,"ได้รับสินค้าครบถ้วนแล้ว",0,0,"C");
	$pdf->SetY($offsety+(26*$offsetnline)+3);
	$pdf->SetX($offsetx+(5*$offsettab)-7-5);
	$pdf->Cell((2*$offsettab),10,".............................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab)-7-5);
	$pdf->Cell((2*$offsettab),10,"Sent By",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab)-7-5);
	$pdf->Cell((2*$offsettab),10,"Date ......../......../........",0,0,"C");
	
	$pdf->SetY($offsety+(26*$offsetnline)+3);
	$pdf->SetX($offsetx+(9*$offsettab)-15-10);
	$pdf->Cell((2*$offsettab),10,".............................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-15-10);
	$pdf->Cell((2*$offsettab),10,"Manager",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-15-10);
	$pdf->Cell((2*$offsettab),10,"Date ......../......../........",0,0,"C");
	
	/*$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"ชำระโดย",0,0,"L");*/
	/*$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell($offsettab,10,$txtShow[0],0,0,"L");
	$pdf->SetFont('angsa','',8); 
	$pdf->SetY($offsety+(22*$offsetnline)+33);
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"Operator : ".$uid[$i]." Date : ".$logdate11." Time : ".$logtime1[$i],0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline)+36);
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"Editor : ".$uid2[$i]." Date : ".$logdate21." Time : ".$logtime2[$i],0,0,"L");
	$pdf->SetFont('angsa','',12);*/
	//$pdf->Cell((2*$offsettab),10,$uid[$i],0,0,"C");
	/*$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(3*$offsettab));
	$pdf->Cell($offsettab,10,"เครดิต",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(4*$offsettab));
	$pdf->Cell($offsettab,10,"Internet",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab));
	$pdf->Cell($offsettab,10,"Commission",0,0,"L");*/

	$pdf->SetFont('angsa','',8); 
	$pdf->SetY($offsety+(23*$offsetnline));
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับสินค้าตามรายการที่ระบุไว้ข้างต้นครบถ้วนและสมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	//$pdf->SetY($offsety+(23*$offsetnline));
	//$pdf->SetX($offsetx+(5*$offsettab));
	//$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับผลิตภัณฑ์ที่ระบุไว้ข้างต้น และตรวจจำนวนในสภาพที่สมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	$pdf->SetFont('angsa','',12);
 
	$offsety = 4;
	for($j=0;$j<mysql_num_rows($rs);$j++){	
		$obj = mysql_fetch_object($rs);
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+$offsettab-5);
		$pdf->Cell($offsettab,10,($j+1+($k*$nitem)),0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx-10+(2*$offsettab)-5);
		$pdf->Cell($offsettab,10,$obj->pcode,0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(3*$offsettab));
		$pdf->Cell($offsettab,10,$obj->pdesc,0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(6*$offsettab)-3);
		$pdf->Cell($offsettab,10,number_format($obj->qty,0,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(7*$offsettab)+4);
		$pdf->Cell($offsettab,10,number_format($obj->price,2,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab)+3);
		$pdf->Cell($offsettab,10,number_format(($obj->pv*$obj->qty),0,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab)+4);
		$pdf->Cell($offsettab,10,number_format(($obj->price*$obj->qty),2,'.',','),0,0,"R"); 
		$sum += $obj->price*$obj->qty;
		$sumpv += $obj->pv*$obj->qty;
	}
	if($k==$npage-1){
		$offsety = 3;

		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab)+3);
		$pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 
		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab)+3);
		$pdf->Cell($offsettab,10,number_format($sumpv,0,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+(22*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab)+3);
		$pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(4*$offsettab)-5);
		$pdf->Cell($offsettab,10,moneytotext($sum),0,0,"C");  
	}
}}
$pdf->Output("./pdf/doc.pdf");

?>
<? ob_end_flush();?>
<meta content="0;URl=./pdfshow.php" http-equiv="refresh" />
