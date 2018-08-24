<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>
<?



$dbprefix = 'ali_';
$fdate = '2015-10-09';
$mcode = '00000001';

$point = new point_memberx;
$sumTotal = $point->get_sumTotalx($dbprefix,$mcode,$fdate);

//print_r($sumTotal);

//$sumTotal = point_memberx::get_sumTotalx($dbprefix,$mcode,$tdate);

print_r($sumTotal);
exit;

echo "sssssssssss<br>";
update_sponsor1('0000015',$cur_date);
exit;
function update_sponsor1($mcode,$cur_date){    
    global $pos_piority;
    $data =  get_detail_meber($mcode,$cur_date);  
    $sp_code = $data['sp_code'];
    $sql = "select t1.mcode,t1.pos_cur as pos_cur,count(*) as count 
            from ali_member t1 left join ali_member t2 on (t1.mcode = t2.sp_code) 
            where t2.pos_cur = 'PL' and t1.mcode = '$sp_code' 
            group by t1.mcode having count(*) >= 3";
    $rs = mysql_query($sql);
    echo $sql;
    exit;
    if(mysql_num_rows($rs) >0){
        $sqlObj = mysql_fetch_object($rs);    
        $pos_old =$sqlObj->pos_cur;    
        $pos_new = 'AEM';
        if($pos_piority[$pos_new]>$pos_piority[$pos_old]){
            
            $update = array("pos_cur"    => $pos_new );
            update('ali_member',$update,"mcode='".$sp_code."' ");
                
            $insert = array("mcode"       => $sp_code,
                            "pos_before"  => $pos_old,
                            "pos_after"   => $pos_new,
                            "date_change" => $cur_date
                            );  
            insert('ali_calc_poschange',$insert);               
           
        }
    }
}






 
//fnc_voucher($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate,$fmcode);
    $total['L'] = 5000;
	$total['C'] = 1000;
	$total['R'] = 600;
	 arsort($total); ///descending order           
      echo '<pre>'; print_r($total); echo '</pre>';    
      $i = 1;
      $nTotal = array();
      foreach($total as $key=> $value)
      {
       $nTotal[$i] = array($key,$total[$key]);      
       $i++;
      }        
      if($nTotal[2][1] > 0){          
          $blance1 = $nTotal[1][1]-$nTotal[2][1];    
          $calcamt1 = $nTotal[2][1]*0.20;
          if ($blance1 > $nTotal[3][1] ) {
              $blance2 = $blance1-$nTotal[3][1];                  
              $carry[$nTotal[1][0]] = $blance2; 
              $carry[$nTotal[2][0]] = 0;  
              $carry[$nTotal[3][0]] = 0; 
              $calcamt2 = $nTotal[3][1]*0.20; 
              $allblance =  $nTotal[2][1]+$nTotal[3][1];               
          }
          else {
              $blance2 = $nTotal[3][1]-$blance1;                  
              $carry[$nTotal[1][0]] = 0; 
              $carry[$nTotal[2][0]] = 0;  
              $carry[$nTotal[3][0]] = $blance2; 
              $calcamt2 = $blance1*0.20;  
              $allblance =  $nTotal[2][1]+$blance1;                             
          }             

           $calcamt = $calcamt1+$calcamt2;
           $tax=($calcamt*0.05);
           $bonusamt=($calcamt-$tax);
      }else{
           $carry[$nTotal[1][0]] = $total[$nTotal[1][0]]; 
           $carry[$nTotal[2][0]] = $total[$nTotal[2][0]];  
           $carry[$nTotal[3][0]] = $total[$nTotal[3][0]];              
      }  
      
      echo $calcamt1.' : '.$calcamt2.' : '.$allblance.' : '.$calcamt."<br>";
                // echo $sss."<br>";
      echo 'Carry<pre>'; print_r($carry); echo '</pre>';       
  
exit;

function fnc_voucher($dbprefix,$ro,$strfdate,$strtdate,$fpdate,$tpdate,$fmcode){

	if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
		$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' ";
	}else if($strfdate!=""&&$strtdate!=""){
		$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' ";
	}else if($fmcode!=""){
		$whereclass = " AND m.mcode='".$fmcode."'";
	}

	
		$sql="select mcode,ewallet,name_t,name_f,acc_no,acc_name,cmp,cmp2,mobile,bankcode,branch,locationbase from ".$dbprefix."member  "; 
		$rs22 = mysql_query($sql);
		$kk =  mysql_num_rows($rs22);
		for($i=0;$i<$kk;$i++){
			$sqlObj22 = mysql_fetch_object($rs22);
			$mcode =$sqlObj22->mcode;		

			$name_t =$sqlObj22->name_t;		
			$name_f =$sqlObj22->name_f;		
			$acc_no = $sqlObj22->acc_no;
			$acc_name = $sqlObj22->acc_name;
			$cmp = $sqlObj22->cmp;
			$cmp2 = $sqlObj22->cmp2;
			$locationbase = $sqlObj22->locationbase;
			$mobile = $sqlObj22->mobile;
			$bankcode = $sqlObj22->bankcode;
			$ewallet = $sqlObj22->ewallet;
			$branch = $sqlObj22->branch;
			$plana = $planb = 0;
			$sql = "SELECT ifnull(sum(total),0) as totalamt from ".$dbprefix."ambonus  where mcode = '".$mcode."' and total > 0 ".$whereclass."  ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				//for($gg=0;$gg<mysql_num_rows($rs);$gg++){
					$sqlObj = mysql_fetch_object($rs);
					$plana =$sqlObj->totalamt;
				//}
				//mysql_free_result($rs);
			}		
 			$sql = "SELECT ifnull(sum(total),0) as totalamt from ".$dbprefix."bmbonus  where mcode = '".$mcode."' and total > 0 ".$whereclass."   ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				//for($gg=0;$gg<mysql_num_rows($rs);$gg++){
					$sqlObj = mysql_fetch_object($rs);
					$planb =$sqlObj->totalamt;
				//}
				//mysql_free_result($rs);
			}		
			
			$allplan = $plana+$planb;	
			if($allplan > 0 )
			{

			//	echo $mcode.'<br>';
				if($ewallet < 1500){//	200
					$allauto = $ewallet+($allplan*0.10);
				
					if($allauto > 1500)$allauto = 1500-$ewallet;
					else $allauto = ($allplan*0.10);
					/////////////////		
					$allplan = $allplan-$allauto;

					

					$commission = array(
								"rcode"		=> $ro,
								"mcode"		=> $mcode,
								"fast"		=> $plana,
								"weekstrong"=> $planb, 
								"ato" 		=> $allauto, 
								"total" 	=> $allplan, 
								"fdate"		=> $strfdate,   
								"tdate"		=> $strtdate					 
							);				
					insert('ali_commission',$commission);		
					//$totalamt[$j] = $totalamt[$j]-$ewallet[$j];  100
					//fnc_ewallet_bonus($dbprefix,$ro,$mcode,$allauto,$locationbase,$strtdate,$name_f,$name_t ); 
				}else{
					$commission = array(
							"rcode"		=> $ro,
								"mcode"		=> $mcode,
								"fast"		=> $plana,
								"weekstrong"=> $planb, 	
								"total" 	=> $allplan, 	
								"fdate"		=> $strfdate,   
								"tdate"		=> $strtdate, 					 
							);
					insert('ali_commission',$commission);			
				}
			
			}	
		}	 
}

//fnc_calc_fast_key('ali_',$ro,'2015-01-30',$tdate,$fpdate,$tpdate);

function fnc_calc_fast_key($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){

	$sql = "SELECT mcode,uid,id,sadate FROM ali_asaleh WHERE lid = '' and scheck = 'register' and sadate = '$fdate' "; 
	$rs = mysql_query($sql);	
	$num =  mysql_num_rows($rs);
	for($i=0;$i<$num;$i++)
	{
		$sqlObj = mysql_fetch_object($rs);
		$mcode =$sqlObj->mcode;
		$uid =$sqlObj->uid;
		$id =$sqlObj->id;
		$sadate =$sqlObj->sadate;		
			
		$sql1 = "SELECT id,tot_pv,sctime FROM ali_asaleh WHERE mcode ='$mcode' and uid = '$uid' and scheck <> 'register' and tot_pv >500 and sadate = '$fdate' order by id ASC LIMIT 0,1"; 
		$rs1 = mysql_query($sql1);	
		if(mysql_num_rows($rs1)>0){
			$sqlObj1 = mysql_fetch_object($rs1);
			$id_a =$sqlObj->id;
			$sctime_a =$sqlObj1->sctime; 
			$tot_pv_a =$sqlObj1->tot_pv;
		}
		
		$sql2 = "SELECT id,tot_pv,sctime FROM ali_holdhead WHERE  mcode ='$mcode' and uid = '$uid' and tot_pv >500 and sadate = '$fdate' order by id ASC LIMIT 0,1"; 
		$rs2 = mysql_query($sql2);	
		if(mysql_num_rows($rs2)>0){
			$sqlObj2 = mysql_fetch_object($rs2);
			$id_h =$sqlObj->id;
			$sctime_h =$sqlObj2->sctime; 
			$tot_pv_h =$sqlObj2->tot_pv;
		}
		$update = array("status"	=> $ro);

		if($sctime_h != '' and $sctime_a != ''){
			if($sctime_h < $sctime_a)
			{
				$tot_pv = $tot_pv_h;			
			//	update('ali_holdhead',$update,"id ='".$id_a."' ") ;
			}else{
				$tot_pv =$tot_pv_a;
			//	update('ali_asaleh',$update,"id ='".$id_a."' ") ;
			}
		}else if($sctime_h == '' and $sctime_a != ''){
			$tot_pv = $tot_pv_a;			
			//update('ali_asaleh',$update,"id ='".$id_a."' ") ;
		}else if($sctime_h != '' and $sctime_a == ''){
			$tot_pv = $tot_pv_h;
			//update('ali_holdhead',$update,"id ='".$id_a."' ") ;
		}else{
			$tot_pv = 0;

		}	
		if($tot_pv > 0){
			$bonus = array('NBP'=>0.2,'NBVP'=>0.2,'NBD'=>0.2,'NBM'=>0.2,'ANBM'=>0.2,'SNBS'=>0.2,'NBS'=>0.2,'NBL'=>0.2,'NBO'=>0.2,'MB'=>0 );
			$sql3="SELECT pos_cur FROM ali_member WHERE mcode = '$uid'";
			$rs3 = mysql_query($sql3);	
			$pos_cur = mysql_result($rs3,0,'pos_cur');
	
			$pv_total = $tot_pv*$bonus[$pos_cur];
		
			if($pv_total > 0){
				$insert = array(
								"rcode"		=> $ro,
								"mcode"		=> $mcode,
								"upa_code"	=> $uid,
								"pv"		=> $tot_pv,
								"level"		=> 0,
								"gen"		=> 0,				
								"percer"	=> $bonus[$pos_cur],					 
								"total"		=> $pv_total,					 
								"fdate"		=> $fdate,	
								"tdate"		=> $tdate,
								"mposi"		=> $pos_cur
							);
				insert('ali_mc',$insert);
			}
		}		
	}

	$sql = " insert into ".$dbprefix."mmbonus  (rcode, mcode, total,tot_pv,tax,bonus,fdate,tdate,pos_cur) ";
	$sql .= "	select '$ro', upa_code,sum(total) as totalpv,sum(pv) as pvpv,sum(total)*5/100 as tax,sum(total)-sum(total)*5/100 as bonus,'$fdate','$tdate',mposi from ".$dbprefix."mc WHERE  rcode='$ro' and upa_code<>'' and mposi <> 'TN' group by upa_code ";
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
		echo  "$sql<br>";
		echo  die(mysql_error());
		exit;
	}
}



?>