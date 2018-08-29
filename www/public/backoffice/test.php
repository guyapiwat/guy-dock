<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>
<? include("logtext.php")?>
<?
/* $member = query("mt.mcode,m.pos_cur","member_terminate mt LEFT JOIN ali_member m ON (m.mcode=mt.mcode)","1=1");
foreach($member as $key => $val){
	logtext(true,"System","ปรับตำแหน่ง รหัสสมาชิก : ".$val['mcode']." จาก  ".$val['pos_cur']." เป็น TN",$val['mcode']);
}
 */
 
// $calc_pos = query("*","ali_calc_poschange","type=2 and date_update='2018-05-25' ORDER BY id DESC");
// foreach($calc_pos as $key => $val){
	// $update = array(
		// "pos_cur"	=>	$val['pos_before']
	// );
	// update("ali_member",$update,"mcode = '".$val['mcode']."'");
// }
// del("ali_calc_poschange","type=2 and date_update='2018-05-25'");

// $calc_pos = query("*","ali_calc_poschange","type=1 and date_update='2018-05-25' ORDER BY id DESC");
// $member = query("mcode,pos_cur","ali_member","1=1");
// foreach($member as $key => $val){
	// $memb_pos[$val['mcode']] = $val['pos_cur'];
// }
// foreach($calc_pos as $key => $val){
	// if($val['pos_after'] == $memb_pos[$val['mcode']]){
		// echo "<PRE>";print_r($val);echo "</PRE>";
		// //del("ali_calc_poschange","id='".$val['id']."'");
	// }
	
// }
?>