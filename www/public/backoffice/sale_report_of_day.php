<?
include("rpdialog.php");
 
if(!empty($_GET['s_list'])){$s_list = $_GET['s_list'];}else {if(!empty($_POST['s_list'])){$s_list = $_POST['s_list'];}else{$s_list='50';}}
rpdialog_sale_inv($_GET['sub'],$fdate,$tdate,$sale,$s_list);
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

/*$sql = "select id  FROM ".$dbprefix."payment_type order by id asc ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	 $sqlObj = mysql_fetch_object($rs);
	$id = $sqlObj->id;
	$gid = gencode4($id);
	//echo "update ".$dbprefix."payment_type set mapping_code = '$gid' where id = '$id' <br>";
	mysql_query("update ".$dbprefix."payment_type set mapping_code = '$gid' where id = '$id' ");
	//echo $mcode.' : '.$upa_code.' : '.$level.'sss<br>';
	//if($i > 5)exit;
}*/

/*$sql = "select mcode,upa_code,id  FROM ".$dbprefix."bm where lv <= 0";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	 $sqlObj = mysql_fetch_object($rs);
	$id = $sqlObj->id;
	$mcode = $sqlObj->mcode;
	$upa_code = $sqlObj->upa_code;
	$level = isLevel($dbprefix,$mcode,$upa_code,'1');
	mysql_query("update ".$dbprefix."bm set lv = '$level' where id = '$id' ");
	//echo $mcode.' : '.$upa_code.' : '.$level.'sss<br>';
	//if($i > 5)exit;
}

function isLevel($dbprefix,$scode,$testcode,$level){
		$sql = "SELECT upa_code FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
		$rs = mysql_query($sql);
		if($scode==$testcode)
			return $level;
		if(mysql_num_rows($rs)<=0)
			return false;
		else if(mysql_result($rs,0,'upa_code')!=$testcode)
			return isLevel($dbprefix,mysql_result($rs,0,'upa_code'),$testcode,$level+1);
		else
			return $level;
	}*/


/*$sql = "select mcode  FROM ".$dbprefix."cmbonus where 1=1 group by mcode ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	 $sqlObj = mysql_fetch_object($rs);
	$id = $sqlObj->id;
	$mcode = $sqlObj->mcode;
	$sql = "select name_t,name_f,mobile,acc_no,acc_name,bankcode,branch,mobile,cmp,cmp2  FROM ".$dbprefix."member where mcode = '$mcode'  ";
	//echo $sql.'<br>';
	$rs1 = mysql_query($sql);
	//if(mysql_num_rows($rs1) > 0)
	//{
		 $sqlObj1 = mysql_fetch_object($rs1);
		$name_f = $sqlObj1->name_f;
		$name_t = $sqlObj1->name_t;
		$mobile = $sqlObj1->mobile;
		$acc_no = $sqlObj1->acc_no;
		$acc_name = $sqlObj1->acc_name;
		$bankcode = $sqlObj1->bankcode;
		$branch = $sqlObj1->branch;
		$mobile = $sqlObj1->mobile;
		$cmp = $sqlObj1->cmp;
		$cmp2 = $sqlObj1->cmp2;
		$sqlupdate = "update ".$dbprefix."cmbonus set name_f = '$name_f',name_t = '$name_t'
		,mobile = '$mobile',acc_no = '$acc_no'
		,acc_name = '$acc_name',bankcode = '$bankcode'
		,branch = '$branch',mobile = '$mobile'
		,cmp = '$cmp',cmp2 = '$cmp2'		
		where mcode = '$mcode' ";
		//echo $sqlupdate.'<br>';
		mysql_query($sqlupdate);


	//}
}
*/
 
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

$sql = "SELECT '".$page."' as page,".$dbprefix."member.id_card,cancel,print,".$dbprefix."asaleh.id,".$dbprefix."asaleh.lid,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,remark,CONCAT(".$dbprefix."asaleh.name_f,' ',".$dbprefix."asaleh.name_t) as name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE ".$dbprefix."asaleh.uid WHEN '' THEN ".$dbprefix."asaleh.inv_code ELSE ".$dbprefix."asaleh.uid END AS uid ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'Online' WHEN '4' THEN 'ATO' WHEN '5' THEN 'Stockist' END AS checkportal";

$sql .= ",CASE sa_type WHEN 'A' THEN '".$wording_lan['satype']['A']."' WHEN 'B' THEN '".$wording_lan['satype']['B']."' WHEN 'C' THEN '".$wording_lan['satype']['C']."' WHEN 'Q' THEN '".$wording_lan['satype']['Q']."' WHEN 'H' THEN '".$wording_lan['satype']['H']."' WHEN 'TE' THEN '".$wording_lan['satype']['TE']."'     END AS ability";

$sql .= ",CASE cancel WHEN '1' THEN 0 ELSE ".$dbprefix."asaleh.txtCash END as txtCash " ;
$sql .= ",CASE cancel WHEN '1' THEN 0 ELSE (".$dbprefix."asaleh.txtTransfer+".$dbprefix."asaleh.txtFuture) END as txtTransfer" ;
$sql .= ",CASE cancel WHEN '1' THEN 0 ELSE (".$dbprefix."asaleh.txtCredit1+".$dbprefix."asaleh.txtCredit2+".$dbprefix."asaleh.txtCredit3) END as txtCredit" ;
$sql .= ",CASE cancel WHEN '1' THEN 0 ELSE ".$dbprefix."asaleh.txtInternet END as txtInternet" ;
$sql .= ",CASE cancel WHEN '1' THEN 0 ELSE ".$dbprefix."asaleh.txtDiscount END as txtDiscount" ;
 //$sql .= ",".$dbprefix."asaleh.optionTransfer as optionTransfer" ;

$sql .= ",CASE cancel WHEN '1' THEN '' ELSE ".$dbprefix."payment_type.pay_desc END as optionTransfer" ;

//$sql .= ",(SELECT pay_desc  FROM ali_payment_type  WHERE ".$dbprefix."asaleh.optionTransfer=ali_payment_type.mapping_code) as optionTransfer" ;
$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
$sql .= ",CASE sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd ";
$sql .= ",CASE ".$dbprefix."asaleh.receive WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."asaleh.receive_date) ELSE '<img src=./images/false.gif>' END AS receive ,
CASE ".$dbprefix."asaleh.sender WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."asaleh.sender_date) ELSE '<img src=./images/false.gif>' END AS sender   ";
$sql .= ",CASE cancel WHEN '1' THEN 0 ELSE total END  AS total ";
$sql .= ",CASE cancel WHEN '1' THEN 0 ELSE total*0.95 END  AS total_tax ";
$sql .= ",CASE cancel WHEN '1' THEN 0 ELSE total*0.05 END  AS tax ";
$sql .= ",CASE cancel WHEN '1' THEN 'ยกเลิก' ELSE '' END AS cencels ";
$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member on ".$dbprefix."asaleh.mcode = ".$dbprefix."member.mcode  ";
$sql .= "LEFT JOIN ".$dbprefix."payment_type on (".$dbprefix."asaleh.optionTransfer = ".$dbprefix."payment_type.mapping_code) ";
 
$sql .= " where 1=1 and sano <> '' and lid <> '' "; //WHERE smcode='".$_SESSION['usercode']."' 

if(!empty($sale)){
	if($sale=='A')$sale = 0;
$sql .= " and cancel = '$sale' ";
}else{
	
}
if(!empty($fdate)){
$sql .= " and sadate >= '$fdate'  and sadate <= '$tdate'  ";
}

if(!empty($skey)){
	$sql .= " and ".$skey." = '".$scause."'   ";
}

 


if(!empty($inv)){
$sql .= " and lid = '$inv' ";
}

//$sql .= " WHERE  ".$dbprefix."asaleh.sa_type <> 'I'";
if(!empty($sano)){
//$sql .= " and sano = '$sano' ";
}
$monthmonth = explode("-",$fdate);
/*$fdate = $monthmonth[0].'-'.$monthmonth[1];
if(!empty($fdate))
$sql .= " and sadate like '%$fdate%'  ";*/

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
	
	include("sale_print_report.php");
	echo "</div>";
	 echo "<script type='application/javascript'>window.onload=function(){printDiv('divprint');}</script>";
	exit;
} 

if(!empty($inv)){

//echo $sql;
//
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

		$sql11 = $sql;
		$result11 = mysql_query($sql11);		
		for($i=0;$i<mysql_num_rows($result11);$i++){
			$data = mysql_fetch_object($result11);
			$id .= $data->id.',';		   
		}	

		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?"id":$_GET['ord']);

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
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale&s_list=$s_list&inv=$inv");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sano,name_t,smcode,total,txtCash,txtCredit,txtCredit4,txtTransfer,optionTransfer,txtInternet,txtDiscount,cencels");
		$rec->setFieldFloatFormat(",,,,,2,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("เลขบิล,ชื่อผู้ซื้อ,รหัสสมาชิก,ยอดขาย,เงินสด,บัตรเครดิต,เครดิต,เงินโอน,โอนธนาคาร,ewallet,Voucher,หมายเหตุ");
		$rec->setFieldAlign("left,left,center,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("8%,20%,8%,8%,8%,8%,8%,8%,8%,8%,8%,8%,8%,8%");
		$rec->setFieldFloatFormat(",,,2,2,2,2,");
		$rec->setSum(true,false,",,,true,true,true,true,,true,true,true");
		//$rec->setFieldSpace("8%,10%,5%,20%,8%,6%,6%,6%,6%,8%,5%,5%,5%,5%,4%,4%");
	//	$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setSearch("sano,".$dbprefix."asaleh.mcode,".$dbprefix."asaleh.name_t,".$dbprefix."asaleh.inv_code,sadate,tot_pv,total,".$dbprefix."asaleh.uid");

		//$rec->setSearch("".$dbprefix."asaleh.lid");
		//$rec->setSearchDesc("Branch");
		/*$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,สาขา,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,พนักงาน");
		$rec->setSum(true,false,",,,,,true,true,,");*/

		
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
 
	 
		$str2 = "<fieldset ><a href='".$rec->getParam()."&print_all=true' target='_blank'>";
		$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
		$rec->setSpace($str2);

		$rec->showRec(1,'SH_QUERY');
 
	}

}

?>