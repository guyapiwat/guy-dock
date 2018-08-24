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
	$strtdate = $strfdate;
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	$cmc = $_POST['cmc']==""?$_GET['cmc']:$_POST['cmc'];
	//echo "ss $strfdate :   $strtdate<br>";
if($strfdate=="" || $strtdate==""){
	//rpdialog();
}else{
	if($strfdate>$strtdate){
		?><table width="100%" border="1">
  <tr align="center">
    <td><FONT COLOR="#ff0000">วันที่เริ่มต้น ต้องน้อยกว่าหรือเท่ากับ วันที่สิ้นสุด กรุณาระุบุวันที่ใหม่</FONT></td>
  </tr>
</table>
<?
		//rpdialog();
		exit;
	}else{
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a-->
<?
		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		
		$sql = "SELECT DATE_FORMAT(a.fdate, '%d-%m-%Y') as fdate,a.gen as level,a.rcode,a.mcode,a.upa_code,a.gen,a.pv,a.percer,a.total,taba.name_t,tabb.upa_name ";
		$sql .= "FROM ".$dbprefix."rc a ";
		//$sql .= "LEFT JOIN ".$dbprefix."member m ON c.mcode=m.mcode ";
		$sql .= " LEFT JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member) AS taba ON (a.mcode=taba.mca)";
		$sql .= " LEFT JOIN (SELECT mcode AS mcb,name_t AS upa_name FROM ".$dbprefix."member) AS tabb ON (a.upa_code=tabb.mcb)";
		
 		if($fmcode!=""){
			$sql .= " WHERE a.upa_code='".$fmcode."'";
		}
		if($strfdate!=""){
			$sql .= "  and  a.fdate='".$strfdate."'";
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
		$rec->setLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']);
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","ดู");
		$rec->setShowField("rcode,mcode,name_t,level,gen,pv,percer,total");
		$rec->setFieldDesc("รหัสรอบ,รหัสสมาชิก,ชื่อสมาชิก,ชั้นที่,Gen,คะแนน,%โบนัส,ได้โบนัส");
		$rec->setFieldAlign("center,center,left,center,center,right,center,right");
		$rec->setFieldSpace("5%,8%,39%,5%,5%,15%,8%,15%");//10
		$rec->setFieldFloatFormat(",,,,,,2,2");
		$rec->setSum(true,false,",,,,,,,true");
		$rec->setFieldLink("");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		//$rec->setSearch("a.mcode");
		//$rec->setSearchDesc("รหัส");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

	}
}	
