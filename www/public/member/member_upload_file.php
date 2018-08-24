<?php
session_start();
include("connectmysql.php");

if(count($_FILES)>0){
	foreach ($_FILES as $k=>$v){$type = $k;break;}
}else{
	echo json_encode(array('error'=>'No files found for upload.'));
	exit;
}

switch($type){
	case 'file_id_card':
		setUpload($type,'id_card');
		break;
	case 'file_acc_no':
		setUpload($type,'acc_no');
		break;
	default : 
		echo json_encode(array('error'=>'No files found for upload.'));
		break;
		
}

function setUpload($type,$prefix_name){

	require_once('../function/class.upload.php') ;
	
	$path = '../uploads/member';
	$upload_image = new upload($_FILES[$type]) ; 

	if ( $upload_image->uploaded ) {

		$upload_image->file_new_name_body   = $prefix_name.'_'.$_SESSION['usercode'];
		$upload_image->file_overwrite		= true;
		$upload_image->process($path); 

		if ( $upload_image->processed ) {

			$photo_file =  $upload_image->file_dst_name ; 
			$upload_image->clean(); 
			
			if($_SESSION['usercode']<>''){
				$active_date = '';
				/* if($prefix_name=='id_card')$active_date = ",cmp='¤Ãº',bmdate1='".date("Y-m-d")."'"; 
				if($prefix_name=='acc_no')$active_date = ",cmp2='¤Ãº',bmdate2='".date("Y-m-d")."'"; */
				if($prefix_name=='id_card')$active_date = ",id_card_img_date='".date("Y-m-d H:i:s")."'"; 
				if($prefix_name=='acc_no')$active_date = ",acc_no_img_date='".date("Y-m-d H:i:s")."'";
				mysql_query("UPDATE ali_member SET ".$prefix_name."_img = '".$photo_file."' $active_date WHERE mcode = '".$_SESSION['usercode']."' ");		
			}

			echo json_encode(array('success'=>'Complete'));
			
		} 

	} 

}
?>