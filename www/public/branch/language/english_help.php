<?php
/*
 +--------------------------------------------------------------------------+
 | phpMyBackupPro                                                           |
 +--------------------------------------------------------------------------+
 | Copyright (c) 2004-2005 by Dirk Randhahn                                 |
 | http://sourceforge.net/projects/phpmybackup/                             |
 | Version information can be found in definitions.php.                     |
 |                                                                          |
 | This program is free software; you can redistribute it and/or            |
 | modify it under the terms of the GNU General Public License              |
 | as published by the Free Software Foundation; either version 2           |
 | of the License, or (at your option) any later version.                   |
 |                                                                          |
 | This program is distributed in the hope that it will be useful,          |
 | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            |
 | GNU General Public License for more details.                             |
 |                                                                          |
 | You should have received a copy of the GNU General Public License        |
 | along with this program; if not, write to the Free Software              |
 | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307,USA.|
 +--------------------------------------------------------------------------+
*/

chdir("..");
include_once("definitions.php");

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\"
   \"http://www.w3.org/TR/html4/loose.dtd\">
<html".ARABIC_HTML.">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=".BD_CHARSET_HTML."\">
<link rel=\"stylesheet\" href=\"./../".STYLESHEET_DIR.$CONF['stylesheet'].".css\" type=\"text/css\">
<title>phpMyBackupPro - ".F_HELP."</title>
</head>
<body>
<table border=\"0\" cellspacing=\"2\" cellpadding=\"0\" width=\"100%\">\n
<tr><th colspan=\"2\" class=\"active\"><span class=\"pmbp1\">php</span><span class=\"pmbp2\">MyBackup</span><span class=\"pmbp3\">Pro</span><span class=\"pmbp4\"> ".VERSION."</span></th></tr>
";

// choose help text
switch(preg_replace("'^.*/'","",$_GET['script'])) {
    case 'index.php': $filename=F_START;
    $html="Click help on each of the different pages to get specific help for its content.<br>
    More information you can find here: <a href=\"http://sourceforge.net/projects/phpmybackup/\" target=\"_blank\">http://sourceforge.net/projects/phpmybackup/</a><br>
    Please report bugs and spelling errors there.";
    break;
    case 'config.php': $filename=F_CONFIG;
    $html="There are two levels of configuration: the basic and the extended configuration. You do not have to care about the extended configuration.
	The * indicates that this item may not be blank.<br><br>
	Basic configuration:<br>
	".C_SITENAME.": Give this system a name like e.g. 'production server'.<br>
	".C_LANG.": Change the language of phpMyBackupPro. Your can download several language packages on the phpMyBackupPro project site.<br>
	".C_SQL_HOST.": Enter your MySQL host e.g. 'localhost'.<br>
	".C_SQL_USER.": Enter your MySQL username.<br>
	".C_SQL_PASSWD.": Enter your MySQL password.<br>
	".C_SQL_DB.": If you want only use one database on the server, you can enter the name of this database here.<br>
	".C_FTP_USE.": Check this if you want to use FTP functions to upload your backups automatically to a FTP server.<br>
	".C_FTP_SERVER.": Enter the IP or URL of you FTP server.<br>
	".C_FTP_USER.": Enter your FTP loginname.<br>
	".C_FTP_PASSWD.": Enter your FTP password.<br>
	".C_FTP_PATH.": Enter a path to a directory on the FTP server where you want your backups stored.<br>
	".C_FTP_PASV.": Check this to use passive FTP.<br>
	".C_FTP_PORT.": Enter the port on which your FTP server is available. Default port is 21.<br>
	".C_FTP_DEL.": Check this to have the backup files on the FTP server automatically deleted when they are deleted locally.<br>
	".C_EMAIL_USE.": Check this to send your backups automatically per Email.<br>
	".C_EMAIL.": Enter the email address to which you want to send the backups.<br><br>
	Extended configuration:<br>
	".C_STYLESHEET.": Choose a stylesheet for phpMyBackupPro. Your can download and upload stylesheets on the phpMyBackupPro project site.<br>
	".C_DATE.": Choose your favorite date format.<br>
	".C_LOGIN.": You can switch to HTTP authentification if you want to.<br>
	".C_DEL_TIME.": Specify a number of days after which the backup files are automatically deleted. Set to blank or 0 to disable this function.<br>
	".C_DEL_NUMBER.": Spezify a max number of backup files which are stored for each database.<br>
	".C_TIMELIMIT.": Increase the PHP timelimit if you have problems with doing backups or imports. Will have no consequence if PHP safe mode is on.<br>
	".C_CONFIRM.": Choose which actions on the import site need to be confirmed.<br>
	".C_IMPORT_ERROR.": Check this to receive a list of import errors if some occur.<br>
	".C_NO_LOGIN.": Check this to disable the login function. This is not recommended as everyone would get access to you database!";
    break;
    case 'import.php': $filename=F_IMPORT;
    $html="Here you can see all currently stored local backup files.<br>
    You can get more information by clicking 'info'.<br>
    By clicking 'view', you can read the backup file.<br>
    To download the backup file click '".B_DOWNLOAD."'.<br>
    Click 'import' to re-import the file in the db. Before this you can empty the db by clicking 'empty database'.<br>
    To delete a backup file click 'delete'. You can delete all files belonging to one database by clicking 'delete all backups'.<br><br>
    Click 'empty ALL databases' to empty all available databases, click 'import ALL backups' to import the latest backup of each database,
    click 'delete ALL backups' to delete all available backup files.";
    break;
    case 'backup.php': $filename=F_BACKUP;
    $html="Here you can select wich databases you want to backup.<br>
    A comment will be saved to each backup file.<br>
    You can choose if just the table structure, the data or both will be stored.<br>
    Add a 'drop table if exists ...' row to each table structure by clicking 'add drop table'<br>
    You can also choose the compression format for the backup files. Maybe on your systems, not all formats are available.
    The zip format is still experimental. Confirm if the zip backup files work all right!<br><br>
	If you have activated the ftp backup function, you also can backup whole directories to your ftp server.<br>
	The here choosen directories and their files will be copied to the '".C_FTP_PATH."' configured on the '".F_CONFIG."' page.<br>
	Sub-directories must be specified by their own. It is not possible to compress or email the files.";
    break;
    case 'export_script.php': $filename=F_SCHEDULE;
    $html="To automate the backup, you can generate some code to include in any existing PHP script.<br>
    When this script then is loaded, the backup automatically starts. You can decide in which periods the backup will run.<br><br>
    Next choose where the script will be located later. The directory phpMyBackupPro.".VERSION." must not be moved after this!
	(If you have knowledge of coding PHP you can change the path later.)<br><br>
	A click on '".EXS_SHOW."' will show you a script, you can use for doing the scheduled backup. Copy the code and include it into an existing file,
	or use '".C_SAVE."' to save the script automatically to the here entered filename! This will overwrite an existing file with the same name!<br>
	Note: The file must be in the directory selected on the previous page in order to work correctly!<br>
    The backup will only run, if anybody opens this script! You can include it into an existing PHP file or use a frame set with an invisible frame.<br><br>
    All configurations you made will work in this script!<br> You can find more information about the backup options in the 'backup' help.";
    break;
    case 'db_info.php': $filename=F_DB_INFO;
    $html="Here you can see a small summary of your databases.<br><br>
    In the column 'number of rows' you can find the sum of the number of rows from all tables.<br>
    If a database contains tables, you can click 'tables info' to get the names, number of cols, number of rows and size of all tables of the respective database.<br>
    The sizes may differ from the sizes of backup files because of additional data needed in the backup files.";
    break;
    case 'sql_query.php': $filename=F_SQL_QUERY;
    $html="This page is to send simple sql queries to the database.<br><br>
    You can select a database on which you want to run the queries.<br>
    You can insert one or more sql queries in the textbox.<br>
    Queries like 'select ...' will return a result table.<br>
    Some queries like 'delete ...' will only tell you '".SQ_SUCCESS."'<br><br>
    If you upload a file to be executed you will receive an error message for each error that has happened! (and this could be a lot!)<br>
    The last error message contains a list of all queries, which generated errors. An 'F' before a number of the query means this query was in the file.<br><br>
    These functions are not mature yet! There is no guarantee that all correct queries can be processed succesfully!";
    break;
    default: $html="Sorry, no help available for this site.";
}

echo "<tr>\n<td>\n";
if ($filename) echo "<br><div class=\"bold_left\">Help for ".$filename.":</div><br>\n";
echo $html;
echo "</td>\n</tr>\n</table>\n</body>\n</html>";
?>
