<?
session_start();
require_once("logtext.php");
require_once("global.php");
require_once ("function.log.inc.php");

    // แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
    echo "<br>แก้ไขข้อมูลรายการซื้อขาย :";
    $bid = $_GET['bid'];
	$remark = $_GET['remark']; 
    $style_l = "border-left:1 solid #FFFFFF;";
    $style_t = "border-top:1 solid #000000;";
    $style_b = "border-bottom:1 solid #000000;";
    $trcolor = array("#FFFFFF","#EEEEEE");
    ?>
    <table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">เลขบิล</td>
            <td style="<?=$style_l.$style_t.$style_b?>">รหัส</td>
            <td style="<?=$style_l.$style_t.$style_b?>">จำนวนเงินรวม</td>
        </tr>
    <?
        // อ่านข้อมูลเดิมจาก member
        //echo "SELECT * FROM ".$dbprefix."ewallet WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
        //$rs=mysql_query("SELECT * FROM ".$dbprefix."ewallet WHERE id='$bid' and lid = '{$_SESSION["admininvent"]}' and cancel = 0 LIMIT 1");
        if($_SESSION["inventobj6"] != '7')$lid = " and lid = '{$_SESSION["admininvent"]}'";
        
        $rs=mysql_query("SELECT * FROM ".$dbprefix."eatoship WHERE id='$bid' $lid  and cancel = 0 LIMIT 1");
       // echo "SELECT * FROM ".$dbprefix."eatoship WHERE id='$bid' $lid  and cancel = 0 LIMIT 1";

        if (mysql_num_rows($rs)>0){
            $row = mysql_fetch_object($rs);
            $id=$row->id;
            ?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
                <td style="<?=$style_l?>" align="center"><?=$row->sano?></td>
                <td style="<?=$style_l?>" align="center"><?=$row->mcode;?></td>
                <td style="<?=$style_l?>" align="right"><?=$row->txtMoney ?></td>
            </tr>
            <?
            //====================LOG===========================
 
$text="uid=".$_SESSION["adminuserid"]." action=ewallet_update=>update ".$dbprefix."eatoship set cancel=1, cancel_date='".$_SESSION["datetimezone"]."',uid_cancel='".$_SESSION["inv_usercode"]."', cancel=1 where id='$id'";
writelogfile($text);
//=================END LOG===========================
            $sqlS = "select eatoship from ".$dbprefix."member where mcode='".$row->mcode."' and eatoship >= '".$row->txtMoney."' ";
                $sqlSS = mysql_query($sqlS);
                if(mysql_num_rows($sqlSS) > 0){
                    mysql_query("update ".$dbprefix."member set eatoship = eatoship-".$row->txtMoney." where mcode='".$row->mcode."' ");
                    $text="uid=".$_SESSION["adminuserid"]." action=ewallet_update=>update ".$dbprefix."member set eatoship = eatoship-".$row->txtMoney." where mcode='".$row->mcode."' ";
                    log_ewallet('eatoship',$row->mcode,$row->sano,$row->txtMoney,'O',$row->sadate,"Cancel(".$row->sano.")");  
                }else{
                    echo "<script language='JavaScript'>alert('Eatoship ไม่เพียงพอที่ยกเลิกได้');window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."'</script>";
                    exit;

                }

writelogfile($text);
//=================END LOG===========================
            mysql_query("update ".$dbprefix."eatoship set cancel=1,cancel_date='".$_SESSION["datetimezone"]."',uid_cancel='".$_SESSION["inv_usercode"]."',remark= '$remark' where id='$id' $lid ");

            echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."'</script>";    

        }else{
            echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้');window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."'</script>";    
        }
        logtext(true,$_SESSION['adminuserid'],'ลบบิล ewallet id : '.$row->sano,$row->sano);
        mysql_free_result($rs);
        mysql_query("COMMIT");
?>

    </table>