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
if(!empty($_GET['s_mcode'])){$s_mcode = $_GET['s_mcode'];}else{$s_mcode = $_POST['s_mcode'];}

if(!empty($_GET['s_namef'])){$s_namef = $_GET['s_namef'];}else{$s_namef = $_POST['s_namef'];}

if(!empty($_GET['s_id_card'])){$s_id_card = $_GET['s_id_card'];}else{$s_id_card = $_POST['s_id_card'];}

if(!empty($_GET['s_poscur'])){$s_poscur = $_GET['s_poscur'];}else{$s_poscur = $_POST['s_poscur'];}

if(!empty($_GET['s_upa_code'])){$s_upa_code = $_GET['s_upa_code'];}else{$s_upa_code = $_POST['s_upa_code'];}

if(!empty($_GET['s_sp_code'])){$s_sp_code = $_GET['s_sp_code'];}else{$s_sp_code = $_POST['s_sp_code'];}

if(!empty($_GET['s_terminate'])){$s_status_terminate = $_GET['s_terminate'];}else{$s_status_terminate = $_POST['s_terminate'];}

if(!empty($_GET['s_ewallet'])){$s_ewallet = $_GET['s_ewallet'];}else{$s_ewallet = $_POST['s_ewallet'];}

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
 
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}



$sql = "SELECT ".$dbprefix."ewallet_month.date,".$dbprefix."member.mcode,".$dbprefix."ewallet_month.ewallet,CONCAT(".$dbprefix."member.name_f,' ',".$dbprefix."member.name_t) as name_t ";
 

$sql .= ",DATE_FORMAT(".$dbprefix."member.mdate, '%d-%m-%Y') as mdate ";

$sql .="FROM ".$dbprefix."member ";
$sql .="LEFT JOIN ".$dbprefix."ewallet_month ON (".$dbprefix."member.mcode=".$dbprefix."ewallet_month.mcode)";
$sql .=" where ".$dbprefix."ewallet_month.ewallet>0 ";
 
 
if(!empty($_REQUEST['s_mcode']) || !empty($_GET['s_mcode'])){
	$sql .= " and ".$dbprefix."member.mcode LIKE '%$s_mcode%'";
}
 

 

 
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

		box_member_search($s_mcode,$s_upa_code,$smdate2,$emdate2,$s_namef,$s_sp_code,$s_id_card,$s_ewallet,$s_poscur,$s_list,$mtype1);
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" mcode ":$_GET['ord']);
		$rec->setLimitPage($s_list);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=1313&s_mcode=$s_mcode&s_namef=$s_namef&s_id_card=$s_id_card&s_poscur=$s_poscur&s_sp_code=$s_sp_code&s_upa_code=$s_upa_code&s_status_terminate=$s_status_terminate&s_ewallet=$s_ewallet&s_list=$s_list&smdate2=$smdate2&emdate2=$emdate2");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("mcode,name_t,mcode,mdate,exp_date,pos_cur,upa_code,sp_code,ewallet,all_pv");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,กระเป๋าเงิน,คะแนนส่วนตัว");
		$rec->setShowField("mcode,name_t,date,ewallet");
		$rec->setHLight("status_terminate",1,array("#FF7777","#FF9999"),"HIDE");

		$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่,ewallet");
		//$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
		$rec->setFieldAlign("center,left,center,center,center,center,center,center,center,center,center,center,center,center,center,right,right,center");
		$rec->setFieldSpace("6%,20%,10%,8%,8%,6%,6%,6%,6%,6%,6%,6%,6%,6%,6%,6%,6%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=5&cmc=,,,,,index.php?sessiontab=1&sub=2&state=6&rr,");
		$rec->setFieldFloatFormat(",,,,,,,,,,,,,,,,2");
		if($acc->isAccess(4)){
			//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
			//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		}
		//$rec->setSearch($dbprefix."member.mcode,".$dbprefix."member.name_t,".$dbprefix."member.mdate,exp_date,".$dbprefix."member.pos_cur,".$dbprefix."member.upa_code,".$dbprefix."member.sp_code,".$dbprefix."member.id_card,status_doc,status_suspend,status_blacklist,status_ato,cshort");
		//$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,รหัสประชาชน,เอกสาร,suspend,blacklist,Autoship,LB");
		if($acc->isAccess(2))
			//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
			
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
		//$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","ดู");
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
			//$rec->setSpecial("./images/true.gif","","sale_status","id","IMAGE","Reset Password");
	
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	}

 function box_member_search($s_mcode,$s_upa_code,$smdate2,$emdate2,$s_namef,$s_sp_code,$s_id_card,$s_ewallet,$s_poscur,$s_list,$mtype1){
	global $arr_mtype1;
	?><fieldset id="fieldset" style="    width: 92%;    margin: 0 auto;    border: 1px solid #BEBEBE;">
	<form style="margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px; text-align: center;" name="searh" id="searh" action="index.php?sessiontab=3&sub=1313" method="post">
	  <table width="56%" border="0">
	    <tr>
	      <td width="11%" align="right" scope="row">รหัสสมาชิก</td>
	      <td width="21%" align="left"><input type="text" name="s_mcode" id="s_mcode" value="<?=$s_mcode?>"></td>
	      <td width="18%" align="right">จำนวนรายการ</td>
	      <td width="15%" align="left"><select name="s_list" id="s_list">
	        <option value="50" <? if($s_list=='50'){echo 'selected';}?> >50</option>
	        <option value="100" <? if($s_list=='100'){echo 'selected';}?>>100</option>
	        <option value="200" <? if($s_list=='200'){echo 'selected';}?>>200</option>
	        <option value="300" <? if($s_list=='300'){echo 'selected';}?>>300</option>
	        <option value="400" <? if($s_list=='400'){echo 'selected';}?>>400</option>
	        <option value="500" <? if($s_list=='500'){echo 'selected';}?>>500</option>
	        <option value="99999999999999" <? if($s_list==99999999999999){echo 'selected';}?>>ทั้งหมด</option>
	        </select></td>
	      <td width="35%" align="right"><input type="submit" value="   ค้นหา   ">
  &nbsp;&nbsp;
  <input type="reset" value="   ยกเลิก   "></td>
        </tr>
      </table>
 
  </form>
</fieldset>
<br/>
<?}?>