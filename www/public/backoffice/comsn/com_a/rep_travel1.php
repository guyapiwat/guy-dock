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
	if(document.getElementById("ftrcode").value=="" && document.getElementById("fmcode").value==""){
		alert("กรุณาใส่รอบการคำนวณ");
		document.getElementById("ftrcode").focus();
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
<script language="javascript" type="text/javascript">
	

		
	function sale_status2(fdate,tdate,cmc){
	//	if(confirm("ต้องการเปลี่ยนแปลงจัดส่ง")){
			window.open('index.php?sessiontab=4&sub=145&strfdate='+fdate+'&strtdate='+tdate+'&fmcode='+cmc);
	//	}
	}	
</script>
<?
set_time_limit( 0);
ini_set("memory_limit","1024M");
ob_start();

	$ftrcode = $_POST['ftrcode']==""?$_GET['ftrcode']:$_POST['ftrcode'];
	
	$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
	$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	if (strpos($ftrcode,"-")===false){
			//รอบเริ่มต้น == รอบสิ้นสุด
			$ftrc[0]=$ftrcode;
			$ftrc[1]=$ftrcode;
	}else{
		$ftrc = explode('-',$ftrcode);
	}	
	$cmc = $_POST['cmc']==""?$_GET['cmc']:$_POST['cmc'];
	//echo "ss $strfdate :   $strtdate<br>";
	
	$strtdate = $strfdate;
if(empty($ftrcode) and empty($fmcode)){
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
		/*$sql = "SELECT DATE_FORMAT(a.fdate, '%Y-%m-%d') as fdate,DATE_FORMAT(a.tdate, '%Y-%m-%d') as tdate,a.rcode, a.mcode,m.sp_code as smcode,m.name_t,m.acc_no,m.bankcode,b.bankname,a.total*a.adjust as total,a.tax*a.adjust as tax,a.bonus*a.adjust as bonus,a.pos_cur,a.adjust  ";
		$sql .= " FROM ".$dbprefix."dmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";

		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$sql .= " WHERE fdate>= '$strfdate' and tdate<= '$strtdate' and a.mcode='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$sql .= " WHERE fdate>= '$strfdate' and tdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.mcode='".$fmcode."'";
		}*/
		$wwhere = " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' ";
		$sql="select min(fdate) as fdate1,max(tdate) as tdate1 from ".$dbprefix."bround a where  $wwhere  ";
		$result=mysql_query($sql);
		if (mysql_num_rows($result)>'0') {
			$row= mysql_fetch_array($result, MYSQL_ASSOC);
			$strtdate=$row["tdate1"];
			$strfdate=$row["fdate1"];
		}
	//	$sql .= " group by a.mcode ";
		$sql = "select * from (SELECT fdate,lb.cshort,tdate,a.rcode, a.mcode,a.name_t,a.seats,a.stot_pv,a.balance_pv ,a.new_g1,a.new_bm  ";
		$sql .= " FROM ".$dbprefix."tmbonus1 a ";
		$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON lb.cid=a.locationbase ";

		//$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE (a.rcode between '$ftrc[0]' and '$ftrc[1]') and a.mcode='".$fmcode."'";
		}else if($ftrcode!=""){
			$sql .= " WHERE (a.rcode between '$ftrc[0]' and '$ftrc[1]') ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.mcode='".$fmcode."'";
		}
		$sql .= " group by a.mcode) as a where 1=1 ";
		//exit;
		//echo $sql;
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"seats desc,mcode":$_GET['ord']));
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setLimitPage('5000');
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=146&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&ftrcode=$ftrcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("fdate,tdate,mcode,name_t,new_g1,new_bm,stot_pv,balance_pv,seats");
		$rec->setFieldDesc("ตั้งแต่วันที่,ถึงวันที่,รหัสมาชิก,ชื่อ,Fast (G1) (เดือนนี้),W/S (เดือนนี้),Fast (G1) สะสม,W/Sสะสมได้โปรโมชั่น	,ได้โปรโมชั่น,LB");
		$rec->setFieldAlign("center,center,center,left,right,right,right,right,right,center");
		$rec->setFieldSpace("8%,8%,8%,30%,10%,10%,10%,10%,10%,4%");//10
		$rec->setFieldFloatFormat(",,,,2,2,2,2,,");
		$rec->setSpecial("ประวัติคะแนน","","sale_status2","fdate,tdate,mcode","TEXT","ประวัติคะแนน");
			$rec->setSum(true,false,",,,,,,,,true");
	
		
		//$rec->setFieldLink("");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","dmbonus".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","dmbonus".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("mcode,cshort");
		$rec->setSearchDesc("รหัส,LB");
		
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=146">
<table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center"><a href="index.php?sessiontab=4&sub=60" target="_blank">คลิกดูรายละเอียดรอบ</a></td>
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
    <td width="40%" align="right">รอบ&nbsp;&nbsp;</td>
    <td width="60%">
      <input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" /></td>
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