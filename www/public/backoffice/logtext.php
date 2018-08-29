<?
<<<<<<< HEAD
function logtext($islog, $syscode, $subject, $objcode = "")
{
    include("prefix.php");
    require_once("function.log.inc.php");
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
	/*$mem_main = array(2=>"เธฃเธฒเธขเธเธทเนเธญเธชเธกเธฒเธเธดเธ",4=>"เนเธเธเธ เธนเธกเธดเธญเธฑเธเนเธฅเธเน",5=>"เนเธเธเธ เธนเธกเธดเธเธนเนเนเธเธฐเธเธณ",8=>"เนเธเธเธ เธนเธกเธดเธ•เนเธเนเธกเนเธญเธฑเธเนเธฅเธเน",9=>"เนเธเธเธ เธนเธกเธดเธ•เนเธเนเธกเนเธเธนเนเนเธเธฐเธเธณ",6=>"เธฃเธฒเธขเธเธทเนเธญเธชเธกเธฒเธเธดเธเนเธกเนเธกเธตเธญเธฑเธเนเธฅเธเน",7=>"เธฃเธฒเธขเธเธทเนเธญเธชเธกเธฒเธเธดเธเนเธกเนเธกเธตเธเธนเนเนเธเธฐเธเธณ");
	$sale_main = array(1=>"เธเนเธญเธกเธนเธฅเธชเธดเธเธเนเธฒ",2=>"เธเนเธญเธกเธนเธฅเธชเธฒเธเธฒ",6=>"เธเนเธญเธกเธนเธฅเธเธฒเธฃเธเธทเนเธญเธเธฒเธข");
	$sys_main = array(1=>"เธชเธณเธฅเธญเธเธเนเธญเธกเธนเธฅ",2=>"เธเนเธญเธกเธนเธฅเธเธฑเธเธซเธงเธฑเธ”",3=>"เธเนเธญเธกเธนเธฅเธเธเธฒเธเธฒเธฃ",4=>"เธเนเธญเธกเธนเธฅเธเธนเนเนเธเนเธฃเธฐเธเธ/เธ•เธฑเนเธเธฃเธซเธฑเธชเธเนเธฒเธ",5=>"เธ•เธฑเนเธเธเนเธฒ");
	$mainSubjectDesc = array(1=>"เธซเธเนเธฒเธซเธฅเธฑเธเธชเธกเธฒเธเธดเธ",3=>"เธซเธเนเธฒเธซเธฅเธฑเธเธเธฒเธฃเธเธทเนเธญเธเธฒเธข",5=>"เธซเธเนเธฒเธซเธฅเธฑเธเธเธฃเธดเธซเธฒเธฃเธฃเธฐเธเธ");
	$subjectDesc = array(1=>$mem_main,3=>$sale_main,5=>$sys_main);
	list($session,$sub,$state) = explode("-",$subject);
	switch($state){
		case 1 : $stateDesc = "เธฅเธ"; break;
		case 2 : $stateDesc = "เน€เธเธดเนเธก/เนเธเนเนเธ"; break;
		case 3 : $stateDesc = "เน€เธเธดเนเธก"; break;
		case 4 : $stateDesc = "เนเธเนเนเธ"; break;
		default : $stateDesc = "เธ”เธน"; break;
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
	/*$mem_main = array(2=>"เธฃเธฒเธขเธเธทเนเธญเธชเธกเธฒเธเธดเธ",4=>"เนเธเธเธ เธนเธกเธดเธญเธฑเธเนเธฅเธเน",5=>"เนเธเธเธ เธนเธกเธดเธเธนเนเนเธเธฐเธเธณ",8=>"เนเธเธเธ เธนเธกเธดเธ•เนเธเนเธกเนเธญเธฑเธเนเธฅเธเน",9=>"เนเธเธเธ เธนเธกเธดเธ•เนเธเนเธกเนเธเธนเนเนเธเธฐเธเธณ",6=>"เธฃเธฒเธขเธเธทเนเธญเธชเธกเธฒเธเธดเธเนเธกเนเธกเธตเธญเธฑเธเนเธฅเธเน",7=>"เธฃเธฒเธขเธเธทเนเธญเธชเธกเธฒเธเธดเธเนเธกเนเธกเธตเธเธนเนเนเธเธฐเธเธณ");
	$sale_main = array(1=>"เธเนเธญเธกเธนเธฅเธชเธดเธเธเนเธฒ",2=>"เธเนเธญเธกเธนเธฅเธชเธฒเธเธฒ",6=>"เธเนเธญเธกเธนเธฅเธเธฒเธฃเธเธทเนเธญเธเธฒเธข");
	$sys_main = array(1=>"เธชเธณเธฅเธญเธเธเนเธญเธกเธนเธฅ",2=>"เธเนเธญเธกเธนเธฅเธเธฑเธเธซเธงเธฑเธ”",3=>"เธเนเธญเธกเธนเธฅเธเธเธฒเธเธฒเธฃ",4=>"เธเนเธญเธกเธนเธฅเธเธนเนเนเธเนเธฃเธฐเธเธ/เธ•เธฑเนเธเธฃเธซเธฑเธชเธเนเธฒเธ",5=>"เธ•เธฑเนเธเธเนเธฒ");
	$mainSubjectDesc = array(1=>"เธซเธเนเธฒเธซเธฅเธฑเธเธชเธกเธฒเธเธดเธ",3=>"เธซเธเนเธฒเธซเธฅเธฑเธเธเธฒเธฃเธเธทเนเธญเธเธฒเธข",5=>"เธซเธเนเธฒเธซเธฅเธฑเธเธเธฃเธดเธซเธฒเธฃเธฃเธฐเธเธ");
	$subjectDesc = array(1=>$mem_main,3=>$sale_main,5=>$sys_main);
	list($session,$sub,$state) = explode("-",$subject);
	switch($state){
		case 1 : $stateDesc = "เธฅเธ"; break;
		case 2 : $stateDesc = "เน€เธเธดเนเธก/เนเธเนเนเธ"; break;
		case 3 : $stateDesc = "เน€เธเธดเนเธก"; break;
		case 4 : $stateDesc = "เนเธเนเนเธ"; break;
		default : $stateDesc = "เธ”เธน"; break;
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