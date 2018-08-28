<?
$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$inv = $_POST['inv']==""?$_GET['inv']:$_POST['inv'];
$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];

rpdialog_sale_ewallet_approve($_GET['sub'],$fdate,$tdate,$sale);
?>
<script language="javascript" type="text/javascript">
	function changeApproved(id,approved_status,cancel_status){
		if(approved_status == 0 && cancel_status == 0){
			if(confirm("คุณต้องการอนุมัติการเติมเงิน Ewallet ?")){
				window.location='index.php?sessiontab=6&sub=201&state=1&bid='+id+'&status=approved';
			}
		}
		else if(approved_status == 1){
			alert("รายการนี้ได้ทำการอนุมัติไปแล้วค่ะ");
		}
		else if(cancel_status == 1){
			alert("รายการนี้ได้ทำการยกเลิกไปแล้วค่ะ");
		}
	}
	function changeCancel(id,approved_status,cancel_status){
		if(cancel_status == 0 && approved_status == 0){
			if(confirm("คุณต้องการยกเลิกรายการเติมเงิน Ewallet ?")){
				window.location='index.php?sessiontab=6&sub=201&state=1&bid='+id+'&status=cancel';
			}
		}
		else if(cancel_status == 1){
			alert("รายการนี้ได้ทำการยกเลิกไปแล้วค่ะ");
		}
		else if(approved_status == 1){
			alert("รายการนี้ได้ทำการอนุมัติไปแล้วค่ะ");
		}
	}
	function slipLook(img){
		var path_ = "http://203.146.170.60/~bunny/member/pay_images_temp/"+img;
		window.open(path_);
	}
</script>
<?

require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
	
	$sql = "SELECT trm.id,trm.mcode,m.name_t,trm.sadate,trm.sctime,trm.total,p.pay_desc,trm.cancel_status,trm.approved_status,trm.img_pay FROM ali_transfer_ewallet_confirm trm ";
	$sql .= "LEFT JOIN ali_payment_type p ON(trm.pay_type=p.id and p.payment_id='0') ";
	$sql .= "LEFT JOIN ali_member m ON(trm.mcode=m.mcode) ";
	$sql .= "WHERE approved_status='0' "; 
	if(!empty($sale)){
		if($sale == "A"){$sql .= "and trm.cancel_status = '0' ";}
		else{$sql .= "and trm.cancel_status = '".$sale."' ";}
	}
	//echo $sql;
	if($_GET['state']==1){
		include("ewallet_change_operate.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" trm.id ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale&bills=$bills");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);                      
        $rec->setShowField("mcode,name_t,pay_desc,sadate,sctime,total");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อสมาชิก,ชื่อบัญชีธนาคาร,วัน/เดือน/ปี,เวลา,จำนวนเงิน");  
        $rec->setFieldFloatFormat(",,,,,2");  
		$rec->setSum(true,false,",,,,,true"); 
        
        $rec->setFieldAlign("center,left,left,center,center,right");
        $rec->setFieldSpace("10%,30%,15%,15%,15%,10%");    
		$rec->setSpecial("./images/search.gif","","slipLook","img_pay","IMAGE",$wording_lan["Bill_view"]);
		if($acc->isAccess(2)){
			$rec->setSpecial("./images/true.gif","","changeApproved","id,approved_status,cancel_status","IMAGE",$wording_lan["Bill_approved"]);
		}
        if($acc->isAccess(4)){
			$rec->setSpecial("./images/cancel.gif","","changeCancel","id,approved_status,cancel_status","IMAGE",$wording_lan["Bill_cancle"]);
		}
        $rec->setHLight("cancel_status",1,array("#FF7777","#FF9999"),"HIDE");             
        $rec->showRec(1,'SH_QUERY'); 
	}

?>


