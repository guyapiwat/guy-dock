<?
	session_start();
 	include("prefix.php");
    require ('checklogin.php');
	include("connectmysql.php");
 ?>
 <link href="./../style.css" rel="stylesheet" type="text/css">
<?
if (isset($_SESSION["usercode"])){
	$mcode = $_SESSION["usercode"];
	require 'header.php';
?>
<?
set_time_limit(0);
/*if ($showrep==''){
	show_rep_dialogbox();
}
else{*/
	//��Ǩ�ͺ�����١��ͧ  
	$oktoshow=true;
	if ($mcode=="") {
		//require 'header.php';
		$errormsg.="��س���͡�Թ<br>";
		$oktoshow=false;
	}

	// �ҡ���������١��ͧ ����ʴ�
	if(! $oktoshow){
		echo "<font color=red>$errormsg</font>";
		echo "<br>";
		echo "<a href=\"".$prefix."index.php\">�˹�� ��͡�Թ</a>";
		exit;
	}
	
	for ($i=strlen($mcode);$i<7;$i++) {$mcode="0".$mcode;}
	//�Ң����������§ҹ
	$sql = " SELECT mcode,name_t,posid FROM ".$dbprefix."member WHERE mcode='$mcode' ";
	$dbquery = mysql_query($sql);
	//echo "--->  ".$sql;
	$result = mysql_fetch_array($dbquery);
	$name_t = $result['name_t'];
	?>
<?	
//for ($i=strlen($cmc);$i<7;$i++){$cmc="0".$cmc;}
$n_mcode[1]="";
$result=mysql_query("select * from ".$dbprefix."member where mcode='".$mcode."' ");
if (mysql_num_rows($result)>0) {
	$row = mysql_fetch_object($result);
}
mysql_free_result($result);

// ��ҹ������
	

?>	<html>
	<head>
	<meta http-equiv='Content-Type' content='text/html; charset=windows-874'>
	<meta http-equiv='Content-Language' content='th'>
	<title>��§ҹ �����ŷ���ҹ �ù���� ���Ъ��</title>
	</head>
	<body>

	<div align='center'>
	  <p><font size='+1'><B> �����ż���й� ���Ъ�鹢ͧ<br>
      ���� 
      <?=$row->mcode?> 
      <?=$row->name_t?> 
      ���˹� 
      <?=$row->pos_cur?>
	  </B></font></p>
	</div>
	<br>
	<center>
	<table width='90%'>
	<tr align="right">
	<td bgcolor='#FFFFFF'>
	������ѹ���
	  <?=date("Y-m-d h:i:s")?>
	  <?
	if(isset($_GET['lv'])) $lv=$_GET['lv'];
	else $lv=1;
	?>
</td></tr><tr><td>
	<table width='100%'>
	<tr>
	<td  bgcolor='#999999' align="center" colspan="6"><strong>����ҹ����ӴѺ����й�</strong></td>
	</tr>
	<?
		$team_def = array("����ҹ����١","����ҹ�����ҹ","����ҹ�����Ź");
	?>
	<tr>
	<td colspan="6" bgcolor="DDDDDD">
[<a href="<?=$PHP_SELF?>?lv=1"><?=$team_def[0]?></a>]
	[<a href="<?=$PHP_SELF?>?lv=2"><?=$team_def[1]?></a>]
	[<a href="<?=$PHP_SELF?>?lv=3"><?=$team_def[2]?></a>]
	<br>������<?=$team_def[$lv-1]?> :
	</tr>

	<tr align="center" bgcolor="DEDEDE">
		<td width="12%">�ӴѺ���</td>
		<td width="13%">�ѹ�����Ѥ�</td>
		<td width="18%">������Ҫԡ</td>
		<td width="42%">����-���ʡ�� </td>
	    <td width="15%">���˹�</td>
	</tr>
	<?
	$k=0;
	$stk[$k] = $mcode;
	$stklv[$k] = 0;
	$pos_desc = array('P'=>"P Platinum", 'S'=>"S Silver", 'A'=>"A Agent", 'G'=>"G Gold", ''=>"����յ��˹�");
		//for($i=0;$i<$lim;$i++){
	//$i=0;
	$ind = 0;
	$bgcolor = array("#FFFFFF","#EDEDED");
	while($stklv[$k]<$lv){
		if($stk[$k]==''){break;}
		$rs = mysql_query("SELECT * FROM ".$dbprefix."member WHERE sp_code='$stk[$k]' ORDER BY lr DESC");
		if($stklv[$k]<$lv-1){
			for($j=0;$j<mysql_num_rows($rs);$j++){
	 			$stk[sizeof($stk)] = mysql_result($rs,$j,'mcode');
				$stklv[sizeof($stklv)] = $stklv[$k]+1;
			}
			$k++;
		 	continue;
		}
		for($j=0;$j<mysql_num_rows($rs);$j++){
			//if(mysql_num_rows($rs)>$j){
	?>
	<tr align="center" bgcolor='<?=$bgcolor[$ind%2]?>'>
		<td width="12%"><?=(++$ind)?></td>
		<!--td width="12%"></td-->
		<td width="13%"><?=mysql_result($rs,$j,'mdate')?></td>
		<td width="18%"><?=mysql_result($rs,$j,'mcode')?></td>
		<td width="42%" align="left">&nbsp;<?=mysql_result($rs,$j,'name_t')?></td>
	    <td width="15%"><?=$pos_desc[mysql_result($rs,$j,'pos_cur')]?></td>
	</tr>
	<?
			//}	 		
	 		$stk[sizeof($stk)] = $j<mysql_num_rows($rs)?mysql_result($rs,$j,'mcode'):"";
			$stklv[sizeof($stklv)] = $stklv[$k]+1;
		}
		$k++;
		//echo "<tr><td colspan=5> $k ".sizeof($stk)."</td></tr>";
	}?>
	</table>
	</td>
	</tr>
	</table>
</center>	<? 
echo "<br><br><br>";
include "footer.php";
?></body>
	</html>
	<?
}  ?>
