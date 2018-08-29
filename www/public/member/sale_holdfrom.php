<script language="javascript" type="text/javascript">
	function sale_print(id){
		//if(sa == '1'){var wlink = 'invoice_aprint.php?bid='+id;}
		//if(sa == '2'){var wlink = 'invoice_hprint.php?bid='+id;}
		wlink = 'invoice_hprint1.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
</script>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT ".$dbprefix."holdhead.cancel,".$dbprefix."holdhead.id,".$dbprefix."holdhead.inv_code,".$dbprefix."holdhead.hono,".$dbprefix."holdhead.sano,DATE_FORMAT(".$dbprefix."holdhead.sadate, '%Y-%m-%d') as sadate,".$dbprefix."holdhead.tot_pv,".$dbprefix."holdhead.total,".$dbprefix."holdhead.name_t,".$dbprefix."holdhead.mcode AS smcode,".$dbprefix."holdhead.uid,".$dbprefix."holdhead.sano ";
$sql .= $sqlWhere_satypeh1;
$sql .= " FROM ".$dbprefix."holdhead ";
$sql .= " WHERE ".$dbprefix."holdhead.mcode='".$_SESSION['usercode']."' and ".$dbprefix."holdhead.cancel = 0 ";

$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
if(isset($_POST['skey']))
	$rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))
	$rec->setCause($_GET['skey'],$_GET['scause']);
$rec->setSize("95%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");
//$rec->setPageLinkShow(false,false);
$rec->setLink($PHP_SELF,"sessiontab=4&sub=6");
$rec->setBackLink($PHP_SELF,"sessiontab=4");
if(isset($page))
	$rec->setCurPage($page);
$rec->setFieldFloatFormat(",,,2,");
$rec->setShowField("hono,preserve,sadate,tot_pv,uid");
$rec->setFieldDesc($wording_lan["tab4"]["9_1"].",".$wording_lan["productshow"]["7"].",".$wording_lan["tab4"]["9_4"].",".$wording_lan["tab4"]["9_5"].",".$wording_lan["tab4"]["9_10"]."");
$rec->setFieldAlign("center,center,center,right,center");
$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
$rec->setSum(true,false,",,,true,");
//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");     
$rec->showRec(1,'SH_QUERY');
	
	
?>
