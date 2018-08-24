<? 
session_start();
include("global.php");
?>
<? 

	if($_GET['fmcode']){
		$sql = "SELECT * FROM ".$dbprefix."member ";
		$sql .= " LEFT JOIN (SELECT posshort,posname FROM ".$dbprefix."position) AS tabname1 ON (".$dbprefix."member.pos_cur=tabname1.posshort)";
		$sql .= " LEFT JOIN (SELECT username ,uid FROM ".$dbprefix."user) AS tabname3 ON (".$dbprefix."member.uid=tabname3.uid)";
		$sql .= " LEFT JOIN (SELECT mcode AS smcode,name_t AS spname FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."member.sp_code=tabname.smcode)";
		$sql .= " LEFT JOIN (SELECT mcode AS umcode,name_t AS upaname FROM ".$dbprefix."member) AS tabname2 ON (".$dbprefix."member.upa_code=tabname2.umcode)";
		$sql .= " WHERE mcode='".$_GET['fmcode']."' and ".$dbprefix."member.uid = '".$_SESSION["usercode"]."' ";

	//	echo $sql;
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
			$meminfo['upa_code'] = $row->upa_code;
			$meminfo['upaname'] = $row->upa_name;
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
<link rel="stylesheet" type="text/css" href="./../style.css" />
</head>
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
  <img src="../logo.jpg" height=100>
  <table width="100%" border="0">
  	<tr bgcolor="#FFCC33"  ><td><b>ข้อมูลธุรกิจ</b></td></tr>
    <tr><td>
<!--business information--> 
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td width="15%" align="right" class="texh"><b>รหัสสมาชิก :</b></td>
	<td width="25%" class="texd">&nbsp;<?=$meminfo['mcode']?></td>
    <td width="20%" align="right" class="texh"><b>วันที่สมัคร :</b></td>	
	<td width="40%" class="texd">&nbsp;<? echo ($meminfo['mdate']!="")?$meminfo['mdate']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>รหัสผู้แนะนำ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['sp_code']!="")?$meminfo['sp_code']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>รหัสอัพไลน์ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['upa_code']!="")?$meminfo['upa_code']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>ชื่อผู้แนะนำ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['spname']!="")?$meminfo['spname']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>ชื่ออัพไลน์ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['upaname']!="")?$meminfo['upaname']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td valign="top" align="right" class="texh"><b>&nbsp;</b></td>
    <td>&nbsp;</td>
    <td align="right" class="texh"><b>ด้าน :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['lr']!="")? ($meminfo['lr']=="1")?"ซ้าย":"ขวา": $meminfo['nodata']; ?></td>
  </tr>
</table>
</fieldset>
    </td></tr>
  	<tr bgcolor="#FFCC33" >
  	  <td><table width="100%" border="0">
        <tr bgcolor="#FFCC33">
          <td colspan="2" align="center"><b>&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3612;&#3641;&#3657;&#3626;&#3617;&#3633;&#3588;&#3619;</b></td>
          <td colspan="2" align="center"><b>&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3612;&#3641;&#3657;&#3626;&#3617;&#3633;&#3588;&#3619;&#3619;&#3656;&#3623;&#3617;</b></td>
        </tr></table></td>
  	</tr>
    <tr>
      <td>
<!--member Information-->
<table width="100%" border="0">
  <tr>
    <td width="25%" align="right" class="texh"><b>คำนำหน้าชื่อ :</b></td>
    <td width="15%" class="texd">&nbsp;<? echo ($meminfo['name_f']!="")?$meminfo['name_f']:$meminfo['nodata']; ?></td>
    <td width="20%" align="right" class="texh"><b>คำนำหน้าชื่อ :</b></td>
    <td width="40%" class="texd">&nbsp;<? echo ($meminfo['address']!="")?$meminfo['address']:$meminfo['nodata']; ?></td>
  </tr>
  
  <tr>
    <td align="right" class="texh"><b>ชื่อ-นามสกุล :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['name_t']!="")?$meminfo['name_t']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>ชื่อ-นามสกุล :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['districtId']!="")?$meminfo['districtId']:$meminfo['nodata']; ?></td>
   </tr>
  <tr>
    <td align="right" class="texh"><b>ชื่อนิติบุคคล :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['name_b']!="")?$meminfo['name_b']:$meminfo['nodata']; ?></td>
	<td align="right" class="texh"><b>ชื่อนิติบุคคล :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['amphurId']!="")?$meminfo['amphurId']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>Name &amp; LastName :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['name_e']!="")?$meminfo['name_e']:$meminfo['nodata']; ?></td>
	<td align="right" class="texh"><b>Name &amp; LastName :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['provinceId']!="")?$meminfo['provinceId']:$meminfo['nodata']; ?></td>
    </tr>
   <tr>
    <td align="right" class="texh"><b>เพศ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['sex']!="")?$meminfo['sex']:$meminfo['nodata']; ?></td>
	<td align="right" class="texh"><b>เพศ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['zip']!="")?$meminfo['zip']:$meminfo['nodata']; ?></td>
   </tr>
   <tr>
    <td align="right" class="texh"><b>วันที่เกิด :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['birthday']!="")?$meminfo['birthday']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>วันที่เกิด :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['home_t']!="")?$meminfo['home_t']:$meminfo['nodata']; ?></td>
  </tr>
   <tr>
    <td align="right" class="texh"><b>อายุ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['age']!="")?$meminfo['age']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>อายุ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['mobile']!="")?$meminfo['mobile']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>อาชีพ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['occupation']!="")?$meminfo['occupation']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>อาชีพ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['fax']!="")?$meminfo['fax']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>สัญชาติ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['national']!="")?$meminfo['national']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>สัญชาติ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['bonusrec']!="")? ($meminfo['bonusrec']=="1")?"ธนาคาร":"รับเอง": $meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>เลขประจำตัวประชาชน :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['id_card']!="")?$meminfo['id_card']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>เลขประจำตัวประชาชน :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['bankname']!="")?$meminfo['bankname']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b> เลขทะเบียนนิติบุคคล :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['id_tex']!="")?$meminfo['id_tex']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>เลขทะเบียนนิติบุคคล :</b></td>
     <td class="texd">&nbsp;<? echo ($meminfo['branch']!="")?$meminfo['branch']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>โทรศัพท์บ้าน :</b></td>
	<td class="texd">&nbsp;<? echo ($meminfo['status']!="")?$meminfo['status']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>โทรศัพท์บ้าน :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['acc_type']!="")?$meminfo['acc_type']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>โทรศัพท์มือถือ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['mar_name']!="")?$meminfo['mar_name']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>โทรศัพท์มือถือ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['acc_no']!="")?$meminfo['acc_no']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>โทรสาร :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['mar_age']!="")?$meminfo['mar_age']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>โทรสาร :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['acc_name']!="")?$meminfo['acc_name']:$meminfo['nodata']; ?></td>
  </tr>
  <tr>
    <td align="right" class="texh"><b>อีเมล์ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['email']!="")?$meminfo['email']:$meminfo['nodata']; ?></td>
    <td align="right" class="texh"><b>อีเมล์ :</b></td>
    <td class="texd">&nbsp;<? echo ($meminfo['memdesc']!="")?$meminfo['memdesc']:$meminfo['nodata']; ?></td>
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
        <td colspan="2" align="center"><b>&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;&#3605;&#3634;&#3617;&#3607;&#3632;&#3648;&#3610;&#3637;&#3618;&#3609;&#3610;&#3657;&#3634;&#3609;</b></td>
        <td colspan="2" align="center"><b>&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;&#3626;&#3635;&#3627;&#3619;&#3633;&#3610;&#3592;&#3633;&#3604;&#3626;&#3656;&#3591; / &#3626;&#3656;&#3591;&#3648;&#3629;&#3585;&#3626;&#3634;&#3619;</b></td>
      </tr>
    </table></td>
    </tr>
   <tr>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['email']!="")?$meminfo['email']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['memdesc']!="")?$meminfo['memdesc']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['email']!="")?$meminfo['email']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['memdesc']!="")?$meminfo['memdesc']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['email']!="")?$meminfo['email']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['memdesc']!="")?$meminfo['memdesc']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['email']!="")?$meminfo['email']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['memdesc']!="")?$meminfo['memdesc']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['email']!="")?$meminfo['email']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['memdesc']!="")?$meminfo['memdesc']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['email']!="")?$meminfo['email']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['memdesc']!="")?$meminfo['memdesc']:$meminfo['nodata']; ?></td>
   </tr><tr>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['email']!="")?$meminfo['email']:$meminfo['nodata']; ?></td>
     <td align="right" class="texh"><b>อีเมล์ :</b></td>
     <td class="texd"><? echo ($meminfo['memdesc']!="")?$meminfo['memdesc']:$meminfo['nodata']; ?></td>
   </tr>
</table>
</fieldset>

      </td>
    </tr>
  </table>
<table align=right width="100%"><tr>
    <td width="50%" align="center" class="texh"><b><br>
      <br>
      <br>
      <br>
      Entry : .......................................... </b></td>
    <td width="50%" align="center" valign="bottom"><b>Customer : ..........................................</b></td>
</tr></table>
</form>
     <?
     function getdistrict($mc){
     
     global $dbprefix;
        // connect to database 
        include_once "connectmysql.php";
        $sql="select * from district where districtId=".$mc." ";
        //echo "$sql<BR>";
        if ($mc==""){return "";}
        $result=mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_object($result);
            //echo $row->districtName;
            return $row->districtName;
        }else{
            return "";
        }
    }
    function getamphur($mc){
     
     global $dbprefix;
        // connect to database 
        include_once "connectmysql.php";
        $sql="select * from amphur where amphurId=".$mc." ";
        //echo "$sql<BR>";
        if ($mc==""){return "";}
        $result=mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_object($result);
            //echo $row->districtName;
            return $row->amphurName;
        }else{
            return "";
        }
    }
    
    function getprovince($mc){
     
     global $dbprefix;
        // connect to database 
        include_once "connectmysql.php";
        $sql="select * from province where provinceId=".$mc." ";
        //echo "$sql<BR>";
        if ($mc==""){return "";}
        $result=mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_object($result);
            //echo $row->districtName;
            return $row->provinceName;
        }else{
            return "";
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
        $sql="select * from ".$dbprefix."bank where bankcode=".$p." ";
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
    
    
     ?>