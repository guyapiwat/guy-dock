<script language="javascript">
var win
function view(code){
	var param = 'fmcode='+code;
	var url = './mem_detailview.php?'+param;
	//window.location = wlink;
	if(win!=null) win.close();
	win = window.open(url,'','height=530 width=700 scrollbars=no' );
}
</script>
<?
require("connectmysql.php");
if(isset($_POST['skey'])){
	$key = $_POST['skey'];
	$cause = $_POST['scause'];
}else if(isset($_GET['skey'])){
	$key = $_GET['skey'];
	$cause = $_GET['scause'];
}
// JOIN ����͵�ͧ��â������ѹ�������������

	//$sql = "SELECT ".$dbprefix."member.*,taba.exp_date FROM ".$dbprefix."member ";
	//$sql .= "LEFT JOIN (SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate GROUP BY mid) AS taba ON (".$dbprefix."member.id=taba.mid) ";
	$sql = "SELECT * FROM ".$dbprefix."member ";
	//$sql .= "LEFT JOIN (SELECT mcode AS mc1,SUM(tot_pv) AS tot_pv FROM ".$dbprefix."asaleh GROUP BY mcode )  AS tabb ON (".$dbprefix."member.mcode=tabb.mc1) ";
if(($key!='')||($cause!='')){
	if(strcmp($key,'mcode')==0)
		$sql .= "WHERE  ".$key." = ".$cause." ";
	else
		$sql .= "WHERE  ".$key." ='".$cause."'";
}
	$sql .= " ORDER BY id DESC";
//echo $sql;
	if($_GET['state']==1){
		include("member_del.php");
	}else if($_GET['state']==2){
		include("member_editadd.php");
	}else{
		$rs = mysql_query($sql);
		$num_row = mysql_num_rows($rs);
		if($num_row>0){
	?>
	<table align='center' width='95%'  border='0' cellpadding='0' cellspacing='0'>
		<tr>
			<td colspan='9'>
			<? if($acc->isAccess(1)) {?>
				<table><tr>
					<td><fieldset>
					<form style='margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;' name='searh' id='searh' action='./index.php?sessiontab=1&sub=2' method='post'>
					<input type='text' name='scause'>
					<select name='skey'>
					<option value='mcode' >������Ҫԡ</option>
					<option value='name_t' >����</option>
					<option value='sp_code' >���ʼ���й�</option>
					<option value='sp_name' >���ͼ���й�</option>
					<option value='upa_code' >�����Ѿ�Ź�</option>
					<option value='upa_name' >�����Ѿ�Ź�</option>
					<option value='mdate' >�ѹ�����Ѥ�</option>
					<option value='stockist' >ʵ�͡�ջ</option>
					<option value='mo' >�����</option>
					</select>
					<input type='submit' value='��'></form>
					</fieldset></td>
					<td><fieldset><a href='./member_print.php' target="_blank"><img border='0' src='./images/Amber-Printer.gif'>�������§ҹ</a></fieldset></td>
				</tr></table><br />
				<? } ?>
			</td>
		</tr>
		
		<tr bgcolor='#999999' align='center'><form name='maindel' id='maindel' action='./index.php?sessiontab=1&sub=2&state=1' method='post'>
		<? if($acc->isAccess(1)) {?>
			<td bgcolor='#99CCCC' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>��</td>
		<? }if($acc->isAccess(8)) {?>
			<td bgcolor='#99CCCC' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>
			<a href="javascript:if(confirm('��س��׹�ѹ���ź�����Ŵѧ�����')) document.maindel.submit();">ź</a>
			<input name='delbutton' id='delbutton' type='checkbox' onclick='checkall()'></td>
			<? }if($acc->isAccess(4)) {?>
			<td bgcolor='#99CCCC' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>���</td>
			<? } ?>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>������Ҫԡ</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>����</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>���ʼ���й�</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>���ͼ���й�</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>�����Ѿ�Ź�</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>�����Ѿ�Ź�</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>PV ����</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>�ѹ�����Ѥ�</td>
			<td width='5%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>ʵ�͡�ջ</td>
			<td width='5%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>�����</td>
		</tr>
		<?
		//���ʼ���й�,���ͼ���й�,�����Ѿ�Ź�,�����Ѿ�Ź�,PV ����,�ѹ�����Ѥ�,ʵ�͡�ջ,�����
		//mcode,name_t,sp_code,sp_name,upa_code,upa_name,tot_pv,mdate,stockist,mo
		$onmouseover = array("this.style.background='#FFCC99'","this.style.background='#FFCC99'");
		$onmouseout = array("this.style.background='#EDEDED'","this.style.background='#FFFFFF'");
		
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			//$sql1 = "SELECT SUM(tot_pv) AS tot_pv FROM ".$dbprefix."asaleh WHERE mcode='".$sqlObj->mcode."' ";
			//$rs1 = mysql_query($sql1);
		?>
		<tr id='trtab[]' bgcolor='#EDEDED'  onmouseover="<?=$onmouseover[$i%2]?>"  onmouseout="<?=$onmouseout[$i%2]?>" >
		<? if($acc->isAccess(1)) {?>
			<td id='tdtab[]' align='center' style='border-left:1 solid #FFFFFF;'>
			<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' style='cursor:pointer' src='./images/search.gif'  name='[]' onclick=" view('<?=$sqlObj->mcode?>')" ></td>
			<? }if($acc->isAccess(8)) {?>
			<td align='center' style='border-left:1 solid #FFFFFF;'><input type='checkbox' name='delfield[<?=$i?>]' value='<?=$sqlObj->id?>'></td>
			<? }if($acc->isAccess(4)) {?>
			<td align='center' style='border-left:1 solid #FFFFFF;'><a href='index.php?state=2&sessiontab=1&sub=2&id=<?=$sqlObj->id?>'><img onmouseover='this.height-=5;' onmouseout='this.height+=5;' src='./images/editlink.gif'/></a></td>
			<? } ?>
			<td align='center' style='border-left:1 solid #FFFFFF;'><a href='index.php?sessiontab=1&sub=4&cmc=<?=$sqlObj->mcode?>'><?=$sqlObj->mcode?></a></td>
			<td align='left' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->name_t?></td>
			<td align='center' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->sp_code?></td>
			<td align='left' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->sp_name?></td>
			<td align='center' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->upa_code?></td>
			<td align='left' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->upa_name?></td>
			<td align='right' style='border-left:1 solid #FFFFFF;'><? //echo mysql_result($rs1,0,'tot_pv');?></td>
			<td align='center' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->mdate?></td>
			<td align='center' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->stockist?></td>
			<td align='center' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->mo?></td>
		</tr>
	<?
		}//for($i=0;$i<mysql_num_rows($rs);$i++){
			mysql_free_result($rs);
		}//if(($key!='')||($cause!='')){
		else{
		?>
		</form><table align='center' width='95%'  border='0' cellpadding='0' cellspacing='0'><br /><tr><td bgcolor='#990000' align='center'><font color='#FFFFFF'>��辺�����ŵ�����͹�</font></td></tr><tr></tr><td align='center'>[<a href='javascript:history.back()'>Back</a>]</td></tr></table>
		<?
		}
	?>
	</table>
	<?	
	}

?>