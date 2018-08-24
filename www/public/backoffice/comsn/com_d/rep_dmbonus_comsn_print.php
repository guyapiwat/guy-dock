<link href="./../../../style.css" rel="stylesheet" type="text/css">
<title>พิมพ์รายงาน</title>
<?
	if(isset($_POST["ftrcode"]))
		$ftrcode = $_POST["ftrcode"];
	else if(isset($_GET["ftrcode"]))
		$ftrcode = $_GET["ftrcode"];
	if (strpos($ftrcode,"-")===false){
		//รอบเริ่มต้น == รอบสิ้นสุด
		$ftrc[0]=$ftrcode;
		$ftrc[1]=$ftrcode;
	}else{
		$ftrc = explode('-',$ftrcode);
	}
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
		require("./../../connectmysql.php");
		require("./../../prefix.php");
		require("./../../cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT a.rcode, a.mcode,m.name_t,m.acc_no,m.bankcode,b.bankname,a.total,a.tax,a.bonus ";
		$sql .= " FROM ".$dbprefix."dmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";
		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and a.mcode='".$fmcode."'";
		}else if($ftrcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'";
		}else if($fmcode!=""){
			$sql .= " WHERE a.mcode='".$fmcode."'";
		}

		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=20&ftrcode=$ftrcode&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("rcode,mcode,name_t,acc_no,bankname,total,tax,bonus");
		$rec->setFieldDesc("รอบ,รหัสมาชิก,ชื่อ,เลขบัญชี,ธนาคาร,โบนัสแมชชิ่ง,ภาษี 5%,สุทธิ");
		$rec->setFieldAlign("center,center,left,center,left,right,right,right");
		$rec->setFieldSpace("10%,10%,15%,10%,15%,15%,10%,15%");//10
		$rec->setSum(true,false,",,,,,true,true,true");
		$rec->setFieldFloatFormat(",,,,,2,2,2");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>