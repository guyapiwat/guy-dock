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
        $outtext = $outtext ."บาท";
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
        $d02 = $d02 ."สตางค์";
    }
    
    if ($d01.$d02 <> ""){
        $outtext = $outtext.$d01.$d02;
	}
    else{
        $outtext = $outtext."ถ้วน";
    }
    return $outtext;
}
?>