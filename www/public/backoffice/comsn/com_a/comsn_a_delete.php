<?
  if($acc->isAccess(4)){ 

	}else{
		echo "�������ö��ҹ ��";
		exit;
	}
?>
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
$debug = false;
if(!isset($_POST["ftrcode"])){
	showdialog();
}else{ 
	$ro = $_POST["ftrcode"];
?><br />
<table width="95%" border="1" align="center">
  <tr>
    <td align="center"><br />
	<?
		$sql="select count(*) as cnt from ".$dbprefix."around where rcode='$ro' ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$cnt = mysql_result($rs,0,"cnt");
		}
		if($cnt<1){
			echo "<FONT COLOR=\"ff0000\">��辺 �ͺ $ro ����ͧ���ź ��س�����ͺ����ͧ���ź����</FONT><BR>";
			showdialog();
			exit;
		}

		$sql="select count(*) as cnt from ".$dbprefix."around where rcode='$ro' and calc = 1 ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$cnt = mysql_result($rs,0,"cnt");
		}
		if($cnt<1){
			echo "<FONT COLOR=\"ff0000\">�ͺ $ro �ѧ�����ӹǳ</FONT><BR>";
			showdialog();
			exit;
		}

		$sql="select * from ".$dbprefix."around where  rcode='".$ro."'  ";
		$result=mysql_query($sql);
		if (mysql_num_rows($result)>'0') {
			$row= mysql_fetch_array($result, MYSQL_ASSOC);
			$fsano=$row["fsano"];
			$tsano=$row["tsano"];
			$tdate=$row["tdate"];
			$fdate=$row["fdate"];
			$rdate=$row["rdate"];
			$fpdate=$row["fpdate"];
			$tpdate=$row["tpdate"];
			$paydate=$row["paydate"];
			$total_fvC = 0;
			$total_fvQ= 0;
			$total_fvQ1= 0;
			$total_fvQ2= 0;				
		}

	 

// ---------------------------- ź������� bc ���������ͺ >=$ro --------------------------------//
		$sql="delete from ".$dbprefix."ac where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		if($debug) echo "$sql <br>";		
		//bmbonus
		//ź������� bmbonus ���������ͺ >=$ro
		$sql="delete from ".$dbprefix."ambonus where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
 		if($debug) echo "$sql <br>";

  		
 		$sql="delete from ".$dbprefix."apv where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
  		if($debug) echo "$sql <br>";  
		
		$sql="delete from ".$dbprefix."bm where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		if($debug) echo "$sql <br>";		
		//bmbonus
		//ź������� bmbonus ���������ͺ >=$ro
		$sql="delete from ".$dbprefix."bmbonus where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
 		if($debug) echo "$sql <br>";

		$sql="delete from ".$dbprefix."bm1 where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		if($debug) echo "$sql <br>";		
		//bmbonus
		//ź������� bmbonus ���������ͺ >=$ro
		$sql="delete from ".$dbprefix."bmbonus1 where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
 		if($debug) echo "$sql <br>";


		//��Ѻ CALC ����� ''
		$sql="update ".$dbprefix."around set calc='' where rcode>= '$ro'   ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
 		if($debug) echo "$sql <br>";
		
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
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=3">
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
function updateStatus($dbprefix,$ro,$mcode,$cur_date,$tot_fv){
	$month = explode('-',$cur_date);
	$select = "select pos_cur from ".$dbprefix."member where mcode = '$mcode'";
	$rs = mysql_query($select);
	$sqlObj = mysql_fetch_object($rs);
	$pos_cur =$sqlObj->pos_cur;
	mysql_free_result($rs);
		$array_mpos = array('BM'=>0,'AG'=>300,'SM'=>300,'MP'=>500,'EP'=>500,'VP'=>1000,'EVP'=>1000,'CEO'=>1000);
		$month=explode("-",$cur_date);
	//	if($mcode == '0019157')echo $tot_fv.' '.$array_mpos[$pos_cur];
	//	exit;
		if($tot_fv >= $array_mpos[$pos_cur] and $pos_cur <> 'BM' and $pos_cur <> 'M'){
			$sql1 = "select * from ".$dbprefix."status WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
			$rs1=mysql_query($sql1);
			//echo $sql1.'<br>';
			$sql = "update ".$dbprefix."status set status = 0,mpos = '$pos_cur' where mcode = '$mcode' and month_pv = '".$month[0].$month[1]."'";
			//	 echo $sql.'<br>';
				mysql_query($sql);
				mysql_free_result($rs1);
			//echo $sql.'<br>d';
		}
		//mysql_free_result($rs1);
	}

?>