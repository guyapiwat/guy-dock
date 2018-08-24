<?
require("connectmysql.php");
require("./cls/repGenerator.php");

if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
	$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
	$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
	$cmc=$_SESSION["usercode"];
	$ftrcode = $_POST['ftrcode']==""?$_GET['ftrcode']:$_POST['ftrcode'];
if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if (isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="";}

if (strpos($ftrcode,"-")===false){
			//ÃÍºàÃÔèÁµé¹ == ÃÍºÊÔé¹ÊØ´
			$ftrc[0]=$ftrcode;
			$ftrc[1]=$ftrcode;
	}else{
		$ftrc = explode('-',$ftrcode);
	}
if(	$ftrcode != '')$wwhere = " and a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' ";
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT *,a.percer*100 as percer,a.total as total1,a.mcode as mcode1 FROM ".$dbprefix."dc a left join ".$dbprefix."member as m on (a.mcode=m.mcode) ";
			//$sql .= " WHERE tab.sadate = '$strfdate' and a.upa_code='".$fmcode."' and a.mcode = '$cmc'";
			$sql .= " WHERE a.upa_code='".$cmc."' $wwhere  ";
		if($strfdate!=""){
			$sql .= " and a.fdate >= '".$strfdate."' and  a.tdate <= '".$strtdate."' ";
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
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=3&ftrcode=$ftrcode&fmcode=$cmc&strfdate=$strfdate&strtdate=$strtdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("fdate,mcode1,name_t,pv,percer,level,gen,total1");
		$rec->setFieldDesc("".$wording_lan["cdate"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["PV"].",%".$wording_lan["percer"].",Level,Gen,".$wording_lan["Bonus"]."");
		$rec->setFieldAlign("center,center,left,right,center,center,center,right");
		$rec->setFieldFloatFormat(",,,2,0,,,2");
		$rec->setSum(true,false,",,,true,,,,true");

		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>