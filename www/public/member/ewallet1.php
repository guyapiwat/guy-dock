<? 
session_start();    
include("global.php");
?>    
<? include("rpdialog.php");?>
<script language="javascript" type="text/javascript">
    function sale_print(id){
        var wlink = 'invoice_aprintw.php?bid='+id;                                   
        window.open(wlink);
    }
    function sale_cancel(id){
        if(confirm("ต้องการยกเลิกบิลนี้")){
            window.location='index.php?sessiontab=3&sub=23&state=3&bid='+id;
        }
    }
    function sale_look(id){
        var wlink = 'invoice_aprintw_look.php?bid='+id;                                  
        window.open(wlink);                                            
    }
</script>  
<style type="text/css">
.btn1 {
    width: 80px;
    -moz-box-shadow: inset 0px 1px 0px 0px #97c4fe;
    -webkit-box-shadow: inset 0px 1px 0px 0px #97c4fe;
    box-shadow: inset 0px 1px 0px 0px #97c4fe;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #3d94f6), color-stop(1, #1e62d0));
    background: -moz-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
    background: -webkit-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
    background: -o-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
    background: -ms-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
    background: linear-gradient(to bottom, #3d94f6 5%, #1e62d0 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0',GradientType=0);
    background-color: #3d94f6;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    border: 1px solid #337fed;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    padding: 3px 10px;
    text-decoration: none;
    text-shadow: 0px 1px 0px #1570cd;
}
  .btn2 {
    width: 70px;
    -moz-box-shadow: inset 0px 1px 0px 0px #f7c5c0;
    -webkit-box-shadow: inset 0px 1px 0px 0px #f7c5c0;
    box-shadow: inset 0px 1px 0px 0px #f7c5c0;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #fc8d83), color-stop(1, #e4685d));
    background: -moz-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
    background: -webkit-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
    background: -o-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
    background: -ms-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
    background: linear-gradient(to bottom, #fc8d83 5%, #e4685d 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fc8d83', endColorstr='#e4685d',GradientType=0);
    background-color: #fc8d83;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    border: 1px solid #d83526;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    color: #ffffff;
    padding: 3px 10px;
    text-decoration: none;
    text-shadow: 0px 1px 0px #810e05;
}  
.btn3 {
    width: 70px;
    -moz-box-shadow: inset 0px 1px 0px 0px #ffffff;
    -webkit-box-shadow: inset 0px 1px 0px 0px #ffffff;
    box-shadow: inset 0px 1px 0px 0px #ffffff;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #9CCD65), color-stop(1, #00C000));
    background: -moz-linear-gradient(top, #9CCD65 5%, #00C000 100%);
    background: -webkit-linear-gradient(top, #9CCD65 5%, #00C000 100%);
    background: -o-linear-gradient(top, #9CCD65 5%, #00C000 100%);
    background: -ms-linear-gradient(top, #9CCD65 5%, #00C000 100%);
    background: linear-gradient(to bottom, #9CCD65 5%, #00C000 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#9CCD65', endColorstr='#00C000',GradientType=0);
    background-color: #9CCD65;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    border: 1px solid #00B400;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    color: #ffffff;
    padding: 3px 10px;
    text-decoration: none;
    text-shadow: 0px 1px 0px #00A900;
}  
</style>        
<?
if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
    if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
    else $_SESSION["lan"] = $_GET["lan"];
}else{
    if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
}
include_once("wording".$_SESSION["lan"].".php"); 
include("connectmysql.php");
include("./cls/repGenerator.php");
include("prefix.php");

//rpdialog_m(2);
//var_dump($_POST);
$strtdate=$fdate=$_SESSION['fdate'];
$strtdate=$tdate=$_SESSION['tdate'];

if (isset($_REQUEST["strtdate"])){$strtdate=$_REQUEST["strtdate"];} else {$strtdate=$_SESSION['tdate'];}
if (isset($_REQUEST["strfdate"])){$strfdate=$_REQUEST["strfdate"];} else {$strfdate=$_SESSION['fdate'];}

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
        /////////// LOG //////////////
        /////////// LOG //////////////
        $sql = "SELECT l.mcode,m.name_t,l.sadate,l.sano,l._in,l._out,l.total,l._option  
                 FROM ali_log_ewallet l "; 
        $sql .= "LEFT JOIN ".$dbprefix."member m ON (l.mcode = m.mcode) ";                                                                
        $sql .= "where l.mcode = '".$_SESSION["usercode"]."' ";
       // $sql .= " and l._option NOT LIKE '%recom%' ";        

		if($strfdate !="" and $strtdate !="")$sql.=" and l.sadate BETWEEN '$strfdate' and '$strtdate'";
		
		$rec = new repGenerator();
        $rec->setQuery($sql);  
       if($_GET['report'] == '2'){
            $rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
            $rec->setOrder($_GET['ord']==""?" l.id ":$_GET['ord']);
        }else{
            $rec->setSort("UP");
            $rec->setOrder("l.id");
        }

        $rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&strfdate=".$_GET["strfdate"]."&strtdate=".$_GET["strtdate"]."&report=2");
        $rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");                             
        $rec->setLimitPage("1000");                       
        $rec->setSize("95%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");                       
        $rec->setShowField("sadate,_in,_out,total,_option");
        $rec->setFieldFloatFormat(",2,2,2,");  
        $rec->setFieldDesc("".$wording_lan["day"].",".$wording_lan["import"].",".$wording_lan["export"].",".$wording_lan["balances"].",".$wording_lan["Note"]."");  
        $rec->setFieldAlign("center,right,right,right,left");
        // $rec->setFieldSpace("5%,10%,5%,30%,10%,10%,10%,20%");    
        $rec->setSum(true,false,",true,true,,");  
        $rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");             
        $rec->showRec(1,'SH_QUERY');             
        /////////// LOG //////////////
		
	

?>