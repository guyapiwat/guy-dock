<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliTround as ChildAliTround;
use CciOrm\CciOrm\AliTroundQuery as ChildAliTroundQuery;
use CciOrm\CciOrm\Map\AliTroundTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_tround' table.
 *
 *
 *
 * @method     ChildAliTroundQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliTroundQuery orderByRname($order = Criteria::ASC) Order by the rname column
 * @method     ChildAliTroundQuery orderByDetail($order = Criteria::ASC) Order by the detail column
 * @method     ChildAliTroundQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliTroundQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliTroundQuery orderByRtype($order = Criteria::ASC) Order by the rtype column
 * @method     ChildAliTroundQuery orderByFirstseat($order = Criteria::ASC) Order by the firstseat column
 * @method     ChildAliTroundQuery orderBySecondseat($order = Criteria::ASC) Order by the secondseat column
 * @method     ChildAliTroundQuery orderByRincrease($order = Criteria::ASC) Order by the rincrease column
 * @method     ChildAliTroundQuery orderByRurl($order = Criteria::ASC) Order by the rurl column
 * @method     ChildAliTroundQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliTroundQuery orderByCalc($order = Criteria::ASC) Order by the calc column
 * @method     ChildAliTroundQuery orderByCalcDate($order = Criteria::ASC) Order by the calc_date column
 *
 * @method     ChildAliTroundQuery groupByRcode() Group by the rcode column
 * @method     ChildAliTroundQuery groupByRname() Group by the rname column
 * @method     ChildAliTroundQuery groupByDetail() Group by the detail column
 * @method     ChildAliTroundQuery groupByFdate() Group by the fdate column
 * @method     ChildAliTroundQuery groupByTdate() Group by the tdate column
 * @method     ChildAliTroundQuery groupByRtype() Group by the rtype column
 * @method     ChildAliTroundQuery groupByFirstseat() Group by the firstseat column
 * @method     ChildAliTroundQuery groupBySecondseat() Group by the secondseat column
 * @method     ChildAliTroundQuery groupByRincrease() Group by the rincrease column
 * @method     ChildAliTroundQuery groupByRurl() Group by the rurl column
 * @method     ChildAliTroundQuery groupByRemark() Group by the remark column
 * @method     ChildAliTroundQuery groupByCalc() Group by the calc column
 * @method     ChildAliTroundQuery groupByCalcDate() Group by the calc_date column
 *
 * @method     ChildAliTroundQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliTroundQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliTroundQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliTroundQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliTroundQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliTroundQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliTround findOne(ConnectionInterface $con = null) Return the first ChildAliTround matching the query
 * @method     ChildAliTround findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliTround matching the query, or a new ChildAliTround object populated from the query conditions when no match is found
 *
 * @method     ChildAliTround findOneByRcode(int $rcode) Return the first ChildAliTround filtered by the rcode column
 * @method     ChildAliTround findOneByRname(string $rname) Return the first ChildAliTround filtered by the rname column
 * @method     ChildAliTround findOneByDetail(string $detail) Return the first ChildAliTround filtered by the detail column
 * @method     ChildAliTround findOneByFdate(string $fdate) Return the first ChildAliTround filtered by the fdate column
 * @method     ChildAliTround findOneByTdate(string $tdate) Return the first ChildAliTround filtered by the tdate column
 * @method     ChildAliTround findOneByRtype(int $rtype) Return the first ChildAliTround filtered by the rtype column
 * @method     ChildAliTround findOneByFirstseat(string $firstseat) Return the first ChildAliTround filtered by the firstseat column
 * @method     ChildAliTround findOneBySecondseat(string $secondseat) Return the first ChildAliTround filtered by the secondseat column
 * @method     ChildAliTround findOneByRincrease(string $rincrease) Return the first ChildAliTround filtered by the rincrease column
 * @method     ChildAliTround findOneByRurl(string $rurl) Return the first ChildAliTround filtered by the rurl column
 * @method     ChildAliTround findOneByRemark(string $remark) Return the first ChildAliTround filtered by the remark column
 * @method     ChildAliTround findOneByCalc(string $calc) Return the first ChildAliTround filtered by the calc column
 * @method     ChildAliTround findOneByCalcDate(string $calc_date) Return the first ChildAliTround filtered by the calc_date column *

 * @method     ChildAliTround requirePk($key, ConnectionInterface $con = null) Return the ChildAliTround by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTround requireOne(ConnectionInterface $con = null) Return the first ChildAliTround matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTround requireOneByRcode(int $rcode) Return the first ChildAliTround filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTround requireOneByRname(string $rname) Return the first ChildAliTround filtered by the rname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTround requireOneByDetail(string $detail) Return the first ChildAliTround filtered by the detail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTround requireOneByFdate(string $fdate) Return the first ChildAliTround filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTround requireOneByTdate(string $tdate) Return the first ChildAliTround filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTround requireOneByRtype(int $rtype) Return the first ChildAliTround filtered by the rtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTround requireOneByFirstseat(string $firstseat) Return the first ChildAliTround filtered by the firstseat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTround requireOneBySecondseat(string $secondseat) Return the first ChildAliTround filtered by the secondseat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTround requireOneByRincrease(string $rincrease) Return the first ChildAliTround filtered by the rincrease column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTround requireOneByRurl(string $rurl) Return the first ChildAliTround filtered by the rurl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTround requireOneByRemark(string $remark) Return the first ChildAliTround filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTround requireOneByCalc(string $calc) Return the first ChildAliTround filtered by the calc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTround requireOneByCalcDate(string $calc_date) Return the first ChildAliTround filtered by the calc_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTround[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliTround objects based on current ModelCriteria
 * @method     ChildAliTround[]|ObjectCollection findByRcode(int $rcode) Return ChildAliTround objects filtered by the rcode column
 * @method     ChildAliTround[]|ObjectCollection findByRname(string $rname) Return ChildAliTround objects filtered by the rname column
 * @method     ChildAliTround[]|ObjectCollection findByDetail(string $detail) Return ChildAliTround objects filtered by the detail column
 * @method     ChildAliTround[]|ObjectCollection findByFdate(string $fdate) Return ChildAliTround objects filtered by the fdate column
 * @method     ChildAliTround[]|ObjectCollection findByTdate(string $tdate) Return ChildAliTround objects filtered by the tdate column
 * @method     ChildAliTround[]|ObjectCollection findByRtype(int $rtype) Return ChildAliTround objects filtered by the rtype column
 * @method     ChildAliTround[]|ObjectCollection findByFirstseat(string $firstseat) Return ChildAliTround objects filtered by the firstseat column
 * @method     ChildAliTround[]|ObjectCollection findBySecondseat(string $secondseat) Return ChildAliTround objects filtered by the secondseat column
 * @method     ChildAliTround[]|ObjectCollection findByRincrease(string $rincrease) Return ChildAliTround objects filtered by the rincrease column
 * @method     ChildAliTround[]|ObjectCollection findByRurl(string $rurl) Return ChildAliTround objects filtered by the rurl column
 * @method     ChildAliTround[]|ObjectCollection findByRemark(string $remark) Return ChildAliTround objects filtered by the remark column
 * @method     ChildAliTround[]|ObjectCollection findByCalc(string $calc) Return ChildAliTround objects filtered by the calc column
 * @method     ChildAliTround[]|ObjectCollection findByCalcDate(string $calc_date) Return ChildAliTround objects filtered by the calc_date column
 * @method     ChildAliTround[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliTroundQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliTroundQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliTround', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliTroundQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliTroundQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliTroundQuery) {
            return $criteria;
        }
        $query = new ChildAliTroundQuery();
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
     * @return ChildAliTround|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliTround object has no primary key');
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
        throw new LogicException('The AliTround object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliTround object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliTround object has no primary key');
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
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTroundTableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the rname column
     *
     * Example usage:
     * <code>
     * $query->filterByRname('fooValue');   // WHERE rname = 'fooValue'
     * $query->filterByRname('%fooValue%', Criteria::LIKE); // WHERE rname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByRname($rname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTroundTableMap::COL_RNAME, $rname, $comparison);
    }

    /**
     * Filter the query on the detail column
     *
     * Example usage:
     * <code>
     * $query->filterByDetail('fooValue');   // WHERE detail = 'fooValue'
     * $query->filterByDetail('%fooValue%', Criteria::LIKE); // WHERE detail LIKE '%fooValue%'
     * </code>
     *
     * @param     string $detail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByDetail($detail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($detail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTroundTableMap::COL_DETAIL, $detail, $comparison);
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
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTroundTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTroundTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the rtype column
     *
     * Example usage:
     * <code>
     * $query->filterByRtype(1234); // WHERE rtype = 1234
     * $query->filterByRtype(array(12, 34)); // WHERE rtype IN (12, 34)
     * $query->filterByRtype(array('min' => 12)); // WHERE rtype > 12
     * </code>
     *
     * @param     mixed $rtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByRtype($rtype = null, $comparison = null)
    {
        if (is_array($rtype)) {
            $useMinMax = false;
            if (isset($rtype['min'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_RTYPE, $rtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rtype['max'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_RTYPE, $rtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTroundTableMap::COL_RTYPE, $rtype, $comparison);
    }

    /**
     * Filter the query on the firstseat column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstseat(1234); // WHERE firstseat = 1234
     * $query->filterByFirstseat(array(12, 34)); // WHERE firstseat IN (12, 34)
     * $query->filterByFirstseat(array('min' => 12)); // WHERE firstseat > 12
     * </code>
     *
     * @param     mixed $firstseat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByFirstseat($firstseat = null, $comparison = null)
    {
        if (is_array($firstseat)) {
            $useMinMax = false;
            if (isset($firstseat['min'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_FIRSTSEAT, $firstseat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($firstseat['max'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_FIRSTSEAT, $firstseat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTroundTableMap::COL_FIRSTSEAT, $firstseat, $comparison);
    }

    /**
     * Filter the query on the secondseat column
     *
     * Example usage:
     * <code>
     * $query->filterBySecondseat(1234); // WHERE secondseat = 1234
     * $query->filterBySecondseat(array(12, 34)); // WHERE secondseat IN (12, 34)
     * $query->filterBySecondseat(array('min' => 12)); // WHERE secondseat > 12
     * </code>
     *
     * @param     mixed $secondseat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterBySecondseat($secondseat = null, $comparison = null)
    {
        if (is_array($secondseat)) {
            $useMinMax = false;
            if (isset($secondseat['min'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_SECONDSEAT, $secondseat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($secondseat['max'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_SECONDSEAT, $secondseat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTroundTableMap::COL_SECONDSEAT, $secondseat, $comparison);
    }

    /**
     * Filter the query on the rincrease column
     *
     * Example usage:
     * <code>
     * $query->filterByRincrease(1234); // WHERE rincrease = 1234
     * $query->filterByRincrease(array(12, 34)); // WHERE rincrease IN (12, 34)
     * $query->filterByRincrease(array('min' => 12)); // WHERE rincrease > 12
     * </code>
     *
     * @param     mixed $rincrease The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByRincrease($rincrease = null, $comparison = null)
    {
        if (is_array($rincrease)) {
            $useMinMax = false;
            if (isset($rincrease['min'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_RINCREASE, $rincrease['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rincrease['max'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_RINCREASE, $rincrease['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTroundTableMap::COL_RINCREASE, $rincrease, $comparison);
    }

    /**
     * Filter the query on the rurl column
     *
     * Example usage:
     * <code>
     * $query->filterByRurl('fooValue');   // WHERE rurl = 'fooValue'
     * $query->filterByRurl('%fooValue%', Criteria::LIKE); // WHERE rurl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rurl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByRurl($rurl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rurl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTroundTableMap::COL_RURL, $rurl, $comparison);
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
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTroundTableMap::COL_REMARK, $remark, $comparison);
    }

    /**
     * Filter the query on the calc column
     *
     * Example usage:
     * <code>
     * $query->filterByCalc('fooValue');   // WHERE calc = 'fooValue'
     * $query->filterByCalc('%fooValue%', Criteria::LIKE); // WHERE calc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $calc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByCalc($calc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($calc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTroundTableMap::COL_CALC, $calc, $comparison);
    }

    /**
     * Filter the query on the calc_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCalcDate('2011-03-14'); // WHERE calc_date = '2011-03-14'
     * $query->filterByCalcDate('now'); // WHERE calc_date = '2011-03-14'
     * $query->filterByCalcDate(array('max' => 'yesterday')); // WHERE calc_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $calcDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function filterByCalcDate($calcDate = null, $comparison = null)
    {
        if (is_array($calcDate)) {
            $useMinMax = false;
            if (isset($calcDate['min'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_CALC_DATE, $calcDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($calcDate['max'])) {
                $this->addUsingAlias(AliTroundTableMap::COL_CALC_DATE, $calcDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTroundTableMap::COL_CALC_DATE, $calcDate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliTround $aliTround Object to remove from the list of results
     *
     * @return $this|ChildAliTroundQuery The current query, for fluid interface
     */
    public function prune($aliTround = null)
    {
        if ($aliTround) {
            throw new LogicException('AliTround object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_tround table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTroundTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliTroundTableMap::clearInstancePool();
            AliTroundTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTroundTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliTroundTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliTroundTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliTroundTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliTroundQuery
