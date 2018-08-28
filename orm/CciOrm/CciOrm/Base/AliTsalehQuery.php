<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTsaleh as ChildAliTsaleh;
use CciOrm\CciOrm\AliTsalehQuery as ChildAliTsalehQuery;
use CciOrm\CciOrm\Map\AliTsalehTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_tsaleh' table.
 *
 *
 *
 * @method     ChildAliTsalehQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliTsalehQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliTsalehQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliTsalehQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliTsalehQuery orderBySctime($order = Criteria::ASC) Order by the sctime column
 * @method     ChildAliTsalehQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliTsalehQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliTsalehQuery orderByInvFrom($order = Criteria::ASC) Order by the inv_from column
 * @method     ChildAliTsalehQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliTsalehQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliTsalehQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliTsalehQuery orderByTotBv($order = Criteria::ASC) Order by the tot_bv column
 * @method     ChildAliTsalehQuery orderByTotFv($order = Criteria::ASC) Order by the tot_fv column
 * @method     ChildAliTsalehQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliTsalehQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliTsalehQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliTsalehQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliTsalehQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliTsalehQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliTsalehQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliTsalehQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliTsalehQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliTsalehQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliTsalehQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliTsalehQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliTsalehQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliTsalehQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliTsalehQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliTsalehQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliTsalehQuery orderByChkinternet($order = Criteria::ASC) Order by the chkInternet column
 * @method     ChildAliTsalehQuery orderByChkdiscount($order = Criteria::ASC) Order by the chkDiscount column
 * @method     ChildAliTsalehQuery orderByChkother($order = Criteria::ASC) Order by the chkOther column
 * @method     ChildAliTsalehQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliTsalehQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliTsalehQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliTsalehQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliTsalehQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliTsalehQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliTsalehQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliTsalehQuery orderByTxtinternet($order = Criteria::ASC) Order by the txtInternet column
 * @method     ChildAliTsalehQuery orderByTxtdiscount($order = Criteria::ASC) Order by the txtDiscount column
 * @method     ChildAliTsalehQuery orderByTxtother($order = Criteria::ASC) Order by the txtOther column
 * @method     ChildAliTsalehQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliTsalehQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliTsalehQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliTsalehQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliTsalehQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliTsalehQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliTsalehQuery orderByOptioninternet($order = Criteria::ASC) Order by the optionInternet column
 * @method     ChildAliTsalehQuery orderByOptiondiscount($order = Criteria::ASC) Order by the optionDiscount column
 * @method     ChildAliTsalehQuery orderByOptionother($order = Criteria::ASC) Order by the optionOther column
 * @method     ChildAliTsalehQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildAliTsalehQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method     ChildAliTsalehQuery orderBySenderDate($order = Criteria::ASC) Order by the sender_date column
 * @method     ChildAliTsalehQuery orderByReceive($order = Criteria::ASC) Order by the receive column
 * @method     ChildAliTsalehQuery orderByReceiveDate($order = Criteria::ASC) Order by the receive_date column
 * @method     ChildAliTsalehQuery orderByPrint($order = Criteria::ASC) Order by the print column
 * @method     ChildAliTsalehQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliTsalehQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliTsalehQuery orderByEwallettBefore($order = Criteria::ASC) Order by the ewallett_before column
 * @method     ChildAliTsalehQuery orderByEwallettAfter($order = Criteria::ASC) Order by the ewallett_after column
 * @method     ChildAliTsalehQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliTsalehQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 * @method     ChildAliTsalehQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliTsalehQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliTsalehQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliTsalehQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliTsalehQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliTsalehQuery orderByUidReceive($order = Criteria::ASC) Order by the uid_receive column
 * @method     ChildAliTsalehQuery orderByUidSender($order = Criteria::ASC) Order by the uid_sender column
 * @method     ChildAliTsalehQuery orderByCaddress($order = Criteria::ASC) Order by the caddress column
 * @method     ChildAliTsalehQuery orderByCdistrictid($order = Criteria::ASC) Order by the cdistrictId column
 * @method     ChildAliTsalehQuery orderByCamphurid($order = Criteria::ASC) Order by the camphurId column
 * @method     ChildAliTsalehQuery orderByCprovinceid($order = Criteria::ASC) Order by the cprovinceId column
 * @method     ChildAliTsalehQuery orderByCzip($order = Criteria::ASC) Order by the czip column
 * @method     ChildAliTsalehQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildAliTsalehQuery groupBySano() Group by the sano column
 * @method     ChildAliTsalehQuery groupByNameF() Group by the name_f column
 * @method     ChildAliTsalehQuery groupByNameT() Group by the name_t column
 * @method     ChildAliTsalehQuery groupBySadate() Group by the sadate column
 * @method     ChildAliTsalehQuery groupBySctime() Group by the sctime column
 * @method     ChildAliTsalehQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliTsalehQuery groupByLid() Group by the lid column
 * @method     ChildAliTsalehQuery groupByInvFrom() Group by the inv_from column
 * @method     ChildAliTsalehQuery groupByMcode() Group by the mcode column
 * @method     ChildAliTsalehQuery groupByTotal() Group by the total column
 * @method     ChildAliTsalehQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliTsalehQuery groupByTotBv() Group by the tot_bv column
 * @method     ChildAliTsalehQuery groupByTotFv() Group by the tot_fv column
 * @method     ChildAliTsalehQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliTsalehQuery groupByRemark() Group by the remark column
 * @method     ChildAliTsalehQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliTsalehQuery groupById() Group by the id column
 * @method     ChildAliTsalehQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliTsalehQuery groupByUid() Group by the uid column
 * @method     ChildAliTsalehQuery groupByDl() Group by the dl column
 * @method     ChildAliTsalehQuery groupByCancel() Group by the cancel column
 * @method     ChildAliTsalehQuery groupBySend() Group by the send column
 * @method     ChildAliTsalehQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliTsalehQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliTsalehQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliTsalehQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliTsalehQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliTsalehQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliTsalehQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliTsalehQuery groupByChkinternet() Group by the chkInternet column
 * @method     ChildAliTsalehQuery groupByChkdiscount() Group by the chkDiscount column
 * @method     ChildAliTsalehQuery groupByChkother() Group by the chkOther column
 * @method     ChildAliTsalehQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliTsalehQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliTsalehQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliTsalehQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliTsalehQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliTsalehQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliTsalehQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliTsalehQuery groupByTxtinternet() Group by the txtInternet column
 * @method     ChildAliTsalehQuery groupByTxtdiscount() Group by the txtDiscount column
 * @method     ChildAliTsalehQuery groupByTxtother() Group by the txtOther column
 * @method     ChildAliTsalehQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliTsalehQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliTsalehQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliTsalehQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliTsalehQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliTsalehQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliTsalehQuery groupByOptioninternet() Group by the optionInternet column
 * @method     ChildAliTsalehQuery groupByOptiondiscount() Group by the optionDiscount column
 * @method     ChildAliTsalehQuery groupByOptionother() Group by the optionOther column
 * @method     ChildAliTsalehQuery groupByDiscount() Group by the discount column
 * @method     ChildAliTsalehQuery groupBySender() Group by the sender column
 * @method     ChildAliTsalehQuery groupBySenderDate() Group by the sender_date column
 * @method     ChildAliTsalehQuery groupByReceive() Group by the receive column
 * @method     ChildAliTsalehQuery groupByReceiveDate() Group by the receive_date column
 * @method     ChildAliTsalehQuery groupByPrint() Group by the print column
 * @method     ChildAliTsalehQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliTsalehQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliTsalehQuery groupByEwallettBefore() Group by the ewallett_before column
 * @method     ChildAliTsalehQuery groupByEwallettAfter() Group by the ewallett_after column
 * @method     ChildAliTsalehQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliTsalehQuery groupByUidCancel() Group by the uid_cancel column
 * @method     ChildAliTsalehQuery groupByMbase() Group by the mbase column
 * @method     ChildAliTsalehQuery groupByBprice() Group by the bprice column
 * @method     ChildAliTsalehQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliTsalehQuery groupByCrate() Group by the crate column
 * @method     ChildAliTsalehQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliTsalehQuery groupByUidReceive() Group by the uid_receive column
 * @method     ChildAliTsalehQuery groupByUidSender() Group by the uid_sender column
 * @method     ChildAliTsalehQuery groupByCaddress() Group by the caddress column
 * @method     ChildAliTsalehQuery groupByCdistrictid() Group by the cdistrictId column
 * @method     ChildAliTsalehQuery groupByCamphurid() Group by the camphurId column
 * @method     ChildAliTsalehQuery groupByCprovinceid() Group by the cprovinceId column
 * @method     ChildAliTsalehQuery groupByCzip() Group by the czip column
 * @method     ChildAliTsalehQuery groupByStatus() Group by the status column
 *
 * @method     ChildAliTsalehQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliTsalehQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliTsalehQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliTsalehQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliTsalehQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliTsalehQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliTsaleh findOne(ConnectionInterface $con = null) Return the first ChildAliTsaleh matching the query
 * @method     ChildAliTsaleh findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliTsaleh matching the query, or a new ChildAliTsaleh object populated from the query conditions when no match is found
 *
 * @method     ChildAliTsaleh findOneBySano(string $sano) Return the first ChildAliTsaleh filtered by the sano column
 * @method     ChildAliTsaleh findOneByNameF(string $name_f) Return the first ChildAliTsaleh filtered by the name_f column
 * @method     ChildAliTsaleh findOneByNameT(string $name_t) Return the first ChildAliTsaleh filtered by the name_t column
 * @method     ChildAliTsaleh findOneBySadate(string $sadate) Return the first ChildAliTsaleh filtered by the sadate column
 * @method     ChildAliTsaleh findOneBySctime(string $sctime) Return the first ChildAliTsaleh filtered by the sctime column
 * @method     ChildAliTsaleh findOneByInvCode(string $inv_code) Return the first ChildAliTsaleh filtered by the inv_code column
 * @method     ChildAliTsaleh findOneByLid(string $lid) Return the first ChildAliTsaleh filtered by the lid column
 * @method     ChildAliTsaleh findOneByInvFrom(string $inv_from) Return the first ChildAliTsaleh filtered by the inv_from column
 * @method     ChildAliTsaleh findOneByMcode(string $mcode) Return the first ChildAliTsaleh filtered by the mcode column
 * @method     ChildAliTsaleh findOneByTotal(string $total) Return the first ChildAliTsaleh filtered by the total column
 * @method     ChildAliTsaleh findOneByTotPv(string $tot_pv) Return the first ChildAliTsaleh filtered by the tot_pv column
 * @method     ChildAliTsaleh findOneByTotBv(string $tot_bv) Return the first ChildAliTsaleh filtered by the tot_bv column
 * @method     ChildAliTsaleh findOneByTotFv(string $tot_fv) Return the first ChildAliTsaleh filtered by the tot_fv column
 * @method     ChildAliTsaleh findOneByUsercode(string $usercode) Return the first ChildAliTsaleh filtered by the usercode column
 * @method     ChildAliTsaleh findOneByRemark(string $remark) Return the first ChildAliTsaleh filtered by the remark column
 * @method     ChildAliTsaleh findOneByTrnf(string $trnf) Return the first ChildAliTsaleh filtered by the trnf column
 * @method     ChildAliTsaleh findOneById(int $id) Return the first ChildAliTsaleh filtered by the id column
 * @method     ChildAliTsaleh findOneBySaType(string $sa_type) Return the first ChildAliTsaleh filtered by the sa_type column
 * @method     ChildAliTsaleh findOneByUid(string $uid) Return the first ChildAliTsaleh filtered by the uid column
 * @method     ChildAliTsaleh findOneByDl(string $dl) Return the first ChildAliTsaleh filtered by the dl column
 * @method     ChildAliTsaleh findOneByCancel(int $cancel) Return the first ChildAliTsaleh filtered by the cancel column
 * @method     ChildAliTsaleh findOneBySend(int $send) Return the first ChildAliTsaleh filtered by the send column
 * @method     ChildAliTsaleh findOneByTxtoption(string $txtoption) Return the first ChildAliTsaleh filtered by the txtoption column
 * @method     ChildAliTsaleh findOneByChkcash(string $chkCash) Return the first ChildAliTsaleh filtered by the chkCash column
 * @method     ChildAliTsaleh findOneByChkfuture(string $chkFuture) Return the first ChildAliTsaleh filtered by the chkFuture column
 * @method     ChildAliTsaleh findOneByChktransfer(string $chkTransfer) Return the first ChildAliTsaleh filtered by the chkTransfer column
 * @method     ChildAliTsaleh findOneByChkcredit1(string $chkCredit1) Return the first ChildAliTsaleh filtered by the chkCredit1 column
 * @method     ChildAliTsaleh findOneByChkcredit2(string $chkCredit2) Return the first ChildAliTsaleh filtered by the chkCredit2 column
 * @method     ChildAliTsaleh findOneByChkcredit3(string $chkCredit3) Return the first ChildAliTsaleh filtered by the chkCredit3 column
 * @method     ChildAliTsaleh findOneByChkinternet(string $chkInternet) Return the first ChildAliTsaleh filtered by the chkInternet column
 * @method     ChildAliTsaleh findOneByChkdiscount(string $chkDiscount) Return the first ChildAliTsaleh filtered by the chkDiscount column
 * @method     ChildAliTsaleh findOneByChkother(string $chkOther) Return the first ChildAliTsaleh filtered by the chkOther column
 * @method     ChildAliTsaleh findOneByTxtcash(string $txtCash) Return the first ChildAliTsaleh filtered by the txtCash column
 * @method     ChildAliTsaleh findOneByTxtfuture(string $txtFuture) Return the first ChildAliTsaleh filtered by the txtFuture column
 * @method     ChildAliTsaleh findOneByTxttransfer(string $txtTransfer) Return the first ChildAliTsaleh filtered by the txtTransfer column
 * @method     ChildAliTsaleh findOneByEwallet(string $ewallet) Return the first ChildAliTsaleh filtered by the ewallet column
 * @method     ChildAliTsaleh findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliTsaleh filtered by the txtCredit1 column
 * @method     ChildAliTsaleh findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliTsaleh filtered by the txtCredit2 column
 * @method     ChildAliTsaleh findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliTsaleh filtered by the txtCredit3 column
 * @method     ChildAliTsaleh findOneByTxtinternet(string $txtInternet) Return the first ChildAliTsaleh filtered by the txtInternet column
 * @method     ChildAliTsaleh findOneByTxtdiscount(string $txtDiscount) Return the first ChildAliTsaleh filtered by the txtDiscount column
 * @method     ChildAliTsaleh findOneByTxtother(string $txtOther) Return the first ChildAliTsaleh filtered by the txtOther column
 * @method     ChildAliTsaleh findOneByOptioncash(string $optionCash) Return the first ChildAliTsaleh filtered by the optionCash column
 * @method     ChildAliTsaleh findOneByOptionfuture(string $optionFuture) Return the first ChildAliTsaleh filtered by the optionFuture column
 * @method     ChildAliTsaleh findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliTsaleh filtered by the optionTransfer column
 * @method     ChildAliTsaleh findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliTsaleh filtered by the optionCredit1 column
 * @method     ChildAliTsaleh findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliTsaleh filtered by the optionCredit2 column
 * @method     ChildAliTsaleh findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliTsaleh filtered by the optionCredit3 column
 * @method     ChildAliTsaleh findOneByOptioninternet(string $optionInternet) Return the first ChildAliTsaleh filtered by the optionInternet column
 * @method     ChildAliTsaleh findOneByOptiondiscount(string $optionDiscount) Return the first ChildAliTsaleh filtered by the optionDiscount column
 * @method     ChildAliTsaleh findOneByOptionother(string $optionOther) Return the first ChildAliTsaleh filtered by the optionOther column
 * @method     ChildAliTsaleh findOneByDiscount(int $discount) Return the first ChildAliTsaleh filtered by the discount column
 * @method     ChildAliTsaleh findOneBySender(int $sender) Return the first ChildAliTsaleh filtered by the sender column
 * @method     ChildAliTsaleh findOneBySenderDate(string $sender_date) Return the first ChildAliTsaleh filtered by the sender_date column
 * @method     ChildAliTsaleh findOneByReceive(int $receive) Return the first ChildAliTsaleh filtered by the receive column
 * @method     ChildAliTsaleh findOneByReceiveDate(string $receive_date) Return the first ChildAliTsaleh filtered by the receive_date column
 * @method     ChildAliTsaleh findOneByPrint(int $print) Return the first ChildAliTsaleh filtered by the print column
 * @method     ChildAliTsaleh findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliTsaleh filtered by the ewallet_before column
 * @method     ChildAliTsaleh findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliTsaleh filtered by the ewallet_after column
 * @method     ChildAliTsaleh findOneByEwallettBefore(string $ewallett_before) Return the first ChildAliTsaleh filtered by the ewallett_before column
 * @method     ChildAliTsaleh findOneByEwallettAfter(string $ewallett_after) Return the first ChildAliTsaleh filtered by the ewallett_after column
 * @method     ChildAliTsaleh findOneByCancelDate(string $cancel_date) Return the first ChildAliTsaleh filtered by the cancel_date column
 * @method     ChildAliTsaleh findOneByUidCancel(string $uid_cancel) Return the first ChildAliTsaleh filtered by the uid_cancel column
 * @method     ChildAliTsaleh findOneByMbase(string $mbase) Return the first ChildAliTsaleh filtered by the mbase column
 * @method     ChildAliTsaleh findOneByBprice(string $bprice) Return the first ChildAliTsaleh filtered by the bprice column
 * @method     ChildAliTsaleh findOneByLocationbase(int $locationbase) Return the first ChildAliTsaleh filtered by the locationbase column
 * @method     ChildAliTsaleh findOneByCrate(string $crate) Return the first ChildAliTsaleh filtered by the crate column
 * @method     ChildAliTsaleh findOneByCheckportal(int $checkportal) Return the first ChildAliTsaleh filtered by the checkportal column
 * @method     ChildAliTsaleh findOneByUidReceive(string $uid_receive) Return the first ChildAliTsaleh filtered by the uid_receive column
 * @method     ChildAliTsaleh findOneByUidSender(string $uid_sender) Return the first ChildAliTsaleh filtered by the uid_sender column
 * @method     ChildAliTsaleh findOneByCaddress(string $caddress) Return the first ChildAliTsaleh filtered by the caddress column
 * @method     ChildAliTsaleh findOneByCdistrictid(string $cdistrictId) Return the first ChildAliTsaleh filtered by the cdistrictId column
 * @method     ChildAliTsaleh findOneByCamphurid(string $camphurId) Return the first ChildAliTsaleh filtered by the camphurId column
 * @method     ChildAliTsaleh findOneByCprovinceid(string $cprovinceId) Return the first ChildAliTsaleh filtered by the cprovinceId column
 * @method     ChildAliTsaleh findOneByCzip(string $czip) Return the first ChildAliTsaleh filtered by the czip column
 * @method     ChildAliTsaleh findOneByStatus(int $status) Return the first ChildAliTsaleh filtered by the status column *

 * @method     ChildAliTsaleh requirePk($key, ConnectionInterface $con = null) Return the ChildAliTsaleh by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOne(ConnectionInterface $con = null) Return the first ChildAliTsaleh matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTsaleh requireOneBySano(string $sano) Return the first ChildAliTsaleh filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByNameF(string $name_f) Return the first ChildAliTsaleh filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByNameT(string $name_t) Return the first ChildAliTsaleh filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneBySadate(string $sadate) Return the first ChildAliTsaleh filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneBySctime(string $sctime) Return the first ChildAliTsaleh filtered by the sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByInvCode(string $inv_code) Return the first ChildAliTsaleh filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByLid(string $lid) Return the first ChildAliTsaleh filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByInvFrom(string $inv_from) Return the first ChildAliTsaleh filtered by the inv_from column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByMcode(string $mcode) Return the first ChildAliTsaleh filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTotal(string $total) Return the first ChildAliTsaleh filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTotPv(string $tot_pv) Return the first ChildAliTsaleh filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTotBv(string $tot_bv) Return the first ChildAliTsaleh filtered by the tot_bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTotFv(string $tot_fv) Return the first ChildAliTsaleh filtered by the tot_fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByUsercode(string $usercode) Return the first ChildAliTsaleh filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByRemark(string $remark) Return the first ChildAliTsaleh filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTrnf(string $trnf) Return the first ChildAliTsaleh filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneById(int $id) Return the first ChildAliTsaleh filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneBySaType(string $sa_type) Return the first ChildAliTsaleh filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByUid(string $uid) Return the first ChildAliTsaleh filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByDl(string $dl) Return the first ChildAliTsaleh filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByCancel(int $cancel) Return the first ChildAliTsaleh filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneBySend(int $send) Return the first ChildAliTsaleh filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTxtoption(string $txtoption) Return the first ChildAliTsaleh filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByChkcash(string $chkCash) Return the first ChildAliTsaleh filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByChkfuture(string $chkFuture) Return the first ChildAliTsaleh filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByChktransfer(string $chkTransfer) Return the first ChildAliTsaleh filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliTsaleh filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliTsaleh filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliTsaleh filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByChkinternet(string $chkInternet) Return the first ChildAliTsaleh filtered by the chkInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByChkdiscount(string $chkDiscount) Return the first ChildAliTsaleh filtered by the chkDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByChkother(string $chkOther) Return the first ChildAliTsaleh filtered by the chkOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTxtcash(string $txtCash) Return the first ChildAliTsaleh filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTxtfuture(string $txtFuture) Return the first ChildAliTsaleh filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliTsaleh filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByEwallet(string $ewallet) Return the first ChildAliTsaleh filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliTsaleh filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliTsaleh filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliTsaleh filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTxtinternet(string $txtInternet) Return the first ChildAliTsaleh filtered by the txtInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTxtdiscount(string $txtDiscount) Return the first ChildAliTsaleh filtered by the txtDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByTxtother(string $txtOther) Return the first ChildAliTsaleh filtered by the txtOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByOptioncash(string $optionCash) Return the first ChildAliTsaleh filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByOptionfuture(string $optionFuture) Return the first ChildAliTsaleh filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliTsaleh filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliTsaleh filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliTsaleh filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliTsaleh filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByOptioninternet(string $optionInternet) Return the first ChildAliTsaleh filtered by the optionInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByOptiondiscount(string $optionDiscount) Return the first ChildAliTsaleh filtered by the optionDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByOptionother(string $optionOther) Return the first ChildAliTsaleh filtered by the optionOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByDiscount(int $discount) Return the first ChildAliTsaleh filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneBySender(int $sender) Return the first ChildAliTsaleh filtered by the sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneBySenderDate(string $sender_date) Return the first ChildAliTsaleh filtered by the sender_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByReceive(int $receive) Return the first ChildAliTsaleh filtered by the receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByReceiveDate(string $receive_date) Return the first ChildAliTsaleh filtered by the receive_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByPrint(int $print) Return the first ChildAliTsaleh filtered by the print column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliTsaleh filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliTsaleh filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByEwallettBefore(string $ewallett_before) Return the first ChildAliTsaleh filtered by the ewallett_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByEwallettAfter(string $ewallett_after) Return the first ChildAliTsaleh filtered by the ewallett_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByCancelDate(string $cancel_date) Return the first ChildAliTsaleh filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByUidCancel(string $uid_cancel) Return the first ChildAliTsaleh filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByMbase(string $mbase) Return the first ChildAliTsaleh filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByBprice(string $bprice) Return the first ChildAliTsaleh filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByLocationbase(int $locationbase) Return the first ChildAliTsaleh filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByCrate(string $crate) Return the first ChildAliTsaleh filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByCheckportal(int $checkportal) Return the first ChildAliTsaleh filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByUidReceive(string $uid_receive) Return the first ChildAliTsaleh filtered by the uid_receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByUidSender(string $uid_sender) Return the first ChildAliTsaleh filtered by the uid_sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByCaddress(string $caddress) Return the first ChildAliTsaleh filtered by the caddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByCdistrictid(string $cdistrictId) Return the first ChildAliTsaleh filtered by the cdistrictId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByCamphurid(string $camphurId) Return the first ChildAliTsaleh filtered by the camphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByCprovinceid(string $cprovinceId) Return the first ChildAliTsaleh filtered by the cprovinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByCzip(string $czip) Return the first ChildAliTsaleh filtered by the czip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTsaleh requireOneByStatus(int $status) Return the first ChildAliTsaleh filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTsaleh[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliTsaleh objects based on current ModelCriteria
 * @method     ChildAliTsaleh[]|ObjectCollection findBySano(string $sano) Return ChildAliTsaleh objects filtered by the sano column
 * @method     ChildAliTsaleh[]|ObjectCollection findByNameF(string $name_f) Return ChildAliTsaleh objects filtered by the name_f column
 * @method     ChildAliTsaleh[]|ObjectCollection findByNameT(string $name_t) Return ChildAliTsaleh objects filtered by the name_t column
 * @method     ChildAliTsaleh[]|ObjectCollection findBySadate(string $sadate) Return ChildAliTsaleh objects filtered by the sadate column
 * @method     ChildAliTsaleh[]|ObjectCollection findBySctime(string $sctime) Return ChildAliTsaleh objects filtered by the sctime column
 * @method     ChildAliTsaleh[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliTsaleh objects filtered by the inv_code column
 * @method     ChildAliTsaleh[]|ObjectCollection findByLid(string $lid) Return ChildAliTsaleh objects filtered by the lid column
 * @method     ChildAliTsaleh[]|ObjectCollection findByInvFrom(string $inv_from) Return ChildAliTsaleh objects filtered by the inv_from column
 * @method     ChildAliTsaleh[]|ObjectCollection findByMcode(string $mcode) Return ChildAliTsaleh objects filtered by the mcode column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTotal(string $total) Return ChildAliTsaleh objects filtered by the total column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliTsaleh objects filtered by the tot_pv column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTotBv(string $tot_bv) Return ChildAliTsaleh objects filtered by the tot_bv column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTotFv(string $tot_fv) Return ChildAliTsaleh objects filtered by the tot_fv column
 * @method     ChildAliTsaleh[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliTsaleh objects filtered by the usercode column
 * @method     ChildAliTsaleh[]|ObjectCollection findByRemark(string $remark) Return ChildAliTsaleh objects filtered by the remark column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTrnf(string $trnf) Return ChildAliTsaleh objects filtered by the trnf column
 * @method     ChildAliTsaleh[]|ObjectCollection findById(int $id) Return ChildAliTsaleh objects filtered by the id column
 * @method     ChildAliTsaleh[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliTsaleh objects filtered by the sa_type column
 * @method     ChildAliTsaleh[]|ObjectCollection findByUid(string $uid) Return ChildAliTsaleh objects filtered by the uid column
 * @method     ChildAliTsaleh[]|ObjectCollection findByDl(string $dl) Return ChildAliTsaleh objects filtered by the dl column
 * @method     ChildAliTsaleh[]|ObjectCollection findByCancel(int $cancel) Return ChildAliTsaleh objects filtered by the cancel column
 * @method     ChildAliTsaleh[]|ObjectCollection findBySend(int $send) Return ChildAliTsaleh objects filtered by the send column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliTsaleh objects filtered by the txtoption column
 * @method     ChildAliTsaleh[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliTsaleh objects filtered by the chkCash column
 * @method     ChildAliTsaleh[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliTsaleh objects filtered by the chkFuture column
 * @method     ChildAliTsaleh[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliTsaleh objects filtered by the chkTransfer column
 * @method     ChildAliTsaleh[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliTsaleh objects filtered by the chkCredit1 column
 * @method     ChildAliTsaleh[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliTsaleh objects filtered by the chkCredit2 column
 * @method     ChildAliTsaleh[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliTsaleh objects filtered by the chkCredit3 column
 * @method     ChildAliTsaleh[]|ObjectCollection findByChkinternet(string $chkInternet) Return ChildAliTsaleh objects filtered by the chkInternet column
 * @method     ChildAliTsaleh[]|ObjectCollection findByChkdiscount(string $chkDiscount) Return ChildAliTsaleh objects filtered by the chkDiscount column
 * @method     ChildAliTsaleh[]|ObjectCollection findByChkother(string $chkOther) Return ChildAliTsaleh objects filtered by the chkOther column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliTsaleh objects filtered by the txtCash column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliTsaleh objects filtered by the txtFuture column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliTsaleh objects filtered by the txtTransfer column
 * @method     ChildAliTsaleh[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliTsaleh objects filtered by the ewallet column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliTsaleh objects filtered by the txtCredit1 column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliTsaleh objects filtered by the txtCredit2 column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliTsaleh objects filtered by the txtCredit3 column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTxtinternet(string $txtInternet) Return ChildAliTsaleh objects filtered by the txtInternet column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTxtdiscount(string $txtDiscount) Return ChildAliTsaleh objects filtered by the txtDiscount column
 * @method     ChildAliTsaleh[]|ObjectCollection findByTxtother(string $txtOther) Return ChildAliTsaleh objects filtered by the txtOther column
 * @method     ChildAliTsaleh[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliTsaleh objects filtered by the optionCash column
 * @method     ChildAliTsaleh[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliTsaleh objects filtered by the optionFuture column
 * @method     ChildAliTsaleh[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliTsaleh objects filtered by the optionTransfer column
 * @method     ChildAliTsaleh[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliTsaleh objects filtered by the optionCredit1 column
 * @method     ChildAliTsaleh[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliTsaleh objects filtered by the optionCredit2 column
 * @method     ChildAliTsaleh[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliTsaleh objects filtered by the optionCredit3 column
 * @method     ChildAliTsaleh[]|ObjectCollection findByOptioninternet(string $optionInternet) Return ChildAliTsaleh objects filtered by the optionInternet column
 * @method     ChildAliTsaleh[]|ObjectCollection findByOptiondiscount(string $optionDiscount) Return ChildAliTsaleh objects filtered by the optionDiscount column
 * @method     ChildAliTsaleh[]|ObjectCollection findByOptionother(string $optionOther) Return ChildAliTsaleh objects filtered by the optionOther column
 * @method     ChildAliTsaleh[]|ObjectCollection findByDiscount(int $discount) Return ChildAliTsaleh objects filtered by the discount column
 * @method     ChildAliTsaleh[]|ObjectCollection findBySender(int $sender) Return ChildAliTsaleh objects filtered by the sender column
 * @method     ChildAliTsaleh[]|ObjectCollection findBySenderDate(string $sender_date) Return ChildAliTsaleh objects filtered by the sender_date column
 * @method     ChildAliTsaleh[]|ObjectCollection findByReceive(int $receive) Return ChildAliTsaleh objects filtered by the receive column
 * @method     ChildAliTsaleh[]|ObjectCollection findByReceiveDate(string $receive_date) Return ChildAliTsaleh objects filtered by the receive_date column
 * @method     ChildAliTsaleh[]|ObjectCollection findByPrint(int $print) Return ChildAliTsaleh objects filtered by the print column
 * @method     ChildAliTsaleh[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliTsaleh objects filtered by the ewallet_before column
 * @method     ChildAliTsaleh[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliTsaleh objects filtered by the ewallet_after column
 * @method     ChildAliTsaleh[]|ObjectCollection findByEwallettBefore(string $ewallett_before) Return ChildAliTsaleh objects filtered by the ewallett_before column
 * @method     ChildAliTsaleh[]|ObjectCollection findByEwallettAfter(string $ewallett_after) Return ChildAliTsaleh objects filtered by the ewallett_after column
 * @method     ChildAliTsaleh[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliTsaleh objects filtered by the cancel_date column
 * @method     ChildAliTsaleh[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliTsaleh objects filtered by the uid_cancel column
 * @method     ChildAliTsaleh[]|ObjectCollection findByMbase(string $mbase) Return ChildAliTsaleh objects filtered by the mbase column
 * @method     ChildAliTsaleh[]|ObjectCollection findByBprice(string $bprice) Return ChildAliTsaleh objects filtered by the bprice column
 * @method     ChildAliTsaleh[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliTsaleh objects filtered by the locationbase column
 * @method     ChildAliTsaleh[]|ObjectCollection findByCrate(string $crate) Return ChildAliTsaleh objects filtered by the crate column
 * @method     ChildAliTsaleh[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliTsaleh objects filtered by the checkportal column
 * @method     ChildAliTsaleh[]|ObjectCollection findByUidReceive(string $uid_receive) Return ChildAliTsaleh objects filtered by the uid_receive column
 * @method     ChildAliTsaleh[]|ObjectCollection findByUidSender(string $uid_sender) Return ChildAliTsaleh objects filtered by the uid_sender column
 * @method     ChildAliTsaleh[]|ObjectCollection findByCaddress(string $caddress) Return ChildAliTsaleh objects filtered by the caddress column
 * @method     ChildAliTsaleh[]|ObjectCollection findByCdistrictid(string $cdistrictId) Return ChildAliTsaleh objects filtered by the cdistrictId column
 * @method     ChildAliTsaleh[]|ObjectCollection findByCamphurid(string $camphurId) Return ChildAliTsaleh objects filtered by the camphurId column
 * @method     ChildAliTsaleh[]|ObjectCollection findByCprovinceid(string $cprovinceId) Return ChildAliTsaleh objects filtered by the cprovinceId column
 * @method     ChildAliTsaleh[]|ObjectCollection findByCzip(string $czip) Return ChildAliTsaleh objects filtered by the czip column
 * @method     ChildAliTsaleh[]|ObjectCollection findByStatus(int $status) Return ChildAliTsaleh objects filtered by the status column
 * @method     ChildAliTsaleh[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliTsalehQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliTsalehQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliTsaleh', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliTsalehQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliTsalehQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliTsalehQuery) {
            return $criteria;
        }
        $query = new ChildAliTsalehQuery();
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
     * @return ChildAliTsaleh|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliTsalehTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliTsalehTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliTsaleh A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, name_f, name_t, sadate, sctime, inv_code, lid, inv_from, mcode, total, tot_pv, tot_bv, tot_fv, usercode, remark, trnf, id, sa_type, uid, dl, cancel, send, txtoption, chkCash, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkInternet, chkDiscount, chkOther, txtCash, txtFuture, txtTransfer, ewallet, txtCredit1, txtCredit2, txtCredit3, txtInternet, txtDiscount, txtOther, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionInternet, optionDiscount, optionOther, discount, sender, sender_date, receive, receive_date, print, ewallet_before, ewallet_after, ewallett_before, ewallett_after, cancel_date, uid_cancel, mbase, bprice, locationbase, crate, checkportal, uid_receive, uid_sender, caddress, cdistrictId, camphurId, cprovinceId, czip, status FROM ali_tsaleh WHERE id = :p0';
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
            /** @var ChildAliTsaleh $obj */
            $obj = new ChildAliTsaleh();
            $obj->hydrate($row);
            AliTsalehTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliTsaleh|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliTsalehTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliTsalehTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterBySctime($sctime = null, $comparison = null)
    {
        if (is_array($sctime)) {
            $useMinMax = false;
            if (isset($sctime['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_SCTIME, $sctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sctime['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_SCTIME, $sctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_SCTIME, $sctime, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_LID, $lid, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByInvFrom($invFrom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invFrom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_INV_FROM, $invFrom, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TOT_PV, $totPv, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTotBv($totBv = null, $comparison = null)
    {
        if (is_array($totBv)) {
            $useMinMax = false;
            if (isset($totBv['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_TOT_BV, $totBv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totBv['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_TOT_BV, $totBv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TOT_BV, $totBv, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTotFv($totFv = null, $comparison = null)
    {
        if (is_array($totFv)) {
            $useMinMax = false;
            if (isset($totFv['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_TOT_FV, $totFv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totFv['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_TOT_FV, $totFv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TOT_FV, $totFv, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trnf)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_SEND, $send, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByChkinternet($chkinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CHKINTERNET, $chkinternet, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByChkdiscount($chkdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CHKDISCOUNT, $chkdiscount, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByChkother($chkother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CHKOTHER, $chkother, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txttransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTxtinternet($txtinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TXTINTERNET, $txtinternet, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTxtdiscount($txtdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TXTDISCOUNT, $txtdiscount, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByTxtother($txtother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_TXTOTHER, $txtother, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByOptioninternet($optioninternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioninternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_OPTIONINTERNET, $optioninternet, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByOptiondiscount($optiondiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiondiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_OPTIONDISCOUNT, $optiondiscount, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByOptionother($optionother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_OPTIONOTHER, $optionother, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByDiscount($discount = null, $comparison = null)
    {
        if (is_array($discount)) {
            $useMinMax = false;
            if (isset($discount['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_DISCOUNT, $discount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($discount['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_DISCOUNT, $discount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_DISCOUNT, $discount, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterBySender($sender = null, $comparison = null)
    {
        if (is_array($sender)) {
            $useMinMax = false;
            if (isset($sender['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_SENDER, $sender['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sender['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_SENDER, $sender['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_SENDER, $sender, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterBySenderDate($senderDate = null, $comparison = null)
    {
        if (is_array($senderDate)) {
            $useMinMax = false;
            if (isset($senderDate['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_SENDER_DATE, $senderDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($senderDate['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_SENDER_DATE, $senderDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_SENDER_DATE, $senderDate, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByReceive($receive = null, $comparison = null)
    {
        if (is_array($receive)) {
            $useMinMax = false;
            if (isset($receive['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_RECEIVE, $receive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receive['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_RECEIVE, $receive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_RECEIVE, $receive, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByReceiveDate($receiveDate = null, $comparison = null)
    {
        if (is_array($receiveDate)) {
            $useMinMax = false;
            if (isset($receiveDate['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_RECEIVE_DATE, $receiveDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiveDate['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_RECEIVE_DATE, $receiveDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_RECEIVE_DATE, $receiveDate, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByPrint($print = null, $comparison = null)
    {
        if (is_array($print)) {
            $useMinMax = false;
            if (isset($print['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_PRINT, $print['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($print['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_PRINT, $print['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_PRINT, $print, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByEwallettBefore($ewallettBefore = null, $comparison = null)
    {
        if (is_array($ewallettBefore)) {
            $useMinMax = false;
            if (isset($ewallettBefore['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_EWALLETT_BEFORE, $ewallettBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallettBefore['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_EWALLETT_BEFORE, $ewallettBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_EWALLETT_BEFORE, $ewallettBefore, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByEwallettAfter($ewallettAfter = null, $comparison = null)
    {
        if (is_array($ewallettAfter)) {
            $useMinMax = false;
            if (isset($ewallettAfter['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_EWALLETT_AFTER, $ewallettAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallettAfter['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_EWALLETT_AFTER, $ewallettAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_EWALLETT_AFTER, $ewallettAfter, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_MBASE, $mbase, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByUidReceive($uidReceive = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidReceive)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_UID_RECEIVE, $uidReceive, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByUidSender($uidSender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidSender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_UID_SENDER, $uidSender, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByCaddress($caddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($caddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CADDRESS, $caddress, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByCdistrictid($cdistrictid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cdistrictid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CDISTRICTID, $cdistrictid, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByCamphurid($camphurid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($camphurid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CAMPHURID, $camphurid, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByCprovinceid($cprovinceid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cprovinceid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CPROVINCEID, $cprovinceid, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByCzip($czip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($czip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_CZIP, $czip, $comparison);
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
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(AliTsalehTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTsalehTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliTsaleh $aliTsaleh Object to remove from the list of results
     *
     * @return $this|ChildAliTsalehQuery The current query, for fluid interface
     */
    public function prune($aliTsaleh = null)
    {
        if ($aliTsaleh) {
            $this->addUsingAlias(AliTsalehTableMap::COL_ID, $aliTsaleh->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_tsaleh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTsalehTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliTsalehTableMap::clearInstancePool();
            AliTsalehTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTsalehTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliTsalehTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliTsalehTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliTsalehTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliTsalehQuery
