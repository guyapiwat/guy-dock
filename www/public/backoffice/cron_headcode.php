<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php");?>
<?
set_time_limit (0);
ini_set("memory_limit","100M");

	$array_mpos = array(''=>"0",'MB'=>"1",'SU'=>"2",'EX'=>"3",'BR'=>"4",'SI'=>"5",'GO'=>"6",'PL'=>"7",'PE'=>"8"
	,'RU'=>"9",'SA'=>"10",'EM'=>"11",'DI'=>"12",'BD'=>"13",'BL'=>"14"
	,'CD'=>"15",'ID'=>"16",'PD'=>"17",'RD'=>"18");



		//========================เก็บลายระเอียดสมาชิกทุกคน=======================================
		$sql="SELECT sp_code,pos_cur4,mcode FROM ".$dbprefix."member order by id desc ";
		$rs = mysql_query($sql);
		$countm = mysql_num_rows($rs);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode[$i] =$sqlObj->mcode;		
			$upa_code[$mcode[$i]] = $sqlObj->sp_code;
			$pos_cur4[$mcode[$i]] = $sqlObj->pos_cur4;
		}//for($i=0;$i<mysql_num_rows($rs);$i++){
		//========================จบเก็บลายระเอียดสมาชิกทุกคน====================================
		for($j=1;$j<$countm;$j++){
			$smc = $mcode[$j];
			$upa = trim($upa_code[$mcode[$j]]);
			//$tran = trim($upa_code[$upa_code[$mcode[$j]]]);
			$level =0;
			//echo $smc.'=smc<br>';
			//echo $j.'=j<br>';
			while($upa != ''){

				if($array_mpos[$pos_cur4[$upa]] >= 9){
					$sqlupdate = "update ali_member set head_code = '$upa' where mcode = '".$mcode[$j]."'";
					echo $mcode[$j].' Head Code --->'.$upa.'<br>';
					mysql_query($sqlupdate);
					$upa = '';
				}else{
					$tran = trim($upa_code[$upa]);
					$upa = $tran;
				}
			//	echo $level.'=level<br>';
			//	echo $upa.'=spcode<br>';
				//if($level>1000)
				//	exit;
				$level++;	
				
			}//while($upa != ''){
		}//for($j=0;$j<mysql_num_rows($rs);$j++){
		mysql_free_result($rs);
?>
