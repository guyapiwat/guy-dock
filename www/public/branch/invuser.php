<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT *";
$sql .= ",(CASE WHEN object1>0 THEN '<img src=./images/true.gif>' ELSE '' END) AS object1r ";
$sql .= ",(CASE WHEN object2>0 THEN '<img src=./images/true.gif>' ELSE '' END) AS object2r ";
$sql .= ",(CASE WHEN object3>0 THEN '<img src=./images/true.gif>' ELSE '' END) AS object3r ";
$sql .= ",(CASE WHEN object4>0 THEN '<img src=./images/true.gif>' ELSE '' END) AS object4r ";
$sql .= ",(CASE WHEN object5>0 THEN '<img src=./images/true.gif>' ELSE '' END) AS object5r ";
$sql .= ",inv_ref ";
$sql .= "FROM ".$dbprefix."user WHERE usertype='2'";
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("invuser_del.php");
	}else if($_GET['state']==2){
		include("invuser_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=6");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("usercode,username,object3r,inv_ref");//uid,
		$rec->setFieldDesc("���ʼ����,���ͼ����,���٢��,�Ң�");//���ʾ�ѡ�ҹ,
		$rec->setFieldAlign("center,center,center,center");//center,
		$rec->setFieldSpace("15%,35%,10%,40%");//10%,
		$rec->setFieldLink(",");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","uid","uid","sessiontab=5&sub=6");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=5&sub=6&state=1","post","delfield");
		}
		if($acc->isAccess(2))
			$rec->setEdit("index.php","uid","uid","sessiontab=5&sub=6");
		$rec->showRec(1,'SH_QUERY');
	}

?>