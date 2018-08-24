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
$sql = "SELECT * FROM ".$dbprefix."asaleh ";
$sql .= " LEFT JOIN district ON (".$dbprefix."asaleh.cdistrictId=district.districtId)";
$sql .= " LEFT JOIN amphur ON (".$dbprefix."asaleh.camphurId=amphur.amphurId)";
$sql .= " LEFT JOIN province ON (".$dbprefix."asaleh.cprovinceId=province.provinceId) WHERE id='$sano'   ";
$sqlLog1 = "SELECT sys_id,logdate,logtime FROM ".$dbprefix."log  WHERE object ='$sano' and subject = 'เพิ่มบิล' order by id desc";
$sqlLog2 = "SELECT sys_id,logdate,logtime  FROM ".$dbprefix."log  WHERE object ='$sano' and subject = 'แก้ไขบิล' order by id desc";

//echo $sql;
$rs=mysql_query($sql);
if(mysql_num_rows($rs)<=0){   
	?><table width="300" align="center" bgcolor="#990000"><tr><td align="center">ไม่พบข้อมูลของบิลเลขที่ <?=$sano?>
	<br /><input type="button" value="ปิดหน้านี้" onClick="window.close()" /></td></tr></table><?
	exit;
}
$typedef = $arr_satype_show_bill;

for($i=0;$i<mysql_num_rows($rs);$i++){
	$obj = mysql_fetch_object($rs);
	$mcode[$i] = $obj->mcode;
	$add[$mcode[$i]] = $obj->caddress;
	$add[$mcode[$i]] .= $obj->districtName==""?"":" ต.".$obj->districtName;
	$add[$mcode[$i]] .= $obj->amphurName==""?"":" อ.".$obj->amphurName;
	$add[$mcode[$i]] .= $obj->provinceName==""?"":" จ.".$obj->provinceName;
	$add[$mcode[$i]] .= " ".$obj->czip;
	if($obj->send == '1')$caddress = $add[$mcode[$i]];
	else $caddress = "";
	$bill[$i] = $obj->id;
	$bill1[$i] = $obj->sano;
	if(substr($bill1[$i],1,1) == '6'){
		//$showtitle."/ใบกำกับภาษี/ใบเสร็จรับเงิน"
		$showtitle = "ใบลดหนี้/ใบกำกับภาษี";
		$showtitle1 = "CREDIT NOTE/TAX INVOICE";
	}else {
		//$showtitle = "ใบส่งของ/ใบกำกับภาษี/ใบเสร็จรับเงิน";
		$showtitle = "ใบเสร็จรับเงิน / RECIEPT";
		//$showtitle1 = "RECIEPT";
	}
	if(substr($bill1[$i],0,2) == 'W3'){
		$showtitle = "ใบกำกับภาษี/ใบเสร็จรับเงิน";
		$showtitle1 = "TAX INVOICE/TAX INVOICE/RECIEPT";
	}
	if(substr($bill1[$i],0,2) == 'S5'){
		$showtitle = "ใบส่งของ";
		$showtitle1 = "DELIVERY ORDER";
	}
	$cmc = $mcode[$i];
	$uid[$i] = $obj->uid;
	$atotal[$i] = $obj->total;
	$hdate[$i] = $obj->hdate;
	$atot_pv[$i] = $obj->tot_pv;
//	$stockist[$i] = $obj->stockist;
	$stockist_name[$i] = $obj->stockist_name;
	$totall[$i] = $obj->uid;
	$Transfer[$i] = $obj->optionTransfer;
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

	$optionCash[$i] = $obj->optionCash;
	$optionFuture[$i] = $obj->optionFuture;
	$optionTransfer[$i] = $obj->optionTransfer;
	$optionInternet[$i] = $obj->optionInternet;
	$optionDiscount[$i] = $obj->optionDiscount;
	$optionCredit1[$i] = $obj->optionCredit1;
	$optionCredit2[$i] = $obj->optionCredit2;
	$optionCredit3[$i] = $obj->optionCredit3;

$selectqq = "select * from ".$dbprefix."user where usercode = '$uid[$i]' ";
	$query = mysql_query($selectqq);
	$objse = mysql_fetch_object($query);
	$uid[$i] = $objse->username;		
	$sa_type[$i] = $obj->sa_type;
	$sql = "SELECT sum(tot_pv) AS all_pv FROM ".$dbprefix."asaleh WHERE mcode='$cmc' and  (sa_type='A') and cancel = 0 ";
	//echo $sql;
	$rsbb = mysql_query($sql);
	$all_pv = mysql_result($rsbb,0,'all_pv')+gettotalpv($dbprefix,$cmc); 
	mysql_free_result($rsbb);

	/*$sql = "SELECT sum(tot_pv) AS all_pv FROM ".$dbprefix."holdhead WHERE mcode='$cmc' and  (sa_type='A') and cancel = 0 ";
	//echo $sql;
	$rsbb = mysql_query($sql);
	$all_pv = ($all_pv+mysql_result($rsbb,0,'all_pv')); 
	mysql_free_result($rsbb);*/
	if(empty($all_pv))$all_pv = 0;
	$pv[$i] = $obj->tot_pv;
	$alltotal[$i] = $obj->total;
	$totall[$i] = $obj->total;
	$totall[$i] = $alltotal1[$i] = $obj->txtCash+$obj->txtFuture+$obj->txtTransfer+$obj->txtCredit1+$obj->txtCredit2+$obj->txtCredit3+$obj->txtCredit4+$obj->txtInternet+$obj->txtDiscount+$obj->txtCreditweb+$obj->txtMLM+$obj->txtCoupon;
	$sadate[$i] = $obj->sadate;
	$sadate = explode('-',$sadate[$i]);
	$sadate = $sadate[2].'-'.$sadate[1].'-'.$sadate[0];
	$txtoption[$i] = $obj->txtoption;
	$sano_ref[$i] = $obj->sano_ref;
	$satype = $obj->sa_type;
	if($satype == 'E' or substr($bill1[$i],1,1) == '6' or substr($bill1[$i],0,2) == 'S5'){
		$txtoption[$i] = 'สาเหตุการลดหนี้ '.$txtoption[$i];
		$txtoption1[$i] = "ตามใบกำกับภาษีเลขที่ ".$sano_ref[$i];
		$pv[$i] = 0;
		$sql="SELECT * FROM ".$dbprefix."asaleh where sano = '".$sano_ref[$i]."' and cancel = 0 order by id asc ";
		$rschk = mysql_query($sql);
		if(mysql_num_rows($rschk) > 0)
		{
			for($mm=0;$mm<mysql_num_rows($rschk);$mm++){
				$sqlObj_chk = mysql_fetch_object($rschk);
				$sstotal = $sqlObj_chk->total;
			}
		}
		$sql="SELECT * FROM ".$dbprefix."asaleh where sano_ref = '".$sano_ref[$i]."' and substring(sano_ref,1,1) = substring(sano,1,1) and cancel = 0 order by id asc ";
		$rschk = mysql_query($sql);
		if(mysql_num_rows($rschk) > 0)
		{
			for($mm=0;$mm<mysql_num_rows($rschk);$mm++){
				$sqlObj_chk = mysql_fetch_object($rschk);
				$cstotal = $sqlObj_chk->total;
				$ssano =$sqlObj_chk->sano;
				if($ssano == $bill1[$i]){
					$mm = mysql_num_rows($rschk);
				}else{
					$sstotal = $sstotal-$cstotal;
				}
			}
		}
	}


	else $txtoption[$i] ="ตามใบกำกับภาษีเลขที่  ".$txtoption[$i];

	 

	$txtAllCredit[$i] = $txtCredit1[$i]+$txtCredit2[$i]+$txtCredit3[$i]+$txtCredit4[$i];

	$txtShow[$i] = "";
	$kk = 0;
	//echo $chkCash[$i];
	//exit;
/*

	if(!empty($Transfer[$i]) and $Transfer[$i] == '999') {
		
		$pay_type = 'เงินสด';
		$pay_desc = 'Bill Payment 278-3-00403-2 ';
		$txtShow[$kk] = $pay_type.' - '.$pay_desc;
		$txtShow1[$kk] = ' จำนวนเงิน '.number_format($txtTransfer[$i],2,'.',',').' บาท ';
		//$txtShow[$kk+1] = $optionCash[$i];
		$kk = $kk+2;
	}
	if(!empty($Transfer[$i]) and $Transfer[$i] == '004') {
		
		$pay_type = 'เงินสด';
		$pay_desc = 'ธ.กสิกรไทย  012-3-45678-9 ';
		$txtShow[$kk] = $pay_type.' - '.$pay_desc;
		$txtShow1[$kk] = ' จำนวนเงิน '.number_format($txtTransfer[$i],2,'.',',').' บาท ';
		//$txtShow[$kk+1] = $optionCash[$i];
		$kk = $kk+2;
	}
	if(!empty($Transfer[$i]) and $Transfer[$i] == '014') {
		
		$pay_type = 'เงินสด';
		$pay_desc = 'ธ.ไทยพาณิชย์  047-2-56212-5 ';
		$txtShow[$kk] = $pay_type.' - '.$pay_desc;
		$txtShow1[$kk] = ' จำนวนเงิน '.number_format($txtTransfer[$i],2,'.',',').' บาท ';
		//$txtShow[$kk+1] = $optionCash[$i];
		$kk = $kk+2;
	}
*/


	if(!empty($chkCash[$i])){
			$pay_type = 'เงินสด';
		//	$pay_desc = 'ธ.ไทยพาณิชย์  047-2-56212-5 ';
			$txtShow[$kk] = $pay_type.' - '.$pay_desc;
			$txtShow1[$kk] = ' จำนวนเงิน '.number_format($txtCash[$i],2,'.',',').' บาท ';
		//	if(!empty($optionCash[$i]))$txtShow1[$kk] .= ' รายละเอียด '.$optionCash[$i];
			//$txtShow[$kk+1] = $optionCash[$i];
			$kk = $kk+2;
	}
	if(!empty($chkTransfer[$i])) {
		 $sqll = " SELECT pay_desc FROM  `ali_payment_type` WHERE  `mapping_code` = ".$chkTransfer[$i]."" ;
		 $rss = mysql_query($sqll);
			if(mysql_num_rows($rss) > 0){
				$sqlObj_chk1 = mysql_fetch_object($rss);
				$pay_desc = $sqlObj_chk1->pay_desc;
				$pay_type = 'เงินโอน';
				//$pay_desc = 'Bill Payment 278-3-00403-2 ';
				$txtShow[$kk] = $pay_type.' - '.$pay_desc;
				$txtShow1[$kk] = ' จำนวนเงิน '.number_format($txtTransfer[$i],2,'.',',').' บาท ';
			//	if(!empty($optionTransfer[$i]))$txtShow1[$kk] .= ' รายละเอียด '.$optionTransfer[$i];
				//$txtShow[$kk+1] = $optionCash[$i];
				$kk = $kk+2;
			}
			 
	}
	if(!empty($chkDiscount[$i])){
			$pay_type = 'คูปอง';
		//	$pay_desc = 'ธ.ไทยพาณิชย์  047-2-56212-5 ';
			$txtShow[$kk] = $pay_type.' - '.$pay_desc;
			$txtShow1[$kk] = ' จำนวนเงิน '.number_format($txtDiscount[$i],2,'.',',').' บาท ';
		//	if(!empty($optionDiscount[$i]))$txtShow1[$kk] .= ' รายละเอียด '.$optionDiscount[$i];
			//$txtShow[$kk+1] = $optionCash[$i];
			$kk = $kk+2;
	}
 

	if(!empty($chkInternet[$i])){	
			$pay_type = 'Ewallet';
		//	$pay_desc = 'ธ.ไทยพาณิชย์  047-2-56212-5 ';
			$txtShow[$kk] = $pay_type.' - '.$pay_desc;
			$txtShow1[$kk] = ' จำนวนเงิน '.number_format($txtInternet[$i],2,'.',',').' บาท ';
		//	if(!empty($optionInternet[$i]))$txtShow1[$kk] .= ' รายละเอียด '.$optionInternet[$i];
			//$txtShow[$kk+1] = $optionCash[$i];
			$kk = $kk+2;
	}
	if(!empty($chkCredit1[$i])){
	
			$pay_type = 'บัตรเครดิต';
		//	$pay_desc = 'ธ.ไทยพาณิชย์  047-2-56212-5 ';
			$txtShow[$kk] = $pay_type.' - '.$pay_desc;
			
		//	exit;
			$txtShow1[$kk] = ' จำนวนเงิน '.number_format($txtCredit1[$i],2,'.',',').' บาท ';
			//echo $txtShow1[$kk];
			//exit;
		//	if(!empty($optionCredit1[$i]))$txtShow1[$kk] .= ' รายละเอียด '.$optionCredit1[$i];
			//$txtShow[$kk+1] = $optionCash[$i];
			$kk = $kk+2;
	}
	if(!empty($chkCredit2[$i])){
			$pay_type = 'บัตรเครดิต';
		//	$pay_desc = 'ธ.ไทยพาณิชย์  047-2-56212-5 ';
			$txtShow[$kk] = $pay_type.' - '.$pay_desc;
			$txtShow1[$kk] = ' จำนวนเงิน '.number_format($txtCredit2[$i],2,'.',',').' บาท ';
	//		if(!empty($optionCredit2[$i]))$txtShow1[$kk] .= ' รายละเอียด '.$optionCredit2[$i];
			//$txtShow[$kk+1] = $optionCash[$i];
			$kk = $kk+2;
	}
	if(!empty($chkCredit3[$i])){
			$pay_type = 'บัตรเครดิต';
		//	$pay_desc = 'ธ.ไทยพาณิชย์  047-2-56212-5 ';
			$txtShow[$kk] = $pay_type.' - '.$pay_desc;
			$txtShow1[$kk] = ' จำนวนเงิน '.number_format($txtCredit3[$i],2,'.',',').' บาท ';
		//	if(!empty($optionCredit3[$i]))$txtShow1[$kk] .= ' รายละเอียด '.$optionCredit3[$i];
			//$txtShow[$kk+1] = $optionCash[$i];
			$kk = $kk+2;
	}
	if(!empty($chkCredit4[$i])){
			$pay_type = 'บัตรเครดิต';
		//	$pay_desc = 'ธ.ไทยพาณิชย์  047-2-56212-5 ';
			$txtShow[$kk] = $pay_type.' - '.$pay_desc;
			$txtShow1[$kk] = ' จำนวนเงิน '.number_format($txtCredit4[$i],2,'.',',').' บาท ';
	//		if(!empty($optionCredit4[$i]))$txtShow1[$kk] .= ' รายละเอียด '.$optionCredit4[$i];
			//$txtShow[$kk+1] = $optionCash[$i];
			$kk = $kk+2;
	}


	$sql2 = "SELECT * FROM ".$dbprefix."member ";
	$sql2 .= "LEFT JOIN district ON (".$dbprefix."member.districtId=district.districtId)";
	$sql2 .= "LEFT JOIN amphur ON (".$dbprefix."member.amphurId=amphur.amphurId)";
	$sql2 .= "LEFT JOIN province ON (".$dbprefix."member.provinceId=province.provinceId)";
	$sql2 .= "WHERE mcode='".$mcode[$i]."' LIMIT 1 ";
	//echo $sql2;
	$rs2 = mysql_query($sql2);
	$name_f = mysql_result($rs2,0,'name_f');
	//if($name_f == 'บจก.')$name_f = 'บริษัท';
	$name[$mcode[$i]] = $name_f .' '.$obj->name_t;
	$mobile = mysql_result($rs2,0,'mobile');
	$id_card = mysql_result($rs2,0,'id_card');
	$id_tax = mysql_result($rs2,0,'id_tax');
	if(!empty($id_card) and $name_f != 'บริษัท' and $name_f != 'ห้างหุ้นส่วนจำกัด')$name[$mcode[$i]] .= ' เลขบัตรประชาชน : '.$id_card;
	if(!empty($id_tax) and ($name_f == 'บริษัท' or $name_f == 'ห้างหุ้นส่วนจำกัด'))$name[$mcode[$i]] .= ' เลขประจำตัวผู้เสียภาษี : '.$id_card;
	if(!empty($mobile))$name[$mcode[$i]] .= ' เบอร์มือถือ : '.$mobile;
	$add[$mcode[$i]] = mysql_result($rs2,0,'address');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'districtId')==""?"":" ต.".mysql_result($rs2,0,'districtId');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'amphurId')==""?"":" อ.".mysql_result($rs2,0,'amphurId');
	$add[$mcode[$i]] .= mysql_result($rs2,0,'provinceId')==""?"":" จ.".mysql_result($rs2,0,'provinceId');
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
$nitem = 16;
$ssss = 0;
$ssss2 = 0;
$kkk = 1;
$chklimit[0] = 0;
//$chklimit1[0] = 0;
$chkpage = 0;
for($i=0;$i<sizeof($bill);$i++){
	$sql="SELECT * FROM ".$dbprefix."asaled WHERE sano='$bill[$i]' order by price DESC ";
	$rs=mysql_query($sql);
	$ssss1 = mysql_num_rows($rs);
	if(mysql_num_rows($rs) > 0){
		for($ss=0;$ss<mysql_num_rows($rs);$ss++){
			$obj_product = mysql_fetch_object($rs);
			$pcode134 = $obj_product->pcode;
			$ssss++;$ssss2++;
			//echo $pcode134.' : '.$chklimit[$kkk].' : '.$ssss.' : '.$ssss2.' : '.$ss.'<br>';
			$sql="SELECT * FROM ".$dbprefix."product_package1 where package = '".$pcode134."'";
			//exit;
			$rspack = mysql_query($sql);
			//echo "$sql<BR>";
			if(mysql_num_rows($rspack) > 0)
			{
				for($m=0;$m<mysql_num_rows($rspack);$m++){
					
					$sqlObj_pack = mysql_fetch_object($rspack);
					$pcode_pack =$sqlObj_pack->pcode;
					
										//	echo  $pcode_pack.' : '.$chklimit[$kkk].' : '.$ssss.' : '.$ssss2.' : '.$ss.' : '.$kkk.' : '.$nitem.'1<br>';
					if($ssss2 >= $nitem){
						$chkpage=$chkpage+1;
						$chklimit[$kkk] = $ss-$chklimit[$kkk-1]-$chklimit[$kkk-2]-$chklimit[$kkk-3]-$chklimit[$kkk-4]-$chklimit[$kkk-5]-$chklimit[$kkk-6]-$chklimit[$kkk-7]-$chklimit[$kkk-8]-$chklimit[$kkk-9]-$chklimit[$kkk-10];
						$chklimit1[$kkk-1] = $ssss2;
						$ssss2=0;
						$kkk++;
					
										//	echo  $pcode_pack.' : '.$chklimit[$kkk].' : '.$ssss.' : '.$ssss2.' : '.$ss.' : '.$kkk.' : '.$nitem.'2<br>';

					}
					$ssss++;$ssss2++;

				}
			}else{
					
										//	echo  $pcode_pack.' : '.$chklimit[$kkk].' : '.$ssss.' : '.$ssss2.' : '.$ss.' : '.$kkk.' : '.$nitem.'3<br>';
				
				if($ssss2 >= $nitem){
						$chkpage=$chkpage+1;
						$chklimit[$kkk] = $ss-$chklimit[$kkk-1]-$chklimit[$kkk-2]-$chklimit[$kkk-3]-$chklimit[$kkk-4]-$chklimit[$kkk-5]-$chklimit[$kkk-6]-$chklimit[$kkk-7]-$chklimit[$kkk-8]-$chklimit[$kkk-9]-$chklimit[$kkk-10];
						$chklimit1[$kkk-1] = $ssss2;
						$ssss2=0;
						$kkk++;
					
					//						echo  $chklimit[$kkk-1].' : '.$chklimit[$kkk].' : '.$ssss.' : '.$ssss2.' : '.$ss.' : '.$kkk.' : '.$nitem.'4<br>';

				}
			}
		}
	}

	//echo $chklimit[0].' : ';
	// $chklimit[3] = 1;
	//if($chkpage == 0 or $ssss2 > 0)$chklimit[$kkk] = $ssss;
	if($chkpage == 0 or $ssss2 > 0)$chklimit[$kkk] = $ssss2;
	//echo  $chklimit[0].' : '.$chklimit[1].' : '.$chklimit[2].' : '.$chklimit[3].' : '.$kkk;


	$chklimit1[$kkk-1] = $ss-$chklimit[$kkk-1]+1;
	//echo $chklimit1[$kkk-1].'<br>';
	//exit;
	//$chklimit[$kkk+1] = 15;
//echo $ss.'ss';
	//exit;
	//echo $ssss;
	//exit;
	//$ssss1 = $ssss;
	
	$ssss = $ssss+$kk+1;
	$npage = ceil($ssss/$nitem);
	//echo $npage;
	//exit;
	//exit;
	mysql_free_result($rs);
	$sum = 0;
	$sumpv = 0;
	$chksano = substr($bill[$i],0,2);
	$sschk = $ss;

//	echo  $chklimit[0].' : '.$chklimit[1].' : '.$chklimit[2].' : '.$chklimit[3].' : '.$kkk.';;;<br>';
	for($k=0;$k<$npage;$k++){
		$kdkdk = $k+1;
//	echo  $chklimit[0].' : '.$chklimit[1].' : '.$chklimit[2].' : '.$chklimit[3].' : '.$kkk.'<br>';
		//echo $kdkdk.'d'.$npage.'<br>';
		//echo $ss.' : '.$chklimit[$kkk-1].'<br>';
		$chklimit123[$k] = 0;
		if($kdkdk == $npage){
			//echo $chklimit[$k+1].' : '.$sschk.' : '.$chklimit[$kkk-1].'d<br>';
			//$chklimit[$k+1] = $ssss-$chklimit[$kkk-1];
		//	echo $chklimit[$k+1].' : '.$chklimit[$k].' : '.$ssss.'   c <br>';

			$chklimit[$k+1] = $ssss-$chklimit[$k];
			$chklimit123[$k] = $chklimit[$k]+$chklimit[$k-1]+$chklimit[$k-2]+$chklimit[$k-3]+$chklimit[$k-4]+$chklimit[$k-5]+$chklimit[$k-6]+$chklimit[$k-7]+$chklimit[$k-8]+$chklimit[$k-9]+$chklimit[$k-10];

		//	echo $chklimit[$k+1].' : '.$chklimit[$k].' : '.$ssss.'   d <br>';
			//echo $chklimit[$k+1].' : '.$ssss.' : '.$chklimit[$k-1].' <br>';
			//exit;
			//$sschk = $sschk+$chklimit[$kkk-1];
			
		}

		//	echo $chklimit123[$k].' : '.$chklimit[$k].' : '.$chklimit[$k-1].'   a <br>';
		$ssss = $ssss-$chklimit[$k];
	$chklimit123[$k] = $chklimit[$k]+$chklimit[$k-1]+$chklimit[$k-2]+$chklimit[$k-3]+$chklimit[$k-4]+$chklimit[$k-5]+$chklimit[$k-6]+$chklimit[$k-7]+$chklimit[$k-8]+$chklimit[$k-9]+$chklimit[$k-10];		//	echo $chklimit123[$k].' : '.$chklimit[$k].' : '.$chklimit[$k-1].'   B <br>';
		//echo $chklimit[$k+1].' : '.$ssss.'ss<br>';
			//echo $chklimit[$k+1].' : '.$sschk.' : '.$chklimit[$kkk-1].'2<br>';

		//echo $ss.' : '.$chklimit[$kkk-1].'<br><br>';
		//exit;
		//echo $chklimit[$k+1].' : <br>';
		//if(empty($chklimit[$k+1]))$chklimit[$k+1] = $ss;
		//echo $chklimit[$k+1].' : <br>';
		//$chklimit[2] = 18;
	$sql="SELECT * FROM ".$dbprefix."asaled WHERE sano='$bill[$i]' order by price DESC  LIMIT ".($chklimit123[$k]).", ".$chklimit[$k+1]." ";
	 //echo $sql.'<br>';
	//if($kdkdk == $npage)exit;
		//exit;
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
	$inv_ref = "";
	//$logo = "./Logo.jpg";
	$pdf->Image('../logo.jpg',$offsetx+$offsettab+3,$offsety+$offsetnline+5,23); //file,x,y,w=0,h=0
	
	$pdf->SetFont('angsa','',14);  
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"บริษัท ".$wording_lan["company_name"]." ",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,$wording_lan["company_address"],0,0,"L"); 
	$pdf->MultiCell(140,5,$inv_address[$i],0,'L');
	$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell((2*$offsettab),10,"15 SUKSAWAD 36,BANGPKKOK,RASBURANA,BANGKOK 10140 TEL.(02) 4270088",0,0,"L"); 
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"เลขประจำตัวผู้เสียภาษี 0000000000000 ทะเบียนเลขที่ 0000000000000",0,0,"L"); 

	$pdf->SetFont('angsa','',14);  
	//$pdf->SetY($offsety+$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+8);
	//$pdf->Cell($offsettab,10,"ใบสั่งซื้อสินค้า",1,0,"C"); 
	//$pdf->SetY($offsety+3*$offsetnline);
	//$pdf->SetX($offsetx+(9*$offsettab)+5);
	//$pdf->Cell($offsettab,10,"(เอกสารออกเป็นชุด)",0,0,"C"); 
	
	//$pdf->SetY($offsety+(6*$offsetnline));
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell((2*$offsettab),10,"เลขประจำตัวผู้เสียภาษีอากร",0,0,"L"); 
	
	$pdf->SetY($offsety+(2*$offsetnline)-5);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$showtitle,0,0,"C"); 
	$pdf->SetY($offsety+(2*$offsetnline)-1);
	$pdf->SetX($offsetx+(7*$offsettab)+8);
	$pdf->Cell((3*$offsettab),10,$showtitle1,0,0,"C"); 
	//$pdf->SetY($offsety+(6*$offsetnline));
	//$pdf->SetX($offsetx+(4*$offsettab));
	//$pdf->Cell((3*$offsettab),10,"RECEIPT/ TAX INVOICE/PACKING LIST",0,0,"C"); 
	//-------------------table---------------------
	//$pdf->SetY($offsety+(9*$offsetnline));
	

	$offsety = 25;
	//กรอบบน
	$pdf->SetY($offsety+(9*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	$pdf->SetY($offsety+(9*$offsetnline)+10);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	$offsety = 160-$offsety1;

	//กรอบล่าง
	$pdf->SetY($offsety+(21*$offsetnline)-2);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+6);
	$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell(10*$offsettab-7,0,"",1,0,"L"); 
	//เส้นบรรทัด ภาษี 7%
	$pdf->SetY($offsety+(21*$offsetnline)+10);
	$pdf->SetX($offsetx+(10*$offsettab)-3);
	//$pdf->Cell(10,0,"",1,0,"L"); 
	//เส้นบรรทัด มูลค่าสินค้า
	$pdf->SetY($offsety+(21*$offsetnline)+15);
	$pdf->SetX($offsetx+(10*$offsettab)-3);
//	$pdf->Cell(10,0,"",1,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+16);
	$pdf->SetX($offsetx+(10*$offsettab)-3);
//	$pdf->Cell(10,0,"",1,0,"L"); 
	
	$pdf->SetFont('angsa','',14);  

	//$pdf->SetY($offsety+(21*$offsetnline)-9);
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell($offsettab,10,"ชำระโดย",0,0,"L");
	//$pdf->SetY($offsety+(21*$offsetnline)-9);
	//$pdf->SetX($offsetx+(2*$offsettab));
	//$pdf->Cell($offsettab,10,$txtShow[0],0,0,"L");
	$offsety = 165-$offsety1;
//  Text down 1

	$pdf->SetY($offsety+(21*$offsetnline)-8);
	$pdf->SetX($offsetx+$offsettab);
	if(!empty($caddress))$pdf->Cell((2*$offsettab),10,'ที่อยู่จัดส่ง ' .$caddress,0,0,"L");

//////////////  STATUS //////////////
$all_Qpv =  getB($mcode[$i],$sadate);
$all_Qpv = $all_Qpv+getQ($mcode[$i],$sadate);
//////////////  STATUS //////////////
if($k == $npage-1){
	
	if($satype == 'E' or substr($bill1[$i],1,1) == '6'){
		$pdf->SetY($offsety+(21*$offsetnline)+3);
		$pdf->SetX($offsetx+$offsettab);
		//$pdf->Cell(10*$offsettab-7,0,"จำนวนคะแนนที่ลดลงในใบลดหนี้",0,0,"L"); 
		$pdf->SetY($offsety+(21*$offsetnline)+8);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"จำนวนคะแนนที่ลดลงในใบลดหนี้                                             คะแนน",0,0,"L"); 
		$pdf->SetY($offsety+(21*$offsetnline)+8);
		$pdf->SetX($offsetx+$offsettab+61);
		$pdf->Cell($offsettab,0,number_format($all_Qpv,0,'.',','),0,0,"R"); 
		$pdf->SetY($offsety+(21*$offsetnline)+13);       	
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"รวมยอดคะแนนส่วนตัว                                                             คะแนน",0,0,"L"); 
		$pdf->SetY($offsety+(21*$offsetnline)+13);       	
		$pdf->SetX($offsetx+$offsettab+61);
		$pdf->Cell($offsettab,0,number_format($all_pv,0,'.',','),0,0,"R"); 

	}else{
		$pdf->SetY($offsety+(21*$offsetnline)+3);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"จำนวนคะแนน ในใบส่งของนี้                                                   คะแนน",0,0,"L"); 
		$pdf->SetY($offsety+(21*$offsetnline)+3);
		$pdf->SetX($offsetx+$offsettab+61);
		$pdf->Cell($offsettab,0,number_format($atot_pv[$i],0,'.',','),0,0,"R"); 
	/*
		$pdf->SetY($offsety+(21*$offsetnline)+8);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"(สุทธิจากราคาสินค้าที่หักส่วนลด)                                             คะแนน",0,0,"L"); 
		
		$pdf->SetY($offsety+(21*$offsetnline)+8);
		$pdf->SetX($offsetx+$offsettab+61);
		$pdf->Cell($offsettab,0,number_format($pv[$i],0,'.',','),0,0,"R");  */

		$pdf->SetY($offsety+(21*$offsetnline)+8);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"คะแนนรักษายอด                                                                       คะแนน",0,0,"L"); 
		
		$pdf->SetY($offsety+(21*$offsetnline)+8);
		$pdf->SetX($offsetx+$offsettab+61);
		$pdf->Cell($offsettab,0,number_format($all_Qpv,0,'.',','),0,0,"R"); 

		$pdf->SetY($offsety+(21*$offsetnline)+13);       	
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"รวมยอดคะแนนส่วนตัว                                                             คะแนน",0,0,"L"); 
		
		$pdf->SetY($offsety+(21*$offsetnline)+13);       	
		$pdf->SetX($offsetx+$offsettab+61);
		$pdf->Cell($offsettab,0,number_format($all_pv,0,'.',','),0,0,"R"); 
	}
}
	if($satype == 'E' or substr($bill1[$i],1,1) == '6'){

	}else{
		$pdf->SetY($offsety+(21*$offsetnline)+33);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"สินค้ารับประกันความพึงพอใจ สามารถเปลี่ยนคืนสินค้าภายใน 15 วัน",0,0,"L"); 
		$pdf->SetY($offsety+(21*$offsetnline)+38);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"เอกสารนี้ จะสมบูรณ์ต่อเมื่อมีลายเซ็นของผู้รับเงิน",0,0,"L"); 
		$pdf->SetY($offsety+(21*$offsetnline)+43);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"เรียบร้อยแล้ว E. & O.E. (ผิด ตก ยกเว้น)",0,0,"L"); 
		$pdf->SetY($offsety+(21*$offsetnline)+48);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"โปรดชำระด้วยเช็คขีดคร่อมสั่งจ่ายในนามบริษัท ฯ เท่านั้น",0,0,"L"); 
		$pdf->SetY($offsety+(21*$offsetnline)+53);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"ข้าพเจ้าได้ตรวจรับสินค้าตามรายการข้างต้น",0,0,"L"); 
		$pdf->SetY($offsety+(21*$offsetnline)+58);
		$pdf->SetX($offsetx+$offsettab);
		$pdf->Cell(10*$offsettab-7,0,"ถูกต้องเรียบร้อย*ราคารวมภาษีมูลค่าเพิ่มแล้ว(ยกเว้นสินค้าปศุสัตว์) ",0,0,"L"); 
	}
//  Text down 2


	$offsetx = -10;
	$pdf->SetFont('angsa','',14);  


	$offsety=25;
	
//-------------------table---------------------
	$pdf->SetY($offsety+$offsetnline+10);
	$pdf->SetX($offsetx+(7*$offsettab)+33);
	$pdf->Cell((3*$offsettab),10,"ซื้อเพิ่อ",0,0,"L"); 
	$pdf->SetY($offsety+$offsetnline+15);
	$pdf->SetX($offsetx+(7*$offsettab)+33);
	$pdf->Cell((3*$offsettab),10,"หน้า",0,0,"L"); 
	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+33);
	$pdf->Cell((3*$offsettab),10,$send[$i],0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+33);
	$pdf->Cell((3*$offsettab),10,"เลขที่",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+33);
	$pdf->Cell((3*$offsettab),10,"วันที่",0,0,"L"); 
	$pdf->SetY($offsety+(7*$offsetnline));
	$pdf->SetX($offsetx+(7*$offsettab)+15);
	$pdf->Cell((3*$offsettab),10,$txtoption1[$i],0,0,"L"); 



	$pdf->SetY($offsety+(8*$offsetnline)-5);
	$pdf->SetX($offsetx+(7*$offsettab)+21);
	if(!empty($stockist_name[$i]))$pdf->Cell((3*$offsettab),10,"Stockist : ".$stockist[$i]." ".$stockist_name[$i],0,0,"L"); 
//info---------------------------------------
	
	$pdf->SetY($offsety+$offsetnline+10);
	$pdf->SetX($offsetx+(9*$offsettab)+5);
	$pdf->Cell((3*$offsettab),10,$typedef[$sa_type[$i]],0,0,"L"); 
	$pdf->SetY($offsety+$offsetnline+14);
	$pdf->SetX($offsetx+(9*$offsettab)+5);
	$pdf->Cell((3*$offsettab),10,($k+1).' / '.$npage,0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+5);
	$pdf->Cell((3*$offsettab),10,$bill1[$i],0,0,"L"); 
	/*$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)-10);
	$pdf->Cell((3*$offsettab),10,$mcode[$i],0,0,"L"); */
	$pdf->SetY($offsety+(6*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+5);
	$pdf->Cell((3*$offsettab),10,$sadate,0,0,"L");
	$pdf->SetY($offsety+(7*$offsetnline)-1);
	$pdf->SetX($offsetx+(9*$offsettab)+5);
//---------------------------------------------
	
	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"รหัสสมาชิก",0,0,"L"); 

	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+$offsettab+50);
	$pdf->Cell((2*$offsettab),10,$txtoption[$i],0,0,"L"); 

	
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"ชื่อ",0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10,"ที่อยู่",0,0,"L"); 
	//$pdf->SetY($offsety+(8*$offsetnline)-2);
	//$pdf->SetX($offsetx+$offsettab);
	//$pdf->Cell((2*$offsettab),10,"ที่อยู่จัดส่ง",0,0,"L"); 
	
	//$pdf->SetY($offsety+(7*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell((2*$offsettab),10,"ชื่อผู้แนะนำ",0,0,"L"); 
	
	//$pdf->SetY($offsety+(8*$offsetnline));
	//$pdf->SetX($offsetx+(7*$offsettab));
	//$pdf->Cell((2*$offsettab),10,"รหัส",0,0,"L"); 
//info---------------------------------------
	$pdf->SetY($offsety+(4*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab));
	$pdf->Cell((2*$offsettab),10,$mcode[$i],0,0,"L"); 
	$pdf->SetY($offsety+(5*$offsetnline));
	$pdf->SetX($offsetx+(2*$offsettab)-11);
	$pdf->Cell((2*$offsettab),10,$name[$mcode[$i]],0,0,"L"); 
	$pdf->SetY($offsety+(6*$offsetnline)+3);
	$pdf->SetX($offsetx+(2*$offsettab)-11);
	//$pdf->Cell((2*$offsettab),10,$add[$mcode[$i]],0,0,"L"); 
	$pdf->MultiCell(120,4,$add[$mcode[$i]],0,'L');
	//$pdf->SetY($offsety+(8*$offsetnline)+1);
	//$pdf->SetX($offsetx+(2*$offsettab));
	//$pdf->MultiCell(120,4,$caddress,0,'L');

//	$pdf->Cell((2*$offsettab),10,$caddress,0,0,"L"); 
	//	$pdf->SetY($offsety+(23*$offsetnline)+38);
	//$pdf->SetX($offsetx+($offsettab));
	//$pdf->MultiCell(0,5,$caddress,0,'L');
//$typedef[$sa_type[$i]]
	$offsetx=-3;
	$offsety=28;
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
	$pdf->Cell($offsettab,10,"รหัสสินค้า",0,0,"L"); 
	$pdf->SetY($offsety+(8*$offsetnline)+3);
	$pdf->SetX($offsetx+$offsettab-4);
	$pdf->Cell($offsettab,10,"Product Code",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx-14+(2*$offsettab)+5);
	//$pdf->Cell($offsettab,10,"รหัสสินค้า",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx-8+(3*$offsettab));
	$pdf->Cell($offsettab,10,"รายการ",0,0,"L"); 
	$pdf->SetY($offsety+(8*$offsetnline)+3);
	$pdf->SetX($offsetx-8+(3*$offsettab)-3);
	$pdf->Cell($offsettab,10,"Description",0,0,"L"); 

	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx-8+(5*$offsettab)+12);
	$pdf->Cell($offsettab,10,"หน่วยนับ",0,0,"L"); 
	$pdf->SetY($offsety+(8*$offsetnline)+3);
	$pdf->SetX($offsetx-8+(5*$offsettab)+14);
	$pdf->Cell($offsettab,10,"UOM",0,0,"L"); 

	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+14+(6*$offsettab)-7);
	$pdf->Cell($offsettab,10,"จำนวน",0,0,"L"); 
	$pdf->SetY($offsety+(8*$offsetnline)+3);
	$pdf->SetX($offsetx+14+(6*$offsettab)-8);
	$pdf->Cell($offsettab,10,"Quantitay",0,0,"L"); 

	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+6+(7*$offsettab));
	$pdf->Cell($offsettab,10,"ราคาต่อหน่วย",0,0,"L"); 
	$pdf->SetY($offsety+(8*$offsetnline)+3);
	$pdf->SetX($offsetx+6+(7*$offsettab)+3);
	$pdf->Cell($offsettab,10,"Unit Price",0,0,"L"); 

	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(8*$offsettab)+8);
	$pdf->Cell($offsettab,10,"ส่วนลด%/บาท",0,0,"L"); 
	$pdf->SetY($offsety+(8*$offsetnline)+3);
	$pdf->SetX($offsetx+(8*$offsettab)+11);
	$pdf->Cell($offsettab,10,"Discount",0,0,"L"); 
	
	$pdf->SetY($offsety+(8*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)+10);
	$pdf->Cell($offsettab,10,"จำนวนเงิน",0,0,"L"); 
	$pdf->SetY($offsety+(8*$offsetnline)+3);
	$pdf->SetX($offsetx+(9*$offsettab)+12);
	$pdf->Cell($offsettab,10,"Amonut",0,0,"L"); 

	$offsety = 205-$offsety1;
		

	$pdf->SetY($offsety+(26*$offsetnline)+3);
	$pdf->SetX($offsetx+$offsettab);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell((2*$offsettab),10,"ลงชื่อ.......................................ผู้ตรวจรับสินค้า",0,0,"C");
	else 	$pdf->Cell((2*$offsettab),10,"ลงชื่อ.......................................ผู้รับเงิน",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6'){}
	else $pdf->Cell((2*$offsettab),10,$uid[$i],0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell((2*$offsettab),10," ............./............./.............",0,0,"C");



	//$pdf->SetY($offsety+(26*$offsetnline));
	//$pdf->SetX($offsetx+(5*$offsettab)-7);
	//$pdf->Cell((2*$offsettab),10,"ได้รับสินค้าครบถ้วนแล้ว",0,0,"C");
	$pdf->SetY($offsety+(26*$offsetnline)+3);
	$pdf->SetX($offsetx+(5*$offsettab)-9);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell((2*$offsettab),10,"ลงชื่อ.......................................ผู้จัดทำ",0,0,"C");
	else 	$pdf->Cell((2*$offsettab),10,"ลงชื่อ.......................................ผู้จ่ายสินค้า",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab)-9);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell((2*$offsettab),10,$uid[$i],0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+(5*$offsettab)-9);
	$pdf->Cell((2*$offsettab),10,"............./............./.............",0,0,"C");

	
	$pdf->SetY($offsety+(26*$offsetnline)+3);
	$pdf->SetX($offsetx+(9*$offsettab)-18);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell((2*$offsettab),10,"ลงชื่อ.......................................ผู้มีอำนาจอนุมัติ",0,0,"C");
	else 	$pdf->Cell((2*$offsettab),10,"ลงชื่อ.......................................ผู้รับสินค้า",0,0,"C");
	$pdf->SetY($offsety+(28*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-18);
	$pdf->Cell((2*$offsettab),10,"",0,0,"C");
	$pdf->SetY($offsety+(29*$offsetnline));
	$pdf->SetX($offsetx+(9*$offsettab)-18);
	$pdf->Cell((2*$offsettab),10,"............./............./.............",0,0,"C");
	
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

	$pdf->SetFont('angsa','',12); 
	$pdf->SetY($offsety+(23*$offsetnline));
	$pdf->SetX($offsetx+($offsettab));
	//$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับสินค้าตามรายการที่ระบุไว้ข้างต้นครบถ้วนและสมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	//$pdf->SetY($offsety+(23*$offsetnline));
	//$pdf->SetX($offsetx+(5*$offsettab));
	//$pdf->Cell($offsettab,10,"ข้าพเจ้าได้รับผลิตภัณฑ์ที่ระบุไว้ข้างต้น และตรวจจำนวนในสภาพที่สมบูรณ์เรียบร้อยแล้ว",0,0,"L");
	$pdf->SetFont('angsa','',14); 
	
	$offsety = 35;
	//echo $kk;
	//exit;
	//var_dump($ssss);exit;
	$dddd = $k+1;
	$jj = 0;
	//echo $npage.' : '.$k+1;
	
	if($kdkdk == $npage){
	//	echo $usepage.' : '.$chklimit[$k+1].'<br>';
	$usepage =$chklimit[$k+1]+1;
	//	echo $usepage.' : '.$chklimit[$k+1];
	//	exit;
		//echo $ssss1.'d';
		//$ssss1 = $ssss1-$kk ;
		//echo $ssss1;
		//exit;
	}
	else $usepage =$chklimit[$k+1];
	//echo $chklimit1[$k].':';
	for($j=0;$j<$usepage;$j++){	

		//if($j < $chklimit1[$k]){
		if($j < mysql_num_rows($rs)){
			//echo $j.'<br>';
			$obj = $obj_product = mysql_fetch_object($rs);
			$pdf->SetY($offsety+((9+$jj)*$offsetnline));
			$pdf->SetX($offsetx+$offsettab-5);
			$pdf->Cell($offsettab,10,$obj->pcode,0,0,"L"); 
			//$pdf->Cell($offsettab,10,($jj+1+($k*$nitem)),0,0,"L"); 
			
			$pdf->SetY($offsety+((9+$jj)*$offsetnline));
			$pdf->SetX($offsetx-14+(2*$offsettab)+5);
			//$pdf->Cell($offsettab,10,$obj->pcode,0,0,"L"); 
			
			$pdf->SetY($offsety+((9+$jj)*$offsetnline));
			$pdf->SetX($offsetx-8+(3*$offsettab)-10);
			$pdf->Cell($offsettab,10,substr($obj->pdesc,0,48),0,0,"L"); 

			$pdf->SetY($offsety+((9+$jj)*$offsetnline));
			$pdf->SetX($offsetx-8+(5*$offsettab)+8);
			$pdf->Cell($offsettab,10,$obj->unit,0,0,"C"); 


			$pdf->SetY($offsety+((9+$jj)*$offsetnline));
			$pdf->SetX($offsetx+(6*$offsettab)-6);
			$pdf->Cell($offsettab,10,number_format($obj->qty,0,'.',','),0,0,"R"); 
			
			$pdf->SetY($offsety+((9+$jj)*$offsetnline));
			$pdf->SetX($offsetx+(7*$offsettab)+4);
			$pdf->Cell($offsettab,10,number_format($obj->price,2,'.',','),0,0,"R"); 
			
			$pdf->SetY($offsety+((9+$jj)*$offsetnline));
			$pdf->SetX($offsetx+(8*$offsettab)+5);
			if(!empty($obj->discount))$discount = number_format($obj->discount,2,'.',',').'%';
			else $discount = "";
			$pdf->Cell($offsettab,10,$discount,0,0,"R"); 

			
			$pdf->SetY($offsety+((9+$jj)*$offsetnline));
			$pdf->SetX($offsetx+(9*$offsettab)+6);
			//$pdf->Cell($offsettab,10,number_format(($obj->price*$obj->qty),2,'.',','),0,0,"R"); 
			$pdf->Cell($offsettab,10,number_format(($obj->amt),2,'.',','),0,0,"R"); 
			//$sum += $obj->price*$obj->qty;
			$sum += $obj->amt;
			$sumpv += $obj->pv*$obj->qty;
			//$ftotal += $obj->price*$obj->qty*($obj->ctax/100);
			//if($obj->ctax == '0')$ttotal += $obj->price*$obj->qty;
			$sumbv += $obj->bv*$obj->qty;
			$sumfv += $obj->fv*$obj->qty;
			$sumqty += $obj->qty;
			$sumprice += $obj->price;
			$pcode_ch = $obj->pcode;
			$jj++;
			$sql="SELECT * FROM ".$dbprefix."product_package1 where package = '".$pcode_ch."'";
			//exit;
			$rspack = mysql_query($sql);
			if(mysql_num_rows($rspack) > 0)
			{
				for($m=0;$m<mysql_num_rows($rspack);$m++){
					
					$sqlObj_pack = mysql_fetch_object($rspack);
					$pcode_pack =$sqlObj_pack->pcode;
					$pdf->SetY($offsety+((9+$jj)*$offsetnline));
					$pdf->SetX($offsetx+$offsettab-5+5);
					$pdf->Cell($offsettab,10,$sqlObj_pack->pcode,0,0,"L"); 
					//$pdf->Cell($offsettab,10,($jj+1+($k*$nitem)),0,0,"L"); 
					
					$pdf->SetY($offsety+((9+$jj)*$offsetnline));
					$pdf->SetX($offsetx-14+(2*$offsettab)+5);
					//$pdf->Cell($offsettab,10,$sqlObj_pack->pcode,0,0,"L"); 
					
					$pdf->SetY($offsety+((9+$jj)*$offsetnline));
					$pdf->SetX($offsetx-8+(3*$offsettab)-10+5);
					$pdf->Cell($offsettab,10,substr($sqlObj_pack->pdesc,0,48),0,0,"L"); 

					$pdf->SetY($offsety+((9+$jj)*$offsetnline));
					$pdf->SetX($offsetx-8+(5*$offsettab)+8+5);
					$pdf->Cell($offsettab,10,$sqlObj_pack->unit,0,0,"C"); 


					$pdf->SetY($offsety+((9+$jj)*$offsetnline));
					$pdf->SetX($offsetx+(6*$offsettab)-6);
					//echo $sqlObj_pack->qty.' : '.$obj->qty;
					//exit;
					$pdf->Cell($offsettab,10,number_format($sqlObj_pack->qty*$obj->qty,0,'.',','),0,0,"R"); 
					
					$pdf->SetY($offsety+((9+$jj)*$offsetnline));
					$pdf->SetX($offsetx+(7*$offsettab)+4);
					//$pdf->Cell($offsettab,10,number_format($sqlObj_pack->price,2,'.',','),0,0,"R"); 
					
					$pdf->SetY($offsety+((9+$jj)*$offsetnline));
					$pdf->SetX($offsetx+(8*$offsettab));
				//	$pdf->Cell($offsettab,10,number_format($sqlObj_pack->price,2,'.',','),0,0,"R"); 

					
					$pdf->SetY($offsety+((9+$jj)*$offsetnline));
					$pdf->SetX($offsetx+(9*$offsettab)+6);
					//$pdf->Cell($offsettab,10,number_format(($sqlObj_pack->price*$sqlObj_pack->qty),2,'.',','),0,0,"R"); 
					//$sum += $sqlObj_pack->price*$sqlObj_pack->qty;
					//$sumpv += $sqlObj_pack->pv*$sqlObj_pack->qty;
					//$ftotal += $sqlObj_pack->price*$sqlObj_pack->qty*($sqlObj_pack->ctax/100);
					//if($sqlObj_pack->ctax == '0')$ttotal += $sqlObj_pack->price*$sqlObj_pack->qty;
					//$sumbv += $sqlObj_pack->bv*$sqlObj_pack->qty;
					//$sumfv += $sqlObj_pack->fv*$sqlObj_pack->qty;
					$sumqty += $sqlObj_pack->qty*$obj->qty;
					//$sumprice += $obj->price;
					$jj++;
				}
			}
		}else if($kk>0 and $npage == $dddd){
			//var_dump($txtShow);
			//exit;
			for($iii=0;$iii<count($txtShow);$iii++){
				$sssss = 1;
				//echo $iii.'<br>'
				//if(!empty($txtShow[$uuu])){
					$uuu = 2*$iii;
					$pdf->SetY($offsety+((10+$jj+($iii))*$offsetnline));
					$pdf->SetX($offsetx+$offsettab-5);
					$pdf->Cell($offsettab,10,$txtShow[$uuu]." ".$txtShow1[$uuu],0,0,"L"); 
					$pdf->SetY($offsety+((11+$jj+($iii))*$offsetnline));
					$pdf->SetX($offsetx+$offsettab-5);
					$pdf->Cell($offsettab,10,$txtShow[$uuu+1]); 
				//}
				$jj++;
			}
			$j =$usepage;
		//	exit;

		}
	}

	

//exit;

	//$ssum = $sum-$ftotal;
	if($chksano == 'S6' or $chksano == 'A6' or $chksano == 'K6' or $chksano == 'P6')$ltotal = $sum;
	if($k==$npage-1){
		$offsety = 83-$offsety1;

		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(6*$offsettab));
		//$pdf->Cell($offsettab,10,number_format($sumpv,0,'.',','),0,0,"R"); 

		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(7*$offsettab));
		//$pdf->Cell($offsettab,10,number_format($sumqty,0,'.',','),0,0,"R"); 
		
		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab));
		//$pdf->Cell($offsettab,10,number_format($sumprice,2,'.',','),0,0,"R"); 




		$pdf->SetY($offsety+(20*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab));
		//$pdf->Cell($offsettab,10,number_format($sum,2,'.',','),0,0,"R"); 

		$pdf->SetY($offsety+(21*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab));
		//$pdf->Cell($offsettab,10,number_format($sum*7/107,2,'.',','),0,0,"R");
		
		$pdf->SetY($offsety+(22*$offsetnline));
		$pdf->SetX($offsetx+(9*$offsettab));
		//$pdf->Cell($offsettab,10,number_format($sum-($sum*7/107),2,'.',','),0,0,"R"); 
		//$pdf->Cell($offsettab,10,number_format('100000',2,'.',','),0,0,"R"); 

	$offsety = 165-$offsety1;
	$pdf->SetY($offsety+(37*$offsetnline)+6);
	$pdf->SetX($offsetx+$offsettab+50);
	if($satype == 'H' or $satype == 'K')$pdf->Cell((2*$offsettab),10,"จำนวน PV ในใบกำกับภาษีใบนี้ที่สามารถแจงยอดได้ = ".$sumpv." PV และ สามารถแจงยอดได้ถึงวันที่ ".$hdate[$i]."",0,0,"C");

		$pdf->SetY($offsety+(21*$offsetnline)+18);
		$pdf->SetX($offsetx+$offsettab-5);
		$pdf->Cell($offsettab+70,10,'= ( '.moneytotext($totall[$i]).' )',1,0,"L"); 

//Text 2
	$offsetx = 90;
	$pdf->SetY($offsety+(21*$offsetnline)+3);
	$pdf->SetX($offsetx+$offsettab);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6') $pdf->Cell(10*$offsettab-7,0,"มุลค่าตามกำกับใบภาษีเดิม                                         ..............................",0,0,"L"); 
	else $pdf->Cell(10*$offsettab-7,0,"รวมราคาสินค้าทั้งสิ้น                                                ..............................",0,0,"L"); 
		
	$pdf->SetY($offsety+(21*$offsetnline)+2);
	$pdf->SetX($offsetx+$offsettab+73);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell($offsettab,0,number_format($sstotal,2,'.',','),0,0,"R"); 
	else $pdf->Cell($offsettab,0,number_format($sum,2,'.',','),0,0,"R"); 
	$pdf->SetY($offsety+(21*$offsetnline)+11);
	$pdf->SetX($offsetx+$offsettab);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell(10*$offsettab-7,0,"มูลค่าที่ถูกต้อง                                                            ..............................",0,0,"L"); 
	else $pdf->Cell(10*$offsettab-7,0,"ภาษีมูลค่าเพิ่ม                                                            ..............................",0,0,"L"); 
	
	$pdf->SetY($offsety+(21*$offsetnline)+10);
	$pdf->SetX($offsetx+$offsettab+73);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell($offsettab,0,number_format($sstotal-$sum,2,'.',','),0,0,"R"); 
	else $pdf->Cell($offsettab,0,number_format($sum*7/107,2,'.',','),0,0,"R"); 
	$pdf->SetY($offsety+(21*$offsetnline)+19);
	$pdf->SetX($offsetx+$offsettab);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell(10*$offsettab-7,0,"มูลค่าผลต่างทั้งสิ้นที่ต้องจ่ายชำระ                             ..............................",0,0,"L"); 
	else $pdf->Cell(10*$offsettab-7,0,"มูลค่าสินค้า ไม่รวมภาษีมูลค่าเพิ่ม                             ..............................",0,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+18);
	$pdf->SetX($offsetx+$offsettab+73);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell($offsettab,0,number_format($sum,2,'.',','),0,0,"R"); 
	else $pdf->Cell($offsettab,0,number_format($sum-($sum*7/107),2,'.',','),0,0,"R"); 
	$pdf->SetY($offsety+(21*$offsetnline)+27);
	$pdf->SetX($offsetx+$offsettab);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell(10*$offsettab-7,0,"ภาษีมูลค่าเพิ่ม                                                             ..............................",0,0,"L"); 
	else $pdf->Cell(10*$offsettab-7,0,"มูลค่าสินค้า ยกเว้นภาษีมูลค่าเพิ่ม                              ..............................",0,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+26);
	$pdf->SetX($offsetx+$offsettab+73);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell($offsettab,0,number_format($tax_tax,2,'.',','),0,0,"R"); 
	else $pdf->Cell($offsettab,0,number_format($ttotal,2,'.',','),0,0,"R"); 
	/*$pdf->SetY($offsety+(21*$offsetnline)+39);
	$pdf->SetX($offsetx+$offsettab);
	$pdf->Cell(10*$offsettab-7,0,"รวมตอนนี้                                                                 ..............................",0,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+30);
	$pdf->SetX($offsetx+$offsettab+73);
	$pdf->Cell($offsettab,0,number_format($alltotal[$i],2,'.',','),0,0,"R"); */
	$pdf->SetY($offsety+(21*$offsetnline)+35);
	$pdf->SetX($offsetx+$offsettab);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell(10*$offsettab-7,0,"มูลค่าสินค้าที่ไม่รวมภาษีมูลค่าเพิ่ม                            ..............................",0,0,"L"); 
	else $pdf->Cell(10*$offsettab-7,0,"รวมลดหนี้                                                                 ..............................",0,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+34);
	$pdf->SetX($offsetx+$offsettab+73);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell($offsettab,0,number_format($cost_tax,2,'.',','),0,0,"R"); 
	else $pdf->Cell($offsettab,0,number_format($ltotal,2,'.',','),0,0,"R"); 
	$pdf->SetY($offsety+(21*$offsetnline)+43);
	$pdf->SetX($offsetx+$offsettab);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell(10*$offsettab-7,0,"มูลค่าสินค้าที่ยกเว้นภาษีมูลค่าเพิม                             ..............................",0,0,"L"); 
	else $pdf->Cell(10*$offsettab-7,0,"ค่าบริการ                              ภาษี                  รวม      ..............................",0,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+43);
	$pdf->SetX($offsetx+$offsettab+15);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6'){} else $pdf->Cell($offsettab,0,number_format($cost_service,2,'.',','),0,0,"R"); 
	$pdf->SetY($offsety+(21*$offsetnline)+43);
	$pdf->SetX($offsetx+$offsettab+35);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6'){} else $pdf->Cell($offsettab,0,number_format($tax_service,2,'.',','),0,0,"R"); 
	$pdf->SetY($offsety+(21*$offsetnline)+42);
	$pdf->SetX($offsetx+$offsettab+73);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6')$pdf->Cell($offsettab,0,number_format($ttotal,2,'.',','),0,0,"R"); 
	else $pdf->Cell($offsettab,0,number_format($total_service,2,'.',','),0,0,"R"); 
	
	$pdf->SetY($offsety+(21*$offsetnline)+51);
	$pdf->SetX($offsetx+$offsettab);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6'){}else $pdf->Cell(10*$offsettab-7,0,"ค่าบริการอื่นๆ                      ภาษี                  รวม      ..............................",0,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+51);
	$pdf->SetX($offsetx+$offsettab+15);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6'){} else $pdf->Cell($offsettab,0,number_format($cost_other,2,'.',','),0,0,"R"); 
	$pdf->SetY($offsety+(21*$offsetnline)+51);
	$pdf->SetX($offsetx+$offsettab+35);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6'){} else $pdf->Cell($offsettab,0,number_format($tax_other,2,'.',','),0,0,"R"); 
	$pdf->SetY($offsety+(21*$offsetnline)+50);
	$pdf->SetX($offsetx+$offsettab+73);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6'){} else $pdf->Cell($offsettab,0,number_format($total_other,2,'.',','),0,0,"R"); 
	$pdf->SetY($offsety+(21*$offsetnline)+59);
	$pdf->SetX($offsetx+$offsettab);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6'){} else $pdf->Cell(10*$offsettab-7,0,"จำนวนเงินที่ต้องชำระทั้งสิ้น                                     ..............................",0,0,"L"); 
	$pdf->SetY($offsety+(21*$offsetnline)+58);
	$pdf->SetX($offsetx+$offsettab+73);
	if($satype == 'E' or substr($bill1[$i],1,1) == '6'){} else $pdf->Cell($offsettab,0,number_format($totall[$i],2,'.',','),0,0,"R"); 



		$offsety = 83-$offsety1;

		//$pdf->SetY($offsety+(20*$offsetnline));
		//$pdf->SetX($offsetx+(4*$offsettab)-15);
		//$pdf->Cell($offsettab,10,'= ( '.moneytotext($sum).' )',0,0,"C"); 
		//$pdf->Cell($offsettab,10,'= ( สี่หมื่นสามพันสองร้อยห้าสิบบาทห้าสิบสองสตางค์ )',0,0,"C"); 
		$offsety = 85-$offsety1;
		$pdf->SetY($offsety+(21*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab)-4);
		//$pdf->Cell($offsettab,10,"ภาษีมูลค่าเพิ่ม 7%",0,0,"L");
		
		$pdf->SetY($offsety+(22*$offsetnline));
		$pdf->SetX($offsetx+(8*$offsettab)-4);
		//$pdf->Cell($offsettab,10,"มูลค่าสินค้า",0,0,"L");

	}
}}
$pdf->Output("./pdf/doc.pdf");


function getB($mcd,$sadate){	
		$date = explode('-',$sadate);
		$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_asaleh WHERE mcode='$mcd' and  sa_type='B' and sadate like '%".$date[2].'-'.$date[1]."%' ";
		$rs = mysql_query($sql);
		$all_Qpv = mysql_result($rs,0,'all_pv'); 
		
		mysql_free_result($rs);
		$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_holdhead WHERE mcode='$mcd' and sa_type='B' and sadate like '%".$date[2].'-'.$date[1]."%' ";	
		$rs = mysql_query($sql);
		$all_Qpv = ($all_Qpv+mysql_result($rs,0,'all_pv')); 
		$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ali_special_point WHERE  sa_type='VQ' AND mcode='$mcd' and sadate like '%".$date[0].'-'.$date[1]."%' group by mcode ";
			//	echo "$sql3<BR>";
				$rs3=mysql_query($sql3);
				if (mysql_num_rows($rs3)>0) {
					$sqlObj3 = mysql_fetch_object($rs3);
					$total_fv3= $sqlObj3->tot_pv;
				}else{
					$total_fv3=0;
				}
				mysql_free_result($rs3);			

		$all_Qpv = $all_Qpv +$total_fv3;

	return $all_Qpv;
	}

function getQ($mcd,$sadate){
		//$date = explode('-',$sadate);
		$Ym = date("Y-m", strtotime("-1 Months",strtotime($sadate)));
		$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_asaleh WHERE mcode='$mcd' and  sa_type='Q' and sadate like '%".$Ym."%' ";
	
		$rs = mysql_query($sql);
		$all_Qpv = mysql_result($rs,0,'all_pv'); 
		mysql_free_result($rs);

		$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_holdhead WHERE mcode='$mcd' and sa_type='Q' and sadate like '%".$Ym."%' ";
		//echo $sql;
		$rs = mysql_query($sql);
		$all_Qpv = ($all_Qpv+mysql_result($rs,0,'all_pv')); 

return $all_Qpv;
}

function gettotalpv($dbprefix,$mcode){
	$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ".$dbprefix."special_point WHERE  sa_type='VA' AND mcode='$mcode' group by mcode ";
				//if($mcode == '0000075')echo "$sql3<BR>";
				$rs3=mysql_query($sql3);
				if (mysql_num_rows($rs3)>0) {
					$sqlObj3 = mysql_fetch_object($rs3);
					$total_fv3= $sqlObj3->tot_pv;
				}else{
					$total_fv3=0;
				}
				mysql_free_result($rs3);
				//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_fv3;
}


?>
<? ob_end_flush();?>
<meta content="0;URl=./pdfshow.php" http-equiv="refresh" />
