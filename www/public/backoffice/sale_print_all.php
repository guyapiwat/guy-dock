<?php

if(!empty($_GET['s_list'])){$s_list = $_GET['s_list'];}else {if(!empty($_POST['s_list'])){$s_list = $_POST['s_list'];}else{$s_list='50';}}
if(!empty($_GET['fmcode'])){$mcode = $_GET['fmcode'];}else {if(!empty($_POST['fmcode'])){$mcode = $_POST['fmcode'];}else{$mcode='';}}

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

$sql = "SELECT '".$page."' as page,cancel,print,".$dbprefix."asaleh.id,".$dbprefix."asaleh.lid,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,remark,total,sp_code,sp_pos,CONCAT(".$dbprefix."asaleh.name_f,' ',".$dbprefix."asaleh.name_t) as name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE ".$dbprefix."asaleh.uid WHEN '' THEN ".$dbprefix."asaleh.inv_code ELSE ".$dbprefix."asaleh.uid END AS uid ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'Online' WHEN '4' THEN 'ATO' WHEN '5' THEN 'Stockist' END AS checkportal";

$sql .= $sqlWhere_satype;
$sql .= ",CASE ".$dbprefix."asaleh.receive WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."asaleh.receive_date) ELSE '<img src=./images/false.gif>' END AS receive ,
CASE ".$dbprefix."asaleh.sender WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."asaleh.sender_date) ELSE '<img src=./images/false.gif>' END AS sender   ";

$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= " where 1=1 "; //WHERE smcode='".$_SESSION['usercode']."' 

if(!empty($sale)){
	if($sale=='A')$sale = 0;
$sql .= " and cancel = '$sale' ";
}
if(!empty($fdate)){
$sql .= " and sadate >= '$fdate'  and sadate <= '$tdate'  ";
}
if($mcode!=""){
$sql .= " and mcode = '$mcode' ";
}
//$sql .= " WHERE  ".$dbprefix."asaleh.sa_type <> 'I'";
if(!empty($sano)){
$sql .= " and sano = '$sano' ";
}
$monthmonth = explode("-",$fdate);
/*$fdate = $monthmonth[0].'-'.$monthmonth[1];


if(!empty($fdate))
$sql .= " and sadate like '%$fdate%'  ";*/

if(!empty($inv))
$sql .= " and inv_code like '%$inv%'  ";




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

		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale&s_list=$s_list&inv=$inv&fmcode=$mcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("print,sadate,sano,smcode,name_t,ability,tot_pv,total,uid,sendsend,sender,receive,remark,lid,checkportal");
		$rec->setFieldFloatFormat(",,,,,,2,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("print,วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,ซื้อแบบ, PV,จำนวนเงิน,ผู้คีย์,ให้จัดส่ง,ส่งของ,รับของ,อ้างอิง,สาขา,ช่องทาง");
		$rec->setFieldAlign("center,left,left,left,left,left,center,center,right,right,center,center,center,center");
		$rec->setFieldSpace("1%,8%,10%,5%,20%,6%,6%,6%,8%,5%,5%,5%,5%,4%,4%");
	//	$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSum(true,false,",,,,,,true,true,,");
		
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
	//		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
	//	$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
	//	$rec->setSpace($str);
	 
	//	$str1 = "<fieldset><a href='invoice_pdf_sale.php?hid=$id' target='_blank'>";
	//	$str1 .= "<img border='0' src='./images/excel.gif'>สร้าง PDF</a></fieldset>";
	//	$rec->setSpace($str1);

	 
	//	$str2 = "<fieldset ><a href='".$rec->getParam()."&print_all=true' target='_blank'>";
		//$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
		//$rec->setSpace($str2);

		//$rec->setSpecial("./images/true.gif","","sale_status1","id,page","IMAGE","ส่งของ");
	
		//$rec->setSpecial("./images/true.gif","","sale_status","id,page","IMAGE","รับของ");
		$rec->showRec(1,'SH_QUERY');


?>