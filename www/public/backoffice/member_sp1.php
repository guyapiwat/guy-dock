<script language="javascript">
var win
function view(code){
	var param = 'fmcode='+code;
	var url = './mem_detailview.php?'+param;
	//window.location = wlink;
	//window.location = url;
	if(win!=null) win.close();
	win = window.open(url,'','fullscreen=yes scrollbars=yes' );
}
</script>

<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT * FROM ".$dbprefix."member ";
// JOIN เมื่อต้องการข้อมูลวันหมดอายุในโปรแกรม
$mm = date("Y-m");
$mm = date("Y").'-0'.(date("m")-1);

	if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
if(empty($fdate))$fdate = $mm;
/*$sql = "SELECT ".$dbprefix."member.*,asa.all_pv,DATE_FORMAT(".$dbprefix."member.mdate, '%Y-%m-%d') as mdate FROM ".$dbprefix."member ";
$sql .= "LEFT JOIN (SELECT sum(tot_pv) AS all_pv,mcode  FROM ".$dbprefix."asaleh WHERE  sa_type='A' group by mcode) AS asa ON (".$dbprefix."member.mcode=asa.mcode) where  mdate like '%$mm%'";*/
$sql = "SELECT ".$dbprefix."member.*,asa.all_pv,mdate as fdate,DATE_FORMAT(".$dbprefix."member.mdate, '%Y-%m-%d') as mdate FROM ".$dbprefix."member ";
$sql .= "LEFT JOIN (SELECT sum(tot_pv) AS all_pv,mcode  FROM ".$dbprefix."asaleh WHERE  sa_type='A' and sadate like '%$fdate%' and cancel = 0 group by mcode) AS asa ON (".$dbprefix."member.mcode=asa.mcode) where mdate like '%$fdate%' and asa.mcode like '%$strSearch%' ";

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
	}else{
		$rec = new repGenerator_sp();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" mcode ":$_GET['ord']);
		//$rec->setLimitPage($_GET['lp']);
		$rec->setLimitPage('ALL');
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=1&sub=15");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("mcode,name_t,mdate,exp_date,pos_cur,upa_code,sp_code,ewallet,all_pv");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,กระเป๋าเงิน,คะแนนส่วนตัว");
		$rec->setShowField("mcode,name_t,mdate,exp_date,pos_cur,upa_code,sp_code,all_pv");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,คะแนนแนะนำ");
		//$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
		$rec->setFieldAlign("center,left,center,center,center,center,center,right,right");
		$rec->setFieldSpace("8%,40%,8%,8%,8%,8%,8%,8%,8%");
		$rec->setFieldLink("index.php?sessiontab=3&sub=6&skey=ali_asaleh.mcode&lp=200&scause=");
		$rec->setFieldFloatFormat(",,,,,,,,0");
		if($acc->isAccess(4)){
			//$rec->setDel("index.php","id","id","sessiontab=1&sub=15");
			//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		}
	//	$rec->setSearch("".$dbprefix."member.sp_code,mdate");
	//	$rec->setSearchDesc("รหัสสมาชิก,วันสมัคร");
		if($acc->isAccess(2))
			//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
		$rec->setSum(true,false,",,,,,,,true,true");	
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","member".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","member".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","ดู");
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	}

?>