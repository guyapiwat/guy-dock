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
		$sql = "SELECT c.rcode,c.bcode,m.name_t,c.mcode,m.sp_name,c.level,c.pv,c.percent,c.total ";
		$sql .= " FROM ".$dbprefix."dm  c ";
		$sql .= " LEFT OUTER JOIN ".$dbprefix."member m on m.mcode = c.mcode ";
		
 		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and c.mcode='".$fmcode."'";
		}else if($ftrcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'";
		}else if($fmcode!=""){
			$sql .= " WHERE c.mcode='".$fmcode."'";
		}
		//echo $sql;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" rcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=19&ftrcode=$ftrcode&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","ดู");
		$rec->setShowField("rcode,bcode,sp_name,mcode,name_t,level,pv,percent,total");
		$rec->setFieldDesc("รหัสรอบ,รหัสสมาชิก,ชื่อ,รหัสผู้แนะนำ,ชื่อ,ชั้น,PV,%โบนัส,ได้,");
		$rec->setFieldAlign("center,center,left,center,left,center,right,center,right");
		$rec->setFieldSpace("10%,10%,20%,10%,20%,10%,10%,10%");
		$rec->setSum(true,false,",,,,,,true,,true");
		$rec->setFieldFloatFormat(",,,,,,2,,2");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>