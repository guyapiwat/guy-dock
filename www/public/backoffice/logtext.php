<?
<<<<<<< HEAD
function logtext($islog, $syscode, $subject, $objcode = "")
{
    include("prefix.php");
    require_once("function.log.inc.php");
    /*$mem_main = array(2=>"��ª�����Ҫԡ",4=>"Ἱ�����Ѿ�Ź�",5=>"Ἱ���Լ���й�",8=>"Ἱ���Ե�����Ѿ�Ź�",9=>"Ἱ���Ե�������й�",6=>"��ª�����Ҫԡ������Ѿ�Ź�",7=>"��ª�����Ҫԡ����ռ���й�");
    $sale_main = array(1=>"�������Թ���",2=>"�������Ң�",6=>"�����š�ë��͢��");
    $sys_main = array(1=>"���ͧ������",2=>"�����Ũѧ��Ѵ",3=>"�����Ÿ�Ҥ��",4=>"�����ż�����к�/������ʼ�ҹ",5=>"��駤��");
    $mainSubjectDesc = array(1=>"˹����ѡ��Ҫԡ",3=>"˹����ѡ��ë��͢��",5=>"˹����ѡ�������к�");
    $subjectDesc = array(1=>$mem_main,3=>$sale_main,5=>$sys_main);
    list($session,$sub,$state) = explode("-",$subject);
    switch($state){
        case 1 : $stateDesc = "ź"; break;
        case 2 : $stateDesc = "����/���"; break;
        case 3 : $stateDesc = "����"; break;
        case 4 : $stateDesc = "���"; break;
        default : $stateDesc = "��"; break;
    }
    $subject = $stateDesc.($subjectDesc[$session][$sub]==""?$mainSubjectDesc[$session]:$subjectDesc[$session][$sub]);*/
    if ($islog) {
        $sql = "INSERT INTO " . $dbprefix . "log (sys_id,subject,object,ip,logdate,logtime) VALUES('$syscode','$subject','$objcode','" . $_SERVER['REMOTE_ADDR'] . "','" . date('Y-m-d') . "','" . date('H:i:s') . "')";
        //exit;
        //====================LOG===========================
        $text = "uid=" . $_SESSION["adminuserid"] . " action=logtext =>$sql";
        writelogfile($text);
//=================END LOG===========================
        //echo $sql;
        mysql_query($sql);
    }
}

function logtext1($islog, $syscode, $subject, $objcode, $objtext, $chk_mobile, $chk_id_card, $chk_sp_code, $chk_upa_code, $chk_acc_no)
{
    include("prefix.php");
    require_once("function.log.inc.php");
    /*$mem_main = array(2=>"��ª�����Ҫԡ",4=>"Ἱ�����Ѿ�Ź�",5=>"Ἱ���Լ���й�",8=>"Ἱ���Ե�����Ѿ�Ź�",9=>"Ἱ���Ե�������й�",6=>"��ª�����Ҫԡ������Ѿ�Ź�",7=>"��ª�����Ҫԡ����ռ���й�");
    $sale_main = array(1=>"�������Թ���",2=>"�������Ң�",6=>"�����š�ë��͢��");
    $sys_main = array(1=>"���ͧ������",2=>"�����Ũѧ��Ѵ",3=>"�����Ÿ�Ҥ��",4=>"�����ż�����к�/������ʼ�ҹ",5=>"��駤��");
    $mainSubjectDesc = array(1=>"˹����ѡ��Ҫԡ",3=>"˹����ѡ��ë��͢��",5=>"˹����ѡ�������к�");
    $subjectDesc = array(1=>$mem_main,3=>$sale_main,5=>$sys_main);
    list($session,$sub,$state) = explode("-",$subject);
    switch($state){
        case 1 : $stateDesc = "ź"; break;
        case 2 : $stateDesc = "����/���"; break;
        case 3 : $stateDesc = "����"; break;
        case 4 : $stateDesc = "���"; break;
        default : $stateDesc = "��"; break;
    }
    $subject = $stateDesc.($subjectDesc[$session][$sub]==""?$mainSubjectDesc[$session]:$subjectDesc[$session][$sub]);*/
    if ($islog) {
        $sql = "INSERT INTO " . $dbprefix . "log (sys_id,subject,object,ip,logdate,logtime,detail,chk_mobile,chk_id_card,chk_sp_code,chk_upa_code,chk_acc_no) VALUES('$syscode','$subject','$objcode','" . $_SERVER['REMOTE_ADDR'] . "','" . date('Y-m-d') . "','" . date('H:i:s') . "','$objtext','$chk_mobile','$chk_id_card','$chk_sp_code','$chk_upa_code','$chk_acc_no')";
        //exit;
        //====================LOG===========================
        $text = "uid=" . $_SESSION["adminuserid"] . " action=logtext =>$sql";
        writelogfile($text);
=======
 function logtext($islog,$syscode,$subject,$objcode=""){
 	include("prefix.php");
	require_once ("function.log.inc.php");
	/*$mem_main = array(2=>"รายชื่อสมาชิก",4=>"แผนภูมิอัพไลน์",5=>"แผนภูมิผู้แนะนำ",8=>"แผนภูมิต้นไม้อัพไลน์",9=>"แผนภูมิต้นไม้ผู้แนะนำ",6=>"รายชื่อสมาชิกไม่มีอัพไลน์",7=>"รายชื่อสมาชิกไม่มีผู้แนะนำ");
	$sale_main = array(1=>"ข้อมูลสินค้า",2=>"ข้อมูลสาขา",6=>"ข้อมูลการซื้อขาย");
	$sys_main = array(1=>"สำลองข้อมูล",2=>"ข้อมูลจังหวัด",3=>"ข้อมูลธนาคาร",4=>"ข้อมูลผู้ใช้ระบบ/ตั้งรหัสผ่าน",5=>"ตั้งค่า");
	$mainSubjectDesc = array(1=>"หน้าหลักสมาชิก",3=>"หน้าหลักการซื้อขาย",5=>"หน้าหลักบริหารระบบ");
	$subjectDesc = array(1=>$mem_main,3=>$sale_main,5=>$sys_main);
	list($session,$sub,$state) = explode("-",$subject);
	switch($state){
		case 1 : $stateDesc = "ลบ"; break;
		case 2 : $stateDesc = "เพิ่ม/แก้ไข"; break;
		case 3 : $stateDesc = "เพิ่ม"; break;
		case 4 : $stateDesc = "แก้ไข"; break;
		default : $stateDesc = "ดู"; break;
	}
	$subject = $stateDesc.($subjectDesc[$session][$sub]==""?$mainSubjectDesc[$session]:$subjectDesc[$session][$sub]);*/
	if($islog){
		$sql = "INSERT INTO ".$dbprefix."log (sys_id,subject,object,ip,logdate,logtime) VALUES('$syscode','$subject','$objcode','".$_SERVER['REMOTE_ADDR']."','".date('Y-m-d')."','".date('H:i:s')."')";
		//exit;
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=logtext =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql;
		mysql_query($sql);
	}
 }
 function logtext1($islog,$syscode,$subject,$objcode,$objtext,$chk_mobile,$chk_id_card,$chk_sp_code,$chk_upa_code,$chk_acc_no){
 	include("prefix.php");
	require_once ("function.log.inc.php");
	/*$mem_main = array(2=>"รายชื่อสมาชิก",4=>"แผนภูมิอัพไลน์",5=>"แผนภูมิผู้แนะนำ",8=>"แผนภูมิต้นไม้อัพไลน์",9=>"แผนภูมิต้นไม้ผู้แนะนำ",6=>"รายชื่อสมาชิกไม่มีอัพไลน์",7=>"รายชื่อสมาชิกไม่มีผู้แนะนำ");
	$sale_main = array(1=>"ข้อมูลสินค้า",2=>"ข้อมูลสาขา",6=>"ข้อมูลการซื้อขาย");
	$sys_main = array(1=>"สำลองข้อมูล",2=>"ข้อมูลจังหวัด",3=>"ข้อมูลธนาคาร",4=>"ข้อมูลผู้ใช้ระบบ/ตั้งรหัสผ่าน",5=>"ตั้งค่า");
	$mainSubjectDesc = array(1=>"หน้าหลักสมาชิก",3=>"หน้าหลักการซื้อขาย",5=>"หน้าหลักบริหารระบบ");
	$subjectDesc = array(1=>$mem_main,3=>$sale_main,5=>$sys_main);
	list($session,$sub,$state) = explode("-",$subject);
	switch($state){
		case 1 : $stateDesc = "ลบ"; break;
		case 2 : $stateDesc = "เพิ่ม/แก้ไข"; break;
		case 3 : $stateDesc = "เพิ่ม"; break;
		case 4 : $stateDesc = "แก้ไข"; break;
		default : $stateDesc = "ดู"; break;
	}
	$subject = $stateDesc.($subjectDesc[$session][$sub]==""?$mainSubjectDesc[$session]:$subjectDesc[$session][$sub]);*/
	if($islog){
		$sql = "INSERT INTO ".$dbprefix."log (sys_id,subject,object,ip,logdate,logtime,detail,chk_mobile,chk_id_card,chk_sp_code,chk_upa_code,chk_acc_no) VALUES('$syscode','$subject','$objcode','".$_SERVER['REMOTE_ADDR']."','".date('Y-m-d')."','".date('H:i:s')."','$objtext','$chk_mobile','$chk_id_card','$chk_sp_code','$chk_upa_code','$chk_acc_no')";
		//exit;
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=logtext =>$sql";
writelogfile($text);
>>>>>>> ba1efb8a14cda8f847f280b9a693b6f4188a3fbe
//=================END LOG===========================
        //echo $sql;
        mysql_query($sql);
    }
}

?>