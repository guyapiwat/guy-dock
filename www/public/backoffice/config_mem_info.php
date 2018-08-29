<? include("connectmysql.php");?>
<? require_once ("function.log.inc.php"); ?>
<script language="javascript">
function checkfield(){
	if(document.getElementById("numOfChild").value ==""){
		alert("กรุณาใส่จำนวนลูกทีม");
		document.focus("numOfChild");
		return false;
	}
	if(document.getElementById("treeformat1").checked==false && document.getElementById("treeformat2").checked==false){
		alert("กรุณาเลือกรูปแบบของแผนภูมิ");
		return false;
	}else if(document.getElementById("treeformat1").checked!=false){
		document.getElementById("treeformat1").value = "ball";
		document.getElementById("treeformat2").value = "ball";
	}else if(document.getElementById("treeformat2").checked!=false){
		document.getElementById("treeformat1").value = "sqare";
		document.getElementById("treeformat2").value = "sqare";
	}
	if(document.getElementById("numofleveltoshow").value ==""){
		alert("กรุณากรอกจำนวนชั้นของแผนภูมิที่ต้องการให้แสดง");
		return false;
	}
	document.form1.submit();
}
function checktreeformat(str){
	if(str=="treeformat1"){
		document.getElementById("treeformat2").checked = false;
	}else if(str=="treeformat2"){
		document.getElementById("treeformat1").checked = false;
	}
}
</script>
<?
	if($_POST["numOfChild"]!=""){
		if($_POST["treeformat1"]!=""){
			$treeformat = $_POST["treeformat1"];
		}else if($_POST["treeformat2"]!=""){
			$treeformat = $_POST["treeformat2"];
		}
		$numOfChild = $_POST["numOfChild"];
		$numofleveltoshow = $_POST["numofleveltoshow"];
		$statusformat = $_POST["statusformat"];
		mysql_query("TRUNCATE `".$dbprefix."global`");
		mysql_query("TRUNCATE `".$dbprefix."lr_def`");
		if($_POST["numOfChild"]==2){
			//====================LOG===========================
			$text="uid=".$_SESSION["adminuserid"]." action=config_mem_info =>insert into ".$dbprefix."global values('$numOfChild','$treeformat','$numofleveltoshow','$statusformat')";
			writelogfile($text);
			//=================END LOG===========================
			mysql_query("insert into ".$dbprefix."global values('$numOfChild','$treeformat','$numofleveltoshow','$statusformat','1')");
			//====================LOG===========================
			$text="uid=".$_SESSION["adminuserid"]." action=config_mem_info =>insert into ".$dbprefix."lr_def values('1','ซ้าย')";
			writelogfile($text);
			//=================END LOG===========================
			mysql_query("insert into ".$dbprefix."lr_def values('1','ซ้าย')");
			//====================LOG===========================
			$text="uid=".$_SESSION["adminuserid"]." action=config_mem_info =>insert into ".$dbprefix."lr_def values('2','ขวา')";
			writelogfile($text);
			//=================END LOG===========================
			mysql_query("insert into ".$dbprefix."lr_def values('2','ขวา')");
		}else if($_POST["numOfChild"]==3){
			//====================LOG===========================
			$text="uid=".$_SESSION["adminuserid"]." action=config_mem_info =>insert into ".$dbprefix."global values('$numOfChild','$treeformat','$numofleveltoshow')";
			writelogfile($text);
			//=================END LOG===========================
			mysql_query("insert into ".$dbprefix."global values('$numOfChild','$treeformat','$numofleveltoshow')");
			//====================LOG===========================
			$text="uid=".$_SESSION["adminuserid"]." action=config_mem_info =>insert into ".$dbprefix."lr_def values('1','ซ้าย')";
			writelogfile($text);
			//=================END LOG===========================
			mysql_query("insert into ".$dbprefix."lr_def values('1','ซ้าย')");
			//====================LOG===========================
			$text="uid=".$_SESSION["adminuserid"]." action=config_mem_info =>insert into ".$dbprefix."lr_def values('2','กลาง')";
			writelogfile($text);
			//=================END LOG===========================
			mysql_query("insert into ".$dbprefix."lr_def values('2','กลาง')");
			//====================LOG===========================
			$text="uid=".$_SESSION["adminuserid"]." action=config_mem_info =>insert into ".$dbprefix."lr_def values('3','ขวา')";
			writelogfile($text);
			//=================END LOG===========================
			mysql_query("insert into ".$dbprefix."lr_def values('3','ขวา')");
		}else{
			//====================LOG===========================
			$text="uid=".$_SESSION["adminuserid"]." action=config_mem_info =>insert into ".$dbprefix."global values('$numOfChild','$treeformat','$numofleveltoshow')";
			writelogfile($text);
			//=================END LOG===========================
			mysql_query("insert into ".$dbprefix."global values('$numOfChild','$treeformat','$numofleveltoshow')");
			for($i=1;$i<=$_POST["numOfChild"];$i++){
				//====================LOG===========================
			$text="uid=".$_SESSION["adminuserid"]." action=config_mem_info =>insert into ".$dbprefix."lr_def values('".$i."','".$i."')";
			writelogfile($text);
			//=================END LOG===========================
				mysql_query("insert into ".$dbprefix."lr_def values('".$i."','".$i."')");
			}
		}
		?><meta http-equiv="refresh" content="0;url=index.php?sessiontab=5&sub=5"><?
	}else{
		include("global.php");
		if($GLOBALS["treeformat"]=="ball"){
			$str1 = "checked=\"checked\"";
			$str2 = "";
		}else if($GLOBALS["treeformat"]=="sqare"){
			$str1 = "";
			$str2 = "checked=\"checked\"";
		}
		
		if($GLOBALS["statusformat"]=="open"){
			$strType1 = "checked=\"checked\"";
			$strType2 = "";
		}else if($GLOBALS["statusformat"]=="close"){
			$strType1 = "";
			$strType2 = "checked=\"checked\"";
		}
?>
<form name="form1" method="post" action="<? $PHP_SELF?>">
<table width="81%" border="0" height="370">
  <tr>
    <td width="35%" align="right">จำนวนลูกทีม(แบบอัพไลน์) <font color="#FF0000">*</font>&nbsp;</td>
    <td width="65%">
      <input type="text" id="numOfChild" name="numOfChild" maxlength="2" value="<?=$GLOBALS["numofchild"]?>">    </td>
  </tr>
  <tr>
    <td align="right" valign="middle">รูปแบบของแผนภูมิ <font color="#FF0000">*</font>&nbsp; </td>
    <td>
      <table width="82%" border="0">
        <tr align="center">
          <td width="41%"><img src="./images/ball.gif" style="border: #000000 solid 1;" /></td>
          <td width="59%"><img src="./images/sqare.gif" style="border: #000000 solid 1;" /></td>
        </tr>
        <tr align="center">
          <td><input type="radio" <?=$str1?> id="treeformat1" name="treeformat1" value="ball" onClick="checktreeformat('treeformat1');">
แบบวงกลม</td>
          <td>
            <input type="radio" <?=$str2?> id="treeformat2" name="treeformat2" value="sqare" onClick="checktreeformat('treeformat2');">
แบบสี่เหลี่ยม</td>
        </tr>
      </table>      </td>
  </tr>
  	<tr>
  	  <td align="right">จำนวนชั้นของแผนภูมิที่ต้องการให้แสดง <font color="#FF0000">*</font>&nbsp;</td>
  	  <td><input type="text" name="numofleveltoshow" id="numofleveltoshow" value="<?=$GLOBALS["numofleveltoshow"]?>"></td>
    </tr>
  	<tr>
  	  <td align="right">สถานะ เปิด/ปิด ระบบ Service <font color="#FF0000">*</font></td>
  	  <td><table width="38%" border="0">
        
        <tr align="center">
          <td width="41%"><input type="radio" <?=$strType1?> id="statusformat" name="statusformat" value="open">
            เปิด</td>
          <td width="59%"><input type="radio" <?=$strType2?> id="statusformat" name="statusformat" value="close">
            ปิด</td>
        </tr>
      </table></td>
    </tr>
  	<tr>
		<td>&nbsp;</td>
		<td><input type="button" name="Submit" value="ตกลง" onClick="checkfield();">
	    &nbsp;
	    <input type="reset" name="reset" value="ยกเลิก"></td>
	</tr>
</table>
</form>
<? }?>

