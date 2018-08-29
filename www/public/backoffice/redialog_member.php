<?
	$date_now = date('Y-m-d');
	$date_now1 = date('Y-m');
	$data = get_detail_meber($cmc,$date_now);

	//var_dump($montharry);
	$month_1 = $montharry[date("m", strtotime("first day of +0 month"))];
	$month_2 = $montharry[date("m", strtotime("first day of -1 month"))];
	$completely = "ครบถ้วน";
	$incomplete = "ค้างส่งเอกสาร";

	$status1=check_status($cmc,$data['pos_cur'],date("Y-m-d", strtotime("first day of -1 month")));
	$status=check_status($cmc,$data['pos_cur'],date('Y-m-d'));


	//if($status['status'] == '1')$status['status'] = "<font color=#31B404><b>รักษายอดแล้ว</b></font>";
	//else $status['status'] ="<font color=#c00000><b>(ยังไม่รักษายอด)</b></font>";
	//if($status1['status'] == '1')$status1['status'] = "<font color=#31B404><b>รักษายอดแล้ว</b></font>";
	//else $status['status1'] ="<font color=#c00000><b>(ยังไม่รักษายอด)</b></font>";
  
	//$status=Status_all($cmc,$data['pos_cur'],'0');
	//$status1=Status_all($cmc,$data['pos_cur'],'1'); 
	
	$_crate = 1.00;
	
	$success_x = 'สำเร็จ';
	$none_success_x = 'ไม่สำเร็จ';
	$time_out_x = 'หมดเวลา';
	$month = '-1';
	$month1 = '0';
	
	
?>

	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="profile" style="background-color:#3399ff;padding:4px;">
			<h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#profileMember" aria-expanded="false" aria-controls="profileMember">
					<font size='3' style='font-weight:bold' >ข้อมูลส่วนตัว</font>
				</a>
			</h4>
		</div>
		<div id="profileMember" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="profile">
			<div class="panel-body">
<table width="100%" ">
     <tr align="left">
        <td colspan="2" ><?=$wording_lan["mcode"];?></td>
        <td colspan="2"> <?php echo $data['mcode'];?>(<?php if($data['name_b']!=""){echo $data['name_b'];}else{echo $data['name_t'];}?>)</td>
     </tr>  
      <tr align="left">
        <td colspan="2" ><?=$wording_lan["tab3_4"];?></td>
        <td colspan="2"> <?php echo $data['mdate'];?></td>
     </tr>   
    <tr  >
      <td colspan="2" >รักษายอด (<?=$month_2?>)</td>
      <td colspan="2" ><?=$status1['tot_pv']?></td>
	 </tr>
    <tr  >
      <td colspan="2" >รักษายอด (<?=$month_1?>)</td>
      <td colspan="2" ><?=$status['tot_pv']?></td>
	 </tr>
    <tr>
      <td colspan="2" ><?=$wording_lan["tab3_6"];?></td>
      <td colspan="2" ><?php echo  $data['sp_code'];?>(<?php echo  $data['sp_name'];?>)</td>
    </tr>
     <tr>
      <td colspan="2" ><?=$wording_lan["tab3_5"];?></td>
      <td colspan="2" ><?php echo  $data['upa_code'];?>(<?php echo  $data['upa_name'];?>)</td>
    </tr>  
     <tr>
      <td colspan="2"    height="25px"></td>
      <td colspan="2" ></td>
    </tr>  
  
</table>
				 
		</div>
	
		<div class="panel-heading" role="tab" id="document" style="background-color:#3399ff;padding:4px;">
			<h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#documentMember" aria-expanded="false" aria-controls="documentMember">
					<font size='3' style='font-weight:bold' >ข้อมูลเอกสาร</font>
				</a>
			</h4>
		</div>
		<div id="documentMember" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="document">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6"><?=$wording_lan["tab2_1_13"];?></div>
					<div class="col-sm-6">
						<?php echo $data['cmp3']==""?"<font color='#FF0000' class='blink' >".$incomplete."</font>":"<font color='#66FF00'>".$completely."</font>  ( ".$data["bmdate3"]." )"?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6"><?=$wording_lan["tab2_1_14"];?></div>
					<div class="col-sm-6">
						<?php echo $data['cmp']==""?"<font color='#FF0000' class='blink' >".$incomplete."</font>":"<font color='#66FF00'>".$completely."</font> ( ".$data["bmdate1"]." )"?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6"><?=$wording_lan["tab2_1_15"];?></div>
					<div class="col-sm-6">
						<?php echo $data['cmp2']==""?"<font color='#FF0000' class='blink' >".$incomplete."</font>":"<font color='#66FF00'>".$completely."</font> ( ".$data["bmdate2"]." )"?>
					</div>
				
				</div>
				
				</div>

			</div>
		</div>
		 
	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
	 .table-condensed>thead>tr>th, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>tbody>tr>td, .table-condensed>tfoot>tr>td{
		padding: 1px;
	}
	</style>	

<?
function rowDetall($sql)
{
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	return $row;
} 
 
?>

