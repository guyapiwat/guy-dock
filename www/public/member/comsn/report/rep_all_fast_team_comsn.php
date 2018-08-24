<? include("./global.php");?>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript">
var win
function view(ro,code){
	var param = 'ftrcode=' + ro +'&fmcode='+code;
	var url = './print/rep_am_comsn.php?'+param;
	//window.location = wlink;
	if(win!=null) win.close();
	win = window.open(url,'','height=500 width=900 scrollbars=yes' );
}
function checkround(){
	if(document.getElementById("strfdate").value==""){
		alert("กรุณาเลือกวันที่เริ่มต้น");
		document.getElementById("strfdate").focus();
		return false;
	}
	if(document.getElementById("strtdate").value==""){
		alert("กรุณาเลือกวันที่สิ้นสุด");
		document.getElementById("strtdate").focus();
		return false;
	}
	document.rform.submit();
}
function chknum(key){
	if((key>=48&&key<=57)||key==45)
		return true;
	else
		return false;
}
</script>
<?

	
	$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
	$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	//echo "ss $strfdate :   $strtdate<br>";

if($strfdate=="" || $strtdate==""){
	rpdialog();
}else{
	if($strfdate>$strtdate){
		?><table width="100%" border="1">
  <tr align="center">
    <td><FONT COLOR="#ff0000">วันที่เริ่มต้น ต้องน้อยกว่าหรือเท่ากับ วันที่สิ้นสุด กรุณาระุบุวันที่ใหม่</FONT></td>
  </tr>
</table>
<?
		rpdialog();
		exit;
	}else{
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a-->
<?
		require("connectmysql.php");
		require("./cls/repGenerator.php");
		//require("./cls/repGenerator.php");
		if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
		if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
		if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
		if ($cmc=="") {$cmc=$smc;}
		if ($cmc=="") {
			$cmc=$_SESSION["usercode"];
		}
		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' and m.mcode='".$cmc."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$whereclass = " AND m.mcode='".$cmc."'";
		}
		$sql = "SELECT m.mcode,m.name_t,bk.bankcode,bk.bankname,m.branch,m.acc_type,m.acc_no,m.acc_name,
		(SELECT ifnull(sum(total),0) from ".$dbprefix."ambonus a where a.mcode='$cmc' ".$whereclass.") as total_fast, 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."bmbonus b where b.mcode='$cmc' ".$whereclass.") as total_team, 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."dmbonus d where d.mcode='$cmc' ".$whereclass.") as total_mat,
		(SELECT ifnull(sum(total),0) from ".$dbprefix."ambonus a where a.mcode='$cmc' ".$whereclass.")+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."bmbonus b where b.mcode='$cmc' ".$whereclass.")+
		(SELECT ifnull(sum(total),0) from ".$dbprefix."dmbonus d where d.mcode='$cmc' ".$whereclass.") as total, 
		(((SELECT ifnull(sum(total),0) from ".$dbprefix."ambonus a where a.mcode='$cmc' ".$whereclass.")+
		(SELECT ifnull(sum(total),0) from ".$dbprefix."bmbonus b where b.mcode='$cmc' ".$whereclass.")+
		(SELECT ifnull(sum(total),0) from ".$dbprefix."dmbonus d where d.mcode='$cmc' ".$whereclass."))*0.05) as tax, 		
		(((SELECT ifnull(sum(total),0) from ".$dbprefix."ambonus a where a.mcode='$cmc' ".$whereclass.")+
		(SELECT ifnull(sum(total),0) from ".$dbprefix."bmbonus b where b.mcode='$cmc' ".$whereclass.")+
		(SELECT ifnull(sum(total),0) from ".$dbprefix."dmbonus d where d.mcode='$cmc' ".$whereclass."))*0.95) as totalamt 
		from ".$dbprefix."member m 
		LEFT JOIN ".$dbprefix."bank bk ON m.bankcode=bk.bankcode 
		where (SELECT ifnull(sum(total),0) from ".$dbprefix."ambonus a where a.mcode='$cmc' ".$whereclass.")+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."bmbonus b where b.mcode='$cmc' ".$whereclass.")+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."dmbonus d where d.mcode='$cmc' ".$whereclass.")>0 and m.mcode='$cmc'";

		
		//echo $sql;
		//exit;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" mcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=100&strfdate=$strfdate&strtdate=$strtdate&fmcode=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("mcode,name_t,bankname,branch,acc_type,acc_no,acc_name,total_fast,total_team,total_mat,totalamt");
		$rec->setFieldFloatFormat(",,,,,,,2,2,2,2,2,2");
		$rec->setFieldDesc("รหัส,ชื่อ,ธนาคาร,สาขา,ประเภท,เลขที่บัญชี,ชื่อบัญชี,แนะนำ,บริหารทีม,บริหารองค์กร,รายได้");
		$rec->setFieldAlign("center,left,center,left,left,left,left,right,right,right,right,right,right");
		$rec->setFieldSpace("7%,10%,7%,8%,10%,8%,7%,8%,7%,7%,7%,7%,7%");
		$rec->setSum(false,false,",,,,,,,true,true,true,true,true,true");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=5&sub=100">
<table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>ระบุวันที่ และ รหัสสมาชิกที่ต้องการทราบข้อมูล</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
  <!--tr>
    <td align="right">รอบ&nbsp;&nbsp;</td>
    <td><input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" />
      &nbsp;( กรอกข้อมูลเป็น 1-9 )</td>
  </tr-->
  <tr>
  <td align="right" >วันที่&nbsp;&nbsp;</td>
  <td colspan="2">
      <input type="text" id="strfdate" onkeypress="return chknum(window.event.keyCode)" name="strfdate" size="10" maxlength="10" value="<?=date("Y-m-d")?>"/>
&nbsp;<a href="javascript:NewCal('strfdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่เิีริ่มต้น" /></a>&nbsp; ถึง &nbsp;<input type="text" id="strtdate" onkeypress="return chknum(window.event.keyCode)" name="strtdate" size="10" maxlength="10" value="<?=date("Y-m-d")?>" />
&nbsp;<a href="javascript:NewCal('strtdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่สิ้นสุด" /></a>
</td>
  </tr>
  <tr>
    <td width="24%" align="right">รหัสสมาชิก&nbsp;&nbsp;</td>
    <td width="76%">
      <input type="text" name="fmcode" id="fmcode" value="<?=$_SESSION["usercode"]?>" readonly/></td>
  </tr>
  <tr align="center">
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</td></tr></table>
<? }
?>