<?
  	require_once(dirname(__FILE__)."/sqlBackup.php");
	//require_once(dirname(__FILE__)."/dirInfor.php");
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="6%"></td>
	<td width="94%" valign="top">
      <br>
      <form action="./index.php?sessiontab=<?=$sesstab?>&sub=1&backup=1" method="post">
	  &nbsp;&nbsp;<img src="images/8_18s.gif" border="0">&nbsp;  สำรองข้อมูล <br>	  <br>
	  
	  	<input type="submit" value="   สำรองข้อมูล   " name="submit">
	  </form>
	</td>
	<td width="10%"></td>
</tr>

<?
if (isset($_POST["submit"])){$submit=$_POST["submit"];}else{$submit="";}
if (isset($_GET["backup"])){$backup=$_GET["backup"];}else{$backup="";}
if (isset($_GET["imp"])){$import=$_GET["imp"];}else{$import="";}
if (isset($_GET["del"])){$delete=$_GET["del"];}else{$delete="";}
if (isset($_GET["delall"])){$delall=$_GET["delall"];}else{$delall="";}
set_time_limit(0);
    $bak = new sqlBackup();
    $dir = new dirInfor();
	$dir->dir_tree("./backup");
	
	if(($backup ==  '1') and ($submit <> '')) {	
		$bak->dump_name("db_netmanpro".date("Ymd").substr(microtime(),-10));
		$bak->dump_attr('gz',true,true,false);
		$bak->dump_dir("./backup/");
		$name = $bak->mysql_dump('db_netmanpro');
		$dir->dir_tree("./backup");
	}else if($import <> ""){
		$bak->dump_attr('gz',true,true,false);
		$bak->mysql_restore("./backup/".$import);
		$msg = "Successfully imported.";
	}else if($delete <> ""){
		unlink("./backup/".$delete);
		$dir->dir_tree("./backup");
		$msg = "The file was succesfully deleted.";
	}else if($delall == 1){		
		$list = $dir->getInfoWithOut(".php");
		for($i=0;$i<sizeof($list);$i++){
			unlink("./backup/".$list[$i]['FILE']);
		}
		$dir->dir_tree("./backup");
		$msg = "All files were succesfully deleted.";
	}

	$list = $dir->getInfoWithOut(".php");
	$dir->printBackupInfo("/backup/",$list,"db_netmanpro",$msg);

?>
</table>






<!--
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td width="10%"></td>
	<td width="80%" valign="top">
      <br>
      <form action="./index.php?sessiontab=<?=$sesstab?>&sub=1&backup=1" method="post">
	  &nbsp;&nbsp;<img src="images/8_18s.gif" border="0">&nbsp;  สำรองข้อมูล <br>	  <br>
	  
	  	<input type="submit" value="   สำรองข้อมูล   " name="submit">
	  </form>
	</td>
	<td width="10%"></td>
</tr>

</table>

<?
if (isset($_POST["submit"])){$submit=$_POST["submit"];}else{$submit="";}
if (isset($_GET["backup"])){$backup=$_GET["backup"];}else{$backup="";}
if(($backup ==  '1') and ($submit <> '')) {
include_once("definitions.php");
@set_time_limit($CONF['timelimit']);
ignore_user_abort(TRUE);

@session_start();

    if (!@mysql_connect($CONF['sql_host'],$CONF['sql_user'],$CONF['sql_passwd'])) echo "<div class=\"red_left\">".I_SQL_ERROR."</div><br>";

include_once "connectmysql.php";

$_POST['db'] = array($connectmysql_dbname,0);
$_POST['tables']="on";
$_POST['data']="on"; 
$_POST['drop']="on";
$_POST['zip']="gzip";

if ($_POST['db']) {

    $starttime=time();
    
    PMBP_get_backup_files();

    if ($mode=="shell") $db_list=explode(",",$_POST['db']); elseif(!isset($_POST['db'][0])) $db_list=FALSE; else $db_list=$_POST['db'];

    if ($db_list) {
        foreach($db_list as $export_db) {
            $backupfile=PMBP_dump($export_db,($_POST['tables']=="on"),($_POST['data']=="on"),($_POST['drop']=="on"),$_POST['zip'],$_POST['comments']);
            
        }
    } 


} 

   // echo  "<div align='center'> <font size='+2'> Backup Database  DBNETMANPRO COMPLETE ...... </font></div>";
   
   
   


}

?>

<br>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="170">
<tr>
	<td width="10%"></td>
	<td width="80%" valign="top">
<?php

include_once("definitions.php");
readfile(JAVASCRIPTS);
// used variables
if (!isset($_GET['import'])) $_GET['import']=FALSE;
if (!isset($_GET['imp_ALL'])) $_GET['imp_ALL']=FALSE;
if (!isset($_GET['del'])) $_GET['del']=FALSE;
if (!isset($_GET['del_ALL'])) $_GET['del_ALL']=FALSE;
if (!isset($_GET['empty_ALL'])) $_GET['empty_ALL']=FALSE;
if (!isset($_GET['del_all'])) $_GET['del_all']=FALSE;
if (!isset($_GET['empty_all'])) $_GET['empty_all']=FALSE;

// if first use or no db-connection possible
if (!$con=@mysql_connect($CONF['sql_host'],$CONF['sql_user'],$CONF['sql_passwd'])) echo "<div class=\"red\">".I_SQL_ERROR."</div>";

// if importing sql
if ($_GET['import'] || $_GET['imp_ALL']) {

    // get start time to calculate duration
    $starttime=time();

    if ($_GET['import']) {
        $import_files[]=$_GET['import'];
    } else {
        $all_files=PMBP_get_backup_files();
        foreach($all_files as $file) {
            $db=PMBP_file_info("db","./".EXPORT_DIR.$file);
            $time=PMBP_file_info("time","./".EXPORT_DIR.$file);

			// define variable and set time
            if (!isset($last_files[$db])) $last_files[$db][1]=-1;
            
            // update time
            if ($time>$last_files[$db][1]) {
               	$last_files[$db][0]=$file;
               	$last_files[$db][1]=$time;
			}
        }
        if (isset($last_files)) foreach($last_files as $last_file) $import_files[]=$last_file[0];
    }

    if (isset($import_files)) foreach($import_files as $import_file) {

        // set php timelimit
        @set_time_limit($CONF['timelimit']);
        ignore_user_abort(TRUE);

        $data_queries=array();
        $drop_queries=array();
        $table_queries=array();
        $db=@mysql_select_db(PMBP_file_info("db","./".EXPORT_DIR.$import_file));
        
        // uncrompress gziped backup files
        if (($comp=PMBP_file_info("comp","./".EXPORT_DIR.$import_file))=="gzip") {
            $lines=PMBP_ungzip("lines","./".EXPORT_DIR.$import_file);
        } elseif ($comp=="zip") {
            $lines=PMBP_unzip("lines","./".EXPORT_DIR.$import_file);
        } else {
            $lines=file("".EXPORT_DIR.$import_file);
        }

        // divide insert and create sql queries
        // $table is set to TRUE if the next line belongs to a create sql query
        $table=FALSE;
			$charset = "SET NAMES 'tis620'"; 
			mysql_query($charset);
	        foreach($lines as $line){
            $line=trim($line);
            
            // the last line did not belong to a 'create' sql query
            if (!$table) {
            
                // this line does not, too
                if (strtolower(substr($line,0,6))=="insert") {
                    $data_queries[]=substr($line,0,strlen($line)-1);

                // this line does not, too
                } elseif (strtolower(substr($line,0,20))=="drop table if exists") {
                    $drop_queries[]=substr($line,0,strlen($line)-1);

                // this line does!
                } elseif (strtolower(substr($line,0,6))=="create") {
                    $table=TRUE;
                    $table_queries[]=$line."\n";
                }

            // the current line belongs to a create sql query
            } else {

                // create sql query ending in this line
                if (strtolower(substr($line,0,1))==")") $table=FALSE;
                $table_queries[count($table_queries)-1] .= $line."\n";
            }
        }

		$sql_error=FALSE;

        // execute drop tables if exists queries
        if (is_array($drop_queries)) {
            foreach($drop_queries as $drop_query) {
                $sql_error=FALSE;
                if (!@mysql_query($drop_query)) {
                    $sql_error=TRUE;
                    if ($CONF['import_error']) echo nl2br($drop_query)."\n<div class=\"bold_left\">".mysql_error()."</div><br>\n";
                }
            }
        }

        // execute create tables queries
        if (is_array($table_queries)) {
            foreach($table_queries as $table_query) {
                $sql_error=FALSE;
                if (!mysql_query($table_query)) {
                    $sql_error=TRUE;
                    if ($CONF['import_error']) echo nl2br($table_query)."\n<div class=\"bold_left\">".mysql_error()."</div><br>\n";
                }
            }
        }

        // execute insert data queries
        if (is_array($data_queries)) {
            foreach($data_queries as $data_query) {
                $sql_error=FALSE;
                if (!@mysql_query($data_query)){
                    if ($CONF['import_error']) echo $data_query."\n<div class=\"bold_left\">".mysql_error()."</div><br>\n";
                    $sql_error=TRUE;
                }
            }
        }
        
        // show number successful executed querys or if an error did occur
        if ($sql_error==1) echo "<div class=\"red\">".IM_ERROR.".</div>\n";
            else echo "<div class=\"green\">".IM_SUCCESS." ".count($table_queries)." ".IM_TABLES." ".count($data_queries)." ".IM_ROWS."</div>\n";
    }
    echo "<div class=\"bold\">".F_DURATION.": ".$duration=time()-$starttime." ".F_SECONDS."</div>\n";
}

// remove old backup files and get list of backup files
$all_files=PMBP_get_backup_files();

// delete ALL backup files if the link was clicked
if ($_GET['del_ALL']) {
    if (is_array($all_files))
    foreach($all_files as $filename) {
        PMBP_delete_backup_files($filename);
    }
    echo "<div class=\"green\">".B_DELETED_ALL.".</div>\n";
}

// empty ALL db if the link was clicked
if ($_GET['empty_ALL']) {
    $all_db=PMBP_get_db_list();
    foreach($all_db as $dbname) {
        $db=mysql_select_db($dbname,$con);
        $res=mysql_list_tables($dbname,$con);
        for ($i=0;$i<mysql_num_rows($res);$i++) {
            $row=mysql_fetch_row($res);
            $tablename=$row[0];
            mysql_query("drop table `".$tablename."`",$con);
        }
    }

    $error=mysql_error();
    if ($error) echo $error; else echo "<div class=\"green\">".B_EMPTIED_ALL.".</div>\n";
}

// empty db if the link was clicked
if ($_GET['empty_all']) {
    $db=mysql_select_db($_GET['empty_all']);
    $res=mysql_list_tables($_GET['empty_all']);
    for ($i=0;$i<mysql_num_rows($res);$i++) {
        $row=mysql_fetch_row($res);
        $tablename=$row[0];
        mysql_query("drop table `".$tablename."`");
    }
    $error=mysql_error();
    if ($error) echo $error; else echo "<div class=\"green\">".B_EMPTIED.".</div>\n";
}

// delete all backup files of selected db if the link was clicked
if ($_GET['del_all']) {
    if (is_array($all_files))
    foreach($all_files as $filename) {
        if ($_GET['del_all']==PMBP_file_info("db","./".EXPORT_DIR.$filename)) {
            PMBP_delete_backup_files($filename);
        }
    }
    echo "<div class=\"green\">".B_DELETED_ALL.".</div>\n";
}

// delete selected backup file if the link was clicked
if ($_GET['del']) {
    echo $out=PMBP_delete_backup_files($_GET['del']);
    echo "<div class=\"green\">".B_DELETED.".</div>\n";
}

// get new list of backup files
$all_files=PMBP_get_backup_files();

echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"0\" width=\"100%\">\n";

// list all backup files
if (is_array($all_files)) {
    $last_backup=0;
    $size_sum=0;

    // print html table
    foreach($all_files as $filename) {
        $file="./".EXPORT_DIR.$filename;
        
        // generate one row for the db name
        if (!isset($printed_title[$db=PMBP_file_info("db",$file)])) {
            $printed_title[$db]=TRUE;
            echo "<tr><th colspan=\"8\">".$db." <span class=\"standard\">".PMBP_confirm(B_CONF_EMPTY_DB,"sysadmin_backup.php?empty_all=".$db,"[".B_EMPTY_DB."]");
            echo "&nbsp;".PMBP_confirm(B_CONF_DEL_ALL,"index.php?sessiontab=5&sub=1&del_all=".$db,"[".B_DELETE_ALL."]")."</span></th></tr>\n";
        }

        echo "<tr>\n<td class=\"list\">\n".$filename."</td>\n";
        echo "<td class=\"list\">".strftime($CONF['date'],$time=PMBP_file_info("time",$file))."</td>\n";
        if ($time>$last_backup) $last_backup=$time;
        $size_sum+=$size=PMBP_file_info("size",$file);
        $size=PMBP_size_type($size);
        echo "<td class=\"list\">".$size['value']." ".$size['type']."</td>\n";
        echo "<td class=\"list\"><a href=\"get_file.php?download=true&view=".$filename."\">".B_DOWNLOAD."</td>\n";
        if ($con) echo "<td class=\"list\">".PMBP_confirm(B_CONF_IMP,"index.php?sessiontab=5&sub=1&import=".$filename,B_IMPORT,$CONF['confirm'])."</td>\n";
            else echo "<td class=\"list\">".B_IMPORT."</td>\n";
        echo "<td class=\"list\">".PMBP_confirm(B_CONF_DEL,"index.php?sessiontab=5&sub=1&del=".$filename,B_DELETE,$CONF['confirm'])."</td>\n</tr>\n";
    }
    
    $size_sum=PMBP_size_type($size_sum);
    echo "<tr><td colspan=\"7\"><br><div class=\"bold\">".B_SIZE_SUM.": ".$size_sum['value']." ".$size_sum['type']." - ".B_LAST_BACKUP.": ".strftime($CONF['date'],$last_backup)."</div></td></tr>\n";
}

echo"</table>\n";

?>
</td>

<td width="10%"></td>

</tr>
</table>




