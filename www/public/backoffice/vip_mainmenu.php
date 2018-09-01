<?
	if(!isset($_GET['sub'])){
	
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
<tr>
<td width="5%" valign="top" >&nbsp;</td>
<td width="87%" align="left" valign="top" >
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td  valign="top" colspan="2"><img src="./images/vip.gif" border="0" align="absmiddle" /><FONT SIZE="+2" ><B>VIP</B></FONT><br />
	  <br />
<tr >
<td width="50%" height="28"><img src="./images/user.gif" width="32" height="32" align="absmiddle">&nbsp;<? echo  "<strong>รหัสผู้ใช้ :</strong> ".$_SESSION["adminusercode"]." <strong>ชื่อผู้ใช้ :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
	<td width="50%" align="right">&nbsp;	</td>
</tr>
<tr><td valign="top">
	<table width="95%" border="1" bordercolor="#0099CC" cellSpacing="0" cellPadding="0" >
	  <tr>
		<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
		</tr>
		 <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%">&nbsp;</td>
	  </tr>
	  <tr >
		<td width="16%" align="right"><img src="./images/pos_s.gif" width="24" height="24">&nbsp;&nbsp;</td>
		<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=1">สมาชิกและข้อมูลตำแหน่ง</a></td>
	  </tr>
	<!--  <tr>
		<td width="16%" align="right"><img src="./images/point_s.gif" width="24" height="24">&nbsp;&nbsp;</td>
		<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">ให้คะแนนสมาชิก</a></td>
	  </tr>
	  <tr>
		<td width="16%" align="right"><img src="./images/Animp.gif" width="19" height="18">&nbsp;&nbsp;</td>
		<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">ปรับสถานะการรักษายอดของสมาชิก</a></td>
	  </tr>-->
      <tr>
        <td align="right"><img src="./images/pos_s.gif" alt="" width="24" height="24">&nbsp;&nbsp;</td>
        <td><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">เพิ่มคะแนนสมาชิก</a></td>
        </tr>	
      <tr>
        <td align="right"><img src="./images/pos_s.gif" alt="" width="24" height="24">&nbsp;&nbsp;</td>
        <td><a href="./index.php?sessiontab=<?=$sesstab?>&sub=3">รายงานสมาชิก vip</a></td>
        </tr>	
        <tr style="display:none">
        <td align="right"><img src="./images/pos_s.gif" alt="" width="24" height="24">&nbsp;&nbsp;</td>
	    <td><a href="./index.php?sessiontab=<?=$sesstab?>&sub=22">เพิ่มคะแนนสมาชิก(กลุ่ม)</a></td>
	    </tr>
		  <tr>
			<td colspan="2">&nbsp;</td>
		  </tr>
	</table>
</td>
 <!-- <td valign="top">
	  <table width="90%" border="1" bordercolor="#0099CC" cellSpacing="0" cellPadding="0" >
			  <tr>
				<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
				</tr>
				 <tr>
				<td width="16%">&nbsp;</td>
				<td width="84%">&nbsp;</td>
			  </tr>
			  <tr>
				<td width="16%" align="right"><img src="./images/folder.gif" align="absmiddle">&nbsp;&nbsp;</td>
				<td width="84%"><strong>รายงาน</strong></td>
			  </tr>
			  <tr>
				<td width="16%" align="right">&nbsp;</td>
				<td width="84%"><img src="./images/report_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=3">สรุป คะแนนที่ให้กับสมาชิก (vip) </A></td>
			  </tr>
			  
			  <tr>
				<td width="16%">&nbsp;</td>
				<td width="84%">&nbsp;</td>
			  </tr>
			  </table>
  </td>-->
</tr>
</table>
<br>
<br></td>
<td width="8%"></td>
</tr>
</table>


<?
	}else{
		 
?>
<table border="0" height="395" width="99%"><tr valign="top">
<td width="50">
<? $hl = "style='border:inset 1 #FF9933;'"; ?>
<a href="javascript:history.back()"><img border="0" src="./images/back.gif" height="40" width="40" alt="เมนูสมาชิก" /></a>
<a <?=($_GET['sub']==1?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=1"><img border="0" src="./images/pos.gif" height="40" width="40" alt="ตำแหน่ง" /></a>
<a <?=($_GET['sub']==2?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=2"><img border="0" src="./images/point.gif" height="40" width="40" alt="คะแนน" /></a>
<a <?=($_GET['sub']==3?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=3"><img border="0" src="./images/report.gif" height="40" width="40" alt="รายงานสมาชิก vip" /></a>
<!--a <?=($_GET['sub']==33?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=33"><img border="0" src="./images/report.gif" height="40" width="40" alt="รายงานสมาชิก vip" /></a-->
<!--<a <?=($_GET['sub']==4?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=4"><img border="0" src="./images/report.gif" height="40" width="40" alt="ปรับสถานะการรักษายอดของสมาชิก" /></a>-->
</td>
<td align="left" width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			case 1:
				?><legend><strong><font color="#666666">ข้อมูลตำแหน่ง</font></strong></legend><?
				include("./member_pos.php");
				break;
						case 2:
						exit;
                ?><legend><strong><font color="#666666">เพิ่มคะแนนสมาชิก</font></strong></legend><?
                include("./special_vip_point.php");
                break;			
            case 22:
				?><legend><strong><font color="#666666">คะแนนกลุ่ม</font></strong></legend><?
				include("./special_vip_point2.php");
				break;
            case 3:
                ?><legend>
                      <strong><font color="#666666">รายงานสมาชิก vip</font></strong>
                        <img border="0" src="./images/add.gif" alt="เพิ่มคะแนนสมาชิก" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=2'>เพิ่มคะแนนสมาชิก</a>
                     </legend><?
										  
                include("./special_vip_report.php");
                break;		
             case 33:
				?><legend>
				      <strong><font color="#666666">รายงานสมาชิก vip</font></strong>
					    <img border="0" src="./images/add.gif" alt="เพิ่มคะแนนกลุ่ม" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=22'>เพิ่มคะแนนกลุ่ม</a>
					 </legend><?
				include("./special_vip_report2.php");
				break;
			case 4:
				?><legend><strong><font color="#666666">ปรับสถานะการรักษายอดของสมาชิก</font></strong></legend><?
				include("./mypv.php");
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
