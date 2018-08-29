<?
	$data = query('*','ali_global',"1=1");
?>
<style>
div.pad{
	padding: 10px 0px 10px 0px;
	margin: 5px 0px 10px 0px;
}
div.color{
	background-color: #e7e7e7;
}
div.border{
	border: 2px solid #dcdcdc;
    border-radius: 4px;
	padding: 3px 0px 3px 0px;
}
.grey{
	background-color:#e8e8e8;
	font-size: 16px;
	padding: 5px 0px 5px 0px;
}
.b-ma{
	margin: 0px 0px 0px 0px;
}
</style>


<?
//include("head_set.php");

?>
<div class="clearfix"></div>
<form class="form-horizontal" id="from_conf"  method="post" action="pos_exp_operate.php?state=0">
	<div class="space-6"></div> 
	<div class="space-6"></div>
	<input type="hidden" name="sessiontab" value="<?=$_GET['sessiontab']?>"> 
	<input type="hidden" name="sub" value="<?=$_GET['sub']?>"> 
	<link rel="stylesheet" href="../css/bootstrap.css" />
	<link rel="stylesheet" type="text/css"  href="../css/ace2.css" />
	<div id="" class="container" >
	
		<div class='col-md-3'> 
		</div>
		<div class='col-md-6'> 
			<div id="" class="col-md-12 text-center">
				<div class="widget-header">
					<h4 class="widget-title">โปรโมชั่นตำแหน่ง</h4>
				</div>
				<div class="widget-body" style="display: block;">
					<div class="widget-main" style="padding-top:5px"> 
						<div class="form-group grey" >
								<div class="col-md-6">
								<span class="lbl">&nbsp &nbsp คะแนน</span>
								</div>
								<div class="col-md-6">
									<input id="vip_exp" name="vip_exp" type="number" value="<?=$data[0]['vip_exp']?>" >
									<input id="vip_exp_old" name="vip_exp_old" type="hidden" value="<?=$data[0]['vip_exp']?>" >
								</div>
						</div>
				</div>
			</div>
			<div class="space-6"></div>
			<div class="space-6"></div>
		</div>
		
	</div>
	</div>
	<div class="space-6"></div>
	<div class="space-6"></div>
	<div class="form-group text-center">
		<div class="col-sm-12 col-md-12 ">
			<button type="submit" class="btn btn-white btn-md btn-success btn-round no-border" id="hhh">
				บันทึก
			</button>
			<button type="reset" class="btn btn-white btn-md btn-default btn-round no-border">
				ยกเลิก
			</button>
		</div>
	</div>
</form>

<script>
	$(function(){
		$('#from_conf').submit(function(){
			var vip_exp = formatNumber($('#vip_exp').val());
			var vip_exp_old = formatNumber($('#vip_exp_old').val());
			if(confirm("คอนเฟิร์มการเปลี่ยนคะแนนการขึ้นตำแหน่ง จาก "+vip_exp_old+" เป็น "+vip_exp)){
				return true;
			}
			return false;
		});
	});
	function formatNumber(num) {
		return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
	}
</script>

