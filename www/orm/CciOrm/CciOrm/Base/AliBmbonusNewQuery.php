<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliBmbonusNew as ChildAliBmbonusNew;
use CciOrm\CciOrm\AliBmbonusNewQuery as ChildAliBmbonusNewQuery;
use CciOrm\CciOrm\Map\AliBmbonusNewTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_bmbonus_new' table.
 *
 *
 *
 * @method     ChildAliBmbonusNewQuery orderByCid($order = Criteria::ASC) Order by the cid column
 * @method     ChildAliBmbonusNewQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliBmbonusNewQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliBmbonusNewQuery orderByRoL($order = Criteria::ASC) Order by the ro_l column
 * @method     ChildAliBmbonusNewQuery orderByRoC($order = Criteria::ASC) Order by the ro_c column
 * @method     ChildAliBmbonusNewQuery orderByRoR($order = Criteria::ASC) Order by the ro_r column
 * @method     ChildAliBmbonusNewQuery orderByPcrryL($order = Criteria::ASC) Order by the pcrry_l column
 * @method     ChildAliBmbonusNewQuery orderByCcpcrryL($order = Criteria::ASC) Order by the ccpcrry_l column
 * @method     ChildAliBmbonusNewQuery orderByCcpcrryC($order = Criteria::ASC) Order by the ccpcrry_c column
 * @method     ChildAliBmbonusNewQuery orderByPcrryC($order = Criteria::ASC) Order by the pcrry_c column
 * @method     ChildAliBmbonusNewQuery orderByPcrryR($order = Criteria::ASC) Order by the pcrry_r column
 * @method     ChildAliBmbonusNewQuery orderByPquota($order = Criteria::ASC) Order by the pquota column
 * @method     ChildAliBmbonusNewQuery orderByTotalPvLl($order = Criteria::ASC) Order by the total_pv_ll column
 * @method     ChildAliBmbonusNewQuery orderByTotalPvRr($order = Criteria::ASC) Order by the total_pv_rr column
 * @method     ChildAliBmbonusNewQuery orderByTotalPvL($order = Criteria::ASC) Order by the total_pv_l column
 * @method     ChildAliBmbonusNewQuery orderByTotalPvR($order = Criteria::ASC) Order by the total_pv_r column
 * @method     ChildAliBmbonusNewQuery orderByCountL($order = Criteria::ASC) Order by the count_l column
 * @method     ChildAliBmbonusNewQuery orderByCountC($order = Criteria::ASC) Order by the count_c column
 * @method     ChildAliBmbonusNewQuery orderByCountR($order = Criteria::ASC) Order by the count_r column
 * @method     ChildAliBmbonusNewQuery orderByCarryL($order = Criteria::ASC) Order by the carry_l column
 * @method     ChildAliBmbonusNewQuery orderByCarryC($order = Criteria::ASC) Order by the carry_c column
 * @method     ChildAliBmbonusNewQuery orderByCarryR($order = Criteria::ASC) Order by the carry_r column
 * @method     ChildAliBmbonusNewQuery orderByQuota($order = Criteria::ASC) Order by the quota column
 * @method     ChildAliBmbonusNewQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliBmbonusNewQuery orderByPercer($order = Criteria::ASC) Order by the percer column
 * @method     ChildAliBmbonusNewQuery orderByTax($order = Criteria::ASC) Order by the tax column
 * @method     ChildAliBmbonusNewQuery orderByTotalamt($order = Criteria::ASC) Order by the totalamt column
 * @method     ChildAliBmbonusNewQuery orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliBmbonusNewQuery orderByMpos($order = Criteria::ASC) Order by the mpos column
 * @method     ChildAliBmbonusNewQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliBmbonusNewQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliBmbonusNewQuery orderByPairStop($order = Criteria::ASC) Order by the pair_stop column
 * @method     ChildAliBmbonusNewQuery orderByPoint($order = Criteria::ASC) Order by the point column
 * @method     ChildAliBmbonusNewQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliBmbonusNewQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliBmbonusNewQuery orderByAdjust($order = Criteria::ASC) Order by the adjust column
 * @method     ChildAliBmbonusNewQuery orderByTotalCmtWeak($order = Criteria::ASC) Order by the total_cmt_weak column
 * @method     ChildAliBmbonusNewQuery orderByTotalCmtStrong($order = Criteria::ASC) Order by the total_cmt_strong column
 * @method     ChildAliBmbonusNewQuery orderByBalance($order = Criteria::ASC) Order by the balance column
 * @method     ChildAliBmbonusNewQuery orderByCycleB($order = Criteria::ASC) Order by the cycle_b column
 * @method     ChildAliBmbonusNewQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 *
 * @method     ChildAliBmbonusNewQuery groupByCid() Group by the cid column
 * @method     ChildAliBmbonusNewQuery groupByRcode() Group by the rcode column
 * @method     ChildAliBmbonusNewQuery groupByMcode() Group by the mcode column
 * @method     ChildAliBmbonusNewQuery groupByRoL() Group by the ro_l column
 * @method     ChildAliBmbonusNewQuery groupByRoC() Group by the ro_c column
 * @method     ChildAliBmbonusNewQuery groupByRoR() Group by the ro_r column
 * @method     ChildAliBmbonusNewQuery groupByPcrryL() Group by the pcrry_l column
 * @method     ChildAliBmbonusNewQuery groupByCcpcrryL() Group by the ccpcrry_l column
 * @method     ChildAliBmbonusNewQuery groupByCcpcrryC() Group by the ccpcrry_c column
 * @method     ChildAliBmbonusNewQuery groupByPcrryC() Group by the pcrry_c column
 * @method     ChildAliBmbonusNewQuery groupByPcrryR() Group by the pcrry_r column
 * @method     ChildAliBmbonusNewQuery groupByPquota() Group by the pquota column
 * @method     ChildAliBmbonusNewQuery groupByTotalPvLl() Group by the total_pv_ll column
 * @method     ChildAliBmbonusNewQuery groupByTotalPvRr() Group by the total_pv_rr column
 * @method     ChildAliBmbonusNewQuery groupByTotalPvL() Group by the total_pv_l column
 * @method     ChildAliBmbonusNewQuery groupByTotalPvR() Group by the total_pv_r column
 * @method     ChildAliBmbonusNewQuery groupByCountL() Group by the count_l column
 * @method     ChildAliBmbonusNewQuery groupByCountC() Group by the count_c column
 * @method     ChildAliBmbonusNewQuery groupByCountR() Group by the count_r column
 * @method     ChildAliBmbonusNewQuery groupByCarryL() Group by the carry_l column
 * @method     ChildAliBmbonusNewQuery groupByCarryC() Group by the carry_c column
 * @method     ChildAliBmbonusNewQuery groupByCarryR() Group by the carry_r column
 * @method     ChildAliBmbonusNewQuery groupByQuota() Group by the quota column
 * @method     ChildAliBmbonusNewQuery groupByTotal() Group by the total column
 * @method     ChildAliBmbonusNewQuery groupByPercer() Group by the percer column
 * @method     ChildAliBmbonusNewQuery groupByTax() Group by the tax column
 * @method     ChildAliBmbonusNewQuery groupByTotalamt() Group by the totalamt column
 * @method     ChildAliBmbonusNewQuery groupByPaydate() Group by the paydate column
 * @method     ChildAliBmbonusNewQuery groupByMpos() Group by the mpos column
 * @method     ChildAliBmbonusNewQuery groupByTdate() Group by the tdate column
 * @method     ChildAliBmbonusNewQuery groupByFdate() Group by the fdate column
 * @method     ChildAliBmbonusNewQuery groupByPairStop() Group by the pair_stop column
 * @method     ChildAliBmbonusNewQuery groupByPoint() Group by the point column
 * @method     ChildAliBmbonusNewQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliBmbonusNewQuery groupByStatus() Group by the status column
 * @method     ChildAliBmbonusNewQuery groupByAdjust() Group by the adjust column
 * @method     ChildAliBmbonusNewQuery groupByTotalCmtWeak() Group by the total_cmt_weak column
 * @method     ChildAliBmbonusNewQuery groupByTotalCmtStrong() Group by the total_cmt_strong column
 * @method     ChildAliBmbonusNewQuery groupByBalance() Group by the balance column
 * @method     ChildAliBmbonusNewQuery groupByCycleB() Group by the cycle_b column
 * @method     ChildAliBmbonusNewQuery groupByLocationbase() Group by the locationbase column
 *
 * @method     ChildAliBmbonusNewQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliBmbonusNewQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliBmbonusNewQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliBmbonusNewQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliBmbonusNewQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliBmbonusNewQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliBmbonusNew findOne(ConnectionInterface $con = null) Return the first ChildAliBmbonusNew matching the query
 * @method     ChildAliBmbonusNew findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliBmbonusNew matching the query, or a new ChildAliBmbonusNew object populated from the query conditions when no match is found
 *
 * @method     ChildAliBmbonusNew findOneByCid(int $cid) Return the first ChildAliBmbonusNew filtered by the cid column
 * @method     ChildAliBmbonusNew findOneByRcode(int $rcode) Return the first ChildAliBmbonusNew filtered by the rcode column
 * @method     ChildAliBmbonusNew findOneByMcode(string $mcode) Return the first ChildAliBmbonusNew filtered by the mcode column
 * @method     ChildAliBmbonusNew findOneByRoL(string $ro_l) Return the first ChildAliBmbonusNew filtered by the ro_l column
 * @method     ChildAliBmbonusNew findOneByRoC(string $ro_c) Return the first ChildAliBmbonusNew filtered by the ro_c column
 * @method     ChildAliBmbonusNew findOneByRoR(string $ro_r) Return the first ChildAliBmbonusNew filtered by the ro_r column
 * @method     ChildAliBmbonusNew findOneByPcrryL(string $pcrry_l) Return the first ChildAliBmbonusNew filtered by the pcrry_l column
 * @method     ChildAliBmbonusNew findOneByCcpcrryL(string $ccpcrry_l) Return the first ChildAliBmbonusNew filtered by the ccpcrry_l column
 * @method     ChildAliBmbonusNew findOneByCcpcrryC(string $ccpcrry_c) Return the first ChildAliBmbonusNew filtered by the ccpcrry_c column
 * @method     ChildAliBmbonusNew findOneByPcrryC(string $pcrry_c) Return the first ChildAliBmbonusNew filtered by the pcrry_c column
 * @method     ChildAliBmbonusNew findOneByPcrryR(string $pcrry_r) Return the first ChildAliBmbonusNew filtered by the pcrry_r column
 * @method     ChildAliBmbonusNew findOneByPquota(string $pquota) Return the first ChildAliBmbonusNew filtered by the pquota column
 * @method     ChildAliBmbonusNew findOneByTotalPvLl(string $total_pv_ll) Return the first ChildAliBmbonusNew filtered by the total_pv_ll column
 * @method     ChildAliBmbonusNew findOneByTotalPvRr(string $total_pv_rr) Return the first ChildAliBmbonusNew filtered by the total_pv_rr column
 * @method     ChildAliBmbonusNew findOneByTotalPvL(string $total_pv_l) Return the first ChildAliBmbonusNew filtered by the total_pv_l column
 * @method     ChildAliBmbonusNew findOneByTotalPvR(string $total_pv_r) Return the first ChildAliBmbonusNew filtered by the total_pv_r column
 * @method     ChildAliBmbonusNew findOneByCountL(string $count_l) Return the first ChildAliBmbonusNew filtered by the count_l column
 * @method     ChildAliBmbonusNew findOneByCountC(string $count_c) Return the first ChildAliBmbonusNew filtered by the count_c column
 * @method     ChildAliBmbonusNew findOneByCountR(string $count_r) Return the first ChildAliBmbonusNew filtered by the count_r column
 * @method     ChildAliBmbonusNew findOneByCarryL(string $carry_l) Return the first ChildAliBmbonusNew filtered by the carry_l column
 * @method     ChildAliBmbonusNew findOneByCarryC(string $carry_c) Return the first ChildAliBmbonusNew filtered by the carry_c column
 * @method     ChildAliBmbonusNew findOneByCarryR(string $carry_r) Return the first ChildAliBmbonusNew filtered by the carry_r column
 * @method     ChildAliBmbonusNew findOneByQuota(string $quota) Return the first ChildAliBmbonusNew filtered by the quota column
 * @method     ChildAliBmbonusNew findOneByTotal(string $total) Return the first ChildAliBmbonusNew filtered by the total column
 * @method     ChildAliBmbonusNew findOneByPercer(string $percer) Return the first ChildAliBmbonusNew filtered by the percer column
 * @method     ChildAliBmbonusNew findOneByTax(string $tax) Return the first ChildAliBmbonusNew filtered by the tax column
 * @method     ChildAliBmbonusNew findOneByTotalamt(string $totalamt) Return the first ChildAliBmbonusNew filtered by the totalamt column
 * @method     ChildAliBmbonusNew findOneByPaydate(string $paydate) Return the first ChildAliBmbonusNew filtered by the paydate column
 * @method     ChildAliBmbonusNew findOneByMpos(string $mpos) Return the first ChildAliBmbonusNew filtered by the mpos column
 * @method     ChildAliBmbonusNew findOneByTdate(string $tdate) Return the first ChildAliBmbonusNew filtered by the tdate column
 * @method     ChildAliBmbonusNew findOneByFdate(string $fdate) Return the first ChildAliBmbonusNew filtered by the fdate column
 * @method     ChildAliBmbonusNew findOneByPairStop(string $pair_stop) Return the first ChildAliBmbonusNew filtered by the pair_stop column
 * @method     ChildAliBmbonusNew findOneByPoint(int $point) Return the first ChildAliBmbonusNew filtered by the point column
 * @method     ChildAliBmbonusNew findOneByPosCur(string $pos_cur) Return the first ChildAliBmbonusNew filtered by the pos_cur column
 * @method     ChildAliBmbonusNew findOneByStatus(string $status) Return the first ChildAliBmbonusNew filtered by the status column
 * @method     ChildAliBmbonusNew findOneByAdjust(string $adjust) Return the first ChildAliBmbonusNew filtered by the adjust column
 * @method     ChildAliBmbonusNew findOneByTotalCmtWeak(string $total_cmt_weak) Return the first ChildAliBmbonusNew filtered by the total_cmt_weak column
 * @method     ChildAliBmbonusNew findOneByTotalCmtStrong(string $total_cmt_strong) Return the first ChildAliBmbonusNew filtered by the total_cmt_strong column
 * @method     ChildAliBmbonusNew findOneByBalance(string $balance) Return the first ChildAliBmbonusNew filtered by the balance column
 * @method     ChildAliBmbonusNew findOneByCycleB(int $cycle_b) Return the first ChildAliBmbonusNew filtered by the cycle_b column
 * @method     ChildAliBmbonusNew findOneByLocationbase(int $locationbase) Return the first ChildAliBmbonusNew filtered by the locationbase column *

 * @method     ChildAliBmbonusNew requirePk($key, ConnectionInterface $con = null) Return the ChildAliBmbonusNew by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOne(ConnectionInterface $con = null) Return the first ChildAliBmbonusNew matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBmbonusNew requireOneByCid(int $cid) Return the first ChildAliBmbonusNew filtered by the cid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByRcode(int $rcode) Return the first ChildAliBmbonusNew filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByMcode(string $mcode) Return the first ChildAliBmbonusNew filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByRoL(string $ro_l) Return the first ChildAliBmbonusNew filtered by the ro_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByRoC(string $ro_c) Return the first ChildAliBmbonusNew filtered by the ro_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByRoR(string $ro_r) Return the first ChildAliBmbonusNew filtered by the ro_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByPcrryL(string $pcrry_l) Return the first ChildAliBmbonusNew filtered by the pcrry_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByCcpcrryL(string $ccpcrry_l) Return the first ChildAliBmbonusNew filtered by the ccpcrry_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByCcpcrryC(string $ccpcrry_c) Return the first ChildAliBmbonusNew filtered by the ccpcrry_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByPcrryC(string $pcrry_c) Return the first ChildAliBmbonusNew filtered by the pcrry_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByPcrryR(string $pcrry_r) Return the first ChildAliBmbonusNew filtered by the pcrry_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByPquota(string $pquota) Return the first ChildAliBmbonusNew filtered by the pquota column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByTotalPvLl(string $total_pv_ll) Return the first ChildAliBmbonusNew filtered by the total_pv_ll column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByTotalPvRr(string $total_pv_rr) Return the first ChildAliBmbonusNew filtered by the total_pv_rr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByTotalPvL(string $total_pv_l) Return the first ChildAliBmbonusNew filtered by the total_pv_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByTotalPvR(string $total_pv_r) Return the first ChildAliBmbonusNew filtered by the total_pv_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByCountL(string $count_l) Return the first ChildAliBmbonusNew filtered by the count_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByCountC(string $count_c) Return the first ChildAliBmbonusNew filtered by the count_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByCountR(string $count_r) Return the first ChildAliBmbonusNew filtered by the count_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByCarryL(string $carry_l) Return the first ChildAliBmbonusNew filtered by the carry_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByCarryC(string $carry_c) Return the first ChildAliBmbonusNew filtered by the carry_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByCarryR(string $carry_r) Return the first ChildAliBmbonusNew filtered by the carry_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByQuota(string $quota) Return the first ChildAliBmbonusNew filtered by the quota column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByTotal(string $total) Return the first ChildAliBmbonusNew filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByPercer(string $percer) Return the first ChildAliBmbonusNew filtered by the percer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByTax(string $tax) Return the first ChildAliBmbonusNew filtered by the tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByTotalamt(string $totalamt) Return the first ChildAliBmbonusNew filtered by the totalamt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByPaydate(string $paydate) Return the first ChildAliBmbonusNew filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByMpos(string $mpos) Return the first ChildAliBmbonusNew filtered by the mpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByTdate(string $tdate) Return the first ChildAliBmbonusNew filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByFdate(string $fdate) Return the first ChildAliBmbonusNew filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByPairStop(string $pair_stop) Return the first ChildAliBmbonusNew filtered by the pair_stop column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByPoint(int $point) Return the first ChildAliBmbonusNew filtered by the point column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByPosCur(string $pos_cur) Return the first ChildAliBmbonusNew filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByStatus(string $status) Return the first ChildAliBmbonusNew filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByAdjust(string $adjust) Return the first ChildAliBmbonusNew filtered by the adjust column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByTotalCmtWeak(string $total_cmt_weak) Return the first ChildAliBmbonusNew filtered by the total_cmt_weak column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByTotalCmtStrong(string $total_cmt_strong) Return the first ChildAliBmbonusNew filtered by the total_cmt_strong column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByBalance(string $balance) Return the first ChildAliBmbonusNew filtered by the balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByCycleB(int $cycle_b) Return the first ChildAliBmbonusNew filtered by the cycle_b column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonusNew requireOneByLocationbase(int $locationbase) Return the first ChildAliBmbonusNew filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBmbonusNew[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliBmbonusNew objects based on current ModelCriteria
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByCid(int $cid) Return ChildAliBmbonusNew objects filtered by the cid column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByRcode(int $rcode) Return ChildAliBmbonusNew objects filtered by the rcode column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByMcode(string $mcode) Return ChildAliBmbonusNew objects filtered by the mcode column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByRoL(string $ro_l) Return ChildAliBmbonusNew objects filtered by the ro_l column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByRoC(string $ro_c) Return ChildAliBmbonusNew objects filtered by the ro_c column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByRoR(string $ro_r) Return ChildAliBmbonusNew objects filtered by the ro_r column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByPcrryL(string $pcrry_l) Return ChildAliBmbonusNew objects filtered by the pcrry_l column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByCcpcrryL(string $ccpcrry_l) Return ChildAliBmbonusNew objects filtered by the ccpcrry_l column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByCcpcrryC(string $ccpcrry_c) Return ChildAliBmbonusNew objects filtered by the ccpcrry_c column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByPcrryC(string $pcrry_c) Return ChildAliBmbonusNew objects filtered by the pcrry_c column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByPcrryR(string $pcrry_r) Return ChildAliBmbonusNew objects filtered by the pcrry_r column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByPquota(string $pquota) Return ChildAliBmbonusNew objects filtered by the pquota column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByTotalPvLl(string $total_pv_ll) Return ChildAliBmbonusNew objects filtered by the total_pv_ll column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByTotalPvRr(string $total_pv_rr) Return ChildAliBmbonusNew objects filtered by the total_pv_rr column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByTotalPvL(string $total_pv_l) Return ChildAliBmbonusNew objects filtered by the total_pv_l column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByTotalPvR(string $total_pv_r) Return ChildAliBmbonusNew objects filtered by the total_pv_r column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByCountL(string $count_l) Return ChildAliBmbonusNew objects filtered by the count_l column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByCountC(string $count_c) Return ChildAliBmbonusNew objects filtered by the count_c column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByCountR(string $count_r) Return ChildAliBmbonusNew objects filtered by the count_r column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByCarryL(string $carry_l) Return ChildAliBmbonusNew objects filtered by the carry_l column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByCarryC(string $carry_c) Return ChildAliBmbonusNew objects filtered by the carry_c column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByCarryR(string $carry_r) Return ChildAliBmbonusNew objects filtered by the carry_r column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByQuota(string $quota) Return ChildAliBmbonusNew objects filtered by the quota column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByTotal(string $total) Return ChildAliBmbonusNew objects filtered by the total column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByPercer(string $percer) Return ChildAliBmbonusNew objects filtered by the percer column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByTax(string $tax) Return ChildAliBmbonusNew objects filtered by the tax column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByTotalamt(string $totalamt) Return ChildAliBmbonusNew objects filtered by the totalamt column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliBmbonusNew objects filtered by the paydate column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByMpos(string $mpos) Return ChildAliBmbonusNew objects filtered by the mpos column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByTdate(string $tdate) Return ChildAliBmbonusNew objects filtered by the tdate column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByFdate(string $fdate) Return ChildAliBmbonusNew objects filtered by the fdate column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByPairStop(string $pair_stop) Return ChildAliBmbonusNew objects filtered by the pair_stop column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByPoint(int $point) Return ChildAliBmbonusNew objects filtered by the point column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliBmbonusNew objects filtered by the pos_cur column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByStatus(string $status) Return ChildAliBmbonusNew objects filtered by the status column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByAdjust(string $adjust) Return ChildAliBmbonusNew objects filtered by the adjust column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByTotalCmtWeak(string $total_cmt_weak) Return ChildAliBmbonusNew objects filtered by the total_cmt_weak column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByTotalCmtStrong(string $total_cmt_strong) Return ChildAliBmbonusNew objects filtered by the total_cmt_strong column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByBalance(string $balance) Return ChildAliBmbonusNew objects filtered by the balance column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByCycleB(int $cycle_b) Return ChildAliBmbonusNew objects filtered by the cycle_b column
 * @method     ChildAliBmbonusNew[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliBmbonusNew objects filtered by the locationbase column
 * @method     ChildAliBmbonusNew[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliBmbonusNewQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliBmbonusNewQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliBmbonusNew', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliBmbonusNewQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliBmbonusNewQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliBmbonusNewQuery) {
            return $criteria;
        }
        $query = new ChildAliBmbonusNewQuery();
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
     * @return ChildAliBmbonusNew|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliBmbonusNewTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliBmbonusNewTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliBmbonusNew A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT cid, rcode, mcode, ro_l, ro_c, ro_r, pcrry_l, ccpcrry_l, ccpcrry_c, pcrry_c, pcrry_r, pquota, total_pv_ll, total_pv_rr, total_pv_l, total_pv_r, count_l, count_c, count_r, carry_l, carry_c, carry_r, quota, total, percer, tax, totalamt, paydate, mpos, tdate, fdate, pair_stop, point, pos_cur, status, adjust, total_cmt_weak, total_cmt_strong, balance, cycle_b, locationbase FROM ali_bmbonus_new WHERE cid = :p0';
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
            /** @var ChildAliBmbonusNew $obj */
            $obj = new ChildAliBmbonusNew();
            $obj->hydrate($row);
            AliBmbonusNewTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliBmbonusNew|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_CID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_CID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the cid column
     *
     * Example usage:
     * <code>
     * $query->filterByCid(1234); // WHERE cid = 1234
     * $query->filterByCid(array(12, 34)); // WHERE cid IN (12, 34)
     * $query->filterByCid(array('min' => 12)); // WHERE cid > 12
     * </code>
     *
     * @param     mixed $cid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByCid($cid = null, $comparison = null)
    {
        if (is_array($cid)) {
            $useMinMax = false;
            if (isset($cid['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_CID, $cid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cid['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_CID, $cid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_CID, $cid, $comparison);
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
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the ro_l column
     *
     * Example usage:
     * <code>
     * $query->filterByRoL(1234); // WHERE ro_l = 1234
     * $query->filterByRoL(array(12, 34)); // WHERE ro_l IN (12, 34)
     * $query->filterByRoL(array('min' => 12)); // WHERE ro_l > 12
     * </code>
     *
     * @param     mixed $roL The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByRoL($roL = null, $comparison = null)
    {
        if (is_array($roL)) {
            $useMinMax = false;
            if (isset($roL['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_RO_L, $roL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roL['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_RO_L, $roL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_RO_L, $roL, $comparison);
    }

    /**
     * Filter the query on the ro_c column
     *
     * Example usage:
     * <code>
     * $query->filterByRoC(1234); // WHERE ro_c = 1234
     * $query->filterByRoC(array(12, 34)); // WHERE ro_c IN (12, 34)
     * $query->filterByRoC(array('min' => 12)); // WHERE ro_c > 12
     * </code>
     *
     * @param     mixed $roC The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByRoC($roC = null, $comparison = null)
    {
        if (is_array($roC)) {
            $useMinMax = false;
            if (isset($roC['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_RO_C, $roC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roC['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_RO_C, $roC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_RO_C, $roC, $comparison);
    }

    /**
     * Filter the query on the ro_r column
     *
     * Example usage:
     * <code>
     * $query->filterByRoR(1234); // WHERE ro_r = 1234
     * $query->filterByRoR(array(12, 34)); // WHERE ro_r IN (12, 34)
     * $query->filterByRoR(array('min' => 12)); // WHERE ro_r > 12
     * </code>
     *
     * @param     mixed $roR The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByRoR($roR = null, $comparison = null)
    {
        if (is_array($roR)) {
            $useMinMax = false;
            if (isset($roR['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_RO_R, $roR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roR['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_RO_R, $roR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_RO_R, $roR, $comparison);
    }

    /**
     * Filter the query on the pcrry_l column
     *
     * Example usage:
     * <code>
     * $query->filterByPcrryL(1234); // WHERE pcrry_l = 1234
     * $query->filterByPcrryL(array(12, 34)); // WHERE pcrry_l IN (12, 34)
     * $query->filterByPcrryL(array('min' => 12)); // WHERE pcrry_l > 12
     * </code>
     *
     * @param     mixed $pcrryL The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByPcrryL($pcrryL = null, $comparison = null)
    {
        if (is_array($pcrryL)) {
            $useMinMax = false;
            if (isset($pcrryL['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PCRRY_L, $pcrryL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pcrryL['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PCRRY_L, $pcrryL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_PCRRY_L, $pcrryL, $comparison);
    }

    /**
     * Filter the query on the ccpcrry_l column
     *
     * Example usage:
     * <code>
     * $query->filterByCcpcrryL('fooValue');   // WHERE ccpcrry_l = 'fooValue'
     * $query->filterByCcpcrryL('%fooValue%', Criteria::LIKE); // WHERE ccpcrry_l LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccpcrryL The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByCcpcrryL($ccpcrryL = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccpcrryL)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_CCPCRRY_L, $ccpcrryL, $comparison);
    }

    /**
     * Filter the query on the ccpcrry_c column
     *
     * Example usage:
     * <code>
     * $query->filterByCcpcrryC('fooValue');   // WHERE ccpcrry_c = 'fooValue'
     * $query->filterByCcpcrryC('%fooValue%', Criteria::LIKE); // WHERE ccpcrry_c LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccpcrryC The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByCcpcrryC($ccpcrryC = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccpcrryC)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_CCPCRRY_C, $ccpcrryC, $comparison);
    }

    /**
     * Filter the query on the pcrry_c column
     *
     * Example usage:
     * <code>
     * $query->filterByPcrryC(1234); // WHERE pcrry_c = 1234
     * $query->filterByPcrryC(array(12, 34)); // WHERE pcrry_c IN (12, 34)
     * $query->filterByPcrryC(array('min' => 12)); // WHERE pcrry_c > 12
     * </code>
     *
     * @param     mixed $pcrryC The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByPcrryC($pcrryC = null, $comparison = null)
    {
        if (is_array($pcrryC)) {
            $useMinMax = false;
            if (isset($pcrryC['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PCRRY_C, $pcrryC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pcrryC['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PCRRY_C, $pcrryC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_PCRRY_C, $pcrryC, $comparison);
    }

    /**
     * Filter the query on the pcrry_r column
     *
     * Example usage:
     * <code>
     * $query->filterByPcrryR(1234); // WHERE pcrry_r = 1234
     * $query->filterByPcrryR(array(12, 34)); // WHERE pcrry_r IN (12, 34)
     * $query->filterByPcrryR(array('min' => 12)); // WHERE pcrry_r > 12
     * </code>
     *
     * @param     mixed $pcrryR The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByPcrryR($pcrryR = null, $comparison = null)
    {
        if (is_array($pcrryR)) {
            $useMinMax = false;
            if (isset($pcrryR['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PCRRY_R, $pcrryR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pcrryR['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PCRRY_R, $pcrryR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_PCRRY_R, $pcrryR, $comparison);
    }

    /**
     * Filter the query on the pquota column
     *
     * Example usage:
     * <code>
     * $query->filterByPquota(1234); // WHERE pquota = 1234
     * $query->filterByPquota(array(12, 34)); // WHERE pquota IN (12, 34)
     * $query->filterByPquota(array('min' => 12)); // WHERE pquota > 12
     * </code>
     *
     * @param     mixed $pquota The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByPquota($pquota = null, $comparison = null)
    {
        if (is_array($pquota)) {
            $useMinMax = false;
            if (isset($pquota['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PQUOTA, $pquota['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pquota['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PQUOTA, $pquota['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_PQUOTA, $pquota, $comparison);
    }

    /**
     * Filter the query on the total_pv_ll column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalPvLl(1234); // WHERE total_pv_ll = 1234
     * $query->filterByTotalPvLl(array(12, 34)); // WHERE total_pv_ll IN (12, 34)
     * $query->filterByTotalPvLl(array('min' => 12)); // WHERE total_pv_ll > 12
     * </code>
     *
     * @param     mixed $totalPvLl The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByTotalPvLl($totalPvLl = null, $comparison = null)
    {
        if (is_array($totalPvLl)) {
            $useMinMax = false;
            if (isset($totalPvLl['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_PV_LL, $totalPvLl['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPvLl['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_PV_LL, $totalPvLl['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_PV_LL, $totalPvLl, $comparison);
    }

    /**
     * Filter the query on the total_pv_rr column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalPvRr(1234); // WHERE total_pv_rr = 1234
     * $query->filterByTotalPvRr(array(12, 34)); // WHERE total_pv_rr IN (12, 34)
     * $query->filterByTotalPvRr(array('min' => 12)); // WHERE total_pv_rr > 12
     * </code>
     *
     * @param     mixed $totalPvRr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByTotalPvRr($totalPvRr = null, $comparison = null)
    {
        if (is_array($totalPvRr)) {
            $useMinMax = false;
            if (isset($totalPvRr['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_PV_RR, $totalPvRr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPvRr['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_PV_RR, $totalPvRr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_PV_RR, $totalPvRr, $comparison);
    }

    /**
     * Filter the query on the total_pv_l column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalPvL(1234); // WHERE total_pv_l = 1234
     * $query->filterByTotalPvL(array(12, 34)); // WHERE total_pv_l IN (12, 34)
     * $query->filterByTotalPvL(array('min' => 12)); // WHERE total_pv_l > 12
     * </code>
     *
     * @param     mixed $totalPvL The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByTotalPvL($totalPvL = null, $comparison = null)
    {
        if (is_array($totalPvL)) {
            $useMinMax = false;
            if (isset($totalPvL['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_PV_L, $totalPvL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPvL['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_PV_L, $totalPvL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_PV_L, $totalPvL, $comparison);
    }

    /**
     * Filter the query on the total_pv_r column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalPvR(1234); // WHERE total_pv_r = 1234
     * $query->filterByTotalPvR(array(12, 34)); // WHERE total_pv_r IN (12, 34)
     * $query->filterByTotalPvR(array('min' => 12)); // WHERE total_pv_r > 12
     * </code>
     *
     * @param     mixed $totalPvR The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByTotalPvR($totalPvR = null, $comparison = null)
    {
        if (is_array($totalPvR)) {
            $useMinMax = false;
            if (isset($totalPvR['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_PV_R, $totalPvR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPvR['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_PV_R, $totalPvR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_PV_R, $totalPvR, $comparison);
    }

    /**
     * Filter the query on the count_l column
     *
     * Example usage:
     * <code>
     * $query->filterByCountL(1234); // WHERE count_l = 1234
     * $query->filterByCountL(array(12, 34)); // WHERE count_l IN (12, 34)
     * $query->filterByCountL(array('min' => 12)); // WHERE count_l > 12
     * </code>
     *
     * @param     mixed $countL The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByCountL($countL = null, $comparison = null)
    {
        if (is_array($countL)) {
            $useMinMax = false;
            if (isset($countL['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_COUNT_L, $countL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countL['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_COUNT_L, $countL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_COUNT_L, $countL, $comparison);
    }

    /**
     * Filter the query on the count_c column
     *
     * Example usage:
     * <code>
     * $query->filterByCountC(1234); // WHERE count_c = 1234
     * $query->filterByCountC(array(12, 34)); // WHERE count_c IN (12, 34)
     * $query->filterByCountC(array('min' => 12)); // WHERE count_c > 12
     * </code>
     *
     * @param     mixed $countC The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByCountC($countC = null, $comparison = null)
    {
        if (is_array($countC)) {
            $useMinMax = false;
            if (isset($countC['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_COUNT_C, $countC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countC['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_COUNT_C, $countC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_COUNT_C, $countC, $comparison);
    }

    /**
     * Filter the query on the count_r column
     *
     * Example usage:
     * <code>
     * $query->filterByCountR(1234); // WHERE count_r = 1234
     * $query->filterByCountR(array(12, 34)); // WHERE count_r IN (12, 34)
     * $query->filterByCountR(array('min' => 12)); // WHERE count_r > 12
     * </code>
     *
     * @param     mixed $countR The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByCountR($countR = null, $comparison = null)
    {
        if (is_array($countR)) {
            $useMinMax = false;
            if (isset($countR['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_COUNT_R, $countR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countR['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_COUNT_R, $countR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_COUNT_R, $countR, $comparison);
    }

    /**
     * Filter the query on the carry_l column
     *
     * Example usage:
     * <code>
     * $query->filterByCarryL(1234); // WHERE carry_l = 1234
     * $query->filterByCarryL(array(12, 34)); // WHERE carry_l IN (12, 34)
     * $query->filterByCarryL(array('min' => 12)); // WHERE carry_l > 12
     * </code>
     *
     * @param     mixed $carryL The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByCarryL($carryL = null, $comparison = null)
    {
        if (is_array($carryL)) {
            $useMinMax = false;
            if (isset($carryL['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_CARRY_L, $carryL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carryL['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_CARRY_L, $carryL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_CARRY_L, $carryL, $comparison);
    }

    /**
     * Filter the query on the carry_c column
     *
     * Example usage:
     * <code>
     * $query->filterByCarryC(1234); // WHERE carry_c = 1234
     * $query->filterByCarryC(array(12, 34)); // WHERE carry_c IN (12, 34)
     * $query->filterByCarryC(array('min' => 12)); // WHERE carry_c > 12
     * </code>
     *
     * @param     mixed $carryC The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByCarryC($carryC = null, $comparison = null)
    {
        if (is_array($carryC)) {
            $useMinMax = false;
            if (isset($carryC['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_CARRY_C, $carryC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carryC['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_CARRY_C, $carryC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_CARRY_C, $carryC, $comparison);
    }

    /**
     * Filter the query on the carry_r column
     *
     * Example usage:
     * <code>
     * $query->filterByCarryR(1234); // WHERE carry_r = 1234
     * $query->filterByCarryR(array(12, 34)); // WHERE carry_r IN (12, 34)
     * $query->filterByCarryR(array('min' => 12)); // WHERE carry_r > 12
     * </code>
     *
     * @param     mixed $carryR The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByCarryR($carryR = null, $comparison = null)
    {
        if (is_array($carryR)) {
            $useMinMax = false;
            if (isset($carryR['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_CARRY_R, $carryR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carryR['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_CARRY_R, $carryR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_CARRY_R, $carryR, $comparison);
    }

    /**
     * Filter the query on the quota column
     *
     * Example usage:
     * <code>
     * $query->filterByQuota(1234); // WHERE quota = 1234
     * $query->filterByQuota(array(12, 34)); // WHERE quota IN (12, 34)
     * $query->filterByQuota(array('min' => 12)); // WHERE quota > 12
     * </code>
     *
     * @param     mixed $quota The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByQuota($quota = null, $comparison = null)
    {
        if (is_array($quota)) {
            $useMinMax = false;
            if (isset($quota['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_QUOTA, $quota['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quota['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_QUOTA, $quota['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_QUOTA, $quota, $comparison);
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
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the percer column
     *
     * Example usage:
     * <code>
     * $query->filterByPercer(1234); // WHERE percer = 1234
     * $query->filterByPercer(array(12, 34)); // WHERE percer IN (12, 34)
     * $query->filterByPercer(array('min' => 12)); // WHERE percer > 12
     * </code>
     *
     * @param     mixed $percer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByPercer($percer = null, $comparison = null)
    {
        if (is_array($percer)) {
            $useMinMax = false;
            if (isset($percer['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PERCER, $percer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($percer['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PERCER, $percer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_PERCER, $percer, $comparison);
    }

    /**
     * Filter the query on the tax column
     *
     * Example usage:
     * <code>
     * $query->filterByTax(1234); // WHERE tax = 1234
     * $query->filterByTax(array(12, 34)); // WHERE tax IN (12, 34)
     * $query->filterByTax(array('min' => 12)); // WHERE tax > 12
     * </code>
     *
     * @param     mixed $tax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByTax($tax = null, $comparison = null)
    {
        if (is_array($tax)) {
            $useMinMax = false;
            if (isset($tax['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TAX, $tax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tax['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TAX, $tax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_TAX, $tax, $comparison);
    }

    /**
     * Filter the query on the totalamt column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalamt(1234); // WHERE totalamt = 1234
     * $query->filterByTotalamt(array(12, 34)); // WHERE totalamt IN (12, 34)
     * $query->filterByTotalamt(array('min' => 12)); // WHERE totalamt > 12
     * </code>
     *
     * @param     mixed $totalamt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByTotalamt($totalamt = null, $comparison = null)
    {
        if (is_array($totalamt)) {
            $useMinMax = false;
            if (isset($totalamt['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTALAMT, $totalamt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalamt['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTALAMT, $totalamt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTALAMT, $totalamt, $comparison);
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
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (is_array($paydate)) {
            $useMinMax = false;
            if (isset($paydate['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PAYDATE, $paydate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paydate['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PAYDATE, $paydate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_PAYDATE, $paydate, $comparison);
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
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByMpos($mpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_MPOS, $mpos, $comparison);
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
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_FDATE, $fdate, $comparison);
    }

    /**
     * Filter the query on the pair_stop column
     *
     * Example usage:
     * <code>
     * $query->filterByPairStop(1234); // WHERE pair_stop = 1234
     * $query->filterByPairStop(array(12, 34)); // WHERE pair_stop IN (12, 34)
     * $query->filterByPairStop(array('min' => 12)); // WHERE pair_stop > 12
     * </code>
     *
     * @param     mixed $pairStop The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByPairStop($pairStop = null, $comparison = null)
    {
        if (is_array($pairStop)) {
            $useMinMax = false;
            if (isset($pairStop['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PAIR_STOP, $pairStop['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pairStop['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_PAIR_STOP, $pairStop['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_PAIR_STOP, $pairStop, $comparison);
    }

    /**
     * Filter the query on the point column
     *
     * Example usage:
     * <code>
     * $query->filterByPoint(1234); // WHERE point = 1234
     * $query->filterByPoint(array(12, 34)); // WHERE point IN (12, 34)
     * $query->filterByPoint(array('min' => 12)); // WHERE point > 12
     * </code>
     *
     * @param     mixed $point The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByPoint($point = null, $comparison = null)
    {
        if (is_array($point)) {
            $useMinMax = false;
            if (isset($point['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_POINT, $point['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($point['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_POINT, $point['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_POINT, $point, $comparison);
    }

    /**
     * Filter the query on the pos_cur column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur('fooValue');   // WHERE pos_cur = 'fooValue'
     * $query->filterByPosCur('%fooValue%', Criteria::LIKE); // WHERE pos_cur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_POS_CUR, $posCur, $comparison);
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
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the adjust column
     *
     * Example usage:
     * <code>
     * $query->filterByAdjust(1234); // WHERE adjust = 1234
     * $query->filterByAdjust(array(12, 34)); // WHERE adjust IN (12, 34)
     * $query->filterByAdjust(array('min' => 12)); // WHERE adjust > 12
     * </code>
     *
     * @param     mixed $adjust The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByAdjust($adjust = null, $comparison = null)
    {
        if (is_array($adjust)) {
            $useMinMax = false;
            if (isset($adjust['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_ADJUST, $adjust['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adjust['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_ADJUST, $adjust['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_ADJUST, $adjust, $comparison);
    }

    /**
     * Filter the query on the total_cmt_weak column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalCmtWeak(1234); // WHERE total_cmt_weak = 1234
     * $query->filterByTotalCmtWeak(array(12, 34)); // WHERE total_cmt_weak IN (12, 34)
     * $query->filterByTotalCmtWeak(array('min' => 12)); // WHERE total_cmt_weak > 12
     * </code>
     *
     * @param     mixed $totalCmtWeak The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByTotalCmtWeak($totalCmtWeak = null, $comparison = null)
    {
        if (is_array($totalCmtWeak)) {
            $useMinMax = false;
            if (isset($totalCmtWeak['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_CMT_WEAK, $totalCmtWeak['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalCmtWeak['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_CMT_WEAK, $totalCmtWeak['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_CMT_WEAK, $totalCmtWeak, $comparison);
    }

    /**
     * Filter the query on the total_cmt_strong column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalCmtStrong(1234); // WHERE total_cmt_strong = 1234
     * $query->filterByTotalCmtStrong(array(12, 34)); // WHERE total_cmt_strong IN (12, 34)
     * $query->filterByTotalCmtStrong(array('min' => 12)); // WHERE total_cmt_strong > 12
     * </code>
     *
     * @param     mixed $totalCmtStrong The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByTotalCmtStrong($totalCmtStrong = null, $comparison = null)
    {
        if (is_array($totalCmtStrong)) {
            $useMinMax = false;
            if (isset($totalCmtStrong['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_CMT_STRONG, $totalCmtStrong['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalCmtStrong['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_CMT_STRONG, $totalCmtStrong['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_TOTAL_CMT_STRONG, $totalCmtStrong, $comparison);
    }

    /**
     * Filter the query on the balance column
     *
     * Example usage:
     * <code>
     * $query->filterByBalance(1234); // WHERE balance = 1234
     * $query->filterByBalance(array(12, 34)); // WHERE balance IN (12, 34)
     * $query->filterByBalance(array('min' => 12)); // WHERE balance > 12
     * </code>
     *
     * @param     mixed $balance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByBalance($balance = null, $comparison = null)
    {
        if (is_array($balance)) {
            $useMinMax = false;
            if (isset($balance['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_BALANCE, $balance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($balance['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_BALANCE, $balance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_BALANCE, $balance, $comparison);
    }

    /**
     * Filter the query on the cycle_b column
     *
     * Example usage:
     * <code>
     * $query->filterByCycleB(1234); // WHERE cycle_b = 1234
     * $query->filterByCycleB(array(12, 34)); // WHERE cycle_b IN (12, 34)
     * $query->filterByCycleB(array('min' => 12)); // WHERE cycle_b > 12
     * </code>
     *
     * @param     mixed $cycleB The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByCycleB($cycleB = null, $comparison = null)
    {
        if (is_array($cycleB)) {
            $useMinMax = false;
            if (isset($cycleB['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_CYCLE_B, $cycleB['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cycleB['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_CYCLE_B, $cycleB['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_CYCLE_B, $cycleB, $comparison);
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
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliBmbonusNewTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusNewTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliBmbonusNew $aliBmbonusNew Object to remove from the list of results
     *
     * @return $this|ChildAliBmbonusNewQuery The current query, for fluid interface
     */
    public function prune($aliBmbonusNew = null)
    {
        if ($aliBmbonusNew) {
            $this->addUsingAlias(AliBmbonusNewTableMap::COL_CID, $aliBmbonusNew->getCid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_bmbonus_new table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBmbonusNewTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliBmbonusNewTableMap::clearInstancePool();
            AliBmbonusNewTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBmbonusNewTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliBmbonusNewTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliBmbonusNewTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliBmbonusNewTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliBmbonusNewQuery
