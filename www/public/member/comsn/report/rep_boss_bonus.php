<? include("./global.php");?>
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
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a-->
<!--<form method="post"><input size="14" type="text" name="strfdate" id="strfdate" value="<?=$strfdate?>" />
	<a href="javascript:NewCal('strfdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="เลือกวันที่" /></a>  ถึง
	<input size="14" type="text" name="strtdate" id="strtdate" value="<?=$strtdate?>" />
	<a href="javascript:NewCal('strtdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="เลือกวันที่" /></a><input type="submit" value="ค้น" /></form>

-->


<?
		
		require("connectmysql.php");
		require("./cls/repGenerator_b.php");
		//require("./cls/repGenerator.php");
		/*if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' and m.mcode='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$whereclass = " AND m.mcode='".$fmcode."'";
		}*/
		if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
		if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
		if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
		if ($cmc=="") {$cmc=$smc;}
		if ($cmc=="") {
			$cmc=$_SESSION["usercode"];
		}
		$sql = "SELECT DATE_FORMAT(a.fdate, '%d-%m-%Y') as fdate,a.rcode, a.mcode,m.name_t,a.total as total,a.tax as tax,a.bonus as bonus ";
		$sql .= " FROM ".$dbprefix."fmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		//$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";

		if($strfdate!=""&&$fmcode!=""){
			$sql .= " WHERE a.fdate between ".$strfdate." and  ".$strtdate."  and a.mcode='".$fmcode."'";
		}else if($strfdate!=""){
			$sql .= " WHERE a.fdate between '".$strfdate."' and  '".$strtdate."' ";
		}else if($smc!=""){
			$sql .= " WHERE a.mcode='".$smc."'";
		}
		//echo $sql;
		//exit;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=42&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("fdate,mcode,name_t,total,tax,bonus");
		$rec->setFieldDesc("วันที่,รหัสมาชิก,ชื่อ,โบนัส,ภาษี (5%),สุทธิ");
		$rec->setFieldAlign("center,center,left,right,right,right,right,right");
		$rec->setFieldSpace("10%,10%,50%,10%,10%,10%");//10
		$rec->setSum(true,false,",,,true,true,true,true,true");
		$rec->setFieldFloatFormat(",,,,,2,2,2");
		$rec->setFieldLink("");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","fmbonus".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","fmbonus".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
	//	$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
	//	$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		//$rec->setSearch("a.mcode");
		///$rec->setSearchDesc("รหัส");
	//	$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	
?>