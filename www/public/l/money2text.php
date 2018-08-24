<?
function moneytotext($m){
    If ($m == ""){
        return "";
	}
	$m=str_replace(",", "", $m);
	if(! is_numeric($m)){
		return "";
	}
    $mtext = number_format($m, 2, '.', '');
    $totdigit = strlen($mtext) - 3;
    $outtext = "";
    //˹�ҷȹ���
    for ($i=$totdigit;$i>=1;$i--){
        $c = substr($mtext, $i-1, 1);
        $cdigit = $totdigit + 1 - $i;
        //����Ţ
        switch ($c){
        case "0":
            if ($cdigit == 7 and $totdigit > 7 ){
                $t = "�ٹ��";
			}else{
                $t = "";
			}
			break;
        case "1":
            if ($cdigit == 1 and $totdigit > 1 or $cdigit == 7 and $totdigit > 7 ){
                $t = "���";
			}else{
                $t = "˹��";
            }
			break;
        case "2":
            if ($cdigit == 2 or $cdigit == 8){
                $t = "���";
			}else{
                $t = "�ͧ";
			}
			break;
		case "3":
            $t = "���";
			break;
        case "4":
            $t = "���";
			break;
        case "5":
            $t = "���";
			break;
        case "6":
            $t = "ˡ";
			break;
        case "7":
            $t = "��";
			break;
        case "8":
            $t = "Ỵ";
			break;
        case "9":
            $t = "���";
			break;
        default :
            $t = "";
        }
        //��ѡ
        if ($t <> ""){
            switch ($cdigit){
            case 1:  //˹���
                $d = "";
				break;
            case 2:  //�Ժ
                if ($t == "˹��"){
                    $t = "";
				}
                $d = "�Ժ";
				break;
            case 3:  //����
                $d = "����";
				break;
            case 4:  //�ѹ
                $d = "�ѹ";
				break;
            case 5:  //����
                $d = "����";
				break;
            case 6:  //�ʹ
                $d = "�ʹ";
				break;
            case 7:  //��ҹ
                if ($t == "�ٹ��"){
                    $t = "";
				}
                $d = "��ҹ";
				break;
            case 8:  //�Ժ��ҹ
                if ($t == "˹��"){
                    $t = "";
				}
                $d = "�Ժ";
				break;
            case 9: //������ҹ
                $d = "����";
				break;
            case 10: //�ѹ��ҹ
                $d = "�ѹ";
				break;
            default :
                $d = "";
            }
        }
		else{
            $d = "";
		}	
        $outtext = $t.$d.$outtext;
	}
    if ($outtext <> ""){
        $outtext = $outtext ." �ҷ��ǹ";
	}
    
    //��ѧ �ȹ��� ���˹觷�� 1
    switch (substr($mtext, strlen($mtext) - 2, 1)){
        case "1":
            $d01 = "�Ժ";
			break;
        case "2":
            $d01 = "����Ժ";
			break;
        case "3":
            $d01 = "����Ժ";
			break;
        case "4":
            $d01 = "����Ժ";
			break;
        case "5";
            $d01 = "����Ժ";
			break;
        case "6":
            $d01 = "ˡ�Ժ";
			break;
        case "7":
            $d01 = "���Ժ";
			break;
        case "8":
            $d01 = "Ỵ�Ժ";
			break;
        case "9":
            $d01 = "����Ժ";
			break;
        default:
            $d01 = "";
    }
    //�ȹ��� ���˹觷�� 2
    switch (substr($mtext, strlen($mtext)-1, 1)){
        case "1":
            if ($d01 <> ""){
                $d02 = "���";
			}else{
                $d02 = "˹��";
            }
			break;
        case "2":
            $d02 = "�ͧ";
			break;
        case "3":
            $d02 = "���";
			break;
        case "4":
            $d02 = "���";
			break;
        case "5":
            $d02 = "���";
			break;
        case "6":
            $d02 = "ˡ";
			break;
        case "7":
            $d02 = "��";
			break;
        case "8":
            $d02 = "Ỵ";
			break;
        case "9":
            $d02 = "���";
			break;
        default:
            $d02 = "";
    }
    if ($d01.$d02 <> ""){
        $d02 = $d02 ." CENTS";
    }
    
    if ($d01.$d02 <> ""){
        $outtext = $outtext." ".$d01.$d02;
	}
    else{
        $outtext = $outtext."";
    }
    return $outtext;
}


function bahtEng($thb) {
   list($thb, $ths) = explode('.', $thb);
   $ths = substr($ths.'00', 0, 2);
   $thb =engFormat(intval($thb)).' Bath.';
   if (intval($ths) > 0) {
    $thb .= ' and '.engFormat(intval($ths)).' CENTS';
   }
   return $thb;
  }
function engFormat($number) {
   list($thb, $ths) = explode('.', $thb);
   $ths = substr($ths.'00', 0, 2);
   $max_size = pow(10, 18);
   if (!$number)
    return "zero";
   if (is_int($number) && $number < abs($max_size)) {
    switch ($number) {
     case $number < 0:
      $prefix = "negative";
      $suffix = engFormat(-1 * $number);
      $string = $prefix." ".$suffix;
      break;
     case 1:
      $string = "one";
      break;
     case 2:
      $string = "two";
      break;
     case 3:
      $string = "three";
      break;
     case 4:
      $string = "four";
      break;
     case 5:
      $string = "five";
      break;
     case 6:
      $string = "six";
      break;
     case 7:
      $string = "seven";
      break;
     case 8:
      $string = "eight";
      break;
     case 9:
      $string = "nine";
      break;
     case 10:
      $string = "ten";
      break;
     case 11:
      $string = "eleven";
      break;
     case 12:
      $string = "twelve";
      break;
     case 13:
      $string = "thirteen";
      break;
     case 15:
      $string = "fifteen";
      break;
     case $number < 20:
      $string = engFormat($number % 10);
      if ($number == 18) {
       $suffix = "een";
      } else {
       $suffix = "teen";
      }
      $string .= $suffix;
      break;
     case 20:
      $string = "twenty";
      break;
     case 30:
      $string = "thirty";
      break;
     case 40:
      $string = "forty";
      break;
     case 50:
      $string = "fifty";
      break;
     case 60:
      $string = "sixty";
      break;
     case 70:
      $string = "seventy";
      break;
     case 80:
      $string = "eighty";
      break;
     case 90:
      $string = "ninety";
      break;
     case $number < 100:
      $prefix = engFormat($number - $number % 10);
      $suffix = engFormat($number % 10);
      $string = $prefix."-".$suffix;
      break;
     case $number < pow(10, 3):
      $prefix = engFormat(intval(floor($number / pow(10, 2))))." hundred";
      if ($number % pow(10, 2))
       $suffix = " and ".engFormat($number % pow(10, 2));
      $string = $prefix.$suffix;
      break;
     case $number < pow(10, 6):
      $prefix = engFormat(intval(floor($number / pow(10, 3))))." thousand";
      if ($number % pow(10, 3))
       $suffix = engFormat($number % pow(10, 3));
      $string = $prefix." ".$suffix;
      break;
     case $number < pow(10, 9):
      $prefix = engFormat(intval(floor($number / pow(10, 6))))." million";
      if ($number % pow(10, 6))
       $suffix = engFormat($number % pow(10, 6));
      $string = $prefix." ".$suffix;
      break;
     case $number < pow(10, 12):
      $prefix = engFormat(intval(floor($number / pow(10, 9))))." billion";
      if ($number % pow(10, 9))
       $suffix = engFormat($number % pow(10, 9));
      $string = $prefix." ".$suffix;
      break;
     case $number < pow(10, 15):
      $prefix = engFormat(intval(floor($number / pow(10, 12))))." trillion";
      if ($number % pow(10, 12))
       $suffix = engFormat($number % pow(10, 12));
      $string = $prefix." ".$suffix;
      break;
     case $number < pow(10, 18):
      $prefix = engFormat(intval(floor($number / pow(10, 15))))." quadrillion";
      if ($number % pow(10, 15))
       $suffix = engFormat($number % pow(10, 15));
      $string = $prefix." ".$suffix;
      break;
    }
   }
   return $string;
  }
?>