<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
	<tr>
		<td width="5%">&nbsp;</td>
		<td width="95%" align="left" valign="top"><table border="0" cellspacing="4" cellpadding="0" width="90%">
          <tr>
            <td  valign="top" colspan="2"><img src="images/comsn.gif" align="absmiddle" border="0" /><font size="+2" ><b>คอมมิชชั่น Commission</b></font><br />
                <br /></td >
          </tr>
          <tr>
            <td height="28" width="50%"><img src="images/user.gif" width="32" height="32" align="absmiddle" />&nbsp;<? echo  "<strong>รหัสผู้ใช้ :</strong> ".$_SESSION["adminusercode"]." <strong>ชื่อผู้ใช้ :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td width="50%" height="40"><table width="97%" border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" background="./images/bar_box.gif">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                  <td><strong>คำนวณไบนารี่</strong></td>
                </tr>
                <tr>
                  <td width="16%"  align="right">&nbsp;</td>
                  <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=1">ข้อมูลรอบการคำนวณไบนารี่</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">คำนวณไบนารี่</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=3">ลบการคำนวณไบนารี่</a></td>
                </tr>
                <tr>
                  <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                  <td><strong>รายงาน</strong></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">รายงานรายละเอียดคะแนน</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=5">รายงานรายละเอียดการจับคู่แบบไบนารี่</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">รายงานสรุปจ่ายไบนารี่</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=16">รายงานการจ่ายคอมมิสชั่นผู้แนะนำ</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=17">รายงานสรุปจ่ายค่าแนะนำ</a></td>
                </tr>                
                <tr>
                  <td colspan="2" >&nbsp;</td>
                </tr>
            </table></td>
			
            <td width="50%" height="50" valign="top">
<table width="97%" border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" background="./images/bar_box.gif">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                  <td><strong>คำนวณแมทชิ่ง</strong></td>
                </tr>
                <tr>
                  <td width="16%"  align="right">&nbsp;</td>
                  <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">ข้อมูลรอบการคำนวณแมทชิ่ง</a></td>
                </tr> 
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=8">คำนวณแมทชิ่ง</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=9">ลบการคำนวณแมทชิ่ง</a></td>
                </tr>
                <tr>
                  <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                  <td><strong>รายงาน</strong></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=10">รายงานรายละเอียดคะแนนแมทชิ่ง</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_summary_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=11">รายงานรายละเอียดแมทชิ่ง</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=12">รายงานสรุปจ่ายแมทชิ่ง</a></td>
                </tr>
                <tr>
                  <td colspan="2" >&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2" >&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2" >&nbsp;</td>
                </tr>                                
            </table>
 </td>
            
            
            
          </tr>
          <tr height=10>
          	<td></td>
          	<td></td>
          </tr>
	<tr>

            <td width="50%" height="28">
<table width="97%" border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" background="./images/bar_box.gif">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                  <td><strong>คำนวณยูนิเลเวล</strong></td>
                </tr>
                <tr>
                  <td width="16%"  align="right">&nbsp;</td>
                  <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=18">ข้อมูลรอบการคำนวณยูนิเลเวล</a></td>
                </tr> 
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=19">คำนวณยูนิเลเวล</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=20">ลบการคำนวณยูนิเลเวล</a></td>
                </tr>
                <tr>
                  <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                  <td><strong>รายงาน</strong></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=21">รายงานรายละเอียดคะแนนยูนิเลเวล</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=22">รายงานสรุปจ่ายยูนิเลเวล</a></td>
                </tr>
                <tr>
                  <td colspan="2" >&nbsp;</td>
                </tr>
            </table>
 </td>
            <td width="50%" height="28" valign="top">
 
<table width="97%" border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" background="./images/bar_box.gif">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                  <td><strong>คำนวณคอมมิสชั่นผู้แนะนำ</strong></td>
                </tr>
                <tr>
                  <td width="16%"  align="right">&nbsp;</td>
                  <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=13">ข้อมูลรอบการคำนวณคอมมิสชั่นผู้แนะนำ</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=14">คำนวณคอมมิสชั่นผู้แนะนำ</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=15">ลบการคำนวณคอมมิสชั่นผู้แนะนำ</a></td>
                </tr>
                <tr>
                  <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                  <td><strong>รายงาน</strong></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=16">รายงานการจ่ายคอมมิสชั่นผู้แนะนำ</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=17">รายงานสรุปจ่ายค่าแนะนำ</a></td>
                </tr>
                <tr>
                  <td colspan="2" >&nbsp;</td>
                </tr>
            </table>
     
            </td>			
			</tr>
            </table></td>
            <td width="50%" height="28"><table width="97%" border="0" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
            </td>
		  </tr>
		</table></td>
  </tr>
  </table>
<?
	}else{
?>
<table border="0" height="395"  width="99%"><tr valign="top">
<td width="50">
<a href="javascript:history.back()"><img border="0" src="./images/back.gif" height="40" width="40" alt="เมนูคอมมิชชั่น" /></a>
<? 	if(isset($_GET['sub']))
		$sub = $_GET['sub'];
	else if(isset($_POST['sub']))
		$sub = $_POST['sub'];
	$hl = "style='border:inset 1 #FF9933;'"; 
	if($sub>=1&&$sub<=6 || ($sub>=16 && $sub<=17)){		
?>

<a <?=($_GET['sub']==1?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=1"><img border="0" src="./images/round_b.gif" height="40" width="40" alt="ข้อมูลรอบการคำนวณไบนารี่" /></a>
<a <?=($_GET['sub']==2?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=2"><img border="0" src="./images/cal_b.gif" height="40" width="40" alt="คำนวณไบนารี่" /></a>
<a <?=($_GET['sub']==3?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=3"><img border="0" src="./images/del_b.gif" height="40" width="40" alt="ลบการคำนวณไบนารี่" /></a>
<a <?=($_GET['sub']==4?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=4"><img border="0" src="./images/rp_detail.gif" height="40" width="40" alt="รายงานรายละเอียดคะแนน" /></a>
<a <?=($_GET['sub']==5?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=5"><img border="0" src="./images/rp_detail.gif" height="40" width="40" alt="รายงานรายละเอียดการจับคู่แบบไบนารี่" /></a>
<a <?=($_GET['sub']==6?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=6"><img border="0" src="./images/rp_detail.gif" height="40" width="40" alt="รายงานสรุปจ่ายไบนารี่" /></a>
<a <?=($_GET['sub']==16?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=16"><img border="0" src="./images/rp_detail.gif" height="40" width="40" alt="รายงานรายละเอียดการจ่ายผู้แนะนำ" /></a> 
<a <?=($_GET['sub']==17?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=17"><img border="0" src="./images/rp_detail.gif" height="40" width="40" alt="รายงานสรุปจ่ายผู้แนะนำ" /></a>

<? }else if($sub>=7&&$sub<=12){?>
<a <?=($_GET['sub']==7?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=7"><img border="0" src="./images/round_b.gif" height="40" width="40" alt="ข้อมูลรอบการคำนวณแมทชิ่ง" /></a>
<a <?=($_GET['sub']==8?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=8"><img border="0" src="./images/cal_b.gif" height="40" width="40" alt="คำนวณแมทชิ่ง" /></a>
<a <?=($_GET['sub']==9?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=9"><img border="0" src="./images/del_b.gif" height="40" width="40" alt="ลบการคำนวณแมทชิ่ง" /></a>
<a <?=($_GET['sub']==10?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=10"><img border="0" src="./images/rp_detail.gif" height="40" width="40" alt="รายงานรายละเอียดคะแนนแมทชิ่ง" /></a>
<a <?=($_GET['sub']==11?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=11"><img border="0" src="./images/rp_summary.gif" height="40" width="40" alt="รายงานสรุปแมทชิ่งโบนัส" /></a>
<a <?=($_GET['sub']==12?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=12"><img border="0" src="./images/rp_pay.gif" height="40" width="40" alt="รายงานสรุปจ่ายแมทชิ่งโบนัส" /></a>
<?  }elseif($sub>=13&&$sub<=17){	 ?>

<a <?=($_GET['sub']==13?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=13"><img border="0" src="./images/round_b.gif" height="40" width="40" alt="ข้อมูลรอบการคำนวณผู้แนะนำ" /></a>
<a <?=($_GET['sub']==14?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=14"><img border="0" src="./images/cal_b.gif" height="40" width="40" alt="คำนวณจ่ายผู้แนะนำ" /></a>
<a <?=($_GET['sub']==15?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=15"><img border="0" src="./images/del_b.gif" height="40" width="40" alt="ลบการคำนวณการจ่ายผู้แนะนำ" /></a>
<a <?=($_GET['sub']==16?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=16"><img border="0" src="./images/rp_summary.gif" height="40" width="40" alt="รายงานรายละเอียดการจ่ายผู้แนะนำ" /></a> 
<a <?=($_GET['sub']==17?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=17"><img border="0" src="./images/rp_pay.gif" height="40" width="40" alt="รายงานสรุปจ่ายผู้แนะนำ" /></a>

<? }elseif($sub>=18&&$sub<=22){	 ?>
<a <?=($_GET['sub']==18?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=18"><img border="0" src="./images/round_b.gif" height="40" width="40" alt="ข้อมูลรอบการคำนวณยูนิเลเวล" /></a>  
<a <?=($_GET['sub']==19?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=19"><img border="0" src="./images/cal_b.gif" height="40" width="40" alt="คำนวณยูนิเลเวล" /></a>  
<a <?=($_GET['sub']==20?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=20"><img border="0" src="./images/del_b.gif" height="40" width="40" alt="ลบการคำนวณยูนิเลเวล" /></a>  
<a <?=($_GET['sub']==21?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=21"><img border="0" src="./images/rp_summary.gif" height="40" width="40" alt="รายงานรายละเอียดคะแนนยูนิเลเวล" /></a>  
<a <?=($_GET['sub']==22?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=22"><img border="0" src="./images/rp_pay.gif" height="40" width="40" alt="รายงานสรุปคะแนนยูนิเลเวล" /></a>  
<? } ?>
</td>
<td align="left" width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			case 1:
				?>
				<legend>
		           <strong><font color="#666666">ข้อมูลรอบการคำนวณไบนารี่&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลรอบการคำนวณไบนารี่" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=1&state=2'>เพิ่มข้อมูลรอบการคำนวณไบนารี่</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_a/around.php");
				break;
			case 2:
				?>
				<legend>
		           <strong><font color="#666666">คำนวณไบนารี่</font></strong></legend>
				<?
				include("./comsn/com_a/comsn_a_calc.php");
				break;
			case 3:
				?>
				<legend>
		           <strong><font color="#666666">ลบการคำนวณไบนารี่</font></strong></legend>
				<?
				include("./comsn/com_a/comsn_a_delete.php");
				break;
			case 4:
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดคะแนน</font></strong></legend>
				<?
				include("./comsn/com_a/rep_ad_comsn.php");
				break;
			case 5:
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดการจับคู่แบบไบนารี่</font></strong></legend>
				<?
				include("./comsn/com_a/rep_ambonus_comsn.php");
				break;
			case 6:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปจ่ายไบนารี่</font></strong></legend>
				<?
				include("./comsn/com_a/rep_apay_comsn.php");
				break;
			case 7:
				?>
				<legend>
		           <strong><font color="#666666">ข้อมูลรอบการคำนวณแมทชิ่ง&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลรอบการคำนวณแมทชิ่ง" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=7&state=2'>เพิ่มข้อมูลรอบการคำนวณแมทชิ่ง</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_b/bround.php");
				break;
			case 8:
				?>
				<legend>
		           <strong><font color="#666666">คำนวณแมทชิ่ง</font></strong></legend>
				<?
				include("./comsn/com_b/comsn_b_calc.php");
				break;
			case 9:
				?>
				<legend>
		           <strong><font color="#666666">ลบการคำนวณแมทชิ่ง</font></strong></legend>
				<?
				include("./comsn/com_b/comsn_b_delete.php");
				break;
			case 10:
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดคะแนนแมทชิ่ง</font></strong></legend>
				<?
				include("./comsn/com_b/rep_bm_comsn.php");
				break;
			case 11:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปแมทชิ่งโบนัท</font></strong></legend>
				<?
				include("./comsn/com_b/rep_bmbonus_comsn.php");
				break;
			case 12:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปจ่ายแมทชิ่งโบนัท</font></strong></legend>
				<?
				include("./comsn/com_b/rep_bpay_comsn.php");
				break;
			case 14:
				?>
				<legend>
		           <strong><font color="#666666">คำนวณคอมมิชชั่นผู้แนะนำ</font></strong></legend>
				<?
				include("./comsn/com_c/comsn_c_calc.php");
				break;
			case 15:
				?>
				<legend>
		           <strong><font color="#666666">ลบการคำนวณคอมมิชชั่นผู้แนะนำ</font></strong></legend>
				<?
				include("./comsn/com_c/comsn_c_delete.php");
				break;
			case 16:
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดคอมมิชชั่นให้ผู้แนะนำ</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cmbonus_comsn.php");
				break;
			case 17:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปจ่ายผู้แนะนำ</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cpay_comsn.php");
				break;
			case 18:
				?>
				<legend>
		           <strong><font color="#666666">รอบคำนวณยูนิเลเวล</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลรอบการคำนวณยูนิเลเวล" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=18&state=2'>เพิ่มข้อมูลรอบการคำนวณยูนิเลเวล</a>
                   <? }?>
				</legend>

				<?
				include("./comsn/com_d/dround.php");
				break;
			case 19:
				?>
				<legend>
		           <strong><font color="#666666">คำนวณยูนิเลเวล</font></strong></legend>
				<?
				include("./comsn/com_d/comsn_d_calc.php");
				break;
			case 20:
				?>
				<legend>
		           <strong><font color="#666666">ลบการคำนวณยูนิเลเวล</font></strong></legend>
				<?
				include("./comsn/com_d/comsn_d_delete.php");
				break;
			case 21:
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดคอมมิชชั่นยูนิเลเวล</font></strong></legend>
				<?
				include("./comsn/com_d/rep_dmbonus_comsn.php");
				break;
			case 22:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปจ่ายยูนิเลเวล</font></strong></legend>
				<?
				include("./comsn/com_d/rep_dpay_comsn.php");
				break;
			case 13:
				?>
				<legend>
		           <strong><font color="#666666">ข้อมูลรอบการคำนวณคอมมิชชั่นให้ผู้แนะนำ&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลรอบการคำนวณคอมมิชชั่นให้ผู้แนะนำ" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=13&state=2'>เพิ่มข้อมูลรอบการคำนวณคอมมิชชั่นให้ผู้แนะนำ</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_c/cround.php");
				break;
				
			}
?>
</fieldset></td>
</tr></table>
<?
	}
?>
