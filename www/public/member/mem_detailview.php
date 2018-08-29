<? 
session_start();
include("global.php");
?>
<? 

	if($_GET['fmcode']){
		$sql = "SELECT *,".$dbprefix."member.uid as uid1 FROM ".$dbprefix."member ";
		$sql .= " LEFT JOIN (SELECT posshort,posname FROM ".$dbprefix."position) AS tabname1 ON (".$dbprefix."member.pos_cur=tabname1.posshort)";
		$sql .= " LEFT JOIN (SELECT username ,uid FROM ".$dbprefix."user) AS tabname3 ON (".$dbprefix."member.uid=tabname3.uid)";
		$sql .= " LEFT JOIN (SELECT mcode AS smcode,CONCAT(name_f ,' ', name_t) AS spname FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."member.sp_code=tabname.smcode)";
		$sql .= " LEFT JOIN (SELECT mcode AS umcode,CONCAT(name_f ,' ', name_t) AS upaname FROM ".$dbprefix."member) AS tabname2 ON (".$dbprefix."member.upa_code=tabname2.umcode)";
		$sql .= " WHERE mcode='".$_GET['fmcode']."' and ".$dbprefix."member.uid = '".$_SESSION["usercode"]."' ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
	//		$notfound = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">ไปหน้าสมาชิก</a>]";
      //  	dialogbox("50%","#990000","ไม่พบข้อมูลตามเงื่อนไข",$notfound);
		echo '<center>ไม่พบข้อมูลตามเงื่อนไข</center>';
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			
			$meminfo['nodata']	 = "-";
			$meminfo['mcode'] =$row->mcode;
			$meminfo['txtoption'] =$row->txtoption;
			$meminfo['id'] =$row->id;
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
			$meminfo['line_id'] = $row->line_id;
			$meminfo['facebook_name'] = $row->facebook_name;
			$meminfo['beneficiaries'] = $row->beneficiaries;
			$meminfo['relation'] = $row->relation;
			$meminfo['national'] = $row->national;
			$meminfo['mdate'] = $row->mdate;
			$meminfo['birthday'] = $row->birthday;
			$meminfo['national'] = $row->national;
			$meminfo['id_tax'] = $row->id_tax;
			$meminfo['id_card'] = $row->id_card;
			$meminfo['address'] = $row->address;
			$meminfo['provinceId'] = getprovince($row->provinceId);
			$meminfo['amphurId'] = getamphur($row->amphurId);

			$meminfo['districtId'] = getdistrict($row->districtId);
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
			$meminfo['spname'] = $row->sp_name;
			$meminfo['upa_code'] = $row->sp_code2;
			$meminfo['upaname'] = $row->sp_name2;
			$meminfo['modate'] = $row->modate;
			$meminfo['stockist'] = $row->stockist;
			$meminfo['inv_code'] = $row->inv_code;
			$meminfo['usercode'] = $row->usercode;
			$meminfo['posid'] = $row->posid;
			$meminfo['pos_cur'] = $row->posname;
			$meminfo['memdesc'] = $row->memdesc;
			$meminfo['lr'] = $row->lr;
			$meminfo['cmp'] = $row->cmp;	
			$meminfo['username'] = $row->username;	

			$meminfo['cname_f'] =$row->cname_f;
			$meminfo['cname_t'] =$row->cname_t;
			$meminfo['cname_e'] =$row->cname_e;
			$meminfo['cname_b'] =$row->cname_b;
			$meminfo['csex'] =$row->csex;
			$meminfo['cemail'] = $row->cemail;
			$meminfo['cbeneficiaries'] = $row->cbeneficiaries;
			$meminfo['crelation'] = $row->crelation;
			$meminfo['cnational'] = $row->cnational;
			$meminfo['cmdate'] = $row->cmdate;
			$meminfo['cbirthday'] = $row->cbirthday;
			$meminfo['cnational'] = $row->cnational;
			$meminfo['cid_tax'] = $row->cid_tax;
			$meminfo['cid_card'] = $row->cid_card;
			$meminfo['cfax'] = $row->cfax;
			$meminfo['cmobile'] = $row->cmobile;
			$meminfo['cphone'] = $row->cphone;
			$meminfo['cmobile'] = $row->cmobile;

	
			$meminfo['address'] = $row->address;
			$meminfo['caddress'] = $row->caddress;
			$meminfo['street'] = $row->street;
			$meminfo['cstreet'] = $row->cstreet;
			$meminfo['building'] = $row->building;
			$meminfo['cbuilding'] = $row->cbuilding;
			$meminfo['village'] = $row->village;
			$meminfo['cvillage'] = $row->cvillage;
			$meminfo['soi'] = $row->soi;
			$meminfo['csoi'] = $row->csoi;
			$meminfo['cdistrictId'] = $row->cdistrictId;
			$meminfo['districtId'] = $row->districtId;
			$meminfo['provinceId'] = $row->provinceId;
			$meminfo['cprovinceId'] = $row->cprovinceId;
			$meminfo['camphurId'] = $row->camphurId;
			$meminfo['amphurId'] = $row->amphurId;
			$meminfo['cmp'] = $row->cmp;
			$meminfo['cmp3'] = $row->cmp3;
			$meminfo['cmp2'] = $row->cmp2;
			$meminfo['ccmp'] = $row->ccmp;
			$meminfo['bmdate3'] = $row->bmdate3;
			$meminfo['bmdate1'] = $row->bmdate1;
			$meminfo['bmdate2'] = $row->bmdate2;
			$meminfo['cbmdate1'] = $row->cbmdate1;
			$meminfo['sletter'] = $row->sletter;
			$meminfo['sinv_code'] = $row->sinv_code;
			$meminfo['uid1'] = $row->uid1;
			$meminfo['czip'] = $row->czip;
			$meminfo['txtoption'] = $row->txtoption;
			$meminfo['locationbase'] = $row->locationbase;
			$meminfo['mtype'] = $row->mtype;

	
			$meminfo['iname_t'] = $row->iname_t;
			$meminfo['irelation'] = $row->irelation;
			$meminfo['iphone'] = $row->iphone;
			$meminfo['cid_card'] = $row->cid_card;
			$meminfo['cid_tax'] = $row->cid_tax;
			$meminfo['chome_t'] = $row->chome_t;
			$meminfo['cid_card'] = $row->cid_card;

			
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
		}
	}
?>
<html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>ยินดีต้อนรับสู่ความมั่นคงของธุรกิจ </title>
<link rel="stylesheet" type="text/css" href="./../style.css" /></head>
<!--<table align="center" border="1" cellpadding="5"  cellspacing="5"><tr>
     <td><a href="index.php?sessiontab=1&sub=4&cmc=<?=$_GET["fmcode"]?>" >ผังสายงาน</a></td>
     <td><a href="index.php?sessiontab=1&sub=5&cmc=<?=$_GET["fmcode"]?>"  >ทีมแนะนำตรง</a></td>
     <td><a href="team_list.php?cmc=<?=$_GET["fmcode"]?>"  >ทีมงาน</a></td>
	<td><a href="index.php?sessiontab=4&sub=9&fmcode=<?=$_GET["fmcode"]?>" >คะแนนเข้ารายวัน</a></td>
     <td><a href="index.php?sessiontab=3&sub=8&strtype=mcode&strSearch=<?=$_GET["fmcode"]?>"   >ประวัติการสั่งซื้อ</a></td>
	  <td><a href="#"></a></td>
	  <td><a href="index.php?sessiontab=3&sub=6&state=2&cmc=<?=$_GET["fmcode"]?>" >สั่งซื้อสินค้า</a></td>
  
     <td><a href="index.php?sessiontab=4&sub=100&fmcode=<?=$_GET["fmcode"]?>" >สรุปรายได้รายวัน</a></td>
     <td><a href="index.php?sessiontab=4&sub=101&fmcode=<?=$_GET["fmcode"]?>" >สรุปรายได้รายเดือน</a></td>
     <td><a href="index.php?state=2&sessiontab=1&sub=2&id=<?=$meminfo['id']?>"   >แก้ไขข้อมูลสมาชิก</a></td>
     <td><a href="index.php?state=2&sessiontab=1&sub=2&id=<?=$meminfo['id']?>"   >เปลี่ยนรหัสลับ</a></td>
     <td></td>
     <td></td>
     </tr></table>-->
<form name='frm' method="post">
  <p><img src="../logo.jpg" height=100> <br>
  <?

	echo 'Key Insert : '.$meminfo['uid1'].' ,Date : '. $meminfo['mdate'];
	
 $sqlLog1 = "SELECT sys_id,logdate,logtime FROM ".$dbprefix."log  WHERE object ='".$meminfo['id']."' and subject = 'แก้ไขสมาชิก' order by id desc";
$rs1=mysql_query($sqlLog1);
	if(mysql_num_rows($rs1) > 0){
			$obj1 = mysql_fetch_object($rs1);
		echo ' <br>Key Update : '.$obj1->sys_id.' ,Date : '.$obj1->logdate.' ,Time : '.$obj1->logtime;
	}
  ?></p>

  <table width="100%" border="0">
  	<tr bgcolor="#FFCC33"  ><td><b>ข้อมูลธุรกิจ</b></td></tr>
    <tr><td>
<!--business information--> 
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td width="15%" align="right" class="texh"><b>รหัสสมาชิก :</b></td>
	<td width="32%" class="texd">&nbsp;<?=$meminfo['mcode']?></td>
    <td width="16%" align="right" class="texh"><b>วันที่สมัคร :</b></td>	
	<td width="37%" class="texd">&nbsp;<? echo ($meminfo['mdate']!="")?$meminfo['mdate']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>รหัสผู้แนะนำ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['sp_code']!="")?$meminfo['sp_code']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>รหัสผู้แนะนำ2 :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['upa_code']!="")?$meminfo['upa_code']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>ชื่อผู้แนะนำ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['spname']!="")?$meminfo['spname']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>ชื่อผู้แนะนำ2 :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['upaname']!="")?$meminfo['upaname']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td valign="top" align="right" class="texh"><b>Location Base : </b></td>
    <td><span class="texd"> <? echo ($meminfo['locationbase']!="")?getlocation($meminfo['locationbase']):$meminfo['nodata']; ?></span></td>
    <td align="right" class="texh"><!--<b>ด้าน :</b>--></td>
    <td class="texd"><? //echo ($meminfo['lr']!="")? ($meminfo['lr']=="1")?"ซ้าย":"ขวา": $meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td valign="top" align="right" class="texh"><b>Member Type : </b></td>
    <td><span class="texd"> <? echo ($meminfo['mtype']!="")?$array_mtype[$meminfo['mtype']]:$meminfo['nodata']; ?></span></td>
    <td align="right" class="texh">&nbsp;</td>
    <td class="texd">&nbsp;</td>
  </tr>
</table>
</fieldset>
    </td></tr>
  	<tr bgcolor="#FFCC33" >
  	  <td><table width="100%" border="0">
        <tr bgcolor="#FFCC33">
          <td colspan="2" align="center"><b>&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3612;&#3641;&#3657;&#3626;&#3617;&#3633;&#3588;&#3619;</b></td>
          <td width="53%" colspan="2" align="center"><b>&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3612;&#3641;&#3657;&#3626;&#3617;&#3633;&#3588;&#3619;&#3619;&#3656;&#3623;&#3617;</b></td>
        </tr></table></td>
  	</tr>
    <tr>
      <td>
<!--member Information-->
<table width="100%" border="0">
  <tr>
    <td width="25%" align="right" class="texh"><b>คำนำหน้าชื่อ :</b></td>
    <td width="22%" class="texd">&nbsp;<? echo ($meminfo['name_f']!="")?$meminfo['name_f']:$meminfo['nodata']; ?></td>
    <td width="16%" align="right" class="texh"><b>คำนำหน้าชื่อ :</b></td>
    <td width="37%" class="texd">&nbsp;<? echo ($meminfo['cname_f']!="")?$meminfo['cname_f']:$meminfo['nodata']; ?></td>
  </tr>
  
  <tr>
    <td align="right" class="texh"><b>ชื่อ-นามสกุล / นิติบุคคล:</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['name_t']!="")?$meminfo['name_t']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>ชื่อ-นามสกุล :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['cname_t']!="")?$meminfo['cname_t']:$meminfo['nodata']; ?></td>
   </tr>
  <tr>
    <td align="right" class="texh"><b>ชื่อทางธุรกิจ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['name_b']!="")?$meminfo['name_b']:$meminfo['nodata']; ?></td>
	<td align="right" class="texh"><b>ชื่อทางธุรกิจ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['cname_b']!="")?$meminfo['cname_b']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>Name &amp; LastName :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['name_e']!="")?$meminfo['name_e']:$meminfo['nodata']; ?></td>
	<td align="right" class="texh"><b>Name &amp; LastName :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['cname_e']!="")?$meminfo['cname_e']:$meminfo['nodata']; ?></td>
    </tr>
   <tr>
    <td align="right" class="texh"><b>เพศ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['sex']!="")?$meminfo['sex']:$meminfo['nodata']; ?></td>
	<td align="right" class="texh"><b>เพศ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['csex']!="")?$meminfo['csex']:$meminfo['nodata']; ?></td>
   </tr>
   <tr>
    <td align="right" class="texh"><b>วันที่เกิด :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['birthday']!="")?$meminfo['birthday']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>วันที่เกิด :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['cbirthday']!="")?$meminfo['cbirthday']:$meminfo['nodata']; ?></td>
  </tr>
   
  <tr>
    <td align="right" class="texh"><b>สัญชาติ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['national']!="")?$meminfo['national']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>สัญชาติ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['cnational']!="")?$meminfo['cnational']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>เลขประจำตัวประชาชน :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['id_card']!="")?$meminfo['id_card']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>เลขประจำตัวประชาชน :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['cid_card']!="")?$meminfo['cid_card']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b> เลขทะเบียนนิติบุคคล :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['id_tax']!="")?$meminfo['id_tax']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>เลขทะเบียนนิติบุคคล :</b></td>
     <td class="texd">&nbsp;<? echo ($meminfo['cid_tax']!="")?$meminfo['cid_tax']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>โทรศัพท์บ้าน :</b></td>
	<td class="texd">&nbsp;<? echo ($meminfo['home_t']!="")?$meminfo['home_t']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>โทรศัพท์บ้าน :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['chome_t']!="")?$meminfo['chome_t']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>โทรศัพท์มือถือ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['mobile']!="")?$meminfo['mobile']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>โทรศัพท์มือถือ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['cmobile']!="")?$meminfo['cmobile']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>โทรสาร :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['fax']!="")?$meminfo['fax']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>โทรสาร :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['cfax']!="")?$meminfo['cfax']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>อีเมล์ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['email']!="")?$meminfo['email']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>อีเมล์ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['cemail']!="")?$meminfo['cemail']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>LINE ID :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['line_id']!="")?$meminfo['line_id']:$meminfo['line_id']; ?></td>
    <td align="right" class="texh"></td>
    <td class="texd">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>FACEBOOK :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['facebook_name']!="")?$meminfo['facebook_name']:$meminfo['facebook_name']; ?></td>
    <td align="right" class="texh"></td>
    <td class="texd">&nbsp;</td>
  </tr>
   <tr>
     <td align="right" class="texh">&nbsp;</td>
     <td class="texd">&nbsp;</td>
     <td align="right" class="texh">&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
    <td colspan="4" align="right" class="texh"><table width="100%" border="0">
      <tr bgcolor="#FFCC33">
        <td colspan="2" align="center"><strong>ที่อยู่ตามบัตรประชาชน</strong></td>
        <td width="53%" colspan="2" align="center"><b>&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;&#3626;&#3635;&#3627;&#3619;&#3633;&#3610;&#3592;&#3633;&#3604;&#3626;&#3656;&#3591; / &#3626;&#3656;&#3591;&#3648;&#3629;&#3585;&#3626;&#3634;&#3619;</b></td>
      </tr>
    </table></td>
    </tr>
   <tr>
     <td align="right" class="texh"><b>เลขที่/ห้อง:</b></td>
     <td class="texd"><? echo ($meminfo['address']!="")?$meminfo['address']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>เลขที่/ห้อง :</b></td>
     <td class="texd"><? echo ($meminfo['caddress']!="")?$meminfo['caddress']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b>อาคาร:</b></td>
     <td class="texd"><? echo ($meminfo['building']!="")?$meminfo['building']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>อาคาร :</b></td>
     <td class="texd"><? echo ($meminfo['cbuilding']!="")?$meminfo['cbuilding']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b>หมู่บ้าน/คอนโด:</b></td>
     <td class="texd"><? echo ($meminfo['village']!="")?$meminfo['village']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>หมู่บ้าน/คอนโด :</b></td>
     <td class="texd"><? echo ($meminfo['cvillage']!="")?$meminfo['village']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b>ตรอก/ซอย:</b></td>
     <td class="texd"><? echo ($meminfo['soi']!="")?$meminfo['soi']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>ตรอก/ซอย :</b></td>
     <td class="texd"><? echo ($meminfo['csoi']!="")?$meminfo['csoi']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b>ถนน  :</b></td>
     <td class="texd"><? echo ($meminfo['street']!="")?$meminfo['street']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>ถนน :</b></td>
     <td class="texd"><? echo ($meminfo['cstreet']!="")?$meminfo['cstreet']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b><strong>ตำบล </strong> :</b></td>
     <td class="texd"><? echo ($meminfo['districtId']!="")?getdistrict($meminfo['districtId']):$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b><strong>ตำบล</strong> :</b></td>
     <td class="texd"><? echo ($meminfo['cdistrictId']!="")?getdistrict($meminfo['cdistrictId']):$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b><strong>อำเภอ </strong> :</b></td>
     <td class="texd"><? echo ($meminfo['amphurId']!="")?getamphur($meminfo['amphurId']):$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b><strong>อำเภอ</strong> :</b></td>
     <td class="texd"><? echo ($meminfo['camphurId']!="")?getamphur($meminfo['camphurId']):$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b><strong>จังหวัด </strong> :</b></td>
     <td class="texd"><? echo ($meminfo['provinceId']!="")?getprovince($meminfo['provinceId']):$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b><strong>จังหวัด</strong> :</b></td>
     <td class="texd"><? echo ($meminfo['cprovinceId']!="")?getprovince($meminfo['cprovinceId']):$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b><strong>รหัสไปรษณีย์</strong> :</b></td>
     <td class="texd"><? echo ($meminfo['zip']!="")?$meminfo['zip']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b><strong>รหัสไปรษณีย์</strong> :</b></td>
     <td class="texd"><? echo ($meminfo['czip']!="")?$meminfo['czip']:$meminfo['nodata']; ?></td>
   </tr>
   <tr>
     <td align="right" class="texh">&nbsp;</td>
     <td class="texd">&nbsp;</td>
     <td align="right" class="texh">&nbsp;</td>
     <td class="texd">&nbsp;</td>
   </tr>
   <tr bgcolor="#FFCC33">
     <td colspan="2" align="center"><strong>ข้อมูลการรับผลประโยชน์</strong></td>
     <td colspan="2" align="center"><b><strong>ผู้รับผลประโยชน์กรมธรรม์ประกันอุบัติเหตุ</strong></b></td>
   </tr>
   <tr>
     <td align="right" class="texh"><b>ธนาคาร :</b></td>
     <td class="texd"><? echo ($meminfo['bankcode']!="")?getbank($meminfo['bankcode']):$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>ชื่อสกุล :</b></td>
     <td class="texd"><? echo ($meminfo['iname_t']!="")?$meminfo['iname_t']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b>สาขา :</b></td>
     <td class="texd"><? echo ($meminfo['branch']!="")?$meminfo['branch']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>ความสัมพันธ์ :</b></td>
     <td class="texd"><? echo ($meminfo['irelation']!="")?$meminfo['irelation']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b>ประเภทบัญชี :</b></td>
     <td class="texd"><? echo ($meminfo['acc_type']!="")?$meminfo['acc_type']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>โทรศัพท์ :</b></td>
     <td class="texd"><? echo ($meminfo['iphone']!="")?$meminfo['iphone']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b>เลขที่บัญชี :</b></td>
     <td class="texd"><? echo ($meminfo['acc_no']!="")?$meminfo['acc_no']:$meminfo['nodata']; ?></td>
     <td colspan="2" align="center" class="texh"  bgcolor="#FFCC33"><strong>หลักฐาน</strong></td>
     </tr><tr>
     <td align="right" class="texh"><b>ชื่อบัญชี :</b></td>
     <td class="texd"><? echo ($meminfo['acc_name']!="")?$meminfo['acc_name']:$meminfo['nodata']; ?></td>
     <td colspan="2" align="left" class="texh"><input type="checkbox" name="cmp3" id="cmp3" value="ครบ" <?=$meminfo["cmp3"]==""?"":"checked"?> tabindex="34"  readonly disabled/>
       ใบสมัคร&nbsp; <?=$meminfo['bmdate3']?> </td>
     </tr><tr>
          <td colspan="2"  bgcolor="#FFCC33"align="center"><b>ข้อมูลอื่นๆ</b></td>

     <td colspan="2" align="left"><span class="texh">
       <input type="checkbox" name="cmp" id="cmp" value="ครบ" <?=$meminfo["cmp"]==""?"":"checked"?> tabindex="34"  readonly disabled/>
       สำเนาบัตรประชาชนผู้สมัครหลัก&nbsp; 
       <?=$meminfo['bmdate1']?>
     </span></td>
     </tr><tr>
     <td align="right" class="texh"><b>จัดส่งนิตยสาร : </b></td>
     <td class="texd"><span class="texh">
       <input type="checkbox" name="sletter" id="sletter" value="ครบ" <?=$meminfo["sletter"]!="1"?"":"checked"?> tabindex="34"  readonly disabled/>
       <?=getinv($meminfo['sinv_code'])?>
     </span></td>
     <td colspan="2" align="left" class="texh"><input type="checkbox" name="cmp2" id="cmp2" value="ครบ" <?=$meminfo["cmp2"]==""?"":"checked"?> tabindex="34"  readonly disabled/>
       สำเนาบัญชีธนาคาร&nbsp; <?=$meminfo['bmdate2']?></td>
     </tr><tr>
       <td align="right" class="texh" valign=top><strong>หมายเหตุ </strong>: </td>
       <td class="texd"><span class="texh">
         <?=$meminfo['txtoption']?>
       </span></td>
     <td colspan="2" align="left" class="texh"><input type="checkbox" name="ccmp" id="ccmp" value="ครบ" <?=$meminfo["ccmp"]==""?"":"checked"?> tabindex="34"  readonly disabled/>
       สำเนาบัตรประชาชนผู้สมัครร่วม&nbsp; <?=$meminfo['cbmdate1']?></td>
     </tr><tr>
     <td align="right" class="texh">&nbsp;</td>
     <td class="texd">&nbsp;</td>
     <td align="right" class="texh">&nbsp;</td>
     <td class="texd">&nbsp;</td>
   </tr>
</table>
</fieldset>

      </td>
    </tr>
  </table>
</form><br><Br><br><Br><br><Br><br><Br>
     <?
     function getdistrict($mc){
     
     global $dbprefix;
        // connect to database 
        include_once "connectmysql.php";
        $sql="select * from district where districtId='".$mc."' ";
        //echo "$sql<BR>";
        if ($mc==""){return "";}
        $result=mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_object($result);
            //echo $row->districtName;
            return $row->districtName;
        }else{
            return $mc;
        }
    }
    function getamphur($mc){
     
     global $dbprefix;
        // connect to database 
        include_once "connectmysql.php";
        $sql="select * from amphur where amphurId='".$mc."' ";
        //echo "$sql<BR>";
        if ($mc==""){return "";}
        $result=mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_object($result);
            //echo $row->districtName;
            return $row->amphurName;
        }else{
            return $mc;
        }
    }
    
    function getprovince($mc){
     
     global $dbprefix;
        // connect to database 
        include_once "connectmysql.php";
        $sql="select * from province where provinceId='".$mc."' ";
        //echo "$sql<BR>";
        if ($mc==""){return "";}
        $result=mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_object($result);
            //echo $row->districtName;
            return $row->provinceName;
        }else{
            return $mc;
        }
    }
    
    function getinv($mc){
     //echo $mc;
     global $dbprefix;
        // connect to database 
        include_once "connectmysql.php";
        
        $sql="select * from ".$dbprefix."invent where inv_code='".$mc."' ";
        //echo "$sql<BR>";
        if ($mc==""){return "";}
        $result=mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_object($result);
            //echo $row->districtName;
            return $row->inv_desc;
        }else{
            return "";
        }
    }
    
    function getpositionname($p){
        global $dbprefix;
        // connect to database 
        include_once "connectmysql.php";
        $sql="select * from ".$dbprefix."position where posshort='".$p."' ";
        //echo "$sql<BR>";
        if ($p==""){return "";}
        $result=mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_object($result);
            return $row->posname." ($p)";
        }else{
            return "";
        }
    }
    function getbank($p){
        global $dbprefix;
        // connect to database 
        include_once "connectmysql.php";
        $sql="select * from ".$dbprefix."bank where bankcode='".$p."' ";
        //echo "$sql<BR>";
        if ($p==""){return "";}
        $result=mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_object($result);
            return $row->bankname;
        }else{
            return "";
        }
    }
    function getlocation($p){
        global $dbprefix;
        // connect to database 
        include_once "connectmysql.php";
        $sql="select * from ".$dbprefix."location_base where cid='".$p."' ";
        //echo "$sql<BR>";
        if ($p==""){return "";}
        $result=mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_object($result);
            return $row->cname;
        }else{
            return "";
        }
    }
    
     ?>