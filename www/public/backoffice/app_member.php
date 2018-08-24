<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php");?>
<?
set_time_limit (0);
ini_set("memory_limit","1000M");


$sql = "TRUNCATE TABLE ".$dbprefix."cnt_bmh ";
					mysql_query($sql);
			////////check lr/////////////
				$sql = "TRUNCATE TABLE ".$dbprefix."asaleh_bm ";
				mysql_query($sql);
										$fdate =	date("Y-m")."-01";
										$tdate = date("Y-m")."-31";

				$sql="SELECT mcode,upa_code,lr FROM ".$dbprefix."member ORDER BY lr DESC";
					$rs = mysql_query($sql);
					for($i=0;$i<mysql_num_rows($rs);$i++){
						$sqlObj = mysql_fetch_object($rs);
						$mcode[$i] =$sqlObj->mcode;		
						//$name_t[$i] =$sqlObj->name_t;		
						$upa_code[$mcode[$i]] = $sqlObj->upa_code;
						$lr1[$mcode[$i]] = $sqlObj->lr;
						//$pos_cur[$mcode[$i]] = $sqlObj->pos_cur;
						$tot_pv[$mcode[$i]] = 0; 
						$tot_pv1[$mcode[$i]] = 0; 
						$sum_pv[$mcode[$i]][1] =0;
						$sum_pv[$mcode[$i]][2] =0;
						$sum_pv[$mcode[$i]][3] =0;
						$count[$mcode[$i]][1] =0;
						$count[$mcode[$i]][2] =0;
						$count[$mcode[$i]][3] =0;
						$old_quota[$mcode[$i]] = 0;
					}
					mysql_free_result($rs);

					$sql 	= "SELECT mcode,sum(tot_pv) as tot_pv FROM ".$dbprefix."holdhead ";
					$sql .= "WHERE sadate between '$fdate' and '$tdate'  and sa_type = 'A' AND cancel=0   group by mcode";
					$rs = mysql_query($sql);
					$cmc123 = array();
					for($i=0;$i<mysql_num_rows($rs);$i++){
						$sqlObj = mysql_fetch_object($rs);
						$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;

						$cmc123[$i] = $sqlObj->mcode;
					}
					


					//mysql_free_result($rs);
					$ro=0;
					$sql = "INSERT INTO ".$dbprefix."asaleh_bm (rcode,mcode,upa_code,pv,lr,fdate,tdate,mpos,satype) VALUES ";	
					$checkcheck = 0;
					for($i=0;$i<sizeof($cmc123);$i++){
						if($tot_pv[$cmc123[$i]] > 0){
							$up = $cmc123[$i];
							$lev = 0;
							while($up <> ""){
								if($upa_code[$up] <>""){
									if($tot_pv[$cmc123[$i]]>0){
										
										$sql .= "(".$ro.",'$cmc123[$i]','$upa_code[$up]','".$tot_pv[$cmc123[$i]]."','$lr1[$up]','$fdate','$tdate','".$pos_cur[$cmc123[$i]]."','A'), ";


										$checkcheck++;
										if($checkcheck > 15000){
											$sql .= "(".$ro.",'','','','','$fdate','$tdate','','A') ";
											echo $sql.'<br>';
											//exit;
											mysql_query($sql);
											$sql = "INSERT INTO ".$dbprefix."asaleh_bm (rcode,mcode,upa_code,pv,lr,fdate,tdate,mpos,satype) VALUES ";	
											$checkcheck = 0;
										}

									//	mysql_query($sql);
										
									}
									//echo "จากบิลขาย : $sql <br>";
									//exit;
								}
								$up = $upa_code[$up];
							}
						}
					}	

					if($checkcheck > 0){
						$sql .= "(".$ro.",'','','','','$fdate','$tdate','','A') ";
						echo $sql.'<br>';
						//echo $sql;
						//exit;
						mysql_query($sql);
					}

					//exit;

					$cmc1234 = array();
					$sql 	= "SELECT mcode,sum(tot_pv) as tot_pv FROM ".$dbprefix."asaleh ";
					$sql .= "WHERE sadate between '$fdate' and '$tdate'  AND sa_type = 'A' and  cancel=0   group by mcode";
					$rs = mysql_query($sql);
					for($i=0;$i<mysql_num_rows($rs);$i++){
						$sqlObj = mysql_fetch_object($rs);
						$tot_pv1[$sqlObj->mcode] += $sqlObj->tot_pv;
						$cmc1234[$i] = $sqlObj->mcode;
					}
					//mysql_free_result($rs);
					$ro = 1;
					
					//คำนวน bm ไม่ใช้ในส่วน bmbonus
					$sql = "INSERT INTO ".$dbprefix."asaleh_bm (rcode,mcode,upa_code,pv,lr,fdate,tdate,mpos,satype) VALUES ";
					$checkcheck = 0;
					for($i=0;$i<sizeof($cmc1234);$i++){
						if($tot_pv1[$cmc1234[$i]] > 0){
							$up = $cmc1234[$i];
							$lev = 0;
							while($up <> ""){
								if($upa_code[$up] <>""){
									if($tot_pv1[$cmc1234[$i]]>0){
										//$sql = "INSERT INTO ".$dbprefix."asaleh_bm (rcode,mcode,upa_code,pv,lr,fdate,tdate,mpos,satype) VALUES";
										$sql .= "(".$ro.",'$cmc1234[$i]','$upa_code[$up]','".$tot_pv1[$cmc1234[$i]]."','$lr1[$up]','$fdate','$tdate','".$pos_cur[$cmc1234[$i]]."','A'),";
										//mysql_query($sql);
										$checkcheck++;
										if($checkcheck > 15000){
											$sql .= "(".$ro.",'','','','','$fdate','$tdate','','A') ";
											mysql_query($sql);
											$sql = "INSERT INTO ".$dbprefix."asaleh_bm (rcode,mcode,upa_code,pv,lr,fdate,tdate,mpos,satype) VALUES";	
											$checkcheck = 0;
										}
									}
									//echo "จากบิลขาย : $sql <br>";
									//exit;
								}
								$up = $upa_code[$up];
							}
						}
					}		

					if($checkcheck > 0){
						$sql .= "(".$ro.",'','','','','$fdate','$tdate','','A') ";
						mysql_query($sql);
					}
					//exit;
				//	exit;
		exit;
		//========================เก็บลายระเอียดสมาชิกทุกคน=======================================
		$sql="SELECT * FROM ".$dbprefix."member  ";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode[$i] =$sqlObj->mcode;		
			//$name_t[$mcode[$i]] =$sqlObj->name_t;		
			$upa_code[$mcode[$i]] = $sqlObj->upa_code;
			//$mo[$mcode[$i]] = $sqlObj->mo;
			//$stockist[$mcode[$i]] = $sqlObj->stockist;
			//echo $mcode[$i]."=mcode[$i]<br>";
		}//for($i=0;$i<mysql_num_rows($rs);$i++){
		//========================จบเก็บลายระเอียดสมาชิกทุกคน====================================
		for($j=5001;$j<10000;$j++){
			$smc = $mcode[$j];
			$upa = trim($upa_code[$mcode[$j]]);
			//$tran = trim($upa_code[$upa_code[$mcode[$j]]]);
			$level =0;
			echo $smc.'=smc<br>';
			echo $j.'=j<br>';
			while($upa != ''){
				$tran = trim($upa_code[$upa]);
				echo $level.'=level<br>';
				echo $upa.'=upa<br>';
				if($level>300)
					exit;
				$level++;	
				$upa = $tran;
			}//while($upa != ''){
		}//for($j=0;$j<mysql_num_rows($rs);$j++){
		mysql_free_result($rs);
?>