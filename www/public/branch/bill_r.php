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
			if(confirm("<?=$wording_lan['Bill_21']?>"))
				{
				window.location='index.php?sessiontab=5&sub=145&state=3&bid='+id;
		}
	}
	function sale_status(id,page,chktype,receive){
		if(receive == '1'){
			if(confirm("<?=$wording_lan['Bill_22']?>")){
				window.location='index.php?sessiontab=5&sub=145&state=6&sender='+id+'&page='+page+'&chktype='+chktype;
				exit;
			}
		}else{
			window.location='index.php?sessiontab=5&sub=145&status=receive&state=6&sender='+id+'&page='+page+'&chktype='+chktype;
			exit;
		}
	}
		function sale_status1(id){
		if(confirm("<?=$wording_lan['Bill_23']?>")){
			window.location='index.php?sessiontab=5&sub=145&state=7&sender='+id;
		}
	}
</script>
<?
require("connectmysql.php");
//var_dump($_SESSION);
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
//echo substr('', -4, 4);
//exit;

/*	$sql 	= "SELECT  mcode,id_card  FROM ".$dbprefix."member  ";
			//echo "$sql <br>";
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$mcode = $sqlObj->mcode;
				$id_card = $sqlObj->id_card;
				$id_card1 = explode('-',$id_card);
				$id_card = $id_card1[0].$id_card1[1].$id_card1[2].$id_card1[3].$id_card1[4];
				 $sqlUpdate = "update ".$dbprefix."member set id_card  = '$id_card'  where mcode = '$mcode'";
				 //echo "$sqlUpdate <br>";
				 $rsUpdate = mysql_query($sqlUpdate);
			}*/
		/*for($i=1219;$i<=1234;$i++){
		$sql = "INSERT INTO `ali_expdate` (`id`, `mid`, `exp_date`, `date_change`) VALUES
('".$i."', '".$i."', '2010-12-25', '2010-10-16')";
$rsUpdate = mysql_query($sql);
		}*/
if($_GET["sanoo"]){
$sqlupdate = "update ".$dbprefix."asaleh set print = print+1 where id = '{$_GET["sanoo"]}'";
mysql_query($sqlupdate);
}
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
$sql = "SELECT '".$_GET["chktype"]."' as chktype, ".$dbprefix."asaleh.inv_code,uid_receive,uid_sender,'".$page."' as page,cancel,print,".$dbprefix."asaleh.id,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate ,".$dbprefix."asaleh.lid
,tot_pv,tot_bv,tot_fv,remark,total,CONCAT(".$dbprefix."asaleh.name_f,' ',".$dbprefix."asaleh.name_t) as name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'Online'  WHEN '4' THEN 'ATO' WHEN '5' THEN 'Stockist' END AS checkportal";
$sql .= ",CASE ".$dbprefix."asaleh.uid WHEN '' THEN ".$dbprefix."asaleh.inv_code ELSE ".$dbprefix."asaleh.uid END AS uid ";

$sql .= ",CASE ".$dbprefix."asaleh.sa_type WHEN 'A' THEN '".$wording_lan['satype']['A']."' WHEN 'B' THEN '".$wording_lan['satype']['B']."' WHEN 'C' THEN '".$wording_lan['satype']['C']."' WHEN 'Q' THEN '".$wording_lan['satype']['Q']."' WHEN 'H' THEN '".$wording_lan['satype']['H']."' WHEN 'L' THEN '".$wording_lan['satype']['L']."'   END AS ability ";
 
$sql .= $sqlWhere_satype1;
$sql .= ",CASE ".$dbprefix."asaleh.receive WHEN '1' THEN concat('',".$dbprefix."asaleh.receive_date) ELSE '<img src=./images/false.gif>' END AS receive1 ,".$dbprefix."asaleh.receive,
CASE ".$dbprefix."asaleh.sender WHEN '1' THEN concat('',".$dbprefix."asaleh.sender_date) ELSE '<img src=./images/false.gif>' END AS sender   ";

$sql .= "FROM ".$dbprefix."asaleh ";
//$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
$sql .= " where   ".$dbprefix."asaleh.inv_code = '{$_SESSION["admininvent"]}' and  ".$dbprefix."asaleh.cancel = 0 and send != '1' and ".$dbprefix."asaleh.receive <> '1' "; 

if($_POST['skey']=='tot_pv'){
$sql .= " and ".$dbprefix."asaleh.tot_pv = '$_POST[scause]'  ";
}
if($_POST['skey']=='total'){
$sql .= " and ".$dbprefix."asaleh.total = '$_POST[scause]'  ";
}

if(!empty($sano)){
$sql .= " and sano = '$sano' ";
}
//$monthmonth = explode("-",$fdate);
//$fdate = $monthmonth[0].'-'.$monthmonth[1];
if(!empty($fdate))
$sql .= " and sadate like '%$fdate%'  ";

if($_GET["chktype"] == '1'){
$sql .= " and ".$dbprefix."asaleh.scheck = 'register' ";
}else{
$sql .= " and ".$dbprefix."asaleh.scheck != 'register' ";

}
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
		include("sale_cancel.php");
	}else if($_GET['state']==4){
		include("product_sale_bill.php");
	}
	else if($_GET['state']==5){
		include("sale_editaddh.php");
	}
	else if($_GET['state']==6){
		include("change_held.php");
	}
	else if($_GET['state']==7){
		include("change_held1.php");
	}
	else{
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
		$rec->setLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."&chktype=".$_GET["chktype"]);
		$rec->setBackLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]);
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("print,sadate,sano,smcode,name_t,ability,tot_pv,total,uid,receive1,remark,lid,uid_receive,checkportal");
		$rec->setFieldFloatFormat(",,,,,,2,2,");
		//$rec->setFieldDesc("�Ţ���,���ʼ�����,���ͼ�����,�ѡ���ʹ,�Ӥس���ѵ�,hold�ʹ,�ѹ������,�ӹǹ���  PV,�ӹǹ�Թ���");
	//	$rec->setFieldDesc("P,�ѹ������,�Ţ���,���ʼ�����,���ͼ�����,��Դ, PV,�ӹǹ�Թ,������,�Ѻ�ͧ,��ҧ�ԧ,�����Ң�,user<br>�Ѻ�ͧ,��ͧ�ҧ");
		$rec->setFieldDesc("P,".$wording_lan["Bill_1"].",".$wording_lan["Bill_2"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Bill_5"].",".$wording_lan["Bill_6"].",".$wording_lan["Bill_7"].",".$wording_lan["Bill_8"].",".$wording_lan["Bill_11"].",".$wording_lan["Bill_12"].",".$wording_lan["Bill_13"].",".$wording_lan["Bill_16"].",".$wording_lan["Bill_17"]."");
		$rec->setFieldAlign("center,center,center,center,left,center,right,right,center,center,center,center,center,center");
		$rec->setFieldSpace("1%,7%,10%,5%,12%,6%,6%,6%,8%,7%,8%,8%,7%,4%,4%");
	//	$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,".$dbprefix."asaleh.mcode,".$dbprefix."asaleh.name_t,sadate,tot_pv,total,".$dbprefix."asaleh.uid");
		//$rec->setSearchDesc("�Ţ���,���ʼ�����,���ͼ�����,�Ң�,�ѹ������,�ӹǹ���  PV,�ӹǹ�Թ���,��ѡ�ҹ");
		$rec->setSearchDesc($wording_lan["Bill_2"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Bill_1"].",".$wording_lan["Bill_6"].",".$wording_lan["Bill_7"].",".$wording_lan["Bill_25"]);
		$rec->setSum(true,false,",,,,,,true,true,,");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","sano","IMAGE",$wording_lan["Bill_print"]);
		$rec->setSpecial("./images/search.gif","","sale_look","sano","IMAGE",$wording_lan["Bill_view"]);
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		 
		//}
		if($acc->isAccess(4)){
		//	$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","¡��ԡ");
		}
		//var_dump($acc->isAccess(2));
		//exit;

		$rec->setSpecial("./images/true.gif","","sale_status","id,page,chktype,receive","IMAGE",$wording_lan["send_1"]);
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