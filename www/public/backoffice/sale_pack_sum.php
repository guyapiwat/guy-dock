<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint_pack.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("��ͧ���¡��ԡ��Ź��")){
			window.location='index.php?sessiontab=3&sub=33&state=3&bid='+id;
		}
	}
</script>
<?
require("connectmysql.php");
$year = date("Y");
$month = date("m");
$date = mktime(1, 1, 1, $month, date("d"), $year);

$first_day_of_month = strtotime("-" . (date("d", $date)-1) . " days", $date);
$last_day_of_month = strtotime("+" . (date("t", $first_day_of_month)-1) . " days", $first_day_of_month);

$first_week_no = date("W", $first_day_of_month);
$last_week_no = date("W", $last_day_of_month);

if($last_week_no < $first_week_no) $last_week_no=date("W", strtotime("-1 week",$last_week_no)) + 1;
$weeks_of_month = $last_week_no - $first_week_no + 1;


/*$sql 	= "SELECT  mcode   FROM ".$dbprefix."member  ";
		//echo "$sql <br>";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode = $sqlObj->mcode;
			 $sqlUpdate = "update ".$dbprefix."member set name_t  = '$mcode' , name_e = '$mcode' where mcode = '$mcode'";
			 //echo "$sqlUpdate <br>";
			 $rsUpdate = mysql_query($sqlUpdate);
		}
		for($i=1219;$i<=1234;$i++){
		$sql = "INSERT INTO `ali_expdate` (`id`, `mid`, `exp_date`, `date_change`) VALUES
('".$i."', '".$i."', '2010-12-25', '2010-10-16')";
$rsUpdate = mysql_query($sql);
		}*/


if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,".$dbprefix."asaleh.id,".$dbprefix."asaleh.uid as uid,sano1,DATE_FORMAT(sadate, '%d-%m-%Y') as sadate 
,tot_pv,tot_bv,tot_fv,total,name_t,".$dbprefix."asaleh.mcode AS smcode,".$dbprefix."asaleh.sa_type";
//$sql .= ",CASE sa_type WHEN 'Q' THEN '�ѡ���ʹ' ELSE '' END AS sa_type ";
$sql .= ",CASE sa_type WHEN 'A' THEN '�س���ѵ�' ELSE '' END AS sa_type ";
//$sql .= ",CASE sa_type WHEN 'H' THEN '����ʹ' ELSE '' END AS sa_type ";
//$sql .= ",CASE sa_type WHEN 'I' THEN '���ٹ��' ELSE '' END AS sa_type ";
//$sql .= ",CASE sa_type WHEN 'C' THEN '�ѡ���ʹ�ѹ��' ELSE '' END AS sa_type ";
$sql .= " FROM ".$dbprefix."asaleh "; //WHERE smcode='".$_SESSION['usercode']."' 
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) where ".$dbprefix."asaleh.sano1  <> '' "; //WHERE smcode='".$_SESSION['usercode']."' 

//echo $sql;
//sql .= " WHERE  ".$dbprefix."asaleh.sa_type <> 'W'";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("sale_pack_del.php");
	}else if($_GET['state']==2){
		include("sale_editadd.php");
	}else if($_GET['state']==3){
		include("sale_cancel.php");
	}else if($_GET['state']==4){
		include("product_sale_bill.php");
	}
	else{
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

		$rec->setLink($PHP_SELF,"sessiontab=3&sub=33");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sano1,sadate,smcode,name_t,sa_type,tot_pv,total");
		$rec->setFieldFloatFormat(",,,,,,,,2,2,2,2,");
		//$rec->setFieldDesc("�Ţ���,���ʼ�����,���ͼ�����,�ѡ���ʹ,�Ӥس���ѵ�,hold�ʹ,�ѹ������,�ӹǹ���  PV,�ӹǹ�Թ���");
		$rec->setFieldDesc("�Ţ��������,�ѹ��������,������Ҫԡ,������Ҫԡ,��������ë���,PV, �ӹǹ�Թ");
		$rec->setFieldAlign("center,center,center,left,center,right,right,center,right,right,right,right,right,center");
		$rec->setFieldSpace("8%,8%,8%,45%,10%,10%,10%,7%,7%,7%,7%,7%,15%,8%");
		//$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setSearch("sano,".$dbprefix."asaleh.mcode,name_t,sadate,tot_pv,total,".$dbprefix."asaleh.uid");
		//$rec->setSearchDesc("�Ţ���,���ʼ�����,���ͼ�����,�ѹ������,�ӹǹ���  PV,�ӹǹ�Թ���,�Ң����;�ѡ�ҹ")
		$rec->setSearch("sano1,".$dbprefix."asaleh.mcode,name_t,sadate,tot_pv,total,".$dbprefix."asaleh.uid");
		$rec->setSearchDesc("�Ţ���,���ʼ�����,���ͼ�����,�ѹ������,�ӹǹ���  PV,�ӹǹ�Թ���,�Ң����;�ѡ�ҹ");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","sale11".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","sale11".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>��Ŵ Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>���ҧ Excel</a></fieldset>";
		
		$rec->setSpace($str);
		if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=33");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=33&state=1","post","delfield");
		}
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","�����");
		$rec->setSum(true,false,",,,,,true,true,true,true,true,true");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
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