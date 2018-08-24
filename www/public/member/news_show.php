<?
	if($_GET['ids']){
		$sql = "SELECT * FROM ".$dbprefix."news WHERE id='".$_GET['ids']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><div class='alert alert-danger center'>ไม่พบข้อมูลตามเงื่อนไข</div>
		<div class='alert alert-danger center'>[<a href="javascript:history.back();">ไปหน้าข้อมูลผู้ใช้ระบบ</a>]</div><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			$head=$row->head;
			$bodys=$row->body;
			$date=$row->dates;
			$status=$row->status;		
		}
	}
?>

<style> .shadow {  
-moz-box-shadow: 5px 5px 5px #ccc;  
-webkit-box-shadow: 5px 5px 5px #ccc;  
box-shadow: 5px 5px 5px #ccc;  
} 
</style>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="clearfix">
			<div class="pull-left alert alert-success no-margin"  style="width:100%">
				<i class="ace-icon fa fa-umbrella bigger-120 blue"></i>
				<?=$head.' '.$wording_lan["tab5"]['3_1'].' : '.$date;?>
			</div>
		</div>
	</div>
</div>
<br>
<table width="95%" align=center border="0" cellpadding="2" class="shadow">
  <tr>
    <th align="left"scope="row" bg bgcolor="#CCFF99"><font size="+2"><font></th>
    </tr>
    <tr>
    <th colspan="2" scope="row"  align="left"><hr></th>
    </tr>
  <tr>
    <th colspan="2" scope="row"  align="left"><?=$bodys?></th>
    </tr>
</table><?
$sqlall = "SELECT *,CASE WHEN status = 'Y'  THEN 'Yes' ELSE 'No' END as status FROM ".$dbprefix."news where status ='Y'  order by id desc  ";
$rs12 = mysql_query($sqlall);      

?>

<div class="row">
	<div class="col-xs-12">

			<!-- /section:pages/profile.info -->
			<div class="space-10"></div>

			<div class="widget-box transparent">
				<div class="widget-header widget-header-small">
					<h4 class="widget-title blue smaller">
						<i class="ace-icon fa fa-rss orange"></i>
						<?=$wording_lan["news"];?>
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main padding-8">
						<!-- #section:pages/profile.feed -->
						<div id="profile-feed-1" class="profile-feed">
							<? 
							if (mysql_num_rows($rs12)>0) {
								for($x=0;$x<mysql_num_rows($rs12);$x++){
									$sqlObj = mysql_fetch_object($rs12);
									$id =$sqlObj->id;  
									$head =$sqlObj->head;  
									$dates =$sqlObj->dates;  
							?>
							<div class="profile-activity clearfix">
								<div>
									<i class="pull-left thumbicon fa fa-check btn-success no-hover"></i>
									<a href="./index.php?sessiontab=1&sub=10&ids=<?=$id?>"><?=$head?></a>
									<div class="time">
										<i class="ace-icon fa fa-clock-o bigger-110"></i>
										<?=$dates?>
									</div>
								</div>
							</div>
							<?
								}
							}
							?>
						</div>
						<!-- /section:pages/profile.feed -->
					</div>
				</div>
			</div>
			<div class="space-6"></div>
			<div class="space-6"></div>
			<div class="space-6"></div>
			<div class="space-6"></div>
		</div>
	</div>
</div>
 

