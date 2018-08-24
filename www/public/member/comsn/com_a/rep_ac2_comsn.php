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
$strfdate1 = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate1 = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if (isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="";}
rpdialog_new($sub,$strfdate1,$strtdate1);
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

		$sql = "SELECT *,a.total as total1, a.mcode as mcode1,m.name_t as name FROM ".$dbprefix."ac2 a left join ".$dbprefix."member as m on (a.mcode=m.mcode) ";

	 
			//$sql .= " WHERE tab.sadate = '$strfdate' and a.upa_code='".$fmcode."' and a.mcode = '$cmc'";
			$sql .= " WHERE a.upa_code='".$cmc."' $wwhere  ";

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
		$rec->setLink($PHP_SELF,"sessiontab=$tab&sub=$sub&ftrcode=$ftrcode&fmcode=$cmc&cmc=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=$tab");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,fdate,tdate,mcode1,name,sp_code,level,gen,total1");
	//	$rec->setFieldDesc("".$wording_lan["rcode"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["sp_code"].",".$wording_lan["PV"].",".$wording_lan["Amount"].",".$wording_lan["uid"].",".$wording_lan["type"]."");
		$rec->setFieldDesc("".$wording_lan["rcode"].",".$wording_lan["tab5"]['2_2'].",".$wording_lan["tab5"]['2_3'].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["sp_code"].",".$wording_lan["lv"].",".$wording_lan["gen"].",".$wording_lan["Bonus"]."");
		$rec->setFieldAlign("center,center,center,center,left,center,center,center,right");
		//$rec->setFieldSpace("5%,10%,10%,10%,35%,10%,10%,10%,15%");//10
		$rec->setFieldFloatFormat(",,,,,,,,2");
		$rec->setSum(true,false,",,,,,,,,true");

		//$rec->setFieldLink(",,,,,,index.php?sessiontab=5&sub=54&fmcode=");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","พิมพ์");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>