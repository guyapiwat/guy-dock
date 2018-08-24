<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>

<?
include("comsn/com_a/comsn_a_calc_func.php");

//del("ali_status","mcode = 'xxxxxxx' ");
$dbprefix = "ali_";
$ro = "0";



$dl_pro = check_downline($dbprefix,$ro,'TH2396261','PRO');


echo '<pre>'; print_r($dl_pro); echo '</pre>';




exit;

func_status('ali_','xxxxxxx','700',date("Y-m-d"),'MB','7777');    

exit;
mysql_query("TRUNCATE TABLE ali_status");
/*
$sql="SELECT* FROM ali_member";
$result = mysql_query($sql) or die(mysql_error());
   for($i=0;$i<mysql_num_rows($result);$i++){
    $obj = mysql_fetch_object($result);
    $mcode=$obj->mcode;
    $sadate=$obj->mdate;

   // func_first_register($mcode,$sadate);
    echo $mcode." ====>".$sadate;
   }
*/
 //exit;
del('ali_status','1=1');
func_third('ali_');


 
function func_first($dbprefix){
    $sql = "SELECT mcode,mdate FROM ".$dbprefix."member WHERE 1=1 ";
   // $sql .= " and mcode = '0006283' ";   
    $rs = mysql_query($sql);
    for($m=0;$m<mysql_num_rows($rs);$m++){
        $sqlObj = mysql_fetch_object($rs);
        $mcode =$sqlObj->mcode;        
        $mdatex = $sqlObj->mdate;
        $pos_cur = 'MB';
       
        func_first_register($mcode,$mdatex);  
    }
}
        
//mysql_query($sql2) or die(mysql_error());

function func_second($dbprefix){
    $where = "sa_type = 'B' and cancel = 0 and tot_pv > 0  ";
    $sql  = " SELECT mcode,SUM(tot_pv) as tot_pv,sadate FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT mcode,SUM(tot_pv) as tot_pv,sadate  FROM ali_asaleh ";
    $sql .= "    WHERE ".$where." GROUP BY YEAR(sadate), MONTH(sadate),mcode ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT mcode,SUM(tot_pv) as tot_pv,sadate  FROM ali_holdhead ";
    $sql .= "    WHERE ".$where." GROUP BY YEAR(sadate), MONTH(sadate),mcode ";
    $sql .= " ) as tb ";
    $sql .= " GROUP BY YEAR(sadate), MONTH(sadate),mcode ";
    $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    $arr = array();
   // echo $sql."<br>"; exit;
    if(mysql_num_rows($rs) > 0)
    {
        for($i=0;$i<$num;$i++)
        {
            $row = mysql_fetch_object($rs);
            $mcode = $row->mcode;
            $tot_pv = $row->tot_pv;    
            $mcode = $row->mcode;
            $sadate = $row->sadate;    
            $data =  get_detail_meber($mcode,$sadate);
            //func_status_B('ali_',$mcode,$tot_pv,$sadate,$data['pos_cur']); 
        }
        
    }
} 
  
 function func_third($dbprefix){  
    global $sano;
    $where = "sa_type = 'A'  and cancel=0 and total >= 3000  ";
    $sql = " SELECT mcode,tot_pv as tot_pv,sadate,sano,sctime FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT mcode,total as tot_pv,sadate,sano,sctime  FROM ali_asaleh ";
    $sql .= "    WHERE ".$where."  ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT mcode,total as tot_pv,sadate,hono as sano,sctime  FROM ali_holdhead ";
    $sql .= "    WHERE ".$where." ";
    $sql .= " ) as tb ";    
    $sql .= " ORDER BY sctime ASC ";    
    $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    echo $sql,'<br>';
    if(mysql_num_rows($rs) > 0)
    {
        for($i=0;$i<$num;$i++)
        {
            $row = mysql_fetch_object($rs);
            $mcode = $row->mcode;
            $tot_pv = $row->tot_pv;    
            $mcode = $row->mcode; 
            $sano = $row->sano;        
            $sadate = $row->sadate;    
            $data =  get_detail_meber($mcode,$sadate);
            func_status('ali_',$mcode,$tot_pv,$sadate,$data['pos_cur']);    
        }

    }

 }

function func_thirdz($dbprefix){  
    global $sano;
    $where = "sa_type = 'Z'  and cancel=0 and tot_pv > 0  ";
    $sql = " SELECT mcode,tot_pv as tot_pv,sadate,sano FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT mcode,tot_pv as tot_pv,sadate,sano  FROM ali_asaleh ";
    $sql .= "    WHERE ".$where."  ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT mcode,tot_pv as tot_pv,sadate,sano  FROM ali_holdhead ";
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
            $sano = $row->sano;        
            $sadate = $row->sadate;    
            $data =  get_detail_meber($mcode,$sadate);
            func_status('ali_',$mcode,$tot_pv,$sadate,$data['pos_cur']);    
        }

    }

 }



?>