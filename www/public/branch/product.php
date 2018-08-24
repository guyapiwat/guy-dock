<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT a.pcode,a.pv,a.bv,a.fv,a.price,a.price*b.qty as tot_price,a.pv*b.qty as tot_pv,a.pdesc,a.price,b.qty,b.qtyr FROM ".$dbprefix."product a,".$dbprefix."product_invent b
where  a.pcode = b.pcode and b.inv_code = '".$_SESSION['inv_ref']."' ";
	if($_GET['state']==1){
		include("product_del.php");
	}else if($_GET['state']==2){
		include("product_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" a.pcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		if(isset($_POST['skey']))
	$rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))
	$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=111");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("pcode,pdesc,qty,price,pv,tot_price,tot_pv");
		$rec->setFieldDesc("".$wording_lan["pcode"].",".$wording_lan["pcode"].",จำนวนคงเหลือ,".$wording_lan["price"].",PV,ราคารวมทั้งหมด,".$wording_lan["PV"]."");
		$rec->setFieldAlign("center,left,right,right,right,right,right");
		$rec->setFieldSpace("10%,40%,10%,10%,10%,10%,10%,10%,10%");
	//	$rec->setSearch("pcode,pdesc");
	//	$rec->setSearchDesc("".$wording_lan["pcode"].",".$wording_lan["pdesc"]."");
		$rec->setSum(true,false,",,,,,true,true");
		$rec->setFieldFloatFormat(",,,,");

		$rec->setFieldLink(",");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>