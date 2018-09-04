<?
class chartGenerator{
    private $maxLevel = 3; //default 3
    private $numChild = 0; //default 0 mean Unlimit number of child
    private $redctlink;
    private $emptyredctlink;
    private $dbPrefix;
    private $block = false;
    private $blockCode;

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
    public function setPrefix($prefix){
        $this->dbPrefix = $prefix;
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
        </script>
        <?
    }
    public function setBlock($code){
        $this->blockCode = $code;
        $this->block = true;
    }
    public function upMost($mcode){
        $sql = "SELECT sp_code as sp_code FROM ".$this->dbPrefix."member WHERE mcode='$mcode' LIMIT 1 ";
        $rs = mysql_query($sql);
        if($this->block==true && $mcode==$this->blockCode)
            return $this->blockCode;
        if(mysql_num_rows($rs)>0){
            if($this->block==true && mysql_result($rs,0,'sp_code')==$this->blockCode)
                return $this->blockCode;
            else if(mysql_result($rs,0,'sp_code')=="")
                return $mcode;
            else
                return $this->upMost(mysql_result($rs,0,'sp_code'));
        }else return $mcode;
    }
    public function isUp($scode,$testcode){
        $sql = "SELECT sp_code as sp_code FROM ".$this->dbPrefix."member WHERE mcode='$testcode' LIMIT 1 ";
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs)<=0)
            return false;
        else if(mysql_result($rs,0,'sp_code')!=$scode)
            return $this->isUp($scode,mysql_result($rs,0,'sp_code'));
        else
            return true;
    }
    public function isLine($scode,$testcode){
        $sql = "SELECT sp_code as sp_code FROM ".$this->dbPrefix."member WHERE mcode='$scode' LIMIT 1 ";
        $rs = mysql_query($sql);
        if($scode==$testcode)
            return true;
        if(mysql_num_rows($rs)<=0)
            return false;
        else if(mysql_result($rs,0,'sp_code')!=$testcode)
            return $this->isLine(mysql_result($rs,0,'sp_code'),$testcode);
        else
            return true;
    }
    
    function multitree($mcode,$cm,$maxlv){
		$scr = new memberScore();
        $scr->setPrefix($this->dbPrefix);
        $scr->calc();
        $align_def = array("right","left");
        $sql = "select mcode,name_t,name_b,pos_cur,pos_cur1,pos_cur2,sp_code as sp_code,upa_code from ".$this->dbPrefix."member where sp_code = '$mcode' ";
        $sql2 = "select mcode,name_t,name_b,pos_cur,pos_cur1,pos_cur2,sp_code as sp_code,lr,sp_code as sss,sp_code as sss2,upa_code as upa,upa_name as upan,status_terminate,hpv from ".$this->dbPrefix."member where mcode = '$mcode' ";
        $rs = mysql_query($sql);
        $rs2 = mysql_query($sql2);
		$sqlObj = mysql_fetch_object($rs); 
		$sqlObj2 = mysql_fetch_object($rs2); 
		$csp_code =$sqlObj2->sp_code;

		$sql3 = "select mcode,name_t,name_b,pos_cur,pos_cur1,pos_cur2,sp_code as sp_code,upa_code from ".$this->dbPrefix."member where mcode = '$csp_code' ";
		$rs3 = mysql_query($sql3);
		
		$lr =$sqlObj2->lr;

        if ($sqlObj2->name_b == ''){
            $name_show = $sqlObj2->name_t;
        }else{
            $name_show = $sqlObj2->name_b;
        }
		if(mysql_num_rows($rs3)>0){
			$sqlObj3 = mysql_fetch_object($rs3); 
			if ($sqlObj3->name_b == ''){
				$name_show1 = $sqlObj3->name_t;
			}else{
				$name_show1 = $sqlObj3->name_b;
			}
		}
		
		$lrxx = getlrxxx($this->dbPrefix,$mcode,$csp_code,$lr);
		if($lrxx == '1'){$lr = "����";}
		else if($lrxx == '2'){$lr = "���";}
		else{$lr = "";}

		//if($lr == '1'){$lr = "����";}
		//else if($lr == '2'){$lr = "���";}
        
       // $alt = "onmouseout=\"alt('')\" onmouseover=\"alt('<table><tr><td>ชื่อ<td> : </td></td><td>".$name_show."</td></tr><tr><td>PV สะสม</td><td> : </td><td>".number_format($scr->getAPV($mcode),0,'.',',')."</td></tr><tr><td>HPV</td><td> : </td><td>".number_format($sqlObj2->hpv,0,'.',',')."</td></tr><tr><td>ผู้แนะนำ<td> : </td></td><td>".$sqlObj2->sss."</td></tr><tr><td>���ͼ���й�<td> : </td></td><td>".$name_show1."</td></tr><tr><td>�Ѿ�Ź�<td> : </td></td><td>".$sqlObj2->upa."</td></tr><tr><td>�����Ѿ�Ź�<td> : </td></td><td>".$sqlObj2->upan."</td></tr><tr><td>��ҹ(�Ѿ�Ź�)</td><td> : </td><td>".$lr."</td></tr></table>')\"";
          $alt = "onmouseout=\"alt('')\" onmouseover=\"alt('<table><tr><td>ชื่อ<td> : </td></td><td>".$name_show."</td></tr><tr><td>PV สะสม</td><td> : </td><td>".number_format($scr->getAPV($mcode),0,'.',',')."</td></tr><tr><td>ผู้แนะนำ<td> : </td></td><td>".mysql_result($rs2,0,'sss')."</td></tr><tr><td>อัพไลน์<td> : </td></td><td>".mysql_result($rs2,0,'sss2')."</td></tr></table>')\"";
       
       if(mysql_num_rows($rs)<=0){
            $pos_cur = $sqlObj2->pos_cur; 
            if(empty($pos_cur1))$pos_cur1 = $sqlObj2->pos_cur2;
            if(empty($pos_cur))$pos_cur = $sqlObj2->pos_cur; 
			$status_terminate = $sqlObj2->status_terminate; 
			if($status_terminate == '1'){
				$pos_cur = 'TN';
			}
			if(!empty($pos_cur1)){
				$pppp = $pos_cur1;
			}
			else{
				$pppp = $pos_cur;
			}
            if($this->imgShow)
            echo "<tr><td align='center' ><a $alt href='".$this->redctlink.$mcode."' target='_parent' ><img src='".$this->imgDef[$pppp]."' border='0' width='40px'></a></td></tr>";
            echo "<tr align='center'><td>";
            echo "<table width='60' $alt style='border:#FFFFFF solid 1;' border='0' cellpadding='0' cellspacing='0'><tr><td align='center' style='cursor:pointer;'  onClick='parent.location=\"".$this->redctlink."$mcode\"' bgcolor='".$this->tabUDef[$pos_cur]."'><font color='".$this->txtUDef[$pos_cur]."'>$mcode</font></td></tr>";
            echo "<tr><td align='center' style='cursor:pointer;' onClick='parent.location=\"".$this->redctlink."$mcode\"' bgcolor='".$this->tabDDef[$pos_cur]."'><font color='".$this->txtDDef[$pos_cur]."'>".$name_show."</font></td></tr></table>";
            echo "</td></tr>";
            return;
        }
        if($maxlv<=0){
            if($this->imgShow)
            $pos_cur = $sqlObj2->pos_cur;
            if(empty($pos_cur1))$pos_cur1 = $sqlObj2->pos_cur2; 
            if(empty($pos_cur))$pos_cur =  $sqlObj2->pos_cur;  
            echo "<tr><td align='center' ><a $alt href='".$this->redctlink.$mcode."' target='_parent' ><img src='".$this->imgDef[$pos_cur]."' border='0' width='40px'><img src='".$this->imgDef[$pos_cur1]."' ></a></td></tr>";
            echo "<tr align='center'><td>";
            echo "<table width='40' $alt style='border:#FFFFFF solid 1;' border='0' cellpadding='0' cellspacing='0'><tr><td align='center' style='cursor:pointer;'  onClick='parent.location=\"".$this->redctlink."$mcode\"' bgcolor='".$this->tabUDef[$pos_cur]."'><font color='".$this->txtUDef[$pos_cur]."'>$mcode</font></td></tr>";
            echo "<tr><td align='center' style='cursor:pointer;' onClick='parent.location=\"".$this->redctlink."$mcode\"' bgcolor='".$this->tabDDef[$pos_cur]."'><font color='".$this->txtDDef[$pos_cur]."'>".$name_show."</font></td></tr></table>";
            echo "</td></tr>";
            $sql = "SELECT id FROM ".$this->dbPrefix."member WHERE sp_code='$mcode' ";
            echo "<tr align='center'><td>";
            $rs3 = mysql_query($sql);
            if(mysql_num_rows($rs3)>0){
                echo "<img src='./images/arrow_down.gif'>";
            }
            echo "</td></tr>";
            return;
        }


        if($this->imgShow)
        $pos_cur = $sqlObj2->pos_cur; 
        if(empty($pos_cur1))$pos_cur1 = $sqlObj2->pos_cur2;  
        if(empty($pos_cur))$pos_cur = $sqlObj2->pos_cur; 
		$status_terminate = $sqlObj2->status_terminate; 
			if($status_terminate == '1'){
				$pos_cur = 'TN';
			}
            echo "<tr valign='top' align='center'><td  colspan='".mysql_num_rows($rs)."'>
			<a $alt href='".$this->redctlink.$mcode."' target='_parent' >";
			if($pos_cur != 'TN' and $pos_cur1 <> ''){
				echo "<img src='".$this->imgDef[$pos_cur1]."' border='0' width='40px'> ";
			}else{
				echo "<img src='".$this->imgDef[$pos_cur]."' border='0' width='40px'> ";
			}
			echo "</a></td></tr>";
        //---------text information
        echo "<tr align='center'><td colspan=".mysql_num_rows($rs).">";
        echo "<table width='40' $alt style='border:#FFFFFF solid 1;' border='0' cellpadding='0' cellspacing='0'><tr><td align='center' style='cursor:pointer;'  onClick='parent.location=\"".$this->redctlink."$mcode\"' bgcolor='".$this->tabUDef[$pos_cur]."'><font color='".$this->txtUDef[$pos_cur]."'>$mcode</font></td></tr>";
        echo "<tr><td align='center' style='cursor:pointer;' onClick='parent.location=\"".$this->redctlink."$mcode\"' bgcolor='".$this->tabDDef[$pos_cur]."'><font color='".$this->txtDDef[$pos_cur]."'>".$name_show."</font></td></tr></table>"; //substr($name_show,0,strlen($mcode)-1)
        echo "</td></tr>";
        //--------------------------

        echo "<tr align='center'><td colspan=".mysql_num_rows($rs).">";
        echo "<img src='./images/link_v.gif'></td></tr>";
        echo "<tr valign='top' align='center'>";
        for($i=0;$i<mysql_num_rows($rs);$i++){
            //��˹���êԴ
            if(0==mysql_num_rows($rs)-1)
                echo "<td align='center'>";
            else if($i==0 && $i==mysql_num_rows($rs)-1)
                echo "<td background='./images/link_h.gif' align='center'>";
            else if($i==0)
                echo "<td align='".$align_def[0]."'>";
            else if($i==mysql_num_rows($rs)-1)
                echo "<td align='".$align_def[1]."'>";
            else
                echo "<td background='./images/link_h.gif' align='center'>";
            
            //��˹����    
            if($i==mysql_num_rows($rs)-1 && $i!=0)
                echo "<img src='./images/link_h.gif' width='49%' height='6'>";
            echo "<img src='./images/link_rl.gif'>";
            if($i==0 && $i!=mysql_num_rows($rs)-1)
                echo "<img src='./images/link_h.gif' width='49%' height='6'>";
            echo "</td>";
        }    
        echo "</tr><tr valign='top' align='centerzs'>";
        for($i=0;$i<mysql_num_rows($rs);$i++){
            echo "<td>";
            echo "<table border='0' cellspacing='0' cellpadding='0' align='center'>";
            $this->multitree(mysql_result($rs,$i,'mcode'),$cm,$maxlv-1);
            echo "</table></td>";
        }
        echo "</tr>";
    }
    public function showChart(){
        $this->script();
        $sql = "SELECT *,sp_code as sp_code FROM ".$this->dbPrefix."member WHERE mcode='".$this->startCode."' ";
        $rs = mysql_query($sql);

		$sqlObj = mysql_fetch_object($rs); 
		$xsp_code = $sqlObj->sp_code;

    //$stk_size = 0;
        echo "<div style='position:absolute; left:0; top:0; width:75; height:50;'><fieldset>";
        echo "<table bgcolor='#FFFFFF' width='75'><tr align='center' height='25'><td>&nbsp;";
        if(mysql_result($rs,0,'sp_code')!=""){ //up arrow
            if($this->block==false){ 
                echo "<img src='images/go_dup.gif' border='0' style='cursor:pointer;' ";
                echo "onClick='parent.location.href=\"".$this->redctlink.$this->upMost(mysql_result($rs,0,'sp_code'))."\"' ";
                echo "onmouseover=\"this.src='images/bgo_dup.gif'\" ";
                echo "onmouseout=\"this.src='images/go_dup.gif'\" ";
                echo "alt='�� ".$this->upMost($xsp_code)."' \>";
                
                echo "&nbsp;</td></tr><tr align='center' height='25'><td>&nbsp;";
                
                echo "<img src='images/go_up.gif' border='0' style='cursor:pointer;' ";
                echo "onClick='parent.location.href=\"".$this->redctlink.$xsp_code."\"' ";
                echo "onmouseover=\"this.src='images/bgo_up.gif'\" ";
                echo "onmouseout=\"this.src='images/go_up.gif'\" ";
                echo "alt='�� ".$xsp_code."' \>";
            }else if(!$this->isUp($xsp_code,$this->blockCode)){
                echo "<img src='images/go_dup.gif' border='0' style='cursor:pointer;' ";
                echo "onClick='parent.location.href=\"".$this->redctlink.$this->upMost(mysql_result($rs,0,'sp_code'))."\"' ";
                echo "onmouseover=\"this.src='images/bgo_dup.gif'\" ";
                echo "onmouseout=\"this.src='images/go_dup.gif'\" ";
                echo "alt='�� ".$this->upMost($xsp_code)."' \>";
                
                echo "&nbsp;</td></tr><tr align='center' height='25'><td>&nbsp;";
                
                echo "<img src='images/go_up.gif' border='0' style='cursor:pointer;' ";
                echo "onClick='parent.location.href=\"".$this->redctlink.$xsp_code."\"' ";
                echo "onmouseover=\"this.src='images/bgo_up.gif'\" ";
                echo "onmouseout=\"this.src='images/go_up.gif'\" ";
                echo "alt='�� ".$xsp_code."' \>";
            }else{
                echo "<img src='images/dgo_dup.gif' border='0' \>";
                echo "&nbsp;</td></tr><tr align='center' height='25'><td>&nbsp;";
                echo "<img src='images/dgo_up.gif' border='0' \>";
            }
        }else{
            echo "<img src='images/dgo_dup.gif' border='0' \>";
            echo "&nbsp;</td></tr><tr align='center' height='25'><td>&nbsp;";
            echo "<img src='images/dgo_up.gif' border='0' \>";
        }
        echo "&nbsp;</td></tr></table>";
        echo "</fieldset></div>";
        echo "<div id='clsdivshow' style='position:absolute;' ></div>";
        echo "<table align='center' cellspacing='0' cellpadding='0'  border='0' >";
        $this->multitree($this->startCode,$this->startCode,$this->maxLevel-1);
        echo "</table>";
    }
	
}
function gettotalpv($dbprefix,$mcode){
    $sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ".$dbprefix."special_point WHERE  sa_type='VA' AND mcode='$mcode' group by mcode ";
	//if($mcode == '0000075')echo "$sql3<BR>";
	$rs3=mysql_query($sql3);
	if (mysql_num_rows($rs3)>0) {
		$sqlObj3 = mysql_fetch_object($rs3);
		$total_fv3= $sqlObj3->tot_pv;
	}else{
		$total_fv3=0;
	}
	mysql_free_result($rs3);
	//if($mcode == '0000075')echo "$total_fv3<BR>";
    return $total_fv3;
} 

//class ���Ҥ�ṹ
class memberScore{
    private $dbPrefix = "ali_";
    private $ret_sum_pv;
    private $ret_pcarry;
    public function setPrefix($prefix){
        $this->dbPrefix = $prefix;
    }
    public function calc(){
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
    

             $mm = date("Y-m").'-31';
             $mm1 = date("Ym");
              $mm2 = $end = date("Ym",strtotime("+1 months"));
            $select = "select max(fdate)  as fdate from ali_around where    calc = 1 ";
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

        return $all_Qpv;
    }
    public function getAPV($mcd){
    
        //  $mm = date("yyyy-MM");
            $sql = "SELECT sum(tot_pv) AS all_pv FROM ali_asaleh WHERE mcode='$mcd' and   (sa_type='A' OR sa_type = 'B') and cancel = 0 ";
            //echo $sql;
            $rs = mysql_query($sql);
            $all_Apv = mysql_result($rs,0,'all_pv'); 
            mysql_free_result($rs);

            $sql = "SELECT sum(tot_pv) AS all_pv FROM ali_holdhead WHERE mcode='$mcd'  and (sa_type='A' OR sa_type = 'B') and cancel = 0  ";
        //    echo $sql;
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
function getStatus($mcd,$pos_cur,$state){    
          $mm = date("Ym", strtotime("first day of +$state Month")) ;
            $status = "0";
          $sql = "SELECT pv,pvb,status FROM ali_status WHERE mcode='$mcd' and month_pv = '$mm' ";        
         
            $rs = mysql_query($sql);
            if(mysql_num_rows($rs) > 0){
                $lastpv = mysql_result($rs,0,'pv'); 
                $lastbv = mysql_result($rs,0,'pvb'); 
                $status = mysql_result($rs,0,'status'); 
                mysql_free_result($rs);
            } 
            $no = '�ѧ����ѡ���ʹ';
            $yes = '�ѡ���ʹ����';


            if($status == '0'){
                $status1 = '<font color=#c00000><b>('.$no.'';            
                if($lastbv != 0 )$status1 .= ' ���� '.$lastbv.''; 
                $status1 .= ')</b></font>';
            }
            if($status == '1'){            
                if($status == 1 ){
                $status1 = '<font color=#0000FF><b>('.$yes.'' ;
                $status1 .= ')</b></font>';
                }
            }
    //    echo $state.'s';
        if($state == -1){
                $sql = "SELECT pv,pvb,status FROM ali_status WHERE mcode='$mcd' order by id desc limit 0,1 ";
            //    echo $sql;
                $rs = mysql_query($sql);
                if(mysql_num_rows($rs) > 0){            
                  $lastbv = mysql_result($rs,0,'pvb');                      
                }else{
                  $lastbv = 0;
                }

            $status1 = '<font color=#0000FF><b>'.$lastbv.' PV</b></font>';
        }
        return $status1;
    }
    
    

}


function getlrxxx($dbprefix,$scode,$testcode,$lr){
	$sql = "SELECT upa_code,lr FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
	//echo $sql."<BR>";
	$rs = mysql_query($sql);
	if($scode==$testcode)
		return $lr;
	if(mysql_num_rows($rs)<=0)
		return '';
	else if(mysql_result($rs,0,'upa_code')!=$testcode)
		return getlrxxx($dbprefix,mysql_result($rs,0,'upa_code'),$testcode,mysql_result($rs,0,'lr'));
	else
		return mysql_result($rs,0,'lr');
}
?>