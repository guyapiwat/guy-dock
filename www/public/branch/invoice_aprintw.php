<? session_start(); 
if($_SESSION["inv_usercode"]!=''){
?>
<? include_once("../branch/wording".$_SESSION["lan"].".php"); ?>
<? include("../branch/connectmysql.php");?>
<? include("../branch/money2text.php");?>
<? include("../branch/inc.wording.php");?>
<? include("../function/function_pos.php");?>
<? ob_start();?>
<?
if(isset($_GET['bid']))
	$sano = $_GET['bid'];
	$invxx = $_GET['inv'];
	$dbprefix = "ali_";
	$employee_name = $wording_lan["company_name"] ;
	$employee_address = $wording_lan["company_address"];
	$employee_address2 = $wording_lan["company_address2"];
	$employee_phone = $wording_lan["company_phone"];
	$employee_phone1 = $wording_lan["company_id"];
	$wherexx = findBills("sano","ali_ewallet",$sano);
	if(!empty($wherexx))$andxx = 'and';
	if(!empty($invxx))$invxx = "and ali_ewallet.lid = '".$_SESSION['admininvent']."'";
?>
<?
//list($fsano,$tsano)=explode("-",$sano);
/*if($tsano==""){
	$tsano = $fsano;
}*/
$sql = "SELECT * FROM ".$dbprefix."ewallet WHERE 1=1 $andxx $wherexx $invxx and ali_ewallet.sa_type <> 'TI' and ali_ewallet.sa_type <> 'TO' ";
$sqlLog1 = "SELECT sys_id,logdate,logtime FROM ".$dbprefix."log  WHERE object ='$sano' and subject = '�������' order by id desc";
$sqlLog2 = "SELECT sys_id,logdate,logtime  FROM ".$dbprefix."log  WHERE object ='$sano' and subject = '��䢺��' order by id desc";

$rs=mysql_query($sql);
if(mysql_num_rows($rs)<=0){
	
	?><table width="300" align="center" bgcolor="#990000"><tr><td align="center">��辺�����Ţͧ����Ţ��� <?=$sano?>
	<br /><input type="button" value="�Դ˹�ҹ��" onClick="window.close()" /></td></tr></table><?
	exit;
}
$typedef = $arr_satype;
for($i=0;$i<mysql_num_rows($rs);$i++){
	$obj = mysql_fetch_object($rs);
	$bill[$i] = $obj->sano;
	$mcode[$i] = $obj->mcode;
	$uid[$i] = $obj->uid;
	$sa_type[$i] = '����Թ Ewallet';
	$pv[$i] = $obj->tot_pv;
	$sadate[$i] = $obj->sadate;
	$remark[$i] = $obj->remark;
	$sctime[$i] = $obj->sctime;
    $date_time[$i] = explode(" ",$sctime[$i]);
	//$sadate = explode('-',$sadate[$i]);
	//$sadate = $sadate[2].'-'.$sadate[1].'-'.$sadate[0];
	$txtoption[$i] = $obj->txtoption;
	//if(!empty($txtoption[$i]))
	$chkCash[$i] = $obj->chkCash;
	$send[$i] = $obj->send;
	if($send[$i] == '1')$send[$i] = '�Ѵ��';else $send[$i]  = "";
	$chkFuture[$i] = $obj->chkFuture;
	$chkTransfer[$i] = $obj->chkTransfer;
	$chkCredit1[$i] = $obj->chkCredit1;
	$chkCredit2[$i] = $obj->chkCredit2;
	$chkCredit3[$i] = $obj->chkCredit3;
	$inv_code[$i] = $obj->lid;
	//echo $inv_code[$i];
	//exit;
	if(empty($inv_code[$i]))$inv_code[$i] = 'Head Office';
 	

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
	


	$txtCash[$i] = $obj->txtCash;
	$txtFuture[$i] = $obj->txtFuture;
	$txtTransfer[$i] = $obj->txtTransfer;
	$txtCredit1[$i] = $obj->txtCredit1;
	$txtCredit2[$i] = $obj->txtCredit2;
	$txtCredit3[$i] = $obj->txtCredit3;
	$optionCash[$i] = $obj->optionCash;
	$optionFuture[$i] = $obj->optionFuture;
	$optionTransfer[$i] = $obj->optionTransfer;
	$optionCredit1[$i] = $obj->optionCredit1;
	$optionCredit2[$i] = $obj->optionCredit2;
	$optionCredit3[$i] = $obj->optionCredit3;
	$txtAllCredit[$i] = $txtCredit1[$i]+$txtCredit2[$i]+$txtCredit3[$i];

	$txtShow[$i] = "";
		$txtShow[$i] = "";
	if($txtCash[$i] > 0) {
		$txtShow[$i][0] = '�Թʴ : '.number_format($txtCash[$i],'2','.',',');
		if($optionCash[$i] != '')$txtShow[$i][0] .= ' ('.$optionCash[$i].')';
	}
	if($chkFuture[$i] == 'on') {
		$txtShow[$i][1] = '�Թ�Ѻ��ǧ˹�� : '.number_format($txtFuture[$i],'2','.',',');
		if($optionFuture[$i] != '')$txtShow[$i][1] .= ' ('.$optionFuture[$i].')';
	}
	if($txtTransfer[$i] > 0) {
		$txtShow[$i][2] = '�Թ�͹ : '.number_format($txtTransfer[$i],'2','.',',');
		if($optionTransfer[$i] != '')$txtShow[$i][2] .= ' ('.$optionTransfer[$i].')';
}
	if($txtAllCredit[$i] > 0 ) $txtShow[$i][3] = '�ѵ��ôԵ  : '.number_format($txtAllCredit[$i],'2','.',',');
		if($optionCredit1[$i] != ''or $optionCredit2[$i] != '' or $optionCredit3[$i] != '')$txtShow[$i][3] .= ' ('.$optionCredit1[$i].' '.$optionCredit2[$i].' '.$optionCredit3[$i].')';
	
	
	if(!empty($mcode[$i])){
		$sql2 = "SELECT * FROM ".$dbprefix."member ";
	//	$sql2 .= "LEFT JOIN district ON (".$dbprefix."member.districtId=district.districtId)";
	//	$sql2 .= "LEFT JOIN amphur ON (".$dbprefix."member.amphurId=amphur.amphurId)";
	//	$sql2 .= "LEFT JOIN province ON (".$dbprefix."member.provinceId=province.provinceId)";
		$sql2 .= "WHERE mcode='".$mcode[$i]."' LIMIT 1 ";
		//echo $sql2;
		//exit;
		$rs2 = mysql_query($sql2);
		$name[$mcode[$i]] = mysql_result($rs2,0,'name_t');
		$add[$mcode[$i]] = mysql_result($rs2,0,'address');
		$add[$mcode[$i]] .= mysql_result($rs2,0,'districtId')==""?"":" �.".mysql_result($rs2,0,'districtId');
		$add[$mcode[$i]] .= mysql_result($rs2,0,'amphurId')==""?"":" �.".mysql_result($rs2,0,'amphurId');
		$add[$mcode[$i]] .= mysql_result($rs2,0,'provinceId')==""?"":" �.".mysql_result($rs2,0,'provinceId');
		$add[$mcode[$i]] .= " ".mysql_result($rs2,0,'zip');
		mysql_free_result($rs2);
	}
}
list($y,$m,$d) = explode('-',date("Y-m-d"));
mysql_free_result($rs);
//$pdf->AddFont('tahoma','','tahoma.php'); 
define('FPDF_FONTPATH','../branch/fpdf/font/'); 
require('../branch/fpdf/fpdf.php'); 
//require('table1.php');
$pgsize=array(200,160);
$pdf=new FPDF('P','mm',$pgsize);
//$pdf=new FPDF('P','mm','Letter');
//$pgsize=array(200,210);
//$pgsize=array(200,160);
//$pdf=new FPDF('P','mm',$pgsize);

//$pdf=new FPDF('P','mm','A5');
$pdf->AddFont('angsa','','angsa.php'); 
$rem = 0;
$nitem = 15;
for($i=0;$i<sizeof($bill);$i++){
	$sql="SELECT * FROM ".$dbprefix."ewallet WHERE sano='$bill[$i]' ";
	$rs=mysql_query($sql);
	$npage = ceil(mysql_num_rows($rs)/$nitem);
	mysql_free_result($rs);
	$sum = 0;
	$sumpv = 0;
	for($k=0;$k<$npage;$k++){
	$sql="SELECT * FROM ".$dbprefix."ewallet WHERE sano='$bill[$i]' LIMIT ".($k*$nitem).", $nitem ";
	
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
	
	$pdf->SetY($offsety+$offsetnline-3);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,$employee_name." (ʹ�.)",0,0,"L"); 
	$pdf->SetY($offsety+$offsetnline+1);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,$employee_address,0,0,"L"); 
	$pdf->SetY($offsety+2*$offsetnline+1);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,$employee_address2,0,0,"L"); 
	/* $pdf->SetY($offsety+3*$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,"$employee_phone",0,0,"L");  */
	$pdf->SetY($offsety+3*$offsetnline+1.5);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,"�Ţ��Шӵ�Ǽ���������� 0-1055-59080-08-9",0,0,"L"); 
		
	$pdf->SetFont('angsa','',16);
	$pdf->SetY($offsety+(2.5*$offsetnline)-5);
	$pdf->SetX($offsetx+(6.5*$offsettab)+1);
	$pdf->Cell((3*$offsettab),10,"��Ѻ�Թ",0,0,"R"); 
	
	$offsety=5;
	$pdf->SetFont('angsa','',12); 
	
	//$pdf->SetY($offsety+$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+8);
	//$pdf->Cell($offsettab,10,"���觫����Թ���",1,0,"C"); 
	//$pdf->SetY($offsety+3*$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+5);
	//$pdf->Cell($offsettab,10,"(�͡����͡�繪ش)",0,0,"C"); 
	
	//$pdf->SetY($offsety+(6*$offsetnline));
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell((2*$offsettab),10,"�Ţ��Шӵ�Ǽ�����������ҡ�",0,0,"L"); 
	
	//$pdf->SetY($offsety+(5*$offsetnline));
	//$pdf->SetX($offsetx+(4*$offsettab));
	//$pdf->Cell((3*$offsettab),10,"������Ѻ�Թ/㺡ӡѺ����/����Թ���",0,0,"C"); 
	//$pdf->SetY($offsety+(6*$offsetnline));
	//$pdf->SetX($offsetx+(4*$offsettab));
	//$pdf->Cell((3*$offsettab),10,"RECEIPT/ TAX INVOICE/PACKING LIST",0,0,"C"); 


	//-------------------table---------------------
	//$pdf->SetY($offsety+(9*$offsetnline));
	//��ͺ��
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell(10*$offsettab-7,55,"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline)+6);
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	//��ͺ��ҧ
	$pdf->SetY($offsety+(21*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+7);
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	//��鹺�÷Ѵ ���� 7%
	//$pdf->SetY($offsety+(21*$offsetnline)+10);
	//$pdf->SetX($offsetx+(9*$offsettab)+6-10);
	//$pdf->Cell(10,0,"",1,0,"L"); 
	//��鹺�÷Ѵ ��Ť���Թ���
	$pdf->SetY($offsety+(21*$offsetnline)+14);
	$pdf->SetX($offsetx+(9*$offsettab));
	$pdf->Cell(15,0,"",1,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+14.5);
	$pdf->SetX($offsetx+(9*$offsettab));
	$pdf->Cell(15,0,"",1,0,"L"); 
	//$pdf->SetY($offsety+(9*$offsetnline));
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell(10*$offsettab-7,(12*$offsetnline),"",1,0,"L"); 
	//$pdf->SetY($offsety+(23*$offsetnline)-2);
	//$pdf->SetX($offsetx+(9*$offsettab)+2);
	//$pdf->Cell(21,8,"",1,0,"L"); 
	//-----------------------����繵�
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
		//-------------------column ��ͧ---------------
	/*$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-10);//�ӴѺ
	$pdf->Cell($offsettab-8,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);//�����Թ���
	$pdf->Cell(2*$offsettab-8,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+5);//��¡���Թ���
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
	/*$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-10);
	$pdf->Cell(7*$offsettab+12,(13*$offsetnline)+3,"",1,0,"L"); */
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+173);
	$pdf->Cell(8*$offsettab-194,(13*$offsetnline)+3,"",1,0,"L");
	//-------------------table---------------------
	$pdf->SetFont('angsa','',14);
	$pdf->SetY($offsety+(5*$offsetnline)-5);
	$pdf->SetX($offsetx+(6.5*$offsettab)+1);
	$pdf->Cell((3*$offsettab),10,"�Ң�...........................",0,0,"R"); 

	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+(6.5*$offsettab)+1);
	$pdf->Cell((3*$offsettab),10,"�Ţ���...........................",0,0,"R"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(6.5*$offsettab)+1);
	$pdf->Cell((3*$offsettab),10,"�ѹ���...........................",0,0,"R"); 
	$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+(6.5*$offsettab)+1);
	$pdf->Cell((3*$offsettab),10,"��������...........................",0,0,"R"); 
//info---------------------------------------
	
	/*$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(8*$offsettab)+6);
	$pdf->Cell((3*$offsettab),10,$uid[$i],0,0,"L"); */
	
		$pdf->SetY($offsety+(5*$offsetnline)-6);
	$pdf->SetX($offsetx+(8.5*$offsettab));
	$pdf->Cell((3*$offsettab),10,$inv_code[$i],0,0,"L");


	$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(8.5*$offsettab));
	$pdf->Cell((3*$offsettab),10,$bill[$i],0,0,"L"); 
	/*$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)-10);
	$pdf->Cell((3*$offsettab),10,$mcode[$i],0,0,"L"); */
	$pdf->SetY($offsety+(6*$offsetnline)-1);
	$pdf->SetX($offsetx+(8.5*$offsettab));
	$pdf->Cell((3*$offsettab),10,$sadate[$i],0,0,"L");
	
	$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(8.5*$offsettab));
	$pdf->Cell((3*$offsettab),10,"����Թ"); 
	$pdf->SetFont('angsa','',12); 
//---------------------------------------------
	
	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"������Ҫԡ",0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"����",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"�������",0,0,"L"); 
	$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"�����˵�",0,0,"L"); 
	
	//$pdf->SetY($offsety+(7*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell((2*$offsettab),10,"���ͼ���й�",0,0,"L"); 
	
	//$pdf->SetY($offsety+(8*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell((2*$offsettab),10,"����",0,0,"L"); 
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
	$offsety=8;
	//$pdf->SetY($offsety+(7*$offsetnline));
	//$pdf->SetX($offsetx+(8*$offsettab));
	//$pdf->Cell((2*$offsettab),10,$sp_name[$mcode[$i]],0,0,"L"); 
	
	//$pdf->SetY($offsety+(8*$offsetnline));
	//$pdf->SetX($offsetx+(8*$offsettab));
	//$pdf->Cell((2*$offsettab),10,$sp_code[$mcode[$i]],0,0,"L"); 
//------------------------------------------
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-5);
	$pdf->Cell($offsettab,10,"�ӴѺ",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx-10+(2*$offsettab)-5);
	$pdf->Cell($offsettab,10,"��¡��",0,0,"L"); 
	


	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)+5);
	$pdf->Cell($offsettab,10,"�ӹǹ�ط��",0,0,"L"); 

		$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)-4-10);
	$pdf->Cell($offsettab,10,"��Ť���Թ���",0,0,"L");

	
	//$pdf->SetY($offsety+(20*$offsetnline));
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell($offsettab,10,"�ӹǹ�Թ������ (",0,0,"L"); 
	//$pdf->SetY($offsety+(20*$offsetnline));
	//$pdf->SetX($offsetx+(6*$offsettab)-15);
	//$pdf->Cell($offsettab,10,")",0,0,"L"); 
	/*$pdf->SetY($offsety+(20*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab));
	$pdf->Cell($offsettab,10,"�ӹǹ���",0,0,"L"); */
	
	//$pdf->SetY($offsety+(26*$offsetnline)-1);
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell((2*$offsettab),10,$uid[$i],0,0,"C");
	$pdf->SetY($offsety+(26*$offsetnline)+3);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,".............................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"Received By ".$uid[$i],0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"Date : ".$date_time[$i][0]." Time : ".$date_time[$i][1],0,0,"C");

	
	//$pdf->SetY($offsety+(26*$offsetnline));
	//$pdf->SetX($offsetx+(5*$offsettab)-7);
	//$pdf->Cell((2*$offsettab),10,"���Ѻ�Թ��Ҥú��ǹ����",0,0,"C");
/* 	$pdf->SetY($offsety+(26*$offsetnline)+3);
	$pdf->SetX($offsetx+(5*$offsettab)-7-5);
	$pdf->Cell((2*$offsettab),10,".............................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab)-7-5);
	$pdf->Cell((2*$offsettab),10,"Sent By",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab)-7-5);
	$pdf->Cell((2*$offsettab),10,"Date ......../......../........",0,0,"C"); */
	
	$pdf->SetY($offsety+(26*$offsetnline)+3);
	$pdf->SetX($offsetx+(9*$offsettab)-15-10);
	$pdf->Cell((2*$offsettab),10,".............................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-15-10);
	$pdf->Cell((2*$offsettab),10,"Autherize",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-15-10);
	$pdf->Cell((2*$offsettab),10,"Date ......../......../........",0,0,"C");
	
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"������",0,0,"L");
	$tab=0;
	if(count($txtShow[$i])){
		foreach($txtShow[$i] as $keyxx => $valxx):
			$pdf->SetY($offsety+(22*$offsetnline)+$tab);
			$pdf->SetX($offsetx+(2*$offsettab));
			$pdf->Cell($offsettab,10,$txtShow[$i][$keyxx],0,0,"L");
			$tab = $tab+5;
		endforeach;
	}
	/*$pdf->SetFont('angsa','',8); 
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
	$pdf->Cell($offsettab,10,"�ôԵ",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(4*$offsettab));
	$pdf->Cell($offsettab,10,"Internet",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab));
	$pdf->Cell($offsettab,10,"Commission",0,0,"L");*/

	$pdf->SetFont('angsa','',8); 
/* 	$pdf->SetY($offsety+(23*$offsetnline));
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"��Ҿ������Ѻ�Թ��ҵ����¡�÷���к�����ҧ�鹤ú��ǹ�������ó����º��������",0,0,"L"); */
	//$pdf->SetY($offsety+(23*$offsetnline));
	//$pdf->SetX($offsetx+(5*$offsettab));
	//$pdf->Cell($offsettab,10,"��Ҿ������Ѻ��Ե�ѳ�����к�����ҧ�� ��е�Ǩ�ӹǹ���Ҿ�������ó����º��������",0,0,"L");
	$pdf->SetFont('angsa','',14);
 
	$offsety = 9;
	for($j=0;$j<mysql_num_rows($rs);$j++){	
		$obj = mysql_fetch_object($rs);
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell($offsettab,10,($j+1+($k*$nitem)),0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx-14+(2*$offsettab)+5);
		$pdf->Cell($offsettab,10,$obj->pcode,0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
			$pdf->SetX($offsetx-10+(2*$offsettab)-5);
		$pdf->Cell($offsettab,10,/*$obj->pdesc*/'����Թ Ewallet',0,0,"L"); 
		

		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab)+2);
		$pdf->Cell($offsettab,10,number_format($obj->txtMoney,2,'.',','),0,0,"R"); 
		$sum += $obj->txtMoney;
		$sumpv += $obj->pv*$obj->qty;
		$sumbv += $obj->bv*$obj->qty;
		$sumfv += $obj->fv*$obj->qty;
		$sumqty += $obj->qty;
		$sumprice += $obj->txtMoney;
	}
	if($k==$npage-1){
		$offsety = 8;

		/*$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(5*$offsettab)-1);
		$pdf->Cell($offsettab,10,number_format($sumpv,0,'.',','),0,0,"R"); 

		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(5*$offsettab)+8);
		$pdf->Cell($offsettab,10,number_format($sumbv ,0,'.',','),0,0,"R"); 

		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(5*$offsettab)+17);
		$pdf->Cell($offsettab,10,number_format($sumfv,0,'.',','),0,0,"R"); */





		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 
		/*$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sumpv,0,'.',',').'/'.number_format($sumbv,0,'.',',').'/'.number_format($sumfv,0,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+(21*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sum*7/107,2,'.',','),0,0,"R");
		*/
		$pdf->SetY($offsety+(22*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 
		//$pdf->Cell($offsettab,10,number_format('100000',2,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(4*$offsettab)-15);
		$pdf->Cell($offsettab,10,'( '.moneytotext($sum).' )',0,0,"C"); 
		//$pdf->Cell($offsettab,10,'= ( �����������ѹ�ͧ��������Ժ�ҷ����Ժ�ͧʵҧ�� )',0,0,"C"); 
	}
}}
$pdf->Output("../branch/pdf/doc.pdf");

?>
<? ob_end_flush();
} 
?>
<meta content="0;URl=../branch/pdfshow.php" http-equiv="refresh" />
