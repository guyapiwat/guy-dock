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
	$sql .= "CASE sendby WHEN '' THEN '-' ELSE sendby END AS sendby, ";
	$sql .= "CASE senddate WHEN '' THEN '-' ELSE senddate END AS senddate, ";
	$sql .= "CASE sendcode WHEN '' THEN '-' ELSE sendcode END AS sendcode, ";
	$sql .= "CASE sendname WHEN '' THEN '-' ELSE sendname END AS sendname ";
	$sql .= "FROM ".$dbprefix."onlinepoint_h ";
	//echo $sql."<br />";

	if($_GET['state']==2){
		include("ordersend_editadd.php");
	}else if($_GET['state']==3){
		include("ordersendoperate.php");
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
		$rec->setSize("98%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=13");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("mcode ,name_t ,mobile,point ,transferdate ,transfertime ,transferbank ,sendby ,senddate ,sendcode,sendname");
		$rec->setFieldFloatFormat(",,,,,,,,,,,,");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อสมาชิก,โทร,ซื้อ&nbsp;Point,วันที่โอนเงิน,เวลา,ธนาคาร,ส่งสินค้าโดย,วันที่ส่งสินค้า,รหัสส่งสินค้า,ชื่อผู้ส่งสินค้า");
		$rec->setFieldAlign("center,left,center,center,center,center,center,center,center,center,center");
		$rec->setFieldSpace("8%,17%,8%,8%,8%,5%,8%,8%,8%,8%,12%");
		$rec->setFieldLink(",index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("mcode ,name_t  ,mobile,point ,transferdate ,transfertime ,transferbank ,sendby ,senddate ,sendcode,sendname");
		$rec->setSearchDesc("รหัสสมาชิก,ชื่อสมาชิก,โทร,ซื้อ&nbsp;Point,วันที่โอนเงิน,เวลา,ธนาคาร,ส่งสินค้าโดย,วันที่ส่งสินค้า,รหัสส่งสินค้า,ชื่อผู้ส่งสินค้า");
	//	$rec->setSum(true,false,",,,,,,,,,true,true");
		$rec->setSpecial("./images/search_16.png","","view","id","IMAGE","ดู");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		if($acc->isAccess(2))
			$rec->setEdit("index.php","id","id","sessiontab=3&sub=13");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>