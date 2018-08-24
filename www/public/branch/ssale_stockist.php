<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprinti1.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
	//	window.location='index.php?sessiontab=3&sub=147&sanoo='+id;
	}
	function sale_look(id){
		var wlink = 'invoice_aprinti.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
		//window.location='index.php?sessiontab=3&sub=16&sanooo='+id;
	}
	function sale_cancel(id){
			if(confirm("<?=$wording_lan['Bill_21']?>")){
			window.location='index.php?sessiontab=5&sub=17&state=3&bid='+id;
		}
	}
	function sale_status(id,page,chktype,sessiontab,sub){
		//if(confirm("ต้องการเปลี่ยนแปลงการรับของ")){
			window.location='index.php?sessiontab='+sessiontab+'&sub='+sub+'&state=6&sender='+id;
		//}
	}
		function sale_status1(id,page,chktype,sessiontab,sub){
		//if(confirm("ต้องการเปลี่ยนแปลงจัดส่ง")){
			window.location='index.php?sessiontab='+sessiontab+'&sub='+sub+'&state=7&sender='+id;
		//}
	}
</script>
<?
require("connectmysql.php");
//var_dump($_SESSION);
if(!empty($_GET["sano"]))$sano = $_GET["sano"];
$year = date("Y");
$month = date("m");
$date = mktime(1, 1, 1, $month, date("d"), $year);

$first_day_of_month = strtotime("-" . (date("d", $date)-1) . " days", $date);
$last_day_of_month = strtotime("+" . (date("t", $first_day_of_month)-1) . " days", $first_day_of_month);

$first_week_no = date("W", $first_day_of_month);
$last_week_no = date("W", $last_day_of_month);

if($last_week_no < $first_week_no) $last_week_no=date("W", strtotime("-1 week",$last_week_no)) + 1;
$weeks_of_month = $last_week_no - $first_week_no + 1;
//echo substr('', -4, 4);
//exit;

if($_GET["sanoo"]){
$sqlupdate = "update ".$dbprefix."isaleh set print = print+1 where id = '{$_GET["sanoo"]}'";
mysql_query($sqlupdate);
}
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
$sql = "SELECT '".$_GET["sessiontab"]."' as sessiontab,'".$_GET["sub"]."' as sub,'".$_GET["chktype"]."' as chktype,".$dbprefix."isaleh.uid_receive,".$dbprefix."isaleh.uid_sender,'".$page."' as page,cancel,print,".$dbprefix."isaleh.id,".$dbprefix."isaleh.sender,".$dbprefix."isaleh.sender_date,".$dbprefix."isaleh.inv_code,".$dbprefix."isaleh.tot_pv/100 as discount,total+".$dbprefix."isaleh.tot_pv/100 as alltotal,sano,sadate,tot_pv,tot_bv,tot_fv,total,".$dbprefix."isaleh.inv_code AS smcode ";
$sql .= ",".$dbprefix."invent.home_t as mobile ";
$sql .= ",CASE ".$dbprefix."isaleh.sender WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."isaleh.sender_date) ELSE concat('<img src=./images/false.gif>',".$dbprefix."isaleh.sender_date) END AS sender1 ";
$sql .= ",CASE ".$dbprefix."isaleh.receive WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."isaleh.receive_date) ELSE concat('<img src=./images/false.gif>',".$dbprefix."isaleh.receive_date) END AS receive1 ";
$sql .= ",CASE ".$dbprefix."isaleh.send WHEN '2' THEN 'รับเอง' ELSE 'จัดส่ง' END AS send ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'Online'  WHEN '4' THEN 'ATO' WHEN '5' THEN 'Stockist' END AS checkportal ";
$sql .= ",".$dbprefix."isaleh.name_t,CASE ".$dbprefix."isaleh.sender WHEN '1' THEN concat('',".$dbprefix."isaleh.sender_date) ELSE '<img src=./images/false.gif>' END AS sender  
";$sql .= ",".$dbprefix."isaleh.caddress,CONCAT(".$dbprefix."isaleh.caddress,' ต.',".$dbprefix."isaleh.cdistrictId,' อ.',".$dbprefix."isaleh.camphurId,' จ.',".$dbprefix."isaleh.cprovinceId,' ',zip) AS address123  ";


$sql .= "FROM ".$dbprefix."isaleh ";
$sql .= "LEFT JOIN ".$dbprefix."invent ON (".$dbprefix."isaleh.inv_code=".$dbprefix."invent.inv_code) where  cancel=0 and  (".$dbprefix."isaleh.receive <> '1') and ".$dbprefix."isaleh.inv_from = '".$_SESSION["admininvent"]."' ";
//echo $sql;
//$sql .= " WHERE  ".$dbprefix."isaleh.sa_type <> 'I'";
if(!empty($sano)){
$sql .= " and sano = '$sano' ";
}


//echo $sql;
$monthmonth = explode("-",$fdate);
$fdate = $monthmonth[0].'-'.$monthmonth[1];
if(!empty($fdate))
$sql .= " and sadate like '%$fdate%'  ";


//echo $sql;
	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("ssale_del.php");
	}else if($_GET['state']==2){
		include("sale_editadd.php");
	}else if($_GET['state']==3){
		include("sale_cancel.php");
	}else if($_GET['state']==4){
		include("product_sale_bill.php");
	}
	else if($_GET['state']==5){
		include("sale_editaddh.php");
	}
	else if($_GET['state']==6){
		include("schange_held.php");//receive
	}
	else if($_GET['state']==7){
		include("schange_held1.php");//sending
	}
	else{
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
		$rec->setLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."&chktype=".$_GET["chktype"]);
		$rec->setBackLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]);
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,sano,smcode,name_t,address123,mobile,tot_pv,total,sender,receive,remark,uid_sender,uid_receive,checkportal");
		$rec->setFieldFloatFormat("");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
//		$rec->setFieldDesc("วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,ที่อยู่จัดส่ง,มือถือ,รวมpv,รวมราคา,วันส่งของ,รับของ,อ้างอิง,user<br>จัดส่ง,user<br>รับของ,ช่องทาง"); 
	$rec->setFieldDesc($wording_lan["Bill_1"].",".$wording_lan["Bill_2"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["send_11"].",".$wording_lan["send_12"].",".$wording_lan["Bill_18"].",".$wording_lan["Bill_19"].",".$wording_lan["Bill_10"].",".$wording_lan["Bill_11"].",".$wording_lan["Bill_12"].",".$wording_lan["Bill_15"].",".$wording_lan["Bill_16"].",".$wording_lan["Bill_17"]);
	
		
		
		
		$rec->setFieldAlign("center,left,left,left,left,center,right,right,center,center,center");
		$rec->setFieldSpace("6%,9%,5%,12%,20%,6%,5%,5%,6%,2%,5%,5%,5%");
	//	$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,".$dbprefix."isaleh.mcode,".$dbprefix."isaleh.name_t,".$dbprefix."isaleh.inv_code,sadate,tot_pv,total,".$dbprefix."isaleh.uid");
	//	$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,สาขา,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,พนักงาน");
		$rec->setSearchDesc($wording_lan["Bill_2"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Bill_1"].",".$wording_lan["Bill_18"].",".$wording_lan["Bill_24"].",".$wording_lan["Bill_19"].",".$wording_lan["Bill_20"]);
		$rec->setSum(true,false,",,,,true,true,true,true,true,true,");
		$rec->setSum(true,false,",,,,,,,,,");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE",$wording_lan["Bill_print"]);
		$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE",$wording_lan["Bill_view"]);
		
	//	$rec->setSpecial("./images/true.gif","","sale_status1","id,page,chktype,sessiontab,sub,","IMAGE",$wording_lan["send_13"]);

		$rec->setSpecial("./images/true.gif","","sale_status","id,page,chktype,sessiontab,sub","IMAGE",$wording_lan["send_1"]);
		
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","ewallet".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","ewallet".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>".$wording_lan["Billjang_loding"]." Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>".$wording_lan["Billjang_cre"]." Excel</a></fieldset>";
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
/*$sql = "SELECT cancel,".$dbprefix."isaleh.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."isaleh.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."isaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."isaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		$rec->setQuery($sql);*/

	}

?>