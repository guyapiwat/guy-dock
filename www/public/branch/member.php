<? require("date_picker.php"); ?>
<script language="javascript">
var win
function view(code){
	var param = 'fmcode='+code;
	var url = './mem_detailview.php?'+param;
	//window.location = wlink;
	//window.location = url;
	if(win!=null) win.close();
	//win = window.open(url,'','fullscreen=yes scrollbars=yes' );
	win = window.open(url,'','' );
}
</script>
<script language="javascript" type="text/javascript">
function sale_status(id){
	if(confirm("ต้องการ Reset Password")){
		window.location='index.php?sessiontab=1&sub=2&state=3&bid='+id;
	}
}
</script>
 
<?

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

if(!empty($_GET['s_mcode'])){$s_mcode = $_GET['s_mcode'];}else{$s_mcode = $_POST['s_mcode'];}

if(!empty($_GET['s_namef'])){$s_namef = $_GET['s_namef'];}else{$s_namef = $_POST['s_namef'];}

if(!empty($_GET['s_id_card'])){$s_id_card = $_GET['s_id_card'];}else{$s_id_card = $_POST['s_id_card'];}

if(!empty($_GET['s_poscur'])){$s_poscur = $_GET['s_poscur'];}else{$s_poscur = $_POST['s_poscur'];}

if(!empty($_GET['s_poscur1'])){$s_poscur1 = $_GET['s_poscur1'];}else{$s_poscur1 = $_POST['s_poscur1'];}

if(!empty($_GET['s_upa_code'])){$s_upa_code = $_GET['s_upa_code'];}else{$s_upa_code = $_POST['s_upa_code'];}

if(!empty($_GET['s_sp_code'])){$s_sp_code = $_GET['s_sp_code'];}else{$s_sp_code = $_POST['s_sp_code'];}

if(!empty($_GET['s_terminate'])){$s_status_terminate = $_GET['s_terminate'];}else{$s_status_terminate = $_POST['s_terminate'];}
if(!empty($_GET['s_suspend'])){$s_suspend = $_GET['s_suspend'];}else{$s_suspend = $_POST['s_suspend'];}

if(!empty($_GET['s_ewallet'])){$s_ewallet = $_GET['s_ewallet'];}else{$s_ewallet = $_POST['s_ewallet'];}
if(!empty($_GET['v_ewallet'])){$v_ewallet = $_GET['v_ewallet'];}else{$v_ewallet = $_POST['v_ewallet'];}
if(!empty($_GET['smdate2'])){$smdate2 = $_GET['smdate2'];}else{$smdate2 = $_POST['smdate2'];}

if(!empty($_GET['emdate2'])){$emdate2 = $_GET['emdate2'];}else{$emdate2 = $_POST['emdate2'];}

if(!empty($_GET['s_list'])){$s_list = $_GET['s_list'];}else {if(!empty($_POST['s_list'])){$s_list = $_POST['s_list'];}else{$s_list='50';}}

if(!empty($_GET['mtype1'])){$mtype1 = $_GET['mtype1'];}else{$mtype1 = $_POST['mtype1'];}
 
?>
<?if($_GET['state']==2){?>

<?}else {?>

<?}?>
 <br/>
<?
if($s_list == '99999999999999'){
	 ini_set('memory_limit', '1024M');
}


require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}



$sql = "SELECT pos_cur2,mtype1,hpv,voucher,id,mcode,name_t,bunit,mobile,sv_code,id_card,mdate,pos_cur,pos_cur2,sp_code2 as upa_code,sp_code,ewallet,eatoship,ecom,CONCAT(".$dbprefix."member.name_f,' ',".$dbprefix."member.name_t) as name_t ";
$sql .= ",CASE mtype1 WHEN '0' THEN 'Member' WHEN '1' THEN 'Franchise'  WHEN '2' THEN 'Agency'  END AS mtype ";
$sql .= ",CASE status_doc WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_doc ";
$sql .= ",CASE lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  WHEN '3' THEN 'ขวา'  END AS statur_lr ";
$sql .= $sqlmtype;
/*
$sql .= ",CASE status_terminate WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_terminate1 ";
*/
$sql .= ",CASE status_terminate WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=7&aid=',id,'&mcode=',mcode,'&id=1\"><img src=\"./images/false.gif\"></a>') ";

$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=7&aid=',id,'&mcode=',mcode,'&id=0\"><img src=\"./images/true.gif\"></a>') END AS status_terminate1 ";


$sql .= ",CASE status_ato WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_ato ";
$sql .= ",CASE status_suspend WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&aid=',id,'&mcode=',mcode,'&id=1\"><img src=\"./images/false.gif\"></a>') ";
$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&aid=',id,'&mcode=',mcode,'&id=\"><img src=\"./images/true.gif\"></a>') END AS status_suspend ";

$sql .= ",DATE_FORMAT(".$dbprefix."member.mdate, '%d-%m-%Y') as mdate FROM ".$dbprefix."member where 1=1 ";
//$sql .= " LEFT JOIN ".$dbprefix."position1 AS taba ON (".$dbprefix."member.pos_cur1=taba.posshort) ";
//$sql .= " LEFT JOIN ".$dbprefix."location_base AS lb ON (".$dbprefix."member.locationbase=lb.cid)  WHERE 1 ";
 
if(!empty($_REQUEST['s_mcode']) || !empty($_GET['s_mcode'])){
	$sql .= " and ".$dbprefix."member.mcode LIKE '%$s_mcode%'";
}
if(!empty($_REQUEST['s_namef']) || !empty($_GET['s_namef'])){
	$sql .= " and ".$dbprefix."member.name_t LIKE '%$s_namef%'";
}
if(!empty($_REQUEST['s_id_card']) || !empty($_GET['s_id_card'])){
	$sql .= " and ".$dbprefix."member.id_card LIKE '%$s_id_card%'";
}
if(!empty($_REQUEST['s_poscur']) || !empty($_GET['s_poscur'])){
	$sql .= " and ".$dbprefix."member.pos_cur LIKE '%$s_poscur%'";
}
if(!empty($_REQUEST['s_poscur1']) || !empty($_GET['s_poscur1'])){
	$sql .= " and ".$dbprefix."member.pos_cur2 LIKE '$s_poscur1'";
}
if(!empty($_REQUEST['s_sp_code']) || !empty($_GET['s_sp_code'])){
	$sql .= " and ".$dbprefix."member.sp_code LIKE '%$s_sp_code%'";
}
if(!empty($_REQUEST['s_upa_code']) || !empty($_GET['s_upa_code'])){
	$sql .= " and ".$dbprefix."member.sp_code2 LIKE '%$s_upa_code%'";
}
if(!empty($_REQUEST['s_terminate']) || !empty($_GET['s_terminate'])){
	$sql .= " and ".$dbprefix."member.status_terminate = '$s_status_terminate'";
}
if(!empty($_REQUEST['s_suspend']) || !empty($_GET['s_suspend'])){
	$sql .= " and ".$dbprefix."member.status_suspend = '$s_suspend'";
}
if(!empty($_REQUEST['v_ewallet']) and !empty($_REQUEST['s_ewallet']) ){
		$valus=explode('-',$s_ewallet);
		if($v_ewallet=="E")$wallet="ewallet";
		if($v_ewallet=="EC")$wallet="ecom";
		if($v_ewallet=="EA")$wallet="eatoship";
		if($v_ewallet=="EV")$wallet="voucher";
		if($v_ewallet=="HPV")$wallet="hpv";
		if(is_numeric($valus[0]) and is_numeric($valus[1])){
		$sql.="  and ".$dbprefix."member.".$wallet." >= ".$valus[0]." and ".$dbprefix."member.".$wallet." <= ".$valus[1]." ";
		}
}
if(!empty($_REQUEST['smdate2']) || !empty($_GET['emdate2'])){
	$sql .= " and ".$dbprefix."member.mdate BETWEEN '".$smdate2."' AND '".$emdate2."'";
}

if($mtype1!=""  ){
	if($mtype1 === '0' or $mtype1 == 'A'){
		$mtype1 = 'A';
		$sql .= " and ".$dbprefix."member.mtype1 = '0'";
	}else $sql .= " and ".$dbprefix."member.mtype1 = '$mtype1'";
} 

//echo $sql;
 
	if($_GET['state']==1){
		include("member_del.php");
	}else if($_GET['state']==2){
		include("member_editadd1.php");
	}else if($_GET['state']==3){
		include("member_reset.php");
	}else if($_GET['state']==4){
		include("member_suspend.php");
	}else if($_GET['state']==5){
		include("member_blacklist.php");
	}else if($_GET['state']==6){
		include("./comsn/com_a/rep_newpositon_show.php");
	}else if($_GET['state']==7){
		include("member_terminate.php");
	}else{
		
		box_member_search($s_mcode,$s_upa_code,$smdate2,$emdate2,$s_namef,$s_sp_code,$s_id_card,$s_ewallet,$s_poscur,$s_list,$mtype1,$s_status_terminate,$v_ewallet);
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		$rec->setLimitPage($s_list);
		/*
		if($_GET['excel']==1){
			$rec->setLimitPage('ALL');
		}else{
			$rec->setLimitPage('50');
		}
		*/
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=1&sub=2&s_mcode=$s_mcode&s_namef=$s_namef&s_id_card=$s_id_card&s_poscur=$s_poscur&s_poscur1=$s_poscur1&s_sp_code=$s_sp_code&s_upa_code=$s_upa_code&mtype1=$mtype1&s_status_terminate=$s_status_terminate&s_ewallet=$s_ewallet&s_list=$s_list&smdate2=$smdate2&emdate2=$emdate2&v_ewallet=$v_ewallet&s_ewallet=$s_ewallet");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("mcode,name_t,mcode,mdate,exp_date,pos_cur,upa_code,sp_code,ewallet,all_pv");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,กระเป๋าเงิน,คะแนนส่วนตัว");
		$rec->setShowField("mcode,name_t,mobile,id_card,mdate,pos_cur,pos_cur2,sp_code,status_doc,status_suspend,status_terminate1,ewallet,eatoship,voucher,hpv,mtype");
		$rec->setHLight("status_terminate",1,array("#FF7777","#FF9999"),"HIDE");

		$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,เบอร์โทร,รหัสประชาชน,วันที่สมัคร,ตำแหน่ง,ตำแหน่งเกียรติยศ,รหัสผู้แนะนำ,เอกสาร,Suspend,Terminate,EW,EA,EV,HPV,ประเภท");
		//$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
		$rec->setFieldAlign("center,left,center,center,center,center,center,center,center,center,center,right,right,right,right");
		//$rec->setFieldSpace("7%,11%,8%,7%,10%,7%,5%,5%,7%,5%,5%,5%,8%");
		$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,,,,,");
		$rec->setFieldFloatFormat(",,,,,,,,,,,2,2,2,2");
		$rec->setSum(true,false,",,,,,,,,,,,true,true,true,true");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		}
		//$rec->setSearch($dbprefix."member.mcode,".$dbprefix."member.name_t,".$dbprefix."member.mdate,exp_date,".$dbprefix."member.pos_cur,".$dbprefix."member.upa_code,".$dbprefix."member.sp_code,".$dbprefix."member.id_card,status_doc,status_suspend,status_blacklist,status_ato,cshort");
		//$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,รหัสประชาชน,เอกสาร,suspend,blacklist,Autoship,LB");
		if($acc->isAccess(2))
			$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
			
		if($_GET['excel']==1){
			logtext(true,$_SESSION["adminusercode"],'Export Excel : ข้อมูลสมาชิก','');
			$text="uid=".$_SESSION["adminusercode"]." action=member_export_excel =>$sql";
			writelogfile($text);

			$rec->exportXls("ExportXls","member".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","member".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","ดู");
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
			$rec->setSpecial("./images/true.gif","","sale_status","id","IMAGE","Reset Password");
	
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	}

 function box_member_search($s_mcode,$s_upa_code,$smdate2,$emdate2,$s_namef,$s_sp_code,$s_id_card,$s_ewallet,$s_poscur,$s_list,$mtype1,$terminate,$v_ewallet){
	global $arr_mtype1,$s_suspend,$s_poscur1;
	?><fieldset id="fieldset" style="    width: 92%;    margin: 0 auto;    border: 1px solid #BEBEBE;">
	<form style="margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px; text-align: center;" name="searh" id="searh" action="index.php?sessiontab=1&sub=2" method="post">
	  <table width="100%%" border="0">
	    <tr>
	      <td width="12%" align="right" scope="row">รหัสสมาชิก</td>
	      <td width="15%" align="left"><input type="text" name="s_mcode" id="s_mcode" value="<?=$s_mcode?>"></td>
	      <td align="right">&#3619;&#3627;&#3633;&#3626;&#3612;&#3641;&#3657;&#3649;&#3609;&#3632;&#3609;&#3635;</td>
	      <td align="left"><input type="text" name="s_sp_code" id="s_sp_code" value="<?=$s_sp_code?>"></td>
	      <td width="9%" align="right">วันที่สมัคร</td>
	      <td width="37%"><span style="float: left;">ตั้งแต่
	        <input value="<?=$smdate2?>" type="text" name="smdate2" id="dateInput1" placeholder="2014-06-01">
	        ถึง
  <input value="<?=$emdate2?>"  type="text" name="emdate2" id="dateInput2" placeholder="2014-06-05">
	        </span>&nbsp;</td>
        </tr>
	    <tr>
	      <td align="right">ชื่อ</td>
	      <td align="left"><input type="text" name="s_namef" id="s_namef" value="<?=$s_namef?>"></td>
	      <td align="right"><select name="v_ewallet">
           <option value="E" <?if($v_ewallet=='E')echo 'selected' ?>>Ewallet</option>
           <!--option value="EC" <?if($v_ewallet=='EC')echo 'selected' ?>>Ecom</option-->
           <option value="EA" <?if($v_ewallet=='EA')echo 'selected' ?>>Eautoship</option>
		   <option value="EV" <?if($v_ewallet=='EV')echo 'selected' ?>>Evoucher</option>
		   <option value="HPV" <?if($v_ewallet=='HPV')echo 'selected' ?>>Hold PV</option>
		   
          </select></td>
	      <td><input type="text" name="s_ewallet" id="s_ewallet" placeholder="&#3648;&#3594;&#3656;&#3609; 0-100" value="<?=$s_ewallet?>"></td>
	      <td align="right">จำนวนรายการ</td>
	      <td align="left"><select name="s_list" id="s_list">
	        <option value="50" <? if($s_list=='50'){echo 'selected';}?> >50</option>
	        <option value="100" <? if($s_list=='100'){echo 'selected';}?>>100</option>
	        <option value="200" <? if($s_list=='200'){echo 'selected';}?>>200</option>
	        <option value="300" <? if($s_list=='300'){echo 'selected';}?>>300</option>
	        <option value="400" <? if($s_list=='400'){echo 'selected';}?>>400</option>
	        <option value="500" <? if($s_list=='500'){echo 'selected';}?>>500</option>
	        <option value="99999999999999" <? if($s_list==99999999999999){echo 'selected';}?>>ทั้งหมด</option>
          </select></td>
        </tr>
	    <tr>
	      <td align="right">รหัสบัตรประชาชน</td>
	      <td><input type="text" name="s_id_card" id="s_id_card" value="<?=$s_id_card?>"></td>
	      <td align="right">Terminate</td>
	      <td align="left"><select name="s_terminate" id="s_terminate">
              <option value="0">&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</option>
              <option value="1" <? if($terminate==1){echo "selected";} ?>>terminate</option>
          </select></td>
	      <td align="right">ประเภทสมาชิก</td>
			<td>&nbsp;
			  <select name="mtype1">
			  <option value="" selected>ทั้งหมด</option>
					<?php
					if($mtype1<'0'){
							$mtype1=99;
					}
					foreach($arr_mtype1 as $key => $value):
					echo '<option value="'.$key.'"';
							if($mtype1==$key){echo "selected";}
					echo'>'.$value.'</option>'; //close your tags!!
					endforeach;
					?>
				</select></td>
        </tr>
	    <tr>
	      <td align="right">ตำแหน่ง</td>
	      <td>
				<select name="s_poscur" id="s_poscur" >
					<option value=''>เลือกตำแหน่ง</option> 
				<?
					$sqlx = "SELECT * FROM ali_position WHERE posid > 0 and posid < 10 ORDER BY posid ASC";
					$rsx = mysql_query($sqlx);
					if(mysql_num_rows($rsx) > 0){
						for($i=0;$i<mysql_num_rows($rsx);$i++){
							$obj = mysql_fetch_object($rsx);
							$posshort = $obj->posshort;
							$posname = $obj->posname;
							echo "<option value = '".$posshort."'";
							if($posshort == $s_poscur)echo " selected ";
							echo ">".$posname;
							echo "</option>";
						}
						
						
					}
				
				?>
				</select>
		  <td align="right">เกียรติยศ</td>
	      <td align="left">
			<select name="s_poscur1" id="s_poscur1" >
				<option value=''>เลือกเกียรติยศ</option> 
			<?
				$sqlx = "SELECT * FROM ali_position WHERE posid > 10 and posid < 57 ORDER BY posid ASC";
				$rsx = mysql_query($sqlx);
				if(mysql_num_rows($rsx) > 0){
					for($i=0;$i<mysql_num_rows($rsx);$i++){
						$obj = mysql_fetch_object($rsx);
						$posshort = $obj->posshort;
						$posname = $obj->posname;
						echo "<option value = '".$posshort."'";
						if($posshort == $s_poscur1)echo " selected ";
						echo ">".$posname;
						echo "</option>";
					}
					
					
				}
			
			?>
			</select>
		  
		  
		  
		  </td>
	      <td align="right">Suspend</td>
	      <td align="left"><select name="s_suspend" id="s_suspend">
              <option value="0">&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</option>
              <option value="1" <? if($s_suspend==1){echo "selected";} ?>>suspend</option>
          </select></td>
	      
        </tr>
	    <tr>
	      <td align="right" scope="row">&nbsp;</td>
	      <td align="left">&nbsp;</td>
	      <td align="right">&nbsp;</td>
	      <td align="right">&nbsp;</td>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
        </tr>
	    <tr>
	      <td colspan="6" align="center" scope="row"><input type="submit" value="   ค้นหา   ">   &nbsp;&nbsp;  <input type="reset" value="   ยกเลิก   "></td>
        </tr>
      </table>
 
  </form>
</fieldset>
<br/>
<?}?>