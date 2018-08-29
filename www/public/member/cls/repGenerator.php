<?
session_start();
//require("./cls/sqlAnalizer.php");
class repGenerator{
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
	//mobile show
	private $showMobile;
	private $showMobileList;
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

	public function repGenerator(){
		$this->alink = $PHP_SELF;
		//$this->sqlAnalz = new sqlAnalizer();
		//if(isset($_GET['od']))
		//$this->conn = $conn;
	}
	public function setLimPage($num){
		$this->lPage = $num;
	}
	public function setRowQry($qryStr){
		$this->rowqry = $qryStr;
	}
	public function setAlign($align){
		$this->talign = $align;
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
	public function setShowMobile($showMobileflag,$fieldMobileList){
		$this->showMobile = $showMobileflag;
		$this->showMobileList = $fieldMobileList;
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
		$this->special = true;
		$this->specialType[sizeof($this->specialType)] = $type==""?"TEXT":$type;
		$scriptarg = explode(',',$scriptarg);
		$scriptarg[1] = $scriptarg[1]==""?"spbutton":$scriptarg[1];
		$this->specialSet[sizeof($this->specialSet)] = array($spdesc,$spname,$script,$scriptarg,$spcolname);
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
	public function setLimitPage($num){ //num || INF
		if(!is_int($num) && $num=="INF")
			$this->lPage = "INF";
		else
			$this->lPage = $num<10?300:$num;
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
				if (document.<?=$this->delFormAttr[0]?>.elements(i).type == "checkbox" ){
					document.<?=$this->delFormAttr[0]?>.elements(i).checked = parm;
				}
			}
		}
		function pageset(key){
			if(key==13 || key==10)
				window.location += "&lp="+document.getElementById('lp').value;
		}
		</script><?
	}
	public function rowCalc(){
		$rs = mysql_query("SELECT FOUND_ROWS() AS clsrows"); 
		if(mysql_num_rows($rs)>0){
			$row = mysql_result($rs,0,'clsrows');
			mysql_free_result($rs);
		}else{
			//echo "SELECT COUNT(*) AS clsrows FROM (".$this->qry.$cause.") AS tabclsrow ";
		}
			
		if(!is_int($this->lPage) && $this->lPage=="INF")
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
				if($sumList[$i]){
					$sql = "SELECT SUM(".$showFieldList[$i].") AS ".$showFieldList[$i]." FROM (".$this->qry.$cause.$ord.") AS tab";
					//echo $sql;
					$rs = mysql_query($sql);
					$this->allSumVal[$showFieldList[$i]] = mysql_result($rs,0,$showFieldList[$i]);
					mysql_free_result($rs);
				}
			}
		}
		
	}

	public function showRec($page,$type){
		global $wording_lan;
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
				
				$row = mysql_num_rows($this->rs);

				//Mobile 
				if($this->showMobile==true){
					$this->showMobileField = str_replace(' ','',$this->showMobileList);
					$showMobileField = explode(',',$this->showMobileField);
				}

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
					echo "<div class='alert alert-error'>
                                <button class='close' data-dismiss='alert'>?</button>
                                <strong>Not Found Data</strong> 
                            </div> 
							
							";
					
					echo "<center><a href='javascript:history.back()'><button class='btn btn-inverse'><i class='fa fa-backward icon-white'></i> Back</button></a></center>";
				}else{
					 

					if($this->search){
							
							echo "<form style='margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;' name='searh' id='searh' action='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&")."ord=".$showList[$i]."&srt=".($this->dsort==" DESC "?"DOWN":"UP").($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0])."&lp=".$this->lPage."' method='post'><br>";

							echo '<div class="row">
									<div class="col-xs-12">
										<div class="col-xs-5 col-sm-2">
											<div class="control-group">
												<div class="controls controls-row">
													<input class="col-xs-12" type="text" placeholder="'.$wording_lan["tab4"]["7_18"].'" name="scause">
												</div>
											</div>
										</div>
										<div class="col-xs-5 col-sm-2">
											<div class="control-group">
												<select class="form-control col-xs-12" data-placeholder="โปรดเลือกเลือก" name="skey" class=" form-control chzn-select-deselect span12" tabindex="-1" id="selCSI"> ';
													for($i=0;$i<sizeof($showSearch);$i++){
														echo "<option value='".$showSearch[$i]."' ".($this->cause[0]==$showSearch[$i]?"selected":"").">$showSearchDesc[$i]</option>";
													}
											echo'</select> 
											</div>
										</div>
										<div class="col-xs-2 col-sm-2">
											<div class="control-group">
												<button type="submit" class="col-xs-15 btn btn-sm btn-success">'.$wording_lan["tab2_1_search"].'</button>
											</div>
										</div>
									</div>
								</div>
								<br>
								</form>';
					}

					echo "<div id='no-more-tables' >";
					echo "<table class='table table-striped table-bordered table-hover cf' align='".$this->talign."' ".($this->twidth==""?"":"width='$this->twidth'")." ".($this->theight==""?"":"height='$this->theight'")." border='0' cellpadding='0' cellspacing='0'>";
					echo "<form name='".$this->delFormAttr[0]."' id='".$this->delFormAttr[0]."' action='".$this->delFormAttr[1]."' method='".$this->delFormAttr[2]."'>";
					
					echo "<thead class='cf'>";
					echo "<tr>";
					if($extab==true){
						echo "<th>&nbsp;</th>";
					}
					if($this->special){
						for($i=0;$i<sizeof($this->specialSet);$i++){
							echo "<th>";
							echo ($this->specialSet[$i][4]==""?"&nbsp;":$this->specialSet[$i][4])."</th>";
						}
					}
					if($this->del){
						echo "<th>";
						echo "<a href=\"javascript:if(confirm('กรุณายืนยันการลบข้อมูลดังกล่าว')) document.".$this->delFormAttr[0].".submit();\">ลบ</a>";
						echo "<input name='delbutton' id='delbutton' type='checkbox' onclick='checkall()'>";
						echo "</th>";

						$col2 += 1;
					}
					if($this->edit){
						echo "<th>";
						echo "แก้ไข";
						echo "</th>";

						$col2 += 1;
					}
					for($i=0;$i<sizeof($showList);$i++){
						echo "<th ".($showSpace[$i]==""?"":"width='$showSpace[$i]'")."' class='".($showMobileField[$i]=='false'?"hidden-xs":"")."' >";
						echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&")."pg=".$this->cPage."&ord=".$showList[$i]."&srt=".($this->dsort==" DESC "?"DOWN":"UP").($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0])."&lp=".$this->lPage."'>".($showDesc[$i]==""?$showList[$i]:$showDesc[$i])."</a>";
						echo "</th>";
					}
					echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
					
					//ข้อมูลที่แสดง

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
							echo "<tr id='trtab[]'>";
							if($extab==true)
								echo "<td  data-title=''>&nbsp;</td>";
							if($this->special){
								// เริ่ม loop $this->specialType เพื่อแสดงข้อมูลในคอลัมน์พิเศษตามที่เพิ่มมา
								for($j=0;$j<sizeof($this->specialType);$j++){
									echo "<td data-title='' align='center' style='".$style_l."'>";
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
											echo "<img style='cursor:pointer' src='".$this->specialSet[$j][0]."' ";
											break;
									}
									echo " name='".$this->specialSet[1]."[]' onclick=\"".$this->specialSet[$j][2]."(";
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
								echo "<td data-title='Del'>";
								echo "<input type='checkbox' name='".$this->delFormAttr[3]."[$i]' value='".$info[$this->delSet[2]]."'>";
								echo "</td>";
							}
							if($this->edit){
								echo "<td data-title='Edit'>";
								echo "<a href='".$this->editSet[0]."?state=2&".($this->editSet[3]==""?"":$this->editSet[3]."&");
								echo ($this->editSet[1]==""?"":$this->editSet[1]."=".$info[$this->editSet[2]])."'><img src='./images/editlink.gif'/></a>";
								echo "</td>";
							}
							for($j=0;$j<sizeof($showList);$j++){
								echo "<td class='".($showMobileField[$j]=='false'?"hidden-xs":"")."' align='".($showAlign[$j]==""?"left":$showAlign[$j])."' style='".$style_l."'>";
								//print_r($info);
								if($showAlign[$j]=="" || strtolower($showAlign[$j])=="left")
									echo "&nbsp;";
								if(isset($showLink[$j]) && $showLink[$j]!="") 
									//echo "<a href='".$showLink[$j].$info['id']."'>";
								echo "<a href='".$showLink[$j].$info["fdate"]."&strtdate=".$info["tdate"]."&ftrcode=".$info["rcode"]."&level=".$info["level"]."&fmcode=".$info["mcode"]."&cmc=".$info["mcode"]."&sano=".$info["ssss"]."'>";
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
					echo "</tbody>";

					if($this->sum==true){
						echo "<tfoot>";
						echo "<tr bgcolor='".($this->allSum==true?"#BBBBBB":"#999999")."'>";
						echo "<td class='hidden-phone'align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>".$wording_lan["tab5"]['3_15']."</td>";						
						for($i=0;$i<sizeof($showList);$i++){
							if($showSumList[$i]==true){							
								echo "<td class='".($showMobileField[$i]=='false'?"hidden-xs":"")."'  align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";
								if($formatList[$i]!="") 
									echo number_format($sumVal[$i],$formatList[$i],'.',',');
								else echo $sumVal[$i];
								echo "&nbsp;</td>";
							}else{
								echo "<td class='".($showMobileField[$i]=='false'?"hidden-xs":"")."'  style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
							}
						}
						echo "</div></tr>";
						if($this->allSum==true){
							echo "<div class='hidden-phone'><tr  bgcolor='#999999'>";
							echo "<td class='hidden-phone' align='right' colspan='".($col-sizeof($showList))."' style='color:#FFFFFF;".$style_b.$style_l."'>จาก</td>";						
							for($i=0;$i<sizeof($showList);$i++){
								if($showSumList[$i]==true){
									echo "<td class='".($showMobileField[$i]=='false'?"hidden-xs":"")."' align='right' style='color:#FFFFFF;".$style_b.$style_l."'>";//.number_format(,2,'.','');
									if($formatList[$i]!="") 
										echo number_format($this->allSumVal[$showList[$i]],$formatList[$i],'.',',');
									else echo $this->allSumVal[$showList[$i]];
									echo "&nbsp;</td>";
								}else{
									echo "<td class='".($showMobileField[$i]=='false'?"hidden-xs":"")."' style='".$style_b.($showSumList[$i-1]!=""?$style_l:"")."'>&nbsp;</td>";
								}
							}
							echo "</tr></div>";
						}
						echo "</tfoot>";
					}

					/*if($this->pageLinkShow['bottom']){
						echo "<tr><td align='center' colspan='".$col."'>";
						$this->pageShow();
						echo "</td></tr>";
					}*/
				
				//end show report
				
				
				echo "</table>";
				echo "</table>";
				echo "</div>";
				echo "<center>";
				$this->pageShow();

						echo "<div><font color='#999999'>";
						echo "".$wording_lan["Display"]." ".($this->cPage==$this->nPage?$this->nInfo-(($this->nPage-1)*$this->lPage):$this->lPage)." ".$wording_lan["Item"]." ".$wording_lan["From"]." ".$this->nInfo." ".$wording_lan["Item"]." ".$wording_lan["Each"]." ".$this->lPage." ".$wording_lan["Item"]."</font></div>";

				echo "</center>";
				echo "<br><br><br><br>";

				}
				break;
		}
	/*	$endtm = date("H:i:s");
		$rs = mysql_query("SELECT TIMEDIFF('$endtm', '$starttm') AS tm ");
		//echo "S[".$starttm."]-E[".$endtm."] ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
		echo "ใช้เวลา [".mysql_result($rs,0,'tm')."]<br>";
	*/	
	}
	public function pageShow(){
		 
		echo '<div style="clear:both;"><br></div>';

		
		
		if($this->cPage!=1){
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&")."pg=1&ord=".$this->order."&srt=".($this->dsort==" DESC "?"DOWN":"UP")."&skey=".$this->cause[0]."&scause=".$this->cause[1]."&lp=".$this->lPage."'><button class='btn'><i class='fa fa-fast-backward'></i></button></a>";
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&")."pg=".($this->cPage-1)."&ord=".$ordr."&srt=".($this->dsort==" DESC "?"DOWN":"UP")."&skey=".$this->cause[0]."&scause=".$this->cause[1]."&lp=".$this->lPage."'><button class='btn  '><i class='fa fa-backward'></i></button></a>";
		}else{ echo "<font color='#999999'><button class='btn '><i class='fa fa-fast-backward'></i></button><button class='btn  '><i class='fa fa-backward'></i></button></font>";}
		
		$pLink = $this->cPage>5?$this->cPage:6;
		$pLink = $this->nPage-5<$pLink?$this->nPage-5:$pLink;
		for($i=($pLink-5);$i<=($pLink+5);$i++){
			if($i==$_GET['pg'])$active="btn-info";
			elseif($_GET['pg']=='' and $i==1)$active="btn-info";
			else $active="";

			if($i>$this->nPage) break;
			if($i<=0) continue;
			if($i==$this->cPage) echo "<b>";
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&")."pg=".$i."&ord=".$this->order."&srt=".($this->dsort==" DESC "?"DOWN":"UP")."&skey=".$this->cause[0]."&scause=".$this->cause[1]."&lp=".$this->lPage."'><button class='btn $active'>$i</button></a>";
			if($i==$this->cPage) echo "</b>";
		}
		
		if($this->cPage!=$this->nPage){
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&")."pg=".($this->cPage+1)."&ord=".$this->order."&srt=".($this->dsort==" DESC "?"DOWN":"UP")."&skey=".$this->cause[0]."&scause=".$this->cause[1]."&lp=".$this->lPage."'><button class='btn '><i class='fa fa-forward '></i></button></a>";
			echo "<a href='".$this->alink."?".($this->alinkarg==""?"":$this->alinkarg."&")."pg=".$this->nPage."&ord=".$this->order."&srt=".($this->dsort==" DESC "?"DOWN":"UP")."&skey=".$this->cause[0]."&scause=".$this->cause[1]."&lp=".$this->lPage."'><button class='btn '><i class='fa fa-fast-forward'></i></button></a>";
		}else{ echo "<font color='#999999'><button class='btn '><i class='fa fa-forward'></i></button><button class='btn'><i class='fa fa-fast-forward'></i></button></font>";}

		echo '
				
				
			</p>';
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
								if(isset($formatList[$j]) && $formatList[$j]!="") 
									fprintf($fp,number_format($info[$showList[$j]],$formatList[$j],'.',','));
								else fprintf($fp,$info[$showList[$j]]);
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
		$param .= "&srt=".($this->dsort==" DESC "?"DOWN":"UP");
		if(isset($this->cause) && sizeof($this->cause)>=2)
			$param .= ($this->cause[0]==""?"":"&scause=".$this->cause[1]."&skey=".$this->cause[0]);
		$param .= "&lp=".$this->lPage;
		return $param;
	}
	public function getSQL($row_flag){
		$start = ($this->cPage-1)*$this->lPage;
		$strwhere = " AND ";
		if(strpos(strtolower($this->qry),"where")===false)
			$strwhere = " WHERE ";
		$ord = $this->order==''?'':(" ORDER BY ".$this->order.$this->dsort);
		$cause = $this->cause[0]==''?'':($strwhere.$this->cause[0]." LIKE '%".$this->cause[1]."%' ");
		if($row_flag=="CALC")
			$sql = "SELECT SQL_CACHE SQL_CALC_FOUND_ROWS ".substr($this->qry,6,strlen($this->qry)).$cause.$ord;
		else
			$sql = $this->qry.$cause.$ord;
		if($this->lPage!="INF")
			return $sql." LIMIT $start , ".$this->lPage." ";
		else
			return $sql;
	}
}

?>