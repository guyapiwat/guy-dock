<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
	<tr>
		<td width="5%" valign="top">&nbsp;</td>
		<td width="95%" align="left" valign="top">

			<table border="0" cellspacing="0" cellpadding="0" width="760">
				<tr>
					<td  valign="top" colspan="3"><img src="images/sysadmin.gif" border="0" align="absmiddle" /><FONT SIZE="+2" ><B>บริหารระบบ System Admin</B></FONT><br /><br />
				<tr >
					<td height="28" colspan="2"><img src="./images/user.gif" width="32" height="32" align="absmiddle" />&nbsp;<? echo  "<strong>รหัสผู้ใช้ :</strong> ".$_SESSION["adminusercode"]." <strong>ชื่อผู้ใช้ :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
				</tr>
				<tr>
				  <td width="368">
					<table width="90%" border="1" bordercolor="#0099CC" cellSpacing="0" cellPadding="0" >
					  <tr>
						<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
					  </tr>
						 <tr>
						<td width="16%">&nbsp;</td>
						<td width="84%">&nbsp;</td>
					  </tr>
					  <!--tr>
						<td width="16%" align="right"><img src="images/8_18s.gif" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=1">สำรองข้อมูล</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/icrecycle.gif" width="16" height="16" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">ตรวจสอบ log</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/ICBOX.GIF" width="15" height="15" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">ข้อมูลจังหวัด</a></td>
					  </tr>

					    <tr>
                        <td width="16%" align="right"><img src="images/inv_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=66">ข้อมูลการชำระเงินแต่ละสาขา</a></td>
                      </tr-->
					  <tr >
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=100">ตั้งค่าเปิด/ปิดระบบ</a></td>
                      </tr>
					  <tr >
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=1001">โปรโมชั่นตำแหน่ง</a></td>
                      </tr>
                        <tr  style="display:none">
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=9">ข้อมูลผู้จำหน่ายสินค้า</a></td>
                      </tr>
                      <tr>
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">ข้อมูลสาขา</a></td>
                      </tr>
                      <tr>
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=22">ข้อมูล Payment สาขา</a></td>
                      </tr>
                      <tr>
                        <td width="16%" align="right"><img src="images/inv_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">ข้อมูลผู้ใช้สาขา (Branch) / ตั้งรหัสผ่าน</a></td>
                      </tr>
					  <tr>
						<td width="16%" align="right"><img src="./images/6_11.gif" width="25" height="25" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=3">ข้อมูลธนาคาร</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/9_37s.gif" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">ข้อมูลผู้ใช้ระบบ (Backoffice) / ตั้งรหัสผ่าน</a></td>
					  </tr>	
					    <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=8">ระบบตรวจสอบการทำงาน</a></td>
					  </tr>
                       <tr style="display:none">
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=10">ตรวจสอบรายรับรายจ่าย</a></td>
					  </tr>
					   <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=11">ตรวจสอบรายรับรายจ่าย</a></td>
					  </tr>
					   <tr style="display:none">
					     <td align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
					     <td><a href="./index.php?sessiontab=<?=$sesstab?>&sub=16">ตรวจสอบค่าใช้จ่ายแต่ละศูนย์</a></td>
				      </tr>
				      <tr  style="display:none">
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=12">ตรวจสอบรายได้ใต้สายงาน</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="./images/6_11.gif" width="25" height="25" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=20">ประกาศ</a></td>
					  </tr>
					<!--<tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=5">ตั้งค่า</a></td>
					  </tr>
					  < <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">ถ่ายโอนข้อมูล</a></td>
					  </tr>-->
					<!--  <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">กำหนดชื่อเว็บไซต์</a></td>
					  </tr>-->
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
					</table>
				</td>
				  <td width="392" valign="top"><table width="90%" style="display:none" border="1" bordercolor="#0099CC" cellSpacing="0" cellPadding="0" >
                    <tr>
                      <td colspan="2"  background="./images/bar_box.gif">ส่งข่าวสาร</td>
                    </tr>
                    <tr>
                      <td width="16%">&nbsp;</td>
                      <td width="84%">&nbsp;</td>
                    </tr>
                    <!--tr>
						<td width="16%" align="right"><img src="images/8_18s.gif" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=1">สำรองข้อมูล</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/icrecycle.gif" width="16" height="16" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">ตรวจสอบ log</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/ICBOX.GIF" width="15" height="15" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">ข้อมูลจังหวัด</a></td>
					  </tr-->
                    <tr>
                      <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                      <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=13">ส่ง Email</a></td>
                    </tr>
                    <tr>
                      <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                      <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=14">ส่ง SMS</a></td>
                    </tr>

                    <!--< <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">ถ่ายโอนข้อมูล</a></td>
					  </tr>-->
                    <!--  <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">กำหนดชื่อเว็บไซต์</a></td>
					  </tr>-->
					  <tr>
						<td width="16%" align="right"><img src="./images/6_11.gif" width="25" height="25" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=20">ประกาศ</a></td>
					  </tr>
                    <tr>
                      <td width="16%" align="right">&nbsp;</td>
                      <td width="84%">&nbsp;</td>
                    </tr>

                  </table></td>
				</tr>
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
                
            case 22:
				?>
				<legend>
		           <strong><font color="#666666">ข้อมูล Payment สาขา&nbsp;&nbsp;</font></strong>
      			</legend>
				<?
				include("invent_payment.php");
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

			case 66:
				?><legend><strong><font color="#666666">ข้อมูลการชำระเงินแต่ละสาขา</font></strong>
					<? if($acc->isAccess(1)){?>
                    <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลการชำระเงิน" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=5&sub=66&state=2'>เพิ่มข้อมูลการชำระเงิน</a>
                   <? }?>              
                </legend><?
				include("payment_type.php");
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
			case 8:
				?><legend><strong><font color="#666666">ระบบตรวจสอบการทำงาน
                </font></strong></legend><?
				include("report_log.php");
				break;
			case 9:
				?>
				<legend>
		           <strong><font color="#666666">ข้อมูลสาขา&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                	<img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลผู้จำหน่ายสินค้า" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=9&state=2'>เพิ่มข้อมูลผู้จำหน่ายสินค้า</a>
                   <? }?>              
      			</legend>
				<?
				include("supplier.php");
				break;
				case 10:
				?><legend><strong><font color="#666666">ยอดรวม
                </font></strong></legend><?
				include("checkAll.php");
				break;
				case 11:
				?><legend><strong><font color="#666666">ยอดรวม
                </font></strong></legend><?
				include("checkAll1.php");
				break;
				case 12:
				?><legend><strong><font color="#666666">ตรวจสอบรายได้ใต้สายงาน
                </font></strong></legend><?
				include("checkdownline.php");
				break;
				case 14:
				?><legend><strong><font color="#666666">ส่ง SMS
                </font></strong></legend><?
				include("sendsms.php");
				break;
				case 13:
				?><legend><strong><font color="#666666">ส่ง Email
                </font></strong></legend><?
				include("sendemail.php");
				break;
				case 15:
				?><legend><strong><font color="#666666">ข่าวสาร และ กิจกรรม
                </font></strong></legend><?
				include("news/index.php");
				break;
				case 16:
				?><legend><strong><font color="#666666">ตรวจสอบค่าใช้จ่ายศูนย์
                </font></strong></legend><?
				include("cost_branch.php");
				break;
				case 23:
				?>
				<legend>
       			    <strong><font color="#666666">   รายงานการเติมเงิน &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลการซื้อขาย" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=3&sub=23&state=2'>เติมเงิน</a>
                   <? }?>              
                </legend>
				<?
				include("ewallet.php");
				break;
				case 20:
				?><legend><strong><font color="#666666">ประกาศ </font></strong><?
				 if($acc->isAccess(1)){?>
                    <img border="0" src="./images/add.gif" alt="ประกาศ" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=5&sub=20&state=2'>ประกาศ</a>
                   <? }?>              
                </legend><?
				include("news.php");
				break;
				case 99:
				?>
				<legend>
       			    <strong><font color="#666666">แจงยอด</font></strong>
                </legend>
				<?
				include("sale_hold1.php");
				break;
				case 100:
				?><legend><strong><font color="#666666">ตั้งค่าเปิด/ปิดระบบ
                </font></strong></legend><?
				include("system_editadd.php");
				break;
				case 1001:
				?><legend><strong><font color="#666666">โปรโมชั่นตำแหน่ง
                </font></strong></legend><?
				include("pos_exp_editadd.php");
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


