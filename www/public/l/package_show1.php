<?
session_start();
require("connectmysql.php");
require("./cls/repGenerator.php");
include("prefix.php");
include("global.php");
include_once("wording".$_SESSION["lan"].".php");

?><html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>MLM</title>
<meta name="robots" content="noindex,nofollow">
<meta name="googlebot" content="noindex,noarchieve">
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="../assets/css/bootstrap.css" />
<link rel="stylesheet" href="../assets/css/font-awesome.css" />
<link rel="stylesheet" href="../assets/css/sweetalert.css" />

<!-- page specific plugin styles -->
<link rel="stylesheet" href="../assets/css/jquery-ui.css" />

<!-- page specific plugin styles -->

<!-- text fonts -->
<link rel="stylesheet" href="../assets/css/ace-fonts.css" />

<!-- ace styles -->
<link rel="stylesheet" href="../assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

<!--[if lte IE 9]>
	<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
<![endif]-->

<!--[if lte IE 9]>
  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
<![endif]-->

<!-- inline styles related to this page -->

<!-- ace settings handler -->
<script src="../assets/js/ace-extra.js"></script>

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]>
<script src="../assets/js/html5shiv.js"></script>
<script src="../assets/js/respond.js"></script>
<![endif]-->

<script src="../assets/js/sweetalert.min.js"></script>
<script>function aalert(text){swal("����ͼԴ��Ҵ", text, "error");}</script>
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
		var skip = 35; //--
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
		
		window.parent.document.getElementById('checkstate').innerHTML = "<div class='alert alert-danger'>��ԡ��Ǩ�ͺ���ͷӡ�õ�Ǩ�ͺ������ </div>";
		//alert(tag.length);
		place = "<table border='0' width='100%' class=' table table-striped table-condensed table-bordered table-hover cf'  cellpading='0' cellspacing='0'>";
		place += "<tr align='center' bgcolor='#999999'>";
		place += "<td bgcolor='#99CCCC' style='"+style_l+style_t+style_b+"'>&nbsp;</td>";
		
		place += "<td style='"+style_l+style_t+style_b+"'  class='visible-lg visible-md visible-sm'><?=$wording_lan['tab4']['1_28']?></td>";

		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_29']?></td>";

		place += "<td style='"+style_l+style_t+style_b+"'  class='visible-lg visible-md visible-sm'><?=$wording_lan['tab4']['1_30']?></td>";

		place += "<td style='"+style_l+style_t+style_b+"'   class='visible-lg visible-md visible-sm'><?=$wording_lan['tab4']['1_31']?></td>";

		place += "<td style='"+style_l+style_t+style_b+"'   class='visible-lg visible-md visible-sm'><?=$wording_lan['tab4']['1_32']?></td>";

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
			place += "<input type='button' value='<?=$wording_lan['tab4']['1_36']?>' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";

			place += "<td style='"+style_l+style_bd+"'   class='visible-lg visible-md visible-sm' align='center'>" + (i+1) + "</td>";

			place += "<td style='"+style_l+style_bd+"' align='center'><input size='6' readonly type='text' style='text-align:center;"+hidden+ "' name='pcode[]' value='" + tag[step].value + "'></td>";

			place += "<td class='visible-lg visible-md visible-sm' style='"+style_l+style_bd+"' align='left'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + tag[++step].value + "'></td>";

			place += "<td class='visible-lg visible-md visible-sm' style='"+style_l+style_bd+"' align='right'><input size='5' readonly type='text' style='"+hidden+ "text-align:right;' name='price[]' value='" + tag[++step].value + "'></td>";

			place += "<td class='visible-lg visible-md visible-sm' style='"+style_l+style_bd+"' align='right'><input size='5' readonly type='text' style='"+hidden+ "text-align:right;' name='pv[]' value='" + tag[++step].value + "'></td>";
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
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' style='text-align:right;' name='qty[]' type='text' size='4' value='" + num + "'   onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('<?=$wording_lan['tab4']['1_40']?>');this.value=1;cal();}\"></td>";
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='5' readonly type='text' style='text-align:right;"+hidden+ "' style='"+hidden+"' name='totalprice[]' value='" + (showprice==0?tag[step].value:showprice) + "'></td>";
			//place += "</tr>";
			sumtotal = sumtotal + parseFloat(tag[step].value);
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='5' readonly style='text-align:right;"+hidden+ "' type='text' name='totalpv[]' value='" + (showpv==0?tag[step].value:showpv) + "'></td>";
			sumpv = sumpv + parseFloat(tag[step].value);

			place += "</tr>";
		}
		if(out){
		//alert(tag.length)
			place += "<tr>";//ssaledel(pcode,pdesc,price,pv)
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='<?=$wording_lan['tab4']['1_36']?>' onclick=\"saledel('" + pcode + "','" + pdesc + "','" + price + "','" + pv + "')\"></td>";
			place += "<td class='visible-lg visible-md visible-sm' style='"+style_l+style_bd+"' align='center'>" + (i+1) + "</td>";

			place += "<td style='"+style_l+style_bd+"' align='center'><input size='6' readonly type='text' style='text-align:center;"+hidden+ "' name='pcode[]' value='" + pcode + "'></td>";

			place += "<td class='visible-lg visible-md visible-sm' style='"+style_l+style_bd+"' align='left'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + pdesc + "'></td>";

			place += "<td class='visible-lg visible-md visible-sm' style='"+style_l+style_bd+"' align='right'><input size='5' readonly type='text' style='text-align:right;"+hidden+ "' name='price[]' value='" + price + "'></td>";
			place += "<td class='visible-lg visible-md visible-sm' style='"+style_l+style_bd+"' align='right'><input size='5' readonly type='text' style='text-align:right;"+hidden+ "' name='pv[]' value='" + pv + "'></td>";

			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' name='qty[]' style='text-align:right;' type='text' size='4' value='1'  onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('<?=$wording_lan['tab4']['1_40']?>');this.value=1;cal();}\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='5' readonly type='text' style='text-align:right;"+hidden+ "' name='totalprice[]' value='" + price + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='5' readonly type='text' style='text-align:right;"+hidden+ "' name='totalpv[]' value='" + pv + "'></td>";
			place += "</tr>";
			sumpv = sumpv + parseFloat(pv);
			sumtotal = sumtotal + parseFloat(price);
		}
				if(<?=$_SESSION["ewallet"]?> < sumtotal){
					//	alert("point �ͧ�س�����§��");
					//	return;
					}

		place += "<tr>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' class='visible-lg visible-md visible-sm'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' class='visible-lg visible-md visible-sm'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' class='visible-lg visible-md visible-sm'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' class='visible-lg visible-md visible-sm'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='3'><?=$wording_lan['tab5']['3_15']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='5' readonly type='text' style='text-align:right;' id='sumtotal' name='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='5' readonly type='text' style='text-align:right;' id='sumpv' name='sumpv' value='" + sumpv + "'></td>";
		place += "</tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='<?=$wording_lan['tab4']['5_17']?>' />&nbsp;<input type='submit' value='<?=$wording_lan['tab4']['5_18']?>' name='ok' id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=4&sub=1'\" value='<?=$wording_lan['tab4']['5_19']?>' /></td></tr>";
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

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT * ,CASE product_img WHEN '' THEN pdesc ELSE CONCAT('<a href=javascript:onclick=popUpImg(',product_img,');>',pdesc,'</a>') END AS pdesc1 FROM ".$dbprefix."product where price <> 0 and st = 1 and locationbase = '".$_SESSION["m_locationbase"]."' ";
$sql = "SELECT * FROM ".$dbprefix."product_package where  price <> 0 and st = 1 and locationbase = '".$_SESSION["m_locationbase"]."' ";
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
$rec->setLink($PHP_SELF,"sessiontab=3&sub=2");
$rec->setBackLink($PHP_SELF,"sessiontab=3");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("pcode,pdesc,price,pv");
$rec->setFieldDesc($wording_lan["productshow"]["1"].",".$wording_lan["productshow"]["2"].",".$wording_lan["productshow"]["3"].",".$wording_lan["productshow"]["4"]."");
$rec->setFieldAlign("center,left,center,right,right");
$rec->setFieldSpace("15%,50%,15%,15%");
$rec->setFieldLink(",");
$rec->setFieldFloatFormat(",,2,0");
$rec->setSpecial("./images/add_pic.gif","","saleadd","pcode,pdesc,price,pv","IMAGE","");
$rec->setSearch("pcode,pdesc,price,pv");
$rec->setSearchDesc($wording_lan["productshow"]["1"].",".$wording_lan["productshow"]["2"].",".$wording_lan["productshow"]["3"].",".$wording_lan["productshow"]["4"]."");
//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=2&state=1","post","delfield");
$rec->showRec(1,'SH_QUERY');
mysql_close($link);

?>
<div  id="fade" style="display: none;position: fixed;top: 0%;left: 0%; width: 100%; height: 100%;background-color: #CCCCCC;z-index:3; -moz-opacity: 0.8;opacity:.80;filter: alpha(opacity=80);" >
	<img src="../backoffice/uploads/product_img/close.png" onclick=javascript:closePopUpImg(); style="position: absolute;right:5px;top:5px;cursor:pointer;">
	</div>
	
	
	<div  id="light" style=" display: none;position: fixed;top: 20%;left: 15%; width:380; height:380; padding: 5px;border: 1px solid ;border-color:#666666;background-color: white;z-index:5;overflow: auto;" >
		<img src=''  id="img1" width="100%" height="100%" />
	</div>


</body>
</html>
