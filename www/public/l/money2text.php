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
    //หน้าทศนิยม
    for ($i=$totdigit;$i>=1;$i--){
        $c = substr($mtext, $i-1, 1);
        $cdigit = $totdigit + 1 - $i;
        //ตัวเลข
        switch ($c){
        case "0":
            if ($cdigit == 7 and $totdigit > 7 ){
                $t = "ศูนย์";
			}else{
                $t = "";
			}
			break;
        case "1":
            if ($cdigit == 1 and $totdigit > 1 or $cdigit == 7 and $totdigit > 7 ){
                $t = "เอ็ด";
			}else{
                $t = "หนึ่ง";
            }
			break;
        case "2":
            if ($cdigit == 2 or $cdigit == 8){
                $t = "ยี่";
			}else{
                $t = "สอง";
			}
			break;
		case "3":
            $t = "สาม";
			break;
        case "4":
            $t = "สี่";
			break;
        case "5":
            $t = "ห้า";
			break;
        case "6":
            $t = "หก";
			break;
        case "7":
            $t = "เจ็ด";
			break;
        case "8":
            $t = "แปด";
			break;
        case "9":
            $t = "เก้า";
			break;
        default :
            $t = "";
        }
        //หลัก
        if ($t <> ""){
            switch ($cdigit){
            case 1:  //หน่วย
                $d = "";
				break;
            case 2:  //สิบ
                if ($t == "หนึ่ง"){
                    $t = "";
				}
                $d = "สิบ";
				break;
            case 3:  //ร้อย
                $d = "ร้อย";
				break;
            case 4:  //พัน
                $d = "พัน";
				break;
            case 5:  //หมื่น
                $d = "หมื่น";
				break;
            case 6:  //แสน
                $d = "แสน";
				break;
            case 7:  //ล้าน
                if ($t == "ศูนย์"){
                    $t = "";
				}
                $d = "ล้าน";
				break;
            case 8:  //สิบล้าน
                if ($t == "หนึ่ง"){
                    $t = "";
				}
                $d = "สิบ";
				break;
            case 9: //ร้อยล้าน
                $d = "ร้อย";
				break;
            case 10: //พันล้าน
                $d = "พัน";
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
        $outtext = $outtext ." บาทถ้วน";
	}
    
    //หลัง ทศนิยม ตำแหน่งที่ 1
    switch (substr($mtext, strlen($mtext) - 2, 1)){
        case "1":
            $d01 = "สิบ";
			break;
        case "2":
            $d01 = "ยี่สิบ";
			break;
        case "3":
            $d01 = "สามสิบ";
			break;
        case "4":
            $d01 = "สี่สิบ";
			break;
        case "5";
            $d01 = "ห้าสิบ";
			break;
        case "6":
            $d01 = "หกสิบ";
			break;
        case "7":
            $d01 = "เจ็ดสิบ";
			break;
        case "8":
            $d01 = "แปดสิบ";
			break;
        case "9":
            $d01 = "เก้าสิบ";
			break;
        default:
            $d01 = "";
    }
    //ทศนิยม ตำแหน่งที่ 2
    switch (substr($mtext, strlen($mtext)-1, 1)){
        case "1":
            if ($d01 <> ""){
                $d02 = "เอ็ด";
			}else{
                $d02 = "หนึ่ง";
            }
			break;
        case "2":
            $d02 = "สอง";
			break;
        case "3":
            $d02 = "สาม";
			break;
        case "4":
            $d02 = "สี่";
			break;
        case "5":
            $d02 = "ห้า";
			break;
        case "6":
            $d02 = "หก";
			break;
        case "7":
            $d02 = "เจ็ด";
			break;
        case "8":
            $d02 = "แปด";
			break;
        case "9":
            $d02 = "เก้า";
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