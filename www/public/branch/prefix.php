<?
$filename = dirname(__FILE__)."/config.ini";
$openfiles = fopen($filename, "r");
$excutefiles = @fread($openfiles, filesize($filename) );
fclose($openfiles);
$dbprefix = $excutefiles;
global $dbprefix;
?>