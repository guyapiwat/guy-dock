<?php
require './connectmysql.php';
$mcode=$_SESSION["usercode"];
?>
<link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="../js/fileinput.js" type="text/javascript"></script>
<script src="../js/fileinput_locale_fr.js" type="text/javascript"></script>
<script src="../js/fileinput_locale_es.js" type="text/javascript"></script>

<?
$data = query('id_card_img,cmp,acc_no_img,cmp2,bmdate1,bmdate2,id_card_img_date,acc_no_img_date','ali_member',"mcode = '{$_SESSION["usercode"]}'");
$member = $data[0];

?>

<form name="chkupload" id="chkupload" action="" method="post">
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="clearfix">
		<div>
			<div id="user-profile-1" class="user-profile row ">
				<div class="col-xs-12 col-sm-6">
					<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title"><?=$wording_lan["info_main_1"]["50"]?></h4>
						</div>
						<div class="widget-body">
							<div class="widget-main">
								<? if(file_exists('../uploads/member/'.$member['id_card_img']) && $member['id_card_img']<>''){ ?>
									<div class="file-preview ">
										<div class=" file-drop-zone"><img src="../uploads/member/<?=$member['id_card_img']?>" style="max-width:100%"/>						
										<div class="clearfix"></div>    
									</div>
									<div class="text-center"><?=$wording_lan["info_main_1"]["51"]?> : <?=$member['id_card_img_date']?></div>
								</div>
								<? }else{ ?>
									<input id="input-1" name="file_id_card" type="file" class="file">
								 <? } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title"><?=$wording_lan["info_main_1"]["53"]?></h4>
						</div>
						<div class="widget-body">
							<div class="widget-main">
								 <? if(file_exists('../uploads/member/'.$member['acc_no_img']) && $member['acc_no_img']<>''){ ?>
									<div class="file-preview ">
										<div class=" file-drop-zone"><img src="../uploads/member/<?=$member['acc_no_img']?>" style="max-width:100%"/>						
										<div class="clearfix"></div>    
									</div>
									<div class="text-center"><?=$wording_lan["info_main_1"]["51"]?> : <?=$member['acc_no_img_date']?></div>
								</div>

								<? }else{ ?>
									<input id="input-2" name="file_acc_no" type="file" class="file">
								 <? } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
</form>
<script>
    $("input[name=file_id_card]").fileinput({
        uploadUrl: './member_upload_file.php',
        allowedFileExtensions : ['jpg', 'JPEG', 'png','gif'],
        overwriteInitial: true,
        maxFileSize: 1000,
        maxFilesNum: 10,
        slugCallback: function(filename) {
           return filename.replace('(', '_').replace(']', '_');
        }
	});
    $("input[name=file_acc_no]").fileinput({
        uploadUrl: './member_upload_file.php',
        allowedFileExtensions : ['jpg', 'JPEG', 'png','gif'],
        overwriteInitial: true,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
	});
	</script>
<div style="clear:both"></div>
