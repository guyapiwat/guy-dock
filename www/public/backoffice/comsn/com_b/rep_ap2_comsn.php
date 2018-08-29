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

	
	$fdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
	$tdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	$level = $_POST['level']==""?$_GET['level']:$_POST['level'];
	$cmc = $_POST['cmc']==""?$_GET['cmc']:$_POST['cmc'];
	if (isset($_GET["lr"])){$lr=$_GET["lr"];}else{$lr="";}
	//echo "ss $strfdate :   $strtdate<br>";
	//$strtdate = $strfdate;
if($fdate=="" || $fdate==""){
	rpdialog();
}else{
	if($strfdate>$strtdate){
		?><table width="100%" border="1">
  <tr align="center">
    <td><FONT COLOR="#ff0000">วันที่เริ่มต้น ต้องน้อยกว่าหรือเท่ากับ วันที่สิ้นสุด กรุณาระบุวันที่ใหม่</FONT></td>
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


$sql = "SELECT DISTINCT * FROM (SELECT cancel,".$dbprefix."asaleh.id,".$dbprefix."asaleh.uid as uid,".$dbprefix."asaleh.sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,total,ali_member.name_t,".$dbprefix."asaleh.mcode AS smcode,".$dbprefix."asaleh.tot_sppv AS tot_sppv";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE ".$dbprefix."asaleh.sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE ".$dbprefix."asaleh.sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= ",CASE ".$dbprefix."asaleh.sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
$sql .= ",CASE ".$dbprefix."asaleh.sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
$sql .= ",CASE ".$dbprefix."asaleh.sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd,CASE ".$dbprefix."asaleh.inv_code WHEN '' THEN 'บริษัท' ELSE ".$dbprefix."asaleh.inv_code END AS inv_code,CASE ".$dbprefix."asaleh.send WHEN '1' THEN 'บิลแจงผ่านบริษัท' ELSE 'บิลขายปกติ' END AS type ";
$sql .= ",CASE ".$dbprefix."asaleh.asend WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS asend ,".$dbprefix."member.pos_cur as por_cur ";

$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) "; 
$sql .= "RIGHT JOIN ".$dbprefix."bm  ON (".$dbprefix."asaleh.mcode=".$dbprefix."bm.mcode)where cancel = 0 ";

if($fdate !=""){
	$sql .= " and ".$dbprefix."asaleh.sadate>='".$fdate."' and ".$dbprefix."asaleh.sadate<='".$tdate."' and ".$dbprefix."asaleh.sa_type = 'A' ";
}
 if($fmcode!=""){
	$sql .= " and ".$dbprefix."asaleh.mcode='".$fmcode."' ";
}



$sql .= " UNION ALL "; 

$sql .= "SELECT cancel,".$dbprefix."holdhead.id,".$dbprefix."holdhead.uid as uid,".$dbprefix."holdhead.hono as sano ,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,total,ali_member.name_t,".$dbprefix."holdhead.mcode AS smcode ,".$dbprefix."holdhead.tot_sppv AS tot_sppv";
$sql .= ",'<img src=./images/false.gif>' AS sendsend ";
$sql .= ",CASE ".$dbprefix."holdhead.sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE ".$dbprefix."holdhead.sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= ",CASE ".$dbprefix."holdhead.sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
$sql .= ",CASE ".$dbprefix."holdhead.sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
$sql .= ",CASE ".$dbprefix."holdhead.sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd,CASE ".$dbprefix."holdhead.inv_code WHEN '' THEN 'บริษัท' ELSE ".$dbprefix."holdhead.inv_code END AS inv_code,'บิลขายแจงยอด' as type ";
$sql .= ",'<img src=./images/false.gif>' AS asend ,".$dbprefix."member.pos_cur as por_cur ";

$sql .= "FROM ".$dbprefix."holdhead ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."holdhead.mcode=".$dbprefix."member.mcode)";
$sql .= "RIGHT JOIN ".$dbprefix."bm  ON (".$dbprefix."holdhead.mcode=".$dbprefix."bm.mcode)where cancel = 0 ";

if($fdate !=""){
	$sql .= " and ".$dbprefix."holdhead.sadate>='".$fdate."' and ".$dbprefix."holdhead.sadate<='".$tdate."' and ".$dbprefix."holdhead.sa_type <> 'H' ";
}
 if($fmcode!=""){
	$sql .= " and ".$dbprefix."holdhead.mcode='".$fmcode."' ";
}


$sql .= " ) as a where 1=1 and tot_sppv >0 "; 
//echo $sql;
	if($_GET['state']==1){
		include("sale_del.php");
	}else if($_GET['state']==2){
		include("sale_editadd.php");
	}else if($_GET['state']==3){
		include("sale_cancel.php");
	}else if($_GET['state']==4){
		include("product_sale_bill.php");
	}
	else if($_GET['state']==5){
		include("sale_editaddh.php");
	}
	else if($_GET['state']==6){
		include("change_held.php");
	}
	else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=411&strtdate=$tdate&strfdate=$fdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total,tot_sppv");
		$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,HOLD,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,".$wording_lan["com"]["1"]."");
		$rec->setFieldFloatFormat(",,,,,,,2,2,2");
		$rec->setFieldAlign("left,center,left,center,center,center,center,right,right,right,right");
		$rec->setFieldSpace("15%,7%,20%,7%,7%,7%,7%,8%,8%,8%,6%,10%");
 		$rec->setSearch("sano,sadate,smcode");
		$rec->setSearchDesc("เลขบิล,เลขบิลแจง,วันที่,รหัสผู้ซื้อ");
		$rec->setSum(true,false,",,,,,,,true,true,true,");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		$rec->showRec(1,'SH_QUERY');
	}


 
	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=53">
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
      <input type="text" name="fmcode" id="fmcode" /></td>
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