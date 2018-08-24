<? require "adminchecklogin.php";?>
<? include("prefix.php");?>
<?
include_once 'function.php'?>
<html>
<head>
<title>ตรวจสอบสมาชิก</title>
<link href="./../style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="javascript" type="text/javascript">
	function gotoDate(name,step){
		var date = document.getElementById(name).value;
		date = date.replace("-","/");
		date = date.replace("-","/");
		var myday = new Date(date);
		myday.setDate(myday.getDate()+step);
		var y = myday.getYear();
		var m = myday.getMonth();
		var d = myday.getDate();
		++m;
		var ret = myday.getYear() + "-" + (m.toString().length>1?m:("0"+m)) + "-" + (d.toString().length>1?d:("0"+d));
		document.getElementById(name).value = ret;
	}
</script>
</head>

<body>
	<? include 'header.php';?>

<?
$npage = $_POST['np'];
$date = $_POST['dt'];
$npage = $npage==''?30:$npage;
$date = $date==''?date('Y-m-d'):$date;
?>
<form action="<?=$PHP_SELF?>" method="post">
<table>
	<tr>
		<td align="right">วันที่ :</td>
		<td><input type="text" name="dt" id="dt" value="<?=$date?>"><input type="button" value="<<" onClick="gotoDate('dt',-1)"><input type="button" value=">>" onClick="gotoDate('dt',1)"></td>
		<td></td>
	</tr>
	<tr>
		<td align="right">จำนวนที่แสดง :</td>
		<td><input type="text" name="np" id="np" value="<?=$npage?>"></td>
		<td><input name="submit" type="submit" value="ตกลง"></td>
	</tr>

</table>
</form>

<?
$style_b = "border-bottom-style:solid; border-bottom-color:#000000; border-bottom-width:1;";
$style_t = "border-top-style:solid; border-top-color:#000000; border-top-width:1;";
$style_l = "border-left-style:solid; border-left-color:#FFFFFF; border-left-width:1;";
$style_lb = "border-left-style:solid; border-left-color:#000000; border-left-width:1;";

	$sql = "SELECT * FROM ".$dbprefix."preasaleh,".$dbprefix."member WHERE ".$dbprefix."preasaleh.sadate='$date' AND ".$dbprefix."preasaleh.mcode=".$dbprefix."member.mcode ORDER BY ".$dbprefix."preasaleh.sadate LIMIT 0, 30";
	$rs = mysql_query($sql);
	//echo mysql_num_rows($rs);
	if(mysql_num_rows($rs)<=0){
		?><table width="60%" bgcolor="#990000" align="center"><tr>
  <td align="center" style="<?=$style_t.$style_b?> "><font color="#FFFFFF"><b>ไม่พบข้อมูล การสั่งซื้อของสมาชิก</b></font></td>
</tr></table><?
	}else{
?>
<table align="center" width="70%"><tr><td><fieldset>
<legend>ข้อมูลรายการสั่งซื้อ <?=$npage>mysql_num_rows($rs)?mysql_num_rows($rs):$npage?> รายชื่อล่าสุด</legend>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
  <tr bgcolor="#999999" align="center" >
    <td width="50%" style="<?=$style_b.$style_l?>">ชื่อ</td>
    <td width="10%" style="<?=$style_b.$style_l?>">วันที่</td>
    <td width="20%" style="<?=$style_b.$style_l?>">PV</td>
    <td width="20%" style="<?=$style_b.$style_l?>">จำนวนเงิน</td>
    <!--td width="18%" align="center" style="<?=$style_b.$style_l?>">การจัดการ</td-->
    <!--td width="18%" align="center" style="<?=$style_b.$style_l?>">การจัดการ</td-->
  </tr>
<? $trcolor = array("FFFFFF","#EEEEEE");
	for($i=0;$i<mysql_num_rows($rs);$i++){
		?>
  <tr align="center" bgcolor='<?=$trcolor[$i%2]?>'>
    <td align="left"  style="<?=$style_l?>"><a href="javascript:window.open('confirm_sale.php?dt=<?=$date?>&sid=<?=($i>=mysql_num_rows($rs)?'':mysql_result($rs,($i),'id'))?>','sf','width=900 height=600 scrollbars=1');window.stop;">
      <?=($i>=mysql_num_rows($rs)?'':mysql_result($rs,$i,'name_t'))?>
    </a></td>
    <td style="<?=$style_l?>"><?=mysql_result($rs,$i,'sadate')?></td>
    <td style="<?=$style_l?>"><?=mysql_result($rs,$i,'tot_pv')?></td>
    <td style="<?=$style_l?>"><?=mysql_result($rs,$i,'total')?></td>
    <!--td align="center" style="<?=$style_l?>">&nbsp;</td-->
    <!--td align="center" style="<?=$style_l?>">&nbsp;</td-->
  </tr>
<?
	 }
?>  <tr>
    <td colspan="4" style="<?=$style_t?> ">&nbsp;</td>
  </tr>
</table></fieldset></td></tr></table>
<? }?>
<br /><br />
<? include("footer.php");?>
</body>
</html>
