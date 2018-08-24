<?
require("connectmysql.php");
require("./cls/repGenerator_b.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
mysql_query("delete from ".$dbprefix."cnt_commission where mcode = '".$_SESSION[usercode]."' ");
$whereclass = " mcode ='".$_SESSION[usercode]."' and total>0 ";
$fmcode = $_SESSION[usercode];
		//	$whereclass = " AND mcode='".$_SESSION["usercode"]."'";


		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "select * from (SELECT a.paydate,a.fob/a.crate as fob
		,a.smb/a.crate as smb
		,a.matching/a.crate as matching
		,a.onetime/a.crate as onetime
		,a.voucher/a.crate as voucher
		,a.pvh/a.crate as pvh
		,a.pv/a.crate as pv
		,a.totaly/a.crate as totaly
		,a.cycle/a.crate as cycle,a.atoship,a.ewallet
		
		,lb.cshort,(a.ecom+a.ewallet+a.onetime+a.pv)/a.crate as thiscom,(a.ecom+a.ewallet+a.onetime+a.pv)/a.crate as thiscom1,c.fdate,c.tdate,m.acc_no,a.tot_tax/a.crate as tax,m.mobile,'N' as Yes,a.ecom ,";
		$sql .= "CASE c_note1 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note1 ";
		$sql .= ",CASE c_note2 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note2 ";
		$sql .= ",CASE c_note3 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note3 ";
		$sql .= ",CASE c_note4 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note4 ";
		$sql .= ",CASE c_note5 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note5 ";		
		$sql .= ",CASE a.status WHEN '1' THEN a.com_transfer_chagre/a.crate ELSE '0' END AS oon1 ,";
		$sql .= "CASE a.status WHEN '1' THEN (a.ecom+a.ewallet+a.onetime+a.pv-a.tot_tax-a.com_transfer_chagre)/a.crate ELSE a.total END AS ttttt ";
		//$sql .= "oon";
		$sql .= ",a.id,a.rcode,a.tot_vat/a.crate as tot_vat,a.mcode,CONCAT(m.name_f,' ',m.name_t) as name_tt,a.pvb,a.total,a.status_pv  ";
		$sql .= "FROM ".$dbprefix."cmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."cround c ON c.rcode=a.rcode ";
		$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON lb.cid=a.locationbase ";
		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and a.mcode=".$fmcode." and c.calc = '1'   ";
		}else if($ftrcode!=""){
			$sql .= " WHERE a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and c.calc = '1'  ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.mcode='".$fmcode."'  and c.calc = '1' ";
		}
		$sql .= " ) as a ";
		//echo "SQL : $sql <BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"a.rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=112&ftrcode=$ftrcode&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setFieldFloatFormat(",,,2,2,2,2,2,2,2,2,,,,");
		$rec->setShowField("rcode,fdate,tdate,pv,ewallet,thiscom1,pvh,totaly,tax,oon1,ttttt,paydate");
		$rec->setFieldDesc($wording_lan["tab5"]['2_1'].",".$wording_lan["tab5"]['2_2'].",".$wording_lan["tab5"]['2_3'].",".$wording_lan["tab5"]['2_5'].",".$wording_lan["withdraw"]."&nbsp;Ewallet,".$wording_lan["tab5"]['2_12'].",".$wording_lan["tab5"]['2_13'].",".$wording_lan["tab5"]['2_14'].",".$wording_lan["tab5"]['2_16'].",".$wording_lan["tab5"]['2_17'].",".$wording_lan["tab5"]['2_18'].",".$wording_lan["tab5"]['2_19']."");
		$rec->setFieldAlign("center,left,center,right,right,right,right,right,right,right,right,right,right,center");
		$rec->setSum(true,false,",,,,true,,,,,,true,,,");
		$rec->setShowMobile(true,"true,false,false,false,false,true,true,false,false,false,true,true");

		//$rec->setFieldLink(",,,,,index.php?sessiontab=5&sub=6&ftrcode=,");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

?>