<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

     $sql = "SELECT vip_id,sadate,".$dbprefix."special_point_group.mcode,
     CASE sa_type WHEN 'VQ' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve,
     CASE sa_type WHEN 'VA' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ,
     name_t,tot_pv FROM ".$dbprefix."special_point_group LEFT JOIN ".$dbprefix."member AS vipinfo ON (".$dbprefix."special_point_group.mcode=vipinfo.mcode)";
    //echo $sql;
    if($_GET['state']==1){
        include("memberVIP_del.php");
    }else if($_GET['state']==2){
        include("memberVIP_edit.php");
    }else{
        $rec = new repGenerator();
        $rec->setQuery($sql);
        $rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
        $rec->setOrder($_GET['ord']==""?" mcode ":$_GET['ord']);
        $rec->setLimitPage($_GET['lp']);
        if(isset($_POST['skey']))
            $rec->setCause($_POST['skey'],$_POST['scause']);
        else if(isset($_GET['skey']))
            $rec->setCause($_GET['skey'],$_GET['scause']);
        $rec->setSize("95%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");
        //$rec->setPageLinkShow(false,false);
        $rec->setLink($PHP_SELF,"sessiontab=2&sub=3");
        $rec->setBackLink($PHP_SELF,"sessiontab=2");
        if(isset($page))
            $rec->setCurPage($page);
        $rec->setShowField("mcode,name_t,sadate,ability,tot_pv");
        $rec->setFieldDesc("รหัสสมาชิก,ชื่อสมาชิก,วันที่,คุณสมบัติ,คะแนนกลุ่ม(PV)");
        //$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
        //$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
        $rec->setFieldAlign("center,left,center,center,right");
        $rec->setFieldSpace("10%,45%,10%,5%,15%");
        $rec->setFieldLink("index.php?sessiontab=2&sub=3&cmc=,");
        $rec->setDel("index.php","id","vip_id","sessiontab=2&sub=3");
        $rec->setFromDelAttr("maindel","./index.php?sessiontab=2&sub=3&state=1","post","delfield");
        $rec->setSearch(" ".$dbprefix."special_point_group.mcode,name_t,sa_type");
        $rec->setSearchDesc("รหัสสมาชิก,ชื่อ,แผน");
        //$rec->setEdit("index.php","id","vip_id","sessiontab=2&sub=3");
        $rec->showRec(1,'SH_QUERY');
        //---------------------------------
    }

?>