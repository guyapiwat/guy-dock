<? session_start(); ?>
<?
if ($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])) {
    if (empty($_GET["lan"])) $_SESSION["lan"] = "TH";
    else $_SESSION["lan"] = $_GET["lan"];
} else {
    if (empty($_SESSION["lan"])) $_SESSION["lan"] = "TH";
}
include_once("../member/wording" . $_SESSION["lan"] . ".php");
header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("content-type: application/x-javascript; charset=utf8");
include("prefix.php");
include("connectmysql.php");
$value = (isset($_POST["value"])) ? $_POST["value"] : $_GET["value"];
$mcode1 = $_SESSION["usercode"];

  $sql="SELECT * FROM  `ali_member`   WHERE lr='' AND sp_code='$value'";
                //echo $sql;
    $rs1 = mysql_query($sql);
    if(mysql_num_rows($rs1)>0){
?>
  <select name="memberfreeid" id="memberfreeid" required>
  <option value="">เลือก</option>
        <?
              
                 while ($sqlObj = mysql_fetch_object($rs1)) {
        ?>                            
                <option value="<?echo($sqlObj->mcode);?>"><?echo($sqlObj->name_f." ".$sqlObj->name_t);?></option>
        <?
                    } 
           
        
        ?>
</select>
<?
    }else{
        echo('<input type="hidden" id="memberfreeid" value="">ไม่พบข้อมูลลงทะเบียน');
    }
?>