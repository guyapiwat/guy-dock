<?
require("connectmysql.php");

if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
	if(isset($_POST["tdate"]))
		$tdate = $_POST["tdate"];
	else if(isset($_GET["tdate"]))
		$tdate = $_GET["tdate"];
		
if(isset($_POST["strSearch"]))
		$strSearch = $_POST["strSearch"];
	else if(isset($_GET["strSearch"]))
		$strSearch = $_GET["strSearch"];
		
?>
<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint_product.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
</script>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<form style="margin-bottom:0;" action="index.php?sessiontab=3&sub=30" method="post">
<table style="margin-left:20;" width="1100" border="0">
  <tr valign="top"><td width="1000" align="center" ><fieldset>
	<input size="14" type="text" name="fdate" value="<?=$fdate?>" />
	<a href="javascript:NewCal('fdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="เลือกวันที่" /></a>  ถึง
	<input size="14" type="text" name="tdate" value="<?=$tdate?>" />
	<a href="javascript:NewCal('tdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="เลือกวันที่" /></a>
	<input type="text" name="strSearch" value="<?=$strSearch?>">
    <input type="submit" value="ค้น" />
</fieldset></td>
<td align="center" width="110"></td>
</tr></table>
</form>
<?
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT *,b.bbuy_Balance+b.bbuy_Qua as total,b.txtoption,b.bbuy_ID as bid FROM ".$dbprefix."product as a ,".$dbprefix."bbuy as b where a.pcode = b.pcode  ";
if(!empty($fdate))$sql .= " and bbuy_Date between '$fdate' and '$tdate' ";
if(!empty($strSearch))$sql .= " and a.pcode LIKE '%$strSearch%' ";
	if($_GET['state']==1){
		include("bproduct_del.php");
	}else if($_GET['state']==2){
		include("bproduct_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" b.bbuy_ID ":$_GET['ord']);
		//$rec->setSort($_GET['srt']);
		//$rec->setOrder($_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=30&fdate=$fdate&tdate=$tdate&strSearch=$strSearch");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("pcode,pdesc,bbuy_Balance,bbuy_Qua,total,bbuy_Date,txtoption");
		$rec->setFieldDesc("รหัสสินค้า,รายละเอียด,จำนวนคงเหลือ,จำนวน,ยอดรวม,วันที่สั่งซื้อ,หมายเหตุ");
		$rec->setFieldAlign("center,left,center,center,right,center,left");
		$rec->setFieldSpace("10%,20%,10%,10%,10%,8%,32%");
		$rec->setFieldLink(",");
		if($acc->isAccess(4)){
			//$rec->setDel("index.php","bbuy_ID","bbuy_ID","sessiontab=3&sub=30");
			//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=30&state=1","post","delfield");
		}
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","buyproduct".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","buyproduct".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}

		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","bid","IMAGE","พิมพ์");
		/*if($acc->isAccess(2))
			$rec->setEdit("index.php","pcode","pcode","sessiontab=3&sub=1");*/
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>