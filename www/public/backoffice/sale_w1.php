<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint.php?bid='+id;
		window.open(wlink);
	}
</script>
<?

//require("./cls/sqlAnalizer.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT *,@num := @num + 1 b FROM (SELECT ".$dbprefix."asaleh.online,cancel,".$dbprefix."asaleh.id,".$dbprefix."asaleh.uid as uid,".$dbprefix."asaleh.sano,'' as hono,DATE_FORMAT(".$dbprefix."asaleh.sadate, '%Y-%m-%d') as sadate ,".$dbprefix."asaleh.scheck
,".$dbprefix."asaleh.tot_pv,".$dbprefix."asaleh.tot_bv,".$dbprefix."member.id_card,".$dbprefix."asaleh.tot_fv,".$dbprefix."asaleh.total,".$dbprefix."asaleh.name_t,".$dbprefix."asaleh.mcode AS smcode,".$dbprefix."asaleh.sa_type";
$sql .= ",checkportal,CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'Online'  WHEN '4' THEN 'ATO'  WHEN '5' THEN 'Stockist' END AS checkportal1";
$sql .= ",CASE ".$dbprefix."asaleh.send WHEN '1' THEN 'ส่ง' ELSE 'รับเอง' END AS send ";
$sql .= ",CONCAT(address,' ต.',districtId,' อ.',amphurId,' จ.',provinceId,' ',zip) AS address ";
$sql .= ",".$dbprefix."asaled.qty as qty1 ";
//$sql .= ",CASE ".$dbprefix."asaleh.asend WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS asend ,".$dbprefix."location_base.cshort ";
//,".$dbprefix."member.pos_cur as por_cur,".$dbprefix."member.name_f,".$dbprefix."member.sp_code as sp_code

$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."location_base ON (".$dbprefix."location_base.cid=".$dbprefix."asaleh.locationbase)    "; 
$sql .= "LEFT JOIN ".$dbprefix."asaled ON (".$dbprefix."asaleh.id=".$dbprefix."asaled.sano)    "; 
$sql .= " inner JOIN ".$dbprefix."member ON (".$dbprefix."member.mcode=".$dbprefix."asaleh.mcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."user ON (".$dbprefix."asaleh.uid=".$dbprefix."user.usercode)  where cancel = 0  "; 
if($fdate!=""){
	$sql .= " and ".$dbprefix."asaleh.sadate BETWEEN '$fdate' AND '$tdate' ";
	$where = 1;
}else $where = 0;
if($satype !=""){
	if($where == 1)$sql .= " and  ".$dbprefix."asaleh.sa_type = '$satype' ";
	else $sql .= " and  ".$dbprefix."asaleh.sa_type = '$satype' ";
}
if($logistic !=""){
	 $sql .= " and  ".$dbprefix."asaleh.send = '$logistic' ";
}

$sql .= " ) as a,(SELECT @num := 0) d where 1=1 " ;


if($inv_code !=""){
	 $sql .= " and  a.lid = '$inv_code' ";
}
if($strpv !=""){
	 $sql .= " and  a.tot_pv $strpv ";
}
if($strtotal !=""){
	 $sql .= " and  a.total $strtotal ";
}
if($struid !=""){
	 $sql .= " and  a.uid like '%$struid%' ";
}
if($sspv !=""){
	if($sspv == '6'){
	 $sql .= " and  a.checkportal <> '5' ";

	}else{
	 $sql .= " and  a.checkportal = '$sspv' ";
	}
}
if($locationbase !=""){
	 $sql .= " and  a.cshort = '$locationbase' ";
}
if($bank_pay !=""){
	 $sql .= " and  a.optionTransfer = '$bank_pay' ";
}

if($sregister =="3"){
	 $sql .= " and  a.scheck = ''";
}else{
	if($sregister !=""){
	 $sql .= " and  a.scheck = '$sregister' ";
	}
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
       $sql .= " and  a.strinvent like '%$strSearch%' ";
        break;
	 case "uid":
       $sql .= " and  a.uid like '%$strSearch%' ";
        break;
		 case "sp_code":
       $sql .= " and  a.sp_code like '%$strSearch' ";
        break;
}
	
//echo $sql;
//echo $sql;
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
		$rec->setLimitPage("50000");	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("99%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=28&fdate=$fdate&tdate=$tdate&satype=$satype&logistic=$logistic&strpv=$strpv&strtotal=$strtotal&struid=$struid&sspv=$sspv&inv_code=$inv_code&strSearch=$strSearch&strtype=$strtype&sregister=$sregister&locationbase=$locationbase&vip=$vip&bank_pay=$bank_pay");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("b,sano,smcode,name_f,name_t,id_card,sadate,qty1,tot_pv,total,address");
		$rec->setFieldDesc("ลำดับ,เลขบิล,รหัสผู้ซื้อ,คำนำหน้า,ชื่อผู้ซื้อ,รหัสประชาชน,วันที่ซื้อ,จำนวน,PV,จำนวนเงินรวม,ที่อยู่");
		$rec->setFieldFloatFormat(",,,,,,,0,2,2");
		$rec->setFieldAlign("center,center,center,left,left,center,center,right,right,right,left");
		//$rec->setFieldSpace("3%,6%,6%,3%,14%,4%,7%,4%,7%,3%,3%,4%,4%,4%,4%,4%,5%,5%,5%,5%");
		$rec->setFieldLink(",");
		//$rec->setSearch("sano,hono,sadate,smcode,inv_code,tot_pv");
		//$rec->setSearchDesc("เลขบิล,เลขบิลแจง,วันที่,รหัสผู้ซื้อ,ผู้บันทึก,จำนวน PV");
		$rec->setSum(true,false,",,,,,,,true,true,true");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","sale_bill".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","sale_bill".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		//$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","");
		$str = "<fieldset ><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
	}


?>