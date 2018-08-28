<? 
//exit;
session_start();
//set_time_limit(0);
$sp_code = $_GET["sp_code"];
if(empty($sp_code))$sp_code = '0000001';
include("global.php");
ini_set("memory_limit","100M");
?>

<?
//include 'connectmysql.php';

	include("gencode.php");
	//echo $_SESSION["lan"].' '.$_GET["lan"];
	if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
		if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
		else $_SESSION["lan"] = $_GET["lan"];
	}else{
		if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
	}
	include_once("wording".$_SESSION["lan"].".php");
?>
<html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<meta name="robots" content="noindex,nofollow">
<meta name="googlebot" content="noindex,noarchieve">
<title><?=$wording_lan["Title"]?></title>
<link rel="stylesheet" type="text/css" href="./../style.css" />
</head>
<script language="JavaScript"> 
 
function clock(lan) {
var date = new Date()
var year = <?=date('Y')?>;
var month = date.getMonth()
var day = date.getDate()
var day1 = date.getDay()
var hour = date.getHours()
var minute = date.getMinutes()
var second = date.getSeconds()

if(lan == 'EN'){
var months = new Array("January","Febuary","March","April","May","June","July","August","September","October","November","December")
var thday = new Array ("Sunday","Monday","Tuesday","Wednesday","Thurday","Friday","Satuday");
}else{
var months = new Array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม")
var thday = new Array ("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");

}
var label1 = document.getElementById('lbltime')
var monthname = months[month]
var dayname = thday[day1]
 
if (hour < 12) {
hour = "0"+hour
}
 
if (minute < 10) {
minute = "0" + minute
}
 
if (second < 10) {
second = "0" + second
}
 
 
label1.innerHTML =""+dayname+" "+day+" "+monthname+" "+(year)+"  "+hour+":"+minute+":"+second
 
setTimeout("clock('"+lan+"')", 1000)
 
}
//  End -->
</script>
</head><!--bgcolor="#FFCC66"-->
<body    bgcolor="#FFFFFF" bgproperties="fixed" leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">

<? //include("header.php");?>
<? include("prefix.php");?>

 <table align=center width=90%><tr><td>
 <? include("global.php"); 
$result1=mysql_query("select * from ".$dbprefix."member where mcode = '$sp_code'");
if(mysql_num_rows($result1) > 0){
	$row1 = mysql_fetch_object($result1);
	$sp_name = $row1->name_t;
}
$result1=mysql_query("select * from ".$dbprefix."member where mcode = '{$_SESSION["usercode"]}'");
if(mysql_num_rows($result1) > 0){
	$row1 = mysql_fetch_object($result1);
	$ewallet = $row1->ewallet;
	$sql1 = "SELECT *  FROM ".$dbprefix."product where pcode = '0001' ";
	$rs1 = mysql_query($sql1);
	$total  = mysql_result($rs1,0,'price');
	$pdesc  = mysql_result($rs1,0,'pdesc');
	$tot_pv  = mysql_result($rs1,0,'pv');
	if($ewallet < $total){
		echo "<script language='JavaScript'>alert('Ewallet ไม่เพียงพอ');window.location='index.php?sessiontab=1'</script>";	
		exit;
	}
}
?>

<script type="text/javascript">
function getRadioValueByName(name){
		if(name == 'นาย')document.forms[0].sex[0].checked = true;
		if(name == 'นางสาว')document.forms[0].sex[1].checked = true;
		if(name == 'นาง')document.forms[0].sex[1].checked = true;
	}
function getRadioValueByName1(name){
		if(name == 'นาย')document.forms[0].csex[0].checked = true;
		if(name == 'นางสาว')document.forms[0].csex[1].checked = true;
		if(name == 'นาง')document.forms[0].csex[1].checked = true;
	}
 function checkForm(frm)
  {
    //
    // check form input values
    //

    frm.ok.disabled = true;
    frm.ok.value = "Please wait...";
    return true;
  }
function autoTab(obj){
	/* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
	หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
	4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
	รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
	หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
	ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
	*/
		var pattern=new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้
		var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
		var returnText=new String("");
		var obj_l=obj.value.length;
		var obj_l2=obj_l-1;
		for(i=0;i<pattern.length;i++){			
			if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
				returnText+=obj.value+pattern_ex;
				obj.value=returnText;
			}
		}
		if(obj_l>=pattern.length){
			obj.value=obj.value.substr(0,pattern.length);			
		}
}
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest(); } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported")
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
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_memberm.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('sp_code').value="";
					document.getElementById("sp_name").value="ไม่ได้อยู่ในสายงาน";
					}else{
					document.getElementById('sp_code').value=value;
                    document.getElementById("sp_name").value=data; //แสดงผล
					}
					//alert(data);
					//if(data == "No Data"){
					//	alert('a');
					//	document.getElementById("mcode").innerHTML="";}
					
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
function sendget_sponsor1(value,value1) {
	if(value1 == ''){
		alert('Please Choose Sponser First');
		document.getElementById('upa_code').value="";
		exit;
	}
     var req = Inint_AJAX(); //สร้าง Object














	// alert(value)
	value = str_pad(value,7,0,false);
	value1 = str_pad(value1,7,0,false);
	//alert(value);
	//alert(value1);

     req.open('GET', 'search_member11.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('upa_code').value="";
					document.getElementById("upa_name").value="ไม่ได้อยู่ในสายงาน";
					}else{
					//	alert(data);
						var myArray = data.split(':');
					//	alert(myArray[0]);

						if(myArray[0] == 1){
							document.forms[0].lr[0].disabled = true;
							document.forms[0].lr[0].checked = false;
						}
						else {
							document.forms[0].lr[0].disabled = false;
						}
						if(myArray[1] == '1'){
							document.forms[0].lr[1].disabled = true;
							document.forms[0].lr[1].checked = false;
						}
						else {
							document.forms[0].lr[1].disabled = false;
						}
						document.getElementById('upa_code').value=value;
						 document.getElementById("upa_name").value=myArray[2]; //แสดงผล
					}
					//alert(data);
					//if(data == "No Data"){
					//	alert('a');
					//	document.getElementById("mcode").innerHTML="";}
					
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

//alert(document.forms[0].chkaddress.checked);
	if(document.forms[0].chkaddress.checked == true){
		document.getElementById('caddress').value=document.getElementById('address').value;
	  document.getElementById('caddress').value=document.getElementById('address').value;
	  document.getElementById('cbuilding').value=document.getElementById('building').value;
	  document.getElementById('cvillage').value=document.getElementById('village').value;
	  document.getElementById('csoi').value=document.getElementById('soi').value;
	  document.getElementById('cstreet').value=document.getElementById('street').value;
	checkaddress(document.getElementById('cprovince').value=document.getElementById('province').value,document.getElementById('camphur').value=		document.getElementById('amphur').value,document.getElementById('cdistrict').value=document.getElementById('district').value);
	  document.getElementById('czip_1').value=document.getElementById('zip_1').value;
	  }else{
		document.getElementById('caddress').value='';
	  document.getElementById('caddress').value='';
	  document.getElementById('cbuilding').value='';
	  document.getElementById('cvillage').value='';
	  document.getElementById('csoi').value='';
	  document.getElementById('cstreet').value='';
		checkaddress('','','');
	  document.getElementById('czip_1').value='';
	  
	  }
}
function check_zipcode(value,value1,value2) {
     var req = Inint_AJAX(); //สร้าง Object
	// alert(value)
	//value = str_pad(value,7,0,false);
	//alert(value);
	//alert(value);alert(value1);alert(value2);
     req.open('GET', 'search_zipcode.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
				//	alert(req.responseText);
					//alert(data);
					if(data == 1234){
						 document.getElementById("zip_1").value=''; //แสดงผล
					}else{
					//	alert(data);
						 document.getElementById("zip_1").value=data.replace(/^\s+|\s+$/g,""); //แสดงผล
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
}
function check_zipcode1(value,value1,value2) {
     var req = Inint_AJAX(); //สร้าง Object
	// alert(value)
	//value = str_pad(value,7,0,false);
	//alert(value);
	//alert(value);alert(value1);alert(value2);
     req.open('GET', 'search_zipcode.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
				//	alert(req.responseText);
					//alert(data);
					if(data == 1234){
						 document.getElementById("czip_1").value=''; //แสดงผล
					}else{
					//	alert(data);
						 document.getElementById("czip_1").value=data.replace(/^\s+|\s+$/g,""); //แสดงผล
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
}
function checkaddress(value,value1,value2) {
     var req = Inint_AJAX(); //สร้าง Object
	// alert(value)
	//value = str_pad(value,7,0,false);
	//alert(value);
     req.open('GET', 'search_addressm.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
				//	alert(req.responseText);
					if(data == 1234){
					//document.getElementById("mname").innerHTML="ไม่ได้อยู่ในสายงาน";
					}else{
					//	alert(data);
                    document.getElementById("idchksaddress").innerHTML=data; //แสดงผล
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
}
var wi=null;
function get_mem_listpicker_sp_code(){
		if (wi) wi.close();
		wi=window.open("mem_listpicker_sp_code.php?name="+document.frm.sp_name.value+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_mem_listpicker_upa_code(){
		if (wi) wi.close();
	wi=window.open("mem_listpicker_upa_code.php?name="+document.frm.upa_name.value+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_mem_listpicker_mcode_acc(){
		if (wi) wi.close();
	//alert(this.getElementById('mcode_acc_name').innerHTML);
	wi=window.open("mem_listpicker_mcode_acc.php?name=?","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	//wi=window.open("mem_listpicker_mcode_acc.php?name="+this.getElementById('mcode_acc_name').innerHTML+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function imembercheck(){

//alert(document.getElementById('mcode').value);
	/*var val = document.getElementById('mcode').value;
	//alert(val);
	var skipval = document.getElementById('omcode').value;
	var field = "mcode";
	var flag = "1-7-0-1-0";
	var errDesc = "รหัสสมาชิก";
	*/
	var val = val + ","+document.getElementById('name_t').value;
	var field = field +",name_t";
	var flag = flag+",1-0-0-0-0";
	var errDesc = errDesc + ",ชื่อสมาชิก";
	var skipval = "";
	/*var myString = document.getElementById('birthday').value;
	//var myArray = myString.split('-');
	var cyear = myString.substr(4,4);
	//alert(getFullYear());
	var nowdt = new Date();
	//alert('a');
	var nd = parseInt(nowdt.getDate());
	var nm = parseInt(nowdt.getMonth());
	var ny = parseInt(nowdt.getFullYear()+543);	
	var checkmdate =0;
	checkmdate = ny-cyear;
	if(checkmdate < 18){
		alert('อายุไม่ถึง 18 ปี');
		document.getElementById('birthday').focus();
		exit;
	}*/
	if(document.getElementById('birthday1').value == ''){
		alert('กรุณาเลือกวันที่เกิด');
		document.getElementById('birthday1').focus();
		exit;
	}
	if(document.getElementById('birthday2').value == ''){
		alert('กรุณาเลือกเดือนที่เกิด');
		document.getElementById('birthday2').focus();
		exit;
	}
	if(document.getElementById('birthday3').value == ''){
		alert('กรุณาเลือกปีที่เกิด');
		document.getElementById('birthday3').focus();
		exit;
	}
	/*if(document.getElementById('cbirthday').value != ''){
		var ccyear = myString.substr(4,4);
		//var myArray1 = myString1.split('-');
		//alert(getFullYear());
		var nowdt = new Date();
		//alert('a');
		var nd = parseInt(nowdt.getDate());
		var nm = parseInt(nowdt.getMonth());
		var ny = parseInt(nowdt.getFullYear()+543);	
		var checkmdate1 =0;
		checkmdate1 = ny-ccyear;
		if(checkmdate1 < 18){
			alert('อายุไม่ถึง 18 ปี');
			document.getElementById('cbirthday').focus();
			exit;
		}
	}*/

		val = val + ","+document.getElementById('ccheckr').value;
		field = field +",ccheckr";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ชุดเริ่มต้นธุรกิจ";

		val = val + ","+document.getElementById('cpay').value;
		field = field +",cpay";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",เลือกการชำระเงิน";

	if(document.getElementById('cname_t').value != ""){
		val = val + ","+document.getElementById('cname_f').value;
		field = field +",cname_f";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",กรอกคำนำหน้า ผู้สมัครร่วม";	

		val = val + ","+document.getElementById('csex').value;
		field = field +",csex";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",กรอกเพศ ผู้สมัครร่วม";	

	if(document.getElementById('cbirthday1').value == ''){
		alert('กรุณาเลือกวันที่เกิดของผู้สมัครร่วม');
		document.getElementById('cbirthday1').focus();
		exit;
	}
	if(document.getElementById('cbirthday2').value == ''){
		alert('กรุณาเลือกเดือนที่เกิดของผู้สมัครร่วม');
		document.getElementById('cbirthday2').focus();
		exit;
	}
	if(document.getElementById('cbirthday3').value == ''){
		alert('กรุณาเลือกปีที่เกิดของผู้สมัครร่วม');
		document.getElementById('cbirthday3').focus();
		exit;
	}
	/*	val = val + ","+document.getElementById('cbirthday').value;
		field = field +",cbirthday";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",กรอกวันเกิด ผู้สมัครร่วม";	
*/
		val = val + ","+document.getElementById('cid_card').value;
		field = field +",cid_card";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",กรอกเลขบัตรประชาชน ผู้สมัครร่วม";	
	}

	val = val + ","+document.getElementById('name_f').value;
	field = field +",name_f";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",คำนำหน้า";

	val = val + ","+document.getElementById('sex').value;
	field = field +",sex";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",เพศ";

	/*val = val + ","+document.getElementById('birthday').value;
	field = field +",birthday";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันเกิด";
*/
	if(document.getElementById('name_f').value == 'บริษัทจำกัด'){
		val = val + ","+document.getElementById('name_b').value;
		field = field +",name_b";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ชื่อบริษัท";

		val = val + ","+document.getElementById('id_tax').value;
		field = field +",id_tax";
		flag = flag+",1-0-0-1-0";
		errDesc = errDesc + ",เลขทะเบียนนิติบุคคล ";
	}

	if(document.getElementById('cname_f').value == 'บริษัทจำกัด'){
		val = val + ","+document.getElementById('cname_b').value;
		field = field +",cname_b";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ชื่อบริษัท";
	
		val = val + ","+document.getElementById('cid_tax').value;
		field = field +",cid_tax";
		flag = flag+",1-0-0-1-0";
		errDesc = errDesc + ",เลขทะเบียนนิติบุคคล ";
	}

/*	if(document.getElementById('iname_t').value != ''){

		val = val + ","+document.getElementById('iname_ff').value;
		field = field +",iname_ff";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",คำนำหน้าชื่อ ผู้รับกรมธรรม์";

		val = val + ","+document.getElementById('irelation').value;
		field = field +",irelation";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ความสัมพันธ์ ผู้รับกรมธรรม์";

		val = val + ","+document.getElementById('iphone').value;
		field = field +",iphone";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",โทรศัพท์ ผู้รับกรมธรรม์";

		val = val + ","+document.getElementById('iid_card').value;
		field = field +",iid_card";
		flag = flag+",1-13-0-0-0";
		errDesc = errDesc + ",เลขที่บัตรประชาชน ผู้รับกรมธรรม์";

	}*/

	val = val + ","+document.getElementById('sp_name').value;
	field = field +",sp_name";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสผู้แนะนำผิดพลาดกรุณากดค้น";
	
	val = val + ","+document.getElementById('sp_code').value;
	field = field +",sp_code";
	flag = flag+",1-7-0-0-0";
	errDesc = errDesc + ",กรุณาใส่รหัสผู้แนะนำ";
	
	val = val + ","+document.getElementById('mdate').value;
	field = field +",mdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่สมัคร";

	//val = val + ","+document.getElementById('email').value;
	//field = field +",email";
	//flag = flag+",1-0-0-0-0";
	//errDesc = errDesc + ",อีเมล";

	//val = val + ","+document.getElementById('email').value;
	//field = field +",email";
	//flag = flag+",1-0-0-0-0";
	//errDesc = errDesc + ",อีเมล";
	if(document.getElementById('email').value != ''){
		var Email=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if(!document.getElementById('email').value.match(Email)){
		alert('รูปแบบ Email ไม่ถูกต้อง');
		document.getElementById('email').focus();
		exit;
		}

	}
	val = val + ","+document.getElementById('mobile').value;
	var mobile = document.getElementById('mobile').value;
	field = field +",mobile";
	flag = flag+",1-10-0-0-0";
	errDesc = errDesc + ",มือถือ";

	if(document.getElementById('cmobile').value != ''){
		val = val + ","+document.getElementById('cmobile').value;
		field = field +",mobile";
		flag = flag+",1-10-0-0-0";
		errDesc = errDesc + ",มือถือของผู้สมัครร่วม";
	}

/*	if(mobile != ''){
		if(mobile.charAt(0) != '0'){
			alert('เบอร์มือถือต้องขึ้นต้นด้วย ศูนย์');
			exit;
		}
	}*/
	if(document.getElementById('national').value == 'ไทย'){
		var a = document.getElementById('id_card').value;
		var id_card = "";
		var t = a.split("-");  //ถ้าเจอวรรคแตกเก็บลง array t
		for(var i=0; i<t.length ; i++){
			id_card = id_card+ t[i];
		}
		var id = document.getElementById('id_card').value;
		
			if( id.charAt(0) < 1 || id.charAt(0) > 8 ) {alert("เลขบัตรประชาชนไม่ถูกต้่อง");document.getElementById('id_card').focus();exit;}
			for(i=0,sum=0;i<12;i++){
				sum += parseInt(id.charAt(i))*(13-i);
			}
			sum = sum%11;
			if(sum <= 1) 
				sum = 1-sum;
			else
				sum = 11-sum;
			if(sum != parseInt(id.charAt(12))){alert("เลขบัตรประชาชนไม่ถูกต้่อง");document.getElementById('id_card').focus();
exit;}


		val = val + ","+document.getElementById('id_card').value;
		field = field +",id_card";
		flag = flag+",1-13-0-1-0";
		errDesc = errDesc + ",เลขบัตรประชาชน/พาสปอร์ต ";


		if(document.getElementById('cid_card').value != ''){
			val = val + ","+document.getElementById('cid_card').value;
			field = field +",id_card";
			flag = flag+",1-13-0-0-0";
			errDesc = errDesc + ",เลขบัตรประชาชนของผู้สมัครร่วม";

		}
	}
		val = val + ","+document.getElementById('id_card').value;
		field = field +",id_card";
		flag = flag+",0-0-0-1-0";
		errDesc = errDesc + ",เลขบัตรประชาชน/พาสปอร์ต";
	
		val = val + ","+document.getElementById('id_card').value;
		field = field +",cid_card";
		flag = flag+",0-0-0-1-0";
		errDesc = errDesc + ",เลขบัตรประชาชน/พาสปอร์ต ";

		if(document.getElementById('cid_card').value != ''){
			val = val + ","+document.getElementById('cid_card').value;
			field = field +",id_card";
			flag = flag+",0-0-0-1-0";
			errDesc = errDesc + ",เลขบัตรประชาชนของผู้สมัครร่วม";

		}
		if(document.getElementById('cid_card').value == document.getElementById('id_card').value){
			alert('ข้อมูลในช่องของเลขบัตรประชาชนของผู้สมัครร่วมซ้ำกับผู้สมัครหลัก');
			document.getElementById('id_card').focus();
			exit;
		}
		//val = val + ","+document.getElementById('cid_card').value;
		//field = field +",id_card";
		//flag = flag+",0-0-0-1-0";
		//errDesc = errDesc + ",เลขบัตรประชาชนคู่สมรส ";


		val = val + ","+document.getElementById('address').value;
		field = field +",address";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ที่อยู่ตามบัตรประชาชน เลขที่ / ห้อง ";

		val = val + ","+document.getElementById('province').value;
		field = field +",province";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ที่อยู่ตามบัตรประชาชน จังหวัด ";

		val = val + ","+document.getElementById('amphur').value;
		field = field +",amphur";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ที่อยู่ตามบัตรประชาชน อำเภอ ";

		val = val + ","+document.getElementById('district').value;
		field = field +",district";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ที่อยู่ตามบัตรประชาชน ตำบล ";


		val = val + ","+document.getElementById('zip_1').value;
		field = field +",zip";
		flag = flag+",1-5-0-0-0";
		errDesc = errDesc + ",ที่อยู่ตามบัตรประชาชน รหัสไปรษณีย์ ";

if(document.getElementById('chkaddress').checked == false){
	
		val = val + ","+document.getElementById('caddress').value;
		field = field +",caddress";
		flag = flag+",1-0-0-0-0";

		errDesc = errDesc + ",ที่อยู่จัดส่ง เลขที่ / ห้อง ";

		val = val + ","+document.getElementById('cprovince').value;
		field = field +",cprovince";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ที่อยู่จัดส่ง จังหวัด ";

		val = val + ","+document.getElementById('camphur').value;
		field = field +",camphur";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ที่อยู่จัดส่ง อำเภอ ";

		val = val + ","+document.getElementById('cdistrict').value;
		field = field +",cdistrict";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ที่อยู่จัดส่ง ตำบล ";

		val = val + ","+document.getElementById('czip_1').value;
		field = field +",czip_1";
		flag = flag+",1-5-0-0-0";
		errDesc = errDesc + ",ที่อยู่จัดส่ง รหัสไปรษณีย์ ";

}
/*if(id.length != 17) {alert("เลขบัตรประชาชนไม่ครบ");exit;
	}else{
	for(i=0,j=0, sum=0; i < 16; i++) {
			if(id.charAt(i) != '-'){	sum += parseFloat(id.charAt(i))*(13-j);j = j+1;}
		}
		if((11-sum%11)%10!=parseFloat(id.charAt(16))){alert("เลขบัตรประชาชนไม่ถูกต้่อง");exit;}
	}*/
	//alert((11-sum%11)%10);
	//alert(id.charAt(16));
/*	val = val + ","+document.getElementById('upa_code').value;
	field = field +",upa_code";
	flag = flag+",0-7-0-0-1-1";
	errDesc = errDesc + ",รหัสอัพไลน์";
	
	val = val + ","+document.getElementById('sp_code').value;
	field = field +",sp_code";
	flag = flag+",0-7-0-0-1-1";
	errDesc = errDesc + ",รหัสผู้แนะนำ";
*/	var lrval="";
	var object = eval(document.frm.lr);
	for(i=0;i<object.length;i++){

		if(object[i].checked==true)
			lrval = object[i].value;
	}
	if(lrval == ''){
		alert("กรุณาเลือกซ้ายขวา");
		exit;
	}
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"member","checkstate");

}
function emembercheck(){
	var val = document.getElementById('mcode').value;
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var skipval = document.getElementById('omcode').value;
	var field = "mcode";
	var flag = "1-7-0-1-0";
	var errDesc = "รหัสสมาชิก";
	
	val = val + ","+document.getElementById('name_t').value;
	skipval = skipval+",";
	field = field +",name_t";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ชื่อสมาชิก";
	
	val = val + ","+document.getElementById('mdate').value;
	skipval = skipval+",";
	field = field +",mdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่สมัคร";

	if(document.getElementById('national').value == 'ไทย'){
	val = val + ","+document.getElementById('id_card').value;
	skipval = skipval+","+document.getElementById('oid_card').value;
	field = field +",id_card";
	flag = flag+",1-13-0-1-0";
	errDesc = errDesc + ",เลขบัตรประชาชน";
	}
	val = val + ","+document.getElementById('upa_code').value;
	skipval = skipval+",";
	field = field +",upa_code";
	flag = flag+",0-7-0-0-1-1";
	errDesc = errDesc + ",รหัสอัพไลน์";
	
	val = val + ","+document.getElementById('sp_code').value;
	skipval = skipval+",";
	field = field +",sp_code";
	flag = flag+",0-7-0-0-1-1";
	errDesc = errDesc + ",รหัสผู้แนะนำ";
	
	var lrval="";
	var object = eval(window.document.frm.lr);
	for(i=0;i<object.length;i++){
		if(object[i].checked==true)
			lrval = object[i].value;
	}
	if(document.getElementById('upa_code').value!=""){
		val = val + ","+lrval+"#"+document.getElementById('upa_code').value;
		skipval = skipval+ ","+document.getElementById('olr').value+"#"+document.getElementById('upa_code').value;
		field = field +",lr#upa_code";
		flag = flag+",1-0-0-1-0";
		errDesc = errDesc + ",ด้าน";
	}
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,skipval,flag,errDesc,"member","checkstate");
}


function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
}
</script>

<?
$sql = "SELECT MAX(mcode) AS code FROM ".$dbprefix."member where 
		mcode <> 'H00000001' and mcode <> 'H00000002' and mcode <> 'H00000003' and mcode <> 'H00000004' and
		mcode <> 'H00000005' and mcode <> 'H00000006' and mcode <> 'H00000007' and mcode <> 'H00000008' and
		mcode <> 'H00000009' and mcode <> 'H00000010' and mcode <> 'H00000011' and mcode <> 'H00000012' and
		mcode <> 'H00000013' and mcode <> 'H00000014' and mcode <> 'H00000015' and mcode <> 'H00000016' and
		mcode <> 'H00000017' and mcode <> 'H00000018' and mcode <> 'H00000019' and mcode <> 'H00000020' and
		mcode <> 'H00000021' and mcode <> 'H00000022' and mcode <> 'H00000023' and mcode <> 'H00000024' and
		mcode <> 'H00000025' 
		";
$rs = mysql_query($sql);
$code = mysql_result($rs,0,'code');
//$bmcode = substr($code,2,$bcsize);
//$bmcode +=1;
//for($i=strlen($bmcode);$i<$bcsize;$i++){
	//$bmcode = "0".$bmcode;
//}
$code = substr($code,1);
$mcode = gencode($code+1);
$sv_code = substr($mcode,3,strlen($mcode));
mysql_free_result($rs);
	if($_GET['id']){
		$sql = "SELECT * FROM ".$dbprefix."member WHERE id='".$_GET['id']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
			$notfound = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">ไปหน้าสมาชิก</a>]";
        	dialogbox("50%","#990000","ไม่พบข้อมูลตามเงื่อนไข",$notfound);
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			$oid=$row->id;
			$mcode=$row->mcode;
			$name_f=$row->name_f;
			$name_t=$row->name_t;
			$name_e=$row->name_e;
			$name_b=$row->name_b;
			$sex=$row->sex;
			$age = $row->age;
			$occupation = $row->occupation;
			$status = $row->status;
			$mar_name = $row->mar_name;
			$mar_age = $row->mar_age;
			$email = $row->email;
			$beneficiaries = $row->beneficiaries;
			$relation = $row->relation;
			$national = $row->national;
			$mdate=$row->mdate;
			$birthday=$row->birthday;
			$national=$row->national;
			$id_tax=$row->id_tax;
			$oid_card=$id_card=$row->id_card;
			$address=$row->address;
			$provinceId=$row->provinceId;
			$amphurId=$row->amphurId;
			$districtId=$row->districtId;
			$zip=$row->zip;
			$home_t=$row->home_t;
			$fax = $row->fax;
			$mobile=$row->mobile;
			$mcode_acc=$row->mcode_acc;
			//$mcode_acc_name=get_data("name_t","member","mcode='$mcode_acc'");
			$bonusrec=$row->bonusrec;
			$bankcode=$row->bankcode;
			$branch=$row->branch;
			$acc_type=$row->acc_type;
			$acc_no=$row->acc_no;
			$acc_name=$row->acc_name;
			$acc_prov=$row->acc_prov;

			$sv_code=$row->sv_code;
			$sp_code=$row->sp_code;
			$sp_name=$row->sp_name;
			$upa_code=$row->upa_code;
			$upa_name=$row->upa_name;
			$modate=$row->modate;
			$stockist=$row->stockist;
			$inv_code=$row->inv_code;
			$usercode=$row->usercode;
			$posid=$row->posid;
			$pos_cur=$row->pos_cur;
			$memdesc=$row->memdesc;
			$olr=$lr=$row->lr;
			$cmp=$row->cmp;
			$sletter=$row->sletter;
			$sinv_code=$row->sinv_code;
			
			if ($mdate=="") {
				$mdate_d="";
				$mdate_m="";
				$mdate_y="";
			}
			else {
				$dash1=strpos($mdate,"-");
				$dash2=strpos($mdate,"-",$dash1+1);
				$mdate_d=substr($mdate,8);
				$mdate_m=substr($mdate,5,2);
				$mdate_y=substr($mdate,0,4);
				if ($mdate_y>"0"){
					$mdate_y+=543;
				}
				else {$mdate_y="";}
			}
			if ($birthday=="") {
				$birthday_d="";
				$birthday_m="";
				$birthday_y="";
			}
			else {
				$dash1=strpos($birthday,"-");
				$dash2=strpos($birthday,"-",$dash1+1);
				$birthday_d=substr($birthday,8);
				$birthday_m=substr($birthday,5,2);
				$birthday_y=substr($birthday,0,4);
				if ($birthday_y>"0"){
					$birthday_y+=543;
				}
				else {$birthday_y="";}
			}
			if ($modate=="") {
				$modate_d="";
				$modate_m="";
				$modate_y="";
			}
			else {
				$dash1=strpos($modate,"-");
				$dash2=strpos($modate,"-",$dash1+1);
				$modate_d=substr($modate,8);
				$modate_m=substr($modate,5,2);
				$modate_y=substr($modate,0,4);
				if ($modate_y>"0"){
					$modate_y+=543;
				}
				else {$modate_y="";}
			}
		}
	}else{
		if (isset($_GET["sp_code"])){$sp_code=$_GET["sp_code"];}
		if (isset($_GET["sp_name"])){$sp_name=$_GET["sp_name"];}
		if (isset($_GET["upa_code"])){$upa_code=$_GET["upa_code"];}
		if (isset($_GET["upa_name"])){$upa_name=$_GET["upa_name"];}
		if (isset($_GET["lr"])){$lr=$_GET["lr"];}
	}
?>
<div id="err">
  
</div>
<form name='frm' method="post" onKeyDown="document.getElementById('ok').disabled=true;" action="memoperater.php?state=<?=$_GET['id']==""?0:1?>">
  <input type="hidden" name="oid" value="<?=$oid?>">
  <table width="100%" border="0">
  	<tr bgcolor="#FFCC33"><td><b>ข้อมูลธุรกิจ</b></td></tr>
    <tr><td>
<!--business information--> 
<table width="100%" border="0">
  <tr>
    <td width="20%" align="right">&#3619;&#3627;&#3633;&#3626;&#3612;&#3641;&#3657;&#3649;&#3609;&#3632;&#3609;&#3635; </td>
    <td width="27%"><input tabindex="2" style="background-color:#FFFFFF"  type="text" readonly=""  name="sp_code" id="sp_code" size="20"  maxlength="20" value="<?=$sp_code?>" />
        <input name="button2" tabindex="3" type="button" style="display:none" onClick="sendget_sponsor(document.getElementById('sp_code').value)" value="&#3605;&#3619;&#3623;&#3592;&#3626;&#3629;&#3610;" /></td>
    <td width="22%" align="right">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3626;&#3617;&#3633;&#3588;&#3619;&nbsp;<a href="javascript:NewCal('mdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" style="display:none" border="0" alt="&#3648;&#3621;&#3639;&#3629;&#3585;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;" /></a></td>
    <td width="31%"><input type="text" id="mdate" name="mdate" size="10" maxlength="10" readonly="" value="<?=($mdate==""?date("Y-m-d"):$mdate)?>" /></td>
  </tr>
  <tr>
    <td align="right">&#3594;&#3639;&#3656;&#3629;&#3612;&#3641;&#3657;&#3649;&#3609;&#3632;&#3609;&#3635;<font color="#ff0000">*</font></td>
    <td><input style="background-color:#CCCCCC" readonly type="text" name="sp_name" id="sp_name" size="40"  maxlength="40" value="<?=$sp_name?>" /></td>
    <td align="right">&#3623;&#3634;&#3591;&#3604;&#3657;&#3634;&#3609;<font color="#ff0000">*</font></td>
    <td><?
                	$rs = mysql_query("SELECT * FROM ".$dbprefix."lr_def");
					for($i=0;$i<mysql_num_rows($rs);$i++){
						?>
        <input tabindex="6" onClick="document.getElementById('ok').disabled=true;" type="radio" name="lr" <?=$lr==mysql_result($rs,$i,'lr_id')?"checked":""?> value="<?=mysql_result($rs,$i,'lr_id')?>" />
        <?=mysql_result($rs,$i,'lr_name').'&#3626;&#3640;&#3604;'?>
        <?
					
					}
					mysql_free_result($rs);
				?>
        <input type="hidden" name="olr" id="olr" value="<?=$olr?>" />
    </td>
  </tr>
</table>
    </td></tr>
  	<tr >
  	  <td><table width="100%" border="0">
        <tr bgcolor="#FFCC33">
          <td colspan="2" align="center"><b>&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3612;&#3641;&#3657;&#3626;&#3617;&#3633;&#3588;&#3619;</b></td>
          <td colspan="2" align="center"><b>&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3612;&#3641;&#3657;&#3626;&#3617;&#3633;&#3588;&#3619;&#3619;&#3656;&#3623;&#3617; ( &#3626;&#3634;&#3617;&#3637;&#3627;&#3619;&#3639;&#3629;&#3616;&#3619;&#3619;&#3618;&#3634; )</b></td>
        </tr>
        <tr>
          <td width="19%" align="right">&#3588;&#3635;&#3609;&#3635;&#3627;&#3609;&#3657;&#3634;&#3594;&#3639;&#3656;&#3629;<font color="#ff0000">*</font>&nbsp;</td>
          <td width="27%"><select tabindex="12" name="name_f" id="name_f" onChange="getRadioValueByName(this.value);document.getElementById('name_ff').value=this.value;if(this.value == '123'){document.getElementById('name_ff').value = ''; document.getElementById('name_ff').readOnly  = false;document.getElementById('name_ff').focus();}else {document.getElementById('name_ff').readOnly  = true;}">
              <option  value="" <?=($name_f==""?"selected":"")?>>&#3648;&#3621;&#3639;&#3629;&#3585;&#3588;&#3635;&#3609;&#3635;&#3627;&#3609;&#3657;&#3634;</option>
              <option  value="&#3609;&#3634;&#3618;" <?=($name_f=="&#3609;&#3634;&#3618;"?"selected":"")?>>&#3609;&#3634;&#3618;</option>
              <option value="&#3609;&#3634;&#3591;&#3626;&#3634;&#3623;" <?=($name_f=="&#3609;&#3634;&#3591;&#3626;&#3634;&#3623;"?"selected":"")?>>&#3609;&#3634;&#3591;&#3626;&#3634;&#3623;</option>
              <option value="&#3609;&#3634;&#3591;" <?=($name_f=="&#3609;&#3634;&#3591;"?"selected":"")?>>&#3609;&#3634;&#3591;</option>
          
              <option value="123" <?=($name_f=="&#3629;&#3639;&#3656;&#3609;&#3654;"?"selected":"")?>>&#3629;&#3639;&#3656;&#3609;&#3654;</option>
            </select>
              <input type="text" name="name_ff"  id="name_ff" value="<?=$name_ff?>" tabindex="13" readonly="" /></td>
          <td width="22%" align="right">&#3588;&#3635;&#3609;&#3635;&#3627;&#3609;&#3657;&#3634;&#3594;&#3639;&#3656;&#3629;&nbsp;</td>
          <td width="32%"><select name="cname_f"  tabindex="27" id="cname_f" onChange="getRadioValueByName1(this.value);document.getElementById('cname_ff').value=this.value;if(this.value == '123'){document.getElementById('cname_ff').value = ''; document.getElementById('cname_ff').readOnly  = false;document.getElementById('cname_ff').focus();}else {document.getElementById('cname_ff').readOnly  = true;}">
              <option  value="" <?=($cname_f==""?"selected":"")?>>&#3648;&#3621;&#3639;&#3629;&#3585;&#3588;&#3635;&#3609;&#3635;&#3627;&#3609;&#3657;&#3634;</option>
              <option  value="&#3609;&#3634;&#3618;" <?=($cname_f=="&#3609;&#3634;&#3618;"?"selected":"")?>>&#3609;&#3634;&#3618;</option>
              <option value="&#3609;&#3634;&#3591;&#3626;&#3634;&#3623;" <?=($cname_f=="&#3609;&#3634;&#3591;&#3626;&#3634;&#3623;"?"selected":"")?>>&#3609;&#3634;&#3591;&#3626;&#3634;&#3623;</option>
              <option value="&#3609;&#3634;&#3591;" <?=($cname_f=="&#3609;&#3634;&#3591;"?"selected":"")?>>&#3609;&#3634;&#3591;</option>

              <option value="123" <?=($cname_f=="&#3629;&#3639;&#3656;&#3609;&#3654;"?"selected":"")?>>&#3629;&#3639;&#3656;&#3609;&#3654;</option>
          </select>
              <input type="text" name="cname_ff" id="cname_ff" value="<?=$cname_ff?>" tabindex="28" readonly="" /></td>
        </tr>
        <tr>
          <td align="right">&#3594;&#3639;&#3656;&#3629;-&#3609;&#3634;&#3617;&#3626;&#3585;&#3640;&#3621; <font color="#ff0000">*</font>&nbsp;</td>
          <td><input  type="text" id="name_t"  onKeyUp="document.getElementById('acc_name').value=document.getElementById('name_ff').value+' '+this.value;"  name="name_t" size="40"   value="<?=$name_t?>" tabindex="14"/>
              <input type="hidden" name="oid_name_t" id="oid_name_t" maxlength="13" value="<?=$oid_name_t?>" /></td>
          <td align="right">&#3594;&#3639;&#3656;&#3629;-&#3609;&#3634;&#3617;&#3626;&#3585;&#3640;&#3621;&nbsp;</td>
          <td><input type="text" id="cname_t" name="cname_t" size="40" maxlength="40" value="<?=$cname_t?>" tabindex="29"/>
              <input type="hidden" name="coid_name_t" id="coid_name_t" maxlength="255" value="<?=$coid_name_t?>" /></td>
        </tr>
        <tr>
          <td align="right">Name &amp; LastName </td>
          <td><input type="text" name="name_e" id="name_e" size="40" maxlength="40" value="<?=$name_e?>"  tabindex="15"/></td>
          <td align="right">Name &amp; LastName  &nbsp;</td>
          <td><input type="text" name="cname_e" id="cname_e" size="40" maxlength="40" value="<?=$cname_e?>"  tabindex="30"/></td>
        </tr>
        <tr style="display:none">
          <td align="right">&#3594;&#3639;&#3656;&#3629;&#3648;&#3592;&#3657;&#3634;&#3586;&#3629;&#3591;&#3609;&#3636;&#3605;&#3636;&#3610;&#3640;&#3588;&#3588;&#3621; </td>
          <td><input type="text" id="name_b" name="name_b" size="40" maxlength="40" value="<?=$name_b?>" tabindex="16"/></td>
          <td align="right">&#3594;&#3639;&#3656;&#3629;&#3648;&#3592;&#3657;&#3634;&#3586;&#3629;&#3591;&#3609;&#3636;&#3605;&#3636;&#3610;&#3640;&#3588;&#3588;&#3621;</td>
          <td><input type="text" id="cname_b" name="cname_b" size="40" maxlength="40" value="<?=$cname_b?>" tabindex="31"/></td>
        </tr>
        <tr>
          <td align="right">&#3648;&#3614;&#3624;<font color="#ff0000">*</font>&nbsp;</td>
          <td><input type="radio" name="sex" id="sex" value="&#3594;&#3634;&#3618;" tabindex="17" <? if($sex=="&#3594;&#3634;&#3618;") echo "checked=\"checked\""; ?>>
            &#3594;&#3634;&#3618;
            <input type="radio" name="sex" id="sex" value="&#3627;&#3597;&#3636;&#3591;" tabindex="18" <? if($sex=="&#3627;&#3597;&#3636;&#3591;") echo "checked=\"checked\""; ?>>
            &#3627;&#3597;&#3636;&#3591;     
            <td align="right">&#3648;&#3614;&#3624;&nbsp;</td>
          <td><input type="radio" name="csex" id="csex" value="&#3594;&#3634;&#3618;" tabindex="32" <? if($csex=="&#3594;&#3634;&#3618;") echo "checked=\"checked\""; ?>>
            &#3594;&#3634;&#3618;
            <input type="radio" name="csex" id="csex" value="&#3627;&#3597;&#3636;&#3591;" tabindex="33" <? if($csex=="&#3627;&#3597;&#3636;&#3591;") echo "checked=\"checked\""; ?>>
&#3627;&#3597;&#3636;&#3591;        </tr>
        <tr>
          <td align="right">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3648;&#3585;&#3636;&#3604;<font color="#ff0000">*</font>&nbsp;</td>
          <td nowrap="nowrap"><select name="birthday1"  id="birthday1">
			<option value="">วัน</option>
              <?PHP
$year =  1; for ($i = 0; $i <= 30; $i++) {echo "<option value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
?>
            </select>
            <select  name="birthday2"  id="birthday2">
  			<option value="">เดือน</option>
            <?PHP
$year =  1; for ($i = 0; $i <= 11; $i++) {echo "<option value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
?>
            </select>
            <select  name="birthday3"  id="birthday3" >
   			<option value="">ปี(พ.ศ.)</option>
             <?PHP
$year = date("Y")+543 - 18; for ($i = 0; $i <= 62; $i++) {echo "<option value='$year'>$year</option>"; $year--;}
?>
            </select>
            <input style="display:none" type="text" name="birthday" id="birthday" size="10" maxlength="8" tabindex="19" value="<?=$birthday?>" onKeyPress="return chknum(window.event.keyCode)"  />
            &nbsp;<a href="javascript:NewCal('birthday','yyyymmdd',false,24)"><img style="display:none" src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="(&#3611;&#3611;&#3611;&#3611;-&#3604;&#3604;-&#3623;&#3623;)" /></a><font color="#808080"><br>
            </font></td>
          <td align="right">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3648;&#3585;&#3636;&#3604;&nbsp;</td>
          <td nowrap="nowrap"><select name="cbirthday1"  id="cbirthday1">
			<option value="">วัน</option>
              <?PHP
$year =  1; for ($i = 0; $i <= 30; $i++) {echo "<option value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
?>
            </select>
            <select  name="cbirthday2"  id="cbirthday2">
  			<option value="">เดือน</option>
            <?PHP
$year =  1; for ($i = 0; $i <= 11; $i++) {echo "<option value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
?>
            </select>
            <select  name="cbirthday3"  id="cbirthday3" >
   			<option value="">ปี(พ.ศ.)</option>
             <?PHP
$year = date("Y")+543 - 18; for ($i = 0; $i <= 62; $i++) {echo "<option value='$year'>$year</option>"; $year--;}
?>
            </select><input style="display:none" type="text" name="cbirthday" id="cbirthday" size="10" maxlength="8" tabindex="34" value="<?=$cbirthday?>" onKeyPress="return chknum(window.event.keyCode)"  /></td>
        </tr>
        <tr>
          <td align="right">&#3626;&#3633;&#3597;&#3594;&#3634;&#3605;&#3636;<font color="#ff0000">*</font>&nbsp;</td>
          <td>
		  <!--<select name="national" id="national"  tabindex="20">
              <option  value="&#3652;&#3607;&#3618;" <?=($national=="&#3652;&#3607;&#3618;"?"selected":"")?>>&#3652;&#3607;&#3618;</option>
          </select>-->
		  <select name="national" id="national"  tabindex="20">
      <?					
					$result1=mysql_query("select * from ".$dbprefix."nation order by nation");
						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->nation."\" ";
							if($national=="") {echo "selected";}
							if ($national==$row1->nation) {echo "selected";}
							echo ">".$row1->nation."</option>";
						}
						?>
    </select></td>
          <td align="right">&#3626;&#3633;&#3597;&#3594;&#3634;&#3605;&#3636;&nbsp;</td>
          <td><!--<select name="cnational" id="cnational"  tabindex="35">
              <option  value="&#3652;&#3607;&#3618;" <?=($cnational=="&#3652;&#3607;&#3618;"?"selected":"")?>>&#3652;&#3607;&#3618;</option>
              <option value="&#3621;&#3634;&#3623;" <?=($cnational=="&#3621;&#3634;&#3623;"?"selected":"")?>>&#3621;&#3634;&#3623;</option>
          </select>-->
		  <select name="cnational" id="cnational"  tabindex="35">
      <?					
					$result1=mysql_query("select * from ".$dbprefix."nation order by nation");
						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->nation."\" ";
							if($cnational=="") {echo "selected";}
							if ($cnational==$row1->nation) {echo "selected";}
							echo ">".$row1->nation."</option>";
						}
						?>
    </select></td>
        </tr>
        <tr>
          <td align="right">&#3648;&#3621;&#3586;&#3611;&#3619;&#3632;&#3592;&#3635;&#3605;&#3633;&#3623;&#3611;&#3619;&#3632;&#3594;&#3634;&#3594;&#3609;/&#3614;&#3634;&#3626;&#3611;&#3629;&#3619;&#3660;&#3605;<font color="#ff0000">*</font>&nbsp;</td>
          <td><input  name="id_card" id="id_card"  tabindex="21"  maxlength="17" type="text" value="<?=$id_card?>"   />
              <input type="hidden" name="oid_card" id="oid_card" maxlength="17" value="<?=$oid_card?>" />          </td>
          <td align="right">&#3648;&#3621;&#3586;&#3611;&#3619;&#3632;&#3592;&#3635;&#3605;&#3633;&#3623;&#3611;&#3619;&#3632;&#3594;&#3634;&#3594;&#3609;/&#3614;&#3634;&#3626;&#3611;&#3629;&#3619;&#3660;&#3605;&nbsp;</td>
          <td><!--<input name="citizen_1" type="text" id="citizen_1" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> - 
  <input name="citizen_2" type="text" id="citizen_2" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="citizen_4" type="text" id="citizen_4" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="citizen_5" type="text" id="citizen_5" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="citizen_6" type="text" id="citizen_6" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> -
  <input name="citizen_6" type="text" id="citizen_6" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />
  <input name="citizen_7" type="text" id="citizen_7" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />


  <input name="citizen_8" type="text" id="citizen_8" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />
  <input name="citizen_9" type="text" id="citizen_9" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />
  <input name="citizen_10" type="text" id="citizen_10" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> -
  <input name="citizen_11" type="text" id="citizen_11" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />
  <input name="citizen_12" type="text" id="citizen_12" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> -
  <input name="citizen_13" type="text" id="citizen_13" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />
    -->
              <input  name="cid_card" id="cid_card"  tabindex="36"  maxlength="17" type="text" value="<?=$cid_card?>"    />
              <input type="hidden" name="coid_card" id="coid_card" maxlength="17" value="<?=$coid_card?>" />          </td>
          <!--
    <input type="text" name="id_card" id="id_card" maxlength="13" value="<?=$id_card?>" onkeypress="return chknum(window.event.keyCode)" />
    <td align="right">&#3619;&#3633;&#3610;&#3650;&#3610;&#3609;&#3633;&#3626;&#3612;&#3656;&#3634;&#3609;</td>
    <td> <input type="radio" value="1" <? if ($bonusrec=="1") {echo "checked";}?> name="bonusrec">
                &#3608;&#3609;&#3634;&#3588;&#3634;&#3619;
                <input type="radio" <? if ($bonusrec=="2") {echo "checked";}?> name="bonusrec" value="2">
                &#3619;&#3633;&#3610;&#3648;&#3629;&#3591;</td>
  </tr>-->
        <tr style="display:none">
          <td align="right">&#3648;&#3621;&#3586;&#3607;&#3632;&#3648;&#3610;&#3637;&#3618;&#3609;&#3609;&#3636;&#3605;&#3636;&#3610;&#3640;&#3588;&#3588;&#3621; &nbsp;</td>
          <td><input type="text" name="id_tax" id="id_tax" value="<?=$id_tax?>" tabindex="22"  onKeyPress="return chknum(window.event.keyCode)"/></td>
          <td align="right">&#3648;&#3621;&#3586;&#3607;&#3632;&#3648;&#3610;&#3637;&#3618;&#3609;&#3609;&#3636;&#3605;&#3636;&#3610;&#3640;&#3588;&#3588;&#3621; &nbsp;</td>
          <td><input type="text" name="cid_tax" id="cid_tax" value="<?=$cid_tax?>" tabindex="37"  onKeyPress="return chknum(window.event.keyCode)" /></td>
        </tr>
        <tr>
          <td align="right">&#3650;&#3607;&#3619;&#3624;&#3633;&#3614;&#3607;&#3660;&#3610;&#3657;&#3634;&#3609;&nbsp;</td>
          <td><input type="text" name="home_t"  id="home_t" maxlength="20" value="<?=$home_t?>" tabindex="23"  onKeyPress="return chknum(window.event.keyCode)"/></td>
          <td align="right">&#3650;&#3607;&#3619;&#3624;&#3633;&#3614;&#3607;&#3660;&#3610;&#3657;&#3634;&#3609;&nbsp;</td>
          <td><input type="text" name="chome_t" id="chome_t"  maxlength="20" value="<?=$chome_t?>" tabindex="38"  onKeyPress="return chknum(window.event.keyCode)"/></td>
        </tr>
        <tr>
          <td align="right">&#3650;&#3607;&#3619;&#3624;&#3633;&#3614;&#3607;&#3660;&#3617;&#3639;&#3629;&#3606;&#3639;&#3629;<font color="#ff0000">*</font>&nbsp;</td>
          <td><input type="text" name="mobile" id="mobile"  maxlength="20" value="<?=$mobile?>"  onKeyPress="return chknum(window.event.keyCode)" tabindex="24"/>
            <font color="#808080">&#3648;&#3594;&#3656;&#3609; 08xxxxxxxx </font></td>
          <td align="right">&#3650;&#3607;&#3619;&#3624;&#3633;&#3614;&#3607;&#3660;&#3617;&#3639;&#3629;&#3606;&#3639;&#3629;&nbsp;</td>
          <td><input type="text" name="cmobile" id="cmobile"  maxlength="20" value="<?=$cmobile?>" tabindex="39"  onKeyPress="return chknum(window.event.keyCode)"/></td>
        </tr>
        <tr>
          <td align="right">&#3650;&#3607;&#3619;&#3626;&#3634;&#3619;&nbsp;</td>
          <td><input type="text" name="fax" id="fax" value="<?=$fax?>"  onKeyPress="return chknum(window.event.keyCode)" tabindex="25"/></td>
          <td align="right">&#3650;&#3607;&#3619;&#3626;&#3634;&#3619;&nbsp;</td>
          <td><input type="text" name="cfax" id="cfax" value="<?=$cfax?>" tabindex="40"  onKeyPress="return chknum(window.event.keyCode)"/></td>
        </tr>
        <tr>
          <td align="right">&#3629;&#3637;&#3648;&#3617;&#3621;&nbsp;</td>
          <td><input type="text" name="email" id="email" value="<?=$email?>" tabindex="26"/></td>
          <td align="right">&#3629;&#3637;&#3648;&#3617;&#3621;&nbsp;</td>
          <td><input type="text" name="cemail" id="cemail" value="<?=$cemail?>" tabindex="41"/></td>
      </table>
  	    
  	    <table width="100%" border="0">
          <tr bgcolor="#FFCC33">
            <td colspan="2" align="center"><b>&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;&#3605;&#3634;&#3617;&#3610;&#3633;&#3605;&#3619;&#3611;&#3619;&#3632;&#3594;&#3634;&#3594;&#3609;</b></td>
            <td colspan="2" align="center"><b>&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;&#3626;&#3635;&#3627;&#3619;&#3633;&#3610;&#3592;&#3633;&#3604;&#3626;&#3656;&#3591; / &#3626;&#3656;&#3591;&#3648;&#3629;&#3585;&#3626;&#3634;&#3619;
                  <input type="checkbox" name="chkaddress" id="chkaddress" value="1"  tabindex="53" onClick="onclickaddress(this.value);" />
              &#3607;&#3637;&#3656;&#3648;&#3604;&#3637;&#3618;&#3623;&#3585;&#3633;&#3610;&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;&#3605;&#3634;&#3617;&#3610;&#3633;&#3605;&#3619;&#3611;&#3619;&#3632;&#3594;&#3634;&#3594;&#3609;</b></td>
          </tr>
          <tr>
            <td height="27" align="right">&#3648;&#3621;&#3586;&#3607;&#3637;&#3656;/&#3627;&#3657;&#3629;&#3591;<font color="#ff0000">*</font> </td>
            <td><input type="text" name="address" id="address" value="<?=$address?>" tabindex="42"/></td>
            <td align="right">&#3648;&#3621;&#3586;&#3607;&#3637;&#3656;/&#3627;&#3657;&#3629;&#3591;<font color="#ff0000">*</font> </td>
            <td><input type="text" name="caddress" id="caddress" value="<?=$caddress?>" tabindex="54"/></td>
          </tr>
          <tr>
            <td align="right">&#3629;&#3634;&#3588;&#3634;&#3619;</td>
            <td><input type="text" name="building" id="building" value="<?=$building?>" tabindex="43"/></td>
            <td align="right">&#3629;&#3634;&#3588;&#3634;&#3619;</td>
            <td><input type="text" name="cbuilding" id="cbuilding" value="<?=$cbuilding?>" tabindex="55"/></td>
          </tr>
          <tr>
            <td align="right">&#3627;&#3617;&#3641;&#3656;&#3610;&#3657;&#3634;&#3609;/&#3588;&#3629;&#3609;&#3650;&#3604;</td>
            <td><input type="text" name="village" id="village" value="<?=$village?>" tabindex="44"/></td>
            <td align="right">&#3627;&#3617;&#3641;&#3656;&#3610;&#3657;&#3634;&#3609;/&#3588;&#3629;&#3609;&#3650;&#3604;</td>
            <td><input type="text" name="cvillage" id="cvillage" value="<?=$cvillage?>" tabindex="56"/></td>
          </tr>
          <tr>
            <td align="right">&#3605;&#3619;&#3629;&#3585;/&#3595;&#3629;&#3618;</td>
            <td><input type="text" name="soi" id="soi" value="<?=$soi?>" tabindex="45"/></td>
            <td align="right">&#3605;&#3619;&#3629;&#3585;/&#3595;&#3629;&#3618;</td>
            <td><input type="text" name="csoi" id="csoi" value="<?=$csoi?>" tabindex="57"/></td>
          </tr>
          <tr>
            <td width="12%" align="right">&#3606;&#3609;&#3609; &nbsp;</td>
            <td width="34%"><input type="text" name="street" id="street" value="<?=$street?>" tabindex="46"/></td>
            <td width="12%" align="right">&#3606;&#3609;&#3609; &nbsp;</td>
            <td width="34%"><input type="text" name="cstreet" id="cstreet" value="<?=$cstreet?>" tabindex="58"/></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><? 
		if($provinceId==""){
			include("thaiaddress.php");
		}else{
			include("thaiaddressShow.php");
		}
	?></td>
            <td colspan="2" align="center"><div id="idchksaddress"><? 
		if($cprovinceId==""){
			include("cthaiaddress.php");
		}else{
		//	var_dump($cprovinceId);
			include("cthaiaddressShow.php");
		}
	?></div></td>
          </tr>
          <tr>
            <td align="right">&#3619;&#3627;&#3633;&#3626;&#3652;&#3611;&#3619;&#3625;&#3603;&#3637;&#3618;&#3660;&nbsp;<font color="#ff0000">*</font></td>
            <td><input name="zip_1" tabindex="52" type="text" id="zip_1" maxlength="5"  value="<?=$zip[0]?>"  onKeyPress="return chknum(window.event.keyCode)"   />
              <!-- <input type="text" name="zip" size="10" maxlength="5" value="<?=$zip?>" />--><input name="button3"  tabindex="48" type="button" onClick="check_zipcode(document.getElementById('province').value,document.getElementById('amphur').value,document.getElementById('district').value)" value="ค้นหา" /></td>
            <td align="right">&#3619;&#3627;&#3633;&#3626;&#3652;&#3611;&#3619;&#3625;&#3603;&#3637;&#3618;&#3660;&nbsp;<font color="#ff0000">*</font></td>
            <td><input name="czip_1" tabindex="62" type="text" id="czip_1"  maxlength="5"  value="<?=$czip[0]?>"   onKeyPress="return chknum(window.event.keyCode)" />
              <!-- <input type="text" name="zip" size="10" maxlength="5" value="<?=$zip?>" />--><input name="button4"  tabindex="48" type="button" onClick="check_zipcode1(document.getElementById('cprovince').value,document.getElementById('camphur').value,document.getElementById('cdistrict').value)" value="ค้นหา" /></td>
          </tr>
          <tr bgcolor="#FFCC33">
            <td colspan="2" align="center"><b>&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3585;&#3634;&#3619;&#3619;&#3633;&#3610;&#3612;&#3621;&#3611;&#3619;&#3632;&#3650;&#3618;&#3594;&#3609;&#3660;</b></td>
            <td colspan="2" align="center"><b>&#3612;&#3641;&#3657;&#3619;&#3633;&#3610;&#3612;&#3621;&#3611;&#3619;&#3632;&#3650;&#3618;&#3594;&#3609;&#3660;&#3585;&#3619;&#3617;&#3608;&#3619;&#3619;&#3617;&#3660;&#3611;&#3619;&#3632;&#3585;&#3633;&#3609;&#3629;&#3640;&#3610;&#3633;&#3605;&#3636;&#3648;&#3627;&#3605;&#3640;</b></td>
          </tr>
          <tr>
            <td align="right">&#3608;&#3609;&#3634;&#3588;&#3634;&#3619;</td>
     <td><select size="1" name="bankcode" id="bankcode" tabindex="63">
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
     </select></td>
     <td align="right">&#3588;&#3635;&#3609;&#3635;&#3627;&#3609;&#3657;&#3634;&#3594;&#3639;&#3656;&#3629;&nbsp;</td>
     <td><select tabindex="69" name="iname_f" id="iname_f" onChange="document.getElementById('iname_ff').value=this.value;if(this.value == '123'){document.getElementById('iname_ff').value = ''; document.getElementById('iname_ff').readOnly  = false;document.getElementById('iname_ff').focus();}else {document.getElementById('iname_ff').readOnly  = true;}">
         <option  value="" <?=($iname_f==""?"selected":"")?>>เลือกคำนำหน้า</option>
         <option  value="นาย" <?=($iname_f=="นาย"?"selected":"")?>>นาย</option>
         <option value="นางสาว" <?=($iname_f=="นางสาว"?"selected":"")?>>นางสาว</option>
         <option value="นาง" <?=($iname_f=="นาง"?"selected":"")?>>นาง</option>
         <option value="123" <?=($iname_f=="อื่นๆ"?"selected":"")?>>อื่นๆ</option>
       </select>
         <input type="text" name="iname_ff"  id="iname_ff" value="<?=$iname_ff?>" tabindex="69" readonly="" /></td>
   </tr>
   <tr>
     <td align="right">&#3626;&#3634;&#3586;&#3634;</td>
     <td><input type="text" name="branch" id="branch" size="20" maxlength="64" value="<?=$branch?>" tabindex="64"></td>
    <td align="right">&#3594;&#3639;&#3656;&#3629;-&#3626;&#3585;&#3640;&#3621; : </td>
    <td><input type="text" name="iname_t" id="iname_t" value="<?=$iname_t?>" tabindex="69" size="43"/></td>
   </tr>
  <tr>
    <td align="right">&#3611;&#3619;&#3632;&#3648;&#3616;&#3607;&#3610;&#3633;&#3597;&#3594;&#3637;</td>
    <td><input name="acc_type"  tabindex="65" id="acc_type" type="radio" <? if($acc_type=="&#3629;&#3629;&#3617;&#3607;&#3619;&#3633;&#3614;&#3618;&#3660;") echo "checked=\"checked\""; ?> value="&#3629;&#3629;&#3617;&#3607;&#3619;&#3633;&#3614;&#3618;&#3660;" checked />
  &#3629;&#3629;&#3617;&#3607;&#3619;&#3633;&#3614;&#3618;&#3660;
  <!--<input name="acc_type" type="radio" <? if($acc_type=="&#3585;&#3619;&#3632;&#3649;&#3626;&#3619;&#3634;&#3618;&#3623;&#3633;&#3609;") echo "checked=\"checked\""; ?> value="&#3585;&#3619;&#3632;&#3649;&#3626;&#3619;&#3634;&#3618;&#3623;&#3633;&#3609;"  />&#3585;&#3619;&#3632;&#3649;&#3626;&#3619;&#3634;&#3618;&#3623;&#3633;&#3609;
	<input name="acc_type" type="radio" <? if($acc_type=="&#3613;&#3634;&#3585;&#3611;&#3619;&#3632;&#3592;&#3635;") echo "checked=\"checked\""; ?> value="&#3613;&#3634;&#3585;&#3611;&#3619;&#3632;&#3592;&#3635;" /> &#3613;&#3634;&#3585;&#3611;&#3619;&#3632;&#3592;&#3635;</td>-->
    <td align="right">&#3588;&#3623;&#3634;&#3617;&#3626;&#3633;&#3617;&#3614;&#3633;&#3609;&#3608;&#3660; : </td>
	<td><input type="text" name="irelation" id="irelation" value="<?=$irelation?>" tabindex="70"/></td>
  </tr>
  <tr>
    <td align="right">&#3648;&#3621;&#3586;&#3607;&#3637;&#3656;&#3610;&#3633;&#3597;&#3594;&#3637;</td>
    <td><!--
    <input name="acc_no_1" type="text" id="acc_no_1" size="1" maxlength="1" style="width:15px;" value="<?=$acc_no[0]?>" onkeypress="return chknum(window.event.keyCode)" />
    <input name="acc_no_2" type="text" id="acc_no_2" size="1" maxlength="1" style="width:15px;"value="<?=$acc_no[1]?>" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="acc_no_3" type="text" value="<?=$acc_no[2]?>" id="acc_no_3" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="acc_no_4" type="text" value="<?=$acc_no[3]?>" id="acc_no_4" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="acc_no_5" type="text" id="acc_no_5" value="<?=$acc_no[4]?>" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />
  <input name="acc_no_6" type="text" id="acc_no_6" size="1" maxlength="1" style="width:15px;" value="<?=$acc_no[5]?>" onkeypress="return chknum(window.event.keyCode)" />
    <input name="acc_no_7" type="text" id="acc_no_7" size="1" maxlength="1" style="width:15px;"value="<?=$acc_no[6]?>" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="acc_no_8" type="text" value="<?=$acc_no[7]?>" id="acc_no_8" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="acc_no_9" type="text" value="<?=$acc_no[8]?>" id="acc_no_9" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="acc_no_10" type="text" id="acc_no_10" value="<?=$acc_no[9]?>" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />-->
        <input type="text" name="acc_no" id="acc_no"  size="13"   value="<?=$acc_no?>" tabindex="66" onKeyPress="return chknum(window.event.keyCode)" ></td>
    <td align="right">&#3650;&#3607;&#3619;&#3624;&#3633;&#3614;&#3607;&#3660; : </td>
	<td><input type="text" name="iphone" id="iphone" value="<?=$iphone?>" tabindex="71"/></td>
  </tr>
  <tr>
    <td align="right">&#3594;&#3639;&#3656;&#3629;&#3610;&#3633;&#3597;&#3594;&#3637;&nbsp;</td>
    <td><input type="text" name="acc_name" id="acc_name" size="40"  maxlength="40" tabindex="67" value="<?=$acc_name?>" readonly></td>
    <td align="right">เลข&#3610;&#3633;&#3605;&#3619;&#3611;&#3619;&#3632;&#3594;&#3634;&#3594;&#3609; : </td>
    <td><input type="text" name="iid_card" id="iid_card" value="<?=$iid_card?>" tabindex="71"  onKeyPress="return chknum(window.event.keyCode)" /></td>
  </tr>
  <tr>
    <td align="right">&#3627;&#3617;&#3634;&#3618;&#3648;&#3627;&#3605;&#3640;&nbsp;</td>
    <td><input type="text" name="memdesc" id="memdesc" size="40" value="<?=$memdesc?>" tabindex="68" /></td>
    <td align="left" colspan="2" ><b></b></td>
    </tr>
          <tr>
           <td colspan="2"  bgcolor="#FFCC33"align="center"><b>ข้อมูลอื่นๆ</b></td>
            <td colspan="2" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td align="right">&#3619;&#3633;&#3610;&#3609;&#3636;&#3605;&#3618;&#3626;&#3634;&#3619; </td>
            <td><input type="radio"  onClick="document.getElementById('sinv_code').disabled=true" checked="checked"  name="sletter" id="sletter" value="&#3592;&#3633;&#3604;&#3626;&#3656;&#3591;" tabindex="68"  <? if($sletter=="0" or empty($sletter)) echo "checked=\"checked\""; ?>>
&#3592;&#3633;&#3604;&#3626;&#3656;&#3591; 
  <input type="radio" name="sletter" id="sletter" onClick="document.getElementById('sinv_code').disabled=false;document.getElementById('sinv_code').focus();" value="1" tabindex="68"  <? if($sletter=="1") echo "checked=\"checked\""; ?>>
&#3619;&#3633;&#3610;&#3648;&#3629;&#3591; <select style="width:120px" name="sinv_code" id="sinv_code"  tabindex="68"  disabled="disabled">
			  <option value="">เลือกสาขา</option>
        <?					
		  if(empty($sinv_code))$sinv_code = 'BKK1';

						$result1=mysql_query("select * from ".$dbprefix."invent order by inv_code");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->inv_code."\" ";
							if ($sinv_code==$row1->inv_code) {echo "selected";}
							echo ">".$row1->inv_desc."</option>";
						}
						?>
    </select></td>
            <td colspan="2" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td align="right">&#3594;&#3640;&#3604;&#3648;&#3619;&#3636;&#3656;&#3617;&#3605;&#3657;&#3609;&#3608;&#3640;&#3619;&#3585;&#3636;&#3592;<font color="#ff0000">*</font> </td>
            <td><input type="radio"  onClick="document.getElementById('sinv_code').disabled=true;document.getElementById('ccheckr').value = '1';"  name="sbook" id="sbook" value="1" tabindex="68"  >
&#3592;&#3633;&#3604;&#3626;&#3656;&#3591;
<input type="radio" name="sbook" id="sbook"  onClick="document.getElementById('sbinv_code').disabled=false;document.getElementById('sbinv_code').focus();document.getElementById('ccheckr').value = '2';" value="2" tabindex="68"  >
&#3619;&#3633;&#3610;&#3648;&#3629;&#3591;
<select name="sbinv_code" id="sbinv_code" style="width:120px"   tabindex="68"  disabled="disabled">
  <option value="">สำนักงานใหญ่</option>
  <?					
		  if(empty($sinv_code))$sinv_code = 'BKK1';

						$result1=mysql_query("select * from ".$dbprefix."invent order by inv_code");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->inv_code."\" ";
							if ("BKK1"==$row1->inv_code) {echo "selected";}
							echo ">".$row1->inv_desc."</option>";
						}
						?>
</select></td>
            <td colspan="2" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td align="right">การชำระเงิน</td>
            <td><input type="radio"   name="scheck" id="scheck"  value="1" tabindex="68"  >
              โอนเงิน
                <input type="radio" name="scheck" id="scheck"   value="2" tabindex="68"  > 
                บัครเครดิต
</td>
            <td colspan="2" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4" align="center"><input name="button" type="button" tabindex="80" onClick="<?=(isset($_GET['id'])?"emembercheck()":"imembercheck()")?>" value="&#3605;&#3619;&#3623;&#3592;&#3626;&#3629;&#3610;" >
              &nbsp;
              <input type="submit" value="&#3610;&#3633;&#3609;&#3607;&#3638;&#3585;" name="ok"  id="ok" disabled tabindex="81" >
              &nbsp;
              <input name="reset" type="reset" tabindex="82"  onclick="window.location='index.php?sessiontab=1'" value="&#3618;&#3585;&#3648;&#3621;&#3636;&#3585;" ></td>
          </tr>
        </table></td>


  	</tr>

    <tr>
      <td>
<!--member Information--></td>
    </tr>
  </table>
<br />
      <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font></div>
  <input  type="hidden" id="ccheckr" name="ccheckr" value="">
</form>

 
 </td></tr></table>
<? include "footer.php";?>
</body>
</html>