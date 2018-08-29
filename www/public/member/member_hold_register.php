<? 
session_start();
include("global.php"); 
$bid = $_POST['bid']==""?$_GET['bid']:$_POST['bid'];
$_SESSION["type_regist"]=2;/// แจงสมัคร

$sqlwhere ="select * from ".$dbprefix."asaleh where mcode = '{$_SESSION["usercode"]}' and sa_type='H' and cancel = 0 and (hpv>0 or htotal>0) and id = '$bid' ";
//echo $sqlwhere;
$result1=mysql_query($sqlwhere);

if($bid == '' or mysql_num_rows($result1) == 0){
    echo "<script language='JavaScript'>alert('ต้องกดมาจากหน้าแจงเท่านั้น');window.location='index.php?sessiontab=1'</script>";    
    exit;
}

$result1=mysql_query("select * from ".$dbprefix."member where mcode = '{$_SESSION["usercode"]}'");

//echo "select * from ".$dbprefix."member where mcode = '{$_SESSION["usercode"]}'";
if(mysql_num_rows($result1) > 0){
    $row1 = mysql_fetch_object($result1);
    $ewallet = $row1->ewallet;
    $sql1 = "SELECT *  FROM ".$dbprefix."product where pcode = '0001' ";
    $rs1 = mysql_query($sql1);
    $total  = @mysql_result($rs1,0,'price');
    $pdesc  = @mysql_result($rs1,0,'pdesc');
    $tot_pv  = @mysql_result($rs1,0,'pv');
 
}

$result1=mysql_query("select * from ".$dbprefix."member where mcode = '{$_SESSION["usercode"]}'");
if(mysql_num_rows($result1) > 0){
    $row1 = mysql_fetch_object($result1);
    $ewallet = $row1->ewallet;
    $sql1 = "SELECT *  FROM ".$dbprefix."product where pcode = '".$GLOBALS["pcode_register"]."' ";
    $rs1 = mysql_query($sql1);
    $total  = @mysql_result($rs1,0,'price');
    $pdesc  = @mysql_result($rs1,0,'pdesc');
    $tot_pv  = @mysql_result($rs1,0,'pv');
    if($ewallet < $total){
       // echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["11"]."');window.location='index.php?sessiontab=1'</script>";    
       // exit;
    }
}
?>

<script type="text/javascript">

function check_dash(ele)
{
    var vchar = String.fromCharCode(event.keyCode);
    if ((vchar<'0' || vchar>'9') ) return false;
    ele.onKeyPress=vchar;
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
                    var data=req.responseText; 
					var myarr = data.split("|");
			 			 
					 //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('sp_code').value="";
					document.getElementById("sp_name").value="ไม่ได้อยู่ในสายงาน";
					document.getElementById("l1").innerHTML="";//แสดงผล
					document.getElementById("l2").innerHTML="";
					//document.getElementById("l3").innerHTML="";

					}else{
					document.getElementById('sp_code').value=value;
                    document.getElementById("sp_name").value=myarr[0].trim();
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
    checkaddress(document.getElementById('cprovince').value=document.getElementById('province').value,document.getElementById('camphur').value=        document.getElementById('amphur').value,document.getElementById('cdistrict').value=document.getElementById('district').value);
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
                //    alert(req.responseText);
                    //alert(data);
                    if(data == 1234){
                         document.getElementById("zip_1").value=''; //แสดงผล
                    }else{
                    //    alert(data);
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
                //    alert(req.responseText);
                    //alert(data);
                    if(data == 1234){
                         document.getElementById("czip_1").value=''; //แสดงผล
                    }else{
                    //    alert(data);
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
                //    alert(req.responseText);
                    if(data == 1234){
                    //document.getElementById("mname").innerHTML="ไม่ได้อยู่ในสายงาน";
                    }else{
                    //    alert(data);
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
function cal1(){
		tag = window.parent.document.frm.getElementsByTagName('input');
		//alert(tag.length);
		var sumtotal=0;
		var sumpv=0;
		var skip = 95;
		var bgskip = 3;
		for(i=0;i<(tag.length-skip)/9;i++){
			step = i*9+bgskip;
			//step++;
		
			price = parseFloat(tag[step+2].value);
			pv = parseFloat(tag[step+3].value);
			num = parseFloat(tag[step+4].value);
			if(num>parseFloat(tag[step+5].value)){
				num = parseFloat(tag[step+5].value);
				alert("จำนวนสินค้ามีไม่เพียงพอ");
				tag[step+4].value = num;
			}
			tag[step+6].value = num * price;
			tag[step+7].value = num * pv;
			//document.getElementById('sumtotal').value=sumtotal;
			//document.getElementById('sumpv').value=sumpv;
			//alert(num +" " + pv +" "+ price);
			sumtotal = sumtotal + (price*num);
			sumpv = sumpv + (pv*num);
			//alert(sumtotal+ " " + price + " " + num);

		}
		document.getElementById('sumtotal').value=sumtotal;
		document.getElementById('sumpv').value=sumpv;
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font>";
		//alert(window.parent.document.mainsale.getElementsByTagName('input').length);
		//alert(sumtotal);
		
		
		
	}
function imembercheck(){
	//sendget_sponsor1(document.getElementById('upa_code').value,document.getElementById('sp_code').value);
	/*var val = document.getElementById('mcode').value;
	var field = "mcode";
	var flag = "1-7-0-1-0";
	var errDesc = '<?=$wording_lan["tab1_mem_73"]?>';*/
	
	var val = '';
	var field = "";
	var flag = "";
	var errDesc = '';



	var val = document.getElementById('upa_name').value;
	var field = "upa_name";
	var flag = "1-0-0-0-0";
	var errDesc = 'ชื่ออัพไลน์';
	
	val = val + ","+document.getElementById('upa_code').value;
    field = field +",upa_code";
    flag = flag+",1-7-0-0-0-0";
    errDesc = errDesc + ",รหัสอัพไลน์";
	
	val = val + ","+document.getElementById('sp_code').value;
    field = field +",sp_code";
    flag = flag+",1-7-0-0-0-0";
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
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",เลขประจำตัวประชาชน";

    val = val + ","+document.getElementById('mobile').value;
    field = field +",mobile";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",เบอร์โทร";


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

   
    if(document.getElementById('email').value != ''){
        var Email=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(!document.getElementById('email').value.match(Email)){
        alert('<?=$wording_lan["info_main_1"]["25"]?>');
        document.getElementById('email').focus();
        exit;
        }

    }
	
		
/*    if(mobile != ''){
        if(mobile.charAt(0) != '0'){
            alert('เบอร์มือถือต้องขึ้นต้นด้วย ศูนย์');
            exit;
        }
    }*/
	
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


        val = val + ","+document.getElementById('id_card').value;
        field = field +",id_card";
        flag = flag+",1-13-0-1-0";
        errDesc = errDesc + ",เลขบัตรประชาชนใช้ไม่ได้ค่ะ";
        
    }
	

     var lrval="";
    var object = eval(document.frm.lr);
    for(i=0;i<object.length;i++){

        if(object[i].checked==true)
            lrval = object[i].value;
    }
    if(lrval == ''){
        alert("กรุณาเลือกซ้าย ขวา");
        exit;
    }

	   if(document.getElementById('upa_code').value!=""){
        val = val + ","+lrval+"#"+document.getElementById('upa_code').value;
        field = field +",lr#upa_code";
        flag = flag+",1-0-0-1-0";


        errDesc = errDesc + ",ด้าน";
    }

	if( document.getElementById('sumpv').value < 100){
		alert("ขั้นต่ำ 100 pv กรุณาเลือกสินค้า");
		document.getElementById('ok').disabled=true;
		exit;
	}
//loop check
    document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
    startRQ(field,val,"",flag,errDesc,"member","checkstate");

}
function emembercheck(){
    if(document.getElementById('upa_code').value!=''){
        value = document.getElementById('upa_code').value
        value1 = document.getElementById('sp_code').value
        
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
                        alert('ไม่ได้อยู่ในสายงาน');
                        exit;
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
                //            document.getElementById('upa_code').value=value;
                //             document.getElementById("upa_name").value=myArray[2];

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
                /*            val = val + ","+document.getElementById('upa_code').value;
                            skipval = skipval+",";
                            field = field +",upa_code";
                            flag = flag+",0-0-0-0-1-1";
                            errDesc = errDesc + ",รหัสอัพไลน์";
                */            
                            val = val + ","+document.getElementById('sp_code').value;
                            skipval = skipval+",";
                            field = field +",sp_code";
                            flag = flag+",0-0-0-0-1-1";
                            errDesc = errDesc + ",รหัสผู้แนะนำ";
                            
                            var lrval="";
                            var object = eval(window.document.frm.lr);
                            for(i=0;i<object.length;i++){
                                if(object[i].checked==true)
                                    lrval = object[i].value;
                            }
                        /*    if(document.getElementById('upa_code').value!=""){
                                val = val + ","+lrval+"#"+document.getElementById('upa_code').value;
                                skipval = skipval+ ","+document.getElementById('olr').value+"#"+document.getElementById('upa_code').value;
                                field = field +",lr#upa_code";
                                flag = flag+",1-0-0-1-0";
                                errDesc = errDesc + ",ด้าน";
                            }
                            document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
                            startRQ(field,val,skipval,flag,errDesc,"member","checkstate");
*/
                        }
                   }
              }
         };
         req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
         req.send(null); //ทำการส่ง
    }

}
function cal(){
		tag = window.parent.document.frm.getElementsByTagName('input');
		//alert(tag.length);
		var sumtotal=0;
		var sumpv=0;
		var skip = 95;
		var bgskip = 3;
		for(i=0;i<(tag.length-skip)/9;i++){
			step = i*9+bgskip;
			//step++;
		
			price = parseFloat(tag[step+2].value);
			pv = parseFloat(tag[step+3].value);
			num = parseFloat(tag[step+4].value);
			if(num>parseFloat(tag[step+5].value)){
				num = parseFloat(tag[step+5].value);
				alert("จำนวนสินค้ามีไม่เพียงพอ");
				tag[step+4].value = num;
			}
			tag[step+6].value = num * price;
			tag[step+7].value = num * pv;
			//document.getElementById('sumtotal').value=sumtotal;
			//document.getElementById('sumpv').value=sumpv;
			//alert(num +" " + pv +" "+ price);
			sumtotal = sumtotal + (price*num);
			sumpv = sumpv + (pv*num);
			//alert(sumtotal+ " " + price + " " + num);

		}
		document.getElementById('sumtotal').value=sumtotal;
		document.getElementById('sumpv').value=sumpv;
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font>";
		//alert(window.parent.document.mainsale.getElementsByTagName('input').length);
		//alert(sumtotal);
		
		
	}
function chknum(key){
    if(key>=48&&key<=57)
        return true;
    else
        return false;
}
function saledel(pcode,pdesc,price,pv){
       var place;
        var step;
        var sumpv = 0;
        var sumtotal = 0;
        var out = true;
        var qp=0;
        var num;
        var skip = 95;
        var bgskip = 3;
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
        window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font>";
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
        for(i=0;i<(tag.length-skip)/9;i++,l++){
            step = i*9+bgskip;
            //step++;
            if(pcode == tag[i*9 +bgskip].value){
                l--;
                continue;
            }
            
            place += "<tr>";
            place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ลบ' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+2].value + "','" + tag[step+3].value + "')\"></td>";
            place += "<td style='"+style_l+style_bd+"' align='center'>" + (l+1) + "</td>";
            place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly style='"+hidden+ "text-align:center;' type='text' name='pcode[]' value='" + tag[step].value + "'></td>";
            place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly style='"+hidden+ "' type='text' name='pdesc[]' value='" + tag[++step].value + "'></td>";






            price = parseFloat(tag[++step].value);
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='price[]' value='" + price + "'></td>";
            pv = parseFloat(tag[++step].value);
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='pv[]' value='" + pv + "'></td>";
            num = parseFloat(tag[++step]. value);
            //alert(num);
            place += "<td style='"+style_l+style_bd+"' align='right'><input style='text-align:right;' name='qty[]'  onkeyup='cal()' type='text' size='5' value='" + num + "'  onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('<?=$wording_lan['tab4']['1_40']?>');this.value=1;cal();}\">";
			place += "<input type='hidden' name='lmqty[]' value='" + tag[++step].value + "'></td>";
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalprice[]' value='" + (price*num) + "'></td>";
            //place += "</tr>";
            sumtotal = sumtotal + (price*num);
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalpv[]' value='" + (pv*num) + "'></td>";
            sumpv = sumpv + (pv*num);

            place += "</tr>";
        }
        //alert(window.parent.document.mainsale.getElementsByTagName('input').length);
        //alert(sumtotal);
        place += "<tr bgcolor='#999999'>";
        place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='7'><?=$wording_lan['tab5']['3_15']?></td>";
        place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' id='sumtotal' name='sumtotal' value='" + sumtotal + "'></td>";
        place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text'  name='sumpv' id='sumpv' value='" + sumpv + "'></td>";
        place += "</tr>";
        //place += "<tr><td colspan='9' align='right'><input type='submit' value='บันทึก'></td></tr>";
  
        place += "</table>";


        //alert(place);
        window.parent.document.getElementById('sale').innerHTML = place;
        tag = window.parent.document.frm.getElementsByTagName('input');
        if(tag.length-skip<4){
            
            window.parent.document.getElementById('sale').innerHTML = "<table width='500' bgcolor='#009900'><tr><td align='center'><font color='#FFFFFF'><?=$wording_lan['tab4']['1_62']?></font></td></tr></table>";
            //alert(tag.length);
        }
    } 
</script>

<?


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
<form name='frm' method="post" onKeyDown="document.getElementById('ok').disabled=true;" action="memoperate.php?state=<?=$_GET['id']==""?0:1?>" onSubmit="return checkForm(this)">
 <table border="0"  align="center">
  <tr valign="top">
    <td>
    <table width="650" border="0">
      <tr valign="top">
        <td>
            <table border="1" width="100%" align="center">            
            <tr valign="top">
              <td width="16%" align="right"><?=$wording_lan["plan_1"];?>&nbsp;</td>
              <td width="38%"><select name="satype" id="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>><?=$wording_lan["plan_1"];?> A</option>
              </select></td>
              <td width="46%">
              <input type="radio" name="radsend" value="1" <?=($radsend=="1"?"checked":"")?>><?=$wording_lan["tab4"]["1_4"];?>
              <input type="radio" name="radsend" value="2" <?=($radsend=="2"?"checked":"")?> ><?=$wording_lan["tab4"]["1_5"];?>              </td>
              </tr>
            <tr>
              <td colspan="3" align="left">          </td>
              </tr>
            </table>
        </td>
      </tr>
      <tr>
        <td id="sale" name="sale" align="center">
		<input type="hidden" name="sumpv"   id="sumpv" value="0">
        </td>
      </tr>
    </table>    
    <Br>    <br></td>
    <td>
    <iframe width="400" height="300" frameborder="0" src="./product_show_member_hold.php?bid=<?=$_GET['bid']?>" ></iframe><!--<br>

    <iframe width="400" height="300" frameborder="0" src="./package_show.php" ></iframe>
-->
    </td>
  </tr>
</table>
<input type="hidden" name="oid" value="<?=$oid?>">
  <table width="100%" border="0">
      <tr bgcolor="#FFCC33"><td><b><?=$wording_lan["tab1_mem_76"]?></b></td></tr>
    <tr><td>
<!--business information--> 
<table width="100%" border="0">
  
 <tr>
    <td colspan="2" ><?//echo 'รหัสสมาชิก'?><input id="mcode" name="mcode" size="10"  type="hidden"  maxlength="7" value="<?=$mcode?>"  />
      <input type="hidden" id="omcode" name="omcode" value="<?=$mcode?>" />
      <input type="hidden" name="id" readonly size="10" value="<?=$id;?>" />
	    <!-- <input type="hidden" id="xxx" name="xxxx" value="" />
      <input type="hidden" name="xxxx" readonly size="10" value="" /> -->
  &nbsp;&nbsp;&nbsp;<?=$wording_lan["rep_12"];?>
  <input type="text" id="mdate" tabindex="1" name="mdate" size="10" maxlength="10" value="<?=($mdate==""?date("Y-m-d"):$mdate)?>" />
&nbsp;<a href="javascript:NewCal('mdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a><font color="#808080"><?=$wording_lan["year_month_day"];?></font></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
 <tr>
    <td width="12%" align="right"><?=$wording_lan["tab1_mem_4"]?>
      <font color="#ff0000">*</font></td>
    <td width="30%" ><input tabindex="2" <? if(!empty($_GET["id"])){echo 'readonly'; echo ' style="background-color:#CCCCCC"';}?>   type="text" name="sp_code" id="sp_code" size="20"  maxlength="20" value="<?=$sp_code?>" />
      <input name="button2"  tabindex="3" type="button"   <? if(!empty($_GET["id"]))echo ' style="display:none"'; ?>  onClick="sendget_sponsor(document.getElementById('sp_code').value)" value="ตรวจสอบ" />
      <input name="button2"  tabindex="4" type="button" style="display:none" onClick="document.getElementById('ok').disabled=true;get_mem_listpicker_sp_code()" value="เลือก" />
      <input name="button2"  tabindex="5" type="button" <? if(!empty($_GET["id"]))echo ' style="display:none"'; ?> onClick="document.getElementById('sp_code').value='';document.getElementById('sp_name').value='';" value="ลบ" /></td>
    <td align="right">รหัสอัพไลน์<font color="#ff0000">*</font></td>
    <td><input style="background-color:#FFFFFF"  tabindex="6"  type="text" name="upa_code"  id="upa_code" size="20"  maxlength="20" value="<?=$upa_code?>" />
      <input name="button22"  tabindex="7" type="button" <? if(!empty($_GET["id"]))echo ' style="display:none"'; ?>  onClick="sendget_sponsor1(document.getElementById('upa_code').value,document.getElementById('sp_code').value)" value="ตรวจสอบ" />
	   <input name="button3"  tabindex="8" type="button"  style="display:none" onClick="document.getElementById('ok').disabled=true;get_mem_listpicker_upa_code();" value="เลือก" />
      <input name="button2"  tabindex="9" type="button"  <? if(!empty($_GET["id"]))echo ' style="display:none"'; ?>  onClick="document.getElementById('upa_code').value='';document.getElementById('upa_name').value='';" value="ลบ" /></td>
    </tr>
  <tr>
    <td width="20%" align="right"><?=$wording_lan["tab1_mem_6"]?>
      <font color="#ff0000">*</font></td>
    <td width="27%"><input style="background-color:#CCCCCC" readonly type="text" name="sp_name" id="sp_name" size="40"  maxlength="40" value="<?=$sp_name?>" /></td>
    <td align="right">ชื่ออัพไลน์<font color="#ff0000">*</font></td>
    <td><input style="background-color:#CCCCCC" readonly type="text" name="upa_name" id="upa_name" size="40"  maxlength="40" value="<?=$upa_name?>" /></td>
    </tr>
  <tr>
     <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">ด้าน<font color="#ff0000">*</font></td>
    <td><?
                	$rs = mysql_query("SELECT * FROM ".$dbprefix."lr_def");
					for($i=0;$i<mysql_num_rows($rs);$i++){
						?>
      <input tabindex="10" onClick="document.getElementById('ok').disabled=true;" type="radio" name="lr" id="lr"  <?=$lr==mysql_result($rs,$i,'lr_id')?"checked":""?> value="<?=mysql_result($rs,$i,'lr_id')?>" />
      <?=mysql_result($rs,$i,'lr_name')?>
      <?
					
					}
					mysql_free_result($rs);
				?>
      <input type="hidden" name="olr" value="<?=$olr?>" />    </td>

    </tr>

  
</table>
    </td></tr>
      <tr >
        <td><table width="100%" border="0">
        <tr bgcolor="#FFCC33">
          <td colspan="2" align="center"><b><?=$wording_lan["tab1_mem_11"]?></b></td>
          <td colspan="2" align="center"><b><?=$wording_lan["tab1_mem_12"]?></b></td>
        </tr>
        <tr>
          <td width="19%" align="right"><?=$wording_lan["tab1_mem_13"]?><font color="#ff0000">*</font>&nbsp;</td>
          <td width="27%"><select tabindex="12" name="name_f" id="name_f" onChange="getRadioValueByName(this.value);document.getElementById('name_ff').value=this.value;if(this.value == '123'){document.getElementById('name_ff').value = ''; document.getElementById('name_ff').readOnly  = false;document.getElementById('name_ff').focus();}else {document.getElementById('name_ff').readOnly  = true;}">
              <option  value="" <?=($name_f==""?"selected":"")?>><?=$wording_lan["tab1_mem_87"]?></option>
              <option  value="&#3609;&#3634;&#3618;" <?=($name_f=="&#3609;&#3634;&#3618;"?"selected":"")?>><?=$wording_lan["tab1_mem_15"]?></option>
              <option value="&#3609;&#3634;&#3591;&#3626;&#3634;&#3623;" <?=($name_f=="&#3609;&#3634;&#3591;&#3626;&#3634;&#3623;"?"selected":"")?>><?=$wording_lan["tab1_mem_16"]?></option>
              <option value="&#3609;&#3634;&#3591;" <?=($name_f=="&#3609;&#3634;&#3591;"?"selected":"")?>><?=$wording_lan["tab1_mem_17"] ?></option>
          
              <option value="123" <?=($name_f=="&#3629;&#3639;&#3656;&#3609;&#3654;"?"selected":"")?>><?=$wording_lan["tab1_mem_80"]?></option>
            </select>
              <input type="text" name="name_ff"  id="name_ff" value="<?=$name_ff?>" tabindex="13" readonly /></td>
          <td width="22%" align="right"><?=$wording_lan["tab1_mem_13"]?></td>
          <td width="32%"><select tabindex="12" name="cname_f" id="cname_f" onChange="getRadioValueByName(this.value);document.getElementById('cname_ff').value=this.value;if(this.value == '123'){document.getElementById('cname_ff').value = ''; document.getElementById('cname_ff').readOnly  = false;document.getElementById('cname_ff').focus();}else {document.getElementById('cname_ff').readOnly  = true;}">
            <option  value="" <?=($name_f==""?"selected":"")?>>
              <?=$wording_lan["tab1_mem_87"]?>
              </option>
            <option  value="&#3609;&#3634;&#3618;" <?=($name_f=="&#3609;&#3634;&#3618;"?"selected":"")?>>
              <?=$wording_lan["tab1_mem_15"]?>
              </option>
            <option value="&#3609;&#3634;&#3591;&#3626;&#3634;&#3623;" <?=($name_f=="&#3609;&#3634;&#3591;&#3626;&#3634;&#3623;"?"selected":"")?>>
              <?=$wording_lan["tab1_mem_16"]?>
              </option>
            <option value="&#3609;&#3634;&#3591;" <?=($name_f=="&#3609;&#3634;&#3591;"?"selected":"")?>>
              <?=$wording_lan["tab1_mem_17"] ?>
              </option>
            <option value="123" <?=($name_f=="&#3629;&#3639;&#3656;&#3609;&#3654;"?"selected":"")?>>
              <?=$wording_lan["tab1_mem_80"]?>
              </option>
          </select>            <input type="text" name="cname_ff" id="cname_ff" value="<?=$cname_ff?>" tabindex="28" readonly /></td>
        </tr>
        <tr>
          <td align="right"><?=$wording_lan["tab1_mem_20"]?><font color="#ff0000">*</font>&nbsp;</td>
          <td><input  type="text" id="name_t"  onKeyUp="document.getElementById('acc_name').value=document.getElementById('name_ff').value+' '+this.value;"  name="name_t" size="40"   value="<?=$name_t?>" tabindex="14"/>
              <input type="hidden" name="oid_name_t" id="oid_name_t" maxlength="13" value="<?=$oid_name_t?>" /></td>
          <td align="right"><?=$wording_lan["tab1_mem_20"]?></td>
          <td><input type="text" id="cname_t" name="cname_t" size="40" maxlength="40" value="<?=$cname_t?>" tabindex="29"/>
              <input type="hidden" name="coid_name_t" id="coid_name_t" maxlength="255" value="<?=$coid_name_t?>" /></td>
        </tr>
        <tr>
          <td align="right"><?=$wording_lan["tab1_mem_21"]?> </td>
          <td><input type="text" name="name_e" id="name_e" size="40" maxlength="40" value="<?=$name_e?>"  tabindex="15"/></td>
          <td align="right"><?=$wording_lan["tab1_mem_21"]?></td>
          <td><input type="text" name="cname_e" id="cname_e" size="40" maxlength="40" value="<?=$cname_e?>"  tabindex="30"/></td>
        </tr>
        <tr>
          <td align="right"><?=$wording_lan["tab1_mem_22"]?> </td>
          <td><input type="text" id="name_b" name="name_b" size="40" maxlength="40" value="<?=$name_b?>" tabindex="16"/></td>
          <td align="right"><?=$wording_lan["tab1_mem_22"]?></td>
          <td><input type="text" id="cname_b" name="cname_b" size="40" maxlength="40" value="<?=$cname_b?>" tabindex="31"/></td>
        </tr>
        <tr>
          <td align="right"><?=$wording_lan["tab1_mem_23"]?><font color="#ff0000">*</font>&nbsp;</td>
          <td><input type="radio" name="sex" id="sex" value="&#3594;&#3634;&#3618;" tabindex="17" <? if($sex=="&#3594;&#3634;&#3618;") echo "checked=\"checked\""; ?>>
            <?=$wording_lan["tab1_mem_32"]?>
            <input type="radio" name="sex" id="sex" value="&#3627;&#3597;&#3636;&#3591;" tabindex="18" <? if($sex=="&#3627;&#3597;&#3636;&#3591;") echo "checked=\"checked\""; ?>>
            <?=$wording_lan["tab1_mem_33"]?>     
            <td align="right"><?=$wording_lan["tab1_mem_23"]?></td>
          <td><input type="radio" name="csex" id="csex" value="&#3594;&#3634;&#3618;" tabindex="32" <? if($csex=="&#3594;&#3634;&#3618;") echo "checked=\"checked\""; ?>>
            <?=$wording_lan["tab1_mem_32"]?>
            <input type="radio" name="csex" id="csex" value="&#3627;&#3597;&#3636;&#3591;" tabindex="33" <? if($csex=="&#3627;&#3597;&#3636;&#3591;") echo "checked=\"checked\""; ?>>
            <?=$wording_lan["tab1_mem_33"]?>          </tr>
        <tr>
          <td align="right"><?=$wording_lan["tab1_mem_24"]?><font color="#ff0000">*</font>&nbsp;</td>
          <td nowrap="nowrap"><select name="birthday1"  id="birthday1">
            <option value=""><?=$wording_lan["tab1_mem_82"]?></option>
              <?PHP
$year =  1; for ($i = 0; $i <= 30; $i++) {echo "<option value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
?>
            </select>
            <select  name="birthday2"  id="birthday2">
              <option value=""><?=$wording_lan["tab1_mem_83"]?></option>
            <?PHP
$year =  1; for ($i = 0; $i <= 11; $i++) {echo "<option value='".gencode2($year)."' >".gen_month(gencode2($year))."</option>"; $year++;}
?>
            </select>
            <select  name="birthday3"  id="birthday3" >
               <option value=""><?=$wording_lan["tab1_mem_84"]?></option>
             <?PHP
$year = date("Y")+543 - 20; for ($i = 0; $i <= 62; $i++) {echo "<option value='$year'>$year</option>"; $year--;}
?>
            </select>
            <input style="display:none" type="text" name="birthday" id="birthday" size="10" maxlength="8" tabindex="19" value="<?=$birthday?>" onKeyPress="return chknum(window.event.keyCode)"  />
            &nbsp;<a href="javascript:NewCal('birthday','yyyymmdd',false,24)"><img style="display:none" src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="(&#3611;&#3611;&#3611;&#3611;-&#3604;&#3604;-&#3623;&#3623;)" /></a><font color="#808080"><br>
            </font></td>
          <td align="right"><?=$wording_lan["tab1_mem_24"]?></td>
          <td nowrap="nowrap"><select name="cbirthday1"  id="cbirthday1">
            <option value=""><?=$wording_lan["tab1_mem_82"]?></option>
              <?PHP
$year =  1; for ($i = 0; $i <= 30; $i++) {echo "<option value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
?>
            </select>
            <select  name="cbirthday2"  id="cbirthday2">
              <option value=""><?=$wording_lan["tab1_mem_83"]?></option>
            <?PHP
$year =  1; for ($i = 0; $i <= 11; $i++) {echo "<option value='".gencode2($year)."' >".gen_month(gencode2($year))."</option>"; $year++;}
?>
            </select>
            <select  name="cbirthday3"  id="cbirthday3" >
               <option value=""><?=$wording_lan["tab1_mem_84"]?></option>
             <?PHP
$year = date("Y")+543 - 20; for ($i = 0; $i <= 62; $i++) {echo "<option value='$year'>$year</option>"; $year--;}
?>
            </select><input style="display:none" type="text" name="cbirthday" id="cbirthday" size="10" maxlength="8" tabindex="34" value="<?=$cbirthday?>" onKeyPress="return chknum(window.event.keyCode)"  /></td>
        </tr>
        <tr>
          <td align="right"><?=$wording_lan["tab1_mem_25"]?><font color="#ff0000">*</font>&nbsp;</td>
          <td>
          <!--<select name="national" id="national"  tabindex="20">
              <option  value="&#3652;&#3607;&#3618;" <?=($national=="&#3652;&#3607;&#3618;"?"selected":"")?>>&#3652;&#3607;&#3618;</option>
          </select>-->
          <select name="national" id="national"  tabindex="20">
      <?                    
      if(empty($national))$national = $_SESSION["m_cname"];
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
          <td align="right"><?=$wording_lan["tab1_mem_25"]?></td>
          <td><!--<select name="cnational" id="cnational"  tabindex="35">
              <option  value="&#3652;&#3607;&#3618;" <?=($cnational=="&#3652;&#3607;&#3618;"?"selected":"")?>>&#3652;&#3607;&#3618;</option>
              <option value="&#3621;&#3634;&#3623;" <?=($cnational=="&#3621;&#3634;&#3623;"?"selected":"")?>>&#3621;&#3634;&#3623;</option>
          </select>-->
          <select name="cnational" id="cnational"  tabindex="35">
      <?                    
        if(empty($cnational))$cnational = $_SESSION["m_cname"];
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
          <td align="right"><?=$wording_lan["tab1_mem_26"]?><font color="#ff0000">*</font>&nbsp;</td>
          <td><input  name="id_card" id="id_card"  tabindex="21"  maxlength="17" type="text" value="<?=$id_card?>"   />
              <input type="hidden" name="oid_card" id="oid_card" maxlength="17" value="<?=$oid_card?>" />          </td>
          <td align="right"><?=$wording_lan["tab1_mem_26"]?></td>
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
              <input type="hidden" name="coid_card" id="coid_card" maxlength="17" value="<?=$coid_card?>" />   
			  <input  size="5" type="hidden" value="<?=$_GET['bid']?>" name="hid"/>       </td>
          <!--
    <input type="text" name="id_card" id="id_card" maxlength="13" value="<?=$id_card?>" onkeypress="return chknum(window.event.keyCode)" />
    <td align="right">&#3619;&#3633;&#3610;&#3650;&#3610;&#3609;&#3633;&#3626;&#3612;&#3656;&#3634;&#3609;</td>
    <td> <input type="radio" value="1" <? if ($bonusrec=="1") {echo "checked";}?> name="bonusrec">
                &#3608;&#3609;&#3634;&#3588;&#3634;&#3619;
                <input type="radio" <? if ($bonusrec=="2") {echo "checked";}?> name="bonusrec" value="2">
                &#3619;&#3633;&#3610;&#3648;&#3629;&#3591;</td>
  </tr>-->
        <tr style="display:none">
          <td align="right"><?=$wording_lan["tab1_mem_27"]?></td>
          <td><input type="text" name="id_tax" id="id_tax" value="<?=$id_tax?>" tabindex="22"  onKeyPress="return chknum(window.event.keyCode)"/></td>
          <td align="right"><?=$wording_lan["tab1_mem_27"]?></td>
          <td><input type="text" name="cid_tax" id="cid_tax" value="<?=$cid_tax?>" tabindex="37"  onKeyPress="return chknum(window.event.keyCode)" /></td>
        </tr>
        <tr>
          <td align="right"><?=$wording_lan["tab1_mem_28"]?></td>
          <td><input type="text" name="home_t"  id="home_t" maxlength="20" value="<?=$home_t?>" tabindex="23"  onKeyPress="return chknum(window.event.keyCode)"/></td>
          <td align="right"><?=$wording_lan["tab1_mem_28"]?></td>
          <td><input type="text" name="chome_t" id="chome_t"  maxlength="20" value="<?=$chome_t?>" tabindex="38"  onKeyPress="return chknum(window.event.keyCode)"/></td>
        </tr>
        <tr>
          <td align="right"><?=$wording_lan["tab1_mem_29"]?><font color="#ff0000">*</font>&nbsp;</td>
          <td><select size="1" name="cid_mobile" id="cid_mobile" tabindex="63">
         <?                    
                        $result1=mysql_query("select * from ".$dbprefix."location_base order by cid");
                        for ($i=1;$i<=mysql_num_rows($result1);$i++){
                            $row1 = mysql_fetch_object($result1);
                            //echo "<option value=\"\" ";
                            echo "<option value=\"".$row1->cid."\" ";
                            if($_SESSION["m_locationbase"]=="") {echo "selected";}
                            if ($_SESSION["m_locationbase"]==$row1->cid_mobile) {echo "selected";}
                            echo ">".$row1->cname."</option>";
                        }
                        ?>
     </select><input type="text" name="mobile" id="mobile"  maxlength="20" value="<?=$mobile?>"  onKeyPress="return chknum(window.event.keyCode)" tabindex="24"/>
            <font color="#808080"><?=$wording_lan["tab1_mem_73"]?>08xxxxxxxx </font></td>
          <td align="right"><?=$wording_lan["tab1_mem_29"]?></td>
          <td><input type="text" name="cmobile" id="cmobile"  maxlength="20" value="<?=$cmobile?>" tabindex="39"  onKeyPress="return chknum(window.event.keyCode)"/></td>
        </tr>
        <tr>
          <td align="right"><?=$wording_lan["tab1_mem_30"]?></td>
          <td><input type="text" name="fax" id="fax" value="<?=$fax?>"  onKeyPress="return chknum(window.event.keyCode)" tabindex="25"/></td>
          <td align="right"><?=$wording_lan["tab1_mem_30"]?></td>
          <td><input type="text" name="cfax" id="cfax" value="<?=$cfax?>" tabindex="40"  onKeyPress="return chknum(window.event.keyCode)"/></td>
        </tr>
        <tr>
          <td align="right"><?=$wording_lan["tab1_mem_31"]?></td>
          <td><input type="text" name="email" id="email" value="<?=$email?>" tabindex="26"/></td>
          <td align="right"><?=$wording_lan["tab1_mem_31"]?></td>
          <td><input type="text" name="cemail" id="cemail" value="<?=$cemail?>" tabindex="41"/></td>
      </table>
          
          <table width="100%" border="0">
          <tr bgcolor="#FFCC33">
            <td colspan="2" align="center"><b><?=$wording_lan["tab1_mem_37"]?></b></td>
            <td colspan="2" align="center"><b><?=$wording_lan["tab1_mem_74"]?>
                  <input type="checkbox" name="chkaddress" id="chkaddress" value="1"  tabindex="53" onClick="onclickaddress(this.value);" />
              <?=$wording_lan["tab1_mem_75"]?></b></td>
          </tr>
          <tr>
            <td height="27" align="right"><?=$wording_lan["tab1_mem_39"]?><font color="#ff0000">*</font> </td>
            <td><input type="text" name="address" id="address" value="<?=$address?>" tabindex="42"/></td>
            <td align="right"><?=$wording_lan["tab1_mem_39"]?>              <font color="#ff0000">*</font> </td>
            <td><input type="text" name="caddress" id="caddress" value="<?=$caddress?>" tabindex="54"/></td>
          </tr>
          <tr>
            <td align="right"><?=$wording_lan["tab1_mem_40"]?></td>
            <td><input type="text" name="building" id="building" value="<?=$building?>" tabindex="43"/></td>
            <td align="right"><?=$wording_lan["tab1_mem_40"]?></td>
            <td><input type="text" name="cbuilding" id="cbuilding" value="<?=$cbuilding?>" tabindex="55"/></td>
          </tr>
          <tr>
            <td align="right"><?=$wording_lan["tab1_mem_41"]?></td>
            <td><input type="text" name="village" id="village" value="<?=$village?>" tabindex="44"/></td>
            <td align="right"><?=$wording_lan["tab1_mem_41"]?></td>
            <td><input type="text" name="cvillage" id="cvillage" value="<?=$cvillage?>" tabindex="56"/></td>
          </tr>
          <tr>
            <td align="right"><?=$wording_lan["tab1_mem_42"]?></td>
            <td><input type="text" name="soi" id="soi" value="<?=$soi?>" tabindex="45"/></td>
            <td align="right"><?=$wording_lan["tab1_mem_42"]?></td>
            <td><input type="text" name="csoi" id="csoi" value="<?=$csoi?>" tabindex="57"/></td>
          </tr>
          <tr>
            <td width="12%" align="right"><?=$wording_lan["tab1_mem_43"]?></td>
            <td width="34%"><input type="text" name="street" id="street" value="<?=$street?>" tabindex="46"/></td>
            <td width="12%" align="right"><?=$wording_lan["tab1_mem_43"]?></td>
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
        //    var_dump($cprovinceId);
            include("cthaiaddressShow.php");
        }
    ?></div></td>
          </tr>
          <tr>
            <td align="right"><?=$wording_lan["tab1_mem_47"]?><font color="#ff0000">*</font></td>
            <td><input name="zip_1" tabindex="52" type="text" id="zip_1" maxlength="5"  value="<?=$zip[0]?>"  onKeyPress="return chknum(window.event.keyCode)"   />
              <!-- <input type="text" name="zip" size="10" maxlength="5" value="<?=$zip?>" />--><input name="button3"  tabindex="48" type="button" onClick="check_zipcode(document.getElementById('province').value,document.getElementById('amphur').value,document.getElementById('district').value)" value="<?=$wording_lan["search"];?>" /></td>
            <td align="right"><?=$wording_lan["tab1_mem_47"]?>              <font color="#ff0000">*</font></td>
            <td><input name="czip_1" tabindex="62" type="text" id="czip_1"  maxlength="5"  value="<?=$czip[0]?>"   onKeyPress="return chknum(window.event.keyCode)" />
              <!-- <input type="text" name="zip" size="10" maxlength="5" value="<?=$zip?>" />--><input name="button4"  tabindex="48" type="button" onClick="check_zipcode1(document.getElementById('cprovince').value,document.getElementById('camphur').value,document.getElementById('cdistrict').value)" value="<?=$wording_lan["search"];?>" /></td>
          </tr>
          <tr bgcolor="#FFCC33">
            <td colspan="2" align="center"><b><?=$wording_lan["tab1_mem_48"]?></b></td>
            <td colspan="2" align="center"><b><?=$wording_lan["tab1_mem_49"]?></b></td>
          </tr>
          <tr>
            <td align="right"><?=$wording_lan["tab1_mem_50"]?></td>
     <td><select size="1" name="bankcode" id="bankcode" tabindex="63">
         <?                    
                        $result1=mysql_query("select * from ".$dbprefix."bank order by bankname");
                        for ($i=1;$i<=mysql_num_rows($result1);$i++){
                            $row1 = mysql_fetch_object($result1);
                            //echo "<option value=\"\" ";
                            echo "<option value=\"".$row1->bankcode."\" ";
                            if($bankcode==""&&$row1->bankcode==26) {echo "selected";}
                            if ($bankcode==$row1->bankcode) {echo "selected";}
                            echo ">";
							if($_SESSION["wording"] == "EN"){
								echo $row1->bankname_en;
							}
							else{
								echo $row1->bankname;
							}
							echo "</option>";
                        }
                        ?>
     </select></td>
     <td align="right"><?=$wording_lan["tab1_mem_13"]?></td>
     <td><select tabindex="69" name="iname_f" id="iname_f" onChange="document.getElementById('iname_ff').value=this.value;if(this.value == '123'){document.getElementById('iname_ff').value = ''; document.getElementById('iname_ff').readOnly  = false;document.getElementById('iname_ff').focus();}else {document.getElementById('iname_ff').readOnly  = true;}">
         <option  value="" <?=($iname_f==""?"selected":"")?>><?=$wording_lan["tab1_mem_14"]?></option>
         <option  value="นาย" <?=($iname_f=="นาย"?"selected":"")?>><?=$wording_lan["tab1_mem_15"]?></option>
         <option value="นางสาว" <?=($iname_f=="นางสาว"?"selected":"")?>><?=$wording_lan["tab1_mem_16"]?></option>
         <option value="นาง" <?=($iname_f=="นาง"?"selected":"")?>><?=$wording_lan["tab1_mem_17"]?></option>
         <option value="123" <?=($iname_f=="อื่นๆ"?"selected":"")?>><?=$wording_lan["tab1_mem_80"]?></option>
       </select>
         <input type="text" name="iname_ff"  id="iname_ff" value="<?=$iname_ff?>" tabindex="69" readonly /></td>
   </tr>
   <tr>
     <td align="right"><?=$wording_lan["tab1_mem_51"]?></td>
     <td><input type="text" name="branch" id="branch" size="20" maxlength="64" value="<?=$branch?>" tabindex="64"></td>
    <td align="right"><?=$wording_lan["tab1_mem_56"]?> : </td>
    <td><input type="text" name="iname_t" id="iname_t" value="<?=$iname_t?>" tabindex="69" size="43"/></td>
   </tr>
  <tr>
    <td align="right"><?=$wording_lan["tab1_mem_52"]?></td>
    <td><input name="acc_type"  tabindex="65" id="acc_type" type="radio" <? if($acc_type=="&#3629;&#3629;&#3617;&#3607;&#3619;&#3633;&#3614;&#3618;&#3660;") echo "checked=\"checked\""; ?> value="&#3629;&#3629;&#3617;&#3607;&#3619;&#3633;&#3614;&#3618;&#3660;" checked />
  <?=$wording_lan["tab1_mem_70"]?>
  <!--<input name="acc_type" type="radio" <? if($acc_type=="&#3585;&#3619;&#3632;&#3649;&#3626;&#3619;&#3634;&#3618;&#3623;&#3633;&#3609;") echo "checked=\"checked\""; ?> value="&#3585;&#3619;&#3632;&#3649;&#3626;&#3619;&#3634;&#3618;&#3623;&#3633;&#3609;"  />&#3585;&#3619;&#3632;&#3649;&#3626;&#3619;&#3634;&#3618;&#3623;&#3633;&#3609;
    <input name="acc_type" type="radio" <? if($acc_type=="&#3613;&#3634;&#3585;&#3611;&#3619;&#3632;&#3592;&#3635;") echo "checked=\"checked\""; ?> value="&#3613;&#3634;&#3585;&#3611;&#3619;&#3632;&#3592;&#3635;" /> &#3613;&#3634;&#3585;&#3611;&#3619;&#3632;&#3592;&#3635;</td>-->
    <td align="right"><?=$wording_lan["tab1_mem_57"]?> : </td>
    <td><input type="text" name="irelation" id="irelation" value="<?=$irelation?>" tabindex="70"/></td>
  </tr>
  <tr>
    <td align="right"><?=$wording_lan["tab1_mem_53"];?></td>
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
    <td align="right"><?=$wording_lan["tab1_mem_58"]?> : </td>
    <td><input type="text" name="iphone" id="iphone" value="<?=$iphone?>" tabindex="71"/></td>
  </tr>
  <tr>
    <td align="right"><?=$wording_lan["tab1_mem_54"]?></td>
    <td><input type="text" name="acc_name" id="acc_name" size="40"  maxlength="40" tabindex="67" value="<?=$acc_name?>" readonly></td>
    <td align="right"><?=$wording_lan["tab1_mem_79"]?> : </td>
    <td><input type="text" name="iid_card" id="iid_card" value="<?=$iid_card?>" tabindex="71"  onKeyPress="return chknum(window.event.keyCode)" /></td>
  </tr>
  <tr>
    <td align="right"><?=$wording_lan["tab1_mem_55"]?></td>
    <td><input type="text" name="memdesc" id="memdesc" size="40" value="<?=$memdesc?>" tabindex="68" /></td>
    <td align="left" colspan="2" ><b></b></td>
    </tr>
          <tr>
           <td colspan="2"  bgcolor="#FFCC33"align="center"><b><?=$wording_lan["tab1_mem_64"]?></b></td>
            <td colspan="2" align="right">&nbsp;</td>
          </tr>
          <tr>
          <? if($GLOBALS["sending"] == '1'){?>
            <td align="right"><?=$wording_lan["tab1_mem_65"]?></td>
            <td><input type="radio"  onClick="document.getElementById('sinv_code').disabled=true" checked="checked"  name="sletter" id="sletter" value="&#3592;&#3633;&#3604;&#3626;&#3656;&#3591;" tabindex="68"  <? if($sletter=="0" or empty($sletter)) echo "checked=\"checked\""; ?>>
<?=$wording_lan["tab1_mem_66"]?>
  <input type="radio" name="sletter" id="sletter" onClick="document.getElementById('sinv_code').disabled=false;document.getElementById('sinv_code').focus();" value="1" tabindex="68"  <? if($sletter=="1") echo "checked=\"checked\""; ?>>
<?=$wording_lan["tab1_mem_67"]?> <select style="width:120px" name="sinv_code" id="sinv_code"  tabindex="68"  disabled="disabled">
              <option value=""><?=$wording_lan["tab1_mem_71"]?></option>
        <?                    

                        $result1=mysql_query("select * from ".$dbprefix."invent where inv_type=1 and locationbase = '".$_SESSION["m_locationbase"]."' order by inv_code");

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
          <tr style="display:none">
            <td align="right"><?=$wording_lan["tab1_mem_77"]?><font color="#ff0000">*</font> </td>
            <td><input type="radio"  onClick="document.getElementById('sinv_code').disabled=true;document.getElementById('ccheckr').value = '1';"  name="sbook" id="sbook" value="1" tabindex="68"  >
              <?=$wording_lan["tab1_mem_66"]?>
              <input type="radio" name="sbook" id="sbook"  onClick="document.getElementById('sbinv_code').disabled=false;document.getElementById('sbinv_code').focus();document.getElementById('ccheckr').value = '2';" value="2" tabindex="68"  >
              <?=$wording_lan["tab1_mem_67"]?>
              <select name="sbinv_code" id="sbinv_code" style="width:120px"   tabindex="68"  disabled="disabled">
  <option value=""><?=$wording_lan["tab1_mem_71"]?></option>
  <?                    

                        $result1=mysql_query("select * from ".$dbprefix."invent where inv_type=1 and locationbase = '".$_SESSION["m_locationbase"]."' order by inv_code");

                        for ($i=1;$i<=mysql_num_rows($result1);$i++){
                            $row1 = mysql_fetch_object($result1);
                            //echo "<option value=\"\" ";
                            echo "<option value=\"".$row1->inv_code."\" ";
                            //if ("BKK1"==$row1->inv_code) {echo "selected";}
                            echo ">".$row1->inv_desc."</option>";
                        }
                        ?>
</select></td>
            <td colspan="2" align="right">&nbsp;</td>
            <? } else {?>
            <td align="right"><?=$wording_lan["tab1_mem_65"]?></td>
            <td>
  <input type="radio" name="sletter" id="sletter" onClick="document.getElementById('sinv_code').disabled=false;document.getElementById('sinv_code').focus();" value="1" tabindex="68"  checked="checked">
  <?=$wording_lan["tab1_mem_66"]?>
  <select style="width:120px" name="sinv_code" id="sinv_code"  tabindex="68" >

              <option value=""><?=$wording_lan["tab1_mem_71"]?></option>
        <?                    

                        $result1=mysql_query("select * from ".$dbprefix."invent where locationbase = '".$_SESSION["m_locationbase"]."' order by inv_code");

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
            <td align="right"><?=$wording_lan["tab1_mem_77"]?><font color="#ff0000">*</font> </td>
            <td><select name="sbinv_code" id="sbinv_code" style="width:120px"   tabindex="68"  >
  <option value=""><?=$wording_lan["tab1_mem_81"]?></option>
  <?                    

                        $result1=mysql_query("select * from ".$dbprefix."invent where  locationbase = '".$_SESSION["m_locationbase"]."' order by inv_code");

                        for ($i=1;$i<=mysql_num_rows($result1);$i++){
                            $row1 = mysql_fetch_object($result1);
                            //echo "<option value=\"\" ";
                            echo "<option value=\"".$row1->inv_code."\" ";
                            //if ("BKK1"==$row1->inv_code) {echo "selected";}
                            echo ">".$row1->inv_desc."</option>";
                        }
                        ?>
</select></td>
            <td colspan="2" align="right">&nbsp;</td>
            <? }?>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4" align="center"><input name="button" type="button" tabindex="80" onClick="<?=(isset($_GET['id'])?"emembercheck()":"imembercheck()")?>" value="<?=$wording_lan["tab1_mem_85"]?>" >
              &nbsp;
              <input type="submit" value="<?=$wording_lan["tab1_mem_68"]?>" name="ok"  id="ok" disabled tabindex="81" >
              &nbsp;
              <input name="reset" type="reset" tabindex="82"  onclick="window.location='index.php?sessiontab=1'" value="<?=$wording_lan["tab1_mem_69"]?>" ></td>
          </tr>
        </table></td>


      </tr>

    <tr>
      <td>
<!--member Information--></td>
    </tr>
  </table>
<br />
      <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;<?=$wording_lan["tab1_mem_86"]?>&nbsp; </font></div>
  <input  type="hidden" id="ccheckr" name="ccheckr" value="">

</form>
