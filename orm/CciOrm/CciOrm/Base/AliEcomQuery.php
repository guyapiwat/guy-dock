<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliEcom as ChildAliEcom;
use CciOrm\CciOrm\AliEcomQuery as ChildAliEcomQuery;
use CciOrm\CciOrm\Map\AliEcomTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_ecom' table.
 *
 *
 *
 * @method     ChildAliEcomQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliEcomQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliEcomQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliEcomQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliEcomQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliEcomQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliEcomQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliEcomQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliEcomQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliEcomQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliEcomQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliEcomQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliEcomQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliEcomQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliEcomQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliEcomQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliEcomQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliEcomQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliEcomQuery orderByTxtmoney($order = Criteria::ASC) Order by the txtMoney column
 * @method     ChildAliEcomQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliEcomQuery orderByChkinternet($order = Criteria::ASC) Order by the chkInternet column
 * @method     ChildAliEcomQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliEcomQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliEcomQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliEcomQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliEcomQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliEcomQuery orderByChkwithdraw($order = Criteria::ASC) Order by the chkWithdraw column
 * @method     ChildAliEcomQuery orderByChktransferIn($order = Criteria::ASC) Order by the chkTransfer_in column
 * @method     ChildAliEcomQuery orderByChktransferOut($order = Criteria::ASC) Order by the chkTransfer_out column
 * @method     ChildAliEcomQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliEcomQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliEcomQuery orderByTxtinternet($order = Criteria::ASC) Order by the txtInternet column
 * @method     ChildAliEcomQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliEcomQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliEcomQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliEcomQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliEcomQuery orderByTxtwithdraw($order = Criteria::ASC) Order by the txtWithdraw column
 * @method     ChildAliEcomQuery orderByTxttransferIn($order = Criteria::ASC) Order by the txtTransfer_in column
 * @method     ChildAliEcomQuery orderByTxttransferOut($order = Criteria::ASC) Order by the txtTransfer_out column
 * @method     ChildAliEcomQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliEcomQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliEcomQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliEcomQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliEcomQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliEcomQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliEcomQuery orderByOptionwithdraw($order = Criteria::ASC) Order by the optionWithdraw column
 * @method     ChildAliEcomQuery orderByOptiontransferIn($order = Criteria::ASC) Order by the optionTransfer_in column
 * @method     ChildAliEcomQuery orderByOptiontransferOut($order = Criteria::ASC) Order by the optionTransfer_out column
 * @method     ChildAliEcomQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliEcomQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliEcomQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliEcomQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliEcomQuery orderByIpay($order = Criteria::ASC) Order by the ipay column
 * @method     ChildAliEcomQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliEcomQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliEcomQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliEcomQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 * @method     ChildAliEcomQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliEcomQuery orderByChkcommission($order = Criteria::ASC) Order by the chkCommission column
 * @method     ChildAliEcomQuery orderByTxtcommission($order = Criteria::ASC) Order by the txtCommission column
 * @method     ChildAliEcomQuery orderByOptioncommission($order = Criteria::ASC) Order by the optionCommission column
 * @method     ChildAliEcomQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliEcomQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliEcomQuery orderByEcheck($order = Criteria::ASC) Order by the echeck column
 * @method     ChildAliEcomQuery orderBySanoTemp($order = Criteria::ASC) Order by the sano_temp column
 * @method     ChildAliEcomQuery orderBySelectcash($order = Criteria::ASC) Order by the selectCash column
 * @method     ChildAliEcomQuery orderBySelecttransfer($order = Criteria::ASC) Order by the selectTransfer column
 * @method     ChildAliEcomQuery orderBySelectcredit1($order = Criteria::ASC) Order by the selectCredit1 column
 * @method     ChildAliEcomQuery orderBySelectcredit2($order = Criteria::ASC) Order by the selectCredit2 column
 * @method     ChildAliEcomQuery orderBySelectcredit3($order = Criteria::ASC) Order by the selectCredit3 column
 * @method     ChildAliEcomQuery orderByOptioninternet($order = Criteria::ASC) Order by the optionInternet column
 * @method     ChildAliEcomQuery orderBySelectinternet($order = Criteria::ASC) Order by the selectInternet column
 * @method     ChildAliEcomQuery orderByTxttransfer1($order = Criteria::ASC) Order by the txtTransfer1 column
 * @method     ChildAliEcomQuery orderByOptiontransfer1($order = Criteria::ASC) Order by the optionTransfer1 column
 * @method     ChildAliEcomQuery orderBySelecttransfer1($order = Criteria::ASC) Order by the selectTransfer1 column
 * @method     ChildAliEcomQuery orderByTxttransfer2($order = Criteria::ASC) Order by the txtTransfer2 column
 * @method     ChildAliEcomQuery orderByOptiontransfer2($order = Criteria::ASC) Order by the optionTransfer2 column
 * @method     ChildAliEcomQuery orderBySelecttransfer2($order = Criteria::ASC) Order by the selectTransfer2 column
 * @method     ChildAliEcomQuery orderByTxttransfer3($order = Criteria::ASC) Order by the txtTransfer3 column
 * @method     ChildAliEcomQuery orderByOptiontransfer3($order = Criteria::ASC) Order by the optionTransfer3 column
 * @method     ChildAliEcomQuery orderBySelecttransfer3($order = Criteria::ASC) Order by the selectTransfer3 column
 * @method     ChildAliEcomQuery orderByImageTransfer($order = Criteria::ASC) Order by the image_transfer column
 * @method     ChildAliEcomQuery orderByTxtvoucher($order = Criteria::ASC) Order by the txtVoucher column
 *
 * @method     ChildAliEcomQuery groupBySano() Group by the sano column
 * @method     ChildAliEcomQuery groupByRcode() Group by the rcode column
 * @method     ChildAliEcomQuery groupBySadate() Group by the sadate column
 * @method     ChildAliEcomQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliEcomQuery groupByMcode() Group by the mcode column
 * @method     ChildAliEcomQuery groupByNameF() Group by the name_f column
 * @method     ChildAliEcomQuery groupByNameT() Group by the name_t column
 * @method     ChildAliEcomQuery groupByTotal() Group by the total column
 * @method     ChildAliEcomQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliEcomQuery groupByRemark() Group by the remark column
 * @method     ChildAliEcomQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliEcomQuery groupById() Group by the id column
 * @method     ChildAliEcomQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliEcomQuery groupByUid() Group by the uid column
 * @method     ChildAliEcomQuery groupByLid() Group by the lid column
 * @method     ChildAliEcomQuery groupByDl() Group by the dl column
 * @method     ChildAliEcomQuery groupByCancel() Group by the cancel column
 * @method     ChildAliEcomQuery groupBySend() Group by the send column
 * @method     ChildAliEcomQuery groupByTxtmoney() Group by the txtMoney column
 * @method     ChildAliEcomQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliEcomQuery groupByChkinternet() Group by the chkInternet column
 * @method     ChildAliEcomQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliEcomQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliEcomQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliEcomQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliEcomQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliEcomQuery groupByChkwithdraw() Group by the chkWithdraw column
 * @method     ChildAliEcomQuery groupByChktransferIn() Group by the chkTransfer_in column
 * @method     ChildAliEcomQuery groupByChktransferOut() Group by the chkTransfer_out column
 * @method     ChildAliEcomQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliEcomQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliEcomQuery groupByTxtinternet() Group by the txtInternet column
 * @method     ChildAliEcomQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliEcomQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliEcomQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliEcomQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliEcomQuery groupByTxtwithdraw() Group by the txtWithdraw column
 * @method     ChildAliEcomQuery groupByTxttransferIn() Group by the txtTransfer_in column
 * @method     ChildAliEcomQuery groupByTxttransferOut() Group by the txtTransfer_out column
 * @method     ChildAliEcomQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliEcomQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliEcomQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliEcomQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliEcomQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliEcomQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliEcomQuery groupByOptionwithdraw() Group by the optionWithdraw column
 * @method     ChildAliEcomQuery groupByOptiontransferIn() Group by the optionTransfer_in column
 * @method     ChildAliEcomQuery groupByOptiontransferOut() Group by the optionTransfer_out column
 * @method     ChildAliEcomQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliEcomQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliEcomQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliEcomQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliEcomQuery groupByIpay() Group by the ipay column
 * @method     ChildAliEcomQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliEcomQuery groupByBprice() Group by the bprice column
 * @method     ChildAliEcomQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliEcomQuery groupByUidCancel() Group by the uid_cancel column
 * @method     ChildAliEcomQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliEcomQuery groupByChkcommission() Group by the chkCommission column
 * @method     ChildAliEcomQuery groupByTxtcommission() Group by the txtCommission column
 * @method     ChildAliEcomQuery groupByOptioncommission() Group by the optionCommission column
 * @method     ChildAliEcomQuery groupByMbase() Group by the mbase column
 * @method     ChildAliEcomQuery groupByCrate() Group by the crate column
 * @method     ChildAliEcomQuery groupByEcheck() Group by the echeck column
 * @method     ChildAliEcomQuery groupBySanoTemp() Group by the sano_temp column
 * @method     ChildAliEcomQuery groupBySelectcash() Group by the selectCash column
 * @method     ChildAliEcomQuery groupBySelecttransfer() Group by the selectTransfer column
 * @method     ChildAliEcomQuery groupBySelectcredit1() Group by the selectCredit1 column
 * @method     ChildAliEcomQuery groupBySelectcredit2() Group by the selectCredit2 column
 * @method     ChildAliEcomQuery groupBySelectcredit3() Group by the selectCredit3 column
 * @method     ChildAliEcomQuery groupByOptioninternet() Group by the optionInternet column
 * @method     ChildAliEcomQuery groupBySelectinternet() Group by the selectInternet column
 * @method     ChildAliEcomQuery groupByTxttransfer1() Group by the txtTransfer1 column
 * @method     ChildAliEcomQuery groupByOptiontransfer1() Group by the optionTransfer1 column
 * @method     ChildAliEcomQuery groupBySelecttransfer1() Group by the selectTransfer1 column
 * @method     ChildAliEcomQuery groupByTxttransfer2() Group by the txtTransfer2 column
 * @method     ChildAliEcomQuery groupByOptiontransfer2() Group by the optionTransfer2 column
 * @method     ChildAliEcomQuery groupBySelecttransfer2() Group by the selectTransfer2 column
 * @method     ChildAliEcomQuery groupByTxttransfer3() Group by the txtTransfer3 column
 * @method     ChildAliEcomQuery groupByOptiontransfer3() Group by the optionTransfer3 column
 * @method     ChildAliEcomQuery groupBySelecttransfer3() Group by the selectTransfer3 column
 * @method     ChildAliEcomQuery groupByImageTransfer() Group by the image_transfer column
 * @method     ChildAliEcomQuery groupByTxtvoucher() Group by the txtVoucher column
 *
 * @method     ChildAliEcomQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliEcomQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliEcomQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliEcomQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliEcomQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliEcomQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliEcom findOne(ConnectionInterface $con = null) Return the first ChildAliEcom matching the query
 * @method     ChildAliEcom findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliEcom matching the query, or a new ChildAliEcom object populated from the query conditions when no match is found
 *
 * @method     ChildAliEcom findOneBySano(string $sano) Return the first ChildAliEcom filtered by the sano column
 * @method     ChildAliEcom findOneByRcode(int $rcode) Return the first ChildAliEcom filtered by the rcode column
 * @method     ChildAliEcom findOneBySadate(string $sadate) Return the first ChildAliEcom filtered by the sadate column
 * @method     ChildAliEcom findOneByInvCode(string $inv_code) Return the first ChildAliEcom filtered by the inv_code column
 * @method     ChildAliEcom findOneByMcode(string $mcode) Return the first ChildAliEcom filtered by the mcode column
 * @method     ChildAliEcom findOneByNameF(string $name_f) Return the first ChildAliEcom filtered by the name_f column
 * @method     ChildAliEcom findOneByNameT(string $name_t) Return the first ChildAliEcom filtered by the name_t column
 * @method     ChildAliEcom findOneByTotal(string $total) Return the first ChildAliEcom filtered by the total column
 * @method     ChildAliEcom findOneByUsercode(string $usercode) Return the first ChildAliEcom filtered by the usercode column
 * @method     ChildAliEcom findOneByRemark(string $remark) Return the first ChildAliEcom filtered by the remark column
 * @method     ChildAliEcom findOneByTrnf(string $trnf) Return the first ChildAliEcom filtered by the trnf column
 * @method     ChildAliEcom findOneById(int $id) Return the first ChildAliEcom filtered by the id column
 * @method     ChildAliEcom findOneBySaType(string $sa_type) Return the first ChildAliEcom filtered by the sa_type column
 * @method     ChildAliEcom findOneByUid(string $uid) Return the first ChildAliEcom filtered by the uid column
 * @method     ChildAliEcom findOneByLid(string $lid) Return the first ChildAliEcom filtered by the lid column
 * @method     ChildAliEcom findOneByDl(string $dl) Return the first ChildAliEcom filtered by the dl column
 * @method     ChildAliEcom findOneByCancel(int $cancel) Return the first ChildAliEcom filtered by the cancel column
 * @method     ChildAliEcom findOneBySend(int $send) Return the first ChildAliEcom filtered by the send column
 * @method     ChildAliEcom findOneByTxtmoney(string $txtMoney) Return the first ChildAliEcom filtered by the txtMoney column
 * @method     ChildAliEcom findOneByChkcash(string $chkCash) Return the first ChildAliEcom filtered by the chkCash column
 * @method     ChildAliEcom findOneByChkinternet(string $chkInternet) Return the first ChildAliEcom filtered by the chkInternet column
 * @method     ChildAliEcom findOneByChkfuture(string $chkFuture) Return the first ChildAliEcom filtered by the chkFuture column
 * @method     ChildAliEcom findOneByChktransfer(string $chkTransfer) Return the first ChildAliEcom filtered by the chkTransfer column
 * @method     ChildAliEcom findOneByChkcredit1(string $chkCredit1) Return the first ChildAliEcom filtered by the chkCredit1 column
 * @method     ChildAliEcom findOneByChkcredit2(string $chkCredit2) Return the first ChildAliEcom filtered by the chkCredit2 column
 * @method     ChildAliEcom findOneByChkcredit3(string $chkCredit3) Return the first ChildAliEcom filtered by the chkCredit3 column
 * @method     ChildAliEcom findOneByChkwithdraw(string $chkWithdraw) Return the first ChildAliEcom filtered by the chkWithdraw column
 * @method     ChildAliEcom findOneByChktransferIn(string $chkTransfer_in) Return the first ChildAliEcom filtered by the chkTransfer_in column
 * @method     ChildAliEcom findOneByChktransferOut(string $chkTransfer_out) Return the first ChildAliEcom filtered by the chkTransfer_out column
 * @method     ChildAliEcom findOneByTxtcash(string $txtCash) Return the first ChildAliEcom filtered by the txtCash column
 * @method     ChildAliEcom findOneByTxtfuture(string $txtFuture) Return the first ChildAliEcom filtered by the txtFuture column
 * @method     ChildAliEcom findOneByTxtinternet(string $txtInternet) Return the first ChildAliEcom filtered by the txtInternet column
 * @method     ChildAliEcom findOneByTxttransfer(string $txtTransfer) Return the first ChildAliEcom filtered by the txtTransfer column
 * @method     ChildAliEcom findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliEcom filtered by the txtCredit1 column
 * @method     ChildAliEcom findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliEcom filtered by the txtCredit2 column
 * @method     ChildAliEcom findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliEcom filtered by the txtCredit3 column
 * @method     ChildAliEcom findOneByTxtwithdraw(string $txtWithdraw) Return the first ChildAliEcom filtered by the txtWithdraw column
 * @method     ChildAliEcom findOneByTxttransferIn(string $txtTransfer_in) Return the first ChildAliEcom filtered by the txtTransfer_in column
 * @method     ChildAliEcom findOneByTxttransferOut(string $txtTransfer_out) Return the first ChildAliEcom filtered by the txtTransfer_out column
 * @method     ChildAliEcom findOneByOptioncash(string $optionCash) Return the first ChildAliEcom filtered by the optionCash column
 * @method     ChildAliEcom findOneByOptionfuture(string $optionFuture) Return the first ChildAliEcom filtered by the optionFuture column
 * @method     ChildAliEcom findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliEcom filtered by the optionTransfer column
 * @method     ChildAliEcom findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliEcom filtered by the optionCredit1 column
 * @method     ChildAliEcom findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliEcom filtered by the optionCredit2 column
 * @method     ChildAliEcom findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliEcom filtered by the optionCredit3 column
 * @method     ChildAliEcom findOneByOptionwithdraw(string $optionWithdraw) Return the first ChildAliEcom filtered by the optionWithdraw column
 * @method     ChildAliEcom findOneByOptiontransferIn(string $optionTransfer_in) Return the first ChildAliEcom filtered by the optionTransfer_in column
 * @method     ChildAliEcom findOneByOptiontransferOut(string $optionTransfer_out) Return the first ChildAliEcom filtered by the optionTransfer_out column
 * @method     ChildAliEcom findOneByTxtoption(string $txtoption) Return the first ChildAliEcom filtered by the txtoption column
 * @method     ChildAliEcom findOneByEwallet(string $ewallet) Return the first ChildAliEcom filtered by the ewallet column
 * @method     ChildAliEcom findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliEcom filtered by the ewallet_before column
 * @method     ChildAliEcom findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliEcom filtered by the ewallet_after column
 * @method     ChildAliEcom findOneByIpay(string $ipay) Return the first ChildAliEcom filtered by the ipay column
 * @method     ChildAliEcom findOneByCheckportal(int $checkportal) Return the first ChildAliEcom filtered by the checkportal column
 * @method     ChildAliEcom findOneByBprice(string $bprice) Return the first ChildAliEcom filtered by the bprice column
 * @method     ChildAliEcom findOneByCancelDate(string $cancel_date) Return the first ChildAliEcom filtered by the cancel_date column
 * @method     ChildAliEcom findOneByUidCancel(string $uid_cancel) Return the first ChildAliEcom filtered by the uid_cancel column
 * @method     ChildAliEcom findOneByLocationbase(int $locationbase) Return the first ChildAliEcom filtered by the locationbase column
 * @method     ChildAliEcom findOneByChkcommission(string $chkCommission) Return the first ChildAliEcom filtered by the chkCommission column
 * @method     ChildAliEcom findOneByTxtcommission(string $txtCommission) Return the first ChildAliEcom filtered by the txtCommission column
 * @method     ChildAliEcom findOneByOptioncommission(string $optionCommission) Return the first ChildAliEcom filtered by the optionCommission column
 * @method     ChildAliEcom findOneByMbase(string $mbase) Return the first ChildAliEcom filtered by the mbase column
 * @method     ChildAliEcom findOneByCrate(string $crate) Return the first ChildAliEcom filtered by the crate column
 * @method     ChildAliEcom findOneByEcheck(string $echeck) Return the first ChildAliEcom filtered by the echeck column
 * @method     ChildAliEcom findOneBySanoTemp(string $sano_temp) Return the first ChildAliEcom filtered by the sano_temp column
 * @method     ChildAliEcom findOneBySelectcash(string $selectCash) Return the first ChildAliEcom filtered by the selectCash column
 * @method     ChildAliEcom findOneBySelecttransfer(string $selectTransfer) Return the first ChildAliEcom filtered by the selectTransfer column
 * @method     ChildAliEcom findOneBySelectcredit1(string $selectCredit1) Return the first ChildAliEcom filtered by the selectCredit1 column
 * @method     ChildAliEcom findOneBySelectcredit2(string $selectCredit2) Return the first ChildAliEcom filtered by the selectCredit2 column
 * @method     ChildAliEcom findOneBySelectcredit3(string $selectCredit3) Return the first ChildAliEcom filtered by the selectCredit3 column
 * @method     ChildAliEcom findOneByOptioninternet(string $optionInternet) Return the first ChildAliEcom filtered by the optionInternet column
 * @method     ChildAliEcom findOneBySelectinternet(string $selectInternet) Return the first ChildAliEcom filtered by the selectInternet column
 * @method     ChildAliEcom findOneByTxttransfer1(string $txtTransfer1) Return the first ChildAliEcom filtered by the txtTransfer1 column
 * @method     ChildAliEcom findOneByOptiontransfer1(string $optionTransfer1) Return the first ChildAliEcom filtered by the optionTransfer1 column
 * @method     ChildAliEcom findOneBySelecttransfer1(string $selectTransfer1) Return the first ChildAliEcom filtered by the selectTransfer1 column
 * @method     ChildAliEcom findOneByTxttransfer2(string $txtTransfer2) Return the first ChildAliEcom filtered by the txtTransfer2 column
 * @method     ChildAliEcom findOneByOptiontransfer2(string $optionTransfer2) Return the first ChildAliEcom filtered by the optionTransfer2 column
 * @method     ChildAliEcom findOneBySelecttransfer2(string $selectTransfer2) Return the first ChildAliEcom filtered by the selectTransfer2 column
 * @method     ChildAliEcom findOneByTxttransfer3(string $txtTransfer3) Return the first ChildAliEcom filtered by the txtTransfer3 column
 * @method     ChildAliEcom findOneByOptiontransfer3(string $optionTransfer3) Return the first ChildAliEcom filtered by the optionTransfer3 column
 * @method     ChildAliEcom findOneBySelecttransfer3(string $selectTransfer3) Return the first ChildAliEcom filtered by the selectTransfer3 column
 * @method     ChildAliEcom findOneByImageTransfer(string $image_transfer) Return the first ChildAliEcom filtered by the image_transfer column
 * @method     ChildAliEcom findOneByTxtvoucher(string $txtVoucher) Return the first ChildAliEcom filtered by the txtVoucher column *

 * @method     ChildAliEcom requirePk($key, ConnectionInterface $con = null) Return the ChildAliEcom by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOne(ConnectionInterface $con = null) Return the first ChildAliEcom matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEcom requireOneBySano(string $sano) Return the first ChildAliEcom filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByRcode(int $rcode) Return the first ChildAliEcom filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneBySadate(string $sadate) Return the first ChildAliEcom filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByInvCode(string $inv_code) Return the first ChildAliEcom filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByMcode(string $mcode) Return the first ChildAliEcom filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByNameF(string $name_f) Return the first ChildAliEcom filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByNameT(string $name_t) Return the first ChildAliEcom filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTotal(string $total) Return the first ChildAliEcom filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByUsercode(string $usercode) Return the first ChildAliEcom filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByRemark(string $remark) Return the first ChildAliEcom filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTrnf(string $trnf) Return the first ChildAliEcom filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneById(int $id) Return the first ChildAliEcom filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneBySaType(string $sa_type) Return the first ChildAliEcom filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByUid(string $uid) Return the first ChildAliEcom filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByLid(string $lid) Return the first ChildAliEcom filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByDl(string $dl) Return the first ChildAliEcom filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByCancel(int $cancel) Return the first ChildAliEcom filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneBySend(int $send) Return the first ChildAliEcom filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxtmoney(string $txtMoney) Return the first ChildAliEcom filtered by the txtMoney column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByChkcash(string $chkCash) Return the first ChildAliEcom filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByChkinternet(string $chkInternet) Return the first ChildAliEcom filtered by the chkInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByChkfuture(string $chkFuture) Return the first ChildAliEcom filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByChktransfer(string $chkTransfer) Return the first ChildAliEcom filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliEcom filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliEcom filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliEcom filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByChkwithdraw(string $chkWithdraw) Return the first ChildAliEcom filtered by the chkWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByChktransferIn(string $chkTransfer_in) Return the first ChildAliEcom filtered by the chkTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByChktransferOut(string $chkTransfer_out) Return the first ChildAliEcom filtered by the chkTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxtcash(string $txtCash) Return the first ChildAliEcom filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxtfuture(string $txtFuture) Return the first ChildAliEcom filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxtinternet(string $txtInternet) Return the first ChildAliEcom filtered by the txtInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliEcom filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliEcom filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliEcom filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliEcom filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxtwithdraw(string $txtWithdraw) Return the first ChildAliEcom filtered by the txtWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxttransferIn(string $txtTransfer_in) Return the first ChildAliEcom filtered by the txtTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxttransferOut(string $txtTransfer_out) Return the first ChildAliEcom filtered by the txtTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptioncash(string $optionCash) Return the first ChildAliEcom filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptionfuture(string $optionFuture) Return the first ChildAliEcom filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliEcom filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliEcom filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliEcom filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliEcom filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptionwithdraw(string $optionWithdraw) Return the first ChildAliEcom filtered by the optionWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptiontransferIn(string $optionTransfer_in) Return the first ChildAliEcom filtered by the optionTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptiontransferOut(string $optionTransfer_out) Return the first ChildAliEcom filtered by the optionTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxtoption(string $txtoption) Return the first ChildAliEcom filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByEwallet(string $ewallet) Return the first ChildAliEcom filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliEcom filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliEcom filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByIpay(string $ipay) Return the first ChildAliEcom filtered by the ipay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByCheckportal(int $checkportal) Return the first ChildAliEcom filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByBprice(string $bprice) Return the first ChildAliEcom filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByCancelDate(string $cancel_date) Return the first ChildAliEcom filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByUidCancel(string $uid_cancel) Return the first ChildAliEcom filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByLocationbase(int $locationbase) Return the first ChildAliEcom filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByChkcommission(string $chkCommission) Return the first ChildAliEcom filtered by the chkCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxtcommission(string $txtCommission) Return the first ChildAliEcom filtered by the txtCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptioncommission(string $optionCommission) Return the first ChildAliEcom filtered by the optionCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByMbase(string $mbase) Return the first ChildAliEcom filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByCrate(string $crate) Return the first ChildAliEcom filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByEcheck(string $echeck) Return the first ChildAliEcom filtered by the echeck column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneBySanoTemp(string $sano_temp) Return the first ChildAliEcom filtered by the sano_temp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneBySelectcash(string $selectCash) Return the first ChildAliEcom filtered by the selectCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneBySelecttransfer(string $selectTransfer) Return the first ChildAliEcom filtered by the selectTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneBySelectcredit1(string $selectCredit1) Return the first ChildAliEcom filtered by the selectCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneBySelectcredit2(string $selectCredit2) Return the first ChildAliEcom filtered by the selectCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneBySelectcredit3(string $selectCredit3) Return the first ChildAliEcom filtered by the selectCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptioninternet(string $optionInternet) Return the first ChildAliEcom filtered by the optionInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneBySelectinternet(string $selectInternet) Return the first ChildAliEcom filtered by the selectInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxttransfer1(string $txtTransfer1) Return the first ChildAliEcom filtered by the txtTransfer1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptiontransfer1(string $optionTransfer1) Return the first ChildAliEcom filtered by the optionTransfer1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneBySelecttransfer1(string $selectTransfer1) Return the first ChildAliEcom filtered by the selectTransfer1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxttransfer2(string $txtTransfer2) Return the first ChildAliEcom filtered by the txtTransfer2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptiontransfer2(string $optionTransfer2) Return the first ChildAliEcom filtered by the optionTransfer2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneBySelecttransfer2(string $selectTransfer2) Return the first ChildAliEcom filtered by the selectTransfer2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxttransfer3(string $txtTransfer3) Return the first ChildAliEcom filtered by the txtTransfer3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByOptiontransfer3(string $optionTransfer3) Return the first ChildAliEcom filtered by the optionTransfer3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneBySelecttransfer3(string $selectTransfer3) Return the first ChildAliEcom filtered by the selectTransfer3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByImageTransfer(string $image_transfer) Return the first ChildAliEcom filtered by the image_transfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEcom requireOneByTxtvoucher(string $txtVoucher) Return the first ChildAliEcom filtered by the txtVoucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEcom[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliEcom objects based on current ModelCriteria
 * @method     ChildAliEcom[]|ObjectCollection findBySano(string $sano) Return ChildAliEcom objects filtered by the sano column
 * @method     ChildAliEcom[]|ObjectCollection findByRcode(int $rcode) Return ChildAliEcom objects filtered by the rcode column
 * @method     ChildAliEcom[]|ObjectCollection findBySadate(string $sadate) Return ChildAliEcom objects filtered by the sadate column
 * @method     ChildAliEcom[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliEcom objects filtered by the inv_code column
 * @method     ChildAliEcom[]|ObjectCollection findByMcode(string $mcode) Return ChildAliEcom objects filtered by the mcode column
 * @method     ChildAliEcom[]|ObjectCollection findByNameF(string $name_f) Return ChildAliEcom objects filtered by the name_f column
 * @method     ChildAliEcom[]|ObjectCollection findByNameT(string $name_t) Return ChildAliEcom objects filtered by the name_t column
 * @method     ChildAliEcom[]|ObjectCollection findByTotal(string $total) Return ChildAliEcom objects filtered by the total column
 * @method     ChildAliEcom[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliEcom objects filtered by the usercode column
 * @method     ChildAliEcom[]|ObjectCollection findByRemark(string $remark) Return ChildAliEcom objects filtered by the remark column
 * @method     ChildAliEcom[]|ObjectCollection findByTrnf(string $trnf) Return ChildAliEcom objects filtered by the trnf column
 * @method     ChildAliEcom[]|ObjectCollection findById(int $id) Return ChildAliEcom objects filtered by the id column
 * @method     ChildAliEcom[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliEcom objects filtered by the sa_type column
 * @method     ChildAliEcom[]|ObjectCollection findByUid(string $uid) Return ChildAliEcom objects filtered by the uid column
 * @method     ChildAliEcom[]|ObjectCollection findByLid(string $lid) Return ChildAliEcom objects filtered by the lid column
 * @method     ChildAliEcom[]|ObjectCollection findByDl(string $dl) Return ChildAliEcom objects filtered by the dl column
 * @method     ChildAliEcom[]|ObjectCollection findByCancel(int $cancel) Return ChildAliEcom objects filtered by the cancel column
 * @method     ChildAliEcom[]|ObjectCollection findBySend(int $send) Return ChildAliEcom objects filtered by the send column
 * @method     ChildAliEcom[]|ObjectCollection findByTxtmoney(string $txtMoney) Return ChildAliEcom objects filtered by the txtMoney column
 * @method     ChildAliEcom[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliEcom objects filtered by the chkCash column
 * @method     ChildAliEcom[]|ObjectCollection findByChkinternet(string $chkInternet) Return ChildAliEcom objects filtered by the chkInternet column
 * @method     ChildAliEcom[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliEcom objects filtered by the chkFuture column
 * @method     ChildAliEcom[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliEcom objects filtered by the chkTransfer column
 * @method     ChildAliEcom[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliEcom objects filtered by the chkCredit1 column
 * @method     ChildAliEcom[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliEcom objects filtered by the chkCredit2 column
 * @method     ChildAliEcom[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliEcom objects filtered by the chkCredit3 column
 * @method     ChildAliEcom[]|ObjectCollection findByChkwithdraw(string $chkWithdraw) Return ChildAliEcom objects filtered by the chkWithdraw column
 * @method     ChildAliEcom[]|ObjectCollection findByChktransferIn(string $chkTransfer_in) Return ChildAliEcom objects filtered by the chkTransfer_in column
 * @method     ChildAliEcom[]|ObjectCollection findByChktransferOut(string $chkTransfer_out) Return ChildAliEcom objects filtered by the chkTransfer_out column
 * @method     ChildAliEcom[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliEcom objects filtered by the txtCash column
 * @method     ChildAliEcom[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliEcom objects filtered by the txtFuture column
 * @method     ChildAliEcom[]|ObjectCollection findByTxtinternet(string $txtInternet) Return ChildAliEcom objects filtered by the txtInternet column
 * @method     ChildAliEcom[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliEcom objects filtered by the txtTransfer column
 * @method     ChildAliEcom[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliEcom objects filtered by the txtCredit1 column
 * @method     ChildAliEcom[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliEcom objects filtered by the txtCredit2 column
 * @method     ChildAliEcom[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliEcom objects filtered by the txtCredit3 column
 * @method     ChildAliEcom[]|ObjectCollection findByTxtwithdraw(string $txtWithdraw) Return ChildAliEcom objects filtered by the txtWithdraw column
 * @method     ChildAliEcom[]|ObjectCollection findByTxttransferIn(string $txtTransfer_in) Return ChildAliEcom objects filtered by the txtTransfer_in column
 * @method     ChildAliEcom[]|ObjectCollection findByTxttransferOut(string $txtTransfer_out) Return ChildAliEcom objects filtered by the txtTransfer_out column
 * @method     ChildAliEcom[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliEcom objects filtered by the optionCash column
 * @method     ChildAliEcom[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliEcom objects filtered by the optionFuture column
 * @method     ChildAliEcom[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliEcom objects filtered by the optionTransfer column
 * @method     ChildAliEcom[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliEcom objects filtered by the optionCredit1 column
 * @method     ChildAliEcom[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliEcom objects filtered by the optionCredit2 column
 * @method     ChildAliEcom[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliEcom objects filtered by the optionCredit3 column
 * @method     ChildAliEcom[]|ObjectCollection findByOptionwithdraw(string $optionWithdraw) Return ChildAliEcom objects filtered by the optionWithdraw column
 * @method     ChildAliEcom[]|ObjectCollection findByOptiontransferIn(string $optionTransfer_in) Return ChildAliEcom objects filtered by the optionTransfer_in column
 * @method     ChildAliEcom[]|ObjectCollection findByOptiontransferOut(string $optionTransfer_out) Return ChildAliEcom objects filtered by the optionTransfer_out column
 * @method     ChildAliEcom[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliEcom objects filtered by the txtoption column
 * @method     ChildAliEcom[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliEcom objects filtered by the ewallet column
 * @method     ChildAliEcom[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliEcom objects filtered by the ewallet_before column
 * @method     ChildAliEcom[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliEcom objects filtered by the ewallet_after column
 * @method     ChildAliEcom[]|ObjectCollection findByIpay(string $ipay) Return ChildAliEcom objects filtered by the ipay column
 * @method     ChildAliEcom[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliEcom objects filtered by the checkportal column
 * @method     ChildAliEcom[]|ObjectCollection findByBprice(string $bprice) Return ChildAliEcom objects filtered by the bprice column
 * @method     ChildAliEcom[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliEcom objects filtered by the cancel_date column
 * @method     ChildAliEcom[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliEcom objects filtered by the uid_cancel column
 * @method     ChildAliEcom[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliEcom objects filtered by the locationbase column
 * @method     ChildAliEcom[]|ObjectCollection findByChkcommission(string $chkCommission) Return ChildAliEcom objects filtered by the chkCommission column
 * @method     ChildAliEcom[]|ObjectCollection findByTxtcommission(string $txtCommission) Return ChildAliEcom objects filtered by the txtCommission column
 * @method     ChildAliEcom[]|ObjectCollection findByOptioncommission(string $optionCommission) Return ChildAliEcom objects filtered by the optionCommission column
 * @method     ChildAliEcom[]|ObjectCollection findByMbase(string $mbase) Return ChildAliEcom objects filtered by the mbase column
 * @method     ChildAliEcom[]|ObjectCollection findByCrate(string $crate) Return ChildAliEcom objects filtered by the crate column
 * @method     ChildAliEcom[]|ObjectCollection findByEcheck(string $echeck) Return ChildAliEcom objects filtered by the echeck column
 * @method     ChildAliEcom[]|ObjectCollection findBySanoTemp(string $sano_temp) Return ChildAliEcom objects filtered by the sano_temp column
 * @method     ChildAliEcom[]|ObjectCollection findBySelectcash(string $selectCash) Return ChildAliEcom objects filtered by the selectCash column
 * @method     ChildAliEcom[]|ObjectCollection findBySelecttransfer(string $selectTransfer) Return ChildAliEcom objects filtered by the selectTransfer column
 * @method     ChildAliEcom[]|ObjectCollection findBySelectcredit1(string $selectCredit1) Return ChildAliEcom objects filtered by the selectCredit1 column
 * @method     ChildAliEcom[]|ObjectCollection findBySelectcredit2(string $selectCredit2) Return ChildAliEcom objects filtered by the selectCredit2 column
 * @method     ChildAliEcom[]|ObjectCollection findBySelectcredit3(string $selectCredit3) Return ChildAliEcom objects filtered by the selectCredit3 column
 * @method     ChildAliEcom[]|ObjectCollection findByOptioninternet(string $optionInternet) Return ChildAliEcom objects filtered by the optionInternet column
 * @method     ChildAliEcom[]|ObjectCollection findBySelectinternet(string $selectInternet) Return ChildAliEcom objects filtered by the selectInternet column
 * @method     ChildAliEcom[]|ObjectCollection findByTxttransfer1(string $txtTransfer1) Return ChildAliEcom objects filtered by the txtTransfer1 column
 * @method     ChildAliEcom[]|ObjectCollection findByOptiontransfer1(string $optionTransfer1) Return ChildAliEcom objects filtered by the optionTransfer1 column
 * @method     ChildAliEcom[]|ObjectCollection findBySelecttransfer1(string $selectTransfer1) Return ChildAliEcom objects filtered by the selectTransfer1 column
 * @method     ChildAliEcom[]|ObjectCollection findByTxttransfer2(string $txtTransfer2) Return ChildAliEcom objects filtered by the txtTransfer2 column
 * @method     ChildAliEcom[]|ObjectCollection findByOptiontransfer2(string $optionTransfer2) Return ChildAliEcom objects filtered by the optionTransfer2 column
 * @method     ChildAliEcom[]|ObjectCollection findBySelecttransfer2(string $selectTransfer2) Return ChildAliEcom objects filtered by the selectTransfer2 column
 * @method     ChildAliEcom[]|ObjectCollection findByTxttransfer3(string $txtTransfer3) Return ChildAliEcom objects filtered by the txtTransfer3 column
 * @method     ChildAliEcom[]|ObjectCollection findByOptiontransfer3(string $optionTransfer3) Return ChildAliEcom objects filtered by the optionTransfer3 column
 * @method     ChildAliEcom[]|ObjectCollection findBySelecttransfer3(string $selectTransfer3) Return ChildAliEcom objects filtered by the selectTransfer3 column
 * @method     ChildAliEcom[]|ObjectCollection findByImageTransfer(string $image_transfer) Return ChildAliEcom objects filtered by the image_transfer column
 * @method     ChildAliEcom[]|ObjectCollection findByTxtvoucher(string $txtVoucher) Return ChildAliEcom objects filtered by the txtVoucher column
 * @method     ChildAliEcom[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliEcomQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliEcomQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliEcom', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliEcomQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliEcomQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliEcomQuery) {
            return $criteria;
        }
        $query = new ChildAliEcomQuery();
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
     * @return ChildAliEcom|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliEcomTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliEcomTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliEcom A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, rcode, sadate, inv_code, mcode, name_f, name_t, total, usercode, remark, trnf, id, sa_type, uid, lid, dl, cancel, send, txtMoney, chkCash, chkInternet, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkWithdraw, chkTransfer_in, chkTransfer_out, txtCash, txtFuture, txtInternet, txtTransfer, txtCredit1, txtCredit2, txtCredit3, txtWithdraw, txtTransfer_in, txtTransfer_out, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionWithdraw, optionTransfer_in, optionTransfer_out, txtoption, ewallet, ewallet_before, ewallet_after, ipay, checkportal, bprice, cancel_date, uid_cancel, locationbase, chkCommission, txtCommission, optionCommission, mbase, crate, echeck, sano_temp, selectCash, selectTransfer, selectCredit1, selectCredit2, selectCredit3, optionInternet, selectInternet, txtTransfer1, optionTransfer1, selectTransfer1, txtTransfer2, optionTransfer2, selectTransfer2, txtTransfer3, optionTransfer3, selectTransfer3, image_transfer, txtVoucher FROM ali_ecom WHERE id = :p0';
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
            /** @var ChildAliEcom $obj */
            $obj = new ChildAliEcom();
            $obj->hydrate($row);
            AliEcomTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliEcom|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliEcomTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliEcomTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trnf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_LID, $lid, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SEND, $send, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxtmoney($txtmoney = null, $comparison = null)
    {
        if (is_array($txtmoney)) {
            $useMinMax = false;
            if (isset($txtmoney['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTMONEY, $txtmoney['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtmoney['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTMONEY, $txtmoney['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTMONEY, $txtmoney, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByChkinternet($chkinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CHKINTERNET, $chkinternet, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByChkwithdraw($chkwithdraw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkwithdraw)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CHKWITHDRAW, $chkwithdraw, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByChktransferIn($chktransferIn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransferIn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CHKTRANSFER_IN, $chktransferIn, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByChktransferOut($chktransferOut = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransferOut)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CHKTRANSFER_OUT, $chktransferOut, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (is_array($txtcash)) {
            $useMinMax = false;
            if (isset($txtcash['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTCASH, $txtcash['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcash['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTCASH, $txtcash['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (is_array($txtfuture)) {
            $useMinMax = false;
            if (isset($txtfuture['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTFUTURE, $txtfuture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtfuture['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTFUTURE, $txtfuture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxtinternet($txtinternet = null, $comparison = null)
    {
        if (is_array($txtinternet)) {
            $useMinMax = false;
            if (isset($txtinternet['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTINTERNET, $txtinternet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtinternet['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTINTERNET, $txtinternet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTINTERNET, $txtinternet, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (is_array($txttransfer)) {
            $useMinMax = false;
            if (isset($txttransfer['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER, $txttransfer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER, $txttransfer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (is_array($txtcredit1)) {
            $useMinMax = false;
            if (isset($txtcredit1['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTCREDIT1, $txtcredit1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit1['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTCREDIT1, $txtcredit1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (is_array($txtcredit2)) {
            $useMinMax = false;
            if (isset($txtcredit2['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTCREDIT2, $txtcredit2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit2['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTCREDIT2, $txtcredit2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (is_array($txtcredit3)) {
            $useMinMax = false;
            if (isset($txtcredit3['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTCREDIT3, $txtcredit3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit3['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTCREDIT3, $txtcredit3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxtwithdraw($txtwithdraw = null, $comparison = null)
    {
        if (is_array($txtwithdraw)) {
            $useMinMax = false;
            if (isset($txtwithdraw['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTWITHDRAW, $txtwithdraw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtwithdraw['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTWITHDRAW, $txtwithdraw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTWITHDRAW, $txtwithdraw, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxttransferIn($txttransferIn = null, $comparison = null)
    {
        if (is_array($txttransferIn)) {
            $useMinMax = false;
            if (isset($txttransferIn['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER_IN, $txttransferIn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransferIn['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER_IN, $txttransferIn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER_IN, $txttransferIn, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxttransferOut($txttransferOut = null, $comparison = null)
    {
        if (is_array($txttransferOut)) {
            $useMinMax = false;
            if (isset($txttransferOut['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER_OUT, $txttransferOut['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransferOut['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER_OUT, $txttransferOut['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER_OUT, $txttransferOut, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptionwithdraw($optionwithdraw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionwithdraw)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONWITHDRAW, $optionwithdraw, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptiontransferIn($optiontransferIn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransferIn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONTRANSFER_IN, $optiontransferIn, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptiontransferOut($optiontransferOut = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransferOut)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONTRANSFER_OUT, $optiontransferOut, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByIpay($ipay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipay)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_IPAY, $ipay, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByChkcommission($chkcommission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcommission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CHKCOMMISSION, $chkcommission, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxtcommission($txtcommission = null, $comparison = null)
    {
        if (is_array($txtcommission)) {
            $useMinMax = false;
            if (isset($txtcommission['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTCOMMISSION, $txtcommission['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcommission['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTCOMMISSION, $txtcommission['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTCOMMISSION, $txtcommission, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptioncommission($optioncommission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncommission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONCOMMISSION, $optioncommission, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_MBASE, $mbase, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByEcheck($echeck = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($echeck)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_ECHECK, $echeck, $comparison);
    }

    /**
     * Filter the query on the sano_temp column
     *
     * Example usage:
     * <code>
     * $query->filterBySanoTemp('fooValue');   // WHERE sano_temp = 'fooValue'
     * $query->filterBySanoTemp('%fooValue%', Criteria::LIKE); // WHERE sano_temp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sanoTemp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySanoTemp($sanoTemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sanoTemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SANO_TEMP, $sanoTemp, $comparison);
    }

    /**
     * Filter the query on the selectCash column
     *
     * Example usage:
     * <code>
     * $query->filterBySelectcash('fooValue');   // WHERE selectCash = 'fooValue'
     * $query->filterBySelectcash('%fooValue%', Criteria::LIKE); // WHERE selectCash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $selectcash The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySelectcash($selectcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SELECTCASH, $selectcash, $comparison);
    }

    /**
     * Filter the query on the selectTransfer column
     *
     * Example usage:
     * <code>
     * $query->filterBySelecttransfer('fooValue');   // WHERE selectTransfer = 'fooValue'
     * $query->filterBySelecttransfer('%fooValue%', Criteria::LIKE); // WHERE selectTransfer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $selecttransfer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySelecttransfer($selecttransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selecttransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SELECTTRANSFER, $selecttransfer, $comparison);
    }

    /**
     * Filter the query on the selectCredit1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySelectcredit1('fooValue');   // WHERE selectCredit1 = 'fooValue'
     * $query->filterBySelectcredit1('%fooValue%', Criteria::LIKE); // WHERE selectCredit1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $selectcredit1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySelectcredit1($selectcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SELECTCREDIT1, $selectcredit1, $comparison);
    }

    /**
     * Filter the query on the selectCredit2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySelectcredit2('fooValue');   // WHERE selectCredit2 = 'fooValue'
     * $query->filterBySelectcredit2('%fooValue%', Criteria::LIKE); // WHERE selectCredit2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $selectcredit2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySelectcredit2($selectcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SELECTCREDIT2, $selectcredit2, $comparison);
    }

    /**
     * Filter the query on the selectCredit3 column
     *
     * Example usage:
     * <code>
     * $query->filterBySelectcredit3('fooValue');   // WHERE selectCredit3 = 'fooValue'
     * $query->filterBySelectcredit3('%fooValue%', Criteria::LIKE); // WHERE selectCredit3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $selectcredit3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySelectcredit3($selectcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SELECTCREDIT3, $selectcredit3, $comparison);
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
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptioninternet($optioninternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioninternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONINTERNET, $optioninternet, $comparison);
    }

    /**
     * Filter the query on the selectInternet column
     *
     * Example usage:
     * <code>
     * $query->filterBySelectinternet('fooValue');   // WHERE selectInternet = 'fooValue'
     * $query->filterBySelectinternet('%fooValue%', Criteria::LIKE); // WHERE selectInternet LIKE '%fooValue%'
     * </code>
     *
     * @param     string $selectinternet The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySelectinternet($selectinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SELECTINTERNET, $selectinternet, $comparison);
    }

    /**
     * Filter the query on the txtTransfer1 column
     *
     * Example usage:
     * <code>
     * $query->filterByTxttransfer1(1234); // WHERE txtTransfer1 = 1234
     * $query->filterByTxttransfer1(array(12, 34)); // WHERE txtTransfer1 IN (12, 34)
     * $query->filterByTxttransfer1(array('min' => 12)); // WHERE txtTransfer1 > 12
     * </code>
     *
     * @param     mixed $txttransfer1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxttransfer1($txttransfer1 = null, $comparison = null)
    {
        if (is_array($txttransfer1)) {
            $useMinMax = false;
            if (isset($txttransfer1['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER1, $txttransfer1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer1['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER1, $txttransfer1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER1, $txttransfer1, $comparison);
    }

    /**
     * Filter the query on the optionTransfer1 column
     *
     * Example usage:
     * <code>
     * $query->filterByOptiontransfer1('fooValue');   // WHERE optionTransfer1 = 'fooValue'
     * $query->filterByOptiontransfer1('%fooValue%', Criteria::LIKE); // WHERE optionTransfer1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optiontransfer1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer1($optiontransfer1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONTRANSFER1, $optiontransfer1, $comparison);
    }

    /**
     * Filter the query on the selectTransfer1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySelecttransfer1('fooValue');   // WHERE selectTransfer1 = 'fooValue'
     * $query->filterBySelecttransfer1('%fooValue%', Criteria::LIKE); // WHERE selectTransfer1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $selecttransfer1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySelecttransfer1($selecttransfer1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selecttransfer1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SELECTTRANSFER1, $selecttransfer1, $comparison);
    }

    /**
     * Filter the query on the txtTransfer2 column
     *
     * Example usage:
     * <code>
     * $query->filterByTxttransfer2(1234); // WHERE txtTransfer2 = 1234
     * $query->filterByTxttransfer2(array(12, 34)); // WHERE txtTransfer2 IN (12, 34)
     * $query->filterByTxttransfer2(array('min' => 12)); // WHERE txtTransfer2 > 12
     * </code>
     *
     * @param     mixed $txttransfer2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxttransfer2($txttransfer2 = null, $comparison = null)
    {
        if (is_array($txttransfer2)) {
            $useMinMax = false;
            if (isset($txttransfer2['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER2, $txttransfer2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer2['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER2, $txttransfer2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER2, $txttransfer2, $comparison);
    }

    /**
     * Filter the query on the optionTransfer2 column
     *
     * Example usage:
     * <code>
     * $query->filterByOptiontransfer2('fooValue');   // WHERE optionTransfer2 = 'fooValue'
     * $query->filterByOptiontransfer2('%fooValue%', Criteria::LIKE); // WHERE optionTransfer2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optiontransfer2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer2($optiontransfer2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONTRANSFER2, $optiontransfer2, $comparison);
    }

    /**
     * Filter the query on the selectTransfer2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySelecttransfer2('fooValue');   // WHERE selectTransfer2 = 'fooValue'
     * $query->filterBySelecttransfer2('%fooValue%', Criteria::LIKE); // WHERE selectTransfer2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $selecttransfer2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySelecttransfer2($selecttransfer2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selecttransfer2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SELECTTRANSFER2, $selecttransfer2, $comparison);
    }

    /**
     * Filter the query on the txtTransfer3 column
     *
     * Example usage:
     * <code>
     * $query->filterByTxttransfer3(1234); // WHERE txtTransfer3 = 1234
     * $query->filterByTxttransfer3(array(12, 34)); // WHERE txtTransfer3 IN (12, 34)
     * $query->filterByTxttransfer3(array('min' => 12)); // WHERE txtTransfer3 > 12
     * </code>
     *
     * @param     mixed $txttransfer3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxttransfer3($txttransfer3 = null, $comparison = null)
    {
        if (is_array($txttransfer3)) {
            $useMinMax = false;
            if (isset($txttransfer3['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER3, $txttransfer3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer3['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER3, $txttransfer3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTTRANSFER3, $txttransfer3, $comparison);
    }

    /**
     * Filter the query on the optionTransfer3 column
     *
     * Example usage:
     * <code>
     * $query->filterByOptiontransfer3('fooValue');   // WHERE optionTransfer3 = 'fooValue'
     * $query->filterByOptiontransfer3('%fooValue%', Criteria::LIKE); // WHERE optionTransfer3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optiontransfer3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer3($optiontransfer3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_OPTIONTRANSFER3, $optiontransfer3, $comparison);
    }

    /**
     * Filter the query on the selectTransfer3 column
     *
     * Example usage:
     * <code>
     * $query->filterBySelecttransfer3('fooValue');   // WHERE selectTransfer3 = 'fooValue'
     * $query->filterBySelecttransfer3('%fooValue%', Criteria::LIKE); // WHERE selectTransfer3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $selecttransfer3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterBySelecttransfer3($selecttransfer3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selecttransfer3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_SELECTTRANSFER3, $selecttransfer3, $comparison);
    }

    /**
     * Filter the query on the image_transfer column
     *
     * Example usage:
     * <code>
     * $query->filterByImageTransfer('fooValue');   // WHERE image_transfer = 'fooValue'
     * $query->filterByImageTransfer('%fooValue%', Criteria::LIKE); // WHERE image_transfer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $imageTransfer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByImageTransfer($imageTransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imageTransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_IMAGE_TRANSFER, $imageTransfer, $comparison);
    }

    /**
     * Filter the query on the txtVoucher column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtvoucher(1234); // WHERE txtVoucher = 1234
     * $query->filterByTxtvoucher(array(12, 34)); // WHERE txtVoucher IN (12, 34)
     * $query->filterByTxtvoucher(array('min' => 12)); // WHERE txtVoucher > 12
     * </code>
     *
     * @param     mixed $txtvoucher The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function filterByTxtvoucher($txtvoucher = null, $comparison = null)
    {
        if (is_array($txtvoucher)) {
            $useMinMax = false;
            if (isset($txtvoucher['min'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTVOUCHER, $txtvoucher['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtvoucher['max'])) {
                $this->addUsingAlias(AliEcomTableMap::COL_TXTVOUCHER, $txtvoucher['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcomTableMap::COL_TXTVOUCHER, $txtvoucher, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliEcom $aliEcom Object to remove from the list of results
     *
     * @return $this|ChildAliEcomQuery The current query, for fluid interface
     */
    public function prune($aliEcom = null)
    {
        if ($aliEcom) {
            $this->addUsingAlias(AliEcomTableMap::COL_ID, $aliEcom->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_ecom table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEcomTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliEcomTableMap::clearInstancePool();
            AliEcomTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEcomTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliEcomTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliEcomTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliEcomTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliEcomQuery
