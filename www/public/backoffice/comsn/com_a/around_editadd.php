<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">var xmlHttp;function iaroundcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('rcode').value;
	var field = "rcode";
	var flag = "1-0-0-1-0";
	var errDesc = "�����ͺ";
	
	val = val + ","+document.getElementById('dateInput1').value;
	field = field +",dateInput1";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�ѹ��������ͺ";
	
	val = val + ","+document.getElementById('dateInput2').value;
	field = field +",dateInput2";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�ѹ����������";
	
	val = val + ","+document.getElementById('dateInput3').value;
	field = field +",dateInput3";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�ѹ�������ش";

	val = val + ","+document.getElementById('dateInput4').value;
	field = field +",dateInput4";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�ѹ������";
	
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"around","checkstate");
}
function earoundcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('rcode').value;
	var skipval = document.getElementById('orcode').value;
	var field = "rcode";
	var flag = "1-0-0-1-0";
	var errDesc = "�����ͺ";
	
	val = val + ","+document.getElementById('dateInput1').value;
	skipval = skipval+",";
	field = field +",dateInput1";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�ѹ��������ͺ";
	
	val = val + ","+document.getElementById('dateInput2').value;
	skipval = skipval+",";
	field = field +",dateInput2";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�ѹ����������";
	
	val = val + ","+document.getElementById('dateInput3').value;
	skipval = skipval+",";
	field = field +",dateInput3";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�ѹ�������ش";

	val = val + ","+document.getElementById('dateInput4').value;
	skipval = skipval+",";
	field = field +",dateInput4";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�ѹ������";

	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);
	startRQ(field,val,skipval,flag,errDesc,"around","checkstate");
}
</script>
<?
if($_GET['rid']){
		$sql = "SELECT * FROM ".$dbprefix."around WHERE rid='".$_GET['rid']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">��辺�����ŵ�����͹�</font></td></tr><tr>
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=3';">�˹���Թ���</a>]</td></tr></table><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$rcode = $row->rcode;
			$oid = $row->rid;
			$rdate = $row->rdate;
			$fdate = $row->fdate;
			$tdate = $row->tdate;
			$fpdate = $row->fpdate;
			$tpdate = $row->tpdate;
			$paydate = $row->paydate;
			$calc = $row->calc;
			$remark = $row->remark;
		}
}else{
		$sql = "SELECT MAX(rcode) AS maxs FROM ".$dbprefix."around ";
		$rs = mysql_query($sql);
		$rcode = mysql_result($rs,0,'maxs')+1;
		mysql_free_result($rs);
}

?>
<table width="95%" border="0">
   <tr>
     <td width="63%">
<form name="form1" method="post" action="./comsn/com_a/aroundoperate.php?state=<?=$_GET['rid']==""?0:1?>">
<table width="98%" border="0">
  
  <tr>
    <td width="34%" align="right">�ͺ���&nbsp;</td>
    <td width="66%">
      <input type="text" name="rcode" id="rcode" size="10" value="<?=$rcode?>"> <input type="hidden" name="orcode"  id="orcode" size="10"  value="<?=$rcode?>"><input type="hidden" name="oid" id="oid" value="<?=$oid?>" ></td>
  </tr>
  <tr>
    <td align="right">�ѹ���&nbsp;</td>
    <td><input type="text" id="dateInput1" name="rdate"  value="<?=$rdate==""?date("Y-m-d"):$rdate?>">
	<input type="hidden" id="ordate" name="ordate" value="<?=$rdate==""?date("Y-m-d"):$rdate?>">
     </td>
  </tr>
  <tr>
    <td align="right">�ѹ����������&nbsp;</td>
    <td><input type="text" id="dateInput2" name="fdate" value="<?=$fdate==""?date("Y-m-d"):$fdate?>"> </td>
  </tr>
  <tr>
    <td align="right">�ѹ�������ش&nbsp;</td>
    <td><input type="text" id="dateInput3" name="tdate" value="<?=$tdate==""?date("Y-m-d"):$tdate?>">
	</td>
  </tr>
  <tr style="display:none">
    <td align="right">�ѹ������������ѡ���ʹ&nbsp;</td>
    <td><input type="text" id="dateInput4" name="fpdate" value="<?=$fpdate==""?date("Y-m-d"):$fpdate?>">	</td>
  </tr>
  <tr style="display:none">
    <td align="right">�ѹ�������ش����ѡ���ʹ&nbsp;</td>
    <td><input type="text" id="tpdate" name="tpdate" value="<?=$tpdate==""?date("Y-m-d"):$tpdate?>">
	<a href="javascript:NewCal('tpdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ���"></a>	</td>
  </tr>
  <tr>
    <td align="right">�ѹ������&nbsp;</td>
    <td><input type="text" id="dateInput5" name="paydate" value="<?=$paydate==""?date("Y-m-d"):$paydate?>"></td>
  </tr>
  <tr>
    <td align="right">�ӹǹ����&nbsp;</td>
    <td><input type="checkbox" name="calc" id="calc" value="1"  <?=($calc==1?"checked=\"checked\"":"")?>></td>
  </tr>
  <tr>
    <td align="right">�����˵�&nbsp;</td>
    <td><input type="text" id="remark" name="remark" value="<?=$remark?>" size="60"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="button" id="button" type="button" onclick="<?=(isset($_GET['rid'])?"earoundcheck()":"iaroundcheck()")?>" value="��Ǩ�ͺ" />
             &nbsp;
             <input type="submit" value="�ѹ�֡" name="ok" id="ok"  disabled="disabled" />
             &nbsp;
            <input name="reset" type="reset"  onclick="window.location='index.php?sessiontab=4&sub=1'" value="¡��ԡ" /></td>
  </tr>
</table>
</form><td width="37%">
      <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;��ԡ��Ǩ�ͺ���ͷӡ�õ�Ǩ�ͺ������&nbsp; </font></div></td>
   </tr>
 </table>
