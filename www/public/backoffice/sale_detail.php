<script language="javascript" type="text/javascript">
    function sale_print(id){
        var wlink = 'invoice_aprint_sale.php?bid='+id;
        //var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
        window.open(wlink);
    }
    function sale_cancel(id){
        if(confirm("ต้องการยกเลิกบิลนี้")){
            window.location='index.php?sessiontab=3&sub=6&state=3&bid='+id;
        }
    }
    function sale_status(id){
        if(confirm("ต้องการเปลี่ยนแปลงจัดส่ง")){
            window.location='index.php?sessiontab=3&sub=6&state=6&sender='+id;
        }
    }
</script>
<?
if(isset($_POST["ftrcode1"]))
    $ftrcode1 = $_POST["ftrcode1"];
else if(isset($_GET["ftrcode1"]))
    $ftrcode1 = $_GET["ftrcode1"];

$wwhere = " a.rcode between '".$ftrcode1."' and '".$ftrcode1."' ";
$sql="select min(fdate) as fdate1,max(tdate) as tdate1 from ".$dbprefix."around a where  $wwhere  ";
$result=mysql_query($sql);
if (mysql_num_rows($result)>'0') {
    $row= mysql_fetch_array($result, MYSQL_ASSOC);
    $fdate=$row["tdate1"];
    $tdate=$row["fdate1"];
}

if(isset($_POST["cmc"]))
    $mcode = $_POST["cmc"];
else if(isset($_GET["cmc"]))
    $mcode = $_GET["cmc"];


require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT * FROM (SELECT cancel,".$dbprefix."asaleh.id,".$dbprefix."asaleh.uid as uid,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,total,ali_member.name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
$sql .= ",CASE sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd,CASE ".$dbprefix."asaleh.inv_code WHEN '' THEN 'บริษัท' ELSE ".$dbprefix."asaleh.inv_code END AS inv_code,CASE ".$dbprefix."asaleh.send WHEN '1' THEN 'บิลแจงผ่านบริษัท' ELSE 'บิลขายปกติ' END AS type ";
$sql .= ",CASE ".$dbprefix."asaleh.asend WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS asend ,".$dbprefix."member.pos_cur as por_cur ";

$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode)  where cancel = 0 and sa_type = 'A' "; 


if(!empty($mcode))$sql .= " and ".$dbprefix."asaleh.mcode = '$mcode' " ;
if(!empty($fdate))$sql .= " and ".$dbprefix."asaleh.sadate >= '".$fdate."'  and ".$dbprefix."asaleh.sadate <= '".$tdate."'  ";

$sql .= " UNION "; 

$sql .= "SELECT cancel,".$dbprefix."holdhead.id,".$dbprefix."holdhead.uid as uid,hono as sano ,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,total,ali_member.name_t,".$dbprefix."holdhead.mcode AS smcode";
$sql .= ",'<img src=./images/false.gif>' AS sendsend ";
$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
$sql .= ",CASE sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd,CASE ".$dbprefix."holdhead.inv_code WHEN '' THEN 'บริษัท' ELSE ".$dbprefix."holdhead.inv_code END AS inv_code,'บิลขายแจงยอด' as type ";
$sql .= ",'<img src=./images/false.gif>' AS asend ,".$dbprefix."member.pos_cur as por_cur ";

$sql .= "FROM ".$dbprefix."holdhead ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."holdhead.mcode=".$dbprefix."member.mcode)  where cancel = 0 and sa_type = 'A' ";

if(!empty($mcode))$sql .= " and ".$dbprefix."holdhead.mcode = '$mcode' " ;
if(!empty($fdate))$sql .= " and ".$dbprefix."holdhead.sadate >= '".$fdate."'  and ".$dbprefix."holdhead.sadate <= '".$tdate."'  ";

$sql .= " ) as a where 1=1 "; 


//echo $sql;
    if($_GET['state']==1){
        include("sale_del.php");
    }else if($_GET['state']==2){
        include("sale_editadd.php");
    }else if($_GET['state']==3){
        include("sale_cancel.php");
    }else if($_GET['state']==4){
        include("product_sale_bill.php");
    }
    else if($_GET['state']==5){
        include("sale_editaddh.php");
    }
    else if($_GET['state']==6){
        include("change_held.php");
    }
    else{
        $rec = new repGenerator();
        $rec->setQuery($sql);
        $rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
        $rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
        $rec->setLimitPage($_GET['lp']);    
        if(isset($_POST['skey']))
            $rec->setCause($_POST['skey'],$_POST['scause']);
        else if(isset($_GET['skey']))
            $rec->setCause($_GET['skey'],$_GET['scause']);
        $rec->setSize("95%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");
        //$rec->setPageLinkShow(false,false);
        $rec->setLink($PHP_SELF,"sessiontab=3&sub=38");
        $rec->setBackLink($PHP_SELF,"sessiontab=3");
        if(isset($page))
            $rec->setCurPage($page);
        $rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total,inv_code");
        $rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,HOLD,วันที่ซื้อ,PV,จำนวนเงินรวม,ผู้บันทึก");
        $rec->setFieldFloatFormat(",,,,,,,,2,");
        $rec->setFieldAlign("center,center,left,center,center,center,center,right,right,right");
        $rec->setFieldSpace("8%,8%,30%,5%,5%,5%,8%,10%,10%,15%");
         $rec->setSearch("sano,sadate,smcode,inv_code");
        $rec->setSearchDesc("เลขบิล,เลขบิลแจง,วันที่,รหัสผู้ซื้อ,ผู้บันทึก");
        $rec->setSum(true,false,",,,,,,,true,true,");
        $rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
        $rec->showRec(1,'SH_QUERY');
    }

?>