<? session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<? 

if($_SESSION["perbuy"] == 0){
    echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=6'</script>";
    exit;
}
include("connectmysql.php"); 
include("prefix.php");
require("adminchecklogin.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once("global.php"); 
require_once ("function.log.inc.php");
$data =$product =array();
if(isset($_GET['state']))
{ 
    if(!empty($_POST)):
        foreach($_POST as $key => $val):
             if($val != ''):
               if (in_array($key,array('pcode','pdesc','price','pv','qty','totalprice','totalpv'))):
                 $product[$key] = $val;
               else:
                 $data[$key] = $val; 
               endif;  
             endif;  
       endforeach;  
    endif;  
     
    ///// Check empty //////
    if(empty($data['mcode'])){
        echo "<script language='JavaScript'>alert('รหัสสมาชิกไม่มีค่ะ');history.back();</script>";        
        exit;
    } 
    if(empty($data['satype'])){
        echo "<script language='JavaScript'>alert('ประเภทของบิลไม่ได้ระบุค่ะ');history.back();</script>";        
        exit;
    } 
    if(empty($data['inv_code'])){
       //$data['inv_code'] = $GLOBALS["main_inv_code"];
       $data['inv_code'] = $_SESSION["admininvent"];
    }
    if(empty($data['sadate'])){
       $data['sadate']  = $_SESSION["datetimezone"];
    }
	if(empty($data['cremark'])){
       $data['cremark']  = $data['cremark1'];
    }
    ///// Check empty ////// 
}
	
$detail_member = get_detail_meber($data['mcode'],date("Y-m-d"));
if(count($detail_member) == 0){
    echo "<script language='JavaScript'>alert('ไม่พบรหัสสมาชิก');history.back();</script>";        
    exit; 
}


if($data['satype'] == "H"){
	/*if($detail_member['mtype'] == 0 ){
        echo "<script>alert('สมาชิกประเภท Member ไม่สามารถเปิดบิล Hold ได้');window.history.back();</script>";    
        exit;
	}
	if($detail_member['mtype'] == 1 and $data['discount'] == "" and $data['sumpv'] < 20000){
        echo "<script language='JavaScript'>alert('สมาชิกประเภท Franchise จะต้องเปิดบิล hold บิลแรกขั้นต่ำ 20,000pv');window.history.back()</script>";    
        exit;	
	}else if($detail_member['mtype'] == 1 and $data['discount'] == 1 and $data['sumpv'] < 2000){
        echo "<script language='JavaScript'>alert('สมาชิกประเภท Franchise จะต้องเปิดบิล hold ไม่ต่ำกว่า 2,000pv เท่านั้น');window.history.back()</script>"; 
		exit;
	}
	if($detail_member['mtype'] == 2 and $data['discount'] == "" and $data['sumpv'] < 200000){
        echo "<script language='JavaScript'>alert('สมาชิกประเภท Agency จะต้องเปิดบิล hold บิลแรกขั้นต่ำ 200,000pv');window.history.back()</script>";    
		exit;
	}else if($detail_member['mtype'] == 2 and $data['discount'] == 1 and $data['sumpv'] < 0){
        echo "<script language='JavaScript'>alert('สมาชิกประเภท Agency จะต้องเปิดบิล hold ไม่ต่ำกว่า 0pv เท่านั้น');window.history.back()</script>";    
		exit;
	}*/
}


$detail_location = locationbase::get_location($_SESSION["inv_locationbase"]);
 
if($detail_member["locationbase"] != $_SESSION["inv_locationbase"]){
   // echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["3"]."');window.location='index.php?sessiontab=4&sub=21&state=1'</script>";    
   // exit;
}
 
if($data['txtInternet'] > 0){
    if($detail_member['ewallet'] < $data['txtInternet']){
        echo "<script language='JavaScript'>alert('Ewallet not enough');window.location='index.php?sessiontab=3&sub=139&state=2'</script>";    
        exit;
    }
} 
if($data['txtVoucher'] > 0){
    if($detail_member['voucher'] < $data['txtVoucher']){
        echo "<script language='JavaScript'>alert('Voucher not enough');window.location='index.php?sessiontab=3&sub=139&state=2'</script>";    
        exit;
    }
} 

foreach($product['pcode'] as $key => $val){ 
    $pd = locationbase::get_product($val); 
    $asaleds[$val]['pcode'] = $pd['pcode'];
    $asaleds[$val]['pdesc'] =  $pd['pdesc'];;
    $asaleds[$val]['weight'] =  $pd['weight'];;
    $asaleds[$val]['qty'] = $product['qty'][$key];
    $asaleds[$val]['price'] = $product['price'][$key];
    $asaleds[$val]['pv'] = $product['pv'][$key];
	if($data['txtVoucher'] > 0) $asaleds[$val]['pv'] = '0';
	if($data['satype'] == 'D') $asaleds[$val]['pv'] = '0';
	if($data['satype'] == 'L') $asaleds[$val]['pv'] = '0';
    $asaleds[$val]['bprice'] = $pd['bprice'];
    $asaleds[$val]['amt'] = $product['qty'][$key]*$product['price'][$key];
    $asaleds[$val]['sadate'] = $data['sadate'];
    $asaleds[$val]['mcode'] = $data['mcode'];
    $asaleds[$val]['inv_code'] = $data["inv_code"];
    $asaleds[$val]['locationbase'] = $_SESSION["inv_locationbase"];  
    $data['tot_bprice'] += $pd['bprice'];
    $data['tot_weight'] += $pd['weight']*$product['qty'][$key];
    $asaleds[$val]['vat'] = $pd['vat'];
    if($pd['type'] == 'sending'){
        $data['sending'] += $pd['price'];
    }
    if($pd['vat'] == 0){
        $total_exvat+=($asaleds[$val]['amt']); //รราคา ไม่รวม vat
    }else{
        $vat_sum = ($asaleds[$val]['amt']*$pd['vat']/(100+$pd['vat']));
        $total_vat+=($asaleds[$val]['amt']*$pd['vat']/(100+$pd['vat']));
        $total_invat_sum+= ($asaleds[$val]['amt'])-$vat_sum;
    }
}
//if($detail_member["mtype"] == '0')$hdate = date('Y-m-d', strtotime($data['sadate']. ' + 29 days'));
//else $hdate = '0000-00-00';


if($data['cmobile'] == '')$data['cmobile'] = $detail_member['mobile'];

$data['total'] = $data['sumtotal'];
$data['tot_bprice'] = $data['tot_bprice'];
$asaleh = array(
          "id" => '',
          "sano" => '',
          "sadate" => $data['sadate'],
          "mcode" => $data['mcode'],
          "sp_code" => $detail_member['sp_code'],
          "name_t" => $detail_member['name_t'], 
          "name_f" => $detail_member['name_f'], 
          "sa_type" => $data['satype'],
          "inv_code" => $data['inv_code'],
          "total" => $data['total'],
          "tot_pv" => $data['sumpv'],
		  "discount" => $data['discount'],
          "bprice" => $data['tot_bprice'],
          "tot_weight" => $data['tot_weight'], 
          "uid" => $_SESSION['inv_usercode'],
          "lid" => $_SESSION['admininvent'],
          "send" => $data['radsend'],  
          "txtoption" =>$data['txtoption'],
          "txtSending" => $data['sending'], 
          "caddress" => $data['caddress'],  
          "cdistrictId" => getdistrict($data['cdistrict'] ),
          "camphurId" => getamphur($data['camphur'] ),
          "cprovinceId" => getprovince($data['cprovince']), 
          "czip" => $data['czip'],  
          "hpv" => $data['sumpv'],
          "htotal" => $data['total'],
          "hdate" => $hdate,
          "checkportal" => 2,
          "locationbase" => $_SESSION["inv_locationbase"],
          "cname" => $data['cname'],
          "cmobile" => $data['cmobile'],
          "txtoption" => $data['cremark'],
          "mbase" => $detail_member['locationbase'],
          "crate" => $detail_location['crate'], 
          //////////// vat ////////////////  
          "total_vat" => round($total_vat,2),   
          "total_net" => round(($data['total']-$total_vat),2),   
          "total_invat" => round($total_invat_sum,2),
          "total_exvat" => round($total_exvat,2),   
    ); 

///////////// SET PAYMENT ////////////////////

$set_payment = query("*",'ali_payment ash '," 1=1 and shows = 1 "); 
foreach($set_payment as $key => $val):
    $text = 'txt'.$val['payment_column'];
    $option = 'option'.$val['payment_column'];
    $select = 'select'.$val['payment_column'];
    if($data[$text] >0){
        $chk_sum += $data[$text];
        $asaleh[$text] = $data[$text] ;
        $asaleh[$option] = $data[$option] ;
        $asaleh[$select] = $data[$select] ;
    }
endforeach;

if($chk_sum != $asaleh['total']){
    echo "<script language='JavaScript'>alert('เกิดข้อผิดพลาด');history.back();</script>";        
    exit;
}

///////////// SET PAYMENT ////////////////////    
    
 
if($_GET['state']==0){  
    //////////// insert asaleh ///////////
    if($data['txtVoucher'] > 0)$asaleh['tot_pv'] = 0;  
    //$asaleh['sano'] =  gencodesale($sanof); 
    $asaleh['sano'] =  gencodesale_news('S','ali_asaleh',$_SESSION['admininvent'],'',$data['sadate']); 
//	echo '<pre>'; print_r($asaleh); echo '</pre>';  exit;
    $success = insert("ali_asaleh",$asaleh);
    if($success == true){
        $mid = mysql_insert_id();
        //////////// insert asaled //////////   /
        foreach($asaleds as $keyx => $asaled){ 
            $asaled['sano'] = $mid;
            insert("ali_asaled",$asaled);   
           /* $pd = locationbase::get_product($keyx); 
            if($pd['group_id']== '24')expdate($dbprefix,$detail_member); */
        }
        //////////// insert asaled /////////// 
		$table_bill = 'asaleh';
		$column_bill = 'sano';
		$mid_bill   = $asaleh['sano'];
        if($data['satype']  == 'A'){
			updatePos($dbprefix,$detail_member['mcode'],$data['sadate'],$data['sumpv']);   
		}
		if($data['satype'] == 'A'){ 
			getInsert_bm_bill('ali_bm1',$asaleh['sano'],$detail_member['mcode'],$detail_member['pos_cur'],$data['sumpv'],$data['sadate'],$data['sadate']);
		}
		if($data['satype'] == "H" and $detail_member["mtype"] == '0'){
			$sql="UPDATE ali_asaleh SET  hdate =  '".$asaleh['hdate']."'   WHERE mcode ='".$data['mcode']."' and  sa_type =  'H' and hdate > '".$_SESSION["datetimezone"]."' and hpv > 0 ";
			mysql_query($sql);
		}
		if($data['satype'] == "H" and $data['sumpv'] != 0 )updatehpv1($dbprefix,$data['mcode'],$data['sumpv']);
    

        $bewallet = $GLOBALS["crate"]*$data['txtInternet'];
        if($data['txtInternet'] > 0)updateEwallet($dbprefix,$detail_member['mcode'],$data['txtInternet'],$bewallet,$asaleh['sano']); 
        
		$bvoucher = $GLOBALS["crate"]*$data['txtVoucher'];
        if($data['txtVoucher'] > 0)updateVoucherx($dbprefix,$detail_member['mcode'],$data['txtVoucher'],$bvoucher,$asaleh['sano']); 
        
        $object_stocks = new stocks ();
        $object_stocks->set_data($mid,"asale","sender","2"); /// branch
    }else{
        echo " Error ";
        exit;
    }
   // $object_stocks->set_data($mid,"asale","sender","3"); /// member
}

 
$_SESSION["perbuy"] = 0;
if( $_SESSION["admininvent"] == $GLOBALS["main_inv_code"]){
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=139&sanoo=".$mid."';window.open('".$actual_link."invoice/aprint_sale_branch.php?bid=".$asaleh['sano']."&chkprint=1');</script>";    
}else{
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=139&sanoo=".$mid."';window.open('".$actual_link."invoice/aprint_salelook.branch.php?bid=".$asaleh['sano']."&chkprint=1');</script>";    
}
exit;
 
function updateEwallet($dbprefix,$mcode,$txtInternet,$bewallet,$sano){ 
    $sql3 = "update ".$dbprefix."member set ewallet = ewallet-$txtInternet,bewallet = bewallet-$bewallet where mcode = '$mcode' ";
    $rs3=mysql_query($sql3);
    $option = "Shopping (".$sano.")";
    log_ewallet('ewallet',$mcode,$sano,$txtInternet,'O',date("Y-m-d"),$option);  
} 
 
function updateVoucherx($dbprefix,$mcode,$txtInternet,$bewallet,$sano){ 
    $sql3 = "update ".$dbprefix."member set voucher = voucher-$txtInternet,bvoucher = bvoucher-$bewallet where mcode = '$mcode' ";
    $rs3=mysql_query($sql3);
    $option = "Shopping (".$sano.")";
    log_ewallet('voucher',$mcode,$sano,$txtInternet,'O',date("Y-m-d"),$option);  
} 
function expdate($dbprefix,$detail_member){
    $select = "SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate where mid='".$detail_member['id']."' GROUP BY mid";
    $rs = mysql_query($select);
    if(mysql_num_rows($rs) > 0)$exp_date = mysql_result($rs,0,'exp_date');
    if(empty($exp_date))$exp_date = $detail_member['mdate'];
    $sql = "INSERT INTO ".$dbprefix."expdate (mid,exp_date,date_change) VALUES('".$detail_member['id']."',ADDDATE('".$exp_date."', INTERVAL 1 YEAR),'".$_SESSION["datetimezone"]."')";
    mysql_query($sql);
    $sql = "update ".$dbprefix."member set exp_date = ADDDATE('".$exp_date."', INTERVAL 1 YEAR),status_suspend ='0' where id = '".$detail_member['id']."' and status_terminate <> '1' ";
    mysql_query($sql);
} 

