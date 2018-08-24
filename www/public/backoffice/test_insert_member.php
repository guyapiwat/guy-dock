<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>                                                     
<html>
<head>
<title>Import Member</title>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<style>body{background-color:black;color:#008000;font-size:17px;font-family:tahoma;}</style>
</head>
<body>

<?
//it;  
$num = 10;
del('ali_asaleh',"sadate = '2015-12-01' ");  
 for($i=1;$i<=$num;$i++){  
    $mcode  =gencode($i);               
    insert_asaleh($mcode,'100000');
 echo "SUCCESS...".$mcode."<br>"; 
} 


exit;
del('ali_member',"1=1");  
del('ali_asaleh',"1=1"); 
del('ali_eatoship',"1=1"); 
del('ali_voucher',"1=1"); 
del('ali_log_eatoship',"1=1"); 
del('ali_log_voucher',"1=1"); 
$num ='8';
for($i=1;$i<=$num;$i++){                
 $mcode =  get_last_member(); 
 echo "SUCCESS...".$mcode."<br>"; 
} 

function get_last_member($tot_pv='500'){      
    ////////////////////////////////////////////////////////////////////  
     $dbprefix='ali_';
     $upa_code = 'upa_code';
     $priority = 'id';
     $lr = 'lr';    
     //////////////////////  find last member //////////////////////////
     $sql33="select t1.mcode,t1.name_t
          from ".$dbprefix."member t1
          left join ali_member t2 on (t1.mcode = t2.".$upa_code.")     
          group by t1.mcode having count(*) <=1 
          order by t1.".$priority." 
          limit 0,1 ";   
    $rs33 = mysql_query($sql33);    
    if (mysql_num_rows($rs33)>0) {  
        $sqlObj33 = mysql_fetch_object($rs33);
        $mcode1 =$sqlObj33->mcode;        
        $name_t =$sqlObj33->name_t;     
        //////////////////////  find left right //////////////////////////
        $sql666="select count(mcode) as lr from ".$dbprefix."member where ".$upa_code."='".$mcode1."' ";  
        $rs666 = mysql_query($sql666);    
            if (mysql_num_rows($rs666)>0){
                $sqlObj666 = mysql_fetch_object($rs666);
                $lr_mem =$sqlObj666->lr;
            }else{
                $lr_mem =0;
            }
           
            $data = maxmcode();
            $new_mcode = $data['new_mcode']; 
            //////////////////////  find left right //////////////////////////       
             $insert = array('mcode' => $new_mcode,
                             'name_t' => $new_mcode,
                             'lr' => $lr_mem+1,
                             'upa_code' => $mcode1,
                             'sp_code' => $data['bmcode'],
                             'pos_cur' => 'MB',
            );  
            insert("ali_member",$insert);                                              
          //  insert_asaleh($new_mcode,$tot_pv);  
             
     }else{  ///////// Empty tabel member 
            $new_mcode = "0000001";   
            $insert = array( 'mcode' => '0000001',
                             'name_t' => 'test_1',
                             'pos_cur' => 'MB',
            );  
            insert("ali_member",$insert); 
          //  insert_asaleh($new_mcode,$tot_pv);
     } 
     
     return $new_mcode;
}
function insert_asaleh($mcode,$tot_pv){
    $insert = array('mcode' => $mcode,
                     'tot_pv' => $tot_pv,
                     'sadate' => date("Y-m-d"),
                     'sa_type' => 'A',
                     'scheck' => 'test',   
    );  
    insert("ali_asaleh",$insert);   
    updatePos("ali_",$mcode,date("Y-m-d"),$tot_pv);
}

function maxmcode(){
    $sql=" SELECT mcode from ali_member ORDER BY id DESC LIMIT 0,1 ";  
    $rs = mysql_query($sql);
    if (mysql_num_rows($rs)>0){   
        $sqlObj = mysql_fetch_object($rs);
        $mcode1 =$sqlObj->mcode;
    }    
   
    $data['new_mcode'] = gencode($mcode1+1); 
    $data['bmcode'] = $mcode1; 
   return $data;
}
 

function gencode($source){
    for($i=strlen($source);$i<7;$i++)
        $source = "0".$source;
    return $source;
}
?>