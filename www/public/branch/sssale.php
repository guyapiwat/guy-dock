<script language="javascript" type="text/javascript">
	function sale_print(id){
		var link = '<?=$actual_link?>invoice/aprint_sale_branch.php';  
        var wlink = link+'?bid='+id; 
        window.open(wlink);  
	}
	function sale_look(id){
		var link = '<?=$actual_link?>invoice/aprint_salelook.branch.php';  
        var wlink = link+'?bid='+id; 
        window.open(wlink);  
	}
	function sale_cancel(id){
			if(confirm("<?=$wording_lan['Bill_21']?>")){
			window.location='index.php?sessiontab=5&sub=17&state=3&bid='+id;
		}
	}
	function sale_status(id,page,chktype,sessiontab,sub){
		//if(confirm("ต้องการเปลี่ยนแปลงการรับของ")){
			window.location='index.php?sessiontab='+sessiontab+'&sub='+sub+'&chktype='+chktype+'&page='+page+'&state=6&sender='+id+'&status=receive';
		//}
	}
	function sale_status1(id,page,chktype,sessiontab,sub){
		//if(confirm("ต้องการเปลี่ยนแปลงจัดส่ง")){
			window.location='index.php?sessiontab='+sessiontab+'&sub='+sub+'&chktype='+chktype+'&page='+page+'&state=7&sender='+id+'&status=sender';
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
$sqlupdate = "update ".$dbprefix."asaleh set print = print+1 where id = '{$_GET["sanoo"]}'";
mysql_query($sqlupdate);
}
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
$sql = "SELECT '".$_GET["sessiontab"]."' as sessiontab,'".$_GET["sub"]."' as sub,'".$_GET["chktype"]."' as chktype,".$dbprefix."asaleh.uid_receive,".$dbprefix."asaleh.uid_sender,'".$page."' as page,cancel,print,".$dbprefix."asaleh.remark,".$dbprefix."asaleh.id,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,".$dbprefix."asaleh.cmobile,tot_fv,total,concat(".$dbprefix."member.name_f,' ',".$dbprefix."member.name_t) as name_t1,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE ".$dbprefix."asaleh.uid WHEN '' THEN ".$dbprefix."asaleh.inv_code ELSE ".$dbprefix."asaleh.uid END AS uid ";
$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
$sql .= ",CASE sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE'  WHEN '4' THEN 'ATO' END AS checkportal";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd ";
$sql .= ",CASE ".$dbprefix."asaleh.receive WHEN '1' THEN concat('',".$dbprefix."asaleh.receive_date) ELSE '<img src=./images/false.gif>' END AS receive ,
CASE ".$dbprefix."asaleh.sender WHEN '1' THEN concat('',".$dbprefix."asaleh.sender_date) ELSE '<img src=./images/false.gif>' END AS sender ,
".$dbprefix."member.pos_cur as por_cur,".$dbprefix."asaleh.caddress,CONCAT(".$dbprefix."asaleh.caddress,' ต.',".$dbprefix."asaleh.cdistrictId,' อ.',".$dbprefix."asaleh.camphurId,' จ.',".$dbprefix."asaleh.cprovinceId,' ',zip) AS address123  ";

$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode)  where cancel=0  and sender != '1' and receive != '1' and send = '1' and (receive <> '1') and ".$dbprefix."asaleh.inv_code = '".$_SESSION["admininvent"]."' ";
//echo $sql;
//$sql .= " WHERE  ".$dbprefix."asaleh.sa_type <> 'I'";
if(!empty($sano)){
$sql .= " and sano = '$sano' ";
}

if($_GET["chktype"] == '1'){
$sql .= " and scheck = 'register' ";
}else{
$sql .= " and scheck != 'register' ";

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
		include("change_held.php");
	}
	else if($_GET['state']==7){
		include("change_held1.php");
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
		$rec->setShowField("sadate,sano,smcode,name_t1,address123,cmobile,tot_pv,total,sender,receive,remark,uid_sender,uid_receive,checkportal");
		$rec->setFieldFloatFormat("");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
//		$rec->setFieldDesc("วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,ที่อยู่จัดส่ง,มือถือ,รวมpv,รวมราคา,วันส่งของ,รับของ,อ้างอิง,user<br>จัดส่ง,user<br>รับของ,ช่องทาง"); 
	$rec->setFieldDesc($wording_lan["Bill_1"].",".$wording_lan["Bill_2"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["send_11"].",".$wording_lan["send_12"].",".$wording_lan["Bill_18"].",".$wording_lan["Bill_19"].",".$wording_lan["Bill_10"].",".$wording_lan["Bill_11"].",".$wording_lan["Bill_12"].",".$wording_lan["Bill_15"].",".$wording_lan["Bill_16"].",".$wording_lan["Bill_17"]);
	
		
		
		
		$rec->setFieldAlign("center,left,left,left,left,center,right,right,center,center,center");
		$rec->setFieldSpace("6%,9%,5%,12%,20%,6%,5%,5%,6%,2%,5%,5%,5%");
	//	$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,".$dbprefix."asaleh.mcode,".$dbprefix."asaleh.name_t,".$dbprefix."asaleh.sadate,tot_pv,total");
	//	$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,สาขา,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,พนักงาน");
		$rec->setSearchDesc($wording_lan["Bill_2"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Bill_1"].",".$wording_lan["Bill_18"].",".$wording_lan["Bill_19"]);
		$rec->setSum(true,false,",,,,true,true,true,true,true,true,");
		$rec->setSum(true,false,",,,,,,,,,");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","sano","IMAGE",$wording_lan["Bill_print"]);
		$rec->setSpecial("./images/search.gif","","sale_look","sano","IMAGE",$wording_lan["Bill_view"]);
		
		if($_SESSION["inventobj6"]!=0){
		$rec->setSpecial("./images/true.gif","","sale_status1","id,page,chktype,sessiontab,sub,","IMAGE",$wording_lan["send_13"]);
		$rec->setSpecial("./images/true.gif","","sale_status","id,page,chktype,sessiontab,sub","IMAGE",$wording_lan["send_1"]);
		}
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
/*$sql = "SELECT cancel,".$dbprefix."asaleh.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		$rec->setQuery($sql);*/

	}

?>