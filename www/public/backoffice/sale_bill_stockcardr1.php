<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprints.php?bid='+id;
		window.open(wlink);
	}
</script>
<?
require("connectmysql.php");
//require("./cls/sqlAnalizer.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

if($fdate!=""){
	$sqlwhere .= " and ".$dbprefix."stockcard_r.sadate BETWEEN '$fdate' AND '$tdate' ";
	$where = 1;
}else $where = 0;

if($inv_code !="" and $inv_code1 !=""){
	$sqlwhere .= " and (";
	$rs3 = mysql_query("SELECT * FROM ".$dbprefix."invent  where inv_code = '$inv_code' ");
    if(mysql_num_rows($rs3)>0){
				$data = mysql_fetch_object($rs3);
				$startid = $data->id;
	}else $startid = 0;

	$rs3 = mysql_query("SELECT * FROM ".$dbprefix."invent  where inv_code = '$inv_code1' ");
    if(mysql_num_rows($rs3)>0){
				$data = mysql_fetch_object($rs3);
				$finishid = $data->id;
	}else $finishid = 0;

	$rs = mysql_query("SELECT * FROM ".$dbprefix."invent where id between '$startid' and '$finishid' ");
    for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlwhere .= " ".$dbprefix."stockcard_r.inv_action = '".mysql_result($rs,$i,'inv_code')."' or  ";
	}

	$sqlwhere .= " ".$dbprefix."stockcard_r.inv_action = '9999' ) ";
}

if($pcode !="" and $pcode1 !=""){
	$sqlwhere .= " and (";
	//echo "SELECT * FROM ".$dbprefix."product  where pcode = '$pcode' ";
	$rs3 = mysql_query("SELECT * FROM ".$dbprefix."product  where pcode = '$pcode' ");
    if(mysql_num_rows($rs3)>0){
				$data = mysql_fetch_object($rs3);
				$startid = $data->id;
	}else $startid = 0;

	$rs3 = mysql_query("SELECT * FROM ".$dbprefix."product  where pcode = '$pcode1' ");
    if(mysql_num_rows($rs3)>0){
				$data = mysql_fetch_object($rs3);
				$finishid = $data->id;
	}else $finishid = 0;

	//echo "SELECT * FROM ".$dbprefix."pcode where id between '$startid' and '$finishid' ";
	//exit;
	$rs = mysql_query("SELECT * FROM ".$dbprefix."product where id between '$startid' and '$finishid' ");
    for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlwhere .= " ".$dbprefix."stockcard_r.pcode = '".mysql_result($rs,$i,'pcode')."' or  ";
	}

	$sqlwhere .= " ".$dbprefix."stockcard_r.pcode = '9999' ) ";
}

if($group_id !="" and $group_id1 !=""){
	$sqlwhere .= " and (";
	$rs3 = mysql_query("SELECT * FROM ".$dbprefix."productgroup  where id = '$group_id' ");
    if(mysql_num_rows($rs3)>0){
				$data = mysql_fetch_object($rs3);
				$startid = $data->idi;
	}else $startid = 0;

	$rs3 = mysql_query("SELECT * FROM ".$dbprefix."productgroup  where id = '$group_id1' ");
    if(mysql_num_rows($rs3)>0){
				$data = mysql_fetch_object($rs3);
				$finishid = $data->idi;
	}else $finishid = 0;

	$rs = mysql_query("SELECT * FROM ".$dbprefix."productgroup where idi between '$startid' and '$finishid' ");
    for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlwhere .= " ".$dbprefix."product.group_id = '".mysql_result($rs,$i,'id')."' or  ";
	}

	$sqlwhere .= " ".$dbprefix."product.group_id = '9999' ) ";
}

if($strSearch1!=""){
	$sqlwhere .= " and ".$dbprefix."stockcard_r.pcode = '$strSearch1'  ";
}
if($strSearch2!=""){
	$sqlwhere .= " and ".$dbprefix."stockcard_r.sano like '$strSearch2'  ";
}

$sql = "SELECT *,".$dbprefix."stockcard_r.pcode as pcode123,".$dbprefix."stockcard_r.price as price123 FROM ".$dbprefix."stockcard_r left join ".$dbprefix."product on (".$dbprefix."stockcard_r.pcode = ".$dbprefix."product.pcode) where 1=1 $sqlwhere ";


//echo $sql;
//echo $sql;
//$sql .= "GROUP BY pcode";// LEFT JOIN ".$dbprefix."bank ON ".$dbprefix."member.bankcode=".$dbprefix."bank.bankcode";
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	/*if($_GET['state']==1){
		include("member_del.php");
	}else if($_GET['state']==2){
		include("member_editadd.php");
	}else{*/
	//echo $sql;
	if($_GET['state']==1){
		//include("sale_pack1.php");
	}
		//$rec = new sqlAnalizer();
		//echo "<br />";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" ".$dbprefix."stockcard_r.id ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&fdate=$fdate&tdate=$tdate&satype=$satype&stype=$stype&strSearch1=$strSearch1&strSearch2=$strSearch2&inv_code=$inv_code&inv_code1=$inv_code1&pcode=$pcode&pcode1=$pcode1&group_id=$group_id&group_id1=$group_id1");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sadate,mcode,inv_code,inv_ref,sano,pcode123,in_qty,in_price,in_amount,out_qty,out_price,out_amount,yokma,balance,price123,amount");
		if($acc->isAccess(4)){
			//$rec->setDel("index.php","id","id","sessiontab=3&sub=55");
			//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=55&state=1","post","delfield");
		}
		$rec->setFieldFloatFormat(",,,,,,0,2,2,0,2,2,0,0,2,2");
		$rec->setFieldDesc("วันเดือนปี,รหัสสมาชิก,รหัสสาขารับ,รหัสสาขาคีย์,เลขที่ใบสำคัญ,รหัสสินค้า,รับ,ราคาต่อหน่วย,มูลค่า,จ่าย,ราคาต่อหน่วย,มูลค่า,ยกมา,ยกไป,ราคาต่อหน่วย,มูลค่าคงเหลือ");
		$rec->setFieldAlign("center,center,center,center,center,center,right,right,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("7%,7%,6%,6%,10%,9%,5%,7%,5%,5%,7%,5%,5%,5%,5%,7%");
		$rec->setSum(true,false,",,,,,,true,true,true,true,true,true,true,true,true,true");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","stockard".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","stockard".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
	
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	//}

?>