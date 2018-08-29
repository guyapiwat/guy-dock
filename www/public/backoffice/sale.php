
<?php

include("rpdialog.php");
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
if(!empty($_GET['s_list'])){$s_list = $_GET['s_list'];}else {if(!empty($_POST['s_list'])){$s_list = $_POST['s_list'];}else{$s_list='500';}}
if(!empty($_GET['fmcode'])){$mcode = $_GET['fmcode'];}else {if(!empty($_POST['fmcode'])){$mcode = $_POST['fmcode'];}else{$mcode='';}}
if(!empty($_GET['bills'])){$bills = $_GET['bills'];}else {if(!empty($_POST['bills'])){$bills = $_POST['bills'];}else{$bills='';}}
if(!empty($_GET['inv'])){$inv = $_GET['inv'];}else {if(!empty($_POST['inv'])){$inv = $_POST['inv'];}else{$inv='';}}

$where_bills = findBills("sano","ali_asaleh",$bills);
//echo $where_bills;


rpdialog_sale_list($_GET['sub'],$fdate,$tdate,$sale,$s_list,$mcode);
?>
<script language="javascript" type="text/javascript">
	function sale_print(id){
	    link = '<?=$actual_link?>invoice/aprint_sale_backoffice.php';  
        var wlink = link+'?bid='+id; 
        window.open(wlink);  
	}
	function sale_look(id){
	    link = '<?=$actual_link?>invoice/aprint_salelook.backoffice.php';  
        var wlink = link+'?bid='+id; 
		window.open(wlink);
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
<?php
require("connectmysql.php");
require("global.php");
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
 
if($_GET["sanoo"]){
$sqlupdate = "update ".$dbprefix."asaleh set print = print+1 where id = '{$_GET["sanoo"]}'";
mysql_query($sqlupdate);
}
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

$sql = "SELECT '".$page."' as page,cancel,print,".$dbprefix."asaleh.id,".$dbprefix."asaleh.lid,".$dbprefix."asaleh.ref,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,remark,total,sp_code,sp_pos,CONCAT(".$dbprefix."asaleh.name_f,' ',".$dbprefix."asaleh.name_t) as name_t,".$dbprefix."asaleh.mcode AS smcode,".$dbprefix."asaleh.total_vat AS total_vat";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE ".$dbprefix."asaleh.uid WHEN '' THEN ".$dbprefix."asaleh.inv_code ELSE ".$dbprefix."asaleh.uid END AS uid ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'Online' WHEN '4' THEN 'ATO' WHEN '5' THEN 'Stockist' END AS checkportal";
$sql .= ",CASE checkportal WHEN '2' THEN ".$dbprefix."asaleh.lid ELSE '' END AS lid1";

$sql .= $sqlWhere_satype1;
$sql .= ",CASE ".$dbprefix."asaleh.receive WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."asaleh.receive_date) ELSE '<img src=./images/false.gif>' END AS receive ,
CASE ".$dbprefix."asaleh.sender WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."asaleh.sender_date) ELSE '<img src=./images/false.gif>' END AS sender   ";

$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= " where 1=1 "; //WHERE smcode='".$_SESSION['usercode']."' 
//var_dump($sale);
 
if(!empty($sale)){
	if($sale=='A')$sql .= " and cancel = '0' ";
else $sql .= " and cancel = '$sale' ";
}
if($skey=='tot_pv'){
$sql .= " and ".$dbprefix."asaleh.tot_pv = '$scause'  ";
}
if($skey=='total'){
$sql .= " and ".$dbprefix."asaleh.total = '$scause'  ";
}
if(!empty($fdate)){
$sql .= " and sadate >= '$fdate'  and sadate <= '$tdate'  ";
}
if($mcode!=""){
$sql .= " and mcode = '$mcode' ";
}
if($inv!=""){
$sql .= " and lid = '$inv' ";
}
//$sql .= " WHERE  ".$dbprefix."asaleh.sa_type <> 'I'";
if(!empty($sano)){
$sql .= " and sano = '$sano' ";
}
if(!empty($type)){
$sql .= " and sa_type = '$type' ";
}
$monthmonth = explode("-",$fdate);
/*$fdate = $monthmonth[0].'-'.$monthmonth[1];


if(!empty($fdate))
$sql .= " and sadate like '%$fdate%'  ";*/

if(!empty($inv))
$sql .= " and inv_code like '%$inv%'  ";

if(!empty($where_bills))$sql .= " and ".$where_bills." ";



if($_GET['print_all']==true){
	echo '<script type="text/javascript">
			function printDiv(divName) {
				 var printContents = document.getElementById(divName).innerHTML;
				 var originalContents = document.body.innerHTML;
				 document.body.innerHTML = printContents;
				 window.print();
			}
			 
			</script>
		';
	echo "<div id='divprint'>";
	
	include("sale_print_all.php");
	echo "</div>";
	 echo "<script type='application/javascript'>window.onload=function(){printDiv('divprint');}</script>";
	exit;
} 
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

	$sql11 = $sql;
	$result11 = mysql_query($sql11);		
	for($i=0;$i<mysql_num_rows($result11);$i++){
		$data = mysql_fetch_object($result11);
		if($i==0){
			$id .= $data->id;	
		}else{
		$id .= ','.$data->id;		
		}
	}	

	$rec = new repGenerator();
	$rec->setQuery($sql);
	$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
	$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);

	if($_GET["excel"]==1){		
	$rec->setLimitPage('ALL');
	}else{
	$rec->setLimitPage($s_list);
	}

	if(isset($_POST['skey']))$rec->setCause($_POST['skey'],$_POST['scause']);
	else if(isset($_GET['skey']))$rec->setCause($_GET['skey'],$_GET['scause']);
	$rec->setSize("95%","");
	$rec->setAlign("center");
	$rec->setPageLinkAlign("right");
	$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale&s_list=$s_list&inv=$inv&fmcode=$mcode&sale=$sale&type=$type&bills=$bills"); 
	$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");			   
	if(isset($page))$rec->setCurPage($page);
	$rec->setShowField("print,sadate,sano,smcode,name_t,ability,tot_pv,total,uid,sendsend,sender,receive,remark,lid1,checkportal");
	$rec->setFieldFloatFormat(",,,,,,2,2,");
	$rec->setFieldDesc("print,วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,ประเภทบิล, PV,จำนวนเงิน,ผู้บันทึก,ให้จัดส่ง,ส่งของ,รับของ,อ้างอิง,สาขา,ช่องทาง");
	$rec->setFieldAlign("center,left,left,left,left,center,right,right,center,center,center,center");
	$rec->setSearch("sano,".$dbprefix."asaleh.mcode,".$dbprefix."asaleh.name_t,tot_pv,total,".$dbprefix."asaleh.uid");
	$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,ผู้บันทึก");
	$rec->setSum(true,false,",,,,,,true,true,,");
	$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","sano","IMAGE","พิมพ์");
	$rec->setSpecial("./images/search.gif","","sale_look","sano","IMAGE","ดู");
	
	$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		
	if($_GET['excel']==1){
		logtext(true,$_SESSION["adminusercode"],'Export Excel : ข้อมูลสมาชิก','');
		$text="uid=".$_SESSION["adminusercode"]." action=member_export_excel =>$sql";
		writelogfile($text);
		$rec->exportXls("ExportXls","member".date("Ymd").".xls","SH_QUERY");
		$str = "<fieldset><a href='".$rec->download("ExportXls","member".date("Ymd").".xls")."' >";
		$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
		$rec->setSpace($str);
	}
	$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
	$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
	$rec->setSpace($str);
	$str2 = "<fieldset ><a href='".$actual_link."invoice/aprint_sale_backoffice.php?bid=$bills&fdate=$fdate&tdate=$tdate&sale=$sale&inv=$inv&type=$type' target='_blank'>"; 
	$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
	$rec->setSpace($str2);
	$rec->showRec(1,'SH_QUERY');

}

	
	
?>