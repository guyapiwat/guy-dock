<?
require("connectmysql.php");
require_once ("function.log.inc.php");
?>

<?
   if(isset($_POST['sppoint_submit'])){
     $vipinfo['sp_code'] = $_POST['sp_code'];
	 $vipinfo['ptype'] = $_POST['ptype'];
	 $vipinfo['sppoint'] = $_POST['sppoint'];
	 $vipinfo['mdate'] = $_POST['mdate'];
	
	$sql = "SELECT MAX(vip_id) AS maxid FROM ".$dbprefix."special_point";
/*	if(!$rs=mysql_query($sql)){
	   $errMsg = "เกิดข้อผิดพลาด ไม่สามารถบันทึกคะแนนได้";
	   echo "<script> alert('".$errMsg."'); </script>";
	 }*/
	 
	 $rs = mysql_query($sql);
	 $oldID = mysql_result($rs,0,'maxid'); 
	 $newID = 1;
	 
	 if($oldID){
	    $newID = ++$oldID;
	 }
	
	$month=date("m"); //สร้างค่าเดือนปัจจุบัน
	$day=date("d"); //สร้างค่าวันปัจจุบัน
	$year=date("Y"); //สร้างค่าปีปัจจุบัน
	
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
	writelogfile($text);
//=================END LOG===========================
	 if(!mysql_query($sql2)){
	   $errMsg = "เกิดข้อผิดพลาด ไม่สามารถบันทึกคะแนนได้";
	   echo "<script> alert('".$errMsg."'); </script>";
	 }else{
	   $success = true;
		if($vipinfo['ptype']!="VQ") {
			//updatePos($dbprefix,$vipinfo['sp_code'],$sadate);
		}
	 }
	 
   }
?>

<?
//update ตำแหน่ง แบบไม่สะสมคะแนน
	function updatePos($dbprefix,$mcode,$cur_date){
		$pos_piority = array('P'=>3,'D'=>2,'G'=>1,''=>0);
		$pos_exp = array('P'=>6000,'D'=>3000,'G'=>1500,''=>0);
		//-----เก็บคะแนนสูงสุดที่มีการซื้อ
		$sql = "SELECT MAX(tot_pv) as pv from ".$dbprefix."special_point WHERE mcode='$mcode' ";
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		mysql_free_result($rs);
		//-----เก็บตำแหน่งปัจจุบัน
		$sql = "SELECT pos_cur from ".$dbprefix."member WHERE mcode='$mcode' ";
		$rs = mysql_query($sql);
		$pos_old = '';
		if(mysql_num_rows($rs)>0) $pos_old = mysql_result($rs,0,'pos_cur');
		mysql_free_result($rs);
		//คำนวณตำแหน่ง
		$pos_new = $pos_old;
		foreach(array_keys($pos_exp) as $key){
			//echo $key;
			if($mexp>=$pos_exp[$key]){ $pos_new = $key; break;}
		}
		//echo $pos_old."=>".$pos_new;
		if($pos_new != $pos_old && $pos_piority[$pos_new]>$pos_piority[$pos_old]){
			$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 ";
			//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
			mysql_query($sql);
			$sql = "INSERT INTO ".$dbprefix."poschange (mcode,pos_before,pos_after,date_change) ";
			$sql .= "VALUES('".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
			//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
			mysql_query($sql);
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
		   alert("กำลังดำเนินการ");
		   return false;
	    }
		
		check_input("sp_code",1,"กรุณาระบุหมายเลขสมาชิกที่ต้องการเพิ่มคะแนน");
		check_point("sppoint","คะแนนที่กรอกต้องเป็นตัวเลข 0-9 เท่านั้น");
		
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
						<br />บันทึกข้อมูลเรียบร้อยแล้ว ท่านสามารถทำการเพิ่มข้อมูลอีกครั้งได้
						 <a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">ที่นี่</a>
					</div>
				</td>
	</tr>
	
    <tr style="display:<?php echo ($success) ? "none" : "block";?>">
	  <td>
	   <table width="950" border="0" cellpadding="0" cellspacing="0" cols="4">
				<tr>
				<td width="5%" height="20"></td>
				<td width="10%" align="right">วันที่&nbsp;<font color="#ff0000">*</font>&nbsp;</td>
				  <td width="40%">&nbsp;
				  <input type="text" id="mdate" name="mdate" size="10" maxlength="10" value="<?=($mdate==""?date("Y-m-d"):$mdate)?>" />
			&nbsp;<a href="javascript:NewCal('mdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a><font color="#808080">(ปปปป-ดด-วว)</font></td>
				</tr>
			   <tr>
			  <td width="5%" height="20"></td>
			  <td width="10%" align="right">รหัสสมาชิก&nbsp;<font color="#ff0000">*</font>&nbsp;</td>
			  <td width="40%">&nbsp;
			    <input name="sp_code" id="sp_code" type="text" style="background-color:#FFFF99" size="15" readonly />
			    <input type="button" onClick="get_mem_listpicker_sp_code()" value="เลือก">			  </td>
			  <td width="50%"></td>
			</tr>
			
			<tr>
			  <td width="5%" height="20"></td>
			  <td width="10%" align="right">ชื่อสมาชิก&nbsp;<font color="#ff0000">*</font>&nbsp;</td>
			  <td width="40%">&nbsp;

				<input name="sp_name" type="text" style="background-color:#FFFF99" id="sp_name" readonly />			  </td>
			  <td width="50%"></td>
			</tr>
			
			<tr>
			  <td width="5%" height="20"></td>
			  <td width="10%" align="right">ชนิดของคะแนน&nbsp;<font color="#ff0000">*</font>&nbsp;</td>
			  <td width="40%">&nbsp;
				<input name="ptype" type="radio" value="VA" checked />แผน A&nbsp;&nbsp;&nbsp;
				<input name="ptype" type="radio" value="VB" />แผน B&nbsp;&nbsp;&nbsp;
				<input name="ptype" type="radio" value="VQ" />รักษายอด&nbsp;&nbsp;&nbsp;				</td>
			  <td width="50%"></td>
			</tr>
			
			<tr>
			  <td width="5%" height="20"></td>
			  <td width="10%" align="right">คะแนน&nbsp;<font color="#ff0000">*</font>&nbsp;</td>
			  <td width="40%">&nbsp;
			  <input name="sppoint" type="text" />	    &nbsp;PV</td>
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
				<input name="sppoint_submit" type="submit" value="บันทึก" />&nbsp;&nbsp;
				<input name="sppoint_cancel" type="reset" value="ยกเลิก" />			  </td>
			  <td width="50%"></td>
			</tr>
	   </table>
	 </td>
	</tr>
	  
		
    
  </table>
</form>