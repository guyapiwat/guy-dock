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
	
	?><table width="300" align="center" bgcolor="#990000"><tr><td align="center">��辺�����Ţͧ����Ţ��� <?=$sano?>
	<br /><input type="button" value="�Դ˹�ҹ��" onClick="window.close()" /></td></tr></table><?
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
	$pdf->Cell((4*$offsettab),10,"����ѷ $employee_name",0,0,"L"); 
	$pdf->SetY($offsety+2*$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell((4*$offsettab),10,$wording_lan["company_address"],0,0,"L"); 
	$pdf->SetY($offsety+3*$offsetnline);
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell((4*$offsettab),10,$wording_lan["company_phone"],0,0,"L"); 
	
	$pdf->SetFont('angsa','',10); 
	
	//$pdf->SetY($offsety+$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+5);
	//$pdf->Cell($offsettab,10,"��Ѻ�Թ",1,0,"C"); 
	//$pdf->SetY($offsety+3*$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+5);
	//$pdf->Cell($offsettab,10,"(�͡����͡�繪ش)",0,0,"C"); 
	
	//$pdf->SetY($offsety+(6*$offsetnline));
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell((2*$offsettab),10,"�Ţ��Шӵ�Ǽ�����������ҡ�",0,0,"L"); 
	
	$pdf->SetY($offsety+(5*$offsetnline)-2);
	$pdf->SetX($offsetx+(4*$offsettab));
	$pdf->Cell((4*$offsettab),10,"������Ѻ�Թ / 㺡ӡѺ����",0,0,"C"); 



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
	//-----------------------����繵�
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
	$pdf->Cell((3*$offsettab),10,"�Ţ���........................",0,0,"R"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"������Ҫԡ...............................�ѹ���........................",0,0,"R"); 
	$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+10);
	$pdf->Cell((3*$offsettab),10,"��������........................",0,0,"R"); 
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
	$pdf->Cell((2*$offsettab),10,"����-ʡ�ż���˹��������",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"�Ѵ�觵���������",0,0,"L"); 
	
	//$pdf->SetY($offsety+(7*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell((2*$offsettab),10,"���ͼ���й�",0,0,"L"); 
	
	//$pdf->SetY($offsety+(8*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell((2*$offsettab),10,"����",0,0,"L"); 
//info---------------------------------------
	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(2*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,$name[$mcode[$i]],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell((2*$offsettab),10,$add[$mcode[$i]],0,0,"L"); 

	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(5*$offsettab)+20);
	$pdf->Cell((2*$offsettab),10,"������Ҫԡ",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(5*$offsettab)+20);
	$pdf->Cell((2*$offsettab),10,"���Ѿ��",0,0,"L"); 

	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(6*$offsettab)+20);
	$pdf->Cell((2*$offsettab),10,$mcode[$i],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(6*$offsettab)+20);
	$pdf->Cell((2*$offsettab),10,$home_t[$mcode[$i]],0,0,"L"); 

	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(8*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,"�Ţ�����",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(8*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,"�ѹ���",0,0,"L");

	$pdf->SetY($offsety+(5*$offsetnline)+2);
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,$bill[$i],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell((2*$offsettab),10,"$d-$m-$y",0,0,"L");
	
/*	$pdf->SetY($offsety+(7*$offsetnline)+2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"����˹�������к���ѷ 䪹�� �Թ���������ê�� �ӡѴ	",0,0,"L");
	$pdf->SetY($offsety+(7*$offsetnline)+2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"����˹�������к���ѷ 䪹�� �Թ���������ê�� �ӡѴ	",0,0,"L"); */

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
	$pdf->Cell($offsettab,10,"�ӴѺ",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx-10+(2*$offsettab)+5);
	$pdf->Cell($offsettab,10,"�����Թ���",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(3*$offsettab));
	$pdf->Cell($offsettab,10,"��¡��",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(6*$offsettab));
	$pdf->Cell($offsettab,10,"�ӹǹ/˹���",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab));
	$pdf->Cell($offsettab,10,"�Ҥҵ��/˹���",0,0,"L"); 

	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)+5);
	$pdf->Cell($offsettab,10,"��ṹ",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)+2);
	$pdf->Cell($offsettab,10,"�ӹǹ�Թ�ط��",0,0,"L"); 
	
	//$pdf->SetY($offsety+(21*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell($offsettab,10,"����Ҥ��Թ��ҷ�����������Ť������",0,0,"L"); 
	
	$pdf->SetY($offsety+(21*$offsetnline)+1);
	$pdf->SetX($offsetx+(8*$offsettab)-4);
	$pdf->Cell($offsettab,10,"������Ť������",0,0,"L");
	
	$pdf->SetY($offsety+(22*$offsetnline)+1);
	$pdf->SetX($offsetx+(8*$offsettab)-4);
	$pdf->Cell($offsettab,10,"������Թ������",0,0,"L");
	
	$pdf->SetY($offsety+(20*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell($offsettab,10,"�ӹǹ�Թ������ (",0,0,"L"); 
	$pdf->SetY($offsety+(20*$offsetnline));
	$pdf->SetX($offsetx+(6*$offsettab));
	$pdf->Cell($offsettab,10,")",0,0,"L"); 
	$pdf->SetY($offsety+(20*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab));
	$pdf->Cell($offsettab,10,"������Թ",0,0,"L"); 

	$pdf->SetY($offsety+(26*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+2);
	$pdf->Cell((2*$offsettab),10,"ŧ����....................................................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"����Ѻ�Թ",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"......../......../........",0,0,"C");
	
	$pdf->SetY($offsety+(26*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab)-7);
	$pdf->Cell((2*$offsettab),10,"ŧ����....................................................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab)-7);
	$pdf->Cell((2*$offsettab),10,"���Ѵ���Թ���",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab)-7);
	$pdf->Cell((2*$offsettab),10,"......../......../........",0,0,"C");
	
	$pdf->SetY($offsety+(26*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-16.5);
	$pdf->Cell((2*$offsettab),10,"ŧ����....................................................",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-15);
	$pdf->Cell((2*$offsettab),10,"����Ѻ�Թ���",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-15);
	$pdf->Cell((2*$offsettab),10,"......../......../........",0,0,"C");
	
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"������",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell($offsettab,10,"�Թʴ",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(3*$offsettab));
	$pdf->Cell($offsettab,10,"�ôԵ",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline));
	$pdf->SetX($offsetx+(4*$offsettab));
	$pdf->Cell($offsettab,10,"�͹��Ҥ��..........................................................",0,0,"L");
	
	$pdf->SetY($offsety+(22*$offsetnline)+5);
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"��������",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline)+5);
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell($offsettab,10,"��Ŵ��ʹ",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline)+5);
	$pdf->SetX($offsetx+(3*$offsettab));
	$pdf->Cell($offsettab,10,"�ѡ���ʹ",0,0,"L");
	$pdf->SetY($offsety+(22*$offsetnline)+5);
	$pdf->SetX($offsetx+(4*$offsettab));
	$pdf->Cell($offsettab,10,"�Ţ������١���............................................�/�/�.................................................",0,0,"L");

	$pdf->SetFont('angsa','',8); 
	$pdf->SetY($offsety+(23*$offsetnline)+6);
	$pdf->SetX($offsetx+($offsettab));
	$pdf->Cell($offsettab,10,"��Ҿ������Ѻ��Ե�ѳ�����к�����ҧ�鹾������Ǩ�Ѻ�ӹǹ���Ҿ�������ó����º��������",0,0,"L");
	//$pdf->SetY($offsety+(23*$offsetnline)+1);
	//$pdf->SetX($offsetx+(5*$offsettab));
	//$pdf->Cell($offsettab,10,"��Ҿ������Ѻ��Ե�ѳ�����к�����ҧ�� ��е�Ǩ�ӹǹ���Ҿ�������ó����º��������",0,0,"L");
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
