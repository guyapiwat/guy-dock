<?php
require("connectmysql.php");
require("../function/function_pos.php");
 
if($_POST['inv_code']){
    del("ali_payment_branch","inv_code ='{$_POST['inv_code']}' "); 
    foreach($_POST['show_branch'] as $key => $val){  
      if($val != 'on'){
         $payment_id .= $val;
         if(($key+1)!=sizeof($_POST['show_branch']))$payment_id .= ",";
      }
    }
    $data = array( 'inv_code' => $_POST['inv_code'],
                   'payment_id' => $payment_id,
    );
    $status = insert("ali_payment_branch",$data);
    if($status == true)echo 'Success';
    else echo 'Error'; 
}else{
    echo 'Error';
}
 
?>