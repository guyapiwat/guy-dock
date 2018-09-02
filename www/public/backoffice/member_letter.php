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


	$sql = "SELECT mcode,name_t,email,mobile,pos_cur,cname_t,CASE locationbase WHEN '1' THEN 'TH' END AS cshort, ";
	$sql .= "CONCAT(address,' ต.',cdistrictId,' อ.',camphurId,' จ.',cprovinceId,' ',zip) AS address ";
	$sql .= "FROM ".$dbprefix."member ";
	//$sql .= "LEFT JOIN district ON (".$dbprefix."member.cdistrictId=district.districtId) ";
	//$sql .= "LEFT JOIN amphur ON (".$dbprefix."member.camphurId=amphur.amphurId) ";
	//$sql .= "LEFT JOIN province ON (".$dbprefix."member.cprovinceId=province.provinceId) ";
	$sql .= "LEFT JOIN ".$dbprefix."location_base ON (".$dbprefix."member.locationbase=".$dbprefix."location_base.cid) ";
	?>
    <br />
    <!--table><tr><td></td></tr></table-->
	<?
	$rec = new repGenerator();
	
	$charset = "SET NAMES 'UTF8'"; 
	mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
		

    $rec->setQuery($sql);
    $rec->setSort($_GET['srt']==""?"ASC":$_GET['srt']);
    $rec->setOrder($_GET['ord']==""?"mcode":$_GET['ord']);
	$rec->setLimitPage("5000");
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
    $rec->setShowField("mcode,name_t,address,mobile,pos_cur,email,cshort");
    //$rec->setFieldFloatFormat(",,,,,,0,2");
    $rec->setFieldDesc("รหัสสมาชิก,ชื่อ,ที่อยู่,เบอร์โทร,ตำแหน่ง,email,LB");
    $rec->setFieldAlign("center,left,left,left,center");
    $rec->setFieldSpace("6%,15%,50%,5%,5%,15%");
    $rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
    $rec->setSearch("mcode,name_t,mobile,pos_cur,cshort");
    $rec->setSearchDesc("รหัสสมาชิก,ชื่อ,เบอร์โทร,ตำแหน่ง,LB");
   $str = "<fieldset><a href='member_letterprint1.php?sessiontab=1&sub=11' target='_blank'>";
    $str .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
   	//	$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
//	$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a>";
// $str = "<a href='member_letterprint1.php?sessiontab=1&sub=11' target='_blank'>";
   // $str .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
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
	
	if($_GET['excel']==1){
		
			logtext(true,$_SESSION["adminusercode"],'Export Excel : ที่อยู่สมาชิก','');
			$text="uid=".$_SESSION["adminusercode"]." action=member_export_excel =>$sql";
			writelogfile($text);

			$rec->exportXls("ExportXls","memberletter".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","memberletter".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
 
		$rec->setSpecial("./images/Amber-Printer.gif","","letter_print","mcode","IMAGE","พิมพ์");
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
	//		$rec->setSpecial("./images/true.gif","","sale_status","id","IMAGE","Reset Password");
	$rec->setSpace($str);
    $rec->showRec(1,'SH_QUERY');
    mysql_close($link);

?>