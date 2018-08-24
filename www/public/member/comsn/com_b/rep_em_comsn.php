<? include("./global.php");?>
<?

$strfdate1 = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate1 = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
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

		$sql = "SELECT a.rcode,a.fdate,a.tdate,a.total1,a.total2,a.total3,a.total4,a.total5,a.pos_cur,m.name_t,a.mcode ";
		$sql .= " FROM ".$dbprefix."em a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		

		$sql .= " WHERE a.mcode='".$_SESSION['usercode']."' $wwhere ";
		if($strfdate1 != '' and $strtdate1 != '' ){$sql .= " and a.fdate >= '$strfdate1' and a.tdate <= '$strtdate1'";}
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
	$rec->setLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&ftrcode=$ftrcode&fmcode=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,fdate,tdate,total1,total2,total3,total4,total5");
		$rec->setFieldDesc("ÃÍº,µÑé§áµèÇÑ¹·Õè,¶Ö§ÇÑ¹·Õè,¡Í§·Ø¹PE,¡Í§·Ø¹SE,¡Í§·Ø¹EE,¡Í§·Ø¹DE,¡Í§·Ø¹CE");
		$rec->setFieldAlign("center,center,center,right,right,right,right,right");
	//	$rec->setFieldSpace("5%,8%,8%,10%,30%,10%,10%,10%,10%");//10
	//	$rec->setSum(true,false,",,,,,true,true,true,true");
		$rec->setFieldFloatFormat(",,,2,2,2,2,2");

		$rec->setShowMobile(true,"true,false,false,true,true,true");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>