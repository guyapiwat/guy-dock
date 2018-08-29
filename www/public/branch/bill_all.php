<?
include_once("global.php");
$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$type = $_POST['type']==""?$_GET['type']:$_POST['type'];
$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
if(!empty($_GET['bills'])){$bills = $_GET['bills'];}else {if(!empty($_POST['bills'])){$bills = $_POST['bills'];}else{$bills='';}}


$where_bills = findBills("sano","ali_asaleh",$bills);
//echo $where_bills;
?>


<script language="javascript" type="text/javascript">
	function sale_print(id){
	    var link = '<?=$actual_link?>invoice/aprint_sale_branch.php';  
        var wlink = link+'?bid='+id; 
		window.open(wlink);
	}
	function sale_look(id){
	    var link = '<?=$actual_link?>invoice/aprint_salelook.branch.php';  
        var wlink = link+'?bid='+id; 
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("<?=$wording_lan['Bill_21']?>")){ 
			var remark = prompt("กรุณากรอกหมายเหตุ ค่ะ","");
			if(remark == ""){
				alert("คุณไม่ได้กรอกหมายเหตุ ค่ะ");
			}
			if(remark !== null && remark !== ""){
				window.location='index.php?sessiontab=3&sub=147&state=3&bid='+id+'&remark='+remark;
			}
		}
	}
	function sale_cancelh(id){
		if(confirm("<?=$wording_lan['Change to BMC']?>")){
			window.location='index.php?sessiontab=3&sub=147&state=4&bid='+id;
		}
	}
	function sale_status(id,page,chktype,sessiontab,sub,send,sender,receive,cancel){
		//alert(id+" : "+page+" : "+chktype+" : "+sessiontab+" : "+sub+" : "+send+" : "+sender+" : "+receive+" : "+cancel);
		//exit;
		if(cancel == '0'){	
			if(receive == '0'){	
				if(send == '1'){
					if(sender == '1'){
						window.location='index.php?sessiontab='+sessiontab+'&sub='+sub+'&state=6&sender='+id+'&status=receive';
					}
					else{
						alert("ต้องกดจัดส่งก่อนค่ะ");
					}
				}
				else if(send == '2'){
					window.location='index.php?sessiontab='+sessiontab+'&sub='+sub+'&state=6&sender='+id+'&status=receive';
				}
			}
			else{
				window.location='index.php?sessiontab='+sessiontab+'&sub='+sub+'&state=6&sender='+id+'&status=receive';
				//alert("บิลนี้รับของไปแล้วค่ะ");
			}
		}
		else{
			alert("ยกเลิกบิลไปแล้วค่ะ");
		}
	}
	function sale_status1(id,page,chktype,sessiontab,sub,send,sender,receive,cancel){
		//alert(id+" : "+page+" : "+chktype+" : "+sessiontab+" : "+sub+" : "+send+" : "+sender+" : "+receive+" : "+cancel);
		//exit;
		if(cancel == '0'){	
			if(receive == '0'){	
				if(send == '1'){
					if(sender == '0'){
						window.location='index.php?sessiontab='+sessiontab+'&sub='+sub+'&state=7&sender='+id+'&status=sender';
					}
					else{
						window.location='index.php?sessiontab='+sessiontab+'&sub='+sub+'&state=7&sender='+id+'&status=sender';
						//alert("บิลนี้จัดส่งไปแล้วค่ะ");
					}
				}
				else if(send == '2'){
					alert("บิลนี้ไม่ได้สั่งซื้อแบบจัดส่งค่ะ");
				}
			}
			else{
				alert("บิลนี้รับของไปแล้วค่ะ");
			}
		}
		else{
			alert("ยกเลิกบิลไปแล้วค่ะ");
		}
	}
</script>
<?
require("connectmysql.php");
//var_dump($_SESSION);








 /*

$sadate = '2016-10-04';
$inv_code = 'BKK01';
$pcode = 'PV0001';
$pdesc = 'ขาย 1 PV';

$sql = "select mcode,name_t,tot_pv from memberpv where 1=1 ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$mcode = $sqlObj->mcode;
	$name_t = $sqlObj->name_t;
	$qty = floor($sqlObj->tot_pv);
	$pv = '1';

	$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."asaleh ";
	$rsxx = mysql_query($sql);
	$mid = mysql_result($rsxx,0,'id')+1;
    $sano =  gencodesale_news('S','ali_asaleh',$inv_code,'',$sadate); 

	$sqlx = "insert into ali_asaleh(id,sano,sadate,inv_code,lid,tot_pv,sa_type,locationbase,mcode,name_t,mbase,checkportal,uid) values('$mid','$sano','$sadate','$inv_code','$inv_code','$qty','H','1','$mcode','$name_t','1','2','system')";
	echo $sqlx.'<br>';
	mysql_query($sqlx);
	
	$sql1 = "insert into ali_asaled(sano,sadate,inv_code,pcode,pdesc,mcode,qty,locationbase,pv) values('$mid','$sadate','$inv_code','$pcode','$pdesc','$mcode','$qty','1','1')";
	mysql_query($sql1);

	echo $sql1.'<br>';
	
}

exit;
*/





if(!empty($_GET["sano"]))$sano = $_GET["sano"];
$year = date("Y");
$month = date("m");
$date = mktime(1, 1, 1, $month, date("d"), $year);

$first_day_of_month = strtotime("-" . (date("d", $date)-1) . " days", $date);
$last_day_of_month = strtotime("+" . (date("t", $first_day_of_month)-1) . " days", $first_day_of_month);

$first_week_no = date("W", $first_day_of_month);
$last_week_no = date("W", $last_day_of_month);

if($last_week_no < $first_week_no) $last_week_no=date("W", strtotime("-1 week",$last_week_no)) + 1;
$weeks_of_month = $last_week_no - $first_week_no + 1;
if($_GET["sanoo"]){
$sqlupdate = "update ".$dbprefix."asaleh set print = print+1 where id = '{$_GET["sanoo"]}'";
mysql_query($sqlupdate);
}						
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
 $sql = "SELECT ".$dbprefix."asaleh.txtoption,".$dbprefix."asaleh.ref,'".$_GET["sessiontab"]."' as sessiontab,'".$_GET["sub"]."' as sub,'".$_GET["chktype"]."' as chktype,".$dbprefix."asaleh.inv_code,".$dbprefix."asaleh.ref,uid_receive,uid_sender,cancel,print,".$dbprefix."asaleh.id,".$dbprefix."asaleh.lid,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,remark,total,CONCAT(".$dbprefix."asaleh.name_f,' ',".$dbprefix."asaleh.name_t) as name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE ".$dbprefix."asaleh.uid WHEN '' THEN ".$dbprefix."asaleh.inv_code ELSE ".$dbprefix."asaleh.uid END AS uid ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'Online'  WHEN '4' THEN 'ATO'  WHEN '5' THEN 'Stockist' END AS checkportal";
$sql .= ",CASE checkportal WHEN '2' THEN ".$dbprefix."asaleh.lid ELSE '' END AS lid1";

$sql .= $sqlWhere_satype1;
 
$sql .= ",CASE ".$dbprefix."asaleh.receive WHEN '1' THEN concat('',".$dbprefix."asaleh.receive_date) ELSE '<img src=./images/false.gif>' END AS receive ,
CASE ".$dbprefix."asaleh.sender WHEN '1' THEN concat('',".$dbprefix."asaleh.sender_date) ELSE '<img src=./images/false.gif>' END AS sender  ";
$sql .= ",".$dbprefix."asaleh.remark as remark,ali_asaleh.send as send1,ali_asaleh.sender as sender1,ali_asaleh.receive as receive1 ";
$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "where ".$dbprefix."asaleh.locationbase = '".$_SESSION["inv_locationbase"]."' "; 
if(!empty($sano)){
$sql .= " and sano = '$sano' ";
}
if($_POST['skey']=='tot_pv'){
$sql .= " and ".$dbprefix."asaleh.tot_pv = '$_POST[scause]'  ";
}
if($_POST['skey']=='total'){
$sql .= " and ".$dbprefix."asaleh.total = '$_POST[scause]'  ";
}

if(!empty($type)){
	 $sql .= " and sa_type = '$type'  ";
}
if(!empty($sale)){
	if($sale=='A')$sql .= " and cancel = '0' ";
	else $sql .= " and cancel = '$sale' ";
}
if(!empty($fdate)){
$sql .= " and sadate >= '$fdate'  and sadate <= '$tdate'  ";
}
if(!empty($inv))$sql .= " and lid like '%$inv%'  ";
if(!empty($where_bills))$sql .= " and ".$where_bills." ";
$monthmonth = explode("-",$fdate);
//$fdate = $monthmonth[0].'-'.$monthmonth[1];

//echo $sql;
	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("sale_del.php");
	}else if($_GET['state']==2){
		include("sale_editadd.php");
	}else if($_GET['state']==3){
		include("billb_cancel.php");
	}else if($_GET['state']==4){
		//include("product_sale_bill.php");
		include("billb_canceltoh.php");
	}
	else if($_GET['state']==5) {
		include("sale_editaddh.php");
	}
	else if($_GET['state']==6){
		include("change_held.php");//receive
	}
	else if($_GET['state']==7){
		include("change_held1.php");//sending
	}
	else{

		rpdialog_sale_branch($_GET['sub'],$fdate,$tdate,$sale,$type);

		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale&s_list=$s_list&inv=$inv&fmcode=$mcode&sale=$sale&type=$type&bills=$bills"); 
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
		$rec->setCurPage($page);
		$rec->setShowField("print,sadate,sano,smcode,name_t,ability,tot_pv,total,uid,sendsend,sender,receive,txtoption,lid1,inv_code,uid_sender,uid_receive,checkportal,remark");
		$rec->setFieldFloatFormat(",,,,,,2,2,");

		$rec->setFieldDesc("P,".$wording_lan["Bill_1"].",".$wording_lan["Bill_2"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Bill_5"].",".$wording_lan["Bill_6"].",".$wording_lan["Bill_7"].",".$wording_lan["Bill_8"].",".$wording_lan["Bill_9"].",".$wording_lan["Bill_10"].",".$wording_lan["Bill_11"].",".$wording_lan["Bill_12"].",".$wording_lan["Bill_13"].",".$wording_lan["Bill_14"].",".$wording_lan["Bill_15"].",".$wording_lan["Bill_16"].",".$wording_lan["Bill_17"].",หมายเหตุ");

		$rec->setFieldAlign("center,left,left,left,left,center,right,right,center,center,center,center,left,center,center,center,center");
		$rec->setFieldSpace("1%,6%,7%,5%,14%,6%,6%,6%,5%,3%,6%,6%,7%,4%,4%");
		$rec->setSearch("sano,".$dbprefix."asaleh.mcode,".$dbprefix."asaleh.name_t,tot_pv,total,".$dbprefix."asaleh.uid");
		$rec->setSearchDesc($wording_lan["Bill_2"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Bill_18"].",".$wording_lan["Bill_19"].",".$wording_lan["Bill_25"]."");
		$rec->setSum(true,false,",,,,,,true,true,,");
		//echo $GLOBALS["main_inv_code"];
        //
        if($_GET['sessiontab'] == 3) $rec->setSpecial("./images/Amber-Printer.gif","","sale_print","sano","IMAGE",$wording_lan["Bill_print"]);
		$rec->setSpecial("./images/search.gif","","sale_look","sano","IMAGE",$wording_lan["Bill_view"]);
		
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		 
		if($acc->isAccess(4)  and $_GET['sessiontab']==3){
			$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE",$wording_lan["Bill_cancle"]);
		}

		if($acc->isAccess(4)){
			$rec->setSpecial("./images/true.gif","","sale_status1","id,page,chktype,sessiontab,sub,send1,sender1,receive1,cancel","IMAGE",$wording_lan["send_13"]);
			$rec->setSpecial("./images/true.gif","","sale_status","id,page,chktype,sessiontab,sub,send1,sender1,receive1,cancel","IMAGE",$wording_lan["send_1"]);
		}
		if($_GET['excel']==1){
			logtext(true,$_SESSION["adminusercode"],'Export Excel : ข้อมูลสมาชิก','');
			$text="uid=".$_SESSION["adminusercode"]." action=member_export_excel =>$sql";
			writelogfile($text);
			$rec->exportXls("ExportXls","member".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","member".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
	 
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);		

		if($_GET['sessiontab'] == 3){
			$str2 = "<fieldset ><a href='".$actual_link."invoice/aprint_sale_branch.php?bid=$bills&fdate=$fdate&tdate=$tdate&sale=$sale&inv=$inv&type=$type' target='_blank'>"; 
			$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
			$rec->setSpace($str2);
		}
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