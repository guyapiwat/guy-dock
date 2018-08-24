<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint_pack.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=3&sub=36&state=3&bid='+id;
		}
	}
</script>
<a href="./print_held.php" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์</a>
<?
require("connectmysql.php");
mysql_query("delete from ".$dbprefix."cnt_held ");
$sql = "SELECT cancel,".$dbprefix."asaleh_held.id,".$dbprefix."asaleh_held.sano,".$dbprefix."asaleh_held.uid as uid
,tot_pv,tot_bv,tot_fv,total,".$dbprefix."member.name_t,".$dbprefix."asaleh_held.mcode AS smcode,".$dbprefix."asaleh_held.sa_type,qty";
$sql .= ",CASE pcode WHEN 'B001' THEN qty ELSE '' END AS p1 ";
$sql .= ",CASE pcode WHEN 'B002' THEN qty ELSE '' END AS p2 ";
$sql .= ",CASE pcode WHEN 'B003' THEN qty ELSE '' END AS p3 ";
$sql .= ",CASE pcode WHEN 'B004' THEN qty ELSE '' END AS p4 ";
$sql .= ",CASE pcode WHEN 'B005' THEN qty ELSE '' END AS p5 ";
$sql .= ",CASE pcode WHEN 'B006' THEN qty ELSE '' END AS p6 ";
$sql .= ",CASE pcode WHEN 'B007' THEN qty ELSE '' END AS p7 ";
$sql .= ",CASE pcode WHEN 'C001' THEN qty ELSE '' END AS p8 ";
$sql .= ",CASE pcode WHEN 'C002' THEN qty ELSE '' END AS p9 ";
$sql .= ",CASE pcode WHEN 'C003' THEN qty ELSE '' END AS p10 ";
$sql .= ",CASE pcode WHEN 'H001' THEN qty ELSE '' END AS p11 ";
$sql .= ",CASE pcode WHEN 'H002' THEN qty ELSE '' END AS p12 ";
$sql .= ",CASE pcode WHEN 'H003' THEN qty ELSE '' END AS p13 ";
$sql .= ",CASE pcode WHEN 'H004' THEN qty ELSE '' END AS p14 ";
$sql .= ",CASE pcode WHEN 'H101' THEN qty ELSE '' END AS p15 ";
$sql .= ",CASE pcode WHEN 'H102' THEN qty ELSE '' END AS p16 ";
$sql .= ",CASE pcode WHEN 'H103' THEN qty ELSE '' END AS p17 ";
$sql .= ",CASE pcode WHEN 'H104' THEN qty ELSE '' END AS p18 ";
$sql .= ",CASE pcode WHEN 'O001' THEN qty ELSE '' END AS p19 ";
$sql .= ",CASE pcode WHEN 'H105' THEN qty ELSE '' END AS p20 ";
$sql .= ",IF(".$dbprefix."asaled.pcode like '%PD_%' ,pcode,'no') as p21
";	
$sql .= " FROM ".$dbprefix."asaleh_held ";  
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh_held.mcode=".$dbprefix."member.mcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."asaled ON (".$dbprefix."asaleh_held.id=".$dbprefix."asaled.sano) ";
$rs2 = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs2);$i++){
	$sqlObj2 = mysql_fetch_object($rs2);
	$sano =$sqlObj2->sano;
	$p1 =$sqlObj2->p1;
	$p2 =$sqlObj2->p2;
	$p3 =$sqlObj2->p3;
	$p4 =$sqlObj2->p4;
	$p5 =$sqlObj2->p5;
	$p6 =$sqlObj2->p6;
	$p7 =$sqlObj2->p7;
	$p8 =$sqlObj2->p8;
	$p9 =$sqlObj2->p9;
	$p10 =$sqlObj2->p10;
	$p11 =$sqlObj2->p11;
	$p12 =$sqlObj2->p12;
	$p13 =$sqlObj2->p13;
	$p14 =$sqlObj2->p14;
	$p15 =$sqlObj2->p15;
	$p16 =$sqlObj2->p16;
	$p17 =$sqlObj2->p17;
	$p18 =$sqlObj2->p18;
	$p19 =$sqlObj2->p19;
	$p20 =$sqlObj2->p20;
	$p21 = 0 ;
	$p21 =$sqlObj2->p21;
	//echo $p20.'<br>';
	$qty1 =$sqlObj2->qty;
	if($p21 <> 'no'){
		$selectPack = "select * from ".$dbprefix."product_package1 where package = '$p21'";
		//echo $selectPack.'<br>';
		$rsPack = mysql_query($selectPack);
		for($j=0;$j<mysql_num_rows($rsPack);$j++){
			$sqlObjP = mysql_fetch_object($rsPack);
			$pcode = "";$qty = 0;
			$pcode =$sqlObjP->pcode;
			$qty =$sqlObjP->qty;
			if($pcode == 'B001')$p1 = $p1 +$qty*$qty1;
			if($pcode == 'B002')$p2 = $p2 +$qty*$qty1;
			if($pcode == 'B003')$p3 = $p3 +$qty*$qty1;
			if($pcode == 'B004')$p4 = $p4 +$qty*$qty1;
			if($pcode == 'B005')$p5 = $p5 +$qty*$qty1;
			if($pcode == 'B006')$p6 = $p6 +$qty*$qty1;
			if($pcode == 'B007')$p7 = $p7 +$qty*$qty1;
			if($pcode == 'C001')$p8 = $p8 +$qty*$qty1;
			if($pcode == 'C002')$p9 = $p9 +$qty*$qty1;
			if($pcode == 'C003')$p10 = $p10 +$qty*$qty1;
			if($pcode == 'H001')$p11 = $p11 +$qty*$qty1;
			if($pcode == 'H002')$p12 = $p12 +$qty*$qty1;
			if($pcode == 'H003')$p13 = $p13 +$qty*$qty1;
			if($pcode == 'H004')$p14 = $p14 +$qty*$qty1;
			if($pcode == 'H101')$p15 = $p15 +$qty*$qty1;
			if($pcode == 'H102')$p16 = $p16 +$qty*$qty1;
			if($pcode == 'H103')$p17 = $p17 +$qty*$qty1;
			if($pcode == 'H104')$p18 = $p18 +$qty*$qty1;
			if($pcode == 'O001')$p19 = $p19 +$qty*$qty1;
			if($pcode == 'H105')$p20 = $p20 +$qty*$qty1;
		}
	}
	if(empty($p1))$p1 = '';else $p1 = number_format($p1);
	if(empty($p2))$p2 = '';else $p2 = number_format($p2);
	if(empty($p3))$p3 = '';else $p3 = number_format($p3);
	if(empty($p4))$p4 = '';else $p4 = number_format($p4);
	if(empty($p5))$p5 = '';else $p5 = number_format($p5);
	if(empty($p6))$p6 = '';else $p6 = number_format($p6);
	if(empty($p7))$p7 = '';else $p7 = number_format($p7);
	if(empty($p8))$p8 = '';else $p8 = number_format($p8);
	if(empty($p9))$p9 = '';else $p9 = number_format($p9);
	if(empty($p10))$p10 = '';else $p10 = number_format($p10);
	if(empty($p11))$p11 = '';else $p11 = number_format($p11);
	if(empty($p12))$p12 = '';else $p12 = number_format($p12);
	if(empty($p13))$p13 = '';else $p13 = number_format($p13);
	if(empty($p14))$p14 = '';else $p14 = number_format($p14);
	if(empty($p15))$p15 = '';else $p15 = number_format($p15);
	if(empty($p16))$p16 = '';else $p16 = number_format($p16);
	if(empty($p17))$p17 = '';else $p17 = number_format($p17);
	if(empty($p18))$p18 = '';else $p18 = number_format($p18);
	if(empty($p19))$p19 = '';else $p19 = number_format($p19);
	if(empty($p20))$p20 = '';else $p20 = number_format($p20);
	$select = "select * from ".$dbprefix."cnt_held where sano = '$sano'";
	$query = mysql_query($select);
	if(mysql_num_rows($query)>0)
		$sqlUpdate = " update ".$dbprefix."cnt_held set p1=p1+$p1,p2=p2+$p2,p3=p3+$p3,p4=p4+$p4,p5=p5+$p5,p6=p6+$p6,p7=p7+$p7,p8=p8+$p8,p9=p9+$p9,p10=p10+$p10,p11=p11+$p11,p12=p12+$p12,p13=p13+$p13,p14=p14+$p14,p15=p15+$p15,p16=p16+$p16,p17=p17+$p17,p18=p18+$p18,p19=p19+$p19,p20=p20+$p20 where sano = $sano";
	else $sqlUpdate = "insert into ".$dbprefix."cnt_held(sano,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20) values(
	'$sano','$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$p9','$p10','$p11','$p12','$p13','$p14','$p15','$p16','$p17','$p18','$p19','$p20')";

	//echo $sqlUpdate.'<br>';
	mysql_query($sqlUpdate);
}



$year = date("Y");
$month = date("m");
$date = mktime(1, 1, 1, $month, date("d"), $year);

$first_day_of_month = strtotime("-" . (date("d", $date)-1) . " days", $date);
$last_day_of_month = strtotime("+" . (date("t", $first_day_of_month)-1) . " days", $first_day_of_month);

$first_week_no = date("W", $first_day_of_month);
$last_week_no = date("W", $last_day_of_month);

if($last_week_no < $first_week_no) $last_week_no=date("W", strtotime("-1 week",$last_week_no)) + 1;
$weeks_of_month = $last_week_no - $first_week_no + 1;


if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

//echo $sql;
$sql = "SELECT sano,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20";
$sql .= " FROM ".$dbprefix."cnt_held ";  


//echo $sql;
//echo $sql;
//echo $sql;
//sql .= " WHERE  ".$dbprefix."asaleh.sa_type <> 'W'";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("sale_held_del.php");
	}else if($_GET['state']==2){
		include("sale_editadd.php");
	}else if($_GET['state']==3){
		include("sale_cancel.php");
	}else if($_GET['state']==4){
		include("product_sale_bill.php");
	}
	else{
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

		$rec->setLink($PHP_SELF,"sessiontab=3&sub=35");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sano,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21");
		$rec->setFieldFloatFormat(",,,,,,,,,,,,,,,,,,,,,,,,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("เลขที่ใบเสร็จ,Night S.<Br>2000,White C.<Br>1200,Crystal S.<Br>1200,Change<Br>1250,Geisha<Br>1250,Lepair<Br>950
		,Fiber<Br>980,Biggolo<Br>490,C. Coffee<Br>240,R. Coffee<Br>220,A Ginseng<Br>2500,A Ginseng<Br>2500,G Drink<Br>2500,G Drink<Br>2500,Garnoderma<Br>4500,Garnoderma<Br>4500,Goji B.<Br>4500,Goji B.<Br>4500,Sabu<Br>150,Gin P.<br>,ของแถม + โปรโมชั่นต่างๆ + เปลี่ยนสินค้า");
		$rec->setFieldAlign("center,right,right,right,right,right,right,right,right,right,right,right,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("8%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,14%,10%");
		//$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setSearch("sano,".$dbprefix."asaleh.mcode,name_t,sadate,tot_pv,total,".$dbprefix."asaleh.uid");
		//$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,สาขาหรือพนักงาน")
	//	$rec->setSearch("sano1,".$dbprefix."asaleh.mcode,name_t,sadate,tot_pv,total,".$dbprefix."asaleh.uid");
	//	$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,สาขาหรือพนักงาน");
		/*if($_GET['excel']==1){
			$rec->exportXls("ExportXls","sale11".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","sale11".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);*/
		$rec->setSum(true,false,",true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
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