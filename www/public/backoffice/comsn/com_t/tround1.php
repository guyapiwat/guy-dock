<script language="javascript" type="text/javascript">
	function sale_status(id){
		if(confirm("Re Confirm?")){
			window.location='index.php?sessiontab=4&sub=116&ftrcode='+id;
		}
	}
</script>
<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT *,REPLACE(calc,'1','<img src=./images/true.gif>') AS cal,CASE tshow WHEN '1' THEN 'Show' END AS tshow,CASE rtype WHEN '0' THEN 'Small' WHEN '1' THEN 'Big' END AS rtype FROM ".$dbprefix."promotion ";
//echo $sql;
//echo $sql;
//$wherecause = " WHERE ";

	if($_GET['state']==1){
		include("tround_del.php");
	}else if($_GET['state']==2){
		include("tround_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" rcode ":$_GET['ord']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=29");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,rdate,fdate,tdate,name,rtype,tshow,cal,calc_date");
		$rec->setFieldDesc("รหัสรอบ,วันที่เพิ่มรอบ,วันที่เริ่มต้น,วันที่สิ้นสุด,ชื่อโปรโมชั่น,Size,show,คำนวณ,เวลาที่กดคำนวน");
		$rec->setFieldAlign("center,center,center,center,left,center,center,center,center");
		$rec->setFieldSpace("5%,10%,10%,10%,25%,10%,5%,5%,15%");
	//	$rec->setFieldLink("index.php?sessiontab=4&sub=44&cmc=,");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","rid","rid","sessiontab=4&sub=44");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=4&sub=44&state=1","post","delfield");
		}
		if($acc->isAccess(2))
			$rec->setEdit("index.php","rid","rid","sessiontab=4&sub=60&state=2");
		$rec->setSpecial("Calculate","","sale_status","rcode","","Calculate");
//	$rec->setSpecial("./images/search.gif","","view","fdate,tdate,rcode","IMAGE","ดู");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
		$rec = new repGenerator();
		//$sql = "SELECT * FROM ".$dbprefix."promotion";
		$rec->setQuery($sql);
		//echo $rec->getSql();
	}

?>