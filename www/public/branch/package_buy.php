<? session_start(); ?>
<html>
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
	function saleadd(pcode,pdesc,price,pv,bv,fv){
		//alert('s');
		var place;
		var discount;
		var sumdiscount = 0;
		var step;
		var skip = 15; //--
		var bgskip = 9; //fix
		var sumpv = 0;
		var sumbv = 0;
		var sumfv = 0;
		var sumtotal = 0;
		var out = true;
		var qp=0;
		var i=0;
		var num;
		//var fcus;
		var showprice = 0;
		var showpv = 0;
		var showbv = 0;
		var showfv = 0;
		var style_l = "border-left:1 solid #FFFFFF;";
		var style_t = "border-top:1 solid #000000;";
		var style_b = "border-bottom:1 solid #000000;";
		var style_bd = "border-bottom:1 dashed #000000;";
		var hidden = "border-left-width:0;border-right-width:0;border-top-width:0;border-bottom-width:0;";
		var style_none = "display:none;";
		//discount = <?=$_SESSION["discount"]?>;
		discount =0;
		//price = price.replace(".0000","");  
		//price = price.replace("000",""); 
		/*if(window.parent.document.getElementById('sale').innerHTML==""){
			window.parent.document.getElementById('sale').innerHTML = "";
		}*/
		tag = window.parent.document.frm.getElementsByTagName('input');
		
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;��ԡ��Ǩ�ͺ���ͷӡ�õ�Ǩ�ͺ������&nbsp; </font>";
		//alert(tag.length);
		place = "<table border='0' width='500' cellpading='0' cellspacing='0'>";
		place += "<tr align='center' bgcolor='#999999'>";
		place += "<td bgcolor='#99CCCC' style='"+style_l+style_t+style_b+"'>&nbsp;</td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_8']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_9']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_10']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_11']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_12']?></td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"'><?=$wording_lan['ewallet_13']?></td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"'><?=$wording_lan['ewallet_14']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_15']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_16']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_17']?></td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"'><?=$wording_lan['ewallet_18']?></td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"'><?=$wording_lan['ewallet_19']?></td>";";
		place += "</tr>";
		for(i=0;i<(tag.length-skip)/12;i++){
			showprice = 0;
			showpv = 0;
			showbv = 0;
			showfv = 0;
			step = i*12+bgskip;
			place += "<tr>";
			place += "<td style='"+style_l+style_bd+"' align='center'>"
			place += "<input type='button' value='ź' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (i+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly type='text' style='text-align:center;"+hidden+ "' name='pcode[]' value='" + tag[step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + tag[++step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='"+hidden+ "text-align:right;' name='price[]' value='" + tag[++step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='"+hidden+ "text-align:right;' name='pv[]' value='" + tag[++step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly type='text' style='"+hidden+ "text-align:right;' name='bv[]' value='" + tag[++step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly type='text' style='"+hidden+ "text-align:right;' name='fv[]' value='" + tag[++step].value + "'></td>";
			num = parseFloat(tag[++step]. value);
			//alert(num);
			if(pcode == tag[i*12 +bgskip].value){
				out = false;
				sumpv = sumpv + parseFloat(pv);
				sumbv = sumbv + parseFloat(bv);
				sumfv = sumfv + parseFloat(fv);
				sumtotal = sumtotal + parseFloat(price);
				qp=1;
				num+=qp;
				//fcus = tag[i*8 +1];
				showprice = num*parseFloat(price);
				showpv = num*parseFloat(pv);
				showbv = num*parseFloat(bv);
				showfv = num*parseFloat(fv);
			}
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' style='text-align:right;' name='qty[]' type='text' size='5' value='" + num + "'   onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('�������ö����� 0 ���� ��ͧ��ҧ��');this.value=1;cal();}\" ></td>";
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' style='"+hidden+"' name='totalprice[]' value='" + (showprice==0?tag[step].value:showprice) + "'></td>";
			//place += "</tr>";
			sumtotal = sumtotal + parseFloat(tag[step].value);
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='text-align:right;"+hidden+ "' type='text' name='totalpv[]' value='" + (showpv==0?tag[step].value:showpv) + "'></td>";
			sumpv = sumpv + parseFloat(tag[step].value);
			step++;
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly style='text-align:right;"+hidden+ "' type='text' name='totalbv[]' value='" + (showpv==0?tag[step].value:showbv) + "'></td>";
			sumbv = sumbv + parseFloat(tag[step].value);
			step++;
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly style='text-align:right;"+hidden+ "' type='text' name='totalfv[]' value='" + (showpv==0?tag[step].value:showfv) + "'></td>";
			sumfv = sumfv + parseFloat(tag[step].value);

			place += "</tr>";
		}
		if(out){
		//alert(tag.length)
			place += "<tr>";//ssaledel(pcode,pdesc,price,pv)
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ź' onclick=\"saledel('" + pcode + "','" + pdesc + "','" + price + "','" + pv + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (i+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly type='text' style='text-align:center;"+hidden+ "' name='pcode[]' value='" + pcode + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + pdesc + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='price[]' value='" + price + "' readonly></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='pv[]' value='" + pv + "'></td>";
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='bv[]' value='" + bv + "'></td>";
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='fv[]' value='" + fv + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' name='qty[]' style='text-align:right;' type='text' size='5' value='1'   onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('�������ö����� 0 ���� ��ͧ��ҧ��');this.value=1;cal();}\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalprice[]' value='" + price + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalpv[]' value='" + pv + "'></td>";
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalbv[]' value='" + bv + "'></td>";
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalfv[]' value='" + fv + "'></td>";
			place += "</tr>";
			sumpv = sumpv + parseFloat(pv);
			sumbv = sumbv + parseFloat(bv);
			sumfv = sumfv + parseFloat(fv);
			
			sumtotal = sumtotal + parseFloat(price);
			//alert(<?=$_SESSION["total_discount"]?>);
			
		}
		//$_SESSION["inv_ewallet"] = 0;
		if(sumtotal >  <?=$_SESSION["inv_ewallet"]?>){
						alert("point �ͧ�س�����§��");
						return;
					}
		place += "<tr bgcolor='#999999'>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='7'> ���</td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' name='sumtotal' id='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' name='sumpv' id='sumpv' value='" + sumpv + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"' align='right'><input size='8' readonly type='text' style='text-align:right;' name='sumbv' value='" + sumbv + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"' align='right'><input size='8' readonly type='text' style='text-align:right;' name='sumfv' value='" + sumfv + "'></td>";
		place += "</tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='��Ǩ�ͺ' />&nbsp;<input type='submit' value='�ѹ�֡' name='ok' id='ok'  disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=6'\" value='¡��ԡ' /></td></tr>";
		place += "</table>";
		window.parent.document.getElementById('sale').innerHTML = place;
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
//$discount = $_SESSION["discount"];
$discount = 0;
$sql = "SELECT pcode,pdesc,price,pv,bv,fv FROM ".$dbprefix."product_package where   bf=1  and locationbase = '".$_SESSION["inv_locationbase"]."' ";
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
$rec->setFieldFloatFormat(",,2,2,2");
$rec->setPageLinkAlign("right");
//$rec->setPageLinkShow(false,false);
$rec->setLink($PHP_SELF,"sessiontab=3&sub=2");
$rec->setBackLink($PHP_SELF,"sessiontab=3");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("pcode,pdesc,price");
$rec->setFieldDesc($wording_lan["productshow"]["1"].",".$wording_lan["productshow"]["2"].",".$wording_lan["productshow"]["3"].",".$wording_lan["productshow"]["4"].",".$wording_lan["productshow"]["6"]."");
$rec->setFieldAlign("center,left,center,right,right");
$rec->setFieldSpace("15%,65%,20%");
$rec->setFieldLink(",");
$rec->setSpecial("./images/add_pic.gif","","saleadd","pcode,pdesc,price,pv,bv,fv","IMAGE","");
$rec->setFieldFloatFormat(",,2,0");
$rec->setSearch("pcode,pdesc,price,pv");
$rec->setSearchDesc("����,��������´,�Ҥ�,��ṹ");
//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=2&state=1","post","delfield");
$rec->showRec(1,'SH_QUERY');
mysql_close($link);

?>

</body>
</html>