<? 
session_start();
if($_SESSION["usercode"]!=''){
header('Content-type: application/pdf'); 
?>
<? include("../backoffice/connectmysql.php");?>
<? include("../function/function_pos.php");?>
<? include("money2text.php");?>
<? include("inc.wording.php");?>
<? ob_start();?>
<?
if(isset($_GET['bid']))
    $id = $_GET['bid'];
    $dbprefix = "ali_";
    $cmc = $_GET["cmc"];
    $employee_name = $wording_lan["company_name"]; 
	$wherexx = findBills("id","ali_asaleh",$id);
?>
<?
 
$sql = "SELECT *,".$dbprefix."asaleh.id as isis,".$dbprefix."asaleh.uid as uidd FROM ".$dbprefix."asaleh ";
$sql .= " LEFT JOIN district ON (".$dbprefix."asaleh.cdistrictId=district.districtId)";
$sql .= " LEFT JOIN amphur ON (".$dbprefix."asaleh.camphurId=amphur.amphurId)";
$sql .= " LEFT JOIN province ON (".$dbprefix."asaleh.cprovinceId=province.provinceId)   ";
$sql .= " LEFT JOIN ".$dbprefix."invent ON (".$dbprefix."asaleh.inv_code=".$dbprefix."invent.inv_code) WHERE $wherexx 
 and ( ".$dbprefix."asaleh.mcode = '".$cmc."' or ".$dbprefix."asaleh.uid = '".$_SESSION["usercode"]."' )
 ";
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
    $bill[$i] = $obj->isis;
    $sano[$i] = $obj->sano;
    $mcode[$i] = $obj->mcode;
    $uid[$i] = $obj->uidd;
    $refer[$i] = $obj->ref;
    $selectqq = "select * from ".$dbprefix."user where usercode = '$uid[$i]' ";
    $query = mysql_query($selectqq);
    $objse = mysql_fetch_object($query);
    //$uid[$i] = $objse->username;    
    $sa_type[$i] = $obj->sa_type;
    $pv[$i] = $obj->tot_pv;
    $sadate[$i] = $obj->sadate;
    //$sadate = explode('-',$sadate[$i]);
    //$sadate = $sadate[2].'-'.$sadate[1].'-'.$sadate[0];
    $txtoption[$i] = $obj->txtoption;
    $remark[$i] = $obj->remark;
    //if(!empty($txtoption[$i]))
    $send[$i] = $obj->send;
    if($send[$i] == '1')$send[$i] = '';else $send[$i]  = "";
    $chkCash[$i] = $obj->chkCash;
    $chkFuture[$i] = $obj->chkFuture;
    $chkTransfer[$i] = $obj->chkTransfer;
    $chkCredit1[$i] = $obj->chkCredit1;
    $chkCredit2[$i] = $obj->chkCredit2;
    $chkCredit3[$i] = $obj->chkCredit3;
    $inv_code[$i] = $obj->inv_code;
    if(empty($inv_code[$i]))$inv_code[$i] = 'Head Office';

    $add[$mcode[$i]] = $obj->caddress;
    $add[$mcode[$i]] .= $obj->cdistrictId==""?"":" ต.".$obj->cdistrictId;
    $add[$mcode[$i]] .= $obj->camphurId==""?"":" อ.".$obj->camphurId;
    $add[$mcode[$i]] .= $obj->cprovinceId==""?"":" จ.".$obj->cprovinceId;
    $add[$mcode[$i]] .= " ".$obj->czip;



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
    $txtInternet[$i] = $obj->txtInternet;
    $txtCredit1[$i] = $obj->txtCredit1;
    $txtCredit2[$i] = $obj->txtCredit2;
    $txtCredit3[$i] = $obj->txtCredit3;
    $txtOther[$i] = $obj->txtOther;
    $optionCash[$i] = $obj->optionCash;
    $optionFuture[$i] = $obj->optionFuture;
    $optionTransfer[$i] = $obj->optionTransfer;
    $optionInternet[$i] = $obj->optionInternet;
    $optionCredit1[$i] = $obj->optionCredit1;
    $optionCredit2[$i] = $obj->optionCredit2;
    $optionCredit3[$i] = $obj->optionCredit3;
    $optionOther[$i] = $obj->optionOther;
    
     /////////////////// vet /////////////// 
    $total_vat[$i] = $obj->total_vat;
    $total_invat[$i] = $obj->total_invat;
   /////////////////// vet /////////////// 
    
    if($refer[$i]!=""){
    $sql="SELECT name_t FROM ali_member WHERE mcode='$refer[$i]'";
    //echo $sql;
        $rs=mysql_query($sql);
        if(mysql_num_rows($rs)>0){
            $name_ref = mysql_result($rs,0,'name_t');
        }else{
            $name_ref="";
        }
    }else{
        $name_ref="";
    }

    $txtAllCredit[$i] = $txtCredit1[$i]+$txtCredit2[$i]+$txtCredit3[$i]; 
    $txtShow[$i] = ""; 
    $kk = 0;
    $set_payment = query("*",'ali_payment ash '," 1=1 and shows = 1 "); 
    foreach($set_payment as $key => $val):
        $text = 'txt'.$val['payment_column'];
        $option = 'option'.$val['payment_column'];
        $select = 'select'.$val['payment_column'];
        $chk_payment = query(" {$text},{$option},{$select} ",'ali_asaleh ash '," ash.{$text} > 0 and ash.id = '{$id}' "); 
        if(count($chk_payment)){ 
            $select_payment = query(" pay_desc,pm.payment_name ",'ali_payment_type pmt '," pmt.id = '{$chk_payment[0][$select]}' ","LEFT JOIN ali_payment pm ON(pm.id = pmt.payment_id)");  
            $textshows[$kk]['text'] = $select_payment[0]['payment_name']; 
			if(empty($textshows[$kk]['text']))$textshows[$kk]['text'] = $val['payment_name'];
            $textshows[$kk]['total'] = $chk_payment[0][$text];
            if($chk_payment[0][$option])$textshows[$kk]['option'] =  "(".$chk_payment[0][$option].")";
            $textshows[$kk]['select'] =  $select_payment[0]['pay_desc']; 
            $kk++;
		}
    endforeach;

	//exit;

	//var_dump($set_payment);
	//exit;
 
    $sql2 = "SELECT * FROM ".$dbprefix."member m ";
    $sql2 .= "LEFT JOIN district ON (m.districtId=district.districtId)";
    $sql2 .= "LEFT JOIN amphur ON (m.amphurId=amphur.amphurId)";
    $sql2 .= "LEFT JOIN province ON (m.provinceId=province.provinceId)";
    $sql2 .= "WHERE m.mcode='".$mcode[$i]."' LIMIT 1 ";
    
    $rs2 = mysql_query($sql2);
	if(mysql_num_rows($rs2)>0){
		$id_card[$mcode[$i]] = mysql_result($rs2,0,'id_card');
		$name[$mcode[$i]] = mysql_result($rs2,0,'name_t');
		$sp_code[$mcode[$i]] = mysql_result($rs2,0,'sp_code');
		$sp_name[$mcode[$i]] = mysql_result($rs2,0,'sp_name');
		$mobile = mysql_result($rs2,0,'mobile');
		if($send[$i] <> "1"){
			$districtId=mysql_result($rs2,0,'districtId');
			$amphurId=mysql_result($rs2,0,'amphurId');
			$provinceId=mysql_result($rs2,0,'provinceId');
			$districtName=mysql_result($rs2,0,'districtName');
			$amphurName=mysql_result($rs2,0,'amphurName');
			$provinceName=mysql_result($rs2,0,'provinceName');

			$add[$mcode[$i]]=mysql_result($rs2,0,'address');
			$add[$mcode[$i]].= $districtName==""?" ต.".$districtId."":" ต.".$districtName;
			$add[$mcode[$i]].= $amphurName==""?" อ.".$amphurId."":" อ.".$amphurName;
			$add[$mcode[$i]].= $provinceName==""?" จ.".$provinceId."":" จ.".$provinceName;
			$add[$mcode[$i]].=mysql_result($rs2,0,'zip');

		}
	}
    mysql_free_result($rs2);


    $sql2 = "SELECT * FROM ".$dbprefix."member ";
    $sql2 .= "WHERE mcode='".$uid[$i]."' LIMIT 1 ";

    $rs2 = mysql_query($sql2);
    if(mysql_num_rows($rs2)>0){
    $uid_name[$i] = mysql_result($rs2,0,'name_t');
    mysql_free_result($rs2);
    }
}
list($y,$m,$d) = explode('-',date("Y-m-d"));
mysql_free_result($rs);
define('FPDF_FONTPATH','../backoffice/fpdf/font/'); 
require('../backoffice/fpdf/fpdf.php'); 
$pdf=new FPDF('P','mm','A4');

$pdf->AddFont('angsa','','angsa.php'); 
$rem = 0;
$nitem = 12;
for($i=0;$i<sizeof($bill);$i++){
    $sql="SELECT * FROM ".$dbprefix."asaled WHERE sano='$bill[$i]' ";

    $rs=mysql_query($sql);
	
	
	$ddddd = testxx($rs)+mysql_num_rows($rs);
	
	
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
    
    $offsetx=0;
    $offsety=0;
    $offsettab = 19;
    $offsetnline = 4;
    
    $pdf->SetFont('angsa','',14); 
    //$logo = "./Logo.jpg";
    $pdf->SetY($offsety+$offsetnline+5);
    $pdf->SetX($offsetx+$offsettab);
    $pdf->Cell($offsettab,10,$logo,0,0,"L"); 
    $pdf->Image('../logo.jpg',$offsetx+$offsettab-10,$offsety+$offsetnline,20); //file,x,y,w=0,h=0

    $pdf->SetFont('angsa','',12); 
    
    $pdf->SetY($offsety+$offsetnline);
    $pdf->SetX($offsetx+(2*$offsettab)+5);
    $pdf->Cell((4*$offsettab),10,"$employee_name",0,0,"L"); 
    $pdf->SetY($offsety+2*$offsetnline);
    $pdf->SetX($offsetx+(2*$offsettab)+5);
    $pdf->Cell((4*$offsettab),10,$wording_lan["company_address"],0,0,"L"); 
    $pdf->SetY($offsety+3*$offsetnline);
    $pdf->SetX($offsetx+(2*$offsettab)+5);
    $pdf->Cell((4*$offsettab),10,$wording_lan["company_phone"],0,0,"L"); 
    
    $pdf->SetFont('angsa','',14); 
    
    $pdf->SetY($offsety+$offsetnline);
    $pdf->SetX($offsetx+(9*$offsettab)-2);
    $pdf->Cell($offsettab,10,"ใบเสร็จรับเงิน",0,0,"C"); 
    //$pdf->SetY($offsety+3*$offsetnline);
    //$pdf->SetX($offsetx+(9*$offsettab)+5);
    //$pdf->Cell($offsettab,10,"(เอกสารออกเป็นชุด)",0,0,"C"); 
    
    //$pdf->SetY($offsety+(6*$offsetnline));
    //$pdf->SetX($offsetx+$offsettab);
    //$pdf->Cell((2*$offsettab),10,"เลขประจำตัวผู้เสียภาษีอากร",0,0,"L"); 
    
    //$pdf->SetY($offsety+(5*$offsetnline));
    //$pdf->SetX($offsetx+(4*$offsettab));
    //$pdf->Cell((3*$offsettab),10,"ใบรับเงิน/ใบรับสินค้า",0,0,"C"); 
    //$pdf->SetY($offsety+(6*$offsetnline)-20);
    //$pdf->SetX($offsetx+(4*$offsettab)+30);
    //$pdf->Cell((3*$offsettab),10,"RECEIPT/ TAX INVOICE/PACKING LIST",0,0,"C"); 
    //-------------------table---------------------
    //$pdf->SetY($offsety+(9*$offsetnline));
    //กรอบบน
    $pdf->SetY($offsety+(15*$offsetnline));
    $pdf->SetX($offsetx+$offsettab-10);
    $pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
    $pdf->SetY($offsety+(15*$offsetnline)+6);
    $pdf->SetX($offsetx+$offsettab-10);
    $pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
    //กรอบล่าง
    
    $pdf->SetY($offsety+(44*$offsetnline));
    $pdf->SetX($offsetx+$offsettab-10);
    $pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
    $pdf->SetY($offsety+(44*$offsetnline)+7);
    $pdf->SetX($offsetx+$offsettab-10);
    $pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
    //เส้นบรรทัด ภาษี 7%
    //$pdf->SetY($offsety+(21*$offsetnline)+10);
    //$pdf->SetX($offsetx+(9*$offsettab)+6-10);
    //$pdf->Cell(10,0,"",1,0,"L"); 
    //เส้นบรรทัด มูลค่าสินค้า
    $pdf->SetY($offsety+(44*$offsetnline)+14);
    $pdf->SetX($offsetx+(9*$offsettab)+4);
    $pdf->Cell(15,0,"",1,0,"L"); 
    $pdf->SetY($offsety+(44*$offsetnline)+14.5);
    $pdf->SetX($offsetx+(9*$offsettab)+4);
    $pdf->Cell(15,0,"",1,0,"L"); 

    $pdf->SetY($offsety+(44*$offsetnline)+21.5);
    $pdf->SetX($offsetx+(9*$offsettab)+4);
    $pdf->Cell(15,0,"",1,0,"L"); 

    $pdf->SetY($offsety+(44*$offsetnline)+28.5);
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
    // กรอบความสูง
    $pdf->SetY($offsety+(15*$offsetnline));
    $pdf->SetX($offsetx+$offsettab-10);
    $pdf->Cell($offsettab-9,(30.8*$offsetnline),"",1,0,"L"); 
    $pdf->SetY($offsety+(15*$offsetnline));
    $pdf->SetX($offsetx+$offsettab-10);
    $pdf->Cell(2*$offsettab+4,(30.8*$offsetnline),"",1,0,"L"); 
    $pdf->SetY($offsety+(15*$offsetnline));
    $pdf->SetX($offsetx+$offsettab-10);
    $pdf->Cell(5*$offsettab+10,(30.8*$offsetnline),"",1,0,"L"); 
    $pdf->SetY($offsety+(15*$offsetnline));
    $pdf->SetX($offsetx+$offsettab-10);
    $pdf->Cell(6*$offsettab+12,(30*$offsetnline)+3,"",1,0,"L"); 
    $pdf->SetY($offsety+(15*$offsetnline));
    $pdf->SetX($offsetx+$offsettab-10);
    $pdf->Cell(7*$offsettab+12,(30*$offsetnline)+3,"",1,0,"L"); 
    $pdf->SetY($offsety+(15*$offsetnline));
    $pdf->SetX($offsetx+$offsettab+173);
    $pdf->Cell(8*$offsettab-171,(30*$offsetnline)+3,"",1,0,"L");
    //-------------------table---------------------
    $pdf->SetFont('angsa','',14);
    $pdf->SetY($offsety+$offsetnline+5);
    $pdf->SetX($offsetx+(7*$offsettab)-5);
    $pdf->Cell((3*$offsettab),10,$send[$i],0,0,"R"); 
    
    $pdf->SetFont('angsa','',14);
    $pdf->SetY($offsety+(5*$offsetnline)-5);
    $pdf->SetX($offsetx+(7*$offsettab)+1);
    $pdf->Cell((3*$offsettab),10,"สาขา.............................................",0,0,"R"); 
    $pdf->SetY($offsety+(5*$offsetnline));
    $pdf->SetX($offsetx+(7*$offsettab)+1);
    $pdf->Cell((3*$offsettab),10,"เลขที่.............................................",0,0,"R"); 
    $pdf->SetY($offsety+(6*$offsetnline));
    $pdf->SetX($offsetx+(7*$offsettab)+1);
    $pdf->Cell((3*$offsettab),10,"วันที่.............................................",0,0,"R"); 
    $pdf->SetY($offsety+(7*$offsetnline));
    $pdf->SetX($offsetx+(7*$offsettab)+1);
    $pdf->Cell((3*$offsettab),10,"ซื้อเพื่อ.............................................",0,0,"R"); 
//info---------------------------------------
    
    /*$pdf->SetY($offsety+(5*$offsetnline)-1);
    $pdf->SetX($offsetx+(8*$offsettab)+6);
    $pdf->Cell((3*$offsettab),10,$uid[$i],0,0,"L"); */
    
    $pdf->SetY($offsety+(5*$offsetnline)-6);
    $pdf->SetX($offsetx+(9*$offsettab)-12);
    $pdf->Cell((3*$offsettab),10,$inv_code[$i],0,0,"L");
    $pdf->SetY($offsety+(5*$offsetnline)-1);
    $pdf->SetX($offsetx+(9*$offsettab)-12);
    $pdf->Cell((3*$offsettab),10,$sano[$i],0,0,"L"); 
    /*$pdf->SetY($offsety+(7*$offsetnline)-1);
    $pdf->SetX($offsetx+(9*$offsettab)-10);
    $pdf->Cell((3*$offsettab),10,$mcode[$i],0,0,"L"); */
    $pdf->SetY($offsety+(6*$offsetnline)-1);
    $pdf->SetX($offsetx+(9*$offsettab)-12);
    $pdf->Cell((3*$offsettab),10,$sadate[$i],0,0,"L");
    $pdf->SetY($offsety+(7*$offsetnline)-1);
    $pdf->SetX($offsetx+(9*$offsettab)-12);
    $pdf->Cell((3*$offsettab),10,$typedef[$sa_type[$i]],0,0,"L"); 
    $pdf->SetFont('angsa','',14); 
//---------------------------------------------
    
    $pdf->SetY($offsety+(4*$offsetnline));
    $pdf->SetX($offsetx+$offsettab);
    $pdf->Cell((2*$offsettab),10,"รหัสสมาชิก",0,0,"L"); 
    $pdf->SetY($offsety+(5*$offsetnline));
    $pdf->SetX($offsetx+$offsettab);
    $pdf->Cell((2*$offsettab),10,"ชื่อ-สกุล ",0,0,"L"); 
    $pdf->SetY($offsety+(6*$offsetnline));
    $pdf->SetX($offsetx+$offsettab);
    $pdf->Cell((2*$offsettab),10,"ที่อยู่",0,0,"L"); 
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
    $pdf->Cell((2*$offsettab),10,$name[$mcode[$i]]." (".$id_card[$mcode[$i]].")",0,0,"L"); 
    $pdf->SetY($offsety+(6*$offsetnline)+3);
    $pdf->SetX($offsetx+(2*$offsettab)+5);
//function MultiCell($w,$h,$txt,$border=0,$align='J',$fill=0)
    //$pdf->MultiCell((5*$offsettab),3,$add[$mcode[$i]]." มือถือ : ".$mobile,0,"L"); 
    $pdf->MultiCell((5*$offsettab),3,$add[$mcode[$i]],0,"L"); 

    $pdf->SetY($offsety+(7*$offsetnline)+10);
    $pdf->SetX($offsetx+($offsettab));    
    $pdf->Cell($offsettab,10,"หมายเหตุ.",0,0,"L");

    $pdf->SetY($offsety+(8*$offsetnline)+9);
    $pdf->SetX($offsetx+(2*$offsettab)+5);
    $string = preg_replace("/[\\n\\r]+/", "",$remark[$i]);
    $pdf->MultiCell((7*$offsettab),4,$string,0,"L");     //$pdf->Cell((2*$offsettab),10,$txtoption[$i],0,0,"L"); 

    $pdf->SetY($offsety+(10*$offsetnline)+2);
    $pdf->SetX($offsetx+($offsettab));    
    //$pdf->Cell($offsettab,10,"Ref.",0,0,"L");
    $pdf->SetY($offsety+(10*$offsetnline)+2);
    $pdf->SetX($offsetx+(2*$offsettab));
    //$pdf->Cell($offsettab,10,$refer[$i].' '.$name_ref,0,0,"L");


    $offsetx=-3;
    $offsety=3;
    //$pdf->SetY($offsety+(7*$offsetnline));
    //$pdf->SetX($offsetx+(8*$offsettab));
    //$pdf->Cell((2*$offsettab),10,$sp_name[$mcode[$i]],0,0,"L"); 
    
    //$pdf->SetY($offsety+(8*$offsetnline));
    //$pdf->SetX($offsetx+(8*$offsettab));
    //$pdf->Cell((2*$offsettab),10,$sp_code[$mcode[$i]],0,0,"L"); 
//------------------------------------------
    $pdf->SetY($offsety+(14*$offsetnline)-1);
    $pdf->SetX($offsetx+$offsettab-5);
    $pdf->Cell($offsettab,10,"No.",0,0,"L"); 
    
    $pdf->SetY($offsety+(14*$offsetnline)-1);
    $pdf->SetX($offsetx-10+(2*$offsettab)-5);
    $pdf->Cell($offsettab,10,"Product Code",0,0,"L"); 
    
    $pdf->SetY($offsety+(14*$offsetnline)-1);
    $pdf->SetX($offsetx+(3*$offsettab));
    $pdf->Cell($offsettab,10,"Description",0,0,"C"); 
    
    $pdf->SetY($offsety+(14*$offsetnline)-1);
    $pdf->SetX($offsetx+(6*$offsettab)+8);
    $pdf->Cell($offsettab,10,"Quantity",0,0,"L"); 
    
    $pdf->SetY($offsety+(14*$offsetnline)-1);
    $pdf->SetX($offsetx+(7*$offsettab)+8);
    $pdf->Cell($offsettab,10,"Unit Price",0,0,"L"); 

    $pdf->SetY($offsety+(14*$offsetnline)-1);
    $pdf->SetX($offsetx+(8*$offsettab)+11);
    $pdf->Cell($offsettab,10,"(PV)",0,0,"L"); 
    
    $pdf->SetY($offsety+(14*$offsetnline)-1);
    $pdf->SetX($offsetx+(9*$offsettab)+10);
    $pdf->Cell($offsettab,10,"Amount",0,0,"L"); 



        $offsety=94; // ส่วนล่าง
    $pdf->SetY($offsety+(22*$offsetnline));
    $pdf->SetX($offsetx+(6.7*$offsettab));
    $pdf->Cell($offsettab,10,"มูลค่าสินค้า",0,0,"L");

    $pdf->SetY($offsety+(22*$offsetnline)+7);
    $pdf->SetX($offsetx+(6.7*$offsettab));
    $pdf->Cell($offsettab,10,"ภาษีมูลค่าเพิ่ม",0,0,"L");

    $pdf->SetY($offsety+(22*$offsetnline)+14);
    $pdf->SetX($offsetx+(6.7*$offsettab));
    $pdf->Cell($offsettab,10,"มูลค่าสินค้า ไม่รวมภาษีมูลค่าเพิ่ม",0,0,"L");
        $offsety=110; // ส่วนล่าง
    
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
    $pdf->Cell((2*$offsettab),10,"ผู้รับสินค้า",0,0,"C");
    $pdf->SetY($offsety+(29*$offsetnline));
    $pdf->SetX($offsetx+$offsettab);
    $pdf->Cell((2*$offsettab),10,"วันที่ ......../......../........",0,0,"C");
    
    //$pdf->SetY($offsety+(26*$offsetnline));
    //$pdf->SetX($offsetx+(5*$offsettab)-7);
    //$pdf->Cell((2*$offsettab),10,"ได้รับสินค้าครบถ้วนแล้ว",0,0,"C");
    $pdf->SetY($offsety+(26*$offsetnline)+3);
    $pdf->SetX($offsetx+(3*$offsettab)+10);
    $pdf->Cell((2*$offsettab),10,".............................",0,0,"C");
    $pdf->SetY($offsety+(28*$offsetnline));
    $pdf->SetX($offsetx+(3*$offsettab)+10);
    $pdf->Cell((2*$offsettab),10,"ผู้จ่ายสินค้า",0,0,"C");
    $pdf->SetY($offsety+(29*$offsetnline));
    $pdf->SetX($offsetx+(3*$offsettab)+10);
    $pdf->Cell((2*$offsettab),10,"วันที่ ......../......../........",0,0,"C");
    
    $pdf->SetY($offsety+(26*$offsetnline)+3);
    $pdf->SetX($offsetx+(9*$offsettab)-15-40);
    $pdf->Cell((2*$offsettab),10,".............................",0,0,"C");
    $pdf->SetY($offsety+(28*$offsetnline));
    $pdf->SetX($offsetx+(9*$offsettab)-15-40);
    $pdf->Cell((2*$offsettab),10,"ผู้ตรวจรับสินค้าและจัดส่ง",0,0,"C");
    $pdf->SetY($offsety+(29*$offsetnline));
    $pdf->SetX($offsetx+(9*$offsettab)-15-40);
    $pdf->Cell((2*$offsettab),10,"วันที่ ......../......../........",0,0,"C");
    $pdf->SetY($offsety+(31*$offsetnline));
    $pdf->SetX($offsetx+(9*$offsettab)-15-40);
    $pdf->Cell((2*$offsettab),10,"เลขที่จัดส่ง......................................",0,0,"C");

    $pdf->SetY($offsety+(26*$offsetnline)+3);
    $pdf->SetX($offsetx+(9*$offsettab)-8);
    $pdf->Cell((2*$offsettab),10,".............................",0,0,"C");
    $pdf->SetY($offsety+(28*$offsetnline));
    $pdf->SetX($offsetx+(9*$offsettab)-8);
    $pdf->Cell((2*$offsettab),10,"ผู้รับเงิน",0,0,"C");
    $pdf->SetY($offsety+(29*$offsetnline));
    $pdf->SetX($offsetx+(9*$offsettab)-8);
    $pdf->Cell((2*$offsettab),10,"วันที่ ......../......../........",0,0,"C");

    



    $pdf->SetY($offsety+(18*$offsetnline));
    $pdf->SetX($offsetx+($offsettab));
    if(!empty($uid_name[$i]))$username1 = '   '.$uid[$i].' '.$uid_name[$i];
    $pdf->Cell($offsettab,10,"ชำระโดย",0,0,"L"); 
    $tab=0;
    foreach($textshows as $key => $val):
        $pdf->SetY($offsety+(18*$offsetnline)+$tab);
        $pdf->SetX($offsetx+(2*$offsettab));
        $pdf->Cell($offsettab,10,'-'.$val['text']." : ".$val['total'].' -'.$val['select']." ".''.$val['option']."",0,0,"L");
        $tab = $tab+5;
    endforeach;
    
    
    
    
    
    $pdf->SetFont('angsa','',10); 
    $pdf->SetY($offsety+(22*$offsetnline)+33);
    $pdf->SetX($offsetx+($offsettab));
    $pdf->Cell($offsettab,10,"Operator : ".$uid[$i]." Date : ".$logdate11." Time : ".$logtime1[$i],0,0,"L");
    //$pdf->SetY($offsety+(22*$offsetnline)+36);
    //$pdf->SetX($offsetx+($offsettab));
    //$pdf->Cell($offsettab,10,"Editor : ".$uid2[$i]." Date : ".$logdate21." Time : ".$logtime2[$i],0,0,"L");
    $pdf->SetFont('angsa','',14); 
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

    $pdf->SetFont('angsa','',10); 
    $pdf->SetY($offsety+(23*$offsetnline)+1);
    $pdf->SetX($offsetx+($offsettab));
    $pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับสินค้าตามรายการที่ระบุไว้ข้างต้นครบถ้วนและสมบูรณ์เรียบร้อยแล้ว",0,0,"L");
    $pdf->SetY($offsety+(23*$offsetnline)+5);
    $pdf->SetX($offsetx+($offsettab));
    $pdf->Cell($offsettab,10,"สินค้าโปรโมชั่น ไม่สามารถเปลี่ยนหรือคืนได้",0,0,"L");
    $pdf->SetFont('angsa','',14);
 
    $offsety = 28;
    for($j=0;$j<$ddddd;$j++){    
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
        $pdf->Cell($offsettab,10,number_format(($obj->pv*$obj->qty),2,'.',','),0,0,"R"); 
        
        $pdf->SetY($offsety+((9+$j)*$offsetnline));
        $pdf->SetX($offsetx+(9*$offsettab)+4);
        $pdf->Cell($offsettab,10,number_format(($obj->price*$obj->qty),2,'.',','),0,0,"R"); 
        $sum += $obj->price*$obj->qty;
        $sumpv += $obj->pv*$obj->qty;
		
		$sqlxx = "SELECT * FROM ali_product_package1 WHERE package = '".$obj->pcode."' ";
		$rsxx = mysql_query($sqlxx);
		if(mysql_num_rows($rsxx) > 0){
			for($v=0;$v<mysql_num_rows($rsxx);$v++){
				$j += 1;
				$objxx = mysql_fetch_object($rsxx);
				$pdf->SetY($offsety+((9+$j)*$offsetnline));
				$pdf->SetX($offsetx+(3*$offsettab));
				$pdf->Cell($offsettab,10,"  - (".$objxx->pcode.") ".$objxx->pdesc."(".($objxx->qty * $obj->qty).")",0,0,"L");
			}
		}
    }
    if($k==$npage-1){
        $offsety = 94;

     $pdf->SetY($offsety+(20*$offsetnline));
        $pdf->SetX($offsetx+(9*$offsettab)+3);
        $pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 
        $pdf->SetY($offsety+(20*$offsetnline));
        $pdf->SetX($offsetx+(8*$offsettab)+3);
        $pdf->Cell($offsettab,10,number_format($sumpv,2,'.',','),0,0,"R"); 
        
        $pdf->SetY($offsety+(22*$offsetnline));
        $pdf->SetX($offsetx+(9*$offsettab)+3);
        $pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 

        $pdf->SetY($offsety+(22*$offsetnline)+7);
        $pdf->SetX($offsetx+(9*$offsettab)+3);
        $pdf->Cell($offsettab,10,number_format($total_vat[$i],2,'.',','),0,0,"R"); 

        $pdf->SetY($offsety+(22*$offsetnline)+14);
        $pdf->SetX($offsetx+(9*$offsettab)+3);
        $pdf->Cell($offsettab,10,number_format($total_invat[$i],2,'.',','),0,0,"R"); 
        
        $pdf->SetY($offsety+(20*$offsetnline));
        $pdf->SetX($offsetx+(4*$offsettab)-5);
        $pdf->Cell($offsettab,10,moneytotext($sum),0,0,"C");  
    }
}}
$pdf->Output("pdf/doc.pdf");
ob_end_flush();
readfile('pdf/doc.pdf'); }else {echo "<center>Please log in to print. <a href='index.php'>Click to Login</a></center>";
}

function testxx($rs){
	$sum_num = 0;
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$object = mysql_fetch_object($rs);
		$pcode = $object->pcode;
		$sql = "SELECT COUNT(pcode) as num_pp FROM ali_product_package1 WHERE package = '".$pcode."' ";
		//echo $sql."<br>";
		$rsx = mysql_query($sql);
		if(mysql_num_rows($rsx) > 0){
			$obj = mysql_fetch_object($rsx);
			$num_pp = $obj->num_pp;
		}
		else{
			$num_pp = 0;
		}
		$sum_num += $num_pp;
	}
	return $sum_num;
}


