<?
   $name=$_FILES['torrentfile']['name'];
   $what=$_FILES['torrentfile']['tmp_name'];
   $hid=$_POST['MAX_FILE_SIZE'];
   echo"filename : $name<br />What : $what <br>hid=$hid";
?>

