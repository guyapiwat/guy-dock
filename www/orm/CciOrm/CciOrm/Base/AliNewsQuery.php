<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliNews as ChildAliNews;
use CciOrm\CciOrm\AliNewsQuery as ChildAliNewsQuery;
use CciOrm\CciOrm\Map\AliNewsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_news' table.
 *
 *
 *
 * @method     ChildAliNewsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliNewsQuery orderByHead($order = Criteria::ASC) Order by the head column
 * @method     ChildAliNewsQuery orderByBody($order = Criteria::ASC) Order by the body column
 * @method     ChildAliNewsQuery orderByDates($order = Criteria::ASC) Order by the dates column
 * @method     ChildAliNewsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliNewsQuery orderByPopup($order = Criteria::ASC) Order by the popup column
 *
 * @method     ChildAliNewsQuery groupById() Group by the id column
 * @method     ChildAliNewsQuery groupByHead() Group by the head column
 * @method     ChildAliNewsQuery groupByBody() Group by the body column
 * @method     ChildAliNewsQuery groupByDates() Group by the dates column
 * @method     ChildAliNewsQuery groupByStatus() Group by the status column
 * @method     ChildAliNewsQuery groupByPopup() Group by the popup column
 *
 * @method     ChildAliNewsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliNewsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliNewsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliNewsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliNewsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliNewsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliNews findOne(ConnectionInterface $con = null) Return the first ChildAliNews matching the query
 * @method     ChildAliNews findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliNews matching the query, or a new ChildAliNews object populated from the query conditions when no match is found
 *
 * @method     ChildAliNews findOneById(int $id) Return the first ChildAliNews filtered by the id column
 * @method     ChildAliNews findOneByHead(string $head) Return the first ChildAliNews filtered by the head column
 * @method     ChildAliNews findOneByBody(string $body) Return the first ChildAliNews filtered by the body column
 * @method     ChildAliNews findOneByDates(string $dates) Return the first ChildAliNews filtered by the dates column
 * @method     ChildAliNews findOneByStatus(string $status) Return the first ChildAliNews filtered by the status column
 * @method     ChildAliNews findOneByPopup(string $popup) Return the first ChildAliNews filtered by the popup column *

 * @method     ChildAliNews requirePk($key, ConnectionInterface $con = null) Return the ChildAliNews by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliNews requireOne(ConnectionInterface $con = null) Return the first ChildAliNews matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliNews requireOneById(int $id) Return the first ChildAliNews filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliNews requireOneByHead(string $head) Return the first ChildAliNews filtered by the head column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliNews requireOneByBody(string $body) Return the first ChildAliNews filtered by the body column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliNews requireOneByDates(string $dates) Return the first ChildAliNews filtered by the dates column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliNews requireOneByStatus(string $status) Return the first ChildAliNews filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliNews requireOneByPopup(string $popup) Return the first ChildAliNews filtered by the popup column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliNews[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliNews objects based on current ModelCriteria
 * @method     ChildAliNews[]|ObjectCollection findById(int $id) Return ChildAliNews objects filtered by the id column
 * @method     ChildAliNews[]|ObjectCollection findByHead(string $head) Return ChildAliNews objects filtered by the head column
 * @method     ChildAliNews[]|ObjectCollection findByBody(string $body) Return ChildAliNews objects filtered by the body column
 * @method     ChildAliNews[]|ObjectCollection findByDates(string $dates) Return ChildAliNews objects filtered by the dates column
 * @method     ChildAliNews[]|ObjectCollection findByStatus(string $status) Return ChildAliNews objects filtered by the status column
 * @method     ChildAliNews[]|ObjectCollection findByPopup(string $popup) Return ChildAliNews objects filtered by the popup column
 * @method     ChildAliNews[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliNewsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliNewsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliNews', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliNewsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliNewsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliNewsQuery) {
            return $criteria;
        }
        $query = new ChildAliNewsQuery();
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
     * @return ChildAliNews|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliNewsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliNewsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliNews A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, head, body, dates, status, popup FROM ali_news WHERE id = :p0';
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
            /** @var ChildAliNews $obj */
            $obj = new ChildAliNews();
            $obj->hydrate($row);
            AliNewsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliNews|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliNewsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliNewsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliNewsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliNewsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliNewsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliNewsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliNewsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliNewsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the head column
     *
     * Example usage:
     * <code>
     * $query->filterByHead('fooValue');   // WHERE head = 'fooValue'
     * $query->filterByHead('%fooValue%', Criteria::LIKE); // WHERE head LIKE '%fooValue%'
     * </code>
     *
     * @param     string $head The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliNewsQuery The current query, for fluid interface
     */
    public function filterByHead($head = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($head)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliNewsTableMap::COL_HEAD, $head, $comparison);
    }

    /**
     * Filter the query on the body column
     *
     * Example usage:
     * <code>
     * $query->filterByBody('fooValue');   // WHERE body = 'fooValue'
     * $query->filterByBody('%fooValue%', Criteria::LIKE); // WHERE body LIKE '%fooValue%'
     * </code>
     *
     * @param     string $body The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliNewsQuery The current query, for fluid interface
     */
    public function filterByBody($body = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($body)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliNewsTableMap::COL_BODY, $body, $comparison);
    }

    /**
     * Filter the query on the dates column
     *
     * Example usage:
     * <code>
     * $query->filterByDates('2011-03-14'); // WHERE dates = '2011-03-14'
     * $query->filterByDates('now'); // WHERE dates = '2011-03-14'
     * $query->filterByDates(array('max' => 'yesterday')); // WHERE dates > '2011-03-13'
     * </code>
     *
     * @param     mixed $dates The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliNewsQuery The current query, for fluid interface
     */
    public function filterByDates($dates = null, $comparison = null)
    {
        if (is_array($dates)) {
            $useMinMax = false;
            if (isset($dates['min'])) {
                $this->addUsingAlias(AliNewsTableMap::COL_DATES, $dates['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dates['max'])) {
                $this->addUsingAlias(AliNewsTableMap::COL_DATES, $dates['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliNewsTableMap::COL_DATES, $dates, $comparison);
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
     * @return $this|ChildAliNewsQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliNewsTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the popup column
     *
     * Example usage:
     * <code>
     * $query->filterByPopup('fooValue');   // WHERE popup = 'fooValue'
     * $query->filterByPopup('%fooValue%', Criteria::LIKE); // WHERE popup LIKE '%fooValue%'
     * </code>
     *
     * @param     string $popup The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliNewsQuery The current query, for fluid interface
     */
    public function filterByPopup($popup = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($popup)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliNewsTableMap::COL_POPUP, $popup, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliNews $aliNews Object to remove from the list of results
     *
     * @return $this|ChildAliNewsQuery The current query, for fluid interface
     */
    public function prune($aliNews = null)
    {
        if ($aliNews) {
            $this->addUsingAlias(AliNewsTableMap::COL_ID, $aliNews->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_news table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliNewsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliNewsTableMap::clearInstancePool();
            AliNewsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliNewsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliNewsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliNewsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliNewsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliNewsQuery
