<link href="./../style.css" rel="stylesheet" type="text/css">
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
		require("./connectmysql.php");
		require("./prefix.php");
		require("./cls/repGenerator.php");
		$wheresql = "";
		if($ftrcode!="" && $_POST['fmcode']!=""){
			$wheresql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and mcode='".$_POST['fmcode']."'";
		}else if($ftrcode!=""){
			$wheresql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'";
		}else if($_POST['fmcode']!=""){
			$wheresql .= " WHERE mcode='".$_POST['fmcode']."'";
		}
		//echo $wheresql."<br>";
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT a.rcode, a.mcode,m.name_t, sum(a.com_a) as com_a,sum(a.com_b) as com_b,sum(a.com_c) as com_c,sum(a.com_d) as com_d,sum(a.total_all) as total_all,sum(a.tax) as tax,sum(a.netprice) as netprice ";
		$sql .= " FROM ali_allbonus a ";
		$sql .= " LEFT JOIN ali_member m ON a.mcode=m.mcode";
		$sql .= " GROUP BY mcode,rcode";
		//$fmcode
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=100&ftrcode=$ftrcode&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("rcode,mcode,name_t, com_a,com_b,com_c,com_d,total_all,tax,netprice");
		$rec->setFieldDesc("รหัสรอบ,รหัสมาชิก,ชื่อสมาชิก,ค่าแนะนำ,ทีมขาย,พัฒนาทีมขาย,แมชชิ่ง,รวมรายได้,หักภาษี 5%,รายได้สุทธิ");
		$rec->setFieldAlign("center,center,left,right,right,right,right,right,right,right");
		$rec->setFieldSpace("7%,7%,16%,10%,10%,10%,10%,10%,10%,10%");
		$rec->setSum(true,false,",,,true,true,true,true,true,true,true");
		$rec->setFieldFloatFormat(",,,2,2,2,2,2,2,2");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>