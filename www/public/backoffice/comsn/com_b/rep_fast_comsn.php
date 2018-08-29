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
	function sale_print(id){
		var wlink = 'invoice_aprint_sale.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
	//	window.location='index.php?sessiontab=3&sub=6&sanoo='+id;
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
	//if(empty($strtdate))$strtdate = $strfdate;
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	$cmc = $_POST['cmc']==""?$_GET['cmc']:$_POST['cmc'];
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
		$sql = "SELECT DATE_FORMAT(tab.sadate, '%d-%m-%Y') as fdate,tab.mcode,taba.name_t,a.upa_code,tab.tot_pv as pv,a.level,a.gen,a.percer,tab.tot_pv*a.percer as total,tab.sano as sano,tab.id,CASE tab.inv_code WHEN '' THEN 'บริษัท' ELSE tab.inv_code END AS inv_code,CASE tab.send WHEN '1' THEN 'บิลแจงผ่านบริษัท' ELSE 'บิลขายปกติ' END AS type,'1' as checkcheck,a.pos_cur  FROM ".$dbprefix."asaleh tab  ";
		$sql .= " LEFT JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member) AS taba ON (tab.mcode=taba.mca)";
		$sql .= " LEFT JOIN (SELECT level,pv,percer,upa_code,total,mcode,fdate,pos_cur,gen FROM ".$dbprefix."hc) AS a ON (a.mcode=tab.mcode)";
		$sql .= " where 1=1 ";
		
 		if($strfdate!=""&&$strtdate!=""){
			//$sql .= " WHERE tab.sadate = '$strfdate' and a.upa_code='".$fmcode."' and a.mcode = '$cmc' ";
			//$sql .= " and tab.sadate = '$strfdate' and a.fdate = '$strfdate' and a.upa_code='".$cmc."'  ";
			//$sql .= " and tab.sadate = '$strfdate' and a.fdate = '$strfdate' and a.upa_code='".$cmc."'  ";
			$sql .= " and tab.sadate between '$strfdate' and '$strtdate' and a.upa_code='".$cmc."'  ";
		}
		/*}else if($strfdate!=""){
			$sql .= " WHERE tab.sadate = '$strfdate' ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.upa_code='".$fmcode."' ";
		}*/
		$sql .=  ' and tab.tot_pv >0  and tab.sa_type="A" and tab.cancel = 0 ';
		//echo $sql;
		$sql .= " UNION ";
		$sql .= "SELECT DATE_FORMAT(tab.sadate, '%d-%m-%Y') as fdate,tab.mcode,taba.name_t,a.upa_code,tab.tot_pv as pv,a.level,a.gen,a.percer,tab.tot_pv*a.percer as total,tab.hono as sano,tab.id,CASE tab.inv_code WHEN '' THEN 'บริษัท' ELSE tab.inv_code END AS inv_code,'บิลขายแจงยอด' as type,'2' as checkcheck ,a.pos_cur FROM ".$dbprefix."holdhead tab  ";
		$sql .= " LEFT JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member) AS taba ON (tab.mcode=taba.mca)";
		$sql .= " LEFT JOIN (SELECT level,pv,percer,upa_code,total,mcode,fdate,pos_cur,gen FROM ".$dbprefix."hc) AS a ON (a.mcode=tab.mcode)";
		$sql .= " where 1=1 ";
		
 		if($strfdate!=""&&$strtdate!=""){
			$sql .= " and tab.sadate between '$strfdate' and '$strtdate'  and a.upa_code='".$cmc."' ";
		}
		$sql .=  ' and tab.tot_pv >0  and tab.sa_type="A"  and tab.cancel = 0 ';
		
		//echo "$sql<BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" fdate ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=51&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&cmc=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("fdate,sano,mcode,name_t,upa_code,pv,level,gen,percer,total,inv_code,type,pos_cur");
		$rec->setFieldDesc("วันที่,เลขที่ใบเสร็จ,รหัสสมาชิก,ชื่อสมาชิก,รหัสผู้แนะนำ,คะแนน,ชั้น,gen,%โบนัส,ได้โบนัส,ผู้บันทึก,ชนิด,คุณสมบัติ");
		$rec->setFieldAlign("center,center,center,left,center,right,right,right,center,center");
		$rec->setFieldSpace("9%,9%,9%,15%,9%,9%,3%,3%,9%,9%,7%,10%");//10
		$rec->setFieldFloatFormat(",,,,,,,0,2,2");
		$rec->setSum(true,false,",,,,,,,true,,true");
		$rec->setFieldLink("");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","พิมพ์");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=51">
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