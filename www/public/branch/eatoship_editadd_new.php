<?session_start();
 unset($_SESSION["cart_item"]);
 unset($_SESSION["discount"]);

?> 
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<style>
.error {
    text-align: center;
    background-color: red;
    padding: 10px;
    color: #fff;
    font-weight: bolder;
    cursor: pointer;
}
.error2 {
    text-align: center;
    background-color: red;
    padding: 10px;
    color: #fff;
    font-weight: bolder; 
}

.red{
       color: red; 
    }
.green{
       color: green; 
    }
.payment-item table {
      /* font-family: "Helvetica Neue", Helvetica, sans-serif;*/
       width: 100%;
    }
.payment-item a {
     cursor: pointer;
    }

.payment-item caption {
    text-align: left;
      color: silver;
      font-weight: bold;
      text-transform: uppercase;
      padding: 5px;
    }

.payment-item thead {
      background: SteelBlue;
      color: white;
    }

.payment-item th,.payment-item td {
      padding: 5px 10px;
    }

.payment-item tbody tr:nth-child(even) {
      background: WhiteSmoke;
    }

.payment-item tbody tr td:nth-child(2) {
      text-align:center;
    }

.payment-item tbody tr td:nth-child(4),tbody tr td:nth-child(5) {
     /* text-align: right; */
      font-family: monospace;
    }

.payment-item tfoot {
      background: SeaGreen;
      color: white;
      text-align: right;
    }

.payment-item tfoot tr th:last-child {
      font-family: monospace;
    }
.submit {    
        background-color: #FDF5CE !important;
    }
.waiting {    
    text-align: center;
    /* background-color: #FFFFFF; */
    /* width: 81px; */
    padding: 10px;
    color: #5AC716;
    margin: 0 auto;
    font-weight: 900;
}
</style>
<script type="text/javascript"> 

function get_package_listpicker_mcode(){ 
    var wi=null;
    if (wi) wi.close();
    var namefiled = $('#namefiled').val();   
    wi=window.open("member_listpicket_ewallet.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}

</script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript"> 
 
$( document ).ready(function() {    
    var texthtml = "<div class='error2'>Choose Product</div>";
    var texthtml2 = "<div class='error' onClick='get_package_listpicker_mcode()'  >Choose Member</div>";
    if($('#cart-item').text() == ''){ 
         $('#cart-item').html(texthtml);       
    }
 
    
     if($('#member-item').text() == ''){ 
        dataType: 'application/json; charset=utf-8';
        queryString = 'action=set'+'&mcode=';
        link = '<?=$actual_link?>cart/member_ewallet_item.php'; 
        $.post(link,queryString,function(data){ 
           $('#member-item').html(data);   
        });  
    }
    
   var namefiled = $('#namefiled').val();   
   var txt = namefiled.split(',');
   
   for(var i=0;i<txt.length;i++){  
       $('#txt'+txt[i]).prop('disabled', true);
   }  
});
 
function eproductcheck(){
   $('#waiting-item').html(''); 
   var mcode = $('#mcode').val();
   checkForm();
   if (typeof mcode === 'undefined') {
       alert('เลือก Member');
       return false;
       checkinForm();
   } 
   var total = $('#sumtotal').val();   
  
   if($('#sumtotal').val() == ''){
       alert('จำนวนเงิน');
       return false;
   }
   
   var namefiled = $('#namefiled').val();   
   var txt = namefiled.split(',');
   var sum = 0;
   for(var i=0;i<txt.length;i++){ 
     sum +=sumtxt("txt"+txt[i]);  
     if(sumtxt("txt"+txt[i]) > 0){  
         if($("#select"+txt[i]).val() ==''){
             $("#select"+txt[i]).css('border','1px solid #FF0000');
             alert('รูปแบบการชำระ');
             return false;
         }else{
             $("#select"+txt[i]).css('border','1px solid #41A717');
         }
     }else{
          $("#select"+txt[i]).val("");
          $("#select"+txt[i]).css('border','none ');
     }
   }  
  
  if (parseInt(sum) == parseInt(total) ) {  
      $('#waiting-item').html("PASS");        
      $('#ok').val("บันทึก");
      $("#ok").prop('disabled', false);
      return true;
  }else{
     alert(" การจ่าย ไม่พอ  หรือ มากกว่าสืนค้า");  
     checkinForm();
     return false;
  } 

 
}
 
function checksend(val){  
   var send = val.value; 
   if(send != ''){
        $("#sumtotal").css('border','1px solid #41A717');  
   }else{
        $("#sumtotal").css('border','1px solid #FF0000');  
   } 
    
}
function checkForm()
{
    $('#waiting-item').html(''); 
    $("#ok").prop('disabled', true);
    $('#ok').val("Please wait...");
    return true; 
}
function checkFormsubmit(frm)
{
frm.ok.disabled = true;
frm.ok.value = "Please wait...";
return true;
}


function checkinForm()
{
    $('#waiting-item').html(''); 
    $("#ok").prop('disabled', true);
    $('#ok').val("บันทึก");
    return true; 
}
 
function caltotal(total,key,chk)
{
  $('#'+key).prop('disabled', false);
  var all_total = $('#sumtotal').val(); 
  $('#'+key).val('0');   
  var namefiled = $('#namefiled').val();   
  var txt = namefiled.split(',');
  var sum = 0;
  for(var i=0;i<txt.length;i++){  
     sum +=sumtxt("txt"+txt[i]);  
  } 
  
  if(all_total == undefined)all_total =0;
  $('#'+key).val(all_total-sum);
    
  if($("#"+chk)[0].checked == false){
    $('#'+key).val('0');  
    $('#'+key).prop('disabled', true);
  }   
   
}
 
function sumtxt(namefiled){ 
    var sum = $('#'+namefiled).val();   
    return parseInt(sum);
}


</script>
<?include_once("./date_picker.php"); ?>
<form method="post" action="eatoshipoperate.php?state=<?=$_GET['id']==""?0:1?>" name="frm" onsubmit="return checkFormsubmit(this)" >
  <table border="0">
  <tr valign="top">
    <td> 
    <table width="700" border="0"> 
      <tr>
         <td>
            <div id="member-item"></div>
        </td>
      </tr>
      <tr>
         <td>
            <div class= 'waiting' id="waiting-item"></div>
        </td>
      </tr>  
         <td>
           <?php $set_payment = query("*",'ali_payment_branch pb ',"pb.inv_code = '{$_SESSION["admininvent"]}' ");
           if(count($set_payment)){ 
           ?>
            <div id="payment-item" class="payment-item">
                <table>
                  <caption>Payment</caption>
                   <thead>
                    <tr>
                      <th width="5%" align="center"><strong>เลือก</strong></th>
                      <th width="15%"><strong>ประเภท</strong></th>
                      <th width="5%"><strong>เงิน</strong></th>
                      <th width="40%"><strong>รูปแบบ </strong></th> 
                      <th width="40%"><strong> หมายเหตุ</strong></th> 
                    </tr>
                  </thead> 
                  <tbody>
                    <?php  
                        $payment_idx = explode(',',$set_payment[0]['payment_id']); 
                        foreach($payment_idx as $key => $payment_id){   
                            $payment =query("*",'ali_payment pm',"pm.id = '{$payment_id}' and pm.shows_ewallet ='1' and (payment_name <> 'Ewallet' and payment_name <> 'Voucher' and payment_name <> 'Discount') ");   
                            if(count($payment)){    
                              ?>
                             <tr>
                              <td  align=center><input type="checkbox" name="chk<?=$payment[0]['payment_column']?>" id="chk<?=$payment[0]['payment_column']?>" onClick="caltotal(this.value,'txt<?=$payment[0]['payment_column']?>','chk<?=$payment[0]['payment_column']?>')"></td>
                               <td><?=$payment[0]['payment_name']?></td>
                               <td  align=right><input type='number'  value="0" min="0.01" step="0.01" style="width: 62px;text-align:right;" onkeypress='checkinForm();' name="txt<?=$payment[0]['payment_column']?>" id="txt<?=$payment[0]['payment_column']?>" ></td>  
                               <td>
                                <?php $paymem_option =query("*",'ali_payment_type py ',"py.inv_code = '{$set_payment[0]['inv_code']}' and py.payment_id = '{$payment_id}' and py.shows ='1' ");  
                                    if(count($paymem_option)){ ?>
                                    <select size="1" name="select<?=$payment[0]['payment_column']?>" id="select<?=$payment[0]['payment_column']?>" tabindex="63">
                                        <option value="">กรุณาเลือกรูปแบบการชำระ</option> 
                                        <?php foreach($paymem_option as $keyx => $valx){?>
                                            <option value="<?=$valx['id']?>"><?=$valx['pay_desc']?></option>  
                                        <?}?>
                                    </select>
                                    <br />
                                 <?}?>    
                               </td>
                               <td><input name="option<?=$payment[0]['payment_column']?>" id ="option<?=$payment[0]['payment_column']?>"   value="" type="text" size="40" ></td> 
                            </tr>
                       <?php 
                                $namefiled .= $payment[0]['payment_column'].","; 
                                //if(($key+1)!=count($payment_idx))$namefiled .= ",";
                            }
                        } 
                        ?>
                        <input value="<?=substr($namefiled, 0, -1);?>" type="hidden" id="namefiled" >
                  </tbody> 
                  
                  <tfoot>  
                     <tr class="submit">
                       <th colspan="4" align=right></th>
                       <th colspan="3" align=right>
                         <input name="button" id="button" type="button" onclick="eproductcheck()" value="ตรวจสอบ" />
                             &nbsp; <!--input type="submit" value="บันทึก"  onclick="checkForm()" name="ok" id="ok"  disabled="disabled" /--> 
                         <input type="submit" value="บันทึก"   name="ok" id="ok"  disabled="disabled"    /> 
                       </th>
                     </tr>
                    
                  </tfoot>
                </table>
            </div> 
            <?}else{?>
                <div class='error2'>Branch not have payment</div>
            <?}?>
        </td> 
      </tr>  
     </table>
    </td> 
  </tr>
</table>
</form>


<?
    function dialogbox($width,$color,$msg,$link){
        ?><table width=<?=$width?> bgcolor="<?=$color?>">
            <tr valign="top">
            <td align="center"><font color="#FFFFFF"><?=$msg?></font></td>
            </tr>
            <?
            if($link!=""){
                ?><tr valign="top">
                <td align="center"><?=$link?></td>
                </tr><?
            }
            ?>
        </table><? 
    }
    
    
?>