<? include("connectmysql.php");?>
<? include("./function.php");?>

<?

//cpt_asaled
//cpt_asaleh
//cpt_bmbonus
//ecpt_member
//ecpt_invent
/*
////////////////// IMPORT MEMBER //////////////////////////////////
mysql_query("TRUNCATE TABLE ali_member");
$sql = "select * from cpt_member where 1=1 order by id asc ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$mcode = $sqlObj->mcode;
	$name_f = $sqlObj->name_f;
	$name_t = $sqlObj->name_t;
	$name_b = $sqlObj->name_b;
	$mdate = $sqlObj->mdate;
	$email = $sqlObj->email;
	$beneficiaries = $sqlObj->beneficiaries;
	$relation = $sqlObj->relation;
	$cnational = $national = $sqlObj->national;
	$id_tax = $sqlObj->id_tax;
	$cid_card = $id_card = $sqlObj->id_card;
	$caddress = $address = trim($sqlObj->address);
	$cdistrictId = $districtId = $sqlObj->districtId;
	$camphurId = $amphurId = $sqlObj->amphurId;
	$cprovinceId = $provinceId = $sqlObj->provinceId;

	$cdistrictId = getdistrict($cdistrictId);
	$camphurId = getamphur($camphurId);
	$cprovinceId = getprovince($cprovinceId);

	$districtId = getdistrict($districtId);
	$amphurId = getamphur($amphurId);
	$provinceId = getprovince($provinceId);



	$czip = $zip = $sqlObj->zip;
	$chome_t = $home_t = $sqlObj->home_t;
	$cmobile = $mobile = $sqlObj->mobile;
	$bankcode = $sqlObj->bankcode;
	$branch = $sqlObj->branch;
	$acc_type = $sqlObj->acc_type;
	$acc_no = $sqlObj->acc_no;
	$acc_name = $sqlObj->acc_name;
	$sv_code = $sqlObj->sv_code;
	$sp_code = $sqlObj->sp_code;
	$sp_name = $sqlObj->sp_name;
	$upa_code = $sqlObj->upa_code;
	$upa_name = $sqlObj->upa_name;
	$pos_cur = $sqlObj->pos_cur;
	if($pos_cur == 'D')$pos_cur = 'DIS';
	else if($pos_cur == 'P')$pos_cur = 'PRO';
	else if($pos_cur == 'V')$pos_cur = 'VIP';
	else if($pos_cur == 'X')$pos_cur = 'TN';
	else $pos_cur = 'MB';

	if($pos_cur == 'TN')$status_terminate = '1';
	else $status_terminate = '0'; 
	$lr = $sqlObj->lr;
	if(empty($mdate))$mdate = '2016-01-01';
	$chkdate = $mdate;
	$cmp = "¤Ãº";
	
	$sqlinsert = "insert into ali_member(mcode,name_f,name_t,name_b,mdate,email,beneficiaries,relation
	,cnational,id_tax,cid_card,id_card,caddress,address,cdistrictId,districtId,camphurId,amphurId,cprovinceId
	,provinceId,czip,zip,chome_t,home_t,cmobile,mobile,bankcode,branch,acc_type,acc_no,acc_name,sv_code
	,sp_code,sp_name,upa_code,upa_name,pos_cur,lr,status_terminate,locationbase,cmp,cmp2,cmp3,ccmp2,ccmp3,bmdate1,bmdate2,bmdate3,cbmdate1,cbmdate2,cbmdate3,status_doc
	) 
	values('$mcode','$name_f','$name_t','$name_b','$mdate','$email','$beneficiaries','$relation','$cnational'
	,'$id_tax','$cid_card','$id_card','$caddress','$address','$cdistrictId','$districtId','$camphurId'
	,'$amphurId','$cprovinceId','$provinceId','$czip','$zip','$chome_t','$home_t','$cmobile','$mobile'
	,'$bankcode','$branch','$acc_type','$acc_no','$acc_name','$sv_code','$sp_code','$sp_name','$upa_code'
	,'$upa_name','$pos_cur','$lr','$status_terminate','1','$cmp','$cmp','$cmp','$cmp','$cmp','$chkdate','$chkdate','$chkdate','$chkdate','$chkdate','$chkdate','1'
	)
	";
	mysql_query($sqlinsert);
}		
$sql = "select id,upa_code,sp_code from ali_member where 1=1 order by id asc ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$id = $sqlObj->id;
	$upa_code = $sqlObj->upa_code;
	$sp_code = $sqlObj->sp_code;
	$upa_name = $sp_name = "";
	$sqlx = "select name_t from ali_member where mcode = '$upa_code' ";
	$rsx = mysql_query($sqlx);
	if(mysql_num_rows($rsx)>0){
		$upa_name = mysql_result($rsx,0,"name_t");
	}
	$sqlx = "select name_t from ali_member where mcode = '$sp_code' ";
	$rsx = mysql_query($sqlx);
	if(mysql_num_rows($rsx)>0){
		$sp_name = mysql_result($rsx,0,"name_t");
	}
	$sqlupdate = "update ali_member set upa_name='$upa_name',sp_name='$sp_name' where id = '$id' ";
	mysql_query($sqlupdate);
}
 $sqldel = "delete from ali_member where name_t = '' ";
 mysql_query($sqldel);
 $sqldel = "update ali_member set upa_code='',sp_code='',sp_name='',upa_name='' where mcode = 'TH0000001' ";
 mysql_query($sqldel);
*/
////////////////// IMPORT MEMBER //////////////////////////////////

/*
////////////////// IMPORT BMBONUS //////////////////////////////////
mysql_query("TRUNCATE TABLE ali_bmbonus");
mysql_query("ALTER TABLE cpt_bmbonus ADD INDEX (mcode);");	
$sql = "select mcode from ali_member where 1=1 order by id asc ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$mcode = $sqlObj->mcode;
	$carry_c = $carry_l = 0;

	$sqlx = "select carry_l,carry_r from cpt_bmbonus where mcode = '$mcode'  order by id desc limit 0,1 ";
	$rsx = mysql_query($sqlx);
	if(mysql_num_rows($rsx)>0){
		$carry_l = mysql_result($rsx,0,"carry_l");
		$carry_c = mysql_result($rsx,0,"carry_r");
	}
	$sqlinsert = "insert into ali_bmbonus(mcode,carry_l,carry_c,rcode,fdate,tdate) 
	values('$mcode','$carry_l','$carry_c','0','2016-01-01','2016-01-01')
	";
	if($carry_l > 0 or $carry_c > 0)mysql_query($sqlinsert);
}		
////////////////// IMPORT BMBONUS //////////////////////////////////
*/

////////////////// IMPORT BILL MEMBER //////////////////////////////////
/*
mysql_query("TRUNCATE TABLE ali_asaleh");
mysql_query("TRUNCATE TABLE ali_asaled");
mysql_query("ALTER TABLE cpt_asaleh ADD INDEX (sa_type);");	
$sqldel = "delete from cpt_asaleh where tot_pv = 0 or cancel =1 or sadate = '0000-00-00'  ";
mysql_query($sqldel);
$sqldel = "delete from cpt_asaleh where (sa_type = 'C' or sa_type = 'M' sa_type = 'V')";
mysql_query($sqldel);
$sql = "select * from cpt_asaleh where (sa_type = 'A' or sa_type='Q' or sa_type = 'R' ) order by id asc ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$mcode = $sqlObj->mcode;
	$sano = $sqlObj->sano;
	$sadate = $sqlObj->sadate;
	$sa_type = $sqlObj->sa_type;
	if($sa_type == 'R' or $sa_type == 'Q')$sa_type = 'Z'; 
	else $sa_type = 'A';
	$total = $sqlObj->total;
	$tot_pv = $sqlObj->tot_pv;
	$name_t =''; 
	$name_f ='';
	$sqlx = "select name_t,name_f from ali_member where mcode = '$mcode' ";
	$rsx = mysql_query($sqlx);
	if(mysql_num_rows($rsx)>0){
		$name_t = mysql_result($rsx,0,"name_t");
		$name_f = mysql_result($rsx,0,"name_f");
	}
	$sqlinsert = "insert into ali_asaleh(sano,sadate,mcode,name_f,name_t,sa_type,total,tot_pv,checkportal,inv_code,lid,uid,receive,receive_date,locationbase) 
	values('$sano','$sadate','$mcode','$name_f','$name_t','$sa_type','$total','$tot_pv','1','HQ','HQ','SYSTEM','1','2016-01-01','1')
	";
	mysql_query($sqlinsert);
}
*/
//mysql_query("delete from ali_asaleh where total = '' or total = '0' ");

////////////////// IMPORT BILL MEMBER //////////////////////////////////


////////////////// IMPORT VIP PV //////////////////////////////////
/*
$pos_piority = array('VIP'=>3,'PRO'=>2,'DIS'=>1,'MB'=>0);
$pos_exp = array('VIP'=>2800,'PRO'=>800,'DIS'=>200,'MB'=>0);
$sql = "TRUNCATE TABLE ali_special_point";
mysql_query("$sql");
$sql = "select mcode,pos_cur from ali_member where mdate < '2016-09-22' order by id asc ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$mcode = $sqlObj->mcode;
	$pos_old = $sqlObj->pos_cur;
	$addpv = $tot_pv = 0;
	$sqlx = "select sum(tot_pv) as tot_pv from ali_asaleh where mcode = '$mcode' and sa_type ='A' and cancel = 0 group by mcode ";
	$rsx = mysql_query($sqlx);
	if(mysql_num_rows($rsx)>0){
		$tot_pv = mysql_result($rsx,0,"tot_pv");
	}
	$sqlx = "select sum(tot_pv) as tot_pv from ali_holdhead where mcode = '$mcode' and sa_type ='A' and cancel = 0   group by mcode ";
	$rsx = mysql_query($sqlx);
	if(mysql_num_rows($rsx)>0){
		$tot_pv += mysql_result($rsx,0,"tot_pv");
	}
	$chkpv = $pos_exp[$pos_old];
	if($tot_pv < $chkpv)$addpv = $chkpv - $tot_pv;


	if($addpv > 0){
		$sadate = '2016-01-01';
		$sqlupdate = "insert into ali_special_point (sadate,mcode,sa_type,tot_pv,uid) 
		values('$sadate','$mcode','VA','$addpv','SYSTEM') ";
		mysql_query($sqlupdate);
	}
}

$sql = "select inv_code,inv_type from cpt_invent  ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$inv_code = $sqlObj->inv_code;
	$inv_type = $sqlObj->inv_type;
	if($inv_type == '3')$inv_type=2;
	$sqlupdate = "update ali_member set mtype1 = '$inv_type' where mcode = '$inv_code' ";
	mysql_query("$sqlupdate");

}
$sqlupdate = "update ali_special_point set vip_id = id ";
mysql_query($sqlupdate);
*/
////////////////// IMPORT VIP PV //////////////////////////////////



////////////////// IMPORT VIP PV Cut2/3 //////////////////////////////////
/*
$pos_piority = array('VIP'=>3,'PRO'=>2,'DIS'=>1,'MB'=>0);
$pos_exp = array('VIP'=>2800,'PRO'=>800,'DIS'=>200,'MB'=>0);

//mysql_query("TRUNCATE TABLE ali_special_point");

$sql = "select mcode,pos_cur from ali_member where mdate >= '2016-09-22' and (pos_cur = 'MB' or pos_cur = 'DIS' or pos_cur = 'PRO' ) order by id asc ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$mcode = $sqlObj->mcode;
	$pos_old = $sqlObj->pos_cur;
	$tot_pv = 0;
	$sqlx = "select sum(tot_pv) as tot_pv from ali_asaleh where mcode = '$mcode' and sa_type ='A' and sadate >= '2016-09-22' and cancel = 0  group by mcode ";
	$rsx = mysql_query($sqlx);
	if(mysql_num_rows($rsx)>0){
		$tot_pv = mysql_result($rsx,0,"tot_pv");
	}
	$sqlx = "select sum(tot_pv) as tot_pv from ali_holdhead where mcode = '$mcode'  and sa_type ='A' and sadate >= '2016-09-22' and cancel = 0 group by mcode ";
	$rsx = mysql_query($sqlx);
	if(mysql_num_rows($rsx)>0){
		$tot_pv += mysql_result($rsx,0,"tot_pv");
	}
	$addpv = floor($tot_pv*-1/3);
	//$chkpv = $pos_exp[$pos_old];
	//if($tot_pv < $chkpv)$addpv = $chkpv - $tot_pv;

	if($addpv < 0){
		$sadate = '2016-01-01';
		$sqlupdate = "insert into ali_special_point (sadate,mcode,sa_type,tot_pv,uid) 
		values('$sadate','$mcode','VA','$addpv','SYSTEM1') ";
		mysql_query($sqlupdate);
	}
}
$sqlupdate = "update ali_special_point set vip_id = id ";
mysql_query($sqlupdate);
*/
////////////////// IMPORT VIP Cut2/3 //////////////////////////////////


/*
////////////////// bm1 pv ////////////////// 
mysql_query("TRUNCATE TABLE ali_bm1");

$sql = "select mcode,tot_pv,sano,sadate from ali_asaleh where tot_pv > 0 and sadate = '2016-10-01'  order by id asc ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$mcode = $sqlObj->mcode;
	$tot_pv = $sqlObj->tot_pv;
	$sadate = $sqlObj->sadate;
	$sano = $sqlObj->sano;
	getInsert_bm_bill('ali_bm1',$sano,$mcode,'',$tot_pv,$sadate,$sadate);
}
////////////////// bm1 pv ////////////////// 
*/
exit;
	
function gencodexxxxxx($source){
	for($i=strlen($source);$i<7;$i++)
		$source = "0".$source;
	return $source;
}
$sql = "select count(mcode), mcode from ali_member where 1=1 group by mcode having  count(mcode) > 1 ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$mcode = $sqlObj->mcode;
	$sqlx = "select id from ali_member where mcode = '$mcode' order by id desc ";
	$xid = '';
	$rsx = mysql_query($sqlx);
	if(mysql_num_rows($rsx)>0){
		$xid = mysql_result($rsx,0,"id");
		mysql_query("delete from ali_member where id = '$xid' ");
	}
	
}		

 exit;


 $sql = "select upa_code,pv as pv,lr from ali_bm where 
 mcode = '8800008' or
 mcode = '8800012' or
 mcode = '8800010' or
 mcode = '8800028' 
 ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$upa_code =$sqlObj->upa_code;	
	$pv =$sqlObj->pv;
	$lr =$sqlObj->lr;
	//echo $pv.' : '.$mcode.' : '.$upa_code.'<br>';
	$sqlwhere = "select carry_l,carry_c,cid from ali_bmbonus where mcode = '$upa_code' order by cid desc limit 0,1";
	$rsx = mysql_query($sqlwhere);
	if(mysql_num_rows($rsx)>0){
		$sqlObjx = mysql_fetch_object($rsx);
		$carry_c =$sqlObjx->carry_c;	
		$carry_l =$sqlObjx->carry_l;
		if($lr == '1')$cut_l = $pv;else $cut_l = 0;
		if($lr == '2')$cut_c = $pv;else $cut_c = 0;
		$cid =$sqlObjx->cid;
		//echo $carry_l.' : '.$cut_l.'<br>';
		//echo $carry_c.' : '.$cut_c.'<br>';
		$sqlupdate = "update ali_bmbonus set carry_l = carry_l-'$cut_l' ,carry_c = carry_c-'$cut_c' where cid = '$cid' ";
		//mysql_query($sqlupdate);
		//echo $sqlupdate.'<br>';
			  
	}

	
}
 exit;
 
?>