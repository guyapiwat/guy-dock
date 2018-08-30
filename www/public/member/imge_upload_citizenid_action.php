<?php
session_start();
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//include("config.php");
// Include คลาส class.upload.php เข้ามา เพื่อจัดการรูปภาพ
require_once('class.upload.php') ;
$fileimagename= $_POST["mcid_img"];

//echo $fileimagename;
// var_dump($_FILES['image_file']);
// exit;
//var_dump($_SERVER['HTTP_X_FILE_NAME']);
//$erp_product_image = new erp_product_image();
if($fileimagename."x"=="x"){
    echo "กรุณาสุ่มหรัสมาชิกก่อนค่ะ";
    exit;
} 
//if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
if(isset($_POST)){

//"TH11111111111111111";

// echo $fileimagename;
// exit;

    // we first check if it is a XMLHttpRequest call
    if (isset($_SERVER['HTTP_X_FILE_NAME']) && isset($_SERVER['CONTENT_LENGTH'])) {

        // we create an instance of the class, feeding in the name of the file
        // sent via a XMLHttpRequest request, prefixed with 'php:'
        $handle = new Upload('php:'.$_SERVER['HTTP_X_FILE_NAME']);  

    } else {  
        // we create an instance of the class, giving as argument the PHP object
        // corresponding to the file field from the form
        // This is the fallback, using the standard way
        $handle = new Upload($_FILES['image_file']);       
    }
    
    // then we check if the file has been uploaded properly
    // in its *temporary* location in the server (often, it is /tmp)
    $dir_dest ="../uploads/member/";

    if ($handle->uploaded) {
		if(!@mkdir($dir_dest,0777,true)){}else{}
			
		
	 

			$handle->image_resize         = true ; // อนุญาติให้ย่อภาพได้
			$handle->image_x              = 400 ; // กำหนดความกว้างภาพเท่ากับ 400 pixel 
			$handle->image_ratio_y        = true; // ให้คำณวนความสูงอัตโนมัติ
			//$dir_dest ="upload_images/".$_SESSION["companyid"]."/image/";
			$dir_pics = $dir_dest;
			$handle->file_new_name_body = "acc_no_".$fileimagename;
			$handle->Process($dir_dest);

      
        if ($handle->processed) {
		
        $url=$dir_dest.$handle->file_dst_name;
        //$erp_product_image->add_erpproductimage($url,$productid);
           
            //everything was fine !
            echo '<p class="result">';
            echo '  <b>File uploaded with success</b><br />';
            echo ' <img src="'.$dir_dest. $handle->file_dst_name . '" border=0><br>' . $handle->file_dst_name . '';
            echo ' <input type="hidden" id="id_card_img2" name="id_card_img2"  value="'. $handle->file_dst_name . '">';
			echo '   (' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB)';
            echo '</p><script>$("#id_card_img").val(\''. $handle->file_dst_name .'\');$("#showimage").html(\'<img src="../uploads/member/'. $handle->file_dst_name .'" alt="บัตรประชาชน" height="60" width="60">\');</script>';

            // $url= $dir_dest. $handle->file_dst_name;
            // $filename = $handle->file_dst_name;
            // $data=array("url":$url,"filename":$filename);
            // $myJSON = json_encode($data);
            // echo $myJSON;
			
        } else {
		
            // one error occured
            echo '<p class="result">';
            echo '  <b>File not uploaded to the wanted location</b><br />';
            echo '  Error: ' . $handle->error . '';
            echo '</p>';
        }

        // we delete the temporary files
        $handle-> Clean();

    } else {

        // if we're here, the upload file failed for some reasons
        // i.e. the server didn't receive the file
        echo '<p class="result">';
        echo '  <b>File not uploaded on the server</b><br />';
        echo '  Error: ' . $handle->error . '';
        echo '</p>';
    }
 exit;
}
?>
