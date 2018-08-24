<?
/*echo $ssss = date("2014-07-15");
echo 	$hdate  = date("Y-m-t", strtotime(date("$ssss", strtotime("+1 months"))));
include('global.php');
echo $sss = $_SESSION["datetimezone_Ym"]."-15";
echo $hdate  = date("Y-m-t", strtotime(date("2014-07-15", strtotime("+1 months"))));
*/

//$csadate = $csadate."-15";

//$sss = $_SESSION["datetimezone_Ym"]."-15";


$date = new DateTime(date("2014-02-01"));
$date->modify("last day of next month");
echo $date->format("Y-m-t");

?>
 