<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>

<?
/*
$host = explode('www.',$_SERVER['SERVER_NAME']);
$URL = explode('/',$_SERVER['REQUEST_URI']);
$actual_link = "http://".$host[0]."/".$URL[1]."/"; 
*/
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620"> 
<style>
    
    .cart-package table {
       font-family: "Helvetica Neue", Helvetica, sans-serif;
       width: 100%;
    } 
    
    .remove-icon {
       background-image: url("../images/font-awesome/remove-symbol.png");
       background-position: top; 
    }
    .cart-package caption {
     text-align: left;
      color: silver;
      font-weight: bold;
      text-transform: uppercase;
      padding: 5px;
    }

    .cart-package a {
     cursor: pointer;
    }
    .cart-package thead {
      background: SteelBlue;
      color: white;
    }

    .cart-package th,.cart-package td {
      padding: 5px 10px;
    }

    .cart-package tr th:last-child {
       background: SeaGreen;
    }
    .cart-package tbody tr:nth-child(even) {
      background: WhiteSmoke;
    }

    .cart-package tbody tr td:nth-child(2) {
      text-align:center;
    }

    .cart-package tbody tr td:nth-child(3),tbody tr td:nth-child(4) {
     /* text-align: right; */
      font-family: monospace;
    }

    .cart-package tfoot {
      background: SeaGreen;
      color: white;
      text-align: right;
    }

    .cart-package tfoot tr th:last-child {
      font-family: monospace; 
    }
</style> 


<script type="text/javascript">
$(document).ready(function(){
    var i = 2;
    var k = 1;
    $("#add").click(function () {  
  
        var get = $(document.createElement('div')).attr("id", 'parentbox' + i);        
        get.after().html($("#parentbox2").clone().html()).appendTo("#root");    
        i++;
        $('#ok2').val("บันทึก");
        $("#ok2").prop('disabled', false);
     });
     
     $("#add1").click(function () {  
          if(k>1)return false;
            var get = $(document.createElement('div')).attr("id", 'parentbox' + k);        
            get.after().html($("#parentbox2").clone().html()).appendTo("#root");    
            k++;
            $('#ok2').val("บันทึก");
            $("#ok2").prop('disabled', false);
     });

     
     
     $("#remove").click(function () {
        if(i==1){ 
            alert("Cannot remove");
            $("#ok2").prop('disabled', false); 
            return false;
        } i--;
        $("#parentbox" + i).remove(); 
     });
});


$('#update_payment').submit(function( event ) {
    if(confirm("Confirm")){ 
       // alert($('#update_payment').serialize())
        var payment_id = $('#payment_id').val();
        var inv_code = $('#inv_code').val();
        dataType: 'application/json; charset=utf-8';   
        linkx = '<?=$actual_link?>backoffice/payment_type_ope.php';   
        $.post(linkx,$('#update_payment').serialize(),function(data){  
            alert('success');
               edit(payment_id,inv_code);
        }); 
        
   } 
    return false;
    
});


function edit(payment_id,inv_code){
    dataType: 'application/json; charset=utf-8';
    queryString = 'payment_id='+payment_id+'&inv_code='+inv_code;
    link = '<?=$actual_link?>backoffice/payment_type.php'; 
    $.post(link,queryString,function(data){   
        $('#payment_type-item').html(data);     
    });  
}

function edit_payment(){ 
   $('#ok2').val("บันทึก");
   $("#ok2").prop('disabled', false);
}

function removex(id){ 
    var payment_id = $('#payment_id').val();
    var inv_code = $('#inv_code').val();
    dataType: 'application/json; charset=utf-8';
    queryString = 'action=remove'+'&id='+id;
    linkx = '<?=$actual_link?>backoffice/payment_type_ope.php';  
    $.post(linkx,queryString,function(data){    
          edit(payment_id,inv_code);
    });  
}


</script>  
<?
 if(!empty($_POST["inv_code"])) {     
   $pd = query('*,pm.id as pid,pm.shows ','ali_payment_type pm'," pm.inv_code  = '{$_POST["inv_code"]}' and pm.payment_id  = '{$_POST["payment_id"]}' ","LEFT JOIN ali_payment p on (p.id = pm.payment_id ) ");    
   if(count($pd))
   {   
?>
<form method="post" id="update_payment">
<div class='cart-package'>
<table>
  <caption><?=$pd[0]['payment_name']?><font color="green">&nbsp;&nbsp;<a id="add"><img src="../images/font-awesome/add-square-button.png" alt="add" width="20px"></a> </font> &nbsp;&nbsp;<font color="red"><a id="remove"><img src="../images/font-awesome/minus-button.png" alt="remove" width="20px"></a> </font> </caption>
  <thead>
    <tr>  
      <th width="5px"><strong>ลบ</strong></th> 
      <th ><strong>รูปแบบ</strong></th>
      <!--th width="5px"><strong>Show<input type="checkbox" onClick="togglex(this)" /></th-->   
      <th width="5px"><strong>Show</th>   
    </tr> 
  </thead> 
  <tbody> 
    <?php 
        foreach ($pd as $key => $val){ ?>
          <tr>
            <td align=center><a onClick="removex('<?=$val['pid'];?>')" ><img src="../images/font-awesome/remove-symbol.png" alt="remove" width="10px"></a></td> 
            <td align='center'><input type="text" value="<?=$val['pay_desc'];?>" id="edit_paymentx" name="edit_<?=$val['pid'];?>" size="100%" onkeypress="edit_payment()" /></td>
            <td align='center'><input type='checkbox' id='show_branchx' name='show_<?=$val['pid'];?>' <?echo ($val['shows']==1?"checked":"");?> onclick="edit_payment()" /></td>
            <input type="hidden" id="inv_code" name="inv_code" value="<?=$_POST["inv_code"];?>"/>  
            <input type="hidden" id="payment_id" name="payment_id" value="<?=$_POST["payment_id"];?>"/>  
          </tr>
      <?  }  ?> 
      
          <tr >
             <td colspan="3" > 
                 <div id="root">
                    <div id="parentbox">
                    </div>
                  </div> 
             <td>
        </tr> 
        
  </tbody> 
  <tfoot>
     <tr class="submit">  
       <th colspan="3">
         <input type="submit" value="บันทึก" name="ok2" id="ok2"  disabled="disabled" />  
       </th>
     </tr>
    
  </tfoot> 
 </table>
</form>
     <div id="root"style="display:none">
        <div id="parentbox2">
            <table>
             <tr >
                 <td align=center></td>
                 <td align='center'><input type='text' value="" size="100" name="payment_desc[]" id="payment_desc[]"></td>
              </tr> 
             </table>                  
        </div>
      </div> 
   <div align="right">  </div>
 </div>

<?}else{ ?>
    <div class='error'  id="add1" >เพิ่มข้อมูล</div>
    <form method="post" id="update_payment">
            
            <table>
              <tr><td>
                 <input type="hidden" id="inv_code" name="inv_code" value="<?=$_POST["inv_code"];?>"/>  
                 <input type="hidden" id="payment_id" name="payment_id" value="<?=$_POST["payment_id"];?>"/> 
              </td></tr>
              <tr >
                 <td colspan="3" > 
                     <div id="root">
                        <div id="parentbox">
                        </div>
                      </div> 
                 <td>
                </tr> 
              </tr>
            </table>
             
    </form>
    
    <div id="root"style="display:none">
        <div id="parentbox2">
            <table>
             <tr >
                 <td align=center></td>
                 <td align='center'><input type='text' value="" size="100" name="payment_desc[]" id="payment_desc[]"></td>
                 <td ><input type="submit" value="บันทึก" name="ok2" id="ok2"  disabled="disabled" />  
                 </td >
              </tr> 
             </table>                  
        </div>
      </div> 
<?} 
 }?>

