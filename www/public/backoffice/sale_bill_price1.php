<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint.php?bid='+id;
		window.open(wlink);
	}
</script>
<?
require("connectmysql.php");
//require("./cls/sqlAnalizer.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT pcode,pdesc,price,SUM(qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."asaled "; 
//$sql = "SELECT id,sano,sadate,tot_pv,total,name_t,smcode FROM ".$dbprefix."asaleh ";
//$sql .= "LEFT JOIN (SELECT mcode,mcode AS smcode,name_t FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."asaleh.mcode=tabname.mcode) ";
$sql = "SELECT ".$dbprefix."asaleh.id,".$dbprefix."asaleh.sadate,sano,total as txtAll,
txtCredit1+txtCredit2+txtCredit3 as AllCredit,txtFuture,txtCash,txtInternet,txtDiscount,txtOther,
' '+optionCash+optionFuture+optionCredit1+optionCredit2+optionCredit3+optionInternet+optionDiscount+optionOther as optionAll,txtCredit1,txtCredit2,txtCredit3,".$dbprefix."member.name_t,".$dbprefix."asaleh.mcode AS smcode ";
//$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
//$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
if($fdate!=""){
	$sql .= "WHERE ".$dbprefix."asaleh.sadate BETWEEN '$fdate' AND '$tdate'";
	$where = 1;
}else $where = 0;
if($satype !=""){
	if($where == 1)$sql .= " and  ".$dbprefix."asaleh.sa_type = '$satype'";
	else $sql .= " where  ".$dbprefix."asaleh.sa_type = '$satype'";
}
//$sql .= "GROUP BY pcode";// LEFT JOIN ".$dbprefix."bank ON ".$dbprefix."member.bankcode=".$dbprefix."bank.bankcode";
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	/*if($_GET['state']==1){
		include("member_del.php");
	}else if($_GET['state']==2){
		include("member_editadd.php");
	}else{*/
	//echo $sql;
		//$rec = new sqlAnalizer();
		//echo "<br />";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
	//	$rec->setOrder($_GET['ord']);
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
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=".$_GET['sub']."&fdate=$fdate&tdate=$tdate&satype=$satype&stype=$stype");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sadate,sano,txtAll,txtCash,txtFuture,AllCredit,txtTransfer,txtInternet,txtDiscount,txtOther,optionAll");
		$rec->setFieldFloatFormat(",,0,0,0,0,0,0,0,0");
		$rec->setFieldDesc("วันที่,เลขบิล,จำนวนรวม,เงินสด,รับล่วงหน้า,บัตรเครดิต,เงินโอน,Ewallet,ส่วนลด,อื่นๆ,หมายเหตุ");
		$rec->setFieldAlign("center,center,right,right,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("8%,10%,8%,8%,8%,8%,8%,8%,8%,8%,40%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		$rec->setSum(true,false,",,true,true,true,true,true,true,true,true,");
		//$rec->setSearch("pcode,pdesc,price,qty,amt");
		//$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		//$rec->setEdit("index.php","id","id","sessiontab=3&sub=6");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	//}


?>