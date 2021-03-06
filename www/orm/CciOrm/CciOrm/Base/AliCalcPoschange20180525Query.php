<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliCalcPoschange20180525 as ChildAliCalcPoschange20180525;
use CciOrm\CciOrm\AliCalcPoschange20180525Query as ChildAliCalcPoschange20180525Query;
use CciOrm\CciOrm\Map\AliCalcPoschange20180525TableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_calc_poschange_20180525' table.
 *
 *
 *
 * @method     ChildAliCalcPoschange20180525Query orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliCalcPoschange20180525Query orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliCalcPoschange20180525Query orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliCalcPoschange20180525Query orderByPosBefore($order = Criteria::ASC) Order by the pos_before column
 * @method     ChildAliCalcPoschange20180525Query orderByPosAfter($order = Criteria::ASC) Order by the pos_after column
 * @method     ChildAliCalcPoschange20180525Query orderByDateChange($order = Criteria::ASC) Order by the date_change column
 * @method     ChildAliCalcPoschange20180525Query orderByDateUpdate($order = Criteria::ASC) Order by the date_update column
 * @method     ChildAliCalcPoschange20180525Query orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildAliCalcPoschange20180525Query orderByUpDown($order = Criteria::ASC) Order by the up_down column
 * @method     ChildAliCalcPoschange20180525Query orderByUid($order = Criteria::ASC) Order by the uid column
 *
 * @method     ChildAliCalcPoschange20180525Query groupById() Group by the id column
 * @method     ChildAliCalcPoschange20180525Query groupByRcode() Group by the rcode column
 * @method     ChildAliCalcPoschange20180525Query groupByMcode() Group by the mcode column
 * @method     ChildAliCalcPoschange20180525Query groupByPosBefore() Group by the pos_before column
 * @method     ChildAliCalcPoschange20180525Query groupByPosAfter() Group by the pos_after column
 * @method     ChildAliCalcPoschange20180525Query groupByDateChange() Group by the date_change column
 * @method     ChildAliCalcPoschange20180525Query groupByDateUpdate() Group by the date_update column
 * @method     ChildAliCalcPoschange20180525Query groupByType() Group by the type column
 * @method     ChildAliCalcPoschange20180525Query groupByUpDown() Group by the up_down column
 * @method     ChildAliCalcPoschange20180525Query groupByUid() Group by the uid column
 *
 * @method     ChildAliCalcPoschange20180525Query leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliCalcPoschange20180525Query rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliCalcPoschange20180525Query innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliCalcPoschange20180525Query leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliCalcPoschange20180525Query rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliCalcPoschange20180525Query innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliCalcPoschange20180525 findOne(ConnectionInterface $con = null) Return the first ChildAliCalcPoschange20180525 matching the query
 * @method     ChildAliCalcPoschange20180525 findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliCalcPoschange20180525 matching the query, or a new ChildAliCalcPoschange20180525 object populated from the query conditions when no match is found
 *
 * @method     ChildAliCalcPoschange20180525 findOneById(int $id) Return the first ChildAliCalcPoschange20180525 filtered by the id column
 * @method     ChildAliCalcPoschange20180525 findOneByRcode(int $rcode) Return the first ChildAliCalcPoschange20180525 filtered by the rcode column
 * @method     ChildAliCalcPoschange20180525 findOneByMcode(string $mcode) Return the first ChildAliCalcPoschange20180525 filtered by the mcode column
 * @method     ChildAliCalcPoschange20180525 findOneByPosBefore(string $pos_before) Return the first ChildAliCalcPoschange20180525 filtered by the pos_before column
 * @method     ChildAliCalcPoschange20180525 findOneByPosAfter(string $pos_after) Return the first ChildAliCalcPoschange20180525 filtered by the pos_after column
 * @method     ChildAliCalcPoschange20180525 findOneByDateChange(string $date_change) Return the first ChildAliCalcPoschange20180525 filtered by the date_change column
 * @method     ChildAliCalcPoschange20180525 findOneByDateUpdate(string $date_update) Return the first ChildAliCalcPoschange20180525 filtered by the date_update column
 * @method     ChildAliCalcPoschange20180525 findOneByType(string $type) Return the first ChildAliCalcPoschange20180525 filtered by the type column
 * @method     ChildAliCalcPoschange20180525 findOneByUpDown(string $up_down) Return the first ChildAliCalcPoschange20180525 filtered by the up_down column
 * @method     ChildAliCalcPoschange20180525 findOneByUid(string $uid) Return the first ChildAliCalcPoschange20180525 filtered by the uid column *

 * @method     ChildAliCalcPoschange20180525 requirePk($key, ConnectionInterface $con = null) Return the ChildAliCalcPoschange20180525 by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange20180525 requireOne(ConnectionInterface $con = null) Return the first ChildAliCalcPoschange20180525 matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCalcPoschange20180525 requireOneById(int $id) Return the first ChildAliCalcPoschange20180525 filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange20180525 requireOneByRcode(int $rcode) Return the first ChildAliCalcPoschange20180525 filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange20180525 requireOneByMcode(string $mcode) Return the first ChildAliCalcPoschange20180525 filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange20180525 requireOneByPosBefore(string $pos_before) Return the first ChildAliCalcPoschange20180525 filtered by the pos_before column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange20180525 requireOneByPosAfter(string $pos_after) Return the first ChildAliCalcPoschange20180525 filtered by the pos_after column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange20180525 requireOneByDateChange(string $date_change) Return the first ChildAliCalcPoschange20180525 filtered by the date_change column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange20180525 requireOneByDateUpdate(string $date_update) Return the first ChildAliCalcPoschange20180525 filtered by the date_update column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange20180525 requireOneByType(string $type) Return the first ChildAliCalcPoschange20180525 filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange20180525 requireOneByUpDown(string $up_down) Return the first ChildAliCalcPoschange20180525 filtered by the up_down column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCalcPoschange20180525 requireOneByUid(string $uid) Return the first ChildAliCalcPoschange20180525 filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCalcPoschange20180525[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliCalcPoschange20180525 objects based on current ModelCriteria
 * @method     ChildAliCalcPoschange20180525[]|ObjectCollection findById(int $id) Return ChildAliCalcPoschange20180525 objects filtered by the id column
 * @method     ChildAliCalcPoschange20180525[]|ObjectCollection findByRcode(int $rcode) Return ChildAliCalcPoschange20180525 objects filtered by the rcode column
 * @method     ChildAliCalcPoschange20180525[]|ObjectCollection findByMcode(string $mcode) Return ChildAliCalcPoschange20180525 objects filtered by the mcode column
 * @method     ChildAliCalcPoschange20180525[]|ObjectCollection findByPosBefore(string $pos_before) Return ChildAliCalcPoschange20180525 objects filtered by the pos_before column
 * @method     ChildAliCalcPoschange20180525[]|ObjectCollection findByPosAfter(string $pos_after) Return ChildAliCalcPoschange20180525 objects filtered by the pos_after column
 * @method     ChildAliCalcPoschange20180525[]|ObjectCollection findByDateChange(string $date_change) Return ChildAliCalcPoschange20180525 objects filtered by the date_change column
 * @method     ChildAliCalcPoschange20180525[]|ObjectCollection findByDateUpdate(string $date_update) Return ChildAliCalcPoschange20180525 objects filtered by the date_update column
 * @method     ChildAliCalcPoschange20180525[]|ObjectCollection findByType(string $type) Return ChildAliCalcPoschange20180525 objects filtered by the type column
 * @method     ChildAliCalcPoschange20180525[]|ObjectCollection findByUpDown(string $up_down) Return ChildAliCalcPoschange20180525 objects filtered by the up_down column
 * @method     ChildAliCalcPoschange20180525[]|ObjectCollection findByUid(string $uid) Return ChildAliCalcPoschange20180525 objects filtered by the uid column
 * @method     ChildAliCalcPoschange20180525[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliCalcPoschange20180525Query extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliCalcPoschange20180525Query object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliCalcPoschange20180525', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliCalcPoschange20180525Query object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliCalcPoschange20180525Query
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliCalcPoschange20180525Query) {
            return $criteria;
        }
        $query = new ChildAliCalcPoschange20180525Query();
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
     * @return ChildAliCalcPoschange20180525|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliCalcPoschange20180525TableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliCalcPoschange20180525TableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliCalcPoschange20180525 A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, mcode, pos_before, pos_after, date_change, date_update, type, up_down, uid FROM ali_calc_poschange_20180525 WHERE id = :p0';
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
            /** @var ChildAliCalcPoschange20180525 $obj */
            $obj = new ChildAliCalcPoschange20180525();
            $obj->hydrate($row);
            AliCalcPoschange20180525TableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliCalcPoschange20180525|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliCalcPoschange20180525Query The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliCalcPoschange20180525Query The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliCalcPoschange20180525Query The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliCalcPoschange20180525Query The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliCalcPoschange20180525Query The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliCalcPoschange20180525Query The current query, for fluid interface
     */
    public function filterByPosBefore($posBefore = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posBefore)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_POS_BEFORE, $posBefore, $comparison);
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
     * @return $this|ChildAliCalcPoschange20180525Query The current query, for fluid interface
     */
    public function filterByPosAfter($posAfter = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posAfter)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_POS_AFTER, $posAfter, $comparison);
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
     * @return $this|ChildAliCalcPoschange20180525Query The current query, for fluid interface
     */
    public function filterByDateChange($dateChange = null, $comparison = null)
    {
        if (is_array($dateChange)) {
            $useMinMax = false;
            if (isset($dateChange['min'])) {
                $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_DATE_CHANGE, $dateChange['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateChange['max'])) {
                $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_DATE_CHANGE, $dateChange['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_DATE_CHANGE, $dateChange, $comparison);
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
     * @return $this|ChildAliCalcPoschange20180525Query The current query, for fluid interface
     */
    public function filterByDateUpdate($dateUpdate = null, $comparison = null)
    {
        if (is_array($dateUpdate)) {
            $useMinMax = false;
            if (isset($dateUpdate['min'])) {
                $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_DATE_UPDATE, $dateUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateUpdate['max'])) {
                $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_DATE_UPDATE, $dateUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_DATE_UPDATE, $dateUpdate, $comparison);
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
     * @return $this|ChildAliCalcPoschange20180525Query The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the up_down column
     *
     * Example usage:
     * <code>
     * $query->filterByUpDown('fooValue');   // WHERE up_down = 'fooValue'
     * $query->filterByUpDown('%fooValue%', Criteria::LIKE); // WHERE up_down LIKE '%fooValue%'
     * </code>
     *
     * @param     string $upDown The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCalcPoschange20180525Query The current query, for fluid interface
     */
    public function filterByUpDown($upDown = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upDown)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_UP_DOWN, $upDown, $comparison);
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
     * @return $this|ChildAliCalcPoschange20180525Query The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliCalcPoschange20180525 $aliCalcPoschange20180525 Object to remove from the list of results
     *
     * @return $this|ChildAliCalcPoschange20180525Query The current query, for fluid interface
     */
    public function prune($aliCalcPoschange20180525 = null)
    {
        if ($aliCalcPoschange20180525) {
            $this->addUsingAlias(AliCalcPoschange20180525TableMap::COL_ID, $aliCalcPoschange20180525->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_calc_poschange_20180525 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCalcPoschange20180525TableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliCalcPoschange20180525TableMap::clearInstancePool();
            AliCalcPoschange20180525TableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCalcPoschange20180525TableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliCalcPoschange20180525TableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliCalcPoschange20180525TableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliCalcPoschange20180525TableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliCalcPoschange20180525Query
