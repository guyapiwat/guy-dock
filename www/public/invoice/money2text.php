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
        $outtext = $outtext ."�ҷ";
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
        $d02 = $d02 ."ʵҧ��";
    }
    
    if ($d01.$d02 <> ""){
        $outtext = $outtext.$d01.$d02;
    }
    else{
        $outtext = $outtext."��ǹ";
    }
    return $outtext;
}
?>