<link href="./../style.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
function selectitem(inv_code,inv_desc){
		doc= window.opener.document;
		//alert(document.listform.idx.value);
		doc.frm.inv_code.value=inv_code;
		doc.getElementById('inv_desc').innerHTML=inv_desc;
	 	window.close();
}
</script>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="./../style.css" rel="stylesheet" type="text/css">
<title>เลือกสาขา</title>
<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center"><tr><td><fieldset><legend><strong><font color="#666666">เลือกสาขา</font></strong></legend>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");
require("prefix.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT inv_code,inv_desc,CASE inv_type WHEN '1' THEN 'โมบาย' WHEN '2' THEN 'ศูนย์' END AS inv_type FROM ".$dbprefix."invent where inv_type = 1";
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("sales_invent_del.php");
	}else if($_GET['state']==2){
		include("sales_invent_editadd.php");
	}else{
		?><br /><?
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
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=2");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("inv_code,inv_desc,inv_type");
		$rec->setFieldDesc("รหัส,ชื่อ,ประเภท");
		$rec->setFieldAlign("center,left,left");
		$rec->setFieldSpace("30%,40%,30%");
		$rec->setFieldLink("");
		$rec->setSearch("inv_code,inv_desc");
		$rec->setSearchDesc("รหัสสาขา,ชื่อสาขา");
		//$rec->setDel("index.php","inv_code","inv_code","sessiontab=3&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=2&state=1","post","delfield");
		//$rec->setEdit("index.php","inv_code","inv_code","sessiontab=3&sub=2");
		$rec->setSpecial("./images/add_pic.gif","","selectitem","inv_code,inv_desc","IMAGE","");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>
</fieldset></td></tr></table>
