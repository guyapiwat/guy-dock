<?
require("connectmysql.php");
//require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT inv_code,inv_desc,bill_ref,CONCAT(discount,'%') as discount";
$sql.=",CASE locationbase WHEN 1 THEN 'TH' ELSE '' END AS loca,ewallet,".$dbprefix."location_base.cname, ";
$sql .= "address AS address ";
$sql .= ",CASE ".$dbprefix."invent.type WHEN '0' THEN 'Member' WHEN '1' THEN 'Mobile' WHEN '2' THEN 'Center' WHEN '3' THEN 'Hub' END as type ";
$sql .= " FROM ".$dbprefix."invent ";
$sql .= "LEFT JOIN district ON (".$dbprefix."invent.districtId=district.districtId) ";
$sql .= "LEFT JOIN amphur ON (".$dbprefix."invent.amphurId=amphur.amphurId) ";
$sql .= "LEFT JOIN province ON (".$dbprefix."invent.provinceId=province.provinceId) ";
$sql .= "LEFT JOIN ".$dbprefix."location_base ON (".$dbprefix."location_base.cid=".$dbprefix."invent.locationbase) ";

//$wherecause = " WHERE ";
	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	//echo $sql;
	if($_GET['state']==1){
		include("invent_del.php");
	}else if($_GET['state']==2){
		include("invent_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" ".$dbprefix."invent.locationbase,inv_type,".$dbprefix."invent.inv_code ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);

		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);

		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=2");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("inv_code,inv_desc,address,loca,bill_ref");
		$rec->setFieldDesc("รหัส,ชื่อ,ที่ตั้ง,locationbase,หัวบิล");
		$rec->setFieldAlign("center,left,left,center,center,center");
	//	$rec->setFieldSpace("10%,10%,10%,40%,10%,10%");
		$rec->setFieldLink("");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","inv_code","inv_code","sessiontab=5&sub=2");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=5&sub=2&state=1","post","delfield");
		}
		if($acc->isAccess(2))
			$rec->setEdit("index.php","inv_code","inv_code","sessiontab=5&sub=2");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","invent".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","invent".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$rec->setSearch("inv_code,inv_desc");
		$rec->setSearchDesc("รหัสสาขา,ชื่อสาขา");		
		$rec->setFieldFloatFormat(",,");
		$rec->setSum(true,false,",,,,");
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>