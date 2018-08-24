<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
	<tr>
		<td width="5%" valign="top">&nbsp;</td>
		<td width="95%" align="left" valign="top">

			<table border="0" cellspacing="0" cellpadding="0" width="760">
				<tr>
					<td  valign="top" colspan="2"><img src="images/sysadmin.gif" border="0" align="absmiddle" /><FONT SIZE="+2" ><B>บริหารระบบ System Admin</B></FONT><br /><br />
				<tr >
					<td width="300" height="28"><img src="./images/user.gif" width="32" height="32" align="absmiddle" />&nbsp;<? echo  "<strong>รหัสผู้ใช้ :</strong> ".$_SESSION["adminusercode"]." <strong>ชื่อผู้ใช้ :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
				</tr>
				<tr><td>
					<table width="50%" border="1" bordercolor="#FF7F00" cellSpacing="0" cellPadding="0" >
					  <tr>
						<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
						</tr>
						 <tr>
						<td width="16%">&nbsp;</td>
						<td width="84%">&nbsp;</td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/8_18s.gif" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=1">สำรองข้อมูล</a></td>
					  </tr>
					  <!--tr>
						<td width="16%" align="right"><img src="images/icrecycle.gif" width="16" height="16" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">ตรวจสอบ log</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/ICBOX.GIF" width="15" height="15" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">ข้อมูลจังหวัด</a></td>
					  </tr-->
                      <tr>
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">ข้อมูลสาขา</a></td>
                      </tr>
                      <tr>
                        <td width="16%" align="right"><img src="images/inv_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">ข้อมูลผู้ใช้สาขา / ตั้งรหัสผ่าน</a></td>
                      </tr>
					  <tr>
						<td width="16%" align="right"><img src="./images/6_11.gif" width="25" height="25" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=3">ข้อมูลธนาคาร</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/9_37s.gif" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">ข้อมูลผู้ใช้ระบบ / ตั้งรหัสผ่าน</a></td>
					  </tr>	
					 <!-- <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=5">ตั้งค่า</a></td>
					  </tr>-->
					 <!-- <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">ถ่ายโอนข้อมูล</a></td>
					  </tr>-->
					<!--  <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">กำหนดชื่อเว็บไซต์</a></td>
					  </tr>-->
					  <tr>
						<td width="16%" align="right">&nbsp;</td>
						<td width="84%">&nbsp;</td>
					  </tr>
					</table>
				</td></tr>
			</table>
      	</td>
</tr>
</table>
<?
	}else{
?>
<table border="0" height="395" width="99%"><tr valign="top">
<td width="50">
<? $hl = "style='border:inset 1 #FF9933;'"; ?>
<a href="javascript:history.back()"><img src="./images/back.gif" border="0"height="40" width="40" alt="เมนูบริหารระบบ" /></a>
<a <?=($_GET['sub']==1?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=1"><img border="0" src="./images/8_18.gif" height="40" width="40" alt="สำรองข้อมูล" /></a>
<a <?=($_GET['sub']==2?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=2"><img border="0" src="./images/10_11.gif" height="40" width="40" alt="ข้อมูลสาขา" /></a>
<a <?=($_GET['sub']==6?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=6"><img border="0" src="./images/inv.gif" height="40" width="40" alt="ข้อมูลผู้ใช้สาขา" /></a>
<!--a href="./index.php?sessiontab=<?=$sesstab?>&sub=2"><img border="0" src="./images/11_42.gif" height="40" width="40" alt="ข้อมูลจังหวัด" /></a-->
<a <?=($_GET['sub']==3?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=3"><img border="0" src="./images/6_11.gif" height="40" width="40" alt="ข้อมูลธนาคาร" /></a>
<a <?=($_GET['sub']==4?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=4"><img border="0" src="./images/9_37.gif" height="40" width="40" alt="ข้อมูลผู้ใช้ระบบ / ตั้งรหัสผ่าน" /></a>
<a <?=($_GET['sub']==5?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=5"><img border="0" src="./images/9_32.gif" height="40" width="40" alt="ตั้งค่า" /></a>
<!--a <?=($_GET['sub']==7?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=7"><img border="0" src="./images/9_32.gif" height="40" width="40" alt="กำหนดชื่อเว็บไซต์" /></a>
<!--a href="./index.php?sessiontab=<?=$sesstab?>&sub=6"><img border="0" src="./images/xxxx.gif" height="40" width="40" alt="ตรวจสอบ log" /></a-->

</td>
<td width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			case 1:
				?><legend><strong><font color="#666666">สำรองข้อมูล </font></strong></legend><?
				include("sysadmin_backup.php");
				break;
			/*case 6:
				?><legend><strong><font color="#666666">ตรวจสอบ log </font></strong></legend><?
				include("syslog.php");
				break;
			case 2:
				?><legend><strong><font color="#666666">ข้อมูลจังหวัด </font></strong></legend><?
				include("province_main.php");
				break;*/
			case 2:
				?>
				<legend>
		           <strong><font color="#666666">ข้อมูลสาขา&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                	<img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลสาขา" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=2&state=2'>เพิ่มสาขา</a>
                   <? }?>              
      			</legend>
				<?
				include("invent.php");
				break;
			case 3:
				?><legend><strong><font color="#666666">ข้อมูลธนาคาร </font></strong><?
				 if($acc->isAccess(1)){?>
                    <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลธนาคาร" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=5&sub=3&state=2'>เพิ่มข้อมูลธนาคาร</a>
                   <? }?>              
                </legend><?
				include("bank.php");
				break;
			case 4:
				?><legend><strong><font color="#666666">ข้อมูลผู้ใช้ระบบ / ตั้งรหัสผ่าน</font></strong>
					<? if($acc->isAccess(1)){?>
                    <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลสมาชิก" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=5&sub=4&state=2'>เพิ่มผู้ใช้ระบบ</a>
                   <? }?>              
                </legend><?
				include("sysuser.php");
				break;
			case 5:
				?><legend><strong><font color="#666666">ตั้งค่า</font></strong></legend><?
				include("config_mem_info.php");
				break;
			case 6:
				?><legend><strong><font color="#666666">ข้อมูลผู้ใช้สาขา / ตั้งรหัสผ่าน</font></strong>
					<? if($acc->isAccess(1)){?>
                    <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลสมาชิก" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=5&sub=6&state=2'>เพิ่มผู้ใช้สาขา</a>
                   <? }?>              
                </legend><?
				include("invuser.php");
				break;
			case 7:
				?><legend><strong><font color="#666666">ถ่ายโอนข้อมูล</font></strong></legend><?
				include("convert_data.php");
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


