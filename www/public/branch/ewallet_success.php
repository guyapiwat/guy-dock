<?

$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
if(!empty($_GET['bills'])){$bills = $_GET['bills'];}else {if(!empty($_POST['bills'])){$bills = $_POST['bills'];}else{$bills='';}}


$where_bills = findBills("sano","ali_ewallet",$bills);
//echo $where_bills;
rpdialog_sale_ewallet_online($_GET['sub'],$fdate,$tdate,$sale);
?>

<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprintw.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("<?=$wording_lan['Bill_21']?>")){
			var remark = prompt("��سҡ�͡�����˵� ���","");
			if(remark == ""){
				alert("�س������͡�����˵� ���");
			}
			else{
				window.location='index.php?sessiontab=3&sub=148&state=3&bid='+id+'&remark='+remark;
			}
		}
			
	}
	function sale_look(id){
		var wlink = 'invoice_aprintw_look.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
		//window.location='index.php?sessiontab=3&sub=6&sanooo='+id;
	}
</script>
<?
require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,".$dbprefix."ewallet.id,".$dbprefix."ewallet.lid as lid,sano,txtCash,txtFuture,txtTransfer,txtCredit1+txtCredit2+txtCredit3 as txtCredit,sadate,txtMoney ,concat(".$dbprefix."ewallet.name_f,' ',".$dbprefix."ewallet.name_t) as name_t,".$dbprefix."ewallet.remark as remark ";
$sql .= ",CASE ".$dbprefix."ewallet.mcode WHEN '' THEN ".$dbprefix."ewallet.inv_code  ELSE ".$dbprefix."ewallet.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."ewallet ";
$sql .= " where ".$dbprefix."ewallet.lid  = '{$_SESSION["admininvent"]}' and txtTransfer_out = 0 and txtTransfer_in = 0 and sano_temp <> '' "; 
if(!empty($sale)){
		if($sale == "A"){$sql .= "and cancel = '0' ";}
		else{$sql .= "and cancel = '".$sale."' ";}
}
if(!empty($fdate)){
$sql .= " and sadate >= '$fdate'  and sadate <= '$tdate'  ";
}
if(!empty($where_bills))$sql .= " and ".$where_bills." ";
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("ewallet_del.php");
	}else if($_GET['state']==2){
		include("ewallet_editadd.php");
	}else if($_GET['state']==3){
		include("ewallet_cancel.php");
	}else{
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
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale&bills=$bills");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,sano,smcode,name_t,txtMoney,txtCash,txtTransfer,txtCredit,lid,remark");
		$rec->setFieldFloatFormat(",,,,2,2,2,2,,,");
		//$rec->setFieldDesc("�Ţ���,���ʼ�����,���ͼ�����,�ѡ���ʹ,�Ӥس���ѵ�,hold�ʹ,�ѹ������,�ӹǹ���  PV,�ӹǹ�Թ���");
		//$rec->setFieldDesc("�ѹ������,�Ţ���,���ʼ�����,���ͼ�����,�ӹǹ�Թ���,�Թʴ,�Թ�͹,�ѵ��ôԵ,�Ң� ���� ��ѡ�ҹ");
		$rec->setFieldDesc($wording_lan["Billjang_4"].",".$wording_lan["Billjang_1"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Billjang_6"].",".$wording_lan["Billjang_11"].",".$wording_lan["Billjang_12"].",".$wording_lan["Billjang_13"].",".$wording_lan["Billjang_17"].",�����˵�");
		$rec->setFieldAlign("center,center,center,left,right,right,right,right,right,right,right,right,center");
		//$rec->setFieldSpace("10%,12%,10%,26%,8%,8%,8%,8%,8%,8%");
		//$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
		$rec->setSearch("sadate,sano,".$dbprefix."ewallet.mcode,name_t,txtMoney,txtCash,txtTransfer,lid");
	//	$rec->setSearchDesc("�Ţ���,���ʼ�����,���ͼ�����,�ѹ������,�ӹǹ���  PV,�ӹǹ�Թ���,�Ң����;�ѡ�ҹ");
		$rec->setSearchDesc($wording_lan["Billjang_4"].",".$wording_lan["Billjang_1"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Billjang_6"].",".$wording_lan["Billjang_11"].",".$wording_lan["Billjang_12"].",".$wording_lan["Billjang_17"]);
		$rec->setSum(true,false,",,,,true,true,true,true,");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","sano","IMAGE",$wording_lan["Bill_print"]);
		$rec->setSpecial("./images/search.gif","","sale_look","sano","IMAGE",$wording_lan["Bill_view"]);
		//if($acc->isAccess(4) and $_SESSION["inventobj6"] == '7'){
		if($acc->isAccess(4)){
			$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE",$wording_lan["Bill_cancle"]);
		}	
		//$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=148");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=148&state=1","post","delfield");
		}*/
		if($acc->isAccess(4) and $_SESSION["inventobj6"] == '7'){
		$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","¡��ԡ");		
		}
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//var_dump($acc->isAccess(2));
		//exit;
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","ewallet".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","ewallet".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>".$wording_lan["Billjang_loding"]." Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>".$wording_lan["Billjang_cre"]." Excel</a></fieldset>";
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
/*$sql = "SELECT cancel,".$dbprefix."asaleh.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		$rec->setQuery($sql);*/
	}

?>