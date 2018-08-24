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
		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT DATE_FORMAT(a.fdate, '%d-%m-%Y') as fdate,a.rcode,a.mcode,a.upa_code,a.gen,a.pv,a.percer*100 as percer,a.total,taba.inv_desc  ";
		$sql .= ",CASE pos_cur WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS BB ";
		$sql .= ",CASE pos_cur WHEN 'E' THEN '<img src=./images/true.gif>' ELSE '' END AS II ";
		$sql .= ",CASE pos_cur WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS HH ";
		$sql .= "FROM ".$dbprefix."fc a ";
		//$sql .= "LEFT JOIN ".$dbprefix."member m ON c.mcode=m.mcode ";
		$sql .= " LEFT JOIN (SELECT inv_code,inv_desc  FROM ".$dbprefix."invent) AS taba ON (a.upa_code=taba.inv_code)";
		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$sql .= " WHERE fdate>= '$strfdate' and tdate<= '$strtdate' and a.upa_code='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$sql .= " WHERE fdate>= '$strfdate' and tdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.upa_code='".$fmcode."'";
		}

		//echo $sql;
		//exit;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" rcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=41&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","ดู");
		$rec->setShowField("rcode,upa_code,inv_desc,pv,percer,total,BB,II,HH");
		$rec->setFieldDesc("รอบ,รหัสสาขา,ชื่อสาขา,PV,%โบนัส,ได้,แจงผ่านบริษัท,ขายโมบาย,แจงยอด");
		$rec->setFieldAlign("center,center,left,right,right,right,center,center,center");
		$rec->setFieldSpace("10%,10%,25%,10%,5%,10%,10%,10%,10%");
		$rec->setSum(true,false,",,,true,,true,,,");
		$rec->setFieldFloatFormat(",,,0,0,2,,,");
		$rec->setFieldLink("");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("a.upa_code");
		$rec->setSearchDesc("รหัสสาขา");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=2">
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
      <input type="text" name="fmcode" id="fmcode" readonly value="<?=$_SESSION["admininvent"]?>" /></td>
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
