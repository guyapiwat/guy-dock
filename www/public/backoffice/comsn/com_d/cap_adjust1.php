<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT * FROM ".$dbprefix."cround1 ";
//$wherecause = " WHERE ";
$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
if($strtdate)$sql .= " where fdate >= '$strfdate' and tdate <= '$strtdate' ";

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
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=52");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,fdate,tdate,total_a,total_h,fast,invent,binaryt,adjust_binary,matching,adjust_matching,pool,adjust_pool");
		$rec->setFieldDesc("ÃËÑÊÃÍº,ÇÑ¹·Õè¤Ó¹Ç¹àÃÔèÁµé¹,ÇÑ¹·Õè¤Ó¹Ç³ÊÔé¹ÊØ´,ºÔÅ¢ÒÂºÃÔÉÑ·,ºÔÅá¨§ÂÍ´,á¹Ğ¹Ó,ÊÒ¢Ò,äº¹ÒÃÕè,adjust äº¹ÒÃÕè,áÁªªÔè§,adjust áÁªªÔè§,¡Í§·Ø¹,adjust ¡Í§·Ø¹");
		$rec->setFieldAlign("center,center,center,center,center,center,center,center,center,center,center,center,center,center,");
		$rec->setFieldSpace("3%,10%,10%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%");
		//$rec->setFieldLink("index.php?sessiontab=4&sub=1&cmc=,");
		if($acc->isAccess(8)){
			//$rec->setDel("index.php","rid","rid","sessiontab=4&sub=1");
			//$rec->setFromDelAttr("maindel","./index.php?sessiontab=4&sub=1&state=1","post","delfield");
		}
		if($acc->isAccess(2))
			//$rec->setEdit("index.php","rid","rid","sessiontab=4&sub=1");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
		$rec = new repGenerator();
		$sql = "SELECT * FROM ".$dbprefix."around";
		$rec->setQuery($sql);
		//echo $rec->getSql();
	}

?>