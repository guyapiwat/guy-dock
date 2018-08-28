<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint_sale.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
	//	window.location='index.php?sessiontab=5&sub=145&sanoo='+id;
	}
	function sale_look(id){
		var wlink = 'invoice_alook_sale.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
		//window.location='index.php?sessiontab=5&sub=145&sanooo='+id;
	}
	function sale_cancel(id){
			if(confirm("<?=$wording_lan['Bill_21']?>"))
				{
				window.location='index.php?sessiontab=5&sub=145&state=3&bid='+id;
		}
	}
	function sale_status(id,page,chktype,receive){
		if(receive == '0'){
			if(confirm("<?=$wording_lan['Bill_22']?>")){
				window.location='index.php?sessiontab=5&sub=558&state=1&sender='+id+'&page='+page+'&chktype='+chktype;
				exit;
			}
		}
	}
	function sale_status1(id){
		if(confirm("<?=$wording_lan['Bill_23']?>")){
			window.location='index.php?sessiontab=5&sub=145&state=7&sender='+id;
		}
	}
</script>
<?
require("connectmysql.php");
require("global.php");
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


if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
	
	
	$sql  = "SELECT * ";
	$sql .= ",CASE receive WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS receive1 ";
	$sql .= "FROM ali_istockh ";
	$sql .= "WHERE 1=1 and receive = '1' ";
	$sql .= "";
	
	if($_GET['state']==1){
		include("istock_receive_operate.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]);
		$rec->setBackLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]);
		if(isset($page))
			$rec->setCurPage($page); 
		$rec->setShowField("sadate,sano,inv_code,inv_refn,inv_ref,inv_coden,total,tot_pv,receive1,receive_date,uid_receive");
		$rec->setFieldDesc("วันที่เปิดบิล,เลขที่บิล,รหัสสาขารับ,ชื่อสาขารับ,รหัสผู้คีย์,ชื่อผู้คีย์,จำนวนเงิน,PV,สถานะรับของ,วันที่รับของ,ผู้คีย์รับ");
		$rec->setFieldAlign("center,left,center,left,center,left,right,right,center,center,center");
		$rec->setFieldSpace("7%,8%,8%,12%,8%,12%,10%,10%,8%,10%,8%");
		$rec->setFieldFloatFormat(",,,,,,2,2,,,");
		$rec->setSum(true,false,",,,,,,true,true,,,");
		$rec->setSearch("sadate,sano,inv_code,inv_refn,inv_ref,inv_coden,total,tot_pv");
		$rec->setSearchDesc("วันที่เปิดบิล,เลขที่บิล,รหัสสาขารับ,ชื่อสาขารับ,รหัสผู้คีย์,ชื่อผู้คีย์,จำนวนเงิน,PV");
		
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE",$wording_lan["Bill_print"]);
		//$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE",$wording_lan["Bill_view"]);
		//$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//$rec->setSpecial("./images/true.gif","","sale_status","id,page,chktype,receive","IMAGE",$wording_lan["send_1"]);
		$rec->showRec(1,'SH_QUERY');

	}

?>