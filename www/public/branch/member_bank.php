<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql  = "SELECT ".$dbprefix."member.id,mcode,name_t,acc_no,acc_name,acc_type,branch,bankname ";
$sql .= "FROM ".$dbprefix."member LEFT JOIN ".$dbprefix."bank ON ".$dbprefix."member.bankcode=".$dbprefix."bank.bankcode";
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	/*if($_GET['state']==1){
		include("member_del.php");
	}else if($_GET['state']==2){
		include("member_editadd.php");
	}else{*/
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
		$rec->setLink($PHP_SELF,"sessiontab=1&sub=10");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("mcode,name_t,acc_no,acc_name,acc_type,branch,bankname");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,เลขบัญชี,ชื่อบัญชี,ชนิดบัญชี,สาขา,ธนาคาร");
		$rec->setFieldAlign("center,left,center,left,center,left,left");
		$rec->setFieldSpace("10%,20%,15%,20%,10%,15%,10%");
		$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		$rec->setSearch("mcode,name_t,acc_no,acc_name,acc_type,branch,bankname");
		$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,เลขบัญชี,ชื่อบัญชี,ชนิดบัญชี,สาขา,ธนาคาร");
		$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	//}

?>