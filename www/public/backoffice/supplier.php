<?
require("connectmysql.php");
//require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT sup_code,sup_desc, ";
$sql .= "address ";
$sql .= "FROM ".$dbprefix."supplier ";
$sql .= "LEFT JOIN district ON (".$dbprefix."supplier.districtId=district.districtId) ";
$sql .= "LEFT JOIN amphur ON (".$dbprefix."supplier.amphurId=amphur.amphurId) ";
$sql .= "LEFT JOIN province ON (".$dbprefix."supplier.provinceId=province.provinceId) ";
//$wherecause = " WHERE ";
//echo $sql;

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("supplier_del.php");
	}else if($_GET['state']==2){
		include("supplier_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort((isset($_GET['srt'])==true?$_GET['srt']:"DOWN"));
		$rec->setOrder((isset($_GET['ord'])==true?$_GET['ord']:"sup_code"));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=9");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sup_code,sup_desc,address");
		$rec->setFieldDesc("รหัส,ชื่อ,ที่ตั้ง");
		$rec->setFieldAlign("center,left,left,center");
		$rec->setFieldSpace("5%,45%,50%");
		$rec->setFieldLink("");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","sup_code","sup_code","sessiontab=5&sub=9");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=5&sub=9&state=1","post","delfield");
		}
		if($acc->isAccess(2))
			$rec->setEdit("index.php","sup_code","sup_code","sessiontab=5&sub=9");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","supplier".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","supplier".date("Ymd").".xls")."' >";
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