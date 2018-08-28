<?php
/**
 * Created by PhpStorm.
 * User: saintent
 * Date: 21/8/2018 AD
 * Time: 00:01
 */
echo('It\'s work2');
$test = '555666655';
echo('<br/>');
echo($test);
echo('<br/>');
echo (extension_loaded('xdebug') ? '' : 'non '), 'exists';
$servername = "p-enterprise.com:9100";
$username = "dev";
$password = "dev@cci";
$dbname = "cci_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    print ('It\'s work');
}
?>
