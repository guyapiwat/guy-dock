<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
<tr>
<td width="5%" valign="top" >&nbsp;</td>
<td width="87%" align="left" valign="top" >
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td  valign="top" colspan="2"><img src="./images/mem.gif" border="0" align="absmiddle" /><FONT SIZE="+2" ><B>ทะเบียนสมาชิก Member</B></FONT><br /><br />
<tr >
<td width="50%" height="28"><img src="./images/user.gif" width="32" height="32" align="absmiddle">&nbsp;<? echo  "<strong>รหัสผู้ใช้ :</strong> ".$_SESSION["adminusercode"]." <strong>ชื่อผู้ใช้ :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
	<td width="50%" align="right">&nbsp;	</td>
</tr>
<tr ><td valign="top">
	<table width="95%" border="1" bordercolor="#0099CC" cellSpacing="0" cellPadding="0" >
	  <tr>
		<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
		</tr>
		 <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%">&nbsp;</td>
	  </tr>
	  <!--tr>
		<td width="16%" align="right"><img src="./images/Animp.gif" width="19" height="18">&nbsp;&nbsp;</td>
		<td width="84%"><a href="./mem_position_main.php">ข้อมูลตำแหน่งสมาชิก</a></td>
	  </tr-->
	  <tr>
		<td width="16%" align="right"><img src="./images/mem_s.gif" width="24" height="24">&nbsp;&nbsp;</td>
		<td width="84%"><strong>สมาชิก</strong></td>
	  </tr> 
	  <tr  style="display:none" >
		<td width="16%" align="right">&nbsp;</td>
		<td width="84%"><img src="./images/add.gif" align="absmiddle" width=24 />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2&state=2">เพิ่มสมาชิก (พนักงาน)</a></td>
	  </tr>	  <tr>
		<td width="16%" align="right">&nbsp;</td>
		<td width="84%"><img src="./images/Animp.gif" align="absmiddle" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">รายชื่อสมาชิกทั้งหมด</a></td>
	  </tr>
	  <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%"><img src="./images/upa_s.gif" align="absmiddle" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">แผนภูมิสายงานอัพไลน์</a></td>
	  </tr>
	  <tr>
        <td width="16%">&nbsp;</td>
        <td width="84%"><img src="./images/sp_s.gif" align="absmiddle" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=5">แผนภูมิสายงานผู้แนะนำ</a></td>
      </tr>
	<tr >
		<td width="16%" align="right">&nbsp;</td>
		<td width="84%"><img src="./images/treespsmall.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=26">รายงานอัพไลน์</a></td>
    </tr>
   <tr  >
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/treespsmall.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=23">รายงานผู้แนะนำ</a></td>
  </tr>
	  <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%">&nbsp;</td>
	  </tr>
	</table>
</td><td valign="top"><table width="95%" border="1"  bordercolor="#0099CC" cellSpacing="0" cellPadding="0" >
  <tr>
    <td colspan="2" background="./images/bar_box.gif">&nbsp;</td>
    </tr>
	 <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%">&nbsp;</td>
	  </tr>
  <tr>
    <td width="16%" align="right"><img src="./images/folder.gif">&nbsp;&nbsp;</td>
    <td width="84%"><strong>รายงาน</strong></td>
  </tr>
  <!--tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/ICREPLY.GIF">&nbsp;<A HREF="./rep_mem_team_a_lev.php">รายงานแสดงทีมงานในแต่ละชั้น แผน 1 (ไตรนารี่)</A></td>
  </tr>
  <tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/ICREPLY.GIF">&nbsp;<A HREF="./rep_mem_tree_b.php">แสดงทีมงานแบบต้นไม้ แผนb(matching)</A></td>
  </tr>
  <tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/ICREPLY.GIF">&nbsp;<A HREF="./rep_mem_team_b_lev.php">แสดงทีมงานในแต่ละชั้น แผนb(matching)</A></td>
  </tr>
  <tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/ICREPLY.GIF">&nbsp;<A HREF="./rep_mem_children_b.php">ลูกทีมติดตัวสมาชิก แผนb(matching)</A></td>
  </tr-->
  <tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/bank_account_s.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=101">รายงานเอกสารการสมัคร</A></td>
  </tr>
  <tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/bank_account_s.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=10">สมาชิกและข้อมูลบัญชี ธนาคาร</A></td>
  </tr>
  <tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/letter_s.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=11">พิมพ์ที่อยู่เพื่อส่งจดหมาย</A></td>
  </tr>
 <tr style="display:none">
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/letter_s.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=21">กรมธรรม์สมัครใหม่</A></td>
  </tr>
  <tr style="display:none">
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/letter_s.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=21&stype=2">กรมธรรม์ต่ออายุ</A></td>
  </tr>
  <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%"><img src="./images/noup_s.gif" align="absmiddle" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">สมาชิกที่ไม่มีอัพไลน์</a></td>
	  </tr>
  <tr>
	<td width="16%">&nbsp;</td>
	<td width="84%"><img src="./images/nosp_s.gif" align="absmiddle" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">สมาชิกที่ไม่มีผู้แนะนำ </a></td>
  </tr>
  <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=36">SMS Commission </a></td>
              </tr>
	<tr   style="display:none">
    <td align="right">&nbsp;</td>
    <td><img src="./images/Animp.gif" align="absmiddle" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=19">Report SMS </a></td>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
  </tr>
</table>
</td></tr>
</table>
<br>
<br></td>
<td width="8%"></td>
</tr>
</table>


<?
	}else{
?>
<table border="0" height="395"  width="99%"><tr valign="top">
<td width="50">
<? $hl = "style='border:inset 1 #FF9933;'"; ?>
<a href="javascript:history.back()"><img border="0" src="./images/back.gif" height="40" width="40" alt="เมนูสมาชิก" /></a>
<a <?=($_GET['sub']==2?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=2"><img border="0" src="./images/users.gif" height="40" width="40" alt="รายชื่อสมาชิก" title="รายชื่อสมาชิก"/></a>
<a <?=($_GET['sub']==10?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=10"><img border="0" src="./images/bank_account.gif" height="40" width="40" alt="ข้อมูลธนาคารของสมาชิก" title="ข้อมูลธนาคารของสมาชิก" /></a>
<a <?=($_GET['sub']==11?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=11"><img border="0" src="./images/letter.gif" height="40" width="40" alt="ข้อมูลที่อยู่ของสมาชิก" title="ข้อมูลที่อยู่ของสมาชิก" /></a>
<a <?=($_GET['sub']==4?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=4"><img border="0" src="./images/upa.gif" height="40" width="40" alt="แผนภูมิสายงานสมาชิก" /></a>
<a <?=($_GET['sub']==5?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=5"><img border="0" src="./images/sp.gif" height="40" width="40" alt="แผนภูมิสายงานผู้แนะนำ" title="แผนภูมิสายงานผู้แนะนำ" /></a>
<a <?=($_GET['sub']==6?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=6"><img border="0" src="./images/noup.gif" height="40" width="40" alt="สมาชิกที่ไม่มีอัพไลน์" /></a>
<a <?=($_GET['sub']==7?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=7"><img border="0" src="./images/nosp.gif" height="40" width="40" alt="สมาชิกที่ไม่มีผู้แนะนำ" title="สมาชิกที่ไม่มีผู้แนะนำ" /></a></td>
<td align="left" width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			case 2:
				?>
				<legend>
		           <strong><font color="#666666">ข้อมูลสมาชิก&nbsp;&nbsp;</font></strong>
				   <? if($acc->isAccess(1)){?>
                   
                   &nbsp;&nbsp;<a href='./index.php?sessiontab=1&sub=2&state=2' style="display:none" >เพิ่มสมาชิก</a>  
                   <? }?>              
                </legend>
				<?
				
				include("./member.php");
				break;
			case 4:
				?><legend><strong><font color="#666666">แผนภูมิสายงานอัพไลน์</font></strong></legend><?
				include("./mem_chart_f3c.php");
				break;
			case 5:
                ?><legend><strong><font color="#666666">แผนภูมิสายงานผู้แนะนำ</font></strong></legend><?
                include("./mem_chart_stairstep.php");
                break;
            case 55:
				?><legend><strong><font color="#666666">แผนภูมิสายงานอัพไลน์</font></strong></legend><?
				include("./mem_chart_stairstep2.php");
				break;
			case 6:
				?><legend><strong><font color="#666666">ข้อมูลสมาชิก ไม่มีอัพไลน์ </font></strong></legend><?
				include("rep_mem_no_upa_code.php");
				break;
			case 7:
				?><legend><strong><font color="#666666"> ข้อมูลสมาชิก  ไม่มีผู้แนะนำ</font></strong></legend><?
				include("rep_mem_no_sp_code.php");
				break;
			case 8:
				?><legend><strong><font color="#666666">แผนภูมิต้นไม้ของสมาชิก</font></strong></legend><?
				include("mem_chart_tree.php");
				break;
			case 9:
                ?><legend><strong><font color="#666666">แผนภูมิต้นไม้ของผู้แนะนำ</font></strong></legend><?
                include("mem_chart_tree_sp.php");
                break;
            case 99:
				?><legend><strong><font color="#666666">แผนภูมิต้นไม้ของอัพไลน์</font></strong></legend><?
				include("mem_chart_tree_sp2.php");
				break;
			case 10:
				?><legend><strong><font color="#666666">ข้อมูลธนาคารของสมาชิก</font></strong></legend><?
				include("member_bank.php");
				break;
			case 101:
				?><legend><strong><font color="#666666">รายงานเอกสารการสมัคร</font></strong></legend><?
				include("member_doc.php");
				break;
			case 11:
				?><legend><strong><font color="#666666">ข้อมูลที่อยู่ของสมาชิก</font></strong></legend><?
				include("member_letter.php");
				break;
			case 15:
				?><legend><strong><font color="#666666">ข้อมูลสมาชิกที่ SP ตรงทุกๆเดือน</font></strong></legend><?
				include("member_sp.php");
				break;
			case 16:
				?><legend><strong><font color="#666666">เกรียติยศ</font></strong></legend><?
				include("member_up.php");
				break;
			case 18:
				?><legend><strong><font color="#666666">SMS</font></strong></legend><?
				include("member_sms.php");
				break;
			case 36:
				?>
				<legend>
		           <strong><font color="#666666">SMS Commission</font></strong></legend>
				<?
				include("./comsn/com_c/packfile_sms.php");
				break;
			case 19:
				?><legend><strong><font color="#666666">Report SMS</font></strong></legend><?
				include("report_sms.php");
				break;
			case 20:
				?><legend><strong><font color="#666666">Member Reset Password</font></strong></legend><?
				include("member_reset.php");
				break;
			case 21:
				?><legend><strong><font color="#666666"><? if($_REQUEST["stype"] == '2')echo 'รายกรมธรรม์ต่ออายุ'; else echo 'รายงานกรมธรรม์สมัครใหม่';?></font></strong></legend><?
				include("member_insure.php");
				break;
			case 22:
				?><legend><strong><font color="#666666">ยินดีต้อนรับ</font></strong></legend><?
				include("member_success.php");
				break;
            case 23:
                ?><legend><strong><font color="#666666">รายงานผู้แนะนำ</font></strong></legend><?
                include("team_list.php");
                break;			
            case 233:
				?><legend><strong><font color="#666666">รายงานอัพไลน์</font></strong></legend><?
				include("team_list2.php");
				break;
			case 24:
				?><legend><strong><font color="#666666">รายงานประวัติคะแนน</font></strong></legend><?
				include("rep_all_fast_all_comsn.php");
				break;
			case 25:
				?>
				<legend>
		           <strong><font color="#666666">คะแนน pv สะสมของสมาชิก&nbsp;&nbsp;</font></strong>
				           
                </legend>
				<?
				include("./member_pv.php");
				break;
			case 26:
				?>
				<legend>
		           <strong><font color="#666666">รายงานอัพไลน์</font></strong>
				           
                </legend>
				<?
				include("./team_list2.php");
				break;
			case 233:
				?><legend><strong><font color="#666666">รายงานคะแนนเข้าใหม่ ใต้สายงาน</font></strong></legend><?
				include("binary_newpoint.php");
				break;
			case 771177:
				?><legend><strong><font color="#666666">รายงานคะแนนเข้าใหม่ ใต้สายงาน</font></strong></legend><?
				include("test_bonus.php");
				break;
			case 28:
				?>
				<legend>
		           <strong><font color="#666666">รายงาน Mobile Center</font></strong>
				           
                </legend>
				<?
				include("./rep_type_member.php");
				break;
			case 8001:
				$member = "";
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดคะแนนรวมชั้น</font></strong>
				           
                </legend>
				<?
				include("./floor_pv_all.php");
				break;
			default :
				echo "<script language='JavaScript'>window.location='index.php?sessiontab=$sesstab'</script>";	
			break;
		}
?>
</fieldset>
</td>
</tr></table>
<?
	}
?>
