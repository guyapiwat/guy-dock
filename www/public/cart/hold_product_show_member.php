<?
session_start();
$host = explode('www.',$_SERVER['SERVER_NAME']);
$URL = explode('/',$_SERVER['REQUEST_URI']);
$actual_link = "http://".$host[0]."/".$URL[1]."/"; 
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript"> 

function cartAction(action,product_code,qty,id) {
    var queryString = "";
    if(qty == '')qty=1;
    if(action != "") {
        switch(action) {
            case "add":
                queryString = 'action='+action+'&pcode='+ product_code+'&qty=1&all_qty='+qty+'&id='+id;
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
    link = '<?=$actual_link?>cart/cart_hold_product.php'; 
    $.post(link,queryString,function(data){ 
        /*window.parent.document.getElementById('waiting-item').innerHTML = '';    */      
        window.parent.document.getElementById('cart-item').innerHTML = data;            
    });
}

</script>
</head>
<body>
<?
require("../branch/connectmysql.php");
require("../branch/cls/repGenerator.php");
include("../branch/prefix.php");




if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
 

    $sql = "select *,'add' as action from (SELECT asd.pcode,asd.id as id,asd.pdesc,asd.price,asd.pv,";
    $sql .= "(asd.qty-IFNULL(SUM(hod.qty),0)) AS qty FROM ali_asaled asd ";//,(".$dbprefix."asaled.qty-".$dbprefix."holddesc.qty)
    $sql .= "LEFT JOIN ali_asaleh ash ON (ash.id=asd.sano) ";
    $sql .= "LEFT JOIN ali_holdhead hoh ON (asd.sano=hoh.sano and hoh.cancel=0 ) ";
    $sql .= "LEFT JOIN ali_holddesc hod ON (hoh.id=hod.hono AND hod.pcode=asd.pcode AND hod.price=asd.price AND hod.pv=asd.pv) "; 
    $sql .= "WHERE asd.sano='{$_GET['bid']}' and ash.mcode = '{$_SESSION["usercode"]}' GROUP BY pcode) as a where a.qty > 0 
	  and a.pcode not like 'SE00%'
	"; 



$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" pcode ":$_GET['ord']);
$rec->setLimitPage($_GET['lp']);
if(isset($_POST['skey']))
    $rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))
    $rec->setCause($_GET['skey'],$_GET['scause']);
$rec->setSize("100%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");
//$rec->setPageLinkShow(false,false);
$rec->setLink($PHP_SELF,"sessiontab=3&sub=2");
$rec->setBackLink($PHP_SELF,"sessiontab=3");
if(isset($page))
    $rec->setCurPage($page);
$rec->setShowField("pcode,pdesc,price,pv,qty");
$rec->setFieldDesc("รหัส,รายละเอียด,ราคา,คะแนน,จำนวน");
$rec->setFieldAlign("center,left,center,right,right");
$rec->setFieldSpace("15%,45%,20%,20%");
$rec->setFieldLink(","); 
$rec->setSpecial("../member/images/add_pic.gif","","cartAction","action,pcode,qty,id","IMAGE","");
//$rec->setSum(true,false,",,true,true");
//$rec->setSearch("pcode,pdesc,price,pv");
//$rec->setSearchDesc("รหัส,รายละเอียด,ราคา,คะแนน");
//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=2&state=1","post","delfield");
$rec->showRec(1,'SH_QUERY');
mysql_close($link);

?>

</body>
</html>