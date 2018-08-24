<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingPlanA" style="background-color:#3399ff;padding:4px;">
			<h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#planb" aria-expanded="false" aria-controls="planb">
					<font size='3' style='font-weight:bold' >ไอคอนตำแหน่ง</font>
				</a>
			</h4>
		</div>
		<div id="planb" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPlanA">
			<div class="panel-body">
				
				          <table>
             <?
     
            $rs = mysql_query("SELECT * FROM ".$dbprefix."position order by posid");
            for($i=0;$i<mysql_num_rows($rs);$i++){
                $posid[$i] = mysql_result($rs,$i,'posshort');
                $imgPosDef[mysql_result($rs,$i,'posshort')] = "./images/".mysql_result($rs,$i,'posimg');
                $tabUPosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posutab');
                //$tabDPosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posdtab');
                $namePosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posname');
            }
            $posid[$i] = "null";
            $imgPosDef[$posid[$i]] = "./images/balls_11.gif";
            $tabUPosDef[$posid[$i]] = "#EEEEEE";
            //$tabDPosDef[$posid[$i]] = mysql_result($rs,$i,'posdtab');
            $namePosDef[$posid[$i]] = "ไม่มีสมาชิก";
            mysql_free_result($rs);
   
            for($i=0;$i<sizeof($posid)/2;$i++){
                echo "<tr>";
                echo "<td height='35' width='40' bgcolor='".($GLOBALS["treeformat"]=="sqare"?$tabUPosDef[$posid[2*$i]]:"")."'>";
                if($GLOBALS["treeformat"]!="sqare")
                echo "<img src='".$imgPosDef[$posid[2*$i]]."' width='70%'>";
                echo "</td><td>";
                echo "&nbsp;".$namePosDef[$posid[2*$i]];
                if(!($posid[2*$i]=="" || $posid[2*$i]=="null"))
                    echo " (".$posid[2*$i].")&nbsp;&nbsp;";
                echo "</td>";
                if((2*$i+1)>=sizeof($posid)){
                    echo "<td>&nbsp;</td><td>&nbsp;</td></tr>";
                    break;
                }
                echo "<td width='40' bgcolor='".($GLOBALS["treeformat"]=="sqare"?$tabUPosDef[$posid[2*$i+1]]:"")."'>";
                if($GLOBALS["treeformat"]!="sqare")
                echo "<img src='".$imgPosDef[$posid[2*$i+1]]."' width='70%'>";
                echo "</td><td>";
                echo "&nbsp;".$namePosDef[$posid[2*$i+1]];
                if(!($posid[2*$i+1]=="" || $posid[2*$i+1]=="null"))
                    echo " (".$posid[2*$i+1].")";

                echo "</td>";
                echo "</tr>";

            }
            ?>
			
        </table>   
				
			</div>
		</div>
	</div>
</div>





