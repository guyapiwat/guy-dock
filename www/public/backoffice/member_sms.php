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
function confirm_approve(id){
	if(confirm("ยีนยันการเปลี่ยนแปลง")){
		window.location='index.php?sessiontab=1&sub=2&state=3&cmc='+id;
	}
}
</script>

<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if($_GET['state']==1){
		include("send_sms1.php");
	}
	if(!empty($_POST["scause"])){
		$scause = $_POST["scause"];
		$_SESSION["scause"] = "";
	}
	else if(!empty($_GET["scause"])){
		$scause = $_GET["scause"];
		$_SESSION["scause"] = "";
	}

		if(!empty($_POST["skey"])){
		$skey = $_POST["skey"];
		$_SESSION["skey"] = "";
		}
	else if(!empty($_GET["skey"])){
		$skey = $_GET["skey"];
		$_SESSION["skey"] = "";
	}
//	var_dump($_POST);
//echo '<br><br>';
//var_dump($_SESSION);
//echo '<br><br>';
if(!empty($skey))$_SESSION["skey"] = $skey;
//$_SESSION["scause"] = $skey;
if(!empty($scause))$_SESSION["scause"] = $scause;

//var_dump($_SESSION);
//$sql = "SELECT * FROM ".$dbprefix."member ";
// JOIN เมื่อต้องการข้อมูลวันหมดอายุในโปรแกรม
$sql = "SELECT ".$dbprefix."member.*,".$dbprefix."member.id_card,DATE_FORMAT(".$dbprefix."member.mdate, '%Y-%m-%d') as mdate,taba.posname as posname FROM ".$dbprefix."member ";
//$sql .= "LEFT JOIN (SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate GROUP BY mid) AS taba ON (".$dbprefix."member.id=taba.mid)";
$sql .= " LEFT JOIN ".$dbprefix."position1 AS taba ON (".$dbprefix."member.pos_cur1=taba.posshort) group by  ".$dbprefix."member.mobile ";
//echo $sql;
//echo $sql;

//echo $sql;
//$wherecause = " WHERE ";

//var_dump($_REQUEST);echo '<br>';echo '<br>';echo '<br>';
	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		//echo '';
		//include("send_sms.php");
	}else if($_GET['state']==2){
		//include("member_editadd.php");
	}else if($_GET['state']==3){
		include("member_approve.php");
	}else{
		$rec = new repGenerator_sms();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		$rec->setLimitPage("ALL");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=1&sub=18");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("mcode,name_t,mdate,exp_date,pos_cur,upa_code,sp_code,ewallet,all_pv");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,กระเป๋าเงิน,คะแนนส่วนตัว");
		$rec->setShowField("mcode,name_t,id_card,mobile,mdate,sp_code");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,รหัสประชาชน,เบอร์โทรศัพท์,วันที่สมัคร,รหัสผู้แนะนำ");
		//$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
		$rec->setFieldAlign("center,left,center,center,center,center,center,center");
		$rec->setFieldSpace("8%,55%,11%,8%,8%,8%,8%,8%,8%,8%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setFieldFloatFormat(",,,,,,,,,0");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=1&sub=18");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=18&state=1","post","delfield");
		}*/
			$rec->setDel("index.php","id","id","sessiontab=1&sub=18");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=18&state=1","post","delfield");

		$rec->setSearch($dbprefix."member.mcode,".$dbprefix."member.name_t,".$dbprefix."member.mdate,exp_date,".$dbprefix."member.pos_cur,".$dbprefix."member.upa_code,".$dbprefix."member.sp_code,".$dbprefix."member.id_card");
		$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,รหัสประชาชน");
		if($acc->isAccess(2)){
			//$rec->setEdit("index.php","id","id","sessiontab=1&sub=18");
			//$rec->setSpecial("เปลี่ยนสถานะ","","confirm_approve","id","","เปลี่ยนสถานะ");
		}
			
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","member".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","member".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
				$rec->setHLight("approve",1,array("#FF7777","#FF9999"),"HIDE");

		//$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","ดู");
		
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	}

?>