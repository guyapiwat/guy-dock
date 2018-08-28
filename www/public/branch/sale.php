<?
include("rpdialog.php");
 
rpdialog_sale($_GET['sub'],$fdate,$tdate,$sale);
?>
<script language="javascript" type="text/javascript">
	function sale_print(id){
		link = '<?=$actual_link?>invoice/aprint_sale.php';  
        var wlink = link+'?bid='+id; 
        window.open(wlink);  
	}
	function sale_look(id){
		var wlink = 'invoice_hprint1.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=3&sub=6&state=3&bid='+id;
		}
	}
</script>
<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT ".$dbprefix."holdhead.cancel,".$dbprefix."holdhead.id,".$dbprefix."holdhead.inv_code,".$dbprefix."holdhead.hono,".$dbprefix."holdhead.sano,DATE_FORMAT(".$dbprefix."holdhead.sadate, '%Y-%m-%d') as sadate,".$dbprefix."holdhead.tot_pv,".$dbprefix."holdhead.total,".$dbprefix."member.name_t,".$dbprefix."holdhead.mcode AS smcode,".$dbprefix."holdhead.uid,".$dbprefix."holdhead.sano,".$dbprefix."asaleh.sano as ssano,".$dbprefix."asaleh.mcode as smcode1,".$dbprefix."asaleh.name_t as sname_t";
$sql .= ",CASE ".$dbprefix."holdhead.sa_type WHEN 'A' THEN '".$wording_lan['satype']['A']."' WHEN 'B' THEN '".$wording_lan['satype']['B']."' WHEN 'C' THEN '".$wording_lan['satype']['C']."' WHEN 'Q' THEN '".$wording_lan['satype']['Q']."' WHEN 'H' THEN '".$wording_lan['satype']['H']."'   END AS preserve ";
$sql .= "FROM ".$dbprefix."holdhead ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."holdhead.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
$sql .= "LEFT JOIN ".$dbprefix."asaleh ON (".$dbprefix."asaleh.id=".$dbprefix."holdhead.sano) WHERE ".$dbprefix."holdhead.locationbase ='".$_SESSION['inv_locationbase']."' "; //WHERE smcode='".$_SESSION['usercode']."' 

//$sql .= " WHERE 1=1 ";
if(!empty($sale)){
	if($sale=='A')$sale = 0;
$sql .= " and ".$dbprefix."holdhead.cancel = '$sale' ";
}
if(!empty($fdate)){
$sql .= " and ".$dbprefix."holdhead.sadate >= '$fdate'  and ".$dbprefix."holdhead.sadate <= '$tdate'  ";
}
if(!empty($inv))$sql .= " and inv_code like '%$inv%'  ";



//echo $sql;
//$sql .= " where   ".$dbprefix."holdhead.inv_code = '{$_SESSION["admininvent"]}'  "; //WHERE smcode='".$_SESSION['usercode']."' 
//$wherecause = " WHERE ";
//echo $sql;
	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("sale_del.php");
	}else if($_GET['state']==2){
		include("sale_editadd.php");
	}else if($_GET['state']==3){
		include("hold_cancel.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" hono ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("hono,preserve,smcode,name_t,sadate,tot_pv,total,ssano,smcode1,sname_t,uid");
		$rec->setFieldFloatFormat(",,,,,2,2");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,เลขที่บิล BMC,รหัสผู้ซื้อ BMC,ชื่อผู้ซื้อ BMC,ผู้บันทึก");

		$rec->setFieldDesc($wording_lan["Billjang_1"].",ประเภทบิล,".$wording_lan["Billjang_2"].",".$wording_lan["Billjang_3"].",".$wording_lan["Billjang_41"].",".$wording_lan["Billjang_5"].",".$wording_lan["Billjang_6"].",".$wording_lan["Billjang_7"].",".$wording_lan["Billjang_8"].",".$wording_lan["Billjang_9"].",".$wording_lan["Billjang_10"]);
		
		
		$rec->setFieldAlign("left,center,center,left,center,right,right,center,center,left,right");
		$rec->setFieldSpace("5%,8%,8%,20%,7%,7%,7%,10%,10%,20%");
		//$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("hono,".$dbprefix."asaleh.sano,".$dbprefix."holdhead.mcode,".$dbprefix."holdhead.name_t,".$dbprefix."asaleh.mcode,".$dbprefix."holdhead.sadate,".$dbprefix."holdhead.tot_pv,".$dbprefix."holdhead.total");
	//	$rec->setSearchDesc("เลขบิล,บิล BMC,รหัสผู้ถูกแจง,ชื่อถูกผู้แจง,รหัสผู้ซื้อ BMC,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		
		$rec->setSearchDesc($wording_lan["Billjang_1"].",".$wording_lan["Billjang_7"].",".$wording_lan["Billjang_2"].",".$wording_lan["Billjang_3"].",".$wording_lan["Billjang_8"].",".$wording_lan["Billjang_41"].",".$wording_lan["Billjang_5"].",".$wording_lan["Billjang_6"]);
		$rec->setSum(true,false,",,,,,true,true");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE",$wording_lan["Bill_print"]);
		$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE",$wording_lan["Bill_view"]);
//		$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		if($acc->isAccess(4) and $_SESSION["inventobj6"] >= '7'){
		$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE",$wording_lan["Bill_cancle"]);				}//$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//if($acc->isAccess(4)){
		//	$rec->setDel("index.php","id","id","sessiontab=3&sub=6");
		//	$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=6&state=1","post","delfield");
		//}
		if($_GET['excel']==1){

			$rec->exportXls("ExportXls","hold".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","hold".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);
		//if($acc->isAccess(2))
		//	$rec->setEdit("index.php","id","id","sessiontab=3&sub=6");
		$rec->showRec(1,'SH_QUERY');
/*$sql = "SELECT cancel,".$dbprefix."holdhead.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."holdhead.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."holdhead ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."holdhead.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		$rec->setQuery($sql);*/
	}

?>