<?
$_SESSION["perbuy"] = 1;
//var_dump($totalextend);
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
    //
    // check form input values
    //

    frm.ok.disabled = true;
    frm.ok.value = "Please wait...";
    return true;
  }
function showHideNum(boxName,divName) { 

if(boxName.checked == true) { 
	document.getElementById(divName).value=parseFloat(document.getElementById('sumtotal').value);
	} 
	else { 
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

function checkaddress(value) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(value);
     req.open('GET', 'search_address.php?value='+encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					//alert(req.responseText);
					if(data == 1234){
					//document.getElementById("mname").innerHTML="������������§ҹ ���� <br>�������ö��觫��͢��������";
					}else{
					//	alert(data);
                    document.getElementById("idchksaddress").innerHTML=data; //�ʴ���
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
}
function sendget_sponsor(value,cdate) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
//	alert(cdate);
	value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_member_extend.php?value='+encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					//alert(req.responseText);
					if(data == 1234){
						document.getElementById('mcode').value="";
						document.getElementById("mname").innerHTML="������������§ҹ ���� <br>�������ö��觫��͢��������";
						document.getElementById('checkexpdate').value='';
					}else{
					var myArray = data.split(':');
					//var dt = new Date('13 June 2013');
					
					//alert(myArray[1].trim());
					var dt = new Date(myArray[1].trim());

					//now.setDate(now.getDate()-90); or  now.subtract( "months", 3 );
					var datedate = dt.setDate(dt.getDate()+90);//or  dt.subtract( "months", 3 );
				   var yyyy = dt.getFullYear().toString();
				   var mm = (dt.getMonth()+1).toString(); // getMonth() is zero-based
				   var dd  = dt.getDate().toString();
				   var datedate = yyyy +'-'+ (mm[1]?mm:"0"+mm[0])+'-' + (dd[1]?dd:"0"+dd[0]); // padding
					//alert(datedate);

					//d = new Date();
					//d.yyyymmdd();
				//	alert(cdate);
					//alert(<?=$_SESSION["datetimezone"]?>);

					if(datedate <= cdate){
						document.getElementById('mcode').value="";
						
						document.getElementById("mname").innerHTML="Cannot Extend Member";
						
						document.getElementById('checkexpdate').value='';
						exit;
					}else
						//alert('s');

						document.getElementById('mcode').value=value;
						document.getElementById('checkexpdate').value=datedate;
						//alert();
					    //document.getElementById('expiredate').value=myArray[1].trim();
					    document.getElementById('expiredate').value=myArray[1].trim();
						document.getElementById("mname").innerHTML=data; //�ʴ���
					}

			     }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
};
function checkStatus(value,strUser,total) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_status.php?value='+encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					//alert(req.responseText);
					if(data == 1){
						if(strUser == 'C'){
							alert("�س���ѡ���ʹ�ú�س���ѵ������");
							document.getElementById('ok').disabled = true;
							exit;
						};
					}else{
						if(strUser == 'C'){
							//alert(total);alert(data);
							if(total <  parseFloat(data) || total >  parseFloat(data)+500 ){
								alert("�س��ͧ�ѡ���ʹ�ѹ����繨ӹǹ "+data+"PV ��� �ѡ���ʹ�ѹ��������Թ "+(parseFloat(data)+500)+" PV");
								document.getElementById('ok').disabled = true;
								exit;
							}
						};
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
};
function checkStatusNew(value,strUser,total) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_status_new.php?value='+encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					if(data == 1){
						if(strUser == 'Q'){
							alert("�س���ѡ���ʹ�ú�س���ѵ���ǧ˹�������");
							document.getElementById('ok').disabled = true;
							exit;
						};
					}else{
						if(strUser == 'Q'){
							//alert(total);alert(data);
							if(total >  parseFloat(data)+100 ){
							//if(total <  parseFloat(data) || total >  parseFloat(data)+100 ){
								alert(" �ѡ���ʹ������Թ "+(parseFloat(data)+500)+" PV");
								//alert("�س��ͧ�ѡ���ʹ�繨ӹǹ "+data+"PV ��� �ѡ���ʹ������Թ "+(parseFloat(data)+100)+" PV");
								document.getElementById('ok').disabled = true;
								exit;
							}
						};
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
};
function sendget_invent(value) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	//value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_invent.php?value='+encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('inv_code').value="";
					document.getElementById("inv_desc").innerHTML="�����������к�";
					}else{
					document.getElementById('inv_code').value=value;
                    document.getElementById("inv_desc").innerHTML=data; //�ʴ���
					}
					//alert(data);
					//if(data == "No Data"){
					//	alert('a');
					//	document.getElementById("mcode").innerHTML="";}
					
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
};
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript">
        function checkUserName(){
                var u = document.getElementById('mcode').value;

                $.post("c.php", { userName: u}, checkUserNameCompleted);
        }

        function checkUserNameCompleted(data){
			//alert(data);
			
			if(data != 1){
				//alert(data);
				document.getElementById('showsend1').innerHTML = data;
				//clicktab(3);
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
				//alert(<?=$_SESSION["ewallet"]?>);
				//alert(data);
				document.getElementById('ajaxshipping').value = data;
					if(<?=$_SESSION["ewallet"]?> < data){
						//	alert('Ewallet �ͧ��ҹ�����§��');
						//	document.getElementById('ok').disabled=true;
						//	document.getElementById('checkstate').innerHTML= '';
							
						//	exit;
					}
			//alert(tott);
		//	if(parseFloat(document.getElementById('sumtotal').value)+parseFloat(document.getElementById('ajaxshipping').value)+parseFloat(document.getElementById('ajaxshipping').value) != tott){
			//	alert('�ʹ�Թ '+tott+' �ҷ ��س����͡�Ըժ����Թ���ú����ӹǹ');
			//	document.getElementById('ok').disabled=true;
			//	exit;
			//}
				//clicktab(3);
			//}
              //  alert("Server return: " + data);
        }
	function abc(){
		//alert(<?=$_SESSION["chkfree"]?>);
		//		var chkfree = '<?=$_SESSION["chkfree"]?>';
		//	if( chkfree != '1'){
				//alert('��س����͡�Թ��ҿ��');
			//	document.getElementById("ok").disabled = true;
			//	clicktab(3);
		//	}
              //  alert("Server return: " + data);
        }
</script>
<script language="javascript">
var xmlHttp;
function ibillcheck(){
	var val = document.getElementById('sadate').value;
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "�ѹ���";
	
	val = val + ","+document.getElementById('mcode').value;
	field = field +",mcode";
	flag = flag+",1-7-0-0-0";
	errDesc = errDesc + ",������Ҫԡ";

if(document.getElementById('spayment').value == '3'){
	if(<?=$_SESSION["ewallet"]?> < document.getElementById('totalextend').value){
			alert("<?=$wording_lan['tab4']['1_48']?>");
			document.getElementById('ok').disabled=true;
			document.getElementById('showsend1').innerHTML='';
			exit;
		}
}
//alert(document.getElementById('txtMoney').value);
/*if(document.getElementById('txtMoney').value == ""){
document.getElementById('txtMoney').value = 0;

}

if(document.getElementById('txtMoney').value < 300){
	alert("��鹵�� 300 �ҷ");
document.getElementById('txtMoney').focus();
exit;
}*/
	/*
	val = val + ","+document.getElementById('inv_code').value;
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�����Ң�";*/	
		
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"asaleh","checkstate");
}
function ebillcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sadate').value;
	var skipval = "";
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "�ѹ���";
	
	val = val + ","+document.getElementById('mcode').value;
	skipval = skipval+",";
	field = field +",mcode";
	flag = flag+",1-7-0-0-0";
	errDesc = errDesc + ",������Ҫԡ";

	if(document.getElementById('inv_code').value != ''){
		if(document.getElementById("inv_desc").innerHTML == ''){
			alert('��سҡ����Ң�');
			 frm.ok.disabled = true;
			exit;
		}
	}
/*	
	val = val + ","+document.getElementById('inv_code').value;
	skipval = skipval+",";
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�����Ң�";
*/
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);
	startRQ(field,val,skipval,flag,errDesc,"transferewallet_h","checkstate");
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
		var skip = 45;
		var bgskip = 9;
		for(i=0;i<(tag.length-skip)/8;i++){
			step = i*8+bgskip;
			//step++;
		
			price = parseFloat(tag[step+2].value);
			pv = parseFloat(tag[step+3].value);
			num = parseFloat(tag[step+4].value);
			if(<?=$_SESSION["ewallet"]?> < sumtotal){
				//alert("point �ͧ�س�����§��");
				//tag[step+4].value = 0;
				//sumtotal = sumtotal - (price*num);
				//num = 0;
				//sumtotal = 0;
				//return;
			}
			//sumtotal = sumtotal + (price*num);

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
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;��ԡ��Ǩ�ͺ���ͷӡ�õ�Ǩ�ͺ������&nbsp; </font>";
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
		var skip = 45;
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
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;��ԡ��Ǩ�ͺ���ͷӡ�õ�Ǩ�ͺ������&nbsp; </font>";
		//alert(tag.length);
		place = "<table border='0' width='500' cellpading='0' cellspacing='0'>";
		place += "<tr align='center' bgcolor='#999999'>";
		place += "<td bgcolor='#99CCCC' style='"+style_l+style_t+style_b+"'>&nbsp;</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>�ӴѺ</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>����</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>��������´</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>�Ҥ�</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>PV</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>�ӹǹ</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>����Ҥ�</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>���PV</td>";
		place += "</tr>";
		for(i=0;i<(tag.length-skip)/8;i++,l++){
			step = i*8+bgskip;
			//step++;
			if(pcode == tag[i*8 +bgskip].value){
				l--;
				continue;
			}
			
			place += "<tr>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ź' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (l+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly style='"+hidden+ "text-align:center;' type='text' name='pcode[]' value='" + tag[step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly style='"+hidden+ "' type='text' name='pdesc[]' value='" + tag[++step].value + "'></td>";






			price = parseFloat(tag[++step].value);
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='price[]' value='" + price + "'></td>";
			pv = parseFloat(tag[++step].value);
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='pv[]' value='" + pv + "'></td>";
			num = parseFloat(tag[++step]. value);
			//alert(num);
			place += "<td style='"+style_l+style_bd+"' align='right'><input style='text-align:right;' name='qty[]'  onkeyup='cal()' type='text' size='5' value='" + num + "'></td>";
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
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='7'>���</td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' id='sumtotal' name='sumtotal' id='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' id='sumpv' name='sumpv' id='sumpv' value='" + sumpv + "'></td>";
		place += "</tr>";
		//place += "<tr><td colspan='9' align='right'><input type='submit' value='�ѹ�֡'></td></tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='��Ǩ�ͺ' />&nbsp;<input type='submit' value='�ѹ�֡' name='ok' id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=6'\" value='¡��ԡ' /></td></tr>";
		place += "</table>";
		//alert(place);
		window.parent.document.getElementById('sale').innerHTML = place;
		tag = window.parent.document.frm.getElementsByTagName('input');
		if(tag.length-skip<8){
			window.parent.document.getElementById('sale').innerHTML = "<table width='500' bgcolor='#009900'><tr><td align='center'><font color='#FFFFFF'>���͡�������͹��Ҩҡ���ҧ������ ������䢨ӹǹ�����ͧ���</font></td></tr></table>";
		}
	}
</script> 
</head>

<body>
<?
if($_GET["cmc"])$mcode = $_GET["cmc"];
$_SESSION["chkewallet"] = 0;
if(isset($_GET['id'])){

		$sql = "SELECT * FROM ".$dbprefix."transferewallet_h WHERE id='".$_GET['id']."'  LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
			$redirect = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">�˹����Ҫԡ</a>]";
			dialogbox("50%","#990000","��辺�����ŵ�����͹�",$redirect);
			exit;
		}else{
			$sadate = mysql_result($rs,0,'sadate');
			$cancel = mysql_result($rs,0,'cancel');
			$sqlC = "select calc from ".$dbprefix."around where fdate >= '$sadate' and tdate <= '$sadate' and calc = 1";
			$sqlSC = mysql_query($sqlC);
			if(mysql_num_rows($sqlSC) > 0 or $cancel == '1'){
						echo "<script language='JavaScript'>alert('�������ö��䢺�Ź����');window.location='index.php?sessiontab=3&sub=6'</script>";	
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
<form method="post" action="extendoperate.php?state=<?=$_GET['id']==""?0:1?>" id="frm" name="frm"  onsubmit="return checkForm(this)" onKeyDown="document.getElementById('ok').disabled=true;" >
<table border="0" width="100%">
  <tr valign="top">
    <td><table border="0" width="100%">
      <tr valign="top">
        <td><table border="1" width="100%" align="center">
          <tr>
            <td width="16%" align="right">&nbsp;</td>
            <td width="38%"><? 
				$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."ewallet ";
				$rs = mysql_query($sql);
				//echo ($_GET['id']==""?mysql_result($rs,0,'id')+1:$_GET['id']);
				mysql_free_result($rs);
			?>
                    <input type="hidden" value="<?=$_GET['id']?>" name="id"/></td>
            <td width="6%" align="right"><?=$wording_lan["tab4"]["5_2"]?></td>
            <td width="40%"><input type="text" id="sadate" name="sadate"  readonly="" value="<?=$sadate==""?$_SESSION["datetimezone"]:$sadate?>">
                  <a href="javascript:NewCal('sadate','yyyymmdd',false,24)"><img style="display:none" src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="&#3648;&#3621;&#3639;&#3629;&#3585;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;"></a> </td>
          </tr>
          <tr valign="top">
            <td align="right"><?=$wording_lan["tab4"]["5_1"]?></td>
            <td nowrap="nowrap"><input style="background-color:#FFFF99"   size="15" type="text" id="mcode" name="mcode"  >
                <input name="button2"  type="button" onClick="sendget_sponsor(document.getElementById('mcode').value,'<?=$_SESSION["datetimezone"]?>')" value="&#3605;&#3585;&#3621;&#3591;" />
                <!--<input type="button" onClick="get_mem_listpicker_mcode()" value="&#3648;&#3621;&#3639;&#3629;&#3585;">-->
                <br>
                <div id="mname"></div></td>
            <td align="right" >&nbsp;</td>
            <td ><input style="background-color:#FFFF99;display:none" readonly size="15" type="text" id="inv_code" name="inv_code" value="<?=$inv_code?>">
                    <input name="button" type="button" style="display:none" onClick="get_mem_listpicker_invcode()" value="&#3648;&#3621;&#3639;&#3629;&#3585;">
              <div id="inv_desc"></div></td>
          </tr>
          <tr valign="top">
            <td align="right"><?=$wording_lan["extendyear"]?></td>
            <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>&#3649;&#3612;&#3609; A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>&#3626;&#3656;&#3591;&#3624;&#3641;&#3609;&#3618;&#3660;</option>
              </select>-->
                    <select size="1" name="yextend" id="yextend"  >
            
 			<option value="1"> 1 Year (<?=$totalextend?> <?=$GLOBALS["currcode"]?>)</option>
              </select></td>
            <td nowrap="nowrap"><?=$wording_lan["tab4"]["5_5"]?></td>
            <td><select size="1" name="spayment" id="spayment" onChange="if(this.value == '1'){document.getElementById('chkpayment').checked = false;document.getElementById('showpayment').style.visibility='visible';document.getElementById('ok').disabled = true;document.getElementById('button').disabled = false;}else {document.getElementById('chkpayment').checked = false;document.getElementById('showpayment').style.visibility='visible';document.getElementById('ok').disabled = true;document.getElementById('button').disabled = false;}" >
              <option value="3"><?=$wording_lan["tab4"]["1_11"]?></option> 
           <option value="2"><?=$wording_lan["tab4"]["5_16"]?></option>
 			<option value="1"><?=$wording_lan["tab4"]["5_15"]?></option>
              </select>
                <!--  <input style="display:none" name="button3" type="button"  onclick="sendget_invent(document.getElementById('inv_code').value)" value="&#3588;&#3657;&#3609;" />-->
                <input name="button3" type="button" style="display:none" onClick="get_mem_listpicker_invcode()" value="&#3648;&#3621;&#3639;&#3629;&#3585;"  ></td>
          </tr>
        </table>
            </td>
      </tr>
      <tr>
        <td id="sale" align="center">
		<table id="showpayment" style="display:none" ><tr><td>
<p align="left"><b><?=$wording_lan["tab4"]["5_6"]?> </b></p>
<ol>
  <li><?=$wording_lan["tab4"]["25_7"]?></li>
  <li><?=$wording_lan["tab4"]["25_8"]?></li>
  <li><?=$wording_lan["tab4"]["25_9"]?></li>
  <li><?=$wording_lan["tab4"]["25_10"]?></li>
</ol>
</td></tr>
		  <tr>
		    <td><p align="left"><b><?=$wording_lan["tab4"]["5_11"]?></b></p>
		      <ol>
                <li><?=$wording_lan["tab4"]["25_12"]?></li>
		        <li><?=$wording_lan["tab4"]["25_13"]?></li>
		        </ol></td>
		    </tr>
		  <tr>
		    <td><br>
		    <input type="checkbox" name="chkpayment" id="chkpayment" value="checkbox" onChange="if(this.checked == true){document.getElementById('button').disabled = false;document.getElementById('ok').disabled = true;}else{document.getElementById('button').disabled = true;document.getElementById('ok').disabled = true;}" /> <?=$wording_lan["tab4"]["5_14"]?></td></tr></table>
		<br>
		<input name='button'  id='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='<?=$wording_lan["tab4"]["5_17"]?>' />
          &nbsp;
          <input type='submit' value='<?=$wording_lan["tab4"]["5_18"]?>' name='ok'  id='ok' disabled='disabled' />
          &nbsp;
          <input name='reset' type='reset'  onclick="window.location='index.php?sessiontab=3&sub=6'" value='<?=$wording_lan["tab4"]["5_19"]?>' />
         
        </td>
      </tr>
      <tr>
        <td><div id="checkstate" align="center"></div></td>
      </tr>
    </table></td>
  </tr>
</table><font color="#FF0000">*<?=$wording_lan["system allow to renew member 90 days before expire"]?></font>
<br>
<input  type="hidden" id="checkexpdate" name="checkexpdate" value="">
  <input  type="hidden" id="expiredate" name="expiredate" value="">
</form>
  


  <input  type="hidden" id="ccaddress" name="ccaddress">
  <input  type="hidden" id="ccprovinceId" name="ccprovinceId">
  <input  type="hidden" id="ccdistrictId" name="ccdistrictId">
  <input  type="hidden" id="ccamphurId" name="ccamphurId">
  <input  type="hidden" id="cczip" name="cczip">
  <input  type="hidden" id="ccheckr" name="ccheckr" value="">
  <input  type="hidden" id="ajaxshipping" name="ajaxshipping" value="0">
  <input  type="hidden" id="totalextend" name="totalextend" value="<?=$totalextend?>">
