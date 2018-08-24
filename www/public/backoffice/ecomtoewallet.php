<?
include("rpdialog.php");
$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
rpdialog_m($_GET['sub']);
?>

<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprintw.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("<?=$wording_lan['Bill_21']?>")){
			window.location='index.php?sessiontab=3&sub=148&state=3&bid='+id;
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
$sql = "SELECT t.sano,t.sadate,t.mcode,t.uid,m.name_t,t.total,t.cancel ";
$sql .= ",CASE t.checkportal WHEN '3' THEN 'ONLINE' ELSE '' END as checkportal1 ";
$sql .= " FROM ".$dbprefix."ewallet t";
$sql .= " LEFT JOIN ".$dbprefix."member m ON(t.mcode=m.mcode)";
$sql .= " where t.txtCommission > 0  and t.sa_type='T' and t.id_ecom <> 0 "; 
if($sale!=""){
$sql .= " and t.cancel = '$sale' ";
}
//var_dump($_POST);
if($strfdate !="" and $strtdate !=""){
$sql .= " and t.sadate >= '$strfdate'  and t.sadate <= '$strtdate'  ";
}
//echo $sql;

//echo $sql;
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
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&strfdate=$strfdate&strtdate=$strtdate&sale=$sale");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,sano,uid,name_t,mcode,total,checkportal1");
		$rec->setFieldFloatFormat(",,,,,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		//$rec->setFieldDesc("วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,จำนวนเงินรวม,เงินสด,เงินโอน,บัตรเครดิต,สาขา หรือ พนักงาน");
		$rec->setFieldDesc("วันที่,เลขที่บิล,รหัสผู้โอน,ชื่อผู้โอน,รหัสผู้รับ,จำนวนเงิน,ช่องทาง");
		$rec->setFieldAlign("center,left,center,left,center,right,right");
		$rec->setFieldSpace("10%,15%,8%,35%,8%,15%,15%");
		//$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
		$rec->setSearch("t.sadate,t.sano,t.uid,m.name_t,t.mcode,t.total");
		$rec->setSearchDesc("วันที่,เลขที่บิล,รหัสผู้โอน,ชื่อผู้โอน,รหัสผู้รับ,จำนวนเงิน");
	//	$rec->setSearchDesc($wording_lan["Billjang_4"].",".$wording_lan["Billjang_1"].",".$wording_lan["Billjang_2"].",".$wording_lan["Billjang_3"].",".$wording_lan["Billjang_6"].",".$wording_lan["Billjang_11"].",".$wording_lan["Billjang_12"].",".$wording_lan["Billjang_17"]);
		$rec->setSum(true,false,",,,,,true,");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE",$wording_lan["Bill_print"]);
		//$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE",$wording_lan["Bill_view"]);
		if($acc->isAccess(4) and $_SESSION["inventobj6"] == '7'){
			//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE",$wording_lan["Bill_cancle"]);
		}	
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=148");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=148&state=1","post","delfield");
		}*/
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//var_dump($acc->isAccess(2));
		//exit;
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","ewallet".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","ewallet".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>".$wording_lan["Billjang_loding"]." Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>".$wording_lan["Billjang_cre"]." Excel</a></fieldset>";
		//$rec->setSpace($str);
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