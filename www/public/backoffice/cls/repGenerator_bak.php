<?
class repGenerator_qty_stock{
	private $sqlAnalz;// = new sqlAnalizer();
	private $rs;
	private $order = "";
	private $dsort = " ASC ";
	private $cause = "";
	//page property
	private $lPage = 30;
	private $cPage = 1;
	private $nInfo = 0;
	private $nPage;
	private $alink;
	private $alinkarg;
	private $blink;
	private $blinkarg;
	//page link
	private $pageLinkAlign = "left";
	private $pageLinkShow = array('top'=>true,'bottom'=>true);
	//private $conn;
	private $showField = "";
	private $showFieldFormat = "";
	private $fieldDesc = "";
	private $fieldAlign = "";
	private $fieldSpace = "";
	private $fieldLink = "";
	//query string
	private $qry = "";
	private $rowqry = "";
	private $sqltable;
	private $sqlWhere;
	private $twidth;
	private $theight;
	private $talign = "left";
	private $HLight;
	private $HLightField = "";
	//private $cqry = "";
	//private $xfield;
	//del and edit setting
	private $sum = false;
	private $allSum = false;
	private $sumList;
	private $allSumVal;
	private $del = false;
	private $delSet;
	private $delFormAttr = array("maindel","","post","delfield");
	private $edit = false;
	private $editSet;
	//specialset
	private $special = false;
	private $specialSet;
	private $specialType;
	//search
	private $search = false;
	private $searchKey;
	private $searchKeyDesc;
	private $space;
//constructer
	public function repGenerator(){
		$this->alink = $PHP_SELF;
		//$this->sqlAnalz = new sqlAnalizer();
		//if(isset($_GET['od']))
		//$this->conn = $conn;
	}
//method
//--setting
	public function setLimPage($num){
		$this->lPage = $num;
	}
	public function setRowQry($qryStr){
		$this->rowqry = $qryStr;
	}
	public function setAlign($align){
		$this->talign = $align;
	}
	public function setShowIndex($isshow){
		$this->index = $isshow;
	}
	public function setHLight($field,$value,$color,$hideInfo){
		$this->HLight[$field] = array('VAL'=>$value,'COLOR'=>$color,'STOCK'=>$start_stock);
		if($hideInfo=="HIDE"){
			$this->HLightField = $field;
		}
		//echo print_r($this->HLight[$field]);
	}
	public function setPageLinkAlign($align){
		$this->pageLinkAlign = $align;
	}
	public function setPageLinkShow($top,$bottom){
		$this->pageLinkShow['top'] = $top;
		$this->pageLinkShow['bottom'] = $bottom;
	}
	public function setLink($link,$arg){
		$this->alink = $link;
		$this->alinkarg = $arg;
	}
	public function setBackLink($link,$arg){
		$this->blink = $link;
		$this->blinkarg = $arg;
	}
	public function setCurPage($num){
		$this->cPage = $num;
	}
	public function setSize($width,$height){
		$this->twidth = $width;
		$this->theight = $height;
	}
	public function setSpecial($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special = true;
		$this->specialType[sizeof($this->specialType)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet[sizeof($this->specialSet)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSum($sumflag,$allsumflag,$fieldSumList){
		$this->sum = $sumflag;
		$this->allSum = $allsumflag;
		$this->sumList = $fieldSumList;
	}
	public function setSearch($skey){
		$this->search = true;
		$this->searchKey = $skey;
	}
	public function setSpace($str){
		$this->space[sizeof($this->space)] = $str;
	}
	public function setSearchDesc($skeyDesc){
		$this->searchKeyDesc = $skeyDesc;
	}
	public function setDel($link,$key,$param,$arg){
		$this->del = true;
		$this->delSet = array($link,$key,$param,$arg);
	}
	public function setFromDelAttr($name,$action,$method,$delfield){		
		$this->delFormAttr = array($name,$action,$method,$delfield);
	}
	public function setEdit($link,$key,$param,$arg){
		$this->edit = true;
		$this->editSet = array($link,$key,$param,$arg);
	}
	public function setShowField($fieldNameList){
		$this->showField = $fieldNameList;
	}
	public function setFieldFloatFormat($fieldFormatList){
		$this->showFieldFormat = $fieldFormatList;
	}
	public function setFieldDesc($fieldDescList){
		$this->fieldDesc = $fieldDescList;
	}
	public function setFieldAlign($fieldAlignList){
		$this->fieldAlign = $fieldAlignList;
	}
	public function setFieldSpace($fieldSpaceList){
		$this->fieldSpace = $fieldSpaceList;
	}
	public function setFieldLink($fieldLinkList){
		$this->fieldLink = $fieldLinkList;
	}
	public function setQuery($str){
		$this->qry = $str;
	}
	public function setResult($rs){
		$this->rs = $rs;
	}
	public function setOrder($order){
		$this->order = $order;
	}
	public function setCause($key,$cuase){
		$this->cause = array($key,$cuase);
	}
	public function setLimitPage($num){ //num || ALL
		if(!is_int($num) && $num=="ALL")
			$this->lPage = "ALL";
		else
			$this->lPage = $num<10?500:$num;
		
		//echo $num;
		//echo $this->lPage;
	}
	public function setSort($sort){
		switch($sort){
			case 'UP':
				$this->dsort = " DESC ";
				break;
			case 'DOWN':
				$this->dsort = " ASC ";
				break;
		}
	}
	public function checkScript(){
		?><script type="text/javascript" language="javascript">
		function checkall(){
			var parm = document.getElementById('delbutton').checked==true?true:false;
			for (i=0; i<document.<?=$this->delFormAttr[0]?>.elements.length;i++){
				if (document.<?=$this->delFormAttr[0]?>.elements[i].type == "checkbox" ){
					document.<?=$this->delFormAttr[0]?>.elements[i].checked = parm;
				}
			}
		}
		function pageset(key,name,getname){
			//alert(key);
			if(key==13 ||key==8 || key==10){
				//alert(window.location.toString().indexOf("&"));
				//alert(window.location.toString().charAt(67));
				var url  = "<?=$this->getParam()?>";
				var head = url.substr(0,url.indexOf("&"+getname));
				var foot = url.substr(url.indexOf(getname));
				//alert(foot.indexOf("&"))
				if(foot.indexOf("&")>=0)
					foot = foot.substr(foot.indexOf("&"));
				else
					foot = "";
				if(head=="")
					window.parent.location += "&" + getname + "="+document.getElementById(name).value;
				else
					window.parent.location = head + "&" + getname + "="+document.getElementById(name).value + foot;
			}
				// = "index.php?";
		}
		</script><?
	}
//--calculator
	public function rowCalc(){
		$sql = "";
		/*var $rs;
		var $row;
		var $showFieldList;
		var $sumList;*/
		$rs = mysql_query("SELECT FOUND_ROWS() AS clsrows"); 
		if(mysql_num_rows($rs)>0){
			$row = mysql_result($rs,0,'clsrows');
			mysql_free_result($rs);
		}else{
			$row = 0;//echo "SELECT COUNT(*) AS clsrows FROM (".$this->qry.$cause.") AS tabclsrow ";
		}
			
		if(!is_int($this->lPage) && $this->lPage=="ALL")
			$this->nPage = 1;
		else
			$this->nPage = ceil($row/$this->lPage);
		$this->nInfo = $row;
		//sum
		if($this->allSum==true){
			$this->showField = str_replace(' ','',$this->showField);
			$this->sumList = str_replace(' ','',$this->sumList);
			//print_r($this->sumList);
			$showFieldList = explode(',',$this->showField);
			$sumList = explode(',',$this->sumList);
			for($i=0;$i<sizeof($showFieldList);$i++){
				if($sumList[$i]){//qry.$cause.$ord
					$lmpos = strpos($this->getSQL("NCAL"),"LIMIT")==false?strlen($this->getSQL("NCAL")):strpos($this->getSQL("NCAL"),"LIMIT");
					$sql = substr($this->getSQL("NCAL"),0,$lmpos);
					$sql = "SELECT SUM(".$showFieldList[$i].") AS ".$showFieldList[$i]." FROM (".$sql.") AS tab";
					$rs = mysql_query($sql);
					$this->allSumVal[$showFieldList[$i]] = mysql_result($rs,0,$showFieldList[$i]);
					mysql_free_result($rs);
				}
			}
		}
		//print_r($this->allSumVal);
	}
//--running
	public function showRec($isshow,$type){
		global $wording_lan;
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$trcolor = array("#EDEDED","#FFFFFF");
		$style_l = "border-left:1 solid #FFFFFF;";
		$style_t = "border-top:1 solid #000000;";
		$style_b = "border-bottom:1 solid #000000;";
		$this->checkScript();
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				echo "<table align='".$this->talign."' ".($this->twidth==""?"":"width='$this->twidth'")." ".($this->theight==""?"":"height='$this->theight'")." border='0' cellpadding='0' cellspacing='0'>";
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->fieldAlign = str_replace(' ','',$this->fieldAlign);
					$showAlign = explode(',',$this->fieldAlign);
					$this->fieldSpace = str_replace(' ','',$this->fieldSpace);
					$showSpace = explode(',',$this->fieldSpace);
					$this->fieldLink = str_replace(' ','',$this->fieldLink);
					$showLink = explode(',',$this->fieldLink);
					$this->searchKey = str_replace(' ','',$this->searchKey);
					$showSearch = explode(',',$this->searchKey);
					$this->searchKeyDesc = str_replace(' ','',$this->searchKeyDesc);
					$showSearchDesc = explode(',',$this->searchKeyDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				$col = sizeof($showList);
				$col += $this->del==true?1:0;
				$col += $this->edit==true?1:0;
				$col += $this->special==true?sizeof($this->specialType):0;
				//echo sizeof($this->specialType);
				$extab = $col==sizeof($showList)?true:false;
				$extab = $this->sum==true?$extab:false;
				$col += $extab==true?1:0;
				//show report
				if(mysql_num_rows($this->rs)<=0){
					if($this->search){
						echo "<fieldset><form style='margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;' ";
						echo "name='searh' id='searh' action='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "ord=".$showList[$i]."&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."' method='post'>";
					//หัวข้อที่ต้องการแสดง
						//echo "<br />";
						echo "<input type='text' name='scause'>";
						echo "<select name='skey'>";
						for($i=0;$i<sizeof($showSearch);$i++){
							echo "<option value='".$showSearch[$i]."' ".($this->cause[0]==$showSearch[$i]?"selected":"").">$showSearchDesc[$i]</option>";
						}
						echo "</select>";
						echo "<input type='submit' value='".$wording_lan['tab2_1_search']."'>";
					echo "</form></fieldset><br>";
					}
					echo "<tr><td bgcolor='#990000' align='center'><font color='#FFFFFF'>".$wording_lan["w14"]."</font></td></tr>";
					echo "<tr></tr><td align='center'>[<a href='javascript:history.back()'>Back</a>]</td></tr>";
				}else{
					echo "<tr><td colspan='".$col."'><table><tr><td>";
					if($this->search){
						echo "<fieldset><form style='margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;' ";
						echo "name='searh' id='searh' action='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "ord=".$showList[$i]."&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."' method='post'>";
					//หัวข้อที่ต้องการแสดง
						//echo "<br />";
						echo "<input type='text' name='scause'>";
						echo "<select name='skey'>";
						for($i=0;$i<sizeof($showSearch);$i++){
							echo "<option value='".$showSearch[$i]."' ".($this->cause[0]==$showSearch[$i]?"selected":"").">$showSearchDesc[$i]</option>";
						}
						echo "</select>";
						echo "<input type='submit' value='".$wording_lan['tab2_1_search']."'>";
					echo "</form></fieldset>";
					}
					echo "</td>";
					for($i=0;$i<sizeof($this->space);$i++)
						echo "<td align='center' width='120'>".$this->space[$i]."</td>";
					echo "</tr></table> </td></tr>";
					if($this->pageLinkShow['top']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						echo "<div><font color='#999999'>";
						echo "".$wording_lan["Display"]." ".($this->cPage==$this->nPage?$this->nInfo-(($this->nPage-1)*$this->lPage):$this->lPage);
						echo "".$wording_lan["word"]["list"].$wording_lan["From"]." ".$this->nInfo."".$wording_lan["word"]["list"]." ".$wording_lan["word"]["quantity"]." ".$this->nPage."".$wording_lan["word"]["page"]."".$wording_lan["word"]["page"].$wording_lan["word"]["each"];
						echo "<input name='lp' type='text' size='1' style='text-align:right;font-size:10px;background-color: ";
						echo "#CCCCCC;border: 1px solid #000000;' onKeyUp='pageset(window.event.keyCode,\"lp\",\"lp\" )' ";
						echo "title='".$wording_lan["word"]["page_show_hint"]."' value='".$this->lPage."'>".$wording_lan["word"]["data"]."</font></div>";
						$this->pageShow();
						echo "</td></tr>";
					}
					echo "<form name='".$this->delFormAttr[0]."' id='".$this->delFormAttr[0]."' action='".$this->delFormAttr[1]."' method='".$this->delFormAttr[2]."'>";

					echo "<tr bgcolor='#999999' align='center'>";
					if($extab==true){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>&nbsp;</td>";
					}
					if($this->special){
						for($i=0;$i<sizeof($this->specialType);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet[$i][4]==""?"&nbsp;":$this->specialSet[$i][4])."</td>";
						}
					}
					if($this->del){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "<a href=\"javascript:if(confirm('กรุณายืนยันการลบข้อมูลดังกล่าว')) document.".$this->delFormAttr[0].".submit();\">ลบ</a>";
						echo "<input name='delbutton' id='delbutton' type='checkbox' onclick='checkall()'>";
						echo "</td>";
					}
					if($this->edit){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo $wording_lan["word"]["edit"];
						echo "</td>";
					}
					for($i=0;$i<sizeof($showList);$i++){
						echo "<td ".($showSpace[$i]==""?"":"width='$showSpace[$i]'")."' style='".$style_l.$style_t.$style_b."'>";
						echo "<a style='color:#FFFFFF' href='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "pg=".$this->cPage."&ord=".$showList[$i];
						echo "&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."'>".($showDesc[$i]==""?$showList[$i]:$showDesc[$i])."</a>";
						echo "</td>";
					}
					echo "</tr>";
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							$hlcolor = '';
							if($this->HLightField!='')
							for($j=0;$j<sizeof($showList);$j++){
								$fieldCause = ($this->HLightField==""?$showList[$j]:$this->HLightField);
								
								/*if($this->HLight[$fieldCause]['VAL'] < $this->HLight[$fieldCause]['STOCK']){
									$hlcolor = $this->HLight[$fieldCause]['COLOR'][$i%sizeof($this->HLight[$fieldCause]['COLOR'])];
									break;
								}*/

								if($info[$fieldCause]>$info[$this->HLight[$fieldCause]['VAL']]){
									$hlcolor = $this->HLight[$fieldCause]['COLOR'][$i%sizeof($this->HLight[$fieldCause]['COLOR'])];
									break;
								}
							}
							$hltronmouse = " onmouseover=\"this.style.background='#FFCC99'\" ";
							$hltronmouse .= " onmouseout=\"this.style.background='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."'\" ";
							echo "<tr id='trtab[]' bgcolor='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."' $hltronmouse>";
							if($extab==true)
								echo "<td style='".$style_l."'>&nbsp;</td>";
							if($this->special){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet[$j][1]."[]' onclick=\" ".$this->specialSet[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet[$j][3]);$k++){
										echo "'".$info[$this->specialSet[$j][3][$k]]."'".($k==sizeof($this->specialSet[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							if($this->del){
								echo "<td align='center' style='".$style_l."'>";
								echo "<input type='checkbox' name='".$this->delFormAttr[3]."[$i]' value='".$info[$this->delSet[2]]."'>";
								echo "</td>";
							}
							if($this->edit){
								echo "<td align='center' style='".$style_l."'>";
								echo "<a href='".$this->editSet[0]."?state=2&".($this->editSet[3]==""?"":$this->editSet[3]);
								$getname = explode(",",$this->editSet[1]);
								$getval = explode(",",$this->editSet[2]);
								for($j=0;$j<sizeof($getname);$j++)
									echo "&".$getname[$j]."=".$info[$getval[$j]];
								echo "'><img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
								echo "src='./images/editlink.gif'/></a></td>";
							}
							for($j=0;$j<sizeof($showList);$j++){
								echo "<td align='".($showAlign[$j]==""?"left":$showAlign[$j])."' style='".$style_l."'>";
								if($showAlign[$j]=="" || strtolower($showAlign[$j])=="left")
									echo "&nbsp;";
								if(isset($showLink[$j]) && $showLink[$j]!="") 
									echo "<a href='".$showLink[$j].$info[$showList[$j]]."'>";
								if(isset($formatList[$j]) && $formatList[$j]!="") 
									echo number_format($info[$showList[$j]],$formatList[$j],'.',',');
								else echo $info[$showList[$j]];
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								if(isset($showLink[$j]) && $showLink[$j]!="") echo "</a>";
								if(strtolower($showAlign[$j])=="right")	echo "&nbsp;";
								echo "</td>";
							}
							echo "</tr>";
						}else break;
					}
					echo "</form>";
					echo "<tr><td colspan='$col' height='1' bgcolor='#000000'></td></tr>";
					if($this->sum==true){
						echo "<tr bgcolor='".($this->allSum==true?"#BBBBBB":"#999999")."'>";
						echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>".$wording_lan["word"]["sum_text"]."</td>";						
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";
								if($formatList[$i]!="") 
									echo number_format($sumVal[$i],$formatList[$i],'.',',');
								else echo $sumVal[$i];
								echo "&nbsp;</td>";
							}else{
								if($i-1>=0)
									echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
								else
									echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
							}
						}
						echo "</tr>";
						if($this->allSum==true){
							echo "<tr bgcolor='#999999'>";
							echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>จาก</td>";						
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";//.number_format(,2,'.','');
									if($formatList[$i]!="") 
										echo number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',',');
									else echo $this->allSumVal[$showList[$i]];
									echo "&nbsp;</td>";
								}else{
									if($i-1>=0)
										echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
									else
										echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
								}
							}
							echo "</tr>";
						}
					}
					if($this->pageLinkShow['bottom']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						$this->pageShow();
						echo "</td></tr>";
					}
				}
				//end show report
				echo "</table>";
				break;
		}
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function pageShow(){
		if($this->cPage!=1){
			//---------------
			//	[<<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=1&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<<]</a>";
			//---------------
			//	[<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage-1)."&ord=".$ordr."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<]</a>";
		}else{ echo "<font color='#999999'>[<<][<]</font>";}
		
		$pLink = $this->cPage>5?$this->cPage:6;
		$pLink = $this->nPage-5<$pLink?$this->nPage-5:$pLink;
		for($i=($pLink-5);$i<=($pLink+5);$i++){
			if($i>$this->nPage) break;
			if($i<=0) continue;
			//---------------
			//	1 2 3 ... N
			//---------------
			if($i==$this->cPage) echo "<b>";
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$i."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'> $i </a>";
			if($i==$this->cPage) echo "</b>";
		}
		
		if($this->cPage!=$this->nPage){
			//---------------
			//	[>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage+1)."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>]</a>";
			//---------------
			//	[>>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$this->nPage."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>>]</a>";
		}else{ echo "<font color='#999999'>[>][>>]</font>";}
		
		echo "<font color='#999999'> | ".$wording_lan["word"]["gotopage"]." <input type='text' name='pg' id='pg'  size='1' ";
		echo "style='text-align:right;font-size:10px;background-color: #CCCCCC;border: 1px solid #000000;' ";
		echo "onKeyUp='pageset(window.event.keyCode,\"pg\",\"pg\")' title='".$wording_lan["tab3_3_14"] ."'/></font>";
	}
	//row_flag will be 'CALC' or 'NCALC'
	//CALC refer to calculate number of record
	//NCALC refer to not calculate number of record
	public function exportXls($dir,$fileName,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$fp = fopen($dir."/".$fileName,"w");
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				//show report
				if(mysql_num_rows($this->rs)<=0){
				}else{
					//หัวข้อที่ต้องการแสดง
					for($i=0;$i<sizeof($showList);$i++){
						fprintf($fp,"%s\t",($showDesc[$i]==""?$showList[$i]:$showDesc[$i]));
					}
					fprintf($fp,"\n");
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							for($j=0;$j<sizeof($showList);$j++){
								if(isset($formatList[$j]) && $formatList[$j]!="") {
									fprintf($fp,number_format($info[$showList[$j]],$formatList[$j],'.',','));	
								}
								else{ 						
									if (ctype_digit($info[$showList[$j]]))$info[$showList[$j]] = '="'.$info[$showList[$j]].'"'; 
									fprintf($fp,$info[$showList[$j]]);
									
								}
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								fprintf($fp,"\t");
							}
							fprintf($fp,"\n");
						}else break;
					}
					if($this->sum==true){
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								if($formatList[$i]!="") 
									fprintf($fp,number_format($sumVal[$i],$formatList[$i],'.',','));
								else fprintf($fp,$sumVal[$i]);
								fprintf($fp,"\t");
							}else{
								if($i-1>=0)
									fprintf($fp,"\t");
								else
									fprintf($fp,"\t");
							}
						}
						fprintf($fp,"\n");
						if($this->allSum==true){
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									if($formatList[$i]!="") 
										fprintf($fp,number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',','));
									else fprintf($fp,$this->allSumVal[$showList[$i]]);
									fprintf($fp,"\t");
								}else{
									if($i-1>=0)
										fprintf($fp,"\t");
									else
										fprintf($fp,"\t");
								}
							}
							fprintf($fp,"\n");
						}
					}
				}
				break;
		}
		fclose($fp);
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function download($dir,$fileName){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$buff = "";
		$fp = fopen($dir."/downloadXls.php","w");
		fprintf($fp,"<? header('Pragma: public');");
		fprintf($fp,"header('Expires: 0');");
		fprintf($fp,"header('Cache-Control: must-revalidate, post-check=0, pre-check=0');");
		fprintf($fp,"header('Content-Type: application/force-download');");
		fprintf($fp,"header('Content-Type: application/octet-stream');");
		fprintf($fp,"header('Content-Type: application/download');");
		fprintf($fp,"header('Content-Disposition: attachment;filename=$fileName');");
		fprintf($fp,"header('Content-Transfer-Encoding: binary');");
		fprintf($fp,"readfile('$fileName'); ?>");
		//fprintf($fp,$buff);
		
		return "./$dir/downloadXls.php";
	}
	public function getParam(){
		$param = $this->alink."?";
		$param .= ($this->alinkarg==""?"":$this->alinkarg."&");
		$param .= "pg=".$this->cPage."&ord=".$this->order;
		$param .= "&srt=".($this->dsort==" ASC "?"DOWN":"UP");
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$param .= ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
		$param .= "&lp=".$this->lPage;
		return $param;
	}
	public function getSQL($row_flag){
		$strcause = "";
		$start = ($this->cPage-1)*$this->lPage;
		$strwhere = " AND ";
		if(strpos(strtolower($this->qry),"where")===false)
			$strwhere = " WHERE ";
		$ord = $this->order==''?'':(" ORDER BY ".$this->order.$this->dsort);
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$strcause = $this->cause[0]==''?'':($strwhere.$this->cause[0]." LIKE '%".$this->cause[1]."%' ");
		if($row_flag=="CALC")
			$sql = "SELECT SQL_CACHE SQL_CALC_FOUND_ROWS ".substr($this->qry,6,strlen($this->qry)).$strcause.$ord;
		else
			$sql = $this->qry.$strcause.$ord;
		if($this->lPage!="ALL")
			return $sql." LIMIT $start , ".$this->lPage." ";
		else
			return $sql;
	}
}

//require("./cls/sqlAnalizer.php");
class repGenerator{
	private $sqlAnalz;// = new sqlAnalizer();
	private $rs;
	private $order = "";
	private $dsort = " ASC ";
	private $cause = "";
	//page property
	private $lPage = 500;
	private $cPage = 1;
	private $nInfo = 0;
	private $nPage;
	private $alink;
	private $alinkarg;
	private $blink;
	private $blinkarg;
	//page link
	private $pageLinkAlign = "left";
	private $pageLinkShow = array('top'=>true,'bottom'=>true);
	//private $conn;
	private $showField = "";
	private $showFieldFormat = "";
	private $fieldDesc = "";
	private $fieldAlign = "";
	private $fieldSpace = "";
	private $fieldLink = "";
	//query string
	private $qry = "";
	private $rowqry = "";
	private $sqltable;
	private $sqlWhere;
	private $twidth;
	private $theight;
	private $talign = "left";
	private $HLight;
	private $HLightField = "";
	//private $cqry = "";
	//private $xfield;
	//del and edit setting
	private $sum = false;
	private $allSum = false;
	private $sumList;
	private $allSumVal;
	private $del = false;
	private $delSet;
	private $delFormAttr = array("maindel","","post","delfield");
	private $edit = false;
	private $editSet;
	//specialset
	private $special = false;
	private $specialSet;
	private $specialType;
	//search
	private $search = false;
	private $searchKey;
	private $searchKeyDesc;
	private $space;
//constructer
	public function repGenerator(){
		$this->alink = $PHP_SELF;
		//$this->sqlAnalz = new sqlAnalizer();
		//if(isset($_GET['od']))
		//$this->conn = $conn;
	}
//method
//--setting
	public function setLimPage($num){
		$this->lPage = $num;
	}
	public function setRowQry($qryStr){
		$this->rowqry = $qryStr;
	}
	public function setAlign($align){
		$this->talign = $align;
	}
	public function setShowIndex($isshow){
		$this->index = $isshow;
	}
	public function setHLight($field,$value,$color,$hideInfo){
		$this->HLight[$field] = array('VAL'=>$value,'COLOR'=>$color);
		if($hideInfo=="HIDE"){
			$this->HLightField = $field;
		}
		//echo print_r($this->HLight[$field]);
	}
	public function setPageLinkAlign($align){
		$this->pageLinkAlign = $align;
	}
	public function setPageLinkShow($top,$bottom){
		$this->pageLinkShow['top'] = $top;
		$this->pageLinkShow['bottom'] = $bottom;
	}
	public function setLink($link,$arg){
		$this->alink = $link;
		$this->alinkarg = $arg;
	}
	public function setBackLink($link,$arg){
		$this->blink = $link;
		$this->blinkarg = $arg;
	}
	public function setCurPage($num){
		$this->cPage = $num;
	}
	public function setSize($width,$height){
		$this->twidth = $width;
		$this->theight = $height;
	}
	public function setSpecial($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special = true;
		$this->specialType[sizeof($this->specialType)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet[sizeof($this->specialSet)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSpecial1($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special1 = true;
		$this->specialType1[sizeof($this->specialType1)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet1[sizeof($this->specialSet1)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSum($sumflag,$allsumflag,$fieldSumList){
		$this->sum = $sumflag;
		$this->allSum = $allsumflag;
		$this->sumList = $fieldSumList;
	}
	public function setSearch($skey){
		$this->search = true;
		$this->searchKey = $skey;
	}
	public function setSpace($str){
		$this->space[sizeof($this->space)] = $str;
	}
	public function setSearchDesc($skeyDesc){
		$this->searchKeyDesc = $skeyDesc;
	}
	public function setDel($link,$key,$param,$arg){
		$this->del = true;
		$this->delSet = array($link,$key,$param,$arg);
	}
	public function setFromDelAttr($name,$action,$method,$delfield){		
		$this->delFormAttr = array($name,$action,$method,$delfield);
	}
	public function setEdit($link,$key,$param,$arg){
		$this->edit = true;
		$this->editSet = array($link,$key,$param,$arg);
	}
	public function setShowField($fieldNameList){
		$this->showField = $fieldNameList;
	}
	public function setFieldFloatFormat($fieldFormatList){
		$this->showFieldFormat = $fieldFormatList;
	}
	public function setFieldDesc($fieldDescList){
		$this->fieldDesc = $fieldDescList;
	}
	public function setFieldAlign($fieldAlignList){
		$this->fieldAlign = $fieldAlignList;
	}
	public function setFieldSpace($fieldSpaceList){
		$this->fieldSpace = $fieldSpaceList;
	}
	public function setFieldLink($fieldLinkList){
		$this->fieldLink = $fieldLinkList;
	}
	public function setQuery($str){
		$this->qry = $str;
	}
	public function setResult($rs){
		$this->rs = $rs;
	}
	public function setOrder($order){
		$this->order = $order;
	}
	public function setCause($key,$cuase){
		$this->cause = array($key,$cuase);
	}
	public function setLimitPage($num){ //num || ALL
		if(!is_int($num) && $num=="ALL")
			$this->lPage = "ALL";
		else
			$this->lPage = $num<10?$this->lPage:$num;
		
		//echo $num;
		//echo $this->lPage;
	}
	public function setSort($sort){
		switch($sort){
			case 'UP':
				$this->dsort = " DESC ";
				break;
			case 'DOWN':
				$this->dsort = " ASC ";
				break;
		}
	}
	public function checkScript(){
		?><script type="text/javascript" language="javascript">
		function checkall(){
			var parm = document.getElementById('delbutton').checked==true?true:false;
			for (i=0; i<document.<?=$this->delFormAttr[0]?>.elements.length;i++){
				if (document.<?=$this->delFormAttr[0]?>.elements[i].type == "checkbox" ){
					document.<?=$this->delFormAttr[0]?>.elements[i].checked = parm;
				}
			}
		}
		function pageset(key,name,getname){
			if(key==13 || key==10){
				//alert(window.location.toString().indexOf("&"));
				//alert(window.location.toString().charAt(67));
				var url  = "<?=$this->getParam()?>";
				var head = url.substr(0,url.indexOf("&"+getname));
				var foot = url.substr(url.indexOf(getname));
				//alert(foot.indexOf("&"))
				if(foot.indexOf("&")>=0)
					foot = foot.substr(foot.indexOf("&"));
				else
					foot = "";
				if(head=="")
					window.parent.location += "&" + getname + "="+document.getElementById(name).value;
				else
					window.parent.location = head + "&" + getname + "="+document.getElementById(name).value + foot;
			}
				// = "index.php?";
		}
		</script><?
	}
//--calculator
	public function rowCalc(){
		$sql = "";
		/*var $rs;
		var $row;
		var $showFieldList;
		var $sumList;*/
		$rs = mysql_query("SELECT FOUND_ROWS() AS clsrows"); 
		if(mysql_num_rows($rs)>0){
			$row = mysql_result($rs,0,'clsrows');
			mysql_free_result($rs);
		}else{
			$row = 0;//echo "SELECT COUNT(*) AS clsrows FROM (".$this->qry.$cause.") AS tabclsrow ";
		}
			
		if(!is_int($this->lPage) && $this->lPage=="ALL")
			$this->nPage = 1;
		else
			$this->nPage = ceil($row/$this->lPage);
		$this->nInfo = $row;
		//sum
		if($this->allSum==true){
			$this->showField = str_replace(' ','',$this->showField);
			$this->sumList = str_replace(' ','',$this->sumList);
			//print_r($this->sumList);
			$showFieldList = explode(',',$this->showField);
			$sumList = explode(',',$this->sumList);
			for($i=0;$i<sizeof($showFieldList);$i++){
				if($sumList[$i]){//qry.$cause.$ord
					$lmpos = strpos($this->getSQL("NCAL"),"LIMIT")==false?strlen($this->getSQL("NCAL")):strpos($this->getSQL("NCAL"),"LIMIT");
					$sql = substr($this->getSQL("NCAL"),0,$lmpos);
					$sql = "SELECT SUM(".$showFieldList[$i].") AS ".$showFieldList[$i]." FROM (".$sql.") AS tab";
					$rs = mysql_query($sql);
					$this->allSumVal[$showFieldList[$i]] = mysql_result($rs,0,$showFieldList[$i]);
					mysql_free_result($rs);
				}
			}
		}
		//print_r($this->allSumVal);
	}
//--running
	public function showRec($isshow,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$trcolor = array("#EDEDED","#FFFFFF");
		$style_l = "border-left:1 solid #FFFFFF;";
		$style_t = "border-top:1 solid #000000;";
		$style_b = "border-bottom:1 solid #000000;";
		$this->checkScript();
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				echo "<table align='".$this->talign."' ".($this->twidth==""?"":"width='$this->twidth'")." ".($this->theight==""?"":"height='$this->theight'")." border='0' cellpadding='0' cellspacing='0'>";
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->fieldAlign = str_replace(' ','',$this->fieldAlign);
					$showAlign = explode(',',$this->fieldAlign);
					$this->fieldSpace = str_replace(' ','',$this->fieldSpace);
					$showSpace = explode(',',$this->fieldSpace);
					$this->fieldLink = str_replace(' ','',$this->fieldLink);
					$showLink = explode(',',$this->fieldLink);
					$this->searchKey = str_replace(' ','',$this->searchKey);
					$showSearch = explode(',',$this->searchKey);
					$this->searchKeyDesc = str_replace(' ','',$this->searchKeyDesc);
					$showSearchDesc = explode(',',$this->searchKeyDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				$col = sizeof($showList);
				$col += $this->del==true?1:0;
				$col += $this->edit==true?1:0;
				$col += $this->special==true?sizeof($this->specialType):0;
				//echo sizeof($this->specialType);
				$extab = $col==sizeof($showList)?true:false;
				$extab = $this->sum==true?$extab:false;
				$col += $extab==true?1:0;
				$col += $this->special1==true?sizeof($this->specialType1):0;
				//show report
				if(mysql_num_rows($this->rs)<=0){
					echo "<tr><td bgcolor='#990000' align='center'><font color='#FFFFFF'>ไม่พบข้อมูล</font></td></tr>";
					echo "<tr></tr><td align='center'>[<a href='javascript:history.back()'>Back</a>]</td></tr>";
				}else{
					echo "<tr><td colspan='".$col."'><table><tr><td>";
					if($this->search){
						echo "<fieldset><form style='margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;' ";
						echo "name='searh' id='searh' action='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "ord=".$showList[$i]."&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."' method='post'>";
					//หัวข้อที่ต้องการแสดง
						//echo "<br />";
						echo "<input type='text' name='scause'>";
						echo "<select name='skey'>";
						for($i=0;$i<sizeof($showSearch);$i++){
							echo "<option value='".$showSearch[$i]."' ".($this->cause[0]==$showSearch[$i]?"selected":"").">$showSearchDesc[$i]</option>";
						}
						echo "</select>";
						echo "<input type='submit' value='ค้น'>";
					echo "</form></fieldset>";
					}
					echo "</td>";
					for($i=0;$i<sizeof($this->space);$i++)
						echo "<td align='center' width='120'>".$this->space[$i]."</td>";
					echo "</tr></table> </td></tr>";
					if($this->pageLinkShow['top']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						echo "<div><font color='#999999'>";
						echo "แสดง ".($this->cPage==$this->nPage?$this->nInfo-(($this->nPage-1)*$this->lPage):$this->lPage);
						echo " รายการ จาก ".$this->nInfo." รายการ จำนวน ".$this->nPage." หน้า หน้าละ ";
						echo "<input name='lp' type='text' size='1' style='text-align:right;font-size:10px;background-color: ";
						echo "#CCCCCC;border: 1px solid #000000;' onKeyUp='pageset(window.event.keyCode,\"lp\",\"lp\" )' ";
						echo "title='Enter เพื่อปรับแต่งการแสดงผล \n(ALL=แสดงทั้งหมด)' value='".$this->lPage."'> ข้อมูล</font></div>";
						$this->pageShow();
						echo "</td></tr>";
					}
					echo "<form name='".$this->delFormAttr[0]."' id='".$this->delFormAttr[0]."' action='".$this->delFormAttr[1]."' method='".$this->delFormAttr[2]."'>";

					echo "<tr bgcolor='#999999' align='center'>";
					if($extab==true){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>&nbsp;</td>";
					}
					if($this->special){
						for($i=0;$i<sizeof($this->specialType);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet[$i][4]==""?"&nbsp;":$this->specialSet[$i][4])."</td>";
						}
					}
					if($this->del){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "<a href=\"javascript:if(confirm('กรุณายืนยันการลบข้อมูลดังกล่าว')) document.".$this->delFormAttr[0].".submit();\">ลบ</a>";
						echo "<input name='delbutton' id='delbutton' type='checkbox' onclick='checkall()'>";
						echo "</td>";
					}
					if($this->edit){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "แก้ไข";
						echo "</td>";
					}
					for($i=0;$i<sizeof($showList);$i++){
						echo "<td ".($showSpace[$i]==""?"":"width='$showSpace[$i]'")."' style='".$style_l.$style_t.$style_b."'>";
						echo "<a style='color:#FFFFFF' href='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "pg=".$this->cPage."&ord=".$showList[$i];
						echo "&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."'>".($showDesc[$i]==""?$showList[$i]:$showDesc[$i])."</a>";
						echo "</td>";
					}
					if($this->special1){
						for($i=0;$i<sizeof($this->specialType1);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet1[$i][4]==""?"&nbsp;":$this->specialSet1[$i][4])."</td>";
						}
					}
					echo "</tr>";
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							$hlcolor = '';
							if($this->HLightField!='')
							for($j=0;$j<sizeof($showList);$j++){
								$fieldCause = ($this->HLightField==""?$showList[$j]:$this->HLightField);
								//echo "$fieldCause ".$info[$fieldCause]." | ".$this->HLight[$fieldCause]['VAL']."<br />";
								if($info[$fieldCause]==$this->HLight[$fieldCause]['VAL']){
									$hlcolor = $this->HLight[$fieldCause]['COLOR'][$i%sizeof($this->HLight[$fieldCause]['COLOR'])];
									break;
								}
							}
							$hltronmouse = " onmouseover=\"this.style.background='#FFCC99'\" ";
							$hltronmouse .= " onmouseout=\"this.style.background='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."'\" ";
							echo "<tr id='trtab[]' bgcolor='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."' $hltronmouse>";
							if($extab==true)
								echo "<td style='".$style_l."'>&nbsp;</td>";
							if($this->special){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet[$j][1]."[]' onclick=\" ".$this->specialSet[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet[$j][3]);$k++){
										echo "'".$info[$this->specialSet[$j][3][$k]]."'".($k==sizeof($this->specialSet[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							if($this->del){
								echo "<td align='center' style='".$style_l."'>";
								echo "<input type='checkbox' name='".$this->delFormAttr[3]."[$i]' value='".$info[$this->delSet[2]]."'>";
								echo "</td>";
							}
							if($this->edit){
								echo "<td align='center' style='".$style_l."'>";
								echo "<a href='".$this->editSet[0]."?state=2&".($this->editSet[3]==""?"":$this->editSet[3]);
								$getname = explode(",",$this->editSet[1]);
								$getval = explode(",",$this->editSet[2]);
								for($j=0;$j<sizeof($getname);$j++)
									echo "&".$getname[$j]."=".$info[$getval[$j]];
								echo "'><img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
								echo "src='./images/editlink.gif'/></a></td>";
							}
							for($j=0;$j<sizeof($showList);$j++){
								$cm_rcode = $info["rcode"]+1;

								echo "<td align='".($showAlign[$j]==""?"left":$showAlign[$j])."' style='".$style_l."'>";
								if($showAlign[$j]=="" || strtolower($showAlign[$j])=="left")
									echo "&nbsp;";
								if(isset($showLink[$j]) && $showLink[$j]!="") 
									//echo "<a href='".$showLink[$j].$info['id']."'>";
							//	echo "<a href='".$showLink[$j].$info[$showList[$j]]."'>";

							
							echo "<a href='".$showLink[$j].$info[$showList[$j]]."&fmcode=".$info["mcode"]."&cmc=".$info["mcode"]."&ftrcode1=".$info["rcode"]."&cm_rcode=".$cm_rcode."'>";
								if(isset($formatList[$j]) && $formatList[$j]!="") 
									echo number_format($info[$showList[$j]],$formatList[$j],'.',',');
								else echo $info[$showList[$j]];
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								if(isset($showLink[$j]) && $showLink[$j]!="") echo "</a>";
								if(strtolower($showAlign[$j])=="right")	echo "&nbsp;";
								echo "</td>";
							}
							if($this->special1){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType1);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet1[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet1[$j][1]."[]' onclick=\" ".$this->specialSet1[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet1[$j][3]);$k++){
										echo "'".$info[$this->specialSet1[$j][3][$k]]."'".($k==sizeof($this->specialSet1[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet1[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet1[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							echo "</tr>";
						}else break;
					}
					echo "</form>";
					echo "<tr><td colspan='$col' height='1' bgcolor='#000000'></td></tr>";
					if($this->sum==true){
						echo "<tr bgcolor='".($this->allSum==true?"#BBBBBB":"#999999")."'>";
						echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>รวม</td>";						
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";
								if($formatList[$i]!="") 
									echo number_format($sumVal[$i],$formatList[$i],'.',',');
								else echo $sumVal[$i];
								echo "&nbsp;</td>";
							}else{
								if($i-1>=0)
									echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
								else
									echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
							}
						}
						echo "</tr>";
						if($this->allSum==true){
							echo "<tr bgcolor='#999999'>";
							echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>จาก</td>";						
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";//.number_format(,2,'.','');
									if($formatList[$i]!="") 
										echo number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',',');
									else echo $this->allSumVal[$showList[$i]];
									echo "&nbsp;</td>";
								}else{
									if($i-1>=0)
										echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
									else
										echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
								}
							}
							echo "</tr>";
						}
					}
					if($this->pageLinkShow['bottom']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						$this->pageShow();
						echo "</td></tr>";
					}
				}
				//end show report
				echo "</table>";
				break;
		}
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function pageShow(){
		if($this->cPage!=1){
			//---------------
			//	[<<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=1&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<<]</a>";
			//---------------
			//	[<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage-1)."&ord=".$ordr."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<]</a>";
		}else{ echo "<font color='#999999'>[<<][<]</font>";}
		
		$pLink = $this->cPage>5?$this->cPage:6;
		$pLink = $this->nPage-5<$pLink?$this->nPage-5:$pLink;
		for($i=($pLink-5);$i<=($pLink+5);$i++){
			if($i>$this->nPage) break;
			if($i<=0) continue;
			//---------------
			//	1 2 3 ... N
			//---------------
			if($i==$this->cPage) echo "<b>";
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$i."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'> $i </a>";
			if($i==$this->cPage) echo "</b>";
		}
		
		if($this->cPage!=$this->nPage){
			//---------------
			//	[>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage+1)."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>]</a>";
			//---------------
			//	[>>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$this->nPage."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>>]</a>";
		}else{ echo "<font color='#999999'>[>][>>]</font>";}
		
		echo "<font color='#999999'> | ไปยังหน้า <input type='text' name='pg' id='pg'  size='1' ";
		echo "style='text-align:right;font-size:10px;background-color: #CCCCCC;border: 1px solid #000000;' ";
		echo "onKeyUp='pageset(window.event.keyCode,\"pg\",\"pg\")' title='Enter เพื่อไปยังหน้าที่ต้องการ'/></font>";
	}
	//row_flag will be 'CALC' or 'NCALC'
	//CALC refer to calculate number of record
	//NCALC refer to not calculate number of record
	public function exportXls($dir,$fileName,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$fp = fopen($dir."/".$fileName,"w");
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				//show report
				if(mysql_num_rows($this->rs)<=0){
				}else{
					//หัวข้อที่ต้องการแสดง
					for($i=0;$i<sizeof($showList);$i++){
						fprintf($fp,"%s\t",($showDesc[$i]==""?$showList[$i]:$showDesc[$i]));
					}
					fprintf($fp,"\n");
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							for($j=0;$j<sizeof($showList);$j++){
							if(isset($formatList[$j]) && $formatList[$j]!="") {
									fprintf($fp,number_format($info[$showList[$j]],$formatList[$j],'.',','));	
								}
								else{ 						
									if (ctype_digit($info[$showList[$j]]))$info[$showList[$j]] = '="'.$info[$showList[$j]].'"'; 
									fprintf($fp,$info[$showList[$j]]);
									
								}
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								fprintf($fp,"\t");
							}
							fprintf($fp,"\n");
						}else break;
					}
					if($this->sum==true){
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								if($formatList[$i]!="") 
									fprintf($fp,number_format($sumVal[$i],$formatList[$i],'.',','));
								else fprintf($fp,$sumVal[$i]);
								fprintf($fp,"\t");
							}else{
								if($i-1>=0)
									fprintf($fp,"\t");
								else
									fprintf($fp,"\t");
							}
						}
						fprintf($fp,"\n");
						if($this->allSum==true){
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									if($formatList[$i]!="") 
										fprintf($fp,number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',','));
									else fprintf($fp,$this->allSumVal[$showList[$i]]);
									fprintf($fp,"\t");
								}else{
									if($i-1>=0)
										fprintf($fp,"\t");
									else
										fprintf($fp,"\t");
								}
							}
							fprintf($fp,"\n");
						}
					}
				}
				break;
		}
		fclose($fp);
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function download($dir,$fileName){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$buff = "";
		$fp = fopen($dir."/downloadXls.php","w");
		fprintf($fp,"<? header('Pragma: public');");
		fprintf($fp,"header('Expires: 0');");
		fprintf($fp,"header('Cache-Control: must-revalidate, post-check=0, pre-check=0');");
		fprintf($fp,"header('Content-Type: application/force-download');");
		fprintf($fp,"header('Content-Type: application/octet-stream');");
		fprintf($fp,"header('Content-Type: application/download');");
		fprintf($fp,"header('Content-Disposition: attachment;filename=$fileName');");
		fprintf($fp,"header('Content-Transfer-Encoding: binary');");
		fprintf($fp,"readfile('$fileName'); ?>");
		//fprintf($fp,$buff);
		
		return "./$dir/downloadXls.php";
	}
	public function getParam(){
		$param = $this->alink."?";
		$param .= ($this->alinkarg==""?"":$this->alinkarg."&");
		$param .= "pg=".$this->cPage."&ord=".$this->order;
		$param .= "&srt=".($this->dsort==" ASC "?"DOWN":"UP");
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$param .= ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
		$param .= "&lp=".$this->lPage;
		return $param;
	}
	public function getSQL($row_flag){
		$strcause = "";
		$start = ($this->cPage-1)*$this->lPage;
		$strwhere = " AND ";
		if(strpos(strtolower($this->qry),"where")===false)
			$strwhere = " WHERE ";
		$ord = $this->order==''?'':(" ORDER BY ".$this->order.$this->dsort);
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$strcause = $this->cause[0]==''?'':($strwhere.$this->cause[0]." LIKE '%".$this->cause[1]."%' ");
		if($row_flag=="CALC")
			$sql = "SELECT SQL_CACHE SQL_CALC_FOUND_ROWS ".substr($this->qry,6,strlen($this->qry)).$strcause.$ord;
		else
			$sql = $this->qry.$strcause.$ord;
		if($this->lPage!="ALL")
			return $sql." LIMIT $start , ".$this->lPage." ";
		else
			return $sql;
	}
}
?>
<? 
/******************test showRec*********************

****************************************************/
/*	$link = mysql_connect('localhost', 'root', '1422528');
	$charset = "SET NAMES 'tis620'"; 
    mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	$rec = new repGenerator();
	$rec->setQuery("SELECT * FROM fs_image");
	$rec->setSort($_GET['srt']);
	$rec->setOrder($_GET['ord']);
	if(isset($_GET['pg']))
		$rec->setCurPage($_GET['pg']);
	//$rec->setShowField("ID,MCODE");
	$rec->showRec(1,'SH_QUERY');
	mysql_close($link);
*/
/******************end test showRec*****************

****************************************************/

?>
<?
//require("./cls/sqlAnalizer.php");
class repGenerator_b{
	private $sqlAnalz;// = new sqlAnalizer();
	private $rs;
	private $order = "";
	private $dsort = " ASC ";
	private $cause = "";
	//page property
	private $lPage = 200;
	private $cPage = 1;
	private $nInfo = 0;
	private $nPage;
	private $alink;
	private $alinkarg;
	private $blink;
	private $blinkarg;
	//page link
	private $pageLinkAlign = "left";
	private $pageLinkShow = array('top'=>true,'bottom'=>true);
	//private $conn;
	private $showField = "";
	private $showFieldFormat = "";
	private $fieldDesc = "";
	private $fieldAlign = "";
	private $fieldSpace = "";
	private $fieldLink = "";
	//query string
	private $qry = "";
	private $rowqry = "";
	private $sqltable;
	private $sqlWhere;
	private $twidth;
	private $theight;
	private $talign = "left";
	private $HLight;
	private $HLightField = "";
	//private $cqry = "";
	//private $xfield;
	//del and edit setting
	private $sum = false;
	private $allSum = false;
	private $sumList;
	private $allSumVal;
	private $del = false;
	private $delSet;
	private $delFormAttr = array("maindel","","post","delfield");
	private $edit = false;
	private $editSet;
	//specialset
	private $special = false;
	private $specialSet;
	private $specialType;
	//search
	private $search = false;
	private $searchKey;
	private $searchKeyDesc;
	private $space;
//constructer
	public function repGenerator(){
		$this->alink = $PHP_SELF;
		//$this->sqlAnalz = new sqlAnalizer();
		//if(isset($_GET['od']))
		//$this->conn = $conn;
	}
//method
//--setting
	public function setLimPage($num){
		$this->lPage = $num;
	}
	public function setRowQry($qryStr){
		$this->rowqry = $qryStr;
	}
	public function setAlign($align){
		$this->talign = $align;
	}
	public function setShowIndex($isshow){
		$this->index = $isshow;
	}
	public function setHLight($field,$value,$color,$hideInfo){
		$this->HLight[$field] = array('VAL'=>$value,'COLOR'=>$color);
		if($hideInfo=="HIDE"){
			$this->HLightField = $field;
		}
		//echo print_r($this->HLight[$field]);
	}
	public function setPageLinkAlign($align){
		$this->pageLinkAlign = $align;
	}
	public function setPageLinkShow($top,$bottom){
		$this->pageLinkShow['top'] = $top;
		$this->pageLinkShow['bottom'] = $bottom;
	}
	public function setLink($link,$arg){
		$this->alink = $link;
		$this->alinkarg = $arg;
	}
	public function setBackLink($link,$arg){
		$this->blink = $link;
		$this->blinkarg = $arg;
	}
	public function setCurPage($num){
		$this->cPage = $num;
	}
	public function setSize($width,$height){
		$this->twidth = $width;
		$this->theight = $height;
	}
	public function setSpecial($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special = true;
		$this->specialType[sizeof($this->specialType)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet[sizeof($this->specialSet)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSpecial1($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special1 = true;
		$this->specialType1[sizeof($this->specialType1)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet1[sizeof($this->specialSet1)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSum($sumflag,$allsumflag,$fieldSumList){
		$this->sum = $sumflag;
		$this->allSum = $allsumflag;
		$this->sumList = $fieldSumList;
	}
	public function setSearch($skey){
		$this->search = true;
		$this->searchKey = $skey;
	}
	public function setSpace($str){
		$this->space[sizeof($this->space)] = $str;
	}
	public function setSearchDesc($skeyDesc){
		$this->searchKeyDesc = $skeyDesc;
	}
	public function setDel($link,$key,$param,$arg){
		$this->del = true;
		$this->delSet = array($link,$key,$param,$arg);
	}
	public function setFromDelAttr($name,$action,$method,$delfield){		
		$this->delFormAttr = array($name,$action,$method,$delfield);
	}
	public function setEdit($link,$key,$param,$arg){
		$this->edit = true;
		$this->editSet = array($link,$key,$param,$arg);
	}
	public function setShowField($fieldNameList){
		$this->showField = $fieldNameList;
	}
	public function setFieldFloatFormat($fieldFormatList){
		$this->showFieldFormat = $fieldFormatList;
	}
	public function setFieldDesc($fieldDescList){
		$this->fieldDesc = $fieldDescList;
	}
	public function setFieldAlign($fieldAlignList){
		$this->fieldAlign = $fieldAlignList;
	}
	public function setFieldSpace($fieldSpaceList){
		$this->fieldSpace = $fieldSpaceList;
	}
	public function setFieldLink($fieldLinkList){
		$this->fieldLink = $fieldLinkList;
	}
	public function setQuery($str){
		$this->qry = $str;
	}
	public function setResult($rs){
		$this->rs = $rs;
	}
	public function setOrder($order){
		$this->order = $order;
	}
	public function setCause($key,$cuase){
		$this->cause = array($key,$cuase);
	}
	public function setLimitPage($num){ //num || ALL
		if(!is_int($num) && $num=="ALL")
			$this->lPage = "ALL";
		else
			$this->lPage = $num<10?$this->lPage:$num;
		
		//echo $num;
		//echo $this->lPage;
	}
	public function setSort($sort){
		switch($sort){
			case 'UP':
				$this->dsort = " DESC ";
				break;
			case 'DOWN':
				$this->dsort = " ASC ";
				break;
		}
	}
	public function checkScript(){
		?><script type="text/javascript" language="javascript">
		function checkall(){
			var parm = document.getElementById('delbutton').checked==true?true:false;
			for (i=0; i<document.<?=$this->delFormAttr[0]?>.elements.length;i++){
				if (document.<?=$this->delFormAttr[0]?>.elements[i].type == "checkbox" ){
					document.<?=$this->delFormAttr[0]?>.elements[i].checked = parm;
				}
			}
		}
		function pageset(key,name,getname){
			if(key==13 || key==10){
				//alert(window.location.toString().indexOf("&"));
				//alert(window.location.toString().charAt(67));
				var url  = "<?=$this->getParam()?>";
				var head = url.substr(0,url.indexOf("&"+getname));
				var foot = url.substr(url.indexOf(getname));
				//alert(foot.indexOf("&"))
				if(foot.indexOf("&")>=0)
					foot = foot.substr(foot.indexOf("&"));
				else
					foot = "";
				if(head=="")
					window.parent.location += "&" + getname + "="+document.getElementById(name).value;
				else
					window.parent.location = head + "&" + getname + "="+document.getElementById(name).value + foot;
			}
				// = "index.php?";
		}
		</script><?
	}
//--calculator
	public function rowCalc(){
		$sql = "";
		/*var $rs;
		var $row;
		var $showFieldList;
		var $sumList;*/
		$rs = mysql_query("SELECT FOUND_ROWS() AS clsrows"); 
		if(mysql_num_rows($rs)>0){
			$row = mysql_result($rs,0,'clsrows');
			mysql_free_result($rs);
		}else{
			$row = 0;//echo "SELECT COUNT(*) AS clsrows FROM (".$this->qry.$cause.") AS tabclsrow ";
		}
			
		if(!is_int($this->lPage) && $this->lPage=="ALL")
			$this->nPage = 1;
		else
			$this->nPage = ceil($row/$this->lPage);
		$this->nInfo = $row;
		//sum
		if($this->allSum==true){
			$this->showField = str_replace(' ','',$this->showField);
			$this->sumList = str_replace(' ','',$this->sumList);
			//print_r($this->sumList);
			$showFieldList = explode(',',$this->showField);
			$sumList = explode(',',$this->sumList);
			for($i=0;$i<sizeof($showFieldList);$i++){
				if($sumList[$i]){//qry.$cause.$ord
					$lmpos = strpos($this->getSQL("NCAL"),"LIMIT")==false?strlen($this->getSQL("NCAL")):strpos($this->getSQL("NCAL"),"LIMIT");
					$sql = substr($this->getSQL("NCAL"),0,$lmpos);
					$sql = "SELECT SUM(".$showFieldList[$i].") AS ".$showFieldList[$i]." FROM (".$sql.") AS tab";
					$rs = mysql_query($sql);
					$this->allSumVal[$showFieldList[$i]] = mysql_result($rs,0,$showFieldList[$i]);
					mysql_free_result($rs);
				}
			}
		}
		//print_r($this->allSumVal);
	}
//--running
	public function showRec($isshow,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$trcolor = array("#EDEDED","#FFFFFF");
		$style_l = "border-left:1 solid #FFFFFF;";
		$style_t = "border-top:1 solid #000000;";
		$style_b = "border-bottom:1 solid #000000;";
		$this->checkScript();
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				echo "<table align='".$this->talign."' ".($this->twidth==""?"":"width='$this->twidth'")." ".($this->theight==""?"":"height='$this->theight'")." border='0' cellpadding='0' cellspacing='0'>";
				$row = @mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->fieldAlign = str_replace(' ','',$this->fieldAlign);
					$showAlign = explode(',',$this->fieldAlign);
					$this->fieldSpace = str_replace(' ','',$this->fieldSpace);
					$showSpace = explode(',',$this->fieldSpace);
					$this->fieldLink = str_replace(' ','',$this->fieldLink);
					$showLink = explode(',',$this->fieldLink);
					$this->searchKey = str_replace(' ','',$this->searchKey);
					$showSearch = explode(',',$this->searchKey);
					$this->searchKeyDesc = str_replace(' ','',$this->searchKeyDesc);
					$showSearchDesc = explode(',',$this->searchKeyDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				$col = sizeof($showList);
				$col += $this->del==true?1:0;
				$col += $this->edit==true?1:0;
				$col += $this->special==true?sizeof($this->specialType):0;
				//echo sizeof($this->specialType);
				$extab = $col==sizeof($showList)?true:false;
				$extab = $this->sum==true?$extab:false;
				$col += $extab==true?1:0;
				$col += $this->special1==true?sizeof($this->specialType1):0;
				//show report
				if(@mysql_num_rows($this->rs)<=0){
					echo "<tr><td bgcolor='#990000' align='center'><font color='#FFFFFF'>ไม่พบข้อมูล</font></td></tr>";
					echo "<tr></tr><td align='center'>[<a href='javascript:history.back()'>Back</a>]</td></tr>";
				}else{
					echo "<tr><td colspan='".$col."'><table><tr><td>";
					if($this->search){
						echo "<fieldset><form style='margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;' ";
						echo "name='searh' id='searh' action='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "ord=".$showList[$i]."&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."' method='post'>";
					//หัวข้อที่ต้องการแสดง
						//echo "<br />";
						echo "<input type='text' name='scause'>";
						echo "<select name='skey'>";
						for($i=0;$i<sizeof($showSearch);$i++){
							echo "<option value='".$showSearch[$i]."' ".($this->cause[0]==$showSearch[$i]?"selected":"").">$showSearchDesc[$i]</option>";
						}
						echo "</select>";
						echo "<input type='submit' value='ค้น'>";
					echo "</form></fieldset>";
					}
					echo "</td>";
					for($i=0;$i<sizeof($this->space);$i++)
						echo "<td align='center' width='120'>".$this->space[$i]."</td>";
					echo "</tr></table> </td></tr>";
					if($this->pageLinkShow['top']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						echo "<div><font color='#999999'>";
						echo "แสดง ".($this->cPage==$this->nPage?$this->nInfo-(($this->nPage-1)*$this->lPage):$this->lPage);
						echo " รายการ จาก ".$this->nInfo." รายการ จำนวน ".$this->nPage." หน้า หน้าละ ";
						echo "<input name='lp' type='text' size='1' style='text-align:right;font-size:10px;background-color: ";
						echo "#CCCCCC;border: 1px solid #000000;' onKeyUp='pageset(window.event.keyCode,\"lp\",\"lp\" )' ";
						echo "title='Enter เพื่อปรับแต่งการแสดงผล \n(ALL=แสดงทั้งหมด)' value='".$this->lPage."'> ข้อมูล</font></div>";
						$this->pageShow();
						echo "</td></tr>";
					}
					echo "<form name='".$this->delFormAttr[0]."' id='".$this->delFormAttr[0]."' action='".$this->delFormAttr[1]."' method='".$this->delFormAttr[2]."'>";

					echo "<tr bgcolor='#999999' align='center'>";
					if($extab==true){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>&nbsp;</td>";
					}
					if($this->special){
						for($i=0;$i<sizeof($this->specialType);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet[$i][4]==""?"&nbsp;":$this->specialSet[$i][4])."</td>";
						}
					}
					if($this->del){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "<a href=\"javascript:if(confirm('กรุณายืนยันการลบข้อมูลดังกล่าว')) document.".$this->delFormAttr[0].".submit();\">ลบ</a>";
						echo "<input name='delbutton' id='delbutton' type='checkbox' onclick='checkall()'>";
						echo "</td>";
					}
					if($this->edit){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "แก้ไข";
						echo "</td>";
					}
					for($i=0;$i<sizeof($showList);$i++){
						echo "<td ".($showSpace[$i]==""?"":"width='$showSpace[$i]'")."' style='".$style_l.$style_t.$style_b."'>";
						echo "<a style='color:#FFFFFF' href='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "pg=".$this->cPage."&ord=".$showList[$i];
						echo "&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."'>".($showDesc[$i]==""?$showList[$i]:$showDesc[$i])."</a>";
						echo "</td>";
					}
					if($this->special1){
						for($i=0;$i<sizeof($this->specialType1);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet1[$i][4]==""?"&nbsp;":$this->specialSet1[$i][4])."</td>";
						}
					}
					echo "</tr>";
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							$hlcolor = '';
							if($this->HLightField!='')
							for($j=0;$j<sizeof($showList);$j++){
								$fieldCause = ($this->HLightField==""?$showList[$j]:$this->HLightField);
								//echo "$fieldCause ".$info[$fieldCause]." | ".$this->HLight[$fieldCause]['VAL']."<br />";
								if($info[$fieldCause]==$this->HLight[$fieldCause]['VAL']){
									$hlcolor = $this->HLight[$fieldCause]['COLOR'][$i%sizeof($this->HLight[$fieldCause]['COLOR'])];
									break;
								}
							}
							$hltronmouse = " onmouseover=\"this.style.background='#FFCC99'\" ";
							$hltronmouse .= " onmouseout=\"this.style.background='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."'\" ";
							echo "<tr id='trtab[]' bgcolor='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."' $hltronmouse>";
							if($extab==true)
								echo "<td style='".$style_l."'>&nbsp;</td>";

						$a=$i+1;
						//$a=$a+1;
						//echo "<td style=>".$a."</td>";	
							if($this->special){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet[$j][0]."' ";
											break;
										case 'NUMROW' : 
											//echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo $a;
											break;
										
									}
									if($this->specialType[$j] != 'NUMROW')
									{
										echo " name='".$this->specialSet[$j][1]."[]' onclick=\" ".$this->specialSet[$j][2]."(";								
										for($k=0;$k<sizeof($this->specialSet[$j][3]);$k++){
											echo "'".$info[$this->specialSet[$j][3][$k]]."'".($k==sizeof($this->specialSet[$j][3])-1?"":",");
										}
										echo ")\" ";

									}
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
										
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							if($this->del){
								echo "<td align='center' style='".$style_l."'>";
								echo "<input type='checkbox' name='".$this->delFormAttr[3]."[$i]' value='".$info[$this->delSet[2]]."'>";
								echo "</td>";
							}
							if($this->edit){
								echo "<td align='center' style='".$style_l."'>";
								echo "<a href='".$this->editSet[0]."?state=2&".($this->editSet[3]==""?"":$this->editSet[3]);
								$getname = explode(",",$this->editSet[1]);
								$getval = explode(",",$this->editSet[2]);
								for($j=0;$j<sizeof($getname);$j++)
									echo "&".$getname[$j]."=".$info[$getval[$j]];
								echo "'><img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
								echo "src='./images/editlink.gif'/></a></td>";
							}
							for($j=0;$j<sizeof($showList);$j++){
								echo "<td align='".($showAlign[$j]==""?"left":$showAlign[$j])."' style='".$style_l."'>";
								if($showAlign[$j]=="" || strtolower($showAlign[$j])=="left")
									echo "&nbsp;";
								if(isset($showLink[$j]) && $showLink[$j]!="") 
									//echo "<a href='".$showLink[$j].$info['id']."'>";
								echo "<a href='".$showLink[$j].$info["fdate"]."&strtdate=".$info["tdate"]."&ftrcode=".$info["rcode"]."&level=".$info["level"]."&fmcode=".$info["mcode"]."&cmc=".$info["smcode"]."'>";
								if(isset($formatList[$j]) && $formatList[$j]!="") 
									echo number_format($info[$showList[$j]],$formatList[$j],'.',',');
								else echo $info[$showList[$j]];
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								if(isset($showLink[$j]) && $showLink[$j]!="") echo "</a>";
								if(strtolower($showAlign[$j])=="right")	echo "&nbsp;";
								echo "</td>";
							}
							if($this->special1){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType1);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet1[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet1[$j][1]."[]' onclick=\" ".$this->specialSet1[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet1[$j][3]);$k++){
										echo "'".$info[$this->specialSet1[$j][3][$k]]."'".($k==sizeof($this->specialSet1[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet1[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet1[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							echo "</tr>";
						}else break;
					}
					echo "</form>";
					echo "<tr><td colspan='$col' height='1' bgcolor='#000000'></td></tr>";
					if($this->sum==true){
						echo "<tr bgcolor='".($this->allSum==true?"#BBBBBB":"#999999")."'>";
						echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>รวม</td>";						
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";
								if($formatList[$i]!="") 
									echo number_format($sumVal[$i],$formatList[$i],'.',',');
								else echo $sumVal[$i];
								echo "&nbsp;</td>";
							}else{
								if($i-1>=0)
									echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
								else
									echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
							}
						}
						echo "</tr>";
						if($this->allSum==true){
							echo "<tr bgcolor='#999999'>";
							echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>จาก</td>";						
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";//.number_format(,2,'.','');
									if($formatList[$i]!="") 
										echo number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',',');
									else echo $this->allSumVal[$showList[$i]];
									echo "&nbsp;</td>";
								}else{
									if($i-1>=0)
										echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
									else
										echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
								}
							}
							echo "</tr>";
						}
					}
					if($this->pageLinkShow['bottom']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						$this->pageShow();
						echo "</td></tr>";
					}
				}
				//end show report
				echo "</table>";
				break;
		}
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function pageShow(){
		if($this->cPage!=1){
			//---------------
			//	[<<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=1&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<<]</a>";
			//---------------
			//	[<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage-1)."&ord=".$ordr."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<]</a>";
		}else{ echo "<font color='#999999'>[<<][<]</font>";}
		
		$pLink = $this->cPage>5?$this->cPage:6;
		$pLink = $this->nPage-5<$pLink?$this->nPage-5:$pLink;
		for($i=($pLink-5);$i<=($pLink+5);$i++){
			if($i>$this->nPage) break;
			if($i<=0) continue;
			//---------------
			//	1 2 3 ... N
			//---------------
			if($i==$this->cPage) echo "<b>";
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$i."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'> $i </a>";
			if($i==$this->cPage) echo "</b>";
		}
		
		if($this->cPage!=$this->nPage){
			//---------------
			//	[>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage+1)."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>]</a>";
			//---------------
			//	[>>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$this->nPage."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>>]</a>";
		}else{ echo "<font color='#999999'>[>][>>]</font>";}
		
		echo "<font color='#999999'> | ไปยังหน้า <input type='text' name='pg' id='pg'  size='1' ";
		echo "style='text-align:right;font-size:10px;background-color: #CCCCCC;border: 1px solid #000000;' ";
		echo "onKeyUp='pageset(window.event.keyCode,\"pg\",\"pg\")' title='Enter เพื่อไปยังหน้าที่ต้องการ'/></font>";
	}
	//row_flag will be 'CALC' or 'NCALC'
	//CALC refer to calculate number of record
	//NCALC refer to not calculate number of record
	public function exportXls($dir,$fileName,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$fp = fopen($dir."/".$fileName,"w");
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				//show report
				if(mysql_num_rows($this->rs)<=0){
				}else{
					//หัวข้อที่ต้องการแสดง
					for($i=0;$i<sizeof($showList);$i++){
						fprintf($fp,"%s\t",($showDesc[$i]==""?$showList[$i]:$showDesc[$i]));
					}
					fprintf($fp,"\n");
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){ 
							for($j=0;$j<sizeof($showList);$j++){
								if(isset($formatList[$j]) && $formatList[$j]!="") {
									fprintf($fp,number_format($info[$showList[$j]],$formatList[$j],'.',','));	
								}
								else{ 						
									if (ctype_digit($info[$showList[$j]]))$info[$showList[$j]] = '="'.$info[$showList[$j]].'"'; 
									fprintf($fp,$info[$showList[$j]]);
									
								}
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								fprintf($fp,"\t");
							}
							fprintf($fp,"\n");
						}else break;
					}
					if($this->sum==true){
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								if($formatList[$i]!="") 
									fprintf($fp,number_format($sumVal[$i],$formatList[$i],'.',','));
								else fprintf($fp,$sumVal[$i]);
								fprintf($fp,"\t");
							}else{
								if($i-1>=0)
									fprintf($fp,"\t");
								else
									fprintf($fp,"\t");
							}
						}
						fprintf($fp,"\n");
						if($this->allSum==true){
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									if($formatList[$i]!="") 
										fprintf($fp,number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',','));
									else fprintf($fp,$this->allSumVal[$showList[$i]]);
									fprintf($fp,"\t");
								}else{
									if($i-1>=0)
										fprintf($fp,"\t");
									else
										fprintf($fp,"\t");
								}
							}
							fprintf($fp,"\n");
						}
					}
				}
				break;
		}
		fclose($fp);
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function download($dir,$fileName){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$buff = "";
		$fp = fopen($dir."/downloadXls.php","w");
		fprintf($fp,"<? header('Pragma: public');");
		fprintf($fp,"header('Expires: 0');");
		fprintf($fp,"header('Cache-Control: must-revalidate, post-check=0, pre-check=0');");
		fprintf($fp,"header('Content-Type: application/force-download');");
		fprintf($fp,"header('Content-Type: application/octet-stream');");
		fprintf($fp,"header('Content-Type: application/download');");
		fprintf($fp,"header('Content-Disposition: attachment;filename=$fileName');");
		fprintf($fp,"header('Content-Transfer-Encoding: binary');");
		fprintf($fp,"readfile('$fileName'); ?>");
		//fprintf($fp,$buff);
		
		return "./$dir/downloadXls.php";
	}
	public function getParam(){
		$param = $this->alink."?";
		$param .= ($this->alinkarg==""?"":$this->alinkarg."&");
		$param .= "pg=".$this->cPage."&ord=".$this->order;
		$param .= "&srt=".($this->dsort==" ASC "?"DOWN":"UP");
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$param .= ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
		$param .= "&lp=".$this->lPage;
		return $param;
	}
	public function getSQL($row_flag){
		$strcause = "";
		$start = ($this->cPage-1)*$this->lPage;
		$strwhere = " AND ";
		if(strpos(strtolower($this->qry),"where")===false)
			$strwhere = " WHERE ";
		$ord = $this->order==''?'':(" ORDER BY ".$this->order.$this->dsort);
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$strcause = $this->cause[0]==''?'':($strwhere.$this->cause[0]." LIKE '%".$this->cause[1]."%' ");
		if($row_flag=="CALC")
			$sql = "SELECT SQL_CACHE SQL_CALC_FOUND_ROWS ".substr($this->qry,6,strlen($this->qry)).$strcause.$ord;
		else
			$sql = $this->qry.$strcause.$ord;
		if($this->lPage!="ALL")
			return $sql." LIMIT $start , ".$this->lPage." ";
		else
			return $sql;
	}
}
?>
<? 
/******************test showRec*********************

****************************************************/
/*	$link = mysql_connect('localhost', 'root', '1422528');
	$charset = "SET NAMES 'tis620'"; 
    mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	$rec = new repGenerator();
	$rec->setQuery("SELECT * FROM fs_image");
	$rec->setSort($_GET['srt']);
	$rec->setOrder($_GET['ord']);
	if(isset($_GET['pg']))
		$rec->setCurPage($_GET['pg']);
	//$rec->setShowField("ID,MCODE");
	$rec->showRec(1,'SH_QUERY');
	mysql_close($link);
*/
/******************end test showRec*****************

****************************************************/
?>
<?

//require("./cls/sqlAnalizer.php");
class repGenerator_sp{
	private $sqlAnalz;// = new sqlAnalizer();
	private $rs;
	private $order = "";
	private $dsort = " ASC ";
	private $cause = "";
	//page property
	private $lPage = 200;
	private $cPage = 1;
	private $nInfo = 0;
	private $nPage;
	private $alink;
	private $alinkarg;
	private $blink;
	private $blinkarg;
	//page link
	private $pageLinkAlign = "left";
	private $pageLinkShow = array('top'=>true,'bottom'=>true);
	//private $conn;
	private $showField = "";
	private $showFieldFormat = "";
	private $fieldDesc = "";
	private $fieldAlign = "";
	private $fieldSpace = "";
	private $fieldLink = "";
	//query string
	private $qry = "";
	private $rowqry = "";
	private $sqltable;
	private $sqlWhere;
	private $twidth;
	private $theight;
	private $talign = "left";
	private $HLight;
	private $HLightField = "";
	//private $cqry = "";
	//private $xfield;
	//del and edit setting
	private $sum = false;
	private $allSum = false;
	private $sumList;
	private $allSumVal;
	private $del = false;
	private $delSet;
	private $delFormAttr = array("maindel","","post","delfield");
	private $edit = false;
	private $editSet;
	//specialset
	private $special = false;
	private $specialSet;
	private $specialType;
	//search
	private $search = false;
	private $searchKey;
	private $searchKeyDesc;
	private $space;
//constructer
	public function repGenerator(){
		$this->alink = $PHP_SELF;
		//$this->sqlAnalz = new sqlAnalizer();
		//if(isset($_GET['od']))
		//$this->conn = $conn;
	}
//method
//--setting
	public function setLimPage($num){
		$this->lPage = $num;
	}
	public function setRowQry($qryStr){
		$this->rowqry = $qryStr;
	}
	public function setAlign($align){
		$this->talign = $align;
	}
	public function setShowIndex($isshow){
		$this->index = $isshow;
	}
	public function setHLight($field,$value,$color,$hideInfo){
		$this->HLight[$field] = array('VAL'=>$value,'COLOR'=>$color);
		if($hideInfo=="HIDE"){
			$this->HLightField = $field;
		}
		//echo print_r($this->HLight[$field]);
	}
	public function setPageLinkAlign($align){
		$this->pageLinkAlign = $align;
	}
	public function setPageLinkShow($top,$bottom){
		$this->pageLinkShow['top'] = $top;
		$this->pageLinkShow['bottom'] = $bottom;
	}
	public function setLink($link,$arg){
		$this->alink = $link;
		$this->alinkarg = $arg;
	}
	public function setBackLink($link,$arg){
		$this->blink = $link;
		$this->blinkarg = $arg;
	}
	public function setCurPage($num){
		$this->cPage = $num;
	}
	public function setSize($width,$height){
		$this->twidth = $width;
		$this->theight = $height;
	}
	public function setSpecial($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special = true;
		$this->specialType[sizeof($this->specialType)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet[sizeof($this->specialSet)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSpecial1($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special1 = true;
		$this->specialType1[sizeof($this->specialType1)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet1[sizeof($this->specialSet1)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSum($sumflag,$allsumflag,$fieldSumList){
		$this->sum = $sumflag;
		$this->allSum = $allsumflag;
		$this->sumList = $fieldSumList;
	}
	public function setSearch($skey){
		$this->search = true;
		$this->searchKey = $skey;
	}
	public function setSpace($str){
		$this->space[sizeof($this->space)] = $str;
	}
	public function setSearchDesc($skeyDesc){
		$this->searchKeyDesc = $skeyDesc;
	}
	public function setDel($link,$key,$param,$arg){
		$this->del = true;
		$this->delSet = array($link,$key,$param,$arg);
	}
	public function setFromDelAttr($name,$action,$method,$delfield){		
		$this->delFormAttr = array($name,$action,$method,$delfield);
	}
	public function setEdit($link,$key,$param,$arg){
		$this->edit = true;
		$this->editSet = array($link,$key,$param,$arg);
	}
	public function setShowField($fieldNameList){
		$this->showField = $fieldNameList;
	}
	public function setFieldFloatFormat($fieldFormatList){
		$this->showFieldFormat = $fieldFormatList;
	}
	public function setFieldDesc($fieldDescList){
		$this->fieldDesc = $fieldDescList;
	}
	public function setFieldAlign($fieldAlignList){
		$this->fieldAlign = $fieldAlignList;
	}
	public function setFieldSpace($fieldSpaceList){
		$this->fieldSpace = $fieldSpaceList;
	}
	public function setFieldLink($fieldLinkList){
		$this->fieldLink = $fieldLinkList;
	}
	public function setQuery($str){
		$this->qry = $str;
	}
	public function setResult($rs){
		$this->rs = $rs;
	}
	public function setOrder($order){
		$this->order = $order;
	}
	public function setCause($key,$cuase){
		$this->cause = array($key,$cuase);
	}
	public function setLimitPage($num){ //num || ALL
		if(!is_int($num) && $num=="ALL")
			$this->lPage = "ALL";
		else
			$this->lPage = $num<10?$this->lPage:$num;
		
		//echo $num;
		//echo $this->lPage;
	}
	public function setSort($sort){
		switch($sort){
			case 'UP':
				$this->dsort = " DESC ";
				break;
			case 'DOWN':
				$this->dsort = " ASC ";
				break;
		}
	}
	public function checkScript(){
		?><script type="text/javascript" language="javascript">
		function checkall(){
			var parm = document.getElementById('delbutton').checked==true?true:false;
			for (i=0; i<document.<?=$this->delFormAttr[0]?>.elements.length;i++){
				if (document.<?=$this->delFormAttr[0]?>.elements[i].type == "checkbox" ){
					document.<?=$this->delFormAttr[0]?>.elements[i].checked = parm;
				}
			}
		}
		function pageset(key,name,getname){
			if(key==13 || key==10){
				//alert(window.location.toString().indexOf("&"));
				//alert(window.location.toString().charAt(67));
				var url  = "<?=$this->getParam()?>";
				var head = url.substr(0,url.indexOf("&"+getname));
				var foot = url.substr(url.indexOf(getname));
				//alert(foot.indexOf("&"))
				if(foot.indexOf("&")>=0)
					foot = foot.substr(foot.indexOf("&"));
				else
					foot = "";
				if(head=="")
					window.parent.location += "&" + getname + "="+document.getElementById(name).value;
				else
					window.parent.location = head + "&" + getname + "="+document.getElementById(name).value + foot;
			}
				// = "index.php?";
		}
		</script><?
	}
//--calculator
	public function rowCalc(){
		$sql = "";
		/*var $rs;
		var $row;
		var $showFieldList;
		var $sumList;*/
		$rs = mysql_query("SELECT FOUND_ROWS() AS clsrows"); 
		if(mysql_num_rows($rs)>0){
			$row = mysql_result($rs,0,'clsrows');
			mysql_free_result($rs);
		}else{
			$row = 0;//echo "SELECT COUNT(*) AS clsrows FROM (".$this->qry.$cause.") AS tabclsrow ";
		}
			
		if(!is_int($this->lPage) && $this->lPage=="ALL")
			$this->nPage = 1;
		else
			$this->nPage = ceil($row/$this->lPage);
		$this->nInfo = $row;
		//sum
		if($this->allSum==true){
			$this->showField = str_replace(' ','',$this->showField);
			$this->sumList = str_replace(' ','',$this->sumList);
			//print_r($this->sumList);
			$showFieldList = explode(',',$this->showField);
			$sumList = explode(',',$this->sumList);
			for($i=0;$i<sizeof($showFieldList);$i++){
				if($sumList[$i]){//qry.$cause.$ord
					$lmpos = strpos($this->getSQL("NCAL"),"LIMIT")==false?strlen($this->getSQL("NCAL")):strpos($this->getSQL("NCAL"),"LIMIT");
					$sql = substr($this->getSQL("NCAL"),0,$lmpos);
					$sql = "SELECT SUM(".$showFieldList[$i].") AS ".$showFieldList[$i]." FROM (".$sql.") AS tab";
					$rs = mysql_query($sql);
					$this->allSumVal[$showFieldList[$i]] = mysql_result($rs,0,$showFieldList[$i]);
					mysql_free_result($rs);
				}
			}
		}
		//print_r($this->allSumVal);
	}
//--running
	public function showRec($isshow,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$trcolor = array("#EDEDED","#FFFFFF");
		$style_l = "border-left:1 solid #FFFFFF;";
		$style_t = "border-top:1 solid #000000;";
		$style_b = "border-bottom:1 solid #000000;";
		$this->checkScript();
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				echo "<table align='".$this->talign."' ".($this->twidth==""?"":"width='$this->twidth'")." ".($this->theight==""?"":"height='$this->theight'")." border='0' cellpadding='0' cellspacing='0'>";
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->fieldAlign = str_replace(' ','',$this->fieldAlign);
					$showAlign = explode(',',$this->fieldAlign);
					$this->fieldSpace = str_replace(' ','',$this->fieldSpace);
					$showSpace = explode(',',$this->fieldSpace);
					$this->fieldLink = str_replace(' ','',$this->fieldLink);
					$showLink = explode(',',$this->fieldLink);
					$this->searchKey = str_replace(' ','',$this->searchKey);
					$showSearch = explode(',',$this->searchKey);
					$this->searchKeyDesc = str_replace(' ','',$this->searchKeyDesc);
					$showSearchDesc = explode(',',$this->searchKeyDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				$col = sizeof($showList);
				$col += $this->del==true?1:0;
				$col += $this->edit==true?1:0;
				$col += $this->special==true?sizeof($this->specialType):0;
				//echo sizeof($this->specialType);
				$extab = $col==sizeof($showList)?true:false;
				$extab = $this->sum==true?$extab:false;
				$col += $extab==true?1:0;
				$col += $this->special1==true?sizeof($this->specialType1):0;
				//show report
				if(mysql_num_rows($this->rs)<=0){
					echo "<tr><td bgcolor='#990000' align='center'><font color='#FFFFFF'>ไม่พบข้อมูล</font></td></tr>";
					echo "<tr></tr><td align='center'>[<a href='javascript:history.back()'>Back</a>]</td></tr>";
				}else{
					echo "<tr><td colspan='".$col."'><table><tr><td>";
					if($this->search){
						echo "<fieldset><form style='margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;' ";
						echo "name='searh' id='searh' action='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "ord=".$showList[$i]."&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."' method='post'>";
					//หัวข้อที่ต้องการแสดง
						//echo "<br />";
						echo "<input type='text' name='scause'>";
						echo "<select name='skey'>";
						for($i=0;$i<sizeof($showSearch);$i++){
							echo "<option value='".$showSearch[$i]."' ".($this->cause[0]==$showSearch[$i]?"selected":"").">$showSearchDesc[$i]</option>";
						}
						echo "</select>";
						echo "<input type='submit' value='ค้น'>";
					echo "</form></fieldset>";
					}
					echo "</td>";
					for($i=0;$i<sizeof($this->space);$i++)
						echo "<td align='center' width='120'>".$this->space[$i]."</td>";
					echo "</tr></table> </td></tr>";
					if($this->pageLinkShow['top']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						echo "<div><font color='#999999'>";
						echo "แสดง ".($this->cPage==$this->nPage?$this->nInfo-(($this->nPage-1)*$this->lPage):$this->lPage);
						echo " รายการ จาก ".$this->nInfo." รายการ จำนวน ".$this->nPage." หน้า หน้าละ ";
						echo "<input name='lp' type='text' size='1' style='text-align:right;font-size:10px;background-color: ";
						echo "#CCCCCC;border: 1px solid #000000;' onKeyUp='pageset(window.event.keyCode,\"lp\",\"lp\" )' ";
						echo "title='Enter เพื่อปรับแต่งการแสดงผล \n(ALL=แสดงทั้งหมด)' value='".$this->lPage."'> ข้อมูล</font></div>";
						$this->pageShow();
						echo "</td></tr>";
					}
					echo "<form name='".$this->delFormAttr[0]."' id='".$this->delFormAttr[0]."' action='".$this->delFormAttr[1]."' method='".$this->delFormAttr[2]."'>";

					echo "<tr bgcolor='#999999' align='center'>";
					if($extab==true){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>&nbsp;</td>";
					}
					if($this->special){
						for($i=0;$i<sizeof($this->specialType);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet[$i][4]==""?"&nbsp;":$this->specialSet[$i][4])."</td>";
						}
					}
					if($this->del){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "<a href=\"javascript:if(confirm('กรุณายืนยันการลบข้อมูลดังกล่าว')) document.".$this->delFormAttr[0].".submit();\">ลบ</a>";
						echo "<input name='delbutton' id='delbutton' type='checkbox' onclick='checkall()'>";
						echo "</td>";
					}
					if($this->edit){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "แก้ไข";
						echo "</td>";
					}
					for($i=0;$i<sizeof($showList);$i++){
						echo "<td ".($showSpace[$i]==""?"":"width='$showSpace[$i]'")."' style='".$style_l.$style_t.$style_b."'>";
						echo "<a style='color:#FFFFFF' href='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "pg=".$this->cPage."&ord=".$showList[$i];
						echo "&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."'>".($showDesc[$i]==""?$showList[$i]:$showDesc[$i])."</a>";
						echo "</td>";
					}
					if($this->special1){
						for($i=0;$i<sizeof($this->specialType1);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet1[$i][4]==""?"&nbsp;":$this->specialSet1[$i][4])."</td>";
						}
					}
					echo "</tr>";
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							$hlcolor = '';
							if($this->HLightField!='')
							for($j=0;$j<sizeof($showList);$j++){
								$fieldCause = ($this->HLightField==""?$showList[$j]:$this->HLightField);
								//echo "$fieldCause ".$info[$fieldCause]." | ".$this->HLight[$fieldCause]['VAL']."<br />";
								if($info[$fieldCause]==$this->HLight[$fieldCause]['VAL']){
									$hlcolor = $this->HLight[$fieldCause]['COLOR'][$i%sizeof($this->HLight[$fieldCause]['COLOR'])];
									break;
								}
							}
							$hltronmouse = " onmouseover=\"this.style.background='#FFCC99'\" ";
							$hltronmouse .= " onmouseout=\"this.style.background='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."'\" ";
							echo "<tr id='trtab[]' bgcolor='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."' $hltronmouse>";
							if($extab==true)
								echo "<td style='".$style_l."'>&nbsp;</td>";
							if($this->special){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet[$j][1]."[]' onclick=\" ".$this->specialSet[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet[$j][3]);$k++){
										echo "'".$info[$this->specialSet[$j][3][$k]]."'".($k==sizeof($this->specialSet[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							if($this->del){
								echo "<td align='center' style='".$style_l."'>";
								echo "<input type='checkbox' name='".$this->delFormAttr[3]."[$i]' value='".$info[$this->delSet[2]]."'>";
								echo "</td>";
							}
							if($this->edit){
								echo "<td align='center' style='".$style_l."'>";
								echo "<a href='".$this->editSet[0]."?state=2&".($this->editSet[3]==""?"":$this->editSet[3]);
								$getname = explode(",",$this->editSet[1]);
								$getval = explode(",",$this->editSet[2]);
								for($j=0;$j<sizeof($getname);$j++)
									echo "&".$getname[$j]."=".$info[$getval[$j]];
								echo "'><img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
								echo "src='./images/editlink.gif'/></a></td>";
							}
							for($j=0;$j<sizeof($showList);$j++){
								echo "<td align='".($showAlign[$j]==""?"left":$showAlign[$j])."' style='".$style_l."'>";
								if($showAlign[$j]=="" || strtolower($showAlign[$j])=="left")
									echo "&nbsp;";
								if(isset($showLink[$j]) && $showLink[$j]!="") 
									//echo "<a href='".$showLink[$j].$info['id']."'>";
							//	echo "<a href='".$showLink[$j].$info[$showList[$j]]."'>";
								echo "<a href='".$showLink[$j].$info[$showList[$j]]."&fdate=".$info["fdate"]."'>";
								if(isset($formatList[$j]) && $formatList[$j]!="") 
									echo number_format($info[$showList[$j]],$formatList[$j],'.',',');
								else echo $info[$showList[$j]];
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								if(isset($showLink[$j]) && $showLink[$j]!="") echo "</a>";
								if(strtolower($showAlign[$j])=="right")	echo "&nbsp;";
								echo "</td>";
							}
							if($this->special1){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType1);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet1[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet1[$j][1]."[]' onclick=\" ".$this->specialSet1[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet1[$j][3]);$k++){
										echo "'".$info[$this->specialSet1[$j][3][$k]]."'".($k==sizeof($this->specialSet1[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet1[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet1[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							echo "</tr>";
						}else break;
					}
					echo "</form>";
					echo "<tr><td colspan='$col' height='1' bgcolor='#000000'></td></tr>";
					if($this->sum==true){
						echo "<tr bgcolor='".($this->allSum==true?"#BBBBBB":"#999999")."'>";
						echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>รวม</td>";						
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";
								if($formatList[$i]!="") 
									echo number_format($sumVal[$i],$formatList[$i],'.',',');
								else echo $sumVal[$i];
								echo "&nbsp;</td>";
							}else{
								if($i-1>=0)
									echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
								else
									echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
							}
						}
						echo "</tr>";
						if($this->allSum==true){
							echo "<tr bgcolor='#999999'>";
							echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>จาก</td>";						
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";//.number_format(,2,'.','');
									if($formatList[$i]!="") 
										echo number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',',');
									else echo $this->allSumVal[$showList[$i]];
									echo "&nbsp;</td>";
								}else{
									if($i-1>=0)
										echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
									else
										echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
								}
							}
							echo "</tr>";
						}
					}
					if($this->pageLinkShow['bottom']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						$this->pageShow();
						echo "</td></tr>";
					}
				}
				//end show report
				echo "</table>";
				break;
		}
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function pageShow(){
		if($this->cPage!=1){
			//---------------
			//	[<<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=1&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<<]</a>";
			//---------------
			//	[<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage-1)."&ord=".$ordr."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<]</a>";
		}else{ echo "<font color='#999999'>[<<][<]</font>";}
		
		$pLink = $this->cPage>5?$this->cPage:6;
		$pLink = $this->nPage-5<$pLink?$this->nPage-5:$pLink;
		for($i=($pLink-5);$i<=($pLink+5);$i++){
			if($i>$this->nPage) break;
			if($i<=0) continue;
			//---------------
			//	1 2 3 ... N
			//---------------
			if($i==$this->cPage) echo "<b>";
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$i."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'> $i </a>";
			if($i==$this->cPage) echo "</b>";
		}
		
		if($this->cPage!=$this->nPage){
			//---------------
			//	[>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage+1)."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>]</a>";
			//---------------
			//	[>>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$this->nPage."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>>]</a>";
		}else{ echo "<font color='#999999'>[>][>>]</font>";}
		
		echo "<font color='#999999'> | ไปยังหน้า <input type='text' name='pg' id='pg'  size='1' ";
		echo "style='text-align:right;font-size:10px;background-color: #CCCCCC;border: 1px solid #000000;' ";
		echo "onKeyUp='pageset(window.event.keyCode,\"pg\",\"pg\")' title='Enter เพื่อไปยังหน้าที่ต้องการ'/></font>";
	}
	//row_flag will be 'CALC' or 'NCALC'
	//CALC refer to calculate number of record
	//NCALC refer to not calculate number of record
	public function exportXls($dir,$fileName,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$fp = fopen($dir."/".$fileName,"w");
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				//show report
				if(mysql_num_rows($this->rs)<=0){
				}else{
					//หัวข้อที่ต้องการแสดง
					for($i=0;$i<sizeof($showList);$i++){
						fprintf($fp,"%s\t",($showDesc[$i]==""?$showList[$i]:$showDesc[$i]));
					}
					fprintf($fp,"\n");
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							for($j=0;$j<sizeof($showList);$j++){
								if(isset($formatList[$j]) && $formatList[$j]!="") {
									fprintf($fp,number_format($info[$showList[$j]],$formatList[$j],'.',','));	
								}
								else{ 						
									if (ctype_digit($info[$showList[$j]]))$info[$showList[$j]] = '="'.$info[$showList[$j]].'"'; 
									fprintf($fp,$info[$showList[$j]]);
									
								}
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								fprintf($fp,"\t");
							}
							fprintf($fp,"\n");
						}else break;
					}
					if($this->sum==true){
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								if($formatList[$i]!="") 
									fprintf($fp,number_format($sumVal[$i],$formatList[$i],'.',','));
								else fprintf($fp,$sumVal[$i]);
								fprintf($fp,"\t");
							}else{
								if($i-1>=0)
									fprintf($fp,"\t");
								else
									fprintf($fp,"\t");
							}
						}
						fprintf($fp,"\n");
						if($this->allSum==true){
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									if($formatList[$i]!="") 
										fprintf($fp,number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',','));
									else fprintf($fp,$this->allSumVal[$showList[$i]]);
									fprintf($fp,"\t");
								}else{
									if($i-1>=0)
										fprintf($fp,"\t");
									else
										fprintf($fp,"\t");
								}
							}
							fprintf($fp,"\n");
						}
					}
				}
				break;
		}
		fclose($fp);
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function download($dir,$fileName){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$buff = "";
		$fp = fopen($dir."/downloadXls.php","w");
		fprintf($fp,"<? header('Pragma: public');");
		fprintf($fp,"header('Expires: 0');");
		fprintf($fp,"header('Cache-Control: must-revalidate, post-check=0, pre-check=0');");
		fprintf($fp,"header('Content-Type: application/force-download');");
		fprintf($fp,"header('Content-Type: application/octet-stream');");
		fprintf($fp,"header('Content-Type: application/download');");
		fprintf($fp,"header('Content-Disposition: attachment;filename=$fileName');");
		fprintf($fp,"header('Content-Transfer-Encoding: binary');");
		fprintf($fp,"readfile('$fileName'); ?>");
		//fprintf($fp,$buff);
		
		return "./$dir/downloadXls.php";
	}
	public function getParam(){
		$param = $this->alink."?";
		$param .= ($this->alinkarg==""?"":$this->alinkarg."&");
		$param .= "pg=".$this->cPage."&ord=".$this->order;
		$param .= "&srt=".($this->dsort==" ASC "?"DOWN":"UP");
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$param .= ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
		$param .= "&lp=".$this->lPage;
		return $param;
	}
	public function getSQL($row_flag){
		$strcause = "";
		$start = ($this->cPage-1)*$this->lPage;
		$strwhere = " AND ";
		if(strpos(strtolower($this->qry),"where")===false)
			$strwhere = " WHERE ";
		$ord = $this->order==''?'':(" ORDER BY ".$this->order.$this->dsort);
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$strcause = $this->cause[0]==''?'':($strwhere.$this->cause[0]." LIKE '%".$this->cause[1]."%' ");
		if($row_flag=="CALC")
			$sql = "SELECT SQL_CACHE SQL_CALC_FOUND_ROWS ".substr($this->qry,6,strlen($this->qry)).$strcause.$ord;
		else
			$sql = $this->qry.$strcause.$ord;
		if($this->lPage!="ALL")
			return $sql." LIMIT $start , ".$this->lPage." ";
		else
			return $sql;
	}
}
?>
<? 
/******************test showRec*********************

****************************************************/
/*	$link = mysql_connect('localhost', 'root', '1422528');
	$charset = "SET NAMES 'tis620'"; 
    mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	$rec = new repGenerator();
	$rec->setQuery("SELECT * FROM fs_image");
	$rec->setSort($_GET['srt']);
	$rec->setOrder($_GET['ord']);
	if(isset($_GET['pg']))
		$rec->setCurPage($_GET['pg']);
	//$rec->setShowField("ID,MCODE");
	$rec->showRec(1,'SH_QUERY');
	mysql_close($link);
*/
/******************end test showRec*****************

****************************************************/


?>
<?
//require("./cls/sqlAnalizer.php");
class repGenerator_held{
	private $sqlAnalz;// = new sqlAnalizer();
	private $rs;
	private $order = "";
	private $dsort = " ASC ";
	private $cause = "";
	//page property
	private $lPage = 200;
	private $cPage = 1;
	private $nInfo = 0;
	private $nPage;
	private $alink;
	private $alinkarg;
	private $blink;
	private $blinkarg;
	//page link
	private $pageLinkAlign = "left";
	private $pageLinkShow = array('top'=>true,'bottom'=>true);
	//private $conn;
	private $showField = "";
	private $showFieldFormat = "";
	private $fieldDesc = "";
	private $fieldAlign = "";
	private $fieldSpace = "";
	private $fieldLink = "";
	//query string
	private $qry = "";
	private $rowqry = "";
	private $sqltable;
	private $sqlWhere;
	private $twidth;
	private $theight;
	private $talign = "left";
	private $HLight;
	private $HLightField = "";
	//private $cqry = "";
	//private $xfield;
	//del and edit setting
	private $sum = false;
	private $allSum = false;
	private $sumList;
	private $allSumVal;
	private $del = false;
	private $delSet;
	private $delFormAttr = array("maindel","","post","delfield");
	private $edit = false;
	private $editSet;
	//specialset
	private $special = false;
	private $specialSet;
	private $specialType;
	//search
	private $search = false;
	private $searchKey;
	private $searchKeyDesc;
	private $space;
//constructer
	public function repGenerator(){
		$this->alink = $PHP_SELF;
		//$this->sqlAnalz = new sqlAnalizer();
		//if(isset($_GET['od']))
		//$this->conn = $conn;
	}
//method
//--setting
	public function setLimPage($num){
		$this->lPage = $num;
	}
	public function setRowQry($qryStr){
		$this->rowqry = $qryStr;
	}
	public function setAlign($align){
		$this->talign = $align;
	}
	public function setShowIndex($isshow){
		$this->index = $isshow;
	}
	public function setHLight($field,$value,$color,$hideInfo){
		$this->HLight[$field] = array('VAL'=>$value,'COLOR'=>$color);
		if($hideInfo=="HIDE"){
			$this->HLightField = $field;
		}
		//echo print_r($this->HLight[$field]);
	}
	public function setPageLinkAlign($align){
		$this->pageLinkAlign = $align;
	}
	public function setPageLinkShow($top,$bottom){
		$this->pageLinkShow['top'] = $top;
		$this->pageLinkShow['bottom'] = $bottom;
	}
	public function setLink($link,$arg){
		$this->alink = $link;
		$this->alinkarg = $arg;
	}
	public function setBackLink($link,$arg){
		$this->blink = $link;
		$this->blinkarg = $arg;
	}
	public function setCurPage($num){
		$this->cPage = $num;
	}
	public function setSize($width,$height){
		$this->twidth = $width;
		$this->theight = $height;
	}
	public function setSpecial($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special = true;
		$this->specialType[sizeof($this->specialType)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet[sizeof($this->specialSet)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSpecial1($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special1 = true;
		$this->specialType1[sizeof($this->specialType1)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet1[sizeof($this->specialSet1)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSum($sumflag,$allsumflag,$fieldSumList){
		$this->sum = $sumflag;
		$this->allSum = $allsumflag;
		$this->sumList = $fieldSumList;
	}
	public function setSearch($skey){
		$this->search = true;
		$this->searchKey = $skey;
	}
	public function setSpace($str){
		$this->space[sizeof($this->space)] = $str;
	}
	public function setSearchDesc($skeyDesc){
		$this->searchKeyDesc = $skeyDesc;
	}
	public function setDel($link,$key,$param,$arg){
		$this->del = true;
		$this->delSet = array($link,$key,$param,$arg);
	}
	public function setFromDelAttr($name,$action,$method,$delfield){		
		$this->delFormAttr = array($name,$action,$method,$delfield);
	}
	public function setEdit($link,$key,$param,$arg){
		$this->edit = true;
		$this->editSet = array($link,$key,$param,$arg);
	}
	public function setShowField($fieldNameList){
		$this->showField = $fieldNameList;
	}
	public function setFieldFloatFormat($fieldFormatList){
		$this->showFieldFormat = $fieldFormatList;
	}
	public function setFieldDesc($fieldDescList){
		$this->fieldDesc = $fieldDescList;
	}
	public function setFieldAlign($fieldAlignList){
		$this->fieldAlign = $fieldAlignList;
	}
	public function setFieldSpace($fieldSpaceList){
		$this->fieldSpace = $fieldSpaceList;
	}
	public function setFieldLink($fieldLinkList){
		$this->fieldLink = $fieldLinkList;
	}
	public function setQuery($str){
		$this->qry = $str;
	}
	public function setResult($rs){
		$this->rs = $rs;
	}
	public function setOrder($order){
		$this->order = $order;
	}
	public function setCause($key,$cuase){
		$this->cause = array($key,$cuase);
	}
	public function setLimitPage($num){ //num || ALL
		if(!is_int($num) && $num=="ALL")
			$this->lPage = "ALL";
		else
			$this->lPage = $num<10?$this->lPage:$num;
		
		//echo $num;
		//echo $this->lPage;
	}
	public function setSort($sort){
		switch($sort){
			case 'UP':
				$this->dsort = " DESC ";
				break;
			case 'DOWN':
				$this->dsort = " ASC ";
				break;
		}
	}
	public function checkScript(){
		?><script type="text/javascript" language="javascript">
		function checkall(){
			var parm = document.getElementById('delbutton').checked==true?true:false;
			for (i=0; i<document.<?=$this->delFormAttr[0]?>.elements.length;i++){
				if (document.<?=$this->delFormAttr[0]?>.elements[i].type == "checkbox" ){
					document.<?=$this->delFormAttr[0]?>.elements[i].checked = parm;
				}
			}
		}
		function pageset(key,name,getname){
			if(key==13 || key==10){
				//alert(window.location.toString().indexOf("&"));
				//alert(window.location.toString().charAt(67));
				var url  = "<?=$this->getParam()?>";
				var head = url.substr(0,url.indexOf("&"+getname));
				var foot = url.substr(url.indexOf(getname));
				//alert(foot.indexOf("&"))
				if(foot.indexOf("&")>=0)
					foot = foot.substr(foot.indexOf("&"));
				else
					foot = "";
				if(head=="")
					window.parent.location += "&" + getname + "="+document.getElementById(name).value;
				else
					window.parent.location = head + "&" + getname + "="+document.getElementById(name).value + foot;
			}
				// = "index.php?";
		}
		</script><?
	}
//--calculator
	public function rowCalc(){
		$sql = "";
		/*var $rs;
		var $row;
		var $showFieldList;
		var $sumList;*/
		$rs = mysql_query("SELECT FOUND_ROWS() AS clsrows"); 
		if(mysql_num_rows($rs)>0){
			$row = mysql_result($rs,0,'clsrows');
			mysql_free_result($rs);
		}else{
			$row = 0;//echo "SELECT COUNT(*) AS clsrows FROM (".$this->qry.$cause.") AS tabclsrow ";
		}
			
		if(!is_int($this->lPage) && $this->lPage=="ALL")
			$this->nPage = 1;
		else
			$this->nPage = ceil($row/$this->lPage);
		$this->nInfo = $row;
		//sum
		if($this->allSum==true){
			$this->showField = str_replace(' ','',$this->showField);
			$this->sumList = str_replace(' ','',$this->sumList);
			//print_r($this->sumList);
			$showFieldList = explode(',',$this->showField);
			$sumList = explode(',',$this->sumList);
			for($i=0;$i<sizeof($showFieldList);$i++){
				if($sumList[$i]){//qry.$cause.$ord
					$lmpos = strpos($this->getSQL("NCAL"),"LIMIT")==false?strlen($this->getSQL("NCAL")):strpos($this->getSQL("NCAL"),"LIMIT");
					$sql = substr($this->getSQL("NCAL"),0,$lmpos);
					$sql = "SELECT SUM(".$showFieldList[$i].") AS ".$showFieldList[$i]." FROM (".$sql.") AS tab";
					$rs = mysql_query($sql);
					$this->allSumVal[$showFieldList[$i]] = mysql_result($rs,0,$showFieldList[$i]);
					mysql_free_result($rs);
				}
			}
		}
		//print_r($this->allSumVal);
	}
//--running
	public function showRec($isshow,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$trcolor = array("#EDEDED","#FFFFFF");
		$style_l = "border-left:1 solid #FFFFFF;";
		$style_t = "border-top:1 solid #000000;";
		$style_b = "border-bottom:1 solid #000000;";
		$this->checkScript();
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				echo "<table align='".$this->talign."' ".($this->twidth==""?"":"width='$this->twidth'")." ".($this->theight==""?"":"height='$this->theight'")." border='0' cellpadding='0' cellspacing='0'>";
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->fieldAlign = str_replace(' ','',$this->fieldAlign);
					$showAlign = explode(',',$this->fieldAlign);
					$this->fieldSpace = str_replace(' ','',$this->fieldSpace);
					$showSpace = explode(',',$this->fieldSpace);
					$this->fieldLink = str_replace(' ','',$this->fieldLink);
					$showLink = explode(',',$this->fieldLink);
					$this->searchKey = str_replace(' ','',$this->searchKey);
					$showSearch = explode(',',$this->searchKey);
					$this->searchKeyDesc = str_replace(' ','',$this->searchKeyDesc);
					$showSearchDesc = explode(',',$this->searchKeyDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				$col = sizeof($showList);
				$col += $this->del==true?1:0;
				$col += $this->edit==true?1:0;
				$col += $this->special==true?sizeof($this->specialType):0;
				//echo sizeof($this->specialType);
				$extab = $col==sizeof($showList)?true:false;
				$extab = $this->sum==true?$extab:false;
				$col += $extab==true?1:0;
				$col += $this->special1==true?sizeof($this->specialType1):0;
				//show report
				if(mysql_num_rows($this->rs)<=0){
					echo "<tr><td bgcolor='#990000' align='center'><font color='#FFFFFF'>ไม่พบข้อมูล</font></td></tr>";
					echo "<tr></tr><td align='center'>[<a href='javascript:history.back()'>Back</a>]</td></tr>";
				}else{
					echo "<tr><td colspan='".$col."'><table><tr><td>";
					if($this->search){
						echo "<fieldset><form style='margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;' ";
						echo "name='searh' id='searh' action='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "ord=".$showList[$i]."&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."' method='post'>";
					//หัวข้อที่ต้องการแสดง
						//echo "<br />";
						echo "<input type='text' name='scause'>";
						echo "<select name='skey'>";
						for($i=0;$i<sizeof($showSearch);$i++){
							echo "<option value='".$showSearch[$i]."' ".($this->cause[0]==$showSearch[$i]?"selected":"").">$showSearchDesc[$i]</option>";
						}
						echo "</select>";
						echo "<input type='submit' value='ค้น'>";
					echo "</form></fieldset>";
					}
					echo "</td>";
					for($i=0;$i<sizeof($this->space);$i++)
						echo "<td align='center' width='120'>".$this->space[$i]."</td>";
					echo "</tr></table> </td></tr>";
					if($this->pageLinkShow['top']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						echo "<div><font color='#999999'>";
						echo "แสดง ".($this->cPage==$this->nPage?$this->nInfo-(($this->nPage-1)*$this->lPage):$this->lPage);
						echo " รายการ จาก ".$this->nInfo." รายการ จำนวน ".$this->nPage." หน้า หน้าละ ";
						echo "<input name='lp' type='text' size='1' style='text-align:right;font-size:10px;background-color: ";
						echo "#CCCCCC;border: 1px solid #000000;' onKeyUp='pageset(window.event.keyCode,\"lp\",\"lp\" )' ";
						echo "title='Enter เพื่อปรับแต่งการแสดงผล \n(ALL=แสดงทั้งหมด)' value='".$this->lPage."'> ข้อมูล</font></div>";
						$this->pageShow();
						echo "</td></tr>";
					}
					echo "<form name='".$this->delFormAttr[0]."' id='".$this->delFormAttr[0]."' action='".$this->delFormAttr[1]."' method='".$this->delFormAttr[2]."'>";

					echo "<tr bgcolor='#999999' align='center'>";
					if($extab==true){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>&nbsp;</td>";
					}
					if($this->special){
						for($i=0;$i<sizeof($this->specialType);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet[$i][4]==""?"&nbsp;":$this->specialSet[$i][4])."</td>";
						}
					}
					if($this->del){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "<a href=\"javascript:if(confirm('กรุณายืนยันการรวมข้อมูลดังกล่าว')) document.".$this->delFormAttr[0].".submit();\">รวม</a>";
						echo "<input name='delbutton' id='delbutton' type='checkbox' onclick='checkall()'>";
						echo "</td>";
					}
					if($this->edit){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "แก้ไข";
						echo "</td>";
					}
					for($i=0;$i<sizeof($showList);$i++){
						echo "<td ".($showSpace[$i]==""?"":"width='$showSpace[$i]'")."' style='".$style_l.$style_t.$style_b."'>";
						echo "<a style='color:#FFFFFF' href='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "pg=".$this->cPage."&ord=".$showList[$i];
						echo "&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."'>".($showDesc[$i]==""?$showList[$i]:$showDesc[$i])."</a>";
						echo "</td>";
					}
					if($this->special1){
						for($i=0;$i<sizeof($this->specialType1);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet1[$i][4]==""?"&nbsp;":$this->specialSet1[$i][4])."</td>";
						}
					}
					echo "</tr>";
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							$hlcolor = '';
							if($this->HLightField!='')
							for($j=0;$j<sizeof($showList);$j++){
								$fieldCause = ($this->HLightField==""?$showList[$j]:$this->HLightField);
								//echo "$fieldCause ".$info[$fieldCause]." | ".$this->HLight[$fieldCause]['VAL']."<br />";
								if($info[$fieldCause]==$this->HLight[$fieldCause]['VAL']){
									$hlcolor = $this->HLight[$fieldCause]['COLOR'][$i%sizeof($this->HLight[$fieldCause]['COLOR'])];
									break;
								}
							}
							$hltronmouse = " onmouseover=\"this.style.background='#FFCC99'\" ";
							$hltronmouse .= " onmouseout=\"this.style.background='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."'\" ";
							echo "<tr id='trtab[]' bgcolor='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."' $hltronmouse>";
							if($extab==true)
								echo "<td style='".$style_l."'>&nbsp;</td>";
							if($this->special){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet[$j][1]."[]' onclick=\" ".$this->specialSet[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet[$j][3]);$k++){
										echo "'".$info[$this->specialSet[$j][3][$k]]."'".($k==sizeof($this->specialSet[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							if($this->del){
								echo "<td align='center' style='".$style_l."'>";
								echo "<input type='checkbox' name='".$this->delFormAttr[3]."[$i]' value='".$info[$this->delSet[2]]."'>";
								echo "</td>";
							}
							if($this->edit){
								echo "<td align='center' style='".$style_l."'>";
								echo "<a href='".$this->editSet[0]."?state=2&".($this->editSet[3]==""?"":$this->editSet[3]);
								$getname = explode(",",$this->editSet[1]);
								$getval = explode(",",$this->editSet[2]);
								for($j=0;$j<sizeof($getname);$j++)
									echo "&".$getname[$j]."=".$info[$getval[$j]];
								echo "'><img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
								echo "src='./images/editlink.gif'/></a></td>";
							}
							for($j=0;$j<sizeof($showList);$j++){
								echo "<td align='".($showAlign[$j]==""?"left":$showAlign[$j])."' style='".$style_l."'>";
								if($showAlign[$j]=="" || strtolower($showAlign[$j])=="left")
									echo "&nbsp;";
								if(isset($showLink[$j]) && $showLink[$j]!="") 
									//echo "<a href='".$showLink[$j].$info['id']."'>";
								echo "<a href='".$showLink[$j].$info[$showList[$j]]."'>";
								if(isset($formatList[$j]) && $formatList[$j]!="") 
									echo number_format($info[$showList[$j]],$formatList[$j],'.',',');
								else echo $info[$showList[$j]];
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								if(isset($showLink[$j]) && $showLink[$j]!="") echo "</a>";
								if(strtolower($showAlign[$j])=="right")	echo "&nbsp;";
								echo "</td>";
							}
							if($this->special1){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType1);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet1[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet1[$j][1]."[]' onclick=\" ".$this->specialSet1[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet1[$j][3]);$k++){
										echo "'".$info[$this->specialSet1[$j][3][$k]]."'".($k==sizeof($this->specialSet1[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet1[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet1[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							echo "</tr>";
						}else break;
					}
					echo "</form>";
					echo "<tr><td colspan='$col' height='1' bgcolor='#000000'></td></tr>";
					if($this->sum==true){
						echo "<tr bgcolor='".($this->allSum==true?"#BBBBBB":"#999999")."'>";
						echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>รวม</td>";						
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";
								if($formatList[$i]!="") 
									echo number_format($sumVal[$i],$formatList[$i],'.',',');
								else echo $sumVal[$i];
								echo "&nbsp;</td>";
							}else{
								if($i-1>=0)
									echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
								else
									echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
							}
						}
						echo "</tr>";
						if($this->allSum==true){
							echo "<tr bgcolor='#999999'>";
							echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>จาก</td>";						
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";//.number_format(,2,'.','');
									if($formatList[$i]!="") 
										echo number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',',');
									else echo $this->allSumVal[$showList[$i]];
									echo "&nbsp;</td>";
								}else{
									if($i-1>=0)
										echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
									else
										echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
								}
							}
							echo "</tr>";
						}
					}
					if($this->pageLinkShow['bottom']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						$this->pageShow();
						echo "</td></tr>";
					}
				}
				//end show report
				echo "</table>";
				break;
		}
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function pageShow(){
		if($this->cPage!=1){
			//---------------
			//	[<<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=1&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<<]</a>";
			//---------------
			//	[<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage-1)."&ord=".$ordr."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<]</a>";
		}else{ echo "<font color='#999999'>[<<][<]</font>";}
		
		$pLink = $this->cPage>5?$this->cPage:6;
		$pLink = $this->nPage-5<$pLink?$this->nPage-5:$pLink;
		for($i=($pLink-5);$i<=($pLink+5);$i++){
			if($i>$this->nPage) break;
			if($i<=0) continue;
			//---------------
			//	1 2 3 ... N
			//---------------
			if($i==$this->cPage) echo "<b>";
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$i."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'> $i </a>";
			if($i==$this->cPage) echo "</b>";
		}
		
		if($this->cPage!=$this->nPage){
			//---------------
			//	[>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage+1)."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>]</a>";
			//---------------
			//	[>>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$this->nPage."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>>]</a>";
		}else{ echo "<font color='#999999'>[>][>>]</font>";}
		
		echo "<font color='#999999'> | ไปยังหน้า <input type='text' name='pg' id='pg'  size='1' ";
		echo "style='text-align:right;font-size:10px;background-color: #CCCCCC;border: 1px solid #000000;' ";
		echo "onKeyUp='pageset(window.event.keyCode,\"pg\",\"pg\")' title='Enter เพื่อไปยังหน้าที่ต้องการ'/></font>";
	}
	//row_flag will be 'CALC' or 'NCALC'
	//CALC refer to calculate number of record
	//NCALC refer to not calculate number of record
	public function exportXls($dir,$fileName,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$fp = fopen($dir."/".$fileName,"w");
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				//show report
				if(mysql_num_rows($this->rs)<=0){
				}else{
					//หัวข้อที่ต้องการแสดง
					for($i=0;$i<sizeof($showList);$i++){
						fprintf($fp,"%s\t",($showDesc[$i]==""?$showList[$i]:$showDesc[$i]));
					}
					fprintf($fp,"\n");
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							for($j=0;$j<sizeof($showList);$j++){
								if(isset($formatList[$j]) && $formatList[$j]!="") {
									fprintf($fp,number_format($info[$showList[$j]],$formatList[$j],'.',','));	
								}
								else{ 						
									if (ctype_digit($info[$showList[$j]]))$info[$showList[$j]] = '="'.$info[$showList[$j]].'"'; 
									fprintf($fp,$info[$showList[$j]]);
									
								}
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								fprintf($fp,"\t");
							}
							fprintf($fp,"\n");
						}else break;
					}
					if($this->sum==true){
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								if($formatList[$i]!="") 
									fprintf($fp,number_format($sumVal[$i],$formatList[$i],'.',','));
								else fprintf($fp,$sumVal[$i]);
								fprintf($fp,"\t");
							}else{
								if($i-1>=0)
									fprintf($fp,"\t");
								else
									fprintf($fp,"\t");
							}
						}
						fprintf($fp,"\n");
						if($this->allSum==true){
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									if($formatList[$i]!="") 
										fprintf($fp,number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',','));
									else fprintf($fp,$this->allSumVal[$showList[$i]]);
									fprintf($fp,"\t");
								}else{
									if($i-1>=0)
										fprintf($fp,"\t");
									else
										fprintf($fp,"\t");
								}
							}
							fprintf($fp,"\n");
						}
					}
				}
				break;
		}
		fclose($fp);
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function download($dir,$fileName){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$buff = "";
		$fp = fopen($dir."/downloadXls.php","w");
		fprintf($fp,"<? header('Pragma: public');");
		fprintf($fp,"header('Expires: 0');");
		fprintf($fp,"header('Cache-Control: must-revalidate, post-check=0, pre-check=0');");
		fprintf($fp,"header('Content-Type: application/force-download');");
		fprintf($fp,"header('Content-Type: application/octet-stream');");
		fprintf($fp,"header('Content-Type: application/download');");
		fprintf($fp,"header('Content-Disposition: attachment;filename=$fileName');");
		fprintf($fp,"header('Content-Transfer-Encoding: binary');");
		fprintf($fp,"readfile('$fileName'); ?>");
		//fprintf($fp,$buff);
		
		return "./$dir/downloadXls.php";
	}
	public function getParam(){
		$param = $this->alink."?";
		$param .= ($this->alinkarg==""?"":$this->alinkarg."&");
		$param .= "pg=".$this->cPage."&ord=".$this->order;
		$param .= "&srt=".($this->dsort==" ASC "?"DOWN":"UP");
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$param .= ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
		$param .= "&lp=".$this->lPage;
		return $param;
	}
	public function getSQL($row_flag){
		$strcause = "";
		$start = ($this->cPage-1)*$this->lPage;
		$strwhere = " AND ";
		if(strpos(strtolower($this->qry),"where")===false)
			$strwhere = " WHERE ";
		$ord = $this->order==''?'':(" ORDER BY ".$this->order.$this->dsort);
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$strcause = $this->cause[0]==''?'':($strwhere.$this->cause[0]." LIKE '%".$this->cause[1]."%' ");
		if($row_flag=="CALC")
			$sql = "SELECT SQL_CACHE SQL_CALC_FOUND_ROWS ".substr($this->qry,6,strlen($this->qry)).$strcause.$ord;
		else
			$sql = $this->qry.$strcause.$ord;
		if($this->lPage!="ALL")
			return $sql." LIMIT $start , ".$this->lPage." ";
		else
			return $sql;
	}
}
?>
<? 
/******************test showRec*********************

****************************************************/
/*	$link = mysql_connect('localhost', 'root', '1422528');
	$charset = "SET NAMES 'tis620'"; 
    mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	$rec = new repGenerator();
	$rec->setQuery("SELECT * FROM fs_image");
	$rec->setSort($_GET['srt']);
	$rec->setOrder($_GET['ord']);
	if(isset($_GET['pg']))
		$rec->setCurPage($_GET['pg']);
	//$rec->setShowField("ID,MCODE");
	$rec->showRec(1,'SH_QUERY');
	mysql_close($link);
*/
/******************end test showRec*****************

****************************************************/

?>


<?
//require("./cls/sqlAnalizer.php");
class repGenerator_bb{
	private $sqlAnalz;// = new sqlAnalizer();
	private $rs;
	private $order = "";
	private $dsort = " ASC ";
	private $cause = "";
	//page property
	private $lPage = 200;
	private $cPage = 1;
	private $nInfo = 0;
	private $nPage;
	private $alink;
	private $alinkarg;
	private $blink;
	private $blinkarg;
	//page link
	private $pageLinkAlign = "left";
	private $pageLinkShow = array('top'=>true,'bottom'=>true);
	//private $conn;
	private $showField = "";
	private $showFieldFormat = "";
	private $fieldDesc = "";
	private $fieldAlign = "";
	private $fieldSpace = "";
	private $fieldLink = "";
	//query string
	private $qry = "";
	private $rowqry = "";
	private $sqltable;
	private $sqlWhere;
	private $twidth;
	private $theight;
	private $talign = "left";
	private $HLight;
	private $HLightField = "";
	//private $cqry = "";
	//private $xfield;
	//del and edit setting
	private $sum = false;
	private $allSum = false;
	private $sumList;
	private $allSumVal;
	private $del = false;
	private $delSet;
	private $delFormAttr = array("maindel","","post","delfield");
	private $edit = false;
	private $editSet;
	//specialset
	private $special = false;
	private $specialSet;
	private $specialType;
	//search
	private $search = false;
	private $searchKey;
	private $searchKeyDesc;
	private $space;
//constructer
	public function repGenerator(){
		$this->alink = $PHP_SELF;
		//$this->sqlAnalz = new sqlAnalizer();
		//if(isset($_GET['od']))
		//$this->conn = $conn;
	}
//method
//--setting
	public function setLimPage($num){
		$this->lPage = $num;
	}
	public function setRowQry($qryStr){
		$this->rowqry = $qryStr;
	}
	public function setAlign($align){
		$this->talign = $align;
	}
	public function setShowIndex($isshow){
		$this->index = $isshow;
	}
	public function setHLight($field,$value,$color,$hideInfo){
		$this->HLight[$field] = array('VAL'=>$value,'COLOR'=>$color);
		if($hideInfo=="HIDE"){
			$this->HLightField = $field;
		}
		//echo print_r($this->HLight[$field]);
	}
	public function setPageLinkAlign($align){
		$this->pageLinkAlign = $align;
	}
	public function setPageLinkShow($top,$bottom){
		$this->pageLinkShow['top'] = $top;
		$this->pageLinkShow['bottom'] = $bottom;
	}
	public function setLink($link,$arg){
		$this->alink = $link;
		$this->alinkarg = $arg;
	}
	public function setBackLink($link,$arg){
		$this->blink = $link;
		$this->blinkarg = $arg;
	}
	public function setCurPage($num){
		$this->cPage = $num;
	}
	public function setSize($width,$height){
		$this->twidth = $width;
		$this->theight = $height;
	}
	public function setSpecial($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special = true;
		$this->specialType[sizeof($this->specialType)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet[sizeof($this->specialSet)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSpecial1($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special1 = true;
		$this->specialType1[sizeof($this->specialType1)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet1[sizeof($this->specialSet1)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSum($sumflag,$allsumflag,$fieldSumList){
		$this->sum = $sumflag;
		$this->allSum = $allsumflag;
		$this->sumList = $fieldSumList;
	}
	public function setSearch($skey){
		$this->search = true;
		$this->searchKey = $skey;
	}
	public function setSpace($str){
		$this->space[sizeof($this->space)] = $str;
	}
	public function setSearchDesc($skeyDesc){
		$this->searchKeyDesc = $skeyDesc;
	}
	public function setDel($link,$key,$param,$arg){
		$this->del = true;
		$this->delSet = array($link,$key,$param,$arg);
	}
	public function setFromDelAttr($name,$action,$method,$delfield){		
		$this->delFormAttr = array($name,$action,$method,$delfield);
	}
	public function setEdit($link,$key,$param,$arg){
		$this->edit = true;
		$this->editSet = array($link,$key,$param,$arg);
	}
	public function setShowField($fieldNameList){
		$this->showField = $fieldNameList;
	}
	public function setFieldFloatFormat($fieldFormatList){
		$this->showFieldFormat = $fieldFormatList;
	}
	public function setFieldDesc($fieldDescList){
		$this->fieldDesc = $fieldDescList;
	}
	public function setFieldAlign($fieldAlignList){
		$this->fieldAlign = $fieldAlignList;
	}
	public function setFieldSpace($fieldSpaceList){
		$this->fieldSpace = $fieldSpaceList;
	}
	public function setFieldLink($fieldLinkList){
		$this->fieldLink = $fieldLinkList;
	}
	public function setQuery($str){
		$this->qry = $str;
	}
	public function setResult($rs){
		$this->rs = $rs;
	}
	public function setOrder($order){
		$this->order = $order;
	}
	public function setCause($key,$cuase){
		$this->cause = array($key,$cuase);
	}
	public function setLimitPage($num){ //num || ALL
		if(!is_int($num) && $num=="ALL")
			$this->lPage = "ALL";
		else
			$this->lPage = $num<10?$this->lPage:$num;
		
		//echo $num;
		//echo $this->lPage;
	}
	public function setSort($sort){
		switch($sort){
			case 'UP':
				$this->dsort = " DESC ";
				break;
			case 'DOWN':
				$this->dsort = " ASC ";
				break;
		}
	}
	public function checkScript(){
		?><script type="text/javascript" language="javascript">
		function checkall(){
			var parm = document.getElementById('delbutton').checked==true?true:false;
			for (i=0; i<document.<?=$this->delFormAttr[0]?>.elements.length;i++){
				if (document.<?=$this->delFormAttr[0]?>.elements[i].type == "checkbox" ){
					document.<?=$this->delFormAttr[0]?>.elements[i].checked = parm;
				}
			}
		}
		function pageset(key,name,getname){
			if(key==13 || key==10){
				//alert(window.location.toString().indexOf("&"));
				//alert(window.location.toString().charAt(67));
				var url  = "<?=$this->getParam()?>";
				var head = url.substr(0,url.indexOf("&"+getname));
				var foot = url.substr(url.indexOf(getname));
				//alert(foot.indexOf("&"))
				if(foot.indexOf("&")>=0)
					foot = foot.substr(foot.indexOf("&"));
				else
					foot = "";
				if(head=="")
					window.parent.location += "&" + getname + "="+document.getElementById(name).value;
				else
					window.parent.location = head + "&" + getname + "="+document.getElementById(name).value + foot;
			}
				// = "index.php?";
		}
		</script><?
	}
//--calculator
	public function rowCalc(){
		$sql = "";
		/*var $rs;
		var $row;
		var $showFieldList;
		var $sumList;*/
		$rs = mysql_query("SELECT FOUND_ROWS() AS clsrows"); 
		if(mysql_num_rows($rs)>0){
			$row = mysql_result($rs,0,'clsrows');
			mysql_free_result($rs);
		}else{
			$row = 0;//echo "SELECT COUNT(*) AS clsrows FROM (".$this->qry.$cause.") AS tabclsrow ";
		}
			
		if(!is_int($this->lPage) && $this->lPage=="ALL")
			$this->nPage = 1;
		else
			$this->nPage = ceil($row/$this->lPage);
		$this->nInfo = $row;
		//sum
		if($this->allSum==true){
			$this->showField = str_replace(' ','',$this->showField);
			$this->sumList = str_replace(' ','',$this->sumList);
			//print_r($this->sumList);
			$showFieldList = explode(',',$this->showField);
			$sumList = explode(',',$this->sumList);
			for($i=0;$i<sizeof($showFieldList);$i++){
				if($sumList[$i]){//qry.$cause.$ord
					$lmpos = strpos($this->getSQL("NCAL"),"LIMIT")==false?strlen($this->getSQL("NCAL")):strpos($this->getSQL("NCAL"),"LIMIT");
					$sql = substr($this->getSQL("NCAL"),0,$lmpos);
					$sql = "SELECT SUM(".$showFieldList[$i].") AS ".$showFieldList[$i]." FROM (".$sql.") AS tab";
					$rs = mysql_query($sql);
					$this->allSumVal[$showFieldList[$i]] = mysql_result($rs,0,$showFieldList[$i]);
					mysql_free_result($rs);
				}
			}
		}
		//print_r($this->allSumVal);
	}
//--running
	public function showRec($isshow,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$trcolor = array("#EDEDED","#FFFFFF");
		$style_l = "border-left:1 solid #FFFFFF;";
		$style_t = "border-top:1 solid #000000;";
		$style_b = "border-bottom:1 solid #000000;";
		$this->checkScript();
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				echo "<table align='".$this->talign."' ".($this->twidth==""?"":"width='$this->twidth'")." ".($this->theight==""?"":"height='$this->theight'")." border='0' cellpadding='0' cellspacing='0'>";
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->fieldAlign = str_replace(' ','',$this->fieldAlign);
					$showAlign = explode(',',$this->fieldAlign);
					$this->fieldSpace = str_replace(' ','',$this->fieldSpace);
					$showSpace = explode(',',$this->fieldSpace);
					$this->fieldLink = str_replace(' ','',$this->fieldLink);
					$showLink = explode(',',$this->fieldLink);
					$this->searchKey = str_replace(' ','',$this->searchKey);
					$showSearch = explode(',',$this->searchKey);
					$this->searchKeyDesc = str_replace(' ','',$this->searchKeyDesc);
					$showSearchDesc = explode(',',$this->searchKeyDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				$col = sizeof($showList);
				$col += $this->del==true?1:0;
				$col += $this->edit==true?1:0;
				$col += $this->special==true?sizeof($this->specialType):0;
				//echo sizeof($this->specialType);
				$extab = $col==sizeof($showList)?true:false;
				$extab = $this->sum==true?$extab:false;
				$col += $extab==true?1:0;
				$col += $this->special1==true?sizeof($this->specialType1):0;
				//show report
				if(mysql_num_rows($this->rs)<=0){
					echo "<tr><td bgcolor='#990000' align='center'><font color='#FFFFFF'>ไม่พบข้อมูล</font></td></tr>";
					echo "<tr></tr><td align='center'>[<a href='javascript:history.back()'>Back</a>]</td></tr>";
				}else{
					echo "<tr><td colspan='".$col."'><table><tr><td>";
					if($this->search){
						echo "<fieldset><form style='margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;' ";
						echo "name='searh' id='searh' action='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "ord=".$showList[$i]."&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."' method='post'>";
					//หัวข้อที่ต้องการแสดง
						//echo "<br />";
						echo "<input type='text' name='scause'>";
						echo "<select name='skey'>";
						for($i=0;$i<sizeof($showSearch);$i++){
							echo "<option value='".$showSearch[$i]."' ".($this->cause[0]==$showSearch[$i]?"selected":"").">$showSearchDesc[$i]</option>";
						}
						echo "</select>";
						echo "<input type='submit' value='ค้น'>";
					echo "</form></fieldset>";
					}
					echo "</td>";
					for($i=0;$i<sizeof($this->space);$i++)
						echo "<td align='center' width='120'>".$this->space[$i]."</td>";
					echo "</tr></table> </td></tr>";
					if($this->pageLinkShow['top']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						echo "<div><font color='#999999'>";
						echo "แสดง ".($this->cPage==$this->nPage?$this->nInfo-(($this->nPage-1)*$this->lPage):$this->lPage);
						echo " รายการ จาก ".$this->nInfo." รายการ จำนวน ".$this->nPage." หน้า หน้าละ ";
						echo "<input name='lp' type='text' size='1' style='text-align:right;font-size:10px;background-color: ";
						echo "#CCCCCC;border: 1px solid #000000;' onKeyUp='pageset(window.event.keyCode,\"lp\",\"lp\" )' ";
						echo "title='Enter เพื่อปรับแต่งการแสดงผล \n(ALL=แสดงทั้งหมด)' value='".$this->lPage."'> ข้อมูล</font></div>";
						$this->pageShow();
						echo "</td></tr>";
					}
					echo "<form name='".$this->delFormAttr[0]."' id='".$this->delFormAttr[0]."' action='".$this->delFormAttr[1]."' method='".$this->delFormAttr[2]."'>";

					echo "<tr bgcolor='#999999' align='center'>";
					if($extab==true){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>&nbsp;</td>";
					}
					if($this->special){
						for($i=0;$i<sizeof($this->specialType);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet[$i][4]==""?"&nbsp;":$this->specialSet[$i][4])."</td>";
						}
					}
					if($this->del){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "<a href=\"javascript:if(confirm('กรุณายืนยันการลบข้อมูลดังกล่าว')) document.".$this->delFormAttr[0].".submit();\">ลบ</a>";
						echo "<input name='delbutton' id='delbutton' type='checkbox' onclick='checkall()'>";
						echo "</td>";
					}
					if($this->edit){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "แก้ไข";
						echo "</td>";
					}
					for($i=0;$i<sizeof($showList);$i++){
						echo "<td ".($showSpace[$i]==""?"":"width='$showSpace[$i]'")."' style='".$style_l.$style_t.$style_b."'>";
						echo "<a style='color:#FFFFFF' href='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "pg=".$this->cPage."&ord=".$showList[$i];
						echo "&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."'>".($showDesc[$i]==""?$showList[$i]:$showDesc[$i])."</a>";
						echo "</td>";
					}
					if($this->special1){
						for($i=0;$i<sizeof($this->specialType1);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet1[$i][4]==""?"&nbsp;":$this->specialSet1[$i][4])."</td>";
						}
					}
					echo "</tr>";
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							$hlcolor = '';
							if($this->HLightField!='')
							for($j=0;$j<sizeof($showList);$j++){
								$fieldCause = ($this->HLightField==""?$showList[$j]:$this->HLightField);
								//echo "$fieldCause ".$info[$fieldCause]." | ".$this->HLight[$fieldCause]['VAL']."<br />";
								if($info[$fieldCause]==$this->HLight[$fieldCause]['VAL']){
									$hlcolor = $this->HLight[$fieldCause]['COLOR'][$i%sizeof($this->HLight[$fieldCause]['COLOR'])];
									break;
								}
							}
							$hltronmouse = " onmouseover=\"this.style.background='#FFCC99'\" ";
							$hltronmouse .= " onmouseout=\"this.style.background='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."'\" ";
							echo "<tr id='trtab[]' bgcolor='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."' $hltronmouse>";
							if($extab==true)
								echo "<td style='".$style_l."'>&nbsp;</td>";
							if($this->special){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet[$j][1]."[]' onclick=\" ".$this->specialSet[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet[$j][3]);$k++){
										echo "'".$info[$this->specialSet[$j][3][$k]]."'".($k==sizeof($this->specialSet[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							if($this->del){
								echo "<td align='center' style='".$style_l."'>";
								echo "<input type='checkbox' name='".$this->delFormAttr[3]."[$i]' value='".$info[$this->delSet[2]]."'>";
								echo "</td>";
							}
							if($this->edit){
								echo "<td align='center' style='".$style_l."'>";
								echo "<a href='".$this->editSet[0]."?state=2&".($this->editSet[3]==""?"":$this->editSet[3]);
								$getname = explode(",",$this->editSet[1]);
								$getval = explode(",",$this->editSet[2]);
								for($j=0;$j<sizeof($getname);$j++)
									echo "&".$getname[$j]."=".$info[$getval[$j]];
								echo "'><img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
								echo "src='./images/editlink.gif'/></a></td>";
							}
							for($j=0;$j<sizeof($showList);$j++){
								echo "<td align='".($showAlign[$j]==""?"left":$showAlign[$j])."' style='".$style_l."'>";
								if($showAlign[$j]=="" || strtolower($showAlign[$j])=="left")
									echo "&nbsp;";
								if(isset($showLink[$j]) && $showLink[$j]!="") 
									//echo "<a href='".$showLink[$j].$info['id']."'>";
								echo "<a href='".$showLink[$j].$info["fdate"]."&strtdate=".$info["tdate"]."&fmcode=".$info["mcode"]."&cmc=".$info["smcode"]."'>";
								if(isset($formatList[$j]) && $formatList[$j]!="") 
									echo number_format($info[$showList[$j]],$formatList[$j],'.',',');
								else echo $info[$showList[$j]];
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								if(isset($showLink[$j]) && $showLink[$j]!="") echo "</a>";
								if(strtolower($showAlign[$j])=="right")	echo "&nbsp;";
								echo "</td>";
							}
							if($this->special1){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType1);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet1[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet1[$j][1]."[]' onclick=\" ".$this->specialSet1[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet1[$j][3]);$k++){
										echo "'".$info[$this->specialSet1[$j][3][$k]]."'".($k==sizeof($this->specialSet1[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet1[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet1[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							echo "</tr>";
						}else break;
					}
					echo "</form>";
					echo "<tr><td colspan='$col' height='1' bgcolor='#000000'></td></tr>";
					if($this->sum==true){
						echo "<tr bgcolor='".($this->allSum==true?"#BBBBBB":"#999999")."'>";
						echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>รวม</td>";						
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";
								if($formatList[$i]!="") 
									echo number_format($sumVal[$i],$formatList[$i],'.',',');
								else echo $sumVal[$i];
								echo "&nbsp;</td>";
							}else{
								if($i-1>=0)
									echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
								else
									echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
							}
						}
						echo "</tr>";
						if($this->allSum==true){
							echo "<tr bgcolor='#999999'>";
							echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>จาก</td>";						
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";//.number_format(,2,'.','');
									if($formatList[$i]!="") 
										echo number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',',');
									else echo $this->allSumVal[$showList[$i]];
									echo "&nbsp;</td>";
								}else{
									if($i-1>=0)
										echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
									else
										echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
								}
							}
							echo "</tr>";
						}
					}
					if($this->pageLinkShow['bottom']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						$this->pageShow();
						echo "</td></tr>";
					}
				}
				//end show report
				echo "</table>";
				break;
		}
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function pageShow(){
		if($this->cPage!=1){
			//---------------
			//	[<<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=1&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<<]</a>";
			//---------------
			//	[<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage-1)."&ord=".$ordr."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<]</a>";
		}else{ echo "<font color='#999999'>[<<][<]</font>";}
		
		$pLink = $this->cPage>5?$this->cPage:6;
		$pLink = $this->nPage-5<$pLink?$this->nPage-5:$pLink;
		for($i=($pLink-5);$i<=($pLink+5);$i++){
			if($i>$this->nPage) break;
			if($i<=0) continue;
			//---------------
			//	1 2 3 ... N
			//---------------
			if($i==$this->cPage) echo "<b>";
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$i."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'> $i </a>";
			if($i==$this->cPage) echo "</b>";
		}
		
		if($this->cPage!=$this->nPage){
			//---------------
			//	[>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage+1)."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>]</a>";
			//---------------
			//	[>>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$this->nPage."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>>]</a>";
		}else{ echo "<font color='#999999'>[>][>>]</font>";}
		
		echo "<font color='#999999'> | ไปยังหน้า <input type='text' name='pg' id='pg'  size='1' ";
		echo "style='text-align:right;font-size:10px;background-color: #CCCCCC;border: 1px solid #000000;' ";
		echo "onKeyUp='pageset(window.event.keyCode,\"pg\",\"pg\")' title='Enter เพื่อไปยังหน้าที่ต้องการ'/></font>";
	}
	//row_flag will be 'CALC' or 'NCALC'
	//CALC refer to calculate number of record
	//NCALC refer to not calculate number of record
	public function exportXls($dir,$fileName,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$fp = fopen($dir."/".$fileName,"w");
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				//show report
				if(mysql_num_rows($this->rs)<=0){
				}else{
					//หัวข้อที่ต้องการแสดง
					for($i=0;$i<sizeof($showList);$i++){
						fprintf($fp,"%s\t",($showDesc[$i]==""?$showList[$i]:$showDesc[$i]));
					}
					fprintf($fp,"\n");
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							for($j=0;$j<sizeof($showList);$j++){
								if(isset($formatList[$j]) && $formatList[$j]!="") {
									fprintf($fp,number_format($info[$showList[$j]],$formatList[$j],'.',','));	
								}
								else{ 						
									if (ctype_digit($info[$showList[$j]]))$info[$showList[$j]] = '="'.$info[$showList[$j]].'"'; 
									fprintf($fp,$info[$showList[$j]]);
									
								}
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								fprintf($fp,"\t");
							}
							fprintf($fp,"\n");
						}else break;
					}
					if($this->sum==true){
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								if($formatList[$i]!="") 
									fprintf($fp,number_format($sumVal[$i],$formatList[$i],'.',','));
								else fprintf($fp,$sumVal[$i]);
								fprintf($fp,"\t");
							}else{
								if($i-1>=0)
									fprintf($fp,"\t");
								else
									fprintf($fp,"\t");
							}
						}
						fprintf($fp,"\n");
						if($this->allSum==true){
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									if($formatList[$i]!="") 
										fprintf($fp,number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',','));
									else fprintf($fp,$this->allSumVal[$showList[$i]]);
									fprintf($fp,"\t");
								}else{
									if($i-1>=0)
										fprintf($fp,"\t");
									else
										fprintf($fp,"\t");
								}
							}
							fprintf($fp,"\n");
						}
					}
				}
				break;
		}
		fclose($fp);
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function download($dir,$fileName){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$buff = "";
		$fp = fopen($dir."/downloadXls.php","w");
		fprintf($fp,"<? header('Pragma: public');");
		fprintf($fp,"header('Expires: 0');");
		fprintf($fp,"header('Cache-Control: must-revalidate, post-check=0, pre-check=0');");
		fprintf($fp,"header('Content-Type: application/force-download');");
		fprintf($fp,"header('Content-Type: application/octet-stream');");
		fprintf($fp,"header('Content-Type: application/download');");
		fprintf($fp,"header('Content-Disposition: attachment;filename=$fileName');");
		fprintf($fp,"header('Content-Transfer-Encoding: binary');");
		fprintf($fp,"readfile('$fileName'); ?>");
		//fprintf($fp,$buff);
		
		return "./$dir/downloadXls.php";
	}
	public function getParam(){
		$param = $this->alink."?";
		$param .= ($this->alinkarg==""?"":$this->alinkarg."&");
		$param .= "pg=".$this->cPage."&ord=".$this->order;
		$param .= "&srt=".($this->dsort==" ASC "?"DOWN":"UP");
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$param .= ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
		$param .= "&lp=".$this->lPage;
		return $param;
	}
	public function getSQL($row_flag){
		$strcause = "";
		$start = ($this->cPage-1)*$this->lPage;
		$strwhere = " AND ";
		if(strpos(strtolower($this->qry),"where")===false)
			$strwhere = " WHERE ";
		$ord = $this->order==''?'':(" ORDER BY ".$this->order.$this->dsort);
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$strcause = $this->cause[0]==''?'':($strwhere.$this->cause[0]." LIKE '%".$this->cause[1]."%' ");
		if($row_flag=="CALC")
			$sql = "SELECT SQL_CACHE SQL_CALC_FOUND_ROWS ".substr($this->qry,6,strlen($this->qry)).$strcause.$ord;
		else
			$sql = $this->qry.$strcause.$ord;
		if($this->lPage!="ALL")
			return $sql." LIMIT $start , ".$this->lPage." ";
		else
			return $sql;
	}
}

?>
<?
//require("./cls/sqlAnalizer.php");
class repGenerator_sms{
	private $sqlAnalz;// = new sqlAnalizer();
	private $rs;
	private $order = "";
	private $dsort = " ASC ";
	private $cause = "";
	//page property
	private $lPage = 200;
	private $cPage = 1;
	private $nInfo = 0;
	private $nPage;
	private $alink;
	private $alinkarg;
	private $blink;
	private $blinkarg;
	//page link
	private $pageLinkAlign = "left";
	private $pageLinkShow = array('top'=>true,'bottom'=>true);
	//private $conn;
	private $showField = "";
	private $showFieldFormat = "";
	private $fieldDesc = "";
	private $fieldAlign = "";
	private $fieldSpace = "";
	private $fieldLink = "";
	//query string
	private $qry = "";
	private $rowqry = "";
	private $sqltable;
	private $sqlWhere;
	private $twidth;
	private $theight;
	private $talign = "left";
	private $HLight;
	private $HLightField = "";
	//private $cqry = "";
	//private $xfield;
	//del and edit setting
	private $sum = false;
	private $allSum = false;
	private $sumList;
	private $allSumVal;
	private $del = false;
	private $delSet;
	private $delFormAttr = array("maindel","","post","delfield");
	private $edit = false;
	private $editSet;
	//specialset
	private $special = false;
	private $specialSet;
	private $specialType;
	//search
	private $search = false;
	private $searchKey;
	private $searchKeyDesc;
	private $space;
//constructer
	public function repGenerator(){
		$this->alink = $PHP_SELF;
		//$this->sqlAnalz = new sqlAnalizer();
		//if(isset($_GET['od']))
		//$this->conn = $conn;
	}
//method
//--setting
	public function setLimPage($num){
		$this->lPage = $num;
	}
	public function setRowQry($qryStr){
		$this->rowqry = $qryStr;
	}
	public function setAlign($align){
		$this->talign = $align;
	}
	public function setShowIndex($isshow){
		$this->index = $isshow;
	}
	public function setHLight($field,$value,$color,$hideInfo){
		$this->HLight[$field] = array('VAL'=>$value,'COLOR'=>$color);
		if($hideInfo=="HIDE"){
			$this->HLightField = $field;
		}
		//echo print_r($this->HLight[$field]);
	}
	public function setPageLinkAlign($align){
		$this->pageLinkAlign = $align;
	}
	public function setPageLinkShow($top,$bottom){
		$this->pageLinkShow['top'] = $top;
		$this->pageLinkShow['bottom'] = $bottom;
	}
	public function setLink($link,$arg){
		$this->alink = $link;
		$this->alinkarg = $arg;
	}
	public function setBackLink($link,$arg){
		$this->blink = $link;
		$this->blinkarg = $arg;
	}
	public function setCurPage($num){
		$this->cPage = $num;
	}
	public function setSize($width,$height){
		$this->twidth = $width;
		$this->theight = $height;
	}
	public function setSpecial($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special = true;
		$this->specialType[sizeof($this->specialType)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet[sizeof($this->specialSet)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSpecial1($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special1 = true;
		$this->specialType1[sizeof($this->specialType1)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet1[sizeof($this->specialSet1)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSum($sumflag,$allsumflag,$fieldSumList){
		$this->sum = $sumflag;
		$this->allSum = $allsumflag;
		$this->sumList = $fieldSumList;
	}
	public function setSearch($skey){
		$this->search = true;
		$this->searchKey = $skey;
	}
	public function setSpace($str){
		$this->space[sizeof($this->space)] = $str;
	}
	public function setSearchDesc($skeyDesc){
		$this->searchKeyDesc = $skeyDesc;
	}
	public function setDel($link,$key,$param,$arg){
		$this->del = true;
		$this->delSet = array($link,$key,$param,$arg);
	}
	public function setFromDelAttr($name,$action,$method,$delfield){		
		$this->delFormAttr = array($name,$action,$method,$delfield);
	}
	public function setEdit($link,$key,$param,$arg){
		$this->edit = true;
		$this->editSet = array($link,$key,$param,$arg);
	}
	public function setShowField($fieldNameList){
		$this->showField = $fieldNameList;
	}
	public function setFieldFloatFormat($fieldFormatList){
		$this->showFieldFormat = $fieldFormatList;
	}
	public function setFieldDesc($fieldDescList){
		$this->fieldDesc = $fieldDescList;
	}
	public function setFieldAlign($fieldAlignList){
		$this->fieldAlign = $fieldAlignList;
	}
	public function setFieldSpace($fieldSpaceList){
		$this->fieldSpace = $fieldSpaceList;
	}
	public function setFieldLink($fieldLinkList){
		$this->fieldLink = $fieldLinkList;
	}
	public function setQuery($str){
		$this->qry = $str;
	}
	public function setResult($rs){
		$this->rs = $rs;
	}
	public function setOrder($order){
		$this->order = $order;
	}
	public function setCause($key,$cuase){
		$this->cause = array($key,$cuase);
	}
	public function setLimitPage($num){ //num || ALL
		if(!is_int($num) && $num=="ALL")
			$this->lPage = "ALL";
		else
			$this->lPage = $num<10?$this->lPage:$num;
		
		//echo $num;
		//echo $this->lPage;
	}
	public function setSort($sort){
		switch($sort){
			case 'UP':
				$this->dsort = " DESC ";
				break;
			case 'DOWN':
				$this->dsort = " ASC ";
				break;
		}
	}
	public function checkScript(){
		?><script type="text/javascript" language="javascript">
		function checkall(){
			var parm = document.getElementById('delbutton').checked==true?true:false;
			for (i=0; i<document.<?=$this->delFormAttr[0]?>.elements.length;i++){
				if (document.<?=$this->delFormAttr[0]?>.elements[i].type == "checkbox" ){
					document.<?=$this->delFormAttr[0]?>.elements[i].checked = parm;
				}
			}
		}
		function pageset(key,name,getname){
			if(key==13 || key==10){
				//alert(window.location.toString().indexOf("&"));
				//alert(window.location.toString().charAt(67));
				var url  = "<?=$this->getParam()?>";
				var head = url.substr(0,url.indexOf("&"+getname));
				var foot = url.substr(url.indexOf(getname));
				//alert(foot.indexOf("&"))
				if(foot.indexOf("&")>=0)
					foot = foot.substr(foot.indexOf("&"));
				else
					foot = "";
				if(head=="")
					window.parent.location += "&" + getname + "="+document.getElementById(name).value;
				else
					window.parent.location = head + "&" + getname + "="+document.getElementById(name).value + foot;
			}
				// = "index.php?";
		}
		</script><?
	}
//--calculator
	public function rowCalc(){
		$sql = "";
		/*var $rs;
		var $row;
		var $showFieldList;
		var $sumList;*/
		$rs = mysql_query("SELECT FOUND_ROWS() AS clsrows"); 
		if(mysql_num_rows($rs)>0){
			$row = mysql_result($rs,0,'clsrows');
			mysql_free_result($rs);
		}else{
			$row = 0;//echo "SELECT COUNT(*) AS clsrows FROM (".$this->qry.$cause.") AS tabclsrow ";
		}
			
		if(!is_int($this->lPage) && $this->lPage=="ALL")
			$this->nPage = 1;
		else
			$this->nPage = ceil($row/$this->lPage);
		$this->nInfo = $row;
		//sum
		if($this->allSum==true){
			$this->showField = str_replace(' ','',$this->showField);
			$this->sumList = str_replace(' ','',$this->sumList);
			//print_r($this->sumList);
			$showFieldList = explode(',',$this->showField);
			$sumList = explode(',',$this->sumList);
			for($i=0;$i<sizeof($showFieldList);$i++){
				if($sumList[$i]){//qry.$cause.$ord
					$lmpos = strpos($this->getSQL("NCAL"),"LIMIT")==false?strlen($this->getSQL("NCAL")):strpos($this->getSQL("NCAL"),"LIMIT");
					$sql = substr($this->getSQL("NCAL"),0,$lmpos);
					$sql = "SELECT SUM(".$showFieldList[$i].") AS ".$showFieldList[$i]." FROM (".$sql.") AS tab";
					$rs = mysql_query($sql);
					$this->allSumVal[$showFieldList[$i]] = mysql_result($rs,0,$showFieldList[$i]);
					mysql_free_result($rs);
				}
			}
		}
		//print_r($this->allSumVal);
	}
//--running
	public function showRec($isshow,$type){
		global $wording_lan;
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$trcolor = array("#EDEDED","#FFFFFF");
		$style_l = "border-left:1 solid #FFFFFF;";
		$style_t = "border-top:1 solid #000000;";
		$style_b = "border-bottom:1 solid #000000;";
		$this->checkScript();
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				echo "<table align='".$this->talign."' ".($this->twidth==""?"":"width='$this->twidth'")." ".($this->theight==""?"":"height='$this->theight'")." border='0' cellpadding='0' cellspacing='0'>";
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->fieldAlign = str_replace(' ','',$this->fieldAlign);
					$showAlign = explode(',',$this->fieldAlign);
					$this->fieldSpace = str_replace(' ','',$this->fieldSpace);
					$showSpace = explode(',',$this->fieldSpace);
					$this->fieldLink = str_replace(' ','',$this->fieldLink);
					$showLink = explode(',',$this->fieldLink);
					$this->searchKey = str_replace(' ','',$this->searchKey);
					$showSearch = explode(',',$this->searchKey);
					$this->searchKeyDesc = str_replace(' ','',$this->searchKeyDesc);
					$showSearchDesc = explode(',',$this->searchKeyDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				$col = sizeof($showList);
				$col += $this->del==true?1:0;
				$col += $this->edit==true?1:0;
				$col += $this->special==true?sizeof($this->specialType):0;
				//echo sizeof($this->specialType);
				$extab = $col==sizeof($showList)?true:false;
				$extab = $this->sum==true?$extab:false;
				$col += $extab==true?1:0;
				$col += $this->special1==true?sizeof($this->specialType1):0;
				//show report
				if(mysql_num_rows($this->rs)<=0){
					echo "<tr><td bgcolor='#990000' align='center'><font color='#FFFFFF'>".$wording_lan["word"]["nodata"]."</font></td></tr>";
					echo "<tr></tr><td align='center'>[<a href='javascript:history.back()'>Back</a>]</td></tr>";
				}else{
					echo "<tr><td colspan='".$col."'><table><tr><td>";
					if($this->search){
						echo "<fieldset><form style='margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;' ";
						echo "name='searh' id='searh' action='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "ord=".$showList[$i]."&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."' method='post'>";
					//หัวข้อที่ต้องการแสดง
						//echo "<br />";
						echo "<input type='text' name='scause'>";
						echo "<select name='skey'>";
						for($i=0;$i<sizeof($showSearch);$i++){
							echo "<option value='".$showSearch[$i]."' ".($this->cause[0]==$showSearch[$i]?"selected":"").">$showSearchDesc[$i]</option>";
						}
						echo "</select>";
						echo "<input type='submit' value='".$wording_lan["word"]["search"]."'>";
					echo "</form></fieldset>";
					}
					echo "</td>";
					for($i=0;$i<sizeof($this->space);$i++)
						echo "<td align='center' width='120'>".$this->space[$i]."</td>";
					echo "</tr></table> </td></tr>";
					if($this->pageLinkShow['top']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						echo "<div><font color='#999999'>";
						echo "".$wording_lan["word"]["show"]." ".($this->cPage==$this->nPage?$this->nInfo-(($this->nPage-1)*$this->lPage):$this->lPage);
						echo " ".$wording_lan["word"]["list"]." ".$wording_lan["word"]["from"]." ".$this->nInfo." ".$wording_lan["word"]["life"]." ".$wording_lan["word"]["amount"]." ".$this->nPage." ".$wording_lan["word"]["page"]." ".$wording_lan["word"]["page"]."".$wording_lan["word"]["each"]." ";
						echo "<input name='lp' type='text' size='1' style='text-align:right;font-size:10px;background-color: ";
						echo "#CCCCCC;border: 1px solid #000000;' onKeyUp='pageset(window.event.keyCode,\"lp\",\"lp\" )' ";
						echo "title='Enter เพื่อปรับแต่งการแสดงผล \n(ALL=แสดงทั้งหมด)' value='".$this->lPage."'> ".$wording_lan["word"]["data"]."</font></div>";
						$this->pageShow();
						echo "</td></tr>";
					}
					echo "<form name='".$this->delFormAttr[0]."' id='".$this->delFormAttr[0]."' action='".$this->delFormAttr[1]."' method='".$this->delFormAttr[2]."'>";

					echo "<tr bgcolor='#999999' align='center'>";
					if($extab==true){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>&nbsp;</td>";
					}
					if($this->special){
						for($i=0;$i<sizeof($this->specialType);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet[$i][4]==""?"&nbsp;":$this->specialSet[$i][4])."</td>";
						}
					}
					if($this->del){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "<a href=\"javascript:if(confirm('Confirm')) document.".$this->delFormAttr[0].".submit();\">SMS</a>";
						echo "<input name='delbutton' id='delbutton' type='checkbox' onclick='checkall()'>";
						echo "</td>";
					}
					if($this->edit){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "".$wording_lan["word"]["edit_member"]."";
						echo "</td>";
					}
					for($i=0;$i<sizeof($showList);$i++){
						echo "<td ".($showSpace[$i]==""?"":"width='$showSpace[$i]'")."'  style='".$style_l.$style_t.$style_b."' class='aaaa'>";
						echo "<a style='color:#FFFFFF' href='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "pg=".$this->cPage."&ord=".$showList[$i];
						echo "&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."'>".($showDesc[$i]==""?$showList[$i]:$showDesc[$i])."</a>";
						echo "</td>";
					}
					if($this->special1){
						for($i=0;$i<sizeof($this->specialType1);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet1[$i][4]==""?"&nbsp;":$this->specialSet1[$i][4])."</td>";
						}
					}
					echo "</tr>";
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							$hlcolor = '';
							if($this->HLightField!='')
							for($j=0;$j<sizeof($showList);$j++){
								$fieldCause = ($this->HLightField==""?$showList[$j]:$this->HLightField);
								//echo "$fieldCause ".$info[$fieldCause]." | ".$this->HLight[$fieldCause]['VAL']."<br />";
								if($info[$fieldCause]==$this->HLight[$fieldCause]['VAL']){
									$hlcolor = $this->HLight[$fieldCause]['COLOR'][$i%sizeof($this->HLight[$fieldCause]['COLOR'])];
									break;
								}
							}
							$hltronmouse = " onmouseover=\"this.style.background='#FFCC99'\" ";
							$hltronmouse .= " onmouseout=\"this.style.background='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."'\" ";
							echo "<tr id='trtab[]' bgcolor='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."' $hltronmouse>";
							if($extab==true)
								echo "<td style='".$style_l."'>&nbsp;</td>";
							if($this->special){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet[$j][1]."[]' onclick=\" ".$this->specialSet[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet[$j][3]);$k++){
										echo "'".$info[$this->specialSet[$j][3][$k]]."'".($k==sizeof($this->specialSet[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							if($this->del){
								echo "<td align='center' style='".$style_l."'>";
								echo "<input type='checkbox' name='".$this->delFormAttr[3]."[$i]' value='".$info[$this->delSet[2]]."'>";
								echo "</td>";
							}
							if($this->edit){
								echo "<td align='center' style='".$style_l."'>";
								echo "<a href='".$this->editSet[0]."?state=2&".($this->editSet[3]==""?"":$this->editSet[3]);
								$getname = explode(",",$this->editSet[1]);
								$getval = explode(",",$this->editSet[2]);
								for($j=0;$j<sizeof($getname);$j++)
									echo "&".$getname[$j]."=".$info[$getval[$j]];
								echo "'><img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
								echo "src='./images/editlink.gif'/></a></td>";
							}
							for($j=0;$j<sizeof($showList);$j++){
								echo "<td align='".($showAlign[$j]==""?"left":$showAlign[$j])."' style='".$style_l."'>";
								if($showAlign[$j]=="" || strtolower($showAlign[$j])=="left")
									echo "&nbsp;";
								if(isset($showLink[$j]) && $showLink[$j]!="") 
									//echo "<a href='".$showLink[$j].$info['id']."'>";
								echo "<a href='".$showLink[$j].$info[$showList[$j]]."'>";
								if(isset($formatList[$j]) && $formatList[$j]!="") 
									echo number_format($info[$showList[$j]],$formatList[$j],'.',',');
								else echo $info[$showList[$j]];
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								if(isset($showLink[$j]) && $showLink[$j]!="") echo "</a>";
								if(strtolower($showAlign[$j])=="right")	echo "&nbsp;";
								echo "</td>";
							}
							if($this->special1){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType1);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet1[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet1[$j][1]."[]' onclick=\" ".$this->specialSet1[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet1[$j][3]);$k++){
										echo "'".$info[$this->specialSet1[$j][3][$k]]."'".($k==sizeof($this->specialSet1[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet1[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet1[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							echo "</tr>";
						}else break;
					}
					echo "</form>";
					echo "<tr><td colspan='$col' height='1' bgcolor='#000000'></td></tr>";
					if($this->sum==true){
						echo "<tr bgcolor='".($this->allSum==true?"#BBBBBB":"#999999")."'>";
						echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>Total</td>";						
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";
								if($formatList[$i]!="") 
									echo number_format($sumVal[$i],$formatList[$i],'.',',');
								else echo $sumVal[$i];
								echo "&nbsp;</td>";
							}else{
								if($i-1>=0)
									echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
								else
									echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
							}
						}
						echo "</tr>";
						if($this->allSum==true){
							echo "<tr bgcolor='#999999'>";
							echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>จาก</td>";						
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";//.number_format(,2,'.','');
									if($formatList[$i]!="") 
										echo number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',',');
									else echo $this->allSumVal[$showList[$i]];
									echo "&nbsp;</td>";
								}else{
									if($i-1>=0)
										echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
									else
										echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
								}
							}
							echo "</tr>";
						}
					}
					if($this->pageLinkShow['bottom']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						$this->pageShow();
						echo "</td></tr>";
					}
				}
				//end show report
				echo "</table>";
				break;
		}
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function pageShow(){
		global $wording_lan;
		if($this->cPage!=1){
			//---------------
			//	[<<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=1&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<<]</a>";
			//---------------
			//	[<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage-1)."&ord=".$ordr."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<]</a>";
		}else{ echo "<font color='#999999'>[<<][<]</font>";}
		
		$pLink = $this->cPage>5?$this->cPage:6;
		$pLink = $this->nPage-5<$pLink?$this->nPage-5:$pLink;
		for($i=($pLink-5);$i<=($pLink+5);$i++){
			if($i>$this->nPage) break;
			if($i<=0) continue;
			//---------------
			//	1 2 3 ... N
			//---------------
			if($i==$this->cPage) echo "<b>";
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$i."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'> $i </a>";
			if($i==$this->cPage) echo "</b>";
		}
		
		if($this->cPage!=$this->nPage){
			//---------------
			//	[>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage+1)."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>]</a>";
			//---------------
			//	[>>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$this->nPage."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>>]</a>";
		}else{ echo "<font color='#999999'>[>][>>]</font>";}
		
		echo "<font color='#999999'> | ".$wording_lan["word"]["gotopage"]." <input type='text' name='pg' id='pg'  size='1' ";
		echo "style='text-align:right;font-size:10px;background-color: #CCCCCC;border: 1px solid #000000;' ";
		echo "onKeyUp='pageset(window.event.keyCode,\"pg\",\"pg\")' title='Enter เพื่อไปยังหน้าที่ต้องการ'/></font>";
	}
	//row_flag will be 'CALC' or 'NCALC'
	//CALC refer to calculate number of record
	//NCALC refer to not calculate number of record
	public function exportXls($dir,$fileName,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$fp = fopen($dir."/".$fileName,"w");
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				//show report
				if(mysql_num_rows($this->rs)<=0){
				}else{
					//หัวข้อที่ต้องการแสดง
					for($i=0;$i<sizeof($showList);$i++){
						fprintf($fp,"%s\t",($showDesc[$i]==""?$showList[$i]:$showDesc[$i]));
					}
					fprintf($fp,"\n");
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							for($j=0;$j<sizeof($showList);$j++){
							if(isset($formatList[$j]) && $formatList[$j]!="") {
									fprintf($fp,number_format($info[$showList[$j]],$formatList[$j],'.',','));	
								}
								else{ 						
									if (ctype_digit($info[$showList[$j]]))$info[$showList[$j]] = '="'.$info[$showList[$j]].'"'; 
									fprintf($fp,$info[$showList[$j]]);
									
								}
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								fprintf($fp,"\t");
							}
							fprintf($fp,"\n");
						}else break;
					}
					if($this->sum==true){
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								if($formatList[$i]!="") 
									fprintf($fp,number_format($sumVal[$i],$formatList[$i],'.',','));
								else fprintf($fp,$sumVal[$i]);
								fprintf($fp,"\t");
							}else{
								if($i-1>=0)
									fprintf($fp,"\t");
								else
									fprintf($fp,"\t");
							}
						}
						fprintf($fp,"\n");
						if($this->allSum==true){
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									if($formatList[$i]!="") 
										fprintf($fp,number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',','));
									else fprintf($fp,$this->allSumVal[$showList[$i]]);
									fprintf($fp,"\t");
								}else{
									if($i-1>=0)
										fprintf($fp,"\t");
									else
										fprintf($fp,"\t");
								}
							}
							fprintf($fp,"\n");
						}
					}
				}
				break;
		}
		fclose($fp);
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function download($dir,$fileName){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$buff = "";
		$fp = fopen($dir."/downloadXls.php","w");
		fprintf($fp,"<? header('Pragma: public');");
		fprintf($fp,"header('Expires: 0');");
		fprintf($fp,"header('Cache-Control: must-revalidate, post-check=0, pre-check=0');");
		fprintf($fp,"header('Content-Type: application/force-download');");
		fprintf($fp,"header('Content-Type: application/octet-stream');");
		fprintf($fp,"header('Content-Type: application/download');");
		fprintf($fp,"header('Content-Disposition: attachment;filename=$fileName');");
		fprintf($fp,"header('Content-Transfer-Encoding: binary');");
		fprintf($fp,"readfile('$fileName'); ?>");
		//fprintf($fp,$buff);
		
		return "./$dir/downloadXls.php";
	}
	public function getParam(){
		$param = $this->alink."?";
		$param .= ($this->alinkarg==""?"":$this->alinkarg."&");
		$param .= "pg=".$this->cPage."&ord=".$this->order;
		$param .= "&srt=".($this->dsort==" ASC "?"DOWN":"UP");
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$param .= ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
		$param .= "&lp=".$this->lPage;
		return $param;
	}
	public function getSQL($row_flag){
		$strcause = "";
		$start = ($this->cPage-1)*$this->lPage;
		$strwhere = " AND ";
		if(strpos(strtolower($this->qry),"where")===false)
			$strwhere = " WHERE ";
		$ord = $this->order==''?'':(" ORDER BY ".$this->order.$this->dsort);
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$strcause = $this->cause[0]==''?'':($strwhere.$this->cause[0]." LIKE '%".$this->cause[1]."%' ");
		if($row_flag=="CALC")
			$sql = "SELECT SQL_CACHE SQL_CALC_FOUND_ROWS ".substr($this->qry,6,strlen($this->qry)).$strcause.$ord;
		else
			$sql = $this->qry.$strcause.$ord;
		if($this->lPage!="ALL")
			return $sql." LIMIT $start , ".$this->lPage." ";
		else
			return $sql;
	}
}
?>
<? 
/******************test showRec*********************

****************************************************/
/*	$link = mysql_connect('localhost', 'root', '1422528');
	$charset = "SET NAMES 'tis620'"; 
    mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	$rec = new repGenerator();
	$rec->setQuery("SELECT * FROM fs_image");
	$rec->setSort($_GET['srt']);
	$rec->setOrder($_GET['ord']);
	if(isset($_GET['pg']))
		$rec->setCurPage($_GET['pg']);
	//$rec->setShowField("ID,MCODE");
	$rec->showRec(1,'SH_QUERY');
	mysql_close($link);
*/
/******************end test showRec*****************

****************************************************/

?>

<?
//require("./cls/sqlAnalizer.php");
class repGenerator_cm{
	private $sqlAnalz;// = new sqlAnalizer();
	private $rs;
	private $order = "";
	private $dsort = " ASC ";
	private $cause = "";
	//page property
	private $lPage = 500;
	private $cPage = 1;
	private $nInfo = 0;
	private $nPage;
	private $alink;
	private $alinkarg;
	private $blink;
	private $blinkarg;
	//page link
	private $pageLinkAlign = "left";
	private $pageLinkShow = array('top'=>true,'bottom'=>true);
	//private $conn;
	private $showField = "";
	private $showFieldFormat = "";
	private $fieldDesc = "";
	private $fieldAlign = "";
	private $fieldSpace = "";
	private $fieldLink = "";
	//query string
	private $qry = "";
	private $rowqry = "";
	private $sqltable;
	private $sqlWhere;
	private $twidth;
	private $theight;
	private $talign = "left";
	private $HLight;
	private $HLightField = "";
	//private $cqry = "";
	//private $xfield;
	//del and edit setting
	private $sum = false;
	private $allSum = false;
	private $sumList;
	private $allSumVal;
	private $del = false;
	private $delSet;
	private $delFormAttr = array("maindel","","post","delfield");
	private $edit = false;
	private $editSet;
	//specialset
	private $special = false;
	private $specialSet;
	private $specialType;
	//search
	private $search = false;
	private $searchKey;
	private $searchKeyDesc;
	private $space;
//constructer
	public function repGenerator(){
		$this->alink = $PHP_SELF;
		//$this->sqlAnalz = new sqlAnalizer();
		//if(isset($_GET['od']))
		//$this->conn = $conn;
	}
//method
//--setting
	public function setLimPage($num){
		$this->lPage = $num;
	}
	public function setRowQry($qryStr){
		$this->rowqry = $qryStr;
	}
	public function setAlign($align){
		$this->talign = $align;
	}
	public function setShowIndex($isshow){
		$this->index = $isshow;
	}
	public function setHLight($field,$value,$color,$hideInfo){
		$this->HLight[$field] = array('VAL'=>$value,'COLOR'=>$color);
		if($hideInfo=="HIDE"){
			$this->HLightField = $field;
		}
		//echo print_r($this->HLight[$field]);
	}
	public function setPageLinkAlign($align){
		$this->pageLinkAlign = $align;
	}
	public function setPageLinkShow($top,$bottom){
		$this->pageLinkShow['top'] = $top;
		$this->pageLinkShow['bottom'] = $bottom;
	}
	public function setLink($link,$arg){
		$this->alink = $link;
		$this->alinkarg = $arg;
	}
	public function setBackLink($link,$arg){
		$this->blink = $link;
		$this->blinkarg = $arg;
	}
	public function setCurPage($num){
		$this->cPage = $num;
	}
	public function setSize($width,$height){
		$this->twidth = $width;
		$this->theight = $height;
	}
	public function setSpecial($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special = true;
		$this->specialType[sizeof($this->specialType)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet[sizeof($this->specialSet)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSpecial1($spdesc,$spname,$script,$scriptarg,$type,$spcolname){
		//$scriptarg = array();;
		$this->special1 = true;
		$this->specialType1[sizeof($this->specialType1)] = $type==""?"TEXT":$type;
		$tmparg = explode(',',$scriptarg);
		if(sizeof($tmparg)>=2)
			$tmparg[1] = $tmparg[1]==""?"spbutton":$tmparg[1];
		$this->specialSet1[sizeof($this->specialSet1)] = array($spdesc,$spname,$script,$tmparg,$spcolname);
	}
	public function setSum($sumflag,$allsumflag,$fieldSumList){
		$this->sum = $sumflag;
		$this->allSum = $allsumflag;
		$this->sumList = $fieldSumList;
	}
	public function setSearch($skey){
		$this->search = true;
		$this->searchKey = $skey;
	}
	public function setSpace($str){
		$this->space[sizeof($this->space)] = $str;
	}
	public function setSearchDesc($skeyDesc){
		$this->searchKeyDesc = $skeyDesc;
	}
	public function setDel($link,$key,$param,$arg){
		$this->del = true;
		$this->delSet = array($link,$key,$param,$arg);
	}
	public function setFromDelAttr($name,$action,$method,$delfield){		
		$this->delFormAttr = array($name,$action,$method,$delfield);
	}
	public function setEdit($link,$key,$param,$arg){
		$this->edit = true;
		$this->editSet = array($link,$key,$param,$arg);
	}
	public function setShowField($fieldNameList){
		$this->showField = $fieldNameList;
	}
	public function setFieldFloatFormat($fieldFormatList){
		$this->showFieldFormat = $fieldFormatList;
	}
	public function setFieldDesc($fieldDescList){
		$this->fieldDesc = $fieldDescList;
	}
	public function setFieldAlign($fieldAlignList){
		$this->fieldAlign = $fieldAlignList;
	}
	public function setFieldSpace($fieldSpaceList){
		$this->fieldSpace = $fieldSpaceList;
	}
	public function setFieldLink($fieldLinkList){
		$this->fieldLink = $fieldLinkList;
	}
	public function setQuery($str){
		$this->qry = $str;
	}
	public function setResult($rs){
		$this->rs = $rs;
	}
	public function setOrder($order){
		$this->order = $order;
	}
	public function setCause($key,$cuase){
		$this->cause = array($key,$cuase);
	}
	public function setLimitPage($num){ //num || ALL
		if(!is_int($num) && $num=="ALL")
			$this->lPage = "ALL";
		else
			$this->lPage = $num<10?$this->lPage:$num;
		
		//echo $num;
		//echo $this->lPage;
	}
	public function setSort($sort){
		switch($sort){
			case 'UP':
				$this->dsort = " DESC ";
				break;
			case 'DOWN':
				$this->dsort = " ASC ";
				break;
		}
	}
	public function checkScript(){
		?><script type="text/javascript" language="javascript">
		function checkall(){
			var parm = document.getElementById('delbutton').checked==true?true:false;
			for (i=0; i<document.<?=$this->delFormAttr[0]?>.elements.length;i++){
				if (document.<?=$this->delFormAttr[0]?>.elements[i].type == "checkbox" ){
					document.<?=$this->delFormAttr[0]?>.elements[i].checked = parm;
				}
			}
		}
		function pageset(key,name,getname){
			if(key==13 || key==10){
				//alert(window.location.toString().indexOf("&"));
				//alert(window.location.toString().charAt(67));
				var url  = "<?=$this->getParam()?>";
				var head = url.substr(0,url.indexOf("&"+getname));
				var foot = url.substr(url.indexOf(getname));
				//alert(foot.indexOf("&"))
				if(foot.indexOf("&")>=0)
					foot = foot.substr(foot.indexOf("&"));
				else
					foot = "";
				if(head=="")
					window.parent.location += "&" + getname + "="+document.getElementById(name).value;
				else
					window.parent.location = head + "&" + getname + "="+document.getElementById(name).value + foot;
			}
				// = "index.php?";
		}
		</script><?
	}
//--calculator
	public function rowCalc(){
		$sql = "";
		/*var $rs;
		var $row;
		var $showFieldList;
		var $sumList;*/
		$rs = mysql_query("SELECT FOUND_ROWS() AS clsrows"); 
		if(mysql_num_rows($rs)>0){
			$row = mysql_result($rs,0,'clsrows');
			mysql_free_result($rs);
		}else{
			$row = 0;//echo "SELECT COUNT(*) AS clsrows FROM (".$this->qry.$cause.") AS tabclsrow ";
		}
			
		if(!is_int($this->lPage) && $this->lPage=="ALL")
			$this->nPage = 1;
		else
			$this->nPage = ceil($row/$this->lPage);
		$this->nInfo = $row;
		//sum
		if($this->allSum==true){
			$this->showField = str_replace(' ','',$this->showField);
			$this->sumList = str_replace(' ','',$this->sumList);
			//print_r($this->sumList);
			$showFieldList = explode(',',$this->showField);
			$sumList = explode(',',$this->sumList);
			for($i=0;$i<sizeof($showFieldList);$i++){
				if($sumList[$i]){//qry.$cause.$ord
					$lmpos = strpos($this->getSQL("NCAL"),"LIMIT")==false?strlen($this->getSQL("NCAL")):strpos($this->getSQL("NCAL"),"LIMIT");
					$sql = substr($this->getSQL("NCAL"),0,$lmpos);
					$sql = "SELECT SUM(".$showFieldList[$i].") AS ".$showFieldList[$i]." FROM (".$sql.") AS tab";
					$rs = mysql_query($sql);
					$this->allSumVal[$showFieldList[$i]] = mysql_result($rs,0,$showFieldList[$i]);
					mysql_free_result($rs);
				}
			}
		}
		//print_r($this->allSumVal);
	}
//--running
	public function showRec($isshow,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$trcolor = array("#EDEDED","#FFFFFF");
		$style_l = "border-left:1 solid #FFFFFF;";
		$style_t = "border-top:1 solid #000000;";
		$style_b = "border-bottom:1 solid #000000;";
		$this->checkScript();
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				echo "<table align='".$this->talign."' ".($this->twidth==""?"":"width='$this->twidth'")." ".($this->theight==""?"":"height='$this->theight'")." border='0' cellpadding='0' cellspacing='0'>";
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->fieldAlign = str_replace(' ','',$this->fieldAlign);
					$showAlign = explode(',',$this->fieldAlign);
					$this->fieldSpace = str_replace(' ','',$this->fieldSpace);
					$showSpace = explode(',',$this->fieldSpace);
					$this->fieldLink = str_replace(' ','',$this->fieldLink);
					$showLink = explode(',',$this->fieldLink);
					$this->searchKey = str_replace(' ','',$this->searchKey);
					$showSearch = explode(',',$this->searchKey);
					$this->searchKeyDesc = str_replace(' ','',$this->searchKeyDesc);
					$showSearchDesc = explode(',',$this->searchKeyDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				$col = sizeof($showList);
				$col += $this->del==true?1:0;
				$col += $this->edit==true?1:0;
				$col += $this->special==true?sizeof($this->specialType):0;
				//echo sizeof($this->specialType);
				$extab = $col==sizeof($showList)?true:false;
				$extab = $this->sum==true?$extab:false;
				$col += $extab==true?1:0;
				$col += $this->special1==true?sizeof($this->specialType1):0;
				//show report
				if(mysql_num_rows($this->rs)<=0){
					echo "<tr><td bgcolor='#990000' align='center'><font color='#FFFFFF'>ไม่พบข้อมูล</font></td></tr>";
					echo "<tr></tr><td align='center'>[<a href='javascript:history.back()'>Back</a>]</td></tr>";
				}else{
					echo "<tr><td colspan='".$col."'><table><tr><td>";
					if($this->search){
						echo "<fieldset><form style='margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;' ";
						echo "name='searh' id='searh' action='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "ord=".$showList[$i]."&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."' method='post'>";
					//หัวข้อที่ต้องการแสดง
						//echo "<br />";
						echo "<input type='text' name='scause'>";
						echo "<select name='skey'>";
						for($i=0;$i<sizeof($showSearch);$i++){
							echo "<option value='".$showSearch[$i]."' ".($this->cause[0]==$showSearch[$i]?"selected":"").">$showSearchDesc[$i]</option>";
						}
						echo "</select>";
						echo "<input type='submit' value='ค้น'>";
					echo "</form></fieldset>";
					}
					echo "</td>";
					for($i=0;$i<sizeof($this->space);$i++)
						echo "<td align='center' width='120'>".$this->space[$i]."</td>";
					echo "</tr></table> </td></tr>";
					if($this->pageLinkShow['top']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						echo "<div><font color='#999999'>";
						echo "แสดง ".($this->cPage==$this->nPage?$this->nInfo-(($this->nPage-1)*$this->lPage):$this->lPage);
						echo " รายการ จาก ".$this->nInfo." รายการ จำนวน ".$this->nPage." หน้า หน้าละ ";
						echo "<input name='lp' type='text' size='1' style='text-align:right;font-size:10px;background-color: ";
						echo "#CCCCCC;border: 1px solid #000000;' onKeyUp='pageset(window.event.keyCode,\"lp\",\"lp\" )' ";
						echo "title='Enter เพื่อปรับแต่งการแสดงผล \n(ALL=แสดงทั้งหมด)' value='".$this->lPage."'> ข้อมูล</font></div>";
						$this->pageShow();
						echo "</td></tr>";
					}
					echo "<form name='".$this->delFormAttr[0]."' id='".$this->delFormAttr[0]."' action='".$this->delFormAttr[1]."' method='".$this->delFormAttr[2]."'>";

					echo "<tr bgcolor='#999999' align='center'>";
					if($extab==true){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>&nbsp;</td>";
					}
					if($this->special){
						for($i=0;$i<sizeof($this->specialType);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet[$i][4]==""?"&nbsp;":$this->specialSet[$i][4])."</td>";
						}
					}
					if($this->del){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "<a href=\"javascript:if(confirm('กรุณายืนยันการลบข้อมูลดังกล่าว')) document.".$this->delFormAttr[0].".submit();\">ลบ</a>";
						echo "<input name='delbutton' id='delbutton' type='checkbox' onclick='checkall()'>";
						echo "</td>";
					}
					if($this->edit){
						echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
						echo "แก้ไข";
						echo "</td>";
					}
					for($i=0;$i<sizeof($showList);$i++){
						echo "<td ".($showSpace[$i]==""?"":"width='$showSpace[$i]'")."' style='".$style_l.$style_t.$style_b."'>";
						echo "<a style='color:#FFFFFF' href='".$this->alink."?";
						echo ($this->alinkarg==""?"":$this->alinkarg."&");
						echo "pg=".$this->cPage."&ord=".$showList[$i];
						echo "&srt=".($this->dsort==" ASC "?"UP":"DOWN");
						if(isset($this->cause) && sizeof($this->cause)>=2)
							echo ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
						echo "&lp=".$this->lPage."'>".($showDesc[$i]==""?$showList[$i]:$showDesc[$i])."</a>";
						echo "</td>";
					}
					if($this->special1){
						for($i=0;$i<sizeof($this->specialType1);$i++){
							echo "<td bgcolor='#99CCCC' style='".$style_l.$style_t.$style_b."'>";
							echo ($this->specialSet1[$i][4]==""?"&nbsp;":$this->specialSet1[$i][4])."</td>";
						}
					}
					echo "</tr>";
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							$hlcolor = '';
							if($this->HLightField!='')
							for($j=0;$j<sizeof($showList);$j++){
								$fieldCause = ($this->HLightField==""?$showList[$j]:$this->HLightField);
								//echo "$fieldCause ".$info[$fieldCause]." | ".$this->HLight[$fieldCause]['VAL']."<br />";
								if($info[$fieldCause]==$this->HLight[$fieldCause]['VAL']){
									$hlcolor = $this->HLight[$fieldCause]['COLOR'][$i%sizeof($this->HLight[$fieldCause]['COLOR'])];
									break;
								}
							}
							$hltronmouse = " onmouseover=\"this.style.background='#FFCC99'\" ";
							$hltronmouse .= " onmouseout=\"this.style.background='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."'\" ";
							echo "<tr id='trtab[]' bgcolor='".($hlcolor==''?$trcolor[$i%2]:$hlcolor)."' $hltronmouse>";
							if($extab==true)
								echo "<td style='".$style_l."'>&nbsp;</td>";
							if($this->special){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet[$j][1]."[]' onclick=\" ".$this->specialSet[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet[$j][3]);$k++){
										echo "'".$info[$this->specialSet[$j][3][$k]]."'".($k==sizeof($this->specialSet[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							if($this->del){
								echo "<td align='center' style='".$style_l."'>";
								echo "<input type='checkbox' name='".$this->delFormAttr[3]."[$i]' value='".$info[$this->delSet[2]]."'>";
								echo "</td>";
							}
							if($this->edit){
								echo "<td align='center' style='".$style_l."'>";
								echo "<a href='".$this->editSet[0]."?state=2&".($this->editSet[3]==""?"":$this->editSet[3]);
								$getname = explode(",",$this->editSet[1]);
								$getval = explode(",",$this->editSet[2]);
								for($j=0;$j<sizeof($getname);$j++)
									echo "&".$getname[$j]."=".$info[$getval[$j]];
								echo "'><img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
								echo "src='./images/editlink.gif'/></a></td>";
							}
							for($j=0;$j<sizeof($showList);$j++){
								$cm_rcode = $info["rcode"]-1;

								echo "<td align='".($showAlign[$j]==""?"left":$showAlign[$j])."' style='".$style_l."'>";
								if($showAlign[$j]=="" || strtolower($showAlign[$j])=="left")
									echo "&nbsp;";
								if(isset($showLink[$j]) && $showLink[$j]!="") 
									//echo "<a href='".$showLink[$j].$info['id']."'>";
							//	echo "<a href='".$showLink[$j].$info[$showList[$j]]."'>";

							
							echo "<a href='".$showLink[$j].$info[$showList[$j]]."&cm_rcode=".$cm_rcode."'>";
								if(isset($formatList[$j]) && $formatList[$j]!="") 
									echo number_format($info[$showList[$j]],$formatList[$j],'.',',');
								else echo $info[$showList[$j]];
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								if(isset($showLink[$j]) && $showLink[$j]!="") echo "</a>";
								if(strtolower($showAlign[$j])=="right")	echo "&nbsp;";
								echo "</td>";
							}
							if($this->special1){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType1);$j++){
									echo "<td id='tdtab[]' align='center' style='".$style_l."'>";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo "<input type='button' ";
											break;
										case 'TEXT' :
											echo "<a style='cursor:pointer;color:#0066CC;' ";
											echo " onmouseover='this.style.textDecorationUnderline=true;' ";
											echo " onmouseout='this.style.textDecorationUnderline=false;' ";
											break;
										case 'IMAGE' : 
											echo "<img onmouseover='this.height-=5;' onmouseout='this.height+=5;' ";
											echo "style='cursor:pointer' src='".$this->specialSet1[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet1[$j][1]."[]' onclick=\" ".$this->specialSet1[$j][2]."(";
									for($k=0;$k<sizeof($this->specialSet1[$j][3]);$k++){
										echo "'".$info[$this->specialSet1[$j][3][$k]]."'".($k==sizeof($this->specialSet1[$j][3])-1?"":",");
									}
									echo ")\" ";
									switch($this->specialType1[$j]){
										case 'INPUT' :
											echo " value='".$this->specialSet1[$j][0]."'>";
											break;
										case 'TEXT' :
											echo ">".$this->specialSet1[$j][0]."</a>";
											break;
										case 'IMAGE' :
											echo ">";
											break;
									}
	
									echo "</td>";
								}// จบ loop for ของ special
							}
							echo "</tr>";
						}else break;
					}
					echo "</form>";
					echo "<tr><td colspan='$col' height='1' bgcolor='#000000'></td></tr>";
					if($this->sum==true){
						echo "<tr bgcolor='".($this->allSum==true?"#BBBBBB":"#999999")."'>";
						echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>รวม</td>";						
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";
								if($formatList[$i]!="") 
									echo number_format($sumVal[$i],$formatList[$i],'.',',');
								else echo $sumVal[$i];
								echo "&nbsp;</td>";
							}else{
								if($i-1>=0)
									echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
								else
									echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
							}
						}
						echo "</tr>";
						if($this->allSum==true){
							echo "<tr bgcolor='#999999'>";
							echo "<td align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>จาก</td>";						
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									echo "<td align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";//.number_format(,2,'.','');
									if($formatList[$i]!="") 
										echo number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',',');
									else echo $this->allSumVal[$showList[$i]];
									echo "&nbsp;</td>";
								}else{
									if($i-1>=0)
										echo "<td style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
									else
										echo "<td style='".$style_b.$style_l."'>&nbsp;</td>";
								}
							}
							echo "</tr>";
						}
					}
					if($this->pageLinkShow['bottom']){
						echo "<tr><td align='".$this->pageLinkAlign."' colspan='".$col."'>";
						$this->pageShow();
						echo "</td></tr>";
					}
				}
				//end show report
				echo "</table>";
				break;
		}
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function pageShow(){
		if($this->cPage!=1){
			//---------------
			//	[<<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=1&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<<]</a>";
			//---------------
			//	[<]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage-1)."&ord=".$ordr."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[<]</a>";
		}else{ echo "<font color='#999999'>[<<][<]</font>";}
		
		$pLink = $this->cPage>5?$this->cPage:6;
		$pLink = $this->nPage-5<$pLink?$this->nPage-5:$pLink;
		for($i=($pLink-5);$i<=($pLink+5);$i++){
			if($i>$this->nPage) break;
			if($i<=0) continue;
			//---------------
			//	1 2 3 ... N
			//---------------
			if($i==$this->cPage) echo "<b>";
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$i."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'> $i </a>";
			if($i==$this->cPage) echo "</b>";
		}
		
		if($this->cPage!=$this->nPage){
			//---------------
			//	[>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".($this->cPage+1)."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>]</a>";
			//---------------
			//	[>>]
			//---------------
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&");
			echo "pg=".$this->nPage."&ord=".$this->order."&srt=".($this->dsort==" ASC "?"DOWN":"UP");
			if(isset($this->cause) && sizeof($this->cause)>=2)
				echo "&skey=".$this->cause[0]."&scause=".$this->cause[1];
			echo "&lp=".$this->lPage."'>[>>]</a>";
		}else{ echo "<font color='#999999'>[>][>>]</font>";}
		
		echo "<font color='#999999'> | ไปยังหน้า <input type='text' name='pg' id='pg'  size='1' ";
		echo "style='text-align:right;font-size:10px;background-color: #CCCCCC;border: 1px solid #000000;' ";
		echo "onKeyUp='pageset(window.event.keyCode,\"pg\",\"pg\")' title='Enter เพื่อไปยังหน้าที่ต้องการ'/></font>";
	}
	//row_flag will be 'CALC' or 'NCALC'
	//CALC refer to calculate number of record
	//NCALC refer to not calculate number of record
	public function exportXls($dir,$fileName,$type){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$fp = fopen($dir."/".$fileName,"w");
		switch($type){
			case 'SH_QUERY':
				$this->rs = mysql_query($this->getSQL("CALC"));
				//echo $this->getSQL("CALC");
				$this->rowCalc();

			case 'SH_RESULT':
				$row = mysql_num_rows($this->rs);
				if($this->showField!=""){
					$this->showField = str_replace(' ','',$this->showField);
					$showList = explode(',',$this->showField);
					$this->showFieldFormat = str_replace(' ','',$this->showFieldFormat);
					$formatList = explode(',',$this->showFieldFormat);
					$this->fieldDesc = str_replace(' ','',$this->fieldDesc);
					$showDesc = explode(',',$this->fieldDesc);
					$this->sumList = str_replace(' ','',$this->sumList);
					$showSumList = explode(',',$this->sumList);
				}else{
					$i=0;
					while($i < mysql_num_fields($this->rs)){
						$meta = mysql_fetch_field($this->rs,$i);
						$showList[$i++] = $meta->name;
					}		
				}
				//show report
				if(mysql_num_rows($this->rs)<=0){
				}else{
					//หัวข้อที่ต้องการแสดง
					for($i=0;$i<sizeof($showList);$i++){
						fprintf($fp,"%s\t",($showDesc[$i]==""?$showList[$i]:$showDesc[$i]));
					}
					fprintf($fp,"\n");
					//ข้อมูลที่แสดง
					//$sumVal="";
					//echo mysql_num_rows($this->rs);
					for($i=0;$i<mysql_num_rows($this->rs);$i++){
						if(is_int($this->lPage) && $i>=$this->lPage) break;
						if($info = mysql_fetch_array($this->rs)){
							for($j=0;$j<sizeof($showList);$j++){
								if(isset($formatList[$j]) && $formatList[$j]!="") {
									fprintf($fp,number_format($info[$showList[$j]],$formatList[$j],'.',','));	
								}
								else{ 						
									if (ctype_digit($info[$showList[$j]]))$info[$showList[$j]] = '="'.$info[$showList[$j]].'"'; 
									fprintf($fp,$info[$showList[$j]]);
									
								}
								if(!isset($sumVal[$j])) $sumVal[$j] = 0;	//init value
								$sumVal[$j] += $info[$showList[$j]];
								fprintf($fp,"\t");
							}
							fprintf($fp,"\n");
						}else break;
					}
					if($this->sum==true){
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								if($formatList[$i]!="") 
									fprintf($fp,number_format($sumVal[$i],$formatList[$i],'.',','));
								else fprintf($fp,$sumVal[$i]);
								fprintf($fp,"\t");
							}else{
								if($i-1>=0)
									fprintf($fp,"\t");
								else
									fprintf($fp,"\t");
							}
						}
						fprintf($fp,"\n");
						if($this->allSum==true){
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									if($formatList[$i]!="") 
										fprintf($fp,number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',','));
									else fprintf($fp,$this->allSumVal[$showList[$i]]);
									fprintf($fp,"\t");
								}else{
									if($i-1>=0)
										fprintf($fp,"\t");
									else
										fprintf($fp,"\t");
								}
							}
							fprintf($fp,"\n");
						}
					}
				}
				break;
		}
		fclose($fp);
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function download($dir,$fileName){
		date_default_timezone_set('Asia/Krasnoyarsk') ;	
		$starttm = $endtm = date("H:i:s");
		$buff = "";
		$fp = fopen($dir."/downloadXls.php","w");
		fprintf($fp,"<? header('Pragma: public');");
		fprintf($fp,"header('Expires: 0');");
		fprintf($fp,"header('Cache-Control: must-revalidate, post-check=0, pre-check=0');");
		fprintf($fp,"header('Content-Type: application/force-download');");
		fprintf($fp,"header('Content-Type: application/octet-stream');");
		fprintf($fp,"header('Content-Type: application/download');");
		fprintf($fp,"header('Content-Disposition: attachment;filename=$fileName');");
		fprintf($fp,"header('Content-Transfer-Encoding: binary');");
		fprintf($fp,"readfile('$fileName'); ?>");
		//fprintf($fp,$buff);
		
		return "./$dir/downloadXls.php";
	}
	public function getParam(){
		$param = $this->alink."?";
		$param .= ($this->alinkarg==""?"":$this->alinkarg."&");
		$param .= "pg=".$this->cPage."&ord=".$this->order;
		$param .= "&srt=".($this->dsort==" ASC "?"DOWN":"UP");
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$param .= ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
		$param .= "&lp=".$this->lPage;
		return $param;
	}
	public function getSQL($row_flag){
		$strcause = "";
		$start = ($this->cPage-1)*$this->lPage;
		$strwhere = " AND ";
		if(strpos(strtolower($this->qry),"where")===false)
			$strwhere = " WHERE ";
		$ord = $this->order==''?'':(" ORDER BY ".$this->order.$this->dsort);
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$strcause = $this->cause[0]==''?'':($strwhere.$this->cause[0]." LIKE '%".$this->cause[1]."%' ");
		if($row_flag=="CALC")
			$sql = "SELECT SQL_CACHE SQL_CALC_FOUND_ROWS ".substr($this->qry,6,strlen($this->qry)).$strcause.$ord;
		else
			$sql = $this->qry.$strcause.$ord;
		if($this->lPage!="ALL")
			return $sql." LIMIT $start , ".$this->lPage." ";
		else
			return $sql;
	}
}
?>