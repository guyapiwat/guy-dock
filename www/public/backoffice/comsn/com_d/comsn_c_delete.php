<script language="javascript">
function checkround(){
	if(document.getElementById("ftrcode").value==""){
		alert("��س�����ͺ��äӹǳ");
		document.getElementById("ftrcode").focus();
		return false;
	}
	document.rform.submit();
}
function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
}
</script>
<?
if(!isset($_POST["ftrcode"])){
	showdialog();
}else{ 
	$ro = $_POST["ftrcode"];
?><br />
<table width="95%" border="1" align="center">
  <tr>
    <td align="center"><br />
	<?
		$sql="select count(*) as cnt from ".$dbprefix."cround1 where rcode='$ro' ";

		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$cnt = mysql_result($rs,0,"cnt");
		}
		if($cnt<1){
			echo "<FONT COLOR=\"ff0000\">��辺 �ͺ $ro ����ͧ���ź ��س�����ͺ����ͧ���ź����</FONT><BR>";
			showdialog();
			exit;
		}
		

		//bmbonus
		//ź������� bmbonus ���������ͺ >=$ro
		$sql="delete from ".$dbprefix."cmbonus1 where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		//��Ѻ CALC ����� ''
		$sql="update ".$dbprefix."cround1 set calc='' where rcode>= '$ro'   ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		
		echo "ź��äӹǳ ������ͺ��� $ro ���º��������<BR><BR>";

	?>
	</td>
	</tr>
</table>
<br />
<?
}
function showdialog(){
?>
<table width="95%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=50">
<table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">��͡�ͺ��äӹǳ�����ҡ��â��¸�áԨ����ͧ���ź�� 1</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="40%" align="right">�ͺ&nbsp;&nbsp;</td>
    <td width="60%">
      <input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td colspan="2"><input type="button" name="Submit" value="ź��äӹǳ" onClick="checkround()"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</td></tr></table>
<?
}
?>