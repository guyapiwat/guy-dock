<? session_start(); ?>

<? 
include("connectmysql.php"); 
require("checklogin.php");
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
    if(empty($data['mcode'])){
        echo "������Ҫԡ����դ��";        
        exit;
    } 
    if(empty($data['satype'])){
        echo "�������ͧ���������кؤ��";        
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
    echo "<script language='JavaScript'>alert('��辺������Ҫԡ');history.back();</script>";        
    exit; 
}

$data['discount'] = func_first_billhold($data['mcode']);

if($data['satype'] == "H"){

/*
	if($detail_member['mtype'] == 0){
        echo "��Ҫԡ������ Member �������ö�Դ��� Hold ��";    
        exit;
	}
	if($detail_member['mtype'] == 1 and $data['discount'] == "" and $data['sumpv'] < 20000){
        echo "��Ҫԡ������ Franchise �е�ͧ�Դ��� hold ����á��鹵�� 20,000pv";    
        exit;	
	}else if($detail_member['mtype'] == 1 and $data['discount'] == 1 and $data['sumpv'] < 2000){
        echo "��Ҫԡ������ Franchise �е�ͧ�Դ��� hold ����ӡ��� 2,000pv ��ҹ��"; 
		exit;
	}
	if($detail_member['mtype'] == 2 and $data['discount'] == "" and $data['sumpv'] < 200000){
        echo "��Ҫԡ������ Agency �е�ͧ�Դ��� hold ����á��鹵�� 200,000pv";    
		exit;
	}else if($detail_member['mtype'] == 2 and $data['discount'] == 1 and $data['sumpv'] < 0){
        echo "��Ҫԡ������ Agency �е�ͧ�Դ��� hold ����ӡ��� 0pv ��ҹ��";    
		exit;
	}  */
}
?>