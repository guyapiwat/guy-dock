<?
session_start();
include_once("wording".$_SESSION["lan"].".php");
?><html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>MLM</title>
<link rel="stylesheet" type="text/css" href="./../style.css" />
<script language="javascript" type="text/javascript">
function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
}

	function saleadd(pcode,pdesc,price,pv){
		var place;
		var step;
		var skip = 55; //--
		var bgskip = 9; //fix
		var sumpv = 0;
		var sumtotal = 0;
		var out = true;
		var qp=0;
		var i=0;
		var num;var pdesc1;
		//var fcus;
		var showprice = 0;
		var showpv = 0;
		var style_l = "border-left:1 solid #FFFFFF;";
		var style_t = "border-top:1 solid #000000;";
		var style_b = "border-bottom:1 solid #000000;";
		var style_bd = "border-bottom:1 dashed #000000;";
		var hidden = "border-left-width:0;border-right-width:0;border-top-width:0;border-bottom-width:0;";
		/*if(window.parent.document.getElementById('sale').innerHTML==""){
			window.parent.document.getElementById('sale').innerHTML = "";
		}*/
		tag = window.parent.document.frm.getElementsByTagName('input');
		
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;<?=$wording_lan['tab2_billedit']['1_41']?>&nbsp; </font>";
		//alert(tag.length);
		place = "<table border='0' width='500' cellpading='0' cellspacing='0'>";
		place += "<tr align='center' bgcolor='#999999'>";
		place += "<td bgcolor='#99CCCC' style='"+style_l+style_t+style_b+"'>&nbsp;</td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_28']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_29']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_30']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_31']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_32']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_33']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_34']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_35']?></td>";
		place += "</tr>";
		for(i=0;i<(tag.length-skip)/8;i++){
			showprice = 0;
			showpv = 0;
			step = i*8+bgskip;
			place += "<tr>";
			place += "<td style='"+style_l+style_bd+"' align='center'>"
			place += "<input type='button' value='ลบ' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (i+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly type='text' style='text-align:center;"+hidden+ "' name='pcode[]' value='" + tag[step].value + "'></td>";
			pdesc1 = tag[++step].value;
			if(pcode == tag[i*8 +bgskip].value){
				out = false;
				pdesc1 = pdesc
			}
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + pdesc1 + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='"+hidden+ "text-align:right;' name='price[]' value='" + tag[++step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='"+hidden+ "text-align:right;' name='pv[]' value='" + tag[++step].value + "'></td>";
			num = parseFloat(tag[++step]. value);
			//alert(num);
			if(pcode == tag[i*8 +bgskip].value){
				out = false;
				sumpv = sumpv + parseFloat(pv);
				sumtotal = sumtotal + parseFloat(price);
				qp=1;
				num+=qp;
				//fcus = tag[i*8 +1];
				showprice = num*parseFloat(price);
				showpv = num*parseFloat(pv);
			}
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' style='text-align:right;' name='qty[]' type='text' size='5' value='" + num + "'  onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('<?=$wording_lan['tab2_billedit']['1_40']?>');this.value=1;cal();}\"></td>";
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' style='"+hidden+"' name='totalprice[]' value='" + (showprice==0?tag[step].value:showprice) + "'></td>";
			//place += "</tr>";
			sumtotal = sumtotal + parseFloat(tag[step].value);
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='text-align:right;"+hidden+ "' type='text' name='totalpv[]' value='" + (showpv==0?tag[step].value:showpv) + "'></td>";
			sumpv = sumpv + parseFloat(tag[step].value);

			place += "</tr>";
		}
		if(out){
		//alert(tag.length)
			place += "<tr>";//ssaledel(pcode,pdesc,price,pv)
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='<?=$wording_lan['tab2_billedit']['1_36']?>' onclick=\"saledel('" + pcode + "','" + pdesc + "','" + price + "','" + pv + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (i+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly type='text' style='text-align:center;"+hidden+ "' name='pcode[]' value='" + pcode + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + pdesc + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='price[]' value='" + price + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='pv[]' value='" + pv + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' name='qty[]' style='text-align:right;' type='text' size='5' value='1'  onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('ไม่สามารถใส่ค่า 0 หรือ ช่องว่างได้');this.value=1;cal();}\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalprice[]' value='" + price + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalpv[]' value='" + pv + "'></td>";
			place += "</tr>";
			sumpv = sumpv + parseFloat(pv);
			sumtotal = sumtotal + parseFloat(price);
		}
		place += "<tr bgcolor='#999999'>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='7'><?=$wording_lan['tab2_billedit']['1_84']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' id='sumtotal' name='sumtotal' id='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' id='sumpv' name='sumpv' id='sumpv' value='" + sumpv + "'></td>";
		place += "</tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='<?=$wording_lan['tab2_billedit']['1_37']?>' />&nbsp;<input type='submit' value='<?=$wording_lan['tab2_billedit']['1_38']?>' name='ok' id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=139'\" value='<?=$wording_lan['tab2_billedit']['1_39']?>' /></td></tr>";
		place += "</table>";
		window.parent.document.getElementById('sale').innerHTML = place;
		//fcus.focus();
		//alert(place);
	}
	
	function popUpImg(value1)
		{
			var pathImg = "../backoffice/uploads/product_img/"+value1+".jpg";
			document.getElementById('img1').src = pathImg;
			document.getElementById('light').style.display='block';
			document.getElementById('fade').style.display='block' ;
		}
	function closePopUpImg()
		{
			document.getElementById('light').style.display='none';
			document.getElementById('fade').style.display='none';
		}
</script> 
</head>
<body>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");
include("prefix.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

if($_SESSION["pos_check"] == 'MB')$_SESSION["pos_check1"] = "";
else $_SESSION["pos_check1"] = $_SESSION["pos_check"];

/*
$sql = "SELECT ".$dbprefix."product.pcode,concat(".$dbprefix."product.pdesc,'(','".$_SESSION["pos_check"]."',')') as pdesc,".$dbprefix."product.price".$_SESSION["pos_check1"]." as price,".$dbprefix."product.pv,".$dbprefix."productgroup.groupname FROM ".$dbprefix."product LEFT JOIN ".$dbprefix."productgroup  ON (".$dbprefix."productgroup.id=".$dbprefix."product.group_id  ) 
LEFT JOIN ".$dbprefix."product_invcode  ON (".$dbprefix."product_invcode.pcode=".$dbprefix."product.pcode)
where bf = 1 and ".$dbprefix."product.personel_price>0  ";

*/
$sql = "SELECT ".$dbprefix."product.pcode,".$dbprefix."product.pdesc,".$dbprefix."product.customer_price,".$dbprefix."product_invent.qty,'0' as pv,".$dbprefix."product.personel_price as price,".$dbprefix."productgroup.groupname ";
$sql .=",CASE ".$dbprefix."product.product_img WHEN '' THEN ".$dbprefix."product.pdesc ELSE CONCAT('<a href=javascript:onclick=popUpImg(',".$dbprefix."product.pdesc,');>',".$dbprefix."product.pdesc,'</a>') END AS pdesc1 ";
$sql .=" FROM ".$dbprefix."product LEFT JOIN ".$dbprefix."productgroup  ON (".$dbprefix."productgroup.id=".$dbprefix."product.group_id) LEFT JOIN ".$dbprefix."product_invent  ON (".$dbprefix."product.pcode=".$dbprefix."product_invent.pcode)  where bf = 1  and locationbase = '".$_SESSION["inv_locationbase"]."'  and ".$dbprefix."product.personel_price>0  ";
  
$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" ".$dbprefix."product.pcode ":$_GET['ord']);
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
$rec->setShowField("pcode,pdesc1,price,pv");
$rec->setFieldDesc($wording_lan["productshow"]["1"].",".$wording_lan["productshow"]["2"].",".$wording_lan["productshow"]["3"].",".$wording_lan["productshow"]["4"]."");
$rec->setFieldAlign("center,left,right,right,left");
//$rec->setFieldSpace("15%,45%,10%,10%,18%");
$rec->setFieldFloatFormat(",,2,0");

$rec->setFieldLink(",");
$rec->setSpecial("./images/add_pic.gif","","saleadd","pcode,pdesc,price,pv","IMAGE","");
$rec->setSearch("".$dbprefix."product.pcode,".$dbprefix."product.pdesc,".$dbprefix."product.personel_price,".$dbprefix."product.pv,groupname");
$rec->setSearchDesc($wording_lan["productshow"]["1"].",".$wording_lan["productshow"]["2"].",".$wording_lan["productshow"]["3"].",".$wording_lan["productshow"]["4"].",".$wording_lan["productshow"]["6"]."");
//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=2&state=1","post","delfield");
$rec->showRec(1,'SH_QUERY');
mysql_close($link);

?>
<div onclick=javascript:closePopUpImg(); id="fade" style="display: none;position: fixed;top: 0%;left: 0%; width: 100%; height: 100%;background-color: #CCCCCC;z-index:3; -moz-opacity: 0.8;opacity:.80;filter: alpha(opacity=80);" >
	
	</div>
	
	
	<div  id="light" style=" display: none;position: fixed;top: 20%;left: 15%; width:380; height:380; padding: 5px;border: 1px solid ;border-color:#666666;background-color: white;z-index:5;overflow: auto;" >
		<img src=''  id="img1" width="100%" height="100%" />
	</div>
</body>
</html>
