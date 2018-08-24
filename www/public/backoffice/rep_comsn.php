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
		$ftrc = explode("-",$ftrcode);
		echo "=";print_r($ftrc);
	}
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
		require("connectmysql.php");
		require("./cls/repGenerator.php");
		
		$wheresql = "";
		if($ftrcode!=""){
			$wheresql .= " AND rcode between '".$ftrc[0]."' and '".$ftrc[1]."'";
		}
		//echo $wheresql."<br>";
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT *,".$dbprefix."ambonus.rcode AS r FROM ".$dbprefix."ambonus ";
		$sql .= "LEFT JOIN (SELECT name_t,mcode AS smcode FROM ".$dbprefix."member) AS taba ON (taba.smcode=".$dbprefix."ambonus.mcode) ";
		$sql .= "LEFT JOIN (SELECT rcode AS srcode,tdate FROM ".$dbprefix."around) AS tabb ON (".$dbprefix."ambonus.rcode=tabb.srcode) ";
		$sql .= "WHERE ".$dbprefix."ambonus.mcode='".$_SESSION['usercode']."' ";
		//echo $sql;
		?><br /><?
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=1&ftrcode=$ftrcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("mcode,name_t,r,tdate,total");
		$rec->setFieldDesc("รหัสมาชิก,ชื่อสมาชิก,รอบ,วันที่,คอมมิชชั่น");
		$rec->setFieldAlign("center,left,right,center,right");
		$rec->setFieldSpace("15%,30%,10%,10%,35%");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=5&sub=1">
<table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
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