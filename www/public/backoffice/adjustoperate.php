<? 
session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<?
if($_SESSION["perbuy"] == 0){
echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=88'</script>";
exit;
}
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
    $sql = "SELECT MAX(id) AS id FROM ".$dbprefix."adjust ";
    $rs = mysql_query($sql);
    $mid = $sano = mysql_result($rs,0,'id');
    mysql_free_result($rs);
    if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
    if (isset($_POST["bid"])){$bid=$_POST["bid"];}else{$bid="";}
    if (isset($_POST["rcode"])){$rcode=$_POST["rcode"];}else{$rcode="";}
    if (isset($_POST["fdate"])){$fdate=$_POST["fdate"];}else{$fdate="";}
    if (isset($_POST["bid"])){$tdate=$_POST["tdate"];}else{$tdate="";}

    if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}    
    if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
    if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
    if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
    if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
    if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
    if (isset($_POST["sumbv"])){$tot_bv=$_POST["sumbv"];}else{$tot_bv="";}
    if (isset($_POST["sumfv"])){$tot_fv=$_POST["sumfv"];}else{$tot_fv="";}
    if (isset($_POST["txtMoney"])){$txtMoney=$_POST["txtMoney"];}else{$txtMoney="";}
    if (isset($_POST["rvpoint"])){$rvpoint=$_POST["rvpoint"];}else{$rvpoint="";}
    $rvpoint_after = $rvpoint-$txtMoney;
    if (isset($_POST["txtMoney"])){$txtMoney=$_POST["txtMoney"];}else{$txtMoney="";}
    if (isset($_POST["chkCash"])){$chkCash=$_POST["chkCash"];}else{$chkCash="";}
    if (isset($_POST["chkFuture"])){$chkFuture=$_POST["chkFuture"];}else{$chkFuture    ="";}
    if (isset($_POST["chkTransfer"])){$chkTransfer=$_POST["chkTransfer"];}else{$chkTransfer="";}
    if (isset($_POST["chkCredit1"])){$chkCredit1=$_POST["chkCredit1"];}else{$chkCredit1="";}
    if (isset($_POST["chkCredit2"])){$chkCredit2=$_POST["chkCredit2"];}else{$chkCredit2="";}
    if (isset($_POST["chkCredit3"])){$chkCredit3=$_POST["chkCredit3"];}else{$chkCredit3="";}
    if (isset($_POST["txtCash"])){$txtCash=$_POST["txtCash"];}else{$txtCash="";}
    if (isset($_POST["txtFuture"])){$txtFuture=$_POST["txtFuture"];}else{$txtFuture="";}
    if (isset($_POST["txtTransfer"])){$txtTransfer=$_POST["txtTransfer"];}else{$txtTransfer="";}
    if (isset($_POST["txtCredit1"])){$txtCredit1=$_POST["txtCredit1"];}else{$txtCredit1="";}
    if (isset($_POST["txtCredit2"])){$txtCredit2=$_POST["txtCredit2"];}else{$txtCredit2="";}
    if (isset($_POST["txtCredit3"])){$txtCredit3=$_POST["txtCredit3"];}else{$txtCredit3="";}
    if (isset($_POST["optionCash"])){$optionCash=$_POST["optionCash"];}else{$optionCash="";}
    if (isset($_POST["optionFuture"])){$optionFuture=$_POST["optionFuture"];}else{$optionFuture="";}
    if (isset($_POST["optionTransfer"])){$optionTransfer=$_POST["optionTransfer"];}else{$optionTransfer="";}
    if (isset($_POST["optionCredit1"])){$optionCredit1=$_POST["optionCredit1"];}else{$optionCredit1="";}
    if (isset($_POST["optionCredit2"])){$optionCredit2=$_POST["optionCredit2"];}else{$optionCredit2="";}
    if (isset($_POST["optionCredit3"])){$optionCredit3=$_POST["optionCredit3"];}else{$optionCredit3="";}
    if (isset($_POST["txtoption"])){$txtoption=$_POST["txtoption"];}else{$txtoption="";}      
}



if($_GET['state']==0){
    $sql="SELECT rcode,fdate,tdate FROM ".$dbprefix."cround WHERE calc='1'  ORDER BY rcode DESC LIMIT 1";
    $rs = mysql_query($sql);
    $where_cause = "";
    $max_rcode = 0;
    if(mysql_num_rows($rs)>0){
        
        $max_rcode = mysql_result($rs,0,'rcode');
        $max_fdate = mysql_result($rs,0,'fdate');
        $max_tdate = mysql_result($rs,0,'tdate');
    }

    if($rcode != $max_rcode){
        echo "<script language='JavaScript'>alert('ไม่สามารถ Adjust ได้เพราะรอบนี้ผ่านไปแล้ว');window.location='index.php?sessiontab=4&sub=282828&fdate=".$fdate."&tdate=".$tdate."'</script>";    
        exit;
    }
     

    $mid = ++$sano;   

    $sql="insert into ".$dbprefix."adjust (id,  sano, sadate,  mcode,  sa_type, inv_code,  total,  uid,send,txtoption,
    txtMoney,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,
    optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,ewallet_before,ewallet_after
    
    ) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$bonus' ,'".$_SESSION['inv_usercode']."','$radsend','$txtoption'
    ,'$txtMoney','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','$txtCash','$txtFuture',
    '$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','".$rvpoint."','".$rvpoint_after."'
    ) ";
    //echo $sql;
    //exit;

   
    //====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=rvpointoperate =>$sql";
writelogfile($text);
mysql_query($sql);

 include("./comsn/com_c/rep_adjust.php");
/*if(empty($inv_code))
mysql_query("update ".$dbprefix."member set ewallet = ewallet+".$txtMoney." where mcode='".$mcode."' ");
else if(empty($mcode))
mysql_query("update ".$dbprefix."invent set ewallet = ewallet+".$txtMoney." where inv_code='".$inv_code."' ");

//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=ewallet_update=>update ".$dbprefix."member set ewallet = ewallet+".$txtMoney." where mcode='".$mcode."' ";
writelogfile($text);*/
}else if($_GET['state']==1){
    /*logtext(true,$_SESSION['adminusercode'],'แก้ไข Ewallet',$mid);
    $sql="update ".$dbprefix."adjust set sano='$id', id='$id', ";
    $sql.="mcode='$mcode' ,sa_type='$satype' ,sadate='$sadate' , inv_code='$inv_code', total='$total', txtoption='$txtoption'
    , txtMoney='$txtMoney', chkCash='$chkCash', chkTransfer='$chkTransfer', chkCredit1='$chkCredit1', chkCredit2='$chkCredit2'
    , chkCredit3='$chkCredit3', txtCash='$txtCash', txtTransfer='$txtTransfer', txtCredit1='$txtCredit1', txtCredit2='$txtCredit2'
    , txtCredit3='$txtCredit3', optionCash='$optionCash', optionTransfer='$optionTransfer', optionCredit1='$optionCredit1', optionCredit2='$optionCredit2'
    , optionCredit3='$optionCredit3'
    
    where id= '$id' ";
    //====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=ewalletoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
    mysql_query($sql);*/
}
$_SESSION["perbuy"] = 0;
echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=2008'</script>";    

?>

