<?
session_start();

$id = $_GET['id'];
 if(isset($_GET['tstype'])){
 	$sql = "UPDATE ".$dbprefix."transfersale_h SET transtype='".$_GET['tstype']."' WHERE id='".$id."' and cancel = 0 ";

	
	mysql_query($sql);
 }else if(isset($_GET['ptype'])){

	$sql = "SELECT *  FROM ".$dbprefix."transfersale_h  WHERE id='".$id."' and cancel = 1 ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		 echo "<script language='JavaScript'>alert('ไม่สามารถทำรายการได้ เนื่องจากบิลนี้ถูกยกเลิก');window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";
		exit;
	}

	$sql = "SELECT *  FROM ".$dbprefix."transfersale_h  WHERE id='".$id."' and cancel = 0 and credittype = '1' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		 echo "<script language='JavaScript'>alert('บิลนี้ได้ชำระผ่านบัตรเครดิตแล้ว');window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";
		exit;
	}



	$sql = "UPDATE ".$dbprefix."transfersale_h SET paytype='".$_GET['ptype']."' WHERE id='".$id."' and cancel = 0 ";
	mysql_query($sql);
	$ref2 = $id;
	$sql = "SELECT MAX(id) AS id  FROM ".$dbprefix."asaleh   ";
	$rs = mysql_query($sql);
	$mid = mysql_result($rs,0,'id')+1;

	$sano = gencodesale_ON($sanof,'asaleh');

	mysql_query("update ".$dbprefix."transfersale_h set sano = '$sano' where id = '".$ref2."'" );
	$sql = "select * from ali_transfersale_h where id = '".$ref2."' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_object($result);
			$sadate= date("Y-m-d");
			$mcode=$row->mcode;
			$satype=$row->sa_type;
			$inv_code=$row->inv_code;
			$total=$row->total;
			$tot_pv=$row->tot_pv;
			$tot_weight=$row->tot_weight;
			$tot_fv=$row->tot_fv;
			$uid=$row->uid;
			$radsend=$row->send;
			$txtoption=$row->txtoption;
			$chkCredit1="";
			$trnf=$row->trnf;
			$name_t=$row->name_t;
			$caddress=$row->caddress;
			$cdistrict=$row->cdistrictId;
			$camphur=$row->camphurId;
			$cprovince=$row->cprovinceId;
			$czip=$row->czip;
			$tot_pv=$row->tot_pv;
			$total=$row->total;
			$cname=$row->cname;
			$cmobile=$row->cmobile;
			$bprice=$row->bprice;
			$crate=$row->crate;
			$locationbase=$row->locationbase;
			$scheck=$row->scheck;
			//$hdate=$row->hdate;
			$hdate = date('Y-m-t');
			$arr_member = array();
			$arr_member = searchlocationbase($dbprefix,$locationbase);

			$sqlewallet = " select ewallet,mobile,name_f,name_t,locationbase from ".$dbprefix."member where mcode = '".$mcode."'";
			$rsewallet = mysql_query($sqlewallet);
			$name_f=mysql_result($rsewallet,0,'name_f');
			$name_t=mysql_result($rsewallet,0,'name_t');
			$mbase=mysql_result($rsewallet,0,'locationbase');

		 $sql="insert into ".$dbprefix."asaleh (id,  sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv,tot_weight,tot_fv, uid,uid_branch,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
			optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther,trnf,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,online,checkportal,hpv,htotal,hdate,bprice,locationbase,lid,name_f,cname,cmobile,crate,mbase,scheck) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv','$tot_weight','$tot_fv' ,'$uid','".$_SESSION["inv_usercode"]."','$radsend','$txtoption','$chkCash','$chkFuture','on','$chkCredit1','$chkCredit2','$chkCredit3','','$chkDiscount','$chkOther','$txtCash','$txtFuture',
			'$total','0','$txtCredit2','$txtCredit3','0','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','$trnf','$name_t','$caddress','$cdistrict','$camphur','$cprovince','$czip','1','3','$tot_pv','$total','$hdate','$bprice','$locationbase','".$_SESSION["admininvent"]."','$name_f','$cname','$cmobile','$crate','$mbase','$scheck') ";

			//echo $sql;
			//exit;
			mysql_query($sql);
			$sql = "select * from ".$dbprefix."transfersale_d where sano='$ref2'";
			//echo $sql;
			//exit;
			$result1234 = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($result1234);$i++){
				$data = mysql_fetch_object($result1234);
				$pcode[$i] =$data->pcode;
				$qty[$i] =$data->qty;
				$pdesc[$i] =$data->pdesc;
				$price[$i] =$data->price;
				$pv[$i] =$data->pv;
				$totalprice[$i] =$data->amt;
				$unit[$i] =$data->unit;

				//$inv_codeold =$data->inv_code;
				$sql="SELECT weight,unit,bprice,customer_price,vat FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0)
				{
					for($m=0;$m<mysql_num_rows($rs);$m++){
						
						$sqlObj = mysql_fetch_object($rs);
						$weight[$i] =$sqlObj->weight;	
						$bprice[$i] =$sqlObj->bprice;	
						$unit[$i] =$sqlObj->unit;
						$cprice[$i] =$sqlObj->customer_price;	
						$vat =$sqlObj->vat;
					}
				}else{
					$sql="SELECT weight,unit,bprice,customer_price,vat FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
					$rs = mysql_query($sql);
					if(mysql_num_rows($rs) > 0)
					{
						$sqlObj = mysql_fetch_object($rs);
						$weight[$i] =$sqlObj->weight;	
						$bprice[$i] =$sqlObj->bprice;	
						$cprice[$i] =$sqlObj->customer_price;	
						$unit[$i] =$sqlObj->unit;
						$vat =$sqlObj->vat;
					}
				}
				

				if($pcode[$i] == $arr_member["pcode_extend"]){
					$selectch = "select id as id,mdate from  ".$dbprefix."member where mcode = '$mcode'";
					$rsch = mysql_query($selectch);
					$idi = mysql_result($rsch,0,'id');
					$mdate = mysql_result($rsch,0,'mdate');
					$select = "SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate where mid='$idi' GROUP BY mid";
					$rs = mysql_query($select);
					if(mysql_num_rows($rs) > 0)	$exp_date = mysql_result($rs,0,'exp_date');
					if(empty($exp_date))$exp_date = $mdate;
					$sql = "INSERT INTO ".$dbprefix."expdate (mid,exp_date,date_change,exp_type,sano) VALUES('".$idi."',ADDDATE('".$exp_date."', INTERVAL 1 YEAR),'".date("Y-m-d")."','extend','$mid')";
					//echo $sql;
					//exit;
					mysql_query($sql);
					//$sql="update ".$dbprefix."expdate set exp_date=ADDDATE(exp_date, INTERVAL 1 YEAR) where mid=$idi ";
						//exit;	//====================LOG===========================
					//$text="uid=".$_SESSION["adminuserid"]." action=memoperate =>$sql";
					//mysql_query($sql);
				}

				// Sum Vat ////////
				if($vat == '0'){
					$total_exvat+=($qty[$i]*$price[$i]); //รราคา ไม่รวม vat
				}else{
					$vat_sum = ($qty[$i]*$price[$i]*$vat/(100+$vat));
					//$total_invat+= ($qty[$i]*$price[$i]) - $vat; 	//รราคาก่อน vat
					$total_vat+=($qty[$i]*$price[$i]*$vat/(100+$vat));
					//$total_vat+=($qty[$i]*$price[$i]*100/(100+$vat[$i]));
					$total_invat_sum+= ($qty[$i]*$price[$i])-$vat_sum;
				}
				$total_all+=($qty[$i]*$price[$i]);

			$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,weight,fv,qty,amt,inv_code,unit,bprice,locationbase,customer_price,vat) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$weight[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code','$unit[$i]','$bprice[$i]','$locationbase',$cprice[$i],'$vat') ";
			//echo $sql.'<br>';

			mysql_query($sql);

			updatestockcard($dbprefix,$mcode,$inv_code,$_SESSION["admininvent"],$sano,$sanox,$sadate,$rccode,$satype,$pcode1[$i],$_SESSION["inv_usercode"],$qty[$i],$price[$i],$totalprice[$i]);
			calc_stock($dbprefix,$pcode1[$i],$inv_code,$qty[$i],$sano,$_SESSION["inv_usercode"],$inv_code,$satype,'0');
			//minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
		}
		if($satype != 'H')updatePos($dbprefix,$mcode,date("Y-m-d"),$tot_pv);
		
		// UPDATE Vat ////////
		$total_net=$total_all-$total_vat;
		$total_vat=  round($total_vat,2); 
		$total_net= round($total_net,2); 
		$total_invat = round($total_invat,2); 
		$total_exvat = round($total_exvat,2); 
		$Qvat = "update ".$dbprefix."asaleh set total_vat= '$total_vat',total_net='$total_net',total_invat='$total_invat_sum',total_exvat='$total_exvat' where id = '$mid' ";
		mysql_query($Qvat);


	}
 }else if(isset($_GET['stype'])){
	$sql = "UPDATE ".$dbprefix."transfersale_h SET sendtype='".$_GET['stype']."' WHERE id='".$id."' and cancel = 0 ";
	mysql_query($sql);

	//$strSQL = "update ali_transfersale_h set credittype = '1',paydate = '".date("Y-m-d H:i:s")."' where id = '".$ref2."' ";
	// $objQuery = mysql_query($strSQL);
	

 }
 
 echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";

?>

<?
function minusProduct1($dbprefix,$pcode,$invent,$qty,$sano,$uid){

		 $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
		//exit;
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$pcode2 =$sqlObj->pcode;	
				$qty2 =$sqlObj->qty*$qty;	

				$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode2."' and inv_code = '$invent'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before-$qty2;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','Head Office','$invent','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','คีย์รับที่สาขา','$uid')";
				mysql_query($sql);

				
				$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode2' and inv_code = '$invent'";
				$rs1 = mysql_query($sql);
				if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";
				else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode2','-$qty2','$invent')";
			//	echo $sql;
			//	exit;
				mysql_query($sql);
			
			}
		}else{


				$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode."' and inv_code = '$invent'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before-$qty;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','Head Office','$invent','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','คีย์รับที่สาขา','$uid')";
				mysql_query($sql);



			$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
			$rs1 = mysql_query($sql);
			if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
			else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode','-$qty','$invent')";
			mysql_query($sql);

		}
}

function minusProduct($dbprefix,$pcode,$invent,$qty,$sano){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	//$pcode1 = explode('_',$pcode);
	//if($pcode1[0] == 'PD'){

	//$ewallet_after = $ewallet_before-$total;
	

		 $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
		//exit;
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$pcode2 =$sqlObj->pcode;	
				$qty2 =$sqlObj->qty*$qty;

				$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode2."'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before-$qty2;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','Head Office','Head Office','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','บิลขาย','$invent')";
				mysql_query($sql);


				$sql = "update ".$dbprefix."product set qty = qty-$qty2 WHERE pcode='$pcode2' ";
				$rs1 = mysql_query($sql);

			}
		}else{
			$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode."'";
			$rsewallet = mysql_query($sqlewallet);
			if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
			$qty_after=$qty_before-$qty;
			$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
			  values('$sano','Head Office','Head Office','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','บิลขาย','$invent')";
			mysql_query($sql);

			$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
			mysql_query($sql);


		}
	
}
 
function dateDiff($startDate, $endDate) { 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 

} 
function expdate($startdate,$datenum){
 $startdatec=strtotime($startdate); // ทำให้ข้อความเป็นวินาที
 $tod=$datenum*86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
 $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
 return $ndate; // ส่งค่ากลับ
}
?>