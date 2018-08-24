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
		<td  valign="top" colspan="2"><FONT SIZE="+2" ><B><?=$wording_lan["send_1"]?></B></FONT><br />
	      <br /></td>
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
			<td width="16%" align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
			<td width="84%"><strong><?=$wording_lan["tab1_4"]?></strong></td>
		  </tr>
		  <tr >
		     <td align="right"  >&nbsp;</td>
		     <td ><img src="./images/8_19_s.gif" align="absmiddle"  />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=147"><?=$wording_lan["tab2_sale_1"]?></a></td>
		     </tr>
		  <tr>
			<td width="16%" align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
			<td width="84%"><strong><?=$wording_lan["send_2"]?></strong></td>
		  </tr>
		 
          <tr style="display:none" >
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/billhold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=17&chktype=1&send=1"><?=$wording_lan["send_3"]?></a></td>
		  </tr>
		 <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/billhold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=18&chktype=2&send=1"><?=$wording_lan["send_4"]?></a></td>
		  </tr>
           <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/billhold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=20&chktype=2&send=2"><?=$wording_lan["send_44"]?></a></td>
		  </tr>
		  <tr  style="display:none">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/billhold_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=19&chktype=1&send=2"><?=$wording_lan["send_33"]?></a></td>
		  </tr>
		<tr style="display:none">
			<td width="16%" align="right"><img src="images/folder.gif" width="24" height="24" />&nbsp;&nbsp;</td>
			<td width="84%"><strong>รายการ Stock</strong></td>
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
             <td align="right" >&nbsp;</td>
		     <td align="left" style="display:none"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=55">รายงาน Stock Card(ขาย)</a></td>
		     </tr>
			 <tr style="display:none">
             <td align="right">&nbsp;</td>
		     <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=556">รายงาน Stock Card(ส่ง-รับ)</a></td>
		     </tr>
			 <tr  style="display:none" >
			   <td align="right">&nbsp;</td>
			   <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=56">รายงานยอดสินค้าที่ถูกเบิกของสาขา</a></td>
		      </tr>
			 <tr   style="display:none" >
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
				   <tr style="display:none">
				     <td align="right">&nbsp;</td>
				     <td><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=777">สรุปยอดขาย สินค้า / Package / สินค้าใน Package</td>
		      </tr>

				   <tr style="display:none">
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
          <tr>
            <td width="16%" align="right">&nbsp;</td>
            <td width="84%">&nbsp;</td>
          </tr>
        </table>
		  <br></td>
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
            <td width="84%"><strong><?=$wording_lan["send_5"]?></strong></td>
          </tr>
          

          <!--  <tr >
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=142">&#3651;&#3610;&#3626;&#3619;&#3640;&#3611; &#3585;&#3634;&#3619;&#3651;&#3594;&#3657;&#3592;&#3656;&#3634;&#3618; Ewallet &#3586;&#3629;&#3591;&#3626;&#3634;&#3586;&#3634;1</a></td>
		  </tr>
		  <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="images/ICREPLY.GIF">&nbsp;&nbsp;&#3626;&#3619;&#3640;&#3611;&#3618;&#3629;&#3604;&#3586;&#3634;&#3618; &#3586;&#3629;&#3591;&#3614;&#3609;&#3633;&#3585;&#3591;&#3634;&#3609;&#3649;&#3605;&#3656;&#3621;&#3632;&#3588;&#3609; &#3619;&#3632;&#3627;&#3623;&#3656;&#3634;&#3591;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;</td>
		  </tr-->
		  <tr  style="display:none" >
		     <td align="right"  >&nbsp;</td>
		     <td ><img src="./images/8_19_s.gif" align="absmiddle"  />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=145&chktype=1"><?=$wording_lan["send_6"]?></a></td>
		     </tr>
             <tr  style="display:none" >
		     <td align="right"  >&nbsp;</td>
		     <td ><img src="./images/8_19_s.gif" align="absmiddle"  />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=146&chktype=1"><?=$wording_lan["send_61"]?></a></td>
		     </tr>
			<tr >
		     <td align="right"  >&nbsp;</td>
		     <td ><img src="./images/8_19_s.gif" align="absmiddle"  />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=145&chktype=2"><?=$wording_lan["send_7"]?></a></td>
		     </tr>
            <tr >
		     <td align="right"  >&nbsp;</td>
		     <td ><img src="./images/8_19_s.gif" align="absmiddle"  />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=146&chktype=2"><?=$wording_lan["send_71"]?></a></td>
		     </tr>
			 <tr style="display:none">
				 <td align="right"  >&nbsp;</td>
				 <td ><img src="./images/8_19_s.gif" align="absmiddle"  />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=560">บิลใบเบิก(รอรับของ)</a></td> 
		     </tr>
			 <tr style="display:none">
				 <td align="right"  >&nbsp;</td>
				 <td ><img src="./images/8_19_s.gif" align="absmiddle"  />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=561">บิลใบเบิก</a></td>
		     </tr>
			 <tr style="display:none">
				 <td align="right"  >&nbsp;</td>
				 <td ><img src="./images/8_19_s.gif" align="absmiddle"  />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=558">บิลใบรับ(รอรับของ)</a></td>
		     </tr>
			 <tr style="display:none">
				 <td align="right"  >&nbsp;</td>
				 <td ><img src="./images/8_19_s.gif" align="absmiddle"  />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=559">บิลใบรับ</a></td>
		     </tr>
			  <tr style="display:none">
				 <td align="right"  >&nbsp;</td>
				 <td ><img src="./images/9_41_s.gif" align="absmiddle"  />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=562">รายงานสินค้าค้างรับ(รวม)</a></td>
		     </tr>
			  <tr style="display:none">
				 <td align="right"  >&nbsp;</td>
				 <td ><img src="./images/9_41_s.gif" align="absmiddle"  />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=563">รายงานสินค้าค้างรับ(แยกตามบิล)</a></td>
		     </tr>
			 <tr>
			<td width="16%" align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
			<td width="84%"><strong><?=$wording_lan["tab1_8"]?></strong></td>
		  </tr>
          <tr >
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%" height="30"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=16"><?=$wording_lan["tab1_9"]?></a></td>
		  </tr>
		  <tr style="display:none">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%" height="30"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$_GET["sessiontab"]?>&sub=23">ใบโอนคืนสินค้าจาก สาขา -> สำนักงานใหญ่</a></td>
		  </tr>
          <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%" height="30"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=111"><?=$wording_lan["tab1_10"]?></a></td>
		  </tr>
		 <tr style="display:none">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%" height="30"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=5&sub=557">รายงาน สรุปจำนวนบิล Stock Card</a></td>
		  </tr>
          <tr>
            <td width="16%" align="right">&nbsp;</td>
            <td width="84%">&nbsp;</td>
          </tr>
        </table></td>

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
<td width="50">

</td>
<td width="100%">
<fieldset>
<?

		switch($_GET['sub']){
			case 145:
				?>
                <legend> <strong><font color="#666666"><?=$wording_lan["send_8"]?></font></strong> </legend>
				</legend>
				<?
				include("bill_r.php");
				break;
			case 146:
				?>
                <legend> <strong><font color="#666666"><?=$wording_lan["send_8"]?></font></strong> </legend>
				</legend>
				<?
				include("bill_rr.php");
				break;
			case 111:
				?>
				<legend>
       			    <strong><font color="#666666"><?=$wording_lan["tab1_10"]?></font></strong>
                </legend>
				<?
				include("product.php");
				break;
			case 16:
				?>
				<legend>
       			    <strong><font color="#666666"><?=$wording_lan["send_9"]?> &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลการซื้อ" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=5&sub=16&state=2'><?=$wording_lan["send_10"]?></a>
                   <? }?>              
                </legend>
				<?
				include("buy.php");
				break;
			case 17:
				?>
				<legend>
		           	<strong><font color="#666666"><?=$wording_lan["send_3"]?>&nbsp;&nbsp;</font></strong>          
				 </legend>
				<?
				include("ssale.php");
				break;
			case 18:
				?>
				<legend>
		           	<strong><font color="#666666"><?=$wording_lan["send_4"]?>&nbsp;&nbsp;</font></strong>          
				 </legend>
				<?
				include("ssale.php");
				break;
			case 19:
				?>
				<legend>
		           	<strong><font color="#666666"><?=$wording_lan["send_33"]?>&nbsp;&nbsp;</font></strong>          
				 </legend>
				<?
				include("sssale.php");
				break;
			case 20:
				?>
				<legend>
		           	<strong><font color="#666666"><?=$wording_lan["send_44"]?>&nbsp;&nbsp;</font></strong>          
				 </legend>
				<?
				include("sssale.php");
				break;
			case 21:
				?>
				<legend>
		           	<strong><font color="#666666">บิลจัดส่ง Hub / Center&nbsp;&nbsp;</font></strong>          
				 </legend>
				<?
				include("sale_stockist.php");
				break;
			case 22:
				?>
				<legend>
		           	<strong><font color="#666666">บิลจัดส่งรอยืนยันรับของ Hub / Center&nbsp;&nbsp;</font></strong>          
				 </legend>
				<?
				include("ssale_stockist.php");
				break;
			case 23:
				?>
				<legend>
       			    <strong><font color="#666666">ใบโอนคืนสินค้าจาก สาขา -> สำนักงานใหญ่ &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลการซื้อ" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=5&sub=23&state=2'>เพิ่มใบโอนคืนสินค้าจาก สาขา -> สำนักงานใหญ่</a>
                   <? }?>              
                </legend>
				 
				<?
				include("transferhq.php");
				break;
			case 147:
				?>
                <legend> <strong><font color="#666666"><?=$wording_lan["tab2_sale_37"]?></font></strong> </legend>
				</legend>
				<?
				include("bill_all.php");
				break;
			case 148:
				?>
                <legend> <strong><font color="#666666">บิล Hub / Center รับของที่สาขา (รอรับของ)</font></strong> </legend>
				</legend>
				<?
				include("stockist_r.php");
				break;
			case 149:
				?>
                <legend> <strong><font color="#666666">บิล Hub / Center รับของที่สาขา </font></strong> </legend>
				</legend>
				<?
				include("stockist_rr.php");
				break;
			case 138:
				?>
				<legend>
       			    <strong><font color="#666666"><?=$wording_lan["tab2_sale_29"]?> &nbsp;&nbsp;</font></strong>
                </legend>
				<?
				include("inv.php");
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
			case 55:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน Stock Card(ขาย)</font></strong>           
                </legend>
				<?
				include("sale_bill_stockcard.php");

				break;
			case 888:
				?>
				<legend>
       			    <strong><font color="#666666">สรุปยอดขาย  Package แยกสาขา แยก  Package </font></strong>
                </legend>
				<?
				include("package_sale_amount.php");
				break;
			case 777:
				?>
				<legend>
       			    <strong><font color="#666666">รายงานยอดขายสินค้าและแพ็คเก็จ</font></strong>
                </legend>
				<?
				include("product_sale_amount_all.php");
				break;
			case 57:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน ใบรับของสาขา</font></strong>           
                </legend>
				<?
				include("sale_bil_br.php");
				break;
			case 56:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน ใบเบิกของสาขา</font></strong>           
                </legend>
				<?
				include("sale_bil_bb.php");

				break;
			case 556:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน Stock Card(ส่ง-รับ)</font></strong>           
                </legend>
				<?
				include("sale_bill_stockcard_r.php");

				break;	
			case 557:
				?>
				<legend>
       			    <strong><font color="#666666">รายงาน สรุปจำนวนบิล Stock Card</font></strong>           
                </legend>
				<?
				include("sale_bill_stockcard_sum.php");

				break;	
			case 558:
				?>
				<legend>
       			    <strong><font color="#666666">บิลใบรับ(รอรับของ)</font></strong>           
                </legend>
				<?
				include("istock_receive_wait.php");

				break;	
			case 559:
				?>
				<legend>
       			    <strong><font color="#666666">บิลใบรับ</font></strong>           
                </legend>
				<?
				include("istock_receive.php");

				break;
			case 560:
				?>
				<legend>
       			    <strong><font color="#666666">บิลใบเบิก(รอรับของ)</font></strong>           
                </legend>
				<?
				include("ostock_receive_wait.php");

				break;	
			case 561:
				?>
				<legend>
       			    <strong><font color="#666666">บิลใบเบิก</font></strong>           
                </legend>
				<?
				include("ostock_receive.php");

				break;
			case 562:
				?>
				<legend>
       			    <strong><font color="#666666">รายงานสินค้าค้างรับ(รวม)</font></strong>           
                </legend>
				<?
				include("rep_wait_receive1.php");

				break;
			case 563:
				?>
				<legend>
       			    <strong><font color="#666666">รายงานสินค้าค้างรับ(แยกตามบิล)</font></strong>           
                </legend>
				<?
				include("rep_wait_receive2.php");

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
