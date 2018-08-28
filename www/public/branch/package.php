<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT a.pcode,a.pv,a.bv,a.fv,a.price,a.pdesc,a.price,b.qty FROM ".$dbprefix."product_package a,".$dbprefix."product_invent b
where  a.pcode = b.pcode and b.inv_code = '".$_SESSION['inv_ref']."' and b.qty > 0";
	if($_GET['state']==1){
		include("product_del.php");
	}else if($_GET['state']==2){
		include("product_editadd.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=1");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("pcode,pdesc,qty,price,pv");
		$rec->setFieldDesc("รหัสสินค้า,รายละเอียด,จำนวน,ราคา,pv");
		$rec->setFieldAlign("center,left,right,right,right,right,right");
		$rec->setFieldSpace("10%,60%,10%,10%,10%,10%,10%");
		$rec->setSearch("pcode,pdesc");
		$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า");
		$rec->setSum(true,false,",,true,true,true");
		$rec->setFieldFloatFormat(",,0,0,0");

		$rec->setFieldLink(",");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>