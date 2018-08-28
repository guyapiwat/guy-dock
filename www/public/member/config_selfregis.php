<? include("connectmysql.php");?>
<? require_once ("function.log.inc.php"); ?>
<script language="javascript">
function checkfield(){
	document.form1.submit();
}
</script>
<?
	if($_POST){
		if($_POST){
			//echo "update  ".$dbprefix."member  set setregis = '".$_POST[selfregis]."' and mcode = '".$_SESSION["usercode"]."' ";
			//exit;
			//====================LOG===========================
			$text="uid=".$_SESSION["usercode"]." action=config_mem_info =>update  ".$dbprefix."member  set setregis = '".$_POST[selfregis]."'  and mcode = '".$_SESSION["usercode"]."' ";
			writelogfile($text);
			//=================END LOG===========================
			mysql_query("update  ".$dbprefix."member  set setregis = '".$_POST[selfregis]."' and mcode = '".$_SESSION["usercode"]."' ");
			//====================LOG===========================
			$text="uid=".$_SESSION["usercode"]." action=config_mem_regis =>update  ".$dbprefix."member  set setregis = '".$_POST[selfregis]."' and mcode = '".$_SESSION["usercode"]."' ";
			writelogfile($text);
		}
		?><meta http-equiv="refresh" content="0;url=index.php?sessiontab=1&sub=9"><?
	}else{
		include("global.php");

		//var_dump($GLOBALS["selfregis"]);
		if($GLOBALS["selfregis"]=="0"){
			$strType1 = "checked=\"checked\"";
			$strType2 = "";
			$strType3 = "";
		}else if($GLOBALS["selfregis"]=="1"){
			$strType2 = "checked=\"checked\"";
			$strType1 = "";
			$strType3 = "";
		}else if($GLOBALS["selfregis"]=="2"){
			$strType3 = "checked=\"checked\"";
			$strType2 = "";
			$strType1 = "";
		}
?>
<form name="form1" method="post" action="<? $PHP_SELF?>">
<table width="81%" border="0" height="370">
   	<tr>
  	  <td><table width="38%" border="0">
        
        <tr>
          <td nowrap="nowrap">link : http://www.successmore1.com/member/<?=$_SESSION["usercode"]?> </td>
        </tr>
        <tr>
          <td><input type="radio" <?=$strType1?>  id="selfregis" name="selfregis" value="0"> 1 . สลับซ้ายขวา</td>
        </tr>
        <tr>      <td width="59%"><input type="radio" <?=$strType2?> id="selfregis" name="selfregis" value="1">2. คะแนนฝั่งอ่อน</td>
       </tr><tr>    <td width="59%"><input type="radio" <?=$strType3?> id="selfregis" name="selfregis" value="2">3. คะแนนฝั่งแข็ง</td>
        </tr>
		<tr>    
		  <td width="59%">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  	<tr>
		<td><input type="button" name="Submit" value="&#3605;&#3585;&#3621;&#3591;" onClick="checkfield();">
&nbsp;
<input type="reset" name="reset" value="&#3618;&#3585;&#3648;&#3621;&#3636;&#3585;"></td>
		<td>&nbsp;</td>
  	</tr>
</table>
</form>
<? }?>

