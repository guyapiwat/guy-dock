<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliEsaleh as ChildAliEsaleh;
use CciOrm\CciOrm\AliEsalehQuery as ChildAliEsalehQuery;
use CciOrm\CciOrm\Map\AliEsalehTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_esaleh' table.
 *
 *
 *
 * @method     ChildAliEsalehQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliEsalehQuery orderBySano1($order = Criteria::ASC) Order by the sano1 column
 * @method     ChildAliEsalehQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliEsalehQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliEsalehQuery orderByInvRef($order = Criteria::ASC) Order by the inv_ref column
 * @method     ChildAliEsalehQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliEsalehQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliEsalehQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliEsalehQuery orderByTotBv($order = Criteria::ASC) Order by the tot_bv column
 * @method     ChildAliEsalehQuery orderByTotFv($order = Criteria::ASC) Order by the tot_fv column
 * @method     ChildAliEsalehQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliEsalehQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliEsalehQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliEsalehQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliEsalehQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliEsalehQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliEsalehQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliEsalehQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliEsalehQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliEsalehQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliEsalehQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliEsalehQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliEsalehQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliEsalehQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliEsalehQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliEsalehQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliEsalehQuery orderByChkinternet($order = Criteria::ASC) Order by the chkInternet column
 * @method     ChildAliEsalehQuery orderByChkdiscount($order = Criteria::ASC) Order by the chkDiscount column
 * @method     ChildAliEsalehQuery orderByChkother($order = Criteria::ASC) Order by the chkOther column
 * @method     ChildAliEsalehQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliEsalehQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliEsalehQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliEsalehQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliEsalehQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliEsalehQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliEsalehQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliEsalehQuery orderByTxtinternet($order = Criteria::ASC) Order by the txtInternet column
 * @method     ChildAliEsalehQuery orderByTxtdiscount($order = Criteria::ASC) Order by the txtDiscount column
 * @method     ChildAliEsalehQuery orderByTxtother($order = Criteria::ASC) Order by the txtOther column
 * @method     ChildAliEsalehQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliEsalehQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliEsalehQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliEsalehQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliEsalehQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliEsalehQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliEsalehQuery orderByOptioninternet($order = Criteria::ASC) Order by the optionInternet column
 * @method     ChildAliEsalehQuery orderByOptiondiscount($order = Criteria::ASC) Order by the optionDiscount column
 * @method     ChildAliEsalehQuery orderByOptionother($order = Criteria::ASC) Order by the optionOther column
 * @method     ChildAliEsalehQuery orderByAsend($order = Criteria::ASC) Order by the asend column
 * @method     ChildAliEsalehQuery orderByAsendDate($order = Criteria::ASC) Order by the asend_date column
 * @method     ChildAliEsalehQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildAliEsalehQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliEsalehQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliEsalehQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliEsalehQuery orderByEwallettBefore($order = Criteria::ASC) Order by the ewallett_before column
 * @method     ChildAliEsalehQuery orderByEwallettAfter($order = Criteria::ASC) Order by the ewallett_after column
 * @method     ChildAliEsalehQuery orderByPrint($order = Criteria::ASC) Order by the print column
 *
 * @method     ChildAliEsalehQuery groupBySano() Group by the sano column
 * @method     ChildAliEsalehQuery groupBySano1() Group by the sano1 column
 * @method     ChildAliEsalehQuery groupBySadate() Group by the sadate column
 * @method     ChildAliEsalehQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliEsalehQuery groupByInvRef() Group by the inv_ref column
 * @method     ChildAliEsalehQuery groupByMcode() Group by the mcode column
 * @method     ChildAliEsalehQuery groupByTotal() Group by the total column
 * @method     ChildAliEsalehQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliEsalehQuery groupByTotBv() Group by the tot_bv column
 * @method     ChildAliEsalehQuery groupByTotFv() Group by the tot_fv column
 * @method     ChildAliEsalehQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliEsalehQuery groupByRemark() Group by the remark column
 * @method     ChildAliEsalehQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliEsalehQuery groupById() Group by the id column
 * @method     ChildAliEsalehQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliEsalehQuery groupByUid() Group by the uid column
 * @method     ChildAliEsalehQuery groupByDl() Group by the dl column
 * @method     ChildAliEsalehQuery groupByCancel() Group by the cancel column
 * @method     ChildAliEsalehQuery groupBySend() Group by the send column
 * @method     ChildAliEsalehQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliEsalehQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliEsalehQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliEsalehQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliEsalehQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliEsalehQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliEsalehQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliEsalehQuery groupByChkinternet() Group by the chkInternet column
 * @method     ChildAliEsalehQuery groupByChkdiscount() Group by the chkDiscount column
 * @method     ChildAliEsalehQuery groupByChkother() Group by the chkOther column
 * @method     ChildAliEsalehQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliEsalehQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliEsalehQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliEsalehQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliEsalehQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliEsalehQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliEsalehQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliEsalehQuery groupByTxtinternet() Group by the txtInternet column
 * @method     ChildAliEsalehQuery groupByTxtdiscount() Group by the txtDiscount column
 * @method     ChildAliEsalehQuery groupByTxtother() Group by the txtOther column
 * @method     ChildAliEsalehQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliEsalehQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliEsalehQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliEsalehQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliEsalehQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliEsalehQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliEsalehQuery groupByOptioninternet() Group by the optionInternet column
 * @method     ChildAliEsalehQuery groupByOptiondiscount() Group by the optionDiscount column
 * @method     ChildAliEsalehQuery groupByOptionother() Group by the optionOther column
 * @method     ChildAliEsalehQuery groupByAsend() Group by the asend column
 * @method     ChildAliEsalehQuery groupByAsendDate() Group by the asend_date column
 * @method     ChildAliEsalehQuery groupByDiscount() Group by the discount column
 * @method     ChildAliEsalehQuery groupByStatus() Group by the status column
 * @method     ChildAliEsalehQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliEsalehQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliEsalehQuery groupByEwallettBefore() Group by the ewallett_before column
 * @method     ChildAliEsalehQuery groupByEwallettAfter() Group by the ewallett_after column
 * @method     ChildAliEsalehQuery groupByPrint() Group by the print column
 *
 * @method     ChildAliEsalehQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliEsalehQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliEsalehQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliEsalehQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliEsalehQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliEsalehQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliEsaleh findOne(ConnectionInterface $con = null) Return the first ChildAliEsaleh matching the query
 * @method     ChildAliEsaleh findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliEsaleh matching the query, or a new ChildAliEsaleh object populated from the query conditions when no match is found
 *
 * @method     ChildAliEsaleh findOneBySano(string $sano) Return the first ChildAliEsaleh filtered by the sano column
 * @method     ChildAliEsaleh findOneBySano1(string $sano1) Return the first ChildAliEsaleh filtered by the sano1 column
 * @method     ChildAliEsaleh findOneBySadate(string $sadate) Return the first ChildAliEsaleh filtered by the sadate column
 * @method     ChildAliEsaleh findOneByInvCode(string $inv_code) Return the first ChildAliEsaleh filtered by the inv_code column
 * @method     ChildAliEsaleh findOneByInvRef(string $inv_ref) Return the first ChildAliEsaleh filtered by the inv_ref column
 * @method     ChildAliEsaleh findOneByMcode(string $mcode) Return the first ChildAliEsaleh filtered by the mcode column
 * @method     ChildAliEsaleh findOneByTotal(string $total) Return the first ChildAliEsaleh filtered by the total column
 * @method     ChildAliEsaleh findOneByTotPv(string $tot_pv) Return the first ChildAliEsaleh filtered by the tot_pv column
 * @method     ChildAliEsaleh findOneByTotBv(string $tot_bv) Return the first ChildAliEsaleh filtered by the tot_bv column
 * @method     ChildAliEsaleh findOneByTotFv(string $tot_fv) Return the first ChildAliEsaleh filtered by the tot_fv column
 * @method     ChildAliEsaleh findOneByUsercode(string $usercode) Return the first ChildAliEsaleh filtered by the usercode column
 * @method     ChildAliEsaleh findOneByRemark(string $remark) Return the first ChildAliEsaleh filtered by the remark column
 * @method     ChildAliEsaleh findOneByTrnf(int $trnf) Return the first ChildAliEsaleh filtered by the trnf column
 * @method     ChildAliEsaleh findOneById(int $id) Return the first ChildAliEsaleh filtered by the id column
 * @method     ChildAliEsaleh findOneBySaType(string $sa_type) Return the first ChildAliEsaleh filtered by the sa_type column
 * @method     ChildAliEsaleh findOneByUid(string $uid) Return the first ChildAliEsaleh filtered by the uid column
 * @method     ChildAliEsaleh findOneByDl(string $dl) Return the first ChildAliEsaleh filtered by the dl column
 * @method     ChildAliEsaleh findOneByCancel(int $cancel) Return the first ChildAliEsaleh filtered by the cancel column
 * @method     ChildAliEsaleh findOneBySend(int $send) Return the first ChildAliEsaleh filtered by the send column
 * @method     ChildAliEsaleh findOneByTxtoption(string $txtoption) Return the first ChildAliEsaleh filtered by the txtoption column
 * @method     ChildAliEsaleh findOneByChkcash(string $chkCash) Return the first ChildAliEsaleh filtered by the chkCash column
 * @method     ChildAliEsaleh findOneByChkfuture(string $chkFuture) Return the first ChildAliEsaleh filtered by the chkFuture column
 * @method     ChildAliEsaleh findOneByChktransfer(string $chkTransfer) Return the first ChildAliEsaleh filtered by the chkTransfer column
 * @method     ChildAliEsaleh findOneByChkcredit1(string $chkCredit1) Return the first ChildAliEsaleh filtered by the chkCredit1 column
 * @method     ChildAliEsaleh findOneByChkcredit2(string $chkCredit2) Return the first ChildAliEsaleh filtered by the chkCredit2 column
 * @method     ChildAliEsaleh findOneByChkcredit3(string $chkCredit3) Return the first ChildAliEsaleh filtered by the chkCredit3 column
 * @method     ChildAliEsaleh findOneByChkinternet(string $chkInternet) Return the first ChildAliEsaleh filtered by the chkInternet column
 * @method     ChildAliEsaleh findOneByChkdiscount(string $chkDiscount) Return the first ChildAliEsaleh filtered by the chkDiscount column
 * @method     ChildAliEsaleh findOneByChkother(string $chkOther) Return the first ChildAliEsaleh filtered by the chkOther column
 * @method     ChildAliEsaleh findOneByTxtcash(string $txtCash) Return the first ChildAliEsaleh filtered by the txtCash column
 * @method     ChildAliEsaleh findOneByTxtfuture(string $txtFuture) Return the first ChildAliEsaleh filtered by the txtFuture column
 * @method     ChildAliEsaleh findOneByTxttransfer(string $txtTransfer) Return the first ChildAliEsaleh filtered by the txtTransfer column
 * @method     ChildAliEsaleh findOneByEwallet(string $ewallet) Return the first ChildAliEsaleh filtered by the ewallet column
 * @method     ChildAliEsaleh findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliEsaleh filtered by the txtCredit1 column
 * @method     ChildAliEsaleh findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliEsaleh filtered by the txtCredit2 column
 * @method     ChildAliEsaleh findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliEsaleh filtered by the txtCredit3 column
 * @method     ChildAliEsaleh findOneByTxtinternet(string $txtInternet) Return the first ChildAliEsaleh filtered by the txtInternet column
 * @method     ChildAliEsaleh findOneByTxtdiscount(string $txtDiscount) Return the first ChildAliEsaleh filtered by the txtDiscount column
 * @method     ChildAliEsaleh findOneByTxtother(string $txtOther) Return the first ChildAliEsaleh filtered by the txtOther column
 * @method     ChildAliEsaleh findOneByOptioncash(string $optionCash) Return the first ChildAliEsaleh filtered by the optionCash column
 * @method     ChildAliEsaleh findOneByOptionfuture(string $optionFuture) Return the first ChildAliEsaleh filtered by the optionFuture column
 * @method     ChildAliEsaleh findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliEsaleh filtered by the optionTransfer column
 * @method     ChildAliEsaleh findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliEsaleh filtered by the optionCredit1 column
 * @method     ChildAliEsaleh findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliEsaleh filtered by the optionCredit2 column
 * @method     ChildAliEsaleh findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliEsaleh filtered by the optionCredit3 column
 * @method     ChildAliEsaleh findOneByOptioninternet(string $optionInternet) Return the first ChildAliEsaleh filtered by the optionInternet column
 * @method     ChildAliEsaleh findOneByOptiondiscount(string $optionDiscount) Return the first ChildAliEsaleh filtered by the optionDiscount column
 * @method     ChildAliEsaleh findOneByOptionother(string $optionOther) Return the first ChildAliEsaleh filtered by the optionOther column
 * @method     ChildAliEsaleh findOneByAsend(int $asend) Return the first ChildAliEsaleh filtered by the asend column
 * @method     ChildAliEsaleh findOneByAsendDate(string $asend_date) Return the first ChildAliEsaleh filtered by the asend_date column
 * @method     ChildAliEsaleh findOneByDiscount(string $discount) Return the first ChildAliEsaleh filtered by the discount column
 * @method     ChildAliEsaleh findOneByStatus(int $status) Return the first ChildAliEsaleh filtered by the status column
 * @method     ChildAliEsaleh findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliEsaleh filtered by the ewallet_before column
 * @method     ChildAliEsaleh findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliEsaleh filtered by the ewallet_after column
 * @method     ChildAliEsaleh findOneByEwallettBefore(string $ewallett_before) Return the first ChildAliEsaleh filtered by the ewallett_before column
 * @method     ChildAliEsaleh findOneByEwallettAfter(string $ewallett_after) Return the first ChildAliEsaleh filtered by the ewallett_after column
 * @method     ChildAliEsaleh findOneByPrint(int $print) Return the first ChildAliEsaleh filtered by the print column *

 * @method     ChildAliEsaleh requirePk($key, ConnectionInterface $con = null) Return the ChildAliEsaleh by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOne(ConnectionInterface $con = null) Return the first ChildAliEsaleh matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEsaleh requireOneBySano(string $sano) Return the first ChildAliEsaleh filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneBySano1(string $sano1) Return the first ChildAliEsaleh filtered by the sano1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneBySadate(string $sadate) Return the first ChildAliEsaleh filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByInvCode(string $inv_code) Return the first ChildAliEsaleh filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByInvRef(string $inv_ref) Return the first ChildAliEsaleh filtered by the inv_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByMcode(string $mcode) Return the first ChildAliEsaleh filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTotal(string $total) Return the first ChildAliEsaleh filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTotPv(string $tot_pv) Return the first ChildAliEsaleh filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTotBv(string $tot_bv) Return the first ChildAliEsaleh filtered by the tot_bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTotFv(string $tot_fv) Return the first ChildAliEsaleh filtered by the tot_fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByUsercode(string $usercode) Return the first ChildAliEsaleh filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByRemark(string $remark) Return the first ChildAliEsaleh filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTrnf(int $trnf) Return the first ChildAliEsaleh filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneById(int $id) Return the first ChildAliEsaleh filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneBySaType(string $sa_type) Return the first ChildAliEsaleh filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByUid(string $uid) Return the first ChildAliEsaleh filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByDl(string $dl) Return the first ChildAliEsaleh filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByCancel(int $cancel) Return the first ChildAliEsaleh filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneBySend(int $send) Return the first ChildAliEsaleh filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTxtoption(string $txtoption) Return the first ChildAliEsaleh filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByChkcash(string $chkCash) Return the first ChildAliEsaleh filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByChkfuture(string $chkFuture) Return the first ChildAliEsaleh filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByChktransfer(string $chkTransfer) Return the first ChildAliEsaleh filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliEsaleh filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliEsaleh filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliEsaleh filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByChkinternet(string $chkInternet) Return the first ChildAliEsaleh filtered by the chkInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByChkdiscount(string $chkDiscount) Return the first ChildAliEsaleh filtered by the chkDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByChkother(string $chkOther) Return the first ChildAliEsaleh filtered by the chkOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTxtcash(string $txtCash) Return the first ChildAliEsaleh filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTxtfuture(string $txtFuture) Return the first ChildAliEsaleh filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliEsaleh filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByEwallet(string $ewallet) Return the first ChildAliEsaleh filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliEsaleh filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliEsaleh filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliEsaleh filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTxtinternet(string $txtInternet) Return the first ChildAliEsaleh filtered by the txtInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTxtdiscount(string $txtDiscount) Return the first ChildAliEsaleh filtered by the txtDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByTxtother(string $txtOther) Return the first ChildAliEsaleh filtered by the txtOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByOptioncash(string $optionCash) Return the first ChildAliEsaleh filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByOptionfuture(string $optionFuture) Return the first ChildAliEsaleh filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliEsaleh filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliEsaleh filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliEsaleh filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliEsaleh filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByOptioninternet(string $optionInternet) Return the first ChildAliEsaleh filtered by the optionInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByOptiondiscount(string $optionDiscount) Return the first ChildAliEsaleh filtered by the optionDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByOptionother(string $optionOther) Return the first ChildAliEsaleh filtered by the optionOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByAsend(int $asend) Return the first ChildAliEsaleh filtered by the asend column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByAsendDate(string $asend_date) Return the first ChildAliEsaleh filtered by the asend_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByDiscount(string $discount) Return the first ChildAliEsaleh filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByStatus(int $status) Return the first ChildAliEsaleh filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliEsaleh filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliEsaleh filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByEwallettBefore(string $ewallett_before) Return the first ChildAliEsaleh filtered by the ewallett_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByEwallettAfter(string $ewallett_after) Return the first ChildAliEsaleh filtered by the ewallett_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEsaleh requireOneByPrint(int $print) Return the first ChildAliEsaleh filtered by the print column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEsaleh[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliEsaleh objects based on current ModelCriteria
 * @method     ChildAliEsaleh[]|ObjectCollection findBySano(string $sano) Return ChildAliEsaleh objects filtered by the sano column
 * @method     ChildAliEsaleh[]|ObjectCollection findBySano1(string $sano1) Return ChildAliEsaleh objects filtered by the sano1 column
 * @method     ChildAliEsaleh[]|ObjectCollection findBySadate(string $sadate) Return ChildAliEsaleh objects filtered by the sadate column
 * @method     ChildAliEsaleh[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliEsaleh objects filtered by the inv_code column
 * @method     ChildAliEsaleh[]|ObjectCollection findByInvRef(string $inv_ref) Return ChildAliEsaleh objects filtered by the inv_ref column
 * @method     ChildAliEsaleh[]|ObjectCollection findByMcode(string $mcode) Return ChildAliEsaleh objects filtered by the mcode column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTotal(string $total) Return ChildAliEsaleh objects filtered by the total column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliEsaleh objects filtered by the tot_pv column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTotBv(string $tot_bv) Return ChildAliEsaleh objects filtered by the tot_bv column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTotFv(string $tot_fv) Return ChildAliEsaleh objects filtered by the tot_fv column
 * @method     ChildAliEsaleh[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliEsaleh objects filtered by the usercode column
 * @method     ChildAliEsaleh[]|ObjectCollection findByRemark(string $remark) Return ChildAliEsaleh objects filtered by the remark column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTrnf(int $trnf) Return ChildAliEsaleh objects filtered by the trnf column
 * @method     ChildAliEsaleh[]|ObjectCollection findById(int $id) Return ChildAliEsaleh objects filtered by the id column
 * @method     ChildAliEsaleh[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliEsaleh objects filtered by the sa_type column
 * @method     ChildAliEsaleh[]|ObjectCollection findByUid(string $uid) Return ChildAliEsaleh objects filtered by the uid column
 * @method     ChildAliEsaleh[]|ObjectCollection findByDl(string $dl) Return ChildAliEsaleh objects filtered by the dl column
 * @method     ChildAliEsaleh[]|ObjectCollection findByCancel(int $cancel) Return ChildAliEsaleh objects filtered by the cancel column
 * @method     ChildAliEsaleh[]|ObjectCollection findBySend(int $send) Return ChildAliEsaleh objects filtered by the send column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliEsaleh objects filtered by the txtoption column
 * @method     ChildAliEsaleh[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliEsaleh objects filtered by the chkCash column
 * @method     ChildAliEsaleh[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliEsaleh objects filtered by the chkFuture column
 * @method     ChildAliEsaleh[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliEsaleh objects filtered by the chkTransfer column
 * @method     ChildAliEsaleh[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliEsaleh objects filtered by the chkCredit1 column
 * @method     ChildAliEsaleh[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliEsaleh objects filtered by the chkCredit2 column
 * @method     ChildAliEsaleh[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliEsaleh objects filtered by the chkCredit3 column
 * @method     ChildAliEsaleh[]|ObjectCollection findByChkinternet(string $chkInternet) Return ChildAliEsaleh objects filtered by the chkInternet column
 * @method     ChildAliEsaleh[]|ObjectCollection findByChkdiscount(string $chkDiscount) Return ChildAliEsaleh objects filtered by the chkDiscount column
 * @method     ChildAliEsaleh[]|ObjectCollection findByChkother(string $chkOther) Return ChildAliEsaleh objects filtered by the chkOther column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliEsaleh objects filtered by the txtCash column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliEsaleh objects filtered by the txtFuture column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliEsaleh objects filtered by the txtTransfer column
 * @method     ChildAliEsaleh[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliEsaleh objects filtered by the ewallet column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliEsaleh objects filtered by the txtCredit1 column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliEsaleh objects filtered by the txtCredit2 column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliEsaleh objects filtered by the txtCredit3 column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTxtinternet(string $txtInternet) Return ChildAliEsaleh objects filtered by the txtInternet column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTxtdiscount(string $txtDiscount) Return ChildAliEsaleh objects filtered by the txtDiscount column
 * @method     ChildAliEsaleh[]|ObjectCollection findByTxtother(string $txtOther) Return ChildAliEsaleh objects filtered by the txtOther column
 * @method     ChildAliEsaleh[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliEsaleh objects filtered by the optionCash column
 * @method     ChildAliEsaleh[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliEsaleh objects filtered by the optionFuture column
 * @method     ChildAliEsaleh[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliEsaleh objects filtered by the optionTransfer column
 * @method     ChildAliEsaleh[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliEsaleh objects filtered by the optionCredit1 column
 * @method     ChildAliEsaleh[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliEsaleh objects filtered by the optionCredit2 column
 * @method     ChildAliEsaleh[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliEsaleh objects filtered by the optionCredit3 column
 * @method     ChildAliEsaleh[]|ObjectCollection findByOptioninternet(string $optionInternet) Return ChildAliEsaleh objects filtered by the optionInternet column
 * @method     ChildAliEsaleh[]|ObjectCollection findByOptiondiscount(string $optionDiscount) Return ChildAliEsaleh objects filtered by the optionDiscount column
 * @method     ChildAliEsaleh[]|ObjectCollection findByOptionother(string $optionOther) Return ChildAliEsaleh objects filtered by the optionOther column
 * @method     ChildAliEsaleh[]|ObjectCollection findByAsend(int $asend) Return ChildAliEsaleh objects filtered by the asend column
 * @method     ChildAliEsaleh[]|ObjectCollection findByAsendDate(string $asend_date) Return ChildAliEsaleh objects filtered by the asend_date column
 * @method     ChildAliEsaleh[]|ObjectCollection findByDiscount(string $discount) Return ChildAliEsaleh objects filtered by the discount column
 * @method     ChildAliEsaleh[]|ObjectCollection findByStatus(int $status) Return ChildAliEsaleh objects filtered by the status column
 * @method     ChildAliEsaleh[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliEsaleh objects filtered by the ewallet_before column
 * @method     ChildAliEsaleh[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliEsaleh objects filtered by the ewallet_after column
 * @method     ChildAliEsaleh[]|ObjectCollection findByEwallettBefore(string $ewallett_before) Return ChildAliEsaleh objects filtered by the ewallett_before column
 * @method     ChildAliEsaleh[]|ObjectCollection findByEwallettAfter(string $ewallett_after) Return ChildAliEsaleh objects filtered by the ewallett_after column
 * @method     ChildAliEsaleh[]|ObjectCollection findByPrint(int $print) Return ChildAliEsaleh objects filtered by the print column
 * @method     ChildAliEsaleh[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliEsalehQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliEsalehQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliEsaleh', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliEsalehQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliEsalehQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliEsalehQuery) {
            return $criteria;
        }
        $query = new ChildAliEsalehQuery();
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
     * @return ChildAliEsaleh|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliEsalehTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliEsalehTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliEsaleh A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, sano1, sadate, inv_code, inv_ref, mcode, total, tot_pv, tot_bv, tot_fv, usercode, remark, trnf, id, sa_type, uid, dl, cancel, send, txtoption, chkCash, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkInternet, chkDiscount, chkOther, txtCash, txtFuture, txtTransfer, ewallet, txtCredit1, txtCredit2, txtCredit3, txtInternet, txtDiscount, txtOther, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionInternet, optionDiscount, optionOther, asend, asend_date, discount, status, ewallet_before, ewallet_after, ewallett_before, ewallett_after, print FROM ali_esaleh WHERE id = :p0';
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
            /** @var ChildAliEsaleh $obj */
            $obj = new ChildAliEsaleh();
            $obj->hydrate($row);
            AliEsalehTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliEsaleh|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliEsalehTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliEsalehTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the sano column
     *
     * Example usage:
     * <code>
     * $query->filterBySano(1234); // WHERE sano = 1234
     * $query->filterBySano(array(12, 34)); // WHERE sano IN (12, 34)
     * $query->filterBySano(array('min' => 12)); // WHERE sano > 12
     * </code>
     *
     * @param     mixed $sano The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (is_array($sano)) {
            $useMinMax = false;
            if (isset($sano['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_SANO, $sano['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sano['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_SANO, $sano['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterBySano1($sano1 = null, $comparison = null)
    {
        if (is_array($sano1)) {
            $useMinMax = false;
            if (isset($sano1['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_SANO1, $sano1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sano1['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_SANO1, $sano1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_SANO1, $sano1, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByInvRef($invRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_INV_REF, $invRef, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TOT_PV, $totPv, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTotBv($totBv = null, $comparison = null)
    {
        if (is_array($totBv)) {
            $useMinMax = false;
            if (isset($totBv['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_TOT_BV, $totBv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totBv['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_TOT_BV, $totBv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TOT_BV, $totBv, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTotFv($totFv = null, $comparison = null)
    {
        if (is_array($totFv)) {
            $useMinMax = false;
            if (isset($totFv['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_TOT_FV, $totFv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totFv['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_TOT_FV, $totFv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TOT_FV, $totFv, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (is_array($trnf)) {
            $useMinMax = false;
            if (isset($trnf['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_TRNF, $trnf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trnf['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_TRNF, $trnf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_SEND, $send, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByChkinternet($chkinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_CHKINTERNET, $chkinternet, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByChkdiscount($chkdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_CHKDISCOUNT, $chkdiscount, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByChkother($chkother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_CHKOTHER, $chkother, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txttransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTxtinternet($txtinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TXTINTERNET, $txtinternet, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTxtdiscount($txtdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TXTDISCOUNT, $txtdiscount, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByTxtother($txtother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_TXTOTHER, $txtother, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByOptioninternet($optioninternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioninternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_OPTIONINTERNET, $optioninternet, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByOptiondiscount($optiondiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiondiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_OPTIONDISCOUNT, $optiondiscount, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByOptionother($optionother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_OPTIONOTHER, $optionother, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByAsend($asend = null, $comparison = null)
    {
        if (is_array($asend)) {
            $useMinMax = false;
            if (isset($asend['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_ASEND, $asend['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($asend['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_ASEND, $asend['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_ASEND, $asend, $comparison);
    }

    /**
     * Filter the query on the asend_date column
     *
     * Example usage:
     * <code>
     * $query->filterByAsendDate('2011-03-14'); // WHERE asend_date = '2011-03-14'
     * $query->filterByAsendDate('now'); // WHERE asend_date = '2011-03-14'
     * $query->filterByAsendDate(array('max' => 'yesterday')); // WHERE asend_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $asendDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByAsendDate($asendDate = null, $comparison = null)
    {
        if (is_array($asendDate)) {
            $useMinMax = false;
            if (isset($asendDate['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_ASEND_DATE, $asendDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($asendDate['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_ASEND_DATE, $asendDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_ASEND_DATE, $asendDate, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByDiscount($discount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($discount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_DISCOUNT, $discount, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByEwallettBefore($ewallettBefore = null, $comparison = null)
    {
        if (is_array($ewallettBefore)) {
            $useMinMax = false;
            if (isset($ewallettBefore['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_EWALLETT_BEFORE, $ewallettBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallettBefore['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_EWALLETT_BEFORE, $ewallettBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_EWALLETT_BEFORE, $ewallettBefore, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByEwallettAfter($ewallettAfter = null, $comparison = null)
    {
        if (is_array($ewallettAfter)) {
            $useMinMax = false;
            if (isset($ewallettAfter['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_EWALLETT_AFTER, $ewallettAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallettAfter['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_EWALLETT_AFTER, $ewallettAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_EWALLETT_AFTER, $ewallettAfter, $comparison);
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
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function filterByPrint($print = null, $comparison = null)
    {
        if (is_array($print)) {
            $useMinMax = false;
            if (isset($print['min'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_PRINT, $print['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($print['max'])) {
                $this->addUsingAlias(AliEsalehTableMap::COL_PRINT, $print['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEsalehTableMap::COL_PRINT, $print, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliEsaleh $aliEsaleh Object to remove from the list of results
     *
     * @return $this|ChildAliEsalehQuery The current query, for fluid interface
     */
    public function prune($aliEsaleh = null)
    {
        if ($aliEsaleh) {
            $this->addUsingAlias(AliEsalehTableMap::COL_ID, $aliEsaleh->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_esaleh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEsalehTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliEsalehTableMap::clearInstancePool();
            AliEsalehTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEsalehTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliEsalehTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliEsalehTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliEsalehTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliEsalehQuery
