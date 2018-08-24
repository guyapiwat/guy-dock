<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">
var xmlHttp;
function ibillcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sadate').value;
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "วันที่";
	
	val = val + ","+document.getElementById('mcode').value;
	field = field +",mcode";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสสมาชิก";
/*	
	val = val + ","+document.getElementById('inv_code').value;
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสสาขา";
*/		
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
	var errDesc = "วันที่";
	
	val = val + ","+document.getElementById('mcode').value;
	skipval = skipval+",";
	field = field +",mcode";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสสมาชิก";
/*	
	val = val + ","+document.getElementById('inv_code').value;
	skipval = skipval+",";
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสสาขา";
*/
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
		
			price = parseInt(tag[step+2].value);
			pv = parseInt(tag[step+3].value);
			num = parseInt(tag[step+4].value);
			if(num>parseInt(tag[step+5].value)){
				num = parseInt(tag[step+5].value);
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
	function saledel(pcode,pdesc,price,pv){
		var place;
		var step;
		var sumpv = 0;
		var sumtotal = 0;
		var out = true;
		var qp=0;
		var num;
		var skip = 12;
		var bgskip = 8;
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
		place += "<td style='"+style_l+style_t+style_b+"'>ลำดับ</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รหัส</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รายละเอียด</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>ราคา</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>PV</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>จำนวน</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รวมราคา</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รวมPV</td>";
		place += "</tr>";
		for(i=0;i<(tag.length-skip)/9;i++,l++){
			step = i*9+bgskip;
			//step++;
			if(pcode == tag[i*9 +bgskip].value){
				l--;
				continue;
			}
			
			place += "<tr>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ลบ' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (l+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly style='"+hidden+ "text-align:center;' type='text' name='pcode[]' value='" + tag[step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly style='"+hidden+ "' type='text' name='pdesc[]' value='" + tag[++step].value + "'></td>";
			price = parseInt(tag[++step].value);
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='price[]' value='" + price + "'></td>";
			pv = parseInt(tag[++step].value);
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='pv[]' value='" + pv + "'></td>";
			num = parseInt(tag[++step]. value);
			//alert(num);
			place += "<td style='"+style_l+style_bd+"' align='right'><input style='text-align:right;' name='qty[]'  onkeyup='cal()' type='text' size='5' value='" + num + "'>";
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
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='7'>รวม</td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumpv' value='" + sumpv + "'></td>";
		place += "</tr>";
		//place += "<tr><td colspan='9' align='right'><input type='submit' value='บันทึก'></td></tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='ตรวจสอบ' />&nbsp;<input type='submit' value='บันทึก' name='ok'  disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=6'\" value='ยกเลิก' /></td></tr>";
		place += "</table>";
		//alert(place);
		window.parent.document.getElementById('sale').innerHTML = place;
		tag = window.parent.document.frm.getElementsByTagName('input');
		if(tag.length-skip<9){
			window.parent.document.getElementById('sale').innerHTML = "<table width='500' bgcolor='#009900'><tr><td align='center'><font color='#FFFFFF'>เลือกข้อมูลสอนค้าจากตารางขวามือ แล้วแก้ไขจำนวนตามต้องการ</font></td></tr></table>";
		}
	}
</script> 
</head>

<body>
<?
if(isset($_GET['sano'])){
		$sql = "SELECT * FROM ".$dbprefix."billhd WHERE sano='".$_GET['sano']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
			$redirect = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">ไปหน้าสมาชิก</a>]";
			dialogbox("50%","#990000","ไม่พบข้อมูลตามเงื่อนไข",$redirect);
			exit;
		}else{
			$sadate = mysql_result($rs,0,'sadate');
			//$inv_code = mysql_result($rs,0,'inv_code');
			$satype = mysql_result($rs,0,'sa_type');
			$mcode = mysql_result($rs,0,'mcode');
			//$inv_desc = mysql_result($rs,0,'inv_desc');
			//$mname = mysql_result($rs,0,'name_t');
			mysql_free_result($rs);
		}
}
?>
<form method="post" action="ewa_holdoperate.php?state=<?=$_GET['id']==""?0:1?>" name="frm">
  <table border="0">
  <tr valign="top">
    <td>
    <table width="500" border="0">
      <tr valign="top">
        <td>
            <table border="1" width="100%" align="center">
            <tr>
              <td width="16%" align="right">เลขบิล</td>
            <td width="16%">
			<? 
				$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."holdhead ";
				$rs = mysql_query($sql);
				echo ($_GET['id']==""?mysql_result($rs,0,'id')+1:$_GET['id']);
				mysql_free_result($rs);
			?> <input type="hidden" value="<?=$_GET['id']?>" name="id"/></td>
            <td width="22%">จากบิล 
              <input readonly style="border:none;" size="5" type="text" value="<?=$_GET['sano']?>" name="hid"/></td>
            <td width="6%" align="right">วันที่</td>
            <td width="40%"><input type="text" id="sadate" name="sadate" readonly value="<?=$sadate==""?date("Y-m-d"):$sadate?>">
              <a href="javascript:NewCal('sadate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a>            </td>
            </tr>
            <tr valign="top">
              <td width="16%" align="right">รหัสสมาชิก</td>
              <td colspan="2"><input style="background-color:#FFFF99" readonly size="15" type="text" id="mcode" name="mcode" value="<?=$mcode?>">
                <input type="button" onClick="get_mem_listpicker_mcode()" disabled='disabled'  value="เลือก"><div id="mname"></div> </td>
              <td align="right">สาขา</td>
              <td><input style="background-color:#FFFF99" readonly size="15" type="text" id="inv_code" name="inv_code" value="<?=$inv_code?>">
                <input type="button" onClick="get_mem_listpicker_invcode()"disabled='disabled' value="เลือก"><div id="inv_desc"></div></td>
            </tr>            
            <tr valign="top">
              <td align="right">แผน&nbsp;</td>
              <td colspan="2"><select name="satype" >
                <option  value="A" <?=($satype=="A"?"selected":"")?>><?=$wording_lan["word"]["sale_editadd"]["typea"]?></option>
                <!--option value="H" <?=($satype=="H"?"selected":"")?>>Hold ยอด</option-->
              </select></td>
              <td colspan="2">&nbsp;</td>
              </tr>
            <!--tr>
              <td colspan="4" align="right">&nbsp;</td>
              </tr-->
            </table>
    	</td>
      </tr>
      <tr>
        <td id="sale" align="center">
        <?
		if(isset($_GET['sano'])){
			$sql = "SELECT * FROM ".$dbprefix."billdt WHERE sano='".$_GET['sano']."' ";
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
                        <td style="<?=$style_l.$style_t.$style_b?>">ลำดับ</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">รหัส</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">รายละเอียด</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">ราคา</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">PV</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">จำนวน</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">รวมราคา</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">รามPV</td>
                    </tr>
  				<?
				$sumtotal = 0;
				$sumpv = 0;
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$proobj = mysql_fetch_object($rs);
					?>
					<tr>
                        <td style="<?=$style_l.$style_bd?>"><input type="button" value="ลบ" onClick="saledel('<?=$proobj->pcode?>','<?=$proobj->pdesc ?>','<?=$proobj->price?>','<?=$proobj->pv?>')"></td>
                    	<td style="<?=$style_l.$style_bd?>"><?=($i+1)?></td>
                        <td style="<?=$style_l.$style_bd?>" align="center"><input readonly style="text-align:center;<?=$hidden?>" size="7" type="text" name="pcode[]" value="<?=$proobj->pcode?>"></td>
                        <td style="<?=$style_l.$style_bd?>"><input size="13" readonly style="<?=$hidden?>" type="text" name="pdesc[]" value="<?=$proobj->pdesc?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="price[]" value="<?=$proobj->price?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="pv[]" value="<?=$proobj->pv?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input size="5" onkeyup='cal()' style='text-align:right;' type="text" name="qty[]" value="<?=$proobj->qty?>"><input type="hidden" name="lmqty[]" value="<?=$proobj->qty?>"></td>
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
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumtotal' value="<?=$sumtotal?>"></td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumpv' value="<?=$sumpv?>"></td>
					</tr>
					<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='ตรวจสอบ' />&nbsp;<input type='submit' value='บันทึก' name='ok'  disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick="window.location='index.php?sessiontab=3&sub=6'" value='ยกเลิก' /></td></tr>
                </table>
				<?
			}else
				dialogbox("100%","#990000","ไม่พบรายการสินค้าของบิลเลขที่ ".$_GET['id'],"");
        }else{
			dialogbox("100%","#009900","เลือกข้อมูลจากรายการสินค้า และแก้ไขจำนวนตามต้องการ","");
		}
		?>
    	</td>
      </tr>
	  <tr><td><div id="checkstate" align="center"></div>  </td></tr>
    </table>
    </td>
    <!--td><iframe width="400" height="340" frameborder="0" src="./hold_product_show.php?bid=<?=$_GET['bid']?>" ></iframe></td-->
  </tr>
</table>
</form>

