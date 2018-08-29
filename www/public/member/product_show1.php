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
	function saleadd(pcode,pdesc,price,pv){
		var place;
		var step;
		var skip = 45; //--
		var bgskip = 9; //fix
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
		/*if(window.parent.document.getElementById('sale').innerHTML==""){
			window.parent.document.getElementById('sale').innerHTML = "";
		}*/
		tag = window.parent.document.frm.getElementsByTagName('input');
		
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;<?=$wording_lan["tab4"]["1_41"]?>&nbsp; </font>";
		//alert(tag.length);
		place = "<table border='0' width='500' cellpading='0' cellspacing='0'>";
		place += "<tr align='center' bgcolor='#999999'>";
		place += "<td bgcolor='#99CCCC' style='"+style_l+style_t+style_b+"'>&nbsp;</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>ลำดับ</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รหัส</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รายละเอียด</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>ราคา</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>PV</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>จำนวน</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รวมราคา</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รวมPV</td>";
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
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + tag[++step].value + "'></td>";
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
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' style='text-align:right;' name='qty[]' type='text' size='5' value='" + num + "'  onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('ไม่สามารถใส่ค่า 0 หรือ ช่องว่างได้');this.value=1;cal();}\"></td>";
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
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ลบ' onclick=\"saledel('" + pcode + "','" + pdesc + "','" + price + "','" + pv + "')\"></td>";
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
				if(<?=$_SESSION["ewallet"]?> < sumtotal){
					//	alert("point ของคุณไม่เพียงพอ");
					//	return;
					}

		place += "<tr bgcolor='#999999'>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='7'>รวม</td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' id='sumtotal' name='sumtotal' id='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' id='sumpv' name='sumpv' id='sumpv' value='" + sumpv + "'></td>";
		place += "</tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='ตรวจสอบ' />&nbsp;<input type='submit' value='บันทึก' name='ok' id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=6'\" value='ยกเลิก' /></td></tr>";
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
$sql = "SELECT * FROM ".$dbprefix."product where price <> 0 and st = 1";
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
$rec->setShowField("pcode,pdesc,price,pv");
$rec->setFieldDesc("รหัส,รายละเอียด,ราคา,คะแนน");
$rec->setFieldAlign("center,left,center,right,right");
$rec->setFieldSpace("15%,50%,15%,15%");
$rec->setFieldLink(",");
$rec->setFieldFloatFormat(",,2,0");
$rec->setSpecial("./images/add_pic.gif","","saleadd","pcode,pdesc,price,pv","IMAGE","");
$rec->setSearch("pcode,pdesc,price,pv,groupname");
$rec->setSearchDesc("รหัส,รายละเอียด,ราคา,คะแนน,ประเภทผลิตภัณฑ์");
//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=2&state=1","post","delfield");
$rec->showRec(1,'SH_QUERY');
mysql_close($link);

?>

</body>
</html>
