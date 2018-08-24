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
	echo "--".$ftrcode;
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
		if($ftrcode!="" && $_POST['fmcode']!=""){
			$wheresql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and mcode='".$_POST['fmcode']."'";
		}else if($ftrcode!=""){
			$wheresql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'";
		}else if($_POST['fmcode']!=""){
			$wheresql .= " WHERE mcode='".$_POST['fmcode']."'";
		}
		echo $wheresql."<br>";
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT DISTINCT(pendura_member.mcode) AS scode,IFNULL(taba.rcode,0) AS r,name_t,IFNULL(taba.tsum,0) AS a,IFNULL(tabb.tsum,0) AS b,IFNULL(tabc.tsum,0) AS c,IFNULL(tabd.tsum,0) AS d, ";
		$sql .= "(IFNULL(taba.tsum,0)+IFNULL(tabb.tsum,0)+IFNULL(tabc.tsum,0)+IFNULL(tabd.tsum,0)) AS asum ";
		$sql .= "FROM pendura_member ";
		$sql .= "LEFT JOIN (SELECT mcode,rcode,SUM(total) AS tsum FROM pendura_ambonus ";
		$sql .= $wheresql." GROUP BY mcode,rcode) AS taba ON (pendura_member.mcode=taba.mcode) ";
		$sql .= "LEFT JOIN (SELECT mcode,rcode,SUM(total) AS tsum FROM pendura_bmbonus ";
		$sql .= $wheresql." GROUP BY mcode,rcode) AS tabb ON (pendura_member.mcode=tabb.mcode AND taba.rcode=tabb.mcode) ";
		$sql .= "LEFT JOIN (SELECT mcode,rcode,SUM(total) AS tsum FROM pendura_cmbonus ";
		$sql .= $wheresql." GROUP BY mcode,rcode) AS tabc ON (pendura_member.mcode=tabc.mcode AND taba.rcode=tabc.mcode) ";
		$sql .= "LEFT JOIN (SELECT mcode,rcode,SUM(total) AS tsum FROM pendura_dmbonus "; 
		$sql .= $wheresql." GROUP BY mcode,rcode) AS tabd ON (pendura_member.mcode=tabd.mcode AND taba.rcode=tabd.mcode) ";
		$sql .= "WHERE (IFNULL(taba.tsum,0)+IFNULL(tabb.tsum,0)+IFNULL(tabc.tsum,0)+IFNULL(tabd.tsum,0))!='0'";
		echo $sql."<br />";
		?><br /><?
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=12&ftrcode=$ftrcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("scode,name_t,r,a,b,c,d,asum");
		$rec->setFieldDesc("รหัสมาชิก,ชื่อสมาชิก,รอบ,แผน a,แผน b,แผน c,แผน d,รวม");
		$rec->setFieldAlign("center,left,right,right,right,right,right,right");
		$rec->setFieldSpace("15%,25%,5%,10%,10%,10%,10%,15%");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=12">
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