<meta charset="tis-620">
<?PHP
//session_start();
include("connectmysql.php");
/*
	echo "<PRE>";
	print_r($_POST);
	echo "</PRE>";
	echo "<PRE>";
	print_r($_FILES);
	echo "</PRE>";
	exit;
*/	
	checkValues($_POST["mcode"],"คุณไม่ได้กรอกรหัสสมาชิกค่ะ !!!");
	checkValues($_POST["payType"],"คุณไม่ได้เลือกบัญชีธนาคารค่ะ !!!");
	checkValues($_POST["sadate"],"คุณไม่ได้เลือก(วัน/เดือน/ปี)ค่ะ !!!");
	checkValues($_POST["sctime"],"คุณไม่ได้เลือก(เวลา)ค่ะ !!!");
	checkValues($_POST["total"],"คุณไม่ได้กรอกจำนวนเงินค่ะ !!!");
	if(intval($_POST["total"]) <= 0){checkValues("","กรุณากรอกจำนวนเงินมากกว่า 0 บาทค่ะ !!!");}
	if($_FILES["imgPay"]["name"] > 200000){
		echo "<script language='JavaScript'>alert('ขนาดไฟล์ใหญ่เกินไป ไฟล์ต้องขนาดไม่เกิน 200KB ค่ะ !!!'); window.history.back()</script>";
		exit;
	}


	$exploddate = explode("/",$_POST["sadate"]);
	$sadate1 = 	$exploddate[2].'-'.$exploddate[0].'-'.$exploddate[1];
	//echo $sadate1;
	//exit;
	$f_type = $_FILES["imgPay"]["type"];
	if ($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/GIF"){
	}
	else{
		echo "<script language='JavaScript'>alert('รูปแบบไฟล์ไม่ถูกต้อง ค่ะ !!!'); window.history.back()</script>";
		exit;
	}
	
	$file_name = renameFiles($_FILES["imgPay"]["name"]);
	
	$sql  = "INSERT INTO ali_transfer_ewallet_confirm ";
	$sql .= "(mcode, pay_type, sadate, sctime, total, img_pay) ";
	$sql .= "VALUES ";
	$sql .= "('".$_POST["mcode"]."', '".$_POST["payType"]."', '".$sadate1."', '".$_POST["sctime"]."', '".$_POST["total"]."', '".$file_name."') ";
	$rs = mysql_query($sql);
	if($rs){
		if(empty($_FILES["imgPay"]["name"]) or $_FILES["imgPay"]["size"] == 0){
		}
		else{
			$files = move_uploaded_file($_FILES["imgPay"]["tmp_name"],"pay_images_temp/".$file_name);
			if($files){}
			else{
				mysql_query("DELETE FROM ali_transfer_ewallet_confirm WHERE mcode='".$_POST["mcode"]."' and pay_type='".$_POST["payType"]."' and sadate='".$sadate1."' and sctime='".$_POST["sctime"]."' and total='".$_POST["total"]."' and img_pay='".$file_name."'");
				returnLinks(4,213,"อัพโหลดไฟล์รูปภาพไม่สำเร็จค่ะ !!!");
			}
		}
	}
	else{
		returnLinks(4,213,"เกิดข้อผิดพลาดค่ะ !!!");
	}
	
	returnLinks(4,23,"เรียบร้อยค่ะ รอทางบริษัทอนุมัติค่ะ");
	 
function checkValues($value,$remark){
	if(empty($value)){
		echo "<script language='JavaScript'>alert('".$remark."'); window.history.back()</script>";
		exit;
	}
}
function renameFiles($file_name){
	$new_name = "";
	if(empty($file_name)){}
	else{
		$type = explode(".",$file_name);
		$random = rand(0,100);
		$re_name = strtotime("now");
		$new_name = $random.$re_name.".".$type[1];
	}
	return $new_name;
}
function returnLinks($sesstiontab,$sub,$remark){
	echo "<script language='JavaScript'>alert('".$remark."');window.location='index.php?sessiontab=$sesstiontab&sub=$sub';</script>";    
	exit;
}
?>