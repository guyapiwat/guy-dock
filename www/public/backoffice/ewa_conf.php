<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_hprint.php?bid='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=3&sub=10&state=3&bid='+id;
		}
	}
</script>
<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,".$dbprefix."billhd.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."billhd.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= "FROM ".$dbprefix."billhd ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."billhd.mcode=".$dbprefix."member.mcode) WHERE trf='1' "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("ewa_hold_del.php");
	}else if($_GET['state']==2){
		//echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=9'</script>";	
		include("ewa_hold_editadd.php");
	}else if($_GET['state']==3){
		include("ewa_hold_cancel.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" sadate ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=10");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sano,smcode,name_t,preserve,ability,sadate,tot_pv,total");
		$rec->setFieldFloatFormat(",,,,,,,2,2");
		$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldAlign("center,center,left,center,center,center,right,right");
		$rec->setFieldSpace("5%,15%,26%,7%,7%,10%,15%,15%");
		$rec->setFieldLink(",index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("hono,sano,".$dbprefix."holdhead.mcode,name_t,sadate,tot_pv,total");
		$rec->setSearchDesc("เลขบิล,บิลโฮล์ด,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setSum(true,false,",,,,,,,true,true");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>