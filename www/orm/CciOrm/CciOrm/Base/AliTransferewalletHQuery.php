<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTransferewalletH as ChildAliTransferewalletH;
use CciOrm\CciOrm\AliTransferewalletHQuery as ChildAliTransferewalletHQuery;
use CciOrm\CciOrm\Map\AliTransferewalletHTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_transferewallet_h' table.
 *
 *
 *
 * @method     ChildAliTransferewalletHQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliTransferewalletHQuery orderBySano1($order = Criteria::ASC) Order by the sano1 column
 * @method     ChildAliTransferewalletHQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliTransferewalletHQuery orderBySctime($order = Criteria::ASC) Order by the sctime column
 * @method     ChildAliTransferewalletHQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliTransferewalletHQuery orderByInvRef($order = Criteria::ASC) Order by the inv_ref column
 * @method     ChildAliTransferewalletHQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliTransferewalletHQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliTransferewalletHQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliTransferewalletHQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliTransferewalletHQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliTransferewalletHQuery orderByTotBv($order = Criteria::ASC) Order by the tot_bv column
 * @method     ChildAliTransferewalletHQuery orderByTotFv($order = Criteria::ASC) Order by the tot_fv column
 * @method     ChildAliTransferewalletHQuery orderByTotWeight($order = Criteria::ASC) Order by the tot_weight column
 * @method     ChildAliTransferewalletHQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliTransferewalletHQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliTransferewalletHQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliTransferewalletHQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliTransferewalletHQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliTransferewalletHQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliTransferewalletHQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliTransferewalletHQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliTransferewalletHQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliTransferewalletHQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliTransferewalletHQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliTransferewalletHQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliTransferewalletHQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliTransferewalletHQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliTransferewalletHQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliTransferewalletHQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliTransferewalletHQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliTransferewalletHQuery orderByChkinternet($order = Criteria::ASC) Order by the chkInternet column
 * @method     ChildAliTransferewalletHQuery orderByChkdiscount($order = Criteria::ASC) Order by the chkDiscount column
 * @method     ChildAliTransferewalletHQuery orderByChkother($order = Criteria::ASC) Order by the chkOther column
 * @method     ChildAliTransferewalletHQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliTransferewalletHQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliTransferewalletHQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliTransferewalletHQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliTransferewalletHQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliTransferewalletHQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliTransferewalletHQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliTransferewalletHQuery orderByTxtinternet($order = Criteria::ASC) Order by the txtInternet column
 * @method     ChildAliTransferewalletHQuery orderByTxtdiscount($order = Criteria::ASC) Order by the txtDiscount column
 * @method     ChildAliTransferewalletHQuery orderByTxtother($order = Criteria::ASC) Order by the txtOther column
 * @method     ChildAliTransferewalletHQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliTransferewalletHQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliTransferewalletHQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliTransferewalletHQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliTransferewalletHQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliTransferewalletHQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliTransferewalletHQuery orderByOptioninternet($order = Criteria::ASC) Order by the optionInternet column
 * @method     ChildAliTransferewalletHQuery orderByOptiondiscount($order = Criteria::ASC) Order by the optionDiscount column
 * @method     ChildAliTransferewalletHQuery orderByOptionother($order = Criteria::ASC) Order by the optionOther column
 * @method     ChildAliTransferewalletHQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildAliTransferewalletHQuery orderByPrint($order = Criteria::ASC) Order by the print column
 * @method     ChildAliTransferewalletHQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliTransferewalletHQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliTransferewalletHQuery orderByIpay($order = Criteria::ASC) Order by the ipay column
 * @method     ChildAliTransferewalletHQuery orderByPayType($order = Criteria::ASC) Order by the pay_type column
 * @method     ChildAliTransferewalletHQuery orderByHcancel($order = Criteria::ASC) Order by the hcancel column
 * @method     ChildAliTransferewalletHQuery orderByCaddress($order = Criteria::ASC) Order by the caddress column
 * @method     ChildAliTransferewalletHQuery orderByCdistrictid($order = Criteria::ASC) Order by the cdistrictId column
 * @method     ChildAliTransferewalletHQuery orderByCamphurid($order = Criteria::ASC) Order by the camphurId column
 * @method     ChildAliTransferewalletHQuery orderByCprovinceid($order = Criteria::ASC) Order by the cprovinceId column
 * @method     ChildAliTransferewalletHQuery orderByCzip($order = Criteria::ASC) Order by the czip column
 * @method     ChildAliTransferewalletHQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method     ChildAliTransferewalletHQuery orderBySenderDate($order = Criteria::ASC) Order by the sender_date column
 * @method     ChildAliTransferewalletHQuery orderByReceive($order = Criteria::ASC) Order by the receive column
 * @method     ChildAliTransferewalletHQuery orderByReceiveDate($order = Criteria::ASC) Order by the receive_date column
 * @method     ChildAliTransferewalletHQuery orderByAsend($order = Criteria::ASC) Order by the asend column
 * @method     ChildAliTransferewalletHQuery orderByAtoType($order = Criteria::ASC) Order by the ato_type column
 * @method     ChildAliTransferewalletHQuery orderByAtoId($order = Criteria::ASC) Order by the ato_id column
 * @method     ChildAliTransferewalletHQuery orderByOnline($order = Criteria::ASC) Order by the online column
 * @method     ChildAliTransferewalletHQuery orderByHpv($order = Criteria::ASC) Order by the hpv column
 * @method     ChildAliTransferewalletHQuery orderByHtotal($order = Criteria::ASC) Order by the htotal column
 * @method     ChildAliTransferewalletHQuery orderByHdate($order = Criteria::ASC) Order by the hdate column
 * @method     ChildAliTransferewalletHQuery orderByScheck($order = Criteria::ASC) Order by the scheck column
 * @method     ChildAliTransferewalletHQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliTransferewalletHQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliTransferewalletHQuery orderByBmcauto($order = Criteria::ASC) Order by the bmcauto column
 * @method     ChildAliTransferewalletHQuery orderByTranstype($order = Criteria::ASC) Order by the transtype column
 * @method     ChildAliTransferewalletHQuery orderByPaytype($order = Criteria::ASC) Order by the paytype column
 * @method     ChildAliTransferewalletHQuery orderBySendtype($order = Criteria::ASC) Order by the sendtype column
 * @method     ChildAliTransferewalletHQuery orderByCredittype($order = Criteria::ASC) Order by the credittype column
 * @method     ChildAliTransferewalletHQuery orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliTransferewalletHQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliTransferewalletHQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliTransferewalletHQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliTransferewalletHQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 *
 * @method     ChildAliTransferewalletHQuery groupBySano() Group by the sano column
 * @method     ChildAliTransferewalletHQuery groupBySano1() Group by the sano1 column
 * @method     ChildAliTransferewalletHQuery groupBySadate() Group by the sadate column
 * @method     ChildAliTransferewalletHQuery groupBySctime() Group by the sctime column
 * @method     ChildAliTransferewalletHQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliTransferewalletHQuery groupByInvRef() Group by the inv_ref column
 * @method     ChildAliTransferewalletHQuery groupByMcode() Group by the mcode column
 * @method     ChildAliTransferewalletHQuery groupByNameF() Group by the name_f column
 * @method     ChildAliTransferewalletHQuery groupByNameT() Group by the name_t column
 * @method     ChildAliTransferewalletHQuery groupByTotal() Group by the total column
 * @method     ChildAliTransferewalletHQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliTransferewalletHQuery groupByTotBv() Group by the tot_bv column
 * @method     ChildAliTransferewalletHQuery groupByTotFv() Group by the tot_fv column
 * @method     ChildAliTransferewalletHQuery groupByTotWeight() Group by the tot_weight column
 * @method     ChildAliTransferewalletHQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliTransferewalletHQuery groupByRemark() Group by the remark column
 * @method     ChildAliTransferewalletHQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliTransferewalletHQuery groupById() Group by the id column
 * @method     ChildAliTransferewalletHQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliTransferewalletHQuery groupByUid() Group by the uid column
 * @method     ChildAliTransferewalletHQuery groupByLid() Group by the lid column
 * @method     ChildAliTransferewalletHQuery groupByDl() Group by the dl column
 * @method     ChildAliTransferewalletHQuery groupByCancel() Group by the cancel column
 * @method     ChildAliTransferewalletHQuery groupBySend() Group by the send column
 * @method     ChildAliTransferewalletHQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliTransferewalletHQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliTransferewalletHQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliTransferewalletHQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliTransferewalletHQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliTransferewalletHQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliTransferewalletHQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliTransferewalletHQuery groupByChkinternet() Group by the chkInternet column
 * @method     ChildAliTransferewalletHQuery groupByChkdiscount() Group by the chkDiscount column
 * @method     ChildAliTransferewalletHQuery groupByChkother() Group by the chkOther column
 * @method     ChildAliTransferewalletHQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliTransferewalletHQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliTransferewalletHQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliTransferewalletHQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliTransferewalletHQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliTransferewalletHQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliTransferewalletHQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliTransferewalletHQuery groupByTxtinternet() Group by the txtInternet column
 * @method     ChildAliTransferewalletHQuery groupByTxtdiscount() Group by the txtDiscount column
 * @method     ChildAliTransferewalletHQuery groupByTxtother() Group by the txtOther column
 * @method     ChildAliTransferewalletHQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliTransferewalletHQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliTransferewalletHQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliTransferewalletHQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliTransferewalletHQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliTransferewalletHQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliTransferewalletHQuery groupByOptioninternet() Group by the optionInternet column
 * @method     ChildAliTransferewalletHQuery groupByOptiondiscount() Group by the optionDiscount column
 * @method     ChildAliTransferewalletHQuery groupByOptionother() Group by the optionOther column
 * @method     ChildAliTransferewalletHQuery groupByDiscount() Group by the discount column
 * @method     ChildAliTransferewalletHQuery groupByPrint() Group by the print column
 * @method     ChildAliTransferewalletHQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliTransferewalletHQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliTransferewalletHQuery groupByIpay() Group by the ipay column
 * @method     ChildAliTransferewalletHQuery groupByPayType() Group by the pay_type column
 * @method     ChildAliTransferewalletHQuery groupByHcancel() Group by the hcancel column
 * @method     ChildAliTransferewalletHQuery groupByCaddress() Group by the caddress column
 * @method     ChildAliTransferewalletHQuery groupByCdistrictid() Group by the cdistrictId column
 * @method     ChildAliTransferewalletHQuery groupByCamphurid() Group by the camphurId column
 * @method     ChildAliTransferewalletHQuery groupByCprovinceid() Group by the cprovinceId column
 * @method     ChildAliTransferewalletHQuery groupByCzip() Group by the czip column
 * @method     ChildAliTransferewalletHQuery groupBySender() Group by the sender column
 * @method     ChildAliTransferewalletHQuery groupBySenderDate() Group by the sender_date column
 * @method     ChildAliTransferewalletHQuery groupByReceive() Group by the receive column
 * @method     ChildAliTransferewalletHQuery groupByReceiveDate() Group by the receive_date column
 * @method     ChildAliTransferewalletHQuery groupByAsend() Group by the asend column
 * @method     ChildAliTransferewalletHQuery groupByAtoType() Group by the ato_type column
 * @method     ChildAliTransferewalletHQuery groupByAtoId() Group by the ato_id column
 * @method     ChildAliTransferewalletHQuery groupByOnline() Group by the online column
 * @method     ChildAliTransferewalletHQuery groupByHpv() Group by the hpv column
 * @method     ChildAliTransferewalletHQuery groupByHtotal() Group by the htotal column
 * @method     ChildAliTransferewalletHQuery groupByHdate() Group by the hdate column
 * @method     ChildAliTransferewalletHQuery groupByScheck() Group by the scheck column
 * @method     ChildAliTransferewalletHQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliTransferewalletHQuery groupByRcode() Group by the rcode column
 * @method     ChildAliTransferewalletHQuery groupByBmcauto() Group by the bmcauto column
 * @method     ChildAliTransferewalletHQuery groupByTranstype() Group by the transtype column
 * @method     ChildAliTransferewalletHQuery groupByPaytype() Group by the paytype column
 * @method     ChildAliTransferewalletHQuery groupBySendtype() Group by the sendtype column
 * @method     ChildAliTransferewalletHQuery groupByCredittype() Group by the credittype column
 * @method     ChildAliTransferewalletHQuery groupByPaydate() Group by the paydate column
 * @method     ChildAliTransferewalletHQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliTransferewalletHQuery groupByBprice() Group by the bprice column
 * @method     ChildAliTransferewalletHQuery groupByMbase() Group by the mbase column
 * @method     ChildAliTransferewalletHQuery groupByCrate() Group by the crate column
 *
 * @method     ChildAliTransferewalletHQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliTransferewalletHQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliTransferewalletHQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliTransferewalletHQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliTransferewalletHQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliTransferewalletHQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliTransferewalletH findOne(ConnectionInterface $con = null) Return the first ChildAliTransferewalletH matching the query
 * @method     ChildAliTransferewalletH findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliTransferewalletH matching the query, or a new ChildAliTransferewalletH object populated from the query conditions when no match is found
 *
 * @method     ChildAliTransferewalletH findOneBySano(string $sano) Return the first ChildAliTransferewalletH filtered by the sano column
 * @method     ChildAliTransferewalletH findOneBySano1(string $sano1) Return the first ChildAliTransferewalletH filtered by the sano1 column
 * @method     ChildAliTransferewalletH findOneBySadate(string $sadate) Return the first ChildAliTransferewalletH filtered by the sadate column
 * @method     ChildAliTransferewalletH findOneBySctime(string $sctime) Return the first ChildAliTransferewalletH filtered by the sctime column
 * @method     ChildAliTransferewalletH findOneByInvCode(string $inv_code) Return the first ChildAliTransferewalletH filtered by the inv_code column
 * @method     ChildAliTransferewalletH findOneByInvRef(string $inv_ref) Return the first ChildAliTransferewalletH filtered by the inv_ref column
 * @method     ChildAliTransferewalletH findOneByMcode(string $mcode) Return the first ChildAliTransferewalletH filtered by the mcode column
 * @method     ChildAliTransferewalletH findOneByNameF(string $name_f) Return the first ChildAliTransferewalletH filtered by the name_f column
 * @method     ChildAliTransferewalletH findOneByNameT(string $name_t) Return the first ChildAliTransferewalletH filtered by the name_t column
 * @method     ChildAliTransferewalletH findOneByTotal(string $total) Return the first ChildAliTransferewalletH filtered by the total column
 * @method     ChildAliTransferewalletH findOneByTotPv(string $tot_pv) Return the first ChildAliTransferewalletH filtered by the tot_pv column
 * @method     ChildAliTransferewalletH findOneByTotBv(string $tot_bv) Return the first ChildAliTransferewalletH filtered by the tot_bv column
 * @method     ChildAliTransferewalletH findOneByTotFv(string $tot_fv) Return the first ChildAliTransferewalletH filtered by the tot_fv column
 * @method     ChildAliTransferewalletH findOneByTotWeight(string $tot_weight) Return the first ChildAliTransferewalletH filtered by the tot_weight column
 * @method     ChildAliTransferewalletH findOneByUsercode(string $usercode) Return the first ChildAliTransferewalletH filtered by the usercode column
 * @method     ChildAliTransferewalletH findOneByRemark(string $remark) Return the first ChildAliTransferewalletH filtered by the remark column
 * @method     ChildAliTransferewalletH findOneByTrnf(int $trnf) Return the first ChildAliTransferewalletH filtered by the trnf column
 * @method     ChildAliTransferewalletH findOneById(int $id) Return the first ChildAliTransferewalletH filtered by the id column
 * @method     ChildAliTransferewalletH findOneBySaType(string $sa_type) Return the first ChildAliTransferewalletH filtered by the sa_type column
 * @method     ChildAliTransferewalletH findOneByUid(string $uid) Return the first ChildAliTransferewalletH filtered by the uid column
 * @method     ChildAliTransferewalletH findOneByLid(string $lid) Return the first ChildAliTransferewalletH filtered by the lid column
 * @method     ChildAliTransferewalletH findOneByDl(string $dl) Return the first ChildAliTransferewalletH filtered by the dl column
 * @method     ChildAliTransferewalletH findOneByCancel(int $cancel) Return the first ChildAliTransferewalletH filtered by the cancel column
 * @method     ChildAliTransferewalletH findOneBySend(int $send) Return the first ChildAliTransferewalletH filtered by the send column
 * @method     ChildAliTransferewalletH findOneByTxtoption(string $txtoption) Return the first ChildAliTransferewalletH filtered by the txtoption column
 * @method     ChildAliTransferewalletH findOneByChkcash(string $chkCash) Return the first ChildAliTransferewalletH filtered by the chkCash column
 * @method     ChildAliTransferewalletH findOneByChkfuture(string $chkFuture) Return the first ChildAliTransferewalletH filtered by the chkFuture column
 * @method     ChildAliTransferewalletH findOneByChktransfer(string $chkTransfer) Return the first ChildAliTransferewalletH filtered by the chkTransfer column
 * @method     ChildAliTransferewalletH findOneByChkcredit1(string $chkCredit1) Return the first ChildAliTransferewalletH filtered by the chkCredit1 column
 * @method     ChildAliTransferewalletH findOneByChkcredit2(string $chkCredit2) Return the first ChildAliTransferewalletH filtered by the chkCredit2 column
 * @method     ChildAliTransferewalletH findOneByChkcredit3(string $chkCredit3) Return the first ChildAliTransferewalletH filtered by the chkCredit3 column
 * @method     ChildAliTransferewalletH findOneByChkinternet(string $chkInternet) Return the first ChildAliTransferewalletH filtered by the chkInternet column
 * @method     ChildAliTransferewalletH findOneByChkdiscount(string $chkDiscount) Return the first ChildAliTransferewalletH filtered by the chkDiscount column
 * @method     ChildAliTransferewalletH findOneByChkother(string $chkOther) Return the first ChildAliTransferewalletH filtered by the chkOther column
 * @method     ChildAliTransferewalletH findOneByTxtcash(string $txtCash) Return the first ChildAliTransferewalletH filtered by the txtCash column
 * @method     ChildAliTransferewalletH findOneByTxtfuture(string $txtFuture) Return the first ChildAliTransferewalletH filtered by the txtFuture column
 * @method     ChildAliTransferewalletH findOneByTxttransfer(string $txtTransfer) Return the first ChildAliTransferewalletH filtered by the txtTransfer column
 * @method     ChildAliTransferewalletH findOneByEwallet(string $ewallet) Return the first ChildAliTransferewalletH filtered by the ewallet column
 * @method     ChildAliTransferewalletH findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliTransferewalletH filtered by the txtCredit1 column
 * @method     ChildAliTransferewalletH findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliTransferewalletH filtered by the txtCredit2 column
 * @method     ChildAliTransferewalletH findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliTransferewalletH filtered by the txtCredit3 column
 * @method     ChildAliTransferewalletH findOneByTxtinternet(string $txtInternet) Return the first ChildAliTransferewalletH filtered by the txtInternet column
 * @method     ChildAliTransferewalletH findOneByTxtdiscount(string $txtDiscount) Return the first ChildAliTransferewalletH filtered by the txtDiscount column
 * @method     ChildAliTransferewalletH findOneByTxtother(string $txtOther) Return the first ChildAliTransferewalletH filtered by the txtOther column
 * @method     ChildAliTransferewalletH findOneByOptioncash(string $optionCash) Return the first ChildAliTransferewalletH filtered by the optionCash column
 * @method     ChildAliTransferewalletH findOneByOptionfuture(string $optionFuture) Return the first ChildAliTransferewalletH filtered by the optionFuture column
 * @method     ChildAliTransferewalletH findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliTransferewalletH filtered by the optionTransfer column
 * @method     ChildAliTransferewalletH findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliTransferewalletH filtered by the optionCredit1 column
 * @method     ChildAliTransferewalletH findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliTransferewalletH filtered by the optionCredit2 column
 * @method     ChildAliTransferewalletH findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliTransferewalletH filtered by the optionCredit3 column
 * @method     ChildAliTransferewalletH findOneByOptioninternet(string $optionInternet) Return the first ChildAliTransferewalletH filtered by the optionInternet column
 * @method     ChildAliTransferewalletH findOneByOptiondiscount(string $optionDiscount) Return the first ChildAliTransferewalletH filtered by the optionDiscount column
 * @method     ChildAliTransferewalletH findOneByOptionother(string $optionOther) Return the first ChildAliTransferewalletH filtered by the optionOther column
 * @method     ChildAliTransferewalletH findOneByDiscount(string $discount) Return the first ChildAliTransferewalletH filtered by the discount column
 * @method     ChildAliTransferewalletH findOneByPrint(int $print) Return the first ChildAliTransferewalletH filtered by the print column
 * @method     ChildAliTransferewalletH findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliTransferewalletH filtered by the ewallet_before column
 * @method     ChildAliTransferewalletH findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliTransferewalletH filtered by the ewallet_after column
 * @method     ChildAliTransferewalletH findOneByIpay(string $ipay) Return the first ChildAliTransferewalletH filtered by the ipay column
 * @method     ChildAliTransferewalletH findOneByPayType(string $pay_type) Return the first ChildAliTransferewalletH filtered by the pay_type column
 * @method     ChildAliTransferewalletH findOneByHcancel(int $hcancel) Return the first ChildAliTransferewalletH filtered by the hcancel column
 * @method     ChildAliTransferewalletH findOneByCaddress(string $caddress) Return the first ChildAliTransferewalletH filtered by the caddress column
 * @method     ChildAliTransferewalletH findOneByCdistrictid(int $cdistrictId) Return the first ChildAliTransferewalletH filtered by the cdistrictId column
 * @method     ChildAliTransferewalletH findOneByCamphurid(int $camphurId) Return the first ChildAliTransferewalletH filtered by the camphurId column
 * @method     ChildAliTransferewalletH findOneByCprovinceid(int $cprovinceId) Return the first ChildAliTransferewalletH filtered by the cprovinceId column
 * @method     ChildAliTransferewalletH findOneByCzip(string $czip) Return the first ChildAliTransferewalletH filtered by the czip column
 * @method     ChildAliTransferewalletH findOneBySender(int $sender) Return the first ChildAliTransferewalletH filtered by the sender column
 * @method     ChildAliTransferewalletH findOneBySenderDate(string $sender_date) Return the first ChildAliTransferewalletH filtered by the sender_date column
 * @method     ChildAliTransferewalletH findOneByReceive(int $receive) Return the first ChildAliTransferewalletH filtered by the receive column
 * @method     ChildAliTransferewalletH findOneByReceiveDate(string $receive_date) Return the first ChildAliTransferewalletH filtered by the receive_date column
 * @method     ChildAliTransferewalletH findOneByAsend(int $asend) Return the first ChildAliTransferewalletH filtered by the asend column
 * @method     ChildAliTransferewalletH findOneByAtoType(int $ato_type) Return the first ChildAliTransferewalletH filtered by the ato_type column
 * @method     ChildAliTransferewalletH findOneByAtoId(int $ato_id) Return the first ChildAliTransferewalletH filtered by the ato_id column
 * @method     ChildAliTransferewalletH findOneByOnline(int $online) Return the first ChildAliTransferewalletH filtered by the online column
 * @method     ChildAliTransferewalletH findOneByHpv(string $hpv) Return the first ChildAliTransferewalletH filtered by the hpv column
 * @method     ChildAliTransferewalletH findOneByHtotal(string $htotal) Return the first ChildAliTransferewalletH filtered by the htotal column
 * @method     ChildAliTransferewalletH findOneByHdate(string $hdate) Return the first ChildAliTransferewalletH filtered by the hdate column
 * @method     ChildAliTransferewalletH findOneByScheck(string $scheck) Return the first ChildAliTransferewalletH filtered by the scheck column
 * @method     ChildAliTransferewalletH findOneByCheckportal(int $checkportal) Return the first ChildAliTransferewalletH filtered by the checkportal column
 * @method     ChildAliTransferewalletH findOneByRcode(int $rcode) Return the first ChildAliTransferewalletH filtered by the rcode column
 * @method     ChildAliTransferewalletH findOneByBmcauto(int $bmcauto) Return the first ChildAliTransferewalletH filtered by the bmcauto column
 * @method     ChildAliTransferewalletH findOneByTranstype(int $transtype) Return the first ChildAliTransferewalletH filtered by the transtype column
 * @method     ChildAliTransferewalletH findOneByPaytype(int $paytype) Return the first ChildAliTransferewalletH filtered by the paytype column
 * @method     ChildAliTransferewalletH findOneBySendtype(int $sendtype) Return the first ChildAliTransferewalletH filtered by the sendtype column
 * @method     ChildAliTransferewalletH findOneByCredittype(int $credittype) Return the first ChildAliTransferewalletH filtered by the credittype column
 * @method     ChildAliTransferewalletH findOneByPaydate(string $paydate) Return the first ChildAliTransferewalletH filtered by the paydate column
 * @method     ChildAliTransferewalletH findOneByLocationbase(int $locationbase) Return the first ChildAliTransferewalletH filtered by the locationbase column
 * @method     ChildAliTransferewalletH findOneByBprice(string $bprice) Return the first ChildAliTransferewalletH filtered by the bprice column
 * @method     ChildAliTransferewalletH findOneByMbase(string $mbase) Return the first ChildAliTransferewalletH filtered by the mbase column
 * @method     ChildAliTransferewalletH findOneByCrate(string $crate) Return the first ChildAliTransferewalletH filtered by the crate column *

 * @method     ChildAliTransferewalletH requirePk($key, ConnectionInterface $con = null) Return the ChildAliTransferewalletH by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOne(ConnectionInterface $con = null) Return the first ChildAliTransferewalletH matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTransferewalletH requireOneBySano(string $sano) Return the first ChildAliTransferewalletH filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneBySano1(string $sano1) Return the first ChildAliTransferewalletH filtered by the sano1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneBySadate(string $sadate) Return the first ChildAliTransferewalletH filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneBySctime(string $sctime) Return the first ChildAliTransferewalletH filtered by the sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByInvCode(string $inv_code) Return the first ChildAliTransferewalletH filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByInvRef(string $inv_ref) Return the first ChildAliTransferewalletH filtered by the inv_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByMcode(string $mcode) Return the first ChildAliTransferewalletH filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByNameF(string $name_f) Return the first ChildAliTransferewalletH filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByNameT(string $name_t) Return the first ChildAliTransferewalletH filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTotal(string $total) Return the first ChildAliTransferewalletH filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTotPv(string $tot_pv) Return the first ChildAliTransferewalletH filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTotBv(string $tot_bv) Return the first ChildAliTransferewalletH filtered by the tot_bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTotFv(string $tot_fv) Return the first ChildAliTransferewalletH filtered by the tot_fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTotWeight(string $tot_weight) Return the first ChildAliTransferewalletH filtered by the tot_weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByUsercode(string $usercode) Return the first ChildAliTransferewalletH filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByRemark(string $remark) Return the first ChildAliTransferewalletH filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTrnf(int $trnf) Return the first ChildAliTransferewalletH filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneById(int $id) Return the first ChildAliTransferewalletH filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneBySaType(string $sa_type) Return the first ChildAliTransferewalletH filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByUid(string $uid) Return the first ChildAliTransferewalletH filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByLid(string $lid) Return the first ChildAliTransferewalletH filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByDl(string $dl) Return the first ChildAliTransferewalletH filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByCancel(int $cancel) Return the first ChildAliTransferewalletH filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneBySend(int $send) Return the first ChildAliTransferewalletH filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTxtoption(string $txtoption) Return the first ChildAliTransferewalletH filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByChkcash(string $chkCash) Return the first ChildAliTransferewalletH filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByChkfuture(string $chkFuture) Return the first ChildAliTransferewalletH filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByChktransfer(string $chkTransfer) Return the first ChildAliTransferewalletH filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliTransferewalletH filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliTransferewalletH filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliTransferewalletH filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByChkinternet(string $chkInternet) Return the first ChildAliTransferewalletH filtered by the chkInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByChkdiscount(string $chkDiscount) Return the first ChildAliTransferewalletH filtered by the chkDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByChkother(string $chkOther) Return the first ChildAliTransferewalletH filtered by the chkOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTxtcash(string $txtCash) Return the first ChildAliTransferewalletH filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTxtfuture(string $txtFuture) Return the first ChildAliTransferewalletH filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliTransferewalletH filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByEwallet(string $ewallet) Return the first ChildAliTransferewalletH filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliTransferewalletH filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliTransferewalletH filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliTransferewalletH filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTxtinternet(string $txtInternet) Return the first ChildAliTransferewalletH filtered by the txtInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTxtdiscount(string $txtDiscount) Return the first ChildAliTransferewalletH filtered by the txtDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTxtother(string $txtOther) Return the first ChildAliTransferewalletH filtered by the txtOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByOptioncash(string $optionCash) Return the first ChildAliTransferewalletH filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByOptionfuture(string $optionFuture) Return the first ChildAliTransferewalletH filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliTransferewalletH filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliTransferewalletH filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliTransferewalletH filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliTransferewalletH filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByOptioninternet(string $optionInternet) Return the first ChildAliTransferewalletH filtered by the optionInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByOptiondiscount(string $optionDiscount) Return the first ChildAliTransferewalletH filtered by the optionDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByOptionother(string $optionOther) Return the first ChildAliTransferewalletH filtered by the optionOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByDiscount(string $discount) Return the first ChildAliTransferewalletH filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByPrint(int $print) Return the first ChildAliTransferewalletH filtered by the print column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliTransferewalletH filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliTransferewalletH filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByIpay(string $ipay) Return the first ChildAliTransferewalletH filtered by the ipay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByPayType(string $pay_type) Return the first ChildAliTransferewalletH filtered by the pay_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByHcancel(int $hcancel) Return the first ChildAliTransferewalletH filtered by the hcancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByCaddress(string $caddress) Return the first ChildAliTransferewalletH filtered by the caddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByCdistrictid(int $cdistrictId) Return the first ChildAliTransferewalletH filtered by the cdistrictId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByCamphurid(int $camphurId) Return the first ChildAliTransferewalletH filtered by the camphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByCprovinceid(int $cprovinceId) Return the first ChildAliTransferewalletH filtered by the cprovinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByCzip(string $czip) Return the first ChildAliTransferewalletH filtered by the czip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneBySender(int $sender) Return the first ChildAliTransferewalletH filtered by the sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneBySenderDate(string $sender_date) Return the first ChildAliTransferewalletH filtered by the sender_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByReceive(int $receive) Return the first ChildAliTransferewalletH filtered by the receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByReceiveDate(string $receive_date) Return the first ChildAliTransferewalletH filtered by the receive_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByAsend(int $asend) Return the first ChildAliTransferewalletH filtered by the asend column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByAtoType(int $ato_type) Return the first ChildAliTransferewalletH filtered by the ato_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByAtoId(int $ato_id) Return the first ChildAliTransferewalletH filtered by the ato_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByOnline(int $online) Return the first ChildAliTransferewalletH filtered by the online column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByHpv(string $hpv) Return the first ChildAliTransferewalletH filtered by the hpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByHtotal(string $htotal) Return the first ChildAliTransferewalletH filtered by the htotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByHdate(string $hdate) Return the first ChildAliTransferewalletH filtered by the hdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByScheck(string $scheck) Return the first ChildAliTransferewalletH filtered by the scheck column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByCheckportal(int $checkportal) Return the first ChildAliTransferewalletH filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByRcode(int $rcode) Return the first ChildAliTransferewalletH filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByBmcauto(int $bmcauto) Return the first ChildAliTransferewalletH filtered by the bmcauto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByTranstype(int $transtype) Return the first ChildAliTransferewalletH filtered by the transtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByPaytype(int $paytype) Return the first ChildAliTransferewalletH filtered by the paytype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneBySendtype(int $sendtype) Return the first ChildAliTransferewalletH filtered by the sendtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByCredittype(int $credittype) Return the first ChildAliTransferewalletH filtered by the credittype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByPaydate(string $paydate) Return the first ChildAliTransferewalletH filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByLocationbase(int $locationbase) Return the first ChildAliTransferewalletH filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByBprice(string $bprice) Return the first ChildAliTransferewalletH filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByMbase(string $mbase) Return the first ChildAliTransferewalletH filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferewalletH requireOneByCrate(string $crate) Return the first ChildAliTransferewalletH filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTransferewalletH[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliTransferewalletH objects based on current ModelCriteria
 * @method     ChildAliTransferewalletH[]|ObjectCollection findBySano(string $sano) Return ChildAliTransferewalletH objects filtered by the sano column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findBySano1(string $sano1) Return ChildAliTransferewalletH objects filtered by the sano1 column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findBySadate(string $sadate) Return ChildAliTransferewalletH objects filtered by the sadate column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findBySctime(string $sctime) Return ChildAliTransferewalletH objects filtered by the sctime column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliTransferewalletH objects filtered by the inv_code column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByInvRef(string $inv_ref) Return ChildAliTransferewalletH objects filtered by the inv_ref column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByMcode(string $mcode) Return ChildAliTransferewalletH objects filtered by the mcode column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByNameF(string $name_f) Return ChildAliTransferewalletH objects filtered by the name_f column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByNameT(string $name_t) Return ChildAliTransferewalletH objects filtered by the name_t column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTotal(string $total) Return ChildAliTransferewalletH objects filtered by the total column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliTransferewalletH objects filtered by the tot_pv column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTotBv(string $tot_bv) Return ChildAliTransferewalletH objects filtered by the tot_bv column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTotFv(string $tot_fv) Return ChildAliTransferewalletH objects filtered by the tot_fv column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTotWeight(string $tot_weight) Return ChildAliTransferewalletH objects filtered by the tot_weight column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliTransferewalletH objects filtered by the usercode column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByRemark(string $remark) Return ChildAliTransferewalletH objects filtered by the remark column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTrnf(int $trnf) Return ChildAliTransferewalletH objects filtered by the trnf column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findById(int $id) Return ChildAliTransferewalletH objects filtered by the id column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliTransferewalletH objects filtered by the sa_type column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByUid(string $uid) Return ChildAliTransferewalletH objects filtered by the uid column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByLid(string $lid) Return ChildAliTransferewalletH objects filtered by the lid column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByDl(string $dl) Return ChildAliTransferewalletH objects filtered by the dl column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByCancel(int $cancel) Return ChildAliTransferewalletH objects filtered by the cancel column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findBySend(int $send) Return ChildAliTransferewalletH objects filtered by the send column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliTransferewalletH objects filtered by the txtoption column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliTransferewalletH objects filtered by the chkCash column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliTransferewalletH objects filtered by the chkFuture column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliTransferewalletH objects filtered by the chkTransfer column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliTransferewalletH objects filtered by the chkCredit1 column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliTransferewalletH objects filtered by the chkCredit2 column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliTransferewalletH objects filtered by the chkCredit3 column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByChkinternet(string $chkInternet) Return ChildAliTransferewalletH objects filtered by the chkInternet column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByChkdiscount(string $chkDiscount) Return ChildAliTransferewalletH objects filtered by the chkDiscount column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByChkother(string $chkOther) Return ChildAliTransferewalletH objects filtered by the chkOther column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliTransferewalletH objects filtered by the txtCash column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliTransferewalletH objects filtered by the txtFuture column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliTransferewalletH objects filtered by the txtTransfer column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliTransferewalletH objects filtered by the ewallet column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliTransferewalletH objects filtered by the txtCredit1 column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliTransferewalletH objects filtered by the txtCredit2 column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliTransferewalletH objects filtered by the txtCredit3 column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTxtinternet(string $txtInternet) Return ChildAliTransferewalletH objects filtered by the txtInternet column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTxtdiscount(string $txtDiscount) Return ChildAliTransferewalletH objects filtered by the txtDiscount column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTxtother(string $txtOther) Return ChildAliTransferewalletH objects filtered by the txtOther column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliTransferewalletH objects filtered by the optionCash column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliTransferewalletH objects filtered by the optionFuture column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliTransferewalletH objects filtered by the optionTransfer column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliTransferewalletH objects filtered by the optionCredit1 column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliTransferewalletH objects filtered by the optionCredit2 column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliTransferewalletH objects filtered by the optionCredit3 column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByOptioninternet(string $optionInternet) Return ChildAliTransferewalletH objects filtered by the optionInternet column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByOptiondiscount(string $optionDiscount) Return ChildAliTransferewalletH objects filtered by the optionDiscount column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByOptionother(string $optionOther) Return ChildAliTransferewalletH objects filtered by the optionOther column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByDiscount(string $discount) Return ChildAliTransferewalletH objects filtered by the discount column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByPrint(int $print) Return ChildAliTransferewalletH objects filtered by the print column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliTransferewalletH objects filtered by the ewallet_before column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliTransferewalletH objects filtered by the ewallet_after column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByIpay(string $ipay) Return ChildAliTransferewalletH objects filtered by the ipay column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByPayType(string $pay_type) Return ChildAliTransferewalletH objects filtered by the pay_type column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByHcancel(int $hcancel) Return ChildAliTransferewalletH objects filtered by the hcancel column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByCaddress(string $caddress) Return ChildAliTransferewalletH objects filtered by the caddress column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByCdistrictid(int $cdistrictId) Return ChildAliTransferewalletH objects filtered by the cdistrictId column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByCamphurid(int $camphurId) Return ChildAliTransferewalletH objects filtered by the camphurId column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByCprovinceid(int $cprovinceId) Return ChildAliTransferewalletH objects filtered by the cprovinceId column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByCzip(string $czip) Return ChildAliTransferewalletH objects filtered by the czip column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findBySender(int $sender) Return ChildAliTransferewalletH objects filtered by the sender column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findBySenderDate(string $sender_date) Return ChildAliTransferewalletH objects filtered by the sender_date column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByReceive(int $receive) Return ChildAliTransferewalletH objects filtered by the receive column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByReceiveDate(string $receive_date) Return ChildAliTransferewalletH objects filtered by the receive_date column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByAsend(int $asend) Return ChildAliTransferewalletH objects filtered by the asend column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByAtoType(int $ato_type) Return ChildAliTransferewalletH objects filtered by the ato_type column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByAtoId(int $ato_id) Return ChildAliTransferewalletH objects filtered by the ato_id column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByOnline(int $online) Return ChildAliTransferewalletH objects filtered by the online column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByHpv(string $hpv) Return ChildAliTransferewalletH objects filtered by the hpv column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByHtotal(string $htotal) Return ChildAliTransferewalletH objects filtered by the htotal column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByHdate(string $hdate) Return ChildAliTransferewalletH objects filtered by the hdate column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByScheck(string $scheck) Return ChildAliTransferewalletH objects filtered by the scheck column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliTransferewalletH objects filtered by the checkportal column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByRcode(int $rcode) Return ChildAliTransferewalletH objects filtered by the rcode column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByBmcauto(int $bmcauto) Return ChildAliTransferewalletH objects filtered by the bmcauto column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByTranstype(int $transtype) Return ChildAliTransferewalletH objects filtered by the transtype column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByPaytype(int $paytype) Return ChildAliTransferewalletH objects filtered by the paytype column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findBySendtype(int $sendtype) Return ChildAliTransferewalletH objects filtered by the sendtype column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByCredittype(int $credittype) Return ChildAliTransferewalletH objects filtered by the credittype column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliTransferewalletH objects filtered by the paydate column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliTransferewalletH objects filtered by the locationbase column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByBprice(string $bprice) Return ChildAliTransferewalletH objects filtered by the bprice column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByMbase(string $mbase) Return ChildAliTransferewalletH objects filtered by the mbase column
 * @method     ChildAliTransferewalletH[]|ObjectCollection findByCrate(string $crate) Return ChildAliTransferewalletH objects filtered by the crate column
 * @method     ChildAliTransferewalletH[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliTransferewalletHQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliTransferewalletHQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliTransferewalletH', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliTransferewalletHQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliTransferewalletHQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliTransferewalletHQuery) {
            return $criteria;
        }
        $query = new ChildAliTransferewalletHQuery();
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
     * @return ChildAliTransferewalletH|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliTransferewalletHTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliTransferewalletHTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliTransferewalletH A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, sano1, sadate, sctime, inv_code, inv_ref, mcode, name_f, name_t, total, tot_pv, tot_bv, tot_fv, tot_weight, usercode, remark, trnf, id, sa_type, uid, lid, dl, cancel, send, txtoption, chkCash, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkInternet, chkDiscount, chkOther, txtCash, txtFuture, txtTransfer, ewallet, txtCredit1, txtCredit2, txtCredit3, txtInternet, txtDiscount, txtOther, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionInternet, optionDiscount, optionOther, discount, print, ewallet_before, ewallet_after, ipay, pay_type, hcancel, caddress, cdistrictId, camphurId, cprovinceId, czip, sender, sender_date, receive, receive_date, asend, ato_type, ato_id, online, hpv, htotal, hdate, scheck, checkportal, rcode, bmcauto, transtype, paytype, sendtype, credittype, paydate, locationbase, bprice, mbase, crate FROM ali_transferewallet_h WHERE id = :p0';
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
            /** @var ChildAliTransferewalletH $obj */
            $obj = new ChildAliTransferewalletH();
            $obj->hydrate($row);
            AliTransferewalletHTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliTransferewalletH|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterBySano1($sano1 = null, $comparison = null)
    {
        if (is_array($sano1)) {
            $useMinMax = false;
            if (isset($sano1['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SANO1, $sano1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sano1['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SANO1, $sano1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_SANO1, $sano1, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterBySctime($sctime = null, $comparison = null)
    {
        if (is_array($sctime)) {
            $useMinMax = false;
            if (isset($sctime['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SCTIME, $sctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sctime['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SCTIME, $sctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_SCTIME, $sctime, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByInvRef($invRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_INV_REF, $invRef, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOT_PV, $totPv, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTotBv($totBv = null, $comparison = null)
    {
        if (is_array($totBv)) {
            $useMinMax = false;
            if (isset($totBv['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOT_BV, $totBv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totBv['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOT_BV, $totBv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOT_BV, $totBv, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTotFv($totFv = null, $comparison = null)
    {
        if (is_array($totFv)) {
            $useMinMax = false;
            if (isset($totFv['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOT_FV, $totFv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totFv['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOT_FV, $totFv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOT_FV, $totFv, $comparison);
    }

    /**
     * Filter the query on the tot_weight column
     *
     * Example usage:
     * <code>
     * $query->filterByTotWeight(1234); // WHERE tot_weight = 1234
     * $query->filterByTotWeight(array(12, 34)); // WHERE tot_weight IN (12, 34)
     * $query->filterByTotWeight(array('min' => 12)); // WHERE tot_weight > 12
     * </code>
     *
     * @param     mixed $totWeight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTotWeight($totWeight = null, $comparison = null)
    {
        if (is_array($totWeight)) {
            $useMinMax = false;
            if (isset($totWeight['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOT_WEIGHT, $totWeight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totWeight['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOT_WEIGHT, $totWeight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TOT_WEIGHT, $totWeight, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (is_array($trnf)) {
            $useMinMax = false;
            if (isset($trnf['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TRNF, $trnf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trnf['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TRNF, $trnf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_LID, $lid, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_SEND, $send, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByChkinternet($chkinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CHKINTERNET, $chkinternet, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByChkdiscount($chkdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CHKDISCOUNT, $chkdiscount, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByChkother($chkother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CHKOTHER, $chkother, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txttransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTxtinternet($txtinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TXTINTERNET, $txtinternet, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTxtdiscount($txtdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TXTDISCOUNT, $txtdiscount, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTxtother($txtother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TXTOTHER, $txtother, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByOptioninternet($optioninternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioninternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_OPTIONINTERNET, $optioninternet, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByOptiondiscount($optiondiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiondiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_OPTIONDISCOUNT, $optiondiscount, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByOptionother($optionother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_OPTIONOTHER, $optionother, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByDiscount($discount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($discount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_DISCOUNT, $discount, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByPrint($print = null, $comparison = null)
    {
        if (is_array($print)) {
            $useMinMax = false;
            if (isset($print['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_PRINT, $print['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($print['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_PRINT, $print['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_PRINT, $print, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByIpay($ipay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipay)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_IPAY, $ipay, $comparison);
    }

    /**
     * Filter the query on the pay_type column
     *
     * Example usage:
     * <code>
     * $query->filterByPayType('fooValue');   // WHERE pay_type = 'fooValue'
     * $query->filterByPayType('%fooValue%', Criteria::LIKE); // WHERE pay_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $payType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByPayType($payType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_PAY_TYPE, $payType, $comparison);
    }

    /**
     * Filter the query on the hcancel column
     *
     * Example usage:
     * <code>
     * $query->filterByHcancel(1234); // WHERE hcancel = 1234
     * $query->filterByHcancel(array(12, 34)); // WHERE hcancel IN (12, 34)
     * $query->filterByHcancel(array('min' => 12)); // WHERE hcancel > 12
     * </code>
     *
     * @param     mixed $hcancel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByHcancel($hcancel = null, $comparison = null)
    {
        if (is_array($hcancel)) {
            $useMinMax = false;
            if (isset($hcancel['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_HCANCEL, $hcancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hcancel['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_HCANCEL, $hcancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_HCANCEL, $hcancel, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByCaddress($caddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($caddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CADDRESS, $caddress, $comparison);
    }

    /**
     * Filter the query on the cdistrictId column
     *
     * Example usage:
     * <code>
     * $query->filterByCdistrictid(1234); // WHERE cdistrictId = 1234
     * $query->filterByCdistrictid(array(12, 34)); // WHERE cdistrictId IN (12, 34)
     * $query->filterByCdistrictid(array('min' => 12)); // WHERE cdistrictId > 12
     * </code>
     *
     * @param     mixed $cdistrictid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByCdistrictid($cdistrictid = null, $comparison = null)
    {
        if (is_array($cdistrictid)) {
            $useMinMax = false;
            if (isset($cdistrictid['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CDISTRICTID, $cdistrictid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cdistrictid['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CDISTRICTID, $cdistrictid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CDISTRICTID, $cdistrictid, $comparison);
    }

    /**
     * Filter the query on the camphurId column
     *
     * Example usage:
     * <code>
     * $query->filterByCamphurid(1234); // WHERE camphurId = 1234
     * $query->filterByCamphurid(array(12, 34)); // WHERE camphurId IN (12, 34)
     * $query->filterByCamphurid(array('min' => 12)); // WHERE camphurId > 12
     * </code>
     *
     * @param     mixed $camphurid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByCamphurid($camphurid = null, $comparison = null)
    {
        if (is_array($camphurid)) {
            $useMinMax = false;
            if (isset($camphurid['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CAMPHURID, $camphurid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($camphurid['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CAMPHURID, $camphurid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CAMPHURID, $camphurid, $comparison);
    }

    /**
     * Filter the query on the cprovinceId column
     *
     * Example usage:
     * <code>
     * $query->filterByCprovinceid(1234); // WHERE cprovinceId = 1234
     * $query->filterByCprovinceid(array(12, 34)); // WHERE cprovinceId IN (12, 34)
     * $query->filterByCprovinceid(array('min' => 12)); // WHERE cprovinceId > 12
     * </code>
     *
     * @param     mixed $cprovinceid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByCprovinceid($cprovinceid = null, $comparison = null)
    {
        if (is_array($cprovinceid)) {
            $useMinMax = false;
            if (isset($cprovinceid['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CPROVINCEID, $cprovinceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cprovinceid['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CPROVINCEID, $cprovinceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CPROVINCEID, $cprovinceid, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByCzip($czip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($czip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CZIP, $czip, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterBySender($sender = null, $comparison = null)
    {
        if (is_array($sender)) {
            $useMinMax = false;
            if (isset($sender['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SENDER, $sender['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sender['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SENDER, $sender['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_SENDER, $sender, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterBySenderDate($senderDate = null, $comparison = null)
    {
        if (is_array($senderDate)) {
            $useMinMax = false;
            if (isset($senderDate['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SENDER_DATE, $senderDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($senderDate['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SENDER_DATE, $senderDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_SENDER_DATE, $senderDate, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByReceive($receive = null, $comparison = null)
    {
        if (is_array($receive)) {
            $useMinMax = false;
            if (isset($receive['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_RECEIVE, $receive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receive['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_RECEIVE, $receive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_RECEIVE, $receive, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByReceiveDate($receiveDate = null, $comparison = null)
    {
        if (is_array($receiveDate)) {
            $useMinMax = false;
            if (isset($receiveDate['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_RECEIVE_DATE, $receiveDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiveDate['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_RECEIVE_DATE, $receiveDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_RECEIVE_DATE, $receiveDate, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByAsend($asend = null, $comparison = null)
    {
        if (is_array($asend)) {
            $useMinMax = false;
            if (isset($asend['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_ASEND, $asend['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($asend['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_ASEND, $asend['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_ASEND, $asend, $comparison);
    }

    /**
     * Filter the query on the ato_type column
     *
     * Example usage:
     * <code>
     * $query->filterByAtoType(1234); // WHERE ato_type = 1234
     * $query->filterByAtoType(array(12, 34)); // WHERE ato_type IN (12, 34)
     * $query->filterByAtoType(array('min' => 12)); // WHERE ato_type > 12
     * </code>
     *
     * @param     mixed $atoType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByAtoType($atoType = null, $comparison = null)
    {
        if (is_array($atoType)) {
            $useMinMax = false;
            if (isset($atoType['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_ATO_TYPE, $atoType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($atoType['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_ATO_TYPE, $atoType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_ATO_TYPE, $atoType, $comparison);
    }

    /**
     * Filter the query on the ato_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAtoId(1234); // WHERE ato_id = 1234
     * $query->filterByAtoId(array(12, 34)); // WHERE ato_id IN (12, 34)
     * $query->filterByAtoId(array('min' => 12)); // WHERE ato_id > 12
     * </code>
     *
     * @param     mixed $atoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByAtoId($atoId = null, $comparison = null)
    {
        if (is_array($atoId)) {
            $useMinMax = false;
            if (isset($atoId['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_ATO_ID, $atoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($atoId['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_ATO_ID, $atoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_ATO_ID, $atoId, $comparison);
    }

    /**
     * Filter the query on the online column
     *
     * Example usage:
     * <code>
     * $query->filterByOnline(1234); // WHERE online = 1234
     * $query->filterByOnline(array(12, 34)); // WHERE online IN (12, 34)
     * $query->filterByOnline(array('min' => 12)); // WHERE online > 12
     * </code>
     *
     * @param     mixed $online The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByOnline($online = null, $comparison = null)
    {
        if (is_array($online)) {
            $useMinMax = false;
            if (isset($online['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_ONLINE, $online['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($online['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_ONLINE, $online['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_ONLINE, $online, $comparison);
    }

    /**
     * Filter the query on the hpv column
     *
     * Example usage:
     * <code>
     * $query->filterByHpv(1234); // WHERE hpv = 1234
     * $query->filterByHpv(array(12, 34)); // WHERE hpv IN (12, 34)
     * $query->filterByHpv(array('min' => 12)); // WHERE hpv > 12
     * </code>
     *
     * @param     mixed $hpv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByHpv($hpv = null, $comparison = null)
    {
        if (is_array($hpv)) {
            $useMinMax = false;
            if (isset($hpv['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_HPV, $hpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hpv['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_HPV, $hpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_HPV, $hpv, $comparison);
    }

    /**
     * Filter the query on the htotal column
     *
     * Example usage:
     * <code>
     * $query->filterByHtotal(1234); // WHERE htotal = 1234
     * $query->filterByHtotal(array(12, 34)); // WHERE htotal IN (12, 34)
     * $query->filterByHtotal(array('min' => 12)); // WHERE htotal > 12
     * </code>
     *
     * @param     mixed $htotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByHtotal($htotal = null, $comparison = null)
    {
        if (is_array($htotal)) {
            $useMinMax = false;
            if (isset($htotal['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_HTOTAL, $htotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($htotal['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_HTOTAL, $htotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_HTOTAL, $htotal, $comparison);
    }

    /**
     * Filter the query on the hdate column
     *
     * Example usage:
     * <code>
     * $query->filterByHdate('2011-03-14'); // WHERE hdate = '2011-03-14'
     * $query->filterByHdate('now'); // WHERE hdate = '2011-03-14'
     * $query->filterByHdate(array('max' => 'yesterday')); // WHERE hdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $hdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByHdate($hdate = null, $comparison = null)
    {
        if (is_array($hdate)) {
            $useMinMax = false;
            if (isset($hdate['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_HDATE, $hdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hdate['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_HDATE, $hdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_HDATE, $hdate, $comparison);
    }

    /**
     * Filter the query on the scheck column
     *
     * Example usage:
     * <code>
     * $query->filterByScheck('fooValue');   // WHERE scheck = 'fooValue'
     * $query->filterByScheck('%fooValue%', Criteria::LIKE); // WHERE scheck LIKE '%fooValue%'
     * </code>
     *
     * @param     string $scheck The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByScheck($scheck = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scheck)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_SCHECK, $scheck, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the bmcauto column
     *
     * Example usage:
     * <code>
     * $query->filterByBmcauto(1234); // WHERE bmcauto = 1234
     * $query->filterByBmcauto(array(12, 34)); // WHERE bmcauto IN (12, 34)
     * $query->filterByBmcauto(array('min' => 12)); // WHERE bmcauto > 12
     * </code>
     *
     * @param     mixed $bmcauto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByBmcauto($bmcauto = null, $comparison = null)
    {
        if (is_array($bmcauto)) {
            $useMinMax = false;
            if (isset($bmcauto['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_BMCAUTO, $bmcauto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bmcauto['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_BMCAUTO, $bmcauto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_BMCAUTO, $bmcauto, $comparison);
    }

    /**
     * Filter the query on the transtype column
     *
     * Example usage:
     * <code>
     * $query->filterByTranstype(1234); // WHERE transtype = 1234
     * $query->filterByTranstype(array(12, 34)); // WHERE transtype IN (12, 34)
     * $query->filterByTranstype(array('min' => 12)); // WHERE transtype > 12
     * </code>
     *
     * @param     mixed $transtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByTranstype($transtype = null, $comparison = null)
    {
        if (is_array($transtype)) {
            $useMinMax = false;
            if (isset($transtype['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TRANSTYPE, $transtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($transtype['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_TRANSTYPE, $transtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_TRANSTYPE, $transtype, $comparison);
    }

    /**
     * Filter the query on the paytype column
     *
     * Example usage:
     * <code>
     * $query->filterByPaytype(1234); // WHERE paytype = 1234
     * $query->filterByPaytype(array(12, 34)); // WHERE paytype IN (12, 34)
     * $query->filterByPaytype(array('min' => 12)); // WHERE paytype > 12
     * </code>
     *
     * @param     mixed $paytype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByPaytype($paytype = null, $comparison = null)
    {
        if (is_array($paytype)) {
            $useMinMax = false;
            if (isset($paytype['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_PAYTYPE, $paytype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paytype['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_PAYTYPE, $paytype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_PAYTYPE, $paytype, $comparison);
    }

    /**
     * Filter the query on the sendtype column
     *
     * Example usage:
     * <code>
     * $query->filterBySendtype(1234); // WHERE sendtype = 1234
     * $query->filterBySendtype(array(12, 34)); // WHERE sendtype IN (12, 34)
     * $query->filterBySendtype(array('min' => 12)); // WHERE sendtype > 12
     * </code>
     *
     * @param     mixed $sendtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterBySendtype($sendtype = null, $comparison = null)
    {
        if (is_array($sendtype)) {
            $useMinMax = false;
            if (isset($sendtype['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SENDTYPE, $sendtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sendtype['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_SENDTYPE, $sendtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_SENDTYPE, $sendtype, $comparison);
    }

    /**
     * Filter the query on the credittype column
     *
     * Example usage:
     * <code>
     * $query->filterByCredittype(1234); // WHERE credittype = 1234
     * $query->filterByCredittype(array(12, 34)); // WHERE credittype IN (12, 34)
     * $query->filterByCredittype(array('min' => 12)); // WHERE credittype > 12
     * </code>
     *
     * @param     mixed $credittype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByCredittype($credittype = null, $comparison = null)
    {
        if (is_array($credittype)) {
            $useMinMax = false;
            if (isset($credittype['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CREDITTYPE, $credittype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($credittype['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CREDITTYPE, $credittype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CREDITTYPE, $credittype, $comparison);
    }

    /**
     * Filter the query on the paydate column
     *
     * Example usage:
     * <code>
     * $query->filterByPaydate('2011-03-14'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate('now'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate(array('max' => 'yesterday')); // WHERE paydate > '2011-03-13'
     * </code>
     *
     * @param     mixed $paydate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (is_array($paydate)) {
            $useMinMax = false;
            if (isset($paydate['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_PAYDATE, $paydate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paydate['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_PAYDATE, $paydate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_PAYDATE, $paydate, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_MBASE, $mbase, $comparison);
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
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliTransferewalletHTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferewalletHTableMap::COL_CRATE, $crate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliTransferewalletH $aliTransferewalletH Object to remove from the list of results
     *
     * @return $this|ChildAliTransferewalletHQuery The current query, for fluid interface
     */
    public function prune($aliTransferewalletH = null)
    {
        if ($aliTransferewalletH) {
            $this->addUsingAlias(AliTransferewalletHTableMap::COL_ID, $aliTransferewalletH->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_transferewallet_h table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransferewalletHTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliTransferewalletHTableMap::clearInstancePool();
            AliTransferewalletHTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransferewalletHTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliTransferewalletHTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliTransferewalletHTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliTransferewalletHTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliTransferewalletHQuery
