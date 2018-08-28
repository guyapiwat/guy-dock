<? 
session_start();
include("connectmysql.php");?>
<? include("money2text.php");?>
<? include("inc.wording.php");?>
<? ob_start();?>
<?
if(isset($_GET['bid']))
	$sano = $_GET['bid'];
	$dbprefix = "ali_";
	$employee_name = $wording_lan["company_name"] ;
	$employee_address = $wording_lan["company_address"];
	$employee_phone = $wording_lan["company_phone"];
	$employee_phone1 = $wording_lan["company_id"];

?>
<?
$sqlupdate = "update ".$dbprefix."isaleh set print = print+1 where id = '$sano'";
mysql_query($sqlupdate);

//list($fsano,$tsano)=explode("-",$sano);
/*if($tsano==""){
	$tsano = $fsano;
}*/
$sql = "SELECT *,".$dbprefix."isaleh.uid as uidd FROM ".$dbprefix."isaleh ";
$sql .= " LEFT JOIN ".$dbprefix."invent ON (".$dbprefix."isaleh.inv_code=".$dbprefix."invent.inv_code) WHERE id='$sano'";
//echo $sql;
$sqlLog1 = "SELECT sys_id,logdate,logtime FROM ".$dbprefix."log  WHERE object ='$sano' and subject = 'เพิ่มบิล' order by id desc";
$sqlLog2 = "SELECT sys_id,logdate,logtime  FROM ".$dbprefix."log  WHERE object ='$sano' and subject = 'แก้ไขบิล' order by id desc";

//echo $sql;
$rs=mysql_query($sql);
if(mysql_num_rows($rs)<=0){
	
	?><table width="300" align="center" bgcolor="#990000"><tr><td align="center">ไม่พบข้อมูลของบิลเลขที่ <?=$sano?>
	<br /><input type="button" value="ปิดหน้านี้" onClick="window.close()" /></td></tr></table><?
	exit;
}
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE'  WHEN '4' THEN 'ATO' END AS checkportal";

$typedef = array('A'=>"".$word_lan["invoice_A"]."",'Q'=>"".$word_lan["invoice_Q"]."",'H'=>"".$word_lan["invoice_H"]."",'B'=>"".$word_lan["invoice_B"]."");
$typeofcheckportal = array('1'=>"HQ",'2'=>"Branch",'3'=>"ONLINE",'4'=>"ATO");
for($i=0;$i<mysql_num_rows($rs);$i++){
	$obj = mysql_fetch_object($rs);
	$bill[$i] = $obj->id;
	$bill1[$i] = $obj->sano;
	$mcode[$i] = $obj->mcode;
	$remark[$i] = $obj->remark;
	$send[$i] =$obj->send;
	$inv_code[$i] = $obj->inv_desc;
	$cname[$i] = $obj->cname;
	$cmobile[$i] = $obj->cmobile;
	$inv_ref[$i] = $obj->lid	;
	$checkportal[$i] = $obj->checkportal	;
	if(empty($inv_code[$i]))$inv_code[$i] = 'สำนักงานใหญ่';

	$_SESSION["txtcash"] = "";
	$_SESSION["txtcredit"] = "";
	$_SESSION["txtewallet"] = "";

	if($send[$i] == '1')$txtshow11 = 'จัดส่ง';
	else $txtshow11 = 'รับที่สาขา '.$inv_code[$i];


	$addcheck[$mcode[$i]] = $obj->provinceName;
	if($addcheck[$mcode[$i]]== 'NoData'){
		$add[$mcode[$i]] = "";
		$add1[$mcode[$i]] = $obj->caddress;
		$add2[$mcode[$i]] = "";
	}else
	{
		$add1[$mcode[$i]] = $obj->caddress;
		$add2[$mcode[$i]] .= $obj->cdistrictId==""?"":" ต.".$obj->cdistrictId;
		$add2[$mcode[$i]] .= $obj->camphurId==""?"":" อ.".$obj->camphurId;
		$add2[$mcode[$i]] .= $obj->cprovinceId==""?"":" จ.".$obj->cprovinceId;
		$add2[$mcode[$i]] .= " ".$obj->czip;
		//$add1[$mcode[$i]] = substr($add[$mcode[$i]],0,80);
		//$add2[$mcode[$i]] = substr($add[$mcode[$i]],80,160);
	}
	

	if(!empty($inv_ref[$i])){
		$sql2 = "SELECT * FROM ".$dbprefix."invent where inv_code = '".$inv_ref[$i]."' ";
		//echo $sql2;exit;
		$rs2 = mysql_query($sql2);
		$inv_ref[$i] = mysql_result($rs2,0,'inv_desc');
	}else
	{
		$inv_ref[$i] = 'สำนักงานใหญ่';
	}


	$uid[$i] = $obj->uidd;
	$selectqq = "select * from ".$dbprefix."user where usercode = '$uid[$i]' ";
	$query = mysql_query($selectqq);
	$objse = mysql_fetch_object($query);
	$uid[$i] = $objse->username;		
	$print[$i] = $obj->print;		
	if($_GET["chkprint"] == '1')$print[$i] = 1;
	$sa_type[$i] = $obj->sa_type;
	$pv[$i] = $obj->tot_pv;
	$sadate[$i] = $obj->sadate;
	$sadate = explode('-',$sadate[$i]);
	$sadate = $sadate[2].'-'.$sadate[1].'-'.$sadate[0];
	$txtoption[$i] = $obj->txtoption;
	//if(!empty($txtoption[$i]))
	$send[$i] = $obj->send;
	//if($send[$i] == '1')$send[$i] = 'จัดส่ง';else $send[$i]  = "";
	 $send[$i]  = "";

	$rs1=mysql_query($sqlLog1);
	if(mysql_num_rows($rs1) > 0){
		$obj1 = mysql_fetch_object($rs1);
		$uid1[$i] = $obj1->sys_id; 
		$logdate1[$i] = $obj1->logdate;
		$logdate11 = explode('-',$logdate1[$i]);
		$logdate11 = $logdate11[2].'-'.$logdate11[1].'-'.$logdate11[0];
		$logtime1[$i] = $obj1->logtime;
	}
	$rs2=mysql_query($sqlLog2);
	if(mysql_num_rows($rs2) > 0){
		$obj2 = mysql_fetch_object($rs2);
		$uid2[$i] = $obj2->sys_id; 
		$logdate2[$i] = $obj2->logdate;
		$logdate21 = explode('-',$logdate2[$i]);
		$logdate21 = $logdate21[2].'-'.$logdate21[1].'-'.$logdate21[0];
		$logtime2[$i] = $obj2->logtime;
	}
	

	$chkCash[$i] = $obj->chkCash;
	$chkFuture[$i] = $obj->chkFuture;
	$chkTransfer[$i] = $obj->chkTransfer;
	$chkInternet[$i] = $obj->chkInternet;
	$chkDiscount[$i] = $obj->chkDiscount;
	$chkCredit1[$i] = $obj->chkCredit1;
	$chkCredit2[$i] = $obj->chkCredit2;
	$chkCredit3[$i] = $obj->chkCredit3;

	$txtCash[$i] = $obj->txtCash;
	$txtFuture[$i] = $obj->txtFuture;
	$txtTransfer[$i] = $obj->txtTransfer;
	$txtInternet[$i] = $obj->txtInternet;
	$txtDiscount[$i] = $obj->txtDiscount;
	$txtCredit1[$i] = $obj->txtCredit1;
	$txtCredit2[$i] = $obj->txtCredit2;
	$txtCredit3[$i] = $obj->txtCredit3;
	$txtAllCredit[$i] = $txtCredit1[$i]+$txtCredit2[$i]+$txtCredit3[$i];

	$txtShow[$i] = "";
	if(!empty($chkCash[$i])) $txtShow[$i] .= '  เงินสด:'.$txtCash[$i];
	if(!empty($chkFuture[$i])) $txtShow[$i] .= '  เงินรับล่วงหน้า:'.$txtFuture[$i];
	if(!empty($chkTransfer[$i])) $txtShow[$i] .= '  เงินโอน:'.$txtTransfer[$i];
	if(!empty($chkInternet[$i])) $txtShow[$i] .= '  Ewallet:'.$txtInternet[$i];
	if(!empty($chkDiscount[$i])) $txtShow[$i] .= '  ส่วนลด:'.$txtDiscount[$i];
	if(!empty($chkCredit1[$i]) or !empty($chkCredit2[$i]) or !empty($chkCredit3[$i])) $txtShow[$i] .= '  เครดิต:'.$txtAllCredit[$i];

	$sql2 = "SELECT * FROM ".$dbprefix."member ";
	$sql2 .= "LEFT JOIN district ON (".$dbprefix."member.districtId=district.districtId)";
	$sql2 .= "LEFT JOIN amphur ON (".$dbprefix."member.amphurId=amphur.amphurId)";
	$sql2 .= "LEFT JOIN province ON (".$dbprefix."member.provinceId=province.provinceId)";
	$sql2 .= "WHERE mcode='".$mcode[$i]."' LIMIT 1 ";
	//echo $sql2;
	$rs2 = mysql_query($sql2);
	$name[$mcode[$i]] = mysql_result($rs2,0,'name_t');
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
//$pdf=new FPDF('P','mm','A5');
//$pdf=new FPDF('P','mm','Letter');
//$pgsize=array(170,216);			// (width,height)
$pgsize=array(260,190);	
//$pgsize=array(148,120);
$pdf=new FPDF('P','mm',$pgsize);
//$pdf=new FPDF('P','mm','A5');
$pdf->AddFont('angsa','','angsa.php'); 
$rem = 0;
$nitem = 10;
for($i=0;$i<sizeof($bill);$i++){
	$sql="SELECT * FROM ".$dbprefix."isaled WHERE sano='$bill[$i]' order by pcode ";
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
	//$pdf->SetBottomMargin(0); 
	
	$offsetx=-10;
	$offsety=0;
	$offsety1=60;
	$offsettab = 20;
	$offsetnline = 5;
	
	$pdf->SetFont('angsa','',16);  
	$pdf->SetY($offsety+$offsetnline+15);
	$pdf->SetX($offsetx+(7*$offsettab)+10);

	$offsety=13;
	//$pdf->Cell((3*$offsettab),10,$wording_lan["company_id"],0,0,"R"); */
//info---------------------------------------
	$pdf->SetFont('angsa','',25);  
	$pdf->SetY($offsety-7);
	$pdf->SetX($offsetx+(11*$offsettab)-34);
	$pdf->Cell((3*$offsettab),10,'ใบเสร็จรับเงิน/ใบส่งของ',0,0,"L");
	
	$pdf->SetFont('angsa','',16);  
	$pdf->SetY($offsety+(4*$offsetnline)-4);
	$pdf->SetX($offsetx+(10*$offsettab)+2);
	$pdf->Cell((3*$offsettab),10,$typedef[$sa_type[$i]],0,0,"L");

	$pdf->SetFont('angsa','',18);  
	$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(10*$offsettab)+2);
	$pdf->Cell((3*$offsettab),10,number_format($pv[$i],0,'.',','),0,0,"L");

	$pdf->SetFont('angsa','',16);  
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(10*$offsettab)+2);
	$pdf->Cell((3*$offsettab),10,$remark[$i],0,0,"L");


	$pdf->SetY($offsety+(2*$offsetnline)-1);
	$pdf->SetX($offsetx+(12*$offsettab)+2);
	$pdf->Cell((3*$offsettab),10,'พิมพ์ครั้งที่ : '.$print[$i],0,0,"L");
	
	$pdf->SetFont('angsa','',18);  
	$pdf->SetY($offsety+(4*$offsetnline)-4);
	$pdf->SetX($offsetx+(12*$offsettab)+2);
	$pdf->Cell((3*$offsettab),10,$sadate,0,0,"L");

	$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(11*$offsettab)+3);
	$pdf->Cell((3*$offsettab),10,$bill1[$i],0,0,"L"); 

	$pdf->SetFont('angsa','',16);  
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(12*$offsettab)+6);
	$pdf->Cell((3*$offsettab),10,$typeofcheckportal[$checkportal[$i]],0,0,"L"); 

	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(12*$offsettab)+7);
	//$pdf->Cell((3*$offsettab),10,$inv_code[$i],0,0,"L"); 

//	$pdf->SetY($offsety+$offsetnline+14);
//	$pdf->SetX($offsetx+(9*$offsettab)-7);
//	$pdf->Cell((3*$offsettab),10,,0,0,"L"); 
	/*$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)-10);
	$pdf->Cell((3*$offsettab),10,$mcode[$i],0,0,"L"); */
	$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+11);
	//$pdf->Cell((3*$offsettab),10,$typedef[$sa_type[$i]],0,0,"L"); 
//---------------------------------------------
//info---------------------------------------

	$pdf->SetFont('angsa','',16);  
	$pdf->SetY($offsety+(2*$offsetnline)-1);
	$pdf->SetX($offsetx+(3*$offsettab)+3);
	$pdf->Cell((3*$offsettab),10,$inv_ref[$i],0,0,"L"); 

	$pdf->SetFont('angsa','',22);  
	$pdf->SetY($offsety+(4*$offsetnline)-4);
	$pdf->SetX($offsetx+(2*$offsettab)-5);
	$pdf->Cell((2*$offsettab),10,$mcode[$i],0,0,"L"); 
	$pdf->SetY($offsety+(4*$offsetnline)-4);
	$pdf->SetX($offsetx+(4*$offsettab)+3);
	$pdf->Cell((2*$offsettab),10,$name[$mcode[$i]],0,0,"L"); 

	$pdf->SetFont('angsa','',16);  

	$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(2*$offsettab)-5);
	$pdf->Cell((2*$offsettab),10,$add1[$mcode[$i]],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab)-5);
	$pdf->Cell((2*$offsettab),10,$add2[$mcode[$i]],0,0,"L"); 
	$pdf->SetY($offsety+(7*$offsetnline)+2);
	$pdf->SetX($offsetx+(2*$offsettab)-5);
	$pdf->Cell((2*$offsettab),10,$uid[$i],0,0,"L"); 

	$pdf->SetY($offsety+(7*$offsetnline)+2);
	$pdf->SetX($offsetx+(10*$offsettab)-50);
	$pdf->Cell((2*$offsettab),10,$txtshow11,0,0,"L"); 

	
	$offsetx=-3;

	$pdf->SetFont('angsa','',19); 
	
	$offsety = 35;
	$offsetnline = 6;

	for($j=0;$j<mysql_num_rows($rs);$j++){	
		$obj = mysql_fetch_object($rs);
		$pdf->SetY($offsety+((9+$j)*$offsetnline)-20);
		$pdf->SetX($offsetx+$offsettab-11);
		$pdf->Cell($offsettab,10,($j+1+($k*$nitem)),0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline)-20);
		$pdf->SetX($offsetx-14+(2*$offsettab)-2);
		$pdf->Cell($offsettab,10,$obj->pcode,0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline)-20);
		$pdf->SetX($offsetx+(3*$offsettab)+4);
		$pdf->Cell($offsettab,10,$obj->pdesc,0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline)-20);
		$pdf->SetX($offsetx+(6*$offsettab));
		//$pdf->Cell($offsettab,10,number_format(($obj->pv*$obj->qty),0,'.',','),0,0,"R"); 

		$pdf->SetY($offsety+((9+$j)*$offsetnline)-20);
		$pdf->SetX($offsetx+(9*$offsettab)-6);
		$pdf->Cell($offsettab,10,$obj->unit,0,0,"C"); 

		
		$pdf->SetY($offsety+((9+$j)*$offsetnline)-20);
		$pdf->SetX($offsetx+(10*$offsettab)-5);
		$pdf->Cell($offsettab,10,number_format($obj->price,2,'.',','),0,0,"R"); 

		$pdf->SetY($offsety+((9+$j)*$offsetnline)-20);
		$pdf->SetX($offsetx+(11*$offsettab)-5);
		$pdf->Cell($offsettab,10,number_format($obj->qty,0,'.',','),0,0,"R"); 

		
		$pdf->SetY($offsety+((9+$j)*$offsetnline)-20);
		$pdf->SetX($offsetx+(12*$offsettab)+4);
		$pdf->Cell($offsettab,10,number_format(($obj->price*$obj->qty),2,'.',','),0,0,"R"); 
		$sum += $obj->price*$obj->qty;
		$sumpv += $obj->pv*$obj->qty;
		$sumbv += $obj->bv*$obj->qty;
		$sumfv += $obj->fv*$obj->qty;
		$sumqty += $obj->qty;
		$sumprice += $obj->price;
	}
	if($k==$npage-1){
	$offsetnline = 5;
		$offsety = 75-$offsety1;

		$pdf->SetY($offsety+(28*$offsetnline)-16);
		$pdf->SetX($offsetx+(12*$offsettab)+4);
		//$pdf->Cell($offsettab,10,'ราคาก่อน VAT : '.number_format($sum*100/107,2,'.',','),0,0,"R"); 

		$pdf->SetFont('angsa','',16);  
		$pdf->SetY($offsety+(28*$offsetnline)-8);
		$pdf->SetX($offsetx+(11*$offsettab)-4);
		//$pdf->Cell($offsettab,10,'VAT 7 % : '.number_format($sum-($sum*100/107),2,'.',','),0,0,"R"); 
		$pdf->Cell($offsettab,10,'ราคารวมภาษีมูลค่าเพิ่ม',0,0,"R"); 

		$pdf->SetFont('angsa','',19);  
		$pdf->SetY($offsety+(28*$offsetnline));
		$pdf->SetX($offsetx+(12*$offsettab)+4);
		$pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 

		$pdf->SetFont('angsa','',16);  
		$pdf->SetY($offsety+(23*$offsetnline)+8);
		$pdf->SetX($offsetx+(4*$offsettab)-15);
		$pdf->Cell($offsettab,10,'= ( '.moneytotext($sum).' )',0,0,"C"); 

		$pdf->SetFont('angsa','',16);  
		$pdf->SetY($offsety+(28*$offsetnline)-8);
		$pdf->SetX($offsetx+$offsettab-11);
		if(!empty($cname[$i]))$pdf->Cell($offsettab,10,'ชื่อผู้รับ : '.$cname[$i].' เบอร์ติดต่อ : '.$cmobile[$i],0,0,"L"); 

		$pdf->SetFont('angsa','',16);  
		$pdf->SetY($offsety+(28*$offsetnline)-3);
		$pdf->SetX($offsetx+$offsettab-11);
		$pdf->Cell($offsettab,10,$txtoption[$i],0,0,"L"); 

		$pdf->SetFont('angsa','',16);  
		$pdf->SetY($offsety+(29*$offsetnline)-0.003);
		$pdf->SetX($offsetx+$offsettab-11);
		$pdf->Cell($offsettab,10,$txtShow[$i],0,0,"L"); 





	//	 $pdf->SetY( -40 );
	//	$pdf->SetX($offsetx+(12*$offsettab)+4);
	//	$pdf->Cell($offsettab,10,number_format($sumprice,2,'.',','),0,0,"R"); 

	}
}}
$pdf->SetAutoPageBreak(false,0);

$pdf->Output("./pdf/doc.pdf");

?>
<? ob_end_flush();?>
<meta content="0;URl=./pdfshow.php" http-equiv="refresh" />
