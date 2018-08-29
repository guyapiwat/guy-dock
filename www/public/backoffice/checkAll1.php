<?
include("rpdialog.php");  
rpdialog_m($_GET['sub']);    

	if($_GET['print_all']==true){
				echo '<script type="text/javascript">
						function printDiv(divName) {
							 var printContents = document.getElementById(divName).innerHTML;
							 var originalContents = document.body.innerHTML;
							 document.body.innerHTML = printContents;
							 window.print();
						}
						 
						</script>
					';
				echo "<div id='divprint'>";
				include("checkAll1_print.php");
				echo "</div>";
				echo "<script type='application/javascript'>window.onload=function(){printDiv('divprint');}</script>";
			}
$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
if($strfdate){                                  
$time_start = getmicrotime();
$set_table_a = array('ambonus','bmbonus','dmbonus','embonus'); //// SET TABLE
$set_table_b = array(''); //// SET TABLE
$set_val = array('ambonus'=> 'ค่าแนะนำ (Fast)',
                'bmbonus'=> 'W/S',
                'dmbonus' =>'Matching',
				'embonus' =>'All Sale'
				); //// SET TABLE

$bonus = getAllBonusxx($mcode='',$set_table_a,$strfdate,$strtdate); 
//$bonus2 = getAllBonusxx($mcode='',$set_table_b,$strfdate,$strtdate);         


////////////// A  pv /////////////           
/*$whereho = "sa_type <> 'H' and cancel = 0 and tot_pv > 0 and sadate>= '$strfdate'  and sadate <= '$strtdate'";    
$sql = " SELECT ifnull(SUM(total),0) as total,ifnull(SUM(tot_pv),0) as tot_pv FROM  ";
$sql .= " ( ";
$sql .= " SELECT SUM(total) as total,SUM(tot_pv) as tot_pv  FROM ali_asaleh ";
$sql .= "    WHERE ".$whereho." ";
$sql .= " UNION ALL ";
$sql .= " SELECT SUM(total) as total,SUM(tot_pv) as tot_pv    FROM ali_holdhead";
$sql .= "    WHERE ".$whereho."  ";
$sql .= " ) as tb ";
$sql .= " ";*/

//$whereah = "ah.sa_type = 'A' and ah.cancel = 0  and ah.sadate>= '$strfdate'  and ah.sadate <= '$strtdate'   ";    
//$whereho = "hh.sa_type = 'A' and hh.cancel = 0 and hh.tot_pv > 0 and hh.sadate>= '$strfdate'  and hh.sadate <= '$strtdate' ";   
 
$whereah = "ah.cancel = 0 and ah.tot_pv > 0 and ah.sadate>= '$strfdate'  and ah.sadate <= '$strtdate' and (ah.sa_type = 'A' or ah.sa_type = 'Z') ";    
$whereho = "hh.cancel = 0 and hh.tot_pv > 0 and hh.sadate>= '$strfdate'  and hh.sadate <= '$strtdate' and (hh.sa_type = 'A' ) ";    
//$where = "sadate between '$fdate' and '$tdate' and (sa_type = 'A' or sa_type = 'Z')  and cancel=0 and tot_pv > 0 ";

$sql = " SELECT ifnull(SUM(tot_pv),0) as tot_pv,ifnull(SUM(total),0) as total FROM  ";
$sql .= " ( ";
$sql .= " SELECT SUM(ah.tot_pv) as tot_pv,SUM(ah.total) as total  FROM ali_asaleh ah ";
$sql .= "    WHERE ".$whereah." ";
$sql .= " UNION ALL ";
$sql .= " SELECT SUM(hh.tot_pv) as tot_pv,SUM(hh.total) as total    FROM ali_holdhead hh";
$sql .= "    WHERE ".$whereho."  ";
$sql .= " ) as tb ";
$sql .= " ";
//echo $sql;

$rs = mysql_query($sql);
$num =  mysql_num_rows($rs);
if(mysql_num_rows($rs) > 0)
{   
    $row = mysql_fetch_object($rs);
    $total = $row->total;         
    $tot_pv = $row->tot_pv;         
    
}  
////////////// A /////////////


////////////// A  NOT PV /////////////        
$whereho = "sa_type = 'A' and cancel = 0 and tot_pv =0 and sadate>= '$strfdate'  and sadate <= '$strtdate'";    
$sql = " SELECT ifnull(SUM(total),0) as total,ifnull(SUM(tot_pv),0) as tot_pv FROM  ";
$sql .= " ( ";
$sql .= " SELECT SUM(total) as total,SUM(tot_pv) as tot_pv  FROM ali_asaleh ";
$sql .= "    WHERE ".$whereho." ";
$sql .= " UNION ALL ";
$sql .= " SELECT SUM(total) as total,SUM(tot_pv) as tot_pv    FROM ali_holdhead";
$sql .= "    WHERE ".$whereho."  ";
$sql .= " ) as tb ";
$sql .= " ";
                  
$rs = mysql_query($sql);
$num =  mysql_num_rows($rs);
if(mysql_num_rows($rs) > 0)
{   
    $row = mysql_fetch_object($rs);
    $total_notpv = $row->total;               
    
}  
////////////// A /////////////

////////////// A  NOT PV ค่าจัดส่ง/////////////        
$whereah = "ah.sa_type <> 'H' and ah.cancel = 0  and ah.sadate>= '$strfdate'  and ah.sadate <= '$strtdate' and ad.pv =0 and ad.pcode LIKE '%SE%' ";    
$whereho = "hh.sa_type <> 'H' and hh.cancel = 0 and hh.tot_pv > 0 and hh.sadate>= '$strfdate'  and hh.sadate <= '$strtdate' and hd.pv =0 and hd.pcode LIKE '%SE%' ";    
$sql = " SELECT ifnull(SUM(total),0) as total,ifnull(SUM(tot_pv),0) as tot_pv FROM  ";
$sql .= " ( ";
$sql .= " SELECT SUM(ad.price*ad.qty) as total,SUM(ad.pv*ad.qty) as tot_pv  FROM ali_asaleh ah ";
$sql .= " LEFT JOIN ali_asaled ad ON (ah.id=ad.sano)";
$sql .= "    WHERE ".$whereah." ";
$sql .= " UNION ALL ";
$sql .= " SELECT SUM(hd.price*hd.qty) as total,SUM(hd.pv*hd.qty) as tot_pv    FROM ali_holdhead hh";
$sql .= " LEFT JOIN ali_holddesc hd ON (hh.id=hd.hono)";
$sql .= "    WHERE ".$whereho."  ";
$sql .= " ) as tb ";
$sql .= " ";
//echo $sql;
                  
$rs = mysql_query($sql);
$num =  mysql_num_rows($rs);
if(mysql_num_rows($rs) > 0)
{   
    $row = mysql_fetch_object($rs);
    $total_send = $row->total;               
    
}  
////////////// A /////////////

////////////// B /////////////        
$where = "(sa_type = 'Q' or sa_type= 'Z') and cancel = 0 and tot_pv > 0 and sadate>= '$strfdate'  and sadate <= '$strtdate' ";    
$sql = " SELECT ifnull(SUM(total),0) as total,ifnull(SUM(tot_pv),0) as tot_pv FROM  ";
$sql .= " ( ";
$sql .= " SELECT SUM(total) as total,SUM(tot_pv) as tot_pv  FROM ali_asaleh ";
$sql .= "    WHERE ".$where."  ";
$sql .= " UNION ALL ";
$sql .= " SELECT SUM(total) as total,SUM(tot_pv) as tot_pv    FROM ali_holdhead ";
$sql .= "    WHERE ".$where."  ";
$sql .= " ) as tb ";
$sql .= " ";
//echo $sql;                      
$rs = mysql_query($sql);
$num =  mysql_num_rows($rs);
if(mysql_num_rows($rs) > 0)
{   
    $row = mysql_fetch_object($rs);
    $total_b = $row->total;         
    $tot_pv_b = $row->tot_pv;         
    
}  
////////////// END B /////////////

?>
        
<center>		
<fieldset style="width:100px;display:none;"><a href='index.php?sessiontab=5&sub=11&print_all=true&fdate=<?=$strfdate?>&tdate=<?=$strtdate?>' target='_blank'>
<img border='0' src='./images/Amber-Printer.gif'> พิมพ์ทั้งหมด</a></fieldset>
</center>
<table width="100%" cellpadding="2" cellspacing="2" border="1">
  <tr>
    <td align="center"><font color="#FF00FF" size="3">&nbsp;รายได้ A(มี pv)&nbsp;</font></td>
    <td align="center"><font color="#FF00FF" size="3">&nbsp;ยอดขาย(ไม่มี pv)&nbsp;</font></td>
    <td align="center"><font color="#FF00FF" size="3">&nbsp;ยอดขายค่าจัดส่ง&nbsp;</font></td>
    <td align="center"><font  size="3" color="#00CC00">&nbsp;คะแนน(PV)&nbsp;</font></td>      
  </tr>
  <tr>
    <td align="center"><font color="#FF00FF" size="5">&nbsp;<?echo number_format($total,0);?>&nbsp;</font></td>
    <td align="center"><font color="#FF00FF" size="5">&nbsp;<?echo number_format($total_notpv,0);?>&nbsp;</font></td>
    <td align="center"><font color="#FF00FF" size="5">&nbsp;<?echo number_format($total_send,0);?>&nbsp;</font></td>
    <td align="center"><font color="#00CC00" size="5">&nbsp;<?echo number_format($tot_pv,0);?>&nbsp;</font></td>  
  </tr> 
</table>
<br />

<table width="100%" cellpadding="2" cellspacing="2" border="1">
  <tr><td>

    <table width="100%" cellpadding="2"> 
      <tr>
        <?php foreach($set_table_a as $set_tablex){?>  
          <td align="center"><font  size="3" color="#0000FF">&nbsp;<?echo $set_val[$set_tablex];?>&nbsp;</font></td> 
        <?}?>  
		<td  align="center"><font  size="3" color="#0000FF">รวม</font></td>
      </tr>
      <tr>
        <?php foreach($set_table_a as $set_tablex){?>
          <td align="center"><font  size="5" color="#0000FF">&nbsp;<?echo number_format($bonus[$set_tablex],2);?>&nbsp;</font></td> 
        <?}?> 
		<td align="center"><font  size="5" color="#0000FF">&nbsp;<?=number_format($bonus['All'],2)?></font></td>
      </tr>
    </table>

    <hr>
    <table width="100%" cellpadding="2"> 
      <tr>
	  <? if($total != 0){ ?>
        <td align="center"><font color="#FF00FF" size="5">&nbsp;<?echo number_format($bonus['All']*100/$total,2);?>&nbsp;%(บาท)</font></td>
        <td align="center"><font color="#00CC00" size="5">&nbsp;<?echo number_format($bonus['All']*100/$tot_pv,2);?>&nbsp;%(PV)</font></td>     
		<? }else{ ?>
		 <td align="center"><font color="#FF00FF" size="5">&nbsp;<?echo number_format(0,2);?>&nbsp;%</font></td>
        <td align="center"><font color="#00CC00" size="5">&nbsp;<?echo number_format(0,2);?>&nbsp;%</font></td>    

		<? } ?>
      </tr> 
    </table>
  </td></tr>
</table>  
     
<br />
<!--table width="100%" cellpadding="2" cellspacing="2" border="1" >
  <tr>
    <td align="center" ><font color="#FF00FF" size="3">&nbsp;รายได้ B&nbsp;</font></td>
    <td align="center"><font color="#FF00FF" size="3">&nbsp;Uni - level&nbsp;</font></td>
	
    <td align="center" rowspan="2"><font color="#FF00FF" size="5">&nbsp;<?echo number_format($tot_pv_b,0);?>&nbsp;%(บาท)</font></td>  
  </tr>
  <tr>
    <td align="center"><font color="#FF00FF" size="5">&nbsp;<?echo number_format($total_b,0);?>&nbsp;</font></td>
    <td align="center"><font color="#FF00FF" size="5">&nbsp;<?echo number_format($total_b,0);?>&nbsp;</font></td>
  </tr> 
</table>
<br />

<table width="100%" cellpadding="2" cellspacing="2" border="1" style="display:none">
  <tr><td>
    <table width="100%" cellpadding="2"> 
      <tr>
        <?php foreach($set_table_b as $set_tablex){?>  
          <td align="center"><font  size="3" color="#0000FF">&nbsp;<?echo $set_val[$set_tablex];?>&nbsp;</font></td> 
        <?}?>  
      </tr>
      <tr>
        <?php foreach($set_table_b as $set_tablex){?>
          <td align="center"><font  size="5" color="#0000FF">&nbsp;<?echo number_format($bonus2[$set_tablex],2);?>&nbsp;</font></td> 
        <?}?>  
      </tr>
    </table>
    <hr>
    <table width="100%" cellpadding="2"> 
      <tr>
	  <? if($total_b != 0){ ?>
        <td align="center"><font color="#FF00FF" size="5">&nbsp;<?echo number_format($bonus2['All']*100/$total_b,2);?>&nbsp;%</font></td>
        <td align="center"><font color="#00CC00" size="5">&nbsp;<?echo number_format($bonus2['All']*100/$tot_pv_b,2);?>&nbsp;%</font></td>    
		<? }else{ ?>
		<td align="center"><font color="#FF00FF" size="5">&nbsp;<?echo number_format(0,2);?>&nbsp;%</font></td>
        <td align="center"><font color="#00CC00" size="5">&nbsp;<?echo number_format(0,2);?>&nbsp;%</font></td> 
		<? } ?>
      </tr> 
    </table-->
  </td></tr>
</table>  
<? 
$time_end = getmicrotime();
$time = $time_end - $time_start;
echo '<br/><center>';
echo "สิ้นสุดการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR>";
echo '</center>';
}

 function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 

  
////////////////////////////////////
function getAllBonusxx($mcode='',$set_table,$fdate='',$tdate=''){
    if($fdate){
        $whereclass = " and fdate>= '$fdate' and tdate<= '$tdate' ";  
        $whereclass2 = " AND fdate>= '$fpdate' and tdate<= '$tpdate' ";  
    }
    
    if($mcode){  
         $wheremcode = " and  mcode = '".$mcode."' ";       
    }
   
    $thismonth = explode('-',$fdate);   
       ///// SET   TABLE 
     
     foreach($set_table as $key => $val){ 
        $num = count($set_table)-1  ;   
        foreach($set_table as $keyx => $valx){ 
             if($val == $valx)$sqlz[$key] .= ",sum(total) as $valx ";
             else $sqlz[$key] .= ",'0' as $valx "; 
        } 
        if($key == '0')$sqlx = "( ";
        $sqlx .= " SELECT mcode ".$sqlz[$key]."  FROM ali_".$val." ";
        $sqlx .= " WHERE total > 0 ".$whereclass." ".$wheremcode." ";
        if($mcode)$sqlx .= " GROUP BY mcode ";
        if($key != $num )$sqlx .= " UNION ALL "; 
        else $sqlx .= " ) as tb";
        $sqlxx .= ",SUM(tb.$val) as $val";
     }
        $sql2  = " SELECT tb.mcode".$sqlxx." ";  
        if($mcode)$sql2 .= " ,m.pos_cur,m.pos_cur2,m.name_t ";  
        $sql2 .= " FROM  ";  
        $sql2 .= $sqlx;  
        if($mcode){
           $sql2 .= " LEFT JOIN ali_member m ON(m.mcode = tb.mcode) ";
           $sql2 .= " GROUP BY mcode "; 
        }
      	// echo $sql2;
        $rs2 = mysql_query($sql2);
        if(mysql_num_rows($rs2) > 0){
            $object = mysql_fetch_object($rs2);  
            if($mcode){
                $bonus['mcode'] = $object->mcode;
                $bonus['pos_cur'] = $object->pos_cur;
                $bonus['pos_cur2'] = $object->pos_cur2;
                $bonus['name_t'] = $object->name_t;
            }
            
            foreach($set_table as $keyx => $valx){  
                 $bonus[$valx] = $object->$valx;
                 $bonus['All'] = $bonus['All']+$object->$valx;   
            }
        }
        else{
            foreach($set_table as $keyx => $valx){                
                $bonus[$valx] = 0;
                $bonus['All'] = 0; 
            }
        }
    return $bonus;
}  

?>