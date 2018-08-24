
<?
include("rpdialog.php");
$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
rpdialog_sale($_GET['sub'],$fdate,$tdate,$sale);
?>
<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint_sale.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
		window.location='index.php?sessiontab=3&sub=6&sanoo='+id;
	}
	function sale_look(id){
		var wlink = 'invoice_alook_sale.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
		//window.location='index.php?sessiontab=3&sub=6&sanooo='+id;
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=3&sub=6&state=3&bid='+id;
		}
	}
	function sale_status(id,page){
	//	if(confirm("ต้องการเปลี่ยนแปลงการรับของ")){
			window.location='index.php?sessiontab=3&sub=6&state=6&sender='+id+'&page='+page;
	//	}
	}
		function sale_status1(id,page){
	//	if(confirm("ต้องการเปลี่ยนแปลงจัดส่ง")){
			window.location='index.php?sessiontab=3&sub=6&state=7&sender='+id+'&page='+page;
	//	}
	}
</script>
<?
require("connectmysql.php");
//var_dump($_SESSION);
if(!empty($_GET["sano"]))$sano = $_GET["sano"];
$year = date("Y");
$month = date("m");

//echo $previous =  date("Y-m",strtotime($year."-".$month."-01 -1 months"));
//var_dump($previous);


$date = mktime(1, 1, 1, $month, date("d"), $year);

$first_day_of_month = strtotime("-" . (date("d", $date)-1) . " days", $date);
$last_day_of_month = strtotime("+" . (date("t", $first_day_of_month)-1) . " days", $first_day_of_month);

$first_week_no = date("W", $first_day_of_month);
$last_week_no = date("W", $last_day_of_month);

if($last_week_no < $first_week_no) $last_week_no=date("W", strtotime("-1 week",$last_week_no)) + 1;
$weeks_of_month = $last_week_no - $first_week_no + 1;

/*
$sql = "select *  FROM ".$dbprefix."tmbonus order by id asc limit 0,1000 ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	 $sqlObj = mysql_fetch_object($rs);
	$id = $sqlObj->id;
	$mcode = $sqlObj->mcode;
	$sql = "select name_t,name_f  FROM ".$dbprefix."member where mcode = '$mcode'  ";
	//echo $sql.'<br>';
	$rs1 = mysql_query($sql);
	//if(mysql_num_rows($rs1) > 0)
	//{
		 $sqlObj1 = mysql_fetch_object($rs1);
		$name_f = $sqlObj1->name_f;
		$name_t = $sqlObj1->name_t;
		$sqlupdate = "update ".$dbprefix."tmbonus set name_f = '$name_f',name_t = '$name_t' where id = '$id' ";
		//echo $sqlupdate.'<br>';
		mysql_query($sqlupdate);


	//}
}*/
/*$sql = "select *  FROM ".$dbprefix."holdhead where tot_pv = 0 and sadate = '2013-12-02'   ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	 $sqlObj = mysql_fetch_object($rs);
	$hono = $sqlObj->hono;
	$sano = $sqlObj->sano;

	$sql = "select sum(pv*qty) as sumpv  FROM ".$dbprefix."holddesc where hono = '$hono' group by hono ";
	//echo $sql.'<br>';
	$rs1 = mysql_query($sql);
	if(mysql_num_rows($rs1) > 0)
	{
		 $sqlObj1 = mysql_fetch_object($rs1);
		$sumpv = $sqlObj1->sumpv;
		$sqldel1 = "update ".$dbprefix."holdhead set tot_pv = '$sumpv'  where hono = '$hono' ";
		$sqldel2 = "update ".$dbprefix."asaleh set hpv = hpv-$sumpv  where id = '$sano' ";
		echo $sqldel1.'<br>';
		echo $sqldel2.'<br><br>';
		mysql_query($sqldel1);
		mysql_query($sqldel2);
	//	echo $mcode.'<br>';
		//mysql_query("update ".$dbprefix."member set pos_cur4 = '' where mcode = '$mcode' ");

	}


	echo $sqldel1.'<br>';
	echo $sqldel2.'<br><br>';
	//mysql_query($sqldel1);
	//mysql_query($sqldel2);
	//if($htotal == 0 and $hpv == 0)$sqlupdate .= " , hstatus = 1 ";
	//$sqlupdate .= " where id = '$sano'";


}*/

//echo substr('', -4, 4);
//exit;
/*$sql = "select *  FROM ".$dbprefix."member   ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	 $sqlObj = mysql_fetch_object($rs);
	$mcode = $sqlObj->mcode;
	if($sqlObj->cdistrictId != 0)$cdistrictId = getdistrict($sqlObj->cdistrictId);else $cdistrictId = "";
	if($sqlObj->camphurId != 0)$camphurId = getamphur($sqlObj->camphurId);else $camphurId = "";
	if($sqlObj->cprovinceId != 0)$cprovinceId = getprovince($sqlObj->cprovinceId);else $cprovinceId = "";
	if($sqlObj->districtId != 0)$districtId = getdistrict($sqlObj->districtId);else $districtId = "";
	if($sqlObj->amphurId != 0)$amphurId = getamphur($sqlObj->amphurId);else $amphurId = "";
	if($sqlObj->provinceId != 0)$provinceId = getprovince($sqlObj->provinceId);else $provinceId = "";
	$sql = "update ".$dbprefix."member set cdistrictId='$cdistrictId',
	cdistrictId='$cdistrictId',
	camphurId='$camphurId',
	cprovinceId='$cprovinceId',
	districtId='$districtId',
	amphurId='$amphurId',
	provinceId='$provinceId' where mcode = '$mcode' ";
	//echo $sql.'<br>';
	$rs1 = mysql_query($sql);
}*/
/*$sql = "select *  FROM ".$dbprefix."member where pos_cur4 <> '' ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	 $sqlObj = mysql_fetch_object($rs);
	$mcode = $sqlObj->mcode;
	$sql = "select *  FROM ".$dbprefix."calc_poschange4 where mcode = '$mcode' ";
	//echo $sql.'<br>';
	$rs1 = mysql_query($sql);
	if(mysql_num_rows($rs1) <= 0)
	{
		echo $mcode.'<br>';
		//mysql_query("update ".$dbprefix."member set pos_cur4 = '' where mcode = '$mcode' ");

	}




}*/

/*$sql .= "select * from FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) where cancel=0 and send = '1' and (receive <> '1') ";
echo $sql;
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){

	 $sqlObj = mysql_fetch_object($rs);
		if(!empty($data->caddress))$caddress = 'บ้านเลขที่  '.$data->caddress.' , ';
		if(!empty($data->cbuilding))$cbuilding = 'อาคาร '.$data->cbuilding.' , ';
		if(!empty($data->cvillage))$cvillage = 'หมู่บ้าน/คอนโด '.$data->cvillage.' , ';
		if(!empty($data->csoi))$csoi = 'ตรอก/ซอย '.$data->csoi.' , ';
		if(!empty($data->cstreet))$cstreet = 'ถนน '.$data->cstreet;
		$caddress = $caddress.''.$cbuilding.''.$cvillage.''.$csoi.''.$cstreet;

		$cprovinceId = $data->cprovinceId;
		$cdistrictId = $data->cdistrictId;
		$camphurId = $data->camphurId;
		$czip = $data->czip;

	 $sqlUpdate = "update ".$dbprefix."asaleh set caddress  = '$caddress',cdistrictId  = '$cdistrictId',camphurId  = '$camphurId',cprovinceId  = '$cprovinceId',czip  = '$czip'  where mcode = '$mcode'";
	 echo $sqlUpdate.'<br>';
	// $rsUpdate = mysql_query($sqlUpdate);

}*/

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
$sqlupdate = "update ".$dbprefix."asaleh set print = print+1 where id = '{$_GET["sanoo"]}'";
mysql_query($sqlupdate);
}
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
$sql = "SELECT '".$page."' as page,cancel,print,".$dbprefix."asaleh.id,".$dbprefix."asaleh.lid,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,".$dbprefix."asaleh.tot_pv,tot_bv,tot_fv,remark,total,CONCAT(".$dbprefix."asaleh.name_f,' ',".$dbprefix."asaleh.name_t) as name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE ".$dbprefix."asaleh.uid WHEN '' THEN ".$dbprefix."asaleh.inv_code ELSE ".$dbprefix."asaleh.uid END AS uid ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'Online' WHEN '4' THEN 'ATO' WHEN '5' THEN 'Stockist' END AS checkportal";

$sql .= ",CASE sa_type WHEN 'A' THEN '".$wording_lan['satype']['A']."' WHEN 'B' THEN '".$wording_lan['satype']['B']."' WHEN 'C' THEN '".$wording_lan['satype']['C']."' WHEN 'Q' THEN '".$wording_lan['satype']['Q']."' WHEN 'H' THEN '".$wording_lan['satype']['H']."'     END AS ability";


$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
$sql .= ",CASE sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd ";
$sql .= ",CASE ".$dbprefix."asaleh.receive WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."asaleh.receive_date) ELSE '<img src=./images/false.gif>' END AS receive ,
CASE ".$dbprefix."asaleh.sender WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."asaleh.sender_date) ELSE '<img src=./images/false.gif>' END AS sender   ";

$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "RIGHT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode and ".$dbprefix."member.mtype1 ='1') ";
$sql .= " where 1=1 "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$sql .= " WHERE  ".$dbprefix."asaleh.sa_type <> 'I'";
if(!empty($sano)){
$sql .= " and sano = '$sano' ";
}
if(!empty($sale)){
	if($sale=='A')$sale = 0;
$sql .= " and ".$dbprefix."asaleh.cancel = '$sale' ";
}
if(!empty($fdate)){
$sql .= " and ".$dbprefix."asaleh.sadate >= '$fdate'  and ".$dbprefix."asaleh.sadate <= '$tdate'  ";
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
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("print,sadate,sano,smcode,name_t,ability,tot_pv,total,uid,lid,checkportal");
		$rec->setFieldFloatFormat(",,,,,,2,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("print,วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,ซื้อแบบ, PV,จำนวนเงิน,ผู้คีย์,สาขา,ช่องทาง");
		$rec->setFieldAlign("center,center,center,center,left,center,right,right,center,center,center,center");
		//$rec->setFieldSpace("1%,7%,13%,5%,20%,4%,6%,6%,8%,5%,5%,5%,5%,4%,4%");
	//	$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,".$dbprefix."asaleh.mcode,".$dbprefix."asaleh.name_t,".$dbprefix."asaleh.inv_code,sadate,tot_pv,total,".$dbprefix."asaleh.uid");
		$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,สาขา,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,พนักงาน");
		$rec->setSum(true,false,",,,,,,true,true,,");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE","ดู");
		
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		 
		//}
		if($acc->isAccess(4)){
		//	$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		}
		//var_dump($acc->isAccess(2));
		//exit;
		if($acc->isAccess(2))

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