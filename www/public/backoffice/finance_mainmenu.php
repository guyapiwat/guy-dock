<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
	<tr>
		<td width="5%" valign="top">&nbsp;</td>
		<td width="95%" align="left" valign="top">

			<table border="0" cellspacing="0" cellpadding="0" width="1260">
				<tr>
					<td  valign="top" colspan="3"><img src="images/sysadmin.gif" border="0" align="absmiddle" /><FONT SIZE="+2" ><B>การเงิน Finance</B></FONT><br /><br />
				<tr >
					<td height="28" colspan="2"><img src="./images/user.gif" width="32" height="32" align="absmiddle" />&nbsp;<? echo  "<strong>รหัสผู้ใช้ :</strong> ".$_SESSION["adminusercode"]." <strong>ชื่อผู้ใช้ :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
				</tr>
				<tr>
				  <td width="368">
					<table width="90%" border="1" bordercolor="#FF7F00" cellSpacing="0" cellPadding="0" >
					  <tr>
						<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
					  </tr>
						 <tr>
						<td width="16%">&nbsp;</td>
						<td width="84%">&nbsp;</td>
					  </tr>
					
					  	 <tr>
						<td width="16%" align="right"><img src="images/9_37s.gif" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=28">รายงานสรุปรอบการจ่าย</a></td>
					  </tr>	
                       
                      <tr>
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=34">รายงานสรุปรอบการไม่จ่าย</a></td>
                      </tr>
					   <tr>
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=36">ค่าคอมแยก vip  แยก ธนาคาร</a></td>
                      </tr>
					    <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./sell_print_uidp.php" target="_blank">รายงานการรับชำระเงินประจำวัน  (แยกตามเคาน์เตอร์และประเภทการชำระ แยกสาขา)</a></td>
					  </tr>
                      
					  <tr>
						<td width="16%" align="right"><img src="./images/6_11.gif" width="25" height="25" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=18">รายงานการจ่ายเงิน (บัตรเครดิตรเงินโอน)</a></td>
					  </tr>

					  <tr>
                        <td width="16%" align="right"><img src="images/inv_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2828">ภงด. 3</a></td>
                      </tr>
					
					</table>
				</td>
				  <td width="392" valign="top"></td>
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

			 case 2:
				?>
				<legend>
		           	<strong><font color="#666666">บันทึกต้นทุนสินค้า&nbsp;&nbsp;</font></strong>
                   <!--	<? if($acc->isAccess(1)){?>
               	   	<img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลสินค้า" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=1&state=2'>เพิ่มสินค้า</a>
                   <? }?>    -->          
				</legend>
				<?
				include("member_finance.php");
				break;
			 case 28:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรอบการจ่าย</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cmbonus_comsn.php");
				break;
			 case 34:
				?>

				<legend>
		           <strong><font color="#666666">รายงานสรุปรอบการไม่จ่าย</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cc_comsn.php");
				break;
			 case 1:
				?>
				<legend>
		           	<strong><font color="#666666">บันทึกต้นทุนสินค้า&nbsp;&nbsp;</font></strong>
                   <!--	<? if($acc->isAccess(1)){?>
               	   	<img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลสินค้า" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=1&state=2'>เพิ่มสินค้า</a>
                   <? }?>    -->          
				</legend>
				<?
				include("product.php");
				break;
			 case 7:
				?>
				<legend>
       			    <strong><font color="#666666">ยอดขายแต่ละศูนย์</font></strong>
                </legend>
				<?
				include("product_sale_amount.php");
				break;

			 case 60:
				?>
				<legend> <strong><font color="#666666">นำสินค้าเข้าระบบ</font></strong>
				<? if($acc->isAccess(1)){?>
				<img border="0" src="./images/add.gif" alt="เพิ่มการรับสินค้าเข้า [แบบเปิดบิล]" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=60&state=2'>เพิ่มการรับสินค้าเข้า [แบบเปิดบิล]</a>
				<? }?>
				</legend>
				<?
				include("import_stockbill.php");
				break;
			 case 2828:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรอบการจ่าย ภงด. 3</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cmbonus_comsn_3.php");
				break;
			case 36:
				?>
				<legend>
		           <strong><font color="#666666">ค่าคอมแยก vip  แยก ธนาคาร</font></strong></legend>
				<?
				include("./comsn/com_c/packfile.php");
				break;
			case 18:
				?>
				<legend>
       			    <strong><font color="#666666">รายงานการจ่ายเงิน (บัตรเครดิตรเงินโอน)</font></strong>
                </legend>
				<?
				include("sale_bill_total.php");
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


