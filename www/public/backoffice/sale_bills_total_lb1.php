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
	$sqlwhere .= " and uid like '%".$struid."%'    ";
	$sqlwhere1 .= " and uid like '%".$struid."%'    ";
}
if(!empty($sspv)){
	$sqlwhere .= " and checkportal like '%".$sspv."%' and checkportal <> '5' ";

}else{
	$sqlwhere .= "  and checkportal = '5' ";

}
if($inv_code !=""){
	 $sqlwhere .= " and  lid = '$inv_code' ";
	$sqlwhere1 .= " and inv_from = '$inv_code'  ";
}
if($locationbase !=""){
	 $sqlwhere .= " and  locationbase = '$locationbase' ";
	 $sqlwhere1 .= " and  ali_isaleh.locationbase = '$locationbase' ";
}
//var_dump($_POST);

$sql = "select *,'".$fdate."' as fdate,'".$tdate."' as tdate,
CASE '".$struid."' WHEN '' THEN '*' ELSE '".$struid."' END AS txtUser ,
CASE '".$sspv."' WHEN '' THEN '*'  WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' WHEN '4' THEN 'ATO' END AS txtcheckPortal 
,CASE '".$inv_code."' WHEN '' THEN '*' ELSE '".$inv_code."' END AS txtInvcode 


from 
(select number1,mcode,cid, total,typee,txtCash,txtCredit,txtEwallet,txtTransfer,txtDiscount,'0' as txtUser,'0' as txtd,CASE inv_ref WHEN '' THEN '*' ELSE inv_ref END AS code_ref1,IFNULL(txtOther, 0) as txtOther from 
(
select '3' as number1,mcode,count(id) as cid,sum(total*crate) as total,sum(txtCash*crate) as txtCash,sum((txtCredit1+txtCredit2+txtCredit3)*crate) as txtCredit,sum(txtInternet*crate) as txtEwallet,sum(txtTransfer*crate) as txtTransfer,sum(txtFuture*crate) as txtFuture,sum(txtDiscount*crate) as txtDiscount,'��Ţ��'  as typee,'0' as txtOther  from ali_asaleh where scheck = ''  $sqlwhere

union select '4' as number1,mcode,count(id) as cid, sum(txtMoney*crate) as total,sum(txtCash*crate) as txtCash,sum((txtCredit1+txtCredit2+txtCredit3)*crate) as txtCredit,'0' as txtEwallet,sum(txtTransfer*crate) as txtTransfer,'0' as txtFuture,'0' as txtDiscount,'����Թ' as typee,'0' as txtOther  from ali_ewallet where 1=1 $sqlwhere

union select '1' as number1,mcode,count(id) as cid, sum(total*crate) as total,sum(txtCash*crate) as txtCash,sum((txtCredit1+txtCredit2+txtCredit3)*crate) as txtCredit,sum(txtInternet*crate) as txtEwallet,sum(txtTransfer*crate) as txtTransfer,sum(txtFuture*crate) as txtFuture,sum(txtDiscount*crate) as txtDiscount,'�����Ѥ�' as typee,'0' as txtOther  from ali_asaleh where scheck = 'register'  $sqlwhere

union select '2' as number1,mcode,count(id) as cid, sum(total*crate) as total,sum(txtCash*crate) as txtCash,sum((txtCredit1+txtCredit2+txtCredit3)*crate) as txtCredit,sum(txtInternet*crate) as txtEwallet,sum(txtTransfer*crate) as txtTransfer,sum(txtFuture*crate) as txtFuture,sum(txtDiscount*crate) as txtDiscount,'��ŵ������' as typee,'0' as txtOther  from ali_asaleh where scheck = 'extend'  $sqlwhere

) as a LEFT JOIN ".$dbprefix."user ON (".$dbprefix."user.usercode like '%$struid%') where 1=1 group by a.typee) as a  " ;
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
		$rec->setLimitPage("50000");	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=47&fdate=$fdate&tdate=$tdate&satype=$satype&logistic=$logistic&strpv=$strpv&strtotal=$strtotal&struid=$struid&sspv=$sspv&inv_code=$inv_code&strSearch=$strSearch&strtype=$strtype&sregister=$sregister&locationbase=$locationbase");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("typee,fdate,tdate,cid,total,txtCash,txtCredit,txtEwallet,txtFuture,txtTransfer,txtDiscount,txtOther,txtUser,txtInvcode,txtcheckPortal");
		$rec->setFieldDesc("��Դ,�ҡ�ѹ���,�֧�ѹ���,�ӹǹ���,�ӹǹ�Թ���,�Թʴ,�ôԵ,Ewallet,Voucher,�Թ�͹,��ǹŴ,Loan,User,�Ң�,��ͧ�ҧ");
		$rec->setFieldFloatFormat(",,,,2,2,2,2,2,2,2,2");
		$rec->setFieldAlign("Center,center,center,center,right,right,right,right,right,right,right,right,center,center,center");
		$rec->setFieldSpace("7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,6%,6%,6%,5%");
		$rec->setFieldLink(",");
		//$rec->setSearch("sano,hono,sadate,smcode,inv_code,tot_pv");
		//$rec->setSearchDesc("�Ţ���,�Ţ���ᨧ,�ѹ���,���ʼ�����,���ѹ�֡,�ӹǹ PV");
		$rec->setSum(true,false,",,,,true,true,true,true,true,true,true,true");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","sale_bill".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","sale_bill".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>��Ŵ Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		//$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","");
		$str = "<fieldset ><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>���ҧ Excel</a></fieldset>";
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
	}


?>