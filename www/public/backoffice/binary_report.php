<? include("../function/class_member.php");?>   
<? if($status == 'member')include("../function/function_pos.php");?>    
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


if(!empty($fmcode)) {  
$bn = new binary_member;    
$data = $bn->get_data();                                    
$binary = $bn->get_path_binary($data,$fmcode);   

if($_GET["lr"]){
   $pos_cur = $binary['status']['lr_'.$_GET["lr"]]['pos_cur'];    
   $pos_cur2 = $binary['status']['lr_'.$_GET["lr"]]['pos_cur2']; 
}else{
   $pos_cur = $binary['status']['pos_cur']; 
   $pos_cur2 = $binary['status']['pos_cur2'];
}

$position = $bn->showposition($pos_cur,'posid <=30'); 
$honor = $bn->showposition($pos_cur2,'posid >30'); 
              

?>
<br>
        
        <table align=right width="100%" cellpadding='5'>
 <tr ><td align=center>โครงสร้างรหัส : <?=$fmcode?>
 / จำนวนทั้งหมด  : <?=$binary['status']['All']?> รหัส
/  ซ้าย  : <?if($binary['status']['lr'][1]){echo$binary['status']['lr'][1];}else{echo 0;}?> รหัส /  ขวา    : <?if($binary['status']['lr'][2]){echo$binary['status']['lr'][2];}else{echo 0;}?> รหัส</td></tr>
 </table>
 
 <br> <br> <br> <br>
        <table width=60% align=center><tr><td align=center>
         <a href="?sessiontab=<?=$_GET["sessiontab"]?>&sub=<?=$_GET["sub"]?>&lr=1&sale=1&fmcode=<?=$fmcode?>" <?if($lr =='1'){?> style="background-color: #F00;padding: 5px;color: #FFF;"<?}?>>รายชื่อฝั่งซ้าย</a>
        </td>
        <td align=center>
        <a href="?sessiontab=<?=$_GET["sessiontab"]?>&sub=<?=$_GET["sub"]?>&sale=1&fmcode=<?=$fmcode?>" <?if($lr ==''){?> style="background-color: #F00;padding: 5px;color: #FFF;"<?}?>>ทั้งหมด</a>
        </td>
        <td align=center>
        <a href="?sessiontab=<?=$_GET["sessiontab"]?>&sub=<?=$_GET["sub"]?>&lr=2&sale=1&fmcode=<?=$fmcode?>" <?if($lr =='2'){?> style="background-color: #F00;padding: 5px;color: #FFF;"<?}?>>รายชื่อฝั่งขวา</a>
        </td>
        </tr>
         <tr><td colspan=3>          
         </td></tr></table> 

<br><hr>
<table width=100%><tr><td>                          
 <table align=right width="90%" cellpadding='5'>
   <?  
      /////////////////////  position
      $k=1;
      $gen = 3;           
      $max=$gen;           
      $tr = ceil(sizeof($position)/$max);  
     if($tr)echo "&nbsp;จำนวนตำแหน่งทางธุรกิจทั้งหมด : ".$position['All']." รหัส<br /><br />";
	  for($i=1;$i<=$tr;$i++){   
        echo '<tr>';  
        for($k=$k;$k<=$max;$k++){
           if($position[$k]){
               echo "<td width=33% align=left><img src='images/".$position[$k]['posimg']."' height='20' ><font size = 3> ".$position[$k]['posname']." : ".$position[$k]['member']." รหัส</td>   ";   
           }else{
               //echo "<td ></td >";
           } 
        }
        $max =$max+$gen;   
        echo '</tr>';       
      } 
	  echo '</table></td></tr>';
	  echo '<tr><td><hr></td><tr><td><table align=right width=90% cellpadding=5>';
	 // echo '<tr><td><table align=right width=90% cellpadding=5>';
      ////////////////////////  honor
      $k=1;           
      $max=$gen;           
      $tr = ceil(sizeof($honor)/$max); 
	    if($tr)echo "&nbspจำนวนตำแหน่งเกียติยศทั้งหมด :  ".$honor['All']." รหัส<br /><br />";
      for($i=1;$i<=$tr;$i++){         
        echo '<tr>';  
        for($k=$k;$k<=$max;$k++){
           if($honor[$k]){
               echo "<td width=33% align=left ><img src='images/".$honor[$k]['posimg']."' height='20' ><font size = 3> ".$honor[$k]['posname']." : ".$honor[$k]['member']." รหัส</td>   ";   
           }else{
              // echo "<td ></td >";
           } 
        }
        $max =$max+$gen;      
        echo '</tr>';       
      } 
	  
    ?>  
	<tr><td></td><tr>
</table>
</td></tr></table>	
<hr><br>

<?
  /////////       
  if($sale != 1){
      del('ali_binary_report',"uid = '$fmcode'");
	if($binary[$fmcode]['member']){ 
      foreach($binary[$fmcode]['member'] as $mcode => $val){   
          $insert = array(
               'mcode' => $val['mcode'],
               'name_t' => $val['name_t'],
               'mdate' => $val['mdate'],
               'upa_code' => $val['upa_code'],
               'upa_name' => $data[$val['upa_code']]['name_t'],
               'sp_code' => $val['sp_code'],
               'sp_name' => $data[$val['sp_code']]['name_t'],   
               'pos_cur' => $val['pos_cur'],   
               'pos_cur2' => $val['pos_cur2'],   
               'totpv' => get_totpv($mcode),   
             //  'hpv' => get_htotpv($mcode),   
               'uid' => $fmcode,   
               'lr' => $val['lr_bn'],   
               'lv' => $val['level_bn'],   
               'lv_sp' => $val['level_sp'],   
          );
         insert('ali_binary_report',$insert);         
      } 
	}	  
  }   
 
  
    $sql = "SELECT *,";
    $sql .= "CASE lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS lr1 from ali_binary_report where uid = '$fmcode' ";
    if($_GET["lr"]){
    $sql .= " and lr = '".$_GET["lr"]."' ";
    }
	if($status == 'member')require("./cls/repGenerator.php");  
                 
    $rec = new repGenerator();
    $rec->setQuery($sql);
    $rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
    $rec->setOrder($_GET['ord']==""?" lv ":$_GET['ord']);
    $rec->setLimitPage($_GET['lp']);
    if(isset($_POST['skey']))
     $rec->setCause($_POST['skey'],$_POST['scause']);
    else if(isset($_GET['skey']))
     $rec->setCause($_GET['skey'],$_GET['scause']);
    $rec->setSize("95%","");
    $rec->setAlign("center");
    $rec->setPageLinkAlign("right");
    //$rec->setPageLinkShow(false,false);
    $rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&lr=$lr&sale=1&fmcode=$fmcode");
    $rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
    if(isset($page))
     $rec->setCurPage($page);
    $rec->setShowField("mcode,name_t,mdate,lr1,pos_cur,pos_cur1,totpv,sp_code,sp_name,lv,lv_sp");
      $rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันสมัคร,ด้าน,Package,ตำแหน่ง,คะแนนส่วนตัว,รหัสผู้แนะนำ,ชื่อผู้แนะนำ,ชั้น Binary,ชั้น sponser");                 
    
    $rec->setFieldAlign("center,left,center,center,center,right,right,center,left,center,center");
  //  $rec->setFieldSpace("8%,20%,8%,4%,4%,8%,8%,8%,20%,5%,5%"); 
   if($status == 'member'){
       $rec->setFieldLink("index.php?sessiontab=2&sub=1&cmc="); 
   }else{
       $rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc="); 
   }

    $rec->exportXls("ExportXls","Team_List".date("Ymd").".xls","SH_QUERY");
    $str = "<fieldset><a href='".$rec->download("ExportXls","Team_List".date("Ymd").".xls")."' >";
    $str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
    //$rec->getParam();
    $rec->setSpace($str);

    $rec->setSearch("mcode");
    $rec->setSearchDesc("รหัสสมาชิก");
    $rec->showRec(1,'SH_QUERY');
}
 

   

?>





