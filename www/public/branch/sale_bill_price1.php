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
//$sql = "SELECT id,sano,sadate,tot_pv,total,name_t,smcode FROM a ";
//$sql .= "LEFT JOIN (SELECT mcode,mcode AS smcode,name_t FROM ".$dbprefix."member) AS tabname ON (a.mcode=tabname.mcode) ";
/*$sql = "SELECT a.id,a.sano,a.txtTransfer,
a.txtCredit1+a.txtCredit2+a.txtCredit3 as AllCredit,a.txtFuture,a.txtCash,a.txtInternet,a.txtDiscount,txtOther,
txtFuture+txtCash+txtCredit1+txtCredit2+txtCredit3+txtOption+txtDiscount+txtInternet+txtOther+txtTransfer as txtAll,
CONCAT( optionCash, ' ', optionFuture,'',optionCredit1,' ',optionCredit2,' ',optionCredit3,' ',optionInternet,' ',optionDiscount,' ',optionOther,' ',optionTransfer ) as optionAll,txtCredit1,txtCredit2,txtCredit3,name_t,a.mcode AS smcode ";
//$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
//$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= "FROM   ".$dbprefix."asaleh as a  ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (a.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
if($fdate!=""){
	$sql .= "WHERE a.sadate BETWEEN '$fdate' AND '$tdate'";
	$where = 1;
}else $where = 0;
if($satype !=""){
	if($where == 1)$sql .= " and  a.sa_type = '$satype'";
	else $sql .= " where  a.sa_type = '$satype'";
}
$sql .= ' UNION ';*/
$sql .= "SELECT a.id,CONCAT( 'I-',a.sano) as sano,a.txtTransfer,
a.txtCredit1+a.txtCredit2+a.txtCredit3 as AllCredit,a.txtFuture,a.txtCash,a.txtInternet,a.txtDiscount,txtOther,
txtFuture+txtCash+txtCredit1+txtCredit2+txtCredit3+txtOption+txtDiscount+txtInternet+txtOther+txtTransfer as txtAll,
CONCAT( optionCash, ' ', optionFuture,'',optionCredit1,' ',optionCredit2,' ',optionCredit3,' ',optionInternet,' ',optionDiscount,' ',optionOther,' ',optionTransfer ) as optionAll,txtCredit1,txtCredit2,txtCredit3,name_t,a.mcode AS smcode ";
//$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
//$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= "FROM   ".$dbprefix."holdhead as a  ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (a.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
$sql .= "WHERE a.inv_code = '{$_SESSION["admininvent"]}' ";
if($fdate!=""){
	$sql .= " and a.sadate BETWEEN '$fdate' AND '$tdate'";
}
if($satype !=""){
	$sql .= " and  a.sa_type = '$satype'";
}
//echo $sql;
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
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
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
		$rec->setShowField("sano,txtAll,txtCash,txtFuture,AllCredit,txtTransfer,txtInternet,txtDiscount,txtOther,optionAll");
		$rec->setFieldFloatFormat(",0,0,0,0,0,0,0,0,,,,");
		$rec->setFieldDesc("เลขบิล,จำนวนรวม,เงินสด,รับล่วงหน้า,บัตรเครดิต,เงินโอน,Ewallet,ส่วนลด,อื่นๆ,หมายเหตุ");
		$rec->setFieldAlign("center,right,right,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("5%,8%,8%,8%,8%,8%,8%,8%,8%,50%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		$rec->setSum(true,false,",true,true,true,true,true,true,true,true,");
		//$rec->setSearch("pcode,pdesc,price,qty,amt");
		//$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		//$rec->setEdit("index.php","id","id","sessiontab=3&sub=6");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	//}
//formatDateTime($report_Date,"d M Y","th"));
function formatDateTime($timestamp,$strFormat="Y-m-d",$strLang="th") 
{
	if (!empty($timestamp)) 
	{
		$arrDate = splitTimeStamp($timestamp,$strLang) ;
		for($i=0;$i<strlen($strFormat);$i++)
		{
		    $strChar =  substr($strFormat,$i, 1); 
			$strDateResult  .= getDateValue($arrDate,$strChar) ;
		}
		Return $strDateResult ;
	} 
	else 
	{
		Return False;
	}
}

//===============================================================================
function Timestamp2DateTime($timestamp) {
	if (!empty($timestamp)) {
		$DateD = substr ($timestamp, 6, -6); 
		$DateM = substr ($timestamp, 4, -8); 
		$DateY = (substr ($timestamp, 0, -10))+543;
		$hh = substr ($timestamp, 8, -4); 
		$mm = substr ($timestamp, 10, -2); 
		$ss = substr ($timestamp, 12); 
		$CurDateDMY = "$DateD/$DateM/$DateY $hh:$mm:$ss"; 
		Return $CurDateDMY;
	} else {
		Return False;
	}
}

//===============================================================================
?>