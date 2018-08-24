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
		<td  valign="top" colspan="2"><img src="images/sales.gif" border="0" align="absmiddle"><FONT SIZE="+2" ><B><?=$wording_lan["tab1_1"]?></B></FONT><br /><br /></td>
	</tr>

	<tr>
		<td width="50%" valign="top">
		<table width="90%" border="1" bordercolor="#0099CC" cellSpacing="0" cellPadding="0" >
		  <tr>
		    <td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
		    </tr>
		  <tr  style="display:none" >
			<td width="16%" align="right" ><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
			<td width="84%"><strong><?=$wording_lan["supervisor_1"]?></strong></td>
		  </tr>
		  <tr  style="display:none" >
            <td align="right">&nbsp;</td>
		    <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=44"><?=$wording_lan["supervisor_2"]?></a></td>
		    </tr>
		  <tr style="display:none">
            <td align="right">&nbsp;</td>
		    <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=42"><?=$wording_lan["supervisor_3"]?></a></td>
		    </tr>
		  <tr style="display:none" >
		    <td align="right">&nbsp;</td>
		    <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=43"><?=$wording_lan["supervisor_4"]?></a></td>
		    </tr>
		  <tr>
		    <td align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
		    <td><strong>
		      <?=$wording_lan["Report_17"]?>
		      </strong></td>
		    </tr>
		<? if($_SESSION["inventobj6"] > '8'){?>
		  <tr  >
		    <td align="right">&nbsp;</td>
		    <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=146&state=2">
		      <?=$wording_lan["tab2_sale_7"]?>
		      </a></td>
		    </tr>
			<? } ?>
		<tr   >
		    <td align="right">&nbsp;</td>
		    <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=146">
		      <?=$wording_lan["tab2_sale_8"]?>
		      </a></td>
		    </tr>
		
		  <tr   >
		    <td align="right">&nbsp;</td>
		    <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=148">
		      <?=$wording_lan["tab2_sale_9"]?>
		      </a></td>
		    </tr>
			 <tr  style="display:none" >
		    <td align="right">&nbsp;</td>
		    <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=201">
		      <?="รายการเติมเงินออนไลน์(รออนุมัติ)"?>
		      </a></td>
		    </tr>
			<tr style="display:none"  >
		    <td align="right">&nbsp;</td>
		    <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=203">
		      <?="รายการเติมเงินออนไลน์(อนุมัติแล้ว)"?>
		      </a></td>
		    </tr>
			 <tr  style="display:none" >
		    <td align="right">&nbsp;</td>
		    <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=202">
		      <?="รายการเติมเงินออนไลน์"?>
		      </a></td>
		    </tr>
			 <tr  style="display:none">
            <td align="right">&nbsp;</td>
            <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=149">
              <?=$wording_lan["tab2_sale_42"]?>
              </a></td>		
             </tr>
              <!-----<tr>
            <td align="right">&nbsp;</td>
		    <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=1499">
		      รายการถอนเงิน Ewallet  สมาชิก
		      </a></td>
		 </tr>----->
		 
		 <tr><td colspan="2" >&nbsp;</td></tr>
		<table width="90%" cellSpacing="10" cellPadding="0" > 
		 <tr style="display:none">
		    <td align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
		    <td><strong>EAutoship
		      </strong></td>
		    </tr>
			<? if($_SESSION["inventobj6"] > '8'){?>
			   <tr style="display:none">
            <td align="right">&nbsp;</td>
            <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=1417">
              เติมเงิน EAutoship
              </a></td>
            </tr>
			<? }  ?>
           <tr  style="display:none" >
            <td align="right">&nbsp;</td>
            <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=147">
              <?=$wording_lan["tab2_sale_8"]?>(EAutoship)
              </a></td>
            </tr>
		  <tr   style="display:none">
            <td align="right">&nbsp;</td>
            <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=14747">
			บิลเติมเงินสาขา(EAutoship)
              </a></td>
            </tr>
			<tr  style="display:none" >
            <td align="right">&nbsp;</td>
            <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=989">
			 EAutoship
              </a></td>
            </tr>
			<tr style="display:none" >
            <td align="right">&nbsp;</td>
            <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=98">
			 EVoucher
              </a></td>
            </tr>
			 <tr style="display:none">
			<td width="16%" align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
			<td width="84%"><strong>RV Point</strong></td>
		  </tr>
		   <tr  style="display:none">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=88">แลก RV Point</a></td>
		  </tr>
		    <tr style="display:none">
            <td align="right">&nbsp;</td>
		    <td><img src="./images/sale_stat_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=66667"><?=$wording_lan["tab2_report_06"]?></a></td>
		    </tr>
		  <tr style="display:none">
            <td align="right">&nbsp;</td>
            <td><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=9">
		      <?=$wording_lan["supervisor_53"]?>
		    </a></td>
          </tr>
		</table>

		<table width="90%" border="1" bordercolor="#0099CC" cellSpacing="0" cellPadding="0" >
		  <tr>
		    <td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
		    </tr>
		 <tr>
		    <td align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
		    <td><strong>Eautoship
		      </strong></td>
		    </tr>
			<? if($_SESSION["inventobj6"] > '8'){?>
			   <tr>
            <td align="right">&nbsp;</td>
            <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=1417">เติมเงิน Eautoship
              </a></td>
            </tr>
			<? }  ?>
           <tr>
            <td align="right">&nbsp;</td>
            <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=147">รายการเติมเงิน Eautoship ทั้งหมด            
			</a></td>
            </tr>
		  <tr>
            <td align="right">&nbsp;</td>
            <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=14747">รายการเติมเงิน Eautoship สาขา
              </a></td>
            </tr>
			<tr style="display:none"  >
            <td align="right">&nbsp;</td>
            <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=989">
			 EAutoship
              </a></td>
            </tr>
			<tr style="display:none" >
            <td align="right">&nbsp;</td>
            <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=98">
			 EVoucher
              </a></td>
            </tr>
			 <tr style="display:none">
			<td width="16%" align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
			<td width="84%"><strong>RV Point</strong></td>
		  </tr>
		   <tr  style="display:none">
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=88">แลก RV Point</a></td>
		  </tr>
		    <tr style="display:none">
            <td align="right">&nbsp;</td>
		    <td><img src="./images/sale_stat_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$sesstab?>&sub=66667"><?=$wording_lan["tab2_report_06"]?></a></td>
		    </tr>
		  <tr style="display:none">
            <td align="right">&nbsp;</td>
            <td><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=9">
		      <?=$wording_lan["supervisor_53"]?>
		    </a></td>
          </tr>
		<tr><td colspan="2" >&nbsp;</td></tr>
		</table>

		<br>
		<br>
		<table style="display:none" width="90%" border="1" bordercolor="#0099CC" cellSpacing="0" cellPadding="0" >
		  <tr>
		    <td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
		    </tr>
		  <tr>
		    <td width="16%" align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
		    <td width="84%"><strong>Stockist</strong></td>
		    </tr>
            <tr>
		    <td align="right">&nbsp;</td>
		    <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=8">
		      <?='รายงานรายการขายและสมัครสมาชิก'?>
		      </a></td>
		    </tr>
		  <tr>
		    <td align="right">&nbsp;</td>
		    <td align="left"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=46">
		      <?=$wording_lan["Stockist (Local Currency)"]?>
		      </a></td>
		    </tr>
		  </table>
        </td>
		<td width="50%" valign="top"><table  style="display:none" width="97%" border="1" bordercolor="#0099CC" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" background="./images/bar_box.gif">&nbsp;<?=$wording_lan["supervisor_10"]?></td>
              </tr>
              <? if($acc->isAccess(4)){ ?>
              <? } ?>
              <!-- <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=16">&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3588;&#3632;&#3649;&#3609;&#3609; &#3585;&#3629;&#3591;&#3607;&#3640;&#3609;</a></td>
                </tr>-->
			 <tr>
                <td width="16%"  align="right">&nbsp;</td>
                <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=25"><?=$wording_lan["supervisor_5"]?></a></td>
              </tr>
              <tr>
                <td width="16%"  align="right">&nbsp;</td>
                <td width="84%"><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=28"><?=$wording_lan["supervisor_6"]?></a></td>
              </tr>
              <tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=34"><?=$wording_lan["supervisor_7"]?></a></td>
              </tr>
              <tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=36"><?=$wording_lan["supervisor_8"]?></a></td>
              </tr>
              <tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=48"><?=$wording_lan["supervisor_8"].' (Stockist)'?></a></td>
              </tr>
			    <tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=115"><?=$wording_lan["supervisor_9"]?></a></td>
              </tr>
              <!--<tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=19">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609; &#3619;&#3634;&#3618;&#3652;&#3604;&#3657;&#3595;&#3639;&#3657;&#3629;&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</a></td>
                </tr-->
            </table>
		<table width="90%" border="1" bordercolor="#0099CC" cellSpacing="0" cellPadding="0" style="display:none" >
          <tr>
            <td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
          </tr>
          <tr>
            <td width="16%" align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
            <td width="84%"><strong><?=$wording_lan["tab1_11"]?></strong></td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=3&sub=26"><?=$wording_lan["tab1_12"]?></a></td>
          </tr>
        </table>
		<table width="90%" border="1" bordercolor="#0099CC" cellSpacing="0" cellPadding="0"  style="display:none">
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
			<td width="84%"><img src="./images/sale_stat_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">ยอดสินค้าที่ถูกขาย</A></td>
		  </tr>
		  <tr>
			<td width="16%" align="right">&nbsp;</td>
			<td width="84%"><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=8">ใบสรุป รายการขายสินค้าระหว่างวันที่</a></td>
		  </tr>
		  <tr >

		    <td align="right" >&nbsp;</td>
		    <td><img src="./images/9_41_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=24">ใบสรุป สรุปรายการรับเงิน</a></td>
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
<? $hl = "style='border:inset 1 #FF9933;'"; ?>
<a href="javascript:history.back()"><img src="./images/back.gif" border="0"height="40" width="40" alt="เมนูขาย" /></a>

</td>
<td width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			
			case 42:
				?>
				<legend>
		           	<strong><font color="#666666"><?=$wording_lan["supervisor_3"]?>&nbsp;&nbsp;</font></strong>          
				 </legend>
				<?
				include("onlineslae.php");
				break;
			case 43:
				?>

				<legend>
		           	<strong><font color="#666666"><?=$wording_lan["supervisor_4"]?>&nbsp;&nbsp;</font></strong>          
				 </legend>
				<?
				include("onlineewallet.php");
				break;
			case 44:
				?>
				<legend>
		           	<strong><font color="#666666"><?=$wording_lan["supervisor_2"]?>&nbsp;&nbsp;</font></strong>          
				 </legend>
				<?
				include("onlinemember.php");
				break;
			case 28:
				?>
				<legend>
		           <strong><font color="#666666"><?=$wording_lan["supervisor_6"]?></font></strong></legend>
				<?
				include("./comsn/com_c/rep_cmbonus_comsn.php");
				break;
			case 34:
				?>

				<legend>
		           <strong><font color="#666666"><?=$wording_lan["supervisor_7"]?></font></strong></legend>
				<?
				include("./comsn/com_c/rep_cc_comsn.php");
				break;
			case 36:
				?>
				<legend>
		           <strong><font color="#666666"><?=$wording_lan["supervisor_8"]?></font></strong></legend>
				<?
				include("./comsn/com_c/packfile.php");
				break;
			case 115:
				?>
				<legend>
		           <strong><font color="#666666"><?=$wording_lan["supervisor_9"]?></font></strong></legend>
				<?
				include("./comsn/com_c/re_packfile_lb.php");
				break;
			case 25:
				?>
				<legend>
		           <strong><font color="#666666"><?=$wording_lan["supervisor_5"]?></font></strong>
                </legend>
				<?
				include("./comsn/com_c/cround.php");
				break;
			case 46:

				?>

				<legend>

       			    <strong><font color="#666666"><?=$wording_lan["Stockist (Base Currency)"]?></font></strong>           

                </legend>

				<?
				include("sale_bills_total.php");

				break;
			case 47:

				?>

				<legend>

       			    <strong><font color="#666666"><?=$wording_lan["Stockist (Local Currency)"]?></font></strong>           

                </legend>

				<?
				include("sale_bills_total_lb.php");

				break;

			case 8:
				?>
				<legend>
       			    <strong><font color="#666666"><?=$wording_lan["tab2_sale_12"].' (Stockist)'?></font></strong>
                </legend>
				<?
				include("sale_bills_amount.php");
				break;

			case 48:

				?>

				<legend>

       			    <strong><font color="#666666">รายงานสรุป Pack File (Stockist)</font></strong>           

                </legend>

				<?
				include("./comsn/com_c/packfile_stockist.php");
			
			

				break;
			
			case 148:
				?>
                <legend> <strong><font color="#666666"><?=$wording_lan["tab2_sale_9"]?></font></strong> </legend>
				</legend>
				<?
				include("ewallet.php");
				break;
            case 147:
                ?>
                <legend> <strong><font color="#666666">รายการเติมเงิน Eautoship ทั้งหมด  </font></strong> </legend>
                </legend>
                <?
                include("eatoship.php");
                break;
			case 1417:
                ?>
                <legend> <strong><font color="#666666"><?=$wording_lan["tab2_sale_43"]?> </font></strong> </legend>
                </legend>
                <?
                include("eatoship_editadd_new.php");
                break;
			case 14747:
                ?>
                <legend> <strong><font color="#666666">รายการเติมเงิน EAutoship สาขา </font></strong> </legend>
                </legend>
                <?
                include("eatoship_branch.php");
                break;
			case 98:
                ?>
                <legend> <strong><font color="#666666">EVoucher </font></strong> </legend>
                </legend>
                <?
                include("voucher.php");
                break;
			case 989:
                ?>
                <legend> <strong><font color="#666666">EAutoship </font></strong> </legend>
                </legend>
                <?
                include("eatoship_ato.php");
                break;
			case 149:
                ?>
                <legend> <strong><font color="#666666"><?=$wording_lan["tab2_sale_3338"] ?></font></strong> </legend>
                </legend>
                <?
                include("ewallet_member_tranfer.php");
                break;
            case 1499:
				?>
                <legend> <strong><font color="#666666">     รายการถอนเงิน Ewallet  สมาชิก</font></strong> </legend>
				</legend>
				<?
				include("ewallet_member_withdraw.php");
				break;
			case 146:
				?>
				<legend>
       			    <strong><font color="#666666"><?=$wording_lan["tab2_sale_8"]?> &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลการซื้อขาย" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=6&sub=146&state=2'><?=$wording_lan["tab2_sale_36"]?></a>
                   <? }?>              
                </legend>
				<?
				include("ewallet_all.php");
				break;
			case 9:
				?>
				<legend>
       			    <strong><font color="#666666"><?=$wording_lan["cost_branch_1"]?> &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="<?=$wording_lan["cost_branch_2"]?>" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=6&sub=9&state=2'><?=$wording_lan["cost_branch_2"]?></a>
                   <? }?>              
                </legend>
				<?
				include("cost_branch.php");
				break;
				case 66667:
				?>
				<legend>
       			    <strong><font color="#666666">  รายงานการขายประจำวัน &nbsp;&nbsp;</font></strong>
                 </legend>
				<?
				include("sale_report_of_day.php");
				break;
			case 38:
				include("./comsn/com_b/bround.php");
				break;
			case 99:
				include("./comsn/com_b/bround.php");
				break;
			case 88:
				?>
				<legend>
       			    <strong><font color="#666666">   รายงานการและ RV Point &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลการซื้อขาย" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=6&sub=88&state=2'>แลก RV Point</a>
                   <? }?>              
                </legend>
				<?
				include("rvpoint.php");
				break;
			case 201:
				?>
                <legend> <strong><font color="#666666"><?="รายการเติมเงินออนไลน์(รออนุมัติ)"?></font></strong> </legend>
				</legend>
				<?
				include("ewallet_waiting.php");
				break;
			case 202:
				?>
                <legend> <strong><font color="#666666"><?="รายการเติมเงินออนไลน์"?></font></strong> </legend>
				</legend>
				<?
				include("ewallet_success.php");
				break;
			case 203:
				?>
                <legend> <strong><font color="#666666"><?="รายการเติมเงินออนไลน์(อนุมัติแล้ว)"?></font></strong> </legend>
				</legend>
				<?
				include("ewallet_waiting_approve.php");
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
