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
$sql = "SELECT * FROM ".$dbprefix."transfersale_h WHERE id='$sano' ";
$sqlLog1 = "SELECT sys_id,logdate,logtime FROM ".$dbprefix."log  WHERE object ='$sano' and subject = '�������' order by id desc";
$sqlLog2 = "SELECT sys_id,logdate,logtime  FROM ".$dbprefix."log  WHERE object ='$sano' and subject = '��䢺��' order by id desc";

$sql_invent="SELECT * FROM ".$dbprefix."invent  INNER JOIN district ON (".$dbprefix."invent.districtId=district.districtId)
INNER JOIN amphur ON (".$dbprefix."invent.amphurId=amphur.amphurId) 
INNER JOIN province ON (".$dbprefix."invent.provinceId=province.provinceId) WHERE inv_code='LA01'"; 
$result=mysql_query($sql_invent);
	$obj_new = mysql_fetch_object($result);
	$employee_name_new = $obj_new->address.' �ǧ '.$obj_new->districtName;
	$employee_address_new=' ࢵ '.$obj_new->amphurName.' �ѧ��Ѵ '.$obj_new->provinceName;
	$phone1 = '���Ѿ��  '.$obj_new->home_t;
	$phone2 = ' ����� '.$obj_new->fax;
	$tax1 = ' �Ţ������������� '.$obj_new->no_tax;

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
	$bill1[$i]  = $bill[$i] = $obj->id;
	//$bill1[$i] = $obj->sano;
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
	$mobile[$mcode[$i]] = mysql_result($rs2,0,'mobile');
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
	$sql="SELECT * FROM ".$dbprefix."transfersale_d WHERE sano='$bill[$i]' ";
	$rs=mysql_query($sql);
	$npage = ceil(mysql_num_rows($rs)/$nitem);
	mysql_free_result($rs);
	$sum = 0;
	$sumpv = 0;
	for($k=0;$k<$npage;$k++){
	$sql="SELECT * FROM ".$dbprefix."transfersale_d WHERE sano='$bill[$i]' LIMIT ".($k*$nitem).", $nitem ";
	$rs=mysql_query($sql);
	
	$pdf->AddPage(); 
	//$pdf->image("sale_form.jpg",0,0,230);
	
	$pdf->SetTopMargin(0); 
	$pdf->SetRightMargin(10); 
	
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

	
	//   ���ͷ������ �ͧ ����ѷ
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+2*$offsetnline);
	$pdf->SetX($offsetx+5+$offsettab*2);
	$pdf->Cell((4*$offsettab),10,"����ѷ $employee_name",0,0,"L"); 
	$pdf->SetY($offsety+3*$offsetnline);
	$pdf->SetX($offsetx+5+$offsettab*2);
	$pdf->Cell((4*$offsettab),10,"$employee_address ",0,0,"L"); 
	$pdf->SetY($offsety+4*$offsetnline);
	$pdf->SetX($offsetx+5+$offsettab*2);
	$pdf->Cell((4*$offsettab),10,"$phone1",0,0,"L"); 
	
	//   ��駡�ê����Թ
	$pdf->SetFont('angsa','',22); 
	$pdf->SetY($offsety+2*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"��駡�ê����Թ",0,0,"R");
	
	
	$offsety-=18;
	//   ��¡�ê����Թ
	$pdf->SetFont('angsa','U',16); 
	$pdf->SetY($offsety+9*$offsetnline);
	$pdf->SetX($offsetx+($offsettab*6)+10);
	$pdf->Cell((4*$offsettab),10,"��¡�ê����Թ",0,0,"L"); 
	
	$sum=0;
	$fee_ = 0;
			for($j=0;$j<mysql_num_rows($rs);$j++)
			{	
				$obj = mysql_fetch_object($rs);
				$sum += $obj->price*$obj->qty;
				$sumpv += $obj->pv*$obj->qty;
				$sumbv += $obj->bv*$obj->qty;
				$sumfv += $obj->fv*$obj->qty;
				$sumqty += $obj->qty;
				$sumprice += $obj->price;
			}
	
	$pdf->SetFont('angsa','',16); 
	$pdf->SetY($offsety+11*$offsetnline);
	$pdf->SetX($offsetx+($offsettab*6)+12);
	$pdf->Cell((4*$offsettab),10,"����Թ���",0,0,"L");
	$pdf->SetY($offsety+11*$offsetnline);
	$pdf->SetX($offsetx+(6*$offsettab)+20);
	$pdf->Cell((3*$offsettab),10,number_format($sum,2,'.',','),0,0,"R");
	$pdf->SetY($offsety+11*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�ҷ",0,0,"R");	
	
	
	$pdf->SetY($offsety+12*$offsetnline);
	$pdf->SetX($offsetx+($offsettab*6)+12);
	$pdf->Cell((4*$offsettab),10,"��Ҹ�������",0,0,"L");
	$pdf->SetY($offsety+12*$offsetnline);
	$pdf->SetX($offsetx+(6*$offsettab)+20);
	$pdf->Cell((3*$offsettab),10,number_format($fee_,2,'.',','),0,0,"R");
	$pdf->SetY($offsety+12*$offsetnline);
	$pdf->SetX($offsetx+(6*$offsettab)+20);
	$pdf->Cell((3*$offsettab),10,"__________",0,0,"R");
	$pdf->SetY($offsety+12*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�ҷ",0,0,"R");	
	
	$pdf->SetY($offsety+13*$offsetnline);
	$pdf->SetX($offsetx+($offsettab*6)+12);
	$pdf->Cell((4*$offsettab),10,"���",0,0,"L");
	$pdf->SetY($offsety+13*$offsetnline);
	$pdf->SetX($offsetx+(6*$offsettab)+20);
	$pdf->Cell((3*$offsettab),10,number_format($sum+$fee_,2,'.',','),0,0,"R");
	$pdf->SetY($offsety+13*$offsetnline);
	$pdf->SetX($offsetx+(6*$offsettab)+20);
	$pdf->Cell((3*$offsettab),10,"__________",0,0,"R");
	$pdf->SetY($offsety+13*$offsetnline+1);
	$pdf->SetX($offsetx+(6*$offsettab)+20);
	$pdf->Cell((3*$offsettab),10,"__________",0,0,"R");
	$pdf->SetY($offsety+13*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�ҷ",0,0,"R");	
	
	//   ���ͷ������ �ͧ ��Ҫԡ
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+10*$offsetnline);
	$pdf->SetX($offsetx+($offsettab*2));
	$pdf->Cell((4*$offsettab),10,$name[$mcode[$i]],0,0,"L"); 
	$pdf->SetY($offsety+11*$offsetnline+3);
	$pdf->SetX($offsetx+($offsettab*2));
	$pdf->MultiCell((4*$offsettab),5,$add[$mcode[$i]]);
	
	
	$offsety-=3;
	//   �������ǹ��� 1
	$pdf->SetY($offsety+15*$offsetnline+3);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(0,5,"","B",0,"L");
	$offsety+=2;
	//   ��ǹ�ͧ�١���
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+16*$offsetnline+2);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"��ǹ�ͧ�١���",0,0,"R");
	
	//   ���ͺ���ѷ , �Ţ��Шӵ�Ǽ����������  ��ǹ�ͧ�١���
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+17*$offsetnline+3);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((4*$offsettab),10,"����ѷ $employee_name",0,0,"L");
	$pdf->SetY($offsety+18*$offsetnline+3);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((4*$offsettab),10,"�Ţ��Шӵ�Ǽ����������  $tax1",0,0,"L");
	
	//   �ѹ��� , �����١��� , �������Ѿ��  ��ǹ�ͧ�١���
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+17*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�ѹ���/Date ____________________  ",0,0,"R");
	$pdf->SetY($offsety+17*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$sadate,0,0,"R");
	$pdf->SetY($offsety+18*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�����١��� ____________________  ",0,0,"R");
	$pdf->SetY($offsety+18*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$name[$mcode[$i]],0,0,"R");
	$pdf->SetY($offsety+19*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"Tel. ____________________  ",0,0,"R");
	$pdf->SetY($offsety+19*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$mobile[$mcode[$i]],0,0,"R");
	
	//   ��ͺ�����١��� , �Ţ���� , �Ţ�����觢ͧ  ��ǹ�ͧ�١���
	$pdf->SetY($offsety+21*$offsetnline+3);
	$pdf->SetX($offsetx+(6*$offsettab)+10);
	$pdf->Cell((4*$offsettab),30,"",1,0,"L");
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+22*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�����١��� (Ref. 1) _____________________________  ",0,0,"R");
	$pdf->SetY($offsety+22*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$mcode[$i],0,0,"R");
	$pdf->SetY($offsety+23*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�Ţ���� D/P (Ref. 2) ___________________________  ",0,0,"R");
	$pdf->SetY($offsety+23*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$bill[$i],0,0,"R");
	$pdf->SetY($offsety+24*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�Ţ�����觢ͧ (Ref. 3) _________________________  ",0,0,"R");
	$pdf->SetY($offsety+25*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+6);
	$pdf->Cell((3*$offsettab),10,"(Ref. 3  ��Ѻ��Ҥ�á�ا����ҹ��)",0,0,"R");
	
	//  ������Һѭ��  ��ǹ�ͧ�١���  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+21*$offsetnline);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((4*$offsettab),10,"������Һѭ�� ����ѷ  $employee_name",0,0,"L");
	
	$kbank_ = "���. ��Ҥ�á�ԡ��� �Ţ���ѭ�� xxx-x-xxxxx-x / Com.Code: 12345";
	$ayuttaya_ = "���. ��Ҥ�á�ا�����ظ�� �Ţ���ѭ�� xxx-x-xxxxx-x";
	$krungtep_ = "���. ��Ҥ�á�ا෾ Company code : 9876";
	$ktb_ = "���. ��Ҥ�á�ا�� Company code : MDSDDD";
	$scb_ = "���. ��Ҥ���¾ҳԪ�� Company code : SD5789";
	
	$pdf->SetFont('angsa','',12); 
	$pdf->SetY($offsety+22*$offsetnline+3);
	$pdf->SetX($offsetx+$offsettab+2);
	$pdf->Cell(5,5,"",1,0,"L");
	$pdf->Image('../kbank.png',$offsetx+$offsettab+9,$offsety+22*$offsetnline+3,5);
	$pdf->SetY($offsety+22*$offsetnline);
	$pdf->SetX($offsetx+$offsettab+15);
	$pdf->Cell((4*$offsettab),10,"$kbank_",0,0,"L");
	
	$pdf->SetY($offsety+23*$offsetnline+4);
	$pdf->SetX($offsetx+$offsettab+2);
	$pdf->Cell(5,5,"",1,0,"L");
	$pdf->Image('../ayuttaya.png',$offsetx+$offsettab+9,$offsety+23*$offsetnline+4,5);
	$pdf->SetY($offsety+23*$offsetnline+1);
	$pdf->SetX($offsetx+$offsettab+15);
	$pdf->Cell((4*$offsettab),10,"$ayuttaya_",0,0,"L");
	
	$pdf->SetY($offsety+24*$offsetnline+5);
	$pdf->SetX($offsetx+$offsettab+2);
	$pdf->Cell(5,5,"",1,0,"L");
	$pdf->Image('../ktb.png',$offsetx+$offsettab+9,$offsety+24*$offsetnline+5,5);
	$pdf->SetY($offsety+24*$offsetnline+2);
	$pdf->SetX($offsetx+$offsettab+15);
	$pdf->Cell((4*$offsettab),10,"$ktb_",0,0,"L");
	
	$pdf->SetY($offsety+25*$offsetnline+6);
	$pdf->SetX($offsetx+$offsettab+2);
	$pdf->Cell(5,5,"",1,0,"L");
	$pdf->Image('../scb.png',$offsetx+$offsettab+9,$offsety+25*$offsetnline+6,5);
	$pdf->SetY($offsety+25*$offsetnline+3);
	$pdf->SetX($offsetx+$offsettab+15);
	$pdf->Cell((4*$offsettab),10,"$scb_",0,0,"L");
	
	$pdf->SetY($offsety+26*$offsetnline+7);
	$pdf->SetX($offsetx+$offsettab+2);
	$pdf->Cell(5,5,"",1,0,"L");
	$pdf->Image('../krungtep.png',$offsetx+$offsettab+9,$offsety+26*$offsetnline+7,5);
	$pdf->SetY($offsety+26*$offsetnline+4);
	$pdf->SetX($offsetx+$offsettab+15);
	$pdf->Cell((4*$offsettab),10,"$krungtep_",0,0,"L");
	
	
	//   ��ͧ ���´�����
	$pdf->Image('../circle.png',$offsetx+$offsettab+2,$offsety+27*$offsetnline+8,5);
	$pdf->SetY($offsety+27*$offsetnline+5);
	$pdf->SetX($offsetx+$offsettab+9);
	$pdf->Cell(0,10,"�� �����Ţ_____________________________ ��Ҥ��_____________________ �Ң�____________________ŧ�ѹ���_________________",0,0,"L");
	
	// ��ͧ�Թʴ
	$pdf->Image('../circle.png',$offsetx+$offsettab+2,$offsety+28*$offsetnline+8,5);
	$pdf->SetY($offsety+28*$offsetnline+5);
	$pdf->SetX($offsetx+$offsettab+9);
	$pdf->Cell(0,10,"�Թʴ",0,0,"L");
	
	//   ��ͺ�ӹǹ�ҷ
	$pdf->SetY($offsety+29*$offsetnline+5);
	$pdf->SetX($offsetx+(8*$offsettab)+10);
	$pdf->Cell($offsettab*2,7,"",1,0,"R");
	$pdf->SetY($offsety+29*$offsetnline+5);
	$pdf->SetX($offsetx+(8*$offsettab)+10);
	$pdf->Cell($offsettab*2,7,"�ӹǹ�Թ (�ҷ) ",0,0,"C");
	
	$pdf->SetY($offsety+30*$offsetnline+7);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab*7+10,13,"",1,0,"L");
	$pdf->SetY($offsety+31*$offsetnline+10);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab*7,5,"�ӹǹ�Թ�繵���ѡ��",0,0,"C");
	
	$pdf->SetY($offsety+30*$offsetnline+7);
	$pdf->SetX($offsettab*8);
	$pdf->Cell($offsettab*2,13,"",1,0,"L");
	$pdf->SetY($offsety+31*$offsetnline+10);
	$pdf->SetX($offsettab*8);
	$pdf->Cell($offsettab*2,5,"�ӹǹ�Թ�繵���Ţ",0,0,"C");
	
	//   ���˹�ҷ�踹Ҥ��
	$pdf->SetFont('angsa','',14);
	$pdf->SetY($offsety+34*$offsetnline+3);
	$pdf->SetX($offsetx+(6*$offsettab)+10);
	$pdf->Cell((4*$offsettab),10,"���˹�ҷ�踹Ҥ�� __________________________________",0,0,"L");
	
	$pdf->SetFont('angsa','',12);
	$pdf->SetY($offsety+36*$offsetnline+2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(0,5,"���ͤ����дǡ�ͧ��ҹ ��سҹ���駡�ê����Թ����� ���˹�� 仪������� ���. ��Ҥ�á�ԡ��� �ء�Ңҷ��ǻ����",0,0,"C");
	
	$offsety+=2;
	//   �������ǹ�ͧ��Ҥ��
	$pdf->SetY($offsety+36*$offsetnline+2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(0,5,"","B",0,"L");
	
	
	
	
	
	
	$offsety += 106;
	//   ��ǹ�ͧ��Ҥ��
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+16*$offsetnline+2);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"��ǹ�ͧ��Ҥ��",0,0,"R");
	
	//   ���ͺ���ѷ , �Ţ��Шӵ�Ǽ����������  ��ǹ�ͧ��Ҥ��
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+17*$offsetnline+3);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((4*$offsettab),10,"����ѷ $employee_name",0,0,"L");
	$pdf->SetY($offsety+18*$offsetnline+3);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((4*$offsettab),10,"�Ţ��Шӵ�Ǽ����������  $tax1",0,0,"L");
	
	//   �ѹ��� , �����١��� , �������Ѿ��  ��ǹ�ͧ��Ҥ��
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+17*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�ѹ���/Date ____________________  ",0,0,"R");
	$pdf->SetY($offsety+17*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$sadate,0,0,"R");
	$pdf->SetY($offsety+18*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�����١��� ____________________  ",0,0,"R");
	$pdf->SetY($offsety+18*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$name[$mcode[$i]],0,0,"R");
	$pdf->SetY($offsety+19*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"Tel. ____________________  ",0,0,"R");
	$pdf->SetY($offsety+19*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$mobile[$mcode[$i]],0,0,"R");
	
	//   ��ͺ�����١��� , �Ţ���� , �Ţ�����觢ͧ  ��ǹ�ͧ��Ҥ��
	$pdf->SetY($offsety+21*$offsetnline+3);
	$pdf->SetX($offsetx+(6*$offsettab)+10);
	$pdf->Cell((4*$offsettab),30,"",1,0,"L");
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+22*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�����١��� (Ref. 1) _____________________________  ",0,0,"R");
	$pdf->SetY($offsety+22*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$mcode[$i],0,0,"R");
	$pdf->SetY($offsety+23*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�Ţ���� D/P (Ref. 2) ___________________________  ",0,0,"R");
	$pdf->SetY($offsety+23*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$bill[$i],0,0,"R");
	$pdf->SetY($offsety+24*$offsetnline);
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"�Ţ�����觢ͧ (Ref. 3) _________________________  ",0,0,"R");
	$pdf->SetY($offsety+25*$offsetnline+3);
	$pdf->SetX($offsetx+(7*$offsettab)+6);
	$pdf->Cell((3*$offsettab),10,"(Ref. 3  ��Ѻ��Ҥ�á�ا����ҹ��)",0,0,"R");
	
	//  ������Һѭ��  ��ǹ�ͧ��Ҥ��  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$pdf->SetFont('angsa','',14); 
	$pdf->SetY($offsety+21*$offsetnline);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((4*$offsettab),10,"������Һѭ�� ����ѷ  $employee_name",0,0,"L");
	
	$kbank_ = "���. ��Ҥ�á�ԡ��� �Ţ���ѭ�� xxx-x-xxxxx-x / Com.Code: 12345";
	$ayuttaya_ = "���. ��Ҥ�á�ا�����ظ�� �Ţ���ѭ�� xxx-x-xxxxx-x";
	$krungtep_ = "���. ��Ҥ�á�ا෾ Company code : 9876";
	$ktb_ = "���. ��Ҥ�á�ا�� Company code : MDSDDD";
	$scb_ = "���. ��Ҥ���¾ҳԪ�� Company code : SD5789";
	
	$pdf->SetFont('angsa','',12); 
	$pdf->SetY($offsety+22*$offsetnline+3);
	$pdf->SetX($offsetx+$offsettab+2);
	$pdf->Cell(5,5,"",1,0,"L");
	$pdf->Image('../kbank.png',$offsetx+$offsettab+9,$offsety+22*$offsetnline+3,5);
	$pdf->SetY($offsety+22*$offsetnline);
	$pdf->SetX($offsetx+$offsettab+15);
	$pdf->Cell((4*$offsettab),10,"$kbank_",0,0,"L");
	
	$pdf->SetY($offsety+23*$offsetnline+4);
	$pdf->SetX($offsetx+$offsettab+2);
	$pdf->Cell(5,5,"",1,0,"L");
	$pdf->Image('../ayuttaya.png',$offsetx+$offsettab+9,$offsety+23*$offsetnline+4,5);
	$pdf->SetY($offsety+23*$offsetnline+1);
	$pdf->SetX($offsetx+$offsettab+15);
	$pdf->Cell((4*$offsettab),10,"$ayuttaya_",0,0,"L");
	
	$pdf->SetY($offsety+24*$offsetnline+5);
	$pdf->SetX($offsetx+$offsettab+2);
	$pdf->Cell(5,5,"",1,0,"L");
	$pdf->Image('../ktb.png',$offsetx+$offsettab+9,$offsety+24*$offsetnline+5,5);
	$pdf->SetY($offsety+24*$offsetnline+2);
	$pdf->SetX($offsetx+$offsettab+15);
	$pdf->Cell((4*$offsettab),10,"$ktb_",0,0,"L");
	
	$pdf->SetY($offsety+25*$offsetnline+6);
	$pdf->SetX($offsetx+$offsettab+2);
	$pdf->Cell(5,5,"",1,0,"L");
	$pdf->Image('../scb.png',$offsetx+$offsettab+9,$offsety+25*$offsetnline+6,5);
	$pdf->SetY($offsety+25*$offsetnline+3);
	$pdf->SetX($offsetx+$offsettab+15);
	$pdf->Cell((4*$offsettab),10,"$scb_",0,0,"L");
	
	$pdf->SetY($offsety+26*$offsetnline+7);
	$pdf->SetX($offsetx+$offsettab+2);
	$pdf->Cell(5,5,"",1,0,"L");
	$pdf->Image('../krungtep.png',$offsetx+$offsettab+9,$offsety+26*$offsetnline+7,5);
	$pdf->SetY($offsety+26*$offsetnline+4);
	$pdf->SetX($offsetx+$offsettab+15);
	$pdf->Cell((4*$offsettab),10,"$krungtep_",0,0,"L");
	
	
	//   ��ͧ ���´�����
	$pdf->Image('../circle.png',$offsetx+$offsettab+2,$offsety+27*$offsetnline+8,5);
	$pdf->SetY($offsety+27*$offsetnline+5);
	$pdf->SetX($offsetx+$offsettab+9);
	$pdf->Cell(0,10,"�� �����Ţ_____________________________ ��Ҥ��_____________________ �Ң�____________________ŧ�ѹ���_________________",0,0,"L");
	
	// ��ͧ�Թʴ
	$pdf->Image('../circle.png',$offsetx+$offsettab+2,$offsety+28*$offsetnline+8,5);
	$pdf->SetY($offsety+28*$offsetnline+5);
	$pdf->SetX($offsetx+$offsettab+9);
	$pdf->Cell(0,10,"�Թʴ",0,0,"L");
	
	//   ��ͺ�ӹǹ�ҷ
	$pdf->SetY($offsety+29*$offsetnline+5);
	$pdf->SetX($offsetx+(8*$offsettab)+10);
	$pdf->Cell($offsettab*2,7,"",1,0,"R");
	$pdf->SetY($offsety+29*$offsetnline+5);
	$pdf->SetX($offsetx+(8*$offsettab)+10);
	$pdf->Cell($offsettab*2,7,"�ӹǹ�Թ (�ҷ) ",0,0,"C");
	
	$pdf->SetY($offsety+30*$offsetnline+7);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab*7+10,13,"",1,0,"L");
	$pdf->SetY($offsety+31*$offsetnline+10);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab*7,5,"�ӹǹ�Թ�繵���ѡ��",0,0,"C");
	
	$pdf->SetY($offsety+30*$offsetnline+7);
	$pdf->SetX($offsettab*8);
	$pdf->Cell($offsettab*2,13,"",1,0,"L");
	$pdf->SetY($offsety+31*$offsetnline+10);
	$pdf->SetX($offsettab*8);
	$pdf->Cell($offsettab*2,5,"�ӹǹ�Թ�繵���Ţ",0,0,"C");
	
	//   ���˹�ҷ�踹Ҥ��
	$pdf->SetFont('angsa','',14);
	$pdf->SetY($offsety+34*$offsetnline+3);
	$pdf->SetX($offsetx+(6*$offsettab)+10);
	$pdf->Cell((4*$offsettab),10,"���˹�ҷ�踹Ҥ�� __________________________________",0,0,"L");
	
	$pdf->SetFont('angsa','',12);
	$pdf->SetY($offsety+36*$offsetnline+2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(0,5,"���ͤ����дǡ�ͧ��ҹ ��سҹ���駡�ê����Թ����� ���˹�� 仪������� ���. ��Ҥ�á�ԡ��� �ء�Ңҷ��ǻ����",0,0,"C");
	
	
}}
$pdf->Output("./pdf/doc.pdf");

?>
<? ob_end_flush();?>
<meta content="0;URl=./pdfshow.php" http-equiv="refresh" />
