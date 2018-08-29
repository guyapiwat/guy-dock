<?	
	$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	 

	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
<tr>
<td width="5%" >&nbsp;
</td>
<td width="95%" align="left" valign="top">

<table width="98%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td  valign="top" colspan="2"><img src="images/sales.gif" border="0" align="absmiddle"><FONT SIZE="+2" ><B>ขาย Sales</B></FONT><br /><br /></td>
	</tr>
	<tr>
		<td height="28" colspan="2"><img src="images/user.gif" width="32" height="32" align="absmiddle" />&nbsp;<? echo  "<strong>รหัสผู้ใช้ :</strong> ".$_SESSION["adminusercode"]." <strong>ชื่อผู้ใช้ :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
	</tr>
	<tr>
		<td width="50%" valign="top">
		<table width="90%" border="1" bordercolor="#ed1b24" cellSpacing="0" cellPadding="0" >
		  <tr>
			<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
			</tr>
			 <tr>
			<td width="16%">&nbsp;</td>
			<td width="84%">&nbsp;</td>
		  </tr>
		   
          <tr>
			<td width="16%" align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
			<td width="84%"><strong>บิลขาย (ใบสั่งซื้อสินค้าของสมาชิก)</strong></td>
		  </tr>
		   <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=6">บิลขาย</a></td>
		  </tr>
<tr style="display:none">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/billhold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=16">บิลจัดส่ง</a></td>
		  </tr>
<tr style="">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/billhold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=10">บิลแจงยอด</a></td>
		  </tr>
<tr style="display:none">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/hold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=9">แจงยอด</a></td>
		  </tr>
		  <tr style="display:none">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/billhold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=9">รายการแจงยอดสินค้าคงเหลือ</a></td>
		</tr>
		 
            <tr style="display:none">
		     <td align="right">&nbsp;</td>
		     <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=141">บิลระหว่างศูนย์</a></td>
		     </tr>
			 <tr style="display:none" >
		     <td align="right">&nbsp;</td>
		     <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=144">บิล Autoship</a></td>
		     </tr>
          <!--  <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=36">บิลขายส่งสรรพากร</a></td>
		  </tr>-->
           
          <tr  >
			<td width="16%" align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
			<td width="84%"><strong>บัญชีเงินสดส่วนตัว(Ewallet),(Eautoship)</strong></td>
		  </tr>
		   <tr  style="display:none"  >
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=23&state=2">เติมเงิน</a></td>
		  </tr>
		   <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=17">รายการเติมเงิน Ewallet ทั้งหมด</a></td>
		  </tr>
		  <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=177">รายการเติมเงิน Eautoship ทั้งหมด</a></td>
		  </tr>
           <tr  style="display:none"  >
             <td align="right">&nbsp;</td>
             <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=23">รายการเติมเงิน</a></td>
           </tr>
		  <tr style="display:none"  >
		   <td width="16%" align="right">&nbsp;</td>
		    <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=149">รายการโอนเงิน Ewallet สมาชิก</a></td>
		 </tr>
		 <tr  style="display:none">
		   <td width="16%" align="right">&nbsp;</td>
		    <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=150">รายการถอนเงิน Ewallet สมาชิก</a></td>
		 </tr>
		 
	<tr style="display:none">
			<td width="16%" align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
			<td width="84%"><strong>Ecom</strong></td>
		  </tr>

             <tr style="display:none">
             <td align="right">&nbsp;</td>
             <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=234">รายการ Ecom</a></td>
           </tr>
             <tr  style="display:none" >
             <td align="right">&nbsp;</td>
             <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=2345">รายงาน Evoucher</a></td>
           </tr>
           
		   
		   <tr style="display:none">
             <td align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
		     <td><strong>รายงาน Hold รายงาน</strong></td>
		     </tr>
		   <tr style="display:none">
             <td align="right">&nbsp;</td>
		     <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=42">ยอดซื้อ</a></td>
		     </tr>
		   <tr style="display:none">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=9">ยอดแจง </a></td>
		  </tr>
		  <tr>
			<td colspan="2">&nbsp;</td>
		  </tr>
		</table>
		<br>
		<table style="display:none" width="90%" border="1" bordercolor="#ed1b24" cellSpacing="0" cellPadding="0" >
          <tr>
            <td width="16%">&nbsp;</td>
            <td width="84%">&nbsp;</td>
          </tr>
          <tr>
            <td width="16%" align="right"><img src="./images/folder.gif" align="absmiddle">&nbsp;&nbsp;</td>
            <td width="84%"><strong>&#3618;&#3639;&#3609;&#3618;&#3633;&#3609;&#3648;&#3629;&#3585;&#3626;&#3634;&#3619;&#3585;&#3634;&#3619;&#3586;&#3634;&#3618;HOLD</strong></td>
          </tr>
          <tr>
            <td width="16%" align="right">&nbsp;</td>
            <td width="84%"><img src="./images/hold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=9">&#3649;&#3592;&#3591;&#3618;&#3629;&#3604;</a></td>
          </tr>
          <tr style="display:none">
            <td width="16%" align="right">&nbsp;</td>
            <td width="84%"><img src="./images/billhold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=10">&#3610;&#3636;&#3621;&#3649;&#3592;&#3591;&#3618;&#3629;&#3604;</a></td>
          </tr>
        </table></td>
		<td width="50%" valign="top">
		<table width="90%" border="1" bordercolor="#ed1b24" cellSpacing="0" cellPadding="0" >
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
		  <tr style="display:none" bordercolor="#FF7F00">
            <td align="right">&nbsp;</td>
		    <td><img src="./images/sale_stat_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">&#3618;&#3629;&#3604;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;&#3607;&#3637;&#3656;&#3606;&#3641;&#3585;&#3586;&#3634;&#3618;</A></td>
		    </tr>
		  <tr bordercolor="#FF7F00">
            <td align="right">&nbsp;</td>
		    <td><img src="./images/sale_stat_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=7777">&#3626;&#3619;&#3640;&#3611;&#3618;&#3629;&#3604;&#3586;&#3634;&#3618; &#3626;&#3636;&#3609;&#3588;&#3657;&#3634; / Package / &#3626;&#3636;&#3609;&#3588;&#3657;&#3634;&#3651;&#3609; Package</A></td>
		    </tr>
		  
		  <tr style="display:none">
		    <td align="right">&nbsp;</td>
		    <td width="84%"><img src="./images/sale_stat_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=777">รายงานสินค้าคงเหลือรวมแต่ละสาขา</A></td>
		    </tr>
		   <tr style="display:none">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/sale_stat_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=20">ยอดสินค้าที่ถูกส่งออก</A></td>
		  </tr>
            
           <tr style="display:none">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/sale_stat_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=28">รายงานการขายและสมัครสมาชิก</A></td>
		  </tr>
		  <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=8">รายงานการขายและสมัครสมาชิก</a></td>
		  </tr>
		  <tr style="display:none">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=8&stype=2">รายงานรายการขายและสมัครสมาชิก(Base Currency)</a></td>
		  </tr>
  <tr  style="display:none">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=17&stype=2">รายงานรายการเติมเงิน บัญชีเงินสดส่วนตัว(Base Currency)</a></td>
		  </tr>
  <tr  style="display:none" >
    <td align="right">&nbsp;</td>
    <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./sell_print_uidp.php" target="_blank">รายงานการรับชำระเงินประจำวัน แยกตามเคาน์เตอร์และประเภทการชำระ(ขาย)</a></td>
  </tr>
   <tr  style="display:none" >
    <td align="right">&nbsp;</td>
    <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./sell_print_uidp_e.php" target="_blank">รายงานการรับชำระเงินประจำวัน แยกตามเคาน์เตอร์และประเภทการชำระ(เติมเงิน)</a></td>
  </tr>
       
		 <!--  <tr >
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=142">ใบสรุป การใช้จ่าย Ewallet ของสาขา1</a></td>
		  </tr>
		  <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="images/ICREPLY.GIF">&nbsp;&nbsp;สรุปยอดขาย ของพนักงานแต่ละคน ระหว่างวันที่</td>
		  </tr-->
		  
		  <tr style="display:none" >
		    <td align="right">&nbsp;</td>
		    <td><img src="./images/sale_stat_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=61">รายงาน list active สั่งซื้อสินค้าภายในเดือน (<?=$thaimonth[date(" m ")-1]?>)</A></td>
		  </tr>
		  <tr style="display:none" >
            <td align="right">&nbsp;</td>
		    <td><img src="./images/sale_stat_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=66667">รายงานการขายประจำวัน</a></td>
		    </tr>
		  <tr style="display:none" >
            <td align="right">&nbsp;</td>
		    <td><img src="./images/sale_stat_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=66666">รายงานภาษีขาย</a></td>
		    </tr>
			<tr style="display:none" >
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=1313">รายงาน ewallet คงเหลือทั้งระบบ ณ สิ้นเดือน</a></td>
		  </tr>
		  <tr style="display:none" >
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=1314">รายงานยอดขายตามภาค</a></td>
		  </tr>
		  <tr>
		    <td width="16%" align="right">&nbsp;</td>
		    <td width="84%">&nbsp;</td>
		    </tr>
		</table>
		<br>
		<table width="90%" border="1" bordercolor="#ed1b24" cellSpacing="0" cellPadding="0" >
		  <tr>
		    <td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
		    </tr>
		  <tr>
		    <td width="16%">&nbsp;</td>
		    <td width="84%">&nbsp;</td>
		    </tr>
		  <tr>
		    <td width="16%" align="right"><img src="./images/folder.gif" align="absmiddle">&nbsp;&nbsp;</td>
		    <td width="84%"><strong>รายงานสรุป</strong></td>
		    </tr>
		  <tr>
		    <td width="16%" align="right">&nbsp;</td>
		    <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=18">สรุปยอดรายการขายและเติมเงิน Ewallet,Eautoship</a></td>
		    </tr>
		  <tr style="display:none">
		    <td width="16%" align="right">&nbsp;</td>
		    <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=45">สรุปยอดรายการขายและเติมเงิน บัญชีเงินสดส่วนตัว (Base Currency)</a></td>
		    </tr>
		  <tr style="display:none">
		    <td width="16%" align="right">&nbsp;</td>
		    <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=46">สรุปยอดรายการขายและเติมเงิน Ewallet ผ่าน Stockist</a></td>
		    </tr>
		  <tr style="display:none">
		    <td width="16%" align="right">&nbsp;</td>
		    <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=47">สรุปยอดรายการขายและเติมเงิน Ewallet ผ่าน Stockist (Base Currency)</a></td>
		    </tr>
		  <tr style="display:none">
		    <td width="16%" align="right">&nbsp;</td>
		    <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=24">ใบสรุป สรุปรายการรับเงิน</a></td>
		    </tr>
		  <tr style="display:none">
		    <td width="16%" align="right">&nbsp;</td>
		    <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=143">ใบสรุป การรับเงิน Ewallet</a></td>
		    </tr>
		  <!--  <tr >
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=142">ใบสรุป การใช้จ่าย Ewallet ของสาขา1</a></td>
		  </tr>
		  <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="images/ICREPLY.GIF">&nbsp;&nbsp;สรุปยอดขาย ของพนักงานแต่ละคน ระหว่างวันที่</td>
		  </tr-->
		  <tr style="display:none">
		    <td align="right">&nbsp;</td>
		    <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=44">รายงานการสมัครออนไลน์</a></td>
		    </tr>
		  <tr style="display:none">
		    <td align="right">&nbsp;</td>
		    <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=42">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3607;&#3637;&#3656;&#3595;&#3639;&#3657;&#3629;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;&#3612;&#3656;&#3634;&#3609;&#3607;&#3634;&#3591;&#3627;&#3609;&#3657;&#3634;&#3648;&#3623;&#3655;&#3610;</a></td>
		    </tr>
		  <tr style="display:none">

		    <td align="right">&nbsp;</td>
		    <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=43">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3585;&#3634;&#3619;&#3648;&#3605;&#3636;&#3617;&#3648;&#3591;&#3636;&#3609; Ewallet &#3612;&#3656;&#3634;&#3609;&#3607;&#3634;&#3591;&#3627;&#3609;&#3657;&#3634;&#3648;&#3623;&#3655;&#3610;</a></td>
		    </tr>
		  <tr>
		    <td align="right">&nbsp;</td>
		    <td>&nbsp;</td>
		    </tr>
		  </table>
		</td>

	</tr>
	<tr>
	</tr>
	<tr>
	</tr><tr>
	</tr>
	<tr>
	<td width="50%" valign="top">
		<!--<table width="90%" border="1" bordercolor="#ed1b24" cellSpacing="0" cellPadding="0" >
		  <tr>
			<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
			</tr>
			 <tr>
			<td width="16%">&nbsp;</td>
			<td width="84%">&nbsp;</td>
		  </tr>
		  <tr>
			<td width="16%" align="right"><img src="./images/folder.gif" align="absmiddle">&nbsp;&nbsp;</td>
			<td width="84%"><strong>ยืนยันเอกสารการขายแจงยอด</strong></td>
		  </tr>
		  <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/storage.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=3">เอกสารที่ยังไม่ได้ยืนยัน</A></td>
		  </tr>
		  <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/vip.png" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">เอกสารที่ยืนยันแล้ว</a></td>
		  </tr>
		  <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="images/ICREPLY.GIF">&nbsp;&nbsp;สรุปยอดขาย ของพนักงานแต่ละคน ระหว่างวันที่</td>
		  </tr>
		  <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%">&nbsp;</td>
		  </tr>
		</table>-->
		</td>

</table>
 	</td>
	</tr>
	</tr>
</table>
<?
	}else{
?>
<table border="0" height="395" width="99%"><tr valign="top">
<td width="50">
<!--<? $hl = "style='border:inset 1 #FF9933;'"; ?>
<a href="javascript:history.back()"><img src="./images/back.gif" border="0"height="40" width="40" alt="เมนูขาย" /></a>

</td>-->
<td width="100%">
<fieldset>
<?

		switch($_GET['sub']){
			
			case 3:
				?>
				<legend>
		           <strong><font color="#666666">ยืนยันเอกสาร&nbsp;&nbsp;</font></strong>
                   <!--<? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลสินค้าในสต๊อก" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=3&state=2'>เพิ่มข้อมูลสินค้าในสต๊อก</a>
                   <? }?>      -->        
     			</legend>
				<?
				
				include("ewa_hold.php");
				//include("admin_stockmain.php");
				break;
			case 4:
				?>
				<legend>
		           	<strong><font color="#666666">ข้อมูลสินค้านำเข้า&nbsp;&nbsp;</font></strong>
                   <!--<? if($acc->isAccess(1)){?>
      			   	<img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลสินค้านำเข้า" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=4&state=2'>เพิ่มข้อมูลสินค้านำเข้า</a>
                   <? }?>            -->  
      			</legend>
				<?
				include("ewa_conf.php");
				//include("stock_inmain.php");
				break;
			case 5:
				?>
				<legend>
		           <strong><font color="#666666">ส่งสินค้าระหว่างสาขา&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มการส่งสินค้าระหว่างสาขา" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=5&state=2'>เพิ่มการส่งสินค้าระหว่างสาขา</a>
                   <? }?>              
                </legend>
				<?
				include("stock_outmain.php");
				break;
			 case 2345:
                    ?>
                    <legend>
                        <strong><font color="#666666">Evoucher&nbsp;&nbsp;</font></strong>       
                    </legend>
                    <?
                    include("voucher.php");
               break;    	
			case 6:
				?>
				<legend>
       			    <strong><font color="#666666">    รายการสั่งซื้อ &nbsp;&nbsp;</font></strong>
                          
                </legend>
				<?
				include("sale.php");
				break;
			case 66666:
				?>
				<legend>
       			    <strong><font color="#666666">    รายการสั่งซื้อ &nbsp;&nbsp;</font></strong>
                 </legend>
				<?
				include("sale_tax.php");
				break;
			case 66667:
				?>
				<legend>
       			    <strong><font color="#666666">  รายงานการขายประจำวัน &nbsp;&nbsp;</font></strong>
                 </legend>
				<?
				include("sale_report_of_day.php");
				break;
			case 666:
				?>
				<legend>
       			    <strong><font color="#666666">    รายการสั่งซื้อ &nbsp;&nbsp;</font></strong>
                 </legend>
				<?
				include("sale1.php");
				break;
			case 7:
				?>
				<legend>
       			    <strong><font color="#666666">รายงานยอดสินค้าที่ถูกขาย</font></strong>
                </legend>
				<?
				include("product_sale_amount.php");
				break;
			case 777:
				?>
				<legend>
       			    <strong><font color="#666666">รายงานสินค้าคงเหลือรวมแต่ละสาขา</font></strong>
                </legend>
				<?
				include("product_sale_amount_invent.php");
				break;
			case 7777:
				?>
				<legend>
       			    <strong><font color="#666666">รายงานยอดขายสินค้าและแพ็คเก็จ</font></strong>

                </legend>
				<?
				include("product_sale_amount_all.php");
				break;
			case 8:
				?>
				<legend>
       			    <strong><font color="#666666">รายงานการขายและสมัครสมาชิก</font></strong>
                </legend>
				<?
				include("sale_bill_amount.php");
				break;
			case 27:
				?>
				<legend>
       			    <strong><font color="#666666">ใบสรุป รายการรับเงิน Ewallet ระหว่างวันที่</font> <a href="./index.php?sessiontab=<?=$sesstab?>&sub=142">ใบรายงานสรุปรายวัน รายวัน</a></strong>
                </legend>
				<?
				include("sale_bill_ewallet_member1.php");
				break;
			case 26:
				?>
				<legend>
       			    <strong><font color="#666666">ใบสรุป รายการรับเงิน Ewallet ระหว่างวันที่</font></strong>
                </legend>
				<?
				include("sale_bill_ewallet_member.php");
				break;
			case 9:
				?>
				<legend>
       			    <strong><a href="./index.php?sessiontab=<?=$sesstab?>&sub=9"><font color="#666666">รายการแจงยอดสินค้าคงเหลือ</font> </a></strong>
                </legend>
				<?
				include("sale_hold9.php");
				break;
			case 10:
				?>
				<legend>
       			    <strong><font color="#666666">บิลแจงยอด</font></strong>
                </legend>
				<?
				include("hold.php");
				break;
			case 21:
				?>
				<legend>
       			    <strong><font color="#666666">บิลขายแบบคุณสมบัติ</font></strong>
                </legend>
				<?
				include("salea.php");
				break;
			case 24:
				?>

				<legend>
       			    <strong><font color="#666666">ใบสรุป รายการรับเงิน</font></strong>
                </legend>
				<?
				include("sale_bill_price.php");
				break;
			case 22:
				?>
				<legend>
       			    <strong><font color="#666666">บิลขายรักษายอด</font></strong>
                </legend>
				<?
				include("saleb.php");
				break;
			case 23:
				?>
				<legend>
       			    <strong><font color="#666666">   รายงานการเติมเงิน &nbsp;&nbsp;</font></strong>
                   </legend>
				<?
				include("ewallet.php");
				break;
          case 234:
                ?>
                <legend>
                       <strong><font color="#666666"> รายการเติม Ecom &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลการซื้อขาย" height="16" width="16" align="absmiddle" style='display:none' />&nbsp;&nbsp;<a href='./index.php?sessiontab=3&sub=233&state=2' style='display:none'>เติมเงิน</a>
                   
                   <? }?>              
                </legend>
                <?
                include("eatoship.php");
                break;    
                
			case 203:
				?>
				<legend>
       			    <strong><font color="#666666">   รายการ Bill Payment &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลการซื้อขาย" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=3&sub=203&state=2'>นำเข้าบิล</a>
				   
                   <? }?>              
                </legend>
				<?
				include("bill_payment.php");
				break;

			case 25:
				?>
		<legend>
       			    <strong><font color="#666666">   บิลขายส่ง &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลการซื้อขายส่ง" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=3&sub=25&state=2'>สร้างบิลขายส่ง</a>
                   <? }?>              
        </legend>
				<?
				include("sale_w.php");
				break;
			case 28:
				?>
				<legend>
       			    <strong><font color="#666666">รายงานการจัดสินค้าระหว่างบิล</font></strong>
                <br>
                <?
				include("sale_w.php");
				break;

			case 30:
				?>
                <legend> <strong><font color="#666666">ข้อมูลรับสินค้าเข้า&nbsp;&nbsp;</font></strong>
                <? if($acc->isAccess(1)){?>
                <img border="0" src="./images/add.gif" alt="เพิ่มการรับสินค้าเข้า" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=30&state=2'>เพิ่มการรับสินค้าเข้า</a>
                <? }?>
                </legend>
                <?
				include("buyproduct.php");
				break;
			case 31:
				?>
                <legend> <strong><font color="#666666">ข้อมูลสินค้าสาขา</font></strong> </legend>
				</legend>
				<?
				include("sale_bill.php");
				break;
			case 32:
				?>
                <legend> <strong><font color="#666666">บิลขาย</font></strong> </legend>
				</legend>
				<?
				include("sale_pack.php");
				break;
			case 33:

				?>
                <legend> <strong><font color="#666666">บิลสรรพากร</font></strong> </legend>
				</legend>
				<?
				include("sale_pack_sum.php");
				break;
			case 34:
				?>
                <legend> <strong><font color="#666666">รายงานยอดบิลสรรพากร</font></strong> </legend>
				</legend>
				<?
				include("product_sale_amount1.php");
				break;
			case 35:
				?>
                <legend> <strong><font color="#666666">ยอดขายสินค้า(ตามบิล)</font></strong> </legend>
				</legend>
				<?
				include("sale_held.php");
				break;
			case 36:
				?>
                <legend> <strong><font color="#666666">ยอดขายสินค้า</font></strong> </legend>
				</legend>
				<?
				include("sale_held_sum.php");
				break;
			
	        case 38:
                ?>
                <legend> <strong><font color="#666666">สรุปบิลขายสมาชิก</font></strong> </legend>
                </legend>
                <?
                include("sale_all.php");
                break;		
            case 388:
				?>
                <legend> <strong><font color="#666666">สรุปบิลขายสมาชิก</font></strong> </legend>
				</legend>
				<?
				include("sale_all2.php");
				break;
			case 40:
				?>
                <legend> <strong><font color="#666666">ยอดขายสินค้า(บิล Hold)</font></strong> </legend>
				</legend>
				<?
				include("sale_heldd.php");
				break;
			case 42:
				?>
                <legend> <strong><font color="#666666">ยอดซื้อสินค้า รายงาน Hold </font></strong> </legend>
				</legend>
				<?
				include("sale_stockiset.php");
				break;
			case 41:
				?>
                <legend> <strong><font color="#666666">ยอดขายสินค้า(บิล Hold)</font></strong> </legend>
				</legend>
				<?
				include("sale_heldd_sum.php");
				break;
			case 138:
				?>
				<legend>
       			    <strong><font color="#666666">    บิลส่ง สาขา &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มบิลส่ง สาขา / Stockist" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=3&sub=138&state=2'>เพิ่มบิลส่ง สาขา </a>
                   <? }?>              
                </legend>
				<?
				include("inv.php");
				break;
			case 141:
				?>
                <legend> <strong><font color="#666666">บิลระหว่างศูนย์</font></strong> </legend>
				</legend>
				<?
				include("inv_m.php");
				break;
			case 142:
				?>
                <legend> <strong><font color="#666666">ใบสรุป การใช้จ่าย Ewallet ของสาขา1</font></strong> </legend>
				</legend>
				<?
				include("sale_report_ewallet.php");
				break;
			case 143:
				?>
                <legend> <strong><font color="#666666">ใบสรุป การใช้จ่าย Ewallet ของสาขา1</font></strong> </legend>
				</legend>
				<?
				include("log_ewallet.php");
				break;

			case 144:
				?>
				<legend>
       			    <strong><font color="#666666">    รายการสั่งซื้อ Autoship &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลการซื้อขาย" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=3&sub=144&state=2'>เพิ่มข้อมูลการซื้อขาย Autoship</a>
                   <? }?>              
                </legend>
				<?
				include("sale_ato.php");
				break;
			
			case 16:
				?>
				<legend>
       			    <strong><font color="#666666">บิลจัดส่ง</font></strong>
                </legend>
                
				<?
				include("ssale.php");
				break;

			case 17:
				?>
				<legend>
       			    <strong><font color="#666666">รายการเติมเงิน Ewallet ทั้งหมด</font></strong>
                </legend>
				<?
				include("sale_bill_ewallet.php");
				break;
			case 177:
				?>
				<legend>
       			    <strong><font color="#666666">รายการเติมเงิน Eautoship ทั้งหมด</font></strong>
                </legend>
				<?
				include("eatoship.php");
				break;
			case 18:
				?>
				<legend>
       			    <strong><font color="#666666">สรุปยอดรายการขายและเติมเงิน Ewallet,Eautoship</font></strong>
                </legend>
				<?
				include("sale_bill_total.php");
				break;
			case 19:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน</font></strong>
                </legend>
				<?
				include("sale_detail.php");
				break;
			case 20:
				?>
				<legend>
       			    <strong><font color="#666666">ยอดสินค้าที่ถูกส่งออก</font></strong>
                </legend>
				<?
				include("product_sale_amounts.php");
				break;
						case 42:

				?>

				<legend>

       			    <strong><font color="#666666">รายงานที่ซื้อสินค้าผ่านทางหน้าเว็บ</font></strong>           

                </legend>

				<?
				include("onlineslae.php");

				break;
			case 43:

				?>

				<legend>

       			    <strong><font color="#666666">รายงานการเติมเงิน Ewallet ผ่านทางหน้าเว็บ</font></strong>           

                </legend>

				<?
				include("onlineewallet.php");

				break;
			case 44:

				?>

				<legend>


       			    <strong><font color="#666666">รายงานการสมัครออนไลน์</font></strong>           

                </legend>

				<?
				include("onlinemember.php");

				break;
			case 45:

				?>

				<legend>

       			    <strong><font color="#666666">สรุปยอดรายการขายและเติมเงิน Ewallet (Base Currency)</font></strong>           

                </legend>

				<?
				include("sale_bill_total_lb.php");

				break;
			case 46:

				?>

				<legend>

       			    <strong><font color="#666666">สรุปยอดรายการขายและเติมเงิน Ewallet ผ่าน Stockist (Base Currency)</font></strong>           

                </legend>

				<?
				include("sale_bills_total.php");

				break;
			case 47:

				?>

				<legend>

       			    <strong><font color="#666666">สรุปยอดรายการขายและเติมเงิน Ewallet ผ่าน Stockist  (Base Currency)</font></strong>           

                </legend>

				<?
				include("sale_bills_total_lb.php");
				break;
			case 149:
				?>
                <legend> <strong><font color="#666666">รายการโอนเงิน Ewallet สมาชิก</font></strong> </legend>
				</legend>
				<?
				include("ewallet_member_tranfer.php");
				break;

			case 150:
				?>
                <legend> <strong><font color="#666666">รายการถอนเงิน Ewallet สมาชิก</font></strong> </legend>
				</legend>
				<?
				include("ewallet_member_withdraw.php");
				break;
			case 61:

				?>

				<legend>

       			    <strong><font color="#666666">รายงาน list active สั่งซื้อสินค้าภายในเดือน (<?=$thaimonth[date(" m ")-1]?>)</font></strong>           

                </legend>

				<?
				include("sale_bills_active.php");
				break;

			case 60:
				?>
				<legend> <strong><font color="#666666">ข้อมูลรับสินค้าเข้า [แบบเปิดบิล]&nbsp;&nbsp;</font></strong>
				<? if($acc->isAccess(1)){?>
				<img border="0" src="./images/add.gif" alt="เพิ่มการรับสินค้าเข้า [แบบเปิดบิล]" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=60&state=2'>เพิ่มการรับสินค้าเข้า [แบบเปิดบิล]</a>
				<? }?>
				</legend>
				<?
				include("import_stockbill.php");
				break;
			case 1313:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน ewallet คงเหลือทั้งระบบ ณ สิ้นเดือน</font></strong>
                </legend>
				<?
				include("ewallet_sumary_month.php");
			break;
			case 1314:

				?>
				<legend>
       			    <strong><font color="#666666">รายงานยอดขายตามภาค</font></strong>
                </legend>
				<?
				include("sale_zone_report.php");
			break;
			case 999:
				?>
				<legend>
       			    <strong><a href="./index.php?sessiontab=<?=$sesstab?>&sub=999"><font color="#666666">ยอดค้างแจงยอด</font> </a></strong>
                </legend>
				<?
				include("hold_balance999.php");
				break;
			default :
				echo "<script language='JavaScript'>window.location='index.php?sessiontab=$sesstab'</script>";	
				break;
		}
?>
</fieldset><script type='text/javascript' language='javascript'>window.location=index.php?sessiontab=$sesstab</script>
</td>
</tr></table>
<?
	}
?>
