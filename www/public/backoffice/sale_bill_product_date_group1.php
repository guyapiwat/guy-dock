<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint.php?bid='+id;
		window.open(wlink);
	}
</script>
<?
set_time_limit(0);
ini_set("memory_limit","10000M");

$time_start = getmicrotime();
echo "เริ่มการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";

require("connectmysql.php");
//require("./cls/sqlAnalizer.php");

if($_POST){
	$sql = "TRUNCATE TABLE ".$dbprefix."product_invent_tmp ";
	mysql_query($sql);
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
			$sqlwhere .= " inv_code = '".mysql_result($rs,$i,'inv_code')."' or  ";
		}

		$sqlwhere .= " inv_code = '9999' ) ";
	}

	if($inv_code !="" and $inv_code1 !=""){
		$sqlwhere1 .= " and (";
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
			$sqlwhere1 .= " inv_action = '".mysql_result($rs,$i,'inv_code')."' or  ";
		}

		$sqlwhere1 .= " inv_action = '9999' ) ";
	}

	if($fpcode !="" and $tpcode !=""){
		$sqlwhere .= " and (";
		$rs3 = mysql_query("SELECT * FROM ".$dbprefix."product  where pcode = '$fpcode' ");
		if(mysql_num_rows($rs3)>0){
					$data = mysql_fetch_object($rs3);
					$startid = $data->id;
		}else $startid = 0;

		$rs3 = mysql_query("SELECT * FROM ".$dbprefix."product  where pcode = '$tpcode' ");
		if(mysql_num_rows($rs3)>0){
					$data = mysql_fetch_object($rs3);
					$finishid = $data->id;
		}else $finishid = 0;

		$rs = mysql_query("SELECT * FROM ".$dbprefix."product where id between '$finishid' and '$startid' ");
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlwhere .= " pcode = '".mysql_result($rs,$i,'pcode')."' or  ";
		}

		$sqlwhere .= " pcode = '9999' ) ";
	}

	if($fpcode !="" and $tpcode !=""){
		$sqlwhere1 .= " and (";
		$rs3 = mysql_query("SELECT * FROM ".$dbprefix."product  where pcode = '$fpcode' ");
		if(mysql_num_rows($rs3)>0){
					$data = mysql_fetch_object($rs3);
					$startid = $data->id;
		}else $startid = 0;

		$rs3 = mysql_query("SELECT * FROM ".$dbprefix."product  where pcode = '$tpcode' ");
		if(mysql_num_rows($rs3)>0){
					$data = mysql_fetch_object($rs3);
					$finishid = $data->id;
		}else $finishid = 0;

		$rs = mysql_query("SELECT * FROM ".$dbprefix."product where id between '$finishid' and '$startid' ");
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlwhere1 .= " pcode = '".mysql_result($rs,$i,'pcode')."' or  ";
		}

		$sqlwhere1 .= " pcode = '9999' ) ";
	}


	$sql = "SELECT qty,qtyr,pcode,inv_code FROM ".$dbprefix."product_invent ";
	$sql .= " where pcode NOT LIKE '%5919%' $sqlwhere "; 
	//echo $sql;
	//exit;
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		$sql = "insert into ".$dbprefix."product_invent_tmp (pcode,qty,qtys,inv_code,uid) values ";
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$qty =$sqlObj->qty;
			$qty =$qty+$sqlObj->qty_p;
			$pcode =$sqlObj->pcode;
			$rinv_code =$sqlObj->inv_code;
			/*$sql123 = "select * from ".$dbprefix."stock_oracle where pcode = '$pcode' and inv_code = '$rinv_code' and fdate = '$fdate' ";
			$rs1 = mysql_query($sql123);
			if(mysql_num_rows($rs1)>0){
			//	$rs = mysql_query($sql);
				$qty111 = mysql_result($rs1,0,"qty");
			}else $qty111=0;*/
			$qty111=$sqlObj->qtyr;
			$sql .= " ('$pcode','$qty','$qty111','".$rinv_code."','".$_SESSION["adminusercode"]."') ";
			
			if($i<mysql_num_rows($rs)-1){
				$sql .= ", ";
			}
		}
		mysql_query($sql);
	}

	$sql = "SELECT in_qty,out_qty,pcode,inv_action FROM ".$dbprefix."stockcard_s ";
	$sql .= " where 1=1 $sqlwhere1 and sadate > '$fdate' "; 
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$in_qty =$sqlObj->in_qty;
			$out_qty =$sqlObj->out_qty;
			$okok = $in_qty+$out_qty;
			$pcode =$sqlObj->pcode;
			$inv_action =$sqlObj->inv_action;
			
			if($okok > 0)
			$sql = "update ".$dbprefix."product_invent_tmp set qty = qty-".$okok." where pcode = '$pcode' and inv_code = '$inv_action'  ";
			else{
				$okok = -($okok);
				$sql = "update ".$dbprefix."product_invent_tmp set qty = qty+".$okok." where pcode = '$pcode' and inv_code = '$inv_action'  ";
			}

			//if($pcode == '5911001000007')echo "$sql<br>";
			
			mysql_query($sql);
		}
	}

	$sql = "SELECT in_qty,out_qty,pcode,inv_action FROM ".$dbprefix."stockcard_r ";
	$sql .= " where 1=1 $sqlwhere1 and sadate > '$fdate' "; 
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$in_qty =$sqlObj->in_qty;
			$out_qty =$sqlObj->out_qty;
			$okok = $in_qty+$out_qty;
			$pcode =$sqlObj->pcode;
			$inv_action =$sqlObj->inv_action;
			
			if($okok > 0)
			$sql = "update ".$dbprefix."product_invent_tmp set qtys = qtys-".$okok." where pcode = '$pcode' and inv_code = '$inv_action'  ";
			else{
				$okok = -($okok);
				$sql = "update ".$dbprefix."product_invent_tmp set qtys = qtys+".$okok." where pcode = '$pcode' and inv_code = '$inv_action'  ";
			}

			//if($pcode == '5911001000007')echo "$sql<br>";
			
			mysql_query($sql);
		}
	}
}

$sql = "SELECT a.pcode,p.pdesc,sum(a.qty) as qty,sum(a.qtys) as qtys,a.inv_code from ".$dbprefix."product_invent_tmp a left join ".$dbprefix."product p on (a.pcode = p.pcode)  where a.qty <> '0' group by a.pcode ";
//echo $sql;
$_GET['excel'] = '1';
		//echo $sql;
	$rec = new repGenerator();
	$rec->setQuery($sql);
	$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
	$rec->setOrder($_GET['ord']==""?" a.inv_code ":$_GET['ord']);
	$rec->setLimitPage("5000");	
	if(isset($_POST['skey']))
		$rec->setCause($_POST['skey'],$_POST['scause']);
	else if(isset($_GET['skey']))
		$rec->setCause($_GET['skey'],$_GET['scause']);
	$rec->setSize("95%","");
	$rec->setAlign("center");
	$rec->setPageLinkAlign("right");
	//$rec->setPageLinkShow(false,false);
	$rec->setLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]."&sub=54&fdate=$fdate&tdate=$tdate&satype=$satype&logistic=$logistic&strpv=$strpv&strtotal=$strtotal&struid=$struid&sspv=$sspv&inv_code=$inv_code&inv_code1=$inv_code1&pcode=$pcode&pcode1=$pcode1&strSearch=$strSearch&strtype=$strtype&sregister=$sregister");
	$rec->setBackLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]);
	if(isset($page))
		$rec->setCurPage($page);
	$rec->setShowField("pcode,pdesc,qty,qtys");
	$rec->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,จำนวน(ขาย),จำนวน(รับ)");
	$rec->setFieldFloatFormat(",,0");
	$rec->setFieldAlign("center,left,right,right,center");
	$rec->setFieldSpace("10%,60%,10%,10%,10%");
	$rec->setFieldLink(",");
//	$rec->setSearch("inv_code");
//	$rec->setSearchDesc("สาขา");
	//$rec->setSum(true,false,",,true,true,true,true");
	if($_GET['excel']==1){
		$rec->exportXls("ExportXls","sale_bill_product".date("Ym").".xls","SH_QUERY");
		$str = "<fieldset><a href='".$rec->download("ExportXls","sale_bill_product".date("Ym").".xls")."' >";
		$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
		//$rec->getParam();
		$rec->setSpace($str);
	}
	//$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","");
	//$str = "<fieldset ><a href='".$rec->getParam()."&excel=1' target='_self'>";
	//$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
	//$rec->setSpace($str);
	$rec->showRec(1,'SH_QUERY');

$time_end = getmicrotime();
$time = $time_end - $time_start;
echo "สิ้นสุดการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR>";
//echo 'Done';
$sql = "update ".$dbprefix."propro set propro_calc = '1',propro_time = '$time'	 where id = '$mid' ";
mysql_query($sql);
function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 
?>