<script language="javascript" type="text/javascript">
    function adjust(id,mcode,rcode,fdate,tdate,paydate){
        if(confirm("��ͧ��� Adjust")){
			//alert(id+" "+mcode+" "+rcode+" "+fdate+" "+tdate+" "+paydate);
			var wlink = 'index.php?sessiontab=4&sub=2008&state=2&mcode='+mcode+'&fdate='+fdate+'&tdate='+tdate+'&rcode='+rcode+'&bid='+id+'&paydate='+paydate;
            window.location=wlink;    
        }
    } 
</script>
<?
include("rpdialog.php");
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$type_report = $_POST['type_report']==""?$_GET['type_report']:$_POST['type_report'];
$type_report1 = $_POST['type_report1']==""?$_GET['type_report1']:$_POST['type_report1'];
$bonus = $_POST['bonus']==""?$_GET['bonus']:$_POST['bonus'];
$bank= $_POST['bankcode']==""?$_GET['bankcode']:$_POST['bankcode'];


if (strpos($bonus,"-")===false){
		$arr_bonus[0]=$bonus;
		$arr_bonus[1]=$bonus;
}else{
	$arr_bonus = explode('-',$bonus);
}

if($arr_bonus[0] > $arr_bonus[1]){ 
  echo "<center><FONT COLOR=#ff0000>��سҡ�͡��ǧ���������١ �� 0-500</FONT></center>";
}

if($fdate!=""){
	$sql="select min(rcode) as fdate1,max(rcode) as tdate1 from ".$dbprefix."bround a where a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$ftrc2[0]=$row["fdate1"];
		$ftrc2[1]=$row["tdate1"];	
	}
}

$ftrcode = $_POST['ftrcode']==""?$_GET['ftrcode']:$_POST['ftrcode'];
$ftrcode2 = $_POST['ftrcode2']==""?$_GET['ftrcode2']:$_POST['ftrcode2'];
$vip = $_POST['vip']==""?$_GET['vip']:$_POST['vip'];
if (strpos($ftrcode,"-")===false){
		//�ͺ������� == �ͺ����ش
		$ftrc[0]=$ftrcode;
		$ftrc[1]=$ftrcode;
}else{
	$ftrc = explode('-',$ftrcode);
}
/*if($ftrcode!=""){
	$sql="select fdate,tdate from ".$dbprefix."around a where a.rcode ='$ftrcode' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$fdate=$fdate11=$row["fdate"];
		$tdate=$tdate11=$row["tdate"];	
	}
}*/
//rpdialog_alls_pay($_GET['sub'],$fdate,$tdate);


rpdialog_alls_pay_bank($_GET['sub'],$fdate,$tdate);
require("connectmysql.php");
$wwhere = ($fdate[0]=="" ? " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' " : " a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ");
$wwhere1 = " a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";

if($fdate != '' and  ($type_report1 == 1 or $type_report1 == '') ){
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($_GET['state']==1){
		include("comsn/com_c/rep_change.php");
		}
		$sql = "SELECT *,@num := @num + 1 b FROM (SELECT a.fdate,a.tdate,a.paydate,a.dmbonus,a.embonus,a.com_transfer_chagre,(a.total+a.pv) as thiscom,a.bankcode";
		$sql .= ",a.id,a.rcode,a.mcode,m.name_t,a.pv,a.pvb,a.total,a.tot_tax as tax ";
		$sql .= ",CASE a.status WHEN '1' THEN '����' WHEN '0' THEN '������'  END AS status
		,m.cmp,m.cmp2,b.bankname,m.acc_name,m.acc_no,m.branch,m.mobile
		";
		$sql .= ",a.tot_tax AS tax_new ";
		$sql .= ",CASE a.status WHEN '1' THEN (a.total+a.pv)-a.tot_tax WHEN '0' THEN '0'  END AS total_real ";
		$sql .= ",CASE a.status WHEN '1' THEN ((a.total+a.pv)-a.tot_tax)-a.com_transfer_chagre WHEN '0' THEN '0'  END AS ttttt ";
		$sql .= ",CONCAT(m.address,' �.',m.districtId,' �.',m.amphurId,' �.',m.provinceId,' ',m.zip) as address1,m.id_card ";
		$sql .= "FROM ".$dbprefix."cmbonus_b a ";
 
		//if($type_report == '2' or $type_report == '3' or $type_report == '4' or $type_report == '5')
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON (b.bankcode=m.bankcode)";

		$sql .= " WHERE $wwhere ";
		if($bank !=''){$sql.="and m.bankcode='$bank'";}
		if($fmcode != '' )$sql .= " and m.mcode = '".$fmcode."'";
		if($_POST['bonus'] != '' )$sql .= " and a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
		if($type_report == 1 )$sql .= " ";
		if($type_report == 2 )$sql .= " and m.mtype2 = '1' ";
		if($type_report == 3 )$sql .= " and m.bankcode = '52'";
		if($type_report == 4 )$sql .= " and m.bankcode != '52'";
		if($type_report == 5 )$sql .= " and m.bankcode != '52' and m.mtype2 != '1' ";
 		if($type_report1 == 1 )$sql .= " and a.status = '1' ";
		if($type_report1 == 2 )$sql .= " and a.status = '0' ";


		$sql .= " ) as ddd,(SELECT @num := 0) d where 1=1 " ;

	//echo "SQL : $sql <BR>";
		//$rec = new repGenerator_cm();
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"ddd.rcode":$_GET['ord']));
		if($_GET['excel']==1){$rec->setLimitPage("ALL");}
		else{$rec->setLimitPage("1000");}
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report&type_report1=$type_report1&bankcode=$bank");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		
		$rec->setShowField("b,rcode,fdate,tdate,paydate,mcode,id_card,name_t,pv,dmbonus,embonus,thiscom,tax_new,com_transfer_chagre,ttttt,address1,cmp,cmp2,bankname,acc_name,acc_no,branch,mobile,status");
		$rec->setFieldDesc("�ӴѺ,�ͺ,�����,����ش,�ѹ������,�����Ҫԡ,�ѵû�ЪҪ�,����,�ʹ¡��,Matching,AllSale,���⺹��,��������,����͹,⺹�ʨ��¨�ԧ,�������,���Һѵû�ЪҪ�,���Һѭ�ո�Ҥ��,��Ҥ��,����-�ѭ��,�Ţ�ѭ��,�Ң�,����Դ���,status");
		$rec->setFieldAlign("center,center,center,center,center,center,center,left,right,right,right,right,right,right,right,left,center,center,left,center");
	//	$rec->setFieldSpace("10%,10%,10%,30%,5%,7%,7%,7%,7%,10%");//10
		$rec->setSum(true,false,",,,,,,,true,true,true,true,true,true,true,true");
		$rec->setFieldFloatFormat(",,,,,,,,2,2,2,2,2,2,2");
		
	//	$rec->setFieldLink(",,,,,,,,index.php?sessiontab=4&sub=8&fdate=$fdate&tdate=$strtdate,index.php?sessiontab=4&sub=9&fdate=$fdate&tdate=$strtdate,,,,,,,,,,,,");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
	
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","pay_or_not_pay".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","pay_or_not_pay".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>��Ŵ Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>���ҧ Excel</a></fieldset>";
		
		//$rec->setSpecial("adjust","","adjust","xid,mcode,rcode,fdate,tdate,paydate","TEXT","adjust"); // adjust
		
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
	
	else if($fdate != '' and  $type_report1 == 2 ){
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($_GET['state']==1){
		include("comsn/com_c/rep_change.php");
		}
		$sql = "SELECT *,@num := @num + 1 b FROM (SELECT a.pvh,a.fdate,a.tdate,a.paydate,a.dmbonus,a.embonus,(a.total+a.pv) as thiscom,a.bankcode";
		$sql .= ",a.id,a.rcode,a.mcode,m.name_t,a.pv,a.pvb,a.total,a.tot_tax as tax,m.id_card  ";
		$sql .= ",CASE a.status WHEN '1' THEN '����' WHEN '0' THEN '������'  END AS status
		,b.bankname,m.acc_name,m.branch,m.mobile
		";
		$sql .= ",CASE a.status WHEN '1' THEN (a.total+a.pv)-a.tot_tax ELSE '0'  END AS total_real ";
		$sql .= ",CASE a.status WHEN '1' THEN ((a.total+a.pv)-a.tot_tax)-a.com_transfer_chagre ELSE '0'  END AS ttttt ";	
		$sql .= ",CASE m.cmp WHEN '�ú' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS cmp ";
        $sql .= ",CASE m.cmp2 WHEN '�ú' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS cmp2 ";
        $sql .= ",CASE m.acc_no WHEN '' THEN '<img src=./images/false.gif>' ELSE  m.acc_no  END AS acc_no "; 
		$sql .= ",CONCAT(m.address,' �.',m.districtId,' �.',m.amphurId,' �.',m.provinceId,' ',m.zip) as address1 ";
		$sql .= "FROM ".$dbprefix."cmbonus_b a ";
 
		//if($type_report == '2' or $type_report == '3' or $type_report == '4' or $type_report == '5')
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON (b.bankcode=m.bankcode)";

		$sql .= " WHERE $wwhere ";
		if($bank !=''){$sql.="and m.bankcode='$bank'";}
		if($fmcode != '' )$sql .= " and a.mcode = '".$fmcode."'";
		if($_POST['bonus'] != '' )$sql .= " and a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
		if($type_report == 1 )$sql .= " ";
		if($type_report == 2 )$sql .= " and m.mtype2 = '1' ";
		if($type_report == 3 )$sql .= " and m.bankcode = '52'";
		if($type_report == 4 )$sql .= " and m.bankcode != '52'";
		if($type_report == 5 )$sql .= " and m.bankcode != '52' and m.mtype2 != '1' ";
 		if($type_report1 == 1 )$sql .= " and a.status = '1' ";
		if($type_report1 == 2 )$sql .= " and a.status = '0' ";

		$sql .= " ) as ddd,(SELECT @num := 0) d where 1=1 " ;
		
	//	echo "SQL : $sql <BR>";
		//$rec = new repGenerator_cm();
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"ddd.rcode":$_GET['ord']));
		if($_GET['excel']==1){$rec->setLimitPage("ALL");}
		else{$rec->setLimitPage("100");}
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report&type_report1=$type_report1&bankcode=$bank");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		
		  
        $rec->setShowField("b,rcode,fdate,mcode,id_card,name_t,dmbonus,embonus,total,pvh,address1,cmp,cmp2,acc_no,mobile,status");
        $rec->setFieldDesc("�ӴѺ,�ͺ,�����,�����Ҫԡ,�ѵû�ЪҪ�,����,Matching,AllSale,⺹��,�ʹ¡�,�������,���Һѵû�ЪҪ�,���Һѭ�ո�Ҥ��,�Ţ�ѭ��,����Դ���,status");
        $rec->setFieldAlign("center,center,center,center,center,left,right,right,right,right,left,center,center,center,center,center,center,center");
       // $rec->setFieldSpace("3%,3%,8%,8%,8%,10%,7%,7%,7%,7%,15%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%");//10
		$rec->setSum(true,false,",,,,,,true,true,true ");
		$rec->setFieldFloatFormat(",,,,,,2,2,2");
		

		
		/*$rec->setShowField("rcode,mcode,name_t,pv,fob,cycle,total,status");
		$rec->setFieldDesc("�ͺ,����,����,�ʹ¡��,����й�,Balance<br>Team,�ʹ�������,ʶҹ�");
		$rec->setFieldAlign("center,center,left,right,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("3%,5%,40%,10%,10%,10%,10%,10%,10%,10%,10%");//10
		$rec->setSum(true,false,",,,true,true,true,true,,");
		$rec->setFieldFloatFormat(",,,2,2,2,2,");
		*///$rec->setFieldLink(",,,index.php?sessiontab=4&sub=28&none=0,,"); 
	//	$rec->setFieldLink(",,,,,,index.php?sessiontab=4&sub=8&fdate=$fdate&tdate=$strtdate,index.php?sessiontab=4&sub=9&fdate=$fdate&tdate=$strtdate,,,,,,,,,,,,");
		if($acc->isAccess(4)){
		//	$rec->setDel("index.php","id","id","sessiontab=4&sub=28"); 
		//	$rec->setFromDelAttr("maindel","./index.php?sessiontab=4&sub=28&state=1&ftrcode=$ftrcode&fmcode=$fmcode","post","delfield");
		}
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
	//	$rec->setSearch("a.mcode,a.status"); 
	//	$rec->setSearchDesc("����, ���� : 1   |   ������  :  0");
	
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","pay_or_not_pay".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","pay_or_not_pay".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>��Ŵ Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>���ҧ Excel</a></fieldset>";
		
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
		
		
	}
 
?>