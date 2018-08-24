<link href="./../style.css" rel="stylesheet" type="text/css">
<?
require("../function/function_pos.php");
/*
$host = explode('www.',$_SERVER['SERVER_NAME']);
$URL = explode('/',$_SERVER['REQUEST_URI']);
$actual_link = "http://".$host[0]."/".$URL[1]."/"; 
*/
 //echo $actual_link;
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<SCRIPT LANGUAGE="JavaScript">

function selectitem(inv_code,inv_desc,ewallet,cname){ 

    var chkdata1 = '';
    var chkdata2 = '';
    dataType: 'application/json; charset=utf-8';
    queryString = 'action=set'+'&inv_code='+inv_code;
    link = '<?=$actual_link?>backoffice/invent_select.php'; 
	//alert(link);
	//alert();
    $.post(link,queryString,function(data){  
	
		//alert(data);
        doc= window.opener.document; 
        doc.getElementById('invent-item').innerHTML=data;  
    });
     
    link2 = '<?=$actual_link?>backoffice/payment_select.php';  
    $.post(link2,queryString,function(data){ 
	
        doc= window.opener.document; 
        doc.getElementById('payment-item').innerHTML=data;     
    });
    
    setTimeout(function(){ window.close() }, 1000);

}
</script>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="./../style.css" rel="stylesheet" type="text/css">
<title>เลือกสาขา</title>
<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center"><tr><td><fieldset><legend><strong><font color="#666666">เลือกสาขา</font></strong></legend>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");
require("prefix.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT inv_code,inv_desc,ewallet,cname ,cid, CASE inv_type WHEN '1' THEN 'Branch' WHEN '2' THEN 'Stockist' END AS inv_type FROM ".$dbprefix."invent left join ".$dbprefix."location_base on (".$dbprefix."invent.locationbase = ".$dbprefix."location_base.cid) ";
//$wherecause = " WHERE ";

    //$link = mysql_connect('localhost', 'root', '1422528');
    //$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
    //mysql_select_db('free_style',$link);
    //$rs = mysql_query("SELECT * FROM usaaba_member");
    if($_GET['state']==1){
        include("sales_invent_del.php");
    }else if($_GET['state']==2){
        include("sales_invent_editadd.php");
    }else{
        ?><br /><?
        $rec = new repGenerator();
        $rec->setQuery($sql);
        $rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
        $rec->setOrder($_GET['ord']==""?" cid,inv_type,inv_code ":$_GET['ord']);
        $rec->setLimitPage($_GET['lp']);
        if(isset($_POST['skey']))
            $rec->setCause($_POST['skey'],$_POST['scause']);
        else if(isset($_GET['skey']))
            $rec->setCause($_GET['skey'],$_GET['scause']);
        $rec->setSize("95%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");
        //$rec->setPageLinkShow(false,false);
        $rec->setLink($PHP_SELF,"sessiontab=3&sub=2");
        $rec->setBackLink($PHP_SELF,"sessiontab=3");
        if(isset($page))
            $rec->setCurPage($page);
        $rec->setShowField("inv_code,inv_desc,inv_type,cname");
        $rec->setFieldDesc("รหัส,ชื่อ,ประเภท,LB");
        $rec->setFieldAlign("center,left,left,left");
        $rec->setFieldSpace("20%,40%,20%,20%");
        $rec->setFieldLink("");
        $rec->setSearch("inv_code,inv_desc");
        $rec->setSearchDesc("รหัสสาขา,ชื่อสาขา");
        //$rec->setDel("index.php","inv_code","inv_code","sessiontab=3&sub=2");
        //$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=2&state=1","post","delfield");
        //$rec->setEdit("index.php","inv_code","inv_code","sessiontab=3&sub=2");
        $rec->setSpecial("./images/add_pic.gif","","selectitem","inv_code,inv_desc,ewallet,cname","IMAGE","");
        $rec->showRec(1,'SH_QUERY');
        mysql_close($link);
    }

?>
</fieldset></td></tr></table>
