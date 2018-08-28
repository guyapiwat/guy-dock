<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT * FROM ".$dbprefix."log_ewallet ";
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");

		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=143");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("mcode,inv_code,sadate,satime,sano,yokma,moneyin,moneyout,total,uid,type");
		$rec->setFieldDesc("รหัสสมาชิก,รหัสสาขา,วันที่,เวลา,รหัสบิล,ยกมา,เงินเข้า,เงินออก,คงเหลือ,ผู้ใช้,ชนิด");
		$rec->setFieldAlign("center,center,center,center,center,center,center,center,center,center");
		$rec->setFieldSpace("8%,8%,8%,8%,8%,8%,8%,8%,8%,8%,8%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		$rec->setSearch("mcode,inv_code,sadate,satime,sano,yokma,moneyin,moneyout,total,uid,type");
		$rec->setSearchDesc("รหัสสมาชิก,รหัสสาขา,วันที่,เวลา,รหัสบิล,ยกมา,เงินเข้า,เงินออก,คงเหลือ,ผู้ใช้,ชนิด");
		//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","log_ewallet".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","log_ewallet".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------

?>