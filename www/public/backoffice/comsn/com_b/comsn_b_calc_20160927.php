<script language="javascript">
function checkround(){
    if(document.getElementById("ftrcode").value==""){
        alert("กรุณาใส่รอบการคำนวณ");
        document.getElementById("ftrcode").focus();
        return false;
    }else{
        var numCheck = document.getElementById("ftrcode").value;
        var numVal = numCheck.split("-");
        if(numVal.length>2){
            alert("กรุณากรอกรูปแบบรอบการคำนวณให้ถูกต้อง");
            return false;
        }
    }
    document.rform.submit();
}
function chknum(key){
    if((key>=48&&key<=57)||key==45)
        return true;
    else
        return false;
}
</script>
<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php");?>
<?

set_time_limit( 0);
ini_set("memory_limit","1024M");
ob_start();
//echo 'On Process';
//exit;
if(!isset($_REQUEST["ftrcode"])){
    showdialog();
}else{ ?>
<br />
<table width="95%" border="0" align="center">
  <tr>
    <td align="center">
    <?
        $ftrcode = $_REQUEST["ftrcode"];
        if (strpos($ftrcode,"-")===false){
            //รอบเริ่มต้น == รอบสิ้นสุด
            $ftrc[0]=$ftrcode;
            $ftrc[1]=$ftrcode;
        }else{
            $ftrc = explode('-',$ftrcode);
        }
        if($ftrc[0]>$ftrc[1]){
            ?><FONT COLOR="#ff0000">รอบเริ่มต้น ต้องน้อยกว่าหรือเท่ากับ รอบสิ้นสุด กรุณาใส่รอบการคำนวณใหม่</FONT><?
            showdialog();
            exit;
        }else{
        $rof = $ftrc[0];
        $rot = $ftrc[1];

//================================================================================
            $sql = "select * from ".$dbprefix."bround where rcode between '".$rof."' and '".$rot."' and calc='1'";
            $result = mysql_query($sql);
            for($i=0;$i<mysql_num_rows($result);$i++){
                $data = mysql_fetch_object($result);
                ?><font color="#ff0000">รอบ <?=$data->rcode?> คำนวณไปแล้ว <br /></font><?
            }
            mysql_free_result($result);
            if($i>0){
                ?><font color="#ff0000">ต้องลบการคำนวณคอมมิชชั่น รอบนี้ก่อน จึงจะคำนวณใหม่ได้<br /></font><?
                showdialog();
                exit;
            }        
$step="1";
$time_start = getmicrotime();
echo "เริ่มการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน around<BR>";
$text="uid=".$_SESSION["adminuserid"]." action=Unilivel calc rcode=$ftrc[0]-$ftrc[1]";
writelogfile($text);
//       1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน around
//           1.1 อ่าน Ro, FSaNo, TSaNo
//           1.2 สร้างไฟล์ BM+rcode, BC+rcode
//           1.3 ลบข้อมูล BTOTSALE ในรอบ RO นี้ออกก่อน
for($ro=$ftrc[0];$ro<=$ftrc[1];$ro++){

    ///////////////////////////////////////////////////////////////////////
    //$ro ระหว่าง Frcode-Trcode/////////////////////////////////////////
    //           1.1 อ่าน ro, FSaNo, TSaNo
    //$step="1.1";
    //echo "***ro=$ro<BR>";
    //$bonusperpair = 500;
    $taxrate     = (5/100);
    $bonuslv        = 0.08;
    $topuppv    = 250;
    $sql="select * from ".$dbprefix."bround where  rcode='".$ro."'  ";
    $result=mysql_query($sql);
    if (mysql_num_rows($result)>'0') {
        $row= mysql_fetch_array($result, MYSQL_ASSOC);
        $fsano=$row["fsano"];
        $tsano=$row["tsano"];
        $tdate=$row["tdate"];
        $fdate=$row["fdate"];
		$rcode=$row["rcode"];
        $rdate=$row["rdate"];
        $fpdate=$row["fpdate"];
        $tpdate=$row["tpdate"];
        $paydate=$row["paydate"];
        $pmon=explode("-",$row["tdate"]);
        $pmonth=$pmon[0].$pmon[1];
        $month=explode("-",$row["tdate"]);
        $pmonth=$month[0].$month[1];
        ///////////////////////////////////////////////////////////////////////
        //คำนวณ แต่ละรอบ $ro
        echo "<BR><BR>คำนวณโบนัสรอบที่ RO=$ro<BR>";
		
		mysql_query("delete from ali_calc_poschange2 where pos_before = '' and pos_after = ''");
		$sql = " SELECT a.mcode,a.id,a.rcode,a.pos_before,a.pos_after,a.date_change FROM ".$dbprefix."calc_poschange2 as a WHERE a.rcode >= '$ro' order by a.id desc ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			while($row = mysql_fetch_object($rs)){
				$pos_before = $row->pos_before;
				$sql =" UPDATE ".$dbprefix."member  ";
				$sql.=" SET pos_cur2 = '".$pos_before."'";
				$sql.=" WHERE mcode  = '".$row->mcode."'";
				if($debug) echo "$sql <br>";
				if(mysql_query($sql)){
					mysql_query("COMMIT");
				}else{
					echo "error $sql<BR>";
				}	
			}
		}


	    $sql2 = " select * from ".$dbprefix."bround where rcode >= '$ro' order by rid desc ";
        $rs12 = mysql_query($sql2);
        if (mysql_num_rows($rs12)>0) {
            for($x=0;$x<mysql_num_rows($rs12);$x++){
                $sqlObj = mysql_fetch_object($rs12);
                $xrcode =$sqlObj->rcode;        
                $xcalc =$sqlObj->calc;        
                $xfdate =$sqlObj->fdate;    
                $xtdate =$sqlObj->tdate; 
		        return_ewallet($dbprefix,'voucher',$xrcode,$xtdate);
				del_cals($dbprefix,$xrcode,array('ec','ed','embonus','em','epv')); 
				del_cals($dbprefix,$xrcode,array('dpv','dc','dmbonus')); 
		        del_cals($dbprefix,$xrcode,array('status'));
		        del_cals($dbprefix,$xrcode,array('commission_b','cmbonus_b','pospv'));
				return_pos($dbprefix,$xrcode,'calc_poschange2','pos_cur2'); 
				del_cals($dbprefix,$xrcode,array('calc_poschange2','calc_poschange3'));
                $xaround = array( 'calc' => '','calc_date' => "0000-00-00 00:00:00");
                update('ali_bround',$xaround," rcode='$xrcode' ");   
            }
        }

		update('ali_member',array('pos_cur3' => '')," 1=1 "); 
		mysql_query("update ali_asaleh set cancel = '1' where rcode >= '$ro' and sa_type = 'Z' ");
	    fnc_status($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);
		func_cal_status($dbprefix,$ro,$fdate,$tdate);// status
		func_honor($dbprefix,$ro,$fdate,$tdate);// honor
		fnc_calc_matching($dbprefix,$ro,$fdate,$tdate);//matching
		calc_pool_bunus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);// all-sale
		fnc_summary_bonus($dbprefix,$ro,$fdate,$tdate,$fdate,$tdate);// รวมรายเดือน
		fnc_calc_status_comb($dbprefix,$ro,$fdate,$tdate,$paydate);// รวมจ่ายรายเดือน
		$time_end = getmicrotime();
		$time = $time_end - $time_start;
		$sql="update ".$dbprefix."bround set calc='1',calc_date='".date("Y-m-d H:i:s")."',timequery='$time' where rcode='$ro' ";
		mysql_query($sql);

		$sadate = date("Y-m-d",strtotime("first day of $tdate +1 month"));
		del('ali_bm1'," fdate = '$sadate' ");    
		$where = "sa_type <> 'H'  and cancel=0 and tot_pv != 0 and sadate = '$sadate' ";
		$sql = " SELECT mcode,tot_pv as tot_pv,sadate,sano FROM  ";
		$sql .= " ( ";
		$sql .= " SELECT mcode,tot_pv as tot_pv,sadate,sano as sano  FROM ali_asaleh ";
		$sql .= "    WHERE ".$where."  ";
		$sql .= " UNION ALL ";
		$sql .= " SELECT mcode,tot_pv as tot_pv,sadate,hono as sano  FROM ali_holdhead ";
		$sql .= "    WHERE ".$where." ";
		$sql .= " ) as tb ";    
		$sql .= " ORDER BY sadate ASC ";

		$rs = mysql_query($sql);
		$num =  mysql_num_rows($rs);
		if(mysql_num_rows($rs) > 0)
		{
			for($i=0;$i<$num;$i++)
			{
				$row = mysql_fetch_object($rs);
				$mcode = $row->mcode;
				$tot_pv = $row->tot_pv;    
				$mcode = $row->mcode;
				$sadate = $row->sadate;    
				$sano = $row->sano;    
				$data =  get_detail_meber($mcode,$sadate);
				getInsert_bm('ali_bm1',$sano,$mcode,$data['pos_cur'],$tot_pv,$sadate,$sadate);            
			   // func_status('ali_',$mcode,$tot_pv,$sadate,$data['pos_cur']);        
			}
		}
		
    }
    //$ro ระหว่าง Frcode-Trcode/////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
}
  



echo "<b><font color=green> สิ้นสุดการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR></font> ";
echo "<b>";
	} //end else 
    ?>
    </td>
    </tr>
</table>
<br />
<?
}//end else
function showdialog(){
?>
<table width="95%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=12">
<table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">กรอกรอบการคำนวณคอมมิชชั่นรายเดือน (Unilevel) ที่ต้องการคำนวนเช่น 1-12</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="40%" align="right">รอบ&nbsp;&nbsp;</td>
    <td width="60%">
      <input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td colspan="2"><input type="button" name="Submit" value="คำนวณรายได้" onClick="checkround()"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</td></tr></table>
<?
}  
function  fnc_status($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){
	// $sql2 = " SELECT* FROM ali_member WHERE eatoship >= 2400";
	$months=explode('-',$tdate);
	$month=$months[0].'-'.$months[1];
	$sql2 = " SELECT SUM(c.total) as eatoship ,m.name_t,m.pos_cur,c.mcode ";
    $sql2 .= " FROM ali_eatoship c "; 
	$sql2.=" LEFT JOIN ali_member m ON(c.mcode=m.mcode)";
	$sql2.=" WHERE c.cancel='0' and c.sadate LIKE  '%".$month."%'";
	$sql2.=" GROUP BY c.mcode";
	 
	// $sql2.=" HAVING SUM(c.total) >= 2400"; 

    $rs12 = mysql_query($sql2);
    if(mysql_num_rows($rs12) > 0){ 
        for($j=0;$j<mysql_num_rows($rs12);$j++){
            $sqlObj = mysql_fetch_object($rs12);
            $mcode =$sqlObj->mcode;        
           $eatoship =$sqlObj->eatoship;  
		   $name_t =$sqlObj->name_t;    
		   $pos_cur =$sqlObj->pos_cur;    
			if($eatoship >= 11){
			   open_bill($dbprefix,$ro,$mcode,$tdate,$name_t,$eatoship,'V');
			}else{ 			
				$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."voucher ";
				$rssss = mysql_query($sql);
				$mid = mysql_result($rssss,0,'id')+1;
				//$sano = gencodesale('V','voucher');
				$sano = gencodesale_news_hq('V','ali_voucher','HQ001','',$fdate);
				//echo $sano.'<bR>';
				$bprice = $allplan*$crate;
					$insert = array(
							"rcode"      => $ro,                  
							"sano"       => $sano,
							"sadate"     => $tdate,
							"mcode"      => $mcode,
							"sa_type"    => 'CI',   
							"total"      => $eatoship,    
							"bprice"     => $bprice,   
							"uid"        => $_SESSION['adminusercode'], 
							"chkCommission"   => 'on',  
							"txtMoney"        => $eatoship,   
							"txtCommission"   => $eatoship,   
							"optionCommission"   => 'commission', 
							"checkportal"   => '9',   
							"crate"   => $crate,   
							"mbase"   => '1',   
							"echeck"        => 'B'   
						);
				insert('ali_voucher',$insert);  
				$sql1="update ".$dbprefix."member set eatoship=eatoship-'$eatoship' where mcode = '$mcode'";
				mysql_query($sql1); 
				$sql2="update ".$dbprefix."member set voucher=voucher+'$eatoship' where mcode = '$mcode'";  
				mysql_query($sql2); 
				log_ewallet('voucher',$mcode,$sano,$eatoship,'CI',$tdate,"Cal-B ($sano Date : $tdate"); 	
				log_ewallet('eatoship',$mcode,$sano,$eatoship,'CO',$tdate,"Cal-B ($sano Date : $tdate");	
			}
		}   
	}
}
function fnc_calc_matching($dbprefix,$ro,$fdate,$tdate){
	$sql="select mcode, sum(total) AS total_pvl from ".$dbprefix."bmbonus WHERE fdate>='".$fdate."' and tdate <='".$tdate."'and  total > 0  group by mcode";
	$rs = mysql_query($sql);
		//echo "$sql<BR>";
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$bmcode =$sqlObj->mcode;		
			$btotal_pv1 =$sqlObj->total_pvl;	
			$btotal_pv = $btotal_pv1;
			if($btotal_pv >0){
				$sql = " insert into ".$dbprefix."dpv  (rcode, mcode,total_pv) VALUES ('$ro','$bmcode','$btotal_pv') ";
				//echo $sql.'<br>';
				mysql_query($sql) or die(mysql_error());
			}
	}
	mysql_free_result($rs);

	$maxlv=3;
	$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
	$rs = mysql_query($sql);
		//echo "$sql<BR>";
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$n_mcode[$i] =$sqlObj->mcode;		
			$n_name_t[$n_mcode[$i]] =$sqlObj->name_t;		
			$n_poscur[$n_mcode[$i]] =$sqlObj->pos_cur;		
			$n_upa_code[$n_mcode[$i]] = $sqlObj->sp_code;
			$n_lr[$n_mcode[$i]] = $sqlObj->lr;
 	}
	mysql_free_result($rs);
	
		$sql="select * from ".$dbprefix."dpv where rcode = '$ro' "; 
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj			= mysql_fetch_object($rs);
			$apv_rcode		= $sqlObj->rcode;
			$apv_mcode	= $sqlObj->mcode;
			$apv_total_pv	= $sqlObj->total_pv;	
			//echo "dpv : $apv_total_pv = $i<BR> ";
			for($j=0;$j<sizeof($n_mcode);$j++){
				if($n_mcode[$j] === $apv_mcode){
					$up	= $n_mcode[$j];
					//echo "มีบิลขาย : $up<BR>";
					$lv	 	= 0;
					$glv	=1;
					//if($j == '5'){echo 'sssssssssss';exit;}
					while($up <> "" and $up != '0000000'){
						if($n_upa_code[$up] <>"" and $n_upa_code[$up] != '0000000' && $glv <= $maxlv){
							$lv	= ($lv+1);
							$flg=0;
								
							switch ($glv) {
								case 1 :
										$sql1="SELECT mcode,pos_cur FROM ".$dbprefix."member where mcode='".$n_upa_code[$up]."' and (pos_cur = 'DIS' or pos_cur = 'PRO' or pos_cur = 'VIP' )  ";
										//echo  "$sql1<br>";
										$rs1 = mysql_query($sql1);
										if (mysql_num_rows($rs1)>0) {
											$sqlObj1 = mysql_fetch_object($rs1);
											$d_mcode=$sqlObj1->mcode;
											$d_pos_cur=$sqlObj1->pos_cur;
											$flg=1;
										}			
											$bonus = 0.10;
											$apv_total = ($apv_total_pv*$bonus);
									break;
								case 2 :
										$sql1="SELECT mcode,pos_cur FROM ".$dbprefix."member where mcode='".$n_upa_code[$up]."' and (pos_cur = 'PRO' or pos_cur = 'VIP')";
										//echo  "$sql1<br>";
										$rs1 = mysql_query($sql1);
										if (mysql_num_rows($rs1)>0 ) {
											$sqlObj1 = mysql_fetch_object($rs1);
											$d_mcode=$sqlObj1->mcode;
											$d_pos_cur=$sqlObj1->pos_cur;
											$flg=1;
										}
											$bonus = 0.05;
											$apv_total = ($apv_total_pv*$bonus);
									break;
								case 3 :
										$sql1="SELECT mcode,pos_cur FROM ".$dbprefix."member where mcode='".$n_upa_code[$up]."' and  (pos_cur = 'VIP')";
										//echo  "$sql1<br>";
										$rs1 = mysql_query($sql1);
										if (mysql_num_rows($rs1)>0) {
											$sqlObj1 = mysql_fetch_object($rs1);
											$d_mcode=$sqlObj1->mcode;
											$d_pos_cur=$sqlObj1->pos_cur;
											$flg=1;
 										}
											$bonus = 0.05;
											$apv_total = ($apv_total_pv*$bonus);
									break;
								default:
									$flg=0;
									$bonus = 0;
									$apv_total =0;
									break;
							} 							
							$status = check_status($n_upa_code[$up],$n_poscur[$n_upa_code[$up]],$fdate); 
							$chkweek =getweak($dbprefix,$n_upa_code[$up],$fdate,$tdate);
							//$status = true;
							if ($status['status'] == true and $chkweek >=1000 and $flg == true) {
								$sql = " INSERT INTO ".$dbprefix."dc (rcode, mcode,name_t, upa_code,upa_name,pv,level,gen, percer, total,fdate,tdate,mposi) VALUES ('$ro','".$n_mcode[$j]."','".$n_name_t[$n_mcode[$j]]."','".$n_upa_code[$up]."','".$n_name_t[$n_upa_code[$up]]."','".$apv_total_pv."','".$glv."','".$lv."','".$bonus."','".$apv_total."','$fdate','$tdate','$d_pos_cur') ";
								mysql_query($sql) or die(mysql_error());

								$glv=($glv+1);
							}	
													
						}
						$up = $n_upa_code[$up];
					}
				}
			}
			
		} 
		mysql_free_result($rs);

		//คำนวณโบนัส สรุปจ่ายโบนัส		
		$sql = " insert into ".$dbprefix."dmbonus  (rcode, mcode, name_t,total,tax,bonus,fdate,tdate,pos_cur) ";
		$sql .= "	select '$ro', upa_code,upa_name,sum(total) as totalpv,sum(total)*5/100 as tax,sum(total)-sum(total)*5/100 as bonus,'$fdate','$tdate',mposi from ".$dbprefix."dc WHERE  rcode='$ro' group by upa_code ";
		mysql_query($sql) or die(mysql_error());

}

function func_honor($dbprefix,$ro,$fdate,$tdate){
	$pos_piority = array('CE'=>5,'DE'=>4,'EE'=>3,'SE'=>2,'PE'=>1,''=>0);  
	$pos_exp = array('CE'=>1500000,'DE'=>500000,'EE'=>300000,'SE'=>100000,'PE'=>30000);  

	$data = query('mcode,pos_cur,pos_cur2','ali_member'," mdate<= '".$tdate."' and pos_cur = 'VIP' ");
	$check = array('1'=>0,'2'=>0); 
	foreach($data as $key => $val): 
		$getweak = getweak($dbprefix,$val['mcode'],$fdate,$tdate);	/// weak this mouth	
		$pos_old = $val['pos_cur2'];
		$pos_new = '';
		foreach(array_keys($pos_exp) as $key){
			if($getweak>=$pos_exp[$key]){ $pos_new = $key; break;}
		}
		/////////////// pus_cur2 MAX /////////////
		if($pos_piority[$pos_new]>$pos_piority[$pos_old]){
			mysql_query("UPDATE ".$dbprefix."member SET pos_cur2='$pos_new' WHERE mcode='".$val['mcode']."' LIMIT 1 "); 
			$sql1 = "INSERT INTO ".$dbprefix."calc_poschange2 (rcode,mcode,pos_before,pos_after,date_change,type) ";
			$sql1 .= "VALUES('$ro','".$val['mcode']."','".$val['pos_cur2']."','".$pos_new."','".$tdate."','2')";   
			mysql_query($sql1); 
		} 
		/////////////// pus_cur2 MAX /////////////
		

		if(!empty($pos_new)){
			/////////////// pus_cur3 this mouth	 ///////////// 
			mysql_query("UPDATE ".$dbprefix."member SET pos_cur3='$pos_new' WHERE mcode='".$val['mcode']."' LIMIT 1 "); 
			$sql1 = "INSERT INTO ".$dbprefix."calc_poschange3 (rcode,mcode,pos_before,pos_after,date_change,type) ";
			$sql1 .= "VALUES('$ro','".$val['mcode']."','".$val['pos_cur2']."','".$pos_new."','".$tdate."','2')";   
			mysql_query($sql1);  
			/////////////// pus_cur3 this mouth	 /////////////
		}
	endforeach; 
}
function fnc_calc_set_position($dbprefix,$ro,$mcode,$name_t,$pos_cur,$sp_code,$lr,$fdate,$tdate){
	$fdate1=explode("-",$fdate);
	$lastmonth = $fdate1[0].'-'.$fdate1[1];
	$lastmonth1 = $fdate1[0].$fdate1[1];

	$sql="SELECT mcode,mdate,name_t,pos_cur,sp_code,upa_code,lr,locationbase FROM ".$dbprefix."member ORDER BY lr DESC";
	$rs = mysql_query($sql);
	$mcode = "";
	for($m=0;$m<mysql_num_rows($rs);$m++){
		$sqlObj = mysql_fetch_object($rs);
		$mcode[$m] =$sqlObj->mcode;		
		$mdate[$mcode[$m]] =$sqlObj->mdate;		
		$name_t[$mcode[$m]] =$sqlObj->name_t;
		$pos_cur[$mcode[$m]] =$sqlObj->pos_cur;
		$sp_code[$mcode[$m]] = $sqlObj->sp_code;
		$upa_code[$mcode[$m]] = $sqlObj->upa_code;
		$lr[$mcode[$m]] = $sqlObj->lr;
		$locationbase[$mcode[$m]] = $sqlObj->locationbase;
		$crate[$mcode[$m]]= '1';
	}
	mysql_free_result($rs);

	//var_dump($sp_code);
	for($i=0;$i<sizeof($mcode);$i++){
		if($pos_cur[$mcode[$i]] == 'SI' or $pos_cur[$mcode[$i]] == 'GO' or $pos_cur[$mcode[$i]] == 'DI'){
			$up = $mcode[$i];
			$lev = 0;
			$fmcode = $mcode[$i];
			while($up <> ""){
				if($upa_code[$up] <>""){
					
					$sql = "insert into ".$dbprefix."pospv (rcode,mcode,name_t,upa_code,sp_code,lr,fdate,tdate,opos) values('$ro','$mcode[$i]','".$name_t[$mcode[$i]]."','$upa_code[$up]','$sp_code[$fmcode]','$lr[$up]','$fdate','$tdate','".$pos_cur[$mcode[$i]]."') ";
					mysql_query($sql);
				}
				$up = $upa_code[$up];
			}
		}
	}

	//echo 'sssss'.sizeof($mcode).'<br>';
	$pos_piority = array('PD'=>3,'SD'=>2,'DD'=>1,''=>0);
	$sql="SELECT mcode,pos_cur2 FROM ".$dbprefix."member where pos_cur2 = '' and pos_cur <> 'TN' and pos_cur <> 'MB' ORDER BY lr DESC";
	$rs = mysql_query($sql);
	$mcode = "";
	for($m=0;$m<mysql_num_rows($rs);$m++){
		$sqlObj = mysql_fetch_object($rs);
		$mcode1[$m] =$sqlObj->mcode;	
		$pos_cur2[$mcode1[$m]] = $pos_new = $pos_old = $sqlObj->pos_cur2;
		$ssql = "select count(mcode) as count_l from ".$dbprefix."pospv where rcode = '$ro' and sp_code = '$mcode1[$m]' and upa_code = '$mcode1[$m]'  and lr = 1 ";
		$rs1 = mysql_query($ssql);
		if(mysql_num_rows($rs1)>0){
			$sqlObj1 = mysql_fetch_object($rs1);
			$count_l =$sqlObj1->count_l;	
		}else $count_l = 0;

		$ssql = "select count(mcode) as count_r from ".$dbprefix."pospv where rcode = '$ro' and sp_code = '$mcode1[$m]' and upa_code = '$mcode1[$m]'   and lr = 2 ";
		$rs1 = mysql_query($ssql);
		if(mysql_num_rows($rs1)>0){
			$sqlObj1 = mysql_fetch_object($rs1);
			$count_r =$sqlObj1->count_r;	
		}else $count_r = 0;

		//echo $count_r.' : '.$count_l.' : '.$mcode1[$m].'<br>';

		if( $count_l >= 2 and $count_r >= 2 )
		{
			$pos_new = 'DD';
			if($pos_new != $pos_old && $pos_piority[$pos_new]>$pos_piority[$pos_old]){
				$sql = "UPDATE ".$dbprefix."member SET pos_cur2='$pos_new' WHERE mcode='".$mcode1[$m]."' LIMIT 1 ";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				mysql_query($sql);
				$sql = "INSERT INTO ".$dbprefix."calc_poschange2 (rcode,mcode,pos_before,pos_after,date_change,type) ";
				$sql .= "VALUES('$ro','".$mcode1[$m]."','".$pos_old."','".$pos_new."','".$fdate."','2')";
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				$pos_cur2[$mcode1[$m]] = $pos_cur[$j] = $pos_new;
				mysql_query($sql);
			}
		}
	}

	$sql="SELECT mcode,pos_cur2 FROM ".$dbprefix."member where pos_cur2 = 'DD' or pos_cur2 = 'SD' ORDER BY lr DESC";
	$rs = mysql_query($sql);
	$chkdate = explode("-",$tdate);
	$chkyear = $chkdate[0];
	$chkmonth = $chkdate[1];
	if($chkdate[1] == '01' or $chkdate[1] == '02' or $chkdate[1] == '03' or $chkdate[1] == '04' or $chkdate[1] == '05' or $chkdate[1] == '06'){
		$xfdate_1 = $chkyear.'-01-01';$xtdate_1 = $chkyear.'-01-31';
		$xfdate_2 = $chkyear.'-02-01';$xtdate_2 = $chkyear.'-02-31';
		$xfdate_3 = $chkyear.'-03-01';$xtdate_3 = $chkyear.'-03-31';
		$xfdate_4 = $chkyear.'-04-01';$xtdate_4 = $chkyear.'-04-31';
		$xfdate_5 = $chkyear.'-05-01';$xtdate_5 = $chkyear.'-05-31';
		$xfdate_6 = $chkyear.'-06-01';$xtdate_6 = $chkyear.'-06-31';
	}else{
		$chkmonth = $chkmonth-6;
		$xfdate_1 = $chkyear.'-07-01';$xtdate_1 = $chkyear.'-07-31';
		$xfdate_2 = $chkyear.'-08-01';$xtdate_2 = $chkyear.'-08-31';
		$xfdate_3 = $chkyear.'-09-01';$xtdate_3 = $chkyear.'-09-31';
		$xfdate_4 = $chkyear.'-10-01';$xtdate_4 = $chkyear.'-10-31';
		$xfdate_5 = $chkyear.'-11-01';$xtdate_5 = $chkyear.'-11-31';
		$xfdate_6 = $chkyear.'-12-01';$xtdate_6 = $chkyear.'-12-31';
	}
	for($m=0;$m<mysql_num_rows($rs);$m++){
		$sqlObj = mysql_fetch_object($rs);
		$mcode1[$m] =$sqlObj->mcode;
		$pos_cur2[$mcode1[$m]] = $pos_new = $pos_old = $sqlObj->pos_cur2;
		
		if($chkmonth >= 1)$total_month[1] =	getalltotal($dbprefix,$mcode1[$m],$xfdate_1,$xtdate_1);
		if($chkmonth >= 2)$total_month[2] =	getalltotal($dbprefix,$mcode1[$m],$xfdate_2,$xtdate_2);
		if($chkmonth >= 3)$total_month[3] =	getalltotal($dbprefix,$mcode1[$m],$xfdate_3,$xtdate_3);
		if($chkmonth >= 4)$total_month[4] =	getalltotal($dbprefix,$mcode1[$m],$xfdate_4,$xtdate_4);
		if($chkmonth >= 5)$total_month[5] =	getalltotal($dbprefix,$mcode1[$m],$xfdate_5,$xtdate_5);
		if($chkmonth >= 6)$total_month[6] =	getalltotal($dbprefix,$mcode1[$m],$xfdate_6,$xtdate_6);

	   if($mcode1[$m] == '0000001'){
		//echo $xfdate_1.' : '.$xtdate_1.'<br>';
		//echo $total_month[1].' : '.$total_month[2].' : '.$total_month[3].' : '.$total_month[4].' : '.$total_month[5].' : '.$total_month[6].'<br>';
		//echo $mcode1[$m].' : '.$chkmonth.'<br>';
		//exit;
	   }

		$chkcount = 0;
		foreach ($total_month as $value) {
			 if($value >= 100000)$chkcount++;
			 if($chkcount >= 3)$pos_new = 'SD';
		}
		$chkcount = 0;
		foreach ($total_month as $value) {
			 if($value >= 1000000)$chkcount++;
			 if($chkcount >= 3)$pos_new = 'PD';
		}
		if($pos_new != $pos_old && $pos_piority[$pos_new]>$pos_piority[$pos_old]){
			$sql = "UPDATE ".$dbprefix."member SET pos_cur2='$pos_new' WHERE mcode='".$mcode1[$m]."' LIMIT 1 ";
			//====================LOG===========================
			$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
			mysql_query($sql);
			$sql = "INSERT INTO ".$dbprefix."calc_poschange2 (rcode,mcode,pos_before,pos_after,date_change,type) ";
			$sql .= "VALUES('$ro','".$mcode1[$m]."','".$pos_old."','".$pos_new."','".$fdate."','2')";
			$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
			$pos_cur1[$mcode[$m]] = $pos_cur[$j] = $pos_new;
			mysql_query($sql);
		}
	}	
}
 	 
function  func_cal_status($dbprefix,$ro,$fdate,$tdate){
	$months=explode('-',$tdate);
	$month=$months[0].''.$months[1];
	$sql2 = " SELECT mcode,pos_cur ";
    $sql2 .= " FROM ali_member "; 
	$sql2.=" WHERE pos_cur = 'TN' or status_terminate <> '1' ";
    $rs12 = mysql_query($sql2);
    if(mysql_num_rows($rs12) > 0){ 
        for($j=0;$j<mysql_num_rows($rs12);$j++){
           $sqlObj = mysql_fetch_object($rs12);
           $mcode =$sqlObj->mcode;        
           $pos_cur =$sqlObj->pos_cur;        
		   $status = check_status($mcode,$pos_cur,$fdate); 
		   if($status['status'] == true){
			 $sqlinsert = "insert ali_status(rcode,sano,mcode,status,pv,mdate,sdate,satype,month_pv,mpos)
			 values('$ro','ato','$mcode','1','".$status['tot_pv']."','$tdate','$tdate','".$status['stype']."','$month','$pos_cur')
			 ";				 
			 mysql_query($sqlinsert);
		   }
		}   
	}	
}  

function open_bill($dbprefix,$ro,$mcode,$tdate,$name_t,$all_pv,$type){
	$inv_code = 'BKK01';
	$sql1 = "SELECT *  FROM ".$dbprefix."product where pcode = 'AS001' ";
	$sadate = date("Y-m-d",strtotime("first day of $tdate +1 month"));

	$rs1 = mysql_query($sql1);
	if (mysql_num_rows($rs1)>0) {
		$pcode  = mysql_result($rs1,0,'pcode');
		$price  = mysql_result($rs1,0,'price'); 
		$bprice  = mysql_result($rs1,0,'bprice');
		$pdesc  = mysql_result($rs1,0,'pdesc');
		$pv  = mysql_result($rs1,0,'pv');
		if($all_pv >= $price ){
			$satype='Z';
			$qty = floor($all_pv/$price);//1 
			$totalprice = $qty*$price; //2400
			$tot_pv = $qty*$pv;
			$sql = "SELECT MAX(id) AS id  FROM ".$dbprefix."asaleh";
			//echo $sql;
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
			$mid = mysql_result($rs,0,'id')+1;
			}else{
			$mid=1;
			}
			//$sano = gencodesale('Z','asaleh');
			$sano = gencodesale_news_hq('Z','ali_asaleh','HQ001','',$fdate);
			$sql  ="insert into ".$dbprefix."asaleh (id,sano,sadate,mcode,sa_type,inv_code,total,tot_pv,uid,chkInternet,txtInternet,optionInternet,name_t,checkportal,rcode,status,scheck,locationbase) values ";
			$sql .= "('$mid','$sano','$sadate' ,'$mcode', 'Z' ,'$inv_code' ,'$totalprice' ,'$tot_pv','".$_SESSION['adminusercode']."','$chkInternet' ,'$txtInternet' ,'$optionInternet' ,'$name_t','1','$ro','$satype','ato','1') ";
			mysql_query($sql);
			$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,bprice,pv,qty,amt,locationbase,sadate) values ('$mid','$pcode','$pdesc','$price','$bprice' ,'$pv','$qty','$totalprice','1','$fdate') ";
				//====================LOG===========================
			mysql_query($sql);

			$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."voucher ";
			$rssss = mysql_query($sql);
			$mid = mysql_result($rssss,0,'id')+1;
			//$sano = gencodesale('V','voucher');
			$sano = gencodesale_news_hq('V','ali_voucher','HQ001','',$fdate);
			$bprice = $allplan*$crate;
				$insert = array(
						"rcode"      => $ro,                  
						"sano"       => $sano,
						"sadate"     => $tdate,
						"mcode"      => $mcode,
						"sa_type"    => 'CI',   
						"total"      => $all_pv,    
						"bprice"     => $bprice,   
						"uid"        => $_SESSION['adminusercode'], 
						"chkCommission"   => 'on',  
						"txtMoney"        => $all_pv,   
						"txtCommission"   => $all_pv,   
						"optionCommission"   => $totalprice, 
						"checkportal"   => '9',   
						"crate"   => $crate,   
						"mbase"   => '1',   
						"echeck"        => 'B'   
					);
			//echo '<pre>'.print_r($insert).'</pre>';
			insert('ali_voucher',$insert);  

			$sql1="update ".$dbprefix."member set eatoship=eatoship-'$all_pv' where mcode = '$mcode'";
			mysql_query($sql1); 
			$sql2="update ".$dbprefix."member set voucher=voucher+'$all_pv' where mcode = '$mcode'";
			//echo $sql1.' openblii V <br> ';
			mysql_query($sql2); 		
			log_ewallet('voucher',$mcode,$sano,$all_pv,'CI',date("Y-m-d"),"Cal-B ($sano Date : $tdate"); 	
			log_ewallet('eatoship',$mcode,$sano,$all_pv,'CO',date("Y-m-d"),"Cal-B ($sano Date : $tdate"); 
		}
	}else{
		echo "<center><font color = 'red'> ไม่มีสินค้า Autoship </center></font> ";
	}
}
function fnc_summary_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){

    $whereclass = " AND fdate>= '$fdate' and tdate<= '$tdate' ";  
    $whereclass2 = " AND fdate>= '$fpdate' and tdate<= '$tpdate' ";  
    $thismonth = explode('-',$fdate);
    
    $select = "ifnull((SELECT sum(a.total) as dmbonus FROM ali_dmbonus a WHERE a.mcode=m.mcode ".$whereclass."  GROUP BY a.mcode),0)";
    $select1 = "ifnull((SELECT sum(a.total) as embonus FROM ali_embonus a WHERE a.mcode=m.mcode ".$whereclass."  GROUP BY a.mcode),0)";

    $sql2 = " SELECT m.mcode,m.name_t,m.ewallet,m.voucher,m.pos_cur,m.pos_cur3,m.locationbase ";
    $sql2 .= " , ".$select." as dmbonus ";
    $sql2 .= " , ".$select1." as embonus ";  
    $sql2 .= " FROM ali_member m ";
    $sql2 .= " HAVING ";
    $sql2 .= " (".$select." )+(".$select1." ) > 0 ";
    $sql2 .= " ORDER BY m.mcode ASC ";   
	
    $rs12 = mysql_query($sql2);
    if(mysql_num_rows($rs12) > 0){ 
        for($j=0;$j<mysql_num_rows($rs12);$j++){
            $sqlObj = mysql_fetch_object($rs12);
            $mcode =$sqlObj->mcode;        
            $name_t =$sqlObj->name_t;        
            $pos_cur =$sqlObj->pos_cur;        
            $ewallet =$sqlObj->ewallet;        
            $voucher =$sqlObj->voucher;
            $locationbase =$sqlObj->locationbase;
            $dmbonus =$sqlObj->dmbonus;        
            $embonus =$sqlObj->embonus;           
            $pos_cur3 =$sqlObj->pos_cur3; 
			if(empty($pos_cur3))$pos_cur3 = $pos_cur; 
            $allplan = $dmbonus+$embonus;  
            if($allplan > 0){    
                $total =$mmbonus; 
                $insert = array(
					"rcode"        => $ro,
					"mcode"        => $mcode,
					"name_t"        => $name_t,
					"dmbonus"      => $dmbonus,    
					"embonus"      => $embonus,    
					"total"        => $allplan,
					"fdate"        => $fdate,    
					"tdate"        => $tdate,   
					"pos_cur3"        => $pos_cur3   
				);
               insert('ali_commission_b',$insert);  
            }         
       }
    }
    
}
function return_ewallet($dbprefix,$table,$rcode,$fdate){       
	
    $sql = "SELECT txtCommission as totalamt,optionCommission,sano,mcode,sa_type,sadate from ".$dbprefix.$table."  where rcode= '$rcode' and cancel = 0 and txtCommission >0 ";
    $rs = mysql_query($sql);
    if(@mysql_num_rows($rs) > 0){
        for($i=0;$i<mysql_num_rows($rs);$i++){
            $sqlObj = mysql_fetch_object($rs);
            $plana =$sqlObj->totalamt;
            $mcode =$sqlObj->mcode;
            $sadate =$sqlObj->sadate;
            $sa_type =$sqlObj->sa_type; 
            $sano =$sqlObj->sano; 
                              
            if($sa_type == 'CI' ){//IN
                $op = '-';
                $sa_typexx = 'CO';
            }else if ($sa_type == 'CO' ){//out
                $op = '+';
                $sa_typexx = 'CI';
            }  
            
            if($op == ''){
                echo "function return_ewallet ERROR";
                die;
            }
            
            $sql2 = ("UPDATE ali_member SET $table = $table $op '$plana' WHERE mcode = '$mcode'"); 
			//echo "UPDATE ali_member SET $table = $table $op '$plana' WHERE mcode = '$mcode'<Br>";
            if(mysql_query($sql2)){  
                mysql_query("COMMIT");   
                log_ewallet($table,$mcode,$sano,$plana,$sa_typexx,$sadate,'recom B'); 
				$update = array( '_option' => 'recom B' );
                update('ali_log_'.$table,$update," sano ='$sano' ");        
				/////////////////////////////////////
				$data =  get_detail_meber($mcode,$sadate); 
				$eatoship = $data['eatoship']+$plana;   
			    $updatexx = array( 'eatoship' => $eatoship );
                update('ali_member',$updatexx," mcode ='$mcode' "); 
				log_ewallet('eatoship',$mcode,$sano,$plana,'CI',$sadate,'recom B'); 
			    $update = array( '_option' => 'recom B' );
                update('ali_log_eatoship',$update," sano ='$sano' ");     
            }else{
                echo "error $sql<BR>";
            }
            
        }                 
    } 
	$sql_dstatus="delete from ".$dbprefix."status where sdate= '".$fdate."' and rcode  = '$rcode'  ";
    mysql_query($sql_dstatus);
    $sql1="update ".$dbprefix."asaleh set cancel ='1' where rcode = '$rcode' and  sa_type = 'Z'";
    mysql_query($sql1);
    $update1 = array( 'cancel' => '1' );
    update($dbprefix.$table,$update1," sadate ='$fdate' and  txtCommission >0 "); 
 
}
function fnc_unilevel_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){ 
    $maxlv = 20;
	$percen =1;
  	$where = "sadate >= '".$fdate."' and sadate <= '".$tdate."' and (sa_type='Q' or sa_type='Z') and cancel=0";
	$sql = " SELECT mcode,SUM(tot_pv) as tot_pv FROM  ";
	$sql .= " ( ";
	$sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh ";
	$sql .= "	WHERE ".$where." GROUP BY mcode ";
	$sql .= " UNION ALL ";
	$sql .= " SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_holdhead ";
	$sql .= "	WHERE ".$where." GROUP BY mcode ";
	$sql .= " ) as tb ";
	$sql .= " GROUP BY mcode ";
   //  echo $sql;exit;
    $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    if(mysql_num_rows($rs) > 0)
    {
        for($i=0;$i<$num;$i++)
        {
            $row = mysql_fetch_object($rs);
            $mcode = $row->mcode;
            $type = $row->type; 
            $tot_pv  = $row->tot_pv;

            if($tot_pv >0  )
				{
					  $insert1 = array(
							"rcode"        => $ro,
							"mcode"        => $mcode,
							"total_pv"    => $tot_pv,
						);   
					 insert('ali_mpv',$insert1);
				}
        }
	}

        $sql="SELECT mcode,upa_code,sp_code,lr,name_t FROM ".$dbprefix."member ORDER BY lr DESC";
        $rs = mysql_query($sql);
        for($m=0;$m<mysql_num_rows($rs);$m++){
            $sqlObj = mysql_fetch_object($rs);
            $n_mcode[$m] =$sqlObj->mcode;   
            $name_t[$n_mcode[$m]] =$sqlObj->name_t;   
            $n_upa_code[$n_mcode[$m]] = $sqlObj->upa_code;
            $n_lr[$n_mcode[$m]] = $sqlObj->lr;
        }
        mysql_free_result($rs);
        $sql11="select rcode,mcode,total_pv,mpos from ".$dbprefix."mpv where rcode = '$ro' group by mcode  "; 
		
        $rs11 = mysql_query($sql11);
        for($i=0;$i<mysql_num_rows($rs11);$i++){
            $sqlObj            = mysql_fetch_object($rs11);
            $apv_rcode        = $sqlObj->rcode;
            $apv_mcode    = $sqlObj->mcode;
            $apv_total_pv    = $sqlObj->total_pv;
			 $mpos    = $sqlObj->mpos;
            for($j=0;$j<sizeof($n_mcode);$j++){
        
                if($n_mcode[$j]<>$apv_mcode){
                    //ไม่มี pv
                }else{
                     $up    = $n_mcode[$j];
                    $max_level = 0;
                    $lv         = 0;
                    $gpv    = 1;
                    while($up <> "" ){
                        //echo "up : $up<BR>";                    
                        if($n_upa_code[$up] <> "" && $gpv <= $maxlv){
                            $lv    = ($lv+1);
                                $flag = 0; 
                                $sum_pv = 0;                                
                                $pos_ncur = get_detail_meber($n_upa_code[$up],$tdate); //ตรวจสอบตำแหน่งผู้ที่มีสิทธิ์รับคอมมิชชั่น
                                $pos_ncur1 = $pos_ncur['pos_cur'];
								if($pos_ncur['pos_cur2'] == 'DD' or $pos_ncur['pos_cur2'] == 'SD' or $pos_ncur['pos_cur2'] == 'PD')$pos_ncur1 = $pos_ncur['pos_cur2'];
								else $pos_ncur1 = $pos_ncur['pos_cur'];
								$max_level = 20;
                                $chkpv=0;
                                    switch ($pos_ncur1) {
                                        case 'SI' :   
                                            if($gpv <= 8){   
                                                $chkpv = 1;
												$total=$apv_total_pv*$percen;
                                            }
                                        break;  
										 case 'GO' :   
                                            if($gpv <= 10){  
                                                $chkpv = 1;
												$total=$apv_total_pv*$percen;
                                            }
                                        break;    
										case 'DI':   
                                            if($gpv <= 12){ 
                                                $chkpv = 1;
												$total=$apv_total_pv*$percen;
                                            }
										case 'DD':   
                                            if($gpv <= 14){ 
                                                $chkpv = 1;
												$total=$apv_total_pv*$percen;
                                            }
										case 'SD':   
                                            if($gpv <= 16){ 
                                                $chkpv = 1;
												$total=$apv_total_pv*$percen;
                                            }
										case 'PD':   
                                            if($gpv <= 20){ 
                                                $chkpv = 1;
												$total=$apv_total_pv*$percen;
                                            }
                                        break;    
                                    default:
                                        $chkpv=0;
                                       break;
                                    }
									$sta=checkStatus($n_upa_code[$up],$fdate);
                                    if($gpv<= $max_level &&$chkpv==1 && $sta ==true){
										$insert = array(
												"rcode"        => $ro,
												"mcode"        => $n_mcode[$j],
												"name_t"       => $name_t[$n_mcode[$j]],
												"mposi"		   => $mpos,
												"upa_code"     => $n_upa_code[$up],
												"upa_name"     => $name_t[$n_upa_code[$up]],
												"bposi"        => $pos_ncur['pos_cur'],
												"pv"           => $apv_total_pv,
												"level"        => $lv,
												"percer"	   => $percen,
												"gen"          => $gpv,        
												"total"        => $total,
												"fdate"        => $fdate,    
												"tdate"        => $tdate,    
										  );      
										insert('ali_mc',$insert);     
                                        $gpv=($gpv+1);
                          		   }
                                  
                        }
                        $up = $n_upa_code[$up];
                    }
                }
            }
        } 
        $sql = " insert into ".$dbprefix."mmbonus  (rcode, mcode, name_t,total,tax,bonus,fdate,tdate,pmonth,pos_cur) ";
        $sql .= "    select '$ro', upa_code,upa_name,sum(total) as totalpv,(sum(total)*0.05) as tax,(sum(total)-(sum(total)*0.03)) bonus,'$fdate','$tdate','$pmonth',bposi from ".$dbprefix."mc WHERE  rcode='$ro' group by upa_code ";
        mysql_query($sql) or die(mysql_error());
}

function getalltotal($dbprefix,$mcode,$fdate,$tdate){
	$sql3 = "select sum(total)+sum(ato) as total from ".$dbprefix."commission where fdate between '$fdate' and '$tdate' and mcode='$mcode' group by mcode ";
		$rs3=mysql_query($sql3); 
		if (mysql_num_rows($rs3)>0) {
			$sqlObj3 = mysql_fetch_object($rs3);
			$total= $sqlObj3->total;
		}else{
			$total=0;
		}
	return $total;
} 

function del_cals($dbprefix,$ro,$name=array()) {                    
    foreach($name as $key => $value):                
    $sql="delete from ".$dbprefix.$value." where rcode >= '".$ro."'";
    if($value == 'calc_poschange3'  or $value == 'calc_poschange2')$sql.=" and type = '2'";
    //echo $sql.'<br>';
    if(mysql_query($sql)){
        mysql_query("COMMIT");
    }else{
        echo "error $sql<BR>";
    }
    endforeach;        
}


function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 
 
function dateDiff($startDate, $endDate) { 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 

} 

function fnc_calc_status_comb($dbprefix,$ro,$fdate,$tdate,$paydate){
   
    $whereclass = " AND fdate>= '$fdate' and tdate<= '$tdate' ";

    $sql2 = "SELECT m.mcode,m.name_t,m.name_f,m.pos_cur,m.sp_code,m.cmp,m.cmp2,m.acc_no,m.locationbase,m.bankcode from ".$dbprefix."member m ";
    $rs12 = mysql_query($sql2);
    if(mysql_num_rows($rs12) > 0){
        for($j=0;$j<mysql_num_rows($rs12);$j++){
            $sqlObj1 = mysql_fetch_object($rs12);
            $mcode[$j] =$sqlObj1->mcode;    
            $name_t[$j] =$sqlObj1->name_t;
            $name_f[$j] =$sqlObj1->name_f;
            $pos_cur[$j] =$sqlObj1->pos_cur;
            $sp_code[$mcode[$j]] = $sqlObj1->sp_code;
            $acc_no[$j] =$sqlObj1->acc_no;
            $cmp[$j] =$sqlObj1->cmp;
            $bankcode[$j] =$sqlObj1->bankcode;
            $locationbase[$j] =$sqlObj1->locationbase;
            $cmp2[$j] =$sqlObj1->cmp2;
            $moneyb[$j] = 0;
            $total_ewallet = 0;
            $moneyb[$j] = backmonthpv_b($dbprefix,$mcode[$j],$ro);
			$mmbonus[$j] = $embonus[$j] = 0;

			$sql = "SELECT ifnull(sum(total),0) as totalamt from ".$dbprefix."dmbonus  where mcode = '".$mcode[$j]."' and total > 0 ".$whereclass."   ";
            $rs = mysql_query($sql);
            if(mysql_num_rows($rs) > 0){
                for($gg=0;$gg<mysql_num_rows($rs);$gg++){
                    $sqlObj = mysql_fetch_object($rs);
                    $dmbonus[$j] =$sqlObj->totalamt;
                }
                mysql_free_result($rs);
            } 
			
			$sql = "SELECT ifnull(sum(total),0) as totalamt from ".$dbprefix."embonus  where mcode = '".$mcode[$j]."' and total > 0 ".$whereclass."   ";
            $rs = mysql_query($sql);
            if(mysql_num_rows($rs) > 0){
                for($gg=0;$gg<mysql_num_rows($rs);$gg++){
                    $sqlObj = mysql_fetch_object($rs);
                    $embonus[$j] =$sqlObj->totalamt;
                }
                mysql_free_result($rs);
            }  
			
            $allplan = $dmbonus[$j]+$embonus[$j];                
            $totalamt1[$j] = 0;
            $totalamt[$j] = 0;
            $ewallet[$j] = 0;
            
            $totalamt[$j] = $dmbonus[$j]+$embonus[$j];
            $totalamt1[$j] =  $moneyb[$j]+$totalamt[$j];
			if($totalamt1[$j] > 0){                    
				if($cmp[$j] == 'ครบ' and $cmp2[$j] == 'ครบ' and !empty($acc_no[$j])) //// YES
				{
					if($totalamt1[$j] >= 100)
					{
						$tax[$j] = $totalamt1[$j]*0.05;
						$com_transfer_chagre = 30;
						$commission = array(
							"rcode"        => $ro,
							"mcode"        => $mcode[$j],
							"status"       => '1',  // pay 
							"pv"           => $moneyb[$j],  // back pv    
							"pvb"          => $totalamt[$j],     // pv this round
							"dmbonus"          => $dmbonus[$j],
							"embonus"         => $embonus[$j],  
							"tot_tax"      => $tax[$j], // tax
							"total"        => $totalamt1[$j], // all total  // pvb+pv
							"paydate"   =>$paydate,
							"fdate"   =>$fdate,
							"tdate"   =>$tdate,
							"mpos"         => $pos_cur[$j], 
							"com_transfer_chagre"    => $com_transfer_chagre                        
						);
						insert('ali_cmbonus_b',$commission); 
					 }
					 else
					 {
						if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
						if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
						if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";                        
							
						$commission = array(
							"rcode"        => $ro,
							"mcode"        => $mcode[$j],
							"status"       => '0',  // pay 
							"pv"           => $moneyb[$j],  // back pv    
							"pvb"          => $totalamt[$j],     // pv this round
							"pvh"           => $totalamt1[$j],  // pv next round        
							"dmbonus"          => $dmbonus[$j],
							"embonus"         => $embonus[$j],  
							"tot_tax"      => $tax[$j], // tax
							"total"        => '0', // all total  // pvb+pv
							"fdate"   =>$fdate,
							"tdate"   =>$tdate,
							"mpos"         => $pos_cur[$j], 
							"c_note1"      => $c_note1, 
							"c_note2"      => $c_note2, 
							"c_note3"      => $c_note3
						);
						insert('ali_cmbonus_b',$commission);                         
					}
				   
				}
				else /////  NO
				{
					if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
					if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
					if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
						$commission = array(
							"rcode"        => $ro,
							"mcode"        => $mcode[$j],
							"status"       => '0',  // pay 
							"pv"           => $moneyb[$j],  // back pv    
							"pvb"          => $totalamt[$j],     // pv this round
							"pvh"           => $totalamt1[$j],  // pv next round    
							"dmbonus"          => $dmbonus[$j],
							"embonus"         => $embonus[$j],  
							"tot_tax"      => $tax[$j], // tax
							"total"        => '0', // all total  // pvb+pv
							"fdate"   =>$fdate,
							"tdate"   =>$tdate,
							"mpos"         => $pos_cur[$j], 
							"c_note1"      => $c_note1, 
							"c_note2"      => $c_note2, 
							"c_note3"      => $c_note3
						);
						insert('ali_cmbonus_b',$commission);  
				}                
			} 
        }
    }
}
function backmonthpv_b($dbprefix,$mcode,$ro){
    $sql2 = "select mcode,pvh,status from ".$dbprefix."cmbonus_b WHERE  mcode='$mcode'  order by rcode desc limit 0,1 ";
    //echo $sql2.'<br>';
    $rs2=mysql_query($sql2);
    if (mysql_num_rows($rs2)>0) {
        $sqlObj2 = mysql_fetch_object($rs2);
        if($sqlObj2->status == '0')$pv= $sqlObj2->pvh;
        else $pv=0;
    }else{
        $pv = 0;
    }
    return $pv;
}

 function return_pos($dbprefix,$ro,$table,$field){
       $sql = " select pos_before,mcode from ".$dbprefix.$table." where rcode >= '$ro' and type = '2' order by id desc ";
       $rs1 = mysql_query($sql);
        if (mysql_num_rows($rs1)>0) {
            for($i=0;$i<mysql_num_rows($rs1);$i++){
                $sqlObj = mysql_fetch_object($rs1);
                $pos_before =$sqlObj->pos_before;        
                $mcode_vip =$sqlObj->mcode;    
                $sql1 = " update ".$dbprefix."member set ".$field." = '$pos_before' where mcode = '$mcode_vip'  ";
          //  echo  $sql1;
               mysql_query($sql1);
            }    
        }
    }
	

function calc_pool_bunus($dbprefix,$ro,$fdate,$tdate){

    $month=explode("-",$fdate);
    $thismonth = $mdate = $month[0].$month[1];
    $thismonth1 = $month[0].'-'.$month[1];
    $where = "sadate between '$fdate' and '$tdate' and (sa_type = 'A' or sa_type = 'Z') and tot_pv > 0 and cancel = '0' ";
	$sql = " SELECT mcode,SUM(tot_pv) as tot_pv,SUM(total) as total FROM  ";
	$sql .= " ( ";
	$sql .= " SELECT mcode,SUM(tot_pv) as tot_pv,SUM(total) as total  FROM ali_asaleh ";
	$sql .= " WHERE ".$where." GROUP BY mcode ";
	$sql .= " UNION ALL ";
	$sql .= " SELECT mcode,SUM(tot_pv) as tot_pv,'0' as total  FROM ali_holdhead ";
	$sql .= " WHERE ".$where." GROUP BY mcode ";
	$sql .= " ) as tb ";
	$sql .= " GROUP BY mcode";  
 	$rs = mysql_query($sql);
	$num =  mysql_num_rows($rs);
	$arr = array();
	if(mysql_num_rows($rs) > 0)
	{
		for($i=0;$i<$num;$i++)
		{
			$row = mysql_fetch_object($rs);
			$mcode = $row->mcode;
            $tot_pv = $row->tot_pv; 
            $total = $row->total; 
		       $arr[$i] = array(
					    "rcode"		=> $ro,
					    "mcode"		=> $mcode,
                        "total_pv"  => $tot_pv,
					    "total"		=> $total,
					    "fdate"		=> $fdate,
					    "tdate"		=> $tdate
			    );			
			    
		}
		muti_insert('ali_epv',$arr);
		
	}

    $sql = "SELECT sum(total_pv) as total_pv,sum(total) as total from ".$dbprefix."epv WHERE rcode='$ro' ";
    $rs = mysql_query($sql);
    if(mysql_num_rows($rs)>0){
        $total_pv = mysql_result($rs,0,'total_pv')*0.02;
    }
	
	$pos_piority = array('CE'=>5,'DE'=>4,'EE'=>3,'SE'=>2,'PE'=>1);  
	$all_pool = array('CE'=>0,'DE'=>0,'EE'=>0,'SE'=>0,'PE'=>0,'ALL'=>0);

	$member['PE'] = array();
	$member['SE'] = array();
	$member['EE'] = array();
	$member['DE'] = array();
	$member['CE'] = array();
	$data = query('mcode,pos_cur3','ali_member'," mdate<= '".$tdate."' and pos_cur3 <> ''  ");
	$check = array('1'=>0,'2'=>0); 
	foreach($data as $keyx => $val){ 
	   foreach($pos_piority as $key=> $value){                                 
			if($value <= $pos_piority[$val['pos_cur3']]){
			    $all_pool[$key] += 1 ; 
				
				$member[$key] = array_merge($member[$key],array($val['mcode']));
			}
		} 
	}
	  
    foreach($pos_piority as $key=> $value)
    {          
		$num= count($member[$key]); 
		if($num >0){   
		   foreach($member[$key] as $mcode)
		   {   
			$bonusx = $total_pv/$num;
			$bonus[$mcode][$key] = $bonusx; 
		   }    
	   }  
    } 
    
    if($bonus){  
        foreach($bonus as $mcodex => $sss )
        { 
		   $data =  get_detail_meber($mcodex,$tdate); 
           $insertxx = array(
                    "rcode"         => $ro,
                    "mcode"         => $mcodex,    
                    "total1"        => $bonus[$mcodex]['PE'],
                    "total2"        => $bonus[$mcodex]['SE'],
                    "total3"        => $bonus[$mcodex]['EE'],            
                    "total4"        => $bonus[$mcodex]['DE'],                
                    "total5"        => $bonus[$mcodex]['CE'],   
                    "fdate"         => $fdate,
                    "tdate"         => $tdate,
                    "pv_world"      => $total_pv, 
                    "pos_cur"       => $data["pos_cur3"]     
                );    
           if($bonus[$mcodex]['PE'] > 0)insert('ali_em',$insertxx);    
        }
    }
    $sqlzz = " insert into ".$dbprefix."embonus  (rcode, mcode,exp, total,tax,bonus,fdate,tdate,pos_cur,weak) ";
    $sqlzz .= "select '$ro',mcode,exp,sum(total1+total2+total3+total4+total5) as total,(sum(total1+total2+total3+total4+total5)*0.05) as tax,(sum(total1+total2+total3+total4+total5)-(sum(total1+total2+total3+total4+total5)*0.05)) as bonus,'$fdate','$tdate',pos_cur,weak from ".$dbprefix."em  where rcode='$ro' group by mcode";
    mysql_query($sqlzz) or die(mysql_error());    
}


function getweak($dbprefix,$mcode,$fdate,$tdate){ 
    $chkmonth=explode("-",$fdate);
    $chkmonth= $chkmonth[0].'-'.$chkmonth[1];
    $sql3 = "select mcode, SUM(total_pv_ll) AS tot_pv from ".$dbprefix."bmbonus WHERE  mcode='$mcode' and fdate LIKE '%".$chkmonth."%' and total <> 0 group by mcode "; 
	$rs3=mysql_query($sql3);
	if (mysql_num_rows($rs3)>0) {
		$sqlObj3 = mysql_fetch_object($rs3);
		$total_fv3= $sqlObj3->tot_pv;
	}else{
		$total_fv3=0;
	}
	mysql_free_result($rs3);
      
    return $total_fv3;
} 




  function check_exp($exp,$pos_cur){  
       $pos_exp = array('CD'=>100000000000000,'TD'=>10000000,'DD'=>5000000,'DI'=>1000000,'EM'=>500000,'SA'=>300000,'RU'=>100000,'PE'=>50000,'PL'=>30000);     
       if($exp > $pos_exp[$pos_cur])$exp = $pos_exp[$pos_cur];  
       else  $exp =$exp;  
       return $exp;  
  }
  
  function get_expzzz($mcode,$fdate,$tdate){
    
   $where = " fdate >= '$fdate' and tdate <= '$tdate'  and mcode = '$mcode'  ";
   // $where = "  mcode = '$mcode'  ";
    $sql  = " SELECT mcode,SUM(tot_pv) as tot_pv,fdate  FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT mcode,SUM(total) as tot_pv,fdate  FROM ali_mmbonus ";
    $sql .= "    WHERE ".$where." GROUP BY mcode ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT mcode,SUM(total) as tot_pv,fdate  FROM ali_mmmbonus ";
    $sql .= "    WHERE ".$where." GROUP BY mcode ";
    $sql .= " ) as tb ";
    $sql .= " GROUP BY mcode ";
    $sql .= " ORDER BY mcode ";
    $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);         
   
    if(mysql_num_rows($rs) > 0)
    {   
        $row = mysql_fetch_object($rs);
        $mcode = $row->mcode;   
        $tot_pv = $row->tot_pv;  
      
    }else{
        $tot_pv=0;
    } 
 
    return   $tot_pv;      
}
?>



