<?
	function dialogbox($width,$color,$msg,$link){
        ?><table width=<?=$width?> bgcolor="<?=$color?>">
        	<tr valign="top">
            <td align="center"><font color="#FFFFFF"><?=$msg?></font></td>
        	</tr>
            <?
            if($link!=""){
				?><tr valign="top">
            	<td align="center" bgcolor="#FFFFFF"><?=$link?></td>
        		</tr><?
			}
			?>
        </table><? 
	}
?>