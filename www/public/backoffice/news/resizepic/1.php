<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<form name="form1" enctype="multipart/form-data" method="post" action="">
  <table width="900" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="216" valign="top"><div align="right">รูป  : </div></td>
      <td width="684"><input name="file" type="file" ></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="addnews" type="submit" id="addnews" value="ส่งข้อมูลเข้าสู่ดาต้าเบส" /></td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST["addnews"]))
{
  $images = $_FILES["file"]["tmp_name"];
  $width = 210;
  $size=GetimageSize($images);
  $height=round($width*$size[1]/$size[0]);
  $images_orig = ImageCreateFromJPEG($images);
  $photoX = ImagesX($images_orig);
  $photoY = ImagesY($images_orig); 
  $images_fin = ImageCreateTrueColor($width, $height); 
  ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY); 
  ImageJPEG($images_fin,$file_name);
  ImageJPEG($images_fin,$file); 
  ImageDestroy($images_orig);
  ImageDestroy($images_fin); 
  $picture = $file_name;
  echo '<img src="',$picture,'">';
}
?>