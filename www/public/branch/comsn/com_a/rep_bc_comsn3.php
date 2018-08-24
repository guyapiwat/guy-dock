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
//require("./cls/repGenerator.php");

if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_GET["fdate"])){$fdate=$_GET["fdate"];}else{$fdate="";}
if (isset($_GET["lr"])){$lr=$_GET["lr"];}else{$lr="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	//$cmc=$_SESSION["usercode"];
}


						$fdate =	date("Y-m")."-01";
						$tdate = date("Y-m")."-31";


 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		
		/*$sql = "SELECT DATE_FORMAT(tab.sadate, '%d-%m-%Y') as sadate,tab.sano,a.rcode,a.mcode,taba.name_t,a.fdate,a.upa_code,tabb.upa_name,tabb.pos_cur,CASE a.lr WHEN '1' THEN a.pv ELSE '0' END AS lcl,CASE a.lr WHEN '2' THEN a.pv ELSE '0' END AS lcc,CASE a.lr WHEN '3' THEN a.pv ELSE '0' END AS lcr FROM ".$dbprefix."cnt_asaleh_bm a  ";
		$sql .= " LEFT JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member) AS taba ON (a.mcode=taba.mca)";
		$sql .= " LEFT JOIN (SELECT mcode AS mcb,name_t AS upa_name,pos_cur FROM ".$dbprefix."member) AS tabb ON (a.upa_code=tabb.mcb)";
		$sql .= " LEFT JOIN (SELECT mcode AS mcb,sano AS sano,sadate FROM ".$dbprefix."asaleh) AS tab ON (a.mcode=tab.mcb and tab.sadate > a.fdate )";*/

		$sql = "SELECT tab.sadate as sadate,tab.sano as sano,a.rcode,a.mcode,name_t,a.fdate,a.upa_code,CASE a.lr WHEN '1' THEN tab.tot_pv ELSE '0' END AS lcl,CASE a.lr WHEN '2' THEN tab.tot_pv ELSE '0' END AS lcc,CASE a.lr WHEN '3' THEN tab.tot_pv ELSE '0' END AS lcr,tab.total,
		CASE tab.inv_code WHEN '' THEN 'บริษัท' ELSE tab.inv_code END AS inv_code,
		CASE tab.send WHEN '1' THEN 'บิลแจงผ่านบริษัท' ELSE 'บิลขายปกติ' END AS type,tab.id,'1' as checkcheck FROM ".$dbprefix."asaleh  tab ";
		$sql .= " LEFT JOIN (SELECT mcode,rcode,satype ,fdate,upa_code,pv,lr FROM ".$dbprefix."asaleh_bm) AS a ON (a.mcode=tab.mcode) where tab.tot_pv >0 and cancel = 0  and (tab.sa_type = 'A' or tab.sa_type = 'Q' or tab.sa_type = 'C') ";
		if($fdate !=""){
			$sql .= " and tab.sadate between '".$fdate."' and '".$tdate."' ";
		}
		 if($cmc!=""){
			$sql .= " and a.upa_code='".$cmc."' ";
		}
		if($lr !=""){
		 $sql .=" and a.lr = '$lr' ";
		}
		$sql .= " group by tab.sano ";
		$sql .= " UNION SELECT tab.sadate as sadate,tab.hono as sano,a.rcode,a.mcode,name_t,a.fdate,a.upa_code,CASE a.lr WHEN '1' THEN tab.tot_pv ELSE '0' END AS lcl,CASE a.lr WHEN '2' THEN tab.tot_pv ELSE '0' END AS lcc,CASE a.lr WHEN '3' THEN tab.tot_pv ELSE '0' END AS lcr,tab.total,
CASE tab.inv_code WHEN '' THEN 'บริษัท' ELSE tab.inv_code END AS inv_code	,'บิลขายแจงยอด' as type,tab.id,'2' as checkcheck FROM ".$dbprefix."holdhead  tab ";
		$sql .= " LEFT JOIN (SELECT mcode,rcode,satype ,fdate,upa_code,pv,lr FROM ".$dbprefix."asaleh_bm) AS a ON (a.mcode=tab.mcode ) where tab.tot_pv >0 and cancel = 0  and (tab.sa_type = 'A' or tab.sa_type = 'Q' or tab.sa_type = 'C') ";
		 if($cmc!=""){
			$sql .= " and a.upa_code='".$cmc."' ";
		}
		if($fdate !=""){
			$sql .= " and tab.sadate between '".$fdate."' and '".$tdate."' ";
		}
		if($lr !=""){
		$sql .= " and a.lr = '$lr'";
		}
		$sql .= " group by tab.hono ";
//echo $sql;

		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" sadate ":$_GET['ord']);
		$_GET['lp'] = "500";
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=114&cmc=$cmc&lr=$lr&fdate=$fdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sano,mcode,name_t,sadate,lcl,lcc");
		$rec->setFieldDesc("เลขบิล,รหัสสมาชิก,ชื่อ,วันที่,คะแนนซ้าย,คะแนนขวา");
		$rec->setFieldAlign("center,center,left,center,right,right,right,center,center");
		//$rec->setFieldLink(",index.php?sessiontab=2&sub=1&cmc=,,");
		$rec->setFieldSpace("9%,9%,50%,9%,9%,9%,9%,9%,10%");//10
		$rec->setFieldFloatFormat(",,,,,0,,");
		$rec->setSum(true,false,",,,,true,true,true,");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","พิมพ์");
		//$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>