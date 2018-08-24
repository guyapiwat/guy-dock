<?
	$point = new point_member;
	$date_now = date('Y-m-d');
	$data = get_detail_meber($cmc,$date_now);
	if($_SESSION["wording"] == "EN"){
		$month_1 = $montharry_EN[date("m", strtotime("first day of +0 month"))];
		$month_2 = $montharry_EN[date("m", strtotime("first day of +1 month"))];
		$month_3 = $montharry_EN[date("m", strtotime("first day of +2 month"))];
		$maintain_1 = "Maintain";
		$maintain_2 = getStatus($cmc,$data['pos_cur'],0);
		$autoship_1 = "Autoship Month";
		$completely = "completely";
		$incomplete = "Incomplete";
		
	}
	else{
		$month_1 = $montharry[date("m", strtotime("first day of +0 month"))];
		$month_2 = $montharry[date("m", strtotime("first day of +1 month"))];
		$month_3 = $montharry[date("m", strtotime("first day of +2 month"))];
		$maintain_1 = "รักษายอดแล้ว";
		$maintain_2 = getStatus($cmc,$data['pos_cur'],0);
		$autoship_1 = "Autoship เดือน";
		$completely = "ครบถ้วน";
		$incomplete = "ค้างส่งเอกสาร";
	}
     
	$status=Status_all($cmc,$data['pos_cur'],'0');
	$status1=Status_all($cmc,$data['pos_cur'],'1'); 
	
	if($data['pos_cur'] == 'PL'){
		$sevenDay  = date("Y-m-d",strtotime($data['pos_cur_date']." +7 days"));
		$thirtyDay = date("Y-m-d",strtotime($data['pos_cur_date']." +30 days"));
		$sixtyDay  = date("Y-m-d",strtotime($data['pos_cur_date']." +60 days"));
		$ninetyDay = date("Y-m-d",strtotime($data['pos_cur_date']." +90 days"));
	}
	
//	$m90days = m90_dash_board($cmc,$sevenDay);
	$success_x = 'สำเร็จ';
	$none_success_x = 'ไม่สำเร็จ';
	$time_out_x = 'หมดเวลา';

?>
<table width="100%" height="" style="border:1px solid;">
	<tr style="background-color:#92D050" >
		<td colspan = '3' ><B>ข้อมูลส่วนตัว</B></td>
	</tr>
	<tr>
		<td width="45%"><?=$wording_lan["mcode"];?></td>
        <td width="55%"><?echo $data['mcode'];?>(
            <?if($data['name_b']!=""){echo $data['name_b'];}else{echo $data['name_t'];}?>
          )</td>
        <td width="55%" rowspan="10" valign="top"><table align="center"><tr>
    <td height="99" align="center" valign="top">
    <a href="index.php?sessiontab=1&sub=7">
    <img src="images/member.gif" width="100" height="100" border="0" alt="<?=$wording_lan["tab1_1"]?>"></a><br><?=$wording_lan["tab1_1"]?></td>
    <td></td>
    <td align="center" valign="top">
	<a href="./index.php?sessiontab=1&sub=2"><img src="images/Changepassword.jpg" width="100" height="100" border=0 alt="<?=$wording_lan["tab1_2"]?>">    </a><br><?=$wording_lan["tab1_2"]?><br><br></td>
    </tr>
	<tr ><td colspan="3"><div class="manual"><a class="myButton" href="doc/doc_member.pdf"  target="_blank"><?=$wording_lan["manual"];?></a></div></td></tr>
	</table></td>
	</tr>
	<tr>
		<td><?=$wording_lan["tab3_4"];?></td>
        <td><?echo $data['mdate'];?></td>
    </tr>
	<tr>
		<td><font color='red'>วันหมดอายุสะสมอัพเกรด 30 วัน</font></td>
        <td><? if($data['exp_pos'] != '0000-00-00'){echo $data['exp_pos'];}else{} ?></td>
    </tr>
	<tr>
		<td>ระดับการสมัคร</td>
        <td>Member (
            <?=$data['mdate'];?>
          )</td>
    </tr>
	<tr>
		<td>ตำแหน่งสูงสุด (Higest Pin)</td>
        <td><? if(!empty($data['pos_cur3'])){echo getNameHorno($data['pos_cur3']);echo " (".$data['pos_cur3_date'].")";} ?></td>
    </tr>
	<tr>
		<td>ตำแหน่งเดือนนี้ (Paid as Pin)</td>
        <td></td>
    </tr>
	<tr>
		<td>ตำแหน่งรับโบนัส (เดือนที่แล้ว)</td>
        <td></td>
    </tr>
	<tr>
		<td>PV ส่วนตัวเดือนนี้</td>
        <td><? echo $point->get_allPointThisMonth($dbprefix,$cmc,'0')." PV"; ?></td>
    </tr>
	<tr>
		<td>PV ส่วนตัวเดือนที่แล้ว</td>
        <td><? echo $point->get_allPointThisMonth($dbprefix,$cmc,'-1')." PV"; ?></td>
    </tr>
	<tr>
		<td>DTB(%)</td>
        <td><?
				if(date("Y-m-d") < date("Y-m-d",strtotime("first day of {$data['exp_pos_60']} +60 days")) and $data['pos_cur'] == 'PL'){
					echo "20%";
				}
				else if($data['pos_cur'] == 'SI' or $data['pos_cur'] == 'MB' or $pos_piority1[$data['pos_cur1']] < 2){
					echo "10%";
				}
				else if($pos_piority1[$data['pos_cur1']] > 3){
					echo "20%";
				}
				else if($pos_piority1[$data['pos_cur1']] > 1 or $data['pos_cur'] == 'PL'){
					echo "15%";
				}
				else{
					echo "10%";
				}
			?>        </td>
    </tr>
	<tr style="background-color:#92D050" >
		<td colspan = '3' ><B>Document</B></td>
	</tr>
	<tr>
      <td ><?=$wording_lan["tab2_1_13"];?></td>
      <td colspan="2"><?php echo $data['cmp3']==""?"<font color='#FF0000' class='blink' >".$incomplete."</font>":"<font color='#66FF00'>".$completely."</font>  ( ".$data["bmdate3"]." )"?></td>
    </tr>
    <tr>
      <td><?=$wording_lan["tab2_1_14"];?></td>
      <td colspan="2"><?php echo $data['cmp']==""?"<font color='#FF0000' class='blink' >".$incomplete."</font>":"<font color='#66FF00'>".$completely."</font> ( ".$data["bmdate1"]." )"?></td>
    </tr>
    <tr>
      <td><?=$wording_lan["tab2_1_15"];?></td>
      <td colspan="2"><?php echo $data['cmp2']==""?"<font color='#FF0000' class='blink' >".$incomplete."</font>":"<font color='#66FF00'>".$completely."</font> ( ".$data["bmdate2"]." )"?></td>
    </tr>
	<tr style="background-color:#92D050" >
		<td colspan = '3' ><B>90M (2+2)</B></td>
	</tr>
	<tr>
		<td>Step I (1/1)</td>
        <td colspan="2"><?
				echo (int)$m90days[0][1]."/".(int)$m90days[1][1]." ";
				echo "(".$sevenDay.")";
				$days7 = checkDateDiff($date_now,$sevenDay);
				if($days7 >= 0){
					echo " &#3648;&#3627;&#3621;&#3639;&#3629; ".$days7." &#3623;&#3633;&#3609; ";
				}
				else{
					echo " ".$time_out_x." ";
				}
				if($m90days[0][1] >= 1){echo $success_x;}else{echo $none_success_x;}
				echo "/";
				if($m90days[1][1] >= 1){echo $success_x;}else{echo $none_success_x;}
			?>        </td>
    </tr>
	<tr>
		<td>Step II (*/*)</td>
        <td colspan="2" nowrap><?
				echo (int)$m90days[0][2]."/".(int)$m90days[1][2]." ";
				echo "(".$sevenDay.")";
				$days7 = checkDateDiff($date_now,$sevenDay);
				if($days7 >= 0){
					echo " &#3648;&#3627;&#3621;&#3639;&#3629; ".$days7." &#3623;&#3633;&#3609; ";
				}
				else{
					echo " ".$time_out_x." ";
				}
				if($m90days[0][2] >= 4){echo $success_x;}else{echo $none_success_x;}
				echo "/";
				if($m90days[1][2] >= 4){echo $success_x;}else{echo $none_success_x;}
			?>        </td>
    </tr>
	<tr>
		<td>Step III (3*/3*)</td>
        <td colspan="2" nowrap><?
				echo (int)$m90days[0][3]."/".(int)$m90days[1][3]." ";
				echo "(".$sevenDay.")";
				$days7 = checkDateDiff($date_now,$sevenDay);
				if($days7 >= 0){
					echo " &#3648;&#3627;&#3621;&#3639;&#3629; ".$days7." &#3623;&#3633;&#3609; ";
				}
				else{
					echo " ".$time_out_x." ";
				}
				if($m90days[0][3] >= 8){echo $success_x;}else{echo $none_success_x;}
				echo "/";
				if($m90days[1][3] >= 8){echo $success_x;}else{echo $none_success_x;}
			?>        </td>
    </tr>
</table>
 
<?

function getNameHorno($pos_cur){
	$sql = "SELECT *  FROM ali_position WHERE posshort LIKE '".$pos_cur."'";
	$rs  = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		$object = mysql_fetch_object($rs);
		$name = $object->posname;
	}
	else{
		$name = '';
	}
	return $name;
}
 
 
 
 
?>