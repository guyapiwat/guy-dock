<html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<link href="./../../../style.css" rel="stylesheet" type="text/css">
<title>พิมพ์รายงาน</title>
</head>
<body>
<? 
require("connectmysql.php");
require("./prefix.php");
require("./cls/repGenerator_held.php");
$year = date("Y")+543;
$month = date("m");
$dada = 'วันที่ '.date("d").' เดือน '.date('m').' ปี '.$year;
$date = mktime(1, 1, 1, $month, date("d"), $year);
?>
<table width="95%" align="center"><tr><td align="right"><font size="4"><b>ยอดขายสินค้า<b></font></td></tr><tr><td align="right"><?=$dada?></td></tr></table>
<?
$first_day_of_month = strtotime("-" . (date("d", $date)-1) . " days", $date);
$last_day_of_month = strtotime("+" . (date("t", $first_day_of_month)-1) . " days", $first_day_of_month);

$first_week_no = date("W", $first_day_of_month);
$last_week_no = date("W", $last_day_of_month);

if($last_week_no < $first_week_no) $last_week_no=date("W", strtotime("-1 week",$last_week_no)) + 1;
$weeks_of_month = $last_week_no - $first_week_no + 1;


/*$sql 	= "SELECT  mcode   FROM ".$dbprefix."member  ";
		//echo "$sql <br>";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode = $sqlObj->mcode;
			 $sqlUpdate = "update ".$dbprefix."member set name_t  = '$mcode' , name_e = '$mcode' where mcode = '$mcode'";
			 //echo "$sqlUpdate <br>";
			 $rsUpdate = mysql_query($sqlUpdate);
		}
		for($i=1219;$i<=1234;$i++){
		$sql = "INSERT INTO `ali_expdate` (`id`, `mid`, `exp_date`, `date_change`) VALUES
('".$i."', '".$i."', '2010-12-25', '2010-10-16')";
$rsUpdate = mysql_query($sql);
		}*/


if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT sano,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20";
$sql .= " FROM ".$dbprefix."cnt_held ";  

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
		$rec->setPageLinkShow(false,false);

		$rec->setLink($PHP_SELF,"sessiontab=3&sub=36");
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

</body>
</html>
