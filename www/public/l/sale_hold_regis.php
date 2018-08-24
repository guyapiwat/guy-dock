<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint.php?bid='+id;
		window.open(wlink);
	}
    function hold(id){
        window.location='index.php?sessiontab=4&sub=3&state=3&bid='+id;
    }	
    function hold_regis(id){
		window.location='index.php?index.php?sessiontab=1&sub=33&bid='+id;
	}
	function sale_hcancel(id){
		if(confirm("ยืนยันการ update")){
			window.location='index.php?sessiontab=4&sub=3&state=1&bid='+id;
		}
	}
</script>
<?
//require("connectmysql.php");
require("cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if (isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="";}
$sql = "SELECT sano,DATE_FORMAT(".$dbprefix."asaleh.hdate, '%d-%m-%Y') as hdate1,'' as sssss,hcancel,".$dbprefix."asaleh.id,sano,DATE_FORMAT(".$dbprefix."asaleh.sadate, '%d-%m-%Y') as sadate,".$dbprefix."asaleh.tot_pv as tot_pv,total as total,hpv,htotal,hdate,".$dbprefix."member.name_t as inv_desc,".$dbprefix."asaleh.mcode AS inv_code ";
$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) WHERE sa_type='H' and (hpv > 0 or htotal>0) and ".$dbprefix."asaleh.mcode <> '' and hcancel=0 and cancel = 0 and ".$dbprefix."asaleh.mcode = '".$_SESSION["usercode"]."' "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql."<br/>";
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("sale_hcancel.php");
	}else if($_GET['state']==2){
		include("hold_editadd.php");
	}else if($_GET['state']==3){
		include("hold_editadd.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=$tab&sub=$sub");
		$rec->setBackLink($PHP_SELF,"sessiontab=$tab");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sano,inv_code,sadate,hdate1,inv_desc,tot_pv,total,hpv,htotal");
		$rec->setFieldFloatFormat(",,,,");
		$rec->setFieldDesc($wording_lan["tab4"]["8_1"].",".$wording_lan["tab4"]["8_2"].",".$wording_lan["tab4"]["8_3"].",".$wording_lan["tab4"]["8_4"].",".$wording_lan["tab4"]["8_5"].",".$wording_lan["tab4"]["8_6"].",".$wording_lan["tab4"]["8_7"].",".$wording_lan["tab4"]["8_8"].",".$wording_lan["tab4"]["8_9"]."");
		$rec->setFieldAlign("center,center,center,center,left,right,right,right,right,");
		$rec->setFieldSpace("12%,8%,8%,11%,18%,10%,10%,10%,10%");
		$rec->setFieldLink(",index.php?sessiontab=4&sub=3&cmc=,");
	//	$rec->setSearch("sano,sadate,smcode,name_t,sadate,tot_pv,total");
	//	$rec->setSearchDesc("เลขบิล,วันที่Holdยอด,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldFloatFormat(",,,,,2,2,2,2");
		$rec->setSum(true,false,",,,,,true,true,true,true");
		$rec->setSpecial("./images/addmem.gif","","hold_regis","id","IMAGE");
		//$rec->setSpecial("./images/false.gif","","sale_cancel","id","IMAGE");
		//$rec->setSpecial("./images/hold_s.gif","","hold","id","IMAGE","แจง");
		//if($acc->isAccess(4)){
		//	$rec->setSpecial("./images/cancel.gif","","sale_hcancel","id","IMAGE","update");
		//}
		$rec->setHLight("hcancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=6");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=6&state=1","post","delfield");
		}*/
		/*if($acc->isAccess(2))
			$rec->setEdit("index.php","id","id","sessiontab=3&sub=6");*/
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>