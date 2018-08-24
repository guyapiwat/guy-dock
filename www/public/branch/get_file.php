<?php

include_once("definitions.php");

// set the timelimit
@set_time_limit($CONF['timelimit']);

// show the requested file
if (isset($_GET['view'])) {
	if (isset($_GET['download'])) {
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=".basename($_GET['view']));
		readfile(EXPORT_DIR.$_GET['view']);
	} else {
    echo "<pre>";
    if (PMBP_file_info("zip",$_GET['view'])) {
        echo htmlentities(PMBP_unzip("all",$_GET['view']));
    } elseif(!PMBP_file_info("gzip",$_GET['view'])) {
        $lines=file($_GET['view']);
        foreach($lines as $line) echo htmlentities($line);
    } else {
        echo htmlentities(PMBP_ungzip("all",$_GET['view']));
    }
    echo "</pre>";
  }
}
?>
