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

/*basic data*/
define('BD_LANG_SHORTCUT',"en"); // used for the php function setlocale()
define('BD_DATE_FORMAT',"%x %X"); // used for the php function strftime()
define('BD_CHARSET_HTML',"iso-8859-1"); // the charset used in you language for html
define('BD_CHARSET_EMAIL',"iso-8859-15"); // the charset used in your langauge for MIME-emails

/*functions.inc.php*/
define('F_START',"start");
define('F_CONFIG',"configuration");
define('F_IMPORT',"import");
define('F_BACKUP',"backup");
define('F_SCHEDULE',"schedule backup");
define('F_DB_INFO',"database info");
define('F_SQL_QUERY',"sql queries");
define('F_HELP',"help");
define('F_LOGOUT',"logout");
define('F_FOOTER',"Visit the <a href=\"http://sourceforge.net/projects/phpmybackup/\">phpMyBackupPro project site</a> for new releases and news.");
define('F_NOW_AVAILABLE',"A new version of phpMyBackupPro is now available on <a href=\"http://sourceforge.net/projects/phpmybackup/\">http://sourceforge.net/projects/phpmybackup/</a>");
define('F_SELECT_DB',"Select databases to backup");
define('F_SELECT_ALL',"select all");
define('F_COMMENTS',"Comments");
define('F_EX_TABLES',"export tables");
define('F_EX_DATA',"export data");
define('F_EX_DROP',"add 'drop table'");
define('F_EX_COMP',"compression");
define('F_EX_OFF',"none");
define('F_EX_GZIP',"gzip");
define('F_EX_ZIP',"zip");
define('F_FTP_1',"FTP connection failed to server");
define('F_FTP_2',"Failed to login with user");
define('F_FTP_3',"FTP upload failed");
define('F_FTP_4',"File succesfully uploaded as");
define('F_FTP_5',"FTP delete of file '%s' failed");
define('F_FTP_6',"File '%s' succesfully deleted on FTP server");
define('F_FTP_7',"File '%s' not available on FTP server");
define('F_MAIL_1',"One receivers email is wrong");
define('F_MAIL_2',"This mail was sent by phpMyBackupPro ".VERSION." http://sourceforge.php/projects/phpmybackup/ running on");
define('F_MAIL_3',"coudn't be read");
define('F_MAIL_4',"MySQL backup from");
define('F_MAIL_5',"Mail coudn't be sent");
define('F_MAIL_6',"Files succesfully send by email to");
define('F_YES',"yes");
define('F_NO',"no");
define('F_DURATION',"Duration");
define('F_SECONDS',"seconds");
define('F_WRONG_FILE',"This seems not to be the correct .zip file, but it could also be a bug in phpMyBackupPro");

/*index.php*/
define('I_SQL_ERROR',"ERROR: Please insert your correct MySQL data in the 'configuration'!");
define('I_NAME',"This is phpMyBackupPro");
define('I_WELCOME',"phpMyBackupPro is free software licensed under the GNU GPL.<br><br>
For help try the online help or visit <a href=\"http://sourceforge.net/projetcs/phpmybackup/\">http://sourceforge.net/projects/phpmybackup/</a>.<br>
You can find information about the version history in history.txt.<br><br>
Choose in the top menu what you want to do next!<br>If this is your first time using phpMyBackupPro you should start with the configuration!<br>
The rights of the directory 'export', the file in it named 'date.dat' and the file 'global_conf.php' must be set to 0777 or 0666.");
define('I_CONF_ERROR',"The file ".GLOBAL_CONF." is not writeable!");
define('I_DIR_ERROR',"The directory ".EXPORT_DIR." is not writeable!");
define('I_COMMENT_ERROR',"The file ".EXPORT_DIR."comments.dat is not writeable!");
define('I_DATE_ERROR',"The file ".EXPORT_DIR."date.dat is not writeable!");

/*config.php*/
define('C_SITENAME',"sitename");
define('C_LANG',"language");
define('C_SQL_HOST',"MySQL hostname");
define('C_SQL_USER',"MySQL username");
define('C_SQL_PASSWD',"MySQL password");
define('C_SQL_DB',"Only this database");
define('C_FTP_USE',"use FTP?");
define('C_FTP_SERVER',"FTP server (url or IP)");
define('C_FTP_USER',"FTP username");
define('C_FTP_PASSWD',"FTP password");
define('C_FTP_PATH',"FTP path");
define('C_FTP_PASV',"use passive ftp?");
define('C_FTP_PORT',"FTP port");
define('C_FTP_DEL',"delete files on FTP server");
define('C_EMAIL_USE',"use email?");
define('C_EMAIL',"email address");
define('C_STYLESHEET',"skin");
define('C_DATE',"date style");
define('C_DEL_TIME',"delete local backups after x days");
define('C_DEL_NUMBER',"store max x files per database");
define('C_TIMELIMIT',"php timelimit");
define('C_IMPORT_ERROR',"show import errors?");
define('C_NO_LOGIN',"disable login function?");
define('C_LOGIN',"HTTP authentication?");
define('C_CONFIRM',"confirmation level");
define('C_CONFIRM_1',"empty, delete, import");
define('C_CONFIRM_2',"... all");
define('C_CONFIRM_3',"... ALL");
define('C_CONFIRM_4',"don't confirm anything");

define('C_BASIC_VAL',"Basic configuration");
define('C_EXT_VAL',"Extended configuration");
define('C_TITLE_SQL',"SQL data");
define('C_TITLE_FTP',"Backup per FTP");
define('C_TITLE_EMAIL',"Backup per email");
define('C_TITLE_STYLE',"Style of phpMyBackupPro");
define('C_TITLE_DELETE',"Automatic deletion of backup files");
define('C_TITLE_CONFIG',"Further configuration items");
define('C_WRONG_TYPE',"is wrong!");
define('C_WRONG_SQL',"MySQL data are wrong!");
define('C_WRONG_DB',"MySQL database name is wrong!");
define('C_WRONG_FTP',"FTP data are wrong!");
define('C_OPEN',"Can't open");
define('C_WRITE',"Can't write in");
define('C_SAVED',"Data successfully saved");
define('C_WRITEABLE',"is not writeable");
define('C_SAVE',"Save data");

/*import.php*/
define('IM_ERROR',"An error occured. Use 'empty database' to make sure the database does not contain any tables");
define('IM_SUCCESS',"Successfully imported");
define('IM_TABLES',"tables and");
define('IM_ROWS',"rows");

define('B_EMPTIED_ALL',"All databases were succesfully emptied");
define('B_EMPTIED',"The database was succesfully emptied");
define('B_DELETED',"The file was succesfully deleted");
define('B_DELETED_ALL',"All files were succesfully deleted");
define('B_NO_FILES',"There are currently no backup files");
define('B_DELETE_ALL_2',"delete ALL backups");
define('B_IMPORT_ALL',"import ALL backups");
define('B_EMPTY_ALL',"empty ALL databases");
define('B_EMPTY_DB',"empty database");
define('B_DELETE_ALL',"delete all backups");
define('B_INFO',"info");
define('B_VIEW',"view");
define('B_DOWNLOAD',"download");
define('B_IMPORT',"import");
define('B_DELETE',"delete");
define('B_CONF_EMPTY_DB',"Do you really want to empty the database?");
define('B_CONF_DEL_ALL',"Do you really want to delete all backups of this database?");
define('B_CONF_IMP',"Do you really want to import this backup?");
define('B_CONF_DEL',"Do you really want to delete this backup?");
define('B_CONF_EMPT_ALL',"Do you really want to empty ALL databases?");
define('B_CONF_IMP_ALL',"Do you really want to import ALL last backups?");
define('B_CONF_DEL_ALL_2',"Do you really want to delete ALL backups?");
define('B_LAST_BACKUP',"Last backup built on");
define('B_SIZE_SUM',"Total size of all backups");

/*backup.php*/
define('EX_SAVED',"File successfully saved as");
define('EX_NO_DB',"No database selected");
define('EX_EXPORT',"Backup");
define('EX_NOT_SAVED',"Could not store database %s");
define('EX_DIRS',"Select directories to backup to FTP server");
define('EX_DIRS_MAN',"Enter more directories pathes relative to phpMyBackupPro directory. Seperate with ','");

/*export_script.php*/
define('EXS_PERIOD',"Select backup period");
define('EXS_PATH',"Select directory where the php file will be placed");
define('EXS_BACK',"back");
define('EXS_HOUR',"hour");
define('EXS_HOURS',"hours");
define('EXS_DAY',"day");
define('EXS_DAYS',"days");
define('EXS_WEEK',"week");
define('EXS_WEEKS',"weeks");
define('EXS_MONTH',"month");
define('EXS_SHOW',"Show script");
define('EXS_INCL',"Include this script in the php file you want to do the backup job");

/*file_info.php*/
define('INF_INFO',"info");
define('INF_DATE',"Date");
define('INF_DB',"Database");
define('INF_SIZE',"Backup size");
define('INF_COMP',"Is compressed");
define('INF_DROP',"Contains 'drop table'");
define('INF_TABLES',"Contains tables");
define('INF_DATA',"Contains data");
define('INF_COMMENT',"Comments");
define('INF_NO_FILE',"No file selected");

/*db_status.php*/
define('DB_NAME',"name of database");
define('DB_NUM_TABLES',"number of tables");
define('DB_NUM_ROWS',"number of rows");
define('DB_SIZE',"size");
define('DB_DIFF',"Size can differ from size of backup files!");
define('DB_NO_DB',"No databases available");
define('DB_TABLES',"tables info");
define('DB_TAB_TITLE',"tables of database ");
define('DB_TAB_NAME',"name of table");
define('DB_TAB_COLS',"number of fields");

/*sql_query.php*/
define('SQ_ERROR',"Errors occured in queries number");
define('SQ_SUCCESS',"Successfully executed");
define('SQ_RESULT',"Query result");
define('SQ_AFFECTED',"Number of affected rows");
define('SQ_WARNING',"Attention: This page is only build to send simple sql queries to the databases. Being careless can delete your databases!");
define('SQ_SELECT_DB',"Select database");
define('SQ_INSERT',"Insert your sql query here");
define('SQ_FILE',"Upload sql file");
define('SQ_SEND',"Run");

/*login.php*/
define('LI_MSG',"Please login (use your MySQL username and password)");
define('LI_USER',"username");
define('LI_PASSWD',"password");
define('LI_LOGIN',"Login");
define('LI_LOGED_OUT',"Safely loged out!");
define('LI_NOT_LOGED_OUT',"Not safely logged out!<br>To safely logout enter a WRONG password");
?>
