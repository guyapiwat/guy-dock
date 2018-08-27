<?
require("../backoffice/date_picker.php"); 
	if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
	if(isset($_POST["tdate"]))
		$tdate = $_POST["tdate"];
	else if(isset($_GET["tdate"]))
		$tdate = $_GET["tdate"];
		
	if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
	}
	/*
?>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<br />
<table style="margin-left:20;" width="350" border="0"><tr><td align="center"><fieldset>
<form style="margin-bottom:0;" action="index.php?sessiontab=<?=$_GET["sessiontab"]?>&sub=<?=$_GET["sub"]?>" method="post">
	&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
  ถึง
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-20"/>
    <input type="submit" value="ค้น" />
</form>
</fieldset></td></tr></table>

<?*/
require("connectmysql.php");
//require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
/*
$sql = "select * from ".$dbprefix."invent ";
$result = mysql_query($sql);
for($i=0;$i<mysql_num_rows($result);$i++){
	$data = mysql_fetch_object($result);
	$lid = $data->inv_code;
	$inv_desc = $data->inv_desc;
}*/
 /*
$sql = "SELECT ".$dbprefix."asaled.pcode,".$dbprefix."asaled.price,";
$sql .= "CASE ifnull(".$dbprefix."product.pdesc,0) WHEN '0' THEN ".$dbprefix."product_package.pdesc ELSE ".$dbprefix."product.pdesc END AS pdesc, ";

$sql .= "SUM(".$dbprefix."asaled.qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."asaled "; 
$sql .= "LEFT JOIN ".$dbprefix."asaleh ON (".$dbprefix."asaled.sano=".$dbprefix."asaleh.id) "; 
$sql .= "LEFT JOIN ".$dbprefix."product ON (".$dbprefix."product.pcode=".$dbprefix."asaled.pcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."product_package ON (".$dbprefix."product_package.pcode=".$dbprefix."asaled.pcode) "; */

$sql = "SELECT p.pcode,p.pdesc,p.qty as BLKK,p.unit as unit
           ,ifnull((SELECT i.qty as  qty FROM ".$dbprefix."product_invent i WHERE p.pcode = i.pcode and i.inv_code = 'LA01'),0)  as LA01
           ,ifnull((SELECT i.qty as qty FROM ".$dbprefix."product_invent i WHERE p.pcode = i.pcode and i.inv_code = 'LA02' ),0)  as LA02
            ,ifnull((SELECT i.qty as  qty FROM ".$dbprefix."product_invent i WHERE p.pcode = i.pcode and i.inv_code = 'LA03'),0)  as LA03,

			ifnull((p.qty),0)+(ifnull((SELECT i.qty as  qty FROM ".$dbprefix."product_invent i WHERE p.pcode = i.pcode and i.inv_code = 'LA01'),0))+(ifnull((SELECT i.qty as qty FROM ".$dbprefix."product_invent i WHERE p.pcode = i.pcode and i.inv_code = 'LA02' ),0))+(ifnull((SELECT i.qty as  qty FROM ".$dbprefix."product_invent i WHERE p.pcode = i.pcode and i.inv_code = 'LA03'),0)) as total
         
		FROM ali_product p WHERE 1
		ORDER BY `LA01` ASC";

if($fdate!=""){
	$sql .= "WHERE ".$dbprefix."asaleh.sadate BETWEEN '$fdate' AND '$tdate' and ".$dbprefix."asaleh.sa_type <> 'I'";
}else{
	
}

		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		//$rec->setLimitPage($_GET['lp']);
		$rec->setLimitPage('ALL');
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("pcode,pdesc,unit,BLKK,LA01,LA02,LA03,total");
		$rec->setFieldFloatFormat(",,,0,2");
		$rec->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,หน่วย,สำนักงานใหญ่,หน้าร้าน,ชลบุรี,ขอนแก่น,รวมทั้งสิ้น");
		$rec->setFieldAlign("center,left,center,right,right,right,right,right");
		$rec->setFieldSpace("10%,20%,10%,10%,10%,10%,10%,10%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		//$rec->setSum(true,true,true,true,true,true,"true,true");
		//$rec->setSearch("pcode,pdesc,price,qty,amt");
		//$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
		
		if($_GET['excel']==1){
			logtext(true,$_SESSION["adminusercode"],'Export Excel : ข้อมูลสมาชิก','');
			$text="uid=".$_SESSION["adminusercode"]." action=member_export_excel =>$sql";
			writelogfile($text);

			$rec->exportXls("ExportXls","member".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","member".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);

		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	//}
	?>