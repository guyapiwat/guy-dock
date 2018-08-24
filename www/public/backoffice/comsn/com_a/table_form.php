<table width="70%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
   <tr>
 <td align="right">วันที่
      <input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="strfdate" size="10" maxlength="10" value="<?=$_POST['strfdate']?>" placeholder="2014-01-20"/>
 ถึง &nbsp;<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="strtdate" size="10" maxlength="10" value="<?=$_POST['strtdate']?>" placeholder="2014-01-31"/>
&nbsp;
</td>

    <td  align="right">รหัสสมาชิก&nbsp;&nbsp;</td>
    <td >
    
	  <td ><input type="text" name="fmcode" id="fmcode" placeholder="0000001" value="<?=$_POST['fmcode']?>" /></td>
	 <td  align="right">VIP</td>
    <td ><select name="vip"  id="vip">
	       <option value="" <? if($_POST['vip']=="")echo "selected"; ?> >ทั้งหมด</option>
		   <option value="1" <? if($_POST['vip']==1)echo "selected"; ?> >VIP</option>
	</td>
	 <td ><input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /></td>
  </tr>

  <tr align="center">
    <td colspan="2">&nbsp;</td>
    </tr>
 
</table>