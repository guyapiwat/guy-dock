<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT * FROM ".$dbprefix."bank";
	if($_GET['state']==1){
		include("bank_del.php");
	}else if($_GET['state']==2){
		include("bank_editadd.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=3");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("bankname,code");
		//$rec->setFieldFloatFormat(",,,,,,0,2");
		$rec->setFieldDesc("ชื่อธนาคาร,code");
		$rec->setFieldAlign("center");
		$rec->setFieldSpace("90%,10%");
		//$rec->setFieldLink(",index.php?sessiontab=5&sub=3&cmc=,");
		$rec->setSearch("bankname");
		$rec->setSearchDesc("ชื่อ");
		//$rec->setSum(true,false,",,,,,,true,true");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","bankcode","bankcode","sessiontab=5&sub=3");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=5&sub=3&state=1","post","delfield");
		}
		if($acc->isAccess(2))$rec->setEdit("index.php","bankcode","bankcode","sessiontab=5&sub=3");


		if($_GET['excel']==1){
	
			$rec->exportXls("ExportXls","bank".date("Ymd").$_SESSION["inv_usercode"].".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","bank".date("Ymd").$_SESSION["inv_usercode"].".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
	
		$rec->setSpace($str);


		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>