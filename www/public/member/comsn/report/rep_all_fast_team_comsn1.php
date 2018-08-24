<? include("./global.php");?>
<? include("rpdialog.php");?>

<?
	rpdialog_m(103); // sub	
	$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
	$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	require("connectmysql.php");
		require("./cls/repGenerator.php");
		if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
		if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
		if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
		if ($cmc=="") {$cmc=$smc;}
		if ($cmc=="") {
			$cmc=$_SESSION["usercode"];
		}
		$sql = "select * from (select r.rcode,m.fdate,m.ambonus,m.bmbonus,m.dmbonus,m.fmbonus,m.ato,m.total+m.ato as alltotal ,m.total+m.ato-m.ato as alltotal2 ";
		$sql .= " from ".$dbprefix."commission m
		left join ".$dbprefix."around r on (m.rcode = r.rcode)
		";
		$sql .= " WHERE m.mcode='".$cmc."' and r.calc = '1' and  r.calc='1' ";
		if($strfdate!=""){
			$sql .= " and r.fdate >= '".$strfdate."' and r.tdate <= '".$strtdate."' ";
		}
		$sql .= " ) as a ";
		
 		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" a.rcode ":$_GET['ord']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setLimitPage("200");
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=103&ftrcode=$ftrcode&fmcode=$fmcode&strfdate=$strfdate&strtdate=$strtdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(empty($_GET["pg"]))$page = 1;
		else $page = $_GET["pg"];
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("fdate,ambonus,bmbonus,alltotal,ato,alltotal2");
		$rec->setFieldFloatFormat(",2,2,2,2,2");
		$rec->setFieldDesc($wording_lan["cdate"].",Fast Start,W/S,Total,Autoship,Bonus");	
		$rec->setFieldAlign("center,right,right,right,right,right");
		
		$rec->setSum(true,false,",true,true,true,true,true");

		$rec->setShowMobile(true,"true,false,false,true,true");

 		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>