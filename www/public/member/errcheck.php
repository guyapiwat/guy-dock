<?
session_start();
header("content-type: application/x-javascript; charset=utf8");
include("prefix.php");
include("connectmysql.php");

include_once("wording" . $_SESSION["lan"] . ".php");

//echo $_GET['fchk'];
$flist = explode(',', $_GET['fchk']);
$fval = explode(',', $_GET['fval']);
$fskip = explode(',', $_GET['fskip']);
$fdesc = explode(',', $_GET['fdesc']);
$farglist = explode(',', $_GET['farg']);

// var_dump($farglist);
// exit;
$table = $_GET['tb'];
$errmsg = "";
for ($i = 0; $i < sizeof($flist); $i++) {
    $arglist = explode('-', $farglist[$i]);
    //echo  $flist[$i]."-".$farglist[$i]."--".$fval[$i]."<br />";
    if ($arglist[0] == 1 && $fval[$i] == "") { //null
        // echo $fdesc[$i];
        // exit;
        //$errmsg .= iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_70']) . " " . $fdesc[$i] . ' ' . iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_74']) . "1</br>";
        $errmsg .=  $wording_lan['tab4']['1_70'] . " " . $fdesc[$i] . ' ' .  $wording_lan['tab4']['1_74'] . "1</br>";
    }
    if ($arglist[1] > 0 && strlen($fval[$i]) != $arglist[1] && $fval[$i] != "") { //size
        //$errmsg .= iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_70']) . " " . $fdesc[$i] . ' ' . iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_75']) . ' ' . $arglist[1] . ' ' . iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_76']) . "</br>";
        $errmsg .= $wording_lan['tab4']['1_70'] . " " . $fdesc[$i] . ' ' .  $wording_lan['tab4']['1_75']. ' ' . $arglist[1] . ' ' . $wording_lan['tab4']['1_76'] . "</br>";
    }
    /*if($arglist[2]==1 && $fval[0]==""){ //format
        $errmsg += iconv( 'TIS-620', 'UTF-8', $wording_lan['tab4']['1_70'])." ".$fdesc[$i]." ไม่ได้กรอก</br>";
    }*/
    if ($arglist[3] == 1 && $fval[$i] != "" && $fval[$i] != $fskip[$i]) { //duplicate
        //echo $fval[$i]."=".$fskip[$i]."<br />";
        $exlist = explode('#', $flist[$i]);
        $exval = explode('#', $fval[$i]);
        if (sizeof($exlist) >= 2) {
            mysql_query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM " . $dbprefix . $table . " WHERE ";
            for ($j = 0; $j < sizeof($exlist); $j++) {
                $sql .= $exlist[$j] . "='" . $exval[$j] . "' ";
                $sql .= $j < sizeof($exlist) - 1 ? " AND " : "";
            }

            $sql .= " LIMIT 1";
            $rs = mysql_query($sql);
            //echo $sql;
            if (mysql_num_rows($rs) > 0)
                //$errmsg .= iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_70']) . " " . $fdesc[$i] . ' ' . iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_71']) . "</br>";
                $errmsg .= $wording_lan['tab4']['1_70'] . " " . $fdesc[$i] . ' ' .  $wording_lan['tab4']['1_71'] . "</br>";
            mysql_free_result($rs);
        } else {
            mysql_query("SET NAMES 'utf8'");
            $rs = mysql_query("SELECT * FROM " . $dbprefix . $table . " WHERE " . $flist[$i] . "='" . $fval[$i] . "' LIMIT 1");
            //echo "SELECT * FROM ".$dbprefix.$table." WHERE ".$flist[$i]."='".$fval[$i]."' LIMIT 1";
            if (mysql_num_rows($rs) > 0)
               // $errmsg .= iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_70']) . " " . $fdesc[$i] . ' ' . iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_71']) . "</br>";
               $errmsg .=  $wording_lan['tab4']['1_70'] . " " . $fdesc[$i] . ' ' .  $wording_lan['tab4']['1_71'] . "</br>";
            mysql_free_result($rs);
        }
    }
    /*if($arglist[4]==1 && $fval[$i]!=""){ //real
        mysql_query("SET NAMES 'utf8'");
        $rs = mysql_query("SELECT * FROM ".$dbprefix.$table." WHERE ".$flist[$i]."='".$fval[$i]."' LIMIT 1");
        echo "SELECT * FROM ".$dbprefix.$table." WHERE ".$flist[$i]."='".$fval[$i]."' LIMIT 1";
        if(mysql_num_rows($rs)<=0)
            $errmsg .= iconv( 'TIS-620', 'UTF-8', $wording_lan['tab4']['1_70'])." ".$fdesc[$i]." ไม่มีอยู่ในระบบ</br>";
        mysql_free_result($rs);
    }*/

    if ($arglist[5] == 1) { //loop
        if ($fval[$i] == $fval[0])
            //$errmsg .= iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_70']) . " " . $fdesc[$i] . ' ' . iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_73']) . "</br>";
            $errmsg .= $wording_lan['tab4']['1_70'] . " " . $fdesc[$i] . ' ' . $wording_lan['tab4']['1_73']. "</br>";
        else {
            $up = $fval[$i];
            mysql_query("SET NAMES 'utf8'");
            while ($up != "") {
                echo "SELECT " . $flist[$i] . " FROM " . $dbprefix . $table . " WHERE " . $flist[0] . "='" . $up . "' LIMIT 1";
                $rs = mysql_query("SELECT " . $flist[$i] . " FROM " . $dbprefix . $table . " WHERE " . $flist[1] . "='" . $up . "' LIMIT 1");
                if (mysql_num_rows($rs) <= 0) break;
                $up = mysql_result($rs, 0, $flist[$i]);
                //echo $up."--".$fval[0];
                if ($up == $fval[0]) {
                    //$errmsg .= iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_70']) . " " . $fdesc[$i] . ' ' . iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_72']) . "</br>";
                    $errmsg .=  $wording_lan['tab4']['1_70'] . " " . $fdesc[$i] . ' ' .  $wording_lan['tab4']['1_72'] . "</br>";
                    
                    break;
                }
                mysql_free_result($rs);
            }
            $rs = mysql_query("SELECT * FROM " . $dbprefix . $table . " WHERE " . $flist[$i] . "='" . $up . "' LIMIT 1");
            if (mysql_num_rows($rs) <= 0)
                //$errmsg .= iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_70']) . " " . $fdesc[$i] . ' ' . iconv('TIS-620', 'UTF-8', $wording_lan['tab4']['1_81_1']) . "</br>";
                $errmsg .=  $wording_lan['tab4']['1_70'] . " " . $fdesc[$i] . ' ' . $wording_lan['tab4']['1_81_1'] . "</br>";
                mysql_free_result($rs);
        }
    }
    //echo $flist[$i];
    //echo $fval[$i];
    //echo $fdesc[$i];
    //print_r($arglist);
    //echo "ทดสอบครั<br />";

}
if ($errmsg != "")
    echo "<div class='alert alert-danger center'>" . $errmsg . " </div>";
else
    echo "<div class='alert alert-success center'>pass</div>";//echo "<font color='#009900'>pass</font>";

/*
	echo "0";
else
	echo "1";
*/
?>
