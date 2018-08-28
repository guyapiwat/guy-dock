<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliAtoasaleh as ChildAliAtoasaleh;
use CciOrm\CciOrm\AliAtoasalehQuery as ChildAliAtoasalehQuery;
use CciOrm\CciOrm\Map\AliAtoasalehTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_atoasaleh' table.
 *
 *
 *
 * @method     ChildAliAtoasalehQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliAtoasalehQuery orderByPano($order = Criteria::ASC) Order by the pano column
 * @method     ChildAliAtoasalehQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliAtoasalehQuery orderBySctime($order = Criteria::ASC) Order by the sctime column
 * @method     ChildAliAtoasalehQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliAtoasalehQuery orderByInvRef($order = Criteria::ASC) Order by the inv_ref column
 * @method     ChildAliAtoasalehQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliAtoasalehQuery orderBySpCode($order = Criteria::ASC) Order by the sp_code column
 * @method     ChildAliAtoasalehQuery orderBySpPos($order = Criteria::ASC) Order by the sp_pos column
 * @method     ChildAliAtoasalehQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliAtoasalehQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliAtoasalehQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliAtoasalehQuery orderByTotalVat($order = Criteria::ASC) Order by the total_vat column
 * @method     ChildAliAtoasalehQuery orderByTotalNet($order = Criteria::ASC) Order by the total_net column
 * @method     ChildAliAtoasalehQuery orderByTotalInvat($order = Criteria::ASC) Order by the total_invat column
 * @method     ChildAliAtoasalehQuery orderByTotalExvat($order = Criteria::ASC) Order by the total_exvat column
 * @method     ChildAliAtoasalehQuery orderByCustomerTotal($order = Criteria::ASC) Order by the customer_total column
 * @method     ChildAliAtoasalehQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliAtoasalehQuery orderByTotBv($order = Criteria::ASC) Order by the tot_bv column
 * @method     ChildAliAtoasalehQuery orderByTotFv($order = Criteria::ASC) Order by the tot_fv column
 * @method     ChildAliAtoasalehQuery orderByTotSppv($order = Criteria::ASC) Order by the tot_sppv column
 * @method     ChildAliAtoasalehQuery orderByTotWeight($order = Criteria::ASC) Order by the tot_weight column
 * @method     ChildAliAtoasalehQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliAtoasalehQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliAtoasalehQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliAtoasalehQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliAtoasalehQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliAtoasalehQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliAtoasalehQuery orderByUidBranch($order = Criteria::ASC) Order by the uid_branch column
 * @method     ChildAliAtoasalehQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliAtoasalehQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliAtoasalehQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliAtoasalehQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliAtoasalehQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliAtoasalehQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliAtoasalehQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliAtoasalehQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliAtoasalehQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliAtoasalehQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliAtoasalehQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliAtoasalehQuery orderByChkcredit4($order = Criteria::ASC) Order by the chkCredit4 column
 * @method     ChildAliAtoasalehQuery orderByChkinternet($order = Criteria::ASC) Order by the chkInternet column
 * @method     ChildAliAtoasalehQuery orderByChkdiscount($order = Criteria::ASC) Order by the chkDiscount column
 * @method     ChildAliAtoasalehQuery orderByChkother($order = Criteria::ASC) Order by the chkOther column
 * @method     ChildAliAtoasalehQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliAtoasalehQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliAtoasalehQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliAtoasalehQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliAtoasalehQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliAtoasalehQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliAtoasalehQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliAtoasalehQuery orderByTxtcredit4($order = Criteria::ASC) Order by the txtCredit4 column
 * @method     ChildAliAtoasalehQuery orderByTxtinternet($order = Criteria::ASC) Order by the txtInternet column
 * @method     ChildAliAtoasalehQuery orderByTxtdiscount($order = Criteria::ASC) Order by the txtDiscount column
 * @method     ChildAliAtoasalehQuery orderByTxtother($order = Criteria::ASC) Order by the txtOther column
 * @method     ChildAliAtoasalehQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliAtoasalehQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliAtoasalehQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliAtoasalehQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliAtoasalehQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliAtoasalehQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliAtoasalehQuery orderByOptioncredit4($order = Criteria::ASC) Order by the optionCredit4 column
 * @method     ChildAliAtoasalehQuery orderByOptioninternet($order = Criteria::ASC) Order by the optionInternet column
 * @method     ChildAliAtoasalehQuery orderByOptiondiscount($order = Criteria::ASC) Order by the optionDiscount column
 * @method     ChildAliAtoasalehQuery orderByOptionother($order = Criteria::ASC) Order by the optionOther column
 * @method     ChildAliAtoasalehQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildAliAtoasalehQuery orderByPrint($order = Criteria::ASC) Order by the print column
 * @method     ChildAliAtoasalehQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliAtoasalehQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliAtoasalehQuery orderByIpay($order = Criteria::ASC) Order by the ipay column
 * @method     ChildAliAtoasalehQuery orderByPayType($order = Criteria::ASC) Order by the pay_type column
 * @method     ChildAliAtoasalehQuery orderByHcancel($order = Criteria::ASC) Order by the hcancel column
 * @method     ChildAliAtoasalehQuery orderByCaddress($order = Criteria::ASC) Order by the caddress column
 * @method     ChildAliAtoasalehQuery orderByCdistrictid($order = Criteria::ASC) Order by the cdistrictId column
 * @method     ChildAliAtoasalehQuery orderByCamphurid($order = Criteria::ASC) Order by the camphurId column
 * @method     ChildAliAtoasalehQuery orderByCprovinceid($order = Criteria::ASC) Order by the cprovinceId column
 * @method     ChildAliAtoasalehQuery orderByCzip($order = Criteria::ASC) Order by the czip column
 * @method     ChildAliAtoasalehQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method     ChildAliAtoasalehQuery orderBySenderDate($order = Criteria::ASC) Order by the sender_date column
 * @method     ChildAliAtoasalehQuery orderByReceive($order = Criteria::ASC) Order by the receive column
 * @method     ChildAliAtoasalehQuery orderByReceiveDate($order = Criteria::ASC) Order by the receive_date column
 * @method     ChildAliAtoasalehQuery orderByAsend($order = Criteria::ASC) Order by the asend column
 * @method     ChildAliAtoasalehQuery orderByAtoType($order = Criteria::ASC) Order by the ato_type column
 * @method     ChildAliAtoasalehQuery orderByAtoId($order = Criteria::ASC) Order by the ato_id column
 * @method     ChildAliAtoasalehQuery orderByOnline($order = Criteria::ASC) Order by the online column
 * @method     ChildAliAtoasalehQuery orderByHpv($order = Criteria::ASC) Order by the hpv column
 * @method     ChildAliAtoasalehQuery orderByHtotal($order = Criteria::ASC) Order by the htotal column
 * @method     ChildAliAtoasalehQuery orderByHdate($order = Criteria::ASC) Order by the hdate column
 * @method     ChildAliAtoasalehQuery orderByScheck($order = Criteria::ASC) Order by the scheck column
 * @method     ChildAliAtoasalehQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliAtoasalehQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliAtoasalehQuery orderByBmcauto($order = Criteria::ASC) Order by the bmcauto column
 * @method     ChildAliAtoasalehQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliAtoasalehQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 * @method     ChildAliAtoasalehQuery orderByCname($order = Criteria::ASC) Order by the cname column
 * @method     ChildAliAtoasalehQuery orderByCmobile($order = Criteria::ASC) Order by the cmobile column
 * @method     ChildAliAtoasalehQuery orderByUidSender($order = Criteria::ASC) Order by the uid_sender column
 * @method     ChildAliAtoasalehQuery orderByUidReceive($order = Criteria::ASC) Order by the uid_receive column
 * @method     ChildAliAtoasalehQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliAtoasalehQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliAtoasalehQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliAtoasalehQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliAtoasalehQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildAliAtoasalehQuery groupBySano() Group by the sano column
 * @method     ChildAliAtoasalehQuery groupByPano() Group by the pano column
 * @method     ChildAliAtoasalehQuery groupBySadate() Group by the sadate column
 * @method     ChildAliAtoasalehQuery groupBySctime() Group by the sctime column
 * @method     ChildAliAtoasalehQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliAtoasalehQuery groupByInvRef() Group by the inv_ref column
 * @method     ChildAliAtoasalehQuery groupByMcode() Group by the mcode column
 * @method     ChildAliAtoasalehQuery groupBySpCode() Group by the sp_code column
 * @method     ChildAliAtoasalehQuery groupBySpPos() Group by the sp_pos column
 * @method     ChildAliAtoasalehQuery groupByNameF() Group by the name_f column
 * @method     ChildAliAtoasalehQuery groupByNameT() Group by the name_t column
 * @method     ChildAliAtoasalehQuery groupByTotal() Group by the total column
 * @method     ChildAliAtoasalehQuery groupByTotalVat() Group by the total_vat column
 * @method     ChildAliAtoasalehQuery groupByTotalNet() Group by the total_net column
 * @method     ChildAliAtoasalehQuery groupByTotalInvat() Group by the total_invat column
 * @method     ChildAliAtoasalehQuery groupByTotalExvat() Group by the total_exvat column
 * @method     ChildAliAtoasalehQuery groupByCustomerTotal() Group by the customer_total column
 * @method     ChildAliAtoasalehQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliAtoasalehQuery groupByTotBv() Group by the tot_bv column
 * @method     ChildAliAtoasalehQuery groupByTotFv() Group by the tot_fv column
 * @method     ChildAliAtoasalehQuery groupByTotSppv() Group by the tot_sppv column
 * @method     ChildAliAtoasalehQuery groupByTotWeight() Group by the tot_weight column
 * @method     ChildAliAtoasalehQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliAtoasalehQuery groupByRemark() Group by the remark column
 * @method     ChildAliAtoasalehQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliAtoasalehQuery groupById() Group by the id column
 * @method     ChildAliAtoasalehQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliAtoasalehQuery groupByUid() Group by the uid column
 * @method     ChildAliAtoasalehQuery groupByUidBranch() Group by the uid_branch column
 * @method     ChildAliAtoasalehQuery groupByLid() Group by the lid column
 * @method     ChildAliAtoasalehQuery groupByDl() Group by the dl column
 * @method     ChildAliAtoasalehQuery groupByCancel() Group by the cancel column
 * @method     ChildAliAtoasalehQuery groupBySend() Group by the send column
 * @method     ChildAliAtoasalehQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliAtoasalehQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliAtoasalehQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliAtoasalehQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliAtoasalehQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliAtoasalehQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliAtoasalehQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliAtoasalehQuery groupByChkcredit4() Group by the chkCredit4 column
 * @method     ChildAliAtoasalehQuery groupByChkinternet() Group by the chkInternet column
 * @method     ChildAliAtoasalehQuery groupByChkdiscount() Group by the chkDiscount column
 * @method     ChildAliAtoasalehQuery groupByChkother() Group by the chkOther column
 * @method     ChildAliAtoasalehQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliAtoasalehQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliAtoasalehQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliAtoasalehQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliAtoasalehQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliAtoasalehQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliAtoasalehQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliAtoasalehQuery groupByTxtcredit4() Group by the txtCredit4 column
 * @method     ChildAliAtoasalehQuery groupByTxtinternet() Group by the txtInternet column
 * @method     ChildAliAtoasalehQuery groupByTxtdiscount() Group by the txtDiscount column
 * @method     ChildAliAtoasalehQuery groupByTxtother() Group by the txtOther column
 * @method     ChildAliAtoasalehQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliAtoasalehQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliAtoasalehQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliAtoasalehQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliAtoasalehQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliAtoasalehQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliAtoasalehQuery groupByOptioncredit4() Group by the optionCredit4 column
 * @method     ChildAliAtoasalehQuery groupByOptioninternet() Group by the optionInternet column
 * @method     ChildAliAtoasalehQuery groupByOptiondiscount() Group by the optionDiscount column
 * @method     ChildAliAtoasalehQuery groupByOptionother() Group by the optionOther column
 * @method     ChildAliAtoasalehQuery groupByDiscount() Group by the discount column
 * @method     ChildAliAtoasalehQuery groupByPrint() Group by the print column
 * @method     ChildAliAtoasalehQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliAtoasalehQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliAtoasalehQuery groupByIpay() Group by the ipay column
 * @method     ChildAliAtoasalehQuery groupByPayType() Group by the pay_type column
 * @method     ChildAliAtoasalehQuery groupByHcancel() Group by the hcancel column
 * @method     ChildAliAtoasalehQuery groupByCaddress() Group by the caddress column
 * @method     ChildAliAtoasalehQuery groupByCdistrictid() Group by the cdistrictId column
 * @method     ChildAliAtoasalehQuery groupByCamphurid() Group by the camphurId column
 * @method     ChildAliAtoasalehQuery groupByCprovinceid() Group by the cprovinceId column
 * @method     ChildAliAtoasalehQuery groupByCzip() Group by the czip column
 * @method     ChildAliAtoasalehQuery groupBySender() Group by the sender column
 * @method     ChildAliAtoasalehQuery groupBySenderDate() Group by the sender_date column
 * @method     ChildAliAtoasalehQuery groupByReceive() Group by the receive column
 * @method     ChildAliAtoasalehQuery groupByReceiveDate() Group by the receive_date column
 * @method     ChildAliAtoasalehQuery groupByAsend() Group by the asend column
 * @method     ChildAliAtoasalehQuery groupByAtoType() Group by the ato_type column
 * @method     ChildAliAtoasalehQuery groupByAtoId() Group by the ato_id column
 * @method     ChildAliAtoasalehQuery groupByOnline() Group by the online column
 * @method     ChildAliAtoasalehQuery groupByHpv() Group by the hpv column
 * @method     ChildAliAtoasalehQuery groupByHtotal() Group by the htotal column
 * @method     ChildAliAtoasalehQuery groupByHdate() Group by the hdate column
 * @method     ChildAliAtoasalehQuery groupByScheck() Group by the scheck column
 * @method     ChildAliAtoasalehQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliAtoasalehQuery groupByRcode() Group by the rcode column
 * @method     ChildAliAtoasalehQuery groupByBmcauto() Group by the bmcauto column
 * @method     ChildAliAtoasalehQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliAtoasalehQuery groupByUidCancel() Group by the uid_cancel column
 * @method     ChildAliAtoasalehQuery groupByCname() Group by the cname column
 * @method     ChildAliAtoasalehQuery groupByCmobile() Group by the cmobile column
 * @method     ChildAliAtoasalehQuery groupByUidSender() Group by the uid_sender column
 * @method     ChildAliAtoasalehQuery groupByUidReceive() Group by the uid_receive column
 * @method     ChildAliAtoasalehQuery groupByMbase() Group by the mbase column
 * @method     ChildAliAtoasalehQuery groupByBprice() Group by the bprice column
 * @method     ChildAliAtoasalehQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliAtoasalehQuery groupByCrate() Group by the crate column
 * @method     ChildAliAtoasalehQuery groupByStatus() Group by the status column
 *
 * @method     ChildAliAtoasalehQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliAtoasalehQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliAtoasalehQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliAtoasalehQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliAtoasalehQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliAtoasalehQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliAtoasaleh findOne(ConnectionInterface $con = null) Return the first ChildAliAtoasaleh matching the query
 * @method     ChildAliAtoasaleh findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliAtoasaleh matching the query, or a new ChildAliAtoasaleh object populated from the query conditions when no match is found
 *
 * @method     ChildAliAtoasaleh findOneBySano(string $sano) Return the first ChildAliAtoasaleh filtered by the sano column
 * @method     ChildAliAtoasaleh findOneByPano(string $pano) Return the first ChildAliAtoasaleh filtered by the pano column
 * @method     ChildAliAtoasaleh findOneBySadate(string $sadate) Return the first ChildAliAtoasaleh filtered by the sadate column
 * @method     ChildAliAtoasaleh findOneBySctime(string $sctime) Return the first ChildAliAtoasaleh filtered by the sctime column
 * @method     ChildAliAtoasaleh findOneByInvCode(string $inv_code) Return the first ChildAliAtoasaleh filtered by the inv_code column
 * @method     ChildAliAtoasaleh findOneByInvRef(string $inv_ref) Return the first ChildAliAtoasaleh filtered by the inv_ref column
 * @method     ChildAliAtoasaleh findOneByMcode(string $mcode) Return the first ChildAliAtoasaleh filtered by the mcode column
 * @method     ChildAliAtoasaleh findOneBySpCode(string $sp_code) Return the first ChildAliAtoasaleh filtered by the sp_code column
 * @method     ChildAliAtoasaleh findOneBySpPos(string $sp_pos) Return the first ChildAliAtoasaleh filtered by the sp_pos column
 * @method     ChildAliAtoasaleh findOneByNameF(string $name_f) Return the first ChildAliAtoasaleh filtered by the name_f column
 * @method     ChildAliAtoasaleh findOneByNameT(string $name_t) Return the first ChildAliAtoasaleh filtered by the name_t column
 * @method     ChildAliAtoasaleh findOneByTotal(string $total) Return the first ChildAliAtoasaleh filtered by the total column
 * @method     ChildAliAtoasaleh findOneByTotalVat(string $total_vat) Return the first ChildAliAtoasaleh filtered by the total_vat column
 * @method     ChildAliAtoasaleh findOneByTotalNet(string $total_net) Return the first ChildAliAtoasaleh filtered by the total_net column
 * @method     ChildAliAtoasaleh findOneByTotalInvat(string $total_invat) Return the first ChildAliAtoasaleh filtered by the total_invat column
 * @method     ChildAliAtoasaleh findOneByTotalExvat(string $total_exvat) Return the first ChildAliAtoasaleh filtered by the total_exvat column
 * @method     ChildAliAtoasaleh findOneByCustomerTotal(string $customer_total) Return the first ChildAliAtoasaleh filtered by the customer_total column
 * @method     ChildAliAtoasaleh findOneByTotPv(string $tot_pv) Return the first ChildAliAtoasaleh filtered by the tot_pv column
 * @method     ChildAliAtoasaleh findOneByTotBv(string $tot_bv) Return the first ChildAliAtoasaleh filtered by the tot_bv column
 * @method     ChildAliAtoasaleh findOneByTotFv(string $tot_fv) Return the first ChildAliAtoasaleh filtered by the tot_fv column
 * @method     ChildAliAtoasaleh findOneByTotSppv(string $tot_sppv) Return the first ChildAliAtoasaleh filtered by the tot_sppv column
 * @method     ChildAliAtoasaleh findOneByTotWeight(string $tot_weight) Return the first ChildAliAtoasaleh filtered by the tot_weight column
 * @method     ChildAliAtoasaleh findOneByUsercode(string $usercode) Return the first ChildAliAtoasaleh filtered by the usercode column
 * @method     ChildAliAtoasaleh findOneByRemark(string $remark) Return the first ChildAliAtoasaleh filtered by the remark column
 * @method     ChildAliAtoasaleh findOneByTrnf(int $trnf) Return the first ChildAliAtoasaleh filtered by the trnf column
 * @method     ChildAliAtoasaleh findOneById(int $id) Return the first ChildAliAtoasaleh filtered by the id column
 * @method     ChildAliAtoasaleh findOneBySaType(string $sa_type) Return the first ChildAliAtoasaleh filtered by the sa_type column
 * @method     ChildAliAtoasaleh findOneByUid(string $uid) Return the first ChildAliAtoasaleh filtered by the uid column
 * @method     ChildAliAtoasaleh findOneByUidBranch(string $uid_branch) Return the first ChildAliAtoasaleh filtered by the uid_branch column
 * @method     ChildAliAtoasaleh findOneByLid(string $lid) Return the first ChildAliAtoasaleh filtered by the lid column
 * @method     ChildAliAtoasaleh findOneByDl(string $dl) Return the first ChildAliAtoasaleh filtered by the dl column
 * @method     ChildAliAtoasaleh findOneByCancel(int $cancel) Return the first ChildAliAtoasaleh filtered by the cancel column
 * @method     ChildAliAtoasaleh findOneBySend(int $send) Return the first ChildAliAtoasaleh filtered by the send column
 * @method     ChildAliAtoasaleh findOneByTxtoption(string $txtoption) Return the first ChildAliAtoasaleh filtered by the txtoption column
 * @method     ChildAliAtoasaleh findOneByChkcash(string $chkCash) Return the first ChildAliAtoasaleh filtered by the chkCash column
 * @method     ChildAliAtoasaleh findOneByChkfuture(string $chkFuture) Return the first ChildAliAtoasaleh filtered by the chkFuture column
 * @method     ChildAliAtoasaleh findOneByChktransfer(string $chkTransfer) Return the first ChildAliAtoasaleh filtered by the chkTransfer column
 * @method     ChildAliAtoasaleh findOneByChkcredit1(string $chkCredit1) Return the first ChildAliAtoasaleh filtered by the chkCredit1 column
 * @method     ChildAliAtoasaleh findOneByChkcredit2(string $chkCredit2) Return the first ChildAliAtoasaleh filtered by the chkCredit2 column
 * @method     ChildAliAtoasaleh findOneByChkcredit3(string $chkCredit3) Return the first ChildAliAtoasaleh filtered by the chkCredit3 column
 * @method     ChildAliAtoasaleh findOneByChkcredit4(string $chkCredit4) Return the first ChildAliAtoasaleh filtered by the chkCredit4 column
 * @method     ChildAliAtoasaleh findOneByChkinternet(string $chkInternet) Return the first ChildAliAtoasaleh filtered by the chkInternet column
 * @method     ChildAliAtoasaleh findOneByChkdiscount(string $chkDiscount) Return the first ChildAliAtoasaleh filtered by the chkDiscount column
 * @method     ChildAliAtoasaleh findOneByChkother(string $chkOther) Return the first ChildAliAtoasaleh filtered by the chkOther column
 * @method     ChildAliAtoasaleh findOneByTxtcash(string $txtCash) Return the first ChildAliAtoasaleh filtered by the txtCash column
 * @method     ChildAliAtoasaleh findOneByTxtfuture(string $txtFuture) Return the first ChildAliAtoasaleh filtered by the txtFuture column
 * @method     ChildAliAtoasaleh findOneByTxttransfer(string $txtTransfer) Return the first ChildAliAtoasaleh filtered by the txtTransfer column
 * @method     ChildAliAtoasaleh findOneByEwallet(string $ewallet) Return the first ChildAliAtoasaleh filtered by the ewallet column
 * @method     ChildAliAtoasaleh findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliAtoasaleh filtered by the txtCredit1 column
 * @method     ChildAliAtoasaleh findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliAtoasaleh filtered by the txtCredit2 column
 * @method     ChildAliAtoasaleh findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliAtoasaleh filtered by the txtCredit3 column
 * @method     ChildAliAtoasaleh findOneByTxtcredit4(string $txtCredit4) Return the first ChildAliAtoasaleh filtered by the txtCredit4 column
 * @method     ChildAliAtoasaleh findOneByTxtinternet(string $txtInternet) Return the first ChildAliAtoasaleh filtered by the txtInternet column
 * @method     ChildAliAtoasaleh findOneByTxtdiscount(string $txtDiscount) Return the first ChildAliAtoasaleh filtered by the txtDiscount column
 * @method     ChildAliAtoasaleh findOneByTxtother(string $txtOther) Return the first ChildAliAtoasaleh filtered by the txtOther column
 * @method     ChildAliAtoasaleh findOneByOptioncash(string $optionCash) Return the first ChildAliAtoasaleh filtered by the optionCash column
 * @method     ChildAliAtoasaleh findOneByOptionfuture(string $optionFuture) Return the first ChildAliAtoasaleh filtered by the optionFuture column
 * @method     ChildAliAtoasaleh findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliAtoasaleh filtered by the optionTransfer column
 * @method     ChildAliAtoasaleh findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliAtoasaleh filtered by the optionCredit1 column
 * @method     ChildAliAtoasaleh findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliAtoasaleh filtered by the optionCredit2 column
 * @method     ChildAliAtoasaleh findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliAtoasaleh filtered by the optionCredit3 column
 * @method     ChildAliAtoasaleh findOneByOptioncredit4(string $optionCredit4) Return the first ChildAliAtoasaleh filtered by the optionCredit4 column
 * @method     ChildAliAtoasaleh findOneByOptioninternet(string $optionInternet) Return the first ChildAliAtoasaleh filtered by the optionInternet column
 * @method     ChildAliAtoasaleh findOneByOptiondiscount(string $optionDiscount) Return the first ChildAliAtoasaleh filtered by the optionDiscount column
 * @method     ChildAliAtoasaleh findOneByOptionother(string $optionOther) Return the first ChildAliAtoasaleh filtered by the optionOther column
 * @method     ChildAliAtoasaleh findOneByDiscount(string $discount) Return the first ChildAliAtoasaleh filtered by the discount column
 * @method     ChildAliAtoasaleh findOneByPrint(int $print) Return the first ChildAliAtoasaleh filtered by the print column
 * @method     ChildAliAtoasaleh findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliAtoasaleh filtered by the ewallet_before column
 * @method     ChildAliAtoasaleh findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliAtoasaleh filtered by the ewallet_after column
 * @method     ChildAliAtoasaleh findOneByIpay(string $ipay) Return the first ChildAliAtoasaleh filtered by the ipay column
 * @method     ChildAliAtoasaleh findOneByPayType(string $pay_type) Return the first ChildAliAtoasaleh filtered by the pay_type column
 * @method     ChildAliAtoasaleh findOneByHcancel(int $hcancel) Return the first ChildAliAtoasaleh filtered by the hcancel column
 * @method     ChildAliAtoasaleh findOneByCaddress(string $caddress) Return the first ChildAliAtoasaleh filtered by the caddress column
 * @method     ChildAliAtoasaleh findOneByCdistrictid(string $cdistrictId) Return the first ChildAliAtoasaleh filtered by the cdistrictId column
 * @method     ChildAliAtoasaleh findOneByCamphurid(string $camphurId) Return the first ChildAliAtoasaleh filtered by the camphurId column
 * @method     ChildAliAtoasaleh findOneByCprovinceid(string $cprovinceId) Return the first ChildAliAtoasaleh filtered by the cprovinceId column
 * @method     ChildAliAtoasaleh findOneByCzip(string $czip) Return the first ChildAliAtoasaleh filtered by the czip column
 * @method     ChildAliAtoasaleh findOneBySender(int $sender) Return the first ChildAliAtoasaleh filtered by the sender column
 * @method     ChildAliAtoasaleh findOneBySenderDate(string $sender_date) Return the first ChildAliAtoasaleh filtered by the sender_date column
 * @method     ChildAliAtoasaleh findOneByReceive(int $receive) Return the first ChildAliAtoasaleh filtered by the receive column
 * @method     ChildAliAtoasaleh findOneByReceiveDate(string $receive_date) Return the first ChildAliAtoasaleh filtered by the receive_date column
 * @method     ChildAliAtoasaleh findOneByAsend(int $asend) Return the first ChildAliAtoasaleh filtered by the asend column
 * @method     ChildAliAtoasaleh findOneByAtoType(int $ato_type) Return the first ChildAliAtoasaleh filtered by the ato_type column
 * @method     ChildAliAtoasaleh findOneByAtoId(int $ato_id) Return the first ChildAliAtoasaleh filtered by the ato_id column
 * @method     ChildAliAtoasaleh findOneByOnline(int $online) Return the first ChildAliAtoasaleh filtered by the online column
 * @method     ChildAliAtoasaleh findOneByHpv(string $hpv) Return the first ChildAliAtoasaleh filtered by the hpv column
 * @method     ChildAliAtoasaleh findOneByHtotal(string $htotal) Return the first ChildAliAtoasaleh filtered by the htotal column
 * @method     ChildAliAtoasaleh findOneByHdate(string $hdate) Return the first ChildAliAtoasaleh filtered by the hdate column
 * @method     ChildAliAtoasaleh findOneByScheck(string $scheck) Return the first ChildAliAtoasaleh filtered by the scheck column
 * @method     ChildAliAtoasaleh findOneByCheckportal(int $checkportal) Return the first ChildAliAtoasaleh filtered by the checkportal column
 * @method     ChildAliAtoasaleh findOneByRcode(int $rcode) Return the first ChildAliAtoasaleh filtered by the rcode column
 * @method     ChildAliAtoasaleh findOneByBmcauto(int $bmcauto) Return the first ChildAliAtoasaleh filtered by the bmcauto column
 * @method     ChildAliAtoasaleh findOneByCancelDate(string $cancel_date) Return the first ChildAliAtoasaleh filtered by the cancel_date column
 * @method     ChildAliAtoasaleh findOneByUidCancel(string $uid_cancel) Return the first ChildAliAtoasaleh filtered by the uid_cancel column
 * @method     ChildAliAtoasaleh findOneByCname(string $cname) Return the first ChildAliAtoasaleh filtered by the cname column
 * @method     ChildAliAtoasaleh findOneByCmobile(string $cmobile) Return the first ChildAliAtoasaleh filtered by the cmobile column
 * @method     ChildAliAtoasaleh findOneByUidSender(string $uid_sender) Return the first ChildAliAtoasaleh filtered by the uid_sender column
 * @method     ChildAliAtoasaleh findOneByUidReceive(string $uid_receive) Return the first ChildAliAtoasaleh filtered by the uid_receive column
 * @method     ChildAliAtoasaleh findOneByMbase(string $mbase) Return the first ChildAliAtoasaleh filtered by the mbase column
 * @method     ChildAliAtoasaleh findOneByBprice(string $bprice) Return the first ChildAliAtoasaleh filtered by the bprice column
 * @method     ChildAliAtoasaleh findOneByLocationbase(int $locationbase) Return the first ChildAliAtoasaleh filtered by the locationbase column
 * @method     ChildAliAtoasaleh findOneByCrate(string $crate) Return the first ChildAliAtoasaleh filtered by the crate column
 * @method     ChildAliAtoasaleh findOneByStatus(int $status) Return the first ChildAliAtoasaleh filtered by the status column *

 * @method     ChildAliAtoasaleh requirePk($key, ConnectionInterface $con = null) Return the ChildAliAtoasaleh by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOne(ConnectionInterface $con = null) Return the first ChildAliAtoasaleh matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAtoasaleh requireOneBySano(string $sano) Return the first ChildAliAtoasaleh filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByPano(string $pano) Return the first ChildAliAtoasaleh filtered by the pano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneBySadate(string $sadate) Return the first ChildAliAtoasaleh filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneBySctime(string $sctime) Return the first ChildAliAtoasaleh filtered by the sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByInvCode(string $inv_code) Return the first ChildAliAtoasaleh filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByInvRef(string $inv_ref) Return the first ChildAliAtoasaleh filtered by the inv_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByMcode(string $mcode) Return the first ChildAliAtoasaleh filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneBySpCode(string $sp_code) Return the first ChildAliAtoasaleh filtered by the sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneBySpPos(string $sp_pos) Return the first ChildAliAtoasaleh filtered by the sp_pos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByNameF(string $name_f) Return the first ChildAliAtoasaleh filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByNameT(string $name_t) Return the first ChildAliAtoasaleh filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTotal(string $total) Return the first ChildAliAtoasaleh filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTotalVat(string $total_vat) Return the first ChildAliAtoasaleh filtered by the total_vat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTotalNet(string $total_net) Return the first ChildAliAtoasaleh filtered by the total_net column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTotalInvat(string $total_invat) Return the first ChildAliAtoasaleh filtered by the total_invat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTotalExvat(string $total_exvat) Return the first ChildAliAtoasaleh filtered by the total_exvat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByCustomerTotal(string $customer_total) Return the first ChildAliAtoasaleh filtered by the customer_total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTotPv(string $tot_pv) Return the first ChildAliAtoasaleh filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTotBv(string $tot_bv) Return the first ChildAliAtoasaleh filtered by the tot_bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTotFv(string $tot_fv) Return the first ChildAliAtoasaleh filtered by the tot_fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTotSppv(string $tot_sppv) Return the first ChildAliAtoasaleh filtered by the tot_sppv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTotWeight(string $tot_weight) Return the first ChildAliAtoasaleh filtered by the tot_weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByUsercode(string $usercode) Return the first ChildAliAtoasaleh filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByRemark(string $remark) Return the first ChildAliAtoasaleh filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTrnf(int $trnf) Return the first ChildAliAtoasaleh filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneById(int $id) Return the first ChildAliAtoasaleh filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneBySaType(string $sa_type) Return the first ChildAliAtoasaleh filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByUid(string $uid) Return the first ChildAliAtoasaleh filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByUidBranch(string $uid_branch) Return the first ChildAliAtoasaleh filtered by the uid_branch column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByLid(string $lid) Return the first ChildAliAtoasaleh filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByDl(string $dl) Return the first ChildAliAtoasaleh filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByCancel(int $cancel) Return the first ChildAliAtoasaleh filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneBySend(int $send) Return the first ChildAliAtoasaleh filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTxtoption(string $txtoption) Return the first ChildAliAtoasaleh filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByChkcash(string $chkCash) Return the first ChildAliAtoasaleh filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByChkfuture(string $chkFuture) Return the first ChildAliAtoasaleh filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByChktransfer(string $chkTransfer) Return the first ChildAliAtoasaleh filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliAtoasaleh filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliAtoasaleh filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliAtoasaleh filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByChkcredit4(string $chkCredit4) Return the first ChildAliAtoasaleh filtered by the chkCredit4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByChkinternet(string $chkInternet) Return the first ChildAliAtoasaleh filtered by the chkInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByChkdiscount(string $chkDiscount) Return the first ChildAliAtoasaleh filtered by the chkDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByChkother(string $chkOther) Return the first ChildAliAtoasaleh filtered by the chkOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTxtcash(string $txtCash) Return the first ChildAliAtoasaleh filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTxtfuture(string $txtFuture) Return the first ChildAliAtoasaleh filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliAtoasaleh filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByEwallet(string $ewallet) Return the first ChildAliAtoasaleh filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliAtoasaleh filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliAtoasaleh filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliAtoasaleh filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTxtcredit4(string $txtCredit4) Return the first ChildAliAtoasaleh filtered by the txtCredit4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTxtinternet(string $txtInternet) Return the first ChildAliAtoasaleh filtered by the txtInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTxtdiscount(string $txtDiscount) Return the first ChildAliAtoasaleh filtered by the txtDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByTxtother(string $txtOther) Return the first ChildAliAtoasaleh filtered by the txtOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByOptioncash(string $optionCash) Return the first ChildAliAtoasaleh filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByOptionfuture(string $optionFuture) Return the first ChildAliAtoasaleh filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliAtoasaleh filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliAtoasaleh filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliAtoasaleh filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliAtoasaleh filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByOptioncredit4(string $optionCredit4) Return the first ChildAliAtoasaleh filtered by the optionCredit4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByOptioninternet(string $optionInternet) Return the first ChildAliAtoasaleh filtered by the optionInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByOptiondiscount(string $optionDiscount) Return the first ChildAliAtoasaleh filtered by the optionDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByOptionother(string $optionOther) Return the first ChildAliAtoasaleh filtered by the optionOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByDiscount(string $discount) Return the first ChildAliAtoasaleh filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByPrint(int $print) Return the first ChildAliAtoasaleh filtered by the print column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliAtoasaleh filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliAtoasaleh filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByIpay(string $ipay) Return the first ChildAliAtoasaleh filtered by the ipay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByPayType(string $pay_type) Return the first ChildAliAtoasaleh filtered by the pay_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByHcancel(int $hcancel) Return the first ChildAliAtoasaleh filtered by the hcancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByCaddress(string $caddress) Return the first ChildAliAtoasaleh filtered by the caddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByCdistrictid(string $cdistrictId) Return the first ChildAliAtoasaleh filtered by the cdistrictId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByCamphurid(string $camphurId) Return the first ChildAliAtoasaleh filtered by the camphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByCprovinceid(string $cprovinceId) Return the first ChildAliAtoasaleh filtered by the cprovinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByCzip(string $czip) Return the first ChildAliAtoasaleh filtered by the czip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneBySender(int $sender) Return the first ChildAliAtoasaleh filtered by the sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneBySenderDate(string $sender_date) Return the first ChildAliAtoasaleh filtered by the sender_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByReceive(int $receive) Return the first ChildAliAtoasaleh filtered by the receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByReceiveDate(string $receive_date) Return the first ChildAliAtoasaleh filtered by the receive_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByAsend(int $asend) Return the first ChildAliAtoasaleh filtered by the asend column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByAtoType(int $ato_type) Return the first ChildAliAtoasaleh filtered by the ato_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByAtoId(int $ato_id) Return the first ChildAliAtoasaleh filtered by the ato_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByOnline(int $online) Return the first ChildAliAtoasaleh filtered by the online column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByHpv(string $hpv) Return the first ChildAliAtoasaleh filtered by the hpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByHtotal(string $htotal) Return the first ChildAliAtoasaleh filtered by the htotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByHdate(string $hdate) Return the first ChildAliAtoasaleh filtered by the hdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByScheck(string $scheck) Return the first ChildAliAtoasaleh filtered by the scheck column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByCheckportal(int $checkportal) Return the first ChildAliAtoasaleh filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByRcode(int $rcode) Return the first ChildAliAtoasaleh filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByBmcauto(int $bmcauto) Return the first ChildAliAtoasaleh filtered by the bmcauto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByCancelDate(string $cancel_date) Return the first ChildAliAtoasaleh filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByUidCancel(string $uid_cancel) Return the first ChildAliAtoasaleh filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByCname(string $cname) Return the first ChildAliAtoasaleh filtered by the cname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByCmobile(string $cmobile) Return the first ChildAliAtoasaleh filtered by the cmobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByUidSender(string $uid_sender) Return the first ChildAliAtoasaleh filtered by the uid_sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByUidReceive(string $uid_receive) Return the first ChildAliAtoasaleh filtered by the uid_receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByMbase(string $mbase) Return the first ChildAliAtoasaleh filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByBprice(string $bprice) Return the first ChildAliAtoasaleh filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByLocationbase(int $locationbase) Return the first ChildAliAtoasaleh filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByCrate(string $crate) Return the first ChildAliAtoasaleh filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaleh requireOneByStatus(int $status) Return the first ChildAliAtoasaleh filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAtoasaleh[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliAtoasaleh objects based on current ModelCriteria
 * @method     ChildAliAtoasaleh[]|ObjectCollection findBySano(string $sano) Return ChildAliAtoasaleh objects filtered by the sano column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByPano(string $pano) Return ChildAliAtoasaleh objects filtered by the pano column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findBySadate(string $sadate) Return ChildAliAtoasaleh objects filtered by the sadate column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findBySctime(string $sctime) Return ChildAliAtoasaleh objects filtered by the sctime column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliAtoasaleh objects filtered by the inv_code column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByInvRef(string $inv_ref) Return ChildAliAtoasaleh objects filtered by the inv_ref column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByMcode(string $mcode) Return ChildAliAtoasaleh objects filtered by the mcode column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findBySpCode(string $sp_code) Return ChildAliAtoasaleh objects filtered by the sp_code column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findBySpPos(string $sp_pos) Return ChildAliAtoasaleh objects filtered by the sp_pos column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByNameF(string $name_f) Return ChildAliAtoasaleh objects filtered by the name_f column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByNameT(string $name_t) Return ChildAliAtoasaleh objects filtered by the name_t column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTotal(string $total) Return ChildAliAtoasaleh objects filtered by the total column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTotalVat(string $total_vat) Return ChildAliAtoasaleh objects filtered by the total_vat column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTotalNet(string $total_net) Return ChildAliAtoasaleh objects filtered by the total_net column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTotalInvat(string $total_invat) Return ChildAliAtoasaleh objects filtered by the total_invat column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTotalExvat(string $total_exvat) Return ChildAliAtoasaleh objects filtered by the total_exvat column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByCustomerTotal(string $customer_total) Return ChildAliAtoasaleh objects filtered by the customer_total column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliAtoasaleh objects filtered by the tot_pv column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTotBv(string $tot_bv) Return ChildAliAtoasaleh objects filtered by the tot_bv column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTotFv(string $tot_fv) Return ChildAliAtoasaleh objects filtered by the tot_fv column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTotSppv(string $tot_sppv) Return ChildAliAtoasaleh objects filtered by the tot_sppv column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTotWeight(string $tot_weight) Return ChildAliAtoasaleh objects filtered by the tot_weight column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliAtoasaleh objects filtered by the usercode column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByRemark(string $remark) Return ChildAliAtoasaleh objects filtered by the remark column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTrnf(int $trnf) Return ChildAliAtoasaleh objects filtered by the trnf column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findById(int $id) Return ChildAliAtoasaleh objects filtered by the id column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliAtoasaleh objects filtered by the sa_type column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByUid(string $uid) Return ChildAliAtoasaleh objects filtered by the uid column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByUidBranch(string $uid_branch) Return ChildAliAtoasaleh objects filtered by the uid_branch column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByLid(string $lid) Return ChildAliAtoasaleh objects filtered by the lid column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByDl(string $dl) Return ChildAliAtoasaleh objects filtered by the dl column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByCancel(int $cancel) Return ChildAliAtoasaleh objects filtered by the cancel column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findBySend(int $send) Return ChildAliAtoasaleh objects filtered by the send column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliAtoasaleh objects filtered by the txtoption column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliAtoasaleh objects filtered by the chkCash column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliAtoasaleh objects filtered by the chkFuture column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliAtoasaleh objects filtered by the chkTransfer column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliAtoasaleh objects filtered by the chkCredit1 column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliAtoasaleh objects filtered by the chkCredit2 column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliAtoasaleh objects filtered by the chkCredit3 column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByChkcredit4(string $chkCredit4) Return ChildAliAtoasaleh objects filtered by the chkCredit4 column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByChkinternet(string $chkInternet) Return ChildAliAtoasaleh objects filtered by the chkInternet column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByChkdiscount(string $chkDiscount) Return ChildAliAtoasaleh objects filtered by the chkDiscount column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByChkother(string $chkOther) Return ChildAliAtoasaleh objects filtered by the chkOther column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliAtoasaleh objects filtered by the txtCash column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliAtoasaleh objects filtered by the txtFuture column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliAtoasaleh objects filtered by the txtTransfer column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliAtoasaleh objects filtered by the ewallet column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliAtoasaleh objects filtered by the txtCredit1 column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliAtoasaleh objects filtered by the txtCredit2 column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliAtoasaleh objects filtered by the txtCredit3 column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTxtcredit4(string $txtCredit4) Return ChildAliAtoasaleh objects filtered by the txtCredit4 column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTxtinternet(string $txtInternet) Return ChildAliAtoasaleh objects filtered by the txtInternet column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTxtdiscount(string $txtDiscount) Return ChildAliAtoasaleh objects filtered by the txtDiscount column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByTxtother(string $txtOther) Return ChildAliAtoasaleh objects filtered by the txtOther column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliAtoasaleh objects filtered by the optionCash column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliAtoasaleh objects filtered by the optionFuture column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliAtoasaleh objects filtered by the optionTransfer column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliAtoasaleh objects filtered by the optionCredit1 column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliAtoasaleh objects filtered by the optionCredit2 column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliAtoasaleh objects filtered by the optionCredit3 column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByOptioncredit4(string $optionCredit4) Return ChildAliAtoasaleh objects filtered by the optionCredit4 column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByOptioninternet(string $optionInternet) Return ChildAliAtoasaleh objects filtered by the optionInternet column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByOptiondiscount(string $optionDiscount) Return ChildAliAtoasaleh objects filtered by the optionDiscount column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByOptionother(string $optionOther) Return ChildAliAtoasaleh objects filtered by the optionOther column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByDiscount(string $discount) Return ChildAliAtoasaleh objects filtered by the discount column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByPrint(int $print) Return ChildAliAtoasaleh objects filtered by the print column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliAtoasaleh objects filtered by the ewallet_before column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliAtoasaleh objects filtered by the ewallet_after column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByIpay(string $ipay) Return ChildAliAtoasaleh objects filtered by the ipay column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByPayType(string $pay_type) Return ChildAliAtoasaleh objects filtered by the pay_type column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByHcancel(int $hcancel) Return ChildAliAtoasaleh objects filtered by the hcancel column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByCaddress(string $caddress) Return ChildAliAtoasaleh objects filtered by the caddress column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByCdistrictid(string $cdistrictId) Return ChildAliAtoasaleh objects filtered by the cdistrictId column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByCamphurid(string $camphurId) Return ChildAliAtoasaleh objects filtered by the camphurId column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByCprovinceid(string $cprovinceId) Return ChildAliAtoasaleh objects filtered by the cprovinceId column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByCzip(string $czip) Return ChildAliAtoasaleh objects filtered by the czip column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findBySender(int $sender) Return ChildAliAtoasaleh objects filtered by the sender column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findBySenderDate(string $sender_date) Return ChildAliAtoasaleh objects filtered by the sender_date column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByReceive(int $receive) Return ChildAliAtoasaleh objects filtered by the receive column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByReceiveDate(string $receive_date) Return ChildAliAtoasaleh objects filtered by the receive_date column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByAsend(int $asend) Return ChildAliAtoasaleh objects filtered by the asend column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByAtoType(int $ato_type) Return ChildAliAtoasaleh objects filtered by the ato_type column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByAtoId(int $ato_id) Return ChildAliAtoasaleh objects filtered by the ato_id column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByOnline(int $online) Return ChildAliAtoasaleh objects filtered by the online column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByHpv(string $hpv) Return ChildAliAtoasaleh objects filtered by the hpv column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByHtotal(string $htotal) Return ChildAliAtoasaleh objects filtered by the htotal column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByHdate(string $hdate) Return ChildAliAtoasaleh objects filtered by the hdate column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByScheck(string $scheck) Return ChildAliAtoasaleh objects filtered by the scheck column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliAtoasaleh objects filtered by the checkportal column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByRcode(int $rcode) Return ChildAliAtoasaleh objects filtered by the rcode column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByBmcauto(int $bmcauto) Return ChildAliAtoasaleh objects filtered by the bmcauto column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliAtoasaleh objects filtered by the cancel_date column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliAtoasaleh objects filtered by the uid_cancel column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByCname(string $cname) Return ChildAliAtoasaleh objects filtered by the cname column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByCmobile(string $cmobile) Return ChildAliAtoasaleh objects filtered by the cmobile column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByUidSender(string $uid_sender) Return ChildAliAtoasaleh objects filtered by the uid_sender column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByUidReceive(string $uid_receive) Return ChildAliAtoasaleh objects filtered by the uid_receive column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByMbase(string $mbase) Return ChildAliAtoasaleh objects filtered by the mbase column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByBprice(string $bprice) Return ChildAliAtoasaleh objects filtered by the bprice column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliAtoasaleh objects filtered by the locationbase column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByCrate(string $crate) Return ChildAliAtoasaleh objects filtered by the crate column
 * @method     ChildAliAtoasaleh[]|ObjectCollection findByStatus(int $status) Return ChildAliAtoasaleh objects filtered by the status column
 * @method     ChildAliAtoasaleh[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliAtoasalehQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliAtoasalehQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliAtoasaleh', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliAtoasalehQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliAtoasalehQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliAtoasalehQuery) {
            return $criteria;
        }
        $query = new ChildAliAtoasalehQuery();
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
     * @return ChildAliAtoasaleh|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliAtoasalehTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliAtoasalehTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliAtoasaleh A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, pano, sadate, sctime, inv_code, inv_ref, mcode, sp_code, sp_pos, name_f, name_t, total, total_vat, total_net, total_invat, total_exvat, customer_total, tot_pv, tot_bv, tot_fv, tot_sppv, tot_weight, usercode, remark, trnf, id, sa_type, uid, uid_branch, lid, dl, cancel, send, txtoption, chkCash, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkCredit4, chkInternet, chkDiscount, chkOther, txtCash, txtFuture, txtTransfer, ewallet, txtCredit1, txtCredit2, txtCredit3, txtCredit4, txtInternet, txtDiscount, txtOther, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionCredit4, optionInternet, optionDiscount, optionOther, discount, print, ewallet_before, ewallet_after, ipay, pay_type, hcancel, caddress, cdistrictId, camphurId, cprovinceId, czip, sender, sender_date, receive, receive_date, asend, ato_type, ato_id, online, hpv, htotal, hdate, scheck, checkportal, rcode, bmcauto, cancel_date, uid_cancel, cname, cmobile, uid_sender, uid_receive, mbase, bprice, locationbase, crate, status FROM ali_atoasaleh WHERE id = :p0';
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
            /** @var ChildAliAtoasaleh $obj */
            $obj = new ChildAliAtoasaleh();
            $obj->hydrate($row);
            AliAtoasalehTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliAtoasaleh|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_SANO, $sano, $comparison);
    }

    /**
     * Filter the query on the pano column
     *
     * Example usage:
     * <code>
     * $query->filterByPano('fooValue');   // WHERE pano = 'fooValue'
     * $query->filterByPano('%fooValue%', Criteria::LIKE); // WHERE pano LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pano The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByPano($pano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_PANO, $pano, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterBySctime($sctime = null, $comparison = null)
    {
        if (is_array($sctime)) {
            $useMinMax = false;
            if (isset($sctime['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_SCTIME, $sctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sctime['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_SCTIME, $sctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_SCTIME, $sctime, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByInvRef($invRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_INV_REF, $invRef, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the sp_code column
     *
     * Example usage:
     * <code>
     * $query->filterBySpCode('fooValue');   // WHERE sp_code = 'fooValue'
     * $query->filterBySpCode('%fooValue%', Criteria::LIKE); // WHERE sp_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterBySpCode($spCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_SP_CODE, $spCode, $comparison);
    }

    /**
     * Filter the query on the sp_pos column
     *
     * Example usage:
     * <code>
     * $query->filterBySpPos('fooValue');   // WHERE sp_pos = 'fooValue'
     * $query->filterBySpPos('%fooValue%', Criteria::LIKE); // WHERE sp_pos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spPos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterBySpPos($spPos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spPos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_SP_POS, $spPos, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the total_vat column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalVat(1234); // WHERE total_vat = 1234
     * $query->filterByTotalVat(array(12, 34)); // WHERE total_vat IN (12, 34)
     * $query->filterByTotalVat(array('min' => 12)); // WHERE total_vat > 12
     * </code>
     *
     * @param     mixed $totalVat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTotalVat($totalVat = null, $comparison = null)
    {
        if (is_array($totalVat)) {
            $useMinMax = false;
            if (isset($totalVat['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL_VAT, $totalVat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalVat['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL_VAT, $totalVat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL_VAT, $totalVat, $comparison);
    }

    /**
     * Filter the query on the total_net column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalNet(1234); // WHERE total_net = 1234
     * $query->filterByTotalNet(array(12, 34)); // WHERE total_net IN (12, 34)
     * $query->filterByTotalNet(array('min' => 12)); // WHERE total_net > 12
     * </code>
     *
     * @param     mixed $totalNet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTotalNet($totalNet = null, $comparison = null)
    {
        if (is_array($totalNet)) {
            $useMinMax = false;
            if (isset($totalNet['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL_NET, $totalNet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalNet['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL_NET, $totalNet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL_NET, $totalNet, $comparison);
    }

    /**
     * Filter the query on the total_invat column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalInvat(1234); // WHERE total_invat = 1234
     * $query->filterByTotalInvat(array(12, 34)); // WHERE total_invat IN (12, 34)
     * $query->filterByTotalInvat(array('min' => 12)); // WHERE total_invat > 12
     * </code>
     *
     * @param     mixed $totalInvat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTotalInvat($totalInvat = null, $comparison = null)
    {
        if (is_array($totalInvat)) {
            $useMinMax = false;
            if (isset($totalInvat['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL_INVAT, $totalInvat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalInvat['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL_INVAT, $totalInvat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL_INVAT, $totalInvat, $comparison);
    }

    /**
     * Filter the query on the total_exvat column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalExvat(1234); // WHERE total_exvat = 1234
     * $query->filterByTotalExvat(array(12, 34)); // WHERE total_exvat IN (12, 34)
     * $query->filterByTotalExvat(array('min' => 12)); // WHERE total_exvat > 12
     * </code>
     *
     * @param     mixed $totalExvat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTotalExvat($totalExvat = null, $comparison = null)
    {
        if (is_array($totalExvat)) {
            $useMinMax = false;
            if (isset($totalExvat['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL_EXVAT, $totalExvat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalExvat['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL_EXVAT, $totalExvat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TOTAL_EXVAT, $totalExvat, $comparison);
    }

    /**
     * Filter the query on the customer_total column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerTotal(1234); // WHERE customer_total = 1234
     * $query->filterByCustomerTotal(array(12, 34)); // WHERE customer_total IN (12, 34)
     * $query->filterByCustomerTotal(array('min' => 12)); // WHERE customer_total > 12
     * </code>
     *
     * @param     mixed $customerTotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByCustomerTotal($customerTotal = null, $comparison = null)
    {
        if (is_array($customerTotal)) {
            $useMinMax = false;
            if (isset($customerTotal['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_CUSTOMER_TOTAL, $customerTotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerTotal['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_CUSTOMER_TOTAL, $customerTotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CUSTOMER_TOTAL, $customerTotal, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_PV, $totPv, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTotBv($totBv = null, $comparison = null)
    {
        if (is_array($totBv)) {
            $useMinMax = false;
            if (isset($totBv['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_BV, $totBv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totBv['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_BV, $totBv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_BV, $totBv, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTotFv($totFv = null, $comparison = null)
    {
        if (is_array($totFv)) {
            $useMinMax = false;
            if (isset($totFv['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_FV, $totFv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totFv['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_FV, $totFv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_FV, $totFv, $comparison);
    }

    /**
     * Filter the query on the tot_sppv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotSppv(1234); // WHERE tot_sppv = 1234
     * $query->filterByTotSppv(array(12, 34)); // WHERE tot_sppv IN (12, 34)
     * $query->filterByTotSppv(array('min' => 12)); // WHERE tot_sppv > 12
     * </code>
     *
     * @param     mixed $totSppv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTotSppv($totSppv = null, $comparison = null)
    {
        if (is_array($totSppv)) {
            $useMinMax = false;
            if (isset($totSppv['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_SPPV, $totSppv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totSppv['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_SPPV, $totSppv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_SPPV, $totSppv, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTotWeight($totWeight = null, $comparison = null)
    {
        if (is_array($totWeight)) {
            $useMinMax = false;
            if (isset($totWeight['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_WEIGHT, $totWeight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totWeight['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_WEIGHT, $totWeight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TOT_WEIGHT, $totWeight, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (is_array($trnf)) {
            $useMinMax = false;
            if (isset($trnf['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TRNF, $trnf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trnf['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TRNF, $trnf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Filter the query on the uid_branch column
     *
     * Example usage:
     * <code>
     * $query->filterByUidBranch('fooValue');   // WHERE uid_branch = 'fooValue'
     * $query->filterByUidBranch('%fooValue%', Criteria::LIKE); // WHERE uid_branch LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uidBranch The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByUidBranch($uidBranch = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidBranch)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_UID_BRANCH, $uidBranch, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_LID, $lid, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_SEND, $send, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
    }

    /**
     * Filter the query on the chkCredit4 column
     *
     * Example usage:
     * <code>
     * $query->filterByChkcredit4('fooValue');   // WHERE chkCredit4 = 'fooValue'
     * $query->filterByChkcredit4('%fooValue%', Criteria::LIKE); // WHERE chkCredit4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chkcredit4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit4($chkcredit4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CHKCREDIT4, $chkcredit4, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByChkinternet($chkinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CHKINTERNET, $chkinternet, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByChkdiscount($chkdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CHKDISCOUNT, $chkdiscount, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByChkother($chkother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CHKOTHER, $chkother, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (is_array($txtcash)) {
            $useMinMax = false;
            if (isset($txtcash['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCASH, $txtcash['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcash['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCASH, $txtcash['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (is_array($txtfuture)) {
            $useMinMax = false;
            if (isset($txtfuture['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTFUTURE, $txtfuture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtfuture['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTFUTURE, $txtfuture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (is_array($txttransfer)) {
            $useMinMax = false;
            if (isset($txttransfer['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTTRANSFER, $txttransfer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTTRANSFER, $txttransfer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (is_array($txtcredit1)) {
            $useMinMax = false;
            if (isset($txtcredit1['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCREDIT1, $txtcredit1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit1['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCREDIT1, $txtcredit1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (is_array($txtcredit2)) {
            $useMinMax = false;
            if (isset($txtcredit2['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCREDIT2, $txtcredit2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit2['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCREDIT2, $txtcredit2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (is_array($txtcredit3)) {
            $useMinMax = false;
            if (isset($txtcredit3['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCREDIT3, $txtcredit3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit3['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCREDIT3, $txtcredit3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
    }

    /**
     * Filter the query on the txtCredit4 column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtcredit4(1234); // WHERE txtCredit4 = 1234
     * $query->filterByTxtcredit4(array(12, 34)); // WHERE txtCredit4 IN (12, 34)
     * $query->filterByTxtcredit4(array('min' => 12)); // WHERE txtCredit4 > 12
     * </code>
     *
     * @param     mixed $txtcredit4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit4($txtcredit4 = null, $comparison = null)
    {
        if (is_array($txtcredit4)) {
            $useMinMax = false;
            if (isset($txtcredit4['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCREDIT4, $txtcredit4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit4['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCREDIT4, $txtcredit4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTCREDIT4, $txtcredit4, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTxtinternet($txtinternet = null, $comparison = null)
    {
        if (is_array($txtinternet)) {
            $useMinMax = false;
            if (isset($txtinternet['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTINTERNET, $txtinternet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtinternet['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTINTERNET, $txtinternet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTINTERNET, $txtinternet, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTxtdiscount($txtdiscount = null, $comparison = null)
    {
        if (is_array($txtdiscount)) {
            $useMinMax = false;
            if (isset($txtdiscount['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTDISCOUNT, $txtdiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtdiscount['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTDISCOUNT, $txtdiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTDISCOUNT, $txtdiscount, $comparison);
    }

    /**
     * Filter the query on the txtOther column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtother(1234); // WHERE txtOther = 1234
     * $query->filterByTxtother(array(12, 34)); // WHERE txtOther IN (12, 34)
     * $query->filterByTxtother(array('min' => 12)); // WHERE txtOther > 12
     * </code>
     *
     * @param     mixed $txtother The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByTxtother($txtother = null, $comparison = null)
    {
        if (is_array($txtother)) {
            $useMinMax = false;
            if (isset($txtother['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTOTHER, $txtother['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtother['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTOTHER, $txtother['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_TXTOTHER, $txtother, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
    }

    /**
     * Filter the query on the optionCredit4 column
     *
     * Example usage:
     * <code>
     * $query->filterByOptioncredit4('fooValue');   // WHERE optionCredit4 = 'fooValue'
     * $query->filterByOptioncredit4('%fooValue%', Criteria::LIKE); // WHERE optionCredit4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optioncredit4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit4($optioncredit4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_OPTIONCREDIT4, $optioncredit4, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByOptioninternet($optioninternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioninternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_OPTIONINTERNET, $optioninternet, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByOptiondiscount($optiondiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiondiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_OPTIONDISCOUNT, $optiondiscount, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByOptionother($optionother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_OPTIONOTHER, $optionother, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByDiscount($discount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($discount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_DISCOUNT, $discount, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByPrint($print = null, $comparison = null)
    {
        if (is_array($print)) {
            $useMinMax = false;
            if (isset($print['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_PRINT, $print['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($print['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_PRINT, $print['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_PRINT, $print, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByIpay($ipay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipay)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_IPAY, $ipay, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByPayType($payType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_PAY_TYPE, $payType, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByHcancel($hcancel = null, $comparison = null)
    {
        if (is_array($hcancel)) {
            $useMinMax = false;
            if (isset($hcancel['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_HCANCEL, $hcancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hcancel['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_HCANCEL, $hcancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_HCANCEL, $hcancel, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByCaddress($caddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($caddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CADDRESS, $caddress, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByCdistrictid($cdistrictid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cdistrictid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CDISTRICTID, $cdistrictid, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByCamphurid($camphurid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($camphurid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CAMPHURID, $camphurid, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByCprovinceid($cprovinceid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cprovinceid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CPROVINCEID, $cprovinceid, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByCzip($czip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($czip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CZIP, $czip, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterBySender($sender = null, $comparison = null)
    {
        if (is_array($sender)) {
            $useMinMax = false;
            if (isset($sender['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_SENDER, $sender['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sender['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_SENDER, $sender['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_SENDER, $sender, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterBySenderDate($senderDate = null, $comparison = null)
    {
        if (is_array($senderDate)) {
            $useMinMax = false;
            if (isset($senderDate['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_SENDER_DATE, $senderDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($senderDate['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_SENDER_DATE, $senderDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_SENDER_DATE, $senderDate, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByReceive($receive = null, $comparison = null)
    {
        if (is_array($receive)) {
            $useMinMax = false;
            if (isset($receive['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_RECEIVE, $receive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receive['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_RECEIVE, $receive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_RECEIVE, $receive, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByReceiveDate($receiveDate = null, $comparison = null)
    {
        if (is_array($receiveDate)) {
            $useMinMax = false;
            if (isset($receiveDate['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_RECEIVE_DATE, $receiveDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiveDate['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_RECEIVE_DATE, $receiveDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_RECEIVE_DATE, $receiveDate, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByAsend($asend = null, $comparison = null)
    {
        if (is_array($asend)) {
            $useMinMax = false;
            if (isset($asend['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_ASEND, $asend['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($asend['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_ASEND, $asend['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_ASEND, $asend, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByAtoType($atoType = null, $comparison = null)
    {
        if (is_array($atoType)) {
            $useMinMax = false;
            if (isset($atoType['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_ATO_TYPE, $atoType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($atoType['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_ATO_TYPE, $atoType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_ATO_TYPE, $atoType, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByAtoId($atoId = null, $comparison = null)
    {
        if (is_array($atoId)) {
            $useMinMax = false;
            if (isset($atoId['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_ATO_ID, $atoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($atoId['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_ATO_ID, $atoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_ATO_ID, $atoId, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByOnline($online = null, $comparison = null)
    {
        if (is_array($online)) {
            $useMinMax = false;
            if (isset($online['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_ONLINE, $online['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($online['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_ONLINE, $online['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_ONLINE, $online, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByHpv($hpv = null, $comparison = null)
    {
        if (is_array($hpv)) {
            $useMinMax = false;
            if (isset($hpv['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_HPV, $hpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hpv['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_HPV, $hpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_HPV, $hpv, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByHtotal($htotal = null, $comparison = null)
    {
        if (is_array($htotal)) {
            $useMinMax = false;
            if (isset($htotal['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_HTOTAL, $htotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($htotal['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_HTOTAL, $htotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_HTOTAL, $htotal, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByHdate($hdate = null, $comparison = null)
    {
        if (is_array($hdate)) {
            $useMinMax = false;
            if (isset($hdate['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_HDATE, $hdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hdate['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_HDATE, $hdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_HDATE, $hdate, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByScheck($scheck = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scheck)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_SCHECK, $scheck, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByBmcauto($bmcauto = null, $comparison = null)
    {
        if (is_array($bmcauto)) {
            $useMinMax = false;
            if (isset($bmcauto['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_BMCAUTO, $bmcauto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bmcauto['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_BMCAUTO, $bmcauto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_BMCAUTO, $bmcauto, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
    }

    /**
     * Filter the query on the cname column
     *
     * Example usage:
     * <code>
     * $query->filterByCname('fooValue');   // WHERE cname = 'fooValue'
     * $query->filterByCname('%fooValue%', Criteria::LIKE); // WHERE cname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByCname($cname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CNAME, $cname, $comparison);
    }

    /**
     * Filter the query on the cmobile column
     *
     * Example usage:
     * <code>
     * $query->filterByCmobile('fooValue');   // WHERE cmobile = 'fooValue'
     * $query->filterByCmobile('%fooValue%', Criteria::LIKE); // WHERE cmobile LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cmobile The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByCmobile($cmobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmobile)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CMOBILE, $cmobile, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByUidSender($uidSender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidSender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_UID_SENDER, $uidSender, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByUidReceive($uidReceive = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidReceive)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_UID_RECEIVE, $uidReceive, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_MBASE, $mbase, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(AliAtoasalehTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasalehTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliAtoasaleh $aliAtoasaleh Object to remove from the list of results
     *
     * @return $this|ChildAliAtoasalehQuery The current query, for fluid interface
     */
    public function prune($aliAtoasaleh = null)
    {
        if ($aliAtoasaleh) {
            $this->addUsingAlias(AliAtoasalehTableMap::COL_ID, $aliAtoasaleh->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_atoasaleh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAtoasalehTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliAtoasalehTableMap::clearInstancePool();
            AliAtoasalehTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAtoasalehTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliAtoasalehTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliAtoasalehTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliAtoasalehTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliAtoasalehQuery
