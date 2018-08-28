<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliBinaryNewpoint as ChildAliBinaryNewpoint;
use CciOrm\CciOrm\AliBinaryNewpointQuery as ChildAliBinaryNewpointQuery;
use CciOrm\CciOrm\Map\AliBinaryNewpointTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_binary_newpoint' table.
 *
 *
 *
 * @method     ChildAliBinaryNewpointQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliBinaryNewpointQuery orderBySpCode($order = Criteria::ASC) Order by the sp_code column
 * @method     ChildAliBinaryNewpointQuery orderByMonth($order = Criteria::ASC) Order by the month column
 * @method     ChildAliBinaryNewpointQuery orderByMdate($order = Criteria::ASC) Order by the mdate column
 * @method     ChildAliBinaryNewpointQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliBinaryNewpointQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliBinaryNewpointQuery orderByPointLeft($order = Criteria::ASC) Order by the point_left column
 * @method     ChildAliBinaryNewpointQuery orderByPointRight($order = Criteria::ASC) Order by the point_right column
 * @method     ChildAliBinaryNewpointQuery orderByPointAll($order = Criteria::ASC) Order by the point_all column
 * @method     ChildAliBinaryNewpointQuery orderByUid($order = Criteria::ASC) Order by the uid column
 *
 * @method     ChildAliBinaryNewpointQuery groupByMcode() Group by the mcode column
 * @method     ChildAliBinaryNewpointQuery groupBySpCode() Group by the sp_code column
 * @method     ChildAliBinaryNewpointQuery groupByMonth() Group by the month column
 * @method     ChildAliBinaryNewpointQuery groupByMdate() Group by the mdate column
 * @method     ChildAliBinaryNewpointQuery groupById() Group by the id column
 * @method     ChildAliBinaryNewpointQuery groupByNameT() Group by the name_t column
 * @method     ChildAliBinaryNewpointQuery groupByPointLeft() Group by the point_left column
 * @method     ChildAliBinaryNewpointQuery groupByPointRight() Group by the point_right column
 * @method     ChildAliBinaryNewpointQuery groupByPointAll() Group by the point_all column
 * @method     ChildAliBinaryNewpointQuery groupByUid() Group by the uid column
 *
 * @method     ChildAliBinaryNewpointQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliBinaryNewpointQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliBinaryNewpointQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliBinaryNewpointQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliBinaryNewpointQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliBinaryNewpointQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliBinaryNewpoint findOne(ConnectionInterface $con = null) Return the first ChildAliBinaryNewpoint matching the query
 * @method     ChildAliBinaryNewpoint findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliBinaryNewpoint matching the query, or a new ChildAliBinaryNewpoint object populated from the query conditions when no match is found
 *
 * @method     ChildAliBinaryNewpoint findOneByMcode(string $mcode) Return the first ChildAliBinaryNewpoint filtered by the mcode column
 * @method     ChildAliBinaryNewpoint findOneBySpCode(string $sp_code) Return the first ChildAliBinaryNewpoint filtered by the sp_code column
 * @method     ChildAliBinaryNewpoint findOneByMonth(string $month) Return the first ChildAliBinaryNewpoint filtered by the month column
 * @method     ChildAliBinaryNewpoint findOneByMdate(string $mdate) Return the first ChildAliBinaryNewpoint filtered by the mdate column
 * @method     ChildAliBinaryNewpoint findOneById(int $id) Return the first ChildAliBinaryNewpoint filtered by the id column
 * @method     ChildAliBinaryNewpoint findOneByNameT(string $name_t) Return the first ChildAliBinaryNewpoint filtered by the name_t column
 * @method     ChildAliBinaryNewpoint findOneByPointLeft(string $point_left) Return the first ChildAliBinaryNewpoint filtered by the point_left column
 * @method     ChildAliBinaryNewpoint findOneByPointRight(string $point_right) Return the first ChildAliBinaryNewpoint filtered by the point_right column
 * @method     ChildAliBinaryNewpoint findOneByPointAll(string $point_all) Return the first ChildAliBinaryNewpoint filtered by the point_all column
 * @method     ChildAliBinaryNewpoint findOneByUid(string $uid) Return the first ChildAliBinaryNewpoint filtered by the uid column *

 * @method     ChildAliBinaryNewpoint requirePk($key, ConnectionInterface $con = null) Return the ChildAliBinaryNewpoint by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryNewpoint requireOne(ConnectionInterface $con = null) Return the first ChildAliBinaryNewpoint matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBinaryNewpoint requireOneByMcode(string $mcode) Return the first ChildAliBinaryNewpoint filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryNewpoint requireOneBySpCode(string $sp_code) Return the first ChildAliBinaryNewpoint filtered by the sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryNewpoint requireOneByMonth(string $month) Return the first ChildAliBinaryNewpoint filtered by the month column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryNewpoint requireOneByMdate(string $mdate) Return the first ChildAliBinaryNewpoint filtered by the mdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryNewpoint requireOneById(int $id) Return the first ChildAliBinaryNewpoint filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryNewpoint requireOneByNameT(string $name_t) Return the first ChildAliBinaryNewpoint filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryNewpoint requireOneByPointLeft(string $point_left) Return the first ChildAliBinaryNewpoint filtered by the point_left column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryNewpoint requireOneByPointRight(string $point_right) Return the first ChildAliBinaryNewpoint filtered by the point_right column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryNewpoint requireOneByPointAll(string $point_all) Return the first ChildAliBinaryNewpoint filtered by the point_all column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryNewpoint requireOneByUid(string $uid) Return the first ChildAliBinaryNewpoint filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBinaryNewpoint[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliBinaryNewpoint objects based on current ModelCriteria
 * @method     ChildAliBinaryNewpoint[]|ObjectCollection findByMcode(string $mcode) Return ChildAliBinaryNewpoint objects filtered by the mcode column
 * @method     ChildAliBinaryNewpoint[]|ObjectCollection findBySpCode(string $sp_code) Return ChildAliBinaryNewpoint objects filtered by the sp_code column
 * @method     ChildAliBinaryNewpoint[]|ObjectCollection findByMonth(string $month) Return ChildAliBinaryNewpoint objects filtered by the month column
 * @method     ChildAliBinaryNewpoint[]|ObjectCollection findByMdate(string $mdate) Return ChildAliBinaryNewpoint objects filtered by the mdate column
 * @method     ChildAliBinaryNewpoint[]|ObjectCollection findById(int $id) Return ChildAliBinaryNewpoint objects filtered by the id column
 * @method     ChildAliBinaryNewpoint[]|ObjectCollection findByNameT(string $name_t) Return ChildAliBinaryNewpoint objects filtered by the name_t column
 * @method     ChildAliBinaryNewpoint[]|ObjectCollection findByPointLeft(string $point_left) Return ChildAliBinaryNewpoint objects filtered by the point_left column
 * @method     ChildAliBinaryNewpoint[]|ObjectCollection findByPointRight(string $point_right) Return ChildAliBinaryNewpoint objects filtered by the point_right column
 * @method     ChildAliBinaryNewpoint[]|ObjectCollection findByPointAll(string $point_all) Return ChildAliBinaryNewpoint objects filtered by the point_all column
 * @method     ChildAliBinaryNewpoint[]|ObjectCollection findByUid(string $uid) Return ChildAliBinaryNewpoint objects filtered by the uid column
 * @method     ChildAliBinaryNewpoint[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliBinaryNewpointQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliBinaryNewpointQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliBinaryNewpoint', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliBinaryNewpointQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliBinaryNewpointQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliBinaryNewpointQuery) {
            return $criteria;
        }
        $query = new ChildAliBinaryNewpointQuery();
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
     * @return ChildAliBinaryNewpoint|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliBinaryNewpointTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliBinaryNewpointTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliBinaryNewpoint A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT mcode, sp_code, month, mdate, id, name_t, point_left, point_right, point_all, uid FROM ali_binary_newpoint WHERE id = :p0';
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
            /** @var ChildAliBinaryNewpoint $obj */
            $obj = new ChildAliBinaryNewpoint();
            $obj->hydrate($row);
            AliBinaryNewpointTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliBinaryNewpoint|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliBinaryNewpointQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliBinaryNewpointTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliBinaryNewpointQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliBinaryNewpointTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliBinaryNewpointQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryNewpointTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliBinaryNewpointQuery The current query, for fluid interface
     */
    public function filterBySpCode($spCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryNewpointTableMap::COL_SP_CODE, $spCode, $comparison);
    }

    /**
     * Filter the query on the month column
     *
     * Example usage:
     * <code>
     * $query->filterByMonth('fooValue');   // WHERE month = 'fooValue'
     * $query->filterByMonth('%fooValue%', Criteria::LIKE); // WHERE month LIKE '%fooValue%'
     * </code>
     *
     * @param     string $month The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBinaryNewpointQuery The current query, for fluid interface
     */
    public function filterByMonth($month = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($month)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryNewpointTableMap::COL_MONTH, $month, $comparison);
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
     * @return $this|ChildAliBinaryNewpointQuery The current query, for fluid interface
     */
    public function filterByMdate($mdate = null, $comparison = null)
    {
        if (is_array($mdate)) {
            $useMinMax = false;
            if (isset($mdate['min'])) {
                $this->addUsingAlias(AliBinaryNewpointTableMap::COL_MDATE, $mdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mdate['max'])) {
                $this->addUsingAlias(AliBinaryNewpointTableMap::COL_MDATE, $mdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryNewpointTableMap::COL_MDATE, $mdate, $comparison);
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
     * @return $this|ChildAliBinaryNewpointQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliBinaryNewpointTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliBinaryNewpointTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryNewpointTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliBinaryNewpointQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryNewpointTableMap::COL_NAME_T, $nameT, $comparison);
    }

    /**
     * Filter the query on the point_left column
     *
     * Example usage:
     * <code>
     * $query->filterByPointLeft(1234); // WHERE point_left = 1234
     * $query->filterByPointLeft(array(12, 34)); // WHERE point_left IN (12, 34)
     * $query->filterByPointLeft(array('min' => 12)); // WHERE point_left > 12
     * </code>
     *
     * @param     mixed $pointLeft The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBinaryNewpointQuery The current query, for fluid interface
     */
    public function filterByPointLeft($pointLeft = null, $comparison = null)
    {
        if (is_array($pointLeft)) {
            $useMinMax = false;
            if (isset($pointLeft['min'])) {
                $this->addUsingAlias(AliBinaryNewpointTableMap::COL_POINT_LEFT, $pointLeft['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointLeft['max'])) {
                $this->addUsingAlias(AliBinaryNewpointTableMap::COL_POINT_LEFT, $pointLeft['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryNewpointTableMap::COL_POINT_LEFT, $pointLeft, $comparison);
    }

    /**
     * Filter the query on the point_right column
     *
     * Example usage:
     * <code>
     * $query->filterByPointRight(1234); // WHERE point_right = 1234
     * $query->filterByPointRight(array(12, 34)); // WHERE point_right IN (12, 34)
     * $query->filterByPointRight(array('min' => 12)); // WHERE point_right > 12
     * </code>
     *
     * @param     mixed $pointRight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBinaryNewpointQuery The current query, for fluid interface
     */
    public function filterByPointRight($pointRight = null, $comparison = null)
    {
        if (is_array($pointRight)) {
            $useMinMax = false;
            if (isset($pointRight['min'])) {
                $this->addUsingAlias(AliBinaryNewpointTableMap::COL_POINT_RIGHT, $pointRight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointRight['max'])) {
                $this->addUsingAlias(AliBinaryNewpointTableMap::COL_POINT_RIGHT, $pointRight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryNewpointTableMap::COL_POINT_RIGHT, $pointRight, $comparison);
    }

    /**
     * Filter the query on the point_all column
     *
     * Example usage:
     * <code>
     * $query->filterByPointAll(1234); // WHERE point_all = 1234
     * $query->filterByPointAll(array(12, 34)); // WHERE point_all IN (12, 34)
     * $query->filterByPointAll(array('min' => 12)); // WHERE point_all > 12
     * </code>
     *
     * @param     mixed $pointAll The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBinaryNewpointQuery The current query, for fluid interface
     */
    public function filterByPointAll($pointAll = null, $comparison = null)
    {
        if (is_array($pointAll)) {
            $useMinMax = false;
            if (isset($pointAll['min'])) {
                $this->addUsingAlias(AliBinaryNewpointTableMap::COL_POINT_ALL, $pointAll['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pointAll['max'])) {
                $this->addUsingAlias(AliBinaryNewpointTableMap::COL_POINT_ALL, $pointAll['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryNewpointTableMap::COL_POINT_ALL, $pointAll, $comparison);
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
     * @return $this|ChildAliBinaryNewpointQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryNewpointTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliBinaryNewpoint $aliBinaryNewpoint Object to remove from the list of results
     *
     * @return $this|ChildAliBinaryNewpointQuery The current query, for fluid interface
     */
    public function prune($aliBinaryNewpoint = null)
    {
        if ($aliBinaryNewpoint) {
            $this->addUsingAlias(AliBinaryNewpointTableMap::COL_ID, $aliBinaryNewpoint->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_binary_newpoint table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBinaryNewpointTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliBinaryNewpointTableMap::clearInstancePool();
            AliBinaryNewpointTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBinaryNewpointTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliBinaryNewpointTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliBinaryNewpointTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliBinaryNewpointTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliBinaryNewpointQuery
