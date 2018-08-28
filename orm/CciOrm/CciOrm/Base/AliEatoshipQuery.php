<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliEatoship as ChildAliEatoship;
use CciOrm\CciOrm\AliEatoshipQuery as ChildAliEatoshipQuery;
use CciOrm\CciOrm\Map\AliEatoshipTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_eatoship' table.
 *
 *
 *
 * @method     ChildAliEatoshipQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliEatoshipQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliEatoshipQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliEatoshipQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliEatoshipQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliEatoshipQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliEatoshipQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliEatoshipQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliEatoshipQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliEatoshipQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliEatoshipQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliEatoshipQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliEatoshipQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliEatoshipQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliEatoshipQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliEatoshipQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliEatoshipQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliEatoshipQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliEatoshipQuery orderByTxtmoney($order = Criteria::ASC) Order by the txtMoney column
 * @method     ChildAliEatoshipQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliEatoshipQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliEatoshipQuery orderByChkinternet($order = Criteria::ASC) Order by the chkInternet column
 * @method     ChildAliEatoshipQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliEatoshipQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliEatoshipQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliEatoshipQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliEatoshipQuery orderByChkwithdraw($order = Criteria::ASC) Order by the chkWithdraw column
 * @method     ChildAliEatoshipQuery orderByChktransferIn($order = Criteria::ASC) Order by the chkTransfer_in column
 * @method     ChildAliEatoshipQuery orderByChktransferOut($order = Criteria::ASC) Order by the chkTransfer_out column
 * @method     ChildAliEatoshipQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliEatoshipQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliEatoshipQuery orderByTxtinternet($order = Criteria::ASC) Order by the txtInternet column
 * @method     ChildAliEatoshipQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliEatoshipQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliEatoshipQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliEatoshipQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliEatoshipQuery orderByTxtwithdraw($order = Criteria::ASC) Order by the txtWithdraw column
 * @method     ChildAliEatoshipQuery orderByTxtdiscount($order = Criteria::ASC) Order by the txtDiscount column
 * @method     ChildAliEatoshipQuery orderByTxttransferIn($order = Criteria::ASC) Order by the txtTransfer_in column
 * @method     ChildAliEatoshipQuery orderByTxttransferOut($order = Criteria::ASC) Order by the txtTransfer_out column
 * @method     ChildAliEatoshipQuery orderByTxtvoucher($order = Criteria::ASC) Order by the txtVoucher column
 * @method     ChildAliEatoshipQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliEatoshipQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliEatoshipQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliEatoshipQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliEatoshipQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliEatoshipQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliEatoshipQuery orderByOptionwithdraw($order = Criteria::ASC) Order by the optionWithdraw column
 * @method     ChildAliEatoshipQuery orderByOptiontransferIn($order = Criteria::ASC) Order by the optionTransfer_in column
 * @method     ChildAliEatoshipQuery orderByOptiontransferOut($order = Criteria::ASC) Order by the optionTransfer_out column
 * @method     ChildAliEatoshipQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliEatoshipQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliEatoshipQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliEatoshipQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliEatoshipQuery orderByIpay($order = Criteria::ASC) Order by the ipay column
 * @method     ChildAliEatoshipQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliEatoshipQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliEatoshipQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliEatoshipQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 * @method     ChildAliEatoshipQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliEatoshipQuery orderByChkcommission($order = Criteria::ASC) Order by the chkCommission column
 * @method     ChildAliEatoshipQuery orderByTxtcommission($order = Criteria::ASC) Order by the txtCommission column
 * @method     ChildAliEatoshipQuery orderByOptioncommission($order = Criteria::ASC) Order by the optionCommission column
 * @method     ChildAliEatoshipQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliEatoshipQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliEatoshipQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliEatoshipQuery orderByEcheck($order = Criteria::ASC) Order by the echeck column
 *
 * @method     ChildAliEatoshipQuery groupBySano() Group by the sano column
 * @method     ChildAliEatoshipQuery groupBySadate() Group by the sadate column
 * @method     ChildAliEatoshipQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliEatoshipQuery groupByMcode() Group by the mcode column
 * @method     ChildAliEatoshipQuery groupByNameF() Group by the name_f column
 * @method     ChildAliEatoshipQuery groupByNameT() Group by the name_t column
 * @method     ChildAliEatoshipQuery groupByTotal() Group by the total column
 * @method     ChildAliEatoshipQuery groupByPv() Group by the pv column
 * @method     ChildAliEatoshipQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliEatoshipQuery groupByRemark() Group by the remark column
 * @method     ChildAliEatoshipQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliEatoshipQuery groupById() Group by the id column
 * @method     ChildAliEatoshipQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliEatoshipQuery groupByUid() Group by the uid column
 * @method     ChildAliEatoshipQuery groupByLid() Group by the lid column
 * @method     ChildAliEatoshipQuery groupByDl() Group by the dl column
 * @method     ChildAliEatoshipQuery groupByCancel() Group by the cancel column
 * @method     ChildAliEatoshipQuery groupBySend() Group by the send column
 * @method     ChildAliEatoshipQuery groupByTxtmoney() Group by the txtMoney column
 * @method     ChildAliEatoshipQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliEatoshipQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliEatoshipQuery groupByChkinternet() Group by the chkInternet column
 * @method     ChildAliEatoshipQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliEatoshipQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliEatoshipQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliEatoshipQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliEatoshipQuery groupByChkwithdraw() Group by the chkWithdraw column
 * @method     ChildAliEatoshipQuery groupByChktransferIn() Group by the chkTransfer_in column
 * @method     ChildAliEatoshipQuery groupByChktransferOut() Group by the chkTransfer_out column
 * @method     ChildAliEatoshipQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliEatoshipQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliEatoshipQuery groupByTxtinternet() Group by the txtInternet column
 * @method     ChildAliEatoshipQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliEatoshipQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliEatoshipQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliEatoshipQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliEatoshipQuery groupByTxtwithdraw() Group by the txtWithdraw column
 * @method     ChildAliEatoshipQuery groupByTxtdiscount() Group by the txtDiscount column
 * @method     ChildAliEatoshipQuery groupByTxttransferIn() Group by the txtTransfer_in column
 * @method     ChildAliEatoshipQuery groupByTxttransferOut() Group by the txtTransfer_out column
 * @method     ChildAliEatoshipQuery groupByTxtvoucher() Group by the txtVoucher column
 * @method     ChildAliEatoshipQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliEatoshipQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliEatoshipQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliEatoshipQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliEatoshipQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliEatoshipQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliEatoshipQuery groupByOptionwithdraw() Group by the optionWithdraw column
 * @method     ChildAliEatoshipQuery groupByOptiontransferIn() Group by the optionTransfer_in column
 * @method     ChildAliEatoshipQuery groupByOptiontransferOut() Group by the optionTransfer_out column
 * @method     ChildAliEatoshipQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliEatoshipQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliEatoshipQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliEatoshipQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliEatoshipQuery groupByIpay() Group by the ipay column
 * @method     ChildAliEatoshipQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliEatoshipQuery groupByBprice() Group by the bprice column
 * @method     ChildAliEatoshipQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliEatoshipQuery groupByUidCancel() Group by the uid_cancel column
 * @method     ChildAliEatoshipQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliEatoshipQuery groupByChkcommission() Group by the chkCommission column
 * @method     ChildAliEatoshipQuery groupByTxtcommission() Group by the txtCommission column
 * @method     ChildAliEatoshipQuery groupByOptioncommission() Group by the optionCommission column
 * @method     ChildAliEatoshipQuery groupByMbase() Group by the mbase column
 * @method     ChildAliEatoshipQuery groupByCrate() Group by the crate column
 * @method     ChildAliEatoshipQuery groupByRcode() Group by the rcode column
 * @method     ChildAliEatoshipQuery groupByEcheck() Group by the echeck column
 *
 * @method     ChildAliEatoshipQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliEatoshipQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliEatoshipQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliEatoshipQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliEatoshipQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliEatoshipQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliEatoship findOne(ConnectionInterface $con = null) Return the first ChildAliEatoship matching the query
 * @method     ChildAliEatoship findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliEatoship matching the query, or a new ChildAliEatoship object populated from the query conditions when no match is found
 *
 * @method     ChildAliEatoship findOneBySano(string $sano) Return the first ChildAliEatoship filtered by the sano column
 * @method     ChildAliEatoship findOneBySadate(string $sadate) Return the first ChildAliEatoship filtered by the sadate column
 * @method     ChildAliEatoship findOneByInvCode(string $inv_code) Return the first ChildAliEatoship filtered by the inv_code column
 * @method     ChildAliEatoship findOneByMcode(string $mcode) Return the first ChildAliEatoship filtered by the mcode column
 * @method     ChildAliEatoship findOneByNameF(string $name_f) Return the first ChildAliEatoship filtered by the name_f column
 * @method     ChildAliEatoship findOneByNameT(string $name_t) Return the first ChildAliEatoship filtered by the name_t column
 * @method     ChildAliEatoship findOneByTotal(string $total) Return the first ChildAliEatoship filtered by the total column
 * @method     ChildAliEatoship findOneByPv(int $pv) Return the first ChildAliEatoship filtered by the pv column
 * @method     ChildAliEatoship findOneByUsercode(string $usercode) Return the first ChildAliEatoship filtered by the usercode column
 * @method     ChildAliEatoship findOneByRemark(string $remark) Return the first ChildAliEatoship filtered by the remark column
 * @method     ChildAliEatoship findOneByTrnf(string $trnf) Return the first ChildAliEatoship filtered by the trnf column
 * @method     ChildAliEatoship findOneById(int $id) Return the first ChildAliEatoship filtered by the id column
 * @method     ChildAliEatoship findOneBySaType(string $sa_type) Return the first ChildAliEatoship filtered by the sa_type column
 * @method     ChildAliEatoship findOneByUid(string $uid) Return the first ChildAliEatoship filtered by the uid column
 * @method     ChildAliEatoship findOneByLid(string $lid) Return the first ChildAliEatoship filtered by the lid column
 * @method     ChildAliEatoship findOneByDl(string $dl) Return the first ChildAliEatoship filtered by the dl column
 * @method     ChildAliEatoship findOneByCancel(int $cancel) Return the first ChildAliEatoship filtered by the cancel column
 * @method     ChildAliEatoship findOneBySend(int $send) Return the first ChildAliEatoship filtered by the send column
 * @method     ChildAliEatoship findOneByTxtmoney(string $txtMoney) Return the first ChildAliEatoship filtered by the txtMoney column
 * @method     ChildAliEatoship findOneByChkcash(string $chkCash) Return the first ChildAliEatoship filtered by the chkCash column
 * @method     ChildAliEatoship findOneByChkfuture(string $chkFuture) Return the first ChildAliEatoship filtered by the chkFuture column
 * @method     ChildAliEatoship findOneByChkinternet(string $chkInternet) Return the first ChildAliEatoship filtered by the chkInternet column
 * @method     ChildAliEatoship findOneByChktransfer(string $chkTransfer) Return the first ChildAliEatoship filtered by the chkTransfer column
 * @method     ChildAliEatoship findOneByChkcredit1(string $chkCredit1) Return the first ChildAliEatoship filtered by the chkCredit1 column
 * @method     ChildAliEatoship findOneByChkcredit2(string $chkCredit2) Return the first ChildAliEatoship filtered by the chkCredit2 column
 * @method     ChildAliEatoship findOneByChkcredit3(string $chkCredit3) Return the first ChildAliEatoship filtered by the chkCredit3 column
 * @method     ChildAliEatoship findOneByChkwithdraw(string $chkWithdraw) Return the first ChildAliEatoship filtered by the chkWithdraw column
 * @method     ChildAliEatoship findOneByChktransferIn(string $chkTransfer_in) Return the first ChildAliEatoship filtered by the chkTransfer_in column
 * @method     ChildAliEatoship findOneByChktransferOut(string $chkTransfer_out) Return the first ChildAliEatoship filtered by the chkTransfer_out column
 * @method     ChildAliEatoship findOneByTxtcash(string $txtCash) Return the first ChildAliEatoship filtered by the txtCash column
 * @method     ChildAliEatoship findOneByTxtfuture(string $txtFuture) Return the first ChildAliEatoship filtered by the txtFuture column
 * @method     ChildAliEatoship findOneByTxtinternet(string $txtInternet) Return the first ChildAliEatoship filtered by the txtInternet column
 * @method     ChildAliEatoship findOneByTxttransfer(string $txtTransfer) Return the first ChildAliEatoship filtered by the txtTransfer column
 * @method     ChildAliEatoship findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliEatoship filtered by the txtCredit1 column
 * @method     ChildAliEatoship findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliEatoship filtered by the txtCredit2 column
 * @method     ChildAliEatoship findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliEatoship filtered by the txtCredit3 column
 * @method     ChildAliEatoship findOneByTxtwithdraw(string $txtWithdraw) Return the first ChildAliEatoship filtered by the txtWithdraw column
 * @method     ChildAliEatoship findOneByTxtdiscount(string $txtDiscount) Return the first ChildAliEatoship filtered by the txtDiscount column
 * @method     ChildAliEatoship findOneByTxttransferIn(string $txtTransfer_in) Return the first ChildAliEatoship filtered by the txtTransfer_in column
 * @method     ChildAliEatoship findOneByTxttransferOut(string $txtTransfer_out) Return the first ChildAliEatoship filtered by the txtTransfer_out column
 * @method     ChildAliEatoship findOneByTxtvoucher(string $txtVoucher) Return the first ChildAliEatoship filtered by the txtVoucher column
 * @method     ChildAliEatoship findOneByOptioncash(string $optionCash) Return the first ChildAliEatoship filtered by the optionCash column
 * @method     ChildAliEatoship findOneByOptionfuture(string $optionFuture) Return the first ChildAliEatoship filtered by the optionFuture column
 * @method     ChildAliEatoship findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliEatoship filtered by the optionTransfer column
 * @method     ChildAliEatoship findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliEatoship filtered by the optionCredit1 column
 * @method     ChildAliEatoship findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliEatoship filtered by the optionCredit2 column
 * @method     ChildAliEatoship findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliEatoship filtered by the optionCredit3 column
 * @method     ChildAliEatoship findOneByOptionwithdraw(string $optionWithdraw) Return the first ChildAliEatoship filtered by the optionWithdraw column
 * @method     ChildAliEatoship findOneByOptiontransferIn(string $optionTransfer_in) Return the first ChildAliEatoship filtered by the optionTransfer_in column
 * @method     ChildAliEatoship findOneByOptiontransferOut(string $optionTransfer_out) Return the first ChildAliEatoship filtered by the optionTransfer_out column
 * @method     ChildAliEatoship findOneByTxtoption(string $txtoption) Return the first ChildAliEatoship filtered by the txtoption column
 * @method     ChildAliEatoship findOneByEwallet(string $ewallet) Return the first ChildAliEatoship filtered by the ewallet column
 * @method     ChildAliEatoship findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliEatoship filtered by the ewallet_before column
 * @method     ChildAliEatoship findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliEatoship filtered by the ewallet_after column
 * @method     ChildAliEatoship findOneByIpay(string $ipay) Return the first ChildAliEatoship filtered by the ipay column
 * @method     ChildAliEatoship findOneByCheckportal(int $checkportal) Return the first ChildAliEatoship filtered by the checkportal column
 * @method     ChildAliEatoship findOneByBprice(string $bprice) Return the first ChildAliEatoship filtered by the bprice column
 * @method     ChildAliEatoship findOneByCancelDate(string $cancel_date) Return the first ChildAliEatoship filtered by the cancel_date column
 * @method     ChildAliEatoship findOneByUidCancel(string $uid_cancel) Return the first ChildAliEatoship filtered by the uid_cancel column
 * @method     ChildAliEatoship findOneByLocationbase(int $locationbase) Return the first ChildAliEatoship filtered by the locationbase column
 * @method     ChildAliEatoship findOneByChkcommission(string $chkCommission) Return the first ChildAliEatoship filtered by the chkCommission column
 * @method     ChildAliEatoship findOneByTxtcommission(string $txtCommission) Return the first ChildAliEatoship filtered by the txtCommission column
 * @method     ChildAliEatoship findOneByOptioncommission(string $optionCommission) Return the first ChildAliEatoship filtered by the optionCommission column
 * @method     ChildAliEatoship findOneByMbase(string $mbase) Return the first ChildAliEatoship filtered by the mbase column
 * @method     ChildAliEatoship findOneByCrate(string $crate) Return the first ChildAliEatoship filtered by the crate column
 * @method     ChildAliEatoship findOneByRcode(int $rcode) Return the first ChildAliEatoship filtered by the rcode column
 * @method     ChildAliEatoship findOneByEcheck(string $echeck) Return the first ChildAliEatoship filtered by the echeck column *

 * @method     ChildAliEatoship requirePk($key, ConnectionInterface $con = null) Return the ChildAliEatoship by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOne(ConnectionInterface $con = null) Return the first ChildAliEatoship matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEatoship requireOneBySano(string $sano) Return the first ChildAliEatoship filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneBySadate(string $sadate) Return the first ChildAliEatoship filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByInvCode(string $inv_code) Return the first ChildAliEatoship filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByMcode(string $mcode) Return the first ChildAliEatoship filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByNameF(string $name_f) Return the first ChildAliEatoship filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByNameT(string $name_t) Return the first ChildAliEatoship filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTotal(string $total) Return the first ChildAliEatoship filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByPv(int $pv) Return the first ChildAliEatoship filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByUsercode(string $usercode) Return the first ChildAliEatoship filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByRemark(string $remark) Return the first ChildAliEatoship filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTrnf(string $trnf) Return the first ChildAliEatoship filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneById(int $id) Return the first ChildAliEatoship filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneBySaType(string $sa_type) Return the first ChildAliEatoship filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByUid(string $uid) Return the first ChildAliEatoship filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByLid(string $lid) Return the first ChildAliEatoship filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByDl(string $dl) Return the first ChildAliEatoship filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByCancel(int $cancel) Return the first ChildAliEatoship filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneBySend(int $send) Return the first ChildAliEatoship filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxtmoney(string $txtMoney) Return the first ChildAliEatoship filtered by the txtMoney column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByChkcash(string $chkCash) Return the first ChildAliEatoship filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByChkfuture(string $chkFuture) Return the first ChildAliEatoship filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByChkinternet(string $chkInternet) Return the first ChildAliEatoship filtered by the chkInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByChktransfer(string $chkTransfer) Return the first ChildAliEatoship filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliEatoship filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliEatoship filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliEatoship filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByChkwithdraw(string $chkWithdraw) Return the first ChildAliEatoship filtered by the chkWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByChktransferIn(string $chkTransfer_in) Return the first ChildAliEatoship filtered by the chkTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByChktransferOut(string $chkTransfer_out) Return the first ChildAliEatoship filtered by the chkTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxtcash(string $txtCash) Return the first ChildAliEatoship filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxtfuture(string $txtFuture) Return the first ChildAliEatoship filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxtinternet(string $txtInternet) Return the first ChildAliEatoship filtered by the txtInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliEatoship filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliEatoship filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliEatoship filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliEatoship filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxtwithdraw(string $txtWithdraw) Return the first ChildAliEatoship filtered by the txtWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxtdiscount(string $txtDiscount) Return the first ChildAliEatoship filtered by the txtDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxttransferIn(string $txtTransfer_in) Return the first ChildAliEatoship filtered by the txtTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxttransferOut(string $txtTransfer_out) Return the first ChildAliEatoship filtered by the txtTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxtvoucher(string $txtVoucher) Return the first ChildAliEatoship filtered by the txtVoucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByOptioncash(string $optionCash) Return the first ChildAliEatoship filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByOptionfuture(string $optionFuture) Return the first ChildAliEatoship filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliEatoship filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliEatoship filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliEatoship filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliEatoship filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByOptionwithdraw(string $optionWithdraw) Return the first ChildAliEatoship filtered by the optionWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByOptiontransferIn(string $optionTransfer_in) Return the first ChildAliEatoship filtered by the optionTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByOptiontransferOut(string $optionTransfer_out) Return the first ChildAliEatoship filtered by the optionTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxtoption(string $txtoption) Return the first ChildAliEatoship filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByEwallet(string $ewallet) Return the first ChildAliEatoship filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliEatoship filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliEatoship filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByIpay(string $ipay) Return the first ChildAliEatoship filtered by the ipay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByCheckportal(int $checkportal) Return the first ChildAliEatoship filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByBprice(string $bprice) Return the first ChildAliEatoship filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByCancelDate(string $cancel_date) Return the first ChildAliEatoship filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByUidCancel(string $uid_cancel) Return the first ChildAliEatoship filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByLocationbase(int $locationbase) Return the first ChildAliEatoship filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByChkcommission(string $chkCommission) Return the first ChildAliEatoship filtered by the chkCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByTxtcommission(string $txtCommission) Return the first ChildAliEatoship filtered by the txtCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByOptioncommission(string $optionCommission) Return the first ChildAliEatoship filtered by the optionCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByMbase(string $mbase) Return the first ChildAliEatoship filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByCrate(string $crate) Return the first ChildAliEatoship filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByRcode(int $rcode) Return the first ChildAliEatoship filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEatoship requireOneByEcheck(string $echeck) Return the first ChildAliEatoship filtered by the echeck column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEatoship[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliEatoship objects based on current ModelCriteria
 * @method     ChildAliEatoship[]|ObjectCollection findBySano(string $sano) Return ChildAliEatoship objects filtered by the sano column
 * @method     ChildAliEatoship[]|ObjectCollection findBySadate(string $sadate) Return ChildAliEatoship objects filtered by the sadate column
 * @method     ChildAliEatoship[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliEatoship objects filtered by the inv_code column
 * @method     ChildAliEatoship[]|ObjectCollection findByMcode(string $mcode) Return ChildAliEatoship objects filtered by the mcode column
 * @method     ChildAliEatoship[]|ObjectCollection findByNameF(string $name_f) Return ChildAliEatoship objects filtered by the name_f column
 * @method     ChildAliEatoship[]|ObjectCollection findByNameT(string $name_t) Return ChildAliEatoship objects filtered by the name_t column
 * @method     ChildAliEatoship[]|ObjectCollection findByTotal(string $total) Return ChildAliEatoship objects filtered by the total column
 * @method     ChildAliEatoship[]|ObjectCollection findByPv(int $pv) Return ChildAliEatoship objects filtered by the pv column
 * @method     ChildAliEatoship[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliEatoship objects filtered by the usercode column
 * @method     ChildAliEatoship[]|ObjectCollection findByRemark(string $remark) Return ChildAliEatoship objects filtered by the remark column
 * @method     ChildAliEatoship[]|ObjectCollection findByTrnf(string $trnf) Return ChildAliEatoship objects filtered by the trnf column
 * @method     ChildAliEatoship[]|ObjectCollection findById(int $id) Return ChildAliEatoship objects filtered by the id column
 * @method     ChildAliEatoship[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliEatoship objects filtered by the sa_type column
 * @method     ChildAliEatoship[]|ObjectCollection findByUid(string $uid) Return ChildAliEatoship objects filtered by the uid column
 * @method     ChildAliEatoship[]|ObjectCollection findByLid(string $lid) Return ChildAliEatoship objects filtered by the lid column
 * @method     ChildAliEatoship[]|ObjectCollection findByDl(string $dl) Return ChildAliEatoship objects filtered by the dl column
 * @method     ChildAliEatoship[]|ObjectCollection findByCancel(int $cancel) Return ChildAliEatoship objects filtered by the cancel column
 * @method     ChildAliEatoship[]|ObjectCollection findBySend(int $send) Return ChildAliEatoship objects filtered by the send column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxtmoney(string $txtMoney) Return ChildAliEatoship objects filtered by the txtMoney column
 * @method     ChildAliEatoship[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliEatoship objects filtered by the chkCash column
 * @method     ChildAliEatoship[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliEatoship objects filtered by the chkFuture column
 * @method     ChildAliEatoship[]|ObjectCollection findByChkinternet(string $chkInternet) Return ChildAliEatoship objects filtered by the chkInternet column
 * @method     ChildAliEatoship[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliEatoship objects filtered by the chkTransfer column
 * @method     ChildAliEatoship[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliEatoship objects filtered by the chkCredit1 column
 * @method     ChildAliEatoship[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliEatoship objects filtered by the chkCredit2 column
 * @method     ChildAliEatoship[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliEatoship objects filtered by the chkCredit3 column
 * @method     ChildAliEatoship[]|ObjectCollection findByChkwithdraw(string $chkWithdraw) Return ChildAliEatoship objects filtered by the chkWithdraw column
 * @method     ChildAliEatoship[]|ObjectCollection findByChktransferIn(string $chkTransfer_in) Return ChildAliEatoship objects filtered by the chkTransfer_in column
 * @method     ChildAliEatoship[]|ObjectCollection findByChktransferOut(string $chkTransfer_out) Return ChildAliEatoship objects filtered by the chkTransfer_out column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliEatoship objects filtered by the txtCash column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliEatoship objects filtered by the txtFuture column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxtinternet(string $txtInternet) Return ChildAliEatoship objects filtered by the txtInternet column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliEatoship objects filtered by the txtTransfer column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliEatoship objects filtered by the txtCredit1 column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliEatoship objects filtered by the txtCredit2 column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliEatoship objects filtered by the txtCredit3 column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxtwithdraw(string $txtWithdraw) Return ChildAliEatoship objects filtered by the txtWithdraw column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxtdiscount(string $txtDiscount) Return ChildAliEatoship objects filtered by the txtDiscount column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxttransferIn(string $txtTransfer_in) Return ChildAliEatoship objects filtered by the txtTransfer_in column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxttransferOut(string $txtTransfer_out) Return ChildAliEatoship objects filtered by the txtTransfer_out column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxtvoucher(string $txtVoucher) Return ChildAliEatoship objects filtered by the txtVoucher column
 * @method     ChildAliEatoship[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliEatoship objects filtered by the optionCash column
 * @method     ChildAliEatoship[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliEatoship objects filtered by the optionFuture column
 * @method     ChildAliEatoship[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliEatoship objects filtered by the optionTransfer column
 * @method     ChildAliEatoship[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliEatoship objects filtered by the optionCredit1 column
 * @method     ChildAliEatoship[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliEatoship objects filtered by the optionCredit2 column
 * @method     ChildAliEatoship[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliEatoship objects filtered by the optionCredit3 column
 * @method     ChildAliEatoship[]|ObjectCollection findByOptionwithdraw(string $optionWithdraw) Return ChildAliEatoship objects filtered by the optionWithdraw column
 * @method     ChildAliEatoship[]|ObjectCollection findByOptiontransferIn(string $optionTransfer_in) Return ChildAliEatoship objects filtered by the optionTransfer_in column
 * @method     ChildAliEatoship[]|ObjectCollection findByOptiontransferOut(string $optionTransfer_out) Return ChildAliEatoship objects filtered by the optionTransfer_out column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliEatoship objects filtered by the txtoption column
 * @method     ChildAliEatoship[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliEatoship objects filtered by the ewallet column
 * @method     ChildAliEatoship[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliEatoship objects filtered by the ewallet_before column
 * @method     ChildAliEatoship[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliEatoship objects filtered by the ewallet_after column
 * @method     ChildAliEatoship[]|ObjectCollection findByIpay(string $ipay) Return ChildAliEatoship objects filtered by the ipay column
 * @method     ChildAliEatoship[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliEatoship objects filtered by the checkportal column
 * @method     ChildAliEatoship[]|ObjectCollection findByBprice(string $bprice) Return ChildAliEatoship objects filtered by the bprice column
 * @method     ChildAliEatoship[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliEatoship objects filtered by the cancel_date column
 * @method     ChildAliEatoship[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliEatoship objects filtered by the uid_cancel column
 * @method     ChildAliEatoship[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliEatoship objects filtered by the locationbase column
 * @method     ChildAliEatoship[]|ObjectCollection findByChkcommission(string $chkCommission) Return ChildAliEatoship objects filtered by the chkCommission column
 * @method     ChildAliEatoship[]|ObjectCollection findByTxtcommission(string $txtCommission) Return ChildAliEatoship objects filtered by the txtCommission column
 * @method     ChildAliEatoship[]|ObjectCollection findByOptioncommission(string $optionCommission) Return ChildAliEatoship objects filtered by the optionCommission column
 * @method     ChildAliEatoship[]|ObjectCollection findByMbase(string $mbase) Return ChildAliEatoship objects filtered by the mbase column
 * @method     ChildAliEatoship[]|ObjectCollection findByCrate(string $crate) Return ChildAliEatoship objects filtered by the crate column
 * @method     ChildAliEatoship[]|ObjectCollection findByRcode(int $rcode) Return ChildAliEatoship objects filtered by the rcode column
 * @method     ChildAliEatoship[]|ObjectCollection findByEcheck(string $echeck) Return ChildAliEatoship objects filtered by the echeck column
 * @method     ChildAliEatoship[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliEatoshipQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliEatoshipQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliEatoship', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliEatoshipQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliEatoshipQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliEatoshipQuery) {
            return $criteria;
        }
        $query = new ChildAliEatoshipQuery();
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
     * @return ChildAliEatoship|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliEatoshipTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliEatoshipTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliEatoship A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, sadate, inv_code, mcode, name_f, name_t, total, pv, usercode, remark, trnf, id, sa_type, uid, lid, dl, cancel, send, txtMoney, chkCash, chkFuture, chkInternet, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkWithdraw, chkTransfer_in, chkTransfer_out, txtCash, txtFuture, txtInternet, txtTransfer, txtCredit1, txtCredit2, txtCredit3, txtWithdraw, txtDiscount, txtTransfer_in, txtTransfer_out, txtVoucher, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionWithdraw, optionTransfer_in, optionTransfer_out, txtoption, ewallet, ewallet_before, ewallet_after, ipay, checkportal, bprice, cancel_date, uid_cancel, locationbase, chkCommission, txtCommission, optionCommission, mbase, crate, rcode, echeck FROM ali_eatoship WHERE id = :p0';
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
            /** @var ChildAliEatoship $obj */
            $obj = new ChildAliEatoship();
            $obj->hydrate($row);
            AliEatoshipTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliEatoship|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliEatoshipTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliEatoshipTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the pv column
     *
     * Example usage:
     * <code>
     * $query->filterByPv(1234); // WHERE pv = 1234
     * $query->filterByPv(array(12, 34)); // WHERE pv IN (12, 34)
     * $query->filterByPv(array('min' => 12)); // WHERE pv > 12
     * </code>
     *
     * @param     mixed $pv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trnf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_LID, $lid, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_SEND, $send, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxtmoney($txtmoney = null, $comparison = null)
    {
        if (is_array($txtmoney)) {
            $useMinMax = false;
            if (isset($txtmoney['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTMONEY, $txtmoney['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtmoney['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTMONEY, $txtmoney['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTMONEY, $txtmoney, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByChkinternet($chkinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CHKINTERNET, $chkinternet, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByChkwithdraw($chkwithdraw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkwithdraw)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CHKWITHDRAW, $chkwithdraw, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByChktransferIn($chktransferIn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransferIn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CHKTRANSFER_IN, $chktransferIn, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByChktransferOut($chktransferOut = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransferOut)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CHKTRANSFER_OUT, $chktransferOut, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (is_array($txtcash)) {
            $useMinMax = false;
            if (isset($txtcash['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCASH, $txtcash['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcash['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCASH, $txtcash['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (is_array($txtfuture)) {
            $useMinMax = false;
            if (isset($txtfuture['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTFUTURE, $txtfuture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtfuture['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTFUTURE, $txtfuture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxtinternet($txtinternet = null, $comparison = null)
    {
        if (is_array($txtinternet)) {
            $useMinMax = false;
            if (isset($txtinternet['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTINTERNET, $txtinternet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtinternet['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTINTERNET, $txtinternet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTINTERNET, $txtinternet, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (is_array($txttransfer)) {
            $useMinMax = false;
            if (isset($txttransfer['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTTRANSFER, $txttransfer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTTRANSFER, $txttransfer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (is_array($txtcredit1)) {
            $useMinMax = false;
            if (isset($txtcredit1['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCREDIT1, $txtcredit1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit1['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCREDIT1, $txtcredit1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (is_array($txtcredit2)) {
            $useMinMax = false;
            if (isset($txtcredit2['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCREDIT2, $txtcredit2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit2['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCREDIT2, $txtcredit2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (is_array($txtcredit3)) {
            $useMinMax = false;
            if (isset($txtcredit3['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCREDIT3, $txtcredit3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit3['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCREDIT3, $txtcredit3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxtwithdraw($txtwithdraw = null, $comparison = null)
    {
        if (is_array($txtwithdraw)) {
            $useMinMax = false;
            if (isset($txtwithdraw['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTWITHDRAW, $txtwithdraw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtwithdraw['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTWITHDRAW, $txtwithdraw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTWITHDRAW, $txtwithdraw, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxtdiscount($txtdiscount = null, $comparison = null)
    {
        if (is_array($txtdiscount)) {
            $useMinMax = false;
            if (isset($txtdiscount['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTDISCOUNT, $txtdiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtdiscount['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTDISCOUNT, $txtdiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTDISCOUNT, $txtdiscount, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxttransferIn($txttransferIn = null, $comparison = null)
    {
        if (is_array($txttransferIn)) {
            $useMinMax = false;
            if (isset($txttransferIn['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTTRANSFER_IN, $txttransferIn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransferIn['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTTRANSFER_IN, $txttransferIn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTTRANSFER_IN, $txttransferIn, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxttransferOut($txttransferOut = null, $comparison = null)
    {
        if (is_array($txttransferOut)) {
            $useMinMax = false;
            if (isset($txttransferOut['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTTRANSFER_OUT, $txttransferOut['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransferOut['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTTRANSFER_OUT, $txttransferOut['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTTRANSFER_OUT, $txttransferOut, $comparison);
    }

    /**
     * Filter the query on the txtVoucher column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtvoucher('fooValue');   // WHERE txtVoucher = 'fooValue'
     * $query->filterByTxtvoucher('%fooValue%', Criteria::LIKE); // WHERE txtVoucher LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtvoucher The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxtvoucher($txtvoucher = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtvoucher)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTVOUCHER, $txtvoucher, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByOptionwithdraw($optionwithdraw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionwithdraw)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_OPTIONWITHDRAW, $optionwithdraw, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByOptiontransferIn($optiontransferIn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransferIn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_OPTIONTRANSFER_IN, $optiontransferIn, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByOptiontransferOut($optiontransferOut = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransferOut)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_OPTIONTRANSFER_OUT, $optiontransferOut, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByIpay($ipay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipay)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_IPAY, $ipay, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByChkcommission($chkcommission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcommission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CHKCOMMISSION, $chkcommission, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByTxtcommission($txtcommission = null, $comparison = null)
    {
        if (is_array($txtcommission)) {
            $useMinMax = false;
            if (isset($txtcommission['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCOMMISSION, $txtcommission['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcommission['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCOMMISSION, $txtcommission['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_TXTCOMMISSION, $txtcommission, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByOptioncommission($optioncommission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncommission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_OPTIONCOMMISSION, $optioncommission, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_MBASE, $mbase, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliEatoshipTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function filterByEcheck($echeck = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($echeck)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEatoshipTableMap::COL_ECHECK, $echeck, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliEatoship $aliEatoship Object to remove from the list of results
     *
     * @return $this|ChildAliEatoshipQuery The current query, for fluid interface
     */
    public function prune($aliEatoship = null)
    {
        if ($aliEatoship) {
            $this->addUsingAlias(AliEatoshipTableMap::COL_ID, $aliEatoship->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_eatoship table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEatoshipTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliEatoshipTableMap::clearInstancePool();
            AliEatoshipTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEatoshipTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliEatoshipTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliEatoshipTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliEatoshipTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliEatoshipQuery
