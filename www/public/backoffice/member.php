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
if(confirm("��ͧ��� Reset Password")){
	window.location='index.php?sessiontab=1&sub=2&state=3&bid='+id;
}
}
</script>

<?
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

if(!empty($_GET['s_list'])){$s_list = $_GET['s_list'];}else {if(!empty($_POST['s_list'])){$s_list = $_POST['s_list'];}else{$s_list='500';}}

if(!empty($_GET['mtype1'])){$mtype1 = $_GET['mtype1'];}else{$mtype1 = $_POST['mtype1'];}

?>
<?if($_GET['state']==2){?>

<?}else {?>

<?}?>
<br/>
<?

require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}



$sql = "SELECT pos_cur2,hpv,mtype1,voucher,id,mcode,name_t,bunit,mobile,sv_code,id_card,mdate,pos_cur,pos_cur2,upa_code as upa_code,sp_code,ewallet,eatoship,ecom,CONCAT(".$dbprefix."member.name_f,' ',".$dbprefix."member.name_t) as name_t ";
$sql .= ",CASE status_doc WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_doc ";
$sql .= ",CASE mtype1 WHEN '0' THEN 'Member' WHEN '1' THEN 'Franchise'  WHEN '2' THEN 'Agency'  END AS mtype ";
$sql .= ",CASE lr WHEN '1' THEN '����' WHEN '2' THEN '���'  WHEN '3' THEN '���'  END AS statur_lr ";
$sql .= $sqlmtype;
$sql .= ",CASE status_terminate WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=7&aid=',id,'&mcode=',mcode,'&id=1\"><img src=\"./images/false.gif\"></a>') ";

$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=7&aid=',id,'&mcode=',mcode,'&id=0\"><img src=\"./images/true.gif\"></a>') END AS status_terminate1 ";


$sql .= ",CASE status_ato WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status_ato ";
$sql .= ",CASE status_suspend WHEN '0' THEN CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&aid=',id,'&mcode=',mcode,'&id=1\"><img src=\"./images/false.gif\"></a>') ";
$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=4&aid=',id,'&mcode=',mcode,'&id=\"><img src=\"./images/true.gif\"></a>') END AS status_suspend ";

$sql .= ",DATE_FORMAT(".$dbprefix."member.mdate, '%Y-%m-%d') as mdate FROM ".$dbprefix."member where 1=1 ";

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
	include("member_editadd.php");
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
	if(isset($page))$rec->setCurPage($page);

	$rec->setShowField("mcode,name_t,mobile,id_card,mdate,pos_cur,pos_cur2,sp_code,upa_code,statur_lr,status_doc,status_suspend,status_terminate1,ewallet,eatoship,voucher,hpv,mtype");
	$rec->setHLight("status_terminate",1,array("#FF7777","#FF9999"),"HIDE");

	$rec->setFieldDesc("������Ҫԡ,����,������,���ʻ�ЪҪ�,�ѹ�����Ѥ�,���˹�,���˹����õ���,���ʼ���й�,�����Ѿ�Ź�,��ҹ,�͡���,Suspend,Terminate,EW,EA,EV,HPV,������");
	$rec->setFieldAlign("center,left,center,center,center,center,center,center,center,center,center,center,center,right,right,right,right");
	//$rec->setFieldSpace("7%,11%,8%,7%,10%,7%,5%,5%,7%,5%,5%,5%,8%");
	$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,,,,,,");
	$rec->setFieldFloatFormat(",,,,,,,,,,,,,2,2,2,2");
	$rec->setSum(true,false,",,,,,,,,,,,,,true,true,true,true");
	if($acc->isAccess(4)){
		$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
	}
	if($acc->isAccess(2))
		$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
		
	if($_GET['excel']==1){
		logtext(true,$_SESSION["adminusercode"],'Export Excel : ��������Ҫԡ','');
		$text="uid=".$_SESSION["adminusercode"]." action=member_export_excel =>$sql";
		writelogfile($text);

		$rec->exportXls("ExportXls","member".date("Ymd").".xls","SH_QUERY");
		$str = "<fieldset><a href='".$rec->download("ExportXls","member".date("Ymd").".xls")."' >";
		$str .= "<img border='0' src='./images/download.gif'>��Ŵ Excel</a></fieldset>";
		//$rec->getParam();
		$rec->setSpace($str);
	}
	$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","��");
	$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
	$str .= "<img border='0' src='./images/excel.gif'>���ҧ Excel</a></fieldset>";
		$rec->setSpecial("./images/true.gif","","sale_status","id","IMAGE","Reset Password");

	$rec->setSpace($str);
	$rec->showRec(1,'SH_QUERY');
}

function box_member_search($s_mcode,$s_upa_code,$smdate2,$emdate2,$s_namef,$s_sp_code,$s_id_card,$s_ewallet,$s_poscur,$s_list,$mtype1,$terminate,$v_ewallet){
global $arr_mtype1,$s_suspend,$s_poscur1;
?><fieldset id="fieldset" style="    width: 92%;    margin: 0 auto;    border: 1px solid #BEBEBE;">
<form style="margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px; text-align: center;" name="searh" id="searh" action="index.php?sessiontab=1&sub=2" method="post">
  <table width="100%%" border="0">
	<tr>
	  <td width="12%" align="right" scope="row">������Ҫԡ</td>
	  <td width="15%" align="left"><input type="text" name="s_mcode" id="s_mcode" value="<?=$s_mcode?>"></td>
	  <td align="right">&#3619;&#3627;&#3633;&#3626;&#3612;&#3641;&#3657;&#3649;&#3609;&#3632;&#3609;&#3635;</td>
	  <td align="left"><input type="text" name="s_sp_code" id="s_sp_code" value="<?=$s_sp_code?>"></td>
	  <td width="9%" align="right">�ѹ�����Ѥ�</td>
	  <td width="37%"><span style="float: left;">�����
		<input value="<?=$smdate2?>" type="text" name="smdate2" id="dateInput1" placeholder="2014-06-01">
		�֧
<input value="<?=$emdate2?>"  type="text" name="emdate2" id="dateInput2" placeholder="2014-06-05">
		</span>&nbsp;</td>
	</tr>
	<tr>
	  <td align="right">����</td>
	  <td align="left"><input type="text" name="s_namef" id="s_namef" value="<?=$s_namef?>"></td>
	  <td align="right"><select name="v_ewallet">
	   <option value="E" <?if($v_ewallet=='E')echo 'selected' ?>>Ewallet</option>
	   <!--option value="EC" <?if($v_ewallet=='EC')echo 'selected' ?>>Ecom</option-->
	   <option value="EA" <?if($v_ewallet=='EA')echo 'selected' ?>>Eautoship</option>
	   <option value="EV" <?if($v_ewallet=='EV')echo 'selected' ?>>Evoucher</option>
	   <option value="HPV" <?if($v_ewallet=='HPV')echo 'selected' ?>>Hold PV</option>
	   
	  </select></td>
	  <td><input type="text" name="s_ewallet" id="s_ewallet" placeholder="&#3648;&#3594;&#3656;&#3609; 0-100" value="<?=$s_ewallet?>"></td>
	  <td align="right">�ӹǹ��¡��</td>
	  <td align="left"><select name="s_list" id="s_list">
		<option value="500" <? if($s_list=='500'){echo 'selected';}?> >500</option>
		<option value="1000" <? if($s_list=='1000'){echo 'selected';}?>>1000</option>
		<option value="2000" <? if($s_list=='2000'){echo 'selected';}?>>2000</option>
		<option value="5000" <? if($s_list=='5000'){echo 'selected';}?>>5000</option>
		<option value="99999999999999" <? if($s_list==99999999999999){echo 'selected';}?>>������</option>
	  </select></td>
	</tr>
	<tr>
	  <td align="right">���ʺѵû�ЪҪ�</td>
	  <td><input type="text" name="s_id_card" id="s_id_card" value="<?=$s_id_card?>"></td>
	  <td align="right">Terminate</td>
	  <td align="left"><select name="s_terminate" id="s_terminate">
		  <option value="0">&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</option>
		  <option value="1" <? if($terminate==1){echo "selected";} ?>>terminate</option>
	  </select></td>
	  <td align="right">��������Ҫԡ</td>
		<td>&nbsp;
		  <select name="mtype1">
		  <option value="" selected>������</option>
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
	  <td align="right">���˹�</td>
	  <td>
			<select name="s_poscur" id="s_poscur" >
				<option value=''>���͡���˹�</option> 
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
	  <td align="right">���õ���</td>
	  <td align="left">
		<select name="s_poscur1" id="s_poscur1" >
			<option value=''>���͡���õ���</option> 
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
	  <td colspan="6" align="center" scope="row"><input type="submit" value="   ����   ">   &nbsp;&nbsp;  <input type="reset" value="   ¡��ԡ   "></td>
	</tr>
  </table>

</form>
</fieldset>
<br/>
<?}?>