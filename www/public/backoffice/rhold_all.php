<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_rprint.php?bid='+id;
		window.open(wlink);
	}
	function sale_print(id){
		var wlink = 'invoice_rprint.php?bid='+id;
		window.open(wlink);
	}
	function sale_cancel(id,chktype,send,sanox,sub,sessiontab){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?state=3&sessiontab='+sessiontab+'&sub='+sub+'&bid='+id+'&chktype='+chktype+'&send='+send+'&sano='+sanox;
		}
	}

</script>
<?
if(!empty($_GET["sano"]))$sano = $_GET["sano"];
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT '".$_GET["sessiontab"]."' as sessiontab,'".$_GET["sub"]."' as sub,'".$_GET["chktype"]."' as chktype,'".$_GET["send"]."' as send ,'".$_GET["sano"]."' as sanox ,".$dbprefix."rasaleh.id,".$dbprefix."rasaleh.inv_code,hono,".$dbprefix."asaleh.sano,DATE_FORMAT(".$dbprefix."rasaleh.sadate, '%d-%m-%Y') as sadate,".$dbprefix."rasaleh.tot_pv,".$dbprefix."rasaleh.total,".$dbprefix."rasaleh.name_t,".$dbprefix."rasaleh.hstatus,".$dbprefix."rasaleh.mcode AS smcode,".$dbprefix."rasaleh.inv_code,".$dbprefix."rasaleh.uid,".$dbprefix."rasaleh.cancel,".$dbprefix."rasaleh.remark";
$sql .= " FROM ".$dbprefix."rasaleh   ";
$sql .= "LEFT JOIN ".$dbprefix."asaleh ON (".$dbprefix."rasaleh.sano=".$dbprefix."asaleh.id)   "; 



//WHERE smcode='".$_SESSION['usercode']."' 
//$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."rasaleh.mcode=".$dbprefix."member.mcode) where hstatus = 0  and cancel = 0 "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$wherecause = " WHERE ";
//
//echo  $sql;
	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	
	if($_GET['state']==1){
		include("set_remark1.php");
	}else if($_GET['state']==2){
		//echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=9'</script>";	
		include("hold_editadd.php");
	}else if($_GET['state']==3){
		include("rhold_cancel.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]."&sano=".$_GET["sano"]."&sub=".$_GET["sub"]."&chktype=".$_GET["chktype"]."&send=".$_GET["send"]);
		$rec->setBackLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("hono,smcode,name_t,sadate,tot_pv,total,inv_code,uid,sano,remark");
		//$rec->setFieldFloatFormat(",,,,,,,2,2");
		$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่รับของ, PV,จำนวนเงิน,สาขารับ,ผู้คีย์,เลขบิลอ้างอิง,หมายเหตุ");
		$rec->setFieldAlign("center,center,left,center,right,right,center,center,center");
		$rec->setFieldSpace("4%,6%,15%,7%,6%,6%,6%,6%,15%,25%");
	//	$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("hono,sano,".$dbprefix."rasaleh.mcode,name_t,sadate,tot_pv,total");
		$rec->setSearchDesc("เลขบิล,บิลโฮล์ด,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่รับของ,จำนวนรวม  PV,จำนวนเงินรวม");
		//$rec->setSum(true,false,",,,,,,,true,true");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		$rec->setSpecial("./images/cancel.gif","","sale_cancel","id,chktype,send,sanox,sub,sessiontab","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		$rec->setFromDelAttr("maindel","./index.php?sessiontab=".$_GET["sessiontab"]."&sub=23&state=1","post","delfield");
		if($acc->isAccess(2)){
		//	$rec->setDel("index.php","id","id","sessiontab=".$_GET["sessiontab"]."&sub=10");
		//	$rec->setFromDelAttr("maindel","./index.php?sessiontab=".$_GET["sessiontab"]."&sub=23&state=1","post","delfield");
		}
		//if($acc->isAccess(2))
		//	$rec->setEdit("index.php","bid,id","sano,id","sessiontab=".$_GET["sessiontab"]."&sub=10&state=2");
		$rec->showRec(1,'SH_QUERY');
		//mysql_close($link);
	}

?>