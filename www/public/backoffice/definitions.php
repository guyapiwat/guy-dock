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

// ---- modify these two lines to your file system ----- //

define('GLOBAL_CONF',"./global_conf.php");    // example: define('GLOBAL_CONF',"../../files/global_conf.php");
define('EXPORT_DIR',"./export/");             // example: define('EXPORT_DIR',"../../files/export/");

// ---- no need to modify anything more ---- //


// definitions
define('VERSION',"v.1.3");  // This is the version number of this phpMyBackupPro copy

define('MAIN_INC',"./functions.inc.php");
define('JAVASCRIPTS',"javascripts.js");
define('STYLESHEET_DIR',"stylesheets/");
define('LANGUAGE_DIR',"language/");
define('DATE_DAT',"date.dat");

// includes
if (!@include_once(GLOBAL_CONF)) {
    echo "global_conf.php not found.<br>Please read INSTALL and specify the global_conf.php path in definitions.php.";
    exit;
}
include_once(MAIN_INC);

// check if language was just changed in config.php
if (isset($_POST['lang']) && ereg_replace(".*/","",$_SERVER['PHP_SELF'])=="config.php") $CONF['lang']=$_POST['lang'];

// include language.inc.php
if (!file_exists("./".LANGUAGE_DIR.$CONF['lang'].".inc.php")) include_once("./".LANGUAGE_DIR."english.inc.php"); else include("./".LANGUAGE_DIR.$CONF['lang'].".inc.php");

// set local time to defined or environment var value
$tmp=phpversion();
$phpvers=$tmp[0].$tmp[1].$tmp[2];
if (defined("BD_LANG_SHORTCUT") AND $phpvers>=4.3) setlocale(LC_TIME,BD_LANG_SHORTCUT,BD_LANG_SHORTCUT."_".strtoupper('BD_LANG_SHORTCUT')); else setlocale(LC_TIME,"");

// special part for arabic language
if ($CONF['lang']=="arabic") define('ARABIC_HTML'," dir=\"rtl\""); else define('ARABIC_HTML',"");
?>
