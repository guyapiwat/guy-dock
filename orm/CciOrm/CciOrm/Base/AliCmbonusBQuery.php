<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliCmbonusB as ChildAliCmbonusB;
use CciOrm\CciOrm\AliCmbonusBQuery as ChildAliCmbonusBQuery;
use CciOrm\CciOrm\Map\AliCmbonusBTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_cmbonus_b' table.
 *
 *
 *
 * @method     ChildAliCmbonusBQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliCmbonusBQuery orderByStatusPv($order = Criteria::ASC) Order by the status_pv column
 * @method     ChildAliCmbonusBQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliCmbonusBQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliCmbonusBQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliCmbonusBQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliCmbonusBQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliCmbonusBQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliCmbonusBQuery orderByPvb($order = Criteria::ASC) Order by the pvb column
 * @method     ChildAliCmbonusBQuery orderByPvh($order = Criteria::ASC) Order by the pvh column
 * @method     ChildAliCmbonusBQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliCmbonusBQuery orderByDmbonus($order = Criteria::ASC) Order by the dmbonus column
 * @method     ChildAliCmbonusBQuery orderByEmbonus($order = Criteria::ASC) Order by the embonus column
 * @method     ChildAliCmbonusBQuery orderByTotaly($order = Criteria::ASC) Order by the totaly column
 * @method     ChildAliCmbonusBQuery orderByTotVat($order = Criteria::ASC) Order by the tot_vat column
 * @method     ChildAliCmbonusBQuery orderByTotTax($order = Criteria::ASC) Order by the tot_tax column
 * @method     ChildAliCmbonusBQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildAliCmbonusBQuery orderByMdate($order = Criteria::ASC) Order by the mdate column
 * @method     ChildAliCmbonusBQuery orderByMonthPv($order = Criteria::ASC) Order by the month_pv column
 * @method     ChildAliCmbonusBQuery orderByMpos($order = Criteria::ASC) Order by the mpos column
 * @method     ChildAliCmbonusBQuery orderByCNote1($order = Criteria::ASC) Order by the c_note1 column
 * @method     ChildAliCmbonusBQuery orderByCNote2($order = Criteria::ASC) Order by the c_note2 column
 * @method     ChildAliCmbonusBQuery orderByCNote3($order = Criteria::ASC) Order by the c_note3 column
 * @method     ChildAliCmbonusBQuery orderByCNote4($order = Criteria::ASC) Order by the c_note4 column
 * @method     ChildAliCmbonusBQuery orderByCNote5($order = Criteria::ASC) Order by the c_note5 column
 * @method     ChildAliCmbonusBQuery orderByCTransfer($order = Criteria::ASC) Order by the c_transfer column
 * @method     ChildAliCmbonusBQuery orderByCRemark($order = Criteria::ASC) Order by the c_remark column
 * @method     ChildAliCmbonusBQuery orderBySmsCredits($order = Criteria::ASC) Order by the sms_credits column
 * @method     ChildAliCmbonusBQuery orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliCmbonusBQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliCmbonusBQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliCmbonusBQuery orderByVoucher($order = Criteria::ASC) Order by the voucher column
 * @method     ChildAliCmbonusBQuery orderByMtype($order = Criteria::ASC) Order by the mtype column
 * @method     ChildAliCmbonusBQuery orderByComTransferChagre($order = Criteria::ASC) Order by the com_transfer_chagre column
 * @method     ChildAliCmbonusBQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliCmbonusBQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliCmbonusBQuery orderByIdCard($order = Criteria::ASC) Order by the id_card column
 * @method     ChildAliCmbonusBQuery orderByIdTax($order = Criteria::ASC) Order by the id_tax column
 * @method     ChildAliCmbonusBQuery orderByVip($order = Criteria::ASC) Order by the vip column
 * @method     ChildAliCmbonusBQuery orderByBankcode($order = Criteria::ASC) Order by the bankcode column
 * @method     ChildAliCmbonusBQuery orderByAccNo($order = Criteria::ASC) Order by the acc_no column
 * @method     ChildAliCmbonusBQuery orderByAccName($order = Criteria::ASC) Order by the acc_name column
 * @method     ChildAliCmbonusBQuery orderByBranch($order = Criteria::ASC) Order by the branch column
 * @method     ChildAliCmbonusBQuery orderByMobile($order = Criteria::ASC) Order by the mobile column
 * @method     ChildAliCmbonusBQuery orderByCmp($order = Criteria::ASC) Order by the cmp column
 * @method     ChildAliCmbonusBQuery orderByCmp2($order = Criteria::ASC) Order by the cmp2 column
 *
 * @method     ChildAliCmbonusBQuery groupById() Group by the id column
 * @method     ChildAliCmbonusBQuery groupByStatusPv() Group by the status_pv column
 * @method     ChildAliCmbonusBQuery groupByRcode() Group by the rcode column
 * @method     ChildAliCmbonusBQuery groupByFdate() Group by the fdate column
 * @method     ChildAliCmbonusBQuery groupByTdate() Group by the tdate column
 * @method     ChildAliCmbonusBQuery groupByMcode() Group by the mcode column
 * @method     ChildAliCmbonusBQuery groupByStatus() Group by the status column
 * @method     ChildAliCmbonusBQuery groupByPv() Group by the pv column
 * @method     ChildAliCmbonusBQuery groupByPvb() Group by the pvb column
 * @method     ChildAliCmbonusBQuery groupByPvh() Group by the pvh column
 * @method     ChildAliCmbonusBQuery groupByTotal() Group by the total column
 * @method     ChildAliCmbonusBQuery groupByDmbonus() Group by the dmbonus column
 * @method     ChildAliCmbonusBQuery groupByEmbonus() Group by the embonus column
 * @method     ChildAliCmbonusBQuery groupByTotaly() Group by the totaly column
 * @method     ChildAliCmbonusBQuery groupByTotVat() Group by the tot_vat column
 * @method     ChildAliCmbonusBQuery groupByTotTax() Group by the tot_tax column
 * @method     ChildAliCmbonusBQuery groupByTitle() Group by the title column
 * @method     ChildAliCmbonusBQuery groupByMdate() Group by the mdate column
 * @method     ChildAliCmbonusBQuery groupByMonthPv() Group by the month_pv column
 * @method     ChildAliCmbonusBQuery groupByMpos() Group by the mpos column
 * @method     ChildAliCmbonusBQuery groupByCNote1() Group by the c_note1 column
 * @method     ChildAliCmbonusBQuery groupByCNote2() Group by the c_note2 column
 * @method     ChildAliCmbonusBQuery groupByCNote3() Group by the c_note3 column
 * @method     ChildAliCmbonusBQuery groupByCNote4() Group by the c_note4 column
 * @method     ChildAliCmbonusBQuery groupByCNote5() Group by the c_note5 column
 * @method     ChildAliCmbonusBQuery groupByCTransfer() Group by the c_transfer column
 * @method     ChildAliCmbonusBQuery groupByCRemark() Group by the c_remark column
 * @method     ChildAliCmbonusBQuery groupBySmsCredits() Group by the sms_credits column
 * @method     ChildAliCmbonusBQuery groupByPaydate() Group by the paydate column
 * @method     ChildAliCmbonusBQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliCmbonusBQuery groupByCrate() Group by the crate column
 * @method     ChildAliCmbonusBQuery groupByVoucher() Group by the voucher column
 * @method     ChildAliCmbonusBQuery groupByMtype() Group by the mtype column
 * @method     ChildAliCmbonusBQuery groupByComTransferChagre() Group by the com_transfer_chagre column
 * @method     ChildAliCmbonusBQuery groupByNameF() Group by the name_f column
 * @method     ChildAliCmbonusBQuery groupByNameT() Group by the name_t column
 * @method     ChildAliCmbonusBQuery groupByIdCard() Group by the id_card column
 * @method     ChildAliCmbonusBQuery groupByIdTax() Group by the id_tax column
 * @method     ChildAliCmbonusBQuery groupByVip() Group by the vip column
 * @method     ChildAliCmbonusBQuery groupByBankcode() Group by the bankcode column
 * @method     ChildAliCmbonusBQuery groupByAccNo() Group by the acc_no column
 * @method     ChildAliCmbonusBQuery groupByAccName() Group by the acc_name column
 * @method     ChildAliCmbonusBQuery groupByBranch() Group by the branch column
 * @method     ChildAliCmbonusBQuery groupByMobile() Group by the mobile column
 * @method     ChildAliCmbonusBQuery groupByCmp() Group by the cmp column
 * @method     ChildAliCmbonusBQuery groupByCmp2() Group by the cmp2 column
 *
 * @method     ChildAliCmbonusBQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliCmbonusBQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliCmbonusBQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliCmbonusBQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliCmbonusBQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliCmbonusBQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliCmbonusB findOne(ConnectionInterface $con = null) Return the first ChildAliCmbonusB matching the query
 * @method     ChildAliCmbonusB findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliCmbonusB matching the query, or a new ChildAliCmbonusB object populated from the query conditions when no match is found
 *
 * @method     ChildAliCmbonusB findOneById(int $id) Return the first ChildAliCmbonusB filtered by the id column
 * @method     ChildAliCmbonusB findOneByStatusPv(string $status_pv) Return the first ChildAliCmbonusB filtered by the status_pv column
 * @method     ChildAliCmbonusB findOneByRcode(int $rcode) Return the first ChildAliCmbonusB filtered by the rcode column
 * @method     ChildAliCmbonusB findOneByFdate(string $fdate) Return the first ChildAliCmbonusB filtered by the fdate column
 * @method     ChildAliCmbonusB findOneByTdate(string $tdate) Return the first ChildAliCmbonusB filtered by the tdate column
 * @method     ChildAliCmbonusB findOneByMcode(string $mcode) Return the first ChildAliCmbonusB filtered by the mcode column
 * @method     ChildAliCmbonusB findOneByStatus(string $status) Return the first ChildAliCmbonusB filtered by the status column
 * @method     ChildAliCmbonusB findOneByPv(string $pv) Return the first ChildAliCmbonusB filtered by the pv column
 * @method     ChildAliCmbonusB findOneByPvb(string $pvb) Return the first ChildAliCmbonusB filtered by the pvb column
 * @method     ChildAliCmbonusB findOneByPvh(string $pvh) Return the first ChildAliCmbonusB filtered by the pvh column
 * @method     ChildAliCmbonusB findOneByTotal(string $total) Return the first ChildAliCmbonusB filtered by the total column
 * @method     ChildAliCmbonusB findOneByDmbonus(string $dmbonus) Return the first ChildAliCmbonusB filtered by the dmbonus column
 * @method     ChildAliCmbonusB findOneByEmbonus(string $embonus) Return the first ChildAliCmbonusB filtered by the embonus column
 * @method     ChildAliCmbonusB findOneByTotaly(string $totaly) Return the first ChildAliCmbonusB filtered by the totaly column
 * @method     ChildAliCmbonusB findOneByTotVat(string $tot_vat) Return the first ChildAliCmbonusB filtered by the tot_vat column
 * @method     ChildAliCmbonusB findOneByTotTax(string $tot_tax) Return the first ChildAliCmbonusB filtered by the tot_tax column
 * @method     ChildAliCmbonusB findOneByTitle(string $title) Return the first ChildAliCmbonusB filtered by the title column
 * @method     ChildAliCmbonusB findOneByMdate(string $mdate) Return the first ChildAliCmbonusB filtered by the mdate column
 * @method     ChildAliCmbonusB findOneByMonthPv(string $month_pv) Return the first ChildAliCmbonusB filtered by the month_pv column
 * @method     ChildAliCmbonusB findOneByMpos(string $mpos) Return the first ChildAliCmbonusB filtered by the mpos column
 * @method     ChildAliCmbonusB findOneByCNote1(string $c_note1) Return the first ChildAliCmbonusB filtered by the c_note1 column
 * @method     ChildAliCmbonusB findOneByCNote2(string $c_note2) Return the first ChildAliCmbonusB filtered by the c_note2 column
 * @method     ChildAliCmbonusB findOneByCNote3(string $c_note3) Return the first ChildAliCmbonusB filtered by the c_note3 column
 * @method     ChildAliCmbonusB findOneByCNote4(string $c_note4) Return the first ChildAliCmbonusB filtered by the c_note4 column
 * @method     ChildAliCmbonusB findOneByCNote5(string $c_note5) Return the first ChildAliCmbonusB filtered by the c_note5 column
 * @method     ChildAliCmbonusB findOneByCTransfer(string $c_transfer) Return the first ChildAliCmbonusB filtered by the c_transfer column
 * @method     ChildAliCmbonusB findOneByCRemark(string $c_remark) Return the first ChildAliCmbonusB filtered by the c_remark column
 * @method     ChildAliCmbonusB findOneBySmsCredits(int $sms_credits) Return the first ChildAliCmbonusB filtered by the sms_credits column
 * @method     ChildAliCmbonusB findOneByPaydate(string $paydate) Return the first ChildAliCmbonusB filtered by the paydate column
 * @method     ChildAliCmbonusB findOneByLocationbase(int $locationbase) Return the first ChildAliCmbonusB filtered by the locationbase column
 * @method     ChildAliCmbonusB findOneByCrate(string $crate) Return the first ChildAliCmbonusB filtered by the crate column
 * @method     ChildAliCmbonusB findOneByVoucher(string $voucher) Return the first ChildAliCmbonusB filtered by the voucher column
 * @method     ChildAliCmbonusB findOneByMtype(int $mtype) Return the first ChildAliCmbonusB filtered by the mtype column
 * @method     ChildAliCmbonusB findOneByComTransferChagre(string $com_transfer_chagre) Return the first ChildAliCmbonusB filtered by the com_transfer_chagre column
 * @method     ChildAliCmbonusB findOneByNameF(string $name_f) Return the first ChildAliCmbonusB filtered by the name_f column
 * @method     ChildAliCmbonusB findOneByNameT(string $name_t) Return the first ChildAliCmbonusB filtered by the name_t column
 * @method     ChildAliCmbonusB findOneByIdCard(string $id_card) Return the first ChildAliCmbonusB filtered by the id_card column
 * @method     ChildAliCmbonusB findOneByIdTax(string $id_tax) Return the first ChildAliCmbonusB filtered by the id_tax column
 * @method     ChildAliCmbonusB findOneByVip(int $vip) Return the first ChildAliCmbonusB filtered by the vip column
 * @method     ChildAliCmbonusB findOneByBankcode(string $bankcode) Return the first ChildAliCmbonusB filtered by the bankcode column
 * @method     ChildAliCmbonusB findOneByAccNo(string $acc_no) Return the first ChildAliCmbonusB filtered by the acc_no column
 * @method     ChildAliCmbonusB findOneByAccName(string $acc_name) Return the first ChildAliCmbonusB filtered by the acc_name column
 * @method     ChildAliCmbonusB findOneByBranch(string $branch) Return the first ChildAliCmbonusB filtered by the branch column
 * @method     ChildAliCmbonusB findOneByMobile(string $mobile) Return the first ChildAliCmbonusB filtered by the mobile column
 * @method     ChildAliCmbonusB findOneByCmp(string $cmp) Return the first ChildAliCmbonusB filtered by the cmp column
 * @method     ChildAliCmbonusB findOneByCmp2(string $cmp2) Return the first ChildAliCmbonusB filtered by the cmp2 column *

 * @method     ChildAliCmbonusB requirePk($key, ConnectionInterface $con = null) Return the ChildAliCmbonusB by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOne(ConnectionInterface $con = null) Return the first ChildAliCmbonusB matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCmbonusB requireOneById(int $id) Return the first ChildAliCmbonusB filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByStatusPv(string $status_pv) Return the first ChildAliCmbonusB filtered by the status_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByRcode(int $rcode) Return the first ChildAliCmbonusB filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByFdate(string $fdate) Return the first ChildAliCmbonusB filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByTdate(string $tdate) Return the first ChildAliCmbonusB filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByMcode(string $mcode) Return the first ChildAliCmbonusB filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByStatus(string $status) Return the first ChildAliCmbonusB filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByPv(string $pv) Return the first ChildAliCmbonusB filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByPvb(string $pvb) Return the first ChildAliCmbonusB filtered by the pvb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByPvh(string $pvh) Return the first ChildAliCmbonusB filtered by the pvh column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByTotal(string $total) Return the first ChildAliCmbonusB filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByDmbonus(string $dmbonus) Return the first ChildAliCmbonusB filtered by the dmbonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByEmbonus(string $embonus) Return the first ChildAliCmbonusB filtered by the embonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByTotaly(string $totaly) Return the first ChildAliCmbonusB filtered by the totaly column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByTotVat(string $tot_vat) Return the first ChildAliCmbonusB filtered by the tot_vat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByTotTax(string $tot_tax) Return the first ChildAliCmbonusB filtered by the tot_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByTitle(string $title) Return the first ChildAliCmbonusB filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByMdate(string $mdate) Return the first ChildAliCmbonusB filtered by the mdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByMonthPv(string $month_pv) Return the first ChildAliCmbonusB filtered by the month_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByMpos(string $mpos) Return the first ChildAliCmbonusB filtered by the mpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByCNote1(string $c_note1) Return the first ChildAliCmbonusB filtered by the c_note1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByCNote2(string $c_note2) Return the first ChildAliCmbonusB filtered by the c_note2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByCNote3(string $c_note3) Return the first ChildAliCmbonusB filtered by the c_note3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByCNote4(string $c_note4) Return the first ChildAliCmbonusB filtered by the c_note4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByCNote5(string $c_note5) Return the first ChildAliCmbonusB filtered by the c_note5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByCTransfer(string $c_transfer) Return the first ChildAliCmbonusB filtered by the c_transfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByCRemark(string $c_remark) Return the first ChildAliCmbonusB filtered by the c_remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneBySmsCredits(int $sms_credits) Return the first ChildAliCmbonusB filtered by the sms_credits column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByPaydate(string $paydate) Return the first ChildAliCmbonusB filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByLocationbase(int $locationbase) Return the first ChildAliCmbonusB filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByCrate(string $crate) Return the first ChildAliCmbonusB filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByVoucher(string $voucher) Return the first ChildAliCmbonusB filtered by the voucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByMtype(int $mtype) Return the first ChildAliCmbonusB filtered by the mtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByComTransferChagre(string $com_transfer_chagre) Return the first ChildAliCmbonusB filtered by the com_transfer_chagre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByNameF(string $name_f) Return the first ChildAliCmbonusB filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByNameT(string $name_t) Return the first ChildAliCmbonusB filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByIdCard(string $id_card) Return the first ChildAliCmbonusB filtered by the id_card column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByIdTax(string $id_tax) Return the first ChildAliCmbonusB filtered by the id_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByVip(int $vip) Return the first ChildAliCmbonusB filtered by the vip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByBankcode(string $bankcode) Return the first ChildAliCmbonusB filtered by the bankcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByAccNo(string $acc_no) Return the first ChildAliCmbonusB filtered by the acc_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByAccName(string $acc_name) Return the first ChildAliCmbonusB filtered by the acc_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByBranch(string $branch) Return the first ChildAliCmbonusB filtered by the branch column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByMobile(string $mobile) Return the first ChildAliCmbonusB filtered by the mobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByCmp(string $cmp) Return the first ChildAliCmbonusB filtered by the cmp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCmbonusB requireOneByCmp2(string $cmp2) Return the first ChildAliCmbonusB filtered by the cmp2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCmbonusB[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliCmbonusB objects based on current ModelCriteria
 * @method     ChildAliCmbonusB[]|ObjectCollection findById(int $id) Return ChildAliCmbonusB objects filtered by the id column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByStatusPv(string $status_pv) Return ChildAliCmbonusB objects filtered by the status_pv column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByRcode(int $rcode) Return ChildAliCmbonusB objects filtered by the rcode column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByFdate(string $fdate) Return ChildAliCmbonusB objects filtered by the fdate column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByTdate(string $tdate) Return ChildAliCmbonusB objects filtered by the tdate column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByMcode(string $mcode) Return ChildAliCmbonusB objects filtered by the mcode column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByStatus(string $status) Return ChildAliCmbonusB objects filtered by the status column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByPv(string $pv) Return ChildAliCmbonusB objects filtered by the pv column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByPvb(string $pvb) Return ChildAliCmbonusB objects filtered by the pvb column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByPvh(string $pvh) Return ChildAliCmbonusB objects filtered by the pvh column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByTotal(string $total) Return ChildAliCmbonusB objects filtered by the total column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByDmbonus(string $dmbonus) Return ChildAliCmbonusB objects filtered by the dmbonus column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByEmbonus(string $embonus) Return ChildAliCmbonusB objects filtered by the embonus column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByTotaly(string $totaly) Return ChildAliCmbonusB objects filtered by the totaly column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByTotVat(string $tot_vat) Return ChildAliCmbonusB objects filtered by the tot_vat column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByTotTax(string $tot_tax) Return ChildAliCmbonusB objects filtered by the tot_tax column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByTitle(string $title) Return ChildAliCmbonusB objects filtered by the title column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByMdate(string $mdate) Return ChildAliCmbonusB objects filtered by the mdate column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByMonthPv(string $month_pv) Return ChildAliCmbonusB objects filtered by the month_pv column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByMpos(string $mpos) Return ChildAliCmbonusB objects filtered by the mpos column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByCNote1(string $c_note1) Return ChildAliCmbonusB objects filtered by the c_note1 column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByCNote2(string $c_note2) Return ChildAliCmbonusB objects filtered by the c_note2 column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByCNote3(string $c_note3) Return ChildAliCmbonusB objects filtered by the c_note3 column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByCNote4(string $c_note4) Return ChildAliCmbonusB objects filtered by the c_note4 column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByCNote5(string $c_note5) Return ChildAliCmbonusB objects filtered by the c_note5 column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByCTransfer(string $c_transfer) Return ChildAliCmbonusB objects filtered by the c_transfer column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByCRemark(string $c_remark) Return ChildAliCmbonusB objects filtered by the c_remark column
 * @method     ChildAliCmbonusB[]|ObjectCollection findBySmsCredits(int $sms_credits) Return ChildAliCmbonusB objects filtered by the sms_credits column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliCmbonusB objects filtered by the paydate column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliCmbonusB objects filtered by the locationbase column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByCrate(string $crate) Return ChildAliCmbonusB objects filtered by the crate column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByVoucher(string $voucher) Return ChildAliCmbonusB objects filtered by the voucher column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByMtype(int $mtype) Return ChildAliCmbonusB objects filtered by the mtype column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByComTransferChagre(string $com_transfer_chagre) Return ChildAliCmbonusB objects filtered by the com_transfer_chagre column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByNameF(string $name_f) Return ChildAliCmbonusB objects filtered by the name_f column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByNameT(string $name_t) Return ChildAliCmbonusB objects filtered by the name_t column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByIdCard(string $id_card) Return ChildAliCmbonusB objects filtered by the id_card column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByIdTax(string $id_tax) Return ChildAliCmbonusB objects filtered by the id_tax column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByVip(int $vip) Return ChildAliCmbonusB objects filtered by the vip column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByBankcode(string $bankcode) Return ChildAliCmbonusB objects filtered by the bankcode column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByAccNo(string $acc_no) Return ChildAliCmbonusB objects filtered by the acc_no column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByAccName(string $acc_name) Return ChildAliCmbonusB objects filtered by the acc_name column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByBranch(string $branch) Return ChildAliCmbonusB objects filtered by the branch column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByMobile(string $mobile) Return ChildAliCmbonusB objects filtered by the mobile column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByCmp(string $cmp) Return ChildAliCmbonusB objects filtered by the cmp column
 * @method     ChildAliCmbonusB[]|ObjectCollection findByCmp2(string $cmp2) Return ChildAliCmbonusB objects filtered by the cmp2 column
 * @method     ChildAliCmbonusB[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliCmbonusBQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliCmbonusBQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliCmbonusB', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliCmbonusBQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliCmbonusBQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliCmbonusBQuery) {
            return $criteria;
        }
        $query = new ChildAliCmbonusBQuery();
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
     * @return ChildAliCmbonusB|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliCmbonusBTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliCmbonusBTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliCmbonusB A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, status_pv, rcode, fdate, tdate, mcode, status, pv, pvb, pvh, total, dmbonus, embonus, totaly, tot_vat, tot_tax, title, mdate, month_pv, mpos, c_note1, c_note2, c_note3, c_note4, c_note5, c_transfer, c_remark, sms_credits, paydate, locationbase, crate, voucher, mtype, com_transfer_chagre, name_f, name_t, id_card, id_tax, vip, bankcode, acc_no, acc_name, branch, mobile, cmp, cmp2 FROM ali_cmbonus_b WHERE id = :p0';
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
            /** @var ChildAliCmbonusB $obj */
            $obj = new ChildAliCmbonusB();
            $obj->hydrate($row);
            AliCmbonusBTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliCmbonusB|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByStatusPv($statusPv = null, $comparison = null)
    {
        if (is_array($statusPv)) {
            $useMinMax = false;
            if (isset($statusPv['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_STATUS_PV, $statusPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusPv['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_STATUS_PV, $statusPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_STATUS_PV, $statusPv, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByPvb($pvb = null, $comparison = null)
    {
        if (is_array($pvb)) {
            $useMinMax = false;
            if (isset($pvb['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_PVB, $pvb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvb['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_PVB, $pvb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_PVB, $pvb, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByPvh($pvh = null, $comparison = null)
    {
        if (is_array($pvh)) {
            $useMinMax = false;
            if (isset($pvh['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_PVH, $pvh['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvh['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_PVH, $pvh['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_PVH, $pvh, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the dmbonus column
     *
     * Example usage:
     * <code>
     * $query->filterByDmbonus(1234); // WHERE dmbonus = 1234
     * $query->filterByDmbonus(array(12, 34)); // WHERE dmbonus IN (12, 34)
     * $query->filterByDmbonus(array('min' => 12)); // WHERE dmbonus > 12
     * </code>
     *
     * @param     mixed $dmbonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByDmbonus($dmbonus = null, $comparison = null)
    {
        if (is_array($dmbonus)) {
            $useMinMax = false;
            if (isset($dmbonus['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_DMBONUS, $dmbonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dmbonus['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_DMBONUS, $dmbonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_DMBONUS, $dmbonus, $comparison);
    }

    /**
     * Filter the query on the embonus column
     *
     * Example usage:
     * <code>
     * $query->filterByEmbonus(1234); // WHERE embonus = 1234
     * $query->filterByEmbonus(array(12, 34)); // WHERE embonus IN (12, 34)
     * $query->filterByEmbonus(array('min' => 12)); // WHERE embonus > 12
     * </code>
     *
     * @param     mixed $embonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByEmbonus($embonus = null, $comparison = null)
    {
        if (is_array($embonus)) {
            $useMinMax = false;
            if (isset($embonus['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_EMBONUS, $embonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($embonus['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_EMBONUS, $embonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_EMBONUS, $embonus, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByTotaly($totaly = null, $comparison = null)
    {
        if (is_array($totaly)) {
            $useMinMax = false;
            if (isset($totaly['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_TOTALY, $totaly['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totaly['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_TOTALY, $totaly['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_TOTALY, $totaly, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByTotVat($totVat = null, $comparison = null)
    {
        if (is_array($totVat)) {
            $useMinMax = false;
            if (isset($totVat['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_TOT_VAT, $totVat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totVat['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_TOT_VAT, $totVat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_TOT_VAT, $totVat, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByTotTax($totTax = null, $comparison = null)
    {
        if (is_array($totTax)) {
            $useMinMax = false;
            if (isset($totTax['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_TOT_TAX, $totTax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totTax['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_TOT_TAX, $totTax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_TOT_TAX, $totTax, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByMdate($mdate = null, $comparison = null)
    {
        if (is_array($mdate)) {
            $useMinMax = false;
            if (isset($mdate['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_MDATE, $mdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mdate['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_MDATE, $mdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_MDATE, $mdate, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByMonthPv($monthPv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($monthPv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_MONTH_PV, $monthPv, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByMpos($mpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_MPOS, $mpos, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByCNote1($cNote1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cNote1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_C_NOTE1, $cNote1, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByCNote2($cNote2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cNote2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_C_NOTE2, $cNote2, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByCNote3($cNote3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cNote3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_C_NOTE3, $cNote3, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByCNote4($cNote4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cNote4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_C_NOTE4, $cNote4, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByCNote5($cNote5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cNote5)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_C_NOTE5, $cNote5, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByCTransfer($cTransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cTransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_C_TRANSFER, $cTransfer, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByCRemark($cRemark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cRemark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_C_REMARK, $cRemark, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterBySmsCredits($smsCredits = null, $comparison = null)
    {
        if (is_array($smsCredits)) {
            $useMinMax = false;
            if (isset($smsCredits['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_SMS_CREDITS, $smsCredits['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($smsCredits['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_SMS_CREDITS, $smsCredits['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_SMS_CREDITS, $smsCredits, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paydate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_PAYDATE, $paydate, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByVoucher($voucher = null, $comparison = null)
    {
        if (is_array($voucher)) {
            $useMinMax = false;
            if (isset($voucher['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_VOUCHER, $voucher['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($voucher['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_VOUCHER, $voucher['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_VOUCHER, $voucher, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByMtype($mtype = null, $comparison = null)
    {
        if (is_array($mtype)) {
            $useMinMax = false;
            if (isset($mtype['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_MTYPE, $mtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mtype['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_MTYPE, $mtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_MTYPE, $mtype, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByComTransferChagre($comTransferChagre = null, $comparison = null)
    {
        if (is_array($comTransferChagre)) {
            $useMinMax = false;
            if (isset($comTransferChagre['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_COM_TRANSFER_CHAGRE, $comTransferChagre['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($comTransferChagre['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_COM_TRANSFER_CHAGRE, $comTransferChagre['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_COM_TRANSFER_CHAGRE, $comTransferChagre, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByIdCard($idCard = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idCard)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_ID_CARD, $idCard, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByIdTax($idTax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idTax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_ID_TAX, $idTax, $comparison);
    }

    /**
     * Filter the query on the vip column
     *
     * Example usage:
     * <code>
     * $query->filterByVip(1234); // WHERE vip = 1234
     * $query->filterByVip(array(12, 34)); // WHERE vip IN (12, 34)
     * $query->filterByVip(array('min' => 12)); // WHERE vip > 12
     * </code>
     *
     * @param     mixed $vip The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByVip($vip = null, $comparison = null)
    {
        if (is_array($vip)) {
            $useMinMax = false;
            if (isset($vip['min'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_VIP, $vip['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vip['max'])) {
                $this->addUsingAlias(AliCmbonusBTableMap::COL_VIP, $vip['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_VIP, $vip, $comparison);
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
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByBankcode($bankcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_BANKCODE, $bankcode, $comparison);
    }

    /**
     * Filter the query on the acc_no column
     *
     * Example usage:
     * <code>
     * $query->filterByAccNo('fooValue');   // WHERE acc_no = 'fooValue'
     * $query->filterByAccNo('%fooValue%', Criteria::LIKE); // WHERE acc_no LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accNo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByAccNo($accNo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accNo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_ACC_NO, $accNo, $comparison);
    }

    /**
     * Filter the query on the acc_name column
     *
     * Example usage:
     * <code>
     * $query->filterByAccName('fooValue');   // WHERE acc_name = 'fooValue'
     * $query->filterByAccName('%fooValue%', Criteria::LIKE); // WHERE acc_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByAccName($accName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_ACC_NAME, $accName, $comparison);
    }

    /**
     * Filter the query on the branch column
     *
     * Example usage:
     * <code>
     * $query->filterByBranch('fooValue');   // WHERE branch = 'fooValue'
     * $query->filterByBranch('%fooValue%', Criteria::LIKE); // WHERE branch LIKE '%fooValue%'
     * </code>
     *
     * @param     string $branch The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByBranch($branch = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($branch)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_BRANCH, $branch, $comparison);
    }

    /**
     * Filter the query on the mobile column
     *
     * Example usage:
     * <code>
     * $query->filterByMobile('fooValue');   // WHERE mobile = 'fooValue'
     * $query->filterByMobile('%fooValue%', Criteria::LIKE); // WHERE mobile LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mobile The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByMobile($mobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mobile)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_MOBILE, $mobile, $comparison);
    }

    /**
     * Filter the query on the cmp column
     *
     * Example usage:
     * <code>
     * $query->filterByCmp('fooValue');   // WHERE cmp = 'fooValue'
     * $query->filterByCmp('%fooValue%', Criteria::LIKE); // WHERE cmp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cmp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByCmp($cmp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_CMP, $cmp, $comparison);
    }

    /**
     * Filter the query on the cmp2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCmp2('fooValue');   // WHERE cmp2 = 'fooValue'
     * $query->filterByCmp2('%fooValue%', Criteria::LIKE); // WHERE cmp2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cmp2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function filterByCmp2($cmp2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmp2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCmbonusBTableMap::COL_CMP2, $cmp2, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliCmbonusB $aliCmbonusB Object to remove from the list of results
     *
     * @return $this|ChildAliCmbonusBQuery The current query, for fluid interface
     */
    public function prune($aliCmbonusB = null)
    {
        if ($aliCmbonusB) {
            $this->addUsingAlias(AliCmbonusBTableMap::COL_ID, $aliCmbonusB->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_cmbonus_b table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCmbonusBTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliCmbonusBTableMap::clearInstancePool();
            AliCmbonusBTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCmbonusBTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliCmbonusBTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliCmbonusBTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliCmbonusBTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliCmbonusBQuery
