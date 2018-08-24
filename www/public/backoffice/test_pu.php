<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>
<?
$dbprefix = 'ali_';
echo 'ssssss';
getInsert_bm_bill('ali_bm1','dddddd','0000005','DI','2000',date("Y-m-d"),date("Y-m-d"));
 
exit;
    $sql="SELECT mcode,sp_code,upa_code,lr,pos_cur FROM ".$dbprefix."member ORDER BY id DESC";   
    $rs = mysql_query($sql);
    for($i=0;$i<mysql_num_rows($rs);$i++){
        $sqlObj = mysql_fetch_object($rs);
        $data[$sqlObj->mcode]['mcode']= $sqlObj->mcode;
        $data[$sqlObj->mcode]['upa_code']= $sqlObj->upa_code;
        $data[$sqlObj->mcode]['sp_code']= $sqlObj->sp_code;
        $dataxx =  get_detail_meber($sqlObj->mcode,$tdate);   
        $data[$sqlObj->mcode]['pos_cur']= $dataxx['pos_cur'];
        $data[$sqlObj->mcode]['lr']= $sqlObj->lr;                               
        $data[$sqlObj->mcode][1] = array('member' => 0); 
        $data[$sqlObj->mcode][2] = array('member' => 0); 
    }
  
   $apv_total_pv = 200;
   $mcode = '0000012';
   $path = get_part_upa($data[$mcode],$data);
   echo "<pre>";
   print_r($path);
   echo "</pre>";
  
   foreach($path as $sp_code => $val){  
        
          echo "<pre>";
          print_r($val);
          echo "</pre>";
       
   }
    
