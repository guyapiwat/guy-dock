<script language="javascript" type="text/javascript">
	function sale_print(id,sa){
		if(sa == '1'){var wlink = 'invoice_aprint.php?bid='+id;}
		if(sa == '2'){var wlink = 'invoice_hprint.php?bid='+id;}
		wlink = 'invoice_aprint.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
</script>
<?
require("connectmysql.php");
//require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,print,".$dbprefix."asaleh.id,".$dbprefix."asaleh.lid,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,remark,total,CONCAT(".$dbprefix."member.name_f,' ',".$dbprefix."asaleh.name_t) as name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE ".$dbprefix."asaleh.uid WHEN '' THEN ".$dbprefix."asaleh.inv_code ELSE ".$dbprefix."asaleh.uid END AS uid ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE'  END AS checkportal";
$sql .= ",CASE sa_type WHEN 'A' THEN 'ปกติ' WHEN 'H' THEN 'BMC'  END AS ability";
$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
$sql .= ",CASE sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd ";
$sql .= ",CASE ".$dbprefix."asaleh.receive WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."asaleh.receive_date) ELSE '<img src=./images/false.gif>' END AS receive ,
CASE ".$dbprefix."asaleh.sender WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."asaleh.sender_date) ELSE '<img src=./images/false.gif>' END AS sender ,
".$dbprefix."member.pos_cur as por_cur ";

$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) where ".$dbprefix."asaleh.uid='".$_SESSION['usercode']."' and  ".$dbprefix."asaleh.scheck = 'extend' and ".$dbprefix."asaleh.cancel  = 0 "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
//	echo '<fieldset><legend><b>ข้อมูลการซื้อ</b></legend>';
	if($_GET['state']==1){
		include("serv_sale_del.php");
	}else if($_GET['state']==2){
		include("extend_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=115");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("print,sadate,sano,smcode,name_t,ability,tot_pv,total,uid,sendsend,sender,receive,remark,lid,checkportal");
		$rec->setFieldFloatFormat(",,,,,,2,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc($wording_lan["tab4"]["3_1"].",".$wording_lan["tab4"]["3_2"].",".$wording_lan["tab4"]["3_3"].",".$wording_lan["tab4"]["3_4"].",".$wording_lan["tab4"]["3_5"].",".$wording_lan["tab4"]["3_6"].",".$wording_lan["tab4"]["3_7"].",".$wording_lan["tab4"]["3_8"].",".$wording_lan["tab4"]["3_8"].",".$wording_lan["tab4"]["3_9"].",".$wording_lan["tab4"]["3_10"].",".$wording_lan["tab4"]["3_11"].",".$wording_lan["tab4"]["3_12"].",".$wording_lan["tab4"]["3_13"].",".$wording_lan["tab4"]["3_14"].",".$wording_lan["tab4"]["3_15"]."");
		$rec->setFieldAlign("center,left,left,left,left,center,right,right,center,center,center,center");
		$rec->setFieldSpace("1%,7%,7%,5%,15%,4%,6%,6%,8%,5%,8%,8%,7%,4%,4%");
		$rec->setFieldLink(",,index.php?sessiontab=2&sub=115&cmc=,");
		//$rec->setSearch("sano,smcode,name_t,sadate,tot_pv,total");
		//$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setSum(true,false,",,,,,,true,true");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=6&state=1","post","delfield");
		//$rec->setEdit("index.php","id","id","sessiontab=3&sub=6");
	//	$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","พิมพ์");
		$rec->showRec(1,'SH_QUERY');
		//mysql_close($link);
	}
//	echo "</fieldset>";		
	
	
?>
