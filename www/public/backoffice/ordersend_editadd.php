<br />
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">

function check(){
	var val = document.getElementById('sendby').value;
	//alert(val);
	var field = "sendby";
	var flag = "1-0-0-0-0";
	var errDesc = "���Թ�����";
	
	val = val + ","+document.getElementById('senddate').value;
	field = field +",senddate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�ѹ������Թ���";

	val = val + ","+document.getElementById('sendcode').value;
	field = field +",sendcode";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",���ʷ�����Թ���";

	val = val + ","+document.getElementById('sendname').value;
	field = field +",sendname";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",���ͼ�����Թ���";	
	//alert(val);
//loop check
	document.getElementById('errormsg').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"onlinepoint_h","errormsg","posfrm");
}

</script>
<?
if($_GET['id']){
	$sql = "SELECT * FROM ".$dbprefix."onlinepoint_h  ";
	$sql .= "WHERE id = '".$_GET['id']."' ";
	//echo $sql."<br />";
	$rs = mysql_query($sql);
	$row = mysql_num_rows($rs);
	if($row > 0){
		$info = mysql_fetch_object($rs);
		$sendby = $info->sendby;
		$senddate  = $info->senddate;
		$sendcode  = $info->sendcode;
		$sendname= $info->sendname;
	}
}
?>
<form method="post" name="posfrm" id="posfrm" action="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$_GET['sub']?>&state=3&operate=<?=$_GET['id']==""?0:1?>"><br />
<input type="hidden" name="refresh_handle" id="refresh_handle" value="<?=microtime()?>" />
<input type="hidden" name="oid" id="oid" value="<?=$_GET['id']?>" />
  <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
    <tr>
      <td align="center">
       <br />
         <table align="center" width="80%">
         <tr>
            <td bgcolor="#EDEDED" align="right" width="120">���Թ�����<font color="#ff0000">*</font></td>
            <td align="left">
            <select name="sendby" id="sendby">
            <option value="" <?=(($sendby=="")?"selected":"")?> >���Թ�����</option>
            <option value="����к�" <?=(($sendby=="����к�")?"selected":"")?> >����к�</option>
            <option value="SMS" <?=(($sendby=="SMS")?"selected":"")?> >SMS</option>
            <option value="ö�����" <?=(($sendby=="ö�����")?"selected":"")?> >ö�����</option>
             <option value="������䫵�" <?=(($sendby=="������䫵�")?"selected":"")?> >������䫵�</option>
            </select>
            </td>
          </tr>
         <tr>
            <td bgcolor="#EDEDED" align="right" >�ѹ������Թ���<font color="#ff0000">*</font></td>
            <td align="left"><input type="text" name="senddate" id="senddate" value="<?=$senddate?>" />&nbsp;<a href="javascript:NewCal('senddate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ���" /></a> <font color="#808080">(����-��-��)</font></td>
          </tr>
          <tr>
            <td bgcolor="#EDEDED" align="right">&nbsp;���ʷ�����Թ���<font color="#ff0000">*</font></td>
            <td align="left">
              <input type="text" name="sendcode" id="sendcode" value="<?=$sendcode?>" />
            </td>
          </tr>
          <tr>
            <td bgcolor="#EDEDED" align="right">���ͼ�����Թ���<font color="#ff0000">*</font></td>
            <td align="left"><input type="text" name="sendname" id="sendname" value="<?=$sendname?>" /></td>
          </tr>
        </table>
        <hr width="50%" />
        <font color="#808080"><u>�����˵�</u></font> <font color="#ff0000">*</font><font color="#808080">=���繵�ͧ��͡������</font>
        </td>
    </tr>
    <tr>
      <td align="center" ><br /><div id="errormsg"></div><br /></td>
    </tr>
    <tr>
      <td align="center">&nbsp;
        <input type="button" name="b1" id="b1" value="��Ǩ�ͺ" onclick="check()"  />
      	&nbsp;
         <input type="submit" name="ok" id="ok" value="�ѹ�֡" disabled="disabled" />
        &nbsp;
        <input name="reset" type="reset"  onclick="window.location='index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$_GET['sub']?>'" value="¡��ԡ" /></td>
    </tr>
  </table>
</form>
<br /><br />