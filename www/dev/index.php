<?php
/**
 * Created by PhpStorm.
 * User: saintent
 * Date: 21/8/2018 AD
 * Time: 00:01
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo('It\'s work2');
$test = '555666655';
echo('<br/>');

echo($test);
echo('<br/>');

$servername = "p-enterprise.com:9100";
$username = "dev";
$password = "dev@cci";
$dbname = "cci_db";
//$conn = new mysqli($servername, $username, $password, $dbname);
//
//if ($conn->connect_error) {
//    print ('Connection failed:');
////    die("Connection failed: " . $conn->connect_error);
//}
//else {
//    print ('It\'s work');
//}
print('test connect...<br/>');

//$link = mysqli_connect($servername, $username, $password);
$conn = @mysql_connect("p-enterprise.com:9100", "dev", "dev@cci");

///@mysql_connect("p-enterprise.com:9100", "dev", "dev@cci") or die("Could not connect: " . mysql_error());
//print('<br> connect');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
else {
    print('connect work');
}
//phpinfo();


?>

<SCRIPT LANGUAGE="JavaScript">

    window.location = "./public/member" ;
    // window.location = "http://cms.cciofficial.com"
</SCRIPT>
