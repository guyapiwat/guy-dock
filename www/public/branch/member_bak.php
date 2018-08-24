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

<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT * FROM ".$dbprefix."member ";
// JOIN เมื่อต้องการข้อมูลวันหมดอายุในโปรแกรม
//$sql = "SELECT ".$dbprefix."member.*,taba.exp_date FROM ".$dbprefix."member ";
//$sql .= "LEFT JOIN (SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate GROUP BY mid) AS taba ON (".$dbprefix."member.id=taba.mid) where inv_code = '".$_SESSION["admininvent"]."' ";

$sql = "SELECT ".$dbprefix."member.*,taba.exp_date FROM ".$dbprefix."member ";
$sql .= "LEFT JOIN (SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate GROUP BY mid) AS taba ON (".$dbprefix."member.id=taba.mid) where mcode >= '".$_SESSION["code_ref"]."' ";
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("member_editadd.php");
	}else if($_GET['state']==2){
		include("member_editadd1.php");
	}else if($_GET['state']==3){
	//	include("member_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
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
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=666");
		$rec->setBackLink($PHP_SELF,"sessiontab=3&sub=666");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
		//$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
		$rec->setFieldAlign("center,left,center,center,center,center,center");
		$rec->setFieldSpace("10%,35%,10%,10%,10%,10%,10%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("mcode,name_t");
		$rec->setSearchDesc("รหัสสมาชิก,ชื่อ");
			$rec->setEdit("index.php","id","id","sessiontab=3&sub=666");

		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","member".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","member".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		};
		$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","ดู");
		
		//$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	}

?>