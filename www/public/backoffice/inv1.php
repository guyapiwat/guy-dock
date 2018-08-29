<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_hprint.php?bid='+id;
	//	var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=6&sub=6&state=3&bid='+id;
		}
	}
</script>
<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,".$dbprefix."holdhead.id,".$dbprefix."holdhead.inv_code,sano,sadate,tot_pv,tot_bv,tot_fv,total,name_t,".$dbprefix."holdhead.mcode AS smcode ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
$sql .= ",CASE sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";

$sql .= "FROM ".$dbprefix."holdhead ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."holdhead.mcode=".$dbprefix."member.mcode)  "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("inv_del.php");
	}else if($_GET['state']==2){
		include("inv_editadd.php");
	}else if($_GET['state']==3){
		include("inv_cancel.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" sano ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=6&sub=6");
		$rec->setBackLink($PHP_SELF,"sessiontab=6");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,sano,smcode,name_t,preserve,ability,invent,tot_pv,tot_bv,tot_fv,total,inv_code");
		$rec->setFieldFloatFormat(",,,,,,,2,2,2,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,ส่งศูนย์, PV, BV, FV,จำนวนเงินรวม,สาขา หรือ พนักงาน");
		$rec->setFieldAlign("sadate,left,left,left,center,center,center,right,right,right,right,right,center");
		$rec->setFieldSpace("10%,5%,7%,15%,7%,7%,7%,7%,7%,7%,7%,10%,15%,15%,8%");
		//$rec->setFieldLink(",index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,".$dbprefix."holdhead.mcode,name_t,sadate,tot_pv,total");
		$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setSum(true,false,",,,,,,,true,true,true,true");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		//$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//if($acc->isAccess(4)){
		//	$rec->setDel("index.php","id","id","sessiontab=6&sub=28");
		//	$rec->setFromDelAttr("maindel","./index.php?sessiontab=6&sub=28&state=1","post","delfield");
		//}
		//if($acc->isAccess(2))
			//$rec->setEdit("index.php","id","id","sessiontab=6&sub=28");
		$rec->showRec(1,'SH_QUERY');
/*$sql = "SELECT cancel,".$dbprefix."holdhead.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."holdhead.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."holdhead ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."holdhead.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		$rec->setQuery($sql);*/
	}

?>