<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliCron as ChildAliCron;
use CciOrm\CciOrm\AliCronQuery as ChildAliCronQuery;
use CciOrm\CciOrm\Map\AliCronTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_cron' table.
 *
 *
 *
 * @method     ChildAliCronQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliCronQuery orderByCronDetail($order = Criteria::ASC) Order by the cron_detail column
 * @method     ChildAliCronQuery orderByCronDate($order = Criteria::ASC) Order by the cron_date column
 * @method     ChildAliCronQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliCronQuery orderByHttppost($order = Criteria::ASC) Order by the httppost column
 * @method     ChildAliCronQuery orderByRequesturl($order = Criteria::ASC) Order by the requesturl column
 * @method     ChildAliCronQuery orderByPhpself($order = Criteria::ASC) Order by the phpself column
 *
 * @method     ChildAliCronQuery groupById() Group by the id column
 * @method     ChildAliCronQuery groupByCronDetail() Group by the cron_detail column
 * @method     ChildAliCronQuery groupByCronDate() Group by the cron_date column
 * @method     ChildAliCronQuery groupByRcode() Group by the rcode column
 * @method     ChildAliCronQuery groupByHttppost() Group by the httppost column
 * @method     ChildAliCronQuery groupByRequesturl() Group by the requesturl column
 * @method     ChildAliCronQuery groupByPhpself() Group by the phpself column
 *
 * @method     ChildAliCronQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliCronQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliCronQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliCronQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliCronQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliCronQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliCron findOne(ConnectionInterface $con = null) Return the first ChildAliCron matching the query
 * @method     ChildAliCron findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliCron matching the query, or a new ChildAliCron object populated from the query conditions when no match is found
 *
 * @method     ChildAliCron findOneById(int $id) Return the first ChildAliCron filtered by the id column
 * @method     ChildAliCron findOneByCronDetail(string $cron_detail) Return the first ChildAliCron filtered by the cron_detail column
 * @method     ChildAliCron findOneByCronDate(string $cron_date) Return the first ChildAliCron filtered by the cron_date column
 * @method     ChildAliCron findOneByRcode(int $rcode) Return the first ChildAliCron filtered by the rcode column
 * @method     ChildAliCron findOneByHttppost(string $httppost) Return the first ChildAliCron filtered by the httppost column
 * @method     ChildAliCron findOneByRequesturl(string $requesturl) Return the first ChildAliCron filtered by the requesturl column
 * @method     ChildAliCron findOneByPhpself(string $phpself) Return the first ChildAliCron filtered by the phpself column *

 * @method     ChildAliCron requirePk($key, ConnectionInterface $con = null) Return the ChildAliCron by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCron requireOne(ConnectionInterface $con = null) Return the first ChildAliCron matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCron requireOneById(int $id) Return the first ChildAliCron filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCron requireOneByCronDetail(string $cron_detail) Return the first ChildAliCron filtered by the cron_detail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCron requireOneByCronDate(string $cron_date) Return the first ChildAliCron filtered by the cron_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCron requireOneByRcode(int $rcode) Return the first ChildAliCron filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCron requireOneByHttppost(string $httppost) Return the first ChildAliCron filtered by the httppost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCron requireOneByRequesturl(string $requesturl) Return the first ChildAliCron filtered by the requesturl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCron requireOneByPhpself(string $phpself) Return the first ChildAliCron filtered by the phpself column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCron[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliCron objects based on current ModelCriteria
 * @method     ChildAliCron[]|ObjectCollection findById(int $id) Return ChildAliCron objects filtered by the id column
 * @method     ChildAliCron[]|ObjectCollection findByCronDetail(string $cron_detail) Return ChildAliCron objects filtered by the cron_detail column
 * @method     ChildAliCron[]|ObjectCollection findByCronDate(string $cron_date) Return ChildAliCron objects filtered by the cron_date column
 * @method     ChildAliCron[]|ObjectCollection findByRcode(int $rcode) Return ChildAliCron objects filtered by the rcode column
 * @method     ChildAliCron[]|ObjectCollection findByHttppost(string $httppost) Return ChildAliCron objects filtered by the httppost column
 * @method     ChildAliCron[]|ObjectCollection findByRequesturl(string $requesturl) Return ChildAliCron objects filtered by the requesturl column
 * @method     ChildAliCron[]|ObjectCollection findByPhpself(string $phpself) Return ChildAliCron objects filtered by the phpself column
 * @method     ChildAliCron[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliCronQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliCronQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliCron', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliCronQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliCronQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliCronQuery) {
            return $criteria;
        }
        $query = new ChildAliCronQuery();
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
     * @return ChildAliCron|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliCronTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliCronTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliCron A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, cron_detail, cron_date, rcode, httppost, requesturl, phpself FROM ali_cron WHERE id = :p0';
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
            /** @var ChildAliCron $obj */
            $obj = new ChildAliCron();
            $obj->hydrate($row);
            AliCronTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliCron|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliCronQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliCronTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliCronQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliCronTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliCronQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliCronTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliCronTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCronTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the cron_detail column
     *
     * Example usage:
     * <code>
     * $query->filterByCronDetail('fooValue');   // WHERE cron_detail = 'fooValue'
     * $query->filterByCronDetail('%fooValue%', Criteria::LIKE); // WHERE cron_detail LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cronDetail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCronQuery The current query, for fluid interface
     */
    public function filterByCronDetail($cronDetail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cronDetail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCronTableMap::COL_CRON_DETAIL, $cronDetail, $comparison);
    }

    /**
     * Filter the query on the cron_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCronDate('2011-03-14'); // WHERE cron_date = '2011-03-14'
     * $query->filterByCronDate('now'); // WHERE cron_date = '2011-03-14'
     * $query->filterByCronDate(array('max' => 'yesterday')); // WHERE cron_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $cronDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCronQuery The current query, for fluid interface
     */
    public function filterByCronDate($cronDate = null, $comparison = null)
    {
        if (is_array($cronDate)) {
            $useMinMax = false;
            if (isset($cronDate['min'])) {
                $this->addUsingAlias(AliCronTableMap::COL_CRON_DATE, $cronDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cronDate['max'])) {
                $this->addUsingAlias(AliCronTableMap::COL_CRON_DATE, $cronDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCronTableMap::COL_CRON_DATE, $cronDate, $comparison);
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
     * @return $this|ChildAliCronQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliCronTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliCronTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCronTableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the httppost column
     *
     * Example usage:
     * <code>
     * $query->filterByHttppost('fooValue');   // WHERE httppost = 'fooValue'
     * $query->filterByHttppost('%fooValue%', Criteria::LIKE); // WHERE httppost LIKE '%fooValue%'
     * </code>
     *
     * @param     string $httppost The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCronQuery The current query, for fluid interface
     */
    public function filterByHttppost($httppost = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($httppost)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCronTableMap::COL_HTTPPOST, $httppost, $comparison);
    }

    /**
     * Filter the query on the requesturl column
     *
     * Example usage:
     * <code>
     * $query->filterByRequesturl('fooValue');   // WHERE requesturl = 'fooValue'
     * $query->filterByRequesturl('%fooValue%', Criteria::LIKE); // WHERE requesturl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $requesturl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCronQuery The current query, for fluid interface
     */
    public function filterByRequesturl($requesturl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($requesturl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCronTableMap::COL_REQUESTURL, $requesturl, $comparison);
    }

    /**
     * Filter the query on the phpself column
     *
     * Example usage:
     * <code>
     * $query->filterByPhpself('fooValue');   // WHERE phpself = 'fooValue'
     * $query->filterByPhpself('%fooValue%', Criteria::LIKE); // WHERE phpself LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phpself The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCronQuery The current query, for fluid interface
     */
    public function filterByPhpself($phpself = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phpself)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCronTableMap::COL_PHPSELF, $phpself, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliCron $aliCron Object to remove from the list of results
     *
     * @return $this|ChildAliCronQuery The current query, for fluid interface
     */
    public function prune($aliCron = null)
    {
        if ($aliCron) {
            $this->addUsingAlias(AliCronTableMap::COL_ID, $aliCron->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_cron table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCronTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliCronTableMap::clearInstancePool();
            AliCronTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCronTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliCronTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliCronTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliCronTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliCronQuery
