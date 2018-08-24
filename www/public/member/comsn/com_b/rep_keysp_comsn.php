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
<script language="javascript">
var win
function view(ro,code){
	var param = 'ftrcode=' + ro +'&fmcode='+code;
	var url = './print/rep_am_comsn.php?'+param;
	//window.location = wlink;
	if(win!=null) win.close();
	win = window.open(url,'','height=500 width=900 scrollbars=yes' );
}

function chknum(key){
	if((key>=48&&key<=57)||key==45)
		return true;
	else
		return false;
}
</script>
<?
rpdialog_m(53);

$strfdate1 = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate1 = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
require("connectmysql.php");
require("./cls/repGenerator.php");

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
if(	$ftrcode != '')$wwhere = " and a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' ";



 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

		$sql = "SELECT *,m.name_t FROM ".$dbprefix."embonus a left join ".$dbprefix."member as m on (a.mcode=m.mcode) ";

	 
			//$sql .= " WHERE tab.sadate = '$strfdate' and a.upa_code='".$fmcode."' and a.mcode = '$cmc'";
			$sql .= " WHERE a.mcode='".$cmc."' $wwhere  ";

		if($strfdate1!=""){
			$sql .= " and a.fdate >= '".$strfdate1."' and a.tdate <= '".$strtdate1."' ";
		}
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
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=53&ftrcode=$ftrcode&fmcode=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,fdate,tdate,mcode1,name_t,upa_code1,total1");
	//	$rec->setFieldDesc("".$wording_lan["rcode"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["sp_code"].",".$wording_lan["PV"].",".$wording_lan["Amount"].",".$wording_lan["uid"].",".$wording_lan["type"]."");
		$rec->setShowField("fdate,tdate,mcode,name_t,total,tax,bonus");
		$rec->setFieldDesc("ตั้งแต่วันที่,ถึงวันที่,รหัสมาชิก,ชื่อ,เงินเดือน,ภาษี,สุทธิ");
		$rec->setFieldAlign("center,center,center,left,right,right,right");
		$rec->setFieldSpace("10%,10%,12%,38%,10%,10%,10%");//10
		$rec->setSum(true,false,",,,,true,true,true");
		$rec->setFieldFloatFormat(",,,,2,2,2");

		$rec->setFieldLink(",,,,index.php?sessiontab=5&sub=54&fmcode=");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","พิมพ์");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>