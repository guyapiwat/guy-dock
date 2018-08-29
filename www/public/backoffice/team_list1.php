
<?$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode']; ?>

<form name="rform" method="POST" action="./index.php?sessiontab=1&sub=26">
	 <table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>	
		<td align="right">รหัสสมาชิก&nbsp;</td>
		<td><input type="text" name="fmcode" id="fmcode" placeholder="TH0000001" value="<?=$fmcode?>" maxlength='9'/>

	   <input type="submit" name="Submit" value="ตกลง">
		&nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>

<?
require("connectmysql.php");



$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
if(!empty($fmcode)) {
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if (isset($_GET["lr"])){$lr=$_GET["lr"];} else {$lr="";}
		?>
		<table width=60% align=center><tr><td align=center>

		 <a href="?sessiontab=1&sub=26&lr=1&fmcode=<?=$fmcode?>" <?if($lr =='1'){?> style="background-color: #F00;padding: 5px;color: #FFF;"<?}?>>รายชื่อฝั่งซ้าย</a>
		</td>
		<td align=center>

		<a href="?sessiontab=1&sub=26&fmcode=<?=$fmcode?>" <?if($lr ==''){?> style="background-color: #F00;padding: 5px;color: #FFF;"<?}?>>ทั้งหมด</a>
		</td>
		<td align=center>

		<a href="?sessiontab=1&sub=26&lr=2&fmcode=<?=$fmcode?>" <?if($lr =='2'){?> style="background-color: #F00;padding: 5px;color: #FFF;"<?}?>>รายชื่อฝั่งขวา</a>
		</td>

		</tr></table>

		<?

		//$sql = "SELECT * FROM ".$dbprefix."member ";
		// JOIN เมื่อต้องการข้อมูลวันหมดอายุในโปรแกรม
		$mm = date("Y-m");
		//$mm = date("Y");
		$sql = "SELECT *,";
		$sql .= "CASE lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS lrxx,CASE lr1 WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS lrxxx from ".$dbprefix."member_show where uid = '$fmcode' ";
		if($_GET["lr"]){
		$sql .= " and lr = '".$_GET["lr"]."' ";
		}
		//echo $sql;
		$sqlall = $sql;
		//if(empty($lr)){
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$sadate = mysql_result($rs,0,"sadate");
		}
		//if(empty($lr)){

			
		if($sadate != date("Y-m-d")){

		$_SESSION[All] = $_SESSION[countMB] = $_SESSION[countBR] = $_SESSION[countSI] = $_SESSION[countGO] = $_SESSION[countPL] = $_SESSION[countDI] = $_SESSION[countBD] = $_SESSION[countKD] = 0;


		$sql1 = "delete from ".$dbprefix."member_show where uid = '{$fmcode}' ";
		mysql_query($sql1);


			$rs=mysql_query("select mcode,upa_code,sp_code,name_t,sp_name,upa_name,mdate,pos_cur,pos_cur1 from ".$dbprefix."member where mcode='".$fmcode."' ");
			//echo "select * from ".$dbprefix."member where mcode='$mcode[$k]' ";
			if(mysql_num_rows($rs) > 0){
				$lv = 0;
				$mcode1 = mysql_result($rs,0,'mcode');
				$name_t1 = mysql_result($rs,0,'name_t');
				$upa_code1 = mysql_result($rs,0,'upa_code');
				$sp_code1 = mysql_result($rs,0,'sp_code');
				$sp_name1 = trim(mysql_result($rs,0,'sp_name'));
				$upa_name1 = mysql_result($rs,0,'upa_name');
				$mdate1 = mysql_result($rs,0,'mdate');
				$pos_cur = mysql_result($rs,0,'pos_cur');
				$pos_cur2 = mysql_result($rs,0,'pos_cur1');
				$_SESSION[All] = $_SESSION[All]+1;
				if($pos_cur == 'MB')$_SESSION[countMB]++;
				if($pos_cur == 'BR')$_SESSION[countBR]++;
				if($pos_cur == 'SI')$_SESSION[countSI]++;
				if($pos_cur == 'GO')$_SESSION[countGO]++;
				if($pos_cur == 'PL')$_SESSION[countPL]++;
				if($pos_cur2 == 'DI')$_SESSION[countDI]++;
				if($pos_cur2 == 'BD')$_SESSION[countBD]++;
				if($pos_cur2 == 'KD')$_SESSION[countKD]++;

				$chkline = isLinesponsor($dbprefix,$mcode1,$fmcode);
				if($chkline == true)$okok = '1';else $okok='0';
				$totpv = gettotpv($dbprefix,$mcode1);
			

				mysql_query("insert into  ".$dbprefix."member_show (mcode,name_t,upa_code,sp_code,lv,lr,uid,sp_name,upa_name,mdate,totpv,pos_cur,pos_cur2,sadate,okok)
				values('$mcode1','$name_t1','$upa_code1','$sp_code1','$lv','$lr','".$fmcode."','$sp_name1','$upa_name1','$mdate1','$totpv','$pos_cur','$pos_cur2','".date("Y-m-d")."','$okok') ");
				//isLine($dbprefix,$mcode1,$lv,$fdate,$tdate,$_SESION[usercode]);	
			}

			$rs=mysql_query("select mcode,upa_code,sp_code,name_t,sp_name,upa_name,mdate,pos_cur,pos_cur1 from ".$dbprefix."member where upa_code='".$fmcode."' and lr = 1 ");
			//echo "select * from ".$dbprefix."member where mcode='$mcode[$k]' ";
			if(mysql_num_rows($rs) > 0){
				$lv = 1;
				$mcode1 = mysql_result($rs,0,'mcode');
				$name_t1 = mysql_result($rs,0,'name_t');
				$upa_code1 = mysql_result($rs,0,'upa_code');
				$sp_code1 = mysql_result($rs,0,'sp_code');
				$sp_name1 = trim(mysql_result($rs,0,'sp_name'));
				$upa_name1 = mysql_result($rs,0,'upa_name');
				$mdate1 = mysql_result($rs,0,'mdate');
				$pos_cur = mysql_result($rs,0,'pos_cur');
				$pos_cur2 = mysql_result($rs,0,'pos_cur1');
								$_SESSION[All] = $_SESSION[All]+1;

				if($pos_cur == 'MB')$_SESSION[countMB]++;
				if($pos_cur == 'BR')$_SESSION[countBR]++;
				if($pos_cur == 'SI')$_SESSION[countSI]++;
				if($pos_cur == 'GO')$_SESSION[countGO]++;
				if($pos_cur == 'PL')$_SESSION[countPL]++;
				if($pos_cur2 == 'DI')$_SESSION[countDI]++;
				if($pos_cur2 == 'BD')$_SESSION[countBD]++;
				if($pos_cur2 == 'KD')$_SESSION[countKD]++;

				$chkline = isLinesponsor($dbprefix,$mcode1,$fmcode);
				if($chkline == true)$okok = '1';else $okok='0';
				$totpv = gettotpv($dbprefix,$mcode1);
			   mysql_query("insert into  ".$dbprefix."member_show (mcode,name_t,upa_code,sp_code,lv,lr,lr1,uid,sp_name,upa_name,mdate,pos_cur,pos_cur2,totpv,sadate,okok)
				values('$mcode1','$name_t1','$upa_code1','$sp_code1','$lv','1','1','".$fmcode."','$sp_name1','$upa_name1','$mdate1','$pos_cur','$pos_cur2','$totpv','".date("Y-m-d")."','$okok') ");
				isLine($dbprefix,$mcode1,$lv,$fdate,$tdate,$fmcode,'1');	
			}

			$rs=mysql_query("select mcode,upa_code,sp_code,name_t,sp_name,upa_name,mdate,pos_cur,pos_cur1 from ".$dbprefix."member where upa_code='".$fmcode."' and lr = 2 ");
			//echo "select * from ".$dbprefix."member where mcode='$mcode[$k]' ";
			if(mysql_num_rows($rs) > 0){
				$lv = 1;
				$mcode1 = mysql_result($rs,0,'mcode');
				$name_t1 = mysql_result($rs,0,'name_t');
				$upa_code1 = mysql_result($rs,0,'upa_code');
				$sp_code1 = mysql_result($rs,0,'sp_code');
				$sp_name1 = trim(mysql_result($rs,0,'sp_name'));
				$upa_name1 = mysql_result($rs,0,'upa_name');
				$mdate1 = mysql_result($rs,0,'mdate');
				$pos_cur = mysql_result($rs,0,'pos_cur');
				$pos_cur2 = mysql_result($rs,0,'pos_cur1');
				$_SESSION[All] = $_SESSION[All]+1;
				if($pos_cur == 'MB')$_SESSION[countMB]++;
				if($pos_cur == 'BR')$_SESSION[countBR]++;
				if($pos_cur == 'SI')$_SESSION[countSI]++;
				if($pos_cur == 'GO')$_SESSION[countGO]++;
				if($pos_cur == 'PL')$_SESSION[countPL]++;
				if($pos_cur2 == 'DI')$_SESSION[countDI]++;
				if($pos_cur2 == 'BD')$_SESSION[countBD]++;
				if($pos_cur2 == 'KD')$_SESSION[countKD]++;

				$chkline = isLinesponsor($dbprefix,$mcode1,$fmcode);
				if($chkline == true)$okok = '1';else $okok='0';


				$totpv = gettotpv($dbprefix,$mcode1);
				mysql_query("insert into  ".$dbprefix."member_show (mcode,name_t,upa_code,sp_code,lv,lr,lr1,uid,sp_name,upa_name,mdate,pos_cur,pos_cur2,totpv,sadate,okok)
				values('$mcode1','$name_t1','$upa_code1','$sp_code1','$lv','2','2','".$fmcode."','$sp_name1','$upa_name1','$mdate1','$pos_cur','$pos_cur2','$totpv','".date("Y-m-d")."','$okok') ");
				isLine($dbprefix,$mcode1,$lv,$fdate,$tdate,$fmcode,'2');	
			}

		}
		
		$_SESSION[All] = $_SESSION[All_1] = $_SESSION[countMB] = $_SESSION[countBR] = $_SESSION[countSI] = $_SESSION[countGO] = $_SESSION[countPL] = $_SESSION[countDI] = $_SESSION[countBD] = $_SESSION[countKD] = 0;
		$rs = mysql_query($sqlall);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode = $sqlObj->mcode;
			$pos_cur = $sqlObj->pos_cur;
			$pos_cur2 = $sqlObj->pos_cur2;
			$_SESSION[All] = $_SESSION[All]+1;
			if(!empty($pos_cur2))$_SESSION[All_1] = $_SESSION[All_1]+1;
			if($pos_cur == 'MB')$_SESSION[countMB]++;
			if($pos_cur == 'BR')$_SESSION[countBR]++;
			if($pos_cur == 'SI')$_SESSION[countSI]++;
			if($pos_cur == 'GO')$_SESSION[countGO]++;
			if($pos_cur == 'PL')$_SESSION[countPL]++;
			if($pos_cur2 == 'DI')$_SESSION[countDI]++;
			if($pos_cur2 == 'BD')$_SESSION[countBD]++;
			if($pos_cur2 == 'KD')$_SESSION[countKD]++;
		}
			

		?><br>
		<table align=center width="100%">
		จำนวนตำแหน่งทางธุรกิจทั้งหมด  : <?=$_SESSION[All]?> รหัส <BR>
			<tr>
				<td ><img src="images/z01.png" height="20" ><font size = 4>Member : <?=$_SESSION[countMB]?> รหัส</td>
				<td ><img src="images/z02.png" height="20" ><font size = 4>Bronz : <?=$_SESSION[countBR]?>  รหัส</td>
				<td ><img src="images/z03.png" height="20"><font size = 4>Silver : <?=$_SESSION[countSI]?> รหัส</td>
				<td ><img src="images/z04.png" height="20"><font size = 4>Gold  : <?=$_SESSION[countGO]?>  รหัส</td>
			</td>
			<tr>    
				<td ><img src="images/z05.png" height="20"><font size = 4>Platinum : <?=$_SESSION[countPL]?>  รหัส</td>
				<td ></td>
				<td ></td>
				<td ></td>
			</tr>
		</table>
		<table align=center width="100%">
		จำนวนตำแหน่งเกียติยศทั้งหมด  : <?=$_SESSION[All_1]?> รหัส 
			<tr>    
				
				<td ><img src="images/z07.png" height="20"><font size = 4>Diamond : <?=$_SESSION[countDI]?>  รหัส</td>
				<td ><img src="images/z08.png" height="20"><font size = 4>Blue Diamond : <?=$_SESSION[countBD]?>  รหัส </td>
				<td ><img src="images/z09.png" height="20"><font size = 4>King Diamond : <?=$_SESSION[countKD]?>  รหัส</td>
				<td >&nbsp;</td>
			</tr>
		</table>

		<? //echo $sql;
			$rec = new repGenerator();
				$rec->setQuery($sql);
				$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
				$rec->setOrder($_GET['ord']==""?" lv ":$_GET['ord']);
				$rec->setLimitPage($_GET['lp']);
				if(isset($_POST['skey']))
					$rec->setCause($_POST['skey'],$_POST['scause']);
				else if(isset($_GET['skey']))
					$rec->setCause($_GET['skey'],$_GET['scause']);
				$rec->setSize("95%","");
				$rec->setAlign("center");
				$rec->setPageLinkAlign("right");
				//$rec->setPageLinkShow(false,false);
				$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale&fmcode=$fmcode");
				$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
				if(isset($page))
					$rec->setCurPage($page);
				$rec->setShowField("mcode,name_t,mdate,lrxx,pos_cur,pos_cur2,totpv,sp_code,sp_name,lv,okok");
				$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันสมัคร,ด้าน,ตำแหน่ง,เกีรติยศ,คะแนนส่วนตัว,รหัสผู้แนะนำ,ชื่อผู้แนะนำ,ชั้น,real");
				//$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
				//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
				$rec->setFieldAlign("center,left,center,center,center,center,right,center,left,center,center,center");
				$rec->setFieldSpace("8%,20%,8%,4%,8%,8%,8%,8%,15%,5%,5%");
				$rec->setFieldLink("index.php?sessiontab=4&sub=1&cmc=,");
				//$rec->setSum(true,false,",,,,,,true,true");	
				//$rec->setFieldFloatFormat(",,,,,,0,,0");
				

				$rec->exportXls("ExportXls","Team_List".date("Ymd").".xls","SH_QUERY");
				$str = "<fieldset><a href='".$rec->download("ExportXls","Team_List".date("Ymd").".xls")."' >";
				$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
				//$rec->getParam();
				$rec->setSpace($str);

				$rec->setSearch("mcode");
				$rec->setSearchDesc("รหัสสมาชิก");
				$rec->showRec(1,'SH_QUERY');
}


function isLine($dbprefix,$mcode,$lv,$fdate,$tdate,$uid,$lr){
	global $_SESSION;
$sql = "SELECT mcode,upa_code,sp_code,name_t,sp_name,upa_name,mdate,pos_cur,pos_cur1,lr FROM ".$dbprefix."member WHERE upa_code='$mcode'  ";
$rs = mysql_query($sql);
	if(mysql_num_rows($rs)> 0){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$lv++;
			$lrlr = '';
			$sqlObj = mysql_fetch_object($rs);
			$mcode = $sqlObj->mcode;
			$lrxx = $sqlObj->lr;
			$upa_code = $sqlObj->upa_code;
			$sp_code = $sqlObj->sp_code;
			$name_t = $sqlObj->name_t;
			$sp_name = trim($sqlObj->sp_name);
			$upa_name = $sqlObj->upa_name;
			$mdate = $sqlObj->mdate;
			$pos_cur = $sqlObj->pos_cur;
			$pos_cur2 = $sqlObj->pos_cur1;
			$_SESSION[All] = $_SESSION[All]+1;
			if($pos_cur == 'MB')$_SESSION[countMB]++;
				if($pos_cur == 'BR')$_SESSION[countBR]++;
				if($pos_cur == 'SI')$_SESSION[countSI]++;
				if($pos_cur == 'GO')$_SESSION[countGO]++;
				if($pos_cur == 'PL')$_SESSION[countPL]++;
				if($pos_cur2 == 'DI')$_SESSION[countDI]++;
				if($pos_cur2 == 'BD')$_SESSION[countBD]++;
				if($pos_cur2 == 'KD')$_SESSION[countKD]++;



			//$chkline = isLinesponsor($dbprefix,$mcode,$uid);
			$sql_sp = "SELECT mcode FROM ali_member WHERE sp_code = '".$_POST['fmcode']."' and mcode = '".$mcode."' ";
			$rs_sp = mysql_query($sql_sp);
			if(mysql_num_rows($rs_sp) > 0)$okok = '1';else $okok='0';
			$totpv = gettotpv($dbprefix,$mcode);
			$lrlr = getlrxx($dbprefix,$mcode,$_POST['fmcode'],$lr);
		//	echo $mcode.' : '.$name_t.' : '.$upa_code.' : '.$lv.' : '.$lr.'<br>';
			mysql_query("insert into  ".$dbprefix."member_show (mcode,name_t,upa_code,sp_code,lv,lr,lr1,uid,mdate,upa_name,sp_name,totpv,pos_cur,pos_cur2,sadate,okok)
			values('$mcode','$name_t','$upa_code','$sp_code','$lv','$lrxx','$lrlr','$uid','$mdate','$upa_name','$sp_name','$totpv','$pos_cur','$pos_cur2','".date("Y-m-d")."','$okok') ");
			
		isLine($dbprefix,$mcode,$lv,$fdate,$tdate,$uid,$lr);
		}
	}
}
function gettotpv($dbprefix,$mcode){
	$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_asaleh WHERE mcode='$mcode' and  (sa_type='A') and cancel = 0 ";
			//echo $sql;
			$rs = mysql_query($sql);
			$all_Apv = mysql_result($rs,0,'all_pv'); 
			mysql_free_result($rs);

			$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_holdhead WHERE mcode='$mcode' and (sa_type='A') and cancel = 0  ";
			//echo $sql;
			$rs = mysql_query($sql);
			$all_Apv = ($all_Apv+mysql_result($rs,0,'all_pv')); 
			mysql_free_result($rs);


			$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ali_special_point WHERE  sa_type='VA' AND mcode='$mcode' group by mcode ";
			$rs3=mysql_query($sql3);
			if (mysql_num_rows($rs3)>0) {
				$sqlObj3 = mysql_fetch_object($rs3);
				$total_fv3= $sqlObj3->tot_pv;
				 mysql_free_result($rs3);
			}else{
				$total_fv3=0;
			}
			return $all_Apv = $all_Apv+$total_fv3;
}

 function isLinesponsor($dbprefix,$scode,$testcode){
		$sql = "SELECT sp_code FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
		$rs = mysql_query($sql);
		if($scode==$testcode)
			return true;
		if(mysql_num_rows($rs)<=0)
			return false;
		else if(mysql_result($rs,0,'sp_code')!=$testcode)
			return isLinesponsor($dbprefix,mysql_result($rs,0,'sp_code'),$testcode);
		else
			return true;
	}
	
function getlrxx($dbprefix,$scode,$testcode,$lr){
        $sql = "SELECT upa_code,lr FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
        $rs = mysql_query($sql);
        if($scode==$testcode)
            return $lr;
        if(mysql_num_rows($rs)<=0)
            return '';
        else if(mysql_result($rs,0,'upa_code')!=$testcode)
            return getlrxx($dbprefix,mysql_result($rs,0,'upa_code'),$testcode,mysql_result($rs,0,'lr'));
        else
            return mysql_result($rs,0,'lr');
}

?>



<?function rpdialog_teamlist($sub){ ?>

<?}?>
