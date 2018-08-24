<?
$file = realpath('http://www.cci-system.com/image2text/112233.jpg');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://api.newocr.com/v1/upload?key=api_key');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, array('file' => '@'.$file));
$result = curl_exec($ch);
//var_dump($file);
echo $result;
curl_close ($ch);
?>