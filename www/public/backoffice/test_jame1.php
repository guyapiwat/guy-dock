<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php");?>
<? require_once ("function.php");?>
<?
exit;
set_time_limit (0);
ini_set("memory_limit","100M");
$pos_exp = array('B4'=>5000,'B3'=>3000,'B2'=>1000,'B1'=>500,'MB'=>0 );


	$sql="SELECT mcode,pos_cur FROM ".$dbprefix."member where pos_cur != 'MB'  ";
	$rsx = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rsx);$i++){
		$sqlObjxxx = mysql_fetch_object($rsx);
		$mcode =$sqlObjxxx->mcode;		
		$pos_cur =$sqlObjxxx->pos_cur;
		$check_pv = $pos_exp[$pos_cur];
		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode'  and cancel=0 group by mcode ";
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		mysql_free_result($rs);

		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode."' and sa_type='A'   and cancel=0 group by mcode ";
		$rs = mysql_query($sql);
		$mexph = 0;
		if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
		mysql_free_result($rs);

		$sql = "select mcode, SUM(tot_pv) AS pv from ".$dbprefix."special_point WHERE  sa_type='VA' AND mcode='".$mcode."' group by mcode ";
		$rs = mysql_query($sql);
		$mexpv = 0;
		if(mysql_num_rows($rs)>0) $mexpv = mysql_result($rs,0,'pv');
			$mexp=($mexp+$mexph+$mexpv);


		if($check_pv > $mexp){
			$addpv = $check_pv-$mexp;
			echo $mcode.' : '.$addpv.'<br>';
		//	mysql_query("insert into ali_special_point(mcode,sa_type,tot_pv,uid,sadate) values('$mcode','VA','$addpv','1','2015-12-01')");
		}
		
	}



 exit;
$scode = '';
echo isLine($dbprefix,$scode,$testcode);
exit;

 function isLine($dbprefix,$scode,$testcode){
	$sql = "SELECT upa_code FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
	$rs = mysql_query($sql);
	if($scode==$testcode)
		return true;
	if(mysql_num_rows($rs)<=0)
		return false;
	else if(mysql_result($rs,0,'upa_code')!=$testcode)
		return isLine($dbprefix,mysql_result($rs,0,'upa_code'),$testcode);
	else
		return true;
}


		//========================เก็บลายระเอียดสมาชิกทุกคน=======================================
		$sql="SELECT mcode,upa_code,sp_code FROM ".$dbprefix."member order by id desc  ";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode[$i] =$sqlObj->mcode;		
			//$name_t[$mcode[$i]] =$sqlObj->name_t;		
			//$upa_code[$mcode[$i]] = $sqlObj->upa_code;
			$upa_code[$mcode[$i]] = $sqlObj->sp_code;
			//$mo[$mcode[$i]] = $sqlObj->mo;
			//$stockist[$mcode[$i]] = $sqlObj->stockist;
			//echo $mcode[$i]."=mcode[$i]<br>";
		}//for($i=0;$i<mysql_num_rows($r
		
		
		$sql="SELECT m.mcode,m.upa_code,m.sp_code FROM ".$dbprefix."checkdownline as down left join ".$dbprefix."member as m on (m.mcode = down.mcode)   ";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$xmcode[$i] =$sqlObj->mcode;		
		}
		$checksp  = '0099999';
		//========================จบเก็บลายระเอียดสมาชิกทุกคน====================================
		for($j=0;$j<1000;$j++){
		//	if($mcode[$j] == '0002199'){
				$smc = $xmcode[$j];
				$upa = trim($upa_code[$xmcode[$j]]);
				
				//$tran = trim($upa_code[$upa_code[$mcode[$j]]]);
				$level =0;
				echo $smc.'=smc<br>';
				echo $j.'=j<br>';
				$chksss = false;
				while($upa != ''){
					if($upa == $checksp)$chksss = true;
					
					$tran = trim($upa_code[$upa]);
					echo $level.'=level<br>';
					echo $upa.'=spcode<br>';
					if($level>200)
						exit;
					$level++;	
					$upa = $tran;
				}

				/*if($chk == true)mysql_query("update ".$dbprefix."checkdownline set stype = '1' where mcode = '".$xmcode[$j]."' ");
				else mysql_query("update ".$dbprefix."checkdownline set stype = '0' where mcode = '".$xmcode[$j]."' ");*/
				if( !empty($xmcode[$j])){
					if($chksss == false){
						//$sqlupdate ="update ".$dbprefix."member set sp_code = '' where mcode = '".$xmcode[$j]."' and mcode <> '$checksp' ";
						//echo $sqlupdate.'<br>';
						//mysql_query($sqlupdate);
						mysql_query("update ".$dbprefix."checkdownline set stype = '0' where mcode = '".$xmcode[$j]."' ");
					}else{
						mysql_query("update ".$dbprefix."checkdownline set stype = '1' where mcode = '".$xmcode[$j]."' ");

					}
				}
				
				
				
				//while($upa != ''){
			//}//for($j=0;$j<mysql_num_rows($rs);$j++){
		}
		mysql_free_result($rs);
?>