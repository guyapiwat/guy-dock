<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>

<?
 exit;
$sql = "select mcode,sadate from ali_holdhead where cancel = 0 and (sadate = '2016-12-06' or sadate = '2016-12-07') and sa_type = 'A' group by mcode ";
$rsxxx = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rsxxx);$i++){
	$sqlObjxx = mysql_fetch_object($rsxxx);
	$mcode = $sqlObjxx->mcode;
	$sadate = $sqlObjxx->sadate;
	$tot_pv = 0;
	$satype = 'A';
	//echo $mcode.' : '.$sadate.'<br>';
	$dbprefix = 'ali_';
	//updatePos($dbprefix,$mcode,$sadate,$tot_pv,$satype);   
}
   
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











exit;
for($i=1;$i<=127;$i++){        
  get_last_member();
}

function get_last_member($dbprefix='ali_',$main_mcode='',$state=''){	  
	////////////////////////////////////////////////////////////////////

	 $upa_code = 'upa_code';
	 $priority = 'id';
	 $lr = 'lr';
	

	 //////////////////////  find last member //////////////////////////
 	$sql33="select t1.mcode,t1.name_t
		  from ".$dbprefix."member t1
		  left join ali_member t2 on (t1.mcode = t2.".$upa_code.")	 
		  group by t1.mcode having count(*) <=1
		  order by t1.".$priority." 
		  limit 0,1 ";  
		// echo $sql33."<br/>";
		 //exit;
	$rs33 = mysql_query($sql33);	
	if (mysql_num_rows($rs33)>0) {
		$sqlObj33 = mysql_fetch_object($rs33);
		$mcode1 =$sqlObj33->mcode;		
		$name_t =$sqlObj33->name_t; 	
        //////////////////////  find left right //////////////////////////
			$sql666="select count(mcode) as lr from ".$dbprefix."member where ".$upa_code."='".$mcode1."' ";  
			$rs666 = mysql_query($sql666);	
				if (mysql_num_rows($rs666)>0){
					$sqlObj666 = mysql_fetch_object($rs666);
					$lr_mem =$sqlObj666->lr;
				}else{
					$lr_mem =0;
				}
		//////////////////////  find left right //////////////////////////
		echo $mcode1."  node". $lr_mem."<br/>";
	 }


	$sqlcheckcheck = "SELECT MAX(mcode) AS code FROM ".$dbprefix."member";
	$rscheckcheck = mysql_query($sqlcheckcheck);
	$code = mysql_result($rscheckcheck,0,'code');
	$maxcode = gencode($code);   
	$mcodez=  gencode($maxcode+1);
    /////////////////////////////////////////////////////////////////
	
	$sql = "INSERT INTO ".$dbprefix."member (mcode,name_t,".$upa_code.",".$lr.",pos_cur) VALUES ('".$mcodez."','Noblelife','".$mcode1."','".++$lr_mem."','L')";
	echo $sql."<br/>";
    mysql_query($sql);	
}










function gencode($source){
	for($i=strlen($source);$i<7;$i++)
		$source = "0".$source;
	return $source;
}	 
function gennewmember($start,$ncode,$main_code){     
        $k=0;
        $detail =  get_detail_meber($main_code,'');        
        for($i=1;$i<=$ncode;$i++){                                 
            $data[$i]['mcode'] =  gencode($start+$i);
            $data[$i]['upa_code'] = $main_code;
            $data[$i]['upa_name'] =  'Noblelife' ;
            $data[$i]['sp_code'] =  $main_code;
            $data[$i]['sp_name'] =   'Noblelife' ;    
            $data[$i]['lr'] = ($i%2==0?1:0)+1; 
            if($i%2==0) $k++;    
        }                          
       
        echo "<pre>";
        print_r($data);
        echo "</pre>";        
       
        for($i=1;$i<=sizeof($data);$i++){    
            $sql="INSERT INTO ali_member (id,mcode,name_f,name_t,name_e,posid,mdate,birthday,national,id_tax,id_card,province,zip,home_t,office_t,mobile,mcode_acc,bonusrec,bankcode,branch,acc_type,acc_no,acc_name,acc_prov,sv_code,sp_code,sp_name,sp_code_old,sp_name_old,upa_code,upa_name,lr,complete,compdate,modate,usercode,name_b,sex,age,occupation,status,mar_name,mar_age,email,beneficiaries,relation,districtId,amphurId,provinceId,fax,inv_code,uid,oid,pos_cur,pos_cur1,pos_cur2,pos_cur3,pos_cur4,rpos_cur4,memdesc,cmp,cmp2,cmp3,ccmp,ccmp2,ccmp3,address,view_flg,street,building,village,soi,ewallet,bmdate1,bmdate2,bmdate3,cbmdate1,cbmdate2,cbmdate3,online,cname_f,cname_t,cname_e,cname_b,cbirthday,cnational,cid_tax,cid_card,caddress,cbuilding,cvillage,cstreet,csoi,czip,chome_t,coffice_t,cmobile,cfax,csex,cemail,cdistrictId,camphurId,cprovinceId,iname_f,iname_t,irelation,iphone,iid_card,status_doc,status_expire,status_terminate,terminate_date,status_suspend,suspend_date,status_blacklist,status_ato,sletter,sinv_code,txtoption,setregis,slr,locationbase,cid_mobile,bewallet,bvoucher,voucher,manager,mtype,mtype1,mtype2,mvat,uidbase,exp_date,head_code,pv_l,pv_c,hpv_l,hpv_c,member_active,rv_point,approve,stockkit,bunit,eatoship)
                  SELECT  '','".$data[$i]['mcode']."',m.name_f,m.name_t,m.name_e,m.posid,m.mdate,m.birthday,m.national,m.id_tax,m.id_card,m.province,m.zip,m.home_t,m.office_t,m.mobile,m.mcode_acc,m.bonusrec,m.bankcode,m.branch,m.acc_type,m.acc_no,m.acc_name,m.acc_prov,m.sv_code,'".$data[$i]['sp_code']."','".$data[$i]['sp_name']."',m.sp_code_old,m.sp_name_old,'".$data[$i]['upa_code']."','".$data[$i]['upa_name']."','".$data[$i]['lr']."',m.complete,m.compdate,m.modate,m.usercode,m.name_b,m.sex,m.age,m.occupation,m.status,m.mar_name,m.mar_age,m.email,m.beneficiaries,m.relation,m.districtId,m.amphurId,m.provinceId,m.fax,m.inv_code,m.uid,m.oid,'CD',m.pos_cur1,m.pos_cur2,m.pos_cur3,m.pos_cur4,m.rpos_cur4,m.memdesc,m.cmp,m.cmp2,m.cmp3,m.ccmp,m.ccmp2,m.ccmp3,m.address,m.view_flg,m.street,m.building,m.village,m.soi,m.ewallet,m.bmdate1,m.bmdate2,m.bmdate3,m.cbmdate1,m.cbmdate2,m.cbmdate3,m.online,m.cname_f,m.cname_t,m.cname_e,m.cname_b,m.cbirthday,m.cnational,m.cid_tax,m.cid_card,m.caddress,m.cbuilding,m.cvillage,m.cstreet,m.csoi,m.czip,m.chome_t,m.coffice_t,m.cmobile,m.cfax,m.csex,m.cemail,m.cdistrictId,m.camphurId,m.cprovinceId,m.iname_f,m.iname_t,m.irelation,m.iphone,m.iid_card,m.status_doc,m.status_expire,m.status_terminate,m.terminate_date,m.status_suspend,m.suspend_date,m.status_blacklist,m.status_ato,m.sletter,m.sinv_code,m.txtoption,m.setregis,m.slr,m.locationbase,m.cid_mobile,m.bewallet,m.bvoucher,m.voucher,m.manager,m.mtype,m.mtype1,m.mtype2,m.mvat,m.uidbase,m.exp_date,m.head_code,m.pv_l,m.pv_c,m.hpv_l,m.hpv_c,m.member_active,m.rv_point,m.approve,m.stockkit,m.bunit,m.eatoship
                  FROM    ali_member m
                  WHERE   m.mcode = '$main_code'"; 
            //echo $sql."<br>";
           // mysql_query($sql);   
             
        }
     }   
 
?>