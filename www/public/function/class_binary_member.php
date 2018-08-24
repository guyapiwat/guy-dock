<?   
class binary_member
{
    
    function get_data(){
        $sql="SELECT mcode,sp_code,name_t,status_doc,mdate,upa_code,lr,pos_cur,pos_cur2 FROM ali_member  ORDER BY id DESC";  
        $rs = mysql_query($sql); 
        for($i=0;$i<mysql_num_rows($rs);$i++)
        {
            $sqlObj = mysql_fetch_object($rs);
            $data[$sqlObj->mcode]['mcode']= $sqlObj->mcode;
            $data[$sqlObj->mcode]['upa_code']= $sqlObj->upa_code;
            $data[$sqlObj->mcode]['name_t']= $sqlObj->name_t;
            $data[$sqlObj->mcode]['mdate']= $sqlObj->mdate;
            $data[$sqlObj->mcode]['sp_code']= $sqlObj->sp_code;    
            $data[$sqlObj->mcode]['pos_cur']= $sqlObj->pos_cur;  
            $data[$sqlObj->mcode]['status_doc']= $sqlObj->status_doc;  
            $data[$sqlObj->mcode]['pos_cur2']= $sqlObj->pos_cur2;  
            $data[$sqlObj->mcode]['lr']= $sqlObj->lr;  
        } 
        return $data;
    }  
        
    function get_point_binaryxx($data,$mcode='',$fdate,$tdate){
            $group_b = " GROUP BY mcode ";  
            $where = "sa_type <> 'H'  and cancel=0 and tot_pv > 0  and sadate >= '$fdate' and sadate <= '$tdate' ";
            //$whereh = "sa_type = 'Q'  and cancel=0 and tot_bv > 0  and sadate >= '$fdate' and sadate <= '$tdate' ";
            $sql = " SELECT mcode,SUM(tot_pv) as tot_pv,sadate as sadate FROM  ";
            $sql .= " ( ";
            $sql .= " SELECT mcode,IF(sa_type ='A',SUM(tot_pv),SUM(tot_bv)) as tot_pv,sadate as sadate  FROM ali_asaleh ";
            $sql .= "    WHERE ".$where." $group_b ";
            $sql .= " UNION ALL ";
            $sql .= " SELECT mcode,IF(sa_type ='A',SUM(tot_pv),SUM(tot_bv)) as tot_pv,sadate as sadate  FROM ali_holdhead ";
            $sql .= "    WHERE ".$where." $group_b ";
            $sql .= " ) as tb ";    
            $sql .= " $group_b ";  
            $rs = mysql_query($sql);
            $num =  mysql_num_rows($rs);  
            if(mysql_num_rows($rs) > 0)
            {
                for($i=0;$i<$num;$i++)
                {
                    $row = mysql_fetch_object($rs);     
                    $tot_pv = $row->tot_pv;    
                    $mcodex = $row->mcode;    
                    $sadate = $row->sadate;  
      
                    $path = $this->get_part_upa($data[$mcodex],$data);   
                    foreach($path as $upa => $val){ 
                        if($upa==$mcode){   
                             $point['point_'.$val['lr_bn']] = $point['point_'.$val['lr_bn']]+$tot_pv;    
                             //$point['point']['point_'.$val['lr_bn']] = $point['point']['point_'.$val['lr_bn']]+$tot_pv;    
                        } 
                    } 
                }  
            }
          return $point;   
    }
    function get_point_binary($data,$mcode='',$fdate,$tdate){       
       // $group_b = " GROUP BY YEAR(sadate), MONTH(sadate),mcode ";
        $group_b = " GROUP BY mcode ";
        $where = "sa_type = 'A'  and cancel=0 and tot_pv > 0 and sadate >= '$fdate' and sadate <= '$tdate' ";
        $sql  = " SELECT mcode,SUM(tot_pv) as tot_pv,sadate FROM  ";
        $sql .= " ( ";
        $sql .= " SELECT mcode,SUM(tot_pv) as tot_pv,DATE_FORMAT(sadate, '%Y-%m') as sadate  FROM ali_asaleh ";
        $sql .= "    WHERE ".$where." $group_b ";       
        $sql .= " UNION ALL ";
        $sql .= " SELECT mcode,SUM(tot_pv) as tot_pv,DATE_FORMAT(sadate, '%Y-%m') as sadate  FROM ali_holdhead ";
        $sql .= "    WHERE ".$where." $group_b";  
        $sql .= " ) as tb ";
        $sql .= " $group_b ";    
        $rs = mysql_query($sql);
        $num =  mysql_num_rows($rs);
        if(mysql_num_rows($rs) > 0)
        {
            for($i=0;$i<$num;$i++)
            {
                $row = mysql_fetch_object($rs);     
                $tot_pv = $row->tot_pv;    
                $mcodex = $row->mcode;    
                $sadate = $row->sadate;  
  
                $path = $this->get_part_upa($data[$mcodex],$data);   
                foreach($path as $upa => $val){ 
                    if($upa==$mcode){   
                         $point['point_'.$val['lr_bn']] = $point['point_'.$val['lr_bn']]+$tot_pv;    
                         //$point['point']['point_'.$val['lr_bn']] = $point['point']['point_'.$val['lr_bn']]+$tot_pv;    
                    } 
                } 
            }  
        }
        
        $where = "sa_type = 'Q'  and cancel=0 and tot_bv > 0 and sadate >= '$fdate' and sadate <= '$tdate' ";
        $sql = " SELECT mcode,SUM(tot_bv) as tot_bv,sadate FROM  ";
        $sql .= " ( ";
        $sql .= " SELECT mcode,SUM(tot_bv) as tot_bv,DATE_FORMAT(sadate, '%Y-%m') as sadate   FROM ali_asaleh ";
        $sql .= "    WHERE ".$where." $group_b ";
        $sql .= " UNION ALL ";
        $sql .= " SELECT mcode,SUM(tot_bv) as tot_bv,DATE_FORMAT(sadate, '%Y-%m') as sadate   FROM ali_holdhead ";
        $sql .= "    WHERE ".$where." $group_b ";
        $sql .= " ) as tb ";    
        $sql .= " $group_b ";     
        $rs = mysql_query($sql);     
        $num =  mysql_num_rows($rs);
        if(mysql_num_rows($rs) > 0)
        {
            for($i=0;$i<$num;$i++)
            {
                $row = mysql_fetch_object($rs);   
                $tot_bv = $row->tot_bv;    
                $mcodex = $row->mcode; 
                $sadate = $row->sadate; 
                $path = $this->get_part_upa($data[$mcodex],$data); 
                foreach($path as $upa => $val){ 
                    if($upa==$mcode){
                         $point['point_'.$val['lr_bn']] = $point['point_'.$val['lr_bn']]+$tot_bv;    
                         //$point['point']['point_'.$val['lr_bn']] = $point['point']['point_'.$val['lr_bn']]+$tot_bv;    
                    } 
                } 
            }  
        } 
        
        
        
        
       // $data[$mcode] = array_merge($data[$mcode],$point);
        return $point;   
    }
      
    function get_path_binary($main_data,$mcode){
       $binay  = array();
       if($mcode != ''){
           foreach($main_data as $key => $val){
               $path =  $this->get_part_upa($val,$main_data);  
               foreach($path as $keyx => $valx){
                  if($keyx == $mcode){  
                      $stauts['All'] = $stauts['All'] +1;     
                      $stauts['pos_cur'][$val['pos_cur']] = $stauts['pos_cur'][$val['pos_cur']]+1;     
                      if($val['pos_cur2'])$stauts['pos_cur2'][$val['pos_cur2']] = $stauts['pos_cur2'][$val['pos_cur2']]+1; 
                      $stauts['lr'][$valx['lr_bn']] = $stauts['lr'][$valx['lr_bn']]+1;    
                      $array["lr_".$valx['lr_bn']]['pos_cur'][$val['pos_cur']]  = $array["lr_".$valx['lr_bn']]['pos_cur'][$val['pos_cur']] +1;   
                      if($val['pos_cur2'])$array["lr_".$valx['lr_bn']]['pos_cur2'][$val['pos_cur2']]  = $array["lr_".$valx['lr_bn']]['pos_cur2'][$val['pos_cur2']] +1;   
                                                                                                                                                           
                                                       
                      $binary[$mcode]['member'][$key] = array_merge($val,$valx);  
                      $sponser = $this->get_part_sp($val,$main_data); 
                      foreach($sponser as $keyxx => $valxx){ 
                        if($keyxx == $mcode){   
                            $binary[$mcode]['member'][$key] = array_merge($binary[$mcode]['member'][$key],$valxx); 
                        }         
                      } 
                     
                  }       
               }
           
           }           
          $binary['status'] = array_merge($stauts,$array);  
          return $binary;     
       }
    } 
       
    function get_path_sponser($main_data,$mcode){   
       $sponser  = array(); 
       if($mcode != ''){
           foreach($main_data as $key => $val){   
               $path_sp =  $this->get_part_sp($val,$main_data);  
               foreach($path_sp as $key_sp => $key_spx){
                  if($key_sp == $mcode){ 
                      $valx = $this->get_lr_sp($val,$main_data,$mcode);                                    
                      $stauts['All'] = $stauts['All'] +1;     
                      $stauts['pos_cur'][$val['pos_cur']] = $stauts['pos_cur'][$val['pos_cur']]+1;     
                      if($val['pos_cur2'])$stauts['pos_cur2'][$val['pos_cur2']] = $stauts['pos_cur2'][$val['pos_cur2']]+1; 
                      $stauts['lr'][$valx['lr_sp']] = $stauts['lr'][$valx['lr_sp']]+1;    
                      $array["lr_".$valx['lr_sp']]['pos_cur'][$val['pos_cur']]  = $array["lr_".$valx['lr_sp']]['pos_cur'][$val['pos_cur']] +1;   
                      if($val['pos_cur2'])$array["lr_".$valx['lr_sp']]['pos_cur2'][$val['pos_cur2']]  = $array["lr_".$valx['lr_sp']]['pos_cur2'][$val['pos_cur2']] +1; 
                      
                      $sponser[$mcode]['member'][$key] = array_merge($val,$valx);   
                      $sponser[$mcode]['member'][$key] = array_merge($sponser[$mcode]['member'][$key],$key_spx);  
                  }
               } 
           } 
          $sponser['status'] = array_merge($stauts,$array);
          return $sponser;  
       }
    }   
     
     function get_path_sponser_level1($main_data,$mcode){
       $binay  = array();
       if($mcode != ''){
           foreach($main_data as $key => $val){
               if($val['sp_code'] == $mcode){
                   $path =  $this->get_part_upa($val,$main_data);  
                   foreach($path as $keyx => $valx){
                      if($keyx == $mcode){  
                          $stauts['All'] = $stauts['All'] +1;     
                          $stauts['pos_cur'][$val['pos_cur']] = $stauts['pos_cur'][$val['pos_cur']]+1;     
                          if($val['pos_cur2'])$stauts['pos_cur2'][$val['pos_cur2']] = $stauts['pos_cur2'][$val['pos_cur2']]+1; 
                          $stauts['lr'][$valx['lr_bn']] = $stauts['lr'][$valx['lr_bn']]+1;    
                          $array["lr_".$valx['lr_bn']]['pos_cur'][$val['pos_cur']]  = $array["lr_".$valx['lr_bn']]['pos_cur'][$val['pos_cur']] +1;   
                          if($val['pos_cur2'])$array["lr_".$valx['lr_bn']]['pos_cur2'][$val['pos_cur2']]  = $array["lr_".$valx['lr_bn']]['pos_cur2'][$val['pos_cur2']] +1;   
                          
                          $binary[$mcode]['member'][$key] = array_merge($val,$valx);  
                          $sponser = $this->get_part_sp($val,$main_data); 
                          foreach($sponser as $keyxx => $valxx){ 
                            if($keyxx == $mcode){   
                                $binary[$mcode]['member'][$key] = array_merge($binary[$mcode]['member'][$key],$valxx); 
                            }         
                          } 
                         
                      }       
                   } 
               } 
           }           
          $binary['status'] = array_merge($stauts,$array);  
          return $binary;     
       }
    } 
    function get_part_upa($val,$data,$level=0){    
        $path = array();   
        if($val['upa_code'] != ''){
          // $path[$val['upa_code']]['upa_code'] = $val['upa_code'];  
           $path[$val['upa_code']]['lr_bn'] = $val['lr'];  
           $path[$val['upa_code']]['level_bn'] = ++$level;  
           $path = array_merge($path,$this->get_part_upa($data[$val['upa_code']],$data,$level));     
        } 
       return $path;
    }
         
    function get_part_sp($val,$data,$level=0){   
        $path = array(); 
        if($val['sp_code'] != ''){
         //  $path[$val['sp_code']]['sp_code'] = $val['sp_code'];  
           $path[$val['sp_code']]['level_sp'] = ++$level;                               
           $path = array_merge($path,$this->get_part_sp($data[$val['sp_code']],$data,$level));     
        } 
       return $path;  
    }       
    function get_lr_sp($val,$data,$sp_code,$level=0){ 
        $path = array(); 
        if($val['upa_code'] != ''){
            if($val['upa_code'] == $sp_code){
                $datax['lr_sp'] = $val['lr'];
                $datax['level_bn'] = ++$level;
                return $datax;
            }else{
                ++$level;
                return $this->get_lr_sp($data[$val['upa_code']],$data,$sp_code,$level);
            } 
        }  
    }
    
    
    ///// show 
    
    function showposition($data,$where){  
        $sql="SELECT posshort,posname,posimg FROM ali_position WHERE ".$where." and posshort <> 'TN' ORDER BY posid ASC ";   
        $rs = mysql_query($sql);   
        for($k=1;$k<=mysql_num_rows($rs);$k++){  
            $sqlObj = mysql_fetch_object($rs); 
           // if($binary[$fmcode]['pos_cur'][$sqlObj->posshort] > 0){
                $position[$k]['posname'] = $sqlObj->posname;
                $position[$k]['posshort'] = $sqlObj->posshort;
                $position[$k]['posimg'] = $sqlObj->posimg;
                if($data[$sqlObj->posshort] > 0){
                    $position[$k]['member'] = $data[$sqlObj->posshort]; 
                    $position['All'] = $position['All']+$data[$sqlObj->posshort];
                }else {
                    $position[$k]['member'] = 0; 
                }   
        }                      
        return  $position;            
    }
}
     

?>