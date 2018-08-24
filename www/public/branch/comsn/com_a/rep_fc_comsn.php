<?
	require("connectmysql.php");
	$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];	
	$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
    rpdialog_m($_GET['sub']);
		
		
		$sql = "SELECT DATE_FORMAT(a.fdate, '%d-%m-%Y') as fdate,a.gen as level,a.rcode,a.mcode,a.upa_code,a.gen,a.pv,a.percer,a.total,iv.inv_desc ";
		$sql .= "FROM ".$dbprefix."fc a ";
		$sql .= "LEFT JOIN ".$dbprefix."invent iv ON a.mcode=iv.inv_code ";

		$sql .=" WHERE mcode='".$_SESSION["admininvent"]."'";
		if($strfdate!="" ){
			$sql .= "  and  a.fdate ='$strfdate'";
		}
		
		//echo $sql;
		//exit;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" rcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=$tab");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","ดู");
	    $rec->setShowField("rcode,mcode,inv_desc,upa_code,pv,percer,total");
		$rec->setFieldDesc("รหัสรอบ,รหัสสมาชิก,ชื่อสมาชิก,รหัสผู้คีย์,คะแนน,%โบนัส,ได้โบนัส");
		$rec->setFieldAlign("center,center,left,center,right,right,center,right,right");
		$rec->setFieldSpace("10%,10%,20%,10%,15%,10%,15%,10%,10%");//10
		$rec->setFieldFloatFormat(",,,,,2,,2,2");
		$rec->setSum(true,false,",,,,,true,,true,true");
		$rec->setFieldLink("");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("a.mcode");
		$rec->setSearchDesc("รหัส");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

?>