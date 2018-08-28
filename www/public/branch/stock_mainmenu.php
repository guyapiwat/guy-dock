<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
<tr>
<td width="5%" >&nbsp;
</td>
<td width="95%" align="left" valign="top">

<table width="98%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td  valign="top" colspan="2"><img src="images/sales.gif" border="0" align="absmiddle"><FONT SIZE="+2" ><B> Stock / Store</B></FONT><br />
		    <br /></td>
	</tr>
	<tr>
		<td height="28" colspan="2"><img src="images/user.gif" width="32" height="32" align="absmiddle" />&nbsp;<? echo  "<strong>รหัสผู้ใช้ :</strong> ".$_SESSION["adminusercode"]." <strong>ชื่อผู้ใช้ :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
	</tr>
	<tr>
		<td width="50%" valign="top"><table width="90%" border="1" bordercolor="#FF7F00" cellSpacing="0" cellPadding="0" >
          <tr>
            <td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
          </tr>
          <tr>
            <td width="16%">&nbsp;</td>
            <td width="84%">&nbsp;</td>
          </tr>
          <tr>
            <td width="16%" align="right"><img src="./images/folder.gif" align="absmiddle">&nbsp;&nbsp;</td>
            <td width="84%"><strong>&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;</strong> Stockcard </td>
          </tr>
		  <tr  >
             <td align="right">&nbsp;</td>
		     <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=55">รายงาน Stock Card(ขาย)</a></td>
		     </tr>
			 <tr  >
			   <td align="right">&nbsp;</td>
			   <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=56">รายงาน ใบเบิกของสาขา</a></td>
		      </tr>
			 <tr   >
             <td align="right">&nbsp;</td>
		     <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=57">รายงาน ใบรับของสาขา</a></td>
		     </tr>

			   <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%" height="30"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$_GET["sessiontab"]?>&sub=111"><?=$wording_lan["tab1_10"]?></a></td>
		  </tr>
			  <tr style="display:none">
            <td width="16%" align="right">&nbsp;</td>
            <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=53">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609; Stock &#3603; &#3623;&#3633;&#3609;&#3607;&#3637;&#3656; </a></td>
          </tr>
				   <tr style="display:none">
            <td width="16%" align="right">&nbsp;</td>
            <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=54">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609; Stock &#3603; &#3623;&#3633;&#3609;&#3607;&#3637;&#3656; รวม</a></td>
          </tr>
          <!--  <tr >
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=142">&#3651;&#3610;&#3626;&#3619;&#3640;&#3611; &#3585;&#3634;&#3619;&#3651;&#3594;&#3657;&#3592;&#3656;&#3634;&#3618; Ewallet &#3586;&#3629;&#3591;&#3626;&#3634;&#3586;&#3634;1</a></td>
		  </tr>
		  <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="images/ICREPLY.GIF">&nbsp;&nbsp;&#3626;&#3619;&#3640;&#3611;&#3618;&#3629;&#3604;&#3586;&#3634;&#3618; &#3586;&#3629;&#3591;&#3614;&#3609;&#3633;&#3585;&#3591;&#3634;&#3609;&#3649;&#3605;&#3656;&#3621;&#3632;&#3588;&#3609; &#3619;&#3632;&#3627;&#3623;&#3656;&#3634;&#3591;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;</td>
		  </tr-->
		  
        </table>
		  <br>
		<table width="90%" border="1" bordercolor="#FF7F00" style="display:none" cellSpacing="0" cellPadding="0" >
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
            <td width="84%"><img src="./images/hold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=9">&#3649;&#3592;&#3591;&#3618;&#3629;&#3604;</a></td>
          </tr>
          <tr style="display:none">
            <td width="16%" align="right">&nbsp;</td>
            <td width="84%"><img src="./images/billhold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=10">&#3610;&#3636;&#3621;&#3649;&#3592;&#3591;&#3618;&#3629;&#3604;</a></td>
          </tr>
        </table></td>
		<td width="50%" valign="top">&nbsp;</td>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr><tr>
	</tr>
	<tr>
	<td width="50%" valign="top">
		<!--<table width="90%" border="1" bordercolor="#FF7F00" cellSpacing="0" cellPadding="0" >
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

<td width="100%">
<fieldset>
<?

		switch($_GET['sub']){
			case 53:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน Stock ณ วันที่</font></strong>
                </legend>
				<?
				include("sale_bill_product_date.php");
				break;
			case 54:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน Stock ณ วันที่ แบบรวม</font></strong>
                </legend>
				<?
				include("sale_bill_product_date_group.php");
				break;
			case 55:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน Stock Card(ขาย)</font></strong>           
                </legend>
				<?
				include("sale_bill_stockcard.php");

				break;
			case 58:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน Stock Card(ส่งของ)</font></strong>           
                </legend>
				<?
				include("sale_bill_stockcardr.php");

				break;
			case 56:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน ใบเบิกของสาขา</font></strong>           
                </legend>
				<?
				include("sale_bil_bb.php");

				break;
			case 57:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน ใบรับของสาขา</font></strong>           
                </legend>
				<?
				include("sale_bil_br.php");
				break;
			case 21:
				?>
				<legend>
		           	<strong><font color="#666666">บิลจัดส่ง Branch / Stockist &nbsp;&nbsp;</font></strong>          
				 </legend>
				<?
				include("sale_stockist.php");
				break;
			case 22:
				?>
				<legend>
		           	<strong><font color="#666666">บิลจัดส่งรอยืนยันรับของ Branch / Stockist &nbsp;&nbsp;</font></strong>          
				 </legend>
				<?
				include("ssale_stockist.php");
				break;
			case 148:
				?>
                <legend> <strong><font color="#666666">บิล Branch / Stockist รับของที่สาขา (รอรับของ)</font></strong> </legend>
				</legend>
				<?
				include("stockist_r.php");
				break;
			case 155:
				?>
				<legend>
       			    <strong><font color="#666666">บิลส่งของ/รับของ ทั้งหมด &nbsp;&nbsp;</font></strong>
                </legend>
				<?
				include("rhold_all.php");
				break;
			case 156:
				?>
				<legend>
       			    <strong><font color="#666666">บิลส่งของ/รับของ Branch / Stockist ทั้งหมด &nbsp;&nbsp;</font></strong>
                </legend>
				<?
				include("rstockist_all.php");
				break;
			case 24:
				?>
				<legend>
		           	<strong><font color="#666666">&nbsp;&nbsp;</font></strong>          
				 </legend>
				<?
				include("rstockist.php");
				break;
			case 111:
				?>
				<legend>
       			    <strong><font color="#666666"><?=$wording_lan["tab1_10"]?></font></strong>
                </legend>
				<?
				include("product.php");
				break;
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
