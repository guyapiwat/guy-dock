<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT *  ";
$sql .= ",CASE ".$dbprefix."product_package.sa_type WHEN 'A' THEN '".$wording_lan['satype']['A']."' WHEN 'B' THEN '".$wording_lan['satype']['B']."' WHEN 'C' THEN '".$wording_lan['satype']['C']."' WHEN 'Q' THEN '".$wording_lan['satype']['Q']."' WHEN 'H' THEN '".$wording_lan['satype']['H']."'   END AS preserve ";
$sql .=" FROM ".$dbprefix."product_package  left join ".$dbprefix."location_base on (".$dbprefix."product_package.locationbase = ".$dbprefix."location_base.cid)  ";  

	if($_GET['state']==1){
		include("package_del.php");
	}else if($_GET['state']==2){
		include("package_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" ".$dbprefix."location_base.cid,".$dbprefix."product_package.pcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=6&sub=11");
		$rec->setBackLink($PHP_SELF,"sessiontab=6");
		if(isset($page))
			$rec->setCurPage($page);
			$rec->setFieldFloatFormat(",,,2,2,2,");
		$rec->setShowField("pcode,pdesc,unit,qty,customer_price,price,pv,vat");
		$rec->setFieldDesc("รหัสสินค้า,รายละเอียด,หน่วย,จำนวน,ราคาขายปลีก,ราคาสมาชิก,pv,Vat");
		$rec->setFieldAlign("center,left,center,center,right,right,right,right,right,center,center");
	//	$rec->setFieldSpace("8%,40%,9%,5%,9%,9%,9%,9%,9%,9%,9%");
		$rec->setSearch("pcode,pdesc");
		$rec->setSearchDesc("รหัส package,รายละเอียด");

		$rec->setFieldLink(",");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","pcode","pcode","sessiontab=6&sub=11");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=6&sub=11&state=1","post","delfield");
		}
		if($acc->isAccess(2))
			$rec->setEdit("index.php","pcode","pcode","sessiontab=6&sub=11");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>