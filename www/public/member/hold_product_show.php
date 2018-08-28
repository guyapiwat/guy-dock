<?
session_start();
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
<script>function aalert(text){swal("พบข้อผิดพลาด", text, "error");}</script>

<script language="javascript" type="text/javascript">
function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
}
	function holdadd(pcode,pdesc,price,pv,qty){
		var place;
		var step;
		var skip = 12; //--
		var bgskip = 8; //fix
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
		
		window.parent.document.getElementById('checkstate').innerHTML = "<div class='alert alert-danger'>คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล </div>";
		//aalert(tag.length);
		place = "<table border='0' width='100%' class=' table table-striped table-condensed table-bordered table-hover cf'  cellpading='0' cellspacing='0'>";
		place += "<tr align='center' bgcolor='#999999'>";
		place += "<td bgcolor='' style='"+style_l+style_t+style_b+"'>&nbsp;</td>";
		place += "<td style='"+style_l+style_t+style_b+"'  class='visible-lg visible-md visible-sm '>ลำดับ</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รหัส</td>";
		place += "<td style='"+style_l+style_t+style_b+"' class='visible-lg visible-md visible-sm'>รายละเอียด</td>";
		place += "<td style='"+style_l+style_t+style_b+"' class='visible-lg visible-md visible-sm'>ราคา</td>";
		place += "<td style='"+style_l+style_t+style_b+"' class='visible-lg visible-md visible-sm'>PV</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>จำนวน</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รวมราคา</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รวมPV</td>";
		place += "</tr>";
		for(i=0;i<(tag.length-skip)/9;i++){
			showprice = 0;
			showpv = 0;
			step = i*9+bgskip;
			place += "<tr>";
			place += "<td style='"+style_l+style_bd+"' align='center'>"
			place += "<input class='btn btn-sm btn-danger' type='button' value='ลบ' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center' class='visible-lg visible-md visible-sm'>" + (i+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='6' readonly type='text' style='text-align:center;"+hidden+ "' name='pcode[]' value='" + tag[step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'  class='visible-lg visible-md visible-sm'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + tag[++step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right' class='visible-lg visible-md visible-sm'><input size='5' readonly type='text' style='"+hidden+ "text-align:right;' name='price[]' value='" + tag[++step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right' class='visible-lg visible-md visible-sm'><input size='5' readonly type='text' style='"+hidden+ "text-align:right;' name='pv[]' value='" + tag[++step].value + "'></td>";
			num = parseInt(tag[++step]. value);
			//aalert(num);
			if(pcode == tag[i*9 +bgskip].value){
				out = false;
				qp=1;
				if(num<qty){
					num+=qp;
					sumpv = sumpv + parseInt(pv);
					sumtotal = sumtotal + parseInt(price);
				}else{
					aalert("จำนวนสินค้ามีไม่เพียงพอ");
					//num = qty;
				}
				//fcus = tag[i*8 +1];
				showprice = num*parseInt(price);
				showpv = num*parseInt(pv);
			}
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' style='text-align:right;' name='qty[]' type='text' size='4' value='" + num + "'  onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){aalert('ไม่สามารถใส่ค่า 0 หรือ ช่องว่างได้');this.value=1;cal();}\" >";
			step++;
			place += "<input type='hidden' name='lmqty[]' value='" + tag[step].value + "'></td>";
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='5' readonly type='text' style='text-align:right;"+hidden+ "' style='"+hidden+"' name='totalprice[]' value='" + (showprice==0?tag[step].value:showprice) + "'></td>";
			//place += "</tr>";
			sumtotal = sumtotal + parseInt(tag[step].value);
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='5' readonly style='text-align:right;"+hidden+ "' type='text' name='totalpv[]' value='" + (showpv==0?tag[step].value:showpv) + "'></td>";
			sumpv = sumpv + parseInt(tag[step].value);

			place += "</tr>";
		}
		if(out){
		//aalert(tag.length)
			if(qty<=0){
				aalert("จำนวนสินค้าไม่เพียวพอ");
				return;
			}
			
			place += "<tr>";//ssaledel(pcode,pdesc,price,pv)
			place += "<td style='"+style_l+style_bd+"' align='center'><input  class='btn btn-sm btn-danger' type='button' value='ลบ' onclick=\"saledel('" + pcode + "','" + pdesc + "','" + price + "','" + pv + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'  class='visible-lg visible-md visible-sm'>" + (i+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='6' readonly type='text' style='text-align:center;"+hidden+ "' name='pcode[]' value='" + pcode + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left' class='visible-lg visible-md visible-sm'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + pdesc + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right' class='visible-lg visible-md visible-sm'><input size='5' readonly type='text' style='text-align:right;"+hidden+ "' name='price[]' value='" + price + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right' class='visible-lg visible-md visible-sm'><input size='5' readonly type='text' style='text-align:right;"+hidden+ "' name='pv[]' value='" + pv + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' name='qty[]' style='text-align:right;' type='text' size='4' value='1'  onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){aalert('ไม่สามารถใส่ค่า 0 หรือ ช่องว่างได้');this.value=1;cal();}\">";
			place += "<input type='hidden' name='lmqty[]' value='" + qty + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='5' readonly type='text' style='text-align:right;"+hidden+ "' name='totalprice[]' value='" + price + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='5' readonly type='text' style='text-align:right;"+hidden+ "' name='totalpv[]' value='" + pv + "'></td>";
			place += "</tr>";
			sumpv = sumpv + parseInt(pv);
			sumtotal = sumtotal + parseInt(price);
		}
		place += "<tr>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' class='visible-lg visible-md visible-sm'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' class='visible-lg visible-md visible-sm'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' class='visible-lg visible-md visible-sm'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' class='visible-lg visible-md visible-sm'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='3'>รวม</td>";

		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='5' readonly type='text' style='text-align:right;' name='sumtotal'  id='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='5' readonly type='text' style='text-align:right;' name='sumpv'  id='sumpv' value='" + sumpv + "'></td>";
		place += "</tr>";
		place += "<tr bgcolor='#e0e0e0'><td colspan='9' align='right'><input class='btn btn-sm btn-primary' name='button' id='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='ตรวจสอบ' />&nbsp;<input class='btn btn-sm btn-success' type='submit' value='บันทึก' id='ok' name='ok'  disabled='disabled' />&nbsp;<input class='btn btn-sm btn-danger' name='reset' id='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=4&sub=3'\" value='ยกเลิก' /></td></tr>";
		place += "</table>";
		window.parent.document.getElementById('sale').innerHTML = place;
		//fcus.focus();
		//aalert(place);
	}
</script> 
</head>
<body>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");
include("prefix.php");
include_once("wording".$_SESSION["lan"].".php"); 
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if (isset($_GET["bid"])){$bid=$_GET["bid"];} else {$bid="";}

$sql = "SELECT id,pcode,pdesc,price,pv,SUM(qty) as asdqty,SUM(useqty)  as useqty,(SUM(qty)-SUM(useqty)) as qty FROM ";
$sql .= "(SELECT asd.id as id,pcode,pdesc,price,pv,SUM(qty) as qty,0 as useqty ";
$sql .= "FROM  ali_asaled asd  ";
$sql .= "LEFT JOIN ali_asaleh ash ON(ash.cancel=0 and ash.id=asd.sano) ";
$sql .= "WHERE asd.sano ='{$_GET['bid']}' and ash.mcode = '{$_SESSION["usercode"]}'  ";
$sql .= "GROUP BY asd.pcode,asd.price "; 
$sql .= "UNION ALL  "; 
$sql .= "SELECT '' as id,pcode,pdesc,price,pv,0 as qty,IFNULL(SUM(qty),0) as useqty ";
$sql .= "FROM  ali_holddesc hod  ";
$sql .= "LEFT JOIN ali_holdhead hoh ON(hoh.cancel=0 and hoh.id=hod.hono) ";
$sql .= "WHERE hoh.sano ='{$_GET['bid']}' ";
$sql .= "GROUP BY hod.pcode,hod.price ";
$sql .= ") as aa ";
$sql .= "GROUP BY aa.pcode,aa.price "; 
$sql .= "HAVING (SUM(qty)-SUM(useqty))>0 and pv > 0 "; 

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
$rec->setPageLinkShow(false,false);
$rec->setLink($PHP_SELF,"sessiontab=3&sub=2&bid=$bid");
$rec->setBackLink($PHP_SELF,"sessiontab=3");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("action,pcode,pdesc,price,pv,qty");
$rec->setFieldDesc("เลือก,รหัส,รายละเอียด,ราคา,คะแนน,จำนวน");
$rec->setFieldAlign("center,center,left,right,right,center");
$rec->setFieldFloatFormat(",,,0,0,0");
$rec->setFieldLink(",");				
$rec->setSpecial("./images/add_pic.gif","","holdadd","pcode,pdesc,price,pv,qty","IMAGE","");
//$rec->setSum(true,false,",,,true,true");
$rec->showRec(1,'SH_QUERY');
mysql_close($link);

?>

</body>
</html>