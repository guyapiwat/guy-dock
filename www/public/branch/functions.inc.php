<?php

// standard debug function
function PMBP_debug($object) {
    echo "<pre>";
    print_r($object);
    echo "</pre>";
}


// prints the basis html header in the $lang language with $scriptname scriptname
function PMBP_print_header($scriptname) {
    global $CONF;
    echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\"
   \"http://www.w3.org/TR/html4/loose.dtd\">
<html".ARABIC_HTML.">
<head>
<title>phpMyBackupPro ".VERSION."</title>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=".BD_CHARSET_HTML."\">
<link rel=\"stylesheet\" href=\"".STYLESHEET_DIR.$CONF['stylesheet'].".css\" type=\"text/css\">
";
    readfile(JAVASCRIPTS);
    // define menue
    $menu=array("index.php"=>F_START,"config.php"=>F_CONFIG,"import.php"=>F_IMPORT,"backup.php"=>F_BACKUP,"export_script.php"=>F_SCHEDULE,"db_info.php"=>F_DB_INFO,"sql_query.php"=>F_SQL_QUERY,"HELP"=>"HELP","login.php?logout=TRUE"=>F_LOGOUT);
    $simple_width=110;
    $width=count($menu)*$simple_width;
    
    echo "</head>
<body>
<table width=\"".$width."\">
 <colgroup>
  <col span=\"".count($menu)."\" width=\"".$simple_width."\">
 </colgroup>
 <tr>
  <th colspan=\"".count($menu)."\" class=\"active\"><span class=\"pmbp1\">php</span><span class=\"pmbp2\">MyBackup</span><span class=\"pmbp3\">Pro</span><span class=\"pmbp4\"> ".VERSION."</span></th>
 </tr>
 <!-- MENU -->
 <tr>
";

    // generate menu
    foreach($menu as $filename=>$title) {

        // print active link
        if ($filename==$scriptname) {
            echo "  <th  class=\"active\">\n   <a href=\"".$filename."\">".$title."</a>\n  </th>\n";

        // generate popup link for right help file
        } elseif ($title=="HELP")  {
            echo "  <th>\n   ";
            if (!file_exists("./".LANGUAGE_DIR.$CONF['lang']."_help.php")) echo PMBP_pop_up("./".LANGUAGE_DIR."english_help.php?script=".$scriptname,F_HELP,"help");
                else echo PMBP_pop_up("./".LANGUAGE_DIR.$CONF['lang']."_help.php?script=".$scriptname,F_HELP,"help");
            echo "\n  </th>\n";
            
        // print disabled logout link
        } elseif ($filename=="login.php?logout=TRUE" && $CONF['no_login']=="1" && !$CONF['login']) {
            echo "  <th>\n   ".$title."\n  </th>\n";

        // print lasting menu
        } else {
            echo "  <th>\n   <a href=\"".$filename."\">".$title."</a>\n  </th>\n";
        }
    }


    echo " </tr>
</table>
<table width=\"".$width."\">
 <colgroup>
  <col width=\"20\">
  <col width=\"*\">
  <col width=\"20\">
 </colgroup>
 <tr>
  <td>
    &nbsp;
  </td>
  <td class=\"main\">
<!-- HEADER END -->
";
}


// print basis html footer
function PMBP_print_footer() {
    echo "\n<!-- FOOTER -->
  </td>
  <td>
    &nbsp;
  </td>
 </tr>
</table>
<table width=\"990\">
 <tr>
  <th colspan=\"9\" class=\"active\">
   ".F_FOOTER."
  </th>
 </tr>
";
    // check if there is a good internet connection, if it is check for a newer version of phpMyBackupPro
    // do this only once per session
    if (!isset($_SESSION['version'])) exec("ping -n 1 -w 1000 -l 8 phpmybackup.sourceforge.net",$dontcare,$ping_res);
    if (!isset($_SESSION['version']) && !$ping_res) {
        $_SESSION['version']=FALSE;
        @set_time_limit("15");
        $last_vers=file("http://phpmybackup.sourceforge.net/vers.php?v=".VERSION);
        $_SESSION['version']=$last_vers[0];
    } else {
        $_SESSION['version']=FALSE;
    }
    if ($_SESSION['version']) echo "\n <tr>
  <td class=\"red\">
    ".F_NOW_AVAILABLE." !!!
  </td>
 </tr>
";
$tmp=phpversion();
$phpvers=$tmp[0].$tmp[1].$tmp[2];
if ($phpvers<4.3) echo "<tr><td>PHP ".$tmp." detected. It is not recommended to use phpMyBackupPro with PHP < PHP 4.3. You can disable this message if you want in functions.inc.php line ".__LINE__.".</td></tr>";


echo "</table>
</body>
</html>
";
}


// prints html export form used on several pages
function PMBP_print_export_form() {
    global $CONF;
    echo "<table border=0>\n<tr>\n<td>\n";
    echo F_SELECT_DB.":\n";
    echo "</td>\n<td width=\"30\">&nbsp;</td><td>";
    echo F_COMMENTS.":";
    echo "</td>\n</tr><tr>\n<td>";
    echo "<select name=\"db[]\" multiple=\"multiple\" size=\"10\">\n";
    if (!$con=@mysql_connect($CONF['sql_host'],$CONF['sql_user'],$CONF['sql_passwd']));

    // find the availabe compression methods and set which are disabled and which is selected
    $disabled_off=FALSE;
    if (!@function_exists("gzopen")) $disable_gzip=" disabled"; else $disable_gzip=" selected";
    if (!@function_exists("gzcompress")) $disable_zip=" disabled"; else $disable_zip=" selected";
    if ($disable_gzip!=" selected" && $disable_zip!=" selected") $disable_off=" selected";
        elseif($disable_gzip==" selected" && $disable_zip==" selected") $disable_zip="";
    foreach(PMBP_get_db_list() as $db) echo "<option value=\"".$db."\">".$db."</option>\n";
    echo "</select>\n<br>";
    echo PMBP_set_select("backup","db[]","[".F_SELECT_ALL."]");
    echo "\n</td>\n<td>&nbsp;</td>\n<td>\n";
	echo "<textarea name=\"comments\" rows=\"7\" cols=\"80\"></textarea>\n<br>
<input type=\"checkbox\" name=\"tables\" checked>".F_EX_TABLES." |
<input type=\"checkbox\" name=\"data\" checked>".F_EX_DATA." |
<input type=\"checkbox\" name=\"drop\" checked>".F_EX_DROP." |
".F_EX_COMP."
<select name=\"zip\">
<option".$disabled_off." value=\"\">".F_EX_OFF."</option>
<option".$disable_gzip." value=\"gzip\">".F_EX_GZIP."</option>
<option".$disable_zip." value=\"zip\">".F_EX_ZIP."</option>
</select>\n</td>\n</tr>\n</table>\n";

	// show directory backup form
	if ($CONF['ftp_use']) {
	echo "<br>";
	$dirs1=PMBP_get_dirs("../");

    echo "<table border=0>\n<tr>\n<td>\n";
    echo EX_DIRS.":<br>\n";
    echo "</td>\n<td width=\"30\">&nbsp;</td><td>";
	echo EX_DIRS_MAN.":<br>\n";
    echo "</td>\n</tr><tr>\n<td>";
	echo "<select name='dirs[]' multiple=\"multiple\" size=\"10\">";
    foreach($dirs1 as $value) echo "<option value=\""."../".$value."\">"."../".$value."</option>\n";
	echo "</select>\n</div>\n";
    echo "\n</td>\n<td>&nbsp;</td>\n<td>\n";
	echo "<textarea type=\"text\" rows=\"7\" cols=\"50\" name=\"man_dirs\"></textarea>";
	echo "</td>\n</tr>\n</table>\n";
	}
}


// generates javascript 'select all in input select' link
function PMBP_set_select($form,$select,$link){
    return $html="<a href=\"\" onclick=\"setSelect('".$form."','".$select."'); return false;\">".$link."</a>";
}


// generates javascript PMBP_pop_up link
function PMBP_pop_up($path,$link,$type){
    return $html="<a href='javascript:popUp(\"".$path."\",\"".$type."\")'>".$link."</a>";
}


// generates javascript confirm dialog
function PMBP_confirm($text,$path,$link){
    global $CONF;
    switch ($CONF['confirm']) {
        case 0: return "<a href='javascript:confirmClick(\"".$text."\",\"".$path."\")'>".$link."</a>";
        case 1: {
            if (strstr($path,"all") || strstr($path,"ALL")) return "<a href='javascript:confirmClick(\"".$text."\",\"".$path."\")'>".$link."</a>";
                else return "<a href=\"".$path."\">".$link."</a>";
        }
        case 2: {
            if (strstr($path,"ALL")) return "<a href='javascript:confirmClick(\"".$text."\",\"".$path."\")'>".$link."</a>";
                else return "<a href=\"".$path."\">".$link."</a>";
        }
        case 3: return "<a href=\"".$path."\">".$link."</a>";
    }
}


// generates a dump of $db database
// $tables and $data set whether tables or data to backup. $comment sets the commment text
// $drop and $zip tell if to include the drop table statement or dry to pack
function PMBP_dump($db,$tables,$data,$drop,$zip,$comment) {
    global $CONF;
    
    // set max string size before writing to file
    $max_size=1048576*2; // 2 MB
    
    // set backupfile name
    if ($zip=="gzip") $backupfile=$db.".".$time=time().".sql.gz";
        elseif($zip=="zip") $backupfile=$db.".".($time=time()).".sql.zip";
            else $backupfile=$db.".".$time=time().".sql";
                    
    if ($con=@mysql_connect($CONF['sql_host'],$CONF['sql_user'],$CONF['sql_passwd'])) {

        // select db
        @mysql_select_db($db);

        //create comment
        $out="# MySQL dump of database '".$db."' on host '".$CONF['sql_host']."'\n";
        $out.="# backup date and time: ".strftime($CONF['date'],$time)."\n";
        $out.="# built by phpMyBackupPro ".VERSION."\n";
        $out.="# http://sourceforge.net/projects/phpmybackup/\n\n";

        // write users comment
        if ($comment) {
            $out.="# comment:\n";
            $comment=preg_replace("'\n'","\n# ","# ".$comment);
            foreach(explode("\n",$comment) as $line) $out.=$line."\n";
            $out.="\n";
        }
        
        $out.="use ".$db.";\n";

        // get auto_increment values and names of all tables
        $res=mysql_query("show table status");
        while($row=@mysql_fetch_array($res)) {
            $tablename=$row['Name'];
            $auto_incr[$tablename]=$row['Auto_increment'];

            $out.="\n\n";
            // export tables
            if ($tables) {
                $out.="### structure of table `".$tablename."` ###\n\n";
                $res1=mysql_query("SHOW CREATE TABLE `".$tablename."`");
                $table_sql=mysql_fetch_array($res1);
                if ($drop) $out.="DROP TABLE IF EXISTS `".$tablename."`;\n\n";
				$out.=$table_sql["Create Table"];

                // add auto_increment value
                if ($auto_incr[$tablename]) {
                    $out.=" AUTO_INCREMENT=".$auto_incr[$tablename];
                }
                $out.=" ;";
            }
            $out.="\n\n\n";
            
            // export data
            if ($data) {
                $out.="### data of table `".$tablename."` ###\n\n";

				// check if field types are NULL or NOT NULL
				$res3=mysql_query("show columns from `".$tablename."`");
				for ($j=0;$j<mysql_num_rows($res3);$j++){
					$row3=mysql_fetch_array($res3);
					$field_type[]=$row3[2];
				}
				
				$res2=mysql_query("select * from `".$tablename."`");
                for ($j=0;$j<mysql_num_rows($res2);$j++){
                    $out .= "insert into `".$tablename."` values (";
					$row2=mysql_fetch_row($res2);
					// run through each field
                    for ($k=0;$k<$nf=mysql_num_fields($res2);$k++) {
                        // identify null values and save them as null instead of ''
                        if ($field_type[$k]!="" && $row2[$k]=="") $out .="null"; else $out .="'".mysql_escape_string($row2[$k])."'";
                        if ($k<($nf-1)) $out .=", ";
                    }
                $out .=");\n";
                if (strlen($out)>$max_size && $zip!="zip") $out=PMBP_save_to_file($backupfile,$zip,$out);
                }
            }
            if (strlen($out)>$max_size && $zip!="zip") $out=PMBP_save_to_file($backupfile,$zip,$out);
        }
        if (mysql_error()) return 0;
        @mysql_close($con);
        
        if ($zip=="zip") $zip=$time;
        $backupfile=PMBP_save_to_file($backupfile,$zip,$out);
        return $backupfile;
    } else {
        return true;
    }
}


// saves the string in $fileData to the file $backupfile as gz file or not ($zip)
// return $backupfile if name has changed (zip)
function PMBP_save_to_file($backupfile,$zip,$fileData) {
    if ($zip=="gzip") {
        $zp=gzopen("./".EXPORT_DIR.$backupfile,"a9");
        gzwrite($zp,$fileData);
        gzclose($zp);
        return $backupfile;
        
    // $zip contains the timestamp
    } elseif ($zip) {
        // based on zip.lib.php 2.2 from phpMyBackupAdmin
        // offical zip format: http://www.pkware.com/appnote.txt
        
        // End of central directory record
        $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";

        // "local file header" segment
        $unc_len=strlen($fileData);
        $crc=crc32($fileData);
        $zdata=gzcompress($fileData);

        // string needed for decoding (because of crc bug)
        $name_suffix=substr($zdata,-4,4);
        $name_suffix2="_";
        for($i=0;$i<4;$i++) $name_suffix2.=sprintf("%03d",ord($name_suffix[$i]));
        $backupfile=substr($backupfile,0,strlen($backupfile)-8).$name_suffix2.".sql.zip";
        $name=substr($backupfile,0,strlen($backupfile)-4);

        // fix crc bug
        $zdata=substr(substr($zdata,0,strlen($zdata)-4),2);
        $c_len=strlen($zdata);

        // dos time
        $timearray = getdate($zip);
        $dostime=(($timearray['year']-1980)<<25)|($timearray['mon']<<21)|($timearray['mday']<<16)|
            ($timearray['hours']<<11)|($timearray['minutes']<<5)|($timearray['seconds']>>1);
        $dtime=dechex($dostime);
        $hexdtime = "\x".$dtime[6].$dtime[7]."\x".$dtime[4].$dtime[5]."\x".$dtime[2].$dtime[3]."\x".$dtime[0].$dtime[1];
        eval('$hexdtime="'.$hexdtime.'";');

        // ver needed to extract, gen purpose bit flag, compression method, last mod time and date
        $sub1="\x14\x00"."\x00\x00"."\x08\x00".$hexdtime;

        // crc32, compressed filesize, uncompressed filesize
        $sub2=pack('V',$crc).pack('V',$c_len).pack('V',$unc_len);
        
        $fr="\x50\x4b\x03\x04".$sub1.$sub2;
        
        // length of filename, extra field length
        $fr.=pack('v',strlen($name)).pack('v',0);
        $fr.=$name;

        // "file data" segment and "data descriptor" segment (optional but necessary if archive is not served as file)
        $fr.=$zdata.$sub2;

        // now add to central directory record
        $cdrec="\x50\x4b\x01\x02";
        $cdrec.="\x00\x00";                // version made by
        $cdrec.=$sub1.$sub2;
        
         // length of filename, extra field length, file comment length, disk number start, internal file attributes, external file attributes - 'archive' bit set, offset
        $cdrec.=pack('v',strlen($name)).pack('v',0).pack('v',0).pack('v',0).pack('v',0).pack('V',32).pack('V',0);
        $cdrec.=$name;

        // combine data
        $fileData=$fr.$cdrec.$eof_ctrl_dir;
        
        // total # of entries "on this disk", total # of entries overall, size of central dir, offset to start of central dir, .zip file comment length
        $fileData.=pack('v',1).pack('v',1).pack('V',strlen($cdrec)).pack('V',strlen($fr))."\x00\x00";

        $fp=fopen("./".EXPORT_DIR.$backupfile,"a");
        fwrite($fp,$fileData);
        fclose($fp);
        return $backupfile;
        
	// uncompressed
    } else {
        $fp=fopen("./".EXPORT_DIR.$backupfile,"a");
        fwrite($fp,$fileData);
        fclose($fp);
		return $backupfile;
    }
}


// deletes $files backup files from $server ftp server in $path path using $user username and $pass password
function PMBP_ftp_del($files) {
    global $CONF;
    $out=FALSE;

    // try to connect to server using username and passwort
    if (!$conn_id=@ftp_connect($CONF['ftp_server'],$CONF['ftp_port'])) {
        $out.="<div class=\"red\">".F_FTP_1." '".$CONF['ftp_server']."'!</div>";
    } else {
        if (!$login_result=@ftp_login($conn_id,$CONF['ftp_user'],$CONF['ftp_passwd'])) {
            $out.="<div class=\"red\">".F_FTP_2." '".$CONF['ftp_user']."'.</div>";
        } else {

            // succesfully connected
            if ($CONF['ftp_pasv']) ftp_pasv($conn_id,TRUE); else ftp_pasv($conn_id,FALSE);

            // get files in remote directory
            if (!$CONF['ftp_path']) $path="."; else $path=$CONF['ftp_path'];
            $remote_files=ftp_nlist($conn_id,$path);
            
			if (is_array($remote_files)) {
				// separate filename
				for($i=0;$i<count($remote_files);$i++)
				    if (strrchr($remote_files[$i],"/")) $remote_files[$i]=substr(strrchr($remote_files[$i],"/"),1);
            
	            // delete the files
				foreach($files as $filename) {
        	        if (in_array($filename,$remote_files)) {
            	        $dest_file=$path."/".$filename;

                 	   // try three times to delete
                    	$check=FALSE;
	                    for($i=0;$i<3;$i++) if (!$check) $check=@ftp_delete($conn_id,$dest_file);
    	                if (!$check) $out.="<div class=\"red\">".sprintf(F_FTP_5."</div>\n",$dest_file);
        	                else $out.="<div class=\"green\">".sprintf(F_FTP_6."</div>\n",$dest_file);
            	    } else {
                	    $out.="<div class=\"red\">".sprintf(F_FTP_7."<br>\n",$filename)."</div>\n";
	                }
    	        }
			}

            // close the FTP connection
            if (@function_exists("ftp_close")) @ftp_close($conn_id);
        }
    }
    return $out;
}


// saves $files backup files on $server ftp server in $path path using $user username and $pass password
function PMBP_ftp_store($files) {
    global $CONF;
    $out=FALSE;
    
    // try to connect to server using username and passwort
    if (!$conn_id=@ftp_connect($CONF['ftp_server'],$CONF['ftp_port'])) {
        $out.="<div class=\"red\">".F_FTP_1." '".$CONF['ftp_server']."'!</div>";
    } else {
        if (!$login_result=@ftp_login($conn_id,$CONF['ftp_user'],$CONF['ftp_passwd'])) {
            $out.="<div class=\"red\">".F_FTP_2." '".$CONF['ftp_user']."'.</div>";
        } else {

            // succesfully connected
            if ($CONF['ftp_pasv']) ftp_pasv($conn_id,TRUE); else ftp_pasv($conn_id,FALSE);
            if (!$CONF['ftp_path']) $path="."; else $path=$CONF['ftp_path'];
                
            // upload the files
            foreach($files as $filename) {
                $dest_file=$path."/".$filename;
                $source_file="./".EXPORT_DIR.$filename;

                // try three times to upload
                $check=FALSE;
                for($i=0;$i<3;$i++) if (!$check) $check=@ftp_put($conn_id,$dest_file,$source_file,FTP_BINARY);
                if (!$check) $out.="<div class=\"red\">".F_FTP_3.": '".$source_file."' -> '".$dest_file."'.</div>\n";
                    else $out.="<div class=\"green\">".F_FTP_4." '".$dest_file."'.</div>\n";
            }

            // close the FTP connection
            if (@function_exists("ftp_close")) @ftp_close($conn_id);
        }
    }
    return $out;
}


// send email with $attachments backup files to $email email using $sitename for sender and subject
function PMBP_email_store($attachments,$backup_info) {
    global $CONF;
    $out=FALSE;
    
    $all_emails=explode(",",$CONF['email']);
    $boundary_core=md5(uniqid(rand()));
    $boundary="\r\n--".$boundary_core."\r\n";
    
    // create header
    if (count($all_emails)>1) $headers="From: phpMyBackupPro on ".$CONF['sitename']." <".$all_emails[0].">\r\n";
        else $headers="From: phpMyBackupPro on ".$CONF['sitename']." <".$CONF['email'].">\r\n";
    $headers.="MIME-Version: 1.0\r\n";
    $headers.="Content-Type: multipart/mixed;";
    $headers.=" boundary=".$boundary_core."\r\n";
    
    // (1/3) begin mail (3 parts)
    $Msg="This is a multi-part message in MIME format.\r\n";
    $Msg.=$boundary;

    // (2/3) plain text
    $Msg.="Content-Type: text/plain; charset=".BD_CHARSET_EMAIL."\r\n";
    $Msg.="Content-Transfer-Encoding: 8bit\r\n\r\n";

    $Msg.=F_MAIL_2." '".$CONF['sitename']."'.\r\n";
    $trans=array_flip(get_html_translation_table(HTML_ENTITIES));
    $str_yes=strtr(F_YES,$trans);
    $str_no=strtr(F_NO,$trans);
    if ($backup_info['comp']=="gzip") $Msg.=strtr(INF_COMP,$trans).": gzip\r\n";
        elseif ($backup_info['comp']=="zip") $Msg.=strtr(INF_COMP,$trans).": zip\r\n";
            else $Msg.=strtr(INF_COMP,$trans).": ".$str_no."\r\n";
    if ($backup_info['drop']) $Msg.=strtr(INF_DROP,$trans).": ".$str_yes."\r\n"; else $Msg.=strtr(INF_DROP,$trans).": ".$str_no."\r\n";
    if ($backup_info['tables']) $Msg.=strtr(INF_TABLES,$trans).": ".$str_yes."\r\n"; else $Msg.=strtr(INF_TABLES,$trans).": ".$str_no."\r\n";
    if ($backup_info['data']) $Msg.=strtr(INF_DATA,$trans).": ".$str_yes."\r\n"; else $Msg.=strtr(INF_DATA,$trans).": ".$str_no."\r\n";
    $Msg.=INF_COMMENT.":\r\n".$backup_info['comments'];
    
    // (3/3) attachments
    foreach($attachments as $fileName) {
    	$Msg2=$boundary;
        $Msg2.="Content-Type: application/octet-stream; name=\"".$fileName."\"\r\n";

		// send plain text .sql files as quoted-printable
		if ($backup_info['comp']) $Msg2.="Content-Transfer-Encoding: base64\r\n"; else $Msg2.="Content-Transfer-Encoding: quoted-printable\r\n";
        $Msg2.="Content-Disposition: attachment; filename=\"".$fileName."\"\r\n\r\n";

        //file goes here
        $fileName=EXPORT_DIR.$fileName;
        if (!$fd=@fopen($fileName,"r")) {
            $out.="<div class=\"red\">".$fileName." ".F_MAIL_3."</div>\n";
        } else {
            $fileContent=@fread($fd,filesize($fileName));
            @fclose ($fd);

			// send plain text .sql files as plain text
			if ($backup_info['comp']) $fileContent=chunk_split(base64_encode($fileContent));
            $Msg2.=$fileContent;
            $Msg.=$Msg2;
        }
    }

	// send to all every addresses
    foreach($all_emails as $email) {
	    // verify email
    	if (!eregi("^\ *[‰ˆ¸ƒ÷‹a-zA-Z0-9_-]+(\.[‰ˆ¸ƒ÷‹a-zA-Z0-9\._-]+)*@([‰ˆ¸ƒ÷‹a-zA-Z0-9-]+\.)+([a-z]{2,4})$",$email)) {
        	$out.="<div class=\"red\">".F_MAIL_1."</div>\n";
			continue;
    	}
    }
    // send mail
   	if (!@mail($CONF['email'],strtr(F_MAIL_4." ".$CONF['sitename'],$trans),$Msg,$headers)) $out.="<div class=\"red\">".F_MAIL_5.".</div>\n";
        else $out.="<div class=\"green\">".F_MAIL_6." ".$CONF['email'].".</div>\n";
    
    return $out;
}


// returns actual local backup files after deleting backups files older then $deltime days
function PMBP_get_backup_files() {
    global $CONF;
    $delete_files=FALSE;
    $all_files=FALSE;
    $result_files=FALSE;
    $handle=@opendir("./".EXPORT_DIR);
    $remove_time=time()-($CONF['del_time']*86400);
    while ($file=@readdir($handle)) {
        if ($file!="." && $file!=".." && preg_match("'\.sql|\.sql\.gz|\.sql\.zip'",$file)) {
            
            // don't delete if del_time is false
            if (PMBP_file_info("time",$file)<$remove_time && $CONF['del_time']) $delete_files[]=$file; else $all_files[]=$file;
        }
    }
    
    // sort descending
    if (is_array($all_files)) rsort($all_files);
    
    // delete oldest backup files if there are to many for one db
    if ($CONF['del_number'] && is_array($all_files))
        foreach($all_files as $file) {
            if (!isset($counter[$db=PMBP_file_info("db","./".EXPORT_DIR.$file)])) $counter[$db]=1; else $counter[$db]++;
            if ($counter[$db]>$CONF['del_number']) $delete_files[]=$file; else $result_files[]=$file;
        }

    // now delete the files
    if ($delete_files) PMBP_delete_backup_files($delete_files);

    // sort ascending
    if (is_array($result_files)) sort($result_files);
    return $result_files;
}


// delete the file(s) in mixed $files from local export dir and remote ftp server
function PMBP_delete_backup_files($files) {
    global $CONF;
    $out=FALSE;
    if(!is_array($files)) $files=array($files);
    foreach($files as $file) @unlink("./".EXPORT_DIR.$file);
    if ($CONF['ftp_use'] && $CONF['ftp_del']) $out=PMBP_ftp_del($files);
    return $out;
}


// returns list of databases on $host host using $user user and $passwd password
function PMBP_get_db_list() {
    global $CONF;

    // if there is given the name of a database
    if ($CONF['sql_db']) return array($CONF['sql_db']);
    
    // else try to get a list of all available databases on the server
    $list=array();
    $con=@mysql_connect($CONF['sql_host'],$CONF['sql_user'],$CONF['sql_passwd']);
    $db_list=@mysql_list_dbs();
    while ($row=@mysql_fetch_array($db_list))
        if (@mysql_select_db($row['Database'])) $list[]=$row['Database'];
    return $list;
}


// in dependency on $mode different modes can be selected (see below)
function PMBP_file_info($mode,$path) {
    $filename=ereg_replace(".*/","",$path);
    $parts=explode(".",$filename);
    switch($mode) {
    
        // returns the name of the database a $path backup file belongs to
        case "db":
            return $parts[0];
        break;

        // returns the creation timestamp $path backup file
        case "time":
            return $parts[1];
        break;
        
        // returns "gz" if $path backup file is gziped
        case "gzip":
            if (isset($parts[3])) if ($parts[3]=="gz") return $parts[3];
        break;
        
        // returns "zip" if $path backup file is ziped
        case "zip":
            if (isset($parts[3])) if ($parts[3]=="zip") return $parts[3];
        break;
        
        // returns type of compression of $path backup file or no
        case "comp":
            if (PMBP_file_info("gzip",$path)) return "gzip"; elseif (PMBP_file_info("zip",$path)) return "zip"; else return F_NO;
        break;

        // returns the size of $path backup file
        case "size":
            return filesize($path);
        break;

        // returns yes if the backup file contains 'drop table if exists' or no if not
        case "drop":
            if (($comp=PMBP_file_info("comp",$path))=="gzip") $lines=PMBP_ungzip("lines",$path);
                elseif ($comp=="zip") $lines=PMBP_unzip("lines",$path);
                    else $lines=file($path);
            foreach($lines as $line){
                $line=trim($line);
                if (strtolower(substr($line,0,20))=="drop table if exists") return F_YES; else $drop=F_NO;
            }
            return $drop;

        break;
        
        // returns yes if the $path backup files contains tables or no if not
        case "tables":
            if (($comp=PMBP_file_info("comp",$path))=="gzip") $lines=PMBP_ungzip("lines",$path);
                elseif ($comp=="zip") $lines=PMBP_unzip("lines",$path);
                    else $lines=file($path);
            foreach($lines as $line){
                $line=trim($line);
                if (strtolower(substr($line,0,6))=="create") return F_YES; else $table=F_NO;
            }
            return $table;
        break;

        // returns yes if the $path backup files contains data or no if not
        case "data":
            if (($comp=PMBP_file_info("comp",$path))=="gzip") $lines=PMBP_ungzip("lines",$path);
                elseif ($comp=="zip") $lines=PMBP_unzip("lines",$path);
                    else $lines=file($path);
            foreach($lines as $line){
                $line=trim($line);
                if (strtolower(substr($line,0,6))=="insert") return F_YES; else $data=F_NO;
            }
            return $data;
        break;
        
        // returns the comment stored to the backup file
        case "comment":
            if (($comp=PMBP_file_info("comp",$path))=="gzip") $lines=PMBP_ungzip("lines",$path);
                elseif ($comp=="zip") $lines=PMBP_unzip("lines",$path);
                    else $lines=file($path);
            foreach($lines as $line){
                $line=trim($line);
                if (isset($comment) && substr($line,0,1)=="#") $comment.=substr($line,2)."<br>";
                    elseif(isset($comment) && substr($line,0,1)!="#") return $comment;
                if ($line=="# comment:") $comment=FALSE;
            }
            if (isset($comment)) return $comment; else return FALSE;
        break;
    }
}


// returns the content of the gziped $path backup file. use of $mode see below
function PMBP_ungzip($mode,$path) {
    $file_data=gzfile($path);
    // returns one string or an array of lines
    if ($mode!="lines") return implode("",$file_data); else return $file_data;
}


// returns the content of the ziped $path backup file. use of $mode see below
function PMBP_unzip($mode,$path) {
    $all=FALSE;
    $all=implode("",file($path));

    // convert path to name of ziped file
    $filename=ereg_replace(".*/","",$path);
    $filename=substr($filename,0,strlen($filename)-4);
	
    // compare filname in zip and filename from $_GET
    if(substr($all,30,strlen($filename))!=$filename) {

        // exit if names differ
        echo F_WRONG_FILE.".";
        exit;
    } else {

        // get the suffix of the filename in hex
        $crc_bugfix=substr(substr($filename,0,strlen($filename)-4),strlen($filename)-12-4);
        $suffix=FALSE;

        // convert hex to ascii
        for($i=0;$i<12;) $suffix.=chr($crc_bugfix[$i++].$crc_bugfix[$i++].$crc_bugfix[$i++]);

        // remove central directory information (we have always just one ziped file)
        $comp=substr($all,-(strlen($all)-30-strlen($filename)));
        $comp=substr($comp,0,(strlen($comp)-80-strlen($filename)));

        // fix the crc bugfix (see function save_to_file)
        $comp="xú".$comp.$suffix;
        $file_data=gzuncompress($comp);
    }

    // returns one string or an array of lines
    if ($mode!="lines") return $file_data; else return explode("\n",$file_data);
}


// determines the best size type for filesize $size and returns array('value'=xxx,'type'=yyy)
function PMBP_size_type($size) {
    $types=array("B","KB","MB","GB");
    for ($i=0; $size>1000; $i++,$size/=1024);
    $result['value']=round($size,2);
    $result['type']=$types[$i];
    return $result;
}


// get recursive directory list
function PMBP_get_dirs($dir) {
    $dirs=FALSE;
    $dir_handle=@opendir($dir);
    while ($file=@readdir ($dir_handle)) {
        if ($file!="." && $file!="..") {
            if (@is_dir($dir.$file)) {
                $dirs[]=$file."/";
                $tmp=PMBP_get_dirs($dir.$file."/");
                if (is_array($tmp))
					foreach($tmp as $value) $dirs[]=$file."/".$value;
            }
        }
    }
    return $dirs;
}


// get list of all files in directory
function PMBP_get_files($dir) {
    $dirs=FALSE;
    $dir=trim($dir);
	if ($dir_handle=@opendir($dir)) {
    	while (false!==($file=readdir($dir_handle))) {
    		if (!is_dir($dir.$file)) $dirs[]=$dir.$file;
    	}
    	@closedir($dir_handle);
	}
    return $dirs;
}


// transfer files $files to FPT servers dirs and create missing folders
function PMBP_save_FTP($files) {
    global $CONF;
    $out=FALSE;

    // try to connect to server using username and passwort
    if (!$conn_id=@ftp_connect($CONF['ftp_server'],$CONF['ftp_port'])) {
        $out.="<div class=\"red\">".F_FTP_1." '".$CONF['ftp_server']."'!</div>";
    } else {
        if (!$login_result=@ftp_login($conn_id,$CONF['ftp_user'],$CONF['ftp_passwd'])) {
            $out.="<div class=\"red\">".F_FTP_2." '".$CONF['ftp_user']."'.</div>";
        } else {

            // succesfully connected -> set passive and change to the right path
            if ($CONF['ftp_pasv']) ftp_pasv($conn_id,TRUE); else ftp_pasv($conn_id,FALSE);
            if (!$CONF['ftp_path']) $path="."; else $path=$CONF['ftp_path'];
			@ftp_chdir($conn_id,$path);
			
            // create all missing folders
            foreach($files as $filepath) {
                if (trim($filepath)) {
					$filepath=trim($filepath);
	                $folders=explode("/",$filepath);
    	            $filename=array_pop($folders);
					$deep=0;
            	    $all_folders="";
                	foreach($folders as $folder) {
                    	if ($folder != "." && $folder != "..") {
							if (! @ftp_chdir($conn_id,$folder)) {
								@ftp_mkdir($conn_id,$folder);
								@ftp_chdir($conn_id,$folder);
							}
							$all_folders.=$folder."/";
        	                $deep++;
                	    }
	                }
	                
	                // change back to $path
    	            $rel_path="";
        	        for ($i=0;$i<$deep;$i++) $rel_path.="../";
					@ftp_chdir($conn_id,$rel_path);
                
					// define the source and destination pathes
	                $dest_file=$all_folders.$filename;
    	            $source_file="./".$filepath;

        	        // try three times to upload
            	    $check=FALSE;
                	for($i=0;$i<3;$i++) if (!$check) $check=@ftp_put($conn_id,$dest_file,$source_file,FTP_BINARY);
	                if (!$check) $out.="<div class=\"red\">".F_FTP_3.": '".$source_file."' -> '".$dest_file."'.</div>\n";
    	                else $out.="<div class=\"green\">".F_FTP_4." '".$dest_file."'.</div>\n";
        	    }
            }

            // close the FTP connection
            if (@function_exists("ftp_close")) @ftp_close($conn_id);
        }
    }
    return $out;
}


// login module
function PMBP_auth () {
	header("WWW-Authenticate: Basic realm=\"phpMyBackupPro\"");
	header("HTTP/1.0 401 Unauthorized");
    echo LI_MSG."\n";
}
?>
