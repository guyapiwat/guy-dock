
 <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
 <?
 @session_start();
include("connectmysql.php");
$sql="SELECT mcode,sp_code,name_t FROM ali_member WHERE mcode NOT LIKE '%LS%' ORDER BY lr DESC";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
    $sqlObj = mysql_fetch_object($rs);
    $arr[$i]['mcode'] = $sqlObj->mcode;      
    $arr[$i]['sp_code'] = $sqlObj->sp_code;      
    $arr[$i]['name_t'] = $sqlObj->name_t;      

}

$fmcode = (isset($_POST["value"])) ? $_POST["value"] : $_GET["value"];   

echo(gentree($arr,$fmcode,0,$fmcode)); 

function gentree($datas, $parent, $limit=0,$mainparent){

	$sql="SELECT mcode FROM ali_member WHERE sp_code ='".$parent."' ORDER BY lr DESC";

    $rs = mysql_query($sql);
    if(@mysql_num_rows($rs)>0){
        if($limit > 20) return ''; 
        $tree = '<ul id='.$parent.' >'; 
   
        for($i=0, $ni=count($datas); $i < $ni; $i++){
              if($datas[$i]['sp_code'] == $parent){  
                $tree .= '<li> ';   
				$tree .= "<button id='s-".$datas[$i]['mcode']."' href=\"#\"  onclick=\"setTableFocus('s-".$datas[$i]['mcode']."');show('".$datas[$i]['mcode']."')\" >";
                $tree .= ' <b>'.$datas[$i]['mcode'].'</b>';
                $tree .= ' </button>';       
                $tree .= ' ('.$datas[$i]['name_t'].') ';
                $tree .= ' ( <img src="./images/Animp.gif" width="13px"> : '.count_mem($datas[$i]['mcode']).' รหัส ) ';
                $tree .= '</li>';
                $tree .= '<div  id='.$datas[$i]['mcode'].'></div>';
            }
        }
        $tree .= '</ul>';
    }else{
        $tree = '1234';
    }
    return $tree;
}
   
function count_mem($parent){
    $sql="SELECT mcode FROM ali_member WHERE sp_code ='".$parent."' ORDER BY lr DESC";
    $rs = mysql_query($sql);
    if(@mysql_num_rows($rs)>0){
      $count = mysql_num_rows($rs);
    }else{
      $count = 0;
    }
    return $count;
}
  
function createTree(&$list, $parent){
    $tree = array();
    foreach ($parent as $k=>$l){
    
        if(isset($list[$l['mcode']])){
            $l['children'] = createTree($list, $list[$l['mcode']]);
        }
        $tree[] = $l;
    } 
    return $tree;
}                                            