<?
require_once("logtext.php");
require_once ("function.log.inc.php");

    // แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
   // echo "<br>แก้ไขข้อมูลรายการซื้อขาย :";
    $bid = $_GET['bid'];
    $style_l = "border-left:1 solid #FFFFFF;";
    $style_t = "border-top:1 solid #000000;";
    $style_b = "border-bottom:1 solid #000000;";
    $trcolor = array("#FFFFFF","#EEEEEE");
    ?>
    <table width="50%" cellpadding="0" cellspacing="0" style="display:none">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">เลขบิล</td>
            <td style="<?=$style_l.$style_t.$style_b?>">รหัส</td>
            <td style="<?=$style_l.$style_t.$style_b?>">รวม</td>
        </tr>
    <?
        // อ่านข้อมูลเดิมจาก member
        //echo "SELECT * FROM ".$dbprefix."adjust WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
        $rs=mysql_query("SELECT * FROM ".$dbprefix."adjust WHERE id='$bid' and cancel = 0 LIMIT 1");
        //echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
        if (mysql_num_rows($rs)>0){
            $row = mysql_fetch_object($rs);
            $id=$row->id;
            $mcode = $row->mcode;
            $txtMoney =$row->txtMoney;
            $sadate =$row->sadate;
            ?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
                <td style="<?=$style_l?>" align="center"><?=$row->sano?></td>
                <td style="<?=$style_l?>" align="center"><?if(!empty($row->inv_code))echo $row->inv_code;else$row->mcode;?></td>
                <td style="<?=$style_l?>" align="right"><?=$row->txtMoney ?></td>
            </tr>
            <?


            $sql="SELECT * FROM ".$dbprefix."cmbonus WHERE paydate ='$sadate' and mcode = '$mcode'";
           // echo $sql."<br>";exit;
            $rs = mysql_query($sql);
            $where_cause = "";
            $max_rcode = 0;
            if(mysql_num_rows($rs)>0){ 
                $bid = mysql_result($rs,0,'id');
                $rcode = mysql_result($rs,0,'rcode');
                $fdate = mysql_result($rs,0,'fdate');
                $tdate = mysql_result($rs,0,'tdate');
            }     
            $txtMoney = 0; 
            
                   
           // mysql_query("update ".$dbprefix."member set point = point+".$txtMoney." where mcode='".$mcode."' ");
            mysql_query("update ".$dbprefix."adjust set cancel=1 where sano='$id' ");
            echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=2008'</script>";    
			//include("./comsn/com_c/rep_adjust.php"); 
           // mysql_query("DELETE FROM ".$dbprefix."point1 where sano='$id' ");
        }else{
            echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้');window.location='index.php?sessiontab=4&sub=2008'</script>";    
        }
        logtext(true,$_SESSION['adminuserid'],'ลบบิล adjust id : '.$row->sano,$row->sano);
        mysql_free_result($rs);
        mysql_query("COMMIT");
?>

    </table>