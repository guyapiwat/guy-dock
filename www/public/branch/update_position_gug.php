<? //************************************************************************
     //  	Creation Date 	:	02/08/2008
	 // 	Author				:	Aurapin	Kaerattana
	 //		Copyright			:	This program is released under alisio.com License.
	 //		Author Email		:	info@alisio.com
	 //		Author Url			:	http://alisio.com
	 //		Description		:	อัพเดทตำแหน่ง 
	 //									ก่อนวันที่  สมาชิกที่มี PV สะสม >= 1700 ให้มีตำแหน่งสมบูรณ์ (สีน้ำเงิน)
	 //									หลังจากวันที่ สมาชิกที่มี PV สะสม >= 2000 ให้มีตำแหน่งสมบูรณ์ (สีน้ำเงิน)
	 //									ตำแหน่งไม่สมบูรณ์ คือ สีเขียว
	 //************************************************************************ ?>
<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<?
set_time_limit(0);		
ini_set("memory_limit","200M");	
				$koy=0;
				// เก็บข้อมูลสมาชิกทั้งหมด+++++++++++++++++++++++++++++++++++++++++++++++
				$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
				echo $sql.'<br>';
				$rs = mysql_query($sql);
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$sqlObj = mysql_fetch_object($rs);
					echo $i.'=i<br>';
					$mcode[$i] =$sqlObj->mcode;		
					$name_t[$mcode[$i]] =$sqlObj->name_t;		
					$mdate[$mcode[$i]] =$sqlObj->mdate;		
					$upa_code[$mcode[$i]] = $sqlObj->upa_code;
					$sp_code[$mcode[$i]] = $sqlObj->sp_code;
					$lr[$mcode[$i]] = $sqlObj->lr;
					$pos_cur[$mcode[$i]] = $sqlObj->pos_cur;
					$pos_cur[$mcode[$i]] = (int)$pos_cur[$mcode[$i]];
					$pos_new[$mcode[$i]] = $sqlObj->pos_cur;
					$sql="SELECT SUM(tot_pv) as tot_pv FROM ".$dbprefix."asaleh WHERE mcode ='".$sqlObj->mcode."' ";
					echo $sql.'<br>';
					$rs_sp = mysql_query($sql);
					if(mysql_num_rows($rs_sp)>0){
						$tot_pv[$mcode[$i]] = mysql_result($rs_sp,0,'tot_pv');
					}//if(mysql_num_rows($result1)>0){
					mysql_free_result($rs_sp);
					if($tot_pv[$mcode[$i]]>=1700){
						echo $koy.'=koy<br>';
						$sql="update ".$dbprefix."member set pos_cur='C' where mcode='".$mcode[$i]."' ";
						echo $sql.','.$tot_pv[$mcode[$i]].'=tot_pv<br>';
						if(mysql_query($sql)){mysql_query("COMMIT");}
						else{echo "error $sql<BR>";}
						$koy++;
					}//if($tot_pv[$mcode[$i]]>=1700){
					
				}//for($i=0;$i<mysql_num_rows($rs);$i++){
				mysql_free_result($rs);
				//echo sizeof($mcode).'=size mcode out<br>';
				//+++++++++++++++++++++++++++++++++++++++++++++++จบการเก็บข้อมูลสมาชิก 
?>