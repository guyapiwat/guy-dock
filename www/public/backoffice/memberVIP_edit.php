<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<?
	require_once ("function.log.inc.php");
     $id = $_GET['id'];
     if(isset($_POST['submit'])){
	    $mvipinfo['newpoint'] = $_REQUEST['newpoint'];
		$mvipinfo['mdate'] = $_REQUEST['mdate'];
		$sql = "UPDATE ".$dbprefix."special_point SET tot_pv='".$mvipinfo['newpoint']."',sadate='".$mvipinfo['mdate']."' WHERE vip_id='".$id."'";
		echo "$sql";
		//exit;
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=memberVIP_edit =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
		echo "<script type='text/javascript' language='javascript'>window.location='./index.php?sessiontab=2&sub=3'</script>";
		//echo "<meta http-equiv='refresh' content='0;URL=./index.php?sessiontab=2&sub=3'>";
		//header("Location: ./index.php?sessiontab=2&sub=3");
	 }else{
	    $sql = "SELECT mcode,name_t,pv,sadate FROM ".$dbprefix."member LEFT JOIN (SELECT vip_id,tot_pv AS pv,mcode AS vmcode,sadate ";
	    $sql .= "FROM ".$dbprefix."special_point) AS vipinfo ON (".$dbprefix."member.mcode=vipinfo.vmcode) WHERE vipinfo.vip_id='".$id."'";
		//echo "$sql<br>";
		$rs = mysql_query($sql);
		
		$mcode = mysql_result($rs,0,'mcode');
		$mname = mysql_result($rs,0,'name_t');
		$mpv = split('[.]',mysql_result($rs,0,'pv'));		
		$mdate = mysql_result($rs,0,'sadate');
	 }
?>

<script language="javascript" type="text/javascript">

	var submitted = false;
	var error = false;
	var error_message = "";
	var form = "";
	
	function redirect(to_go){
		window.location = to_go;
	}
	
	function check_form(form_name){
		form = form_name;
		error = false;
		
		if(submitted == true){
		   alert("กำลังดำเนินการ");
		   return false;
	    }
		
		check_point("newpoint","คะแนนที่กรอกต้องเป็นตัวเลข 0-9 เท่านั้น");
		
		if(error == true){
			alert(error_message);
			error_message = "";
			return false;
		}else{
			submitted = true;
			return true;
		}
	}
	
	function check_point(field_name,msg){
		var pvalue = form.elements[field_name].value;
		
		if(!isNumeric(pvalue)){
			error_message = error_message+"*"+msg+"\n";
			error = true;
		}
	}
	
	function isNumeric(strString){
		//check for valid numeric strings
		var numericExpression = /^[0-9]+$/;
		
		if(strString.length == 0){
			return false
		}
		if(numericExpression.test(strString)){
			return true;
		}
		return false;
	}
</script>

<form action="./index.php?state=2&sessiontab=2&sub=3&id=<?=$id?>" method="post" name="vipedit" onSubmit='return check_form(vipedit)' ENCTYPE="multipart/form-data">
  <table align="left" width="500" border="0">
  <tr>
		<td height="20" width="20%" align="right">รหัส : </td>
		<td width="60%">
				  <input type="text" id="mdate" name="mdate" size="10" maxlength="10" value="<?=($mdate==""?date("Y-m-d"):$mdate)?>" />
			&nbsp;<a href="javascript:NewCal('mdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a><font color="#808080">(ปปปป-ดด-วว)</font></td>
				</tr>
    <tr>
	  <td height="20" width="20%" align="right">รหัส : </td>
	  <td width="60%"><?=$mcode?>&nbsp;&nbsp;ชื่อ : <?=$mname?>	      
	  </td>
	  <td width="20%"></td>
	</tr>
	
	<tr>
	  <td height="20" width="20%" align="right">คะแนน : </td>
	  <td width="60%"><input type="text" name="newpoint" value="<?=$mpv[0]?>"/>
	  </td>
	  <td width="20%"></td>
	</tr>
	
	<tr>
	  <td height="5" ></td>
	  <td></td>
	  <td></td>
	</tr>
	
	<tr>
	  <td height="20" ></td>
	  <td>
	    <input type="submit" name="submit" value="แก้ไข" />&nbsp;&nbsp;
		<input type="button" name="reset" value="ยกเลิก" onclick="redirect('./index.php?sessiontab=2&sub=3')" />
	  </td>
	  <td></td>
	</tr>
  </table>
</form>