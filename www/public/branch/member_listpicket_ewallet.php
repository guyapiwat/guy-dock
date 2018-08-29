<link href="./../style.css" rel="stylesheet" type="text/css">
<?
$host = explode('www.',$_SERVER['SERVER_NAME']);
$URL = explode('/',$_SERVER['REQUEST_URI']);
$actual_link = "http://".$host[0]."/".$URL[1]."/"; 
 
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<SCRIPT LANGUAGE="JavaScript">

function selectitem(mcode){  
    dataType: 'application/json; charset=utf-8';
    queryString = 'action=set'+'&mcode='+mcode;
    link = '<?=$actual_link?>cart/member_ewallet_item.php'; 
    $.post(link,queryString,function(data){   
        doc= window.opener.document; 
        doc.getElementById('member-item').innerHTML=data;  
    }); 
   
    setTimeout(function(){ window.close() }, 2000); 

}
</script>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="./../style.css" rel="stylesheet" type="text/css">
<title>เลือกสาขา</title>
<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center"><tr><td><fieldset><legend><strong><font color="#666666">เลือก Member</font></strong></legend>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");
require("prefix.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

      $sql = "SELECT DATEDIFF(NOW(),tab.mdate) as mdate1,tab.mcode,tab.pos_cur,tab.pos_cur,tab.name_t FROM ".$dbprefix."member as tab ";
 
      $rec = new repGenerator();
        $rec->setQuery($sql);
        $rec->setSort($_GET['srt']);
        $rec->setOrder($_GET['ord']);
        $rec->setLimitPage($_GET['lp']);
        if(isset($_POST['skey']))
            $rec->setCause($_POST['skey'],$_POST['scause']);
        else if(isset($_GET['skey']))
            $rec->setCause($_GET['skey'],$_GET['scause']);
        $rec->setSize("95%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right"); 
        $rec->setLink($PHP_SELF,"sessiontab=1&sub=2");
        $rec->setBackLink($PHP_SELF,"sessiontab=1");
        if(isset($page))
            $rec->setCurPage($page);
        $rec->setShowField("mcode,name_t,");
        $rec->setFieldDesc("รหัสสมาชิก,ชื่อ");
        $rec->setFieldAlign("center,left");
        $rec->setFieldSpace("40%,60%"); 
        $rec->setSearch("mcode,name_t");
        $rec->setSearchDesc("รหัสสมาชิก,ชื่อ"); 
        $rec->setSpecial("./images/add_pic.gif","","selectitem","mcode","IMAGE","");
        $rec->showRec(1,'SH_QUERY');
     

?>
</fieldset></td></tr></table>
