<? 
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
include("connectmysql.php");
include("../function/function_pos.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once("global.php");
require_once ("function.log.inc.php");
require_once ("checklogin.php");
if(isset($_GET['state'])){
   
    
    /*$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."transferewallet_h ";
    $rs = mysql_query($sql);
    $mid = $sano = mysql_result($rs,0,'id');*/
    if($_SESSION["chkewallet"] == '1'){
    //    echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=22';</script>";    
    }
    $_SESSION["chkewallet"] = 1;

    if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
    if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}    
    if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
    if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
    if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
    if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
    if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
    if (isset($_POST["sumweight"])){$tot_weight=$_POST["sumweight"];}else{$tot_weight="";}
    if (isset($_POST["sumfv"])){$tot_fv=$_POST["sumfv"];}else{$tot_fv="";}
    if (isset($_POST["radsend"])){$radsend=$_POST["radsend"];}else{$radsend="";}
    if (isset($_POST["chkCash"])){$chkCash=$_POST["chkCash"];}else{$chkCash="";}
    if (isset($_POST["chkFuture"])){$chkFuture=$_POST["chkFuture"];}else{$chkFuture    ="";}
    if (isset($_POST["chkTransfer"])){$chkTransfer=$_POST["chkTransfer"];}else{$chkTransfer="";}
    if (isset($_POST["chkCredit1"])){$chkCredit1=$_POST["chkCredit1"];}else{$chkCredit1="";}
    if (isset($_POST["chkCredit2"])){$chkCredit2=$_POST["chkCredit2"];}else{$chkCredit2="";}
    if (isset($_POST["chkCredit3"])){$chkCredit3=$_POST["chkCredit3"];}else{$chkCredit3="";}
    if (isset($_POST["chkInternet"])){$chkInternet=$_POST["chkInternet"];}else{$chkInternet="";}
    if (isset($_POST["chkDiscount"])){$chkDiscount=$_POST["chkDiscount"];}else{$chkDiscount="";}
    if (isset($_POST["chkOther"])){$chkOther=$_POST["chkOther"];}else{$chkOther="";}
    if (isset($_POST["txtCash"])){$txtCash=$_POST["txtCash"];}else{$txtCash="";}
    if (isset($_POST["txtFuture"])){$txtFuture=$_POST["txtFuture"];}else{$txtFuture="";}
    if (isset($_POST["txtTransfer"])){$txtTransfer=$_POST["txtTransfer"];}else{$txtTransfer="";}
    if (isset($_POST["txtCredit1"])){$txtCredit1=$_POST["txtCredit1"];}else{$txtCredit1="";}
    if (isset($_POST["txtCredit2"])){$txtCredit2=$_POST["txtCredit2"];}else{$txtCredit2="";}
    if (isset($_POST["txtCredit3"])){$txtCredit3=$_POST["txtCredit3"];}else{$txtCredit3="";}
    if (isset($_POST["txtInternet"])){$txtInternet=$_POST["txtInternet"];}else{$txtInternet="";}
    if (isset($_POST["txtDiscount"])){$txtDiscount=$_POST["txtDiscount"];}else{$txtDiscount="";}
    if (isset($_POST["txtOther"])){$txtOther=$_POST["txtOther"];}else{$txtOther="";}
    if (isset($_POST["optionCash"])){$optionCash=$_POST["optionCash"];}else{$optionCash="";}
    if (isset($_POST["optionFuture"])){$optionFuture=$_POST["optionFuture"];}else{$optionFuture="";}
    if (isset($_POST["optionTransfer"])){$optionTransfer=$_POST["optionTransfer"];}else{$optionTransfer="";}
    if (isset($_POST["optionCredit1"])){$optionCredit1=$_POST["optionCredit1"];}else{$optionCredit1="";}
    if (isset($_POST["optionCredit2"])){$optionCredit2=$_POST["optionCredit2"];}else{$optionCredit2="";}
    if (isset($_POST["optionCredit3"])){$optionCredit3=$_POST["optionCredit3"];}else{$optionCredit3="";}
    if (isset($_POST["optionInternet"])){$optionInternet=$_POST["optionInternet"];}else{$optionInternet="";}
    if (isset($_POST["optionDiscount"])){$optionDiscount=$_POST["optionDiscount"];}else{$optionDiscount="";}
    if (isset($_POST["optionOther"])){$optionOther=$_POST["optionOther"];}else{$optionOther="";}
    if (isset($_POST["txtoption"])){$txtoption=$_POST["txtoption"];}else{$txtoption="";}
    if (isset($_POST["txtMoney"])){$txtMoney=$_POST["txtMoney"];}else{$txtMoney="";}
    if (isset($_POST["caddress"])){$caddress=$_POST["caddress"];}else{$caddress="";}
    if (isset($_POST["cprovince"])){$cprovince=$_POST["cprovince"];}else{$cprovince="";}
    if (isset($_POST["camphur"])){$camphur=$_POST["camphur"];}else{$camphur="";}
    if (isset($_POST["cdistrict"])){$cdistrict=$_POST["cdistrict"];}else{$cdistrict="";}
    if (isset($_POST["czip"])){$czip=$_POST["czip"];}else{$czip="";}
    if (isset($_POST["chkaddress"])){$chkaddress=$_POST["chkaddress"];}else{$chkaddress="0";}
    if (isset($_POST["spayment"])){$spayment=$_POST["spayment"];}else{$spayment="0";}
    if (isset($_POST["sv_code"])){$sv_code=$_POST["sv_code"];}else{$sv_code="";}
    ///if (isset($_POST["table"])){$table=$_POST["table"];}else{$table="";}
   
}    
$table = 'ewallet'; /// settable 
 
               
$selectch = "select name_t,name_f from  ".$dbprefix."member where mcode = '$mcode'";
$rsch = mysql_query($selectch);

if($_SESSION["sv_code"] != $sv_code or empty($sv_code) or mysql_num_rows($rsch) <= 0 ){
        echo "<script language='JavaScript'>alert('Password is not correct !! please try again'); window.history.back()</script>";
        exit;

}

if($_SESSION["usercode"] == $mcode and $spayment=='2'){
            echo "<script language='JavaScript'>alert('ไม่สามารถโอนให้ตัวเองได้'); window.history.back()</script>";     
            exit;

}

if($_SESSION["usercode"] != $mcode and $spayment=='3'){
            echo "<script language='JavaScript'>alert('ถอนให้รหัสสมาชิกตัวเองได้เท่านั้น'); window.history.back()</script>";     
            exit;

}
$sadate = $_SESSION["datetimezone"];
$arr_member = searchmember($dbprefix,$mcode);

$sql="SELECT * FROM ".$dbprefix."member where $table < '$txtMoney' and mcode = '".$_SESSION["usercode"]."' ";
$rs = mysql_query($sql);
if(mysql_num_rows($rs) > 0 or $txtMoney <= 0)
{              
    echo "<script language='JavaScript'>alert('Not Enough Ewallet !! please try again'); window.history.back()</script>";     
    exit;
}

$total = $txtMoney;
$data =  get_detail_meber($mcode,date('Y-m-d'));       
$datax =  get_detail_meber($_SESSION['usercode'],date('Y-m-d'));       
                                                    

if($_GET['state']==0){                               
    if($spayment == '2'){   //// Tranfer  
        logtext(true,$_SESSION['usercode'],$table,$mid);           
        $hdate = $_SESSION["datetimezone_last"];
        $bprice = $total*$GLOBALS["crate"];
        
        $sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix.$table." ";
        $rs = mysql_query($sql);
        $mid = mysql_result($rs,0,'id')+1;
       // $sano = gencodesale_ewallet('EO',$table);
        $sano = gencodesale_news('E',"ali_".$table,"ONLIN",$data['location_base']);
        mysql_free_result($rs);
        $sanoewallet = $sano; 
        $insert = array(                    
            "id"             => $mid,
            "sano"           => $sanoewallet,
            "sadate"         => $sadate,
            "mcode"          => $_SESSION['usercode'],   
            "sa_type"        => 'TO',
            "inv_code"       => $inv_code,
            "total"          => $txtMoney,
            "bprice"         => $bprice,
            "uid"            => $_SESSION['usercode'],       
            "txtMoney"       => $txtMoney, 
            "chkTransfer_out" => 'on',
             "txtTransfer_in" => $txtMoney,  
            "checkportal"     => 3,   
            "locationbase"    => $datax["locationbase"],   
            "name_f"          => $datax["name_t"],   
            "name_t"          => $datax["name_f"],   
            "mbase"           => $datax["locationbase"],   
            "crate"           => $_SESSION["inv_crate"],                                                         
        );                                                        
        insert($dbprefix.$table,$insert); 
        
                                                     

        $sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM  ".$dbprefix.$table." ";
        $rs = mysql_query($sql);
        $mid = mysql_result($rs,0,'id')+1;
        $sano = gencodesale_news('E',"ali_".$table,"ONLIN",$data['location_base']);
        //$sano = gencodesale_ewallet('EI',$table);
        mysql_free_result($rs);
           
        
        $insert = array(                    
            "id"             => $mid,
            "sano"           => $sano,
            "sadate"         => $sadate,
            "mcode"          => $mcode,                    
            "sa_type"        => 'TI',
            "inv_code"       => $inv_code,
            "total"          => $txtMoney,
            "bprice"         => $bprice,
            "uid"            => $_SESSION['usercode'],       
            "txtMoney"       => $txtMoney, 
            "chkTransfer_in" => 'on',
            "txtTransfer_in" => $txtMoney,    
            "checkportal"     => 3,   
            "locationbase"    => $data["locationbase"],   
            "name_f"          => $data["name_t"],   
            "name_t"          => $data["name_f"],   
            "mbase"           => $data["locationbase"],   
            "crate"           => $_SESSION["inv_crate"],                                                         
        );                                                        
        insert($dbprefix.$table,$insert); 
          
        mysql_query("update ".$dbprefix."member set $table = $table-'".$txtMoney."' where mcode='".$_SESSION['usercode']."' ");
        mysql_query("update ".$dbprefix."member set $table = $table+'".$txtMoney."' where mcode='".$mcode."' ");
        
        $option = "transfer to ".$mcode."(".$sano.")";
        log_ewallet($table,$_SESSION['usercode'],$sanoewallet,$txtMoney,'TO',$sadate,$option);  
        $optionx = "transfer from ".$_SESSION['usercode']."(".$sanoewallet.")";    
        log_ewallet($table,$mcode,$sano,$txtMoney,'TI',$sadate,$optionx);   
    }



    if($spayment == '3'){  ///    
        $satype = 'W';                    
        logtext(true,$_SESSION['usercode'],'Ewallet',$mid);        
        $hdate = $_SESSION["datetimezone_last"];
        $bprice = $total*$GLOBALS["crate"];
                                                                                               
        $sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM  ".$dbprefix.$table." ";
        $rs = mysql_query($sql);
        $mid = mysql_result($rs,0,'id')+1;
        $sano = gencodesale_news('E',"ali_".$table,"ONLIN",$data['location_base']);
       // $sano = gencodesale_ewallet('EW','ewallet_tranfer');       
        $sanoewallet = $sano;
       
        mysql_free_result($rs); 
        
        $insert = array(                    
            "id"             => $mid,
            "sano"           => $sanoewallet,
            "sadate"         => $sadate,
            "mcode"          => $_SESSION['usercode'],      
            "sa_type"        => 'W',
            "inv_code"       => $inv_code,
            "total"          => $txtMoney,
            "bprice"         => $bprice,
            "uid"            => $_SESSION['usercode'],       
            "txtMoney"       => $txtMoney, 
            "chkWithdraw"    => 'on',
            "txtWithdraw"    => $txtMoney,    
            "checkportal"     => 3,   
            "locationbase"    => $data["locationbase"],
            "name_f"          => $data["name_t"],   
            "name_t"          => $data["name_f"],   
            "mbase"           => $data["locationbase"],   
            "crate"           => $_SESSION["inv_crate"],                                                         
        );                                                        
        insert($dbprefix.$table,$insert);   
        $option = "Withdraw";
        mysql_query("update ".$dbprefix."member set $table = $table-'".$txtMoney."' where mcode='".$_SESSION['usercode']."' ");
        log_ewallet($table,$_SESSION['usercode'],$sanoewallet,$txtMoney,'W',$sadate,$option);                                                                                                      
    }   
}         
echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=23';</script>";    
exit;

?>
 