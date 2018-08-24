<? session_start()?>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<link rel="stylesheet" type="text/css" href="./../style.css" />
<?
if($_SESSION['usercode']=="" || !isset($_SESSION['usercode'])){
	//echo "<script language='javascript' type='text/javascript'>window.parent.close();</script>";
	exit;
}else{
	//echo $_SESSION['usercode'];
}
include("connectmysql.php");
include("global.php");
include_once("wording".$_SESSION["lan"].".php");
//include("dbprefix.php");
//echo $GLOBALS["numofchild"];
//bmbonus
mysql_query("TRUNCATE TABLE ".$dbprefix."cnt_spcode1");
mysql_query("TRUNCATE TABLE ".$dbprefix."cnt_spcode2");

mysql_query("delete from ".$dbprefix."cnt_spcode1 where sp_code = '$cmc'");
mysql_query("delete from ".$dbprefix."cnt_spcode2 where sp_code = '$cmc'");
$cmc = $_SESSION["usercode"];
//echo $cmc;
if($_GET["chkre"] == '1'){
	$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$mcode[$i] =$sqlObj->mcode;		
				$name_b[$i] =$sqlObj->name_b;		
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
				$pair_stop[$mcode[$i]] = 400;
				$max_quota[$mcode[$i]] = $pos_quota[$pos_cur[$mcode[$i]]];
			}
			
			
			$sql="SELECT rcode,fdate,tdate FROM ".$dbprefix."around WHERE calc='1' ORDER BY rcode DESC LIMIT 1";
			//echo $sql;
			$rs = mysql_query($sql);
			$where_cause = "";
			$max_rcode = 0;
			if(mysql_num_rows($rs)>0){
				$where_cause = "AND sadate>'".mysql_result($rs,0,'tdate')."' ";
				$max_rcode = mysql_result($rs,0,'rcode');
			}
			$sql="SELECT * FROM ".$dbprefix."asaleh  WHERE sa_type='A' and cancel = 0 $where_cause ORDER BY sadate"; //AND (sa_type='T' OR sa_type='P') AND sa_type='A'
			//echo $sql;
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;
			}
			mysql_free_result($rs);
			$sql="SELECT * FROM ".$dbprefix."holdhead  WHERE sa_type='A' $where_cause ORDER BY sadate"; //AND (sa_type='T' OR sa_type='P') AND sa_type='A'
			//echo $sql;
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;
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
						$sql3=" SELECT * from ".$dbprefix."status where mcode = '$up' and month_pv = '".date("Y-m")."' ";
							$rs3 = mysql_query($sql3);
							if(mysql_num_rows($rs3) > 0){
								$people[$upa_code[$up]][$lr[$up]]++;
								$chkstatus = mysql_result($rs3,0,"status");
								//$sql321="SELECT * FROM ".$dbprefix."cnt_spcode2 WHERE mcode='$up' and sp_code = '$cmc'";
								$sql321="SELECT * FROM ".$dbprefix."cnt_spcode2 WHERE mcode='$up' ";
								
								$rs321 = mysql_query($sql321);
								if(mysql_num_rows($rs321) == 0){
									$sql = "INSERT INTO ".$dbprefix."cnt_spcode2 (mcode,sp_code,lr,pos_cur,status) VALUES";
									$sql .= "('$up','$cmc','".$lr[$up]."','".$pos_cur[$up]."','$chkstatus') ";
									mysql_query($sql);
								}

							}else{
								//$sql321="SELECT * FROM ".$dbprefix."cnt_spcode2 WHERE mcode='$up' and sp_code = '$cmc'";
								$sql321="SELECT * FROM ".$dbprefix."cnt_spcode2 WHERE mcode='$up'";
								//echo $sql321.'<br>';
								$rs321 = mysql_query($sql321);
								if(mysql_num_rows($rs321) == 0){
									$sql = "INSERT INTO ".$dbprefix."cnt_spcode2 (mcode,sp_code,lr,pos_cur,status) VALUES";
									$sql .= "('$up','$cmc','".$lr[$up]."','".$pos_cur[$up]."','0') ";
									mysql_query($sql);
								}

							}
							//$people1[$upa_code[$up]][$lr[$up]]++;
						if($tot_pv[$mcode[$i]] > 0)
							$count[$upa_code[$up]][$lr[$up]]++;
					}
					$up = $upa_code[$up];
				}
			}

			$sql="SELECT * FROM ".$dbprefix."bmbonus WHERE rcode='$max_rcode'";
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$pcarry[$sqlObj->mcode][1] = $sqlObj->carry_l;
				$pcarry[$sqlObj->mcode][2] = $sqlObj->carry_c;
				$pcarry[$sqlObj->mcode][3] = $sqlObj->carry_r;
				$pair_stop[$sqlObj->mcode] = $sqlObj->pair_stop;
				
				$quota[$sqlObj->mcode] = $max_quota[$sqlObj->mcode]-(($sqlObj->quota)/1000);
				if($quota[$sqlObj->mcode] == $max_quota[$sqlObj->mcode])$quota[$sqlObj->mcode] = 0;
				//$pcarry_c[$sqlObj->mcode] = $sqlObj->carry_c;
				//$aquota[$sqlObj->mcode] = $sqlObj->aquota;
			}
			//var_dump($quota);
			mysql_free_result($rs);
	////////////////////////////////////////////////////////////////////////////////////////////////////////////


	/////////////////////////// active
	$sql1="SELECT * FROM ".$dbprefix."member WHERE sp_code='".$cmc."' ";
	//echo "2 : $sql1<BR>";
	$rs1 = mysql_query($sql1);
	for($n=0;$n<mysql_num_rows($rs1);$n++){


		$sqlObj1 = mysql_fetch_object($rs1);
		$n_sp_code =$sqlObj1->mcode;
		$n_sp_pos_cur =$sqlObj1->pos_cur;
		
		$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
		//echo "3 : $sql2<BR>";
		$rs2 = mysql_query($sql2);
		for($i=0;$i<mysql_num_rows($rs2);$i++){
			$sqlObj2 = mysql_fetch_object($rs2);
			$up_mcode =$sqlObj2->upa_code;

			$uplr=$sqlObj2->lr;
			$up=$up_mcode;
			//echo $up.' '.$cmc;
			while($up <> ""){
				if($up==$cmc){
					$sql3=" SELECT * from ".$dbprefix."status where mcode = '$n_sp_code' and month_pv = '".date("Y-m")."' ";
					//echo $sql3.'<br>';
					$rs3 = mysql_query($sql3);
					if(mysql_num_rows($rs3) > 0){
						$chkstatus = mysql_result($rs3,0,"status");
						$sql = "INSERT INTO ".$dbprefix."cnt_spcode1 (mcode,sp_code,lr,pos_cur,status) VALUES";
						$sql .= "('$n_sp_code','$cmc','".$uplr."','$n_sp_pos_cur','$chkstatus') ";
						mysql_query($sql);
					}else{
						$sql = "INSERT INTO ".$dbprefix."cnt_spcode1 (mcode,sp_code,lr,pos_cur,status) VALUES";
						$sql .= "('$n_sp_code','$cmc','".$uplr."','$n_sp_pos_cur','0') ";
						mysql_query($sql);				
					}
					//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
					$up="";
				}else{
					$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
					$rs3 = mysql_query($sql3);
					if($row3 = mysql_fetch_object($rs3)){
						$up = $row3->upa_code;
						$uplr=$row3->lr;
					} else {
						$up = "";
					}
					mysql_free_result($rs3);
				}
			}
		}
		mysql_free_result($rs2);

	}
	mysql_free_result($rs1);
	$ll=0;$rr=0;
	$llx=0;$rrx=0;
	$sql11 = "select count(lr) ll,lr from ".$dbprefix."cnt_spcode1 where sp_code = '$cmc' and status <> '0' and lr = '1' group by lr ";
	$rs11 = mysql_query($sql11);
	if(mysql_num_rows($rs11) > 0)$ll = mysql_result($rs11,0,"ll");
	$sql11 = "select count(lr) ll,lr from ".$dbprefix."cnt_spcode1 where sp_code = '$cmc' and status <> '0' and lr = '2' group by lr ";
	$rs11 = mysql_query($sql11);
	if(mysql_num_rows($rs11) > 0)$rr = mysql_result($rs11,0,"ll");
	$sql11 = "select count(lr) ll,lr from ".$dbprefix."cnt_spcode1 where sp_code = '$cmc' and status = '0' and lr = '1' group by lr ";
	$rs11 = mysql_query($sql11);
	if(mysql_num_rows($rs11) > 0)$llx = mysql_result($rs11,0,"ll");
	$sql11 = "select count(lr) ll,lr from ".$dbprefix."cnt_spcode1 where sp_code = '$cmc' and status = '0' and lr = '2' group by lr ";
	$rs11 = mysql_query($sql11);
	if(mysql_num_rows($rs11) > 0)$rrx = mysql_result($rs11,0,"ll");

	$lll=0;$rrr=0;
	$sql11 = "select count(lr) ll,lr from ".$dbprefix."cnt_spcode2 where sp_code = '$cmc'  and lr = '1' group by lr ";
	$rs11 = mysql_query($sql11);
	if(mysql_num_rows($rs11) > 0)$lll = mysql_result($rs11,0,"ll");
	$sql11 = "select count(lr) ll,lr from ".$dbprefix."cnt_spcode2 where sp_code = '$cmc'  and lr = '2' group by lr ";
	$rs11 = mysql_query($sql11);
	if(mysql_num_rows($rs11) > 0)$rrr = mysql_result($rs11,0,"ll");



	echo $chkshow = '<table  border="3" bordercolor="#00FFFF" width="100%"><tr>
    <td nowrap>&#3592;&#3635;&#3609;&#3623;&#3609;&#3626;&#3617;&#3634;&#3594;&#3636;&#3585;
        &#3607;&#3637;&#3656;&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604; <br>(&#3595;&#3657;&#3634;&#3618;) : <a href="index.php?sessiontab=5&sub=15&lr=1&status=1" target="_blank">'.number_format($people[$cmc]["1"],0,'.',',').'</a>/<a href="index.php?sessiontab=5&sub=15&lr=1&status=0" target="_blank">'.number_format($lll,0,'.',',').'</a>&nbsp;&nbsp;</td>
    <td nowrap>&#3592;&#3635;&#3609;&#3623;&#3609;&#3626;&#3617;&#3634;&#3594;&#3636;&#3585;
        &#3607;&#3637;&#3656;&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604; <br>(&#3586;&#3623;&#3634;) : <a href="index.php?sessiontab=5&sub=15&lr=2&status=1" target="_blank">'.number_format($people[$cmc]["2"],0,'.',',').'</a>/<a href="index.php?sessiontab=5&sub=15&lr=2&status=0" target="_blank">'.number_format($rrr,0,'.',',').'</a>&nbsp;&nbsp;</td>
  </tr><tr>
    <td>&#3592;&#3635;&#3609;&#3623;&#3609;&#3626;&#3617;&#3634;&#3594;&#3636;&#3585;&#3649;&#3609;&#3632;&#3609;&#3635;&#3605;&#3619;&#3591;<br>
        &#3607;&#3637;&#3656;&#3619;&#3657;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604; (&#3595;&#3657;&#3634;&#3618;) : <a href="index.php?sessiontab=5&sub=14&lr=1&status=1" target="_blank">'.$ll.'</a>/'.$llx.'</td>
    <td>&#3592;&#3635;&#3609;&#3623;&#3609;&#3626;&#3617;&#3634;&#3594;&#3636;&#3585;&#3649;&#3609;&#3632;&#3609;&#3635;&#3605;&#3619;&#3591;<br>
        &#3607;&#3637;&#3656;&#3619;&#3657;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604; (&#3586;&#3623;&#3634;) : <a href="index.php?sessiontab=5&sub=14&lr=2&status=1" target="_blank">'.$rr.'</a>/'.$rrx.'</td>
  </tr></table>';
?>


<?
}
//echo 's';
//exit;
?>