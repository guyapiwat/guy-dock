<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliVoucher as ChildAliVoucher;
use CciOrm\CciOrm\AliVoucherQuery as ChildAliVoucherQuery;
use CciOrm\CciOrm\Map\AliVoucherTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_voucher' table.
 *
 *
 *
 * @method     ChildAliVoucherQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliVoucherQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliVoucherQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliVoucherQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliVoucherQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliVoucherQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliVoucherQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliVoucherQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliVoucherQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliVoucherQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliVoucherQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliVoucherQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliVoucherQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliVoucherQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliVoucherQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliVoucherQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliVoucherQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliVoucherQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliVoucherQuery orderByTxtmoney($order = Criteria::ASC) Order by the txtMoney column
 * @method     ChildAliVoucherQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliVoucherQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliVoucherQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliVoucherQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliVoucherQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliVoucherQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliVoucherQuery orderByChkwithdraw($order = Criteria::ASC) Order by the chkWithdraw column
 * @method     ChildAliVoucherQuery orderByChktransferIn($order = Criteria::ASC) Order by the chkTransfer_in column
 * @method     ChildAliVoucherQuery orderByChktransferOut($order = Criteria::ASC) Order by the chkTransfer_out column
 * @method     ChildAliVoucherQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliVoucherQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliVoucherQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliVoucherQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliVoucherQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliVoucherQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliVoucherQuery orderByTxtwithdraw($order = Criteria::ASC) Order by the txtWithdraw column
 * @method     ChildAliVoucherQuery orderByTxttransferIn($order = Criteria::ASC) Order by the txtTransfer_in column
 * @method     ChildAliVoucherQuery orderByTxttransferOut($order = Criteria::ASC) Order by the txtTransfer_out column
 * @method     ChildAliVoucherQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliVoucherQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliVoucherQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliVoucherQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliVoucherQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliVoucherQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliVoucherQuery orderByOptionwithdraw($order = Criteria::ASC) Order by the optionWithdraw column
 * @method     ChildAliVoucherQuery orderByOptiontransferIn($order = Criteria::ASC) Order by the optionTransfer_in column
 * @method     ChildAliVoucherQuery orderByOptiontransferOut($order = Criteria::ASC) Order by the optionTransfer_out column
 * @method     ChildAliVoucherQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliVoucherQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliVoucherQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliVoucherQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliVoucherQuery orderByIpay($order = Criteria::ASC) Order by the ipay column
 * @method     ChildAliVoucherQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliVoucherQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliVoucherQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliVoucherQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 * @method     ChildAliVoucherQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliVoucherQuery orderByChkcommission($order = Criteria::ASC) Order by the chkCommission column
 * @method     ChildAliVoucherQuery orderByTxtcommission($order = Criteria::ASC) Order by the txtCommission column
 * @method     ChildAliVoucherQuery orderByOptioncommission($order = Criteria::ASC) Order by the optionCommission column
 * @method     ChildAliVoucherQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliVoucherQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliVoucherQuery orderByEcheck($order = Criteria::ASC) Order by the echeck column
 *
 * @method     ChildAliVoucherQuery groupBySano() Group by the sano column
 * @method     ChildAliVoucherQuery groupByRcode() Group by the rcode column
 * @method     ChildAliVoucherQuery groupBySadate() Group by the sadate column
 * @method     ChildAliVoucherQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliVoucherQuery groupByMcode() Group by the mcode column
 * @method     ChildAliVoucherQuery groupByNameF() Group by the name_f column
 * @method     ChildAliVoucherQuery groupByNameT() Group by the name_t column
 * @method     ChildAliVoucherQuery groupByTotal() Group by the total column
 * @method     ChildAliVoucherQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliVoucherQuery groupByRemark() Group by the remark column
 * @method     ChildAliVoucherQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliVoucherQuery groupById() Group by the id column
 * @method     ChildAliVoucherQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliVoucherQuery groupByUid() Group by the uid column
 * @method     ChildAliVoucherQuery groupByLid() Group by the lid column
 * @method     ChildAliVoucherQuery groupByDl() Group by the dl column
 * @method     ChildAliVoucherQuery groupByCancel() Group by the cancel column
 * @method     ChildAliVoucherQuery groupBySend() Group by the send column
 * @method     ChildAliVoucherQuery groupByTxtmoney() Group by the txtMoney column
 * @method     ChildAliVoucherQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliVoucherQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliVoucherQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliVoucherQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliVoucherQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliVoucherQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliVoucherQuery groupByChkwithdraw() Group by the chkWithdraw column
 * @method     ChildAliVoucherQuery groupByChktransferIn() Group by the chkTransfer_in column
 * @method     ChildAliVoucherQuery groupByChktransferOut() Group by the chkTransfer_out column
 * @method     ChildAliVoucherQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliVoucherQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliVoucherQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliVoucherQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliVoucherQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliVoucherQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliVoucherQuery groupByTxtwithdraw() Group by the txtWithdraw column
 * @method     ChildAliVoucherQuery groupByTxttransferIn() Group by the txtTransfer_in column
 * @method     ChildAliVoucherQuery groupByTxttransferOut() Group by the txtTransfer_out column
 * @method     ChildAliVoucherQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliVoucherQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliVoucherQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliVoucherQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliVoucherQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliVoucherQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliVoucherQuery groupByOptionwithdraw() Group by the optionWithdraw column
 * @method     ChildAliVoucherQuery groupByOptiontransferIn() Group by the optionTransfer_in column
 * @method     ChildAliVoucherQuery groupByOptiontransferOut() Group by the optionTransfer_out column
 * @method     ChildAliVoucherQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliVoucherQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliVoucherQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliVoucherQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliVoucherQuery groupByIpay() Group by the ipay column
 * @method     ChildAliVoucherQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliVoucherQuery groupByBprice() Group by the bprice column
 * @method     ChildAliVoucherQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliVoucherQuery groupByUidCancel() Group by the uid_cancel column
 * @method     ChildAliVoucherQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliVoucherQuery groupByChkcommission() Group by the chkCommission column
 * @method     ChildAliVoucherQuery groupByTxtcommission() Group by the txtCommission column
 * @method     ChildAliVoucherQuery groupByOptioncommission() Group by the optionCommission column
 * @method     ChildAliVoucherQuery groupByMbase() Group by the mbase column
 * @method     ChildAliVoucherQuery groupByCrate() Group by the crate column
 * @method     ChildAliVoucherQuery groupByEcheck() Group by the echeck column
 *
 * @method     ChildAliVoucherQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliVoucherQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliVoucherQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliVoucherQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliVoucherQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliVoucherQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliVoucher findOne(ConnectionInterface $con = null) Return the first ChildAliVoucher matching the query
 * @method     ChildAliVoucher findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliVoucher matching the query, or a new ChildAliVoucher object populated from the query conditions when no match is found
 *
 * @method     ChildAliVoucher findOneBySano(string $sano) Return the first ChildAliVoucher filtered by the sano column
 * @method     ChildAliVoucher findOneByRcode(int $rcode) Return the first ChildAliVoucher filtered by the rcode column
 * @method     ChildAliVoucher findOneBySadate(string $sadate) Return the first ChildAliVoucher filtered by the sadate column
 * @method     ChildAliVoucher findOneByInvCode(string $inv_code) Return the first ChildAliVoucher filtered by the inv_code column
 * @method     ChildAliVoucher findOneByMcode(string $mcode) Return the first ChildAliVoucher filtered by the mcode column
 * @method     ChildAliVoucher findOneByNameF(string $name_f) Return the first ChildAliVoucher filtered by the name_f column
 * @method     ChildAliVoucher findOneByNameT(string $name_t) Return the first ChildAliVoucher filtered by the name_t column
 * @method     ChildAliVoucher findOneByTotal(string $total) Return the first ChildAliVoucher filtered by the total column
 * @method     ChildAliVoucher findOneByUsercode(string $usercode) Return the first ChildAliVoucher filtered by the usercode column
 * @method     ChildAliVoucher findOneByRemark(string $remark) Return the first ChildAliVoucher filtered by the remark column
 * @method     ChildAliVoucher findOneByTrnf(string $trnf) Return the first ChildAliVoucher filtered by the trnf column
 * @method     ChildAliVoucher findOneById(int $id) Return the first ChildAliVoucher filtered by the id column
 * @method     ChildAliVoucher findOneBySaType(string $sa_type) Return the first ChildAliVoucher filtered by the sa_type column
 * @method     ChildAliVoucher findOneByUid(string $uid) Return the first ChildAliVoucher filtered by the uid column
 * @method     ChildAliVoucher findOneByLid(string $lid) Return the first ChildAliVoucher filtered by the lid column
 * @method     ChildAliVoucher findOneByDl(string $dl) Return the first ChildAliVoucher filtered by the dl column
 * @method     ChildAliVoucher findOneByCancel(int $cancel) Return the first ChildAliVoucher filtered by the cancel column
 * @method     ChildAliVoucher findOneBySend(int $send) Return the first ChildAliVoucher filtered by the send column
 * @method     ChildAliVoucher findOneByTxtmoney(string $txtMoney) Return the first ChildAliVoucher filtered by the txtMoney column
 * @method     ChildAliVoucher findOneByChkcash(string $chkCash) Return the first ChildAliVoucher filtered by the chkCash column
 * @method     ChildAliVoucher findOneByChkfuture(string $chkFuture) Return the first ChildAliVoucher filtered by the chkFuture column
 * @method     ChildAliVoucher findOneByChktransfer(string $chkTransfer) Return the first ChildAliVoucher filtered by the chkTransfer column
 * @method     ChildAliVoucher findOneByChkcredit1(string $chkCredit1) Return the first ChildAliVoucher filtered by the chkCredit1 column
 * @method     ChildAliVoucher findOneByChkcredit2(string $chkCredit2) Return the first ChildAliVoucher filtered by the chkCredit2 column
 * @method     ChildAliVoucher findOneByChkcredit3(string $chkCredit3) Return the first ChildAliVoucher filtered by the chkCredit3 column
 * @method     ChildAliVoucher findOneByChkwithdraw(string $chkWithdraw) Return the first ChildAliVoucher filtered by the chkWithdraw column
 * @method     ChildAliVoucher findOneByChktransferIn(string $chkTransfer_in) Return the first ChildAliVoucher filtered by the chkTransfer_in column
 * @method     ChildAliVoucher findOneByChktransferOut(string $chkTransfer_out) Return the first ChildAliVoucher filtered by the chkTransfer_out column
 * @method     ChildAliVoucher findOneByTxtcash(string $txtCash) Return the first ChildAliVoucher filtered by the txtCash column
 * @method     ChildAliVoucher findOneByTxtfuture(string $txtFuture) Return the first ChildAliVoucher filtered by the txtFuture column
 * @method     ChildAliVoucher findOneByTxttransfer(string $txtTransfer) Return the first ChildAliVoucher filtered by the txtTransfer column
 * @method     ChildAliVoucher findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliVoucher filtered by the txtCredit1 column
 * @method     ChildAliVoucher findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliVoucher filtered by the txtCredit2 column
 * @method     ChildAliVoucher findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliVoucher filtered by the txtCredit3 column
 * @method     ChildAliVoucher findOneByTxtwithdraw(string $txtWithdraw) Return the first ChildAliVoucher filtered by the txtWithdraw column
 * @method     ChildAliVoucher findOneByTxttransferIn(string $txtTransfer_in) Return the first ChildAliVoucher filtered by the txtTransfer_in column
 * @method     ChildAliVoucher findOneByTxttransferOut(string $txtTransfer_out) Return the first ChildAliVoucher filtered by the txtTransfer_out column
 * @method     ChildAliVoucher findOneByOptioncash(string $optionCash) Return the first ChildAliVoucher filtered by the optionCash column
 * @method     ChildAliVoucher findOneByOptionfuture(string $optionFuture) Return the first ChildAliVoucher filtered by the optionFuture column
 * @method     ChildAliVoucher findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliVoucher filtered by the optionTransfer column
 * @method     ChildAliVoucher findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliVoucher filtered by the optionCredit1 column
 * @method     ChildAliVoucher findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliVoucher filtered by the optionCredit2 column
 * @method     ChildAliVoucher findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliVoucher filtered by the optionCredit3 column
 * @method     ChildAliVoucher findOneByOptionwithdraw(string $optionWithdraw) Return the first ChildAliVoucher filtered by the optionWithdraw column
 * @method     ChildAliVoucher findOneByOptiontransferIn(string $optionTransfer_in) Return the first ChildAliVoucher filtered by the optionTransfer_in column
 * @method     ChildAliVoucher findOneByOptiontransferOut(string $optionTransfer_out) Return the first ChildAliVoucher filtered by the optionTransfer_out column
 * @method     ChildAliVoucher findOneByTxtoption(string $txtoption) Return the first ChildAliVoucher filtered by the txtoption column
 * @method     ChildAliVoucher findOneByEwallet(string $ewallet) Return the first ChildAliVoucher filtered by the ewallet column
 * @method     ChildAliVoucher findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliVoucher filtered by the ewallet_before column
 * @method     ChildAliVoucher findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliVoucher filtered by the ewallet_after column
 * @method     ChildAliVoucher findOneByIpay(string $ipay) Return the first ChildAliVoucher filtered by the ipay column
 * @method     ChildAliVoucher findOneByCheckportal(int $checkportal) Return the first ChildAliVoucher filtered by the checkportal column
 * @method     ChildAliVoucher findOneByBprice(string $bprice) Return the first ChildAliVoucher filtered by the bprice column
 * @method     ChildAliVoucher findOneByCancelDate(string $cancel_date) Return the first ChildAliVoucher filtered by the cancel_date column
 * @method     ChildAliVoucher findOneByUidCancel(string $uid_cancel) Return the first ChildAliVoucher filtered by the uid_cancel column
 * @method     ChildAliVoucher findOneByLocationbase(int $locationbase) Return the first ChildAliVoucher filtered by the locationbase column
 * @method     ChildAliVoucher findOneByChkcommission(string $chkCommission) Return the first ChildAliVoucher filtered by the chkCommission column
 * @method     ChildAliVoucher findOneByTxtcommission(string $txtCommission) Return the first ChildAliVoucher filtered by the txtCommission column
 * @method     ChildAliVoucher findOneByOptioncommission(string $optionCommission) Return the first ChildAliVoucher filtered by the optionCommission column
 * @method     ChildAliVoucher findOneByMbase(string $mbase) Return the first ChildAliVoucher filtered by the mbase column
 * @method     ChildAliVoucher findOneByCrate(string $crate) Return the first ChildAliVoucher filtered by the crate column
 * @method     ChildAliVoucher findOneByEcheck(string $echeck) Return the first ChildAliVoucher filtered by the echeck column *

 * @method     ChildAliVoucher requirePk($key, ConnectionInterface $con = null) Return the ChildAliVoucher by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOne(ConnectionInterface $con = null) Return the first ChildAliVoucher matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliVoucher requireOneBySano(string $sano) Return the first ChildAliVoucher filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByRcode(int $rcode) Return the first ChildAliVoucher filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneBySadate(string $sadate) Return the first ChildAliVoucher filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByInvCode(string $inv_code) Return the first ChildAliVoucher filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByMcode(string $mcode) Return the first ChildAliVoucher filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByNameF(string $name_f) Return the first ChildAliVoucher filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByNameT(string $name_t) Return the first ChildAliVoucher filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTotal(string $total) Return the first ChildAliVoucher filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByUsercode(string $usercode) Return the first ChildAliVoucher filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByRemark(string $remark) Return the first ChildAliVoucher filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTrnf(string $trnf) Return the first ChildAliVoucher filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneById(int $id) Return the first ChildAliVoucher filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneBySaType(string $sa_type) Return the first ChildAliVoucher filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByUid(string $uid) Return the first ChildAliVoucher filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByLid(string $lid) Return the first ChildAliVoucher filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByDl(string $dl) Return the first ChildAliVoucher filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByCancel(int $cancel) Return the first ChildAliVoucher filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneBySend(int $send) Return the first ChildAliVoucher filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTxtmoney(string $txtMoney) Return the first ChildAliVoucher filtered by the txtMoney column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByChkcash(string $chkCash) Return the first ChildAliVoucher filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByChkfuture(string $chkFuture) Return the first ChildAliVoucher filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByChktransfer(string $chkTransfer) Return the first ChildAliVoucher filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliVoucher filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliVoucher filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliVoucher filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByChkwithdraw(string $chkWithdraw) Return the first ChildAliVoucher filtered by the chkWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByChktransferIn(string $chkTransfer_in) Return the first ChildAliVoucher filtered by the chkTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByChktransferOut(string $chkTransfer_out) Return the first ChildAliVoucher filtered by the chkTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTxtcash(string $txtCash) Return the first ChildAliVoucher filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTxtfuture(string $txtFuture) Return the first ChildAliVoucher filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliVoucher filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliVoucher filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliVoucher filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliVoucher filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTxtwithdraw(string $txtWithdraw) Return the first ChildAliVoucher filtered by the txtWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTxttransferIn(string $txtTransfer_in) Return the first ChildAliVoucher filtered by the txtTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTxttransferOut(string $txtTransfer_out) Return the first ChildAliVoucher filtered by the txtTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByOptioncash(string $optionCash) Return the first ChildAliVoucher filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByOptionfuture(string $optionFuture) Return the first ChildAliVoucher filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliVoucher filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliVoucher filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliVoucher filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliVoucher filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByOptionwithdraw(string $optionWithdraw) Return the first ChildAliVoucher filtered by the optionWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByOptiontransferIn(string $optionTransfer_in) Return the first ChildAliVoucher filtered by the optionTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByOptiontransferOut(string $optionTransfer_out) Return the first ChildAliVoucher filtered by the optionTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTxtoption(string $txtoption) Return the first ChildAliVoucher filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByEwallet(string $ewallet) Return the first ChildAliVoucher filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliVoucher filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliVoucher filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByIpay(string $ipay) Return the first ChildAliVoucher filtered by the ipay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByCheckportal(int $checkportal) Return the first ChildAliVoucher filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByBprice(string $bprice) Return the first ChildAliVoucher filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByCancelDate(string $cancel_date) Return the first ChildAliVoucher filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByUidCancel(string $uid_cancel) Return the first ChildAliVoucher filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByLocationbase(int $locationbase) Return the first ChildAliVoucher filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByChkcommission(string $chkCommission) Return the first ChildAliVoucher filtered by the chkCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByTxtcommission(string $txtCommission) Return the first ChildAliVoucher filtered by the txtCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByOptioncommission(string $optionCommission) Return the first ChildAliVoucher filtered by the optionCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByMbase(string $mbase) Return the first ChildAliVoucher filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByCrate(string $crate) Return the first ChildAliVoucher filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliVoucher requireOneByEcheck(string $echeck) Return the first ChildAliVoucher filtered by the echeck column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliVoucher[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliVoucher objects based on current ModelCriteria
 * @method     ChildAliVoucher[]|ObjectCollection findBySano(string $sano) Return ChildAliVoucher objects filtered by the sano column
 * @method     ChildAliVoucher[]|ObjectCollection findByRcode(int $rcode) Return ChildAliVoucher objects filtered by the rcode column
 * @method     ChildAliVoucher[]|ObjectCollection findBySadate(string $sadate) Return ChildAliVoucher objects filtered by the sadate column
 * @method     ChildAliVoucher[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliVoucher objects filtered by the inv_code column
 * @method     ChildAliVoucher[]|ObjectCollection findByMcode(string $mcode) Return ChildAliVoucher objects filtered by the mcode column
 * @method     ChildAliVoucher[]|ObjectCollection findByNameF(string $name_f) Return ChildAliVoucher objects filtered by the name_f column
 * @method     ChildAliVoucher[]|ObjectCollection findByNameT(string $name_t) Return ChildAliVoucher objects filtered by the name_t column
 * @method     ChildAliVoucher[]|ObjectCollection findByTotal(string $total) Return ChildAliVoucher objects filtered by the total column
 * @method     ChildAliVoucher[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliVoucher objects filtered by the usercode column
 * @method     ChildAliVoucher[]|ObjectCollection findByRemark(string $remark) Return ChildAliVoucher objects filtered by the remark column
 * @method     ChildAliVoucher[]|ObjectCollection findByTrnf(string $trnf) Return ChildAliVoucher objects filtered by the trnf column
 * @method     ChildAliVoucher[]|ObjectCollection findById(int $id) Return ChildAliVoucher objects filtered by the id column
 * @method     ChildAliVoucher[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliVoucher objects filtered by the sa_type column
 * @method     ChildAliVoucher[]|ObjectCollection findByUid(string $uid) Return ChildAliVoucher objects filtered by the uid column
 * @method     ChildAliVoucher[]|ObjectCollection findByLid(string $lid) Return ChildAliVoucher objects filtered by the lid column
 * @method     ChildAliVoucher[]|ObjectCollection findByDl(string $dl) Return ChildAliVoucher objects filtered by the dl column
 * @method     ChildAliVoucher[]|ObjectCollection findByCancel(int $cancel) Return ChildAliVoucher objects filtered by the cancel column
 * @method     ChildAliVoucher[]|ObjectCollection findBySend(int $send) Return ChildAliVoucher objects filtered by the send column
 * @method     ChildAliVoucher[]|ObjectCollection findByTxtmoney(string $txtMoney) Return ChildAliVoucher objects filtered by the txtMoney column
 * @method     ChildAliVoucher[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliVoucher objects filtered by the chkCash column
 * @method     ChildAliVoucher[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliVoucher objects filtered by the chkFuture column
 * @method     ChildAliVoucher[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliVoucher objects filtered by the chkTransfer column
 * @method     ChildAliVoucher[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliVoucher objects filtered by the chkCredit1 column
 * @method     ChildAliVoucher[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliVoucher objects filtered by the chkCredit2 column
 * @method     ChildAliVoucher[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliVoucher objects filtered by the chkCredit3 column
 * @method     ChildAliVoucher[]|ObjectCollection findByChkwithdraw(string $chkWithdraw) Return ChildAliVoucher objects filtered by the chkWithdraw column
 * @method     ChildAliVoucher[]|ObjectCollection findByChktransferIn(string $chkTransfer_in) Return ChildAliVoucher objects filtered by the chkTransfer_in column
 * @method     ChildAliVoucher[]|ObjectCollection findByChktransferOut(string $chkTransfer_out) Return ChildAliVoucher objects filtered by the chkTransfer_out column
 * @method     ChildAliVoucher[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliVoucher objects filtered by the txtCash column
 * @method     ChildAliVoucher[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliVoucher objects filtered by the txtFuture column
 * @method     ChildAliVoucher[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliVoucher objects filtered by the txtTransfer column
 * @method     ChildAliVoucher[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliVoucher objects filtered by the txtCredit1 column
 * @method     ChildAliVoucher[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliVoucher objects filtered by the txtCredit2 column
 * @method     ChildAliVoucher[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliVoucher objects filtered by the txtCredit3 column
 * @method     ChildAliVoucher[]|ObjectCollection findByTxtwithdraw(string $txtWithdraw) Return ChildAliVoucher objects filtered by the txtWithdraw column
 * @method     ChildAliVoucher[]|ObjectCollection findByTxttransferIn(string $txtTransfer_in) Return ChildAliVoucher objects filtered by the txtTransfer_in column
 * @method     ChildAliVoucher[]|ObjectCollection findByTxttransferOut(string $txtTransfer_out) Return ChildAliVoucher objects filtered by the txtTransfer_out column
 * @method     ChildAliVoucher[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliVoucher objects filtered by the optionCash column
 * @method     ChildAliVoucher[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliVoucher objects filtered by the optionFuture column
 * @method     ChildAliVoucher[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliVoucher objects filtered by the optionTransfer column
 * @method     ChildAliVoucher[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliVoucher objects filtered by the optionCredit1 column
 * @method     ChildAliVoucher[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliVoucher objects filtered by the optionCredit2 column
 * @method     ChildAliVoucher[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliVoucher objects filtered by the optionCredit3 column
 * @method     ChildAliVoucher[]|ObjectCollection findByOptionwithdraw(string $optionWithdraw) Return ChildAliVoucher objects filtered by the optionWithdraw column
 * @method     ChildAliVoucher[]|ObjectCollection findByOptiontransferIn(string $optionTransfer_in) Return ChildAliVoucher objects filtered by the optionTransfer_in column
 * @method     ChildAliVoucher[]|ObjectCollection findByOptiontransferOut(string $optionTransfer_out) Return ChildAliVoucher objects filtered by the optionTransfer_out column
 * @method     ChildAliVoucher[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliVoucher objects filtered by the txtoption column
 * @method     ChildAliVoucher[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliVoucher objects filtered by the ewallet column
 * @method     ChildAliVoucher[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliVoucher objects filtered by the ewallet_before column
 * @method     ChildAliVoucher[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliVoucher objects filtered by the ewallet_after column
 * @method     ChildAliVoucher[]|ObjectCollection findByIpay(string $ipay) Return ChildAliVoucher objects filtered by the ipay column
 * @method     ChildAliVoucher[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliVoucher objects filtered by the checkportal column
 * @method     ChildAliVoucher[]|ObjectCollection findByBprice(string $bprice) Return ChildAliVoucher objects filtered by the bprice column
 * @method     ChildAliVoucher[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliVoucher objects filtered by the cancel_date column
 * @method     ChildAliVoucher[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliVoucher objects filtered by the uid_cancel column
 * @method     ChildAliVoucher[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliVoucher objects filtered by the locationbase column
 * @method     ChildAliVoucher[]|ObjectCollection findByChkcommission(string $chkCommission) Return ChildAliVoucher objects filtered by the chkCommission column
 * @method     ChildAliVoucher[]|ObjectCollection findByTxtcommission(string $txtCommission) Return ChildAliVoucher objects filtered by the txtCommission column
 * @method     ChildAliVoucher[]|ObjectCollection findByOptioncommission(string $optionCommission) Return ChildAliVoucher objects filtered by the optionCommission column
 * @method     ChildAliVoucher[]|ObjectCollection findByMbase(string $mbase) Return ChildAliVoucher objects filtered by the mbase column
 * @method     ChildAliVoucher[]|ObjectCollection findByCrate(string $crate) Return ChildAliVoucher objects filtered by the crate column
 * @method     ChildAliVoucher[]|ObjectCollection findByEcheck(string $echeck) Return ChildAliVoucher objects filtered by the echeck column
 * @method     ChildAliVoucher[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliVoucherQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliVoucherQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliVoucher', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliVoucherQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliVoucherQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliVoucherQuery) {
            return $criteria;
        }
        $query = new ChildAliVoucherQuery();
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
     * @return ChildAliVoucher|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliVoucherTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliVoucherTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliVoucher A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, rcode, sadate, inv_code, mcode, name_f, name_t, total, usercode, remark, trnf, id, sa_type, uid, lid, dl, cancel, send, txtMoney, chkCash, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkWithdraw, chkTransfer_in, chkTransfer_out, txtCash, txtFuture, txtTransfer, txtCredit1, txtCredit2, txtCredit3, txtWithdraw, txtTransfer_in, txtTransfer_out, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionWithdraw, optionTransfer_in, optionTransfer_out, txtoption, ewallet, ewallet_before, ewallet_after, ipay, checkportal, bprice, cancel_date, uid_cancel, locationbase, chkCommission, txtCommission, optionCommission, mbase, crate, echeck FROM ali_voucher WHERE id = :p0';
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
            /** @var ChildAliVoucher $obj */
            $obj = new ChildAliVoucher();
            $obj->hydrate($row);
            AliVoucherTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliVoucher|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliVoucherTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliVoucherTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trnf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_LID, $lid, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_SEND, $send, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTxtmoney($txtmoney = null, $comparison = null)
    {
        if (is_array($txtmoney)) {
            $useMinMax = false;
            if (isset($txtmoney['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTMONEY, $txtmoney['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtmoney['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTMONEY, $txtmoney['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TXTMONEY, $txtmoney, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByChkwithdraw($chkwithdraw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkwithdraw)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CHKWITHDRAW, $chkwithdraw, $comparison);
    }

    /**
     * Filter the query on the chkTransfer_in column
     *
     * Example usage:
     * <code>
     * $query->filterByChktransferIn('fooValue');   // WHERE chkTransfer_in = 'fooValue'
     * $query->filterByChktransferIn('%fooValue%', Criteria::LIKE); // WHERE chkTransfer_in LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chktransferIn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByChktransferIn($chktransferIn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransferIn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CHKTRANSFER_IN, $chktransferIn, $comparison);
    }

    /**
     * Filter the query on the chkTransfer_out column
     *
     * Example usage:
     * <code>
     * $query->filterByChktransferOut('fooValue');   // WHERE chkTransfer_out = 'fooValue'
     * $query->filterByChktransferOut('%fooValue%', Criteria::LIKE); // WHERE chkTransfer_out LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chktransferOut The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByChktransferOut($chktransferOut = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransferOut)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CHKTRANSFER_OUT, $chktransferOut, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (is_array($txtcash)) {
            $useMinMax = false;
            if (isset($txtcash['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTCASH, $txtcash['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcash['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTCASH, $txtcash['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (is_array($txtfuture)) {
            $useMinMax = false;
            if (isset($txtfuture['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTFUTURE, $txtfuture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtfuture['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTFUTURE, $txtfuture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (is_array($txttransfer)) {
            $useMinMax = false;
            if (isset($txttransfer['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTTRANSFER, $txttransfer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTTRANSFER, $txttransfer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (is_array($txtcredit1)) {
            $useMinMax = false;
            if (isset($txtcredit1['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTCREDIT1, $txtcredit1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit1['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTCREDIT1, $txtcredit1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (is_array($txtcredit2)) {
            $useMinMax = false;
            if (isset($txtcredit2['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTCREDIT2, $txtcredit2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit2['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTCREDIT2, $txtcredit2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (is_array($txtcredit3)) {
            $useMinMax = false;
            if (isset($txtcredit3['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTCREDIT3, $txtcredit3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit3['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTCREDIT3, $txtcredit3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTxtwithdraw($txtwithdraw = null, $comparison = null)
    {
        if (is_array($txtwithdraw)) {
            $useMinMax = false;
            if (isset($txtwithdraw['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTWITHDRAW, $txtwithdraw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtwithdraw['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTWITHDRAW, $txtwithdraw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TXTWITHDRAW, $txtwithdraw, $comparison);
    }

    /**
     * Filter the query on the txtTransfer_in column
     *
     * Example usage:
     * <code>
     * $query->filterByTxttransferIn(1234); // WHERE txtTransfer_in = 1234
     * $query->filterByTxttransferIn(array(12, 34)); // WHERE txtTransfer_in IN (12, 34)
     * $query->filterByTxttransferIn(array('min' => 12)); // WHERE txtTransfer_in > 12
     * </code>
     *
     * @param     mixed $txttransferIn The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTxttransferIn($txttransferIn = null, $comparison = null)
    {
        if (is_array($txttransferIn)) {
            $useMinMax = false;
            if (isset($txttransferIn['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTTRANSFER_IN, $txttransferIn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransferIn['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTTRANSFER_IN, $txttransferIn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TXTTRANSFER_IN, $txttransferIn, $comparison);
    }

    /**
     * Filter the query on the txtTransfer_out column
     *
     * Example usage:
     * <code>
     * $query->filterByTxttransferOut(1234); // WHERE txtTransfer_out = 1234
     * $query->filterByTxttransferOut(array(12, 34)); // WHERE txtTransfer_out IN (12, 34)
     * $query->filterByTxttransferOut(array('min' => 12)); // WHERE txtTransfer_out > 12
     * </code>
     *
     * @param     mixed $txttransferOut The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTxttransferOut($txttransferOut = null, $comparison = null)
    {
        if (is_array($txttransferOut)) {
            $useMinMax = false;
            if (isset($txttransferOut['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTTRANSFER_OUT, $txttransferOut['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransferOut['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTTRANSFER_OUT, $txttransferOut['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TXTTRANSFER_OUT, $txttransferOut, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByOptionwithdraw($optionwithdraw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionwithdraw)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_OPTIONWITHDRAW, $optionwithdraw, $comparison);
    }

    /**
     * Filter the query on the optionTransfer_in column
     *
     * Example usage:
     * <code>
     * $query->filterByOptiontransferIn('fooValue');   // WHERE optionTransfer_in = 'fooValue'
     * $query->filterByOptiontransferIn('%fooValue%', Criteria::LIKE); // WHERE optionTransfer_in LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optiontransferIn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByOptiontransferIn($optiontransferIn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransferIn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_OPTIONTRANSFER_IN, $optiontransferIn, $comparison);
    }

    /**
     * Filter the query on the optionTransfer_out column
     *
     * Example usage:
     * <code>
     * $query->filterByOptiontransferOut('fooValue');   // WHERE optionTransfer_out = 'fooValue'
     * $query->filterByOptiontransferOut('%fooValue%', Criteria::LIKE); // WHERE optionTransfer_out LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optiontransferOut The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByOptiontransferOut($optiontransferOut = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransferOut)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_OPTIONTRANSFER_OUT, $optiontransferOut, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByIpay($ipay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipay)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_IPAY, $ipay, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByChkcommission($chkcommission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcommission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CHKCOMMISSION, $chkcommission, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByTxtcommission($txtcommission = null, $comparison = null)
    {
        if (is_array($txtcommission)) {
            $useMinMax = false;
            if (isset($txtcommission['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTCOMMISSION, $txtcommission['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcommission['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_TXTCOMMISSION, $txtcommission['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_TXTCOMMISSION, $txtcommission, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByOptioncommission($optioncommission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncommission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_OPTIONCOMMISSION, $optioncommission, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_MBASE, $mbase, $comparison);
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
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliVoucherTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_CRATE, $crate, $comparison);
    }

    /**
     * Filter the query on the echeck column
     *
     * Example usage:
     * <code>
     * $query->filterByEcheck('fooValue');   // WHERE echeck = 'fooValue'
     * $query->filterByEcheck('%fooValue%', Criteria::LIKE); // WHERE echeck LIKE '%fooValue%'
     * </code>
     *
     * @param     string $echeck The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function filterByEcheck($echeck = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($echeck)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliVoucherTableMap::COL_ECHECK, $echeck, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliVoucher $aliVoucher Object to remove from the list of results
     *
     * @return $this|ChildAliVoucherQuery The current query, for fluid interface
     */
    public function prune($aliVoucher = null)
    {
        if ($aliVoucher) {
            $this->addUsingAlias(AliVoucherTableMap::COL_ID, $aliVoucher->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_voucher table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliVoucherTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliVoucherTableMap::clearInstancePool();
            AliVoucherTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliVoucherTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliVoucherTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliVoucherTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliVoucherTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliVoucherQuery
