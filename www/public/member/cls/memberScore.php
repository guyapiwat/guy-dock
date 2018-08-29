<?
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
			$name_t[$i] =$sqlObj->name_t;		
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
		//echo $sql;
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$pcarry[$mcode[$i]][1] = $sqlObj->carry_l;
			$pcarry[$mcode[$i]][2] = $sqlObj->carry_r;
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
