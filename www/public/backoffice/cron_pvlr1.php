<?
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
ob_start();
exit;
include("connectmysql.php");
include_once("prefix.php");
//include("gencode.php");
//include("global.php");
set_time_limit (0);
ini_set("memory_limit","5000M");
$time_start = getmicrotime();
echo "เริ่มการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน around<BR><BR>";
$sql = "TRUNCATE TABLE ".$dbprefix."bm_chart ";
mysql_query($sql);



				$sql="SELECT mcode,upa_code,lr,pos_cur,pos_cur2 FROM ".$dbprefix."member ORDER BY lr DESC";
					$rs = mysql_query($sql);
					for($i=0;$i<mysql_num_rows($rs);$i++){
						$sqlObj = mysql_fetch_object($rs);
						$mcode[$i] =$sqlObj->mcode;		
						$upa_code[$mcode[$i]] = $sqlObj->upa_code;
						$lr1[$mcode[$i]] = $sqlObj->lr;
						$pos_cur[$mcode[$i]] = $sqlObj->pos_cur;
						$pos_cur2[$mcode[$i]] = $sqlObj->pos_cur2;
					}

					mysql_free_result($rs);
					//คำนวน bm ไม่ใช้ในส่วน bmbonus
					$k = 0;
					for($i=0;$i<sizeof($mcode);$i++){
						$up = $mcode[$i];
						$lev = 1;
						if($pos_cur[$up] <> 'MB'  and $pos_cur[$up] <> 'NM'){
							while($up <> ""){
								$k = 0;
								if($upa_code[$up] <>""){
									$sql = "INSERT INTO ".$dbprefix."bm_chart (mcode,upa_code,lr,lv) VALUES";
									$sql .= "('$mcode[$i]','$upa_code[$up]','$lr1[$up]','".$lev."') ";
									mysql_query($sql);
									$lev++;
								}
								if($k == '300'){
									echo $up;
									exit;
								}
								$up = $upa_code[$up];
								$k =$k+1;
							}
						}
					}	
$time_end = getmicrotime();
$time = $time_end - $time_start;
echo "LR สิ้นสุดการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR><BR>";


$time_end = getmicrotime();
$time = $time_end - $time_start;
echo "สิ้นสุดการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR>";
ob_end_flush();
function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 
?>