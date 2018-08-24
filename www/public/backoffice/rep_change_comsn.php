<script language="javascript" type="text/javascript">
    function sale_print(id){
        var wlink = 'invoice_aprintw.php?bid='+id;
        //var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
        window.open(wlink);
    }
    function sale_cancel(id){
        if(confirm("ต้องการยกเลิกบิลนี้")){
            window.location='index.php?sessiontab=4&sub=2008&state=3&bid='+id;
        }
    }
</script>
<?
		include("rpdialog.php");
		require("connectmysql.php");
		rpdialog_all($_GET['sub']);
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if (isset($_REQUEST["strfdate"])){$strfdate=$_REQUEST["strfdate"];} else {$strfdate="";}
		if (isset($_REQUEST["strtdate"])){$strtdate=$_REQUEST["strtdate"];} else {$strtdate="";}
		if (isset($_REQUEST["fmcode"])){$fmcode=$_REQUEST["fmcode"];} else {$fmcode="";}
		$sql="SELECT ch.fdate,ch.tdate,ch.rcode,ch.date_change,ch.mcode,ch.uid,m.name_t";
		$sql.=",CASE ch.status WHEN '0' THEN 'บังคับไม่จ่าย' WHEN '1' THEN 'บังคับจ่าย' END as status";
		$sql.=" FROM ali_log_change ch LEFT JOIN ali_member m ON(ch.mcode=m.mcode) WHERE 1=1";

		if($strfdate !="" and $strtdate !="" ) $sql.=" AND ch.fdate >= '$strfdate' AND ch.tdate <= '$strtdate'";
		if($fmcode !="") $sql.=" AND ch.mcode >= '$fmcode'";

	//	echo $sql;
        $rec = new repGenerator();
        $rec->setQuery($sql);
        $rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
        $rec->setOrder($_GET['ord']==""?" ch.id ":$_GET['ord']);
        $rec->setLimitPage($_GET['lp']);    
        if(isset($_POST['skey']))
            $rec->setCause($_POST['skey'],$_POST['scause']);
        else if(isset($_GET['skey']))
            $rec->setCause($_GET['skey'],$_GET['scause']);
        $rec->setSize("95%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");
        //$rec->setPageLinkShow(false,false);
        $rec->setLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."");
        $rec->setBackLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]."");
        if(isset($page))
            $rec->setCurPage($page);
        //$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
        $rec->setShowField("rcode,fdate,tdate,mcode,name_t,status,uid,date_change");
        $rec->setFieldFloatFormat(",,,,,,,,,,,");
        //$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
        $rec->setFieldDesc("รอบ,วันที่,ถึงวันที่,รหัสสมาชิก,ชื่อ,สถานะ,ผู้ดำเนินการ,วันที่ดำเนินการ");
        $rec->setFieldAlign("center,center,center,center,left,center,center,center");
        $rec->setFieldSpace("5%,8%,8%,8%,30%,10%,15%,15%");
        $rec->setSum(true,false,",,,,,,,,,,");
        $rec->showRec(1,'SH_QUERY');

?>