<?
define ("nl", "<br>");
define ("tell", "***");

class Calender{

    function getDayOfWeek($dd = 1, $mm = 1, $yy = 2000){
        $dateArray = getdate(mktime(0,0,0,$mm,$dd,$yy));
        return $dateArray['wday'];
    }
    
    function getWeekOfMonth($dd = 1, $mm = 1, $yy = 2000){
        $firstDayOfMonth = 1 + $this->getDayOfWeek(1,$mm,$yy);
     
        $dDiff = $dd - $firstDayOfMonth;
        $wDiff = round($dDiff/7);
        return $wDiff + 1;
    }

    function isLeapYear($yy = 2000){
        if (round(($yy - 2000)/4) == (($yy - 2000)/4)){
            return 1;
        } else {
            return 0;
        }
    }
    
    function getDaysInMonth($mm = 1, $yy = 2000){       
        switch ($mm-1){
            case 0:
                return 31;
                break;
            case 1:
                if ($this->isLeapYear($yy)){
                    return 29;
                } else {
                    return 28;
                }
                break;
            case 2:
                return 31;
                break;
            case 3:
                return 30;
                break;
            case 4:
                return 31;
                break;
            case 5:
                return 30;
                break;
            case 6:
                return 31;
                break;
            case 7:
                return 31;
                break;
            case 8:
                return 30;
                break;
            case 9:
                return 31;
                break;
            case 10:
                return 30;
                break;
            case 11:
            	return 31;
            	break;
            default:
            	return 0;
            	break;
        
        }
    }
    
    function getMonthName($mm = 1){      
     switch ($mm-1){
            case 0:
                return "มกราคม";
                break;
            case 1:
                return "กุมภาพันธ์";
                break;
            case 2:
                return "มีนาคม";
                break;
            case 3:
                return "เมษายน";
                break;
            case 4:
                return "พฤษภาคม";
                break;
            case 5:
                return "มิถุนายน";
                break;
            case 6:
                return "กรกฏาคม";
                break;
            case 7:
                return "สิงหาคม";
                break;
            case 8:
                return "กันยายน";
                break;
            case 9:
                return "ตุลาคม";
                break;
            case 10:
                return "พฤศจิกายน";
                break;
            case 11:
            	return "ธันวาคม";
            	break;
            default:
            	return 0;
            	break;
        
        }
    }
    
}


function  create_daylist($nday){	

 for ($j=1; $j<=31; $j++){
	if (strlen($j)<2){
		     $i = "0";
	}else{
		    $i ="";
	}	
				
	if($j == $nday)	{
	  $dselect  = "selected";
	}else{
	  $dselect = "";
	}	
     echo  "<option value='$i$j'  $dselect >$j</option>";	 
	 }
	 
}


 function MonthName($mm = 1){      
     switch ($mm-1){
            case 0:
                return "มกราคม";
                break;
            case 1:
                return "กุมภาพันธ์";
                break;
            case 2:
                return "มีนาคม";
                break;
            case 3:
                return "เมษายน";
                break;
            case 4:
                return "พฤษภาคม";
                break;
            case 5:
                return "มิถุนายน";
                break;
            case 6:
                return "กรกฏาคม";
                break;
            case 7:
                return "สิงหาคม";
                break;
            case 8:
                return "กันยายน";
                break;
            case 9:
                return "ตุลาคม";
                break;
            case 10:
                return "พฤศจิกายน";
                break;
            case 11:
            	return "ธันวาคม";
            	break;
            default:
            	return 0;
            	break;
        }
   }

function  create_monthlist($nmonth)
{
  for ($j=1; $j<=12; $j++){
				if (strlen($j)<2){
		     $i = "0";
		}else{
		    $i ="";
		}	   			
		
	if($j == $nmonth)	{
	  $mselect  = "selected";
	}else{
	  $mselect = "";
	}
	
	    $mN = MonthName($j);	
        echo  "<option value='$i$j'  $mselect >$mN</option>";	
	  
	 }	 

	 
}

function  create_yearlist($nyear)
{
    for ($y=2000; $y<=$nyear+3; $y++){  	
		if($y == $nyear)	{
			  $yselect  = "selected";
		}else{
			  $yselect = "";
		}	
    		 echo  "<option value='$y'  $yselect >$y</option>";	 
	 }
 }  

 function  create_weeklist($nweek)
{

    for ($y=1; $y<=6; $y++){  	
		if($y == $nweek)	{
			  $yselect  = "selected";
		}else{
			  $yselect = "";
		}	
    		 echo  "<option value='$y'  $yselect >$y</option>";	 
	 }	 
 }  


function getMonthnum($mm){      
     switch ($mm){
            case "Jan":
                return "01";
                break;
            case "Feb":
                return "02";
                break;
            case "Mar":
                return "03";
                break;
            case "Apr":
                return "04";
                break;
            case "May":
                return "05";
                break;
            case "Jun":
                return "06";
                break;
            case "Jul":
                return "07";
                break;
            case "Aug":
                return "08";
                break;
            case "Sep":
                return "09";
                break;
            case "Oct":
                return "10";
                break;
            case "Nov":
                return "11";
                break;
            case "Dec":
            	return "12";
            	break;
            default:
            	return 0;
            	break;        
        }
    }



?>