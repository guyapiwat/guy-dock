<?


$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$type = $_POST['type']==""?$_GET['type']:$_POST['type'];

if(!empty($_GET['bills'])){$bills = $_GET['bills'];}else {if(!empty($_POST['bills'])){$bills = $_POST['bills'];}else{$bills='';}}


$where_bills = findBills("hono","h",$bills);
//echo $where_bills;
rpdialog_sale_hold($_GET['sub'],$fdate,$tdate,$sale);
?>

<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = '../invoice/hprint_sale_branch.php?bid='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			var remark = prompt("กรุณากรอกหมายเหตุ ค่ะ","");
			if(remark == ""){
				alert("คุณไม่ได้กรอกหมายเหตุ ค่ะ");
			}
			if(remark !== null && remark !== ""){
				window.location='index.php?sessiontab=3&sub=10&state=3&bid='+id+'&remark='+remark;
			}
		}
	}
</script>
<?

require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT h.cancel,h.id,hono,h.sadate,h.tot_pv,h.total,h.name_t,h.mcode AS smcode,h.uid,h.sp_code, h.remark ";
$sql .= $sqlWhere_satypeh2;
$sql .= " FROM ".$dbprefix."holdhead h";
$sql .= " WHERE 1=1 ";
if(!empty($sale)){
	if($sale=='A')$sql .= " and h.cancel = '0' ";
	else $sql .= " and h.cancel = '$sale' ";
}
if(!empty($fdate)){
$sql .= " and h.sadate >= '$fdate'  and h.sadate <= '$tdate'  ";
}
if($sa_type!='')$sql .= " and h.sa_type = '$sa_type' ";

if(!empty($where_bills))$sql .= " and ".$where_bills." ";

	if($_GET['state']==1){
		include("hold_del.php");
	}else if($_GET['state']==2){
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=9'</script>";	
		//include("sale_editadd.php");
	}else if($_GET['state']==3){
		include("hold_cancel.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" h.id ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale&sa_type=$sa_type&bills=$bills");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("hono,preserve,smcode,name_t,sadate,tot_pv,total,uid,remark");
		$rec->setFieldFloatFormat(",,,,,2,2");
		$rec->setFieldDesc("เลขบิล,ประเภท,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,ผู้บันทึก,หมายเหตุ");
		$rec->setFieldAlign("center,center,center,left,center,right,right,center");
		//$rec->setFieldSpace("5%,5%,8%,20%,7%,7%,7%,7%,10%,10%,20%");
		$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("h.hono,h.mcode,m.name_t,h.sadate,h.tot_pv,h.total,h.uid");
		$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,ผู้บันทึก");
		$rec->setSum(true,false,",,,,,true,true");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","hono","IMAGE","พิมพ์");
		if($acc->isAccess(4)){
		$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		}
		
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		if($acc->isAccess(4)){
			//$rec->setDel("index.php","id","id","sessiontab=3&sub=10");
			//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=10&state=1","post","delfield");
		}
		//if($acc->isAccess(2))
			//$rec->setEdit("index.php","bid,id","sano,id","sessiontab=3&sub=9");
		if($_GET['excel']==1){

			$rec->exportXls("ExportXls","hold".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","hold".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);
		$str2 = "<fieldset ><a href='../invoice/hprint_sale_branch.php?bid=$bills' target='_blank'>";
		$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
		$rec->setSpace($str2);
		
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>