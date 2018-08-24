<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint_rsale.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
		window.location='index.php?sessiontab=3&sub=39&sanoo='+id;
	}
	function sale_look(id){
		var wlink = 'invoice_alook_sale.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
		window.location='index.php?sessiontab=3&sub=39&sanooo='+id;
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=3&sub=39&state=3&bid='+id;
		}
	}
	function sale_status(id){
		if(confirm("ต้องการเปลี่ยนแปลงจัดส่ง")){
			window.location='index.php?sessiontab=3&sub=39&state=6&sender='+id;
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
//echo substr('', -4, 4);
//exit;

/*	$sql 	= "SELECT  mcode,id_card  FROM ".$dbprefix."member  ";
			//echo "$sql <br>";
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$mcode = $sqlObj->mcode;
				$id_card = $sqlObj->id_card;
				$id_card1 = explode('-',$id_card);
				$id_card = $id_card1[0].$id_card1[1].$id_card1[2].$id_card1[3].$id_card1[4];
				 $sqlUpdate = "update ".$dbprefix."member set id_card  = '$id_card'  where mcode = '$mcode'";
				 //echo "$sqlUpdate <br>";
				 $rsUpdate = mysql_query($sqlUpdate);
			}*/
		/*for($i=1219;$i<=1234;$i++){
		$sql = "INSERT INTO `ali_expdate` (`id`, `mid`, `exp_date`, `date_change`) VALUES
('".$i."', '".$i."', '2010-12-25', '2010-10-16')";
$rsUpdate = mysql_query($sql);
		}*/
if($_GET["sanoo"]){
$sqlupdate = "update ".$dbprefix."rsaleh set print = print+1 where id = '{$_GET["sanoo"]}'";
mysql_query($sqlupdate);
}
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
$sql = "SELECT cancel,print,".$dbprefix."rsaleh.id,sano,DATE_FORMAT(sadate, '%d-%m-%Y') as sadate 
,tot_pv,tot_bv,tot_fv,total,inv_desc as name_t,".$dbprefix."invent.inv_code AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE ".$dbprefix."rsaleh.uid WHEN '' THEN ".$dbprefix."rsaleh.inv_code ELSE ".$dbprefix."rsaleh.uid END AS uid ";
$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
$sql .= ",CASE sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd ";
$sql .= ",CASE ".$dbprefix."rsaleh.asend WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS asend ";

$sql .= "FROM ".$dbprefix."rsaleh ";
$sql .= "LEFT JOIN ".$dbprefix."invent ON (".$dbprefix."rsaleh.inv_code=".$dbprefix."invent.inv_code) where 1=1 "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$sql .= " WHERE  ".$dbprefix."rsaleh.sa_type <> 'I'";
if(!empty($sano)){
$sql .= " and sano = '$sano' ";
}
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
		include("rsale_del.php");
	}else if($_GET['state']==2){
		include("rsale_editadd.php");
	}else if($_GET['state']==3){
		include("rsale_cancel.php");
	}else if($_GET['state']==4){
		include("rproduct_sale_bill.php");
	}
	else if($_GET['state']==5){
		include("rsale_editaddh.php");
	}
	else if($_GET['state']==6){
		include("rchange_held.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=39");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("print,sadate,sano,smcode,name_t,por_cur,preserve,ability,hold,imd,tot_pv,total,uid");
		$rec->setFieldFloatFormat(",,,,,,,,,,0,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("print,วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,ตำแหน่ง,รักษายอด,ทำคุณสมบัติ, Hold, รักษายอดทันที, PV,จำนวนเงินรวม,สาขา หรือ พนักงาน");
		$rec->setFieldAlign("center,left,center,left,center,center,center,center,center,right,right,center,center,center,center");
		$rec->setFieldSpace("1%,7%,7%,7%,15%,5%,7%,7%,7%,7%,5%,7%,7%,7%,15%,8%,4%,4%");
	//	$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,".$dbprefix."rsaleh.mcode,name_t,".$dbprefix."rsaleh.inv_code,sadate,tot_pv,total,".$dbprefix."rsaleh.uid");
		$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,สาขา,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,พนักงาน");
		$rec->setSum(true,false,",,,,,,,,,,true,true");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
	//	$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE","ดู");
		$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=6");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=6&state=1","post","delfield");
		}
		if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=6");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=6&state=1","post","delfield");
		}*/
		//var_dump($acc->isAccess(2));
		//exit;
		if($acc->isAccess(2))
			//$rec->setEdit("index.php","id","id","sessiontab=3&sub=39");
	//	$rec->setSpecial("./images/true.gif","","sale_status","id","IMAGE","รับของ");
		$rec->showRec(1,'SH_QUERY');
/*$sql = "SELECT cancel,".$dbprefix."rsaleh.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."rsaleh.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."rsaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."rsaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		$rec->setQuery($sql);*/
	}

?>