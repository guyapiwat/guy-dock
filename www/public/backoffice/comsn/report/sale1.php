<script language="javascript" type="text/javascript">
	
	function sale_print(id){
		
		var wlink = 'invoice_aprint_sale.php?bid='+id;
		
		window.open(wlink);
	
	}
	
	
	function sale_cancel(id){
		
		if(confirm("ต้องการยกเลิกบิลนี้")){
					
			window.location='index.php?sessiontab=3&sub=6&state=3&bid='+id;
		
		}
	
	}
	
		
	function sale_status(id){
		
	if(confirm("ต้องการเปลี่ยนแปลงจัดส่ง")){
			
		window.location='index.php?sessiontab=3&sub=6&state=6&sender='+id;
		}
	
	}
	</script>
<?

//require("./cls/repGenerator.php");
if(isset($_POST["ftrcode1"]))$ftrcode1 = $_POST["ftrcode1"];
else if(isset($_GET["ftrcode1"]))
	$ftrcode1 = $_GET["ftrcode1"];


if(isset($_POST["cmc"]))$mcode = $_POST["cmc"];
else if(isset($_GET["cmc"]))
	$mcode = $_GET["cmc"];
$mcode = $_SESSION["usercode"];
if (isset($_GET["strfdate"])){$strfdate=$_GET["strfdate"];} else {$strfdate="";}
if (isset($_GET["strtdate"])){$strtdate=$_GET["strtdate"];} else {$strtdate="";}
if (isset($_GET["fmcode"])){$fmcode=$_GET["fmcode"];} else {$fmcode="";}
if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if (isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="";}
require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}



$sql = "SELECT cancel,".$dbprefix."holdhead.id,".$dbprefix."holdhead.uid as uid,hono as sano ,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,total,ali_member.name_t,".$dbprefix."holdhead.mcode AS smcode1";

$sql .= ",'<img src=./images/false.gif>' AS sendsend ";

$sql .= ",CASE ".$dbprefix."holdhead.inv_code WHEN '' THEN 'บริษัท' ELSE ".$dbprefix."holdhead.inv_code END AS inv_code,'บิลขายแจงยอด' as type 
";
$sql .= ",'<img src=./images/false.gif>' AS asend ,".$dbprefix."member.pos_cur as por_cur ";
$sql .= "FROM ".$dbprefix."holdhead ";

$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."holdhead.mcode=".$dbprefix."member.mcode)  where cancel = 0 and (sa_type = 'A') ";

if(!empty($fmcode))$sql .= " and ".$dbprefix."holdhead.mcode = '$fmcode' " ;
if(!empty($mcode))$sql .= " and ".$dbprefix."holdhead.uid = '$mcode' " ;
if(!empty($strfdate))$sql .= " and ".$dbprefix."holdhead.sadate >= '".$strfdate."'  and ".$dbprefix."holdhead.sadate <= '".$strtdate."'  ";




//echo $sql;

		
	$rec = new repGenerator();
		
	$rec->setQuery($sql);
		
	$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		
	$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		
	$rec->setLimitPage($_GET['lp']);	
		
	if(isset($_POST['skey']))$rec->setCause($_POST['skey'],$_POST['scause']);
		
	else if(isset($_GET['skey']))$rec->setCause($_GET['skey'],$_GET['scause']);
		
	$rec->setSize("95%","");
		
	$rec->setAlign("center");
		
	$rec->setPageLinkAlign("right");
		
	$rec->setLink($PHP_SELF,"sessiontab=$tab&sub=$sub&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=$tab");
		
	if(isset($page))$rec->setCurPage($page);
		$rec->setShowField("sano,smcode1,name_t,sadate,type,tot_pv,total,uid");
	$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,ชนิด,PV,จำนวนเงินรวม,ผู้บันทึก");
		
	$rec->setFieldFloatFormat(",,,,,2,2,");
		$rec->setFieldAlign("center,center,left,center,center,right,right,right");
	
	$rec->setFieldSpace("10%,10%,30%,10%,10%,10%,10%,10%");
 		
	$rec->setSearch("sano,sadate,".$dbprefix."holdhead.mcode");
		
	$rec->setSearchDesc("เลขบิล,วันที่,รหัสผู้ซื้อ");
		
	$rec->setSum(true,false,",,,,,true,true,");
		
	$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		
	$rec->showRec(1,'SH_QUERY');
	
	


?>