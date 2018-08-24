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
	rpdialog($wording_lan);
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
	if(!empty($fmcode))$fmcode = gencode($fmcode);

	if($ftrc[0]>$ftrc[1]){
		?><table width="100%" border="1">
  <tr align="center">
    <td><FONT COLOR="#ff0000">รอบเริ่มต้น ต้องน้อยกว่าหรือเท่ากับ รอบสิ้นสุด กรุณาใส่รอบการคำนวณใหม่</FONT></td>
  </tr>
</table>
<?
		rpdialog($wording_lan);
		exit;
	}else{
?>
<?
		$sql = "SELECT fdate,tdate,paydate ";
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
		$paydate = $data->paydate;
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_c/rep_cmbonus_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a><br/-->
<?  echo $fdate .' '.$wording_lan["word"]["to"].' '.$tdate.'  '.$wording_lan["word"]["paydate"].' : '.$paydate;?>
<?
		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($_GET['state']==1){
		//include("comsn/com_c/rep_change.php");
		}
		if($_GET['state']==2){
		//echo '';
		include("send_sms.php");
		}
		$sql = "SELECT m.acc_no,m.acc_name,m.bankcode,b.bankname,m.mobile,'N' as Yes,oon,a.total-oon as ttttt";
		$sql .= ",a.id,a.rcode,a.mcode,m.mobile,m.name_t,a.pv,a.pvb,a.total,a.sms_credits  ";
		$sql .= "FROM ".$dbprefix."oon n,".$dbprefix."cmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";
		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and a.mcode=".$fmcode." and a.status = 1   ";
		}else if($ftrcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'and a.status = 1 ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.mcode=".$fmcode." and a.status = 1 ";
		}
		$sql .= "  ";

		//echo "SQL : $sql <BR>";
		$rec = new repGenerator_sms();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setLimitPage("ALL");
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=1&sub=36&ftrcode=$ftrcode&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		//$rec->setShowField("rcode,name_t,acc_no,total,bankname,mobile,Yes,oon,ttttt");
		$rec->setShowField("mcode,name_t,acc_name,acc_no,ttttt,bankname,mobile,sms_credits");
		$rec->setFieldDesc("Code Number,Name,Name Account,Account Number,Total,Bank Nme,Mobile,sms_credits");
		$rec->setFieldAlign("center,left,left,left,right,left,right,center,center,center,right,right,right");
		$rec->setFieldSpace("5%,28%,28%,10%,10%,10%,10%,10%,10%,10%,10%,10%");//10
		$rec->setSum(true,false,",,,,true,,,,,");
		$rec->setFieldFloatFormat(",,,,2,,,,,");
		if($_GET['excel']==1){
			//$rec->exportXls("ExportXls","packfileA".date("Ymd").".xls","SH_QUERY");
			//$str = "<fieldset><a href='".$rec->download("ExportXls","packfileA".date("Ymd").".xls")."' >";
			//$str .= "<img border='0' src='./images/download.gif'>Load Excel</a></fieldset>";
			//$rec->getParam();
			//$rec->setSpace($str);
		}
		if($acc->isAccess(4)){
			$rec->setDel("index.php","mcode","mcode","sessiontab=1&sub=36");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=36&state=2&ftrcode=$ftrcode","post","delfield");
		}
		//$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		//$str .= "<img border='0' src='./images/excel.gif'>Create Excel</a></fieldset>";
		//$rec->setSpace($str);
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	
function rpdialog($wording_lan){
	?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=1&sub=36">
<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr style="display:none">
    <td colspan="2" align="center"><strong>กรอกรอบ และรหัสสมาชิกที่ต้องการดูรายงาน</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
  <tr>
    <td align="right"><?=$wording_lan["word"]["cycle"]?>&nbsp;&nbsp;</td>
    <td><input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" />
      &nbsp;( Example 1-9 )</td>
  </tr>
  <tr>
    <td width="24%" align="right"><?=$wording_lan["word"]["mcode"]?>&nbsp;&nbsp;</td>
    <td width="76%">
      <input type="text" name="fmcode" id="fmcode" /></td>
  </tr>
  <tr align="center">
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" name="Submit" value="<?=$wording_lan["word"]["search"]?>" onclick="checkround()" /></td>
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