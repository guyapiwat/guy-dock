<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliReportPoint as ChildAliReportPoint;
use CciOrm\CciOrm\AliReportPointQuery as ChildAliReportPointQuery;
use CciOrm\CciOrm\Map\AliReportPointTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_report_point' table.
 *
 *
 *
 * @method     ChildAliReportPointQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliReportPointQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliReportPointQuery orderByPoint($order = Criteria::ASC) Order by the point column
 * @method     ChildAliReportPointQuery orderByMonthpv($order = Criteria::ASC) Order by the monthpv column
 * @method     ChildAliReportPointQuery orderByCarryL($order = Criteria::ASC) Order by the carry_l column
 * @method     ChildAliReportPointQuery orderByCarryC($order = Criteria::ASC) Order by the carry_c column
 * @method     ChildAliReportPointQuery orderByRoL($order = Criteria::ASC) Order by the ro_l column
 * @method     ChildAliReportPointQuery orderByRoC($order = Criteria::ASC) Order by the ro_c column
 * @method     ChildAliReportPointQuery orderByAllL($order = Criteria::ASC) Order by the all_l column
 * @method     ChildAliReportPointQuery orderByAllC($order = Criteria::ASC) Order by the all_c column
 * @method     ChildAliReportPointQuery orderByAllpv($order = Criteria::ASC) Order by the allpv column
 * @method     ChildAliReportPointQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliReportPointQuery orderByNewSponsor($order = Criteria::ASC) Order by the new_sponsor column
 * @method     ChildAliReportPointQuery orderByNewSup($order = Criteria::ASC) Order by the new_sup column
 * @method     ChildAliReportPointQuery orderByNewEx($order = Criteria::ASC) Order by the new_ex column
 * @method     ChildAliReportPointQuery orderBySupEx($order = Criteria::ASC) Order by the sup_ex column
 * @method     ChildAliReportPointQuery orderByTravelpoint($order = Criteria::ASC) Order by the travelpoint column
 *
 * @method     ChildAliReportPointQuery groupByMcode() Group by the mcode column
 * @method     ChildAliReportPointQuery groupByNameT() Group by the name_t column
 * @method     ChildAliReportPointQuery groupByPoint() Group by the point column
 * @method     ChildAliReportPointQuery groupByMonthpv() Group by the monthpv column
 * @method     ChildAliReportPointQuery groupByCarryL() Group by the carry_l column
 * @method     ChildAliReportPointQuery groupByCarryC() Group by the carry_c column
 * @method     ChildAliReportPointQuery groupByRoL() Group by the ro_l column
 * @method     ChildAliReportPointQuery groupByRoC() Group by the ro_c column
 * @method     ChildAliReportPointQuery groupByAllL() Group by the all_l column
 * @method     ChildAliReportPointQuery groupByAllC() Group by the all_c column
 * @method     ChildAliReportPointQuery groupByAllpv() Group by the allpv column
 * @method     ChildAliReportPointQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliReportPointQuery groupByNewSponsor() Group by the new_sponsor column
 * @method     ChildAliReportPointQuery groupByNewSup() Group by the new_sup column
 * @method     ChildAliReportPointQuery groupByNewEx() Group by the new_ex column
 * @method     ChildAliReportPointQuery groupBySupEx() Group by the sup_ex column
 * @method     ChildAliReportPointQuery groupByTravelpoint() Group by the travelpoint column
 *
 * @method     ChildAliReportPointQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliReportPointQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliReportPointQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliReportPointQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliReportPointQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliReportPointQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliReportPoint findOne(ConnectionInterface $con = null) Return the first ChildAliReportPoint matching the query
 * @method     ChildAliReportPoint findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliReportPoint matching the query, or a new ChildAliReportPoint object populated from the query conditions when no match is found
 *
 * @method     ChildAliReportPoint findOneByMcode(string $mcode) Return the first ChildAliReportPoint filtered by the mcode column
 * @method     ChildAliReportPoint findOneByNameT(string $name_t) Return the first ChildAliReportPoint filtered by the name_t column
 * @method     ChildAliReportPoint findOneByPoint(int $point) Return the first ChildAliReportPoint filtered by the point column
 * @method     ChildAliReportPoint findOneByMonthpv(string $monthpv) Return the first ChildAliReportPoint filtered by the monthpv column
 * @method     ChildAliReportPoint findOneByCarryL(int $carry_l) Return the first ChildAliReportPoint filtered by the carry_l column
 * @method     ChildAliReportPoint findOneByCarryC(int $carry_c) Return the first ChildAliReportPoint filtered by the carry_c column
 * @method     ChildAliReportPoint findOneByRoL(int $ro_l) Return the first ChildAliReportPoint filtered by the ro_l column
 * @method     ChildAliReportPoint findOneByRoC(int $ro_c) Return the first ChildAliReportPoint filtered by the ro_c column
 * @method     ChildAliReportPoint findOneByAllL(int $all_l) Return the first ChildAliReportPoint filtered by the all_l column
 * @method     ChildAliReportPoint findOneByAllC(int $all_c) Return the first ChildAliReportPoint filtered by the all_c column
 * @method     ChildAliReportPoint findOneByAllpv(int $allpv) Return the first ChildAliReportPoint filtered by the allpv column
 * @method     ChildAliReportPoint findOneByPosCur(string $pos_cur) Return the first ChildAliReportPoint filtered by the pos_cur column
 * @method     ChildAliReportPoint findOneByNewSponsor(int $new_sponsor) Return the first ChildAliReportPoint filtered by the new_sponsor column
 * @method     ChildAliReportPoint findOneByNewSup(int $new_sup) Return the first ChildAliReportPoint filtered by the new_sup column
 * @method     ChildAliReportPoint findOneByNewEx(int $new_ex) Return the first ChildAliReportPoint filtered by the new_ex column
 * @method     ChildAliReportPoint findOneBySupEx(int $sup_ex) Return the first ChildAliReportPoint filtered by the sup_ex column
 * @method     ChildAliReportPoint findOneByTravelpoint(string $travelpoint) Return the first ChildAliReportPoint filtered by the travelpoint column *

 * @method     ChildAliReportPoint requirePk($key, ConnectionInterface $con = null) Return the ChildAliReportPoint by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOne(ConnectionInterface $con = null) Return the first ChildAliReportPoint matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliReportPoint requireOneByMcode(string $mcode) Return the first ChildAliReportPoint filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByNameT(string $name_t) Return the first ChildAliReportPoint filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByPoint(int $point) Return the first ChildAliReportPoint filtered by the point column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByMonthpv(string $monthpv) Return the first ChildAliReportPoint filtered by the monthpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByCarryL(int $carry_l) Return the first ChildAliReportPoint filtered by the carry_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByCarryC(int $carry_c) Return the first ChildAliReportPoint filtered by the carry_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByRoL(int $ro_l) Return the first ChildAliReportPoint filtered by the ro_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByRoC(int $ro_c) Return the first ChildAliReportPoint filtered by the ro_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByAllL(int $all_l) Return the first ChildAliReportPoint filtered by the all_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByAllC(int $all_c) Return the first ChildAliReportPoint filtered by the all_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByAllpv(int $allpv) Return the first ChildAliReportPoint filtered by the allpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByPosCur(string $pos_cur) Return the first ChildAliReportPoint filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByNewSponsor(int $new_sponsor) Return the first ChildAliReportPoint filtered by the new_sponsor column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByNewSup(int $new_sup) Return the first ChildAliReportPoint filtered by the new_sup column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByNewEx(int $new_ex) Return the first ChildAliReportPoint filtered by the new_ex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneBySupEx(int $sup_ex) Return the first ChildAliReportPoint filtered by the sup_ex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPoint requireOneByTravelpoint(string $travelpoint) Return the first ChildAliReportPoint filtered by the travelpoint column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliReportPoint[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliReportPoint objects based on current ModelCriteria
 * @method     ChildAliReportPoint[]|ObjectCollection findByMcode(string $mcode) Return ChildAliReportPoint objects filtered by the mcode column
 * @method     ChildAliReportPoint[]|ObjectCollection findByNameT(string $name_t) Return ChildAliReportPoint objects filtered by the name_t column
 * @method     ChildAliReportPoint[]|ObjectCollection findByPoint(int $point) Return ChildAliReportPoint objects filtered by the point column
 * @method     ChildAliReportPoint[]|ObjectCollection findByMonthpv(string $monthpv) Return ChildAliReportPoint objects filtered by the monthpv column
 * @method     ChildAliReportPoint[]|ObjectCollection findByCarryL(int $carry_l) Return ChildAliReportPoint objects filtered by the carry_l column
 * @method     ChildAliReportPoint[]|ObjectCollection findByCarryC(int $carry_c) Return ChildAliReportPoint objects filtered by the carry_c column
 * @method     ChildAliReportPoint[]|ObjectCollection findByRoL(int $ro_l) Return ChildAliReportPoint objects filtered by the ro_l column
 * @method     ChildAliReportPoint[]|ObjectCollection findByRoC(int $ro_c) Return ChildAliReportPoint objects filtered by the ro_c column
 * @method     ChildAliReportPoint[]|ObjectCollection findByAllL(int $all_l) Return ChildAliReportPoint objects filtered by the all_l column
 * @method     ChildAliReportPoint[]|ObjectCollection findByAllC(int $all_c) Return ChildAliReportPoint objects filtered by the all_c column
 * @method     ChildAliReportPoint[]|ObjectCollection findByAllpv(int $allpv) Return ChildAliReportPoint objects filtered by the allpv column
 * @method     ChildAliReportPoint[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliReportPoint objects filtered by the pos_cur column
 * @method     ChildAliReportPoint[]|ObjectCollection findByNewSponsor(int $new_sponsor) Return ChildAliReportPoint objects filtered by the new_sponsor column
 * @method     ChildAliReportPoint[]|ObjectCollection findByNewSup(int $new_sup) Return ChildAliReportPoint objects filtered by the new_sup column
 * @method     ChildAliReportPoint[]|ObjectCollection findByNewEx(int $new_ex) Return ChildAliReportPoint objects filtered by the new_ex column
 * @method     ChildAliReportPoint[]|ObjectCollection findBySupEx(int $sup_ex) Return ChildAliReportPoint objects filtered by the sup_ex column
 * @method     ChildAliReportPoint[]|ObjectCollection findByTravelpoint(string $travelpoint) Return ChildAliReportPoint objects filtered by the travelpoint column
 * @method     ChildAliReportPoint[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliReportPointQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliReportPointQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliReportPoint', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliReportPointQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliReportPointQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliReportPointQuery) {
            return $criteria;
        }
        $query = new ChildAliReportPointQuery();
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
     * @return ChildAliReportPoint|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliReportPoint object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliReportPoint object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliReportPoint object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliReportPoint object has no primary key');
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
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByPoint($point = null, $comparison = null)
    {
        if (is_array($point)) {
            $useMinMax = false;
            if (isset($point['min'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_POINT, $point['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($point['max'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_POINT, $point['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_POINT, $point, $comparison);
    }

    /**
     * Filter the query on the monthpv column
     *
     * Example usage:
     * <code>
     * $query->filterByMonthpv('fooValue');   // WHERE monthpv = 'fooValue'
     * $query->filterByMonthpv('%fooValue%', Criteria::LIKE); // WHERE monthpv LIKE '%fooValue%'
     * </code>
     *
     * @param     string $monthpv The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByMonthpv($monthpv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($monthpv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_MONTHPV, $monthpv, $comparison);
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
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByCarryL($carryL = null, $comparison = null)
    {
        if (is_array($carryL)) {
            $useMinMax = false;
            if (isset($carryL['min'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_CARRY_L, $carryL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carryL['max'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_CARRY_L, $carryL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_CARRY_L, $carryL, $comparison);
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
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByCarryC($carryC = null, $comparison = null)
    {
        if (is_array($carryC)) {
            $useMinMax = false;
            if (isset($carryC['min'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_CARRY_C, $carryC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carryC['max'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_CARRY_C, $carryC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_CARRY_C, $carryC, $comparison);
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
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByRoL($roL = null, $comparison = null)
    {
        if (is_array($roL)) {
            $useMinMax = false;
            if (isset($roL['min'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_RO_L, $roL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roL['max'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_RO_L, $roL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_RO_L, $roL, $comparison);
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
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByRoC($roC = null, $comparison = null)
    {
        if (is_array($roC)) {
            $useMinMax = false;
            if (isset($roC['min'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_RO_C, $roC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roC['max'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_RO_C, $roC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_RO_C, $roC, $comparison);
    }

    /**
     * Filter the query on the all_l column
     *
     * Example usage:
     * <code>
     * $query->filterByAllL(1234); // WHERE all_l = 1234
     * $query->filterByAllL(array(12, 34)); // WHERE all_l IN (12, 34)
     * $query->filterByAllL(array('min' => 12)); // WHERE all_l > 12
     * </code>
     *
     * @param     mixed $allL The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByAllL($allL = null, $comparison = null)
    {
        if (is_array($allL)) {
            $useMinMax = false;
            if (isset($allL['min'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_ALL_L, $allL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($allL['max'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_ALL_L, $allL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_ALL_L, $allL, $comparison);
    }

    /**
     * Filter the query on the all_c column
     *
     * Example usage:
     * <code>
     * $query->filterByAllC(1234); // WHERE all_c = 1234
     * $query->filterByAllC(array(12, 34)); // WHERE all_c IN (12, 34)
     * $query->filterByAllC(array('min' => 12)); // WHERE all_c > 12
     * </code>
     *
     * @param     mixed $allC The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByAllC($allC = null, $comparison = null)
    {
        if (is_array($allC)) {
            $useMinMax = false;
            if (isset($allC['min'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_ALL_C, $allC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($allC['max'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_ALL_C, $allC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_ALL_C, $allC, $comparison);
    }

    /**
     * Filter the query on the allpv column
     *
     * Example usage:
     * <code>
     * $query->filterByAllpv(1234); // WHERE allpv = 1234
     * $query->filterByAllpv(array(12, 34)); // WHERE allpv IN (12, 34)
     * $query->filterByAllpv(array('min' => 12)); // WHERE allpv > 12
     * </code>
     *
     * @param     mixed $allpv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByAllpv($allpv = null, $comparison = null)
    {
        if (is_array($allpv)) {
            $useMinMax = false;
            if (isset($allpv['min'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_ALLPV, $allpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($allpv['max'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_ALLPV, $allpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_ALLPV, $allpv, $comparison);
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
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Filter the query on the new_sponsor column
     *
     * Example usage:
     * <code>
     * $query->filterByNewSponsor(1234); // WHERE new_sponsor = 1234
     * $query->filterByNewSponsor(array(12, 34)); // WHERE new_sponsor IN (12, 34)
     * $query->filterByNewSponsor(array('min' => 12)); // WHERE new_sponsor > 12
     * </code>
     *
     * @param     mixed $newSponsor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByNewSponsor($newSponsor = null, $comparison = null)
    {
        if (is_array($newSponsor)) {
            $useMinMax = false;
            if (isset($newSponsor['min'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_NEW_SPONSOR, $newSponsor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($newSponsor['max'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_NEW_SPONSOR, $newSponsor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_NEW_SPONSOR, $newSponsor, $comparison);
    }

    /**
     * Filter the query on the new_sup column
     *
     * Example usage:
     * <code>
     * $query->filterByNewSup(1234); // WHERE new_sup = 1234
     * $query->filterByNewSup(array(12, 34)); // WHERE new_sup IN (12, 34)
     * $query->filterByNewSup(array('min' => 12)); // WHERE new_sup > 12
     * </code>
     *
     * @param     mixed $newSup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByNewSup($newSup = null, $comparison = null)
    {
        if (is_array($newSup)) {
            $useMinMax = false;
            if (isset($newSup['min'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_NEW_SUP, $newSup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($newSup['max'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_NEW_SUP, $newSup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_NEW_SUP, $newSup, $comparison);
    }

    /**
     * Filter the query on the new_ex column
     *
     * Example usage:
     * <code>
     * $query->filterByNewEx(1234); // WHERE new_ex = 1234
     * $query->filterByNewEx(array(12, 34)); // WHERE new_ex IN (12, 34)
     * $query->filterByNewEx(array('min' => 12)); // WHERE new_ex > 12
     * </code>
     *
     * @param     mixed $newEx The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByNewEx($newEx = null, $comparison = null)
    {
        if (is_array($newEx)) {
            $useMinMax = false;
            if (isset($newEx['min'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_NEW_EX, $newEx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($newEx['max'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_NEW_EX, $newEx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_NEW_EX, $newEx, $comparison);
    }

    /**
     * Filter the query on the sup_ex column
     *
     * Example usage:
     * <code>
     * $query->filterBySupEx(1234); // WHERE sup_ex = 1234
     * $query->filterBySupEx(array(12, 34)); // WHERE sup_ex IN (12, 34)
     * $query->filterBySupEx(array('min' => 12)); // WHERE sup_ex > 12
     * </code>
     *
     * @param     mixed $supEx The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterBySupEx($supEx = null, $comparison = null)
    {
        if (is_array($supEx)) {
            $useMinMax = false;
            if (isset($supEx['min'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_SUP_EX, $supEx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($supEx['max'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_SUP_EX, $supEx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_SUP_EX, $supEx, $comparison);
    }

    /**
     * Filter the query on the travelpoint column
     *
     * Example usage:
     * <code>
     * $query->filterByTravelpoint(1234); // WHERE travelpoint = 1234
     * $query->filterByTravelpoint(array(12, 34)); // WHERE travelpoint IN (12, 34)
     * $query->filterByTravelpoint(array('min' => 12)); // WHERE travelpoint > 12
     * </code>
     *
     * @param     mixed $travelpoint The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function filterByTravelpoint($travelpoint = null, $comparison = null)
    {
        if (is_array($travelpoint)) {
            $useMinMax = false;
            if (isset($travelpoint['min'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_TRAVELPOINT, $travelpoint['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($travelpoint['max'])) {
                $this->addUsingAlias(AliReportPointTableMap::COL_TRAVELPOINT, $travelpoint['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPointTableMap::COL_TRAVELPOINT, $travelpoint, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliReportPoint $aliReportPoint Object to remove from the list of results
     *
     * @return $this|ChildAliReportPointQuery The current query, for fluid interface
     */
    public function prune($aliReportPoint = null)
    {
        if ($aliReportPoint) {
            throw new LogicException('AliReportPoint object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_report_point table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportPointTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliReportPointTableMap::clearInstancePool();
            AliReportPointTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportPointTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliReportPointTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliReportPointTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliReportPointTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliReportPointQuery
