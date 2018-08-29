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
?><?
		$sql = "SELECT e.rcode,e.mcode,e.pv,
		e.total1+e.total2+e.total3+e.total4+e.total5+e.total6 as total,
		e.total1,e.total2,e.total3,e.total4,e.total5,e.total6,e.pershare,e.pv_world,e.tdate,m.name_t";
		$sql .= " FROM ".$dbprefix."em e ";
		$sql .= "LEFT JOIN ".$dbprefix."member m ON e.mcode=m.mcode ";
		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$sql .= " WHERE fdate>= '$strfdate' and tdate<= '$strtdate' and e.mcode='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$sql .= " WHERE fdate>= '$strfdate' and tdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$sql .= " WHERE e.mcode='".$fmcode."'";
		}
		//$sql .= '';
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$data = mysql_fetch_object($result);
 
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
รอบเดือน <? echo $strfdate .' ถึง '.$strtdate.'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ยอดขายทั่วโลก : '.$data->pv_world.'';?><!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a-->
<?
		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT e.rcode,e.mcode,e.pv,
		e.total1+e.total2+e.total3+e.total4+e.total5+e.total6 as total,
		e.total1,e.total2,e.total3,e.total4,e.total5,e.total6,e.pershare,e.pv_world,e.tdate,m.name_t";
		/*sql .= ",CASE e.pools WHEN '1' THEN '<img src=./images/true.gif>' ELSE '' END AS pools1 ";
		$sql .= ",CASE e.pools WHEN '2' THEN '<img src=./images/true.gif>' ELSE '' END AS pools2 ";
		$sql .= ",CASE e.pools WHEN '3' THEN '<img src=./images/true.gif>' ELSE '' END AS pools3 ";
		$sql .= ",CASE e.pools WHEN '4' THEN '<img src=./images/true.gif>' ELSE '' END AS pools4 ";
		$sql .= ",CASE e.pools WHEN '5' THEN '<img src=./images/true.gif>' ELSE '' END AS pools5 ";
		$sql .= ",CASE e.pools WHEN '6' THEN '<img src=./images/true.gif>' ELSE '' END AS pools6 ";*/
		$sql .= " FROM ".$dbprefix."em e ";
		$sql .= "LEFT JOIN ".$dbprefix."member m ON e.mcode=m.mcode ";
		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$sql .= " WHERE fdate>= '$strfdate' and tdate<= '$strtdate' and e.mcode='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$sql .= " WHERE fdate>= '$strfdate' and tdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$sql .= " WHERE e.mcode='".$fmcode."'";
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
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=15&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","ดู");
		//$rec->setShowField("tdate,mcode,name_t,pv_world,total1,total2,total3,total4,total5,total6,total");
		$rec->setShowField("mcode,name_t,total1,total2,total3,total4,total5,total");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อสมาชิก,กองทุนRB (2%),กองทุน EM (2%),กองทุน D(2%),กองทุน DD(2%),กองทุน TD(2%),รายได้");
		$rec->setFieldAlign("center,left,right,right,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("9%,45%,15%,9%,9%,9%,9%,9%,9%,9%,5%,10%,10%");
		$rec->setSum(true,false,",,true,true,true,true,true,true,true,true,,true");
		$rec->setFieldFloatFormat(",,,,,,,,,,,2");
		$rec->setFieldLink("");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("e.mcode");
		$rec->setSearchDesc("รหัส");
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);

		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=15">
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
