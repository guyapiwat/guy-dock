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
		<td width="50%" valign="top">
		
		<table width="100%" border="1" bordercolor="#FF7F00"   cellSpacing="0" cellPadding="0" >
          <tr>
            <td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
          </tr>
		  <tr>
            <td width="16%">&nbsp;</td>
            <td width="84%">&nbsp;</td>
          </tr>
		  <tr>
            <td width="16%" align="right"><img src="./images/folder.gif" align="absmiddle">&nbsp;&nbsp;</td>
            <td width="84%"><strong>จัดการสินค้า</strong></td>
          </tr>
         <tr>
			<td width="16%" align="right">&nbsp;&nbsp;</td>
			<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=15"><img src="images/9_28_s.gif" align="absmiddle" /> กลุ่มสินค้า</a></td>
		  </tr>
		  <tr>
			<td width="16%" align="right">&nbsp;&nbsp;</td>
			<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=1"><img src="images/9_28_s.gif" align="absmiddle" /> ข้อมูลสินค้า</a></td>
		  </tr>
         <tr>
			<td width="16%" align="right">&nbsp;&nbsp;</td>
			<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=37"><img src="images/9_28_s.gif" align="absmiddle" /> ข้อมูลสินค้าสาขา</a></td>
		  </tr>
		  <tr >
			<td width="16%" align="right">&nbsp;&nbsp;</td>
			<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=11"><img src="images/10_11_s.gif" /> ข้อมูล package</a></td>
		  </tr>
          
          <tr >
			<td width="16%" align="right">&nbsp;&nbsp;</td>
			<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=12"><img src="images/10_11_s.gif" /> สินค้าใน package</a></td>
		  </tr>
		  	<tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=60">สินค้านำเข้า</a></td>
			</tr>

		    <tr >
		     <td align="right">&nbsp;</td>
		     <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=138">บิลส่ง สาขา</a></td>
		    </tr>
		  <tr>
             <td align="right">&nbsp;</td>
		     <td align="left" style="display:none"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=55">รายงาน Stock Card(ขาย)</a></td>
		     </tr>
		  <tr >
			<td width="16%" align="right">&nbsp;&nbsp;</td>
			<td width="84%">&nbsp;&nbsp;</td>
		  </tr>
        </table>
		<br>
		<table style="display:none" width="100%" border="1" bordercolor="#FF7F00" cellSpacing="0" cellPadding="0" >
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
		  <tr style="display:none">
             <td align="right">&nbsp;</td>
		     <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=555">รายงาน Auto Stock </a></td>
		     </tr>
			<tr style="display:none">
				 <td align="right">&nbsp;</td>
				 <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=551">รายการเคลื่อนไหวสินค้า(Stock Movement)</a></td>
		     </tr>	
			<tr style="display:none">
				 <td align="right">&nbsp;</td>
				 <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=552">รายการเคลื่อนไหวสินค้า(ส่ง-รับ)(Stock Movement)</a></td>
		     </tr>				 
			 <tr>
             <td align="right">&nbsp;</td>
		     <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=55">รายงาน Stock Card(ขาย)</a></td>
		     </tr>
			 <tr style="display:none">
             <td align="right">&nbsp;</td>
		     <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=556">รายงาน Stock Card(ส่ง-รับ)</a></td>
		     </tr>
			 <tr  >
			   <td align="right">&nbsp;</td>
			   <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=56">รายงานยอดสินค้าที่ถูกเบิกของสาขา</a></td>
		      </tr>
			 <tr   >
             <td align="right">&nbsp;</td>
		     <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=57">รายงานยอดสินค้าที่รับของสาขา</a></td>
		     </tr>
			  <tr style="display:none">
			   <td align="right">&nbsp;</td>
			   <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=5656">รายงานยอดสินค้าที่ถูกเบิกของสำนักงานใหญ่</a></td>
		      </tr>
			  <tr>
            <!--td width="16%" align="right">&nbsp;</td>
            <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=53">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609; Stock &#3603; &#3623;&#3633;&#3609;&#3607;&#3637;&#3656; </a></td-->
          </tr>
		   <tr style="display:none">
            <td width="16%" align="right">&nbsp;</td>
            <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=52">รายงาน Stock HQ ณ วันที่  ยอดสินค้าเคลื่อนไหว</a></td>
          </tr>
			<tr style="display:none">
            <td width="16%" align="right">&nbsp;</td>
            <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=54">รายงาน Stock ณ วันที่ สาขา ยอดสินค้าเคลื่อนไหว</a></td>
          </tr>
		  <tr style="display:none">
            <td width="16%" align="right">&nbsp;</td>
            <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=540">รายงาน Stock(ส่ง-รับ) ณ วันที่ สาขา ยอดสินค้าเคลื่อนไหว</a></td>
          </tr>
		  <tr style="display:none">
            <td width="16%" align="right">&nbsp;</td>
            <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=50">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609; Stock &#3603; &#3623;&#3633;&#3609;&#3607;&#3637;&#3656; </a></td>
          </tr>
		  <tr style="display:none">
            <td width="16%" align="right">&nbsp;</td>
            <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=500">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609; Stock &#3603; &#3623;&#3633;&#3609;&#3607;&#3637;&#3656;(ส่ง-รับ) </a></td>
          </tr>
				   <tr>
				     <td align="right">&nbsp;</td>
				     <td><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=777">สรุปยอดขาย สินค้า / Package / สินค้าใน Package</td>
		      </tr>

				   <tr>
				     <td align="right">&nbsp;</td>
				     <td><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=888">สรุปยอดขาย  Package แยกสาขา แยก  Package </td>
		      </tr>
			   <tr style="display:none">
		    <td align="right">&nbsp;</td>
		    <td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=7777">รายงานสินค้าคงเหลือรวมแต่ละสาขา</A></td>
		    </tr>
				   <tr style="display:none">
				     <td align="right">&nbsp;</td>
				     <td><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=7">ยอดสินค้าที่ถูกขาย</a></td>
		      </tr>
          <!--  <tr >
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=142">&#3651;&#3610;&#3626;&#3619;&#3640;&#3611; &#3585;&#3634;&#3619;&#3651;&#3594;&#3657;&#3592;&#3656;&#3634;&#3618; Ewallet &#3586;&#3629;&#3591;&#3626;&#3634;&#3586;&#3634;1</a></td>
		  </tr>
		  <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="images/ICREPLY.GIF">&nbsp;&nbsp;&#3626;&#3619;&#3640;&#3611;&#3618;&#3629;&#3604;&#3586;&#3634;&#3618; &#3586;&#3629;&#3591;&#3614;&#3609;&#3633;&#3585;&#3591;&#3634;&#3609;&#3649;&#3605;&#3656;&#3621;&#3632;&#3588;&#3609; &#3619;&#3632;&#3627;&#3623;&#3656;&#3634;&#3591;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;</td>
		  </tr-->
		 
		   <tr  >
		     <td align="right"  >&nbsp;</td>
		     <td ><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=23">ใบรับ</a></td>
		 </tr>
		  <tr  >
		     <td  align="right"  >&nbsp;</td>
		     <td ><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=20">ใบเบิก</a></td>
		     </tr>
		<tr  >
		     <td  align="right"  >&nbsp;</td>
		     <td ><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=2323">ใบโอนคืนสินค้าจาก สาขา -> สำนักงานใหญ่ </a></td>
		     </tr>
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
            <td width="84%"><img src="./images/hold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=9">&#3649;&#3592;&#3591;&#3618;&#3629;&#3604;</a></td>
          </tr>
          <tr style="display:none">
            <td width="16%" align="right">&nbsp;</td>
            <td width="84%"><img src="./images/billhold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=10">&#3610;&#3636;&#3621;&#3649;&#3592;&#3591;&#3618;&#3629;&#3604;</a></td>
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
			case 50:
                ?>
                <legend>
                       <strong><font color="#666666">รายงาน Stock ณ วันที่</font></strong>
                </legend>
                <?
                include("stock_product_date.php");
                break;
			case 500:
                ?>
                <legend>
                       <strong><font color="#666666">รายงาน Stock(ส่ง-รับ) ณ วันที่</font></strong>
                </legend>
                <?
                include("stock_product_r_date.php");
                break;
			case 53:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน Stock ณ วันที่</font></strong>
                </legend>
				<?
				include("sale_bill_product_date.php");
				break;
			case 555:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน Auto Stock</font></strong>
                </legend>
				<?
				include("sale_bill_auto_stock.php");
				break;
			case 52:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน Stock HQ ณ วันที่ ยอดสินค้าเคลื่อนไหว</font></strong>
                </legend>
				<?
				include("sale_bill_productHQ_date.php");
				break;
			case 54:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน Stock ณ.วันที่ สาขา ยอดสินค้าเคลื่อนไหว</font></strong><!--รายงาน Stock ณ วันที่ แบบรวม-->
                </legend>
				<?
				include("sale_bill_product_date_group.php");
				break;
			case 540:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน Stock(ส่ง-รับ) ณ.วันที่ สาขา ยอดสินค้าเคลื่อนไหว</font></strong><!--รายงาน Stock ณ วันที่ แบบรวม-->
                </legend>
				<?
				include("sale_bill_product_date_group_r.php");
				break;
			case 55:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน Stock Card(ขาย)</font></strong>           
                </legend>
				<?
				include("sale_bill_stockcard.php");

				break;
			case 551:
				?>
				<legend>
       			    <strong><font color="#666666">รายการเคลื่อนไหวสินค้า (Stock Movement)</font></strong>           
                </legend>
				<?
				include("stock_movement.php");

				break;
			case 552:
				?>
				<legend>
       			    <strong><font color="#666666">รายการเคลื่อนไหวสินค้า(ส่ง-รับ) (Stock Movement)</font></strong>           
                </legend>
				<?
				include("stock_r_movement.php");

				break;
			case 556:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน Stock Card(ส่ง-รับ)</font></strong>           
                </legend>
				<?
				include("sale_bill_stockcard_r.php");

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
			case 5656:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน ใบเบิกของสำนักงานใหญ่</font></strong>           
                </legend>
				<?
				include("sale_bil_bb_hq.php");

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
			case 20:
				?>
				<legend>
       			    <strong><font color="#666666"> ใบเบิก &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มใบเบิก" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=20&state=2'>เพิ่มใบเบิก</a>
                   <? }?>              
                </legend>
				<?
				include("bsale.php");
				break;
			case 23:
				?>
				<legend>
       			    <strong><font color="#666666"> ใบรับ &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มใบเบิก" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=23&state=2'>เพิ่มใบรับ</a>
                   <? }?>              
                </legend>
				<?
				include("bbsale.php");
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
			case 777:
				?>
				<legend>
       			    <strong><font color="#666666">รายงานยอดขายสินค้าและแพ็คเก็จ</font></strong>
                </legend>
				<?
				include("product_sale_amount_all.php");
				break;
			case 15:
				?>
				<legend>
       			    <strong><font color="#666666">กลุ่มสินค้า</font></strong>
                    <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" title="กลุ่มสินค้า" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$_GET['sub']?>&state=2'>เพิ่มกลุ่มสินค้า</a>
                   <? }?>  
                </legend>
                
				<?
				include("productgroup.php");
				break;
			case 1:
				?>
				<legend>
		           	<strong><font color="#666666">ข้อมูลสินค้า&nbsp;&nbsp;</font></strong>
                   	<? if($acc->isAccess(1)){?>
               	   	<img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลสินค้า" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=1&state=2'>เพิ่มสินค้า</a>
                   <? }?>              
				</legend>
				<?
				include("product.php");
				break;
			case 37:
				?>
                <legend> <strong><font color="#666666">สินค้าสาขา</font></strong> </legend>
				</legend>
				<?
				include("product_invent.php");
				break;
			case 11:
				?>
				<legend>
		           	<strong><font color="#666666">ข้อมูล package&nbsp;&nbsp;</font></strong>
                   	<? if($acc->isAccess(1)){?>
               	   	<img border="0" src="./images/add.gif" alt="เพิ่ม package" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=11&state=2'>เพิ่ม package</a>
                   <? }?>              
				</legend>
				<?
				include("package.php");
				break;
			case 12:
				?>
				<legend>
		           <strong><font color="#666666"> สินค้าpackage&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลสินค้าใน package" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=12&state=2'>เพิ่มข้อมูลสินค้าใน package</a>
                   <? }?>      
     			</legend>
				<?
				include("ppackage.php");
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
			case 138:
				?>
				<legend>
       			    <strong><font color="#666666">    บิลส่ง สาขา &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มบิลส่ง สาขา / Stockist" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=138&state=2'>เพิ่มบิลส่ง สาขา </a>
                   <? }?>              
                </legend>
				<?
				include("inv.php");
				break;
			case 7:
				?>
				<legend>
       			    <strong><font color="#666666">รายงานยอดสินค้าที่ถูกขาย</font></strong>
                </legend>
				<?
				include("product_sale_amount.php");
				break;
			case 888:
				?>
				<legend>
       			    <strong><font color="#666666">สรุปยอดขาย  Package แยกสาขา แยก  Package </font></strong>
                </legend>
				<?
				include("package_sale_amount.php");
				break;
			case 7777:
				?>
				<legend>
       			    <strong><font color="#666666">รายงานสินค้าคงเหลือรวมแต่ละสาขา</font></strong>
                </legend>
				<?
				include("product_sale_amount_invent.php");
				break;
				default :
				echo "<script language='JavaScript'>window.location='index.php?sessiontab=$sesstab'</script>";	
			break;
			case 2323:
				?>
				<legend>
       			    <strong><font color="#666666">ใบโอนคืนสินค้าจาก สาขา -> สำนักงานใหญ่ &nbsp;&nbsp;</font></strong>            
                </legend>
				 
				<?
				include("transferhq.php");
				break;
			
		}
?>
</fieldset> 
</td>
</tr></table>
<?
	}
?>
