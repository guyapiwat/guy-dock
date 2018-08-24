<? 
include("connectmysql.php");
$j = 0;
Exit;
$brcode[$j] = '1';
$dbprefix ="chen_";
$fdate = "2009-01-01";
$tdate = "2009-02-01";



 				$sql = " SELECT mcode, bcode,  mpos, pv, sano from ".$dbprefix."cm WHERE rcode = '$brcode[$j]' order by sano ";
 				echo $sql."<br>";
 				$rs = mysql_query($sql);
 				while ($row1 = mysql_fetch_object($rs)){
 					$bcode = $row1->bcode;
 					$mcode = $row1->mcode;
 					$mpos = $row1->mpos;
 					$pv = $row1->pv;
 					$sano = $row1->sano;
				 					
 					$sql = " SELECT sano from ".$dbprefix."saleh WHERE mcode = '$bcode' and  sadate < '".$fdate."' and sano < $sano ";
 					$result = mysql_query($sql);
					$num_rows = mysql_num_rows($result);
 					
 					 
 					if( $num_rows > 0  ){
 						$firstbill = false;	
 					}else {
 						$firstbill = true;
 					}
  					
 					//Check first bill ?
 					switch ($mpos){
 						case 'M':
 							if((int)$pv == 500 && $firstbill){
 								$percentbm = 0.1;
 								$bmbonus = $pv * 0.1;
 							}
 							break;
 						case 'DB':
 							if((int)$pv == 1000 && $firstbill){
 								$percentbm = 0.1;
 								$bmbonus = $pv * 0.1;
 							}
 							break;
 						case 'MG':
 							if((int)$pv == 3000){
 								if($firstbill){
	 								$percentbm = 0.2;
	 								$bmbonus = $pv * 0.2;			
 								}else {
	 								$percenttopup = 0.1;
	 								$topup = $pv * 0.1; 									
 								}	
 							}
 							break;
 						case 'DR':
 							if((int)$pv == 10000){
 								if($firstbill){
	 								$percentbm = 0.2;
	 								$bmbonus = $pv * 0.2;			
 								}else {
	 								$percenttopup = 0.15;
	 								$topup = $pv * 0.15; 									
 								}	
 							}
 							break;
 						case 'PR':
 							if((int)$pv == 20000){
 								if($firstbill){
	 								$percentbm = 0.2;
	 								$bmbonus = $pv * 0.2;			
 								}else {
	 								$percenttopup = 0.2;
	 								$topup = $pv * 0.2; 									
 								}	
 							}
 							break;
 						default:
 							break;
 					}
 					echo "PV:$pv , MCODE $bcode ,POS: $mpos, %BM: $percentbm, $bmbonus, %topup: $percenttopup , $topup   <br>";
					$sql = " UPDATE ".$dbprefix."cm SET percentbm = '$percentbm', bmbonus = '$bmbonus', percenttopup='$percenttopup', topup = '$topup'   WHERE mcode = '$mcode' and rcode = '$brcode[$j]'   ";
 					mysql_query($sql);
					echo $sql."<br>";
 				}
				
 
?>