                                                   
<html>
<head>
<title>Import Member</title>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<style>body{background-color:black;color:#008000;font-size:17px;font-family:tahoma;}</style>

<script type="text/javascript">
function  check() {
        if(confirm("��ͧ�����ҧ������")){
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
        <td><p> ��ҧ��Ҫԡ������ҧ��Ҫԡ���� </p></td><td><input type="radio" onchange="document.getElementById('member').disabled=false;"  /></td>
    </tr>
    <tr> 
        <td><p> �����ӹǹ������Ҫԡ </p></td><td><input type="text" name="member" id="member" OnKeyPress="return chkNumber(this)" disabled /><font color="red" >* ����ҧ��������Ҫԡ������ ��� �����������ӹǹ����͡  </font></td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// �����ŷ���ͧ�����ҧ ///////////////////////////</p></td>
    </tr>

    
    <tr> 
        <td><p> ������ </p></td><td><input type="checkbox" onchange="checkAll(this)" name="chk[]" /></td>
    </tr>

    <tr> 
        <td><p> �Թ��� </p></td><td><input type="checkbox" name="del[]" value="product" /></td>
    </tr>
    <tr> 
        <td><p> ��ࡨ </p></td><td><input type="checkbox" name="del[]" value="product_package" /></td>             
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
        <td><p> ��§ҹ ��û�Ѻ���˹觢ͧ��Ҫԡ </p></td><td><input type="checkbox" name="del[]" value="calc_poschange"/></td>
    </tr>
    <tr> 
        <td><p> ��Ţ�� </p></td><td><input type="checkbox" name="del[]" value="asaleh"/></td>
    </tr>
    <tr> 
        <td><p> ���ᨧ�ʹ </p></td><td><input type="checkbox" name="del[]" value="holdhead"/></td>
    </tr>
    <tr> 
        <td><p> �ͺ�ӹǳἹ A  </p></td><td><input type="checkbox" name="del[]" value="around"/></td>
    </tr>
    <tr> 
        <td><p> �ͺ�ӹǳἹ B  </p></td><td><input type="checkbox" name="del[]" value="bround"/></td>
    </tr>
    <tr> 
        <td><p> �ͺ�ӹǳ�������  </p></td><td><input type="checkbox" name="del[]" value="bround"/></td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// ����й� //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> Ἱ����й�  </p></td><td><input type="checkbox" name="del[]" value="ambonus"/></td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="ac"/>��������´����й�  1(ac) </td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="apv"/> ��������´����й�  2(apv) </td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// W/S //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> Ἱ�����÷�� (W/S)  </p></td><td><input type="checkbox" name="del[]" value="bmbonus"/></td>
    </tr>
        <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="bm"/>��������´ W/S  (bm) </td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// Matching  //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> Matching  </p></td><td><input type="checkbox" name="del[]" value="dmbonus"/></td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="dpv"/>��������´ Matching 1(dpv) </td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="dc"/> ��������´ Matching 2(dc) </td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// Unilevel  //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> Unilevel  </p></td><td><input type="checkbox" name="del[]" value="mmbonus"/></td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="mpv"/>��������´Unilevel 1(mpv) </td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="mc"/> ��������´Unilevel 2(mc) </td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// ��Ҥ���  //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> Ἱ ��Ҥ���  </p></td><td><input type="checkbox" name="del[]" value="fmbonus"/></td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="fpv"/>��������´��Ҥ���  1(fpv) </td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="fc"/> ��������´��Ҥ��� 2(fc) </td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// All sale  //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> Ἱ ALL Sale  </p></td><td><input type="checkbox" name="del[]" value="embonus"/></td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="epv"/>��������´ All sale 1(epv) </td>
    </tr>
    <tr> 
        <td></td><td><input type="checkbox" name="del[]" value="em"/> ��������´ All sale 2(em) </td>
    </tr>
    <tr> 
        <td colspan="2"><p>/////////////////////////// �����ŷ���ͧ����Ѿഷ //////////////////////////</p></td>
    </tr>
    <tr> 
        <td><p> stock �Թ��� Backoffice ������ ��  </p></td><td><input type="text" name="updat_product" OnKeyPress="return chkNumber(this)" /></td>
    </tr>
    <tr> 
        <td><p> stock �Թ��� Branch ������ ��  </p></td><td><input type="text" name="updat_product_inv" OnKeyPress="return chkNumber(this)" /></td>
    </tr>
    <tr> 
        <td><p> Ewallet ������ ��  </p></td><td><input type="text" name="update_ewallet" OnKeyPress="return chkNumber(this)" /></td>
    </tr>
    <tr> 
        <td><p> Evoucher ������ ��  </p></td><td><input type="text" name="update_voucher" OnKeyPress="return chkNumber(this)" /></td>
    </tr>
    <tr> 
        <td><p> Eautoship ������ ��  </p></td><td><input type="text" name="update_eatoship" OnKeyPress="return chkNumber(this)" /></td>
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

        