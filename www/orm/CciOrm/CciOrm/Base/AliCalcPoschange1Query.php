<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliCalcPoschange1 as ChildAliCalcPoschange1;
use CciOrm\CciOrm\AliCalcPoschange1Query as ChildAliCalcPoschange1Query;
use CciOrm\CciOrm\Map\AliCalcPoschange1TableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_calc_poschange1' table.
 *
 *
 *
 * @method     ChildAliCalcPoschange1Query orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliCalcPoschange1Query orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliCalcPoschange1Query orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliCalcPoschange1Query orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliCalcPoschange1Query orderByPosBefore($order = Criteria::ASC) Order by the pos_before column
 * @method     ChildAliCalcPoschange1Query orderByPosAfter($order = Criteria::ASC) Order by the pos_after column
 * @method     ChildAliCalcPoschange1Query orderByDateChange($order = Criteria::ASC) Order by the date_change column
 * @method     ChildAliCalcPoschange1Query orderByDateUpdate($order = Criteria::ASC) Order by the date_update column
 * @method     ChildAliCalcPoschange1Query orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildAliCalcPoschange1Query orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliCalcPoschange1Query orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliCalcPoschange1Query orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 *
 * @method     ChildAliCalcPoschange1Query groupById() Group by the id column
 * @method     ChildAliCalcPoschange1Query groupByRcode() Group by the rcode column
 * @method     ChildAliCalcPoschange1Query groupByMcode() Group by the mcode column
 * @method     ChildAliCalcPoschange1Query groupByNameT() Group by the name_t column
 * @method     ChildAliCalcPoschange1Query groupByPosBefore() Group by the pos_before column
 * @method     ChildAliCalcPoschange1Query groupByPosAfter() Group by the pos_after column
 * @method     ChildAliCalcPoschange1Query groupByDateChange() Group by the date_change column
 * @method     ChildAliCalcPoschange1Query groupByDateUpdate() Group by the date_update column
 * @method     ChildAliCalcPoschange1Query groupByType() Group by the type column
 * @method     ChildAliCalcPoschange1Query groupByUid() Group by the uid column
 * @method     ChildAliCalcPoschange1Query groupByCrate() Group by the crate column
 * @method     ChildAliCalcPoschange1Query groupByLocationbase() Group by the locationbase column
 *
 * @method     ChildAliCalcPoschange1Query leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliCalcPoschange1Query rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliCalcPoschange1Query innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliCalcPoschange1Query leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliCalcPoschange1Query rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliCalcPoschange1Query innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliCalcPoschange1 findOne(ConnectionInterface $con = null) Return the first ChildAliCalcPoschange1 matching the query
 * @method     ChildAliCalcPoschange1 findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliCalcPoschange1 matching the query, or a new ChildAliCalcPoschange1 object populated from the query conditions when no match is found
 *
 * @method     ChildAliCalcPoschange1 findOneById(int $id) Return the first ChildAliCalcPoschange1 filtered by the id column
 * @method     ChildAliCalcPoschange1 findOneByRcode(int $rcode) Return the first ChildAliCalcPoschange1 filtered by the rcode column
 * @method     ChildAliCalcPoschange1 findOneByMcode(string $mcode) Return the first ChildAliCalcPoschange1 filtered by the mcode column
 * @method     ChildAliCalcPoschange1 findOneByNameT(string $name_t) Return the first ChildAliCalcPoschange1 filtered by the name_t column
 * @method     ChildAliCalcPoschange1 findOneByPosBefore(string $pos_before) Return the first ChildAliCalcPoschange1 filtered by the pos_before column
 * @method     ChildAliCalcPoschange1 findOneByPosAfter(string $pos_after) Return the first ChildAliCalcPoschange1 filtered by the pos_after column
 * @method     ChildAliCalcPoschange1 findOneByDateChange(string $date_change) Return the first ChildAliCalcPoschange1 filtered by the date_change column
 * @method     ChildAliCalcPoschange1 findOneByDateUpdate(string $date_update) Return the first ChildAliCalcPoschange1 filtered by the date_update column
 * @method     ChildAliCalcPoschange1 findOneByType(string $type) Return the first ChildAliCalcPoschange1 filtered by the type column
 * @method     ChildAliCalcPoschange1 findOneByUid(string $uid) Return the first ChildAliCalcPoschange1 filtered by the uid column
 * @method     ChildAliCalcPoschange1 findOneByCrate(string $crate) Return the first ChildAliCalcPoschange1 filtered by the crate column
 * @method     ChildAliCalcPoschange1 findOneByLocationbase(int $locationbase) Return the first ChildAliCalcPoschange1 filtered by the locationbase column *

 * @method     ChildAliCalcPoschange1 requirePk($key, ConnectionInterface $con = null) Return the ChildAliCalcPoschange1 by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange1 requireOne(ConnectionInterface $con = null) Return the first ChildAliCalcPoschange1 matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCalcPoschange1 requireOneById(int $id) Return the first ChildAliCalcPoschange1 filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange1 requireOneByRcode(int $rcode) Return the first ChildAliCalcPoschange1 filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange1 requireOneByMcode(string $mcode) Return the first ChildAliCalcPoschange1 filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange1 requireOneByNameT(string $name_t) Return the first ChildAliCalcPoschange1 filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange1 requireOneByPosBefore(string $pos_before) Return the first ChildAliCalcPoschange1 filtered by the pos_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange1 requireOneByPosAfter(string $pos_after) Return the first ChildAliCalcPoschange1 filtered by the pos_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange1 requireOneByDateChange(string $date_change) Return the first ChildAliCalcPoschange1 filtered by the date_change column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange1 requireOneByDateUpdate(string $date_update) Return the first ChildAliCalcPoschange1 filtered by the date_update column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange1 requireOneByType(string $type) Return the first ChildAliCalcPoschange1 filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange1 requireOneByUid(string $uid) Return the first ChildAliCalcPoschange1 filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange1 requireOneByCrate(string $crate) Return the first ChildAliCalcPoschange1 filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange1 requireOneByLocationbase(int $locationbase) Return the first ChildAliCalcPoschange1 filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCalcPoschange1[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliCalcPoschange1 objects based on current ModelCriteria
 * @method     ChildAliCalcPoschange1[]|ObjectCollection findById(int $id) Return ChildAliCalcPoschange1 objects filtered by the id column
 * @method     ChildAliCalcPoschange1[]|ObjectCollection findByRcode(int $rcode) Return ChildAliCalcPoschange1 objects filtered by the rcode column
 * @method     ChildAliCalcPoschange1[]|ObjectCollection findByMcode(string $mcode) Return ChildAliCalcPoschange1 objects filtered by the mcode column
 * @method     ChildAliCalcPoschange1[]|ObjectCollection findByNameT(string $name_t) Return ChildAliCalcPoschange1 objects filtered by the name_t column
 * @method     ChildAliCalcPoschange1[]|ObjectCollection findByPosBefore(string $pos_before) Return ChildAliCalcPoschange1 objects filtered by the pos_before column
 * @method     ChildAliCalcPoschange1[]|ObjectCollection findByPosAfter(string $pos_after) Return ChildAliCalcPoschange1 objects filtered by the pos_after column
 * @method     ChildAliCalcPoschange1[]|ObjectCollection findByDateChange(string $date_change) Return ChildAliCalcPoschange1 objects filtered by the date_change column
 * @method     ChildAliCalcPoschange1[]|ObjectCollection findByDateUpdate(string $date_update) Return ChildAliCalcPoschange1 objects filtered by the date_update column
 * @method     ChildAliCalcPoschange1[]|ObjectCollection findByType(string $type) Return ChildAliCalcPoschange1 objects filtered by the type column
 * @method     ChildAliCalcPoschange1[]|ObjectCollection findByUid(string $uid) Return ChildAliCalcPoschange1 objects filtered by the uid column
 * @method     ChildAliCalcPoschange1[]|ObjectCollection findByCrate(string $crate) Return ChildAliCalcPoschange1 objects filtered by the crate column
 * @method     ChildAliCalcPoschange1[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliCalcPoschange1 objects filtered by the locationbase column
 * @method     ChildAliCalcPoschange1[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliCalcPoschange1Query extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliCalcPoschange1Query object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliCalcPoschange1', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliCalcPoschange1Query object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliCalcPoschange1Query
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliCalcPoschange1Query) {
            return $criteria;
        }
        $query = new ChildAliCalcPoschange1Query();
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
     * @return ChildAliCalcPoschange1|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliCalcPoschange1TableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliCalcPoschange1TableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliCalcPoschange1 A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, mcode, name_t, pos_before, pos_after, date_change, date_update, type, uid, crate, locationbase FROM ali_calc_poschange1 WHERE id = :p0';
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
            /** @var ChildAliCalcPoschange1 $obj */
            $obj = new ChildAliCalcPoschange1();
            $obj->hydrate($row);
            AliCalcPoschange1TableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliCalcPoschange1|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliCalcPoschange1TableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliCalcPoschange1TableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliCalcPoschange1TableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliCalcPoschange1TableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_NAME_T, $nameT, $comparison);
    }

    /**
     * Filter the query on the pos_before column
     *
     * Example usage:
     * <code>
     * $query->filterByPosBefore('fooValue');   // WHERE pos_before = 'fooValue'
     * $query->filterByPosBefore('%fooValue%', Criteria::LIKE); // WHERE pos_before LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posBefore The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterByPosBefore($posBefore = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posBefore)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_POS_BEFORE, $posBefore, $comparison);
    }

    /**
     * Filter the query on the pos_after column
     *
     * Example usage:
     * <code>
     * $query->filterByPosAfter('fooValue');   // WHERE pos_after = 'fooValue'
     * $query->filterByPosAfter('%fooValue%', Criteria::LIKE); // WHERE pos_after LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posAfter The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterByPosAfter($posAfter = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posAfter)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_POS_AFTER, $posAfter, $comparison);
    }

    /**
     * Filter the query on the date_change column
     *
     * Example usage:
     * <code>
     * $query->filterByDateChange('2011-03-14'); // WHERE date_change = '2011-03-14'
     * $query->filterByDateChange('now'); // WHERE date_change = '2011-03-14'
     * $query->filterByDateChange(array('max' => 'yesterday')); // WHERE date_change > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateChange The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterByDateChange($dateChange = null, $comparison = null)
    {
        if (is_array($dateChange)) {
            $useMinMax = false;
            if (isset($dateChange['min'])) {
                $this->addUsingAlias(AliCalcPoschange1TableMap::COL_DATE_CHANGE, $dateChange['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateChange['max'])) {
                $this->addUsingAlias(AliCalcPoschange1TableMap::COL_DATE_CHANGE, $dateChange['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_DATE_CHANGE, $dateChange, $comparison);
    }

    /**
     * Filter the query on the date_update column
     *
     * Example usage:
     * <code>
     * $query->filterByDateUpdate('2011-03-14'); // WHERE date_update = '2011-03-14'
     * $query->filterByDateUpdate('now'); // WHERE date_update = '2011-03-14'
     * $query->filterByDateUpdate(array('max' => 'yesterday')); // WHERE date_update > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateUpdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterByDateUpdate($dateUpdate = null, $comparison = null)
    {
        if (is_array($dateUpdate)) {
            $useMinMax = false;
            if (isset($dateUpdate['min'])) {
                $this->addUsingAlias(AliCalcPoschange1TableMap::COL_DATE_UPDATE, $dateUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateUpdate['max'])) {
                $this->addUsingAlias(AliCalcPoschange1TableMap::COL_DATE_UPDATE, $dateUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_DATE_UPDATE, $dateUpdate, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliCalcPoschange1TableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliCalcPoschange1TableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliCalcPoschange1TableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliCalcPoschange1TableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange1TableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliCalcPoschange1 $aliCalcPoschange1 Object to remove from the list of results
     *
     * @return $this|ChildAliCalcPoschange1Query The current query, for fluid interface
     */
    public function prune($aliCalcPoschange1 = null)
    {
        if ($aliCalcPoschange1) {
            $this->addUsingAlias(AliCalcPoschange1TableMap::COL_ID, $aliCalcPoschange1->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_calc_poschange1 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCalcPoschange1TableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliCalcPoschange1TableMap::clearInstancePool();
            AliCalcPoschange1TableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCalcPoschange1TableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliCalcPoschange1TableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliCalcPoschange1TableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliCalcPoschange1TableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliCalcPoschange1Query
