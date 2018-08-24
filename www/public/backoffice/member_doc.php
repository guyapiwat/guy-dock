
<script language="javascript">

	function download(img){
		var wlink = '../function/download.php?filename='+img;
		window.open(wlink);
	}
</script>
<? 
 
require("rpdialog.php");
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if (isset($_GET["typereport"])){$typereport=$_GET["typereport"];} else {$typereport="1";}

$sql = "SELECT 
		'".$linkx."' as linkx,
		pos_cur2,
		mtype1,
		voucher,
		id,
		mcode,
		birthday,
		name_t,
		mobile,
		sv_code,
		id_card,
		mdate,
		pos_cur,
		pos_cur2,
		upa_code,
		sp_code,
		national,
		ewallet,
		exp_date,
		eatoship,
		ecom,
		CONCAT(m.name_f,' ',m.name_t) as name_t ";	
$sql .= $sqlWhere_status_doc;
$sql .= $sqlWhere_lr;
$sql .= $sqlWhere_mtype;
$sql .= $sqlWhere_mtype_1;
$sql .= ",CASE WHEN cmp != '' THEN '' WHEN id_card_img != '' THEN concat('<img src=./images/download.gif onclick=download(&apos;',id_card_img,'&apos;);onmouseout=this.height+=5 style=cursor:pointer height=24>')  ELSE '' END as id_card_img ";
$sql .= ",CASE  WHEN  cmp2 != '' THEN '' WHEN acc_no_img != '' THEN concat('<img src=./images/download.gif onclick=download(&apos;',acc_no_img,'&apos;);onmouseout=this.height+=5 style=cursor:pointer height=24>') ELSE '' END as acc_no_img ";
$sql .= ",DATE_FORMAT(m.mdate, '%Y-%m-%d') as mdate FROM ".$dbprefix."member as m where 1=1 ";

$sql .=" and ((id_card_img !='' and cmp = '') or (acc_no_img != '' and cmp2 = '')) ";

//echo $sql;
 if($_GET['state']==2){
	include("member_editadd.php");
}else{
	
	$array_show = array(  
		'mcode',
		'name_t',
		'mobile',
		'id_card_img',
		'acc_no_img',
	); 
	

	$array_option = array( 
		'mcode' 			=> array ("รหัสสมาชิก",'center','10%','',''),
		'name_t' 			=> array ("ชื่อ",'left','20%','',''),
		'mobile'			=> array ("เบอร์โทร",'center','10%','',''),
		'id_card_img' 		=> array ($wording_lan["word"]["copy_card"],'center','25%','',''), 
		'acc_no_img' 		=> array ($wording_lan["word"]["copy_acc"],'center','25%','','')
	);

	foreach($array_show as $key => $val):
		$setShowField .=$val.",";
		$setFieldDesc .=$array_option[$val][0].",";
		$setFieldAlign .=$array_option[$val][1].",";
		$setFieldSpace .=$array_option[$val][2].",";
		$setFloatFormat .=$array_option[$val][3].",";
		$setsetSum .=$array_option[$val][4].",";
	endforeach;
	
	//if($typereport == '1')box_member_search($data,$typereport);
	//else if($typereport == '2')rpdialog_mem_loaddoc($data);

	$rec = new repGenerator();
	$rec->setQuery($sql);
	$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
	$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
	$rec->setLimitPage($s_list);
	
	if(isset($_POST['skey']))$rec->setCause($_POST['skey'],$_POST['scause']);
	else if(isset($_GET['skey']))$rec->setCause($_GET['skey'],$_GET['scause']);
	
	$rec->setSize("100%","");
	$rec->setAlign("center");
	$rec->setPageLinkAlign("right");
	if(isset($page))$rec->setCurPage($page);

	$rec->setLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."$linkx"); 
	$rec->setBackLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]."");			   
	$rec->setShowField(substr($setShowField, 0, -1));
	$rec->setFieldDesc(substr($setFieldDesc, 0, -1));
	//$rec->setFieldSpace(substr($setFieldSpace, 0, -1));
	$rec->setFieldAlign(substr($setFieldAlign, 0, -1)); 
	$rec->setFieldFloatFormat(substr($setFloatFormat, 0, -1));  
	$rec->setSum(true,false,substr($setsetSum, 0, -1));
	$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,,,,,,");
	
	$rec->setSearch("mcode,name_t,mobile");
	$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,เบอร์โทร");

	$rec->setHLight("status_terminate",1,array("#FF7777","#FF9999"),"HIDE");

	$rec->setEdit("index.php","id","id","sessiontab=1&sub=101");

	if($_GET['excel']==1){
		logtext(true,$_SESSION["adminusercode"],'Export Excel : ข้อมูลสมาชิก','');
		$text="uid=".$_SESSION["adminusercode"]." action=member_export_excel =>$sql";
		writelogfile($text);
		$rec->exportXls("ExportXls","member.xls","SH_QUERY");
	}
	$str = "<a class='btn btn-app btn-purple btn-xs radius-4 width-auto' ";
	$str .= "href='".$rec->getParam()."&excel=1' target='_self'>";
	$str .= "<i class='ace-icon fa fa-file-excel-o fa-lg'></i> ".$wording_lan['excel']['creat']."</a>";
	$rec->setSpace($str);
	
	$rec->showRec(1,'SH_QUERY');
}