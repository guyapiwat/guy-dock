<?
session_start();
?><link href="./../style.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
function selectitem(pcode,pdesc){
		doc= window.opener.document;
		//alert(document.listform.idx.value);
		doc.frm.ppcode.value=pcode;
		doc.getElementById('ppdesc').innerHTML=pdesc;
	 	window.close();
}
</script>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="./../style.css" rel="stylesheet" type="text/css">
<title>เลือก package</title>
<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center"><tr><td><fieldset><legend><strong><font color="#666666">เลือก package</font></strong></legend>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");
require("prefix.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT pcode,pdesc FROM ".$dbprefix."product_package  ";
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		//include("sales_invent_del.php");
	}else if($_GET['state']==2){
		//include("sales_invent_editadd.php");
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
		$rec->setShowField("pcode,pdesc");
		$rec->setFieldDesc("รหัส package,รายละเอียด package");
		$rec->setFieldAlign("center,left");
		$rec->setFieldSpace("30%,70%%");
		$rec->setFieldLink("");
		$rec->setSearch("pcode,pdesc");
		$rec->setSearchDesc("รหัส package,รายละเอียด package");
		//$rec->setDel("index.php","inv_code","inv_code","sessiontab=3&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=2&state=1","post","delfield");
		//$rec->setEdit("index.php","inv_code","inv_code","sessiontab=3&sub=2");
		$rec->setSpecial("./images/add_pic.gif","","selectitem","pcode,pdesc","IMAGE","");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>
</fieldset></td></tr></table>
