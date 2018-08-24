<script language="javascript" type="text/javascript">
	function view(id){
		//var wlink = 'onlinesale_detail.php?pid='+id;
		var wlink = 'invoice_tprint.php?bid='+id;
		window.open(wlink);
	}
	function creditcard(id){
		var wlink = 'creditcard.php?pid='+id;
		window.open(wlink);
	}
		function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=4&sub=21&state=2&bid='+id;
		}
	}
</script>
<?

require("connectmysql.php");


require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT '".$page."' as page,mobile,cancel,print,".$dbprefix."transfersale_h.id,".$dbprefix."transfersale_h.sano1,".$dbprefix."transfersale_h.lid,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,remark,total,CONCAT(".$dbprefix."member.name_f,' ',".$dbprefix."transfersale_h.name_t) as name_t,".$dbprefix."transfersale_h.mcode AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE ".$dbprefix."transfersale_h.uid WHEN '' THEN ".$dbprefix."transfersale_h.inv_code ELSE ".$dbprefix."transfersale_h.uid END AS uid ,";
$sql .= "CASE transtype WHEN '0' THEN '<img src=\"./images/false.gif\">' ";
$sql .= "ELSE '<img src=\"./images/true.gif\">' END AS transtype1, ";
$sql .= "CASE paytype WHEN '0' THEN '<img src=\"./images/false.gif\">' ";
$sql .= "ELSE '<img src=\"./images/true.gif\">' END AS paytype1, ";
$sql .= "CASE credittype WHEN '0' THEN '<img src=\"./images/false.gif\">' ";
$sql .= "ELSE '<img src=\"./images/true.gif\">' END AS credittype, ";
$sql .= "CASE sendtype WHEN '0' THEN '<img src=\"./images/false.gif\">' ";
$sql .= "ELSE '<img src=\"./images/true.gif\">' END AS sendtype1 ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' WHEN '4' THEN 'ATO' WHEN '5' THEN 'STOCKIST'  END AS checkportal";
$sql .= ",CASE sa_type WHEN 'A' THEN 'ปกติ'  WHEN 'Q' THEN 'รักษายอด' WHEN 'H' THEN 'HOLD'  END AS ability";
$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
$sql .= ",CASE sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd ";
$sql .= ",CASE ".$dbprefix."transfersale_h.receive WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."transfersale_h.receive_date) ELSE '<img src=./images/false.gif>' END AS receive ,
CASE ".$dbprefix."transfersale_h.sender WHEN '1' THEN concat('<img src=./images/true.gif>',".$dbprefix."transfersale_h.sender_date) ELSE '<img src=./images/false.gif>' END AS sender ,
".$dbprefix."member.pos_cur as por_cur ";

$sql .= "FROM ".$dbprefix."transfersale_h ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."transfersale_h.mcode=".$dbprefix."member.mcode)  where ".$dbprefix."transfersale_h.uid = '".$_SESSION['usercode']."'"; //WHERE smcode='".$_SESSION['usercode']."' 


	if($_GET['state']==1){
       /// include("billb_editadd.php");
		include("billb_editadd.php");
	}else if($_GET['state']==2){
		include("billb_cancel_OL.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=21");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sano1,smcode,name_t,mobile,total,paytype1,credittype,ability,sano");
		$rec->setFieldDesc("เลขที่บิลชั่วคราว,".$wording_lan["tab4"]["4_2"].",".$wording_lan["tab4"]["4_3"].",".$wording_lan["tab4"]["4_4"].",".$wording_lan["tab4"]["4_5"].",".$wording_lan["tab4"]["4_6"].",".$wording_lan["tab4"]["4_7"].",".$wording_lan["tab4"]["4_8"].",".$wording_lan["tab4"]["4_9"]."");
		//$rec->setFieldFloatFormat(",,,,,,2,2,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldAlign("center,center,left,center,center,center,center,center,center,center,center");
		$rec->setFieldSpace("7%,7%,22%,8%,10%,10%,10%,10%,6%,6%,6%");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		$rec->setSum(true,false,",,,,,,true,true");
		//$rec->setDel("index.php","id","id","sessiontab=3&sub=6");
		$rec->setSpecial("./images/search.gif","","view","id","IMAGE","ดู");
		$rec->setSpecial("./images/credit_icon.gif","","creditcard","id","IMAGE","ดู");
		$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิกรายการ");
		$rec->showRec(1,'SH_QUERY');
		//mysql_close($link);
	}
//	echo "</fieldset>";		
	
	
?>
