<script language="javascript" type="text/javascript">
	function view(id){
		var wlink = 'onlineewallet_detail.php?pid='+id;
		window.open(wlink);
	}
		function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=3&sub=42&state=1&bid='+id;
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
	$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&tstype=0\"><img src=\"./images/true.gif\"></a>') END AS transtype, ";
	$sql .= "CASE paytype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&ptype=1\"><img src=\"./images/false.gif\"></a>') ";
	$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&ptype=0\"><img src=\"./images/true.gif\"></a>') END AS paytype, ";
	$sql .= "CASE sendtype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&stype=1\"><img src=\"./images/false.gif\"></a>') ";
	$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',id,'&stype=0\"><img src=\"./images/true.gif\"></a>') END AS sendtype ";
	$sql .= "FROM ".$dbprefix."transferewallet_h";

if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
$sql = "SELECT '".$page."' as page,mobile,cancel,print,".$dbprefix."transferewallet_h.id,".$dbprefix."transferewallet_h.lid,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,remark,total,CONCAT(".$dbprefix."member.name_f,' ',".$dbprefix."transferewallet_h.name_t) as name_t,".$dbprefix."transferewallet_h.mcode AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE ".$dbprefix."transferewallet_h.uid WHEN '' THEN ".$dbprefix."transferewallet_h.inv_code ELSE ".$dbprefix."transferewallet_h.uid END AS uid ,";
$sql .= "CASE transtype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',".$dbprefix."transferewallet_h.id,'&tstype=1\"><img src=\"./images/false.gif\"></a>') ";
$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',".$dbprefix."transferewallet_h.id,'&tstype=0\"><img src=\"./images/true.gif\"></a>') END AS transtype1, ";
$sql .= "CASE paytype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',".$dbprefix."transferewallet_h.id,'&ptype=1\"><img src=\"./images/false.gif\"></a>') ";
$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',".$dbprefix."transferewallet_h.id,'&ptype=0\"><img src=\"./images/true.gif\"></a>') END AS paytype1, ";
$sql .= "CASE credittype WHEN '0' THEN '<img src=\"./images/false.gif\">' ";
$sql .= "ELSE '<img src=\"./images/true.gif\">' END AS credittype, ";
$sql .= "CASE sendtype WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',".$dbprefix."transferewallet_h.id,'&stype=1\"><img src=\"./images/false.gif\"></a>') ";
$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&id=',".$dbprefix."transferewallet_h.id,'&stype=0\"><img src=\"./images/true.gif\"></a>') END AS sendtype1 ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' WHEN '4' THEN 'ATO'  END AS checkportal";
$sql .= ",CASE ".$dbprefix."transferewallet_h.receive WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."transferewallet_h.receive_date) ELSE '<img src=./images/false.gif>' END AS receive ,
CASE ".$dbprefix."transferewallet_h.sender WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."transferewallet_h.sender_date) ELSE '<img src=./images/false.gif>' END AS sender ,
".$dbprefix."member.pos_cur as por_cur ";

$sql .= "FROM ".$dbprefix."transferewallet_h ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."transferewallet_h.mcode=".$dbprefix."member.mcode) where 1=1 "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$sql .= " WHERE  ".$dbprefix."transferewallet_h.sa_type <> 'I'";
if(!empty($sano)){
$sql .= " and sano = '$sano' ";
}
$monthmonth = explode("-",$fdate);
$fdate = $monthmonth[0].'-'.$monthmonth[1];
if(!empty($fdate))
$sql .= " and sadate like '%$fdate%'  ";
//echo $sql;
//$wherecause = " WHERE "
	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		//include("onlineewallet_del.php");
		include("onlineewallet_cancel.php");
	}else if($_GET['state']==2){
		//include("sale_cancel.php");
	}else if($_GET['state']==3){
		include("onlineewallet_detail.php");
	}else if($_GET['state']==4){
		include("onlineewallet_changetype.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=1&sub=13");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("id,smcode,name_t,mobile,total,paytype1,credittype,sano");
		$rec->setFieldDesc("เลขใบสั่งซื้อ,รหัสสมาชิก,ชื่อ,เบอร์โทร,เป็นเงิน,โอนแล้ว,บัตรเครดิต,บิลอ้างอิง");
		//$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
		$rec->setFieldAlign("center,center,left,center,center,center,center,center,center,center,center");
		$rec->setFieldSpace("8%,7%,30%,8%,10%,10%,10%,10%,6%,6%,6%");
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
		//$rec->setSpecial("./images/search.gif","","view","id","IMAGE","ดู");
		if($acc->isAccess(4)){
			//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		}
		$rec->showRec(1,'SH_QUERY');
		//echo $rec->getSQL("CALC")."<br />";
		//---------------------------------
	}

?>
<br />