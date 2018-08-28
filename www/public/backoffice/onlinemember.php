<script language="javascript" type="text/javascript">
	function view(id){
		var wlink = 'onlineslae_detail.php?pid='+id;
		window.open(wlink);
	}
		function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=3&sub=44&state=1&bid='+id;
		}
	}
</script>
<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT * FROM ".$dbprefix."member ";
// JOIN เมื่อต้องการข้อมูลวันหมดอายุในโปรแกรม
	$sql = "SELECT *,ssend,";
	$sql .= "CASE transtype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&tstype=1\"><img src=\"./images/false.gif\"></a>') ";
	$sql .= "ELSE '<img src=\"./images/true.gif\">' END AS transtype, ";
	$sql .= "CASE paytype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&ptype=1\"><img src=\"./images/false.gif\"></a>') ";
	$sql .= "ELSE '<img src=\"./images/true.gif\">' END AS paytype, ";
	$sql .= "CASE sendtype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&stype=1\"><img src=\"./images/false.gif\"></a>') ";
	$sql .= "ELSE '<img src=\"./images/true.gif\">' END AS sendtype ";
	$sql .= ",CASE lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS statur_lr ";
	$sql .= "FROM ".$dbprefix."transfersale_h";

if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
$sql = "SELECT *,'".$page."' as page  ";
$sql .= ",CASE transtype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&tstype=1\"><img src=\"./images/false.gif\"></a>') ";
$sql .= "ELSE '<img src=\"./images/true.gif\">' END AS transtype1, ";
$sql .= "CASE paytype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&ptype=1\"><img src=\"./images/false.gif\"></a>') ";
$sql .= "ELSE '<img src=\"./images/true.gif\">' END AS paytype1, ";
$sql .= "CASE credittype WHEN '0' THEN '<img src=\"./images/false.gif\">' ";
$sql .= "ELSE '<img src=\"./images/true.gif\">' END AS credittype, ";
$sql .= "CASE sendtype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&stype=1\"><img src=\"./images/false.gif\"></a>') ";
$sql .= "ELSE '<img src=\"./images/true.gif\">' END AS sendtype1 ";
$sql .= ",CASE lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS statur_lr ";
$sql .= "FROM ".$dbprefix."member_tmp ";
//$sql .= "LEFT JOIN ".$dbprefix."member ON (mcode=".$dbprefix."member.mcode) where 1=1 "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$sql .= " WHERE  sa_type <> 'I'";

//echo $sql;
//echo $sql;
//$wherecause = " WHERE "
	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		//include("onlineslae_del.php");
		include("onlinemember_cancel.php");
	}else if($_GET['state']==2){
		//include("sale_cancel.php");
	}else if($_GET['state']==3){
		include("onlinemember_detail.php");
	}else if($_GET['state']==4){
		include("onlinemember_changetype.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=44");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("id,name_t,id_card,mdate,sp_code,paytype1,credittype,mcode_ref");
		$rec->setHLight("status_terminate",1,array("#FF7777","#FF9999"),"HIDE");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,รหัสประชาชน,วันที่สมัคร,รหัสผู้แนะนำ,โอนแล้ว,บัตรเครดิต,บิลอ้างอิง");
		$rec->setFieldAlign("center,left,center,center,center,center,center,center,center,center,center,center,center,right");
		$rec->setFieldSpace("6%,45%,10%,8%,8%,6%,6%,6%,6%,6%,6%,6%,6%,6%,6%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setFieldFloatFormat(",,,,,,,,,,,,,2");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		if($acc->isAccess(4)){
			//$rec->setDel("index.php","id","id","sessiontab=1&sub=13");
			//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=13&state=1","post","delfield");
		}
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//$rec->setSearch("code_ref,name_t,mobile,total,transferdate,transfertime,transferbank,paytype,transtype");
	//	$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,ต่อแล้ว,เบอร์โทร,เป็นเงิน,วันที่โอนเงิน,เวลา,ธนาคาร,โอนแล้ว,ส่งสินค้าแล้ว");
		/*if($acc->isAccess(2))
			$rec->setEdit("index.php","id","aid","sessiontab=1&sub=13&web=1");*/
	//	$rec->setSpecial("./images/search.gif","","view","id","IMAGE","ดู");
		if($acc->isAccess(4)){
			$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		}
		$rec->showRec(1,'SH_QUERY');
		//echo $rec->getSQL("CALC")."<br />";
		//---------------------------------
	}

?>
<br />