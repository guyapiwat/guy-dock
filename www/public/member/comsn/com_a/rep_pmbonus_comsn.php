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
	if(document.getElementById("ftrcode").value==""){
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
<?

	


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
	}if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}


	//echo "ss $strfdate :   $strtdate<br>";
if(empty($ftrcode)){
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
require("./cls/repGenerator.php");		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
	$wwhere = " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' ";

	$sql="select min(fdate) as fdate1,max(tdate) as tdate1 from ".$dbprefix."around a where  $wwhere  ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$strtdate=$row["tdate1"];
		$strfdate=$row["fdate1"];
	}
	$fmcode = $_SESSION["usercode"];

	$sql = "SELECT DATE_FORMAT(a.fdate, '%d-%m-%Y') as fdate,a.rcode, a.mcode,m.name_t,m.acc_no,m.bankcode,b.bankname,a.total/a.crate as total,a.tax as tax,a.bonus as bonus,a.pos_cur,a.adjust ";
		$sql .= " FROM ".$dbprefix."ombonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";		
		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			//$sql .= " WHERE   a.fdate>= '$strfdate' and a.tdate<= '$strtdate'  and e.mcode='".$fmcode."'";
			$sql .= " WHERE   a.fdate>= '$strfdate' and a.tdate<= '$strtdate' and a.mcode='".$fmcode."'  ";
		}else if($strfdate!=""&&$strtdate!=""){
			$sql .= " WHERE  a.fdate>= '$strfdate' and a.tdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.mcode='".$fmcode."'";
		}
		//exit;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=18&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("fdate,tdate,mcode,name_t,total,pos_cur");
		$rec->setFieldDesc("".$wording_lan["sano"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["sdate"].",".$wording_lan["PVLeft"].",".$wording_lan["PVRight"].",".$wording_lan["Amount"].",".$wording_lan["uid"].",".$wording_lan["type"]."");
		$rec->setFieldAlign("center,center,left,center,left,right,right,right,center");
		$rec->setFieldSpace("10%,10%,10%,50%,10%,10");//10
		$rec->setSum(true,false,",,,,,,true,true,true");
		$rec->setFieldFloatFormat(",,,,,,2,2,2");
		$rec->setFieldLink(",,,,,,,,,,index.php?sessiontab=4&sub=46&strtdate=$strtdate&strfdate=");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=18">
<table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center"><a href="index.php?sessiontab=4&sub=11" target="_blank">คลิกดูรายละเอียดรอบ</a></td>
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