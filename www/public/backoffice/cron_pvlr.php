<?
session_start();
?>
<link rel="stylesheet" type="text/css" href="./../style.css" />
<?
include("connectmysql.php");
include("./cls/chartGenerator.php");
include("gencode.php");
include("global.php");
include_once("wording".$_SESSION["lan"].".php");
//set_time_limit (0);
set_time_limit (0);
ini_set("memory_limit","1000M");

		$cmc = $_SESSION["usercode"];

			$sql="SELECT mcode,name_f,name_t,upa_code,pos_cur,pos_cur1,sp_code,lr FROM ".$dbprefix."member ORDER BY lr DESC";
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$mcode[$i] =$sqlObj->mcode;		
				$name_b[$i] =$sqlObj->name_f.' '.$sqlObj->name_t;		
				$upa_code[$mcode[$i]] = $sqlObj->upa_code;
				$pos_cur[$mcode[$i]] = $sqlObj->pos_cur;
				$pos_cur1[$mcode[$i]] = $sqlObj->pos_cur1;
				$sp_code[$mcode[$i]] = $sqlObj->sp_code;
				$lr[$mcode[$i]] = $sqlObj->lr;
				$sum_pv[$mcode[$i]][1] =0;
				$sum_pv[$mcode[$i]][2] =0;
				$sum_pv[$mcode[$i]][3] =0;
				$pcarry[$mcode[$i]][1] =0;
				$pcarry[$mcode[$i]][2] =0;
				$pcarry[$mcode[$i]][3] =0;
				$people[$mcode[$i]][1] = 0;
				$people[$mcode[$i]][2] = 0;
				$people[$mcode[$i]][3] = 0;
				$people1[$mcode[$i]][1] = 0;
				$people1[$mcode[$i]][2] = 0;
				$people1[$mcode[$i]][3] = 0;
				$pair_stop[$mcode[$i]] = 0;
				$max_quota[$mcode[$i]] = $pos_quota[$pos_cur[$mcode[$i]]];
			}
			
			//echo $sql;
			$sql="SELECT rcode,fdate,tdate FROM ".$dbprefix."around WHERE calc='1' and tdate like '%".$_SESSION["datetimezone_Ym"]."%' ORDER BY rcode asc LIMIT 1";
			//echo $sql;
			$rs = mysql_query($sql);
			$where_cause = "";
			$max_rcode = 0;
			if(mysql_num_rows($rs)>0){
				//$where_cause = "AND sadate>'".mysql_result($rs,0,'tdate')."' ";
				$max_rcode = mysql_result($rs,0,'rcode');
			}
			$where_cause = "AND sadate between  '".$_SESSION["datetimezone_Ym"]."-01' and  '".$_SESSION["datetimezone_Ym"]."-31' ";
			$sql="SELECT sum(tot_pv) as tot_pv1,mcode FROM ".$dbprefix."asaleh  WHERE sa_type='A' and cancel = 0 $where_cause and cancel=0 group by mcode "; //AND (sa_type='T' OR sa_type='P') AND sa_type='A'
		//	echo $sql;
		//	exit;
			$cmcode = array();
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv1;
				$cmcode[$i] = $sqlObj->mcode;
			}
			mysql_free_result($rs);

			$cmcode1 = array();
			$sql="SELECT sum(tot_pv) as tot_pv1,mcode FROM ".$dbprefix."holdhead  WHERE sa_type='A' $where_cause and cancel=0 group by mcode "; //AND (sa_type='T' OR sa_type='P') AND sa_type='A'
			//echo $sql;
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv1;
				$cmcode1[$i] = $sqlObj->mcode;
			}
			mysql_free_result($rs);

			//var_dump($tot_pv["0000008"]);
			//exit;

			

			$cmcode2 = array();
			$where_cause = "AND sadate between  '".$_SESSION["datetimezone_Ym"]."-01' and  '".$_SESSION["datetimezone_Ym"]."-31' ";
			$sql="SELECT sum(hpv) as tot_pv1,mcode FROM ".$dbprefix."asaleh  WHERE sa_type='H' and cancel = 0 and hpv>0 group by mcode "; //AND (sa_type='T' OR sa_type='P') AND sa_type='A'
			//echo $sql;
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$tot_pvh[$sqlObj->mcode] += $sqlObj->tot_pv1;
				$cmcode2[$i] = $sqlObj->mcode;
			}
			mysql_free_result($rs);
			
			for($i=0;$i<sizeof($mcode);$i++){
				//if($exp_date[$mcode[$i]]=='' || $exp_date[$mcode[$i]]<=0) continue; //ไม่รักษายอดทิ้งไปเลย
				$up = $mcode[$i];
				while($up <> ""){
					if($up == "") break;
					//if($exp_date[$upa_code[$up]]=='' || $exp_date[$upa_code[$up]]<=0){ $up = $upa_code[$up];continue;} //ไม่รักษายอดทิ้งไปเลย
					if($upa_code[$up] <>""){
						$sum_pv[$upa_code[$up]][$lr[$up]] += $tot_pv[$mcode[$i]];
						$sum_pvh[$upa_code[$up]][$lr[$up]] += $tot_pvh[$mcode[$i]];
						//$people1[$upa_code[$up]][$lr[$up]]++;
						if($tot_pv[$mcode[$i]] > 0 or $tot_pvh[$mcode[$i]] > 0)
							$count[$upa_code[$up]][$lr[$up]]++;

					}
					$up = $upa_code[$up];
				}
			}
		//var_dump($sum_pv["0000008"]);
		//exit;

		$sql="SELECT mcode FROM ".$dbprefix."member ORDER BY lr DESC";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode[$i] =$sqlObj->mcode;		
				mysql_query("update ".$dbprefix."member set pv_l = '".$sum_pv[$mcode[$i]][1]."' ,
				pv_c = '".$sum_pv[$mcode[$i]][2]."' ,
				hpv_l = '".$sum_pvh[$mcode[$i]][1]."' ,
				hpv_c = '".$sum_pvh[$mcode[$i]][2]."' where mcode = '".$mcode[$i]."' ");
				if($mcode[$i] == '0000008')echo "update ".$dbprefix."member set pv_l = '".$sum_pv[$mcode[$i]][1]."' ,
				pv_c = '".$sum_pv[$mcode[$i]][2]."' ,
				hpv_l = '".$sum_pvh[$mcode[$i]][1]."' ,
				hpv_c = '".$sum_pvh[$mcode[$i]][2]."' where mcode = '".$mcode[$i]."' ";
		}
?>