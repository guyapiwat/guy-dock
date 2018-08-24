<? session_start(); ?>
<?// include_once("wording".$_SESSION["lan"].".php"); ?>
<? include_once("../backoffice/wording".$_SESSION["lan"].".php"); ?>
<? include("../backoffice/connectmysql.php");?>
<? include("../backoffice/money2text.php");?>
<? include("../backoffice/inc.wording.php");?>
<? include("../function/function_pos.php");?>
<? ob_start();?>
<?
if(isset($_GET['bid']))
	$id = $_GET['bid'];
	$dbprefix = "ali_";
	$employee_name = $wording_lan["company_name"];
	$wherexx = findBills("hono","ali_holdhead",$id);
?>
<?
//list($fsano,$tsano)=explode("-",$sano);
/*if($tsano==""){
	$tsano = $fsano;
}*/
$sql = "SELECT * FROM ".$dbprefix."holdhead WHERE $wherexx ";
$sqlLog1 = "SELECT sys_id,logdate,logtime FROM ".$dbprefix."log  WHERE object ='$sano' and subject = 'เพิ่มบิล' order by id desc";
$sqlLog2 = "SELECT sys_id,logdate,logtime  FROM ".$dbprefix."log  WHERE object ='$sano' and subject = 'แก้ไขบิล' order by id desc";

$rs=mysql_query($sql);
if(mysql_num_rows($rs)<=0){
	
	?><table width="300" align="center" bgcolor="#990000"><tr><td align="center">ไม่พบข้อมูลของบิลเลขที่ <?=$sano?>
	<br /><input type="button" value="ปิดหน้านี้" onClick="window.close()" /></td></tr></table><?
	exit;
}
$typedef = $arr_satype_show_bill;   
for($i=0;$i<mysql_num_rows($rs);$i++){
	$obj = mysql_fetch_object($rs);
	$bill[$i] = $obj->id;
	$sano[$i] = $obj->hono;
	$mcode[$i] = $obj->mcode;
	$uid[$i] = $obj->uid;
	$selectqq = "select * from ".$dbprefix."user where usercode = '$uid[$i]' ";
	$query = mysql_query($selectqq);
	$objse = mysql_fetch_object($query);
	$uid[$i] = $objse->username;	
	$sa_type[$i] = $obj->sa_type;
	$pv[$i] = $obj->tot_pv;
	$sadate[$i] = $obj->sadate;
	//$sadate = explode('-',$sadate[$i]);
	//$sadate = $sadate[2].'-'.$sadate[1].'-'.$sadate[0];
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
	$sql2 = "SELECT * FROM ".$dbprefix."member ";
	$sql2 .= "LEFT JOIN district ON (".$dbprefix."member.districtId=district.districtId)";
	$sql2 .= "LEFT JOIN amphur ON (".$dbprefix."member.amphurId=amphur.amphurId)";
	$sql2 .= "LEFT JOIN province ON (".$dbprefix."member.provinceId=province.provinceId)";
	$sql2 .= "WHERE mcode='".$mcode[$i]."' LIMIT 1 ";
	//echo $sql2;exit;
	$rs2 = mysql_query($sql2);
	$name[$mcode[$i]] = mysql_result($rs2,0,'name_t');
	$add[$mcode[$i]] = mysql_result($rs2,0,'address');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'districtId')==""?"":" ต.".mysql_result($rs2,0,'districtId');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'amphurId')==""?"":" อ.".mysql_result($rs2,0,'amphurId');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'provinceId')==""?"":" จ.".mysql_result($rs2,0,'provinceId');
	$add[$mcode[$i]] .= " ".mysql_result($rs2,0,'zip');
	$sp_code[$mcode[$i]] = mysql_result($rs2,0,'sp_code');
	$sp_name[$mcode[$i]] = mysql_result($rs2,0,'sp_name');
	$home_t[$mcode[$i]]=mysql_result($rs2,0,'mobile');
	mysql_free_result($rs2);
}

list($y,$m,$d) = explode('-',date("Y-m-d"));
mysql_free_result($rs);
//$pdf->AddFont('tahoma','','tahoma.php'); 
define('FPDF_FONTPATH','../backoffice/fpdf/font/'); 
require('../backoffice/fpdf/fpdf.php'); 
//require('table1.php');
//$pdf=new FPDF('P','mm','A4');
//$pdf=new FPDF('P','mm','Letter');
$pdf=new FPDF('P','mm','A4');
$pdf->AddFont('angsa','','angsa.php'); 
$rem = 0;
$nitem = 12;
for($i=0;$i<sizeof($bill);$i++){
	
$sql="SELECT * FROM ".$dbprefix."holddesc WHERE hono='$bill[$i]' ";
	$rs=mysql_query($sql);
	$npage = ceil(mysql_num_rows($rs)/$nitem);
	mysql_free_result($rs);
	$sum = 0;
	$sumpv = 0;
	for($k=0;$k<$npage;$k++){
	$sql="SELECT * FROM ".$dbprefix."holddesc WHERE hono='$bill[$i]' LIMIT ".($k*$nitem).", $nitem ";
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
	$logo = "../logo.jpg";
	$pdf->SetY($offsety+$offsetnline);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab,10,$logo,0,0,"L"); 
	$pdf->Image($logo,$offsetx+$offsettab,$offsety+$offsetnline+2,20,15); //file,x,y,w=0,h=0
	//$pdf->image("Logo.jpg",10,7,14);

	$pdf->SetFont('angsa','',12); 
	
	$pdf->SetY($offsety+$offsetnline);
	$pdf->SetX($offsetx+(1*$offsettab)+22);
	$pdf->Cell((4*$offsettab),10,$employee_name,0,0,"L"); 
	$pdf->SetY($offsety+2*$offsetnline);
	$pdf->SetFont('angsa','',14); 

	$pdf->SetX($offsetx+(1*$offsettab)+22);
	$pdf->Cell((4*$offsettab),10,$wording_lan["company_address"],0,0,"L"); 
	$pdf->SetY($offsety+3*$offsetnline);
	$pdf->SetX($offsetx+(1*$offsettab)+22);
	$pdf->Cell((4*$offsettab),10,$wording_lan["company_phone"],0,0,"L"); 
	//$pdf->Cell((4*$offsettab),10,$wording_lan["company_phone"],0,0,"L"); 
	
	

	$pdf->SetFont('angsa','',14); 
	
	//$pdf->SetY($offsety+$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+5);
	//$pdf->Cell($offsettab,10,"ใบรับเงิน",1,0,"C"); 
	//$pdf->SetY($offsety+3*$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+5);
	//$pdf->Cell($offsettab,10,"(เอกสารออกเป็นชุด)",0,0,"C"); 
	
	//$pdf->SetY($offsety+(6*$offsetnline));
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell((2*$offsettab),10,"เลขประจำตัวผู้เสียภาษีอากร",0,0,"L"); 
	$pdf->SetY($offsety+($offsetnline)+5);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	//$pdf->Cell((3*$offsettab),10," เลขประจำตัวผู้เสียภาษีอากร  3033456592",0,0,"R"); 

		//$pdf->SetFont('angsa','',12);
	$pdf->SetY($offsety+$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$print[$i].' '.$cancel[$i],0,0,"R"); 

	$pdf->SetY($offsety+(5*$offsetnline)-2);
	$pdf->SetX($offsetx+(4*$offsettab));
	//$pdf->Cell((4*$offsettab),10,"ใบเสร็จรับเงิน / ใบกำกับภาษี",0,0,"C"); 



	//$pdf->Cell((3*$offsettab),10,"RECEIPT/ TAX INVOICE/PACKING LIST",0,0,"C"); 

	// กรอบนอก 

	//-------------------table---------------------
	$pdf->SetY($offsety+(12*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((12.54*$offsettab),6,"",1,0,"L"); 
	$pdf->SetY($offsety+(43.7*$offsetnline)+2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(13*$offsettab-7,6,"",1,0,"L"); 



	//-------------------column---------------
	$pdf->SetY($offsety+(12*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab-5,(32*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(12*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab*2,(32*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(12*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(7.6*$offsettab,(32*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(12*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(8.5*$offsettab+2,(32*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(12*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(9.5*$offsettab+2,(33*$offsetnline)+2,"",1,0,"L"); 
	$pdf->SetY($offsety+(12*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10.6*$offsettab+2,(33*$offsetnline)+2,"",1,0,"L");
	$pdf->SetY($offsety+(12*$offsetnline)+1);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(12.55*$offsettab,(33*$offsetnline)+2,"",1,0,"L");
	//-------------------table---------------------

	/*$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"เลขที่........................",0,0,"R"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"รหัสสมาชิก...............................วันที่........................",0,0,"R"); 
//info---------------------------------------
	$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,$bill[$i],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)-1);
	$pdf->SetX($offsetx+(8*$offsettab)+2);
	$pdf->Cell((3*$offsettab),10,$mcode[$i],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"$d-$m-$y",0,0,"L");*/
//---------------------------------------------
	
	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"ชื่อผู้จำหน่ายอิสระ",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+5);
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
	$pdf->SetY($offsety+(6*$offsetnline)+5);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((2*$offsettab),10,$add[$mcode[$i]],0,0,"L"); 

	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(5*$offsettab)+20);
	$pdf->Cell((2*$offsettab),10,"รหัสสมาชิก",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(5*$offsettab)+20);
	$pdf->Cell((2*$offsettab),10,"โทรศัพท์",0,0,"L"); 

	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(6*$offsettab)+25);
	$pdf->Cell((2*$offsettab),10,$mcode[$i],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(6*$offsettab)+20);
	$pdf->Cell((2*$offsettab),10,$home_t[$mcode[$i]],0,0,"L"); 

	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,"เลขที่บิล",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,"วันที่",0,0,"L");

	$pdf->SetY($offsety+(7*$offsetnline)+2);
	$pdf->SetX($offsetx+(7.7*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,"ซื้อเพื่อ",0,0,"R"); 
	


	$pdf->SetY($offsety+(7*$offsetnline)+2);
	$pdf->SetX($offsetx+(10*$offsettab)+6);
	$pdf->Cell((3*$offsettab),10,$typedef[$sa_type[$i]],0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(10*$offsettab)+6);
	$pdf->Cell((2*$offsettab),10,$sano[$i],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(10*$offsettab)+6);
	$pdf->Cell((2*$offsettab),10,$sadate[$i],0,0,"L");

	$offsetx=-3;
	$offsety=10;
	//$pdf->SetY($offsety+(7*$offsetnline));
	//$pdf->SetX($offsetx+(8*$offsettab));
	//$pdf->Cell((2*$offsettab),10,$sp_name[$mcode[$i]],0,0,"L"); 
	
	//$pdf->SetY($offsety+(8*$offsetnline));
	//$pdf->SetX($offsetx+(8*$offsettab));
	//$pdf->Cell((2*$offsettab),10,$sp_code[$mcode[$i]],0,0,"L"); 
//------------------------------------------
	$pdf->SetY($offsety+(8*$offsetnline)+4.5);
	$pdf->SetX($offsetx+$offsettab-2);
	$pdf->Cell($offsettab,10,"ลำดับ",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline)+4.5);
	$pdf->SetX($offsetx-10+(2*$offsettab)+5);
	$pdf->Cell($offsettab,10,"รหัสสินค้า",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline)+4.5);
	$pdf->SetX($offsetx+(5*$offsettab));
	$pdf->Cell($offsettab,10,"รายการ",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline)+4.5);
	$pdf->SetX($offsetx+(8.5*$offsettab));
	$pdf->Cell($offsettab,10,"จำนวน",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline)+4.5);
	$pdf->SetX($offsetx+(9.7*$offsettab));
	$pdf->Cell($offsettab,10,"ราคา",0,0,"L"); 

	$pdf->SetY($offsety+(8*$offsetnline)+4.5);
	$pdf->SetX($offsetx+(10.35*$offsettab)+5);
	$pdf->Cell($offsettab,10,"คะแนน",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline)+4.5);
	$pdf->SetX($offsetx+(11.5*$offsettab)+2);
	$pdf->Cell($offsettab,10,"จำนวนเงินสุทธิ",0,0,"L"); 
	
	//$pdf->SetY($offsety+(21*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell($offsettab,10,"รวมราคาสินค้าที่รวมภาษีมูลค่าเพิ่ม",0,0,"L"); 
	
	//$pdf->SetY($offsety+(21*$offsetnline)+1);
	//$pdf->SetX($offsetx+(8*$offsettab)-2);
	//$pdf->Cell($offsettab,10,"ภาษีมูลค่าเพิ่ม",0,0,"L");
	$offsety=95;
	$pdf->SetY($offsety+(22*$offsetnline)+1);
	$pdf->SetX($offsetx+(10*$offsettab));
	$pdf->Cell($offsettab,10,"มูลค่าสินค้า",0,0,"L");

	
	$pdf->SetY($offsety+(20*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+5);
	$pdf->Cell($offsettab,10,"จำนวนเงินทั้งสิ้น (",0,0,"L"); 
	$pdf->SetY($offsety+(20*$offsetnline));
	$pdf->SetX($offsetx+(6*$offsettab));
	$pdf->Cell($offsettab,10,")",0,0,"L"); 
	$pdf->SetY($offsety+(20*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab));
	$pdf->Cell($offsettab,10,"",0,0,"L"); 

	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+($offsettab));
	//$pdf->Cell($offsettab,10,"ชำระโดย ".$txtShow[0],0,0,"L");

	
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+20);
	$pdf->Cell((2*$offsettab),10,"ลงชื่อ....................................................",0,0,"C");
	$pdf->SetY($offsety+(30*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+20);
	$pdf->Cell((2*$offsettab),10,"ผู้รับเงิน",0,0,"C");
	$pdf->SetY($offsety+(31*$offsetnline)+2);
	$pdf->SetX($offsetx+$offsettab+20);
	$pdf->Cell((2*$offsettab),10,"......../......../........",0,0,"C");
	
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(6*$offsettab));
	$pdf->Cell((2*$offsettab),10,"ลงชื่อ....................................................",0,0,"C");
	$pdf->SetY($offsety+(30*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,"ผู้จัดส่งสินค้า",0,0,"C");
	$pdf->SetY($offsety+(31*$offsetnline)+2);
	$pdf->SetX($offsetx+(5*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,"......../......../........",0,0,"C");
	
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)+15);
	$pdf->Cell((2*$offsettab),10,"ลงชื่อ....................................................",0,0,"C");
	$pdf->SetY($offsety+(30*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,"ผู้รับสินค้า",0,0,"C");
	$pdf->SetY($offsety+(31*$offsetnline)+2);
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,"......../......../........",0,0,"C");
	

/*	$pdf->SetY($offsety+(22*$offsetnline));
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
*/


/*
	$pdf->SetFont('angsa','',8); 
	$pdf->SetY($offsety+(23*$offsetnline)+6);
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับผลิตภัณฑ์ที่ระบุไว้ข้างต้นพร้อมตรวจนับจำนวนในสภาพที่สมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	//$pdf->SetY($offsety+(23*$offsetnline)+1);
	//$pdf->SetX($offsetx+(5*$offsettab));
	//$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับผลิตภัณฑ์ที่ระบุไว้ข้างต้น และตรวจจำนวนในสภาพที่สมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	
	$pdf->SetFont('angsa','',12); 
	$pdf->SetY($offsety+(23*$offsetnline)+35);
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"หมายเหตุการสั่งซื้อ",0,0,"L");
	$pdf->SetFont('angsa','',8); 

	$pdf->SetY($offsety+(23*$offsetnline)+42);
	$pdf->SetX($offsetx+($offsettab));
	$pdf->MultiCell(0,3,$txtoption[0],0,'L');



	<!-- $pdf->SetFont('angsa','',12); 
	$pdf->SetY($offsety+(24*$offsetnline)+72);
	$pdf->SetX($offsetx+($offsettab));
	//$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับผลิตภัณฑ์ที่ระบุไว้ข้างต้นพร้อมตรวจนับจำนวนในสภาพที่สมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	$pdf->Cell($offsettab,10,"หมายเหตุ",0,0,"L");


	$pdf->SetFont('angsa','',8); 
	$pdf->SetY($offsety+(24*$offsetnline)+77);
	$pdf->SetX($offsetx+($offsettab));
	//$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับผลิตภัณฑ์ที่ระบุไว้ข้างต้นพร้อมตรวจนับจำนวนในสภาพที่สมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	$pdf->Cell($offsettab,10," 1. ผู้จำหน่ายอิสระมีสิทธิเปลี่ยนสินค้าได้ภายใน 7 วัน นับตั้งแต่วันที่ได้รับสินค้า (ยกเว้นค่าสมัครสมาชิก)",0,0,"L");

	$pdf->SetFont('angsa','',8); 
	$pdf->SetY($offsety+(24*$offsetnline)+80);
	$pdf->SetX($offsetx+($offsettab));
	//$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับผลิตภัณฑ์ที่ระบุไว้ข้างต้นพร้อมตรวจนับจำนวนในสภาพที่สมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	$pdf->Cell($offsettab,10," 2. กรณีที่ไม่ได้นำใบเสร็จรับเงินที่ซื้อผลิตภัณฑ์จากบริษัทมาแสดง บริษัทขอสงวนสิทธิ์ในการเปลี่ยนผลิตภัณฑ์ ทุกๆกรณี",0,0,"L");

	$pdf->SetFont('angsa','',8); 
	$pdf->SetY($offsety+(24*$offsetnline)+83);
	$pdf->SetX($offsetx+($offsettab));
	//$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับผลิตภัณฑ์ที่ระบุไว้ข้างต้นพร้อมตรวจนับจำนวนในสภาพที่สมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	$pdf->Cell($offsettab,10," 3. ผลิตภัณฑ์ ต้องอยู่ในสภาพสมบูรณ์ ไม่ชำรุด และ ไม่หมดอายุ",0,0,"L");

		$pdf->SetFont('angsa','',8); 
	$pdf->SetY($offsety+(24*$offsetnline)+86);
	$pdf->SetX($offsetx+($offsettab));
	//$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับผลิตภัณฑ์ที่ระบุไว้ข้างต้นพร้อมตรวจนับจำนวนในสภาพที่สมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	$pdf->Cell($offsettab,10," 4. ผลิตภัณฑ์ที่ต้องการเปลี่ยน สามารถเปลี่ยนได้ ที่สถานที่ผู้จำหน่ายอิสระซื้อมาเท่านั้น",0,0,"L");
 */

	$pdf->SetFont('angsa','',14);
	$jj =0;
	$offsety = 16;
	for($j=0;$j<mysql_num_rows($rs);$j++){	
		//$jj++; 
		$obj = mysql_fetch_object($rs);
		$pdf->SetY($offsety+((9+$jj)*$offsetnline));
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell($offsettab,10,($j+1+($k*$nitem)),0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$jj)*$offsetnline));
		$pdf->SetX($offsetx-10+(2*$offsettab)+5);
		$pdf->Cell($offsettab,10,$obj->pcode,0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$jj)*$offsetnline));
		$pdf->SetX($offsetx+(3*$offsettab));
		$pdf->Cell($offsettab,10,$obj->pdesc,0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$jj)*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab));
		$pdf->Cell($offsettab,10,$obj->qty,0,0,"R"); 
		
		$pdf->SetY($offsety+((9+$jj)*$offsetnline));
		$pdf->SetX($offsetx+(9.5*$offsettab));
		$pdf->Cell($offsettab,10,number_format($obj->price,2,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+((9+$jj)*$offsetnline));
		$pdf->SetX($offsetx+(10.5*$offsettab));
		$pdf->Cell($offsettab,10,number_format(($obj->pv*$obj->qty),0,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+((9+$jj)*$offsetnline));
		$pdf->SetX($offsetx+(12*$offsettab)+6);
		$pdf->Cell($offsettab,10,number_format(($obj->price*$obj->qty),2,'.',','),0,0,"R"); 
		$sum += $obj->price*$obj->qty;
		$sumpv += $obj->pv*$obj->qty;
		$jj++;
		$sql="SELECT * FROM ".$dbprefix."product_package1 where package = '".$obj->pcode."'";
		//exit;
		$rspack = mysql_query($sql);
		if(mysql_num_rows($rspack) > 0)
		{
			for($m=0;$m<mysql_num_rows($rspack);$m++){
				
				$sqlObj_pack = mysql_fetch_object($rspack);
				$pcode_pack =$sqlObj_pack->pcode;
				$pdf->SetY($offsety+((9+$jj)*$offsetnline));
				$pdf->SetX($offsetx-10+(2*$offsettab)+7);
				$pdf->Cell($offsettab,10,"- ".$sqlObj_pack->pcode,0,0,"L"); 
				//$pdf->Cell($offsettab,10,($jj+1+($k*$nitem)),0,0,"L"); 
				
				$pdf->SetY($offsety+((9+$jj)*$offsetnline));
				$pdf->SetX($offsetx-14+(2*$offsettab)+5+5);
				//$pdf->Cell($offsettab,10,$sqlObj_pack->pcode,0,0,"L"); 
				
				$pdf->SetY($offsety+((9+$jj)*$offsetnline));
				$pdf->SetX($offsetx+(3*$offsettab)+1);
				$pdf->Cell($offsettab,10,substr($sqlObj_pack->pdesc,0,48).' ('.number_format($sqlObj_pack->qty*$obj->qty,0,'.',',').')',0,0,"L"); 

			//	$pdf->SetY($offsety+((9+$jj)*$offsetnline));
			//	$pdf->SetX($offsetx-8+(5*$offsettab)+8+5);
			//	$pdf->Cell($offsettab,10,$sqlObj_pack->unit,0,0,"C"); 


				//$pdf->SetY($offsety+((9+$jj)*$offsetnline));
				//$pdf->SetX($offsetx+(8*$offsettab));
				//echo $sqlObj_pack->qty.' : '.$obj->qty;
				//exit;
				//$pdf->Cell($offsettab,10,number_format($sqlObj_pack->qty*$obj->qty,0,'.',','),0,0,"R"); 

				
				$pdf->SetY($offsety+((9+$jj)*$offsetnline));
				$pdf->SetX($offsetx+(9*$offsettab)+6);
				$sumqty += $sqlObj_pack->qty*$obj->qty;
				$jj++;
			}
		}

	}
	if($k==$npage-1){
		$offsety = 95;
		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(11.5*$offsettab)+6);
		$pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 
		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(10.5*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sumpv,2,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+(21*$offsetnline)+1);
		$pdf->SetX($offsetx+(9*$offsettab)+6);
		//$pdf->Cell($offsettab,10,number_format($sum*7/107,2,'.',','),0,0,"R");
		

		$pdf->SetY($offsety+(22*$offsetnline)+1);
		$pdf->SetX($offsetx+(11.8*$offsettab)+6);
		//$pdf->Cell($offsettab,10,number_format($sum-($sum*7/107),2,'.',','),0,0,"R"); 
		$pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 

		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(4*$offsettab));
		$pdf->Cell($offsettab,10,moneytotext($sum),0,0,"C"); 
	}
}

$pdf->Output("../backoffice/pdf/doc.pdf");

?>
<? ob_end_flush(); } ?>
<meta content="0;URl=../backoffice/pdfshow.php" http-equiv="refresh" />
