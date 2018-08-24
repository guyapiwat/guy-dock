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

if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_GET["fdate"])){$fdate=$_GET["fdate"];}else{$fdate="";}
if (isset($_GET["lr"])){$lr=$_GET["lr"];}else{$lr="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}
$sql="delete from ".$dbprefix."asaleh_bmh ";
mysql_query($sql);

$sql = "select * from ".$dbprefix."around where calc='1' order by rcode desc limit 0,1";
$result = mysql_query($sql);
for($i=0;$i<mysql_num_rows($result);$i++){
	$data = mysql_fetch_object($result);
	$fdate = $data->fdate;
	$tdate = $data->tdate;
}
$fdate = date("Y-m").'-01';
$tdate = date("Y-m").'-31';

$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
	$rs = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlObj = mysql_fetch_object($rs);
		$mcode[$i] =$sqlObj->mcode;		
		$name_t[$i] =$sqlObj->name_t;		
		$upa_code[$mcode[$i]] = $sqlObj->upa_code;
		$lr1[$mcode[$i]] = $sqlObj->lr;
		$pos_cur[$mcode[$i]] = $sqlObj->pos_cur;
		$tot_pv[$mcode[$i]] = 0; 
		$sum_pv[$mcode[$i]][1] =0;
		$sum_pv[$mcode[$i]][2] =0;
		$sum_pv[$mcode[$i]][3] =0;
		$count[$mcode[$i]][1] =0;
		$count[$mcode[$i]][2] =0;
		$count[$mcode[$i]][3] =0;
		$old_quota[$mcode[$i]] = 0;
	}
	mysql_free_result($rs);

	/*$sql 	= "SELECT mcode,sum(hpv) as tot_pv FROM ".$dbprefix."holdhead ";
	$sql .= "WHERE sadate>='$fdate'  and (sa_type = 'H') AND cancel=0   group by mcode";
	$rs = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlObj = mysql_fetch_object($rs);
		$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;
	}
	mysql_free_result($rs);*/

	$sql 	= "SELECT mcode,sum(hpv) as tot_pv FROM ".$dbprefix."asaleh ";
	$sql .= "WHERE (sa_type = 'H') and  cancel=0 and hpv>0  group by mcode";
	$rs = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlObj = mysql_fetch_object($rs);
		$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;
	}
	//echo $sql;
	mysql_free_result($rs);

	
	$ro = 1;
	
	//คำนวน bm ไม่ใช้ในส่วน bmbonus
	for($i=0;$i<sizeof($mcode);$i++){
		if($tot_pv[$mcode[$i]] > 0){
			$up = $mcode[$i];
			$lev = 0;
			while($up <> ""){
				if($upa_code[$up] <>""){
					$sql = "INSERT INTO ".$dbprefix."asaleh_bmh (rcode,mcode,upa_code,pv,lr,fdate,tdate,mpos) VALUES";
					$sql .= "(".$ro.",'$mcode[$i]','$upa_code[$up]','".$tot_pv[$mcode[$i]]."','$lr1[$up]','$fdate','$tdate','".$pos_cur[$mcode[$i]]."') ";
					mysql_query($sql);
					//echo "จากบิลขาย : $sql <br>";
					//exit;
				}
				$up = $upa_code[$up];
			}
		}
	}



 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		
		/*$sql = "SELECT DATE_FORMAT(tab.sadate, '%d-%m-%Y') as sadate,tab.sano,a.rcode,a.mcode,taba.name_t,a.fdate,a.upa_code,tabb.upa_name,tabb.pos_cur,CASE a.lr WHEN '1' THEN a.pv ELSE '0' END AS lcl,CASE a.lr WHEN '2' THEN a.pv ELSE '0' END AS lcc,CASE a.lr WHEN '3' THEN a.pv ELSE '0' END AS lcr FROM ".$dbprefix."cnt_asaleh_bm a  ";
		$sql .= " LEFT JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member) AS taba ON (a.mcode=taba.mca)";
		$sql .= " LEFT JOIN (SELECT mcode AS mcb,name_t AS upa_name,pos_cur FROM ".$dbprefix."member) AS tabb ON (a.upa_code=tabb.mcb)";
		$sql .= " LEFT JOIN (SELECT mcode AS mcb,sano AS sano,sadate FROM ".$dbprefix."asaleh) AS tab ON (a.mcode=tab.mcb and tab.sadate > a.fdate )";*/

		$sql = "SELECT tab.sadate as sadate,tab.sano as sano,a.rcode,a.mcode,name_t,a.fdate,a.upa_code,CASE a.lr WHEN '1' THEN tab.hpv ELSE '0' END AS lcl,CASE a.lr WHEN '2' THEN tab.hpv ELSE '0' END AS lcc,CASE a.lr WHEN '3' THEN tab.tot_pv ELSE '0' END AS lcr,tab.htotal,
		CASE tab.inv_code WHEN '' THEN 'บริษัท' ELSE tab.inv_code END AS inv_code,
		CASE tab.send WHEN '1' THEN 'บิลแจงผ่านบริษัท' ELSE 'บิลขายปกติ' END AS type,tab.id,'1' as checkcheck FROM ".$dbprefix."asaleh  tab ";
		$sql .= " LEFT JOIN (SELECT mcode,rcode ,fdate,upa_code,pv,lr FROM ".$dbprefix."asaleh_bmh) AS a ON (a.mcode=tab.mcode  ) where tab.tot_pv >0 and cancel = 0  and hpv > 0  and (tab.sa_type = 'H') ";
		if($fdate !=""){
			//$sql .= " and tab.sadate between '".$fdate."' and '".$tdate."' ";
		}
		 if($cmc!=""){
			$sql .= " and a.upa_code='".$cmc."' ";
		}
		if($lr !=""){
		 $sql .=" and a.lr = '$lr' ";
		}
		$sql .= " group by tab.sano ";


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
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=222&cmc=$cmc&lr=$lr&fdate=$fdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sano,mcode,name_t,sadate,lcl,lcc");
		$rec->setFieldDesc("เลขบิล,รหัสสมาชิก,ชื่อ,วันที่,คะแนนซ้าย,คะแนนขวา");
		$rec->setFieldAlign("center,center,left,center,right,right,right,center,center");
		//$rec->setFieldLink(",index.php?sessiontab=2&sub=1&cmc=,,");
		$rec->setFieldSpace("9%,9%,55%,9%,9%,9%,9%,9%,10%");//10
		$rec->setFieldFloatFormat(",,,,,0,,");
		$rec->setSum(true,false,",,,,true,true,true,");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","พิมพ์");
		//$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>