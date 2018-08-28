<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript">
var win
function view(ro,code){
	var param = 'ftrcode=' + ro +'&fmcode='+code;
	var url = './print/rep_am_comsn.php?'+param;
	//window.location = wlink;
	if(win!=null) win.close();
	win = window.open(url,'','height=500 width=900 scrollbars=yes' );
}
	function sale_print(id){
		var wlink = 'invoice_aprint_sale.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
	//	window.location='index.php?sessiontab=3&sub=6&sanoo='+id;
	}
function checkround(){
	if(document.getElementById("strfdate").value==""){
		alert("กรุณาเลือกวันที่เริ่มต้น");
		document.getElementById("strfdate").focus();
		return false;
	}
	if(document.getElementById("strtdate").value==""){
		alert("กรุณาเลือกวันที่สิ้นสุด");
		document.getElementById("strtdate").focus();
		return false;
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

	if (isset($_GET["sub"])){$sub=$_GET["sub"];}else{$sub="";}
	if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];}else{$tab="";}
	$ftrcode = $_POST['ftrcode']==""?$_GET['ftrcode']:$_POST['ftrcode'];
$fdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$tdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
//	if(empty($strtdate))$strtdate = $strfdate;
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	$cmc = $_POST['cmc']==""?$_GET['cmc']:$_POST['cmc'];
$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];

if(empty($fdate))$fdate = $strfdate;
if(empty($tdate))$tdate = $strtdate;
if(empty($cmc))$cmc = $fmcode;
	
	if (strpos($ftrcode,"-")===false){
			//รอบเริ่มต้น == รอบสิ้นสุด
			$ftrc[0]=$ftrcode;
			$ftrc[1]=$ftrcode;
	}else{
		$ftrc = explode('-',$ftrcode);
	}
	//echo "ss $strfdate :   $strtdate<br>";
if($ftrcode==""){
	rpdialog();
}else{
	
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a-->
<?
	if($_GET['bb'] == '7'){
		
	}
	else if($_GET['bb'] == '30'){
		
	}
	else if($_GET['bb'] == '60'){
		
	}
	else if($_GET['bb'] == '90'){
		
	}
	else{
		
	}
		require("connectmysql.php");
		$wwhere = ($fdate=="" ? " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' " : " a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ");

		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT a.rcode,a.mcode,m.name_t,a.mposi ";
		$sql .= ",CASE a.lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา' ELSE '' END as lr ";
		$sql .= "FROM ".$dbprefix."m90c a ";
		$sql .= "left join ".$dbprefix."member as m on (a.mcode=m.mcode) ";

		
 		if($ftrcode!=""&&$cmc!=""){
			$sql .= " WHERE a.upa_code='".$cmc."' and a.fdate >='".$fdate."' and a.tdate <='".$tdate."' and a.mcode != '".$cmc."'  ";
			if($_GET['bb'] == '7')$sql .= " and a.level = (SELECT IF(total_7 > 0,1,0) as level  FROM ali_m90_bonus WHERE rcode = a.rcode and mcode = a.upa_code) ";
			if($_GET['bb'] == '30')$sql .= " and a.level = (SELECT IF(total_30 > 0,2,0) as level  FROM ali_m90_bonus WHERE rcode = a.rcode and mcode = a.upa_code) ";
			if($_GET['bb'] == '60')$sql .= " and a.level = (SELECT IF(total_60 > 0,3,0) as level  FROM ali_m90_bonus WHERE rcode = a.rcode and mcode = a.upa_code) ";
			if($_GET['bb'] == '90')$sql .= " and a.level = (SELECT IF(total_90 > 0,4,0) as level  FROM ali_m90_bonus WHERE rcode = a.rcode and mcode = a.upa_code) ";
			if($_GET['bb'] == 'tt'){
				$sql .= " and (";
				$sql .= " a.level = (SELECT IF(total_7 > 0,1,0) as level  FROM ali_m90_bonus WHERE rcode = a.rcode and mcode = a.upa_code) ";
				$sql .= " or a.level = (SELECT IF(total_30 > 0,2,0) as level  FROM ali_m90_bonus WHERE rcode = a.rcode and mcode = a.upa_code) ";
				$sql .= " or a.level = (SELECT IF(total_60 > 0,3,0) as level  FROM ali_m90_bonus WHERE rcode = a.rcode and mcode = a.upa_code) ";
				$sql .= " or a.level = (SELECT IF(total_90 > 0,4,0) as level  FROM ali_m90_bonus WHERE rcode = a.rcode and mcode = a.upa_code) ";
				$sql .= " ) "; 
			}
			
			
		}
	//echo $sql;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" fdate ":$_GET['ord']);
		$rec->setLimitPage('5000');
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=$tab&sub=$sub&ftrcode=$ftrcode&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&cmc=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=$tab");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,mcode,name_t,mposi,lr");
		$rec->setFieldDesc("รอบที่,รหัสสมาชิก,ชื่อสมาชิก,Package-ตำแหน่ง,ด้าน");
		$rec->setFieldAlign("center,center,left,center,center");
		$rec->setFieldSpace("8%,10%,50%,15%,15%");//10
		$rec->setFieldFloatFormat(",,,,");
		$rec->setSum(true,false,",,,,");
		//$rec->setFieldLink(",,,,index.php?sessiontab=3&sub=666&aa=,");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","พิมพ์");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	
}	
?>