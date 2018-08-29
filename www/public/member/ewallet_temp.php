<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<? include_once('date_time_drop.php');?>

<script>
	function readURL(input) {
	  if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
		  $('#imgShow').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	  }
	}
	
	$(document).ready(function(){
		$("#imgPay").change(function() {
			if(this.files[0].size <= 200000){
				readURL(this);
			}
			else{
				alert("ไฟล์ต้องขนาดไม่ได้ 200KB");
				$('#imgShow').attr('src', '');
			}
		});
	});
	
</script>
<?
session_start();
include("../function/function_pos.php");
$paymem_option =query("*",'ali_payment_type py ',"py.inv_code = 'ONLINE' and py.payment_id = '0' and py.shows ='1' ");
?>
<div class="container">
  <div class="jumbotron">
    <h3>รายละเอียดการเติมเงิน</h3>
	  <form class="form-horizontal" action="ewallet_temp_operate.php" method="post" enctype="multipart/form-data">	
		<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label" for="mcode">รหัสสมาชิก</label>
			<div class="col-sm-3">
			  <input class="form-control" type="text" name="mcode" id="mcode" placeholder="รหัสสมาชิก" readonly value="<?=$_SESSION["usercode"]?>" >
			</div>
		</div>
		<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label" for="sadate">บัญชีธนาคาร</label>
			<div class="col-sm-3">
			  <select class="form-control" name="payType" id="payType">
			    <option value="">กรุณาเลือกรูปแบบการชำระ</option> 
				<?php foreach($paymem_option as $keyx => $valx){?>
					<option value="<?=$valx['id']?>"><?=$valx['pay_desc']?></option>  
				<?}?>
			  </select>
			</div>
		</div>
		<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label" for="sadate">โอน วัน/เดือน/ปี</label>
			<div class="col-sm-3">
			  <input type="text" name="sadate" id="sadate" class="form-control date" style="width:100px;">
			</div>
		</div>
		<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label" for="sctime">โอน เวลา</label>
			<div class="col-sm-3">
			  <input type="text" name="sctime" id="sctime" class="form-control time" style="width:100px;">
			</div>
		</div>
		<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label" for="total">จำนวนเงิน</label>
			<div class="col-sm-3">
			  <input class="form-control" type="number" name="total" id="total">
			</div>
		</div>
		<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label" for="imgPay">รูปภาพ<br><font color=red>(.gif .jpeg .png)</font></label>
			<div class="col-sm-3">
			  <input type="file" name="imgPay" name="imgPay" id="imgPay" accept="image/gif, image/jpeg, image/png">
			</div>
		</div>
		<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-3">
			  <img src="" alt="..." class="img-rounded col-sm-8" name="imgShow" id="imgShow">
			</div>
		</div>
		<div class="form-group form-group-sm">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-3">
			  <button type="submit" class="btn btn-default">บันทึก</button>
			</div>
		</div>		 
	  <form>
  </div>
  
</div>
