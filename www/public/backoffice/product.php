<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT *";
$sql .= "";
$sql .= "FROM ".$dbprefix."product left join ".$dbprefix."location_base on (".$dbprefix."product.locationbase = ".$dbprefix."location_base.cid) ";
$sql .= " left join ".$dbprefix."productgroup on (".$dbprefix."product.group_id = ".$dbprefix."productgroup.id) ";

	if($_GET['state']==1){
		include("product_del.php");
	}else if($_GET['state']==2){
		include("product_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" ".$dbprefix."location_base.cid,".$dbprefix."product.pcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=6&sub=1");
		$rec->setBackLink($PHP_SELF,"sessiontab=6");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("pcode,pdesc,groupname,unit,qty,customer_price,price,pv,vat");
		$rec->setFieldDesc("รหัสสินค้า,รายละเอียด,หมวดสินค้า,หน่วย,จำนวน,ราคาขายปลีก,ราคาสมาชิก,pv,Vat");
		$rec->setFieldAlign("center,left,center,center,center,right,right,right,right,right,center,center,center");
	//	$rec->setFieldSpace("8%,40%,9%,5%,9%,9%,9%,9%,9%,9%,9%");
		$rec->setSearch("pcode,pdesc,groupname");
		$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,หมวดสินค้า");
		$rec->setFieldFloatFormat(",,,,0,2,2,2,0,");

		$rec->setFieldLink(",");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","pcode","pcode","sessiontab=6&sub=1");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=6&sub=1&state=1","post","delfield");
		}
		if($acc->isAccess(2))
			$rec->setEdit("index.php","pcode","pcode","sessiontab=6&sub=1");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>