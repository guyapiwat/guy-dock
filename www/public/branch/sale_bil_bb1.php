<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprintb.php?bid='+id;
		window.open(wlink);
	}
</script>
<?
require("connectmysql.php");
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
	
	include("print_bil_bb.php");
	echo "</div>";
	 echo "<script type='application/javascript'>window.onload=function(){printDiv('divprint');}</script>";
	exit;
} 

if($fdate!=""){
	$sqlwhere .= " and h.sadate BETWEEN '$fdate' AND '$tdate' ";
	$where = 1;
}else $where = 0;
if($satype !=""){
	if($where == 1)$sqlwhere .= " and h.sa_type = '$satype' ";
	else $sqlwhere .= " and  h.sa_type = '$satype' ";
}
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
		$sqlwhere .= "h.inv_code = '".mysql_result($rs,$i,'inv_code')."' or  ";
	}

	$sqlwhere .= "h.inv_code = '9999' ) ";
}
if($txtpcode !=""){
	$sqlwhere .=" and d.pcode = '".$txtpcode."'";
}

//$sqlwhere .= " ) as a,(SELECT @num := 0) d where 1=1 " ;
//require("./cls/sqlAnalizer.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

//echo '<center>A1 : S-Matix Center</center>';
$sql = "SELECT d.pcode,SUM(d.qty) as qty_tot ,d.pv,d.price,d.pdesc,(SUM(d.qty)*d.price) as total";
$sql .= " FROM ".$dbprefix."ostockh h  "; //WHERE smcode='".$_SESSION['usercode']."' 
$sql .=" LEFT JOIN ".$dbprefix."ostockd d ON(h.id=d.sano) where h.cancel=0";
$sql .= $sqlwhere ;
if($selectsano ==""){
	$sql .= " and (SUBSTR(h.sano, 1, 2) = '��' or SUBSTR(h.sano,1, 2 )='º')  ";
}else{
	//$sql .= " and SUBSTR(sano, 1, 2) = '$selectsano'  ";
	$sql .= " and h.sano = '$selectsano'  ";
}
if($mapping_code !=""){
	$sql .= " and h.mapping_code = '$mapping_code'   ";
}
$sql .=" GROUP BY d.pcode";

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
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" d.pcode ":$_GET['ord']);
		$rec->setLimitPage("ALL");	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&fdate=$fdate&tdate=$tdate&satype=$satype&inv_code=$inv_code&inv_code1=$inv_code1&strSearch=$strSearch&strtype=$strtype&txtpcode=$txtpcode&mapping_code=$mapping_code&selectsano=$selectsano");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."");
		if(isset($page))
			$rec->setCurPage($page);

		$rec->setShowField("pcode,pdesc,qty_tot,price,pv,total");
		$rec->setFieldFloatFormat(",,2,2,2,2,,,,");
		//$rec->setFieldDesc("�Ţ���,���ʼ�����,���ͼ�����,�ѡ���ʹ,�Ӥس���ѵ�,hold�ʹ,�ѹ������,�ӹǹ���  PV,�ӹǹ�Թ���");
		$rec->setFieldDesc("�����Թ���,�����Թ���,�ӹǹ,�Ҥҵ��˹���,PV,�ʹ�Թ�ط��");
		//$rec->setFieldLink(",,,,,,,index.php?sessiontab=3&sub=138&state=4&sender=");
		$rec->setFieldAlign("center,left,right,right,right,right");
		$rec->setFieldSpace("11%,30%,15%,15%,15%,15%");
		$rec->setFieldLink(",");
		$rec->setSpecial("","","","","NUMROW","�ӴѺ");
		//$rec->setSearch("sano,hono,sadate,smcode,inv_code,tot_pv");
		//$rec->setFieldDesc("�����Թ���,�����Թ���,�ӹǹ,�Ҥҵ��˹���,PV,�ʹ�Թ�ط��");
		$rec->setSum(true,true,",,true,true,true,true");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","sale_bb".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","sale_bb".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>��Ŵ Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		//$rec->setSpecial("./images/search.gif","","sale_print","id","IMAGE","����§ҹ");
		$str = "<fieldset ><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>���ҧ Excel</a></fieldset>";
		$rec->setSpace($str);
		$str2 = "<fieldset ><a href='".$rec->getParam()."&print_all=true' target='_blank'>";
		$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>����������</a></fieldset>";
		$rec->setSpace($str2);
		$rec->showRec(1,'SH_QUERY');
	}


?>