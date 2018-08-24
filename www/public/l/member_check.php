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
require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT * FROM ".$dbprefix."member ";
// JOIN เมื่อต้องการข้อมูลวันหมดอายุในโปรแกรม
$mm = date("Y-m");
//$mm = date("Y");
$sql = "SELECT ".$dbprefix."member.*,asa.all_pv,DATE_FORMAT(".$dbprefix."member.mdate, '%Y-%m-%d') as mdate FROM ".$dbprefix."member ";
$sql .= "LEFT JOIN (SELECT sum(tot_pv) AS all_pv,mcode  FROM ".$dbprefix."asaleh WHERE  sa_type='A' and cancel=0 group by mcode) AS asa ON (".$dbprefix."member.mcode=asa.mcode) where sp_code = '{$_SESSION["usercode"]}' and mdate like '%$mm%'";

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
		$rec->setLink($PHP_SELF,"sessiontab=1&sub=5");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("mcode,name_t,mdate,exp_date,pos_cur,upa_code,sp_code,ewallet,all_pv");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,กระเป๋าเงิน,คะแนนส่วนตัว");
		$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code,all_pv");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,คะแนนแนะนำ");
		//$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
		$rec->setFieldAlign("center,left,center,center,center,center,center,right,right");
		$rec->setFieldSpace("8%,35%,8%,8%,8%,8%,8%,8%,8%");
	//	$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSum(true,false,",,,,,,true,true");	
		$rec->setFieldFloatFormat(",,,,,,0,,0");
	
		$rec->setSearch("".$dbprefix."member.mcode,".$dbprefix."member.name_t,".$dbprefix."member.mdate");
		$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร");
			
	
		
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	}

?>