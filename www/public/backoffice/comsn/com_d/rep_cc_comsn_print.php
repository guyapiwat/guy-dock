<link href="./../../../style.css" rel="stylesheet" type="text/css">
<title>�������§ҹ</title>
<?
	if(isset($_POST["ftrcode"]))
		$ftrcode = $_POST["ftrcode"];
	else if(isset($_GET["ftrcode"]))
		$ftrcode = $_GET["ftrcode"];
	if (strpos($ftrcode,"-")===false){
		//�ͺ������� == �ͺ����ش
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
		$sql = "SELECT c.rcode,c.mcode,c.upa_code,c.pv,c.gpv,c.mpos,m.name_t,m.upa_name ";
		$sql .= "FROM ".$dbprefix."cm c ";
		$sql .= "LEFT JOIN ".$dbprefix."member m ON c.mcode=m.mcode ";
		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE rcode between  ".$ftrc[0]."  and  ".$ftrc[1]."  and c.mcode='".$fmcode."'";
		}else if($ftrcode!=""){
			$sql .= " WHERE rcode between  ".$ftrc[0]."  and  ".$ftrc[1]." ";
		}else if($fmcode!=""){
			$sql .= " WHERE c.mcode='".$fmcode."'";
		}
		//echo $sql;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=14&ftrcode=$ftrcode&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
	//	$rec->setShowIndex(true);
	//	$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","��");
		$rec->setShowField("rcode,mcode,name_t,upa_code,upa_name,pv,gpv,mpos");
		$rec->setFieldDesc("�����ͺ,����,����,�����Ѿ�Ź�,�����Ѿ���,��ṹ����ͺ,��ṹ����,���˹觻Ѩ�غѹ");
		$rec->setFieldAlign("center,center,left,center,left,right,right,center");
		$rec->setFieldSpace("10%,10%,20%,10%,20%,10%,10%,10%");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>