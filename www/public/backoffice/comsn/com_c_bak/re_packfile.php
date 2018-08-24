<script language="javascript">
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
    <td><FONT COLOR="#ff0000">รอบเริ่มต้น ต้องน้อยกว่าหรือเท่ากับ รอบสิ้นสุด กรุณาใส่รอบการคำนวณใหม่</FONT></td>
  </tr>
</table>
<?
		rpdialog();
		exit;
	}else{
?>
<?
		$sql = "SELECT fdate,tdate ";
		$sql .= "FROM ".$dbprefix."cround  ";
		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'  ";
		}else if($ftrcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' ";
		}
		//$sql .= '';
		//echo $sql;
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$data = mysql_fetch_object($result);
		$fdate = $data->fdate;
		$tdate = $data->tdate;
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_c/rep_cmbonus_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a><br/-->
<?  echo $fdate .' ถึง '.$tdate;?>
<?
		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($_GET['state']==1){
		include("comsn/com_c/rep_change.php");
		}
		$sql = "SELECT a.*,a.fob+a.cycle+a.smb+a.matching+a.onetime as thiscom,a.fob+a.cycle+a.pv+a.smb+a.matching+a.onetime as thiscom1,c.fdate,c.tdate,m.acc_no,a.tot_tax as tax,m.mobile,'N' as Yes,";
		$sql .= "CASE a.status WHEN '1' THEN oon ELSE '0' END AS oon1 ,";
		$sql .= "CASE a.status WHEN '1' THEN a.total-oon ELSE a.total END AS ttttt ,";
		$sql .= "oon";
		$sql .= ",a.id,a.rcode,a.tot_vat,a.mcode,CONCAT(m.name_f,' ',m.name_t) as name_tt,a.pv,a.pvb,a.total  ";
		$sql .= "FROM ".$dbprefix."oon n,".$dbprefix."cmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."cround c ON c.rcode=a.rcode ";
		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and a.mcode=".$fmcode."    ";
		}else if($ftrcode!=""){
			$sql .= " WHERE a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."'  ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.mcode=".$fmcode."  ";
		}
		//echo $sql;

		//echo "SQL : $sql <BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
//		$rec->setLimitPage($_GET['lp']);
		$rec->setLimitPage(5000);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=58&ftrcode=$ftrcode&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		//$rec->setShowField("rcode,name_t,acc_no,total,bankname,mobile,Yes,oon,ttttt");
		$rec->setFieldFloatFormat(",,,,,,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2");
		$rec->setShowField("rcode,fdate,tdate,mcode,name_tt,pv,fob,cycle,smb,matching,onetime,thiscom,thiscom1,pvh,totaly,tot_vat,tax,oon1,ttttt");
		$rec->setFieldDesc("รอบที่,ตั้งแต่วันที่,ถึงวันที่,รหัส,ชื่อ-นามสกุล,ยอดยกมา,FOB,Cycle,SMB,Matching,One Time,Bonusรวม,Bonusรวม<br>+ยอดยกมา,Bonus ยกไป<br>(ไม่โอนรอบนี้),Bonus สะสมทั้งปี,vat,หักภาษี,หักค่าโอน,สรุปยอดโอน");
		$rec->setFieldAlign("center,left,center,right,left,right,right,right,right,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("2%,6%,6%,5%,14%,5%,5%,5%,5%,5%,5%,5%");//10
		$rec->setSum(true,false,",,,,,,true,true,true,true,true,true,,,,true,true,true,true");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","packfileA".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","packfileA".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("m.mcode");
		$rec->setSearchDesc("รหัส");
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=58">
<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center"><a href="index.php?sessiontab=4&sub=25" target="_blank">คลิกดูรายละเอียดรอบ</a></td>
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