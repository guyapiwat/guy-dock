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
	checkValues($_POST["mcode"],"�س������͡������Ҫԡ��� !!!");
	checkValues($_POST["payType"],"�س��������͡�ѭ�ո�Ҥ�ä�� !!!");
	checkValues($_POST["sadate"],"�س��������͡(�ѹ/��͹/��)��� !!!");
	checkValues($_POST["sctime"],"�س��������͡(����)��� !!!");
	checkValues($_POST["total"],"�س������͡�ӹǹ�Թ��� !!!");
	if(intval($_POST["total"]) <= 0){checkValues("","��سҡ�͡�ӹǹ�Թ�ҡ���� 0 �ҷ��� !!!");}
	if($_FILES["imgPay"]["name"] > 200000){
		echo "<script language='JavaScript'>alert('��Ҵ����˭��Թ� ����ͧ��Ҵ����Թ 200KB ��� !!!'); window.history.back()</script>";
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
		echo "<script language='JavaScript'>alert('�ٻẺ������١��ͧ ��� !!!'); window.history.back()</script>";
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
				returnLinks(4,213,"�Ѿ��Ŵ����ٻ�Ҿ�������稤�� !!!");
			}
		}
	}
	else{
		returnLinks(4,213,"�Դ��ͼԴ��Ҵ��� !!!");
	}
	
	returnLinks(4,23,"���º���¤�� �ͷҧ����ѷ͹��ѵԤ��");
	 
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