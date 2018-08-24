<?
//include_once("./prefix.php");
class chartGenerator{
	private $maxLevel = 3;
	private $numChild;
	
	private $startCode;
	
	public function setMaxLevel($level){
		$this->maxLevel = $level;
	}
	public function setNumChild($num){
		$this->numChild = $num;
	}
	public function setStartCode($code){
		$this->startCode = $code;
	}
	
	public function showChart(){
		$dbprefix = "nmp_";
	//$stk_size = 0;
		$stk_size = 0;
		for($i=0;$i<$this->maxLevel;$i++){
			$stk_size = pow($this->numChild,$i) + $stk_size;
		}
		$k=0;
		/*$mcode[$k] = $this->startCode;
		$rs=mysql_query("select * from ".$dbprefix."member where mcode='$mcode[$k]' ");
		echo "select * from ".$dbprefix."member where mcode='$mcode[$k]' ";
		$upa_code[$mcode[$k]] = mysql_result($rs,0,'upa_code');
		$name_t[$mcode[$k]] = mysql_result($rs,0,'name_t');
		$position[$mcode[$k]] = mysql_result($rs,0,'pos_cur');*/
		$rs=mysql_query("select * from ".$dbprefix."member ORDER BY id ASC LIMIT ".$stk_size);
		while(sizeof($mcode)<$stk_size){
				$obj = mysql_fetch_object($rs);
			//for($j=0;$j<$this->numChild;$j++){
				/*if($mcode[$k] == ""){
					$i = sizeof($mcode);
					for($l=0;$l<$this->numChild;$l++){
						$mcode[$i+$l] = "";
					}
					break;
				}*/
				//echo "select * from ".$dbprefix."member where upa_code='$stk[$k]' ";
				//if(mysql_num_rows($rs)>0){
					$i = sizeof($mcode);
					$mcode[$i] = $obj->mcode;
					$upa_code[$mcode[$i]] = $obj->upa_code;
					$name_t[$mcode[$i]] = $obj->name_t;
					$position[$mcode[$i]] = $obj->pos_cur;
				//}else{
					//break;
					//$mcode[sizeof($mcode)] = "";
				//}
				//$k++;
			//}
		}//end while
		print_r($mcode);
		//print_r($name_t);
		//$mcode = array(1,2,3,4,5,6,7,8,9,0);
		echo "<table cellspacing='0' cellpadding='0'  border='1' >";
		$swap = 0;
		$k=0;
		for($i=1;$i<=$this->maxLevel;$i++){
			if($i>1){	
				echo "<tr valign=top>";
				for($j=0;$j<pow($this->numChild,$i-1);$j++,$k++){
					if(($j%$this->numChild)==0 || ($j%$this->numChild)==($this->numChild-1)){
						$bg = "";
					}else{
						$bg = "background='./images/link_h.gif'";
					}
					if(($j%$this->numChild)==0){
						$str_align = "align='right'";
					}else if(($j%$this->numChild==($this->numChild-1))){
						$str_align = "align='left'";
					}else{
						$str_align = "align='center'";
					}
					echo "<td ".$str_align." ".$bg." colspan=".(pow($this->numChild,$this->maxLevel+1)/pow($this->numChild,$i)).">";
					if(($j%$this->numChild)==($this->numChild-1)){
						echo "<img src='./images/link_h.gif' width='49%' height='6'>";
					}
					if(($j%$this->numChild)==0){
						echo "<img src='./images/link_rl.gif'>";
					}else if(($j%$this->numChild)==($this->numChild-1)){
						echo "<img src='./images/link_rl.gif'>";
					}else{
						echo "<img src='./images/link_c.gif'>";
					}
					if(($j%$this->numChild)==0){
						echo "<img src='./images/link_h.gif' width='49%' height='6'>";
					}
					echo "</td>";
				}	
				$k -= $j;
				echo "</tr>";
			}//end of chart level!=1
			for($j=0;$j<pow($this->numChild,$i-1);$j++){			//pos  j
				echo "<td  align=center colspan=".(pow($this->numChild,$this->maxLevel+1)/pow($this->numChild,$i)).">";
				//echo ($mcode[$k]==""?"&nbsp;":$mcode[$k]);
				echo "<table cellspacing=0 cellpadding=0 width='35' border='0'>";
					echo "<tr width=\"35\">";
					echo "	<td colspan=2 valign=top align=center>";
					if($mcode[$k]!=""){
						if($k==0 && $upa_code[$k]!="")
							echo "<img src='images/go_upa_code.gif' border='0' style='cursor:pointer;' onClick='parent.location.href=\"./index.php?sessiontab=1&sub=4&cmc=".$upa_code[$k]."\"' \><br>";
						//if($position[$k]=='E'){
						$ind = $k+($swap==0?(pow($this->numChild,$i-1)-1-(2*$j)):0);
						echo $mcode[$ind]."<br>".$name_t[$mcode[$ind]]."<br>";
						if($i==($this->maxLevel)){
							$sql = "SELECT * FROM ".$dbprefix."member WHERE upa_code='$mcode[$k]' LIMIT ".$this->numChild;
							//echo $sql;
							$rs = mysql_query($sql);
							if(mysql_num_rows($rs)>0){
								echo "<br><img src='./images/arrow_down.gif'>";
							}
						}
					}else{
					?>
						<table width="10" border="1">
							  <tr>
								<td>
							<?
								$mcindex=($k-$j)-pow($this->numChild,$i-2)+floor(($j)/$this->numChild);
								$tablink="";
								if($mcode[$mcindex]!="")
									$tablink = "style='cursor:pointer;' onClick='parent.location.href =\"./index.php?state=2&sessiontab=1&sub=2&upa_code=".$mcode[$mcindex]."&upa_name=".$name_t[$mcindex]."&lr=".($j%$this->numChild+1)."\"' ";
			
							?>
							<table <?=$tablink?> width="10" border="0" cellpadding="0" cellspacing="0" bgcolor="#E4E4E4">
							  <tr align="center">
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td align="center">&nbsp;</td>
							  </tr>
							</table>
							</td>
						  </tr>
						</table>
					<?
					}
					echo "</td>";
					echo "</tr>";
					echo "</table>";
				echo "</td>";
				$k++;
			}
			++$swap;
			$swap %= 2;
			echo "</tr>";
		}	
		echo "</table>";
	}
}
?>