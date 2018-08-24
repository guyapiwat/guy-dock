<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>
<?php

//echo $thisMonth = thisMonth('2015-01-31');


$fdate = '2015-02-17';
$tdate = '2015-02-24';
del('ali_mc'," fdate >= '".$fdate."' ");	
del('ali_mmbonus'," fdate >= '".$fdate."'");	






fnc_calc_fast_key('ali_',$ro,$fdate,$tdate,$fpdate,$tpdate);

function fnc_calc_fast_key($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){

	$sql = "SELECT mcode,uid,id,sadate FROM ali_asaleh WHERE lid = '' and scheck = 'register' and sadate >= '$fdate' and sadate <= '$tdate' "; 
	$rs = mysql_query($sql);	
	$num =  mysql_num_rows($rs);
	for($i=0;$i<$num;$i++)
	{
		$pv_total=0;
		$tot_pv_a=0;
		$tot_pv_h=0;
		$mainsano = '';
		$sqlObj = mysql_fetch_object($rs);
		$mcode =$sqlObj->mcode;
		$uid =$sqlObj->uid;
		$id =$sqlObj->id;
		$sadate =$sqlObj->sadate;		
			
		$sql1 = "SELECT sano,id,tot_pv,sctime FROM ali_asaleh WHERE mcode ='$mcode' and uid = '$uid' and scheck <> 'register' and tot_pv >0 and sadate = '$sadate' order by id ASC LIMIT 0,1"; 
 		$rs1 = mysql_query($sql1);	
		if(mysql_num_rows($rs1)>0){
			$sqlObj1 = mysql_fetch_object($rs1);
			$id_a =$sqlObj->id;
			$sctime_a =$sqlObj1->sctime; 
			$sano =$sqlObj1->sano; 
			$tot_pv_a =$sqlObj1->tot_pv;
		}
		
		$sql2 = "SELECT hono,id,tot_pv,sctime FROM ali_holdhead WHERE  mcode ='$mcode' and uid = '$uid' and tot_pv >0 and sadate = '$sadate' order by id ASC LIMIT 0,1"; 
		$rs2 = mysql_query($sql2);	
		if(mysql_num_rows($rs2)>0){
			$sqlObj2 = mysql_fetch_object($rs2);
			$id_h =$sqlObj->id;
			$sctime_h =$sqlObj2->sctime; 
			$tot_pv_h =$sqlObj2->tot_pv;
			$hono =$sqlObj1->hono; 
		}
		$update = array("status"	=> $ro);

		if($sctime_h != '' and $sctime_a != ''){
			if($sctime_h < $sctime_a)
			{
				$tot_pv = $tot_pv_h;
				$mainsano = $hono;	
			//	update('ali_holdhead',$update,"id ='".$id_a."' ") ;
			}else{
				$tot_pv =$tot_pv_a;
				$mainsano = $sano;
			//	update('ali_asaleh',$update,"id ='".$id_a."' ") ;
			}
		}else if($sctime_h == '' and $sctime_a != ''){
			$tot_pv = $tot_pv_a;
			$mainsano = $sano;
			//update('ali_asaleh',$update,"id ='".$id_a."' ") ;
		}else if($sctime_h != '' and $sctime_a == ''){
			$tot_pv = $tot_pv_h;
			$mainsano = $hono;
			//update('ali_holdhead',$update,"id ='".$id_a."' ") ;
		}else{
			$tot_pv = 0;
		}	
		if($tot_pv > 0){

			$bonus = array(
				'NBM'  => array('NBM'=>0.2,'ANBM'=>0.2,'SNBS'=>0.2,'NBS'=>0.2,'NBL'=>0.2,'NBO'=>0,'MB'=>0),
				'ANBM' => array('NBM'=>0.1,'ANBM'=>0.2,'SNBS'=>0.2,'NBS'=>0.2,'NBL'=>0.2,'NBO'=>0,'MB'=>0),
				'SNBS' => array('NBM'=>0.1,'ANBM'=>0.1,'SNBS'=>0.2,'NBS'=>0.2,'NBL'=>0.2,'NBO'=>0,'MB'=>0),
				'NBS'  => array('NBM'=>0.1,'ANBM'=>0.1,'SNBS'=>0.1,'NBS'=>0.2,'NBL'=>0.2,'NBO'=>0,'MB'=>0),
				'NBL'  => array('NBM'=>0.1,'ANBM'=>0.1,'SNBS'=>0.1,'NBS'=>0.1,'NBL'=>0.2,'NBO'=>0,'MB'=>0),
				'NBO'  => array('NBM'=>0,'ANBM'=>0,'SNBS'=>0,'NBS'=>0,'NBL'=>0,'NBO'=>0,'MB'=>0),
				'MB'   => array('NBM'=>0,'ANBM'=>0,'SNBS'=>0,'NBS'=>0,'NBL'=>0,'NBO'=>0,'MB'=>0)
			);	
		
			$sql3="SELECT * FROM ali_member WHERE mcode = '$uid'";
			$rs3 = mysql_query($sql3);	
			if(mysql_num_rows($rs3)>0){	

				$puid= get_detail_meber($uid,$tdate);
				$pmcode = get_detail_meber($mcode,$tdate);

						
				$percer = 	$bonus[$puid['pos_cur']][$pmcode['pos_cur']];
				$pv_total = $tot_pv*$percer;	
				echo $uid.'  > '.$mcode.'<br>';
				echo $puid['pos_cur'].'  > '.$pmcode['pos_cur'].'  ---  '.$percer.'<br><br>';					
				if($pv_total > 0){
					//echo $uid.'  > '.$mcode.'<br><br>';
					$insert = array(
									"rcode"		=> $ro,
									"sano"		=> $mainsano,
									"mcode"		=> $mcode,
									"upa_code"	=> $uid,
									"pv"		=> $tot_pv,
									"level"		=> 0,
									"gen"		=> 0,				
									"percer"	=> $percer,					 
									"total"		=> $pv_total,					 
									"fdate"		=> $sadate,	
									"tdate"		=> $sadate,
									"mposi"		=> $pos_cur
								);
					insert('ali_mc',$insert);
				}
			}
		}		
	}

	$sql = " insert into ".$dbprefix."mmbonus  (rcode, mcode, total,tot_pv,tax,bonus,fdate,tdate,pos_cur) ";
	$sql .= "	select '$ro', upa_code,sum(total) as totalpv,sum(pv) as pvpv,sum(total)*5/100 as tax,sum(total)-sum(total)*5/100 as bonus,'$fdate','$tdate',mposi from ".$dbprefix."mc WHERE  fdate >= '$fdate' and upa_code<>'' and mposi <> 'TN' group by upa_code ";
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
		echo  "$sql<br>";
		echo  die(mysql_error());
		exit;
	}
}












/*
$sql = " SELECT upa_code,pv ";
$sql .= " FROM ali_bm1 ";
$sql .= " WHERE level = 0 ";
$rs = mysql_query($sql);
	$num =  mysql_num_rows($rs);
	if(mysql_num_rows($rs) > 0)
	{
		for($i=0;$i<$num;$i++)
		{
			$row = mysql_fetch_object($rs);
			$mcode = $row->upa_code;	 
			$pv =$row->pv;
			
			$sql2 = " SELECT upa_code,pv ";
			$sql2 .= " FROM ali_bm1 ";
			$sql2 .= " WHERE level = 1 and upa_code = '".$mcode."'";
			$rs2 = mysql_query($sql2);
			echo $sql2;
				$num2 =  mysql_num_rows($rs2);
				if(mysql_num_rows($rs2) > 0)
				{
					$row2 = mysql_fetch_object($rs2);
					$mcode2 = $row2->upa_code;	 
					$pv2 =$row2->pv;
					$newpv = $pv2-$pv;
					$update = array("pv" => $newpv);
					update('ali_bm1',$update,"level = 1 and  upa_code = '".$mcode."' ");	
					
				}
		}
	} 

*/
?>