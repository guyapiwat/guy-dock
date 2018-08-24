<script language="javascript" type="text/javascript">
	function sale_print(id,sa){
		if(sa == '1'){var wlink = 'invoice_aprint.php?bid='+id;}
		if(sa == '2'){var wlink = 'invoice_hprint.php?bid='+id;}
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
</script>
<? include("./global.php");?>
<? include("rpdialog.php");?>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");


//rpdialog_m($_GET['sub']);
$strfdate1 = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate1 = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];

if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_GET["fdate"])){$fdate=$_GET["fdate"];}else{$fdate="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
 
	$cmc=$_SESSION["usercode"];

	$ftrcode = $_POST['ftrcode']==""?$_GET['ftrcode']:$_POST['ftrcode'];

if (strpos($ftrcode,"-")===false){
			//รอบเริ่มต้น == รอบสิ้นสุด
			$ftrc[0]=$ftrcode;
			$ftrc[1]=$ftrcode;
	}else{
		$ftrc = explode('-',$ftrcode);
	}
if(	$strfdate1 != '')$wwhere = " and a.fdate >= '".$strfdate1."' and tdate <= '".$strtdate1."' ";
if($ftrcode != '')$where1 =" and rcode='$ftrcode' ";


 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

		$sql = "SELECT *,a.total as total1,a.percer*100 as percer1 FROM ".$dbprefix."mc a  ";

	 
			//$sql .= " WHERE tab.sadate = '$strfdate' and a.upa_code='".$fmcode."' and a.mcode = '$cmc'";
			$sql .= " WHERE a.upa_code='".$cmc."' $wwhere  $where1 ";
//
//echo $sql;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" fdate ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=".$_GET['sub']."&ftrcode=$ftrcode&fmcode=$cmc&strfdate=$strfdate1&strtdate=$strtdate1");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,fdate,tdate,mcode,name_t,pv,level,percer1,total1");
		$rec->setFieldDesc("".$wording_lan["rcode"].",".$wording_lan["tab5"]['2_2'].",".$wording_lan["tab5"]['2_3'].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["PV"].",".$wording_lan["lv"].",%".$wording_lan["Bonus"].",".$wording_lan["Bonus"]."");
		$rec->setFieldAlign("center,center,center,center,left,right,center,center,right");
		//$rec->setFieldSpace("2%,7%,7%,7%,37%,7%,8%,5%,5%,10%");//10
		$rec->setFieldFloatFormat(",,,,,2,,0,2,");
		$rec->setSum(true,false,",,,,,true,,,true");
		$rec->setShowMobile(true,"true,false,false,true,false,true,true,true,true");

		$rec->setFieldLink("");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","พิมพ์");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>