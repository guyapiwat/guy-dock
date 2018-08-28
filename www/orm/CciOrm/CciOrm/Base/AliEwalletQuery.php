<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliEwallet as ChildAliEwallet;
use CciOrm\CciOrm\AliEwalletQuery as ChildAliEwalletQuery;
use CciOrm\CciOrm\Map\AliEwalletTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_ewallet' table.
 *
 *
 *
 * @method     ChildAliEwalletQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliEwalletQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliEwalletQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliEwalletQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliEwalletQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliEwalletQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliEwalletQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliEwalletQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliEwalletQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliEwalletQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliEwalletQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliEwalletQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliEwalletQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliEwalletQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliEwalletQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliEwalletQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliEwalletQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliEwalletQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliEwalletQuery orderByTxtmoney($order = Criteria::ASC) Order by the txtMoney column
 * @method     ChildAliEwalletQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliEwalletQuery orderByChkinternet($order = Criteria::ASC) Order by the chkInternet column
 * @method     ChildAliEwalletQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliEwalletQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliEwalletQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliEwalletQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliEwalletQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliEwalletQuery orderByChkwithdraw($order = Criteria::ASC) Order by the chkWithdraw column
 * @method     ChildAliEwalletQuery orderByTxtdiscount($order = Criteria::ASC) Order by the txtDiscount column
 * @method     ChildAliEwalletQuery orderByChktransferIn($order = Criteria::ASC) Order by the chkTransfer_in column
 * @method     ChildAliEwalletQuery orderByChktransferOut($order = Criteria::ASC) Order by the chkTransfer_out column
 * @method     ChildAliEwalletQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliEwalletQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliEwalletQuery orderByTxtinternet($order = Criteria::ASC) Order by the txtInternet column
 * @method     ChildAliEwalletQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliEwalletQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliEwalletQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliEwalletQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliEwalletQuery orderByTxtwithdraw($order = Criteria::ASC) Order by the txtWithdraw column
 * @method     ChildAliEwalletQuery orderByTxttransferIn($order = Criteria::ASC) Order by the txtTransfer_in column
 * @method     ChildAliEwalletQuery orderByTxttransferOut($order = Criteria::ASC) Order by the txtTransfer_out column
 * @method     ChildAliEwalletQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliEwalletQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliEwalletQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliEwalletQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliEwalletQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliEwalletQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliEwalletQuery orderByOptionwithdraw($order = Criteria::ASC) Order by the optionWithdraw column
 * @method     ChildAliEwalletQuery orderByOptiontransferIn($order = Criteria::ASC) Order by the optionTransfer_in column
 * @method     ChildAliEwalletQuery orderByOptiontransferOut($order = Criteria::ASC) Order by the optionTransfer_out column
 * @method     ChildAliEwalletQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliEwalletQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliEwalletQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliEwalletQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliEwalletQuery orderByIpay($order = Criteria::ASC) Order by the ipay column
 * @method     ChildAliEwalletQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliEwalletQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliEwalletQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliEwalletQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 * @method     ChildAliEwalletQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliEwalletQuery orderByChkcommission($order = Criteria::ASC) Order by the chkCommission column
 * @method     ChildAliEwalletQuery orderByTxtcommission($order = Criteria::ASC) Order by the txtCommission column
 * @method     ChildAliEwalletQuery orderByOptioncommission($order = Criteria::ASC) Order by the optionCommission column
 * @method     ChildAliEwalletQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliEwalletQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliEwalletQuery orderByEcheck($order = Criteria::ASC) Order by the echeck column
 * @method     ChildAliEwalletQuery orderBySanoTemp($order = Criteria::ASC) Order by the sano_temp column
 * @method     ChildAliEwalletQuery orderBySelectcash($order = Criteria::ASC) Order by the selectCash column
 * @method     ChildAliEwalletQuery orderBySelecttransfer($order = Criteria::ASC) Order by the selectTransfer column
 * @method     ChildAliEwalletQuery orderBySelectcredit1($order = Criteria::ASC) Order by the selectCredit1 column
 * @method     ChildAliEwalletQuery orderBySelectcredit2($order = Criteria::ASC) Order by the selectCredit2 column
 * @method     ChildAliEwalletQuery orderBySelectcredit3($order = Criteria::ASC) Order by the selectCredit3 column
 * @method     ChildAliEwalletQuery orderByOptioninternet($order = Criteria::ASC) Order by the optionInternet column
 * @method     ChildAliEwalletQuery orderBySelectinternet($order = Criteria::ASC) Order by the selectInternet column
 * @method     ChildAliEwalletQuery orderByTxttransfer1($order = Criteria::ASC) Order by the txtTransfer1 column
 * @method     ChildAliEwalletQuery orderByOptiontransfer1($order = Criteria::ASC) Order by the optionTransfer1 column
 * @method     ChildAliEwalletQuery orderBySelecttransfer1($order = Criteria::ASC) Order by the selectTransfer1 column
 * @method     ChildAliEwalletQuery orderByTxttransfer2($order = Criteria::ASC) Order by the txtTransfer2 column
 * @method     ChildAliEwalletQuery orderByOptiontransfer2($order = Criteria::ASC) Order by the optionTransfer2 column
 * @method     ChildAliEwalletQuery orderBySelecttransfer2($order = Criteria::ASC) Order by the selectTransfer2 column
 * @method     ChildAliEwalletQuery orderByTxttransfer3($order = Criteria::ASC) Order by the txtTransfer3 column
 * @method     ChildAliEwalletQuery orderByOptiontransfer3($order = Criteria::ASC) Order by the optionTransfer3 column
 * @method     ChildAliEwalletQuery orderBySelecttransfer3($order = Criteria::ASC) Order by the selectTransfer3 column
 * @method     ChildAliEwalletQuery orderByImageTransfer($order = Criteria::ASC) Order by the image_transfer column
 * @method     ChildAliEwalletQuery orderByTxtvoucher($order = Criteria::ASC) Order by the txtVoucher column
 * @method     ChildAliEwalletQuery orderByIdEcom($order = Criteria::ASC) Order by the id_ecom column
 * @method     ChildAliEwalletQuery orderByCals($order = Criteria::ASC) Order by the cals column
 *
 * @method     ChildAliEwalletQuery groupBySano() Group by the sano column
 * @method     ChildAliEwalletQuery groupByRcode() Group by the rcode column
 * @method     ChildAliEwalletQuery groupBySadate() Group by the sadate column
 * @method     ChildAliEwalletQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliEwalletQuery groupByMcode() Group by the mcode column
 * @method     ChildAliEwalletQuery groupByNameF() Group by the name_f column
 * @method     ChildAliEwalletQuery groupByNameT() Group by the name_t column
 * @method     ChildAliEwalletQuery groupByTotal() Group by the total column
 * @method     ChildAliEwalletQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliEwalletQuery groupByRemark() Group by the remark column
 * @method     ChildAliEwalletQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliEwalletQuery groupById() Group by the id column
 * @method     ChildAliEwalletQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliEwalletQuery groupByUid() Group by the uid column
 * @method     ChildAliEwalletQuery groupByLid() Group by the lid column
 * @method     ChildAliEwalletQuery groupByDl() Group by the dl column
 * @method     ChildAliEwalletQuery groupByCancel() Group by the cancel column
 * @method     ChildAliEwalletQuery groupBySend() Group by the send column
 * @method     ChildAliEwalletQuery groupByTxtmoney() Group by the txtMoney column
 * @method     ChildAliEwalletQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliEwalletQuery groupByChkinternet() Group by the chkInternet column
 * @method     ChildAliEwalletQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliEwalletQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliEwalletQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliEwalletQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliEwalletQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliEwalletQuery groupByChkwithdraw() Group by the chkWithdraw column
 * @method     ChildAliEwalletQuery groupByTxtdiscount() Group by the txtDiscount column
 * @method     ChildAliEwalletQuery groupByChktransferIn() Group by the chkTransfer_in column
 * @method     ChildAliEwalletQuery groupByChktransferOut() Group by the chkTransfer_out column
 * @method     ChildAliEwalletQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliEwalletQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliEwalletQuery groupByTxtinternet() Group by the txtInternet column
 * @method     ChildAliEwalletQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliEwalletQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliEwalletQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliEwalletQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliEwalletQuery groupByTxtwithdraw() Group by the txtWithdraw column
 * @method     ChildAliEwalletQuery groupByTxttransferIn() Group by the txtTransfer_in column
 * @method     ChildAliEwalletQuery groupByTxttransferOut() Group by the txtTransfer_out column
 * @method     ChildAliEwalletQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliEwalletQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliEwalletQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliEwalletQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliEwalletQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliEwalletQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliEwalletQuery groupByOptionwithdraw() Group by the optionWithdraw column
 * @method     ChildAliEwalletQuery groupByOptiontransferIn() Group by the optionTransfer_in column
 * @method     ChildAliEwalletQuery groupByOptiontransferOut() Group by the optionTransfer_out column
 * @method     ChildAliEwalletQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliEwalletQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliEwalletQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliEwalletQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliEwalletQuery groupByIpay() Group by the ipay column
 * @method     ChildAliEwalletQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliEwalletQuery groupByBprice() Group by the bprice column
 * @method     ChildAliEwalletQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliEwalletQuery groupByUidCancel() Group by the uid_cancel column
 * @method     ChildAliEwalletQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliEwalletQuery groupByChkcommission() Group by the chkCommission column
 * @method     ChildAliEwalletQuery groupByTxtcommission() Group by the txtCommission column
 * @method     ChildAliEwalletQuery groupByOptioncommission() Group by the optionCommission column
 * @method     ChildAliEwalletQuery groupByMbase() Group by the mbase column
 * @method     ChildAliEwalletQuery groupByCrate() Group by the crate column
 * @method     ChildAliEwalletQuery groupByEcheck() Group by the echeck column
 * @method     ChildAliEwalletQuery groupBySanoTemp() Group by the sano_temp column
 * @method     ChildAliEwalletQuery groupBySelectcash() Group by the selectCash column
 * @method     ChildAliEwalletQuery groupBySelecttransfer() Group by the selectTransfer column
 * @method     ChildAliEwalletQuery groupBySelectcredit1() Group by the selectCredit1 column
 * @method     ChildAliEwalletQuery groupBySelectcredit2() Group by the selectCredit2 column
 * @method     ChildAliEwalletQuery groupBySelectcredit3() Group by the selectCredit3 column
 * @method     ChildAliEwalletQuery groupByOptioninternet() Group by the optionInternet column
 * @method     ChildAliEwalletQuery groupBySelectinternet() Group by the selectInternet column
 * @method     ChildAliEwalletQuery groupByTxttransfer1() Group by the txtTransfer1 column
 * @method     ChildAliEwalletQuery groupByOptiontransfer1() Group by the optionTransfer1 column
 * @method     ChildAliEwalletQuery groupBySelecttransfer1() Group by the selectTransfer1 column
 * @method     ChildAliEwalletQuery groupByTxttransfer2() Group by the txtTransfer2 column
 * @method     ChildAliEwalletQuery groupByOptiontransfer2() Group by the optionTransfer2 column
 * @method     ChildAliEwalletQuery groupBySelecttransfer2() Group by the selectTransfer2 column
 * @method     ChildAliEwalletQuery groupByTxttransfer3() Group by the txtTransfer3 column
 * @method     ChildAliEwalletQuery groupByOptiontransfer3() Group by the optionTransfer3 column
 * @method     ChildAliEwalletQuery groupBySelecttransfer3() Group by the selectTransfer3 column
 * @method     ChildAliEwalletQuery groupByImageTransfer() Group by the image_transfer column
 * @method     ChildAliEwalletQuery groupByTxtvoucher() Group by the txtVoucher column
 * @method     ChildAliEwalletQuery groupByIdEcom() Group by the id_ecom column
 * @method     ChildAliEwalletQuery groupByCals() Group by the cals column
 *
 * @method     ChildAliEwalletQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliEwalletQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliEwalletQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliEwalletQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliEwalletQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliEwalletQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliEwallet findOne(ConnectionInterface $con = null) Return the first ChildAliEwallet matching the query
 * @method     ChildAliEwallet findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliEwallet matching the query, or a new ChildAliEwallet object populated from the query conditions when no match is found
 *
 * @method     ChildAliEwallet findOneBySano(string $sano) Return the first ChildAliEwallet filtered by the sano column
 * @method     ChildAliEwallet findOneByRcode(int $rcode) Return the first ChildAliEwallet filtered by the rcode column
 * @method     ChildAliEwallet findOneBySadate(string $sadate) Return the first ChildAliEwallet filtered by the sadate column
 * @method     ChildAliEwallet findOneByInvCode(string $inv_code) Return the first ChildAliEwallet filtered by the inv_code column
 * @method     ChildAliEwallet findOneByMcode(string $mcode) Return the first ChildAliEwallet filtered by the mcode column
 * @method     ChildAliEwallet findOneByNameF(string $name_f) Return the first ChildAliEwallet filtered by the name_f column
 * @method     ChildAliEwallet findOneByNameT(string $name_t) Return the first ChildAliEwallet filtered by the name_t column
 * @method     ChildAliEwallet findOneByTotal(string $total) Return the first ChildAliEwallet filtered by the total column
 * @method     ChildAliEwallet findOneByUsercode(string $usercode) Return the first ChildAliEwallet filtered by the usercode column
 * @method     ChildAliEwallet findOneByRemark(string $remark) Return the first ChildAliEwallet filtered by the remark column
 * @method     ChildAliEwallet findOneByTrnf(string $trnf) Return the first ChildAliEwallet filtered by the trnf column
 * @method     ChildAliEwallet findOneById(int $id) Return the first ChildAliEwallet filtered by the id column
 * @method     ChildAliEwallet findOneBySaType(string $sa_type) Return the first ChildAliEwallet filtered by the sa_type column
 * @method     ChildAliEwallet findOneByUid(string $uid) Return the first ChildAliEwallet filtered by the uid column
 * @method     ChildAliEwallet findOneByLid(string $lid) Return the first ChildAliEwallet filtered by the lid column
 * @method     ChildAliEwallet findOneByDl(string $dl) Return the first ChildAliEwallet filtered by the dl column
 * @method     ChildAliEwallet findOneByCancel(int $cancel) Return the first ChildAliEwallet filtered by the cancel column
 * @method     ChildAliEwallet findOneBySend(int $send) Return the first ChildAliEwallet filtered by the send column
 * @method     ChildAliEwallet findOneByTxtmoney(string $txtMoney) Return the first ChildAliEwallet filtered by the txtMoney column
 * @method     ChildAliEwallet findOneByChkcash(string $chkCash) Return the first ChildAliEwallet filtered by the chkCash column
 * @method     ChildAliEwallet findOneByChkinternet(string $chkInternet) Return the first ChildAliEwallet filtered by the chkInternet column
 * @method     ChildAliEwallet findOneByChkfuture(string $chkFuture) Return the first ChildAliEwallet filtered by the chkFuture column
 * @method     ChildAliEwallet findOneByChktransfer(string $chkTransfer) Return the first ChildAliEwallet filtered by the chkTransfer column
 * @method     ChildAliEwallet findOneByChkcredit1(string $chkCredit1) Return the first ChildAliEwallet filtered by the chkCredit1 column
 * @method     ChildAliEwallet findOneByChkcredit2(string $chkCredit2) Return the first ChildAliEwallet filtered by the chkCredit2 column
 * @method     ChildAliEwallet findOneByChkcredit3(string $chkCredit3) Return the first ChildAliEwallet filtered by the chkCredit3 column
 * @method     ChildAliEwallet findOneByChkwithdraw(string $chkWithdraw) Return the first ChildAliEwallet filtered by the chkWithdraw column
 * @method     ChildAliEwallet findOneByTxtdiscount(string $txtDiscount) Return the first ChildAliEwallet filtered by the txtDiscount column
 * @method     ChildAliEwallet findOneByChktransferIn(string $chkTransfer_in) Return the first ChildAliEwallet filtered by the chkTransfer_in column
 * @method     ChildAliEwallet findOneByChktransferOut(string $chkTransfer_out) Return the first ChildAliEwallet filtered by the chkTransfer_out column
 * @method     ChildAliEwallet findOneByTxtcash(string $txtCash) Return the first ChildAliEwallet filtered by the txtCash column
 * @method     ChildAliEwallet findOneByTxtfuture(string $txtFuture) Return the first ChildAliEwallet filtered by the txtFuture column
 * @method     ChildAliEwallet findOneByTxtinternet(string $txtInternet) Return the first ChildAliEwallet filtered by the txtInternet column
 * @method     ChildAliEwallet findOneByTxttransfer(string $txtTransfer) Return the first ChildAliEwallet filtered by the txtTransfer column
 * @method     ChildAliEwallet findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliEwallet filtered by the txtCredit1 column
 * @method     ChildAliEwallet findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliEwallet filtered by the txtCredit2 column
 * @method     ChildAliEwallet findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliEwallet filtered by the txtCredit3 column
 * @method     ChildAliEwallet findOneByTxtwithdraw(string $txtWithdraw) Return the first ChildAliEwallet filtered by the txtWithdraw column
 * @method     ChildAliEwallet findOneByTxttransferIn(string $txtTransfer_in) Return the first ChildAliEwallet filtered by the txtTransfer_in column
 * @method     ChildAliEwallet findOneByTxttransferOut(string $txtTransfer_out) Return the first ChildAliEwallet filtered by the txtTransfer_out column
 * @method     ChildAliEwallet findOneByOptioncash(string $optionCash) Return the first ChildAliEwallet filtered by the optionCash column
 * @method     ChildAliEwallet findOneByOptionfuture(string $optionFuture) Return the first ChildAliEwallet filtered by the optionFuture column
 * @method     ChildAliEwallet findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliEwallet filtered by the optionTransfer column
 * @method     ChildAliEwallet findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliEwallet filtered by the optionCredit1 column
 * @method     ChildAliEwallet findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliEwallet filtered by the optionCredit2 column
 * @method     ChildAliEwallet findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliEwallet filtered by the optionCredit3 column
 * @method     ChildAliEwallet findOneByOptionwithdraw(string $optionWithdraw) Return the first ChildAliEwallet filtered by the optionWithdraw column
 * @method     ChildAliEwallet findOneByOptiontransferIn(string $optionTransfer_in) Return the first ChildAliEwallet filtered by the optionTransfer_in column
 * @method     ChildAliEwallet findOneByOptiontransferOut(string $optionTransfer_out) Return the first ChildAliEwallet filtered by the optionTransfer_out column
 * @method     ChildAliEwallet findOneByTxtoption(string $txtoption) Return the first ChildAliEwallet filtered by the txtoption column
 * @method     ChildAliEwallet findOneByEwallet(string $ewallet) Return the first ChildAliEwallet filtered by the ewallet column
 * @method     ChildAliEwallet findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliEwallet filtered by the ewallet_before column
 * @method     ChildAliEwallet findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliEwallet filtered by the ewallet_after column
 * @method     ChildAliEwallet findOneByIpay(string $ipay) Return the first ChildAliEwallet filtered by the ipay column
 * @method     ChildAliEwallet findOneByCheckportal(int $checkportal) Return the first ChildAliEwallet filtered by the checkportal column
 * @method     ChildAliEwallet findOneByBprice(string $bprice) Return the first ChildAliEwallet filtered by the bprice column
 * @method     ChildAliEwallet findOneByCancelDate(string $cancel_date) Return the first ChildAliEwallet filtered by the cancel_date column
 * @method     ChildAliEwallet findOneByUidCancel(string $uid_cancel) Return the first ChildAliEwallet filtered by the uid_cancel column
 * @method     ChildAliEwallet findOneByLocationbase(int $locationbase) Return the first ChildAliEwallet filtered by the locationbase column
 * @method     ChildAliEwallet findOneByChkcommission(string $chkCommission) Return the first ChildAliEwallet filtered by the chkCommission column
 * @method     ChildAliEwallet findOneByTxtcommission(string $txtCommission) Return the first ChildAliEwallet filtered by the txtCommission column
 * @method     ChildAliEwallet findOneByOptioncommission(string $optionCommission) Return the first ChildAliEwallet filtered by the optionCommission column
 * @method     ChildAliEwallet findOneByMbase(string $mbase) Return the first ChildAliEwallet filtered by the mbase column
 * @method     ChildAliEwallet findOneByCrate(string $crate) Return the first ChildAliEwallet filtered by the crate column
 * @method     ChildAliEwallet findOneByEcheck(string $echeck) Return the first ChildAliEwallet filtered by the echeck column
 * @method     ChildAliEwallet findOneBySanoTemp(string $sano_temp) Return the first ChildAliEwallet filtered by the sano_temp column
 * @method     ChildAliEwallet findOneBySelectcash(string $selectCash) Return the first ChildAliEwallet filtered by the selectCash column
 * @method     ChildAliEwallet findOneBySelecttransfer(string $selectTransfer) Return the first ChildAliEwallet filtered by the selectTransfer column
 * @method     ChildAliEwallet findOneBySelectcredit1(string $selectCredit1) Return the first ChildAliEwallet filtered by the selectCredit1 column
 * @method     ChildAliEwallet findOneBySelectcredit2(string $selectCredit2) Return the first ChildAliEwallet filtered by the selectCredit2 column
 * @method     ChildAliEwallet findOneBySelectcredit3(string $selectCredit3) Return the first ChildAliEwallet filtered by the selectCredit3 column
 * @method     ChildAliEwallet findOneByOptioninternet(string $optionInternet) Return the first ChildAliEwallet filtered by the optionInternet column
 * @method     ChildAliEwallet findOneBySelectinternet(string $selectInternet) Return the first ChildAliEwallet filtered by the selectInternet column
 * @method     ChildAliEwallet findOneByTxttransfer1(string $txtTransfer1) Return the first ChildAliEwallet filtered by the txtTransfer1 column
 * @method     ChildAliEwallet findOneByOptiontransfer1(string $optionTransfer1) Return the first ChildAliEwallet filtered by the optionTransfer1 column
 * @method     ChildAliEwallet findOneBySelecttransfer1(string $selectTransfer1) Return the first ChildAliEwallet filtered by the selectTransfer1 column
 * @method     ChildAliEwallet findOneByTxttransfer2(string $txtTransfer2) Return the first ChildAliEwallet filtered by the txtTransfer2 column
 * @method     ChildAliEwallet findOneByOptiontransfer2(string $optionTransfer2) Return the first ChildAliEwallet filtered by the optionTransfer2 column
 * @method     ChildAliEwallet findOneBySelecttransfer2(string $selectTransfer2) Return the first ChildAliEwallet filtered by the selectTransfer2 column
 * @method     ChildAliEwallet findOneByTxttransfer3(string $txtTransfer3) Return the first ChildAliEwallet filtered by the txtTransfer3 column
 * @method     ChildAliEwallet findOneByOptiontransfer3(string $optionTransfer3) Return the first ChildAliEwallet filtered by the optionTransfer3 column
 * @method     ChildAliEwallet findOneBySelecttransfer3(string $selectTransfer3) Return the first ChildAliEwallet filtered by the selectTransfer3 column
 * @method     ChildAliEwallet findOneByImageTransfer(string $image_transfer) Return the first ChildAliEwallet filtered by the image_transfer column
 * @method     ChildAliEwallet findOneByTxtvoucher(string $txtVoucher) Return the first ChildAliEwallet filtered by the txtVoucher column
 * @method     ChildAliEwallet findOneByIdEcom(string $id_ecom) Return the first ChildAliEwallet filtered by the id_ecom column
 * @method     ChildAliEwallet findOneByCals(string $cals) Return the first ChildAliEwallet filtered by the cals column *

 * @method     ChildAliEwallet requirePk($key, ConnectionInterface $con = null) Return the ChildAliEwallet by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOne(ConnectionInterface $con = null) Return the first ChildAliEwallet matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEwallet requireOneBySano(string $sano) Return the first ChildAliEwallet filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByRcode(int $rcode) Return the first ChildAliEwallet filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneBySadate(string $sadate) Return the first ChildAliEwallet filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByInvCode(string $inv_code) Return the first ChildAliEwallet filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByMcode(string $mcode) Return the first ChildAliEwallet filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByNameF(string $name_f) Return the first ChildAliEwallet filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByNameT(string $name_t) Return the first ChildAliEwallet filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTotal(string $total) Return the first ChildAliEwallet filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByUsercode(string $usercode) Return the first ChildAliEwallet filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByRemark(string $remark) Return the first ChildAliEwallet filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTrnf(string $trnf) Return the first ChildAliEwallet filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneById(int $id) Return the first ChildAliEwallet filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneBySaType(string $sa_type) Return the first ChildAliEwallet filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByUid(string $uid) Return the first ChildAliEwallet filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByLid(string $lid) Return the first ChildAliEwallet filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByDl(string $dl) Return the first ChildAliEwallet filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByCancel(int $cancel) Return the first ChildAliEwallet filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneBySend(int $send) Return the first ChildAliEwallet filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxtmoney(string $txtMoney) Return the first ChildAliEwallet filtered by the txtMoney column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByChkcash(string $chkCash) Return the first ChildAliEwallet filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByChkinternet(string $chkInternet) Return the first ChildAliEwallet filtered by the chkInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByChkfuture(string $chkFuture) Return the first ChildAliEwallet filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByChktransfer(string $chkTransfer) Return the first ChildAliEwallet filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliEwallet filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliEwallet filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliEwallet filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByChkwithdraw(string $chkWithdraw) Return the first ChildAliEwallet filtered by the chkWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxtdiscount(string $txtDiscount) Return the first ChildAliEwallet filtered by the txtDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByChktransferIn(string $chkTransfer_in) Return the first ChildAliEwallet filtered by the chkTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByChktransferOut(string $chkTransfer_out) Return the first ChildAliEwallet filtered by the chkTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxtcash(string $txtCash) Return the first ChildAliEwallet filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxtfuture(string $txtFuture) Return the first ChildAliEwallet filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxtinternet(string $txtInternet) Return the first ChildAliEwallet filtered by the txtInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliEwallet filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliEwallet filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliEwallet filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliEwallet filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxtwithdraw(string $txtWithdraw) Return the first ChildAliEwallet filtered by the txtWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxttransferIn(string $txtTransfer_in) Return the first ChildAliEwallet filtered by the txtTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxttransferOut(string $txtTransfer_out) Return the first ChildAliEwallet filtered by the txtTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptioncash(string $optionCash) Return the first ChildAliEwallet filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptionfuture(string $optionFuture) Return the first ChildAliEwallet filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliEwallet filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliEwallet filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliEwallet filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliEwallet filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptionwithdraw(string $optionWithdraw) Return the first ChildAliEwallet filtered by the optionWithdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptiontransferIn(string $optionTransfer_in) Return the first ChildAliEwallet filtered by the optionTransfer_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptiontransferOut(string $optionTransfer_out) Return the first ChildAliEwallet filtered by the optionTransfer_out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxtoption(string $txtoption) Return the first ChildAliEwallet filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByEwallet(string $ewallet) Return the first ChildAliEwallet filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliEwallet filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliEwallet filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByIpay(string $ipay) Return the first ChildAliEwallet filtered by the ipay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByCheckportal(int $checkportal) Return the first ChildAliEwallet filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByBprice(string $bprice) Return the first ChildAliEwallet filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByCancelDate(string $cancel_date) Return the first ChildAliEwallet filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByUidCancel(string $uid_cancel) Return the first ChildAliEwallet filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByLocationbase(int $locationbase) Return the first ChildAliEwallet filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByChkcommission(string $chkCommission) Return the first ChildAliEwallet filtered by the chkCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxtcommission(string $txtCommission) Return the first ChildAliEwallet filtered by the txtCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptioncommission(string $optionCommission) Return the first ChildAliEwallet filtered by the optionCommission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByMbase(string $mbase) Return the first ChildAliEwallet filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByCrate(string $crate) Return the first ChildAliEwallet filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByEcheck(string $echeck) Return the first ChildAliEwallet filtered by the echeck column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneBySanoTemp(string $sano_temp) Return the first ChildAliEwallet filtered by the sano_temp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneBySelectcash(string $selectCash) Return the first ChildAliEwallet filtered by the selectCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneBySelecttransfer(string $selectTransfer) Return the first ChildAliEwallet filtered by the selectTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneBySelectcredit1(string $selectCredit1) Return the first ChildAliEwallet filtered by the selectCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneBySelectcredit2(string $selectCredit2) Return the first ChildAliEwallet filtered by the selectCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneBySelectcredit3(string $selectCredit3) Return the first ChildAliEwallet filtered by the selectCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptioninternet(string $optionInternet) Return the first ChildAliEwallet filtered by the optionInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneBySelectinternet(string $selectInternet) Return the first ChildAliEwallet filtered by the selectInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxttransfer1(string $txtTransfer1) Return the first ChildAliEwallet filtered by the txtTransfer1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptiontransfer1(string $optionTransfer1) Return the first ChildAliEwallet filtered by the optionTransfer1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneBySelecttransfer1(string $selectTransfer1) Return the first ChildAliEwallet filtered by the selectTransfer1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxttransfer2(string $txtTransfer2) Return the first ChildAliEwallet filtered by the txtTransfer2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptiontransfer2(string $optionTransfer2) Return the first ChildAliEwallet filtered by the optionTransfer2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneBySelecttransfer2(string $selectTransfer2) Return the first ChildAliEwallet filtered by the selectTransfer2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxttransfer3(string $txtTransfer3) Return the first ChildAliEwallet filtered by the txtTransfer3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByOptiontransfer3(string $optionTransfer3) Return the first ChildAliEwallet filtered by the optionTransfer3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneBySelecttransfer3(string $selectTransfer3) Return the first ChildAliEwallet filtered by the selectTransfer3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByImageTransfer(string $image_transfer) Return the first ChildAliEwallet filtered by the image_transfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByTxtvoucher(string $txtVoucher) Return the first ChildAliEwallet filtered by the txtVoucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByIdEcom(string $id_ecom) Return the first ChildAliEwallet filtered by the id_ecom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEwallet requireOneByCals(string $cals) Return the first ChildAliEwallet filtered by the cals column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEwallet[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliEwallet objects based on current ModelCriteria
 * @method     ChildAliEwallet[]|ObjectCollection findBySano(string $sano) Return ChildAliEwallet objects filtered by the sano column
 * @method     ChildAliEwallet[]|ObjectCollection findByRcode(int $rcode) Return ChildAliEwallet objects filtered by the rcode column
 * @method     ChildAliEwallet[]|ObjectCollection findBySadate(string $sadate) Return ChildAliEwallet objects filtered by the sadate column
 * @method     ChildAliEwallet[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliEwallet objects filtered by the inv_code column
 * @method     ChildAliEwallet[]|ObjectCollection findByMcode(string $mcode) Return ChildAliEwallet objects filtered by the mcode column
 * @method     ChildAliEwallet[]|ObjectCollection findByNameF(string $name_f) Return ChildAliEwallet objects filtered by the name_f column
 * @method     ChildAliEwallet[]|ObjectCollection findByNameT(string $name_t) Return ChildAliEwallet objects filtered by the name_t column
 * @method     ChildAliEwallet[]|ObjectCollection findByTotal(string $total) Return ChildAliEwallet objects filtered by the total column
 * @method     ChildAliEwallet[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliEwallet objects filtered by the usercode column
 * @method     ChildAliEwallet[]|ObjectCollection findByRemark(string $remark) Return ChildAliEwallet objects filtered by the remark column
 * @method     ChildAliEwallet[]|ObjectCollection findByTrnf(string $trnf) Return ChildAliEwallet objects filtered by the trnf column
 * @method     ChildAliEwallet[]|ObjectCollection findById(int $id) Return ChildAliEwallet objects filtered by the id column
 * @method     ChildAliEwallet[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliEwallet objects filtered by the sa_type column
 * @method     ChildAliEwallet[]|ObjectCollection findByUid(string $uid) Return ChildAliEwallet objects filtered by the uid column
 * @method     ChildAliEwallet[]|ObjectCollection findByLid(string $lid) Return ChildAliEwallet objects filtered by the lid column
 * @method     ChildAliEwallet[]|ObjectCollection findByDl(string $dl) Return ChildAliEwallet objects filtered by the dl column
 * @method     ChildAliEwallet[]|ObjectCollection findByCancel(int $cancel) Return ChildAliEwallet objects filtered by the cancel column
 * @method     ChildAliEwallet[]|ObjectCollection findBySend(int $send) Return ChildAliEwallet objects filtered by the send column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxtmoney(string $txtMoney) Return ChildAliEwallet objects filtered by the txtMoney column
 * @method     ChildAliEwallet[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliEwallet objects filtered by the chkCash column
 * @method     ChildAliEwallet[]|ObjectCollection findByChkinternet(string $chkInternet) Return ChildAliEwallet objects filtered by the chkInternet column
 * @method     ChildAliEwallet[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliEwallet objects filtered by the chkFuture column
 * @method     ChildAliEwallet[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliEwallet objects filtered by the chkTransfer column
 * @method     ChildAliEwallet[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliEwallet objects filtered by the chkCredit1 column
 * @method     ChildAliEwallet[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliEwallet objects filtered by the chkCredit2 column
 * @method     ChildAliEwallet[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliEwallet objects filtered by the chkCredit3 column
 * @method     ChildAliEwallet[]|ObjectCollection findByChkwithdraw(string $chkWithdraw) Return ChildAliEwallet objects filtered by the chkWithdraw column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxtdiscount(string $txtDiscount) Return ChildAliEwallet objects filtered by the txtDiscount column
 * @method     ChildAliEwallet[]|ObjectCollection findByChktransferIn(string $chkTransfer_in) Return ChildAliEwallet objects filtered by the chkTransfer_in column
 * @method     ChildAliEwallet[]|ObjectCollection findByChktransferOut(string $chkTransfer_out) Return ChildAliEwallet objects filtered by the chkTransfer_out column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliEwallet objects filtered by the txtCash column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliEwallet objects filtered by the txtFuture column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxtinternet(string $txtInternet) Return ChildAliEwallet objects filtered by the txtInternet column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliEwallet objects filtered by the txtTransfer column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliEwallet objects filtered by the txtCredit1 column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliEwallet objects filtered by the txtCredit2 column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliEwallet objects filtered by the txtCredit3 column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxtwithdraw(string $txtWithdraw) Return ChildAliEwallet objects filtered by the txtWithdraw column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxttransferIn(string $txtTransfer_in) Return ChildAliEwallet objects filtered by the txtTransfer_in column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxttransferOut(string $txtTransfer_out) Return ChildAliEwallet objects filtered by the txtTransfer_out column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliEwallet objects filtered by the optionCash column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliEwallet objects filtered by the optionFuture column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliEwallet objects filtered by the optionTransfer column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliEwallet objects filtered by the optionCredit1 column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliEwallet objects filtered by the optionCredit2 column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliEwallet objects filtered by the optionCredit3 column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptionwithdraw(string $optionWithdraw) Return ChildAliEwallet objects filtered by the optionWithdraw column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptiontransferIn(string $optionTransfer_in) Return ChildAliEwallet objects filtered by the optionTransfer_in column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptiontransferOut(string $optionTransfer_out) Return ChildAliEwallet objects filtered by the optionTransfer_out column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliEwallet objects filtered by the txtoption column
 * @method     ChildAliEwallet[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliEwallet objects filtered by the ewallet column
 * @method     ChildAliEwallet[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliEwallet objects filtered by the ewallet_before column
 * @method     ChildAliEwallet[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliEwallet objects filtered by the ewallet_after column
 * @method     ChildAliEwallet[]|ObjectCollection findByIpay(string $ipay) Return ChildAliEwallet objects filtered by the ipay column
 * @method     ChildAliEwallet[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliEwallet objects filtered by the checkportal column
 * @method     ChildAliEwallet[]|ObjectCollection findByBprice(string $bprice) Return ChildAliEwallet objects filtered by the bprice column
 * @method     ChildAliEwallet[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliEwallet objects filtered by the cancel_date column
 * @method     ChildAliEwallet[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliEwallet objects filtered by the uid_cancel column
 * @method     ChildAliEwallet[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliEwallet objects filtered by the locationbase column
 * @method     ChildAliEwallet[]|ObjectCollection findByChkcommission(string $chkCommission) Return ChildAliEwallet objects filtered by the chkCommission column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxtcommission(string $txtCommission) Return ChildAliEwallet objects filtered by the txtCommission column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptioncommission(string $optionCommission) Return ChildAliEwallet objects filtered by the optionCommission column
 * @method     ChildAliEwallet[]|ObjectCollection findByMbase(string $mbase) Return ChildAliEwallet objects filtered by the mbase column
 * @method     ChildAliEwallet[]|ObjectCollection findByCrate(string $crate) Return ChildAliEwallet objects filtered by the crate column
 * @method     ChildAliEwallet[]|ObjectCollection findByEcheck(string $echeck) Return ChildAliEwallet objects filtered by the echeck column
 * @method     ChildAliEwallet[]|ObjectCollection findBySanoTemp(string $sano_temp) Return ChildAliEwallet objects filtered by the sano_temp column
 * @method     ChildAliEwallet[]|ObjectCollection findBySelectcash(string $selectCash) Return ChildAliEwallet objects filtered by the selectCash column
 * @method     ChildAliEwallet[]|ObjectCollection findBySelecttransfer(string $selectTransfer) Return ChildAliEwallet objects filtered by the selectTransfer column
 * @method     ChildAliEwallet[]|ObjectCollection findBySelectcredit1(string $selectCredit1) Return ChildAliEwallet objects filtered by the selectCredit1 column
 * @method     ChildAliEwallet[]|ObjectCollection findBySelectcredit2(string $selectCredit2) Return ChildAliEwallet objects filtered by the selectCredit2 column
 * @method     ChildAliEwallet[]|ObjectCollection findBySelectcredit3(string $selectCredit3) Return ChildAliEwallet objects filtered by the selectCredit3 column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptioninternet(string $optionInternet) Return ChildAliEwallet objects filtered by the optionInternet column
 * @method     ChildAliEwallet[]|ObjectCollection findBySelectinternet(string $selectInternet) Return ChildAliEwallet objects filtered by the selectInternet column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxttransfer1(string $txtTransfer1) Return ChildAliEwallet objects filtered by the txtTransfer1 column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptiontransfer1(string $optionTransfer1) Return ChildAliEwallet objects filtered by the optionTransfer1 column
 * @method     ChildAliEwallet[]|ObjectCollection findBySelecttransfer1(string $selectTransfer1) Return ChildAliEwallet objects filtered by the selectTransfer1 column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxttransfer2(string $txtTransfer2) Return ChildAliEwallet objects filtered by the txtTransfer2 column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptiontransfer2(string $optionTransfer2) Return ChildAliEwallet objects filtered by the optionTransfer2 column
 * @method     ChildAliEwallet[]|ObjectCollection findBySelecttransfer2(string $selectTransfer2) Return ChildAliEwallet objects filtered by the selectTransfer2 column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxttransfer3(string $txtTransfer3) Return ChildAliEwallet objects filtered by the txtTransfer3 column
 * @method     ChildAliEwallet[]|ObjectCollection findByOptiontransfer3(string $optionTransfer3) Return ChildAliEwallet objects filtered by the optionTransfer3 column
 * @method     ChildAliEwallet[]|ObjectCollection findBySelecttransfer3(string $selectTransfer3) Return ChildAliEwallet objects filtered by the selectTransfer3 column
 * @method     ChildAliEwallet[]|ObjectCollection findByImageTransfer(string $image_transfer) Return ChildAliEwallet objects filtered by the image_transfer column
 * @method     ChildAliEwallet[]|ObjectCollection findByTxtvoucher(string $txtVoucher) Return ChildAliEwallet objects filtered by the txtVoucher column
 * @method     ChildAliEwallet[]|ObjectCollection findByIdEcom(string $id_ecom) Return ChildAliEwallet objects filtered by the id_ecom column
 * @method     ChildAliEwallet[]|ObjectCollection findByCals(string $cals) Return ChildAliEwallet objects filtered by the cals column
 * @method     ChildAliEwallet[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliEwalletQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliEwalletQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliEwallet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliEwalletQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliEwalletQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliEwalletQuery) {
            return $criteria;
        }
        $query = new ChildAliEwalletQuery();
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
     * @return ChildAliEwallet|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliEwalletTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliEwalletTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliEwallet A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, rcode, sadate, inv_code, mcode, name_f, name_t, total, usercode, remark, trnf, id, sa_type, uid, lid, dl, cancel, send, txtMoney, chkCash, chkInternet, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkWithdraw, txtDiscount, chkTransfer_in, chkTransfer_out, txtCash, txtFuture, txtInternet, txtTransfer, txtCredit1, txtCredit2, txtCredit3, txtWithdraw, txtTransfer_in, txtTransfer_out, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionWithdraw, optionTransfer_in, optionTransfer_out, txtoption, ewallet, ewallet_before, ewallet_after, ipay, checkportal, bprice, cancel_date, uid_cancel, locationbase, chkCommission, txtCommission, optionCommission, mbase, crate, echeck, sano_temp, selectCash, selectTransfer, selectCredit1, selectCredit2, selectCredit3, optionInternet, selectInternet, txtTransfer1, optionTransfer1, selectTransfer1, txtTransfer2, optionTransfer2, selectTransfer2, txtTransfer3, optionTransfer3, selectTransfer3, image_transfer, txtVoucher, id_ecom, cals FROM ali_ewallet WHERE id = :p0';
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
            /** @var ChildAliEwallet $obj */
            $obj = new ChildAliEwallet();
            $obj->hydrate($row);
            AliEwalletTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliEwallet|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliEwalletTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliEwalletTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trnf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_LID, $lid, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SEND, $send, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxtmoney($txtmoney = null, $comparison = null)
    {
        if (is_array($txtmoney)) {
            $useMinMax = false;
            if (isset($txtmoney['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTMONEY, $txtmoney['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtmoney['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTMONEY, $txtmoney['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTMONEY, $txtmoney, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByChkinternet($chkinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CHKINTERNET, $chkinternet, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByChkwithdraw($chkwithdraw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkwithdraw)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CHKWITHDRAW, $chkwithdraw, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxtdiscount($txtdiscount = null, $comparison = null)
    {
        if (is_array($txtdiscount)) {
            $useMinMax = false;
            if (isset($txtdiscount['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTDISCOUNT, $txtdiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtdiscount['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTDISCOUNT, $txtdiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTDISCOUNT, $txtdiscount, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByChktransferIn($chktransferIn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransferIn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CHKTRANSFER_IN, $chktransferIn, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByChktransferOut($chktransferOut = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransferOut)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CHKTRANSFER_OUT, $chktransferOut, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (is_array($txtcash)) {
            $useMinMax = false;
            if (isset($txtcash['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTCASH, $txtcash['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcash['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTCASH, $txtcash['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (is_array($txtfuture)) {
            $useMinMax = false;
            if (isset($txtfuture['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTFUTURE, $txtfuture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtfuture['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTFUTURE, $txtfuture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxtinternet($txtinternet = null, $comparison = null)
    {
        if (is_array($txtinternet)) {
            $useMinMax = false;
            if (isset($txtinternet['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTINTERNET, $txtinternet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtinternet['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTINTERNET, $txtinternet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTINTERNET, $txtinternet, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (is_array($txttransfer)) {
            $useMinMax = false;
            if (isset($txttransfer['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER, $txttransfer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER, $txttransfer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (is_array($txtcredit1)) {
            $useMinMax = false;
            if (isset($txtcredit1['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTCREDIT1, $txtcredit1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit1['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTCREDIT1, $txtcredit1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (is_array($txtcredit2)) {
            $useMinMax = false;
            if (isset($txtcredit2['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTCREDIT2, $txtcredit2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit2['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTCREDIT2, $txtcredit2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (is_array($txtcredit3)) {
            $useMinMax = false;
            if (isset($txtcredit3['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTCREDIT3, $txtcredit3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit3['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTCREDIT3, $txtcredit3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxtwithdraw($txtwithdraw = null, $comparison = null)
    {
        if (is_array($txtwithdraw)) {
            $useMinMax = false;
            if (isset($txtwithdraw['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTWITHDRAW, $txtwithdraw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtwithdraw['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTWITHDRAW, $txtwithdraw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTWITHDRAW, $txtwithdraw, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxttransferIn($txttransferIn = null, $comparison = null)
    {
        if (is_array($txttransferIn)) {
            $useMinMax = false;
            if (isset($txttransferIn['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER_IN, $txttransferIn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransferIn['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER_IN, $txttransferIn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER_IN, $txttransferIn, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxttransferOut($txttransferOut = null, $comparison = null)
    {
        if (is_array($txttransferOut)) {
            $useMinMax = false;
            if (isset($txttransferOut['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER_OUT, $txttransferOut['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransferOut['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER_OUT, $txttransferOut['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER_OUT, $txttransferOut, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptionwithdraw($optionwithdraw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionwithdraw)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONWITHDRAW, $optionwithdraw, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptiontransferIn($optiontransferIn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransferIn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONTRANSFER_IN, $optiontransferIn, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptiontransferOut($optiontransferOut = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransferOut)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONTRANSFER_OUT, $optiontransferOut, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByIpay($ipay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipay)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_IPAY, $ipay, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByChkcommission($chkcommission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcommission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CHKCOMMISSION, $chkcommission, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxtcommission($txtcommission = null, $comparison = null)
    {
        if (is_array($txtcommission)) {
            $useMinMax = false;
            if (isset($txtcommission['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTCOMMISSION, $txtcommission['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcommission['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTCOMMISSION, $txtcommission['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTCOMMISSION, $txtcommission, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptioncommission($optioncommission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncommission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONCOMMISSION, $optioncommission, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_MBASE, $mbase, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByEcheck($echeck = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($echeck)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_ECHECK, $echeck, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySanoTemp($sanoTemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sanoTemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SANO_TEMP, $sanoTemp, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySelectcash($selectcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SELECTCASH, $selectcash, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySelecttransfer($selecttransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selecttransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SELECTTRANSFER, $selecttransfer, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySelectcredit1($selectcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SELECTCREDIT1, $selectcredit1, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySelectcredit2($selectcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SELECTCREDIT2, $selectcredit2, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySelectcredit3($selectcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SELECTCREDIT3, $selectcredit3, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptioninternet($optioninternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioninternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONINTERNET, $optioninternet, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySelectinternet($selectinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SELECTINTERNET, $selectinternet, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxttransfer1($txttransfer1 = null, $comparison = null)
    {
        if (is_array($txttransfer1)) {
            $useMinMax = false;
            if (isset($txttransfer1['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER1, $txttransfer1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer1['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER1, $txttransfer1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER1, $txttransfer1, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer1($optiontransfer1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONTRANSFER1, $optiontransfer1, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySelecttransfer1($selecttransfer1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selecttransfer1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SELECTTRANSFER1, $selecttransfer1, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxttransfer2($txttransfer2 = null, $comparison = null)
    {
        if (is_array($txttransfer2)) {
            $useMinMax = false;
            if (isset($txttransfer2['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER2, $txttransfer2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer2['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER2, $txttransfer2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER2, $txttransfer2, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer2($optiontransfer2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONTRANSFER2, $optiontransfer2, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySelecttransfer2($selecttransfer2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selecttransfer2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SELECTTRANSFER2, $selecttransfer2, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxttransfer3($txttransfer3 = null, $comparison = null)
    {
        if (is_array($txttransfer3)) {
            $useMinMax = false;
            if (isset($txttransfer3['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER3, $txttransfer3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer3['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER3, $txttransfer3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTTRANSFER3, $txttransfer3, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer3($optiontransfer3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_OPTIONTRANSFER3, $optiontransfer3, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterBySelecttransfer3($selecttransfer3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selecttransfer3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_SELECTTRANSFER3, $selecttransfer3, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByImageTransfer($imageTransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imageTransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_IMAGE_TRANSFER, $imageTransfer, $comparison);
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
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByTxtvoucher($txtvoucher = null, $comparison = null)
    {
        if (is_array($txtvoucher)) {
            $useMinMax = false;
            if (isset($txtvoucher['min'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTVOUCHER, $txtvoucher['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtvoucher['max'])) {
                $this->addUsingAlias(AliEwalletTableMap::COL_TXTVOUCHER, $txtvoucher['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_TXTVOUCHER, $txtvoucher, $comparison);
    }

    /**
     * Filter the query on the id_ecom column
     *
     * Example usage:
     * <code>
     * $query->filterByIdEcom('fooValue');   // WHERE id_ecom = 'fooValue'
     * $query->filterByIdEcom('%fooValue%', Criteria::LIKE); // WHERE id_ecom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idEcom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByIdEcom($idEcom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idEcom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_ID_ECOM, $idEcom, $comparison);
    }

    /**
     * Filter the query on the cals column
     *
     * Example usage:
     * <code>
     * $query->filterByCals('fooValue');   // WHERE cals = 'fooValue'
     * $query->filterByCals('%fooValue%', Criteria::LIKE); // WHERE cals LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cals The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function filterByCals($cals = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cals)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEwalletTableMap::COL_CALS, $cals, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliEwallet $aliEwallet Object to remove from the list of results
     *
     * @return $this|ChildAliEwalletQuery The current query, for fluid interface
     */
    public function prune($aliEwallet = null)
    {
        if ($aliEwallet) {
            $this->addUsingAlias(AliEwalletTableMap::COL_ID, $aliEwallet->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_ewallet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEwalletTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliEwalletTableMap::clearInstancePool();
            AliEwalletTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEwalletTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliEwalletTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliEwalletTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliEwalletTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliEwalletQuery
