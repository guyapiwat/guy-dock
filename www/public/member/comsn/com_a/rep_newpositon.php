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
		
		$sql = "SELECT DATE_FORMAT(a.date_change, '%d-%m-%Y') as date_change,a.rcode,a.mcode,taba.name_t,a.pos_before,a.	pos_after  FROM ".$dbprefix."calc_poschange a  ";
		$sql .= " LEFT JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member) AS taba ON (a.mcode=taba.mca)";

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
		$rec->setOrder($_GET['ord']==""?" date_change ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=4&ftrcode=$ftrcode&fmcode=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("date_change,mcode,name_t,pos_before,pos_after");
		$rec->setFieldDesc("".$wording_lan["smdate"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["old_poscur"].",".$wording_lan["new_poscur"]."");
		$rec->setFieldAlign("center,center,left,center,center");
		$rec->setFieldSpace("20%,20%,20%,20%,20%");//10
		$rec->setFieldFloatFormat("");
		$rec->setSum(true,false,"");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>