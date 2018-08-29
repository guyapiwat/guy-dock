<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php");?>
<?
exit;
set_time_limit (0);
ini_set("memory_limit","1000M");
//========================เก็บลายระเอียดสมาชิกทุกคน=======================================
$sql="SELECT mcode,sp_code FROM ".$dbprefix."member order by id desc ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$mcode[$i] =$sqlObj->mcode;		
	$upa_code[$mcode[$i]] = $sqlObj->sp_code;
}//for($i=0;$i<mysql_num_rows($rs);$i++){
//========================จบเก็บลายระเอียดสมาชิกทุกคน====================================
for($j=0;$j<20000;$j++){
	$smc = $mcode[$j];
	$upa = trim($upa_code[$mcode[$j]]);
	$level =0;
	echo $smc.'=smc<br>';
	echo $j.'=j<br>';
	while($upa != ''){
		$tran = trim($upa_code[$upa]);
		echo $level.'=level<br>';
		echo $upa.'=spcode<br>';
		if($level>500)
			exit;
		$level++;	
		$upa = $tran;
	}//while($upa != ''){
}//for($j=0;$j<mysql_num_rows($rs);$j++){
mysql_free_result($rs);
?>