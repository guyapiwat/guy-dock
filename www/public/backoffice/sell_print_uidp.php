<?
session_start();
include("prefix.php");
require("../backoffice/date_picker.php"); 
require("connectmysql.php");
require("./cls/repGenerator.php");
require("../function/function_pos.php");
//require("adminchecklogin.php");
require("inc.wording.php");
$inv_code = $_SESSION["admininvent"];
$inv_ref = $_SESSION["admininvent"];

$fdate = $_REQUEST["fdate"];
$tdate = $_REQUEST["tdate"];
$uid = $_GET['uid'];
if(empty($fdate))$fdate = date("Y-m-d");
if(empty($tdate))$tdate = date("Y-m-d");  
?> 
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>MLM</title>
<link rel="stylesheet" type="text/css" href="./../style.css" />
<style>
.doubleUnderline{
border-bottom: 3px double;
} 
.header{
    background-color: #79A4B7;
    padding: 10px;
    text-align: center;  
} 
.clear{
    padding: 20px;
}
.left{
    width: 45%;
    float: left; 
} 
.right{   
    text-align: right;
}
.main{
    width: 80%;
    margin: 0 auto;  
}

.doubleUnderline{
border-bottom: 3px double;
}
 

</style>
<!-- onload="javascript:window.print()";-->
<body>
<center><form action="" method="_POST">
    <input type="text" name="fdate" id="dateInput1" value="<?=$fdate?>"> - <input type="text" name="tdate" id="dateInput2" value="<?=$tdate?>">
    
    สาขา
    <select name="inv" id="inv" >
    <option value="">ทั้งหมด</option>
        <? 
         $inventy = query("*","ali_invent","1=1 "," "); 
         foreach($inventy as $keyx => $valx): 
        ?>
          <option value="<?=$valx['inv_code']?>" <?if($_GET['inv'] == $valx['inv_code'])echo "selected"?> ><?=$valx['inv_desc']?></option>  
        <?endforeach;?>
    </select>    ชื่อผู้ใช้
    <select name="uid" id="uid" >
    <option value="">ทั้งหมด</option>
        <? 
         $inventx = query("*","ali_user user","inv_ref <> '' ","LEFT JOIN ali_invent inv ON(inv.inv_code = user.inv_ref)"); 
         foreach($inventx as $keyx => $valx): 
        ?>
          <option value="<?=$valx['usercode']?>" <?if($_GET['uid'] == $valx['usercode'])echo "selected"?> ><?=$valx['usercode']?></option>  
        <?endforeach;?>
    </select>
    <input type="submit" name="submit" value="ตกลง">
</form>
</center>
<? 
 
$where = "and sadate >= '{$fdate}' and sadate <= '{$tdate}' and scheck <> 'register' ";
$where_e = "and sadate >= '{$fdate}' and sadate <= '{$tdate}' ";

$set_payment = query("*",'ali_payment pm '," 1=1 and pm.shows = 1 ORDER BY pm.order_by "); 
foreach($set_payment as $key => $val):
   $text = 'txt'.$val['payment_column']; 
   $arr[$val['payment_ref']][$val['payment_column']] = $text;
   $arr[$val['payment_ref']]['column'] = $val['rep_column'];
endforeach; 
foreach($arr as $key => $val):
        $sqlx = "IFNULL(SUM(";
        $keyx=0;
        $colome_text .=  ','.$val['column'];
        unset($val['column']);
        foreach($val as $valx):
        $sqlx .= "ash.{$valx}"; 
        if($keyx+1 != count($val))$sqlx .= "+";
        $keyx++;
        endforeach;
        $sqlx .= "),0) as $key"; 
        $select[$key] = $sqlx;
endforeach;
if($_GET['uid'] )$uid = "and user.usercode = '{$_GET['uid']}' ";
else $uid = '';

if($_GET['inv'] )$inv = "and user.inv_ref = '{$_GET['inv']}' ";
else $inv = '';

$inv = query("*","ali_user user","inv_ref <> '' $uid  $inv ","LEFT JOIN ali_invent inv ON(inv.inv_code = user.inv_ref)"); 
 
foreach($inv as $keyx => $valx):
  if($valx['inv_code'])
  {
      
    echo "<div class='header'>";
    echo "รายงานการรับชำระเงินประจำวัน แยกตามเคาน์เตอร์และประเภทการชำระ(บิลขาย)";
    echo "<br>ผู้ใช้  <b>".$valx['usercode'];
    echo "</b> : สาขา  <b>".$valx['inv_code'];
    echo "</b></div>";
    echo '<br>';
    echo "<div class='main'>"; 
    echo "<div class='right'>วันที่พิมพ์ ".date("Y-m-d H:i:s")."</div>"; 
    echo '<br>';    
    foreach($arr as $key => $val): 
       echo "<div class='left'>".$val['column'],'</div>';
       $sum = query($select[$key],'ali_asaleh ash'," lid = '{$valx['inv_code']}' and uid = '{$valx['usercode']}' $where ");  
       echo "<div class='right'>".number_format($sum[0][$key],2,'.',',')."</div>";
       $all[$keyx] += $sum[0][$key];
    endforeach;    
    echo "<div class='left'>รวม</div>";
    echo "<div class='right border'>".number_format($all[$keyx],2,'.',',')."</div>";  
    echo '</div>';
    echo '<br><br>';
    echo "<div class='main'>";   
    
    $payment_branch = query("*",'ali_payment_branch pb ',"pb.inv_code = '{$valx['inv_code']}' ");
    $payment_idx = explode(',',$payment_branch[0]['payment_id']);  
    
    foreach($set_payment as $keyxx => $valxx):   
      $a =  searchId($valxx['id'],$payment_idx);
      $sum = 0;
      if($a >= 0)
      {
        $paymem_option =query("*",'ali_payment_type py ',"py.inv_code = '{$valx['inv_code']}' and py.payment_id = '{$valxx['id']}' and py.shows ='1' "); 
        if($paymem_option)
        {
            echo "<div class='left'><b>".$valxx['payment_name'],'</b></div>'; 
            echo "<div class='right'>&nbsp;</div>";
            $c = '';
            $s = "select".$valxx['payment_column']; 
            $t = "txt".$valxx['payment_column'];
            foreach($paymem_option as $k => $v):   
               $c .= "'{$v['id']}',";
               echo "<div class='left'><li>".$v['pay_desc'],'</li></div>'; 
               $sumx = query("IFNULL(SUM({$t}),0) as {$valxx['payment_column']} ",'ali_asaleh ash'," lid = '{$valx['inv_code']}' and uid = '{$valx['usercode']}' and {$s} = '{$v['id']}' $where ");  
            //   $sume = query("IFNULL(SUM({$t}),0) as {$valxx['payment_column']} ",'ali_ewallet ash'," lid = '{$valx['inv_code']}' and uid = '{$valx['usercode']}' and {$s} = '{$v['id']}' $where_e ");  
               $sum = $sumx[0][$valxx['payment_column']] ;//+$sume[0][$valxx['payment_column']];
               echo "<div class='right'>".number_format($sum,2,'.',',')."</div>";
               $allex[$keyx] +=$sum;
            endforeach;   
            $sumo = query("IFNULL(SUM({$t}),0) as {$valxx['payment_column']} ",'ali_asaleh ash'," lid = '{$valx['inv_code']}' and uid = '{$valx['usercode']}' and {$s} NOT IN (".substr($c,0,-1).") $where ");   
            echo "<div class='left'><li>อื่นๆ</li></div>"; 
            echo "<div class='right'>".$sumo[0][$valxx['payment_column']]."</div>";
            $allex[$keyx] += $sumo[0][$valxx['payment_column']];
        }else{
            echo "<div class='left'><b>".$valxx['payment_name'],'</b></div>'; 
            echo "<div class='right'>&nbsp;</div>";
            $c = '999999999';
            $s = "select".$valxx['payment_column']; 
            $t = "txt".$valxx['payment_column'];
            $sumo = query("IFNULL(SUM({$t}),0) as {$valxx['payment_column']} ",'ali_asaleh ash'," lid = '{$valx['inv_code']}' and uid = '{$valx['usercode']}' and {$s} NOT IN (".substr($c,0,-1).") $where ");  
           // $sume = query("IFNULL(SUM({$t}),0) as {$valxx['payment_column']} ",'ali_ewallet ash'," lid = '{$valx['inv_code']}' and uid = '{$valx['usercode']}' and {$s} NOT IN (".substr($c,0,-1).") $where_e ");  
            $sum = $sumx[0][$valxx['payment_column']] ;//+$sume[0][$valxx['payment_column']]; 
            echo "<div class='left'><li>อื่นๆ</li></div>"; 
            echo "<div class='right'>".number_format($sum,2,'.',',')."</div>";
            $allex[$keyx] +=$sum;
        }
      }  
    endforeach;   
    echo "<div class='left'>รวม</div>";
    echo "<div class='right border'>".number_format($allex[$keyx],2,'.',',')."</div>";
    echo "</div>";  
    echo "<div class='clear'></div>"; 
  }
endforeach;

function searchId($id,$array) {
   foreach ($array as $key => $val) {
       if ($val === $id) {
           return $key;
       }
   }
   return -1;
}


?>


</body>
</html>