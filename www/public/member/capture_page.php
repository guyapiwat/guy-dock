<? 

require_once 'connectmysql.php';

$result=mysql_query("select * from ".$dbprefix."webcfg LIMIT 1");
if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		$webcfg=$row["web_cfg"];
}

if (isset($_SESSION["usercode"])) {$usercode=$_SESSION["usercode"];} 
else {$usercode="";$_SESSION["usercode"]=$usercode;};
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="Javascript">
//0=no, 1=yes
var copytoclip=1
function HighlightAll(theField) {
var tempval=eval("document."+theField)
tempval.focus()
tempval.select()
if (document.all&?toclip==1){
therange=tempval.createTextRange()
therange.execCommand("Copy")
window.status="Contents highlighted and copied to clipboard!"
setTimeout("window.status=''",1800)
}
}
</script>

</head>
<body>
<form method=post action='<?=$webcfg?>subscribe.php' name='frm' target=_blank>
<input type=hidden name='sponsor_code' value='<?=$usercode?>'>

<table>
<tr>
<td align=right>ชื่อ </td>
<td><input type=text name='name_t' size=40 maxlength=40></td>
</tr>
<tr>
<td align=right>โทรศัพท์มือถือ </td>
<td><input type=text name='mobile' size=20 maxlength=20></td>
</tr>
<tr>
<td align=right>อีเมล์ </td>
<td><input type=text name='email' size=40 maxlength=256></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value=Submit></td>
</tr>
</table>
<br>
</form>
<form name="test">
<td valign="top"><span style="font-size:10">
<script language="Javascript"> 
//0=no, 1=yes
var copytoclip=1
function HighlightAll(theField) {
var tempval=eval("document."+theField)
tempval.focus()
tempval.select()
if (document.all&&copytoclip==1){
therange=tempval.createTextRange()
therange.execCommand("Copy")
window.status="Contents highlighted and copied to clipboard!"
setTimeout("window.status=''",1800)
}
}
</script>
<input type="button" onclick="HighlightAll('test.select1')" value="Copy Scripts">
<br><br>
<center><textarea name="select1" rows=10 cols=100 ><form method=post action='<?=$webcfg?>subscribe.php' name='frm' target=_blank>
<input type=hidden name='sponsor_code' value='<?=$usercode?>'>
<table>
<tr>
<td align=right>ชื่อ </td>
<td><input type=text name='name_t' size=40 maxlength=40></td>
</tr>
<tr>
<td align=right>โทรศัพท์มือถือ </td>
<td><input type=text name='mobile' size=20 maxlength=20></td>
</tr>
<tr>
<td align=right>อีเมล์ </td>
<td><input type=text name='email' size=40 maxlength=256></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value=Submit></td>
</tr>
</table>
</form>
</textarea>
</center>
<hr size="1" color="99CC00" width="95%" align="left">
<span style="font-size:10"><b>วิธีใช้ : </b>1.นำไปไว้ใน &lt;body&gt;&lt;/body&gt; ในส่วนที่ต้องการครับ<br>
<hr size="1" color="99CC00" width="95%" align="left">
</span></span></td>
</form>

</table>

</body>
</html>
