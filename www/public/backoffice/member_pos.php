<script language="javascript" type="text/javascript">
	
	function sale_status(id){
	//	if(confirm("ต้องการเปลี่ยนแปลงการรับของ")){
			window.location='index.php?sessiontab=2&sub=1&state=3&id='+id;
	//	}
	}
</script>
<?
require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT ".$dbprefix."member.*,DATE_FORMAT(".$dbprefix."member.mdate, '%Y-%m-%d') as mdate FROM ".$dbprefix."member ";
$sql .= " where 1=1 ";
	if($_GET['state']==2){
		include("member_pos_edit.php");
	}else if($_GET['state']==3){
		include("member_pos_edit1.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" mdate ":$_GET['ord']);
		//$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
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
		$rec->setShowField("mcode,name_t,mdate,pos_cur,pos_cur2,upa_code,sp_code");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,เกียรติยศ,รหัสอัพไลน์,รหัสผู้แนะนำ");
		$rec->setFieldAlign("center,left,center,center,center,center,center");
		$rec->setFieldSpace("10%,40%,10%,10%,10%,10%,10%");
		$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("".$dbprefix."member.mcode,".$dbprefix."member.name_t,".$dbprefix."member.mdate,".$dbprefix."member.pos_cur,".$dbprefix."member.pos_cur2,".$dbprefix."member.upa_code,".$dbprefix."member.sp_code");
		$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,เกียรติยศ,รหัสอัพไลน์,รหัสผู้แนะนำ");
	//	$rec->setSpecial("./images/true.gif","","sale_status","id","IMAGE","เข็ม");
		$rec->setEdit("index.php","id","id","sessiontab=2&sub=1");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	}

?>