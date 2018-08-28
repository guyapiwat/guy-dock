<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprinti1.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
	//	window.location='index.php?sessiontab=5&sub=148&sanoo='+id;
	}
	function sale_look(id){
	//	var wlink = 'invoice_alook_sale.php?bid='+id;
			var wlink = 'invoice_aprinti.php?bid='+id;
	//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
		//window.location='index.php?sessiontab=5&sub=148&sanooo='+id;
	}
	function hold(id,page,chktype,sessiontab,sub,send){
			window.location='index.php?sessiontab='+sessiontab+'&sub='+sub+'&chktype='+chktype+'&page='+page+'&send='+send+'&state=8&bid='+id;
	}
	function hold1(id,page,chktype,sessiontab,sub,send){
			window.location='index.php?sessiontab='+sessiontab+'&sub='+sub+'&sano='+id+'&page='+page+'&chktype='+chktype+'&send='+send;
	}
	function sale_cancel(id){
			if(confirm("<?=$wording_lan['Bill_21']?>"))
				{
				window.location='index.php?sessiontab=6&sub=148&state=3&bid='+id;
		}
	}
	function sale_status(id,page,chktype,receive){
		if(receive == '1'){
			if(confirm("<?=$wording_lan['Bill_22']?>")){
				window.location='index.php?sessiontab=6&sub=148&state=6&sender='+id+'&page='+page+'&chktype='+chktype;
				exit;
			}
		}else{
			window.location='index.php?sessiontab=6&sub=148&state=6&sender='+id+'&page='+page+'&chktype='+chktype;
			exit;
		}
	}
		function sale_status1(id){
		if(confirm("<?=$wording_lan['Bill_23']?>")){
			window.location='index.php?sessiontab=6&sub=148&state=7&sender='+id;
		}
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
$sqlupdate = "update ".$dbprefix."isaleh set print = print+1 where id = '{$_GET["sanoo"]}'";
mysql_query($sqlupdate);
}
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
$sql = "SELECT '".$_GET["sessiontab"]."' as sessiontab,'".$_GET["sub"]."' as sub,'".$_GET["chktype"]."' as chktype,'".$_GET["send"]."' as send1,".$dbprefix."isaleh.uid_receive,".$dbprefix."isaleh.name_t,".$dbprefix."isaleh.uid,".$dbprefix."isaleh.lid,".$dbprefix."isaleh.uid_sender,'".$page."' as page,cancel,print,".$dbprefix."isaleh.id,".$dbprefix."isaleh.sender,".$dbprefix."isaleh.sender_date,".$dbprefix."isaleh.inv_code,".$dbprefix."isaleh.tot_pv/100 as discount,total+".$dbprefix."isaleh.tot_pv/100 as alltotal,sano,sadate,tot_pv,tot_bv,tot_fv,total,".$dbprefix."isaleh.inv_code AS smcode ";
$sql .= ",".$dbprefix."invent.home_t as mobile ";
$sql .= ",CASE sa_type WHEN 'I' THEN 'Transfer'  END AS ability";
$sql .= ",CASE ".$dbprefix."isaleh.sender WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."isaleh.sender_date) ELSE concat('<img src=./images/false.gif>',".$dbprefix."isaleh.sender_date) END AS sender1 ";
$sql .= ",CASE ".$dbprefix."isaleh.receive WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."isaleh.receive_date) ELSE concat('<img src=./images/false.gif>',".$dbprefix."isaleh.receive_date) END AS receive1 ";
$sql .= ",CASE ".$dbprefix."isaleh.send WHEN '2' THEN 'รับเอง' ELSE 'จัดส่ง' END AS send ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'Online'  WHEN '4' THEN 'ATO' WHEN '5' THEN 'Stockist' END AS checkportal ";


$sql .= "FROM ".$dbprefix."isaleh ";
$sql .= "LEFT JOIN ".$dbprefix."invent ON (".$dbprefix."isaleh.inv_code=".$dbprefix."invent.inv_code) where  ".$dbprefix."isaleh.inv_from = '' and  ".$dbprefix."isaleh.cancel = 0 and send != '1' and ".$dbprefix."isaleh.receive <> '1' and (rpv > 0 or rtotal > 0) ";

//echo $sql;
//$sql .= " WHERE  ".$dbprefix."isaleh.sa_type <> 'I'";
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
		include("sale_del.php");
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
		include("schange_held.php");
	}
	else if($_GET['state']==7){
		include("schange_held1.php");
	}else if($_GET['state']==8){
		include("ssale_editadd_stockist1.php");
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
		$rec->setShowField("print,sadate,sano,smcode,name_t,ability,tot_pv,total,uid,receive1,remark,lid,uid_receive,checkportal");
		$rec->setFieldFloatFormat(",,,,,,2,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
	//	$rec->setFieldDesc("P,วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,ชนิด, PV,จำนวนเงิน,ผู้คีย์,รับของ,อ้างอิง,ซื้อสาขา,user<br>รับของ,ช่องทาง");
		$rec->setFieldDesc("P,".$wording_lan["Bill_1"].",".$wording_lan["Bill_2"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Bill_5"].",".$wording_lan["Bill_6"].",".$wording_lan["Bill_7"].",".$wording_lan["Bill_8"].",".$wording_lan["Bill_11"].",".$wording_lan["Bill_12"].",".$wording_lan["Bill_13"].",".$wording_lan["Bill_15"].",".$wording_lan["Bill_17"]."");
		$rec->setFieldAlign("center,center,center,center,left,center,right,right,center,center,center,center,center,center");
		$rec->setFieldSpace("1%,7%,10%,5%,12%,3%,6%,6%,8%,7%,8%,8%,7%,4%,4%");
	//	$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,".$dbprefix."isaleh.mcode,".$dbprefix."isaleh.name_t,sadate,tot_pv,total,".$dbprefix."isaleh.uid");
		//$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,สาขา,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,พนักงาน");
		$rec->setSearchDesc($wording_lan["Bill_2"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Bill_1"].",".$wording_lan["Bill_18"].",".$wording_lan["Bill_24"].",".$wording_lan["Bill_19"].",".$wording_lan["Bill_20"]);
		$rec->setSum(true,false,",,,,,,true,true,,");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE",$wording_lan["Bill_print"]);
		$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE",$wording_lan["Bill_view"]);
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		$rec->setSpecial("./images/hold_s.gif","","hold","id,page,chktype,sessiontab,sub,send1","IMAGE","แจง");
		$rec->setSpecial("ตรวจสอบ","","hold1","id,page,chktype,sessiontab,sub,send1","TEXT","ตรวจสอบ");
		 
		//}
		//if($acc->isAccess(4)){
		//	$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
	//	}
		//var_dump($acc->isAccess(2));
		//exit;

	//	$rec->setSpecial("./images/true.gif","","sale_status","id,page,chktype,receive","IMAGE",$wording_lan["send_1"]);
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