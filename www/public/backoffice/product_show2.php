<html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>Hayashiinter</title>
<link rel="stylesheet" type="text/css" href="./../style.css" />
<script language="javascript" type="text/javascript">
	function saleadd(pcode,pdesc,price,pv,qty){
		var place;
		var step;
		var skip = 11; //--
		var bgskip = 7; //fix
		var sumpv = 0;
		var sumtotal = 0;
		var out = true;
		var qp=0;
		var i=0;
		var num;
		//var fcus;
		var showprice = 0;
		var showpv = 0;
		var style_l = "border-left:1 solid #FFFFFF;";
		var style_t = "border-top:1 solid #000000;";
		var style_b = "border-bottom:1 solid #000000;";
		var style_bd = "border-bottom:1 dashed #000000;";
		var hidden = "border-left-width:0;border-right-width:0;border-top-width:0;border-bottom-width:0;";
		doc= window.opener.document;
		doc.frm.p_code.value = pcode;
		doc.frm.p_desc.value = pdesc;
		doc.frm.p_qty.value = qty;
		window.close();
		//window.parent.document.getElementById('sale').innerHTML = place;
		//fcus.focus();
		//alert(place);
	}
</script> 
</head>
<body>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");
include("prefix.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT * FROM ".$dbprefix."product ";
$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" pcode ":$_GET['ord']);
$rec->setLimitPage($_GET['lp']);
if(isset($_POST['skey']))
	$rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))
	$rec->setCause($_GET['skey'],$_GET['scause']);
$rec->setSize("100%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");
//$rec->setPageLinkShow(false,false);
$rec->setLink($PHP_SELF,"sessiontab=3&sub=2");
$rec->setBackLink($PHP_SELF,"sessiontab=3");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("pcode,pdesc,qty,price,pv");
$rec->setFieldDesc("รหัส,รายละเอียด,คงเหลือ,ราคา,คะแนน");
$rec->setFieldAlign("center,left,center,right,right");
$rec->setFieldSpace("15%,35%,15%,15%,15%");
$rec->setFieldLink(",");
$rec->setSpecial("./images/add_pic.gif","","saleadd","pcode,pdesc,price,pv,qty","IMAGE","");
$rec->setSearch("pcode,pdesc,price,pv");
$rec->setSearchDesc("รหัส,รายละเอียด,คงเหลือ,ราคา,คะแนน");
$rec->setFieldFloatFormat(",,2,0");
//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=2&state=1","post","delfield");
$rec->showRec(1,'SH_QUERY');
mysql_close($link);

?>

</body>
</html>
