<?
$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];

rpdialog_m($_GET['sub']);

require("connectmysql.php");

		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT DATE_FORMAT(a.fdate, '%Y-%m-%d') as fdate,DATE_FORMAT(a.tdate, '%Y-%m-%d') as tdate,a.rcode, a.mcode,iv.inv_desc,lb.cshort,a.total,a.tax as tax,a.bonus as bonus,a.pos_cur ";
		$sql.=",CASE iv.type WHEN '0' THEN 'Member' WHEN '1' THEN 'Mobile' WHEN '2' THEN 'Center' WHEN '3' THEN 'Hub' END as type ";
		$sql .= " FROM ".$dbprefix."fmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."invent iv ON a.mcode=iv.inv_code ";
		$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON a.locationbase=lb.cid WHERE mcode='".$_SESSION["admininvent"]."' ";

		if($strfdate != '' and $strtdate != '')$sql .= " and a.fdate >= '$strfdate' and a.tdate <= '$strtdate'";

 
		//echo $sql;
	 	$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"a.mcode,rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&strfdate=$strfdate&strtdate=$strtdate&strfdate=$strfdate&strtdate=$strtdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("fdate,tdate,mcode,inv_desc,type,total,tax,bonus");
		$rec->setFieldDesc("ตั้งแต่วันที่,ถึงวันที่,รหัสมาชิก,ชื่อ,ประเภท,Total,ภาษี,สุทธิ");
		$rec->setFieldAlign("center,center,center,left,center,right,right,right,right,right");
		$rec->setFieldSpace("10%,10%,12%,30%,10%,10%,10%,10%,8%,8%");//10
		$rec->setSum(true,false,",,,,,true,true,true,true,true");
		$rec->setFieldFloatFormat(",,,,,2,2,2,2,2,");
		$rec->setFieldLink(",,,,,index.php?sessiontab=4&sub=66&strfdate=,,,,,,");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","embonus".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","embonus".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("a.mcode,lb.cshort");
		$rec->setSearchDesc("รหัส,LB");
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

 
?>