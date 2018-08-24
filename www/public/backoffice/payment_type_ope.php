
<?php
require("connectmysql.php");
require("../function/function_pos.php"); 
if($_POST['action'] == ''){
    if($_POST['inv_code']){ 
        $data =array();
        foreach($_POST as $key => $val){   
            $edit = explode("edit_",$key);
            if($edit[1])$data[$edit[1]] = $val;
        } 
        if(count($data)){
            foreach($data as $key => $val){  
                    $show = 'show_'.$key;
                    if($_POST[$show] =='on')$status = 1;
                    else $status = 0;

                    $update = array(
                           'pay_desc' => iconv("utf-8","tis-620",$val),
                            'shows' => $status,
                            );  

                    update("ali_payment_type",$update," id = '{$key}' "); 
            }  
        }
        
        foreach($_POST['payment_desc'] as $key => $val){   
            if($val != ''){
                 $data = array(
                            'payment_id' => $_POST['payment_id'],
                            'inv_code' => $_POST['inv_code'],
                           'pay_desc' => iconv("utf-8","tis-620",$val),
                            'shows' => '1',
                            );  

                    $status = insert("ali_payment_type",$data);
                    if($status == true)echo 'Success';
                    else echo 'Error'; 
                }
        }
    }else{
        echo 'Error';
    } 
}else{
   del("ali_payment_type","id = '{$_POST['id']}' ");
}



?>