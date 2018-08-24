<script language="javascript">
var win
function view(code){
	var param = 'fmcode='+code;
	var url = './mem_detailview.php?'+param;
	//window.location = wlink;
	//window.location = url;
	if(win!=null) win.close();
	//win = window.open(url,'','fullscreen=yes scrollbars=yes' );
	win = window.open(url,'','' );
}
</script>
<script language="javascript" type="text/javascript">
	
	function sale_status(id){
		if(confirm("ต้องการ Reset Password")){
			window.location='index.php?sessiontab=1&sub=2&state=3&bid='+id;
		}
	}
</script>
<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT * FROM ".$dbprefix."member ";
//var_dump($_SESSION);


/*
$sql = "select id  FROM ".$dbprefix."member ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	 $sqlObj = mysql_fetch_object($rs);
	$mid = $sqlObj->id;
	$sql = "SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate where mid = '$mid' GROUP BY mid";
	//echo $sql.'<br>';
	$rs1 = mysql_query($sql);
	if(mysql_num_rows($rs1) > 0)
	{
		 $sqlObj1 = mysql_fetch_object($rs1);
		$exp_date = $sqlObj1->exp_date;
		$sqldel1 = "update ".$dbprefix."member set exp_date = '$exp_date'  where id = '$mid' ";
		//echo $sqldel1.'<br>';
		mysql_query($sqldel1);
		//mysql_query($sqldel2);

	}
}
// JOIN เมื่อต้องการข้อมูลวันหมดอายุในโปรแกรม
$sql = "SELECT ".$dbprefix."member.*,".$dbprefix."location_base.cshort,CONCAT(".$dbprefix."member.name_f,' ',".$dbprefix."member.name_t) as name_t ,DATE_FORMAT(exp_date, '%d-%m-%Y') as exp_date,".$dbprefix."member.id_card,FORMAT(".$dbprefix."member.ewallet,2) as ewallet ";
$sql .= ",CASE lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS statur_lr ";
$sql .= ",CASE status_doc WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_doc ";
$sql .= ",CASE status_expire WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_expire ";
$sql .= ",CASE status_terminate WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_terminate1 ";
$sql .= ",CASE status_ato WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_ato ";
//$sql .= ",CASE status_suspend WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_suspend ";
//$sql .= ",CASE status_blacklist WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_blacklist ";
$sql .= ",CASE status_suspend WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&aid=',id,'&mcode=',mcode,'&id=1\"><img src=\"./images/false.gif\"></a>') ";
$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&aid=',id,'&mcode=',mcode,'&id=\"><img src=\"./images/true.gif\"></a>') END AS status_suspend ";

$sql .= ",CASE status_blacklist WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=5&aid=',id,'&mcode=',mcode,'&id=1\"><img src=\"./images/false.gif\"></a>') ";
$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=5&aid=',id,'&mcode=',mcode,'&id=\"><img src=\"./images/true.gif\"></a>') END AS status_blacklist ";


$sql .= ",DATE_FORMAT(".$dbprefix."member.mdate, '%d-%m-%Y') as mdate,taba.posname as posname FROM ".$dbprefix."member ";
$sql .= " left join ".$dbprefix."location_base on (".$dbprefix."member.locationbase = ".$dbprefix."location_base.cid)  ";
//$sql .= "LEFT JOIN (SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate GROUP BY mid) AS taba ON (".$dbprefix."member.id=taba.mid)";
$sql .= " LEFT JOIN ".$dbprefix."position1 AS taba ON (".$dbprefix."member.pos_cur1=taba.posshort) where ".$dbprefix."member.mcode >= '".$_SESSION['code_ref']."' and ".$dbprefix."member.locationbase = '".$_SESSION["inv_locationbase"]."' ";
*/

//}

// JOIN เมื่อต้องการข้อมูลวันหมดอายุในโปรแกรม
$sql = "SELECT ".$dbprefix."member.*,cshort,CONCAT(".$dbprefix."member.name_f,' ',".$dbprefix."member.name_t) as name_t ,DATE_FORMAT(exp_date, '%d-%m-%Y') as exp_date,ewallet,".$dbprefix."member.id_card";
$sql .= ",CASE status_doc WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_doc ";
$sql .= ",CASE lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS statur_lr ";
$sql .= ",CASE status_expire WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_expire ";
$sql .= ",CASE status_terminate WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_terminate1 ";
$sql .= ",CASE status_ato WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_ato ";
//$sql .= ",CASE status_suspend WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_suspend ";
//$sql .= ",CASE status_blacklist WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_blacklist ";
$sql .= ",CASE status_suspend WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&aid=',id,'&mcode=',mcode,'&id=1\"><img src=\"./images/false.gif\"></a>') ";
$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&aid=',id,'&mcode=',mcode,'&id=\"><img src=\"./images/true.gif\"></a>') END AS status_suspend ";

$sql .= ",CASE status_blacklist WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=5&aid=',id,'&mcode=',mcode,'&id=1\"><img src=\"./images/false.gif\"></a>') ";
$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=5&aid=',id,'&mcode=',mcode,'&id=\"><img src=\"./images/true.gif\"></a>') END AS status_blacklist ";


$sql .= ",DATE_FORMAT(".$dbprefix."member.mdate, '%d-%m-%Y') as mdate,taba.posname as posname FROM ".$dbprefix."member ";
//$sql .= "LEFT JOIN (SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate GROUP BY mid) AS taba ON (".$dbprefix."member.id=taba.mid)";
$sql .= " LEFT JOIN ".$dbprefix."position1 AS taba ON (".$dbprefix."member.pos_cur1=taba.posshort) ";
$sql .= " LEFT JOIN ".$dbprefix."location_base AS lb ON (".$dbprefix."member.locationbase=lb.cid)  where ".$dbprefix."member.mcode >= '".$_SESSION['code_ref']."'  and ".$dbprefix."member.locationbase = '".$_SESSION["inv_locationbase"]."'  ";
//echo $sql;
//echo $sql;

//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("member_del.php");
	}else if($_GET['state']==2){
		include("member_editadd.php");
	}else if($_GET['state']==3){
		include("member_reset.php");
	}else if($_GET['state']==4){
		include("member_suspend.php");
	}else if($_GET['state']==5){
		include("member_blacklist.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" mcode ":$_GET['ord']);
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
		//$rec->setShowField("mcode,name_t,mdate,exp_date,pos_cur,upa_code,sp_code,ewallet,all_pv");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,กระเป๋าเงิน,คะแนนส่วนตัว");
		$rec->setShowField("mcode,name_t,id_card,mdate,pos_cur,pos_cur4,sp_code,status_doc,status_suspend,status_terminate1,status_ato,ewallet,voucher,cshort");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,รหัสประชาชน,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,PIN,รหัสผู้แนะนำ,เอกสาร,Suspend,Terminate,Autoship,Ewallet,Voucher,LB");
$rec->setFieldDesc($wording_lan["Report_1"].",".$wording_lan["Report_2"].",".$wording_lan["Report_3"].",".$wording_lan["Report_4"].",".$wording_lan["Report_6"].",".$wording_lan["Report_7"].",".$wording_lan["Report_8"].",".$wording_lan["Report_9"].",".$wording_lan["Report_10"].",".$wording_lan["Report_11"].",".$wording_lan["Report_12"].",".$wording_lan["Report_17"].",".$wording_lan["Report_16"].",".$wording_lan["Report_13"]."");

		//$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
		$rec->setFieldAlign("center,left,center,center,center,center,center,center,center,center,center,right,right,center");
		$rec->setFieldSpace("6%,20%,10%,8%,4%,4%,6%,6%,5%,5%,5%,7%,4%");
		$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setFieldFloatFormat(",,,,,,,,,,,,");
		$rec->setHLight("status_terminate",1,array("#FF7777","#FF9999"),"HIDE");
		
		$rec->setSearch($dbprefix."member.mcode,".$dbprefix."member.name_t,".$dbprefix."member.mdate,exp_date,".$dbprefix."member.pos_cur,".$dbprefix."member.upa_code,".$dbprefix."member.sp_code,".$dbprefix."member.id_card,status_doc,status_suspend,status_blacklist,status_ato");
	//	$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,รหัสประชาชน,เอกสาร,suspend,blacklist,Autoship");
		$rec->setSearchDesc($wording_lan["Report_1"].",".$wording_lan["Report_2"].",".$wording_lan["Report_4"].",".$wording_lan["Report_5"].",".$wording_lan["Report_6"].",".$wording_lan["Report_14"].",".$wording_lan["Report_8"].",".$wording_lan["Report_3"].",".$wording_lan["Report_9"].",".$wording_lan["Report_10"].",".$wording_lan["Report_11"].",".$wording_lan["Report_12"]."");
	//if($acc->isAccess(2))
			$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
			
		
		$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","ดู");
	
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	}

?>