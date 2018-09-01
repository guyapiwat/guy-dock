<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprintbb.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการเปลี่ยนแปลงรับของ")){
			window.location='index.php?sessiontab=3&sub=138&state=3&sender='+id;
		}
	}
	function sale_status(id){
		if(confirm("ต้องการเปลี่ยนแปลงจัดส่ง")){
			window.location='index.php?sessiontab=3&sub=138&state=4&status=sender&sender='+id;
		}
	}
	function sale_receive(id){
		if(confirm("ต้องการเปลี่ยนแปลงรับของ")){
			window.location='index.php?sessiontab=3&sub=138&state=4&status=receive&sender='+id;
		}
	}
</script>
<?
require("connectmysql.php");
//require("cls/repGenerator_id.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT * ";
$sql .= ",CASE auto WHEN '1' THEN 'Auto' WHEN '0' THEN ''  END AS status ";
$sql .= "FROM ".$dbprefix."ostockh where inv_code = '{$_SESSION["admininvent"]}' and cancel=0"; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$wherecause = " WHERE ";false.gif
//echo $sql;
	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("inv_del.php");
	}else if($_GET['state']==2){
		include("bsale_editadd.php");
	}else if($_GET['state']==3){
		include("inv_cancel.php");
	}else if($_GET['state']==4){
		include("inv_change.php");
	}else if($_GET['state']==5){
		include("rec_change.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=21");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,sano,inv_ref,txtoption");
		//$rec->setFieldFloatFormat(",,,,,,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("วันที่ซื้อ,เลขบิล,ผู้บันทึก,หมายเหตุ");
		//$rec->setFieldLink(",,,,,,,index.php?sessiontab=3&sub=138&state=4&sender=");
		$rec->setFieldAlign("center,center,center,left");
		$rec->setFieldSpace("20%,20%,20%,35%");
		//$rec->setFieldLink(",index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,inv_ref,sadate");
		$rec->setSearchDesc("เลขบิล,ผู้บันทึก,วันที่ซื้อ");
		//$rec->setSum(true,false,",,,,,,true,true,,,true,true");

		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		//$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=138");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=138&state=1","post","delfield");
		}
		if($acc->isAccess(2)){
			$rec->setEdit("index.php","id","id","sessiontab=3&sub=138");
			$rec->setSpecial("./images/true.gif","","sale_status","id","IMAGE","จัดส่ง");
		$rec->setSpecial("./images/true.gif","","sale_receive","id","IMAGE","รับของ");
		}*/
		$rec->showRec(1,'SH_QUERY');
/*$sql = "SELECT cancel,".$dbprefix."esaleh.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."esaleh.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."esaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."esaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		$rec->setQuery($sql);*/
	}

?>