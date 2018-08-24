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
	set_time_limit( 0);
	ini_set("memory_limit","1024M");
	ob_start();
	$time_start = getmicrotime();
	//var_dump($_GET);
	$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
	$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
//	echo "ss $strfdate :   $strtdate<br>";
//exit;
//if($strfdate=="" || $strtdate==""){
if(empty($fmcode) and empty($strfdate)){
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
รอบวัน <? echo $strfdate .' ถึง '.$strtdate;?>
<?
		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$whereclass = " AND a.fdate>= '$strfdate' and a.tdate<= '$strtdate' and m.mcode='".$fmcode."'";
			$whereclass1 = " AND b.fdate>= '$strfdate' and b.tdate<= '$strtdate' and m.mcode='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$whereclass = " AND a.fdate>= '$strfdate' and a.tdate<= '$strtdate' ";
			$whereclass1 = " AND b.fdate>= '$strfdate' and b.tdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$whereclass = " AND m.mcode='".$fmcode."'";
			$whereclass1 = " AND m.mcode='".$fmcode."'";
		}
		/*$sql = "SELECT m.mcode,m.name_t,
		(SELECT ifnull(sum(pv),0) from ".$dbprefix."ac a where a.upa_code=m.mcode ".$whereclass." and a.pv >= 1000) as fast,
		(SELECT ifnull(sum(point),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass." ) as binary1 ,
		((SELECT ifnull(sum(pv),0) from ".$dbprefix."ac a where a.upa_code=m.mcode ".$whereclass." and a.pv >= 1000)/250)-0.4 +
		(SELECT ifnull(sum(point),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass." ) as total_team
		from ".$dbprefix."member m 
		LEFT JOIN ".$dbprefix."bank bk ON m.bankcode=bk.bankcode where 
		((SELECT ifnull(sum(pv),0) from ".$dbprefix."ac a where a.upa_code=m.mcode  ".$whereclass." and a.pv >= 1000)/250)-0.4 + 
		(SELECT ifnull(sum(point),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass." ) >= 1 ";*/
		$sql = "SELECT m.mcode,m.name_t,
		(SELECT ifnull(sum(pv),0) from  ".$dbprefix."ac a LEFT JOIN ".$dbprefix."member mm ON mm.mcode=a.mcode
		 where mm.mdate between '$strfdate' and '$strtdate' and a.upa_code=m.mcode ".$whereclass." and a.pv >= 1000) as fast,
		(SELECT ifnull(sum(point),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass1." ) as binary1 ,
		((SELECT ifnull(sum(pv),0) from  ".$dbprefix."ac a LEFT JOIN ".$dbprefix."member mm ON mm.mcode=a.mcode
		 where mm.mdate between '$strfdate' and '$strtdate' and a.upa_code=m.mcode ".$whereclass." and a.pv >= 1000)/250)-0.49 +
		(SELECT ifnull(sum(point),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass1." ) as total_team
		from ".$dbprefix."member m  where 
		((SELECT ifnull(sum(pv),0) from  ".$dbprefix."ac a LEFT JOIN ".$dbprefix."member mm ON mm.mcode=a.mcode
		 where mm.mdate between '$strfdate' and '$strtdate' and a.upa_code=m.mcode ".$whereclass." and a.pv >= 1000)/250)-0.49 + 
		(SELECT ifnull(sum(point),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass1." ) >= 1 ";
		
		//echo $sql;
		//exit;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?" mcode ":$_GET['ord']));
		$rec->setLimitPage(500);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=111&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("mcode,name_t,fast,binary1,total_team");
		$rec->setFieldFloatFormat(",,0,0,0,,0,2,2,2,2,2,2,2,2");
		$rec->setFieldDesc("รหัส,ชื่อ,แนะนำ(PV),จับคู่,Point");
		$rec->setFieldAlign("center,left,center,center,center,left,left,right,right,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("8%,47%,15%,15%,15%");
		$rec->setSum(true,false,",,true,true,true,,,true,true,true,true,true,true,true,true");
		$rec->setFieldLink("");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","Point".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","Point".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
				$time_end = getmicrotime();
$time = $time_end - $time_start;
echo "สิ้นสุดการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR>";
	}
}	
function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec);
}
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=111">
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