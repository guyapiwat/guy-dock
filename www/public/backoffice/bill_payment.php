<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprintw.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=3&sub=203&state=3&bid='+id;
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
$sql = "SELECT * ";

//$sql .= ",CASE status WHEN '1' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&bill_payment=true&amount=',amount,'&bill_no=',bill_no,'&state=4\"><img src=\"./images/true.gif\"></a>') ";

//$sql .= "ELSE CONCAT('<img src=\"./images/false.gif\">') END AS refill ";

$sql .= " FROM ".$dbprefix."billpayment ";

	if($_GET['state']==1){
		include("bill_payment_del.php");
	}else if($_GET['state']==2){
		include("bill_payment_editadd.php");
	}else if($_GET['state']==3){
		include("bill_payment_cancel.php");
	}else if($_GET['state']==4){
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
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=7");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("id,no,tx,ref1,ref2,ref3,play_name,cheque_bank,amount,playment_time,teller_id,branch_no,branch_name,cheque_no,fee_zone1,fee_zone2,uid");
		$rec->setFieldFloatFormat(",,,,,,,,,,2,,,,");
		$rec->setFieldDesc("No.,Tx,Reference No-1,Reference No-2,Reference No-3,Payer Name,Cheque Bank Code,Amount,Payment_Time,Teller_ID,Branch_No,Branch_Name,Cheque No,Fee (Same Zone),Fee (Diff Zone),uid");
		$rec->setFieldAlign("center,center,center,left,right,right,right,right,right,right,right,right,center");
		//$rec->setFieldSpace("3%,3%,5%,8%,8%,8%,15%,15%,8%,,,,,,,,3%");
		$rec->setSearch("id,no,tx,ref1,ref2,ref3,play_name,cheque_bank,amount,playment_time,teller_id,branch_no,branch_name,cheque_no,fee_zone1,fee_zone2,uid");
		$rec->setSearchDesc("No.,Tx,Reference No-1,Reference No-2,Reference No-3,Payer Name,Cheque Bank Code,Amount,Payment_Time,Teller_ID,Branch_No,Branch_Name,Cheque No,Fee (Same Zone),Fee (Diff Zone),uid");
		//$rec->setSum(true,false,",,,,,,,,,,true,,");
		//$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE","เติมเงิน");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","เติมเงิน");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		//$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=203");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=203&state=1","post","delfield");
		}*/
		//$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE","ดู");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//var_dump($acc->isAccess(2));
		//exit;
		//if($acc->isAccess(2))
			//$rec->setEdit("index.php","id","id","sessiontab=3&sub=203");
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