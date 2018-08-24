<? include("global.php");?>
<?
$_SESSION["perbuy"] = 1;
?>

<script type="text/javascript">
$(document).ready(function() {
   $("#myfile").change(function () 
   { 
	 var ext = this.value.match(/\.(.+)$/)[1];
		switch (ext) {
			case 'jpg':
			case 'jpeg':
				var iSize = ($("#myfile")[0].files[0].size / 1024); 
				 if (iSize / 1024 > 1) 
				 {  
					alert('ขนาดไฟล์ รูปส่วนตัวใหญ่เกิน 200kb');
					this.value = '';
				 } 
				break;
			default:
				alert('รูป ส่วนตัว ต้องมีนามสุกลไฟล์ เป็น .jpg เท่านั้น');
				this.value = '';
		}
     
         
  }); 
});
</script>

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

function resetpic(){
	document.getElementById("pic").src="";
	document.getElementById("xpic").value="";
}
function resetpic2(){
	document.getElementById("pic2").src="";
	document.getElementById("xpic2").value="";
}
function onclickaddress(){

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
					//	alert(data);
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
                    document.getElementById("idchksaddress").innerHTML=data; //แสดงผล
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
}
function sendget_sponsor(value) {
     var req = Inint_AJAX(); //สร้าง Object
	// alert(value)
	value = str_pad(value,7,0,false);
	value = value.toUpperCase();
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
	value = value.toUpperCase();
	value1 = str_pad(value1,7,0,false);
	value2 = document.getElementById("mcode").value;
	
     req.open('GET', 'search_member11.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
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
						
					}
					
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
</script>

<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
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
function imembercheck(){
	if(document.getElementById('upa_code').value==''){
		value = document.getElementById('upa_code').value
		value1 = document.getElementById('sp_code').value
		
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
							var i =0;
							var j =0;
							var sum =0;
							var myString = document.getElementById('birthday1').value;
							val = val + ","+document.getElementById('birthday1').value;
							field = field +",birthday";
							flag = flag+",1-0-0-0-0";
							errDesc = errDesc + ",วันที่เกิด";

							var myString = document.getElementById('birthday1').value;
							val = val + ","+document.getElementById('birthday1').value;
							field = field +",birthday";
							flag = flag+",1-0-0-0-0";
							errDesc = errDesc + ",เดือนที่เกิด";

							var myString = document.getElementById('birthday1').value;
							val = val + ","+document.getElementById('birthday1').value;
							field = field +",birthday";
							flag = flag+",1-0-0-0-0";
							errDesc = errDesc + ",ปีที่เกิด";


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
							if(document.forms[0].payment[0].checked == false && document.forms[0].payment[1].checked == false){
								 alert('กรุณากรอกข้อมูลชำระโดย');
								exit;
							}
							/*if(myString.match(/^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/))
							{

							}else{
								 alert('กรุณากรอกตาม รูปแบบตัวอย่าง 2502-10-12');
								document.getElementById('birthday').focus();
								exit;
							}*/
							if(checkmdate < 18){
								alert('อายุไม่ถึง 18 ปี');
								document.getElementById('birthday').focus();
								exit;
							}
							//alert(myArray[1]);alert(myArray[2]);alert(myArray[3]);
							/*if(myArray[1] == '' || myArray[2] == ''){
								alert('กรุณากรอกตาม รูปแบบตัวอย่าง 2502-10-12');
								document.getElementById('birthday').focus();
								exit;
							}*/


							if(document.getElementById('cbirthday').value != ''){
								/*var myString1 = document.getElementById('cbirthday').value;
								if(myString1.match(/^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/))
								{

								}else{
									 alert('กรุณากรอกตาม รูปแบบตัวอย่าง 2502-10-12');
									document.getElementById('cbirthday').focus();
									exit;
								}	*/
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
								/*if(myArray1[1] == '' || myArray1[2] == ''){
									alert('กรุณากรอกตาม รูปแบบตัวอย่าง 2502-10-12');
									document.getElementById('cbirthday').focus();
									exit;
								}*/
							}

							if(document.getElementById('iname_t').value != ''){

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

							}

							val = val + ","+document.getElementById('name_f').value;
							field = field +",name_f";
							flag = flag+",1-0-0-0-0";
							errDesc = errDesc + ",คำนำหน้าชื่อ";

							val = val + ","+document.getElementById('name_t').value;
							field = field +",name_f";
							flag = flag+",1-0-0-0-0";
							errDesc = errDesc + ",ชือผู้สมัคร";

							/*val = val + ","+document.getElementById('mdate').value;
							field = field +",mdate";
							flag = flag+",1-0-0-0-0";
							errDesc = errDesc + ",วันเกิด";
							*/
							val = val + ","+document.getElementById('sex').value;
							field = field +",sex";
							flag = flag+",1-0-0-0-0";
							errDesc = errDesc + ",เพศ";

							val = val + ","+document.getElementById('dateInput5').value;
							field = field +",dateInput5";
							flag = flag+",1-0-0-0-0";
							errDesc = errDesc + ",วันเกิด";
							
							/*val = val + ","+document.getElementById('sp_name').value;

							field = field +",sp_name";
							flag = flag+",1-0-0-0-0";
							errDesc = errDesc + ",รหัสผู้แนะนำผิดพลาดกรุณากดค้น";
							
							val = val + ","+document.getElementById('upa_code').value;
							field = field +",upa_code";
							flag = flag+",1-0-0-0-0";
							errDesc = errDesc + ",กรุณาใส่รหัสอัพไลน์";

							
							
							val = val + ","+document.getElementById('upa_name').value;
							field = field +",upa_name";
							flag = flag+",1-0-0-0-0";
							errDesc = errDesc + ",รหัสอัพไลน์ผิดพลาดกรุณากดค้น";
							
							*/

							//val = val + ","+document.getElementById('email').value;
							//field = field +",email";
							//flag = flag+",1-0-0-0-0";
							//errDesc = errDesc + ", อีเมล";
							if(document.getElementById('email').value != ''){
								var Email=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
								if(!document.getElementById('email').value.match(Email)){
								alert('รูปแบบ Email ไม่ถูกต้อง');
								document.getElementById('email').focus();
								exit;
								}
							}

							val = val + ","+document.getElementById('dateInput5').value;
							field = field +",dateInput5";
							flag = flag+",1-0-0-0-0";
							errDesc = errDesc + ",วันที่สมัคร";

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
							if(document.getElementById('cname_t').value != ""){
								val = val + ","+document.getElementById('cname_f').value;
								field = field +",cname_f";
								flag = flag+",1-0-0-0-0";
								errDesc = errDesc + ",กรอกคำนำหน้า ผู้สมัครร่วม";	

								val = val + ","+document.getElementById('csex').value;
								field = field +",csex";
								flag = flag+",1-0-0-0-0";
								errDesc = errDesc + ",กรอกเพศ ผู้สมัครร่วม";	

								val = val + ","+document.getElementById('cbirthday').value;
								field = field +",cbirthday";
								flag = flag+",1-0-0-0-0";
								errDesc = errDesc + ",กรอกวันเกิด ผู้สมัครร่วม";	

								val = val + ","+document.getElementById('cid_card').value;
								field = field +",cid_card";
								flag = flag+",1-0-0-0-0";
								errDesc = errDesc + ",กรอกเลขบัตรประชาชน ผู้สมัครร่วม";	
							}

							if(document.getElementById('national').value == 'ไทย'){
									var a = document.getElementById('id_card').value;
									var id_card = "";
									var t = a.split("-");  //ถ้าเจอวรรคแตกเก็บลง array t
									for(var i=0; i<t.length ; i++){
										id_card = id_card+ t[i];
									}
									
									val = val + ","+document.getElementById('id_card').value;
									field = field +",id_card";
									flag = flag+",1-13-0-1-0";
									errDesc = errDesc + ",เลขบัตรประชาชน ";

									if(document.getElementById('cid_card').value != ''){
										val = val + ","+document.getElementById('cid_card').value;
										field = field +",id_card";
										flag = flag+",1-13-0-1-0";
										errDesc = errDesc + ",เลขบัตรประชาชนของผู้สมัครร่วม";

									}

								id = document.getElementById('id_card').value;	
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
									}
											
											val = val + ","+document.getElementById('id_card').value;
											field = field +",cid_card";
											flag = flag+",0-0-0-1-0";
											errDesc = errDesc + ",เลขบัตรประชาชน ";

											val = val + ","+document.getElementById('cid_card').value;
											field = field +",id_card";
											flag = flag+",0-0-0-1-0";
											errDesc = errDesc + ",เลขบัตรประชาชนคู่สมรส ";



									/*val = val + ","+document.getElementById('upa_code').value;
									field = field +",upa_code";
									flag = flag+",0-11-0-0-1-1";
									errDesc = errDesc + ",รหัสอัพไลน์";
									
									val = val + ","+document.getElementById('sp_code').value;
									field = field +",sp_code";
									flag = flag+",0-11-0-0-1-1";
									errDesc = errDesc + ",รหัสผู้แนะนำ";
									 
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
									}*/
									val = val + ","+document.getElementById('acc_no').value;
									field = field +",acc_no";
									flag = flag+",0-0-10-0-0";
									errDesc = errDesc + ",เลขที่บัญชี";

									val = val + ","+document.getElementById('payment').value;
									field = field +",payment";
									flag = flag+",1-0-0-0-0";
									errDesc = errDesc + ",ชำระโดย";

									//alert(val);
								//loop check
									document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
									startRQ(field,val,"",flag,errDesc,"member","checkstate");
						}else{
							var myArray = data.split(':');

							if(myArray[0] == '1'){
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
							 document.getElementById("upa_name").value=myArray[2];

							var val = document.getElementById('mcode').value;
							var field = "mcode";
							var flag = "1-11-0-0-0";
							var errDesc = "รหัสสมาชิก";
							var id = document.getElementById('id_card').value;
							//alert(id);
							
						}
				   }
			  }
		 };
		 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
		 req.send(null); //ทำการส่ง
	}
}
function emembercheck(){
	var val = document.getElementById('mcode').value;
	//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var skipval = document.getElementById('omcode').value;
	var id = document.getElementById('id_card').value;
	var field = "mcode";
	var flag = "1-9-0-1-0";
	var errDesc = "รหัสสมาชิก";
	var i =0;
	var j =0;
	var sum =0;

	/*val = val + ","+document.getElementById('name_t').value;
	skipval = skipval+","+document.getElementById('oid_name_t').value;
	field = field +",name_t";
	flag = flag+",1-0-0-1-0";
	errDesc = errDesc + ",ชื่อสมาชิก";*/
	
	val = val + ","+id_card; 
	skipval = skipval+","+document.getElementById('oid_card').value;
	field = field +",id_card";
	flag = flag+",1-0-0-1-0";
	errDesc = errDesc + ",เลขบัตรประชาชน ";
	
	
if(document.getElementById('national').value == 'Thailand'){	
	val = val + ","+document.getElementById('id_card').value;
	field = field +",id_card";
	flag = flag+",1-13-0-0-0";
	errDesc = errDesc + ",เลขบัตรประชาชนใช้ไม่ได้ค่ะ";
	
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

	
	val = val + ","+document.getElementById('name_t').value;
	field = field +",name_t";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ชื่อสมาชิก";
	

	

	var a = document.getElementById('id_card').value;
	var id_card = "";
	var t = a.split("-");  //ถ้าเจอวรรคแตกเก็บลง array t
	for(var i=0; i<t.length ; i++){
		id_card = id_card+ t[i];
	}


	val = val + ","+document.getElementById('acc_no').value;
	field = field +",acc_no";
	flag = flag+",0-0-10-0-0";
	errDesc = errDesc + ",เลขที่บัญชี";


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
 

$mcode = gencode($code+1);
$sv_code = substr($mcode,3,strlen($mcode));
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
			$type_com=$row->type_com;
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
			$sletter=$row->sletter;
			$sinv_code=$row->sinv_code;
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
			$iname_f=$row->iname_f;
			$iname_ff=$row->iname_f;
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
			$atocom=$row->atocom;
			
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
?>
<div id="err"></div>

<form name='frm' method="post" onKeyDown="document.getElementById('ok').disabled=true;" action="memoperate.php?state=<?=$_GET['id']==""?0:1?>"  onsubmit="return checkForm(this)"  enctype="multipart/form-data">
  <input type="hidden" name="oid" value="<?=$oid?>">
  <input type="hidden" name="sub"  id="sub" value="<?=$_GET['sub']?>">
  <table width="100%" border="0">
  	
    <tr  <? //if(empty($_GET["id"])){echo'style="display:none"';}?>>
      <td>
<!--business information--> 
<table width="100%" border="0" >
  <tr bgcolor="#FFCC33"  >
    <td colspan="2" align="center"><b>&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3612;&#3641;&#3657;&#3649;&#3609;&#3632;&#3609;&#3635;</b></td>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr <? //if(empty($_GET["id"])){echo'style="display:none';}?>>
	 <td colspan="2">วันที่สมัคร

      <input type="text" id="dateInput5" tabindex="1" name="mdate" size="10" maxlength="10" value="<?=($mdate==""?date("Y-m-d"):$mdate)?>" />
	<font color="#808080">(ปปปป-ดด-วว)</font><?if($mcode != ''){?><BR>รหัสสมาชิก : <?echo $mcode;}?></td>
    <td colspan="2"><? //if(!empty($_GET["id"]))echo 'รหัสสมาชิก'?><input type="hidden" <? //if(empty($_GET["id"]))echo 'style="display:none"'?> id="mcode" name="mcode" size="10" readonly maxlength="7" value="<?=$mcode?>"  />
      <input type="hidden" id="omcode" name="omcode" value="<?=$mcode?>" />
      <input type="hidden" name="id" readonly size="10" value="<?=$id;?>" />
  &nbsp;&nbsp;&nbsp;</td>
  </tr>
  
  <tr>
    <td width="12%" align="right">รหัสผู้แนะนำ<font color="#ff0000">*</font></td>
    <td width="34%"><input tabindex="2" style="background-color:#FFFFFF" type="text" name="sp_code" id="sp_code" size="20"  maxlength="20" value="<?=$sp_code?>" />
          <input name="button2"  id="upa_code_check" tabindex="3" type="button" onClick="sendget_sponsor(document.getElementById('sp_code').value)" value="ตรวจ" />
          <input name="button2"  tabindex="4" type="button" onClick="document.getElementById('ok').disabled=true;get_mem_listpicker_sp_code()" value="เลือก" />
          <input name="button2"  tabindex="5" type="button" onClick="document.getElementById('sp_code').value='';document.getElementById('sp_name').value='';" value="ลบ" />          </td>
    <td width="14%" align="right">รหัสอัพไลน์<font color="#ff0000">*</font></td>
    <td width="40%"><input style="background-color:#FFFFFF"  tabindex="6"  type="text" name="upa_code"  id="upa_code" size="20"  maxlength="20" value="<?=$upa_code?>" />
    <input name="button2"  tabindex="7" type="button" onClick="sendget_sponsor1(document.getElementById('upa_code').value,document.getElementById('sp_code').value)" value="ตรวจ" />
      <input name="button3"  tabindex="8" type="button" onClick="document.getElementById('ok').disabled=true;get_mem_listpicker_upa_code()" value="เลือก" />
      <input name="button2"  tabindex="9" type="button" onClick="document.getElementById('upa_code').value='';document.getElementById('upa_name').value='';" value="ลบ" />      </td>
  </tr>
  <tr  >
    <td align="right">ชื่อผู้แนะนำ<font color="#ff0000">*</font></td>
    <td><input style="background-color:#CCCCCC" readonly type="text" name="sp_name" id="sp_name" size="40"  maxlength="40" value="<?=$sp_name?>" /></td>
    <td align="right">ชื่ออัพไลน์<font color="#ff0000">*</font></td>
    <td><input style="background-color:#CCCCCC" readonly type="text" name="upa_name" id="upa_name" size="40"  maxlength="40" value="<?=$upa_name?>" /></td>
  </tr>
  <tr  >
 
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



    <td align="right">ด้าน<font color="#ff0000">*</font></td>
    <td><?
                	$rs = mysql_query("SELECT * FROM ".$dbprefix."lr_def order by lr_id asc");
					for($i=0;$i<mysql_num_rows($rs);$i++){
						?>
      <input tabindex="10" onClick="document.getElementById('ok').disabled=true;" type="radio" name="lr" id="lr"  <?=$lr==mysql_result($rs,$i,'lr_id')?"checked":""?> value="<?=mysql_result($rs,$i,'lr_id')?>" />
      <?=mysql_result($rs,$i,'lr_name')?>
      <?
					
					}
					mysql_free_result($rs);
				?>
      <input type="hidden" name="olr" value="<?=$olr?>" >    </td>
  </tr>
   </table>    </td></tr>
  	
    <tr>
      <td>
<!--member Information-->
<table width="100%" border="0">
  <tr bgcolor="#FFCC33">
    <td colspan="2" align="center"><b>&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3612;&#3641;&#3657;&#3626;&#3617;&#3633;&#3588;&#3619;</b></td>
    <td colspan="2" align="center"><b>&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3612;&#3641;&#3657;&#3626;&#3617;&#3633;&#3588;&#3619;&#3619;&#3656;&#3623;&#3617;</b></td>
  </tr>
<tr  style="display:none">
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
			<option value="1" <?if($atocom=="1")echo 'selected';?>>no auto</option>
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
      </select></td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Member Type</td>
    <td><input type="radio"  name="mtype" id="mtype" value="0" tabindex="10"  <? if($mtype=="0" or empty($mtype)) echo "checked=\"checked\""; ?>>บุคคลธรรมดา
      <input type="radio" name="mtype" id="mtype"  value="1" tabindex="10"  <? if($mtype=="1") echo "checked=\"checked\""; ?>>นิติบุคคล</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Vat </td>
    <td><input type="radio"  name="mvat" id="mvat" value="0" tabindex="10"  <? if($mvat=="0" or empty($mvat)) echo "checked=\"checked\""; ?>>
      Novat
        <input type="radio" name="mvat" id="mvat"  value="1" tabindex="10"  <? if($mvat=="1") echo "checked=\"checked\""; ?>>
        Vat</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td width="19%" align="right">&#3588;&#3635;&#3609;&#3635;&#3627;&#3609;&#3657;&#3634;&#3594;&#3639;&#3656;&#3629;<font color="#ff0000">*</font>&nbsp;</td>
    <td width="27%"><select tabindex="12" name="name_f" id="name_f" onChange="getRadioValueByName(this.value);document.getElementById('name_ff').value=this.value;if(this.value == '123'){document.getElementById('name_ff').value = ''; document.getElementById('name_ff').readOnly  = false;document.getElementById('name_ff').focus();}else {document.getElementById('name_ff').readOnly  = true;}">
      <option  value="" <?=($name_f==""?"selected":"")?>>เลือกคำนำหน้า</option>
      <option  value="นาย" <?=($name_f=="นาย"?"selected":"")?>>นาย</option>
      <option value="นางสาว" <?=($name_f=="นางสาว"?"selected":"")?>>นางสาว</option>
      <option value="นาง" <?=($name_f=="นาง"?"selected":"")?>>นาง</option>
      <option value="บริษัทจำกัด" <?=($name_f=="บริษัทจำกัด"?"selected":"")?>>บริษัทจำกัด</option>
      <option value="ห้างหุ้นส่วนจำกัด" <?=($name_f=="ห้างหุ้นส่วนจำกัด"?"selected":"")?>>ห้างหุ้นส่วนจำกัด</option>
      <option value="123" <?=($name_f=="อื่นๆ"?"selected":"")?>>อื่นๆ</option>
    </select>
      <input type="text" name="name_ff"  id="name_ff" value="<?=$name_ff?>" tabindex="13" readonly /></td>
    <td width="22%" align="right">&#3588;&#3635;&#3609;&#3635;&#3627;&#3609;&#3657;&#3634;&#3594;&#3639;&#3656;&#3629;&nbsp;</td>
    <td width="32%"><select name="cname_f"  tabindex="27" id="cname_f" onChange="getRadioValueByName1(this.value);document.getElementById('cname_ff').value=this.value;if(this.value == '123'){document.getElementById('cname_ff').value = ''; document.getElementById('cname_ff').readOnly  = false;document.getElementById('cname_ff').focus();}else {document.getElementById('cname_ff').readOnly  = true;}">
      <option  value="" <?=($cname_f==""?"selected":"")?>>เลือกคำนำหน้า</option>
      <option  value="นาย" <?=($cname_f=="นาย"?"selected":"")?>>นาย</option>
      <option value="นางสาว" <?=($cname_f=="นางสาว"?"selected":"")?>>นางสาว</option>
      <option value="นาง" <?=($cname_f=="นาง"?"selected":"")?>>นาง</option>
      <option value="บริษัทจำกัด" <?=($cname_f=="บริษัทจำกัด"?"selected":"")?>>บริษัทจำกัด</option>
      <option value="ห้างหุ้นส่วนจำกัด" <?=($cname_f=="ห้างหุ้นส่วนจำกัด"?"selected":"")?>>ห้างหุ้นส่วนจำกัด</option>
      <option value="123" <?=($cname_f=="อื่นๆ"?"selected":"")?>>อื่นๆ</option></select>
      <input type="text" name="cname_ff" id="cname_ff" value="<?=$cname_ff?>" tabindex="28" readonly /></td>
  </tr>
  <tr>
    <td align="right">&#3594;&#3639;&#3656;&#3629;-&#3609;&#3634;&#3617;&#3626;&#3585;&#3640;&#3621; / &#3609;&#3636;&#3605;&#3636;&#3610;&#3640;&#3588;&#3588;&#3621;<font color="#ff0000">*</font>&nbsp;</td>
    <td><input   type="text" id="name_t" name="name_t" onKeyUp="document.getElementById('acc_name').value=document.getElementById('name_ff').value+' '+this.value;" size="40" maxlength="40" value="<?=$name_t?>" tabindex="14"/>
        <input type="hidden" name="oid_name_t" id="oid_name_t" maxlength="13" value="<?=$oid_name_t?>" /></td>
    <td align="right">&#3594;&#3639;&#3656;&#3629;-&#3609;&#3634;&#3617;&#3626;&#3585;&#3640;&#3621;&nbsp;</td>
    <td><input type="text" id="cname_t" name="cname_t" size="40" maxlength="40" value="<?=$cname_t?>" tabindex="29"/>
        <input type="hidden" name="coid_name_t" id="coid_name_t" maxlength="255" value="<?=$coid_name_t?>" /></td>
  </tr>
  <tr>
    <td align="right">Name &amp; LastName / Compay Name </td>
    <td><input type="text" name="name_e" id="name_e" size="40" maxlength="40" value="<?=$name_e?>"  tabindex="15"/></td>
    <td align="right">Name &amp; LastName&nbsp;</td>
    <td><input type="text" name="cname_e" id="cname_e" size="40" maxlength="40" value="<?=$cname_e?>"  tabindex="30"/></td>
  </tr>
  <tr>
    <td align="right">ชื่อทางธุรกิจ</td>
    <td><input type="text" id="name_b" name="name_b" size="40" maxlength="40" value="<?=$name_b?>" tabindex="16"/></td>
    <td align="right">&nbsp;</td>
    <td><input type="text" id="cname_b" name="cname_b" size="40" style="display:none" maxlength="40" value="<?=$cname_b?>" tabindex="31"/></td>
  </tr>
  <tr>
    <td align="right">&#3648;&#3614;&#3624;<font color="#ff0000">*</font>&nbsp;</td>


    <td><input type="radio" name="sex" id="sex" value="ชาย" tabindex="17" <? if($sex=="ชาย") echo "checked=\"checked\""; ?>>
      ชาย
      <input type="radio" name="sex" id="sex" value="หญิง" tabindex="18" <? if($sex=="หญิง") echo "checked=\"checked\""; ?>>
หญิง     
    <td align="right">&#3648;&#3614;&#3624;&nbsp;</td>
    <td><input type="radio" name="csex" id="csex" value="ชาย" tabindex="32" <? if($csex=="ชาย") echo "checked=\"checked\""; ?>>
  ชาย
  <input type="radio" name="csex" id="csex" value="หญิง" tabindex="33" <? if($csex=="หญิง") echo "checked=\"checked\""; ?>>
  หญิง     </tr>
  <tr>
    <td align="right">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3648;&#3585;&#3636;&#3604;<font color="#ff0000">*</font>&nbsp;</td>
    <td nowrap="nowrap"><select name="birthday1"  id="birthday1">
      <option value="">
        วัน
        </option>
      <?PHP
$year =  1; for ($i = 0; $i <= 30; $i++) {echo "<option ".(gencode2($birthday1)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
?>
    </select>
      <select  name="birthday2"  id="birthday2">
        <option value="">
          เดือน
          </option>
        <?PHP
$year =  1; for ($i = 0; $i <= 11; $i++) {echo "<option ".(gencode2($birthday2)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".gen_month(gencode2($year))."</option>"; $year++;}
?>
      </select>
      <select  name="birthday3"  id="birthday3" >
        <option value="">
          ปี(พ.ศ.)
          </option>
        <?PHP
if($mlocationbase == '1'){
	$year = date("Y")+543 - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($birthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}
	}else{
	$year = date("Y")+543 - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($birthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}	
	}
?>
      </select>
      <input style="display:none" type="text" name="birthday" id="birthday" size="10" maxlength="8" tabindex="19" value="<?=$birthday?>" onKeyPress="return chknum(window.event.keyCode)"  />
&nbsp;<a href="javascript:NewCal('birthday','yyyymmdd',false,24)"><img style="display:none" src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="(&#3611;&#3611;&#3611;&#3611;-&#3604;&#3604;-&#3623;&#3623;)" /></a></td>
    <td align="right">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3648;&#3585;&#3636;&#3604;&nbsp;</td>
    <td nowrap="nowrap"><select name="cbirthday1"  id="cbirthday1">
      <option value="">
        วัน
        </option>
      <?PHP
$year =  1; for ($i = 0; $i <= 30; $i++) {echo "<option ".(gencode2($cbirthday1)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
?>
    </select>
      <select  name="cbirthday2"  id="cbirthday2">
        <option value="">
          เดือน
          </option>
        <?PHP
$year =  1; for ($i = 0; $i <= 11; $i++) {echo "<option ".(gencode2($cbirthday2)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".gen_month(gencode2($year))."</option>"; $year++;}
?>
      </select>
      <select  name="cbirthday3"  id="cbirthday3" >
        <option value="">
          ปี(พ.ศ.)
          </option>
        <?PHP
if($mlocationbase == '1'){
	$year = date("Y")+543 - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($cbirthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}
	}else{
	$year = date("Y")+543 - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($cbirthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}
	
	}
?>
      </select>
      <input style="display:none" type="text" name="cbirthday" id="cbirthday" size="10" maxlength="8" tabindex="34" value="<?=$cbirthday?>" onKeyPress="return chknum(window.event.keyCode)"  />
      <input type="text" style="display:none" name="cbirthday" id="cbirthday" size="10" maxlength="10" tabindex="34" value="<?=$cbirthday?>" />
&nbsp;<a href="javascript:NewCal('cbirthday','yyyymmdd',false,24)"><img style="display:none" src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="(ปปปป-ดด-วว)" /></a></td>
  </tr>
  
  <tr>
    <td align="right">&#3626;&#3633;&#3597;&#3594;&#3634;&#3605;&#3636;<font color="#ff0000">*</font>&nbsp;</td>
    <td>
	
	<select name="national" id="national"  tabindex="20">
    <?					
	if($national=="")$national="Thailand";
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
    <td><select name="cnational" id="cnational"  tabindex="35">
       <?
	   if($cnational=="")$cnational="Thailand";
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
    <td>
        <input  name="id_card" id="id_card"  tabindex="21"  maxlength="17" type="text" value="<?=$id_card?>" onKeyPress="return chknum(window.event.keyCode)" />
        <input type="hidden" name="oid_card" id="oid_card" maxlength="17" value="<?=$oid_card?>" />    </td>
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
        <input  name="cid_card" id="cid_card"  tabindex="36"  maxlength="17" type="text" value="<?=$cid_card?>" onKeyPress="return chknum(window.event.keyCode)"   />
        <input type="hidden" name="coid_card" id="coid_card" maxlength="17" value="<?=$coid_card?>" />    </td>
    <!--
    <input type="text" name="id_card" id="id_card" maxlength="13" value="<?=$id_card?>" onkeypress="return chknum(window.event.keyCode)" />
    <td align="right">&#3619;&#3633;&#3610;&#3650;&#3610;&#3609;&#3633;&#3626;&#3612;&#3656;&#3634;&#3609;</td>
    <td> <input type="radio" value="1" <? if ($bonusrec=="1") {echo "checked";}?> name="bonusrec">
                &#3608;&#3609;&#3634;&#3588;&#3634;&#3619;
                <input type="radio" <? if ($bonusrec=="2") {echo "checked";}?> name="bonusrec" value="2">
                &#3619;&#3633;&#3610;&#3648;&#3629;&#3591;</td>
  </tr>-->
  <tr>
    <td align="right">&#3648;&#3621;&#3586;&#3607;&#3632;&#3648;&#3610;&#3637;&#3618;&#3609;&#3609;&#3636;&#3605;&#3636;&#3610;&#3640;&#3588;&#3588;&#3621; &nbsp;</td>
    <td><input type="text" name="id_tax" id="id_tax" value="<?=$id_tax?>" tabindex="22"  onKeyPress="return chknum(window.event.keyCode)"/></td>
    <td align="right">&nbsp;</td>
    <td><input type="text" name="cid_tax" style="display:none" id="cid_tax" value="<?=$cid_tax?>" tabindex="37"  onKeyPress="return chknum(window.event.keyCode)" /></td>
  </tr>
  
  <tr>
    <td align="right">&#3650;&#3607;&#3619;&#3624;&#3633;&#3614;&#3607;&#3660;&#3610;&#3657;&#3634;&#3609;&nbsp;</td>
    <td><input type="text" name="home_t"  id="home_t" maxlength="20" value="<?=$home_t?>" tabindex="23"  onKeyPress="return chknum(window.event.keyCode)"/></td>
    <td align="right">&#3650;&#3607;&#3619;&#3624;&#3633;&#3614;&#3607;&#3660;&#3610;&#3657;&#3634;&#3609;&nbsp;</td>
    <td><input type="text" name="chome_t" id="chome_t"  maxlength="20" value="<?=$chome_t?>" tabindex="38"  onKeyPress="return chknum(window.event.keyCode)"/></td>
  </tr>
  <tr>
    <td align="right">&#3650;&#3607;&#3619;&#3624;&#3633;&#3614;&#3607;&#3660;&#3617;&#3639;&#3629;&#3606;&#3639;&#3629;<font color="#ff0000">*</font>&nbsp;</td>
    <td><input type="text" name="mobile" id="mobile"  maxlength="20" value="<?=$mobile?>"  onKeyPress="return chknum(window.event.keyCode)" tabindex="24"/></td>
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
  
  <tr style="display:none">
    <td align="right">รูปประจำตัว</td>
    <td><?php
            if(@file_exists("../uploads/profile_img/$mcode.jpg"))
            {
                echo "<br/>";
                echo "<img src='../uploads/profile_img/$mcode.jpg' width='120px' height='120px' class='profile_img'/>";
            }
            else
            {
                echo "<br/>";
                echo "<img src='../uploads/profile_img/profile-150x150.jpg' width='80px' class='profile_img'/>";
            }
        ?>
      <p>
        <input type="file" name="myfile" id="myfile" >
      </p></td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
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
    <td colspan="2" align="center"><b>&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;&#3605;&#3634;&#3617;&#3610;&#3633;&#3605;&#3619;&#3611;&#3619;&#3632;&#3594;&#3634;&#3594;&#3609;</b></td>
    <td colspan="2" align="center"><b>&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;&#3626;&#3635;&#3627;&#3619;&#3633;&#3610;&#3592;&#3633;&#3604;&#3626;&#3656;&#3591; / &#3626;&#3656;&#3591;&#3648;&#3629;&#3585;&#3626;&#3634;&#3619;
      <input type="checkbox" name="chkaddress" id="chkaddress" value="1"  tabindex="53"   onClick="onclickaddress(this.value);" />
      &#3607;&#3637;&#3656;&#3648;&#3604;&#3637;&#3618;&#3623;&#3585;&#3633;&#3610;&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;&#3605;&#3634;&#3617;&#3610;&#3633;&#3605;&#3619;&#3611;&#3619;&#3632;&#3594;&#3634;&#3594;&#3609;</b></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><table width="100%" border="0">
      <tr>
        <td align="right">&#3648;&#3621;&#3586;&#3607;&#3637;&#3656;/&#3627;&#3657;&#3629;&#3591;&nbsp;</td>
        <td align="left"><input type="text" name="address" id="address" value="<?=$address?>" tabindex="42" style="width: 400;"/></td>
      </tr>
      <tr>
        <td align="right">&#3629;&#3634;&#3588;&#3634;&#3619;&nbsp;</td>
        <td align="left"><input type="tex&#3629;&#3634;&#3588;&#3634;&#3619;t" name="building" id="building" value="<?=$building?>" tabindex="43"/></td>
      </tr>
      <tr>
        <td align="right">&#3627;&#3617;&#3641;&#3656;&#3610;&#3657;&#3634;&#3609;/&#3588;&#3629;&#3609;&#3650;&#3604;&nbsp;</td>
        <td align="left"><input type="text" name="village" id="village" value="<?=$village?>" tabindex="44"/></td>
      </tr>
      <tr>
        <td align="right">&#3605;&#3619;&#3629;&#3585;/&#3595;&#3629;&#3618;&nbsp;</td>
        <td align="left"><input type="text" name="soi" id="soi" value="<?=$soi?>" tabindex="45"/></td>
      </tr>
      <tr>
        <td align="right">&#3606;&#3609;&#3609;&nbsp;</td>
        <td align="left"><input type="text" name="street" id="street" value="<?=$street?>" tabindex="46"/></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><? 
		if($provinceId==""){
			include("thaiaddress.php");
		}else{
			include("thaiaddressShow.php");
		}
	?></td>
      </tr>
      <tr>
        <td align="right">&#3619;&#3627;&#3633;&#3626;&#3652;&#3611;&#3619;&#3625;&#3603;&#3637;&#3618;&#3660;&nbsp;</td>
        <td align="left"><input name="zip_1" tabindex="52" type="text" id="zip_1" value="<?=$zip?>"   onkeypress="return chknum(window.event.keyCode)"/><input name="button3"  tabindex="48" type="button" onClick="check_zipcode(document.getElementById('province').value,document.getElementById('amphur').value,document.getElementById('district').value)" value="ค้นหา" /></td>
      </tr>
    </table></td>
    <td colspan="2" align="right"><table width="100%" border="0">
      <tr>
        <td align="right">&#3648;&#3621;&#3586;&#3607;&#3637;&#3656;/&#3627;&#3657;&#3629;&#3591;&nbsp;</td>
        <td align="left"><input type="text" name="caddress" id="caddress" value="<?=$caddress?>" tabindex="54" style="width: 400;"/></td>
      </tr>
      <tr>
        <td align="right">&#3629;&#3634;&#3588;&#3634;&#3619;&nbsp;</td>
        <td align="left"><input type="text" name="cbuilding" id="cbuilding" value="<?=$cbuilding?>" tabindex="55"/></td>
      </tr>
      <tr>
        <td align="right">&#3627;&#3617;&#3641;&#3656;&#3610;&#3657;&#3634;&#3609;/&#3588;&#3629;&#3609;&#3650;&#3604;&nbsp;</td>
        <td align="left"><input type="text" name="cvillage" id="cvillage" value="<?=$cvillage?>" tabindex="56"/></td>
      </tr>
      <tr>
        <td align="right">&#3605;&#3619;&#3629;&#3585;/&#3595;&#3629;&#3618;&nbsp;</td>
        <td align="left"><input type="text" name="csoi" id="csoi" value="<?=$csoi?>" tabindex="57"/></td>
      </tr>
      <tr>
        <td align="right">&#3606;&#3609;&#3609;&nbsp;</td>
        <td align="left"><input type="text" name="cstreet" id="cstreet" value="<?=$cstreet?>" tabindex="58"/></td>
      </tr>
      <tr>
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
        <td align="right">&#3619;&#3627;&#3633;&#3626;&#3652;&#3611;&#3619;&#3625;&#3603;&#3637;&#3618;&#3660;&nbsp;</td>
        <td align="left"><input name="czip_1" tabindex="62" type="text" id="czip_1" value="<?=$czip?>"   onkeypress="return chknum(window.event.keyCode)"/><input name="button4"  tabindex="48" type="button" onClick="check_zipcode1(document.getElementById('cprovince').value,document.getElementById('camphur').value,document.getElementById('cdistrict').value)" value="ค้นหา" /></td>
      </tr>
    </table></td>
    </tr>
  

   <tr bgcolor="#FFCC33">
     <td colspan="2" align="center"><b>&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3585;&#3634;&#3619;&#3619;&#3633;&#3610;&#3612;&#3621;&#3611;&#3619;&#3632;&#3650;&#3618;&#3594;&#3609;&#3660;</b></td>
     <td colspan="2" align="center"><b>ผู้รับผลประโยชน์ทางธุรกิจ</b></td>
     </tr>
   <tr>
     <td width="11%" align="right">&#3608;&#3609;&#3634;&#3588;&#3634;&#3619;</td>
     <td width="34%"><select size="1" name="bankcode" id="bankcode" tabindex="63">
						
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
     <td width="14%" align="right">&#3588;&#3635;&#3609;&#3635;&#3627;&#3609;&#3657;&#3634;&#3594;&#3639;&#3656;&#3629;&nbsp;</td>
     <td width="41%"><select tabindex="69" name="iname_f" id="iname_f" onChange="document.getElementById('iname_ff').value=this.value;if(this.value == '123'){document.getElementById('iname_ff').value = ''; document.getElementById('iname_ff').readOnly  = false;document.getElementById('iname_ff').focus();}else {document.getElementById('iname_ff').readOnly  = true;}">
       <option  value="" <?=($iname_f==""?"selected":"")?>>เลือกคำนำหน้า</option>
       <option  value="นาย" <?=($iname_f=="นาย"?"selected":"")?>>นาย</option>
       <option value="นางสาว" <?=($iname_f=="นางสาว"?"selected":"")?>>นางสาว</option>
       <option value="นาง" <?=($iname_f=="นาง"?"selected":"")?>>นาง</option>
       <option value="123" <?=($iname_f=="อื่นๆ"?"selected":"")?>>อื่นๆ</option>
     </select>
     <input type="text" name="iname_ff"  id="iname_ff" value="<?=$iname_ff?>" tabindex="69" readonly /></td>
   </tr>
   <tr>
     <td align="right">&#3626;&#3634;&#3586;&#3634;</td>
     <td><input type="text" name="branch" id="branch" size="20" maxlength="64" value="<?=$branch?>" tabindex="64"></td>
    <td align="right">&#3594;&#3639;&#3656;&#3629;-&#3626;&#3585;&#3640;&#3621; : </td>
    <td><input type="text" name="iname_t" id="iname_t" value="<?=$iname_t?>" tabindex="69" size="43"  /></td>
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
        <input type="text" name="acc_no" id="acc_no"  size="13"  value="<?=$acc_no?>" tabindex="66" onKeyPress="return chknum(window.event.keyCode)" ></td>
    <td align="right">&#3650;&#3607;&#3619;&#3624;&#3633;&#3614;&#3607;&#3660; : </td>
	<td><input type="text" name="iphone" id="iphone" value="<?=$iphone?>" tabindex="71"/></td>
  </tr>
  <tr>
    <td align="right">&#3594;&#3639;&#3656;&#3629;&#3610;&#3633;&#3597;&#3594;&#3637;&nbsp;</td>
    <td><input type="text" name="acc_name" id="acc_name" size="40"  maxlength="40" tabindex="67" value="<?=$acc_name?>" <? if(empty($_GET["id"]))echo 'readonly'?> ></td>
    <td align="right">&#3648;&#3621;&#3586;&#3607;&#3637;&#3656;&#3610;&#3633;&#3605;&#3619;&#3611;&#3619;&#3632;&#3594;&#3634;&#3594;&#3609; : </td>
    <td><input type="text" name="iid_card" id="iid_card" value="<?=$iid_card?>" tabindex="71"  onKeyPress="return chknum(window.event.keyCode)" /></td>
  </tr>
  <tr>
    <td align="right">&#3627;&#3617;&#3634;&#3618;&#3648;&#3627;&#3605;&#3640;&nbsp;</td>
    <td><input type="text" name="memdesc" id="memdesc" size="40" value="<?=$memdesc?>" tabindex="68" /></td>
    <td align="left" colspan="2" >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFCC33"><b>&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3629;&#3639;&#3656;&#3609;&#3654;</b></td>
    <td align="center" colspan="2" bgcolor="#FFCC33"><b>&#3627;&#3621;&#3633;&#3585;&#3600;&#3634;&#3609;</b></td>
    </tr>
  
   <tr>
     <td align="right">&#3594;&#3635;&#3619;&#3632;&#3650;&#3604;&#3618; </td>
     <td><input type="radio"  name="payment" id="payment" value="1" tabindex="68" >
  &#3648;&#3591;&#3636;&#3609;&#3626;&#3604;
  <input type="radio" name="payment" id="payment"  value="2" tabindex="68"  >
  &#3610;&#3633;&#3605;&#3619;&#3648;&#3588;&#3619;&#3604;&#3636;&#3605;</td>
     <td colspan="2" valign="top" rowspan="3" align="right"><table width="100%">
       <tr >
         <td width="50%"><input type="checkbox" onClick="if(this.checked == true)document.getElementById('dateInput1').value='<?=date("Y-m-d")?>'; else document.getElementById('dateInput1').value = '';" name="cmp3" id="cmp3" value="&#3588;&#3619;&#3610;" <?=$cmp3==""?"":"checked"?> tabindex="72" />
           &#3651;&#3610;&#3626;&#3617;&#3633;&#3588;&#3619;
           <input type="text" id="dateInput1" name="bmdate3" size="10" maxlength="10"  tabindex="73" value="<?=$bmdate3?>" />
           <br>
           <input type="checkbox" name="cmp" id="cmp" onClick="if(this.checked == true)document.getElementById('dateInput2').value='<?=date("Y-m-d")?>'; else document.getElementById('dateInput2').value = '';"  value="&#3588;&#3619;&#3610;" <?=$cmp==""?"":"checked"?> tabindex="74" />
     สำเนาบัตรประชาชนผู้สมัครหลัก
           <input type="text" id="dateInput2" name="bmdate1" size="10" maxlength="10"  tabindex="75" value="<?=$bmdate1?>" />
		   <!------------------------------->
			<table border=0><tr>
			<?if($myfile1 !=""){ ?>	
			<td valign=middle>
			<img  style="display:none" id='pic' name='pic' src='<?='../uploads/member/'.$myfile1;?>'  ><input type='text' readonly name='xpic' id='xpic' value="<?=$myfile1?>" > </td>
			<td valign=middle><a href="<?='../uploads/member/'.$myfile1;?>" download>Load</a></td>
			<td valign=middle>
			<input type="button" name="reset" id="reset" value='ลบ' onclick="resetpic()" >
			</td>
			<? } ?>
			<td valign=middle>
			<input type="file" name="myfile01" id="myfile01" accept="image/png,image/jpeg,image/gif" >
			</td></tr></table>
<!------------------------------->
           <br>
           <input type="checkbox" name="cmp2" id="cmp2" onClick="if(this.checked == true)document.getElementById('dateInput3').value='<?=date("Y-m-d")?>'; else document.getElementById('dateInput3').value = '';"  value="&#3588;&#3619;&#3610;" <?=$cmp2==""?"":"checked"?> tabindex="76" />
         สำเนาบัญชีธนาคาร
           <input type="text" id="dateInput3" name="bmdate2" size="10" maxlength="10"  tabindex="77" value="<?=$bmdate2?>" />
		   <!---------------------------------------->
			<table border=0><tr valign=top>
			<?if($myfile2 !=""){ ?>	
			<td valign=middle>
			<img style="display:none" id='pic2' name='pic2' src='<?='../uploads/member/'.$myfile2;?>' ><input type='text' readonly name='xpic2' id='xpic2' value="<?=$myfile2?>" ></td>
			<td valign=middle><a href="<?='../uploads/member/'.$myfile2;?>" download>Load</a></td>
			<td valign=middle>
			<input type="button" name="reset" id="reset" value='ลบ' onclick="resetpic2()" >
			</td>
			<? } ?>
			<td valign=middle>
			<input type="file" name="myfile02" id="myfile02" accept="image/png,image/jpeg,image/gif" >
			</td></tr></table>
<!---------------------------------------->
           <br>
           <input type="checkbox" name="ccmp" id="ccmp" onClick="if(this.checked == true)document.getElementById('dateInput4').value='<?=date("Y-m-d")?>'; else document.getElementById('dateInput4').value = '';"  value="&#3588;&#3619;&#3610;" <?=$ccmp==""?"":"checked"?> tabindex="78" />
           &#3626;&#3635;&#3648;&#3609;&#3634;&#3610;&#3633;&#3605;&#3619;&#3611;&#3619;&#3632;&#3594;&#3634;&#3594;&#3609;&#3612;&#3641;&#3657;&#3626;&#3617;&#3633;&#3588;&#3619;&#3619;&#3656;&#3623;&#3617;
           <input type="text" id="dateInput4" name="cbmdate1" size="10" maxlength="10" tabindex="79" value="<?=$cbmdate1?>" />
           <br>
           <br></td>
         </tr>
     </table></td>
   </tr>
   <tr>
     <td align="right">&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td colspan="2" align="left">&#3627;&#3617;&#3634;&#3618;&#3648;&#3627;&#3605;&#3640; : <br>
       <textarea name="txtoption" cols="100" rows="5"><?=$txtoption?></textarea></td>
     </tr>
   <tr>

     <td align="right">&nbsp;</td>
     <td>&nbsp;</td>
    <td colspan="2" align="right">&nbsp;</td>
    </tr>
   
   <tr>
    <td colspan="4" align="center"><input type="button" value="ตรวจสอบ" onClick="<?=(isset($_GET['id'])?"emembercheck()":"imembercheck()")?>;" tabindex="80" > 
      &nbsp;
                  <input type="submit" value="บันทึก" name="ok"  id="ok" disabled tabindex="81" > 

                  &nbsp;
            <input type="reset" value="ยกเลิก"  onclick="window.location='index.php?sessiontab=1&sub=2'" tabindex="82" ></td>
    </tr>
</table>      </td>
    </tr>
  </table>
<br />
      <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font></div>
</form>
<tr><td>&nbsp;</td>
</tr>
