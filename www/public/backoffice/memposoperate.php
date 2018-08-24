<?
session_start();
?><META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=tis-620"><?
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
    if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
    if (isset($_POST["pos"])){$pos=$_POST["pos"];}else{$pos="";}
    if (isset($_POST["pos1"])){$pos1=$_POST["pos1"];}else{$pos1="";}
    if (isset($_POST["opos"])){$opos=$_POST["opos"];}else{$opos="";}
    if (isset($_POST["opos1"])){$opos1=$_POST["opos1"];}else{$opos1="";}
    if (isset($_POST["carry_l"])){$carry_l=$_POST["carry_l"];}else{$carry_l=0.00;}
    if (isset($_POST["carry_c"])){$carry_c=$_POST["carry_c"];}else{$carry_c=0.00;}
    if (isset($_POST["posdate"])){$posdate=$_POST["posdate"];}else{$posdate=date("Y-m-d");}
}
  	if($pos != "VIP" and $pos1!=$opos1 ){
			echo "<script language='JavaScript'>alert('ตำแหน่งยังไม่เป็น VIP ไม่สามารถปรับตำแหน่งเกียรติยศได้'); window.history.back()</script>";	
			exit;
	}

if($_GET['state']==1 && !system_code($mcode)){
    logtext(true,$_SESSION['adminusercode'],'แก้ไขตำแหน่งสมาชิก',$id);
    $sql = "SELECT mcode,status_terminate FROM ".$dbprefix."member WHERE id='$id' LIMIT 1 ";
    $rs  = mysql_query($sql);
    $mcode =mysql_result($rs,0,'mcode');
    $status_terminate =mysql_result($rs,0,'status_terminate');
	if($status_terminate == '1'){
		echo "<script language='JavaScript'>alert('รหัสสมาชิก ".$mcode." ติดสถานะ Terminate'); window.history.back()</script>";	
		exit;
	}
    $sql = "INSERT INTO ".$dbprefix."calc_poschange (mcode,pos_before,pos_after,date_change,date_update,type,uid) ";
    $sql .= "VALUES('".mysql_result($rs,0,'mcode')."','$opos','$pos','$posdate','".date("Y-m-d")."','1','".$_SESSION['adminusercode']."')";
    //echo $sql.'<br>';
    //====================LOG===========================
    $text="uid=".$_SESSION["adminuserid"]." action=memoperate =>$sql";
    logtext(true,$_SESSION['adminusercode'],'เพิ่ม VIP จาก'.$opos.' เป็น'.$pos,mysql_result($rs,0,'mcode'));
    writelogfile($text);
//=================END LOG===========================
    mysql_query($sql);

#//======================POS cur 2 honor ================ ////

    logtext(true,$_SESSION['adminusercode'],'แก้ไขตำแหน่งสมาชิก',$id);
    $sql = "SELECT mcode FROM ".$dbprefix."member WHERE id='$id' LIMIT 1 ";
    $rs  = mysql_query($sql);
    $mcode =mysql_result($rs,0,'mcode');
    $sql = "INSERT INTO ".$dbprefix."calc_poschange2 (mcode,pos_before,pos_after,date_change,date_update,type,uid) ";
    $sql .= "VALUES('".mysql_result($rs,0,'mcode')."','$opos1','$pos1','$posdate','".date("Y-m-d")."','1','".$_SESSION['adminusercode']."')";
    //echo $sql.'<br>';
    //====================LOG===========================
    $text="uid=".$_SESSION["adminuserid"]." action=memoperate =>$sql";
    logtext(true,$_SESSION['adminusercode'],'เพิ่ม VIP จาก'.$opos1.' เป็น'.$pos1,mysql_result($rs,0,'mcode'));
    writelogfile($text);
//=================END LOG===========================
    mysql_query($sql);
    if($posdate <= date("Y-m-d")){
        //echo 'correct';
    $sql="update ".$dbprefix."member set pos_cur='$pos',pos_cur2='$pos1' where id='$id' ";
    
        //====================LOG===========================
    $text="uid=".$_SESSION["adminuserid"]." action=memoperate =>$sql";
    writelogfile($text);
    //=================END LOG===========================
        mysql_query($sql);

            
        if (!mysql_query($sql)) {
            ob_end_flush();
            echo "<font color='#FF0000'>error</font><br>";
           // echo "$sql<br>";
        }
    }
    //echo ' incorrect';
    //exit;
//    else {
    /*    $sql = "SELECT * FROM ".$dbprefix."member WHERE id='$id' LIMIT 1";
    //echo $sql;
        $rs = mysql_query($sql);
        $mcode = mysql_result($rs,0,'mcode');
        $sql = "select  rcode from ali_around where calc = 1 order by rcode desc limit 0,1";

        $rs = mysql_query($sql);
        if(@mysql_num_rows($rs)>0){
            $rcode= mysql_result($rs,0,'rcode'); 
            mysql_free_result($rs);
        }

        $sql1 = "update ".$dbprefix."bmbonus set carry_l = '$carry_l',carry_c = '$carry_c' where mcode = '$mcode' and rcode = '$rcode' ";
        mysql_query($sql1) or die("no update");
        mysql_query("COMMIT");
        */
        //exit; 
        ob_end_clean();
        //include "mem_main.php";
        echo "<script language='JavaScript'>window.location='index.php?sessiontab=2&sub=1'</script>";    
        exit;  // done in MEMBEReditadd.php
//    }
}
function system_code($code){
    $sys_code = array('');
    $code = strtoupper($code);
    for($i=0;$i<sizeof($sys_code);$i++){
        if($sys_code===$code)
            return true;
    }
    return false;
}
?>
