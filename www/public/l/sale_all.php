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

require("./cls/repGenerator.php");
if(isset($_POST["ftrcode1"]))$ftrcode1 = $_POST["ftrcode1"];
else if(isset($_GET["ftrcode1"]))
	$ftrcode1 = $_GET["ftrcode1"];


$wwhere = " a.rcode between '".$ftrcode1."' and '".$ftrcode1."' ";
$sql="select min(fdate) as fdate1,max(tdate) as tdate1 from ".$dbprefix."around a where  $wwhere  ";

$result=mysql_query($sql);

if (mysql_num_rows($result)>'0') {
	
	$row= mysql_fetch_array($result, MYSQL_ASSOC);
	
	$fdate=$row["tdate1"];
	$tdate=$row["fdate1"];

}

if(isset($_POST["cmc"]))$mcode = $_POST["cmc"];
else if(isset($_GET["cmc"]))
	$mcode = $_GET["cmc"];
//$mcode = $_SESSION["usercode"];

require("connectmysql.php");
$isline = isLine($dbprefix,$mcode,$_SESSION["usercode"]);
if($isline == false){
 exit;
}
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}


$sql="SELECT sano,mcode,name_t,sadate,CASE sa_type WHEN 'A' THEN 'บิลปกติ'  WHEN 'B' THEN 'รักษายอด' WHEN 'VA' THEN 'special point' END AS ability,tot_pv,total,uid FROM
(SELECT ah.sano as sano,ah.mcode as mcode,m.name_t as name_t,ah.sadate as sadate,ah.sa_type as sa_type,ah.tot_pv as tot_pv,ah.total as total,ah.uid as uid FROM ali_asaleh ah LEFT JOIN ali_member m ON(ah.mcode=m.mcode) WHERE (ah.sa_type='A' OR ah.sa_type='B') AND ah.cancel=0";
if($mcode!="") $sql.=" AND ah.mcode='$mcode'";
$sql.="
UNION  ALL
SELECT ho.hono as sano,ho.mcode as mcode,m.name_t as name_t,ho.sadate as sadate,ho.sa_type as sa_type,ho.tot_pv as tot_pv,ho.total as total,ho.uid as uid FROM ali_holdhead ho LEFT JOIN ali_member m ON(ho.mcode=m.mcode) WHERE (ho.sa_type='A' OR ho.sa_type='B') AND ho.cancel=0";
if($mcode!="") $sql.=" AND ho.mcode='$mcode'";
$sql.="
UNION  ALL
SELECT sp.id as sano,sp.mcode as mcode,m.name_t as name_t,sp.sadate as sadate,sp.sa_type as sa_type,sp.tot_pv as tot_pv,0 as total,sp.uid as uid FROM ali_special_point sp LEFT JOIN ali_member m ON(sp.mcode=m.mcode) WHERE sp.sa_type='VA'";
if($mcode!="") $sql.=" AND sp.mcode='$mcode'";
$sql.=") as a ";




		
	$rec = new repGenerator();
		
	$rec->setQuery($sql);
		
	$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		
	$rec->setOrder($_GET['ord']==""?" sano ":$_GET['ord']);
		
	$rec->setLimitPage($_GET['lp']);	
		
	if(isset($_POST['skey']))$rec->setCause($_POST['skey'],$_POST['scause']);
		
	else if(isset($_GET['skey']))$rec->setCause($_GET['skey'],$_GET['scause']);
		
	$rec->setSize("95%","");
		
	$rec->setAlign("center");
		
	$rec->setPageLinkAlign("right");
		
	$rec->setLink($PHP_SELF,"sessiontab=4&sub=38");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		
	if(isset($page))$rec->setCurPage($page);
		$rec->setShowField("sano,mcode,name_t,sadate,ability,tot_pv,total,uid");
	$rec->setFieldDesc($wording_lan["tab4"]["10_1"].",".$wording_lan["tab4"]["10_2"].",".$wording_lan["tab4"]["10_3"].",".$wording_lan["tab4"]["10_4"].",".$wording_lan["type"].",".$wording_lan["tab4"]["3_7"].",".$wording_lan["tab4"]["10_6"].",".$wording_lan["tab4"]["10_10"]);
		
	$rec->setFieldFloatFormat(",,,,,2,2,");
		$rec->setFieldAlign("center,center,left,center,center,right,right,right");
	
	//$rec->setFieldSpace("10%,10%,30%,10%,10%,10%,10%,10%");
 		
	//$rec->setSearch("sano,sadate,mcode");
		
	//$rec->setSearchDesc($wording_lan["tab4"]["10_1"].",".$wording_lan["tab4"]["10_4"].",".$wording_lan["tab4"]["10_2"]);
		
	$rec->setSum(true,false,",,,,,true,true,");
		
	$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		
	$rec->showRec(1,'SH_QUERY');
	
	
 function isLine($dbprefix,$scode,$testcode){
		$sql = "SELECT upa_code FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
		$rs = mysql_query($sql);
		if($scode==$testcode)
			return true;
		if(mysql_num_rows($rs)<=0)
			return false;
		else if(mysql_result($rs,0,'upa_code')!=$testcode)
			return isLine($dbprefix,mysql_result($rs,0,'upa_code'),$testcode);
		else
			return true;
	}

?>