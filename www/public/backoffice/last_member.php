<? 
include("global.php");
	//if($_GET['fmcode']){
		
		$sql = "SELECT MAX(id) as id FROM ".$dbprefix."member ";
		$rs = mysql_query($sql);
		$last_id = mysql_result($rs,0,'id');
		
		$sql = "SELECT * FROM ".$dbprefix."member ";
		$sql .= " LEFT JOIN (SELECT mcode AS smcode,name_t AS spname FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."member.sp_code=tabname.smcode)";
		$sql .= " LEFT JOIN (SELECT mcode AS umcode,name_t AS upaname FROM ".$dbprefix."member) AS tabname2 ON (".$dbprefix."member.upa_code=tabname2.umcode)";
		$sql .= " WHERE id='".$last_id."' ";
	//	echo $sql;
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
			$notfound = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">ไปหน้าสมาชิก</a>]";
        	dialogbox("50%","#990000","ไม่พบข้อมูลตามเงื่อนไข",$notfound);
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$meminfo['nodata']	 = "-";
			$meminfo['mcode'] =$row->mcode;
			$meminfo['name_f'] =$row->name_f;
			$meminfo['name_t'] =$row->name_t;
			$meminfo['name_e'] =$row->name_e;
			$meminfo['name_b'] =$row->name_b;
			$meminfo['sex'] =$row->sex;
			$meminfo['age'] = $row->age;
			$meminfo['occupation'] = $row->occupation;
			$meminfo['status'] = $row->status;
			$meminfo['mar_name'] = $row->mar_name;
			$meminfo['mar_age'] = $row->mar_age;
			$meminfo['email'] = $row->email;
			$meminfo['beneficiaries'] = $row->beneficiaries;
			$meminfo['relation'] = $row->relation;
			$meminfo['national'] = $row->national;
			$meminfo['mdate'] = $row->mdate;
			$meminfo['birthday'] = $row->birthday;
			$meminfo['national'] = $row->national;
			$meminfo['id_tax'] = $row->id_tax;
			$meminfo['id_card'] = $row->id_card;
			$meminfo['address'] = $row->address;
			if($row->provinceId !=""){
				$sql = "SELECT provinceName FROM province WHERE provinceId='".$row->provinceId."'";
				$result = mysql_query($sql);	
				if(mysql_num_rows($result)<=0){
					$meminfo['provinceName'] = "";
				}else{
					$provinceinfo = mysql_fetch_object($result);
					$meminfo['provinceName'] = $provinceinfo->provinceName;
				}
				
			}
			
			if($row->amphurId !=""){
				$sql = "SELECT amphurName FROM amphur WHERE amphurId='".$row->amphurId."'";
				$result = mysql_query($sql);	
				if(mysql_num_rows($result)<=0){
					$meminfo['amphurName'] = "";
				}else{
					$amphurinfo = mysql_fetch_object($result);
					$meminfo['amphurName'] = $amphurinfo->amphurName;
				}
				
			}
			
			if($row->districtId !=""){
				$sql = "SELECT districtName FROM district WHERE districtId='".$row->districtId."'";
				$result = mysql_query($sql);	
				if(mysql_num_rows($result)<=0){
					$meminfo['districtName'] = "";
				}else{
					$districtinfo = mysql_fetch_object($result);
					$meminfo['districtName'] = $districtinfo->districtName;
				}
				
			}
			//$meminfo['provinceId'] = $row->provinceId;
			//$meminfo['amphurId'] = $row->amphurId;
			//$meminfo['districtId'] = $row->districtId;
			$meminfo['zip'] = $row->zip;
			$meminfo['home_t'] = $row->home_t;
			$meminfo['fax'] = $row->fax;
			$meminfo['mobile'] = $row->mobile;
			$meminfo['mcode_acc'] = $row->mcode_acc;
			//$mcode_acc_name=get_data("name_t","member","mcode='$mcode_acc'");
			$meminfo['bonusrec'] = $row->bonusrec;
			$meminfo['bankcode'] = $row->bankcode;
			$meminfo['branch'] = $row->branch;
			$meminfo['acc_type'] = $row->acc_type;
			$meminfo['acc_no'] = $row->acc_no;
			$meminfo['acc_name'] = $row->acc_name;
			$meminfo['acc_prov'] = $row->acc_prov;
			$meminfo['sv_code'] = $row->sv_code;
			$meminfo['sp_code'] = $row->sp_code;
			$meminfo['spname'] = $row->spname;
			$meminfo['upa_code'] = $row->upa_code;
			$meminfo['upaname'] = $row->upaname;
			$meminfo['modate'] = $row->modate;
			$meminfo['stockist'] = $row->stockist;
			$meminfo['inv_code'] = $row->inv_code;
			$meminfo['usercode'] = $row->usercode;
			$meminfo['posid'] = $row->posid;
			$meminfo['pos_cur'] = $row->pos_cur;
			$meminfo['memdesc'] = $row->memdesc;
			$meminfo['lr'] = $row->lr;
			$meminfo['cmp'] = $row->cmp;	
			
			if($meminfo['bankcode'] != ""){
				$sql = "SELECT * FROM ".$dbprefix."bank WHERE bankcode='".$meminfo['bankcode']."'";	
				$result = mysql_query($sql);	
				if(mysql_num_rows($result)<=0){
					$meminfo['bankname'] = "";
				}else{
					$bankinfo = mysql_fetch_object($result);
					$meminfo['bankname'] = $bankinfo->bankname;
				}
			}	
			$sql = "SELECT SUM(tot_pv) as tot_pv FROM ".$dbprefix."asaleh WHERE mcode='".$meminfo['mcode']."' and cancel !=1";
			$rs = mysql_query($sql);
			//echo mysql_result($rs,0,'tot_pv')?mysql_result($rs,0,'tot_pv'):'0';
			$sum_totpv = mysql_result($rs,0,'tot_pv');
			
			$sql = "SELECT MAX(id) as id FROM ".$dbprefix."asaleh WHERE mcode='".$meminfo['mcode']."' ";
			$rs = mysql_query($sql);
			$max_id = mysql_result($rs,0,'id');
			
			$sql = "SELECT * FROM ".$dbprefix."asaleh WHERE id='".$max_id."' ";
			$rs = mysql_query($sql);
			$last_sano = mysql_result($rs,0,'sano');
		}
?>
<html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>สมาชิกคนล่าสุด</title>
<link rel="stylesheet" type="text/css" href="./../style.css" />
</head>
<div id="err"></div>
<form name='frm' method="post">
  
  <table width="100%" border="0">
  	<tr bgcolor="#FFCC33"><td><b>ข้อมูลธุรกิจ</b></td></tr>
    <tr><td>
<!--business information--> 
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td width="25%" align="right" class="texh"><b>รหัสสมาชิก :</b></td>
	<td width="16%" class="texd">&nbsp;<?=$meminfo['mcode']?></td>
    <td width="22%" align="right" class="texh"><b>วันที่สมัคร :</b></td>	
	<td width="37%" class="texd">&nbsp;<? echo ($meminfo['mdate']!="")?$meminfo['mdate']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>รหัสผู้แนะนำ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['sp_code']!="")?$meminfo['sp_code']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>รหัสอัพไลน :</b>์</td>
    <td class="texd">&nbsp;<? echo ($meminfo['upa_code']!="")?$meminfo['upa_code']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>ชื่อผู้แนะนำ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['spname']!="")?$meminfo['spname']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>ชื่ออัพไลน์ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['upaname']!="")?$meminfo['upaname']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
  	 <td align="right" class="texh"><b>เลขบิลที่ซื้อล่าลุด :</b></td>
    <td class="texd">&nbsp;<? echo $last_sano?$last_sano:'-';?></td>
    
    <td align="right" class="texh"><b>ด้าน :</b></td>
    <td class="texd">&nbsp;<? //echo ($meminfo['lr']!="")? ($meminfo['lr']=="1")?"ซ้าย":"ขวา": $meminfo['nodata']; 
	if(strcmp($meminfo['lr'],'1')==0){
	echo "ซ้าย"; 
	}else if(strcmp($meminfo['lr'],'2')==0){
	echo "ขวา";
	}else{
		echo $meminfo['nodata'];
	}
	?>
	</td>
  </tr>
  <tr>
   <td valign="top" align="right" class="texh"><b>PV สะสม :</b></td>
    <td>&nbsp;<? echo $sum_totpv?$sum_totpv:'0';?></td>
    <td align="right" class="texh"><b></b></td>
    <td class="texd">&nbsp;</td>
  </tr>
</table>
    </td></tr>
  	<tr bgcolor="#FFCC33">
  	  <td><b>ข้อมูลสมาชิก(APPLICANT INFORMATION)</b></td>
  	</tr>
    <tr>
      <td>
<!--member Information-->
<table width="100%" border="0">
  <tr>
    <td width="25%" align="right" class="texh"><b>คำนำหน้าชื่อ :</b></td>
    <td width="16%" class="texd">&nbsp;<? echo ($meminfo['name_f']!="")?$meminfo['name_f']:$meminfo['nodata']; ?></td>
    <td width="22%" align="right" class="texh"><b>ที่อยู่ปัจจุบัน :</b></td>
    <td width="37%" class="texd">&nbsp;<? echo ($meminfo['address']!="")?$meminfo['address']:$meminfo['nodata']; ?></td>
  </tr>
  
  <tr>
    <td align="right" class="texh"><b>ชื่อ-นามสกุล :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['name_t']!="")?$meminfo['name_t']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>ตำบล :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['districtName']!="")?$meminfo['districtName']:$meminfo['nodata']; ?></td>
   </tr>
  <tr>
    <td align="right" class="texh"><b>ชื้อทางธุรกิจ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['name_b']!="")?$meminfo['name_b']:$meminfo['nodata']; ?></td>
	<td align="right" class="texh"><b>อำเภอ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['amphurName']!="")?$meminfo['amphurName']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>Name &amp; LastName :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['name_e']!="")?$meminfo['name_e']:$meminfo['nodata']; ?></td>
	<td align="right" class="texh"><b>จังหวัด :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['provinceName']!="")?$meminfo['provinceName']:$meminfo['nodata']; ?></td>
    </tr>
   <tr>
    <td align="right" class="texh"><b>เพศ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['sex']!="")?$meminfo['sex']:$meminfo['nodata']; ?></td>
	<td align="right" class="texh"><b>รหัสไปรษณีย์ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['zip']!="")?$meminfo['zip']:$meminfo['nodata']; ?></td>
   </tr>
   <tr>
    <td align="right" class="texh"><b>วันที่เกิด :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['birthday']!="")?$meminfo['birthday']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>โทรศัพท์บ้าน :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['home_t']!="")?$meminfo['home_t']:$meminfo['nodata']; ?></td>
  </tr>
   <tr>
    <td align="right" class="texh"><b>อายุ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['age']!="")?$meminfo['age']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>โทรศัพท์มือถือ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['mobile']!="")?$meminfo['mobile']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>อาชีพ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['occupation']!="")?$meminfo['occupation']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>โทรสาร :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['fax']!="")?$meminfo['fax']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>สัญชาติ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['national']!="")?$meminfo['national']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>รับโบนัสผ่าน :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['bonusrec']!="")? ($meminfo['bonusrec']=="1")?"ธนาคาร":"รับเอง": $meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>เลขประจำตัวประชาชน :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['id_card']!="")?$meminfo['id_card']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>ธนาคาร :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['bankname']!="")?$meminfo['bankname']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b> เลขประจำตัวผู้เสียภาษี :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['id_tex']!="")?$meminfo['id_tex']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>สาขา :</b></td>
     <td class="texd">&nbsp;<? echo ($meminfo['branch']!="")?$meminfo['branch']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>สถานะภาพ :</b></td>
	<td class="texd">&nbsp;<? echo ($meminfo['status']!="")?$meminfo['status']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>ประเภทบัญชี :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['acc_type']!="")?$meminfo['acc_type']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>ชื่อคู่สมรส :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['mar_name']!="")?$meminfo['mar_name']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>เลขที่บัญชี :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['acc_no']!="")?$meminfo['acc_no']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>อายุคู่สมรส :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['mar_age']!="")?$meminfo['mar_age']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>ชื่อบัญชี :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['acc_name']!="")?$meminfo['acc_name']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>อีเมล์ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['email']!="")?$meminfo['email']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>หมายเหตุ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['memdesc']!="")?$meminfo['memdesc']:$meminfo['nodata']; ?></td>
  </tr>
   <tr>
    <td align="right" class="texh"><b>ผู้รับมรดกทางธุรกิจ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['beneficiaries']!="")?$meminfo['beneficiaries']:$meminfo['nodata']; ?></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td align="right" class="texh"><b>ความสัมพันธ์ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['beneficiaries']!="")?$meminfo['beneficiaries']:$meminfo['nodata']; ?></td>
    <td align="right" ></td>
    <td>&nbsp;</td>
  </tr>
</table>

      </td>
    </tr>
  </table>

</form>