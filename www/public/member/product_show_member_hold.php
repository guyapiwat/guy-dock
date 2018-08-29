<?
session_start();
include_once("wording".$_SESSION["lan"].".php");
?><html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>MLM</title>
<link rel="stylesheet" type="text/css" href="./../style.css" />
<style type="text/css">
body p {
	color: #F00;
}
</style>
<script language="javascript" type="text/javascript">
function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
}

	function saleadd(pcode,pdesc,price,pv,qty){
		var place;
		var step;
		var skip = 95; //--
		var bgskip = 3; //fix
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
		
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;<?=$wording_lan['tab2_billedit']['1_41']?>&nbsp; </font>";
	//	alert(tag.length);
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
		for(i=0;i<(tag.length-skip)/9;i++){
			showprice = 0;
			showpv = 0;
			step = i*9+bgskip;
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
			//alert(pcode+'--'+tag[i*9+bgskip].value);
			if(pcode == tag[i*9 +bgskip].value){
				out = false;
				qp=1;
                if(num<qty){
                    num+=qp;
                    sumpv = sumpv + parseInt(pv);
                    sumtotal = sumtotal + parseInt(price);
                }else{
                    alert("จำนวนสินค้ามีไม่เพียงพอ");
                    num = qty;
                }
				
                //fcus = tag[i*8 +1];
                showprice = num*parseInt(price);
                showpv = num*parseInt(pv);
				
			}
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' style='text-align:right;' name='qty[]' type='text' size='5' value='" + num + "'  onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('<?=$wording_lan['tab2_billedit']['1_40']?>');this.value=1;cal();}\"></td>";
			step++;
			place += "<input type='hidden' name='lmqty[]' value='" + tag[step].value + "'></td>";
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
			if(qty<=0){
				alert("จำนวนสินค้าไม่เพียวพอ");
				return;
			}
			place += "<tr>";//ssaledel(pcode,pdesc,price,pv)
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ลบ' onclick=\"saledel('" + pcode + "','" + pdesc + "','" + price + "','" + pv + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (i+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly type='text' style='text-align:center;"+hidden+ "' name='pcode[]' value='" + pcode + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + pdesc + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='price[]' value='" + price + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='pv[]' value='" + pv + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' name='qty[]' style='text-align:right;' type='text' size='5' value='1'  onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('ไม่สามารถใส่ค่า 0 หรือ ช่องว่างได้');this.value=1;cal();}\">";
			place += "<input type='hidden' name='lmqty[]' value='" + qty + "'></td>";
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
		place += "<tr style='display:none'><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='<?=$wording_lan['tab2_billedit']['1_37']?>' />&nbsp;<input type='submit' value='<?=$wording_lan['tab2_billedit']['1_38']?>' name='okok' id='okok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=139'\" value='<?=$wording_lan['tab2_billedit']['1_39']?>' /></td></tr>";
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

/*$sql = "SELECT a.pcode,a.pv,a.bv,a.fv,a.price,a.pdesc,a.price,b.qty FROM ".$dbprefix."product a,".$dbprefix."product_invent b
where  a.pcode = b.pcode and b.inv_code = '".$_SESSION['inv_ref']."' and b.qty > 0";*/

$sql = "select * from (SELECT ".$dbprefix."asaled.pcode,".$dbprefix."asaled.pdesc,".$dbprefix."asaled.price,";
$sql .= $dbprefix."asaled.pv,(".$dbprefix."asaled.qty-IFNULL(SUM(".$dbprefix."holddesc.qty),0)) AS qty FROM ".$dbprefix."asaled ";//,(".$dbprefix."asaled.qty-".$dbprefix."holddesc.qty)
$sql .= "LEFT JOIN ".$dbprefix."asaleh ON (".$dbprefix."asaleh.id=".$dbprefix."asaled.sano) ";
$sql .= "LEFT JOIN ".$dbprefix."holdhead ON (".$dbprefix."asaled.sano=".$dbprefix."holdhead.sano and ".$dbprefix."holdhead.cancel=0 ) ";
$sql .= "LEFT JOIN ".$dbprefix."holddesc ";
$sql .= "ON (".$dbprefix."holdhead.hono=".$dbprefix."holddesc.hono AND ".$dbprefix."holddesc.pcode=".$dbprefix."asaled.pcode) ";
//$sql .= "LEFT JOIN ".$dbprefix."holddesc WHERE sano='".$_GET['bid']."' ";pcode,pdesc,price,pv,qty
$sql .= "WHERE ".$dbprefix."asaled.sano='".$_GET['bid']."'  and ".$dbprefix."asaleh.mcode = '".$_SESSION["usercode"]."' GROUP BY pcode) as a where a.qty > 0 ";
//and ".$dbprefix."asaleh.mcode = '".$_SESSION["usercode"]."'
//echo $sql;
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
$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&bid=".$_GET['bid']."");
$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
if(isset($page))
    $rec->setCurPage($page);
$rec->setShowField("pcode,pdesc,qty");
$rec->setFieldDesc("รหัส,รายละเอียด,จำนวน");
$rec->setFieldAlign("center,left,center,right,right");
$rec->setFieldSpace("20%,60%,20%");
$rec->setFieldLink(",");
$rec->setSpecial("./images/add_pic.gif","","saleadd","pcode,pdesc,price,pv,qty","IMAGE","");
$rec->setSearch("a.pcode,a.pdesc,a.price,a.pv");
$rec->setSearchDesc("รหัส,รายละเอียด,ราคา,คะแนน");
//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=2&state=1","post","delfield");
$rec->showRec(1,'SH_QUERY');
mysql_close($link);

?>

</body>
</html>