<?session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<? include("connectmysql.php");?>    
<? include("gencode.php");?>    
<? include("../function/function_pos.php");?>
<?
$dbprefix = 'ali_';
$id = $_POST['id']==""?$_GET['id']:$_POST['id'];                                                              
$com = $_POST['com']==""?$_GET['com']:$_POST['com'];

if($com == 'a'){
    $sql3 = " SELECT * FROM ali_commission WHERE id = '$id' and pay = '0' ";                                                                                              
    $rs3 = mysql_query($sql3);  
    if(mysql_num_rows($rs3) > 0){
        $row3 = mysql_fetch_object($rs3);
        $rcodex = $row3->rcode;
        $mcode = $row3->mcode;
        $tdate = $row3->tdate;
        $commission = $row3->total;
        $type = 'A';        
		$ecom = $commission * 0.95;
		$tax  = $commission * 0.05;
		if($ecom > 0){
			$totalamt = $ecom;
			fnc_voucher_bonus($dbprefix,$rcodex,$mcode,$totalamt,'','',$tdate);
		}
        update('ali_commission',array('pay' => '1')," id = '$id' ");   
    }  
     echo "<script language='JavaScript'>alert('Success');         window.location='index.php?sessiontab=4&sub=100';</script>";  
}
      
function fnc_voucher_bonus($dbprefix,$ro,$mcode,$totalamt,$locationbase,$crate,$tdate)
{
    $allplan= $totalamt;    
    //echo $allplan.'ssss';
    if($allplan > 0)
    {    
          
       // mysql_query("update ".$dbprefix."member set voucher=voucher+$allplan where mcode = '".$mcode."' ");    
        mysql_query("update ".$dbprefix."member set eatoship=eatoship+$allplan where mcode = '".$mcode."' ");
        $sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."eatoship ";
        $rssss = mysql_query($sql);
        $mid = mysql_result($rssss,0,'id')+1;
        $sano = gencodesale('CI','eatoship');
        $bprice = $allplan*$crate;
        
        $insert = array(
                    "rcode"      => $ro,                  
                    "sano"       => $sano,
                    "sadate"     => $tdate,
                    "mcode"      => $mcode,
                    "sa_type"    => 'CI',   
                    "total"      => $allplan,    
                    "bprice"     => $bprice,   
                    "uid"        => $_SESSION['adminusercode'], 
                    "chkCommission"   => 'on',  
                    "txtMoney"        => $allplan,   
                    "txtCommission"   => $allplan,   
                    "optionCommission"   => 'commission', 
                    "checkportal"   => '9',   
                    "crate"   		=> $crate,   
                    "mbase"   		=> '1',   
                    "echeck"        => 'A'   
                );
        //echo '<pre>'.print_r($insert).'</pre>';
         if($allplan > 0)insert('ali_eatoship',$insert);  /////////////////////////////****************
         if($allplan > 0)log_ewallet('eatoship',$mcode,$sano,$allplan,'CI',$tdate,'Commission to Ecom');       /////////////////////////////****************
                                                                                          
    }
}


?>