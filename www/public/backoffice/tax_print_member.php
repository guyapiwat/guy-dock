<? session_start(); ?><? include("connectmysql.php");?><? include("money2text.php");?><? include("inc.wording.php");?><? ob_start();?><?if(isset($_GET['bid']))	$sano = $_GET['bid'];	$dbprefix = "ali_";	$employee_name = $wording_lan["company_name"] ;	$employee_address = $wording_lan["company_address"];	$employee_phone = $wording_lan["company_phone"];	$employee_phone1 = $wording_lan["company_id"];	$fdate = $_GET['fdate'];	$tdate = $_GET['tdate'];	?><?//list($fsano,$tsano)=explode("-",$sano);/*if($tsano==""){	$tsano = $fsano;}*/$sql_invent="SELECT * FROM ".$dbprefix."invent  INNER JOIN district ON (".$dbprefix."invent.districtId=district.districtId)INNER JOIN amphur ON (".$dbprefix."invent.amphurId=amphur.amphurId) INNER JOIN province ON (".$dbprefix."invent.provinceId=province.provinceId) WHERE inv_code='LT01'"; $result=mysql_query($sql_invent);	$obj_new = mysql_fetch_object($result);	$employee_name_new = $obj_new->address.'�ǧ.'.$obj_new->districtName;	$employee_address_new='  ࢵ.'.$obj_new->amphurName.'  �ѧ��Ѵ.'.$obj_new->provinceName;	$phone1 = '���Ѿ��  '.$obj_new->home_t;	$phone2 = ' ����� '.$obj_new->fax;	$tax11 = $obj_new->no_tax;	$zip1 = $obj_new->zip;		$sql = "SELECT m.acc_no,m.bankcode";		$sql .= ",a.id,a.rcode,a.mcode,m.name_t,a.pv,a.pvb,a.tot_tax,SUM(a.totaly) as total1,m.id_card  ";		$sql .= ",CONCAT(address,' ',zip) AS address ";		$sql .= "FROM ".$dbprefix."cmbonus a ";		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";			if($sano <> "")			{				$sql .= " WHERE a.mcode LIKE '$sano' ";			}				else			{				$sql .= " WHERE a.paydate >= '".$fdate."' and a.paydate <= '".$tdate."' and  a.status = 1 ";
			}		$sql .= "GROUP BY a.mcode order by a.mcode";		//echo $sql;		$rs=mysql_query($sql);if(mysql_num_rows($rs)<=0){		?><table width="300" align="center" bgcolor="#990000"><tr><td align="center">��辺������<?=$sano?>	<br /><input type="button" value="�Դ˹�ҹ��" onClick="window.close()" /></td></tr></table><?	exit;}for($i=0;$i<mysql_num_rows($rs);$i++){	$obj = mysql_fetch_object($rs);	$taxalls[$i] = $obj->total1;	$mcode[$i] = $obj->mcode;	$add[$mcode[$i]] = $obj->caddress;	$add[$mcode[$i]] .= $obj->districtName==""?"":" �.".$obj->districtName;	$add[$mcode[$i]] .= $obj->amphurName==""?"":" �.".$obj->amphurName;	$add[$mcode[$i]] .= $obj->provinceName==""?"":" �.".$obj->provinceName;	$add[$mcode[$i]] .= " ".$obj->czip;	if($obj->send == '1')$caddress = $add[$mcode[$i]];	else $caddress = "";	if($obj->send == '1')$send_text = "�Ѵ��";	else $send_text = "�Ѻ�ͧ";	$bill[$i] = $obj->id;	$bill1[$i] = $obj->sano;		$sql2 = "SELECT * FROM ".$dbprefix."member ";	$sql2 .= "LEFT JOIN district ON (".$dbprefix."member.districtId=district.districtId)";	$sql2 .= "LEFT JOIN amphur ON (".$dbprefix."member.amphurId=amphur.amphurId)";	$sql2 .= "LEFT JOIN province ON (".$dbprefix."member.provinceId=province.provinceId)";	$sql2 .= "WHERE mcode='".$mcode[$i]."' LIMIT 1 ";	//echo $sql2;	$rs2 = mysql_query($sql2);	$name_f = mysql_result($rs2,0,'name_f');	//if($name_f == '���.')$name_f = '����ѷ';	$name[$mcode[$i]] = $name_f .' '.$obj->name_t;	$mobile = mysql_result($rs2,0,'mobile');	$id_card[] = mysql_result($rs2,0,'id_card');	$id_tax = mysql_result($rs2,0,'id_tax');//	if(!empty($id_card) and $name_f != '����ѷ' and $name_f != '��ҧ�����ǹ�ӡѴ')$name[$mcode[$i]] .= ' �Ţ�ѵû�ЪҪ� : '.$id_card;//	if(!empty($id_tax) and ($name_f == '����ѷ' or $name_f == '��ҧ�����ǹ�ӡѴ'))$name[$mcode[$i]] .= ' �Ţ��Шӵ�Ǽ���������� : '.$id_card;//	if(!empty($mobile))$name[$mcode[$i]] .= ' ������Ͷ�� : '.$mobile;	$add[$mcode[$i]] = mysql_result($rs2,0,'address');	$add[$mcode[$i]] .= mysql_result($rs2,0,'districtId')==""?"":" �.".mysql_result($rs2,0,'districtId');	$add[$mcode[$i]] .= mysql_result($rs2,0,'amphurId')==""?"":" �.".mysql_result($rs2,0,'amphurId');	$add[$mcode[$i]] .= mysql_result($rs2,0,'provinceId')==""?"":" �.".mysql_result($rs2,0,'provinceId');	$add[$mcode[$i]] .= " ".mysql_result($rs2,0,'zip');	$sp_code[$mcode[$i]] = mysql_result($rs2,0,'sp_code');	$sp_name[$mcode[$i]] = mysql_result($rs2,0,'sp_name');	$add_idcard= " �Ţ������������� ".mysql_result($rs2,0,'id_card');	mysql_free_result($rs2);}list($y,$m,$d) = explode('-',date("Y-m-d"));mysql_free_result($rs);//$pdf->AddFont('tahoma','','tahoma.php'); define('FPDF_FONTPATH','fpdf/font/'); require('./fpdf/fpdf.php'); //require('table1.php');$pdf=new FPDF('P','mm','A4');//$pdf=new FPDF('P','mm','Letter');//$pgsize=array(170,216);			// (width,height)//$pgsize=array(148,210);//$pdf=new FPDF('P','mm',$pgsize);//$pdf=new FPDF('P','mm','A5');$pdf->AddFont('angsa','','angsa.php'); $rem = 0;$nitem = 16;$ssss = 0;$ssss2 = 0;$kkk = 1;$chklimit[0] = 0;//$chklimit1[0] = 0;$chkpage = 0;$nitem = 14;for($i=0;$i<sizeof($bill);$i++){	$sql="SELECT * FROM ".$dbprefix."asaled WHERE sano='$bill[$i]' ";	$rs=mysql_query($sql);	$npage = ceil(mysql_num_rows($rs)/$nitem);	mysql_free_result($rs);	$sum = 0;	$sumpv = 0;	//$tax1 = $taxalls;	$tax2 = ".00";	$years = date("Y");	$dates = date("d/m/Y");		$sql="SELECT * FROM ".$dbprefix."asaled WHERE sano='$bill[$i]' ";	$rs=mysql_query($sql);		$pdf->AddPage(); 		$pdf->SetTopMargin(0); 	$pdf->SetRightMargin(0); 		$offsetx=-10;	$offsety=0;	$offsety1=100;	$offsettab = 20;	$offsetnline = 5;	$inv_ref = "";	$pdf->SetFont('angsa','',14);  		$pdf->Image('tavi_50.jpg',2,8,209); //file,x,y,w=0,h=0	$pdf->SetFont('angsa','',18); 	$pdf->SetY($offsety+4*$offsetnline+5);	$pdf->SetX($offsetx+$offsettab);	$pdf->Cell((4*$offsettab),10,"����ѷ $employee_name",0,0,"L");		$no_tax_arr = str_split($tax11);	$ii = 0;	for($j=0;$j<=sizeof($no_tax_arr);$j++)	{		$pdf->SetFont('angsa','',20); 		$pdf->SetY($offsety+3*$offsetnline+1);		$pdf->SetX(($offsetx+5*$offsettab)+9+$ii);		$pdf->Cell($offsettab,10,"$no_tax_arr[$j]",0,0,"L");		$ii +=8.5;	}	$pdf->SetFont('angsa','',14); 	$pdf->SetY($offsety+6*$offsetnline+4);	$pdf->SetX($offsetx+$offsettab+3);	$pdf->Cell((4*$offsettab),10,"$employee_name_new$employee_address_new $zip1",0,0,"L");		$no_cardm_arr = str_split($id_card[$i]);	$kk = 15;	for($k=0;$k<=sizeof($no_tax_arr);$k++)	{		if($k == 0)		{			$pdf->SetFont('angsa','',20); 			$pdf->SetY(($offsety+10*$offsetnline)+3);			$pdf->SetX(($offsetx+5*$offsettab)+20);			$pdf->Cell($offsettab,10,"$no_cardm_arr[$k]",0,0,"L");		}		else if($k == 1 or $k == 2 or $k == 3 or $k == 4)		{			$pdf->SetFont('angsa','',20); 			$pdf->SetY(($offsety+10*$offsetnline)+3);			$pdf->SetX(($offsetx+5*$offsettab)+15+$kk);			$pdf->Cell($offsettab,10,"$no_cardm_arr[$k]",0,0,"L");			$kk += 6.5;		}		else if($k == 5 or $k == 6 or $k == 7 or $k == 8 or $k == 9)		{			$pdf->SetFont('angsa','',20); 			$pdf->SetY(($offsety+10*$offsetnline)+3);			$pdf->SetX(($offsetx+5*$offsettab)+18+$kk);			$pdf->Cell($offsettab,10,"$no_cardm_arr[$k]",0,0,"L");			$kk += 6.5;		}		else if($k == 10 or $k == 11)		{			$pdf->SetFont('angsa','',20); 			$pdf->SetY(($offsety+10*$offsetnline)+3);			$pdf->SetX(($offsetx+5*$offsettab)+21+$kk);			$pdf->Cell($offsettab,10,"$no_cardm_arr[$k]",0,0,"L");			$kk += 6.5;		}		else		{			$pdf->SetFont('angsa','',20); 			$pdf->SetY(($offsety+10*$offsetnline)+3);			$pdf->SetX(($offsetx+5*$offsettab)+24+$kk);			$pdf->Cell($offsettab,10,"$no_cardm_arr[$k]",0,0,"L");		}			}		$pdf->SetFont('angsa','',16); 	$pdf->SetY($offsety+12*$offsetnline+5);	$pdf->SetX($offsetx+$offsettab);	$pdf->Cell((4*$offsettab),10,$name[$mcode[$i]],0,0,"L");		$pdf->SetFont('angsa','',14); 	$pdf->SetY($offsety+14*$offsetnline+4);	$pdf->SetX($offsetx+$offsettab+3);	$pdf->Cell((4*$offsettab),10,$add[$mcode[$i]],0,0,"L");		//  �ӴѺ	$pdf->SetFont('angsa','',24); 	$pdf->SetY($offsety+17*$offsetnline+1);	$pdf->SetX($offsetx+2*$offsettab);	$pdf->Cell((4*$offsettab),10,$i+1,0,0,"L");		// ��ͧ��� �ѹ/��͹/�� ���� �ѹ������	$pdf->SetFont('angsa','',16); 	$pdf->SetY($offsety+21*$offsetnline+6);	$pdf->SetX(($offsetx+$offsettab*6)+11);	$pdf->Cell((4*$offsettab),10,"$years",0,0,"L");		// ��ͧ���  �ӹǹ�Թ������	$pdf->SetY($offsety+21*$offsetnline+6);	$pdf->SetX($offsetx+(5*$offsettab)+25.5);	$pdf->Cell((3*$offsettab),10,number_format("$taxalls[$i]",2,".",","),0,0,"R");		// ��ͧ��� ���շ���ѡ��й������	$pdf->SetY($offsety+21*$offsetnline+6);	$pdf->SetX($offsetx+(8*$offsettab)-2.5);	$pdf->Cell((3*$offsettab),10,"$tax2",0,0,"R");		// ��ͧ���  �ӹǹ�Թ���������	$pdf->SetY($offsety+44*$offsetnline+5);	$pdf->SetX($offsetx+(5*$offsettab)+25.5);	$pdf->Cell((3*$offsettab),10,number_format("$taxalls[$i]",2,".",","),0,0,"R");		// ��ͧ���  ������շ���ѡ��й������	$pdf->SetY($offsety+44*$offsetnline+5);	$pdf->SetX($offsetx+(8*$offsettab)-2.5);	$pdf->Cell((3*$offsettab),10,"$tax2",0,0,"R");		$pdf->SetFont('angsa','',16); 	$pdf->SetY($offsety+52*$offsetnline+4);	$pdf->SetX(($offsetx+$offsettab*4));	$pdf->Cell((4*$offsettab),10,"$dates",0,0,"L");}$pdf->Output("./pdf/doc.pdf");function getB($mcd,$sadate){			$date = explode('-',$sadate);		$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_asaleh WHERE mcode='$mcd' and  sa_type='B' and sadate like '%".$date[2].'-'.$date[1]."%' ";		$rs = mysql_query($sql);		$all_Qpv = mysql_result($rs,0,'all_pv'); 				mysql_free_result($rs);		$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_holdhead WHERE mcode='$mcd' and sa_type='B' and sadate like '%".$date[2].'-'.$date[1]."%' ";			$rs = mysql_query($sql);		$all_Qpv = ($all_Qpv+mysql_result($rs,0,'all_pv')); 		$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ali_special_point WHERE  sa_type='VQ' AND mcode='$mcd' and sadate like '%".$date[0].'-'.$date[1]."%' group by mcode ";			//	echo "$sql3<BR>";				$rs3=mysql_query($sql3);				if (mysql_num_rows($rs3)>0) {					$sqlObj3 = mysql_fetch_object($rs3);					$total_fv3= $sqlObj3->tot_pv;				}else{					$total_fv3=0;				}				mysql_free_result($rs3);					$all_Qpv = $all_Qpv +$total_fv3;	return $all_Qpv;	}function getQ($mcd,$sadate){		//$date = explode('-',$sadate);		$Ym = date("Y-m", strtotime("-1 Months",strtotime($sadate)));		$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_asaleh WHERE mcode='$mcd' and  sa_type='Q' and sadate like '%".$Ym."%' ";			$rs = mysql_query($sql);		$all_Qpv = mysql_result($rs,0,'all_pv'); 		mysql_free_result($rs);		$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_holdhead WHERE mcode='$mcd' and sa_type='Q' and sadate like '%".$Ym."%' ";		//echo $sql;		$rs = mysql_query($sql);		$all_Qpv = ($all_Qpv+mysql_result($rs,0,'all_pv')); return $all_Qpv;}function gettotalpv($dbprefix,$mcode){	$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ".$dbprefix."special_point WHERE  sa_type='VA' AND mcode='$mcode' group by mcode ";				//if($mcode == '0000075')echo "$sql3<BR>";				$rs3=mysql_query($sql3);				if (mysql_num_rows($rs3)>0) {					$sqlObj3 = mysql_fetch_object($rs3);					$total_fv3= $sqlObj3->tot_pv;				}else{					$total_fv3=0;				}				mysql_free_result($rs3);				//if($mcode == '0000075')echo "$total_fv3<BR>";	return $total_fv3;}function getUnit($pcode) {	$sql = "SELECT unit FROM ali_product WHERE pcode='$pcode'";	$rs = mysql_query($sql);	$unit = @mysql_result($rs,0,'unit'); 	return $unit;}function getMemDetail($mcode,$code) {	$sql = "SELECT $code FROM ali_member WHERE mcode='$mcode'";	$rs = mysql_query($sql);	$show = mysql_result($rs,0,$code); 	return $show;}function getBillDetail($sano,$code) {	$sql = "SELECT $code FROM ali_asaleh WHERE sano='$sano'";	$rs = mysql_query($sql);	$show = @mysql_result($rs,0,$code); 	return $show;}function getBankTranfer($mapping_code) {	$sql = "SELECT pay_desc FROM ali_payment_type WHERE mapping_code='$mapping_code'";	$rs = mysql_query($sql);	$show = @mysql_result($rs,0,"pay_desc"); 	return $show;}function getBranch($inv_code) {	$sql = "SELECT inv_desc FROM ali_invent WHERE inv_code='$inv_code'";	$rs = mysql_query($sql);	$show = @mysql_result($rs,0,"inv_desc"); 	return $show;}function getUser($usercode) {	$sql = "SELECT username FROM ali_user WHERE usercode='$usercode'";	$rs = mysql_query($sql);	$show = @mysql_result($rs,0,"username"); 	return $show;}function getThaiDate ($date){	$date = explode("-",$date);	$date = $date[0]." ".gen_month($date[1])." ".$date[2];	return $date;}function gen_month($id){	$thai_day =array("�ѹ���","�ѧ���","�ظ","����ʺ��","�ء��","�����","�ҷԵ��");	$thai_month =array(		"01"=>"���Ҥ�",		"02"=>"����Ҿѹ��",		"03"=>"�չҤ�",		"04"=>"����¹",		"05"=>"����Ҥ�",		"06"=>"�Զع�¹",		"07"=>"�á�Ҥ�",		"08"=>"�ԧ�Ҥ�",		"09"=>"�ѹ��¹",		"10"=>"���Ҥ�",		"11"=>"��Ȩԡ�¹",		"12"=>"�ѹ�Ҥ�"	);		return $thai_month[$id];}function cal_tax($total){	$sumtotal = $total;	$sumtax = 0;		$exp11 = array('4000000'=>4000000,					'2000000'=>2000000,					'1000000'=>1000000,					'750000'=>750000,					'500000'=>500000,					'300000'=>300000,					'150000'=>150000,					'0'=> ''			 				);  					foreach(array_keys($exp11) as $key){			if($sumtotal>=$exp11[$key]){ $pos_new = $key; break;}	}	//echo $sumtotal.'<br>';	//echo $pos_new.'<br>';		$sss = $sumtotal-$pos_new.'<br>';	$exp = array('4000000'=>0.35,				'2000000'=>0.30,				'1000000'=>0.25,				'750000'=>0.20,				'500000'=>0.15,				'300000'=>0.10,				'150000'=>0.05,				'0'=> ''				);  			$exp1 = array('4000000'=>965000,				'2000000'=>365000,				'1000000'=>115000,				'750000'=>65000,				'500000'=>27500,				'300000'=>7500,				'150000'=>0,				'0'=> ''				);  	//echo $exp[$pos_new].'<br>';	$sumtax = $sss*$exp[$pos_new]+$exp1[$pos_new];		RETURN 	$sumtax;}?><? ob_end_flush();?><meta content="0;URl=./pdfshow.php" http-equiv="refresh" />