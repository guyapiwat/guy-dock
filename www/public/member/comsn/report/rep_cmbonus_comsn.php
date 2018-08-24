<? include("./global.php");?>
<? include("rpdialog.php");?>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript">
var win
function view(ro,code){
	var param = 'ftrcode=' + ro +'&fmcode='+code;
	var url = './print/rep_am_comsn.php?'+param;
	//window.location = wlink;
	if(win!=null) win.close();
	win = window.open(url,'','height=500 width=900 scrollbars=yes' );
}

function chknum(key){
	if((key>=48&&key<=57)||key==45)
		return true;
	else
		return false;
}
</script>
<?

	$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
	$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	//echo "ss $strfdate :   $strtdate<br>";
if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if (isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="";}

//rpdialog_new($sub,$strfdate,$strtdate);
rpdialog_m(771);
?>
<font color=#FF0000><b><?=$wording_lan["tab5"]['2']?></b></font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a-->
<?
		require("connectmysql.php");
		require("./cls/repGenerator.php");

		if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
		if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
		if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
		if ($cmc=="") {$cmc=$smc;}
		if ($cmc=="") {
			$cmc=$_SESSION["usercode"];
		}



		$sql = "SELECT *,@num := @num + 1 b FROM (SELECT a.fdate,a.tdate,a.paydate,a.ambonus,a.bmbonus,a.dmbonus,a.fmbonus,a.adjust,a.com_transfer_chagre,a.pv+a.ambonus+a.bmbonus+a.dmbonus+a.fmbonus+a.adjust as thiscom,a.bankcode";
		$sql .= ",a.id,a.rcode,a.mcode,m.name_t as name_t,a.pv,a.pvh,a.pvb,a.total,a.tot_tax as tax  ";
		$sql .= ",CASE a.status WHEN '1' THEN 'จ่าย' WHEN '0' THEN 'ไม่จ่าย'  END AS status
		,m.cmp,m.cmp2,b.bankname,m.acc_name,m.acc_no,m.branch,m.mobile
		";
		$sql .= ",CASE a.status WHEN '1' THEN a.pv+a.ambonus+a.bmbonus+a.dmbonus+a.fmbonus+a.adjust-a.tot_tax WHEN '0' THEN '0'  END AS total_real ";
		$sql .= ",CASE a.status WHEN '1' THEN (a.pv+a.ambonus+a.bmbonus+a.dmbonus+a.fmbonus+a.adjust-a.tot_tax-a.com_transfer_chagre) WHEN '0' THEN '0'  END AS ttttt ";
		$sql .= "FROM ".$dbprefix."cmbonus a ";
 
		//if($type_report == '2' or $type_report == '3' or $type_report == '4' or $type_report == '5')
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON (b.bankcode=m.bankcode)";

		$sql .= " WHERE a.mcode='$cmc'";
		if($strfdate!=""){
			$sql .= " and a.fdate >= '".$strfdate."' and  a.tdate <= '".$strtdate."'";
		}
		if($bank !=''){$sql.="and m.bankcode='$bank'";}
		if($fmcode != '' )$sql .= " and a.mcode = ".$fmcode."";
		if($_POST['bonus'] != '' )$sql .= " and a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";

		$sql .= " ) as ddd,(SELECT @num := 0) d where 1=1 " ;
		//echo $sql."<BR>";
		//$rec = new repGenerator_cm();
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"ddd.rcode":$_GET['ord']));
		if($_GET['excel']==1){$rec->setLimitPage("ALL");}
		else{$rec->setLimitPage("1000");}
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report&type_report1=$type_report1");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		
		$rec->setShowField("fdate,tdate,paydate,pv,thiscom,tax,com_transfer_chagre,ttttt,pvh,status");
		$rec->setFieldDesc($wording_lan["tab5"]['1_2'].",".$wording_lan["tab5"]['1_3'].",".$wording_lan["PayDate"].",".$wording_lan["tab5"]['2_5'].",".$wording_lan['tab5']['1_1_21'].",".$wording_lan["tax"].",".$wording_lan["tab5"]['2_17'].",".$wording_lan["TotalEnd"].",".$wording_lan["carry_forward"].",status");
		$rec->setFieldAlign("center,center,center,right,right,right,right,right,right,center");
		//$rec->setFieldSpace("7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,5%,7%,7%,5%,5%,7%,7%,7%,7%,5%");//10
		$rec->setSum(true,false,",,,,true,true,true,true,,,,,");
		$rec->setFieldFloatFormat(",,,2,2,2,2,2,2,");
		//$rec->setFieldLink("");
		//$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		//mysql_close($link);
		
?>