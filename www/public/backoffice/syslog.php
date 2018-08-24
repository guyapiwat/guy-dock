<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT * FROM ".$dbprefix."log order by logdate,logtime asc";
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		//include("member_del.php");
	}else if($_GET['state']==2){
		//include("member_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=8");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sys_code,subject,object,logdate,logtime");
		$rec->setFieldDesc("รหัสผู้ใช้ระบบ,ทำอะไร,กับอะไร,วันที่,เวลา");
		$rec->setFieldAlign("center,left,left,center,center");
		$rec->setFieldSpace("10%,20%,50%,10%,10%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		$rec->setSearch("sys_code,subject,object,logdate,logtime");
		$rec->setSearchDesc("รหัสผู้ใช้ระบบ,ทำอะไร,กับอะไร,วันที่,เวลา");
		//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	}

?>