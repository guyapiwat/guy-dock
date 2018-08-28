<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliExpdate as ChildAliExpdate;
use CciOrm\CciOrm\AliExpdateQuery as ChildAliExpdateQuery;
use CciOrm\CciOrm\Map\AliExpdateTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_expdate' table.
 *
 *
 *
 * @method     ChildAliExpdateQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliExpdateQuery orderByMid($order = Criteria::ASC) Order by the mid column
 * @method     ChildAliExpdateQuery orderByExpDate($order = Criteria::ASC) Order by the exp_date column
 * @method     ChildAliExpdateQuery orderByDateChange($order = Criteria::ASC) Order by the date_change column
 * @method     ChildAliExpdateQuery orderByExpType($order = Criteria::ASC) Order by the exp_type column
 * @method     ChildAliExpdateQuery orderBySano($order = Criteria::ASC) Order by the sano column
 *
 * @method     ChildAliExpdateQuery groupById() Group by the id column
 * @method     ChildAliExpdateQuery groupByMid() Group by the mid column
 * @method     ChildAliExpdateQuery groupByExpDate() Group by the exp_date column
 * @method     ChildAliExpdateQuery groupByDateChange() Group by the date_change column
 * @method     ChildAliExpdateQuery groupByExpType() Group by the exp_type column
 * @method     ChildAliExpdateQuery groupBySano() Group by the sano column
 *
 * @method     ChildAliExpdateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliExpdateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliExpdateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliExpdateQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliExpdateQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliExpdateQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliExpdate findOne(ConnectionInterface $con = null) Return the first ChildAliExpdate matching the query
 * @method     ChildAliExpdate findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliExpdate matching the query, or a new ChildAliExpdate object populated from the query conditions when no match is found
 *
 * @method     ChildAliExpdate findOneById(int $id) Return the first ChildAliExpdate filtered by the id column
 * @method     ChildAliExpdate findOneByMid(int $mid) Return the first ChildAliExpdate filtered by the mid column
 * @method     ChildAliExpdate findOneByExpDate(string $exp_date) Return the first ChildAliExpdate filtered by the exp_date column
 * @method     ChildAliExpdate findOneByDateChange(string $date_change) Return the first ChildAliExpdate filtered by the date_change column
 * @method     ChildAliExpdate findOneByExpType(string $exp_type) Return the first ChildAliExpdate filtered by the exp_type column
 * @method     ChildAliExpdate findOneBySano(string $sano) Return the first ChildAliExpdate filtered by the sano column *

 * @method     ChildAliExpdate requirePk($key, ConnectionInterface $con = null) Return the ChildAliExpdate by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliExpdate requireOne(ConnectionInterface $con = null) Return the first ChildAliExpdate matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliExpdate requireOneById(int $id) Return the first ChildAliExpdate filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliExpdate requireOneByMid(int $mid) Return the first ChildAliExpdate filtered by the mid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliExpdate requireOneByExpDate(string $exp_date) Return the first ChildAliExpdate filtered by the exp_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliExpdate requireOneByDateChange(string $date_change) Return the first ChildAliExpdate filtered by the date_change column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliExpdate requireOneByExpType(string $exp_type) Return the first ChildAliExpdate filtered by the exp_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliExpdate requireOneBySano(string $sano) Return the first ChildAliExpdate filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliExpdate[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliExpdate objects based on current ModelCriteria
 * @method     ChildAliExpdate[]|ObjectCollection findById(int $id) Return ChildAliExpdate objects filtered by the id column
 * @method     ChildAliExpdate[]|ObjectCollection findByMid(int $mid) Return ChildAliExpdate objects filtered by the mid column
 * @method     ChildAliExpdate[]|ObjectCollection findByExpDate(string $exp_date) Return ChildAliExpdate objects filtered by the exp_date column
 * @method     ChildAliExpdate[]|ObjectCollection findByDateChange(string $date_change) Return ChildAliExpdate objects filtered by the date_change column
 * @method     ChildAliExpdate[]|ObjectCollection findByExpType(string $exp_type) Return ChildAliExpdate objects filtered by the exp_type column
 * @method     ChildAliExpdate[]|ObjectCollection findBySano(string $sano) Return ChildAliExpdate objects filtered by the sano column
 * @method     ChildAliExpdate[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliExpdateQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliExpdateQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliExpdate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliExpdateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliExpdateQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliExpdateQuery) {
            return $criteria;
        }
        $query = new ChildAliExpdateQuery();
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
     * @return ChildAliExpdate|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliExpdateTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliExpdateTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliExpdate A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mid, exp_date, date_change, exp_type, sano FROM ali_expdate WHERE id = :p0';
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
            /** @var ChildAliExpdate $obj */
            $obj = new ChildAliExpdate();
            $obj->hydrate($row);
            AliExpdateTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliExpdate|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliExpdateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliExpdateTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliExpdateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliExpdateTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliExpdateQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliExpdateTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliExpdateTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliExpdateTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the mid column
     *
     * Example usage:
     * <code>
     * $query->filterByMid(1234); // WHERE mid = 1234
     * $query->filterByMid(array(12, 34)); // WHERE mid IN (12, 34)
     * $query->filterByMid(array('min' => 12)); // WHERE mid > 12
     * </code>
     *
     * @param     mixed $mid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliExpdateQuery The current query, for fluid interface
     */
    public function filterByMid($mid = null, $comparison = null)
    {
        if (is_array($mid)) {
            $useMinMax = false;
            if (isset($mid['min'])) {
                $this->addUsingAlias(AliExpdateTableMap::COL_MID, $mid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mid['max'])) {
                $this->addUsingAlias(AliExpdateTableMap::COL_MID, $mid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliExpdateTableMap::COL_MID, $mid, $comparison);
    }

    /**
     * Filter the query on the exp_date column
     *
     * Example usage:
     * <code>
     * $query->filterByExpDate('2011-03-14'); // WHERE exp_date = '2011-03-14'
     * $query->filterByExpDate('now'); // WHERE exp_date = '2011-03-14'
     * $query->filterByExpDate(array('max' => 'yesterday')); // WHERE exp_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $expDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliExpdateQuery The current query, for fluid interface
     */
    public function filterByExpDate($expDate = null, $comparison = null)
    {
        if (is_array($expDate)) {
            $useMinMax = false;
            if (isset($expDate['min'])) {
                $this->addUsingAlias(AliExpdateTableMap::COL_EXP_DATE, $expDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expDate['max'])) {
                $this->addUsingAlias(AliExpdateTableMap::COL_EXP_DATE, $expDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliExpdateTableMap::COL_EXP_DATE, $expDate, $comparison);
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
     * @return $this|ChildAliExpdateQuery The current query, for fluid interface
     */
    public function filterByDateChange($dateChange = null, $comparison = null)
    {
        if (is_array($dateChange)) {
            $useMinMax = false;
            if (isset($dateChange['min'])) {
                $this->addUsingAlias(AliExpdateTableMap::COL_DATE_CHANGE, $dateChange['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateChange['max'])) {
                $this->addUsingAlias(AliExpdateTableMap::COL_DATE_CHANGE, $dateChange['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliExpdateTableMap::COL_DATE_CHANGE, $dateChange, $comparison);
    }

    /**
     * Filter the query on the exp_type column
     *
     * Example usage:
     * <code>
     * $query->filterByExpType('fooValue');   // WHERE exp_type = 'fooValue'
     * $query->filterByExpType('%fooValue%', Criteria::LIKE); // WHERE exp_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliExpdateQuery The current query, for fluid interface
     */
    public function filterByExpType($expType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliExpdateTableMap::COL_EXP_TYPE, $expType, $comparison);
    }

    /**
     * Filter the query on the sano column
     *
     * Example usage:
     * <code>
     * $query->filterBySano('fooValue');   // WHERE sano = 'fooValue'
     * $query->filterBySano('%fooValue%', Criteria::LIKE); // WHERE sano LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sano The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliExpdateQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliExpdateTableMap::COL_SANO, $sano, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliExpdate $aliExpdate Object to remove from the list of results
     *
     * @return $this|ChildAliExpdateQuery The current query, for fluid interface
     */
    public function prune($aliExpdate = null)
    {
        if ($aliExpdate) {
            $this->addUsingAlias(AliExpdateTableMap::COL_ID, $aliExpdate->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_expdate table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliExpdateTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliExpdateTableMap::clearInstancePool();
            AliExpdateTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliExpdateTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliExpdateTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliExpdateTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliExpdateTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliExpdateQuery
