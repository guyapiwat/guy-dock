<? include("./global.php");?><? include("rpdialog.php");?><?rpdialog_m(57);	$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];	$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];	//echo "ss $strfdate :   $strtdate<br>";?><font color=#FF0000><b><?=$wording_lan["tab5"]['2']?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">����������</a--><?		require("connectmysql.php");		require("./cls/repGenerator_b.php");		//require("./cls/repGenerator.php");		/*if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' and m.mcode='".$fmcode."'";		}else if($strfdate!=""&&$strtdate!=""){			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' ";		}else if($fmcode!=""){			$whereclass = " AND m.mcode='".$fmcode."'";		}*/		if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}		if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}		if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}		if ($cmc=="") {$cmc=$smc;}		if ($cmc=="") {			$cmc=$_SESSION["usercode"];		}		$sql = "select r.rcode,mmm.total as total_keysp,r.paydate,		ifnull(mmm.total,0) as total1,		r.fdate,r.tdate,m.mcode,concat(m.name_f,' ',m.name_t) as name_t1";		$sql .= " from ".$dbprefix."member m		join ".$dbprefix."tround r		left join ".$dbprefix."bank bank on(bank.bankcode=m.bankcode)		left join ".$dbprefix."embonus1 mmm on(m.mcode=mmm.mcode and mmm.rcode=r.rcode)		";				/*if($strfdate!=""&&$fmcode!=""){			$sql .= " WHERE r.fdate between ".$strfdate." and  ".$strtdate."  and m.mcode='".$fmcode."'";		}else if($strfdate!=""){			$sql .= " WHERE r.fdate between ".$strfdate." and  ".$strtdate." ";		}else if($fmcode!=""){			$sql .= " WHERE m.mcode='".$fmcode."'";		}*/		$sql .= " WHERE m.mcode='".$cmc."' and r.calc = '1' and  ifnull(mmm.total,0) > 0 ";		if($strfdate!=""){			$sql .= " and r.fdate >= '".$strfdate."' and r.tdate <= '".$strtdate."' ";		}		//echo $sql;		//exit;		//echo $sql;		$rec = new repGenerator();		$rec->setQuery($sql);		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);		$rec->setOrder($_GET['ord']==""?" r.rcode ":$_GET['ord']);		if(isset($_POST['skey']))			$rec->setCause($_POST['skey'],$_POST['scause']);		else if(isset($_GET['skey']))			$rec->setCause($_GET['skey'],$_GET['scause']);		$rec->setLimitPage("200");		$rec->setSize("100%","");		$rec->setAlign("center");		$rec->setPageLinkAlign("right");		$rec->setLink($PHP_SELF,"sessiontab=5&sub=53&ftrcode=$ftrcode&fmcode=$fmcode");		$rec->setBackLink($PHP_SELF,"sessiontab=5");		if(empty($_GET["pg"]))$page = 1;		else $page = $_GET["pg"];		if(isset($page))			$rec->setCurPage($page);		//$rec->setShowIndex(true);  		$rec->setShowField("rcode,fdate,tdate,mcode,name_t1,total_keysp");		$rec->setFieldFloatFormat(",,,,,2,2,2,2,2,2");		$rec->setFieldDesc($wording_lan["tab5"]['1_1'].",".$wording_lan["tab5"]['1_2'].",".$wording_lan["tab5"]['1_3'].",".$wording_lan["tab5"]['1_4'].",".$wording_lan["tab5"]['1_5'].",ALL Sale");		$rec->setFieldAlign("center,center,center,center,left,right,right,right,right,right,right,right,right,right,right,right,right");		$rec->setFieldSpace("3%,7%,7%,8%,65%,9%,9%,9%,9%,9%,10%");		$rec->setSum(true,false,",,,,,true,true,true,true,true,true");		//$rec->setFieldLink(",,,,,index.php?sessiontab=5&sub=51&ftrcode="); 		//$rec->setSpace($str);		$rec->showRec(1,'SH_QUERY');		mysql_close($link);?>