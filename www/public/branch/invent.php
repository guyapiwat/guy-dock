<?
require("connectmysql.php");
//require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT inv_code,inv_desc,CASE inv_type WHEN '1' THEN 'ศูนย์' WHEN '2' THEN 'โมบาย' END AS inv_type, ";
$sql .= "CONCAT(address,' ต.',districtName,' อ.',amphurName,' จ.',provinceName,' ',zip) AS address ";
$sql .= "FROM ".$dbprefix."invent ";
$sql .= "LEFT JOIN district ON (".$dbprefix."invent.districtId=district.districtId) ";
$sql .= "LEFT JOIN amphur ON (".$dbprefix."invent.amphurId=amphur.amphurId) ";
$sql .= "LEFT JOIN province ON (".$dbprefix."invent.provinceId=province.provinceId) ";
//$wherecause = " WHERE ";
//echo $sql;

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("invent_del.php");
	}else if($_GET['state']==2){
		include("invent_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort((isset($_GET['srt'])==true?$_GET['srt']:"DOWN"));
		$rec->setOrder((isset($_GET['ord'])==true?$_GET['ord']:"inv_code"));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=2");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("inv_code,inv_desc,inv_type,address");
		$rec->setFieldDesc("รหัส,ชื่อ,ประเภท,ที่ตั้ง");
		$rec->setFieldAlign("center,left,left,left");
		$rec->setFieldSpace("10%,15%,10%,");
		$rec->setFieldLink("");
		//if($acc->isAccess(4)){
			//$rec->setDel("index.php","inv_code","inv_code","sessiontab=5&sub=2");
			//$rec->setFromDelAttr("maindel","./index.php?sessiontab=5&sub=2&state=1","post","delfield");
		//}
		//if($acc->isAccess(2))
		//	$rec->setEdit("index.php","inv_code","inv_code","sessiontab=5&sub=2");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>