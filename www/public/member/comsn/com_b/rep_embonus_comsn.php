<?
include("rpdialog.php");
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];


rpdialog_m($_GET['sub']);
require("./cls/repGenerator.php");
require("connectmysql.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT a.*,m.name_t,a.mcode as smcode,a.pos_cur,a.mpos ";
		$sql .= " FROM ".$dbprefix."embonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bround b ON a.rcode=b.rcode ";
		$sql .= " WHERE a.mcode = '".$_SESSION["usercode"]."' and b.calc= '1' ";
		if($strfdate !="" and $strtdate !="")$sql .=" and a.fdate >= '$strfdate' and a.tdate <= '$strtdate' ";
		//echo $sql;
		//if($_POST['bonus'] != '' )$sql .= " and a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
 
		//echo $sql;
	 	$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"b.rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page); 
		//$rec->setShowIndex(true);
		$rec->setShowField("fdate,tdate,smcode,name_t,mpos,pos_cur,total");
		$rec->setFieldDesc("".$wording_lan["tab5"]['2_2'].",".$wording_lan["tab5"]['2_3'].",".$wording_lan["tab5"]['1_4'].",".$wording_lan["tab4"]["8_5"].",".$wording_lan["tab1_1_10"].",Qualify,AllSale");
		$rec->setFieldAlign("center,center,center,left,center,center,right,right");
		$rec->setFieldSpace("10%,10%,12%,38%,10%,10%,10%");//10
		$rec->setSum(true,false,",,,,,,true,true,true");
		$rec->setFieldFloatFormat(",,,,,,2,2,2");
		$rec->setFieldLink(",,,,,,index.php?sessiontab=".$sesstab."&sub=3003&fdate=,,");
		
		//$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');

	
 
?>