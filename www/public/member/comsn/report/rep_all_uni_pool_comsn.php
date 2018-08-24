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

rpdialog_new($sub,$strfdate,$strtdate);
?>
<font color=#FF0000><b><?=$wording_lan["tab5"]['2']?></b></font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a-->
<?
		require("connectmysql.php");
		require("./cls/repGenerator_b.php");
		//require("./cls/repGenerator.php");
		/*if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' and m.mcode='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$whereclass = " AND m.mcode='".$fmcode."'";
		}*/
		if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
		if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
		if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
		if ($cmc=="") {$cmc=$smc;}
		if ($cmc=="") {
			$cmc=$_SESSION["usercode"];
		}
		$sql = "select r.rcode,mmm.total as unilevel,r.paydate,
		(ifnull(mmm.total,0))-(ifnull(mmm.total,0))*5/100 as total1,
		(ifnull(mmm.total,0))*5/100 as tax,
		r.fdate,r.tdate,m.mcode,concat(m.name_f,' ',m.name_t) as name_t1";
		$sql .= " from ".$dbprefix."member m
		join ".$dbprefix."bround r
		left join ".$dbprefix."bank bank on(bank.bankcode=m.bankcode)
		left join ".$dbprefix."mmbonus mmm on(m.mcode=mmm.mcode and mmm.rcode=r.rcode)
		";
		$sql .= " WHERE m.mcode='".$cmc."' and r.calc = '1' and  ifnull(mmm.total,0) > 0 ";
		if($strfdate!=""){
			$sql .= " and mmm.fdate >= '".$strfdate."' and  mmm.tdate <= '".$strtdate."' ";
		}
		// echo $sql;
		/*if($strfdate!=""&&$fmcode!=""){
			$sql .= " WHERE r.fdate between ".$strfdate." and  ".$strtdate."  and m.mcode='".$fmcode."'";
		}else if($strfdate!=""){
			$sql .= " WHERE r.fdate between ".$strfdate." and  ".$strtdate." ";
		}else if($fmcode!=""){
			$sql .= " WHERE m.mcode='".$fmcode."'";
		}*/
		
		
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" r.rcode ":$_GET['ord']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setLimitPage("200");
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=101&ftrcode=$ftrcode&fmcode=$fmcode&strfdate=$strfdate&strtdate=$strtdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(empty($_GET["pg"]))$page = 1;
		else $page = $_GET["pg"];
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);  
		$rec->setShowField("rcode,fdate,tdate,mcode,name_t1,unilevel,tax,total1");
		$rec->setFieldFloatFormat(",,,,,2,2,2,2,2,2");
		$rec->setFieldDesc($wording_lan["tab5"]['1_1'].",".$wording_lan["tab5"]['1_2'].",".$wording_lan["tab5"]['1_3'].",".$wording_lan["tab5"]['1_4'].",".$wording_lan["tab5"]['1_5'].",Unilevel,".$wording_lan["tax"].",Total");
		$rec->setFieldAlign("center,center,center,center,left,right,right,center,right");
		$rec->setFieldSpace("3%,7%,7%,8%,35%,9%,15%,5%,15%");
		$rec->setSum(true,false,",,,,,true,true,,true");
		//$rec->setFieldLink(",,,,,index.php?sessiontab=5&sub=51&ftrcode=,index.php?sessiontab=5&sub=52&ftrcode=,,index.php?sessiontab=5&sub=53&ftrcode=,index.php?sessiontab=5&sub=122&ftrcode=,index.php?sessiontab=5&sub=50&ftrcode=");
		$rec->setFieldLink(",,,,,index.php?sessiontab=5&sub=3&strfdate=$strfdate&strtdate=$strtdate&ftrcode=,");
		//$rec->setFieldLink("");
		//$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);


		
		
?>