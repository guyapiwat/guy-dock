<link href="./../style.css" rel="stylesheet" type="text/css">
<?
include("prefix.php");
include("connectmysql.php");
if($name==''){
	$sql="select * from ".$dbprefix."member order by name_t";
}
else{
	$sql="select * from ".$dbprefix."member where name_t like '$name%' order by name_t";
}
$result=mysql_query($sql);
?>
<SCRIPT LANGUAGE="JavaScript">
function selectitem(sid,sname){
		doc= window.opener.document;
		doc.frm.mcode.value = sid;
		//doc.frm.upa_name.value = sname;
		doc.getElementById('name_t').innerHTML=sname;
	 	 window.close();
}
</script>

<CENTER>เลือกสมาชิก</CENTER>
<form name="listform" method="post" action="<?=$_SERVER['PHP_SELF']?>">
<input type="text" name="name" value='<?=$name?>'><INPUT name="B1" TYPE="submit" value="ค้นหาชื่อ">
</form>
<form name="listform1" method="post" action="<?=$_SERVER['PHP_SELF']?>">
	<table width="100%" border="0" cellspacing="1" cellpadding="1">
		<?
		$i=0;
		while($row=mysql_fetch_object($result)){
			$i++;
			if(($i % 2) == 0){$bgc="bgcolor=ffffff";}else{$bgc="bgcolor=e0e0e0";}
			echo "<tr $bgc><td><a name=\"$row->mcode\" style=\"cursor:pointer\" onclick=\"selectitem('$row->mcode','$row->name_t')\">$row->mcode</a></td><td><a name=\"$row->mcode\" style=\"cursor:pointer\" onclick=\"selectitem('$row->mcode','$row->name_t')\">$row->name_t</a></td></tr>";
		}
		?>
	</table>
</form>
<SCRIPT language="JavaScript">
document.listform.name.focus();
</SCRIPT>