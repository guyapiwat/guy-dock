<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>
<?
$dbprefix = 'ali_';
$time_start = getmicrotime(); 


$sql="SELECT mcode FROM ".$dbprefix."member where status_terminate = '1' ORDER BY id DESC"; 
//echo $sql;
$rs = mysql_query($sql);
  
for($i=0;$i<mysql_num_rows($rs);$i++)
{
    $sqlObj = mysql_fetch_object($rs);
    $mcode = $sqlObj->mcode;
	$sql = "select cid from ali_bmbonus where mcode = '$mcode' order by cid desc limit 0,1";
	$rsx = mysql_query($sql);
	if(mysql_num_rows($rsx)>0){
		$cid = mysql_result($rsx,0,"cid");
		$sqlupdate = "update ali_bmbonus set carry_l = '0' , carry_c = '0' where cid = '$cid'";
		//echo $sqlupdate.'<br>';
		//mysql_query($sqlupdate);
	}
}
exit;


$sql="SELECT mcode,sp_code,upa_code,lr,pos_cur FROM ".$dbprefix."member  ORDER BY id DESC"; 
$rs = mysql_query($sql);
  
for($i=0;$i<mysql_num_rows($rs);$i++)
{
    $sqlObj = mysql_fetch_object($rs);
    $data[$sqlObj->mcode]['mcode']= $sqlObj->mcode;
    $data[$sqlObj->mcode]['upa_code']= $sqlObj->upa_code;
    //$data[$sqlObj->mcode]['sp_code']= $sqlObj->sp_code;    
   // $data[$sqlObj->mcode]['pos_cur']= $sqlObj->pos_cur;  
    $data[$sqlObj->mcode]['lr']= $sqlObj->lr;                               
 //
 //   $data[$sqlObj->mcode][2] = array('member' => 0); 
}  
  

$new = array(); 
foreach ($data as $m => $a){
    
    get_part_upa();
    echo $a."<br>";
    //$new[$a['upa_code']][] = $a;
}
exit;

 echo "<pre>";
// print_r($new);
 echo "</pre>";
 $tree = createTree($new,$data);
echo "<pre>";
print_r($tree['7']);
echo "</pre>";  
   
 

function createTree(&$list, $parent){
    $tree = array();
    foreach ($parent as $k=>$l){ 
       
        if(isset($list[$l['mcode']])){
            $l['children'] = createTree($list, $list[$l['mcode']]);
        }
        
        $tree['aa'][] = $l;
    } 
    return $tree;
}

    
function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
}                
   
