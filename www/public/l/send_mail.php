<meta http-equiv=Content-Type content="text/html; charset=tis-620">.
<?
$email="qazmit@hotmail.com";
if($email){
			$strTo = "$email";
			$strSubject = "=?UTF-8?B?".base64_encode("Welcome to Lachule Asia")."?=";
			//$strHeader .= "MIME-Version: 1.0' . \r\n";
			$strHeader = "Content-type: text/html; charset=windows-874\r\n"; 
			$strHeader .= "From: Lachule Asia Information<cs@lachule.com>";
			//$strVar = "��ͤ���������";
			$strMessage = "�Թ�յ�͹�Ѻ��� Lachule Asia
				<br><br> ������Ҫԡ�ͧ�س��� : $mcode 
				<br> ���ͼ����Ѥ���ѡ : $name_f $name_t
				<br> ���ʼ�ҹ����Ѻ����к� Online : ��� 4 ��Ƿ��¢ͧ�����Ţ�ѵû�ЪҪ��ͧ�����Ѥ���ѡ  
				<br><br> ��ҹ����ö�������к� Lachule Asia Online Member Service ������觫����Թ���,��Ѥ���Ҫԡ����,��⺹�� ���ʹ���ͧ��âͧ��ҹ���� <br> <a href='http://www.lachule.com'>www.lachule.com</a>
				<br> ��س������Ѥ�����͡��û�Сͺ�����Ѥ������ѹ���  ".date("d-m-Y",strtotime("+1 Month",strtotime($mdate)))."
				<br><br> �ҡ�դӶ�����͢��ʧ��»�С��� ��سҵԴ���
				<br><br> Ἱ������١��� ( Customer Support )";
			$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);
			//	mail("$email","","From:Webmaster<webmaster@cabnetsystem.com>","webmaster@cabnetsystem.com");
			}
			?>