<script language="javascript" type="text/javascript">
	function sale_print(id){
        var wlink = '../invoice/aprinti_branch.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=5&sub=16&state=3&bid='+id;
		}
	}
</script>
<?
//include("rpdialog.php");
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$send = $_POST['send']==""?$_GET['send']:$_POST['send'];
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT h.cancel,h.id,h.inv_code,h.total+h.tot_pv/100 as alltotal,h.sano,h.sadate,h.tot_pv,h.tot_bv,h.tot_fv,h.total,m.inv_desc as name_t,h.mcode AS smcode,h.txtoption ";

//$sql .= ",CASE sender WHEN '0' THEN 'รอจัดส่ง'  WHEN '1' THEN 'รอรับของ' END as  receive ";
//$sql .= ",IF(h.sender=0 and h.receive = 0,'รอจัดส่ง','รอรับของ') AS receive  ";
$sql .= ",CASE 
 WHEN h.sender = 0 and h.receive = 0 and h.send = 1 THEN concat('<font color = red >','รอส่งของ','</font>')
 WHEN h.sender = 1 and h.receive = 0 THEN concat('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&status=receive&sender=',h.id,'\">','รอรับของ','</a>')
  WHEN h.send = 2 and h.receive = 0 THEN concat('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&status=receive&sender=',h.id,'\">','รอรับของ','</a>')
 WHEN h.sender = 1 and h.receive = 1 THEN 'รับของแล้ว'
 WHEN h.sender = 0 and h.receive = 1 THEN 'รับของแล้ว'

 ELSE ''
 END as receive ";
//$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=5&aid=',id,'&mcode=',mcode,'&id=\"><img src=\"./images/true.gif\"></a>') END AS receive ";


$sql .= "FROM ".$dbprefix."isaleh  h ";
$sql .= "LEFT JOIN ".$dbprefix."invent m ON (h.inv_code=m.inv_code)  "; //WHERE smcode='".$_SESSION['usercode']."' 
$sql .= "where h.sa_type = 'I'  and   h.inv_code = '{$_SESSION["admininvent"]}' and h.cancel <> '1'  "; 
if($fdate != '' and $tdate != '')$sql .= " and sadate >= '".$fdate."' and sadate <= '".$tdate."' ";
if($send == 'c')$sql .= " and h.sender = '1' and h.receive = '1' ";
if($send == 's')$sql .= " and h.sender = '0' ";
if($send == 'r')$sql .= " and h.receive = '0' and h.sender = '1' ";


//WHERE smcode='".$_SESSION['usercode']."' 
//$sql .= " order by h.sadate DESC "; //WHERE smcode='".$_SESSION['usercode']."' 

///$wherecause = " WHERE ";
//echo $sql;
	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("buy_del.php");
	}else if($_GET['state']==2){
		include("buy_editadd.php");
	}else if($_GET['state']==3){
		include("buy_cancel.php");
	}else if($_GET['state']==4){
		include("schange_held.php");//receive
	}else if($_GET['state']==5){		
	}else{
		//rpdialog_buy($_GET['sub'],$fdate,$tdate,$send);
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
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=16");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,receive,sano,inv_code,name_t,tot_pv,alltotal,total,txtoption");
		$rec->setFieldFloatFormat(",,,,,2,2,2");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("".$wording_lan["Date"].",รับของ,".$wording_lan["sano"].",".$wording_lan["inv_code"].",".$wording_lan["inv_name"].",".$wording_lan["totalpv"].",".$wording_lan["totalmoney"].",".$wording_lan["Amount"].",หมายเหตุ");
		$rec->setFieldAlign("center,center,left,center,left,right,right,right,left,right");
		$rec->setFieldSpace("10%,5%,15%,5%,10%,10%,10%,10%,40%");
		//$rec->setFieldLink(",index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,sadate,tot_pv,total");
		$rec->setSearchDesc("".$wording_lan["sano"].",".$wording_lan["Date"].",".$wording_lan["totalpv"].",".$wording_lan["totalmoney"]."");
		$rec->setSum(true,false,",,,,,true,true,true");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		//$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//if($acc->isAccess(4)){
		//	$rec->setDel("index.php","id","id","sessiontab=5&sub=16");
		//	$rec->setFromDelAttr("maindel","./index.php?sessiontab=5&sub=16&state=1","post","delfield");
		//}
		//if($acc->isAccess(2))
		//	$rec->setEdit("index.php","id","id","sessiontab=5&sub=16");
	  //	$rec->setSpecial("./images/true.gif","","sale_receive","id","IMAGE","รับของ");
		$rec->showRec(1,'SH_QUERY');
/*$sql = "SELECT cancel,".$dbprefix."isaleh.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."isaleh.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."isaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."isaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		$rec->setQuery($sql);*/
	}

?>