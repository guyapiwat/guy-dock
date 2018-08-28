<?

				//---------------------delete from cm, cmbonus-----------------
				$sql="delete from ".$dbprefix."csale where rcode='$ro'  "  ;
				if(mysql_query($sql)){
					mysql_query("COMMIT");
				}else{
					echo "error $sql<BR>";
				}
				$text="uid=".$_SESSION["adminuserid"]." action=comsn_c_calc =>$sql";
				writelogfile($text);

				
				$sql="delete from ".$dbprefix."cmbonus where rcode='$ro' "  ;
				if(mysql_query($sql)){
					mysql_query("COMMIT");
				}else{
					echo "error $sql<BR>";
				}
				$text="uid=".$_SESSION["adminuserid"]." action=comsn_c_calc =>$sql";
				writelogfile($text);
				
				$sql="delete from ".$dbprefix."cm where rcode='$ro' " ;
				if(mysql_query($sql)){
					mysql_query("COMMIT");
				}else{
					echo "error $sql<BR>";
				}
				$text="uid=".$_SESSION["adminuserid"]." action=comsn_c_calc =>$sql";
				writelogfile($text);
				

 			
//---------------------ใส่ผู้แนะนำ --------------------------------------
				$sql  = "INSERT INTO ".$dbprefix."cm (rcode,sano, mcode,bcode,mpos, pv  ) ";
				$sql .= "SELECT  '$ro', h.sano, m.sp_code,  m.mcode, m.pos_cur, tot_pv " ; 
				$sql .= " FROM ".$dbprefix."asaleh  h ";
				$sql .= " LEFT OUTER JOIN ".$dbprefix."member m on m.mcode = h.mcode ";
				$sql .= "WHERE (sadate BETWEEN sadate>='$fdate' and sadate<='$tdate')  and sp_code <> '' "; // use bills of B plan to calculate
				
				$rs = mysql_query($sql);
				echo "1. ใส่ผู้แนะนำ $sql <br>";
 				$text="uid=".$_SESSION["adminuserid"]." action=comsn_c_calc =>$sql";
				writelogfile($text);
				
 				unset($rs);
//---------------------ให้โบนัส ตามตำแหน่ง --------------------------------------
 				$sql = " SELECT mcode, bcode, (select pos_cur from ".$dbprefix."member m where m.mcode = c.mcode) as mpos, pv, sano from ".$dbprefix."cm c WHERE rcode = '$ro' order by sano ";
 				echo "2. ให้โบนัส ตามตำแหน่ง  $sql. <br>";
 				$rs = mysql_query($sql);
 				while ($row1 = mysql_fetch_object($rs)){
 					$bcode = $row1->bcode;
 					$mcode = $row1->mcode;
 					$mpos = $row1->mpos;
 					$pv = $row1->pv;
 					$sano = $row1->sano;
				 
 					//echo "$mcode , $mpos";
 					
				 	$sql = " SELECT sano from ".$dbprefix."asaleh WHERE mcode = '$bcode'  and sano < '$sano' ";
				 	echo " 2.1 หาบิลว่าใบแรกหรือเปล่า $sql <br>";
 					$rs1 = mysql_query($sql);
 					$nrows = mysql_num_rows($rs1);
 					
 					 
 					if( $nrows == 0  ){
 						$firstbill = true;	
 					}else {
 						$firstbill = false;
 					}
  					

 					//Check first bill ?
 					$percentbm = 0;
 					$bmbonus = 0;
 					$percenttopup = 0;
 					$topup = 0;
 					
 					if($mpos == 'M'){
 							if((int)$pv == 500 && $firstbill){
 								$percentbm = 0.1;
 								$bmbonus = $pv * 0.1;
 							}
 					}else if($mpos == 'DB'){
 							if((int)$pv == 1000 && $firstbill){
 								$percentbm = 0.1;
 								$bmbonus = $pv * 0.1;
 							}
 					}else if($mpos == 'MG'){
 							if((int)$pv == 3000){
 								if($firstbill){
	 								$percentbm = 0.2;
	 								$bmbonus = $pv * 0.2;			
 								}else {
	 								$percenttopup = 0.1;
	 								$topup = $pv * 0.1;
 								}	
 							}
 					}else if($mpos == 'DR'){
 							if((int)$pv == 10000){
 								if($firstbill){
	 								$percentbm = 0.2;
	 								$bmbonus = $pv * 0.2;			
 								}else {
	 								$percenttopup = 0.15;
	 								$topup = $pv * 0.15; 									
 								}	
 							}
 					}else if($mpos == 'PR'){
 							if((int)$pv == 20000){
 								if($firstbill){
	 								$percentbm = 0.2;
	 								$bmbonus = $pv * 0.2;			
 								}else {
	 								$percenttopup = 0.2;
	 								$topup = $pv * 0.2; 									
 								}	
 							}
 					}


 					//echo "PV:$pv , MCODE $bcode ,POS: $mpos, %BM: $percentbm, $bmbonus, %topup: $percenttopup , $topup   <br>";
					$sql = " UPDATE ".$dbprefix."cm SET percentbm = '$percentbm', bmbonus = '$bmbonus', percenttopup='$percenttopup', topup = '$topup'   WHERE mcode = '$mcode' and rcode = '$ro'  and sano = '$sano'  ";
					mysql_query($sql);
					$text="uid=".$_SESSION["adminuserid"]." action=comsn_c_calc =>$sql";
					writelogfile($text);
 					
					//echo $sql."<br>";
 				}
 				 

 				// Summarize bonus to CMBONUS
				$sql = " INSERT INTO ".$dbprefix."cmbonus (rcode, mcode, bcode, total, bonus, topup)  ";
				$sql .= " SELECT rcode, mcode, bcode, sum(bmbonus + topup), sum(bmbonus), sum(topup)  FROM  ".$dbprefix."cm WHERE rcode = '$ro'  group by mcode ";
				echo " 3. เก็บเข้า AMBONUS $sql <br>";
 				mysql_query($sql);
 				
				$text="uid=".$_SESSION["adminuserid"]." action=comsn_c_calc =>$sql";
				writelogfile($text);
 		?>