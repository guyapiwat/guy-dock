<?
include("rpdialog.php");
$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
rpdialog_m($_GET['sub']);
?>
<?
require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT t.sano,t.sadate,t.mcode,t.uid,m.name_t,t.total ";
$sql .= " FROM ".$dbprefix."ewallet t";
$sql .= " LEFT JOIN ".$dbprefix."member m ON(t.mcode=m.mcode)";
$sql .= " where t.txtWithdraw > 0 and sa_type='W' "; 
if($sale!=""){
$sql .= " and t.cancel = '$sale' ";
}
if($fdate !="" and $tdate !=""){
$sql .= " and t.sadate >= '$fdate'  and t.sadate <= '$tdate'  ";
}

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
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sadate,sano,mcode,name_t,total");
		$rec->setFieldSpace("8%,20%,10%,35%,20%,15%");
		$rec->setFieldFloatFormat(",,,,2,");
		$rec->setSum(true,false,",,,,true,");
		$rec->setFieldDesc("วันที่,เลขที่บิล,รหัสสมาชิก,ชื่อ-สมาชิก,จำนวนเงิน");
		$rec->setFieldAlign("center,left,center,left,right,center");
		$rec->setSearch("t.sano,t.mcode,m.name_t,t.total");
		$rec->setSearchDesc("เลขที่บิล,รหัสสมาชิก,ชื่อ-สมาชิก,จำนวนเงิน");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
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
	

?>