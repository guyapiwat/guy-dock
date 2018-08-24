<? include("./global.php");?>
<?

$strfdate1 = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate1 = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];

require("connectmysql.php");
require("./cls/repGenerator.php");

if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_GET["ftrcode"])){$ftrcode=$_GET["ftrcode"];}else{$ftrcode="";}
if (isset($_GET["fdate"])){$fdate=$_GET["fdate"];}else{$fdate="";}

 $cmc=$_SESSION["usercode"];

if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if (isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="";}


 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

	$sql = "SELECT *,a.percer*100 as percer,a.total as total1,a.mcode as mcode1,a.upa_code as ui FROM ".$dbprefix."fc a left join ".$dbprefix."member as m on (a.mcode=m.mcode) ";
		$sql .= " WHERE a.upa_code='".$cmc."' ";
		if($strfdate1!=""){
			$sql .= " and a.fdate >= '".$strfdate1."' and a.tdate <= '".$strtdate1."' ";
		}

		if($ftrcode!=""){
			$sql .= " and a.rcode = '$ftrcode' ";
		}

	 
		//echo $sql;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" fdate ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=$tab&sub=$sub&ftrcode=$ftrcode&strfdate=$strfdate1&strtdate=$strtdate1&fmcode=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=$tab");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("fdate,mcode1,name_t,pv,percer,total1");
	//	$rec->setFieldDesc("".$wording_lan["rcode"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["sp_code"].",".$wording_lan["PV"].",".$wording_lan["Amount"].",".$wording_lan["uid"].",".$wording_lan["type"]."");
		$rec->setFieldDesc($wording_lan["cdate"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["PV"].",%".$wording_lan["Bonus"].",âº¹ÑÊ");
		$rec->setFieldAlign("center,center,left,right,center,right,right");
		//$rec->setFieldSpace("5%,9%,9%,9%,25%,15%,15%,15%,15%");//10
		$rec->setFieldFloatFormat(",,,2,0,2");
		$rec->setSum(true,false,",,,true,,true");

		//$rec->setFieldLink(",,,,index.php?sessiontab=5&sub=54&ftrcode=");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","¾ÔÁ¾ì");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>