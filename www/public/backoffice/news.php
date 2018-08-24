<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT *,CASE WHEN status = 'Y'  THEN 'Yes' ELSE 'No' END as status,CASE WHEN popup = 'Y'  THEN 'Yes' ELSE 'No' END as popup FROM ".$dbprefix."news";
	if($_GET['state']==1){
		include("news_del.php");
	}else if($_GET['state']==2){
		include("news_editadd.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=20");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("head,dates,status,popup");
		//$rec->setFieldFloatFormat(",,,,,,0,2");
		$rec->setFieldDesc("ชื่อเรื่อง,วันที่ประกาศ,show,popup");
		$rec->setFieldAlign("left,center,center,center,");
		//$rec->setFieldSpace("85%,10%,5%");
		//$rec->setFieldLink(",index.php?sessiontab=5&sub=20&cmc=,");
		//$rec->setSearch("ชื่อเรื่อง");
		//$rec->setSearchDesc("ชื่อ");
		//$rec->setSum(true,false,",,,,,,true,true");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=5&sub=20");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=5&sub=20&state=1","post","delfield");
		}
		if($acc->isAccess(2))
			$rec->setEdit("index.php","id","id","sessiontab=5&sub=20");
		

		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>