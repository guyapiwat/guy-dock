<? include("./global.php");?>
<? include("rpdialog.php");?>

<?
rpdialog_m(71);
$strfdate1 = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate1 = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];


require("connectmysql.php");
require("./cls/repGenerator_b.php");

if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}
if (isset($_GET["ftrcode"])){$fdate=$_GET["ftrcode"];}else{$fdate="";}

 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		
		$sql = "SELECT a.pos_cur,a.fdate as fdate,a.tdate as tdate,a.rcode, a.mcode as mcode,m.name_t,m.acc_no,m.bankcode,b.bankname,a.total*1 as total,a.tax*1 as tax,a.bonus*1 as bonus,1";
		$sql .= " FROM ".$dbprefix."dmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";

		
 		
		if($cmc!=""){
			$sql .= " WHERE a.mcode='".$cmc."'";
		}

		if($strfdate1!=""){
			$sql .= " and a.fdate >= '".$strfdate1."' and a.tdate <= '".$strtdate1."' ";
		}


		//echo "$sql<BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" fdate ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=7&ftrcode=$ftrcode&fmcode=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("fdate,mcode,name_t,acc_no,bankname,total,adjust");
		//$rec->setFieldDesc("".$wording_lan["sdate"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["acc_no"].",".$wording_lan["acc_type"].",".$wording_lan["commission"].",".$wording_lan["adjust"]."");
		$rec->setShowField("rcode,fdate,tdate,mcode,name_t,pos_cur,total");
		$rec->setFieldDesc("".$wording_lan["rcode"].",".$wording_lan["tab5"]['2_2'].",".$wording_lan["tab5"]['2_3'].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["position"].",".$wording_lan["commission"]."");
		$rec->setFieldAlign("center,center,center,center,left,center,right");
		$rec->setFieldSpace("8%,8%,8%,10%,45%,10%,10%");//10
		$rec->setSum(true,false,",,,,,,true");
		$rec->setFieldFloatFormat(",,,,,,2");
		$rec->setFieldLink(",,,,,,index.php?sessiontab=5&sub=72&ftrcode=,,");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

?>

