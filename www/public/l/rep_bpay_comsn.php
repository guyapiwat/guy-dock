<? include("./global.php");?>
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
require("connectmysql.php");
require("./cls/repGenerator.php");

if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}

 
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
 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT ".$dbprefix."bmbonus.rcode, ".$dbprefix."bmbonus.mcode,name,acno,bankname,sum(total) as tot";
		$sql .= ",(sum(total)*5)/100 as tax,(sum(total)-(sum(total)*5)/100) as totall ";
		$sql .= "FROM ".$dbprefix."bmbonus ";
		$sql .= "LEFT JOIN (select mcode as mc,acc_name as name,acc_no as acno,bankcode as bcode from ".$dbprefix."member) AS taba ON (".$dbprefix."bmbonus.mcode=taba.mc) ";
		$sql .= "LEFT JOIN (SELECT bankcode AS bc,bankname FROM ".$dbprefix."bank) AS tbbank ON (taba.bcode=tbbank.bc) ";
		$sql .= " group by ".$dbprefix."bmbonus.rcode,".$dbprefix."bmbonus.mcode ";
		$sql .= "HAVING sum(total)>0";
		if($ftrcode!=""&&$cmc!=""){
			$sql .= " AND rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and ".$dbprefix."bmbonus.mcode='".$cmc."'";
		}else if($ftrcode!=""){
			$sql .= " AND rcode between '".$ftrc[0]."' and '".$ftrc[1]."'";
		}else if($cmc!=""){
			$sql .= " AND ".$dbprefix."bmbonus.mcode='".$cmc."'";
		}
	//	echo $sql;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=4&ftrcode=$ftrcode&fmcode=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("rcode,mcode,name,acno,bankname,tot,tax,totall");
		$rec->setFieldDesc("รอบ,รหัสมาชิก,ชื่อ,เลขบัญชี,ธนาคาร,คอมมิชชัน,ภาษี 5%,สุทธิ");
		$rec->setFieldAlign("center,center,left,center,left,right,right,right");
		$rec->setFieldSpace("10%,10%,15%,10%,15%,15%,10%,15%");//10
		$rec->setSum(true,false,",,,,,true,true,true");
		$rec->setFieldFloatFormat(",,,,,2,2,2");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=5&sub=4">
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