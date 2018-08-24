<script language="javascript" type="text/javascript">
	function sale_print(id,sa){
		if(sa == '1'){var wlink = 'invoice_aprint.php?bid='+id;}
		if(sa == '2'){var wlink = 'invoice_hprint.php?bid='+id;}
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=4&sub=4&state=3&bid='+id;
		}
	}
</script>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,id,sano,DATE_FORMAT(sadate, '%d-%m-%Y') as sadate,tot_pv,total,tabname.name_t,smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hhhhhhhh ";
//$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd,CASE inv_code WHEN '' THEN 'บริษัท' ELSE inv_code END AS inv_code,CASE send WHEN '1' THEN 'บิลแจงผ่านบริษัท' ELSE 'บิลขายปกติ' END AS type,'1' as checkcheck ";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd,uid inv_code,CASE send WHEN '1' THEN 'บิลแจงผ่านบริษัท' ELSE 'บิลขายปกติ' END AS type,'1' as checkcheck ";

$sql .= "FROM ".$dbprefix."atoasaleh ";
$sql .= "LEFT JOIN (SELECT mcode,mcode AS smcode,".$dbprefix."member.name_t FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."atoasaleh.mcode=tabname.mcode) WHERE smcode='".$_SESSION['usercode']."' and cancel = 0 ";

//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
//	echo '<fieldset><legend><b>ข้อมูลการซื้อ</b></legend>';
	if($_GET['state']==1){
		include("serv_sale_del.php");
	}else if($_GET['state']==2){
		include("saleato_editadd.php");
	}else if($_GET['state']==3){
		include("sale_atocancel.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" sano ":$_GET['ord']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=1");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sano,smcode,name_t,ability,sadate,tot_pv,total,inv_code");
		$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อ,".$wording_lan["word"]["sale_editadd"]["typea"].",วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,ผู้บันทึก");
		$rec->setFieldFloatFormat(",,,,,0,2");
		$rec->setFieldAlign("center,center,left,center,center,right,right,center,center");
		$rec->setFieldSpace("6%,8%,40%,7%,7%,7%,8%,8%,8%,10%,10%");
		$rec->setFieldLink(",index.php?sessiontab=2&sub=1&cmc=,");
		//$rec->setSearch("sano,smcode,name_t,sadate,tot_pv,total");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		$rec->setSum(true,false,",,,,,true,true");
		//$rec->setDel("index.php","id","id","sessiontab=3&sub=6");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE");
			$rec->setSpecial("ยกเลิก","","sale_cancel","id","TEXT","ยกเลิก");
		//$rec->setEdit("index.php","id","id","sessiontab=3&sub=6");
	//	$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","พิมพ์");
		$rec->showRec(1,'SH_QUERY');
		//mysql_close($link);
	}
//	echo "</fieldset>";		
	
	
?>
