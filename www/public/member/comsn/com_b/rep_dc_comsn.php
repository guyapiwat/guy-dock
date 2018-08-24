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
		
		$sql = "SELECT b.rcode,b.mcode,taba.name_t,b.upa_code,tabb.upa_name,b.pv,b.level,b.percer,b.total FROM ".$dbprefix."dc b  ";
		$sql .= " LEFT JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member) AS taba ON (b.mcode=taba.mca)";
		$sql .= " LEFT JOIN (SELECT mcode AS mcb,name_t AS upa_name FROM ".$dbprefix."member) AS tabb ON (b.upa_code=tabb.mcb)";

		
 		if($ftrcode!=""&&$cmc!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and b.upa_code='".$cmc."'";
		}else if($ftrcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'";
		}else if($cmc!=""){
			$sql .= " WHERE b.upa_code='".$cmc."'";
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
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=5&ftrcode=$ftrcode&fmcode=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,mcode,name_t,upa_code,upa_name,pv,level,percer,total");
		$rec->setFieldDesc("ÃËÑÊÃÍº,ÃËÑÊÊÁÒªÔ¡,ª×èÍÊÁÒªÔ¡,ÃËÑÊÍÑ¾äÅ¹ì,ª×èÍÍÑ¾äÅ¹ì,¤Ğá¹¹,ªÑé¹·Õè,%âº¹ÑÊ,ä´éâº¹ÑÊ");
		$rec->setFieldAlign("center,center,left,center,left,right,center,right,right");
		$rec->setFieldSpace("10%,10%,15%,10%,15%,10%,10%,10%,10%");//10
		$rec->setFieldFloatFormat(",,,,,2,,2,2");
		$rec->setSum(true,false,",,,,,true,,true,true");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>