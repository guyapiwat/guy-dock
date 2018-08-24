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
require("./cls/repGenerator.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,".$dbprefix."eatoship.id,".$dbprefix."eatoship.uid as uid,sano,txtCash,txtFuture,txtTransfer,txtInternet,txtCredit1+txtCredit2+txtCredit3 as txtCredit,txtCommission as txtCommission,
CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' WHEN '9' THEN 'Commission' END AS checkportal,sadate,txtMoney ,concat(".$dbprefix."member.name_f,' ',".$dbprefix."member.name_t) as name_t ";
$sql .= ",CASE ".$dbprefix."eatoship.mcode WHEN '' THEN ".$dbprefix."eatoship.inv_code  ELSE ".$dbprefix."eatoship.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."eatoship ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."eatoship.mcode=".$dbprefix."member.mcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."invent ON (".$dbprefix."eatoship.inv_code=".$dbprefix."invent.inv_code) where ".$dbprefix."eatoship.mcode = '".$_SESSION["usercode"]."' and txtWithdraw = 0 and cancel = 0 "; 
//WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;

//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("ewallet_editadd.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=25");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,sano,smcode,name_t,txtCommission,checkportal");
		$rec->setFieldFloatFormat(",,,,2,,2,2,2,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("วันที่ได้,".$wording_lan["tab4"]["7_2"].",รหัสผู้ได้,ชื่อ,รับจำนวน,".$wording_lan["tab4"]["7_10"]."");
		$rec->setFieldAlign("center,center,center,left,right,right,right,right,right,right,right,center");
		$rec->setFieldSpace("7%,13%,6%,40%,20%,7%,7%,7%,7%,7%");
		//$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
	//	$rec->setSearch("sano,".$dbprefix."ewallet.mcode,name_t,sadate,tot_pv,total,".$dbprefix."ewallet.uid");
	//	$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,สาขาหรือพนักงาน");
		$rec->setSum(true,false,",,,,true ");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=23");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=23&state=1","post","delfield");
		}*/
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//var_dump($acc->isAccess(2));
		//exit;
		//if($acc->isAccess(2))
			//$rec->setEdit("index.php","id","id","sessiontab=3&sub=23");
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