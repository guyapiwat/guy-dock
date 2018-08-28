<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliIsaleh as ChildAliIsaleh;
use CciOrm\CciOrm\AliIsalehQuery as ChildAliIsalehQuery;
use CciOrm\CciOrm\Map\AliIsalehTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_isaleh' table.
 *
 *
 *
 * @method     ChildAliIsalehQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliIsalehQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliIsalehQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliIsalehQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliIsalehQuery orderBySctime($order = Criteria::ASC) Order by the sctime column
 * @method     ChildAliIsalehQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliIsalehQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliIsalehQuery orderByInvFrom($order = Criteria::ASC) Order by the inv_from column
 * @method     ChildAliIsalehQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliIsalehQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliIsalehQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliIsalehQuery orderByTotBv($order = Criteria::ASC) Order by the tot_bv column
 * @method     ChildAliIsalehQuery orderByTotFv($order = Criteria::ASC) Order by the tot_fv column
 * @method     ChildAliIsalehQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliIsalehQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliIsalehQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliIsalehQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliIsalehQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliIsalehQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliIsalehQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliIsalehQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliIsalehQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliIsalehQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliIsalehQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliIsalehQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliIsalehQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliIsalehQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliIsalehQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliIsalehQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliIsalehQuery orderByChkinternet($order = Criteria::ASC) Order by the chkInternet column
 * @method     ChildAliIsalehQuery orderByChkdiscount($order = Criteria::ASC) Order by the chkDiscount column
 * @method     ChildAliIsalehQuery orderByChkother($order = Criteria::ASC) Order by the chkOther column
 * @method     ChildAliIsalehQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliIsalehQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliIsalehQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliIsalehQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliIsalehQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliIsalehQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliIsalehQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliIsalehQuery orderByTxtinternet($order = Criteria::ASC) Order by the txtInternet column
 * @method     ChildAliIsalehQuery orderByTxtdiscount($order = Criteria::ASC) Order by the txtDiscount column
 * @method     ChildAliIsalehQuery orderByTxtother($order = Criteria::ASC) Order by the txtOther column
 * @method     ChildAliIsalehQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliIsalehQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliIsalehQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliIsalehQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliIsalehQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliIsalehQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliIsalehQuery orderByOptioninternet($order = Criteria::ASC) Order by the optionInternet column
 * @method     ChildAliIsalehQuery orderByOptiondiscount($order = Criteria::ASC) Order by the optionDiscount column
 * @method     ChildAliIsalehQuery orderByOptionother($order = Criteria::ASC) Order by the optionOther column
 * @method     ChildAliIsalehQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildAliIsalehQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method     ChildAliIsalehQuery orderBySenderDate($order = Criteria::ASC) Order by the sender_date column
 * @method     ChildAliIsalehQuery orderByReceive($order = Criteria::ASC) Order by the receive column
 * @method     ChildAliIsalehQuery orderByReceiveDate($order = Criteria::ASC) Order by the receive_date column
 * @method     ChildAliIsalehQuery orderByPrint($order = Criteria::ASC) Order by the print column
 * @method     ChildAliIsalehQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliIsalehQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliIsalehQuery orderByEwallettBefore($order = Criteria::ASC) Order by the ewallett_before column
 * @method     ChildAliIsalehQuery orderByEwallettAfter($order = Criteria::ASC) Order by the ewallett_after column
 * @method     ChildAliIsalehQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliIsalehQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 * @method     ChildAliIsalehQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliIsalehQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliIsalehQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliIsalehQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliIsalehQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliIsalehQuery orderByUidReceive($order = Criteria::ASC) Order by the uid_receive column
 * @method     ChildAliIsalehQuery orderByUidSender($order = Criteria::ASC) Order by the uid_sender column
 * @method     ChildAliIsalehQuery orderByCaddress($order = Criteria::ASC) Order by the caddress column
 * @method     ChildAliIsalehQuery orderByCdistrictid($order = Criteria::ASC) Order by the cdistrictId column
 * @method     ChildAliIsalehQuery orderByCamphurid($order = Criteria::ASC) Order by the camphurId column
 * @method     ChildAliIsalehQuery orderByCprovinceid($order = Criteria::ASC) Order by the cprovinceId column
 * @method     ChildAliIsalehQuery orderByCzip($order = Criteria::ASC) Order by the czip column
 * @method     ChildAliIsalehQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildAliIsalehQuery groupBySano() Group by the sano column
 * @method     ChildAliIsalehQuery groupByNameF() Group by the name_f column
 * @method     ChildAliIsalehQuery groupByNameT() Group by the name_t column
 * @method     ChildAliIsalehQuery groupBySadate() Group by the sadate column
 * @method     ChildAliIsalehQuery groupBySctime() Group by the sctime column
 * @method     ChildAliIsalehQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliIsalehQuery groupByLid() Group by the lid column
 * @method     ChildAliIsalehQuery groupByInvFrom() Group by the inv_from column
 * @method     ChildAliIsalehQuery groupByMcode() Group by the mcode column
 * @method     ChildAliIsalehQuery groupByTotal() Group by the total column
 * @method     ChildAliIsalehQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliIsalehQuery groupByTotBv() Group by the tot_bv column
 * @method     ChildAliIsalehQuery groupByTotFv() Group by the tot_fv column
 * @method     ChildAliIsalehQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliIsalehQuery groupByRemark() Group by the remark column
 * @method     ChildAliIsalehQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliIsalehQuery groupById() Group by the id column
 * @method     ChildAliIsalehQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliIsalehQuery groupByUid() Group by the uid column
 * @method     ChildAliIsalehQuery groupByDl() Group by the dl column
 * @method     ChildAliIsalehQuery groupByCancel() Group by the cancel column
 * @method     ChildAliIsalehQuery groupBySend() Group by the send column
 * @method     ChildAliIsalehQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliIsalehQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliIsalehQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliIsalehQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliIsalehQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliIsalehQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliIsalehQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliIsalehQuery groupByChkinternet() Group by the chkInternet column
 * @method     ChildAliIsalehQuery groupByChkdiscount() Group by the chkDiscount column
 * @method     ChildAliIsalehQuery groupByChkother() Group by the chkOther column
 * @method     ChildAliIsalehQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliIsalehQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliIsalehQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliIsalehQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliIsalehQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliIsalehQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliIsalehQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliIsalehQuery groupByTxtinternet() Group by the txtInternet column
 * @method     ChildAliIsalehQuery groupByTxtdiscount() Group by the txtDiscount column
 * @method     ChildAliIsalehQuery groupByTxtother() Group by the txtOther column
 * @method     ChildAliIsalehQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliIsalehQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliIsalehQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliIsalehQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliIsalehQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliIsalehQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliIsalehQuery groupByOptioninternet() Group by the optionInternet column
 * @method     ChildAliIsalehQuery groupByOptiondiscount() Group by the optionDiscount column
 * @method     ChildAliIsalehQuery groupByOptionother() Group by the optionOther column
 * @method     ChildAliIsalehQuery groupByDiscount() Group by the discount column
 * @method     ChildAliIsalehQuery groupBySender() Group by the sender column
 * @method     ChildAliIsalehQuery groupBySenderDate() Group by the sender_date column
 * @method     ChildAliIsalehQuery groupByReceive() Group by the receive column
 * @method     ChildAliIsalehQuery groupByReceiveDate() Group by the receive_date column
 * @method     ChildAliIsalehQuery groupByPrint() Group by the print column
 * @method     ChildAliIsalehQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliIsalehQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliIsalehQuery groupByEwallettBefore() Group by the ewallett_before column
 * @method     ChildAliIsalehQuery groupByEwallettAfter() Group by the ewallett_after column
 * @method     ChildAliIsalehQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliIsalehQuery groupByUidCancel() Group by the uid_cancel column
 * @method     ChildAliIsalehQuery groupByMbase() Group by the mbase column
 * @method     ChildAliIsalehQuery groupByBprice() Group by the bprice column
 * @method     ChildAliIsalehQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliIsalehQuery groupByCrate() Group by the crate column
 * @method     ChildAliIsalehQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliIsalehQuery groupByUidReceive() Group by the uid_receive column
 * @method     ChildAliIsalehQuery groupByUidSender() Group by the uid_sender column
 * @method     ChildAliIsalehQuery groupByCaddress() Group by the caddress column
 * @method     ChildAliIsalehQuery groupByCdistrictid() Group by the cdistrictId column
 * @method     ChildAliIsalehQuery groupByCamphurid() Group by the camphurId column
 * @method     ChildAliIsalehQuery groupByCprovinceid() Group by the cprovinceId column
 * @method     ChildAliIsalehQuery groupByCzip() Group by the czip column
 * @method     ChildAliIsalehQuery groupByStatus() Group by the status column
 *
 * @method     ChildAliIsalehQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliIsalehQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliIsalehQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliIsalehQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliIsalehQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliIsalehQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliIsaleh findOne(ConnectionInterface $con = null) Return the first ChildAliIsaleh matching the query
 * @method     ChildAliIsaleh findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliIsaleh matching the query, or a new ChildAliIsaleh object populated from the query conditions when no match is found
 *
 * @method     ChildAliIsaleh findOneBySano(string $sano) Return the first ChildAliIsaleh filtered by the sano column
 * @method     ChildAliIsaleh findOneByNameF(string $name_f) Return the first ChildAliIsaleh filtered by the name_f column
 * @method     ChildAliIsaleh findOneByNameT(string $name_t) Return the first ChildAliIsaleh filtered by the name_t column
 * @method     ChildAliIsaleh findOneBySadate(string $sadate) Return the first ChildAliIsaleh filtered by the sadate column
 * @method     ChildAliIsaleh findOneBySctime(string $sctime) Return the first ChildAliIsaleh filtered by the sctime column
 * @method     ChildAliIsaleh findOneByInvCode(string $inv_code) Return the first ChildAliIsaleh filtered by the inv_code column
 * @method     ChildAliIsaleh findOneByLid(string $lid) Return the first ChildAliIsaleh filtered by the lid column
 * @method     ChildAliIsaleh findOneByInvFrom(string $inv_from) Return the first ChildAliIsaleh filtered by the inv_from column
 * @method     ChildAliIsaleh findOneByMcode(string $mcode) Return the first ChildAliIsaleh filtered by the mcode column
 * @method     ChildAliIsaleh findOneByTotal(string $total) Return the first ChildAliIsaleh filtered by the total column
 * @method     ChildAliIsaleh findOneByTotPv(string $tot_pv) Return the first ChildAliIsaleh filtered by the tot_pv column
 * @method     ChildAliIsaleh findOneByTotBv(string $tot_bv) Return the first ChildAliIsaleh filtered by the tot_bv column
 * @method     ChildAliIsaleh findOneByTotFv(string $tot_fv) Return the first ChildAliIsaleh filtered by the tot_fv column
 * @method     ChildAliIsaleh findOneByUsercode(string $usercode) Return the first ChildAliIsaleh filtered by the usercode column
 * @method     ChildAliIsaleh findOneByRemark(string $remark) Return the first ChildAliIsaleh filtered by the remark column
 * @method     ChildAliIsaleh findOneByTrnf(string $trnf) Return the first ChildAliIsaleh filtered by the trnf column
 * @method     ChildAliIsaleh findOneById(int $id) Return the first ChildAliIsaleh filtered by the id column
 * @method     ChildAliIsaleh findOneBySaType(string $sa_type) Return the first ChildAliIsaleh filtered by the sa_type column
 * @method     ChildAliIsaleh findOneByUid(string $uid) Return the first ChildAliIsaleh filtered by the uid column
 * @method     ChildAliIsaleh findOneByDl(string $dl) Return the first ChildAliIsaleh filtered by the dl column
 * @method     ChildAliIsaleh findOneByCancel(int $cancel) Return the first ChildAliIsaleh filtered by the cancel column
 * @method     ChildAliIsaleh findOneBySend(int $send) Return the first ChildAliIsaleh filtered by the send column
 * @method     ChildAliIsaleh findOneByTxtoption(string $txtoption) Return the first ChildAliIsaleh filtered by the txtoption column
 * @method     ChildAliIsaleh findOneByChkcash(string $chkCash) Return the first ChildAliIsaleh filtered by the chkCash column
 * @method     ChildAliIsaleh findOneByChkfuture(string $chkFuture) Return the first ChildAliIsaleh filtered by the chkFuture column
 * @method     ChildAliIsaleh findOneByChktransfer(string $chkTransfer) Return the first ChildAliIsaleh filtered by the chkTransfer column
 * @method     ChildAliIsaleh findOneByChkcredit1(string $chkCredit1) Return the first ChildAliIsaleh filtered by the chkCredit1 column
 * @method     ChildAliIsaleh findOneByChkcredit2(string $chkCredit2) Return the first ChildAliIsaleh filtered by the chkCredit2 column
 * @method     ChildAliIsaleh findOneByChkcredit3(string $chkCredit3) Return the first ChildAliIsaleh filtered by the chkCredit3 column
 * @method     ChildAliIsaleh findOneByChkinternet(string $chkInternet) Return the first ChildAliIsaleh filtered by the chkInternet column
 * @method     ChildAliIsaleh findOneByChkdiscount(string $chkDiscount) Return the first ChildAliIsaleh filtered by the chkDiscount column
 * @method     ChildAliIsaleh findOneByChkother(string $chkOther) Return the first ChildAliIsaleh filtered by the chkOther column
 * @method     ChildAliIsaleh findOneByTxtcash(string $txtCash) Return the first ChildAliIsaleh filtered by the txtCash column
 * @method     ChildAliIsaleh findOneByTxtfuture(string $txtFuture) Return the first ChildAliIsaleh filtered by the txtFuture column
 * @method     ChildAliIsaleh findOneByTxttransfer(string $txtTransfer) Return the first ChildAliIsaleh filtered by the txtTransfer column
 * @method     ChildAliIsaleh findOneByEwallet(string $ewallet) Return the first ChildAliIsaleh filtered by the ewallet column
 * @method     ChildAliIsaleh findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliIsaleh filtered by the txtCredit1 column
 * @method     ChildAliIsaleh findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliIsaleh filtered by the txtCredit2 column
 * @method     ChildAliIsaleh findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliIsaleh filtered by the txtCredit3 column
 * @method     ChildAliIsaleh findOneByTxtinternet(string $txtInternet) Return the first ChildAliIsaleh filtered by the txtInternet column
 * @method     ChildAliIsaleh findOneByTxtdiscount(string $txtDiscount) Return the first ChildAliIsaleh filtered by the txtDiscount column
 * @method     ChildAliIsaleh findOneByTxtother(string $txtOther) Return the first ChildAliIsaleh filtered by the txtOther column
 * @method     ChildAliIsaleh findOneByOptioncash(string $optionCash) Return the first ChildAliIsaleh filtered by the optionCash column
 * @method     ChildAliIsaleh findOneByOptionfuture(string $optionFuture) Return the first ChildAliIsaleh filtered by the optionFuture column
 * @method     ChildAliIsaleh findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliIsaleh filtered by the optionTransfer column
 * @method     ChildAliIsaleh findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliIsaleh filtered by the optionCredit1 column
 * @method     ChildAliIsaleh findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliIsaleh filtered by the optionCredit2 column
 * @method     ChildAliIsaleh findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliIsaleh filtered by the optionCredit3 column
 * @method     ChildAliIsaleh findOneByOptioninternet(string $optionInternet) Return the first ChildAliIsaleh filtered by the optionInternet column
 * @method     ChildAliIsaleh findOneByOptiondiscount(string $optionDiscount) Return the first ChildAliIsaleh filtered by the optionDiscount column
 * @method     ChildAliIsaleh findOneByOptionother(string $optionOther) Return the first ChildAliIsaleh filtered by the optionOther column
 * @method     ChildAliIsaleh findOneByDiscount(int $discount) Return the first ChildAliIsaleh filtered by the discount column
 * @method     ChildAliIsaleh findOneBySender(int $sender) Return the first ChildAliIsaleh filtered by the sender column
 * @method     ChildAliIsaleh findOneBySenderDate(string $sender_date) Return the first ChildAliIsaleh filtered by the sender_date column
 * @method     ChildAliIsaleh findOneByReceive(int $receive) Return the first ChildAliIsaleh filtered by the receive column
 * @method     ChildAliIsaleh findOneByReceiveDate(string $receive_date) Return the first ChildAliIsaleh filtered by the receive_date column
 * @method     ChildAliIsaleh findOneByPrint(int $print) Return the first ChildAliIsaleh filtered by the print column
 * @method     ChildAliIsaleh findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliIsaleh filtered by the ewallet_before column
 * @method     ChildAliIsaleh findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliIsaleh filtered by the ewallet_after column
 * @method     ChildAliIsaleh findOneByEwallettBefore(string $ewallett_before) Return the first ChildAliIsaleh filtered by the ewallett_before column
 * @method     ChildAliIsaleh findOneByEwallettAfter(string $ewallett_after) Return the first ChildAliIsaleh filtered by the ewallett_after column
 * @method     ChildAliIsaleh findOneByCancelDate(string $cancel_date) Return the first ChildAliIsaleh filtered by the cancel_date column
 * @method     ChildAliIsaleh findOneByUidCancel(string $uid_cancel) Return the first ChildAliIsaleh filtered by the uid_cancel column
 * @method     ChildAliIsaleh findOneByMbase(string $mbase) Return the first ChildAliIsaleh filtered by the mbase column
 * @method     ChildAliIsaleh findOneByBprice(string $bprice) Return the first ChildAliIsaleh filtered by the bprice column
 * @method     ChildAliIsaleh findOneByLocationbase(int $locationbase) Return the first ChildAliIsaleh filtered by the locationbase column
 * @method     ChildAliIsaleh findOneByCrate(string $crate) Return the first ChildAliIsaleh filtered by the crate column
 * @method     ChildAliIsaleh findOneByCheckportal(int $checkportal) Return the first ChildAliIsaleh filtered by the checkportal column
 * @method     ChildAliIsaleh findOneByUidReceive(string $uid_receive) Return the first ChildAliIsaleh filtered by the uid_receive column
 * @method     ChildAliIsaleh findOneByUidSender(string $uid_sender) Return the first ChildAliIsaleh filtered by the uid_sender column
 * @method     ChildAliIsaleh findOneByCaddress(string $caddress) Return the first ChildAliIsaleh filtered by the caddress column
 * @method     ChildAliIsaleh findOneByCdistrictid(string $cdistrictId) Return the first ChildAliIsaleh filtered by the cdistrictId column
 * @method     ChildAliIsaleh findOneByCamphurid(string $camphurId) Return the first ChildAliIsaleh filtered by the camphurId column
 * @method     ChildAliIsaleh findOneByCprovinceid(string $cprovinceId) Return the first ChildAliIsaleh filtered by the cprovinceId column
 * @method     ChildAliIsaleh findOneByCzip(string $czip) Return the first ChildAliIsaleh filtered by the czip column
 * @method     ChildAliIsaleh findOneByStatus(int $status) Return the first ChildAliIsaleh filtered by the status column *

 * @method     ChildAliIsaleh requirePk($key, ConnectionInterface $con = null) Return the ChildAliIsaleh by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOne(ConnectionInterface $con = null) Return the first ChildAliIsaleh matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliIsaleh requireOneBySano(string $sano) Return the first ChildAliIsaleh filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByNameF(string $name_f) Return the first ChildAliIsaleh filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByNameT(string $name_t) Return the first ChildAliIsaleh filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneBySadate(string $sadate) Return the first ChildAliIsaleh filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneBySctime(string $sctime) Return the first ChildAliIsaleh filtered by the sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByInvCode(string $inv_code) Return the first ChildAliIsaleh filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByLid(string $lid) Return the first ChildAliIsaleh filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByInvFrom(string $inv_from) Return the first ChildAliIsaleh filtered by the inv_from column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByMcode(string $mcode) Return the first ChildAliIsaleh filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTotal(string $total) Return the first ChildAliIsaleh filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTotPv(string $tot_pv) Return the first ChildAliIsaleh filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTotBv(string $tot_bv) Return the first ChildAliIsaleh filtered by the tot_bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTotFv(string $tot_fv) Return the first ChildAliIsaleh filtered by the tot_fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByUsercode(string $usercode) Return the first ChildAliIsaleh filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByRemark(string $remark) Return the first ChildAliIsaleh filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTrnf(string $trnf) Return the first ChildAliIsaleh filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneById(int $id) Return the first ChildAliIsaleh filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneBySaType(string $sa_type) Return the first ChildAliIsaleh filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByUid(string $uid) Return the first ChildAliIsaleh filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByDl(string $dl) Return the first ChildAliIsaleh filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByCancel(int $cancel) Return the first ChildAliIsaleh filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneBySend(int $send) Return the first ChildAliIsaleh filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTxtoption(string $txtoption) Return the first ChildAliIsaleh filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByChkcash(string $chkCash) Return the first ChildAliIsaleh filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByChkfuture(string $chkFuture) Return the first ChildAliIsaleh filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByChktransfer(string $chkTransfer) Return the first ChildAliIsaleh filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliIsaleh filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliIsaleh filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliIsaleh filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByChkinternet(string $chkInternet) Return the first ChildAliIsaleh filtered by the chkInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByChkdiscount(string $chkDiscount) Return the first ChildAliIsaleh filtered by the chkDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByChkother(string $chkOther) Return the first ChildAliIsaleh filtered by the chkOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTxtcash(string $txtCash) Return the first ChildAliIsaleh filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTxtfuture(string $txtFuture) Return the first ChildAliIsaleh filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliIsaleh filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByEwallet(string $ewallet) Return the first ChildAliIsaleh filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliIsaleh filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliIsaleh filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliIsaleh filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTxtinternet(string $txtInternet) Return the first ChildAliIsaleh filtered by the txtInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTxtdiscount(string $txtDiscount) Return the first ChildAliIsaleh filtered by the txtDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByTxtother(string $txtOther) Return the first ChildAliIsaleh filtered by the txtOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByOptioncash(string $optionCash) Return the first ChildAliIsaleh filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByOptionfuture(string $optionFuture) Return the first ChildAliIsaleh filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliIsaleh filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliIsaleh filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliIsaleh filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliIsaleh filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByOptioninternet(string $optionInternet) Return the first ChildAliIsaleh filtered by the optionInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByOptiondiscount(string $optionDiscount) Return the first ChildAliIsaleh filtered by the optionDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByOptionother(string $optionOther) Return the first ChildAliIsaleh filtered by the optionOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByDiscount(int $discount) Return the first ChildAliIsaleh filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneBySender(int $sender) Return the first ChildAliIsaleh filtered by the sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneBySenderDate(string $sender_date) Return the first ChildAliIsaleh filtered by the sender_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByReceive(int $receive) Return the first ChildAliIsaleh filtered by the receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByReceiveDate(string $receive_date) Return the first ChildAliIsaleh filtered by the receive_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByPrint(int $print) Return the first ChildAliIsaleh filtered by the print column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliIsaleh filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliIsaleh filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByEwallettBefore(string $ewallett_before) Return the first ChildAliIsaleh filtered by the ewallett_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByEwallettAfter(string $ewallett_after) Return the first ChildAliIsaleh filtered by the ewallett_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByCancelDate(string $cancel_date) Return the first ChildAliIsaleh filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByUidCancel(string $uid_cancel) Return the first ChildAliIsaleh filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByMbase(string $mbase) Return the first ChildAliIsaleh filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByBprice(string $bprice) Return the first ChildAliIsaleh filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByLocationbase(int $locationbase) Return the first ChildAliIsaleh filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByCrate(string $crate) Return the first ChildAliIsaleh filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByCheckportal(int $checkportal) Return the first ChildAliIsaleh filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByUidReceive(string $uid_receive) Return the first ChildAliIsaleh filtered by the uid_receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByUidSender(string $uid_sender) Return the first ChildAliIsaleh filtered by the uid_sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByCaddress(string $caddress) Return the first ChildAliIsaleh filtered by the caddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByCdistrictid(string $cdistrictId) Return the first ChildAliIsaleh filtered by the cdistrictId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByCamphurid(string $camphurId) Return the first ChildAliIsaleh filtered by the camphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByCprovinceid(string $cprovinceId) Return the first ChildAliIsaleh filtered by the cprovinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByCzip(string $czip) Return the first ChildAliIsaleh filtered by the czip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIsaleh requireOneByStatus(int $status) Return the first ChildAliIsaleh filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliIsaleh[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliIsaleh objects based on current ModelCriteria
 * @method     ChildAliIsaleh[]|ObjectCollection findBySano(string $sano) Return ChildAliIsaleh objects filtered by the sano column
 * @method     ChildAliIsaleh[]|ObjectCollection findByNameF(string $name_f) Return ChildAliIsaleh objects filtered by the name_f column
 * @method     ChildAliIsaleh[]|ObjectCollection findByNameT(string $name_t) Return ChildAliIsaleh objects filtered by the name_t column
 * @method     ChildAliIsaleh[]|ObjectCollection findBySadate(string $sadate) Return ChildAliIsaleh objects filtered by the sadate column
 * @method     ChildAliIsaleh[]|ObjectCollection findBySctime(string $sctime) Return ChildAliIsaleh objects filtered by the sctime column
 * @method     ChildAliIsaleh[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliIsaleh objects filtered by the inv_code column
 * @method     ChildAliIsaleh[]|ObjectCollection findByLid(string $lid) Return ChildAliIsaleh objects filtered by the lid column
 * @method     ChildAliIsaleh[]|ObjectCollection findByInvFrom(string $inv_from) Return ChildAliIsaleh objects filtered by the inv_from column
 * @method     ChildAliIsaleh[]|ObjectCollection findByMcode(string $mcode) Return ChildAliIsaleh objects filtered by the mcode column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTotal(string $total) Return ChildAliIsaleh objects filtered by the total column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliIsaleh objects filtered by the tot_pv column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTotBv(string $tot_bv) Return ChildAliIsaleh objects filtered by the tot_bv column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTotFv(string $tot_fv) Return ChildAliIsaleh objects filtered by the tot_fv column
 * @method     ChildAliIsaleh[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliIsaleh objects filtered by the usercode column
 * @method     ChildAliIsaleh[]|ObjectCollection findByRemark(string $remark) Return ChildAliIsaleh objects filtered by the remark column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTrnf(string $trnf) Return ChildAliIsaleh objects filtered by the trnf column
 * @method     ChildAliIsaleh[]|ObjectCollection findById(int $id) Return ChildAliIsaleh objects filtered by the id column
 * @method     ChildAliIsaleh[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliIsaleh objects filtered by the sa_type column
 * @method     ChildAliIsaleh[]|ObjectCollection findByUid(string $uid) Return ChildAliIsaleh objects filtered by the uid column
 * @method     ChildAliIsaleh[]|ObjectCollection findByDl(string $dl) Return ChildAliIsaleh objects filtered by the dl column
 * @method     ChildAliIsaleh[]|ObjectCollection findByCancel(int $cancel) Return ChildAliIsaleh objects filtered by the cancel column
 * @method     ChildAliIsaleh[]|ObjectCollection findBySend(int $send) Return ChildAliIsaleh objects filtered by the send column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliIsaleh objects filtered by the txtoption column
 * @method     ChildAliIsaleh[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliIsaleh objects filtered by the chkCash column
 * @method     ChildAliIsaleh[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliIsaleh objects filtered by the chkFuture column
 * @method     ChildAliIsaleh[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliIsaleh objects filtered by the chkTransfer column
 * @method     ChildAliIsaleh[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliIsaleh objects filtered by the chkCredit1 column
 * @method     ChildAliIsaleh[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliIsaleh objects filtered by the chkCredit2 column
 * @method     ChildAliIsaleh[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliIsaleh objects filtered by the chkCredit3 column
 * @method     ChildAliIsaleh[]|ObjectCollection findByChkinternet(string $chkInternet) Return ChildAliIsaleh objects filtered by the chkInternet column
 * @method     ChildAliIsaleh[]|ObjectCollection findByChkdiscount(string $chkDiscount) Return ChildAliIsaleh objects filtered by the chkDiscount column
 * @method     ChildAliIsaleh[]|ObjectCollection findByChkother(string $chkOther) Return ChildAliIsaleh objects filtered by the chkOther column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliIsaleh objects filtered by the txtCash column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliIsaleh objects filtered by the txtFuture column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliIsaleh objects filtered by the txtTransfer column
 * @method     ChildAliIsaleh[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliIsaleh objects filtered by the ewallet column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliIsaleh objects filtered by the txtCredit1 column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliIsaleh objects filtered by the txtCredit2 column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliIsaleh objects filtered by the txtCredit3 column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTxtinternet(string $txtInternet) Return ChildAliIsaleh objects filtered by the txtInternet column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTxtdiscount(string $txtDiscount) Return ChildAliIsaleh objects filtered by the txtDiscount column
 * @method     ChildAliIsaleh[]|ObjectCollection findByTxtother(string $txtOther) Return ChildAliIsaleh objects filtered by the txtOther column
 * @method     ChildAliIsaleh[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliIsaleh objects filtered by the optionCash column
 * @method     ChildAliIsaleh[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliIsaleh objects filtered by the optionFuture column
 * @method     ChildAliIsaleh[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliIsaleh objects filtered by the optionTransfer column
 * @method     ChildAliIsaleh[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliIsaleh objects filtered by the optionCredit1 column
 * @method     ChildAliIsaleh[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliIsaleh objects filtered by the optionCredit2 column
 * @method     ChildAliIsaleh[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliIsaleh objects filtered by the optionCredit3 column
 * @method     ChildAliIsaleh[]|ObjectCollection findByOptioninternet(string $optionInternet) Return ChildAliIsaleh objects filtered by the optionInternet column
 * @method     ChildAliIsaleh[]|ObjectCollection findByOptiondiscount(string $optionDiscount) Return ChildAliIsaleh objects filtered by the optionDiscount column
 * @method     ChildAliIsaleh[]|ObjectCollection findByOptionother(string $optionOther) Return ChildAliIsaleh objects filtered by the optionOther column
 * @method     ChildAliIsaleh[]|ObjectCollection findByDiscount(int $discount) Return ChildAliIsaleh objects filtered by the discount column
 * @method     ChildAliIsaleh[]|ObjectCollection findBySender(int $sender) Return ChildAliIsaleh objects filtered by the sender column
 * @method     ChildAliIsaleh[]|ObjectCollection findBySenderDate(string $sender_date) Return ChildAliIsaleh objects filtered by the sender_date column
 * @method     ChildAliIsaleh[]|ObjectCollection findByReceive(int $receive) Return ChildAliIsaleh objects filtered by the receive column
 * @method     ChildAliIsaleh[]|ObjectCollection findByReceiveDate(string $receive_date) Return ChildAliIsaleh objects filtered by the receive_date column
 * @method     ChildAliIsaleh[]|ObjectCollection findByPrint(int $print) Return ChildAliIsaleh objects filtered by the print column
 * @method     ChildAliIsaleh[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliIsaleh objects filtered by the ewallet_before column
 * @method     ChildAliIsaleh[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliIsaleh objects filtered by the ewallet_after column
 * @method     ChildAliIsaleh[]|ObjectCollection findByEwallettBefore(string $ewallett_before) Return ChildAliIsaleh objects filtered by the ewallett_before column
 * @method     ChildAliIsaleh[]|ObjectCollection findByEwallettAfter(string $ewallett_after) Return ChildAliIsaleh objects filtered by the ewallett_after column
 * @method     ChildAliIsaleh[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliIsaleh objects filtered by the cancel_date column
 * @method     ChildAliIsaleh[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliIsaleh objects filtered by the uid_cancel column
 * @method     ChildAliIsaleh[]|ObjectCollection findByMbase(string $mbase) Return ChildAliIsaleh objects filtered by the mbase column
 * @method     ChildAliIsaleh[]|ObjectCollection findByBprice(string $bprice) Return ChildAliIsaleh objects filtered by the bprice column
 * @method     ChildAliIsaleh[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliIsaleh objects filtered by the locationbase column
 * @method     ChildAliIsaleh[]|ObjectCollection findByCrate(string $crate) Return ChildAliIsaleh objects filtered by the crate column
 * @method     ChildAliIsaleh[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliIsaleh objects filtered by the checkportal column
 * @method     ChildAliIsaleh[]|ObjectCollection findByUidReceive(string $uid_receive) Return ChildAliIsaleh objects filtered by the uid_receive column
 * @method     ChildAliIsaleh[]|ObjectCollection findByUidSender(string $uid_sender) Return ChildAliIsaleh objects filtered by the uid_sender column
 * @method     ChildAliIsaleh[]|ObjectCollection findByCaddress(string $caddress) Return ChildAliIsaleh objects filtered by the caddress column
 * @method     ChildAliIsaleh[]|ObjectCollection findByCdistrictid(string $cdistrictId) Return ChildAliIsaleh objects filtered by the cdistrictId column
 * @method     ChildAliIsaleh[]|ObjectCollection findByCamphurid(string $camphurId) Return ChildAliIsaleh objects filtered by the camphurId column
 * @method     ChildAliIsaleh[]|ObjectCollection findByCprovinceid(string $cprovinceId) Return ChildAliIsaleh objects filtered by the cprovinceId column
 * @method     ChildAliIsaleh[]|ObjectCollection findByCzip(string $czip) Return ChildAliIsaleh objects filtered by the czip column
 * @method     ChildAliIsaleh[]|ObjectCollection findByStatus(int $status) Return ChildAliIsaleh objects filtered by the status column
 * @method     ChildAliIsaleh[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliIsalehQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliIsalehQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliIsaleh', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliIsalehQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliIsalehQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliIsalehQuery) {
            return $criteria;
        }
        $query = new ChildAliIsalehQuery();
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
     * @return ChildAliIsaleh|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliIsalehTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliIsalehTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliIsaleh A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, name_f, name_t, sadate, sctime, inv_code, lid, inv_from, mcode, total, tot_pv, tot_bv, tot_fv, usercode, remark, trnf, id, sa_type, uid, dl, cancel, send, txtoption, chkCash, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkInternet, chkDiscount, chkOther, txtCash, txtFuture, txtTransfer, ewallet, txtCredit1, txtCredit2, txtCredit3, txtInternet, txtDiscount, txtOther, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionInternet, optionDiscount, optionOther, discount, sender, sender_date, receive, receive_date, print, ewallet_before, ewallet_after, ewallett_before, ewallett_after, cancel_date, uid_cancel, mbase, bprice, locationbase, crate, checkportal, uid_receive, uid_sender, caddress, cdistrictId, camphurId, cprovinceId, czip, status FROM ali_isaleh WHERE id = :p0';
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
            /** @var ChildAliIsaleh $obj */
            $obj = new ChildAliIsaleh();
            $obj->hydrate($row);
            AliIsalehTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliIsaleh|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliIsalehTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliIsalehTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterBySctime($sctime = null, $comparison = null)
    {
        if (is_array($sctime)) {
            $useMinMax = false;
            if (isset($sctime['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_SCTIME, $sctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sctime['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_SCTIME, $sctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_SCTIME, $sctime, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_LID, $lid, $comparison);
    }

    /**
     * Filter the query on the inv_from column
     *
     * Example usage:
     * <code>
     * $query->filterByInvFrom('fooValue');   // WHERE inv_from = 'fooValue'
     * $query->filterByInvFrom('%fooValue%', Criteria::LIKE); // WHERE inv_from LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invFrom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByInvFrom($invFrom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invFrom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_INV_FROM, $invFrom, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TOT_PV, $totPv, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTotBv($totBv = null, $comparison = null)
    {
        if (is_array($totBv)) {
            $useMinMax = false;
            if (isset($totBv['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_TOT_BV, $totBv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totBv['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_TOT_BV, $totBv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TOT_BV, $totBv, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTotFv($totFv = null, $comparison = null)
    {
        if (is_array($totFv)) {
            $useMinMax = false;
            if (isset($totFv['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_TOT_FV, $totFv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totFv['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_TOT_FV, $totFv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TOT_FV, $totFv, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_REMARK, $remark, $comparison);
    }

    /**
     * Filter the query on the trnf column
     *
     * Example usage:
     * <code>
     * $query->filterByTrnf('fooValue');   // WHERE trnf = 'fooValue'
     * $query->filterByTrnf('%fooValue%', Criteria::LIKE); // WHERE trnf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trnf The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trnf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_SEND, $send, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByChkinternet($chkinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CHKINTERNET, $chkinternet, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByChkdiscount($chkdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CHKDISCOUNT, $chkdiscount, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByChkother($chkother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CHKOTHER, $chkother, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txttransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTxtinternet($txtinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TXTINTERNET, $txtinternet, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTxtdiscount($txtdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TXTDISCOUNT, $txtdiscount, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByTxtother($txtother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_TXTOTHER, $txtother, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByOptioninternet($optioninternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioninternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_OPTIONINTERNET, $optioninternet, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByOptiondiscount($optiondiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiondiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_OPTIONDISCOUNT, $optiondiscount, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByOptionother($optionother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_OPTIONOTHER, $optionother, $comparison);
    }

    /**
     * Filter the query on the discount column
     *
     * Example usage:
     * <code>
     * $query->filterByDiscount(1234); // WHERE discount = 1234
     * $query->filterByDiscount(array(12, 34)); // WHERE discount IN (12, 34)
     * $query->filterByDiscount(array('min' => 12)); // WHERE discount > 12
     * </code>
     *
     * @param     mixed $discount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByDiscount($discount = null, $comparison = null)
    {
        if (is_array($discount)) {
            $useMinMax = false;
            if (isset($discount['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_DISCOUNT, $discount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($discount['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_DISCOUNT, $discount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_DISCOUNT, $discount, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterBySender($sender = null, $comparison = null)
    {
        if (is_array($sender)) {
            $useMinMax = false;
            if (isset($sender['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_SENDER, $sender['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sender['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_SENDER, $sender['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_SENDER, $sender, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterBySenderDate($senderDate = null, $comparison = null)
    {
        if (is_array($senderDate)) {
            $useMinMax = false;
            if (isset($senderDate['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_SENDER_DATE, $senderDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($senderDate['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_SENDER_DATE, $senderDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_SENDER_DATE, $senderDate, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByReceive($receive = null, $comparison = null)
    {
        if (is_array($receive)) {
            $useMinMax = false;
            if (isset($receive['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_RECEIVE, $receive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receive['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_RECEIVE, $receive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_RECEIVE, $receive, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByReceiveDate($receiveDate = null, $comparison = null)
    {
        if (is_array($receiveDate)) {
            $useMinMax = false;
            if (isset($receiveDate['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_RECEIVE_DATE, $receiveDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiveDate['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_RECEIVE_DATE, $receiveDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_RECEIVE_DATE, $receiveDate, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByPrint($print = null, $comparison = null)
    {
        if (is_array($print)) {
            $useMinMax = false;
            if (isset($print['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_PRINT, $print['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($print['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_PRINT, $print['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_PRINT, $print, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
    }

    /**
     * Filter the query on the ewallett_before column
     *
     * Example usage:
     * <code>
     * $query->filterByEwallettBefore(1234); // WHERE ewallett_before = 1234
     * $query->filterByEwallettBefore(array(12, 34)); // WHERE ewallett_before IN (12, 34)
     * $query->filterByEwallettBefore(array('min' => 12)); // WHERE ewallett_before > 12
     * </code>
     *
     * @param     mixed $ewallettBefore The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByEwallettBefore($ewallettBefore = null, $comparison = null)
    {
        if (is_array($ewallettBefore)) {
            $useMinMax = false;
            if (isset($ewallettBefore['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_EWALLETT_BEFORE, $ewallettBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallettBefore['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_EWALLETT_BEFORE, $ewallettBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_EWALLETT_BEFORE, $ewallettBefore, $comparison);
    }

    /**
     * Filter the query on the ewallett_after column
     *
     * Example usage:
     * <code>
     * $query->filterByEwallettAfter(1234); // WHERE ewallett_after = 1234
     * $query->filterByEwallettAfter(array(12, 34)); // WHERE ewallett_after IN (12, 34)
     * $query->filterByEwallettAfter(array('min' => 12)); // WHERE ewallett_after > 12
     * </code>
     *
     * @param     mixed $ewallettAfter The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByEwallettAfter($ewallettAfter = null, $comparison = null)
    {
        if (is_array($ewallettAfter)) {
            $useMinMax = false;
            if (isset($ewallettAfter['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_EWALLETT_AFTER, $ewallettAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallettAfter['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_EWALLETT_AFTER, $ewallettAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_EWALLETT_AFTER, $ewallettAfter, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_MBASE, $mbase, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByUidReceive($uidReceive = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidReceive)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_UID_RECEIVE, $uidReceive, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByUidSender($uidSender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidSender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_UID_SENDER, $uidSender, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByCaddress($caddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($caddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CADDRESS, $caddress, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByCdistrictid($cdistrictid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cdistrictid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CDISTRICTID, $cdistrictid, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByCamphurid($camphurid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($camphurid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CAMPHURID, $camphurid, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByCprovinceid($cprovinceid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cprovinceid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CPROVINCEID, $cprovinceid, $comparison);
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
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByCzip($czip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($czip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_CZIP, $czip, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(AliIsalehTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIsalehTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliIsaleh $aliIsaleh Object to remove from the list of results
     *
     * @return $this|ChildAliIsalehQuery The current query, for fluid interface
     */
    public function prune($aliIsaleh = null)
    {
        if ($aliIsaleh) {
            $this->addUsingAlias(AliIsalehTableMap::COL_ID, $aliIsaleh->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_isaleh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliIsalehTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliIsalehTableMap::clearInstancePool();
            AliIsalehTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliIsalehTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliIsalehTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliIsalehTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliIsalehTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliIsalehQuery
