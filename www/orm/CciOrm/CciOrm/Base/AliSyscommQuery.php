<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliSyscomm as ChildAliSyscomm;
use CciOrm\CciOrm\AliSyscommQuery as ChildAliSyscommQuery;
use CciOrm\CciOrm\Map\AliSyscommTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_syscomm' table.
 *
 *
 *
 * @method     ChildAliSyscommQuery orderByCid($order = Criteria::ASC) Order by the cid column
 * @method     ChildAliSyscommQuery orderByFaststart($order = Criteria::ASC) Order by the faststart column
 * @method     ChildAliSyscommQuery orderByBinary($order = Criteria::ASC) Order by the binary column
 * @method     ChildAliSyscommQuery orderByWeekstrong($order = Criteria::ASC) Order by the weekstrong column
 * @method     ChildAliSyscommQuery orderByTrinary($order = Criteria::ASC) Order by the trinary column
 * @method     ChildAliSyscommQuery orderByUnilevel($order = Criteria::ASC) Order by the unilevel column
 * @method     ChildAliSyscommQuery orderByMatching($order = Criteria::ASC) Order by the matching column
 *
 * @method     ChildAliSyscommQuery groupByCid() Group by the cid column
 * @method     ChildAliSyscommQuery groupByFaststart() Group by the faststart column
 * @method     ChildAliSyscommQuery groupByBinary() Group by the binary column
 * @method     ChildAliSyscommQuery groupByWeekstrong() Group by the weekstrong column
 * @method     ChildAliSyscommQuery groupByTrinary() Group by the trinary column
 * @method     ChildAliSyscommQuery groupByUnilevel() Group by the unilevel column
 * @method     ChildAliSyscommQuery groupByMatching() Group by the matching column
 *
 * @method     ChildAliSyscommQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliSyscommQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliSyscommQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliSyscommQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliSyscommQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliSyscommQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliSyscomm findOne(ConnectionInterface $con = null) Return the first ChildAliSyscomm matching the query
 * @method     ChildAliSyscomm findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliSyscomm matching the query, or a new ChildAliSyscomm object populated from the query conditions when no match is found
 *
 * @method     ChildAliSyscomm findOneByCid(int $cid) Return the first ChildAliSyscomm filtered by the cid column
 * @method     ChildAliSyscomm findOneByFaststart(string $faststart) Return the first ChildAliSyscomm filtered by the faststart column
 * @method     ChildAliSyscomm findOneByBinary(string $binary) Return the first ChildAliSyscomm filtered by the binary column
 * @method     ChildAliSyscomm findOneByWeekstrong(string $weekstrong) Return the first ChildAliSyscomm filtered by the weekstrong column
 * @method     ChildAliSyscomm findOneByTrinary(string $trinary) Return the first ChildAliSyscomm filtered by the trinary column
 * @method     ChildAliSyscomm findOneByUnilevel(string $unilevel) Return the first ChildAliSyscomm filtered by the unilevel column
 * @method     ChildAliSyscomm findOneByMatching(string $matching) Return the first ChildAliSyscomm filtered by the matching column *

 * @method     ChildAliSyscomm requirePk($key, ConnectionInterface $con = null) Return the ChildAliSyscomm by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSyscomm requireOne(ConnectionInterface $con = null) Return the first ChildAliSyscomm matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSyscomm requireOneByCid(int $cid) Return the first ChildAliSyscomm filtered by the cid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSyscomm requireOneByFaststart(string $faststart) Return the first ChildAliSyscomm filtered by the faststart column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSyscomm requireOneByBinary(string $binary) Return the first ChildAliSyscomm filtered by the binary column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSyscomm requireOneByWeekstrong(string $weekstrong) Return the first ChildAliSyscomm filtered by the weekstrong column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSyscomm requireOneByTrinary(string $trinary) Return the first ChildAliSyscomm filtered by the trinary column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSyscomm requireOneByUnilevel(string $unilevel) Return the first ChildAliSyscomm filtered by the unilevel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSyscomm requireOneByMatching(string $matching) Return the first ChildAliSyscomm filtered by the matching column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSyscomm[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliSyscomm objects based on current ModelCriteria
 * @method     ChildAliSyscomm[]|ObjectCollection findByCid(int $cid) Return ChildAliSyscomm objects filtered by the cid column
 * @method     ChildAliSyscomm[]|ObjectCollection findByFaststart(string $faststart) Return ChildAliSyscomm objects filtered by the faststart column
 * @method     ChildAliSyscomm[]|ObjectCollection findByBinary(string $binary) Return ChildAliSyscomm objects filtered by the binary column
 * @method     ChildAliSyscomm[]|ObjectCollection findByWeekstrong(string $weekstrong) Return ChildAliSyscomm objects filtered by the weekstrong column
 * @method     ChildAliSyscomm[]|ObjectCollection findByTrinary(string $trinary) Return ChildAliSyscomm objects filtered by the trinary column
 * @method     ChildAliSyscomm[]|ObjectCollection findByUnilevel(string $unilevel) Return ChildAliSyscomm objects filtered by the unilevel column
 * @method     ChildAliSyscomm[]|ObjectCollection findByMatching(string $matching) Return ChildAliSyscomm objects filtered by the matching column
 * @method     ChildAliSyscomm[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliSyscommQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliSyscommQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliSyscomm', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliSyscommQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliSyscommQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliSyscommQuery) {
            return $criteria;
        }
        $query = new ChildAliSyscommQuery();
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
     * @return ChildAliSyscomm|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliSyscommTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliSyscommTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliSyscomm A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT cid, faststart, binary, weekstrong, trinary, unilevel, matching FROM ali_syscomm WHERE cid = :p0';
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
            /** @var ChildAliSyscomm $obj */
            $obj = new ChildAliSyscomm();
            $obj->hydrate($row);
            AliSyscommTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliSyscomm|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliSyscommQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliSyscommTableMap::COL_CID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliSyscommQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliSyscommTableMap::COL_CID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the cid column
     *
     * Example usage:
     * <code>
     * $query->filterByCid(1234); // WHERE cid = 1234
     * $query->filterByCid(array(12, 34)); // WHERE cid IN (12, 34)
     * $query->filterByCid(array('min' => 12)); // WHERE cid > 12
     * </code>
     *
     * @param     mixed $cid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSyscommQuery The current query, for fluid interface
     */
    public function filterByCid($cid = null, $comparison = null)
    {
        if (is_array($cid)) {
            $useMinMax = false;
            if (isset($cid['min'])) {
                $this->addUsingAlias(AliSyscommTableMap::COL_CID, $cid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cid['max'])) {
                $this->addUsingAlias(AliSyscommTableMap::COL_CID, $cid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSyscommTableMap::COL_CID, $cid, $comparison);
    }

    /**
     * Filter the query on the faststart column
     *
     * Example usage:
     * <code>
     * $query->filterByFaststart('fooValue');   // WHERE faststart = 'fooValue'
     * $query->filterByFaststart('%fooValue%', Criteria::LIKE); // WHERE faststart LIKE '%fooValue%'
     * </code>
     *
     * @param     string $faststart The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSyscommQuery The current query, for fluid interface
     */
    public function filterByFaststart($faststart = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($faststart)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSyscommTableMap::COL_FASTSTART, $faststart, $comparison);
    }

    /**
     * Filter the query on the binary column
     *
     * Example usage:
     * <code>
     * $query->filterByBinary('fooValue');   // WHERE binary = 'fooValue'
     * $query->filterByBinary('%fooValue%', Criteria::LIKE); // WHERE binary LIKE '%fooValue%'
     * </code>
     *
     * @param     string $binary The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSyscommQuery The current query, for fluid interface
     */
    public function filterByBinary($binary = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($binary)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSyscommTableMap::COL_BINARY, $binary, $comparison);
    }

    /**
     * Filter the query on the weekstrong column
     *
     * Example usage:
     * <code>
     * $query->filterByWeekstrong('fooValue');   // WHERE weekstrong = 'fooValue'
     * $query->filterByWeekstrong('%fooValue%', Criteria::LIKE); // WHERE weekstrong LIKE '%fooValue%'
     * </code>
     *
     * @param     string $weekstrong The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSyscommQuery The current query, for fluid interface
     */
    public function filterByWeekstrong($weekstrong = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($weekstrong)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSyscommTableMap::COL_WEEKSTRONG, $weekstrong, $comparison);
    }

    /**
     * Filter the query on the trinary column
     *
     * Example usage:
     * <code>
     * $query->filterByTrinary('fooValue');   // WHERE trinary = 'fooValue'
     * $query->filterByTrinary('%fooValue%', Criteria::LIKE); // WHERE trinary LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trinary The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSyscommQuery The current query, for fluid interface
     */
    public function filterByTrinary($trinary = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trinary)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSyscommTableMap::COL_TRINARY, $trinary, $comparison);
    }

    /**
     * Filter the query on the unilevel column
     *
     * Example usage:
     * <code>
     * $query->filterByUnilevel('fooValue');   // WHERE unilevel = 'fooValue'
     * $query->filterByUnilevel('%fooValue%', Criteria::LIKE); // WHERE unilevel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unilevel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSyscommQuery The current query, for fluid interface
     */
    public function filterByUnilevel($unilevel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unilevel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSyscommTableMap::COL_UNILEVEL, $unilevel, $comparison);
    }

    /**
     * Filter the query on the matching column
     *
     * Example usage:
     * <code>
     * $query->filterByMatching('fooValue');   // WHERE matching = 'fooValue'
     * $query->filterByMatching('%fooValue%', Criteria::LIKE); // WHERE matching LIKE '%fooValue%'
     * </code>
     *
     * @param     string $matching The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSyscommQuery The current query, for fluid interface
     */
    public function filterByMatching($matching = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($matching)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSyscommTableMap::COL_MATCHING, $matching, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliSyscomm $aliSyscomm Object to remove from the list of results
     *
     * @return $this|ChildAliSyscommQuery The current query, for fluid interface
     */
    public function prune($aliSyscomm = null)
    {
        if ($aliSyscomm) {
            $this->addUsingAlias(AliSyscommTableMap::COL_CID, $aliSyscomm->getCid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_syscomm table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSyscommTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliSyscommTableMap::clearInstancePool();
            AliSyscommTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSyscommTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliSyscommTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliSyscommTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliSyscommTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliSyscommQuery
