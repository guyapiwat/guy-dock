<?

$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$sano = $_POST['sano']==""?$_GET['sano']:$_POST['sano'];
$sub = $_POST['sub']==""?$_GET['sub']:$_POST['sub'];
rpdialog_hold_balance($sub,$fdate,$tdate);
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
			$sql = "select CASE WHEN pcode IS NULL THEN CONCAT('<b>',hsano,'<b>') ELSE '' END  AS sano
			     ,CASE WHEN pcode IS NULL THEN CONCAT('<b>',mcode,'<b>') ELSE pcode END  AS pcode
				,CASE WHEN pcode IS NULL THEN CONCAT('<b>',name_t,'<b>') ELSE pdesc END  AS pdesc				
				,price
				,pv
				,qty
				from (SELECT asd.sano AS sano,asd.pcode AS pcode,asd.pdesc AS pdesc
				, SUM( asd.price *(asd.qty-IFNULL((SELECT SUM(hd.qty) as qty 
				FROM ali_holddesc hd  
				RIGHT JOIN ali_holdhead hh ON (hh.hono = hd.hono)
				WHERE hh.sano = asd.sano  and hd.pcode = asd.pcode 
				GROUP BY hd.pcode),0))) AS price
				, SUM( asd.pv *( asd.qty-IFNULL((SELECT SUM(hd.qty) as qty 
				FROM ali_holddesc hd 
				RIGHT JOIN ali_holdhead hh ON (hh.hono = hd.hono)
				WHERE hh.sano = asd.sano  and hd.pcode = asd.pcode 
				GROUP BY hd.pcode),0)) ) AS pv
				, SUM(asd.qty-IFNULL((SELECT SUM(hd.qty) as qty 
				FROM ali_holddesc hd 
				RIGHT JOIN ali_holdhead hh ON (hh.hono = hd.hono)
				WHERE hh.sano = asd.sano  and hd.pcode = asd.pcode 
				GROUP BY hd.pcode),0)) AS qty
				,ash.name_t  as name_t,ash.mcode  as mcode,ash.sano  as hsano
				FROM ali_asaled asd
				LEFT JOIN ali_asaleh ash ON ( ash.id = asd.sano )
				WHERE ash.hpv >0  and asd.pcode not like 'SE00%' and  ash.sa_type  = 'H' and ash.cancel=0 and asd.pcode <> '0004'";
			if($fmcode != '')$sql .= " AND ash.mcode = '".$fmcode."' ";
			if($sano  != '')$sql .= " AND ash.sano= '".$sano."' ";
			$sql .= " ";	
			$sql .= "GROUP BY asd.sano, asd.pcode
					WITH ROLLUP) r
					WHERE sano <> '' and price > 0  
				 ";  
//echo $sql;
	if($_GET['state']==1){
		include("sale_hcancel.php");
	}else if($_GET['state']==2){
		include("hold_editadd.php");
	}else if($_GET['state']==3){
		include("hold_editadd.php");
	}else{
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" hsano,ifnull(pcode,-99999) ":$_GET['ord']);
		$rec->setLimitPage('ALL');	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&sano=$sano&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$_GET['sessiontab']."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sano,pcode,pdesc,price,pv,qty");
		$rec->setFieldFloatFormat(",,,2,2,2");
		$rec->setFieldDesc("เลขที่,รหัสสมาชิก/สินค้า,ชื่อสมาชิก/สินค้า, ราคาคงเหลือ,PVคงเหลือ,จำนวนคงเหลือ");
		$rec->setFieldAlign("center,center,left,right,right,right,"); 

		if($_GET['excel']==1){
			logtext(true,$_SESSION["adminusercode"],'Export Excel : ยอดค้างแจง','');
			$text="uid=".$_SESSION["adminusercode"]." action=sale_hold_excel =>$sql";
			writelogfile($text);

			$rec->exportXls("ExportXls","sale_hold".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","sale_hold".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
	
		$rec->setSpace($str);

		$str = "<fieldset><a href='sale_hold_print_all.php' target='_blank'>";
		$str .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
	
		//$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>
<?function rpdialog_hold_balance($sub,$fdate,$tdate){ 
	global $fmcode,$sano;
?>

<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>"> 
	 
	 <table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>
	  <td align="right">เลขบิล &nbsp;</td>
		<td><input type="text" name="sano" id="sano"  value="<?=$sano?>" /></td>
	  
		<td align="right">รหัสสมาชิก&nbsp;</td>
		<td><input type="text" name="fmcode" id="fmcode" placeholder="0000001" value="<?=$fmcode?>" /></td>
		  
		
		<td>&nbsp; <input type="submit" name="Submit" value="ค้นหา"/></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>
<?
/*
select CASE WHEN pcode IS NULL THEN hsano ELSE '' END  AS mcode,ifnull(pcode,mcode) as pcode
,CASE WHEN pcode IS NULL THEN name_t ELSE pdesc END  AS pdesc
,price,pv,qty
from (SELECT ali_asaled.sano AS sano,ali_asaled.pcode AS pcode,ali_asaled.pdesc AS pdesc
, SUM( ali_asaled.price * ( ali_asaled.qty-IFNULL((SELECT SUM(hd.qty) as qty 
FROM ali_holddesc 
RIGHT JOIN ali_holdhead hh ON (hh.hono = hd.hono)
WHERE hh.sano = ali_asaled.sano  and hd.pcode = ali_asaled.pcode 
GROUP BY hd.pcode),0)) ) AS price
, SUM( ali_asaled.pv * ( ali_asaled.qty-IFNULL((SELECT SUM(hd.qty) as qty 
FROM ali_holddesc 
RIGHT JOIN ali_holdhead hh ON (hh.hono = hd.hono)
WHERE hh.sano = ali_asaled.sano  and hd.pcode = ali_asaled.pcode 
GROUP BY hd.pcode),0)) ) AS pv
, SUM(ali_asaled.qty-IFNULL((SELECT SUM(hd.qty) as qty 
FROM ali_holddesc 
RIGHT JOIN ali_holdhead hh ON (hh.hono = hd.hono)
WHERE hh.sano = ali_asaled.sano  and hd.pcode = ali_asaled.pcode 
GROUP BY hd.pcode),0)) AS qty
,ash.name_t  as name_t,ash.mcode  as mcode,ash.sano  as hsano
FROM ali_asaled
LEFT JOIN ali_asaleh ON ( ash.id = ali_asaled.sano )
WHERE ash.hpv >0 and  ash.sa_type  = 'H' and ash.hcancel=0  
GROUP BY ali_asaled.sano, ali_asaled.pcode
WITH ROLLUP) r
WHERE sano <> ''
order by sano,ifnull(pcode,-99999)*/



?>