<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliCmbonus as ChildAliCmbonus;
use CciOrm\CciOrm\AliCmbonusQuery as ChildAliCmbonusQuery;
use CciOrm\CciOrm\Map\AliCmbonusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_cmbonus' table.
 *
 *
 *
 * @method     ChildAliCmbonusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliCmbonusQuery orderByStatusPv($order = Criteria::ASC) Order by the status_pv column
 * @method     ChildAliCmbonusQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliCmbonusQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliCmbonusQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliCmbonusQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliCmbonusQuery orderByPvb($order = Criteria::ASC) Order by the pvb column
 * @method     ChildAliCmbonusQuery orderByPvh($order = Criteria::ASC) Order by the pvh column
 * @method     ChildAliCmbonusQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliCmbonusQuery orderByFob($order = Criteria::ASC) Order by the fob column
 * @method     ChildAliCmbonusQuery orderByCycle($order = Criteria::ASC) Order by the cycle column
 * @method     ChildAliCmbonusQuery orderBySmb($order = Criteria::ASC) Order by the smb column
 * @method     ChildAliCmbonusQuery orderByMatching($order = Criteria::ASC) Order by the matching column
 * @method     ChildAliCmbonusQuery orderByOnetime($order = Criteria::ASC) Order by the onetime column
 * @method     ChildAliCmbonusQuery orderByAtoship($order = Criteria::ASC) Order by the atoship column
 * @method     ChildAliCmbonusQuery orderByEcom($order = Criteria::ASC) Order by the ecom column
 * @method     ChildAliCmbonusQuery orderByEcomRound($order = Criteria::ASC) Order by the ecom_round column
 * @method     ChildAliCmbonusQuery orderByEcomtranfer($order = Criteria::ASC) Order by the ecomtranfer column
 * @method     ChildAliCmbonusQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliCmbonusQuery orderByTotaly($order = Criteria::ASC) Order by the totaly column
 * @method     ChildAliCmbonusQuery orderByTotVat($order = Criteria::ASC) Order by the tot_vat column
 * @method     ChildAliCmbonusQuery orderByTotTax($order = Criteria::ASC) Order by the tot_tax column
 * @method     ChildAliCmbonusQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildAliCmbonusQuery orderByMdate($order = Criteria::ASC) Order by the mdate column
 * @method     ChildAliCmbonusQuery orderByMonthPv($order = Criteria::ASC) Order by the month_pv column
 * @method     ChildAliCmbonusQuery orderByMpos($order = Criteria::ASC) Order by the mpos column
 * @method     ChildAliCmbonusQuery orderByCNote1($order = Criteria::ASC) Order by the c_note1 column
 * @method     ChildAliCmbonusQuery orderByCNote2($order = Criteria::ASC) Order by the c_note2 column
 * @method     ChildAliCmbonusQuery orderByCNote3($order = Criteria::ASC) Order by the c_note3 column
 * @method     ChildAliCmbonusQuery orderByCNote4($order = Criteria::ASC) Order by the c_note4 column
 * @method     ChildAliCmbonusQuery orderByCNote5($order = Criteria::ASC) Order by the c_note5 column
 * @method     ChildAliCmbonusQuery orderByCTransfer($order = Criteria::ASC) Order by the c_transfer column
 * @method     ChildAliCmbonusQuery orderByCRemark($order = Criteria::ASC) Order by the c_remark column
 * @method     ChildAliCmbonusQuery orderBySmsCredits($order = Criteria::ASC) Order by the sms_credits column
 * @method     ChildAliCmbonusQuery orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliCmbonusQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliCmbonusQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliCmbonusQuery orderByVoucher($order = Criteria::ASC) Order by the voucher column
 * @method     ChildAliCmbonusQuery orderByMtype($order = Criteria::ASC) Order by the mtype column
 * @method     ChildAliCmbonusQuery orderByComTransferChagre($order = Criteria::ASC) Order by the com_transfer_chagre column
 * @method     ChildAliCmbonusQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliCmbonusQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliCmbonusQuery orderByIdCard($order = Criteria::ASC) Order by the id_card column
 * @method     ChildAliCmbonusQuery orderByIdTax($order = Criteria::ASC) Order by the id_tax column
 * @method     ChildAliCmbonusQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliCmbonusQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliCmbonusQuery orderByBankcode($order = Criteria::ASC) Order by the bankcode column
 *
 * @method     ChildAliCmbonusQuery groupById() Group by the id column
 * @method     ChildAliCmbonusQuery groupByStatusPv() Group by the status_pv column
 * @method     ChildAliCmbonusQuery groupByRcode() Group by the rcode column
 * @method     ChildAliCmbonusQuery groupByMcode() Group by the mcode column
 * @method     ChildAliCmbonusQuery groupByStatus() Group by the status column
 * @method     ChildAliCmbonusQuery groupByPv() Group by the pv column
 * @method     ChildAliCmbonusQuery groupByPvb() Group by the pvb column
 * @method     ChildAliCmbonusQuery groupByPvh() Group by the pvh column
 * @method     ChildAliCmbonusQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliCmbonusQuery groupByFob() Group by the fob column
 * @method     ChildAliCmbonusQuery groupByCycle() Group by the cycle column
 * @method     ChildAliCmbonusQuery groupBySmb() Group by the smb column
 * @method     ChildAliCmbonusQuery groupByMatching() Group by the matching column
 * @method     ChildAliCmbonusQuery groupByOnetime() Group by the onetime column
 * @method     ChildAliCmbonusQuery groupByAtoship() Group by the atoship column
 * @method     ChildAliCmbonusQuery groupByEcom() Group by the ecom column
 * @method     ChildAliCmbonusQuery groupByEcomRound() Group by the ecom_round column
 * @method     ChildAliCmbonusQuery groupByEcomtranfer() Group by the ecomtranfer column
 * @method     ChildAliCmbonusQuery groupByTotal() Group by the total column
 * @method     ChildAliCmbonusQuery groupByTotaly() Group by the totaly column
 * @method     ChildAliCmbonusQuery groupByTotVat() Group by the tot_vat column
 * @method     ChildAliCmbonusQuery groupByTotTax() Group by the tot_tax column
 * @method     ChildAliCmbonusQuery groupByTitle() Group by the title column
 * @method     ChildAliCmbonusQuery groupByMdate() Group by the mdate column
 * @method     ChildAliCmbonusQuery groupByMonthPv() Group by the month_pv column
 * @method     ChildAliCmbonusQuery groupByMpos() Group by the mpos column
 * @method     ChildAliCmbonusQuery groupByCNote1() Group by the c_note1 column
 * @method     ChildAliCmbonusQuery groupByCNote2() Group by the c_note2 column
 * @method     ChildAliCmbonusQuery groupByCNote3() Group by the c_note3 column
 * @method     ChildAliCmbonusQuery groupByCNote4() Group by the c_note4 column
 * @method     ChildAliCmbonusQuery groupByCNote5() Group by the c_note5 column
 * @method     ChildAliCmbonusQuery groupByCTransfer() Group by the c_transfer column
 * @method     ChildAliCmbonusQuery groupByCRemark() Group by the c_remark column
 * @method     ChildAliCmbonusQuery groupBySmsCredits() Group by the sms_credits column
 * @method     ChildAliCmbonusQuery groupByPaydate() Group by the paydate column
 * @method     ChildAliCmbonusQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliCmbonusQuery groupByCrate() Group by the crate column
 * @method     ChildAliCmbonusQuery groupByVoucher() Group by the voucher column
 * @method     ChildAliCmbonusQuery groupByMtype() Group by the mtype column
 * @method     ChildAliCmbonusQuery groupByComTransferChagre() Group by the com_transfer_chagre column
 * @method     ChildAliCmbonusQuery groupByNameF() Group by the name_f column
 * @method     ChildAliCmbonusQuery groupByNameT() Group by the name_t column
 * @method     ChildAliCmbonusQuery groupByIdCard() Group by the id_card column
 * @method     ChildAliCmbonusQuery groupByIdTax() Group by the id_tax column
 * @method     ChildAliCmbonusQuery groupByFdate() Group by the fdate column
 * @method     ChildAliCmbonusQuery groupByTdate() Group by the tdate column
 * @method     ChildAliCmbonusQuery groupByBankcode() Group by the bankcode column
 *
 * @method     ChildAliCmbonusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliCmbonusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliCmbonusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliCmbonusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliCmbonusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliCmbonusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliCmbonus findOne(ConnectionInterface $con = null) Return the first ChildAliCmbonus matching the query
 * @method     ChildAliCmbonus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliCmbonus matching the query, or a new ChildAliCmbonus object populated from the query conditions when no match is found
 *
 * @method     ChildAliCmbonus findOneById(int $id) Return the first ChildAliCmbonus filtered by the id column
 * @method     ChildAliCmbonus findOneByStatusPv(string $status_pv) Return the first ChildAliCmbonus filtered by the status_pv column
 * @method     ChildAliCmbonus findOneByRcode(int $rcode) Return the first ChildAliCmbonus filtered by the rcode column
 * @method     ChildAliCmbonus findOneByMcode(string $mcode) Return the first ChildAliCmbonus filtered by the mcode column
 * @method     ChildAliCmbonus findOneByStatus(string $status) Return the first ChildAliCmbonus filtered by the status column
 * @method     ChildAliCmbonus findOneByPv(string $pv) Return the first ChildAliCmbonus filtered by the pv column
 * @method     ChildAliCmbonus findOneByPvb(string $pvb) Return the first ChildAliCmbonus filtered by the pvb column
 * @method     ChildAliCmbonus findOneByPvh(string $pvh) Return the first ChildAliCmbonus filtered by the pvh column
 * @method     ChildAliCmbonus findOneByEwallet(string $ewallet) Return the first ChildAliCmbonus filtered by the ewallet column
 * @method     ChildAliCmbonus findOneByFob(string $fob) Return the first ChildAliCmbonus filtered by the fob column
 * @method     ChildAliCmbonus findOneByCycle(string $cycle) Return the first ChildAliCmbonus filtered by the cycle column
 * @method     ChildAliCmbonus findOneBySmb(string $smb) Return the first ChildAliCmbonus filtered by the smb column
 * @method     ChildAliCmbonus findOneByMatching(string $matching) Return the first ChildAliCmbonus filtered by the matching column
 * @method     ChildAliCmbonus findOneByOnetime(string $onetime) Return the first ChildAliCmbonus filtered by the onetime column
 * @method     ChildAliCmbonus findOneByAtoship(string $atoship) Return the first ChildAliCmbonus filtered by the atoship column
 * @method     ChildAliCmbonus findOneByEcom(string $ecom) Return the first ChildAliCmbonus filtered by the ecom column
 * @method     ChildAliCmbonus findOneByEcomRound(string $ecom_round) Return the first ChildAliCmbonus filtered by the ecom_round column
 * @method     ChildAliCmbonus findOneByEcomtranfer(string $ecomtranfer) Return the first ChildAliCmbonus filtered by the ecomtranfer column
 * @method     ChildAliCmbonus findOneByTotal(string $total) Return the first ChildAliCmbonus filtered by the total column
 * @method     ChildAliCmbonus findOneByTotaly(string $totaly) Return the first ChildAliCmbonus filtered by the totaly column
 * @method     ChildAliCmbonus findOneByTotVat(string $tot_vat) Return the first ChildAliCmbonus filtered by the tot_vat column
 * @method     ChildAliCmbonus findOneByTotTax(string $tot_tax) Return the first ChildAliCmbonus filtered by the tot_tax column
 * @method     ChildAliCmbonus findOneByTitle(string $title) Return the first ChildAliCmbonus filtered by the title column
 * @method     ChildAliCmbonus findOneByMdate(string $mdate) Return the first ChildAliCmbonus filtered by the mdate column
 * @method     ChildAliCmbonus findOneByMonthPv(string $month_pv) Return the first ChildAliCmbonus filtered by the month_pv column
 * @method     ChildAliCmbonus findOneByMpos(string $mpos) Return the first ChildAliCmbonus filtered by the mpos column
 * @method     ChildAliCmbonus findOneByCNote1(string $c_note1) Return the first ChildAliCmbonus filtered by the c_note1 column
 * @method     ChildAliCmbonus findOneByCNote2(string $c_note2) Return the first ChildAliCmbonus filtered by the c_note2 column
 * @method     ChildAliCmbonus findOneByCNote3(string $c_note3) Return the first ChildAliCmbonus filtered by the c_note3 column
 * @method     ChildAliCmbonus findOneByCNote4(string $c_note4) Return the first ChildAliCmbonus filtered by the c_note4 column
 * @method     ChildAliCmbonus findOneByCNote5(string $c_note5) Return the first ChildAliCmbonus filtered by the c_note5 column
 * @method     ChildAliCmbonus findOneByCTransfer(string $c_transfer) Return the first ChildAliCmbonus filtered by the c_transfer column
 * @method     ChildAliCmbonus findOneByCRemark(string $c_remark) Return the first ChildAliCmbonus filtered by the c_remark column
 * @method     ChildAliCmbonus findOneBySmsCredits(int $sms_credits) Return the first ChildAliCmbonus filtered by the sms_credits column
 * @method     ChildAliCmbonus findOneByPaydate(string $paydate) Return the first ChildAliCmbonus filtered by the paydate column
 * @method     ChildAliCmbonus findOneByLocationbase(int $locationbase) Return the first ChildAliCmbonus filtered by the locationbase column
 * @method     ChildAliCmbonus findOneByCrate(string $crate) Return the first ChildAliCmbonus filtered by the crate column
 * @method     ChildAliCmbonus findOneByVoucher(string $voucher) Return the first ChildAliCmbonus filtered by the voucher column
 * @method     ChildAliCmbonus findOneByMtype(int $mtype) Return the first ChildAliCmbonus filtered by the mtype column
 * @method     ChildAliCmbonus findOneByComTransferChagre(string $com_transfer_chagre) Return the first ChildAliCmbonus filtered by the com_transfer_chagre column
 * @method     ChildAliCmbonus findOneByNameF(string $name_f) Return the first ChildAliCmbonus filtered by the name_f column
 * @method     ChildAliCmbonus findOneByNameT(string $name_t) Return the first ChildAliCmbonus filtered by the name_t column
 * @method     ChildAliCmbonus findOneByIdCard(string $id_card) Return the first ChildAliCmbonus filtered by the id_card column
 * @method     ChildAliCmbonus findOneByIdTax(string $id_tax) Return the first ChildAliCmbonus filtered by the id_tax column
 * @method     ChildAliCmbonus findOneByFdate(string $fdate) Return the first ChildAliCmbonus filtered by the fdate column
 * @method     ChildAliCmbonus findOneByTdate(string $tdate) Return the first ChildAliCmbonus filtered by the tdate column
 * @method     ChildAliCmbonus findOneByBankcode(string $bankcode) Return the first ChildAliCmbonus filtered by the bankcode column *

 * @method     ChildAliCmbonus requirePk($key, ConnectionInterface $con = null) Return the ChildAliCmbonus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOne(ConnectionInterface $con = null) Return the first ChildAliCmbonus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCmbonus requireOneById(int $id) Return the first ChildAliCmbonus filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByStatusPv(string $status_pv) Return the first ChildAliCmbonus filtered by the status_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByRcode(int $rcode) Return the first ChildAliCmbonus filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByMcode(string $mcode) Return the first ChildAliCmbonus filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByStatus(string $status) Return the first ChildAliCmbonus filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByPv(string $pv) Return the first ChildAliCmbonus filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByPvb(string $pvb) Return the first ChildAliCmbonus filtered by the pvb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByPvh(string $pvh) Return the first ChildAliCmbonus filtered by the pvh column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByEwallet(string $ewallet) Return the first ChildAliCmbonus filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByFob(string $fob) Return the first ChildAliCmbonus filtered by the fob column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByCycle(string $cycle) Return the first ChildAliCmbonus filtered by the cycle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneBySmb(string $smb) Return the first ChildAliCmbonus filtered by the smb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByMatching(string $matching) Return the first ChildAliCmbonus filtered by the matching column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByOnetime(string $onetime) Return the first ChildAliCmbonus filtered by the onetime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByAtoship(string $atoship) Return the first ChildAliCmbonus filtered by the atoship column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByEcom(string $ecom) Return the first ChildAliCmbonus filtered by the ecom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByEcomRound(string $ecom_round) Return the first ChildAliCmbonus filtered by the ecom_round column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByEcomtranfer(string $ecomtranfer) Return the first ChildAliCmbonus filtered by the ecomtranfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByTotal(string $total) Return the first ChildAliCmbonus filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByTotaly(string $totaly) Return the first ChildAliCmbonus filtered by the totaly column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByTotVat(string $tot_vat) Return the first ChildAliCmbonus filtered by the tot_vat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByTotTax(string $tot_tax) Return the first ChildAliCmbonus filtered by the tot_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByTitle(string $title) Return the first ChildAliCmbonus filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByMdate(string $mdate) Return the first ChildAliCmbonus filtered by the mdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByMonthPv(string $month_pv) Return the first ChildAliCmbonus filtered by the month_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByMpos(string $mpos) Return the first ChildAliCmbonus filtered by the mpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByCNote1(string $c_note1) Return the first ChildAliCmbonus filtered by the c_note1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByCNote2(string $c_note2) Return the first ChildAliCmbonus filtered by the c_note2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByCNote3(string $c_note3) Return the first ChildAliCmbonus filtered by the c_note3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByCNote4(string $c_note4) Return the first ChildAliCmbonus filtered by the c_note4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByCNote5(string $c_note5) Return the first ChildAliCmbonus filtered by the c_note5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByCTransfer(string $c_transfer) Return the first ChildAliCmbonus filtered by the c_transfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByCRemark(string $c_remark) Return the first ChildAliCmbonus filtered by the c_remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneBySmsCredits(int $sms_credits) Return the first ChildAliCmbonus filtered by the sms_credits column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByPaydate(string $paydate) Return the first ChildAliCmbonus filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByLocationbase(int $locationbase) Return the first ChildAliCmbonus filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByCrate(string $crate) Return the first ChildAliCmbonus filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByVoucher(string $voucher) Return the first ChildAliCmbonus filtered by the voucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByMtype(int $mtype) Return the first ChildAliCmbonus filtered by the mtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByComTransferChagre(string $com_transfer_chagre) Return the first ChildAliCmbonus filtered by the com_transfer_chagre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByNameF(string $name_f) Return the first ChildAliCmbonus filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByNameT(string $name_t) Return the first ChildAliCmbonus filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByIdCard(string $id_card) Return the first ChildAliCmbonus filtered by the id_card column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByIdTax(string $id_tax) Return the first ChildAliCmbonus filtered by the id_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByFdate(string $fdate) Return the first ChildAliCmbonus filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByTdate(string $tdate) Return the first ChildAliCmbonus filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonus requireOneByBankcode(string $bankcode) Return the first ChildAliCmbonus filtered by the bankcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCmbonus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliCmbonus objects based on current ModelCriteria
 * @method     ChildAliCmbonus[]|ObjectCollection findById(int $id) Return ChildAliCmbonus objects filtered by the id column
 * @method     ChildAliCmbonus[]|ObjectCollection findByStatusPv(string $status_pv) Return ChildAliCmbonus objects filtered by the status_pv column
 * @method     ChildAliCmbonus[]|ObjectCollection findByRcode(int $rcode) Return ChildAliCmbonus objects filtered by the rcode column
 * @method     ChildAliCmbonus[]|ObjectCollection findByMcode(string $mcode) Return ChildAliCmbonus objects filtered by the mcode column
 * @method     ChildAliCmbonus[]|ObjectCollection findByStatus(string $status) Return ChildAliCmbonus objects filtered by the status column
 * @method     ChildAliCmbonus[]|ObjectCollection findByPv(string $pv) Return ChildAliCmbonus objects filtered by the pv column
 * @method     ChildAliCmbonus[]|ObjectCollection findByPvb(string $pvb) Return ChildAliCmbonus objects filtered by the pvb column
 * @method     ChildAliCmbonus[]|ObjectCollection findByPvh(string $pvh) Return ChildAliCmbonus objects filtered by the pvh column
 * @method     ChildAliCmbonus[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliCmbonus objects filtered by the ewallet column
 * @method     ChildAliCmbonus[]|ObjectCollection findByFob(string $fob) Return ChildAliCmbonus objects filtered by the fob column
 * @method     ChildAliCmbonus[]|ObjectCollection findByCycle(string $cycle) Return ChildAliCmbonus objects filtered by the cycle column
 * @method     ChildAliCmbonus[]|ObjectCollection findBySmb(string $smb) Return ChildAliCmbonus objects filtered by the smb column
 * @method     ChildAliCmbonus[]|ObjectCollection findByMatching(string $matching) Return ChildAliCmbonus objects filtered by the matching column
 * @method     ChildAliCmbonus[]|ObjectCollection findByOnetime(string $onetime) Return ChildAliCmbonus objects filtered by the onetime column
 * @method     ChildAliCmbonus[]|ObjectCollection findByAtoship(string $atoship) Return ChildAliCmbonus objects filtered by the atoship column
 * @method     ChildAliCmbonus[]|ObjectCollection findByEcom(string $ecom) Return ChildAliCmbonus objects filtered by the ecom column
 * @method     ChildAliCmbonus[]|ObjectCollection findByEcomRound(string $ecom_round) Return ChildAliCmbonus objects filtered by the ecom_round column
 * @method     ChildAliCmbonus[]|ObjectCollection findByEcomtranfer(string $ecomtranfer) Return ChildAliCmbonus objects filtered by the ecomtranfer column
 * @method     ChildAliCmbonus[]|ObjectCollection findByTotal(string $total) Return ChildAliCmbonus objects filtered by the total column
 * @method     ChildAliCmbonus[]|ObjectCollection findByTotaly(string $totaly) Return ChildAliCmbonus objects filtered by the totaly column
 * @method     ChildAliCmbonus[]|ObjectCollection findByTotVat(string $tot_vat) Return ChildAliCmbonus objects filtered by the tot_vat column
 * @method     ChildAliCmbonus[]|ObjectCollection findByTotTax(string $tot_tax) Return ChildAliCmbonus objects filtered by the tot_tax column
 * @method     ChildAliCmbonus[]|ObjectCollection findByTitle(string $title) Return ChildAliCmbonus objects filtered by the title column
 * @method     ChildAliCmbonus[]|ObjectCollection findByMdate(string $mdate) Return ChildAliCmbonus objects filtered by the mdate column
 * @method     ChildAliCmbonus[]|ObjectCollection findByMonthPv(string $month_pv) Return ChildAliCmbonus objects filtered by the month_pv column
 * @method     ChildAliCmbonus[]|ObjectCollection findByMpos(string $mpos) Return ChildAliCmbonus objects filtered by the mpos column
 * @method     ChildAliCmbonus[]|ObjectCollection findByCNote1(string $c_note1) Return ChildAliCmbonus objects filtered by the c_note1 column
 * @method     ChildAliCmbonus[]|ObjectCollection findByCNote2(string $c_note2) Return ChildAliCmbonus objects filtered by the c_note2 column
 * @method     ChildAliCmbonus[]|ObjectCollection findByCNote3(string $c_note3) Return ChildAliCmbonus objects filtered by the c_note3 column
 * @method     ChildAliCmbonus[]|ObjectCollection findByCNote4(string $c_note4) Return ChildAliCmbonus objects filtered by the c_note4 column
 * @method     ChildAliCmbonus[]|ObjectCollection findByCNote5(string $c_note5) Return ChildAliCmbonus objects filtered by the c_note5 column
 * @method     ChildAliCmbonus[]|ObjectCollection findByCTransfer(string $c_transfer) Return ChildAliCmbonus objects filtered by the c_transfer column
 * @method     ChildAliCmbonus[]|ObjectCollection findByCRemark(string $c_remark) Return ChildAliCmbonus objects filtered by the c_remark column
 * @method     ChildAliCmbonus[]|ObjectCollection findBySmsCredits(int $sms_credits) Return ChildAliCmbonus objects filtered by the sms_credits column
 * @method     ChildAliCmbonus[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliCmbonus objects filtered by the paydate column
 * @method     ChildAliCmbonus[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliCmbonus objects filtered by the locationbase column
 * @method     ChildAliCmbonus[]|ObjectCollection findByCrate(string $crate) Return ChildAliCmbonus objects filtered by the crate column
 * @method     ChildAliCmbonus[]|ObjectCollection findByVoucher(string $voucher) Return ChildAliCmbonus objects filtered by the voucher column
 * @method     ChildAliCmbonus[]|ObjectCollection findByMtype(int $mtype) Return ChildAliCmbonus objects filtered by the mtype column
 * @method     ChildAliCmbonus[]|ObjectCollection findByComTransferChagre(string $com_transfer_chagre) Return ChildAliCmbonus objects filtered by the com_transfer_chagre column
 * @method     ChildAliCmbonus[]|ObjectCollection findByNameF(string $name_f) Return ChildAliCmbonus objects filtered by the name_f column
 * @method     ChildAliCmbonus[]|ObjectCollection findByNameT(string $name_t) Return ChildAliCmbonus objects filtered by the name_t column
 * @method     ChildAliCmbonus[]|ObjectCollection findByIdCard(string $id_card) Return ChildAliCmbonus objects filtered by the id_card column
 * @method     ChildAliCmbonus[]|ObjectCollection findByIdTax(string $id_tax) Return ChildAliCmbonus objects filtered by the id_tax column
 * @method     ChildAliCmbonus[]|ObjectCollection findByFdate(string $fdate) Return ChildAliCmbonus objects filtered by the fdate column
 * @method     ChildAliCmbonus[]|ObjectCollection findByTdate(string $tdate) Return ChildAliCmbonus objects filtered by the tdate column
 * @method     ChildAliCmbonus[]|ObjectCollection findByBankcode(string $bankcode) Return ChildAliCmbonus objects filtered by the bankcode column
 * @method     ChildAliCmbonus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliCmbonusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliCmbonusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliCmbonus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliCmbonusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliCmbonusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliCmbonusQuery) {
            return $criteria;
        }
        $query = new ChildAliCmbonusQuery();
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
     * @return ChildAliCmbonus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliCmbonusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliCmbonusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliCmbonus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, status_pv, rcode, mcode, status, pv, pvb, pvh, ewallet, fob, cycle, smb, matching, onetime, atoship, ecom, ecom_round, ecomtranfer, total, totaly, tot_vat, tot_tax, title, mdate, month_pv, mpos, c_note1, c_note2, c_note3, c_note4, c_note5, c_transfer, c_remark, sms_credits, paydate, locationbase, crate, voucher, mtype, com_transfer_chagre, name_f, name_t, id_card, id_tax, fdate, tdate, bankcode FROM ali_cmbonus WHERE id = :p0';
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
            /** @var ChildAliCmbonus $obj */
            $obj = new ChildAliCmbonus();
            $obj->hydrate($row);
            AliCmbonusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliCmbonus|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliCmbonusTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliCmbonusTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the status_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusPv(1234); // WHERE status_pv = 1234
     * $query->filterByStatusPv(array(12, 34)); // WHERE status_pv IN (12, 34)
     * $query->filterByStatusPv(array('min' => 12)); // WHERE status_pv > 12
     * </code>
     *
     * @param     mixed $statusPv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByStatusPv($statusPv = null, $comparison = null)
    {
        if (is_array($statusPv)) {
            $useMinMax = false;
            if (isset($statusPv['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_STATUS_PV, $statusPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusPv['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_STATUS_PV, $statusPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_STATUS_PV, $statusPv, $comparison);
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
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_PV, $pv, $comparison);
    }

    /**
     * Filter the query on the pvb column
     *
     * Example usage:
     * <code>
     * $query->filterByPvb(1234); // WHERE pvb = 1234
     * $query->filterByPvb(array(12, 34)); // WHERE pvb IN (12, 34)
     * $query->filterByPvb(array('min' => 12)); // WHERE pvb > 12
     * </code>
     *
     * @param     mixed $pvb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByPvb($pvb = null, $comparison = null)
    {
        if (is_array($pvb)) {
            $useMinMax = false;
            if (isset($pvb['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_PVB, $pvb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvb['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_PVB, $pvb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_PVB, $pvb, $comparison);
    }

    /**
     * Filter the query on the pvh column
     *
     * Example usage:
     * <code>
     * $query->filterByPvh(1234); // WHERE pvh = 1234
     * $query->filterByPvh(array(12, 34)); // WHERE pvh IN (12, 34)
     * $query->filterByPvh(array('min' => 12)); // WHERE pvh > 12
     * </code>
     *
     * @param     mixed $pvh The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByPvh($pvh = null, $comparison = null)
    {
        if (is_array($pvh)) {
            $useMinMax = false;
            if (isset($pvh['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_PVH, $pvh['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvh['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_PVH, $pvh['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_PVH, $pvh, $comparison);
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
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_EWALLET, $ewallet, $comparison);
    }

    /**
     * Filter the query on the fob column
     *
     * Example usage:
     * <code>
     * $query->filterByFob(1234); // WHERE fob = 1234
     * $query->filterByFob(array(12, 34)); // WHERE fob IN (12, 34)
     * $query->filterByFob(array('min' => 12)); // WHERE fob > 12
     * </code>
     *
     * @param     mixed $fob The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByFob($fob = null, $comparison = null)
    {
        if (is_array($fob)) {
            $useMinMax = false;
            if (isset($fob['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_FOB, $fob['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fob['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_FOB, $fob['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_FOB, $fob, $comparison);
    }

    /**
     * Filter the query on the cycle column
     *
     * Example usage:
     * <code>
     * $query->filterByCycle(1234); // WHERE cycle = 1234
     * $query->filterByCycle(array(12, 34)); // WHERE cycle IN (12, 34)
     * $query->filterByCycle(array('min' => 12)); // WHERE cycle > 12
     * </code>
     *
     * @param     mixed $cycle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByCycle($cycle = null, $comparison = null)
    {
        if (is_array($cycle)) {
            $useMinMax = false;
            if (isset($cycle['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_CYCLE, $cycle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cycle['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_CYCLE, $cycle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_CYCLE, $cycle, $comparison);
    }

    /**
     * Filter the query on the smb column
     *
     * Example usage:
     * <code>
     * $query->filterBySmb(1234); // WHERE smb = 1234
     * $query->filterBySmb(array(12, 34)); // WHERE smb IN (12, 34)
     * $query->filterBySmb(array('min' => 12)); // WHERE smb > 12
     * </code>
     *
     * @param     mixed $smb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterBySmb($smb = null, $comparison = null)
    {
        if (is_array($smb)) {
            $useMinMax = false;
            if (isset($smb['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_SMB, $smb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($smb['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_SMB, $smb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_SMB, $smb, $comparison);
    }

    /**
     * Filter the query on the matching column
     *
     * Example usage:
     * <code>
     * $query->filterByMatching(1234); // WHERE matching = 1234
     * $query->filterByMatching(array(12, 34)); // WHERE matching IN (12, 34)
     * $query->filterByMatching(array('min' => 12)); // WHERE matching > 12
     * </code>
     *
     * @param     mixed $matching The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByMatching($matching = null, $comparison = null)
    {
        if (is_array($matching)) {
            $useMinMax = false;
            if (isset($matching['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_MATCHING, $matching['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($matching['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_MATCHING, $matching['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_MATCHING, $matching, $comparison);
    }

    /**
     * Filter the query on the onetime column
     *
     * Example usage:
     * <code>
     * $query->filterByOnetime(1234); // WHERE onetime = 1234
     * $query->filterByOnetime(array(12, 34)); // WHERE onetime IN (12, 34)
     * $query->filterByOnetime(array('min' => 12)); // WHERE onetime > 12
     * </code>
     *
     * @param     mixed $onetime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByOnetime($onetime = null, $comparison = null)
    {
        if (is_array($onetime)) {
            $useMinMax = false;
            if (isset($onetime['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_ONETIME, $onetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($onetime['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_ONETIME, $onetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_ONETIME, $onetime, $comparison);
    }

    /**
     * Filter the query on the atoship column
     *
     * Example usage:
     * <code>
     * $query->filterByAtoship(1234); // WHERE atoship = 1234
     * $query->filterByAtoship(array(12, 34)); // WHERE atoship IN (12, 34)
     * $query->filterByAtoship(array('min' => 12)); // WHERE atoship > 12
     * </code>
     *
     * @param     mixed $atoship The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByAtoship($atoship = null, $comparison = null)
    {
        if (is_array($atoship)) {
            $useMinMax = false;
            if (isset($atoship['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_ATOSHIP, $atoship['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($atoship['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_ATOSHIP, $atoship['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_ATOSHIP, $atoship, $comparison);
    }

    /**
     * Filter the query on the ecom column
     *
     * Example usage:
     * <code>
     * $query->filterByEcom(1234); // WHERE ecom = 1234
     * $query->filterByEcom(array(12, 34)); // WHERE ecom IN (12, 34)
     * $query->filterByEcom(array('min' => 12)); // WHERE ecom > 12
     * </code>
     *
     * @param     mixed $ecom The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByEcom($ecom = null, $comparison = null)
    {
        if (is_array($ecom)) {
            $useMinMax = false;
            if (isset($ecom['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_ECOM, $ecom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ecom['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_ECOM, $ecom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_ECOM, $ecom, $comparison);
    }

    /**
     * Filter the query on the ecom_round column
     *
     * Example usage:
     * <code>
     * $query->filterByEcomRound(1234); // WHERE ecom_round = 1234
     * $query->filterByEcomRound(array(12, 34)); // WHERE ecom_round IN (12, 34)
     * $query->filterByEcomRound(array('min' => 12)); // WHERE ecom_round > 12
     * </code>
     *
     * @param     mixed $ecomRound The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByEcomRound($ecomRound = null, $comparison = null)
    {
        if (is_array($ecomRound)) {
            $useMinMax = false;
            if (isset($ecomRound['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_ECOM_ROUND, $ecomRound['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ecomRound['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_ECOM_ROUND, $ecomRound['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_ECOM_ROUND, $ecomRound, $comparison);
    }

    /**
     * Filter the query on the ecomtranfer column
     *
     * Example usage:
     * <code>
     * $query->filterByEcomtranfer(1234); // WHERE ecomtranfer = 1234
     * $query->filterByEcomtranfer(array(12, 34)); // WHERE ecomtranfer IN (12, 34)
     * $query->filterByEcomtranfer(array('min' => 12)); // WHERE ecomtranfer > 12
     * </code>
     *
     * @param     mixed $ecomtranfer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByEcomtranfer($ecomtranfer = null, $comparison = null)
    {
        if (is_array($ecomtranfer)) {
            $useMinMax = false;
            if (isset($ecomtranfer['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_ECOMTRANFER, $ecomtranfer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ecomtranfer['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_ECOMTRANFER, $ecomtranfer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_ECOMTRANFER, $ecomtranfer, $comparison);
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
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the totaly column
     *
     * Example usage:
     * <code>
     * $query->filterByTotaly(1234); // WHERE totaly = 1234
     * $query->filterByTotaly(array(12, 34)); // WHERE totaly IN (12, 34)
     * $query->filterByTotaly(array('min' => 12)); // WHERE totaly > 12
     * </code>
     *
     * @param     mixed $totaly The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByTotaly($totaly = null, $comparison = null)
    {
        if (is_array($totaly)) {
            $useMinMax = false;
            if (isset($totaly['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_TOTALY, $totaly['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totaly['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_TOTALY, $totaly['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_TOTALY, $totaly, $comparison);
    }

    /**
     * Filter the query on the tot_vat column
     *
     * Example usage:
     * <code>
     * $query->filterByTotVat(1234); // WHERE tot_vat = 1234
     * $query->filterByTotVat(array(12, 34)); // WHERE tot_vat IN (12, 34)
     * $query->filterByTotVat(array('min' => 12)); // WHERE tot_vat > 12
     * </code>
     *
     * @param     mixed $totVat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByTotVat($totVat = null, $comparison = null)
    {
        if (is_array($totVat)) {
            $useMinMax = false;
            if (isset($totVat['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_TOT_VAT, $totVat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totVat['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_TOT_VAT, $totVat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_TOT_VAT, $totVat, $comparison);
    }

    /**
     * Filter the query on the tot_tax column
     *
     * Example usage:
     * <code>
     * $query->filterByTotTax(1234); // WHERE tot_tax = 1234
     * $query->filterByTotTax(array(12, 34)); // WHERE tot_tax IN (12, 34)
     * $query->filterByTotTax(array('min' => 12)); // WHERE tot_tax > 12
     * </code>
     *
     * @param     mixed $totTax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByTotTax($totTax = null, $comparison = null)
    {
        if (is_array($totTax)) {
            $useMinMax = false;
            if (isset($totTax['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_TOT_TAX, $totTax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totTax['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_TOT_TAX, $totTax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_TOT_TAX, $totTax, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the mdate column
     *
     * Example usage:
     * <code>
     * $query->filterByMdate('2011-03-14'); // WHERE mdate = '2011-03-14'
     * $query->filterByMdate('now'); // WHERE mdate = '2011-03-14'
     * $query->filterByMdate(array('max' => 'yesterday')); // WHERE mdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $mdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByMdate($mdate = null, $comparison = null)
    {
        if (is_array($mdate)) {
            $useMinMax = false;
            if (isset($mdate['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_MDATE, $mdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mdate['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_MDATE, $mdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_MDATE, $mdate, $comparison);
    }

    /**
     * Filter the query on the month_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByMonthPv('fooValue');   // WHERE month_pv = 'fooValue'
     * $query->filterByMonthPv('%fooValue%', Criteria::LIKE); // WHERE month_pv LIKE '%fooValue%'
     * </code>
     *
     * @param     string $monthPv The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByMonthPv($monthPv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($monthPv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_MONTH_PV, $monthPv, $comparison);
    }

    /**
     * Filter the query on the mpos column
     *
     * Example usage:
     * <code>
     * $query->filterByMpos('fooValue');   // WHERE mpos = 'fooValue'
     * $query->filterByMpos('%fooValue%', Criteria::LIKE); // WHERE mpos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mpos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByMpos($mpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_MPOS, $mpos, $comparison);
    }

    /**
     * Filter the query on the c_note1 column
     *
     * Example usage:
     * <code>
     * $query->filterByCNote1('fooValue');   // WHERE c_note1 = 'fooValue'
     * $query->filterByCNote1('%fooValue%', Criteria::LIKE); // WHERE c_note1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cNote1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByCNote1($cNote1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cNote1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_C_NOTE1, $cNote1, $comparison);
    }

    /**
     * Filter the query on the c_note2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCNote2('fooValue');   // WHERE c_note2 = 'fooValue'
     * $query->filterByCNote2('%fooValue%', Criteria::LIKE); // WHERE c_note2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cNote2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByCNote2($cNote2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cNote2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_C_NOTE2, $cNote2, $comparison);
    }

    /**
     * Filter the query on the c_note3 column
     *
     * Example usage:
     * <code>
     * $query->filterByCNote3('fooValue');   // WHERE c_note3 = 'fooValue'
     * $query->filterByCNote3('%fooValue%', Criteria::LIKE); // WHERE c_note3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cNote3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByCNote3($cNote3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cNote3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_C_NOTE3, $cNote3, $comparison);
    }

    /**
     * Filter the query on the c_note4 column
     *
     * Example usage:
     * <code>
     * $query->filterByCNote4('fooValue');   // WHERE c_note4 = 'fooValue'
     * $query->filterByCNote4('%fooValue%', Criteria::LIKE); // WHERE c_note4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cNote4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByCNote4($cNote4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cNote4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_C_NOTE4, $cNote4, $comparison);
    }

    /**
     * Filter the query on the c_note5 column
     *
     * Example usage:
     * <code>
     * $query->filterByCNote5('fooValue');   // WHERE c_note5 = 'fooValue'
     * $query->filterByCNote5('%fooValue%', Criteria::LIKE); // WHERE c_note5 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cNote5 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByCNote5($cNote5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cNote5)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_C_NOTE5, $cNote5, $comparison);
    }

    /**
     * Filter the query on the c_transfer column
     *
     * Example usage:
     * <code>
     * $query->filterByCTransfer('fooValue');   // WHERE c_transfer = 'fooValue'
     * $query->filterByCTransfer('%fooValue%', Criteria::LIKE); // WHERE c_transfer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cTransfer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByCTransfer($cTransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cTransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_C_TRANSFER, $cTransfer, $comparison);
    }

    /**
     * Filter the query on the c_remark column
     *
     * Example usage:
     * <code>
     * $query->filterByCRemark('fooValue');   // WHERE c_remark = 'fooValue'
     * $query->filterByCRemark('%fooValue%', Criteria::LIKE); // WHERE c_remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cRemark The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByCRemark($cRemark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cRemark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_C_REMARK, $cRemark, $comparison);
    }

    /**
     * Filter the query on the sms_credits column
     *
     * Example usage:
     * <code>
     * $query->filterBySmsCredits(1234); // WHERE sms_credits = 1234
     * $query->filterBySmsCredits(array(12, 34)); // WHERE sms_credits IN (12, 34)
     * $query->filterBySmsCredits(array('min' => 12)); // WHERE sms_credits > 12
     * </code>
     *
     * @param     mixed $smsCredits The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterBySmsCredits($smsCredits = null, $comparison = null)
    {
        if (is_array($smsCredits)) {
            $useMinMax = false;
            if (isset($smsCredits['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_SMS_CREDITS, $smsCredits['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($smsCredits['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_SMS_CREDITS, $smsCredits['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_SMS_CREDITS, $smsCredits, $comparison);
    }

    /**
     * Filter the query on the paydate column
     *
     * Example usage:
     * <code>
     * $query->filterByPaydate('fooValue');   // WHERE paydate = 'fooValue'
     * $query->filterByPaydate('%fooValue%', Criteria::LIKE); // WHERE paydate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paydate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paydate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_PAYDATE, $paydate, $comparison);
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
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_CRATE, $crate, $comparison);
    }

    /**
     * Filter the query on the voucher column
     *
     * Example usage:
     * <code>
     * $query->filterByVoucher(1234); // WHERE voucher = 1234
     * $query->filterByVoucher(array(12, 34)); // WHERE voucher IN (12, 34)
     * $query->filterByVoucher(array('min' => 12)); // WHERE voucher > 12
     * </code>
     *
     * @param     mixed $voucher The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByVoucher($voucher = null, $comparison = null)
    {
        if (is_array($voucher)) {
            $useMinMax = false;
            if (isset($voucher['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_VOUCHER, $voucher['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($voucher['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_VOUCHER, $voucher['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_VOUCHER, $voucher, $comparison);
    }

    /**
     * Filter the query on the mtype column
     *
     * Example usage:
     * <code>
     * $query->filterByMtype(1234); // WHERE mtype = 1234
     * $query->filterByMtype(array(12, 34)); // WHERE mtype IN (12, 34)
     * $query->filterByMtype(array('min' => 12)); // WHERE mtype > 12
     * </code>
     *
     * @param     mixed $mtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByMtype($mtype = null, $comparison = null)
    {
        if (is_array($mtype)) {
            $useMinMax = false;
            if (isset($mtype['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_MTYPE, $mtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mtype['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_MTYPE, $mtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_MTYPE, $mtype, $comparison);
    }

    /**
     * Filter the query on the com_transfer_chagre column
     *
     * Example usage:
     * <code>
     * $query->filterByComTransferChagre(1234); // WHERE com_transfer_chagre = 1234
     * $query->filterByComTransferChagre(array(12, 34)); // WHERE com_transfer_chagre IN (12, 34)
     * $query->filterByComTransferChagre(array('min' => 12)); // WHERE com_transfer_chagre > 12
     * </code>
     *
     * @param     mixed $comTransferChagre The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByComTransferChagre($comTransferChagre = null, $comparison = null)
    {
        if (is_array($comTransferChagre)) {
            $useMinMax = false;
            if (isset($comTransferChagre['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_COM_TRANSFER_CHAGRE, $comTransferChagre['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($comTransferChagre['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_COM_TRANSFER_CHAGRE, $comTransferChagre['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_COM_TRANSFER_CHAGRE, $comTransferChagre, $comparison);
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
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_NAME_T, $nameT, $comparison);
    }

    /**
     * Filter the query on the id_card column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCard('fooValue');   // WHERE id_card = 'fooValue'
     * $query->filterByIdCard('%fooValue%', Criteria::LIKE); // WHERE id_card LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idCard The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByIdCard($idCard = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idCard)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_ID_CARD, $idCard, $comparison);
    }

    /**
     * Filter the query on the id_tax column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTax('fooValue');   // WHERE id_tax = 'fooValue'
     * $query->filterByIdTax('%fooValue%', Criteria::LIKE); // WHERE id_tax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idTax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByIdTax($idTax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idTax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_ID_TAX, $idTax, $comparison);
    }

    /**
     * Filter the query on the fdate column
     *
     * Example usage:
     * <code>
     * $query->filterByFdate('2011-03-14'); // WHERE fdate = '2011-03-14'
     * $query->filterByFdate('now'); // WHERE fdate = '2011-03-14'
     * $query->filterByFdate(array('max' => 'yesterday')); // WHERE fdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $fdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_FDATE, $fdate, $comparison);
    }

    /**
     * Filter the query on the tdate column
     *
     * Example usage:
     * <code>
     * $query->filterByTdate('2011-03-14'); // WHERE tdate = '2011-03-14'
     * $query->filterByTdate('now'); // WHERE tdate = '2011-03-14'
     * $query->filterByTdate(array('max' => 'yesterday')); // WHERE tdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $tdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliCmbonusTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the bankcode column
     *
     * Example usage:
     * <code>
     * $query->filterByBankcode('fooValue');   // WHERE bankcode = 'fooValue'
     * $query->filterByBankcode('%fooValue%', Criteria::LIKE); // WHERE bankcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function filterByBankcode($bankcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusTableMap::COL_BANKCODE, $bankcode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliCmbonus $aliCmbonus Object to remove from the list of results
     *
     * @return $this|ChildAliCmbonusQuery The current query, for fluid interface
     */
    public function prune($aliCmbonus = null)
    {
        if ($aliCmbonus) {
            $this->addUsingAlias(AliCmbonusTableMap::COL_ID, $aliCmbonus->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_cmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCmbonusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliCmbonusTableMap::clearInstancePool();
            AliCmbonusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCmbonusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliCmbonusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliCmbonusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliCmbonusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliCmbonusQuery
