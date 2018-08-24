<?
include("rpdialog.php");
$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
$posi = $_POST['posi']==""?$_GET['posi']:$_POST['posi']; 
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$type_report = $_POST['type_report']==""?$_GET['type_report']:$_POST['type_report'];
$type_report1 = $_POST['type_report1']==""?$_GET['type_report1']:$_POST['type_report1'];

rpdialog_position($_GET['sub']);

if($strfdate=="" || $strtdate==""){
}else{
//	rpdialog();
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a-->
<?
		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		if ( $vip == 1 ){$where1 = "where mtype2 = 1";$LEFT ='RIGHT'; }
		else {$where1 = "";$LEFT ='LEFT';}

		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT a.id,DATE_FORMAT(a.date_change, '%Y-%m-%d') as date_change,DATE_FORMAT(a.date_update, '%Y-%m-%d') as date_update,a.rcode,a.mcode,m.name_t,a.pos_before,a.pos_after
		,CASE a.type WHEN '1' THEN 'แต่งตั้งตำแหน่ง' ELSE 'ปกติ' END AS vip
		,CASE a.uid WHEN '' THEN 'ระบบ' ELSE a.uid END AS uid		
		FROM ".$dbprefix."calc_poschange a  ";
		$sql .= "LEFT JOIN ".$dbprefix."member m ON (a.mcode=m.mcode) ";

		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$sql .= " WHERE a.date_change>= '$strfdate' and a.date_change<= '$strtdate' and a.mcode='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$sql .= " WHERE a.date_change>= '$strfdate' and a.date_change<= '$strtdate' ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.mcode='".$fmcode."'";
		}
		if($posi != '' )$sql .= "and a.pos_after = '".$posi."'";
		if($type_report == 1 )$sql .= " ";
		if($type_report == 2 )$sql .= " and m.mtype2 = '1' ";
		if($type_report == 3 )$sql .= " and m.bankcode = '52'";
		if($type_report == 4 )$sql .= " and m.bankcode != '52'";
		if($type_report == 5 )$sql .= " and m.bankcode != '52' and m.mtype2 != '1' ";

		if($type_report1 == 1 )$sql .= " and a.type = '1'  ";
		if($type_report1 == 2 )$sql .= " and a.type != '1' or   a.type IS NULL  ";
	
		//exit;
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"id":$_GET['ord']));
		if($_GET['excel']==1){$rec->setLimitPage("ALL");}
		else{$rec->setLimitPage("1000");}
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setFieldLink(",index.php?sessiontab=".$sesstab."&sub=".$_GET["sub"]."&cmc=,");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report&type_report1=$type_report1&posi=$posi");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowIndex(true);
		//$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","ดู");
		$rec->setShowField("date_change,mcode,name_t,pos_before,pos_after,vip,date_change,uid");
		$rec->setFieldDesc("วันที่ปรับตำแหน่ง,รหัสสมาชิก,ชื่อสมาชิก,ตำแหน่งเดิม,ตำแหน่งใหม่,ประเภท,วันที่ทำรายการ,ผู้บันทึก");
		$rec->setFieldAlign("center,center,left,center,center,center,center,center,center,center");
		//$rec->setFieldSpace("8%,8%,25%,9%,9%,8%,8%,8%");//10
		$rec->setFieldFloatFormat("");
		$rec->setSum(true,false,"");

		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","newposition".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","newposition".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		//$rec->setSearch("a.mcode");
		//$rec->setSearchDesc("รหัส");
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	
}	
