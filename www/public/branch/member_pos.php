<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT * FROM ".$dbprefix."member ";
// JOIN เมื่อต้องการข้อมูลวันหมดอายุในโปรแกรม
$sql = "SELECT ".$dbprefix."member.*,CASE IFNULL(posname,'') WHEN '' THEN 'ไม่มีตำแหน่ง' ELSE posname END AS rposname FROM ".$dbprefix."member ";
$sql .= "LEFT JOIN ".$dbprefix."position ON (".$dbprefix."member.pos_cur=".$dbprefix."position.posshort)";
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==2){
		include("member_pos_edit.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=2&sub=1");
		$rec->setBackLink($PHP_SELF,"sessiontab=2");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("mcode,name_t,pos_cur,rposname");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,ตำแหน่ง,ชื่อตำแหน่ง");
		//$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
		$rec->setFieldAlign("center,left,center,left");
		$rec->setFieldSpace("10%,40%,10%,40%");
		$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
	//	$rec->setDel("index.php","id","id","sessiontab=2&sub=1");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		$rec->setSearch("mcode,name_t,pos_cur,posname");
		$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
		$rec->setEdit("index.php","id","id","sessiontab=2&sub=1");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	}

?>