<?
include("connectmysql.php");
include("../function/function_pos.php");
include("comsn/com_a/comsn_a_calc_func.php");
$dbprefix = 'ali_';
$ro = '888';
$fdate = '2016-08-23';
$tdate = '2016-08-23';
 
//del('ali_apv','1=1');
//del('ali_ac','1=1');
//del('ali_ambonus','1=1');
//del('ali_bm','1=1');
//del('ali_bmbonus','1=1');
//del('ali_commission','1=1');

		//fnc_calc_fast_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);
	//	fnc_calc_b_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);		
		fnc_summary_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);

exit;


function fnc_welcome_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){
  
    $where = "sadate >= '".$fdate."' and sadate <= '".$tdate."' and sa_type='A' and cancel=0 and tot_pv > 0 ";
    $sql = " SELECT mcode,SUM(tot_pv) as tot_pv FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT ash.mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh ash ";
    $sql .= " LEFT JOIN ali_member mb on(mb.mcode = ash.mcode) ";
    $sql .= "    WHERE ".$where." and sadate <= mb.exp_pos_60  GROUP BY mcode ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT hoh.mcode,SUM(tot_pv) as tot_pv  FROM ali_holdhead hoh ";
    $sql .= " LEFT JOIN ali_member mb on(mb.mcode = hoh.mcode) ";
    $sql .= "    WHERE ".$where." and sadate <= mb.exp_pos_60 GROUP BY mcode ";
    $sql .= " ) as tb ";
    $sql .= " GROUP BY mcode ";  
 
    $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    $arr = array(); 
    if(mysql_num_rows($rs) > 0)
    {
        for($i=0;$i<$num;$i++)
        {
            $row = mysql_fetch_object($rs);
            $mcode = $row->mcode;
            $tot_pv = $row->tot_pv;     
            if($tot_pv > 0)
            {
               $arr = array(
                        "rcode"        => $ro,
                        "mcode"        => $mcode,
                        "total_pv"    => $tot_pv
                );            
                insert('ali_apv',$arr);    
            }
        }
    }
    
        
    
    
}





















///insertStructureMember();
//fnc_unilevel_bonusxx("ali_","1","2016-01-01","2016-03-11","2016-01-01","2016-03-11");
function fnc_calc_rebate_bonusxx($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){
    $where = "sadate >= '".$fdate."' and sadate <= '".$tdate."' and sa_type='A' and cancel=0";
    $sql = " SELECT mcode,SUM(tot_pv) as tot_pv FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh ";
    $sql .= "    WHERE ".$where." GROUP BY mcode ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_holdhead ";
    $sql .= "    WHERE ".$where." GROUP BY mcode ";
    $sql .= " ) as tb ";
    $sql .= " GROUP BY mcode ";  
    $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    $arr = array(); 
    if(mysql_num_rows($rs) > 0)
    {
        for($i=0;$i<$num;$i++)
        {
            $row = mysql_fetch_object($rs);
            $mcode = $row->mcode;
            $tot_pv = $row->tot_pv;     
            if($tot_pv > 0)
            {
               $arr = array(
                        "rcode"        => $ro,
                        "mcode"        => $mcode,
                        "total_pv"    => $tot_pv
                );            
                insert('ali_rpv',$arr);    
            }
        }
    }
	
	$sql  = "SELECT * FROM ali_rpv ";
	$sql .= "WHERE 1 = 1 ";
	$sql .= "and rcode = '".$ro."'";
	$rs   = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$object = mysql_fetch_object($rs);	
			$mcode  = $object->mcode;
			$total_pv = $object->total_pv;
			$percen = 0;
			if($total_pv > 3000){$percen = 0.3;}
			else{$percen = 0.1;}
			$rmbonus_total = ($total_pv*$percen);
			$rmbonus_tax   = ($rmbonus_total*5)/100;
			$rmbonus	   = $rmbonus_total-$rmbonus_tax;
			if($rmbonus_total > 0)
			{
			   $arr = array(
					"rcode"=>$ro, 
					"mcode"=>$mcode, 
					"total"=>$rmbonus_total,
					"tot_pv"=>$total_pv,
					"tax"=>$rmbonus_tax,
					"bonus"=>$rmbonus,
					"fdate"=>$fdate,
					"tdate"=>$tdate,
					"pos_cur"=>"MB"
				);            
				insert('ali_rmbonus',$arr);    
			}
		}
	}
}
function fnc_calc_fast_bonusxx($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){

    $maxlv=1;
    $where = "sadate >= '".$fdate."' and sadate <= '".$tdate."' and sa_type='A' and cancel=0";
    $sql = " SELECT mcode,SUM(tot_pv) as tot_pv FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh ";
    $sql .= "    WHERE ".$where." GROUP BY mcode ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_holdhead ";
    $sql .= "    WHERE ".$where." GROUP BY mcode ";
    $sql .= " ) as tb ";
    $sql .= " GROUP BY mcode ";  
    $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    $arr = array(); 
    if(mysql_num_rows($rs) > 0)
    {
        for($i=0;$i<$num;$i++)
        {
            $row = mysql_fetch_object($rs);
            $mcode = $row->mcode;
            $tot_pv = $row->tot_pv;     
            if($tot_pv > 0)
            {
               $arr = array(
                        "rcode"        => $ro,
                        "mcode"        => $mcode,
                        "total_pv"    => $tot_pv
                );            
                insert('ali_apv',$arr);    
            }
        }
    }
    
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
    }
  
  
    $sql="select rcode,mcode,total_pv from ".$dbprefix."apv where rcode = '$ro' ";  
    $rs = mysql_query($sql);
    for($i=0;$i<mysql_num_rows($rs);$i++){
        $sqlObj        = mysql_fetch_object($rs);
        $apv_rcode     = $sqlObj->rcode;
        $apv_mcode     = $sqlObj->mcode;
        $apv_total_pv  = $sqlObj->total_pv; 
        $path = array();  
        $path = get_part_sp($data[$apv_mcode],$data);
        $glv = 1;
        
           foreach($path as $sp_code => $val){ 
               $flg=false;    
               if($glv <= $maxlv){ 
                 switch ($glv){        
                     case 1 :       
                         if($apv_total_pv > 3000){
                            $flg = true; 
                            $bonus = 0.05; 
                            $apv_total = ($apv_total_pv*$bonus);  
                         } 
                     break;  
                     default:
                         $flg=false;
                         $bonus = 0;
                         $apv_total =0;
                     break;
                 }
                     
                    if($flg==true) {    
                        $insert = array(
                                    "rcode"        => $ro,
                                    "mcode"        => $apv_mcode,
                                    "upa_code"     => $val['sp_code'],
                                    "pv"           => $apv_total_pv,
                                    "level"        => $glv,
                                    "gen"          => $val['level'],                
                                    "percer"       => $bonus,                     
                                    "total"        => $apv_total,
                                    "fdate"        => $fdate,    
                                    "tdate"        => $tdate,    
                                    "pos_cur"      => $val['pos_cur'],
                          );                                          
                        insert('ali_ac',$insert);   
                    }
                    $glv=($glv+1);    
                }  
              }  
    }
              
    $sql = " insert into ".$dbprefix."ambonus  (rcode, mcode, total,tot_pv,tax,bonus,fdate,tdate,pos_cur) ";
    $sql .= "    select '$ro', upa_code,sum(total) as totalpv,sum(pv) as pvpv,sum(total)*5/100 as tax,sum(total)-sum(total)*5/100 as bonus,'$fdate','$tdate',pos_cur from ".$dbprefix."ac WHERE  rcode='$ro' and upa_code<>'' and pos_cur <> 'TN' group by upa_code ";
    if (! mysql_query($sql)) {
        echo "<font color='#FF0000'>error</font><br>";
        echo  "$sql<br>";
        echo  die(mysql_error());
        exit;
    }
         
}
function fnc_leader_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){
    $max_pos = array("MB" => 5);
    $bonus = array("1" => array("MB" =>0.05,"S" =>0.05,"SV" =>0.05,"M" =>0.05,"D" =>0.05,"SD" =>0.05,"AVP" =>0.05,"AP" =>0.05,"SVP" =>0.05,"EVP" =>0.05,"SEVP" =>0.05,"PEVP" =>0.05,"P" =>0.05),
            "2" => array("MB" =>0.10,"S" =>0.20,"SV" =>0.25,"M" =>0.25,"D" =>0.25,"SD" =>0.25,"AVP" =>0.25,"AP" =>0.25,"SVP" =>0.25,"EVP" =>0.25,"SEVP" =>0.25,"PEVP" =>0.25,"P" =>0.25),
            "3" => array("MB" =>0.08,"S" =>0.08,"SV" =>0.08,"M" =>0.10,"D" =>0.10,"SD" =>0.10,"AVP" =>0.10,"AP" =>0.10,"SVP" =>0.10,"EVP" =>0.10,"SEVP" =>0.10,"PEVP" =>0.10,"P" =>0.10),
            "4" => array("MB" =>0.05,"S" =>0.05,"SV" =>0.05,"M" =>0.05,"D" =>0.10,"SD" =>0.10,"AVP" =>0.10,"AP" =>0.10,"SVP" =>0.10,"EVP" =>0.10,"SEVP" =>0.10,"PEVP" =>0.10,"P" =>0.10),
            "5" =>array("MB" =>0.02,"S" =>0.02,"SV" =>0.02,"M" =>0.03,"D" =>0.03,"SD" =>0.03,"AVP" =>0.03,"AP" =>0.03,"SVP" =>0.03,"EVP" =>0.03,"SEVP" =>0.03,"PEVP" =>0.03,"P" =>0.03),
            "6" =>array("MB" =>0.00,"S" =>0.00,"SV" =>0.00,"M" =>0.00,"D" =>0.02,"SD" =>0.03,"AVP" =>0.03,"AP" =>0.03,"SVP" =>0.03,"EVP" =>0.03,"SEVP" =>0.03,"PEVP" =>0.03,"P" =>0.03),
            "7" =>array("MB" =>0.00,"S" =>0.00,"SV" =>0.00,"M" =>0.00,"D" =>0.00,"SD" =>0.02,"AVP" =>0.02,"AP" =>0.02,"SVP" =>0.02,"EVP" =>0.02,"SEVP" =>0.02,"PEVP" =>0.02,"P" =>0.02),
            "8" =>array("MB" =>0.00,"S" =>0.00,"SV" =>0.00,"M" =>0.00,"D" =>0.00,"SD" =>0.02,"AVP" =>0.02,"AP" =>0.02,"SVP" =>0.02,"EVP" =>0.02,"SEVP" =>0.02,"PEVP" =>0.02,"P" =>0.02),
            );
    
    $maxlv=8; 
     
    $where = "sadate >= '{$fdate}' and sadate <= '{$tdate}' and sa_type='A' and cancel=0 and tot_pv > 0 ";
    $sql = " SELECT mcode,SUM(tot_pv) as tot_pv FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT ash.mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh ash ";
    $sql .= " LEFT JOIN ali_member mb on(mb.mcode = ash.mcode) ";
    $sql .= "    WHERE {$where} and sadate > mb.exp_pos_60  GROUP BY mcode ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT hoh.mcode,SUM(tot_pv) as tot_pv  FROM ali_holdhead hoh ";
    $sql .= " LEFT JOIN ali_member mb on(mb.mcode = hoh.mcode) ";
    $sql .= "    WHERE {$where} and sadate > mb.exp_pos_60 GROUP BY mcode ";
    $sql .= " ) as tb ";
    $sql .= " GROUP BY mcode ";  
    
    $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    $arr = array(); 
  
    if(mysql_num_rows($rs) > 0)
    {
        for($i=0;$i<$num;$i++)
        {
            $row = mysql_fetch_object($rs);
            $mcode = $row->mcode;
            $tot_pv = $row->tot_pv;     
            if($tot_pv > 0)
            {
               $arr = array(
                        "rcode"        => $ro,
                        "mcode"        => $mcode,
                        "total_pv"    => $tot_pv
                );            
                insert('ali_mpv',$arr);    
            }
        }
    }
    
    $sql="SELECT mcode,sp_code,upa_code,lr,pos_cur FROM ".$dbprefix."member ORDER BY id DESC";   
    $rs = mysql_query($sql);
    for($i=0;$i<mysql_num_rows($rs);$i++){
        $sqlObj = mysql_fetch_object($rs);
        $data[$sqlObj->mcode]['mcode']= $sqlObj->mcode;
        $data[$sqlObj->mcode]['upa_code']= $sqlObj->upa_code;
        $data[$sqlObj->mcode]['sp_code']= $sqlObj->sp_code;
        $dataxx =  get_detail_meber($sqlObj->mcode,$tdate);
        $status =  check_status($sqlObj->mcode,$dataxx['pos_cur'],$fdate);  
        $data[$sqlObj->mcode]['status']= $status['status'];
        $data[$sqlObj->mcode]['pos_cur']= $dataxx['pos_cur1'];
        $data[$sqlObj->mcode]['lr']= $sqlObj->lr;                               
        $data[$sqlObj->mcode][1] = array('member' => 0); 
        $data[$sqlObj->mcode][2] = array('member' => 0); 
    }
  
  
    $sql="select rcode,mcode,total_pv from ".$dbprefix."mpv where rcode = '$ro' ";  
    $rs = mysql_query($sql);
    for($i=0;$i<mysql_num_rows($rs);$i++){
        $sqlObj        = mysql_fetch_object($rs);
        $apv_rcode     = $sqlObj->rcode;
        $apv_mcode     = $sqlObj->mcode; 
        $apv_total_pv  = $sqlObj->total_pv;  /// 10% 
        $path = get_part_upa($data[$apv_mcode],$data);
        $glv = 1;
        $level = 1;
        foreach($path as $sp_code => $val){  
           $bonus = $apv_total = 0;
           if($glv <= $maxlv){   
               if($data[$sp_code]['status'] == 1){
                   $bonus = $bonus[$glv][$val['pos_cur1']];
                   $apv_total  = $apv_total_pv*$bonus;  /// 10% 
                   $insert = array(
                            "rcode"        => $ro,
                            "mcode"        => $apv_mcode,
                            "upa_code"     => $sp_code,
                            "pv"           => $apv_total_pv,
                            "level"        => $glv,
                            "gen"          => $val['level'], 
                            "percer"       => $bonus,                     
                            "total"        => $apv_total,
                            "fdate"        => $fdate,    
                            "tdate"        => $tdate,    
                            "pos_cur"      => $val['pos_cur1'], 
                  ); 
                  insert('ali_mc',$insert);
                  $glv=($glv+1); 
               }
           }
          $level++; 
       }  
          
    }
    $sql = " insert into ".$dbprefix."mmbonus  (rcode, mcode, total,tot_pv,tax,bonus,fdate,tdate,pos_cur) ";
    $sql .= "    select '$ro', upa_code,sum(total) as totalpv,sum(pv) as pvpv,sum(total)*5/100 as tax,sum(total)-sum(total)*5/100 as bonus,'$fdate','$tdate',pos_cur from ".$dbprefix."mc WHERE  rcode='$ro' and upa_code<>'' and pos_cur <> 'TN' group by upa_code ";
    if (! mysql_query($sql)) {
        echo "<font color='#FF0000'>error</font><br>";
        echo  "$sql<br>";
        echo  die(mysql_error());
        exit;
    }
} 


function fnc_mentor_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){
     global $pos_piority1;
     $bonus = array("1" => array("D" =>0.05,"SD" =>0.05,"AVP" =>0.05,"AP" =>0.05,"SVP" =>0.05,"EVP" =>0.05,"SEVP" =>0.05,"PEVP" =>0.05,"P" =>0.05),
                     "2" => array("D" =>0.00,"SD" =>0.05,"AVP" =>0.05,"AP" =>0.05,"SVP" =>0.05,"EVP" =>0.05,"SEVP" =>0.05,"PEVP" =>0.05,"P" =>0.05),  
                     "3" => array("D" =>0.00,"SD" =>0.00,"AVP" =>0.05,"AP" =>0.05,"SVP" =>0.05,"EVP" =>0.05,"SEVP" =>0.05,"PEVP" =>0.05,"P" =>0.05),
                     "4" => array("D" =>0.00,"SD" =>0.00,"AVP" =>0.00,"AP" =>0.05,"SVP" =>0.05,"EVP" =>0.05,"SEVP" =>0.05,"PEVP" =>0.05,"P" =>0.05),
                     "5" => array("D" =>0.00,"SD" =>0.00,"AVP" =>0.00,"AP" =>0.00,"SVP" =>0.05,"EVP" =>0.05,"SEVP" =>0.05,"PEVP" =>0.05,"P" =>0.05),
                    );
 
    $sql="SELECT mcode,sp_code,upa_code,lr,pos_cur,pos_cur1 FROM ".$dbprefix."member ORDER BY id DESC";   
    $rs = mysql_query($sql);
    for($i=0;$i<mysql_num_rows($rs);$i++){
        $sqlObj = mysql_fetch_object($rs);
        $data[$sqlObj->mcode]['mcode']= $sqlObj->mcode; 
        $data[$sqlObj->mcode]['sp_code']= $sqlObj->sp_code;
        $dataxx =  get_detail_meber($sqlObj->mcode,$tdate);  
        $data[$sqlObj->mcode]['pos_cur']= $dataxx['pos_cur'];  
        $data[$sqlObj->mcode]['pos_cur1']= $dataxx['pos_cur1'];  
        $data[$sqlObj->mcode]['tot_pv']= 0;  
    } 

    $where = "sadate >= '{$fdate}' and sadate <= '{$tdate}' and sa_type='A' and cancel=0 and tot_pv > 0 ";
    $sql = " SELECT mcode,SUM(tot_pv) as tot_pv FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT ash.mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh ash ";
    $sql .= " LEFT JOIN ali_member mb on(mb.mcode = ash.mcode) ";
    $sql .= "    WHERE {$where} and sadate > mb.exp_pos_60  GROUP BY mcode ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT hoh.mcode,SUM(tot_pv) as tot_pv  FROM ali_holdhead hoh ";
    $sql .= " LEFT JOIN ali_member mb on(mb.mcode = hoh.mcode) ";
    $sql .= "    WHERE {$where} and sadate > mb.exp_pos_60 GROUP BY mcode ";
    $sql .= " ) as tb ";
    $sql .= " GROUP BY mcode ";
   
    $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    $arr = array();
    if(mysql_num_rows($rs) > 0){
        for($i=0;$i<$num;$i++){
            $row = mysql_fetch_object($rs); 
            $data[$row->mcode]['tot_pv']= $row->tot_pv;   
        }
        
    }  
    
    $data_dr = array();  
    foreach($data as $mcode => $val):
        if($pos_piority1[$val['pos_cur1']] >= 3)$data_dr[] = $mcode; 
    endforeach; 

    $array_dr = $array_mde = array();
    foreach($data as $mcode => $val):  
        $parts = get_part_sp($val,$data,$level=0);
        if($pos_piority1[$val['pos_cur1']] >= 3){ 
             $array_dr[$mcode][] = $val;
             $array_dr[$mcode]['total'] += $data[$mcode]['tot_pv'];
             $insert = array(
                                "rcode"        => $ro,
                                "mcode"        => $mcode,
                                "upa_code"     => $mcode,
                                "pv"           => $data[$mcode]['tot_pv'], // all pv
                                "level"        => 0,
                                "fdate"        => $fdate,    
                                "tdate"        => $tdate,        
                                "pos_cur"      => $val['pos_cur'],
                                "type"         => 'DR',
                            );    
            if($data[$mcode]['tot_pv']>0)insert('ali_acc3',$insert); 
         }
       
        foreach($parts as $sp_code => $valx):   
             $set_dr = searchForVal($sp_code,$data_dr);    
             if($set_dr != false){
                 if(!in_array($mcode,$data_dr)){
                    $array_dr[$set_dr][] = $val;  
                    $array_dr[$set_dr]['total'] += $val['tot_pv']; 
                    $insert = array(
                                "rcode"        => $ro,
                                "mcode"        => $mcode,
                                "upa_code"     => $set_dr,
                                "pv"           => $val['tot_pv'], // all pv
                                "level"        => $valx['level'],
                                "fdate"        => $fdate,    
                                "tdate"        => $tdate,        
                                "pos_cur"      => $val['pos_cur'],
                                "type"         => 'DR',
                            );    
                    if($data[$mcode]['tot_pv']>0)insert('ali_acc3',$insert);
                 }
                 break;
             }  
        endforeach; 
    endforeach;
 
     
    foreach($array_dr as $mcode => $val): 
        $parts = get_part_sp($data[$mcode],$data,$level=0);  
        $gen = 1;
        foreach($parts as $sp_code => $valx):
            if($bonus[$gen][$valx['pos_cur1']] > 0 and $gen <= 5){ 
                     $percer = $bonus[$gen][$valx['pos_cur1']]; 
                     $bonus1 = $percer*$val['total'];
                     $insert = array(
                                "rcode"        => $ro,
                                "mcode"        => $mcode,
                                "upa_code"     => $valx['sp_code'],
                                "pv"           => $val['total'], // all pv
                                "level"        => $gen,
                                "gen"          => $valx['level'],                
                                "percer"       => $percer,                     
                                "total"        => $bonus1,                     
                                "fdate"        => $fdate,    
                                "tdate"        => $tdate,         
                                "pos_cur"      => $data[$mcode]['pos_cur1'],
                                "type"         => 'DR',
                            );    
                   if($bonus1>0)insert('ali_ac3',$insert);
             } $gen++;  
       endforeach; 
    endforeach; 
            
    $sql = " insert into ".$dbprefix."ambonus3  (rcode, mcode,name_t, total,tot_pv,tax,bonus,fdate,tdate,pos_cur,crate,locationbase) ";
        $sql .= "    select '$ro', upa_code,upa_name,sum(total) as totalpv,sum(pv) as pvpv,sum(total)*5/100 as tax,sum(total)-sum(total)*5/100 as bonus,'$fdate','$tdate',pos_cur,'1','1' from ".$dbprefix."ac3 WHERE  rcode='$ro' and upa_code<>'' and pos_cur <> 'TN' group by upa_code ";
        if (! mysql_query($sql)) {
            echo "<font color='#FF0000'>error</font><br>";
            echo  "$sql<br>";
            echo  die(mysql_error());
            exit;
      }
}


function searchForVal($mcode,$array) {
   foreach ($array as $val) {
       if ($val === $mcode) {
           return $val;
       }
   }
   return false;
}









function insertStructureMember($dbprefix="ali_"){
	mysql_query("TRUNCATE TABLE ali_structure_binary");
	$sql="SELECT mcode,lr FROM ".$dbprefix."member where mcode = '0000001'  ";
	$rsx = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rsx);$i++){
		$sqlObjxxx = mysql_fetch_object($rsx);
		$mcode_index = '1';
		$mcode_ref =$sqlObjxxx->mcode;	
		$mcode_level = strlen($mcode_index);
		mysql_query("insert into  ".$dbprefix."structure_binary (mcode_index,mcode_ref,mcode_level) values('$mcode_index','$mcode_ref','$mcode_level') ");
		isLine($dbprefix,$mcode_ref,$mcode_index);	
	}
}
function isLine($dbprefix,$mcode_ref,$mcode_index){
	$sql = "SELECT mcode,lr FROM ".$dbprefix."member WHERE sp_code2='$mcode_ref'  ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)> 0){
		$omcode_index = $mcode_index;
		//$olevel = $level+1;
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$j = $j+1;
			$sqlObj = mysql_fetch_object($rs);
			$mcode_ref = $sqlObj->mcode;
			$mcode_index = $omcode_index.''.$j;
			$mcode_level = strlen($mcode_index);
			mysql_query("insert into  ".$dbprefix."structure_binary (mcode_index,mcode_ref,mcode_level) values('$mcode_index','$mcode_ref','$mcode_level') ");
			isLine($dbprefix,$mcode_ref,$mcode_index);
		}
	}
}
function getmicrotimexx() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 
function del_calsxx($dbprefix,$ro,$name=array()) {                    
        foreach($name as $key => $value):                
        $sql="delete from ".$dbprefix.$value." where rcode  = '".$ro."'";
        
        if($value == 'ewallet')$sql.=" and cals = 'B'";
    //    if($value == 'commission')$sql.=" and cals = 'B'";
        if($value == 'calc_poschange1'  or $value == 'calc_poschange2')$sql.=" and type = '2'";
        //echo $sql.'<br>';
        if(mysql_query($sql)){
            mysql_query("COMMIT");
        }else{
            echo "error $sql<BR>";
        }
        endforeach;        
}
function get_pointlevel($dbprefix,$cmc,$level){
	$sql1="SELECT mcode_index  FROM ali_structure_binary WHERE mcode_ref = '".$cmc."' ";
	$rs1 = mysql_query($sql1);
	if(mysql_num_rows($rs1)>0){
		$sqlObj1 = mysql_fetch_object($rs1);
		$mcode_index = $sqlObj1->mcode_index;
		$chklevel =  strlen($mcode_index)+$level;
	}

	$sql1="SELECT mcode_ref  FROM ali_structure_binary WHERE mcode_level = '".$chklevel."' and mcode_index LIKE '".$mcode_index."%' ";
	$rsxx = mysql_query($sql1);
	if(mysql_num_rows($rsxx) > 0){
		for($jj=0;$jj<mysql_num_rows($rsxx);$jj++){
			$sqlObjxx = mysql_fetch_object($rsxx);
			$cmc = $sqlObjxx->mcode_ref;
			$where = " cancel = 0 and tot_pv > 0  and mcode = '".$cmc."' ";
			$sql  = " SELECT mcode,SUM(tot_pv) as tot_pv FROM  ";
			$sql .= " ( ";
			$sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh ";
			$sql .= "    WHERE ".$where." GROUP BY mcode ";
			$sql .= " UNION ALL ";
			$sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_holdhead ";
			$sql .= "    WHERE ".$where." GROUP BY mcode ";
			$sql .= " ) as tb ";
			$sql .= " GROUP BY mcode ";
			$rs = mysql_query($sql);
			$num =  mysql_num_rows($rs);
			if(mysql_num_rows($rs) > 0)
			{
				$row = mysql_fetch_object($rs);
				$data += $row->tot_pv;
			}
		}
	}

	return $data;
}
?>