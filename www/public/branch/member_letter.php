<script language="javascript" type="text/javascript">
	function letter_print(mcode){
		var wlink = 'member_letterprint.php?bmcode='+mcode;
		window.open(wlink);
	}
</script>
<?
	require("connectmysql.php");
	if (isset($_GET["pg"])){
		$page=$_GET["pg"];
	} else {
		$page="1";
	}


	$sql = "SELECT mcode,name_t, ";
	$sql .= "CONCAT(address,' ต.',districtName,' อ.',amphurName,' จ.',provinceName,' ',zip) AS address ";
	$sql .= "FROM ".$dbprefix."member ";
	$sql .= "LEFT JOIN district ON (".$dbprefix."member.districtId=district.districtId) ";
	$sql .= "LEFT JOIN amphur ON (".$dbprefix."member.amphurId=amphur.amphurId) ";
	$sql .= "LEFT JOIN province ON (".$dbprefix."member.provinceId=province.provinceId) ";
	?>
    <br />
    <!--table><tr><td></td></tr></table-->
	<?
    $rec = new repGenerator();
    $rec->setQuery($sql);
    $rec->setSort($_GET['srt']==""?"ASC":$_GET['srt']);
    $rec->setOrder($_GET['ord']==""?"mcode":$_GET['ord']);
	$rec->setLimitPage($_GET['lp']);
    if(isset($_POST['skey']))
        $rec->setCause($_POST['skey'],$_POST['scause']);
    else if(isset($_GET['skey']))
        $rec->setCause($_GET['skey'],$_GET['scause']);
    $rec->setSize("95%","");
    $rec->setAlign("center");
    $rec->setPageLinkAlign("right");
    //$rec->setPageLinkShow(false,false);
    $rec->setLink($PHP_SELF,"sessiontab=1&sub=11");
    $rec->setBackLink($PHP_SELF,"sessiontab=1");
    if(isset($page))
        $rec->setCurPage($page);
    $rec->setShowField("mcode,name_t,address");
    //$rec->setFieldFloatFormat(",,,,,,0,2");
    $rec->setFieldDesc("รหัสสมาชิก,ชื่อ,ที่อยู่");
    $rec->setFieldAlign("center,left,left");
    $rec->setFieldSpace("10%,30%,60%");
    //$rec->setFieldLink(",index.php?sessiontab=1&sub=4&cmc=,");
    $rec->setSearch("mcode,name_t");
    $rec->setSearchDesc("รหัสสมาชิก,ชื่อ");
    $str = "<fieldset><a href='member_letterprint1.php?sessiontab=1&sub=11' target='_blank'>";
    $str .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
	$rec->setSpace($str);
	
	/*if($_GET['excel']==1){
		$rec->exportXls("ExportXls","memaddress".date("Ymd").".xls","SH_QUERY");
		$str = "<fieldset><a href='".$rec->download("ExportXls","memaddress".date("Ymd").".xls")."' >";
		$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
		//$rec->getParam();
		$rec->setSpace($str);
	}
	$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
	$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
	$rec->setSpace($str);*/
    //$rec->setSum(true,false,",,,,,,true,true");
    //$rec->setDel("index.php","id","id","sessiontab=3&sub=6");
    $rec->setSpecial("./images/Amber-Printer.gif","","letter_print","mcode","IMAGE","พิมพ์");
    //$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=6&state=1","post","delfield");
    //$rec->setEdit("index.php","id","id","sessiontab=3&sub=6");

    $rec->showRec(1,'SH_QUERY');
    mysql_close($link);

?>