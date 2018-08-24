<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprintw.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=6&sub=88&state=3&bid='+id;
		}
	}
</script>
<?
require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,".$dbprefix."rvpoint.txtoption,".$dbprefix."rvpoint.id,".$dbprefix."rvpoint.uid as uid,sano,txtCash,txtFuture,txtTransfer,txtCredit1+txtCredit2+txtCredit3 as txtCredit,sadate,txtMoney ,".$dbprefix."member.name_t";
$sql .= ",CASE ".$dbprefix."rvpoint.mcode WHEN '' THEN ".$dbprefix."rvpoint.inv_code  ELSE ".$dbprefix."rvpoint.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."rvpoint ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."rvpoint.mcode=".$dbprefix."member.mcode) "; 
//WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;

//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("rvpoint_del.php");
	}else if($_GET['state']==2){
		include("rvpoint_editadd.php");
	}else if($_GET['state']==3){
		include("rvpoint_cancel.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" sano ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=88");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,sano,smcode,name_t,txtMoney,txtoption,uid");
		$rec->setFieldFloatFormat(",,,,2,,,,2,,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,จำนวนRV,หมายเหตุ,สาขา หรือ พนักงาน");
		$rec->setFieldAlign("center,center,center,left,right,left,right,right,right,right,right,right,center");
		$rec->setFieldSpace("8%,4%,8%,15%,8%,50%,8%,8%,8%,8%");
		//$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
		$rec->setSearch("sano,".$dbprefix."rvpoint.mcode,name_t,sadate,tot_pv,total,".$dbprefix."rvpoint.uid");
		$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,สาขาหรือพนักงาน");
		$rec->setSum(true,false,",,,,true,,,true,true,true,true");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		//$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=88");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=88&state=1","post","delfield");
		}*/
		$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//var_dump($acc->isAccess(2));
		//exit;
		//if($acc->isAccess(2))
			//$rec->setEdit("index.php","id","id","sessiontab=3&sub=88");
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