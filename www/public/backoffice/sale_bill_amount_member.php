<?
require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}


$sql = "SELECT * FROM ".$dbprefix."member ";
//echo $sql;
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){

?>
<fieldset style="background-color:#FFFFEE">
<table border="1" width="60%" cellpadding="0" cellspacing="0"><tr bgcolor="#999999">
    <td width="15%"><strong>������Ҫԡ</strong> </td><td><?=mysql_result($rs,$i,'mcode')?></td>
    <td width="15%"><strong>������Ҫԡ</strong> </td><td><?=mysql_result($rs,$i,'name_t')?></td>
</tr></table>
<?
//$sql = "SELECT pcode,pdesc,price,SUM(qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."asaled "; 
	$sql = "SELECT ".$dbprefix."asaled.id,".$dbprefix."asaled.sano,DATE_FORMAT(".$dbprefix."asaleh.sadate, '%d-%m-%Y') as sadate,
	".$dbprefix."asaleh.mcode,name_t,pcode,pdesc,pv,bv,fv,price,qty,amt FROM ".$dbprefix."asaled ";
	$sql .= "LEFT JOIN ".$dbprefix."asaleh ON (".$dbprefix."asaled.sano=".$dbprefix."asaleh.sano) ";
	$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) ";
	//$sql .= "LEFT JOIN (SELECT mcode,mcode AS smcode,name_t FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."asaleh.mcode=tabname.mcode) ";
	//sql .= "LEFT JOIN (SELECT mcode,mcode AS smcode,name_t FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."asaleh.mcode=tabname.mcode) ";
	$sql .= "WHERE ".$dbprefix."member.mcode ='".mysql_result($rs,$i,'mcode')."' ";
	if($fdate!=""){
		$sql .= "AND ".$dbprefix."asaleh.sadate BETWEEN '$fdate' AND '$tdate' ";
	}
	if($satype !="")
	$sql .= " and  ".$dbprefix."asaleh.sa_type = '$satype'";
	//$sql .= "GROUP BY pcode";// LEFT JOIN ".$dbprefix."bank ON ".$dbprefix."member.bankcode=".$dbprefix."bank.bankcode";
	//echo $sql;
	//$wherecause = " WHERE ";
	
		//$link = mysql_connect('localhost', 'root', '1422528');
		//$charset = "SET NAMES 'tis620'"; 
		//mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
		//mysql_select_db('free_style',$link);
		//$rs = mysql_query("SELECT * FROM usaaba_member");
		/*if($_GET['state']==1){
			include("member_del.php");
		}else if($_GET['state']==2){
			include("member_editadd.php");
		}else{*/
		//echo $sql;
			//$rec = new sqlAnalizer();
		//echo "<br />";
			$rec = new repGenerator();
			$rec->setQuery($sql);
			$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
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
			$rec->setLink($PHP_SELF,"sessiontab=3&sub=".$_GET['sub']."&fdate=$fdate&tdate=$tdate&satype=$satype&stype=$stype");
			$rec->setBackLink($PHP_SELF,"sessiontab=3");
			if(isset($page))
			$rec->setCurPage($page);
			$rec->setLimitPage('ALL');	

			$rec->setShowField("sadate,sano,pcode,pdesc,qty,amt,pv");
			$rec->setFieldFloatFormat(",,,,2");
			$rec->setFieldDesc("�ѹ���,�Ţ���,�����Թ���,�����Թ���,�ӹǹ,�ӹǹ�Թ���,pv");
			$rec->setFieldAlign("center,center,center,left,right,right,right,right,right");
			$rec->setFieldSpace("10%,7%,10%,45%,5%,10%");
			//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
			//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
			//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
			//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE");
			$rec->setSum(true,false,",,,,true,true,true,true,true");
			//$rec->setSearch("pcode,pdesc,price,qty,amt");
			//$rec->setSearchDesc("�����Թ���,��������´�Թ���,�Ҥ�,�ӹǹ,���Թ");
			//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
			$rec->showRec(1,'SH_QUERY');
			//---------------------------------
		//}
		?></fieldset><hr width="60%" align="center" /><br /><?
}

?>