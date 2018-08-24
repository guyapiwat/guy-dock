<?  
//include("rpdialog.php");
rpdialog_package_amount($_GET['sub'],$fdate,$tdate,$sale,$s_list);
?><? require("date_picker.php"); ?>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<br />
<?
require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT  CASE WHEN pcode IS NULL THEN CONCAT('<b>',package,'</b>') ELSE pcode END  AS pcodes,
                CASE WHEN pcode IS NULL THEN CONCAT('<b>',ppdes,'</b>') ELSE pkpdesc END  AS pdescs,
                CASE WHEN pcode IS NULL THEN CONCAT('<b>',inv_code,'</b>') ELSE '' END  AS inv_codes,
                CASE WHEN pcode IS NULL THEN 
						(SELECT SUM(a.qty)
					    FROM ali_asaled a
					    LEFT JOIN ali_asaleh h ON ( h.id = a.sano )
					    WHERE  h.cancel=0 and package = a.pcode and  r.inv_code = a.inv_code ";
if($fdate!="")$sql .= " and h.sadate BETWEEN '$fdate' AND '$tdate' ";
$sql .= "       GROUP BY a.pcode) 
                ELSE allqty END  AS qtys
				,package
FROM (
    SELECT asd.inv_code as inv_code ,asd.pcode as package,p.pdesc as ppdes,pk.pcode as pcode,pk.pdesc as pkpdesc,pk.qty,SUM(asd.qty) as asdqty,SUM(asd.qty)*pk.qty  AS allqty                          
    FROM ali_asaled asd
    LEFT JOIN ali_asaleh ash ON ( ash.id = asd.sano )
    RIGHT JOIN ali_product_package1 pk ON ( asd.pcode = pk.package )
    LEFT JOIN ali_product_package p ON ( asd.pcode = p.pcode )
    WHERE  ash.cancel=0 ";
if($fdate!="")$sql .= "and ash.sadate BETWEEN '$fdate' AND '$tdate' ";
$sql .= "GROUP BY asd.pcode,asd.inv_code,pk.pcode
		WITH ROLLUP
    ) r   
	WHERE inv_code <> '' ";
if(!empty($_SESSION["admininvent"]))$sql .= " and inv_code = '".$_SESSION["admininvent"]."' ";
if(!empty($pcode))$sql .= " and package  = '$pcode' ";
$sql .= " ORDER BY package,inv_code,ifnull(pcode,-99999)";


if($_GET['print_all']==true){
	echo '<script type="text/javascript">
			function printDiv(divName) {
				 var printContents = document.getElementById(divName).innerHTML;
				 var originalContents = document.body.innerHTML;
				 document.body.innerHTML = printContents;
				 window.print();
			}
			 
			</script>
		';
	echo "<div id='divprint'>";
	
	include("print_package_sale.php");
	echo "</div>";
	 echo "<script type='application/javascript'>window.onload=function(){printDiv('divprint');}</script>";
	exit;
}
//echo $sql;
$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']);
$rec->setOrder($_GET['ord']);
//$rec->setLimitPage($_GET['lp']);
$rec->setLimitPage('ALL');
if(isset($_POST['skey']))
	$rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))
	$rec->setCause($_GET['skey'],$_GET['scause']);
$rec->setSize("95%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");
//$rec->setPageLinkShow(false,false);
$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&inv=$inv&pcode=$pcode");
$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("pcodes,pdescs,inv_codes,qtys");
$rec->setFieldFloatFormat(",,,,");
$rec->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,สาขา,จำนวน");
$rec->setFieldAlign("center,left,center,right,right");
$rec->setFieldSpace("15%,50%,15%,15%,15%,15%");
$rec->setSum(true,true,",,,,");
$str2 = "<fieldset ><a href='".$rec->getParam()."&print_all=true' target='_blank'>";
$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
$rec->setSpace($str2);
$rec->showRec(1,'SH_QUERY');
 

  
?>