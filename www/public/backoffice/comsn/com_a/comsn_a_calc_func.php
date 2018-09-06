<?
function isLine_structure($dbprefix,$mcode_ref,$mcode_index){
	$sql = "SELECT mcode,lr FROM ".$dbprefix."member WHERE upa_code='$mcode_ref'  ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)> 0){
		$omcode_index = $mcode_index;
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode_ref = $sqlObj->mcode;
			$mcode_index = $omcode_index.''.$sqlObj->lr;
			mysql_query("insert into  ".$dbprefix."structure_binary (mcode_index,mcode_ref) values('$mcode_index','$mcode_ref') ");
			isLine_structure($dbprefix,$mcode_ref,$mcode_index);
		}
	}
}

function fnc_calc_stamp_wallet($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){
	$sql="SELECT mcode,ewallet,voucher,eatoship FROM ".$dbprefix."member where status_terminate = '0' and (ewallet > 0 or voucher > 0 or eatoship > 0 )  ";
	$rs = mysql_query($sql);
	//echo "$sql<BR>";
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlObj = mysql_fetch_object($rs);
		$mcode =$sqlObj->mcode;		
		$ewallet =$sqlObj->ewallet;		
		$voucher =$sqlObj->voucher;		
		$eatoship = $sqlObj->eatoship;
		
		mysql_query("insert into ".$dbprefix."log_wallet (rcode,fdate,tdate,mcode,ewallet,evoucher,eautoship) values('$ro','$fdate','$tdate','$mcode','$ewallet','$voucher','$eatoship') ");
	}
}

function return_ewallet($dbprefix,$table,$rcode,$fdate,$type=''){       
	
    if($rcode)$where = " and rcode= '$rcode'" ;
    if($fdate)$where1 = " and sadate= '$fdate'" ;
    
    $sql = "SELECT txtCommission as totalamt,sano,mcode,sa_type,sadate from ".$dbprefix.$table."  where  cancel = 0 and txtCommission >0 $where $where1";
     
    $rs = mysql_query($sql);
    if(@mysql_num_rows($rs) > 0){
        for($i=0;$i<mysql_num_rows($rs);$i++){
            $sqlObj = mysql_fetch_object($rs);
            $plana =$sqlObj->totalamt;
            $mcode =$sqlObj->mcode;
            $sadate =$sqlObj->sadate;
            $sa_type =$sqlObj->sa_type; 
            $sano =$sqlObj->sano; 
                              
            if($sa_type == 'CI' ){//IN
                $op = '-';
                $sa_typexx = 'CO';
            }else if ($sa_type == 'CO' ){//out
                $op = '+';
                $sa_typexx = 'CI';
            }  
            
            if($op == ''){
                echo "function return_ewallet ERROR";
                die;
            }
            
            $sql2 = ("UPDATE ali_member SET $table = $table $op $plana WHERE mcode = '$mcode'"); 
            //echo $sql2."<br>";         
            if(mysql_query($sql2)){  

                mysql_query("COMMIT");  
				$option = "Re Cal-A (".$sano.") Date : $sadate";
                log_ewallet($table,$mcode,$sano,$plana,$sa_typexx,date("Y-m-d"),$option);

				$option = "Re Cal-A (".$sano.") Date : $sadate";
                $update = array( '_option' => $option );
                update('ali_log_'.$table,$update," sano ='$sano' ");  
            }else{
                echo "error $sql<BR>";
            }
            
        }                 
    } 
    $update1 = array( 'cancel' => '1' );
    update($dbprefix.$table,$update1," sadate ='$fdate' and  txtCommission >0 and rcode = '$rcode' "); 

}
function func_structure_binary_rcode($dbprefix,$ro,$fdate,$tdate){
	$sql = "SELECT mcode,pos_cur,pos_cur1,pos_cur2,sp_code,status_terminate FROM ".$dbprefix."member WHERE mcode='TH0000001'";
	$rsx = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rsx);$i++){
		$sqlObjxxx = mysql_fetch_object($rsx);
		$mcode_index = '1';
		$mcode_ref =$sqlObjxxx->mcode;	
		$pos_cur = $sqlObjxxx->pos_cur;
		$pos_cur1 = $sqlObjxxx->pos_cur1;
		$pos_cur2 = $sqlObjxxx->pos_cur2;
		$sp_code = $sqlObjxxx->sp_code;
		$status_terminate = $sqlObjxxx->status_terminate;

		mysql_query("insert into  ".$dbprefix."structure_binary_rcode (rcode,mcode_index,mcode_ref,pos_cur,pos_cur1,pos_cur2,status_terminate,sp_code) values('$ro','$mcode_index','$mcode_ref','$pos_cur','$pos_cur1','$pos_cur2','$status_terminate','$sp_code') ");
		isLine_structure_rcode($dbprefix,$ro,$fdate,$tdate,$mcode_ref,$mcode_index);	
	}	
}
function isLine_structure_rcode($dbprefix,$ro,$fdate,$tdate,$mcode_ref,$mcode_index){
	$sql = "SELECT m.mcode,m.sp_code,m.pos_cur,m.pos_cur1,m.pos_cur2,m.status_terminate,m.lr,m.mdate ";
	$sql .= "FROM ".$dbprefix."member m ";
	$sql .= "where m.upa_code = '".$mcode_ref."' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)> 0){
		$omcode_index = $mcode_index;
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode_ref = $sqlObj->mcode;
			$sp_code = $sqlObj->sp_code;
			$pos_cur = $sqlObj->pos_cur;
			$pos_cur1 = $sqlObj->pos_cur1;
			$pos_cur2 = $sqlObj->pos_cur2;
			$mdate = $sqlObj->mdate;
			$status_terminate = $sqlObj->status_terminate;
			$mcode_index = $omcode_index.''.$sqlObj->lr;
			
			if($mdate <= $tdate)
			mysql_query("insert into  ".$dbprefix."structure_binary_rcode (rcode,mcode_index,mcode_ref,pos_cur,pos_cur1,pos_cur2,status_terminate,sp_code) values('$ro','$mcode_index','$mcode_ref','$pos_cur','$pos_cur1','$pos_cur2','$status_terminate','$sp_code') ");
			isLine_structure_rcode($dbprefix,$ro,$fdate,$tdate,$mcode_ref,$mcode_index);
		}
	}
}
function func_position_first($dbprefix,$ro,$fdate,$tdate){
	$pos_piority = array('VIP'=>3,'PRO'=>2,'DIS'=>1,'MB'=>0);

	$data = query('mcode,pos_cur','ali_member'," mdate<= '".$tdate."' and pos_cur <> 'TN' and pos_cur = 'DIS' ");

	foreach($data as $key => $val): 
	
		$pos_old = $val['pos_cur'];
		$pos_new = '';
		$dl_pro = check_downline($dbprefix,$ro,$val['mcode'],'PRO');
		$dl_vip = check_downline($dbprefix,$ro,$val['mcode'],'VIP');

		if($dl_vip["left"] >= 2 and $dl_vip["right"] >= 2){
			if($dl_pro["left"] >= 4 and $dl_pro["right"] >= 4){
				$pos_new = 'VIP';
			} else if($dl_pro["left"] >= 2 and $dl_pro["right"] >= 2){
				$pos_new = 'PRO';
			}	
		} else if($dl_pro["left"] >= 2 and $dl_pro["right"] >= 2){
			$pos_new = 'PRO';
		}	

		if($pos_new != ''){
			if($pos_piority[$pos_new]>$pos_piority[$pos_old]){
				$sql = "UPDATE ".$dbprefix."member SET pos_cur = '".$pos_new."' WHERE mcode = '".$val['mcode']."' LIMIT 1 "; 
				mysql_query($sql);
				
				//up_pos_date($dbprefix="ali_",$val['mcode'],$tdate);
								
				$sql1 = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change,date_update,up_down,type) ";
				$sql1 .= "VALUES('".$ro."','".$val['mcode']."','".$pos_old."','".$pos_new."','".$tdate."','".date("Y-m-d")."','up','2')";    
				mysql_query($sql1);
				
				mysql_query("UPDATE ".$dbprefix."structure_binary_rcode SET pos_cur = '".$pos_new."' WHERE mcode_ref = '".$val['mcode']."'"); 
			} 
		}
	endforeach;
} 

function func_position_secord($dbprefix,$ro,$fdate,$tdate){
	$pos_piority = array('VIP'=>3,'PRO'=>2,'DIS'=>1,'MB'=>0);
	
	$data = query('mcode,pos_cur','ali_member'," mdate<= '".$tdate."' and pos_cur <> 'TN' and pos_cur <> 'MB' and pos_cur = 'PRO' ");
	
	foreach($data as $key => $val): 
		$pos_old = $val['pos_cur'];
		$pos_new = '';
		$dl_vip = check_downline($dbprefix,$ro,$val['mcode'],'VIP');
		
		if($dl_vip["left"] >= 2 and $dl_vip["right"] >= 2){
			$pos_new = 'VIP';	
		}
		
		if($pos_new != ''){ 
			if($pos_piority[$pos_new]>$pos_piority[$pos_old]){
				$sql = "UPDATE ".$dbprefix."member SET pos_cur = '".$pos_new."' WHERE mcode = '".$val['mcode']."' LIMIT 1 "; 
				mysql_query($sql);
				
				//up_pos_date($dbprefix="ali_",$val['mcode'],$tdate);
				
				$sql1 = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change,date_update,up_down,type) ";
				$sql1 .= "VALUES('".$ro."','".$val['mcode']."','".$pos_old."','".$pos_new."','".$tdate."','".date("Y-m-d")."','up','2')";      
				mysql_query($sql1);
				
				mysql_query("UPDATE ".$dbprefix."structure_binary_rcode SET pos_cur = '".$pos_new."' WHERE mcode_ref = '".$val['mcode']."'"); 
			} 
		}
	endforeach;
} 


function check_downline($dbprefix,$ro,$mcode,$checkpos){
	$arr= array();
	$arr["left"] = $arr["right"] = 0;

	if($checkpos == 'VIP'){
		$sql_where = " and (pos_cur = 'PRO' or pos_cur = 'VIP') ";	
	} else if($checkpos == 'PRO'){
		$sql_where = " and (pos_cur = 'DIS' or pos_cur = 'PRO' or pos_cur = 'VIP') ";	
	} else {
		$sql_where = "";	 
	}

	$sql3 = "select mcode_index from ".$dbprefix."structure_binary_rcode where mcode_ref = '".$mcode."' and rcode = '".$ro."' $sqlwhere ";

	$rs3=mysql_query($sql3);
	if(mysql_num_rows($rs3)>0){
		$sqlObj3 = mysql_fetch_object($rs3);
		$mcode_index= $sqlObj3->mcode_index;
		$mcode_index1 = $mcode_index.'1';
		$mcode_index2 = $mcode_index.'2';
		$rs=mysql_query("select mcode_index from ".$dbprefix."structure_binary_rcode where mcode_index like '$mcode_index1%' and sp_code = '".$mcode."' and rcode = '".$ro."' and status_terminate = '0' $sql_where");
		$arr["left"] = mysql_num_rows($rs);
		$rs=mysql_query("select mcode_index from ".$dbprefix."structure_binary_rcode where mcode_index like '$mcode_index2%' and sp_code = '".$mcode."' and rcode = '".$ro."' and status_terminate = '0' $sql_where");
		$arr["right"] = mysql_num_rows($rs);
	}

	return $arr;
} 

function func_Pos_cur($dbprefix,$ro,$fdate,$tdate){
	global $pos_piority,$pos_exp;
	
	$data = fnc_calc_data($dbprefix="ali_",$ro,$fdate,$tdate,$where=" 1=1 ");
	
	foreach($data as $mcode => $value){ 

		$sql_chk = "SELECT * FROM ali_calc_poschange cal WHERE mcode = '".$mcode."' ORDER BY cal.id DESC LIMIT 0,1"; 
		$rs_chk = mysql_query($sql_chk);
		if(mysql_num_rows($rs_chk) > 0){
			$sqlObj_chk = mysql_fetch_object($rs_chk);
			$pos_before	= $sqlObj_chk->pos_before;	
			$pos_after 	= $sqlObj_chk->pos_after;	
			$sql = "UPDATE ".$dbprefix."member SET pos_cur = '".$pos_after."' WHERE mcode = '".$mcode."' LIMIT 1 "; 
			mysql_query($sql);
		}
	}
}

function fnc_calc_data($dbprefix="ali_",$ro,$fdate,$tdate,$where="1=1"){
    $sql="SELECT m.mcode,m.name_t,m.sp_code,m.mdate,m.pos_cur,m.pos_cur1,m.pos_cur2,m.upa_code,m.status_terminate FROM ali_member m WHERE {$where} ORDER BY m.id DESC"; 
    $rs = mysql_query($sql);
    for($i=0;$i<mysql_num_rows($rs);$i++){
        $sqlObj = mysql_fetch_object($rs);
        $data[$sqlObj->mcode]['mcode']= $sqlObj->mcode; 
        $data[$sqlObj->mcode]['name_t']= $sqlObj->name_t; 
        $data[$sqlObj->mcode]['sp_code']= $sqlObj->sp_code; 
        $data[$sqlObj->mcode]['upa_code']= $sqlObj->upa_code; 
        $data[$sqlObj->mcode]['pos_cur']= $sqlObj->pos_cur;  
        $data[$sqlObj->mcode]['pos_cur1']= $sqlObj->pos_cur1;  
        $data[$sqlObj->mcode]['pos_cur2']= $sqlObj->pos_cur2;      
        $data[$sqlObj->mcode]['mdate']= $sqlObj->mdate;      
        $data[$sqlObj->mcode]['status_terminate']= $sqlObj->status_terminate;  
    } 
    return $data; 
}

function fnc_calc_fast_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){

    $maxlv=5; //----��˹��ӹǹ��鹷�����
	//----�红���� apv ��� �红�������Ҫԡ array
    $where = "sadate >= '".$fdate."' and sadate <= '".$tdate."' and (sa_type='A') and cancel=0";
    $sql = " SELECT mcode,SUM(tot_pv) as tot_pv FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh ";
    $sql .= "    WHERE sadate >= '".$fdate."' and sadate <= '".$tdate."' and (sa_type IN 'A', 'Z') and cancel=0 GROUP BY mcode ";
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
                insert('ali_apv',$arr); //----����������ŧ apv   
            }
        }
    }
    
    $sql="SELECT mcode,sp_code,upa_code,lr,pos_cur,name_t FROM ".$dbprefix."member ORDER BY id DESC";   
    $rs = mysql_query($sql);
    for($i=0;$i<mysql_num_rows($rs);$i++){
        $sqlObj = mysql_fetch_object($rs);
        $data[$sqlObj->mcode]['mcode']= $sqlObj->mcode;
        $data[$sqlObj->mcode]['name_t']= $sqlObj->name_t;
        $data[$sqlObj->mcode]['upa_code']= $sqlObj->upa_code;
        $data[$sqlObj->mcode]['sp_code']= $sqlObj->sp_code;
        $dataxx =  get_detail_meber($sqlObj->mcode,$tdate);  //---�ѧ����红����� member 
        $data[$sqlObj->mcode]['pos_cur']= $dataxx['pos_cur'];
        $data[$sqlObj->mcode]['lr']= $sqlObj->lr;      
    }
  
	//----------�֧������ apv �͡�ҡ
    $sql="select rcode,mcode,total_pv from ".$dbprefix."apv where rcode = '$ro' ";  
    $rs = mysql_query($sql);
    for($i=0;$i<mysql_num_rows($rs);$i++){
        $sqlObj        = mysql_fetch_object($rs);
        $apv_rcode     = $sqlObj->rcode;
        $apv_mcode     = $sqlObj->mcode;
        $apv_total_pv  = $sqlObj->total_pv; 
        $path = array();  
        $path = get_part_sp($data[$apv_mcode],$data); //----�红����ż���й�
        $glv = 1; //----gen �������
		$datao =  get_detail_meber($apv_mcode,$tdate); //----�����Ť�����Ҵ��ṹ
        
           foreach($path as $sp_code => $val){ 
			   $datax =  get_detail_meber($val['sp_code'],$tdate); //----�����Ť����١�Ҵ��ṹ
               $flg=false;    
               if($glv <= $maxlv){ 
                 switch ($glv){        
                     case 1 :       
                         if($datax["pos_cur"] != "MB"){
                            $flg = true; 
                            $bonus = 1.50; 
                            $apv_total = $apv_total_pv*$bonus;  
                         } 
                     break;  
                     case 2 :       
                         if($datax["pos_cur"] != "MB" and $datax["pos_cur"] != "DIS"){
                            $flg = true; 
                            $bonus = 0.10; 
                            $apv_total = $apv_total_pv*$bonus;  
                         } 
                     break;  
                     case 3 :       
                         if($datax["pos_cur"] != "MB" and $datax["pos_cur"] != "DIS"){
                            $flg = true; 
                            $bonus = 0.10; 
                            $apv_total = $apv_total_pv*$bonus;  
                         } 
                     break;  
                     case 4 :       
                         if($datax["pos_cur"] == "VIP"){
                            $flg = true; 
                            $bonus = 0.10; 
                            $apv_total = $apv_total_pv*$bonus;  
                         } 
                     break;  
                     case 5 :       
                         if($datax["pos_cur"] == "VIP"){
                            $flg = true; 
                            $bonus = 0.10; 
                            $apv_total = $apv_total_pv*$bonus;  
                         } 
                     break;  
                     default:
                         $flg=false;
                         $bonus = 0;
                         $apv_total =0;
                     break;
                 }
                     
                    if($flg==true and $datax["terminate"] != "1") {    
                        $insert = array(
							"rcode"        => $ro,					//�ͺ	
							"mcode"        => $apv_mcode,
							"name_t"       => $datao['name_t'],
							"upa_code"     => $val['sp_code'],
							"upa_name"     => $data[$val['sp_code']]['name_t'],
							"pv"           => $apv_total_pv,
							"level"        => $glv,
							"gen"          => $val['level'],  
							"percer"       => $bonus,       
							"total"        => $apv_total,
							"fdate"        => $fdate,    
							"tdate"        => $tdate,    
							"pos_cur"      => $val['pos_cur'],
                          );                                          
                        insert('ali_ac',$insert);   //---- �红����� ŧ ac
                    }
                    $glv=($glv+1);    
                }  
              }  
    }
    
	//----- ��� bonus fast
    $sql = " insert into ".$dbprefix."ambonus  (rcode, mcode,name_t, total,tot_pv,tax,bonus,fdate,tdate,pos_cur) ";
    $sql .= "    select '$ro', upa_code,upa_name,sum(total) as totalpv,sum(pv) as pvpv,sum(total)*5/100 as tax,sum(total)-sum(total)*5/100 as bonus,'$fdate','$tdate',pos_cur from ".$dbprefix."ac WHERE  rcode='$ro' and upa_code<>'' and pos_cur <> 'TN' group by upa_code ";
    if (! mysql_query($sql)) {
        echo "<font color='#FF0000'>error</font><br>";
        echo  "$sql<br>";
        echo  die(mysql_error());
        exit;
    }
         
}
function fnc_summary_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){

    $whereclass = " AND fdate>= '$fdate' and tdate<= '$tdate' ";  
	$month=explode("-",$fdate);
	$thismonth = $month[0].'-'.$month[1];	
	
    $select1 = "ifnull((SELECT sum(a.total) as ambonus FROM ali_ambonus a WHERE a.mcode=m.mcode ".$whereclass."  GROUP BY a.mcode),0)";//fast
    $select2 = "ifnull((SELECT sum(a.total) as bmbonus FROM ali_bmbonus a WHERE a.mcode=m.mcode ".$whereclass."  GROUP BY a.mcode),0)";//w/s
 
    $sql2 = " SELECT m.mcode,m.ewallet,m.name_t,m.voucher,m.eatoship,m.pos_cur,m.locationbase ";
    $sql2 .= " , ".$select1." as ambonus "; 
    $sql2 .= " , ".$select2." as bmbonus "; 
    $sql2 .= " FROM ali_member m ";

    $sql2 .= " HAVING ";
    $sql2 .= " (".$select1." )+(".$select2." ) > 0  ";
    $sql2 .= " ORDER BY m.mcode ASC ";
    $rs12 = mysql_query($sql2);
    if(mysql_num_rows($rs12) > 0){ 
        for($j=0;$j<mysql_num_rows($rs12);$j++){
            $sqlObj = mysql_fetch_object($rs12);
            $mcode =$sqlObj->mcode;        
            $name_t =$sqlObj->name_t;        
            $pos_cur =$sqlObj->pos_cur;        
            $ewallet =$sqlObj->ewallet;        
            $voucher =$sqlObj->voucher;
            $locationbase =$sqlObj->locationbase;
			$crate = '1';
            $ambonus =$sqlObj->ambonus; 
            $bmbonus =$sqlObj->bmbonus;      
            $allplan = $ambonus+$bmbonus; 
			$xtotalamt = $planawa = 0;
			if($allplan > 0){

				$sql = "SELECT ifnull(sum(total),0) as totalamt from ".$dbprefix."eatoship  where sadate like '%".$thismonth."%' and mcode = '".$mcode."' and cancel = 0  ";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0){
						$sqlObj = mysql_fetch_object($rs);
						$planawa += $sqlObj->totalamt;				
				}

				if($planawa < 2200 ){ /// 500 < 1400
					$totalamt = $bmbonus*0.10; // 1000 = 10000*0.10
					$quota = 2200-$planawa; //900 = 1400-500
					if($totalamt>$quota)$totalamt= $quota; // =900
					$allplan = $allplan-$totalamt; // 9100 = 10000-900
					$insert = array(
						"rcode"		=> $ro,
						"mcode"		=> $mcode,
						"name_t"	=> $name_t,
						"ambonus"	=> $ambonus,
						"bmbonus"	=> $bmbonus,
						"ato"		=> $totalamt, 
						"total"		=> $allplan, 						
						"fdate"		=> $fdate,	
						"tdate"		=> $tdate,	
					);
					insert('ali_commission',$insert);
					fnc_eatoship_bonus($dbprefix,$ro,$mcode,$totalamt,$locationbase[$mcode],$crate[$mcode],$tdate); // open Bill ATO
				}else{		
					$insert = array(
						"rcode"		=> $ro,
						"mcode"		=> $mcode,
						"name_t"	=> $name_t,
						"ambonus"	=> $ambonus,
						"bmbonus"	=> $bmbonus,
						"ato"		=> '0', // 0
						"total"		=> $allplan, 						
						"fdate"		=> $fdate,	
						"tdate"		=> $tdate,	
					);
					insert('ali_commission',$insert);
				}
				if($allplan > 0){
					fnc_ewall_bonus($dbprefix,$ro,$mcode,$allplan,$locationbase,$crate,$tdate); 

					$sano_ecom =  gencodesale_news_hq('C','ali_ewallet_commission','HQ001','',$tdate);
					$eato = array(                    
						"rcode"                => $ro,                  
						"sano"                 => $sano_ecom,
						"sadate"               => $tdate,
						"mcode"                => $mcode,
						"sa_type"              => 'CI',   
						"total"                => $allplan,     
						"uid"                  => $_SESSION['adminusercode'], 
						"chkCommission"        => 'on',  
						"txtMoney"             => $allplan,   
						"txtCommission"        => $allplan,   
						"optionCommission"     => 'commission', 
						"checkportal"          => '9',    // commission 
						"echeck"               => 'A'                                                       
					);
					insert('ali_ewallet_commission',$eato); 
				}

			}         
       }
    }    
}						 
function fnc_eatoship_bonus($dbprefix,$ro,$mcode,$totalamt,$location,$crate,$fdate){
	 	global $_SESSION;
		$allplan = $totalamt ;
 	 	if($allplan > 0){				
			
 		/////   Electronic Money System ///////////////
 			$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."eatoship   ";
			$rssss = mysql_query($sql);
			$mid = mysql_result($rssss,0,'id')+1;
			//$sano = gencodesale('A','eatoship');
			$sano =  gencodesale_news_hq('A','ali_eatoship','HQ001','',$fdate);
			$bprice = $allplan*$crate;
			$insert = array(
					"rcode"			=> $ro,	
					"sano"			=> $sano,
					"sadate"		=> $fdate,
					"mcode"			=> $mcode,				 
					"total"			=> $allplan, 
					"pv"			=> $allplan/10, 
					"bprice"		=> $bprice, 
					"lid"			=> $_SESSION['adminusercode'], 	 
					"uid"			=> $_SESSION['adminusercode'], 	 
					"txtMoney"		=> $allplan,	
					"sa_type"		=> 'CI',	
					"chkCommission"	=> 'on',	
					"txtCommission"	=> $allplan,	
					"checkportal"	=> '9',	
					"locationbase"	=> $location,						 
					"crate"			=> $crate,	
				);
				insert('ali_eatoship',$insert); 
				mysql_query("update ".$dbprefix."commission set sano_ato = '$sano' where rcode = '$ro' and mcode = '$mcode' ");
				$option = "Cal-A (".$sano.") Date : $fdate";
				mysql_query("update ali_member set eatoship = eatoship+'$allplan' where mcode = '$mcode' ");
				log_ewallet('eatoship',$mcode,$sano,$allplan,'CI',date("Y-m-d"),$option);
			/////   Electronic Money System ///////////////
		}	
}
function fnc_ewall_bonus($dbprefix,$ro,$mcode,$totalamt,$location,$crate,$fdate){
	 	global $_SESSION;
		$allplan = $totalamt ;
 	 	if($allplan > 0){				
			$sql2="update ".$dbprefix."member set ewallet=ewallet+'$allplan'  where mcode = '".$mcode."' ";
			mysql_query($sql2);
 			/////   Electronic Money System ///////////////
 			$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."ewallet   ";
			$rssss = mysql_query($sql);
			$mid = mysql_result($rssss,0,'id')+1;
			//$sano = gencodesale('E','ewallet');
			$sano =  gencodesale_news_hq('E','ali_ewallet','HQ001','',$fdate);
			$bprice = $allplan*$crate;
			$insert = array(
					"rcode"			=> $ro,	
					"sano"			=> $sano,
					"sadate"		=> $fdate,
					"mcode"			=> $mcode,				 
					"total"			=> $allplan, 
					"bprice"		=> $bprice, 
					"lid"			=> $_SESSION['adminusercode'], 	 
					"uid"			=> $_SESSION['adminusercode'], 	 
					"txtMoney"		=> $allplan,	
					"sa_type"		=> 'CI',	
					"chkCommission"	=> 'on',	
					"txtCommission"	=> $allplan,	
					"checkportal"	=> '9',	
					"locationbase"	=> $location,						 
					"crate"			=> $crate,	
				);
				$aas = insert('ali_ewallet',$insert); 

			///// Electronic Money System ///////////////
			$option = "Cal-A ($sano) Date : $fdate";
			log_ewallet('ewallet',$mcode,$sano,$allplan,'CI',date("Y-m-d"),$option); 
			
			mysql_query("update ".$dbprefix."commission set sano_ewallet = '$sano' where rcode = '$ro' and mcode = '$mcode' ");

		}	
}
function fnc_calc_invent($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){
	$arr_per = array('MB'=>0,'SI'=>0.03,'GO'=>0.06,'DI'=>0.15);

	$sql 	= "select  crate,name_t,locationbase,mcode,sano,uid,'H' as status,tot_pv,total,sadate,sa_type from ".$dbprefix."asaleh  WHERE sadate between '$fdate' AND '$tdate' and sa_type='A' and cancel=0 and tot_pv > 0 and checkportal='3'   ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode= $sqlObj->mcode;
			$name_t= $sqlObj->name_t;
			$sano= $sqlObj->sano;
			$status= $sqlObj->status;
			$tot_pv= $sqlObj->tot_pv;
			$total= $sqlObj->total;
			$sadate= $sqlObj->sadate;
			$sa_type= $sqlObj->sa_type;
			$uid= $sqlObj->uid;
			$mcode= $sqlObj->mcode;
			$locationbase= $sqlObj->locationbase;
			$sqlInsert = "insert into ".$dbprefix."fm(rcode,inv_code,sano,status,tot_pv,tot_price,mdate,sa_type) values
			('$ro','$mcode','$sano','$status','$tot_pv','$total','$sadate','$sa_type')";
			mysql_query($sqlInsert) or die(mysql_error());

			$mtype = 0;
			$sql1 = "SELECT pos_cur,mcode,name_t,locationbase,mtype1,status_terminate from ".$dbprefix."member WHERE mcode='$uid' ";
			//echo  "$sql1<br>";
			$rs1=mysql_query($sql1);
			if (mysql_num_rows($rs1)>0) {
				$sqlObj1 = mysql_fetch_object($rs1);
				$pos_cur= $sqlObj1->pos_cur;
				$upa_name= $sqlObj1->name_t;
				$mtype1= $sqlObj1->mtype1;
				$locationbase= $sqlObj1->locationbase;
				$status_terminate= $sqlObj1->status_terminate;
				$crate = '1';
				$com_transfer_chagre[$locationbase] = 30;
				if($status_terminate != '1'){
					$per = $arr_per[$pos_cur];
					$ntot_pv = $tot_pv;
					$total=($ntot_pv*($per));
					$tax=($total*0.05);
					$totalamt=($total-$tax);
					$sql = "INSERT INTO ".$dbprefix."fc (rcode,mcode,name_t,upa_code,upa_name,pv,level,percer,total,cvat,ctax,amt,fdate,tdate,pos_cur,crate,locationbase,oon,sano) VALUES";
					$sql .= "(".$ro.",'$mcode','$name_t','".$uid."','$upa_name','".$ntot_pv."','1','$per','".$total."','".$vat."','".$tax."','".$totalamt."','$fdate','$tdate','$pos_cur','".$crate."','$locationbase','".$com_transfer_chagre[$locationbase]."','$sano') ";
					mysql_query($sql);
				}
			}
		}
		mysql_free_result($rs);
	}
	$sql 	= "select  mcode,name_t,crate,locationbase,uid,hono,'H' as status,tot_pv,total,sadate,sa_type from ".$dbprefix."holdhead  WHERE sadate between '$fdate' AND '$tdate'  and cancel=0 and tot_pv > 0 and sa_type='A'   ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$name_t= $sqlObj->name_t;
			$hono= $sqlObj->hono;
			$status= $sqlObj->status;
			$tot_pv= $sqlObj->tot_pv;
			$total= $sqlObj->total;
			$sadate= $sqlObj->sadate;
			$sa_type= $sqlObj->sa_type;
			$uid= $sqlObj->uid;
			$mcode= $sqlObj->mcode;
			$locationbase= $sqlObj->locationbase;
			$sqlInsert = "insert into ".$dbprefix."fm(rcode,inv_code,sano,status,tot_pv,tot_price,mdate,sa_type) values
			('$ro','$mcode','$hono','$status','$tot_pv','$total','$sadate','$sa_type')";
			mysql_query($sqlInsert) or die(mysql_error());

			$mtype = 0;
			$sql1 = "SELECT pos_cur,name_t,mcode,locationbase,mtype1,status_terminate from ".$dbprefix."member WHERE mcode='$uid' ";
			//echo  "$sql1<br>";
			$rs1=mysql_query($sql1);
			if (mysql_num_rows($rs1)>0) {
				$sqlObj1 = mysql_fetch_object($rs1);
				$pos_cur= $sqlObj1->pos_cur;
				$upa_name= $sqlObj1->name_t;
				$mtype1= $sqlObj1->mtype1;
				$locationbase= $sqlObj1->locationbase;
				$status_terminate= $sqlObj1->status_terminate;
				$crate = '1';
				$com_transfer_chagre[$locationbase] = 30;
				if($status_terminate != '1'){
					$per = $arr_per[$pos_cur];
					$ntot_pv = $tot_pv;
					$total=($ntot_pv*($per));
					$tax=($total*0.05);
					$totalamt=($total-$tax);
					$sql = "INSERT INTO ".$dbprefix."fc (rcode,mcode,name_t,upa_code,upa_name,pv,level,percer,total,cvat,ctax,amt,fdate,tdate,pos_cur,crate,locationbase,oon,sano) VALUES";
					$sql .= "(".$ro.",'$mcode','$name_t','".$uid."','$upa_name','".$ntot_pv."','1','$per','".$total."','".$vat."','".$tax."','".$totalamt."','$fdate','$tdate','$pos_cur','".$crate."','$locationbase','".$com_transfer_chagre[$locationbase]."','$hono') ";
					mysql_query($sql);
				}
			}
			

		}
		mysql_free_result($rs);
	}

	$sql = " insert into ".$dbprefix."fmbonus  (rcode, mcode,name_t, total,total_r,tax,bonus,fdate,tdate,pos_cur,locationbase,crate) ";
	$sql .= "	select '$ro', upa_code,upa_name,sum(total),sum(total_r),sum(total+total_r)*5/100 as tax,sum(total+total_r)-sum(total+total_r)*5/100 as bonus,'$fdate','$tdate',pos_cur,locationbase,crate from ".$dbprefix."fc WHERE  rcode='$ro' and upa_code<>'' group by upa_code ";
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
		echo  "$sql<br>";
		echo  die(mysql_error());
		exit;
	}
}



function fnc_calc_b_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){
	$percen = array('MB'=>0,'DIS'=>0.50,'PRO'=>0.60,'VIP'=>0.70);			//----���繨���
    $max_quota = array('MB'=>0,'DIS'=>25000,'PRO'=>100000,'VIP'=>350000);		
    $start_balance = 200;													//----balance �������
	
    $month = explode("-",$fdate); // 2013-12-01       
    
    getAllbill_to_bm('ali_bm',$fdate,$tdate);								

    $sql = "select sum(new_pvL) as new_pvL,sum(newpvR) as new_pvR,mcode from ( ";
    $sql .= "select sum(pv) as new_pvL,'0' as newpvR,upa_code as mcode from ali_bm where lr = '1' and rcode = '$ro' group by upa_code ";
    $sql .= "UNION ALL ";
    $sql .= "select '0' as new_pvL,sum(pv) as newpvR,upa_code as mcode from ali_bm where lr = '2' and rcode = '$ro' group by upa_code ";
    $sql .= " ) as a WHERE 1 =1 GROUP BY mcode ";
    $rs = mysql_query($sql);

    
    for($i=0;$i<mysql_num_rows($rs);$i++){
        $ee 		= 1; 
        $total_pvl  = 0;
        $total_pvc	= 0;
        $total_pvr	= 0;
        $calcamt1 	= 0;
        $calcamt2 	= 0;
        $balance1 	= 0;
        $balance 	= 0;
        $balance2 	= 0;
        $tax 		= 0;
        $totalamt 	= 0;
        $bonusamt 	= 0;
        $cut 		= 0;
        $sqlObj 	= mysql_fetch_object($rs);
        $mcode 		= $sqlObj->mcode;        

        //////////// ��ṹ���� //////////////////
        $new_pvL 	= $sqlObj->new_pvL;     
        $new_pvR 	= $sqlObj->new_pvR;    

        //////////// ��ṹ��� //////////////////
        $point = new point_member;
        $old = $point->get_bmbonus($dbprefix,$mcode);
		
        $data = get_detail_meber($mcode,$tdate);
       // $mem_cntday =dateDiff($data['mdate'], $fdate);
        $old_pvL = $old['pcarry'][1];
        $old_pvR = $old['pcarry'][2]; 
        //////////// SUM //////////////////
        $total['L'] =($new_pvL+$old_pvL);   
        $total['R'] =($new_pvR+$old_pvR);
        
        //////////////// Balance //////////// 
        arsort($total); ///descending order           
    
		$nTotal = array();
		foreach($total as $key=> $value)
		{
		    $nTotal[$ee] = array($key,$total[$key]);      
			$ee++;
		} 
		$flg = check_sponser($mcode,$tdate);  
		if($mcode == 'TH0000999'){
			//echo $flg.' : '.$mcode.' : '.$tdate.' : '.$data['pos_cur'];
			//exit;
		}


        if($nTotal[2][1] >= $start_balance and $data['pos_cur'] != 'MB' and $flg == true){
			//$calcamt1 = $nTotal[1][1]-$nTotal[2][1];  // 8000 - 3000  = 5000
			$balance1 = $nTotal[2][1];   // L - R  // 3000  
			$calcamt= $balance1*$percen[$data['pos_cur']];   

			$balance = $balance1;
            $carry[$nTotal[1][0]] = $total[$nTotal[1][0]]-$balance1;  
            $carry[$nTotal[2][0]] = $total[$nTotal[2][0]]-$balance1;    
             
			if($mcode == 'TH0000999'){
				//echo $calcamt.' : '.$flg.' : '.$mcode.' : '.$tdate.' : '.$data['pos_cur'];
			}
			if($calcamt>($max_quota[$data['pos_cur']]))$calcamt=$max_quota[$data['pos_cur']]; 
			if($mcode == 'TH0000999'){
			   //echo $calcamt.' : '.$flg.' : '.$mcode.' : '.$tdate.' : '.$data['pos_cur'];
			}
			
			$tax=($calcamt*0.05);
			$bonusamt=($calcamt-$tax);      
		}else{
           $calcamt =0;  
           $ocarry['L'] = $carry['L'] = $total['L'];  
           $ocarry['R'] = $carry['R'] = $total['R'];                         
        }  
		if($data['pos_cur'] == 'MB'){
           $calcamt =0;  
           $carry['L'] = '0';  
           $carry['R'] = '0';                         
		}

 
        if($new_pvL  > 0 or  $new_pvC > 0 or $new_pvR > 0 or $calcamt > 0 or $ocarry['L'] <> $carry['L'] or $ocarry['R'] <> $carry['R']) {
			if($data["terminate"] <> '1'){
				  $insert = array(
						"rcode"        => $ro,
						"mcode"        => $mcode,
						"name_t"        => $data["name_t"],
						"total"        => $calcamt,	
						"tax"          => $tax,
						"totalamt"     => $bonusamt,
						"percer"       => $max_percentw[$data['pos_cur']],
						"ro_l"         => $new_pvL,                             
						"ro_c"         => $new_pvR,   
						"pcrry_l"      => $old_pvL,
						"pcrry_c"      => $old_pvR,
						"total_pv_l"   => $total['L'],                             
						"total_pv_r"   => $total['R'],   
						"carry_l"      => $carry['L'],                             
						"carry_c"      => $carry['R'],      
						"tdate"        => $tdate,                             
						"fdate"        => $fdate,       
						"mpos"         => $data['pos_cur'],       
						"total_pv_ll"  => $balance,
						"balance"      => $balance,                             
						"total_pv_rr"  => $balance, 
						"cycle_b"      => $cut					 
				);
				insert('ali_bmbonus',$insert); 
			}
        } 
    } 
}
function check_sponser($main_mcode,$tdate){
	$sql = "select mcode,lr from ali_member where mdate<= '".$tdate."' and sp_code = '".$main_mcode."' and pos_cur <> 'MB'  ";
	$check = array('1'=>0,'2'=>0); 
	$rs = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rs);$i++){
        $sqlObj 	= mysql_fetch_object($rs);
        $mcode 		= $sqlObj->mcode; 
        $lr 		= $sqlObj->lr; 
		$xlr = getlrxx('ali_',$mcode,$main_mcode,$lr);
		$check[$xlr]++;
		if($check[1] > 0 and $check[2] >0 )return true;
	}
	return false;
}
function getlrxx($dbprefix,$scode,$testcode,$lr){
        $sql = "SELECT upa_code,lr FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
        $rs = mysql_query($sql);
        if($scode==$testcode)
            return $lr;
        if(mysql_num_rows($rs)<=0)
            return '';
        else if(mysql_result($rs,0,'upa_code')!=$testcode)
            return getlrxx($dbprefix,mysql_result($rs,0,'upa_code'),$testcode,mysql_result($rs,0,'lr'));
        else
            return mysql_result($rs,0,'lr');
}
function dateDiff($startDate, $endDate) { 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 

} 
function expdate($startdate,$datenum){
 $startdatec=strtotime($startdate); // ������ͤ������Թҷ�
 $tod=$datenum*86400; // �Ѻ�ӹǹ�ѹ�Ҥٳ�Ѻ�Թҷյ���ѹ
 $ndate=$startdatec+$tod; // �Ѻ�ǡ��ա����ӹǹ�ѹ����Ѻ��
 return $ndate; // �觤�ҡ�Ѻ
}

function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 

function dateDiff1($startDate, $endDate) { 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 

} 
function del_cals($dbprefix,$ro,$name=array()) {					
	foreach($name as $key => $value):		
	$sql="delete from ".$dbprefix.$value." where rcode >= '".$ro."'";
	if($value == 'calc_poschange1'  or $value == 'calc_poschange2')$sql.=" and type = '2'";
	//echo $sql.'<br>';
	if(mysql_query($sql)){
		mysql_query("COMMIT");
	}else{
		echo "error $sql<BR>";
	}
	endforeach;		
}

function alert_time($time_start,$txtoption){
	$time_end = getmicrotime();
	$time = $time_end - $time_start;
	echo "<BR>����ش��äӹǳ <font color=red><b>$txtoption</b></font> ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
	echo "��äӹǳ�����ҷ����� $time �Թҷ�<BR>";
}
function check_time($fuc_name = "1. ",$time_start){ 
    $time = getmicrotime()-$time_start;
    echo '<br>';
    echo $fuc_name." ";
    echo "<font color=red>"; 
    echo " ";
    echo number_format($time,2);
    echo " sec ";
    echo "</font>"; 
}

?>