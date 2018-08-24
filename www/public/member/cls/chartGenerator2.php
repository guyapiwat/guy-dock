<?
class chartGenerator{
	private $maxLevel = 3;
	private $cmpLevel = 0;
	private $numChild;
	private $dbPrefix;
	private $redctlink;
	private $emptyredctlink;
	private $goLrMost = false;
	private $lrDef = array(1,2,3);
	private $block = false;
	private $blockCode;
	private $altShow = false;
	
	private $startCode;
	private $imgDef = array(''=>"#009900");
	private $tabUDef;// = array(''=>"#009900");
	private $tabDDef;// = array(''=>"#81F58F");
	private $txtUDef = array(''=>"#FFFFFF");
	private $txtDDef = array(''=>"#000000");
	private $nullDef = "#E4E4E4";
	private $nullTypeDef = "COL"; //COL=color | IMG=image
	//private $imgShow = false;
	private $imgShow = false;
	private $add = false;
	
	public function setMaxLevel($level){
		$this->maxLevel = $level;
	}
	public function setScript($level){
		$this->maxLevel = $level;
	}
	public function setGoLrMost(){
		$this->goLrMost = true;
	}
	public function setLrDef($def){
		$this->lrDef = $def;
	}
	public function setPrefix($prefix){
		$this->dbPrefix = $prefix;
	}
	public function setShowAlt($flag){
		$this->altShow = $flag;
	}
	public function setNumChild($num){
		$this->numChild = $num;
	}
	public function setStartCode($code){
		$this->startCode = $code;
	}
	public function setLink($url){
		$this->redctlink = $url;
	}
	public function setEmptyLink($url){
		$this->add = true;
		$this->emptyredctlink = $url;
	}
	public function setPosImgDef($arrImg){
			$this->imgDef = $arrImg;
			$this->imgShow = true;
	}
	public function setNullChild($type,$nullImg){
			$this->nullDef = $nullImg;
			$this->nullTypeDef = $type;
			//$this->imgShow = true;
	}
	public function setPosTabDef($arrUTab,$arrDTab){
		if($arrUTab!="")
			$this->tabUDef = $arrUTab;
		if($arrDTab!="")
			$this->tabDDef = $arrDTab;
	}
	public function setPosTxtDef($arrUTxt,$arrDTxt){
		if($arrUTxt!="")
			$this->txtUDef = $arrUTxt;
		if($arrDTxt!="")
			$this->txtDDef = $arrDTxt;
	}
	public function script(){
		?>
		<script language="javascript" type="text/javascript">
			var IE = document.all?true:false
			
			// If NS -- that is, !IE -- then set up for mouse capture
			if (!IE) document.captureEvents(Event.MOUSEMOVE)
			
			// Set-up to use getMouseXY function onMouseMove
			document.onmousemove = getMouseXY;
			
			// Temporary variables to hold mouse x-y pos.s
			var tempX = 0
			var tempY = 0
			
			// Main function to retrieve mouse x-y pos.s

			function getMouseXY(e) {
			  if (IE) { // grab the x-y pos.s if browser is IE
				tempX = event.clientX + document.body.scrollLeft
				tempY = event.clientY + document.body.scrollTop
			  } else {  // grab the x-y pos.s if browser is NS
				tempX = e.pageX
				tempY = e.pageY
			  }  
			  // catch possible negative values in NS4
			  if (tempX < 0){tempX = 0}
			  if (tempY < 0){tempY = 0}  
			  // show the position values in the form named Show
			  // in the text fields named MouseX and MouseY
			}  				
			function alt(str){ 
				if(str!=""){
					str = "<table style='border:#000000 solid 1;' bgcolor='#FFFF99'><tr><td>"+str+"</td></tr></table>";
					document.getElementById('clsdivshow').innerHTML=str;
					document.getElementById('clsdivshow').style.top = tempY; 
					document.getElementById('clsdivshow').style.left = tempX+5;
    				document.getElementById('clsdivshow').style.visibility = "visible";
				}else
    				document.getElementById('clsdivshow').style.visibility = "hidden";
			}
			function divshow(divname,state,left,infor,right){ 
				if(state){
					str = "<table width='100%' style='border:#000000 solid 1;' bgcolor='#FFFF99'><tr>";
					str += "<td width='30%' align='right'>"+left+"</td><td width='40%' align='center'>"+infor+"</td><td width='30%' align='left'>"+right+"</td></tr></table>";
					parent.document.getElementById(divname).innerHTML=str;
					parent.document.getElementById(divname).style.top = tempY; 
					parent.document.getElementById(divname).style.left = tempX+5;
    				parent.document.getElementById(divname).style.visibility = "visible";
				}else
    				parent.document.getElementById(divname).style.visibility = "hidden";
			}
        </script>
		<?
	}
	public function setBlock($code){
		$this->blockCode = $code;
		$this->block = true;
	}
	public function lrMost($scode,$lr_val){
		$sql = "SELECT mcode,lr FROM ".$this->dbPrefix."member WHERE upa_code='$scode' AND lr='$lr_val' LIMIT 1 ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0)
			return $scode;
		else
			return $this->lrMost(mysql_result($rs,0,'mcode'),$lr_val);
	}
	public function isUp($scode,$testcode){
		$sql = "SELECT upa_code FROM ".$this->dbPrefix."member WHERE mcode='$testcode' LIMIT 1 ";
		$rs = mysql_query($sql);
		if($scode==$testcode)
			return false;
		if(mysql_num_rows($rs)<=0)
			return false;
		else if(mysql_result($rs,0,'upa_code')!=$scode)
			return $this->isUp($scode,mysql_result($rs,0,'upa_code'));
		else
			return true;
	}
	public function isLine($scode,$testcode){
		$sql = "SELECT upa_code FROM ".$this->dbPrefix."member WHERE mcode='$scode' LIMIT 1 ";
		$rs = mysql_query($sql);
		if($scode==$testcode)
			return true;
		if(mysql_num_rows($rs)<=0)
			return false;
		else if(mysql_result($rs,0,'upa_code')!=$testcode)
			return $this->isLine(mysql_result($rs,0,'upa_code'),$testcode);
		else
			return true;
	}
	public function showChart(){
		$scr = new memberScore();
		$scr->setPrefix($this->dbPrefix);
		$scr->calc();
		$style_l = "border-left:2 solid #000000;";
		$style_r = "border-left:2 solid #000000;";
		//$this->dbPrefix = "nmp_";
		$this->script();
	//$stk_size = 0;
		$stk_size = 0;
		for($i=0;$i<$this->maxLevel;$i++){
			$stk_size = pow($this->numChild,$i) + $stk_size;
		}
		$k=0;
		$mcode[$k] = $this->startCode;
		$rs=mysql_query("select * from ".$this->dbPrefix."member where mcode='$mcode[$k]' ");
		$upa_code[$mcode[$k]] = mysql_result($rs,0,'upa_code');
		$lr[$mcode[$k]] = mysql_result($rs,0,'lr');
		$name_b[$mcode[$k]] = mysql_result($rs,0,'name_b');
		$pos[$mcode[$k]] = mysql_result($rs,0,'pos_cur');
		while(sizeof($mcode)<$stk_size){
			for($j=0;$j<$this->numChild;$j++){
				if($mcode[$k] == ""){
					$i = sizeof($mcode);
					for($l=0;$l<$this->numChild;$l++){
						$mcode[$i+$l] = "";
					}
					break;
				}
				$rs=mysql_query("select * from ".$this->dbPrefix."member where upa_code='$mcode[$k]' and lr='".($j+1)."' ");
				//echo "select * from ".$this->dbPrefix."member where upa_code='$stk[$k]' and lr='$lr_def[$j]' ";
				if(mysql_num_rows($rs)>0){
					$i = sizeof($mcode);
					$mcode[$i] = mysql_result($rs,0,'mcode');
					$upa_code[$mcode[$i]] = mysql_result($rs,0,'upa_code');
					$lr[$mcode[$i]] = mysql_result($rs,0,'lr');
					$name_b[$mcode[$i]] = mysql_result($rs,0,'name_b');
					$pos[$mcode[$i]] = mysql_result($rs,0,'pos_cur');
				}else{
					$mcode[sizeof($mcode)] = "";
				}
			}$k++;
		}//end while
		//print_r($mcode);
		//print_r($name_b);
		echo "<div id='clsdivshow' style='position:absolute;' ></div>";
		echo "<table align='center' cellspacing='0' cellpadding='0'  border='0' >";
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
					//if($j==pow($this->numChild,$i-1)/2)
					//	$style_s = $style_l;
					//else if($j==pow($this->numChild,$i-1)/2+1)
					//	$style_s = $style_l;
					//else
					//	$style_s = "";
					echo "<td style='$style_s' ".$str_align." ".$bg." colspan=".(pow($this->numChild,$this->maxLevel+1)/pow($this->numChild,$i)).">";
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
			// bgcolor='".($j==pow($this->numChild,$i-1)/2?"#009900":"")."'
				//if($j==pow($this->numChild,$i-1)/2)
				//	$style_s = $style_l;
				//else if($j==pow($this->numChild,$i-1)/2+1)
				//	$style_s = $style_l;
				//else
				//	$style_s = "";
				unset($altOut);
				unset($altOver);
				echo "<td style='$style_s' align=center valign=top colspan=".(pow($this->numChild,$this->maxLevel+1)/pow($this->numChild,$i)).">";
				//echo ($mcode[$k]==""?"&nbsp;":$mcode[$k]);
				$wd = $i<$this->cmpLevel?160:42;
				$clspan = "colspan='".($i<$this->cmpLevel?2:1)."' ";
				echo "<table width='$wd' cellspacing='1' cellpadding='1' border='0'>"; 
				//if($i==0){
					echo "<tr width='$wd'>"; //width='42'
					echo "	<td colspan='2' align='center'>";
					if($mcode[$k]!=""){ //แสดงคะแนน ซ้าย ขวา
						$altOut = "onmouseout=\"divshow('divname',false,'','','');";
						$altOver = " onmouseover=\"divshow('divname',true,";
						$altOver .= "'ซ้าย : <font color=\'#00AA00\'>".number_format($scr->getSumPV($mcode[$k],1),0,'.',',')."</font> + ";
						$altOver .= "<font color=\'#0000EE\'>".number_format($scr->getCarryPV($mcode[$k],1),0,'.',',')."</font> PV',";
						$altOver .= "'ชื่อ ".$name_b[$mcode[$k]]."',";
						$altOver .= "'ขวา: <font color=\'#00AA00\'>".number_format($scr->getSumPV($mcode[$k],2),0,'.',',')."</font> + ";
						$altOver .= "<font color=\'#0000EE\'>".number_format($scr->getCarryPV($mcode[$k],2),0,'.',',')."</font> PV');";

						if($this->altShow){
							$altOut .= "alt('');";
							$altOver .= "alt('รหัส ".$mcode[$k]." ชื่อ ".$name_b[$mcode[$k]]."')\"";
						}
						$alt = $altOut."\" ".$altOver."\"";
						if($k==0 && $this->goLrMost){
							echo "<img src='images/go_upa_left.gif' border='0' style='cursor:pointer;' onClick='parent.location.href=\"".$this->redctlink.$this->lrMost($mcode[$k],$this->lrDef[0])."\"' alt='ซ้ายสุด ".$this->lrMost($mcode[$k],$this->lrDef[0])."' \>&nbsp;";
						}
						if($k==0 && $upa_code[$mcode[$k]]!=""){ 
							if($this->block==false){ 
								echo "<img src='images/go_upa_code.gif' border='0' style='cursor:pointer;' onClick='parent.location.href=\"".$this->redctlink.$upa_code[$mcode[$k]]."\"' alt='บน ".$upa_code[$mcode[$k]]."' \>";
							}else if(!$this->isUp($upa_code[$mcode[$k]],$this->blockCode)){
								echo "<img src='images/go_upa_code.gif' border='0' style='cursor:pointer;' onClick='parent.location.href=\"".$this->redctlink.$upa_code[$mcode[$k]]."\"' alt='บน ".$upa_code[$mcode[$k]]."' \>";
							}
						//if($position[$k]=='E'){
						}
						if($k==0 && $this->goLrMost){
							echo "&nbsp;<img src='images/go_upa_right.gif' border='0' style='cursor:pointer;' onClick='parent.location.href=\"".$this->redctlink.$this->lrMost($mcode[$k],$this->lrDef[sizeof($this->lrDef)-1])."\"' alt='ขวาสุด ".$this->lrMost($mcode[$k],$this->lrDef[sizeof($this->lrDef)-1])."' \>";
						}
						if($i==1)
							echo "<br>";
						//echo "</td></tr></table>";
						echo "<table width='$wd' cellpadding='0' $alt cellspacing='0' border='0'>";
						if($this->imgShow) //เมื่อมีการเซ็ตค่าให้มีการแสดงรูป
						$mypv=1000;
							$mypvm=999;
							$sql="select  SUM(tot_pv) as mypoint from ".$this->dbPrefix."asaleh where mcode='$mcode[$k]' ";
							$rs = mysql_query($sql);
							if(mysql_num_rows($rs)<=0){
								echo "<tr><td align='center' ><a href='".$this->redctlink."$mcode[$k]' target='_parent' ><img src='"."./images/balls_09.gif"."' border='0'></a></td></tr>";
							}else{
								$row = mysql_fetch_object($rs);
								$totmypoint=$row->mypoint;
									if($totmypoint >= $mypv){
										echo "<tr><td align='center' ><a href='".$this->redctlink."$mcode[$k]' target='_parent' ><img src='"."./images/balls_03.gif"."' border='0'></a></td></tr>";
									}elseif($totmypoint <= $mypvm && $totmypoint > 0){
										echo "<tr><td align='center' ><a href='".$this->redctlink."$mcode[$k]' target='_parent' ><img src='"."./images/balls_02.gif"."' border='0'></a></td></tr>";
									}else{
										echo "<tr><td align='center' ><a href='".$this->redctlink."$mcode[$k]' target='_parent' ><img src='"."./images/balls_09.gif"."' border='0'></a></td></tr>";
									}
								
							}
							//echo "<tr><td align='center' ><a href='".$this->redctlink."$mcode[$k]' target='_parent' ><img src='".$this->imgDef[$pos[$mcode[$k]]]."' border='0'></a></td></tr>";
						if($i<$this->cmpLevel){ //แสดงคะแนน ซ้าย ขวา
							echo "<tr><td align='left'>";
							echo "[ซ้าย : <font color=\'#00AA00\'>".number_format($scr->getSumPV($mcode[$k],1),0,'.',',')."</font>]";
							echo "</td><td align='right'>";
							echo "[ขวา : <font color=\'#00AA00\'>".number_format($scr->getSumPV($mcode[$k],2),0,'.',',')."</font>]";
							echo "</td></tr>";
							echo "<tr><td align='left'>";
							echo "[ซ้าย : <font color=\'#0000EE\'>".number_format($scr->getCarryPV($mcode[$k],1),0,'.',',')."</font>]";
							echo "</td><td align='right'>";
							echo "[ขวา : <font color=\'#0000EE\'>".number_format($scr->getCarryPV($mcode[$k],2),0,'.',',')."</font>]";
							echo "</td></tr>";
						}
						echo "<tr><td $clspan align='center' style='cursor:pointer;'  onClick='parent.location=\"".$this->redctlink."$mcode[$k]\"' bgcolor='".$this->tabUDef[$pos[$mcode[$k]]]."'><font color='".$this->txtUDef[$pos[$mcode[$k]]]."'>$mcode[$k]</font></td></tr>";
						echo "<tr><td $clspan align='center' style='cursor:pointer;' onClick='parent.location=\"".$this->redctlink."$mcode[$k]\"' bgcolor='".$this->tabDDef[$pos[$mcode[$k]]]."'><font color='".$this->txtDDef[$pos[$mcode[$k]]]."'>".substr($name_b[$mcode[$k]],0,strlen($mcode[0])-1)."</font></td></tr>";
						echo "</table>";
						if($i==($this->maxLevel)){
							$sql = "SELECT * FROM ".$this->dbPrefix."member WHERE upa_code='$mcode[$k]' LIMIT ".$this->numChild;
							//echo $sql;
							$rs = mysql_query($sql);
							if(mysql_num_rows($rs)>0){
								echo "<br><img src='./images/arrow_down.gif'>";
							}
						}
					}else{
						$alt = "onmouseout=\"alt('')\" onmouseover=\"alt('คลิกเพื่อเพิ่มข้อมูลสมาชิก')\"";
					?>
						<table width="35" border="0">
							  <tr valign="top">
								<td>
							<?
								$mcindex=($k-$j)-pow($this->numChild,$i-2)+floor(($j)/$this->numChild);
								$tablink="";
								if($mcode[$mcindex]!="")
									$tablink = "style='cursor:pointer;' onClick='parent.location.href=\"".$this->emptyredctlink."upa_code=".$mcode[$mcindex]."&upa_name=".$name_b[$mcode[$mcindex]]."&lr=".($j%$this->numChild+1)."\"' ";
								if(!$this->add) $tablink = "";
							?>
							<table <?=$tablink?>  <?=$tablink!=""?$alt:""?> width="42" height="42" style="background-position:top; background-repeat:no-repeat" border="0" cellpadding="0" cellspacing="0" <?=($this->nullTypeDef=="COL"?"bgcolor='".$this->nullDef."'":"background='".$this->nullDef."'")?> >
							  <tr valign="top" align="right">
								<td><?=$tablink==""?"&nbsp;":"<img src='./images/addmem.gif'>"?></td>
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
			echo "</tr>";
			$k -= $j;
			if($i==$this->maxLevel) break;
			echo "<tr align=center valign=top>";
			for($j=0;$j<pow($this->numChild,$i-1);$j++,$k++){			
				//elseif($j==pow($this->numChild,$i-1)/2)
				//	$style_s = $style_r;
				// if($j==pow($this->numChild,$i-1)/2)
				//	$style_s = $style_l;
				//else
				//	$style_s = "";
				//if($i!=1){
					echo "<td style='$style_s'  align=center colspan=".(pow($this->numChild,$this->maxLevel+1)/pow($this->numChild,$i)).">";
					echo "<img src='./images/link_v.gif'>";
					//else
					//	echo "&nbsp;";
					echo "</td>";
				//}
			}
			echo "</tr>";
			}	
		echo "</table>";
	}
}
?>

<?
//class ใช้หาคะแนน
class memberScore{
	private $dbPrefix = "nmp_";
	private $ret_sum_pv;
	private $ret_pcarry;
	public function setPrefix($prefix){
		$this->dbPrefix = $prefix;
	}
	public function calc(){
		$sql="SELECT * FROM ".$this->dbPrefix."member ORDER BY lr DESC";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode[$i] =$sqlObj->mcode;		
			$name_b[$i] =$sqlObj->name_b;		
			$upa_code[$mcode[$i]] = $sqlObj->upa_code;
			$lr[$mcode[$i]] = $sqlObj->lr;
			//$pos_cur[$mcode[$i]] = $sqlObj->pos_cur;
			//$pos_new[$mcode[$i]] = $sqlObj->pos_cur;
			$sum_pv[$mcode[$i]][1] =0;
			$sum_pv[$mcode[$i]][2] =0;
			$pcarry[$mcode[$i]][1] =0;
			$pcarry[$mcode[$i]][2] =0;
		}
		
		
		$sql="SELECT rcode,fdate,tdate FROM ".$this->dbPrefix."around WHERE calc='1' ORDER BY rcode DESC LIMIT 1";
		//echo $sql;
		$rs = mysql_query($sql);
		$where_cause = "";
		$max_rcode = 0;
		if(mysql_num_rows($rs)>0){
			$where_cause = "AND sadate>'".mysql_result($rs,0,'tdate')."' ";
			$max_rcode = mysql_result($rs,0,'rcode');
		}
		$sql="SELECT * FROM ".$this->dbPrefix."asaleh  WHERE sa_type!='Q' $where_cause ORDER BY sadate"; //AND (sa_type='T' OR sa_type='P') AND sa_type='A'
		//echo $sql;
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;
		}
		mysql_free_result($rs);
		for($i=0;$i<sizeof($mcode);$i++){
			//if($exp_date[$mcode[$i]]=='' || $exp_date[$mcode[$i]]<=0) continue; //ไม่รักษายอดทิ้งไปเลย
			$up = $mcode[$i];
			while($up <> ""){
				if($up == "") break;
				//if($exp_date[$upa_code[$up]]=='' || $exp_date[$upa_code[$up]]<=0){ $up = $upa_code[$up];continue;} //ไม่รักษายอดทิ้งไปเลย
				if($upa_code[$up] <>""){
					$sum_pv[$upa_code[$up]][$lr[$up]] += $tot_pv[$mcode[$i]];
					if($tot_pv[$mcode[$i]] > 0)
						$count[$upa_code[$up]][$lr[$up]]++;
				}
				$up = $upa_code[$up];
			}
		}
		$sql="SELECT * FROM ".$this->dbPrefix."ambonus WHERE rcode='$max_rcode'";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$pcarry[$sqlObj->mcode][1] = $sqlObj->carry_l;
			$pcarry[$sqlObj->mcode][2] = $sqlObj->carry_r;
			//$pcarry_c[$sqlObj->mcode] = $sqlObj->carry_c;
			//$aquota[$sqlObj->mcode] = $sqlObj->aquota;
		}
		mysql_free_result($rs);
		$this->ret_sum_pv = $sum_pv;
		$this->ret_pcarry = $pcarry;
		unset($sum_pv);
		unset($pcarry);

		/*for($i=0;$i<sizeof($mcode);$i++){
			echo $mcode[$i]." L[".$pcarry[$mcode[$i]][1]."+".$sum_pv[$mcode[$i]][1]."] R[".$pcarry[$mcode[$i]][2]."+".$sum_pv[$mcode[$i]][2]."]<br />";
		}*/
	}
	public function getSumPV($mcode,$lr){
		return $this->ret_sum_pv[$mcode][$lr];
	}
	public function getCarryPV($mcode,$lr){
		return $this->ret_pcarry[$mcode][$lr];
	}
}
?>
<?
/*$scr = new memberScore();
$scr->calc();

echo $mcode[$i]." L[".$scr->getCarryPV("0000000",1)."+".$scr->getSumPV("0000000",1)."] ";
echo "R[".$scr->getCarryPV("0000000",1)."+".$scr->getSumPV("0000000",2)."]<br />";*/

?>
