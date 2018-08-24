<?
$_SESSION["perbuy"] = 1;
?>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script type="text/javascript">
 function checkfreecharge()
  {
	   frm.ok.disabled = true;
    //
    // check form input values
    //
	//if(document.getElementById("freecharge").checked == true){
	//	document.getElementById("creditcharge").value = "1";
	//}else{
		
	//	document.getElementById("creditcharge").value = "<?=$_SESSION['creditcharge']?>";
	//	alert(document.getElementById("creditcharge").value);
	//}
  }
 function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
}
function getpoint(){
		if (wi) wi.close();
		wi=window.open("getpoint.php","list_picker_window","menubar=no,width=500,height=100,toolbar=no,scrollbars=1");
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
function showHideNum(boxName,divName,cstatus) { 
//alert(cstatus);
var extax = 1;
var showtotal1 = 0;

var taxdiscount = 1;
	var vatdiscount = 0;
	if(document.getElementById("satype").value == 'H'){
		 taxdiscount = 1.07;
		 vatdiscount = 0.03;
	}
var taxdiscount = 1;
	var vatdiscount = 0;

showtotal1 = parseFloat(document.getElementById('sumtotal').value)- Math.round((document.getElementById('sumtotal').value/taxdiscount)*vatdiscount)+parseFloat(document.getElementById('ajaxshipping').value);
if(divName != 'txtCash')showtotal1 = showtotal1-parseFloat(document.getElementById('txtCash').value);
if(divName != 'txtFuture')showtotal1 = showtotal1-parseFloat(document.getElementById('txtFuture').value);
if(divName != 'txtTransfer')showtotal1 = showtotal1-parseFloat(document.getElementById('txtTransfer').value);
if(divName != 'txtCredit1')showtotal1 = showtotal1-(parseFloat(document.getElementById('txtCredit1').value));
if(divName != 'txtCredit2')showtotal1 = showtotal1-(parseFloat(document.getElementById('txtCredit2').value));
if(divName != 'txtCredit3')showtotal1 = showtotal1-(parseFloat(document.getElementById('txtCredit3').value));
//if(divName != 'txtCredit4')showtotal1 = showtotal1-(parseFloat(document.getElementById('txtCredit4').value));
if(divName != 'txtInternet')showtotal1 = showtotal1-parseFloat(document.getElementById('txtInternet').value);
if(divName != 'txtDiscount')showtotal1 = showtotal1-parseFloat(document.getElementById('txtDiscount').value);
//if(divName != 'txt_pcoupon')showtotal1 = showtotal1-parseFloat(document.getElementById('txt_pcoupon').value);

	if(boxName.checked == true) { 
		if(showtotal1 < 0)showtotal1 = 0;
		document.getElementById(divName).value=Math.ceil(showtotal1*extax);
	}else { 
		document.getElementById(divName).value="0"; 
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
						 document.getElementById("czip").value=''; //แสดงผล
					}else{
					//	alert(data);
						 document.getElementById("czip").value=data.trim(); //แสดงผล 
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
}
function checkaddress(value) {
     var req = Inint_AJAX(); //สร้าง Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(value);
     req.open('GET', 'search_address.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(req.responseText);
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
	sendget_sponsorc(value);

	//alert(test);
     req.open('GET', 'search_member.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('mcode').value="";
					document.getElementById("mname").innerHTML="ไม่ได้อยู่ในสายงาน";
					}else{
					document.getElementById('mcode').value=value;
                    document.getElementById("mname").innerHTML=data; //แสดงผล
					sendget_position(value);
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
function sendget_position(value) {
     var req = Inint_AJAX(); //สร้าง Object
	// alert(value)
	value = str_pad(value,7,0,false);
	sendget_sponsorc(value);
	//alert(test);
     req.open('GET', 'search_member_position.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(req.responseText);
					if(data == 1234){
					}else{
						document.getElementById('sale').innerHTML = '';
					var myArray = data.split(':');
					document.getElementById('pos_check').value= myArray[1];
					document.getElementById('FrameID').contentWindow.location.reload(true);
					document.getElementById('FrameID1').contentWindow.location.reload(true);
					document.getElementById('FrameID2').contentWindow.location.reload(true);
					document.getElementById('FrameID3').contentWindow.location.reload(true);
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};

function sendget_position1(value) {
     var req = Inint_AJAX(); //สร้าง Object
	// alert(value)
//value = str_pad(value,7,0,false);
//	sendget_sponsorc(value);
	//alert(test);
     req.open('GET', 'search_member_position1.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(req.responseText);
					if(data == 1234){
					}else{
					//var myArray = data.split(':');
					//document.getElementById('pos_check').value= myArray[1];
					if(document.getElementById('satype').value != 'H')document.getElementById('sale').innerHTML = '';
					document.getElementById('FrameID').contentWindow.location.reload(true);
					document.getElementById('FrameID1').contentWindow.location.reload(true);
					document.getElementById('FrameID2').contentWindow.location.reload(true);
					document.getElementById('FrameID3').contentWindow.location.reload(true);
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
function sendget_sponsorc(value) {
	
	
     var req = Inint_AJAX(); //สร้าง Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_member_lb.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(data);
					if(data != 1234){
							document.getElementById('lb').value=data;
							if(<?=$_SESSION["inv_locationbase"]?> != document.getElementById("lb").value && document.getElementById("mcode").value != '1' && document.getElementById("mcode").value != '2' && document.getElementById("mcode").value != '3' && document.getElementById("mcode").value != '0000001' && document.getElementById("mcode").value != '0000002' && document.getElementById("mcode").value != '0000003'){
							//	alert(document.getElementById("mcode").value);
									document.getElementById("ajaxcharge").value = '1.25';
							}else{
								
									document.getElementById("ajaxcharge").value = '1';
							}
					}else{
							document.getElementById('lb').value='0';
							if(<?=$_SESSION["inv_locationbase"]?> != document.getElementById("lb").value && document.getElementById("mcode").value != '1' && document.getElementById("mcode").value != '2' && document.getElementById("mcode").value != '3' && document.getElementById("mcode").value != '0000001' && document.getElementById("mcode").value != '0000002' && document.getElementById("mcode").value != '0000003'){
							//	alert(document.getElementById("mcode").value);
									document.getElementById("ajaxcharge").value = '1.25';
							}else{
								
									document.getElementById("ajaxcharge").value = '1';
							}

					}
				
					
               }
          }
     };

	 
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
function checkStatus(value,strUser,total) {
     var req = Inint_AJAX(); //สร้าง Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_status.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(req.responseText);
					if(data == 1){
						if(strUser == 'C'){
							alert("<?=$wording_lan['tab2_billedit']['1_47']?>");
							document.getElementById('ok').disabled = true;
							exit;
						};
					}else{
						if(strUser == 'C'){
							//alert(total);alert(data);
							if(total <  parseFloat(data) || total >  parseFloat(data)+500 ){
								alert("<?=$wording_lan['tab2_billedit']['1_42']?> "+data+"PV <?=$wording_lan['tab2_billedit']['1_43']?> "+(parseFloat(data)+500)+" PV");
								document.getElementById('ok').disabled = true;
								exit;
							}
						};
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
function checkStatusNew(value,strUser,total) {
     var req = Inint_AJAX(); //สร้าง Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_status_new.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					if(data == 1){
						if(strUser == 'Q'){
							alert("<?=$wording_lan['tab2_billedit']['1_44']?>");
							document.getElementById('ok').disabled = true;
							exit;
						};
					}else{
						if(strUser == 'Q'){
							//alert(total);alert(data);
							if(total >  parseFloat(data)+100 ){
							//if(total <  parseFloat(data) || total >  parseFloat(data)+100 ){
								alert(" <?=$wording_lan['tab2_billedit']['1_45']?> "+(parseFloat(data)+500)+" PV");
								//alert("คุณต้องรักษายอดเป็นจำนวน "+data+"PV และ รักษายอดได้ไม่เกิน "+(parseFloat(data)+100)+" PV");
								document.getElementById('ok').disabled = true;
								exit;
							}
						};
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
function sendget_invent(value) {
     var req = Inint_AJAX(); //สร้าง Object
	// alert(value)
	//value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_invent.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('inv_code').value="";
					document.getElementById("inv_desc").innerHTML="<?=$wording_lan['tab2_billedit']['1_46']?>";
					}else{
					document.getElementById('inv_code').value=value;
                    document.getElementById("inv_desc").innerHTML=data; //แสดงผล
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript">
        function checkUserName(){
                var u = document.getElementById('mcode').value;

                $.post("c.php", { userName: u}, checkUserNameCompleted);
        }

        function checkUserNameCompleted(data){
		
			if(data != 1){
				//alert(data);
				document.getElementById('showsend1').innerHTML = data;
				//clicktab(3);
			}else{
				document.getElementById('showsend1').innerHTML = '';

			}
              //  alert("Server return: " + data);
        }
        function checkUserName1(){
                var u = document.getElementById('mcode').value;

                $.post("d.php", { userName: u}, checkUserNameCompleted1);
        }

         function checkUserNameCompleted1(data){
			//alert(data);
			
			//if(data != 1){
				//alert(data);
				var tott = 0;
				//alert(data);
				if(document.getElementById("freecharge").checked == true){
					document.getElementById('ajaxshipping').value = '0';
					data = 0;
				}
					else document.getElementById('ajaxshipping').value = data;
				//alert(document.getElementById('ajaxshipping').value);
				tott = parseFloat(document.getElementById('txtCash').value)+
				parseFloat(document.getElementById('txtFuture').value)+
				parseFloat(document.getElementById('txtTransfer').value)+
				parseFloat(document.getElementById('txtCredit1').value)+
				parseFloat(document.getElementById('txtCredit2').value)+

				parseFloat(document.getElementById('txtCredit3').value)+
				parseFloat(document.getElementById('txtInternet').value)+
				parseFloat(document.getElementById('txtDiscount').value)+
				parseFloat(data)+
				parseFloat(document.getElementById('txtOther').value);
					
			//alert(tott);
///			if(parseFloat(document.getElementById('sumtotal').value*document.getElementById("ajaxcharge").value)+parseFloat(document.getElementById('ajaxshipping').value) != tott){

	var taxdiscount = 1;
	var vatdiscount = 0;
	if(document.getElementById("satype").value == 'H'){
		 taxdiscount = 1.07;
		 vatdiscount = 0.03;
	}

var taxdiscount = 1;
	var vatdiscount = 0;
			if((parseFloat(document.getElementById('sumtotal').value*document.getElementById("ajaxcharge").value))- Math.round((document.getElementById('sumtotal').value/taxdiscount)*vatdiscount)+parseFloat(document.getElementById('ajaxshipping').value)+parseFloat(document.getElementById('ajaxshipping').value) != tott){
				alert('<?=$wording_lan["tab2_billedit"]["1_81"]?> '+tott+' <?=$wording_lan["tab2_billedit"]["1_83"]?> <?=$wording_lan["tab2_billedit"]["1_82"]?>');
				document.getElementById('ok').disabled=true;




				exit;
			}
				//clicktab(3);
			//}
              //  alert("Server return: " + data);
        }
	function abc(){
		//alert(<?=$_SESSION["chkfree"]?>);
		//		var chkfree = '<?=$_SESSION["chkfree"]?>';
		//	if( chkfree != '1'){
				//alert('กรุณาเลือกสินค้าฟรี');
			//	document.getElementById("ok").disabled = true;
			//	clicktab(3);
		//	}
              //  alert("Server return: " + data);
        }
</script>
<script language="javascript">
var xmlHttp;
function ibillcheck(){
	cal();
	document.getElementById('showsend1').innerHTML= "";
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('dateInput1').value;
	var field = "dateInput1";
	var flag = "1-0-0-0-0";
	var errDesc = "<?=$wording_lan['tab2_billedi']['1_3']?>";
	
	val = val + ","+document.getElementById('mcode').value;
	field = field +",mcode";
	flag = flag+",1-7-0-0-0";
	errDesc = errDesc + ",<?=$wording_lan['tab2_billedit']['1_2']?>";
	
	
	var e = document.getElementById("satype");
	var strUser = e.options[e.selectedIndex].value;
	checkStatus(document.getElementById('mcode').value,strUser,parseFloat(document.getElementById('sumpv').value));
	//checkStatusNew(document.getElementById('mcode').value,strUser,parseFloat(document.getElementById('sumpv').value));
	var tott = 0;
	tott = parseFloat(document.getElementById('txtCash').value)+
			parseFloat(document.getElementById('txtFuture').value)+
			parseFloat(document.getElementById('txtTransfer').value)+
		parseFloat(document.getElementById('txtCredit1').value)+
		parseFloat(document.getElementById('txtCredit2').value)+
		parseFloat(document.getElementById('txtCredit3').value)+
		parseFloat(document.getElementById('txtInternet').value)+
		parseFloat(document.getElementById('txtDiscount').value)+
		parseFloat(document.getElementById('txtOther').value);
			

	if(parseFloat(document.getElementById('sumtotal').value*document.getElementById("ajaxcharge").value)+parseFloat(document.getElementById('ajaxshipping').value) != tott){
		alert('<?=$wording_lan["tab2_billedit"]["1_81"]?> '+tott+'<?=$wording_lan["tab2_billedit"]["1_83"]?> <?=$wording_lan["tab2_billedit"]["1_82"]?>');
		exit;
	}else{
		if(document.getElementById('cprovince').value != ''){
			document.getElementById('ok').disabled = true;document.getElementById('frm').target = '_blank';document.getElementById('frm').action='b.php'; 
			document.getElementById('frm').submit();
			setTimeout("checkUserName()",1500);
			setTimeout("checkUserName1()",0);
				
		}
	}

//	if(){
	//alert(document.getElementById("ajaxcharge").value);
		if(document.getElementById("ajaxcharge").value > 0){
			document.getElementById('showsend1').innerHTML  = "<font color=#FF0000><b> มีการ Charge : "+parseFloat(document.getElementById('sumtotal').value*(document.getElementById("ajaxcharge").value-1))+" </b></font>";
		}
//	}

document.getElementById('frm').target = '_self';
document.getElementById('frm').action='billb_operate.php?state=0';


		val = val + ","+document.getElementById('satype').value;
		field = field +",satype";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab2_billedit']['1_1']?>";

		val = val + ","+document.getElementById('ccheckr').value;
		field = field +",ccheckr";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab2_billedit']['1_52']?>";

	if(document.getElementById('ccheckr').value == '1'){

		val = val + ","+document.getElementById('cname').value;
		field = field +",cname";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",Name";

		val = val + ","+document.getElementById('cmobile').value;
		field = field +",cmobile";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",Mobile";

		val = val + ","+document.getElementById('caddress').value;
		field = field +",caddress";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab2_billedit']['1_55']?>";

		val = val + ","+document.getElementById('cprovince').value;
		field = field +",cprovince";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab2_billedit']['1_56']?>";
		val = val + ","+document.getElementById('camphur').value;
		field = field +",camphur";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab2_billedit']['1_57']?>";
		val = val + ","+document.getElementById('cdistrict').value;
		field = field +",cdistrict";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab2_billedit']['1_58']?>";

		val = val + ","+document.getElementById('czip').value;
		field = field +",czip";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab2_billedit']['1_59']?>";
	}

	/*	if(document.getElementById('satype').value == 'L'){
			alert(<?=$_SESSION["vou"]?>);
			if(document.getElementById('chkFuture').checked == false){
				alert("แลกของชำระเป็น voucher");
			}
			if(<?=$_SESSION["vou"]?> < document.getElementById('sumtotal').value){
				alert("<?=$wording_lan['operate']['16'] ?>");
				document.getElementById('ok').disabled=true;
				document.getElementById('showsend1').innerHTML='';
				exit;
			}
		} */
/*	
	val = val + ","+document.getElementById('inv_code').value;
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสสาขา";
*/		
//loop check
document.getElementById('frm').target = '_self';
document.getElementById('frm').action='billb_operate.php?state=0';
//alert(document.getElementById('frm').target);
//alert(document.getElementById('frm').action);

	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"asaleh","checkstate");
}
function ebillcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('dateInput1').value;
	var skipval = "";
	var field = "dateInput1";
	var flag = "1-0-0-0-0";
	var errDesc = "วันที่";
	
	val = val + ","+document.getElementById('mcode').value;
	skipval = skipval+",";
	field = field +",mcode";
	flag = flag+",1-7-0-0-0";
	errDesc = errDesc + ",<?=$wording_lan['tab2_billedit']['1_2']?>";

	if(document.getElementById('inv_code').value != ''){
		if(document.getElementById("inv_desc").innerHTML == ''){
			alert('<?=$wording_lan["tab2_billedit"]["1_61"]?>');
			 frm.ok.disabled = true;
			exit;
		}
	}
/*	
	val = val + ","+document.getElementById('inv_code').value;
	skipval = skipval+",";
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสสาขา";
*/
document.getElementById('frm').target = '_blank';
document.getElementById('frm').action='billb_operate.php?state=1';
//alert(document.getElementById('frm').target);
//alert(document.getElementById('frm').action);
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);
	startRQ(field,val,skipval,flag,errDesc,"asaleh","checkstate");
}

</script>
<?
	function dialogbox($width,$color,$msg,$link){
        ?><table width=<?=$width?> bgcolor="<?=$color?>">
        	<tr valign="top">
            <td align="center"><font color="#FFFFFF"><?=$msg?></font></td>
        	</tr>
            <?
            if($link!=""){
				?><tr valign="top">
            	<td align="center"><?=$link?></td>
        		</tr><?
			}
			?>
        </table><? 
	}
?>

<script language="javascript" type="text/javascript">
var wi=null;
	function get_mem_listpicker_mcode(){
		if (wi) wi.close();
		//alert(this.getElementById('mcode_acc_name').innerHTML);
		wi=window.open("mem_listpicker_mcode.php?name="+document.frm.mcode.value,"list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	}
	function get_mem_listpicker_invcode(){
		if (wi) wi.close();
		//alert(this.getElementById('mcode_acc_name').innerHTML);
		wi=window.open("invent_listpicker.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	}
	function cal(){
		tag = window.parent.document.frm.getElementsByTagName('input');
		//alert(tag.length);
		var sumtotal=0;
		var sumpv=0;
		var skip = 50;
		var bgskip = 9;
		for(i=0;i<(tag.length-skip)/8;i++){
			step = i*8+bgskip;
			//step++;
		
			price = parseFloat(tag[step+2].value);
			pv = parseFloat(tag[step+3].value);
			num = parseFloat(tag[step+4].value);
			tag[step+5].value = num * price;
			tag[step+6].value = num * pv;
			//document.getElementById('sumtotal').value=sumtotal;
			//document.getElementById('sumpv').value=sumpv;
			//alert(num +" " + pv +" "+ price);
			sumtotal = sumtotal + (price*num);
			sumpv = sumpv + (pv*num);
			//alert(sumtotal+ " " + price + " " + num);

		}
		document.getElementById('sumtotal').value=sumtotal;
		document.getElementById('sumpv').value=sumpv;
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;<?=$wording_lan['tab2_billedit']['1_41']?>&nbsp; </font>";
		//alert(window.parent.document.mainsale.getElementsByTagName('input').length);
		//alert(sumtotal);
	}
	function saledel(pcode,pdesc,price,pv){
		var place;
		var step;
		var sumpv = 0;
		var sumtotal = 0;
		var out = true;
		var qp=0;
		var num;
		var skip = 50;
		var bgskip = 9;
		var l=0;

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
		//alert(tag.length);
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
		for(i=0;i<(tag.length-skip)/8;i++,l++){
			step = i*8+bgskip;
			//step++;
			if(pcode == tag[i*8 +bgskip].value){
				l--;
				continue;
			}

			place += "<tr>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ลบ' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (l+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly style='"+hidden+ "text-align:center;' type='text' name='pcode[]' value='" + tag[step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly style='"+hidden+ "' type='text' name='pdesc[]' value='" + tag[++step].value + "'></td>";
			price = parseFloat(tag[++step].value);
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='price[]' value='" + price + "'></td>";
			pv = parseFloat(tag[++step].value);
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='pv[]' value='" + pv + "'></td>";
			num = parseFloat(tag[++step]. value);
			//alert(num);
			place += "<td style='"+style_l+style_bd+"' align='right'><input style='text-align:right;' name='qty[]'  onkeyup='cal()' type='text' size='5' value='" + num + "' onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('<?=$wording_lan['tab2_billedit']['1_40']?>');this.value=1;cal();}\" ></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalprice[]' id='sumtotal' value='" + (price*num) + "'></td>";
			//place += "</tr>";
			sumtotal = sumtotal + (price*num);
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalpv[]' value='" + (pv*num) + "'></td>";
			sumpv = sumpv + (pv*num);

			place += "</tr>";
		}
		//alert(window.parent.document.mainsale.getElementsByTagName('input').length);
		//alert(sumtotal);
		place += "<tr bgcolor='#999999'>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='7'><?=$wording_lan['tab2_billedit']['1_84']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumtotal' id='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumpv' id='sumpv' value='" + sumpv + "'></td>";
		place += "</tr>";
		//place += "<tr><td colspan='9' align='right'><input type='submit' value='บันทึก'></td></tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='<?=$wording_lan['tab2_billedit']['1_37']?>' />&nbsp;<input type='submit' value='<?=$wording_lan['tab2_billedit']['1_38']?>' name='ok' id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=6'\" value='<?=$wording_lan['tab2_billedit']['1_39']?>' /></td></tr>";
		place += "</table>";
		//alert(place);
		window.parent.document.getElementById('sale').innerHTML = place;
		tag = window.parent.document.frm.getElementsByTagName('input');
		if(tag.length-skip<8){
			window.parent.document.getElementById('sale').innerHTML = "<table width='500' bgcolor='#009900'><tr><td align='center'><font color='#FFFFFF'><?=$wording_lan['tab2_billedit']['1_62']?></font></td></tr></table>";
		}
	}
</script> 
</head>

<body>
<?
if($_GET["cmc"])$mcode = $_GET["cmc"];
if(isset($_GET['id'])){

		$sql = "SELECT * FROM ".$dbprefix."asaleh WHERE id='".$_GET['id']."'  LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
			$redirect = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">".$wording_lan['tab2_billedit']['1_63']."</a>]";
			dialogbox("50%","#990000","".$wording_lan['tab2_billedit']['1_85']."",$redirect);
			exit;
		}else{
			$sadate = mysql_result($rs,0,'sadate');

			$cancel = mysql_result($rs,0,'cancel');
			$sqlC = "select calc from ".$dbprefix."around where fdate >= '$sadate' and tdate <= '$sadate' and calc = 1";
			$sqlSC = mysql_query($sqlC);
			if(mysql_num_rows($sqlSC) > 0 or $cancel == '1'){
						echo "<script language='JavaScript'>alert('".$wording_lan['tab2_billedit']['1_64']."');window.location='index.php?sessiontab=3&sub=6'</script>";	
						exit;
				}		
			$inv_code = mysql_result($rs,0,'inv_code');
			$satype = mysql_result($rs,0,'sa_type');
			$mcode = mysql_result($rs,0,'mcode');
			$radsend = mysql_result($rs,0,'send');
			$txtoption = mysql_result($rs,0,'txtoption');
			$chkCash = mysql_result($rs,0,'chkCash');
			$chkFuture = mysql_result($rs,0,'chkFuture');
			$chkTransfer = mysql_result($rs,0,'chkTransfer');
			$chkCredit1 = mysql_result($rs,0,'chkCredit1');
			$chkCredit2 = mysql_result($rs,0,'chkCredit2');
			$chkCredit3 = mysql_result($rs,0,'chkCredit3');
			$chkInternet = mysql_result($rs,0,'chkInternet');
			$chkDiscount = mysql_result($rs,0,'chkDiscount');
			$chkOther = mysql_result($rs,0,'chkOther');
			$txtCash = mysql_result($rs,0,'txtCash');
			$txtFuture = mysql_result($rs,0,'txtFuture');
			$txtTransfer = mysql_result($rs,0,'txtTransfer');
			$txtCredit1 = mysql_result($rs,0,'txtCredit1');
			$txtCredit2 = mysql_result($rs,0,'txtCredit2');
			$txtCredit3 = mysql_result($rs,0,'txtCredit3');
			$txtInternet = mysql_result($rs,0,'txtInternet');
			$txtDiscount = mysql_result($rs,0,'txtDiscount');
			$txtOther = mysql_result($rs,0,'txtOther');
			$optionCash = mysql_result($rs,0,'optionCash');
			$optionFuture = mysql_result($rs,0,'optionFuture');
			$optionTransfer = mysql_result($rs,0,'optionTransfer');
			$optionCredit1 = mysql_result($rs,0,'optionCredit1');
			$optionCredit2 = mysql_result($rs,0,'optionCredit2');
			$optionCredit3 = mysql_result($rs,0,'optionCredit3');
			$optionInternet = mysql_result($rs,0,'optionInternet');
			$optionDiscount = mysql_result($rs,0,'optionDiscount');
			$optionOther = mysql_result($rs,0,'optionOther');
			$cprovinceId = mysql_result($rs,0,'cprovinceId');
			$camphurId = mysql_result($rs,0,'camphurId');
			$cdistrictId = mysql_result($rs,0,'cdistrictId');
			$czip = mysql_result($rs,0,'czip');
			$caddress = mysql_result($rs,0,'caddress');
			//$inv_desc = mysql_result($rs,0,'inv_desc');
			//$mname = mysql_result($rs,0,'name_t');
			mysql_free_result($rs);
			if(empty($txtCredit3))$txtCredit3 = 0;
			if(empty($txtCredit2))$txtCredit2 = 0;
			if(empty($txtCredit1))$txtCredit1 = 0;
			if(empty($txtTransfer))$txtTransfer = 0;
			if(empty($txtFuture))$txtFuture = 0;
			if(empty($txtCash))$txtCash = 0;
			if(empty($txtDiscount))$txtDiscount = 0;
			if(empty($txtOther))$txtOther = 0;
		}
}else{
		$txtCash = '0';
		$txtFuture = '0';
		$txtTransfer = '0';
		$txtCredit1 = '0';
		$txtCredit2 = '0';
		$txtCredit3 = '0';
		$txtInternet = '0';
		$txtDiscount = '0';
		$txtOther = '0';
}
?>
<form method="post" action="billb_operate.php?state=<?=$_GET['id']==""?0:1?>" id="frm" name="frm"  onsubmit="return checkForm(this)" onKeyDown="document.getElementById('ok').disabled=true;" >
  <table border="0">
  <tr valign="top">
    <td>				
    <table width="600" border="0">
      <tr valign="top">
        <td><table border="1" width="100%" align="center">

          <tr>
            <td width="16%" align="right" valign=bottom><?=$wording_lan["tab2_billedit"]["1_1"]?></td>
            <td width="38%">
<input  style="display:none" onclick="checkfreecharge()" type="checkbox" name="freecharge" id="freecharge"> 
                <br>
            <select name="satype" id="satype">
                <option  value="" >เลือกรูปแบบการซื้อ  </option>     
				<?php		
					foreach($arr_satype_q as $key => $value):			
					echo '<option value="'.$key.'"';
						if($satype==$key)echo "selected";
					echo'>'.$value.'</option>'; 
					endforeach;
				?>
              </select>
			  <input type="hidden" value="<?=$_GET['id']?>" name="id"/></td>
            <td width="6%" align="right"><?=$wording_lan["tab2_billedit"]["1_4"]?></td>
            <td width="40%"><input type="text" id="dateInput1" readonly name="sadate" value="<?=$sadate==""?$_SESSION["datetimezone"]:$sadate?>">
            </td>
          </tr>
          <tr valign="top">
            <td width="16%" rowspan="2" align="right"><?=$wording_lan["tab2_billedit"]["1_2"]?></td>
            <td rowspan="2" nowrap="nowrap"><input style="background-color:#FFFF99" size="15" type="text" id="mcode" name="mcode" value="<?=$mcode?>">
                <input name="button2" type="button" onClick="sendget_sponsor(document.getElementById('mcode').value)" value="<?=$wording_lan['tab2_billedit']['1_37']?>" />
               
                <!--<input type="button" onClick="get_mem_listpicker_mcode()" value="&#3648;&#3621;&#3639;&#3629;&#3585;">-->
                <div id="mname"></div></td>
            <td align="right" valign="bottom" nowrap="nowrap">&nbsp;</td>
            <td nowrap="nowrap"><input type="radio" name="radsend" id="radsend" value="1"  onClick="document.getElementById('inv_code').disabled = true;document.getElementById('ccheckr').value = '1';document.getElementById('inv_code').value = '';" <?=($radsend=="1"?"checked":"")?>>
              <?=$wording_lan["tab2_billedit"]["1_4"]?>
              <input type="radio" name="radsend" id="radsend" value="2"   onClick="document.getElementById('ajaxshipping').value = 0;document.getElementById('inv_code').disabled = false;document.getElementById('inv_code').value='<?=$_SESSION["admininvent"]?>';document.getElementById('ccheckr').value = '2';"  <?=($radsend=="2"?"checked":"")?> >
             <?=$wording_lan["tab2_billedit"]["1_5"]?><br>
              <br>
              <input style="background-color:#FFFF99;display:none" size="15" readonly type="text" id="inv_code1" name="inv_code1" value="<?=$inv_code?>">
              <div id="showsend" ></div>
			  
              <!--  <input style="display:none" name="button3" type="button"  onclick="sendget_invent(document.getElementById('inv_code').value)" value="&#3588;&#3657;&#3609;" />
                <input style="display:none" type="button" onClick="get_mem_listpicker_invcode()" value="&#3648;&#3621;&#3639;&#3629;&#3585;"  >--></td>
          </tr>
          <tr valign="top">
            <td align="right" valign="top" nowrap="nowrap"><?=$wording_lan["tab2_billedit"]["1_6"]?></td>
            <td nowrap="nowrap"><select name="inv_code" id="inv_code"  disabled="disabled">
              <option value=""></option>
              <?					
						$result1=mysql_query("select * from ".$dbprefix."invent where locationbase = '".$_SESSION["inv_locationbase"]."' order by inv_code");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->inv_code."\" ";
							if ($_SESSION["admininvent"]==$row1->inv_code) {echo "selected";}
							echo ">".$row1->inv_desc."</option>";
						}
						?>
            </select></td>
          </tr>

		  

          <tr>
            <td colspan="4" align="left"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td id="sale" align="center">

        <? 
		if(!empty($_GET['id'])){
			$sql = "SELECT * FROM ".$dbprefix."asaled WHERE sano='".$_GET['id']."' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				$style_l = "border-left:1 solid #FFFFFF;";
				$style_t = "border-top:1 solid #000000;";
				$style_b = "border-bottom:1 solid #000000;";
				$style_bd = "border-bottom:1 dashed #000000;";
				$hidden = "border-left-width:0;border-right-width:0;border-top-width:0;border-bottom-width:0;";
				?><table  border="0" width="500" cellpadding="0" cellspacing="0">
					<tr align="center" bgcolor="#999999">
                    	<td bgcolor="#99CCCC" style="<?=$style_l.$style_t.$style_b?>">&nbsp;</td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan['tab2_billedit']['1_28']?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan['tab2_billedit']['1_29']?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan['tab2_billedit']['1_30']?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan['tab2_billedit']['1_31']?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan['tab2_billedit']['1_32']?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan['tab2_billedit']['1_33']?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan['tab2_billedit']['1_34']?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan['tab2_billedit']['1_35']?></td>
                    </tr>
  				<?
				$sumtotal = 0;
				$sumpv = 0;
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$proobj = mysql_fetch_object($rs);
					?>
					<tr>
                        <td style="<?=$style_l.$style_bd?>"><input  type="button" value='<?=$wording_lan["tab2_billedit"]["1_36"]?>' onClick="saledel('<?=$proobj->pcode?>','<?=$proobj->pdesc ?>','<?=$proobj->price?>','<?=$proobj->pv?>')"></td>
                    	<td style="<?=$style_l.$style_bd?>"><?=($i+1)?></td>
                        <td style="<?=$style_l.$style_bd?>" align="center"><input readonly style="text-align:center;<?=$hidden?>" size="7" type="text" name="pcode[]" value="<?=$proobj->pcode?>"></td>
                        <td style="<?=$style_l.$style_bd?>"><input size="13" readonly style="<?=$hidden?>" type="text" name="pdesc[]" value="<?=$proobj->pdesc?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="price[]" value="<?=$proobj->price?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="pv[]" value="<?=$proobj->pv?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input size="5" onkeyup='cal()' style='text-align:right;' type="text" name="qty[]" value="<?=$proobj->qty?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalprice[]" value="<?=($proobj->qty*$proobj->price)?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalpv[]" value="<?=($proobj->qty*$proobj->pv)?>"></td>

                    </tr>
					<?
					$sumtotal += ($proobj->qty*$proobj->price);
					$sumpv += ($proobj->qty*$proobj->pv);
				}
				?>
					<tr bgcolor='#999999'>
					<td style="<?=style_l.style_t.style_b?>" align='right' colspan='7'>รวม</td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumtotal' id='sumtotal' value="<?=$sumtotal?>"></td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" id='sumpv' name='sumpv' value="<?=$sumpv?>"></td>
					</tr>
					<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='<?=$wording_lan["tab2_billedit"]["1_37"]?>' />&nbsp;<input type='submit' value='<?=$wording_lan["tab2_billedit"]["1_38"]?>' name='ok'  id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick="window.location='index.php?sessiontab=3&sub=6'" value='<?=$wording_lan["tab2_billedit"]["1_39"]?>' /></td></tr>
                </table>
				<?
			}else
				dialogbox("100%","#990000",$wording_lan['tab2_billedit']['1_87'].$_GET['id'],"");
        }else{
			dialogbox("100%","#009900",$wording_lan['tab2_billedit']['1_86'],"");
		}
		?>
    	</td>
      </tr>
	  <tr><td><div id="checkstate" align="center"></div><br>
	  <div id="showsend1" align="center"></div>   </td></tr>
    </table>    
    <table border="1" width="100%">
      <tr valign="top">
        <td><input type="checkbox" name="chkCash" id="chkCash" <?=($chkCash=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtCash');">
          <?=$wording_lan["ewallet_25"]?></td>
        <td><input type="text" name="txtCash" id="txtCash" size="5"  value="<?=$txtCash?>"></td>
        <td><?=$wording_lan["ewallet_26"]?></td>
        <td><input name="optionCash" type="text" value="<?=$optionCash?>" size="60"  >
        </td>
      </tr>
      
      <tr valign="top">
        <td><input type="checkbox" name="chkTransfer" id="chkTransfer" <?=($chkTransfer=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtTransfer');">
         <?=$wording_lan["ewallet_27"]?></td>
        <td><input type="text" name="txtTransfer" id="txtTransfer" size="5"  value="<?=$txtTransfer?>"></td>
        <td><?=$wording_lan["ewallet_26"]?></td>
     
		
        <td><input name="optionTransfer"   value="<?=$optionTransfer?>" type="text" size="60" ></td>
</td>
      </tr>
      <tr valign="top">
        <td><input type="checkbox" name="chkCredit1" id="chkCredit1" <?=($chkCredit1=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtCredit1');">
          <?=$wording_lan["ewallet_28"]?></td>
        <td><input type="text" name="txtCredit1" id="txtCredit1" size="5"  value="<?=$txtCredit1?>"></td>
        <td><?=$wording_lan["ewallet_26"]?></td>
        <td><input name="optionCredit1"   value="<?=$optionCredit1?>" type="text" size="60" ></td>
      </tr>
      <tr valign="top">
        <td><input type="checkbox" name="chkCredit2" id="chkCredit2" <?=($chkCredit2=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtCredit2');">
          
          <?=$wording_lan["ewallet_29"]?></td>
        <td><input type="text" name="txtCredit2" id="txtCredit2" size="5"  value="<?=$txtCredit2?>"></td>
        <td><?=$wording_lan["ewallet_26"]?></td>
        <td><input name="optionCredit2"   value="<?=$optionCredit2?>" type="text" size="60" ></td>
      </tr>
      <tr valign="top">
        <td><input type="checkbox" name="chkCredit3" id="chkCredit3" <?=($chkCredit3=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtCredit3');">
          
          <?=$wording_lan["ewallet_30"]?></td>
        <td><input type="text" name="txtCredit3" id="txtCredit3" size="5"  value="<?=$txtCredit3?>"></td>
        <td><?=$wording_lan["ewallet_26"]?></td>
        <td><input name="optionCredit3"   value="<?=$optionCredit3?>" type="text" size="60" ></td>
      </tr>
      <tr valign="top" style="">
        <td><input type="checkbox" name="chkFuture" id="chkFuture" <?=($chkFuture=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtFuture');">
        <?=$wording_lan["Report_16"]?></td>
        <td><input type="text" name="txtFuture" id="txtFuture" size="5"  value="<?=$txtFuture?>"></td>
        <td><?=$wording_lan["ewallet_26"]?></td>
        <td><input name="optionFuture"   value="<?=$optionFuture?>" type="text" size="60" ></td>
      </tr>
	  <tr   valign="top">
        <td><input type="checkbox" name="chkInternet" id="chkInternet" <?=($chkInternet=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtInternet');">
          <?=$wording_lan["Report_17"]?></td>
        <td><input type="text" name="txtInternet" id="txtInternet" size="5"  value="<?=$txtInternet?>"></td>
        <td><?=$wording_lan["ewallet_26"]?></td>
        <td><input name="optionInternet"   value="<?=$optionInternet?>" type="text" size="60" ></td>
      </tr>
      <tr valign="top">
        <td><input type="checkbox" name="chkDiscount" id="chkDiscount" <?=($chkDiscount=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtDiscount');">
          <?=$wording_lan["discount"]?></td>
        <td><input type="text" name="txtDiscount" id="txtDiscount" size="5"  value="<?=$txtDiscount?>"></td>
        <td><?=$wording_lan["ewallet_26"]?></td>
        <td><input name="optionDiscount"   value="<?=$optionDiscount?>" type="text" size="60" ></td>
      </tr>
      <tr valign="top" style="display:none">
        <td><input type="checkbox" name="chkOther" id="chkOther" <?=($chkOther=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtOther');">
         <?=$wording_lan["word"]["register"]["other"]?></td>
        <td><input type="text" name="txtOther" id="txtOther" size="5"  value="<?=$txtOther?>"></td>
        <td><?=$wording_lan["ewallet_26"]?></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr valign="top">
        <td colspan="4" ><table width="100%">
            <tr valign="top" >
              <td colspan="4"><font color="#FF0000"><?=$wording_lan['tab2_billedit']['1_78']?></font> </td>
            </tr>
            <tr valign="top" bgcolor="#FFCC33">
              <td colspan="4"><b><?=$wording_lan["tab2_billedit"]["1_15"]?> / <?=$wording_lan["tab2_billedit"]["1_16"]?>
                    <input type="checkbox" name="chkaddress" id="chkaddress" onClick="checkaddress(document.getElementById('mcode').value)" value="1"  tabindex="34" />
              </b></td>
            </tr>
            <tr>
              <td><div id="idchksaddress">
                  <table>
					<tr valign="top">
				  <td colspan="2" align="right"><?=$wording_lan["tab2_billedit"]["1_17"]?></td>
				  <td colspan="2">&nbsp;<input type="text" name='cname' id="cname"></td>
				  </tr>
				<tr valign="top">
				  <td colspan="2" align="right"><?=$wording_lan["tab2_billedit"]["1_18"]?></td>
				  <td colspan="2">&nbsp;<input type="text" name='cmobile' id="cmobile"></td>
				  </tr>
                      <td colspan="2" align="right"><?=$wording_lan["tab2_billedit"]["1_19"]?></td>
                      <td colspan="2"><textarea name="caddress" id="caddress" cols="50" rows="3" tabindex="14"><?=$caddress?></textarea></td>
                    </tr>
                    <tr valign="top">
                      <td colspan="2" align="right">&nbsp;</td>
                      <td colspan="2"><? 
				  if($_SESSION["inv_locationbase"] == '1'){
						if($cprovinceId==""){
							include("cthaiaddress.php");
				
						}else{
							include("cthaiaddressShow.php");
				
						}
					}else{?>
					<table cellpadding="0" cellspacing="0" border="0"><tr>
					<td>Sub-District</td><td><input type="text" name="cdistrict" id="cdistrict"></td></tr><tr>
					<td>District</td><td><input type="text" name="camphur" id="camphur"></td></tr><tr>
					<td>Province</td><td><input type="text" name="cprovince" id="cprovince"></td>
					</tr></table>
					
					<?
					
					}
	?></td>
                    </tr>
                    <tr valign="top">
                      <td height="29" colspan="2" align="right"><?=$wording_lan["tab2_billedit"]["1_23"]?></td>
                      <td colspan="2"><input name="czip" tabindex="18" type="text" id="czip" value="<?=$czip?>" /><input name="button4"  tabindex="48" type="button" onClick="check_zipcode1(document.getElementById('cprovince').value,document.getElementById('camphur').value,document.getElementById('cdistrict').value)" value="<?=$wording_lan['tab2_billedit']['1_24']?>" /></td>
                    </tr>
                  </table>
              </div></td>
            </tr>
        </table></td>
      </tr>
    </table>
    <Br>
              <?=$wording_lan["tab2_billedit"]["1_25"] ?> : <br>
                <textarea name="txtoption" cols="100" rows="5"><?=$txtoption?></textarea>
    </td>
    <td>
      <? include('product_tab2.php');?>
 
      </td>
  </tr>
</table>
  <br>
    <input  type="hidden" id="ajaxcharge" name="ajaxcharge" value="1">
  <input  type="hidden" id="testtest" name="testtest">

</form>


  <input  type="hidden" id="ccaddress" name="ccaddress">
  <input  type="hidden" id="ccprovinceId" name="ccprovinceId">
  <input  type="hidden" id="ccdistrictId" name="ccdistrictId">
  <input  type="hidden" id="ccamphurId" name="ccamphurId">
  <input  type="hidden" id="cczip" name="cczip">
  <input  type="hidden" id="ccheckr" name="ccheckr" value="">
  <input  type="hidden" id="ajaxshipping" name="ajaxshipping" value="0">
  <input  type="hidden" id="lb" name="lb" value="0">
