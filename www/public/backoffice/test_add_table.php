<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>
<?

    $set_payment = query("*",'ali_payment ash '," 1=1 and shows = 1 "); 
    foreach($set_payment as $key => $val):
        $text = 'txt'.$val['payment_column'];
        $option = 'option'.$val['payment_column'];
        $select = 'select'.$val['payment_column'];
        $ali_asaleh = true;
        $ali_ewallet = true;
        if($ali_asaleh == true){
            $rs = mysql_query("SHOW COLUMNS FROM ali_asaleh LIKE '{$text}'");
            $num =  mysql_num_rows($rs); 
            if(mysql_num_rows($rs) > 0){
                
            }else{
               echo $text,'<br>';
               mysql_query("ALTER TABLE ali_asaleh ADD {$text} decimal(15,2)"); 
            }
            
                      
            $rs = mysql_query("SHOW COLUMNS FROM ali_asaleh LIKE '{$option}'");
            $num =  mysql_num_rows($rs); 
            if(mysql_num_rows($rs) > 0){
                
            }else{
                echo $option,'<br>';
               mysql_query("ALTER TABLE ali_asaleh ADD {$option} VARCHAR(255)");
            }
            
            $rs = mysql_query("SHOW COLUMNS FROM ali_asaleh LIKE '{$select}'");
            $num =  mysql_num_rows($rs); 
            if(mysql_num_rows($rs) > 0){
                
            }else{
                echo $select,'<br>';
               mysql_query("ALTER TABLE ali_asaleh ADD {$select} VARCHAR(255)");
            }
            
        }
         
        if($ali_ewallet == true){
            $rs = mysql_query("SHOW COLUMNS FROM ali_ewallet LIKE '{$text}'");
            $num =  mysql_num_rows($rs); 
            if(mysql_num_rows($rs) > 0){
                
            }else{
               echo $text,'<br>';
               mysql_query("ALTER TABLE ali_ewallet ADD {$text} decimal(15,2)"); 
            }
            
                      
            $rs = mysql_query("SHOW COLUMNS FROM ali_ewallet LIKE '{$option}'");
            $num =  mysql_num_rows($rs); 
            if(mysql_num_rows($rs) > 0){
                
            }else{
                echo $option,'<br>';
               mysql_query("ALTER TABLE ali_ewallet ADD {$option} VARCHAR(255)");
            }
            
            $rs = mysql_query("SHOW COLUMNS FROM ali_ewallet LIKE '{$select}'");
            $num =  mysql_num_rows($rs); 
            if(mysql_num_rows($rs) > 0){
                
            }else{
                echo $select,'<br>';
               mysql_query("ALTER TABLE ali_ewallet ADD {$select} VARCHAR(255)");
            }
            
        }
         
         
        
    endforeach;
    
    
?>
