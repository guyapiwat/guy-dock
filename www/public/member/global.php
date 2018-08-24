<? 
	include_once("connectmysql.php");
	include_once("prefix.php");
	$sql = "SELECT * FROM ".$dbprefix."member ORDER BY mcode ASC LIMIT 1";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$GLOBALS["defmcode"] = mysql_result($rs,0,'mcode');
		
	}
	
	
	$sql = "SELECT * FROM ".$dbprefix."member where mcode = '".$_SESSION["usercode"]."' ORDER BY mcode ASC LIMIT 1";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
	//	$GLOBALS["selfregis"] = mysql_result($rs,0,'setregis');
		$GLOBALS["usercode"] = mysql_result($rs,0,'mcode');
		$_SESSION["m_locationbase"] = mysql_result($rs,0,'locationbase');
	}

	//$GLOBALS["defmcode"] = "0000001";
	mysql_free_result($rs);
	$str = "select * from ".$dbprefix."global";
	$rs = mysql_query($str);
	if(mysql_num_rows($rs)>0){
		$data = mysql_fetch_object($rs);
		$GLOBALS["numofchild"] = $data->numofchild;
		$GLOBALS["treeformat"] = $data->treeformat;
		$GLOBALS["numofleveltoshow"] = $data->numoflevel;
		$GLOBALS["statusformat"] = $data->statusformat;
		$GLOBALS["status_member"] = $data->status_member;
		$GLOBALS["status_regis_mb"] 	= $data->status_regis_mb;
		$GLOBALS["status_sale_mb"] 		= $data->status_sale_mb;
		$GLOBALS["status_hold_mb"] 		= $data->status_hold_mb;
		$GLOBALS["status_swap_mb"] 		= $data->status_swap_mb;

		$GLOBALS["status_remark"] 		= $data->status_remark;


	}
	mysql_free_result($rs);

	$str = "select * from ".$dbprefix."location_base where cid = '".$_SESSION["m_locationbase"]."'";
	$rs = mysql_query($str);
	if(mysql_num_rows($rs)>0){
		$data = mysql_fetch_object($rs);
		$GLOBALS["sending"] = $data->csending;
		$GLOBALS["pcode_register"] = $data->pcode_register;
		$GLOBALS["pcode_extend"] = $data->pcode_extend;
		$GLOBALS["currcode"] = $data->currcode;

		$sql = "SELECT price FROM ".$dbprefix."product where pcode = '".$GLOBALS["pcode_extend"]."' ";
		$rs123 = mysql_query($sql);
		if(mysql_num_rows($rs123)>0){
			$totalextend = mysql_result($rs123,0,'price');
		}

		
		$GLOBALS["crate"] = $data->crate;
		$GLOBALS["main_branch"] = $data->main_inv_code;
		$_SESSION["m_cshort"] = $data->cshort;
		$_SESSION["m_cname"] = $data->cname;
		$_SESSION["m_crate"] = $data->crate;
	}else {
		$GLOBALS["sending"] = 0;
		$GLOBALS["pcode_register"] = "0001";
		$GLOBALS["pcode_extend"] = "0002";
		$_SESSION["m_cshort"] = 'TH';
	}
	$str = "select * from ".$dbprefix."lr_def";
	$rs = mysql_query($str);
	for($ig=0;$ig<mysql_num_rows($rs);$ig++){
		$data = mysql_fetch_object($rs);
		$GLOBALS["mem_def"][$ig] = $data->lr_name;
	}



	// lastmonth //
	$DateStart= $_SESSION["datetimezone_Ym"].'-10';
	$strtime = strtotime($DateStart);
	$hhdate=date("Y-m", strtotime("-1 Month",$strtime));
	$hhdate1=date("Y-m", strtotime("-2 Month",$strtime));



	// lastmonth //
?>