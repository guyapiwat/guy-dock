<script language="javascript" type="text/javascript">
	function view(id){
		var wlink = 'onlinepoine_detail.php?pid='+id;
		window.open(wlink);
	}
</script>
<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
	$sql = "SELECT *,";
	$sql .= "CASE transtype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&tstype=1\"><img src=\"./images/false.gif\"></a>') ";
	$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&tstype=0\"><img src=\"./images/true.gif\"></a>') END AS transtype, ";
	$sql .= "CASE paytype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&ptype=1\"><img src=\"./images/false.gif\"></a>') ";
	$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&ptype=0\"><img src=\"./images/true.gif\"></a>') END AS paytype, ";
	$sql .= "CASE sendtype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&stype=1\"><img src=\"./images/false.gif\"></a>') ";
	$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&stype=0\"><img src=\"./images/true.gif\"></a>') END AS sendtype ";
	$sql .= "FROM ".$dbprefix."onlinepoint_h ";
	//echo $sql."<br />";
	if($_GET['state']==1){
		include("onlinepoint_del.php");
	}else if($_GET['state']==2){
		include("sale_editadd.php");
	}else if($_GET['state']==3){
		include("sale_cancel.php");
	}else if($_GET['state']==4){
		include("online_changetype.php");
	}else{
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
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=11");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("mcode ,name_t  ,mobile,point ,transferdate ,transfertime ,transferbank ,transtype ,paytype ,sendtype");
		$rec->setFieldFloatFormat(",,,,,,,,,");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อสมาชิก,โทร,ซื้อ&nbsp;Point,วันที่โอนเงิน,เวลา,ธนาคาร,โอนเงินแล้ว,ให้&nbsp;Point&nbsp;แล้ว,ส่งสินค้าแล้ว");
		$rec->setFieldAlign("center,left,center,center,center,center,center,center,center,center");
		$rec->setFieldSpace("8%,23%,10%,10%,8%,5%,10%,8%,8%,8%");
		$rec->setFieldLink(",index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("mcode ,name_t  ,mobile,point ,transferdate ,transfertime ,transferbank ,transtype ,paytype ,sendtype");
		$rec->setSearchDesc("รหัสสมาชิก,ชื่อสมาชิก,โทร.,ซื้อ Point,วันที่โอนเงิน,เวลา,ธนาคาร,โอนเงินแล้ว,ให้ Point แล้ว,ส่งสินค้าแล้ว");
	//	$rec->setSum(true,false,",,,,,,,,,true,true");
		$rec->setSpecial("./images/search_16.png","","view","id","IMAGE","ดู");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=11");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=11&state=1","post","delfield");
		}
	/*	if($acc->isAccess(2))
			$rec->setEdit("index.php","id","id","sessiontab=3&sub=11");*/
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>

<div style="text-align:center; margin-top:50px;">
<a href="http://www.scb.co.th/th/home/" target="_blank"><img src="images/scb.png"  align="absmiddle" style="margin-right:40px;" /></a>
<a href="http://www.kasikornbank.com/TH/Pages/Default.aspx" target="_blank"><img src="images/images.jpg" width="80" height="80" align="absmiddle" style="margin-right:40px;" /></a>
<a href="http://www.cashwe.com/bank-news/krungthaibank.html" target="_blank"><img src="images/images2.jpg" width="50" height="50" align="absmiddle" style="margin-right:40px;" /></a>
<a href="http://www.bangkokbank.com/Bangkok%20Bank%20Thai/Pages/main.aspx" target="_blank"><img src="images/images3.jpg" align="absmiddle" /></a>
</div>
<br />