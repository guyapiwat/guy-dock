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

//$pdf->image("������ҧ��ʹ��Ҥ�.jpg",0,0,210);

$offsetx=0;
$offsety=0;
$lh=6.5;

//////////////////////////////////////////////////////////////////
//��ҹ�ҹ������

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
		// ��ҹ��������´
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
		//echo "�Դ��ͼԴ��Ҵ ��辺������ ����ͧ���";
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
$company_name="����ѷ �������� �ӡѴ ALISIO CO., LTD.";
$company_logo="./images/alisio_logo_02.jpg";
$company_address="54/70 ���� 6 ��ªԹࢵ 2/38 �ǧ����ͧ��ͧ ࢵ��ѡ��� ��ا෾� 10210";
$company_tel="��. 02-954-8087, 02-954-8880 ����� 02-954-8086";
$company_taxid="�Ţ��Шӵ�Ǽ���������� 3-0315-0232-1";
$doc_name="��ʹ��Ҥ� / Quotation";

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

//����ѷ-����
$pdf->SetY($offsety+6);
$pdf->SetX($offsetx+75);
$pdf->Cell(40,10,$company_name,0,0,"L"); 

//����ѷ-����
$pdf->image($company_logo,183,7,15);

$pdf->SetFont('tahoma','',10); 

//����ѷ-�������
$pdf->SetY($offsety+6+($lh));
$pdf->SetX($offsetx+75);
$pdf->Cell(40,10,$company_address,0,0,"L"); 

//����ѷ-��/�����
$pdf->SetY($offsety+6+(2*$lh));
$pdf->SetX($offsetx+75);
$pdf->Cell(40,10,$company_tel,0,0,"L"); 

//����ѷ-�Ţ��Шӵ�Ǽ����������
$pdf->SetY($offsety+6+(3*$lh));
$pdf->SetX($offsetx+75);
$pdf->Cell(40,10,$company_taxid,0,0,"L"); 

////////////////////////////////////////
//��ͺ-��ʹ��Ҥ�
$pdf->SetFont('tahomabd','',14); 
$pdf->SetY($offsety+35);
$pdf->SetX($offsetx+125);
$pdf->Cell(40,10,$doc_name,0,0,"L"); 

$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+105, $offsety+35, 93, 9);

////////////////////////////////////////
//��ͺ-�١���
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12, $offsety+44, 93, $lh*6);

$pdf->SetFont('tahoma','',10); 

//���¹
$pdf->SetY($offsety+42);
$pdf->SetX($offsetx+12+1);
$pdf->Cell(40,10,"���¹",0,0,"L"); 

//cus_contact
$pdf->SetY($offsety+42);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(40,10,"$cus_contact",0,0,"L"); 

//�١��� - ����ѷ
$pdf->SetY($offsety+42+$lh);
$pdf->SetX($offsetx+12+1);
$pdf->Cell(40,10,"����ѷ",0,0,"L"); 

//cus_name
$pdf->SetY($offsety+42+$lh);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(40,10,"$cus_name",0,0,"L"); 

//�١��� - �������
$pdf->SetY($offsety+42+$lh*2);
$pdf->SetX($offsetx+12+1);
$pdf->Cell(40,10,"������",0,0,"L"); 

//cus_addr1
$pdf->SetY($offsety+42+$lh*2);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(40,10,"$cus_addr1",0,0,"L"); 

//cus_addr cus_province cus_zip
$pdf->SetY($offsety+42+$lh*3);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(40,10,"$cus_addr2 $cus_province $cus_zip",0,0,"L"); 

//�١��� - ��
$pdf->SetY($offsety+42+$lh*4);
$pdf->SetX($offsetx+12+1);
$pdf->Cell(40,10,"��",0,0,"L"); 

//cus_tel
$pdf->SetY($offsety+42+$lh*4);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(40,10,"$cus_tel",0,0,"L"); 

//�١��� - �����
$pdf->SetY($offsety+42+$lh*5);
$pdf->SetX($offsetx+12+1);
$pdf->Cell(40,10,"$�����",0,0,"L"); 

//cus_fax
$pdf->SetY($offsety+42+$lh*5);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(40,10,"$cus_fax",0,0,"L"); 

//��ͺ-�١���-��ǫ���
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+44, 20, $lh*6);

//��ͺ-�١���-���¹
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+44, 93, $lh*2);

//��ͺ-�١���-�������
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+44, 93, $lh*2);

//��ͺ-�١���-��
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+44+$lh*4, 93, $lh);

//��ͺ-�١���-�����
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+44+$lh*5, 93, $lh);

////////////////////////////////////////
//��ͺ-��ʹ��Ҥ�-��������´
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+105, $offsety+44, 93, $lh*6);

//�Ţ���
$pdf->SetY($offsety+42);
$pdf->SetX($offsetx+105+1);
$pdf->Cell(40,10,"�Ţ���",0,0,"L"); 

//qno
$pdf->SetY($offsety+42);
$pdf->SetX($offsetx+105+1+30);
$pdf->Cell(40,10,"$qno",0,0,"L"); 

//�ѹ���
$pdf->SetY($offsety+42+$lh);
$pdf->SetX($offsetx+105+1);
$pdf->Cell(40,10,"�ѹ���",0,0,"L"); 

//qdate
$pdf->SetY($offsety+42+$lh);
$pdf->SetX($offsetx+105+1+30);
$pdf->Cell(40,10,"$qdate",0,0,"L"); 

//��˹��׹�Ҥ�
$pdf->SetY($offsety+42+$lh*2);
$pdf->SetX($offsetx+105+1);
$pdf->Cell(40,10,"��˹��׹�Ҥ�",0,0,"L"); 

//qvalid
$pdf->SetY($offsety+42+$lh*2);
$pdf->SetX($offsetx+105+1+30);
$pdf->Cell(40,10,"$qvalid",0,0,"L"); 

//��˹����ͺ
$pdf->SetY($offsety+42+$lh*3);
$pdf->SetX($offsetx+105+1);
$pdf->Cell(40,10,"��˹����ͺ",0,0,"L"); 

//qdelivery
$pdf->SetY($offsety+42+$lh*3);
$pdf->SetX($offsetx+105+1+30);
$pdf->Cell(40,10,"$qdelivery",0,0,"L"); 

//���͹䢪����Թ
$pdf->SetY($offsety+42+$lh*4);
$pdf->SetX($offsetx+105+1);
$pdf->Cell(40,10,"���͹䢪����Թ",0,0,"L"); 

//qpayterm
$pdf->SetY($offsety+42+($lh*4)+2);
$pdf->SetX($offsetx+105+1+30);
$pdf->MultiCell(60,5,$qpayterm,0,"L");
//Cell(40,10,"$qpayterm",0,0,"L"); 

//��ͺ-��ʹ��Ҥ�-��ǫ���
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+105, $offsety+44, 30, $lh*6);

//��ͺ-�Ţ���
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+105, $offsety+44, 93, $lh);

//��ͺ-�ѹ���
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+105, $offsety+44+$lh, 93, $lh);

//��ͺ-��˹��׹�Ҥ�
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+105, $offsety+44+$lh*2, 93, $lh);

//��ͺ-��˹����ͺ
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+105, $offsety+44+$lh*3, 93, $lh);

//��ͺ-���͹䢡�ê����Թ
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+105, $offsety+44+$lh*4, 93, $lh*2);

///////////////////////////////////////
//��ͺ-��¡��
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12, $offsety+87, 93*2, $lh*21);

//��ͺ-��¡��-�����¡��
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12, $offsety+87, 93*2, $lh);

//�ӴѺ
$pdf->SetY($offsety+85);
$pdf->SetX($offsetx+12+1);
$pdf->Cell(40,10,"�ӴѺ",0,0,"L"); 

//��ͺ-��¡��-�ӴѺ
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+87, 20, $lh*21);

//��ͺ-��¡��-��¡��
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+87, 111, $lh*21);

//��¡��
$pdf->SetY($offsety+85);
$pdf->SetX($offsetx+12+1+20);
$pdf->Cell(91,10,"��¡��",0,0,"C"); 

//��ͺ-��¡��-�Ҥҵ��˹���
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+87, 136, $lh*21);

//�Ҥҵ��˹���
$pdf->SetY($offsety+85);
$pdf->SetX($offsetx+12+1+111);
$pdf->Cell(25,10,"�Ҥҵ��˹���",0,0,"C"); 

//��ͺ-��¡��-�ӹǹ˹���
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+87, 161, $lh*21);

//�Ҥҵ��˹���
$pdf->SetY($offsety+85);
$pdf->SetX($offsetx+12+1+136);
$pdf->Cell(25,10,"�ӹǹ",0,0,"C"); 

//�ӹǹ�Թ
$pdf->SetY($offsety+85);
$pdf->SetX($offsetx+12+1+161);
$pdf->Cell(25,10,"�ӹǹ�Թ",0,0,"C"); 

//////////////////////////////////////////////
// ��¡��-��������´ �Թ���
for($i=0;$i<$max_item;$i++){

	if ($itemdesc[$i]<>""){
	//�ӴѺ
	$pdf->SetY($offsety+85+$lh*($i+1));
	$pdf->SetX($offsetx+12+1);
	$pdf->Cell(40,10,$itemno[$i],0,0,"L"); 

	//��¡�� �Թ���
	$pdf->SetY($offsety+85+$lh*($i+1));
	$pdf->SetX($offsetx+12+1+20);
	$pdf->Cell(91,10,$itemdesc[$i],0,0,"L"); 

	if($unitprice[$i]==0){$unitprice[$i]="";}else{$unitprice[$i]=MoneyFormat($unitprice[$i]);}
	if($qty[$i]==0){$qty[$i]="";}else{$qty[$i]=MoneyFormat($qty[$i]);}
	if($amt[$i]==0){$amt[$i]="";}else{$amt[$i]=MoneyFormat($amt[$i]);}
	//�Ҥҵ��˹���
	$pdf->SetY($offsety+85+$lh*($i+1));
	$pdf->SetX($offsetx+12+1+111);
	$pdf->Cell(24,10,$unitprice[$i],0,0,"R"); 

	//�Ҥҵ��˹���
	$pdf->SetY($offsety+85+$lh*($i+1));
	$pdf->SetX($offsetx+12+1+136);
	$pdf->Cell(24,10,$qty[$i],0,0,"R"); 

	//�ӹǹ�Թ
	$pdf->SetY($offsety+85+$lh*($i+1));
	$pdf->SetX($offsetx+12+1+161);
	$pdf->Cell(24,10,$amt[$i],0,0,"R"); 
	}

}



//////////////////////////////////////////////
//��ͺ-�����˵�
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12, $offsety+87+$lh*21, 111, $lh*5);

//�����˵�
$pdf->SetY($offsety+85+$lh*21);
$pdf->SetX($offsetx+12+2);
$pdf->Cell(40,10,"�����˵�",0,0,"L"); 

//remark
$pdf->SetY($offsety+85+$lh*22+1);
$pdf->SetX($offsetx+12+2+4);
$pdf->MultiCell(90,5,$remark,0,"L");
//$pdf->Cell(40,10,"$remark",0,0,"L"); 

//��ͺ-����ѡ��
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+87+$lh*25, 111, $lh);

//����ѡ��
//$pdf->SetY($offsety+85+$lh*25);
//$pdf->SetX($offsetx+12+2);
//$pdf->Cell(40,10,"����ѡ��",0,0,"L"); 

//totaltext
$pdf->SetY($offsety+85+$lh*25);
$pdf->SetX($offsetx+12+2);
$pdf->Cell(40,10,"$totaltext",0,0,"L"); 

//��ͺ-����Թ
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12+111, $offsety+87+$lh*21, 75, $lh*5);

//��ͺ-����Թ-���
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12+111+50, $offsety+87+$lh*21, 25, $lh*5);

//��ͺ-����Ҥ��Թ���
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12+111, $offsety+87+$lh*21, 75, $lh);

$pdf->SetFont('tahoma','',10); 

$msg="����Ҥ��Թ���";
$pdf->SetY($offsety+85+$lh*21);
$pdf->SetX($offsetx+12+111+1);
$pdf->Cell(20,10,$msg,0,0,"L"); 

$msg=MoneyFormat($subtotal);
$pdf->SetY($offsety+85+$lh*21);
$pdf->SetX($offsetx+12+111+55);
$pdf->Cell(20,10,$msg,0,0,"R"); 

//��ͺ-��ǹŴ
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12+111, $offsety+87+$lh*22, 75, $lh);

$msg="��ǹŴ";
$pdf->SetY($offsety+85+$lh*22);
$pdf->SetX($offsetx+12+111+1);
$pdf->Cell(20,10,$msg,0,0,"L"); 

$msg=MoneyFormat($discount);
$pdf->SetY($offsety+85+$lh*22);
$pdf->SetX($offsetx+12+111+55);
$pdf->Cell(20,10,$msg,0,0,"R"); 

//��ͺ-�ӹǹ�Թ�ѡ��ǹŴ
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12+111, $offsety+87+$lh*23, 75, $lh);

$msg="�ӹǹ�Թ�ѡ��ǹŴ";
$pdf->SetY($offsety+85+$lh*23);
$pdf->SetX($offsetx+12+111+1);
$pdf->Cell(20,10,$msg,0,0,"L"); 

$msg=MoneyFormat($after_disc);
$pdf->SetY($offsety+85+$lh*23);
$pdf->SetX($offsetx+12+111+55);
$pdf->Cell(20,10,$msg,0,0,"R"); 

//��ͺ-������Ť������ 7%
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12+111, $offsety+87+$lh*24, 75, $lh);

$msg="������Ť������ 7%";
$pdf->SetY($offsety+85+$lh*24);
$pdf->SetX($offsetx+12+111+1);
$pdf->Cell(20,10,$msg,0,0,"L"); 

$msg=MoneyFormat($vat);
$pdf->SetY($offsety+85+$lh*24);
$pdf->SetX($offsetx+12+111+55);
$pdf->Cell(20,10,$msg,0,0,"R"); 

//��ͺ-����Թ������
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12+111, $offsety+87+$lh*25, 75, $lh);

$msg="����Թ������";
$pdf->SetY($offsety+85+$lh*25);
$pdf->SetX($offsetx+12+111+1);
$pdf->Cell(20,10,$msg,0,0,"L"); 

$msg=MoneyFormat($total);
$pdf->SetY($offsety+85+$lh*25);
$pdf->SetX($offsetx+12+111+55);
$pdf->Cell(20,10,$msg,0,0,"R"); 

//��ͺ-����ʹ��Ҥ�-͹��ѵ�
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12, $offsety+87+$lh*26, 93*2, $lh*5);

//��ͺ-����ʹ��Ҥ�
$pdf->SetLineWidth(0.2);
$pdf->Rect($offsetx+12, $offsety+87+$lh*26, 56, $lh*5);

$msg="ŧ����";
$pdf->SetY($offsety+85+$lh*28-2);
$pdf->SetX($offsetx+12+2);
$pdf->Cell(20,10,$msg,0,0,"L"); 
$pdf->Line($offsetx+12+2+10, $offsety+85+$lh*28+4, $offsetx+12+2+5+40, $offsety+85+$lh*28+4);

$msg="����ʹ��Ҥ�";
$pdf->SetY($offsety+85+$lh*29-2);
$pdf->SetX($offsetx+12+2+10);
$pdf->Cell(35,10,$msg,0,0,"C"); 

$msg="�ѹ���";
$pdf->SetY($offsety+85+$lh*30-3);
$pdf->SetX($offsetx+12+2);
$pdf->Cell(20,10,$msg,0,0,"L"); 
$pdf->Line($offsetx+12+2+9, $offsety+85+$lh*30+3, $offsetx+12+2+5+40, $offsety+85+$lh*30+3);

//��ͺ-������ӹҨ

$msg="ŧ����";
$pdf->SetY($offsety+85+$lh*28-2);
$pdf->SetX($offsetx+12+2+55);
$pdf->Cell(20,10,$msg,0,0,"L"); 
$pdf->Line($offsetx+12+2+10+55, $offsety+85+$lh*28+4, $offsetx+12+2+5+55+40, $offsety+85+$lh*28+4);

$msg="���͹��ѵ�";
$pdf->SetY($offsety+85+$lh*29-2);
$pdf->SetX($offsetx+12+2+10+55);
$pdf->Cell(35,10,$msg,0,0,"C"); 

$msg="�ѹ���";
$pdf->SetY($offsety+85+$lh*30-3);
$pdf->SetX($offsetx+12+2+55);
$pdf->Cell(20,10,$msg,0,0,"L"); 
$pdf->Line($offsetx+12+2+10+54, $offsety+85+$lh*30+3, $offsetx+12+2+5+55+40, $offsety+85+$lh*30+3);

//��ͺ-���͹��ѵ���觫���
$pdf->SetLineWidth(0.5);
$pdf->Rect($offsetx+12+56+55, $offsety+87+$lh*26, 75, $lh*5);

$msg="(͹��ѵ���觫�����)";
$pdf->SetY($offsety+85+$lh*26);
$pdf->SetX($offsetx+12+56+55+2);
$pdf->Cell(20,10,$msg,0,0,"L"); 

$msg="ŧ����";
$pdf->SetY($offsety+85+$lh*28-2);
$pdf->SetX($offsetx+12+56+55+2);
$pdf->Cell(20,10,$msg,0,0,"L"); 
$pdf->SetLineWidth(0.2);
$pdf->Line($offsetx+12+56+55+2+10, $offsety+85+$lh*28+4, $offsetx+12+56+55+2+5+52, $offsety+85+$lh*28+4);

$msg="���˹�";
$pdf->SetY($offsety+85+$lh*29-2);
$pdf->SetX($offsetx+12+56+55+2);
$pdf->Cell(35,10,$msg,0,0,"L"); 
$pdf->Line($offsetx+12+56+55+2+14, $offsety+85+$lh*29+3.5, $offsetx+12+56+55+2+5+52, $offsety+85+$lh*29+3.5);

$msg="�ѹ���";
$pdf->SetY($offsety+85+$lh*30-3);
$pdf->SetX($offsetx+12+56+55+2);
$pdf->Cell(20,10,$msg,0,0,"L"); 
$pdf->Line($offsetx+12+56+55+2+8, $offsety+85+$lh*30+3, $offsetx+12+56+55+2+5+52, $offsety+85+$lh*30+3);
$pdf->Output(); 

?>