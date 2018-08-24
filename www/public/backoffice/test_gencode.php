<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>
<?
exit;
$dbprefix = 'ali_';
//mysql_query(" UPDATE ali_asaleh SET sano = '' WHERE sadate >= '2015-12-16' and scheck <> 'register'") ;
 
$sql="SELECT id,sano FROM ".$dbprefix."asaleh WHERE sadate >= '2015-12-16' and scheck = 'register' and sano='' ORDER BY id ASC ";   
echo $sql."<br>";
 
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
    $sqlObj = mysql_fetch_object($rs);
    $id= $sqlObj->id;
    $sano= $sqlObj->sano;
    mysql_query(" UPDATE ali_asaleh SET sano ='".gencodesale_ON('','asaleh')."' WHERE id = '$id' ");
    echo gencodesale_ON('','asaleh')."<br>";
}



function gencodesale_xx($sanof,$table='asaleh'){
        $year = date('Y')+543;
        $year = substr($year,2,2);
        $month = date('m');
        $sano_f = $year.$month;    //IV0157
        $sql = "SELECT  sano  FROM ali_".$table." where sano like '".$sano_f."%'  order by sano DESC limit 0,1 ";

        $rs = mysql_query($sql);
        if(mysql_num_rows($rs) > 0){
            $csano = substr(mysql_result($rs,0,'sano'),4);
            $csano = $csano+1;
            $csano = gencode7($csano);
            $sano = $sano_f.$csano;
        }else{
            $sano = $sano_f.'0000001';
        }     
        return $sano;
}

function gencode7($source){
    for($i=strlen($source);$i<7;$i++)
        $source = "0".$source;
    return $source;
}function gencode6($source){
    for($i=strlen($source);$i<6;$i++)
        $source = "0".$source;
    return $source;
}

function gencodesale_ON($sanof,$table='asaleh'){
    //    require_once 'connectmysql.php';    
    //    global $_SESSION["bill_ref"];
        @session_start();
        $bill_ref = "001";
        $year = date('Y');
        $year = $year;
        $year = substr($year,2,2);
        $sano_f = $year.$bill_ref.'ON';    //IV0157
        $sql = "SELECT  sano  FROM ali_".$table." where sano like '".$sano_f."%'  order by sano DESC limit 0,1 ";
        
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs) > 0){
            $csano = substr(mysql_result($rs,0,'sano'),-5);
            $csano = $csano+1;
            $csano = gencode6($csano);
            $sano = $sano_f.$csano;
        }else{
            $sano = $sano_f.'000001';
        }     
        return $sano;
    }
