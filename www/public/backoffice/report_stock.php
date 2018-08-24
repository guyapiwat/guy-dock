<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>Snatur</title>
<link rel="stylesheet" type="text/css" href="./../style.css" />
<script language="javascript">
    function window.onbeforeprint(){
         var remove_el = document.all.remove;
         if(remove_el != '' && remove_el.length == null){
              remove_el.style.display='none';
         }
         else{
              for(i=0;i<remove_el.length;i++){
                   remove_el[i].style.display='none';
              }
         }
    }

    function window.onafterprint(){
    }
</script>
<? include("prefix.php");?>

<?
set_time_limit(0);
ini_set("memory_limit","2000M");
ob_start();

require("connectmysql.php");
require("gencode.php");
require("./cls/repGenerator.php");
$sql = "SELECT a.pcode,a.id,p.pdesc,a.qty,a.sa_type,a.inv_code,a.tdate,a.fdate,a.sano,i.inv_desc,p.unit from ".$dbprefix."product_invent_tmp a left join ".$dbprefix."product p on (a.pcode = p.pcode)
left join ".$dbprefix."invent i on (i.inv_code = a.inv_code) where a.qty <> '0'  ";
//echo $sql;
$rs = mysql_query($sql);
for($ddddd=0;$ddddd<mysql_num_rows($rs);$ddddd++){
	$showid = gencode_m($ddddd+1);
	$row = mysql_fetch_object($rs);
	$rcode =$row->rcode;
	$showrcode = gencode_3($rcode);
	$txtshow = $showrcode.'-'.$showid;
	$meminfo['tdate'] =$row->tdate;
	$meminfo['fdate'] =$row->fdate;
	$meminfo['qty'] =$row->qty;
	$meminfo['sano'] =$row->sano;
	$meminfo['mcode'] =$row->mcode;
	$meminfo['name_t'] =$row->name_t;
	$meminfo['inv_code'] =$row->inv_code;
	$meminfo['inv_desc'] =$row->inv_desc;
	$meminfo['pcode'] =$row->pcode;
	$meminfo['unit'] =$row->unit;
	$meminfo['pdesc'] =$row->pdesc;
	$meminfo['sa_type'] =$row->sa_type;
	$meminfo['pos_cur2'] =$row->pos_cur2;
	$meminfo['totalfast'] =number_format($row->totalfast,2,'.',',');
	$meminfo['totalweak'] =number_format($row->totalweak,2,'.',',');
	$meminfo['totalstrong'] =number_format($row->totalstrong,2,'.',',');
	$meminfo['totalmatching'] =number_format($row->totalmatching,2,'.',',');
	$meminfo['totalonetime'] =number_format($row->totalonetime,2,'.',',');
	$meminfo['totalpool'] =number_format($row->totalpool,2,'.',',');
	$meminfo['totalcar'] =number_format($row->totalcar,2,'.',',');
	$meminfo['totalrebate'] =number_format($row->totalrebate,2,'.',',');
	$meminfo['bonusss'] =number_format($row->bonusss,2,'.',',');
	$meminfo['payalltotal'] =number_format($row->payalltotal,2,'.',',');
	$meminfo['mcaptotal'] =number_format($row->mcaptotal,2,'.',',');
	$meminfo['amttotal'] =number_format($row->amttotal,2,'.',',');
	$meminfo['caddress'] =$row->caddress;
	$meminfo['provinceId'] = getprovince($row->cprovinceId);
	$meminfo['amphurId'] = getamphur($row->camphurId);
	$meminfo['districtId'] = getdistrict($row->cdistrictId);

	$sql = "SELECT DATE_FORMAT(fdate, '%d/%m/%Y') as fdate,DATE_FORMAT(tdate, '%d/%m/%Y') as tdate,DATE_FORMAT(paydate, '%d/%m/%Y') as paydate from ".$dbprefix."cround where rcode = '".$_GET["rcode"]."'";
	$rs123 = mysql_query($sql);
	$row123 = mysql_fetch_object($rs123);
	$meminfo['fdate'] =$row123->fdate;
	$meminfo['tdate'] =$row123->tdate;
	$meminfo['paydate'] =$row123->paydate;

	$sql = "SELECT * FROM ".$dbprefix."position1 where posshort = '".$meminfo['pos_cur2']."' ";
	$rs123 = mysql_query($sql);
	if(mysql_num_rows($rs123)>0){
		$row123 = mysql_fetch_object($rs123);
		$meminfo['pos_cur2'] =$row123->posname;
	}

	?>

	<table width ='1037'   height='300' align=center>
	<tr height=70>
		<td align=left colspan=4 valign=bottom><table width="100%"><tr>
		  <td width="78%">SUK <?=$meminfo['inv_code'].' '.$meminfo['inv_desc']?> </td>
		  <td width="22%">ตรวจสอบ PG <?=date("d-M-Y")?></td>
		</tr></table></td>
	</tr>
	
	<tr >
		<td align=right width=20% valign=bottom>Tag : </td>
		<td align=left width=21% valign=bottom> <?=$showid?></td>
		<td align=right width=37% valign=bottom>&nbsp;Printed : </td>
		<td align=left width=22% valign=bottom>&nbsp;<?=date("d-M-Y")?></td>
	</tr>
	<tr >
		<td align=right width=20% valign=bottom>Item : </td>
		<td align=left width=21% valign=bottom><?=$meminfo['pcode']?></td>
		<td align=right width=37% valign=bottom>&nbsp; </td>
		<td align=left width=22% valign=bottom>&nbsp; </td>
	</tr>
	<tr >
		<td align=right width=20% valign=bottom>Description : </td>
		<td align=left width=21% valign=bottom><?=$meminfo['pdesc']?></td>
		<td align=right width=37% valign=bottom>&nbsp; </td>
		<td align=left width=22% valign=bottom>&nbsp; </td>
	</tr>
	<tr >
		<td align=right width=20% valign=bottom>Primary OUM  : </td>
		<td align=left width=21% valign=bottom> <?=$meminfo['unit']?></td>
		<td align=right width=37% valign=bottom>&nbsp;  </td>
		<td align=left width=22% valign=bottom>&nbsp; </td>
	</tr>
	<tr >
		<td align=right width=20% valign=bottom>Revision : </td>
		<td align=left width=21% valign=bottom>&nbsp;</td>
		<td align=right width=37% valign=bottom>&nbsp; </td>
		<td align=left width=22% valign=bottom>&nbsp; </td>
	</tr>
	<tr >
		<td align=right width=20% valign=bottom>Subinventory : </td>
		<td align=left width=21% valign=bottom></td>
		<td align=right width=37% valign=bottom>&nbsp;&nbsp;Counted By  : </td>
		<td align=left width=22% valign=bottom>&nbsp;________________________________</td>
	</tr>
	<tr >
		<td align=right width=20% valign=bottom>Locator : </td>
		<td align=left width=21% valign=bottom></td>
		<td align=right width=37% valign=bottom>&nbsp;&nbsp;Count Date  : </td>
		<td align=left width=22% valign=bottom> &nbsp;________________________________</td>
	</tr>
	<tr >
		<td align=right width=20% valign=bottom>Lot Num  : </td>
		<td align=left width=21% valign=bottom>&nbsp;</td>
		<td align=right width=37% valign=bottom>&nbsp;&nbsp;Count UOM  : </td>
		<td align=left width=22% valign=bottom> &nbsp;________________________________</td>
	</tr>
	<tr >
		<td align=right width=20% valign=bottom>Serial Num  : </td>
		<td align=left width=21% valign=bottom>&nbsp;</td>
		<td align=right width=37% valign=bottom>&nbsp;&nbsp;Count Qty: </td>
		<td align=left width=22% valign=bottom>&nbsp;
	    <?=$meminfo['qty']?></td>
	</tr>
	
	</table>
<? } ?>
<?

     function getdistrict($mc){
     
     global $dbprefix;
        // connect to database 
        include_once "connectmysql.php";
        $sql="select * from district where districtId=".$mc." ";
        //echo "$sql<BR>";
        if ($mc==""){return "";}
        $result=mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_object($result);
            //echo $row->districtName;
            return $row->districtName;
        }else{
            return "";
        }
    }
    function getamphur($mc){
     
     global $dbprefix;
        // connect to database 
        include_once "connectmysql.php";
        $sql="select * from amphur where amphurId=".$mc." ";
        //echo "$sql<BR>";
        if ($mc==""){return "";}
        $result=mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_object($result);
            //echo $row->districtName;
            return $row->amphurName;
        }else{
            return "";
        }
    }
    
    function getprovince($mc){
     
     global $dbprefix;
        // connect to database 
        include_once "connectmysql.php";
        $sql="select * from province where provinceId=".$mc." ";
        //echo "$sql<BR>";
        if ($mc==""){return "";}
        $result=mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_object($result);
            //echo $row->districtName;
            return $row->provinceName;
        }else{
            return "";
        }
    }
    
	?>