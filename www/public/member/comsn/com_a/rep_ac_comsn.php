<? include("./global.php");?>
<?
$strfdate1 = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate1 = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if (isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="";}
//rpdialog_m($sub);
require("connectmysql.php");
require("./cls/repGenerator.php");

if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_GET["fdate"])){$fdate=$_GET["fdate"];}else{$fdate="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
 
	$cmc=$_SESSION["usercode"];

	$ftrcode = $_POST['ftrcode']==""?$_GET['ftrcode']:$_POST['ftrcode'];

if (strpos($ftrcode,"-")===false){
			//ÃÍºàÃÔèÁµé¹ == ÃÍºÊÔé¹ÊØ´
			$ftrc[0]=$ftrcode;
			$ftrc[1]=$ftrcode;
	}else{
		$ftrc = explode('-',$ftrcode);
	}
	if(	$ftrcode != '')$wwhere = " and a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' ";

	if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

	$sql = "SELECT a.fdate,a.tdate,a.upa_code as sp_code,a.pv,a.gen,a.percer*100 as percer,ar.rcode,a.total as total1, a.mcode as mcode1,m.name_t as name FROM ".$dbprefix."ac a left join ".$dbprefix."member as m on (a.mcode=m.mcode) ";
	$sql .= " LEFT JOIN ".$dbprefix."around ar ON a.rcode=ar.rcode ";

	 
	$sql .= " WHERE a.upa_code='".$cmc."' $wwhere  and ar.calc='1' ";

	if($strfdate1!=""){
		$sql .= " and a.fdate >= '".$strfdate1."' and a.tdate <= '".$strtdate1."' ";
	}
//echo $sql;
	$rec = new repGenerator();
	$rec->setQuery($sql);
	$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
	$rec->setOrder($_GET['ord']==""?" a.fdate ":$_GET['ord']);
	$rec->setLimitPage($_GET['lp']);
	$rec->setSize("95%","");
	$rec->setAlign("center");
	$rec->setPageLinkAlign("right");
	//$rec->setPageLinkShow(false,false);
	$rec->setLink($PHP_SELF,"sessiontab=$tab&sub=$sub&ftrcode=$ftrcode&fmcode=$cmc&cmc=$cmc");
	$rec->setBackLink($PHP_SELF,"sessiontab=$tab");
	if(isset($page))
		$rec->setCurPage($page);
	$rec->setShowField("fdate,mcode1,name,pv,gen,percer,total1");
	$rec->setFieldDesc($wording_lan["cdate"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["PV"].",".$wording_lan["lv"].",%".$wording_lan["Bonus"].",".$wording_lan["Bonus"]."");
	$rec->setFieldAlign("center,center,left,right,center,center,right");
	//$rec->setFieldSpace("5%,9%,9%,9%,25%,9%,9%,3%,9%,9%,9%,10%");//10
	$rec->setFieldFloatFormat(",,,2,0,0,2");
	$rec->setSum(true,false,",,,true,,,true");
	$rec->showRec(1,'SH_QUERY');
	mysql_close($link);
?>