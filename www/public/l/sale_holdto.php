<script language="javascript" type="text/javascript">
	function sale_print(id){
		//if(sa == '1'){var wlink = 'invoice_aprint.php?bid='+id;}
		//if(sa == '2'){var wlink = 'invoice_hprint.php?bid='+id;}
		wlink = '../invoice/hprint_sale_member.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
</script>
<?
require('rpdialog.php');
require("connectmysql.php");
require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

$sql = "SELECT cancel,id,sano,DATE_FORMAT(sadate, '%d-%m-%Y') as sadate,tot_pv,total,tabname.name_t,smcode,uid";
$sql = "SELECT ".$dbprefix."holdhead.cancel,".$dbprefix."holdhead.id,".$dbprefix."holdhead.inv_code,".$dbprefix."holdhead.hono,".$dbprefix."holdhead.sano,DATE_FORMAT(".$dbprefix."holdhead.sadate, '%d-%m-%Y') as sadate,".$dbprefix."holdhead.tot_pv,".$dbprefix."holdhead.total,".$dbprefix."holdhead.name_t,".$dbprefix."holdhead.mcode AS smcode,".$dbprefix."holdhead.uid,".$dbprefix."holdhead.sano ";
$sql .= $sqlWhere_satypeh1;
$sql .= "FROM ".$dbprefix."holdhead ";
$sql .=  " WHERE ".$dbprefix."holdhead.uid='".$_SESSION['usercode']."' and ".$dbprefix."holdhead.cancel = 0 ";
if($fdate !='' and $tdate !='')
{
	$sql.=" and ".$dbprefix."holdhead.sadate BETWEEN '$fdate' and '$tdate'";
}
if($sale !='')
{
	$sql.=" and ".$dbprefix."holdhead.cancel = '$sale'";
}


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
$rec->setLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&fdate=$fdate&tdate=$tdate&sale=$sale");
$rec->setBackLink($PHP_SELF,"sessiontab=4");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("hono,preserve,smcode,name_t,sadate,tot_pv");
$rec->setFieldFloatFormat(",,,,,2,2");
$rec->setFieldDesc($wording_lan["tab4"]["10_1"].",".$wording_lan["type"].",".$wording_lan["tab4"]["10_2"].",".$wording_lan["tab4"]["10_3"].",".$wording_lan["tab4"]["10_4"].",".$wording_lan["tab4"]["10_5"]."");
$rec->setFieldAlign("center,center,center,left,center,right,right,center");
$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","╬та╬Л");     
$rec->setSum(true,false,",,,,,true,true");
$rec->showRec(1,'SH_QUERY');
	
?>
