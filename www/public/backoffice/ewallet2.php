<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprintw.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("��ͧ���¡��ԡ��Ź��")){
			window.location='index.php?sessiontab=3&sub=23&state=3&bid='+id;
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
$sql = "SELECT cancel,".$dbprefix."eatoship.id,
CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE'  WHEN '9' THEN 'Commission' WHEN '8' THEN 'RESET CAL' END AS checkportal,".$dbprefix."eatoship.uid as uid,sano,txtCash,txtFuture,txtTransfer,txtCredit1+txtCredit2+txtCredit3 as txtCredit,sadate,txtMoney ,".$dbprefix."member.name_t ";
$sql .= ",CASE ".$dbprefix."eatoship.mcode WHEN '' THEN ".$dbprefix."eatoship.inv_code  ELSE ".$dbprefix."eatoship.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."eatoship ";
$sql .= " LEFT JOIN ".$dbprefix."member on (".$dbprefix."eatoship.mcode=".$dbprefix."member.mcode) ";

//WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;

//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("ewallet_del.php");
	}else if($_GET['state']==2){
		include("ewallet_editadd.php");
	}else if($_GET['state']==3){
		include("ewallet_cancel.php");
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
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=231");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,sano,smcode,name_t,txtMoney,uid,checkportal");
		$rec->setFieldFloatFormat(",,,,2,,,,");
		//$rec->setFieldDesc("�Ţ���,���ʼ�����,���ͼ�����,�ѡ���ʹ,�Ӥس���ѵ�,hold�ʹ,�ѹ������,�ӹǹ���  PV,�ӹǹ�Թ���");
		$rec->setFieldDesc("�ѹ������,�Ţ���,���ʼ�����,���ͼ�����,�ӹǹ,�Ң� ���� ��ѡ�ҹ,��ͧ�ҧ");
		$rec->setFieldAlign("center,center,center,left,right,right,right,right,center,center,right,right,center");
		$rec->setFieldSpace("7%,13%,7%,48%,8%,8%,8%,8%,8%,8%");
		//$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
		$rec->setSearch("".$dbprefix."eatoship.mcode");
		$rec->setSearchDesc("������Ҫԡ");
		$rec->setSum(true,false,",,,,true,true,true,true,");
	//	$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","�����");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","¡��ԡ");
		//$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=23");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=23&state=1","post","delfield");
		}*/
		//$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE","��");
		;
	//	if($acc->isAccess(2)){
	//	$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
	//	$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","¡��ԡ");
	//	}
		//var_dump($acc->isAccess(2));
		//exit;
		//if($acc->isAccess(2))
			//$rec->setEdit("index.php","id","id","sessiontab=3&sub=23");
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