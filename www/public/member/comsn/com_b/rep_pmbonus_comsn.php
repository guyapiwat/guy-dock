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
			alert("¡ÃØ³Ò¡ÃÍ¡ÃÙ»áººÃÍºãËé¶Ù¡µéÍ§");
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
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}

 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		
		$sql = "SELECT DATE_FORMAT(a.fdate, '%d-%m-%Y') as fdate,a.rcode, a.mcode,m.name_t,m.acc_no,m.bankcode,b.bankname,a.total as total,a.tax as tax,a.bonus as bonus ";
		$sql .= " FROM ".$dbprefix."hmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";

		
 		if($ftrcode!=""&&$cmc!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and a.mcode='".$cmc."'";
		}else if($ftrcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'";
		}else if($cmc!=""){
			$sql .= " WHERE a.mcode='".$cmc."'";
		}
		//echo "$sql<BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" rcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=12&ftrcode=$ftrcode&fmcode=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("fdate,mcode,name_t,acc_no,bankname,total,tax,bonus,adjust");
		//$rec->setFieldDesc("".$wording_lan["Date"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["acc_no"].",".$wording_lan["acc_type"].",".$wording_lan["Bonus"].",".$wording_lan["tax"]." (5%),".$wording_lan["Amount"].",".$wording_lan["adjust"]."");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=51&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&cmc=$cmc");
		$rec->setShowField("fdate,mcode,name_t,acc_no,bankname,total,tax,bonus");
		$rec->setFieldDesc("".$wording_lan["Date"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["acc_no"].",".$wording_lan["acc_type"].",".$wording_lan["Bonus"].",".$wording_lan["tax"]." (5%),".$wording_lan["Amount"]."");

		$rec->setFieldAlign("center,center,left,center,left,right,right,right");
		$rec->setFieldSpace("10%,10%,20%,10%,20%,10%,10%,10%");//10
		$rec->setSum(true,false,",,,,,true,true,true");
		$rec->setFieldFloatFormat(",,,,,2,2,2");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

?>

