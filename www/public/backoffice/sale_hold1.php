<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint.php?bid='+id;
		window.open(wlink);
	}
	function hold(id){
		window.location='index.php?sessiontab=5&sub=99&state=3&bid='+id;
	}
	function sale_hcancel(id){
		if(confirm("ยืนยันการ update")){
			window.location='index.php?sessiontab=5&sub=99&state=1&bid='+id;
		}
	}
</script>
<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT sano,hcancel,".$dbprefix."asaleh.id,sano,DATE_FORMAT(".$dbprefix."asaleh.sadate, '%d-%m-%Y') as sadate,tot_pv as tot_pv,total as total,name_t as inv_desc,".$dbprefix."asaleh.mcode AS inv_code ";
$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) WHERE sa_type='H' and hcancel=1 "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("sale_hcancel1.php");
	}else if($_GET['state']==2){
		include("hold_editadd.php");
	}else if($_GET['state']==3){
		include("hold_editadd.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=99");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sano,inv_code,sadate,inv_desc,tot_pv,total");
		$rec->setFieldFloatFormat(",,,,0,2");
		$rec->setFieldDesc("เลขที่,รหัสสมาชิก,วันที่Holdยอด,ชื่อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldAlign("center,center,center,center,right,right,");
		$rec->setFieldSpace("12%,12%,40%,12%,12%,12%");
		$rec->setFieldLink(",index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,sadate,smcode,name_t,sadate,tot_pv,total");
		$rec->setSearchDesc("เลขบิล,วันที่Holdยอด,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setSum(true,false,",,,,true,true");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE");
		//$rec->setSpecial("./images/false.gif","","sale_cancel","id","IMAGE");
		//$rec->setSpecial("./images/hold_s.gif","","hold","id","IMAGE","แจง");
		//if($acc->isAccess(4)){
			$rec->setSpecial("./images/cancel.gif","","sale_hcancel","id","IMAGE","update");
		//}
		//$rec->setHLight("hcancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=6");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=6&state=1","post","delfield");
		}*/
		/*if($acc->isAccess(2))
			$rec->setEdit("index.php","id","id","sessiontab=3&sub=6");*/
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>