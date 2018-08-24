<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>  
<?

if(isset($_POST)){
    $member=$_POST['member'];
    $del=$_POST['del'];
    $updat_product=$_POST['updat_product'];
    $updat_product_inv=$_POST['updat_product_inv'];
    $update_ewallet=$_POST['update_ewallet'];
    $update_voucher=$_POST['update_voucher'];
    $update_eatoship=$_POST['update_eatoship'];

if($updat_product !=""){
    $r1=mysql_query("UPDATE ali_product SET qty=0");
    if($rss){
        echo "UPDATE stock Backoffice Success <br>";
    }
}
if($updat_product_inv !=""){
    $r1=mysql_query("UPDATE ali_product_invent SET qty=0,qtys=0");
    if($rss){
        echo "UPDATE stock Branch Success <br>";
    }
}

if($update_ewallet !=""){
    $r1=mysql_query("UPDATE ali_member SET ewallet='".$update_ewallet."'");
    if($rss){
        echo "UPDATE Ewallet Success <br>";
    }
}

if($update_voucher !=""){
    $r1=mysql_query("UPDATE ali_member SET voucher='".$update_voucher."'");
    if($rss){
        echo "UPDATE Evoucher Success <br>";
    }
}

if($update_eatoship !=""){
    $r1=mysql_query("UPDATE ali_member SET eatoship='".$update_eatoship."'");
    if($rss){
        echo "UPDATE Eautoship Success <br>";
    }
}

if($member > 0){
    $rss=mysql_query("TRUNCATE TABLE ali_member");
    if($rss){
        echo "DELETE member Success <br>";
    }
    echo "Create Member";
    $num =$member;
    for($i=1;$i<=$num;$i++){                
     $mcode =  get_last_member($i,date('Y-m-d')); 
     func_first_register($mcode,date('Y-m-d'));
     echo "SUCCESS...".$i."==>".$mcode."<br>"; 
    } 
}

if($del){
    for($m=0;$m<count($del);$m++){
        $sql="TRUNCATE TABLE ali_".$del[$m]."";
        $rss=mysql_query($sql);
        if($rss){
            echo $sql."<br>";
            echo "DELETE ".$del[$m]." Success <br>";
        }
    }
}


}
function get_last_member($num,$mdate){      
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
	
 $pos_cur = array("MB","SI","GO","DI");
            $pos_cur2 = array("DD","SD","PD","");


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
                             'name_f' => "Mr.",
                             'name_t' => "Bunny".$num,
                            'name_e' => 'Bunny',
                            'id_card' => '9999999999999',
                            'sv_code' => '1234',
                             'lr' => $lr_mem+1,
                             'mdate' => $mdate,
                             'exp_date' =>date("Y-m-d", strtotime("first day of $mdate  +1 Year")),
                             'upa_code' => $mcode1,
                          //   'sp_code2' => check_last_member(),
                             'sp_code' => check_last_member(),
                             'pos_cur' => $pos_cur[array_rand($pos_cur,1)],
                             'pos_cur2' => $pos_cur2[array_rand($pos_cur2,1)],
                             'locationbase' => '1',
                             'sv_code' => '1234'
            );  
            insert("ali_member",$insert);                                              
          //  insert_asaleh($new_mcode,$tot_pv);  
             
     }else{  ///////// Empty tabel member 
            $new_mcode = "0000001";   
            $insert = array( 'mcode' => '0000001',
                             'name_f' => 'Mr.',
                             'name_t' => 'Bunny',
                             'name_e' => 'Bunny',
							'sv_code' => '1234',
                             'id_card' => '9999999999999',
                             'pos_cur' => $pos_cur[array_rand($pos_cur,1)],
                             'pos_cur2' => $pos_cur2[array_rand($pos_cur2,1)],
                            'locationbase' => '1',
                             'mdate' => $mdate,
                             'exp_date' =>date("Y-m-d", strtotime("first day of $mdate  +1 Year")),
                             'sv_code' => '1234'
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