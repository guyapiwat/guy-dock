<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT *,REPLACE(calc,'1','<img src=./images/true.gif>') AS cal FROM ".$dbprefix."cround1 ";
//$wherecause = " WHERE ";

	if($_GET['state']==1){
		include("cround_del.php");
	}else if($_GET['state']==2){
		include("cround_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" rcode ":$_GET['ord']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=48");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,rdate,fdate,tdate,paydate,cal,remark");
		$rec->setFieldDesc("�����ͺ,�ѹ��������ͺ,�ѹ���ӹǹ�������,�ѹ���ӹǳ����ش,�ѹ�������Թ,�ӹǳ����,�����˵�");
		$rec->setFieldAlign("center,center,center,center,center,center,center,center,left");
		$rec->setFieldSpace("10%,10%,10%,10%,10%,10%,40%");
		$rec->setFieldLink("index.php?sessiontab=4&sub=48&cmc=,");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","rid","rid","sessiontab=4&sub=48");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=4&sub=48&state=1","post","delfield");
		}
		if($acc->isAccess(2))
			$rec->setEdit("index.php","rid","rid","sessiontab=4&sub=48");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
		$rec = new repGenerator();
		$sql = "SELECT * FROM ".$dbprefix."cround1";
		$rec->setQuery($sql);
		//echo $rec->getSql();
	}

?>