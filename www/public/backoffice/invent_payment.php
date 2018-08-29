<?session_start();
 unset($_SESSION["cart_item"]); 
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
</style>
<script type="text/javascript"> 

function get_package_listpicker_mcode(){ 
//alert();
    var wi=null;
    if (wi) wi.close();
    wi=window.open("invent_listpicker_new.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
</script> 
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript"> 
 
$( document ).ready(function() {    
    var texthtml2 = "<div class='error' onClick='get_package_listpicker_mcode()'  >เลือกสาขา</div>"; 
    if($('#product-item').text() == ''){ 
         $('#invent-item').html(texthtml2);      
    }
});

function eproductcheck(){
   var inv_code = $('#inv_code').val();   
   checkForm();

  if(typeof(inv_code) !== 'undefined') { 
      $('#ok').val("บันทึก");
      $("#ok").prop('disabled', false);
  }else{
     alert("กรุณาเลือกสาขาอีกครั้ง");   
     checkinForm();
  }  
 
}

function checkForm()
{
    $("#ok").prop('disabled', true);
    $('#ok').val("Please wait...");
    return true; 
}

function checkinForm()
{
    $("#ok").prop('disabled', true);
    $('#ok').val("บันทึก");
    return true; 
}

function submit() { 
    if(confirm("Confirm")){
        var data = { 'show_branch[]' : []}; 
        $("input:checked").each(function() {
           data['show_branch[]'].push($(this).val());
        });  
        data['inv_code'] =  $('#inv_code').val();
        dataType: 'application/json; charset=utf-8';   
        link = '<?=$actual_link?>backoffice/payment_ope.php';  
        $.post(link,data,function(data){  
        }); 
    }
      checkinForm();
}

 

 function toggle(source) {
      checkboxes = document.getElementsByName("show_branch[]");    
      for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
      } 
 }
 
  function togglex(source) {
      checkboxes = document.getElementsById("show_branchx");    
      for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
      } 
 }
 
function edit(payment_id,inv_code){
    dataType: 'application/json; charset=utf-8';
    queryString = 'payment_id='+payment_id+'&inv_code='+inv_code;
    link = '<?=$actual_link?>backoffice/payment_type.php'; 
    $.post(link,queryString,function(data){   
        $('#payment_type-item').html(data);     
    });  
}
</script> 
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" /> 

<table width="100%">
    <tr >
        <td width="50%">
            <div id="invent-item" class="payment-item"></div>
        </td> 
         <td width="50%"></td>  
    </tr>
    <tr>
        <td valign="top">
            <div id="payment-item" class="payment-item"></div>
        </td>
         <td valign="top">
            <div id="payment_type-item" class="payment-item"></div>
        </td>  
    </tr> 
</table>
