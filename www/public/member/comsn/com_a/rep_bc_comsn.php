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
			alert("��سҡ�͡�ٻẺ�ͺ���١��ͧ");
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
if (isset($_GET["strfdate"])){$fdate=$_GET["strfdate"];}else{$fdate="";}
if (isset($_GET["strtdate"])){$tdate=$_GET["strtdate"];}else{$tdate="";}
if (isset($_GET["lr"])){$lr=$_GET["lr"];}else{$lr="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}



 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		
		/*$sql = "SELECT DATE_FORMAT(tab.sadate, '%d-%m-%Y') as sadate,tab.sano,a.rcode,a.mcode,taba.name_t,a.fdate,a.upa_code,tabb.upa_name,tabb.pos_cur,CASE a.lr WHEN '1' THEN a.pv ELSE '0' END AS lcl,CASE a.lr WHEN '2' THEN a.pv ELSE '0' END AS lcc,CASE a.lr WHEN '3' THEN a.pv ELSE '0' END AS lcr FROM ".$dbprefix."cnt_bm a  ";
		$sql .= " LEFT JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member) AS taba ON (a.mcode=taba.mca)";
		$sql .= " LEFT JOIN (SELECT mcode AS mcb,name_t AS upa_name,pos_cur FROM ".$dbprefix."member) AS tabb ON (a.upa_code=tabb.mcb)";
		$sql .= " LEFT JOIN (SELECT mcode AS mcb,sano AS sano,sadate FROM ".$dbprefix."asaleh) AS tab ON (a.mcode=tab.mcb and tab.sadate > a.fdate )";*/

		$sql = "SELECT tab.sadate as sadate,tab.sano as sano,a.rcode,a.mcode,taba.name_t,a.fdate,a.tdate,a.upa_code,tabb.upa_name,tabb.pos_cur,CASE a.lr WHEN '1' THEN tab.tot_pv ELSE '0' END AS lcl,CASE a.lr WHEN '2' THEN tab.tot_pv ELSE '0' END AS lcc,CASE a.lr WHEN '3' THEN tab.tot_pv ELSE '0' END AS lcr,tab.total,
		CASE tab.inv_code WHEN '' THEN '����ѷ' ELSE tab.inv_code END AS inv_code,
		CASE tab.send WHEN '1' THEN '���ᨧ��ҹ����ѷ' ELSE '��Ţ�»���' END AS type,tab.id,'1' as checkcheck FROM ".$dbprefix."asaleh  tab ";
		$sql .= " LEFT JOIN (SELECT mcode ,name_t FROM ".$dbprefix."member) AS taba ON (tab.mcode=taba.mcode)";
		$sql .= " LEFT JOIN (SELECT mcode ,name_t AS upa_name,pos_cur FROM ".$dbprefix."member) AS tabb ON (tab.mcode=tabb.mcode)";
		$sql .= " LEFT JOIN (SELECT mcode,rcode ,fdate,tdate,upa_code,pv,lr FROM ".$dbprefix."bm) AS a ON (a.mcode=tab.mcode  ) where tab.tot_pv >0 and cancel = 0  and (tab.sa_type = 'A')  ";
		if($fdate !=""){
			$sql .= " and tab.sadate>='".$fdate."' and tab.sadate<='".$tdate."' and  a.fdate >= '$fdate' and a.tdate <= '$tdate' ";
		}
		 if($cmc!=""){
			$sql .= " and a.upa_code='".$cmc."' ";
		}
		if($lr !=""){
		 $sql .=" and a.lr = '$lr' ";
		}
		$sql .= " group by tab.mcode ";
		$sql .= " UNION SELECT tab.sadate as sadate,tab.hono as sano,a.rcode,a.mcode,taba.name_t,a.fdate,a.tdate,a.upa_code,tabb.upa_name,tabb.pos_cur,CASE a.lr WHEN '1' THEN tab.tot_pv ELSE '0' END AS lcl,CASE a.lr WHEN '2' THEN tab.tot_pv ELSE '0' END AS lcc,CASE a.lr WHEN '3' THEN tab.tot_pv ELSE '0' END AS lcr,tab.total,
CASE tab.inv_code WHEN '' THEN '����ѷ' ELSE tab.inv_code END AS inv_code	,'��Ţ��ᨧ�ʹ' as type,tab.id,'2' as checkcheck FROM ".$dbprefix."holdhead  tab ";
		$sql .= " LEFT JOIN (SELECT mcode ,name_t FROM ".$dbprefix."member) AS taba ON (tab.mcode=taba.mcode)";
		$sql .= " LEFT JOIN (SELECT mcode ,name_t AS upa_name,pos_cur FROM ".$dbprefix."member) AS tabb ON (tab.mcode=tabb.mcode)";
		$sql .= " LEFT JOIN (SELECT mcode,rcode ,fdate,tdate,upa_code,pv,lr FROM ".$dbprefix."bm) AS a ON (a.mcode=tab.mcode  ) where tab.tot_pv >0 and cancel = 0  and (tab.sa_type = 'A') ";
		 if($cmc!=""){
			$sql .= " and a.upa_code='".$cmc."' ";
		}
		if($fdate !=""){
			$sql .= " and tab.sadate>='".$fdate."' and tab.sadate<='".$tdate."' and  a.fdate >= '$fdate' and a.tdate <= '$tdate' ";
		}
		if($lr !=""){
		$sql .= " and a.lr = '$lr'";
		}
		$sql .= " group by tab.mcode ";
		//$sql .= " group by tab.hono ";

		//echo "$sql<BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" sano ":$_GET['ord']);
		$_GET['lp'] = "500";
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=2&strfdate=$strfdate&strtdate=$strtdate&cmc=$cmc&lr=$lr&fdate=$fdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sano,mcode,name_t,sadate,lcl,lcc,total,inv_code,type");
		$rec->setFieldDesc("".$wording_lan["sano"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["sdate"].",".$wording_lan["PVLeft"].",".$wording_lan["PVRight"].",".$wording_lan["Amount"].",".$wording_lan["uid"].",".$wording_lan["type"]."");
		$rec->setFieldAlign("center,center,left,center,right,right,right,center,center");
		$rec->setFieldLink(",index.php?sessiontab=2&sub=1&cmc=,,");
		$rec->setFieldSpace("9%,9%,27%,9%,9%,9%,9%,9%,10%");//10
		$rec->setFieldFloatFormat(",,,,2,2,2,");
	//	$rec->setSum(true,false,",,,,true,true,true,");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","�����");
		//$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>