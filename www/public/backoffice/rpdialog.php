<script language="javascript">
function checkround(){
	if(document.getElementById("dateInput1").value==""){
		alert("กรุณาเลือกวันที่เริ่มต้น");
		document.getElementById("dateInput1").focus();
		return false;
	}
	if(document.getElementById("dateInput2").value==""){
		alert("กรุณาเลือกวันที่สิ้นสุด");
		document.getElementById("dateInput2").focus();
		return false;
	}

	if(document.getElementById("dateInput1").value > document.getElementById("dateInput2").value){
		alert("วันเรื่มต้นมากกว่าวันสิ้นสุด");
		document.getElementById("dateInput1").focus();
		return false;
	}

	document.rform.submit();
}

function checkround_inv(){
	if(document.getElementById("dateInput1").value==""){
		alert("กรุณาเลือกวันที่เริ่มต้น");
		document.getElementById("dateInput1").focus();
		return false;
	}
	if(document.getElementById("dateInput2").value==""){
		alert("กรุณาเลือกวันที่สิ้นสุด");
		document.getElementById("dateInput2").focus();
		return false;
	}

	if(document.getElementById("dateInput1").value > document.getElementById("dateInput2").value){
		alert("วันเรื่มต้นมากกว่าวันสิ้นสุด");
		document.getElementById("dateInput1").focus();
		return false;
	}

	if(document.getElementById("inv").value==""){
		alert("เลือกสาขา");
		document.getElementById("inv").focus();
		return false;
	}

	document.rform.submit();
}
</script>

<style>
.tg  {border-collapse:separate;border-spacing:5px;border-color:#FF7F00;border-width:1px;border-style:solid;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:6px 3px;;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#000000;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:6px 3px;;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#000000;background-color:#fff;}
.tg .tg-v7c1{background-color:#FFFFFF;vertical-align: middle;text-align: left;}
.tg .tg-v7c2{background-color:#FFFFFF;vertical-align: middle;}
.tg .tg-7tl1{background-color:#FFFFFF;color:#000000;vertical-align:middle}


</style>
 
<?
require("../backoffice/date_picker.php"); 

function rpdialog_m($sub){ ?>

<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="strfdate" size="10" maxlength="10" value="<?=$_REQUEST['strfdate']?>" placeholder="2014-01-20"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="strtdate" size="10" maxlength="10" value="<?=$_REQUEST['strtdate']?>" placeholder="2014-01-31"/>		 
		&nbsp;<input type="button" name="Submit" value="ค้นหา" onclick="checkround()" /></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>

<?} ?>



<?function rpdialog_sale($sub,$fdate,$tdate,$sale){ 
	global $bills,$inv_code;
?>

<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>	
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>		 
 
	   <td align="center"> 
		<select name="sale" id="sale">
			<option value="" >บิลทั้งหมด </option>     
			<option value="A" <?if($_REQUEST['sale']=='A')echo "selected"; ?>>บิลที่ไม่ยกเลิก</option>
			<option value="1" <?if($_REQUEST['sale']=='1')echo "selected"; ?>>บิลที่ยกเลิก</option>
	   </select>	
	   <input type="submit" name="Submit" value="ค้นหา">
		&nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
	  </tr>
	  <tr <?if($_GET['sessiontab'] == 3 and $_GET['sub'] == 23){}else{echo "style='display:none'";}?> >
		<td colspan="7" align="center">
			<br><?//echo $_GET['sessiontab']."  ".$_GET['sub'];?>
			ค้นเลขบิลหลายบิล&nbsp;<input type="text"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหาระหว่างบิลคั่นด้วย '-' " style="width:80%;" value="<?=$bills;?>" >
		</td>
	</tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>

<?function rpdialog_sale_ea($sub,$fdate,$tdate,$sale,$inv){ 
	global $bills;
?>

<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>	
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>		 
 
	   <td align="center"> 
		<select name="sale" id="sale">
			<option value="" >บิลทั้งหมด </option>     
			<option value="A" <?if($_REQUEST['sale']=='A')echo "selected"; ?>>บิลที่ไม่ยกเลิก</option>
			<option value="1" <?if($_REQUEST['sale']=='1')echo "selected"; ?>>บิลที่ยกเลิก</option>
	   </select>	
		&nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
		
		<td align="right">สาขา</td>
		 <td><select size="1" name="inv" id="inv" tabindex="63">
 				 <option value="" <? if($inv=='')echo "selected"; ?> >กรุณาเลือก</option>
			 <?					
				$result1=mysql_query("select * from ali_invent ");
				for ($i=1;$i<=mysql_num_rows($result1);$i++){
					$row1 = mysql_fetch_object($result1);
					//echo "<option value=\"\" ";
					echo "<option value=\"".$row1->inv_code."\" ";
					 
					if ($inv==$row1->inv_code) {echo "selected";}
					echo ">".$row1->inv_desc."</option>";
				}
				?>
		 </select>
		 </td>
		 <td>
			<input type="submit" name="Submit" value="ค้นหา">
		 </td>
	  </tr>
	  <tr <?if($_GET['sessiontab'] == 3 and $_GET['sub'] == 23){}else{echo "style='display:none'";}?> >
		<td colspan="7" align="center">
			<br><?//echo $_GET['sessiontab']."  ".$_GET['sub'];?>
			ค้นเลขบิลหลายบิล&nbsp;<input type="text"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหาระหว่างบิลคั่นด้วย '-' " style="width:80%;" value="<?=$bills;?>" >
		</td>
	</tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>

<?function rpdialog_sale_list($sub,$fdate,$tdate,$sale,$s_list,$mcode){ 
global $inv,$arr_satype_show_bill,$type,$bills;
?>

<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="95%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>	
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>		 
		 
		 </td>
		<td align="right">สาขา</td>
		 <td><select size="1" name="inv" id="inv" tabindex="63">
 				 <option value="" <? if($inv=='')echo "selected"; ?> >กรุณาเลือก</option>
			 <?					
				$result1=mysql_query("select * from ali_invent ");
				for ($i=1;$i<=mysql_num_rows($result1);$i++){
					$row1 = mysql_fetch_object($result1);
					//echo "<option value=\"\" ";
					echo "<option value=\"".$row1->inv_code."\" ";
					 
					if ($inv==$row1->inv_code) {echo "selected";}
					echo ">".$row1->inv_desc."</option>";
				}
				?>
		 </select>
		 </td>
		  <td>ประเภทบิล 
 <select name="type" id="type">
            <option value="" >ทั้งหมด</option>    
            <?php foreach($arr_satype_show_bill as $key => $val){ ?>
                 <option value="<?=$key?>" <?if($type==$key)echo "selected"; ?>><?=$val?></option>
            <?}?> 
       </select>    
 </td>
		 <td align="right">จำนวนรายการ</td>
	      <td align="left"><select name="s_list" id="s_list">
	        <option value="500" <? if($s_list=='500'){echo 'selected';}?> >500</option>
	        <option value="1000" <? if($s_list=='1000'){echo 'selected';}?>>1000</option>
	        <option value="2000" <? if($s_list=='2000'){echo 'selected';}?>>2000</option>
	        <option value="5000" <? if($s_list=='5000'){echo 'selected';}?>>5000</option>
	        <option value="99999999999999" <? if($s_list==99999999999999){echo 'selected';}?>>ทั้งหมด</option>
          </select></td>
	   <td align="center"> 
		<select name="sale" id="sale">
			<option value="" >บิลทั้งหมด </option>     
			<option value="A" <?if($sale=='A')echo "selected"; ?>>บิลที่ไม่ยกเลิก</option>
			<option value="1" <?if($sale=='1')echo "selected"; ?>>บิลที่ยกเลิก</option>
	   </select>	
	   <input type="submit" name="Submit" value="ค้นหา">
		&nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
		
	  </tr>
	 <tr <?if(($_GET['sessiontab'] == 3) and $_GET['sub'] != 6 and $_GET['sub'] != 10){echo "style='display:none'";}?> >
		<td colspan="7" align="center">
			<br><?//echo $_GET['sessiontab']."  ".$_GET['sub'];?>
			ค้นเลขบิลหลายบิล&nbsp;<input type="text"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหาระหว่างบิลคั่นด้วย '-' " style="width:80%;" value="<?=$bills;?>" >
		</td>
	</tr>
	<tr><td colspan="6" align="center">&nbsp;</td></tr> 
	</table>
</form>
<?}?>

<?function rpdialog_sale_hold_list($sub,$fdate,$tdate,$sale,$s_list,$mcode){ 
global $inv,$arr_satype_show_bill,$sa_type,$type,$bills,$arr_satypeh1;
?>

<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="95%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>	
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>	</td>
		<td style="display:none" align="right">สาขา</td>
		 <td style="display:none"><select size="1" name="inv" id="inv" tabindex="63">
 				 <option value="" <? if($inv=='')echo "selected"; ?> >กรุณาเลือก</option>
			 <?					
				$result1=mysql_query("select * from ali_invent ");
				for ($i=1;$i<=mysql_num_rows($result1);$i++){
					$row1 = mysql_fetch_object($result1);
					//echo "<option value=\"\" ";
					echo "<option value=\"".$row1->inv_code."\" ";
					 
					if ($inv==$row1->inv_code) {echo "selected";}
					echo ">".$row1->inv_desc."</option>";
				}
				?>
		 </select>
		 </td>
		 <td align="right">จำนวนรายการ</td>
	      <td align="left"><select name="s_list" id="s_list">
	        <option value="500" <? if($s_list=='500'){echo 'selected';}?> >500</option>
	        <option value="1000" <? if($s_list=='1000'){echo 'selected';}?>>1000</option>
	        <option value="2000" <? if($s_list=='2000'){echo 'selected';}?>>2000</option>
	        <option value="5000" <? if($s_list=='5000'){echo 'selected';}?>>5000</option>
	        <option value="99999999999999" <? if($s_list==99999999999999){echo 'selected';}?>>ทั้งหมด</option>
          </select></td>

		  <td align="right">ชนิดบิล</td>
	      <td align="left">
		  <select size="1"  name="sa_type" id="sa_type" tabindex="63">
			  <option value="" <? if($sa_type=='')echo "selected"; ?> >ทั้งหมด</option>
			  <?php foreach($arr_satypeh1 as $key=> $val){?>
			  <option value="<?=$key?>" <? if($sa_type==$key)echo "selected"; ?> >
				<?=$val?>
			  </option>
			  <?}?>
			</select>
			</td>
	   <td align="left"> 
		<select name="sale" id="sale">
			<option value="" >บิลทั้งหมด </option>     
			<option value="A" <?if($sale=='A')echo "selected"; ?>>บิลที่ไม่ยกเลิก</option>
			<option value="1" <?if($sale=='1')echo "selected"; ?>>บิลที่ยกเลิก</option>
	   </select>	
	   <input type="submit" name="Submit" value="ค้นหา">
		&nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
		
	  </tr>
	 <tr <?if(($_GET['sessiontab'] == 3) and $_GET['sub'] != 6 and $_GET['sub'] != 10){echo "style='display:none'";}?> >
		<td colspan="7" align="center">
			<br><?//echo $_GET['sessiontab']."  ".$_GET['sub'];?>
			ค้นเลขบิลหลายบิล&nbsp;<input type="text"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหาระหว่างบิลคั่นด้วย '-' " style="width:80%;" value="<?=$bills;?>" >
		</td>
	</tr>
	<tr><td colspan="10" align="center">&nbsp;</td></tr> 
	</table>
</form>
<?}?>

<?function rpdialog_all($sub){ ?>

<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="strfdate" size="10" maxlength="10" value="<?=$_REQUEST['strfdate']?>"  placeholder="2015-10-01" />
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="strtdate" size="10" maxlength="10" value="<?=$_REQUEST['strtdate']?>" placeholder="2015-10-10" />		
		</td>
		<td align="right">รหัสสมาชิก&nbsp;</td>
		<td><input type="text" name="fmcode" id="fmcode" placeholder="TH0000001" value="<?=$_REQUEST['fmcode']?>" maxlength='9'/></td>
		
		<td>&nbsp;<input type="button" name="Submit" value="ค้นหา" onclick="checkround()" /></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>
<?function rpdialog_position($sub){ ?>
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="strfdate" size="10" maxlength="10" value="<?=$date = !empty($_REQUEST['strfdate']) ? $_REQUEST['strfdate'] : date('Y-m-d');?>"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="strtdate" size="10" maxlength="10" value="<?=$date = !empty($_REQUEST['strtdate']) ? $_REQUEST['strtdate'] : date('Y-m-d');?>"/>		
		</td>
		<td align="right">รหัสสมาชิก&nbsp;</td>
		<td><input type="text" name="fmcode" id="fmcode" placeholder="TH0000001" value="<?=$_REQUEST['fmcode']?>" maxlength='9'/></td>
		
		<td>&nbsp;
		 <td  align="right">การขึ้นตำแหน่ง</td>
			<td>&nbsp;<select name="type_report1"  id="type_report1" style="width:150px">
				   <option value="" <? if($_REQUEST['type_report1']==0)echo "selected"; ?> >ทั้งหมด</option>
				   <option value="2" <? if($_REQUEST['type_report1']==2)echo "selected"; ?> >ระบบ</option>
				   <option value="1" <? if($_REQUEST['type_report1']==1)echo "selected"; ?> >แต่งตั้ง</option>
				 
			</td>

		 <td  align="right">ตำแหน่ง</td>
			<td><input type="text" name="posi" id="posi" value="<?=$_REQUEST['posi']?>" />	</td>
		<td>&nbsp;<input type="button" name="Submit" value="ค้นหา" onclick="checkround()" /></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>

<?function rpdialog_position2($sub){ ?>
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="strfdate" size="10" maxlength="10" value="<?=$date = !empty($_REQUEST['strfdate']) ? $_REQUEST['strfdate'] : date('Y-m-d');?>"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="strtdate" size="10" maxlength="10" value="<?=$date = !empty($_REQUEST['strtdate']) ? $_REQUEST['strtdate'] : date('Y-m-d');?>"/>		
		</td>
		<td align="right">รหัสสมาชิก&nbsp;</td>
		<td><input type="text" name="fmcode" id="fmcode" placeholder="TH0000001" value="<?=$_REQUEST['fmcode']?>" maxlength='9'/></td>
		
		<td>&nbsp;
		 <td  align="right">การขึ้นตำแหน่ง</td>
			<td>&nbsp;<select name="type_report1"  id="type_report1" style="width:150px">
				   <option value="" <? if($_REQUEST['type_report1']==0)echo "selected"; ?> >ทั้งหมด</option>
				   <option value="2" <? if($_REQUEST['type_report1']==2)echo "selected"; ?> >ระบบ</option>
				   <option value="1" <? if($_REQUEST['type_report1']==1)echo "selected"; ?> >แต่งตั้ง</option>
				 
			</td>

		 <td  align="right">ตำแหน่ง</td>
			<td><!--<input type="text" name="posi" id="posi" value="<?=$_REQUEST['posi']?>" />	
			--><select name="posi"  id="posi" style="width:150px">
				   <option value="" <? if($_REQUEST['posi']=='')echo "selected"; ?> >ทั้งหมด</option>
				   <option value="4S" <? if($_REQUEST['posi']=="4S")echo "selected"; ?> >FOUR STAR</option>
				   <option value="5S" <? if($_REQUEST['posi']=="5S")echo "selected"; ?> >FIVE STAR</option>
				   <option value="SS" <? if($_REQUEST['posi']=="SS")echo "selected"; ?> >SILVER STAR </option>
				   <option value="GS" <? if($_REQUEST['posi']=="GS")echo "selected"; ?> >GOLD STAR </option>
				   <option value="JA" <? if($_REQUEST['posi']=="JA")echo "selected"; ?> >JADE</option>
				   <option value="PL" <? if($_REQUEST['posi']=="PL")echo "selected"; ?> >PEARL</option>
				   <option value="SP" <? if($_REQUEST['posi']=="SP")echo "selected"; ?> >Sapphire</option>
				   <option value="RB" <? if($_REQUEST['posi']=="RB")echo "selected"; ?> >RUBY EXCUTIVE</option>
				   <option value="EM" <? if($_REQUEST['posi']=="EM")echo "selected"; ?> >EMERALD  EXCUTIVE</option>
				   <option value="D" <? if($_REQUEST['posi']=="D")echo "selected"; ?> >DIAMOND  EXCUTIVE</option>
				   <option value="DD" <? if($_REQUEST['posi']=="DD")echo "selected"; ?> >DOUBLE DIAMOND  EXCUTIVE</option>
				   <option value="TD" <? if($_REQUEST['posi']=="TD")echo "selected"; ?> >TRIPLE DIAMOND  EXCUTIVE</option>
				 
			
			</td>
		<td>&nbsp;<input type="button" name="Submit" value="ค้นหา" onclick="checkround()" /></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>
<?function rpdialog_alls_pay($sub,$fdate,$tdate){ ?>
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$date = !empty($fdate) ? $fdate : date('Y-m-d');?>"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$date = !empty($tdate) ? $tdate : date('Y-m-d');?>"/>		
		</td>
		<td align="right">รหัสสมาชิก&nbsp;</td>
		<td><input type="text" name="fmcode" id="fmcode" placeholder="TH0000001" value="<?=$_REQUEST['fmcode']?>" maxlength='9'/></td>
	
		<td align="right">ช่วงรายได้</td>
		 <td><input type="text" name="bonus" id="bonus" value="<?=$_REQUEST['bonus']?>" placeholder="0-200" /></td>
	 <td  align="right">การจ่าย</td>
			<td>&nbsp;<select name="type_report1"  id="type_report1" style="width:150px">
				   <option value="" <? if($_REQUEST['type_report1']==0)echo "selected"; ?> >ทั้งหมด</option>
				   <option value="1" <? if($_REQUEST['type_report1']==1)echo "selected"; ?> >จ่าย</option>
				   <option value="2" <? if($_REQUEST['type_report1']==2)echo "selected"; ?> >ไม่จ่าย</option>
				 
			</td>
			
			<td>&nbsp;<input type="button" name="Submit" value="ค้นหา" onclick="checkround()" /></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>
<?function rpdialog_alls_pay_bank($sub,$fdate,$tdate)
{
	require("connectmysql.php"); 
	global $bankcode;
?>

<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$date = !empty($fdate) ? $fdate : date('Y-m-d');?>"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$date = !empty($tdate) ? $tdate : date('Y-m-d');?>"/>		
		</td>
		<td align="right">รหัสสมาชิก&nbsp;</td>
		<td><input type="text" name="fmcode" id="fmcode" placeholder="TH0000001" value="<?=$_REQUEST['fmcode']?>" maxlength='9'/></td>
		
	<td align="right">ธนาคาร</td>
     <td><select size="1" name="bankcode" id="bankcode" tabindex="63">
		 <option value="" <? if($bankcode=='')echo "selected"; ?> >ทั้งหมด</option>
         <?					
			$result1=mysql_query("select * from ali_bank order by bankname");
			for ($i=1;$i<=mysql_num_rows($result1);$i++){
				$row1 = mysql_fetch_object($result1);
				//echo "<option value=\"\" ";
				echo "<option value=\"".$row1->bankcode."\" ";
				if ($_REQUEST['bankcode']==$row1->bankcode) {echo "selected";}
				echo ">".$row1->bankname."</option>";
			}
			?>
     </select>
	 </td>
		<!--td align="right">ช่วงรายได้</td>
		 <td><input type="text" name="bonus" id="bonus" value="<?=$_REQUEST['bonus']?>" placeholder="0-200" /></td-->
	 <td  align="right">การจ่าย</td>
			<td>&nbsp;<select name="type_report1"  id="type_report1" style="width:150px">				   
				   <option value="" <? if($_REQUEST['type_report1']=='')echo "selected"; ?> >ทั้งหมด</option>
				   <option value="1" <? if($_REQUEST['type_report1']==1)echo "selected"; ?> >จ่าย</option>
				   <option value="2" <? if($_REQUEST['type_report1']==2)echo "selected"; ?> >ไม่จ่าย</option>
				 
			</td>			
			<td>&nbsp;<input type="button" name="Submit" value="ค้นหา" onclick="checkround()" /></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>

<?function rpdialog_alls($sub,$fdate,$tdate,$mcode){ ?>
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$_REQUEST['fdate']?>" placeholder="2015-10-01"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$_REQUEST['tdate']?>" placeholder="2015-10-31"/>		
		</td>
		<td align="right">รหัสสมาชิก&nbsp;</td>
		<td><input type="text" name="fmcode" id="fmcode" placeholder="TH0000001" value="<?=$mcode?>" maxlength='9'/></td>
		
		<td align="right" style="display:none">ช่วงรายได้</td>
		 <td style="display:none"><input type="text" name="bonus" id="bonus" value="" placeholder="0-200" /></td>
		<td>&nbsp;<input type="button" name="Submit" value="ค้นหา" onclick="checkround()" /></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>

<?function rpdialog_alls_ab($sub,$fdate,$tdate,$mcode,$bonus,$status,$s_list){ ?>
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$_REQUEST['fdate']?>" placeholder="2015-10-01"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$_REQUEST['tdate']?>" placeholder="2015-10-31"/>		
		</td>
		<td align="right">รหัสสมาชิก&nbsp;</td>
		<td><input type="text" name="fmcode" id="fmcode" placeholder="TH0000001" value="<?=$mcode?>" maxlength='9'/></td>
		
		<td align="right" >ช่วงรายได้ &nbsp;</td>
		 <td ><input type="text" name="bonus" id="bonus" value="<?=$bonus?>" placeholder="0-200" /></td>
		 
		 <td align="right" >สถานะ &nbsp;</td>
		 <td >
			<select name="status" id="status">
				<option value="" <? if($status==''){echo 'selected';}?> >ทั้งหมด</option>
				<option value="1" <? if($status=='1'){echo 'selected';}?> >ปกติ</option>
				<option value="SP" <? if($status=='SP'){echo 'selected';}?> >SP</option>
				<option value="TN" <? if($status=='TN'){echo 'selected';}?> >TN</option>
				<option value="ST" <? if($status=='ST'){echo 'selected';}?> >SP+TN</option>
			</select>
		 </td>
		 
	 <td align="right">จำนวนรายการ</td>
	  <td align="left"><select name="s_list" id="s_list">
		<option value="500" <? if($s_list=='500'){echo 'selected';}?> >500</option>
		<option value="1000" <? if($s_list=='1000'){echo 'selected';}?>>1000</option>
		<option value="2000" <? if($s_list=='2000'){echo 'selected';}?>>2000</option>
		<option value="5000" <? if($s_list=='5000'){echo 'selected';}?>>5000</option>
		<option value="99999999999999" <? if($s_list==99999999999999){echo 'selected';}?>>ทั้งหมด</option>
	  </select></td>
	  
		<td>&nbsp;<input type="button" name="Submit" value="ค้นหา" onclick="checkround()" /></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>

<?function rpdialog_sale_inv($sub,$fdate,$tdate,$sale,$s_list){
global $inv;	
?>
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>	
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>	
		
		<td align="right">สาขา</td>
		 <td><select size="1" name="inv" id="inv" tabindex="63">
 				 <option value="" <? if($inv=='')echo "selected"; ?> >กรุณาเลือก</option>
			 <?					
				$result1=mysql_query("select * from ali_invent ");
				for ($i=1;$i<=mysql_num_rows($result1);$i++){
					$row1 = mysql_fetch_object($result1);
					//echo "<option value=\"\" ";
					echo "<option value=\"".$row1->inv_code."\" ";
					 
					if ($inv==$row1->inv_code) {echo "selected";}
					echo ">".$row1->inv_desc."(".$row1->inv_code.")</option>";
				}
				?>
		 </select>
		 </td>


		 <td align="right">จำนวนรายการ</td>
	      <td align="left"><select name="s_list" id="s_list">
	        <option value="500" <? if($s_list=='500'){echo 'selected';}?> >500</option>
	        <option value="1000" <? if($s_list=='1000'){echo 'selected';}?>>1000</option>
	        <option value="2000" <? if($s_list=='2000'){echo 'selected';}?>>2000</option>
	        <option value="5000" <? if($s_list=='5000'){echo 'selected';}?>>5000</option>
	        <option value="99999999999999" <? if($s_list==99999999999999){echo 'selected';}?>>ทั้งหมด</option>
          </select></td>
	   <td align="center"> 
		<select name="sale" id="sale">
			<option value="" >บิลทั้งหมด </option>     
			<option value="A" <?if($sale=='A')echo "selected"; ?>>บิลที่ไม่ยกเลิก</option>
			<option value="1" <?if($sale=='1')echo "selected"; ?>>บิลที่ยกเลิก</option>
	   </select>	
	   <input type="submit" name="Submit" onclick="checkround_inv()" value="ค้นหา">
		&nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
		<?if($inv!=''){?>
			<h3>รายงานสาขา  <?php echo $inv;?> </h3> 
		<?}?>

<?}?>


<?function rpdialog_sale_amount($sub,$fdate,$tdate,$sale,$s_list){
global $inv,$arr_sspv,$sspv;	
?>
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>	
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>	
		
		<td align="right">สาขา</td>
		 <td><select size="1" name="inv" id="inv" tabindex="63">
 				 <option value="" <? if($inv=='')echo "selected"; ?> >ทั้งหมด</option>
			 <?					
				$result1=mysql_query("select * from ali_invent ");
				for ($i=1;$i<=mysql_num_rows($result1);$i++){
					$row1 = mysql_fetch_object($result1);
					//echo "<option value=\"\" ";
					echo "<option value=\"".$row1->inv_code."\" ";
					 
					if ($inv==$row1->inv_code) {echo "selected";}
					echo ">".$row1->inv_desc."</option>";
				}
				?>
		 </select>
		 </td>
		<td>
		        &#3594;&#3656;&#3629;&#3591;&#3607;&#3634;&#3591;
        <select name="sspv">
			   <?php	
		foreach($arr_sspv as $key => $value):			
		echo '<option value="'.$key.'"';
				if($sspv==$key)echo "selected";
		echo'>'.$value.'</option>'; //close your tags!!
		endforeach;
		?>
        </select>

		</td>

		 <td align="right">จำนวนรายการ</td>
	      <td align="left"><select name="s_list" id="s_list">
	        <option value="500" <? if($s_list=='500'){echo 'selected';}?> >500</option>
	        <option value="1000" <? if($s_list=='1000'){echo 'selected';}?>>1000</option>
	        <option value="2000" <? if($s_list=='2000'){echo 'selected';}?>>2000</option>
	        <option value="5000" <? if($s_list=='5000'){echo 'selected';}?>>5000</option>
	        <option value="99999999999999" <? if($s_list==99999999999999){echo 'selected';}?>>ทั้งหมด</option>
          </select></td>
	   <td align="center"> 
	   <input type="submit" name="Submit" onclick="checkround()" value="ค้นหา">
		&nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
		<?if($inv!=''){?>
			<h3>รายงานสาขา  <?php echo $inv;?> </h3> 
		<?}?>

<?}?>

<?


////////////////////////////////////////////// function report sale zone 
function rpdialog_sale_zone($sub,$fdate,$tdate,$sale,$s_list){
global $inv;	

?>
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>	
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>	
		
		<td align="right">สาขา</td>
		 <td><select size="1" name="inv" id="inv" tabindex="63">
 				 <option value="" <? if($inv=='')echo "selected"; ?> >กรุณาเลือก</option>
			 <?					
				$result1=mysql_query("select * from ali_invent ");
				for ($i=1;$i<=mysql_num_rows($result1);$i++){
					$row1 = mysql_fetch_object($result1);
					//echo "<option value=\"\" ";
					echo "<option value=\"".$row1->inv_code."\" ";
					 
					if ($inv==$row1->inv_code) {echo "selected";}
					echo ">".$row1->inv_desc."(".$row1->inv_code.")</option>";
				}
				?>
		 </select>
		 </td>


		 <td align="right">จำนวนรายการ</td>
	      <td align="left"><select name="s_list" id="s_list">
	        <option value="500" <? if($s_list=='500'){echo 'selected';}?> >500</option>
	        <option value="1000" <? if($s_list=='1000'){echo 'selected';}?>>1000</option>
	        <option value="2000" <? if($s_list=='2000'){echo 'selected';}?>>2000</option>
	        <option value="5000" <? if($s_list=='5000'){echo 'selected';}?>>5000</option>
	        <option value="99999999999999" <? if($s_list==99999999999999){echo 'selected';}?>>ทั้งหมด</option>
          </select></td>
	   <td align="center"> 
		<select name="sale" id="sale">
			<option value="" >บิลทั้งหมด </option>     
			<option value="A" <?if($sale=='A')echo "selected"; ?>>มีPV</option>
			<option value="1" <?if($sale=='1')echo "selected"; ?>>ไม่มีPV</option>
	   </select>	
	   <input type="submit" name="Submit" onclick="checkround_inv()" value="ค้นหา">
		&nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
		<?if($inv!=''){?>
			<h3>รายงานสาขา  <?php echo $inv;?> </h3> 
		<?}?>

<?}?>
<?function rpdialog_sale_xx($sub,$fdate,$tdate,$sale,$s_list){
?>
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>	
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>	
		
		<td align="right">รหัสสินค้า</td>
		<td><input type="text" size="10" maxlength="10" name="pcode" value="<?=$_REQUEST['pcode']?>" ></td>
		
		<td align="right">สาขา</td>
		 <td><select size="1" name="inv" id="inv" tabindex="63">
 			<option value="" >ทั้งหมด</option>
 			<option value="HQ" >HeadOffice(HQ)</option>
			<?					
				$result1=mysql_query("select * from ali_invent ");
				for ($i=1;$i<=mysql_num_rows($result1);$i++){
					$row1 = mysql_fetch_object($result1);
					//echo "<option value=\"\" ";
					echo "<option value=\"".$row1->inv_code."\" ";
					if ($_REQUEST['inv']==$row1->inv_code) {echo "selected";}
					echo ">".$row1->inv_desc."(".$row1->inv_code.")</option>";
				}
			?>
		 </select>
		 </td>


		 <td align="right">จำนวนรายการ</td>
	      <td align="left"><select name="s_list" id="s_list">
	        <option value="500" <? if($s_list=='500'){echo 'selected';}?> >500</option>
	        <option value="1000" <? if($s_list=='1000'){echo 'selected';}?>>1000</option>
	        <option value="2000" <? if($s_list=='2000'){echo 'selected';}?>>2000</option>
	        <option value="5000" <? if($s_list=='5000'){echo 'selected';}?>>5000</option>
	        <option value="99999999999999" <? if($s_list==99999999999999){echo 'selected';}?>>ทั้งหมด</option>
          </select></td>
	   <td align="center" > 
	   <input type="submit" name="Submit" onclick="checkround_inv()" value="ค้นหา">
		&nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>

<?function rpdialog_package_amount($sub,$fdate,$tdate,$sale,$s_list){
global $inv,$pcode;	
?>
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>	
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>	
		
		<td align="right">สาขา</td>
		 <td><select size="1" name="inv" id="inv" tabindex="63">
 				 <option value="" <? if($inv=='')echo "selected"; ?> >กรุณาเลือก</option>
			 <?					
				$result1=mysql_query("select * from ali_invent ");
				for ($i=1;$i<=mysql_num_rows($result1);$i++){
					$row1 = mysql_fetch_object($result1);
					//echo "<option value=\"\" ";
					echo "<option value=\"".$row1->inv_code."\" ";
					 
					if ($inv==$row1->inv_code) {echo "selected";}
					echo ">".$row1->inv_desc."(".$row1->inv_code.")</option>";
				}
				?>
		 </select>
		 </td>
		<td align="right">รหัสแพคเก็จ&nbsp;</td>
        <td><input type="text" name="pcode" id="pcode" placeholder="" value="<?=$pcode?>" /></td>

		 <td align="right">จำนวนรายการ</td>
	      <td align="left"><select name="s_list" id="s_list">
	        <option value="500" <? if($s_list=='500'){echo 'selected';}?> >500</option>
	        <option value="1000" <? if($s_list=='1000'){echo 'selected';}?>>1000</option>
	        <option value="2000" <? if($s_list=='2000'){echo 'selected';}?>>2000</option>
	        <option value="5000" <? if($s_list=='5000'){echo 'selected';}?>>5000</option>
	        <option value="99999999999999" <? if($s_list==99999999999999){echo 'selected';}?>>ทั้งหมด</option>
          </select></td>
	   <td align="center"> 
	   <input type="submit" name="Submit" onclick="checkround()" value="ค้นหา">
		&nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
		<?if($inv!=''){?>
			<h3>รายงานสาขา  <?php echo $inv;?> </h3> 
		<?}?>

<?}?>

<?function rpdialog_amount_lb($sub,$fdate,$tdate,$s_list=''){ 
    global $bills,$location_base,$sano,$pcode,$mpcode,$inv,$bank,$sa_type,$logistic,$currency,$sregister,$arr_satype,$arr_logistic,$arr_sregister,$arr_sspv,$uid,$option,$text_op,$sspv,$pv;
     
?>
<!-------------------------------------->
<div class="">
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>"> 
<br/>
		<table class="tg" style="border-color:#bebebe;" width="60%" align="center" > 
			<tr>
				<th align="right" nowrap>วันที่ ตั้งแต่</th>
				<th align="left"><input type="text" id="dateInput1" onKeyPress="return chknum(window.event.keyCode)" style="width:120px" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/></th>
				<th align="right" >&#3606;&#3638;&#3591;</th>
				<th align="left" ><input style="width:120px" type="text" id="dateInput2" onKeyPress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/></th>
				<th align="right" nowrap >รหัสสมาชิก</th>
				<th align="left" ><input type="text" name="mpcode" id="mpcode" placeholder="TH0000001" value="<?=$mpcode?>" maxlength='9'/></th>
				<th align="right" nowrap>ประเภทบิล</th>
				<th align="left" >
					<select size="1" style="width:150px" name="sa_type" id="sa_type" tabindex="63">
					  <option value="" <? if($sa_type=='')echo "selected"; ?> >ทั้งหมด</option>
					  <?php foreach($arr_satype as $key=> $val){?>
					  <option value="<?=$key?>" <? if($sa_type==$key)echo "selected"; ?> >
						<?=$val?>
					  </option>
					  <?}?>
					</select>
				</th>
			</tr>
			<tr>
				<th align="right"  nowrap>&#3585;&#3634;&#3619;&#3592;&#3633;&#3604;&#3626;&#3656;&#3591;</th>
				<th align="left" >
					<select name="logistic" style="width:150px" >
						<option  value="" <?=($logistic==""?"selected":"")?>>&#3585;&#3634;&#3619;&#3592;&#3633;&#3604;&#3626;&#3656;&#3591;&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</option>
						<?php        
							foreach($arr_logistic as $key => $value):            
								echo '<option value="'.$key.'"';
										if($logistic==$key)echo "selected";
								echo'>'.$value.'</option>'; //close your tags!!
							endforeach;
						?>
					</select>
				</th>
				<th align="right" >&#3626;&#3634;&#3586;&#3634;</th>
				<th align="left" >
					<select size="1" style="width:150px" name="inv" id="inv" tabindex="63">
						<option value="" <? if($inv=='')echo "selected"; ?> >ทั้งหมด</option>
						<?                    
							$result1=mysql_query("select * from ali_invent ");
							for ($i=1;$i<=mysql_num_rows($result1);$i++){
								$row1 = mysql_fetch_object($result1);
								//echo "<option value=\"\" ";
								echo "<option value=\"".$row1->inv_code."\" ";
								 
								if ($inv==$row1->inv_code) {echo "selected";}
								echo ">".$row1->inv_desc."</option>";
							}
						?>
					 <!--option value="online" <? if($inv=='online')echo "selected"; ?> >Online</option--> 
					</select> 
				</th>
				<th align="right" nowrap >ประเภท</th>
				<th align="left" >
					<select name="sregister" style="width:150px">
						<option   value="" <?=($sregister==""?"selected":"")?>>&#3611;&#3619;&#3632;&#3648;&#3616;&#3607;&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</option>
						<?php        
							foreach($arr_sregister as $key => $value):            
								echo '<option value="'.$key.'"';
									if($sregister==$key)echo "selected";
								echo'>'.$value.'</option>'; //close your tags!!
							endforeach;
						?>
					</select>
				</th>
				<th align="right" >&#3612;&#3641;&#3657;&#3610;&#3633;&#3609;&#3607;&#3638;&#3585;</th>
				<th align="left" >
					<select size="1" style="width:150px" name="uid" id="uid" tabindex="63">
						<option value="" <? if($uid=='')echo "selected"; ?> >&#3585;&#3619;&#3640;&#3603;&#3634;&#3648;&#3621;&#3639;&#3629;&#3585;</option>
						<?                    
							$result1=mysql_query("select * from ali_user WHERE usertype = '2' ");
							for ($i=1;$i<=mysql_num_rows($result1);$i++){
								$row1 = mysql_fetch_object($result1);
								//echo "<option value=\"\" ";
								echo "<option value=\"".$row1->usercode."\" ";
								 
								if ($uid==$row1->usercode) {echo "selected";}
							   // echo ">".$row1->usercode."(".$row1->username.")</option>";
								echo ">".$row1->usercode."</option>";
							}
						?>
					</select>
				</th>
			</tr>
			<tr>
			<?if(($_GET['sessiontab'] == 3) and $_GET['sub'] == 8 ){?> 
					<th align="right" nowrap >ยอดขาย</th>
					<th align="left" ><input type='text' id='total_x' name='total_x' value='<?=$total_x?>' placeholder="0-100" ></th>
					<th align="right" >PV</th>
					<th align="left" ><input type='text' id='pv' name='pv' value='<?=$pv?>' placeholder="0-100" ></th>
			<?}
			  else{?>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
			<?}?> 
				<?if(($_GET['sessiontab'] == 3) and $_GET['sub'] == 8 ){?> 
					<th align="right" nowrap>เลขที่บิล</th>
					<th colspan='1' align="left"><input type="text" style="width:150px"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหาระหว่างบิลคั่นด้วย '-' " style="width:80%;" value="<?=$bills;?>" >
					</th>
				<?}
				else{?>
					<th></th>
					<th></th>
					<th></th>
				<?}?>
			 <th align="right">จำนวนรายการ</th>
			  <th align="left"><select name="s_list" id="s_list" size="1" style="width:150px" >
				<option value="500" <? if($s_list=='500'){echo 'selected';}?> >500</option>
				<option value="1000" <? if($s_list=='1000'){echo 'selected';}?>>1000</option>
				<option value="2000" <? if($s_list=='2000'){echo 'selected';}?>>2000</option>
				<option value="5000" <? if($s_list=='5000'){echo 'selected';}?>>5000</option>
				<option value="99999999999999" <? if($s_list==99999999999999){echo 'selected';}?>>ทั้งหมด</option>
			  </select></th>
			</tr>
			<tr>
			<th > </th>
				<th colspan='7' align=center ><input type="Submit" name="Submit" value="ค้นหา"  onClick="checkround()" /></th>
			</tr>
		</table>

<!--------------------------------------->
</form>   
</div>
<?}?>

<?function rpdialog_amount_lb1($sub,$fdate,$tdate){ 
    global $_SESSION,$location_base,$sano,$pcode,$mpcode,$inv,$bank,$sa_type,$logistic,$currency,$sregister,$arr_satype,$arr_logistic,$arr_sregister,$uid,$bills,$inv_code;
	
	include("../function/global_center.php");
	$dbprefix = 'ali_';
?>
<div class="">
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>"> 
        <table  width="1100" border="0" align="center">
    <tr valign="top">
      <td width="1000" align="left" ><fieldset>
        &#3623;&#3633;&#3609;&#3607;&#3637;&#3656;
        <input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
        &nbsp;
        ถึง
        &nbsp;
         <input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>   
			   
		&#3612;&#3641;&#3657;&#3610;&#3633;&#3609;&#3607;&#3638;&#3585;
		<select name="struid" id="struid"  >
          <option value="">&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</option>
          <?	$struid = $_POST['struid']; 				
			$result1=mysql_query("select * from ".$dbprefix."user where usertype = 2 order by usercode");

			for ($i=1;$i<=mysql_num_rows($result1);$i++){
				$row1 = mysql_fetch_object($result1);
				//echo "<option value=\"\" ";
				echo "<option value=\"".$row1->usercode."\" ";
				if ($struid==$row1->usercode) {echo "selected";}
				echo ">".$row1->usercode."</option>";
			}
			?>
        </select>
        &#3594;&#3656;&#3629;&#3591;&#3607;&#3634;&#3591;
        <select name="sspv">
			   <?php	$sspv = $_POST['sspv'];	
		foreach($arr_sspv as $key => $value):			
		echo '<option value="'.$key.'"';
				if($sspv==$key)echo "selected";
		echo'>'.$value.'</option>'; //close your tags!!
		endforeach;
		?>
        </select>
        &#3626;&#3634;&#3586;&#3634;
        <select name="inv_code" id="inv_code"  >
         <option value="" <? if($inv_code=='')echo "selected"; ?> >&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</option>
          <?			
			$result1=mysql_query("select * from ".$dbprefix."invent order by inv_code");

			for ($i=1;$i<=mysql_num_rows($result1);$i++){
				$row1 = mysql_fetch_object($result1);
				//echo "<option value=\"\" ";
				echo "<option value=\"".$row1->inv_code."\" ";
				if ($inv_code==$row1->inv_code) {echo "selected";}
				echo ">".$row1->inv_desc."</option>";
			}
			?>
        </select>
		<select size="1"  name="locationbase" id="locationbase" tabindex="10">
       <option  value="" <?=($locationbase==""?"selected":"")?>>ALL LB</option>
         <?					
						$result1=mysql_query("select * from ".$dbprefix."location_base order by cid");
						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->cid."\" ";
							if(!empty($locationbase)){
								if ($locationbase==$row1->cid) {echo "selected";}
							}
							echo ">".$row1->cname."</option>";
						}
						?>
      </select>
        <input name="submit" type="submit" value="ค้นหา" />
      </fieldset></td>
    </tr>
  </table>
  <br/>
</form> 
</div>
<?}?>


<?


$sale = $_REQUEST['sale']==""?$_GET['sale']:$_REQUEST['sale'];
$fdate = $_REQUEST['fdate']==""?$_GET['fdate']:$_REQUEST['fdate'];
$tdate = $_REQUEST['tdate']==""?$_GET['tdate']:$_REQUEST['tdate'];
$skey = $_REQUEST['skey']==""?$_GET['skey']:$_REQUEST['skey'];
$scause = $_REQUEST['scause']==""?$_GET['scause']:$_REQUEST['scause'];
$inv = $_REQUEST['inv'];
$fmcode = $_REQUEST['fmcode']==""?$_GET['fmcode']:$_REQUEST['fmcode'];
$text_op = $_REQUEST['text_op']==""?$_GET['text_op']:$_REQUEST['text_op'];
$option = $_REQUEST['option']==""?$_GET['option']:$_REQUEST['option'];
$type = $_REQUEST['type']==""?$_GET['type']:$_REQUEST['type'];
$sspv = $_REQUEST['sspv']==""?$_GET['type']:$_REQUEST['sspv'];

$location_base = $_REQUEST['location_base']==""?$_GET['location_base']:$_REQUEST['location_base']; 
$currency = $_REQUEST['currency']==""?$_GET['currency']:$_REQUEST['currency']; 
$pcode = $_REQUEST['pcodex']==""?$_GET['pcodex']:$_REQUEST['pcodex']; 
$mpcode = $_REQUEST['mpcode']==""?$_GET['mpcode']:$_REQUEST['mpcode']; 
$bank = $_REQUEST['bank']==""?$_GET['bank']:$_REQUEST['bank']; 
$sa_type = $_REQUEST['sa_type']==""?$_GET['sa_type']:$_REQUEST['sa_type']; 
$logistic = $_REQUEST['logistic']==""?$_GET['logistic']:$_REQUEST['logistic']; 
$currency = $_REQUEST['currency']==""?$_GET['currency']:$_REQUEST['currency']; 
$sregister = $_REQUEST['sregister']==""?$_GET['sregister']:$_REQUEST['sregister']; 
$sano = $_REQUEST['sano']==""?$_GET['sano']:$_REQUEST['sano']; 
$uid = $_REQUEST['uid']==""?$_GET['uid']:$_REQUEST['uid']; 
$sspv = $_REQUEST['sspv']==""?$_GET['sspv']:$_REQUEST['sspv']; 
$struid = $_REQUEST['struid']==""?$_GET['struid']:$_REQUEST['struid']; 
$inv_code = $_REQUEST['inv_code']; 
$struid = $_REQUEST['struid']==""?$_GET['struid']:$_REQUEST['struid']; 
  
if(empty($fdate))$fdate = date("Y-m-d");
if(empty($tdate))$tdate = date("Y-m-d");

?>