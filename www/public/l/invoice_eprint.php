<? include("connectmysql.php");?>
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
//list($fsano,$tsano)=explode("-",$sano);
/*if($tsano==""){
	$tsano = $fsano;
}*/
$sql = "SELECT * FROM ".$dbprefix."transferewallet_h WHERE id='$sano' ";
$sqlLog1 = "SELECT sys_id,logdate,logtime FROM ".$dbprefix."log  WHERE object ='$sano' and subject = '�������' order by id desc";
$sqlLog2 = "SELECT sys_id,logdate,logtime  FROM ".$dbprefix."log  WHERE object ='$sano' and subject = '��䢺��' order by id desc";

//echo $sql;
$rs=mysql_query($sql);
if(mysql_num_rows($rs)<=0){
	
	?><table width="300" align="center" bgcolor="#990000"><tr><td align="center">��辺�����Ţͧ����Ţ��� <?=$sano?>
	<br /><input type="button" value="�Դ˹�ҹ��" onClick="window.close()" /></td></tr></table><?
	exit;
}
$typedef = array('A'=>"".$word_lan["invoice_A"]."",'Q'=>"".$word_lan["invoice_Q"]."",'H'=>"".$word_lan["invoice_H"]."",'B'=>"".$word_lan["invoice_B"]."");
for($i=0;$i<mysql_num_rows($rs);$i++){
	$obj = mysql_fetch_object($rs);
	$bill[$i] = $obj->id;
	$bill1[$i] = $obj->sano;
	$mcode[$i] = $obj->mcode;
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
	//if($send[$i] == '1')$send[$i] = '�Ѵ��';else $send[$i]  = "";
	 $send[$i]  = "";
	$chkFuture[$i] = $obj->chkFuture;
	$chkTransfer[$i] = $obj->chkTransfer;
	$chkCredit1[$i] = $obj->chkCredit1;
	$chkCredit2[$i] = $obj->chkCredit2;
	$chkCredit3[$i] = $obj->chkCredit3;
	$chkInternet[$i] = $obj->chkInternet;
	$inv_code[$i] = $obj->inv_code;
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
	$txtInternet[$i] = $obj->txtInternet;
	$txtAllCredit[$i] = $txtCredit1[$i]+$txtCredit2[$i]+$txtCredit3[$i];

	$txtShow[$i] = "";
	if($chkCash[$i] == 'on') $txtShow[$i] .= ' Cash : '.$txtCash[$i];
	if($chkFuture[$i] == 'on') $txtShow[$i] .= ' Future : '.$txtFuture[$i];
	if($chkTransfer[$i] == 'on') $txtShow[$i] .= ' Transfer : '.$txtTransfer[$i];
	if($chkInternet[$i] == 'on') $txtShow[$i] .= ' E-wallet : '.$txtInternet[$i];
	if($chkCredit1[$i] == 'on' or $chkCredit2[$i] == 'on' or $chkCredit3[$i] == 'on') $txtShow[$i] .= ' Credit : '.$txtAllCredit[$i];
	$sql2 = "SELECT * FROM ".$dbprefix."member ";
	$sql2 .= "LEFT JOIN district ON (".$dbprefix."member.districtId=district.districtId)";
	$sql2 .= "LEFT JOIN amphur ON (".$dbprefix."member.amphurId=amphur.amphurId)";
	$sql2 .= "LEFT JOIN province ON (".$dbprefix."member.provinceId=province.provinceId)";
	$sql2 .= "WHERE mcode='".$mcode[$i]."' LIMIT 1 ";
	//echo $sql2;
	$rs2 = mysql_query($sql2);
	$name[$mcode[$i]] = mysql_result($rs2,0,'name_t');
	$add[$mcode[$i]] = mysql_result($rs2,0,'address');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'districtName')==""?"":" �.".mysql_result($rs2,0,'districtName');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'amphurName')==""?"":" �.".mysql_result($rs2,0,'amphurName');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'provinceName')==""?"":" �.".mysql_result($rs2,0,'provinceName');
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
$pdf=new FPDF('P','mm','A4');
//$pdf=new FPDF('P','mm','Letter');
//$pgsize=array(170,216);			// (width,height)
//$pgsize=array(148,210);
//$pdf=new FPDF('P','mm',$pgsize);
//$pdf=new FPDF('P','mm','A5');
$pdf->AddFont('angsa','','angsa.php'); 
$rem = 0;
$nitem = 5;
for($i=0;$i<sizeof($bill);$i++){
	$sql="SELECT * FROM ".$dbprefix."transferewallet_h WHERE id='$bill[$i]' ";
	//exit;
	$rs=mysql_query($sql);
	$npage = ceil(mysql_num_rows($rs)/$nitem);
	mysql_free_result($rs);
	$sum = 0;
	$sumpv = 0;
	for($k=0;$k<$npage;$k++){
	$sql="SELECT * FROM ".$dbprefix."transferewallet_h WHERE id='$bill[$i]' LIMIT ".($k*$nitem).", $nitem ";
	$rs=mysql_query($sql);
	
	$pdf->AddPage(); 
	//$pdf->image("sale_form.jpg",0,0,230);
	
	$pdf->SetTopMargin(0); 
	$pdf->SetRightMargin(0); 
	
	$offsetx=-10;
	$offsety=0;
	$offsety1=100;
	$offsettab = 20;
	$offsetnline = 5;
	
	$pdf->SetFont('angsa','',14);  
	//$logo = "./Logo.jpg";
	$pdf->SetY($offsety+$offsetnline);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab,10,$logo,0,0,"L"); 
	$pdf->Image('../logo.jpg',$offsetx+$offsettab,$offsety+$offsetnline+2,23); //file,x,y,w=0,h=0

	$pdf->SetFont('angsa','',16); 
	
	$pdf->SetY($offsety+$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,"����ѷ $employee_name",0,0,"L"); 
	$pdf->SetY($offsety+2*$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,"$employee_address ",0,0,"L"); 
	$pdf->SetY($offsety+3*$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab)+5);
	$pdf->Cell((4*$offsettab),10,"$employee_phone",0,0,"L"); 
	
	$pdf->SetFont('angsa','',14);  
	$pdf->SetY($offsety+$offsetnline+15);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�Ң�........................",0,0,"R"); 
	//$pdf->SetY($offsety+$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+8);
	//$pdf->Cell($offsettab,10,"���觫����Թ���",1,0,"C"); 
	//$pdf->SetY($offsety+3*$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+5);
	//$pdf->Cell($offsettab,10,"(�͡����͡�繪ش)",0,0,"C"); 
	
	//$pdf->SetY($offsety+(6*$offsetnline));
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell((2*$offsettab),10,"�Ţ��Шӵ�Ǽ�����������ҡ�",0,0,"L"); 
	
	$pdf->SetY($offsety+(2*$offsetnline)-5);
	$pdf->SetX($offsetx+(8*$offsettab)+5);
	$pdf->Cell((2*$offsettab),10,"���觫���",1,0,"C"); 
	//$pdf->SetY($offsety+(6*$offsetnline));
	//$pdf->SetX($offsetx+(4*$offsettab));
	//$pdf->Cell((3*$offsettab),10,"RECEIPT/ TAX INVOICE/PACKING LIST",0,0,"C"); 
	//-------------------table---------------------
	//$pdf->SetY($offsety+(9*$offsetnline));
	
	//��ͺ��
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline)+6);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	$offsety = 80-$offsety1;
	//��ͺ��ҧ
	$pdf->SetY($offsety+(21*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+6);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	//��鹺�÷Ѵ ���� 7%
/*	$pdf->SetY($offsety+(21*$offsetnline)+10);
	$pdf->SetX($offsetx+(10*$offsettab)-3);
	$pdf->Cell(10,0,"",1,0,"L"); 
	//��鹺�÷Ѵ ��Ť���Թ���
	$pdf->SetY($offsety+(21*$offsetnline)+15);
	$pdf->SetX($offsetx+(10*$offsettab)-3);
	$pdf->Cell(10,0,"",1,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+16);
	$pdf->SetX($offsetx+(10*$offsettab)-3);
	$pdf->Cell(10,0,"",1,0,"L"); 
	*/$offsety=0;
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
	$pdf->SetX($offsetx+$offsettab);//�ӴѺ
	$pdf->Cell($offsettab-8,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);//�����Թ���
	$pdf->Cell(2*$offsettab-8,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);//��¡���Թ���
	$pdf->Cell(5*$offsettab-8,(12*$offsetnline),"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);//pv
	$pdf->Cell(6*$offsettab-14,(13*$offsetnline)+2,"",1,0,"L");
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);//pv
	$pdf->Cell(6*$offsettab-5,(13*$offsetnline)+2,"",1,0,"L");
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);//pv
	$pdf->Cell(6*$offsettab+4,(13*$offsetnline)+2,"",1,0,"L");
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(7*$offsettab+2,(13*$offsetnline)+2,"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(8*$offsettab+2,(13*$offsetnline)+2,"",1,0,"L");*/
	//-------------------table---------------------
	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,$send[$i],0,0,"R"); 
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�Ţ���........................",0,0,"R"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�ѹ���........................",0,0,"R"); 
	$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,$wording_lan["company_id"],0,0,"R"); 
//info---------------------------------------
	
	/*$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(8*$offsettab)+6);
	$pdf->Cell((3*$offsettab),10,$uid[$i],0,0,"L"); */
	$pdf->SetY($offsety+$offsetnline+14);
	$pdf->SetX($offsetx+(9*$offsettab)+14);
	$pdf->Cell((3*$offsettab),10,$inv_code[$i],0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+11);
	$pdf->Cell((3*$offsettab),10,$bill1[$i],0,0,"L"); 
	/*$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)-10);
	$pdf->Cell((3*$offsettab),10,$mcode[$i],0,0,"L"); */
	$pdf->SetY($offsety+(6*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+11);
	$pdf->Cell((3*$offsettab),10,$sadate,0,0,"L");
	$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+11);
	//$pdf->Cell((3*$offsettab),10,$typedef[$sa_type[$i]],0,0,"L"); 
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
	$pdf->Cell((2*$offsettab),10,"����Ẻ",0,0,"L"); 
	
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
	$pdf->Cell((2*$offsettab),10,$typedef[$sa_type[$i]],0,0,"L"); 
	$offsetx=-3;
	$offsety=3;
	//$pdf->SetY($offsety+(7*$offsetnline));
	//$pdf->SetX($offsetx+(8*$offsettab));
	//$pdf->Cell((2*$offsettab),10,$sp_name[$mcode[$i]],0,0,"L"); 
	
	//$pdf->SetY($offsety+(8*$offsetnline));
	//$pdf->SetX($offsetx+(8*$offsettab));
	//$pdf->Cell((2*$offsettab),10,$sp_code[$mcode[$i]],0,0,"L"); 
	$pdf->SetFont('angsa','',12); 
//------------------------------------------
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+$offsettab-2);
	$pdf->Cell($offsettab,10,"�ӴѺ",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx-14+(2*$offsettab)+5);
	$pdf->Cell($offsettab,10,"�����Թ���",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx-8+(3*$offsettab));
	$pdf->Cell($offsettab,10,"��¡��",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+14+(6*$offsettab));
	$pdf->Cell($offsettab,10,"PV",0,0,"L"); 

	/*$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+17+(5*$offsettab));
	$pdf->Cell($offsettab,10,"BV",0,0,"L"); 

	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+26+(5*$offsettab));
	$pdf->Cell($offsettab,10,"FV",0,0,"L"); */
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+6+(7*$offsettab)+7);
	$pdf->Cell($offsettab,10,"�ӹǹ",0,0,"L"); 

	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)+11);
	$pdf->Cell($offsettab,10,"�Ҥ�",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)+7);
	$pdf->Cell($offsettab,10,"�ӹǹ�Թ�ط��",0,0,"L"); 
	
	//$pdf->SetY($offsety+(21*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell($offsettab,10,"����Ҥ��Թ��ҷ�����������Ť������",0,0,"L"); 
	$offsety = 85-$offsety1;
	$pdf->SetY($offsety+(21*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)-4);
	//$pdf->Cell($offsettab,10,"������Ť������ 7%",0,0,"L");
	
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)-4);
	//$pdf->Cell($offsettab,10,"��Ť���Թ���",0,0,"L");
	
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
	$offsety = 80-$offsety1;
	/*$pdf->SetY($offsety+(26*$offsetnline)+3);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,".............................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"�������Թ���",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"�ѹ��� ......../......../........",0,0,"C");

	//$pdf->SetY($offsety+(26*$offsetnline));
	//$pdf->SetX($offsetx+(5*$offsettab)-7);
	//$pdf->Cell((2*$offsettab),10,"���Ѻ�Թ��Ҥú��ǹ����",0,0,"C");
	$pdf->SetY($offsety+(26*$offsetnline)+3);
	$pdf->SetX($offsetx+(4*$offsettab)-12);
	$pdf->Cell((2*$offsettab),10,".............................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(4*$offsettab)-12);
	$pdf->Cell((2*$offsettab),10,"����Ѻ�Թ���",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+(4*$offsettab)-12);
	$pdf->Cell((2*$offsettab),10,"�ѹ��� ......../......../........",0,0,"C");

	//$pdf->SetY($offsety+(26*$offsetnline));
	//$pdf->SetX($offsetx+(5*$offsettab)-7);
	//$pdf->Cell((2*$offsettab),10,"���Ѻ�Թ��Ҥú��ǹ����",0,0,"C");
	$pdf->SetY($offsety+(26*$offsetnline)+3);
	$pdf->SetX($offsetx+(6*$offsettab)-5);
	$pdf->Cell((2*$offsettab),10,".............................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(6*$offsettab)-5);
	$pdf->Cell((2*$offsettab),10,"����Ѻ�Թ",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+(6*$offsettab)-5);
	$pdf->Cell((2*$offsettab),10,"�ѹ��� ......../......../........",0,0,"C");
	
	$pdf->SetY($offsety+(26*$offsetnline)+3);
	$pdf->SetX($offsetx+(9*$offsettab)-15);
	$pdf->Cell((2*$offsettab),10,".............................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-15);
	$pdf->Cell((2*$offsettab),10,"���͹��ѵ�",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-15);
	$pdf->Cell((2*$offsettab),10,"�ѹ��� ......../......../........",0,0,"C");
	*/

	$pdf->SetFont('angsa','',12);  
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
	$offsety = 80-$offsety1;
	$pdf->SetFont('angsa','',12); 
	//$pdf->SetY($offsety+(23*$offsetnline));
	//$pdf->SetX($offsetx+($offsettab));
	//$pdf->Cell($offsettab,10,"��Ҿ������Ѻ�Թ��ҵ����¡�÷���к�����ҧ�鹤ú��ǹ�������ó����º��������",0,0,"L");
	//$pdf->SetY($offsety+(23*$offsetnline));
	//$pdf->SetX($offsetx+(5*$offsettab));
	//$pdf->Cell($offsettab,10,"��Ҿ������Ѻ��Ե�ѳ�����к�����ҧ�� ��е�Ǩ�ӹǹ���Ҿ�������ó����º��������",0,0,"L");
	$pdf->SetFont('angsa','',14); 
	
	$offsety = 4;
	for($j=0;$j<mysql_num_rows($rs);$j++){	
		$obj = mysql_fetch_object($rs);

		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell($offsettab,10,($j+1+($k*$nitem)),0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx-14+(2*$offsettab)+5);
		$pdf->Cell($offsettab,10,$obj->pcode,0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx-8+(3*$offsettab));
		$pdf->Cell($offsettab,10,'����Թ Ewallet',0,0,"L"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(6*$offsettab));
		//$pdf->Cell($offsettab,10,number_format(($obj->pv*$obj->qty),0,'.',','),0,0,"R"); 
		$pdf->Cell($offsettab,10,"0",0,0,"R"); 

		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(7*$offsettab));
		//$pdf->Cell($offsettab,10,number_format($obj->qty,0,'.',','),0,0,"R"); 
		$pdf->Cell($offsettab,10,'1',0,0,"R"); 
		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab));
		$pdf->Cell($offsettab,10,number_format(($obj->total*1),2,'.',','),0,0,"R"); 

		
		$pdf->SetY($offsety+((9+$j)*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab)+2);
		$pdf->Cell($offsettab,10,number_format(($obj->total),2,'.',','),0,0,"R"); 


		$sum += $obj->total*1;
		$sumpv += $obj->pv*$obj->qty;
		$sumbv += $obj->bv*$obj->qty;
		$sumfv += $obj->fv*$obj->qty;
		$sumqty += '1';
		$sumprice += $obj->total;
	}
	if($k==$npage-1){
		$offsety = 83-$offsety1;

		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(6*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sumpv,0,'.',','),0,0,"R"); 

		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(5*$offsettab)+8);
		/*$pdf->Cell($offsettab,10,number_format($sumbv ,0,'.',','),0,0,"R"); 

		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(5*$offsettab)+17);
		$pdf->Cell($offsettab,10,number_format($sumfv,0,'.',','),0,0,"R"); */

		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(7*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sumqty,0,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sumprice,2,'.',','),0,0,"R"); 




		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 
		/*$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab));
		$pdf->Cell($offsettab,10,number_format($sumpv,0,'.',',').'/'.number_format($sumbv,0,'.',',').'/'.number_format($sumfv,0,'.',','),0,0,"R"); 
		*/
		$pdf->SetY($offsety+(21*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab));
		//$pdf->Cell($offsettab,10,number_format($sum*7/107,2,'.',','),0,0,"R");
		
		$pdf->SetY($offsety+(22*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab));
		//$pdf->Cell($offsettab,10,number_format($sum-($sum*7/107),2,'.',','),0,0,"R"); 
		//$pdf->Cell($offsettab,10,number_format('100000',2,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(4*$offsettab)-15);
		$pdf->Cell($offsettab,10,'= ( '.moneytotext($sum).' )',0,0,"C"); 
		//$pdf->Cell($offsettab,10,'= ( �����������ѹ�ͧ��������Ժ�ҷ����Ժ�ͧʵҧ�� )',0,0,"C"); 
	}

	$offsety = 180-$offsety1;
	$pdf->SetFont('angsa','',14); 
	//$pdf->AddFont('angsa','B');  
	$pdf->SetY($offsety+(2*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"��ê����Թ",0,0,"L"); 
	$pdf->SetY($offsety+(3*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"����Ѻ�١���",0,0,"L"); 
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"����",0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"�Ţ�����Ҫԡ (Ref1)",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"�Ţ������觫��� (Ref2)",0,0,"L"); 
	$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"�ӹǹ��ͧ����",0,0,"L"); 
	
	//$pdf->SetY($offsety+(7*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell((2*$offsettab),10,"���ͼ���й�",0,0,"L"); 
	
	//$pdf->SetY($offsety+(8*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell((2*$offsettab),10,"����",0,0,"L"); 
//info---------------------------------------
	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab)+15);
	$pdf->Cell((2*$offsettab),10,$name[$mcode[$i]],0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab)+15);
	$pdf->Cell((2*$offsettab),10,$mcode[$i],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab)+15);
	$pdf->Cell((2*$offsettab),10,$mcode[$i],0,0,"L"); 
	$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab)+15);
	$pdf->Cell((2*$offsettab),10,$sum.' �ҷ = ( '.moneytotext($sum).' )',0,0,"L"); 

	$pdf->SetY($offsety+(10*$offsetnline)+3);
	$pdf->SetX($offsetx+(8*$offsettab)-15);
	$pdf->Cell((2*$offsettab),10,"ŧ���ͼ���Ѻ�Թ_____________________   �ѹ���___________",0,0,"C");
	
	
	$pdf->SetY($offsety+(12*$offsetnline)+6);
	$pdf->SetX($offsetx+$offsettab-8);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 

//-------------------------------------------------------------------------------------------------------
	$offsety = 240-$offsety1;
	$pdf->SetFont('angsa','',14); 
	//$pdf->AddFont('angsa','B');  
	$pdf->SetY($offsety+(2*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"����Ѻ��Ҥ��",0,0,"L"); 

	$offsety = 260-$offsety1;

	$pdf->SetY($offsety+(2*$offsetnline)-5);
	$pdf->SetX($offsetx+(1*$offsettab));
	$pdf->Cell((4.5*$offsettab),60,"",1,0,"L"); 
	$pdf->SetY($offsety+(2*$offsetnline)-5);
	$pdf->SetX($offsetx+(5.5*$offsettab));
	$pdf->Cell((4.5*$offsettab),60,"",1,0,"R"); 

	$pdf->SetY($offsety+(2*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"������Һѭ�� ����ѷ �Ѥ������ ����駤� �ӡѴ",0,0,"L"); 
	$pdf->SetY($offsety+(3*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"��Ҥ�á�ا��  COM CODE : 20390",0,0,"L"); 

	$pdf->SetY($offsety+(1*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)-1);
	$pdf->Cell((2*$offsettab),10,"�ѹ���_____________________  ",0,0,"C");
	$pdf->SetY($offsety+(3*$offsetnline));
	$pdf->SetX($offsetx+(6*$offsettab)-7);
	$pdf->Cell((2*$offsettab),10,"����",0,0,"L"); 
	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+(6*$offsettab)-7);
	$pdf->Cell((2*$offsettab),10,"�Ţ�����Ҫԡ ( Ref1)",0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+(6*$offsettab)-7);
	$pdf->Cell((2*$offsettab),10,"�Ţ������觫��� ( Ref2)",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(6*$offsettab)-7);
	$pdf->Cell((2*$offsettab),10,"�ӹǹ�Թ����ͧ����",0,0,"L"); 

	$pdf->SetY($offsety+(3*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+5);
	$pdf->Cell((2*$offsettab),10,$name[$mcode[$i]],0,0,"L"); 
	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+5);
	$pdf->Cell((2*$offsettab),10,$mcode[$i],0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+5);
	$pdf->Cell((2*$offsettab),10,$mcode[$i],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+5);
	$pdf->Cell((2*$offsettab),10,$sum.' �ҷ',0,0,"L"); 
	$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+5);
	$pdf->Cell((2*$offsettab),10,'( '.moneytotext($sum).' )',0,0,"L"); 


	$pdf->SetY($offsety+(13*$offsetnline)+2);
	$pdf->SetX($offsetx+(2*$offsettab)-5);
	$pdf->Cell((2*$offsettab),10,"���д����Թʴ �繨ӹǹ  ",0,0,"C");


	$pdf->SetY($offsety+(17*$offsetnline)-5);
	$pdf->SetX($offsetx+(1*$offsettab));
	$pdf->Cell((7*$offsettab),10,"�ӹǹ�Թ�繵���ѡ�� : ".moneytotext($sum),1,0,"L"); 
	$pdf->SetY($offsety+(17*$offsetnline)-5);
	$pdf->SetX($offsetx+(8*$offsettab));
	$pdf->Cell((2*$offsettab),10,$sum." �ҷ",1,0,"R"); 


	$pdf->SetY($offsety+(21*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)-15);
	$pdf->Cell((2*$offsettab),10,"�ѹ���_____________________  ",0,0,"C");
	$pdf->SetY($offsety+(19*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)-15);
	$pdf->Cell((2*$offsettab),10,"ŧ���ͼ���Ѻ�Թ_____________________  ",0,0,"C");
	$pdf->SetY($offsety+(19*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab)-5);
	$pdf->Cell((2*$offsettab),10,"ŧ���ͼ������Թ_____________________  ",0,0,"C");
	$pdf->SetY($offsety+(21*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab)-5);
	$pdf->Cell((2*$offsettab),10,"�ѹ���_____________________  ",0,0,"C");

}}

$pdf->Output("./pdf/doc.pdf");

?>
<? ob_end_flush();?>
<meta content="0;URl=./pdfshow.php" http-equiv="refresh" />
