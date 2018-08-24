<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint_ato.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
		//window.location='index.php?sessiontab=3&sub=6&sanoo='+id;
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=3&sub=144&state=3&bid='+id;
		}
	}
</script>
<?

require("connectmysql.php");
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

if($_GET["sanoo"]){
$sqlupdate = "update ".$dbprefix."atoasaleh set print = print+1 where id = '{$_GET["sanoo"]}'";
mysql_query($sqlupdate);
}
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
$sql = "SELECT cancel,print,".$dbprefix."atoasaleh.id,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,total,".$dbprefix."atoasaleh.name_t,".$dbprefix."atoasaleh.mcode AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE ".$dbprefix."atoasaleh.uid WHEN '' THEN ".$dbprefix."atoasaleh.inv_code ELSE ".$dbprefix."atoasaleh.uid END AS uid ";
$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
$sql .= ",CASE sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd ";

$sql .= "FROM ".$dbprefix."atoasaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."atoasaleh.mcode=".$dbprefix."member.mcode) where 1=1 "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$sql .= " WHERE  ".$dbprefix."atoasaleh.sa_type <> 'I'";
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
		include("sale_atodel.php");
	}else if($_GET['state']==2){
		include("sale_atoeditadd.php");
	}else if($_GET['state']==3){
		include("sale_atocancel.php");
	}else if($_GET['state']==4){
		//include("product_sale_bill.php");
	}
	else if($_GET['state']==5){
		//include("sale_editaddh.php");
	}
	else if($_GET['state']==6){
		//include("change_held.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=6");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("print,sadate,sano,smcode,name_t,ability,tot_pv,total,uid");
		$rec->setFieldFloatFormat(",,,,,,2,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("print,วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,".$wording_lan["word"]["sale_editadd"]["typea"].", PV,จำนวนเงินรวม,สาขา หรือ พนักงาน");
		$rec->setFieldAlign("center,center,center,center,left,center,right,right,center,center,right,center,center,center,center");
		$rec->setFieldSpace("1%,7%,7%,7%,44%,7%,7%,7%,11%,7%,7%,7%,7%,7%,15%,8%,4%,4%");
	//	$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,".$dbprefix."atoasaleh.mcode,name_t,".$dbprefix."atoasaleh.inv_code,sadate,tot_pv,total,".$dbprefix."atoasaleh.uid");
		$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,สาขา,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,พนักงาน");
		$rec->setSum(true,false,",,,,,,true,true,");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		 
		//}
		if($acc->isAccess(4)){
			$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		}
		//var_dump($acc->isAccess(2));
		//exit;
		if($acc->isAccess(2))
		//	$rec->setEdit("index.php","id","id","sessiontab=3&sub=6");
		//$rec->setSpecial("./images/true.gif","","sale_status","id","IMAGE","รับของ");
		$rec->showRec(1,'SH_QUERY');
/*$sql = "SELECT cancel,".$dbprefix."atoasaleh.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."atoasaleh.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."atoasaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."atoasaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		$rec->setQuery($sql);*/

	}

?>