<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprinti.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("<?=$wording_lan['Bill_21']?>")){
			window.location='index.php?sessiontab=3&sub=138&state=3&bid='+id;
		}
	}
</script>
<script language="javascript" type="text/javascript">

	function sale_look(id){
		var wlink = 'invoice_aprinti.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		
		window.open(wlink);
		window.location='index.php?sessiontab=3&sub=138&sanooo='+id;
	}
	function sale_status(id,page,chktype,sessiontab,sub){
		//if(confirm("ต้องการเปลี่ยนแปลงการรับของ")){
			window.location='index.php?sessiontab='+sessiontab+'&sub='+sub+'&state=6&sender='+id;
		//}
	}
	function sale_status1(id,page,chktype,sessiontab,sub){
		//if(confirm("ต้องการเปลี่ยนแปลงจัดส่ง")){
			window.location='index.php?sessiontab='+sessiontab+'&sub='+sub+'&state=7&sender='+id;
		//}
	}
</script>
<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}


/*$sql = "SELECT cancel,print,".$dbprefix."isaleh.id,".$dbprefix."isaleh.sender,".$dbprefix."isaleh.sender_date,".$dbprefix."isaleh.inv_code,".$dbprefix."isaleh.tot_pv*discount/100 as discount,total+".$dbprefix."isaleh.tot_pv*discount/100 as alltotal,sano,sadate,tot_pv,tot_bv,tot_fv,total,name_t,".$dbprefix."isaleh.mcode AS smcode ";
$sql .= ",CASE ".$dbprefix."isaleh.sender WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."isaleh.sender_date) ELSE concat('<img src=./images/false.gif>',".$dbprefix."isaleh.sender_date) END AS sender1 ";
$sql .= ",CASE ".$dbprefix."isaleh.receive WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."isaleh.receive_date) ELSE concat('<img src=./images/false.gif>',".$dbprefix."isaleh.receive_date) END AS receive1 ";
$sql .= ",CASE ".$dbprefix."isaleh.send WHEN '2' THEN 'รับเอง' ELSE 'จัดส่ง' END AS send ";


$sql .= "FROM ".$dbprefix."isaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."isaleh.mcode=".$dbprefix."member.mcode) where  sa_type = 'I'  "; //WHERE 
if(empty($_GET["chk"]))$sql .= " and ".$dbprefix."isaleh.inv_from= '".$_SESSION["admininvent"]."' ";
*/

$sql = "SELECT '".$_GET["sessiontab"]."' as sessiontab,'".$_GET["sub"]."' as sub,'".$_GET["chktype"]."' as chktype,".$dbprefix."isaleh.inv_code,".$dbprefix."isaleh.inv_from,uid_receive,uid_sender,cancel,print,".$dbprefix."isaleh.id,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,".$dbprefix."isaleh.inv_from,tot_pv,tot_bv,tot_fv,remark,total,lid,CONCAT(".$dbprefix."isaleh.name_f,' ',".$dbprefix."isaleh.name_t) as name_t,".$dbprefix."isaleh.inv_code AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE ".$dbprefix."isaleh.uid WHEN '' THEN ".$dbprefix."isaleh.inv_code ELSE ".$dbprefix."isaleh.uid END AS uid ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'Online'  WHEN '4' THEN 'ATO'  WHEN '5' THEN 'Stockist' END AS checkportal";
$sql .= ",CASE sa_type WHEN 'I' THEN 'Transfer' END AS ability";
$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
$sql .= ",CASE sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd ";
$sql .= ",CASE ".$dbprefix."isaleh.receive WHEN '1' THEN concat('',".$dbprefix."isaleh.receive_date) ELSE '<img src=./images/false.gif>' END AS receive ,
CASE ".$dbprefix."isaleh.sender WHEN '1' THEN concat('',".$dbprefix."isaleh.sender_date) ELSE '<img src=./images/false.gif>' END AS sender  ";

$sql .= "FROM ".$dbprefix."isaleh ";
$sql .= "where ".$dbprefix."isaleh.locationbase = '".$_SESSION["inv_locationbase"]."' "; 
//$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."isaleh.mcode=".$dbprefix."member.mcode) where ".$dbprefix."isaleh.locationbase = '".$_SESSION["inv_locationbase"]."' "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$sql .= " WHERE  ".$dbprefix."isaleh.sa_type <> 'I'";
if(!empty($sano)){
$sql .= " and sano = '$sano' ";
}
if(empty($_GET["chk"]))$sql .= " and ".$dbprefix."isaleh.lid= '".$_SESSION["admininvent"]."' ";


//echo $sql;
$monthmonth = explode("-",$fdate);
$fdate = $monthmonth[0].'-'.$monthmonth[1];
if(!empty($fdate))
$sql .= " and sadate like '%$fdate%'  ";
//echo $sql;
//$wherecause = " WHERE ";
//echo $sql;
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
	}else if($_GET['state']==4){
		include("inv_change.php");
	}else if($_GET['state']==5){
		include("rec_change.php");
	}else if($_GET['state']==6){
		include("schange_held.php");//receive
	}
	else if($_GET['state']==7){
		include("schange_held1.php");//sending
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
		$rec->setLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]);
		$rec->setBackLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]);
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("print,sadate,sano,smcode,name_t,ability,tot_pv,total,uid,sendsend,sender,receive,remark,lid,inv_from,uid_sender,uid_receive,checkportal");
		$rec->setFieldFloatFormat(",,,,,,2,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
	//	$rec->setFieldDesc("P,วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,ชนิด, PV,จำนวนเงิน,ผู้คีย์,จัดส่ง,วันจัดส่ง,วันรับของ,อ้างอิง,ซื้อสาขา,รับของสาขา,user<br>จัดส่ง,user<br>รับของ,ช่องทาง");
	$rec->setFieldDesc("P,".$wording_lan["Bill_1"].",".$wording_lan["Bill_2"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Bill_5"].",".$wording_lan["Bill_6"].",".$wording_lan["Bill_7"].",".$wording_lan["Bill_8"].",".$wording_lan["Bill_9"].",".$wording_lan["Bill_10"].",".$wording_lan["Bill_11"].",".$wording_lan["Bill_12"].",".$wording_lan["Bill_13"].",".$wording_lan["Bill_14"].",".$wording_lan["Bill_15"].",".$wording_lan["Bill_16"].",".$wording_lan["Bill_17"]."");

		$rec->setFieldAlign("center,left,left,left,left,center,right,right,center,center,center,center,left,center,center,center,center");
		$rec->setFieldSpace("1%,6%,7%,5%,14%,3%,6%,6%,5%,3%,6%,6%,7%,4%,4%");
	//	$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,".$dbprefix."asaleh.mcode,".$dbprefix."asaleh.name_t,sadate,tot_pv,total,".$dbprefix."asaleh.uid");
	//	$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,สาขา,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,พนักงาน");
		$rec->setSearchDesc($wording_lan["Bill_2"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Bill_1"].",".$wording_lan["Bill_18"].",".$wording_lan["Bill_19"].",".$wording_lan["Bill_20"]);
		$rec->setSum(true,false,",,,,,,true,true,,");
		$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE",$wording_lan["Bill_view"]);
		
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE","ดู");
		
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
			if($acc->isAccess(4) and $_SESSION["inventobj6"] == '7'){
			$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE",$wording_lan["Bill_cancle"]);
			}
			$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE",$wording_lan["Bill_print"]);
	 

		 
			$rec->setSpecial("./images/true.gif","","sale_status1","id,page,chktype,sessiontab,sub,","IMAGE",$wording_lan["send_13"]);
			$rec->setSpecial("./images/true.gif","","sale_status","id,page,chktype,sessiontab,sub","IMAGE",$wording_lan["send_1"]);
	 


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