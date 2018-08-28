<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliImportStockH as ChildAliImportStockH;
use CciOrm\CciOrm\AliImportStockHQuery as ChildAliImportStockHQuery;
use CciOrm\CciOrm\Map\AliImportStockHTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_import_stock_h' table.
 *
 *
 *
 * @method     ChildAliImportStockHQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliImportStockHQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliImportStockHQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliImportStockHQuery orderByInvCodeTo($order = Criteria::ASC) Order by the inv_code_to column
 * @method     ChildAliImportStockHQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliImportStockHQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliImportStockHQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliImportStockHQuery orderByTotBv($order = Criteria::ASC) Order by the tot_bv column
 * @method     ChildAliImportStockHQuery orderByTotFv($order = Criteria::ASC) Order by the tot_fv column
 * @method     ChildAliImportStockHQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliImportStockHQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliImportStockHQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliImportStockHQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliImportStockHQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliImportStockHQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliImportStockHQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliImportStockHQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliImportStockHQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliImportStockHQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliImportStockHQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliImportStockHQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliImportStockHQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliImportStockHQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliImportStockHQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliImportStockHQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliImportStockHQuery orderByChkinternet($order = Criteria::ASC) Order by the chkInternet column
 * @method     ChildAliImportStockHQuery orderByChkdiscount($order = Criteria::ASC) Order by the chkDiscount column
 * @method     ChildAliImportStockHQuery orderByChkother($order = Criteria::ASC) Order by the chkOther column
 * @method     ChildAliImportStockHQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliImportStockHQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliImportStockHQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliImportStockHQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliImportStockHQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliImportStockHQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliImportStockHQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliImportStockHQuery orderByTxtinternet($order = Criteria::ASC) Order by the txtInternet column
 * @method     ChildAliImportStockHQuery orderByTxtdiscount($order = Criteria::ASC) Order by the txtDiscount column
 * @method     ChildAliImportStockHQuery orderByTxtother($order = Criteria::ASC) Order by the txtOther column
 * @method     ChildAliImportStockHQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliImportStockHQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliImportStockHQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliImportStockHQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliImportStockHQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliImportStockHQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliImportStockHQuery orderByOptioninternet($order = Criteria::ASC) Order by the optionInternet column
 * @method     ChildAliImportStockHQuery orderByOptiondiscount($order = Criteria::ASC) Order by the optionDiscount column
 * @method     ChildAliImportStockHQuery orderByOptionother($order = Criteria::ASC) Order by the optionOther column
 * @method     ChildAliImportStockHQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildAliImportStockHQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method     ChildAliImportStockHQuery orderBySenderDate($order = Criteria::ASC) Order by the sender_date column
 * @method     ChildAliImportStockHQuery orderByReceive($order = Criteria::ASC) Order by the receive column
 * @method     ChildAliImportStockHQuery orderByReceiveDate($order = Criteria::ASC) Order by the receive_date column
 * @method     ChildAliImportStockHQuery orderByPrint($order = Criteria::ASC) Order by the print column
 * @method     ChildAliImportStockHQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliImportStockHQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliImportStockHQuery orderByEwallettBefore($order = Criteria::ASC) Order by the ewallett_before column
 * @method     ChildAliImportStockHQuery orderByEwallettAfter($order = Criteria::ASC) Order by the ewallett_after column
 * @method     ChildAliImportStockHQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliImportStockHQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 *
 * @method     ChildAliImportStockHQuery groupBySano() Group by the sano column
 * @method     ChildAliImportStockHQuery groupBySadate() Group by the sadate column
 * @method     ChildAliImportStockHQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliImportStockHQuery groupByInvCodeTo() Group by the inv_code_to column
 * @method     ChildAliImportStockHQuery groupByMcode() Group by the mcode column
 * @method     ChildAliImportStockHQuery groupByTotal() Group by the total column
 * @method     ChildAliImportStockHQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliImportStockHQuery groupByTotBv() Group by the tot_bv column
 * @method     ChildAliImportStockHQuery groupByTotFv() Group by the tot_fv column
 * @method     ChildAliImportStockHQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliImportStockHQuery groupByRemark() Group by the remark column
 * @method     ChildAliImportStockHQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliImportStockHQuery groupById() Group by the id column
 * @method     ChildAliImportStockHQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliImportStockHQuery groupByUid() Group by the uid column
 * @method     ChildAliImportStockHQuery groupByDl() Group by the dl column
 * @method     ChildAliImportStockHQuery groupByCancel() Group by the cancel column
 * @method     ChildAliImportStockHQuery groupBySend() Group by the send column
 * @method     ChildAliImportStockHQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliImportStockHQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliImportStockHQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliImportStockHQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliImportStockHQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliImportStockHQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliImportStockHQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliImportStockHQuery groupByChkinternet() Group by the chkInternet column
 * @method     ChildAliImportStockHQuery groupByChkdiscount() Group by the chkDiscount column
 * @method     ChildAliImportStockHQuery groupByChkother() Group by the chkOther column
 * @method     ChildAliImportStockHQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliImportStockHQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliImportStockHQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliImportStockHQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliImportStockHQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliImportStockHQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliImportStockHQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliImportStockHQuery groupByTxtinternet() Group by the txtInternet column
 * @method     ChildAliImportStockHQuery groupByTxtdiscount() Group by the txtDiscount column
 * @method     ChildAliImportStockHQuery groupByTxtother() Group by the txtOther column
 * @method     ChildAliImportStockHQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliImportStockHQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliImportStockHQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliImportStockHQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliImportStockHQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliImportStockHQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliImportStockHQuery groupByOptioninternet() Group by the optionInternet column
 * @method     ChildAliImportStockHQuery groupByOptiondiscount() Group by the optionDiscount column
 * @method     ChildAliImportStockHQuery groupByOptionother() Group by the optionOther column
 * @method     ChildAliImportStockHQuery groupByDiscount() Group by the discount column
 * @method     ChildAliImportStockHQuery groupBySender() Group by the sender column
 * @method     ChildAliImportStockHQuery groupBySenderDate() Group by the sender_date column
 * @method     ChildAliImportStockHQuery groupByReceive() Group by the receive column
 * @method     ChildAliImportStockHQuery groupByReceiveDate() Group by the receive_date column
 * @method     ChildAliImportStockHQuery groupByPrint() Group by the print column
 * @method     ChildAliImportStockHQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliImportStockHQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliImportStockHQuery groupByEwallettBefore() Group by the ewallett_before column
 * @method     ChildAliImportStockHQuery groupByEwallettAfter() Group by the ewallett_after column
 * @method     ChildAliImportStockHQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliImportStockHQuery groupByUidCancel() Group by the uid_cancel column
 *
 * @method     ChildAliImportStockHQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliImportStockHQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliImportStockHQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliImportStockHQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliImportStockHQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliImportStockHQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliImportStockH findOne(ConnectionInterface $con = null) Return the first ChildAliImportStockH matching the query
 * @method     ChildAliImportStockH findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliImportStockH matching the query, or a new ChildAliImportStockH object populated from the query conditions when no match is found
 *
 * @method     ChildAliImportStockH findOneBySano(int $sano) Return the first ChildAliImportStockH filtered by the sano column
 * @method     ChildAliImportStockH findOneBySadate(string $sadate) Return the first ChildAliImportStockH filtered by the sadate column
 * @method     ChildAliImportStockH findOneByInvCode(string $inv_code) Return the first ChildAliImportStockH filtered by the inv_code column
 * @method     ChildAliImportStockH findOneByInvCodeTo(string $inv_code_to) Return the first ChildAliImportStockH filtered by the inv_code_to column
 * @method     ChildAliImportStockH findOneByMcode(string $mcode) Return the first ChildAliImportStockH filtered by the mcode column
 * @method     ChildAliImportStockH findOneByTotal(string $total) Return the first ChildAliImportStockH filtered by the total column
 * @method     ChildAliImportStockH findOneByTotPv(string $tot_pv) Return the first ChildAliImportStockH filtered by the tot_pv column
 * @method     ChildAliImportStockH findOneByTotBv(string $tot_bv) Return the first ChildAliImportStockH filtered by the tot_bv column
 * @method     ChildAliImportStockH findOneByTotFv(string $tot_fv) Return the first ChildAliImportStockH filtered by the tot_fv column
 * @method     ChildAliImportStockH findOneByUsercode(string $usercode) Return the first ChildAliImportStockH filtered by the usercode column
 * @method     ChildAliImportStockH findOneByRemark(string $remark) Return the first ChildAliImportStockH filtered by the remark column
 * @method     ChildAliImportStockH findOneByTrnf(string $trnf) Return the first ChildAliImportStockH filtered by the trnf column
 * @method     ChildAliImportStockH findOneById(int $id) Return the first ChildAliImportStockH filtered by the id column
 * @method     ChildAliImportStockH findOneBySaType(string $sa_type) Return the first ChildAliImportStockH filtered by the sa_type column
 * @method     ChildAliImportStockH findOneByUid(string $uid) Return the first ChildAliImportStockH filtered by the uid column
 * @method     ChildAliImportStockH findOneByDl(string $dl) Return the first ChildAliImportStockH filtered by the dl column
 * @method     ChildAliImportStockH findOneByCancel(int $cancel) Return the first ChildAliImportStockH filtered by the cancel column
 * @method     ChildAliImportStockH findOneBySend(int $send) Return the first ChildAliImportStockH filtered by the send column
 * @method     ChildAliImportStockH findOneByTxtoption(string $txtoption) Return the first ChildAliImportStockH filtered by the txtoption column
 * @method     ChildAliImportStockH findOneByChkcash(string $chkCash) Return the first ChildAliImportStockH filtered by the chkCash column
 * @method     ChildAliImportStockH findOneByChkfuture(string $chkFuture) Return the first ChildAliImportStockH filtered by the chkFuture column
 * @method     ChildAliImportStockH findOneByChktransfer(string $chkTransfer) Return the first ChildAliImportStockH filtered by the chkTransfer column
 * @method     ChildAliImportStockH findOneByChkcredit1(string $chkCredit1) Return the first ChildAliImportStockH filtered by the chkCredit1 column
 * @method     ChildAliImportStockH findOneByChkcredit2(string $chkCredit2) Return the first ChildAliImportStockH filtered by the chkCredit2 column
 * @method     ChildAliImportStockH findOneByChkcredit3(string $chkCredit3) Return the first ChildAliImportStockH filtered by the chkCredit3 column
 * @method     ChildAliImportStockH findOneByChkinternet(string $chkInternet) Return the first ChildAliImportStockH filtered by the chkInternet column
 * @method     ChildAliImportStockH findOneByChkdiscount(string $chkDiscount) Return the first ChildAliImportStockH filtered by the chkDiscount column
 * @method     ChildAliImportStockH findOneByChkother(string $chkOther) Return the first ChildAliImportStockH filtered by the chkOther column
 * @method     ChildAliImportStockH findOneByTxtcash(string $txtCash) Return the first ChildAliImportStockH filtered by the txtCash column
 * @method     ChildAliImportStockH findOneByTxtfuture(string $txtFuture) Return the first ChildAliImportStockH filtered by the txtFuture column
 * @method     ChildAliImportStockH findOneByTxttransfer(string $txtTransfer) Return the first ChildAliImportStockH filtered by the txtTransfer column
 * @method     ChildAliImportStockH findOneByEwallet(string $ewallet) Return the first ChildAliImportStockH filtered by the ewallet column
 * @method     ChildAliImportStockH findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliImportStockH filtered by the txtCredit1 column
 * @method     ChildAliImportStockH findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliImportStockH filtered by the txtCredit2 column
 * @method     ChildAliImportStockH findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliImportStockH filtered by the txtCredit3 column
 * @method     ChildAliImportStockH findOneByTxtinternet(string $txtInternet) Return the first ChildAliImportStockH filtered by the txtInternet column
 * @method     ChildAliImportStockH findOneByTxtdiscount(string $txtDiscount) Return the first ChildAliImportStockH filtered by the txtDiscount column
 * @method     ChildAliImportStockH findOneByTxtother(string $txtOther) Return the first ChildAliImportStockH filtered by the txtOther column
 * @method     ChildAliImportStockH findOneByOptioncash(string $optionCash) Return the first ChildAliImportStockH filtered by the optionCash column
 * @method     ChildAliImportStockH findOneByOptionfuture(string $optionFuture) Return the first ChildAliImportStockH filtered by the optionFuture column
 * @method     ChildAliImportStockH findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliImportStockH filtered by the optionTransfer column
 * @method     ChildAliImportStockH findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliImportStockH filtered by the optionCredit1 column
 * @method     ChildAliImportStockH findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliImportStockH filtered by the optionCredit2 column
 * @method     ChildAliImportStockH findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliImportStockH filtered by the optionCredit3 column
 * @method     ChildAliImportStockH findOneByOptioninternet(string $optionInternet) Return the first ChildAliImportStockH filtered by the optionInternet column
 * @method     ChildAliImportStockH findOneByOptiondiscount(string $optionDiscount) Return the first ChildAliImportStockH filtered by the optionDiscount column
 * @method     ChildAliImportStockH findOneByOptionother(string $optionOther) Return the first ChildAliImportStockH filtered by the optionOther column
 * @method     ChildAliImportStockH findOneByDiscount(int $discount) Return the first ChildAliImportStockH filtered by the discount column
 * @method     ChildAliImportStockH findOneBySender(int $sender) Return the first ChildAliImportStockH filtered by the sender column
 * @method     ChildAliImportStockH findOneBySenderDate(string $sender_date) Return the first ChildAliImportStockH filtered by the sender_date column
 * @method     ChildAliImportStockH findOneByReceive(int $receive) Return the first ChildAliImportStockH filtered by the receive column
 * @method     ChildAliImportStockH findOneByReceiveDate(string $receive_date) Return the first ChildAliImportStockH filtered by the receive_date column
 * @method     ChildAliImportStockH findOneByPrint(int $print) Return the first ChildAliImportStockH filtered by the print column
 * @method     ChildAliImportStockH findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliImportStockH filtered by the ewallet_before column
 * @method     ChildAliImportStockH findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliImportStockH filtered by the ewallet_after column
 * @method     ChildAliImportStockH findOneByEwallettBefore(string $ewallett_before) Return the first ChildAliImportStockH filtered by the ewallett_before column
 * @method     ChildAliImportStockH findOneByEwallettAfter(string $ewallett_after) Return the first ChildAliImportStockH filtered by the ewallett_after column
 * @method     ChildAliImportStockH findOneByCancelDate(string $cancel_date) Return the first ChildAliImportStockH filtered by the cancel_date column
 * @method     ChildAliImportStockH findOneByUidCancel(string $uid_cancel) Return the first ChildAliImportStockH filtered by the uid_cancel column *

 * @method     ChildAliImportStockH requirePk($key, ConnectionInterface $con = null) Return the ChildAliImportStockH by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOne(ConnectionInterface $con = null) Return the first ChildAliImportStockH matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliImportStockH requireOneBySano(int $sano) Return the first ChildAliImportStockH filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneBySadate(string $sadate) Return the first ChildAliImportStockH filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByInvCode(string $inv_code) Return the first ChildAliImportStockH filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByInvCodeTo(string $inv_code_to) Return the first ChildAliImportStockH filtered by the inv_code_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByMcode(string $mcode) Return the first ChildAliImportStockH filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTotal(string $total) Return the first ChildAliImportStockH filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTotPv(string $tot_pv) Return the first ChildAliImportStockH filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTotBv(string $tot_bv) Return the first ChildAliImportStockH filtered by the tot_bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTotFv(string $tot_fv) Return the first ChildAliImportStockH filtered by the tot_fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByUsercode(string $usercode) Return the first ChildAliImportStockH filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByRemark(string $remark) Return the first ChildAliImportStockH filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTrnf(string $trnf) Return the first ChildAliImportStockH filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneById(int $id) Return the first ChildAliImportStockH filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneBySaType(string $sa_type) Return the first ChildAliImportStockH filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByUid(string $uid) Return the first ChildAliImportStockH filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByDl(string $dl) Return the first ChildAliImportStockH filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByCancel(int $cancel) Return the first ChildAliImportStockH filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneBySend(int $send) Return the first ChildAliImportStockH filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTxtoption(string $txtoption) Return the first ChildAliImportStockH filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByChkcash(string $chkCash) Return the first ChildAliImportStockH filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByChkfuture(string $chkFuture) Return the first ChildAliImportStockH filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByChktransfer(string $chkTransfer) Return the first ChildAliImportStockH filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliImportStockH filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliImportStockH filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliImportStockH filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByChkinternet(string $chkInternet) Return the first ChildAliImportStockH filtered by the chkInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByChkdiscount(string $chkDiscount) Return the first ChildAliImportStockH filtered by the chkDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByChkother(string $chkOther) Return the first ChildAliImportStockH filtered by the chkOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTxtcash(string $txtCash) Return the first ChildAliImportStockH filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTxtfuture(string $txtFuture) Return the first ChildAliImportStockH filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliImportStockH filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByEwallet(string $ewallet) Return the first ChildAliImportStockH filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliImportStockH filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliImportStockH filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliImportStockH filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTxtinternet(string $txtInternet) Return the first ChildAliImportStockH filtered by the txtInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTxtdiscount(string $txtDiscount) Return the first ChildAliImportStockH filtered by the txtDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByTxtother(string $txtOther) Return the first ChildAliImportStockH filtered by the txtOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByOptioncash(string $optionCash) Return the first ChildAliImportStockH filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByOptionfuture(string $optionFuture) Return the first ChildAliImportStockH filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliImportStockH filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliImportStockH filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliImportStockH filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliImportStockH filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByOptioninternet(string $optionInternet) Return the first ChildAliImportStockH filtered by the optionInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByOptiondiscount(string $optionDiscount) Return the first ChildAliImportStockH filtered by the optionDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByOptionother(string $optionOther) Return the first ChildAliImportStockH filtered by the optionOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByDiscount(int $discount) Return the first ChildAliImportStockH filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneBySender(int $sender) Return the first ChildAliImportStockH filtered by the sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneBySenderDate(string $sender_date) Return the first ChildAliImportStockH filtered by the sender_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByReceive(int $receive) Return the first ChildAliImportStockH filtered by the receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByReceiveDate(string $receive_date) Return the first ChildAliImportStockH filtered by the receive_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByPrint(int $print) Return the first ChildAliImportStockH filtered by the print column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliImportStockH filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliImportStockH filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByEwallettBefore(string $ewallett_before) Return the first ChildAliImportStockH filtered by the ewallett_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByEwallettAfter(string $ewallett_after) Return the first ChildAliImportStockH filtered by the ewallett_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByCancelDate(string $cancel_date) Return the first ChildAliImportStockH filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockH requireOneByUidCancel(string $uid_cancel) Return the first ChildAliImportStockH filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliImportStockH[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliImportStockH objects based on current ModelCriteria
 * @method     ChildAliImportStockH[]|ObjectCollection findBySano(int $sano) Return ChildAliImportStockH objects filtered by the sano column
 * @method     ChildAliImportStockH[]|ObjectCollection findBySadate(string $sadate) Return ChildAliImportStockH objects filtered by the sadate column
 * @method     ChildAliImportStockH[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliImportStockH objects filtered by the inv_code column
 * @method     ChildAliImportStockH[]|ObjectCollection findByInvCodeTo(string $inv_code_to) Return ChildAliImportStockH objects filtered by the inv_code_to column
 * @method     ChildAliImportStockH[]|ObjectCollection findByMcode(string $mcode) Return ChildAliImportStockH objects filtered by the mcode column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTotal(string $total) Return ChildAliImportStockH objects filtered by the total column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliImportStockH objects filtered by the tot_pv column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTotBv(string $tot_bv) Return ChildAliImportStockH objects filtered by the tot_bv column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTotFv(string $tot_fv) Return ChildAliImportStockH objects filtered by the tot_fv column
 * @method     ChildAliImportStockH[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliImportStockH objects filtered by the usercode column
 * @method     ChildAliImportStockH[]|ObjectCollection findByRemark(string $remark) Return ChildAliImportStockH objects filtered by the remark column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTrnf(string $trnf) Return ChildAliImportStockH objects filtered by the trnf column
 * @method     ChildAliImportStockH[]|ObjectCollection findById(int $id) Return ChildAliImportStockH objects filtered by the id column
 * @method     ChildAliImportStockH[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliImportStockH objects filtered by the sa_type column
 * @method     ChildAliImportStockH[]|ObjectCollection findByUid(string $uid) Return ChildAliImportStockH objects filtered by the uid column
 * @method     ChildAliImportStockH[]|ObjectCollection findByDl(string $dl) Return ChildAliImportStockH objects filtered by the dl column
 * @method     ChildAliImportStockH[]|ObjectCollection findByCancel(int $cancel) Return ChildAliImportStockH objects filtered by the cancel column
 * @method     ChildAliImportStockH[]|ObjectCollection findBySend(int $send) Return ChildAliImportStockH objects filtered by the send column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliImportStockH objects filtered by the txtoption column
 * @method     ChildAliImportStockH[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliImportStockH objects filtered by the chkCash column
 * @method     ChildAliImportStockH[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliImportStockH objects filtered by the chkFuture column
 * @method     ChildAliImportStockH[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliImportStockH objects filtered by the chkTransfer column
 * @method     ChildAliImportStockH[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliImportStockH objects filtered by the chkCredit1 column
 * @method     ChildAliImportStockH[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliImportStockH objects filtered by the chkCredit2 column
 * @method     ChildAliImportStockH[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliImportStockH objects filtered by the chkCredit3 column
 * @method     ChildAliImportStockH[]|ObjectCollection findByChkinternet(string $chkInternet) Return ChildAliImportStockH objects filtered by the chkInternet column
 * @method     ChildAliImportStockH[]|ObjectCollection findByChkdiscount(string $chkDiscount) Return ChildAliImportStockH objects filtered by the chkDiscount column
 * @method     ChildAliImportStockH[]|ObjectCollection findByChkother(string $chkOther) Return ChildAliImportStockH objects filtered by the chkOther column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliImportStockH objects filtered by the txtCash column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliImportStockH objects filtered by the txtFuture column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliImportStockH objects filtered by the txtTransfer column
 * @method     ChildAliImportStockH[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliImportStockH objects filtered by the ewallet column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliImportStockH objects filtered by the txtCredit1 column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliImportStockH objects filtered by the txtCredit2 column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliImportStockH objects filtered by the txtCredit3 column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTxtinternet(string $txtInternet) Return ChildAliImportStockH objects filtered by the txtInternet column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTxtdiscount(string $txtDiscount) Return ChildAliImportStockH objects filtered by the txtDiscount column
 * @method     ChildAliImportStockH[]|ObjectCollection findByTxtother(string $txtOther) Return ChildAliImportStockH objects filtered by the txtOther column
 * @method     ChildAliImportStockH[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliImportStockH objects filtered by the optionCash column
 * @method     ChildAliImportStockH[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliImportStockH objects filtered by the optionFuture column
 * @method     ChildAliImportStockH[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliImportStockH objects filtered by the optionTransfer column
 * @method     ChildAliImportStockH[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliImportStockH objects filtered by the optionCredit1 column
 * @method     ChildAliImportStockH[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliImportStockH objects filtered by the optionCredit2 column
 * @method     ChildAliImportStockH[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliImportStockH objects filtered by the optionCredit3 column
 * @method     ChildAliImportStockH[]|ObjectCollection findByOptioninternet(string $optionInternet) Return ChildAliImportStockH objects filtered by the optionInternet column
 * @method     ChildAliImportStockH[]|ObjectCollection findByOptiondiscount(string $optionDiscount) Return ChildAliImportStockH objects filtered by the optionDiscount column
 * @method     ChildAliImportStockH[]|ObjectCollection findByOptionother(string $optionOther) Return ChildAliImportStockH objects filtered by the optionOther column
 * @method     ChildAliImportStockH[]|ObjectCollection findByDiscount(int $discount) Return ChildAliImportStockH objects filtered by the discount column
 * @method     ChildAliImportStockH[]|ObjectCollection findBySender(int $sender) Return ChildAliImportStockH objects filtered by the sender column
 * @method     ChildAliImportStockH[]|ObjectCollection findBySenderDate(string $sender_date) Return ChildAliImportStockH objects filtered by the sender_date column
 * @method     ChildAliImportStockH[]|ObjectCollection findByReceive(int $receive) Return ChildAliImportStockH objects filtered by the receive column
 * @method     ChildAliImportStockH[]|ObjectCollection findByReceiveDate(string $receive_date) Return ChildAliImportStockH objects filtered by the receive_date column
 * @method     ChildAliImportStockH[]|ObjectCollection findByPrint(int $print) Return ChildAliImportStockH objects filtered by the print column
 * @method     ChildAliImportStockH[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliImportStockH objects filtered by the ewallet_before column
 * @method     ChildAliImportStockH[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliImportStockH objects filtered by the ewallet_after column
 * @method     ChildAliImportStockH[]|ObjectCollection findByEwallettBefore(string $ewallett_before) Return ChildAliImportStockH objects filtered by the ewallett_before column
 * @method     ChildAliImportStockH[]|ObjectCollection findByEwallettAfter(string $ewallett_after) Return ChildAliImportStockH objects filtered by the ewallett_after column
 * @method     ChildAliImportStockH[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliImportStockH objects filtered by the cancel_date column
 * @method     ChildAliImportStockH[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliImportStockH objects filtered by the uid_cancel column
 * @method     ChildAliImportStockH[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliImportStockHQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliImportStockHQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliImportStockH', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliImportStockHQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliImportStockHQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliImportStockHQuery) {
            return $criteria;
        }
        $query = new ChildAliImportStockHQuery();
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
     * @return ChildAliImportStockH|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliImportStockHTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliImportStockHTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliImportStockH A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, sadate, inv_code, inv_code_to, mcode, total, tot_pv, tot_bv, tot_fv, usercode, remark, trnf, id, sa_type, uid, dl, cancel, send, txtoption, chkCash, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkInternet, chkDiscount, chkOther, txtCash, txtFuture, txtTransfer, ewallet, txtCredit1, txtCredit2, txtCredit3, txtInternet, txtDiscount, txtOther, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionInternet, optionDiscount, optionOther, discount, sender, sender_date, receive, receive_date, print, ewallet_before, ewallet_after, ewallett_before, ewallett_after, cancel_date, uid_cancel FROM ali_import_stock_h WHERE id = :p0';
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
            /** @var ChildAliImportStockH $obj */
            $obj = new ChildAliImportStockH();
            $obj->hydrate($row);
            AliImportStockHTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliImportStockH|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliImportStockHTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliImportStockHTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (is_array($sano)) {
            $useMinMax = false;
            if (isset($sano['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_SANO, $sano['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sano['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_SANO, $sano['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Filter the query on the inv_code_to column
     *
     * Example usage:
     * <code>
     * $query->filterByInvCodeTo('fooValue');   // WHERE inv_code_to = 'fooValue'
     * $query->filterByInvCodeTo('%fooValue%', Criteria::LIKE); // WHERE inv_code_to LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invCodeTo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByInvCodeTo($invCodeTo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCodeTo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_INV_CODE_TO, $invCodeTo, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TOT_PV, $totPv, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTotBv($totBv = null, $comparison = null)
    {
        if (is_array($totBv)) {
            $useMinMax = false;
            if (isset($totBv['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_TOT_BV, $totBv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totBv['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_TOT_BV, $totBv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TOT_BV, $totBv, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTotFv($totFv = null, $comparison = null)
    {
        if (is_array($totFv)) {
            $useMinMax = false;
            if (isset($totFv['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_TOT_FV, $totFv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totFv['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_TOT_FV, $totFv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TOT_FV, $totFv, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trnf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_SEND, $send, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByChkinternet($chkinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_CHKINTERNET, $chkinternet, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByChkdiscount($chkdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_CHKDISCOUNT, $chkdiscount, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByChkother($chkother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_CHKOTHER, $chkother, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txttransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTxtinternet($txtinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TXTINTERNET, $txtinternet, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTxtdiscount($txtdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TXTDISCOUNT, $txtdiscount, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByTxtother($txtother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_TXTOTHER, $txtother, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByOptioninternet($optioninternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioninternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_OPTIONINTERNET, $optioninternet, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByOptiondiscount($optiondiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiondiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_OPTIONDISCOUNT, $optiondiscount, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByOptionother($optionother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_OPTIONOTHER, $optionother, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByDiscount($discount = null, $comparison = null)
    {
        if (is_array($discount)) {
            $useMinMax = false;
            if (isset($discount['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_DISCOUNT, $discount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($discount['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_DISCOUNT, $discount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_DISCOUNT, $discount, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterBySender($sender = null, $comparison = null)
    {
        if (is_array($sender)) {
            $useMinMax = false;
            if (isset($sender['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_SENDER, $sender['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sender['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_SENDER, $sender['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_SENDER, $sender, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterBySenderDate($senderDate = null, $comparison = null)
    {
        if (is_array($senderDate)) {
            $useMinMax = false;
            if (isset($senderDate['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_SENDER_DATE, $senderDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($senderDate['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_SENDER_DATE, $senderDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_SENDER_DATE, $senderDate, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByReceive($receive = null, $comparison = null)
    {
        if (is_array($receive)) {
            $useMinMax = false;
            if (isset($receive['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_RECEIVE, $receive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receive['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_RECEIVE, $receive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_RECEIVE, $receive, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByReceiveDate($receiveDate = null, $comparison = null)
    {
        if (is_array($receiveDate)) {
            $useMinMax = false;
            if (isset($receiveDate['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_RECEIVE_DATE, $receiveDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiveDate['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_RECEIVE_DATE, $receiveDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_RECEIVE_DATE, $receiveDate, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByPrint($print = null, $comparison = null)
    {
        if (is_array($print)) {
            $useMinMax = false;
            if (isset($print['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_PRINT, $print['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($print['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_PRINT, $print['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_PRINT, $print, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByEwallettBefore($ewallettBefore = null, $comparison = null)
    {
        if (is_array($ewallettBefore)) {
            $useMinMax = false;
            if (isset($ewallettBefore['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLETT_BEFORE, $ewallettBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallettBefore['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLETT_BEFORE, $ewallettBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLETT_BEFORE, $ewallettBefore, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByEwallettAfter($ewallettAfter = null, $comparison = null)
    {
        if (is_array($ewallettAfter)) {
            $useMinMax = false;
            if (isset($ewallettAfter['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLETT_AFTER, $ewallettAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallettAfter['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLETT_AFTER, $ewallettAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_EWALLETT_AFTER, $ewallettAfter, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliImportStockHTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
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
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockHTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliImportStockH $aliImportStockH Object to remove from the list of results
     *
     * @return $this|ChildAliImportStockHQuery The current query, for fluid interface
     */
    public function prune($aliImportStockH = null)
    {
        if ($aliImportStockH) {
            $this->addUsingAlias(AliImportStockHTableMap::COL_ID, $aliImportStockH->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_import_stock_h table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliImportStockHTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliImportStockHTableMap::clearInstancePool();
            AliImportStockHTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliImportStockHTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliImportStockHTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliImportStockHTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliImportStockHTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliImportStockHQuery
