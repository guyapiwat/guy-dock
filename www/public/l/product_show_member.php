<?
session_start();
?><html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>netman pro</title>
<link rel="stylesheet" type="text/css" href="./../style.css" />
<script language="javascript" type="text/javascript">
	function saleadd(pcode,pdesc,price,pv,bv,fv,qty){
		var place;
		var step;
		var skip = 100; //--
		var bgskip = 3; //fix
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
		/*if(window.parent.document.getElementById('sale').innerHTML==""){
			window.parent.document.getElementById('sale').innerHTML = "";
		}*/
		tag = window.parent.document.frm.getElementsByTagName('input');
		
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;��ԡ��Ǩ�ͺ���ͷӡ�õ�Ǩ�ͺ������&nbsp; </font>";
		//alert(tag.length);
		place = "<table border='0' width='500' cellpading='0' cellspacing='0'>";
		place += "<tr align='center' bgcolor='#999999'>";
		place += "<td bgcolor='#99CCCC' style='"+style_l+style_t+style_b+"'>&nbsp;</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>�ӴѺ</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>����</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>��������´</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>�Ҥ�</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>PV</td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"'>BV</td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"'>FV</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>�ӹǹ</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>����Ҥ�</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>���PV</td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"'>���bV</td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"'>���fV</td>";
		place += "</tr>";
		for(i=0;i<(tag.length-skip)/13;i++){
			showprice = 0;
			showpv = 0;
			showbv = 0;
			showfv = 0;
			step = i*13+bgskip;
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
			num = parseInt(tag[++step]. value);
			//alert(num);
			if(pcode == tag[i*13 +bgskip].value){
				out = false;
				
				qp=1;
				//if(num<qty){
					num+=qp;
					sumpv = sumpv + parseInt(pv);
					sumbv = sumbv + parseInt(bv);
					sumfv = sumfv + parseInt(fv);
					sumtotal = sumtotal + parseInt(price);
				//}else{
				//	alert("�ӹǹ�Թ����������§��");
					//num = qty;
				//}
				//fcus = tag[i*8 +1];
				showprice = num*parseInt(price);
				showpv = num*parseInt(pv);
				showbv = num*parseInt(bv);
				showfv = num*parseInt(fv);
			}
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' style='text-align:right;' name='qty[]' type='text' size='5' value='" + num + "' readonly></td>";
			/*place += "<td style='"+style_l+style_bd+"' align='right'><input size='5' readonly type='text' style='text-align:right;"+hidden+ "' style='"+hidden+"' name='qty[]' id='qty[]' value='" + num + "'></td>";*/

			step++;
			place += "<input type='hidden' name='lmqty[]' value='" + tag[step].value + "'></td>";
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' style='"+hidden+"' name='totalprice[]' value='" + (showprice==0?tag[step].value:showprice) + "'></td>";
			//place += "</tr>";
			sumtotal = sumtotal + parseInt(tag[step].value);
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='text-align:right;"+hidden+ "' type='text' name='totalpv[]' value='" + (showpv==0?tag[step].value:showpv) + "'></td>";
			sumpv = sumpv + parseInt(tag[step].value);
			step++;
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly style='text-align:right;"+hidden+ "' type='text' name='totalbv[]' value='" + (showpv==0?tag[step].value:showbv) + "'></td>";
			sumbv = sumbv + parseInt(tag[step].value);
			step++;
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly style='text-align:right;"+hidden+ "' type='text' name='totalfv[]' value='" + (showpv==0?tag[step].value:showfv) + "'></td>";
			sumfv = sumfv + parseInt(tag[step].value);

			place += "</tr>";
		}
		if(out){
		//alert(tag.length)
					//if(qty<=0){
					//	alert("�ӹǹ�Թ���������Ǿ�");
					//	return;
					//}

			place += "<tr>";//ssaledel(pcode,pdesc,price,pv)
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ź' onclick=\"saledel('" + pcode + "','" + pdesc + "','" + price + "','" + pv + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (i+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly type='text' style='text-align:center;"+hidden+ "' name='pcode[]' value='" + pcode + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + pdesc + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='price[]' value='" + price + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='pv[]' value='" + pv + "'></td>";
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='bv[]' value='" + bv + "'></td>";
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='fv[]' value='" + fv + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' name='qty[]' style='text-align:right;' type='text' size='5' value='1' readonly></td>";
			place += "<input type='hidden' name='lmqty[]' value='" + qty + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalprice[]' value='" + price + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalpv[]' value='" + pv + "'></td>";
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalbv[]' value='" + bv + "'></td>";
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalfv[]' value='" + fv + "'></td>";
			place += "</tr>";
			sumpv = sumpv + parseInt(pv);
			sumbv = sumbv + parseInt(bv);
			sumfv = sumfv + parseInt(fv);
			sumtotal = sumtotal + parseInt(price);
		}
		place += "<tr bgcolor='#999999'>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='7'>���</td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' name='sumtotal' id='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' name='sumpv'  id='sumpv'  value='" + sumpv + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"' align='right'><input size='8' readonly type='text' style='text-align:right;' name='sumbv'  id='sumbv' value='" + sumbv + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"' align='right'><input size='8' readonly type='text' style='text-align:right;' name='sumfv'  id='sumfv' value='" + sumfv + "'></td>";
		place += "</tr>";
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
$sql = "SELECT * ,CASE product_img WHEN '' THEN pdesc ELSE CONCAT('<a href=javascript:onclick=popUpImg(',product_img,');>',pdesc,'</a>') END AS pdesc1 FROM ".$dbprefix."product where price <> 0 and st = 1 and locationbase = '".$_SESSION["m_locationbase"]."' ";
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
$rec->setLink($PHP_SELF,"sessiontab=3&sub=6");
$rec->setBackLink($PHP_SELF,"sessiontab=3");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("pcode,pdesc,price,pv");
$rec->setFieldDesc("����,��������´,�Ҥ�,pv");
$rec->setFieldAlign("center,left,center,right,right");
$rec->setFieldSpace("20%,60%,20%");
$rec->setFieldLink(",");
$rec->setSpecial("./images/add_pic.gif","","saleadd","pcode,pdesc,price,pv,bv,fv,qty","IMAGE","");
$rec->setSearch("a.pcode,a.pdesc,a.price,a.pv");
$rec->setSearchDesc("����,��������´,�Ҥ�,��ṹ");
//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=2&state=1","post","delfield");
$rec->showRec(1,'SH_QUERY');
mysql_close($link);

?>

</body>
</html>