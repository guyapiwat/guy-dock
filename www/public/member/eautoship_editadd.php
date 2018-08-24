<?
$_SESSION["perbuy"] = 1;
?>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script type="text/javascript">
function chknum(key){
    if(key>=48&&key<=57)
        return true;
    else
        return false;
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
    value = str_pad(value,7,0,false);
         req.open('GET', 'search_member_ewallet.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
         req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
              if (req.readyState==4) {
                   if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                        var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
                        //alert(req.responseText);
                        if(data == 1234){
                        document.getElementById('mcode').value="";
                        document.getElementById("mname").innerHTML="<?=$wording_lan["tab4"]["1_27"]?>";
                        }else{
                        document.getElementById('mcode').value=value;
                        document.getElementById("mname").innerHTML=data; //แสดงผล
                        }
                   }
              }
         };
         req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
         req.send(null); //ทำการส่ง
};
</script>
<script language="javascript">
var xmlHttp;
function ibillcheck(){
    var val = document.getElementById('sadate').value;
    var field = "sadate";
    var flag = "1-0-0-0-0";
    var errDesc = "<?=$wording_lan["Date"]?>";
    
    val = val + ","+document.getElementById('mcode').value;
    field = field +",mcode";
    flag = flag+",1-7-0-0-0";
    errDesc = errDesc + ",<?=$wording_lan["Report_1"]?>"; 
    
    val = val + ","+document.getElementById('spayment').value;
    field = field +",spayment";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",เลือกวิธีการชำระเงิน";

	if(document.getElementById('txtMoney').value == ""){
		document.getElementById('txtMoney').value = 0;

	}
	if(document.getElementById('spayment').value =='2' && document.getElementById('mcode').value != '<?=$_SESSION["usercode"]?>'){
		alert('เป็นรหัสตัวเองเท่านั้น');
		document.getElementById('mcode').value = '';
		document.getElementById('mname').innerHTML = '';
		exit;

	}
	if(document.getElementById('spayment').value =='3' && document.getElementById('mcode').value != '<?=$_SESSION["usercode"]?>'){
		alert('ถอนให้รหัสตัวเองได้เท่านั้น');
		document.getElementById('mcode').value = '';
		document.getElementById('mname').innerHTML = '';
		exit;
	}
	if(document.getElementById('txtMoney').value < 1){
		alert('กรุณากรอก Ewallet ที่ต้องการโอน');
		document.getElementById('txtMoney').focus();
		exit;
	}             
    document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
    startRQ(field,val,"",flag,errDesc,"asaleh","checkstate");
}
</script>
<form method="post" action="ewallet_tranfer_operate_new.php?state=0" id="frm" name="frm"  onsubmit="return checkForm(this)" onKeyDown="document.getElementById('ok').disabled=true;" >
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="clearfix">
		<div>
			<div id="user-profile-1" class="user-profile row">
				<div class="col-xs-12 col-sm-2 " >&nbsp;</div>
				<div class="col-xs-12 col-sm-7">
					<div class="profile-user-info profile-user-info-striped ">
						<div class="profile-info-row table-header">
							<div class="profile-info-value">ข้อมูลการโอนถอน</div>
							<div class="profile-info-value"></div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> วันที่ </div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="text" id="sadate" name="sadate" value="<?=$sadate==""?$_SESSION["datetimezone"]:$sadate?>" readonly="" class="form-control">
								</div>
							</div>
						</div>
						<!--div class="profile-info-row">
							<div class="profile-info-name"> เลือกวิธีการชำระเงิน </div>
							<div class="profile-info-value">
								<div class="controls">
									<select size="1" name="spayment" id="spayment" onChange="
document.getElementById('chkpayment').checked = false;
document.getElementById('ok').disabled = true;
document.getElementById('button').disabled = true;
if(this.value == '3'){
document.getElementById('mcode').readOnly = true;
document.getElementById('mcode').value = '<?=$_SESSION["usercode"]?>';
sendget_sponsor(document.getElementById('mcode').value);
}else{
document.getElementById('mcode').readOnly = false;
document.getElementById('mcode').value = '';
document.getElementById('mname').innerHTML = '';
}
" >
									  <option value="">เลือก</option>
									  <option value="1">โอน Ewallet</option>
									  <option value="3">ถอน Ewallet</option>
									</select>
								</div>
							</div>
						</div-->
						

						<div class="profile-info-row">
							<div class="profile-info-name"> จำนวนเงิน </div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="number" min=0 id="txtMoney" name="txtMoney" onkeypress="return chknum(window.event.keyCode)"  class="form-control">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> รหัสผ่าน </div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="text" id="sv_code" name="sv_code"  class="form-control">
								</div>
							</div>
						</div>


						<!--div class="profile-info-row">
							<div class="profile-info-name"> รหัสสมาชิก </div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="text" id="mcode" name="mcode"  class="form-control">
									<span class="input-group-btn">
									<button class="btn btn-sm btn-default" type="button" onClick="sendget_sponsor(document.getElementById('mcode').value)" >
										<i class="ace-icon fa fa-search bigger-110"></i>
										Search
									</button>
									</span>
								</div>
							</div>
						</div-->	

						<div class="profile-info-row">
							<div class="profile-info-name"> &nbsp;<br><br></div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
								<div id="mname"></div>
								</div>
							</div>
						</div>
					</div>
					 <div class="space-6"></div>
					 <div id="checkstate" class="text-center"></div>
					 <div class="space-6"></div>
				 </div>
				 <div class="col-xs-12 col-sm-2 " >&nbsp;</div>
			</div>
		</div>
	</div>
</div>
   <center>
<input type="checkbox" name="chkpayment" id="chkpayment" value="checkbox" onChange="if(this.checked == true){document.getElementById('button').disabled = false;document.getElementById('ok').disabled = true;}else{document.getElementById('button').disabled = true;document.getElementById('ok').disabled = true;}"  /> 
<a href="#"><?=$wording_lan["tab4"]["5_21"]?></a><br/><br/><br/>
<button class="btn btn-info" name='button'  id='button' type='button' disabled="disabled" onClick="ibillcheck()" >
	<i class="ace-icon fa-dot-circle-o bigger-110"></i>
	ตรวจสอบ
</button>

&nbsp; &nbsp; &nbsp;
<button class="btn btn-info" name="ok"  id="ok" disabled  type="submit">
	<i class="ace-icon fa fa-check bigger-110"></i>
	บันทึก
</button>
&nbsp; &nbsp; &nbsp;
<button class="btn" type="reset">
	<i class="ace-icon fa fa-undo bigger-110"></i>
	ยกเลิก
</button>
</center>
</form>
<div style="clear:both"></div>
