<?
$host = "localhost";
$username = "saint";
$password = "1q2w3e4r";

// Create connection
$conn = new mysqli($host, $username, $password, 'cci_db');

// Check connection
if ($conn->connect_error) {
    print("Connect failed");
    die("Connection failed: " . $conn->connect_error);
}

$charset = "SET NAMES 'tis620'";
$conn->query($charset);
//print("Connected successfully");

function makeSqlRequest($instance, $query) {
    $result = $instance->query($query);

    return $result;
}
?>