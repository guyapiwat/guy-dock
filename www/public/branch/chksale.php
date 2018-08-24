<? session_start(); ?>

<? 
if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
		if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
		else $_SESSION["lan"] = $_GET["lan"];
	}else{
		if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
	}
	include_once("../member/wording".$_SESSION["lan"].".php");
include("connectmysql.php"); 

///$traslate = inconv ('TIS-620','UTF-8',$wording_lan['tab4']['1_81']);
/*
if(isset($_SESSION["inv_usercode"])){
	require("adminchecklogin.php");
}else{
	require("../member/checklogin.php");
}
*/
require_once("function.php");
$data =$product =array();

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
    
    if(empty($data['satype'])){
        echo "ประเภทของบิลไม่ได้ระบุค่ะ";        
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


	
$detail_member = get_detail_meber($data['mcode'],date("Y-m-d"));
if(count($detail_member) == 0){
    echo "<script language='JavaScript'>alert('ไม่พบรหัสสมาชิก');history.back();</script>";        
    exit; 
}

$data['discount'] = func_first_billhold($data['mcode']);

if($data['satype'] == "H"){

  /*
	if($detail_member['mtype'] == 0){
        echo "สมาชิกประเภท Member ไม่สามารถเปิดบิล Hold ได้";    
        exit;
	}
	if($detail_member['mtype'] == 1 and $data['discount'] == "" and $data['sumpv'] < 20000){
        echo "สมาชิกประเภท Franchise จะต้องเปิดบิล hold บิลแรกขั้นต่ำ 20,000pv";    
        exit;	
	}else if($detail_member['mtype'] == 1 and $data['discount'] == 1 and $data['sumpv'] < 2000){
        echo "สมาชิกประเภท Franchise จะต้องเปิดบิล hold ไม่ต่ำกว่า 2,000pv เท่านั้น"; 
		exit;
	}
	if($detail_member['mtype'] == 2 and $data['discount'] == "" and $data['sumpv'] < 200000){
        echo "สมาชิกประเภท Agency จะต้องเปิดบิล hold บิลแรกขั้นต่ำ 200,000pv";    
		exit;
	}else if($detail_member['mtype'] == 2 and $data['discount'] == 1 and $data['sumpv'] < 0){
        echo "สมาชิกประเภท Agency จะต้องเปิดบิล hold ไม่ต่ำกว่า  0 เท่านั้น";    
		exit;
	} */
}
?>