
<?php
 include("../function/function_pos.php");

function updatestockcard($dbprefix,$mcode,$inv_code,$inv_ref,$sano,$sanox,$sadate,$rccode,$satype,$pcode1,$uid,$qty1,$price1,$totalprice1){
global $_SESSION;
$inv_action = $_SESSION["admininvent"];
$invent = $inv_code;

$sadate = $_SESSION["datetimezone"];
//$in_qty ="";

    
    $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode1'";
    //exit;
    $rs = mysql_query($sql);
    //echo "$sql<BR>";
    if(mysql_num_rows($rs) > 0)
    {
        for($m=0;$m<mysql_num_rows($rs);$m++){
            
            $sqlObj = mysql_fetch_object($rs);
            $pcode2 =$sqlObj->pcode;    
            $qty2 =$sqlObj->qty*$qty1;    
            //var_dump($qty2);
            //$qty1 = $qty2;
            $price1 = $price2 = $sqlObj->price;
            $amount2 = $price2*$qty2;

            $sqlchkproduct = "select balance from ".$dbprefix."stockcard_s where sano = '".$sano."' and pcode = '$pcode2' order by id desc ";
            $rschkproduct = mysql_query($sqlchkproduct);
            if(mysql_num_rows($rschkproduct) > 0 and $satype != 'Z'){
                $qty_before=mysql_result($rschkproduct,0,'balance');
            }else{
                $sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode2."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
            }


            
            $qty_after=$qty_before+$qty2;
            $sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
              values('$sano','Head Office','$invent','$pcode2','$qty_before','$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิก คีย์รับที่สาขา','$uid')";
            mysql_query($sql);
            $yokma = $qty_before;

            $sqlproduct = " select * from ".$dbprefix."product where pcode = '".$pcode2."' ";
            $rsproduct = mysql_query($sqlproduct);
            if(mysql_num_rows($rsproduct) > 0){
                $price1=mysql_result($rsproduct,0,'price');
                $pdesc2=mysql_result($rsproduct,0,'pdesc');
                $totalprice1=$price1*$qty2;
            }


            if($satype == 'A' or $satype == 'B' or $satype == 'Q' or $satype == 'D' or $satype == 'J' or $satype == 'K' or $satype == 'H'){
                    $in_qty = 0;$in_price = 0;$in_amount = 0;
                    $out_qty = '-'.$qty2;$out_price = $price1;$out_amount = '-'.$amount2;
                }else{
                    $in_qty = $qty2;$in_price = $price1;$in_amount = $amount2;
                    $out_qty = 0;$out_price = 0;$out_amount = 0;
                }
                $balance = $yokma+$in_qty+$out_qty;
                $amount = $balance*$price1;
                mysql_query("insert into ".$dbprefix."stockcard_s(mcode,inv_code,inv_ref,inv_action,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action,pdesc) values('$mcode','$inv_code','$inv_ref','$inv_action','$sano','$sanox','$pcode2','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price2','$amount2','$uid','$satype','$pdesc2') ");

        
        }
    }else{


            /*$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode1."' and inv_code = '$invent'";
            
            $rsewallet = mysql_query($sqlewallet);
            if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;*/

            $sqlchkproduct = "select balance from ".$dbprefix."stockcard_s where sano = '".$sano."' and pcode = '$pcode1' order by id desc ";
            $rschkproduct = mysql_query($sqlchkproduct);
            //echo $sqlchkproduct.'  normal <br>';
            if(mysql_num_rows($rschkproduct) > 0 and $satype != 'Z'){
                $qty_before=mysql_result($rschkproduct,0,'balance');
            }else{
                $sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode1."' and inv_code = '$invent'";
                //echo $sqlewallet.'  normal <br>';
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
            }
            $qty_after=$qty_before+$qty;
            //echo $sqlewallet.':'.$qty_before.'<br>';
            $sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
              values('$sano','Head Office','$invent','$pcode','$qty_before','$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิก คีย์รับที่สาขา','$uid')";
            mysql_query($sql);
            $yokma = $qty_before;


            $sqlproduct = " select * from ".$dbprefix."product where pcode = '".$pcode1."' ";
            $rsproduct = mysql_query($sqlproduct);
            if(mysql_num_rows($rsproduct) > 0){
                $price1=mysql_result($rsproduct,0,'price');
                $pdesc2=mysql_result($rsproduct,0,'pdesc');
                $totalprice1=$price1*$qty1;
            }

                if($satype == 'A' or $satype == 'B' or $satype == 'Q' or $satype == 'D' or $satype == 'J' or $satype == 'K' or $satype == 'H' or $satype == 'BB'){
                    $in_qty = 0;$in_price = 0;$in_amount = 0;
                    $out_qty = '-'.$qty1;$out_price = $price1;$out_amount = '-'.$totalprice1;
                }else{
                    $in_qty = $qty1;$in_price = $price1;$in_amount = $totalprice1;
                    $out_qty = 0;$out_price = 0;$out_amount = 0;
                }
                $balance = $yokma+$in_qty+$out_qty;
                //exit;
                $amount = $balance*$price1;
                mysql_query("insert into ".$dbprefix."stockcard_s(mcode,inv_code,inv_ref,inv_action,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action,pdesc) values('$mcode','$inv_code','$inv_ref','$inv_action','$sano','$sanox','$pcode1','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price1','$amount','$uid','$satype','$pdesc2') ");
                //if($satype == 'G')echo "insert into ".$dbprefix."stockcard_s(mcode,inv_code,inv_ref,inv_action,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action,pdesc) values('$mcode','$inv_code','$inv_ref','$inv_action','$sano','$sanox','$pcode1','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price1','$amount','$uid','$satype','$pdesc2') <br>";
                //echo "insert into ".$dbprefix.".stockcard(mcode,inv_code,inv_ref,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action) values('$mcode','$inv_code','$inv_ref','$sano','$sanox','$pcode1','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price1','$amount','$uid','$satype') ";
                //exit;


    }

}

function updatestockcard1($dbprefix,$mcode,$inv_code,$inv_ref,$sano,$sanox,$sadate,$rccode,$satype,$pcode1,$uid,$qty1,$price1,$totalprice1){
global $_SESSION;
$inv_action = $_SESSION["admininvent"];
$invent = $inv_ref;
$sadate = $_SESSION["datetimezone"];
     $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode1'";
    //exit;
    $rs = mysql_query($sql);
    //echo "$sql<BR>";
    if(mysql_num_rows($rs) > 0)
    {
        for($m=0;$m<mysql_num_rows($rs);$m++){
            
            $sqlObj = mysql_fetch_object($rs);
            $pcode2 =$sqlObj->pcode;    
            $qty2 =$sqlObj->qty*$qty1;    

            //$qty1 = $qty2;
            $price1 = $price2 = $sqlObj->price;
            $amount2 = $price2*$qty2;
            //$sqlchkproduct = "select balance from ".$dbprefix."stockcard_s where sano = '".$sano."' and pcode = '$pcode2' order by id desc ";
            //$rschkproduct = mysql_query($sqlchkproduct);
            //if(mysql_num_rows($rschkproduct) > 0){
                //$qty_before=mysql_result($rschkproduct,0,'balance');
            //}else{
                $sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode2."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
            //}        
            $qty_after=$qty_before+$qty2;
            $sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
              values('$sano','Head Office','$invent','$pcode2','$qty_before','$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิก คีย์รับที่สาขา','$uid')";
            mysql_query($sql);
            $yokma = $qty_before;

            $sqlproduct = " select * from ".$dbprefix."product where pcode = '".$pcode2."' ";
            $rsproduct = mysql_query($sqlproduct);
            if(mysql_num_rows($rsproduct) > 0){
                $price1=mysql_result($rsproduct,0,'price');
                    $pdesc2=mysql_result($rsproduct,0,'pdesc');
                $totalprice1=$price1*$qty2;
            }

            if($satype == 'A' or $satype == 'B' or $satype == 'Q' or $satype == 'D' or $satype == 'J' or $satype == 'K' or $satype == 'H'){
                    $in_qty = $qty2;$in_price = $price1;$in_amount = $totalprice1;
                    $out_qty = 0;$out_price = 0;$out_amount = 0;

                }else{
                    $in_qty = 0;$in_price = 0;$in_amount = 0;
                    $out_qty = '-'.$qty2;$out_price = $price1;$out_amount = '-'.$totalprice1;
                }
                $balance = $yokma+$in_qty+$out_qty;
                $amount = $balance*$price1;
                mysql_query("insert into ".$dbprefix."stockcard_s(mcode,inv_code,inv_ref,inv_action,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action,pdesc) values('$mcode','$inv_code','$inv_ref','$inv_action','$sano','$sanox','$pcode2','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price2','$amount2','$uid','$satype','$pdesc2') ");
        
        }
    }else{


            /*$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode1."' and inv_code = '$invent'";
            
            $rsewallet = mysql_query($sqlewallet);
            if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
            $qty_after=$qty_before+$qty;
            //echo $sqlewallet.':'.$qty_before.'<br>';*/

            //$sqlchkproduct = "select balance from ".$dbprefix."stockcard_s where sano = '".$sano."' and pcode = '$pcode1' order by id desc ";
            //$rschkproduct = mysql_query($sqlchkproduct);
            //if(mysql_num_rows($rschkproduct) > 0){
            //    $qty_before=mysql_result($rschkproduct,0,'balance');
            //}else{
                $sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode1."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
            //}
            $qty_after=$qty_before+$qty;
            $sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
              values('$sano','Head Office','$invent','$pcode','$qty_before','$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิก คีย์รับที่สาขา','$uid')";
            mysql_query($sql);
            $yokma = $qty_before;

            $sqlproduct = " select * from ".$dbprefix."product where pcode = '".$pcode1."' ";
            $rsproduct = mysql_query($sqlproduct);
            if(mysql_num_rows($rsproduct) > 0){
                $price1=mysql_result($rsproduct,0,'price');
                    $pdesc2=mysql_result($rsproduct,0,'pdesc');
                $totalprice1=$price1*$qty1;
            }
                if($satype == 'A' or $satype == 'B' or $satype == 'Q' or $satype == 'D' or $satype == 'J' or $satype == 'K' or $satype == 'H' or $satype == 'BB'){
                    $in_qty = $qty1;$in_price = $price1;$in_amount = $totalprice1;
                    $out_qty = 0;$out_price = 0;$out_amount = 0;

                }else{
                    $in_qty = 0;$in_price = 0;$in_amount = 0;
                    $out_qty = '-'.$qty1;$out_price = $price1;$out_amount = '-'.$totalprice1;
                }
                $balance = $yokma+$in_qty+$out_qty;
                $amount = $balance*$price1;
                mysql_query("insert into ".$dbprefix."stockcard_s(mcode,inv_code,inv_ref,inv_action,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action,pdesc) values('$mcode','$inv_code','$inv_ref','$inv_action','$sano','$sanox','$pcode1','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price1','$amount','$uid','$satype','$pdesc2') ");
                //echo "insert into ".$dbprefix."stockcard_s(mcode,inv_code,inv_ref,inv_action,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action,pdesc) values('$mcode','$inv_code','$inv_ref','$inv_action','$sano','$sanox','$pcode1','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price1','$amount','$uid','$satype','$pdesc2') ";

                //echo "insert into ".$dbprefix.".stockcard(mcode,inv_code,inv_ref,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action) values('$mcode','$inv_code','$inv_ref','$sano','$sanox','$pcode1','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price1','$amount','$uid','$satype') ";
                //exit;


    }


}


function updatestockcardr($dbprefix,$mcode,$inv_code,$inv_ref,$sano,$sanox,$sadate,$rccode,$satype,$pcode1,$uid,$qty1,$price1,$totalprice1){
global $_SESSION;
$inv_action = $_SESSION["admininvent"];
$invent = $inv_code;
//var_dump($qty1);
$sadate = $_SESSION["datetimezone"];
    
    $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode1'";
    //exit;
    $rs = mysql_query($sql);
    //echo "$sql<BR>";
    if(mysql_num_rows($rs) > 0)
    {
        for($m=0;$m<mysql_num_rows($rs);$m++){
            
            $sqlObj = mysql_fetch_object($rs);
            $pcode2 =$sqlObj->pcode;    
            $qty2 =$sqlObj->qty*$qty1;    
            //var_dump($qty2);
            //$qty1 = $qty2;
            $price1 = $price2 = $sqlObj->price;
            $amount2 = $price2*$qty2;

            $sqlchkproduct = "select balance from ".$dbprefix."stockcard_r where sano = '".$sano."' and pcode = '$pcode2' order by id desc ";
            $rschkproduct = mysql_query($sqlchkproduct);
            if(mysql_num_rows($rschkproduct) > 0 and $satype != 'Z'){
                $qty_before=mysql_result($rschkproduct,0,'balance');
            }else{
                $sqlewallet = " select qtyr from ".$dbprefix."product_invent where pcode = '".$pcode2."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qtyr');else $qty_before=0;
            }


            
            $qty_after=$qty_before+$qty2;
            $sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
              values('$sano','Head Office','$invent','$pcode2','$qty_before','$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิก คีย์รับที่สาขา','$uid')";
            mysql_query($sql);
            $yokma = $qty_before;

            $sqlproduct = " select * from ".$dbprefix."product where pcode = '".$pcode2."' ";
            $rsproduct = mysql_query($sqlproduct);
            if(mysql_num_rows($rsproduct) > 0){
                $price1=mysql_result($rsproduct,0,'price');
                $pdesc2=mysql_result($rsproduct,0,'pdesc');
                $totalprice1=$price1*$qty2;
            }


            if($satype == 'A' or $satype == 'B' or $satype == 'Q' or $satype == 'D' or $satype == 'J' or $satype == 'K' or $satype == 'H'){
                    $in_qty = 0;$in_price = 0;$in_amount = 0;
                    $out_qty = '-'.$qty2;$out_price = $price1;$out_amount = '-'.$amount2;
                }else{
                    $in_qty = $qty2;$in_price = $price1;$in_amount = $amount2;
                    $out_qty = 0;$out_price = 0;$out_amount = 0;
                }
                $balance = $yokma+$in_qty+$out_qty;
                $amount = $balance*$price1;
                mysql_query("insert into ".$dbprefix."stockcard_r(mcode,inv_code,inv_ref,inv_action,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action,pdesc) values('$mcode','$inv_code','$inv_ref','$inv_action','$sano','$sanox','$pcode2','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price2','$amount2','$uid','$satype','$pdesc2') ");

        
        }
    }else{


            /*$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode1."' and inv_code = '$invent'";
            
            $rsewallet = mysql_query($sqlewallet);
            if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;*/

            $sqlchkproduct = "select balance from ".$dbprefix."stockcard_r where sano = '".$sano."' and pcode = '$pcode1' order by id desc ";
            $rschkproduct = mysql_query($sqlchkproduct);
            //echo $sqlchkproduct.'  normal <br>';
            if(mysql_num_rows($rschkproduct) > 0 and $satype != 'Z'){
                $qty_before=mysql_result($rschkproduct,0,'balance');
            }else{
                $sqlewallet = " select qtyr from ".$dbprefix."product_invent where pcode = '".$pcode1."' and inv_code = '$invent'";
                //echo $sqlewallet.'  normal <br>';
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qtyr');else $qty_before=0;
            }
            $qty_after=$qty_before+$qty;
            //echo $sqlewallet.':'.$qty_before.'<br>';
            $sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
              values('$sano','Head Office','$invent','$pcode','$qty_before','$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิก คีย์รับที่สาขา','$uid')";
            mysql_query($sql);
            $yokma = $qty_before;


            $sqlproduct = " select * from ".$dbprefix."product where pcode = '".$pcode1."' ";
            $rsproduct = mysql_query($sqlproduct);
            if(mysql_num_rows($rsproduct) > 0){
                $price1=mysql_result($rsproduct,0,'price');
                $pdesc2=mysql_result($rsproduct,0,'pdesc');
                $totalprice1=$price1*$qty1;
            }

                if($satype == 'A' or $satype == 'B' or $satype == 'Q' or $satype == 'D' or $satype == 'J' or $satype == 'K' or $satype == 'H' or $satype == 'BB'){
                    $in_qty = 0;$in_price = 0;$in_amount = 0;
                    $out_qty = '-'.$qty1;$out_price = $price1;$out_amount = '-'.$totalprice1;
                }else{
                    $in_qty = $qty1;$in_price = $price1;$in_amount = $totalprice1;
                    $out_qty = 0;$out_price = 0;$out_amount = 0;
                }
                //var_dump($yokma);
                //var_dump($qty1);
                //var_dump($out_qty);
                $balance = $yokma+$in_qty+$out_qty;
                $amount = $balance*$price1;
                mysql_query("insert into ".$dbprefix."stockcard_r(mcode,inv_code,inv_ref,inv_action,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action,pdesc) values('$mcode','$inv_code','$inv_ref','$inv_action','$sano','$sanox','$pcode1','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price1','$amount','$uid','$satype','$pdesc2') ");
                if($satype == 'G')echo "insert into ".$dbprefix."stockcard_r(mcode,inv_code,inv_ref,inv_action,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action,pdesc) values('$mcode','$inv_code','$inv_ref','$inv_action','$sano','$sanox','$pcode1','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price1','$amount','$uid','$satype','$pdesc2') <br>";
                //echo "insert into ".$dbprefix.".stockcard(mcode,inv_code,inv_ref,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action) values('$mcode','$inv_code','$inv_ref','$sano','$sanox','$pcode1','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price1','$amount','$uid','$satype') ";
                //exit;


    }

}

function updatestockcardr1($dbprefix,$mcode,$inv_code,$inv_ref,$sano,$sanox,$sadate,$rccode,$satype,$pcode1,$uid,$qty1,$price1,$totalprice1){
global $_SESSION;
$inv_action = $_SESSION["admininvent"];
$invent = $inv_ref;
$sadate = $_SESSION["datetimezone"];
     $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode1'";
    //exit;
    $rs = mysql_query($sql);
    //echo "$sql<BR>";
    if(mysql_num_rows($rs) > 0)
    {
        for($m=0;$m<mysql_num_rows($rs);$m++){
            
            $sqlObj = mysql_fetch_object($rs);
            $pcode2 =$sqlObj->pcode;    
            $qty2 =$sqlObj->qty*$qty1;    

            //$qty1 = $qty2;
            $price1 = $price2 = $sqlObj->price;
            $amount2 = $price2*$qty2;
        //    $sqlchkproduct = "select balance from ".$dbprefix."stockcard_r where sano = '".$sano."' and pcode = '$pcode2' order by id desc ";
        //    $rschkproduct = mysql_query($sqlchkproduct);
        //    if(mysql_num_rows($rschkproduct) > 0){
        //        $qty_before=mysql_result($rschkproduct,0,'balance');
        //    }else{
                $sqlewallet = " select qtyr from ".$dbprefix."product_invent where pcode = '".$pcode2."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qtyr');else $qty_before=0;
        //    }        
            $qty_after=$qty_before+$qty2;
            $sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
              values('$sano','Head Office','$invent','$pcode2','$qty_before','$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิก คีย์รับที่สาขา','$uid')";
            mysql_query($sql);
            $yokma = $qty_before;

            $sqlproduct = " select * from ".$dbprefix."product where pcode = '".$pcode2."' ";
            $rsproduct = mysql_query($sqlproduct);
            if(mysql_num_rows($rsproduct) > 0){
                $price1=mysql_result($rsproduct,0,'price');
                    $pdesc2=mysql_result($rsproduct,0,'pdesc');
                $totalprice1=$price1*$qty2;
            }

            if($satype == 'A' or $satype == 'B' or $satype == 'Q' or $satype == 'D' or $satype == 'J' or $satype == 'K' or $satype == 'H'){
                    $in_qty = $qty2;$in_price = $price1;$in_amount = $totalprice1;
                    $out_qty = 0;$out_price = 0;$out_amount = 0;

                }else{
                    $in_qty = 0;$in_price = 0;$in_amount = 0;
                    $out_qty = '-'.$qty2;$out_price = $price1;$out_amount = '-'.$totalprice1;
                }
                $balance = $yokma+$in_qty+$out_qty;
                $amount = $balance*$price1;
                mysql_query("insert into ".$dbprefix."stockcard_r(mcode,inv_code,inv_ref,inv_action,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action,pdesc) values('$mcode','$inv_code','$inv_ref','$inv_action','$sano','$sanox','$pcode2','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price2','$amount2','$uid','$satype','$pdesc2') ");
        
        }
    }else{


            /*$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode1."' and inv_code = '$invent'";
            
            $rsewallet = mysql_query($sqlewallet);
            if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
            $qty_after=$qty_before+$qty;
            //echo $sqlewallet.':'.$qty_before.'<br>';*/

        //    $sqlchkproduct = "select balance from ".$dbprefix."stockcard_r where sano = '".$sano."' and pcode = '$pcode1' order by id desc ";
        //    $rschkproduct = mysql_query($sqlchkproduct);
        //    if(mysql_num_rows($rschkproduct) > 0){
        //        $qty_before=mysql_result($rschkproduct,0,'balance');
        //    }else{
                $sqlewallet = " select qtyr from ".$dbprefix."product_invent where pcode = '".$pcode1."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qtyr');else $qty_before=0;
        //    }
            $qty_after=$qty_before+$qty;
            $sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
              values('$sano','Head Office','$invent','$pcode','$qty_before','$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิก คีย์รับที่สาขา','$uid')";
            mysql_query($sql);
            $yokma = $qty_before;

            $sqlproduct = " select * from ".$dbprefix."product where pcode = '".$pcode1."' ";
            $rsproduct = mysql_query($sqlproduct);
            if(mysql_num_rows($rsproduct) > 0){
                $price1=mysql_result($rsproduct,0,'price');
                    $pdesc2=mysql_result($rsproduct,0,'pdesc');
                $totalprice1=$price1*$qty1;
            }
                if($satype == 'A' or $satype == 'B' or $satype == 'Q' or $satype == 'D' or $satype == 'J' or $satype == 'K' or $satype == 'H' or $satype == 'BB'){
                    $in_qty = $qty1;$in_price = $price1;$in_amount = $totalprice1;
                    $out_qty = 0;$out_price = 0;$out_amount = 0;

                }else{
                    $in_qty = 0;$in_price = 0;$in_amount = 0;
                    $out_qty = '-'.$qty1;$out_price = $price1;$out_amount = '-'.$totalprice1;
                }
                $balance = $yokma+$in_qty+$out_qty;
                $amount = $balance*$price1;
                mysql_query("insert into ".$dbprefix."stockcard_r(mcode,inv_code,inv_ref,inv_action,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action,pdesc) values('$mcode','$inv_code','$inv_ref','$inv_action','$sano','$sanox','$pcode1','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price1','$amount','$uid','$satype','$pdesc2') ");

                //echo "insert into ".$dbprefix.".stockcard(mcode,inv_code,inv_ref,sano,sano_ref,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,sadate,rccode,yokma,balance,price,amount,uid,action) values('$mcode','$inv_code','$inv_ref','$sano','$sanox','$pcode1','$in_qty','$in_price','$in_amount','$out_qty','$out_price','$out_amount','$sadate','$rccode','$yokma','$balance','$price1','$amount','$uid','$satype') ";
                //exit;


    }


}

function calc_stock($dbprefix,$pcode,$invent,$qty,$sano,$uid,$inv_code,$satype,$receive){
        if($satype == 'A' or $satype == 'B' or $satype == 'Q' or $satype == 'D' or $satype == 'J' or $satype == 'K' or $satype == 'H'){
            calc_minusProduct($dbprefix,$pcode,$invent,$qty,$sano,$uid,$inv_code);
        }else{
            calc_plusProduct($dbprefix,$pcode,$invent,$qty,$sano,$uid,$receive);
        }



}
function calc_plusProduct($dbprefix,$pcode,$invent,$qty,$sano,$uid,$receive){

         $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
        //exit;
        $rs = mysql_query($sql);
        //echo "$sql<BR>";
        if(mysql_num_rows($rs) > 0)
        {
            for($m=0;$m<mysql_num_rows($rs);$m++){
                
                $sqlObj = mysql_fetch_object($rs);
                $pcode2 =$sqlObj->pcode;    
                $qty2 =$sqlObj->qty*$qty;    

                $sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode2."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
                $qty_after=$qty_before+$qty2;
                
                $sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode2' and inv_code = '$invent'";
                $rs1 = mysql_query($sql);
                if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty+$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";
                else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode2','$qty2','$invent')";
            //    echo $sql;
            //    exit;
                mysql_query($sql);
            }
        }else{


                $sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
                $qty_after=$qty_before+$qty;

            $sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
            $rs1 = mysql_query($sql);
            if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
            else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode','$qty','$invent')";
            mysql_query($sql);

        }

}

function calc_minusProduct($dbprefix,$pcode,$invent,$qty,$sano,$uid,$inv_code){

         $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
        //exit;
        $rs = mysql_query($sql);
        //echo "$sql<BR>";
        if(mysql_num_rows($rs) > 0)
        {
            for($m=0;$m<mysql_num_rows($rs);$m++){
                
                $sqlObj = mysql_fetch_object($rs);
                $pcode2 =$sqlObj->pcode;    
                $qty2 =$sqlObj->qty*$qty;    

                $sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode2."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
                $qty_after=$qty_before-$qty2;
                
                $sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode2' and inv_code = '$invent'";
                $rs1 = mysql_query($sql);
                if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";
                else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode2','-$qty2','$invent')";
            //    echo $sql;
            //    exit;
                mysql_query($sql);
            
            }
        }else{


                $sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
                $qty_after=$qty_before-$qty;

            $sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
            $rs1 = mysql_query($sql);
            if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
            else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode','-$qty','$invent')";
            mysql_query($sql);

        }
}

function minusProductBack($dbprefix,$pcode,$invent,$qty,$sano,$uid,$inv_code){

         $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
        //exit;
        $rs = mysql_query($sql);
        //echo "$sql<BR>";
        if(mysql_num_rows($rs) > 0)
        {
            for($m=0;$m<mysql_num_rows($rs);$m++){
                
                $sqlObj = mysql_fetch_object($rs);
                $pcode2 =$sqlObj->pcode;    
                $qty2 =$sqlObj->qty*$qty;    

                $sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode2."'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
                $qty_after=$qty_before-$qty2;
                
                $sql = "select * from ".$dbprefix."product  where pcode='$pcode2'";
                $rs1 = mysql_query($sql);
                if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product set qty = qty-$qty2 WHERE pcode='$pcode2' ";
                else $sql = "insert into ".$dbprefix."product(pcode,qty) values('$pcode2','-$qty2')";
            //    echo $sql;
            //    exit;
                mysql_query($sql);
            
            }
        }else{


                $sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode."'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
                $qty_after=$qty_before-$qty;

            $sql = "select * from ".$dbprefix."product  where pcode='$pcode'";
            $rs1 = mysql_query($sql);
            if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode'";
            else $sql = "insert into ".$dbprefix."product(pcode,qty) values('$pcode','-$qty')";
            mysql_query($sql);

        }
}

function calc_minusProductr($dbprefix,$pcode,$invent,$qty,$sano,$uid,$inv_code){

         $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
        //exit;
        $rs = mysql_query($sql);
        //echo "$sql<BR>";
        if(mysql_num_rows($rs) > 0)
        {
            for($m=0;$m<mysql_num_rows($rs);$m++){
                
                $sqlObj = mysql_fetch_object($rs);
                $pcode2 =$sqlObj->pcode;    
                $qty2 =$sqlObj->qty*$qty;    

                $sqlewallet = " select qtyr from ".$dbprefix."product_invent where pcode = '".$pcode2."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qtyr');else $qty_before=0;
                $qty_after=$qty_before-$qty2;
                
                $sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode2' and inv_code = '$invent'";
                $rs1 = mysql_query($sql);
                if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qtyr = qtyr-$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";
                else $sql = "insert into ".$dbprefix."product_invent(pcode,qtyr,inv_code) values('$pcode2','-$qty2','$invent')";
            //    echo $sql;
            //    exit;
                mysql_query($sql);
            
            }
        }else{


                $sqlewallet = " select qtyr from ".$dbprefix."product_invent where pcode = '".$pcode."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qtyr');else $qty_before=0;
                $qty_after=$qty_before-$qty;

            $sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
            $rs1 = mysql_query($sql);
            if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qtyr = qtyr-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
            else $sql = "insert into ".$dbprefix."product_invent(pcode,qtyr,inv_code) values('$pcode','-$qty','$invent')";
            mysql_query($sql);

        }
}

function calc_plusProductr($dbprefix,$pcode,$invent,$qty,$sano,$uid,$receive){

         $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
        //exit;
        $rs = mysql_query($sql);
        //echo "$sql<BR>";
        if(mysql_num_rows($rs) > 0)
        {
            for($m=0;$m<mysql_num_rows($rs);$m++){
                
                $sqlObj = mysql_fetch_object($rs);
                $pcode2 =$sqlObj->pcode;    
                $qty2 =$sqlObj->qty*$qty;    

                $sqlewallet = " select qtyr from ".$dbprefix."product_invent where pcode = '".$pcode2."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qtyr');else $qty_before=0;
                $qty_after=$qty_before+$qty2;
                
                $sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode2' and inv_code = '$invent'";
                $rs1 = mysql_query($sql);
                if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qtyr = qtyr+$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";
                else $sql = "insert into ".$dbprefix."product_invent(pcode,qtyr,inv_code) values('$pcode2','$qty2','$invent')";
            //    echo $sql;
            //    exit;
                mysql_query($sql);
            }
        }else{


                $sqlewallet = " select qtyr from ".$dbprefix."product_invent where pcode = '".$pcode."' and inv_code = '$invent'";
                $rsewallet = mysql_query($sqlewallet);
                if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qtyr');else $qty_before=0;
                $qty_after=$qty_before+$qty;

            $sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
            $rs1 = mysql_query($sql);
            if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qtyr = qtyr+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
            else $sql = "insert into ".$dbprefix."product_invent(pcode,qtyr,inv_code) values('$pcode','$qty','$invent')";
            mysql_query($sql);

        }

}


function getdistrict($mc){
    // connect to database 
    $sql="select * from district where districtId='$mc' ";
    //echo "$sql<BR>";
    if ($mc==""){return "";}
    $result=mysql_query($sql);
    if (mysql_num_rows($result)>0) {
        $row = mysql_fetch_object($result);
        return $row->districtName;
    }else{
        return $mc;
    }
}
function getamphur($mc){
    // connect to database 
    $sql="select * from amphur where amphurId='$mc' ";
    //echo "$sql<BR>";
    if ($mc==""){return "";}
    $result=mysql_query($sql);
    if (mysql_num_rows($result)>0) {
        $row = mysql_fetch_object($result);
        return $row->amphurName;
    }else{
        return $mc;
    }
}
    
function getprovince($mc){
 global $dbprefix;
    $sql="select * from province where provinceId='$mc' ";
    //echo "$sql<BR>";
    if ($mc==""){return "";}
    $result=mysql_query($sql);
    if (mysql_num_rows($result)>0) {
        $row = mysql_fetch_object($result);
        return $row->provinceName;
    }else{
        return $mc;
    }
}

function getdistrictId($mc){
    // connect to database 
    $sql="select * from district where districtName='$mc' ";
    //echo "$sql<BR>";
    if ($mc==""){return "";}
    $result=mysql_query($sql);
    if (mysql_num_rows($result)>0) {
        $row = mysql_fetch_object($result);
        return $row->districtId;
    }else{
        return $mc;
    }
}
function getdistrictId1($mc,$mc1,$mc2){
    // connect to database 
    $sql="select * from district where districtName='$mc' and amphurId = '$mc1' and provinceId = '$mc2' ";
    //echo "$sql<BR>";
    if ($mc==""){return "";}
    $result=mysql_query($sql);
    if (mysql_num_rows($result)>0) {
        $row = mysql_fetch_object($result);
        return $row->districtId;
    }else{
        return $mc;
    }
}
function getamphurId($mc){
    // connect to database 
    $sql="select * from amphur where amphurName='$mc' ";
    //echo "$sql<BR>";
    if ($mc==""){return "";}
    $result=mysql_query($sql);
    if (mysql_num_rows($result)>0) {
        $row = mysql_fetch_object($result);
        return $row->amphurId;
    }else{
        return $mc;
    }
}
    
function getprovinceId($mc){
 global $dbprefix;
    $sql="select * from province where provinceName='$mc' ";
    //echo "$sql<BR>";
    if ($mc==""){return "";}
    $result=mysql_query($sql);
    if (mysql_num_rows($result)>0) {
        $row = mysql_fetch_object($result);
        return $row->provinceId;
    }else{
        return $mc;
    }
}

function updateVoucher($dbprefix,$mcode,$txtInternet,$bewallet){
	//global $sano;
    $sql3 = "update ".$dbprefix."member set voucher = voucher-'$txtInternet'  where mcode = '$mcode' ";
    $rs3=mysql_query($sql3);
	//log_ewallet('voucher',$mcode,$sano,$txtInternet,'O',DATE("Y-m-d"),'');


}
function searchmember($dbprefix,$mcode){
    $sql = "SELECT * from ".$dbprefix."member WHERE mcode = '".$mcode."' ";
    $rs = mysql_query($sql);
    if(mysql_num_rows($rs)>0){
        $arr_member = array();
        $arr_member["name_t"] = mysql_result($rs,0,'name_t');
        $arr_member["mobile"] = mysql_result($rs,0,'mobile');
        $arr_member["locationbase"] = mysql_result($rs,0,'locationbase');
        $arr_member["name_f"] = mysql_result($rs,0,'name_f');        
    }
    return $arr_member;
}

function searchbranch($dbprefix,$mcode){
    $sql = "SELECT * from ".$dbprefix."invent WHERE inv_code = '".$mcode."' ";
    $rs = mysql_query($sql);
    if(mysql_num_rows($rs)>0){
        $arr_member = array();
        //$arr_member["name_t"] = mysql_result($rs,0,'name_t');
        //$arr_member["mobile"] = mysql_result($rs,0,'mobile');
        $arr_member["locationbase"] = mysql_result($rs,0,'locationbase');
        //$arr_member["name_f"] = mysql_result($rs,0,'name_f');        
    }
    return $arr_member;
}
function searchlocationbase($dbprefix,$locationbase){
    $sql = "SELECT * from ".$dbprefix."location_base WHERE cid = '".$locationbase."' ";
    $rs = mysql_query($sql);
    if(mysql_num_rows($rs)>0){
        $arr_locationbase = array();
        $arr_locationbase["cshort"] = mysql_result($rs,0,'cshort');
        $arr_locationbase["cname"] = mysql_result($rs,0,'cname');
        $arr_locationbase["csending"] = mysql_result($rs,0,'csending');
        $arr_locationbase["ctax"] = mysql_result($rs,0,'ctax');        
        $arr_locationbase["crate"] = mysql_result($rs,0,'crate');        
        $arr_locationbase["pcode_register"] = mysql_result($rs,0,'pcode_register');        
        $arr_locationbase["pcode_extend"] = mysql_result($rs,0,'pcode_extend');        
        $arr_locationbase["smssending"] = mysql_result($rs,0,'smssending');    
        $timediff = mysql_result($rs,0,'timediff');    
        $arr_locationbase["datetimezone"] = date("Y-m-d", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
        $arr_locationbase["datetimezone1"] = date("Y-m-d H:i:s", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));

    
    //    if($locationbase == '1')$arr_locationbase["datetimezone"] = 'xvcxvcxxc';
                
    }
    return $arr_locationbase;
}

function searchsending($dbprefix,$locationbase,$stype,$tot_pv,$weight){
    $sql = "SELECT * from ".$dbprefix."sending WHERE locationbase = '".$locationbase."' and minweight <= '$weight' and maxweight >= '$weight'  ";
    $rs = mysql_query($sql);
    if(mysql_num_rows($rs)>0){
        $arr_sending = array();
        $arr_sending["inbound-pcode"]["pcode"] = mysql_result($rs,0,'inbound-pcode');
        $arr_sending["minpv"]  = mysql_result($rs,0,'minpv');        
        $arr_sending["maxpv"]  = mysql_result($rs,0,'maxpv');    
        $sql = "SELECT * from ".$dbprefix."product WHERE pcode = '".$arr_sending["inbound-pcode"]["pcode"]."'";
        $rs1 = mysql_query($sql);
        if(mysql_num_rows($rs1)>0){
            $arr_sending["inbound-pcode"]["bprice"] = mysql_result($rs1,0,'bprice');        
            $arr_sending["inbound-pcode"]["price"] = mysql_result($rs1,0,'price');        
            $arr_sending["inbound-pcode"]["pv"] = mysql_result($rs1,0,'pv');        
        }
        $arr_sending["outbound-pcode"]["pcode"] = mysql_result($rs,0,'outbound-pcode');
        $sql = "SELECT * from ".$dbprefix."product WHERE pcode = '".$arr_sending["outbound-pcode"]["pcode"]."'";
        $rs1 = mysql_query($sql);
        if(mysql_num_rows($rs1)>0){
                
            $arr_sending["outbound-pcode"]["bprice"] = mysql_result($rs1,0,'bprice');        
            $arr_sending["outbound-pcode"]["price"] = mysql_result($rs1,0,'price');        
            $arr_sending["outbound-pcode"]["pv"] = mysql_result($rs1,0,'pv');        
        }
        $arr_sending["overweight-pcode"]["pcode"] = mysql_result($rs,0,'overweight-pcode');
        $sql = "SELECT * from ".$dbprefix."product WHERE pcode = '".$arr_sending["overweight-pcode"]["pcode"]."'";
        $rs1 = mysql_query($sql);
        if(mysql_num_rows($rs1)>0){
            $arr_sending["overweight-pcode"]["bprice"] = mysql_result($rs1,0,'bprice');        
            $arr_sending["overweight-pcode"]["price"] = mysql_result($rs1,0,'price');        
            $arr_sending["overweight-pcode"]["pv"] = mysql_result($rs1,0,'pv');        
        }
        $arr_sending["maxweight"] = mysql_result($rs,0,'maxweight');
    }

    return $arr_sending;
}
function isvaliddate($ymd){
    //function สำหรับตรวจสอบ string $ymd ว่าเป็นวันที่ที่ถูกต้องหรือไม่
    //ถ้าเป็น str ว่าง return false
    if($ymd==''){
        return false;
    }
    //ถ้าformat ไม่เท่ากับ '0000-00-00' return false
    list($y, $m, $d) = explode("-", $ymd);
    if(!(strlen($y)==4 and (strlen($m)==2 or strlen($m)==1) and (strlen($d)==2 or strlen($d)==1))){
        return false;
    }
    if(! checkdate($m, $d, $y)){
        return false;
    }
    return true;
}

function isvaliddatetime($ymd){
    //function สำหรับตรวจสอบ string $ymd ว่าเป็นวันที่ที่ถูกต้องหรือไม่
    //ถ้าเป็น str ว่าง return false
    if($ymd==''){
        return false;
    }
    //ถ้าformat ไม่เท่ากับ '0000-00-00 00:00:00' return false
    list($ymd_date,$ymd_time)= explode(" ", $ymd);
    if(! isvaliddate($ymd_date)){
        return false;
    }
    list($h, $m, $s) = explode(":", $ymd_time);
    if(!((strlen($h)==2 or strlen($h)==1) and (strlen($m)==2 or strlen($m)==1) and (strlen($s)==2 or strlen($s)==1))){
        return false;
    }
    if(! ($h<24 and $m<60 and $s<60)){
        return false;
    }
    return true;
}

/*
function showoptionlist($fieldi,$tablename,$returnvaluefield,$showfield){
    global $dbprefix,$fieldsval;
    $sql="select $returnvaluefield,$showfield from ".$dbprefix."$tablename  order by $returnvaluefield";
    $result=mysql_query($sql);
    echo "<select name=\"val$fieldi\">";
    if($result){
        while($row=mysql_fetch_object($result)){
            $returnvalue=$row->$returnvaluefield;
            $showvalue=$row->$showfield;
            echo "<option value=\"$returnvalue\" ";
            if($fieldsval[$fieldi]==$returnvalue){
                echo "selected";
            }
            echo ">";
            echo "$returnvalue - $showvalue";
            echo "</option>";
        }
    }    
    echo "</select>";
}
*/

function showoptionlists($fieldname,$tablename,$returnvaluefield,$showfield){ // for not template case 
    global $dbprefix,$$fieldname,$fieldsval;;
    $sql="select $returnvaluefield,$showfield[0],$showfield[1] from ".$dbprefix."$tablename order by $showfield[0]";
    $result=mysql_query($sql);
    echo "<select name=\"$fieldname\">";
    if($result){
        while($row=mysql_fetch_object($result)){
            $returnvalue=$row->$returnvaluefield;
            $showvalue[0]=$row->$showfield[0];
            $showvalue[1]=$row->$showfield[1];
            echo "<option value=\"$returnvalue\" ";
            if($$fieldname==$returnvalue){
                echo "selected";
            }
            echo ">";
            echo "($showvalue[0] ) $showvalue[1]";
            echo "</option>";
        }
    }    
    echo "</select>";
}

function showoptionlist2($fieldname,$tablename,$returnvaluefield,$showfield){ // for not template case 
    global $dbprefix,$$fieldname;
    $sql="select $returnvaluefield,$showfield from ".$dbprefix."$tablename ";
    $result=mysql_query($sql);
    echo "<select name=\"$fieldname\">";
    echo "<option value=\"\" ";
    echo ">";
    echo "</option>";
    if($result){
        while($row=mysql_fetch_object($result)){
            $returnvalue=$row->$returnvaluefield;
            $showvalue=$row->$showfield;
            echo "<option value=\"$returnvalue\" ";
            if($$fieldname==$returnvalue){
                echo "selected";
            }
            echo ">";
            echo "$showvalue";
            echo "</option>";
        }
    }    
    echo "</select>";
}
function showoptionlists2($fieldname,$tablename,$returnvaluefield,$showfield , $whereclause){ // for not template case 
    global $dbprefix,$$fieldname;
    $sql="select $returnvaluefield,$showfield from ".$dbprefix."$tablename ";
    if($whereclause <> '' ) $sql  =  $sql ." where " . $whereclause;
    $result=mysql_query($sql);
    echo "<select name=\"$fieldname\">";
    echo "<option value=\"\" ";
    echo ">";
    echo "</option>";
    if($result){
        while($row=mysql_fetch_object($result)){
            $returnvalue=$row->$returnvaluefield;
            $showvalue=$row->$showfield;
            echo "<option value=\"$returnvalue\" ";
            if($$fieldname==$returnvalue){
                echo "selected";
            }
            echo ">";
            echo "($returnvalue)  $showvalue";
            echo "</option>";
        }
    }    
    echo "</select>";
}



function datefull($d)
{
    if (is_null($d))
        {return("");}
    if (empty($d))
        {return("");}
    //check if $d is a date string

    if (($dd = strtotime($d)) === -1)
        {return("");}
    else
        {return(date('d',$dd) ."-". date('m',$dd) ."-". date('Y',$dd));}
} //End Function


function dateshort($d)
{
    if (is_null($d))
        {return("");}
    if (empty($d))
        {return("");}
    //check if $d is a date string
    if (($dd = strtotime($d)) === -1)
        {return("");}
    else
        {return(date('d',$dd) ."-". date('m',$dd) ."-". date('y',$dd));}
} //End Function

function mydate($d)
{
    if (is_null($d))
        {return("");}
    if (empty($d))
        {return("");}
    //check if $d is a date string
    if (($dd = strtotime($d)) === -1)
        {return("");}
    else
        {return(date('Y',$dd) ."-". date('m',$dd) ."-". date('d',$dd));}
} //End Function

//>>>>>>>>>>>>>>>>>>>>>>>>>>>
// ฟังก์ชัน สำหรับเปลี่ยน เลขเดือน ให้เป็น อักษรย่อเดือน อังกฤษ
//>>>>>>>>>>>>>>>>>>>>>>>>>>>
function MonthEAbb($M)
{
    If (is_numeric($M))
    {    $mm=0+$M;
        switch ($M) {
        Case 1:
            return("Jan");
            break;
        Case 2:
            return("Feb");
            break;
        Case 3:
            return("Mar");
            break;
        Case 4:
            return("Apr");
            break;
        Case 5:
            return("May");
            break;
        Case 6:
            return("Jun");
            break;
        Case 7:
            return("Jul");
            break;
        Case 8:
            return("Aug");
            break;
        Case 9:
            return("Sep");
            break;
        Case 10:
            return("Oct");
            break;
        Case 11:
            return("Nov");
            break;
        Case 12:
            return("Dec");
            break;
        default:
            return("");
        }
    }
    else
    { 
        return("");
    }
} //End Function

//>>>>>>>>>>>>>>>>>>>>>>>>>>>
// ฟังก์ชัน สำหรับเปลี่ยน เลขเดือน ให้เป็น อักษร อังกฤษ
//>>>>>>>>>>>>>>>>>>>>>>>>>>>
function MonthE($M)
{
    If (is_numeric($M))
    {    $mm=0+$M;
        switch ($M) {
        Case 1:
            return("January");
            break;
        Case 2:
            return("February");
            break;
        Case 3:
            return("March");
            break;
        Case 4:
            return("April");
            break;
        Case 5:
            return("May");
            break;
        Case 6:
            return("June");
            break;
        Case 7:
            return("July");
            break;
        Case 8:
            return("August");
            break;
        Case 9:
            return("September");
            break;
        Case 10:
            return("October");
            break;
        Case 11:
            return("November");
            break;
        Case 12:
            return("December");
            break;
        default:
            return("");
        }
    }
    else
    { 
        return("");
    }
} //End Function

//>>>>>>>>>>>>>>>>>>>>>>>>>>>
// ฟังก์ชัน สำหรับเปลี่ยน เลขเดือน ให้เป็น อักษรย่อเดือน ไทย
//>>>>>>>>>>>>>>>>>>>>>>>>>>>
function MonthTAbb($M)
{
    If (is_numeric($M))
    {    $mm=0+$M;
        switch ($M) {
        Case 1:
            return("ม.ค.");
            break;
        Case 2:
            return("ก.พ.");
            break;
        Case 3:
            return("มี.ค.");
            break;
        Case 4:
            return("เม.ย.");
            break;
        Case 5:
            return("พ.ค.");
            break;
        Case 6:
            return("มิ.ย.");
            break;
        Case 7:
            return("ก.ค.");
            break;
        Case 8:
            return("ส.ค.");
            break;
        Case 9:
            return("ก.ย.");
            break;
        Case 10:
            return("ต.ค.");
            break;
        Case 11:
            return("พ.ย.");
            break;
        Case 12:
            return("ธ.ค.");
            break;
        default:
            return("");
        }
    }
    else
    { 
        return("");
    }
} //End Function

//>>>>>>>>>>>>>>>>>>>>>>>>>>>
// ฟังก์ชัน สำหรับเปลี่ยน เลขเดือน ให้เป็น อักษรไทย
//>>>>>>>>>>>>>>>>>>>>>>>>>>>
function MonthT($M)
{
    If (is_numeric($M))
    {    $mm=0+$M;
        switch ($M) {
        Case 1:
            return("มกราคม");
            break;
        Case 2:
            return("กุมภาพันธ์");
            break;
        Case 3:
            return("มีนาคม");
            break;
        Case 4:
            return("เมษายน");
            break;
        Case 5:
            return("พฤษภาคม");
            break;
        Case 6:
            return("มิถุนายน");
            break;
        Case 7:
            return("กรกฎาคม");
            break;
        Case 8:
            return("สิงหาคม");
            break;
        Case 9:
            return("กันยายน");
            break;
        Case 10:
            return("ตุลาคม");
            break;
        Case 11:
            return("พฤศจิกายน");
            break;
        Case 12:
            return("ธันวาคม");
            break;
        default:
            return("");
        }
    }
    else
    { 
        return("");
    }
} //End Function

function MoneyFormat($mon)
{
    if  (! is_null($mon) and ! empty($mon) and is_numeric($mon))
    {
        return(number_format($mon, 2, '.', ','));
    }
    else
    {
        return("0.00");
    }
}    //End Function

function MoneyNoDec($mon)
{
    if  (! is_null($mon) and ! empty($mon) and is_numeric($mon))
    {
        return(number_format($mon, 0, '.', ','));
    }
    else
    {
        return("0");
    }
}    //End Function

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// ใช้เข้ารหัส password ก่อนการเก็บ
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function EncodePwd($X)
{    
    $E = array( 111, 125, 147, 35, 70, 3, 9, 44, 69, 13);
    $XX="";
    $tempX="";
    if (is_null($X)) 
        { $X="";}
    $tempX = substr($X, 0, 10);
    for ($i = 1; $i <= strlen($tempX); $i++) 
        {
        // XX = XX & Format(Asc(Mid(tempX, i, 1)) + E(i), "000")
        $XX .= sprintf("%03d",ord(substr($tempX,$i-1,1)) + $E[$i-1]);
        }
    return($XX);
}    //End Function

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// ใช้ถอดรหัส password ก่อนการใช้
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function DecodePwd($X)
{
    $E = array( 111, 125, 147, 35, 70, 3, 9, 44, 69, 13);
    $XX="";
    $tempX="";
    if (is_null($X))
        {$X="";}
    $tempX = substr($X, 0, 30);
    $n = (int) (strlen($tempX) / 3);
    for ($i = 0; $i <= ($n-1); $i++)
    {
        //XX = XX & Chr(CInt(Mid(tempX, (i * 3) + 1, 1) & Mid(tempX, (i * 3) + 2, 1) & Mid(tempX, (i * 3) + 3, 1)) - E(i + 1))
        $XX .= Chr((int)(substr($tempX, ($i * 3), 1) . substr($tempX, ($i * 3) + 1, 1) . substr($tempX, ($i * 3) + 2, 1)) - $E[$i]);
    }
    return(trim($XX));
}    //End Function
// DecodePwd('160173197084126057041076101045')=102186

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// ใช้ปรับ step ในการ update ข้อมูล
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function UpDateStep($p,$s){
    // connect to database 
    include_once "connectmysql.php";
    require_once ("function.log.inc.php");
    // หากยังไม่มี insert
    $result=mysql_query("select * from UDSTEP where PROC='$p' and STEP='$s'");
    if (mysql_num_rows($result)==0) {
        //====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=UpDateStep =>insert IGNORE into UDSTEP (PROC,STEP) values ('$p','$s');";
writelogfile($text);
//=================END LOG===========================
        mysql_query("insert IGNORE into UDSTEP (PROC,STEP) values ('$p','$s');");
    }
    mysql_free_result($result);
    // update ข้อมูล
    $sql="update UDSTEP set UDDATE='".date("Y-m-d")."', UD='1' where PROC='$p' and STEP='$s'";
    //====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action= UpDateStep =>$sql";
writelogfile($text);
//=================END LOG===========================
    mysql_query($sql);
    $sql="update UDSTEP set UDDATE='".date("Y-m-d")."', UD='' where PROC='$p' and STEP>'$s'";
    //====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action= UpDateStep =>$sql";
writelogfile($text);
//=================END LOG===========================
    mysql_query($sql);
}

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// ใช้แสดง step ในการ update ข้อมูล
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function ShowStep($p,$s){
    // connect to database 
    include_once "connectmysql.php";
    require_once ("function.log.inc.php");
    $ss="";
    $result=mysql_query("select * from UDSTEP where PROC='$p' and STEP='$s'");
    if (mysql_num_rows($result)>0) {
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        $d=$row["UDDATE"];
        $ud=$row["UD"];
        if ($d==date("Y-m-d") and $ud=="1"){
            $ss="<img src=\"images/correctsign.gif\"> $d";
        }
    }else{
        //====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=ShowStep =>insert IGNORE into UDSTEP (PROC,STEP) values ('$p','$s');";
writelogfile($text);
//=================END LOG===========================
        mysql_query("insert IGNORE into UDSTEP (PROC,STEP) values ('$p','$s');");
    }
    mysql_free_result($result);
    return($ss);
}

 function is_valid_mysql_date($string) { 
    if (eregi("^[0-9]{4}-[0-9]{2}-[0-9]{2}$", $string)) { 
        $date_arr = explode('-', $string); 
        if ($date_arr[0]>=1000 && $date_arr[0]<=9999) { 
            if (checkdate($date_arr[1], $date_arr[2], $date_arr[0])) { 
                unset($date_arr); 
                return true; 
            } 
            else { 
                unset($date_arr); 
                return false; 
            } 
        } 
        else { 
            unset($date_arr); 
            return false; 
        } 
    } 
    else 
        return false; 
} 

function moneytotext($m){
    If ($m == ""){
        return "";
    }
    $m=str_replace(",", "", $m);
    if(! is_numeric($m)){
        return "";
    }
    $mtext = number_format($m, 2, '.', '');
    $totdigit = strlen($mtext) - 3;
    $outtext = "";
    //หน้าทศนิยม
    for ($i=$totdigit;$i>=1;$i--){
        $c = substr($mtext, $i-1, 1);
        $cdigit = $totdigit + 1 - $i;
        //ตัวเลข
        switch ($c){
        case "0":
            if ($cdigit == 7 and $totdigit > 7 ){
                $t = "ศูนย์";
            }else{
                $t = "";
            }
            break;
        case "1":
            if ($cdigit == 1 and $totdigit > 1 or $cdigit == 7 and $totdigit > 7 ){
                $t = "เอ็ด";
            }else{
                $t = "หนึ่ง";
            }
            break;
        case "2":
            if ($cdigit == 2 or $cdigit == 8){
                $t = "ยี่";
            }else{
                $t = "สอง";
            }
            break;
        case "3":
            $t = "สาม";
            break;
        case "4":
            $t = "สี่";
            break;
        case "5":
            $t = "ห้า";
            break;
        case "6":
            $t = "หก";
            break;
        case "7":
            $t = "เจ็ด";
            break;
        case "8":
            $t = "แปด";
            break;
        case "9":
            $t = "เก้า";
            break;
        default :
            $t = "";
        }
        //หลัก
        if ($t <> ""){
            switch ($cdigit){
            case 1:  //หน่วย
                $d = "";
                break;
            case 2:  //สิบ
                if ($t == "หนึ่ง"){
                    $t = "";
                }
                $d = "สิบ";
                break;
            case 3:  //ร้อย
                $d = "ร้อย";
                break;
            case 4:  //พัน
                $d = "พัน";
                break;
            case 5:  //หมื่น
                $d = "หมื่น";
                break;
            case 6:  //แสน
                $d = "แสน";
                break;
            case 7:  //ล้าน
                if ($t == "ศูนย์"){
                    $t = "";
                }
                $d = "ล้าน";
                break;
            case 8:  //สิบล้าน
                if ($t == "หนึ่ง"){
                    $t = "";
                }
                $d = "สิบ";
                break;
            case 9: //ร้อยล้าน
                $d = "ร้อย";
                break;
            case 10: //พันล้าน
                $d = "พัน";
                break;
            default :
                $d = "";
            }
        }
        else{
            $d = "";
        }    
        $outtext = $t.$d.$outtext;
    }
    if ($outtext <> ""){
        $outtext = $outtext ."บาท";
    }
    
    //หลัง ทศนิยม ตำแหน่งที่ 1
    switch (substr($mtext, strlen($mtext) - 2, 1)){
        case "1":
            $d01 = "สิบ";
            break;
        case "2":
            $d01 = "ยี่สิบ";
            break;
        case "3":
            $d01 = "สามสิบ";
            break;
        case "4":
            $d01 = "สี่สิบ";
            break;
        case "5";
            $d01 = "ห้าสิบ";
            break;
        case "6":
            $d01 = "หกสิบ";
            break;
        case "7":
            $d01 = "เจ็ดสิบ";
            break;
        case "8":
            $d01 = "แปดสิบ";
            break;
        case "9":
            $d01 = "เก้าสิบ";
            break;
        default:
            $d01 = "";
    }
    //ทศนิยม ตำแหน่งที่ 2
    switch (substr($mtext, strlen($mtext)-1, 1)){
        case "1":
            if ($d01 <> ""){
                $d02 = "เอ็ด";
            }else{
                $d02 = "หนึ่ง";
            }
            break;
        case "2":
            $d02 = "สอง";
            break;
        case "3":
            $d02 = "สาม";
            break;
        case "4":
            $d02 = "สี่";
            break;
        case "5":
            $d02 = "ห้า";
            break;
        case "6":
            $d02 = "หก";
            break;
        case "7":
            $d02 = "เจ็ด";
            break;
        case "8":
            $d02 = "แปด";
            break;
        case "9":
            $d02 = "เก้า";
            break;
        default:
            $d02 = "";
    }
    if ($d01.$d02 <> ""){
        $d02 = $d02 ."สตางค์";
    }
    
    if ($d01.$d02 <> ""){
        $outtext = $outtext.$d01.$d02;
    }
    else{
        $outtext = $outtext."ถ้วน";
    }
    return $outtext;
}

function updateewalletcard($dbprefix,$mcode,$mcode_ref,$inv_code,$sano,$sadate,$satype,$ewallet_in,$ewallet_out,$uid,$checkportal,$locationbase){
global $_SESSION;
/**
$checkportal = 1  =backoffice
$checkportal = 2  =branch
$checkportal = 3  =member

$satype = IN1 = EwalletIn
$satype = IN2 = Transfer IN
$satype = IN3 = Bill Cancel
$satype = IN4 = Commission A IN
$satype = IN5 = Commission B IN
$satype = OUT1 = Withdraw
$satype = OUT2 = Bill Order
$satype = OUT3 = Ewallet Transfer Out
$satype = OUT4 = Ewallet Cancel
$satype = OUT5 = Commission A OUT
$satype = OUT6 = Commission B OUT
$satype = OUT7 = Withdraw

backoffice
comsn_a/comsn_a_calc.php
//comsn_c/comsn_c_calc.php

branch
bill_cancel.php
bill_operate.php
ewallet_cancel.php

member
memoperate.php
billoperate.php
ewalletoperate.php = Transfer
ewalletoperate1.php = Withdraw

*/
//$sadate = $_SESSION["datetimezone"];
	
	$sqlchkproduct = "select ewallet from ".$dbprefix."member where mcode = '$mcode'";
	$rschkproduct = mysql_query($sqlchkproduct);
	$qty_before=mysql_result($rschkproduct,0,'ewallet');

	$qty_after = $qty_before+$ewallet_in-$ewallet_out;
	$yokma = $qty_before;
	$balance = $qty_after;

	$sadate = date("Y-m-d H:i:s");

	if(empty($locationbase) or $locationbase == '0')$locationbase = '1';
	$sql="insert into ".$dbprefix."stockcard_e(mcode,mcode_ref,inv_code,sano,satype,yokma,ewallet_in,ewallet_out,balance,uid,checkportal,remark,sadate,locationbase) values('$mcode','$mcode_ref','$inv_code','$sano','$satype','$yokma','$ewallet_in','$ewallet_out','$balance','$uid','$checkportal','$remark','$sadate','$locationbase') ";
	
	mysql_query($sql);

}


?>














