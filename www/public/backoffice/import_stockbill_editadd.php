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
 </script>
<script language="javascript">
var xmlHttp;
function ibillcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sadate').value;
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "�ѹ���";
	
/*	val = val + ","+document.getElementById('mcode').value;
	field = field +",mcode";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",������Ҫԡ";
*/	
	if(parseFloat(document.getElementById('ewallet').value) < parseFloat(document.getElementById('sumtotal').value)){
	//	alert('Ewallet ��ҹ�����§��');
	//	exit;
	}
/*
	val = val + ","+document.getElementById('inv_code').value;
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�����Ң�";
*/

		
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"import_stock_h","checkstate");
}
function ebillcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sadate').value;
	var skipval = "";
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "�ѹ���";
/*	
	val = val + ","+document.getElementById('mcode').value;
	skipval = skipval+",";
	field = field +",mcode";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",������Ҫԡ";

	val = val + ","+document.getElementById('inv_code').value;
	skipval = skipval+",";
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�����Ң�";
*/	
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);
	startRQ(field,val,skipval,flag,errDesc,"import_stock_h","checkstate");
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
		wi=window.open("invent_listpicker_inv.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	}
	function cal(){
		tag = window.parent.document.frm.getElementsByTagName('input');
		//alert(tag.length);
		var sumtotal=0;
		var sumpv=0;
		var sumbv=0;
		var sumfv=0;
		var skip = 45;
		var bgskip = 9; //fix
		//alert(tag.length);
		for(i=0;i<(tag.length-skip)/8;i++){
			step = i*8+bgskip;
			//step++;
			
			//alert(parseFloat(tag[step+1].value));
			//alert(parseFloat(tag[step+2].value));
			//alert(parseFloat(tag[step+3].value));
			//alert(parseFloat(tag[step+4].value));
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
			
		}

		document.getElementById('sumtotal').value=sumtotal;
		document.getElementById('sumpv').value=sumpv;
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;��ԡ��Ǩ�ͺ���ͷӡ�õ�Ǩ�ͺ������&nbsp; </font>";
		//alert(window.parent.document.mainsale.getElementsByTagName('input').length);
		//alert(sumtotal);
	}
	function saledel(pcode,pdesc,price,pv,bv,fv){
		var place;
		var step;
		var sumpv = 0;
		var sumbv = 0;
		var sumfv = 0;
		var sumtotal = 0;
		var out = true;
		var qp=0;
		var num;
		var skip = 40;
		var bgskip = 9; //fix
		var l=0;

		//var fcus;
		var showprice = 0;
		var showpv = 0;
		var showbv = 0;
		var showfv = 0;
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
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ź' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";
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
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumpv' value='" + sumpv + "'></td>";
		place += "</tr>";
		//place += "<tr><td colspan='9' align='right'><input type='submit' value='�ѹ�֡'></td></tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='��Ǩ�ͺ' />&nbsp;<input type='submit' value='�ѹ�֡' name='ok' id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=28'\" value='¡��ԡ' /></td></tr>";
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
if(isset($_GET['id'])){
		$sql = "SELECT * FROM ".$dbprefix."import_stock_h WHERE id='".$_GET['id']."' LIMIT 1";
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
			//$inv_desc = mysql_result($rs,0,'inv_desc');
			//$mname = mysql_result($rs,0,'name_t');
			mysql_free_result($rs);
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
<form method="post" action="import_stockbill_operate.php?state=<?=$_GET['id']==""?0:1?>" name="frm" id="frm"  onsubmit="return checkForm(this)" >  
  <table border="0">
  <tr valign="top">
    <td>
    <table width="630" border="0">
      <tr valign="top">
        <td>
            <table border="1" width="100%" align="center">
            <tr>
              <td width="16%" align="right">�Ţ���</td>
            <td width="19%">
			<? 
				$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."import_stock_h ";
				$rs = mysql_query($sql);
				echo ($_GET['id']==""?mysql_result($rs,0,'id')+1:$_GET['id']);
				mysql_free_result($rs);
			?> <input type="hidden" value="<?=$_GET['id']?>" name="id"/></td>
            <td width="5%" align="right">�ѹ���</td>
            <td width="60%"><input type="text" id="sadate" name="sadate" value="<?=$sadate==""?date("Y-m-d"):$sadate?>">
              <a href="javascript:NewCal('sadate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ���"></a>            </td>
            </tr>
            <tr valign="top">
              <td width="16%" align="right">&nbsp;</td>
              <td><input style="background-color:#FFFF99;display:none" readonly size="15" type="text" id="mcode" name="mcode" value="<?=$mcode?>">
                <input type="button" style="display:none" onClick="get_mem_listpicker_mcode()" value="���͡"><div id="mname"></div> </td>
              <td style="display:none;" align="right" nowrap>�Ң�</td>
              <td style="display:none;"><input style="background-color:#FFFF99" readonly size="15" type="text" id="inv_code" name="inv_code" value="<?=$inv_code?>">
                <input type="button" onClick="get_mem_listpicker_invcode()" value="���͡">
                     
                <input type="text"  id="ewallet" name="ewallet" readonly style="display:none"  value="0">
                <div id="inv_desc"></div></td>
            </tr>            
            <tr valign="top">
              <td align="right">Ἱ&nbsp;</td>
              <td><select name="satype">
              <option value="IM" <?=($satype=="IM"?"selected":"")?>>���ٹ��</option>
              </select></td>
              <td colspan="2">
              <input type="radio" name="radsend" value="1" <?=($radsend=="1"?"checked":"")?> style="display:none">
             <!-- <input type="radio" name="radsend" value="2" <?=($radsend=="2"?"checked":"")?> >���Ѵ��-->
              </td>
              </tr>
            <tr>
              <td colspan="4" align="left">
          </td>
              </tr>
            </table>
    	</td>
      </tr>
      <tr>
        <td id="sale" align="center">
        <?
		if(isset($_GET['id'])){
			$sql = "SELECT * FROM ".$dbprefix."import_stock_d WHERE sano='".$_GET['id']."' ";
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
                        <td style="<?=$style_l.$style_t.$style_b?>">�ӴѺ</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">����</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">��������´</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">�Ҥ�</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">PV</td>
						 <td style="<?=$style_l.$style_t.$style_b?>">BV</td>
						  <td style="<?=$style_l.$style_t.$style_b?>">FV</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">�ӹǹ</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">����Ҥ�</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">���PV</td>
						 <td style="<?=$style_l.$style_t.$style_b?>">���BV</td>
						  <td style="<?=$style_l.$style_t.$style_b?>">���FV</td>
                    </tr>
  				<?
				$sumtotal = 0;
				$sumpv = 0;
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$proobj = mysql_fetch_object($rs);
					?>
					<tr>
                        <td  style="<?=$style_l.$style_bd?>"><!--<input type="button" value="ź" onClick="saledel('<?=$proobj->pcode?>','<?=$proobj->pdesc ?>','<?=$proobj->price?>','<?=$proobj->pv?>','<?=$proobj->bv?>','<?=$proobj->fv?>')">--></td>
                    	<td style="<?=$style_l.$style_bd?>"><?=($i+1)?></td>
                        <td style="<?=$style_l.$style_bd?>" align="center"><input readonly style="text-align:center;<?=$hidden?>" size="7" type="text" name="pcode[]" value="<?=$proobj->pcode?>"></td>
                        <td style="<?=$style_l.$style_bd?>"><input size="13" readonly style="<?=$hidden?>" type="text" name="pdesc[]" value="<?=$proobj->pdesc?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="price[]" value="<?=$proobj->price?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="pv[]" value="<?=$proobj->pv?>"></td>
						<td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="bv[]" value="<?=$proobj->bv?>"></td>
						<td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="fv[]" value="<?=$proobj->fv?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input size="5" onkeyup='cal()' style='text-align:right;' type="text" name="qty[]" value="<?=$proobj->qty?>" ></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalprice[]" value="<?=($proobj->qty*$proobj->price)?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalpv[]" value="<?=($proobj->qty*$proobj->pv)?>"></td>
						<td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalbv[]" value="<?=($proobj->qty*$proobj->bv)?>"></td>
						<td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalfv[]" value="<?=($proobj->qty*$proobj->fv)?>"></td>
                    </tr>
					<?
					$sumtotal += ($proobj->qty*$proobj->price);
					$sumpv += ($proobj->qty*$proobj->pv);
					$sumbv += ($proobj->qty*$proobj->bv);
					$sumfv += ($proobj->qty*$proobj->fv);
				}
				?>
					<tr bgcolor='#999999'>
					<td style="<?=style_l.style_t.style_b?>" align='right' colspan='9'>���</td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumtotal' value="<?=$sumtotal?>"></td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumpv' value="<?=$sumpv?>"></td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumbv' value="<?=$sumbv?>"></td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumfv' value="<?=$sumfv?>"></td>
					</tr>
					<tr style="display:none"><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='��Ǩ�ͺ' />&nbsp;<input type='submit' value='�ѹ�֡' name='ok'  id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick="window.location='index.php?sessiontab=3&sub=28'" value='¡��ԡ' /></td></tr>
                </table>
				<?
			}else
				dialogbox("100%","#990000","��辺��¡���Թ��Ңͧ����Ţ��� ".$_GET['id'],"");
        }else{
			dialogbox("100%","#009900","���͡�����Ũҡ��¡���Թ��� �����䢨ӹǹ�����ͧ���","");
		}
		?>
    	</td>
      </tr>
	  <tr><td><div id="checkstate" align="center"></div>  </td></tr>
    </table>    <table border="1" width="100%" style="display:none">
              
              <tr valign="top">
                <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>Ἱ A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>�ѡ���ʹ</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>���ٹ��</option>
              </select>--><input type="checkbox" name="chkCash" <?=($chkCash=="on"?"checked":"")?>>
                  �Թʴ                    </td>
                <td><input type="text" name="txtCash" size="10"  value="<?=$txtCash?>"></td>
                <td>��������´ </td>
                <td><input name="optionCash" type="text" value="<?=$optionCash?>" size="70"  >
                </td>
              </tr>
              <tr valign="top">
              <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>Ἱ A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>�ѡ���ʹ</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>���ٹ��</option>
              </select>-->
                <input type="checkbox" name="chkFuture" <?=($chkFuture=="on"?"checked":"")?>>
                �Թ�Ѻ��ǧ˹��</td>
              <td><input type="text" name="txtFuture" size="10"  value="<?=$txtFuture?>"></td>
              <td>��������´</td>
               <td><input name="optionFuture"   value="<?=$optionFuture?>" type="text" size="70" ></td>
              </tr>
               <tr valign="top">
              <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>Ἱ A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>�ѡ���ʹ</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>���ٹ��</option>
              </select>-->
                <input type="checkbox" name="chkTransfer" <?=($chkTransfer=="on"?"checked":"")?>>
                �Թ�͹</td>
              <td><input type="text" name="txtTransfer" size="10"  value="<?=$txtTransfer?>"></td>
              <td>��������´</td>
               <td><input name="optionTransfer"   value="<?=$optionTransfer?>" type="text" size="70" ></td>
              </tr>
               <tr valign="top">
              <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>Ἱ A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>�ѡ���ʹ</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>���ٹ��</option>
              </select>-->
                <input type="checkbox" name="chkCredit1" <?=($chkCredit1=="on"?"checked":"")?>>
                �Ѥ��ôԵ1</td>
              <td><input type="text" name="txtCredit1" size="10"  value="<?=$txtCredit1?>"></td>
              <td>��������´</td>
               <td><input name="optionCredit1"   value="<?=$optionCredit1?>" type="text" size="70" ></td>
              </tr>
               <tr valign="top">
              <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>Ἱ A</option>

                <option value="Q" <?=($satype=="Q"?"selected":"")?>>�ѡ���ʹ</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>���ٹ��</option>
              </select>-->
                <input type="checkbox" name="chkCredit2" <?=($chkCredit2=="on"?"checked":"")?>>
                �Ѥ��ôԵ2</td>
              <td><input type="text" name="txtCredit2" size="10"  value="<?=$txtCredit2?>"></td>
              <td>��������´</td>
               <td><input name="optionCredit2"   value="<?=$optionCredit2?>" type="text" size="70" ></td>
              </tr>
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkCredit3" <?=($chkCredit3=="on"?"checked":"")?>>
                �Ѥ��ôԵ3</td>
              <td><input type="text" name="txtCredit3" size="10"  value="<?=$txtCredit3?>"></td>
              <td>��������´</td>
               <td><input name="optionCredit3"   value="<?=$optionCredit3?>" type="text" size="70" ></td>
              </tr>
              <tr valign="top">
              <td>
                <input type="checkbox" name="chkCredit3" <?=($chkInternet=="on"?"checked":"")?>>
                Ewallet</td>
              <td><input type="text" name="txtInternet" size="10"  value="<?=$txtInternet?>"></td>
              <td>��������´</td>
               <td><input name="optionInternet"   value="<?=$optionInternet?>" type="text" size="70" ></td>
              </tr>
              <tr valign="top">
              <td>
                <input type="checkbox" name="chkDiscount" <?=($chkDiscount=="on"?"checked":"")?>>
                ��ǹŴ��Ţ��</td>
              <td><input type="text" name="txtDiscount" size="10"  value="<?=$txtDiscount?>"></td>
              <td>��������´</td>
               <td><input name="optionDiscount"   value="<?=$optionDiscount?>" type="text" size="70" ></td>
              </tr>
                <tr valign="top">
              <td>
                <input type="checkbox" name="chkOther" <?=($chkOther=="on"?"checked":"")?>>
                ����</td>
              <td><input type="text" name="txtOther" size="10"  value="<?=$txtOther?>"></td>
              <td>��������´</td>
               <td><input name="optionOther"   value="<?=$optionOther?>" type="text" size="70" ></td>
              </tr>
              </table><Br>
              �����˵� : <br>
                <textarea name="txtoption" cols="100" rows="5"><?=$txtoption?></textarea>
    </td>
    <td><iframe width="400" height="400" frameborder="0" src="./import_stockbill_product_show.php" ></iframe>
	<br><Br></td>
  </tr>
</table>
</form>

