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

		var place;
		var step;
		var skip = 15; //--
		var bgskip = 7; //fix
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
		var hidden1 = ";display:none;";
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
		place += "<td style='"+style_l+style_t+style_b+hidden1+"'>�Ҥ�</td>";
		place += "<td style='"+style_l+style_t+style_b+hidden1+"'>PV</td>";
		place += "<td style='"+style_l+style_t+style_b+hidden1+"'>BV</td>";
		place += "<td style='"+style_l+style_t+style_b+hidden1+"'>FV</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>�ӹǹ</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>����Ҥ�</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>���PV</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>���BV</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>���FV</td>";
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
			place += "<td style='"+style_l+style_bd+hidden1+"' align='right'><input size='8' readonly type='text' style='"+hidden+"text-align:right;' name='price[]' value='" + tag[++step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+hidden1+"' align='right'><input size='8' readonly type='text' style='"+hidden+"text-align:right;' name='pv[]' value='" + tag[++step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+hidden1+"' align='right'><input size='8' readonly type='text' style='"+hidden+"text-align:right;' name='bv[]' value='" + tag[++step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+hidden1+"' align='right'><input size='8' readonly type='text' style='"+hidden+"text-align:right;' name='fv[]' value='" + tag[++step].value + "'></td>";
			num = parseInt(tag[++step]. value);
			//alert(num);
			if(pcode == tag[i*12 +bgskip].value){
				out = false;
				sumpv = sumpv + parseInt(pv);
				sumbv = sumbv + parseInt(bv);
				sumfv = sumfv + parseInt(fv);
				sumtotal = sumtotal + parseInt(price);
				qp=1;
				num+=qp;
				//alert(sumtotal);
				//fcus = tag[i*8 +1];
				showprice = num*parseInt(price);
				showpv = num*parseInt(pv);
				showbv = num*parseInt(bv);
				showfv = num*parseInt(fv);
				
			}
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' style='text-align:right;' name='qty[]' type='text' size='5' value='" + num + "'  onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('�������ö����� 0 ���� ��ͧ��ҧ��');this.value=1;cal();}\"></td>";
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' style='"+hidden+"' name='totalprice[]' value='" + (showprice==0?tag[step].value:showprice) + "'></td>";
			//place += "</tr>";
			sumtotal = sumtotal + parseInt(tag[step].value);
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='text-align:right;"+hidden+ "' type='text' name='totalpv[]' value='" + (showpv==0?tag[step].value:showpv) + "'></td>";
			sumpv = sumpv + parseInt(tag[step].value);
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='text-align:right;"+hidden+ "' type='text' name='totalbv[]' value='" + (showpv==0?tag[step].value:showbv) + "'></td>";
			sumbv = sumbv + parseInt(tag[step].value);
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='text-align:right;"+hidden+ "' type='text' name='totalfv[]' value='" + (showpv==0?tag[step].value:showfv) + "'></td>";
			sumfv = sumfv + parseInt(tag[step].value);

			place += "</tr>";
		}
		if(out){
		//alert(tag.length)
			place += "<tr>";//ssaledel(pcode,pdesc,price,pv)
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ź' onclick=\"saledel('" + pcode + "','" + pdesc + "','" + price + "','" + pv + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (i+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly type='text' style='text-align:center;"+hidden+ "' name='pcode[]' value='" + pcode + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + pdesc + "'></td>";
			place += "<td style='"+style_l+style_bd+hidden1+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='price[]' value='" + price + "'></td>";
			place += "<td style='"+style_l+style_bd+hidden1+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='pv[]' value='" + pv + "'></td>";
			place += "<td style='"+style_l+style_bd+hidden1+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='bv[]' value='" + bv + "'></td>";
			place += "<td style='"+style_l+style_bd+hidden1+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='fv[]' value='" + fv + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' name='qty[]' style='text-align:right;' type='text' size='5' value='1'  onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('�������ö����� 0 ���� ��ͧ��ҧ��');this.value=1;cal();}\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalprice[]' value='" + price + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalpv[]' value='" + pv + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalbv[]' value='" + bv + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalfv[]' value='" + fv + "'></td>";
			place += "</tr>";
			sumpv = sumpv + parseInt(pv);
			sumbv = sumbv + parseInt(bv);
			sumfv = sumfv + parseInt(fv);
			sumtotal = sumtotal + parseInt(price);
	
		}
		if(<?=$_SESSION["ewallet"]?> < sumtotal){
						alert("point �ͧ�س�����§��");
						return;
					}
		place += "<tr bgcolor='#999999'>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='5'>���</td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' id='sumtotal'  name='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' id='sumpv'  name='sumpv' value='" + sumpv + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' id='sumbv'  name='sumbv' value='" + sumbv + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' id='sumfv' name='sumfv' value='" + sumfv + "'></td>";
		place += "</tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='<?=$wording_lan['tab4']['5_17']?>' />&nbsp;<input type='submit' value='<?=$wording_lan['tab4']['5_18']?>' name='ok' id='ok'  disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=6'\" value='<?=$wording_lan['tab4']['5_19']?>' /></td></tr>";
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
//$sql = "SELECT * FROM ".$dbprefix."product where price <> 0 and st = 1";
$sql = "SELECT * FROM ".$dbprefix."product_package where  price <> 0 and st = 1 and  loctionbase = '".$_SESSION["m_locationbase"]."' ";
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
$rec->setShowField("pdesc,price,pv");
$rec->setFieldDesc("��������´,�Ҥ�,PV");
$rec->setFieldAlign("left,right,right,right,right,right,right");
$rec->setFieldSpace("45%");
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