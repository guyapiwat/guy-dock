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
	$sqlwhere = " and sender_date BETWEEN '$fdate' AND '$tdate' and cancel=0 ";
	$sqlwhere1 = " and receive_date BETWEEN '$fdate' AND '$tdate' and cancel=0 ";
	$sqlwhere2 = " and sadate BETWEEN '$fdate' AND '$tdate' and cancel=0 ";
}
if(!empty($struid)){
	//$sqlwhere .= " and uid like '%".$struid."%' ";
	//$sqlwhere1 .= " and uid like '%".$struid."%' ";
	//12/18/2015$sqlwhere2 .= " and uid like '%".$struid."%' ";
}
if(!empty($sspv)){
	$sqlwhere .= " and checkportal <> '5' ";
	//$sqlwhere1 .= " and checkportal like '%".$sspv."%' ";

}
if($inv_code !=""){
	 $sqlwhere .= " and  inv_code = '$inv_code' ";
	 $sqlwhere1 .= " and  inv_code = '$inv_code' ";
	 $sqlwhere2 .= " and  inv_code = '$inv_code' ";
}
if($locationbase !=""){
	 $sqlwhere .= " and  locationbase = '$locationbase' ";
	 $sqlwhere1 .= " and  locationbase = '$locationbase' ";
	 $sqlwhere2 .= " and  locationbase = '$locationbase' ";
}
//var_dump($_POST);

$sql = "select *,'".$fdate."' as fdate,'".$tdate."' as tdate,
CASE '".$struid."' WHEN '' THEN '*' ELSE '".$struid."' END AS txtUser ,
CASE '".$sspv."' WHEN '' THEN '*'  WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' WHEN '4' THEN 'ATO' END AS txtcheckPortal 
,CASE '".$inv_code."' WHEN '' THEN '*' ELSE '".$inv_code."' END AS txtInvcode 


from 
(select number1,cid, typee,'0' as txtUser,'0' as txtd,CASE inv_ref WHEN '' THEN '*' ELSE inv_ref END AS code_ref1 from 
(

select '1' as number1,count(id) as cid,'บิลส่งของ(ชุดสมัคร)' as typee  from ali_asaleh where send = '1' and sender = '1' and scheck = 'register' $sqlwhere

union all select '2' as number1,count(id) as cid,'บิลรับของ(ชุดสมัคร)' as typee  from ali_asaleh where send != '1' and scheck = 'register'  and receive = '1' $sqlwhere1

union all select '3' as number1,count(id) as cid,'บิลส่งของ(สินค้า)' as typee  from ali_asaleh where  send = '1' and scheck != 'register'  and sender = '1' $sqlwhere1

union all select '4' as number1,count(id) as cid,'บิลรับของ(สินค้า)' as typee  from ali_asaleh where send != '1' and scheck != 'register'  and receive = '1' $sqlwhere1

union all select '5' as number1,count(id) as cid,'ใบเบิกของ' as typee  from ali_ostockh where 1=1 $sqlwhere2

union all select '6' as number1,count(id) as cid,'ใบรับของ' as typee  from ali_istockh where 1=1  $sqlwhere2

 
) as a LEFT JOIN ".$dbprefix."user ON (".$dbprefix."user.usercode like '%$struid%') where 1=1 group by a.typee) as a  " ;
//echo $sql;
///echo $sql;
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
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=18&fdate=$fdate&tdate=$tdate&satype=$satype&logistic=$logistic&strpv=$strpv&strtotal=$strtotal&struid=$struid&sspv=$sspv&inv_code=$inv_code&strSearch=$strSearch&strtype=$strtype&sregister=$sregister&locationbase=$locationbase");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("typee,fdate,tdate,cid,txtUser,txtInvcode,txtcheckPortal");
		$rec->setFieldDesc($wording_lan["Bill_5"].",".$wording_lan["tab3_3_1"].",".$wording_lan["tab3_3_2"].",".$wording_lan["tab3_3_3"].",".$wording_lan["uid"].",".$wording_lan["tab3_3_11"].",".$wording_lan["tab3_3_12"]);
		$rec->setFieldFloatFormat(",,,0");
		$rec->setFieldAlign("Center,center,center,right,Center,Center,Center");
		//$rec->setFieldSpace("12%,7%,7%,7%,7%,7%,7%,7%,7%,7%,6%,6%,6%,5%");
		$rec->setFieldLink(",");
		//$rec->setSearch("sano,hono,sadate,smcode,inv_code,tot_pv");
		//$rec->setSearchDesc("เลขบิล,เลขบิลแจง,วันที่,รหัสผู้ซื้อ,ผู้บันทึก,จำนวน PV");
		$rec->setSum(true,false,",,,true");
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