<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliReportCron as ChildAliReportCron;
use CciOrm\CciOrm\AliReportCronQuery as ChildAliReportCronQuery;
use CciOrm\CciOrm\Map\AliReportCronTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_report_cron' table.
 *
 *
 *
 * @method     ChildAliReportCronQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliReportCronQuery orderByStartCronCal($order = Criteria::ASC) Order by the start_cron_cal column
 * @method     ChildAliReportCronQuery orderByFinishCronCal($order = Criteria::ASC) Order by the finish_cron_cal column
 *
 * @method     ChildAliReportCronQuery groupById() Group by the id column
 * @method     ChildAliReportCronQuery groupByStartCronCal() Group by the start_cron_cal column
 * @method     ChildAliReportCronQuery groupByFinishCronCal() Group by the finish_cron_cal column
 *
 * @method     ChildAliReportCronQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliReportCronQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliReportCronQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliReportCronQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliReportCronQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliReportCronQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliReportCron findOne(ConnectionInterface $con = null) Return the first ChildAliReportCron matching the query
 * @method     ChildAliReportCron findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliReportCron matching the query, or a new ChildAliReportCron object populated from the query conditions when no match is found
 *
 * @method     ChildAliReportCron findOneById(int $id) Return the first ChildAliReportCron filtered by the id column
 * @method     ChildAliReportCron findOneByStartCronCal(string $start_cron_cal) Return the first ChildAliReportCron filtered by the start_cron_cal column
 * @method     ChildAliReportCron findOneByFinishCronCal(string $finish_cron_cal) Return the first ChildAliReportCron filtered by the finish_cron_cal column *

 * @method     ChildAliReportCron requirePk($key, ConnectionInterface $con = null) Return the ChildAliReportCron by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportCron requireOne(ConnectionInterface $con = null) Return the first ChildAliReportCron matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliReportCron requireOneById(int $id) Return the first ChildAliReportCron filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportCron requireOneByStartCronCal(string $start_cron_cal) Return the first ChildAliReportCron filtered by the start_cron_cal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportCron requireOneByFinishCronCal(string $finish_cron_cal) Return the first ChildAliReportCron filtered by the finish_cron_cal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliReportCron[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliReportCron objects based on current ModelCriteria
 * @method     ChildAliReportCron[]|ObjectCollection findById(int $id) Return ChildAliReportCron objects filtered by the id column
 * @method     ChildAliReportCron[]|ObjectCollection findByStartCronCal(string $start_cron_cal) Return ChildAliReportCron objects filtered by the start_cron_cal column
 * @method     ChildAliReportCron[]|ObjectCollection findByFinishCronCal(string $finish_cron_cal) Return ChildAliReportCron objects filtered by the finish_cron_cal column
 * @method     ChildAliReportCron[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliReportCronQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliReportCronQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliReportCron', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliReportCronQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliReportCronQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliReportCronQuery) {
            return $criteria;
        }
        $query = new ChildAliReportCronQuery();
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
     * @return ChildAliReportCron|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliReportCronTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliReportCronTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliReportCron A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, start_cron_cal, finish_cron_cal FROM ali_report_cron WHERE id = :p0';
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
            /** @var ChildAliReportCron $obj */
            $obj = new ChildAliReportCron();
            $obj->hydrate($row);
            AliReportCronTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliReportCron|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliReportCronQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliReportCronTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliReportCronQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliReportCronTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliReportCronQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliReportCronTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliReportCronTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportCronTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the start_cron_cal column
     *
     * Example usage:
     * <code>
     * $query->filterByStartCronCal('2011-03-14'); // WHERE start_cron_cal = '2011-03-14'
     * $query->filterByStartCronCal('now'); // WHERE start_cron_cal = '2011-03-14'
     * $query->filterByStartCronCal(array('max' => 'yesterday')); // WHERE start_cron_cal > '2011-03-13'
     * </code>
     *
     * @param     mixed $startCronCal The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportCronQuery The current query, for fluid interface
     */
    public function filterByStartCronCal($startCronCal = null, $comparison = null)
    {
        if (is_array($startCronCal)) {
            $useMinMax = false;
            if (isset($startCronCal['min'])) {
                $this->addUsingAlias(AliReportCronTableMap::COL_START_CRON_CAL, $startCronCal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startCronCal['max'])) {
                $this->addUsingAlias(AliReportCronTableMap::COL_START_CRON_CAL, $startCronCal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportCronTableMap::COL_START_CRON_CAL, $startCronCal, $comparison);
    }

    /**
     * Filter the query on the finish_cron_cal column
     *
     * Example usage:
     * <code>
     * $query->filterByFinishCronCal('2011-03-14'); // WHERE finish_cron_cal = '2011-03-14'
     * $query->filterByFinishCronCal('now'); // WHERE finish_cron_cal = '2011-03-14'
     * $query->filterByFinishCronCal(array('max' => 'yesterday')); // WHERE finish_cron_cal > '2011-03-13'
     * </code>
     *
     * @param     mixed $finishCronCal The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportCronQuery The current query, for fluid interface
     */
    public function filterByFinishCronCal($finishCronCal = null, $comparison = null)
    {
        if (is_array($finishCronCal)) {
            $useMinMax = false;
            if (isset($finishCronCal['min'])) {
                $this->addUsingAlias(AliReportCronTableMap::COL_FINISH_CRON_CAL, $finishCronCal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($finishCronCal['max'])) {
                $this->addUsingAlias(AliReportCronTableMap::COL_FINISH_CRON_CAL, $finishCronCal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportCronTableMap::COL_FINISH_CRON_CAL, $finishCronCal, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliReportCron $aliReportCron Object to remove from the list of results
     *
     * @return $this|ChildAliReportCronQuery The current query, for fluid interface
     */
    public function prune($aliReportCron = null)
    {
        if ($aliReportCron) {
            $this->addUsingAlias(AliReportCronTableMap::COL_ID, $aliReportCron->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_report_cron table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportCronTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliReportCronTableMap::clearInstancePool();
            AliReportCronTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportCronTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliReportCronTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliReportCronTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliReportCronTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliReportCronQuery
