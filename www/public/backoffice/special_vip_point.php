<?
require("connectmysql.php");
require_once ("function.log.inc.php");
require_once("logtext.php");
?>

<?
   if(isset($_POST['sppoint_submit'])){
     $vipinfo['sp_code'] = $_POST['sp_code'];
	 $vipinfo['ptype'] = $_POST['ptype'];
	 $vipinfo['sppoint'] = $_POST['sppoint'];
	 $vipinfo['mdate'] = $_POST['mdate'];
	
	$sql = "SELECT MAX(vip_id) AS maxid FROM ".$dbprefix."special_point";
/*	if(!$rs=mysql_query($sql)){
	   $errMsg = "�Դ��ͼԴ��Ҵ �������ö�ѹ�֡��ṹ��";
	   echo "<script> alert('".$errMsg."'); </script>";
	 }*/
	 
	 $rs = mysql_query($sql);
	 $oldID = mysql_result($rs,0,'maxid'); 
	 $newID = 1;
	 
	 if($oldID){
	    $newID = ++$oldID;
	 }
	
	$month=date("m"); //���ҧ�����͹�Ѩ�غѹ
	$day=date("d"); //���ҧ����ѹ�Ѩ�غѹ
	$year=date("Y"); //���ҧ��һջѨ�غѹ
	
	$sadate=$year."-".$month."-".$day;
	$heal_mouth=$year.$month;
	
     $sql2 = "INSERT INTO ".$dbprefix."special_point (id,vip_id, sadate,  mcode,  sa_type, tot_pv, uid,heal_mouth ) VALUES ("
	 ."'',"
	 ."'".$newID."',"
	 ."'".$vipinfo['mdate']."',"
	 ."'".$vipinfo['sp_code']."',"
	 ."'".$vipinfo['ptype']."',"
	 ."'".$vipinfo['sppoint']."',"
	 ."'".$_SESSION["adminusercode"]."','".$heal_mouth."')"
	 ;
	 //====================LOG===========================
	$text="uid=".$_SESSION["adminuserid"]." action=special_vip_point=>$sql2";
		logtext(true,$_SESSION['adminusercode'],'VIP ��ṹ��Ҫԡ  : '.$vipinfo['sp_code'].' �ӹǹ '.$vipinfo['sppoint'].' ��ṹ','');
	writelogfile($text);

//=================END LOG===========================
	 if(!mysql_query($sql2)){
	   $errMsg = "�Դ��ͼԴ��Ҵ �������ö�ѹ�֡��ṹ��";
	   echo "<script> alert('".$errMsg."'); </script>";
	 }else{
	   $success = true;
		if($vipinfo['ptype']!="VQ") {
			//updatePos($dbprefix,$vipinfo['sp_code'],$sadate);
		}
	 }
	 
   }
?>


<script language="javascript" type="text/javascript">
    var wi=null;
	var submitted = false;
	var error = false;
	var error_message = "";
	var form = "";
	
	function get_mem_listpicker_sp_code(){
		if (wi) wi.close();
		//alert(this.getElementById('mcode_acc_name').innerHTML);
		wi=window.open("mem_listpicker_sp_code.php?name="+document.frm.sp_code.value,"list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	}
	
	function check_form(form_name){
		form = form_name;
		error = false;
		
		if(submitted == true){
		   alert("���ѧ���Թ���");
		   return false;
	    }
		
		check_input("sp_code",1,"��س��к������Ţ��Ҫԡ����ͧ���������ṹ");
		check_point("sppoint","��ṹ����͡��ͧ�繵���Ţ 0-9 ��ҹ��");
		
		if(error == true){
			alert(error_message);
			error_message = "";
			return false;
		}else{
			submitted = true;
			return true;
		}
	}
	
	function check_input(field_name,length,msg){
		if(form.elements[field_name] && (form.elements[field_name].type != "hidden")){
			var field_value = form.elements[field_name].value;
			if(field_value == '' || field_value.length < length){
				error_message = error_message+"*"+msg+"\n";
				error = true;
			}
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
<form name="frm" method="post" action="./index.php?sessiontab=<?=$sesstab?>&sub=2" onSubmit='return check_form(frm)' ENCTYPE="multipart/form-data">
  <table width="950" border="0" cellpadding="0" cellspacing="0">
    <tr style="display:<?php echo ($success) ? "" : "none";?>">
			  	<td height="46" valign="top">
					<div  align="center" style="font-size: 12px; color:#58a0c8;">
						<br />�ѹ�֡���������º�������� ��ҹ����ö�ӡ�������������ա������
						 <a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">�����</a>
					</div>
				</td>
	</tr>
	
    <tr style="display:<?php echo ($success) ? "none" : "block";?>">
	  <td>
	   <table width="950" border="0" cellpadding="0" cellspacing="0" cols="4">
				<tr>
				<td width="5%" height="20"></td>
				<td width="10%" align="right">�ѹ���&nbsp;<font color="#ff0000">*</font>&nbsp;</td>
				  <td width="40%">&nbsp;
				  <input type="text" id="dateInput1" name="mdate" size="10" maxlength="10" value="<?=($mdate==""?date("Y-m-d"):$mdate)?>" /><font color="#808080">(����-��-��)</font></td>
				</tr>
			   <tr>
			  <td width="5%" height="20"></td>
			  <td width="10%" align="right">������Ҫԡ&nbsp;<font color="#ff0000">*</font>&nbsp;</td>
			  <td width="40%">&nbsp;
			    <input name="sp_code" id="sp_code" type="text" style="background-color:#FFFF99" size="15" readonly />
			    <input type="button" onClick="get_mem_listpicker_sp_code()" value="���͡">			  </td>
			  <td width="50%"></td>
			</tr>
			
			<tr>
			  <td width="5%" height="20"></td>
			  <td width="10%" align="right">������Ҫԡ&nbsp;<font color="#ff0000">*</font>&nbsp;</td>
			  <td width="40%">&nbsp;

				<input name="sp_name" type="text" style="background-color:#FFFF99" id="sp_name" readonly />			  </td>
			  <td width="50%"></td>
			</tr>
			
			<tr>
			  <td width="5%" height="20"></td>
			  <td width="10%" align="right" nowrap>��Դ�ͧ��ṹ&nbsp;<font color="#ff0000">*</font>&nbsp;</td>
			  <td width="40%">&nbsp;
				<input name="ptype" type="radio" value="VA" checked />Ἱ A	</td>
			  <td width="50%"></td>
			</tr>
			
			<tr>
			  <td width="5%" height="20"></td>
			  <td width="10%" align="right">��ṹ&nbsp;<font color="#ff0000">*</font>&nbsp;</td>
			  <td width="40%">&nbsp;
			  <input name="sppoint" type="text" />	    
			  &nbsp;PV</td>
			  <td width="50%"></td>
			</tr>
			
			<tr>
			  <td width="5%" height="10"></td>
			  <td width="10%"></td>
			  <td width="40%"></td>
			  <td width="50%"></td>
			</tr>
			
			<tr>
			  <td width="5%" height="20"></td>
			  <td width="10%"></td>
			  <td width="40%">&nbsp;
				<input name="sppoint_submit" type="submit" value="�ѹ�֡" />&nbsp;&nbsp;
				<input name="sppoint_cancel" type="reset" value="¡��ԡ" />			  </td>
			  <td width="50%"></td>
			</tr>
	   </table>
	 </td>
	</tr>
	  
		
    
  </table>
</form>