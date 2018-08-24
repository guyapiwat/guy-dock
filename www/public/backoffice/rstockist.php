<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_rprint_stockist.php?bid='+id;
		window.open(wlink);
	}
	function sale_print(id){
		var wlink = 'invoice_rprint_stockist.php?bid='+id;
		window.open(wlink);
	}
	function sale_cancel(id,chktype,send,sanox){
		if(confirm("ต้องการยกเลิกบิลนี้")){
		//	window.location='index.php?sessiontab=5&sub=24&state=3&bid='+id;
			window.location='index.php?sessiontab=6&sub=24&state=3&bid='+id+'&chktype='+chktype+'&send='+send+'&sano='+sanox;
		}
	}

</script>
<?
if(!empty($_GET["sano"]))$sano = $_GET["sano"];
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT '".$_GET["chktype"]."' as chktype,'".$_GET["send"]."' as sendx ,'".$_GET["sano"]."' as sanox ,cancel,".$dbprefix."risaleh.id,".$dbprefix."risaleh.inv_code,hono,sano,DATE_FORMAT(".$dbprefix."risaleh.sadate, '%d-%m-%Y') as sadate,tot_pv,total,name_t,hstatus,".$dbprefix."risaleh.inv_code AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd ";
$sql .= "FROM ".$dbprefix."risaleh where hstatus = 0 and inv_from = '' ";
//$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."risaleh.mcode=".$dbprefix."member.mcode) where hstatus = 0  and cancel = 0 "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$wherecause = " WHERE ";
if(!empty($sano)){
	$sql .= " and sano = '$sano' ";
}
if($_GET["send"] == '2'){
$sql .= " and send = '1' ";
}else{
$sql .= " and send != '1' ";
}

if(empty($_GET["sano"]))$sql .= " and cancel = '0' ";
//echo $sql;
//
//echo $sql;
//echo  $sql;
	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	
	if($_GET['state']==1){
		include("set_remark1.php");
	}else if($_GET['state']==2){
		//echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=9'</script>";	
		include("hold_editadd.php");
	}else if($_GET['state']==3){
		include("rstockist_cancel.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=6&sub=24");
		$rec->setBackLink($PHP_SELF,"sessiontab=6");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("hono,smcode,name_t,sadate,tot_pv,total");
		$rec->setFieldFloatFormat(",,,,,,,2,2");
		$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldAlign("center,center,left,center,right,right,right");
		$rec->setFieldSpace("5%,10%,45%,7%,10%,10%,10%");
	//	$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("hono,sano,".$dbprefix."risaleh.mcode,name_t,sadate,tot_pv,total");
		$rec->setSearchDesc("เลขบิล,บิลโฮล์ด,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setSum(true,false,",,,,,,,true,true");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		$rec->setSpecial("./images/cancel.gif","","sale_cancel","id,chktype,sendx,sanox","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		$rec->setFromDelAttr("maindel","./index.php?sessiontab=5&sub=23&state=1","post","delfield");
		if($acc->isAccess(2)){
		//	$rec->setDel("index.php","id","id","sessiontab=5&sub=10");
		//	$rec->setFromDelAttr("maindel","./index.php?sessiontab=5&sub=23&state=1","post","delfield");
		}
		//if($acc->isAccess(2))
		//	$rec->setEdit("index.php","bid,id","sano,id","sessiontab=5&sub=10&state=2");
		$rec->showRec(1,'SH_QUERY');
		//mysql_close($link);
	}

?>