<? 
	
	include_once("connectmysql.php");
	include_once("prefix.php");
	$sql = "SELECT * FROM ".$dbprefix."member ORDER BY mcode ASC LIMIT 1";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0)
		$GLOBALS["defmcode"] = mysql_result($rs,0,'mcode');
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

	}
	mysql_free_result($rs);

	$str = "select * from ".$dbprefix."location_base where cid = '".$_SESSION["inv_locationbase"]."'";
	$rs = mysql_query($str);
	if(mysql_num_rows($rs)>0){
		$data = mysql_fetch_object($rs);
		$timediff = mysql_result($rs,0,'timediff');	
		$GLOBALS["sending"] = $data->csending;
		$GLOBALS["pcode_register"] = $data->pcode_register;
		$GLOBALS["currcode"] = $data->currcode;
		$GLOBALS["pcode_extend"] = $data->pcode_extend;
	$sql = "SELECT price FROM ".$dbprefix."product where pcode = '".$GLOBALS["pcode_extend"]."' ";
		$rs123 = mysql_query($sql);
		if(mysql_num_rows($rs123)>0){
			$totalextend = mysql_result($rs123,0,'price');
		}
		$GLOBALS["pcode_charge"] = $data->pcode_charge;
		$GLOBALS["crate"] = $data->crate;
		$_SESSION["inv_cshort"] = $data->cshort;
		$GLOBALS["main_inv_code"] = $data->main_inv_code;
		$_SESSION["datetimezone"] = date("Y-m-d", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
		$_SESSION["datetimezone_Ym"] = date("Y-m", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
		$_SESSION["datetimezone_time"] = date("H:i:s", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
		$_SESSION["datetimezone_last"] = date("Y-m-t", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
		$_SESSION["datetimezone_nmonth"] = date("Y-m-15", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+1 , date("d")+0, date("Y")+0));
	}else {
		$GLOBALS["pcode_charge"] = '0003';
		$GLOBALS["crate"] = '1';
		$GLOBALS["sending"] = 0;
		$GLOBALS["pcode_register"] = "0001";
		$GLOBALS["pcode_extend"] = "0002";
		$GLOBALS["pcode_extend"] = "";
		$timediff = 0;	
		$_SESSION["datetimezone"] = date("Y-m-d", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
		$_SESSION["datetimezone_Ym"] = date("Y-m", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
		$_SESSION["datetimezone_time"] = date("H:i:s", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
		$_SESSION["datetimezone_last"] = date("Y-m-t", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
		$_SESSION["datetimezone_nmonth"] = date("Y-m-15", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+1 , date("d")+0, date("Y")+0));
	}
	$str = "select * from ".$dbprefix."lr_def";
	$rs = mysql_query($str);
	for($ig=0;$ig<mysql_num_rows($rs);$ig++){
		$data = mysql_fetch_object($rs);
		$GLOBALS["mem_def"][$ig] = $data->lr_name;
	}
	$str = "select * from ".$dbprefix."oon";
	$rs = mysql_query($str);
	for($ig=0;$ig<mysql_num_rows($rs);$ig++){
		$data = mysql_fetch_object($rs);
		$GLOBALS["sms_credits"] = $data->sms_credits;
	}

?>