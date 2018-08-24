<script language="javascript" type="text/javascript">
	function sale_print(id,sa){
		if(sa == '1'){var wlink = 'invoice_aprint.php?bid='+id;}
		if(sa == '2'){var wlink = 'invoice_hprint.php?bid='+id;}
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
</script>
<? include("./global.php");?>
<script language="javascript">
var win
function view(ro,code){
	var param = 'ftrcode=' + ro +'&fmcode='+code;
	var url = './print/rep_am_comsn.php?'+param;
	//window.location = wlink;
	if(win!=null) win.close();
	win = window.open(url,'','height=500 width=900 scrollbars=yes' );
}
function checkround(){
	if(document.getElementById("ftrcode").value!=""){
		var numCheck = document.getElementById("ftrcode").value;
		var numVal = numCheck.split("-");
		if(numVal.length>2){
			alert("กรุณากรอกรูปแบบรอบให้ถูกต้อง");
			return false;
		}
	}
	document.rform.submit();
}
function chknum(key){
	if((key>=48&&key<=57)||key==45)
		return true;
	else
		return false;
}
</script>
<?
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
if(	$strfdate1 != '')$wwhere = " and a.fdate >= '".$strfdate1."' and tdate <= '".$strtdate1."' ";




 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

		$sql = "SELECT *,a.total as total1 FROM ".$dbprefix."bm a left join ".$dbprefix."member as m on (a.mcode=m.mcode) ";

	 
			//$sql .= " WHERE tab.sadate = '$strfdate' and a.upa_code='".$fmcode."' and a.mcode = '$cmc'";
			$sql .= " WHERE a.upa_code='".$cmc."' $wwhere  ";

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
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=1&ftrcode=$ftrcode&fmcode=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,mcode,name_t,sp_code,pv,gen,percer,total1,pos_cur");
	//	$rec->setFieldDesc("".$wording_lan["rcode"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["sp_code"].",".$wording_lan["PV"].",".$wording_lan["Amount"].",".$wording_lan["uid"].",".$wording_lan["type"]."");
		$rec->setFieldDesc("".$wording_lan["rcode"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["sp_code"].",".$wording_lan["PV"].",".$wording_lan["lv"].",%".$wording_lan["Bonus"].",".$wording_lan["Bonus"].",".$wording_lan["uid"].",".$wording_lan["type"]."");
		$rec->setFieldAlign("center,center,left,center,right,center,center,right,center");
		$rec->setFieldSpace("9%,9%,35%,9%,9%,3%,9%,9%,7%,10%");//10
		$rec->setFieldFloatFormat(",,,,2,,,2,,");
		$rec->setSum(true,false,",,,,,,,true,");

		$rec->setFieldLink("");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","พิมพ์");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>