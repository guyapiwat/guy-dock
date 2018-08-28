<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliEwalletTranfer as ChildAliEwalletTranfer;
use CciOrm\CciOrm\AliEwalletTranferQuery as ChildAliEwalletTranferQuery;
use CciOrm\CciOrm\Map\AliEwalletTranferTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_ewallet_tranfer' table.
 *
 *
 *
 * @method     ChildAliEwalletTranferQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliEwalletTranferQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliEwalletTranferQuery orderBySctime($order = Criteria::ASC) Order by the sctime column
 * @method     ChildAliEwalletTranferQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliEwalletTranferQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliEwalletTranferQuery orderBySmcode($order = Criteria::ASC) Order by the smcode column
 * @method     ChildAliEwalletTranferQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliEwalletTranferQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliEwalletTranferQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliEwalletTranferQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliEwalletTranferQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliEwalletTranferQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliEwalletTranferQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliEwalletTranferQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliEwalletTranferQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliEwalletTranferQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliEwalletTranferQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliEwalletTranferQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliEwalletTranferQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliEwalletTranferQuery orderByTxtmoney($order = Criteria::ASC) Order by the txtMoney column
 * @method     ChildAliEwalletTranferQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliEwalletTranferQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliEwalletTranferQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliEwalletTranferQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliEwalletTranferQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliEwalletTranferQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliEwalletTranferQuery orderByChkinternet($order = Criteria::ASC) Order by the chkInternet column
 * @method     ChildAliEwalletTranferQuery orderByChkcommission($order = Criteria::ASC) Order by the chkCommission column
 * @method     ChildAliEwalletTranferQuery orderByChkwithdraw($order = Criteria::ASC) Order by the chkWithdraw column
 * @method     ChildAliEwalletTranferQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliEwalletTranferQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliEwalletTranferQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliEwalletTranferQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliEwalletTranferQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliEwalletTranferQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliEwalletTranferQuery orderByTxtinternet($order = Criteria::ASC) Order by the txtInternet column
 * @method     ChildAliEwalletTranferQuery orderByTxtcommission($order = Criteria::ASC) Order by the txtCommission column
 * @method     ChildAliEwalletTranferQuery orderByTxtwithdraw($order = Criteria::ASC) Order by the txtWithdraw column
 * @method     ChildAliEwalletTranferQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliEwalletTranferQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliEwalletTranferQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliEwalletTranferQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliEwalletTranferQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliEwalletTranferQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliEwalletTranferQuery orderByOptioninternet($order = Criteria::ASC) Order by the optionInternet column
 * @method     ChildAliEwalletTranferQuery orderByOptioncommission($order = Criteria::ASC) Order by the optionCommission column
 * @method     ChildAliEwalletTranferQuery orderByOptionwithdraw($order = Criteria::ASC) Order by the optionWithdraw column
 * @method     ChildAliEwalletTranferQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliEwalletTranferQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliEwalletTranferQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliEwalletTranferQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliEwalletTranferQuery orderByIpay($order = Criteria::ASC) Order by the ipay column
 * @method     ChildAliEwalletTranferQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliEwalletTranferQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliEwalletTranferQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliEwalletTranferQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 * @method     ChildAliEwalletTranferQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliEwalletTranferQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliEwalletTranferQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliEwalletTranferQuery orderByEcheck($order = Criteria::ASC) Order by the echeck column
 *
 * @method     ChildAliEwalletTranferQuery groupBySano() Group by the sano column
 * @method     ChildAliEwalletTranferQuery groupBySadate() Group by the sadate column
 * @method     ChildAliEwalletTranferQuery groupBySctime() Group by the sctime column
 * @method     ChildAliEwalletTranferQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliEwalletTranferQuery groupByMcode() Group by the mcode column
 * @method     ChildAliEwalletTranferQuery groupBySmcode() Group by the smcode column
 * @method     ChildAliEwalletTranferQuery groupByNameF() Group by the name_f column
 * @method     ChildAliEwalletTranferQuery groupByNameT() Group by the name_t column
 * @method     ChildAliEwalletTranferQuery groupByTotal() Group by the total column
 * @method     ChildAliEwalletTranferQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliEwalletTranferQuery groupByRemark() Group by the remark column
 * @method     ChildAliEwalletTranferQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliEwalletTranferQuery groupById() Group by the id column
 * @method     ChildAliEwalletTranferQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliEwalletTranferQuery groupByUid() Group by the uid column
 * @method     ChildAliEwalletTranferQuery groupByLid() Group by the lid column
 * @method     ChildAliEwalletTranferQuery groupByDl() Group by the dl column
 * @method     ChildAliEwalletTranferQuery groupByCancel() Group by the cancel column
 * @method     ChildAliEwalletTranferQuery groupBySend() Group by the send column
 * @method     ChildAliEwalletTranferQuery groupByTxtmoney() Group by the txtMoney column
 * @method     ChildAliEwalletTranferQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliEwalletTranferQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliEwalletTranferQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliEwalletTranferQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliEwalletTranferQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliEwalletTranferQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliEwalletTranferQuery groupByChkinternet() Group by the chkInternet column
 * @method     ChildAliEwalletTranferQuery groupByChkcommission() Group by the chkCommission column
 * @method     ChildAliEwalletTranferQuery groupByChkwithdraw() Group by the chkWithdraw column
 * @method     ChildAliEwalletTranferQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliEwalletTranferQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliEwalletTranferQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliEwalletTranferQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliEwalletTranferQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliEwalletTranferQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliEwalletTranferQuery groupByTxtinternet() Group by the txtInternet column
 * @method     ChildAliEwalletTranferQuery groupByTxtcommission() Group by the txtCommission column
 * @method     ChildAliEwalletTranferQuery groupByTxtwithdraw() Group by the txtWithdraw column
 * @method     ChildAliEwalletTranferQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliEwalletTranferQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliEwalletTranferQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliEwalletTranferQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliEwalletTranferQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliEwalletTranferQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliEwalletTranferQuery groupByOptioninternet() Group by the optionInternet column
 * @method     ChildAliEwalletTranferQuery groupByOptioncommission() Group by the optionCommission column
 * @method     ChildAliEwalletTranferQuery groupByOptionwithdraw() Group by the optionWithdraw column
 * @method     ChildAliEwalletTranferQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliEwalletTranferQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliEwalletTranferQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliEwalletTranferQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliEwalletTranferQuery groupByIpay() Group by the ipay column
 * @method     ChildAliEwalletTranferQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliEwalletTranferQuery groupByBprice() Group by the bprice column
 * @method     ChildAliEwalletTranferQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliEwalletTranferQuery groupByUidCancel() Group by the uid_cancel column
 * @method     ChildAliEwalletTranferQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliEwalletTranferQuery groupByMbase() Group by the mbase column
 * @method     ChildAliEwalletTranferQuery groupByCrate() Group by the crate column
 * @method     ChildAliEwalletTranferQuery groupByEcheck() Group by the echeck column
 *
 * @method     ChildAliEwalletTranferQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliEwalletTranferQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliEwalletTranferQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliEwalletTranferQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliEwalletTranferQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliEwalletTranferQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliEwalletTranfer findOne(ConnectionInterface $con = null) Return the first ChildAliEwalletTranfer matching the query
 * @method     ChildAliEwalletTranfer findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliEwalletTranfer matching the query, or a new ChildAliEwalletTranfer object populated from the query conditions when no match is found
 *
 * @method     ChildAliEwalletTranfer findOneBySano(string $sano) Return the first ChildAliEwalletTranfer filtered by the sano column
 * @method     ChildAliEwalletTranfer findOneBySadate(string $sadate) Return the first ChildAliEwalletTranfer filtered by the sadate column
 * @method     ChildAliEwalletTranfer findOneBySctime(string $sctime) Return the first ChildAliEwalletTranfer filtered by the sctime column
 * @method     ChildAliEwalletTranfer findOneByInvCode(string $inv_code) Return the first ChildAliEwalletTranfer filtered by the inv_code column
 * @method     ChildAliEwalletTranfer findOneByMcode(string $mcode) Return the first ChildAliEwalletTranfer filtered by the mcode column
 * @method     ChildAliEwalletTranfer findOneBySmcode(string $smcode) Return the first ChildAliEwalletTranfer filtered by the smcode column
 * @method     ChildAliEwalletTranfer findOneByNameF(string $name_f) Return the first ChildAliEwalletTranfer filtered by the name_f column
 * @method     ChildAliEwalletTranfer findOneByNameT(string $name_t) Return the first ChildAliEwalletTranfer filtered by the name_t column
 * @method     ChildAliEwalletTranfer findOneByTotal(string $total) Return the first ChildAliEwalletTranfer filtered by the total column
 * @method     ChildAliEwalletTranfer findOneByUsercode(string $usercode) Return the first ChildAliEwalletTranfer filtered by the usercode column
 * @method     ChildAliEwalletTranfer findOneByRemark(string $remark) Return the first ChildAliEwalletTranfer filtered by the remark column
 * @method     ChildAliEwalletTranfer findOneByTrnf(string $trnf) Return the first ChildAliEwalletTranfer filtered by the trnf column
 * @method     ChildAliEwalletTranfer findOneById(int $id) Return the first ChildAliEwalletTranfer filtered by the id column
 * @method     ChildAliEwalletTranfer findOneBySaType(string $sa_type) Return the first ChildAliEwalletTranfer filtered by the sa_type column
 * @method     ChildAliEwalletTranfer findOneByUid(string $uid) Return the first ChildAliEwalletTranfer filtered by the uid column
 * @method     ChildAliEwalletTranfer findOneByLid(string $lid) Return the first ChildAliEwalletTranfer filtered by the lid column
 * @method     ChildAliEwalletTranfer findOneByDl(string $dl) Return the first ChildAliEwalletTranfer filtered by the dl column
 * @method     ChildAliEwalletTranfer findOneByCancel(int $cancel) Return the first ChildAliEwalletTranfer filtered by the cancel column
 * @method     ChildAliEwalletTranfer findOneBySend(int $send) Return the first ChildAliEwalletTranfer filtered by the send column
 * @method     ChildAliEwalletTranfer findOneByTxtmoney(string $txtMoney) Return the first ChildAliEwalletTranfer filtered by the txtMoney column
 * @method     ChildAliEwalletTranfer findOneByChkcash(string $chkCash) Return the first ChildAliEwalletTranfer filtered by the chkCash column
 * @method     ChildAliEwalletTranfer findOneByChkfuture(string $chkFuture) Return the first ChildAliEwalletTranfer filtered by the chkFuture column
 * @method     ChildAliEwalletTranfer findOneByChktransfer(string $chkTransfer) Return the first ChildAliEwalletTranfer filtered by the chkTransfer column
 * @method     ChildAliEwalletTranfer findOneByChkcredit1(string $chkCredit1) Return the first ChildAliEwalletTranfer filtered by the chkCredit1 column
 * @method     ChildAliEwalletTranfer findOneByChkcredit2(string $chkCredit2) Return the first ChildAliEwalletTranfer filtered by the chkCredit2 column
 * @method     ChildAliEwalletTranfer findOneByChkcredit3(string $chkCredit3) Return the first ChildAliEwalletTranfer filtered by the chkCredit3 column
 * @method     ChildAliEwalletTranfer findOneByChkinternet(string $chkInternet) Return the first ChildAliEwalletTranfer filtered by the chkInternet column
 * @method     ChildAliEwalletTranfer findOneByChkcommission(string $chkCommission) Return the first ChildAliEwalletTranfer filtered by the chkCommission column
 * @method     ChildAliEwalletTranfer findOneByChkwithdraw(string $chkWithdraw) Return the first ChildAliEwalletTranfer filtered by the chkWithdraw column
 * @method     ChildAliEwalletTranfer findOneByTxtcash(string $txtCash) Return the first ChildAliEwalletTranfer filtered by the txtCash column
 * @method     ChildAliEwalletTranfer findOneByTxtfuture(string $txtFuture) Return the first ChildAliEwalletTranfer filtered by the txtFuture column
 * @method     ChildAliEwalletTranfer findOneByTxttransfer(string $txtTransfer) Return the first ChildAliEwalletTranfer filtered by the txtTransfer column
 * @method     ChildAliEwalletTranfer findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliEwalletTranfer filtered by the txtCredit1 column
 * @method     ChildAliEwalletTranfer findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliEwalletTranfer filtered by the txtCredit2 column
 * @method     ChildAliEwalletTranfer findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliEwalletTranfer filtered by the txtCredit3 column
 * @method     ChildAliEwalletTranfer findOneByTxtinternet(string $txtInternet) Return the first ChildAliEwalletTranfer filtered by the txtInternet column
 * @method     ChildAliEwalletTranfer findOneByTxtcommission(string $txtCommission) Return the first ChildAliEwalletTranfer filtered by the txtCommission column
 * @method     ChildAliEwalletTranfer findOneByTxtwithdraw(string $txtWithdraw) Return the first ChildAliEwalletTranfer filtered by the txtWithdraw column
 * @method     ChildAliEwalletTranfer findOneByOptioncash(string $optionCash) Return the first ChildAliEwalletTranfer filtered by the optionCash column
 * @method     ChildAliEwalletTranfer findOneByOptionfuture(string $optionFuture) Return the first ChildAliEwalletTranfer filtered by the optionFuture column
 * @method     ChildAliEwalletTranfer findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliEwalletTranfer filtered by the optionTransfer column
 * @method     ChildAliEwalletTranfer findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliEwalletTranfer filtered by the optionCredit1 column
 * @method     ChildAliEwalletTranfer findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliEwalletTranfer filtered by the optionCredit2 column
 * @method     ChildAliEwalletTranfer findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliEwalletTranfer filtered by the optionCredit3 column
 * @method     ChildAliEwalletTranfer findOneByOptioninternet(string $optionInternet) Return the first ChildAliEwalletTranfer filtered by the optionInternet column
 * @method     ChildAliEwalletTranfer findOneByOptioncommission(string $optionCommission) Return the first ChildAliEwalletTranfer filtered by the optionCommission column
 * @method     ChildAliEwalletTranfer findOneByOptionwithdraw(string $optionWithdraw) Return the first ChildAliEwalletTranfer filtered by the optionWithdraw column
 * @method     ChildAliEwalletTranfer findOneByTxtoption(string $txtoption) Return the first ChildAliEwalletTranfer filtered by the txtoption column
 * @method     ChildAliEwalletTranfer findOneByEwallet(string $ewallet) Return the first ChildAliEwalletTranfer filtered by the ewallet column
 * @method     ChildAliEwalletTranfer findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliEwalletTranfer filtered by the ewallet_before column
 * @method     ChildAliEwalletTranfer findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliEwalletTranfer filtered by the ewallet_after column
 * @method     ChildAliEwalletTranfer findOneByIpay(string $ipay) Return the first ChildAliEwalletTranfer filtered by the ipay column
 * @method     ChildAliEwalletTranfer findOneByCheckportal(int $checkportal) Return the first ChildAliEwalletTranfer filtered by the checkportal column
 * @method     ChildAliEwalletTranfer findOneByBprice(string $bprice) Return the first ChildAliEwalletTranfer filtered by the bprice column
 * @method     ChildAliEwalletTranfer findOneByCancelDate(string $cancel_date) Return the first ChildAliEwalletTranfer filtered by the cancel_date column
 * @method     ChildAliEwalletTranfer findOneByUidCancel(string $uid_cancel) Return the first ChildAliEwalletTranfer filtered by the uid_cancel column
 * @method     ChildAliEwalletTranfer findOneByLocationbase(int $locationbase) Return the first ChildAliEwalletTranfer filtered by the locationbase column
 * @method     ChildAliEwalletTranfer findOneByMbase(string $mbase) Return the first ChildAliEwalletTranfer filtered by the mbase column
 * @method     ChildAliEwalletTranfer findOneByCrate(string $crate) Return the first ChildAliEwalletTranfer filtered by the crate column
 * @method     ChildAliEwalletTranfer findOneByEcheck(int $echeck) Return the first ChildAliEwalletTranfer filtered by the echeck column *

 * @method     ChildAliEwalletTranfer requirePk($key, ConnectionInterface $con = null) Return the ChildAliEwalletTranfer by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOne(ConnectionInterface $con = null) Return the first ChildAliEwalletTranfer matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEwalletTranfer requireOneBySano(string $sano) Return the first ChildAliEwalletTranfer filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneBySadate(string $sadate) Return the first ChildAliEwalletTranfer filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneBySctime(string $sctime) Return the first ChildAliEwalletTranfer filtered by the sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByInvCode(string $inv_code) Return the first ChildAliEwalletTranfer filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByMcode(string $mcode) Return the first ChildAliEwalletTranfer filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneBySmcode(string $smcode) Return the first ChildAliEwalletTranfer filtered by the smcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByNameF(string $name_f) Return the first ChildAliEwalletTranfer filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByNameT(string $name_t) Return the first ChildAliEwalletTranfer filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByTotal(string $total) Return the first ChildAliEwalletTranfer filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByUsercode(string $usercode) Return the first ChildAliEwalletTranfer filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByRemark(string $remark) Return the first ChildAliEwalletTranfer filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByTrnf(string $trnf) Return the first ChildAliEwalletTranfer filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneById(int $id) Return the first ChildAliEwalletTranfer filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneBySaType(string $sa_type) Return the first ChildAliEwalletTranfer filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByUid(string $uid) Return the first ChildAliEwalletTranfer filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByLid(string $lid) Return the first ChildAliEwalletTranfer filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByDl(string $dl) Return the first ChildAliEwalletTranfer filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByCancel(int $cancel) Return the first ChildAliEwalletTranfer filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneBySend(int $send) Return the first ChildAliEwalletTranfer filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByTxtmoney(string $txtMoney) Return the first ChildAliEwalletTranfer filtered by the txtMoney column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByChkcash(string $chkCash) Return the first ChildAliEwalletTranfer filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByChkfuture(string $chkFuture) Return the first ChildAliEwalletTranfer filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByChktransfer(string $chkTransfer) Return the first ChildAliEwalletTranfer filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliEwalletTranfer filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliEwalletTranfer filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliEwalletTranfer filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByChkinternet(string $chkInternet) Return the first ChildAliEwalletTranfer filtered by the chkInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByChkcommission(string $chkCommission) Return the first ChildAliEwalletTranfer filtered by the chkCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByChkwithdraw(string $chkWithdraw) Return the first ChildAliEwalletTranfer filtered by the chkWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByTxtcash(string $txtCash) Return the first ChildAliEwalletTranfer filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByTxtfuture(string $txtFuture) Return the first ChildAliEwalletTranfer filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliEwalletTranfer filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliEwalletTranfer filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliEwalletTranfer filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliEwalletTranfer filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByTxtinternet(string $txtInternet) Return the first ChildAliEwalletTranfer filtered by the txtInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByTxtcommission(string $txtCommission) Return the first ChildAliEwalletTranfer filtered by the txtCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByTxtwithdraw(string $txtWithdraw) Return the first ChildAliEwalletTranfer filtered by the txtWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByOptioncash(string $optionCash) Return the first ChildAliEwalletTranfer filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByOptionfuture(string $optionFuture) Return the first ChildAliEwalletTranfer filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliEwalletTranfer filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliEwalletTranfer filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliEwalletTranfer filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliEwalletTranfer filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByOptioninternet(string $optionInternet) Return the first ChildAliEwalletTranfer filtered by the optionInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByOptioncommission(string $optionCommission) Return the first ChildAliEwalletTranfer filtered by the optionCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByOptionwithdraw(string $optionWithdraw) Return the first ChildAliEwalletTranfer filtered by the optionWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByTxtoption(string $txtoption) Return the first ChildAliEwalletTranfer filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByEwallet(string $ewallet) Return the first ChildAliEwalletTranfer filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliEwalletTranfer filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliEwalletTranfer filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByIpay(string $ipay) Return the first ChildAliEwalletTranfer filtered by the ipay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByCheckportal(int $checkportal) Return the first ChildAliEwalletTranfer filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByBprice(string $bprice) Return the first ChildAliEwalletTranfer filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByCancelDate(string $cancel_date) Return the first ChildAliEwalletTranfer filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByUidCancel(string $uid_cancel) Return the first ChildAliEwalletTranfer filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByLocationbase(int $locationbase) Return the first ChildAliEwalletTranfer filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByMbase(string $mbase) Return the first ChildAliEwalletTranfer filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByCrate(string $crate) Return the first ChildAliEwalletTranfer filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwalletTranfer requireOneByEcheck(int $echeck) Return the first ChildAliEwalletTranfer filtered by the echeck column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEwalletTranfer[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliEwalletTranfer objects based on current ModelCriteria
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findBySano(string $sano) Return ChildAliEwalletTranfer objects filtered by the sano column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findBySadate(string $sadate) Return ChildAliEwalletTranfer objects filtered by the sadate column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findBySctime(string $sctime) Return ChildAliEwalletTranfer objects filtered by the sctime column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliEwalletTranfer objects filtered by the inv_code column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByMcode(string $mcode) Return ChildAliEwalletTranfer objects filtered by the mcode column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findBySmcode(string $smcode) Return ChildAliEwalletTranfer objects filtered by the smcode column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByNameF(string $name_f) Return ChildAliEwalletTranfer objects filtered by the name_f column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByNameT(string $name_t) Return ChildAliEwalletTranfer objects filtered by the name_t column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByTotal(string $total) Return ChildAliEwalletTranfer objects filtered by the total column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliEwalletTranfer objects filtered by the usercode column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByRemark(string $remark) Return ChildAliEwalletTranfer objects filtered by the remark column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByTrnf(string $trnf) Return ChildAliEwalletTranfer objects filtered by the trnf column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findById(int $id) Return ChildAliEwalletTranfer objects filtered by the id column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliEwalletTranfer objects filtered by the sa_type column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByUid(string $uid) Return ChildAliEwalletTranfer objects filtered by the uid column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByLid(string $lid) Return ChildAliEwalletTranfer objects filtered by the lid column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByDl(string $dl) Return ChildAliEwalletTranfer objects filtered by the dl column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByCancel(int $cancel) Return ChildAliEwalletTranfer objects filtered by the cancel column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findBySend(int $send) Return ChildAliEwalletTranfer objects filtered by the send column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByTxtmoney(string $txtMoney) Return ChildAliEwalletTranfer objects filtered by the txtMoney column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliEwalletTranfer objects filtered by the chkCash column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliEwalletTranfer objects filtered by the chkFuture column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliEwalletTranfer objects filtered by the chkTransfer column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliEwalletTranfer objects filtered by the chkCredit1 column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliEwalletTranfer objects filtered by the chkCredit2 column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliEwalletTranfer objects filtered by the chkCredit3 column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByChkinternet(string $chkInternet) Return ChildAliEwalletTranfer objects filtered by the chkInternet column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByChkcommission(string $chkCommission) Return ChildAliEwalletTranfer objects filtered by the chkCommission column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByChkwithdraw(string $chkWithdraw) Return ChildAliEwalletTranfer objects filtered by the chkWithdraw column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliEwalletTranfer objects filtered by the txtCash column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliEwalletTranfer objects filtered by the txtFuture column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliEwalletTranfer objects filtered by the txtTransfer column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliEwalletTranfer objects filtered by the txtCredit1 column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliEwalletTranfer objects filtered by the txtCredit2 column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliEwalletTranfer objects filtered by the txtCredit3 column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByTxtinternet(string $txtInternet) Return ChildAliEwalletTranfer objects filtered by the txtInternet column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByTxtcommission(string $txtCommission) Return ChildAliEwalletTranfer objects filtered by the txtCommission column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByTxtwithdraw(string $txtWithdraw) Return ChildAliEwalletTranfer objects filtered by the txtWithdraw column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliEwalletTranfer objects filtered by the optionCash column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliEwalletTranfer objects filtered by the optionFuture column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliEwalletTranfer objects filtered by the optionTransfer column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliEwalletTranfer objects filtered by the optionCredit1 column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliEwalletTranfer objects filtered by the optionCredit2 column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliEwalletTranfer objects filtered by the optionCredit3 column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByOptioninternet(string $optionInternet) Return ChildAliEwalletTranfer objects filtered by the optionInternet column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByOptioncommission(string $optionCommission) Return ChildAliEwalletTranfer objects filtered by the optionCommission column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByOptionwithdraw(string $optionWithdraw) Return ChildAliEwalletTranfer objects filtered by the optionWithdraw column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliEwalletTranfer objects filtered by the txtoption column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliEwalletTranfer objects filtered by the ewallet column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliEwalletTranfer objects filtered by the ewallet_before column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliEwalletTranfer objects filtered by the ewallet_after column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByIpay(string $ipay) Return ChildAliEwalletTranfer objects filtered by the ipay column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliEwalletTranfer objects filtered by the checkportal column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByBprice(string $bprice) Return ChildAliEwalletTranfer objects filtered by the bprice column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliEwalletTranfer objects filtered by the cancel_date column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliEwalletTranfer objects filtered by the uid_cancel column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliEwalletTranfer objects filtered by the locationbase column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByMbase(string $mbase) Return ChildAliEwalletTranfer objects filtered by the mbase column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByCrate(string $crate) Return ChildAliEwalletTranfer objects filtered by the crate column
 * @method     ChildAliEwalletTranfer[]|ObjectCollection findByEcheck(int $echeck) Return ChildAliEwalletTranfer objects filtered by the echeck column
 * @method     ChildAliEwalletTranfer[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliEwalletTranferQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliEwalletTranferQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliEwalletTranfer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliEwalletTranferQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliEwalletTranferQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliEwalletTranferQuery) {
            return $criteria;
        }
        $query = new ChildAliEwalletTranferQuery();
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
     * @return ChildAliEwalletTranfer|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliEwalletTranferTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliEwalletTranferTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliEwalletTranfer A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, sadate, sctime, inv_code, mcode, smcode, name_f, name_t, total, usercode, remark, trnf, id, sa_type, uid, lid, dl, cancel, send, txtMoney, chkCash, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkInternet, chkCommission, chkWithdraw, txtCash, txtFuture, txtTransfer, txtCredit1, txtCredit2, txtCredit3, txtInternet, txtCommission, txtWithdraw, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionInternet, optionCommission, optionWithdraw, txtoption, ewallet, ewallet_before, ewallet_after, ipay, checkportal, bprice, cancel_date, uid_cancel, locationbase, mbase, crate, echeck FROM ali_ewallet_tranfer WHERE id = :p0';
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
            /** @var ChildAliEwalletTranfer $obj */
            $obj = new ChildAliEwalletTranfer();
            $obj->hydrate($row);
            AliEwalletTranferTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliEwalletTranfer|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterBySctime($sctime = null, $comparison = null)
    {
        if (is_array($sctime)) {
            $useMinMax = false;
            if (isset($sctime['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_SCTIME, $sctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sctime['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_SCTIME, $sctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_SCTIME, $sctime, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the smcode column
     *
     * Example usage:
     * <code>
     * $query->filterBySmcode('fooValue');   // WHERE smcode = 'fooValue'
     * $query->filterBySmcode('%fooValue%', Criteria::LIKE); // WHERE smcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $smcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterBySmcode($smcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($smcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_SMCODE, $smcode, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trnf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_LID, $lid, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_SEND, $send, $comparison);
    }

    /**
     * Filter the query on the txtMoney column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtmoney(1234); // WHERE txtMoney = 1234
     * $query->filterByTxtmoney(array(12, 34)); // WHERE txtMoney IN (12, 34)
     * $query->filterByTxtmoney(array('min' => 12)); // WHERE txtMoney > 12
     * </code>
     *
     * @param     mixed $txtmoney The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByTxtmoney($txtmoney = null, $comparison = null)
    {
        if (is_array($txtmoney)) {
            $useMinMax = false;
            if (isset($txtmoney['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTMONEY, $txtmoney['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtmoney['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTMONEY, $txtmoney['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTMONEY, $txtmoney, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByChkinternet($chkinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_CHKINTERNET, $chkinternet, $comparison);
    }

    /**
     * Filter the query on the chkCommission column
     *
     * Example usage:
     * <code>
     * $query->filterByChkcommission('fooValue');   // WHERE chkCommission = 'fooValue'
     * $query->filterByChkcommission('%fooValue%', Criteria::LIKE); // WHERE chkCommission LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chkcommission The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByChkcommission($chkcommission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcommission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_CHKCOMMISSION, $chkcommission, $comparison);
    }

    /**
     * Filter the query on the chkWithdraw column
     *
     * Example usage:
     * <code>
     * $query->filterByChkwithdraw('fooValue');   // WHERE chkWithdraw = 'fooValue'
     * $query->filterByChkwithdraw('%fooValue%', Criteria::LIKE); // WHERE chkWithdraw LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chkwithdraw The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByChkwithdraw($chkwithdraw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkwithdraw)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_CHKWITHDRAW, $chkwithdraw, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (is_array($txtcash)) {
            $useMinMax = false;
            if (isset($txtcash['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCASH, $txtcash['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcash['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCASH, $txtcash['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (is_array($txtfuture)) {
            $useMinMax = false;
            if (isset($txtfuture['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTFUTURE, $txtfuture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtfuture['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTFUTURE, $txtfuture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (is_array($txttransfer)) {
            $useMinMax = false;
            if (isset($txttransfer['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTTRANSFER, $txttransfer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTTRANSFER, $txttransfer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (is_array($txtcredit1)) {
            $useMinMax = false;
            if (isset($txtcredit1['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCREDIT1, $txtcredit1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit1['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCREDIT1, $txtcredit1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (is_array($txtcredit2)) {
            $useMinMax = false;
            if (isset($txtcredit2['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCREDIT2, $txtcredit2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit2['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCREDIT2, $txtcredit2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (is_array($txtcredit3)) {
            $useMinMax = false;
            if (isset($txtcredit3['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCREDIT3, $txtcredit3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit3['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCREDIT3, $txtcredit3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByTxtinternet($txtinternet = null, $comparison = null)
    {
        if (is_array($txtinternet)) {
            $useMinMax = false;
            if (isset($txtinternet['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTINTERNET, $txtinternet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtinternet['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTINTERNET, $txtinternet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTINTERNET, $txtinternet, $comparison);
    }

    /**
     * Filter the query on the txtCommission column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtcommission(1234); // WHERE txtCommission = 1234
     * $query->filterByTxtcommission(array(12, 34)); // WHERE txtCommission IN (12, 34)
     * $query->filterByTxtcommission(array('min' => 12)); // WHERE txtCommission > 12
     * </code>
     *
     * @param     mixed $txtcommission The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByTxtcommission($txtcommission = null, $comparison = null)
    {
        if (is_array($txtcommission)) {
            $useMinMax = false;
            if (isset($txtcommission['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCOMMISSION, $txtcommission['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcommission['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCOMMISSION, $txtcommission['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTCOMMISSION, $txtcommission, $comparison);
    }

    /**
     * Filter the query on the txtWithdraw column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtwithdraw(1234); // WHERE txtWithdraw = 1234
     * $query->filterByTxtwithdraw(array(12, 34)); // WHERE txtWithdraw IN (12, 34)
     * $query->filterByTxtwithdraw(array('min' => 12)); // WHERE txtWithdraw > 12
     * </code>
     *
     * @param     mixed $txtwithdraw The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByTxtwithdraw($txtwithdraw = null, $comparison = null)
    {
        if (is_array($txtwithdraw)) {
            $useMinMax = false;
            if (isset($txtwithdraw['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTWITHDRAW, $txtwithdraw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtwithdraw['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTWITHDRAW, $txtwithdraw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTWITHDRAW, $txtwithdraw, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByOptioninternet($optioninternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioninternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_OPTIONINTERNET, $optioninternet, $comparison);
    }

    /**
     * Filter the query on the optionCommission column
     *
     * Example usage:
     * <code>
     * $query->filterByOptioncommission('fooValue');   // WHERE optionCommission = 'fooValue'
     * $query->filterByOptioncommission('%fooValue%', Criteria::LIKE); // WHERE optionCommission LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optioncommission The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByOptioncommission($optioncommission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncommission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_OPTIONCOMMISSION, $optioncommission, $comparison);
    }

    /**
     * Filter the query on the optionWithdraw column
     *
     * Example usage:
     * <code>
     * $query->filterByOptionwithdraw('fooValue');   // WHERE optionWithdraw = 'fooValue'
     * $query->filterByOptionwithdraw('%fooValue%', Criteria::LIKE); // WHERE optionWithdraw LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optionwithdraw The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByOptionwithdraw($optionwithdraw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionwithdraw)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_OPTIONWITHDRAW, $optionwithdraw, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByIpay($ipay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipay)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_IPAY, $ipay, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_MBASE, $mbase, $comparison);
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
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_CRATE, $crate, $comparison);
    }

    /**
     * Filter the query on the echeck column
     *
     * Example usage:
     * <code>
     * $query->filterByEcheck(1234); // WHERE echeck = 1234
     * $query->filterByEcheck(array(12, 34)); // WHERE echeck IN (12, 34)
     * $query->filterByEcheck(array('min' => 12)); // WHERE echeck > 12
     * </code>
     *
     * @param     mixed $echeck The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function filterByEcheck($echeck = null, $comparison = null)
    {
        if (is_array($echeck)) {
            $useMinMax = false;
            if (isset($echeck['min'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_ECHECK, $echeck['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($echeck['max'])) {
                $this->addUsingAlias(AliEwalletTranferTableMap::COL_ECHECK, $echeck['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTranferTableMap::COL_ECHECK, $echeck, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliEwalletTranfer $aliEwalletTranfer Object to remove from the list of results
     *
     * @return $this|ChildAliEwalletTranferQuery The current query, for fluid interface
     */
    public function prune($aliEwalletTranfer = null)
    {
        if ($aliEwalletTranfer) {
            $this->addUsingAlias(AliEwalletTranferTableMap::COL_ID, $aliEwalletTranfer->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_ewallet_tranfer table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEwalletTranferTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliEwalletTranferTableMap::clearInstancePool();
            AliEwalletTranferTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEwalletTranferTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliEwalletTranferTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliEwalletTranferTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliEwalletTranferTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliEwalletTranferQuery
