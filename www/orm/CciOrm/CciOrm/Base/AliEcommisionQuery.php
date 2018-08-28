<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliEcommision as ChildAliEcommision;
use CciOrm\CciOrm\AliEcommisionQuery as ChildAliEcommisionQuery;
use CciOrm\CciOrm\Map\AliEcommisionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_ecommision' table.
 *
 *
 *
 * @method     ChildAliEcommisionQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliEcommisionQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliEcommisionQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliEcommisionQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliEcommisionQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliEcommisionQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliEcommisionQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliEcommisionQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliEcommisionQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliEcommisionQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliEcommisionQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliEcommisionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliEcommisionQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliEcommisionQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliEcommisionQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliEcommisionQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliEcommisionQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliEcommisionQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliEcommisionQuery orderByTxtmoney($order = Criteria::ASC) Order by the txtMoney column
 * @method     ChildAliEcommisionQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliEcommisionQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliEcommisionQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliEcommisionQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliEcommisionQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliEcommisionQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliEcommisionQuery orderByChkwithdraw($order = Criteria::ASC) Order by the chkWithdraw column
 * @method     ChildAliEcommisionQuery orderByChktransferIn($order = Criteria::ASC) Order by the chkTransfer_in column
 * @method     ChildAliEcommisionQuery orderByChktransferOut($order = Criteria::ASC) Order by the chkTransfer_out column
 * @method     ChildAliEcommisionQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliEcommisionQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliEcommisionQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliEcommisionQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliEcommisionQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliEcommisionQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliEcommisionQuery orderByTxtwithdraw($order = Criteria::ASC) Order by the txtWithdraw column
 * @method     ChildAliEcommisionQuery orderByTxttransferIn($order = Criteria::ASC) Order by the txtTransfer_in column
 * @method     ChildAliEcommisionQuery orderByTxttransferOut($order = Criteria::ASC) Order by the txtTransfer_out column
 * @method     ChildAliEcommisionQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliEcommisionQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliEcommisionQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliEcommisionQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliEcommisionQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliEcommisionQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliEcommisionQuery orderByOptionwithdraw($order = Criteria::ASC) Order by the optionWithdraw column
 * @method     ChildAliEcommisionQuery orderByOptiontransferIn($order = Criteria::ASC) Order by the optionTransfer_in column
 * @method     ChildAliEcommisionQuery orderByOptiontransferOut($order = Criteria::ASC) Order by the optionTransfer_out column
 * @method     ChildAliEcommisionQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliEcommisionQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliEcommisionQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliEcommisionQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliEcommisionQuery orderByIpay($order = Criteria::ASC) Order by the ipay column
 * @method     ChildAliEcommisionQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliEcommisionQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliEcommisionQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliEcommisionQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 * @method     ChildAliEcommisionQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliEcommisionQuery orderByChkcommission($order = Criteria::ASC) Order by the chkCommission column
 * @method     ChildAliEcommisionQuery orderByTxtcommission($order = Criteria::ASC) Order by the txtCommission column
 * @method     ChildAliEcommisionQuery orderByOptioncommission($order = Criteria::ASC) Order by the optionCommission column
 * @method     ChildAliEcommisionQuery orderByStatusTranfer($order = Criteria::ASC) Order by the status_tranfer column
 * @method     ChildAliEcommisionQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliEcommisionQuery orderByEcheck($order = Criteria::ASC) Order by the echeck column
 * @method     ChildAliEcommisionQuery orderByCmbonus($order = Criteria::ASC) Order by the cmbonus column
 *
 * @method     ChildAliEcommisionQuery groupBySano() Group by the sano column
 * @method     ChildAliEcommisionQuery groupByRcode() Group by the rcode column
 * @method     ChildAliEcommisionQuery groupBySadate() Group by the sadate column
 * @method     ChildAliEcommisionQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliEcommisionQuery groupByMcode() Group by the mcode column
 * @method     ChildAliEcommisionQuery groupByNameF() Group by the name_f column
 * @method     ChildAliEcommisionQuery groupByNameT() Group by the name_t column
 * @method     ChildAliEcommisionQuery groupByTotal() Group by the total column
 * @method     ChildAliEcommisionQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliEcommisionQuery groupByRemark() Group by the remark column
 * @method     ChildAliEcommisionQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliEcommisionQuery groupById() Group by the id column
 * @method     ChildAliEcommisionQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliEcommisionQuery groupByUid() Group by the uid column
 * @method     ChildAliEcommisionQuery groupByLid() Group by the lid column
 * @method     ChildAliEcommisionQuery groupByDl() Group by the dl column
 * @method     ChildAliEcommisionQuery groupByCancel() Group by the cancel column
 * @method     ChildAliEcommisionQuery groupBySend() Group by the send column
 * @method     ChildAliEcommisionQuery groupByTxtmoney() Group by the txtMoney column
 * @method     ChildAliEcommisionQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliEcommisionQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliEcommisionQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliEcommisionQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliEcommisionQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliEcommisionQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliEcommisionQuery groupByChkwithdraw() Group by the chkWithdraw column
 * @method     ChildAliEcommisionQuery groupByChktransferIn() Group by the chkTransfer_in column
 * @method     ChildAliEcommisionQuery groupByChktransferOut() Group by the chkTransfer_out column
 * @method     ChildAliEcommisionQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliEcommisionQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliEcommisionQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliEcommisionQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliEcommisionQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliEcommisionQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliEcommisionQuery groupByTxtwithdraw() Group by the txtWithdraw column
 * @method     ChildAliEcommisionQuery groupByTxttransferIn() Group by the txtTransfer_in column
 * @method     ChildAliEcommisionQuery groupByTxttransferOut() Group by the txtTransfer_out column
 * @method     ChildAliEcommisionQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliEcommisionQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliEcommisionQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliEcommisionQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliEcommisionQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliEcommisionQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliEcommisionQuery groupByOptionwithdraw() Group by the optionWithdraw column
 * @method     ChildAliEcommisionQuery groupByOptiontransferIn() Group by the optionTransfer_in column
 * @method     ChildAliEcommisionQuery groupByOptiontransferOut() Group by the optionTransfer_out column
 * @method     ChildAliEcommisionQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliEcommisionQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliEcommisionQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliEcommisionQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliEcommisionQuery groupByIpay() Group by the ipay column
 * @method     ChildAliEcommisionQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliEcommisionQuery groupByBprice() Group by the bprice column
 * @method     ChildAliEcommisionQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliEcommisionQuery groupByUidCancel() Group by the uid_cancel column
 * @method     ChildAliEcommisionQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliEcommisionQuery groupByChkcommission() Group by the chkCommission column
 * @method     ChildAliEcommisionQuery groupByTxtcommission() Group by the txtCommission column
 * @method     ChildAliEcommisionQuery groupByOptioncommission() Group by the optionCommission column
 * @method     ChildAliEcommisionQuery groupByStatusTranfer() Group by the status_tranfer column
 * @method     ChildAliEcommisionQuery groupByCrate() Group by the crate column
 * @method     ChildAliEcommisionQuery groupByEcheck() Group by the echeck column
 * @method     ChildAliEcommisionQuery groupByCmbonus() Group by the cmbonus column
 *
 * @method     ChildAliEcommisionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliEcommisionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliEcommisionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliEcommisionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliEcommisionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliEcommisionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliEcommision findOne(ConnectionInterface $con = null) Return the first ChildAliEcommision matching the query
 * @method     ChildAliEcommision findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliEcommision matching the query, or a new ChildAliEcommision object populated from the query conditions when no match is found
 *
 * @method     ChildAliEcommision findOneBySano(string $sano) Return the first ChildAliEcommision filtered by the sano column
 * @method     ChildAliEcommision findOneByRcode(int $rcode) Return the first ChildAliEcommision filtered by the rcode column
 * @method     ChildAliEcommision findOneBySadate(string $sadate) Return the first ChildAliEcommision filtered by the sadate column
 * @method     ChildAliEcommision findOneByInvCode(string $inv_code) Return the first ChildAliEcommision filtered by the inv_code column
 * @method     ChildAliEcommision findOneByMcode(string $mcode) Return the first ChildAliEcommision filtered by the mcode column
 * @method     ChildAliEcommision findOneByNameF(string $name_f) Return the first ChildAliEcommision filtered by the name_f column
 * @method     ChildAliEcommision findOneByNameT(string $name_t) Return the first ChildAliEcommision filtered by the name_t column
 * @method     ChildAliEcommision findOneByTotal(string $total) Return the first ChildAliEcommision filtered by the total column
 * @method     ChildAliEcommision findOneByUsercode(string $usercode) Return the first ChildAliEcommision filtered by the usercode column
 * @method     ChildAliEcommision findOneByRemark(string $remark) Return the first ChildAliEcommision filtered by the remark column
 * @method     ChildAliEcommision findOneByTrnf(string $trnf) Return the first ChildAliEcommision filtered by the trnf column
 * @method     ChildAliEcommision findOneById(int $id) Return the first ChildAliEcommision filtered by the id column
 * @method     ChildAliEcommision findOneBySaType(string $sa_type) Return the first ChildAliEcommision filtered by the sa_type column
 * @method     ChildAliEcommision findOneByUid(string $uid) Return the first ChildAliEcommision filtered by the uid column
 * @method     ChildAliEcommision findOneByLid(string $lid) Return the first ChildAliEcommision filtered by the lid column
 * @method     ChildAliEcommision findOneByDl(string $dl) Return the first ChildAliEcommision filtered by the dl column
 * @method     ChildAliEcommision findOneByCancel(int $cancel) Return the first ChildAliEcommision filtered by the cancel column
 * @method     ChildAliEcommision findOneBySend(int $send) Return the first ChildAliEcommision filtered by the send column
 * @method     ChildAliEcommision findOneByTxtmoney(string $txtMoney) Return the first ChildAliEcommision filtered by the txtMoney column
 * @method     ChildAliEcommision findOneByChkcash(string $chkCash) Return the first ChildAliEcommision filtered by the chkCash column
 * @method     ChildAliEcommision findOneByChkfuture(string $chkFuture) Return the first ChildAliEcommision filtered by the chkFuture column
 * @method     ChildAliEcommision findOneByChktransfer(string $chkTransfer) Return the first ChildAliEcommision filtered by the chkTransfer column
 * @method     ChildAliEcommision findOneByChkcredit1(string $chkCredit1) Return the first ChildAliEcommision filtered by the chkCredit1 column
 * @method     ChildAliEcommision findOneByChkcredit2(string $chkCredit2) Return the first ChildAliEcommision filtered by the chkCredit2 column
 * @method     ChildAliEcommision findOneByChkcredit3(string $chkCredit3) Return the first ChildAliEcommision filtered by the chkCredit3 column
 * @method     ChildAliEcommision findOneByChkwithdraw(string $chkWithdraw) Return the first ChildAliEcommision filtered by the chkWithdraw column
 * @method     ChildAliEcommision findOneByChktransferIn(string $chkTransfer_in) Return the first ChildAliEcommision filtered by the chkTransfer_in column
 * @method     ChildAliEcommision findOneByChktransferOut(string $chkTransfer_out) Return the first ChildAliEcommision filtered by the chkTransfer_out column
 * @method     ChildAliEcommision findOneByTxtcash(string $txtCash) Return the first ChildAliEcommision filtered by the txtCash column
 * @method     ChildAliEcommision findOneByTxtfuture(string $txtFuture) Return the first ChildAliEcommision filtered by the txtFuture column
 * @method     ChildAliEcommision findOneByTxttransfer(string $txtTransfer) Return the first ChildAliEcommision filtered by the txtTransfer column
 * @method     ChildAliEcommision findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliEcommision filtered by the txtCredit1 column
 * @method     ChildAliEcommision findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliEcommision filtered by the txtCredit2 column
 * @method     ChildAliEcommision findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliEcommision filtered by the txtCredit3 column
 * @method     ChildAliEcommision findOneByTxtwithdraw(string $txtWithdraw) Return the first ChildAliEcommision filtered by the txtWithdraw column
 * @method     ChildAliEcommision findOneByTxttransferIn(string $txtTransfer_in) Return the first ChildAliEcommision filtered by the txtTransfer_in column
 * @method     ChildAliEcommision findOneByTxttransferOut(string $txtTransfer_out) Return the first ChildAliEcommision filtered by the txtTransfer_out column
 * @method     ChildAliEcommision findOneByOptioncash(string $optionCash) Return the first ChildAliEcommision filtered by the optionCash column
 * @method     ChildAliEcommision findOneByOptionfuture(string $optionFuture) Return the first ChildAliEcommision filtered by the optionFuture column
 * @method     ChildAliEcommision findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliEcommision filtered by the optionTransfer column
 * @method     ChildAliEcommision findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliEcommision filtered by the optionCredit1 column
 * @method     ChildAliEcommision findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliEcommision filtered by the optionCredit2 column
 * @method     ChildAliEcommision findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliEcommision filtered by the optionCredit3 column
 * @method     ChildAliEcommision findOneByOptionwithdraw(string $optionWithdraw) Return the first ChildAliEcommision filtered by the optionWithdraw column
 * @method     ChildAliEcommision findOneByOptiontransferIn(string $optionTransfer_in) Return the first ChildAliEcommision filtered by the optionTransfer_in column
 * @method     ChildAliEcommision findOneByOptiontransferOut(string $optionTransfer_out) Return the first ChildAliEcommision filtered by the optionTransfer_out column
 * @method     ChildAliEcommision findOneByTxtoption(string $txtoption) Return the first ChildAliEcommision filtered by the txtoption column
 * @method     ChildAliEcommision findOneByEwallet(string $ewallet) Return the first ChildAliEcommision filtered by the ewallet column
 * @method     ChildAliEcommision findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliEcommision filtered by the ewallet_before column
 * @method     ChildAliEcommision findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliEcommision filtered by the ewallet_after column
 * @method     ChildAliEcommision findOneByIpay(string $ipay) Return the first ChildAliEcommision filtered by the ipay column
 * @method     ChildAliEcommision findOneByCheckportal(int $checkportal) Return the first ChildAliEcommision filtered by the checkportal column
 * @method     ChildAliEcommision findOneByBprice(string $bprice) Return the first ChildAliEcommision filtered by the bprice column
 * @method     ChildAliEcommision findOneByCancelDate(string $cancel_date) Return the first ChildAliEcommision filtered by the cancel_date column
 * @method     ChildAliEcommision findOneByUidCancel(string $uid_cancel) Return the first ChildAliEcommision filtered by the uid_cancel column
 * @method     ChildAliEcommision findOneByLocationbase(int $locationbase) Return the first ChildAliEcommision filtered by the locationbase column
 * @method     ChildAliEcommision findOneByChkcommission(string $chkCommission) Return the first ChildAliEcommision filtered by the chkCommission column
 * @method     ChildAliEcommision findOneByTxtcommission(string $txtCommission) Return the first ChildAliEcommision filtered by the txtCommission column
 * @method     ChildAliEcommision findOneByOptioncommission(string $optionCommission) Return the first ChildAliEcommision filtered by the optionCommission column
 * @method     ChildAliEcommision findOneByStatusTranfer(int $status_tranfer) Return the first ChildAliEcommision filtered by the status_tranfer column
 * @method     ChildAliEcommision findOneByCrate(string $crate) Return the first ChildAliEcommision filtered by the crate column
 * @method     ChildAliEcommision findOneByEcheck(string $echeck) Return the first ChildAliEcommision filtered by the echeck column
 * @method     ChildAliEcommision findOneByCmbonus(int $cmbonus) Return the first ChildAliEcommision filtered by the cmbonus column *

 * @method     ChildAliEcommision requirePk($key, ConnectionInterface $con = null) Return the ChildAliEcommision by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOne(ConnectionInterface $con = null) Return the first ChildAliEcommision matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEcommision requireOneBySano(string $sano) Return the first ChildAliEcommision filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByRcode(int $rcode) Return the first ChildAliEcommision filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneBySadate(string $sadate) Return the first ChildAliEcommision filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByInvCode(string $inv_code) Return the first ChildAliEcommision filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByMcode(string $mcode) Return the first ChildAliEcommision filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByNameF(string $name_f) Return the first ChildAliEcommision filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByNameT(string $name_t) Return the first ChildAliEcommision filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTotal(string $total) Return the first ChildAliEcommision filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByUsercode(string $usercode) Return the first ChildAliEcommision filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByRemark(string $remark) Return the first ChildAliEcommision filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTrnf(string $trnf) Return the first ChildAliEcommision filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneById(int $id) Return the first ChildAliEcommision filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneBySaType(string $sa_type) Return the first ChildAliEcommision filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByUid(string $uid) Return the first ChildAliEcommision filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByLid(string $lid) Return the first ChildAliEcommision filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByDl(string $dl) Return the first ChildAliEcommision filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByCancel(int $cancel) Return the first ChildAliEcommision filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneBySend(int $send) Return the first ChildAliEcommision filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTxtmoney(string $txtMoney) Return the first ChildAliEcommision filtered by the txtMoney column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByChkcash(string $chkCash) Return the first ChildAliEcommision filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByChkfuture(string $chkFuture) Return the first ChildAliEcommision filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByChktransfer(string $chkTransfer) Return the first ChildAliEcommision filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliEcommision filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliEcommision filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliEcommision filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByChkwithdraw(string $chkWithdraw) Return the first ChildAliEcommision filtered by the chkWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByChktransferIn(string $chkTransfer_in) Return the first ChildAliEcommision filtered by the chkTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByChktransferOut(string $chkTransfer_out) Return the first ChildAliEcommision filtered by the chkTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTxtcash(string $txtCash) Return the first ChildAliEcommision filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTxtfuture(string $txtFuture) Return the first ChildAliEcommision filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliEcommision filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliEcommision filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliEcommision filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliEcommision filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTxtwithdraw(string $txtWithdraw) Return the first ChildAliEcommision filtered by the txtWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTxttransferIn(string $txtTransfer_in) Return the first ChildAliEcommision filtered by the txtTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTxttransferOut(string $txtTransfer_out) Return the first ChildAliEcommision filtered by the txtTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByOptioncash(string $optionCash) Return the first ChildAliEcommision filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByOptionfuture(string $optionFuture) Return the first ChildAliEcommision filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliEcommision filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliEcommision filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliEcommision filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliEcommision filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByOptionwithdraw(string $optionWithdraw) Return the first ChildAliEcommision filtered by the optionWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByOptiontransferIn(string $optionTransfer_in) Return the first ChildAliEcommision filtered by the optionTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByOptiontransferOut(string $optionTransfer_out) Return the first ChildAliEcommision filtered by the optionTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTxtoption(string $txtoption) Return the first ChildAliEcommision filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByEwallet(string $ewallet) Return the first ChildAliEcommision filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliEcommision filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliEcommision filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByIpay(string $ipay) Return the first ChildAliEcommision filtered by the ipay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByCheckportal(int $checkportal) Return the first ChildAliEcommision filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByBprice(string $bprice) Return the first ChildAliEcommision filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByCancelDate(string $cancel_date) Return the first ChildAliEcommision filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByUidCancel(string $uid_cancel) Return the first ChildAliEcommision filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByLocationbase(int $locationbase) Return the first ChildAliEcommision filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByChkcommission(string $chkCommission) Return the first ChildAliEcommision filtered by the chkCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByTxtcommission(string $txtCommission) Return the first ChildAliEcommision filtered by the txtCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByOptioncommission(string $optionCommission) Return the first ChildAliEcommision filtered by the optionCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByStatusTranfer(int $status_tranfer) Return the first ChildAliEcommision filtered by the status_tranfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByCrate(string $crate) Return the first ChildAliEcommision filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByEcheck(string $echeck) Return the first ChildAliEcommision filtered by the echeck column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcommision requireOneByCmbonus(int $cmbonus) Return the first ChildAliEcommision filtered by the cmbonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEcommision[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliEcommision objects based on current ModelCriteria
 * @method     ChildAliEcommision[]|ObjectCollection findBySano(string $sano) Return ChildAliEcommision objects filtered by the sano column
 * @method     ChildAliEcommision[]|ObjectCollection findByRcode(int $rcode) Return ChildAliEcommision objects filtered by the rcode column
 * @method     ChildAliEcommision[]|ObjectCollection findBySadate(string $sadate) Return ChildAliEcommision objects filtered by the sadate column
 * @method     ChildAliEcommision[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliEcommision objects filtered by the inv_code column
 * @method     ChildAliEcommision[]|ObjectCollection findByMcode(string $mcode) Return ChildAliEcommision objects filtered by the mcode column
 * @method     ChildAliEcommision[]|ObjectCollection findByNameF(string $name_f) Return ChildAliEcommision objects filtered by the name_f column
 * @method     ChildAliEcommision[]|ObjectCollection findByNameT(string $name_t) Return ChildAliEcommision objects filtered by the name_t column
 * @method     ChildAliEcommision[]|ObjectCollection findByTotal(string $total) Return ChildAliEcommision objects filtered by the total column
 * @method     ChildAliEcommision[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliEcommision objects filtered by the usercode column
 * @method     ChildAliEcommision[]|ObjectCollection findByRemark(string $remark) Return ChildAliEcommision objects filtered by the remark column
 * @method     ChildAliEcommision[]|ObjectCollection findByTrnf(string $trnf) Return ChildAliEcommision objects filtered by the trnf column
 * @method     ChildAliEcommision[]|ObjectCollection findById(int $id) Return ChildAliEcommision objects filtered by the id column
 * @method     ChildAliEcommision[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliEcommision objects filtered by the sa_type column
 * @method     ChildAliEcommision[]|ObjectCollection findByUid(string $uid) Return ChildAliEcommision objects filtered by the uid column
 * @method     ChildAliEcommision[]|ObjectCollection findByLid(string $lid) Return ChildAliEcommision objects filtered by the lid column
 * @method     ChildAliEcommision[]|ObjectCollection findByDl(string $dl) Return ChildAliEcommision objects filtered by the dl column
 * @method     ChildAliEcommision[]|ObjectCollection findByCancel(int $cancel) Return ChildAliEcommision objects filtered by the cancel column
 * @method     ChildAliEcommision[]|ObjectCollection findBySend(int $send) Return ChildAliEcommision objects filtered by the send column
 * @method     ChildAliEcommision[]|ObjectCollection findByTxtmoney(string $txtMoney) Return ChildAliEcommision objects filtered by the txtMoney column
 * @method     ChildAliEcommision[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliEcommision objects filtered by the chkCash column
 * @method     ChildAliEcommision[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliEcommision objects filtered by the chkFuture column
 * @method     ChildAliEcommision[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliEcommision objects filtered by the chkTransfer column
 * @method     ChildAliEcommision[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliEcommision objects filtered by the chkCredit1 column
 * @method     ChildAliEcommision[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliEcommision objects filtered by the chkCredit2 column
 * @method     ChildAliEcommision[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliEcommision objects filtered by the chkCredit3 column
 * @method     ChildAliEcommision[]|ObjectCollection findByChkwithdraw(string $chkWithdraw) Return ChildAliEcommision objects filtered by the chkWithdraw column
 * @method     ChildAliEcommision[]|ObjectCollection findByChktransferIn(string $chkTransfer_in) Return ChildAliEcommision objects filtered by the chkTransfer_in column
 * @method     ChildAliEcommision[]|ObjectCollection findByChktransferOut(string $chkTransfer_out) Return ChildAliEcommision objects filtered by the chkTransfer_out column
 * @method     ChildAliEcommision[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliEcommision objects filtered by the txtCash column
 * @method     ChildAliEcommision[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliEcommision objects filtered by the txtFuture column
 * @method     ChildAliEcommision[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliEcommision objects filtered by the txtTransfer column
 * @method     ChildAliEcommision[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliEcommision objects filtered by the txtCredit1 column
 * @method     ChildAliEcommision[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliEcommision objects filtered by the txtCredit2 column
 * @method     ChildAliEcommision[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliEcommision objects filtered by the txtCredit3 column
 * @method     ChildAliEcommision[]|ObjectCollection findByTxtwithdraw(string $txtWithdraw) Return ChildAliEcommision objects filtered by the txtWithdraw column
 * @method     ChildAliEcommision[]|ObjectCollection findByTxttransferIn(string $txtTransfer_in) Return ChildAliEcommision objects filtered by the txtTransfer_in column
 * @method     ChildAliEcommision[]|ObjectCollection findByTxttransferOut(string $txtTransfer_out) Return ChildAliEcommision objects filtered by the txtTransfer_out column
 * @method     ChildAliEcommision[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliEcommision objects filtered by the optionCash column
 * @method     ChildAliEcommision[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliEcommision objects filtered by the optionFuture column
 * @method     ChildAliEcommision[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliEcommision objects filtered by the optionTransfer column
 * @method     ChildAliEcommision[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliEcommision objects filtered by the optionCredit1 column
 * @method     ChildAliEcommision[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliEcommision objects filtered by the optionCredit2 column
 * @method     ChildAliEcommision[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliEcommision objects filtered by the optionCredit3 column
 * @method     ChildAliEcommision[]|ObjectCollection findByOptionwithdraw(string $optionWithdraw) Return ChildAliEcommision objects filtered by the optionWithdraw column
 * @method     ChildAliEcommision[]|ObjectCollection findByOptiontransferIn(string $optionTransfer_in) Return ChildAliEcommision objects filtered by the optionTransfer_in column
 * @method     ChildAliEcommision[]|ObjectCollection findByOptiontransferOut(string $optionTransfer_out) Return ChildAliEcommision objects filtered by the optionTransfer_out column
 * @method     ChildAliEcommision[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliEcommision objects filtered by the txtoption column
 * @method     ChildAliEcommision[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliEcommision objects filtered by the ewallet column
 * @method     ChildAliEcommision[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliEcommision objects filtered by the ewallet_before column
 * @method     ChildAliEcommision[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliEcommision objects filtered by the ewallet_after column
 * @method     ChildAliEcommision[]|ObjectCollection findByIpay(string $ipay) Return ChildAliEcommision objects filtered by the ipay column
 * @method     ChildAliEcommision[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliEcommision objects filtered by the checkportal column
 * @method     ChildAliEcommision[]|ObjectCollection findByBprice(string $bprice) Return ChildAliEcommision objects filtered by the bprice column
 * @method     ChildAliEcommision[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliEcommision objects filtered by the cancel_date column
 * @method     ChildAliEcommision[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliEcommision objects filtered by the uid_cancel column
 * @method     ChildAliEcommision[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliEcommision objects filtered by the locationbase column
 * @method     ChildAliEcommision[]|ObjectCollection findByChkcommission(string $chkCommission) Return ChildAliEcommision objects filtered by the chkCommission column
 * @method     ChildAliEcommision[]|ObjectCollection findByTxtcommission(string $txtCommission) Return ChildAliEcommision objects filtered by the txtCommission column
 * @method     ChildAliEcommision[]|ObjectCollection findByOptioncommission(string $optionCommission) Return ChildAliEcommision objects filtered by the optionCommission column
 * @method     ChildAliEcommision[]|ObjectCollection findByStatusTranfer(int $status_tranfer) Return ChildAliEcommision objects filtered by the status_tranfer column
 * @method     ChildAliEcommision[]|ObjectCollection findByCrate(string $crate) Return ChildAliEcommision objects filtered by the crate column
 * @method     ChildAliEcommision[]|ObjectCollection findByEcheck(string $echeck) Return ChildAliEcommision objects filtered by the echeck column
 * @method     ChildAliEcommision[]|ObjectCollection findByCmbonus(int $cmbonus) Return ChildAliEcommision objects filtered by the cmbonus column
 * @method     ChildAliEcommision[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliEcommisionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliEcommisionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliEcommision', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliEcommisionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliEcommisionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliEcommisionQuery) {
            return $criteria;
        }
        $query = new ChildAliEcommisionQuery();
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
     * @return ChildAliEcommision|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliEcommisionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliEcommisionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliEcommision A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, rcode, sadate, inv_code, mcode, name_f, name_t, total, usercode, remark, trnf, id, sa_type, uid, lid, dl, cancel, send, txtMoney, chkCash, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkWithdraw, chkTransfer_in, chkTransfer_out, txtCash, txtFuture, txtTransfer, txtCredit1, txtCredit2, txtCredit3, txtWithdraw, txtTransfer_in, txtTransfer_out, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionWithdraw, optionTransfer_in, optionTransfer_out, txtoption, ewallet, ewallet_before, ewallet_after, ipay, checkportal, bprice, cancel_date, uid_cancel, locationbase, chkCommission, txtCommission, optionCommission, status_tranfer, crate, echeck, cmbonus FROM ali_ecommision WHERE id = :p0';
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
            /** @var ChildAliEcommision $obj */
            $obj = new ChildAliEcommision();
            $obj->hydrate($row);
            AliEcommisionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliEcommision|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliEcommisionTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliEcommisionTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trnf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_LID, $lid, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_SEND, $send, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTxtmoney($txtmoney = null, $comparison = null)
    {
        if (is_array($txtmoney)) {
            $useMinMax = false;
            if (isset($txtmoney['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTMONEY, $txtmoney['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtmoney['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTMONEY, $txtmoney['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TXTMONEY, $txtmoney, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByChkwithdraw($chkwithdraw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkwithdraw)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CHKWITHDRAW, $chkwithdraw, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByChktransferIn($chktransferIn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransferIn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CHKTRANSFER_IN, $chktransferIn, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByChktransferOut($chktransferOut = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransferOut)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CHKTRANSFER_OUT, $chktransferOut, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (is_array($txtcash)) {
            $useMinMax = false;
            if (isset($txtcash['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCASH, $txtcash['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcash['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCASH, $txtcash['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (is_array($txtfuture)) {
            $useMinMax = false;
            if (isset($txtfuture['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTFUTURE, $txtfuture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtfuture['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTFUTURE, $txtfuture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (is_array($txttransfer)) {
            $useMinMax = false;
            if (isset($txttransfer['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTTRANSFER, $txttransfer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTTRANSFER, $txttransfer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (is_array($txtcredit1)) {
            $useMinMax = false;
            if (isset($txtcredit1['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCREDIT1, $txtcredit1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit1['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCREDIT1, $txtcredit1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (is_array($txtcredit2)) {
            $useMinMax = false;
            if (isset($txtcredit2['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCREDIT2, $txtcredit2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit2['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCREDIT2, $txtcredit2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (is_array($txtcredit3)) {
            $useMinMax = false;
            if (isset($txtcredit3['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCREDIT3, $txtcredit3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit3['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCREDIT3, $txtcredit3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTxtwithdraw($txtwithdraw = null, $comparison = null)
    {
        if (is_array($txtwithdraw)) {
            $useMinMax = false;
            if (isset($txtwithdraw['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTWITHDRAW, $txtwithdraw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtwithdraw['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTWITHDRAW, $txtwithdraw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TXTWITHDRAW, $txtwithdraw, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTxttransferIn($txttransferIn = null, $comparison = null)
    {
        if (is_array($txttransferIn)) {
            $useMinMax = false;
            if (isset($txttransferIn['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTTRANSFER_IN, $txttransferIn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransferIn['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTTRANSFER_IN, $txttransferIn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TXTTRANSFER_IN, $txttransferIn, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTxttransferOut($txttransferOut = null, $comparison = null)
    {
        if (is_array($txttransferOut)) {
            $useMinMax = false;
            if (isset($txttransferOut['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTTRANSFER_OUT, $txttransferOut['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransferOut['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTTRANSFER_OUT, $txttransferOut['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TXTTRANSFER_OUT, $txttransferOut, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByOptionwithdraw($optionwithdraw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionwithdraw)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_OPTIONWITHDRAW, $optionwithdraw, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByOptiontransferIn($optiontransferIn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransferIn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_OPTIONTRANSFER_IN, $optiontransferIn, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByOptiontransferOut($optiontransferOut = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransferOut)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_OPTIONTRANSFER_OUT, $optiontransferOut, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByIpay($ipay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipay)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_IPAY, $ipay, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByChkcommission($chkcommission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcommission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CHKCOMMISSION, $chkcommission, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByTxtcommission($txtcommission = null, $comparison = null)
    {
        if (is_array($txtcommission)) {
            $useMinMax = false;
            if (isset($txtcommission['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCOMMISSION, $txtcommission['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcommission['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCOMMISSION, $txtcommission['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_TXTCOMMISSION, $txtcommission, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByOptioncommission($optioncommission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncommission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_OPTIONCOMMISSION, $optioncommission, $comparison);
    }

    /**
     * Filter the query on the status_tranfer column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusTranfer(1234); // WHERE status_tranfer = 1234
     * $query->filterByStatusTranfer(array(12, 34)); // WHERE status_tranfer IN (12, 34)
     * $query->filterByStatusTranfer(array('min' => 12)); // WHERE status_tranfer > 12
     * </code>
     *
     * @param     mixed $statusTranfer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByStatusTranfer($statusTranfer = null, $comparison = null)
    {
        if (is_array($statusTranfer)) {
            $useMinMax = false;
            if (isset($statusTranfer['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_STATUS_TRANFER, $statusTranfer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusTranfer['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_STATUS_TRANFER, $statusTranfer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_STATUS_TRANFER, $statusTranfer, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByEcheck($echeck = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($echeck)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_ECHECK, $echeck, $comparison);
    }

    /**
     * Filter the query on the cmbonus column
     *
     * Example usage:
     * <code>
     * $query->filterByCmbonus(1234); // WHERE cmbonus = 1234
     * $query->filterByCmbonus(array(12, 34)); // WHERE cmbonus IN (12, 34)
     * $query->filterByCmbonus(array('min' => 12)); // WHERE cmbonus > 12
     * </code>
     *
     * @param     mixed $cmbonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function filterByCmbonus($cmbonus = null, $comparison = null)
    {
        if (is_array($cmbonus)) {
            $useMinMax = false;
            if (isset($cmbonus['min'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_CMBONUS, $cmbonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cmbonus['max'])) {
                $this->addUsingAlias(AliEcommisionTableMap::COL_CMBONUS, $cmbonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcommisionTableMap::COL_CMBONUS, $cmbonus, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliEcommision $aliEcommision Object to remove from the list of results
     *
     * @return $this|ChildAliEcommisionQuery The current query, for fluid interface
     */
    public function prune($aliEcommision = null)
    {
        if ($aliEcommision) {
            $this->addUsingAlias(AliEcommisionTableMap::COL_ID, $aliEcommision->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_ecommision table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEcommisionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliEcommisionTableMap::clearInstancePool();
            AliEcommisionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEcommisionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliEcommisionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliEcommisionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliEcommisionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliEcommisionQuery
