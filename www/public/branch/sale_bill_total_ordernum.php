<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint.php?bid='+id;
		window.open(wlink);
	}
</script>
<?
require("connectmysql.php");
//require("./cls/sqlAnalizer.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if($fdate!=""){
	$sqlwhere = " and sadate BETWEEN '$fdate' AND '$tdate' and cancel=0 ";
	$sqlwhere1 = " and sadate BETWEEN '$fdate' AND '$tdate' and cancel=0 ";
}
if(!empty($struid)){
	$sqlwhere .= " and uid like '%".$struid."%' ";
	$sqlwhere1 .= " and uid like '%".$struid."%' ";
}
if(!empty($sspv)){
	$sqlwhere .= " and checkportal like '%".$sspv."%' and checkportal <> '5' ";
	//$sqlwhere1 .= " and checkportal like '%".$sspv."%' ";

}
if($inv_code !=""){
	 $sqlwhere .= " and  lid = '$inv_code' ";
}
if($locationbase !=""){
	 $sqlwhere .= " and  locationbase = '$locationbase' ";
	 $sqlwhere1 .= " and  locationbase = '$locationbase' ";
}
//var_dump($_POST);

$sql = "select *,'".$fdate."' as fdate,'".$tdate."' as tdate,
CASE '".$struid."' WHEN '' THEN '*' ELSE '".$struid."' END AS txtUser ,
CASE '".$sspv."' WHEN '' THEN '*'  WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' WHEN '4' THEN 'ATO' END AS txtcheckPortal 
,CASE '".$inv_code."' WHEN '' THEN '*' ELSE '".$inv_code."' END AS txtInvcode 


from 
(select number1,mcode,cid, total,typee,txtCash,txtCredit,txtEwallet,txtFuture,txtTransfer,txtDiscount,'0' as txtUser,'0' as txtd,CASE inv_ref WHEN '' THEN '*' ELSE inv_ref END AS code_ref1,IFNULL(txtOther, 0) as txtOther from 
(
select '2' as number1,mcode,count(id) as cid,sum(total) as total,sum(txtCash) as txtCash,sum(txtCredit1+txtCredit2+txtCredit3) as txtCredit,sum(txtInternet) as txtEwallet,sum(txtTransfer) as txtTransfer,sum(txtFuture) as txtFuture,sum(txtDiscount) as txtDiscount,'บิลขาย'  as typee, '0' as txtOther  from ali_asaleh where (sa_type <> 'L' and sa_type <> 'Z')  $sqlwhere

union select '3' as number1,mcode,count(id) as cid,sum(total) as total,sum(txtCash) as txtCash,sum(txtCredit1+txtCredit2+txtCredit3) as txtCredit,sum(txtInternet) as txtEwallet,sum(txtTransfer) as txtTransfer,sum(txtFuture) as txtFuture,sum(txtDiscount) as txtDiscount,'บิลสมัคร'  as typee, '0' as txtOther  from ali_asaleh where scheck='register'  $sqlwhere

union select '4' as number1,mcode,count(id) as cid, sum(txtMoney) as total,sum(txtCash) as txtCash,sum(txtCredit1+txtCredit2+txtCredit3) as txtCredit,'0' as txtEwallet,sum(txtTransfer) as txtTransfer,'0' as txtFuture,'0' as txtDiscount,'บิลเติมเงิน Ewallet' as typee, '0' as txtOther  from ali_ewallet where 1=1 $sqlwhere and txtTransfer_out = 0 and txtTransfer_in = 0


union select '5' as number1,mcode,count(id) as cid, sum(total) as total,sum(txtCash) as txtCash,sum(txtCredit1+txtCredit2+txtCredit3) as txtCredit,sum(txtInternet) as txtEwallet,sum(txtTransfer) as txtTransfer,sum(txtFuture) as txtFuture,0 as txtDiscount,'บิลเติมเงิน Eautoship' as typee, '0' as txtOther from ali_eatoship where 1=1 and sa_type ='I' $sqlwhere


) as a LEFT JOIN ".$dbprefix."user ON (".$dbprefix."user.usercode like '%$struid%') where 1=1 group by a.typee) as a  " ;
//union select '3' as number1,mcode,count(id) as cid,sum(total) as total,sum(txtCash) as txtCash,sum(txtCredit1+txtCredit2+txtCredit3) as txtCredit,sum(txtInternet) as txtEwallet,sum(txtTransfer) as txtTransfer,sum(txtFuture) as txtFuture,sum(txtDiscount) as txtDiscount,'บิลแลกของ'  as typee ,'0' as txtOther  from ali_asaleh where sa_type = 'L'  $sqlwhere
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
		$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" a.number1 ":$_GET['ord']);
		$rec->setLimitPage("5000");	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=18&fdate=$fdate&tdate=$tdate&satype=$satype&logistic=$logistic&strpv=$strpv&strtotal=$strtotal&struid=$struid&sspv=$sspv&inv_code=$inv_code&strSearch=$strSearch&strtype=$strtype");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("typee,fdate,tdate,cid,total,txtCash,txtCredit,txtEwallet,txtFuture,txtTransfer,txtDiscount,txtUser,txtInvcode,txtcheckPortal");
		$rec->setFieldDesc($wording_lan["Bill_5"].",".$wording_lan["tab3_3_1"].",".$wording_lan["tab3_3_2"].",".$wording_lan["tab3_3_3"].",".$wording_lan["tab2_report_36"].",".$wording_lan["tab3_3_5"].",".$wording_lan["tab3_3_6"].",".$wording_lan["tab3_3_7"].",".$wording_lan["Report_16"] .",".$wording_lan["Billjang_12"].",".$wording_lan["tab3_3_9"].",".$wording_lan["tab3_3_10"].",".$wording_lan["tab3_3_11"].",".$wording_lan["tab3_3_12"]);
		$rec->setFieldFloatFormat(",,,,2,2,2,2,2,2,2,");
		$rec->setFieldAlign("left,center,center,center,right,right,right,right,right,right,right,center,center,center");
		//$rec->setFieldSpace("7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,6%,6%,6%,5%");
		$rec->setFieldLink(",");
		//$rec->setSearch("sano,hono,sadate,smcode,inv_code,tot_pv");
		//$rec->setSearchDesc("เลขบิล,เลขบิลแจง,วันที่,รหัสผู้ซื้อ,ผู้บันทึก,จำนวน PV");
		$rec->setSum(true,false,",,,,true,true,true,true,true,true,true,");
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