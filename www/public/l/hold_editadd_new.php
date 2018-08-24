<?
$_SESSION["holdoperate"] = '1';
?><script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">
<?
session_start();

	if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
		if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
		else $_SESSION["lan"] = $_GET["lan"];
	}else{
		if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
	}
	include_once("wording".$_SESSION["lan"].".php");
	mysql_query( "SET NAMES UTF8" );
	
	?>
function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
}
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest(); } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported")
   return null
}
function chknum(key){
	//alert(key);
	if(key>=48&&key<=57)
		return true;
	else
		return false;
} function checkForm(frm)
  {
    //
    // check form input values
    //

    frm.ok.disabled = true;
    frm.ok.value = "Please wait...";
    return true;
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
	//value = str_pad(value,7,0,false);
	value = value.toUpperCase();
	//alert(test);
     req.open('GET', 'search_member_h.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(data);
					if(data == 1234){
					document.getElementById('mcode').value="";
					document.getElementById("mname").innerHTML="<?=$wording_lan['tab4']['1_27']?>";
					//chkStatusHold();
					}else{
					document.getElementById('mcode').value=value;
                    document.getElementById("mname").innerHTML=data; //แสดงผล
					//chkStatusHold();
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
var xmlHttp;
function ibillcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sadate').value;
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "วันที่";
	
	val = val + ","+document.getElementById('mcode').value;
	field = field +",mcode";
	flag = flag+",1-9-0-0-0";
	errDesc = errDesc + ",<?=$wording_lan["tab2_1_5"]?>";

	val = val + ","+document.getElementById('satype').value;
	field = field +",satype";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รูปแบบการซื้อ";

	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"asaleh","checkstate");
}
function calfinal(){
		tag = window.parent.document.frm.getElementsByTagName('input');
		//alert(tag.length);
		var sumtotal=0;
		var sumpv=0;
		var skip = 12;
		var bgskip = 8;
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
			sumtotal = sumtotal + (price*num);
			sumpv = sumpv + (pv*num);

		}
		document.getElementById('sumtotal').value=sumtotal;
		document.getElementById('sumpv').value=sumpv;
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
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
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
		var skip = 12;
		var bgskip = 8;
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
 
</script> 
</head>

<body>
<?
$sql = "SELECT hpv FROM ".$dbprefix."asaleh WHERE id='".$_GET['bid']."' LIMIT 1";
$rs = mysql_query($sql);
if(mysql_num_rows($rs)> 0){
	 $hpv = mysql_result($rs,0,'hpv');
}else $hpv = 0;

?>
<!--
<div class="row">
	<div class="col-xs-3">
	</div>
	<div class="col-xs-6 alert alert-danger">
	<center>ระบบมีการ Update Version 2.0 </center>
	</div>

<center><img src="./images/logo.png" width=50%></center>

	<div class="col-xs-3">
	</div>
	<div class="col-xs-6 alert alert-danger">
	<center>ระบบมีการ Update Version 2.0 </center>
	</div>
</div>
-->
<? //exit;?>
<form method="post" action="holdoperate.php?state=0" id="frm" name="frm"  onsubmit="return checkForm(this)" onKeyDown="document.getElementById('ok').disabled=true;" >
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
							<div class="profile-info-value"><?=$wording_lan["Data transfer / voting members"]?></div>
							<div class="profile-info-value"></div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab4"]["1_3"]?> </div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="text" id="sadate" name="sadate" value="<?=$sadate==""?$_SESSION["datetimezone"]:$sadate?>" readonly="" class="form-control">
								</div>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab4"]["1_1"]?>	 </div>
							<div class="profile-info-value">
								<div class="controls">
									<select name="satype" id="satype" onChange="document.getElementById('ok').disabled=true;">
									<?
										if($_SESSION["mtype1"] == '0')$chktype = $arr_satypeh2;
										else $chktype = $arr_satypeh1;
										foreach($chktype as $key => $value):			
										echo '<option value="'.$key.'"';
											if($satype==$key)echo "selected";
										echo'>'.$value.'</option>'; 
										endforeach;
									?>
								  </select>
								</div>
							</div>
						</div>
						

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["productshow"]["4"]?> </div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="number" min=0 id="sumpv" name="sumpv" onkeypress="return chknum(window.event.keyCode)"  class="form-control" value=0>
								</div>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab5"]['1_4']?> </div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="text" id="mcode" name="mcode"  class="form-control" maxlength="9">
									<span class="input-group-btn">
									<button class="btn btn-sm btn-default" type="button" onClick="sendget_sponsor(document.getElementById('mcode').value)" >
										<i class="ace-icon fa fa-search bigger-110"></i>
										Search
									</button>
									</span>
								</div>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name">							
							</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
								<div id="mname"><br><br><br></div>
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
<!--<input type="checkbox" name="chkpayment" id="chkpayment" value="checkbox" onChange="if(this.checked == true){document.getElementById('button').disabled = false;document.getElementById('ok').disabled = true;}else{document.getElementById('button').disabled = true;document.getElementById('ok').disabled = true;}"  /> 
		  <a href="#">ยืนยันการโอน Ecom เข้า Ewallet</a><br/><br/>--><br/>
		  
											   
<button class="btn btn-info" name='button'  id='button' type='button' onClick="ibillcheck()" >
	<i class="ace-icon fa-dot-circle-o bigger-110"></i>
	<?=$wording_lan["tab1_mem_85"]?>
</button>

&nbsp; &nbsp; &nbsp;
<button class="btn btn-info" name="ok"  id="ok" disabled  type="submit">
	<i class="ace-icon fa fa-check bigger-110"></i>
	<?=$wording_lan["tab4"]["5_18"]?>
</button>
&nbsp; &nbsp; &nbsp;
<button class="btn" type="reset">
	<i class="ace-icon fa fa-undo bigger-110"></i>
	<?=$wording_lan["tab4"]["5_19"]?>
</button>
</center>
</form>
<div style="clear:both"></div>

