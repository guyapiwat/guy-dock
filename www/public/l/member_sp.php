<script language="javascript" type="text/javascript">
	function sale_print(id,sa){
		if(sa == '1'){var wlink = 'invoice_aprint.php?bid='+id;}
		if(sa == '2'){var wlink = 'invoice_hprint.php?bid='+id;}
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
</script>
<script language="javascript">
var win
function view(code){
	var param = 'fmcode='+code;
	var url = './mem_detailview.php?'+param;
	//window.location = wlink;
	//window.location = url;
	if(win!=null) win.close();
	win = window.open(url,'','fullscreen=yes scrollbars=yes' );
}
</script>

<?
require("connectmysql.php");
require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT * FROM ".$dbprefix."member ";
// JOIN เมื่อต้องการข้อมูลวันหมดอายุในโปรแกรม
$mm = date("Y-m");
//$mm = date("Y");
$sql = "SELECT id,sano,DATE_FORMAT(sadate, '%d-%m-%Y') as sadate,tot_pv,total,name_t,smcode,".$dbprefix."asaleh.mcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd,CASE inv_code WHEN '' THEN 'บริษัท' ELSE inv_code END AS inv_code,CASE send WHEN '1' THEN 'บิลแจงผ่านบริษัท' ELSE 'บิลขายปกติ' END AS type,'1' as checkcheck ";

$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN (SELECT mcode,sp_code AS smcode,name_t,mdate FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."asaleh.mcode=tabname.mcode) WHERE smcode='".$_SESSION['usercode']."' and sa_type = 'A' and tabname.mdate like '%$mm%' and tot_pv > 0 ";
$sql .= " UNION ";
$sql .= "SELECT id,hono as sano,DATE_FORMAT(sadate, '%d-%m-%Y') as sadate,tot_pv,total,name_t,smcode,".$dbprefix."holdhead.mcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd,CASE inv_code WHEN '' THEN 'บริษัท' ELSE inv_code END AS inv_code,'บิลขายแจงยอด' as type,'2' as checkcheck ";

$sql .= "FROM ".$dbprefix."holdhead ";
$sql .= "LEFT JOIN (SELECT mcode,sp_code AS smcode,name_t,mdate FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."holdhead.mcode=tabname.mcode) WHERE smcode='".$_SESSION['usercode']."' and sa_type = 'A' and tabname.mdate like '%$mm%' and tot_pv > 0 ";

		
//echo $sql;
	//	$sql .=  " where m.sp_code = '{$_SESSION["usercode"]}' and m.mdate like '%$mm%' and tab.tot_pv >0 and tab.sa_type='A' and tab.cancel = 0 ";

	/*	$sql .= "SELECT DATE_FORMAT(tab.sadate, '%d-%m-%Y') as fdate,tab.mcode,taba.name_t,tab.tot_pv as pv,tab.hono as sano,tab.id,CASE tab.inv_code WHEN '' THEN 'บริษัท' ELSE tab.inv_code END AS inv_code,'บิลขายแจงยอด' as type,'2' as checkcheck FROM ".$dbprefix."holdhead tab  ";
		$sql .= " LEFT JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member where sp_code = '{$_SESSION["usercode"]}' and mdate like '%$mm%') AS taba ON (tab.mcode=taba.mca)";

				$sql .=  ' where tab.tot_pv >0 and tab.sa_type="A" and tab.cancel = 0 ';
*/


//echo $sql;










//$sql = "SELECT ".$dbprefix."member.*,asa.all_pv,DATE_FORMAT(".$dbprefix."member.mdate, '%Y-%m-%d') as mdate FROM ".$dbprefix."member ";
//$sql .= "LEFT JOIN (SELECT sum(tot_pv) AS all_pv,mcode  FROM ".$dbprefix."asaleh WHERE  sa_type='A' and cancel=0 group by mcode) AS asa ON //(".$dbprefix."member.mcode=asa.mcode) where sp_code = '{$_SESSION["usercode"]}' and mdate like '%$mm%'";

 //echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("member_del.php");
	}else if($_GET['state']==2){
		include("member_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" smcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=1&sub=5");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("mcode,name_t,mdate,exp_date,pos_cur,upa_code,sp_code,ewallet,all_pv");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,กระเป๋าเงิน,คะแนนส่วนตัว");
		$rec->setShowField("sano,mcode,name_t,preserve,ability,imd,sadate,tot_pv,total,inv_code,type");
		$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,รักษายอดทันที,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,ผู้บันทึก,ชนิด");
		$rec->setFieldFloatFormat(",,,,,,,0,2");
		$rec->setFieldAlign("center,center,left,center,center,center,center,right,right,center,center");
		$rec->setFieldSpace("6%,8%,20%,7%,7%,7%,8%,8%,8%,10%,10%");
		$rec->setFieldLink(",index.php?sessiontab=2&sub=1&cmc=,");
		//$rec->setSearch("sano,smcode,name_t,sadate,tot_pv,total");
		//$rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setSum(true,false,",,,,,,,true,true");
		$rec->setFieldLink("");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","พิมพ์");
	
	//	$rec->setSearch("".$dbprefix."asaleh.mcode,".$dbprefix."member.name_t,".$dbprefix."member.mdate");
	//	$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร");
			
	
		
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	}

?>