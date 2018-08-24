<?
require("connectmysql.php");
//require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql ="SELECT m.mcode,m.name_t,m.address,m.ewallet";
$sql .=",CONCAT(m.address,'ตำบล',d.districtName,'อำเภอ ',a.amphurName,'จังหวัด', p.provinceName) as aad";
$sql .= ",CASE m.mtype1 WHEN '0' THEN 'Member' WHEN '1' THEN 'Mobile'  WHEN '2' THEN 'Center' WHEN '3' THEN 'Hub'  END AS mtype ";
$sql .="FROM ali_member m LEFT JOIN province p ON(m.provinceId=p.provinceId)";
$sql .=" LEFT JOIN amphur a ON(m.amphurId=a.amphurId)";
$sql .=" LEFT JOIN district d ON(m.districtId=d.districtId)";
$sql.="WHERE mtype1 <> '0'";
//$wherecause = " WHERE ";
//echo $sql;

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("invent_del.php");
	}else if($_GET['state']==2){
		include("invent_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort((isset($_GET['srt'])==true?$_GET['srt']:"DOWN"));
		$rec->setOrder((isset($_GET['ord'])==true?$_GET['ord']:"inv_code"));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("mcode,name_t,mtype,aad,ewallet");
		$rec->setFieldDesc("รหัส,ชื่อ,ประเภท,ที่ตั้ง,ewallet");
		$rec->setFieldAlign("center,left,center,center,right,right");
		$rec->setFieldSpace("10%,20%,10%,50%,10%");
		$rec->setFieldLink("");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","invent".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","invent".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$rec->setFieldFloatFormat(",,,,2");
		$rec->setSum(true,false,",,,,true");
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>