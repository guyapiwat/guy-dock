<script language="javascript" type="text/javascript">
	function sale_print(id,typetype){
		if(typetype == '1')var wlink = 'invoice_aprint_sale.php?bid='+id;
		if(typetype == '2')var wlink = 'invoice_hprint.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=3&sub=6&state=3&bid='+id;
		}
	}
	function sale_status(id){
		if(confirm("ต้องการเปลี่ยนแปลงจัดส่ง")){
			window.location='index.php?sessiontab=3&sub=6&state=6&sender='+id;
		}
	}
</script>
<?
if(isset($_POST["ftrcode1"]))$ftrcode1 = $_POST["ftrcode1"];
else  if(isset($_GET["ftrcode1"]))$ftrcode1 = $_GET["ftrcode1"];


$wwhere = " a.rcode between '".$ftrcode1."' and '".$ftrcode1."' ";
$sql="select min(fdate) as fdate1,max(tdate) as tdate1 from ".$dbprefix."around a where  $wwhere  ";
$result=mysql_query($sql);
if (mysql_num_rows($result)>'0') {
	$row= mysql_fetch_array($result, MYSQL_ASSOC);
	$fdate=$row["fdate1"];
	$tdate=$row["tdate1"];
}

if(isset($_POST["cmc"]))
	$mcode = $_POST["cmc"];
else if(isset($_GET["cmc"]))
	$mcode = $_GET["cmc"];

if(isset($_POST["aa"]))$strfdate = $_POST["aa"];
else  if(isset($_GET["aa"]))$strfdate = $_GET["aa"];

if(isset($_POST["strtdate"]))$strtdate = $_POST["strtdate"];
else  if(isset($_GET["strtdate"]))$strtdate = $_GET["strtdate"];

if(empty($strfdate))$strfdate = $fdate;
if(empty($strtdate))$strtdate = $fdate;
require("connectmysql.php");
require("global.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT * FROM (SELECT cancel,".$dbprefix."asaleh.id,'1' as typetype,".$dbprefix."asaleh.uid as uid,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,total,ali_member.name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= $sqlxxxx;
$sql .= ",CASE ".$dbprefix."asaleh.inv_code WHEN '' THEN 'บริษัท' ELSE ".$dbprefix."asaleh.inv_code END AS inv_code,CASE ".$dbprefix."asaleh.send WHEN '1' THEN 'บิลแจงผ่านบริษัท' ELSE 'บิลขายปกติ' END AS type ";
$sql .= ",CASE ".$dbprefix."asaleh.asend WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS asend ,".$dbprefix."member.pos_cur as por_cur, ali_asaleh.sa_type as xxxx, ali_asaleh.scheck ";

$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode)  where cancel = 0 "; 


if(!empty($mcode))$sql .= " and ".$dbprefix."asaleh.mcode = '$mcode' " ;
if(!empty($strfdate))$sql .= " and ".$dbprefix."asaleh.sadate >= '".$strfdate."'  and ".$dbprefix."asaleh.sadate <= '".$strtdate."'  and sa_type <> 'H' ";

$sql .= " UNION ALL "; 

$sql .= "SELECT cancel,".$dbprefix."holdhead.id,'2' as typetype,".$dbprefix."holdhead.uid as uid,hono as sano ,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,total,ali_member.name_t,".$dbprefix."holdhead.mcode AS smcode";
$sql .= ",'<img src=./images/false.gif>' AS sendsend ";
$sql .= $sqlxxxx;
$sql .= ",CASE ".$dbprefix."holdhead.inv_code WHEN '' THEN 'บริษัท' ELSE ".$dbprefix."holdhead.inv_code END AS inv_code,'บิลขายแจงยอด' as type ";
$sql .= ",'<img src=./images/false.gif>' AS asend ,".$dbprefix."member.pos_cur as por_cur , ali_holdhead.sa_type as xxxx , '' as scheck ";

$sql .= "FROM ".$dbprefix."holdhead ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."holdhead.mcode=".$dbprefix."member.mcode)  where cancel = 0";

if(!empty($mcode))$sql .= " and ".$dbprefix."holdhead.mcode = '$mcode' " ;
if(!empty($strfdate))$sql .= " and ".$dbprefix."holdhead.sadate >= '".$strfdate."'  and ".$dbprefix."holdhead.sadate <= '".$strtdate."'   and sa_type <> 'H'  ";

$sql .= " ) as a where 1=1 "; 
if(!empty($_GET["aaaa"]))$sql .= "and a.xxxx = '".$_GET["aaaa"]."' and a.scheck <> 'register' ";


//echo $sql;
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
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=666&cmc=$mcode&ftrcode1=$ftrcode1&strfdate=$strfdate&strtdate=$strtdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sano,smcode,name_t,ability,sadate,tot_pv,total,uid");
		$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,ซื้อแบบ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,ผู้บันทึก");
		$rec->setFieldFloatFormat(",,,,,0,2");
		$rec->setFieldAlign("center,center,left,center,center,right,right,center,center");
		$rec->setFieldSpace("15%,7%,40%,7%,8%,8%,8%,6%,10%");
 		//$rec->setSearch("sano,sadate,smcode,inv_code");
		//$rec->setSearchDesc("เลขบิล,เลขบิลแจง,วันที่,รหัสผู้ซื้อ,ผู้บันทึก");
		$rec->setSum(true,false,",,,,,true,true,,");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,typetype","IMAGE","พิมพ์");
		$rec->showRec(1,'SH_QUERY');
	}

?>