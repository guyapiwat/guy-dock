<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
<tr>
<td width="5%" valign="top" >&nbsp;</td>
<td width="87%" align="left" valign="top" >
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td  valign="top" colspan="2"><img src="./images/mem.gif" border="0" align="absmiddle" /><FONT SIZE="+2" ><B><?=$wording_lan["mem_mainmenu_1"]?></B></FONT><br /><br />
<tr >
<td width="50%" height="28"><img src="./images/user.gif" width="32" height="32" align="absmiddle">&nbsp;<? echo  "<strong>".$wording_lan["mem_mainmenu_2"]." :</strong> ".$_SESSION["adminusercode"]." <strong>".$wording_lan["mem_mainmenu_3"]." :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
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
	  <!--tr>
		<td width="16%" align="right"><img src="./images/Animp.gif" width="19" height="18">&nbsp;&nbsp;</td>
		<td width="84%"><a href="./mem_position_main.php">ข้อมูลตำแหน่งสมาชิก</a></td>
	  </tr-->
	  <tr>
			   <td align="right"><img src="images/6_20_s.gif" width="24" height="24" />&nbsp;&nbsp;</td>
			   <td><strong><?=$wording_lan["tab1_2"]?></strong></td>
		      </tr>
		  <!--tr>
			<td width="16%" align="right"><img src="images/9_28_s.gif" align="absmiddle" />&nbsp;&nbsp;</td>
			<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=1">ข้อมูลสินค้า</a></td>
		  </tr>
		  <tr>
			<td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
			<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">ข้อมูลสาขา</a></td>
		  </tr>
		  <tr bgcolor="#FFCC66">
			<td width="16%" align="right"><img src="images/ICDLIST.GIF" width="15" height="15">&nbsp;&nbsp;</td>
			<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=3">ข้อมูลสินค้าในสต๊อก</a></td>
		  </tr>
		  <tr bgcolor="#FFCC66">
			<td width="16%" align="right"><img src="images/ICDLIST.GIF" width="15" height="15">&nbsp;&nbsp;</td>
			<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">นำเข้าสินค้า</a></td>
		  </tr>
		  <tr bgcolor="#FFCC66">
			<td width="16%" align="right"><img src="images/ICDLIST.GIF" width="15" height="15">&nbsp;&nbsp;</td>
			<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=5">ส่งสินค้าระหว่างสาขา</a></td>
		  </tr-->
		  <tr style="display:none">
<!--		     <td align="right">&nbsp;</td>-->
<!--		     <td><img src="./images/add.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=1&sub=910">--><?//=$wording_lan["tab1_3"]?><!--</a></td>-->
<!--		     </tr>-->
			 <tr>
		     <td align="right">&nbsp;</td>
		     <td><img src="./images/Animp.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=1&sub=2"><?=$wording_lan["mem_mainmenu_4"]?></a></td>
		     </tr>
			  <tr style="display:none">
		     <td align="right" &nbsp;</td>
		     <td><img src="./images/8_19_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=1&sub=13"><?=$wording_lan["mem_mainmenu_5"]?></a></td>
		     </tr>
			 <tr>
		     <td align="right" >&nbsp;</td>
		     <td><img src="./images/upa_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?sessiontab=1&sub=4"><?=$wording_lan["mem_mainmenu_20"]?></a></td>
		     </tr>
			<tr style="display:none">
		<td width="16%" align="right">&nbsp;</td>
		<td width="84%">
		<script language="JavaScript">
function chk_view(){
		  if(confirm('ท่านกำลังเปิดดูรายงาน PV สะสม ซ้ายขวาของทุก ๆ คน ทั้งหมดของระบ ...อาจใช้เวลาในการประมวลผลนาน..กรุณารอสักครู่')){	return true;	}else{	return false;}}
</script>
<img src="./images/Animp.gif" align="absmiddle" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=25&view=1" OnClick="return chk_view();">คะแนน pv สะสมของสมาชิก</a></td>
	  </tr>
	  <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%"><img src="./images/sp_s.gif" align="absmiddle" />&nbsp;<a href="index.php?sessiontab=1&sub=5"><?=$wording_lan["mem_mainmenu_21"]?>
		</a></td>
	  </tr>
	  <tr  style="display:none" >
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/treeupsmall.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=8">รายงานแสดงทีมงานแบบต้นไม้</a></td>
  </tr>
   <tr  style="display:none"  >
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/treespsmall.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=9">รายงานแสดงผู้แนะนำแบบต้นไม้</a></td>
  </tr>
   <tr >
		<td width="16%" align="right">&nbsp;</td>
		<td width="84%"><img src="./images/treespsmall.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=26"><?=$wording_lan["mem_mainmenu_6"]?></a></td>
   </tr>
   <tr  >
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/treespsmall.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=23"><?=$wording_lan["mem_mainmenu_22"]?></a></td>
  </tr>
  <tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/bank_account_s.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=101">รายงานเอกสารการสมัคร</A></td>
  </tr>
	  <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%">&nbsp;</td>
	  </tr>
	</table>
</td>
  <td valign="top">&nbsp;</td>
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
<table border="0" height="395"  width="99%"><tr valign="top">
<td width="50" style="display:none">
<? $hl = "style='border:inset 1 #FF9933;'"; ?>
<a href="javascript:history.back()"><img border="0" src="./images/back.gif" height="40" width="40" alt="<?=$wording_lan["mem_mainmenu_19"]?>" /></a>
</td>
<td align="left" width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			case 2:
				?>
				<legend>
		           <strong><font color="#666666"><?=$wording_lan["mem_mainmenu_7"]?></font></strong>
				   <? if($acc->isAccess(1)){?>

<!--                   &nbsp;&nbsp;<a href='./index.php?sessiontab=1&sub=910'>--><?//=$wording_lan["mem_mainmenu_8"]?><!--</a>-->
                   <? }?>
                </legend>
				<?
				include("./member.php");
				break;
			case 4:
				?><legend><strong><font color="#666666"><?=$wording_lan["mem_mainmenu_20"]?></font></strong></legend><?
			 
				include("./mem_chart_f3c.php");
				break;
			case 5:
				?><legend><strong><font color="#666666"><?=$wording_lan["mem_mainmenu_21"]?></font></strong></legend><?
				include("./mem_chart_stairstep.php");
				break;
			case 55:
				?><legend><strong><font color="#666666"><?=$wording_lan["mem_mainmenu_20"]?></font></strong></legend><?
				include("./mem_chart_stairstep2.php");
				break;
			case 6:
				?><legend><strong><font color="#666666"><?=$wording_lan["mem_mainmenu_11"]?></font></strong></legend><?
				include("rep_mem_no_upa_code.php");
				break;
			case 7:
				?><legend><strong><font color="#666666"><?=$wording_lan["mem_mainmenu_12"]?></font></strong></legend><?
				include("rep_mem_no_sp_code.php");
				break;
			case 8:
				?><legend><strong><font color="#666666"><?=$wording_lan["mem_mainmenu_13"]?></font></strong></legend><?
				include("mem_chart_tree.php");
				break;
			case 9:
				?><legend><strong><font color="#666666"><?=$wording_lan["mem_mainmenu_14"]?></font></strong></legend><?
				include("mem_chart_tree_sp.php");
				break;
//			case 910:
//				?><!--<legend><strong><font color="#666666">สมัครสมาชิก</font></strong></legend>--><?//
//				include("member_editadd.php");
//				break;
			case 10:
				?><legend><strong><font color="#666666"><?=$wording_lan["mem_mainmenu_15"]?></font></strong></legend><?
				include("member_bank.php");
				break;
			case 11:
				?><legend><strong><font color="#666666"><?=$wording_lan["mem_mainmenu_16"]?></font></strong></legend><?
				include("member_letter.php");
				break;
			case 12:
				?><legend><strong><font color="#666666"><?=$wording_lan["mem_mainmenu_17"]?> </font></strong></legend><?
				include("member_success.php");
				break;
			case 13:
				?><legend><strong><font color="#666666"><?=$wording_lan["mem_mainmenu_18"]?> </font></strong></legend><?
				include("member_location.php");
				break;
			case 25:
				?>
				<legend>
		           <strong><font color="#666666">คะแนน pv สะสมของสมาชิก&nbsp;&nbsp;</font></strong>
				           
                </legend>
				<?
				include("./member_pv.php");
				break;
			case 23:
				?><legend><strong><font color="#666666"><?=$wording_lan["mem_mainmenu_22"]?></font></strong></legend><?
				include("../backoffice/team_list.php");
				break;
			case 26:
				?>
				<legend>
		           <strong><font color="#666666"><?=$wording_lan["mem_mainmenu_6"]?></font></strong>
				           
                </legend>
				<?
				include("../backoffice/team_list2.php");
				break;
			case 8001:
				$member = "";
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดคะแนนรวมชั้น</font></strong>
				           
                </legend>
				<?
				include("../backoffice/floor_pv_all.php");
				break;
			case 101:
				?><legend><strong><font color="#666666">รายงานเอกสารการสมัคร</font></strong></legend><?
				 
				include("member_doc.php");
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
