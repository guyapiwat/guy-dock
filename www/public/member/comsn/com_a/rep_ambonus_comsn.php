<? include("./global.php");?>
<? include("rpdialog.php");?>

<?
rpdialog_m(6);
$strfdate1 = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate1 = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];

require("connectmysql.php");
require("./cls/repGenerator.php");
if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}
if (isset($_GET["ftrcode"])){$fdate=$_GET["ftrcode"];}else{$fdate="";}

 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		
		$sql = "SELECT a.tot_pv, a.fdate as fdate, a.tdate as tdate,a.rcode, a.mcode as mcode,m.name_t,m.acc_no,m.bankcode,b.bankname,a.total,a.tax,a.bonus ";
		$sql .= " FROM ".$dbprefix."ambonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";
		$sql .= " LEFT JOIN ".$dbprefix."around ar ON a.rcode=ar.rcode ";
 		if($cmc!=""){
			$sql .= " WHERE a.mcode='".$cmc."' and ar.calc=1";
		}
			
		if($strfdate1!=""){
			$sql .= " and a.fdate >= '".$strfdate1."' and a.tdate <= '".$strtdate1."' ";
		}

		//echo "$sql<BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" rcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=5&ftrcode=$ftrcode&fmcode=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("fdate,mcode,name_t,total");
		$rec->setFieldDesc("".$wording_lan["Date"].",".$wording_lan["login_3"].",".$wording_lan["tab4"]["8_5"].",".$wording_lan["tab5"]['3_14']."");
		$rec->setFieldAlign("center,center,left,right");
		//$rec->setFieldSpace("3%,8%,8%,10%,15%");//10
		$rec->setSum(true,false,",,,true");
		$rec->setFieldFloatFormat(",,,2");
		$rec->setFieldLink(",,,index.php?sessiontab=5&sub=1&fdate");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

?>

