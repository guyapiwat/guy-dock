<?

$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$inv = $_POST['inv']==""?$_GET['inv']:$_POST['inv'];
if(!empty($_GET['bills'])){$bills = $_GET['bills'];}else {if(!empty($_POST['bills'])){$bills = $_POST['bills'];}else{$bills='';}}
   

$where_bills = findBills("sano","ewa",$bills);
//echo $where_bills;
?>
<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = '../invoice/eprint_sale_branch.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("<?=$wording_lan['Bill_21']?>")){
			var remark = prompt("กรุณากรอกหมายเหตุ ค่ะ","");
			if(remark == ""){
				alert("คุณไม่ได้กรอกหมายเหตุ ค่ะ");
			}
			else{
				window.location='index.php?sessiontab=3&sub=148&state=3&bid='+id+'&remark='+remark;
			}
		}
			
	}
	function sale_look(id){
		var wlink = '../invoice/eprint_sale_branch.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
		//window.location='index.php?sessiontab=3&sub=6&sanooo='+id;
	}
</script>
<?
require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

 $set_payment = query("*",'ali_payment pm '," 1=1 and pm.shows_ewallet = 1 ORDER BY pm.id"); 
 foreach($set_payment as $key => $val):
       $text = 'txt'.$val['payment_column']; 
       $arr[$val['payment_ref']][$val['payment_column']] = $text;
       $arr[$val['payment_ref']]['column'] = $val['rep_column'];
 endforeach; 
 foreach($arr as $key => $val):
            $sqlx .= ",(";
            $keyx=0;
            $colome_text .=  ','.$val['column'];
            unset($val['column']);
            foreach($val as $valx):
            $sqlx .= "IFNULL(ewa.{$valx},0)"; 
            if($keyx+1 != count($val))$sqlx .= "+";
            $keyx++;
            endforeach;
            $sqlx .= ") as $key";
            $colome.= ','.$key;
            $Format.= ',2';
            $Sum.= ',true';
 endforeach; 
 

$sql = "SELECT cancel,ewa.id,ewa.uid as uid,sano,txtMoney ,lid,concat(ewa.name_f,' ',ewa.name_t) as name_t,ewa.remark as remark,sadate  ";
$sql .= $sqlx;
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' WHEN '5' THEN 'Stockist'  END AS ability";
$sql .= ",CASE ewa.mcode WHEN '' THEN ewa.inv_code  ELSE ewa.mcode END AS smcode "; 
$sql .= " FROM ".$dbprefix."ewallet ewa where  locationbase = '".$_SESSION["inv_locationbase"]."' and txtTransfer_out = 0 and txtTransfer_in = 0 and txtWithdraw = 0 and sa_type <> 'TI' and sa_type <> 'TO' ";
//WHERE smcode='".$_SESSION['usercode']."' 
if(!empty($sale)){
	if($sale=='A')$sql .= " and cancel = '0' ";
	else $sql .= " and cancel = '$sale' ";
}
if(!empty($fdate)){
$sql .= " and sadate >= '$fdate'  and sadate <= '$tdate'  ";
}
if(!empty($where_bills))$sql .= " and ".$where_bills." ";
 //echo $sql;
	if($_GET['state']==1){
		include("ewallet_del.php");
	}else if($_GET['state']==2){
        //include("ewallet_editadd.php");
		include("ewallet_editadd_new.php");
	}else if($_GET['state']==3){
		include("ewallet_cancel.php");
	}else{
		$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
		$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
		$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
		rpdialog_sale2($_GET['sub'],$fdate,$tdate,$sale);

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
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale&inv=$inv&bills=$bills");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,sano,smcode,name_t,txtMoney".$colome.",uid,lid,ability,remark");
        $rec->setFieldFloatFormat(",,,,2".$Format.",,,");
        $rec->setSum(true,false,",,,,true".$Sum.",");
		
	//	$rec->setFieldDesc("วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,จำนวนเงินรวม,เงินสด,เงินโอน,บัตรเครดิต,พนักงาน,สาขา,ช่องทาง");
	$rec->setFieldDesc($wording_lan["Billjang_4"].",".$wording_lan["Billjang_1"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Billjang_6"]."".$colome_text.",".$wording_lan["Billjang_14"].",".$wording_lan["Billjang_15"].",".$wording_lan["Billjang_16"].",หมายเหตุ");
		
		$rec->setFieldAlign("center,left,center,left,right,right,right,right,right,right,center,center");
	//	$rec->setFieldSpace("6%,12%,6%,23%,8%,8%,8%,8%,8%,8%,8%");
		//$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
		$rec->setSearch("sadate,sano,ewa.mcode,name_t,txtMoney,txtCash,txtTransfer,txtCredit1,uid,lid");
		//$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,สาขาหรือพนักงาน");
		$rec->setSearchDesc($wording_lan["Billjang_4"].",".$wording_lan["Billjang_1"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Billjang_6"].",".$wording_lan["Billjang_11"].",".$wording_lan["Billjang_12"].",".$wording_lan["Billjang_121"].",".$wording_lan["Billjang_14"].",".$wording_lan["Billjang_15"]); 
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","sano","IMAGE",$wording_lan["Bill_print"]);
		$rec->setSpecial("./images/search.gif","","sale_look","sano","IMAGE",$wording_lan["Bill_view"]);
		if($acc->isAccess(4) and $_SESSION["inventobj6"] == '15'){
		   $rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");

		//	$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE",$wording_lan["Bill_cancle"]);
		}		//$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=6&sub=23");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=6&sub=23&state=1","post","delfield");
		}*/
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
		$str2 = "<fieldset ><a href='http:../invoice/eprint_sale_branch.php?bid=$bills' target='_blank'>";
		$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
		$rec->setSpace($str2);
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