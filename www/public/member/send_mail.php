<meta http-equiv=Content-Type content="text/html; charset=tis-620">.
<?
$email="qazmit@hotmail.com";
if($email){
			$strTo = "$email";
			$strSubject = "=?UTF-8?B?".base64_encode("Welcome to Lachule Asia")."?=";
			//$strHeader .= "MIME-Version: 1.0' . \r\n";
			$strHeader = "Content-type: text/html; charset=windows-874\r\n"; 
			$strHeader .= "From: Lachule Asia Information<cs@lachule.com>";
			//$strVar = "ข้อความภาษาไทย";
			$strMessage = "ยินดีต้อนรับสู่ Lachule Asia
				<br><br> รหัสสมาชิกของคุณคือ : $mcode 
				<br> ชื่อผู้สมัครหลัก : $name_f $name_t
				<br> รหัสผ่านสำหรับเข้าระบบ Online : คือ 4 ตัวท้ายของหมายเลขบัตรประชาชนของผู้สมัครหลัก  
				<br><br> ท่านสามารถเข้าสู่ระบบ Lachule Asia Online Member Service เพื่อสั่งซื้อสินค้า,สมัครสมาชิกใหม่,เช็คโบนัส หรือดูแลองค์กรของท่านได้ที่ <br> <a href='http://www.lachule.com'>www.lachule.com</a>
				<br> กรุณาส่งใบสมัครและเอกสารประกอบการสมัครภายในวันที่  ".date("d-m-Y",strtotime("+1 Month",strtotime($mdate)))."
				<br><br> หากมีคำถามหรือข้อสงสัยประการใด กรุณาติดต่อ
				<br><br> แผนกดูแลลูกค้า ( Customer Support )";
			$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);
			//	mail("$email","","From:Webmaster<webmaster@cabnetsystem.com>","webmaster@cabnetsystem.com");
			}
			?>