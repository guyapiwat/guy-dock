<script language="javaScript">
function selectitem(mid,mname){
		doc= window.opener.document;
		doc.frm.tpcode.value = mid;
		//doc.frm.mname.value = sname;
//		doc.getElementById('mname').innerHTML=mname;
	 	window.close();
}
</script>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="./../style.css" rel="stylesheet" type="text/css">
<title>���͡��Ҫԡ</title>
<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center"><tr><td><fieldset><legend><strong><font color="#666666">���͡��Ҫԡ</font></strong></legend>
<?
require("connectmysql.php");
require("prefix.php");
require("./cls/repGenerator.php");
require("adminchecklogin.php");if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT * FROM ".$dbprefix."product  ";
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("member_del.php");
	}else if($_GET['state']==2){
		include("member_editadd.php");
	}else{
	?><br /><?
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=1&sub=2");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("pcode,pdesc");
		$rec->setFieldDesc("�����Թ���,����");
		$rec->setFieldAlign("center,left");
		$rec->setFieldSpace("40%,60%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("pcode,pdesc");
		$rec->setSearchDesc("�����Թ���,����");
		//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
		$rec->setSpecial("./images/add_pic.gif","","selectitem","pcode,pdesc","IMAGE","");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	}

?></fieldset></td></tr></table>