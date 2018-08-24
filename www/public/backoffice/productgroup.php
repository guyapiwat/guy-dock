<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT * FROM ".$dbprefix."productgroup ";
	if($_GET['state']==1){
		include("productgroup_del.php");
	}else if($_GET['state']==2){
		include("productgroup_editadd.php");
	}else if($_GET['state']==3){
		include("productgroupoperate.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("left");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("groupname");
		//$rec->setFieldFloatFormat(",,,,,,0,2");
		$rec->setFieldDesc("หมวดหมู่สินค้า");
		$rec->setFieldAlign("center");
		$rec->setFieldSpace("100%");
		$rec->setFieldLink(",index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&cmc=,");
		$rec->setSearch("groupname");
		$rec->setSearchDesc("หมวดหมู่สินค้า");
		//$rec->setSum(true,false,",,,,,,true,true");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=1","post","delfield");
		}
		if($acc->isAccess(2))
			$rec->setEdit("index.php","id","id","sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>