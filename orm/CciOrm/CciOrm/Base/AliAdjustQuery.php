<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliAdjust as ChildAliAdjust;
use CciOrm\CciOrm\AliAdjustQuery as ChildAliAdjustQuery;
use CciOrm\CciOrm\Map\AliAdjustTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_adjust' table.
 *
 *
 *
 * @method     ChildAliAdjustQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliAdjustQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliAdjustQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliAdjustQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliAdjustQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliAdjustQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliAdjustQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliAdjustQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliAdjustQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliAdjustQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliAdjustQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliAdjustQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliAdjustQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliAdjustQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliAdjustQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliAdjustQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliAdjustQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliAdjustQuery orderByTxtmoney($order = Criteria::ASC) Order by the txtMoney column
 * @method     ChildAliAdjustQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliAdjustQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliAdjustQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliAdjustQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliAdjustQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliAdjustQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliAdjustQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliAdjustQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliAdjustQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliAdjustQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliAdjustQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliAdjustQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliAdjustQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliAdjustQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliAdjustQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliAdjustQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliAdjustQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliAdjustQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliAdjustQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliAdjustQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliAdjustQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliAdjustQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliAdjustQuery orderByIpay($order = Criteria::ASC) Order by the ipay column
 * @method     ChildAliAdjustQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliAdjustQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliAdjustQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliAdjustQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 * @method     ChildAliAdjustQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliAdjustQuery orderByChkcommission($order = Criteria::ASC) Order by the chkCommission column
 * @method     ChildAliAdjustQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliAdjustQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 *
 * @method     ChildAliAdjustQuery groupBySano() Group by the sano column
 * @method     ChildAliAdjustQuery groupBySadate() Group by the sadate column
 * @method     ChildAliAdjustQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliAdjustQuery groupByMcode() Group by the mcode column
 * @method     ChildAliAdjustQuery groupByNameF() Group by the name_f column
 * @method     ChildAliAdjustQuery groupByNameT() Group by the name_t column
 * @method     ChildAliAdjustQuery groupByTotal() Group by the total column
 * @method     ChildAliAdjustQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliAdjustQuery groupByRemark() Group by the remark column
 * @method     ChildAliAdjustQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliAdjustQuery groupById() Group by the id column
 * @method     ChildAliAdjustQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliAdjustQuery groupByUid() Group by the uid column
 * @method     ChildAliAdjustQuery groupByLid() Group by the lid column
 * @method     ChildAliAdjustQuery groupByDl() Group by the dl column
 * @method     ChildAliAdjustQuery groupByCancel() Group by the cancel column
 * @method     ChildAliAdjustQuery groupBySend() Group by the send column
 * @method     ChildAliAdjustQuery groupByTxtmoney() Group by the txtMoney column
 * @method     ChildAliAdjustQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliAdjustQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliAdjustQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliAdjustQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliAdjustQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliAdjustQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliAdjustQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliAdjustQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliAdjustQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliAdjustQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliAdjustQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliAdjustQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliAdjustQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliAdjustQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliAdjustQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliAdjustQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliAdjustQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliAdjustQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliAdjustQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliAdjustQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliAdjustQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliAdjustQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliAdjustQuery groupByIpay() Group by the ipay column
 * @method     ChildAliAdjustQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliAdjustQuery groupByBprice() Group by the bprice column
 * @method     ChildAliAdjustQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliAdjustQuery groupByUidCancel() Group by the uid_cancel column
 * @method     ChildAliAdjustQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliAdjustQuery groupByChkcommission() Group by the chkCommission column
 * @method     ChildAliAdjustQuery groupByMbase() Group by the mbase column
 * @method     ChildAliAdjustQuery groupByCrate() Group by the crate column
 *
 * @method     ChildAliAdjustQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliAdjustQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliAdjustQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliAdjustQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliAdjustQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliAdjustQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliAdjust findOne(ConnectionInterface $con = null) Return the first ChildAliAdjust matching the query
 * @method     ChildAliAdjust findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliAdjust matching the query, or a new ChildAliAdjust object populated from the query conditions when no match is found
 *
 * @method     ChildAliAdjust findOneBySano(string $sano) Return the first ChildAliAdjust filtered by the sano column
 * @method     ChildAliAdjust findOneBySadate(string $sadate) Return the first ChildAliAdjust filtered by the sadate column
 * @method     ChildAliAdjust findOneByInvCode(string $inv_code) Return the first ChildAliAdjust filtered by the inv_code column
 * @method     ChildAliAdjust findOneByMcode(string $mcode) Return the first ChildAliAdjust filtered by the mcode column
 * @method     ChildAliAdjust findOneByNameF(string $name_f) Return the first ChildAliAdjust filtered by the name_f column
 * @method     ChildAliAdjust findOneByNameT(string $name_t) Return the first ChildAliAdjust filtered by the name_t column
 * @method     ChildAliAdjust findOneByTotal(string $total) Return the first ChildAliAdjust filtered by the total column
 * @method     ChildAliAdjust findOneByUsercode(string $usercode) Return the first ChildAliAdjust filtered by the usercode column
 * @method     ChildAliAdjust findOneByRemark(string $remark) Return the first ChildAliAdjust filtered by the remark column
 * @method     ChildAliAdjust findOneByTrnf(string $trnf) Return the first ChildAliAdjust filtered by the trnf column
 * @method     ChildAliAdjust findOneById(int $id) Return the first ChildAliAdjust filtered by the id column
 * @method     ChildAliAdjust findOneBySaType(string $sa_type) Return the first ChildAliAdjust filtered by the sa_type column
 * @method     ChildAliAdjust findOneByUid(string $uid) Return the first ChildAliAdjust filtered by the uid column
 * @method     ChildAliAdjust findOneByLid(string $lid) Return the first ChildAliAdjust filtered by the lid column
 * @method     ChildAliAdjust findOneByDl(string $dl) Return the first ChildAliAdjust filtered by the dl column
 * @method     ChildAliAdjust findOneByCancel(int $cancel) Return the first ChildAliAdjust filtered by the cancel column
 * @method     ChildAliAdjust findOneBySend(int $send) Return the first ChildAliAdjust filtered by the send column
 * @method     ChildAliAdjust findOneByTxtmoney(string $txtMoney) Return the first ChildAliAdjust filtered by the txtMoney column
 * @method     ChildAliAdjust findOneByChkcash(string $chkCash) Return the first ChildAliAdjust filtered by the chkCash column
 * @method     ChildAliAdjust findOneByChkfuture(string $chkFuture) Return the first ChildAliAdjust filtered by the chkFuture column
 * @method     ChildAliAdjust findOneByChktransfer(string $chkTransfer) Return the first ChildAliAdjust filtered by the chkTransfer column
 * @method     ChildAliAdjust findOneByChkcredit1(string $chkCredit1) Return the first ChildAliAdjust filtered by the chkCredit1 column
 * @method     ChildAliAdjust findOneByChkcredit2(string $chkCredit2) Return the first ChildAliAdjust filtered by the chkCredit2 column
 * @method     ChildAliAdjust findOneByChkcredit3(string $chkCredit3) Return the first ChildAliAdjust filtered by the chkCredit3 column
 * @method     ChildAliAdjust findOneByTxtcash(string $txtCash) Return the first ChildAliAdjust filtered by the txtCash column
 * @method     ChildAliAdjust findOneByTxtfuture(string $txtFuture) Return the first ChildAliAdjust filtered by the txtFuture column
 * @method     ChildAliAdjust findOneByTxttransfer(string $txtTransfer) Return the first ChildAliAdjust filtered by the txtTransfer column
 * @method     ChildAliAdjust findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliAdjust filtered by the txtCredit1 column
 * @method     ChildAliAdjust findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliAdjust filtered by the txtCredit2 column
 * @method     ChildAliAdjust findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliAdjust filtered by the txtCredit3 column
 * @method     ChildAliAdjust findOneByOptioncash(string $optionCash) Return the first ChildAliAdjust filtered by the optionCash column
 * @method     ChildAliAdjust findOneByOptionfuture(string $optionFuture) Return the first ChildAliAdjust filtered by the optionFuture column
 * @method     ChildAliAdjust findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliAdjust filtered by the optionTransfer column
 * @method     ChildAliAdjust findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliAdjust filtered by the optionCredit1 column
 * @method     ChildAliAdjust findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliAdjust filtered by the optionCredit2 column
 * @method     ChildAliAdjust findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliAdjust filtered by the optionCredit3 column
 * @method     ChildAliAdjust findOneByTxtoption(string $txtoption) Return the first ChildAliAdjust filtered by the txtoption column
 * @method     ChildAliAdjust findOneByEwallet(string $ewallet) Return the first ChildAliAdjust filtered by the ewallet column
 * @method     ChildAliAdjust findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliAdjust filtered by the ewallet_before column
 * @method     ChildAliAdjust findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliAdjust filtered by the ewallet_after column
 * @method     ChildAliAdjust findOneByIpay(string $ipay) Return the first ChildAliAdjust filtered by the ipay column
 * @method     ChildAliAdjust findOneByCheckportal(int $checkportal) Return the first ChildAliAdjust filtered by the checkportal column
 * @method     ChildAliAdjust findOneByBprice(string $bprice) Return the first ChildAliAdjust filtered by the bprice column
 * @method     ChildAliAdjust findOneByCancelDate(string $cancel_date) Return the first ChildAliAdjust filtered by the cancel_date column
 * @method     ChildAliAdjust findOneByUidCancel(string $uid_cancel) Return the first ChildAliAdjust filtered by the uid_cancel column
 * @method     ChildAliAdjust findOneByLocationbase(int $locationbase) Return the first ChildAliAdjust filtered by the locationbase column
 * @method     ChildAliAdjust findOneByChkcommission(string $chkCommission) Return the first ChildAliAdjust filtered by the chkCommission column
 * @method     ChildAliAdjust findOneByMbase(string $mbase) Return the first ChildAliAdjust filtered by the mbase column
 * @method     ChildAliAdjust findOneByCrate(string $crate) Return the first ChildAliAdjust filtered by the crate column *

 * @method     ChildAliAdjust requirePk($key, ConnectionInterface $con = null) Return the ChildAliAdjust by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOne(ConnectionInterface $con = null) Return the first ChildAliAdjust matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAdjust requireOneBySano(string $sano) Return the first ChildAliAdjust filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneBySadate(string $sadate) Return the first ChildAliAdjust filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByInvCode(string $inv_code) Return the first ChildAliAdjust filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByMcode(string $mcode) Return the first ChildAliAdjust filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByNameF(string $name_f) Return the first ChildAliAdjust filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByNameT(string $name_t) Return the first ChildAliAdjust filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByTotal(string $total) Return the first ChildAliAdjust filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByUsercode(string $usercode) Return the first ChildAliAdjust filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByRemark(string $remark) Return the first ChildAliAdjust filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByTrnf(string $trnf) Return the first ChildAliAdjust filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneById(int $id) Return the first ChildAliAdjust filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneBySaType(string $sa_type) Return the first ChildAliAdjust filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByUid(string $uid) Return the first ChildAliAdjust filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByLid(string $lid) Return the first ChildAliAdjust filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByDl(string $dl) Return the first ChildAliAdjust filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByCancel(int $cancel) Return the first ChildAliAdjust filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneBySend(int $send) Return the first ChildAliAdjust filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByTxtmoney(string $txtMoney) Return the first ChildAliAdjust filtered by the txtMoney column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByChkcash(string $chkCash) Return the first ChildAliAdjust filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByChkfuture(string $chkFuture) Return the first ChildAliAdjust filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByChktransfer(string $chkTransfer) Return the first ChildAliAdjust filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliAdjust filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliAdjust filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliAdjust filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByTxtcash(string $txtCash) Return the first ChildAliAdjust filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByTxtfuture(string $txtFuture) Return the first ChildAliAdjust filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliAdjust filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliAdjust filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliAdjust filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliAdjust filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByOptioncash(string $optionCash) Return the first ChildAliAdjust filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByOptionfuture(string $optionFuture) Return the first ChildAliAdjust filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliAdjust filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliAdjust filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliAdjust filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliAdjust filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByTxtoption(string $txtoption) Return the first ChildAliAdjust filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByEwallet(string $ewallet) Return the first ChildAliAdjust filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliAdjust filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliAdjust filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByIpay(string $ipay) Return the first ChildAliAdjust filtered by the ipay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByCheckportal(int $checkportal) Return the first ChildAliAdjust filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByBprice(string $bprice) Return the first ChildAliAdjust filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByCancelDate(string $cancel_date) Return the first ChildAliAdjust filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByUidCancel(string $uid_cancel) Return the first ChildAliAdjust filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByLocationbase(int $locationbase) Return the first ChildAliAdjust filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByChkcommission(string $chkCommission) Return the first ChildAliAdjust filtered by the chkCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByMbase(string $mbase) Return the first ChildAliAdjust filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAdjust requireOneByCrate(string $crate) Return the first ChildAliAdjust filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAdjust[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliAdjust objects based on current ModelCriteria
 * @method     ChildAliAdjust[]|ObjectCollection findBySano(string $sano) Return ChildAliAdjust objects filtered by the sano column
 * @method     ChildAliAdjust[]|ObjectCollection findBySadate(string $sadate) Return ChildAliAdjust objects filtered by the sadate column
 * @method     ChildAliAdjust[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliAdjust objects filtered by the inv_code column
 * @method     ChildAliAdjust[]|ObjectCollection findByMcode(string $mcode) Return ChildAliAdjust objects filtered by the mcode column
 * @method     ChildAliAdjust[]|ObjectCollection findByNameF(string $name_f) Return ChildAliAdjust objects filtered by the name_f column
 * @method     ChildAliAdjust[]|ObjectCollection findByNameT(string $name_t) Return ChildAliAdjust objects filtered by the name_t column
 * @method     ChildAliAdjust[]|ObjectCollection findByTotal(string $total) Return ChildAliAdjust objects filtered by the total column
 * @method     ChildAliAdjust[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliAdjust objects filtered by the usercode column
 * @method     ChildAliAdjust[]|ObjectCollection findByRemark(string $remark) Return ChildAliAdjust objects filtered by the remark column
 * @method     ChildAliAdjust[]|ObjectCollection findByTrnf(string $trnf) Return ChildAliAdjust objects filtered by the trnf column
 * @method     ChildAliAdjust[]|ObjectCollection findById(int $id) Return ChildAliAdjust objects filtered by the id column
 * @method     ChildAliAdjust[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliAdjust objects filtered by the sa_type column
 * @method     ChildAliAdjust[]|ObjectCollection findByUid(string $uid) Return ChildAliAdjust objects filtered by the uid column
 * @method     ChildAliAdjust[]|ObjectCollection findByLid(string $lid) Return ChildAliAdjust objects filtered by the lid column
 * @method     ChildAliAdjust[]|ObjectCollection findByDl(string $dl) Return ChildAliAdjust objects filtered by the dl column
 * @method     ChildAliAdjust[]|ObjectCollection findByCancel(int $cancel) Return ChildAliAdjust objects filtered by the cancel column
 * @method     ChildAliAdjust[]|ObjectCollection findBySend(int $send) Return ChildAliAdjust objects filtered by the send column
 * @method     ChildAliAdjust[]|ObjectCollection findByTxtmoney(string $txtMoney) Return ChildAliAdjust objects filtered by the txtMoney column
 * @method     ChildAliAdjust[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliAdjust objects filtered by the chkCash column
 * @method     ChildAliAdjust[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliAdjust objects filtered by the chkFuture column
 * @method     ChildAliAdjust[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliAdjust objects filtered by the chkTransfer column
 * @method     ChildAliAdjust[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliAdjust objects filtered by the chkCredit1 column
 * @method     ChildAliAdjust[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliAdjust objects filtered by the chkCredit2 column
 * @method     ChildAliAdjust[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliAdjust objects filtered by the chkCredit3 column
 * @method     ChildAliAdjust[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliAdjust objects filtered by the txtCash column
 * @method     ChildAliAdjust[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliAdjust objects filtered by the txtFuture column
 * @method     ChildAliAdjust[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliAdjust objects filtered by the txtTransfer column
 * @method     ChildAliAdjust[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliAdjust objects filtered by the txtCredit1 column
 * @method     ChildAliAdjust[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliAdjust objects filtered by the txtCredit2 column
 * @method     ChildAliAdjust[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliAdjust objects filtered by the txtCredit3 column
 * @method     ChildAliAdjust[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliAdjust objects filtered by the optionCash column
 * @method     ChildAliAdjust[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliAdjust objects filtered by the optionFuture column
 * @method     ChildAliAdjust[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliAdjust objects filtered by the optionTransfer column
 * @method     ChildAliAdjust[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliAdjust objects filtered by the optionCredit1 column
 * @method     ChildAliAdjust[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliAdjust objects filtered by the optionCredit2 column
 * @method     ChildAliAdjust[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliAdjust objects filtered by the optionCredit3 column
 * @method     ChildAliAdjust[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliAdjust objects filtered by the txtoption column
 * @method     ChildAliAdjust[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliAdjust objects filtered by the ewallet column
 * @method     ChildAliAdjust[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliAdjust objects filtered by the ewallet_before column
 * @method     ChildAliAdjust[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliAdjust objects filtered by the ewallet_after column
 * @method     ChildAliAdjust[]|ObjectCollection findByIpay(string $ipay) Return ChildAliAdjust objects filtered by the ipay column
 * @method     ChildAliAdjust[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliAdjust objects filtered by the checkportal column
 * @method     ChildAliAdjust[]|ObjectCollection findByBprice(string $bprice) Return ChildAliAdjust objects filtered by the bprice column
 * @method     ChildAliAdjust[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliAdjust objects filtered by the cancel_date column
 * @method     ChildAliAdjust[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliAdjust objects filtered by the uid_cancel column
 * @method     ChildAliAdjust[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliAdjust objects filtered by the locationbase column
 * @method     ChildAliAdjust[]|ObjectCollection findByChkcommission(string $chkCommission) Return ChildAliAdjust objects filtered by the chkCommission column
 * @method     ChildAliAdjust[]|ObjectCollection findByMbase(string $mbase) Return ChildAliAdjust objects filtered by the mbase column
 * @method     ChildAliAdjust[]|ObjectCollection findByCrate(string $crate) Return ChildAliAdjust objects filtered by the crate column
 * @method     ChildAliAdjust[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliAdjustQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliAdjustQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliAdjust', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliAdjustQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliAdjustQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliAdjustQuery) {
            return $criteria;
        }
        $query = new ChildAliAdjustQuery();
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
     * @return ChildAliAdjust|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliAdjustTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliAdjustTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliAdjust A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, sadate, inv_code, mcode, name_f, name_t, total, usercode, remark, trnf, id, sa_type, uid, lid, dl, cancel, send, txtMoney, chkCash, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, txtCash, txtFuture, txtTransfer, txtCredit1, txtCredit2, txtCredit3, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, txtoption, ewallet, ewallet_before, ewallet_after, ipay, checkportal, bprice, cancel_date, uid_cancel, locationbase, chkCommission, mbase, crate FROM ali_adjust WHERE id = :p0';
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
            /** @var ChildAliAdjust $obj */
            $obj = new ChildAliAdjust();
            $obj->hydrate($row);
            AliAdjustTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliAdjust|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliAdjustTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliAdjustTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trnf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_LID, $lid, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_SEND, $send, $comparison);
    }

    /**
     * Filter the query on the txtMoney column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtmoney('fooValue');   // WHERE txtMoney = 'fooValue'
     * $query->filterByTxtmoney('%fooValue%', Criteria::LIKE); // WHERE txtMoney LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtmoney The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByTxtmoney($txtmoney = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtmoney)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_TXTMONEY, $txtmoney, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (is_array($txtcash)) {
            $useMinMax = false;
            if (isset($txtcash['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TXTCASH, $txtcash['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcash['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TXTCASH, $txtcash['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (is_array($txtfuture)) {
            $useMinMax = false;
            if (isset($txtfuture['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TXTFUTURE, $txtfuture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtfuture['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TXTFUTURE, $txtfuture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (is_array($txttransfer)) {
            $useMinMax = false;
            if (isset($txttransfer['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TXTTRANSFER, $txttransfer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TXTTRANSFER, $txttransfer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (is_array($txtcredit1)) {
            $useMinMax = false;
            if (isset($txtcredit1['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TXTCREDIT1, $txtcredit1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit1['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TXTCREDIT1, $txtcredit1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (is_array($txtcredit2)) {
            $useMinMax = false;
            if (isset($txtcredit2['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TXTCREDIT2, $txtcredit2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit2['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TXTCREDIT2, $txtcredit2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (is_array($txtcredit3)) {
            $useMinMax = false;
            if (isset($txtcredit3['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TXTCREDIT3, $txtcredit3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit3['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_TXTCREDIT3, $txtcredit3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByIpay($ipay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipay)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_IPAY, $ipay, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Filter the query on the chkCommission column
     *
     * Example usage:
     * <code>
     * $query->filterByChkcommission(1234); // WHERE chkCommission = 1234
     * $query->filterByChkcommission(array(12, 34)); // WHERE chkCommission IN (12, 34)
     * $query->filterByChkcommission(array('min' => 12)); // WHERE chkCommission > 12
     * </code>
     *
     * @param     mixed $chkcommission The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByChkcommission($chkcommission = null, $comparison = null)
    {
        if (is_array($chkcommission)) {
            $useMinMax = false;
            if (isset($chkcommission['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_CHKCOMMISSION, $chkcommission['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($chkcommission['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_CHKCOMMISSION, $chkcommission['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_CHKCOMMISSION, $chkcommission, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_MBASE, $mbase, $comparison);
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
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliAdjustTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAdjustTableMap::COL_CRATE, $crate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliAdjust $aliAdjust Object to remove from the list of results
     *
     * @return $this|ChildAliAdjustQuery The current query, for fluid interface
     */
    public function prune($aliAdjust = null)
    {
        if ($aliAdjust) {
            $this->addUsingAlias(AliAdjustTableMap::COL_ID, $aliAdjust->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_adjust table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAdjustTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliAdjustTableMap::clearInstancePool();
            AliAdjustTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAdjustTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliAdjustTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliAdjustTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliAdjustTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliAdjustQuery
