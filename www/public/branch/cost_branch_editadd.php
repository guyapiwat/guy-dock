<?
$_SESSION["perbuy"] = 1;
?>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script type="text/javascript">
 function checkForm(frm)
  {
    //
    // check form input values
    //

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
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_ewallet.php?value='+encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('mcode').value="";
					document.getElementById("mname").innerHTML='<?=$wording_lan["ewallet_1"]?>';
					}else{
					document.getElementById('mcode').value=value;
                    document.getElementById("mname").innerHTML=data; //�ʴ���
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
};
  </script>
<script language="javascript">
var xmlHttp;
function ibillcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
/*	var val = document.getElementById('sadate').value;
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = '<?=$wording_lan["ewallet_5"]?>';
	
	//val = val + ","+document.getElementById('mcode').value;
	//field = field +",mcode";
	//flag = flag+",1-7-0-0-0";
	///errDesc = errDesc + ",<?=$wording_lan['ewallet_2']?>";
	var tott = 0;
	tott = parseFloat(document.getElementById('txtCash').value)+
			parseFloat(document.getElementById('txtFuture').value)+
			parseFloat(document.getElementById('txtTransfer').value)+
		parseFloat(document.getElementById('txtCredit1').value)+
		parseFloat(document.getElementById('txtCredit2').value)+
		parseFloat(document.getElementById('txtCredit3').value);
			
	//alert(tott);
	if(parseFloat(document.getElementById('txtMoney').value) != tott){
		alert('<?=$wording_lan["ewallet_3"]?> '+parseFloat(document.getElementById('txtMoney').value)+' <?=$wording_lan["ewallet_4"]?> ');
		exit;
	}/*
	val = val + ","+document.getElementById('inv_code').value;
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�����Ң�";
 
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"asaleh","checkstate");*/
}
/*
function showHideNum(boxName,divName) { 

if(boxName.checked == true) { 
	document.getElementById(divName).value=parseFloat(document.getElementById('txtMoney').value);
	} 
	else { 
	document.getElementById(divName).value="0"; 
	} 
} */

function showHideNum(boxName,divName,cstatus) { 
//alert(cstatus);
var extax = 1;
var showtotal1 = 0;
//alert(cstatus);
//alert(divName);
//alert(document.getElementById('sumpv').value);
//alert(extax);
//alert(document.getElementById('ajaxshipping').value);
showtotal1 = parseFloat(document.getElementById('txtMoney').value);
if(divName != 'txtCash')showtotal1 = showtotal1-parseFloat(document.getElementById('txtCash').value);
//if(divName != 'txtFuture')showtotal1 = showtotal1-parseFloat(document.getElementById('txtFuture').value);
if(divName != 'txtTransfer')showtotal1 = showtotal1-parseFloat(document.getElementById('txtTransfer').value);
if(divName != 'txtCredit1')showtotal1 = showtotal1-(parseFloat(document.getElementById('txtCredit1').value));
if(divName != 'txtCredit2')showtotal1 = showtotal1-(parseFloat(document.getElementById('txtCredit2').value));
if(divName != 'txtCredit3')showtotal1 = showtotal1-(parseFloat(document.getElementById('txtCredit3').value));
//if(divName != 'txtCredit4')showtotal1 = showtotal1-(parseFloat(document.getElementById('txtCredit4').value));
//if(divName != 'txtInternet')showtotal1 = showtotal1-parseFloat(document.getElementById('txtInternet').value);
//if(divName != 'txtDiscount')showtotal1 = showtotal1-parseFloat(document.getElementById('txtDiscount').value);
//if(divName != 'txt_pcoupon')showtotal1 = showtotal1-parseFloat(document.getElementById('txt_pcoupon').value);

	if(boxName.checked == true) { 
		if(showtotal1 < 0)showtotal1 = 0;
		document.getElementById(divName).value=Math.ceil(showtotal1*extax);
	}else { 
		document.getElementById(divName).value="0"; 
	} 
}

function ebillcheck(){
/*
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sadate').value;
	var skipval = "";
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = '<?=$wording_lan["ewallet_5"]?>';
	
 		val = val + ","+document.getElementById('mcode').value;
	skipval = skipval+",";
	field = field +",mcode";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",������Ҫԡ";
 
	val = val + ","+document.getElementById('inv_code').value;
	skipval = skipval+",";
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",<?=$wording_lan['ewallet_6']?>";

	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);*/
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
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
 
</head>

<body>
<?
if($_GET["cmc"])$mcode = $_GET["cmc"];
if(isset($_GET['id'])){
		$sql = "SELECT * FROM ".$dbprefix."cost_branch WHERE id='".$_GET['id']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
			$redirect = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">�˹����Ҫԡ</a>]";
			dialogbox("50%","#990000","��辺�����ŵ�����͹�",$redirect);
			exit;
		}else{
			$sadate = mysql_result($rs,0,'sadate');
			$inv_code = mysql_result($rs,0,'inv_code');
			$satype = mysql_result($rs,0,'sa_type');
			$mcode = mysql_result($rs,0,'mcode');
			$radsend = mysql_result($rs,0,'send');
			$txtoption = mysql_result($rs,0,'txtoption');
			//$inv_desc = mysql_result($rs,0,'inv_desc');
			//$mname = mysql_result($rs,0,'name_t');
			mysql_free_result($rs);
		}
}
			if(empty($txtCredit3))$txtCredit3 = 0;
			if(empty($txtCredit2))$txtCredit2 = 0;
			if(empty($txtCredit1))$txtCredit1 = 0;
			if(empty($txtTransfer))$txtTransfer = 0;
			if(empty($txtFuture))$txtFuture = 0;
			if(empty($txtCash))$txtCash = 0;
			if(empty($txtDiscount))$txtDiscount = 0;
			if(empty($txtOther))$txtOther = 0;
			if(empty($txtMoney))$txtMoney = 0;
?>
<form method="post" action="cost_branch_operate.php?state=<?=$_GET['id']==""?0:1?>" name="frm" id="frm" onsubmit="return checkForm(this)">
  <table border="0" width="100%">
  <tr valign="top">
    <td>
    <table border="0" width="100%">
      <tr valign="top">
        <td><table border="0" width="100%">
                <tr valign="top">
                  <td align="right">�����Ң�</td>
                  <td><input name="inv_code" id="inv_code" type="text" value="<?=$_SESSION["admininvent"]?>"   readonly style="background-color: #F6FFB8;padding: 2px 3px;border: 1px solid #B8B8B8;"></td>
                </tr>
				<tr valign="top">
                  <td align="right">�ѹ������¡��</td>
                  <td><input type="text" id="date" name="date" value="<? echo date("Y-m-d");?>" readonly style="background-color: #F6FFB8;padding: 2px 3px;border: 1px solid #B8B8B8;"></td>
                </tr>
                <tr valign="top">
                  <td align="right">������¡��</td>
                  <td>
                    <input name="title" type="text" id="title" value="" size="100" maxlength="255" placeholder="�ѹ�ա��¡�ä������»�Ш���͹ �Զع�¹"></td>
                </tr>
                <tr valign="top">
                  <td align="right">������</td>
                  <td><input name="cost_1" type="text" value="" size="20" style="text-align: right;" placeholder="0.00">
                    �ҷ</td>
                </tr>
                <tr   valign="top">
                  <td align="right">��ҹ��</td>
                  <td><input name="cost_2" type="text" value="" size="20"  style="text-align: right;" placeholder="0.00">
�ҷ</td>
                </tr>
                <tr valign="top" >
                  <td align="right">����</td>
                  <td><input name="cost_3" type="text" value="" size="20"  style="text-align: right;" placeholder="0.00">
�ҷ</td>
                </tr>
                <tr valign="top">
                  <td align="right">����Թ��������</td>
                  <td><input name="cost_4" type="text" value="" size="20"  style="text-align: right;" placeholder="0.00">
�ҷ</td>
                </tr>
                <tr valign="top">
                  <td align="right">��������´�������</td>
                  <td><textarea name="remark" cols="100" rows="5"> 
                  </textarea></td>
                </tr>
            </table></td>
      </tr>
      <tr>
        <td id="sale" align="center">
        <?
		if(isset($_GET['id'])){
			$sql = "SELECT * FROM ".$dbprefix."asaled WHERE sano='".$_GET['id']."' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				$style_l = "border-left:1 solid #FFFFFF;";
				$style_t = "border-top:1 solid #000000;";
				$style_b = "border-bottom:1 solid #000000;";
				$style_bd = "border-bottom:1 dashed #000000;";
				$hidden = "border-left-width:0;border-right-width:0;border-top-width:0;border-bottom-width:0;";
				?>
        <?
			}else
				dialogbox("100%","#990000",$wording_lan['w19'].$_GET['id'],"");
        }else{
			//dialogbox("100%","#009900","���͡�����Ũҡ��¡���Թ��� �����䢨ӹǹ�����ͧ���","");
			?><input type='submit' value='<?=$wording_lan["insert"]?>' name='ok'  id='ok'  />&nbsp;<input name='reset' type='reset'  onclick="window.location='index.php?sessiontab=3&sub=6'" value='<?=$wording_lan["cancel"]?>' /><?
		}
		?>
    	</td>
      </tr>
	  <tr><td><div id="checkstate" align="center"></div>  </td></tr>
    </table>
    </td>
  </tr>
</table>
</form>


