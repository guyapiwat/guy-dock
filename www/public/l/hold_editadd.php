<?session_start();
 unset($_SESSION["cart_item"]);
 $URL = explode('www.',$_SERVER['SERVER_NAME']);

    $_SESSION["holdoperate"] = '1';
    $bid = $_GET["bid"];
    $result1=mysql_query("select DATE_FORMAT(sadate, '%Y-%m') as sadate from ".$dbprefix."asaleh where mcode = '{$_SESSION["usercode"]}' and sa_type = 'H' and id = '$bid' ");
    if(mysql_num_rows($result1) > 0){
        $row1 = mysql_fetch_object($result1);
        $sadate = $row1->sadate;
        if($sadate != $_SESSION["datetimezone_Ym"]){
            $redirect = "[<a href=\"javascript:window.location='index.php?sessiontab=4';\">".$wording_lan["tab1_mem_95"]."</a>]";
            dialogbox("50%","#990000",$wording_lan["error_hold"],$redirect);
            exit;
        }
    }else{
            $redirect = "[<a href=\"javascript:window.location='index.php?sessiontab=4';\">".$wording_lan["tab1_mem_95"]."</a>]";
            dialogbox("50%","#990000",$wording_lan["word"]["nodata"],$redirect);
            exit;

    }
    

?> 

<?require("../backoffice/date_picker.php"); ?>
<?require("../function/function_pos.php"); ?>
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

function getHoldMember(){ 
    var wi=null;
    if (wi) wi.close();
    wi=window.open("getHoldMember.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}

</script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript"> 
 
$( document ).ready(function() {    
    var texthtml = "<div class='error2'>Choose Product</div>";
    var texthtml2 = "<div class='error' onClick='getHoldMember()'  >Choose Package</div>";
    if($('#cart-item').text() == ''){ 
        var queryString = 'action=set'+'&bid='+ <?=$_GET['bid']?>;
         
        $('#cart-item').html(texthtml);       
    }
    
   if($('#member-item').text() == ''){ 
        dataType: 'application/json; charset=tis-620';
        queryString = 'action=set'+'&mcode=';
        link = '<?=$actual_link?>cart/member_memitem_hold.php'; 
        $.post(link,queryString,function(data){ 
           $('#member-item').html(data);   
        });  
    }
     
});

function cartAction(action,product_code,qty) {
    checkinForm();
    var queryString = "";
    if(qty == '')qty=1;
    if(action != "") {
        switch(action) {
            case "add":
                queryString = 'action='+action+'&pcode='+ product_code+'&qty='+qty;
            break; 
            case "plus": 
                queryString = 'action='+action+'&pcode='+ product_code+'&qty='+qty;
            break;
            case "remove":
                queryString = 'action='+action+'&pcode='+ product_code;
            break; 
            case "price":
                queryString = 'action='+action+'&pcode='+ product_code+'&qty='+qty;
            break;
            case "pv":
                queryString = 'action='+action+'&pcode='+ product_code+'&qty='+qty;
            break; 
            case "set":
                queryString = 'action='+action+'&bid='+ product_code;
            break; 
            case "nofree":
                queryString = 'action='+action+'&pcode='+ product_code;
            break;
            case "empty":
                queryString = 'action='+action;
            break; 
            case "refresh": 
                queryString = 'action='+action+'&pcode='+ product_code;;
            break;
        }     
    } 
    dataType: 'application/json; charset=tis-620';    
    link = '<?=$actual_link?>cart/cart_hold_product.php'; 
    $.post(link,queryString,function(data){ 
       $('#cart-item').html(data);     
       
    }); 
   
}

function checksatype(val){   
   $('#waiting-item').html('');    
   var sa_type = val.value;   
   if(sa_type != ''){
        $("#satype").css('border','1px solid #41A717');  
   }else{
        $("#satype").css('border','1px solid #FF0000');  
   }  
}


function eproductcheck(){
   var mcode = $('#mcode').val(); 
   
   if($('#satype').val() == ''){
       alert('รูปแบบการซื้อ');
       return false;
   }        
      if ( mcode != '' ) { 
          $('#waiting-item').html("PASS");         
          $('#ok').val("บันทึก");
          $("#ok").prop('disabled', false);
      }else{
         alert("เลือกสมาชิก");   
         checkinForm();
         return false;
      }  
}

function checkForm()
{
     $('#waiting-item').html(''); 
    $("#ok").prop('disabled', true);
    $('#ok').val("Please wait...");
    return true; 
}

function checkinForm()
{
     $('#waiting-item').html(''); 
    $("#ok").prop('disabled', true);
    $('#ok').val("บันทึก");
    return true; 
}
 
 function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest(); } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported")
   return null
}
   function chknum(key){
    if(key>=48&&key<=57)
        return true;
    else
        return false;
}
 function checkForm(frm)
  { 
    frm.ok.disabled = true;
    frm.ok.value = "Please wait...";
    return true;
  }
function str_pad(input, pad_length, pad_string, pad_type){ 
for(i=input.length; i<pad_length; i++){ 
if(pad_type) 
input = input + pad_string; 
else 
input = pad_string + input; 
} 
return input; 
}   
</script>

<form method="post" action="holdoperate.php?state=<?=$_GET['id']==""?0:1?>" name="frm" id="frm" onsubmit="return checkForm(this)" >
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
            <input type="hidden"  value="<?=$_GET['bid']?>" name="hid"/>
        </td>
      </tr> <tr>
         <td>
            <div id="cart-item"></div>
        </td>
      </tr> 
      <tr>
         <td>
            <div class= 'waiting' id="waiting-item"></div>
        </td>
      </tr>   
      <tr><td><div id="checkstate" align="center"></div>  </td></tr>
    </table>
    </td>
    <td>
           <? include('product_tab_hold_new.php'); ?>
       </td>
  </tr>
</table>
</form>


<?
echo $actual_link,'<br>';

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