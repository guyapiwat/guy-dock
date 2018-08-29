<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT * FROM ".$dbprefix."product_package1  ";
	if($_GET['state']==1){
		include("ppackage_del.php");
	}else if($_GET['state']==2){
		include("ppackage_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
				if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);

		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=6&sub=12");
		$rec->setBackLink($PHP_SELF,"sessiontab=6");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("package,pcode,pdesc,qty");
		$rec->setFieldDesc("รหัส package,รหัสสินค้า,รายละเอียด,จำนวน");
		$rec->setFieldAlign("center,center,center,center,right,right,right");
		 $rec->setFieldSpace("10%,10%,80%,10%");
		$rec->setSearch("package,pcode,pdesc");
		$rec->setSearchDesc("รหัส&nbsp;package,รหัสสินค้า,รายละเอียดสินค้า");

		$rec->setFieldLink(",");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=6&sub=12");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=6&sub=12&state=1","post","delfield");
		}
		/*if($acc->isAccess(2))
			$rec->setEdit("index.php","package","package","sessiontab=6&sub=11");*/
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>