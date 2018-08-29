<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>Snatur</title>
<link rel="stylesheet" type="text/css" href="./../style.css" />

<? include("prefix.php");?>
<table align="center"><tr>	<td align="center"><b>รายงาน Stock ณ วันที่</b></td></tr>

</table>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");
$sql = "SELECT a.pcode,a.id,p.pdesc,a.qty,a.inv_code from ".$dbprefix."product_invent_tmp a left join ".$dbprefix."product p on (a.pcode = p.pcode)  where a.qty <> '0'  ";
//echo $sql;
$_GET['excel'] = '1';
		//echo $sql;
	$rec = new repGenerator();
	$rec->setQuery($sql);
	$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
	$rec->setOrder($_GET['ord']==""?" a.inv_code ":$_GET['ord']);
	$rec->setLimitPage("5000");	
	if(isset($_POST['skey']))
		$rec->setCause($_POST['skey'],$_POST['scause']);
	else if(isset($_GET['skey']))
		$rec->setCause($_GET['skey'],$_GET['scause']);
	$rec->setSize("95%","");
	$rec->setAlign("center");
	$rec->setPageLinkAlign("right");
	//$rec->setPageLinkShow(false,false);
	$rec->setLink($PHP_SELF,"sessiontab=7&sub=53&fpcode=$fpcode&tpcode=$tpcode&fdate=$fdate&tdate=$tdate&satype=$satype&logistic=$logistic&strpv=$strpv&strtotal=$strtotal&struid=$struid&sspv=$sspv&inv_code=$inv_code&inv_code1=$inv_code1&strSearch=$strSearch&strtype=$strtype&sregister=$sregister&okok=1");
	$rec->setBackLink($PHP_SELF,"sessiontab=7");
	if(isset($page))
		$rec->setCurPage($page);
	$rec->setShowField("pcode,pdesc,qty,inv_code");
	$rec->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,จำนวน,สาขา");
	$rec->setFieldFloatFormat(",,0");
	$rec->setFieldAlign("center,left,right,center");
	$rec->setFieldSpace("10%,70%,10%,10%");
	$rec->setFieldLink(",");
//	$rec->setSearch("inv_code");
//	$rec->setSearchDesc("สาขา");
	//$rec->setSum(true,false,",,true,true,true,true");
	if($_GET['excel']==1){
		$rec->exportXls("ExportXls","sale_bill_product".date("Ym").".xls","SH_QUERY");
		$str = "<fieldset><a href='".$rec->download("ExportXls","sale_bill_product".date("Ym").".xls")."' >";
		$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
		//$rec->getParam();
//$rec->setSpace($str);
	}
			//$rec->setSpecial("print","","sale_look","id,rcode","TEXT","print");

	//$rec->setSpecial("./images/search.gif","","view","id","IMAGE","");
	//$str = "<fieldset ><a href='".$rec->getParam()."&excel=1' target='_self'>";
	//$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
	//$rec->setSpace($str);
	$rec->showRec(1,'SH_QUERY');
?>