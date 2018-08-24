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
		$sql = "SELECT c.rcode,c.mcode,m.name_t,m.acc_no,m.bankcode,b.bankname";
		$sql .= ",c.ro_l,c.ro_r,c.pcrry_l,c.pcrry_r,c.total_pv_l,c.total_pv_r,c.carry_l,c.carry_r,m.pos_cur,c.percer,c.total,c.tax,c.totalamt  ";
		$sql .= "FROM ".$dbprefix."cmbonus1 c ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON c.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";
		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and c.mcode='".$fmcode."'";
		}else if($ftrcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'";
		}else if($fmcode!=""){
			$sql .= " WHERE c.mcode='".$fmcode."'";
		}
		//$fmcode
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=15&ftrcode=$ftrcode&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("rcode,mcode,name_t,ro_l,ro_r,pcrry_l,pcrry_r,total_pv_l,total_pv_r,carry_l,carry_r,pos_cur,percer,total,tax,totalamt");
		$rec->setFieldDesc("รอบ,รหัส,ชื่อ,เข้าซ้าย,เข้าขวา,เก็บซ้าย,เก็บขวา,รวมซ้าย,รวมขวา,เหลือซ้าย,เหลือขวา,ตำแหน่ง,%โบนัส,โบนัส,ภาษี 5%,สุทธิ");
		$rec->setFieldAlign("center,center,left,right,right,right,right,right,right,right,right,center,center,right,right,right");
		$rec->setFieldSpace("3%,5%,13%,6%,6%,6%,6%,6%,6%,6%,6%,5%,5%,6%,5%,6%");//10
		$rec->setSum(true,false,",,,true,true,true,true,true,true,true,true,,true,true,true,true");
		$rec->setFieldFloatFormat(",,,2,2,2,2,2,2,2,2,,2,2,2,2");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>