<?
require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}


$sql = "SELECT * FROM ".$dbprefix."product ";
//echo $sql;
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){

?>
<fieldset style="background-color:#FFFFEE">
<table border="1" width="60%" cellpadding="0" cellspacing="0"><tr bgcolor="#999999">
    <td width="15%"><strong>รหัสสินค้า</strong> </td><td><?=mysql_result($rs,$i,'pcode')?></td>
    <td width="15%"><strong>ชื่อสินค้า</strong> </td><td><?=mysql_result($rs,$i,'pdesc')?></td>
</tr><tr bgcolor="#FFFFFF">
    <td><strong>ราคา/หน่วย</strong> </td><td><?=mysql_result($rs,$i,'price')?></td>
    <td><strong>pv/หน่วย</strong> </td><td><?=mysql_result($rs,$i,'pv')?></td>
</tr></table>
<?
//$sql = "SELECT pcode,pdesc,price,SUM(qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."holddesc "; 
	$sql = "SELECT ".$dbprefix."holddesc.id,".$dbprefix."holddesc.sano,".$dbprefix."holdhead.mcode,name_t,pcode,pv,price,qty,amt FROM ".$dbprefix."holddesc ";
	$sql .= "LEFT JOIN ".$dbprefix."holdhead ON (".$dbprefix."holddesc.sano=".$dbprefix."holdhead.sano) ";
	$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."holdhead.mcode=".$dbprefix."member.mcode) ";
	//$sql .= "LEFT JOIN (SELECT mcode,mcode AS smcode,name_t FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."holdhead.mcode=tabname.mcode) ";
	//sql .= "LEFT JOIN (SELECT mcode,mcode AS smcode,name_t FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."holdhead.mcode=tabname.mcode) ";
	$sql .= "WHERE pcode='".mysql_result($rs,$i,'pcode')."' and ".$dbprefix."holdhead.uid  = '".$_SESSION['inv_usercode']."' ";
	if($fdate!=""){
		$sql .= "AND sadate BETWEEN '$fdate' AND '$tdate' ";
	}
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
			$rec->setLink($PHP_SELF,"sessiontab=3&sub=".$_GET['sub']."&fdate=$fdate&tdate=$tdate&stype=$stype");
			$rec->setBackLink($PHP_SELF,"sessiontab=3");
			if(isset($page))
				$rec->setCurPage($page);
			$rec->setShowField("sano,mcode,name_t,qty,amt");
			$rec->setFieldFloatFormat(",,,0,2");
			$rec->setFieldDesc($wording_lan["Bill_2"].",".$wording_lan["word"]["mcode"].",".$wording_lan["name"].",".$wording_lan["quantity"].",".$wording_lan["totalmoney"]."");
			$rec->setFieldAlign("center,center,left,right,right");
			$rec->setFieldSpace("10%,15%,45%,5%,10%");
			//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
			//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
			//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
			//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE");
			$rec->setSum(true,false,",,,true,true");
			//$rec->setSearch("pcode,pdesc,price,qty,amt");
			//$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
			//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
			$rec->showRec(1,'SH_QUERY');
			//---------------------------------
		//}
		?></fieldset><hr width="60%" align="center" /><br /><?
}

?>