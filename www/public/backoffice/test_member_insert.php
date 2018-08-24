                                                   
<html>
<head>
<title>Import Member</title>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<style>body{background-color:black;color:#008000;font-size:17px;font-family:tahoma;}</style>

<script type="text/javascript">
function  check() {
        if(confirm("ต้องการล้างข้อมูล")){
            document.getElementById("frm").action = "test_del.php";
        }else{
            exit;
        }
}

 function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }

 function chkNumber(ele)
    {
    var vchar = String.fromCharCode(event.keyCode);
    if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
    ele.onKeyPress=vchar;
}
</script>
</head>
<body>
<form action="#" method="POST" name="frm" id="frm">
<table>
    <tr> 
        <td><p> ล้างสมาชิกและสร้างสมาชิกใหม่ </p></td><td><input type="radio" onchange="document.getElementById('member').disabled=false;"  /></td>
    </tr>
    <tr> 
        <td><p> เพิ่มจำนวนรหัสสมาชิก </p></td><td><input type="text" name="member" id="member" OnKeyPress="return chkNumber(this)" disabled /><font color="red" >* จะล้างข้อมูลสมาชิกทั้งหมด และ เพิ่มใหม่ตามจำนวนที่กรอก  </font></td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// ข้อมูลที่ต้องการล้าง ///////////////////////////</p></td>
    </tr>

    
    <tr> 
        <td><p> ทั้งหมด </p></td><td><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></td>
    </tr>

    <tr> 
        <td><p> สินค้า </p></td><td><input type="checkbox" name="del[]" value="product" /></td>
    </tr>
    <tr> 
        <td><p> แพ็คเกจ </p></td><td><input type="checkbox" name="del[]" value="product_package" /></td>             
    </tr>
    <tr> 
        <td><p> Ewallet </p></td><td><input type="checkbox" name="del[]" value="ewallet" /></td>
    </tr>
    <tr> 
        <td><p> Evoucher </p></td><td><input type="checkbox" name="del[]" value="voucher" /></td>
    </tr>
    <tr> 
        <td><p> Eautoship </p></td><td><input type="checkbox" name="del[]" value="eatoship" /></td>
    </tr>
    <tr> 
        <td><p>Log Ewallet </p></td><td><input type="checkbox" name="del[]" value="log_ewallet" /></td>
    </tr>
    <tr> 
        <td><p>Log Evoucher </p></td><td><input type="checkbox" name="del[]" value="log_voucher" /></td>
    </tr>
    <tr> 
        <td><p>Log Eautoship </p></td><td><input type="checkbox" name="del[]" value="log_eatoship" /></td>
    </tr>
    <tr> 
        <td><p> รายงาน การปรับตำแหน่งของสมาชิก </p></td><td><input type="checkbox" name="del[]" value="calc_poschange"/></td>
    </tr>
    <tr> 
        <td><p> บิลขาย </p></td><td><input type="checkbox" name="del[]" value="asaleh"/></td>
    </tr>
    <tr> 
        <td><p> บิลแจงยอด </p></td><td><input type="checkbox" name="del[]" value="holdhead"/></td>
    </tr>
    <tr> 
        <td><p> รอบคำนวณแผน A  </p></td><td><input type="checkbox" name="del[]" value="around"/></td>
    </tr>
    <tr> 
        <td><p> รอบคำนวณแผน B  </p></td><td><input type="checkbox" name="del[]" value="bround"/></td>
    </tr>
    <tr> 
        <td><p> รอบคำนวณรวมจ่าย  </p></td><td><input type="checkbox" name="del[]" value="bround"/></td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// ค่าแนะนำ //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> แผนค่าแนะนำ  </p></td><td><input type="checkbox" name="del[]" value="ambonus"/></td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="ac"/>รายละเอียดค่าแนะนำ  1(ac) </td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="apv"/> รายละเอียดค่าแนะนำ  2(apv) </td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// W/S //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> แผนบริหารทีม (W/S)  </p></td><td><input type="checkbox" name="del[]" value="bmbonus"/></td>
    </tr>
        <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="bm"/>รายละเอียด W/S  (bm) </td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// Matching  //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> Matching  </p></td><td><input type="checkbox" name="del[]" value="dmbonus"/></td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="dpv"/>รายละเอียด Matching 1(dpv) </td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="dc"/> รายละเอียด Matching 2(dc) </td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// Unilevel  //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> Unilevel  </p></td><td><input type="checkbox" name="del[]" value="mmbonus"/></td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="mpv"/>รายละเอียดUnilevel 1(mpv) </td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="mc"/> รายละเอียดUnilevel 2(mc) </td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// ค่าคีย์  //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> แผน ค่าคีย์  </p></td><td><input type="checkbox" name="del[]" value="fmbonus"/></td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="fpv"/>รายละเอียดค่าคีย์  1(fpv) </td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="fc"/> รายละเอียดค่าคีย์ 2(fc) </td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// All sale  //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> แผน ALL Sale  </p></td><td><input type="checkbox" name="del[]" value="embonus"/></td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="epv"/>รายละเอียด All sale 1(epv) </td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="em"/> รายละเอียด All sale 2(em) </td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// ข้อมูลที่ต้องการอัพเดท //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> stock สินค้า Backoffice ทั้งหมด เป็น  </p></td><td><input type="text" name="updat_product" OnKeyPress="return chkNumber(this)" /></td>
    </tr>
    <tr> 
        <td><p> stock สินค้า Branch ทั้งหมด เป็น  </p></td><td><input type="text" name="updat_product_inv" OnKeyPress="return chkNumber(this)" /></td>
    </tr>
    <tr> 
        <td><p> Ewallet ทั้งหมด เป็น  </p></td><td><input type="text" name="update_ewallet" OnKeyPress="return chkNumber(this)" /></td>
    </tr>
    <tr> 
        <td><p> Evoucher ทั้งหมด เป็น  </p></td><td><input type="text" name="update_voucher" OnKeyPress="return chkNumber(this)" /></td>
    </tr>
    <tr> 
        <td><p> Eautoship ทั้งหมด เป็น  </p></td><td><input type="text" name="update_eatoship" OnKeyPress="return chkNumber(this)" /></td>
    </tr> 
    <tr> 
        <td></td><td><input type="submit" name="submit" onclick="check()" value="Sumit"/></td>
    </tr>

</table>
</form> 

                ###        
                ############ 

              #######    ###       #   ########  #######  #########   #######     ####    #     
                    #      #       #    #      ##      #  #                 #     #       #   
               ###  #      #       #     #   ###       #  #########         #     ####    #   
               #    #      #   ######     #   #        #          #         #     #       #   
               #    #      #  #    # #     # #         #          #         #     #       #   
               ######      ####    ###      #          #    #######         #     #########   


</body>

        