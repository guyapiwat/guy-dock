<?
class chartGenerator{
	private $maxLevel = 3;
	private $cmpLevel = 0;
	private $numChild;
	private $dbPrefix;
	private $redctlink;
	private $emptyredctlink;
	private $goLrMost = false;
	//private $lrDef = array(1,2,3);
	private $lrDef = array(1,2,3);
	private $block = false;
	private $blockCode;
	private $altShow = false;
	private $checkball = 0;
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
					str = "<table style='border:#000000 solid 1;' bgcolor='#FFD0E7'><tr><td>"+str+"</td></tr></table>";
					document.getElementById('clsdivshow').innerHTML=str;
					document.getElementById('clsdivshow').style.top = tempY; 
					document.getElementById('clsdivshow').style.left = tempX+5;
    				document.getElementById('clsdivshow').style.visibility = "visible";
				}else
    				document.getElementById('clsdivshow').style.visibility = "hidden";
			}
			function divshow(divname,state,left,infor,right,QPV){ 
				if(state){
					str = "<table width='100%' style='border:#000000 solid 1;' bgcolor='#FFC9E5'><tr>";
					//str = "<table width='100%' style='border:#000000 solid 1;' bgcolor='#FF0055'><tr>";
					str += "<td width='30%' align='right'>"+left+"</td><td width='25%' align='right' nowrap>"+infor+"</td><td width='25%' align='right'>"+right+"</td><td width='25%' align='right'>"+QPV+"</td></tr></table>";
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
	public function upMost($mcode){
		$sql = "SELECT upa_code FROM ".$this->dbPrefix."member WHERE mcode='$mcode' LIMIT 1 ";
		$rs = mysql_query($sql);
		if($this->block==true && $mcode==$this->blockCode)
			return $this->blockCode;
		if(mysql_num_rows($rs)>0){
			if($this->block==true && mysql_result($rs,0,'upa_code')==$this->blockCode)
				return $this->blockCode;
			else if(mysql_result($rs,0,'upa_code')=="")
				return $mcode;
			else
				return $this->upMost(mysql_result($rs,0,'upa_code'));
		}else return $mcode;
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
		global $wording_lan;
		//var_dump($wording_lan);
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

		// lastmonth //
		$DateStart= $_SESSION["datetimezone_Ym"].'-10';
		$strtime = strtotime($DateStart);
		$hhdate=date("Y-m", strtotime("-1 Month",$strtime));
		$hhdate1=date("Y-m", strtotime("-2 Month",$strtime));
		// lastmonth //
		$k=0;
		$mcode[$k] = $this->startCode;

		$sql="SELECT rcode,fdate,tdate FROM ".$this->dbPrefix."around WHERE calc='1' and tdate like '%".$hhdate1."%' ORDER BY rcode DESC LIMIT 1";
		//echo $sql;
		$rs = mysql_query($sql);
		$where_cause = "";
		$max_rcode = 0;
		if(mysql_num_rows($rs)>0){
			$where_cause = "AND sadate>'".mysql_result($rs,0,'tdate')."' ";
			$max_rcodeo = mysql_result($rs,0,'rcode');
		}

		$max_rcodeo = $max_rcodeo-2;

		$sql="SELECT * FROM ".$this->dbPrefix."bmbonus WHERE rcode='$max_rcodeo' and (carry_l>0 or carry_c>0) and mcode = '".$mcode[$k]."' ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$pcarry[$mcode[$k]][1] = mysql_result($rs,0,'carry_l');
			$pcarry[$mcode[$k]][2] = mysql_result($rs,0,'carry_c');
		}else{
			$pcarry[$mcode[$k]][1] = 0;
			$pcarry[$mcode[$k]][2] = 0;

		}
		//var_dump($quota);

		$rs=mysql_query("select * from ".$this->dbPrefix."member where mcode='$mcode[$k]' ");
		$upa_code[$mcode[$k]] = mysql_result($rs,0,'upa_code');
		$sp_code[$mcode[$k]] = mysql_result($rs,0,'sp_code');
		$pos_cur[$mcode[$k]] = mysql_result($rs,0,'pos_cur2');
		if(empty($pos_cur[$mcode[$k]]))$pos_cur[$mcode[$k]] = mysql_result($rs,0,'pos_cur'); 
		$pos_cur1[$mcode[$k]] = mysql_result($rs,0,'pos_cur1');
		$lr[$mcode[$k]] = mysql_result($rs,0,'lr');
		$cmp[$mcode[$k]] = mysql_result($rs,0,'cmp');
		$cmp2[$mcode[$k]] = mysql_result($rs,0,'cmp2');
		$bmdate1[$mcode[$k]] = mysql_result($rs,0,'bmdate1');
		$bmdate2[$mcode[$k]] = mysql_result($rs,0,'bmdate2');
		$name_b[$mcode[$k]] = mysql_result($rs,0,'name_t');
		//$pos[$mcode[$k]] = mysql_result($rs,0,'pos_cur2');
		//if(empty($pos[$mcode[$k]])) $pos[$mcode[$k]] = mysql_result($rs,0,'pos_cur');
		$rs1=mysql_query("select pos_after,date_change from ".$this->dbPrefix."calc_poschange4 left join ".$this->dbPrefix."position1 on (".$this->dbPrefix."calc_poschange4.pos_after = ".$this->dbPrefix."position1.posshort) where mcode='".$mcode[$k]."' order by  posid desc limit 0,1 ");

		if(mysql_num_rows($rs1) > 0)$pos[$mcode[$k]] = mysql_result($rs1,0,'pos_after');
		if(empty($pos[$mcode[$k]]))$pos[$mcode[$k]] = mysql_result($rs,0,'pos_cur').'Q2'; 

		$status_terminate[$mcode[$k]] = mysql_result($rs,0,'status_terminate');
		if($status_terminate[$mcode[$k]] == '1'){
			$pos_cur[$mcode[$k]] = 'TN';
			$pos[$mcode[$k]] = 'TN';
			$pos_cur1[$mcode[$k]] = 'TN';
		}
 		if(empty($pos[$mcode[$k]]) or $pos[$mcode[$k]] == 'SU' or $pos[$mcode[$k]] == 'EX')$pos[$mcode[$k]] = mysql_result($rs,0,'pos_cur'); 

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
					$sp_code[$mcode[$i]] = mysql_result($rs,0,'sp_code');
					$pos_cur[$mcode[$i]] = mysql_result($rs,0,'pos_cur2');
					if(empty($pos_cur[$mcode[$i]]))$pos_cur[$mcode[$i]] = mysql_result($rs,0,'pos_cur'); 
					$pos_cur1[$mcode[$i]] = mysql_result($rs,0,'pos_cur1');
					$cmp[$mcode[$i]] = mysql_result($rs,0,'cmp');
					$cmp2[$mcode[$i]] = mysql_result($rs,0,'cmp2');
					if($cmp[$mcode[$i]] != $wording_lan["tab2_1_complete"])$cmp[$mcode[$i]] = $wording_lan["tab2_1_incomplete"];
					if($cmp2[$mcode[$i]] != $wording_lan["tab2_1_complete"])$cmp2[$mcode[$i]] = $wording_lan["tab2_1_incomplete"];
					$bmdate1[$mcode[$i]] = mysql_result($rs,0,'bmdate1');
					$bmdate2[$mcode[$i]] = mysql_result($rs,0,'bmdate2');
					$name_b[$mcode[$i]] = mysql_result($rs,0,'name_t');

					$sql="SELECT * FROM ".$this->dbPrefix."bmbonus WHERE rcode='$max_rcodeo' and (carry_l>0 or carry_c>0) and mcode = '".$mcode[$i]."' ";
					$rs1234 = mysql_query($sql);
					if(mysql_num_rows($rs1234)>0){
						$pcarry[$mcode[$i]][1] = mysql_result($rs1234,0,'carry_l');
						$pcarry[$mcode[$i]][2] = mysql_result($rs1234,0,'carry_c');
					}else{
						$pcarry[$mcode[$i]][1] = 0;
						$pcarry[$mcode[$i]][2] = 0;

					}

					//$pos[$mcode[$i]] = mysql_result($rs,0,'pos_cur2');
					//if(empty($pos[$mcode[$i]]))$pos[$mcode[$i]] = mysql_result($rs,0,'pos_cur');
					$rs1=mysql_query("select pos_after,date_change from ".$this->dbPrefix."calc_poschange4 left join ".$this->dbPrefix."position1 on (".$this->dbPrefix."calc_poschange4.pos_after = ".$this->dbPrefix."position1.posshort) where mcode='".$mcode[$i]."' order by  posid desc limit 0,1 ");

					if(mysql_num_rows($rs1) > 0)$pos[$mcode[$i]] = mysql_result($rs1,0,'pos_after');
					if(empty($pos[$mcode[$i]]))$pos[$mcode[$i]] = mysql_result($rs,0,'pos_cur').'Q2'; 
					$status_terminate[$mcode[$i]] = mysql_result($rs,0,'status_terminate');
					if($status_terminate[$mcode[$i]] == '1'){
						$pos_cur[$mcode[$i]] = 'TN';
						$pos[$mcode[$i]] = 'TN';
						$pos_cur1[$mcode[$i]] = 'TN';
					}	
					if(empty($pos[$mcode[$i]]) or $pos[$mcode[$i]] == 'SU' or $pos[$mcode[$i]] == 'EX')$pos[$mcode[$i]] = mysql_result($rs,0,'pos_cur'); 

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
					echo "	<td colspan='2'  align='center' nowrap>";
					if($mcode[$k]!=""){ //แสดงคะแนน ซ้าย ขวา
						$altOut = "onmouseout=\"divshow('divname',false,'','','','');";
						$altOver = "onmouseover=\"divshow('divname',false,'','','','');";
						$this->setShowAlt(true);
						$sqpv = "";
						$num_sqpv = 0;
	$array_mpos = array('MB'=>0,'GC'=>125,'GB'=>125,'GS'=>125,'GG'=>125);
						//echo $scr->getQPV($mcode[$k]).' '.$array_mpos[$pos_cur[$mcode[$k]]].' '.$pos_cur[$mcode[$k]].' '.$mcode[$k];
						$total_q = $scr->getQPV($mcode[$k])-$array_mpos[$pos_cur[$mcode[$k]]];
						if($total_q >= 0){
							$sqpv = "<font color=#0000FF><b>".$wording_lan["tab2_chartgen_1"]."".$total_q." PV</b></font>";
						}else{
							$num_sqpv = $array_mpos[$pos_cur[$mcode[$k]]]-$scr->getQPV($mcode[$k]);
							$sqpv = "<font color=#c00000><b>".$wording_lan["tab2_chartgen_2"]."".$num_sqpv.")</b></font>";
							$mm2  = date("Ym",strtotime("+1 months"));
							$sql = "SELECT pv AS all_pv FROM ali_status WHERE mcode='$mcode[$k]'  and month_pv like '%$mm2%' and status = 1 ";
							//echo $sql;
							$rs = mysql_query($sql);
							if(mysql_num_rows($rs) > 0){
								$total_q = ($all_Qpv+mysql_result($rs,0,'all_pv')); 
								$sqpv = "<font color=#0000FF><b>".$wording_lan["tab2_chartgen_1"]."".$total_q." PV</b></font>";
								mysql_free_result($rs);
							}
						}
						 $sql = "SELECT status FROM ali_status WHERE mcode='$mcode[$k]' order by month_pv desc limit 0,1 ";
							$rs = mysql_query($sql);
							if(mysql_num_rows($rs) > 0){
								$status = mysql_result($rs,0,'status'); 
								mysql_free_result($rs);
							}
						if($status == 0)$status = $scr->getStatus($mcode[$k]).'<font color=#c00000><b>('.$array_mpos[$pos_cur[$mcode[$k]]].')</b></font>';
						else $status = $scr->getStatus($mcode[$k]);
						$sp_code2 = $sp_code;
						$upa_code2 = $upa_code;
						if($sp_code[$mcode[$k]] == '0000001' or $sp_code[$mcode[$k]] == '0000002' or $sp_code[$mcode[$k]] == '0000003' or $sp_code[$mcode[$k]] == '0000004' or $sp_code[$mcode[$k]] == '0000005' or $sp_code[$mcode[$k]] == '0000006' or $sp_code[$mcode[$k]] == '0000007' or $sp_code[$mcode[$k]] == '0000008')$sp_code[$mcode[$k]] = '0000001';

						if($upa_code[$mcode[$k]] == '0000001' or $upa_code[$mcode[$k]] == '0000002' or $upa_code[$mcode[$k]] == '0000003' or $upa_code[$mcode[$k]] == '0000004' or $upa_code[$mcode[$k]] == '0000005' or $upa_code[$mcode[$k]] == '0000006' or $upa_code[$mcode[$k]] == '0000007' or $upa_code[$mcode[$k]] == '0000008')$upa_code[$mcode[$k]] = '0000001';

						$sp_code = $sp_code2;
						$upa_code = $upa_code2;
						if($this->altShow){
							$altOut .= "alt('');";
							$altOver .= "alt('<table><tr><td>".$wording_lan["tab2_chartgen_3"]."</td><td> : </td><td>".$scr->getMaxQuota($mcode[$k])."</td></tr><tr><td>".$wording_lan["tab2_chartgen_4"]."(".number_format($pcarry[$mcode[$k]][1],2,'.',',').") </td><td> : </td><td>".$wording_lan["tab2_chartgen_5"]."(".number_format($pcarry[$mcode[$k]][2],2,'.',',').")</td></tr><tr><td>".$wording_lan["tab2_chartgen_6"]."(".number_format($scr->getSumPV($mcode[$k],1),0,'.',',').") </td><td> : </td><td>".$wording_lan["tab2_chartgen_7"]."(".number_format($scr->getSumPV($mcode[$k],2),0,'.',',').")</td></tr><tr><td>".$wording_lan["tab2_chartgen_8"]."(".number_format($pcarry[$mcode[$k]][1]+$scr->getSumPV($mcode[$k],1),0,'.',',').") </td><td> : </td><td>".$wording_lan["tab2_chartgen_9"]."(".number_format($pcarry[$mcode[$k]][2]+$scr->getSumPV($mcode[$k],2),0,'.',',').")</td></tr></tr></table>')\"";
						}
						$alt = $altOut."\" ".$altOver."\"";
						
						if($k==0 ){
	echo "<div style='position:absolute; left:20; top:20;'><fieldset>";
							echo "<table bgcolor='#FFFFFF' width='75'><tr align='center' height='25'><td></td><td>";
							if($k==0 && $upa_code[$mcode[$k]]!=""){ 
								if($this->block==false){ 
									echo "<img src='images/go_dup.gif' border='0' style='cursor:pointer;' ";
									echo "onClick='parent.location.href=\"".$this->redctlink.$this->upMost($upa_code[$mcode[$k]])."\"' ";
									echo "onmouseover=\"this.src='images/bgo_dup.gif'\" ";
									echo "onmouseout=\"this.src='images/go_dup.gif'\" ";
									echo "alt='บน ".$this->upMost($upa_code[$mcode[$k]])."' \>";
								}else if(!$this->isUp($upa_code[$mcode[$k]],$this->blockCode)){
									echo "<img src='images/go_dup.gif' border='0' style='cursor:pointer;' ";
									echo "onClick='parent.location.href=\"".$this->redctlink.$this->upMost($upa_code[$mcode[$k]])."\"' ";
									echo "onmouseover=\"this.src='images/bgo_dup.gif'\" ";
									echo "onmouseout=\"this.src='images/go_dup.gif'\" ";
									echo "alt='บน ".$this->upMost($upa_code[$mcode[$k]])."' \>";
								}else echo "<img src='images/dgo_dup.gif' border='0' \>";
							}else echo "<img src='images/dgo_dup.gif' border='0' \>";
							echo "</td><td></td></tr>";
							echo "<tr align='center' height='40'><td>&nbsp;";
							if($k==0 && $this->goLrMost){
								echo "<img src='images/go_left.gif' border='0' style='cursor:pointer;' ";
								echo "onClick='parent.location.href=\"".$this->redctlink.$this->lrMost($mcode[$k],$this->lrDef[0])."\"' ";
								echo "onmouseover=\"this.src='images/bgo_left.gif'\" ";
								echo "onmouseout=\"this.src='images/go_left.gif'\" ";
								echo "alt='ซ้ายสุด ".$this->lrMost($mcode[$k],$this->lrDef[0])."' \>";
							}else echo "<img src='images/dgo_left.gif' border='0' \>";
							echo "&nbsp;</td><td>&nbsp;";
							if($k==0 && $upa_code[$mcode[$k]]!=""){ 
								if($this->block==false){ 
									echo "<img src='images/go_up.gif' border='0' style='cursor:pointer;' ";
									echo "onClick='parent.location.href=\"".$this->redctlink.$upa_code[$mcode[$k]]."\"' ";
									echo "onmouseover=\"this.src='images/bgo_up.gif'\" ";
									echo "onmouseout=\"this.src='images/go_up.gif'\" ";
									echo "alt='บน ".$upa_code[$mcode[$k]]."' \>";
								}else if(!$this->isUp($upa_code[$mcode[$k]],$this->blockCode)){
									echo "<img src='images/go_up.gif' border='0' style='cursor:pointer;' ";
									echo "onClick='parent.location.href=\"".$this->redctlink.$upa_code[$mcode[$k]]."\"' ";
									echo "onmouseover=\"this.src='images/bgo_up.gif'\" ";
									echo "onmouseout=\"this.src='images/go_up.gif'\" ";
									echo "alt='บน ".$upa_code[$mcode[$k]]."' \>";
								}else echo "<img src='images/dgo_up.gif' border='0' \>";
							//if($position[$k]=='E'){
							}else echo "<img src='images/dgo_up.gif' border='0' \>";
							echo "&nbsp;</td><td>&nbsp;";
							if($k==0 && $this->goLrMost){
								echo "<img src='images/go_right.gif' border='0' style='cursor:pointer;' ";
								echo "onClick='parent.location.href=\"".$this->redctlink.$this->lrMost($mcode[$k],$this->lrDef[sizeof($this->lrDef)-1])."\"' ";
								echo "onmouseover=\"this.src='images/bgo_right.gif'\" ";
								echo "onmouseout=\"this.src='images/go_right.gif'\" ";
								echo "alt='ขวาสุด ".$this->lrMost($mcode[$k],$this->lrDef[sizeof($this->lrDef)-1])."' \>";
							}else echo "<img src='images/dgo_right.gif' border='0' \>";
							echo "&nbsp;</td></tr></table>";
							echo "</fieldset></div>";						}
						if($i==1)
							echo "<br>";
						//echo "</td></tr></table>";
						echo "<table width='$wd' cellpadding='0' $alt cellspacing='0' border='0'>";
						if($this->imgShow) //เมื่อมีการเซ็ตค่าให้มีการแสดงรูป
							echo "<tr><td align='center' ><a href='".$this->redctlink."$mcode[$k]' target='_parent' ><img src='".$this->imgDef[$pos[$mcode[$k]]]."' border='0'></a></td></tr>";

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
						echo "<tr><td nowrap $clspan align='center' style='cursor:pointer;' onClick='parent.location=\"".$this->redctlink."$mcode[$k]\"' bgcolor='".$this->tabDDef[$pos[$mcode[$k]]]."'><font color='".$this->txtDDef[$pos[$mcode[$k]]]."'>".substr($name_b[$mcode[$k]],0,10)."</font><br>".$scr->getQuota($mcode[$k])."</td></tr>";
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
							<table style=" background-repeat:no-repeat" <?=$tablink?>  <?=$tablink!=""?$alt:""?> width="42" height="42"  border="0" cellpadding="0" cellspacing="0" <?=($this->nullTypeDef=="COL"?"bgcolor='".$this->nullDef."'":"background='".$this->nullDef."'")?> >
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
		$pos_quota = array('CM'=>0,'BM'=>0,'AG'=>10,'SM'=>25,'MP'=>45,'EP'=>45,'VP'=>45,'EVP'=>45,'CEO'=>45);
		$sql="SELECT mcode,name_b,upa_code,pos_cur,pos_cur1,sp_code,lr FROM ".$this->dbPrefix."member ORDER BY lr DESC";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode[$i] =$sqlObj->mcode;		
			$name_b[$i] =$sqlObj->name_b;		
			$upa_code[$mcode[$i]] = $sqlObj->upa_code;
			$pos_cur[$mcode[$i]] = $sqlObj->pos_cur;
			$pos_cur1[$mcode[$i]] = $sqlObj->pos_cur1;
			$sp_code[$mcode[$i]] = $sqlObj->sp_code;
			$lr[$mcode[$i]] = $sqlObj->lr;
			//$pos_cur[$mcode[$i]] = $sqlObj->pos_cur;
			//$pos_new[$mcode[$i]] = $sqlObj->pos_cur;
			$sum_pv[$mcode[$i]][1] =0;
			$sum_pv[$mcode[$i]][2] =0;
			$sum_pv[$mcode[$i]][3] =0;
			$pcarry[$mcode[$i]][1] =0;
			$pcarry[$mcode[$i]][2] =0;
			$pcarry[$mcode[$i]][3] =0;
			$mexp[$mcode[$i]] = 0;
			$max_quota[$mcode[$i]] = $pos_quota[$pos_cur[$mcode[$i]]];
		}
		
	// lastmonth //
	$DateStart= $_SESSION["datetimezone_Ym"].'-10';
	$strtime = strtotime($DateStart);
	$hhdate=date("Y-m", strtotime("-1 Month",$strtime));
	$hhdate1=date("Y-m", strtotime("-2 Month",$strtime));
	// lastmonth //
	/*$sql="SELECT rcode,fdate,tdate FROM ".$this->dbPrefix."around WHERE calc='1' ORDER BY rcode DESC LIMIT 1";
		//echo $sql;
		$rs = mysql_query($sql);
		$where_cause = "";
		$max_rcode = 0;
		if(mysql_num_rows($rs)>0){
			$where_cause = "AND sadate>'".mysql_result($rs,0,'tdate')."' ";
			$max_rcode = mysql_result($rs,0,'rcode');
		}*/

		$sql="SELECT rcode,fdate,tdate FROM ".$this->dbPrefix."around WHERE calc='1' and tdate like '%".$hhdate1."%' ORDER BY rcode DESC LIMIT 1";
		//echo $sql;
		$rs = mysql_query($sql);
		$where_cause = "";
		$max_rcode = 0;
		if(mysql_num_rows($rs)>0){
			$where_cause = "AND sadate>'".mysql_result($rs,0,'tdate')."' ";
			$max_rcodeo = mysql_result($rs,0,'rcode');
		}

		$result11=mysql_query("select * from ".$this->dbPrefix."calc_poschange1 where 1=1  order by id asc  ");
		//echo "select * from ".$dbprefix."calc_poschange4 where mcode='".$cmc."' order by id desc limit 0,1 ";
		for($i=0;$i<mysql_num_rows($result11);$i++){
			$sqlObj = mysql_fetch_object($result11);
				//$pos_cur22[$sqlObj->mcode] = $sqlObj->pos_after.' ( '.$sqlObj->date_change.' )';
				$pos_after = $sqlObj->pos_after;
				if($pos_after == 'SS')$pos_after = 'Star Sup';
				if($pos_after == 'SX')$pos_after = 'Star Ex';
				$pos_cur22[$sqlObj->mcode] = $pos_after;
				//echo $row["name_t"];
		}

		$where_cause = "AND sadate between '".$hhdate."-01' and '".$hhdate."-31' ";
			
		$sql="SELECT sum(tot_pv) as tot_pv1,mcode FROM ".$this->dbPrefix."asaleh  WHERE sa_type='A' and cancel = 0 $where_cause and cancel=0 group by mcode"; //AND (sa_type='T' OR sa_type='P') AND sa_type='A'
			//echo $sql;
			$cmcode = array();
			$tot_pv1 = array();
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$tot_pv1[$sqlObj->mcode] += $sqlObj->tot_pv1;
				$cmcode[$i] = $sqlObj->mcode;
			}
			mysql_free_result($rs);

			for($i=0;$i<sizeof($cmcode);$i++){
				//if($exp_date[$cmcode[$i]]=='' || $exp_date[$cmcode[$i]]<=0) continue; //ไม่รักษายอดทิ้งไปเลย
				$up = $cmcode[$i];
				while($up <> ""){
					if($up == "") break;
					//if($exp_date[$upa_code[$up]]=='' || $exp_date[$upa_code[$up]]<=0){ $up = $upa_code[$up];continue;} //ไม่รักษายอดทิ้งไปเลย
					if($upa_code[$up] <>""){
						$sum_pv[$upa_code[$up]][$lr[$up]] += $tot_pv1[$cmcode[$i]];
						if($tot_pv1[$cmcode[$i]] > 0)
							$count[$upa_code[$up]][$lr[$up]]++;

					}
					$up = $upa_code[$up];
				}
			}

			$cmcode1 = array();
			$tot_pv2 = array();
			$sql="SELECT sum(tot_pv) as tot_pv1,mcode FROM ".$this->dbPrefix."holdhead  WHERE sa_type='A' $where_cause and cancel=0 group by mcode"; //AND (sa_type='T' OR sa_type='P') AND sa_type='A'
			//echo $sql;
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$tot_pv2[$sqlObj->mcode] += $sqlObj->tot_pv1;
				$cmcode1[$i] = $sqlObj->mcode;
			}
			mysql_free_result($rs);

			for($i=0;$i<sizeof($cmcode1);$i++){
				//if($exp_date[$cmcode1[$i]]=='' || $exp_date[$cmcode1[$i]]<=0) continue; //ไม่รักษายอดทิ้งไปเลย
				$up = $cmcode1[$i];
				while($up <> ""){
					if($up == "") break;
					//if($exp_date[$upa_code[$up]]=='' || $exp_date[$upa_code[$up]]<=0){ $up = $upa_code[$up];continue;} //ไม่รักษายอดทิ้งไปเลย
					if($upa_code[$up] <>""){
						$sum_pv[$upa_code[$up]][$lr[$up]] += $tot_pv2[$cmcode1[$i]];
						//$people1[$upa_code[$up]][$lr[$up]]++;
						if($tot_pv2[$cmcode1[$i]] > 0)
							$count[$upa_code[$up]][$lr[$up]]++;

					}
					$up = $upa_code[$up];
				}
			}


		$this->ret_sum_pv = $sum_pv;
		$this->ret_pcarry = $pcarry;
		$this->ret_quota = $pos_cur22;
		$this->ret_maxquota = $mexp;
		unset($sum_pv);
		unset($pcarry);
		unset($quota);
		unset($max_quota);

		/*for($i=0;$i<sizeof($mcode);$i++){
			echo $mcode[$i]." L[".$pcarry[$mcode[$i]][1]."+".$sum_pv[$mcode[$i]][1]."] R[".$pcarry[$mcode[$i]][2]."+".$sum_pv[$mcode[$i]][2]."]<br />";
		}*/
	}
	public function getMaxQuota($mcode){
		return $this->ret_maxquota[$mcode];
	}
		public function getQuota($mcode){
		return $this->ret_quota[$mcode];
	}
	public function getSumPV($mcode,$lr){
		return $this->ret_sum_pv[$mcode][$lr];
	}
	public function getCarryPV($mcode,$lr){
		return $this->ret_pcarry[$mcode][$lr];
	}
	public function getQPV($mcd){
	
		  //$mm = date("yyyy-MM");
        	/*$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_asaleh WHERE mcode='$mcd' and  sa_type='Q' and sadate like (select  DATE_FORMAT(max(fdate), '%Y-%m-%') from ali_around where calc = 1 )";
			//echo $sql;
			$rs = mysql_query($sql);
			$all_Qpv = mysql_result($rs,0,'all_pv'); 
			mysql_free_result($rs);

			$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_holdhead WHERE mcode='$mcd' and sa_type='Q' and sadate like (select  DATE_FORMAT(max(fdate), '%Y-%m-%') from ali_around where calc = 1 ) ";
			//echo $sql;
			$rs = mysql_query($sql);
			$all_Qpv = ($all_Qpv+mysql_result($rs,0,'all_pv')); 
			mysql_free_result($rs);*/

			 $mm = date("Y-m").'-31';
			 $mm1 = date("Ym");
			  $mm2 = $end = date("Ym",strtotime("+1 months"));
			$select = "select max(fdate)  as fdate from ali_around where	calc = 1 ";
			$rsselect = mysql_query($select);
			$fdate = mysql_result($rsselect,0,'fdate'); 
			mysql_free_result($rsselect);


        	$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_asaleh WHERE mcode='$mcd' and cancel=0 and  sa_type='Q' and sadate between '$fdate' and '$mm'";
			//echo $sql;
			$rs = mysql_query($sql);
			$all_Qpv = mysql_result($rs,0,'all_pv'); 
			mysql_free_result($rs);

			$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_holdhead WHERE mcode='$mcd' and cancel=0  and sa_type='Q' and sadate between '$fdate' and '$mm' ";
			//echo $sql;
			$rs = mysql_query($sql);
			$all_Qpv = ($all_Qpv+mysql_result($rs,0,'all_pv')); 
			mysql_free_result($rs);

			/*$sql = "SELECT sum(pv) AS all_pv FROM ali_status WHERE mcode='$mcd'  and month_pv like (select  DATE_FORMAT(max(fdate), '%Y%m') from ali_around where calc = 1 ) ";
			//echo $sql;
			$rs = mysql_query($sql);
			$all_Qpv = ($all_Qpv+mysql_result($rs,0,'all_pv')); 
			mysql_free_result($rs);*/


		return $all_Qpv;
	}
	public function getAPV($mcd){
	
		  $mm = date("yyyy-MM");
        	$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_asaleh WHERE mcode='$mcd' and sadate like  '%$mm%' and  (sa_type='A' or sa_type='Q') and cancel = 0 ";
			//echo $sql;
			$rs = mysql_query($sql);
			$all_Apv = mysql_result($rs,0,'all_pv'); 
			mysql_free_result($rs);

			$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_holdhead WHERE mcode='$mcd' like  '%$mm%' and (sa_type='A' or sa_type='Q') and cancel = 0  ";
			//echo $sql;
			$rs = mysql_query($sql);
			$all_Apv = ($all_Apv+mysql_result($rs,0,'all_pv')); 
			mysql_free_result($rs);

			$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ali_special_point WHERE  sa_type='VA' AND mcode='$mcd' group by mcode ";
			$rs3=mysql_query($sql3);
			if (mysql_num_rows($rs3)>0) {
				$sqlObj3 = mysql_fetch_object($rs3);
				$total_fv3= $sqlObj3->tot_pv;
				 mysql_free_result($rs3);
			}else{
				$total_fv3=0;
			}
			$all_Apv = $all_Apv+$total_fv3;


		return $all_Apv;
	}
	public function getStatus($mcd){
	
		 $mm = date("Ym");
		  $status = "0";
		  $sql = "SELECT pv,status FROM ali_status WHERE mcode='$mcd' and month_pv = '$mm' order by month_pv desc limit 0,1 ";
			//echo $sql;
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				$lastfv = mysql_result($rs,0,'pv'); 
				$status = mysql_result($rs,0,'status'); 
				mysql_free_result($rs);
			}
		
			if($status == '0')$status = '<font color=#c00000><b>(ยังไม่รักษายอด)</b></font>';
			if($status == '1')$status = '<font color=#0000FF><b>(รักษายอดสมบูรณ์)</b></font>';


		return $status;
	}
	public function getdateStatus($mcd){
	
		  //$mm = date("yyyy-MM");
		  $status = "";
		  $sql = "SELECT date_change FROM ali_poschange WHERE mcode='$mcd' order by id desc limit 0,1 ";
			//echo $sql;
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				$date_change= "";
				$date_change = mysql_result($rs,0,'date_change');
				mysql_free_result($rs);
			}
			$status = '<font color=#000000><b>'.$date_change.'</b></font>';


		return $status;
	}
	public function getLPV($mcd){
	
		
        	$Lsql = "select sum(ro_l) as total_pv from ali_bmbonus where rcode >= '1' and mcode = '$mcd' group by mcode";
			//$sql = "select sum(ro_l) as total_pv from ali_bmbonus where rcode >= '181' and mcode = '$mcd' group by mcode";
			$Lrs = mysql_query($Lsql);
			if(mysql_num_rows($Lrs) > 0)
			{	
				$Lpv = mysql_result($Lrs,0,'total_pv'); 
				mysql_free_result($Lrs);
			}
			return $Lpv;
	}
	public function getCPV($mcd){
			 
        	   $Csql = "select sum(ro_c) as total_pv from ali_bmbonus where rcode >= '1' and mcode = '$mcd' group by mcode";
			   $Crs = mysql_query($Csql);
			   if(mysql_num_rows($Crs) > 0)
				{	
				   $Cpv = mysql_result($Crs,0,'total_pv'); 
					mysql_free_result($Crs);
				}
			   		
			return $Cpv;
	}
	public function getRPV($mcd){
	
		  
			   $Rsql = "select sum(ro_r) as total_pv from ali_bmbonus where rcode >= '1' and mcode = '$mcd' group by mcode";
			   $Rrs = mysql_query($Rsql);
			   if(mysql_num_rows($Rrs) > 0)
				{	
				   $Rpv = mysql_result($Rrs,0,'total_pv'); 
					mysql_free_result($Rrs);
				}

			return $Rpv;
	}
}
?>
<?
/*$scr = new memberScore();
$scr->calc();

echo $mcode[$i]." L[".$scr->getCarryPV("0000000",1)."+".$scr->getSumPV("0000000",1)."] ";
echo "R[".$scr->getCarryPV("0000000",1)."+".$scr->getSumPV("0000000",2)."]<br />";*/

?>
