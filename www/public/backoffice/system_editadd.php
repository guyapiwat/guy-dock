<?
	$data = query('*','ali_global',"1=1");
	foreach($data as $key => $val): 
		$status_member		= $val['status_member'];
		$status_regis_mb 	= $val['status_regis_mb'];
		$status_sale_mb 	= $val['status_sale_mb'];
		$status_hold_mb 	= $val['status_hold_mb'];
		$status_swap_mb 	= $val['status_swap_mb'];

		
		$status_remark = $val['status_remark'];
		
		$status_member_remark		= $val['status_member_remark'];
		$status_regis_mb_remark 	= $val['status_regis_mb_remark'];
		$status_sale_mb_remark 		= $val['status_sale_mb_remark'];
		$status_hold_mb_remark 		= $val['status_hold_mb_remark'];
		$status_swap_mb_remark 	= $val['status_swap_mb_remark'];
	endforeach;
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
<form class="form-horizontal" method="post" action="systemoperate.php?state=0">
	<div class="space-6"></div>
	<div class="space-6"></div>
	<input type="hidden" name="sessiontab" value="<?=$_GET['sessiontab']?>"> 
	<input type="hidden" name="sub" value="<?=$_GET['sub']?>"> 
	
	<input type="hidden" name="status_regis_mb_remark" value="<?=$_GET['sub']?>"> 
	<input type="hidden" name="sub" value="<?=$_GET['sub']?>"> 
	<input type="hidden" name="sub" value="<?=$_GET['sub']?>"> 
	<input type="hidden" name="sub" value="<?=$_GET['sub']?>"> 
	<input type="hidden" name="sub" value="<?=$_GET['sub']?>"> 
	<input type="hidden" name="sub" value="<?=$_GET['sub']?>"> 
	<input type="hidden" name="sub" value="<?=$_GET['sub']?>"> 
	<link rel="stylesheet" href="../css/bootstrap.css" />
	<link rel="stylesheet" type="text/css"  href="../css/ace2.css" />
	<div id="" class="container" >
	
		<div class='col-md-6'> 
			<div id="" class="col-md-12 text-center">
				<div class="widget-header">
					<h4 class="widget-title">MEMBER</h4>
				</div>
				<div class="widget-body" style="display: block;">
					<div class="widget-main" style="padding-top:5px"> 
						<div class="form-group grey" >
								<div class="col-md-6">
								<span class="lbl">&nbsp &nbsp ระบบ</span>
									<input id="status_member_old" name="status_member_old" type="hidden" value="<?=$status_member;?>" class="ace ace-switch ace-switch-4" >
								</div>
								<div class="col-md-6">
									<input id="status_member" name="status_member" type="checkbox" value="1" class="ace ace-switch ace-switch-4" <?if($status_member == '1'){echo "checked";}?>>
									<span class="lbl">&nbsp </span>
								</div>
						</div>
						<div class="form-group grey" >
								<div class="col-md-6">
									<span class="lbl middle">&nbsp&nbsp สมัครสมาชิก</span>
									<input id="status_regis_mb_old" name="status_regis_mb_old" type="hidden" value="<?=$status_regis_mb;?>" class="ace ace-switch ace-switch-4" >
								</div>
								<div class="col-md-6">
									<input id="status_regis_mb" name="status_regis_mb" type="checkbox" value="1" class="ace ace-switch ace-switch-4" <?if($status_regis_mb == '1'){echo "checked";}?>>
									<span class="lbl">&nbsp </span>
								</div>
						</div>
						<div class="form-group grey">
								<div class="col-md-6">
									<span class="lbl middle">&nbsp&nbsp สั่งซื้อสินค้า</span>
									<input id="status_sale_mb_old" name="status_sale_mb_old" type="text" value="<?=$status_sale_mb;?>" class="ace ace-switch ace-switch-4" hidden>
								</div>
								<div class="col-md-6">
									<input id="status_sale_mb" name="status_sale_mb" type="checkbox" value="1" class="ace ace-switch ace-switch-4" <?if($status_sale_mb == '1'){echo "checked";}?>>
									<span class="lbl">&nbsp </span>
								</div>
						</div>
						<div class="form-group grey" >
								<div class="col-md-6">
									<span class="lbl middle">&nbsp&nbsp  แลกของ</span>
									<input id="status_swap_mb_old" name="status_swap_mb_old" type="hidden" value="<?=$status_swap_mb;?>" class="ace ace-switch ace-switch-4" >
								</div>
								<div class="col-md-6">
									<input id="status_swap_mb" name="status_swap_mb" type="checkbox" value="1" class="ace ace-switch ace-switch-4" <?if($status_swap_mb == '1'){echo "checked";}?>>
									<span class="lbl">&nbsp </span>
								</div>
						</div>
						<div class="form-group grey" >
								<div class="col-md-6">
									<span class="lbl middle">&nbsp&nbsp  แจงยอด Hold</span>
									<input id="status_hold_mb_old" name="status_hold_mb_old" type="hidden" value="<?=$status_hold_mb;?>" class="ace ace-switch ace-switch-4" >
								</div>
								<div class="col-md-6">
									<input id="status_hold_mb" name="status_hold_mb" type="checkbox" value="1" class="ace ace-switch ace-switch-4" <?if($status_hold_mb  == '1'){echo "checked";}?>>
									<span class="lbl">&nbsp </span>
								</div>
						</div>
					</div>
				</div>
			</div>
			<div class="space-6"></div>
			<div class="space-6"></div>
		</div>
		
		<div class='col-md-6'> 
			<div id="" class="col-md-12 text-center">
				<div class="widget-header">
					<h4 class="widget-title">ข้อความ</h4>
				</div>
				<div class="widget-body" style="display: block;">
					<div  style="padding-top:5px"> 
						<input class="form-control" name="status_remark_old" type="hidden" value="<?=$status_remark?>"> 
						<textarea class="form-control" rows="7" style="height: 187px;" name="status_remark"><?=$status_remark?></textarea>
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
			<button type="submit" class="btn btn-white btn-md btn-success btn-round no-border">
				บันทึก
			</button>
			<button type="reset" class="btn btn-white btn-md btn-default btn-round no-border">
				ยกเลิก
			</button>
		</div>
	</div>
</form>

