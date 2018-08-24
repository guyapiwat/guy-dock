<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = '../branch/invoice_aprintw.php?bid='+id;
		window.open(wlink);
	}
</script>

<?
if(!empty($_GET['sale'])){$sale = $_GET['sale'];}else {if(!empty($_POST['sale'])){$sale = $_POST['sale'];}else{$sale='';}}
if(!empty($_GET['strtotal'])){$strtotal = $_GET['strtotal'];}else {if(!empty($_POST['strtotal'])){$strtotal = $_POST['strtotal'];}else{$strtotal='';}}
$tttt = explode('-',$strtotal);
if(count($tttt) > 1){
	$where_tttt = " and a.txtMoney >= '".$tttt[0]."' and a.txtMoney <= '".$tttt[1]."' ";
}
else{
	$where_tttt = " and a.txtMoney = '".$tttt[0]."' ";
}



$where_bills = findBills("sano","a",$bills);
//echo $where_bills;
require("connectmysql.php");
//require("./cls/sqlAnalizer.php");
if ( $vip == 1 ){$where1 = "and ".$dbprefix."member.mtype2 = 1";$LEFT ='RIGHT'; }
	else {$where1 = "";$LEFT ='LEFT';}

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT *,@num := @num + 1 b FROM (";
$sql .= "SELECT cancel,".$dbprefix."ewallet.id,".$dbprefix."ewallet.checkportal,".$dbprefix."ewallet.uid as uid,sano,txtCash,txtFuture,txtTransfer,txtCredit1+txtCredit2+txtCredit3 as txtCredit,sadate,txtMoney,".$dbprefix."ewallet.lid ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE'  END AS checkportal1";
$sql .= ",CASE ".$dbprefix."ewallet.mcode WHEN '' THEN ".$dbprefix."ewallet.inv_code  ELSE ".$dbprefix."ewallet.mcode END AS smcode ";
$sql .= ",CASE ".$dbprefix."ewallet.mcode WHEN '' THEN ".$dbprefix."invent.inv_desc  ELSE ".$dbprefix."member.name_t END AS name_t
,".$dbprefix."location_base.cshort ";
$sql .= " FROM ".$dbprefix."ewallet ";
$sql .= "LEFT JOIN ".$dbprefix."location_base ON (".$dbprefix."location_base.cid=".$dbprefix."ewallet.locationbase) "; 

$sql .= "".$LEFT." JOIN ".$dbprefix."member ON (".$dbprefix."ewallet.mcode=".$dbprefix."member.mcode ".$where1." ) "; 
$sql .= "LEFT JOIN ".$dbprefix."invent ON (".$dbprefix."ewallet.inv_code=".$dbprefix."invent.inv_code) where  txtTransfer_out = 0 and txtTransfer_in = 0 and sa_type <> 'TI' and sa_type <> 'W' and sa_type <> 'TO'  and sa_type <> 'T' and sa_type <> 'W' and sa_type <> 'CI' "; 



//$sql .= " FROM ".$dbprefix."ewallet ";
//$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode)    "; 
//$sql .= "LEFT JOIN ".$dbprefix."user ON (".$dbprefix."asaleh.uid=".$dbprefix."user.usercode)  where cancel = 0  "; 


$sql .= " ) as a,(SELECT @num := 0) d where 1=1 " ;

if(!empty($sale)){
	if($sale=='A')$sql .= " and cancel = '0' ";
	else $sql .= " and cancel = '$sale' ";
}
if($fdate!=""){
	$sql .= " and a.sadate BETWEEN '$fdate' AND '$tdate' ";
	$where = 1;
}else $where = 0;
if($satype !=""){
	if($where == 1)$sql .= " and  a.sa_type = '$satype' ";
	else $sql .= " and  a.sa_type = '$satype' ";
}
if($logistic !=""){
	 $sql .= " and  a.send = '$logistic' ";
}


if($inv_code !=""){
	 $sql .= " and  lid = '$inv_code' ";
}
if($strpv !=""){
	 $sql .= " and  a.tot_pv $strpv ";
}
if($strtotal!="")$sql .= $where_tttt;

if($struid !=""){
	 $sql .= " and  a.uid like '%$struid%' ";
}
if($sspv !=""){
	 $sql .= " and  a.checkportal = '$sspv' ";
}
if($locationbase !=""){
	 $sql .= " and  a.cshort = '$locationbase' ";
}
switch ($strtype) {
    case "sano":
       $sql .= " and  a.sano like '%$strSearch%' ";
        break;
     case "hono":
       $sql .= " and  a.hono like '%$strSearch%'   ";
        break;
	 case "sadate":
       $sql .= " and  a.sadate like '%$strSearch%' ";
        break;
	 case "mcode":
       $sql .= " and  a.smcode like '%$strSearch%' ";
        break;
	case "strinvent":
       $sql .= " and  a.lid like '%$strSearch%' ";
        break;
	 case "uid":
       $sql .= " and  a.uid like '%$strSearch%' ";
        break;
		 case "sp_code":
       $sql .= " and  a.sp_code like '%$strSearch' ";
        break;
}
if(!empty($where_bills))$sql .= " and ".$where_bills." ";

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
		//echo $sql;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" a.id ":$_GET['ord']);
		$rec->setLimitPage("1000");	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=17&fdate=$fdate&tdate=$tdate&satype=$satype&logistic=$logistic&strpv=$strpv&strtotal=$strtotal&struid=$struid&sspv=$sspv&inv_code=$inv_code&strSearch=$strSearch&strtype=$strtype&bills=$bills");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("b,sano,smcode,name_t,sadate,txtMoney,txtCash,txtCredit,txtTransfer,uid,lid,checkportal1,cshort");
		$rec->setFieldDesc("ลำดับ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนเงินรวม,เงินสด,เครดิต,เงินโอน,ผู้บันทึก,สาขา,ช่องทาง,LB");
		$rec->setFieldFloatFormat(",,,,,2,2,2,2");
		$rec->setFieldAlign("center,center,center,left,center,right,right,right,right,center,center,center,center");
		$rec->setFieldSpace("3%,7%,6%,25%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%");
		$rec->setFieldLink(",");
		$rec->setSearch("sano,smcode,name_t,txtMoney,lid");
		$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,จำนวนเงินรวม,ผู้บันทึก");
		$rec->setSum(true,false,",,,,,true,true,true,true,,");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","sale_ewallet".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","sale_ewallet".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","sano","IMAGE","พิมพ์");

		//$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","");
		$str = "<fieldset ><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);
		$str2 = "<fieldset ><a href='../invoice/eprint_sale_backoffice.php?bid=$bills' target='_blank'>";
		$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
		$rec->setSpace($str2);
		$rec->showRec(1,'SH_QUERY');
	}


?>