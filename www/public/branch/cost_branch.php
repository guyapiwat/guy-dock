<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprintw.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("<?=$wording_lan['Bill_21']?>")){
			window.location='index.php?sessiontab=3&sub=148&state=3&bid='+id;
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
$sql = "SELECT * FROM ".$dbprefix."cost_branch ";
$sql .= " where ".$dbprefix."cost_branch.inv_code  = '{$_SESSION["admininvent"]}' "; 
//WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;

//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		//include("cost_branch_del.php");
	}else if($_GET['state']==2){
		include("cost_branch_editadd.php");
	}else if($_GET['state']==3){
		//include("cost_branch_cancel.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=6&sub=9");
		$rec->setBackLink($PHP_SELF,"sessiontab=6");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("date,id,title,cost_1,cost_2,cost_3,cost_4,total,uid");
		$rec->setFieldFloatFormat(",,,2,2,2,2,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		//$rec->setFieldDesc("วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,จำนวนเงินรวม,เงินสด,เงินโอน,บัตรเครดิต,สาขา หรือ พนักงาน");
		$rec->setFieldDesc($wording_lan["cost_branch_3"].",".$wording_lan["cost_branch_4"].",".$wording_lan["cost_branch_5"].",".$wording_lan["cost_branch_6"].",".$wording_lan["cost_branch_7"].",".$wording_lan["cost_branch_8"].",".$wording_lan["cost_branch_9"].",".$wording_lan["cost_branch_11"].",".$wording_lan["cost_branch_10"]);
		$rec->setFieldAlign("center,center,left,right,right,right,right,right,center,center,center,center,center");
		$rec->setFieldSpace("10%,8%,26%,8%,8%,8%,8%,8% ");
		//$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
		$rec->setSearch("id");
		$rec->setSearchDesc("เลขบิล");
		//$rec->setSearchDesc($wording_lan["Bill_2"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Bill_1"].",".$wording_lan["Bill_18"].",".$wording_lan["Bill_24"].",".$wording_lan["Bill_19"].",".$wording_lan["Bill_20"]);
		$rec->setSum(true,false,",,,,true,true,true,true,true,true,true");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE",$wording_lan["Bill_print"]);
		$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE",$wording_lan["Bill_view"]);
		if($acc->isAccess(4) and $_SESSION["inventobj6"] == '7'){
			$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE",$wording_lan["Bill_cancle"]);
		}	
		//$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=148");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=148&state=1","post","delfield");
		}*/
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
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