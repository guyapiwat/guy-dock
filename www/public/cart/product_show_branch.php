<?session_start();
/*$host = explode('www.',$_SERVER['SERVER_NAME']);
$URL = explode('/',$_SERVER['REQUEST_URI']);
$actual_link = "http://".$host[0]."/".$URL[1]."/"; */

$host = $_SERVER['HTTP_HOST'];
$URL = explode('/',$_SERVER['REQUEST_URI']);
if($URL[1][0] == '~')$URL[1] = $URL[1].'/';
else $URL[1] = '';
$actual_link = "http://".$host."/".$URL[1];

if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
    if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
    else $_SESSION["lan"] = $_GET["lan"];
}else{
    if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
}
include("../branch/wording".$_SESSION["lan"].".php"); 
?>

<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css">
<script type="text/javascript"> 

function cartAction(action,product_code,qty) {
    var mcode= window.parent.document.getElementById('mcode').value;
    //alert(mcode);
    if(mcode){

    }else{
        alert('กรุณากรอกใส่รหัสสมาชิกด้วยค่ะ');
        return;
    }

    var queryString = ""; 
    if(qty == '')qty=1;
    if(action != "") {
        switch(action) {
            case "add":
                queryString = 'action='+action+'&pcode='+ product_code+'&qty='+qty+'&mcode='+mcode;
            break; 
            case "plus": 
                queryString = 'action='+action+'&pcode='+ product_code+'&qty='+qty;
            break;
            case "remove":
                queryString = 'action='+action+'&pcode='+ product_code;
            break;
            case "empty":
                queryString = 'action='+action;
            break;
        }     
    } 
    dataType: 'application/json; charset=utf-8';
    link = '<?=$actual_link?>cart/cart_branch.php'; 
    $.post(link,queryString,function(data){ 
        window.parent.document.getElementById('waiting-item').innerHTML = '';            
        window.parent.document.getElementById('cart-item').innerHTML = data;            
    });
}

</script>

<?
require("../branch/connectmysql.php");
require("../branch/cls/repGenerator.php");
include("../branch/prefix.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}


$sql = "SELECT 'add' as action,".$dbprefix."product.barcode,".$dbprefix."product.pcode,".$dbprefix."product.pdesc,".$dbprefix."product.customer_price,".$dbprefix."product_invent.qty,".$dbprefix."product.pv,".$dbprefix."product.price as price,".$dbprefix."productgroup.groupname ";
$sql .=",CASE ".$dbprefix."product.product_img WHEN '' THEN ".$dbprefix."product.pdesc ELSE CONCAT('<a href=javascript:onclick=popUpImg(\'',".$dbprefix."product.product_img,'\');>',".$dbprefix."product.pdesc,'</a>') END AS pdesc1 ";
$sql .=" FROM ".$dbprefix."product LEFT JOIN ".$dbprefix."productgroup  ON (".$dbprefix."productgroup.id=".$dbprefix."product.group_id) LEFT JOIN ".$dbprefix."product_invent  ON (".$dbprefix."product.pcode=".$dbprefix."product_invent.pcode) 
where bf = 1   and locationbase = '".$_SESSION["inv_locationbase"]."' and ".$dbprefix."product_invent.inv_code = '".$_SESSION["admininvent"]."' "; 

$sql = "SELECT 'add' as action,".$dbprefix."product.barcode,".$dbprefix."product.pcode,".$dbprefix."product.pdesc,".$dbprefix."product.customer_price,".$dbprefix."product.pv,".$dbprefix."product.price as price  ";
$sql .=",CASE ".$dbprefix."product.product_img WHEN '' THEN ".$dbprefix."product.pdesc ELSE CONCAT('<a href=javascript:onclick=popUpImg(\'',".$dbprefix."product.product_img,'\');>',".$dbprefix."product.pdesc,'</a>') END AS pdesc1 ";
$sql .=" FROM ".$dbprefix."product where bf=1  "; 


$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" ".$dbprefix."product.pcode ":$_GET['ord']);
$rec->setLimitPage($_GET['lp']);
if(isset($_POST['skey']))
    $rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))
    $rec->setCause($_GET['skey'],$_GET['scause']);
$rec->setSize("100%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");
$rec->setLink($PHP_SELF,"sessiontab=3&sub=2");
$rec->setBackLink($PHP_SELF,"sessiontab=3");
if(isset($page))
    $rec->setCurPage($page);

/*edit column table product*/
$rec->setShowField("pcode,pdesc1,customer_price,price,pv,qty");
$rec->setFieldDesc($wording_lan["productshow"]["1"].",".$wording_lan["productshow"]["2"].",".$wording_lan["customer_price"].",".$wording_lan["productshow"]["3"].",,".$wording_lan["productshow"]["7"]."");
/*------------------------*/

$rec->setFieldAlign("center,left,right,left,right");
$rec->setFieldFloatFormat(",,2,2,0,0");

$rec->setFieldLink(",");
  $rec->setSpecial("../branch/images/add_pic.gif","","cartAction","action,pcode,''","IMAGE","");

$rec->setSearch("barcode,".$dbprefix."product.pcode,".$dbprefix."product.pdesc,".$dbprefix."product.price,".$dbprefix."product.pv");
$rec->setSearchDesc("Barcode,รหัส,รายละเอียด,ราคา,คะแนน");
$rec->showRec(1,'SH_QUERY');
mysql_close($link);

?>
<div id="fade" style="display: none;position: fixed;top: 0%;left: 0%; width: 100%; height: 100%;background-color: #CCCCCC;z-index:3; -moz-opacity: 0.8;opacity:.80;filter: alpha(opacity=80);" >
    <img src="../backoffice/uploads/product_img/close.png" onclick=javascript:closePopUpImg(); style="position: absolute;right:5px;top:5px;cursor:pointer;">
    </div>
    
    
    <div  id="light" style=" display: none;position: fixed;top: 20%;left: 15%; width:380; height:380; padding: 5px;border: 1px solid ;border-color:#666666;background-color: white;z-index:5;overflow: auto;" >
        <img src=''  id="img1" width="100%" height="100%" />
    </div>
</body>
</html>
