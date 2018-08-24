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
//$sql = "SELECT * FROM ".$dbprefix."asaleh WHERE id='$id' ";
$sql = "SELECT *,b.bbuy_Balance+b.bbuy_Qua as total,b.txtoption FROM ".$dbprefix."product as a ,".$dbprefix."bbuy as b where a.pcode = b.pcode and b.bbuy_ID ='$id' ";


$rs=mysql_query($sql);
if(mysql_num_rows($rs)<=0){
	
	?><table width="300" align="center" bgcolor="#990000"><tr><td align="center">ไม่พบข้อมูลของบิลเลขที่ <?=$sano?>
	<br /><input type="button" value="ปิดหน้านี้" onClick="window.close()" /></td></tr></table><?
	exit;
}
$typedef = array('A'=>"ทำคุณสมบัติ",'Q'=>"รักษายอด",'H'=>"Hold ยอด",'C'=>"รักษายอดทันที");
for($i=0;$i<mysql_num_rows($rs);$i++){
	$obj = mysql_fetch_object($rs);
	$bill[$i] = $obj->bbuy_ID;
	$sano[$i] = $obj->bbuy_ID;
	$mcode[$i] = $obj->mcode;
	$uid[$i] = $obj->uid;
	$selectqq = "select * from ".$dbprefix."user where usercode = '$uid[$i]' ";
	$query = mysql_query($selectqq);
	$objse = mysql_fetch_object($query);
	$uid[$i] = $objse->username;	
	$sa_type[$i] = $obj->sa_type;
	$pv[$i] = $obj->tot_pv;
	$sadate[$i] = $obj->bbuy_Date ;
	$sadate = explode('-',$sadate[$i]);
	$sadate = $sadate[2].'-'.$sadate[1].'-'.$sadate[0];
	$txtoption[$i] = $obj->txtoption;
	//if(!empty($txtoption[$i]))
	$chkCash[$i] = $obj->chkCash;
	$send[$i] = $obj->send;
	if($send[$i] == '1')$send[$i] = 'บิลออนไลน์';else $send[$i]  = "";
	$chkFuture[$i] = $obj->chkFuture;
	$chkTransfer[$i] = $obj->chkTransfer;
	$chkCredit1[$i] = $obj->chkCredit1;
	$chkCredit2[$i] = $obj->chkCredit2;
	$chkCredit3[$i] = $obj->chkCredit3;
	$inv_code[$i] = $obj->inv_code;
	if(empty($inv_code[$i]))$inv_code[$i] = 'Head Office';



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
	/*$sql2 = "SELECT * FROM ".$dbprefix."member ";
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
	mysql_free_result($rs2);*/
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
$pgsize=array(200,210);
$pdf=new FPDF('P','mm',$pgsize);

//$pdf=new FPDF('P','mm','A5');
$pdf->AddFont('angsa','','angsa.php'); 
$rem = 0;
$nitem = 10;
//for($i=0;$i<sizeof($bill);$i++){
for($i=0;$i<1;$i++){
	$sql = "SELECT *,b.bbuy_Balance+b.bbuy_Qua as total,b.txtoption FROM ".$dbprefix."product as a ,".$dbprefix."bbuy as b where a.pcode = b.pcode and b.bbuy_ID ='$id' ";

	//$sql="SELECT * FROM ".$dbprefix."asaled WHERE sano='$bill[$i]' ";
	$rs=mysql_query($sql);
	$npage = ceil(mysql_num_rows($rs)/$nitem);
	mysql_free_result($rs);
	$sum = 0;
	$sumpv = 0;
	for($k=0;$k<$npage;$k++){
	$sql = "SELECT *,b.bbuy_Balance+b.bbuy_Qua as total,b.txtoption FROM ".$dbprefix."product as a ,".$dbprefix."bbuy as b where a.pcode = b.pcode and b.bbuy_ID ='$id' ";
	$rs=mysql_query($sql);
	
	$pdf->AddPage(); 
	//$pdf->image("sale_form.jpg",0,0,230);
	
	$pdf->SetTopMargin(0); 
	$pdf->SetRightMargin(0); 
	
	$offsetx=0;
	$offsety=0;
	$offsettab = 19;
	$offsetnline = 4;
	
	$pdf->SetFont('angsa','',12); 
	//$logo = "./Logo.jpg";
	$pdf->SetY($offsety+$offsetnline);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab,10,$logo,0,0,"L"); 
	$pdf->Image('../logo.jpg',$offsetx+$offsettab,$offsety+$offsetnline+2,14); //file,x,y,w=0,h=0

	$pdf->SetFont('angsa','',14); 
	
	$pdf->SetY($offsety+$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,"บริษัท $employee_name",0,0,"L"); 
	$pdf->SetY($offsety+2*$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,$wording_lan["company_address"],0,0,"L"); 
	$pdf->SetY($offsety+3*$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,$wording_lan["company_phone"],0,0,"L"); 
	
	$pdf->SetFont('angsa','',12); 
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
	$pdf->SetFont('angsa','',14);
	$pdf->SetY($offsety+$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)-5);
	$pdf->Cell((3*$offsettab),10,$send[$i],0,0,"R"); 
	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetY($offsety+(5*$offsetnline)-5);
	$pdf->SetX($offsetx+(7*$offsettab)+1);
	$pdf->Cell((3*$offsettab),10,"สาขา...........................",0,0,"R"); 
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+1);
	$pdf->Cell((3*$offsettab),10,"เลขที่...........................",0,0,"R"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+1);
	$pdf->Cell((3*$offsettab),10,"วันที่...........................",0,0,"R"); 
//info---------------------------------------
	
	/*$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(8*$offsettab)+6);
	$pdf->Cell((3*$offsettab),10,$uid[$i],0,0,"L"); */
	
	$pdf->SetY($offsety+(5*$offsetnline)-6);
	$pdf->SetX($offsetx+(9*$offsettab));
	$pdf->Cell((3*$offsettab),10,$inv_code[$i],0,0,"L");
	$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab));
	$pdf->Cell((3*$offsettab),10,$sano[$i],0,0,"L"); 
	/*$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)-10);
	$pdf->Cell((3*$offsettab),10,$mcode[$i],0,0,"L"); */
	$pdf->SetY($offsety+(6*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab));
	$pdf->Cell((3*$offsettab),10,$sadate,0,0,"L");
	$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab));
	$pdf->Cell((3*$offsettab),10,$typedef[$sa_type[$i]],0,0,"L"); 
	$pdf->SetFont('angsa','',12); 
//---------------------------------------------
	

	$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"หมายเหตุ",0,0,"L"); 
	
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
	$pdf->Cell($offsettab,10,"ชนิด",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell($offsettab,10,"คงค้าง",0,0,"L"); 

	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)+11);
	$pdf->Cell($offsettab,10,"จำนวน",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell($offsettab,10,"รวม",0,0,"L"); 

		$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)-4-10);
	//$pdf->Cell($offsettab,10,"มูลค่าสินค้า",0,0,"L");

	
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
	
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+($offsettab));
	//$pdf->Cell($offsettab,10,"ชำระโดย",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell($offsettab,10,$txtShow[0],0,0,"L");
	$pdf->SetFont('angsa','',8); 
	$pdf->SetY($offsety+(22*$offsetnline)+33);
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"Operator : ".$uid[$i]." Date : ".$logdate11." Time : ".$logtime1[$i],0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline)+36);
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"Editor : ".$uid2[$i]." Date : ".$logdate21." Time : ".$logtime2[$i],0,0,"L");
	$pdf->SetFont('angsa','',12); 
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
	//$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับสินค้าตามรายการที่ระบุไว้ข้างต้นครบถ้วนและสมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	//$pdf->SetY($offsety+(23*$offsetnline));
	//$pdf->SetX($offsetx+(5*$offsettab));
	//$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับผลิตภัณฑ์ที่ระบุไว้ข้างต้น และตรวจจำนวนในสภาพที่สมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	$pdf->SetFont('angsa','',17);
 
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
		$pdf->SetX($offsetx+(6*$offsettab));
		
		if($obj->bbuy_Qua > 0)$word1 = 'นำเข้า';
		else $word1 = 'นำออก';
		$pdf->Cell($offsettab,10,$word1,0,0,"R"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(7*$offsettab)+4);
		$pdf->Cell($offsettab,10,number_format($obj->bbuy_Balance ,0,'.',','),0,0,"R"); 
		

		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab)+3);
$pdf->Cell($offsettab,10,number_format(($obj->bbuy_Qua),0,'.',','),0,0,"R"); 

		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab)+4);
		$pdf->Cell($offsettab,10,number_format(($obj->total),0,'.',','),0,0,"R"); 
		$sum += $obj->price*$obj->qty;
		$sumpv += $obj->pv*$obj->qty;
	}
	if($k==$npage-1){
		$offsety = 3;

		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab)+3);
	//	$pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 
		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab)+3);
	//	$pdf->Cell($offsettab,10,number_format($sumpv,0,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+(22*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab)+3);
	//	$pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(4*$offsettab)-5);
	//	$pdf->Cell($offsettab,10,moneytotext($sum),0,0,"C");  
	}
}}
$pdf->Output("./pdf/doc.pdf");

?>
<? ob_end_flush();?>
<meta content="0;URl=./pdfshow.php" http-equiv="refresh" />
