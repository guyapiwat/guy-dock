<style>
ul {list-style: none;}
li:before { 
    content: "";
    border-color: transparent #F00;
    border-style: solid;
    border-width: 0.35em 0 0.35em 0.45em;
    display: block;
    height: 0;
    width: 0;
    left: -0.3em;
    top: 0.9em;
    position: relative;
}
button {
    background: none !important;
	border: none;
	cursor: pointer;
}
</style>
<script type="text/javascript">
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch(e) {} 
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} 
   try { return new XMLHttpRequest(); } catch(e) {} 
   alert("XMLHttpRequest not supported")
   return null
}  

function setTableFocus(v) {
	document.getElementById(v).focus();
}
   
function show(value) {
     var req = Inint_AJAX(); 
     var empty =  document.getElementById(value).innerHTML;
     if(empty=='' || empty=='NULL'){
         req.open('GET', 'tree.php?value='+encodeURIComponent(value), true);
         req.onreadystatechange = function() {
              if (req.readyState==4) {
                   if (req.status==200) { 
                        var data=req.responseText.trim(); 
                        var data2 = data.replace('<meta http-equiv="Content-Type" content="text/html; charset=tis-620">', "");
                        if(data2==1234){
                            
                        }else{
                            document.getElementById(value).innerHTML=data2.trim(); 
                            document.getElementById(value).style.display = 'block';
                        }
                   }
              }
         };
         req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
         req.send(null); 
     }else{
         document.getElementById(value).style.display = 'none';
         document.getElementById(value).innerHTML='NULL';
     }
}  
</script>

<?$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode']; 

if(empty($fmcode))$fmcode = $_SESSION["code_ref"];

if(isLinex($dbprefix,$fmcode,$_SESSION["code_ref"]) == false){
   echo 'ไม่สามารถดูได้ กรุณาตรวจสอบรหัสอีกครั้ง';
   exit;
}
?>

<form name="rform" method="POST" action="./index.php?sessiontab=1&sub=8">
	 <table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>	
		<td align="right">รหัสสมาชิก&nbsp;</td>
		<td><input type="text" name="fmcode" id="fmcode" placeholder="0000001" value="<?=$fmcode?>" />

	   <input type="submit" name="Submit" value="ตกลง"></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>


<?     
$sql="SELECT mcode,upa_code as sp_code,name_t,lr FROM ali_member WHERE mcode NOT LIKE '%LS%' ORDER BY lr DESC";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
    $sqlObj = mysql_fetch_object($rs);
    $arr[$i]['mcode'] = $sqlObj->mcode;      
    $arr[$i]['sp_code'] = $sqlObj->sp_code;      
    $arr[$i]['name_t'] = $sqlObj->name_t;      
    $arr[$i]['lr'] = $sqlObj->lr;      

}

echo ' <b>ผลการค้นหา  : '.$fmcode.'</b>';
   

//	echo(gentree($arr,$_SESSION["code_ref"],0,$_SESSION["code_ref"]));
if(!empty($fmcode)){
	echo(gentree($arr,$fmcode,0,$fmcode));
}



function gentree($datas, $parent, $limit=0,$mainparent){
    include("connectmysql.php"); 
	if($limit > 20) return ''; 
	$tree = '<ul id='.$parent.' >';
	for($i=0, $ni=count($datas); $i < $ni; $i++){
		if($datas[$i]['sp_code'] == $parent){  
				$arr_lr = array('1'=>'Left','2'=>'right','3'=>'right',);
				
                $tree .= '<li> ';   
			   $tree .= '('.$arr_lr[$datas[$i]['lr']].')';   
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
    return $tree;
}
function count_mem($parent){
    $sql="SELECT mcode FROM ali_member WHERE upa_code ='".$parent."' ORDER BY lr DESC";
    $rs = mysql_query($sql);
    if(@mysql_num_rows($rs)>0){
      $count = mysql_num_rows($rs);
    }else{
      $count = 0;
    }
    return $count;
}

/*
$new = array();
foreach ($arr as $a){
    $new[$a['sp_code']][] = $a;
}
echo '<pre>'; print_r($new['LA000152']); echo '</pre>';  
$tree = createTree($new, array($arr[0]));
echo '<pre>'; print_r($tree); echo '</pre>'; 

*/

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

function isLinex($dbprefix,$scode,$testcode){
	$sql = "SELECT upa_code FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
	$rs = mysql_query($sql);
	if($scode==$testcode)
		return true;
	if(mysql_num_rows($rs)<=0)
		return false;
	else if(mysql_result($rs,0,'upa_code')!=$testcode)
		return isLinex($dbprefix,mysql_result($rs,0,'upa_code'),$testcode);
	else
		return true;
}