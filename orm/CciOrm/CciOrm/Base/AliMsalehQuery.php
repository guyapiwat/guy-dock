<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliMsaleh as ChildAliMsaleh;
use CciOrm\CciOrm\AliMsalehQuery as ChildAliMsalehQuery;
use CciOrm\CciOrm\Map\AliMsalehTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_msaleh' table.
 *
 *
 *
 * @method     ChildAliMsalehQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliMsalehQuery orderBySano1($order = Criteria::ASC) Order by the sano1 column
 * @method     ChildAliMsalehQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliMsalehQuery orderBySctime($order = Criteria::ASC) Order by the sctime column
 * @method     ChildAliMsalehQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliMsalehQuery orderByInvRef($order = Criteria::ASC) Order by the inv_ref column
 * @method     ChildAliMsalehQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliMsalehQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliMsalehQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliMsalehQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliMsalehQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliMsalehQuery orderByTotBv($order = Criteria::ASC) Order by the tot_bv column
 * @method     ChildAliMsalehQuery orderByTotFv($order = Criteria::ASC) Order by the tot_fv column
 * @method     ChildAliMsalehQuery orderByTotWeight($order = Criteria::ASC) Order by the tot_weight column
 * @method     ChildAliMsalehQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliMsalehQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliMsalehQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliMsalehQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliMsalehQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliMsalehQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliMsalehQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliMsalehQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliMsalehQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliMsalehQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliMsalehQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliMsalehQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliMsalehQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliMsalehQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliMsalehQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliMsalehQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliMsalehQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliMsalehQuery orderByChkinternet($order = Criteria::ASC) Order by the chkInternet column
 * @method     ChildAliMsalehQuery orderByChkdiscount($order = Criteria::ASC) Order by the chkDiscount column
 * @method     ChildAliMsalehQuery orderByChkother($order = Criteria::ASC) Order by the chkOther column
 * @method     ChildAliMsalehQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliMsalehQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliMsalehQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliMsalehQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliMsalehQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliMsalehQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliMsalehQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliMsalehQuery orderByTxtinternet($order = Criteria::ASC) Order by the txtInternet column
 * @method     ChildAliMsalehQuery orderByTxtdiscount($order = Criteria::ASC) Order by the txtDiscount column
 * @method     ChildAliMsalehQuery orderByTxtother($order = Criteria::ASC) Order by the txtOther column
 * @method     ChildAliMsalehQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliMsalehQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliMsalehQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliMsalehQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliMsalehQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliMsalehQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliMsalehQuery orderByOptioninternet($order = Criteria::ASC) Order by the optionInternet column
 * @method     ChildAliMsalehQuery orderByOptiondiscount($order = Criteria::ASC) Order by the optionDiscount column
 * @method     ChildAliMsalehQuery orderByOptionother($order = Criteria::ASC) Order by the optionOther column
 * @method     ChildAliMsalehQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildAliMsalehQuery orderByPrint($order = Criteria::ASC) Order by the print column
 * @method     ChildAliMsalehQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliMsalehQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliMsalehQuery orderByIpay($order = Criteria::ASC) Order by the ipay column
 * @method     ChildAliMsalehQuery orderByPayType($order = Criteria::ASC) Order by the pay_type column
 * @method     ChildAliMsalehQuery orderByHcancel($order = Criteria::ASC) Order by the hcancel column
 * @method     ChildAliMsalehQuery orderByCaddress($order = Criteria::ASC) Order by the caddress column
 * @method     ChildAliMsalehQuery orderByCdistrictid($order = Criteria::ASC) Order by the cdistrictId column
 * @method     ChildAliMsalehQuery orderByCamphurid($order = Criteria::ASC) Order by the camphurId column
 * @method     ChildAliMsalehQuery orderByCprovinceid($order = Criteria::ASC) Order by the cprovinceId column
 * @method     ChildAliMsalehQuery orderByCzip($order = Criteria::ASC) Order by the czip column
 * @method     ChildAliMsalehQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method     ChildAliMsalehQuery orderBySenderDate($order = Criteria::ASC) Order by the sender_date column
 * @method     ChildAliMsalehQuery orderByReceive($order = Criteria::ASC) Order by the receive column
 * @method     ChildAliMsalehQuery orderByReceiveDate($order = Criteria::ASC) Order by the receive_date column
 * @method     ChildAliMsalehQuery orderByAsend($order = Criteria::ASC) Order by the asend column
 * @method     ChildAliMsalehQuery orderByAtoType($order = Criteria::ASC) Order by the ato_type column
 * @method     ChildAliMsalehQuery orderByAtoId($order = Criteria::ASC) Order by the ato_id column
 * @method     ChildAliMsalehQuery orderByOnline($order = Criteria::ASC) Order by the online column
 * @method     ChildAliMsalehQuery orderByHpv($order = Criteria::ASC) Order by the hpv column
 * @method     ChildAliMsalehQuery orderByHtotal($order = Criteria::ASC) Order by the htotal column
 * @method     ChildAliMsalehQuery orderByHdate($order = Criteria::ASC) Order by the hdate column
 * @method     ChildAliMsalehQuery orderByScheck($order = Criteria::ASC) Order by the scheck column
 * @method     ChildAliMsalehQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliMsalehQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliMsalehQuery orderByBmcauto($order = Criteria::ASC) Order by the bmcauto column
 * @method     ChildAliMsalehQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliMsalehQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 * @method     ChildAliMsalehQuery orderByCname($order = Criteria::ASC) Order by the cname column
 * @method     ChildAliMsalehQuery orderByCmobile($order = Criteria::ASC) Order by the cmobile column
 * @method     ChildAliMsalehQuery orderByUidSender($order = Criteria::ASC) Order by the uid_sender column
 * @method     ChildAliMsalehQuery orderByUidReceive($order = Criteria::ASC) Order by the uid_receive column
 * @method     ChildAliMsalehQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliMsalehQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliMsalehQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliMsalehQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 *
 * @method     ChildAliMsalehQuery groupBySano() Group by the sano column
 * @method     ChildAliMsalehQuery groupBySano1() Group by the sano1 column
 * @method     ChildAliMsalehQuery groupBySadate() Group by the sadate column
 * @method     ChildAliMsalehQuery groupBySctime() Group by the sctime column
 * @method     ChildAliMsalehQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliMsalehQuery groupByInvRef() Group by the inv_ref column
 * @method     ChildAliMsalehQuery groupByMcode() Group by the mcode column
 * @method     ChildAliMsalehQuery groupByNameF() Group by the name_f column
 * @method     ChildAliMsalehQuery groupByNameT() Group by the name_t column
 * @method     ChildAliMsalehQuery groupByTotal() Group by the total column
 * @method     ChildAliMsalehQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliMsalehQuery groupByTotBv() Group by the tot_bv column
 * @method     ChildAliMsalehQuery groupByTotFv() Group by the tot_fv column
 * @method     ChildAliMsalehQuery groupByTotWeight() Group by the tot_weight column
 * @method     ChildAliMsalehQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliMsalehQuery groupByRemark() Group by the remark column
 * @method     ChildAliMsalehQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliMsalehQuery groupById() Group by the id column
 * @method     ChildAliMsalehQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliMsalehQuery groupByUid() Group by the uid column
 * @method     ChildAliMsalehQuery groupByLid() Group by the lid column
 * @method     ChildAliMsalehQuery groupByDl() Group by the dl column
 * @method     ChildAliMsalehQuery groupByCancel() Group by the cancel column
 * @method     ChildAliMsalehQuery groupBySend() Group by the send column
 * @method     ChildAliMsalehQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliMsalehQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliMsalehQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliMsalehQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliMsalehQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliMsalehQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliMsalehQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliMsalehQuery groupByChkinternet() Group by the chkInternet column
 * @method     ChildAliMsalehQuery groupByChkdiscount() Group by the chkDiscount column
 * @method     ChildAliMsalehQuery groupByChkother() Group by the chkOther column
 * @method     ChildAliMsalehQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliMsalehQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliMsalehQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliMsalehQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliMsalehQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliMsalehQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliMsalehQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliMsalehQuery groupByTxtinternet() Group by the txtInternet column
 * @method     ChildAliMsalehQuery groupByTxtdiscount() Group by the txtDiscount column
 * @method     ChildAliMsalehQuery groupByTxtother() Group by the txtOther column
 * @method     ChildAliMsalehQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliMsalehQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliMsalehQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliMsalehQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliMsalehQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliMsalehQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliMsalehQuery groupByOptioninternet() Group by the optionInternet column
 * @method     ChildAliMsalehQuery groupByOptiondiscount() Group by the optionDiscount column
 * @method     ChildAliMsalehQuery groupByOptionother() Group by the optionOther column
 * @method     ChildAliMsalehQuery groupByDiscount() Group by the discount column
 * @method     ChildAliMsalehQuery groupByPrint() Group by the print column
 * @method     ChildAliMsalehQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliMsalehQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliMsalehQuery groupByIpay() Group by the ipay column
 * @method     ChildAliMsalehQuery groupByPayType() Group by the pay_type column
 * @method     ChildAliMsalehQuery groupByHcancel() Group by the hcancel column
 * @method     ChildAliMsalehQuery groupByCaddress() Group by the caddress column
 * @method     ChildAliMsalehQuery groupByCdistrictid() Group by the cdistrictId column
 * @method     ChildAliMsalehQuery groupByCamphurid() Group by the camphurId column
 * @method     ChildAliMsalehQuery groupByCprovinceid() Group by the cprovinceId column
 * @method     ChildAliMsalehQuery groupByCzip() Group by the czip column
 * @method     ChildAliMsalehQuery groupBySender() Group by the sender column
 * @method     ChildAliMsalehQuery groupBySenderDate() Group by the sender_date column
 * @method     ChildAliMsalehQuery groupByReceive() Group by the receive column
 * @method     ChildAliMsalehQuery groupByReceiveDate() Group by the receive_date column
 * @method     ChildAliMsalehQuery groupByAsend() Group by the asend column
 * @method     ChildAliMsalehQuery groupByAtoType() Group by the ato_type column
 * @method     ChildAliMsalehQuery groupByAtoId() Group by the ato_id column
 * @method     ChildAliMsalehQuery groupByOnline() Group by the online column
 * @method     ChildAliMsalehQuery groupByHpv() Group by the hpv column
 * @method     ChildAliMsalehQuery groupByHtotal() Group by the htotal column
 * @method     ChildAliMsalehQuery groupByHdate() Group by the hdate column
 * @method     ChildAliMsalehQuery groupByScheck() Group by the scheck column
 * @method     ChildAliMsalehQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliMsalehQuery groupByRcode() Group by the rcode column
 * @method     ChildAliMsalehQuery groupByBmcauto() Group by the bmcauto column
 * @method     ChildAliMsalehQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliMsalehQuery groupByUidCancel() Group by the uid_cancel column
 * @method     ChildAliMsalehQuery groupByCname() Group by the cname column
 * @method     ChildAliMsalehQuery groupByCmobile() Group by the cmobile column
 * @method     ChildAliMsalehQuery groupByUidSender() Group by the uid_sender column
 * @method     ChildAliMsalehQuery groupByUidReceive() Group by the uid_receive column
 * @method     ChildAliMsalehQuery groupByMbase() Group by the mbase column
 * @method     ChildAliMsalehQuery groupByBprice() Group by the bprice column
 * @method     ChildAliMsalehQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliMsalehQuery groupByCrate() Group by the crate column
 *
 * @method     ChildAliMsalehQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliMsalehQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliMsalehQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliMsalehQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliMsalehQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliMsalehQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliMsaleh findOne(ConnectionInterface $con = null) Return the first ChildAliMsaleh matching the query
 * @method     ChildAliMsaleh findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliMsaleh matching the query, or a new ChildAliMsaleh object populated from the query conditions when no match is found
 *
 * @method     ChildAliMsaleh findOneBySano(string $sano) Return the first ChildAliMsaleh filtered by the sano column
 * @method     ChildAliMsaleh findOneBySano1(string $sano1) Return the first ChildAliMsaleh filtered by the sano1 column
 * @method     ChildAliMsaleh findOneBySadate(string $sadate) Return the first ChildAliMsaleh filtered by the sadate column
 * @method     ChildAliMsaleh findOneBySctime(string $sctime) Return the first ChildAliMsaleh filtered by the sctime column
 * @method     ChildAliMsaleh findOneByInvCode(string $inv_code) Return the first ChildAliMsaleh filtered by the inv_code column
 * @method     ChildAliMsaleh findOneByInvRef(string $inv_ref) Return the first ChildAliMsaleh filtered by the inv_ref column
 * @method     ChildAliMsaleh findOneByMcode(string $mcode) Return the first ChildAliMsaleh filtered by the mcode column
 * @method     ChildAliMsaleh findOneByNameF(string $name_f) Return the first ChildAliMsaleh filtered by the name_f column
 * @method     ChildAliMsaleh findOneByNameT(string $name_t) Return the first ChildAliMsaleh filtered by the name_t column
 * @method     ChildAliMsaleh findOneByTotal(string $total) Return the first ChildAliMsaleh filtered by the total column
 * @method     ChildAliMsaleh findOneByTotPv(string $tot_pv) Return the first ChildAliMsaleh filtered by the tot_pv column
 * @method     ChildAliMsaleh findOneByTotBv(string $tot_bv) Return the first ChildAliMsaleh filtered by the tot_bv column
 * @method     ChildAliMsaleh findOneByTotFv(string $tot_fv) Return the first ChildAliMsaleh filtered by the tot_fv column
 * @method     ChildAliMsaleh findOneByTotWeight(string $tot_weight) Return the first ChildAliMsaleh filtered by the tot_weight column
 * @method     ChildAliMsaleh findOneByUsercode(string $usercode) Return the first ChildAliMsaleh filtered by the usercode column
 * @method     ChildAliMsaleh findOneByRemark(string $remark) Return the first ChildAliMsaleh filtered by the remark column
 * @method     ChildAliMsaleh findOneByTrnf(int $trnf) Return the first ChildAliMsaleh filtered by the trnf column
 * @method     ChildAliMsaleh findOneById(int $id) Return the first ChildAliMsaleh filtered by the id column
 * @method     ChildAliMsaleh findOneBySaType(string $sa_type) Return the first ChildAliMsaleh filtered by the sa_type column
 * @method     ChildAliMsaleh findOneByUid(string $uid) Return the first ChildAliMsaleh filtered by the uid column
 * @method     ChildAliMsaleh findOneByLid(string $lid) Return the first ChildAliMsaleh filtered by the lid column
 * @method     ChildAliMsaleh findOneByDl(string $dl) Return the first ChildAliMsaleh filtered by the dl column
 * @method     ChildAliMsaleh findOneByCancel(int $cancel) Return the first ChildAliMsaleh filtered by the cancel column
 * @method     ChildAliMsaleh findOneBySend(int $send) Return the first ChildAliMsaleh filtered by the send column
 * @method     ChildAliMsaleh findOneByTxtoption(string $txtoption) Return the first ChildAliMsaleh filtered by the txtoption column
 * @method     ChildAliMsaleh findOneByChkcash(string $chkCash) Return the first ChildAliMsaleh filtered by the chkCash column
 * @method     ChildAliMsaleh findOneByChkfuture(string $chkFuture) Return the first ChildAliMsaleh filtered by the chkFuture column
 * @method     ChildAliMsaleh findOneByChktransfer(string $chkTransfer) Return the first ChildAliMsaleh filtered by the chkTransfer column
 * @method     ChildAliMsaleh findOneByChkcredit1(string $chkCredit1) Return the first ChildAliMsaleh filtered by the chkCredit1 column
 * @method     ChildAliMsaleh findOneByChkcredit2(string $chkCredit2) Return the first ChildAliMsaleh filtered by the chkCredit2 column
 * @method     ChildAliMsaleh findOneByChkcredit3(string $chkCredit3) Return the first ChildAliMsaleh filtered by the chkCredit3 column
 * @method     ChildAliMsaleh findOneByChkinternet(string $chkInternet) Return the first ChildAliMsaleh filtered by the chkInternet column
 * @method     ChildAliMsaleh findOneByChkdiscount(string $chkDiscount) Return the first ChildAliMsaleh filtered by the chkDiscount column
 * @method     ChildAliMsaleh findOneByChkother(string $chkOther) Return the first ChildAliMsaleh filtered by the chkOther column
 * @method     ChildAliMsaleh findOneByTxtcash(string $txtCash) Return the first ChildAliMsaleh filtered by the txtCash column
 * @method     ChildAliMsaleh findOneByTxtfuture(string $txtFuture) Return the first ChildAliMsaleh filtered by the txtFuture column
 * @method     ChildAliMsaleh findOneByTxttransfer(string $txtTransfer) Return the first ChildAliMsaleh filtered by the txtTransfer column
 * @method     ChildAliMsaleh findOneByEwallet(string $ewallet) Return the first ChildAliMsaleh filtered by the ewallet column
 * @method     ChildAliMsaleh findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliMsaleh filtered by the txtCredit1 column
 * @method     ChildAliMsaleh findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliMsaleh filtered by the txtCredit2 column
 * @method     ChildAliMsaleh findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliMsaleh filtered by the txtCredit3 column
 * @method     ChildAliMsaleh findOneByTxtinternet(string $txtInternet) Return the first ChildAliMsaleh filtered by the txtInternet column
 * @method     ChildAliMsaleh findOneByTxtdiscount(string $txtDiscount) Return the first ChildAliMsaleh filtered by the txtDiscount column
 * @method     ChildAliMsaleh findOneByTxtother(string $txtOther) Return the first ChildAliMsaleh filtered by the txtOther column
 * @method     ChildAliMsaleh findOneByOptioncash(string $optionCash) Return the first ChildAliMsaleh filtered by the optionCash column
 * @method     ChildAliMsaleh findOneByOptionfuture(string $optionFuture) Return the first ChildAliMsaleh filtered by the optionFuture column
 * @method     ChildAliMsaleh findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliMsaleh filtered by the optionTransfer column
 * @method     ChildAliMsaleh findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliMsaleh filtered by the optionCredit1 column
 * @method     ChildAliMsaleh findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliMsaleh filtered by the optionCredit2 column
 * @method     ChildAliMsaleh findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliMsaleh filtered by the optionCredit3 column
 * @method     ChildAliMsaleh findOneByOptioninternet(string $optionInternet) Return the first ChildAliMsaleh filtered by the optionInternet column
 * @method     ChildAliMsaleh findOneByOptiondiscount(string $optionDiscount) Return the first ChildAliMsaleh filtered by the optionDiscount column
 * @method     ChildAliMsaleh findOneByOptionother(string $optionOther) Return the first ChildAliMsaleh filtered by the optionOther column
 * @method     ChildAliMsaleh findOneByDiscount(string $discount) Return the first ChildAliMsaleh filtered by the discount column
 * @method     ChildAliMsaleh findOneByPrint(int $print) Return the first ChildAliMsaleh filtered by the print column
 * @method     ChildAliMsaleh findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliMsaleh filtered by the ewallet_before column
 * @method     ChildAliMsaleh findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliMsaleh filtered by the ewallet_after column
 * @method     ChildAliMsaleh findOneByIpay(string $ipay) Return the first ChildAliMsaleh filtered by the ipay column
 * @method     ChildAliMsaleh findOneByPayType(string $pay_type) Return the first ChildAliMsaleh filtered by the pay_type column
 * @method     ChildAliMsaleh findOneByHcancel(int $hcancel) Return the first ChildAliMsaleh filtered by the hcancel column
 * @method     ChildAliMsaleh findOneByCaddress(string $caddress) Return the first ChildAliMsaleh filtered by the caddress column
 * @method     ChildAliMsaleh findOneByCdistrictid(string $cdistrictId) Return the first ChildAliMsaleh filtered by the cdistrictId column
 * @method     ChildAliMsaleh findOneByCamphurid(string $camphurId) Return the first ChildAliMsaleh filtered by the camphurId column
 * @method     ChildAliMsaleh findOneByCprovinceid(string $cprovinceId) Return the first ChildAliMsaleh filtered by the cprovinceId column
 * @method     ChildAliMsaleh findOneByCzip(string $czip) Return the first ChildAliMsaleh filtered by the czip column
 * @method     ChildAliMsaleh findOneBySender(int $sender) Return the first ChildAliMsaleh filtered by the sender column
 * @method     ChildAliMsaleh findOneBySenderDate(string $sender_date) Return the first ChildAliMsaleh filtered by the sender_date column
 * @method     ChildAliMsaleh findOneByReceive(int $receive) Return the first ChildAliMsaleh filtered by the receive column
 * @method     ChildAliMsaleh findOneByReceiveDate(string $receive_date) Return the first ChildAliMsaleh filtered by the receive_date column
 * @method     ChildAliMsaleh findOneByAsend(int $asend) Return the first ChildAliMsaleh filtered by the asend column
 * @method     ChildAliMsaleh findOneByAtoType(int $ato_type) Return the first ChildAliMsaleh filtered by the ato_type column
 * @method     ChildAliMsaleh findOneByAtoId(int $ato_id) Return the first ChildAliMsaleh filtered by the ato_id column
 * @method     ChildAliMsaleh findOneByOnline(int $online) Return the first ChildAliMsaleh filtered by the online column
 * @method     ChildAliMsaleh findOneByHpv(string $hpv) Return the first ChildAliMsaleh filtered by the hpv column
 * @method     ChildAliMsaleh findOneByHtotal(string $htotal) Return the first ChildAliMsaleh filtered by the htotal column
 * @method     ChildAliMsaleh findOneByHdate(string $hdate) Return the first ChildAliMsaleh filtered by the hdate column
 * @method     ChildAliMsaleh findOneByScheck(string $scheck) Return the first ChildAliMsaleh filtered by the scheck column
 * @method     ChildAliMsaleh findOneByCheckportal(int $checkportal) Return the first ChildAliMsaleh filtered by the checkportal column
 * @method     ChildAliMsaleh findOneByRcode(int $rcode) Return the first ChildAliMsaleh filtered by the rcode column
 * @method     ChildAliMsaleh findOneByBmcauto(int $bmcauto) Return the first ChildAliMsaleh filtered by the bmcauto column
 * @method     ChildAliMsaleh findOneByCancelDate(string $cancel_date) Return the first ChildAliMsaleh filtered by the cancel_date column
 * @method     ChildAliMsaleh findOneByUidCancel(string $uid_cancel) Return the first ChildAliMsaleh filtered by the uid_cancel column
 * @method     ChildAliMsaleh findOneByCname(string $cname) Return the first ChildAliMsaleh filtered by the cname column
 * @method     ChildAliMsaleh findOneByCmobile(string $cmobile) Return the first ChildAliMsaleh filtered by the cmobile column
 * @method     ChildAliMsaleh findOneByUidSender(string $uid_sender) Return the first ChildAliMsaleh filtered by the uid_sender column
 * @method     ChildAliMsaleh findOneByUidReceive(string $uid_receive) Return the first ChildAliMsaleh filtered by the uid_receive column
 * @method     ChildAliMsaleh findOneByMbase(string $mbase) Return the first ChildAliMsaleh filtered by the mbase column
 * @method     ChildAliMsaleh findOneByBprice(string $bprice) Return the first ChildAliMsaleh filtered by the bprice column
 * @method     ChildAliMsaleh findOneByLocationbase(int $locationbase) Return the first ChildAliMsaleh filtered by the locationbase column
 * @method     ChildAliMsaleh findOneByCrate(string $crate) Return the first ChildAliMsaleh filtered by the crate column *

 * @method     ChildAliMsaleh requirePk($key, ConnectionInterface $con = null) Return the ChildAliMsaleh by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOne(ConnectionInterface $con = null) Return the first ChildAliMsaleh matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMsaleh requireOneBySano(string $sano) Return the first ChildAliMsaleh filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneBySano1(string $sano1) Return the first ChildAliMsaleh filtered by the sano1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneBySadate(string $sadate) Return the first ChildAliMsaleh filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneBySctime(string $sctime) Return the first ChildAliMsaleh filtered by the sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByInvCode(string $inv_code) Return the first ChildAliMsaleh filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByInvRef(string $inv_ref) Return the first ChildAliMsaleh filtered by the inv_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByMcode(string $mcode) Return the first ChildAliMsaleh filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByNameF(string $name_f) Return the first ChildAliMsaleh filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByNameT(string $name_t) Return the first ChildAliMsaleh filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTotal(string $total) Return the first ChildAliMsaleh filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTotPv(string $tot_pv) Return the first ChildAliMsaleh filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTotBv(string $tot_bv) Return the first ChildAliMsaleh filtered by the tot_bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTotFv(string $tot_fv) Return the first ChildAliMsaleh filtered by the tot_fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTotWeight(string $tot_weight) Return the first ChildAliMsaleh filtered by the tot_weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByUsercode(string $usercode) Return the first ChildAliMsaleh filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByRemark(string $remark) Return the first ChildAliMsaleh filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTrnf(int $trnf) Return the first ChildAliMsaleh filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneById(int $id) Return the first ChildAliMsaleh filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneBySaType(string $sa_type) Return the first ChildAliMsaleh filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByUid(string $uid) Return the first ChildAliMsaleh filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByLid(string $lid) Return the first ChildAliMsaleh filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByDl(string $dl) Return the first ChildAliMsaleh filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByCancel(int $cancel) Return the first ChildAliMsaleh filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneBySend(int $send) Return the first ChildAliMsaleh filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTxtoption(string $txtoption) Return the first ChildAliMsaleh filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByChkcash(string $chkCash) Return the first ChildAliMsaleh filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByChkfuture(string $chkFuture) Return the first ChildAliMsaleh filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByChktransfer(string $chkTransfer) Return the first ChildAliMsaleh filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliMsaleh filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliMsaleh filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliMsaleh filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByChkinternet(string $chkInternet) Return the first ChildAliMsaleh filtered by the chkInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByChkdiscount(string $chkDiscount) Return the first ChildAliMsaleh filtered by the chkDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByChkother(string $chkOther) Return the first ChildAliMsaleh filtered by the chkOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTxtcash(string $txtCash) Return the first ChildAliMsaleh filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTxtfuture(string $txtFuture) Return the first ChildAliMsaleh filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliMsaleh filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByEwallet(string $ewallet) Return the first ChildAliMsaleh filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliMsaleh filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliMsaleh filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliMsaleh filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTxtinternet(string $txtInternet) Return the first ChildAliMsaleh filtered by the txtInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTxtdiscount(string $txtDiscount) Return the first ChildAliMsaleh filtered by the txtDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByTxtother(string $txtOther) Return the first ChildAliMsaleh filtered by the txtOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByOptioncash(string $optionCash) Return the first ChildAliMsaleh filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByOptionfuture(string $optionFuture) Return the first ChildAliMsaleh filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliMsaleh filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliMsaleh filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliMsaleh filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliMsaleh filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByOptioninternet(string $optionInternet) Return the first ChildAliMsaleh filtered by the optionInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByOptiondiscount(string $optionDiscount) Return the first ChildAliMsaleh filtered by the optionDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByOptionother(string $optionOther) Return the first ChildAliMsaleh filtered by the optionOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByDiscount(string $discount) Return the first ChildAliMsaleh filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByPrint(int $print) Return the first ChildAliMsaleh filtered by the print column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliMsaleh filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliMsaleh filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByIpay(string $ipay) Return the first ChildAliMsaleh filtered by the ipay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByPayType(string $pay_type) Return the first ChildAliMsaleh filtered by the pay_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByHcancel(int $hcancel) Return the first ChildAliMsaleh filtered by the hcancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByCaddress(string $caddress) Return the first ChildAliMsaleh filtered by the caddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByCdistrictid(string $cdistrictId) Return the first ChildAliMsaleh filtered by the cdistrictId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByCamphurid(string $camphurId) Return the first ChildAliMsaleh filtered by the camphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByCprovinceid(string $cprovinceId) Return the first ChildAliMsaleh filtered by the cprovinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByCzip(string $czip) Return the first ChildAliMsaleh filtered by the czip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneBySender(int $sender) Return the first ChildAliMsaleh filtered by the sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneBySenderDate(string $sender_date) Return the first ChildAliMsaleh filtered by the sender_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByReceive(int $receive) Return the first ChildAliMsaleh filtered by the receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByReceiveDate(string $receive_date) Return the first ChildAliMsaleh filtered by the receive_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByAsend(int $asend) Return the first ChildAliMsaleh filtered by the asend column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByAtoType(int $ato_type) Return the first ChildAliMsaleh filtered by the ato_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByAtoId(int $ato_id) Return the first ChildAliMsaleh filtered by the ato_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByOnline(int $online) Return the first ChildAliMsaleh filtered by the online column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByHpv(string $hpv) Return the first ChildAliMsaleh filtered by the hpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByHtotal(string $htotal) Return the first ChildAliMsaleh filtered by the htotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByHdate(string $hdate) Return the first ChildAliMsaleh filtered by the hdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByScheck(string $scheck) Return the first ChildAliMsaleh filtered by the scheck column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByCheckportal(int $checkportal) Return the first ChildAliMsaleh filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByRcode(int $rcode) Return the first ChildAliMsaleh filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByBmcauto(int $bmcauto) Return the first ChildAliMsaleh filtered by the bmcauto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByCancelDate(string $cancel_date) Return the first ChildAliMsaleh filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByUidCancel(string $uid_cancel) Return the first ChildAliMsaleh filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByCname(string $cname) Return the first ChildAliMsaleh filtered by the cname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByCmobile(string $cmobile) Return the first ChildAliMsaleh filtered by the cmobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByUidSender(string $uid_sender) Return the first ChildAliMsaleh filtered by the uid_sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByUidReceive(string $uid_receive) Return the first ChildAliMsaleh filtered by the uid_receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByMbase(string $mbase) Return the first ChildAliMsaleh filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByBprice(string $bprice) Return the first ChildAliMsaleh filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByLocationbase(int $locationbase) Return the first ChildAliMsaleh filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMsaleh requireOneByCrate(string $crate) Return the first ChildAliMsaleh filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMsaleh[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliMsaleh objects based on current ModelCriteria
 * @method     ChildAliMsaleh[]|ObjectCollection findBySano(string $sano) Return ChildAliMsaleh objects filtered by the sano column
 * @method     ChildAliMsaleh[]|ObjectCollection findBySano1(string $sano1) Return ChildAliMsaleh objects filtered by the sano1 column
 * @method     ChildAliMsaleh[]|ObjectCollection findBySadate(string $sadate) Return ChildAliMsaleh objects filtered by the sadate column
 * @method     ChildAliMsaleh[]|ObjectCollection findBySctime(string $sctime) Return ChildAliMsaleh objects filtered by the sctime column
 * @method     ChildAliMsaleh[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliMsaleh objects filtered by the inv_code column
 * @method     ChildAliMsaleh[]|ObjectCollection findByInvRef(string $inv_ref) Return ChildAliMsaleh objects filtered by the inv_ref column
 * @method     ChildAliMsaleh[]|ObjectCollection findByMcode(string $mcode) Return ChildAliMsaleh objects filtered by the mcode column
 * @method     ChildAliMsaleh[]|ObjectCollection findByNameF(string $name_f) Return ChildAliMsaleh objects filtered by the name_f column
 * @method     ChildAliMsaleh[]|ObjectCollection findByNameT(string $name_t) Return ChildAliMsaleh objects filtered by the name_t column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTotal(string $total) Return ChildAliMsaleh objects filtered by the total column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliMsaleh objects filtered by the tot_pv column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTotBv(string $tot_bv) Return ChildAliMsaleh objects filtered by the tot_bv column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTotFv(string $tot_fv) Return ChildAliMsaleh objects filtered by the tot_fv column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTotWeight(string $tot_weight) Return ChildAliMsaleh objects filtered by the tot_weight column
 * @method     ChildAliMsaleh[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliMsaleh objects filtered by the usercode column
 * @method     ChildAliMsaleh[]|ObjectCollection findByRemark(string $remark) Return ChildAliMsaleh objects filtered by the remark column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTrnf(int $trnf) Return ChildAliMsaleh objects filtered by the trnf column
 * @method     ChildAliMsaleh[]|ObjectCollection findById(int $id) Return ChildAliMsaleh objects filtered by the id column
 * @method     ChildAliMsaleh[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliMsaleh objects filtered by the sa_type column
 * @method     ChildAliMsaleh[]|ObjectCollection findByUid(string $uid) Return ChildAliMsaleh objects filtered by the uid column
 * @method     ChildAliMsaleh[]|ObjectCollection findByLid(string $lid) Return ChildAliMsaleh objects filtered by the lid column
 * @method     ChildAliMsaleh[]|ObjectCollection findByDl(string $dl) Return ChildAliMsaleh objects filtered by the dl column
 * @method     ChildAliMsaleh[]|ObjectCollection findByCancel(int $cancel) Return ChildAliMsaleh objects filtered by the cancel column
 * @method     ChildAliMsaleh[]|ObjectCollection findBySend(int $send) Return ChildAliMsaleh objects filtered by the send column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliMsaleh objects filtered by the txtoption column
 * @method     ChildAliMsaleh[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliMsaleh objects filtered by the chkCash column
 * @method     ChildAliMsaleh[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliMsaleh objects filtered by the chkFuture column
 * @method     ChildAliMsaleh[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliMsaleh objects filtered by the chkTransfer column
 * @method     ChildAliMsaleh[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliMsaleh objects filtered by the chkCredit1 column
 * @method     ChildAliMsaleh[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliMsaleh objects filtered by the chkCredit2 column
 * @method     ChildAliMsaleh[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliMsaleh objects filtered by the chkCredit3 column
 * @method     ChildAliMsaleh[]|ObjectCollection findByChkinternet(string $chkInternet) Return ChildAliMsaleh objects filtered by the chkInternet column
 * @method     ChildAliMsaleh[]|ObjectCollection findByChkdiscount(string $chkDiscount) Return ChildAliMsaleh objects filtered by the chkDiscount column
 * @method     ChildAliMsaleh[]|ObjectCollection findByChkother(string $chkOther) Return ChildAliMsaleh objects filtered by the chkOther column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliMsaleh objects filtered by the txtCash column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliMsaleh objects filtered by the txtFuture column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliMsaleh objects filtered by the txtTransfer column
 * @method     ChildAliMsaleh[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliMsaleh objects filtered by the ewallet column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliMsaleh objects filtered by the txtCredit1 column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliMsaleh objects filtered by the txtCredit2 column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliMsaleh objects filtered by the txtCredit3 column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTxtinternet(string $txtInternet) Return ChildAliMsaleh objects filtered by the txtInternet column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTxtdiscount(string $txtDiscount) Return ChildAliMsaleh objects filtered by the txtDiscount column
 * @method     ChildAliMsaleh[]|ObjectCollection findByTxtother(string $txtOther) Return ChildAliMsaleh objects filtered by the txtOther column
 * @method     ChildAliMsaleh[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliMsaleh objects filtered by the optionCash column
 * @method     ChildAliMsaleh[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliMsaleh objects filtered by the optionFuture column
 * @method     ChildAliMsaleh[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliMsaleh objects filtered by the optionTransfer column
 * @method     ChildAliMsaleh[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliMsaleh objects filtered by the optionCredit1 column
 * @method     ChildAliMsaleh[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliMsaleh objects filtered by the optionCredit2 column
 * @method     ChildAliMsaleh[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliMsaleh objects filtered by the optionCredit3 column
 * @method     ChildAliMsaleh[]|ObjectCollection findByOptioninternet(string $optionInternet) Return ChildAliMsaleh objects filtered by the optionInternet column
 * @method     ChildAliMsaleh[]|ObjectCollection findByOptiondiscount(string $optionDiscount) Return ChildAliMsaleh objects filtered by the optionDiscount column
 * @method     ChildAliMsaleh[]|ObjectCollection findByOptionother(string $optionOther) Return ChildAliMsaleh objects filtered by the optionOther column
 * @method     ChildAliMsaleh[]|ObjectCollection findByDiscount(string $discount) Return ChildAliMsaleh objects filtered by the discount column
 * @method     ChildAliMsaleh[]|ObjectCollection findByPrint(int $print) Return ChildAliMsaleh objects filtered by the print column
 * @method     ChildAliMsaleh[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliMsaleh objects filtered by the ewallet_before column
 * @method     ChildAliMsaleh[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliMsaleh objects filtered by the ewallet_after column
 * @method     ChildAliMsaleh[]|ObjectCollection findByIpay(string $ipay) Return ChildAliMsaleh objects filtered by the ipay column
 * @method     ChildAliMsaleh[]|ObjectCollection findByPayType(string $pay_type) Return ChildAliMsaleh objects filtered by the pay_type column
 * @method     ChildAliMsaleh[]|ObjectCollection findByHcancel(int $hcancel) Return ChildAliMsaleh objects filtered by the hcancel column
 * @method     ChildAliMsaleh[]|ObjectCollection findByCaddress(string $caddress) Return ChildAliMsaleh objects filtered by the caddress column
 * @method     ChildAliMsaleh[]|ObjectCollection findByCdistrictid(string $cdistrictId) Return ChildAliMsaleh objects filtered by the cdistrictId column
 * @method     ChildAliMsaleh[]|ObjectCollection findByCamphurid(string $camphurId) Return ChildAliMsaleh objects filtered by the camphurId column
 * @method     ChildAliMsaleh[]|ObjectCollection findByCprovinceid(string $cprovinceId) Return ChildAliMsaleh objects filtered by the cprovinceId column
 * @method     ChildAliMsaleh[]|ObjectCollection findByCzip(string $czip) Return ChildAliMsaleh objects filtered by the czip column
 * @method     ChildAliMsaleh[]|ObjectCollection findBySender(int $sender) Return ChildAliMsaleh objects filtered by the sender column
 * @method     ChildAliMsaleh[]|ObjectCollection findBySenderDate(string $sender_date) Return ChildAliMsaleh objects filtered by the sender_date column
 * @method     ChildAliMsaleh[]|ObjectCollection findByReceive(int $receive) Return ChildAliMsaleh objects filtered by the receive column
 * @method     ChildAliMsaleh[]|ObjectCollection findByReceiveDate(string $receive_date) Return ChildAliMsaleh objects filtered by the receive_date column
 * @method     ChildAliMsaleh[]|ObjectCollection findByAsend(int $asend) Return ChildAliMsaleh objects filtered by the asend column
 * @method     ChildAliMsaleh[]|ObjectCollection findByAtoType(int $ato_type) Return ChildAliMsaleh objects filtered by the ato_type column
 * @method     ChildAliMsaleh[]|ObjectCollection findByAtoId(int $ato_id) Return ChildAliMsaleh objects filtered by the ato_id column
 * @method     ChildAliMsaleh[]|ObjectCollection findByOnline(int $online) Return ChildAliMsaleh objects filtered by the online column
 * @method     ChildAliMsaleh[]|ObjectCollection findByHpv(string $hpv) Return ChildAliMsaleh objects filtered by the hpv column
 * @method     ChildAliMsaleh[]|ObjectCollection findByHtotal(string $htotal) Return ChildAliMsaleh objects filtered by the htotal column
 * @method     ChildAliMsaleh[]|ObjectCollection findByHdate(string $hdate) Return ChildAliMsaleh objects filtered by the hdate column
 * @method     ChildAliMsaleh[]|ObjectCollection findByScheck(string $scheck) Return ChildAliMsaleh objects filtered by the scheck column
 * @method     ChildAliMsaleh[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliMsaleh objects filtered by the checkportal column
 * @method     ChildAliMsaleh[]|ObjectCollection findByRcode(int $rcode) Return ChildAliMsaleh objects filtered by the rcode column
 * @method     ChildAliMsaleh[]|ObjectCollection findByBmcauto(int $bmcauto) Return ChildAliMsaleh objects filtered by the bmcauto column
 * @method     ChildAliMsaleh[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliMsaleh objects filtered by the cancel_date column
 * @method     ChildAliMsaleh[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliMsaleh objects filtered by the uid_cancel column
 * @method     ChildAliMsaleh[]|ObjectCollection findByCname(string $cname) Return ChildAliMsaleh objects filtered by the cname column
 * @method     ChildAliMsaleh[]|ObjectCollection findByCmobile(string $cmobile) Return ChildAliMsaleh objects filtered by the cmobile column
 * @method     ChildAliMsaleh[]|ObjectCollection findByUidSender(string $uid_sender) Return ChildAliMsaleh objects filtered by the uid_sender column
 * @method     ChildAliMsaleh[]|ObjectCollection findByUidReceive(string $uid_receive) Return ChildAliMsaleh objects filtered by the uid_receive column
 * @method     ChildAliMsaleh[]|ObjectCollection findByMbase(string $mbase) Return ChildAliMsaleh objects filtered by the mbase column
 * @method     ChildAliMsaleh[]|ObjectCollection findByBprice(string $bprice) Return ChildAliMsaleh objects filtered by the bprice column
 * @method     ChildAliMsaleh[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliMsaleh objects filtered by the locationbase column
 * @method     ChildAliMsaleh[]|ObjectCollection findByCrate(string $crate) Return ChildAliMsaleh objects filtered by the crate column
 * @method     ChildAliMsaleh[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliMsalehQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliMsalehQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliMsaleh', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliMsalehQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliMsalehQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliMsalehQuery) {
            return $criteria;
        }
        $query = new ChildAliMsalehQuery();
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
     * @return ChildAliMsaleh|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliMsalehTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliMsalehTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliMsaleh A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, sano1, sadate, sctime, inv_code, inv_ref, mcode, name_f, name_t, total, tot_pv, tot_bv, tot_fv, tot_weight, usercode, remark, trnf, id, sa_type, uid, lid, dl, cancel, send, txtoption, chkCash, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkInternet, chkDiscount, chkOther, txtCash, txtFuture, txtTransfer, ewallet, txtCredit1, txtCredit2, txtCredit3, txtInternet, txtDiscount, txtOther, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionInternet, optionDiscount, optionOther, discount, print, ewallet_before, ewallet_after, ipay, pay_type, hcancel, caddress, cdistrictId, camphurId, cprovinceId, czip, sender, sender_date, receive, receive_date, asend, ato_type, ato_id, online, hpv, htotal, hdate, scheck, checkportal, rcode, bmcauto, cancel_date, uid_cancel, cname, cmobile, uid_sender, uid_receive, mbase, bprice, locationbase, crate FROM ali_msaleh WHERE id = :p0';
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
            /** @var ChildAliMsaleh $obj */
            $obj = new ChildAliMsaleh();
            $obj->hydrate($row);
            AliMsalehTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliMsaleh|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliMsalehTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliMsalehTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterBySano1($sano1 = null, $comparison = null)
    {
        if (is_array($sano1)) {
            $useMinMax = false;
            if (isset($sano1['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_SANO1, $sano1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sano1['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_SANO1, $sano1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_SANO1, $sano1, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterBySctime($sctime = null, $comparison = null)
    {
        if (is_array($sctime)) {
            $useMinMax = false;
            if (isset($sctime['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_SCTIME, $sctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sctime['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_SCTIME, $sctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_SCTIME, $sctime, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByInvRef($invRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_INV_REF, $invRef, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TOT_PV, $totPv, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTotBv($totBv = null, $comparison = null)
    {
        if (is_array($totBv)) {
            $useMinMax = false;
            if (isset($totBv['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TOT_BV, $totBv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totBv['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TOT_BV, $totBv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TOT_BV, $totBv, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTotFv($totFv = null, $comparison = null)
    {
        if (is_array($totFv)) {
            $useMinMax = false;
            if (isset($totFv['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TOT_FV, $totFv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totFv['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TOT_FV, $totFv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TOT_FV, $totFv, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTotWeight($totWeight = null, $comparison = null)
    {
        if (is_array($totWeight)) {
            $useMinMax = false;
            if (isset($totWeight['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TOT_WEIGHT, $totWeight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totWeight['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TOT_WEIGHT, $totWeight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TOT_WEIGHT, $totWeight, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (is_array($trnf)) {
            $useMinMax = false;
            if (isset($trnf['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TRNF, $trnf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trnf['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TRNF, $trnf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_LID, $lid, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_SEND, $send, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByChkinternet($chkinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CHKINTERNET, $chkinternet, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByChkdiscount($chkdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CHKDISCOUNT, $chkdiscount, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByChkother($chkother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CHKOTHER, $chkother, $comparison);
    }

    /**
     * Filter the query on the txtCash column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtcash(1234); // WHERE txtCash = 1234
     * $query->filterByTxtcash(array(12, 34)); // WHERE txtCash IN (12, 34)
     * $query->filterByTxtcash(array('min' => 12)); // WHERE txtCash > 12
     * </code>
     *
     * @param     mixed $txtcash The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (is_array($txtcash)) {
            $useMinMax = false;
            if (isset($txtcash['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTCASH, $txtcash['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcash['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTCASH, $txtcash['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TXTCASH, $txtcash, $comparison);
    }

    /**
     * Filter the query on the txtFuture column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtfuture(1234); // WHERE txtFuture = 1234
     * $query->filterByTxtfuture(array(12, 34)); // WHERE txtFuture IN (12, 34)
     * $query->filterByTxtfuture(array('min' => 12)); // WHERE txtFuture > 12
     * </code>
     *
     * @param     mixed $txtfuture The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (is_array($txtfuture)) {
            $useMinMax = false;
            if (isset($txtfuture['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTFUTURE, $txtfuture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtfuture['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTFUTURE, $txtfuture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
    }

    /**
     * Filter the query on the txtTransfer column
     *
     * Example usage:
     * <code>
     * $query->filterByTxttransfer(1234); // WHERE txtTransfer = 1234
     * $query->filterByTxttransfer(array(12, 34)); // WHERE txtTransfer IN (12, 34)
     * $query->filterByTxttransfer(array('min' => 12)); // WHERE txtTransfer > 12
     * </code>
     *
     * @param     mixed $txttransfer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (is_array($txttransfer)) {
            $useMinMax = false;
            if (isset($txttransfer['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTTRANSFER, $txttransfer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTTRANSFER, $txttransfer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_EWALLET, $ewallet, $comparison);
    }

    /**
     * Filter the query on the txtCredit1 column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtcredit1(1234); // WHERE txtCredit1 = 1234
     * $query->filterByTxtcredit1(array(12, 34)); // WHERE txtCredit1 IN (12, 34)
     * $query->filterByTxtcredit1(array('min' => 12)); // WHERE txtCredit1 > 12
     * </code>
     *
     * @param     mixed $txtcredit1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (is_array($txtcredit1)) {
            $useMinMax = false;
            if (isset($txtcredit1['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTCREDIT1, $txtcredit1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit1['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTCREDIT1, $txtcredit1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
    }

    /**
     * Filter the query on the txtCredit2 column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtcredit2(1234); // WHERE txtCredit2 = 1234
     * $query->filterByTxtcredit2(array(12, 34)); // WHERE txtCredit2 IN (12, 34)
     * $query->filterByTxtcredit2(array('min' => 12)); // WHERE txtCredit2 > 12
     * </code>
     *
     * @param     mixed $txtcredit2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (is_array($txtcredit2)) {
            $useMinMax = false;
            if (isset($txtcredit2['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTCREDIT2, $txtcredit2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit2['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTCREDIT2, $txtcredit2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
    }

    /**
     * Filter the query on the txtCredit3 column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtcredit3(1234); // WHERE txtCredit3 = 1234
     * $query->filterByTxtcredit3(array(12, 34)); // WHERE txtCredit3 IN (12, 34)
     * $query->filterByTxtcredit3(array('min' => 12)); // WHERE txtCredit3 > 12
     * </code>
     *
     * @param     mixed $txtcredit3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (is_array($txtcredit3)) {
            $useMinMax = false;
            if (isset($txtcredit3['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTCREDIT3, $txtcredit3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit3['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTCREDIT3, $txtcredit3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
    }

    /**
     * Filter the query on the txtInternet column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtinternet(1234); // WHERE txtInternet = 1234
     * $query->filterByTxtinternet(array(12, 34)); // WHERE txtInternet IN (12, 34)
     * $query->filterByTxtinternet(array('min' => 12)); // WHERE txtInternet > 12
     * </code>
     *
     * @param     mixed $txtinternet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTxtinternet($txtinternet = null, $comparison = null)
    {
        if (is_array($txtinternet)) {
            $useMinMax = false;
            if (isset($txtinternet['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTINTERNET, $txtinternet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtinternet['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTINTERNET, $txtinternet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TXTINTERNET, $txtinternet, $comparison);
    }

    /**
     * Filter the query on the txtDiscount column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtdiscount(1234); // WHERE txtDiscount = 1234
     * $query->filterByTxtdiscount(array(12, 34)); // WHERE txtDiscount IN (12, 34)
     * $query->filterByTxtdiscount(array('min' => 12)); // WHERE txtDiscount > 12
     * </code>
     *
     * @param     mixed $txtdiscount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTxtdiscount($txtdiscount = null, $comparison = null)
    {
        if (is_array($txtdiscount)) {
            $useMinMax = false;
            if (isset($txtdiscount['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTDISCOUNT, $txtdiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtdiscount['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTDISCOUNT, $txtdiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TXTDISCOUNT, $txtdiscount, $comparison);
    }

    /**
     * Filter the query on the txtOther column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtother(1234); // WHERE txtOther = 1234
     * $query->filterByTxtother(array(12, 34)); // WHERE txtOther IN (12, 34)
     * $query->filterByTxtother(array('min' => 12)); // WHERE txtOther > 12
     * </code>
     *
     * @param     mixed $txtother The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByTxtother($txtother = null, $comparison = null)
    {
        if (is_array($txtother)) {
            $useMinMax = false;
            if (isset($txtother['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTOTHER, $txtother['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtother['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_TXTOTHER, $txtother['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_TXTOTHER, $txtother, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByOptioninternet($optioninternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioninternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_OPTIONINTERNET, $optioninternet, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByOptiondiscount($optiondiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiondiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_OPTIONDISCOUNT, $optiondiscount, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByOptionother($optionother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_OPTIONOTHER, $optionother, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByDiscount($discount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($discount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_DISCOUNT, $discount, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByPrint($print = null, $comparison = null)
    {
        if (is_array($print)) {
            $useMinMax = false;
            if (isset($print['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_PRINT, $print['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($print['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_PRINT, $print['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_PRINT, $print, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByIpay($ipay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipay)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_IPAY, $ipay, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByPayType($payType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_PAY_TYPE, $payType, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByHcancel($hcancel = null, $comparison = null)
    {
        if (is_array($hcancel)) {
            $useMinMax = false;
            if (isset($hcancel['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_HCANCEL, $hcancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hcancel['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_HCANCEL, $hcancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_HCANCEL, $hcancel, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByCaddress($caddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($caddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CADDRESS, $caddress, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByCdistrictid($cdistrictid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cdistrictid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CDISTRICTID, $cdistrictid, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByCamphurid($camphurid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($camphurid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CAMPHURID, $camphurid, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByCprovinceid($cprovinceid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cprovinceid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CPROVINCEID, $cprovinceid, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByCzip($czip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($czip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CZIP, $czip, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterBySender($sender = null, $comparison = null)
    {
        if (is_array($sender)) {
            $useMinMax = false;
            if (isset($sender['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_SENDER, $sender['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sender['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_SENDER, $sender['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_SENDER, $sender, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterBySenderDate($senderDate = null, $comparison = null)
    {
        if (is_array($senderDate)) {
            $useMinMax = false;
            if (isset($senderDate['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_SENDER_DATE, $senderDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($senderDate['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_SENDER_DATE, $senderDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_SENDER_DATE, $senderDate, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByReceive($receive = null, $comparison = null)
    {
        if (is_array($receive)) {
            $useMinMax = false;
            if (isset($receive['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_RECEIVE, $receive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receive['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_RECEIVE, $receive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_RECEIVE, $receive, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByReceiveDate($receiveDate = null, $comparison = null)
    {
        if (is_array($receiveDate)) {
            $useMinMax = false;
            if (isset($receiveDate['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_RECEIVE_DATE, $receiveDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiveDate['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_RECEIVE_DATE, $receiveDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_RECEIVE_DATE, $receiveDate, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByAsend($asend = null, $comparison = null)
    {
        if (is_array($asend)) {
            $useMinMax = false;
            if (isset($asend['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_ASEND, $asend['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($asend['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_ASEND, $asend['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_ASEND, $asend, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByAtoType($atoType = null, $comparison = null)
    {
        if (is_array($atoType)) {
            $useMinMax = false;
            if (isset($atoType['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_ATO_TYPE, $atoType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($atoType['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_ATO_TYPE, $atoType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_ATO_TYPE, $atoType, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByAtoId($atoId = null, $comparison = null)
    {
        if (is_array($atoId)) {
            $useMinMax = false;
            if (isset($atoId['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_ATO_ID, $atoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($atoId['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_ATO_ID, $atoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_ATO_ID, $atoId, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByOnline($online = null, $comparison = null)
    {
        if (is_array($online)) {
            $useMinMax = false;
            if (isset($online['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_ONLINE, $online['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($online['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_ONLINE, $online['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_ONLINE, $online, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByHpv($hpv = null, $comparison = null)
    {
        if (is_array($hpv)) {
            $useMinMax = false;
            if (isset($hpv['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_HPV, $hpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hpv['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_HPV, $hpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_HPV, $hpv, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByHtotal($htotal = null, $comparison = null)
    {
        if (is_array($htotal)) {
            $useMinMax = false;
            if (isset($htotal['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_HTOTAL, $htotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($htotal['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_HTOTAL, $htotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_HTOTAL, $htotal, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByHdate($hdate = null, $comparison = null)
    {
        if (is_array($hdate)) {
            $useMinMax = false;
            if (isset($hdate['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_HDATE, $hdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hdate['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_HDATE, $hdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_HDATE, $hdate, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByScheck($scheck = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scheck)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_SCHECK, $scheck, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByBmcauto($bmcauto = null, $comparison = null)
    {
        if (is_array($bmcauto)) {
            $useMinMax = false;
            if (isset($bmcauto['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_BMCAUTO, $bmcauto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bmcauto['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_BMCAUTO, $bmcauto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_BMCAUTO, $bmcauto, $comparison);
    }

    /**
     * Filter the query on the cancel_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCancelDate('2011-03-14'); // WHERE cancel_date = '2011-03-14'
     * $query->filterByCancelDate('now'); // WHERE cancel_date = '2011-03-14'
     * $query->filterByCancelDate(array('max' => 'yesterday')); // WHERE cancel_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $cancelDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
    }

    /**
     * Filter the query on the uid_cancel column
     *
     * Example usage:
     * <code>
     * $query->filterByUidCancel('fooValue');   // WHERE uid_cancel = 'fooValue'
     * $query->filterByUidCancel('%fooValue%', Criteria::LIKE); // WHERE uid_cancel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uidCancel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByCname($cname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CNAME, $cname, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByCmobile($cmobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmobile)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CMOBILE, $cmobile, $comparison);
    }

    /**
     * Filter the query on the uid_sender column
     *
     * Example usage:
     * <code>
     * $query->filterByUidSender('fooValue');   // WHERE uid_sender = 'fooValue'
     * $query->filterByUidSender('%fooValue%', Criteria::LIKE); // WHERE uid_sender LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uidSender The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByUidSender($uidSender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidSender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_UID_SENDER, $uidSender, $comparison);
    }

    /**
     * Filter the query on the uid_receive column
     *
     * Example usage:
     * <code>
     * $query->filterByUidReceive('fooValue');   // WHERE uid_receive = 'fooValue'
     * $query->filterByUidReceive('%fooValue%', Criteria::LIKE); // WHERE uid_receive LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uidReceive The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByUidReceive($uidReceive = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidReceive)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_UID_RECEIVE, $uidReceive, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_MBASE, $mbase, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliMsalehTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMsalehTableMap::COL_CRATE, $crate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliMsaleh $aliMsaleh Object to remove from the list of results
     *
     * @return $this|ChildAliMsalehQuery The current query, for fluid interface
     */
    public function prune($aliMsaleh = null)
    {
        if ($aliMsaleh) {
            $this->addUsingAlias(AliMsalehTableMap::COL_ID, $aliMsaleh->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_msaleh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMsalehTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliMsalehTableMap::clearInstancePool();
            AliMsalehTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMsalehTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliMsalehTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliMsalehTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliMsalehTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliMsalehQuery
