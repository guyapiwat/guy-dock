<? 
session_start();
include("prefix.php");
include("gencode.php");
include("connectmysql.php");
include("function.php");
include("wordingTH.php");
include("global.php");
if(empty($_GET["sp_code"]))$_GET["sp_code"] = 2901;
$sql = "SELECT mcode FROM ".$dbprefix."member " ;
$sql.= "where  id = '".$_GET["sp_code"]."'  and status_suspend = '0'  and status_terminate = '0'";
$result=mysql_query($sql);
if (mysql_num_rows($result)>0) {
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$_GET["sp_code"]=$row["mcode"];
}else exit;

$tt1=$wording_lan["tab1_mem_15"];
$tt2=$wording_lan["tab1_mem_16"];
$tt3=$wording_lan["tab1_mem_17"];
$_SESSION["m_locationbase"] = '1';
$_SESSION["type_regist"]=1;
?>
<script type="text/javascript">

function getRadioValueByName(name){
		if(name == 'นาย' || name == 'Mr.' )document.forms[0].sex[0].checked = true;
		if(name == 'นางสาว' || name == 'Miss.' )document.forms[0].sex[1].checked = true;
		if(name == 'นาง' || name == 'Mrs.' )document.forms[0].sex[1].checked = true;
	}
function getRadioValueByName1(name){
		if(name == 'นาย' || name == 'Mr.')document.forms[0].csex[0].checked = true;
		if(name == 'นางสาว' || name == 'Miss.')document.forms[0].csex[1].checked = true;
		if(name == 'นาง' || name == 'Mrs.')document.forms[0].csex[1].checked = true;
	}
 function checkForm(frm)
  {

    frm.ok.disabled = true;
    frm.ok.value = "Please wait...";
    return true;
  }
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest(); } catch(e) {} //Native Javascript
   aalert("XMLHttpRequest not supported")
   return null
}
function str_pad(input, pad_length, pad_string, pad_type){ 
for(i=input.length; i<pad_length; i++){ 
	if(pad_type) 
	input = input + pad_string; 
	else 
	input = pad_string + input; 
} 
return input; 
} 
function sendget_sponsor(value) {
     var req = Inint_AJAX(); //สร้าง Object
	// aalert(value)
	value = str_pad(value,7,0,false);
	value = value.toUpperCase();
	
     req.open('GET', 'search_memberm.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; 
					var myarr = data.split("|");
					if(data == 1234){
						document.getElementById('sp_code').value="";
						document.getElementById("sp_name").value="<?=$wording_lan["tab1_mem_88"];?>";
						document.getElementById("l1").innerHTML="";//แสดงผล
						document.getElementById("l2").innerHTML="";
						//document.getElementById("l3").innerHTML="";
					}else{
						document.getElementById('sp_code').value=value;
						document.getElementById("sp_name").value=myarr[0].trim();
						document.getElementById("l1").innerHTML="<?=$wording_lan["upa_code"];?> "+myarr[1];//แสดงผล
						document.getElementById("l2").innerHTML="<?=$wording_lan["upa_code"];?> "+myarr[2];
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     req.send(null); //ทำการส่ง
};
function sendget_sponsor1(value,value1) {
	if(value1 == ''){
		aalert('Please Choose Sponser First');
		document.getElementById('upa_code').value="";
		exit;
	}
    var req = Inint_AJAX();
	value = str_pad(value,7,0,false);
	value1 = str_pad(value1,7,0,false);
    req.open('GET', 'search_member11.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
    req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
	  if (req.readyState==4) {
		   if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
				var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
				//aalert(req.responseText);
				if(data == 1234){
				document.getElementById('upa_code').value="";
				document.getElementById("upa_name").value="ไม่ได้อยู่ในสายงาน";
				}else{
					var myArray = data.split(':');
					var left = myArray[0];
					var right = myArray[1];
					var name = myArray[2];
					var left = left.trim();
					
					 if(left == '1' && right == '1'){
						aalert('อัพไลน์มีขา 2 ด้านแล้ว');
						document.getElementById('upa_code').value="";
						document.forms[0].lr[0].disabled = true;
						document.forms[0].lr[0].checked = false;
						document.forms[0].lr[1].disabled = true;
						document.forms[0].lr[1].checked = false;
					}else {
						var l_alert = document.forms[0].lr[0].checked;
						var r_alert = document.forms[0].lr[1].checked;
						if(left == '1'){
							if(l_alert == true)aalert('อัพไลน์มีด้านซ้าย มีแล้ว');
							document.forms[0].lr[0].disabled = true;
							document.forms[0].lr[0].checked = false;
						}
						else {
							document.forms[0].lr[0].disabled = false;
						}

						if(right == '1'){
							if(r_alert == true)aalert('อัพไลน์มีด้านขวา มีแล้ว');
							document.forms[0].lr[1].disabled = true;
							document.forms[0].lr[1].checked = false;
						}
						else {
							document.forms[0].lr[1].disabled = false;
						}
						document.getElementById('upa_code').value=value;
						document.getElementById("upa_name").value=name; //แสดงผล
					 }
				}
		   }
	 }
 };
 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
 req.send(null); //ทำการส่ง
};
</script>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">
function onclickaddress(){

//aalert(document.forms[0].chkaddress.checked);
	if(document.forms[0].chkaddress.checked == true){
		document.getElementById('caddress').value=document.getElementById('address').value;
	  document.getElementById('caddress').value=document.getElementById('address').value;
	  document.getElementById('cbuilding').value=document.getElementById('building').value;
	  document.getElementById('cvillage').value=document.getElementById('village').value;
	  document.getElementById('csoi').value=document.getElementById('soi').value;
	  document.getElementById('cstreet').value=document.getElementById('street').value;
		checkaddress(document.getElementById('cprovince').value=document.getElementById('province').value,document.getElementById('camphur').value=		document.getElementById('amphur').value,document.getElementById('cdistrict').value=document.getElementById('district').value);

		var x = document.getElementById("camphur");
		var option = document.createElement("option");
		var skillsSelect = document.getElementById("amphur");
		option.text = skillsSelect.options[skillsSelect.selectedIndex].text;
		option.value = document.getElementById('amphur').value;
		x.add(option);
		x.remove('');

		var x = document.getElementById("cdistrict");
		var option = document.createElement("option");
		var skillsSelect = document.getElementById("district");
		option.text = skillsSelect.options[skillsSelect.selectedIndex].text;
		option.value = document.getElementById('district').value;
		x.add(option);
		x.remove('');

		document.getElementById('czip').value=document.getElementById('zip').value;
	  }else{
		document.getElementById('caddress').value='';
	  document.getElementById('caddress').value='';
	  document.getElementById('cbuilding').value='';
	  document.getElementById('cvillage').value='';
	  document.getElementById('csoi').value='';
	  document.getElementById('cstreet').value='';
		checkaddress('','','');
	  document.getElementById('czip').value='';
	  
	  }
}

function check_zipcode(value,value1,value2) {
     var req = Inint_AJAX(); //สร้าง Object
	// aalert(value)
	//value = str_pad(value,7,0,false);
	//aalert(value);
	//aalert(value);aalert(value1);aalert(value2);
     req.open('GET', 'search_zipcode.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
				//	aalert(req.responseText);
					//aalert(data);
					if(data == 1234){
						 document.getElementById("zip").value=''; //แสดงผล
					}else{
					//	aalert(data);
						 document.getElementById("zip").value=data.replace(/^\s+|\s+$/g,""); //แสดงผล
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
}
function check_zipcode1(value,value1,value2) {
     var req = Inint_AJAX(); //สร้าง Object
	// aalert(value)
	//value = str_pad(value,7,0,false);
	//aalert(value);
	//aalert(value);aalert(value1);aalert(value2);
     req.open('GET', 'search_zipcode.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
				//	aalert(req.responseText);
					//aalert(data);
					if(data == 1234){
						 document.getElementById("czip").value=''; //แสดงผล
					}else{
					//	aalert(data);
						 document.getElementById("czip").value=data.replace(/^\s+|\s+$/g,""); //แสดงผล
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
}
function checkaddress(value,value1,value2) {
     var req = Inint_AJAX(); //สร้าง Object
	// aalert(value)
	//value = str_pad(value,7,0,false);
	//aalert(value);
	//aalert(value1);
	//aalert(value2);
     req.open('GET', 'search_addressm.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
				//	aalert(req.responseText);
					if(data == 1234){
					//document.getElementById("mname").innerHTML="ไม่ได้อยู่ในสายงาน";
					}else{
					//	aalert(data);
                    document.getElementById("idchksaddress").innerHTML=data; //แสดงผล
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
}

function checkMemberExit(){
	var mcode = $('input[name=mcode]').val();
	var fmcode = $('select[name=fmcode]').val();
	queryString = 'mcode='+mcode+'&fmcode='+fmcode;
	link = 'checkMemberExit.php'; 
	$.post(link,queryString,function(data){ 
	if(data.trim()==1){
	   $('.chekMemberAlert').html('<img src="./images/false.gif"/>');
	}else{
		$('.chekMemberAlert').html('<img src="./images/true.gif"/>');
	}
	}); 
}

function checkMemberRamdom(){
	var mcode = $('input[name=mcode]').val();
	var fmcode = $('select[name=fmcode]').val();
	queryString = 'mcode='+mcode+'&fmcode='+fmcode;
	link = 'checkMemberRandom.php'; 
	$.post(link,queryString,function(data){ 
	//alert(data);
	if(data.trim()!=''){
	   //$('.chekMemberAlert').html('<img src="./images/false.gif"/>');
	    document.getElementById("mcode").value=data.trim();
		checkMemberExit();
	}else{
		//$('.chekMemberAlert').html('<img src="./images/true.gif"/>');
	    document.getElementById("mcode").value='';
		checkMemberExit();
	}
	}); 
	
}

function imembercheck(){
	//sendget_sponsor1(document.getElementById('upa_code').value,document.getElementById('sp_code').value);
	
	var val = '';
	var field = "";
	var flag = "";
	var errDesc = '';

	var val = document.getElementById('mcode').value;
	var field = "mcode";
	var flag = "1-7-0-0-0";
	var errDesc = '<?=$wording_lan["mcode"]?>';

	val = val + ","+document.getElementById('sp_code').value;
    field = field +",sp_code";
    flag = flag+",1-9-0-0-0-0";
    errDesc = errDesc + ",<?=$wording_lan["sp_code"]?>";

	val = val + ","+document.getElementById('sp_name').value;
    field = field +",sp_name";
    flag = flag+",1-0-0-0-0-0";
    errDesc = errDesc + ",<?=$wording_lan["sp_name"]?>";

    val = val + ","+document.getElementById('name_f').value;
    field = field +",name_f";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",<?=$wording_lan["tab1_mem_13"]?>";

    val = val + ","+document.getElementById('name_t').value;
    field = field +",name_t";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",<?=$wording_lan["tab1_mem_20"]?>";

	val = val + ","+document.getElementById('id_card').value;
    field = field +",id_card";
    flag = flag+",1-0-0-1-0";
    errDesc = errDesc + ",<?=$wording_lan["tab1_mem_26"]?>";

	if(document.getElementById('national').value == 'Thailand'){
	var a = document.getElementById('id_card').value;
	var id_card = "";
	var t = a.split("-");  //ถ้าเจอวรรคแตกเก็บลง array t
	for(var i=0; i<t.length ; i++){
		id_card = id_card+ t[i];
	}
	var id = document.getElementById('id_card').value;
	
		if( id.charAt(0) < 1 || id.charAt(0) > 8 ) {alert("<?=$wording_lan["tab1_mem_105"]?>"); document.getElementById('ok').disabled = true;document.getElementById('id_card').focus();exit;}
		for(i=0,sum=0;i<12;i++){
			sum += parseInt(id.charAt(i))*(13-i);
		}
		sum = sum%11;
		if(sum <= 1) 
			sum = 1-sum;
		else
			sum = 11-sum;
		if(sum != parseInt(id.charAt(12))){alert("<?=$wording_lan["tab1_mem_105"]?>");document.getElementById('ok').disabled = true;document.getElementById('id_card').focus();
		exit;}

	val = val + ","+document.getElementById('id_card').value;
	field = field +",id_card";
	flag = flag+",1-13-0-0-0";
	errDesc = errDesc + ",<?=$wording_lan["tab1_mem_105"]?>";
	
}
    val = val + ","+document.getElementById('mobile').value;
    field = field +",mobile";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",<?=$wording_lan["tab1_mem_29"] ?>";

    val = val + ","+document.getElementById('birthday1').value;
    field = field +",birthday1";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",<?=$wording_lan["tab1_mem_82"] ?>";

    val = val + ","+document.getElementById('birthday2').value;
    field = field +",birthday2";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",<?=$wording_lan["tab1_mem_83"] ?>";

    val = val + ","+document.getElementById('birthday3').value;
    field = field +",birthday3";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",<?=$wording_lan["tab1_mem_84"] ?>";
	
	var lrval="";
	var object = eval(document.frm.lr);
	for(i=0;i<object.length;i++){
		if(object[i].checked==true)
			lrval = object[i].value;
	}
	
	if(lrval == ''){
		alert('<?=$wording_lan["tab1_mem_103"]?>');
		exit;
	}
    document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
    startRQ(field,val,"",flag,errDesc,"member","checkstate");
}
function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
}

function maxleng(){
	document.getElementById('id_card').value='';
	var nation =document.getElementById('national').value;
	
	
	if(nation=='Thailand'){
		//alert(nation);
		document.getElementById('id_card').setAttribute("maxlength","13")
	}else{
		document.getElementById('id_card').setAttribute("maxlength","50")
	}
	

}


</script>
<?

$sql = "SELECT MAX(mcode) AS code FROM ".$dbprefix."member";
$rs = mysql_query($sql);
$code = mysql_result($rs,0,'code');
$code = substr($code,1);
mysql_free_result($rs);
if($_GET['id']){
	exit;
}else{
	if (isset($_GET["sp_code"])){$sp_code=$_GET["sp_code"];}
	if (isset($_GET["sp_name"])){$sp_name=$_GET["sp_name"];}
	if (isset($_GET["upa_code"])){$upa_code=$_GET["upa_code"];}
	if (isset($_GET["upa_name"])){$upa_name=$_GET["upa_name"];}
	if (isset($_GET["lr"])){$lr=$_GET["lr"];}
}

include("../function/global_center.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="tis-620" />
		<title><?=$wording_lan["Title"]?></title>
		<meta name="robots" content="noindex,nofollow">
		<meta name="googlebot" content="noindex,noarchieve">
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.css" />
		<link rel="stylesheet" href="../assets/css/sweetalert.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/jquery-ui.css" />
 		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.css" />

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

	</head>

<div id="err">
  
</div>
<div class="row">
	
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="clearfix">
		<div>
		<center>
			<div class="col-md-6" style="background: wheat">
			  <div class="form-group">
				<div class="videoUiWrapper thumbnail">
				  <video width="100%" id="vdHotPress" controls>
					<!-- set width to 100% and add controls for play and volume buttons-->

					<source src="http://www.cci-2016.com/video/business_edit.ogv" type="video/ogg" />
					<source src="http://www.cci-2016.com/video/business_edit.mp4" type="video/mp4" />

					Your browser does not support the video tag.
				  </video>
				</div>
			  </div>
			</div>
		</center>
	</div>
</div>

<div class="space-6"></div>
<div class="space-6"></div>
<div class="space-6"></div>
<div class="space-6"></div>
<div class="space-6"></div>

<form name='frm' method="post" onKeyDown="document.getElementById('ok').disabled=true;" action="memoperater.php?state=<?=$_GET['id']==""?0:1?>" onSubmit="return checkForm(this)" enctype="multipart/form-data">

<div class="row">
	
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="clearfix">
		<div>
			<div id="user-profile-1" class="user-profile row">
				<div class="col-xs-12 col-sm-6 ">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped ">

						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab1_mem_1"] ?></div>

							<div class="profile-info-value">
							</div>
						</div>



						<div class="profile-info-row">
						<!--?if($mcode != ''){?-->
							<div class="profile-info-name"> <?=$wording_lan["tab2_1_5"]?>&nbsp;<font color="#ff0000">*</font></div>

							<div class="profile-info-value">
								<span class="editable" id="age">						
							<select id="fmcode" name="fmcode">
								<option value="TH">TH</option>
								<option value="AC">AC</option>
								<option value="CN">CN</option>
								<option value="DZ">DZ</option>
								<option value="LA">LA</option>
								<option value="MM">MM</option>
								<option value="KH">KH</option>
								<option value="SG">SG</option>
								<option value="PH">PH</option>
								<option value="SW">SW</option>
							</select>
							<button class="btn btn-sm btn-default" type="button" onclick="checkMemberRamdom()" >
									<i class="ace-icon fa fa-search bigger-110"></i>
									Random
								</button>
							<input class="span4" type="text" id="mcode" name="mcode" value="" style="width:100px" maxlength="7" onKeyPress="checkMemberExit(); return chknum(window.event.keyCode);" onChange="checkMemberExit();"  /> <span class="chekMemberAlert"></span>



						<!--?}?--></td>
						</span>
							</div>
						</div>
							<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_4"] ?>&nbsp; <font color="#ff0000">*</font></div>

							<div class="input-group">
								<input class="form-control" type="text" id="sp_code" name="sp_code" value="<?=$sp_code?>" maxlength="9" >
								<span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="button" onclick="sendget_sponsor(document.getElementById('sp_code').value)" >
								<? if(!empty($_GET["sp_code"])) { echo "<script> sendget_sponsor('".$_GET["sp_code"]."')</script>";} ?>
									<i class="ace-icon fa fa-search bigger-110"></i>
									Search
								</button>
								</span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_6"] ?>&nbsp;<font color="#ff0000">*</font></div>

							<div class="input-group col-sm-9 col-xs-9">
								<input type="text" id="sp_name" name="sp_name" readonly placeholder="" class="form-control">
							</div>
						</div>

					</div>
					
				</div>
				<div class="col-xs-12 col-sm-6">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab1_mem_2"] ?></div>

							<div class="profile-info-value">
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_9"] ?>&nbsp;<font color="#ff0000">*</font></div>

							<div class="input-group col-sm-9 col-xs-9">
							<div class="space-6"></div>
							<div class="space-6"></div>
							
								<?
                				$rs = mysql_query("SELECT * FROM ".$dbprefix."lr_def");
								for($i=0;$i<mysql_num_rows($rs);$i++){
										if(mysql_result($rs,$i,'lr_id') == 1){
											$name_lr = $wording_lan["endleft"];
										}else if(mysql_result($rs,$i,'lr_id') == 2){
											$name_lr = $wording_lan["endright"];
										}
								?>
							<div  style="clear:both">
							<div class="lr" style=" width: 100px;   float: left;">
								&nbsp;&nbsp;<input tabindex="6" onClick="document.getElementById('ok').disabled=true;" type="radio" name="lr"  id="lr"  <?=$lr==mysql_result($rs,$i,'lr_id')?"checked":""?> value="<?=mysql_result($rs,$i,'lr_id')?>"  />&nbsp;&nbsp;<?=$name_lr;?><br><br>
							</div>
								<div id="l<?=mysql_result($rs,$i,'lr_id')?>"></div>
							 </div>
								<?
								}
									mysql_free_result($rs);
								?>
									<input type="hidden" name="olr" id="olr" value="<?=$olr?>" />
								</span>
							</div>
							<div class="space-6"></div>
							<div class="space-6"></div>
						</div>


					</div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
				</div>

				<!-- Col 2 -->

				<!-- Row 2 -->
				<div class="col-xs-12 col-sm-6">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">

						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab1_mem_11"] ?></div>

							<div class="profile-info-value">
							</div>
						</div>
						<div class="profile-info-row" style="display:none">
							<div class="profile-info-name"> รูปภาพ </div>

							<div class="profile-info-value">
								<div class="controls">
							<?if($pathImg !=""){ ?>

							<input type="text" name="profile_img" id="profile_img" value='<?=$pathImg;?>' readonly placeholder="None" >
							<input type="button" name="reset" id="reset" value='ล้าง' onclick="resetpic()" >
							</br></br>
							<? } ?>

							<input type="file" name="profileimg" id="profileimg" accept="image/png,image/jpeg,image/gif" >

								</div>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_13"] ?> <font color="#ff0000">*</font></div>

							<div class="profile-info-value">
								<div class="controls">
									<select class="span2" name="name_f" id="name_f" onchange="getRadioValueByName(this.value);document.getElementById('name_ff').value=this.value;if(this.value == '123'){document.getElementById('name_ff').value = '';document.getElementById('name_ff').readOnly  = false;document.getElementById('name_ff').focus();}else {document.getElementById('name_ff').readOnly = true;}">
								
									  <option value="" selected=""><?=$wording_lan["tab1_mem_87"];?>&nbsp;</option>
									  <option value=<?php echo $tt1; ?> ><?=$wording_lan["tab1_mem_15"];?></option>
									  <option value=<?php echo $tt2; ?> ><?=$wording_lan["tab1_mem_16"];?></option>
									  <option value=<?php echo $tt3; ?> ><?=$wording_lan["tab1_mem_17"];?></option>
									  <option value="123"><?=$wording_lan["tab1_mem_80"];?></option>
									</select>&nbsp;&nbsp;
									<input class="span4" type="text" name="name_ff" readonly id="name_ff" value="" tabindex="24">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_20"] ?> <font color="#ff0000">*</font></div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="name_t" name="name_t" value="" onKeyUp="document.getElementById('acc_name').value=document.getElementById('name_ff').value+' '+this.value;document.getElementById('name_b').value=this.value;">
								</div>
							</div>
						</div>

						<div class="profile-info-row" style="display:none">
							<div class="profile-info-name"> Name & LastName or Company Name </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="name_e" name="name_e" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row" style="display:none">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_22"] ?>  </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="name_b" name="name_b" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_23"] ?>  <font color="#ff0000">*</font></div>

							<div class="control-group">
								
								<div class="radio">
									<label>
										<input type="radio" class="ace" id='sex'  name='sex' value="&#3594;&#3634;&#3618;"></input>
										<span class="lbl">&nbsp&nbsp <?=$wording_lan["tab1_mem_32"] ?> </span>
									</label>
									<label>
										<input type="radio" class="ace" id='sex'  name='sex' value="&#3627;&#3597;&#3636;&#3591;" />
										<span class="lbl">&nbsp&nbsp <?=$wording_lan["tab1_mem_33"] ?> </span>
									</label>
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_24"] ?>  <font color="#ff0000">*</font></div>

							<div class="profile-info-value">
								<div class="controls">
									<select class="span2" name="birthday1"  id="birthday1">
										<option value=""><?=$wording_lan["tab1_mem_82"]?></option>
										<?PHP
										$year =  1; for ($i = 0; $i <= 30; $i++) {echo "<option ".(gencode2($birthday1)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
										?>
									</select>
									<select  class="span2" name="birthday2"  id="birthday2">
										<option value=""><?=$wording_lan["tab1_mem_83"]?></option>
										<?PHP
										$year =  1; for ($i = 0; $i <= 11; $i++) {echo "<option ".(gencode2($birthday2)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
										?>
									</select>
									<select class="span2" name="birthday3"  id="birthday3" >
									<option value=""><?=$wording_lan["tab1_mem_84"]?></option>
									 <?PHP
										if($_SESSION["m_locationbase"] == '1'){
										$year = date("Y")+543 - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($birthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}
										}else{
										$year = date("Y") - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($birthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}	
										}
									?>
									</select>
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_25"] ?>  <font color="#ff0000">*</font></div>

							<div class="profile-info-value">
								<div class="controls">
							<select name="national" id="national" onchange="maxleng()"  tabindex="20" class="span4">
							<?				
								
								$result1=mysql_query("select * from ".$dbprefix."nation order by nation");
								echo "<option value='' selected>-".$wording_lan["tab1_mem_25"]. "-</option>";
								for ($i=1;$i<=mysql_num_rows($result1);$i++){
									$row1 = mysql_fetch_object($result1);
									//echo "<option value=\"\" ";
									
									echo "<option value=\"".$row1->nation."\" >";
									
									if($row1->nation == 'Thailand'){
										echo 'ไทย' ;
									}else{
										echo $row1->nation;
									}
									echo "</option>";
								}
							?>     
							</select>
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_26"] ?> <font color="#ff0000">*</font></div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="id_card" name="id_card" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row" style="display:none">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_27"] ?> </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="id_tax" name="id_tax" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_28"] ?> </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="home_t" name="home_t" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_29"] ?> <font color="#ff0000">*</font></div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="mobile" name="mobile" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_30"] ?>	 </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="fax" name="fax" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_31"] ?> </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="email" name="email" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Line ID </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="line_id" name="line_id" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Facebook </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="facebook_name" name="facebook_name" value="">
								</div>
							</div>
						</div>

					</div>
					
				</div>
				<div class="col-xs-12 col-sm-6">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab1_mem_37"] ?></div>

							<div class="profile-info-value">
							</div>
						</div>
	
						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_39"] ?><font color="#ff0000">*</font></div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="address" name="address" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row" style="display:none">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_40"] ?></div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="building" name="building" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row" style="display:none">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_41"] ?></div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="village" name="village" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row" style="display:none">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_42"] ?></div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="soi" name="soi" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row" style="display:none">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_43"] ?></div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="street" name="street" value="">
								</div>
							</div>
						</div>
						 <? 
							if($_SESSION["m_locationbase"] == '1'){
								if($provinceId==""){
									include("thaiaddress.php");
								}else{
									include("thaiaddressshow.php");
								}
							}else{
						?>
						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["province"]?><font color="#ff0000">*</font></div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="provinceId" name="provinceId" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["amphur"]?><font color="#ff0000">*</font></div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="amphurId" name="amphurId" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["district"]?> <font color="#ff0000">*</font></div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="districtId" name="districtId" value="">
								</div>
							</div>
						</div>
						<? } ?>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_47"] ?></div>

							<div class="input-group">
								<input class="form-control" type="text" id="zip" name="zip" value="">
								<span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="button" onClick="check_zipcode(document.getElementById('province').value,document.getElementById('amphur').value,document.getElementById('district').value)"  >
									<i class="ace-icon fa fa-search bigger-110"></i>
									Search
								</button>
								</span>
							</div>
						</div>

					</div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
				</div>
				<!-- Row 4 -->
				<div class="col-xs-12 col-sm-6">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab1_mem_48"] ?></div>

							<div class="profile-info-value">
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_50"] ?> </div>

							<div class="profile-info-value">
								<div class="controls">
									<select class="span4" size="1" name="bankcode" id="bankcode" tabindex="28"  >
									<?					
									$result1=mysql_query("select * from ".$dbprefix."bank order by bankname");
									for ($i=1;$i<=mysql_num_rows($result1);$i++){
										$row1 = mysql_fetch_object($result1);
										//echo "<option value=\"\" ";
										echo "<option value=\"".$row1->bankcode."\" ";
										if($bankcode==""&&$row1->bankcode==26) {echo "selected";}
										if ($bankcode==$row1->bankcode) {echo "selected";}
										echo ">".$row1->bankname."</option>";
									}
									?>
								</select>
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_51"] ?> </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="branch" name="branch" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_52"] ?>	 </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" readonly type="text" id="acc_type" name="acc_type" value="<?=$wording_lan["tab1_mem_70"];?>">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_53"] ?> </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="acc_no" name="acc_no" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_54"] ?> </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="acc_name" name="acc_name" value="">
								</div>
							</div>
						</div>
					</div>
					<div class="space-6"></div>
				</div>
			</div>
		</div>
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
	
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="clearfix">
		<div>
		<center>

		<button class="btn btn-info" name='button'  id='button' type='button'  onClick="imembercheck();sendget_sponsor(document.getElementById('sp_code').value)" >
		<i class="ace-icon fa-dot-circle-o bigger-110"></i>
		<?=$wording_lan["tab4"]["5_17"] ?>
		</button>
		
		&nbsp; &nbsp; &nbsp;
		<button class="btn btn-info" name="ok"  id="ok" disabled  type="submit">
			<i class="ace-icon fa fa-check bigger-110"></i>
			<?=$wording_lan["tab4"]["5_18"] ?>
		</button>
		&nbsp; &nbsp; &nbsp;
		<button class="btn" type="reset">
			<i class="ace-icon fa fa-undo bigger-110"></i>
			<?=$wording_lan["tab4"]["5_19"] ?>
		</button>
		</center>

	</div>

	

</form>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					

<br />
      <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;<?=$wording_lan["tab1_mem_86"]?>&nbsp; </font></div>
					 <div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
				   <div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

<? include "footer.php";?>