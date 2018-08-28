<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliAsaleh as ChildAliAsaleh;
use CciOrm\CciOrm\AliAsalehQuery as ChildAliAsalehQuery;
use CciOrm\CciOrm\Map\AliAsalehTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_asaleh' table.
 *
 *
 *
 * @method     ChildAliAsalehQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliAsalehQuery orderByPano($order = Criteria::ASC) Order by the pano column
 * @method     ChildAliAsalehQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliAsalehQuery orderBySctime($order = Criteria::ASC) Order by the sctime column
 * @method     ChildAliAsalehQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliAsalehQuery orderByInvRef($order = Criteria::ASC) Order by the inv_ref column
 * @method     ChildAliAsalehQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliAsalehQuery orderBySpCode($order = Criteria::ASC) Order by the sp_code column
 * @method     ChildAliAsalehQuery orderBySpPos($order = Criteria::ASC) Order by the sp_pos column
 * @method     ChildAliAsalehQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliAsalehQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliAsalehQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliAsalehQuery orderByTotalVat($order = Criteria::ASC) Order by the total_vat column
 * @method     ChildAliAsalehQuery orderByTotalNet($order = Criteria::ASC) Order by the total_net column
 * @method     ChildAliAsalehQuery orderByTotalInvat($order = Criteria::ASC) Order by the total_invat column
 * @method     ChildAliAsalehQuery orderByTotalExvat($order = Criteria::ASC) Order by the total_exvat column
 * @method     ChildAliAsalehQuery orderByCustomerTotal($order = Criteria::ASC) Order by the customer_total column
 * @method     ChildAliAsalehQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliAsalehQuery orderByTotBv($order = Criteria::ASC) Order by the tot_bv column
 * @method     ChildAliAsalehQuery orderByTotFv($order = Criteria::ASC) Order by the tot_fv column
 * @method     ChildAliAsalehQuery orderByTotSppv($order = Criteria::ASC) Order by the tot_sppv column
 * @method     ChildAliAsalehQuery orderByTotWeight($order = Criteria::ASC) Order by the tot_weight column
 * @method     ChildAliAsalehQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliAsalehQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliAsalehQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliAsalehQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliAsalehQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliAsalehQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliAsalehQuery orderByUidBranch($order = Criteria::ASC) Order by the uid_branch column
 * @method     ChildAliAsalehQuery orderByLid($order = Criteria::ASC) Order by the lid column
 * @method     ChildAliAsalehQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliAsalehQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliAsalehQuery orderBySend($order = Criteria::ASC) Order by the send column
 * @method     ChildAliAsalehQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliAsalehQuery orderByChkcash($order = Criteria::ASC) Order by the chkCash column
 * @method     ChildAliAsalehQuery orderByChkfuture($order = Criteria::ASC) Order by the chkFuture column
 * @method     ChildAliAsalehQuery orderByChktransfer($order = Criteria::ASC) Order by the chkTransfer column
 * @method     ChildAliAsalehQuery orderByChkcredit1($order = Criteria::ASC) Order by the chkCredit1 column
 * @method     ChildAliAsalehQuery orderByChkcredit2($order = Criteria::ASC) Order by the chkCredit2 column
 * @method     ChildAliAsalehQuery orderByChkcredit3($order = Criteria::ASC) Order by the chkCredit3 column
 * @method     ChildAliAsalehQuery orderByChkcredit4($order = Criteria::ASC) Order by the chkCredit4 column
 * @method     ChildAliAsalehQuery orderByChkinternet($order = Criteria::ASC) Order by the chkInternet column
 * @method     ChildAliAsalehQuery orderByChkdiscount($order = Criteria::ASC) Order by the chkDiscount column
 * @method     ChildAliAsalehQuery orderByChkother($order = Criteria::ASC) Order by the chkOther column
 * @method     ChildAliAsalehQuery orderByTxtcash($order = Criteria::ASC) Order by the txtCash column
 * @method     ChildAliAsalehQuery orderByTxtfuture($order = Criteria::ASC) Order by the txtFuture column
 * @method     ChildAliAsalehQuery orderByTxttransfer($order = Criteria::ASC) Order by the txtTransfer column
 * @method     ChildAliAsalehQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliAsalehQuery orderByTxtcredit1($order = Criteria::ASC) Order by the txtCredit1 column
 * @method     ChildAliAsalehQuery orderByTxtcredit2($order = Criteria::ASC) Order by the txtCredit2 column
 * @method     ChildAliAsalehQuery orderByTxtcredit3($order = Criteria::ASC) Order by the txtCredit3 column
 * @method     ChildAliAsalehQuery orderByTxtcredit4($order = Criteria::ASC) Order by the txtCredit4 column
 * @method     ChildAliAsalehQuery orderByTxtinternet($order = Criteria::ASC) Order by the txtInternet column
 * @method     ChildAliAsalehQuery orderByTxtdiscount($order = Criteria::ASC) Order by the txtDiscount column
 * @method     ChildAliAsalehQuery orderByTxtother($order = Criteria::ASC) Order by the txtOther column
 * @method     ChildAliAsalehQuery orderByTxtsending($order = Criteria::ASC) Order by the txtSending column
 * @method     ChildAliAsalehQuery orderByOptioncash($order = Criteria::ASC) Order by the optionCash column
 * @method     ChildAliAsalehQuery orderByOptionfuture($order = Criteria::ASC) Order by the optionFuture column
 * @method     ChildAliAsalehQuery orderByOptiontransfer($order = Criteria::ASC) Order by the optionTransfer column
 * @method     ChildAliAsalehQuery orderByOptioncredit1($order = Criteria::ASC) Order by the optionCredit1 column
 * @method     ChildAliAsalehQuery orderByOptioncredit2($order = Criteria::ASC) Order by the optionCredit2 column
 * @method     ChildAliAsalehQuery orderByOptioncredit3($order = Criteria::ASC) Order by the optionCredit3 column
 * @method     ChildAliAsalehQuery orderByOptioncredit4($order = Criteria::ASC) Order by the optionCredit4 column
 * @method     ChildAliAsalehQuery orderByOptioninternet($order = Criteria::ASC) Order by the optionInternet column
 * @method     ChildAliAsalehQuery orderByOptiondiscount($order = Criteria::ASC) Order by the optionDiscount column
 * @method     ChildAliAsalehQuery orderByOptionother($order = Criteria::ASC) Order by the optionOther column
 * @method     ChildAliAsalehQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildAliAsalehQuery orderByPrint($order = Criteria::ASC) Order by the print column
 * @method     ChildAliAsalehQuery orderByEwalletBefore($order = Criteria::ASC) Order by the ewallet_before column
 * @method     ChildAliAsalehQuery orderByEwalletAfter($order = Criteria::ASC) Order by the ewallet_after column
 * @method     ChildAliAsalehQuery orderByIpay($order = Criteria::ASC) Order by the ipay column
 * @method     ChildAliAsalehQuery orderByPayType($order = Criteria::ASC) Order by the pay_type column
 * @method     ChildAliAsalehQuery orderByHcancel($order = Criteria::ASC) Order by the hcancel column
 * @method     ChildAliAsalehQuery orderByCaddress($order = Criteria::ASC) Order by the caddress column
 * @method     ChildAliAsalehQuery orderByCdistrictid($order = Criteria::ASC) Order by the cdistrictId column
 * @method     ChildAliAsalehQuery orderByCamphurid($order = Criteria::ASC) Order by the camphurId column
 * @method     ChildAliAsalehQuery orderByCprovinceid($order = Criteria::ASC) Order by the cprovinceId column
 * @method     ChildAliAsalehQuery orderByCzip($order = Criteria::ASC) Order by the czip column
 * @method     ChildAliAsalehQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method     ChildAliAsalehQuery orderBySenderDate($order = Criteria::ASC) Order by the sender_date column
 * @method     ChildAliAsalehQuery orderByReceive($order = Criteria::ASC) Order by the receive column
 * @method     ChildAliAsalehQuery orderByReceiveDate($order = Criteria::ASC) Order by the receive_date column
 * @method     ChildAliAsalehQuery orderByAsend($order = Criteria::ASC) Order by the asend column
 * @method     ChildAliAsalehQuery orderByAtoType($order = Criteria::ASC) Order by the ato_type column
 * @method     ChildAliAsalehQuery orderByAtoId($order = Criteria::ASC) Order by the ato_id column
 * @method     ChildAliAsalehQuery orderByOnline($order = Criteria::ASC) Order by the online column
 * @method     ChildAliAsalehQuery orderByHpv($order = Criteria::ASC) Order by the hpv column
 * @method     ChildAliAsalehQuery orderByHtotal($order = Criteria::ASC) Order by the htotal column
 * @method     ChildAliAsalehQuery orderByHdate($order = Criteria::ASC) Order by the hdate column
 * @method     ChildAliAsalehQuery orderByScheck($order = Criteria::ASC) Order by the scheck column
 * @method     ChildAliAsalehQuery orderByCheckportal($order = Criteria::ASC) Order by the checkportal column
 * @method     ChildAliAsalehQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliAsalehQuery orderByBmcauto($order = Criteria::ASC) Order by the bmcauto column
 * @method     ChildAliAsalehQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliAsalehQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 * @method     ChildAliAsalehQuery orderByCname($order = Criteria::ASC) Order by the cname column
 * @method     ChildAliAsalehQuery orderByCmobile($order = Criteria::ASC) Order by the cmobile column
 * @method     ChildAliAsalehQuery orderByUidSender($order = Criteria::ASC) Order by the uid_sender column
 * @method     ChildAliAsalehQuery orderByUidReceive($order = Criteria::ASC) Order by the uid_receive column
 * @method     ChildAliAsalehQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliAsalehQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliAsalehQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliAsalehQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliAsalehQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliAsalehQuery orderByRef($order = Criteria::ASC) Order by the ref column
 * @method     ChildAliAsalehQuery orderBySelectcash($order = Criteria::ASC) Order by the selectCash column
 * @method     ChildAliAsalehQuery orderBySelecttransfer($order = Criteria::ASC) Order by the selectTransfer column
 * @method     ChildAliAsalehQuery orderBySelectcredit1($order = Criteria::ASC) Order by the selectCredit1 column
 * @method     ChildAliAsalehQuery orderBySelectcredit2($order = Criteria::ASC) Order by the selectCredit2 column
 * @method     ChildAliAsalehQuery orderBySelectcredit3($order = Criteria::ASC) Order by the selectCredit3 column
 * @method     ChildAliAsalehQuery orderBySelectdiscount($order = Criteria::ASC) Order by the selectDiscount column
 * @method     ChildAliAsalehQuery orderBySelectinternet($order = Criteria::ASC) Order by the selectInternet column
 * @method     ChildAliAsalehQuery orderByTxtvoucher($order = Criteria::ASC) Order by the txtVoucher column
 * @method     ChildAliAsalehQuery orderByOptionvoucher($order = Criteria::ASC) Order by the optionVoucher column
 * @method     ChildAliAsalehQuery orderBySelectvoucher($order = Criteria::ASC) Order by the selectVoucher column
 * @method     ChildAliAsalehQuery orderByTxttransfer1($order = Criteria::ASC) Order by the txtTransfer1 column
 * @method     ChildAliAsalehQuery orderByOptiontransfer1($order = Criteria::ASC) Order by the optionTransfer1 column
 * @method     ChildAliAsalehQuery orderBySelecttransfer1($order = Criteria::ASC) Order by the selectTransfer1 column
 * @method     ChildAliAsalehQuery orderByTxttransfer2($order = Criteria::ASC) Order by the txtTransfer2 column
 * @method     ChildAliAsalehQuery orderByOptiontransfer2($order = Criteria::ASC) Order by the optionTransfer2 column
 * @method     ChildAliAsalehQuery orderBySelecttransfer2($order = Criteria::ASC) Order by the selectTransfer2 column
 * @method     ChildAliAsalehQuery orderByTxttransfer3($order = Criteria::ASC) Order by the txtTransfer3 column
 * @method     ChildAliAsalehQuery orderByOptiontransfer3($order = Criteria::ASC) Order by the optionTransfer3 column
 * @method     ChildAliAsalehQuery orderBySelecttransfer3($order = Criteria::ASC) Order by the selectTransfer3 column
 * @method     ChildAliAsalehQuery orderByStatusPackage($order = Criteria::ASC) Order by the status_package column
 *
 * @method     ChildAliAsalehQuery groupBySano() Group by the sano column
 * @method     ChildAliAsalehQuery groupByPano() Group by the pano column
 * @method     ChildAliAsalehQuery groupBySadate() Group by the sadate column
 * @method     ChildAliAsalehQuery groupBySctime() Group by the sctime column
 * @method     ChildAliAsalehQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliAsalehQuery groupByInvRef() Group by the inv_ref column
 * @method     ChildAliAsalehQuery groupByMcode() Group by the mcode column
 * @method     ChildAliAsalehQuery groupBySpCode() Group by the sp_code column
 * @method     ChildAliAsalehQuery groupBySpPos() Group by the sp_pos column
 * @method     ChildAliAsalehQuery groupByNameF() Group by the name_f column
 * @method     ChildAliAsalehQuery groupByNameT() Group by the name_t column
 * @method     ChildAliAsalehQuery groupByTotal() Group by the total column
 * @method     ChildAliAsalehQuery groupByTotalVat() Group by the total_vat column
 * @method     ChildAliAsalehQuery groupByTotalNet() Group by the total_net column
 * @method     ChildAliAsalehQuery groupByTotalInvat() Group by the total_invat column
 * @method     ChildAliAsalehQuery groupByTotalExvat() Group by the total_exvat column
 * @method     ChildAliAsalehQuery groupByCustomerTotal() Group by the customer_total column
 * @method     ChildAliAsalehQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliAsalehQuery groupByTotBv() Group by the tot_bv column
 * @method     ChildAliAsalehQuery groupByTotFv() Group by the tot_fv column
 * @method     ChildAliAsalehQuery groupByTotSppv() Group by the tot_sppv column
 * @method     ChildAliAsalehQuery groupByTotWeight() Group by the tot_weight column
 * @method     ChildAliAsalehQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliAsalehQuery groupByRemark() Group by the remark column
 * @method     ChildAliAsalehQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliAsalehQuery groupById() Group by the id column
 * @method     ChildAliAsalehQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliAsalehQuery groupByUid() Group by the uid column
 * @method     ChildAliAsalehQuery groupByUidBranch() Group by the uid_branch column
 * @method     ChildAliAsalehQuery groupByLid() Group by the lid column
 * @method     ChildAliAsalehQuery groupByDl() Group by the dl column
 * @method     ChildAliAsalehQuery groupByCancel() Group by the cancel column
 * @method     ChildAliAsalehQuery groupBySend() Group by the send column
 * @method     ChildAliAsalehQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliAsalehQuery groupByChkcash() Group by the chkCash column
 * @method     ChildAliAsalehQuery groupByChkfuture() Group by the chkFuture column
 * @method     ChildAliAsalehQuery groupByChktransfer() Group by the chkTransfer column
 * @method     ChildAliAsalehQuery groupByChkcredit1() Group by the chkCredit1 column
 * @method     ChildAliAsalehQuery groupByChkcredit2() Group by the chkCredit2 column
 * @method     ChildAliAsalehQuery groupByChkcredit3() Group by the chkCredit3 column
 * @method     ChildAliAsalehQuery groupByChkcredit4() Group by the chkCredit4 column
 * @method     ChildAliAsalehQuery groupByChkinternet() Group by the chkInternet column
 * @method     ChildAliAsalehQuery groupByChkdiscount() Group by the chkDiscount column
 * @method     ChildAliAsalehQuery groupByChkother() Group by the chkOther column
 * @method     ChildAliAsalehQuery groupByTxtcash() Group by the txtCash column
 * @method     ChildAliAsalehQuery groupByTxtfuture() Group by the txtFuture column
 * @method     ChildAliAsalehQuery groupByTxttransfer() Group by the txtTransfer column
 * @method     ChildAliAsalehQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliAsalehQuery groupByTxtcredit1() Group by the txtCredit1 column
 * @method     ChildAliAsalehQuery groupByTxtcredit2() Group by the txtCredit2 column
 * @method     ChildAliAsalehQuery groupByTxtcredit3() Group by the txtCredit3 column
 * @method     ChildAliAsalehQuery groupByTxtcredit4() Group by the txtCredit4 column
 * @method     ChildAliAsalehQuery groupByTxtinternet() Group by the txtInternet column
 * @method     ChildAliAsalehQuery groupByTxtdiscount() Group by the txtDiscount column
 * @method     ChildAliAsalehQuery groupByTxtother() Group by the txtOther column
 * @method     ChildAliAsalehQuery groupByTxtsending() Group by the txtSending column
 * @method     ChildAliAsalehQuery groupByOptioncash() Group by the optionCash column
 * @method     ChildAliAsalehQuery groupByOptionfuture() Group by the optionFuture column
 * @method     ChildAliAsalehQuery groupByOptiontransfer() Group by the optionTransfer column
 * @method     ChildAliAsalehQuery groupByOptioncredit1() Group by the optionCredit1 column
 * @method     ChildAliAsalehQuery groupByOptioncredit2() Group by the optionCredit2 column
 * @method     ChildAliAsalehQuery groupByOptioncredit3() Group by the optionCredit3 column
 * @method     ChildAliAsalehQuery groupByOptioncredit4() Group by the optionCredit4 column
 * @method     ChildAliAsalehQuery groupByOptioninternet() Group by the optionInternet column
 * @method     ChildAliAsalehQuery groupByOptiondiscount() Group by the optionDiscount column
 * @method     ChildAliAsalehQuery groupByOptionother() Group by the optionOther column
 * @method     ChildAliAsalehQuery groupByDiscount() Group by the discount column
 * @method     ChildAliAsalehQuery groupByPrint() Group by the print column
 * @method     ChildAliAsalehQuery groupByEwalletBefore() Group by the ewallet_before column
 * @method     ChildAliAsalehQuery groupByEwalletAfter() Group by the ewallet_after column
 * @method     ChildAliAsalehQuery groupByIpay() Group by the ipay column
 * @method     ChildAliAsalehQuery groupByPayType() Group by the pay_type column
 * @method     ChildAliAsalehQuery groupByHcancel() Group by the hcancel column
 * @method     ChildAliAsalehQuery groupByCaddress() Group by the caddress column
 * @method     ChildAliAsalehQuery groupByCdistrictid() Group by the cdistrictId column
 * @method     ChildAliAsalehQuery groupByCamphurid() Group by the camphurId column
 * @method     ChildAliAsalehQuery groupByCprovinceid() Group by the cprovinceId column
 * @method     ChildAliAsalehQuery groupByCzip() Group by the czip column
 * @method     ChildAliAsalehQuery groupBySender() Group by the sender column
 * @method     ChildAliAsalehQuery groupBySenderDate() Group by the sender_date column
 * @method     ChildAliAsalehQuery groupByReceive() Group by the receive column
 * @method     ChildAliAsalehQuery groupByReceiveDate() Group by the receive_date column
 * @method     ChildAliAsalehQuery groupByAsend() Group by the asend column
 * @method     ChildAliAsalehQuery groupByAtoType() Group by the ato_type column
 * @method     ChildAliAsalehQuery groupByAtoId() Group by the ato_id column
 * @method     ChildAliAsalehQuery groupByOnline() Group by the online column
 * @method     ChildAliAsalehQuery groupByHpv() Group by the hpv column
 * @method     ChildAliAsalehQuery groupByHtotal() Group by the htotal column
 * @method     ChildAliAsalehQuery groupByHdate() Group by the hdate column
 * @method     ChildAliAsalehQuery groupByScheck() Group by the scheck column
 * @method     ChildAliAsalehQuery groupByCheckportal() Group by the checkportal column
 * @method     ChildAliAsalehQuery groupByRcode() Group by the rcode column
 * @method     ChildAliAsalehQuery groupByBmcauto() Group by the bmcauto column
 * @method     ChildAliAsalehQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliAsalehQuery groupByUidCancel() Group by the uid_cancel column
 * @method     ChildAliAsalehQuery groupByCname() Group by the cname column
 * @method     ChildAliAsalehQuery groupByCmobile() Group by the cmobile column
 * @method     ChildAliAsalehQuery groupByUidSender() Group by the uid_sender column
 * @method     ChildAliAsalehQuery groupByUidReceive() Group by the uid_receive column
 * @method     ChildAliAsalehQuery groupByMbase() Group by the mbase column
 * @method     ChildAliAsalehQuery groupByBprice() Group by the bprice column
 * @method     ChildAliAsalehQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliAsalehQuery groupByCrate() Group by the crate column
 * @method     ChildAliAsalehQuery groupByStatus() Group by the status column
 * @method     ChildAliAsalehQuery groupByRef() Group by the ref column
 * @method     ChildAliAsalehQuery groupBySelectcash() Group by the selectCash column
 * @method     ChildAliAsalehQuery groupBySelecttransfer() Group by the selectTransfer column
 * @method     ChildAliAsalehQuery groupBySelectcredit1() Group by the selectCredit1 column
 * @method     ChildAliAsalehQuery groupBySelectcredit2() Group by the selectCredit2 column
 * @method     ChildAliAsalehQuery groupBySelectcredit3() Group by the selectCredit3 column
 * @method     ChildAliAsalehQuery groupBySelectdiscount() Group by the selectDiscount column
 * @method     ChildAliAsalehQuery groupBySelectinternet() Group by the selectInternet column
 * @method     ChildAliAsalehQuery groupByTxtvoucher() Group by the txtVoucher column
 * @method     ChildAliAsalehQuery groupByOptionvoucher() Group by the optionVoucher column
 * @method     ChildAliAsalehQuery groupBySelectvoucher() Group by the selectVoucher column
 * @method     ChildAliAsalehQuery groupByTxttransfer1() Group by the txtTransfer1 column
 * @method     ChildAliAsalehQuery groupByOptiontransfer1() Group by the optionTransfer1 column
 * @method     ChildAliAsalehQuery groupBySelecttransfer1() Group by the selectTransfer1 column
 * @method     ChildAliAsalehQuery groupByTxttransfer2() Group by the txtTransfer2 column
 * @method     ChildAliAsalehQuery groupByOptiontransfer2() Group by the optionTransfer2 column
 * @method     ChildAliAsalehQuery groupBySelecttransfer2() Group by the selectTransfer2 column
 * @method     ChildAliAsalehQuery groupByTxttransfer3() Group by the txtTransfer3 column
 * @method     ChildAliAsalehQuery groupByOptiontransfer3() Group by the optionTransfer3 column
 * @method     ChildAliAsalehQuery groupBySelecttransfer3() Group by the selectTransfer3 column
 * @method     ChildAliAsalehQuery groupByStatusPackage() Group by the status_package column
 *
 * @method     ChildAliAsalehQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliAsalehQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliAsalehQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliAsalehQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliAsalehQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliAsalehQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliAsaleh findOne(ConnectionInterface $con = null) Return the first ChildAliAsaleh matching the query
 * @method     ChildAliAsaleh findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliAsaleh matching the query, or a new ChildAliAsaleh object populated from the query conditions when no match is found
 *
 * @method     ChildAliAsaleh findOneBySano(string $sano) Return the first ChildAliAsaleh filtered by the sano column
 * @method     ChildAliAsaleh findOneByPano(string $pano) Return the first ChildAliAsaleh filtered by the pano column
 * @method     ChildAliAsaleh findOneBySadate(string $sadate) Return the first ChildAliAsaleh filtered by the sadate column
 * @method     ChildAliAsaleh findOneBySctime(string $sctime) Return the first ChildAliAsaleh filtered by the sctime column
 * @method     ChildAliAsaleh findOneByInvCode(string $inv_code) Return the first ChildAliAsaleh filtered by the inv_code column
 * @method     ChildAliAsaleh findOneByInvRef(string $inv_ref) Return the first ChildAliAsaleh filtered by the inv_ref column
 * @method     ChildAliAsaleh findOneByMcode(string $mcode) Return the first ChildAliAsaleh filtered by the mcode column
 * @method     ChildAliAsaleh findOneBySpCode(string $sp_code) Return the first ChildAliAsaleh filtered by the sp_code column
 * @method     ChildAliAsaleh findOneBySpPos(string $sp_pos) Return the first ChildAliAsaleh filtered by the sp_pos column
 * @method     ChildAliAsaleh findOneByNameF(string $name_f) Return the first ChildAliAsaleh filtered by the name_f column
 * @method     ChildAliAsaleh findOneByNameT(string $name_t) Return the first ChildAliAsaleh filtered by the name_t column
 * @method     ChildAliAsaleh findOneByTotal(string $total) Return the first ChildAliAsaleh filtered by the total column
 * @method     ChildAliAsaleh findOneByTotalVat(string $total_vat) Return the first ChildAliAsaleh filtered by the total_vat column
 * @method     ChildAliAsaleh findOneByTotalNet(string $total_net) Return the first ChildAliAsaleh filtered by the total_net column
 * @method     ChildAliAsaleh findOneByTotalInvat(string $total_invat) Return the first ChildAliAsaleh filtered by the total_invat column
 * @method     ChildAliAsaleh findOneByTotalExvat(string $total_exvat) Return the first ChildAliAsaleh filtered by the total_exvat column
 * @method     ChildAliAsaleh findOneByCustomerTotal(string $customer_total) Return the first ChildAliAsaleh filtered by the customer_total column
 * @method     ChildAliAsaleh findOneByTotPv(string $tot_pv) Return the first ChildAliAsaleh filtered by the tot_pv column
 * @method     ChildAliAsaleh findOneByTotBv(string $tot_bv) Return the first ChildAliAsaleh filtered by the tot_bv column
 * @method     ChildAliAsaleh findOneByTotFv(string $tot_fv) Return the first ChildAliAsaleh filtered by the tot_fv column
 * @method     ChildAliAsaleh findOneByTotSppv(string $tot_sppv) Return the first ChildAliAsaleh filtered by the tot_sppv column
 * @method     ChildAliAsaleh findOneByTotWeight(string $tot_weight) Return the first ChildAliAsaleh filtered by the tot_weight column
 * @method     ChildAliAsaleh findOneByUsercode(string $usercode) Return the first ChildAliAsaleh filtered by the usercode column
 * @method     ChildAliAsaleh findOneByRemark(string $remark) Return the first ChildAliAsaleh filtered by the remark column
 * @method     ChildAliAsaleh findOneByTrnf(int $trnf) Return the first ChildAliAsaleh filtered by the trnf column
 * @method     ChildAliAsaleh findOneById(int $id) Return the first ChildAliAsaleh filtered by the id column
 * @method     ChildAliAsaleh findOneBySaType(string $sa_type) Return the first ChildAliAsaleh filtered by the sa_type column
 * @method     ChildAliAsaleh findOneByUid(string $uid) Return the first ChildAliAsaleh filtered by the uid column
 * @method     ChildAliAsaleh findOneByUidBranch(string $uid_branch) Return the first ChildAliAsaleh filtered by the uid_branch column
 * @method     ChildAliAsaleh findOneByLid(string $lid) Return the first ChildAliAsaleh filtered by the lid column
 * @method     ChildAliAsaleh findOneByDl(string $dl) Return the first ChildAliAsaleh filtered by the dl column
 * @method     ChildAliAsaleh findOneByCancel(int $cancel) Return the first ChildAliAsaleh filtered by the cancel column
 * @method     ChildAliAsaleh findOneBySend(int $send) Return the first ChildAliAsaleh filtered by the send column
 * @method     ChildAliAsaleh findOneByTxtoption(string $txtoption) Return the first ChildAliAsaleh filtered by the txtoption column
 * @method     ChildAliAsaleh findOneByChkcash(string $chkCash) Return the first ChildAliAsaleh filtered by the chkCash column
 * @method     ChildAliAsaleh findOneByChkfuture(string $chkFuture) Return the first ChildAliAsaleh filtered by the chkFuture column
 * @method     ChildAliAsaleh findOneByChktransfer(string $chkTransfer) Return the first ChildAliAsaleh filtered by the chkTransfer column
 * @method     ChildAliAsaleh findOneByChkcredit1(string $chkCredit1) Return the first ChildAliAsaleh filtered by the chkCredit1 column
 * @method     ChildAliAsaleh findOneByChkcredit2(string $chkCredit2) Return the first ChildAliAsaleh filtered by the chkCredit2 column
 * @method     ChildAliAsaleh findOneByChkcredit3(string $chkCredit3) Return the first ChildAliAsaleh filtered by the chkCredit3 column
 * @method     ChildAliAsaleh findOneByChkcredit4(string $chkCredit4) Return the first ChildAliAsaleh filtered by the chkCredit4 column
 * @method     ChildAliAsaleh findOneByChkinternet(string $chkInternet) Return the first ChildAliAsaleh filtered by the chkInternet column
 * @method     ChildAliAsaleh findOneByChkdiscount(string $chkDiscount) Return the first ChildAliAsaleh filtered by the chkDiscount column
 * @method     ChildAliAsaleh findOneByChkother(string $chkOther) Return the first ChildAliAsaleh filtered by the chkOther column
 * @method     ChildAliAsaleh findOneByTxtcash(string $txtCash) Return the first ChildAliAsaleh filtered by the txtCash column
 * @method     ChildAliAsaleh findOneByTxtfuture(string $txtFuture) Return the first ChildAliAsaleh filtered by the txtFuture column
 * @method     ChildAliAsaleh findOneByTxttransfer(string $txtTransfer) Return the first ChildAliAsaleh filtered by the txtTransfer column
 * @method     ChildAliAsaleh findOneByEwallet(string $ewallet) Return the first ChildAliAsaleh filtered by the ewallet column
 * @method     ChildAliAsaleh findOneByTxtcredit1(string $txtCredit1) Return the first ChildAliAsaleh filtered by the txtCredit1 column
 * @method     ChildAliAsaleh findOneByTxtcredit2(string $txtCredit2) Return the first ChildAliAsaleh filtered by the txtCredit2 column
 * @method     ChildAliAsaleh findOneByTxtcredit3(string $txtCredit3) Return the first ChildAliAsaleh filtered by the txtCredit3 column
 * @method     ChildAliAsaleh findOneByTxtcredit4(string $txtCredit4) Return the first ChildAliAsaleh filtered by the txtCredit4 column
 * @method     ChildAliAsaleh findOneByTxtinternet(string $txtInternet) Return the first ChildAliAsaleh filtered by the txtInternet column
 * @method     ChildAliAsaleh findOneByTxtdiscount(string $txtDiscount) Return the first ChildAliAsaleh filtered by the txtDiscount column
 * @method     ChildAliAsaleh findOneByTxtother(string $txtOther) Return the first ChildAliAsaleh filtered by the txtOther column
 * @method     ChildAliAsaleh findOneByTxtsending(string $txtSending) Return the first ChildAliAsaleh filtered by the txtSending column
 * @method     ChildAliAsaleh findOneByOptioncash(string $optionCash) Return the first ChildAliAsaleh filtered by the optionCash column
 * @method     ChildAliAsaleh findOneByOptionfuture(string $optionFuture) Return the first ChildAliAsaleh filtered by the optionFuture column
 * @method     ChildAliAsaleh findOneByOptiontransfer(string $optionTransfer) Return the first ChildAliAsaleh filtered by the optionTransfer column
 * @method     ChildAliAsaleh findOneByOptioncredit1(string $optionCredit1) Return the first ChildAliAsaleh filtered by the optionCredit1 column
 * @method     ChildAliAsaleh findOneByOptioncredit2(string $optionCredit2) Return the first ChildAliAsaleh filtered by the optionCredit2 column
 * @method     ChildAliAsaleh findOneByOptioncredit3(string $optionCredit3) Return the first ChildAliAsaleh filtered by the optionCredit3 column
 * @method     ChildAliAsaleh findOneByOptioncredit4(string $optionCredit4) Return the first ChildAliAsaleh filtered by the optionCredit4 column
 * @method     ChildAliAsaleh findOneByOptioninternet(string $optionInternet) Return the first ChildAliAsaleh filtered by the optionInternet column
 * @method     ChildAliAsaleh findOneByOptiondiscount(string $optionDiscount) Return the first ChildAliAsaleh filtered by the optionDiscount column
 * @method     ChildAliAsaleh findOneByOptionother(string $optionOther) Return the first ChildAliAsaleh filtered by the optionOther column
 * @method     ChildAliAsaleh findOneByDiscount(string $discount) Return the first ChildAliAsaleh filtered by the discount column
 * @method     ChildAliAsaleh findOneByPrint(int $print) Return the first ChildAliAsaleh filtered by the print column
 * @method     ChildAliAsaleh findOneByEwalletBefore(string $ewallet_before) Return the first ChildAliAsaleh filtered by the ewallet_before column
 * @method     ChildAliAsaleh findOneByEwalletAfter(string $ewallet_after) Return the first ChildAliAsaleh filtered by the ewallet_after column
 * @method     ChildAliAsaleh findOneByIpay(string $ipay) Return the first ChildAliAsaleh filtered by the ipay column
 * @method     ChildAliAsaleh findOneByPayType(string $pay_type) Return the first ChildAliAsaleh filtered by the pay_type column
 * @method     ChildAliAsaleh findOneByHcancel(int $hcancel) Return the first ChildAliAsaleh filtered by the hcancel column
 * @method     ChildAliAsaleh findOneByCaddress(string $caddress) Return the first ChildAliAsaleh filtered by the caddress column
 * @method     ChildAliAsaleh findOneByCdistrictid(string $cdistrictId) Return the first ChildAliAsaleh filtered by the cdistrictId column
 * @method     ChildAliAsaleh findOneByCamphurid(string $camphurId) Return the first ChildAliAsaleh filtered by the camphurId column
 * @method     ChildAliAsaleh findOneByCprovinceid(string $cprovinceId) Return the first ChildAliAsaleh filtered by the cprovinceId column
 * @method     ChildAliAsaleh findOneByCzip(string $czip) Return the first ChildAliAsaleh filtered by the czip column
 * @method     ChildAliAsaleh findOneBySender(int $sender) Return the first ChildAliAsaleh filtered by the sender column
 * @method     ChildAliAsaleh findOneBySenderDate(string $sender_date) Return the first ChildAliAsaleh filtered by the sender_date column
 * @method     ChildAliAsaleh findOneByReceive(int $receive) Return the first ChildAliAsaleh filtered by the receive column
 * @method     ChildAliAsaleh findOneByReceiveDate(string $receive_date) Return the first ChildAliAsaleh filtered by the receive_date column
 * @method     ChildAliAsaleh findOneByAsend(int $asend) Return the first ChildAliAsaleh filtered by the asend column
 * @method     ChildAliAsaleh findOneByAtoType(int $ato_type) Return the first ChildAliAsaleh filtered by the ato_type column
 * @method     ChildAliAsaleh findOneByAtoId(int $ato_id) Return the first ChildAliAsaleh filtered by the ato_id column
 * @method     ChildAliAsaleh findOneByOnline(int $online) Return the first ChildAliAsaleh filtered by the online column
 * @method     ChildAliAsaleh findOneByHpv(string $hpv) Return the first ChildAliAsaleh filtered by the hpv column
 * @method     ChildAliAsaleh findOneByHtotal(string $htotal) Return the first ChildAliAsaleh filtered by the htotal column
 * @method     ChildAliAsaleh findOneByHdate(string $hdate) Return the first ChildAliAsaleh filtered by the hdate column
 * @method     ChildAliAsaleh findOneByScheck(string $scheck) Return the first ChildAliAsaleh filtered by the scheck column
 * @method     ChildAliAsaleh findOneByCheckportal(int $checkportal) Return the first ChildAliAsaleh filtered by the checkportal column
 * @method     ChildAliAsaleh findOneByRcode(int $rcode) Return the first ChildAliAsaleh filtered by the rcode column
 * @method     ChildAliAsaleh findOneByBmcauto(int $bmcauto) Return the first ChildAliAsaleh filtered by the bmcauto column
 * @method     ChildAliAsaleh findOneByCancelDate(string $cancel_date) Return the first ChildAliAsaleh filtered by the cancel_date column
 * @method     ChildAliAsaleh findOneByUidCancel(string $uid_cancel) Return the first ChildAliAsaleh filtered by the uid_cancel column
 * @method     ChildAliAsaleh findOneByCname(string $cname) Return the first ChildAliAsaleh filtered by the cname column
 * @method     ChildAliAsaleh findOneByCmobile(string $cmobile) Return the first ChildAliAsaleh filtered by the cmobile column
 * @method     ChildAliAsaleh findOneByUidSender(string $uid_sender) Return the first ChildAliAsaleh filtered by the uid_sender column
 * @method     ChildAliAsaleh findOneByUidReceive(string $uid_receive) Return the first ChildAliAsaleh filtered by the uid_receive column
 * @method     ChildAliAsaleh findOneByMbase(string $mbase) Return the first ChildAliAsaleh filtered by the mbase column
 * @method     ChildAliAsaleh findOneByBprice(string $bprice) Return the first ChildAliAsaleh filtered by the bprice column
 * @method     ChildAliAsaleh findOneByLocationbase(int $locationbase) Return the first ChildAliAsaleh filtered by the locationbase column
 * @method     ChildAliAsaleh findOneByCrate(string $crate) Return the first ChildAliAsaleh filtered by the crate column
 * @method     ChildAliAsaleh findOneByStatus(int $status) Return the first ChildAliAsaleh filtered by the status column
 * @method     ChildAliAsaleh findOneByRef(string $ref) Return the first ChildAliAsaleh filtered by the ref column
 * @method     ChildAliAsaleh findOneBySelectcash(string $selectCash) Return the first ChildAliAsaleh filtered by the selectCash column
 * @method     ChildAliAsaleh findOneBySelecttransfer(string $selectTransfer) Return the first ChildAliAsaleh filtered by the selectTransfer column
 * @method     ChildAliAsaleh findOneBySelectcredit1(string $selectCredit1) Return the first ChildAliAsaleh filtered by the selectCredit1 column
 * @method     ChildAliAsaleh findOneBySelectcredit2(string $selectCredit2) Return the first ChildAliAsaleh filtered by the selectCredit2 column
 * @method     ChildAliAsaleh findOneBySelectcredit3(string $selectCredit3) Return the first ChildAliAsaleh filtered by the selectCredit3 column
 * @method     ChildAliAsaleh findOneBySelectdiscount(string $selectDiscount) Return the first ChildAliAsaleh filtered by the selectDiscount column
 * @method     ChildAliAsaleh findOneBySelectinternet(string $selectInternet) Return the first ChildAliAsaleh filtered by the selectInternet column
 * @method     ChildAliAsaleh findOneByTxtvoucher(string $txtVoucher) Return the first ChildAliAsaleh filtered by the txtVoucher column
 * @method     ChildAliAsaleh findOneByOptionvoucher(string $optionVoucher) Return the first ChildAliAsaleh filtered by the optionVoucher column
 * @method     ChildAliAsaleh findOneBySelectvoucher(string $selectVoucher) Return the first ChildAliAsaleh filtered by the selectVoucher column
 * @method     ChildAliAsaleh findOneByTxttransfer1(string $txtTransfer1) Return the first ChildAliAsaleh filtered by the txtTransfer1 column
 * @method     ChildAliAsaleh findOneByOptiontransfer1(string $optionTransfer1) Return the first ChildAliAsaleh filtered by the optionTransfer1 column
 * @method     ChildAliAsaleh findOneBySelecttransfer1(string $selectTransfer1) Return the first ChildAliAsaleh filtered by the selectTransfer1 column
 * @method     ChildAliAsaleh findOneByTxttransfer2(string $txtTransfer2) Return the first ChildAliAsaleh filtered by the txtTransfer2 column
 * @method     ChildAliAsaleh findOneByOptiontransfer2(string $optionTransfer2) Return the first ChildAliAsaleh filtered by the optionTransfer2 column
 * @method     ChildAliAsaleh findOneBySelecttransfer2(string $selectTransfer2) Return the first ChildAliAsaleh filtered by the selectTransfer2 column
 * @method     ChildAliAsaleh findOneByTxttransfer3(string $txtTransfer3) Return the first ChildAliAsaleh filtered by the txtTransfer3 column
 * @method     ChildAliAsaleh findOneByOptiontransfer3(string $optionTransfer3) Return the first ChildAliAsaleh filtered by the optionTransfer3 column
 * @method     ChildAliAsaleh findOneBySelecttransfer3(string $selectTransfer3) Return the first ChildAliAsaleh filtered by the selectTransfer3 column
 * @method     ChildAliAsaleh findOneByStatusPackage(int $status_package) Return the first ChildAliAsaleh filtered by the status_package column *

 * @method     ChildAliAsaleh requirePk($key, ConnectionInterface $con = null) Return the ChildAliAsaleh by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOne(ConnectionInterface $con = null) Return the first ChildAliAsaleh matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAsaleh requireOneBySano(string $sano) Return the first ChildAliAsaleh filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByPano(string $pano) Return the first ChildAliAsaleh filtered by the pano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySadate(string $sadate) Return the first ChildAliAsaleh filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySctime(string $sctime) Return the first ChildAliAsaleh filtered by the sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByInvCode(string $inv_code) Return the first ChildAliAsaleh filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByInvRef(string $inv_ref) Return the first ChildAliAsaleh filtered by the inv_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByMcode(string $mcode) Return the first ChildAliAsaleh filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySpCode(string $sp_code) Return the first ChildAliAsaleh filtered by the sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySpPos(string $sp_pos) Return the first ChildAliAsaleh filtered by the sp_pos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByNameF(string $name_f) Return the first ChildAliAsaleh filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByNameT(string $name_t) Return the first ChildAliAsaleh filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTotal(string $total) Return the first ChildAliAsaleh filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTotalVat(string $total_vat) Return the first ChildAliAsaleh filtered by the total_vat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTotalNet(string $total_net) Return the first ChildAliAsaleh filtered by the total_net column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTotalInvat(string $total_invat) Return the first ChildAliAsaleh filtered by the total_invat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTotalExvat(string $total_exvat) Return the first ChildAliAsaleh filtered by the total_exvat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByCustomerTotal(string $customer_total) Return the first ChildAliAsaleh filtered by the customer_total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTotPv(string $tot_pv) Return the first ChildAliAsaleh filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTotBv(string $tot_bv) Return the first ChildAliAsaleh filtered by the tot_bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTotFv(string $tot_fv) Return the first ChildAliAsaleh filtered by the tot_fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTotSppv(string $tot_sppv) Return the first ChildAliAsaleh filtered by the tot_sppv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTotWeight(string $tot_weight) Return the first ChildAliAsaleh filtered by the tot_weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByUsercode(string $usercode) Return the first ChildAliAsaleh filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByRemark(string $remark) Return the first ChildAliAsaleh filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTrnf(int $trnf) Return the first ChildAliAsaleh filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneById(int $id) Return the first ChildAliAsaleh filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySaType(string $sa_type) Return the first ChildAliAsaleh filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByUid(string $uid) Return the first ChildAliAsaleh filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByUidBranch(string $uid_branch) Return the first ChildAliAsaleh filtered by the uid_branch column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByLid(string $lid) Return the first ChildAliAsaleh filtered by the lid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByDl(string $dl) Return the first ChildAliAsaleh filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByCancel(int $cancel) Return the first ChildAliAsaleh filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySend(int $send) Return the first ChildAliAsaleh filtered by the send column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxtoption(string $txtoption) Return the first ChildAliAsaleh filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByChkcash(string $chkCash) Return the first ChildAliAsaleh filtered by the chkCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByChkfuture(string $chkFuture) Return the first ChildAliAsaleh filtered by the chkFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByChktransfer(string $chkTransfer) Return the first ChildAliAsaleh filtered by the chkTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByChkcredit1(string $chkCredit1) Return the first ChildAliAsaleh filtered by the chkCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByChkcredit2(string $chkCredit2) Return the first ChildAliAsaleh filtered by the chkCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByChkcredit3(string $chkCredit3) Return the first ChildAliAsaleh filtered by the chkCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByChkcredit4(string $chkCredit4) Return the first ChildAliAsaleh filtered by the chkCredit4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByChkinternet(string $chkInternet) Return the first ChildAliAsaleh filtered by the chkInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByChkdiscount(string $chkDiscount) Return the first ChildAliAsaleh filtered by the chkDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByChkother(string $chkOther) Return the first ChildAliAsaleh filtered by the chkOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxtcash(string $txtCash) Return the first ChildAliAsaleh filtered by the txtCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxtfuture(string $txtFuture) Return the first ChildAliAsaleh filtered by the txtFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxttransfer(string $txtTransfer) Return the first ChildAliAsaleh filtered by the txtTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByEwallet(string $ewallet) Return the first ChildAliAsaleh filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxtcredit1(string $txtCredit1) Return the first ChildAliAsaleh filtered by the txtCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxtcredit2(string $txtCredit2) Return the first ChildAliAsaleh filtered by the txtCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxtcredit3(string $txtCredit3) Return the first ChildAliAsaleh filtered by the txtCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxtcredit4(string $txtCredit4) Return the first ChildAliAsaleh filtered by the txtCredit4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxtinternet(string $txtInternet) Return the first ChildAliAsaleh filtered by the txtInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxtdiscount(string $txtDiscount) Return the first ChildAliAsaleh filtered by the txtDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxtother(string $txtOther) Return the first ChildAliAsaleh filtered by the txtOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxtsending(string $txtSending) Return the first ChildAliAsaleh filtered by the txtSending column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptioncash(string $optionCash) Return the first ChildAliAsaleh filtered by the optionCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptionfuture(string $optionFuture) Return the first ChildAliAsaleh filtered by the optionFuture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptiontransfer(string $optionTransfer) Return the first ChildAliAsaleh filtered by the optionTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptioncredit1(string $optionCredit1) Return the first ChildAliAsaleh filtered by the optionCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptioncredit2(string $optionCredit2) Return the first ChildAliAsaleh filtered by the optionCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptioncredit3(string $optionCredit3) Return the first ChildAliAsaleh filtered by the optionCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptioncredit4(string $optionCredit4) Return the first ChildAliAsaleh filtered by the optionCredit4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptioninternet(string $optionInternet) Return the first ChildAliAsaleh filtered by the optionInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptiondiscount(string $optionDiscount) Return the first ChildAliAsaleh filtered by the optionDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptionother(string $optionOther) Return the first ChildAliAsaleh filtered by the optionOther column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByDiscount(string $discount) Return the first ChildAliAsaleh filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByPrint(int $print) Return the first ChildAliAsaleh filtered by the print column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByEwalletBefore(string $ewallet_before) Return the first ChildAliAsaleh filtered by the ewallet_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByEwalletAfter(string $ewallet_after) Return the first ChildAliAsaleh filtered by the ewallet_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByIpay(string $ipay) Return the first ChildAliAsaleh filtered by the ipay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByPayType(string $pay_type) Return the first ChildAliAsaleh filtered by the pay_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByHcancel(int $hcancel) Return the first ChildAliAsaleh filtered by the hcancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByCaddress(string $caddress) Return the first ChildAliAsaleh filtered by the caddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByCdistrictid(string $cdistrictId) Return the first ChildAliAsaleh filtered by the cdistrictId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByCamphurid(string $camphurId) Return the first ChildAliAsaleh filtered by the camphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByCprovinceid(string $cprovinceId) Return the first ChildAliAsaleh filtered by the cprovinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByCzip(string $czip) Return the first ChildAliAsaleh filtered by the czip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySender(int $sender) Return the first ChildAliAsaleh filtered by the sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySenderDate(string $sender_date) Return the first ChildAliAsaleh filtered by the sender_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByReceive(int $receive) Return the first ChildAliAsaleh filtered by the receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByReceiveDate(string $receive_date) Return the first ChildAliAsaleh filtered by the receive_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByAsend(int $asend) Return the first ChildAliAsaleh filtered by the asend column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByAtoType(int $ato_type) Return the first ChildAliAsaleh filtered by the ato_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByAtoId(int $ato_id) Return the first ChildAliAsaleh filtered by the ato_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOnline(int $online) Return the first ChildAliAsaleh filtered by the online column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByHpv(string $hpv) Return the first ChildAliAsaleh filtered by the hpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByHtotal(string $htotal) Return the first ChildAliAsaleh filtered by the htotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByHdate(string $hdate) Return the first ChildAliAsaleh filtered by the hdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByScheck(string $scheck) Return the first ChildAliAsaleh filtered by the scheck column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByCheckportal(int $checkportal) Return the first ChildAliAsaleh filtered by the checkportal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByRcode(int $rcode) Return the first ChildAliAsaleh filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByBmcauto(int $bmcauto) Return the first ChildAliAsaleh filtered by the bmcauto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByCancelDate(string $cancel_date) Return the first ChildAliAsaleh filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByUidCancel(string $uid_cancel) Return the first ChildAliAsaleh filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByCname(string $cname) Return the first ChildAliAsaleh filtered by the cname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByCmobile(string $cmobile) Return the first ChildAliAsaleh filtered by the cmobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByUidSender(string $uid_sender) Return the first ChildAliAsaleh filtered by the uid_sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByUidReceive(string $uid_receive) Return the first ChildAliAsaleh filtered by the uid_receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByMbase(string $mbase) Return the first ChildAliAsaleh filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByBprice(string $bprice) Return the first ChildAliAsaleh filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByLocationbase(int $locationbase) Return the first ChildAliAsaleh filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByCrate(string $crate) Return the first ChildAliAsaleh filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByStatus(int $status) Return the first ChildAliAsaleh filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByRef(string $ref) Return the first ChildAliAsaleh filtered by the ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySelectcash(string $selectCash) Return the first ChildAliAsaleh filtered by the selectCash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySelecttransfer(string $selectTransfer) Return the first ChildAliAsaleh filtered by the selectTransfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySelectcredit1(string $selectCredit1) Return the first ChildAliAsaleh filtered by the selectCredit1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySelectcredit2(string $selectCredit2) Return the first ChildAliAsaleh filtered by the selectCredit2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySelectcredit3(string $selectCredit3) Return the first ChildAliAsaleh filtered by the selectCredit3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySelectdiscount(string $selectDiscount) Return the first ChildAliAsaleh filtered by the selectDiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySelectinternet(string $selectInternet) Return the first ChildAliAsaleh filtered by the selectInternet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxtvoucher(string $txtVoucher) Return the first ChildAliAsaleh filtered by the txtVoucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptionvoucher(string $optionVoucher) Return the first ChildAliAsaleh filtered by the optionVoucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySelectvoucher(string $selectVoucher) Return the first ChildAliAsaleh filtered by the selectVoucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxttransfer1(string $txtTransfer1) Return the first ChildAliAsaleh filtered by the txtTransfer1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptiontransfer1(string $optionTransfer1) Return the first ChildAliAsaleh filtered by the optionTransfer1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySelecttransfer1(string $selectTransfer1) Return the first ChildAliAsaleh filtered by the selectTransfer1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxttransfer2(string $txtTransfer2) Return the first ChildAliAsaleh filtered by the txtTransfer2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptiontransfer2(string $optionTransfer2) Return the first ChildAliAsaleh filtered by the optionTransfer2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySelecttransfer2(string $selectTransfer2) Return the first ChildAliAsaleh filtered by the selectTransfer2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByTxttransfer3(string $txtTransfer3) Return the first ChildAliAsaleh filtered by the txtTransfer3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByOptiontransfer3(string $optionTransfer3) Return the first ChildAliAsaleh filtered by the optionTransfer3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneBySelecttransfer3(string $selectTransfer3) Return the first ChildAliAsaleh filtered by the selectTransfer3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaleh requireOneByStatusPackage(int $status_package) Return the first ChildAliAsaleh filtered by the status_package column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAsaleh[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliAsaleh objects based on current ModelCriteria
 * @method     ChildAliAsaleh[]|ObjectCollection findBySano(string $sano) Return ChildAliAsaleh objects filtered by the sano column
 * @method     ChildAliAsaleh[]|ObjectCollection findByPano(string $pano) Return ChildAliAsaleh objects filtered by the pano column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySadate(string $sadate) Return ChildAliAsaleh objects filtered by the sadate column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySctime(string $sctime) Return ChildAliAsaleh objects filtered by the sctime column
 * @method     ChildAliAsaleh[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliAsaleh objects filtered by the inv_code column
 * @method     ChildAliAsaleh[]|ObjectCollection findByInvRef(string $inv_ref) Return ChildAliAsaleh objects filtered by the inv_ref column
 * @method     ChildAliAsaleh[]|ObjectCollection findByMcode(string $mcode) Return ChildAliAsaleh objects filtered by the mcode column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySpCode(string $sp_code) Return ChildAliAsaleh objects filtered by the sp_code column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySpPos(string $sp_pos) Return ChildAliAsaleh objects filtered by the sp_pos column
 * @method     ChildAliAsaleh[]|ObjectCollection findByNameF(string $name_f) Return ChildAliAsaleh objects filtered by the name_f column
 * @method     ChildAliAsaleh[]|ObjectCollection findByNameT(string $name_t) Return ChildAliAsaleh objects filtered by the name_t column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTotal(string $total) Return ChildAliAsaleh objects filtered by the total column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTotalVat(string $total_vat) Return ChildAliAsaleh objects filtered by the total_vat column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTotalNet(string $total_net) Return ChildAliAsaleh objects filtered by the total_net column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTotalInvat(string $total_invat) Return ChildAliAsaleh objects filtered by the total_invat column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTotalExvat(string $total_exvat) Return ChildAliAsaleh objects filtered by the total_exvat column
 * @method     ChildAliAsaleh[]|ObjectCollection findByCustomerTotal(string $customer_total) Return ChildAliAsaleh objects filtered by the customer_total column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliAsaleh objects filtered by the tot_pv column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTotBv(string $tot_bv) Return ChildAliAsaleh objects filtered by the tot_bv column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTotFv(string $tot_fv) Return ChildAliAsaleh objects filtered by the tot_fv column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTotSppv(string $tot_sppv) Return ChildAliAsaleh objects filtered by the tot_sppv column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTotWeight(string $tot_weight) Return ChildAliAsaleh objects filtered by the tot_weight column
 * @method     ChildAliAsaleh[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliAsaleh objects filtered by the usercode column
 * @method     ChildAliAsaleh[]|ObjectCollection findByRemark(string $remark) Return ChildAliAsaleh objects filtered by the remark column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTrnf(int $trnf) Return ChildAliAsaleh objects filtered by the trnf column
 * @method     ChildAliAsaleh[]|ObjectCollection findById(int $id) Return ChildAliAsaleh objects filtered by the id column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliAsaleh objects filtered by the sa_type column
 * @method     ChildAliAsaleh[]|ObjectCollection findByUid(string $uid) Return ChildAliAsaleh objects filtered by the uid column
 * @method     ChildAliAsaleh[]|ObjectCollection findByUidBranch(string $uid_branch) Return ChildAliAsaleh objects filtered by the uid_branch column
 * @method     ChildAliAsaleh[]|ObjectCollection findByLid(string $lid) Return ChildAliAsaleh objects filtered by the lid column
 * @method     ChildAliAsaleh[]|ObjectCollection findByDl(string $dl) Return ChildAliAsaleh objects filtered by the dl column
 * @method     ChildAliAsaleh[]|ObjectCollection findByCancel(int $cancel) Return ChildAliAsaleh objects filtered by the cancel column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySend(int $send) Return ChildAliAsaleh objects filtered by the send column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliAsaleh objects filtered by the txtoption column
 * @method     ChildAliAsaleh[]|ObjectCollection findByChkcash(string $chkCash) Return ChildAliAsaleh objects filtered by the chkCash column
 * @method     ChildAliAsaleh[]|ObjectCollection findByChkfuture(string $chkFuture) Return ChildAliAsaleh objects filtered by the chkFuture column
 * @method     ChildAliAsaleh[]|ObjectCollection findByChktransfer(string $chkTransfer) Return ChildAliAsaleh objects filtered by the chkTransfer column
 * @method     ChildAliAsaleh[]|ObjectCollection findByChkcredit1(string $chkCredit1) Return ChildAliAsaleh objects filtered by the chkCredit1 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByChkcredit2(string $chkCredit2) Return ChildAliAsaleh objects filtered by the chkCredit2 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByChkcredit3(string $chkCredit3) Return ChildAliAsaleh objects filtered by the chkCredit3 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByChkcredit4(string $chkCredit4) Return ChildAliAsaleh objects filtered by the chkCredit4 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByChkinternet(string $chkInternet) Return ChildAliAsaleh objects filtered by the chkInternet column
 * @method     ChildAliAsaleh[]|ObjectCollection findByChkdiscount(string $chkDiscount) Return ChildAliAsaleh objects filtered by the chkDiscount column
 * @method     ChildAliAsaleh[]|ObjectCollection findByChkother(string $chkOther) Return ChildAliAsaleh objects filtered by the chkOther column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxtcash(string $txtCash) Return ChildAliAsaleh objects filtered by the txtCash column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxtfuture(string $txtFuture) Return ChildAliAsaleh objects filtered by the txtFuture column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxttransfer(string $txtTransfer) Return ChildAliAsaleh objects filtered by the txtTransfer column
 * @method     ChildAliAsaleh[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliAsaleh objects filtered by the ewallet column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxtcredit1(string $txtCredit1) Return ChildAliAsaleh objects filtered by the txtCredit1 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxtcredit2(string $txtCredit2) Return ChildAliAsaleh objects filtered by the txtCredit2 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxtcredit3(string $txtCredit3) Return ChildAliAsaleh objects filtered by the txtCredit3 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxtcredit4(string $txtCredit4) Return ChildAliAsaleh objects filtered by the txtCredit4 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxtinternet(string $txtInternet) Return ChildAliAsaleh objects filtered by the txtInternet column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxtdiscount(string $txtDiscount) Return ChildAliAsaleh objects filtered by the txtDiscount column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxtother(string $txtOther) Return ChildAliAsaleh objects filtered by the txtOther column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxtsending(string $txtSending) Return ChildAliAsaleh objects filtered by the txtSending column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptioncash(string $optionCash) Return ChildAliAsaleh objects filtered by the optionCash column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptionfuture(string $optionFuture) Return ChildAliAsaleh objects filtered by the optionFuture column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptiontransfer(string $optionTransfer) Return ChildAliAsaleh objects filtered by the optionTransfer column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptioncredit1(string $optionCredit1) Return ChildAliAsaleh objects filtered by the optionCredit1 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptioncredit2(string $optionCredit2) Return ChildAliAsaleh objects filtered by the optionCredit2 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptioncredit3(string $optionCredit3) Return ChildAliAsaleh objects filtered by the optionCredit3 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptioncredit4(string $optionCredit4) Return ChildAliAsaleh objects filtered by the optionCredit4 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptioninternet(string $optionInternet) Return ChildAliAsaleh objects filtered by the optionInternet column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptiondiscount(string $optionDiscount) Return ChildAliAsaleh objects filtered by the optionDiscount column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptionother(string $optionOther) Return ChildAliAsaleh objects filtered by the optionOther column
 * @method     ChildAliAsaleh[]|ObjectCollection findByDiscount(string $discount) Return ChildAliAsaleh objects filtered by the discount column
 * @method     ChildAliAsaleh[]|ObjectCollection findByPrint(int $print) Return ChildAliAsaleh objects filtered by the print column
 * @method     ChildAliAsaleh[]|ObjectCollection findByEwalletBefore(string $ewallet_before) Return ChildAliAsaleh objects filtered by the ewallet_before column
 * @method     ChildAliAsaleh[]|ObjectCollection findByEwalletAfter(string $ewallet_after) Return ChildAliAsaleh objects filtered by the ewallet_after column
 * @method     ChildAliAsaleh[]|ObjectCollection findByIpay(string $ipay) Return ChildAliAsaleh objects filtered by the ipay column
 * @method     ChildAliAsaleh[]|ObjectCollection findByPayType(string $pay_type) Return ChildAliAsaleh objects filtered by the pay_type column
 * @method     ChildAliAsaleh[]|ObjectCollection findByHcancel(int $hcancel) Return ChildAliAsaleh objects filtered by the hcancel column
 * @method     ChildAliAsaleh[]|ObjectCollection findByCaddress(string $caddress) Return ChildAliAsaleh objects filtered by the caddress column
 * @method     ChildAliAsaleh[]|ObjectCollection findByCdistrictid(string $cdistrictId) Return ChildAliAsaleh objects filtered by the cdistrictId column
 * @method     ChildAliAsaleh[]|ObjectCollection findByCamphurid(string $camphurId) Return ChildAliAsaleh objects filtered by the camphurId column
 * @method     ChildAliAsaleh[]|ObjectCollection findByCprovinceid(string $cprovinceId) Return ChildAliAsaleh objects filtered by the cprovinceId column
 * @method     ChildAliAsaleh[]|ObjectCollection findByCzip(string $czip) Return ChildAliAsaleh objects filtered by the czip column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySender(int $sender) Return ChildAliAsaleh objects filtered by the sender column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySenderDate(string $sender_date) Return ChildAliAsaleh objects filtered by the sender_date column
 * @method     ChildAliAsaleh[]|ObjectCollection findByReceive(int $receive) Return ChildAliAsaleh objects filtered by the receive column
 * @method     ChildAliAsaleh[]|ObjectCollection findByReceiveDate(string $receive_date) Return ChildAliAsaleh objects filtered by the receive_date column
 * @method     ChildAliAsaleh[]|ObjectCollection findByAsend(int $asend) Return ChildAliAsaleh objects filtered by the asend column
 * @method     ChildAliAsaleh[]|ObjectCollection findByAtoType(int $ato_type) Return ChildAliAsaleh objects filtered by the ato_type column
 * @method     ChildAliAsaleh[]|ObjectCollection findByAtoId(int $ato_id) Return ChildAliAsaleh objects filtered by the ato_id column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOnline(int $online) Return ChildAliAsaleh objects filtered by the online column
 * @method     ChildAliAsaleh[]|ObjectCollection findByHpv(string $hpv) Return ChildAliAsaleh objects filtered by the hpv column
 * @method     ChildAliAsaleh[]|ObjectCollection findByHtotal(string $htotal) Return ChildAliAsaleh objects filtered by the htotal column
 * @method     ChildAliAsaleh[]|ObjectCollection findByHdate(string $hdate) Return ChildAliAsaleh objects filtered by the hdate column
 * @method     ChildAliAsaleh[]|ObjectCollection findByScheck(string $scheck) Return ChildAliAsaleh objects filtered by the scheck column
 * @method     ChildAliAsaleh[]|ObjectCollection findByCheckportal(int $checkportal) Return ChildAliAsaleh objects filtered by the checkportal column
 * @method     ChildAliAsaleh[]|ObjectCollection findByRcode(int $rcode) Return ChildAliAsaleh objects filtered by the rcode column
 * @method     ChildAliAsaleh[]|ObjectCollection findByBmcauto(int $bmcauto) Return ChildAliAsaleh objects filtered by the bmcauto column
 * @method     ChildAliAsaleh[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliAsaleh objects filtered by the cancel_date column
 * @method     ChildAliAsaleh[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliAsaleh objects filtered by the uid_cancel column
 * @method     ChildAliAsaleh[]|ObjectCollection findByCname(string $cname) Return ChildAliAsaleh objects filtered by the cname column
 * @method     ChildAliAsaleh[]|ObjectCollection findByCmobile(string $cmobile) Return ChildAliAsaleh objects filtered by the cmobile column
 * @method     ChildAliAsaleh[]|ObjectCollection findByUidSender(string $uid_sender) Return ChildAliAsaleh objects filtered by the uid_sender column
 * @method     ChildAliAsaleh[]|ObjectCollection findByUidReceive(string $uid_receive) Return ChildAliAsaleh objects filtered by the uid_receive column
 * @method     ChildAliAsaleh[]|ObjectCollection findByMbase(string $mbase) Return ChildAliAsaleh objects filtered by the mbase column
 * @method     ChildAliAsaleh[]|ObjectCollection findByBprice(string $bprice) Return ChildAliAsaleh objects filtered by the bprice column
 * @method     ChildAliAsaleh[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliAsaleh objects filtered by the locationbase column
 * @method     ChildAliAsaleh[]|ObjectCollection findByCrate(string $crate) Return ChildAliAsaleh objects filtered by the crate column
 * @method     ChildAliAsaleh[]|ObjectCollection findByStatus(int $status) Return ChildAliAsaleh objects filtered by the status column
 * @method     ChildAliAsaleh[]|ObjectCollection findByRef(string $ref) Return ChildAliAsaleh objects filtered by the ref column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySelectcash(string $selectCash) Return ChildAliAsaleh objects filtered by the selectCash column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySelecttransfer(string $selectTransfer) Return ChildAliAsaleh objects filtered by the selectTransfer column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySelectcredit1(string $selectCredit1) Return ChildAliAsaleh objects filtered by the selectCredit1 column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySelectcredit2(string $selectCredit2) Return ChildAliAsaleh objects filtered by the selectCredit2 column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySelectcredit3(string $selectCredit3) Return ChildAliAsaleh objects filtered by the selectCredit3 column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySelectdiscount(string $selectDiscount) Return ChildAliAsaleh objects filtered by the selectDiscount column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySelectinternet(string $selectInternet) Return ChildAliAsaleh objects filtered by the selectInternet column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxtvoucher(string $txtVoucher) Return ChildAliAsaleh objects filtered by the txtVoucher column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptionvoucher(string $optionVoucher) Return ChildAliAsaleh objects filtered by the optionVoucher column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySelectvoucher(string $selectVoucher) Return ChildAliAsaleh objects filtered by the selectVoucher column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxttransfer1(string $txtTransfer1) Return ChildAliAsaleh objects filtered by the txtTransfer1 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptiontransfer1(string $optionTransfer1) Return ChildAliAsaleh objects filtered by the optionTransfer1 column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySelecttransfer1(string $selectTransfer1) Return ChildAliAsaleh objects filtered by the selectTransfer1 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxttransfer2(string $txtTransfer2) Return ChildAliAsaleh objects filtered by the txtTransfer2 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptiontransfer2(string $optionTransfer2) Return ChildAliAsaleh objects filtered by the optionTransfer2 column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySelecttransfer2(string $selectTransfer2) Return ChildAliAsaleh objects filtered by the selectTransfer2 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByTxttransfer3(string $txtTransfer3) Return ChildAliAsaleh objects filtered by the txtTransfer3 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByOptiontransfer3(string $optionTransfer3) Return ChildAliAsaleh objects filtered by the optionTransfer3 column
 * @method     ChildAliAsaleh[]|ObjectCollection findBySelecttransfer3(string $selectTransfer3) Return ChildAliAsaleh objects filtered by the selectTransfer3 column
 * @method     ChildAliAsaleh[]|ObjectCollection findByStatusPackage(int $status_package) Return ChildAliAsaleh objects filtered by the status_package column
 * @method     ChildAliAsaleh[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliAsalehQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliAsalehQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliAsaleh', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliAsalehQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliAsalehQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliAsalehQuery) {
            return $criteria;
        }
        $query = new ChildAliAsalehQuery();
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
     * @return ChildAliAsaleh|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliAsalehTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliAsalehTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliAsaleh A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, pano, sadate, sctime, inv_code, inv_ref, mcode, sp_code, sp_pos, name_f, name_t, total, total_vat, total_net, total_invat, total_exvat, customer_total, tot_pv, tot_bv, tot_fv, tot_sppv, tot_weight, usercode, remark, trnf, id, sa_type, uid, uid_branch, lid, dl, cancel, send, txtoption, chkCash, chkFuture, chkTransfer, chkCredit1, chkCredit2, chkCredit3, chkCredit4, chkInternet, chkDiscount, chkOther, txtCash, txtFuture, txtTransfer, ewallet, txtCredit1, txtCredit2, txtCredit3, txtCredit4, txtInternet, txtDiscount, txtOther, txtSending, optionCash, optionFuture, optionTransfer, optionCredit1, optionCredit2, optionCredit3, optionCredit4, optionInternet, optionDiscount, optionOther, discount, print, ewallet_before, ewallet_after, ipay, pay_type, hcancel, caddress, cdistrictId, camphurId, cprovinceId, czip, sender, sender_date, receive, receive_date, asend, ato_type, ato_id, online, hpv, htotal, hdate, scheck, checkportal, rcode, bmcauto, cancel_date, uid_cancel, cname, cmobile, uid_sender, uid_receive, mbase, bprice, locationbase, crate, status, ref, selectCash, selectTransfer, selectCredit1, selectCredit2, selectCredit3, selectDiscount, selectInternet, txtVoucher, optionVoucher, selectVoucher, txtTransfer1, optionTransfer1, selectTransfer1, txtTransfer2, optionTransfer2, selectTransfer2, txtTransfer3, optionTransfer3, selectTransfer3, status_package FROM ali_asaleh WHERE id = :p0';
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
            /** @var ChildAliAsaleh $obj */
            $obj = new ChildAliAsaleh();
            $obj->hydrate($row);
            AliAsalehTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliAsaleh|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliAsalehTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliAsalehTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByPano($pano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_PANO, $pano, $comparison);
    }

    /**
     * Filter the query on the sadate column
     *
     * Example usage:
     * <code>
     * $query->filterBySadate('fooValue');   // WHERE sadate = 'fooValue'
     * $query->filterBySadate('%fooValue%', Criteria::LIKE); // WHERE sadate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sadate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sadate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySctime($sctime = null, $comparison = null)
    {
        if (is_array($sctime)) {
            $useMinMax = false;
            if (isset($sctime['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_SCTIME, $sctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sctime['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_SCTIME, $sctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SCTIME, $sctime, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByInvRef($invRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_INV_REF, $invRef, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySpCode($spCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SP_CODE, $spCode, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySpPos($spPos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spPos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SP_POS, $spPos, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTotalVat($totalVat = null, $comparison = null)
    {
        if (is_array($totalVat)) {
            $useMinMax = false;
            if (isset($totalVat['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL_VAT, $totalVat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalVat['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL_VAT, $totalVat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL_VAT, $totalVat, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTotalNet($totalNet = null, $comparison = null)
    {
        if (is_array($totalNet)) {
            $useMinMax = false;
            if (isset($totalNet['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL_NET, $totalNet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalNet['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL_NET, $totalNet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL_NET, $totalNet, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTotalInvat($totalInvat = null, $comparison = null)
    {
        if (is_array($totalInvat)) {
            $useMinMax = false;
            if (isset($totalInvat['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL_INVAT, $totalInvat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalInvat['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL_INVAT, $totalInvat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL_INVAT, $totalInvat, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTotalExvat($totalExvat = null, $comparison = null)
    {
        if (is_array($totalExvat)) {
            $useMinMax = false;
            if (isset($totalExvat['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL_EXVAT, $totalExvat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalExvat['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL_EXVAT, $totalExvat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TOTAL_EXVAT, $totalExvat, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByCustomerTotal($customerTotal = null, $comparison = null)
    {
        if (is_array($customerTotal)) {
            $useMinMax = false;
            if (isset($customerTotal['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_CUSTOMER_TOTAL, $customerTotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerTotal['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_CUSTOMER_TOTAL, $customerTotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CUSTOMER_TOTAL, $customerTotal, $comparison);
    }

    /**
     * Filter the query on the tot_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotPv('fooValue');   // WHERE tot_pv = 'fooValue'
     * $query->filterByTotPv('%fooValue%', Criteria::LIKE); // WHERE tot_pv LIKE '%fooValue%'
     * </code>
     *
     * @param     string $totPv The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($totPv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TOT_PV, $totPv, $comparison);
    }

    /**
     * Filter the query on the tot_bv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotBv('fooValue');   // WHERE tot_bv = 'fooValue'
     * $query->filterByTotBv('%fooValue%', Criteria::LIKE); // WHERE tot_bv LIKE '%fooValue%'
     * </code>
     *
     * @param     string $totBv The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTotBv($totBv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($totBv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TOT_BV, $totBv, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTotFv($totFv = null, $comparison = null)
    {
        if (is_array($totFv)) {
            $useMinMax = false;
            if (isset($totFv['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOT_FV, $totFv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totFv['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOT_FV, $totFv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TOT_FV, $totFv, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTotSppv($totSppv = null, $comparison = null)
    {
        if (is_array($totSppv)) {
            $useMinMax = false;
            if (isset($totSppv['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOT_SPPV, $totSppv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totSppv['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOT_SPPV, $totSppv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TOT_SPPV, $totSppv, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTotWeight($totWeight = null, $comparison = null)
    {
        if (is_array($totWeight)) {
            $useMinMax = false;
            if (isset($totWeight['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOT_WEIGHT, $totWeight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totWeight['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TOT_WEIGHT, $totWeight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TOT_WEIGHT, $totWeight, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (is_array($trnf)) {
            $useMinMax = false;
            if (isset($trnf['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TRNF, $trnf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trnf['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TRNF, $trnf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TRNF, $trnf, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByUidBranch($uidBranch = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidBranch)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_UID_BRANCH, $uidBranch, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByLid($lid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_LID, $lid, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySend($send = null, $comparison = null)
    {
        if (is_array($send)) {
            $useMinMax = false;
            if (isset($send['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_SEND, $send['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($send['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_SEND, $send['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SEND, $send, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByChkcash($chkcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CHKCASH, $chkcash, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByChkfuture($chkfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CHKFUTURE, $chkfuture, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByChktransfer($chktransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chktransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CHKTRANSFER, $chktransfer, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit1($chkcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CHKCREDIT1, $chkcredit1, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit2($chkcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CHKCREDIT2, $chkcredit2, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit3($chkcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CHKCREDIT3, $chkcredit3, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByChkcredit4($chkcredit4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkcredit4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CHKCREDIT4, $chkcredit4, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByChkinternet($chkinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CHKINTERNET, $chkinternet, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByChkdiscount($chkdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CHKDISCOUNT, $chkdiscount, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByChkother($chkother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chkother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CHKOTHER, $chkother, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcash($txtcash = null, $comparison = null)
    {
        if (is_array($txtcash)) {
            $useMinMax = false;
            if (isset($txtcash['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTCASH, $txtcash['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcash['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTCASH, $txtcash['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTCASH, $txtcash, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxtfuture($txtfuture = null, $comparison = null)
    {
        if (is_array($txtfuture)) {
            $useMinMax = false;
            if (isset($txtfuture['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTFUTURE, $txtfuture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtfuture['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTFUTURE, $txtfuture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTFUTURE, $txtfuture, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxttransfer($txttransfer = null, $comparison = null)
    {
        if (is_array($txttransfer)) {
            $useMinMax = false;
            if (isset($txttransfer['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTTRANSFER, $txttransfer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txttransfer['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTTRANSFER, $txttransfer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTTRANSFER, $txttransfer, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_EWALLET, $ewallet, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit1($txtcredit1 = null, $comparison = null)
    {
        if (is_array($txtcredit1)) {
            $useMinMax = false;
            if (isset($txtcredit1['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTCREDIT1, $txtcredit1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit1['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTCREDIT1, $txtcredit1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTCREDIT1, $txtcredit1, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit2($txtcredit2 = null, $comparison = null)
    {
        if (is_array($txtcredit2)) {
            $useMinMax = false;
            if (isset($txtcredit2['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTCREDIT2, $txtcredit2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit2['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTCREDIT2, $txtcredit2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTCREDIT2, $txtcredit2, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit3($txtcredit3 = null, $comparison = null)
    {
        if (is_array($txtcredit3)) {
            $useMinMax = false;
            if (isset($txtcredit3['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTCREDIT3, $txtcredit3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit3['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTCREDIT3, $txtcredit3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTCREDIT3, $txtcredit3, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxtcredit4($txtcredit4 = null, $comparison = null)
    {
        if (is_array($txtcredit4)) {
            $useMinMax = false;
            if (isset($txtcredit4['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTCREDIT4, $txtcredit4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtcredit4['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTCREDIT4, $txtcredit4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTCREDIT4, $txtcredit4, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxtinternet($txtinternet = null, $comparison = null)
    {
        if (is_array($txtinternet)) {
            $useMinMax = false;
            if (isset($txtinternet['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTINTERNET, $txtinternet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtinternet['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTINTERNET, $txtinternet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTINTERNET, $txtinternet, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxtdiscount($txtdiscount = null, $comparison = null)
    {
        if (is_array($txtdiscount)) {
            $useMinMax = false;
            if (isset($txtdiscount['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTDISCOUNT, $txtdiscount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtdiscount['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTDISCOUNT, $txtdiscount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTDISCOUNT, $txtdiscount, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxtother($txtother = null, $comparison = null)
    {
        if (is_array($txtother)) {
            $useMinMax = false;
            if (isset($txtother['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTOTHER, $txtother['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtother['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTOTHER, $txtother['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTOTHER, $txtother, $comparison);
    }

    /**
     * Filter the query on the txtSending column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtsending(1234); // WHERE txtSending = 1234
     * $query->filterByTxtsending(array(12, 34)); // WHERE txtSending IN (12, 34)
     * $query->filterByTxtsending(array('min' => 12)); // WHERE txtSending > 12
     * </code>
     *
     * @param     mixed $txtsending The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxtsending($txtsending = null, $comparison = null)
    {
        if (is_array($txtsending)) {
            $useMinMax = false;
            if (isset($txtsending['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTSENDING, $txtsending['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtsending['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTSENDING, $txtsending['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTSENDING, $txtsending, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncash($optioncash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONCASH, $optioncash, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptionfuture($optionfuture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionfuture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONFUTURE, $optionfuture, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer($optiontransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONTRANSFER, $optiontransfer, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit1($optioncredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONCREDIT1, $optioncredit1, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit2($optioncredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONCREDIT2, $optioncredit2, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit3($optioncredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONCREDIT3, $optioncredit3, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptioncredit4($optioncredit4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioncredit4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONCREDIT4, $optioncredit4, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptioninternet($optioninternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optioninternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONINTERNET, $optioninternet, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptiondiscount($optiondiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiondiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONDISCOUNT, $optiondiscount, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptionother($optionother = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionother)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONOTHER, $optionother, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByDiscount($discount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($discount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_DISCOUNT, $discount, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByPrint($print = null, $comparison = null)
    {
        if (is_array($print)) {
            $useMinMax = false;
            if (isset($print['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_PRINT, $print['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($print['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_PRINT, $print['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_PRINT, $print, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByEwalletBefore($ewalletBefore = null, $comparison = null)
    {
        if (is_array($ewalletBefore)) {
            $useMinMax = false;
            if (isset($ewalletBefore['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletBefore['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_EWALLET_BEFORE, $ewalletBefore, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByEwalletAfter($ewalletAfter = null, $comparison = null)
    {
        if (is_array($ewalletAfter)) {
            $useMinMax = false;
            if (isset($ewalletAfter['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletAfter['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_EWALLET_AFTER, $ewalletAfter, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByIpay($ipay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipay)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_IPAY, $ipay, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByPayType($payType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_PAY_TYPE, $payType, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByHcancel($hcancel = null, $comparison = null)
    {
        if (is_array($hcancel)) {
            $useMinMax = false;
            if (isset($hcancel['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_HCANCEL, $hcancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hcancel['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_HCANCEL, $hcancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_HCANCEL, $hcancel, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByCaddress($caddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($caddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CADDRESS, $caddress, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByCdistrictid($cdistrictid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cdistrictid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CDISTRICTID, $cdistrictid, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByCamphurid($camphurid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($camphurid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CAMPHURID, $camphurid, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByCprovinceid($cprovinceid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cprovinceid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CPROVINCEID, $cprovinceid, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByCzip($czip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($czip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CZIP, $czip, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySender($sender = null, $comparison = null)
    {
        if (is_array($sender)) {
            $useMinMax = false;
            if (isset($sender['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_SENDER, $sender['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sender['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_SENDER, $sender['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SENDER, $sender, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySenderDate($senderDate = null, $comparison = null)
    {
        if (is_array($senderDate)) {
            $useMinMax = false;
            if (isset($senderDate['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_SENDER_DATE, $senderDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($senderDate['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_SENDER_DATE, $senderDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SENDER_DATE, $senderDate, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByReceive($receive = null, $comparison = null)
    {
        if (is_array($receive)) {
            $useMinMax = false;
            if (isset($receive['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_RECEIVE, $receive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receive['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_RECEIVE, $receive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_RECEIVE, $receive, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByReceiveDate($receiveDate = null, $comparison = null)
    {
        if (is_array($receiveDate)) {
            $useMinMax = false;
            if (isset($receiveDate['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_RECEIVE_DATE, $receiveDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiveDate['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_RECEIVE_DATE, $receiveDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_RECEIVE_DATE, $receiveDate, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByAsend($asend = null, $comparison = null)
    {
        if (is_array($asend)) {
            $useMinMax = false;
            if (isset($asend['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_ASEND, $asend['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($asend['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_ASEND, $asend['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_ASEND, $asend, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByAtoType($atoType = null, $comparison = null)
    {
        if (is_array($atoType)) {
            $useMinMax = false;
            if (isset($atoType['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_ATO_TYPE, $atoType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($atoType['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_ATO_TYPE, $atoType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_ATO_TYPE, $atoType, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByAtoId($atoId = null, $comparison = null)
    {
        if (is_array($atoId)) {
            $useMinMax = false;
            if (isset($atoId['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_ATO_ID, $atoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($atoId['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_ATO_ID, $atoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_ATO_ID, $atoId, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOnline($online = null, $comparison = null)
    {
        if (is_array($online)) {
            $useMinMax = false;
            if (isset($online['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_ONLINE, $online['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($online['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_ONLINE, $online['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_ONLINE, $online, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByHpv($hpv = null, $comparison = null)
    {
        if (is_array($hpv)) {
            $useMinMax = false;
            if (isset($hpv['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_HPV, $hpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hpv['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_HPV, $hpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_HPV, $hpv, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByHtotal($htotal = null, $comparison = null)
    {
        if (is_array($htotal)) {
            $useMinMax = false;
            if (isset($htotal['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_HTOTAL, $htotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($htotal['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_HTOTAL, $htotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_HTOTAL, $htotal, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByHdate($hdate = null, $comparison = null)
    {
        if (is_array($hdate)) {
            $useMinMax = false;
            if (isset($hdate['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_HDATE, $hdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hdate['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_HDATE, $hdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_HDATE, $hdate, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByScheck($scheck = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scheck)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SCHECK, $scheck, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByCheckportal($checkportal = null, $comparison = null)
    {
        if (is_array($checkportal)) {
            $useMinMax = false;
            if (isset($checkportal['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_CHECKPORTAL, $checkportal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkportal['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_CHECKPORTAL, $checkportal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CHECKPORTAL, $checkportal, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByBmcauto($bmcauto = null, $comparison = null)
    {
        if (is_array($bmcauto)) {
            $useMinMax = false;
            if (isset($bmcauto['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_BMCAUTO, $bmcauto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bmcauto['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_BMCAUTO, $bmcauto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_BMCAUTO, $bmcauto, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByCname($cname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CNAME, $cname, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByCmobile($cmobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmobile)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CMOBILE, $cmobile, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByUidSender($uidSender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidSender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_UID_SENDER, $uidSender, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByUidReceive($uidReceive = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidReceive)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_UID_RECEIVE, $uidReceive, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_MBASE, $mbase, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the ref column
     *
     * Example usage:
     * <code>
     * $query->filterByRef('fooValue');   // WHERE ref = 'fooValue'
     * $query->filterByRef('%fooValue%', Criteria::LIKE); // WHERE ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ref The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByRef($ref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ref)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_REF, $ref, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySelectcash($selectcash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectcash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SELECTCASH, $selectcash, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySelecttransfer($selecttransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selecttransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SELECTTRANSFER, $selecttransfer, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySelectcredit1($selectcredit1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectcredit1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SELECTCREDIT1, $selectcredit1, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySelectcredit2($selectcredit2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectcredit2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SELECTCREDIT2, $selectcredit2, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySelectcredit3($selectcredit3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectcredit3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SELECTCREDIT3, $selectcredit3, $comparison);
    }

    /**
     * Filter the query on the selectDiscount column
     *
     * Example usage:
     * <code>
     * $query->filterBySelectdiscount('fooValue');   // WHERE selectDiscount = 'fooValue'
     * $query->filterBySelectdiscount('%fooValue%', Criteria::LIKE); // WHERE selectDiscount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $selectdiscount The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySelectdiscount($selectdiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectdiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SELECTDISCOUNT, $selectdiscount, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySelectinternet($selectinternet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectinternet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SELECTINTERNET, $selectinternet, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxtvoucher($txtvoucher = null, $comparison = null)
    {
        if (is_array($txtvoucher)) {
            $useMinMax = false;
            if (isset($txtvoucher['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTVOUCHER, $txtvoucher['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($txtvoucher['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_TXTVOUCHER, $txtvoucher['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTVOUCHER, $txtvoucher, $comparison);
    }

    /**
     * Filter the query on the optionVoucher column
     *
     * Example usage:
     * <code>
     * $query->filterByOptionvoucher('fooValue');   // WHERE optionVoucher = 'fooValue'
     * $query->filterByOptionvoucher('%fooValue%', Criteria::LIKE); // WHERE optionVoucher LIKE '%fooValue%'
     * </code>
     *
     * @param     string $optionvoucher The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptionvoucher($optionvoucher = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optionvoucher)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONVOUCHER, $optionvoucher, $comparison);
    }

    /**
     * Filter the query on the selectVoucher column
     *
     * Example usage:
     * <code>
     * $query->filterBySelectvoucher('fooValue');   // WHERE selectVoucher = 'fooValue'
     * $query->filterBySelectvoucher('%fooValue%', Criteria::LIKE); // WHERE selectVoucher LIKE '%fooValue%'
     * </code>
     *
     * @param     string $selectvoucher The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySelectvoucher($selectvoucher = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selectvoucher)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SELECTVOUCHER, $selectvoucher, $comparison);
    }

    /**
     * Filter the query on the txtTransfer1 column
     *
     * Example usage:
     * <code>
     * $query->filterByTxttransfer1('fooValue');   // WHERE txtTransfer1 = 'fooValue'
     * $query->filterByTxttransfer1('%fooValue%', Criteria::LIKE); // WHERE txtTransfer1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txttransfer1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxttransfer1($txttransfer1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txttransfer1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTTRANSFER1, $txttransfer1, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer1($optiontransfer1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONTRANSFER1, $optiontransfer1, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySelecttransfer1($selecttransfer1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selecttransfer1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SELECTTRANSFER1, $selecttransfer1, $comparison);
    }

    /**
     * Filter the query on the txtTransfer2 column
     *
     * Example usage:
     * <code>
     * $query->filterByTxttransfer2('fooValue');   // WHERE txtTransfer2 = 'fooValue'
     * $query->filterByTxttransfer2('%fooValue%', Criteria::LIKE); // WHERE txtTransfer2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txttransfer2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxttransfer2($txttransfer2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txttransfer2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTTRANSFER2, $txttransfer2, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer2($optiontransfer2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONTRANSFER2, $optiontransfer2, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySelecttransfer2($selecttransfer2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selecttransfer2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SELECTTRANSFER2, $selecttransfer2, $comparison);
    }

    /**
     * Filter the query on the txtTransfer3 column
     *
     * Example usage:
     * <code>
     * $query->filterByTxttransfer3('fooValue');   // WHERE txtTransfer3 = 'fooValue'
     * $query->filterByTxttransfer3('%fooValue%', Criteria::LIKE); // WHERE txtTransfer3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txttransfer3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByTxttransfer3($txttransfer3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txttransfer3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_TXTTRANSFER3, $txttransfer3, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByOptiontransfer3($optiontransfer3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($optiontransfer3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_OPTIONTRANSFER3, $optiontransfer3, $comparison);
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
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterBySelecttransfer3($selecttransfer3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($selecttransfer3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_SELECTTRANSFER3, $selecttransfer3, $comparison);
    }

    /**
     * Filter the query on the status_package column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusPackage(1234); // WHERE status_package = 1234
     * $query->filterByStatusPackage(array(12, 34)); // WHERE status_package IN (12, 34)
     * $query->filterByStatusPackage(array('min' => 12)); // WHERE status_package > 12
     * </code>
     *
     * @param     mixed $statusPackage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function filterByStatusPackage($statusPackage = null, $comparison = null)
    {
        if (is_array($statusPackage)) {
            $useMinMax = false;
            if (isset($statusPackage['min'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_STATUS_PACKAGE, $statusPackage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusPackage['max'])) {
                $this->addUsingAlias(AliAsalehTableMap::COL_STATUS_PACKAGE, $statusPackage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsalehTableMap::COL_STATUS_PACKAGE, $statusPackage, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliAsaleh $aliAsaleh Object to remove from the list of results
     *
     * @return $this|ChildAliAsalehQuery The current query, for fluid interface
     */
    public function prune($aliAsaleh = null)
    {
        if ($aliAsaleh) {
            $this->addUsingAlias(AliAsalehTableMap::COL_ID, $aliAsaleh->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_asaleh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAsalehTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliAsalehTableMap::clearInstancePool();
            AliAsalehTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAsalehTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliAsalehTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliAsalehTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliAsalehTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliAsalehQuery
