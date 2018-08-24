<script language="javascript" type="text/javascript">
	function sale_status(rcode){
		if(confirm("Re Confirm?")){
			window.location='index.php?sessiontab=4&sub=26&ftrcode='+rcode;
		}
	}
		function sale_status1(rcode){
	//	if(confirm("Re Confirm?")){
			window.location='index.php?sessiontab=4&sub=36&ftrcode='+rcode;
	//	}
	}
</script><?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT *,REPLACE(calc,'1','<img src=./images/true.gif>') AS cal FROM ".$dbprefix."cround ";
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
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=25");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,rdate,fdate,tdate,fpdate,tpdate,cal,calc_date,cstatus");
		$rec->setFieldDesc("รหัสรอบ,วันที่เพิ่มรอบ,วันที่คำนวนเริ่มต้น,วันที่คำนวณสิ้นสุด,เริ่มรักษายอด,สิ้นสุดรักษายอด,คำนวณแล้ว,เวลาที่กดคำนวน,Clear ยอด");
		$rec->setFieldAlign("center,center,center,center,center,center,center,center,center");
		$rec->setFieldSpace("5%,10%,10%,10%,10%,10%,10%,15%,5%");
//		$rec->setFieldLink("index.php?sessiontab=4&sub=6&cmc=,");
		if($acc->isAccess(8)){
			$rec->setDel("index.php","rid","rid","sessiontab=4&sub=25");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=4&sub=25&state=1","post","delfield");
		}
		$rec->setSpecial("Calculate","","sale_status","rcode","","Calculate");
		$rec->setSpecial("รายงาน","","sale_status1","rcode","","รายงาน");
		if($acc->isAccess(2))
			$rec->setEdit("index.php","rid","rid","sessiontab=4&sub=25");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
		$rec = new repGenerator();
		$sql = "SELECT * FROM ".$dbprefix."cround";
		$rec->setQuery($sql);
		//echo $rec->getSql();
	}

?>