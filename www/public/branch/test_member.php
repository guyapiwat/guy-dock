<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php");?>
<?
set_time_limit (0);
ini_set("memory_limit","100M");
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
		for($j=135000;$j<141313;$j++){
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
				if($level>1000)
					exit;
				$level++;	
				$upa = $tran;
			}//while($upa != ''){
		}//for($j=0;$j<mysql_num_rows($rs);$j++){
		mysql_free_result($rs);
?>