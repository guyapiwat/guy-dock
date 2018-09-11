<? include("global.php");?>
<?
$_SESSION["perbuy"] = 1;
?>
<style>
.error {
text-align: center;
background-color: red;
padding: 10px;
color: #fff;
font-weight: bolder;
cursor: pointer;
}
.error2 {
text-align: center;
background-color: red;
padding: 10px;
color: #fff;
font-weight: bolder; 
}

.red{
   color: red; 
}
.green{
   color: green; 
}
.payment-item table {
  /* font-family: "Helvetica Neue", Helvetica, sans-serif;*/
   width: 100%;
}
.payment-item a {
 cursor: pointer;
}

.payment-item caption {
text-align: left;
  color: silver;
  font-weight: bold;
  text-transform: uppercase;
  padding: 5px;
}

.payment-item thead {
  background: #FFCC33;
color: #000;
}

.payment-item th,.payment-item td {
  padding: 5px 10px;
}

.payment-item tbody tr:nth-child(even) {
  background: WhiteSmoke;
}

.payment-item tbody tr td:nth-child(2) {
  text-align:center;
}

.payment-item tbody tr td:nth-child(4),tbody tr td:nth-child(5) {
 /* text-align: right; */
  font-family: monospace;
}

.payment-item tfoot {
  background: SeaGreen;
  color: white;
  text-align: right;
}

.payment-item tfoot tr th:last-child {
  font-family: monospace;
}
.submit {    
	background-color: #FDF5CE !important;
}
.waiting {    
text-align: center;
/* background-color: #FFFFFF; */
/* width: 81px; */
padding: 10px;
color: #5AC716;
margin: 0 auto;
font-weight: 900;
}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script type="text/javascript"> 

$(function(){
/*	สามารถเปลี่ยนจาก citizen_ เป็นค่าที่ต้องการ  */
$("input[name^='zip_']").keyup(function(event){<? include("global.php");?>
<?
$_SESSION["perbuy"] = 1;
?>
</script>
<script type="text/javascript"> 
$(function(){
/*	สามารถเปลี่ยนจาก citizen_ เป็นค่าที่ต้องการ  */
$("input[name^='zip_']").keyup(function(event){
	if(event.keyCode==5){
		if($(this).val().length==0){
			$(this).prev("input").focus();  
		}
		return false;
	}		    
	if($(this).val().length==$(this).attr("maxLength")){
		$(this).next("input").focus();
	}
});	
});
$(function(){
/*	สามารถเปลี่ยนจาก citizen_ เป็นค่าที่ต้องการ  */
$("input[name^='czip_']").keyup(function(event){
	if(event.keyCode==5){
		if($(this).val().length==0){
			$(this).prev("input").focus();  
		}
		return false;
	}		    
	if($(this).val().length==$(this).attr("maxLength")){
		$(this).next("input").focus();
	}
});	
});
$(function(){
/*	สามารถเปลี่ยนจาก citizen_ เป็นค่าที่ต้องการ  */
$("input[name^='acc_no_']").keyup(function(event){
	if(event.keyCode==10){
		if($(this).val().length==0){
			$(this).prev("input").focus();  
		}
		return false;
	}		    
	if($(this).val().length==$(this).attr("maxLength")){
		$(this).next("input").focus();
	}
});	
});

</script>
<script type="text/javascript">
function checkForm(frm)
{
//
// check form input values
//

frm.ok.disabled = true;
// frm.ok.value = "Please wait...";
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
function onclickaddress(){

if(document.forms[0].chkaddress.checked == true){
	document.getElementById('caddress').value=document.getElementById('address').value;
	document.getElementById('caddress').value=document.getElementById('address').value;
	document.getElementById('cbuilding').value=document.getElementById('building').value;
	document.getElementById('cvillage').value=document.getElementById('village').value;
	document.getElementById('csoi').value=document.getElementById('soi').value;
	document.getElementById('cstreet').value=document.getElementById('street').value;
	checkaddress(document.getElementById('cprovince').value=document.getElementById('province').value,document.getElementById('camphur').value=	document.getElementById('amphur').value,document.getElementById('cdistrict').value=document.getElementById('district').value);
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
function onclickcmems(){

if(document.forms[0].chkcmem.checked == true){
	document.getElementById('cname_e').removeAttribute("disabled");
	document.getElementById('cname_t').removeAttribute("disabled");
	document.getElementById('cname_f').removeAttribute("disabled");
	document.forms[0].csex[0].removeAttribute("disabled");
	document.forms[0].csex[1].removeAttribute("disabled");
	document.getElementById('cbirthday1').removeAttribute("disabled");
	document.getElementById('cbirthday2').removeAttribute("disabled");
	document.getElementById('cbirthday3').removeAttribute("disabled");
	document.getElementById('cnational').removeAttribute("disabled");
	document.getElementById('cid_card').removeAttribute("disabled");
	document.getElementById('chome_t').removeAttribute("disabled");
	document.getElementById('cmobile').removeAttribute("disabled");
	document.getElementById('cfax').removeAttribute("disabled");
	document.getElementById('cemail').removeAttribute("disabled");
  }else{
	document.getElementById('cname_e').setAttribute("disabled","disabled");
	document.getElementById('cname_t').setAttribute("disabled","disabled");
	document.getElementById('cname_f').setAttribute("disabled","disabled");
	document.forms[0].csex[0].setAttribute("disabled","disabled");	  
	document.forms[0].csex[1].setAttribute("disabled","disabled");	
	document.getElementById('cbirthday1').setAttribute("disabled","disabled");
	document.getElementById('cbirthday2').setAttribute("disabled","disabled");
	document.getElementById('cbirthday3').setAttribute("disabled","disabled");
	document.getElementById('cnational').setAttribute("disabled","disabled");
	document.getElementById('cid_card').setAttribute("disabled","disabled");
	document.getElementById('chome_t').setAttribute("disabled","disabled");
	document.getElementById('cmobile').setAttribute("disabled","disabled");
	document.getElementById('cfax').setAttribute("disabled","disabled");
	document.getElementById('cemail').setAttribute("disabled","disabled");
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
					 document.getElementById("zip_1").value=data.trim(); //แสดงผล
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
					//alert(data);
					 document.getElementById("czip_1").value=data.trim(); //แสดงผล
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
				document.getElementById("idchksaddress").innerHTML=data.trim(); //แสดงผล
				}
		   }
	  }
 };
 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
 req.send(null); //ทำการส่ง
}
function sendget_sponsor(value) {
 var req = Inint_AJAX(); //สร้าง Object
 //alert(value)
value = str_pad(value,7,0,false);
value = value.toUpperCase();
//alert(value)
//alert(test);
 req.open('GET', 'search_memberm.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
 req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
	  if (req.readyState==4) {
		   if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
				var data=req.responseText.trim(); 
				var myarr = data.split("|");
	
				 //ข้อความที่ได้มาจากการทำงานของ test3.php
				//alert(req.responseText);
				if(data.trim() == 1234){
				document.getElementById('sp_code').value="";
				document.getElementById("sp_name").value="ไม่ได้อยู่ในสายงาน";
				//document.getElementById('upa_code').value="";
				//document.getElementById("sp_name").value="ไม่ได้อยู่ในสายงาน";
				document.getElementById("l1").innerHTML="";//แสดงผล
				document.getElementById("l2").innerHTML="";
				//document.getElementById("l3").innerHTML="";

				}else{
				document.getElementById('sp_code').value=value;
				document.getElementById("sp_name").value=myarr[0].trim();
				//document.getElementById('upa_code').value=value;
				//document.getElementById("upa_name").value=myarr[0].trim();
				document.getElementById("l1").innerHTML="รหัส "+myarr[1];//แสดงผล
				document.getElementById("l2").innerHTML="รหัส "+myarr[2];
				//document.getElementById("l3").innerHTML="รหัส "+myarr[3];

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
					var myArray = data.split(':');
					var left = myArray[0];
					var right = myArray[1];
					var name = myArray[2];
					var left = left.trim();

					document.getElementById('upa_code').value=value;
					document.getElementById("upa_name").value=name; //แสดงผล
					
					 if(document.getElementById('oid').value == ''){
						 if(left == '1' && right == '1'){
							alert('อัพไลน์มีขา 2 ด้านแล้ว');

							document.getElementById('upa_code').value="";
							document.forms[0].lr[0].disabled = true;
							document.forms[0].lr[0].checked = false;
							document.forms[0].lr[1].disabled = true;
							document.forms[0].lr[1].checked = false;
						}else {
							var l_alert = document.forms[0].lr[0].checked;
							var r_alert = document.forms[0].lr[1].checked;
							
							if(left == '1'){
								if(l_alert == true)alert('อัพไลน์มีด้านซ้าย มีแล้ว');
								document.forms[0].lr[0].disabled = true;
								document.forms[0].lr[0].checked = false;
							}
							else {
								document.forms[0].lr[0].disabled = false;
							}

							if(right == '1'){
								if(r_alert == true)alert('อัพไลน์มีด้านขวา มีแล้ว');
								document.forms[0].lr[1].disabled = true;
								document.forms[0].lr[1].checked = false;
							}
							else {
								document.forms[0].lr[1].disabled = false;
							}
							document.getElementById('upa_code').value=value;
							document.getElementById("upa_name").value=name; //แสดงผล
						 }
					 }else{
							document.getElementById('upa_code').value=value;
							document.getElementById("upa_name").value=name; //แสดงผล
					 }
					

					 
					
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

<script language="javascript">

var wi=null;
function get_mem_listpicker_sp_code(){
	if (wi) wi.close();
	wi=window.open("mem_listpicker_sp_code.php?name="+this.frm.sp_name.value+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_mem_listpicker_upa_code(){
	if (wi) wi.close();
wi=window.open("mem_listpicker_upa_code.php?name="+this.frm.upa_name.value+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_mem_listpicker_mcode_acc(){
	if (wi) wi.close();
//alert(this.getElementById('mcode_acc_name').innerHTML);
wi=window.open("mem_listpicker_mcode_acc.php?name=?","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
//wi=window.open("mem_listpicker_mcode_acc.php?name="+this.getElementById('mcode_acc_name').innerHTML+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
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
function checkMemberExit(){
var mcode = $('input[name=mcode]').val();
var fmcode = $('select[name=fmcode]').val();
queryString = 'mcode='+mcode+'&fmcode='+fmcode;
link = '<?=$actual_link?>branch/checkMemberExit.php'; 
$.post(link,queryString,function(data){ 
if(data.trim()==1){
   $('.chekMemberAlert').html('<img src="./images/false.gif"/>');
}else{
	$('.chekMemberAlert').html('<img src="./images/true.gif"/>');
}
}); 
}
function imembercheck(){

var val = '';
var field = "";
var flag = "";
var errDesc = '';

var val = document.getElementById('mcode').value;
var field = "mcode";
var flag = "1-7-0-0-0";
var errDesc = 'รหัสสมาชิก';

/*
var val = document.getElementById('upa_name').value;
var field = "upa_name";
var flag = "1-0-0-0-0";
var errDesc = 'ชื่ออัพไลน์';


val = val + ","+document.getElementById('upa_code').value;
field = field +",upa_code";
flag = flag+",1-7-0-0-0-0";
errDesc = errDesc + ",รหัสอัพไลน์";
*/
val = val + ","+document.getElementById('sp_code').value;
field = field +",sp_code";
flag = flag+",1-9-0-0-0-0";
errDesc = errDesc + ",รหัสผู้แนะนำ";

val = val + ","+document.getElementById('sp_name').value;
field = field +",sp_name";
flag = flag+",1-0-0-0-0-0";
errDesc = errDesc + ",ชื่อผู้แนะนำ";

val = val + ","+document.getElementById('name_f').value;
field = field +",name_f";
flag = flag+",1-0-0-0-0";
errDesc = errDesc + ",คำนำหน้าชื่อ";

val = val + ","+document.getElementById('name_t').value;
field = field +",name_t";
flag = flag+",1-0-0-0-0";
errDesc = errDesc + ",ชื่อ-นามสกุล";

val = val + ","+document.getElementById('birthday1').value;
field = field +",birthday1";
flag = flag+",1-0-0-0-0";
errDesc = errDesc + ",วันเกิด";

 val = val + ","+document.getElementById('birthday2').value;
field = field +",birthday2";
flag = flag+",1-0-0-0-0";
errDesc = errDesc + ",เดือนเกิด";

 val = val + ","+document.getElementById('birthday3').value;
field = field +",birthday3";
flag = flag+",1-0-0-0-0";
errDesc = errDesc + ",ปีเกิด";


val = val + ","+document.getElementById('id_card').value;
field = field +",id_card";
flag = flag+",1-0-0-1-0";
errDesc = errDesc + ",เลขประจำตัวประชาชน";

val = val + ","+document.getElementById('mobile').value;
field = field +",mobile";
flag = flag+",1-0-0-0-0";
errDesc = errDesc + ",เบอร์โทร";

if(document.getElementById('national').value == 'Thailand'){
	val = val + ","+document.getElementById('address').value;
	field = field +",address";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",เลขที่/ห้อง";

	val = val + ","+document.getElementById('province').value;
	field = field +",province";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",จังหวัด";

	val = val + ","+document.getElementById('amphur').value;
	field = field +",amphur";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",อำเภอ";

	val = val + ","+document.getElementById('district').value;
	field = field +",district";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ตำบล";

	val = val + ","+document.getElementById('zip_1').value;
	field = field +",zip_1";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสไปรษณีย์";

	val = val + ","+document.getElementById('caddress').value;
	field = field +",caddress";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",เลขที่/ห้อง จัดส่ง";

	val = val + ","+document.getElementById('cprovince').value;
	field = field +",cprovince";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",จังหวัด จัดส่ง";

	val = val + ","+document.getElementById('camphur').value;
	field = field +",camphur";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",อำเภอ จัดส่ง";

	val = val + ","+document.getElementById('cdistrict').value;
	field = field +",cdistrict";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ตำบล จัดส่ง";

	val = val + ","+document.getElementById('czip_1').value;
	field = field +",czip_1";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสไปรษณีย์ จัดส่ง";

}


if(document.getElementById('email').value != ''){
	var Email=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if(!document.getElementById('email').value.match(Email)){
	alert('รูปแบบอีเมลล์ไม่ถูกต้อง');
	document.getElementById('email').focus();
	exit;
	}

}
var radios = document.getElementsByName('chk_pay'); 
var pay = 0;
for (var i = 0, length = radios.length; i < length; i++) {
	if (radios[i].checked) {
		 if(radios[i].value == 'chkTransfer' && document.getElementById('selectTransfer').value == ''){
		   alert('รูปแบบการชำระ');
		   document.getElementById('selectTransfer').focus();
		   exit;
		 } 
		 pay = pay+1;
	}
}
if(pay == 0){
	 alert('เลือกการชำระ');
	 document.getElementById('chk_pay').focus();
	 exit;
} 


if(document.getElementById('chk_pay').value == 'chkTransfer'){
	
  alert(document.getElementById('chk_pay').value) ; 
}
if(document.getElementById('national').value == 'Thailand'){
	var a = document.getElementById('id_card').value;
	var id_card = "";
	var t = a.split("-");  //ถ้าเจอวรรคแตกเก็บลง array t
	for(var i=0; i<t.length ; i++){
		id_card = id_card+ t[i];
	}
	var id = document.getElementById('id_card').value;
	
		if( id.charAt(0) < 1 || id.charAt(0) > 8 ) {alert("เลขบัตรประชาชนใช้ไม่ได้ค่ะ"); document.getElementById('ok').disabled = true;document.getElementById('id_card').focus();exit;}
		for(i=0,sum=0;i<12;i++){
			sum += parseInt(id.charAt(i))*(13-i);
		}
		sum = sum%11;
		if(sum <= 1) 
			sum = 1-sum;
		else
			sum = 11-sum;
		if(sum != parseInt(id.charAt(12))){alert("เลขบัตรประชาชนใช้ไม่ได้ค่ะ");document.getElementById('ok').disabled = true;document.getElementById('id_card').focus();
		exit;}

/*
	val = val + ","+document.getElementById('id_card').value;
	field = field +",id_card";
	flag = flag+",1-13-0-1-0";
	errDesc = errDesc + ",เลขบัตรประชาชนใช้ไม่ได้ค่ะ";
*/
	
}

var lrval="";
var object = eval(document.frm.lr);
for(i=0;i<object.length;i++){
	if(object[i].checked==true)
		lrval = object[i].value;
}

if(lrval == ''){
//	document.getElementById('lr').focus();
	alert('<?=$wording_lan["tab1_mem_114"]?>');
	exit;
}

/*

var lrval="";
var object = eval(document.frm.lr);
for(i=0;i<object.length;i++){
	if(object[i].checked==true)
		lrval = object[i].value;
}
 if(lrval == ''){
	document.getElementById('lr').focus();
	alert("กรุณาเลือกซ้ายขวา");
	exit;
}
if(document.getElementById('upa_code').value!=""){
	val = val + ","+lrval+"#"+document.getElementById('upa_code').value;
	field = field +",lr#upa_code";
	flag = flag+",1-0-0-1-0";
	errDesc = errDesc + ",ด้าน";
}
*/

document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
startRQ(field,val,"",flag,errDesc,"member","checkstate");

}

function resetpic(){
document.getElementById("pic").src="";
document.getElementById("xpic").value="";
}
function resetpic2(){
document.getElementById("pic2").src="";
document.getElementById("xpic2").value="";
}
function  change_img() {
}


function emembercheck(){
var olr = document.getElementById('olr').value;
var val = document.getElementById('mcode').value;
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
var skipval = document.getElementById('omcode').value;

var id = document.getElementById('mcode').value;
skipval = skipval+","+document.getElementById('omcode').value;
var field = "mcode";
var flag = "0-0-0-0-0";
var errDesc = '<?=$wording_lan["word"]["mcode"]?>';

var i =0;
var j =0;
var sum =0;


val = val + ","+document.getElementById('id_card').value;
skipval = skipval+","+document.getElementById('oid_card').value;
field = field +",id_card";
flag = flag+",1-0-0-1-0";
errDesc = errDesc + ",เลขบัตรประชาชนใช้ไม่ได้ค่ะ";

val = val + ","+document.getElementById('name_t').value;
field = field +",name_t";
flag = flag+",1-0-0-0-0";
errDesc = errDesc + ',<?=$wording_lan["name"]?>';

val = val + ","+document.getElementById('mdate').value;
skipval = skipval+",";
field = field +",mdate";
flag = flag+",1-0-0-0-0";
errDesc = errDesc + ',<?=$wording_lan["startdate"]?>';

if(document.getElementById('national').value == 'Thailand'){
		
	val = val + ","+document.getElementById('id_card').value;
	field = field +",id_card";
	flag = flag+",1-13-0-0-0";
	errDesc = errDesc + ",เลขบัตรประชาชนใช้ไม่ได้ค่ะ";
	
	val = val + ","+document.getElementById('address').value;
	field = field +",address";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",เลขที่/ห้อง";

	val = val + ","+document.getElementById('province').value;
	field = field +",province";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",จังหวัด";

	val = val + ","+document.getElementById('amphur').value;
	field = field +",amphur";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",อำเภอ";

	val = val + ","+document.getElementById('district').value;
	field = field +",district";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ตำบล";

	val = val + ","+document.getElementById('zip_1').value;
	field = field +",zip_1";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสไปรษณีย์";

	val = val + ","+document.getElementById('caddress').value;
	field = field +",caddress";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",เลขที่/ห้อง จัดส่ง";

	val = val + ","+document.getElementById('cprovince').value;
	field = field +",cprovince";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",จังหวัด จัดส่ง";

	val = val + ","+document.getElementById('camphur').value;
	field = field +",camphur";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",อำเภอ จัดส่ง";

	val = val + ","+document.getElementById('cdistrict').value;
	field = field +",cdistrict";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ตำบล จัดส่ง";

	val = val + ","+document.getElementById('czip_1').value;
	field = field +",czip_1";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสไปรษณีย์ จัดส่ง";
}

/*
val = val + ","+document.getElementById('id_card').value;
field = field +",id_card";
flag = flag+",1-13-0-0-0";
errDesc = errDesc + ",เลขบัตรประชาชนใช้ไม่ได้ค่ะ";
*/
if(document.getElementById('national').value == 'Thailand'){
	var a = document.getElementById('id_card').value;
	var id_card = "";
	var t = a.split("-");  //ถ้าเจอวรรคแตกเก็บลง array t
	for(var i=0; i<t.length ; i++){
		id_card = id_card+ t[i];
	}
	var id = document.getElementById('id_card').value;
	
		if( id.charAt(0) < 1 || id.charAt(0) > 8 ) {alert("เลขบัตรประชาชนใช้ไม่ได้ค่ะ"); document.getElementById('ok').disabled = true;document.getElementById('id_card').focus();exit;}
		for(i=0,sum=0;i<12;i++){
			sum += parseInt(id.charAt(i))*(13-i);
		}
		sum = sum%11;
		if(sum <= 1) 
			sum = 1-sum;
		else
			sum = 11-sum;
		if(sum != parseInt(id.charAt(12))){alert("เลขบัตรประชาชนใช้ไม่ได้ค่ะ");document.getElementById('ok').disabled = true;document.getElementById('id_card').focus();
		exit;}



	
}


document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
//alert(skipval);
startRQ(field,val,skipval,flag,errDesc,"member","checkstate");
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
$sql = "SELECT MAX(mcode) AS code FROM ".$dbprefix."member  ";
$rs = mysql_query($sql);
$code = mysql_result($rs,0,'code');
//$bmcode = substr($code,2,$bcsize);




//$bmcode +=1;
//for($i=strlen($bmcode);$i<$bcsize;$i++){
//$bmcode = "0".$bmcode;
//}

//$mcode = gencode_new("",$code+1);
//$sv_code = substr($mcode,3,strlen($mcode));
//$sv_code = rand(1000,9999);
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
		$name_ff=$row->name_f;
			$cname_f=$row->cname_f;
			$cname_ff=$row->cname_f;
		$name_t=$row->name_t;
			$cname_t=$row->cname_t;
		$oid_name_t=$row->name_t;
			$coid_name_t=$row->cname_t;
		$name_e=$row->name_e;
			$cname_e=$row->cname_e;
		$name_b=$row->name_b;
			$cname_b=$row->cname_b;
		$sex=$row->sex;
			$csex=$row->csex;
		$age = $row->age;
			$cage = $row->cage;
		$occupation = $row->occupation;
		$status = $row->status;
		$mar_name = $row->mar_name;
		$mar_age = $row->mar_age;
		$email = $row->email;
			$cemail = $row->cemail;
		$beneficiaries = $row->beneficiaries;
		$relation = $row->relation;
		$national = $row->national;
		$mdate=$row->mdate;
		$birthday=$row->birthday;
			//		var_dump($birthday);

			$cbirthday=$row->cbirthday;
		$national=$row->national;
			$cnational=$row->cnational;
		$id_tax=$row->id_tax;
			$cid_tax=$row->cid_tax;
		$oid_card=$id_card=$row->id_card;
			$coid_card=$cid_card=$row->cid_card;
		$address=$row->address;
		$building=$row->building;
		$village=$row->village;
		$soi=$row->soi;
		$street=$row->street;
		$type_com=$row->type_com;
			$caddress=$row->caddress;
			$cbuilding=$row->cbuilding;
			$cvillage=$row->cvillage;
			$csoi=$row->csoi;
			$cstreet=$row->cstreet;
			$txtoption=$row->txtoption;
		$provinceId=$row->provinceId;
			$cprovinceId=$row->cprovinceId;
		$amphurId=$row->amphurId;
			$camphurId=$row->camphurId;
		$districtId=$row->districtId;
			$cdistrictId=$row->cdistrictId;
		$zip=$row->zip;
			$czip=$row->czip;
		$home_t=$row->home_t;
			$chome_t=$row->chome_t;
		$fax = $row->fax;
			$cfax = $row->cfax;
			$type_com = $row->type_com;
			$atocom = $row->atocom;
	   
		$mobile=$row->mobile;
			$cmobile=$row->cmobile;
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
		$inv_code=$row->inv_code;
		$usercode=$row->usercode;
		$posid=$row->posid;
		$pos_cur=$row->pos_cur;
		$memdesc=$row->memdesc;
		$bmdate1=$row->bmdate1;

		$bmdate2=$row->bmdate2;
		$bmdate3=$row->bmdate3;
		$cbmdate1=$row->cbmdate1;
		$cbmdate2=$row->cbmdate2;
		$cbmdate3=$row->cbmdate3;

		$olr=$lr=$row->lr;

		$camphurId = $camphur = getamphurId($camphurId);
		$cprovinceId = $cprovince = getprovinceId($cprovinceId);
		$cdistrictId = $cdistrict = getdistrictId1($cdistrictId,$camphurId,$cprovinceId);
		$amphurId = $amphur = getamphurId($amphurId);
		$provinceId = $province = getprovinceId($provinceId);
		$districtId = $district = getdistrictId1($districtId,$amphurId,$provinceId);
		$myfile1=$row->id_card_img;
		$myfile2=$row->acc_no_img;
		$cmp=$row->cmp;
		$cmp2=$row->cmp2;
		$cmp3=$row->cmp3;
		$ccmp=$row->ccmp;
		$ccmp2=$row->ccmp2;
		$ccmp3=$row->ccmp3;
		$iname_t=$row->iname_t;
		$irelation=$row->irelation;
		$iphone=$row->iphone;
		$iid_card=$row->iid_card;
		$mlocationbase=$row->locationbase;
					$mtype=$row->mtype;
					$mtype1=$row->mtype1;
					$mtype2=$row->mtype2;
					$mvat=$row->mvat;
		$line_id=$row->line_id;
		$facebook_name=$row->facebook_name;

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
			if(!empty($cbirthday)){
				$cbirthday_d=substr($cbirthday,8);
				$cbirthday_m=substr($cbirthday,5,2);
				$cbirthday_y=substr($cbirthday,0,4);
				if ($cbirthday_y>"0"){
					$cbirthday_y+=543;
				}
				else {$cbirthday_y="";}

			}
		}
		$birthday = explode('-',$birthday);
		//var_dump($birthday);
		$cbirthday = explode('-',$cbirthday);
		if($mlocationbase == '1')$birthday3 = $birthday[0]+543;else $birthday3 = $birthday[0];
		if($mlocationbase == '1')$cbirthday3 = $cbirthday[0]+543;else $cbirthday3 = $cbirthday[0];

		$birthday2 = $birthday[1];
		$cbirthday2 = $cbirthday[1];
		$birthday1 = $birthday[2];
		$cbirthday1 = $cbirthday[2];
	}
}else{
	if (isset($_GET["sp_code"])){$sp_code=$_GET["sp_code"];}
	if (isset($_GET["sp_name"])){$sp_name=$_GET["sp_name"];}
	if (isset($_GET["upa_code"])){$upa_code=$_GET["upa_code"];}
	if (isset($_GET["upa_name"])){$upa_name=$_GET["upa_name"];}
	if (isset($_GET["lr"])){$lr=$_GET["lr"];}
}
if(empty($cnational))$cnational = 'Thailand';
if(empty($national))$national = 'Thailand';
?>
<div id="err"></div>

<form name='frm' method="POST" onKeyDown="document.getElementById('ok').disabled=true;" action="memoperate.php?state=<?=$_GET['id']==""?0:1?>"  onsubmit="return checkForm(this)" enctype="multipart/form-data">
<input type="hidden" name="oid"  id="oid" value="<?=$oid?>">
<input type="hidden" name="sub"  id="sub" value="<?=$_GET['sub']?>">
<table width="100%" border="0">
	<tr>
		<td>
			<!--business information--> 
			<table width="100%" border="0">
				<tr bgcolor="#FFCC33"  >
					<td colspan="2" align="center"><b>&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3612;&#3641;&#3657;&#3649;&#3609;&#3632;&#3609;&#3635;</b></td>
					<td colspan="2" align="center">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" >
					<!--input type="hidden" id="omcode" name="omcode" value="<?=$mcode?>" /-->
					<input type="hidden" name="id" readonly size="10" value="<?=$id;?>" />
					&nbsp;&nbsp;&nbsp;วันที่สมัคร:
					<input type="text" id="mdate" tabindex="1" name="mdate" size="10" maxlength="10" value="<?=($mdate==""?date("Y-m-d"):$mdate)?>" />
					<?if($mcode != ''){?><BR>รหัสสมาชิก : <?echo $mcode;?>
					<input type="hidden"  id="mcode" name="mcode" size="10" readonly maxlength="7" value="<?=$mcode?>"  />
					<input type="hidden" id="omcode" name="omcode" value="<?=$mcode?>" />
					<input type="hidden" name="id" readonly size="10" value="<?=$id;?>" /><?}else{?>
					<BR>&nbsp;รหัสสมาชิก: 
					<select name="fmcode" id="fmcode">
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
						<option value="MY">MY</option>

					</select>
					<input type="text" id="mcode" tabindex="1" name="mcode" size="10" maxlength="7" value="" onKeyPress="checkMemberExit(); return chknum(window.event.keyCode);" onChange="checkMemberExit();"  /> <span class="chekMemberAlert"></span>
					<?}?></td>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td align="right"><?=$wording_lan["tab1_mem_4"]?><font color="#ff0000">*</font></td>
					<td>
						<input tabindex="2" <? if(!empty($_GET["id"])){echo 'readonly'; echo ' style="background-color:#CCCCCC"';}?>   type="text" name="sp_code" id="sp_code" size="20"  maxlength="9" value="<?=$sp_code?>" />
						<input name="button2"  tabindex="3" type="button"   
						<? if(!empty($_GET["id"]))echo ' style="display:none"'; ?>  onClick="sendget_sponsor(document.getElementById('sp_code').value)" value="<?=$wording_lan["tab1_mem_121"]?>" />
						
						<? if(!empty($_GET["sp_code"])) { echo "<script> sendget_sponsor('".$_GET["sp_code"]."')</script>";} ?>

						<!--input name="button2"  tabindex="4" type="button"  <? if(!empty($_GET["id"]))echo ' style="display:none"'; ?> onClick="document.getElementById('ok').disabled=true;get_mem_listpicker_sp_code()" value="<?=$wording_lan["tab1_mem_122"]?>" />

						<input name="button2"  tabindex="5" type="button" <? if(!empty($_GET["id"]))echo ' style="display:none"'; ?> onClick="document.getElementById('sp_code').value='';document.getElementById('sp_name').value='';document.getElementById('lr').value='';document.getElementById('lr_name').value='';" value="<?=$wording_lan["tab1_mem_123"]?>" /-->

					</td>
					<td align="right"><?=$wording_lan["tab1_mem_9"]?><font color="#ff0000">*</font></td>
					<td>
						<?

							$rs = mysql_query("SELECT * FROM ".$dbprefix."lr_def");
							for($i=0;$i<mysql_num_rows($rs);$i++){
						?>
						<div  style="clear:both">
							<div class="lr" style=" width: 70px;   float: left;">
							<input tabindex="6" onClick="document.getElementById('ok').disabled=true;" type="radio" name="lr" <?=$lr==mysql_result($rs,$i,'lr_id')?"checked":""?> value="<?=	mysql_result($rs,$i,'lr_id')?>"  />
								<?=mysql_result($rs,$i,'lr_name')."สุด"?>
							</div>
							<div id="l<?=mysql_result($rs,$i,'lr_id')?>"></div>
						</div>
						<?
							}
							mysql_free_result($rs);
						?>
						<input type="hidden" name="olr" id="olr" value="<?=$olr?>" /></td>
				</tr>
				<tr>
					<td width="20%" align="right"><?=$wording_lan["tab1_mem_6"]?>
						<font color="#ff0000">*</font>
					</td>
					<td width="27%">
						<input style="background-color:#CCCCCC" readonly type="text" name="sp_name" id="sp_name" size="40"  maxlength="40" value="<?=$sp_name?>" />

					</td>
				</tr>
				<tr>
<td align="right">ประเภท</td>
<td><? //if(!empty($_GET['id'])){?>
 
<select name="mtype1">
	<?php
	foreach($arr_mtype1 as $key => $value):
	echo '<option value="'.$key.'"';
			if($mtype1==$key)echo "selected";
	echo'>'.$value.'</option>'; //close your tags!!
	endforeach;
	?>
</select>
<font color=red style="display:none" >VIP</font>
<select name="mtype2" style="display:none">
	<?php
	foreach($arr_mtype2 as $key => $value):
	echo '<option value="'.$key.'"';
			if($mtype2==$key)echo "selected";
	echo'>'.$value.'</option>'; //close your tags!!
	endforeach;
	?>
</select>
<? //}else {?>

<?//}?>	</td>
				</tr>
			</table>    
		</td>
	</tr>
	<tr>
		<td>
			<!--member Information-->
				<table width="100%" border="0">
					<tr bgcolor="#FFCC33" >
						<td colspan="2" align="center">
							<b>ข้อมูลผู้สมัคร</b>
						</td>
						<td colspan="2" align="center" >
							<b>ข้อมูลผู้สมัครร่วม </b>
							<input type="checkbox" name="chkcmem" id="chkcmem" value="1"  tabindex="53"   onClick="onclickcmems(this.value);" />
						</td>
					</tr>
					<tr style="display:none">
						<td align="right">ช่องทางการเงิน</td>
						<td>&nbsp;
							<select size="1"  name="type_com" id="type_com" tabindex="10">
								<option value="" <?if($type_com=="")echo 'selected';?>>เข้า Ewallet</option>
							</select>
						</td>
					</tr>
					<tr >
						<td align="right">Withdraw</td>
						<td>&nbsp;
							<select size="1"  name="atocom" id="atocom" tabindex="10">
								<option value="0" <?if($atocom=="0")echo 'selected';?>>auto</option>
								<option value="1" <?if($atocom=="1")?>>no auto</option>
							</select>
						</td>
					</tr>

					<tr>
						<td align="right">Location Base</td>
						<td>&nbsp;
							<select size="1"  name="locationbase" id="locationbase" tabindex="10">
								<?					
									$result1=mysql_query("select * from ".$dbprefix."location_base order by cid");
									for ($i=1;$i<=mysql_num_rows($result1);$i++){
										$row1 = mysql_fetch_object($result1);
										//echo "<option value=\"\" ";
										echo "<option value=\"".$row1->cid."\" ";
										if(!empty($cid)){
											if ($cid==$row1->cid) {echo "selected";}
										}else{
											if ($mlocationbase==$row1->cid) {echo "selected";}
										}
										echo ">".$row1->cname."</option>";
									}
								?>
							</select>
						</td>
						<td align="right">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="right">Member Type</td>
						<td>
							<input type="radio"  name="mtype" id="mtype" value="0" tabindex="10"  <? if($mtype=="0" or empty($mtype)) echo "checked=\"checked\""; ?>>บุคคลธรรมดา
							<input type="radio" name="mtype" id="mtype"  value="1" tabindex="10"  <? if($mtype=="1") echo "checked=\"checked\""; ?>>นิติบุคคล
							</td>
						<td align="right">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="right">Vat </td>
						<td>
							<input type="radio"  name="mvat" id="mvat" value="0" tabindex="10"  <? if($mvat=="0" or empty($mvat)) echo "checked=\"checked\""; ?>>
						  No Vat
							<input type="radio" name="mvat" id="mvat"  value="1" tabindex="10"  <? if($mvat=="1") echo "checked=\"checked\""; ?>>
							Vat
						</td>
						<td align="right">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td width="19%" align="right">
							&#3588;&#3635;&#3609;&#3635;&#3627;&#3609;&#3657;&#3634;&#3594;&#3639;&#3656;&#3629;
							<font color="#ff0000">*</font>&nbsp;
						</td>
						<td width="27%">
							<select tabindex="12" name="name_f" id="name_f" onChange="getRadioValueByName(this.value);document.getElementById('name_ff').value=this.value;
									if(this.value == '123'){document.getElementById('name_ff').value = '';
										document.getElementById('name_ff').style.display  = '';
										document.getElementById('name_ff').focus();}
									else {
										document.getElementById('name_ff').style.display  = 'none';
							}">
								<option  value="" <?=($name_f==""?"selected":"")?>>เลือกคำนำหน้า</option>
								<option  value="นาย" <?=($name_f=="นาย"?"selected":"")?>>นาย</option>
								<option value="นางสาว" <?=($name_f=="นางสาว"?"selected":"")?>>นางสาว</option>
								<option value="นาง" <?=($name_f=="นาง"?"selected":"")?>>นาง</option>
								<option value="บริษัทจำกัด" <?=($name_f=="บริษัทจำกัด"?"selected":"")?>>บริษัทจำกัด</option>
								<option value="ห้างหุ้นส่วนจำกัด" <?=($name_f=="ห้างหุ้นส่วนจำกัด"?"selected":"")?>>ห้างหุ้นส่วนจำกัด</option>
								<option value="123" <?=($name_f=="อื่นๆ"?"selected":"")?>>อื่นๆ</option>
							</select>
							<input type="text" name="name_ff" style="display:none;"  id="name_ff" value="<?=$name_ff?>" tabindex="13"  />
						</td>
						<td width="22%" align="right">		
							&#3588;&#3635;&#3609;&#3635;&#3627;&#3609;&#3657;&#3634;&#3594;&#3639;&#3656;&#3629;&nbsp;
						</td>
						<td width="32%">
							<select name="cname_f"  tabindex="27" disabled  id="cname_f" onChange="getRadioValueByName1(this.value);document.getElementById('cname_ff').value=this.value;
								if(this.value == '123'){
								document.getElementById('cname_ff').value = '';
								document.getElementById('cname_ff').readOnly  = false;
								document.getElementById('cname_ff').style.display  = '';
								document.getElementById('cname_ff').focus();
								}else {
								document.getElementById('cname_ff').style.display  = 'none';
								document.getElementById('cname_ff').readOnly  = true;
							}">
								<option  value="" <?=($cname_f==""?"selected":"")?>>เลือกคำนำหน้า</option>
								<option  value="นาย" <?=($cname_f=="นาย"?"selected":"")?>>นาย</option>
								<option value="นางสาว" <?=($cname_f=="นางสาว"?"selected":"")?>>นางสาว</option>
								<option value="นาง" <?=($cname_f=="นาง"?"selected":"")?>>นาง</option>
								<option value="บริษัทจำกัด" <?=($cname_f=="บริษัทจำกัด"?"selected":"")?>>บริษัทจำกัด</option>
								<option value="ห้างหุ้นส่วนจำกัด" <?=($cname_f=="ห้างหุ้นส่วนจำกัด"?"selected":"")?>>ห้างหุ้นส่วนจำกัด</option>
								<option value="123" <?=($cname_f=="อื่นๆ"?"selected":"")?>>อื่นๆ</option>
							</select>
							<input type="text" name="cname_ff" style="display:none;" id="cname_ff" value="<?=$cname_ff?>" tabindex="28" readonly />
						</td>
					</tr>
					<tr>
						<td align="right">
							&#3594;&#3639;&#3656;&#3629;-&#3609;&#3634;&#3617;&#3626;&#3585;&#3640;&#3621; / &#3609;&#3636;&#3605;&#3636;&#3610;&#3640;&#3588;&#3588;&#3621;
							<font color="#ff0000">*</font>&nbsp;
						</td>
						<td>
							<input   type="text" id="name_t" name="name_t" onKeyUp="document.getElementById('acc_name').value=document.getElementById('name_ff').value+' '+this.value;document.getElementById('name_b').value=this.value;" size="40" maxlength="40" value="<?=$name_t?>" tabindex="14"/>
							<input type="hidden" name="oid_name_t" id="oid_name_t" maxlength="13" value="<?=$oid_name_t?>" /></td>
						<td align="right">
							&#3594;&#3639;&#3656;&#3629;-&#3609;&#3634;&#3617;&#3626;&#3585;&#3640;&#3621;&nbsp;
						</td>
						<td>
							<input type="text" id="cname_t" name="cname_t" size="40" maxlength="40" value="<?=$cname_t?>" disabled tabindex="29"/>
							<input type="hidden" name="coid_name_t" id="coid_name_t" maxlength="255" value="<?=$coid_name_t?>" />
						</td>
					</tr>
					<tr>
						<td align="right">Name &amp; LastName / Compay Name </td>
						<td>
							<input type="text" name="name_e" id="name_e" size="40" maxlength="40" value="<?=$name_e?>"  tabindex="15"/>
						</td>
						<td align="right">Name &amp; LastName&nbsp;</td>
						<td>
							<input type="text" name="cname_e" id="cname_e" size="40" maxlength="40" value="<?=$cname_e?>" disabled  tabindex="30"/>
						</td>
					</tr>
					<tr>
						<td align="right">ชื่อทางธุรกิจ</td>
						<td>
							<input type="text" id="name_b" name="name_b" size="40" maxlength="40" value="<?=$name_b?>" tabindex="16"/>
						</td>
						<td align="right">&nbsp;</td>
						<td>
							<input type="text" id="cname_b" name="cname_b" size="40" style="display:none" maxlength="40" value="<?=$cname_b?>" tabindex="31"/>
						</td>
					</tr>
					<tr>
						<td align="right">&#3648;&#3614;&#3624;<font color="#ff0000">*</font>&nbsp;</td>
						<td>
							<input type="radio" name="sex" id="sex" value="ชาย" tabindex="17" <? if($sex=="ชาย") echo "checked=\"checked\""; ?>>
							ชาย
							<input type="radio" name="sex" id="sex" value="หญิง" tabindex="18" <? if($sex=="หญิง") echo "checked=\"checked\""; ?>>
							หญิง     
						</td>
						<td align="right">&#3648;&#3614;&#3624;&nbsp;</td>
						<td>
							<input type="radio" name="csex" id="csex" value="ชาย" disabled    tabindex="32" <? if($csex=="ชาย") echo "checked=\"checked\""; ?>>
							ชาย
							<input type="radio" name="csex" id="csex" value="หญิง" disabled    tabindex="33" <? if($csex=="หญิง") echo "checked=\"checked\""; ?>>
							หญิง     
						</td>
					</tr>
					<tr>
						<td align="right">
							&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3648;&#3585;&#3636;&#3604;<font color="#ff0000">*</font>&nbsp;
						</td>
						<td nowrap="nowrap">
							<select name="birthday1"  id="birthday1">
								<option value="">
									<?=$wording_lan["tab1_mem_129"]?>
								</option>
								<?PHP
									$year =  1; for ($i = 0; $i <= 30; $i++) {echo "<option ".(gencode2($birthday1)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
								?>
							</select>
							<select  name="birthday2"  id="birthday2">
								<option value="">
									<?=$wording_lan["tab1_mem_130"]?>
								</option>
								<?PHP
									$year =  1; for ($i = 0; $i <= 11; $i++) {echo "<option ".(gencode2($birthday2)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".$montharry[gencode2($year)]."</option>"; $year++;}
								?>
							</select>
							<select  name="birthday3"  id="birthday3" >
								<option value="">
									<?=$wording_lan["tab1_mem_131"]?>
								</option>
								<?PHP
									if($mlocationbase == '1' or $mlocationbase == '' ){
										$year = date("Y")+543 - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($birthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}
									}else{
										$year = date("Y") - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($birthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}	
									}
								?>
							</select>
							<input style="display:none" type="text" name="birthday" id="birthday" size="10" maxlength="8" tabindex="19" value="<?=$birthday?>" onKeyPress="return chknum(window.event.keyCode)"  />
						</td>
						<td align="right">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3648;&#3585;&#3636;&#3604;&nbsp;</td>
						<td nowrap="nowrap">
							<select name="cbirthday1"  disabled id="cbirthday1">
								<option value="">
									<?=$wording_lan["tab1_mem_129"]?>
								</option>
								<?PHP
									$year =  1; for ($i = 0; $i <= 30; $i++) {echo "<option ".(gencode2($cbirthday1)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
								?>
							</select>
							<select  name="cbirthday2" disabled id="cbirthday2">
								<option value="">
									<?=$wording_lan["tab1_mem_130"]?>
								</option>
								<?PHP
									$year =  1; for ($i = 0; $i <= 11; $i++) {echo "<option ".(gencode2($cbirthday2)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".$montharry[gencode2($year)]."</option>"; $year++;}
								?>
							</select>
							<select  name="cbirthday3" disabled id="cbirthday3" >
								<option value="">
									<?=$wording_lan["tab1_mem_131"]?>
								</option>
								<?PHP
									if($mlocationbase == '1' or  $mlocationbase == ''){
										$year = date("Y")+543 - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($cbirthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}
									}else{
										$year = date("Y") - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($cbirthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}
						
									}
								?>
							</select>
							<input style="display:none" type="text" name="cbirthday" id="cbirthday" size="10" maxlength="8" tabindex="34" value="<?=$cbirthday?>" onKeyPress="return chknum(window.event.keyCode)"  />
							<input type="text" style="display:none" name="cbirthday" id="cbirthday" size="10" maxlength="10" tabindex="34" value="<?=$cbirthday?>" />
						</td>
					</tr>
					<tr>
						<td align="right">
							สัญชาติ<font color="#ff0000">*</font>&nbsp;
						</td>
						<td>
							<select name="national" id="national" onchange="maxleng()"  tabindex="20">
							<?				
								
								$result1=mysql_query("select * from ".$dbprefix."nation order by nation");
								echo "<option value='' selected>-เลือกสัญชาติ -</option>";
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
						</td>
						<td align="right">สัญชาติ</td>
						<td>
							<select name="cnational" disabled id="cnational"  tabindex="35">
							<?					
								$result1=mysql_query("select * from ".$dbprefix."nation order by nation");
								for ($i=1;$i<=mysql_num_rows($result1);$i++){
									$row1 = mysql_fetch_object($result1);
									//echo "<option value=\"\" ";
									echo "<option value=\"".$row1->nation."\" ";
									if($cnational=="") {echo "selected";}
									if ($cnational==$row1->nation) {echo "selected";}
									echo ">";
									if($row1->nation == 'Thailand'){
										echo 'ไทย' ;
									}else{
										echo $row1->nation;
									}
									echo "</option>";
								}
							?>  
							</select>
						</td>
					</tr>
					<tr>
					<td align="right">	
						เลขประจำตัวประชาชน/พาสปอร์ต<font color="#ff0000">*</font>&nbsp;
					</td>
					<td>


						<input  name="id_card" id="id_card"  tabindex="21"   value="<?=$id_card?>"  />
						<input type="hidden" name="oid_card" id="oid_card" maxlength="17" value="<?=$oid_card?>" /> 
						

					</td>
					<td align="right">
						เลขประจำตัวประชาชน/พาสปอร์ต
					</td>
					<td>
						<input  name="cid_card" id="cid_card" disabled tabindex="36"  maxlength="17" type="text" value="<?=$cid_card?>" onKeyPress="return chknum(window.event.keyCode)"   />
						<input type="hidden" name="coid_card" id="coid_card" maxlength="17" value="<?=$coid_card?>" />    
					</td>
						<!--
						<input type="text" name="id_card" id="id_card" maxlength="13" value="<?=$id_card?>" onkeypress="return chknum(window.event.keyCode)" />
						<td align="right">&#3619;&#3633;&#3610;&#3650;&#3610;&#3609;&#3633;&#3626;&#3612;&#3656;&#3634;&#3609;</td>
						<td> <input type="radio" value="1" <? if ($bonusrec=="1") {echo "checked";}?> name="bonusrec">
									&#3608;&#3609;&#3634;&#3588;&#3634;&#3619;
									<input type="radio" <? if ($bonusrec=="2") {echo "checked";}?> name="bonusrec" value="2">
									&#3619;&#3633;&#3610;&#3648;&#3629;&#3591;</td>
						--> 
					</tr>
					<tr>
						<td align="right">
							&#3648;&#3621;&#3586;&#3607;&#3632;&#3648;&#3610;&#3637;&#3618;&#3609;&#3609;&#3636;&#3605;&#3636;&#3610;&#3640;&#3588;&#3588;&#3621; &nbsp;
						</td>
						<td>
							<input type="text" name="id_tax" id="id_tax" value="<?=$id_tax?>" tabindex="22"  onKeyPress="return chknum(window.event.keyCode)"/>
						</td>
						<td align="right">&nbsp;</td>
						<td>
							<input type="text" name="cid_tax" style="display:none" id="cid_tax" value="<?=$cid_tax?>" tabindex="37"  onKeyPress="return chknum(window.event.keyCode)" />
						</td>
					</tr>
					<tr>
						<td align="right">
							&#3650;&#3607;&#3619;&#3624;&#3633;&#3614;&#3607;&#3660;&#3610;&#3657;&#3634;&#3609;&nbsp;
						</td>
						<td>
							<input type="text" name="home_t"  id="home_t" maxlength="20" value="<?=$home_t?>" tabindex="23"  onKeyPress="return chknum(window.event.keyCode)"/>
						</td>
						<td align="right">
							&#3650;&#3607;&#3619;&#3624;&#3633;&#3614;&#3607;&#3660;&#3610;&#3657;&#3634;&#3609;&nbsp;
						</td>
						<td>
							<input type="text" name="chome_t" disabled id="chome_t"  maxlength="20" value="<?=$chome_t?>" tabindex="38"  onKeyPress="return chknum(window.event.keyCode)"/>
						</td>
					</tr>
					<tr>
						<td align="right">
							โทรศัพท์มือถือ<font color="#ff0000">*</font>&nbsp;
						</td>
						<td>
							<input type="text" name="mobile" id="mobile"  maxlength="10" value="<?=$mobile?>"  onKeyPress="return chknum(window.event.keyCode)" tabindex="24"/>
						</td>
						<td align="right">
							โทรศัพท์มือถือ
						</td>
						<td>
							<input type="text" name="cmobile" id="cmobile" disabled  maxlength="10" value="<?=$cmobile?>" tabindex="39"  onKeyPress="return chknum(window.event.keyCode)"/>
						</td>
					</tr>
					<tr>
						<td align="right">โทรสาร </td>
						<td>
							<input type="text" name="fax" id="fax" value="<?=$fax?>"  onKeyPress="return chknum(window.event.keyCode)" tabindex="25"/>
						</td>
						<td align="right">โทรสาร </td>
						<td>
							<input type="text" name="cfax" id="cfax" disabled value="<?=$cfax?>" tabindex="40"  onKeyPress="return chknum(window.event.keyCode)"/>
						</td>
					</tr>
					<tr>
						<td align="right">อีเมล </td>
						<td><input type="text" name="email" id="email" value="<?=$email?>" tabindex="26"/></td>
						<td align="right">อีเมล </td>
						<td><input type="text" name="cemail" id="cemail" disabled value="<?=$cemail?>" tabindex="41"/></td>
					</tr>
					<tr>
						<td align="right">Line ID&nbsp;</td>
						<td><input type="text" name="line_id" id="line_id" value="<?=$line_id?>" tabindex="26"/></td>
						<td align="right"></td>
						<td></td>
					</tr>
					<tr>
						<td align="right">Facebook&nbsp;</td>
						<td><input type="text" name="facebook_name" id="facebook_name" value="<?=$facebook_name?>" tabindex="26"/></td>
						<td align="right"></td>
						<td></td>
					</tr>
					<tr>
						<td align="right">&nbsp;</td>
						<td>&nbsp;</td>
						<td align="right">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</table>
				<table width="100%" border="0">
					<tr bgcolor="#FFCC33">
						<td colspan="2" align="center"><b>ที่อยู่ปัจจุบัน</b></td>
						<td colspan="2" align="center">
							<b>ที่อยู่สำหรับจัดส่ง / ส่งเอกสาร
							<input type="checkbox" name="chkaddress" id="chkaddress" value="1"  tabindex="53"   onClick="onclickaddress(this.value);" />
							ที่เดียวกับที่อยู่ตามบัตรประชาชน</b>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="right">
							<table width="100%" border="0">
								<tr>
									<td align="right">
										&#3648;&#3621;&#3586;&#3607;&#3637;&#3656;/&#3627;&#3657;&#3629;&#3591;&nbsp;<font color="#ff0000">*</font>
									</td>
									<td align="left">
										<input type="text" name="address" id="address" value="<?=$address?>" tabindex="42"/>
									</td>
								</tr>
								<tr>
									<td align="right">&#3629;&#3634;&#3588;&#3634;&#3619;&nbsp;</td>
									<td align="left">
										<input type="tex&#3629;&#3634;&#3588;&#3634;&#3619;t" name="building" id="building" value="<?=$building?>" tabindex="43"/>
									</td>
								</tr>
								<tr>
									<td align="right">
										&#3627;&#3617;&#3641;&#3656;&#3610;&#3657;&#3634;&#3609;/&#3588;&#3629;&#3609;&#3650;&#3604;&nbsp;
									</td>
									<td align="left">
										<input type="text" name="village" id="village" value="<?=$village?>" tabindex="44"/>
									</td>
								</tr>
								<tr>
									<td align="right">&#3605;&#3619;&#3629;&#3585;/&#3595;&#3629;&#3618;&nbsp;</td>
									<td align="left">
										<input type="text" name="soi" id="soi" value="<?=$soi?>" tabindex="45"/>
									</td>
								</tr>
								<tr>
									<td align="right">&#3606;&#3609;&#3609;&nbsp;</td>
									<td align="left">
										<input type="text" name="street" id="street" value="<?=$street?>" tabindex="46"/>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
									<? 
										if($provinceId==""){
											include("thaiaddress.php");
										}else{
											include("thaiaddressShow.php");
										}
									?>
									</td>
								</tr>
								<tr>
									<td align="right">&#3619;&#3627;&#3633;&#3626;&#3652;&#3611;&#3619;&#3625;&#3603;&#3637;&#3618;&#3660;&nbsp;</td>
									<td align="left">
										<input name="zip_1" tabindex="52" type="text" id="zip_1" value="<?=$zip?>"   onkeypress="return chknum(window.event.keyCode)"/><input name="button3"  tabindex="49" type="button" onClick="check_zipcode(document.getElementById('province').value,document.getElementById('amphur').value,document.getElementById('district').value)" value="ค้นหา" />
									</td>
								</tr>
							</table>
						</td>
						<td colspan="2" align="right">
							<table width="100%" border="0">
								<tr>
									<td align="right">
										เลขที่/ห้อง<font color="#ff0000">*</font>
									</td>
									<td align="left"><input type="text" name="caddress" id="caddress" value="<?=$caddress?>" tabindex="54"/></td>
								</tr>
								<tr>
									<td align="right">อาคาร</td>
									<td align="left">
										<input type="text" name="cbuilding" id="cbuilding" value="<?=$cbuilding?>" tabindex="55"/>
									</td>
								</tr>
								<tr>
									<td align="right">
										หมู่บ้าน/คอนโด
									</td>
									<td align="left">
										<input type="text" name="cvillage" id="cvillage" value="<?=$cvillage?>" tabindex="56"/>
									</td>
								</tr>
								<tr>
									<td align="right">ตรอก/ซอย</td>
									<td align="left">
										<input type="text" name="csoi" id="csoi" value="<?=$csoi?>" tabindex="57"/>
									</td>
								</tr>
								<tr>
									<td align="right">ถนน </td>
									<td align="left">
										<input type="text" name="cstreet" id="cstreet" value="<?=$cstreet?>" tabindex="58"/>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<div id="idchksaddress">
											<? 
												if($cprovinceId==""){
													include("cthaiaddress.php");
												}else{
												//	var_dump($cprovinceId);
													include("cthaiaddressShow.php");
												}
											?>
										</div>
									</td>
								</tr>
								<tr>
									<td align="right">รหัสไปรษณีย์</td>
									<td align="left">
										<input name="czip_1" tabindex="62" type="text" id="czip_1" value="<?=$czip?>"   onkeypress="return chknum(window.event.keyCode)"/><input name="button4"  tabindex="49" type="button" onClick="check_zipcode1(document.getElementById('cprovince').value,document.getElementById('camphur').value,document.getElementById('cdistrict').value)" value="ค้นหา" />
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr bgcolor="#FFCC33">
						<td colspan="2" align="center">
							<b>ข้อมูลการรับผลประโยชน์</b>
						</td>
						<td colspan="2" align="center">
							<b>ผู้รับมรดก</b>
						</td>
					</tr>
					<tr>
						<td width="11%" align="right">ธนาคาร</td>
						<td width="34%">
							<select size="1" name="bankcode" id="bankcode" tabindex="63">
							<?					
								$result1=mysql_query("select * from ".$dbprefix."bank order by bankname");
								for ($i=1;$i<=mysql_num_rows($result1);$i++){
									$row1 = mysql_fetch_object($result1);
									//echo "<option value=\"\" ";
									echo "<option value=\"".$row1->bankcode."\" ";
									if($bankcode==""&&$row1->bankcode==00) {echo "selected";}
									if ($bankcode==$row1->bankcode) {echo "selected";}
									echo ">".$row1->bankname."</option>";
								}
							?>
							</select>
						</td>
						<td width="14%" align="right">
							คำนำหน้าชื่อ
						</td>
						<td width="41%">
							<select tabindex="69" name="iname_f" id="iname_f" onChange="document.getElementById('iname_ff').value=this.value;if(this.value == '123'){document.getElementById('iname_ff').value = ''; document.getElementById('iname_ff').readOnly  = false;document.getElementById('iname_ff').focus();}else {document.getElementById('iname_ff').readOnly  = true;}">
								<option  value="" <?=($iname_f==""?"selected":"")?>>เลือกคำนำหน้า</option>
								<option  value="&#3609;&#3634;&#3618;" <?=($iname_f=="&#3609;&#3634;&#3618;"?"selected":"")?>>นาย</option>
								<option value="&#3609;&#3634;&#3591;&#3626;&#3634;&#3623;" <?=($iname_f=="&#3609;&#3634;&#3591;&#3626;&#3634;&#3623;"?"selected":"")?>>นางสาว</option>
								<option value="&#3609;&#3634;&#3591;" <?=($iname_f=="&#3609;&#3634;&#3591;"?"selected":"")?>>นาง</option>
								<option value="123" <?=($iname_f=="&#3629;&#3639;&#3656;&#3609;&#3654;"?"selected":"")?>>อื่น ๆ</option>
							</select>
							<input type="text" name="iname_ff"  id="iname_ff" value="<?=$iname_ff?>" tabindex="69" readonly />
						</td>
					</tr>
					<tr>
						<td align="right">สาขา</td>
						<td>
							<input type="text" name="branch" id="branch" size="20" maxlength="64" value="<?=$branch?>" tabindex="64">
						</td>
						<td align="right">ชื่อ-สกุล : </td>
						<td>
							<input type="text" name="iname_t" id="iname_t" value="<?=$iname_t?>" tabindex="69" size="43"  />
						</td>
					</tr>
					<tr>
						<td align="right">ประเภทบัญชี</td>
						<td>
							<input name="acc_type"  tabindex="65" id="acc_type" type="radio" <? if($acc_type=="&#3629;&#3629;&#3617;&#3607;&#3619;&#3633;&#3614;&#3618;&#3660;") echo "checked=\"checked\""; ?> value="&#3629;&#3629;&#3617;&#3607;&#3619;&#3633;&#3614;&#3618;&#3660;" checked /> ธนาคาร (ออมทรัพย์/สะสมทรัพย์)
						</td>
						<td align="right">ความสัมพันธ์ : </td>
						<td>
							<input type="text" name="irelation" id="irelation" value="<?=$irelation?>" tabindex="70"/>
						</td>
					</tr>
					<tr>
						<td align="right">เลขที่บัญชี</td>
						<td>
							<input type="text" name="acc_no" id="acc_no"  size="13"  value="<?=$acc_no?>" tabindex="66" onKeyPress="return chknum(window.event.keyCode)" >
						</td>
						<td align="right">โทรศัพท์ : </td>
						<td>
							<input type="text" name="iphone" id="iphone" value="<?=$iphone?>" tabindex="71"/>
						</td>
					</tr>
					<tr>
						<td align="right">ชื่อบัญชี</td>
						<td>
							<input type="text" name="acc_name" id="acc_name" size="40"  maxlength="40" tabindex="67" value="<?=$acc_name?>" <? if(empty($_GET["id"]))echo 'readonly'?> >
						</td>
						<td align="right">
							เลขที่บัตรประชาชน : 
						</td>
						<td>
							<input type="text" name="iid_card" id="iid_card" value="<?=$iid_card?>" tabindex="71"  onKeyPress="return chknum(window.event.keyCode)" />
						</td>
					</tr>
					<tr>
						<td align="right">หมายเหตุ</td>
						<td>
							<input type="text" name="memdesc" id="memdesc" size="40" value="<?=$memdesc?>" tabindex="68" />
						</td>
						<td align="left" >&nbsp;</td>
						<td align="left" >&nbsp;</td>
					</tr>
					<tr bgcolor="#FFCC33">
						<td colspan="2" align="center">&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3629;&#3639;&#3656;&#3609;&#3654;</td>
						<td colspan="2" align="center" ><b>&#3627;&#3621;&#3633;&#3585;&#3600;&#3634;&#3609;</b></td>
					</tr>
					<tr>
						<td colspan="2" align="center" 
						
						<?php 
						if(!isset($_GET['id'])){
							$set_payment = query("*",'ali_payment pb ',"pb.shows_mem_edit = '1' ");
							if(count($set_payment)){ 
						?>
								<div id="payment-item" class="payment-item">
									<table>
										<caption>Payment</caption>
										<thead>
											<tr>
												<th width="5%" align="center"><strong>เลือก</strong></th>
												<th width="15%"><strong>ประเภท</strong></th>
												<th width="40%"><strong>รูปแบบ </strong></th>  
											</tr>
										</thead> 
										<tbody>
										<?php    
											foreach($set_payment as $key => $payment_idx){  
												$payment_id = $payment_idx['id']; 
												$payment =query("*",'ali_payment pm',"pm.id = '{$payment_id}' and pm.shows_mem_edit  ='1' ");   
												if(count($payment)){    
										?>
													<tr>
														<td  align=center>
															<input type="radio" name="chk_pay" id="chk_pay" value="<?=$payment[0]['payment_column']?>">
														</td>
													<td><?=$payment[0]['payment_name']?></td>
													<td>
													<?php 
														$paymem_option =query("*",'ali_payment_type py ',"py.inv_code = '{$_SESSION["admininvent"]}' and py.payment_id = '{$payment_id}' and py.shows ='1' ");  
														if(count($paymem_option)){ 
													?>
															<select size="1" name="select<?=$payment[0]['payment_column']?>" id="select<?=$payment[0]['payment_column']?>" tabindex="63" style="width: 100%;"   >
																<option value="">กรุณาเลือกรูปแบบการชำระ</option> 
															<?php 
																foreach($paymem_option as $keyx => $valx){
															?>
																	<option value="<?=$valx['id']?>"><?=$valx['pay_desc']?></option>  
															<?
																}
															?>
															</select>
															<br />
													<?
														}
													?>    
													</td> 
												</tr>
												<?php 
													$namefiled .= $payment[0]['payment_column'].",";	
												}
											} 
										?>
											<input value="<?=substr($namefiled,0,-1)?>" type="hidden" id="namefiled" >
										</tbody> 
									</table>
								</div> 
						<?
							}else{
						?>
								<div class='error2'>Member not have payment</div>
						<?
							}
						}
						?>
							&#3627;&#3617;&#3634;&#3618;&#3648;&#3627;&#3605;&#3640; : 
							<br>
							<textarea name="txtoption" cols="100" rows="5" style="width: 100%;"   ><?=$txtoption?></textarea>
						</td> 
						<td colspan="2" valign="top">
							<table style="width: 100%;"  >
								<tr>
									<td width="14%" align="right">
										<input type="checkbox" onClick="if(this.checked == true)document.getElementById('dateInput2').value='<?=date("Y-m-d")?>'; else document.getElementById('dateInput2').value = '';" name="cmp3" id="cmp3" value="&#3588;&#3619;&#3610;" <?=$cmp3==""?"":"checked"?> tabindex="72" />
									</td>
									<td width="41%">&#3651;&#3610;&#3626;&#3617;&#3633;&#3588;&#3619;
										<input type="text" id="dateInput2" name="bmdate3" size="10" maxlength="10"  tabindex="73" value="<?=$bmdate3?>" />  
		

									</td>
				
								</tr>
								<tr>
									<td align="right"  valign=top>
										<input type="checkbox" name="cmp" id="cmp" onClick="if(this.checked == true)document.getElementById('dateInput3').value='<?=date("Y-m-d")?>'; else document.getElementById('dateInput3').value = '';"  value="&#3588;&#3619;&#3610;" <?=$cmp==""?"":"checked"?> tabindex="74" />
									</td>
									<td valign=top>
										สำเนาบัตรประชาชนผู้สมัครหลัก
										<input type="text" id="dateInput3" name="bmdate1" size="10" maxlength="10" 
										tabindex="75" value="<?=$bmdate1?>" />    
<!------------------------------->
						<table border=0><tr>
						<?if($myfile1 !=""){ ?>	
						<td valign=middle>
						<img id='pic' style="display:none"  name='pic' src='<?='../uploads/member/'.$myfile1;?>'  ><input type='text' readonly name='xpic' id='xpic' value="<?=$myfile1?>" > </td>
						<td valign=middle><a  href="<?='../uploads/member/'.$myfile1;?>" download>Load</a></td>
						<td valign=middle>
						<input type="button" name="reset" id="reset" value='ล้าง' onclick="resetpic()" >
						</td>
						<? } ?>
						<td valign=middle>
						<input type="file" name="myfile01" id="myfile01" accept="image/png,image/jpeg,image/gif" >
						<input name="button2"  tabindex="9" type="button"  <? if(!empty($_GET["id"]))echo ' style="display:none"'; ?>  onClick="document.getElementById('myfile01').value='';" value="ลบ" />
						</td></tr></table>
<!------------------------------->

							</td>
							</tr>
							<tr>
							<td align="right" valign=top>
										<input type="checkbox" name="cmp2" id="cmp2" onClick="if(this.checked == true)document.getElementById('dateInput4').value='<?=date("Y-m-d")?>'; else document.getElementById('dateInput4').value = '';"  value="&#3588;&#3619;&#3610;" <?=$cmp2==""?"":"checked"?> tabindex="76" />
							</td>
							<td valign=top>
										สำเนาบัญชีธนาคาร
										<input type="text" id="dateInput4" name="bmdate2" size="10" maxlength="10"  tabindex="77" value="<?=$bmdate2?>" /> 
<!---------------------------------------->
							<table border=0><tr valign=top>
							<?if($myfile2 !=""){ ?>	
							<td valign=middle>
							<img style="display:none"  id='pic2' name='pic2' src='<?='../uploads/member/'.$myfile2;?>' ><input type='text' readonly name='xpic2' id='xpic2' value="<?=$myfile2?>" ></td>
							<td valign=middle><a href="<?='../uploads/member/'.$myfile2;?>" download>Load</a></td>
							<td valign=middle>
							<input type="button" name="reset" id="reset" value='ล้าง' onclick="resetpic2()" >
							</td>
							<? } ?>
							<td valign=middle>
							<input type="file" name="myfile02" id="myfile02" accept="image/png,image/jpeg,image/gif" >
							<input name="button2"  tabindex="9" type="button"  <? if(!empty($_GET["id"]))echo ' style="display:none"'; ?>  onClick="document.getElementById('myfile02').value='';" value="ลบ" />

							</td></tr></table>
<!---------------------------------------->
							</td>
								</tr>
								<tr>
									<td align="right">
										<input type="checkbox" name="ccmp" id="ccmp" onClick="if(this.checked == true)document.getElementById('dateInput5').value='<?=date("Y-m-d")?>'; else document.getElementById('dateInput5').value = '';"  value="&#3588;&#3619;&#3610;" <?=$ccmp==""?"":"checked"?> tabindex="78" />
									</td>
									<td nowrap>
										&#3626;&#3635;&#3648;&#3609;&#3634;&#3610;&#3633;&#3605;&#3619;&#3611;&#3619;&#3632;&#3594;&#3634;&#3594;&#3609;&#3612;&#3641;&#3657;&#3626;&#3617;&#3633;&#3588;&#3619;&#3619;&#3656;&#3623;&#3617;
										<input type="text" id="dateInput5" name="cbmdate1" size="10" maxlength="10" tabindex="79" value="<?=$cbmdate1?>" />    
									</td>
								</tr>
							</table>
						</td>    
					</tr>
					<tr>
						<td align="right">&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="2" align="right">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="4" align="center">							
		  <!--input type="checkbox" name="chkpayment" id="chkpayment" value="checkbox" onChange="if(this.checked == true){document.getElementById('button').disabled = false;document.getElementById('ok').disabled = true;}else{document.getElementById('button').disabled = true;document.getElementById('ok').disabled = true;}" /> 
		  <a href="#">เงื่อนไขการสมัคร</a-->
						</td>
					</tr>
					<tr>
						<td align="right">&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="2" align="right">&nbsp;</td>
					</tr>
					<tr>
					<?=$_POST['id']?>
						<td colspan="4" align="center"><input name='button'  id='button' type='button'  value="ตรวจสอบ" onClick="<?=(isset($_GET['id'])?"emembercheck()":"imembercheck()")?>;sendget_sponsor(document.getElementById('sp_code').value)" tabindex="80" > 
							&nbsp;
							<input type="submit" value="บันทึก" name="ok"  id="ok" disabled tabindex="81" > 
							&nbsp;
							<input type="reset" value="ยกเลิก"  onclick="window.location='index.php?sessiontab=1&sub=2'" tabindex="82" >
						</td>
					</tr>
				</table>      
		</td>
	</tr>
</table>
<br />
<div id="checkstate" align="center">
	<font color="#FFFFFF" style="background:#990000"> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font>
</div>
</form>

