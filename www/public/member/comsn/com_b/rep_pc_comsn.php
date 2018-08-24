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
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}


 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT DATE_FORMAT(tab.sadate, '%d-%m-%Y') as fdate,tab.mcode,taba.name_t,a.upa_code,tab.tot_pv as pv,a.level,a.gen,a.percer,tab.tot_pv*a.percer as total,tab.sano as sano,tab.id,CASE tab.inv_code WHEN '' THEN 'บริษัท' ELSE tab.inv_code END AS inv_code,CASE tab.send WHEN '1' THEN 'บิลแจงผ่านบริษัท' ELSE 'บิลขายปกติ' END AS type,'1' as checkcheck,a.pos_cur  FROM ".$dbprefix."asaleh tab  ";
		$sql .= " LEFT JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member) AS taba ON (tab.mcode=taba.mca)";
		$sql .= " LEFT JOIN (SELECT level,pv,percer,upa_code,total,mcode,fdate,pos_cur,gen FROM ".$dbprefix."hc) AS a ON (a.mcode=tab.mcode)";
		$sql .= " where 1=1 ";
		
 		if($strfdate!=""&&$strtdate!=""){
			//$sql .= " WHERE tab.sadate = '$strfdate' and a.upa_code='".$fmcode."' and a.mcode = '$cmc' ";
			//$sql .= " and tab.sadate = '$strfdate' and a.fdate = '$strfdate' and a.upa_code='".$cmc."'  ";
			//$sql .= " and tab.sadate = '$strfdate' and a.fdate = '$strfdate' and a.upa_code='".$cmc."'  ";
			$sql .= " and tab.sadate between '$strfdate' and '$strtdate' and a.upa_code='".$cmc."'  ";
		}
		/*}else if($strfdate!=""){
			$sql .= " WHERE tab.sadate = '$strfdate' ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.upa_code='".$fmcode."' ";
		}*/
		$sql .=  ' and tab.tot_pv >0  and tab.sa_type="A" and tab.cancel = 0 ';
		//echo $sql;
		$sql .= " UNION ";
		$sql .= "SELECT DATE_FORMAT(tab.sadate, '%d-%m-%Y') as fdate,tab.mcode,taba.name_t,a.upa_code,tab.tot_pv as pv,a.level,a.gen,a.percer,tab.tot_pv*a.percer as total,tab.hono as sano,tab.id,CASE tab.inv_code WHEN '' THEN 'บริษัท' ELSE tab.inv_code END AS inv_code,'บิลขายแจงยอด' as type,'2' as checkcheck ,a.pos_cur FROM ".$dbprefix."holdhead tab  ";
		$sql .= " LEFT JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member) AS taba ON (tab.mcode=taba.mca)";
		$sql .= " LEFT JOIN (SELECT level,pv,percer,upa_code,total,mcode,fdate,pos_cur,gen FROM ".$dbprefix."hc) AS a ON (a.mcode=tab.mcode)";
		$sql .= " where 1=1 ";
		
 		if($strfdate!=""&&$strtdate!=""){
			$sql .= " and tab.sadate between '$strfdate' and '$strtdate'  and a.upa_code='".$cmc."' ";
		}
		$sql .=  ' and tab.tot_pv >0  and tab.sa_type="A"  and tab.cancel = 0 ';
		
		//echo "$sql<BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" fdate ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=51&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&cmc=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("fdate,sano,mcode,name_t,upa_code,pv,level,gen,percer,total,inv_code,type,pos_cur");
		$rec->setFieldDesc("วันที่,เลขที่ใบเสร็จ,รหัสสมาชิก,ชื่อสมาชิก,รหัสผู้แนะนำ,คะแนน,ชั้น,gen,%โบนัส,ได้โบนัส,ผู้บันทึก,ชนิด,คุณสมบัติ");
		$rec->setFieldAlign("center,center,center,left,center,right,right,right,center,center");
		$rec->setFieldSpace("9%,9%,9%,15%,9%,9%,3%,3%,9%,9%,7%,10%");//10
		$rec->setFieldFloatFormat(",,,,,,,0,2,2");
		$rec->setSum(true,false,",,,,,,,true,,true");
		$rec->setFieldLink("");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","พิมพ์");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>