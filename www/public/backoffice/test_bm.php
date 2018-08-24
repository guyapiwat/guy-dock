<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>
<?
exit;
del('ali_bm1'," fdate = '2017-02-01' ");    
$where = "sa_type <> 'H'  and cancel=0 and tot_pv != 0 and sadate >= '2017-02-01' ";
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







?>