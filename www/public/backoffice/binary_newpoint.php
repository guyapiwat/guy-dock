<? include("../function/class_binary_member.php");?>   
 
<?$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode']; ?>  
 <?
 if($status == 'member'){   ?>
    <form name="rform" method="POST" action="./index.php?sessiontab=<?=$_GET["sessiontab"]?>&sub=<?=$_GET["sub"]?>">
         <table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
          <tr><td colspan="6" align="center">&nbsp;</td></tr> 
          <tr>    
            <td align="right">รหัสสมาชิก&nbsp;</td>
            <td><input type="text" name="fmcode" id="fmcode" placeholder="0000001" readonly="" value="<?=$_SESSION["usercode"]?>" />                                                                                                            
           <input type="submit" name="Submit" value="ตกลง">
            &nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
          </tr>
         <tr><td colspan="6" align="center">&nbsp;</td></tr>
        </table>
    </form>  
 <?                                     
}else{ 
 ?>
<form name="rform" method="POST" action="./index.php?sessiontab=<?=$_GET["sessiontab"]?>&sub=<?=$_GET["sub"]?>">
     <table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
      <tr><td colspan="6" align="center">&nbsp;</td></tr> 
      <tr>    
        <td align="right">รหัสสมาชิก&nbsp;</td>
        <td><input type="text" name="fmcode" id="fmcode" placeholder="0000001" value="<?=$fmcode?>" />                                                                                                            
       <input type="submit" name="Submit" value="ตกลง">
        &nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
      </tr>
     <tr><td colspan="6" align="center">&nbsp;</td></tr>
    </table>
</form>
<?}?>
<?                                         
require("connectmysql.php");                                
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];         
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if (isset($_GET["lr"])){$lr=$_GET["lr"];} else {$lr="";} 
$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale']; 

if($fmcode){ 
    if($sale != 1){   
        $time_start = getmicrotime(); 
        
        $bn = new binary_member;
        $main_data = $bn->get_data();             
        
        $date1 = new DateTime($main_data[$fmcode]['mdate']);
        $date2 = new DateTime(date("Y-m-d")); 
        $diff = $date1->diff($date2);
        $day_diff = (($diff->format('%y') * 12) + $diff->format('%m'));
                                                                   
          $data=array(); 
          for($d=0;$d<=$day_diff;$d++){
           //foreach($main_date as $fdate ){ 
              $fdate = date("Y-m-d",strtotime("first day of ".$main_data[$fmcode]['mdate']." +$d month"));  
              $firstmonth = date("Y-m-d",strtotime("first day of $fdate"));   // XXXX-XX-01
              $haftmonth  = date("Y-m-d",strtotime("$firstmonth +14 days"));   // XXXX-XX-15
              $bhaftmonth = date("Y-m-d",strtotime("$haftmonth +1 days"));    // XXXX-XX-16
              $lastmonth  = date("Y-m-t", strtotime("first day of $fdate"));   // XXXX-XX-31  
              $data[$fdate] = $bn->get_point_binaryxx($main_data,$fmcode,$firstmonth,$lastmonth);    
           } 
          // exit;                    
        //$data = $bn->get_point_binary($main_data,$fmcode,$data[$fmcode]['mdate'],date("Y-m-d")); 
        del('ali_binary_newpoint',"uid = '$fmcode'");                                            
        if($data){   
          foreach($data as $month => $val){    
              $insert = array(
                   'mcode' => $fmcode,
                   'name_t' => $main_data[$fmcode]['name_t'],
                   'mdate' => $main_data[$fmcode]['mdate'],                        
                   'sp_code' => $main_data[$fmcode]['sp_code'],                       
                   'month' => $month,   
                   'point_left' => $val['point_1'],   
                   'point_right' => $val['point_2'],   
                   'point_all' => $val['point_1']+$val['point_2'],   
                   'uid' => $fmcode,           
              );
            insert('ali_binary_newpoint',$insert);  
         } 
       }
       
        $time_end = getmicrotime();
        $time = $time_end - $time_start;   
   }
   
    $sql  = "SELECT * ";
    $sql .= " from ali_binary_newpoint where uid = '$fmcode' and point_all > 0 ";  
    
    $rec = new repGenerator();
    $rec->setQuery($sql);
    $rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
    $rec->setOrder($_GET['ord']==""?" month ":$_GET['ord']);
    $rec->setLimitPage($_GET['lp']);
    if(isset($_POST['skey']))
     $rec->setCause($_POST['skey'],$_POST['scause']);
    else if(isset($_GET['skey']))
     $rec->setCause($_GET['skey'],$_GET['scause']);
     
    $rec->setSize("95%","");
    $rec->setAlign("center");
    $rec->setPageLinkAlign("right");
    //$rec->setPageLinkShow(false,false);
    $rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&lr=$lr&tdate=$tdate&sale=1&fmcode=$fmcode");
    $rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
    if(isset($page))
    $rec->setCurPage($page);
    $rec->setShowField("mcode,name_t,mdate,sp_code,month,point_left,point_right");
    $rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันสมัคร,รหัสผู้แนะนำ,เดือน,คะแนนปรับตำแหน่งซ้าย(คะแนนใหม่),คะแนนปรับตำแหน่งขวา(คะแนนใหม่)");                 
    $rec->setFieldSpace("10%,25%,10%,10%,15%,15%,15%");           
    $rec->setFieldAlign("center,left,center,center,center,right,right");
    $rec->setSum(true,false,",,,,,true,true"); 
    $rec->setFieldFloatFormat(",,,,,2,2");                         
   // $rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc="); 
  
    $rec->exportXls("ExportXls","Team_List".date("Ymd").".xls","SH_QUERY");
    $str = "<fieldset><a href='".$rec->download("ExportXls","Team_List".date("Ymd").".xls")."' >";
    $str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
    //$rec->getParam();
    $rec->setSpace($str); 
    $rec->showRec(1,'SH_QUERY');     
    if($sale!='1')echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR>";      
}


function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 

?>