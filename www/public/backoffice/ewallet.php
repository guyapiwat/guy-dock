<?
include("rpdialog.php");
$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
if(!empty($_GET['bills'])){$bills = $_GET['bills'];}else {if(!empty($_POST['bills'])){$bills = $_POST['bills'];}else{$bills='';}}


$where_bills = findBills("sano","ali_ewallet",$bills);
//echo $where_bills;
rpdialog_sale($_GET['sub'],$fdate,$tdate,$sale);
?>

<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprintw.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=3&sub=23&state=3&bid='+id;
		}
	}
	function sale_look(id){
		var wlink = 'invoice_aprintw_look.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
		//window.location='index.php?sessiontab=3&sub=6&sanooo='+id;
	}
</script>
<?
require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,".$dbprefix."ewallet.id,
CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' END AS checkportal,".$dbprefix."ewallet.lid as lid,sano,txtCash,txtFuture,optionTransfer,txtTransfer,txtCredit1+txtCredit2+txtCredit3 as txtCredit,sadate,txtMoney ,".$dbprefix."ewallet.name_t ";
$sql .= ",CASE ".$dbprefix."ewallet.mcode WHEN '' THEN ".$dbprefix."ewallet.inv_code  ELSE ".$dbprefix."ewallet.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."ewallet ";
//WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
$sql .= " WHERE 1=1 and sa_type <> 'TO' and sa_type <> 'TI'  and sa_type <> 'T' and sa_type <> 'W' ";
if(!empty($sale)){
	if($sale=='A')$sql .= " and ".$dbprefix."ewallet.cancel = '0' ";
	else $sql .= " and ".$dbprefix."ewallet.cancel = '$sale' ";
}
if(!empty($fdate)){
$sql .= " and ".$dbprefix."ewallet.sadate >= '$fdate'  and ".$dbprefix."ewallet.sadate <= '$tdate'  ";
}
if(!empty($where_bills))$sql .= " and ".$where_bills." ";

//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("ewallet_del.php");
	}else if($_GET['state']==2){
		include("ewallet_editadd.php");
	}else if($_GET['state']==3){
		include("ewallet_cancel.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale&bills=$bills");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,sano,smcode,name_t,txtMoney,txtCash,txtTransfer,txtCredit,lid,checkportal");
		$rec->setFieldFloatFormat(",,,,2,2,2,2,,,,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,จำนวนเงินรวม,เงินสด,เงินโอน,บัตรเครดิต,สาขา หรือ พนักงาน,ช่องทาง");
		$rec->setFieldAlign("center,center,center,left,right,right,right,right,right,right,center,right,right,center");
		$rec->setFieldSpace("10%,5%,10%,22%,8%,8%,8%,8%,8%,8%,8%");
		//$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
		$rec->setSearch("sano,".$dbprefix."ewallet.mcode,name_t,sadate,total,".$dbprefix."ewallet.lid");
		$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนเงินรวม,สาขาหรือพนักงาน");
		$rec->setSum(true,false,",,,,true,true,true,true");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","sano","IMAGE","พิมพ์");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		//$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=23");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=23&state=1","post","delfield");
		}*/
		$rec->setSpecial("./images/search.gif","","sale_look","sano","IMAGE","ดู");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//var_dump($acc->isAccess(2));
		//exit;
		//if($acc->isAccess(2))
			//$rec->setEdit("index.php","id","id","sessiontab=3&sub=23");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","ewallet".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","ewallet".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>ดาวน์โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);
		$str2 = "<fieldset ><a href='http://203.146.170.60/~bunny/backoffice/invoice_aprintw.php?bid=$bills' target='_blank'>";
		$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
		$rec->setSpace($str2);
		$rec->showRec(1,'SH_QUERY');
/*$sql = "SELECT cancel,".$dbprefix."asaleh.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		$rec->setQuery($sql);*/
	}

?>