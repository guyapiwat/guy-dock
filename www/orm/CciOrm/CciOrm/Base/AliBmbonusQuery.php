<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliBmbonus as ChildAliBmbonus;
use CciOrm\CciOrm\AliBmbonusQuery as ChildAliBmbonusQuery;
use CciOrm\CciOrm\Map\AliBmbonusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_bmbonus' table.
 *
 *
 *
 * @method     ChildAliBmbonusQuery orderByCid($order = Criteria::ASC) Order by the cid column
 * @method     ChildAliBmbonusQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliBmbonusQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliBmbonusQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliBmbonusQuery orderByRoL($order = Criteria::ASC) Order by the ro_l column
 * @method     ChildAliBmbonusQuery orderByRoC($order = Criteria::ASC) Order by the ro_c column
 * @method     ChildAliBmbonusQuery orderByRoR($order = Criteria::ASC) Order by the ro_r column
 * @method     ChildAliBmbonusQuery orderByPcrryL($order = Criteria::ASC) Order by the pcrry_l column
 * @method     ChildAliBmbonusQuery orderByPcrryC($order = Criteria::ASC) Order by the pcrry_c column
 * @method     ChildAliBmbonusQuery orderByPquota($order = Criteria::ASC) Order by the pquota column
 * @method     ChildAliBmbonusQuery orderByTotalPvLl($order = Criteria::ASC) Order by the total_pv_ll column
 * @method     ChildAliBmbonusQuery orderByTotalPvRr($order = Criteria::ASC) Order by the total_pv_rr column
 * @method     ChildAliBmbonusQuery orderByTotalPvL($order = Criteria::ASC) Order by the total_pv_l column
 * @method     ChildAliBmbonusQuery orderByTotalPvR($order = Criteria::ASC) Order by the total_pv_r column
 * @method     ChildAliBmbonusQuery orderByCarryL($order = Criteria::ASC) Order by the carry_l column
 * @method     ChildAliBmbonusQuery orderByCarryC($order = Criteria::ASC) Order by the carry_c column
 * @method     ChildAliBmbonusQuery orderByCarryR($order = Criteria::ASC) Order by the carry_r column
 * @method     ChildAliBmbonusQuery orderByQuota($order = Criteria::ASC) Order by the quota column
 * @method     ChildAliBmbonusQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliBmbonusQuery orderByPercer($order = Criteria::ASC) Order by the percer column
 * @method     ChildAliBmbonusQuery orderByTax($order = Criteria::ASC) Order by the tax column
 * @method     ChildAliBmbonusQuery orderByTotalamt($order = Criteria::ASC) Order by the totalamt column
 * @method     ChildAliBmbonusQuery orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliBmbonusQuery orderByMpos($order = Criteria::ASC) Order by the mpos column
 * @method     ChildAliBmbonusQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliBmbonusQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliBmbonusQuery orderByPairStop($order = Criteria::ASC) Order by the pair_stop column
 * @method     ChildAliBmbonusQuery orderByPoint($order = Criteria::ASC) Order by the point column
 * @method     ChildAliBmbonusQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliBmbonusQuery orderByAdjust($order = Criteria::ASC) Order by the adjust column
 * @method     ChildAliBmbonusQuery orderByBalance($order = Criteria::ASC) Order by the balance column
 * @method     ChildAliBmbonusQuery orderByCycleB($order = Criteria::ASC) Order by the cycle_b column
 * @method     ChildAliBmbonusQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliBmbonusQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 *
 * @method     ChildAliBmbonusQuery groupByCid() Group by the cid column
 * @method     ChildAliBmbonusQuery groupByRcode() Group by the rcode column
 * @method     ChildAliBmbonusQuery groupByMcode() Group by the mcode column
 * @method     ChildAliBmbonusQuery groupByNameT() Group by the name_t column
 * @method     ChildAliBmbonusQuery groupByRoL() Group by the ro_l column
 * @method     ChildAliBmbonusQuery groupByRoC() Group by the ro_c column
 * @method     ChildAliBmbonusQuery groupByRoR() Group by the ro_r column
 * @method     ChildAliBmbonusQuery groupByPcrryL() Group by the pcrry_l column
 * @method     ChildAliBmbonusQuery groupByPcrryC() Group by the pcrry_c column
 * @method     ChildAliBmbonusQuery groupByPquota() Group by the pquota column
 * @method     ChildAliBmbonusQuery groupByTotalPvLl() Group by the total_pv_ll column
 * @method     ChildAliBmbonusQuery groupByTotalPvRr() Group by the total_pv_rr column
 * @method     ChildAliBmbonusQuery groupByTotalPvL() Group by the total_pv_l column
 * @method     ChildAliBmbonusQuery groupByTotalPvR() Group by the total_pv_r column
 * @method     ChildAliBmbonusQuery groupByCarryL() Group by the carry_l column
 * @method     ChildAliBmbonusQuery groupByCarryC() Group by the carry_c column
 * @method     ChildAliBmbonusQuery groupByCarryR() Group by the carry_r column
 * @method     ChildAliBmbonusQuery groupByQuota() Group by the quota column
 * @method     ChildAliBmbonusQuery groupByTotal() Group by the total column
 * @method     ChildAliBmbonusQuery groupByPercer() Group by the percer column
 * @method     ChildAliBmbonusQuery groupByTax() Group by the tax column
 * @method     ChildAliBmbonusQuery groupByTotalamt() Group by the totalamt column
 * @method     ChildAliBmbonusQuery groupByPaydate() Group by the paydate column
 * @method     ChildAliBmbonusQuery groupByMpos() Group by the mpos column
 * @method     ChildAliBmbonusQuery groupByTdate() Group by the tdate column
 * @method     ChildAliBmbonusQuery groupByFdate() Group by the fdate column
 * @method     ChildAliBmbonusQuery groupByPairStop() Group by the pair_stop column
 * @method     ChildAliBmbonusQuery groupByPoint() Group by the point column
 * @method     ChildAliBmbonusQuery groupByStatus() Group by the status column
 * @method     ChildAliBmbonusQuery groupByAdjust() Group by the adjust column
 * @method     ChildAliBmbonusQuery groupByBalance() Group by the balance column
 * @method     ChildAliBmbonusQuery groupByCycleB() Group by the cycle_b column
 * @method     ChildAliBmbonusQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliBmbonusQuery groupByCrate() Group by the crate column
 *
 * @method     ChildAliBmbonusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliBmbonusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliBmbonusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliBmbonusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliBmbonusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliBmbonusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliBmbonus findOne(ConnectionInterface $con = null) Return the first ChildAliBmbonus matching the query
 * @method     ChildAliBmbonus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliBmbonus matching the query, or a new ChildAliBmbonus object populated from the query conditions when no match is found
 *
 * @method     ChildAliBmbonus findOneByCid(int $cid) Return the first ChildAliBmbonus filtered by the cid column
 * @method     ChildAliBmbonus findOneByRcode(int $rcode) Return the first ChildAliBmbonus filtered by the rcode column
 * @method     ChildAliBmbonus findOneByMcode(string $mcode) Return the first ChildAliBmbonus filtered by the mcode column
 * @method     ChildAliBmbonus findOneByNameT(string $name_t) Return the first ChildAliBmbonus filtered by the name_t column
 * @method     ChildAliBmbonus findOneByRoL(string $ro_l) Return the first ChildAliBmbonus filtered by the ro_l column
 * @method     ChildAliBmbonus findOneByRoC(string $ro_c) Return the first ChildAliBmbonus filtered by the ro_c column
 * @method     ChildAliBmbonus findOneByRoR(string $ro_r) Return the first ChildAliBmbonus filtered by the ro_r column
 * @method     ChildAliBmbonus findOneByPcrryL(string $pcrry_l) Return the first ChildAliBmbonus filtered by the pcrry_l column
 * @method     ChildAliBmbonus findOneByPcrryC(string $pcrry_c) Return the first ChildAliBmbonus filtered by the pcrry_c column
 * @method     ChildAliBmbonus findOneByPquota(string $pquota) Return the first ChildAliBmbonus filtered by the pquota column
 * @method     ChildAliBmbonus findOneByTotalPvLl(string $total_pv_ll) Return the first ChildAliBmbonus filtered by the total_pv_ll column
 * @method     ChildAliBmbonus findOneByTotalPvRr(string $total_pv_rr) Return the first ChildAliBmbonus filtered by the total_pv_rr column
 * @method     ChildAliBmbonus findOneByTotalPvL(string $total_pv_l) Return the first ChildAliBmbonus filtered by the total_pv_l column
 * @method     ChildAliBmbonus findOneByTotalPvR(string $total_pv_r) Return the first ChildAliBmbonus filtered by the total_pv_r column
 * @method     ChildAliBmbonus findOneByCarryL(string $carry_l) Return the first ChildAliBmbonus filtered by the carry_l column
 * @method     ChildAliBmbonus findOneByCarryC(int $carry_c) Return the first ChildAliBmbonus filtered by the carry_c column
 * @method     ChildAliBmbonus findOneByCarryR(int $carry_r) Return the first ChildAliBmbonus filtered by the carry_r column
 * @method     ChildAliBmbonus findOneByQuota(string $quota) Return the first ChildAliBmbonus filtered by the quota column
 * @method     ChildAliBmbonus findOneByTotal(string $total) Return the first ChildAliBmbonus filtered by the total column
 * @method     ChildAliBmbonus findOneByPercer(string $percer) Return the first ChildAliBmbonus filtered by the percer column
 * @method     ChildAliBmbonus findOneByTax(string $tax) Return the first ChildAliBmbonus filtered by the tax column
 * @method     ChildAliBmbonus findOneByTotalamt(string $totalamt) Return the first ChildAliBmbonus filtered by the totalamt column
 * @method     ChildAliBmbonus findOneByPaydate(string $paydate) Return the first ChildAliBmbonus filtered by the paydate column
 * @method     ChildAliBmbonus findOneByMpos(string $mpos) Return the first ChildAliBmbonus filtered by the mpos column
 * @method     ChildAliBmbonus findOneByTdate(string $tdate) Return the first ChildAliBmbonus filtered by the tdate column
 * @method     ChildAliBmbonus findOneByFdate(string $fdate) Return the first ChildAliBmbonus filtered by the fdate column
 * @method     ChildAliBmbonus findOneByPairStop(string $pair_stop) Return the first ChildAliBmbonus filtered by the pair_stop column
 * @method     ChildAliBmbonus findOneByPoint(int $point) Return the first ChildAliBmbonus filtered by the point column
 * @method     ChildAliBmbonus findOneByStatus(string $status) Return the first ChildAliBmbonus filtered by the status column
 * @method     ChildAliBmbonus findOneByAdjust(string $adjust) Return the first ChildAliBmbonus filtered by the adjust column
 * @method     ChildAliBmbonus findOneByBalance(string $balance) Return the first ChildAliBmbonus filtered by the balance column
 * @method     ChildAliBmbonus findOneByCycleB(int $cycle_b) Return the first ChildAliBmbonus filtered by the cycle_b column
 * @method     ChildAliBmbonus findOneByLocationbase(int $locationbase) Return the first ChildAliBmbonus filtered by the locationbase column
 * @method     ChildAliBmbonus findOneByCrate(string $crate) Return the first ChildAliBmbonus filtered by the crate column *

 * @method     ChildAliBmbonus requirePk($key, ConnectionInterface $con = null) Return the ChildAliBmbonus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOne(ConnectionInterface $con = null) Return the first ChildAliBmbonus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBmbonus requireOneByCid(int $cid) Return the first ChildAliBmbonus filtered by the cid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByRcode(int $rcode) Return the first ChildAliBmbonus filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByMcode(string $mcode) Return the first ChildAliBmbonus filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByNameT(string $name_t) Return the first ChildAliBmbonus filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByRoL(string $ro_l) Return the first ChildAliBmbonus filtered by the ro_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByRoC(string $ro_c) Return the first ChildAliBmbonus filtered by the ro_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByRoR(string $ro_r) Return the first ChildAliBmbonus filtered by the ro_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByPcrryL(string $pcrry_l) Return the first ChildAliBmbonus filtered by the pcrry_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByPcrryC(string $pcrry_c) Return the first ChildAliBmbonus filtered by the pcrry_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByPquota(string $pquota) Return the first ChildAliBmbonus filtered by the pquota column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByTotalPvLl(string $total_pv_ll) Return the first ChildAliBmbonus filtered by the total_pv_ll column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByTotalPvRr(string $total_pv_rr) Return the first ChildAliBmbonus filtered by the total_pv_rr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByTotalPvL(string $total_pv_l) Return the first ChildAliBmbonus filtered by the total_pv_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByTotalPvR(string $total_pv_r) Return the first ChildAliBmbonus filtered by the total_pv_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByCarryL(string $carry_l) Return the first ChildAliBmbonus filtered by the carry_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByCarryC(int $carry_c) Return the first ChildAliBmbonus filtered by the carry_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByCarryR(int $carry_r) Return the first ChildAliBmbonus filtered by the carry_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByQuota(string $quota) Return the first ChildAliBmbonus filtered by the quota column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByTotal(string $total) Return the first ChildAliBmbonus filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByPercer(string $percer) Return the first ChildAliBmbonus filtered by the percer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByTax(string $tax) Return the first ChildAliBmbonus filtered by the tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByTotalamt(string $totalamt) Return the first ChildAliBmbonus filtered by the totalamt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByPaydate(string $paydate) Return the first ChildAliBmbonus filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByMpos(string $mpos) Return the first ChildAliBmbonus filtered by the mpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByTdate(string $tdate) Return the first ChildAliBmbonus filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByFdate(string $fdate) Return the first ChildAliBmbonus filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByPairStop(string $pair_stop) Return the first ChildAliBmbonus filtered by the pair_stop column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByPoint(int $point) Return the first ChildAliBmbonus filtered by the point column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByStatus(string $status) Return the first ChildAliBmbonus filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByAdjust(string $adjust) Return the first ChildAliBmbonus filtered by the adjust column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByBalance(string $balance) Return the first ChildAliBmbonus filtered by the balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByCycleB(int $cycle_b) Return the first ChildAliBmbonus filtered by the cycle_b column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByLocationbase(int $locationbase) Return the first ChildAliBmbonus filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmbonus requireOneByCrate(string $crate) Return the first ChildAliBmbonus filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBmbonus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliBmbonus objects based on current ModelCriteria
 * @method     ChildAliBmbonus[]|ObjectCollection findByCid(int $cid) Return ChildAliBmbonus objects filtered by the cid column
 * @method     ChildAliBmbonus[]|ObjectCollection findByRcode(int $rcode) Return ChildAliBmbonus objects filtered by the rcode column
 * @method     ChildAliBmbonus[]|ObjectCollection findByMcode(string $mcode) Return ChildAliBmbonus objects filtered by the mcode column
 * @method     ChildAliBmbonus[]|ObjectCollection findByNameT(string $name_t) Return ChildAliBmbonus objects filtered by the name_t column
 * @method     ChildAliBmbonus[]|ObjectCollection findByRoL(string $ro_l) Return ChildAliBmbonus objects filtered by the ro_l column
 * @method     ChildAliBmbonus[]|ObjectCollection findByRoC(string $ro_c) Return ChildAliBmbonus objects filtered by the ro_c column
 * @method     ChildAliBmbonus[]|ObjectCollection findByRoR(string $ro_r) Return ChildAliBmbonus objects filtered by the ro_r column
 * @method     ChildAliBmbonus[]|ObjectCollection findByPcrryL(string $pcrry_l) Return ChildAliBmbonus objects filtered by the pcrry_l column
 * @method     ChildAliBmbonus[]|ObjectCollection findByPcrryC(string $pcrry_c) Return ChildAliBmbonus objects filtered by the pcrry_c column
 * @method     ChildAliBmbonus[]|ObjectCollection findByPquota(string $pquota) Return ChildAliBmbonus objects filtered by the pquota column
 * @method     ChildAliBmbonus[]|ObjectCollection findByTotalPvLl(string $total_pv_ll) Return ChildAliBmbonus objects filtered by the total_pv_ll column
 * @method     ChildAliBmbonus[]|ObjectCollection findByTotalPvRr(string $total_pv_rr) Return ChildAliBmbonus objects filtered by the total_pv_rr column
 * @method     ChildAliBmbonus[]|ObjectCollection findByTotalPvL(string $total_pv_l) Return ChildAliBmbonus objects filtered by the total_pv_l column
 * @method     ChildAliBmbonus[]|ObjectCollection findByTotalPvR(string $total_pv_r) Return ChildAliBmbonus objects filtered by the total_pv_r column
 * @method     ChildAliBmbonus[]|ObjectCollection findByCarryL(string $carry_l) Return ChildAliBmbonus objects filtered by the carry_l column
 * @method     ChildAliBmbonus[]|ObjectCollection findByCarryC(int $carry_c) Return ChildAliBmbonus objects filtered by the carry_c column
 * @method     ChildAliBmbonus[]|ObjectCollection findByCarryR(int $carry_r) Return ChildAliBmbonus objects filtered by the carry_r column
 * @method     ChildAliBmbonus[]|ObjectCollection findByQuota(string $quota) Return ChildAliBmbonus objects filtered by the quota column
 * @method     ChildAliBmbonus[]|ObjectCollection findByTotal(string $total) Return ChildAliBmbonus objects filtered by the total column
 * @method     ChildAliBmbonus[]|ObjectCollection findByPercer(string $percer) Return ChildAliBmbonus objects filtered by the percer column
 * @method     ChildAliBmbonus[]|ObjectCollection findByTax(string $tax) Return ChildAliBmbonus objects filtered by the tax column
 * @method     ChildAliBmbonus[]|ObjectCollection findByTotalamt(string $totalamt) Return ChildAliBmbonus objects filtered by the totalamt column
 * @method     ChildAliBmbonus[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliBmbonus objects filtered by the paydate column
 * @method     ChildAliBmbonus[]|ObjectCollection findByMpos(string $mpos) Return ChildAliBmbonus objects filtered by the mpos column
 * @method     ChildAliBmbonus[]|ObjectCollection findByTdate(string $tdate) Return ChildAliBmbonus objects filtered by the tdate column
 * @method     ChildAliBmbonus[]|ObjectCollection findByFdate(string $fdate) Return ChildAliBmbonus objects filtered by the fdate column
 * @method     ChildAliBmbonus[]|ObjectCollection findByPairStop(string $pair_stop) Return ChildAliBmbonus objects filtered by the pair_stop column
 * @method     ChildAliBmbonus[]|ObjectCollection findByPoint(int $point) Return ChildAliBmbonus objects filtered by the point column
 * @method     ChildAliBmbonus[]|ObjectCollection findByStatus(string $status) Return ChildAliBmbonus objects filtered by the status column
 * @method     ChildAliBmbonus[]|ObjectCollection findByAdjust(string $adjust) Return ChildAliBmbonus objects filtered by the adjust column
 * @method     ChildAliBmbonus[]|ObjectCollection findByBalance(string $balance) Return ChildAliBmbonus objects filtered by the balance column
 * @method     ChildAliBmbonus[]|ObjectCollection findByCycleB(int $cycle_b) Return ChildAliBmbonus objects filtered by the cycle_b column
 * @method     ChildAliBmbonus[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliBmbonus objects filtered by the locationbase column
 * @method     ChildAliBmbonus[]|ObjectCollection findByCrate(string $crate) Return ChildAliBmbonus objects filtered by the crate column
 * @method     ChildAliBmbonus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliBmbonusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliBmbonusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliBmbonus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliBmbonusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliBmbonusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliBmbonusQuery) {
            return $criteria;
        }
        $query = new ChildAliBmbonusQuery();
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
     * @return ChildAliBmbonus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliBmbonusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliBmbonusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliBmbonus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT cid, rcode, mcode, name_t, ro_l, ro_c, ro_r, pcrry_l, pcrry_c, pquota, total_pv_ll, total_pv_rr, total_pv_l, total_pv_r, carry_l, carry_c, carry_r, quota, total, percer, tax, totalamt, paydate, mpos, tdate, fdate, pair_stop, point, status, adjust, balance, cycle_b, locationbase, crate FROM ali_bmbonus WHERE cid = :p0';
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
            /** @var ChildAliBmbonus $obj */
            $obj = new ChildAliBmbonus();
            $obj->hydrate($row);
            AliBmbonusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliBmbonus|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliBmbonusTableMap::COL_CID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliBmbonusTableMap::COL_CID, $keys, Criteria::IN);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByCid($cid = null, $comparison = null)
    {
        if (is_array($cid)) {
            $useMinMax = false;
            if (isset($cid['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_CID, $cid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cid['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_CID, $cid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_CID, $cid, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByRoL($roL = null, $comparison = null)
    {
        if (is_array($roL)) {
            $useMinMax = false;
            if (isset($roL['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_RO_L, $roL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roL['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_RO_L, $roL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_RO_L, $roL, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByRoC($roC = null, $comparison = null)
    {
        if (is_array($roC)) {
            $useMinMax = false;
            if (isset($roC['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_RO_C, $roC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roC['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_RO_C, $roC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_RO_C, $roC, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByRoR($roR = null, $comparison = null)
    {
        if (is_array($roR)) {
            $useMinMax = false;
            if (isset($roR['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_RO_R, $roR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roR['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_RO_R, $roR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_RO_R, $roR, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByPcrryL($pcrryL = null, $comparison = null)
    {
        if (is_array($pcrryL)) {
            $useMinMax = false;
            if (isset($pcrryL['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_PCRRY_L, $pcrryL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pcrryL['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_PCRRY_L, $pcrryL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_PCRRY_L, $pcrryL, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByPcrryC($pcrryC = null, $comparison = null)
    {
        if (is_array($pcrryC)) {
            $useMinMax = false;
            if (isset($pcrryC['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_PCRRY_C, $pcrryC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pcrryC['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_PCRRY_C, $pcrryC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_PCRRY_C, $pcrryC, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByPquota($pquota = null, $comparison = null)
    {
        if (is_array($pquota)) {
            $useMinMax = false;
            if (isset($pquota['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_PQUOTA, $pquota['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pquota['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_PQUOTA, $pquota['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_PQUOTA, $pquota, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByTotalPvLl($totalPvLl = null, $comparison = null)
    {
        if (is_array($totalPvLl)) {
            $useMinMax = false;
            if (isset($totalPvLl['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL_PV_LL, $totalPvLl['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPvLl['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL_PV_LL, $totalPvLl['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL_PV_LL, $totalPvLl, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByTotalPvRr($totalPvRr = null, $comparison = null)
    {
        if (is_array($totalPvRr)) {
            $useMinMax = false;
            if (isset($totalPvRr['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL_PV_RR, $totalPvRr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPvRr['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL_PV_RR, $totalPvRr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL_PV_RR, $totalPvRr, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByTotalPvL($totalPvL = null, $comparison = null)
    {
        if (is_array($totalPvL)) {
            $useMinMax = false;
            if (isset($totalPvL['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL_PV_L, $totalPvL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPvL['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL_PV_L, $totalPvL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL_PV_L, $totalPvL, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByTotalPvR($totalPvR = null, $comparison = null)
    {
        if (is_array($totalPvR)) {
            $useMinMax = false;
            if (isset($totalPvR['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL_PV_R, $totalPvR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPvR['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL_PV_R, $totalPvR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL_PV_R, $totalPvR, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByCarryL($carryL = null, $comparison = null)
    {
        if (is_array($carryL)) {
            $useMinMax = false;
            if (isset($carryL['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_CARRY_L, $carryL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carryL['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_CARRY_L, $carryL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_CARRY_L, $carryL, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByCarryC($carryC = null, $comparison = null)
    {
        if (is_array($carryC)) {
            $useMinMax = false;
            if (isset($carryC['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_CARRY_C, $carryC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carryC['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_CARRY_C, $carryC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_CARRY_C, $carryC, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByCarryR($carryR = null, $comparison = null)
    {
        if (is_array($carryR)) {
            $useMinMax = false;
            if (isset($carryR['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_CARRY_R, $carryR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carryR['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_CARRY_R, $carryR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_CARRY_R, $carryR, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByQuota($quota = null, $comparison = null)
    {
        if (is_array($quota)) {
            $useMinMax = false;
            if (isset($quota['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_QUOTA, $quota['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quota['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_QUOTA, $quota['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_QUOTA, $quota, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByPercer($percer = null, $comparison = null)
    {
        if (is_array($percer)) {
            $useMinMax = false;
            if (isset($percer['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_PERCER, $percer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($percer['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_PERCER, $percer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_PERCER, $percer, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByTax($tax = null, $comparison = null)
    {
        if (is_array($tax)) {
            $useMinMax = false;
            if (isset($tax['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TAX, $tax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tax['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TAX, $tax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_TAX, $tax, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByTotalamt($totalamt = null, $comparison = null)
    {
        if (is_array($totalamt)) {
            $useMinMax = false;
            if (isset($totalamt['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TOTALAMT, $totalamt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalamt['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TOTALAMT, $totalamt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_TOTALAMT, $totalamt, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (is_array($paydate)) {
            $useMinMax = false;
            if (isset($paydate['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_PAYDATE, $paydate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paydate['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_PAYDATE, $paydate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_PAYDATE, $paydate, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByMpos($mpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_MPOS, $mpos, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByPairStop($pairStop = null, $comparison = null)
    {
        if (is_array($pairStop)) {
            $useMinMax = false;
            if (isset($pairStop['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_PAIR_STOP, $pairStop['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pairStop['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_PAIR_STOP, $pairStop['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_PAIR_STOP, $pairStop, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByPoint($point = null, $comparison = null)
    {
        if (is_array($point)) {
            $useMinMax = false;
            if (isset($point['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_POINT, $point['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($point['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_POINT, $point['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_POINT, $point, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByAdjust($adjust = null, $comparison = null)
    {
        if (is_array($adjust)) {
            $useMinMax = false;
            if (isset($adjust['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_ADJUST, $adjust['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adjust['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_ADJUST, $adjust['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_ADJUST, $adjust, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByBalance($balance = null, $comparison = null)
    {
        if (is_array($balance)) {
            $useMinMax = false;
            if (isset($balance['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_BALANCE, $balance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($balance['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_BALANCE, $balance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_BALANCE, $balance, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByCycleB($cycleB = null, $comparison = null)
    {
        if (is_array($cycleB)) {
            $useMinMax = false;
            if (isset($cycleB['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_CYCLE_B, $cycleB['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cycleB['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_CYCLE_B, $cycleB['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_CYCLE_B, $cycleB, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliBmbonusTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmbonusTableMap::COL_CRATE, $crate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliBmbonus $aliBmbonus Object to remove from the list of results
     *
     * @return $this|ChildAliBmbonusQuery The current query, for fluid interface
     */
    public function prune($aliBmbonus = null)
    {
        if ($aliBmbonus) {
            $this->addUsingAlias(AliBmbonusTableMap::COL_CID, $aliBmbonus->getCid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_bmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBmbonusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliBmbonusTableMap::clearInstancePool();
            AliBmbonusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBmbonusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliBmbonusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliBmbonusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliBmbonusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliBmbonusQuery
