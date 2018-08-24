<script src="./ckeditor/ckeditor.js"></script>
<link href="sample.css" rel="stylesheet">
 <script>
	CKEDITOR.on( 'instanceReady', function( evt ) {
		var editor = evt.editor;
		if ( editor.tabIndex == 1 )
			editor.focus();
	});

</script>

<?
	if($_GET['id']){

		//$date = date("Y-m-d");
		//echo "--".$_GET['uid'];
		$sql = "SELECT * FROM ".$dbprefix."news WHERE id='".$_GET['id']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">ไม่พบข้อมูลตามเงื่อนไข</font></td></tr><tr>
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=5&sub=4';">ไปหน้าข้อมูลผู้ใช้ระบบ</a>]</td></tr></table><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			$head=$row->head;
			$body=$row->body;
			$date=$row->dates;
			$status=$row->status;
			$popup=$row->popup;
		}
	}else{
			$head="";
			$body="";
			$dates="";
			$status="";
			$popup="";
			$date = date("Y-m-d");
	}
?>		
	<form method="post" action="newsoperate.php?state=<?=$_GET['id']==""?0:1?>"> 
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
      <tr>
	  <input type="hidden" name="id" value="<?=$id?>" />
	   <input type="hidden" name="date" value="<?=$date?>" />
        <td colspan="2" align="center"><fieldset>
        <legend><b>ประกาศ</b></legend>
        <table align="center">
			<tr>
              <td>หัวเรื่อง <font color="#ff0000">*</font></td>
              <td colspan="2">&nbsp;<input type="text" name="head" size='120' required  value="<?=$head?>" /></td>
          </tr>
          <tr>


              <td  align="right" valign="top" >เนื้อหา<font color="#ff0000">*</font></td>	
			              <td colspan="2">&nbsp;		  
			  <textarea class="ckeditor" cols="80" id="editor4" name="body"   required   rows="10" tabindex="1"><?=$body?></textarea>
			  
			  </td>
        </tr>
          <tr>
			 <td width="43%" valign="top" align="right" >Show</td>
           <td width="57%" nowrap>&nbsp;&nbsp;<input type="checkbox" name="st" value="Y" <?=$status=='Y'?"checked":""?> />
           yes
                </td>

			    </tr>
          <tr style="display:none;">
			 <td width="43%" valign="top" align="right" >Popup</td>
           <td width="57%" nowrap>&nbsp;&nbsp;<input type="checkbox" name="popup" value="Y" <?=$popup=='Y'?"checked":""?> />
           yes
                </td>

			    </tr>
          </table>
        	<hr width="50%" /><font color="#808080"><u>หมายเหตุ</u></font> <font color="#ff0000">*</font><font color="#808080">=จำเป็นต้องกรอกข้อมูล</font> 
        </fieldset></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr>
        <td width="34%" align="right" valign="top" >&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td width="34%" align="right" valign="top" >&nbsp;</td>
        <td colspan="2">&nbsp;
            <input  type="submit" value="บันทึก" name="B1" />
          &nbsp;
            <input type="reset" value="ยกเลิก" name="B2" onclick="window.location='index.php?sessiontab=5&sub=20'"/></td>
      </tr>
    </table>
</form>