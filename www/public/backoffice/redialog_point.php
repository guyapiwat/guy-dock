<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingPlanA" style="background-color:#3399ff;padding:4px;">
			<h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#planA" aria-expanded="false" aria-controls="planA">
					<font size='3' style='font-weight:bold' >ข้อมูลคะแนน</font>
				</a>
			</h4>
		</div>
		<div id="planA" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPlanA">
			<div class="panel-body">
<?
	$point = new point_member;
	$bmbonus = $point->get_bmbonus($dbprefix,$cmc);
	$bmbonusx = $point->get_bmbonus_thismonth($dbprefix,$cmc);
	$pos_cur = $point->position($dbprefix,'calc_poschange','pos_cur',$cmc);
	$pos_cur2 = $point->position($dbprefix,'calc_poschange2','pos_cur2',$cmc);
	$da = get_detail_meber($cmc);
	$mtype1 = $arr_mtype1[$da["mtype"]];
 
		$weak_month=	$bmbonusx['balance'];
 
?>
  
<table width="100%"  >
  <tr align="left">
    <td >PV สะสมส่วนตัว</td>
	<?php if($member_main == 1){?>
	  <td colspan="2"><a href='./index.php?sessiontab=4&sub=38&cmc=<?php echo $cmc;?>' target = '_bank' ><?php echo number_format($point->get_allPoint($dbprefix,$cmc),0,'',',')?></td>
	<? } else {?>
	    <td colspan="2"><a href='./index.php?sessiontab=3&sub=38&cmc=<?php echo $cmc;?>' target = '_bank'><?php echo number_format($point->get_allPoint($dbprefix,$cmc),0,'',',')?></td>
	<? } ?>
  </tr>
  <tr align="left">
	<td>PV สะสมส่วนตัว(ภายในเดือน)</td> 
	<?php if($member_main == 1){?>
	  <td colspan="2"><?php echo number_format($point->get_allPointThisMonth($dbprefix,$cmc),0,'',',')?></td>
	<? } else {?>
	    <td colspan="2"><?php echo number_format($point->get_allPointThisMonth($dbprefix,$cmc),0,'',',')?></td>
	<? } ?>
  </tr>
	<tr align="left">
		 <td>คะแนนขาอ่อน(ภายในเดือน)</td> 
	     <td colspan="3"><?=number_format($weak_month,0,'',',')?></td>
   </tr>
	<tr align="left">
		 <td>HPV</td> 
	     <td colspan="3"><?=number_format($da['hpv'],0,'',',')?></td>
   </tr>

  <tr align="center">
    <td width="100">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="100">&nbsp;</td> 
 
  </tr>
<tr align="center">
    <td width="100" bgcolor="#99ccff">&nbsp;</td>
    <td width="100" bgcolor="#99ccff">ซ้าย</td>
    <td width="100" bgcolor="#99ccff">ขวา</td> 
 
  </tr>

  <tr align="right">
		<td bgcolor="#99ccff">เก่า</td>
		<td><?php echo number_format($bmbonus['pcarry'][1],0,'.',',');?></td> 
		<td><?php echo number_format($bmbonus['pcarry'][2],0,'.',',');?></td> 
		
   </tr>
  <tr align="right">
		<td bgcolor="#99ccff">ใหม่</td>
		<td>
			<div id="hover"><u><?echo number_format($point->get_newPoint($dbprefix,$cmc,1),0,'.',',');?></u></div>
			<div id="show"><?=$point->get_newPoint_show($dbprefix,$cmc,1);?></div>
		</td>

		<td>
			<div id="hover"><u><?echo number_format($point->get_newPoint($dbprefix,$cmc,2),0,'.',',');?></u></div>
			<div id="show"><?=$point->get_newPoint_show($dbprefix,$cmc,2);?></div>

 		</td>	
	
  </tr>
  <tr align="right">
		<td bgcolor="#99ccff">รวม</td>
		<td><?php echo number_format($bmbonus['pcarry'][1]+$point->get_newPoint($dbprefix,$cmc,1),0,'.',',');?></td> 
		<td><?php echo number_format($bmbonus['pcarry'][2]+$point->get_newPoint($dbprefix,$cmc,2),0,'.',',');?></td> 
		
    </tr>
   <tr style='display:none' align="right">
		<td bgcolor="#99ccff">สะสม</td>
		<td><?php echo number_format($bmbonus['sum_pv'][1]+$point->get_newPoint($dbprefix,$cmc,1),0,'.',',');?></td> 
		<td><?php echo number_format($bmbonus['sum_pv'][2]+$point->get_newPoint($dbprefix,$cmc,2),0,'.',',');?></td> 
		

   </tr>
     <tr align="left">
		 <td>&nbsp;</td>
	     <td colspan="3">&nbsp;</td>
   </tr>
	<tr align="left">
		 <td>ประเภทสมาชิก</td> 
	     <td colspan="3">								
		 <?php 
			if($data['mtype'] == 0){
				echo "Member";
			}else if($data['mtype'] == 1){
				echo "Franchise";
			}else{
				echo "Agency";
			}
		?> &nbsp;
</td>
   </tr>

     <tr align="left">
		 <td>ตำแหน่ง</td>
	     <td colspan="3"><?php echo $pos_cur['pos_cur']; ?>&nbsp;<? if($pos_cur['date']!=""){echo '('.$pos_cur['date'].')';}else{echo '('.date('Y-m-d',strtotime($data['mdate'])).')';}?></td>

   </tr>
     <tr align="left">
		 <td>เกียรติยศ</td>
	     <td colspan="3"><?php echo $pos_cur2['pos_cur'];?>&nbsp;<?  if($pos_cur2['date'] != '')echo '('.$pos_cur2['date'].')' ;?> </td>
   <tr height="0px">
   		 <td>&nbsp;</td>
	     <td colspan="3">&nbsp;</td>
   </tr>
   </table>

		</div>
	</div>
</div>


<style>
#show {
    font-size: 14px;
	box-shadow: 3px 3px 4px #CCC;
    opacity: 0.0;
	-webkit-transition: all 255ms ease-in-out;
	-moz-transition: all 255ms ease-in-out;
	-ms-transition: all 255ms ease-in-out;
	-o-transition: all 500ms ease-in-out;
	position: absolute;
	transition: all 255ms ease-in-out;
	margin-top: -2px;
	margin-left: 10px;
}
#hover {
    width:80px;
	cursor: pointer;
 }
#hover:hover + #show {
    opacity: 1.0;
	border: 1px solid #CCC;
	padding: 5px;
 	background-color: #F7F7F7;
}
#hover:hover  {
    color:red;
 }
</style>			</div>



