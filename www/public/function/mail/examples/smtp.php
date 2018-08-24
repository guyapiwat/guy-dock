<?PHP
require("../class.phpmailer.php");
require_once '../PHPMailerAutoload.php';

$mail = new PHPMailer();

$body = " ยินดีต้อนรับสู่  Siam Rattana
<br><br> รหัสสมาชิกของคุณคือ : $mcode 
<br> ชื่อผู้สมัครหลัก : $name_f $name_t
<br> รหัสผ่านสำหรับเข้าระบบ Online : คือ 4 ตัวท้ายของหมายเลขบัตรประชาชนของผู้สมัครหลัก  
<br><br> ท่านสามารถเข้าสู่ระบบ Siam Rattana Co.,Ltd Online Member Service เพื่อสั่งซื้อสินค้า,สมัครสมาชิกใหม่,เช็คโบนัส หรือดูแลองค์กรของท่านได้ที่ <br> <a href='http://203.146.170.60/~siam/member/'>Siam Rattana</a>";

$mail->CharSet = "utf-8";
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->Host = "mail.omc.co.th"; // SMTP server
$mail->Port = 25; // พอร์ท
$mail->Username = "bird@omc.co.th"; // account SMTP
$mail->Password = "bird123"; // รหัสผ่าน SMTP

$mail->SetFrom("info@siamrattana.com", "Siam Rattana");
$mail->AddReplyTo("info@siamrattana.com", "Siam Rattana");
$mail->Subject = "Welcome to Siam Rattana Co.,Ltd";

$mail->MsgHTML($body);

$mail->AddAddress("suwijuk80@yahoo.com", "recipient1"); // ผู้รับคนที่หนึ่ง
$mail->AddAddress("tip_trik_mail@hotmail.com", "recipient1"); // ผู้รับคนที่หนึ่ง
//$mail->AddAddress("bird.peemail@gmail.com", "recipient2"); // ผู้รับคนที่สอง
$mail->AddAddress("bird@omc.co.th", "recipient2"); // ผู้รับคนที่สอง

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>