<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
	$sql = "SELECT * FROM ".$dbprefix."webcfg";
	//echo "$sql<BR>";
	if($_GET['state']==1){
		include("web_cfg_del.php");
	}else if($_GET['state']==2){
		include("web_cfg_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=7");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("web_cfg");
		//$rec->setFieldFloatFormat(",,,,,,0,2");
		$rec->setFieldDesc("ชื่อเว็บไซต์");
		$rec->setFieldAlign("left");
		$rec->setFieldSpace("100%");
		$rec->setFieldLink(",index.php?sessiontab=5&sub=7&cmc=,");
		//$rec->setSearch("web_cfg");
		//$rec->setSearchDesc("ชื่อเว็บไซต์");
		//$rec->setSum(true,false,",,,,,,true,true");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","bankcode","bankcode","sessiontab=5&sub=3");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=5&sub=3&state=1","post","delfield");
		}
		if($acc->isAccess(2))
			$rec->setEdit("index.php","web_cfg","web_cfg","sessiontab=5&sub=3");*/
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>