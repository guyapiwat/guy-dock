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
        &nbsp;<input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /></td>
      </tr>
     <tr><td colspan="6" align="center">&nbsp;</td></tr>
    </table>
</form>

<?} ?>

 <?function rpdialog_sale_amount($sub,$fdate,$tdate,$sale,$s_list){
global $inv,$arr_sspv,$sspv,$_SESSION;	
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
		</td>

		<td align="right">สาขา</td>
		 <td><select size="1" name="inv" id="inv" tabindex="63">
			 <?					
				$result1=mysql_query("select * from ali_invent where inv_code = '".$_SESSION["admininvent"]."' ");
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
	        <option value="50" <? if($s_list=='50'){echo 'selected';}?> >50</option>
	        <option value="100" <? if($s_list=='100'){echo 'selected';}?>>100</option>
	        <option value="200" <? if($s_list=='200'){echo 'selected';}?>>200</option>
	        <option value="300" <? if($s_list=='300'){echo 'selected';}?>>300</option>
	        <option value="400" <? if($s_list=='400'){echo 'selected';}?>>400</option>
	        <option value="500" <? if($s_list=='500'){echo 'selected';}?>>500</option>
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


<?function rpdialog_sale_list($sub,$fdate,$tdate,$sale,$s_list){ ?>

<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
     <table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
      <tr><td colspan="6" align="center">&nbsp;</td></tr> 
      <tr>    
       <td align="center">วันที่
        <input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
        &nbsp;&nbsp;
        ถึง
        &nbsp;&nbsp;
        <input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>         
         <td align="right">จำนวนรายการ</td>
          <td align="left"><select name="s_list" id="s_list">
            <option value="50" <? if($s_list=='50'){echo 'selected';}?> >50</option>
            <option value="100" <? if($s_list=='100'){echo 'selected';}?>>100</option>
            <option value="200" <? if($s_list=='200'){echo 'selected';}?>>200</option>
            <option value="300" <? if($s_list=='300'){echo 'selected';}?>>300</option>
            <option value="400" <? if($s_list=='400'){echo 'selected';}?>>400</option>
            <option value="500" <? if($s_list=='500'){echo 'selected';}?>>500</option>
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
     <tr><td colspan="6" align="center">&nbsp;</td></tr>
    </table>
</form>
<?}?>

<?function rpdialog_sale_branch($sub,$fdate,$tdate,$sale,$type){
 global $_SESSION,$location_base,$sano,$pcode,$mpcode,$inv,$bank,$sa_type,$logistic,$currency,$sregister,$arr_satype,$arr_logistic,$arr_sregister,$uid,$bills;
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
                    echo ">".$row1->inv_desc."</option>";
                }
                ?>
         </select>
         </td>
 <td>ประเภทบิล
	 <select size="1" name="type" id="type" tabindex="63">
                        <option value="" <? if($type=='')echo "selected"; ?> >ทั้งหมด</option>
                        <?php foreach($arr_satype as $key=> $val){?>
                           <option value="<?=$key?>" <? if($type==$key)echo "selected"; ?> ><?=$val?></option> 
                        <?}?>
                     </select>   
 </td>
 
       <td align="center"> 
        <select name="sale" id="sale">
            <option value="" >บิลทั้งหมด </option>     
            <option value="A" <?if($_REQUEST['sale']=='A')echo "selected"; ?>>บิลที่ไม่ยกเลิก</option>
            <option value="1" <?if($_REQUEST['sale']=='1')echo "selected"; ?>>บิลที่ยกเลิก</option>
       </select>    
       <input type="submit" name="Submit" value="ค้นหา">
        &nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
      </tr>
	  <tr <?if(($_GET['sessiontab'] == 3) and $_GET['sub'] != 139 and $_GET['sub'] != 147){echo "style='display:none'";}?> >
		<td colspan="7" align="center">
			<br><?//echo $_GET['sessiontab']."  ".$_GET['sub'];?>
			ค้นเลขบิลหลายบิล&nbsp;<input type="text"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหาระหว่างบิลคั่นด้วย '-' " style="width:80%;" value="<?=$bills;?>" >
		</td>
	</tr>
     <tr><td colspan="6" align="center">&nbsp;</td></tr>
    </table>
</form>
<?}?>

<?function rpdialog_sale_branch1($sub,$fdate,$tdate,$sale,$type,$xinv_code){
 global $_SESSION,$location_base,$sano,$pcode,$mpcode,$inv,$bank,$sa_type,$logistic,$currency,$sregister,$arr_satype,$arr_logistic,$arr_sregister,$uid,$bills;
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
                  <option value="" <? if($inv=='')echo "selected"; ?> 
             <?                    
                $result1=mysql_query("select * from ali_invent where inv_code = '$xinv_code' ");
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
	 <select size="1" name="type" id="type" tabindex="63">
                        <option value="" <? if($type=='')echo "selected"; ?> >ทั้งหมด</option>
                        <?php foreach($arr_satype as $key=> $val){?>
                           <option value="<?=$key?>" <? if($type==$key)echo "selected"; ?> ><?=$val?></option> 
                        <?}?>
                     </select>   
 </td>
 
       <td align="center"> 
        <select name="sale" id="sale">
            <option value="" >บิลทั้งหมด </option>     
            <option value="A" <?if($_REQUEST['sale']=='A')echo "selected"; ?>>บิลที่ไม่ยกเลิก</option>
            <option value="1" <?if($_REQUEST['sale']=='1')echo "selected"; ?>>บิลที่ยกเลิก</option>
       </select>    
       <input type="submit" name="Submit" value="ค้นหา">
        &nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
      </tr>
	  <tr <?if(($_GET['sessiontab'] == 3) and $_GET['sub'] != 139 and $_GET['sub'] != 147){echo "style='display:none'";}?> >
		<td colspan="7" align="center">
			<br><?//echo $_GET['sessiontab']."  ".$_GET['sub'];?>
			ค้นเลขบิลหลายบิล&nbsp;<input type="text"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหาระหว่างบิลคั่นด้วย '-' " style="width:80%;" value="<?=$bills;?>" >
		</td>
	</tr>
     <tr><td colspan="6" align="center">&nbsp;</td></tr>
    </table>
</form>
<?}?>

<?function rpdialog_sale_ewallet_approve($sub,$fdate,$tdate,$sale){
global $inv,$bills;
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
	   <tr <?if(($_GET['sessiontab'] == 3 and $_GET['sub'] == 10) or ($_GET['sessiontab'] == 6 and ($_GET['sub'] == 146 or $_GET['sub'] == 148 or $_GET['sub'] == 202))){}else{echo "style='display:none'";}?> >
		<td colspan="7" align="center">
			<br><?//echo $_GET['sessiontab']."  ".$_GET['sub'];?>
			ค้นเลขบิลหลายบิล&nbsp;<input type="text"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหาระหว่างบิลคั่นด้วย '-' " style="width:80%;" value="<?=$bills;?>" >
		</td>
	</tr>
     <tr><td colspan="6" align="center">&nbsp;</td></tr>
    </table>
</form>
<?}?>
<?function rpdialog_sale_ewallet_online($sub,$fdate,$tdate,$sale){
global $inv,$bills;
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
	   <tr <?if(($_GET['sessiontab'] == 3 and $_GET['sub'] == 10) or ($_GET['sessiontab'] == 6 and ($_GET['sub'] == 146 or $_GET['sub'] == 148 or $_GET['sub'] == 202))){}else{echo "style='display:none'";}?> >
		<td colspan="7" align="center">
			<br><?//echo $_GET['sessiontab']."  ".$_GET['sub'];?>
			ค้นเลขบิลหลายบิล&nbsp;<input type="text"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหาระหว่างบิลคั่นด้วย '-' " style="width:80%;" value="<?=$bills;?>" >
		</td>
	</tr>
     <tr><td colspan="6" align="center">&nbsp;</td></tr>
    </table>
</form>
<?}?>
<?function rpdialog_sale($sub,$fdate,$tdate,$sale,$inv=""){
global $inv,$bills;
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
 
         <td align="right">สาขา</td>
         <td><select size="1" name="inv_code" id="inv_code" tabindex="63">
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
 
 
       <td align="center"> 
        <select name="sale" id="sale">
            <option value="" >บิลทั้งหมด </option>     
            <option value="A" <?if($_REQUEST['sale']=='A')echo "selected"; ?>>บิลที่ไม่ยกเลิก</option>
            <option value="1" <?if($_REQUEST['sale']=='1')echo "selected"; ?>>บิลที่ยกเลิก</option>
       </select>    
       <input type="submit" name="Submit" value="ค้นหา">
        &nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
      </tr>
	   <tr <?if(($_GET['sessiontab'] == 4 and $_GET['sub'] == 17) or ($_GET['sessiontab'] == 3 and $_GET['sub'] == 10) or ($_GET['sessiontab'] == 6 and ($_GET['sub'] == 146 or $_GET['sub'] == 148 or $_GET['sub'] == 202))){}else{echo "style='display:none'";}?> >
		<td colspan="7" align="center">
			<br><?//echo $_GET['sessiontab']."  ".$_GET['sub'];?>
			ค้นเลขบิลหลายบิล&nbsp;<input type="text"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหาระหว่างบิลคั่นด้วย '-' " style="width:80%;" value="<?=$bills;?>" >
		</td>
	</tr>
     <tr><td colspan="6" align="center">&nbsp;</td></tr>
    </table>
</form>
<?}?>

<?function rpdialog_sale_ewallet($sub,$fdate,$tdate,$sale,$xinv_code){
global $inv,$bills;
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
 
         <td align="right">สาขา</td>
         <td><select size="1" name="inv" id="inv" tabindex="63">
             <?                    
                $result1=mysql_query("select * from ali_invent where inv_code= '$xinv_code' ");
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
 
 
       <td align="center"> 
        <select name="sale" id="sale">
            <option value="" >บิลทั้งหมด </option>     
            <option value="A" <?if($_REQUEST['sale']=='A')echo "selected"; ?>>บิลที่ไม่ยกเลิก</option>
            <option value="1" <?if($_REQUEST['sale']=='1')echo "selected"; ?>>บิลที่ยกเลิก</option>
       </select>    
       <input type="submit" name="Submit" value="ค้นหา">
        &nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
      </tr>
	   <tr <?if(($_GET['sessiontab'] == 4 and $_GET['sub'] == 17) or ($_GET['sessiontab'] == 3 and $_GET['sub'] == 10) or ($_GET['sessiontab'] == 6 and ($_GET['sub'] == 146 or $_GET['sub'] == 148 or $_GET['sub'] == 202))){}else{echo "style='display:none'";}?> >
		<td colspan="7" align="center">
			<br><?//echo $_GET['sessiontab']."  ".$_GET['sub'];?>
			ค้นเลขบิลหลายบิล&nbsp;<input type="text"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหาระหว่างบิลคั่นด้วย '-' " style="width:80%;" value="<?=$bills;?>" >
		</td>
	</tr>
     <tr><td colspan="6" align="center">&nbsp;</td></tr>
    </table>
</form>
<?}?>
<?function rpdialog_sale_hold($sub,$fdate,$tdate,$sale){
global $inv,$arr_satype_show_bill,$sa_type,$type,$bills,$arr_satypeh1;
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
 
 
       <td align="center"> 
        <select name="sale" id="sale">
            <option value="" >บิลทั้งหมด </option>     
            <option value="A" <?if($_REQUEST['sale']=='A')echo "selected"; ?>>บิลที่ไม่ยกเลิก</option>
            <option value="1" <?if($_REQUEST['sale']=='1')echo "selected"; ?>>บิลที่ยกเลิก</option>
       </select>    
       <input type="submit" name="Submit" value="ค้นหา">
        &nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
      </tr>
	   <tr <?if(($_GET['sessiontab'] == 3 and $_GET['sub'] == 10) or ($_GET['sessiontab'] == 6 and ($_GET['sub'] == 146 or $_GET['sub'] == 148))){}else{echo "style='display:none'";}?> >
		<td colspan="7" align="center">
			<br><?//echo $_GET['sessiontab']."  ".$_GET['sub'];?>
			ค้นเลขบิลหลายบิล&nbsp;<input type="text"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหหาว่างบิลคั่นด้วย '-' " style="width:80%;" value="<?=$bills;?>" >
		</td>
	</tr>
     <tr><td colspan="6" align="center">&nbsp;</td></tr>
    </table>
</form>
<?}?>

<?function rpdialog_amount_lb111($sub,$fdate,$tdate,$s_list=''){ 
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
								echo ">".$row1->inv_desc."(".$row1->inv_code.")</option>";
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
			<?if(($_GET['sessiontab'] == 4) and $_GET['sub'] == 8 ){?> 
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
					<?if(($_GET['sessiontab'] == 4) and $_GET['sub'] == 8 ){?> 
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


<?function rpdialog_amount_lb($sub,$fdate,$tdate){ 
    global $bills,$location_base,$sano,$pcode,$mpcode,$inv,$bank,$sa_type,$logistic,$currency,$sregister,$arr_satype,$arr_logistic,$arr_sregister,$arr_sspv,$uid,$option,$text_op,$sspv;
     
?>
<div class="">
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>"> 
        <table class="tg" width="60%" align="center" bgcolor="#FFFFFF">
          <tr>
            <th width="23%" nowrap="nowrap" align="right" >วันที่ ตั้งแต่</th>
            <th width="23%" nowrap="nowrap"    align="left"><input type="text" id="dateInput1" onKeyPress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
&nbsp;&nbsp;
        &#3606;&#3638;&#3591;
        &nbsp;&nbsp;
        <input type="text" id="dateInput2" onKeyPress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/></th>
            <th width="20%" nowrap="nowrap"    align="right">ช่องทาง</th>
            <th width="20%" nowrap="nowrap"    align="left"><select name="sspv">
               <?php        
                    foreach($arr_sspv as $key => $value):            
                    echo '<option value="'.$key.'"';
                            if($sspv==$key)echo "selected";
                    echo'>'.$value.'</option>'; //close your tags!!
                    endforeach;
                    ?>
                    </select>
            </th>
            <th width="18%" nowrap="nowrap"    align="right">ประเภทบิล</th>
            <th width="20%" nowrap="nowrap"     align="left"><select size="1" name="sa_type" id="sa_type" tabindex="63">
              <option value="" <? if($sa_type=='')echo "selected"; ?> >ทั้งหมด</option>
              <?php foreach($arr_satype as $key=> $val){?>
              <option value="<?=$key?>" <? if($sa_type==$key)echo "selected"; ?> >
                <?=$val?>
              </option>
              <?}?>
            </select></th>
            <th width="20%" nowrap="nowrap"  >&nbsp;</th>
            <th width="20%" nowrap="nowrap"  >&nbsp;</th>
          </tr>
          <tr>
            <th nowrap="nowrap"    align="right">&#3585;&#3634;&#3619;&#3592;&#3633;&#3604;&#3626;&#3656;&#3591;</th>
            <th nowrap="nowrap"  align="left" ><select name="logistic">
                  <option  value="" <?=($logistic==""?"selected":"")?>>&#3585;&#3634;&#3619;&#3592;&#3633;&#3604;&#3626;&#3656;&#3591;&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</option>
                  <?php        
                        foreach($arr_logistic as $key => $value):            
                        echo '<option value="'.$key.'"';
                                if($logistic==$key)echo "selected";
                        echo'>'.$value.'</option>'; //close your tags!!
                        endforeach;
                    ?>
              </select> &#3626;&#3634;&#3586;&#3634; <select size="1" name="inv" id="inv" tabindex="63">
              <option value="" <? if($inv=='')echo "selected"; ?> >&#3585;&#3619;&#3640;&#3603;&#3634;&#3648;&#3621;&#3639;&#3629;&#3585;</option>
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
            </select></th>
            <th  nowrap="nowrap"  align="right" >&#3610;&#3636;&#3621;</th>
            <th  nowrap="nowrap"   align="left"><select name="sregister">
                  <option  value="" <?=($sregister==""?"selected":"")?>>&#3611;&#3619;&#3632;&#3648;&#3616;&#3607;&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</option>
                  <?php        
                        foreach($arr_sregister as $key => $value):            
                        echo '<option value="'.$key.'"';
                                if($sregister==$key)echo "selected";
                        echo'>'.$value.'</option>'; //close your tags!!
                        endforeach;
                        ?>
              </select></th>
            <th  nowrap="nowrap"  align="right" >&#3612;&#3641;&#3657;&#3610;&#3633;&#3609;&#3607;&#3638;&#3585;</th>
            <th  nowrap="nowrap"   align="left"><select size="1" name="uid" id="uid" tabindex="63">
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
            </select></th>
            <th  nowrap="nowrap" >&nbsp;</th>
            <th  nowrap="nowrap" >&nbsp;</th>
          </tr>
          <tr>
            <th colspan='2' nowrap="nowrap"    align="right">ค้นเลขบิลหลายบิล&nbsp;<input type="text"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหาหว่างบิลคั่นด้วย '-' " style="width:60%;" value="<?=$bills;?>" >
            </th>
            
            <th nowrap="nowrap"    align="right">
               <select size="1" name="option" id="option" tabindex="63">
                  <option value="" <? if($option=='')echo "selected"; ?> >&#3585;&#3619;&#3640;&#3603;&#3634;&#3648;&#3621;&#3639;&#3629;&#3585;</option>
                  <option value="mcode" <? if($option=='mcode')echo "selected"; ?> >รหัสสมาชิก</option> 
                  <option value="total" <? if($option=='total')echo "selected"; ?> >จำนวนเงินรวม</option> 
                  <option value="tot_pv" <? if($option=='tot_pv')echo "selected"; ?> >จำนวน PV</option> 
               </select>
            </th>
            <th nowrap="nowrap"  align="left" >
                <input type="text"  name="text_op" id="text_op" style="width:60%;" value="<?=$text_op?>" >
            </th>
            <th  nowrap="nowrap" >&nbsp;</th>
            <th  nowrap="nowrap" align="left" ><input type="Submit" name="Submit" value="&#3604;&#3641;&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;"  onClick="checkround()" /></th>
            <th  nowrap="nowrap" >&nbsp;</th>
            <th  nowrap="nowrap" >&nbsp;</th>
          </tr>
        </table>
</form>   
</div>
<?}?>

<?function rpdialog_amount_lb1($sub,$fdate,$tdate,$inv_code){ 
    global $_SESSION,$location_base,$sano,$pcode,$mpcode,$inv,$bank,$sa_type,$logistic,$currency,$sregister,$arr_satype,$arr_logistic,$arr_sregister,$uid,$bills;
    include("../function/global_center.php");
    $dbprefix = 'ali_';
?>
<div class="">
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>"> 
        <table align="center" width="1100" border="0">
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
          <?  $struid = $_POST['struid'];                  
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
               <?php      $sspv = $_POST['sspv'];  
        foreach($arr_sspv as $key => $value):            
        echo '<option value="'.$key.'"';
                if($sspv==$key)echo "selected";
        echo'>'.$value.'</option>'; //close your tags!!
        endforeach;
        ?>
        </select>
        &#3626;&#3634;&#3586;&#3634;
        <select name="inv_code" id="inv_code"  >
          <?                 
            $result1=mysql_query("select * from ".$dbprefix."invent where inv_code = '$inv_code' order by inv_code");

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
</form> 
</div>
<?}?>



<?function rpdialog_amount_total_lb($sub,$fdate,$tdate){ 
    global $_SESSION,$location_base,$sano,$pcode,$mpcode,$inv,$bank,$sa_type,$logistic,$currency,$sregister,$arr_satype,$arr_logistic,$arr_sregister,$uid,$bills;

?>
<div class="">
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>"> 
        <table class="tg"  width="100%" align="center">
          <tr>
            <th class="tg-v7c2" rowspan="2" nowrap>
               <input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
        &nbsp;
        ถึง
        &nbsp;
               <input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>    
            </th>
            <th class="tg-v7c1">สาขา
            <select size="1" name="inv" id="inv" tabindex="63"> 
             <?                    
                $result1=mysql_query("select * from ali_invent WHERE inv_code = '{$_SESSION['admininvent']}' ");
                for ($i=1;$i<=mysql_num_rows($result1);$i++){
                    $row1 = mysql_fetch_object($result1);
                    //echo "<option value=\"\" ";
                    echo "<option value=\"".$row1->inv_code."\" ";
                     
                    if ($inv==$row1->inv_code) {echo "selected";}
                    echo ">".$row1->inv_desc."(".$row1->inv_code.")</option>";
                }
                ?>
         </select></th>
            <th class="tg-v7c1">ผู้บันทึก
            <select size="1" name="uid" id="uid" tabindex="63"> 
                 <?                    
                    $result1=mysql_query("select * from ali_user WHERE usertype = '2' and usercode = '{$_SESSION['inv_usercode']}' ");
                    for ($i=1;$i<=mysql_num_rows($result1);$i++){
                        $row1 = mysql_fetch_object($result1);
                        //echo "<option value=\"\" ";
                        echo "<option value=\"".$row1->usercode."\" ";
                         
                        if ($uid==$row1->usercode) {echo "selected";}
                       // echo ">".$row1->usercode."(".$row1->username.")</option>";
                        echo ">".$row1->usercode."</option>";
                    }
                    ?>
             </select></th>
            <th class="tg-v7c1"><input type="Submit" name="Submit" value="ดูรายงาน"  onclick="checkround()" /></th>
            <th class="tg-v7c1"></th>
             <th class="tg-v7c1" > </th>
             
          </tr>
          <tr>
            <th class="tg-v7c1"></th>
            <th class="tg-v7c1"></th>
            <th class="tg-v7c1"></th>
            <th class="tg-v7c1"></th>
            <th class="tg-v7c1"></th>
          </tr>
        </table>
</form> 
</div>
<?}?>

<?
$sale = $_REQUEST['sale']==""?$_GET['sale']:$_REQUEST['sale'];
if($sale == 0 and $sale != '')$sale = 'A'; 
$fdate = $_REQUEST['fdate']==""?$_GET['fdate']:$_REQUEST['fdate'];
$tdate = $_REQUEST['tdate']==""?$_GET['tdate']:$_REQUEST['tdate'];
$inv = $_REQUEST['inv']==""?$_GET['inv']:$_REQUEST['inv']; 
$fmcode = $_REQUEST['fmcode']==""?$_GET['fmcode']:$_REQUEST['fmcode'];
$text_op = $_REQUEST['text_op']==""?$_GET['text_op']:$_REQUEST['text_op'];
$option = $_REQUEST['option']==""?$_GET['option']:$_REQUEST['option'];
$type = $_REQUEST['type']==""?$_GET['type']:$_REQUEST['type'];
$sspv = $_REQUEST['sspv']==""?$_GET['sspv']:$_REQUEST['sspv'];

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
$inv_code = $_REQUEST['inv_code']==""?$_GET['inv_code']:$_REQUEST['inv_code']; 
$struid = $_REQUEST['struid']==""?$_GET['struid']:$_REQUEST['struid']; 

?>