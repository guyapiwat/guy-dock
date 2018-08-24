<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "select * from ( SELECT a.pcode, a.pv,a.bv,a.fv, a.price,a.price*b.qty as tot_price,a.pv*b.qty as tot_pv,a.pdesc,b.inv_code, b.qty FROM ".$dbprefix."product a,".$dbprefix."product_invent b
where  a.pcode = b.pcode    ";
$sql .= " UNION ";
$sql .= "SELECT a.pcode, a.pv,a.bv,a.fv, a.price,a.price*b.qty as tot_price,a.pv*b.qty as tot_pv,a.pdesc,b.inv_code, b.qty FROM ".$dbprefix."product_package a,".$dbprefix."product_invent b
where  a.pcode = b.pcode   ) as a where 1=1 ";
//echo $sql;
	if($_GET['state']==1){
		include("product_del.php");
	}else if($_GET['state']==2){
		include("product_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" inv_code,pcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
				if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=6&sub=37");
		$rec->setBackLink($PHP_SELF,"sessiontab=6");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("inv_code,pcode,pdesc,qty,price,pv,tot_price,tot_pv");
		$rec->setFieldDesc("รหัสสาขา,รหัสสินค้า,รายละเอียด,จำนวน,ราคา,pv,รวมราคา,รวม PV");
		$rec->setFieldAlign("center,center,left,right,right,right,right,right,right,right");
		$rec->setFieldSpace("10%,10%,30%,10%,10%,10%,10%,10%,10%,10%");
		$rec->setSearch("pcode,pdesc");
		$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า");
		$rec->setSum(true,false,",,,,,,true,true");
		$rec->setFieldFloatFormat(",,,0,0,0,0,0");
		$rec->setSearch("a.inv_code,pcode,pdesc");
		$rec->setSearchDesc("สาขา,รหัสสินค้า,รายละเอียดสินค้า");
		$rec->setFieldLink(",");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}



?>

