<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
						   
	$('#add-row').click(function(){
								
		var tr = $('<tr></tr>');
		var td1 = $('<td>#</td>');
		var td2 = $('<td>mouse</td>');
		
		tr.append(td1);
		tr.append(td2);
		
		$('#tbl-product').append(tr);
								
	});
						   
						   
})
</script>
<title>Untitled Document</title>
</head>
<body>
<table border="1" id="tbl-product">
  <tr>
    <th>#</th>
    <th>product</th>
  </tr>
  <tr>
    <td>1</td>
    <td>cat</td>
  </tr>
</table>
<p><input type="button" name="add-row" id="add-row" value="เพิ่มแถว" /></p>
</body>
</html>