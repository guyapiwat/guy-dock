<script language="javascript" type="text/javascript">
	function sale_status(id){
		if(confirm("Re Confirm?")){
			window.location='index.php?sessiontab=4&sub=12&ftrcode='+id;
		}
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
		$rec->setLink($PHP_SELF,"sessiontab=6&sub=38");
		$rec->setBackLink($PHP_SELF,"sessiontab=6");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,rdate,fdate,tdate,paydate,cal,calc_date");
		$rec->setFieldDesc("รหัสรอบ,วันที่เพิ่มรอบ,วันที่คำนวนเริ่มต้น,วันที่คำนวณสิ้นสุด,วันที่จ่ายเงิน,คำนวณแล้ว,เวลาที่กดคำนวน");
		$rec->setFieldAlign("center,center,center,center,center,center,center,center,left");
		$rec->setFieldSpace("10%,10%,10%,10%,10%,10%,40%");
		//$rec->setFieldLink("index.php?sessiontab=4&sub=6&cmc=,");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
		$rec = new repGenerator();
		$sql = "SELECT * FROM ".$dbprefix."bround";
		$rec->setQuery($sql);
		//echo $rec->getSql();
	}

?>