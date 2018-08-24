<? session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<? 

 
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
    if(!empty($_POST)){
        foreach($_POST as $key => $val){ 
             if($val != '')
             {
                
                 $data[$key] = $val;  /// for asaleh
                 if($key == 'chkInternet')$sanof = 'EW';
                 if($key == 'chkCash')$sanof = 'CA';
                 if($key == 'selectTransfer' or $key == 'selectFuture'){
                     if($val =='3193'){$sanof='TK';}else{$sanof='TR';}
                 }
                 if($key == 'chkCredit1')$sanof = 'CC';
                 if($key == 'chkCredit2')$sanof = 'CC';
                 if($key == 'chkCredit3')$sanof = 'CC';
                 
             }   
        }
    } 
     
    ///// Check empty //////
    if(empty($data['mcode'])){
        echo "<script language='JavaScript'>alert('Mcode Empty');history.back();</script>";        
        exit;
    } 
     
     
    if(empty($data['sadate'])){
       $data['sadate']  = $_SESSION["datetimezone"];
    }
    ///// Check empty ////// 
}


$detail_member = get_detail_meber($data['mcode'],date("Y-m-d"));
if(count($detail_member) == 0){
    echo "<script language='JavaScript'>alert('ไม่พบรหัสสมาชิก');history.back();</script>";        
    exit; 
}
 
$data['total'] = $data['sumtotal']; 
$ewallet = array(
		"id" => '',
		"sano" => '',
		"sadate" => date('Y-m-d'),
		"mcode" => $data['mcode'], 
		"name_t" => $detail_member['name_t'], 
		"name_f" => $detail_member['name_f'],
		"sa_type" => "I",

		/*edit inv_code Branch*/
		/*"inv_code" => $data['inv_code'],*/
		"inv_code" => $_SESSION['admininvent'],
		/*-------------------*/
		"txtCash" 		=> $txtCash, 
		"selectCash" 	=> $selectCash, 
		"optionCash" 	=> $optionCash, 
		"txtTransfer" 	=> $txtTransfer,	
		"selectTransfer"=> $selectTransfer,
		"optionTransfer"=> $optionTransfer, 	
		"txtCredit1"	=> $txtCredit1, 
		"selectCredit1"	=> $selectCredit1, 
		"optionCredit1"	=> $optionCredit1, 		
		"txtCredit2"	=> $txtCredit2, 
		"selectCredit2"	=> $selectCredit2, 
		"optionCredit2"	=> $optionCredit2, 		
		"txtCredit3"	=> $txtCredit3, 
		"selectCredit3"	=> $selectCredit3, 
		"optionCredit3"	=> $optionCredit3, 	

		"total" => $data['total'], 
		"txtMoney" => $data['total'], 
		"uid" => $_SESSION['inv_usercode'],
		"lid" => $_SESSION['admininvent'],
		"txtoption" =>$data['txtoption'],
		"locationbase" => $_SESSION["inv_locationbase"],
		"remark" => $data['cremark'],
		"checkportal" => 2,
    ); 
    
///////////// SET PAYMENT ////////////////////

$set_payment = query("*",'ali_payment ash '," 1=1 and shows_ewallet = 1 "); 
foreach($set_payment as $key => $val):
    $text = 'txt'.$val['payment_column'];
    $option = 'option'.$val['payment_column'];
    $select = 'select'.$val['payment_column'];
    //if($data[$text] >0){
        $chk_sum += $data[$text];
        $ewallet[$text] = $data[$text] ;
        $ewallet[$option] = $data[$option] ;
        $ewallet[$select] = $data[$select] ;
   // }
endforeach;
if($chk_sum != $data['total']){
    echo "<script language='JavaScript'>alert('เกิดข้อผิดพลาด');history.back();</script>";        
    exit;
}

///////////// SET PAYMENT ////////////////////    
if($_GET['state']==0){  
    
    $sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."ewallet   ";
    $rs = mysql_query($sql);
    $mid = mysql_result($rs,0,'id')+1;
    //$sano = @gencodesale_EW();
    $sano = gencodesale_news('E','ali_ewallet',$_SESSION['admininvent'],$_SESSION["inv_locationbase"]);
    mysql_free_result($rs);
    $ewallet['sano'] =  $sano;
    $success = insert("ali_ewallet",$ewallet); 
    if($success == true){
         $bprice = $GLOBALS["crate"]*$data['total'];
         mysql_query("update ".$dbprefix."member set ewallet = ewallet+".$data['total'].", bewallet = bewallet+".$bprice." where mcode='".$data['mcode']."' ");
		 $option = "Ewallet (".$sano.") Date : ".date('Y-m-d')."";
         log_ewallet('ewallet',$data['mcode'],$sano,$data['total'],'I',date('Y-m-d'),$option);  
    }else{
        echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."')window.location='index.php?sessiontab=6&sub=146&state=2'</script>";
        exit;
    }
    $_SESSION["perbuy"] = 0;
    echo "<script language='JavaScript'>window.open('invoice_aprintw.php?bid=".$sano."');window.location='index.php?sessiontab=6&sub=148'</script>";    

}
 ?>