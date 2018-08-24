<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
	          <tr><td valign="top"  style="height:20px;">
	            	<table width="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="56" background="images/cap_002_bg.gif" >&nbsp;</td>
        <td  background="images/cap_002_bg.gif"  class="style3">&nbsp;&nbsp;แบบฟอร์มตั้งเวลาส่งข้อความ</td>
        <td width="5"><img src="images/cap_003.gif" width="5" height="65" /></td>
        <!--<td width="92" align="right"  class="style6 style8"><nobr>&nbsp;แบบฟอร์มตั้งเวลาส่งข้อความ&nbsp;</nobr></td>-->
        <td width="46" align="right" background="images/cap_002_bg.gif">&nbsp;</td>
      </tr>
  </table>
	          </td></tr>
	          <tr><td  valign="top">
	            	<table width="97%"  border="0" cellpadding="0" cellspacing="0" align="center">
	              <tr><td valign="top" >
	                	<script language="JavaScript" type="text/javascript" src="lib/calendar_new.js"></script>
<script language="JavaScript" type="text/javascript" src="lib/calendar-en.js"></script>
<script language="JavaScript" type="text/javascript" src="lib/loadcalendar.js"></script>
<link href="css/style_calendar.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="js/jscheckform.js"></script> 
<form  name="myform" id="myform" action="schedule.php" method="post" autocomplete="off" enctype="multipart/form-data">
<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="form_border_1">
<tr>
            <td height="5"></td>
    </tr>
<tr><td valign="middle" >
    <table  width="90%"  border="0" cellspacing="5" cellpadding="5" align="center">
        <tr  id='smsType' style='display: none;'>
        <td>Type :</td>
        <td>
            <select id='datacoding' name='datacoding' onChange="set_lang(this.value)">
                <option value='iso88591'>อังกฤษ เท่านั้น</option>
                <option value='isoiec10646' >ไทย+อังกฤษ </option>
            </select>
        </td>
    </tr>         <tr valign="top"> 
            <td colspan="2">
                <div   style="width:650px;" >
                <strong>ส่งข้อความ SMS ไปยังโทรศัพท์มือถือ.</strong><br>
                <span class="style5" style="text-align:center;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- หากจำนวนตัวอักษรเกินกว่ากำหนดระบบจะตัดเครดิตของท่านตามข้อความที่ใช้ หากแต่ผู้รับจะได้รับเป็นข้อความเดียว<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- เช่น หากข้อความของท่านเป็นภาษาไทยเกิน 70 ตัวอักษร ระบบจะคิดเป็น 2 ข้อความแต่ผู้รับจะได้รับเพียงข้อความเดียวครบถ้วน<br>
                </span>
                </div>
                <hr>
            </td>
        </tr>    
        <tr>
            <td height="5"></td>
    </tr>        <tr>
            <td></td>
            <td><input type="hidden" name="customer_id" id="customer_id" value="67"></td>
        </tr>        <tr>
            <td align="right"><span class="fontlabel">แผนก   : </span></td>
            <td>
              <input type="text" name="department_name" id="department_name"  value="Management" size="60" style="background:#eeeeee;border:#333333 solid 1px;" readonly>
              <input type="hidden" name="department_id" id="department_id"  value="118" size="10">   
            </td>
        </tr>             
        <tr id='smsMobileType'>
            <td width="20%" align="right"  ><strong></strong>&nbsp;</td>
            <td align="left">
                <input type="radio" id="type1" name="type" value="1"  onclick="if(this.checked==true) {document.getElementById('tpyelabel').innerHTML='หมายเลขโทรศัพท์มือถือ';document.getElementById('inputMobile').style.display='';document.getElementById('UploadMobile').style.display='none';document.getElementById('ByPhoneBook').style.display='none';document.getElementById('group_id').value='';document.getElementById('group_id').onchange();}" checked> <strong>ระบุเบอร์โทรศัพท์ </strong>
                <input type="radio" id="type2" name="type" value="2" onClick="if(this.checked==true) {document.getElementById('tpyelabel').innerHTML='File upload';document.getElementById('inputMobile').style.display='none';document.getElementById('UploadMobile').style.display='';document.getElementById('phoneNO').value='';document.getElementById('ByPhoneBook').style.display='none';document.getElementById('group_id').value='';document.getElementById('group_id').onchange();}" > <strong>Upload file </strong>
                <input type="radio" id="type3" name="type" value="3" onClick="if(this.checked==true) {document.getElementById('tpyelabel').innerHTML='เลือกสมุดโทรศัพท์';document.getElementById('inputMobile').style.display='none';document.getElementById('UploadMobile').style.display='none';document.getElementById('phoneNO').value='';document.getElementById('ByPhoneBook').style.display='';document.getElementById('group_id').value='';document.getElementById('group_id').onchange();}" > <strong>ส่งตามสมุดโทรศัพท์ </strong>
            </td>
        </tr>        
                                        
        <tr id='smsMobile'>
            <td width="20%" align="right"  valign="top"><span id="tpyelabel">หมายเลขโทรศัพท์มือถือ</span>:&nbsp;</td>
            <td align="left">
            <span id="inputMobile" >
                <textarea  id="phoneNO" name="phoneNO" cols="80" rows="5" onKeyPress="chkNumPhone(event);" onKeyUp="countPhoneNumber();" onBlur="checkPhoneNumber();countPhoneNumber();"></textarea> 
                 <span class="fontredbold">*</span>
                <br />    หมายเลข 10 หลัก และใช้เครื่องหมาย , คั่น เช่น 0812345678,0812345679
            </span>
            <span id="UploadMobile" style="display:none;"> 
                <iframe  src="ajax_upload/fileupload.php" id="frmFileUpload" name="frmFileUpload" frameborder="0" width="560" height="140" scrolling="no" style="left:0px;top0px;posiotion:absolute;" noresize></iframe>
                <br /> 
                <a href="mobileformat.txt">ดูฟอร์แมตไฟล์</a> (ใช้ไฟล์นามสกุล .txt และ .csv และไม่เกิน 2 MB)
            </span>
            <span id="ByPhoneBook" style="display:none;">
                <select name="group_id" id="group_id" onChange="ajax_getphonetotal(this.value,'','new');">
                 <option value=""><---------------กรุณาเลือกสมุดโทรศัพท์---------------></option><option value="372" >List All News All Change</option><option value="373" >Together SMS</option>   
                </select>
            </span>
            </td>
        </tr>
        <tr><td colspan="2"><input type="hidden" name="textType" id="smsText"  value="" size="3"   readonly></td></tr>    
        <tr id="tr1" >
            <td align="right" valign="top"><span class="fontlabel">ข้อความ:</span></td>
            <td valign="center">
            <textarea name="scdg_message" id="scdg_message" cols="80" rows="5"  onkeyup="updateTextBoxCounter();"  ></textarea>
            <span class="fontredbold">*</span>
            </td>
        </tr>    
        <tr>
            <td width="20%" align="right">จำนวนตัวอักษร:&nbsp;</td>
            <td><input type="text" name="length_mss" id="length_mss" value="" size="3"  style="text-align:center;border:#333333 solid 1px;background:#eeeeee;" readonly> 
            ตัวอักษร ต่อ 
            <input type="text"  name="checkinput" id="checkinput"  value="1" size="2"  style="text-align:center;border:#333333 solid 1px;background:#eeeeee;" readonly> 
            ข้อความ ใช้ไป 
            <input type="text" name="length_use"  id="length_use" value="" size="3"   style="text-align:center;border:#333333 solid 1px;background:#eeeeee;" readonly> 
            ตัวอักษร คิดเป็น 
            <input type="text" name="totaluse"  id="totaluse"  value="" size="2"   style="text-align:center;border:#333333 solid 1px;background:#eeeeee;" readonly>
            ข้อความ
            </td>
        </tr>
       
             <tr >
            <td align="right">จำนวนเบอร์โทรศัพท์:</td>
            <td>
            <input type="text" name="useCreditOld"  id="useCreditOld" value="" size="10"   style="text-align:center;border:#333333 solid 1px;background:#eeeeee;" readonly> 
            เครดิตที่ใช้ครั้งนี้: 
            <input type="text" name="useCredit"  id="useCredit" value="" size="10"   style="text-align:center;border:#333333 solid 1px;background:#eeeeee;" readonly> 
           </td> 
        </tr>
        <tr >
            <td align="right">เครดิตแผนกทั้งหมด:</td>
            <td>
           
            <input type="text" name="CreditTotal"  id="CreditTotal" value="50000" size="10"   style="text-align:center;border:#333333 solid 1px;background:#eeeeee;" readonly> 
            คงเหลือ:  
            <input type="text" name="quota"  id="quota" value="20741" size="10"   style="text-align:center;border:#333333 solid 1px;background:#eeeeee;" readonly> 
            <input type="hidden" id="quota_old"  name="quota_old" value="20741">
            <input type="hidden" id="totaluser_old"  name="totaluser_old" value="29259">
            </td> 
        </tr>
        <tr>
            <td align="right"><span class="fontlabel">ชื่อผู้ส่ง   : </span></td>
            <td>
            <select name="scdg_sender" id="scdg_sender"> 
            <option value=""><-----------------กรุณาเลือกชื่อผู้ส่ง-----------------></option>            <option value="Together">Together</option>           </select>
            <span class="fontredbold">*</span>
            </td>
        </tr>
         <tr>
            <td align="right"><strong>ตั้งเวลาส่ง: </strong></td>
            <td>
             <input type="radio" id="timetype1" name="timetype" value="1"  onclick="if(this.checked==true){document.getElementById('tr_senddate').style.display='none';}" /> <strong> ส่งทันที </strong>
             <input type="radio" id="timetype1" name="timetype" value="2" checked  onclick="if(this.checked==true){document.getElementById('tr_senddate').style.display='';}" />  <strong>ระบุวันที่ส่ง </strong>
            </td> 
        </tr>
        <tr id="tr_senddate" >
            <td align="right"><strong>ตั้งส่งวันที่: </strong></td>
            <td>
                <input type="text" name="sentdate"  id="sentdate" size="13"  value="2011-03-22" style="text-align:center;border:#333333 solid 1px;background:#eeeeee;" readonly> 
                <img src="images/cal.gif" border="0"   alt='Click here to pick up the date'  height='18' width='18'  style="cursor:pointer;" onClick="return showCalendar('sentdate', 'y-mm-dd');" >
                <strong>เวลา : </strong>
                <select name="senttimeH" id="senttimeH">                <option value="01" >01</option>                <option value="02" >02</option>                <option value="03" >03</option>                <option value="04" >04</option>                <option value="05" >05</option>                <option value="06" >06</option>                <option value="07" >07</option>                <option value="08" >08</option>                <option value="09" selected>09</option>                <option value="10" >10</option>                <option value="11" >11</option>                <option value="12" >12</option>                <option value="13" >13</option>                <option value="14" >14</option>                <option value="15" >15</option>                <option value="16" >16</option>                <option value="17" >17</option>                <option value="18" >18</option>                <option value="19" >19</option>                <option value="20" >20</option>                <option value="21" >21</option>                <option value="22" >22</option>                <option value="23" >23</option>                <option value="00" >24</option>                </select>
                : 
                <select name="senttimeI" name="senttimeI">                <option value="00" >00</option>                <option value="05" >05</option>                <option value="10" >10</option>                <option value="15" >15</option>                <option value="20" selected>20</option>                <option value="25" >25</option>                <option value="30" >30</option>                <option value="35" >35</option>                <option value="40" >40</option>                <option value="45" >45</option>                <option value="50" >50</option>                <option value="55" >55</option>                </select>
            </td> 
        </tr> 
        <tr>
            <td colspan="2" height="8"></td>
        </tr>
        <tr>
            <td align="right"></td>
            <td>
            <div id="infotxtborder"  >
            <span class="style5" id="infotxt" ></span>
            </div>
            </td> 
        </tr>
        
        </table>
        </td></tr>
        <tr>
                    <td height="5"></td>
        </tr>        <tr><td valign="middle" class="form_border_2">
            <table   border="0" cellspacing="1" cellpadding="1" align="center">
	<tr>			<td align="right"><input type="button" name="Save" id="Save" value="Save" class="bottonbold" style="cursor:pointer;width:100px;" class  onclick=" submitform('CheckFormSchedule();');" > </td>			<td align="right"><input type="button" name="Cancel" id="Cancel" value="Cancel" style="cursor:pointer;" class="bottonbold" onClick="top.location.href='schedule.php?';"></td>	</tr>
</table>
        </td></tr>
        </table>
        <input type="hidden" id="expire"  name="expire" value="N">
        <input type="hidden" id="inputTHE"  name="inputTHE" value="">
        <input type="hidden" name="dupplicate" id="dupplicate" value="N">
        <input type="hidden" name="ID" id="ID" value="">
        <input type="hidden" name="rowkey" id="rowkey" value="new">
        <input type="hidden" name="numarray" value="">
</form> 
	               <br />
	             </td></tr>
	            </table>
	         </td></tr>
	        </table>