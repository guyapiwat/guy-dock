<?
require("connectmysql.php");
//require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT * FROM ".$dbprefix."member WHERE sp_code<=>NULL OR sp_code<=>'' ";// OR sp_code='0000000' ";
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=1&sub=7");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("mcode,name_t,mdate,pos_cur,sp_code");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสผู้แนะนำ");
		$rec->setFieldAlign("center,left,center,center,center");
		$rec->setFieldSpace("10%,55%,10%,10%,10%");
		$rec->setFieldLink("index.php?sessiontab=1&sub=5&cmc=,");
		if($acc->isAccess(8)){
			$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		}
		if($acc->isAccess(4)){
			$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
		}
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

?>
