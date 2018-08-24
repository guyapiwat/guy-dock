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
require("./cls/repGenerator_b.php");

if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if (isset($_GET["lr"])){$lr=$_GET["lr"];}else{$lr="1";}
if (isset($_GET["status"])){$status=$_GET["status"];}else{$status="0";}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}
if (isset($_GET["ftrcode"])){$fdate=$_GET["ftrcode"];}else{$fdate="";}

 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		
		$sql = "SELECT a.mcode,m.name_t,CASE a.status WHEN '0' THEN '0 PV' WHEN '1' THEN '250' WHEN '2' THEN '750' END AS status,a.lr,a.pos_cur";
		$sql .= " FROM ".$dbprefix."cnt_spcode1 a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";

 		
		if($cmc!=""){
			$sql .= " WHERE a.sp_code='".$cmc."'";
		}
		if($lr!=""){
			$sql .= " and a.lr='".$lr."'";
		}
		if($status != "0"){
			$sql .= " and (a.status = '1' or a.status = '2') ";
		}
		//echo "$sql<BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setLimitPage("200");	
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" a.mcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=14&lr=$lr&status=$status");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("fdate,mcode,name_t,acc_no,bankname,total,adjust");
		//$rec->setFieldDesc("".$wording_lan["sdate"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["acc_no"].",".$wording_lan["acc_type"].",".$wording_lan["commission"].",".$wording_lan["adjust"]."");
		$rec->setShowField("mcode,name_t,lr,status");
		$rec->setFieldDesc("".$wording_lan["mcode"].",".$wording_lan["name"].",´éÒ¹,ª¹Ô´¡ÒÃÃÑ¡ÉÒÂÍ´");
		$rec->setFieldAlign("center,left,center,center,left,right,right,right");
		$rec->setFieldSpace("20%,60%,5%,15%,10%,10%,10%");//10
		$rec->setSum(true,false,",,,,,true");
		$rec->setFieldFloatFormat(",,,,,2,2,2");
		$rec->setFieldLink("");
		//$rec->setFieldLink(",,,,,index.php?sessiontab=5&sub=3&fdate=,,");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

?>

