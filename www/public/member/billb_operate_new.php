<? session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<? 

if($_SESSION["chkdouble"] == 0){	
    echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=21&state=1'</script>";
    exit;
}
$_SESSION["chkdouble"] = '1';
include("connectmysql.php"); 
include("../function/function_pos.php");
include("prefix.php");
require_once ("checklogin.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once("global.php"); 
require_once ("function.log.inc.php");

if($_SESSION["chkdouble"] == '1'){
	$_SESSION["chkdouble"] = 0;
}else{
	echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["8"]."');history.back();</script>";	
	exit;
}



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
        echo "<script language='JavaScript'>alert('".$wording_lan["w1_1"]."');history.back();</script>";        
        exit;
    } 
    if(empty($data['satype'])){
        echo "<script language='JavaScript'>alert('".$wording_lan['tab4']['1_74_2']."');history.back();</script>";        
        exit;
    } 
    if(empty($data['inv_code'])){
       $data['inv_code'] = $GLOBALS["main_branch"];
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
    echo "<script language='JavaScript'>alert('".$wording_lan['tab4']['1_81']."');history.back();</script>";        
    exit; 
}
func_check_sale('ali_',$data['mcode'],$data['sumpv'],$data['satype'],$detail_member['pos_cur'],$data['sadate']);
$detail_uid = get_detail_meber($_SESSION['usercode'],date("Y-m-d"));
$detail_location = locationbase::get_location($_SESSION["inv_locationbase"]);
 
if($detail_member["locationbase"] != $detail_uid["locationbase"]){
   // echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["3"]."');window.location='index.php?sessiontab=4&sub=21&state=1'</script>";    
   // exit;
}
 
if($data['txtInternet'] > 0){
    if($detail_uid['ewallet'] < $data['txtInternet']){
        echo "<script language='JavaScript'>alert('Ewallet not enough');window.location='index.php?sessiontab=4&sub=21&state=1'</script>";    
        exit;
    }
} 

if($detail_member[mtype] == '0' and $data['satype'] == 'D' ){ 
    echo "<script language='JavaScript'>alert('".$wording_lan["sub12_12"]."'); window.history.back()</script>";    
    exit; 
} 
foreach($product['pcode'] as $key => $val){ 
    $pd = locationbase::get_product($val); 
    $asaleds[$val]['pcode'] = $pd['pcode'];
    $asaleds[$val]['pdesc'] =  $pd['pdesc'];;
    $asaleds[$val]['weight'] =  $pd['weight'];;
    $asaleds[$val]['qty'] = $product['qty'][$key];
    $asaleds[$val]['price'] = $product['price'][$key];
    $asaleds[$val]['pv'] = $product['pv'][$key];
	if($data['satype'] == 'D') $asaleds[$val]['pv'] = '0';
    $asaleds[$val]['bprice'] = $pd['bprice'];
    $asaleds[$val]['amt'] = $product['qty'][$key]*$product['price'][$key];
    $asaleds[$val]['sadate'] = $data['sadate'];
    $asaleds[$val]['mcode'] = $data['mcode'];
    $asaleds[$val]['inv_code'] = $data["inv_code"];
    $asaleds[$val]['locationbase'] = $_SESSION["m_locationbase"];  
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
          "bprice" => $data['tot_bprice'],
          "tot_weight" => $data['tot_weight'], 
          "uid" => $_SESSION['usercode'],
          //"lid" => '',
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
          "hdate" => date("Y-m-t",strtotime("first day of ".$_SESSION["datetimezone"]." +1 month")),
          "checkportal" => 3,
          "locationbase" => $_SESSION["m_locationbase"],
          "cname" => $data['cname'],
          "cmobile" => $data['cmobile'],
          "remark" => $data['cremark'],
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
    echo "<script language='JavaScript'>alert('".$wording_lan["sub12_12"]."');history.back();</script>";        
    exit;
}
    
///////////// SET PAYMENT ////////////////////    
    
 
if($_GET['state']==0){  
    //////////// insert asaleh ///////////
    if($data['chkDiscount'] == 'on')$asaleh['tot_pv'] = 0;  
    if($data['txtInternet'] > 0): ///////////// EWALLET
        //$asaleh['sano'] =  gencodesale($sanof); 
		$asaleh['sano'] = gencodesale_news('S','ali_asaleh');
        $success = insert("ali_asaleh",$asaleh); 
        if($success == true){
            $mid = mysql_insert_id();
            //////////// insert asaled /////////// 
            foreach($asaleds as $keyx => $asaled){ 
                $asaled['sano'] = $mid;
                insert("ali_asaled",$asaled);   
               /* $pd = locationbase::get_product($keyx); 
                if($pd['group_id']== '24')expdate($dbprefix,$detail_member); */
            }
            //////////// insert asaled /////////// 
			if($data['satype']  == 'A'){
				updatePos($dbprefix,$detail_member['mcode'],$data['sadate'],$data['sumpv']);   
			}
			
			if($data['satype'] == 'A'){
				getInsert_bm('ali_bm1',$asaleh['sano'],$detail_member['mcode'],$detail_member['pos_cur'],$data['sumpv'],$data['sadate'],$data['sadate']);
			}
            $bewallet = $GLOBALS["crate"]*$data['txtInternet'];
            updateEwallet($dbprefix,$asaleh['sano'],$detail_uid['mcode'],$data['txtInternet'],$bewallet); 
            
            $object_stocks = new stocks ();
            $object_stocks->set_data($mid,"asale","sender","3");  /// member
        }else{
            echo " Error ";
            exit;
        }
    endif; 
}
$_SESSION["chkdouble"] = 1;
//echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=1';window.open('".$actual_link."invoice/aprint_sale.php?bid=".$mid."&chkprint=1');</script>";  
if($data['mcode'] == $_SESSION["usercode"]){
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=1';</script>";  
}else{
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=7';</script>";  

}
exit;
 
function updateEwallet($dbprefix,$sano,$mcode,$txtInternet,$bewallet){
    $sql3 = "update ".$dbprefix."member set ewallet = ewallet-$txtInternet,bewallet = bewallet-$bewallet where mcode = '$mcode' ";
    $rs3=mysql_query($sql3);
    $option = "Shopping ($sano)";
    log_ewallet('ewallet',$mcode,$sano,$txtInternet,'O',date("Y-m-d"),$option);  
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

