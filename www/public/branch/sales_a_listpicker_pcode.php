<link href="./../style.css" rel="stylesheet" type="text/css">
<?
include("prefix.php");
include("connectmysql.php");
if($name==''){
	$sql="select * from ".$dbprefix."product order by pdesc";
}
else{
	$sql="select * from ".$dbprefix."product where pdesc like '$name%' order by pdesc";
}
$result=mysql_query($sql);
?>
<SCRIPT LANGUAGE="JavaScript">
function selectitem(pcode,pdesc,price,pv){
		doc= window.opener.document;
		//alert(document.listform.idx.value);
		doc.frm.elements["pcode[]"][document.listform.idx.value].value=pcode;
		doc.frm.elements["pdesc[]"][document.listform.idx.value].value=pdesc;
		doc.frm.elements["price[]"][document.listform.idx.value].value=price;
		doc.frm.elements["pv[]"][document.listform.idx.value].value=pv;
		doc.frm.elements["qty[]"][document.listform.idx.value].value=1;
		doc.frm.elements["amt[]"][document.listform.idx.value].value=price;
		//doc.getElementById('name_t').innerHTML=sname;
	 	 window.close();
}
</script>

<CENTER>เลือกสินค้า</CENTER>
<form name="listform" method="post" action="<?=$_SERVER['PHP_SELF']?>">
	<input type="hidden" name="idx" value="<?=$idx?>">
	<table width="100%" border="0" cellspacing="1" cellpadding="1">
		<?
		$i=0;
		while($row=mysql_fetch_object($result)){
			$i++;
			if(($i % 2) == 0){$bgc="bgcolor=ffffff";}else{$bgc="bgcolor=e0e0e0";}
			echo "<tr $bgc  ><td><a name=\"$row->mcode\" style=\"cursor:pointer\" onclick=\"selectitem('$row->pcode','$row->pdesc','$row->price','$row->pv')\">$row->pcode</a></td>";
			echo "<td><a name=\"$row->mcode\" style=\"cursor:pointer\" onclick=\"selectitem('$row->pcode','$row->pdesc','$row->price','$row->pv')\">$row->pdesc</a></td></tr>";
		}
		?>
	</table>
</form>
