<?php
$pos_piority = array('VIP'=>3,'PRO'=>2,'DIS'=>1,'MB'=>0);
$pos_exp = array('VIP'=>2800,'PRO'=>800,'DIS'=>400,'MB'=>0);
$array_mpos_cls = array('VIP'=>300,'PRO'=>300,'DIS'=>300,'MB'=>0);
$montharry = array('01'=>'ม.ค.','02'=> 'ก.พ.','03' => 'ม.ค', '04' => 'เม.ย', '05' => 'พ.ค.', '06' => 'มิ.ย.', '07' => 'ก.ค.', '08' => 'ส.ค.', '09' => 'ก.ย.', '10' => 'ต.ค.', '11' => 'พ.ย.', '12' => 'ธ.ค.' );
$montharry_EN = array('01'=>'January','02'=> 'February','03' => 'March', '04' => 'April', '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August', '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December' );
$member_qualify = array('TH0000001');
/*$host = explode('www.',$_SERVER['SERVER_NAME']);
$URL = explode('/',$_SERVER['REQUEST_URI']);
$actual_link = "http://".$host[0]."/".$URL[1]."/"; */

$host = $_SERVER['HTTP_HOST'];
$URL = explode('/',$_SERVER['REQUEST_URI']);
if($URL[1][0] == '~')$URL[1] = $URL[1].'/';
else $URL[1] = '';
$actual_link = "http://".$host."/".$URL[1];

class product
{
    static function get_productInPackage($pcode)
    {
        $data= array();
        //$data= query(' *','ali_product_package1',"package = '{$pcode}'"); 
		//var_dump($data);
		$sql="SELECT * FROM ali_product_package1 where package = '{$pcode}'";
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs) > 0)
        {
			for ($i = 0; $i < mysql_num_rows($rs); $i++) {
				$sqlObj = mysql_fetch_object($rs);
				$data[$i]['id'] = $sqlObj->id; 
				$data[$i]['package'] = $sqlObj->package; 
				$data[$i]['pcode'] = $sqlObj->pcode; 
				$data[$i]['pdesc'] = iconv( 'TIS-620', 'UTF-8',$sqlObj->pdesc); 
				$data[$i]['qty'] = $sqlObj->qty; 
			}
		}
        return $data;
	}
	

    static function get_productbymcode($pcode,$qty='',$mcode)
    {

		$statusm='';
		$sql="SELECT * FROM ali_member where mcode = '{$mcode}'";
        $rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0)
        {
			$sqlObj = mysql_fetch_object($rs);
			$lr = $sqlObj->lr; 
			if($lr.""==""){
				$statusm="1";
			}else{
				$statusm="0";
			}
		}

		// echo($statusm);
		// exit;

	

        $data= array();
        $sql="SELECT * FROM ali_product where pcode = '{$pcode}'";
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs) > 0)
        {
            $sqlObj = mysql_fetch_object($rs);
          //  $data['id'] = $sqlObj->id; 
            $data['pcode'] = $sqlObj->pcode; 
			$data['pdesc'] = iconv( 'TIS-620', 'UTF-8',$sqlObj->pdesc); 
			
			if($statusm=="1"){
				$data['price'] = $sqlObj->customer_price; 
			}else{
				$data['price'] = $sqlObj->price; 
			}
			
			
            $data['bprice'] = $sqlObj->bprice; 
            $data['weight'] = $sqlObj->weight; 
            $data['pv'] = $sqlObj->pv; 
            $data['amt'] = $sqlObj->pv; 
            $data['qty'] = $qty; 
            $data['type'] = 'product'; 
        }else{
            $sql="SELECT * FROM ali_product_package where pcode = '{$pcode}'";
            $rs = mysql_query($sql);
            if(mysql_num_rows($rs) > 0)
            {
                $sqlObj = mysql_fetch_object($rs);
              //  $data['id'] = $sqlObj->id; 
                $data['pcode'] = $sqlObj->pcode; 
                $data['pdesc'] = iconv( 'TIS-620', 'UTF-8',$sqlObj->pdesc); 
				//$data['price'] = $sqlObj->price; 
				
				if($statusm=="1"){
					$data['price'] = $sqlObj->customer_price; 
				}else{
					$data['price'] = $sqlObj->price; 
				}

                $data['bprice'] = $sqlObj->bprice; 
                $data['weight'] = $sqlObj->weight; 
                $data['pv'] = $sqlObj->pv; 
                $data['amt'] = $sqlObj->pv; 
                $data['qty'] = $qty; 
                $data['type'] = 'package'; 
            }
        } 
        return $data;
    }  



    static function get_product($pcode,$qty='')
    {
        $data= array();
        $sql="SELECT * FROM ali_product where pcode = '{$pcode}'";
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs) > 0)
        {
            $sqlObj = mysql_fetch_object($rs);
          //  $data['id'] = $sqlObj->id; 
            $data['pcode'] = $sqlObj->pcode; 
            $data['pdesc'] = iconv( 'TIS-620', 'UTF-8',$sqlObj->pdesc); 
            $data['price'] = $sqlObj->price; 
            $data['bprice'] = $sqlObj->bprice; 
            $data['weight'] = $sqlObj->weight; 
            $data['pv'] = $sqlObj->pv; 
            $data['amt'] = $sqlObj->pv; 
            $data['qty'] = $qty; 
            $data['type'] = 'product'; 
        }else{
            $sql="SELECT * FROM ali_product_package where pcode = '{$pcode}'";
            $rs = mysql_query($sql);
            if(mysql_num_rows($rs) > 0)
            {
                $sqlObj = mysql_fetch_object($rs);
              //  $data['id'] = $sqlObj->id; 
                $data['pcode'] = $sqlObj->pcode; 
                $data['pdesc'] = iconv( 'TIS-620', 'UTF-8',$sqlObj->pdesc); 
                $data['price'] = $sqlObj->price; 
                $data['bprice'] = $sqlObj->bprice; 
                $data['weight'] = $sqlObj->weight; 
                $data['pv'] = $sqlObj->pv; 
                $data['amt'] = $sqlObj->pv; 
                $data['qty'] = $qty; 
                $data['type'] = 'package'; 
            }
        } 
        return $data;
    }  
} 
class hold
{
    
    
    static function getBill($id)
    {
        $data= array();
        $data= query('*','ali_asaleh',"id = '{$id}'");
        return $data;
    }
    
    static function get_productInBill($id)
    {
        $data= array();
        $data= query(' *','ali_asaled',"sano = '{$id}'");
        return $data;
    }
    
    static function get_product($id,$qty='')
    {
        $data= array();
        $sql="SELECT * FROM ali_asaled where id = '{$id}'";
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs) > 0)
        {
            $sqlObj = mysql_fetch_object($rs); 
            $data['pcode'] = $sqlObj->pcode; 
            $data['pdesc'] = $sqlObj->pdesc; 
            $data['price'] = $sqlObj->price; 
            $data['bprice'] = $sqlObj->bprice; 
            $data['weight'] = $sqlObj->weight; 
            $data['pv'] = $sqlObj->pv; 
            $data['amt'] = $sqlObj->pv; 
            $data['qty'] = $qty; 
            $data['type'] = 'product'; 
        } 
        return $data;
    }  
} 
 
  
function genCartPcode($pcode,$array=''){
      if(count($array)){
         $num = count($array);   
      }else{
          $num =0;
      }
     
      $genpcode = $num.'-'.$pcode;
      return $genpcode;
      
}


class locationbase { 
    static function get_location($location){    
        $sql = "select * from ali_location_base where cid = '$location'";   
        $rs = mysql_query($sql);    
        $num =  mysql_num_rows($rs); 
        if(mysql_num_rows($rs) > 0)
        {
            $sqlObj = mysql_fetch_object($rs);
            $data['cid'] =$sqlObj->cid;        
            $data['cshort'] =$sqlObj->cshort;        
            $data['crate'] =$sqlObj->crate;        
            $data['main_inv_code'] =$sqlObj->main_inv_code;        
            $data['pcode_register'] =$sqlObj->pcode_register;         
            $data['basecharge'] =$sqlObj->basecharge;         
        }
        return $data;
    }
    
    static  function get_product($pcode,$qty='')
    {
        $data= array();
        $sql="SELECT * FROM ali_product where pcode = '{$pcode}'";
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs) > 0)
        {
            $sqlObj = mysql_fetch_object($rs);
          //  $data['id'] = $sqlObj->id; 
            $data['pcode'] = $sqlObj->pcode; 
            $data['pdesc'] = $sqlObj->pdesc; 
            $data['price'] = $sqlObj->price; 
            $data['bprice'] = $sqlObj->bprice; 
            $data['weight'] = $sqlObj->weight; 
            $data['pv'] = $sqlObj->pv; 
            $data['vat'] = $sqlObj->vat; 
            $data['qty'] = $qty; 
            
            $sending = query('*',"ali_sending"," `overweight-pcode` ='{$pcode}'" );
            if(count($sending)){
                $data['type'] = 'sending'; 
            }else{
                $data['type'] = 'product'; 
            }
           
        }else{
            $sql="SELECT * FROM ali_product_package where pcode = '{$pcode}'";
            $rs = mysql_query($sql);
            if(mysql_num_rows($rs) > 0)
            {
                $sqlObj = mysql_fetch_object($rs);
              //  $data['id'] = $sqlObj->id; 
                $data['pcode'] = $sqlObj->pcode; 
                $data['pdesc'] = $sqlObj->pdesc; 
                $data['price'] = $sqlObj->price; 
                $data['bprice'] = $sqlObj->bprice; 
                $data['weight'] = $sqlObj->weight; 
                $data['pv'] = $sqlObj->pv; 
                $data['vat'] = $sqlObj->vat; 
                $data['qty'] = $qty; 
                $data['type'] = 'package'; 
            }
        } 
        return $data;
    }  
    
}




function query($string,$tabel,$where,$join=''){
    $sql="SELECT $string FROM $tabel $join WHERE $where ";  
 // echo $sql,'<br>';
    $objQuery = mysql_query($sql);  
    $resultArray =array();
    $intNumField = mysql_num_fields($objQuery);
    while ($obResult = mysql_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i++) {
            $data[mysql_field_name($objQuery, $i)] = $obResult[$i];    
        }
        array_push($resultArray, $data);    
     }  
    return  $resultArray;
}


function searchForId($pcode,$array) {
   foreach ($array as $key => $val) {
       if ($val['pcode'] === $pcode) {
           return $key;
       }
   }
   return -1;
}

function send_email_register2($strTo,$name_f,$name_t,$mcode){	
	
	$subject = "ยินดีต้อนรับสู่ Champ of Champ Innovation จำกัด";
	$strHeader = "From: info@cci2016.net";

	$body = " ยินดีต้อนรับสู่ Champ of Champ Innovation จำกัด";
	$body .= "<br><br> รหัสสมาชิกของคุณคือ : $mcode ";
	$body .= "<br> ชื่อผู้สมัครหลัก : $name_f $name_t";
	$body .= "<br> รหัสผ่านสำหรับเข้าระบบ Online : คือ 4 ตัวท้ายของหมายเลขบัตรประชาชนของผู้สมัครหลัก  ";
	$body .= "<br><br> ท่านสามารถเข้าสู่ระบบ Champ of Champ Innovation Online Member Service เพื่อสั่งซื้อสินค้า,สมัครสมาชิกใหม่,เช็คโบนัส หรือดูแลองค์กรของท่านได้ที่ ";
	$body .= "<br> <a href='http://203.146.170.60/~cci/member'>Champ of Champ Innovation System</a>";

	$from='info@cci2016.net';      
	$headersfrom='';
	$headersfrom .= 'MIME-Version: 1.0' . "\r\n";
	$headersfrom .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headersfrom .= 'From: '.$from.' '. "\r\n";
	$send = @mail($strTo,$subject,$body,$headersfrom);

	if(!$send) {
		echo "Mailer Error ";
		return false;
	} else {
		//echo "Message sent!";
		return true;
	}
	
}

function send_email_register($strTo,$name_f,$name_t,$mcode){	
	
	error_reporting(0);

	require("mail/class.phpmailer.php");
	require_once 'mail/PHPMailerAutoload.php';

	$mail = new PHPMailer();

	$body = " ยินดีต้อนรับสู่ Champ of Champ Innovation จำกัด";
	$body .= "<br><br> รหัสสมาชิกของคุณคือ : $mcode ";
	$body .= "<br> ชื่อผู้สมัครหลัก : $name_f $name_t";
	$body .= "<br> รหัสผ่านสำหรับเข้าระบบ Online : คือ 4 ตัวท้ายของหมายเลขบัตรประชาชนของผู้สมัครหลัก  ";
	$body .= "<br><br> ท่านสามารถเข้าสู่ระบบ Champ of Champ Innovation Online Member Service เพื่อสั่งซื้อสินค้า,สมัครสมาชิกใหม่,เช็คโบนัส หรือดูแลองค์กรของท่านได้ที่ ";
	$body .= "<br> <a href='http://203.146.170.60/~cci/member'>Champ of Champ Innovation System</a>";

	$mail->CharSet = "tis-620";
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->Host = "mail.omc.co.th"; 
	$mail->Port = 25; 
	$mail->Username = "smtp@omc.co.th"; 
	$mail->Password = "smtp123"; 

	$mail->SetFrom("info@cci2016.net", "Champ of Champ Innovation");
	$mail->AddReplyTo("info@cci2016.net", "Champ of Champ Innovation");
	$mail->Subject = "Welcome to Champ of Champ Innovation Co.,Ltd";

	$mail->MsgHTML($body);
	$mail->AddAddress("smtp@omc.co.th", "no-reply");
	$mail->AddAddress($strTo, $name_t); 
	$mail->AddAddress("smtp@omc.co.th", "no-reply");
	if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		//echo "Message sent!";
	}
	return true;
}

function check_last_member(){      
    ////////////////////////////////////////////////////////////////////  
     $dbprefix='ali_';
     $upa_code = 'sp_code2';
     $priority = 'id';
     $lr = 'lr';    
     //////////////////////  find last member //////////////////////////
     $sql33="select t1.mcode,t1.name_t
          from ".$dbprefix."member t1
          left join ali_member t2 on (t1.mcode = t2.".$upa_code.")     
          group by t1.mcode having count(*) <=1
          order by t1.".$priority." 
          limit 0,1 ";   
    $rs33 = mysql_query($sql33);   
    //echo $sql33,'<br>'; 
    if (mysql_num_rows($rs33)>0) {  
        $sqlObj33 = mysql_fetch_object($rs33);
        $mcode1 =$sqlObj33->mcode;   
        //echo $mcode1,'<br>';     
    }
    return $mcode1;
    
}
function func_check_sale($dbprefix,$mcode,$tot_pv,$satype,$pos_cur,$sadate,$mtype)
{  
	global $array_mpos_cls;
  //  $q_bill = array('L'=>14000,'M'=>6000,'S'=>2000);
	//$q_bill = array('L'=>200000000,'M'=>200000000,'S'=>200000000);
	if (($satype == 'Q' or $satype == 'B') and $tot_pv < 500){

			echo "<script language='JavaScript'>alert('กรุณาซื้อรักษายอดขั้นต่ำ 500 pv'); window.history.back()</script>";	
			exit;
		} 
	
	 if ($satype == 'H' and $mtype1 == '0')
	 {
		echo "<script language='JavaScript'>alert('สมาชิกรหัส  ".$mcode." สั่งซื้อ Hold ไม่ได้');history.back();</script>";    
		exit;
	 }    
		 //echo $satype.' : '.$mtype;
		 //exit;
}


function fun_check_hold($dbprefix,$mcode,$satype,$mtype,$tot_pv){
	$max = 1500;
	if($mtype == 0){
	//	echo "<script language='JavaScript'>alert('สมาชิกรหัส  ".$mcode." สั่งซื้อ Hold ไม่ได้');history.back();</script>";	
	//	exit;
	}else{
	//$sql = "SELECT sano from ".$dbprefix."asaleh WHERE mcode='$mcode' and sa_type='H'";
	//$rs = mysql_query($sql);
	//if(mysql_num_rows($rs)<1 and $tot_pv < $max) {
		if($tot_pv < $max) {
	//	echo "<script language='JavaScript'>alert('สมาชิกรหัส  ".$mcode." สั่งซื้อ Hold จะต้องมี ".$max."PV ขึ้นไปเท่านั้น');history.back();</script>";	
	//	exit;
		}
	}
	
}
function gen_mcode(){
	$sql="SELECT LPAD(FLOOR(RAND() * 9999998)+1,7,'0') as new_mcode FROM ali_member WHERE 'mcode' NOT IN (SELECT mcode FROM ali_member WHERE mcode IS NOT NULL) LIMIT 1";
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$mcode = mysql_result($rs,0,'new_mcode');
	}
			$gencode=gencode($mcode);
		/*	do{
				$sql = "SELECT LPAD(FLOOR(RAND() * 1000000)+1,7,'0') as gcode ";
				$rs = mysql_query($sql);
				$mcode = mysql_result($rs,0,'gcode');
				$sqlcheck=" SELECT * FROM ali_member WHERE mcode = '$mcode'";
				//echo $sqlcheck;
				$result=mysql_query($sqlcheck);			
			}while(mysql_num_rows($result)>0 );*/
			return $gencode;
}


function hdate($mtype1){	
	if($mtype1 == 0)$limit = 30;
	else $limit = 90;
	$hdate = date('Y-m-d', strtotime("+$limit days"));
	return $hdate;	
}

function func_first_bill($dbprefix,$mcode){
$thisMonth=	thisMonth(date('Y-m-d'));
	////////// check 1st Bill /////////
 	$mexp = 0;
	$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and cancel=0 and sadate LIKE '%$thisMonth%' ";
	//echo "$sql <br>";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv'); 
	$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode."' and sa_type='A' and sadate LIKE '%$thisMonth%' and cancel=0 ";
	$rs = mysql_query($sql);
	$mexph = 0;
	if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
	mysql_free_result($rs);
	$mexp=($mexp+$mexph);
	////////// check 1st Bill ///////// 
	return $mexp;	
}


function fun_check_sale($dbprefix,$mcode,$tot_pv,$satype,$pos_cur,$sadate,$mdate){
	  /*if ($satype == 'Q'){
			$max = 1200;
			if($tot_pv > $max){
			//echo "<script language='JavaScript'>alert('รักษายอดล่วงหน้าได้  6 เดือนเท่านั้น  (".$max."PV)'); window.history.back()</script>";	
			//exit;
			}
			$mdate = explode("-",$sadate);
			$sql = "SELECT * from ".$dbprefix."status WHERE mdate LIKE '%".$mdate[0].'-'.$mdate[1]."%' AND mcode='$mcode' and status = '1'";
			$rs = mysql_query($sql);
			 
			if(mysql_num_rows($rs) >= 6 ) {
			//	echo "<script language='JavaScript'>alert('รักษายอดล่วงหน้าได้  6 เดือนเท่านั้น'); window.history.back()</script>";	
			//	exit;
			}
			//////// UPDATE status //////////////////
			//func_status($dbprefix,$mcode,$tot_pv,$sadate,$pos_cur);	
			//exit;	
		}*/
		
}

function func_status($dbprefix,$mcode,$tot_pv,$sadate,$pos_cur,$sano_x =""){ // 1500
    global $array_mpos_cls,$pos_piority,$ro,$sano,$hono,$commission,$recursive ; 
    $sano = ($sano != '' ? $sano : $hono);
    $sano = ($sano_x != '' ? $sano_x : $sano);
    
    //echo $sano,'     ** <br>';exit;
    //if($sanox != '' and $recursive == false)$sano = $sanox; // sanox fix bug cal_b
    /// setting ///
    $useRecursive = true; /// true or false
    $usePvb = false; /// true or false 
    $remain = check_count_status($mdate,$mcode,3) ;//// check รักษายอดสูงสูด 6 เดือน  return คงเหลือ
    /// setting ///
    $mdate = $sadate; // day of sale 
    $nextmonth = nextmonth($sadate);   
    if($pos_cur == '')$pos_cur = 'MB';
    
    if($pos_piority[$pos_cur] >= 1 and $remain >= 1) /// Not MB and remain status
    {
        ////////// find ///// last staus  
        $sql = "SELECT id,sano,pvb,status,month_pv,sdate,pv,mdate,rcode from ".$dbprefix."status WHERE  mcode='$mcode' order by sdate DESC LIMIT 0,1 ";
        
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs)>0) { /// yes
            $last_rcode = mysql_result($rs,0,'rcode');
            $last_sano = mysql_result($rs,0,'sano');
            $last_id = mysql_result($rs,0,'id');
            $last_pv = mysql_result($rs,0,'pv');
            $last_pvb = mysql_result($rs,0,'pvb');    
            $last_status = mysql_result($rs,0,'status');
            $last_month_pv = mysql_result($rs,0,'month_pv');
            $last_sadate = mysql_result($rs,0,'sdate');
            $last_mdate = mysql_result($rs,0,'mdate');
            $flg = 1;
        }else { // No
            $last_sadate = '';
            $last_pvb = 0;
            $flg = 0;
        } 
        
        if($recursive == true)$last_pvb=0;  
        
        if($usePvb == false){  
           if(nextmonth($last_sadate) > nextmonth($sadate))$last_pvb = 0; 
        } 
                    
        $allpv = $tot_pv+$last_pvb; 
        if($allpv >= $array_mpos_cls[$pos_cur]){ 
            $getPV = $array_mpos_cls[$pos_cur]; // use
            $getPVB = $allpv-$array_mpos_cls[$pos_cur]; // balance    
            $status = 1; ///  Qualified         
        }else{
            $getPV = 0; // use
            $getPVB = $allpv; // balance    
            $status = 0;
        }
        
      //  if($usePvb == false)$getPVB=0;
        
        $updatePvb = array("pvb"    => '0');
        $updateStatus = array("status"    => $status,"pv"    => $getPV,"pvb"    => $getPVB,);
        $insert = array(
            "rcode"        => $ro,
            "sano"         => $sano,
            "mcode"        => $mcode,
            "status"       => $status,
            "pv"           => $getPV, 
            "pvb"          => $getPVB, 
            "mpos"         => $pos_cur,
            "month_pv"     => $nextmonth, 
            "sdate"        => $sadate,  
            "mdate"        => $mdate,
            "satype"       => 'Q', 
        ); 
     
        if(nextmonth($last_sadate) >= nextmonth($sadate) and $commission == false){
            $sadate = date("Y-m-d",strtotime("first day of $last_sadate +1 month"));  
            $nextmonth = nextmonth($sadate);
            $insert["month_pv"] = $nextmonth; 
            $insert["sdate"] = $sadate;    
        }    
      
        if(mysql_num_rows($rs)>0){ ////have last
            if($last_status == 1){
                update('ali_status',$updatePvb,"mcode='".$mcode."' and id ='".$last_id."' ");    
                if($last_sano != $sano)update('ali_status',$updatePvb,"mcode='".$mcode."' and sano ='".$sano."' "); 
                
                $nextmonthx = nextmonth($mdate); 
                $sqlxx = "SELECT * from ali_status WHERE  mcode='$mcode' and  month_pv = '$nextmonthx' ";
              
                $rsxx = mysql_query($sqlxx);
                if(mysql_num_rows($rsxx)<=0){
                    $insert["month_pv"] = $nextmonthx; 
                    $insert["sdate"] = $mdate; 
                }else{
                    $sadate = date("Y-m-d",strtotime("first day of $last_sadate +1 month"));  
                    $nextmonth = nextmonth($sadate);
                    $insert["month_pv"] = $nextmonth; 
                    $insert["sdate"] = $sadate;    
                }
                insert('ali_status',$insert);   
            }else{
                if(nextmonth($mdate) > nextmonth($last_sadate)){
                    if($usePvb == true)update('ali_status',$updatePvb,"mcode='".$mcode."' and id ='".$last_id."' ");  
                    insert('ali_status',$insert);   
                }else{
                    update('ali_status',$updateStatus,"mcode='".$mcode."' and id ='".$last_id."' "); 
                }
            }
        }else{   
            insert('ali_status',$insert);      
        }
        
        if($getPVB >= $array_mpos_cls[$pos_cur]){ 
             $commission = false;
             $recursive = true;
             $sadate = date("Y-m-d",strtotime("first day of $sadate +1 month"));
             if($useRecursive == true)func_status($dbprefix,$mcode,$getPVB,$sadate,$pos_cur);
        }
    } 
}

function check_count_status($fdate,$mcode,$max){
    $sql_q="SELECT count(num) as num FROM (
            SELECT DISTINCT month_pv as num 
                FROM ali_status 
                WHERE mcode='".$mcode."' and month_pv >= '".thisMonth($fdate)."' and status='1'  and first_regis <> '1' 
                GROUP BY month_pv 
            ) as tb";                            
    $rsx = mysql_query($sql_q);    
    if(mysql_num_rows($rsx) > 0 ) {
        $obj = mysql_fetch_object($rsx);
        $num_old=$obj->num;
    } 
    if($num_old<$max){
        $remain = $max-$num_old;
    }else{
        $remain =0;
    }
  return $remain;
}


function func_first_register($mcode,$sadate){ // 1500
	$month=explode("-",$sadate);
	$fdate = date("Y-m-d",strtotime("first day of $sadate +1 month"));  
	$nextmonth = nextmonth($fdate); 
	$thismonth = $month[0].$month[1];
    $insert = array(
				"rcode"        => '0',
				"mcode"        => $mcode,
				"status"   	   => '1',
				"pv"           => 0, 
				"pvb"          => 0, 
				"month_pv"     => $thismonth, 
				"mpos"         => 'MB',
				"sdate"        => $sadate,   // 05 
				"mdate"        => $sadate,    //05
				"first_regis"  => '1',    
			);
	insert('ali_status',$insert);

	$insert1 = array(
				"rcode"        => '0',
				"mcode"        => $mcode,
				"status"   	   => '1',
				"pv"           => 0, 
				"pvb"          => 0, 
				"month_pv"     => $nextmonth, //06
				"mpos"         => 'MB',
				"sdate"        => $sadate,    
				"mdate"        => $sadate,   //05 
				"first_regis"  => '1',    
			);
	 insert('ali_status',$insert1);
	
	 $fdate = date("Y-m-d",strtotime("first day of $sadate +1 month"));     // 06            
     $next2month = nextmonth($fdate); // 07
	 
	 $insert2 = array(
				"rcode"        => '0',
				"mcode"        => $mcode,
				"status"   	   => '1',
				"pv"           => 0, 
				"pvb"          => 0, 
				"month_pv"     => $next2month, //06
				"mpos"         => 'MB',
				"sdate"        => $sadate,    
				"mdate"        => $sadate,   //05 
				"first_regis"  => '1',    
			);
	//insert('ali_status',$insert2);
}

function func_status_B($dbprefix,$mcode,$tot_pv,$sadate,$pos_cur){ // 1500
    global $array_mpos_cls ;
    $month=explode("-",$sadate);
    $thismonth = $month[0].'-'.$month[1];
    $thismonth1 = $month[0].$month[1];
   
    $sql = "SELECT * from ".$dbprefix."status WHERE  mcode='$mcode' and  month_pv = '$thismonth1' and status = '1' ";
    $rs = mysql_query($sql);
    if(mysql_num_rows($rs)>0) {        
        ////   already      
    }else{
         if($tot_pv >= $array_mpos_cls[$pos_cur]){                             
            $insert = array(
                "rcode"        => '0',
                "mcode"        => $mcode,
                "status"       => '1',
                "pv"           => $tot_pv, 
                "pvb"          => '0', 
                "month_pv"     => $thismonth1, 
                "mpos"         => $pos_cur,
                "sdate"        => $sadate,    
                "mdate"        => $sadate,
				"satype"       => 'B', 

             );
			 insert('ali_status',$insert);
         }
    }
}

function downdatePosB($dbprefix,$mcode,$cur_date,$tot_pv){   
    $month=explode("-",$cur_date);
    $thismonth = $month[0].'-'.$month[1];
    $thismonth1 = $month[0].$month[1];
    $nextmonth = nextmonth($cur_date);    
    del('ali_status',"mcode='".$mcode."' and month_pv ='".$thismonth1."'");  
     
    $where = "sadate LIKE '%".$thismonth."%'  and sa_type = 'B' and cancel = 0 and tot_pv > 0  and mcode = '".$mcode."' ";
    $sql  = " SELECT mcode,SUM(tot_pv) as tot_pv FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh ";
    $sql .= "    WHERE ".$where." GROUP BY mcode ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_holdhead ";
    $sql .= "    WHERE ".$where." GROUP BY mcode ";
    $sql .= " ) as tb ";
    $sql .= " GROUP BY mcode ";
     $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    $arr = array();
    if(mysql_num_rows($rs) > 0)
    {
        for($i=0;$i<$num;$i++)
        {
            $row = mysql_fetch_object($rs);
            $mcode = $row->mcode;
            $tot_pv = $row->tot_pv;    
            $mcode = $row->mcode;
            $sadate = $row->sadate;    
            $data =  get_detail_meber($mcode,$sadate);
            func_status_B('ali_',$mcode,$tot_pv,$sadate,$data['pos_cur']); 
        }
        
    }
}




function downdatePosQ($dbprefix,$mcode,$cur_date,$tot_pv,$sanox){
    global $recom;
    $month=explode("-",$cur_date);
    $thismonth = thisMonth($cur_date);
    $nextmonth = nextmonth($cur_date);    
    $thismonth2 = $month[0].'-'.$month[1].'-01';
    $check = query("sano","ali_status","mcode='{$mcode}' and sano ='{$sanox}' "); 
    del('ali_status',"mcode='".$mcode."' and sano ='".$sanox."'  "); 
    
    $close_function = true;
    if($recom == false){
        del('ali_status',"mcode='".$mcode."' and month_pv >='".$nextmonth."' and first_regis <> '1'  "); 
        $where = "(sa_type = 'A')  and cancel=0 and total >= 3000 and sadate >= '".$thismonth2."' and mcode = '".$mcode."'";
        $sql = " SELECT mcode,tot_pv as tot_pv,sadate,sano,sctime FROM  ";
        $sql .= " ( ";
        $sql .= " SELECT mcode,total as tot_pv,sadate,sano,sctime  FROM ali_asaleh ";
        $sql .= "    WHERE ".$where."  ";
        $sql .= " UNION ALL ";
        $sql .= " SELECT mcode,total as tot_pv,sadate,hono as sano,sctime  FROM ali_holdhead ";
        $sql .= "    WHERE ".$where." ";
        $sql .= " ) as tb ";    
        $sql .= " ORDER BY sctime ASC ";   
        $rs = mysql_query($sql);
        $num =  mysql_num_rows($rs);
        if(mysql_num_rows($rs) > 0)
        {
            for($i=0;$i<$num;$i++)
            {
                $row = mysql_fetch_object($rs);
                $mcode = $row->mcode;
                $tot_pv = $row->tot_pv;    
                $mcode = $row->mcode;
                $sano = $row->sano;
                $sadate = $row->sadate;    
                $data =  get_detail_meber($mcode,$sadate); 
                func_status('ali_',$mcode,$tot_pv,$sadate,$data['pos_cur'],$sano);        
            }
        }
    }  
} 

function nextmonth($sadate){
        $month=explode("-",$sadate);
        $thismonth = $month[0].$month[1]; //201410
        if($month[1] >= 12){
          $month_1 = $month[0]+1;
          $month_2 = '01';
          $nextmonth = $month_1.$month_2;

        }else if($month[1] >= 9){
          $month_1 = $month[0];
          $month_2 = $month[1]+1;
            $nextmonth = $month_1.$month_2;

        }else{
            $month_1 = $month[0];
            $month_2 = $month[1]+1;
            $month_2 = '0'.$month_2;
            $nextmonth = $month_1.$month_2;
        }
    return $thismonth; 
}

function forget_point($dbprefix,$sano) {
	$update ="delete from ".$dbprefix."bm1 where sano = '$sano' ";
	mysql_query($update);
}
 
function update_member_lr($dbprefix,$memberfreeid,$lrmcode,$lr=0){
	$update ="update ".$dbprefix."member set lr='$lr' where mcode='$memberfreeid'";
	// echo $update;
	// exit;
	mysql_query($update);

	$sql="select name_t from ".$dbprefix."member where mcode='$lrmcode'";
	$rs = mysql_query($sql);
	$num =  mysql_num_rows($rs);
	if(mysql_num_rows($rs) > 0)
	{
	 
			$row = mysql_fetch_object($rs);
			$fullname = $row->name_t;
	}

	$sql="update ".$dbprefix."member set upa_name='$fullname',upa_code='$lrmcode' where mcode='$memberfreeid'";
	// echo($sql);
	// exit;
	mysql_query($sql);

}

function fun_first_bill($dbprefix,$mcode){
	////////// check 1st Bill /////////
 	$mexp = 0;
	$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and cancel=0 ";
//	echo "$sql <br>";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv'); 
	$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode."' and sa_type='A' and cancel=0 ";
	$rs = mysql_query($sql);
	$mexph = 0;
	if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
	mysql_free_result($rs);
	$mexp=($mexp+$mexph);
	////////// check 1st Bill ///////// 
	return $mexp;
	
}

function func_first_billhold($mcode=''){
	$member_first_billhold = array('KH7916564','KH1188659','TH5587463','TH8597106','TH5445861','TH1560668','TH8723754','TH4122619','TH3946228','TH5340576','TH4242248','TH9555358','TH1098327','TH7666320','TH1265258','TH6119384','TH4789123','TH1542053','TH5263977','TH6073608','TH4597778','TH5253295','TH5112304','TH2731323','TH5865173','TH4275512','TH2705993','TH5821838','TH4878845','TH6168212','TH0436096','TH5491027','TH2349243','TH0923156','TH1566467','TH4356994','TH4763488','TH7266540','TH4101562','TH5250549','TH6502990','TH1613464','TH3131713','TH5274658','KH8137207','TH5646362','TH6166381','TH4499511','KH4153747','KH7047119','KH7329711','KH1483459','TH6766357','KH5743103','TH1875610','TH5059509','TH7919009','TH0573081','TH0326524','KH1997081','TH5890097','TH2940878','TH5667764','TH9329005','TH2487596','KH4551243','TH0548462','TH3689817','TH4563709','TH9264498','TH6956710','KH5674389','KH7156130','TH7651808','TH8686823','TH4343324','TH9219656','TH8635641','TH5120740','TH4189844','TH8534332','TH6603007','TH8193431','TH9543802','TH8100415','TH5647512','TH6890193','TH9470427','TH6197274','TH8935244','TH9048353','TH7824550','TH6805657','TH8697664','KH0617924','TH0090540','TH7756987','TH3707087','TH5350511','TH8786696','TH0664049','TH1472046','TH8584640','TH0605471','TH8606732','TH8924072','KH0485318','TH9276278','TH9199291','TH8745294','TH6108143','TH6118604','TH0099523','TH0358804','TH6314003','TH2766818','TH0315759','TH7916684','TH4299310','TH7754160','TH2243128','TH5519722','TH3141319','TH7486307','TH5364070','TH2301303','TH6102475','TH3570766','TH2823514','TH2218954','TH7417222','TH4391202','TH5961822','TH4190849','TH6590081','TH8435819','KH4249963','TH8199321','TH0381581','TH3077981','TH6298193','TH9816800','TH0120662','TH0721954','TH9339746','TH7840871','TH4301616','TH1855599','TH3661171','TH0194897','TH1319570','TH9214188');
	
	if(count($data))$status = 1;
	else $status = 0;

	$find = in_array($mcode,$member_first_billhold );
	if($find)$status = 1; 
	$data = query(" * ","ali_asaleh","sa_type='H' and mcode='$mcode'and cancel=0 ");

	return $status;	
}

 
function updatePos($dbprefix,$mcode,$cur_date,$tot_pv,$satype=""){
	global $pos_piority,$pos_exp,$table_bill,$mid_bill,$column_bill;
	
	
	$mexp=0;
    $sql = "SELECT pos_cur,mdate from ".$dbprefix."member WHERE mcode='$mcode' ";
    $rs = mysql_query($sql);
    $pos_old = '';
    if(mysql_num_rows($rs)>0) {
        $pos_old = mysql_result($rs,0,'pos_cur');
        $mdate = mysql_result($rs,0,'mdate');
       // $exp_pos = mysql_result($rs,0,'exp_pos');
    }
	
	$data_global = query("vip_exp","ali_global","1=1");
	if(count($data_global)){
		$vip_exp = $data_global[0]['vip_exp'];
		
		$ash_day = query("mcode,SUM(tot_pv) as tot_pv","ali_asaleh","(sa_type = 'A') and tot_pv > 0 and cancel=0  and  mcode='".$mcode."' and sadate = '".date("Y-m-d")."' ");
		$hh_day = query("mcode,SUM(tot_pv) as tot_pv","ali_holdhead","(sa_type = 'A') and tot_pv > 0 and cancel=0  and  mcode='".$mcode."' and sadate = '".date("Y-m-d")."' ");
		$tot_pv_day = $ash_day[0]['tot_pv']+$hh_day[0]['tot_pv'];
		
		$last_special_point = query("*","ali_special_point","mcode='".$mcode."' and tot_pv >= 2800");
		if(count($last_special_point) <= 0 and $tot_pv_day >= $vip_exp){
			$last_spid = query("MAX(vip_id) AS maxid","ali_special_point","1=1");
			$sp_id = $last_spid[0]['maxid']+1;
			$insert = array(
				"id"			=>	'',
				"vip_id"		=>	$sp_id,
				"sadate"		=>	date("Y-m-d"),
				"mcode"			=>	$mcode,
				"sa_type"		=>	'VA',
				"tot_pv"		=>	2800,
				"uid"			=>	'SYSTEM',
			);
			insert("ali_special_point",$insert);
		}
	}

	$explod_m = explode('-',$cur_date);
	$thismonth = $explod_m[0]."-".$explod_m[1];
   // $where = "(sa_type = 'A') and tot_pv > 0 and cancel=0  and  mcode='$mcode' and sadate LIKE '".$thismonth."%' ";    
	$where = "(sa_type = 'A') and tot_pv > 0 and cancel=0  and  mcode='$mcode'   ";    
	//if($exp_pos != '0000-00-00')$where .= " and sadate <= '".$exp_pos."' ";
    $sql = " SELECT mcode,ifnull(SUM(tot_pv),0) as tot_pv,sctime,sadate FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT mcode,tot_pv as tot_pv,sctime as sctime ,sadate  FROM ali_asaleh ";
    $sql .= "    WHERE ".$where."  ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT mcode,tot_pv as tot_pv,sctime as sctime ,sadate  FROM ali_holdhead ";
    $sql .= "    WHERE ".$where." ";
    $sql .= " ) as tb ";   
    $sql .= " ORDER BY sctime ASC ";
    $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    $arr = array();
    
    if(mysql_num_rows($rs) > 0)  
    {    
        $row = mysql_fetch_object($rs);        
        $tot_pvx = $row->tot_pv;       
    }	

	$sql1="SELECT ifnull(SUM(tot_pv),0) as tot FROM ali_special_point WHERE mcode='$mcode' and sa_type='VA' and sadate <= '".$cur_date."' ";	
	$res=mysql_query($sql1);
	if(mysql_num_rows($res)>0){
		$obj = mysql_fetch_object($res);        
        $sp_mexp = $obj->tot;
	}

	
	//if($cur_date > $exp_pos and $exp_pos !== '0000-00-00' and $exp_pos !== ''){
	//	$tot_pvx = $tot_pv;
	//}
	
	$mexp = $tot_pvx+$sp_mexp;

	$pos_new = $pos_old;
	foreach(array_keys($pos_exp) as $key){
		if($mexp>=$pos_exp[$key]){ $pos_new = $key; break;}
	}

	//echo $mexp.' : '.$pos_old.' : '.$pos_new;
	//exit;
	

	if($pos_new != $pos_old && $pos_piority[$pos_new]>$pos_piority[$pos_old]){
		$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 "; mysql_query($sql);
		$sql1 = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change,up_down) ";
		$sql1 .= "VALUES('','".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."','up')";    
		$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";     
		mysql_query($sql1);
		
	} 
}



function downdatePos($dbprefix,$mcode,$cur_date,$tot_pv){

    $sqlVIP = " select * from ".$dbprefix."calc_poschange where  date_change>= '$cur_date' and mcode='$mcode' order by id ASC limit 0,1 ";
	//echo $sqlVIP;
    $rsVIP = mysql_query($sqlVIP) or die(mysql_error());
    if(mysql_num_rows($rsVIP) >0){
        $sqlObj = mysql_fetch_object($rsVIP);
        $pos_after =$sqlObj->pos_after;        
        $mcode_vip =$sqlObj->mcode;    
        $pos_before =$sqlObj->pos_before;     
         mysql_query("delete ".$dbprefix."calc_poschange where  date_change>= '$cur_date'  and type <> '1' and mcode = '$mcode'");
    }

    downdatePos1($dbprefix,$mcode,$cur_date,$tot_pv);
}



function downdatePos1($dbprefix,$mcode,$cur_date,$tot_pv){
    global $pos_piority,$pos_exp;
    $sql = "SELECT pos_cur,mdate,pos_cur2,exp_pos from ".$dbprefix."member WHERE mcode='$mcode' ";
    $rs = mysql_query($sql);
    $pos_old = '';
    if(mysql_num_rows($rs)>0) {
        $pos_old = mysql_result($rs,0,'pos_cur');
        $pos_old2 = mysql_result($rs,0,'pos_cur2');
        $mdate = mysql_result($rs,0,'mdate');
        $exp_pos = mysql_result($rs,0,'exp_pos');
    }
	
	
		$where = "(sa_type = 'A') and tot_pv > 0 and cancel=0  and  mcode='$mcode' ";     
		$sql = " SELECT mcode,ifnull(SUM(tot_pv),0) as tot_pv,sctime,sadate FROM  ";
		$sql .= " ( ";
		$sql .= " SELECT mcode,tot_pv as tot_pv,sctime as sctime ,sadate  FROM ali_asaleh ";
		$sql .= "    WHERE ".$where."  ";
		$sql .= " UNION ALL ";
		$sql .= " SELECT mcode,tot_pv as tot_pv,sctime as sctime ,sadate  FROM ali_holdhead ";
		$sql .= "    WHERE ".$where." ";
		$sql .= " ) as tb ";   
		$sql .= " ORDER BY sctime ASC ";
		$sql .= " LIMIT 0,1 ";
		$rs = mysql_query($sql);
		$num =  mysql_num_rows($rs);
		if(mysql_num_rows($rs) > 0)  
		{    
			$row = mysql_fetch_object($rs);        
			$mexp = $row->tot_pv;       
		}

		$sql1="SELECT ifnull(SUM(tot_pv),0) as tot FROM ali_special_point WHERE mcode='$mcode' and sa_type='VA' and sadate <= '".$cur_date."' ";	
		$res=mysql_query($sql1);
		if(mysql_num_rows($res)>0){
			$obj = mysql_fetch_object($res);        
			$sp_mexp = $obj->tot;
		}

		$mexp = $mexp+$sp_mexp;


    foreach(array_keys($pos_exp) as $key){
        if($mexp>=$pos_exp[$key]){ $pos_new = $key; break;}
    }
	// && $pos_piority[$pos_new]>$pos_piority[$pos_old]
    if($pos_new != $pos_old){
		$pos_mb = 'MB';
        $sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 ";    
		mysql_query($sql);
        $sql1 = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
        $sql1 .= "VALUES('','".$mcode."','".$pos_old."','".$pos_mb."','".$cur_date."')";
	    mysql_query($sql1);
        $sql2 = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
        $sql2 .= "VALUES('','".$mcode."','".$pos_mb."','".$pos_new."','".$cur_date."')";
        mysql_query($sql2);
        
	}
} 

 
function getAllbill_to_bm($table,$fdate,$tdate){
    global $thisMonth,$lastMonth;
    $where = "sadate between '$fdate' and '$tdate' and (sa_type = 'A' or sa_type = 'Z')  and cancel=0 and tot_pv > 0 ";

    $sql = " SELECT mcode,SUM(tot_pv) as tot_pv FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT ash.mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh ash ";
    $sql .= " LEFT JOIN ali_member mb on(mb.mcode = ash.mcode) ";
    $sql .= "    WHERE ".$where."  GROUP BY mcode ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT hoh.mcode,SUM(tot_pv) as tot_pv  FROM ali_holdhead hoh ";
    $sql .= " LEFT JOIN ali_member mb on(mb.mcode = hoh.mcode) ";
    $sql .= "    WHERE ".$where." GROUP BY mcode ";
    $sql .= " ) as tb ";
    $sql .= " GROUP BY mcode "; 

     $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    if(mysql_num_rows($rs) > 0)
    {
        for($i=0;$i<$num;$i++)
        {
            $row = mysql_fetch_object($rs);
            $mcode = $row->mcode;
            $tot_pv = $row->tot_pv;    
            if($tot_pv > 0)
            {
                getInsert_bm($table,'',$mcode,'',$tot_pv,$fdate,$tdate);
        
            }

        }

    }
}



function getAllbill_to_bmx($table,$fdate,$tdate){
    global $thisMonth,$lastMonth;
    $where = "sadate between '$fdate' and '$tdate' and sa_type = 'A'  and cancel=0 and tot_pv > 0 ";

    $sql = " SELECT mcode,sano,tot_pv as tot_pv FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT ash.mcode,ash.sano,tot_pv as tot_pv  FROM ali_asaleh ash ";
    $sql .= " LEFT JOIN ali_member mb on(mb.mcode = ash.mcode) ";
    $sql .= "    WHERE ".$where."  ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT hoh.mcode,hoh.hono as sano,tot_pv as tot_pv  FROM ali_holdhead hoh ";
    $sql .= " LEFT JOIN ali_member mb on(mb.mcode = hoh.mcode) ";
    $sql .= "    WHERE ".$where."  ";
    $sql .= " ) as tb ";
    $sql .= " "; 

     $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    if(mysql_num_rows($rs) > 0)
    {
        for($i=0;$i<$num;$i++)
        {
            $row = mysql_fetch_object($rs);
            $mcode = $row->mcode;
            $tot_pv = $row->tot_pv;    
            $sano = $row->sano;    
            if($tot_pv > 0)
            {
                getInsert_bm($table,$sano,$mcode,'',$tot_pv,$fdate,$tdate);
        
            }

        }

    }
}

 function getInsert_bm($table,$sano,$mcode,$pos_cur,$tot_pv,$fdate,$tdate) 
{
    global $ro;
	
    $array_mcode = array(Array( "upa_code"=> $mcode,"mcode" =>$mcode ));
    //$array = array_merge(get_part($mcode), $array_mcode);
    $array = get_part($mcode);
	//  echo '<pre>'; print_r($array); echo '</pre>'; 
    $array = array_reverse($array);    
    $num= count($array); 
     $insert = array();
     for($k=0; $k<$num;$k++)
    {        
        if($array[$k]['upa_code'] != '') {
            $insert[$k] = array(
                            "rcode"        => $ro,
							"sano"         => $sano,
                            "mcode"        => $mcode,
                            "upa_code"     => $array[$k]['upa_code'],
                            "lr"		   => $array[$k]['lr'],
                            "level"        => $k,
                            "pv"           => $tot_pv,                     
                            "fdate"        => $fdate,    
                            "tdate"        => $tdate,        
                            );
            }
    }
  //  echo '<pre>'; print_r($insert); echo '</pre>';    
    if($insert[0])muti_insert($table,$insert);
 
}
 
 function getInsert_bm_bill($table,$sano,$mcode,$pos_cur,$tot_pv,$fdate,$tdate) 
{
    global $ro;

	$data = get_detail_meber($mcode);
		$array_mcode = array(Array( "upa_code"=> $mcode,"mcode" =>$mcode));
		$array = array_merge(get_part($mcode), $array_mcode);
		$array = array_reverse($array);    
		$num= count($array); 
		 $insert = array();
		 for($k=0; $k<$num;$k++)
		{        
			if($array[$k]['upa_code'] != '') {
				$insert[$k] = array(
								"rcode"        => $ro,
								"sano"         => $sano,
								"mcode"        => $mcode,
								"upa_code"     => $array[$k]['upa_code'],
								"lr"		   => $array[$k]['lr'],
								"level"        => $k,
								"pv"           => $tot_pv,    
								"fdate"        => $fdate,    
								"tdate"        => $tdate,        
								);
				}
		}
		//echo '<pre>'; print_r($insert); echo '</pre>';    
		muti_insert($table,$insert);
	
}


function get_part($mcode) 
{
    $result = mysql_query("SELECT c1.upa_code as upa_code,c2.pos_cur as pos_cur,c1.mcode AS mcode,c1.lr AS lr FROM ali_member AS c1
                            LEFT JOIN ali_member AS c2 ON c1.upa_code=c2.mcode 
                            WHERE c1.mcode='$mcode' "); 
     
    $row = mysql_fetch_array($result);
    $path = array();
       end($path);
        $last_key = key($path);
        $key = $last_key==0 ? 0 : $last_key+1;
        $path[$key]['upa_code'] = $row['upa_code'];
        $path[$key]['mcode'] =  $mcode;
		$path[$key]['lr'] = $row['lr'];
        if($path[$key]['upa_code'] != '' and  $path[$key]['upa_code'] != 'ROOT' )
        {
           $path = array_merge(get_part($row['upa_code']), $path);            
        }  
    
   return $path;
}



function dateDiff_pos($startDate, $endDate) { 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 
    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 

} 
function expdate_pos($startdate,$datenum){
 $startdatec=strtotime($startdate); 
 $tod=$datenum*86400; 
 $ndate=$startdatec+$tod; 
 return $ndate; 
}

function genmcode($source){ 
    for($i=strlen($source);$i<7;$i++)
        $source = "0".$source;
    return $source;

}
function insert($table,$data){
  $fields=""; $values="";
  $i=1;                       
  foreach($data as $key=>$val)
  {
    if($i!=1) { $fields.=", "; $values.=", "; }
    $fields.="$key";
    $values.="'$val'";
    $i++;
  }
  $sql = "INSERT INTO $table ($fields) VALUES ($values)";
 // echo $sql.'<br><br>';

  if(@mysql_query($sql)) { return true; } 
  else {return false;}
  $text="uid=".$_SESSION["adminusercode"]." action=$table =>$sql";
  writelogfile($text);
}

function muti_insert($table,$data){
  $fields=""; $values="";
  $i=0;
  $ii=0;
	foreach($data as $key_main => $main)
	{
		$num = count($main); 
 		foreach($main as  $key=>$val)
		{
			if($i!= 0) {
				$fields[$key_main].=", ";
				$values[$key_main].=", "; 			
			}
			if($i == 0)$values[$key_main].="(";
				$fields[$key_main].="$key";
				$values[$key_main].="'$val'";
				$i++;			
			if($i == $num){
				$values[$key_main].=")"; 
				$i=0;
			}		
		}
		if($key_main!=0)$VALUES.=", ";
		$VALUES .= $values[$key_main];
	}

	//echo '<pre>'; print_r($data); echo '</pre>';	

      $sql = "INSERT INTO $table (".$fields[0].") VALUES";	
	  $sql .= $VALUES; 
	  if(@mysql_query($sql)) { return true; } 
	  else { die("SQL Error: <br>".$sql."<br>".mysql_error()); return false;}
	  $text="uid=".$_SESSION["adminusercode"]." action=$table =>$sql";
	  writelogfile($text);  
}

function getDataForm($prefix=''){
	if(is_array($_POST)){
		foreach ($_POST as $k=>$v){
			global ${$prefix.$k};
			${$prefix.$k}=$v;
		}
	}
}

function update($table,$data,$where){
  $modifs="";
  $i=1;
  foreach($data as $key=>$val)
  {
    if($i!=1){ $modifs.=", "; }
    $modifs.=$key.' = "'.$val.'"'; 
    $i++;
  }
  $sql = ("UPDATE $table SET $modifs WHERE $where");
  //if($table == 'ali_member')\
  
  //echo $sql.'<br>';
  if(@mysql_query($sql)) { return true; } 
  else { die("SQL Error: <br>".$sql."<br>".mysql_error()); return false; }
  $text="uid=".$_SESSION["adminusercode"]." action=$table =>$sql";
  writelogfile($text);
 
}

function del($table,$where){
 
  $sql = ("DELETE FROM $table WHERE $where"); 
  if(@mysql_query($sql)) { return true; } 
  else { die("SQL Error: <br>".$sql."<br>".mysql_error()); return false; }  
   $text="uid=".$_SESSION["adminusercode"]." action=$table =>$sql";
  writelogfile($text);
}
function lastMonth($fdate){
	$datestring="$fdate first day of last month";
	$dt=date_create($datestring);
	return $dt->format('Y-m');
}
function thisMonth($fdate){
	$dt=date_create($fdate);
	return $dt->format('Ym');
}
function thisMonthx($fdate){
	$dt=date_create($fdate);
	return $dt->format('Y-m');
} 
class point_member {	

	function maxCals(){	
		$sql="SELECT rcode,fdate,tdate FROM ali_around WHERE calc='1'  ORDER BY rcode DESC LIMIT 1";
		$rs = mysql_query($sql);		
		if(mysql_num_rows($rs)>0){
			$data['where_cause'] = "AND sadate>'".mysql_result($rs,0,'tdate')."' ";
			$data['max_rcode'] = mysql_result($rs,0,'rcode');
			$data['tdate'] = mysql_result($rs,0,'tdate');
		}else{
			$data['where_cause'] = '';
			$data['max_rcode'] = 0;
			$data['tdate'] = '';
		}
		return $data;
	}
	function get_bmbonus($dbprefix,$cmc){

		$sql="SELECT carry_l,carry_c,mcode FROM ".$dbprefix."bmbonus bm left join ali_around ar on (bm.rcode=ar.rcode) WHERE ar.calc='1' and mcode = '".$cmc."' order by bm.rcode desc limit 0,1 ";
		
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$sqlObj = mysql_fetch_object($rs);
			$data['pcarry'][1] = $sqlObj->carry_l; // left		 
			$data['pcarry'][2] = $sqlObj->carry_c; // right
		 
		}else{
			$data['pcarry'][1] = 0;
			$data['pcarry'][2] = 0;	 
		}

		$sql1="SELECT sum(ro_l) as ro_ll,sum(ro_c) as ro_cc,mcode FROM ".$dbprefix."bmbonus  WHERE mcode = '".$cmc."' group by mcode ";
		$rs1 = mysql_query($sql1);
		if(mysql_num_rows($rs1)>0){
			$sqlObj1 = mysql_fetch_object($rs1);
			$data['sum_pv'][1] = $sqlObj1->ro_ll;// left
		     $data['sum_pv'][2] = $sqlObj1->ro_cc;// right
		}else{
			$data['sum_pv'][1] = 0;
			$data['sum_pv'][2] = 0;	
		}	
		
		return $data;
	} 

	function get_bmbonus_thismonth($dbprefix,$cmc){

		$sql="SELECT sum(balance) as balance FROM ".$dbprefix."bmbonus WHERE mcode = '".$cmc."' and fdate like '%".date("Y-m")."%' ";
		
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$sqlObj = mysql_fetch_object($rs);
			$data['balance'] = $sqlObj->balance; // left		 
		 
		}else{
			$data['balance'] = '0'; // left		 
		}
		return $data;
	} 

	function get_bmbonus7($dbprefix,$cmc){
		$sql="SELECT ro_l,ro_c,pcrry_l,pcrry_c,total_pv_l,total_pv_r,mcode,carry_l,carry_c FROM ".$dbprefix."bmbonus WHERE mcode = '".$cmc."' order by rcode desc limit 0,1 ";

		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$data[$i]['ro_l'] = $sqlObj->ro_l;		 
				$data[$i]['ro_c'] = $sqlObj->ro_c;
				$data[$i]['pcrry_l'] = $sqlObj->pcrry_l;		 
				$data[$i]['pcrry_c'] = $sqlObj->pcrry_c;
				$data[$i]['carry_l'] = $sqlObj->carry_l;		 
				$data[$i]['carry_c'] = $sqlObj->carry_c;
				$data[$i]['total_pv_l'] = $sqlObj->total_pv_l;		 
				$data[$i]['total_pv_r'] = $sqlObj->total_pv_r;
			}
		}
		return $data;
	}
	function get_newPoint($dbprefix,$cmc,$lr){
		$where = $this->maxCals();
		$tdate = $where['tdate'];
		$sql1="SELECT SUM(pv) as pv FROM ".$dbprefix."bm1 WHERE upa_code = '".$cmc."' and fdate > '".$tdate."' and lr ='".$lr."' group by upa_code ";
	
 		$rs1 = mysql_query($sql1);
		if(mysql_num_rows($rs1)>0){
			$sqlObj1 = mysql_fetch_object($rs1);
			$data = $sqlObj1->pv; 		  
		}else{
			$data = 0; 		  
		}
	    return $data;
	}
	
	function get_sumTotal($dbprefix,$cmc,$tdate){
			$thismonth = thisMonthx($tdate);
            $wherex = "tdate LIKE '%".$thismonth."%' and total > 0  and mcode = '".$cmc."' "; 
			$sqlx = "SELECT mcode,IFNULL(sum(total),0) as total  FROM ali_bmbonus WHERE ".$wherex." ";
			$rs = mysql_query($sqlx);
			$arr = array();
            if(mysql_num_rows($rs) > 0)
            {    
                $row = mysql_fetch_object($rs); 
                $data['total'] = $row->total;  
                if($data['total'] >= 700000){
                   $data['max_mont'] = 1;
                }else{
                   $data['max_mont'] = 0;       
                }       
            }else{
				$data['total'] = 0;
				$data['max_mont'] = 0;
			}
	    return $data;
	}
	
	
	function get_sumPoint($dbprefix,$cmc){
		$where = $this->maxCals();
		$tdate = $where['tdate'];
		$sql1="SELECT SUM(pv) as pv FROM ".$dbprefix."bm1 WHERE upa_code = '".$cmc."' group by upa_code ";
	
 		$rs1 = mysql_query($sql1);
		if(mysql_num_rows($rs1)>0){
			$sqlObj1 = mysql_fetch_object($rs1);
			$data = $sqlObj1->pv; 		  
		}else{
			$data = 0; 		  
		}
        
		$sql1 = "select mcode, SUM(tot_pv) AS pv from ".$dbprefix."special_point_group WHERE  sa_type='VA' AND mcode='".$cmc."'  group by mcode ";
		$rs1 = mysql_query($sql1);
		if(mysql_num_rows($rs1)>0){
			$sqlObj1 = mysql_fetch_object($rs1);
			$data += $sqlObj1->pv; 		  
		}
	    return $data;
	}

	function get_pointlevel($dbprefix,$cmc,$level){
		

		$sql1="SELECT mcode_index  FROM ali_structure_binary WHERE mcode_ref = '".$cmc."' ";
		$rs1 = mysql_query($sql1);
		if(mysql_num_rows($rs1)>0){
			$sqlObj1 = mysql_fetch_object($rs1);
			$mcode_index = $sqlObj1->mcode_index;
			$chklevel =  strlen($mcode_index)+$level;
		}

		$sql1="SELECT mcode_ref  FROM ali_structure_binary WHERE mcode_level = '".$level."' and mcode_index LIKE '".$mcode_index."%' ";
		//echo $sql1;
		$rsxx = mysql_query($sql1);
		if(mysql_num_rows($rsxx) > 0){
			for($jj=0;$jj<mysql_num_rows($rsxx);$jj++){
				$sqlObjxx = mysql_fetch_object($rsxx);
				$cmc = $sqlObjxx->mcode_ref;
				$where = " cancel = 0 and tot_pv > 0  and mcode = '".$cmc."' and sa_type = 'A' ";
				$sql  = " SELECT mcode,SUM(tot_pv) as tot_pv FROM  ";
				$sql .= " ( ";
				$sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh ";
				$sql .= "    WHERE ".$where." GROUP BY mcode ";
				$sql .= " UNION ALL ";
				$sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_holdhead ";
				$sql .= "    WHERE ".$where." GROUP BY mcode ";
				$sql .= " ) as tb ";
				$sql .= " GROUP BY mcode ";
				
				$rs = mysql_query($sql);
				$num =  mysql_num_rows($rs);
				if(mysql_num_rows($rs) > 0)
				{
					$row = mysql_fetch_object($rs);
					$data += $row->tot_pv;
				}
			}
		}

	    return $data;
	}



	 function get_newPoint_show($dbprefix,$cmc,$lr){
		$where = $this->maxCals();
		$tdate = $where['tdate'];
 		$sql="SELECT mcode,sum(pv) as total_pv FROM ".$dbprefix."bm1 WHERE upa_code = '".$cmc."' and fdate > '".$tdate."' and lr ='".$lr."' group by mcode order by mcode ASC ";
		// $sql="SELECT mcode,pv as total_pv FROM ".$dbprefix."bm1 WHERE upa_code = '".$cmc."' and fdate > '".$tdate."' and lr ='".$lr."' order by mcode ASC ";

		$rs = mysql_query($sql);
		 if(mysql_num_rows($rs) > 0)
			{	
				$table = "<table> ";
					for($i=0;$i<mysql_num_rows($rs);$i++)
					{
						$sqlObj = mysql_fetch_object($rs);	
						$table .= "<tr>";
						$table .= "<td>".$sqlObj->mcode."</td>";
						$table .= "<td>  :  </td>";
						$table .= "<td align=right>".number_format($sqlObj->total_pv,0,'.',',')."</td>";
						$table .= "</tr>";
					}
				$table .= "<tr><td colspan ='3'><hr/></td><tr>";
				$table .= "<tr><td></td><td></td><td>".number_format($this->get_newPoint($dbprefix,$cmc,$lr),0,'.',',')."</td><tr>";		
				$table .= "</table> ";			
			}else{	
				$table = 'ไม่พบข้อมูล';
			}	
		//	echo $table;
	    return $table;
	}
	 function get_allPoint($dbprefix,$cmc){
		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE (sa_type='A') and mcode='$cmc' and cancel=0  ";
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		mysql_free_result($rs);

		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$cmc."' and (sa_type='A')   and cancel=0  ";
		$rs = mysql_query($sql);
		$mexph = 0;
		if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
		mysql_free_result($rs);

		$sql = "select mcode, SUM(tot_pv) AS pv from ".$dbprefix."special_point WHERE  sa_type='VA' AND mcode='".$cmc."'  group by mcode ";
		$rs = mysql_query($sql);
		$mexpv = 0;
		if(mysql_num_rows($rs)>0) $mexpv = mysql_result($rs,0,'pv');
		mysql_free_result($rs);
		$data=($mexp+$mexph+$mexpv);	
		return $data;
	 }
	 function get_allPointThisMonth($dbprefix,$cmc,$month=''){
		if(empty($month))$thisMonth = date("Y-m");
		else $thisMonth = $month;
		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE (sa_type='A') and mcode='$cmc' and cancel=0 and sadate LIKE '".$thisMonth."%' ";
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		mysql_free_result($rs);
		
		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$cmc."' and (sa_type='A')   and cancel=0  and sadate LIKE '".$thisMonth."%' ";
		$rs = mysql_query($sql);
		$mexph = 0;
		if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
		mysql_free_result($rs);
		$sql = "select mcode, SUM(tot_pv) AS pv from ".$dbprefix."special_point WHERE  sa_type='VA' AND mcode='".$cmc."' and sadate LIKE '".$thisMonth."%'  group by mcode ";
		$rs = mysql_query($sql);
		$mexpv = 0;
		if(mysql_num_rows($rs)>0) $mexpv = mysql_result($rs,0,'pv');
		mysql_free_result($rs);
		$data=($mexp+$mexph+$mexpv);	
		return $data;

	 }

	 function get_allUnit($dbprefix,$cmc){
		$sql = "SELECT SUM(cycle_b) as pv from ".$dbprefix."bmbonus WHERE mcode='$cmc' group by mcode  ";
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
	

		$data=($mexp+$mexph+$mexpv);	
		return $data;
	 }

	 function position($dbprefix,$table,$field,$cmc){
	
			$result11=mysql_query("select pos_after,date_change from ".$dbprefix.$table." where mcode='".$cmc."' order by id desc limit 0,1 ");
			if (mysql_num_rows($result11)>0)
			{
					$sqlObj1 = mysql_fetch_object($result11);
					$data['pos_cur'] = $sqlObj1->pos_after;
					$data['date'] = $sqlObj1->date_change;			
			}
			else
			{
					$sql="SELECT $field as pos_cur FROM ".$dbprefix."member where mcode='".$cmc."' ";
					$rs = mysql_query($sql);
					if(mysql_num_rows($rs) > 0)
					{	
						$sqlObj = mysql_fetch_object($rs);	
						$data['pos_cur'] = $sqlObj->pos_cur;	
					}
			}
 		$data['pos_cur'] = $this->posname($data['pos_cur']);
 		return $data;

	 }
	function posname($pos_cur) {
				$sql = "SELECT posname FROM ali_position WHERE posshort ='".$pos_cur."' ";
			//echo $sql;
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
			$posname = mysql_result($rs,0,'posname'); 
				mysql_free_result($rs);
			}
			if($posname =='')$posname='-';
			return $posname;
	}
}

if($_GET['lan'] == 'TH')
{
    $arr_ewallet_type=array(
        'I'=>"เตืม",  //   Cash IN
        'O'=>"ถอน",  //  Withdrow OUT
        'TI'=>"โอนเข้า",  //  Withdrow OUT
        'TO'=>"โอนออก",  //  Withdrow OUT
        'CI'=>"คอมมิชชั่นเข้า", //  Commision IN
        'CO'=>"คอมมิชชั่นออก" // Commision OUT  
    );
}
else
{
    $arr_ewallet_type=array(
        'I'=>"recharge",  //   Cash IN
        'O'=>"withdrawal",  //  Withdrow OUT
        'TI'=>"transfer IN",  //  Withdrow OUT
        'TO'=>"transfer OUT",  //  Withdrow OUT
        'CI'=>"commissions in", //  Commision IN
        'CO'=>"commissions out" // Commision OUT  
    );
}
     

function get_detail_meber($mcode,$tdate=''){ 
     $dbprefix = 'ali_';
      // if($tdate != '')$wheresql = " and date_change <= '$tdate' ";
        $sql="SELECT mcode,name_t,lr,name_b,ecom,sp_code,sp_name,sp_code2,sp_name2,upa_code,upa_name,locationbase,status_terminate,pos_cur,pos_cur2,name_e,DATE_FORMAT(ali_member.mdate, '%d-%m-%Y') as mdate,cmp,cmp2,cmp3,cmp,name_f,bmdate1,sex,bmdate2,bmdate3,ewallet,ewallet,eatoship,voucher,mtype1,national,id_card,id_tax,home_t,fax,mobile,facebook_name,email,line_id,cname_f,cname_b,cname_t,cname_e,birthday,csex,cbirthday,cnational,cid_card,cid_tax,chome_t,cmobile,cfax,cemail,
		address,street,building,village,soi,districtId,amphurId,provinceId,zip
		,caddress,cstreet,cbuilding,cvillage,csoi,cdistrictId,camphurId,cprovinceId,czip
		,bankcode,branch,acc_type,acc_no,acc_name,atocom,pos_cur3,hpv

		,irelation,iname_f,iname_t,iphone,iid_card,cline_id,cfacebook_name
		FROM ali_member WHERE mcode = '$mcode' ";
       //echo $sql"<br>";
		$rs = mysql_query($sql);
         if(mysql_num_rows($rs)>0){
            $sqlObj = mysql_fetch_object($rs);
            $data['mcode'] =$sqlObj->mcode;        
            $data['name_t'] =$sqlObj->name_t;
            $data['name_e'] =$sqlObj->name_e;
            $data['name_b'] =$sqlObj->name_b; 
			$data['mtype'] =$sqlObj->mtype1; 
            $data['mdate'] =$sqlObj->mdate;        
            $data['sp_code'] = $sqlObj->sp_code;
            $data['sp_code2'] = $sqlObj->sp_code2;
            $data['sp_name'] = $sqlObj->sp_name;
            $data['sp_name2'] = $sqlObj->sp_name2;
            $data['upa_code'] = $sqlObj->upa_code;
            $data['upa_name'] = $sqlObj->upa_name;
            $data['pos_cur'] = $sqlObj->pos_cur;          
            $data['pos_cur2'] = $sqlObj->pos_cur2;
            $data['pos_cur3'] = $sqlObj->pos_cur3;
            $data['terminate'] = $sqlObj->status_terminate;
            $data['cmp'] = $sqlObj->cmp;
            $data['cmp2'] = $sqlObj->cmp2;
            $data['cmp3'] = $sqlObj->cmp3;
            $data['bmdate1'] = $sqlObj->bmdate1;
            $data['bmdate2'] = $sqlObj->bmdate2;
            $data['bmdate3'] = $sqlObj->bmdate3;          
            $data['ewallet'] = $sqlObj->ewallet;          
            $data['ecom'] = $sqlObj->ecom;          
            $data['voucher'] = $sqlObj->voucher;          
            $data['eatoship'] = $sqlObj->eatoship;          
            $data['locationbase'] = $sqlObj->locationbase;          
            $data['lr'] = $sqlObj->lr;          
            $data['name_f'] = $sqlObj->name_f;          
            $data['sex'] = $sqlObj->sex;                
            $data['national'] = $sqlObj->national;                
            $data['id_card'] = $sqlObj->id_card;                
            $data['id_tax'] = $sqlObj->id_tax;                
            $data['home_t'] = $sqlObj->home_t;                
            $data['fax'] = $sqlObj->fax;                
            $data['line_id'] = $sqlObj->line_id;                
            $data['mobile'] = $sqlObj->mobile;                
            $data['facebook_name'] = $sqlObj->facebook_name;                
            $data['email'] = $sqlObj->email;                
            $data['birthday'] = $sqlObj->birthday;                
            $data['atocom'] = $sqlObj->atocom;                
				
            $data['cname_f'] = $sqlObj->cname_f;                
            $data['cname_t'] = $sqlObj->cname_t;                
            $data['cname_b'] = $sqlObj->cname_b;                
            $data['cname_e'] = $sqlObj->cname_e;                
            $data['csex'] = $sqlObj->csex;                
            $data['cbirthday'] = $sqlObj->cbirthday;                
            $data['cnational'] = $sqlObj->cnational;                
            $data['cid_card'] = $sqlObj->cid_card;                
            $data['cid_tax'] = $sqlObj->cid_tax;                
            $data['chome_t'] = $sqlObj->chome_t;                
            $data['cmobile'] = $sqlObj->cmobile;                
            $data['cfax'] = $sqlObj->cfax;                
            $data['cemail'] = $sqlObj->cemail;      
            $data['address'] = $sqlObj->address;                
            $data['street'] = $sqlObj->street;                
            $data['building'] = $sqlObj->building;                
            $data['village'] = $sqlObj->village;                
            $data['soi'] = $sqlObj->soi;                
            $data['districtId'] = $sqlObj->districtId;                
            $data['amphurId'] = $sqlObj->amphurId;                
            $data['provinceId'] = $sqlObj->provinceId;                
            $data['zip'] = $sqlObj->zip;                
            $data['caddress'] = $sqlObj->caddress;                
            $data['cstreet'] = $sqlObj->cstreet;                
            $data['cbuilding'] = $sqlObj->cbuilding;                
            $data['cvillage'] = $sqlObj->cvillage;                
            $data['csoi'] = $sqlObj->csoi;                
            $data['cdistrictId'] = $sqlObj->cdistrictId;                
            $data['camphurId'] = $sqlObj->camphurId;                
            $data['cprovinceId'] = $sqlObj->cprovinceId;                
            $data['czip'] = $sqlObj->czip;  
            $data['cline_id'] = $sqlObj->cline_id;                
            $data['cfacebook_name'] = $sqlObj->cfacebook_name;  
            $data['irelation'] = $sqlObj->irelation;  
            $data['iname_f'] = $sqlObj->iname_f;  
            $data['iname_t'] = $sqlObj->iname_t;  
            $data['iphone'] = $sqlObj->iphone;  
            $data['iid_card'] = $sqlObj->iid_card; 
            $data['bankcode'] = $sqlObj->bankcode;                        
            $data['branch'] = $sqlObj->branch;                        
            $data['acc_type'] = $sqlObj->acc_type;                        
            $data['acc_no'] = $sqlObj->acc_no;                        
            $data['acc_name'] = $sqlObj->acc_name;    
            $data['hpv'] = $sqlObj->hpv;      
			if($data['bankcode'] != ""){
				$sql = "SELECT * FROM ".$dbprefix."bank WHERE bankcode='".$data['bankcode']."'";	
				$result = mysql_query($sql);	
				if(mysql_num_rows($result)<=0){
					$data['bankname'] = "";
				}else{
					$bankinfo = mysql_fetch_object($result);
					$data['bankname'] = $bankinfo->bankname;
				}
			}	
		}

	  if($tdate != ''){
			$wheresql = " and date_change <= '$tdate' ";			
			$sql1 = "select * from ".$dbprefix."calc_poschange where mcode = '".$mcode."' $wheresql order by id desc ";
			$rs11 = mysql_query($sql1);
			if(@mysql_num_rows($rs11)>0){
				$sqlObj11 = mysql_fetch_object($rs11);
				$data['pos_cur'] =$sqlObj11->pos_after;
			}
			$sql2 = "select * from ".$dbprefix."calc_poschange2 where mcode = '".$mcode."' $wheresql order by id desc ";
			$rs12 = mysql_query($sql2);
			if(@mysql_num_rows($rs12)>0){
				$sqlObj12 = mysql_fetch_object($rs12);
				$data['pos_cur2'] =$sqlObj12->pos_after;
			}
	  }
      // if($mcode == '0005520') echo $data['pos_cur'].'<br>';        
    return $data;
}

function get_detail_meber_tmp($mcode,$tdate=''){ 
     $dbprefix = 'ali_';
        $sql="SELECT *
		FROM ali_member_tmp WHERE id = '$mcode' ";
       //echo $sql"<br>";
		$rs = mysql_query($sql);
         if(mysql_num_rows($rs)>0){
            $sqlObj = mysql_fetch_object($rs);
            $data['mcode'] =$sqlObj->mcode;        
            $data['name_t'] =$sqlObj->name_t;
            $data['name_e'] =$sqlObj->name_e;
            $data['name_b'] =$sqlObj->name_b; 
			$data['mtype'] =$sqlObj->mtype1; 
            $data['mdate'] =$sqlObj->mdate;        
            $data['sp_code'] = $sqlObj->sp_code;
            $data['sp_code2'] = $sqlObj->sp_code2;
            $data['sp_name'] = $sqlObj->sp_name;
            $data['sp_name2'] = $sqlObj->sp_name2;
            $data['upa_code'] = $sqlObj->upa_code;
            $data['upa_name'] = $sqlObj->upa_name;
            $data['pos_cur'] = $sqlObj->pos_cur;          
            $data['pos_cur2'] = $sqlObj->pos_cur2;
            $data['pos_cur3'] = $sqlObj->pos_cur3;
            $data['terminate'] = $sqlObj->status_terminate;
            $data['cmp'] = $sqlObj->cmp;
            $data['cmp2'] = $sqlObj->cmp2;
            $data['cmp3'] = $sqlObj->cmp3;
            $data['bmdate1'] = $sqlObj->bmdate1;
            $data['bmdate2'] = $sqlObj->bmdate2;
            $data['bmdate3'] = $sqlObj->bmdate3;          
            $data['ewallet'] = $sqlObj->ewallet;          
            $data['ecom'] = $sqlObj->ecom;          
            $data['voucher'] = $sqlObj->voucher;          
            $data['eatoship'] = $sqlObj->eatoship;          
            $data['locationbase'] = $sqlObj->locationbase;          
            $data['lr'] = $sqlObj->lr;          
            $data['name_f'] = $sqlObj->name_f;          
            $data['sex'] = $sqlObj->sex;                
            $data['national'] = $sqlObj->national;                
            $data['id_card'] = $sqlObj->id_card;                
            $data['id_tax'] = $sqlObj->id_tax;                
            $data['home_t'] = $sqlObj->home_t;                
            $data['fax'] = $sqlObj->fax;                
            $data['line_id'] = $sqlObj->line_id;                
            $data['mobile'] = $sqlObj->mobile;                
            $data['facebook_name'] = $sqlObj->facebook_name;                
            $data['email'] = $sqlObj->email;                
            $data['birthday'] = $sqlObj->birthday;                
            $data['atocom'] = $sqlObj->atocom;                
				
            $data['cname_f'] = $sqlObj->cname_f;                
            $data['cname_t'] = $sqlObj->cname_t;                
            $data['cname_b'] = $sqlObj->cname_b;                
            $data['cname_e'] = $sqlObj->cname_e;                
            $data['csex'] = $sqlObj->csex;                
            $data['cbirthday'] = $sqlObj->cbirthday;                
            $data['cnational'] = $sqlObj->cnational;                
            $data['cid_card'] = $sqlObj->cid_card;                
            $data['cid_tax'] = $sqlObj->cid_tax;                
            $data['chome_t'] = $sqlObj->chome_t;                
            $data['cmobile'] = $sqlObj->cmobile;                
            $data['cfax'] = $sqlObj->cfax;                
            $data['cemail'] = $sqlObj->cemail;                
		
            $data['address'] = $sqlObj->address;                
            $data['street'] = $sqlObj->street;                
            $data['building'] = $sqlObj->building;                
            $data['village'] = $sqlObj->village;                
            $data['soi'] = $sqlObj->soi;                
            $data['districtId'] = $sqlObj->districtId;                
            $data['amphurId'] = $sqlObj->amphurId;                
            $data['provinceId'] = $sqlObj->provinceId;                
            $data['zip'] = $sqlObj->zip;                
            $data['caddress'] = $sqlObj->caddress;                
            $data['cstreet'] = $sqlObj->cstreet;                
            $data['cbuilding'] = $sqlObj->cbuilding;                
            $data['cvillage'] = $sqlObj->cvillage;                
            $data['csoi'] = $sqlObj->csoi;                
            $data['cdistrictId'] = $sqlObj->cdistrictId;                
            $data['camphurId'] = $sqlObj->camphurId;                
            $data['cprovinceId'] = $sqlObj->cprovinceId;                
            $data['czip'] = $sqlObj->czip;  
            $data['cline_id'] = $sqlObj->cline_id;                
            $data['cfacebook_name'] = $sqlObj->cfacebook_name;  
            $data['irelation'] = $sqlObj->irelation;  
            $data['iname_f'] = $sqlObj->iname_f;  
            $data['iname_t'] = $sqlObj->iname_t;  
            $data['iphone'] = $sqlObj->iphone;  
            $data['iid_card'] = $sqlObj->iid_card; 
            $data['bankcode'] = $sqlObj->bankcode;                        
            $data['branch'] = $sqlObj->branch;                        
            $data['acc_type'] = $sqlObj->acc_type;                        
            $data['acc_no'] = $sqlObj->acc_no;                        
            $data['acc_name'] = $sqlObj->acc_name;    
            $data['hpv'] = $sqlObj->hpv;    
			if($data['bankcode'] != ""){
				$sql = "SELECT * FROM ".$dbprefix."bank WHERE bankcode='".$data['bankcode']."'";	
				$result = mysql_query($sql);	
				if(mysql_num_rows($result)<=0){
					$data['bankname'] = "";
				}else{
					$bankinfo = mysql_fetch_object($result);
					$data['bankname'] = $bankinfo->bankname;
				}
			}	
		}
    return $data;
}
function checkStatus($mcd,$fdate){    
			$mm=explode('-',$fdate);
			$mmdate=$mm[0].$mm[1];
            $status = "0";
          $sql = "SELECT pv,pvb,status FROM ali_status WHERE mcode='$mcd' and month_pv = '$mmdate' and status=1 ";  
            $rs = mysql_query($sql);
            if(mysql_num_rows($rs) > 0){
              $status=true;
            } else{
				$status=false;
			}    
        return $status;
    }
function Status_all($mcd,$pos_cur,$month){     
	 global  $array_mpos;
        $sadate = date("Y-m-d");
		$status = 0;
        $fdate = date("Y-m-d",strtotime("first day of $sadate +$month month")); 
        $thisMonth = date("Y-m",strtotime("first day of $fdate "));  
        $thisMonthxx = date("Ym",strtotime("first day of $fdate "));  
        $lastMonth =  lastMonth(date("Y-m-01",strtotime("first day of $fdate ")));  
		$status1['tot_pv'] = 0;
           
        $sql = "SELECT status,pv,first_regis from ali_status WHERE  mcode='$mcd' and month_pv LIKE '%".$thisMonthxx."%'   order by id DESC LIMIT 0,1 ";
		//echo $sql.'<br>';
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs)>0) { 
			$row = mysql_fetch_object($rs);
                $pv = $row->pv;
                $first_regis = $row->first_regis;
             $status = 1; 
			 if($first_regis == 1)$status1['tot_pv'] = "ฟรีเดือนสมัคร"; 
			 else $status1['tot_pv'] = $pv; 
        }else{          
            $where = "sadate LIKE '%".$lastMonth."%'  and sa_type = 'Q' and cancel = 0 and tot_pv > 0  and mcode = '".$mcd."' ";
            $sql  = " SELECT mcode,SUM(tot_pv) as tot_pv FROM  ";
            $sql .= " ( ";
            $sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh ";
            $sql .= "    WHERE ".$where." GROUP BY mcode ";
            $sql .= " UNION ALL ";
            $sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_holdhead ";
            $sql .= "    WHERE ".$where." GROUP BY mcode ";
            $sql .= " ) as tb ";
            $sql .= " GROUP BY mcode ";
			//echo $sql;
			//exit;
            $rs = mysql_query($sql);
            $num =  mysql_num_rows($rs);
            $arr = array();
            if(mysql_num_rows($rs) > 0)
            {    
                $row = mysql_fetch_object($rs);
                $mcode = $row->mcode;
                $tot_pv = $row->tot_pv; 
                $status1['tot_pv'] = $tot_pv; 
                $status1['stauts'] = '';  
                $status_pv =  $array_mpos[$pos_cur];   
                if($status1['tot_pv'] >=($status_pv)){
                     $status = 1;
                }else{
                   $status1['tot_pv'] = 0;
                   $status = 0;       
                }       
            }
        }
        
		if($status1['tot_pv'] != 'ฟรีเดือนสมัคร')$status1['tot_pv'] = number_format($status1['tot_pv'],0,'.',',');
        $status1['status'] = $status;     
        if($status == '0')$status1['text'] = '<font color=#c00000><b>(ยังไม่รักษายอด)</b></font>';
        if($status == '1')$status1['text'] = '<font color=#0000FF><b>(รักษายอดสมบูรณ์แล้ว)</b></font>';
        
		//var_dump($status1);
        return $status1;
}

function getStatus($mcd,$pos_cur,$sadate){    
        global  $array_mpos_cls;
		$data=array();
        $thisMonthxx =  date("Y-m",strtotime("first day of $sadate "));  
        $thismonth =  date("Ym",strtotime("first day of $sadate "));  
		$status1['tot_pv'] = 0;
     
		$where = "sadate LIKE '%".$thisMonthxx."%'  and (sa_type = 'B' or sa_type = 'Q') and cancel = 0 and tot_pv > 0  and mcode = '".$mcd."' ";
		$sql  = " SELECT mcode,ifnull(SUM(tot_pv),0) as tot_pv FROM  ";
		$sql .= " ( ";
		$sql .= " SELECT mcode,SUM(total) as tot_pv  FROM ali_asaleh ";
		$sql .= "    WHERE ".$where." GROUP BY mcode ";
		$sql .= " UNION ALL ";
		$sql .= " SELECT mcode,SUM(total) as tot_pv  FROM ali_holdhead ";
		$sql .= "    WHERE ".$where." GROUP BY mcode ";
		$sql .= " ) as tb ";
		$sql .= " GROUP BY mcode ";
		//echo $sql.'<br>';
		$rs = mysql_query($sql);
		$num =  mysql_num_rows($rs);
		$arr = array();
		if(mysql_num_rows($rs) > 0)
		{    
			 $row = mysql_fetch_object($rs);
			$mcode = $row->mcode;
			$tot_pv = $row->tot_pv; 
			
			if($tot_pv >=$array_mpos_cls[$pos_cur]){
				 $data['text']="<font color=#0000FF><b>(รักษายอดสมบูรณ์แล้ว)($tot_pv)</b></font>"; 
				 $data['status']=true;
			}else{
				$data['text']="<font color=#c00000><b>(ยังไม่รักษายอด)(".$tot_pv." )</b></font>";  
				$data['status']=false;
			}  

		}else{
			$tot_pv=0;
			 $data['text']="<font color=#c00000><b>(ยังไม่รักษายอด)(".$tot_pv." )</b></font>"; 
			 $data['status']=false;
		}


        return $data;
    }
function get_status($mcode,$sadate,$pos_cur){
	global $array_mpos_cls;
	$d=explode('-',$sadate);
	$thismonth=$d[0]."".$d[1];
	$sql = "SELECT status from ali_status WHERE  mcode='$mcode' and month_pv LIKE '%".$thismonth."%'  and status = '1'  order by id DESC LIMIT 0,1 "; 

    $rs = mysql_query($sql); 
    if(mysql_num_rows($rs)>0) {  
         $status = mysql_result($rs,0,'status');         
    }else{ 
     $status =0;
    }   
        
	if($status == 1){
		$data['status']="1";
		$data['ch_status']="<font color=#0000FF><b>(รักษายอดแล้ว)</b></font>";
	}else{
		$data['status']="0";
		$data['ch_status']="<font color=#c00000><b>(ยังไม่รักษายอด)</b></font>";
	}

	return $data;
}
function getAutoship($mcd,$state){ 
	
	  $mm = date("Y-m", strtotime("first day of +$state Month")) ;
            $sql = "SELECT ifnull(sum(total),0) as tot_autoship FROM ali_eatoship WHERE mcode='$mcd' and sadate LIKE'%$mm%' AND CANCEL= 0 ";
        //    echo $sql;
            $rs = mysql_query($sql);
            if(mysql_num_rows($rs) > 0){            
              $total = mysql_result($rs,0,'tot_autoship');                      
            }
    return $total;
}
	
  
function check_status($mcd,$pos_cur,$fdate){     
        global $array_mpos_cls,$member_qualify;   
       $status1['tot_pv'] = $status= 0;  
        $thisMonth = date("Y-m",strtotime("first day of $fdate ")); 
        $thisMonthxx = date("Ym",strtotime("first day of $fdate "));  
        $lastMonth =  lastMonth(date("Y-m-01",strtotime("first day of $fdate ")));  
      
        $sql = "SELECT status from ali_status WHERE  mcode='$mcd' and first_regis = '1' and month_pv LIKE '%".$thisMonthxx."%'   order by id DESC LIMIT 0,1 "; 
        $rs = mysql_query($sql); 
       
        if(mysql_num_rows($rs)>0) { 
             $status = 1; 
             $status1['tot_pv'] = 'ฟรีเดือนสมัคร'; 
        }
		
		if($status == '0'){
			$sqlx = " SELECT SUM(c.total) as tot_pv ,c.mcode ";
			$sqlx .= " FROM ali_eatoship c "; 
			$sqlx.=" WHERE c.cancel='0' and c.sadate LIKE  '%".$thisMonth."%' and c.mcode = '$mcd' ";
			$sqlx.=" GROUP BY c.mcode";
			//echo $sqlx;
            $rsx = mysql_query($sqlx);
            $numx =  mysql_num_rows($rsx);
            if(mysql_num_rows($rsx) > 0)
            {
                $rowx = mysql_fetch_object($rsx);
                $mcode = $rowx->mcode;
                $tot_pv = $rowx->tot_pv;    
                $status1['tot_pv'] = $tot_pv;    
                if($status1['tot_pv'] >= 2200){
                     $status = 1;
					 $status1['stype'] = 'B';
                }else{
                     $status = 0;                
                } 
            }else{
                $status1['tot_pv'] = 0;
                $status = 0;       
            } 

		}

		if($status == '0'){
			$sqlx = " SELECT SUM(c.total) as tot_pv ,c.mcode ";
			$sqlx .= " FROM ali_voucher c "; 
			$sqlx.=" WHERE c.cancel='0' and c.sadate LIKE  '%".$thisMonth."%' and c.mcode = '$mcd' ";
			$sqlx.=" GROUP BY c.mcode";
            $rsx = mysql_query($sqlx);
			
            $numx =  mysql_num_rows($rsx);
            if(mysql_num_rows($rsx) > 0)
            {
                $rowx = mysql_fetch_object($rsx);
                $mcode = $rowx->mcode;
                $tot_pv = $rowx->tot_pv;    
                $status1['tot_pv'] = $tot_pv;    
                if($status1['tot_pv'] >= 2200){
                     $status = 1;
					 $status1['stype'] = 'B';
                }else{
                     $status = 0;                
                } 
            }else{
                $status1['tot_pv'] = 0;
                $status = 0;       
            } 

		}

        $find = in_array($mcd,$member_qualify );
        if($find){
			$status = 1; 
			$status1['tot_pv'] = 2200;
		}

        $status1['status'] = $status;
        if($status == '0')$status1['text'] = '<font color=#c00000><b>(ยังไม่รักษายอด)</b></font>';
        if($status == '1')$status1['text'] = '<font color=#0000FF><b>(รักษายอดสมบูรณ์แล้ว)</b></font>';
    return $status1;
}  
  
  function check_status_1($mcd,$pos_cur,$fdate){ 
	global $member_qualify;
		$thisMonth = date("Y-m",strtotime("first day of $fdate ")); 
        $thisMonthxx = date("Ym",strtotime("first day of $fdate "));  
        $firstMonth =  lastMonth(date("Y-m-10",strtotime("first day of $fdate ")));  
        global $array_mpos_cls,$member_qualify;   
			$wherex = "sadate LIKE '%".$thisMonth."%' and sadate <= '{$firstMonth}'and v and (sa_type = 'B' or  sa_type = 'A') and cancel = 0 and tot_pv > 0  and mcode = '".$mcd."' "; 
            $sqlx = " SELECT mcode,SUM(tot_pv) as tot_pv,sadate FROM  ";
            $sqlx .= " ( ";
            $sqlx .= " SELECT mcode,SUM(tot_pv) as tot_pv,sadate  FROM ali_asaleh ";
            $sqlx .= "    WHERE ".$wherex."  ";
            $sqlx .= " UNION ALL ";
            $sqlx .= " SELECT mcode,SUM(tot_pv) as tot_pv,sadate  FROM ali_holdhead ";
            $sqlx .= "    WHERE ".$wherex." ";
            $sqlx .= " ) as tb "; 
            $sqlx .= " ORDER BY tot_pv DESC limit 0,1 ";                              
            $rsx = mysql_query($sqlx);
			echo $sqlx;
            $numx =  mysql_num_rows($rsx);
            if(mysql_num_rows($rsx) > 0)
            {
                $rowx = mysql_fetch_object($rsx);
                $mcode = $rowx->mcode;
                $tot_pv = $rowx->tot_pv;    
                $sadate = $rowx->sadate;    
                $status1['tot_pv'] = $tot_pv;     
            }else{
                $status1['tot_pv'] = 0;
                $status = 0;       
            } 
			
			$find = in_array($mcd,$member_qualify );
			if($find){
				$status1['tot_pv'] = 200;
			}
			
    return $status1;
}  
  
 
function log_ewallet($table,$mcode,$sano,$total,$sa_type,$sadate,$option='',$recal=''){     
   global $arr_ewallet_type;      

   
    if($sa_type =='I' or $sa_type =='CI' or $sa_type =='TI' ){
       $IN = $total;
       $OUT = 0; 
    }else if($sa_type =='O'  or $sa_type =='CO' or $sa_type =='TO' or $sa_type =='W'){
       $IN = 0;
       $OUT = $total;          
    }else{
       $IN = 0;
       $OUT = 0;          
    }
   
    if(($IN+$OUT) != 0 ){
       $data = get_detail_meber($mcode,$sadate);
       $insert = array(
                    "mcode"     => $mcode,                  
                    "sadate"    => $sadate,
                    "sano"      => $sano,
                    "_in"       => $IN,
                    "_out"      => $OUT,
                    "total"     => $data[$table],    
                    "sa_type"   => $sa_type,    
                    "_option"   => $option,    
                );
		//if($mcode == 'TH0000001')print_r($insert);
       insert('ali_log_'.$table,$insert);       
    }  
} 
  
  
  
  
  
    
    
//////////////////////////////////////////////
function get_part_upa($val,$data,$level=0){   
    $path = array();   
    if($val['upa_code'] != ''){
       $path[$val['upa_code']]['upa_code'] = $val['upa_code'];  
       $path[$val['upa_code']]['lr'] = $val['lr'];  
       $path[$val['upa_code']]['level'] = ++$level;  
       $path = array_merge($path,get_part_upa($data[$val['upa_code']],$data,$level));     
    } 
   return $path;
}
         
function get_part_sp($val,$data,$level=0){   
    $path = array(); 
    if($val['sp_code'] != ''){
       $path[$val['sp_code']]['sp_code'] = $val['sp_code'];  
       $path[$val['sp_code']]['level'] = ++$level;  
       $path[$val['sp_code']]['pos_cur'] = $data[$val['sp_code']]['pos_cur'];  
       $path = array_merge($path,get_part_sp($data[$val['sp_code']],$data,$level));     
    } 
   return $path;  
}       
function get_lr_sp($val,$data,$sp_code){ 
    $path = array(); 
    if($val['upa_code'] != ''){
        if($val['upa_code'] == $sp_code){
            return $val['lr'];  
        }else{
            return get_lr_sp($data[$val['upa_code']],$data,$sp_code);
        } 
    }  
}
        

///////// gencode ///
function gencodesale_ewallet($sanof,$table){                                                  
    require_once 'connectmysql.php';     
        $sano_f = $sanof;      
        $sql = "SELECT  MAX(sano) as sano  FROM ali_".$table." where sano LIKE '$sanof%' order by id DESC limit 0,1 ";    
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs) > 0){
            $csano = substr(mysql_result($rs,0,'sano'),-6);
        }
        else
        {
            $csano = '000001';
        }                                  
        $tsano = $csano+1;                 
        $sano = $csano+1;              
        $year = date('Y');
        $month = date('m');    
        $year = substr($year,2,2);
        $fsano = $year.$month;            
        $sano = gencodexx($sano,6);
        $sano = $sano_f.$fsano.$sano;    
        return $sano; 
} 

function gencodexx($source,$num){
    for($i=strlen($source);$i<$num;$i++)
        $source = "0".$source;
    return $source;
}


class stocks {
/* Set_data
1.id ของบิล 
2.บิลขายหรือบิลเบิก[asale, isale, tsale]
3.สถานะ [sender, receive, cancel]
	- จัดส่ง
	- รับของ
	- ยกเลิก 
4.ช่องทาง checkportal[1, 2, 3]
	- 1 เท่ากับ Backoffice
	- 2 เท่ากับ Branch
	- 3 เท่ากับ Memeber
*/
	var $date		 = "";
	var $table_stock = "";
	var $table_saleh = "";
	var $table_saled = "";
	var $mcode       = "";
	var $name_t      = "";
	var $inv_code    = "";
	var $inv_ref     = ""; 
	var $action_code = "";
	var $action_name = "";
	var $action_inv  = "";
	var $uid 	     = "";
	var $sano 	     = "";
	var $id 	     = "";
	var $sa_type     = "";
	var $status 	 = "";
	var $checkportal = "";
	var $send		 = ""; // 1 = send, 2 = not send
	var $sender		 = ""; 
	var $receive	 = ""; 
	var $cancel		 = ""; 
	var $billb		 = ""; 
	function set_data($id,$billb,$status,$checkportal){
		$this->date = date("Y-m-d");
		if(isset($id)){$this->id = $id;}
		if(isset($billb)){$this->billb = $billb;}
		if(isset($status)){$this->status = $status;}
		if(isset($checkportal)){$this->checkportal = $checkportal;}
		if(isset($checkportal)){
			switch ($checkportal) {
				case "1": $this->table_stock  = "ali_product";
						  $this->action_code  = $_SESSION["adminusercode"];
						  $this->action_name  = $_SESSION["adminusername"];
						  $this->action_inv   = "HQ";
						break;
				case "2": $this->table_stock  = "ali_product_invent";
						  $this->action_code  = $_SESSION["inv_usercode"];
						  $this->action_name  = $_SESSION["inv_username"];
						  $this->action_inv   = $_SESSION["admininvent"];
						break;
				case "3": $this->table_stock  = "ali_product_invent";
						  $this->action_code  = $_SESSION["usercode"];
						  $this->action_name  = $_SESSION["username"];
						  $this->action_inv   = $_SESSION["usercode"];
						break;
			}
		}
		if(isset($billb)){
			if($billb == "asale" or $billb == "asale_qtyr"){
				$this->table_saleh = "ali_asaleh";
				$this->table_saled = "ali_asaled";
			}
			else if($billb == "isale"){
				$this->table_saleh = "ali_isaleh";
				$this->table_saled = "ali_isaled";
			}
			else if($billb == "tsale"){
				$this->table_saleh = "ali_tsaleh";
				$this->table_saled = "ali_tsaled";
			}
			else if($billb == "ostock"){
				$this->table_saleh = "ali_ostockh";
				$this->table_saled = "ali_ostockd";
			}
			else if($billb == "istock"){
				$this->table_saleh = "ali_istockh";
				$this->table_saled = "ali_istockd";
			}
			else if($billb == "import"){
				$this->table_saleh = "ali_import_stock_h";
				$this->table_saled = "ali_import_stock_d";
			}
		}
		if(!empty($id)){
			$sql = "SELECT * FROM ". $this->table_saleh ." WHERE id = '".$id."' ";
			$rs  = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				$object 		 = mysql_fetch_object($rs);
				if($billb == "asale" or $billb == "asale_qtyr"){
					$this->mcode  = $object->mcode;
					$this->name_t = $object->name_t;
				}
				if($billb == "isale"  or $billb == "tsale" or $billb == "asale" or $billb == "asale_qtyr" or $billb == "import" or $billb == "istock" or $billb == "ostock"){
					$this->send    = $object->send; 
					$this->sender  = $object->sender; 
					$this->receive = $object->receive; 
				}
				$this->sa_type = $object->sa_type; 
				$this->sano  	 = $object->sano;	
				$this->inv_code  = $object->inv_code;	
				$this->uid  	 = $object->uid;	
				$this->cancel  	 = $object->cancel;	
			}
			/*
			echo $this->send ."<BR>";
			echo $this->sender ."<BR>";
			echo $this->receive ."<BR>";
			echo $this->sa_type ."<BR>";
			echo $this->sano ."<BR>";
			echo $this->inv_code ."<BR>";
			echo $this->uid ."<BR>";
			echo $this->cancel ."<BR>";
			exit;
			*/
			if($billb == "import"){
				if($this->status == "receive"){
					$this->cal_stocks_sale(1,"1");
				}
				else if($this->status == "cancel"){
					$this->cal_stocks_sale(-1,"0");
					$this->calc_stock_cancel();
				}
			}
			
			if($billb == "isale" or $billb == "tsale"){
				if($this->status == "sender"){
					if($this->receive == '0'){
						if($this->send == '1'){			// กรณีเปิดบิลจาก backoffice หรือ branch แบบจัดส่ง
							if($this->sender == '1'){
								// function คืนของแล้วปรับสถานะ sender = 0
								$this->cal_stocks_sale(1,"0");
							}
							else if($this->sender == '0'){
								// function ส่งของแล้วปรับสถานะ sender = 1
								$this->cal_stocks_sale(-1,"1");
							}
						}
						else if($this->send == '2'){	// กรณีเปิดบิลจาก backoffice หรือ branch แบบไม่จัดส่งให้ตัดสต๊อกเลย
							// function ส่งของแล้วไม่ปรับสถานะ  
							$this->cal_stocks_sale(-1,"0");
						}
					}
				}
				if($this->status == "receive"){
					if($this->send == '2'){
						if($this->receive == '1'){
							// function คืนของแล้วปรับสถานะ receive = 0
							$this->cal_stocks_sale(-1,"0");
						}
						else if($this->receive == '0'){
							// function รับของแล้วปรับสถานะ receive = 1
							$this->cal_stocks_sale(1,"1");
						}
					}
					else if($this->send == '1'){
						if($this->sender == '1'){
							if($this->receive == '1'){
								// function คืนของแล้วปรับสถานะ receive = 0
								$this->cal_stocks_sale(-1,"0");
							}
							else if($this->receive == '0'){
								// function รับของแล้วปรับสถานะ receive = 1
								$this->cal_stocks_sale(1,"1");
							}
						}
					}
				}
				if($this->status == "cancel"){
					if($this->receive == '0'){
						if($this->send == '1'){
							if($this->sender == '1'){
								$this->cal_stocks_sale(1,"0");
								$this->calc_stock_cancel();
							}
							else{
								$this->calc_stock_cancel();
							} 
						}
						else if($this->send == '2'){
								$this->cal_stocks_sale(1,"0");	
								$this->calc_stock_cancel();
						}
					}
				}
			}
			if($billb == "ostock"){
				if($this->checkportal == "2"){
					if(($this->sa_type == "BBHO" or $this->sa_type == "BB") and $this->status == 'sender'){
						$this->cal_stocks_sale(-1,"0");
					}
					else if($this->status == 'receive' and $this->receive == '0'){
						$this->calc_stock_sale_qtyr(-1,"1");
					}
				}
				else if($this->checkportal == "1"){
					if($this->sa_type == "BBHO" or $this->sa_type == "BB"){
						$this->cal_stocks_sale(-1,"0");
						//$this->calc_stock_sale_qtyr(-1,"1");
					}
				}
			}
			if($billb == "istock"){
				/*
				if(($this->sa_type == "BRHO" or $this->sa_type == "BR") and $this->status == 'sender'){
					$this->cal_stocks_sale(1,"0");
				}
				else if($this->status == 'receive' and $this->receive == '0'){
					$this->calc_stock_sale_qtyr(1,"1");
				}
				*/
				if($this->checkportal == "2"){
					if($this->sa_type == "BRHO" or $this->sa_type == "BR"){
						$this->cal_stocks_sale(1,"0");
						$this->calc_stock_sale_qtyr(1,"1");
					}
				}
				else if($this->checkportal == "1"){
					if($this->sa_type == "BRHO" or $this->sa_type == "BR"){
						$this->cal_stocks_sale(1,"0");
						//$this->calc_stock_sale_qtyr(1,"1");
					}
				}
			}
			if($billb == "asale"){
				if($this->status == 'sender'){
					if($this->send == '1'){
						$this->cal_stocks_sale(-1,"0");
					}
					else if($this->send == '2'){
						$this->cal_stocks_sale(-1,"0");
					}
				}
				if($this->status == 'cancel'){
					if($this->receive == '0'){
						$this->cal_stocks_sale(1,"0");
						if($this->send == '1'){
							if($this->sender == '1'){
								$this->calc_stock_sale_qtyr(1,"0");
							}
						}
						else if($this->send == '2'){
							if($this->receive == '1'){
								$this->calc_stock_sale_qtyr(1,"0");
							}
						}
						$this->calc_stock_cancel(); 
					}
					
				}
			}
			if($billb == "asale_qtyr"){ 
				if($this->status == "sender"){ 
					if($this->receive == '0'){
						if($this->send == '1'){	
							if($this->sender == '1'){
								$this->calc_stock_sale_qtyr(1,"0");
							}
							else if($this->sender == '0'){
								$this->calc_stock_sale_qtyr(-1,"1");
							}
						}
						else if($this->send == '2'){	
							$this->calc_stock_sale_qtyr(0,"0");
						}
					}
				}
				if($this->status == "receive"){
					if($this->send == '2'){
						if($this->receive == '1'){
							$this->calc_stock_sale_qtyr(1,"0");
						}
						else if($this->receive == '0'){
							$this->calc_stock_sale_qtyr(-1,"1");
						}
					}
					else if($this->send == '1'){
						if($this->sender == '1'){
							if($this->receive == '1'){
								$this->calc_stock_sale_qtyr(0,"0");
							}
							else if($this->receive == '0'){
								$this->calc_stock_sale_qtyr(0,"1");
							}
						}
					}
				}
			}
		}
	} 
	function cal_stocks_sale($calc,$change){
		if(!empty($this->table_stock) and !empty($this->id) and $this->cancel == '0'){
			$sql = "SELECT * FROM ". $this->table_saled ." WHERE sano = '". $this->id ."' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$object 	= mysql_fetch_object($rs);
					$pcode		= $object->pcode;
					$pdesc		= $object->pdesc;
					$price		= $object->price;
					$pv			= $object->pv;
					$qty		= $object->qty;
					$qty		= $qty*$calc;
					$amt		= $object->amt;
					
					$sql_pp = "SELECT * FROM ali_product_package1 where package = '".$pcode."' ";
					$rs_pp  = mysql_query($sql_pp);
					if(mysql_num_rows($rs_pp) > 0){
						for($m=0;$m<mysql_num_rows($rs_pp);$m++){
							$obj_pp   = mysql_fetch_object($rs_pp);
							$pp_pcode = $obj_pp->pcode;	//รหัสสินค้าใน  package
							$pp_pdesc = $obj_pp->pdesc;	//รหัสสินค้าใน  package
							$pp_qty   = $obj_pp->qty;	//จำนวนสินค้าใน  package
							$pp_qty	  = $pp_qty*$qty;	//จำสินค้าใน  package คูณ จำนวน  package ที่ซื้อมา
							
							$sql_qty  = "SELECT qty, ifnull(qtyr,0) as qtyr FROM ".$this->table_stock ." ";
							$sql_qty .= "WHERE pcode = '".$pp_pcode."' ";
							if($this->checkportal == "2" or $this->checkportal == "3"){$sql_qty .= "and inv_code = '".$this->inv_code ."'";}
							$rs_qty   = mysql_query($sql_qty);
							$qty_before = 0;
							if(@mysql_num_rows($rs_qty) > 0){
								$qty_before = mysql_result($rs_qty,0,'qty');	//จำนวนเก่า
								$qty_before_r = mysql_result($rs_qty,0,'qtyr');	//จำนวนเก่า
							}
							$qty_after  = $qty_before+$pp_qty;					//จำนวนเก่า บวก หรือ ลบ จำนวนใหม่
							$qty_after_r  = $qty_before_r+$pp_qty;					//จำนวนเก่า บวก หรือ ลบ จำนวนใหม่
							
							$sql_chr  = "SELECT * FROM ".$this->table_stock ." ";
							$sql_chr .= "WHERE pcode = '".$pp_pcode."' ";
							if($this->checkportal == "2" or $this->checkportal == "3"){$sql_chr .= "and inv_code = '".$this->inv_code ."'";}
							$rs_chr   = mysql_query($sql_chr);
							if(mysql_num_rows($rs_chr) > 0){
								$sql_update  = "UPDATE ".$this->table_stock ." SET qty = qty+'".$pp_qty."' ";
								if($this->billb == "isale" or $this->billb == "tsale" or ($this->billb == "ostock" and $this->sa_type == "BB") or ($this->billb == "istock" and $this->sa_type == "BR")){$sql_update .= ",qtyr = qtyr+'".$qty."' ";}
								$sql_update .= "WHERE pcode = '".$pp_pcode."' ";
								if($this->checkportal == "2" or $this->checkportal == "3"){$sql_update .= "and inv_code = '".$this->inv_code ."' ";}
							}
							else{
								$sql_update  = "INSERT INTO ".$this->table_stock ."(pcode,qty,qtyr,inv_code) ";
								$sql_update .= "VALUES ('".$pp_pcode."','".$pp_qty."',";
								if($this->billb == "isale" or $this->billb == "tsale" or ($this->billb == "ostock" and $this->sa_type == "BB")){$sql_update .= "'".$pp_qty."',";}else{$sql_update .= "'',";}
								$sql_update .= "'".$this->inv_code ."')";
							} 
							mysql_query($sql_update);
							$this->log_stockcard_s($pp_pcode,$pp_pdesc,$qty_after,$pp_qty,$qty_before,"ali_stockcard_s");
							if(($this->billb == "isale" and $this->status == "receive") or ($this->billb == "tsale" and $this->status == "sender") or ($this->billb == "ostock" and $this->sa_type == "BB")){$this->log_stockcard_s($pp_pcode,$pp_pdesc,$qty_after_r,$pp_qty,$qty_before_r,"ali_stockcard_r");} 
						}
					}
					else{
						$sql_p  = "SELECT qty,ifnull(qtyr,0) as qtyr FROM ".$this->table_stock ." ";
						$sql_p .= "WHERE pcode = '".$pcode."' ";
						if($this->checkportal == "2" or $this->checkportal == "3"){$sql_p .= "and inv_code = '".$this->inv_code ."' ";}
						$rs_p   = mysql_query($sql_p);
						$qty_before = 0;
						if(@mysql_num_rows($rs_p) > 0){
							$qty_before = mysql_result($rs_p,0,'qty');			//จำนวนเก่า			
							$qty_before_r = mysql_result($rs_p,0,'qtyr');			//จำนวนเก่า			
						}
						$qty_after = $qty_before+$qty;							//จำนวนเก่า บวก หรือ ลบ จำนวนใหม่
						$qty_after_r = $qty_before_r+$qty;							//จำนวนเก่า บวก หรือ ลบ จำนวนใหม่

						$sql_chr  = "SELECT * FROM ".$this->table_stock ."  ";
						$sql_chr .= "WHERE pcode = '".$pcode."' ";
						if($this->checkportal == "2" or $this->checkportal == "3"){$sql_chr .= "and inv_code = '".$this->inv_code ."'";}
						$rs_chr   = mysql_query($sql_chr);
						if(mysql_num_rows($rs_chr) > 0){
							$sql_update  = "UPDATE ".$this->table_stock ." SET qty = qty+'".$qty."' ";
							if($this->billb == "isale" or $this->billb == "tsale"){$sql_update .= ",qtyr = qtyr+'".$qty."' ";}
							$sql_update .= "WHERE pcode='".$pcode."' ";
							if($this->checkportal == "2" or $this->checkportal == "3"){$sql_update .= "and inv_code = '".$this->inv_code ."' ";}
						} 
						else{
							$sql_update  = "INSERT INTO ".$this->table_stock ."(pcode,qty,qtyr,inv_code) ";
							$sql_update .= "VALUES ('".$pcode."','".$qty."',";
							if($this->billb == "isale" or $this->billb == "tsale"){$sql_update .= "'".$qty."',";}else{$sql_update .= "'',";}
							$sql_update .= "'".$this->inv_code ."')";  
						} 
						mysql_query($sql_update);
						$this->log_stockcard_s($pcode,$pdesc,$qty_after,$qty,$qty_before,"ali_stockcard_s");
						if(($this->billb == "isale" and $this->status == "receive") or ($this->billb == "tsale" and $this->status == "sender") or ($this->billb == "tsale" and $this->status == "cancel")){$this->log_stockcard_s($pcode,$pdesc,$qty_after_r,$qty,$qty_before_r,"ali_stockcard_r");}
					}
				}
					$sqlUpdate  = "UPDATE ".$this->table_saleh ." SET ";
					$sqlUpdate .= $this->status ." = '".$change."' ";
					$sqlUpdate .= ",".$this->status ."_date = '".$this->date."' ";
					$sqlUpdate .= ",".$this->status ."_date = '".$this->date."' ";
					if($change == '1'){$sqlUpdate .= ",uid_".$this->status ." = '".$this->action_name."' ";}
					else{$sqlUpdate .= ",uid_".$this->status ." = '' ";}
					$sqlUpdate .= "WHERE id = '".$this->id ."' ";
					$rsUpdate   = mysql_query($sqlUpdate);
			}
		}
	}
	function calc_stock_sale_qtyr($calc,$change){
		if(!empty($this->table_stock) and !empty($this->id) and $this->cancel == '0'){
			$sql = "SELECT * FROM ". $this->table_saled ." WHERE sano = '". $this->id ."' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$object 	= mysql_fetch_object($rs);
					$pcode		= $object->pcode;
					$pdesc		= $object->pdesc;
					$price		= $object->price;
					$pv			= $object->pv;
					$qty		= $object->qty;
					$qty		= $qty*$calc;
					$amt		= $object->amt;
					
						
					
					$sql_pp = "SELECT * FROM ali_product_package1 where package = '".$pcode."' ";
					$rs_pp  = mysql_query($sql_pp);
					if(mysql_num_rows($rs_pp) > 0){
						for($m=0;$m<mysql_num_rows($rs_pp);$m++){
							$obj_pp   = mysql_fetch_object($rs_pp);
							$pp_pcode = $obj_pp->pcode;	//รหัสสินค้าใน  package
							$pp_qty   = $obj_pp->qty;	//จำนวนสินค้าใน  package
							$pp_qty	  = $pp_qty*$qty;	//จำสินค้าใน  package คูณ จำนวน  package ที่ซื้อมา
							
							$sql_qty  = "SELECT qtyr as qty FROM ".$this->table_stock ." ";
							$sql_qty .= "WHERE pcode = '".$pp_pcode."' ";
							if($this->checkportal == "2" or $this->checkportal == "3"){$sql_qty .= "and inv_code = '".$this->inv_code ."'";}
							$rs_qty   = mysql_query($sql_qty);
							$qty_before = 0;
							if(@mysql_num_rows($rs_qty) > 0){
								$qty_before = mysql_result($rs_qty,0,'qty');	//จำนวนเก่า
							}
							$qty_after  = $qty_before+$pp_qty;	
							
							$sql_chr  = "SELECT * FROM ".$this->table_stock ." ";
							$sql_chr .= "WHERE pcode = '".$pp_pcode."' ";
							if($this->checkportal == "2" or $this->checkportal == "3"){$sql_chr .= "and inv_code = '".$this->inv_code ."'";}
							$rs_chr   = mysql_query($sql_chr);
							if(mysql_num_rows($rs_chr) > 0){
								$sql_update  = "UPDATE ".$this->table_stock ." SET qtyr = qtyr+'".$pp_qty."' ";
								$sql_update .= "WHERE pcode = '".$pp_pcode."' ";
								if($this->checkportal == "2" or $this->checkportal == "3"){$sql_update .= "and inv_code = '".$this->inv_code ."' ";}
							}
							else{
								$sql_update  = "INSERT INTO ".$this->table_stock ."(pcode,qty,qtyr,inv_code) ";
								$sql_update .= "VALUES ('".$pp_pcode."','".$pp_qty."',";
								if($this->billb == "isale" or $this->billb == "asale_qtyr" or $this->billb == "istock" or $this->billb == "ostock"){$sql_update .= "'".$pp_qty."',";}else{$sql_update .= "'',";}
								$sql_update .= "'".$this->inv_code ."')";  
							}
							mysql_query($sql_update);
							if($calc != 0){$this->log_stockcard_s($pp_pcode,$pdesc,$qty_after,$pp_qty,$qty_before,"ali_stockcard_r");}
						}
					}
					else{
						$sql_p  = "SELECT qtyr as qty FROM ".$this->table_stock ." ";
						$sql_p .= "WHERE pcode = '".$pcode."' ";
						if($this->checkportal == "2" or $this->checkportal == "3"){$sql_p .= "and inv_code = '".$this->inv_code ."' ";}
						$rs_p   = mysql_query($sql_p);
						$qty_before = 0;
						if(@mysql_num_rows($rs_p) > 0){
							$qty_before = mysql_result($rs_p,0,'qty');			//จำนวนเก่า			
						}
						$qty_after = $qty_before+$qty;							//จำนวนเก่า บวก หรือ ลบ จำนวนใหม่
						
						$sql_chr  = "SELECT * FROM ".$this->table_stock ."  ";
						$sql_chr .= "WHERE pcode = '".$pcode."' ";
						if($this->checkportal == "2" or $this->checkportal == "3"){$sql_chr .= "and inv_code = '".$this->inv_code ."'";}
						$rs_chr   = mysql_query($sql_chr);
						if(mysql_num_rows($rs_chr) > 0){
							$sql_update  = "UPDATE ".$this->table_stock ." SET qtyr = qtyr+'".$qty."' ";
							$sql_update .= "WHERE pcode='".$pcode."' ";
							if($this->checkportal == "2" or $this->checkportal == "3"){$sql_update .= "and inv_code = '".$this->inv_code ."' ";}
						}
						else{
							$sql_update  = "INSERT INTO ".$this->table_stock ."(pcode,qty,qtyr,inv_code) ";
							$sql_update .= "VALUES ('".$pcode."','".$qty."',";
							if($this->billb == "isale" or $this->billb == "asale_qtyr" or $this->billb == "istock" or $this->billb == "ostock"){$sql_update .= "'".$qty."',";}else{$sql_update .= "'',";}
							$sql_update .= "'".$this->inv_code ."')";  
						} 
						mysql_query($sql_update);
						if($calc != 0){$this->log_stockcard_s($pcode,$pdesc,$qty_after,$qty,$qty_before,"ali_stockcard_r");} 
					}
				}
					$sqlUpdate  = "UPDATE ".$this->table_saleh ." SET ";
					$sqlUpdate .= $this->status ." = '".$change."', ".$this->status ."_date = '".$this->date."', ";
					if($change == '1'){$sqlUpdate .= "uid_".$this->status ." = '".$this->action_name."' ";}
					else{$sqlUpdate .= "uid_".$this->status ." = '' ";}
					$sqlUpdate .= "WHERE id = '".$this->id ."' ";
					$rsUpdate   = mysql_query($sqlUpdate);
					//echo $sqlUpdate;
			}
		}
	}
	function calc_stock_cancel(){
		if($this->cancel == '0'){
			$sqlCancel  = "UPDATE ".$this->table_saleh ." SET ";
			$sqlCancel .= $this->status ." = '1', ".$this->status ."_date = '".$this->date."', ";
			$sqlCancel .= "uid_".$this->status ." = '".$this->action_name."' ";
			$sqlCancel .= "WHERE id = '".$this->id ."' ";
			$rsCancel   = mysql_query($sqlCancel);
		}
	}
	function log_stockcard_s($pcode,$pdesc,$qty_after,$qty,$qty_before,$table_stock){
		$inv_code   = $this->inv_code;
		$inv_ref    = "";
		$inv_action = "";
		$qty		= abs($qty);
		$in_qty = $in_price = $in_total = $out_qty = $out_price = $out_total = $price = $total = 0;
		$sql = "SELECT price FROM ali_product WHERE pcode = '".$pcode."' ";
		$rs  = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$price = mysql_result($rs,0,'price');
		}
		
		$total = $qty * $price;
		if($qty_before > $qty_after){
			$out_qty   = $qty; 
			$out_price = $price;
			$out_total = $total;
		}
		else{
			$in_qty   = $qty;
			$in_price = $price;
			$in_total = $total;
		}
		
		/*
		if($this->status == "sender"){
			$out_qty   = $qty; 
			$out_price = $price;
			$out_total = $total;
		}
		else if($this->status == "receive" or $this->status == "cancel"){
			$in_qty   = $qty;
			$in_price = $price;
			$in_total = $total;
		}
		
		if($this->status == "receive" and ($this->billb == "isale" or $this->billb == "asale_qtyr") and $this->receive == "1"){
			$out_qty   = $qty; 
			$out_price = $price;
			$out_total = $total;
			$in_qty = $in_price = $in_total = 0;  
		}
		if(($this->status == "sender" or $this->status == "cancel") and ($this->billb == "isale" or $this->billb == "asale_qtyr") and $this->sender == "1"){ 
			$in_qty   = $qty; 
			$in_price = $price;
			$in_total = $total;
			$out_qty = $out_price = $out_total = 0;  
		}
		*/
		 
		if(!empty($this->mcode)){
			$code = $this->mcode;
			$name = $this->name_t;
		}
		else{
			$code = $this->action_code;
			$name = $this->action_name;
		}
		
		$hq = "HQ";
		$inv_code   = $this->inv_code;
		$inv_ref    = $this->inv_code;
		if($this->billb == "isale"){
			$inv_ref    = $hq;
		}
		else if($this->billb == "tsale"){
			$inv_code   = $hq;
			$inv_ref    = $this->inv_code; 
		}
		if($this->checkportal == '3'){$this->action_inv = $this->inv_code;}
		if($this->status == "cancel"){$cancel = 1;}
		$sql  = "INSERT INTO ".$table_stock." ";
		$sql .= "(mcode, name_t, inv_code, inv_ref, inv_action, sano, sano_ref, ";
		$sql .= "pcode, in_qty, in_price, in_amount, out_qty, out_price, out_amount, ";
		$sql .= "sadate, rccode, yokma, balance, price, amount, uid, action, pdesc, cancel) ";
		$sql .= "VALUES ";
		$sql .= "('".$code."', '".$name."', '".$inv_code ."', '".$inv_ref ."', '".$this->action_inv ."', '".$this->sano ."', '".$sanox."', ";
		$sql .= "'".$pcode."', '".$in_qty."', '".$in_price."', '".$in_total."', '".$out_qty."', '".$out_price."', '".$out_total."', ";
		$sql .= "'".$this->date ."', '".$rccode."', '".$qty_before."', '".$qty_after."', '".$price."', '".$total."', '".$this->uid ."', '".$this->sa_type ."', '".$pdesc."', '".$cancel."')"; 
		$sql .= "";
		//echo $sql;
		mysql_query($sql);
	}
}

function findBills($column,$first,$bills){
	$num = 6;
	$sql = "";
	if(!empty($bills)){
		$arr_bills = explode(',',$bills);
		$num_arr_bills = count($arr_bills);
		if($num_arr_bills){
			$sql_like .= "(";
			$sql_in .= $first.".".$column." IN (";
			foreach($arr_bills as $keys => $values){
				if(!empty($values)){
					$arr_values = explode('-',$values);
					$num_arr_values = count($arr_values);
					if($num_arr_values > 1){
						$first_0 = substr($arr_values[0],0,-6);
						$last_0  = intval(substr($arr_values[0],-6));
						$first_1 = substr($arr_values[1],0,-6);
						$last_1  = intval(substr($arr_values[1],-6));
						if($last_0 == $last_1){$num_last_ = $last_0;$num_loop = $last_0 - $last_1;}
						else if($last_0 > $last_1){$num_last_ = $last_1;$num_loop = $last_0 - $last_1;}
						else{$num_last_ = $last_0;$num_loop = $last_1 - $last_0;}
						for($i=$num_last_;$i<=($num_loop+$num_last_);$i++){
							$temp_bill = $first_0.gencode_search_bill($i,$num);
							$sql_in .= sqlSort($column,$first,$temp_bill,$keys,$num_arr_bills,"in",$i,($num_loop+$num_last_),"-");
						}
					}
					else{
						$sql_in .= sqlSort($column,$first,$values,$keys,$num_arr_bills,"in",0,0,",");
					}
					
				}
			}
			$sql_like .= ")";
			$sql_in .= ")";
		}
	}
	//echo $sql_in;
	if(strlen($sql_like) < 2){$sql_like = "";}
	if(strlen($sql_in) < 22){$sql_in = "";}
	return $sql_in;
}
function sqlSort($column,$first,$value,$keys1,$nums1,$pattern1,$keys2,$nums2,$pattern2){
	if(!empty($value)){
		$sql_like = $first.".".$column." LIKE '".$value."'";
		$sql_in = "'".$value."'";
	}
	if(($keys1+1) != $nums1 and $pattern2 == ","){
		$sql_like .= " or ";
		$sql_in .= ",";
	}
	if(($keys2) != $nums2 and $pattern2 == "-"){
		$sql_like .= " or ";
		$sql_in .= ",";
	}
	else if(($keys1+1) != $nums1 and $pattern2 == "-"){
		$sql_like .= " or ";
		$sql_in .= ",";
	}
	if($pattern1 == "like"){$sql = $sql_like;}
	if($pattern1 == "in"){$sql = $sql_in;}
	return $sql;
}
function gencode_search_bill($source,$num){
	for($i=strlen($source);$i<$num;$i++)
		$source = "0".$source;
	return $source;
}
function gencodesale_news($sanof='S',$table='ali_asaleh',$inv_code='ONLIN',$locationbase='',$sadate=""){
    $num = 6;
	require_once 'connectmysql.php';
	if(empty($sanof))$sano_f = 'S';
    if($locationbase != ''):
        $lb = locationbase::get_location($locationbase); 
    else:
        $lb = locationbase::get_location(1); 
    endif;
	
	if(empty($sadate))$sadate = date("Y-m-d");

	$year  = date('y',strtotime($sadate));
	$month  = date('m',strtotime($sadate));
     
	if(empty($inv_code)){$inv_code = "ONLIN";}else{$inv_code = $inv_code;}
	$bill_head = $sanof.$lb['cshort'].$inv_code.$year.$month;
	if($sanof == 'H'){$colnumn = 'hono';}else{$colnumn = 'sano';}
	$last_bill = query('*',$table,$colnumn." LIKE '".$bill_head."%' ORDER BY id DESC LIMIT 0,1 ");
	$test = $bill_head.gencode_search_bill(1,$num);
	if(count($last_bill)){
		$count_bill = intval(substr($last_bill[0][$colnumn],-$num))+1;
		$gencode6 = gencode_search_bill($count_bill,$num);
	}
	else{
		$gencode6 = gencode_search_bill(1,$num);
	}
	$bill_head = $bill_head.$gencode6;
	return $bill_head;
}
function checkDateDiff($date1x,$date2x){
	$date1=date_create($date1x);
	$date2=date_create($date2x);
	$diff=date_diff($date1,$date2);
	$datediff = $diff->format("%a");
	return $datediff;
}
function getTrip($mcode,$fdate){
	$sql = "SELECT mcode, IFNULL(SUM(total_pv_private),0) as total_pv_private, IFNULL(SUM(total_pv_team),0) as total_pv_team FROM `ali_trip_bonus` WHERE fdate >= DATE_SUB('".$fdate."',INTERVAL 12 MONTH) and tdate <= '".$fdate."' and mcode = '".$mcode."' GROUP BY mcode ";
	$rs  = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		$object = mysql_fetch_object($rs);
		$mcode  = $object->mcode;
		$total_pv_private  = $object->total_pv_private;
		$total_pv_team  = $object->total_pv_team;
	}
	return array($total_pv_private,$total_pv_team);
}
function getDirector_lr($dbprefix,$fdate,$tdate,$fmcode){
	global $pos_piority1,$array_mpos_cls;
	$firstmonth = date("Y-m-d",strtotime("first day of $fdate"));
	$lastmonth = date("Y-m-d",strtotime("last day of $fdate"));
	$sql="SELECT mcode,sp_code,upa_code,lr,pos_cur,pos_cur1 FROM ".$dbprefix."member ORDER BY id DESC";   
    $rs = mysql_query($sql);
    for($i=0;$i<mysql_num_rows($rs);$i++){
        $sqlObj = mysql_fetch_object($rs);
        $data[$sqlObj->mcode]['mcode']= $sqlObj->mcode; 
        $data[$sqlObj->mcode]['sp_code']= $sqlObj->sp_code;
        $data[$sqlObj->mcode]['upa_code']= $sqlObj->upa_code;
        $data[$sqlObj->mcode]['lr']= $sqlObj->lr; 
        $dataxx =  get_detail_meber($sqlObj->mcode,$tdate);  
        $data[$sqlObj->mcode]['pos_cur']= $dataxx['pos_cur'];  
        $data[$sqlObj->mcode]['pos_cur_date']= $dataxx['pos_cur_date'];
		$data[$sqlObj->mcode]['pos_cur1']= $dataxx['pos_cur1'];  
		$data[$sqlObj->mcode]['pos_cur1_date']= $dataxx['pos_cur1_date'];
		$data[$sqlObj->mcode]['pv']= get_pvxx($data[$sqlObj->mcode]['mcode'],$firstmonth,$lastmonth);
		$data[$sqlObj->mcode]['active'][1] = 0;
		$data[$sqlObj->mcode]['active'][2] = 0;
		$data[$sqlObj->mcode]['star'][1] = 0;
		$data[$sqlObj->mcode]['star'][2] = 0;
		$data[$sqlObj->mcode]['direct'][1] = 0;
		$data[$sqlObj->mcode]['direct'][2] = 0;
    }
	
	foreach($data as $key => $value){
		$path = get_part_sp($value,$data);
		foreach($path as $sp_code => $valx){
			$lr = get_lr_sp($value,$data,$sp_code); 
			if($valx['level'] == '1' and $value['pv'] >= $array_mpos_cls[$value['pos_cur']]){
				$data[$sp_code]['active'][$lr] += 1;
			}
			if($valx['level'] == '1' and $pos_piority1[$value['pos_cur1']] == 1){
				$data[$sp_code]['star'][$lr] += 1;
			}
			if($value['pos_cur1'] == 'D'){
				$data[$sp_code]['direct'][$lr] += 1;
			}
		}
		
	}
	return $data[$fmcode];
}
function get_pvxx($mcode,$fdate='2011-01-01',$tdate=''){ 
	if(!empty($mcode)){
		$sql  = "SELECT IFNULL(SUM(pv),0) as pv FROM ( ";
		$sql .= "SELECT IFNULL(SUM(tot_pv),0) as pv FROM ali_asaleh WHERE mcode = '".$mcode."' and sadate >= '".$fdate."' and sadate <= '".$tdate."' and cancel = '0' ";
		$sql .= "UNION ALL ";
		$sql .= "SELECT IFNULL(SUM(tot_pv),0) as pv FROM ali_holdhead WHERE mcode = '".$mcode."' and sadate >= '".$fdate."' and sadate <= '".$tdate."' and cancel = '0' ";
		$sql .= ") as tb ";
		$rs   = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$object = mysql_fetch_object($rs);
			$pv = $object->pv;
		}
		else{
			$pv = 0;
		}
	}
	return $pv;
}

function posimg($pos_cur) {
			$sql = "SELECT posimg FROM ali_position WHERE posshort ='".$pos_cur."' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				$posname = mysql_result($rs,0,'posimg'); 
				mysql_free_result($rs);
			}
			return $posname;
	}
function updatehpv1($dbprefix,$mcode,$hpv) {
	$sql = "update ".$dbprefix."member set hpv = hpv+'$hpv' WHERE mcode ='$mcode' ";
//	echo $sql.' : 1 <br> ';
	mysql_query($sql);
}
function updatehpv2($dbprefix,$mcode,$hpv) {
	$sql = "update ".$dbprefix."member set hpv = hpv-'$hpv' WHERE mcode ='$mcode' ";
//	echo $sql.' : 2 <br> ';
	mysql_query($sql);
}
function chk_id_card($mcode,$id_card){
	$member_chk = query("mcode","ali_member","mcode != '".$mcode."' and id_card = '".$id_card."'");
	if(count($member_chk)){
		return true;
	}else{
		return false;
	}
}
?>