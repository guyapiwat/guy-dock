<?$URL = explode('www.',$_SERVER['SERVER_NAME']);?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript"> 

function cartAction(action,product_code,qty) {
    var queryString = "";
    if(qty == '')qty=1;
    if(action != "") {
        switch(action) {
            case "add":
                queryString = 'action='+action+'&pcode='+ product_code+'&qty='+qty;
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
    $.post('http://<?=$URL['0']?>/bomor/cart_add_package.php',queryString,function(data){ 
        window.parent.document.getElementById('cart-item').innerHTML = data;            
    });
}

</script>

<?
require("connectmysql.php");
require("./cls/repGenerator.php");
include("prefix.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

/*$sql = "SELECT a.pcode,a.pv,a.bv,a.fv,a.price,a.pdesc,a.price,b.qty FROM ".$dbprefix."product a,".$dbprefix."product_invent b
where  a.pcode = b.pcode and b.inv_code = '".$_SESSION['inv_ref']."' and b.qty > 0";*/

$sql = "SELECT 'add' as action,".$dbprefix."product.barcode,".$dbprefix."product.pcode,".$dbprefix."product.pdesc,".$dbprefix."product.customer_price,".$dbprefix."product_invent.qty,".$dbprefix."product.pv,".$dbprefix."product.price as price,".$dbprefix."productgroup.groupname ";
$sql .=",CASE ".$dbprefix."product.product_img WHEN '' THEN ".$dbprefix."product.pdesc ELSE CONCAT('<a href=javascript:onclick=popUpImg(',".$dbprefix."product.product_img,');>',".$dbprefix."product.pdesc,'</a>') END AS pdesc1 ";

$sql .=" FROM ".$dbprefix."product LEFT JOIN ".$dbprefix."productgroup  ON (".$dbprefix."productgroup.id=".$dbprefix."product.group_id) LEFT JOIN ".$dbprefix."product_invent  ON (".$dbprefix."product.pcode=".$dbprefix."product_invent.pcode) 
where bf = 1   and locationbase = '".$_SESSION["inv_locationbase"]."' and ".$dbprefix."product_invent.inv_code = '".$_SESSION["admininvent"]."' group by ".$dbprefix."product.pcode  ";// and locationbase = '".$_SESSION["inv_locationbase"]."' and ".$dbprefix."product_invent.inv_code = '".$_SESSION["admininvent"]."'
//$sql = "SELECT * FROM ".$dbprefix."product LEFT JOIN ".$dbprefix."productgroup  ON (".$dbprefix."productgroup.id=".$dbprefix."product.group_id) where bf = 1  and locationbase = '".$_SESSION["inv_locationbase"]."' ";

//echo $sql;
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
$rec->setShowField("pcode,pdesc1,customer_price,price,qty,pv");
$rec->setFieldDesc($wording_lan["productshow"]["1"].",".$wording_lan["productshow"]["2"].",".$wording_lan["customer_price"].",".$wording_lan["productshow"]["3"].",".$wording_lan["productshow"]["7"]."");
$rec->setFieldAlign("center,left,right,right,left");
//$rec->setFieldSpace("14%,45%,10%,10%,10%");
$rec->setFieldFloatFormat(",,2,2,0,0");

$rec->setFieldLink(",");
  $rec->setSpecial("./images/add_pic.gif","","cartAction","action,pcode,''","IMAGE","");
$rec->setSearch("barcode,".$dbprefix."product.pcode,".$dbprefix."product.pdesc,".$dbprefix."product.price,".$dbprefix."product.pv");
$rec->setSearchDesc("Barcode,รหัส,รายละเอียด,คงเหลือ,ราคา,คะแนน");
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
