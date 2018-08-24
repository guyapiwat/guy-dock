<script language="javascript" type="text/javascript">
	function sale_print(id){ 
         var wlink = '../invoice/aprint_stockbill_backoffice.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		
		window.open(wlink);
		window.location='index.php?sessiontab=6&sub=60&sanoo='+id;
	}
	function sale_look(id){
         var wlink = '../invoice/aprint_stockbill_backoffice.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		
		window.open(wlink);
		window.location='index.php?sessiontab=6&sub=60&sanooo='+id;
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=6&sub=60&state=3&bid='+id;
		}
	}
	function sale_status(id){
		if(confirm("ต้องการเปลี่ยนแปลงจัดส่ง")){
			window.location='index.php?sessiontab=6&sub=60&state=4&status=sender&sender='+id;
		}
	}
	function sale_receive(id){
		if(confirm("ต้องการเปลี่ยนแปลงรัีบของ")){
			window.location='index.php?sessiontab=6&sub=60&state=4&status=receive&sender='+id;
		}
	}
</script>
<?
require("connectmysql.php");

if($_GET["sanoo"]){
$sqlupdate = "update ".$dbprefix."import_stock_h  set print = print+1 where id = '{$_GET["sanoo"]}'";
mysql_query($sqlupdate);
}

//require("cls/repGenerator_id.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,print,".$dbprefix."import_stock_h.id,".$dbprefix."import_stock_h.txtoption,".$dbprefix."import_stock_h.uid,".$dbprefix."import_stock_h.sender,".$dbprefix."import_stock_h.sender_date,".$dbprefix."import_stock_h.inv_code,".$dbprefix."import_stock_h.tot_pv*discount/100 as discount,total+".$dbprefix."import_stock_h.tot_pv*discount/100 as alltotal,sano,sadate,tot_pv,tot_bv,tot_fv,total,name_t,".$dbprefix."import_stock_h.mcode AS smcode ";
$sql .= ",CASE ".$dbprefix."import_stock_h.sender WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."import_stock_h.sender_date) ELSE concat('<img src=./images/false.gif>',".$dbprefix."import_stock_h.sender_date) END AS sender1 ";
$sql .= ",CASE ".$dbprefix."import_stock_h.receive WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."import_stock_h.receive_date) ELSE concat('<img src=./images/false.gif>',".$dbprefix."import_stock_h.receive_date) END AS receive1 ";
$sql .= ",CASE ".$dbprefix."import_stock_h.send WHEN '2' THEN 'รับเอง' ELSE 'จัดส่ง' END AS send ";


$sql .= "FROM ".$dbprefix."import_stock_h ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."import_stock_h.mcode=".$dbprefix."member.mcode) where  sa_type = 'I' or sa_type = 'IM'  "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$wherecause = " WHERE ";false.gif
//echo $sql;
	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("import_stockbill_del.php");
	}else if($_GET['state']==2){
		include("import_stockbill_editadd.php");
	}else if($_GET['state']==3){
		include("import_stockbill_cancel.php");
	}else if($_GET['state']==4){
		include("import_stockbill_change.php");
	}else if($_GET['state']==5){
		include("rec_change.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=6&sub=60");
		$rec->setBackLink($PHP_SELF,"sessiontab=6");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("print,sadate,sano,txtoption");
		$rec->setFieldFloatFormat(",,,,,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("print,วันที่ซื้อ,เลขบิล,Remark");
		//$rec->setFieldLink(",,,,,,,index.php?sessiontab=6&sub=138&state=4&sender=");
		$rec->setFieldAlign("center,center,center,left,left,right,right,right,right");
		$rec->setFieldSpace("1%,8%,5%,85%");
		//$rec->setFieldLink(",index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,".$dbprefix."import_stock_h.sadate");
		$rec->setSearchDesc("เลขบิล,วันที่ซื้อ");
		//$rec->setSum(true,false,",,,true,true,true,true,true,,,true,true");

		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE","ดู");
		$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");	
		
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		
	//	$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=6&sub=138");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=6&sub=138&state=1","post","delfield");
		}*/
		
		/*if($acc->isAccess(2)){
		//	$rec->setEdit("index.php","id","id","sessiontab=6&sub=138");
			$rec->setSpecial("./images/true.gif","","sale_status","id","IMAGE","จัดส่ง");
		$rec->setSpecial("./images/true.gif","","sale_receive","id","IMAGE","รับของ");
		}*/
		$rec->showRec(1,'SH_QUERY');
/*$sql = "SELECT cancel,".$dbprefix."import_stock_h.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."import_stock_h.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."import_stock_h ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."import_stock_h.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		$rec->setQuery($sql);*/
	}

?>