                                  
 <?
require_once("logtext.php");
require_once("function.php");
require_once("global.php");
require_once ("function.log.inc.php");
 



    $sqlS = "select * from ".$dbprefix."cmbonus where id='$bid' ";
	//echo $sqlS;exit;
    $sqlSS = mysql_query($sqlS);
   
    if(mysql_num_rows($sqlSS) > 0){
        $dataS = mysql_fetch_object($sqlSS);
        $cashpayment =$dataS->cashpayment;
        $paydate =$dataS->paydate;
        $mcode =$dataS->mcode;
        $status =$dataS->status;
        $cashpayment =$dataS->cashpayment;
    }
    mysql_query("delete from ".$dbprefix."cmbonus where mcode='$mcode' and id = '$bid' ");
    fnc_calc_status($dbprefix,$rcode,$fdate,$tdate,$paydate,$mcode,$status);

?>
<?
function fnc_calc_status($dbprefix,$ro,$fdate,$tdate,$paydate,$fmcode,$cpaytype){
    
    global $txtMoney;
//	$dmdate = date("Y-m",strtotime("first day of $tdate -1 month"));
	$dmdate = date("Y-m",strtotime("first day of $tdate"));
	$first_days = date("Y-m-d",strtotime("first day of $tdate"));
	$last_days = date("Y-m-d",strtotime("$first_days +4 days"));
	$chk_unilevel = "SELECT IF(tb.sadate <= '$last_days', '$first_days', sadate) as xxxx FROM (
		SELECT mcode,sadate,sctime,cancel,scheck FROM ali_asaleh
			UNION ALL
			SELECT mcode,sadate,sctime,cancel,'' as scheck FROM ali_holdhead
	) as tb WHERE tb.mcode = a.mcode AND tb.sadate BETWEEN '$fdate' AND '$tdate' AND tb.scheck <> 'register' AND tb.cancel='0'  ORDER BY tb.sctime ASC LIMIT 0,1";
	
	$whereclassx = " and fdate LIKE '%$dmdate%' ";
	$whereclassxxx = " and sadate LIKE '%$dmdate%' ";
    $whereclass = " AND fdate>= '$fdate' and tdate<= '$tdate' ";
    $whereclassxy = " AND fdate >= ($chk_unilevel) and fdate <= '$tdate' ";
    $thismonth = explode('-',$fdate);
    $where_adjust = " AND sadate = '$paydate' and cancel = 0 ";

    $selectam   = "ifnull((SELECT sum(a.total) as ambonus FROM ali_ambonus a WHERE a.mcode=m.mcode ".$whereclass."  GROUP BY a.mcode),0)";
    $select1    = "ifnull((SELECT sum(a.total) as ambonus2 FROM ali_ambonus2 a WHERE a.mcode=m.mcode ".$whereclass."  GROUP BY a.mcode),0)";
     $select3    = "ifnull((SELECT sum(a.txtMoney) as adjust FROM ali_adjust a WHERE a.mcode=m.mcode ".$where_adjust."  GROUP BY a.mcode),0)";
    $sql2 = "SELECT m.mcode,m.name_t,m.name_f,m.pos_cur1 as pos_cur,m.sp_code,m.acc_no,m.acc_name,m.cmp,m.bankcode,m.locationbase,m.national,m.mtype,m.mvat,m.bankcode,m.cmp2 ";
    $sql2 .= " , ".$selectam." as ambonus "; 
    $sql2 .= " , ".$select1." as ambonus2 ";
    $sql2 .= " , ".$select3." as madjust ";
    $sql2 .= " FROM ali_member m ";
    //$sql2 .= " WHERE m.mcode = 'LA007130'";
   // $sql2 .= " HAVING ";
   // $sql2 .= " (".$select." )+(".$select2." )+(".$select3." )+(".$select4." )+(".$select5." )+(".$select6." ) >= 0 ";
    $sql2 .= " where m.status_terminate <> '1' and m.mcode = '$fmcode' ";
    $sql2 .= "ORDER BY m.mcode ASC ";
// echo $sql2;exit;
    $rs12 = mysql_query($sql2);
    if(mysql_num_rows($rs12) > 0){

	
        for($j=0;$j<mysql_num_rows($rs12);$j++){
            $totalamt1[$j] = 0;
            $totalamt[$j] = 0;
            $ewallet[$j] = 0;
            $com_transfer_chagre = 0;  
            $sqlObj1 = mysql_fetch_object($rs12);
            $mcode[$j] =$sqlObj1->mcode;    
            $name_t[$j] =$sqlObj1->name_t;
            $name_f[$j] =$sqlObj1->name_f;
            $pos_cur[$j] =$sqlObj1->pos_cur;
            $sp_code[$mcode[$j]] = $sqlObj1->sp_code;
            $acc_no[$j] =$sqlObj1->acc_no;
            $acc_name[$j] =$sqlObj1->acc_name;
            $cmp[$j] =$sqlObj1->cmp;
            $bankcode[$j] =$sqlObj1->bankcode;
            $locationbase[$j] =$sqlObj1->locationbase;
            $national[$j] =$sqlObj1->national;
            $mtype[$j] =$sqlObj1->mtype;
            $mvat[$j] =$sqlObj1->mvat;
            $cmp2[$j] =$sqlObj1->cmp2;
            $moneyb[$j] = 0;
            $total_ewallet = 0;
            $moneyb[$j] = backmonthpv($dbprefix,$mcode[$j],$ro);
         
            $total_ambonus[$j] = $sqlObj1->ambonus; 
            $total_ambonus2[$j] = $sqlObj1->ambonus2;
            $totaladjust[$j] = $sqlObj1->madjust;

            
            $totalamt[$j] = ($totaladjust[$j]+$total_ambonus[$j]+$total_ambonus2[$j]); // this round        
			//echo $totalamt[$j].' : '.$total_ambonus[$j].' : '.$total_bmbonus[$j].' : '.$total_mmbonus[$j].' : '.$total_embonus[$j].' : '.$total_voucher[$j].'<br>';
            $totalamt1[$j] =  $moneyb[$j]+$totalamt[$j];          
                
					//echo mysql_num_rows($rs12)."  ";
					//echo $j."  ";
					//echo $mcode[$j]."  ";
					//echo $totalamt1[$j]."  ".$moneyb[$j]."<BR>";
				
                if($totalamt1[$j] > 0)
                {         
					
                    if($cmp[$j] == '¤Ãº' and $cmp2[$j] == '¤Ãº' and !empty($acc_no[$j])) //// YES
                    {
                        if($totalamt1[$j] >= 300)
                        {
                            $tax[$j] = $totalamt1[$j]*0.05;
                            //$com_transfer_chagre = 45;
                           // if($bankcode[$j]  == '60'){ $com_transfer_chagre = 20;}
						   $com_transfer_chagre = 30;
                            $commission = array(
                                "rcode"        => $ro,
                                "mcode"        => $mcode[$j],
                                "status"       => '1',  // pay 
                                "pv"           => $moneyb[$j],  // back pv    
                                "pvb"          => $totalamt[$j],     // pv this round
                                "fob"          => $total_ambonus[$j],  
								"ambonus2"        => $total_ambonus2[$j],  
								"adjust"       => $totaladjust[$j],
                                "tot_tax"      => $tax[$j], // tax
                                "total"        => $totalamt1[$j], // all total  // pvb+pv    
                                "paydate"   =>$paydate,
                                "fdate"   =>$fdate,
                                "tdate"   =>$tdate,
                                "mpos"         => $pos_cur[$j], 
                                "com_transfer_chagre"    => $com_transfer_chagre                        
                            );
                            insert('ali_cmbonus',$commission); 
                         }
                         else
                         {
                            if($cmp[$j] == '¤Ãº')$c_note1 = 1;else $c_note1 = "";
                            if($cmp2[$j] == '¤Ãº')$c_note2 = 1;else $c_note2 = "";
                            if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";                        
                                
                            $commission = array(
                                "rcode"        => $ro,
                                "mcode"        => $mcode[$j],
                                "status"       => '0',  // pay 
                                "pv"           => $moneyb[$j],  // back pv    
                                "pvb"          => $totalamt[$j],     // pv this round
                                "pvh"           => $totalamt1[$j],  // back pv    
                                 "fob"          => $total_ambonus[$j],  
								"ambonus2"        => $total_ambonus2[$j],  
								"adjust"       => $totaladjust[$j],
                                "tot_tax"      => $tax[$j], // tax
                                "total"        => '0', // all total  // pvb+pv
                                "fdate"           =>$fdate,
                                "tdate"           =>$tdate,
                                "mpos"         => $pos_cur[$j], 
                                "c_note1"      => $c_note1, 
                                "c_note2"      => $c_note2, 
                                "c_note3"      => $c_note3,                                                  
                            );
                            insert('ali_cmbonus',$commission);                         
                        }
                       
                    }
                    else /////  NO
                    {
                        if($cmp[$j] == '¤Ãº')$c_note1 = 1;else $c_note1 = "";
                        if($cmp2[$j] == '¤Ãº')$c_note2 = 1;else $c_note2 = "";
                        if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
                            $commission = array(
                                "rcode"        => $ro,
                                "mcode"        => $mcode[$j],
                                "status"       => '0',  // pay 
                                "pv"           => $moneyb[$j],  // back pv    
                                "pvb"          => $totalamt[$j],     // pv this round
                                "pvh"           => $totalamt1[$j],  // back pv    
                                "fob"          => $total_ambonus[$j], 
								"ambonus2"        => $total_ambonus2[$j],
								"adjust"       => $totaladjust[$j],
                                "tot_tax"      => $tax[$j], // tax
                                "total"        => '0', // all total  // pvb+pv
                                 "fdate"   =>$fdate,
                                "tdate"   =>$tdate,
                                "mpos"         => $pos_cur[$j], 
                                "c_note1"      => $c_note1, 
                                "c_note2"      => $c_note2, 
                                "c_note3"      => $c_note3,                                                  
                            );
                            insert('ali_cmbonus',$commission);  
                    }                
                }     
        }
    }
}



function backmonthpv($dbprefix,$mcode,$ro){
	$sql2 = "select mcode,pvh,status from ".$dbprefix."cmbonus WHERE  mcode='$mcode'   order by rcode desc limit 0,1 ";
	
	//if($mcode == '0007243')echo $sql2.'<br>';
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		if($sqlObj2->status == '0')$pv= $sqlObj2->pvh;
		else $pv=0;
		//$pv= $sqlObj2->pvh;
	}else{
		$pv = 0;
	}
	//echo $mcode.' : '.$pv.'<br>';
	return $pv;
}

 function backallpv($dbprefix,$mcode,$ro,$tdate){
	$chkdate = explode('-',$tdate);
	$chkdate1 = $chkdate[0];
	$sql2 = "select totaly from ".$dbprefix."cmbonus WHERE  mcode='$mcode' and paydate like '%".$chkdate1."%' order by id desc limit 0,1 ";
	//if($mcode == '0000008')echo $sql2.'<br>';
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		$pv= $sqlObj2->totaly;
	}else{
		$pv = 0;
	}
	//echo $mcode.' : '.$pv.'<br>';
	return $pv;
}
?>
