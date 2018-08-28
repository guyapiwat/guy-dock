<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTransfersaleH as ChildAliTransfersaleH;
use CciOrm\CciOrm\AliTransfersaleHQuery as ChildAliTransfersaleHQuery;
use CciOrm\CciOrm\Map\AliTransfersaleHTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_transfersale_h' table.
 *
 *
 *
 * @method     ChildAliTransfersaleHQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliTransfersaleHQuery orderBySano1($order = Criteria::ASC) Order by the sano1 column
 * @method     ChildAliTransfersaleHQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliTransfersaleHQuery orderBySctime($order = Criteria::ASC) Order by the sctime column
 * @method     ChildAliTransfersaleHQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliTransfersaleHQuery orderByInvRef($order = Criteria::ASC) Order by the inv_ref column
 * @method     ChildAliTransfersaleHQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliTransfersaleHQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliTransfersaleHQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliTransfersaleHQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliTransfersaleHQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliTransfersaleHQuery orderByTotBv($order = Criteria::ASC) Order by the tot_bv column
 * @method     ChildAliTransfersaleHQuery orderByTotFv($order = Criteria::ASC) Order by the tot_fv column
 * @method     ChildAliTransfersaleHQuery orderByTotWeight($order = Criteria::ASC) Order by the tot_weight column
 * @method     ChildAliTransfersaleHQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliTransfersaleHQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliTransfersaleHQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliTransfersaleHQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliTransfersaleHQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliTransfersaleHQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliTransfersaleHQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliTransfersaleHQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliTransfersaleHQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliTransfersaleHQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliTransfersaleHQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliTransfersaleHQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliTransfersaleHQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliTransfersaleHQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliTransfersaleHQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliTransfersaleHQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliTransfersaleHQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliTransfersaleHQuery orderByChkinternet($order = Criteria::ASC) Order by the chkInternet column
 * @method     ChildAliTransfersaleHQuery orderByChkdiscount($order = Criteria::ASC) Order by the chkDiscount column
 * @method     ChildAliTransfersaleHQuery orderByChkother($order = Criteria::ASC) Order by the chkOther column
 * @method     ChildAliTransfersaleHQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliTransfersaleHQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliTransfersaleHQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliTransfersaleHQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliTransfersaleHQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliTransfersaleHQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliTransfersaleHQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliTransfersaleHQuery orderByTxtinternet($order = Criteria::ASC) Order by the txtInternet column
 * @method     ChildAliTransfersaleHQuery orderByTxtdiscount($order = Criteria::ASC) Order by the txtDiscount column
 * @method     ChildAliTransfersaleHQuery orderByTxtother($order = Criteria::ASC) Order by the txtOther column
 * @method     ChildAliTransfersaleHQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliTransfersaleHQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliTransfersaleHQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliTransfersaleHQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliTransfersaleHQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliTransfersaleHQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliTransfersaleHQuery orderByOptioninternet($order = Criteria::ASC) Order by the optionInternet column
 * @method     ChildAliTransfersaleHQuery orderByOptiondiscount($order = Criteria::ASC) Order by the optionDiscount column
 * @method     ChildAliTransfersaleHQuery orderByOptionother($order = Criteria::ASC) Order by the optionOther column
 * @method     ChildAliTransfersaleHQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildAliTransfersaleHQuery orderByPrint($order = Criteria::ASC) Order by the print column
 * @method     ChildAliTransfersaleHQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliTransfersaleHQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliTransfersaleHQuery orderByIpay($order = Criteria::ASC) Order by the ipay column
 * @method     ChildAliTransfersaleHQuery orderByPayType($order = Criteria::ASC) Order by the pay_type column
 * @method     ChildAliTransfersaleHQuery orderByHcancel($order = Criteria::ASC) Order by the hcancel column
 * @method     ChildAliTransfersaleHQuery orderByCaddress($order = Criteria::ASC) Order by the caddress column
 * @method     ChildAliTransfersaleHQuery orderByCdistrictid($order = Criteria::ASC) Order by the cdistrictId column
 * @method     ChildAliTransfersaleHQuery orderByCamphurid($order = Criteria::ASC) Order by the camphurId column
 * @method     ChildAliTransfersaleHQuery orderByCprovinceid($order = Criteria::ASC) Order by the cprovinceId column
 * @method     ChildAliTransfersaleHQuery orderByCzip($order = Criteria::ASC) Order by the czip column
 * @method     ChildAliTransfersaleHQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method     ChildAliTransfersaleHQuery orderBySenderDate($order = Criteria::ASC) Order by the sender_date column
 * @method     ChildAliTransfersaleHQuery orderByReceive($order = Criteria::ASC) Order by the receive column
 * @method     ChildAliTransfersaleHQuery orderByReceiveDate($order = Criteria::ASC) Order by the receive_date column
 * @method     ChildAliTransfersaleHQuery orderByAsend($order = Criteria::ASC) Order by the asend column
 * @method     ChildAliTransfersaleHQuery orderByAtoType($order = Criteria::ASC) Order by the ato_type column
 * @method     ChildAliTransfersaleHQuery orderByAtoId($order = Criteria::ASC) Order by the ato_id column
 * @method     ChildAliTransfersaleHQuery orderByOnline($order = Criteria::ASC) Order by the online column
 * @method     ChildAliTransfersaleHQuery orderByHpv($order = Criteria::ASC) Order by the hpv column
 * @method     ChildAliTransfersaleHQuery orderByHtotal($order = Criteria::ASC) Order by the htotal column
 * @method     ChildAliTransfersaleHQuery orderByHdate($order = Criteria::ASC) Order by the hdate column
 * @method     ChildAliTransfersaleHQuery orderByScheck($order = Criteria::ASC) Order by the scheck column
 * @method     ChildAliTransfersaleHQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliTransfersaleHQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliTransfersaleHQuery orderByBmcauto($order = Criteria::ASC) Order by the bmcauto column
 * @method     ChildAliTransfersaleHQuery orderByTranstype($order = Criteria::ASC) Order by the transtype column
 * @method     ChildAliTransfersaleHQuery orderByPaytype($order = Criteria::ASC) Order by the paytype column
 * @method     ChildAliTransfersaleHQuery orderBySendtype($order = Criteria::ASC) Order by the sendtype column
 * @method     ChildAliTransfersaleHQuery orderByCredittype($order = Criteria::ASC) Order by the credittype column
 * @method     ChildAliTransfersaleHQuery orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliTransfersaleHQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliTransfersaleHQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliTransfersaleHQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliTransfersaleHQuery orderByCname($order = Criteria::ASC) Order by the cname column
 * @method     ChildAliTransfersaleHQuery orderByCmobile($order = Criteria::ASC) Order by the cmobile column
 * @method     ChildAliTransfersaleHQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 *
 * @method     ChildAliTransfersaleHQuery groupBySano() Group by the sano column
 * @method     ChildAliTransfersaleHQuery groupBySano1() Group by the sano1 column
 * @method     ChildAliTransfersaleHQuery groupBySadate() Group by the sadate column
 * @method     ChildAliTransfersaleHQuery groupBySctime() Group by the sctime column
 * @method     ChildAliTransfersaleHQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliTransfersaleHQuery groupByInvRef() Group by the inv_ref column
 * @method     ChildAliTransfersaleHQuery groupByMcode() Group by the mcode column
 * @method     ChildAliTransfersaleHQuery groupByNameF() Group by the name_f column
 * @method     ChildAliTransfersaleHQuery groupByNameT() Group by the name_t column
 * @method     ChildAliTransfersaleHQuery groupByTotal() Group by the total column
 * @method     ChildAliTransfersaleHQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliTransfersaleHQuery groupByTotBv() Group by the tot_bv column
 * @method     ChildAliTransfersaleHQuery groupByTotFv() Group by the tot_fv column
 * @method     ChildAliTransfersaleHQuery groupByTotWeight() Group by the tot_weight column
 * @method     ChildAliTransfersaleHQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliTransfersaleHQuery groupByRemark() Group by the remark column
 * @method     ChildAliTransfersaleHQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliTransfersaleHQuery groupById() Group by the id column
 * @method     ChildAliTransfersaleHQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliTransfersaleHQuery groupByUid() Group by the uid column
 * @method     ChildAliTransfersaleHQuery groupByLid() Group by the lid column
 * @method     ChildAliTransfersaleHQuery groupByDl() Group by the dl column
 * @method     ChildAliTransfersaleHQuery groupByCancel() Group by the cancel column
 * @method     ChildAliTransfersaleHQuery groupBySend() Group by the send column
 * @method     ChildAliTransfersaleHQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliTransfersaleHQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliTransfersaleHQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliTransfersaleHQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliTransfersaleHQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliTransfersaleHQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliTransfersaleHQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliTransfersaleHQuery groupByChkinternet() Group by the chkInternet column
 * @method     ChildAliTransfersaleHQuery groupByChkdiscount() Group by the chkDiscount column
 * @method     ChildAliTransfersaleHQuery groupByChkother() Group by the chkOther column
 * @method     ChildAliTransfersaleHQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliTransfersaleHQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliTransfersaleHQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliTransfersaleHQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliTransfersaleHQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliTransfersaleHQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliTransfersaleHQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliTransfersaleHQuery groupByTxtinternet() Group by the txtInternet column
 * @method     ChildAliTransfersaleHQuery groupByTxtdiscount() Group by the txtDiscount column
 * @method     ChildAliTransfersaleHQuery groupByTxtother() Group by the txtOther column
 * @method     ChildAliTransfersaleHQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliTransfersaleHQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliTransfersaleHQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliTransfersaleHQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliTransfersaleHQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliTransfersaleHQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliTransfersaleHQuery groupByOptioninternet() Group by the optionInternet column
 * @method     ChildAliTransfersaleHQuery groupByOptiondiscount() Group by the optionDiscount column
 * @method     ChildAliTransfersaleHQuery groupByOptionother() Group by the optionOther column
 * @method     ChildAliTransfersaleHQuery groupByDiscount() Group by the discount column
 * @method     ChildAliTransfersaleHQuery groupByPrint() Group by the print column
 * @method     ChildAliTransfersaleHQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliTransfersaleHQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliTransfersaleHQuery groupByIpay() Group by the ipay column
 * @method     ChildAliTransfersaleHQuery groupByPayType() Group by the pay_type column
 * @method     ChildAliTransfersaleHQuery groupByHcancel() Group by the hcancel column
 * @method     ChildAliTransfersaleHQuery groupByCaddress() Group by the caddress column
 * @method     ChildAliTransfersaleHQuery groupByCdistrictid() Group by the cdistrictId column
 * @method     ChildAliTransfersaleHQuery groupByCamphurid() Group by the camphurId column
 * @method     ChildAliTransfersaleHQuery groupByCprovinceid() Group by the cprovinceId column
 * @method     ChildAliTransfersaleHQuery groupByCzip() Group by the czip column
 * @method     ChildAliTransfersaleHQuery groupBySender() Group by the sender column
 * @method     ChildAliTransfersaleHQuery groupBySenderDate() Group by the sender_date column
 * @method     ChildAliTransfersaleHQuery groupByReceive() Group by the receive column
 * @method     ChildAliTransfersaleHQuery groupByReceiveDate() Group by the receive_date column
 * @method     ChildAliTransfersaleHQuery groupByAsend() Group by the asend column
 * @method     ChildAliTransfersaleHQuery groupByAtoType() Group by the ato_type column
 * @method     ChildAliTransfersaleHQuery groupByAtoId() Group by the ato_id column
 * @method     ChildAliTransfersaleHQuery groupByOnline() Group by the online column
 * @method     ChildAliTransfersaleHQuery groupByHpv() Group by the hpv column
 * @method     ChildAliTransfersaleHQuery groupByHtotal() Group by the htotal column
 * @method     ChildAliTransfersaleHQuery groupByHdate() Group by the hdate column
 * @method     ChildAliTransfersaleHQuery groupByScheck() Group by the scheck column
 * @method     ChildAliTransfersaleHQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliTransfersaleHQuery groupByRcode() Group by the rcode column
 * @method     ChildAliTransfersaleHQuery groupByBmcauto() Group by the bmcauto column
 * @method     ChildAliTransfersaleHQuery groupByTranstype() Group by the transtype column
 * @method     ChildAliTransfersaleHQuery groupByPaytype() Group by the paytype column
 * @method     ChildAliTransfersaleHQuery groupBySendtype() Group by the sendtype column
 * @method     ChildAliTransfersaleHQuery groupByCredittype() Group by the credittype column
 * @method     ChildAliTransfersaleHQuery groupByPaydate() Group by the paydate column
 * @method     ChildAliTransfersaleHQuery groupByBprice() Group by the bprice column
 * @method     ChildAliTransfersaleHQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliTransfersaleHQuery groupByMbase() Group by the mbase column
 * @method     ChildAliTransfersaleHQuery groupByCname() Group by the cname column
 * @method     ChildAliTransfersaleHQuery groupByCmobile() Group by the cmobile column
 * @method     ChildAliTransfersaleHQuery groupByCrate() Group by the crate column
 *
 * @method     ChildAliTransfersaleHQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliTransfersaleHQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliTransfersaleHQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliTransfersaleHQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliTransfersaleHQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliTransfersaleHQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliTransfersaleH findOne(ConnectionInterface $con = null) Return the first ChildAliTransfersaleH matching the query
 * @method     ChildAliTransfersaleH findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliTransfersaleH matching the query, or a new ChildAliTransfersaleH object populated from the query conditions when no match is found
 *
 * @method     ChildAliTransfersaleH findOneBySano(string $sano) Return the first ChildAliTransfersaleH filtered by the sano column
 * @method     ChildAliTransfersaleH findOneBySano1(string $sano1) Return the first ChildAliTransfersaleH filtered by the sano1 column
 * @method     ChildAliTransfersaleH findOneBySadate(string $sadate) Return the first ChildAliTransfersaleH filtered by the sadate column
 * @method     ChildAliTransfersaleH findOneBySctime(string $sctime) Return the first ChildAliTransfersaleH filtered by the sctime column
 * @method     ChildAliTransfersaleH findOneByInvCode(string $inv_code) Return the first ChildAliTransfersaleH filtered by the inv_code column
 * @method     ChildAliTransfersaleH findOneByInvRef(string $inv_ref) Return the first ChildAliTransfersaleH filtered by the inv_ref column
 * @method     ChildAliTransfersaleH findOneByMcode(string $mcode) Return the first ChildAliTransfersaleH filtered by the mcode column
 * @method     ChildAliTransfersaleH findOneByNameF(string $name_f) Return the first ChildAliTransfersaleH filtered by the name_f column
 * @method     ChildAliTransfersaleH findOneByNameT(string $name_t) Return the first ChildAliTransfersaleH filtered by the name_t column
 * @method     ChildAliTransfersaleH findOneByTotal(string $total) Return the first ChildAliTransfersaleH filtered by the total column
 * @method     ChildAliTransfersaleH findOneByTotPv(string $tot_pv) Return the first ChildAliTransfersaleH filtered by the tot_pv column
 * @method     ChildAliTransfersaleH findOneByTotBv(string $tot_bv) Return the first ChildAliTransfersaleH filtered by the tot_bv column
 * @method     ChildAliTransfersaleH findOneByTotFv(string $tot_fv) Return the first ChildAliTransfersaleH filtered by the tot_fv column
 * @method     ChildAliTransfersaleH findOneByTotWeight(string $tot_weight) Return the first ChildAliTransfersaleH filtered by the tot_weight column
 * @method     ChildAliTransfersaleH findOneByUsercode(string $usercode) Return the first ChildAliTransfersaleH filtered by the usercode column
 * @method     ChildAliTransfersaleH findOneByRemark(string $remark) Return the first ChildAliTransfersaleH filtered by the remark column
 * @method     ChildAliTransfersaleH findOneByTrnf(int $trnf) Return the first ChildAliTransfersaleH filtered by the trnf column
 * @method     ChildAliTransfersaleH findOneById(int $id) Return the first ChildAliTransfersaleH filtered by the id column
 * @method     ChildAliTransfersaleH findOneBySaType(string $sa_type) Return the first ChildAliTransfersaleH filtered by the sa_type column
 * @method     ChildAliTransfersaleH findOneByUid(string $uid) Return the first ChildAliTransfersaleH filtered by the uid column
 * @method     ChildAliTransfersaleH findOneByLid(string $lid) Return the first ChildAliTransfersaleH filtered by the lid column
 * @method     ChildAliTransfersaleH findOneByDl(string $dl) Return the first ChildAliTransfersaleH filtered by the dl column
 * @method     ChildAliTransfersaleH findOneByCancel(int $cancel) Return the first ChildAliTransfersaleH filtered by the cancel column
 * @method     ChildAliTransfersaleH findOneBySend(int $send) Return the first ChildAliTransfersaleH filtered by the send column
 * @method     ChildAliTransfersaleH findOneByTxtoption(string $txtoption) Return the first ChildAliTransfersaleH filtered by the txtoption column
 * @method     ChildAliTransfersaleH findOneByChkcash(string $chkCash) Return the first ChildAliTransfersaleH filtered by the chkCash column
 * @method     ChildAliTransfersaleH findOneByChkfuture(string $chkFuture) Return the first ChildAliTransfersaleH filtered by the chkFuture column
 * @method     ChildAliTransfersaleH findOneByChktransfer(string $chkTransfer) Return the first ChildAliTransfersaleH filtered by the chkTransfer column
 * @method     ChildAliTransfersaleH findOneByChkcredit1(string $chkCredit1) Return the first ChildAliTransfersaleH filtered by the chkCredit1 column
 * @method     ChildAliTransfersaleH findOneByChkcredit2(string $chkCredit2) Return the first ChildAliTransfersaleH filtered by the chkCredit2 column
 * @method     ChildAliTransfersaleH findOneByChkcredit3(string $chkCredit3) Return the first ChildAliTransfersaleH filtered by the chkCredit3 column
 * @method     ChildAliTransfersaleH findOneByChkinternet(string $chkInternet) Return the first ChildAliTransfersaleH filtered by the chkInternet column
 * @method     ChildAliTransfersaleH findOneByChkdiscount(string $chkDiscount) Return the first ChildAliTransfersaleH filtered by the chkDiscount column
 * @method     ChildAliTransfersaleH findOneByChkother(string $chkOther) Return the first ChildAliTransfersaleH filtered by the chkOther column
 * @method     ChildAliTransfersaleH findOneByTxtcash(string $txtCash) Return the first ChildAliTransfersaleH filtered by the txtCash column
 * @method     ChildAliTransfersaleH findOneByTxtfuture(string $txtFuture) Return the first ChildAliTransfersaleH filtered by the txtFuture column
 * @method     ChildAliTransfersaleH findOneByTxttransfer(string $txtTransfer) Return the first ChildAliTransfersaleH filtered by the txtTransfer column
 * @method     ChildAliTransfersaleH findOneByEwallet(string $ewallet) Return the first ChildAliTransfersaleH filtered by the ewallet column
 * @method     ChildAliTransfersaleH findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliTransfersaleH filtered by the txtCredit1 column
 * @method     ChildAliTransfersaleH findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliTransfersaleH filtered by the txtCredit2 column
 * @method     ChildAliTransfersaleH findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliTransfersaleH filtered by the txtCredit3 column
 * @method     ChildAliTransfersaleH findOneByTxtinternet(string $txtInternet) Return the first ChildAliTransfersaleH filtered by the txtInternet column
 * @method     ChildAliTransfersaleH findOneByTxtdiscount(string $txtDiscount) Return the first ChildAliTransfersaleH filtered by the txtDiscount column
 * @method     ChildAliTransfersaleH findOneByTxtother(string $txtOther) Return the first ChildAliTransfersaleH filtered by the txtOther column
 * @method     ChildAliTransfersaleH findOneByOptioncash(string $optionCash) Return the first ChildAliTransfersaleH filtered by the optionCash column
 * @method     ChildAliTransfersaleH findOneByOptionfuture(string $optionFuture) Return the first ChildAliTransfersaleH filtered by the optionFuture column
 * @method     ChildAliTransfersaleH findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliTransfersaleH filtered by the optionTransfer column
 * @method     ChildAliTransfersaleH findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliTransfersaleH filtered by the optionCredit1 column
 * @method     ChildAliTransfersaleH findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliTransfersaleH filtered by the optionCredit2 column
 * @method     ChildAliTransfersaleH findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliTransfersaleH filtered by the optionCredit3 column
 * @method     ChildAliTransfersaleH findOneByOptioninternet(string $optionInternet) Return the first ChildAliTransfersaleH filtered by the optionInternet column
 * @method     ChildAliTransfersaleH findOneByOptiondiscount(string $optionDiscount) Return the first ChildAliTransfersaleH filtered by the optionDiscount column
 * @method     ChildAliTransfersaleH findOneByOptionother(string $optionOther) Return the first ChildAliTransfersaleH filtered by the optionOther column
 * @method     ChildAliTransfersaleH findOneByDiscount(string $discount) Return the first ChildAliTransfersaleH filtered by the discount column
 * @method     ChildAliTransfersaleH findOneByPrint(int $print) Return the first ChildAliTransfersaleH filtered by the print column
 * @method     ChildAliTransfersaleH findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliTransfersaleH filtered by the ewallet_before column
 * @method     ChildAliTransfersaleH findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliTransfersaleH filtered by the ewallet_after column
 * @method     ChildAliTransfersaleH findOneByIpay(string $ipay) Return the first ChildAliTransfersaleH filtered by the ipay column
 * @method     ChildAliTransfersaleH findOneByPayType(string $pay_type) Return the first ChildAliTransfersaleH filtered by the pay_type column
 * @method     ChildAliTransfersaleH findOneByHcancel(int $hcancel) Return the first ChildAliTransfersaleH filtered by the hcancel column
 * @method     ChildAliTransfersaleH findOneByCaddress(string $caddress) Return the first ChildAliTransfersaleH filtered by the caddress column
 * @method     ChildAliTransfersaleH findOneByCdistrictid(string $cdistrictId) Return the first ChildAliTransfersaleH filtered by the cdistrictId column
 * @method     ChildAliTransfersaleH findOneByCamphurid(string $camphurId) Return the first ChildAliTransfersaleH filtered by the camphurId column
 * @method     ChildAliTransfersaleH findOneByCprovinceid(string $cprovinceId) Return the first ChildAliTransfersaleH filtered by the cprovinceId column
 * @method     ChildAliTransfersaleH findOneByCzip(string $czip) Return the first ChildAliTransfersaleH filtered by the czip column
 * @method     ChildAliTransfersaleH findOneBySender(int $sender) Return the first ChildAliTransfersaleH filtered by the sender column
 * @method     ChildAliTransfersaleH findOneBySenderDate(string $sender_date) Return the first ChildAliTransfersaleH filtered by the sender_date column
 * @method     ChildAliTransfersaleH findOneByReceive(int $receive) Return the first ChildAliTransfersaleH filtered by the receive column
 * @method     ChildAliTransfersaleH findOneByReceiveDate(string $receive_date) Return the first ChildAliTransfersaleH filtered by the receive_date column
 * @method     ChildAliTransfersaleH findOneByAsend(int $asend) Return the first ChildAliTransfersaleH filtered by the asend column
 * @method     ChildAliTransfersaleH findOneByAtoType(int $ato_type) Return the first ChildAliTransfersaleH filtered by the ato_type column
 * @method     ChildAliTransfersaleH findOneByAtoId(int $ato_id) Return the first ChildAliTransfersaleH filtered by the ato_id column
 * @method     ChildAliTransfersaleH findOneByOnline(int $online) Return the first ChildAliTransfersaleH filtered by the online column
 * @method     ChildAliTransfersaleH findOneByHpv(string $hpv) Return the first ChildAliTransfersaleH filtered by the hpv column
 * @method     ChildAliTransfersaleH findOneByHtotal(string $htotal) Return the first ChildAliTransfersaleH filtered by the htotal column
 * @method     ChildAliTransfersaleH findOneByHdate(string $hdate) Return the first ChildAliTransfersaleH filtered by the hdate column
 * @method     ChildAliTransfersaleH findOneByScheck(string $scheck) Return the first ChildAliTransfersaleH filtered by the scheck column
 * @method     ChildAliTransfersaleH findOneByCheckportal(int $checkportal) Return the first ChildAliTransfersaleH filtered by the checkportal column
 * @method     ChildAliTransfersaleH findOneByRcode(int $rcode) Return the first ChildAliTransfersaleH filtered by the rcode column
 * @method     ChildAliTransfersaleH findOneByBmcauto(int $bmcauto) Return the first ChildAliTransfersaleH filtered by the bmcauto column
 * @method     ChildAliTransfersaleH findOneByTranstype(int $transtype) Return the first ChildAliTransfersaleH filtered by the transtype column
 * @method     ChildAliTransfersaleH findOneByPaytype(int $paytype) Return the first ChildAliTransfersaleH filtered by the paytype column
 * @method     ChildAliTransfersaleH findOneBySendtype(int $sendtype) Return the first ChildAliTransfersaleH filtered by the sendtype column
 * @method     ChildAliTransfersaleH findOneByCredittype(int $credittype) Return the first ChildAliTransfersaleH filtered by the credittype column
 * @method     ChildAliTransfersaleH findOneByPaydate(string $paydate) Return the first ChildAliTransfersaleH filtered by the paydate column
 * @method     ChildAliTransfersaleH findOneByBprice(string $bprice) Return the first ChildAliTransfersaleH filtered by the bprice column
 * @method     ChildAliTransfersaleH findOneByLocationbase(int $locationbase) Return the first ChildAliTransfersaleH filtered by the locationbase column
 * @method     ChildAliTransfersaleH findOneByMbase(string $mbase) Return the first ChildAliTransfersaleH filtered by the mbase column
 * @method     ChildAliTransfersaleH findOneByCname(string $cname) Return the first ChildAliTransfersaleH filtered by the cname column
 * @method     ChildAliTransfersaleH findOneByCmobile(string $cmobile) Return the first ChildAliTransfersaleH filtered by the cmobile column
 * @method     ChildAliTransfersaleH findOneByCrate(string $crate) Return the first ChildAliTransfersaleH filtered by the crate column *

 * @method     ChildAliTransfersaleH requirePk($key, ConnectionInterface $con = null) Return the ChildAliTransfersaleH by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOne(ConnectionInterface $con = null) Return the first ChildAliTransfersaleH matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTransfersaleH requireOneBySano(string $sano) Return the first ChildAliTransfersaleH filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneBySano1(string $sano1) Return the first ChildAliTransfersaleH filtered by the sano1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneBySadate(string $sadate) Return the first ChildAliTransfersaleH filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneBySctime(string $sctime) Return the first ChildAliTransfersaleH filtered by the sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByInvCode(string $inv_code) Return the first ChildAliTransfersaleH filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByInvRef(string $inv_ref) Return the first ChildAliTransfersaleH filtered by the inv_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByMcode(string $mcode) Return the first ChildAliTransfersaleH filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByNameF(string $name_f) Return the first ChildAliTransfersaleH filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByNameT(string $name_t) Return the first ChildAliTransfersaleH filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTotal(string $total) Return the first ChildAliTransfersaleH filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTotPv(string $tot_pv) Return the first ChildAliTransfersaleH filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTotBv(string $tot_bv) Return the first ChildAliTransfersaleH filtered by the tot_bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTotFv(string $tot_fv) Return the first ChildAliTransfersaleH filtered by the tot_fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTotWeight(string $tot_weight) Return the first ChildAliTransfersaleH filtered by the tot_weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByUsercode(string $usercode) Return the first ChildAliTransfersaleH filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByRemark(string $remark) Return the first ChildAliTransfersaleH filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTrnf(int $trnf) Return the first ChildAliTransfersaleH filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneById(int $id) Return the first ChildAliTransfersaleH filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneBySaType(string $sa_type) Return the first ChildAliTransfersaleH filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByUid(string $uid) Return the first ChildAliTransfersaleH filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByLid(string $lid) Return the first ChildAliTransfersaleH filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByDl(string $dl) Return the first ChildAliTransfersaleH filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByCancel(int $cancel) Return the first ChildAliTransfersaleH filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneBySend(int $send) Return the first ChildAliTransfersaleH filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTxtoption(string $txtoption) Return the first ChildAliTransfersaleH filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByChkcash(string $chkCash) Return the first ChildAliTransfersaleH filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByChkfuture(string $chkFuture) Return the first ChildAliTransfersaleH filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByChktransfer(string $chkTransfer) Return the first ChildAliTransfersaleH filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliTransfersaleH filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliTransfersaleH filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliTransfersaleH filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByChkinternet(string $chkInternet) Return the first ChildAliTransfersaleH filtered by the chkInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByChkdiscount(string $chkDiscount) Return the first ChildAliTransfersaleH filtered by the chkDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByChkother(string $chkOther) Return the first ChildAliTransfersaleH filtered by the chkOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTxtcash(string $txtCash) Return the first ChildAliTransfersaleH filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTxtfuture(string $txtFuture) Return the first ChildAliTransfersaleH filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliTransfersaleH filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByEwallet(string $ewallet) Return the first ChildAliTransfersaleH filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliTransfersaleH filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliTransfersaleH filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliTransfersaleH filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTxtinternet(string $txtInternet) Return the first ChildAliTransfersaleH filtered by the txtInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTxtdiscount(string $txtDiscount) Return the first ChildAliTransfersaleH filtered by the txtDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTxtother(string $txtOther) Return the first ChildAliTransfersaleH filtered by the txtOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByOptioncash(string $optionCash) Return the first ChildAliTransfersaleH filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByOptionfuture(string $optionFuture) Return the first ChildAliTransfersaleH filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliTransfersaleH filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliTransfersaleH filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliTransfersaleH filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliTransfersaleH filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByOptioninternet(string $optionInternet) Return the first ChildAliTransfersaleH filtered by the optionInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByOptiondiscount(string $optionDiscount) Return the first ChildAliTransfersaleH filtered by the optionDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByOptionother(string $optionOther) Return the first ChildAliTransfersaleH filtered by the optionOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByDiscount(string $discount) Return the first ChildAliTransfersaleH filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByPrint(int $print) Return the first ChildAliTransfersaleH filtered by the print column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliTransfersaleH filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliTransfersaleH filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByIpay(string $ipay) Return the first ChildAliTransfersaleH filtered by the ipay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByPayType(string $pay_type) Return the first ChildAliTransfersaleH filtered by the pay_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByHcancel(int $hcancel) Return the first ChildAliTransfersaleH filtered by the hcancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByCaddress(string $caddress) Return the first ChildAliTransfersaleH filtered by the caddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByCdistrictid(string $cdistrictId) Return the first ChildAliTransfersaleH filtered by the cdistrictId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByCamphurid(string $camphurId) Return the first ChildAliTransfersaleH filtered by the camphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByCprovinceid(string $cprovinceId) Return the first ChildAliTransfersaleH filtered by the cprovinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByCzip(string $czip) Return the first ChildAliTransfersaleH filtered by the czip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneBySender(int $sender) Return the first ChildAliTransfersaleH filtered by the sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneBySenderDate(string $sender_date) Return the first ChildAliTransfersaleH filtered by the sender_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByReceive(int $receive) Return the first ChildAliTransfersaleH filtered by the receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByReceiveDate(string $receive_date) Return the first ChildAliTransfersaleH filtered by the receive_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByAsend(int $asend) Return the first ChildAliTransfersaleH filtered by the asend column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByAtoType(int $ato_type) Return the first ChildAliTransfersaleH filtered by the ato_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByAtoId(int $ato_id) Return the first ChildAliTransfersaleH filtered by the ato_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByOnline(int $online) Return the first ChildAliTransfersaleH filtered by the online column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByHpv(string $hpv) Return the first ChildAliTransfersaleH filtered by the hpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByHtotal(string $htotal) Return the first ChildAliTransfersaleH filtered by the htotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByHdate(string $hdate) Return the first ChildAliTransfersaleH filtered by the hdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByScheck(string $scheck) Return the first ChildAliTransfersaleH filtered by the scheck column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByCheckportal(int $checkportal) Return the first ChildAliTransfersaleH filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByRcode(int $rcode) Return the first ChildAliTransfersaleH filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByBmcauto(int $bmcauto) Return the first ChildAliTransfersaleH filtered by the bmcauto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByTranstype(int $transtype) Return the first ChildAliTransfersaleH filtered by the transtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByPaytype(int $paytype) Return the first ChildAliTransfersaleH filtered by the paytype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneBySendtype(int $sendtype) Return the first ChildAliTransfersaleH filtered by the sendtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByCredittype(int $credittype) Return the first ChildAliTransfersaleH filtered by the credittype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByPaydate(string $paydate) Return the first ChildAliTransfersaleH filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByBprice(string $bprice) Return the first ChildAliTransfersaleH filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByLocationbase(int $locationbase) Return the first ChildAliTransfersaleH filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByMbase(string $mbase) Return the first ChildAliTransfersaleH filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByCname(string $cname) Return the first ChildAliTransfersaleH filtered by the cname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByCmobile(string $cmobile) Return the first ChildAliTransfersaleH filtered by the cmobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleH requireOneByCrate(string $crate) Return the first ChildAliTransfersaleH filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTransfersaleH[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliTransfersaleH objects based on current ModelCriteria
 * @method     ChildAliTransfersaleH[]|ObjectCollection findBySano(string $sano) Return ChildAliTransfersaleH objects filtered by the sano column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findBySano1(string $sano1) Return ChildAliTransfersaleH objects filtered by the sano1 column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findBySadate(string $sadate) Return ChildAliTransfersaleH objects filtered by the sadate column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findBySctime(string $sctime) Return ChildAliTransfersaleH objects filtered by the sctime column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliTransfersaleH objects filtered by the inv_code column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByInvRef(string $inv_ref) Return ChildAliTransfersaleH objects filtered by the inv_ref column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByMcode(string $mcode) Return ChildAliTransfersaleH objects filtered by the mcode column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByNameF(string $name_f) Return ChildAliTransfersaleH objects filtered by the name_f column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByNameT(string $name_t) Return ChildAliTransfersaleH objects filtered by the name_t column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTotal(string $total) Return ChildAliTransfersaleH objects filtered by the total column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliTransfersaleH objects filtered by the tot_pv column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTotBv(string $tot_bv) Return ChildAliTransfersaleH objects filtered by the tot_bv column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTotFv(string $tot_fv) Return ChildAliTransfersaleH objects filtered by the tot_fv column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTotWeight(string $tot_weight) Return ChildAliTransfersaleH objects filtered by the tot_weight column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliTransfersaleH objects filtered by the usercode column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByRemark(string $remark) Return ChildAliTransfersaleH objects filtered by the remark column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTrnf(int $trnf) Return ChildAliTransfersaleH objects filtered by the trnf column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findById(int $id) Return ChildAliTransfersaleH objects filtered by the id column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliTransfersaleH objects filtered by the sa_type column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByUid(string $uid) Return ChildAliTransfersaleH objects filtered by the uid column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByLid(string $lid) Return ChildAliTransfersaleH objects filtered by the lid column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByDl(string $dl) Return ChildAliTransfersaleH objects filtered by the dl column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByCancel(int $cancel) Return ChildAliTransfersaleH objects filtered by the cancel column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findBySend(int $send) Return ChildAliTransfersaleH objects filtered by the send column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliTransfersaleH objects filtered by the txtoption column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliTransfersaleH objects filtered by the chkCash column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliTransfersaleH objects filtered by the chkFuture column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliTransfersaleH objects filtered by the chkTransfer column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliTransfersaleH objects filtered by the chkCredit1 column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliTransfersaleH objects filtered by the chkCredit2 column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliTransfersaleH objects filtered by the chkCredit3 column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByChkinternet(string $chkInternet) Return ChildAliTransfersaleH objects filtered by the chkInternet column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByChkdiscount(string $chkDiscount) Return ChildAliTransfersaleH objects filtered by the chkDiscount column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByChkother(string $chkOther) Return ChildAliTransfersaleH objects filtered by the chkOther column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliTransfersaleH objects filtered by the txtCash column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliTransfersaleH objects filtered by the txtFuture column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliTransfersaleH objects filtered by the txtTransfer column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliTransfersaleH objects filtered by the ewallet column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliTransfersaleH objects filtered by the txtCredit1 column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliTransfersaleH objects filtered by the txtCredit2 column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliTransfersaleH objects filtered by the txtCredit3 column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTxtinternet(string $txtInternet) Return ChildAliTransfersaleH objects filtered by the txtInternet column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTxtdiscount(string $txtDiscount) Return ChildAliTransfersaleH objects filtered by the txtDiscount column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTxtother(string $txtOther) Return ChildAliTransfersaleH objects filtered by the txtOther column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliTransfersaleH objects filtered by the optionCash column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliTransfersaleH objects filtered by the optionFuture column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliTransfersaleH objects filtered by the optionTransfer column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliTransfersaleH objects filtered by the optionCredit1 column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliTransfersaleH objects filtered by the optionCredit2 column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliTransfersaleH objects filtered by the optionCredit3 column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByOptioninternet(string $optionInternet) Return ChildAliTransfersaleH objects filtered by the optionInternet column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByOptiondiscount(string $optionDiscount) Return ChildAliTransfersaleH objects filtered by the optionDiscount column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByOptionother(string $optionOther) Return ChildAliTransfersaleH objects filtered by the optionOther column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByDiscount(string $discount) Return ChildAliTransfersaleH objects filtered by the discount column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByPrint(int $print) Return ChildAliTransfersaleH objects filtered by the print column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliTransfersaleH objects filtered by the ewallet_before column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliTransfersaleH objects filtered by the ewallet_after column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByIpay(string $ipay) Return ChildAliTransfersaleH objects filtered by the ipay column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByPayType(string $pay_type) Return ChildAliTransfersaleH objects filtered by the pay_type column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByHcancel(int $hcancel) Return ChildAliTransfersaleH objects filtered by the hcancel column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByCaddress(string $caddress) Return ChildAliTransfersaleH objects filtered by the caddress column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByCdistrictid(string $cdistrictId) Return ChildAliTransfersaleH objects filtered by the cdistrictId column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByCamphurid(string $camphurId) Return ChildAliTransfersaleH objects filtered by the camphurId column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByCprovinceid(string $cprovinceId) Return ChildAliTransfersaleH objects filtered by the cprovinceId column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByCzip(string $czip) Return ChildAliTransfersaleH objects filtered by the czip column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findBySender(int $sender) Return ChildAliTransfersaleH objects filtered by the sender column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findBySenderDate(string $sender_date) Return ChildAliTransfersaleH objects filtered by the sender_date column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByReceive(int $receive) Return ChildAliTransfersaleH objects filtered by the receive column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByReceiveDate(string $receive_date) Return ChildAliTransfersaleH objects filtered by the receive_date column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByAsend(int $asend) Return ChildAliTransfersaleH objects filtered by the asend column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByAtoType(int $ato_type) Return ChildAliTransfersaleH objects filtered by the ato_type column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByAtoId(int $ato_id) Return ChildAliTransfersaleH objects filtered by the ato_id column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByOnline(int $online) Return ChildAliTransfersaleH objects filtered by the online column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByHpv(string $hpv) Return ChildAliTransfersaleH objects filtered by the hpv column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByHtotal(string $htotal) Return ChildAliTransfersaleH objects filtered by the htotal column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByHdate(string $hdate) Return ChildAliTransfersaleH objects filtered by the hdate column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByScheck(string $scheck) Return ChildAliTransfersaleH objects filtered by the scheck column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliTransfersaleH objects filtered by the checkportal column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByRcode(int $rcode) Return ChildAliTransfersaleH objects filtered by the rcode column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByBmcauto(int $bmcauto) Return ChildAliTransfersaleH objects filtered by the bmcauto column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByTranstype(int $transtype) Return ChildAliTransfersaleH objects filtered by the transtype column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByPaytype(int $paytype) Return ChildAliTransfersaleH objects filtered by the paytype column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findBySendtype(int $sendtype) Return ChildAliTransfersaleH objects filtered by the sendtype column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByCredittype(int $credittype) Return ChildAliTransfersaleH objects filtered by the credittype column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliTransfersaleH objects filtered by the paydate column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByBprice(string $bprice) Return ChildAliTransfersaleH objects filtered by the bprice column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliTransfersaleH objects filtered by the locationbase column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByMbase(string $mbase) Return ChildAliTransfersaleH objects filtered by the mbase column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByCname(string $cname) Return ChildAliTransfersaleH objects filtered by the cname column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByCmobile(string $cmobile) Return ChildAliTransfersaleH objects filtered by the cmobile column
 * @method     ChildAliTransfersaleH[]|ObjectCollection findByCrate(string $crate) Return ChildAliTransfersaleH objects filtered by the crate column
 * @method     ChildAliTransfersaleH[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliTransfersaleHQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliTransfersaleHQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliTransfersaleH', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliTransfersaleHQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliTransfersaleHQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliTransfersaleHQuery) {
            return $criteria;
        }
        $query = new ChildAliTransfersaleHQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAliTransfersaleH|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliTransfersaleHTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliTransfersaleHTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAliTransfersaleH A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, sano1, sadate, sctime, inv_code, inv_ref, mcode, name_f, name_t, total, tot_pv, tot_bv, tot_fv, tot_weight, usercode, remark, trnf, id, sa_type, uid, lid, dl, cancel, send, txtoption, chkCash, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkInternet, chkDiscount, chkOther, txtCash, txtFuture, txtTransfer, ewallet, txtCredit1, txtCredit2, txtCredit3, txtInternet, txtDiscount, txtOther, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionInternet, optionDiscount, optionOther, discount, print, ewallet_before, ewallet_after, ipay, pay_type, hcancel, caddress, cdistrictId, camphurId, cprovinceId, czip, sender, sender_date, receive, receive_date, asend, ato_type, ato_id, online, hpv, htotal, hdate, scheck, checkportal, rcode, bmcauto, transtype, paytype, sendtype, credittype, paydate, bprice, locationbase, mbase, cname, cmobile, crate FROM ali_transfersale_h WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAliTransfersaleH $obj */
            $obj = new ChildAliTransfersaleH();
            $obj->hydrate($row);
            AliTransfersaleHTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildAliTransfersaleH|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the sano column
     *
     * Example usage:
     * <code>
     * $query->filterBySano('fooValue');   // WHERE sano = 'fooValue'
     * $query->filterBySano('%fooValue%', Criteria::LIKE); // WHERE sano LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sano The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_SANO, $sano, $comparison);
    }

    /**
     * Filter the query on the sano1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySano1(1234); // WHERE sano1 = 1234
     * $query->filterBySano1(array(12, 34)); // WHERE sano1 IN (12, 34)
     * $query->filterBySano1(array('min' => 12)); // WHERE sano1 > 12
     * </code>
     *
     * @param     mixed $sano1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterBySano1($sano1 = null, $comparison = null)
    {
        if (is_array($sano1)) {
            $useMinMax = false;
            if (isset($sano1['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SANO1, $sano1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sano1['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SANO1, $sano1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_SANO1, $sano1, $comparison);
    }

    /**
     * Filter the query on the sadate column
     *
     * Example usage:
     * <code>
     * $query->filterBySadate('2011-03-14'); // WHERE sadate = '2011-03-14'
     * $query->filterBySadate('now'); // WHERE sadate = '2011-03-14'
     * $query->filterBySadate(array('max' => 'yesterday')); // WHERE sadate > '2011-03-13'
     * </code>
     *
     * @param     mixed $sadate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_SADATE, $sadate, $comparison);
    }

    /**
     * Filter the query on the sctime column
     *
     * Example usage:
     * <code>
     * $query->filterBySctime('2011-03-14'); // WHERE sctime = '2011-03-14'
     * $query->filterBySctime('now'); // WHERE sctime = '2011-03-14'
     * $query->filterBySctime(array('max' => 'yesterday')); // WHERE sctime > '2011-03-13'
     * </code>
     *
     * @param     mixed $sctime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterBySctime($sctime = null, $comparison = null)
    {
        if (is_array($sctime)) {
            $useMinMax = false;
            if (isset($sctime['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SCTIME, $sctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sctime['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SCTIME, $sctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_SCTIME, $sctime, $comparison);
    }

    /**
     * Filter the query on the inv_code column
     *
     * Example usage:
     * <code>
     * $query->filterByInvCode('fooValue');   // WHERE inv_code = 'fooValue'
     * $query->filterByInvCode('%fooValue%', Criteria::LIKE); // WHERE inv_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Filter the query on the inv_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByInvRef('fooValue');   // WHERE inv_ref = 'fooValue'
     * $query->filterByInvRef('%fooValue%', Criteria::LIKE); // WHERE inv_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByInvRef($invRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_INV_REF, $invRef, $comparison);
    }

    /**
     * Filter the query on the mcode column
     *
     * Example usage:
     * <code>
     * $query->filterByMcode('fooValue');   // WHERE mcode = 'fooValue'
     * $query->filterByMcode('%fooValue%', Criteria::LIKE); // WHERE mcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the name_f column
     *
     * Example usage:
     * <code>
     * $query->filterByNameF('fooValue');   // WHERE name_f = 'fooValue'
     * $query->filterByNameF('%fooValue%', Criteria::LIKE); // WHERE name_f LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameF The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_NAME_F, $nameF, $comparison);
    }

    /**
     * Filter the query on the name_t column
     *
     * Example usage:
     * <code>
     * $query->filterByNameT('fooValue');   // WHERE name_t = 'fooValue'
     * $query->filterByNameT('%fooValue%', Criteria::LIKE); // WHERE name_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameT The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_NAME_T, $nameT, $comparison);
    }

    /**
     * Filter the query on the total column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal(1234); // WHERE total = 1234
     * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
     * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
     * </code>
     *
     * @param     mixed $total The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the tot_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotPv(1234); // WHERE tot_pv = 1234
     * $query->filterByTotPv(array(12, 34)); // WHERE tot_pv IN (12, 34)
     * $query->filterByTotPv(array('min' => 12)); // WHERE tot_pv > 12
     * </code>
     *
     * @param     mixed $totPv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOT_PV, $totPv, $comparison);
    }

    /**
     * Filter the query on the tot_bv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotBv(1234); // WHERE tot_bv = 1234
     * $query->filterByTotBv(array(12, 34)); // WHERE tot_bv IN (12, 34)
     * $query->filterByTotBv(array('min' => 12)); // WHERE tot_bv > 12
     * </code>
     *
     * @param     mixed $totBv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTotBv($totBv = null, $comparison = null)
    {
        if (is_array($totBv)) {
            $useMinMax = false;
            if (isset($totBv['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOT_BV, $totBv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totBv['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOT_BV, $totBv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOT_BV, $totBv, $comparison);
    }

    /**
     * Filter the query on the tot_fv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotFv(1234); // WHERE tot_fv = 1234
     * $query->filterByTotFv(array(12, 34)); // WHERE tot_fv IN (12, 34)
     * $query->filterByTotFv(array('min' => 12)); // WHERE tot_fv > 12
     * </code>
     *
     * @param     mixed $totFv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTotFv($totFv = null, $comparison = null)
    {
        if (is_array($totFv)) {
            $useMinMax = false;
            if (isset($totFv['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOT_FV, $totFv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totFv['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOT_FV, $totFv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOT_FV, $totFv, $comparison);
    }

    /**
     * Filter the query on the tot_weight column
     *
     * Example usage:
     * <code>
     * $query->filterByTotWeight(1234); // WHERE tot_weight = 1234
     * $query->filterByTotWeight(array(12, 34)); // WHERE tot_weight IN (12, 34)
     * $query->filterByTotWeight(array('min' => 12)); // WHERE tot_weight > 12
     * </code>
     *
     * @param     mixed $totWeight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTotWeight($totWeight = null, $comparison = null)
    {
        if (is_array($totWeight)) {
            $useMinMax = false;
            if (isset($totWeight['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOT_WEIGHT, $totWeight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totWeight['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOT_WEIGHT, $totWeight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TOT_WEIGHT, $totWeight, $comparison);
    }

    /**
     * Filter the query on the usercode column
     *
     * Example usage:
     * <code>
     * $query->filterByUsercode('fooValue');   // WHERE usercode = 'fooValue'
     * $query->filterByUsercode('%fooValue%', Criteria::LIKE); // WHERE usercode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usercode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_USERCODE, $usercode, $comparison);
    }

    /**
     * Filter the query on the remark column
     *
     * Example usage:
     * <code>
     * $query->filterByRemark('fooValue');   // WHERE remark = 'fooValue'
     * $query->filterByRemark('%fooValue%', Criteria::LIKE); // WHERE remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $remark The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_REMARK, $remark, $comparison);
    }

    /**
     * Filter the query on the trnf column
     *
     * Example usage:
     * <code>
     * $query->filterByTrnf(1234); // WHERE trnf = 1234
     * $query->filterByTrnf(array(12, 34)); // WHERE trnf IN (12, 34)
     * $query->filterByTrnf(array('min' => 12)); // WHERE trnf > 12
     * </code>
     *
     * @param     mixed $trnf The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (is_array($trnf)) {
            $useMinMax = false;
            if (isset($trnf['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TRNF, $trnf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trnf['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TRNF, $trnf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TRNF, $trnf, $comparison);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the sa_type column
     *
     * Example usage:
     * <code>
     * $query->filterBySaType('fooValue');   // WHERE sa_type = 'fooValue'
     * $query->filterBySaType('%fooValue%', Criteria::LIKE); // WHERE sa_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_SA_TYPE, $saType, $comparison);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid('fooValue');   // WHERE uid = 'fooValue'
     * $query->filterByUid('%fooValue%', Criteria::LIKE); // WHERE uid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Filter the query on the lid column
     *
     * Example usage:
     * <code>
     * $query->filterByLid('fooValue');   // WHERE lid = 'fooValue'
     * $query->filterByLid('%fooValue%', Criteria::LIKE); // WHERE lid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_LID, $lid, $comparison);
    }

    /**
     * Filter the query on the dl column
     *
     * Example usage:
     * <code>
     * $query->filterByDl('fooValue');   // WHERE dl = 'fooValue'
     * $query->filterByDl('%fooValue%', Criteria::LIKE); // WHERE dl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_DL, $dl, $comparison);
    }

    /**
     * Filter the query on the cancel column
     *
     * Example usage:
     * <code>
     * $query->filterByCancel(1234); // WHERE cancel = 1234
     * $query->filterByCancel(array(12, 34)); // WHERE cancel IN (12, 34)
     * $query->filterByCancel(array('min' => 12)); // WHERE cancel > 12
     * </code>
     *
     * @param     mixed $cancel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CANCEL, $cancel, $comparison);
    }

    /**
     * Filter the query on the send column
     *
     * Example usage:
     * <code>
     * $query->filterBySend(1234); // WHERE send = 1234
     * $query->filterBySend(array(12, 34)); // WHERE send IN (12, 34)
     * $query->filterBySend(array('min' => 12)); // WHERE send > 12
     * </code>
     *
     * @param     mixed $send The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_SEND, $send, $comparison);
    }

    /**
     * Filter the query on the txtoption column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtoption('fooValue');   // WHERE txtoption = 'fooValue'
     * $query->filterByTxtoption('%fooValue%', Criteria::LIKE); // WHERE txtoption LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtoption The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TXTOPTION, $txtoption, $comparison);
    }

    /**
     * Filter the query on the chkCash column
     *
     * Example usage:
     * <code>
     * $query->filterByChkcash('fooValue');   // WHERE chkCash = 'fooValue'
     * $query->filterByChkcash('%fooValue%', Criteria::LIKE); // WHERE chkCash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chkcash The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CHKCASH, $chkcash, $comparison);
    }

    /**
     * Filter the query on the chkFuture column
     *
     * Example usage:
     * <code>
     * $query->filterByChkfuture('fooValue');   // WHERE chkFuture = 'fooValue'
     * $query->filterByChkfuture('%fooValue%', Criteria::LIKE); // WHERE chkFuture LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chkfuture The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
    }

    /**
     * Filter the query on the chkTransfer column
     *
     * Example usage:
     * <code>
     * $query->filterByChktransfer('fooValue');   // WHERE chkTransfer = 'fooValue'
     * $query->filterByChktransfer('%fooValue%', Criteria::LIKE); // WHERE chkTransfer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chktransfer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
    }

    /**
     * Filter the query on the chkCredit1 column
     *
     * Example usage:
     * <code>
     * $query->filterByChkcredit1('fooValue');   // WHERE chkCredit1 = 'fooValue'
     * $query->filterByChkcredit1('%fooValue%', Criteria::LIKE); // WHERE chkCredit1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chkcredit1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
    }

    /**
     * Filter the query on the chkCredit2 column
     *
     * Example usage:
     * <code>
     * $query->filterByChkcredit2('fooValue');   // WHERE chkCredit2 = 'fooValue'
     * $query->filterByChkcredit2('%fooValue%', Criteria::LIKE); // WHERE chkCredit2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chkcredit2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
    }

    /**
     * Filter the query on the chkCredit3 column
     *
     * Example usage:
     * <code>
     * $query->filterByChkcredit3('fooValue');   // WHERE chkCredit3 = 'fooValue'
     * $query->filterByChkcredit3('%fooValue%', Criteria::LIKE); // WHERE chkCredit3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chkcredit3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
    }

    /**
     * Filter the query on the chkInternet column
     *
     * Example usage:
     * <code>
     * $query->filterByChkinternet('fooValue');   // WHERE chkInternet = 'fooValue'
     * $query->filterByChkinternet('%fooValue%', Criteria::LIKE); // WHERE chkInternet LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chkinternet The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByChkinternet($chkinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CHKINTERNET, $chkinternet, $comparison);
    }

    /**
     * Filter the query on the chkDiscount column
     *
     * Example usage:
     * <code>
     * $query->filterByChkdiscount('fooValue');   // WHERE chkDiscount = 'fooValue'
     * $query->filterByChkdiscount('%fooValue%', Criteria::LIKE); // WHERE chkDiscount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chkdiscount The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByChkdiscount($chkdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CHKDISCOUNT, $chkdiscount, $comparison);
    }

    /**
     * Filter the query on the chkOther column
     *
     * Example usage:
     * <code>
     * $query->filterByChkother('fooValue');   // WHERE chkOther = 'fooValue'
     * $query->filterByChkother('%fooValue%', Criteria::LIKE); // WHERE chkOther LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chkother The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByChkother($chkother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CHKOTHER, $chkother, $comparison);
    }

    /**
     * Filter the query on the txtCash column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtcash('fooValue');   // WHERE txtCash = 'fooValue'
     * $query->filterByTxtcash('%fooValue%', Criteria::LIKE); // WHERE txtCash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtcash The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TXTCASH, $txtcash, $comparison);
    }

    /**
     * Filter the query on the txtFuture column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtfuture('fooValue');   // WHERE txtFuture = 'fooValue'
     * $query->filterByTxtfuture('%fooValue%', Criteria::LIKE); // WHERE txtFuture LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtfuture The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
    }

    /**
     * Filter the query on the txtTransfer column
     *
     * Example usage:
     * <code>
     * $query->filterByTxttransfer('fooValue');   // WHERE txtTransfer = 'fooValue'
     * $query->filterByTxttransfer('%fooValue%', Criteria::LIKE); // WHERE txtTransfer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txttransfer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txttransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
    }

    /**
     * Filter the query on the ewallet column
     *
     * Example usage:
     * <code>
     * $query->filterByEwallet(1234); // WHERE ewallet = 1234
     * $query->filterByEwallet(array(12, 34)); // WHERE ewallet IN (12, 34)
     * $query->filterByEwallet(array('min' => 12)); // WHERE ewallet > 12
     * </code>
     *
     * @param     mixed $ewallet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_EWALLET, $ewallet, $comparison);
    }

    /**
     * Filter the query on the txtCredit1 column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtcredit1('fooValue');   // WHERE txtCredit1 = 'fooValue'
     * $query->filterByTxtcredit1('%fooValue%', Criteria::LIKE); // WHERE txtCredit1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtcredit1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
    }

    /**
     * Filter the query on the txtCredit2 column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtcredit2('fooValue');   // WHERE txtCredit2 = 'fooValue'
     * $query->filterByTxtcredit2('%fooValue%', Criteria::LIKE); // WHERE txtCredit2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtcredit2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
    }

    /**
     * Filter the query on the txtCredit3 column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtcredit3('fooValue');   // WHERE txtCredit3 = 'fooValue'
     * $query->filterByTxtcredit3('%fooValue%', Criteria::LIKE); // WHERE txtCredit3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtcredit3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
    }

    /**
     * Filter the query on the txtInternet column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtinternet('fooValue');   // WHERE txtInternet = 'fooValue'
     * $query->filterByTxtinternet('%fooValue%', Criteria::LIKE); // WHERE txtInternet LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtinternet The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTxtinternet($txtinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TXTINTERNET, $txtinternet, $comparison);
    }

    /**
     * Filter the query on the txtDiscount column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtdiscount('fooValue');   // WHERE txtDiscount = 'fooValue'
     * $query->filterByTxtdiscount('%fooValue%', Criteria::LIKE); // WHERE txtDiscount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtdiscount The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTxtdiscount($txtdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TXTDISCOUNT, $txtdiscount, $comparison);
    }

    /**
     * Filter the query on the txtOther column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtother('fooValue');   // WHERE txtOther = 'fooValue'
     * $query->filterByTxtother('%fooValue%', Criteria::LIKE); // WHERE txtOther LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtother The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTxtother($txtother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TXTOTHER, $txtother, $comparison);
    }

    /**
     * Filter the query on the optionCash column
     *
     * Example usage:
     * <code>
     * $query->filterByOptioncash('fooValue');   // WHERE optionCash = 'fooValue'
     * $query->filterByOptioncash('%fooValue%', Criteria::LIKE); // WHERE optionCash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optioncash The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_OPTIONCASH, $optioncash, $comparison);
    }

    /**
     * Filter the query on the optionFuture column
     *
     * Example usage:
     * <code>
     * $query->filterByOptionfuture('fooValue');   // WHERE optionFuture = 'fooValue'
     * $query->filterByOptionfuture('%fooValue%', Criteria::LIKE); // WHERE optionFuture LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optionfuture The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
    }

    /**
     * Filter the query on the optionTransfer column
     *
     * Example usage:
     * <code>
     * $query->filterByOptiontransfer('fooValue');   // WHERE optionTransfer = 'fooValue'
     * $query->filterByOptiontransfer('%fooValue%', Criteria::LIKE); // WHERE optionTransfer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optiontransfer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
    }

    /**
     * Filter the query on the optionCredit1 column
     *
     * Example usage:
     * <code>
     * $query->filterByOptioncredit1('fooValue');   // WHERE optionCredit1 = 'fooValue'
     * $query->filterByOptioncredit1('%fooValue%', Criteria::LIKE); // WHERE optionCredit1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optioncredit1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
    }

    /**
     * Filter the query on the optionCredit2 column
     *
     * Example usage:
     * <code>
     * $query->filterByOptioncredit2('fooValue');   // WHERE optionCredit2 = 'fooValue'
     * $query->filterByOptioncredit2('%fooValue%', Criteria::LIKE); // WHERE optionCredit2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optioncredit2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
    }

    /**
     * Filter the query on the optionCredit3 column
     *
     * Example usage:
     * <code>
     * $query->filterByOptioncredit3('fooValue');   // WHERE optionCredit3 = 'fooValue'
     * $query->filterByOptioncredit3('%fooValue%', Criteria::LIKE); // WHERE optionCredit3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optioncredit3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
    }

    /**
     * Filter the query on the optionInternet column
     *
     * Example usage:
     * <code>
     * $query->filterByOptioninternet('fooValue');   // WHERE optionInternet = 'fooValue'
     * $query->filterByOptioninternet('%fooValue%', Criteria::LIKE); // WHERE optionInternet LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optioninternet The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByOptioninternet($optioninternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioninternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_OPTIONINTERNET, $optioninternet, $comparison);
    }

    /**
     * Filter the query on the optionDiscount column
     *
     * Example usage:
     * <code>
     * $query->filterByOptiondiscount('fooValue');   // WHERE optionDiscount = 'fooValue'
     * $query->filterByOptiondiscount('%fooValue%', Criteria::LIKE); // WHERE optionDiscount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optiondiscount The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByOptiondiscount($optiondiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiondiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_OPTIONDISCOUNT, $optiondiscount, $comparison);
    }

    /**
     * Filter the query on the optionOther column
     *
     * Example usage:
     * <code>
     * $query->filterByOptionother('fooValue');   // WHERE optionOther = 'fooValue'
     * $query->filterByOptionother('%fooValue%', Criteria::LIKE); // WHERE optionOther LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optionother The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByOptionother($optionother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_OPTIONOTHER, $optionother, $comparison);
    }

    /**
     * Filter the query on the discount column
     *
     * Example usage:
     * <code>
     * $query->filterByDiscount('fooValue');   // WHERE discount = 'fooValue'
     * $query->filterByDiscount('%fooValue%', Criteria::LIKE); // WHERE discount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $discount The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByDiscount($discount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($discount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_DISCOUNT, $discount, $comparison);
    }

    /**
     * Filter the query on the print column
     *
     * Example usage:
     * <code>
     * $query->filterByPrint(1234); // WHERE print = 1234
     * $query->filterByPrint(array(12, 34)); // WHERE print IN (12, 34)
     * $query->filterByPrint(array('min' => 12)); // WHERE print > 12
     * </code>
     *
     * @param     mixed $print The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByPrint($print = null, $comparison = null)
    {
        if (is_array($print)) {
            $useMinMax = false;
            if (isset($print['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_PRINT, $print['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($print['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_PRINT, $print['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_PRINT, $print, $comparison);
    }

    /**
     * Filter the query on the ewallet_before column
     *
     * Example usage:
     * <code>
     * $query->filterByEwalletBefore(1234); // WHERE ewallet_before = 1234
     * $query->filterByEwalletBefore(array(12, 34)); // WHERE ewallet_before IN (12, 34)
     * $query->filterByEwalletBefore(array('min' => 12)); // WHERE ewallet_before > 12
     * </code>
     *
     * @param     mixed $ewalletBefore The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
    }

    /**
     * Filter the query on the ewallet_after column
     *
     * Example usage:
     * <code>
     * $query->filterByEwalletAfter(1234); // WHERE ewallet_after = 1234
     * $query->filterByEwalletAfter(array(12, 34)); // WHERE ewallet_after IN (12, 34)
     * $query->filterByEwalletAfter(array('min' => 12)); // WHERE ewallet_after > 12
     * </code>
     *
     * @param     mixed $ewalletAfter The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
    }

    /**
     * Filter the query on the ipay column
     *
     * Example usage:
     * <code>
     * $query->filterByIpay('fooValue');   // WHERE ipay = 'fooValue'
     * $query->filterByIpay('%fooValue%', Criteria::LIKE); // WHERE ipay LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipay The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByIpay($ipay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipay)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_IPAY, $ipay, $comparison);
    }

    /**
     * Filter the query on the pay_type column
     *
     * Example usage:
     * <code>
     * $query->filterByPayType('fooValue');   // WHERE pay_type = 'fooValue'
     * $query->filterByPayType('%fooValue%', Criteria::LIKE); // WHERE pay_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $payType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByPayType($payType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_PAY_TYPE, $payType, $comparison);
    }

    /**
     * Filter the query on the hcancel column
     *
     * Example usage:
     * <code>
     * $query->filterByHcancel(1234); // WHERE hcancel = 1234
     * $query->filterByHcancel(array(12, 34)); // WHERE hcancel IN (12, 34)
     * $query->filterByHcancel(array('min' => 12)); // WHERE hcancel > 12
     * </code>
     *
     * @param     mixed $hcancel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByHcancel($hcancel = null, $comparison = null)
    {
        if (is_array($hcancel)) {
            $useMinMax = false;
            if (isset($hcancel['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_HCANCEL, $hcancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hcancel['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_HCANCEL, $hcancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_HCANCEL, $hcancel, $comparison);
    }

    /**
     * Filter the query on the caddress column
     *
     * Example usage:
     * <code>
     * $query->filterByCaddress('fooValue');   // WHERE caddress = 'fooValue'
     * $query->filterByCaddress('%fooValue%', Criteria::LIKE); // WHERE caddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $caddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByCaddress($caddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($caddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CADDRESS, $caddress, $comparison);
    }

    /**
     * Filter the query on the cdistrictId column
     *
     * Example usage:
     * <code>
     * $query->filterByCdistrictid('fooValue');   // WHERE cdistrictId = 'fooValue'
     * $query->filterByCdistrictid('%fooValue%', Criteria::LIKE); // WHERE cdistrictId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cdistrictid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByCdistrictid($cdistrictid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cdistrictid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CDISTRICTID, $cdistrictid, $comparison);
    }

    /**
     * Filter the query on the camphurId column
     *
     * Example usage:
     * <code>
     * $query->filterByCamphurid('fooValue');   // WHERE camphurId = 'fooValue'
     * $query->filterByCamphurid('%fooValue%', Criteria::LIKE); // WHERE camphurId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $camphurid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByCamphurid($camphurid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($camphurid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CAMPHURID, $camphurid, $comparison);
    }

    /**
     * Filter the query on the cprovinceId column
     *
     * Example usage:
     * <code>
     * $query->filterByCprovinceid('fooValue');   // WHERE cprovinceId = 'fooValue'
     * $query->filterByCprovinceid('%fooValue%', Criteria::LIKE); // WHERE cprovinceId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cprovinceid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByCprovinceid($cprovinceid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cprovinceid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CPROVINCEID, $cprovinceid, $comparison);
    }

    /**
     * Filter the query on the czip column
     *
     * Example usage:
     * <code>
     * $query->filterByCzip('fooValue');   // WHERE czip = 'fooValue'
     * $query->filterByCzip('%fooValue%', Criteria::LIKE); // WHERE czip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $czip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByCzip($czip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($czip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CZIP, $czip, $comparison);
    }

    /**
     * Filter the query on the sender column
     *
     * Example usage:
     * <code>
     * $query->filterBySender(1234); // WHERE sender = 1234
     * $query->filterBySender(array(12, 34)); // WHERE sender IN (12, 34)
     * $query->filterBySender(array('min' => 12)); // WHERE sender > 12
     * </code>
     *
     * @param     mixed $sender The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterBySender($sender = null, $comparison = null)
    {
        if (is_array($sender)) {
            $useMinMax = false;
            if (isset($sender['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SENDER, $sender['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sender['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SENDER, $sender['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_SENDER, $sender, $comparison);
    }

    /**
     * Filter the query on the sender_date column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderDate('2011-03-14'); // WHERE sender_date = '2011-03-14'
     * $query->filterBySenderDate('now'); // WHERE sender_date = '2011-03-14'
     * $query->filterBySenderDate(array('max' => 'yesterday')); // WHERE sender_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $senderDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterBySenderDate($senderDate = null, $comparison = null)
    {
        if (is_array($senderDate)) {
            $useMinMax = false;
            if (isset($senderDate['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SENDER_DATE, $senderDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($senderDate['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SENDER_DATE, $senderDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_SENDER_DATE, $senderDate, $comparison);
    }

    /**
     * Filter the query on the receive column
     *
     * Example usage:
     * <code>
     * $query->filterByReceive(1234); // WHERE receive = 1234
     * $query->filterByReceive(array(12, 34)); // WHERE receive IN (12, 34)
     * $query->filterByReceive(array('min' => 12)); // WHERE receive > 12
     * </code>
     *
     * @param     mixed $receive The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByReceive($receive = null, $comparison = null)
    {
        if (is_array($receive)) {
            $useMinMax = false;
            if (isset($receive['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_RECEIVE, $receive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receive['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_RECEIVE, $receive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_RECEIVE, $receive, $comparison);
    }

    /**
     * Filter the query on the receive_date column
     *
     * Example usage:
     * <code>
     * $query->filterByReceiveDate('2011-03-14'); // WHERE receive_date = '2011-03-14'
     * $query->filterByReceiveDate('now'); // WHERE receive_date = '2011-03-14'
     * $query->filterByReceiveDate(array('max' => 'yesterday')); // WHERE receive_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $receiveDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByReceiveDate($receiveDate = null, $comparison = null)
    {
        if (is_array($receiveDate)) {
            $useMinMax = false;
            if (isset($receiveDate['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_RECEIVE_DATE, $receiveDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiveDate['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_RECEIVE_DATE, $receiveDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_RECEIVE_DATE, $receiveDate, $comparison);
    }

    /**
     * Filter the query on the asend column
     *
     * Example usage:
     * <code>
     * $query->filterByAsend(1234); // WHERE asend = 1234
     * $query->filterByAsend(array(12, 34)); // WHERE asend IN (12, 34)
     * $query->filterByAsend(array('min' => 12)); // WHERE asend > 12
     * </code>
     *
     * @param     mixed $asend The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByAsend($asend = null, $comparison = null)
    {
        if (is_array($asend)) {
            $useMinMax = false;
            if (isset($asend['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_ASEND, $asend['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($asend['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_ASEND, $asend['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_ASEND, $asend, $comparison);
    }

    /**
     * Filter the query on the ato_type column
     *
     * Example usage:
     * <code>
     * $query->filterByAtoType(1234); // WHERE ato_type = 1234
     * $query->filterByAtoType(array(12, 34)); // WHERE ato_type IN (12, 34)
     * $query->filterByAtoType(array('min' => 12)); // WHERE ato_type > 12
     * </code>
     *
     * @param     mixed $atoType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByAtoType($atoType = null, $comparison = null)
    {
        if (is_array($atoType)) {
            $useMinMax = false;
            if (isset($atoType['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_ATO_TYPE, $atoType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($atoType['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_ATO_TYPE, $atoType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_ATO_TYPE, $atoType, $comparison);
    }

    /**
     * Filter the query on the ato_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAtoId(1234); // WHERE ato_id = 1234
     * $query->filterByAtoId(array(12, 34)); // WHERE ato_id IN (12, 34)
     * $query->filterByAtoId(array('min' => 12)); // WHERE ato_id > 12
     * </code>
     *
     * @param     mixed $atoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByAtoId($atoId = null, $comparison = null)
    {
        if (is_array($atoId)) {
            $useMinMax = false;
            if (isset($atoId['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_ATO_ID, $atoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($atoId['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_ATO_ID, $atoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_ATO_ID, $atoId, $comparison);
    }

    /**
     * Filter the query on the online column
     *
     * Example usage:
     * <code>
     * $query->filterByOnline(1234); // WHERE online = 1234
     * $query->filterByOnline(array(12, 34)); // WHERE online IN (12, 34)
     * $query->filterByOnline(array('min' => 12)); // WHERE online > 12
     * </code>
     *
     * @param     mixed $online The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByOnline($online = null, $comparison = null)
    {
        if (is_array($online)) {
            $useMinMax = false;
            if (isset($online['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_ONLINE, $online['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($online['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_ONLINE, $online['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_ONLINE, $online, $comparison);
    }

    /**
     * Filter the query on the hpv column
     *
     * Example usage:
     * <code>
     * $query->filterByHpv(1234); // WHERE hpv = 1234
     * $query->filterByHpv(array(12, 34)); // WHERE hpv IN (12, 34)
     * $query->filterByHpv(array('min' => 12)); // WHERE hpv > 12
     * </code>
     *
     * @param     mixed $hpv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByHpv($hpv = null, $comparison = null)
    {
        if (is_array($hpv)) {
            $useMinMax = false;
            if (isset($hpv['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_HPV, $hpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hpv['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_HPV, $hpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_HPV, $hpv, $comparison);
    }

    /**
     * Filter the query on the htotal column
     *
     * Example usage:
     * <code>
     * $query->filterByHtotal(1234); // WHERE htotal = 1234
     * $query->filterByHtotal(array(12, 34)); // WHERE htotal IN (12, 34)
     * $query->filterByHtotal(array('min' => 12)); // WHERE htotal > 12
     * </code>
     *
     * @param     mixed $htotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByHtotal($htotal = null, $comparison = null)
    {
        if (is_array($htotal)) {
            $useMinMax = false;
            if (isset($htotal['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_HTOTAL, $htotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($htotal['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_HTOTAL, $htotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_HTOTAL, $htotal, $comparison);
    }

    /**
     * Filter the query on the hdate column
     *
     * Example usage:
     * <code>
     * $query->filterByHdate('2011-03-14'); // WHERE hdate = '2011-03-14'
     * $query->filterByHdate('now'); // WHERE hdate = '2011-03-14'
     * $query->filterByHdate(array('max' => 'yesterday')); // WHERE hdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $hdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByHdate($hdate = null, $comparison = null)
    {
        if (is_array($hdate)) {
            $useMinMax = false;
            if (isset($hdate['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_HDATE, $hdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hdate['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_HDATE, $hdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_HDATE, $hdate, $comparison);
    }

    /**
     * Filter the query on the scheck column
     *
     * Example usage:
     * <code>
     * $query->filterByScheck('fooValue');   // WHERE scheck = 'fooValue'
     * $query->filterByScheck('%fooValue%', Criteria::LIKE); // WHERE scheck LIKE '%fooValue%'
     * </code>
     *
     * @param     string $scheck The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByScheck($scheck = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scheck)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_SCHECK, $scheck, $comparison);
    }

    /**
     * Filter the query on the checkportal column
     *
     * Example usage:
     * <code>
     * $query->filterByCheckportal(1234); // WHERE checkportal = 1234
     * $query->filterByCheckportal(array(12, 34)); // WHERE checkportal IN (12, 34)
     * $query->filterByCheckportal(array('min' => 12)); // WHERE checkportal > 12
     * </code>
     *
     * @param     mixed $checkportal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
    }

    /**
     * Filter the query on the rcode column
     *
     * Example usage:
     * <code>
     * $query->filterByRcode(1234); // WHERE rcode = 1234
     * $query->filterByRcode(array(12, 34)); // WHERE rcode IN (12, 34)
     * $query->filterByRcode(array('min' => 12)); // WHERE rcode > 12
     * </code>
     *
     * @param     mixed $rcode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the bmcauto column
     *
     * Example usage:
     * <code>
     * $query->filterByBmcauto(1234); // WHERE bmcauto = 1234
     * $query->filterByBmcauto(array(12, 34)); // WHERE bmcauto IN (12, 34)
     * $query->filterByBmcauto(array('min' => 12)); // WHERE bmcauto > 12
     * </code>
     *
     * @param     mixed $bmcauto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByBmcauto($bmcauto = null, $comparison = null)
    {
        if (is_array($bmcauto)) {
            $useMinMax = false;
            if (isset($bmcauto['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_BMCAUTO, $bmcauto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bmcauto['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_BMCAUTO, $bmcauto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_BMCAUTO, $bmcauto, $comparison);
    }

    /**
     * Filter the query on the transtype column
     *
     * Example usage:
     * <code>
     * $query->filterByTranstype(1234); // WHERE transtype = 1234
     * $query->filterByTranstype(array(12, 34)); // WHERE transtype IN (12, 34)
     * $query->filterByTranstype(array('min' => 12)); // WHERE transtype > 12
     * </code>
     *
     * @param     mixed $transtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByTranstype($transtype = null, $comparison = null)
    {
        if (is_array($transtype)) {
            $useMinMax = false;
            if (isset($transtype['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TRANSTYPE, $transtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($transtype['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_TRANSTYPE, $transtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_TRANSTYPE, $transtype, $comparison);
    }

    /**
     * Filter the query on the paytype column
     *
     * Example usage:
     * <code>
     * $query->filterByPaytype(1234); // WHERE paytype = 1234
     * $query->filterByPaytype(array(12, 34)); // WHERE paytype IN (12, 34)
     * $query->filterByPaytype(array('min' => 12)); // WHERE paytype > 12
     * </code>
     *
     * @param     mixed $paytype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByPaytype($paytype = null, $comparison = null)
    {
        if (is_array($paytype)) {
            $useMinMax = false;
            if (isset($paytype['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_PAYTYPE, $paytype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paytype['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_PAYTYPE, $paytype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_PAYTYPE, $paytype, $comparison);
    }

    /**
     * Filter the query on the sendtype column
     *
     * Example usage:
     * <code>
     * $query->filterBySendtype(1234); // WHERE sendtype = 1234
     * $query->filterBySendtype(array(12, 34)); // WHERE sendtype IN (12, 34)
     * $query->filterBySendtype(array('min' => 12)); // WHERE sendtype > 12
     * </code>
     *
     * @param     mixed $sendtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterBySendtype($sendtype = null, $comparison = null)
    {
        if (is_array($sendtype)) {
            $useMinMax = false;
            if (isset($sendtype['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SENDTYPE, $sendtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sendtype['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_SENDTYPE, $sendtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_SENDTYPE, $sendtype, $comparison);
    }

    /**
     * Filter the query on the credittype column
     *
     * Example usage:
     * <code>
     * $query->filterByCredittype(1234); // WHERE credittype = 1234
     * $query->filterByCredittype(array(12, 34)); // WHERE credittype IN (12, 34)
     * $query->filterByCredittype(array('min' => 12)); // WHERE credittype > 12
     * </code>
     *
     * @param     mixed $credittype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByCredittype($credittype = null, $comparison = null)
    {
        if (is_array($credittype)) {
            $useMinMax = false;
            if (isset($credittype['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_CREDITTYPE, $credittype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($credittype['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_CREDITTYPE, $credittype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CREDITTYPE, $credittype, $comparison);
    }

    /**
     * Filter the query on the paydate column
     *
     * Example usage:
     * <code>
     * $query->filterByPaydate('2011-03-14'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate('now'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate(array('max' => 'yesterday')); // WHERE paydate > '2011-03-13'
     * </code>
     *
     * @param     mixed $paydate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (is_array($paydate)) {
            $useMinMax = false;
            if (isset($paydate['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_PAYDATE, $paydate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paydate['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_PAYDATE, $paydate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_PAYDATE, $paydate, $comparison);
    }

    /**
     * Filter the query on the bprice column
     *
     * Example usage:
     * <code>
     * $query->filterByBprice(1234); // WHERE bprice = 1234
     * $query->filterByBprice(array(12, 34)); // WHERE bprice IN (12, 34)
     * $query->filterByBprice(array('min' => 12)); // WHERE bprice > 12
     * </code>
     *
     * @param     mixed $bprice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_BPRICE, $bprice, $comparison);
    }

    /**
     * Filter the query on the locationbase column
     *
     * Example usage:
     * <code>
     * $query->filterByLocationbase(1234); // WHERE locationbase = 1234
     * $query->filterByLocationbase(array(12, 34)); // WHERE locationbase IN (12, 34)
     * $query->filterByLocationbase(array('min' => 12)); // WHERE locationbase > 12
     * </code>
     *
     * @param     mixed $locationbase The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Filter the query on the mbase column
     *
     * Example usage:
     * <code>
     * $query->filterByMbase('fooValue');   // WHERE mbase = 'fooValue'
     * $query->filterByMbase('%fooValue%', Criteria::LIKE); // WHERE mbase LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mbase The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_MBASE, $mbase, $comparison);
    }

    /**
     * Filter the query on the cname column
     *
     * Example usage:
     * <code>
     * $query->filterByCname('fooValue');   // WHERE cname = 'fooValue'
     * $query->filterByCname('%fooValue%', Criteria::LIKE); // WHERE cname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByCname($cname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CNAME, $cname, $comparison);
    }

    /**
     * Filter the query on the cmobile column
     *
     * Example usage:
     * <code>
     * $query->filterByCmobile('fooValue');   // WHERE cmobile = 'fooValue'
     * $query->filterByCmobile('%fooValue%', Criteria::LIKE); // WHERE cmobile LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cmobile The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByCmobile($cmobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmobile)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CMOBILE, $cmobile, $comparison);
    }

    /**
     * Filter the query on the crate column
     *
     * Example usage:
     * <code>
     * $query->filterByCrate(1234); // WHERE crate = 1234
     * $query->filterByCrate(array(12, 34)); // WHERE crate IN (12, 34)
     * $query->filterByCrate(array('min' => 12)); // WHERE crate > 12
     * </code>
     *
     * @param     mixed $crate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliTransfersaleHTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleHTableMap::COL_CRATE, $crate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliTransfersaleH $aliTransfersaleH Object to remove from the list of results
     *
     * @return $this|ChildAliTransfersaleHQuery The current query, for fluid interface
     */
    public function prune($aliTransfersaleH = null)
    {
        if ($aliTransfersaleH) {
            $this->addUsingAlias(AliTransfersaleHTableMap::COL_ID, $aliTransfersaleH->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_transfersale_h table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransfersaleHTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliTransfersaleHTableMap::clearInstancePool();
            AliTransfersaleHTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransfersaleHTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliTransfersaleHTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliTransfersaleHTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliTransfersaleHTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliTransfersaleHQuery
