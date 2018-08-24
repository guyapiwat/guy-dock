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

	

if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if (isset($_GET["fdate"])){$fdate=$_GET["fdate"];}
if (isset($_GET["ftrcode"])){$ftrcode=$_GET["ftrcode"];}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}
$fmcode=$_SESSION["usercode"];
if(empty($cmc)){
	rpdialog();
}else{
	if($fdate>$fdate){
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
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

		$wwhere = " a.rcode between '".$ftrcode."' and '".$ftrcode."' ";
		$sql="select min(fdate) as fdate1,max(tdate) as tdate1 from ".$dbprefix."around a where  $wwhere  ";
		$result=mysql_query($sql);
		if (mysql_num_rows($result)>'0') {
			$row= mysql_fetch_array($result, MYSQL_ASSOC);
			$fdate=$row["tdate1"];
			$tdate=$row["fdate1"];
		}

		$sql = "SELECT DATE_FORMAT(a.fdate, '%d-%m-%Y') as fdate,DATE_FORMAT(a.tdate, '%d-%m-%Y') as tdate,a.rcode,a.mcode,taba.name_t,a.upa_code,tabb.upa_name,a.total/a.crate as total,tabb.pos_cur,a.mpos as mpos1 FROM ".$dbprefix."sc a  ";
		$sql .= " LEFT JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member) AS taba ON (a.mcode=taba.mca)";
		$sql .= " LEFT JOIN (SELECT mcode AS mcb,name_t AS upa_name,pos_cur FROM ".$dbprefix."member) AS tabb ON (a.upa_code=tabb.mcb)";
		
		

		$strfdate1 = explode('-',$fdate); 
		$strtdate1 = explode('-',$tdate);
		if($fdate!=""&&$tdate!=""&&$fmcode!=""){
			$sql .= " WHERE (fdate like '%".$strfdate1[0]."-".$strfdate1[1]."%' or tdate like '%".$strtdate1[0]."-".$strtdate1[1]."%') and a.upa_code='".$fmcode."'";
		}else if($fdate!=""&&$tdate!=""){
			$sql .= " WHERE (fdate like '%".$strfdate1[0]."-".$strfdate1[1]."%' or tdate like '%".$strtdate1[0]."-".$strtdate1[1]."%') ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.upa_code='".$fmcode."'";
		}

		//echo $sql;
		//exit;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=144&ftrcode=$ftrcode&strfdate=$fdate&strtdate=$tdate&fmcode=$fmcode&cmc=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","ดู");
		$rec->setShowField("fdate,tdate,mcode,name_t,upa_code,upa_name,mpos1,total");
		$rec->setFieldDesc($wording_lan["tab5"]['2_2'].",".$wording_lan["tab5"]['2_3'].",".$wording_lan["tab4"]["6_2"].",".$wording_lan["rep_3"].",".$wording_lan["rep_4"].",".$wording_lan["tab1_mem_6"].",".$wording_lan['tab5']['1_1_20'].",".$wording_lan['tab5']['1_1_21']."");
		$rec->setFieldAlign("center,center,center,left,center,left,center,right,center,right,right");
		$rec->setFieldSpace("10%,10%,10%,20%,10%,20%,10%,10%");//10
		$rec->setFieldFloatFormat(",,,,,,,2,2");
		$rec->setSum(true,false,",,,,,,,true,true,,,true");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=144">
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