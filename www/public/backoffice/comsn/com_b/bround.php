<script language="javascript" type="text/javascript">
	function sale_status(id){
		if(confirm("Re Confirm?")){
			window.location='index.php?sessiontab=4&sub=12&ftrcode='+id;
		}
	}
		function sale_status1(fdate,tdate){
	//	if(confirm("Re Confirm?")){
			window.location='index.php?sessiontab=4&sub=1000&ftrcode='+fdate;
	//	}
	}
</script>
<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT *,DATE_FORMAT(fdate, '%d-%m-%Y') as fdate
,DATE_FORMAT(rdate, '%d-%m-%Y') as rdate
,DATE_FORMAT(tdate, '%d-%m-%Y') as tdate
,DATE_FORMAT(fpdate, '%d-%m-%Y') as fpdate
,DATE_FORMAT(tpdate, '%d-%m-%Y') as tpdate
,DATE_FORMAT(paydate, '%d-%m-%Y') as paydate,REPLACE(calc,'1','<img src=./images/true.gif>') AS cal FROM ".$dbprefix."bround ";
//$wherecause = " WHERE ";

	if($_GET['state']==1){
		include("bround_del.php");
	}else if($_GET['state']==2){
		include("bround_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" rcode ":$_GET['ord']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=11");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,rdate,fdate,tdate,paydate,cal,calc_date,timequery");
		$rec->setFieldDesc("รหัสรอบ,วันที่เพิ่มรอบ,วันที่คำนวนเริ่มต้น,วันที่คำนวณสิ้นสุด,วันที่จ่าย,คำนวณแล้ว,เวลาที่กดคำนวน,เวลาที่ใช้<br>วินาที");
		$rec->setFieldAlign("center,center,center,center,center,center,center,center,left,center");
		$rec->setFieldSpace("10%,10%,10%,10%,10%,10%,20%");
		//$rec->setFieldLink("index.php?sessiontab=4&sub=6&cmc=,");
		if($acc->isAccess(8)){
			//$rec->setDel("index.php","rid","rid","sessiontab=4&sub=11");
			//$rec->setFromDelAttr("maindel","./index.php?sessiontab=4&sub=11&state=1","post","delfield");
		}
		$rec->setSpecial("Calculate "," ","sale_status","rcode",""," Calculate");
		//$rec->setSpecial("รายงาน ","","sale_status1","rcode","","รายงาน  ");
		if($acc->isAccess(2))
			$rec->setEdit("index.php","rid","rid","sessiontab=4&sub=11");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
		$rec = new repGenerator();
		$sql = "SELECT * FROM ".$dbprefix."bround";
		$rec->setQuery($sql);
		//echo $rec->getSql();
	}

?>