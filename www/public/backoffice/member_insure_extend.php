<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql  = "SELECT SUBDATE(".$dbprefix."expdate.exp_date,INTERVAL 1 Year) as mdate,national,name_f,id_card,irelation,".$dbprefix."location_base.cshort,iphone,mcode,name_t,'บริษัท ซัคเซสมอร์ บีอิ้งค์ จำกัด' as successmore  ";
$sql .= ",CASE mtype WHEN '1'  THEN name_b ELSE concat(name_f,' ',name_t) END AS mname ";
$sql .= ",CASE ccmp WHEN 'ครบ'  THEN cname_f ELSE '' END AS iname_f ";
$sql .= ",CASE ccmp WHEN 'ครบ'  THEN cname_t ELSE '' END AS iname_t ";
$sql .= ",CASE ccmp WHEN 'ครบ'  THEN cid_card ELSE '' END AS iid_card ";
$sql .= "FROM ".$dbprefix."expdate  ";
$sql .= "left join ".$dbprefix."member on  ".$dbprefix."member.id = ".$dbprefix."expdate.mid    ";
$sql .= "left join ".$dbprefix."location_base on  ".$dbprefix."member.locationbase = ".$dbprefix."location_base.cid where ".$dbprefix."expdate.exp_type = 'extend'  ";

//var_dump($fdate);
if($fdate!=""){
	$sql .= " and SUBDATE(".$dbprefix."expdate.exp_date,INTERVAL 1 Year) BETWEEN '$fdate' AND '$tdate'  ";
}
if($locationbase !=""){
	 $sql .= " and  ".$dbprefix."location_base.cid = '$locationbase' ";
}
//echo $sql;
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	/*if($_GET['state']==1){
		include("member_del.php");
	}else if($_GET['state']==2){
		include("member_editadd.php");
	}else{*/
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" mcode ":$_GET['ord']);
		$rec->setLimitPage("50000");	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=1&sub=21&fdate=$fdate&tdate=$tdate&locationbase=$locationbase&stype=$stype");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("mcode,mname,id_card,iname_f,iname_t,iid_card,successmore,mdate,cshort,national");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อสกุลผู้สมัครหลัก,เลขที่บัตรผู้สมัครหลัก,คำนำหน้าผู้สมัครร่วม,ชื่อสกุลผู้สมัครร่วม,เลขที่บัตรผู้สมัครร่วม,ผู้รับผลประโยชน์,วันที่สมัคร,LB,สัญชาติ");
		$rec->setFieldAlign("center,left,center,center,left,center,left,center");
		$rec->setFieldSpace("7%,20%,10%,5%,20%,10%,15%,8%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
	//	$rec->setSearch("mcode,name_t,mdate,cshort");
	//	$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,วันสมัคร,LB");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","member_insure".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","member_insure".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		//$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","");
		$str = "<fieldset ><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);

		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	//}

?>