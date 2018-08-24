<? 
//exit;
session_start();
require("connectmysql.php");
$dbprefix = 'ali_' ;
$autocal = $_GET['autocal'];
$sql = "SELECT * FROM ".$dbprefix."around WHERE 1=1 order by rcode desc limit 0,1";
         
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
    $sqlObj = mysql_fetch_object($rs);
    $rcode =$sqlObj->rcode;    
    $rcode++;
    $fpdate =$sqlObj->fpdate;    
    $tpdate =$sqlObj->tpdate;    
    $fdate =$sqlObj->fdate;    
    $fdate =strftime("%Y-%m-%d", strtotime("$fdate +1 day")); 
    $tdate =$sqlObj->tdate;    
    $tdate =strftime("%Y-%m-%d", strtotime("$tdate +1 day")); 
    $split = explode('-',$fdate);
    
    if($split["2"] == '01'){
        $fpdate = strftime("%Y-%m-%d", strtotime("$fpdate +1 month")); 
        $ffpdate = strftime("%Y-%m-%d", strtotime("$fpdate +1 month")); 
        $tpdate = strftime("%Y-%m-%d", strtotime("$ffpdate -1 day")); 
    }
    $rdate = date("Y-m-d");
    //if($rdate == $fdate)echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=1'</script>";
    $calc = "";
    //echo $fdate.' '.$tdate.' '.$nfdate.' '.$ntdate;

    $sql="select * from ".$dbprefix."around where  calc =''  ";
    $result=mysql_query($sql);
 
        if (mysql_num_rows($result)<=0) {
        $sql="insert into ".$dbprefix."around (rcode,  rdate, fdate,  tdate,paydate,  calc,remark,fpdate,  tpdate) values ('$rcode' ,'$rdate' ,'$fdate' ,'$tdate' ,'$paydate' ,'$calc' ,'$remark' ,'$fpdate' ,'$tpdate') ";
   
        if (! mysql_query($sql)) {
            echo "<font color='#FF0000'>error</font><br>";
        //   
        }else {
            //logtext(true,$_SESSION['adminuserid'],$sql);
            mysql_query("COMMIT");
            ob_end_clean();
            //include "mem_main.php";
            //echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=1'</script>";    
        }
    }    
}


    $today = date('Y-m-d');
    $yesterday  = date("Y-m-d",strtotime("-1 days",strtotime($today)));
    $sql="select * from ".$dbprefix."around where  calc ='1' order by rcode desc limit 0,1 ";
    $result=mysql_query($sql);
    if (mysql_num_rows($result)>'0') {
        $row= mysql_fetch_array($result, MYSQL_ASSOC);
        $rcode=$row["rcode"];
    }    
    $rcode = $rcode+1;
    $sql="select * from ".$dbprefix."around where  rcode ='$rcode' order by rcode desc limit 0,1 ";
    $result=mysql_query($sql);
        if (mysql_num_rows($result)>'0') {
        $row= mysql_fetch_array($result, MYSQL_ASSOC);
        $ro=$row["rcode"];
        $tdate=$row["tdate"];
        $fdate=$row["fdate"];
        $status = true;
        }
        else
        {
        $status = false;
        }
?>


<?
echo $status.' rcode :'.$ro.'  fdate : '.$tdate.' tdate : '.$fdate.' today : '.$today ; 

#######################
###                    ###
###                    ###
###        AU_TO        ###
###                    ###
###                    ###
#######################
?>


<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>
<? include("comsn/com_a/comsn_a_calc_func.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php");
   require_once("gencode.php"); 
?>
<?
set_time_limit( 0);
ini_set("memory_limit","1024M");
ob_start();

if($status == true and $tdate<$today and $autocal==1){ ?>
<br />
<table width="95%" border="0" align="center">
  <tr>
    <td align="center">
    <?
         
$step="1";
$time_start = getmicrotime();
echo "เริ่มการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน around<BR>";
//$text="uid=".$_SESSION["adminuserid"]." action=binary calc rcode=$ftrc[0]-$ftrc[1]";
////writelogfile($text);

    $sql="select * from ".$dbprefix."around where  rcode='".$ro."'  ";
    $result=mysql_query($sql);
    if (mysql_num_rows($result)>'0') {
        $row= mysql_fetch_array($result, MYSQL_ASSOC);
        $fsano=$row["fsano"];
        $tsano=$row["tsano"];
        $tdate=$row["tdate"];
        $fdate=$row["fdate"];
        $rdate=$row["rdate"];
        $fpdate=$row["fpdate"];
        $tpdate=$row["tpdate"];
        $paydate=$row["paydate"];        
        echo "<BR><BR>คำนวณโบนัสรอบที่ RO=$ro<BR>";

        /////////// delete ////////////////////


      /*  del_cals($dbprefix,$ro,array('apv','ac','ambonus'));
        del_cals($dbprefix,$ro,array('apv2','ac2','ambonus2'));
        del_cals($dbprefix,$ro,array('bm','bmbonus'));
        //del_cals($dbprefix,$xrcode,array('fm','fc','fmbonus')); 
        del_cals($dbprefix,$ro,array('commission')); 
        del('ali_cnt_bm'," 1=1 ");
     
        return_ewallet($dbprefix,'eatoship',$ro,$xfdate);  
        //return_ewallet($dbprefix,'voucher',$ro,$fdate);  
        return_pos($dbprefix,$ro,'calc_poschange2','pos_cur2');   
        del_cals($dbprefix,$ro,array('calc_poschange2'));              
 
        /////////// delete ////////////////////
     
        /////////////////////// Function ////////////////////////////////////
        fnc_calc_fast_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);      //ค่าแนะนำ
        fnc_calc_fast_bonus2($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate); // ค่าลิขสิทธิ์
        fnc_calc_b_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);      //จับคู่
        //fnc_calc_invent($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);//ค่าคีย์
        fnc_autoship_bonus($dbprefix,$ro,$fdate,$tdate,$fdate,$tdate);    
        position($dbprefix,$ro,$fdate,$tdate);	 */


        $sqlVIP = " select txtCommission as pv,mcode,sano,sadate from ali_voucher  where  sadate ='$lastmonth' and  txtCommission >0 and cancel = '0' ";
		$rsVIP = mysql_query($sqlVIP) or die(mysql_error());
		for($i=0;$i<mysql_num_rows($rsVIP);$i++){
			$sqlObj = mysql_fetch_object($rsVIP);
			$pv =$sqlObj->pv;		
			$mcode_vip =$sqlObj->mcode;	
			$sano =$sqlObj->sano;	
			$sadate =$sqlObj->sadate;               
            
			$sql = " update ".$dbprefix."member set eatoship = eatoship + '$pv' where mcode = '$mcode_vip'  ";
			mysql_query($sql) or die(mysql_error());
			log_ewallet('eatoship',$mcode_vip,$sano,$pv,'CI',$sadate,'recom');   
			
			$data =  get_detail_meber($mcode_vip,$sadate); 
			$voucher = $data['voucher']-$pv;   
			$updatexx = array( 'voucher' => $voucher );
			update('ali_member',$updatexx," mcode ='$mcode_vip' "); 
			log_ewallet('voucher',$mcode_vip,$sano,$pv,'CO',$sadate,'recom');   
			$update = array( '_option' => 'recom' );
			update('ali_log_eatoship',$update," sano ='$sano' ");     
			$update = array( '_option' => 'recom' );
			update('ali_log_voucher',$update," sano ='$sano' "); 
		} 
        
	    $update1 = array( 'cancel' => '1' );
        update('ali_voucher',$update1," sadate ='$lastmonth' and  txtCommission >0 ");  

        $xaround = array( 'calc' => '',
                                  'calc_date' => "0000-00-00 00:00:00"
                                );
        update('ali_bround',$xaround," tdate='$lastmonth' ");    
        
		//////////////////////////// delete b ////////////////////////////
  
        $sql2 = " select * from ".$dbprefix."around where rcode >= '$ro' order by rid desc ";
        $rs12 = mysql_query($sql2);
        if (mysql_num_rows($rs12)>0) {
            for($x=0;$x<mysql_num_rows($rs12);$x++){
                $sqlObj = mysql_fetch_object($rs12);
                $xrcode =$sqlObj->rcode;        
                $xcalc =$sqlObj->calc;        
                $xfdate =$sqlObj->fdate;    
                $xtdate =$sqlObj->tdate;                             
                
                del_cals($dbprefix,$xrcode,array('apv','ac','ambonus'));      /// FAST
				del_cals($dbprefix,$xrcode,array('apv2','ac2','ambonus2'));     /// UNI LEVEL
                del_cals($dbprefix,$xrcode,array('bm','bmbonus'));           /// W/S
                //del_cals($dbprefix,$xrcode,array('fc','fmbonus'));           /// ค่าคีย์
                del_cals($dbprefix,$xrcode,array('commission'));  
                return_ewallet($dbprefix,'eatoship',$xrcode,$xtdate,'A');       
  		 
                $xaround = array( 'calc' => '',
                                  'calc_date' => "0000-00-00 00:00:00"
                                );
                update('ali_around',$xaround," rcode='$xrcode' "); 
            } 
        }     
        fnc_calc_fast_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);      //ค่าแนะนำ   
        fnc_calc_fast_bonus2($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate); // ค่าลิขสิทธิ์
        fnc_calc_b_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);      //จับคู่ 
     //   fnc_calc_invent($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);//ค่าคีย์
        fnc_autoship_bonus($dbprefix,$ro,$fdate,$tdate,$fdate,$tdate);    


        /////////////////////// Function ////////////////////////////////////
          
        if($autocal==1){ 
            $times = date("Y-m-d H:i:s");
            $sql="INSERT INTO  ali_autocals(time,status)VALUES ('$times','1')";
            mysql_query($sql);
        }
        
        $time_end = getmicrotime();
        $time = $time_end - $time_start;

        $sql="update ".$dbprefix."around set calc='1',calc_date = '".date("Y-m-d H:i:s")."',timequery = '".$time."' where rcode='$ro' ";
        if(mysql_query($sql)){
            mysql_query("COMMIT");
        }else{
            echo "error $sql<BR>";
        }

        $sql="update ".$dbprefix."global set statusformat ='open' ";
        mysql_query($sql);
        ///////////////////////////////////////////////////////////////////////
    }
    mysql_free_result($result);


echo "สิ้นสุดการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR>";
    ?>
</td>
</tr>
</table>
<br />
    <?
}//end else
 