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
	if(document.getElementById("ftrcode").value!=""){
		var numCheck = document.getElementById("ftrcode").value;
		var numVal = numCheck.split("-");
		if(numVal.length>2){
			alert("กรุณากรอกรูปแบบรอบให้ถูกต้อง");
			return false;
		}
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

if(!(isset($_POST["ftrcode"]) || isset($_GET["ftrcode"]))){
	rpdialog();
}else{
	if(isset($_POST["ftrcode"]))
		$ftrcode = $_POST["ftrcode"];
	else if(isset($_GET["ftrcode"]))
		$ftrcode = $_GET["ftrcode"];
	if (strpos($ftrcode,"-")===false){
		//รอบเริ่มต้น == รอบสิ้นสุด
		$ftrc[0]=$ftrcode;
		$ftrc[1]=$ftrcode;
	}else{
		$ftrc = explode('-',$ftrcode);
	}
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	if($ftrc[0]>$ftrc[1]){
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
		$sql = "SELECT DATE_FORMAT(a.mdate, '%d-%m-%Y') as mdate,a.rcode,a.inv_code,a.sano,a.sa_type,a.tot_pv,a.tot_price,taba.inv_desc  ";
		$sql .= ",CASE status WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS status1 ";
		$sql .= ",CASE status WHEN 'E' THEN '<img src=./images/true.gif>' ELSE '' END AS status2 ";
		$sql .= ",CASE status WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS status3 ";
		$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS sa_type1 ";
		$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS sa_type2 ";
		$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS sa_type3 ";
		$sql .= "FROM ".$dbprefix."fm a ";
		//$sql .= "LEFT JOIN ".$dbprefix."member m ON c.mcode=m.mcode ";
		$sql .= " LEFT JOIN (SELECT inv_code,inv_desc  FROM ".$dbprefix."invent) AS taba ON (a.inv_code=taba.inv_code)";
		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and a.inv_code=".$fmcode."   ";
		}else if($ftrcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.inv_code=".$fmcode." ";
		}
	//	echo $sql;

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
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=43&ftrcode=$ftrcode&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","ดู");
		$rec->setShowField("rcode,mdate,sano,inv_code,inv_desc,tot_pv,tot_price,status1,status2,status3,sa_type1,sa_type2,sa_type3");
		$rec->setFieldDesc("รอบ,วันที่,เลขบิล,รหัสสาขา,ชื่อสาขา,PV,ราคา,แบบแจงผ่านบริษัท,ขายโมบาย,แจงยอด,ทำคุณสมบัติ,รักษายอด,รักษายอดทันที");
		$rec->setFieldAlign("center,center,center,center,left,right,right,center,center,center,center,center,center");
		$rec->setFieldSpace("5%,8%,9%,6%,15%,8%,8%,8%,6%,6%,7%,5%,6%");
		$rec->setSum(true,false,",,,,,true,true,,");
		$rec->setFieldFloatFormat(",,,,,0,2,,,,,,,,");
		$rec->setFieldLink("");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("a.inv_code,a.sano");
		$rec->setSearchDesc("รหัสสาขา,เลขบิล");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=43">
<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>กรอกรอบ และรหัสสมาชิกที่ต้องการดูรายงาน</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
  <tr>
    <td align="right">รอบ&nbsp;&nbsp;</td>
    <td><input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" />
      &nbsp;( กรอกข้อมูลเป็น 1-9 )</td>
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
