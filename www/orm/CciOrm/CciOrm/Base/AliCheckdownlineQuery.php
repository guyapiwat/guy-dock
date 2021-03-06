<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliCheckdownline as ChildAliCheckdownline;
use CciOrm\CciOrm\AliCheckdownlineQuery as ChildAliCheckdownlineQuery;
use CciOrm\CciOrm\Map\AliCheckdownlineTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_checkdownline' table.
 *
 *
 *
 * @method     ChildAliCheckdownlineQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliCheckdownlineQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliCheckdownlineQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliCheckdownlineQuery orderByFast($order = Criteria::ASC) Order by the fast column
 * @method     ChildAliCheckdownlineQuery orderByWeakstrong($order = Criteria::ASC) Order by the weakstrong column
 * @method     ChildAliCheckdownlineQuery orderByMatching($order = Criteria::ASC) Order by the matching column
 * @method     ChildAliCheckdownlineQuery orderByStar($order = Criteria::ASC) Order by the star column
 * @method     ChildAliCheckdownlineQuery orderByOnetime($order = Criteria::ASC) Order by the onetime column
 * @method     ChildAliCheckdownlineQuery orderByAlltotal($order = Criteria::ASC) Order by the alltotal column
 * @method     ChildAliCheckdownlineQuery orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliCheckdownlineQuery orderByLv($order = Criteria::ASC) Order by the lv column
 * @method     ChildAliCheckdownlineQuery orderByLr($order = Criteria::ASC) Order by the lr column
 * @method     ChildAliCheckdownlineQuery orderByMdate($order = Criteria::ASC) Order by the mdate column
 * @method     ChildAliCheckdownlineQuery orderByIdCard($order = Criteria::ASC) Order by the id_card column
 *
 * @method     ChildAliCheckdownlineQuery groupByMcode() Group by the mcode column
 * @method     ChildAliCheckdownlineQuery groupByNameT() Group by the name_t column
 * @method     ChildAliCheckdownlineQuery groupByTotal() Group by the total column
 * @method     ChildAliCheckdownlineQuery groupByFast() Group by the fast column
 * @method     ChildAliCheckdownlineQuery groupByWeakstrong() Group by the weakstrong column
 * @method     ChildAliCheckdownlineQuery groupByMatching() Group by the matching column
 * @method     ChildAliCheckdownlineQuery groupByStar() Group by the star column
 * @method     ChildAliCheckdownlineQuery groupByOnetime() Group by the onetime column
 * @method     ChildAliCheckdownlineQuery groupByAlltotal() Group by the alltotal column
 * @method     ChildAliCheckdownlineQuery groupByUpaCode() Group by the upa_code column
 * @method     ChildAliCheckdownlineQuery groupByLv() Group by the lv column
 * @method     ChildAliCheckdownlineQuery groupByLr() Group by the lr column
 * @method     ChildAliCheckdownlineQuery groupByMdate() Group by the mdate column
 * @method     ChildAliCheckdownlineQuery groupByIdCard() Group by the id_card column
 *
 * @method     ChildAliCheckdownlineQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliCheckdownlineQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliCheckdownlineQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliCheckdownlineQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliCheckdownlineQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliCheckdownlineQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliCheckdownline findOne(ConnectionInterface $con = null) Return the first ChildAliCheckdownline matching the query
 * @method     ChildAliCheckdownline findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliCheckdownline matching the query, or a new ChildAliCheckdownline object populated from the query conditions when no match is found
 *
 * @method     ChildAliCheckdownline findOneByMcode(string $mcode) Return the first ChildAliCheckdownline filtered by the mcode column
 * @method     ChildAliCheckdownline findOneByNameT(string $name_t) Return the first ChildAliCheckdownline filtered by the name_t column
 * @method     ChildAliCheckdownline findOneByTotal(string $total) Return the first ChildAliCheckdownline filtered by the total column
 * @method     ChildAliCheckdownline findOneByFast(string $fast) Return the first ChildAliCheckdownline filtered by the fast column
 * @method     ChildAliCheckdownline findOneByWeakstrong(string $weakstrong) Return the first ChildAliCheckdownline filtered by the weakstrong column
 * @method     ChildAliCheckdownline findOneByMatching(string $matching) Return the first ChildAliCheckdownline filtered by the matching column
 * @method     ChildAliCheckdownline findOneByStar(string $star) Return the first ChildAliCheckdownline filtered by the star column
 * @method     ChildAliCheckdownline findOneByOnetime(string $onetime) Return the first ChildAliCheckdownline filtered by the onetime column
 * @method     ChildAliCheckdownline findOneByAlltotal(string $alltotal) Return the first ChildAliCheckdownline filtered by the alltotal column
 * @method     ChildAliCheckdownline findOneByUpaCode(string $upa_code) Return the first ChildAliCheckdownline filtered by the upa_code column
 * @method     ChildAliCheckdownline findOneByLv(int $lv) Return the first ChildAliCheckdownline filtered by the lv column
 * @method     ChildAliCheckdownline findOneByLr(int $lr) Return the first ChildAliCheckdownline filtered by the lr column
 * @method     ChildAliCheckdownline findOneByMdate(string $mdate) Return the first ChildAliCheckdownline filtered by the mdate column
 * @method     ChildAliCheckdownline findOneByIdCard(string $id_card) Return the first ChildAliCheckdownline filtered by the id_card column *

 * @method     ChildAliCheckdownline requirePk($key, ConnectionInterface $con = null) Return the ChildAliCheckdownline by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOne(ConnectionInterface $con = null) Return the first ChildAliCheckdownline matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCheckdownline requireOneByMcode(string $mcode) Return the first ChildAliCheckdownline filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOneByNameT(string $name_t) Return the first ChildAliCheckdownline filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOneByTotal(string $total) Return the first ChildAliCheckdownline filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOneByFast(string $fast) Return the first ChildAliCheckdownline filtered by the fast column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOneByWeakstrong(string $weakstrong) Return the first ChildAliCheckdownline filtered by the weakstrong column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOneByMatching(string $matching) Return the first ChildAliCheckdownline filtered by the matching column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOneByStar(string $star) Return the first ChildAliCheckdownline filtered by the star column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOneByOnetime(string $onetime) Return the first ChildAliCheckdownline filtered by the onetime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOneByAlltotal(string $alltotal) Return the first ChildAliCheckdownline filtered by the alltotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOneByUpaCode(string $upa_code) Return the first ChildAliCheckdownline filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOneByLv(int $lv) Return the first ChildAliCheckdownline filtered by the lv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOneByLr(int $lr) Return the first ChildAliCheckdownline filtered by the lr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOneByMdate(string $mdate) Return the first ChildAliCheckdownline filtered by the mdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCheckdownline requireOneByIdCard(string $id_card) Return the first ChildAliCheckdownline filtered by the id_card column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCheckdownline[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliCheckdownline objects based on current ModelCriteria
 * @method     ChildAliCheckdownline[]|ObjectCollection findByMcode(string $mcode) Return ChildAliCheckdownline objects filtered by the mcode column
 * @method     ChildAliCheckdownline[]|ObjectCollection findByNameT(string $name_t) Return ChildAliCheckdownline objects filtered by the name_t column
 * @method     ChildAliCheckdownline[]|ObjectCollection findByTotal(string $total) Return ChildAliCheckdownline objects filtered by the total column
 * @method     ChildAliCheckdownline[]|ObjectCollection findByFast(string $fast) Return ChildAliCheckdownline objects filtered by the fast column
 * @method     ChildAliCheckdownline[]|ObjectCollection findByWeakstrong(string $weakstrong) Return ChildAliCheckdownline objects filtered by the weakstrong column
 * @method     ChildAliCheckdownline[]|ObjectCollection findByMatching(string $matching) Return ChildAliCheckdownline objects filtered by the matching column
 * @method     ChildAliCheckdownline[]|ObjectCollection findByStar(string $star) Return ChildAliCheckdownline objects filtered by the star column
 * @method     ChildAliCheckdownline[]|ObjectCollection findByOnetime(string $onetime) Return ChildAliCheckdownline objects filtered by the onetime column
 * @method     ChildAliCheckdownline[]|ObjectCollection findByAlltotal(string $alltotal) Return ChildAliCheckdownline objects filtered by the alltotal column
 * @method     ChildAliCheckdownline[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliCheckdownline objects filtered by the upa_code column
 * @method     ChildAliCheckdownline[]|ObjectCollection findByLv(int $lv) Return ChildAliCheckdownline objects filtered by the lv column
 * @method     ChildAliCheckdownline[]|ObjectCollection findByLr(int $lr) Return ChildAliCheckdownline objects filtered by the lr column
 * @method     ChildAliCheckdownline[]|ObjectCollection findByMdate(string $mdate) Return ChildAliCheckdownline objects filtered by the mdate column
 * @method     ChildAliCheckdownline[]|ObjectCollection findByIdCard(string $id_card) Return ChildAliCheckdownline objects filtered by the id_card column
 * @method     ChildAliCheckdownline[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliCheckdownlineQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliCheckdownlineQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliCheckdownline', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliCheckdownlineQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliCheckdownlineQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliCheckdownlineQuery) {
            return $criteria;
        }
        $query = new ChildAliCheckdownlineQuery();
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
     * @return ChildAliCheckdownline|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliCheckdownline object has no primary key');
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
        throw new LogicException('The AliCheckdownline object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliCheckdownline object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliCheckdownline object has no primary key');
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
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the fast column
     *
     * Example usage:
     * <code>
     * $query->filterByFast(1234); // WHERE fast = 1234
     * $query->filterByFast(array(12, 34)); // WHERE fast IN (12, 34)
     * $query->filterByFast(array('min' => 12)); // WHERE fast > 12
     * </code>
     *
     * @param     mixed $fast The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByFast($fast = null, $comparison = null)
    {
        if (is_array($fast)) {
            $useMinMax = false;
            if (isset($fast['min'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_FAST, $fast['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fast['max'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_FAST, $fast['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_FAST, $fast, $comparison);
    }

    /**
     * Filter the query on the weakstrong column
     *
     * Example usage:
     * <code>
     * $query->filterByWeakstrong(1234); // WHERE weakstrong = 1234
     * $query->filterByWeakstrong(array(12, 34)); // WHERE weakstrong IN (12, 34)
     * $query->filterByWeakstrong(array('min' => 12)); // WHERE weakstrong > 12
     * </code>
     *
     * @param     mixed $weakstrong The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByWeakstrong($weakstrong = null, $comparison = null)
    {
        if (is_array($weakstrong)) {
            $useMinMax = false;
            if (isset($weakstrong['min'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_WEAKSTRONG, $weakstrong['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weakstrong['max'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_WEAKSTRONG, $weakstrong['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_WEAKSTRONG, $weakstrong, $comparison);
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
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByMatching($matching = null, $comparison = null)
    {
        if (is_array($matching)) {
            $useMinMax = false;
            if (isset($matching['min'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_MATCHING, $matching['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($matching['max'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_MATCHING, $matching['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_MATCHING, $matching, $comparison);
    }

    /**
     * Filter the query on the star column
     *
     * Example usage:
     * <code>
     * $query->filterByStar(1234); // WHERE star = 1234
     * $query->filterByStar(array(12, 34)); // WHERE star IN (12, 34)
     * $query->filterByStar(array('min' => 12)); // WHERE star > 12
     * </code>
     *
     * @param     mixed $star The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByStar($star = null, $comparison = null)
    {
        if (is_array($star)) {
            $useMinMax = false;
            if (isset($star['min'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_STAR, $star['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($star['max'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_STAR, $star['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_STAR, $star, $comparison);
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
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByOnetime($onetime = null, $comparison = null)
    {
        if (is_array($onetime)) {
            $useMinMax = false;
            if (isset($onetime['min'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_ONETIME, $onetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($onetime['max'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_ONETIME, $onetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_ONETIME, $onetime, $comparison);
    }

    /**
     * Filter the query on the alltotal column
     *
     * Example usage:
     * <code>
     * $query->filterByAlltotal(1234); // WHERE alltotal = 1234
     * $query->filterByAlltotal(array(12, 34)); // WHERE alltotal IN (12, 34)
     * $query->filterByAlltotal(array('min' => 12)); // WHERE alltotal > 12
     * </code>
     *
     * @param     mixed $alltotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByAlltotal($alltotal = null, $comparison = null)
    {
        if (is_array($alltotal)) {
            $useMinMax = false;
            if (isset($alltotal['min'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_ALLTOTAL, $alltotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($alltotal['max'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_ALLTOTAL, $alltotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_ALLTOTAL, $alltotal, $comparison);
    }

    /**
     * Filter the query on the upa_code column
     *
     * Example usage:
     * <code>
     * $query->filterByUpaCode('fooValue');   // WHERE upa_code = 'fooValue'
     * $query->filterByUpaCode('%fooValue%', Criteria::LIKE); // WHERE upa_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $upaCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_UPA_CODE, $upaCode, $comparison);
    }

    /**
     * Filter the query on the lv column
     *
     * Example usage:
     * <code>
     * $query->filterByLv(1234); // WHERE lv = 1234
     * $query->filterByLv(array(12, 34)); // WHERE lv IN (12, 34)
     * $query->filterByLv(array('min' => 12)); // WHERE lv > 12
     * </code>
     *
     * @param     mixed $lv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByLv($lv = null, $comparison = null)
    {
        if (is_array($lv)) {
            $useMinMax = false;
            if (isset($lv['min'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_LV, $lv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lv['max'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_LV, $lv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_LV, $lv, $comparison);
    }

    /**
     * Filter the query on the lr column
     *
     * Example usage:
     * <code>
     * $query->filterByLr(1234); // WHERE lr = 1234
     * $query->filterByLr(array(12, 34)); // WHERE lr IN (12, 34)
     * $query->filterByLr(array('min' => 12)); // WHERE lr > 12
     * </code>
     *
     * @param     mixed $lr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByLr($lr = null, $comparison = null)
    {
        if (is_array($lr)) {
            $useMinMax = false;
            if (isset($lr['min'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_LR, $lr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lr['max'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_LR, $lr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_LR, $lr, $comparison);
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
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByMdate($mdate = null, $comparison = null)
    {
        if (is_array($mdate)) {
            $useMinMax = false;
            if (isset($mdate['min'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_MDATE, $mdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mdate['max'])) {
                $this->addUsingAlias(AliCheckdownlineTableMap::COL_MDATE, $mdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_MDATE, $mdate, $comparison);
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
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function filterByIdCard($idCard = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idCard)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCheckdownlineTableMap::COL_ID_CARD, $idCard, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliCheckdownline $aliCheckdownline Object to remove from the list of results
     *
     * @return $this|ChildAliCheckdownlineQuery The current query, for fluid interface
     */
    public function prune($aliCheckdownline = null)
    {
        if ($aliCheckdownline) {
            throw new LogicException('AliCheckdownline object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_checkdownline table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCheckdownlineTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliCheckdownlineTableMap::clearInstancePool();
            AliCheckdownlineTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCheckdownlineTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliCheckdownlineTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliCheckdownlineTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliCheckdownlineTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliCheckdownlineQuery
