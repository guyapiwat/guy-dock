<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliPosition2 as ChildAliPosition2;
use CciOrm\CciOrm\AliPosition2Query as ChildAliPosition2Query;
use CciOrm\CciOrm\Map\AliPosition2TableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_position2' table.
 *
 *
 *
 * @method     ChildAliPosition2Query orderByPosid($order = Criteria::ASC) Order by the posid column
 * @method     ChildAliPosition2Query orderByPosshort($order = Criteria::ASC) Order by the posshort column
 * @method     ChildAliPosition2Query orderByPosname($order = Criteria::ASC) Order by the posname column
 * @method     ChildAliPosition2Query orderByPosimg($order = Criteria::ASC) Order by the posimg column
 * @method     ChildAliPosition2Query orderByPosutab($order = Criteria::ASC) Order by the posutab column
 * @method     ChildAliPosition2Query orderByPosdtab($order = Criteria::ASC) Order by the posdtab column
 * @method     ChildAliPosition2Query orderByPosdesc($order = Criteria::ASC) Order by the posdesc column
 * @method     ChildAliPosition2Query orderByUd($order = Criteria::ASC) Order by the ud column
 *
 * @method     ChildAliPosition2Query groupByPosid() Group by the posid column
 * @method     ChildAliPosition2Query groupByPosshort() Group by the posshort column
 * @method     ChildAliPosition2Query groupByPosname() Group by the posname column
 * @method     ChildAliPosition2Query groupByPosimg() Group by the posimg column
 * @method     ChildAliPosition2Query groupByPosutab() Group by the posutab column
 * @method     ChildAliPosition2Query groupByPosdtab() Group by the posdtab column
 * @method     ChildAliPosition2Query groupByPosdesc() Group by the posdesc column
 * @method     ChildAliPosition2Query groupByUd() Group by the ud column
 *
 * @method     ChildAliPosition2Query leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliPosition2Query rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliPosition2Query innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliPosition2Query leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliPosition2Query rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliPosition2Query innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliPosition2 findOne(ConnectionInterface $con = null) Return the first ChildAliPosition2 matching the query
 * @method     ChildAliPosition2 findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliPosition2 matching the query, or a new ChildAliPosition2 object populated from the query conditions when no match is found
 *
 * @method     ChildAliPosition2 findOneByPosid(int $posid) Return the first ChildAliPosition2 filtered by the posid column
 * @method     ChildAliPosition2 findOneByPosshort(string $posshort) Return the first ChildAliPosition2 filtered by the posshort column
 * @method     ChildAliPosition2 findOneByPosname(string $posname) Return the first ChildAliPosition2 filtered by the posname column
 * @method     ChildAliPosition2 findOneByPosimg(string $posimg) Return the first ChildAliPosition2 filtered by the posimg column
 * @method     ChildAliPosition2 findOneByPosutab(string $posutab) Return the first ChildAliPosition2 filtered by the posutab column
 * @method     ChildAliPosition2 findOneByPosdtab(string $posdtab) Return the first ChildAliPosition2 filtered by the posdtab column
 * @method     ChildAliPosition2 findOneByPosdesc(string $posdesc) Return the first ChildAliPosition2 filtered by the posdesc column
 * @method     ChildAliPosition2 findOneByUd(string $ud) Return the first ChildAliPosition2 filtered by the ud column *

 * @method     ChildAliPosition2 requirePk($key, ConnectionInterface $con = null) Return the ChildAliPosition2 by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition2 requireOne(ConnectionInterface $con = null) Return the first ChildAliPosition2 matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPosition2 requireOneByPosid(int $posid) Return the first ChildAliPosition2 filtered by the posid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition2 requireOneByPosshort(string $posshort) Return the first ChildAliPosition2 filtered by the posshort column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition2 requireOneByPosname(string $posname) Return the first ChildAliPosition2 filtered by the posname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition2 requireOneByPosimg(string $posimg) Return the first ChildAliPosition2 filtered by the posimg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition2 requireOneByPosutab(string $posutab) Return the first ChildAliPosition2 filtered by the posutab column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition2 requireOneByPosdtab(string $posdtab) Return the first ChildAliPosition2 filtered by the posdtab column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition2 requireOneByPosdesc(string $posdesc) Return the first ChildAliPosition2 filtered by the posdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition2 requireOneByUd(string $ud) Return the first ChildAliPosition2 filtered by the ud column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPosition2[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliPosition2 objects based on current ModelCriteria
 * @method     ChildAliPosition2[]|ObjectCollection findByPosid(int $posid) Return ChildAliPosition2 objects filtered by the posid column
 * @method     ChildAliPosition2[]|ObjectCollection findByPosshort(string $posshort) Return ChildAliPosition2 objects filtered by the posshort column
 * @method     ChildAliPosition2[]|ObjectCollection findByPosname(string $posname) Return ChildAliPosition2 objects filtered by the posname column
 * @method     ChildAliPosition2[]|ObjectCollection findByPosimg(string $posimg) Return ChildAliPosition2 objects filtered by the posimg column
 * @method     ChildAliPosition2[]|ObjectCollection findByPosutab(string $posutab) Return ChildAliPosition2 objects filtered by the posutab column
 * @method     ChildAliPosition2[]|ObjectCollection findByPosdtab(string $posdtab) Return ChildAliPosition2 objects filtered by the posdtab column
 * @method     ChildAliPosition2[]|ObjectCollection findByPosdesc(string $posdesc) Return ChildAliPosition2 objects filtered by the posdesc column
 * @method     ChildAliPosition2[]|ObjectCollection findByUd(string $ud) Return ChildAliPosition2 objects filtered by the ud column
 * @method     ChildAliPosition2[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliPosition2Query extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliPosition2Query object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliPosition2', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliPosition2Query object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliPosition2Query
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliPosition2Query) {
            return $criteria;
        }
        $query = new ChildAliPosition2Query();
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
     * @return ChildAliPosition2|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliPosition2TableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliPosition2TableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliPosition2 A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT posid, posshort, posname, posimg, posutab, posdtab, posdesc, ud FROM ali_position2 WHERE posid = :p0';
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
            /** @var ChildAliPosition2 $obj */
            $obj = new ChildAliPosition2();
            $obj->hydrate($row);
            AliPosition2TableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliPosition2|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliPosition2Query The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliPosition2TableMap::COL_POSID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliPosition2Query The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliPosition2TableMap::COL_POSID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the posid column
     *
     * Example usage:
     * <code>
     * $query->filterByPosid(1234); // WHERE posid = 1234
     * $query->filterByPosid(array(12, 34)); // WHERE posid IN (12, 34)
     * $query->filterByPosid(array('min' => 12)); // WHERE posid > 12
     * </code>
     *
     * @param     mixed $posid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPosition2Query The current query, for fluid interface
     */
    public function filterByPosid($posid = null, $comparison = null)
    {
        if (is_array($posid)) {
            $useMinMax = false;
            if (isset($posid['min'])) {
                $this->addUsingAlias(AliPosition2TableMap::COL_POSID, $posid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posid['max'])) {
                $this->addUsingAlias(AliPosition2TableMap::COL_POSID, $posid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPosition2TableMap::COL_POSID, $posid, $comparison);
    }

    /**
     * Filter the query on the posshort column
     *
     * Example usage:
     * <code>
     * $query->filterByPosshort('fooValue');   // WHERE posshort = 'fooValue'
     * $query->filterByPosshort('%fooValue%', Criteria::LIKE); // WHERE posshort LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posshort The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPosition2Query The current query, for fluid interface
     */
    public function filterByPosshort($posshort = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posshort)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPosition2TableMap::COL_POSSHORT, $posshort, $comparison);
    }

    /**
     * Filter the query on the posname column
     *
     * Example usage:
     * <code>
     * $query->filterByPosname('fooValue');   // WHERE posname = 'fooValue'
     * $query->filterByPosname('%fooValue%', Criteria::LIKE); // WHERE posname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPosition2Query The current query, for fluid interface
     */
    public function filterByPosname($posname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPosition2TableMap::COL_POSNAME, $posname, $comparison);
    }

    /**
     * Filter the query on the posimg column
     *
     * Example usage:
     * <code>
     * $query->filterByPosimg('fooValue');   // WHERE posimg = 'fooValue'
     * $query->filterByPosimg('%fooValue%', Criteria::LIKE); // WHERE posimg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posimg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPosition2Query The current query, for fluid interface
     */
    public function filterByPosimg($posimg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posimg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPosition2TableMap::COL_POSIMG, $posimg, $comparison);
    }

    /**
     * Filter the query on the posutab column
     *
     * Example usage:
     * <code>
     * $query->filterByPosutab('fooValue');   // WHERE posutab = 'fooValue'
     * $query->filterByPosutab('%fooValue%', Criteria::LIKE); // WHERE posutab LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posutab The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPosition2Query The current query, for fluid interface
     */
    public function filterByPosutab($posutab = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posutab)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPosition2TableMap::COL_POSUTAB, $posutab, $comparison);
    }

    /**
     * Filter the query on the posdtab column
     *
     * Example usage:
     * <code>
     * $query->filterByPosdtab('fooValue');   // WHERE posdtab = 'fooValue'
     * $query->filterByPosdtab('%fooValue%', Criteria::LIKE); // WHERE posdtab LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posdtab The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPosition2Query The current query, for fluid interface
     */
    public function filterByPosdtab($posdtab = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posdtab)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPosition2TableMap::COL_POSDTAB, $posdtab, $comparison);
    }

    /**
     * Filter the query on the posdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByPosdesc('fooValue');   // WHERE posdesc = 'fooValue'
     * $query->filterByPosdesc('%fooValue%', Criteria::LIKE); // WHERE posdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPosition2Query The current query, for fluid interface
     */
    public function filterByPosdesc($posdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPosition2TableMap::COL_POSDESC, $posdesc, $comparison);
    }

    /**
     * Filter the query on the ud column
     *
     * Example usage:
     * <code>
     * $query->filterByUd('fooValue');   // WHERE ud = 'fooValue'
     * $query->filterByUd('%fooValue%', Criteria::LIKE); // WHERE ud LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ud The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPosition2Query The current query, for fluid interface
     */
    public function filterByUd($ud = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ud)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPosition2TableMap::COL_UD, $ud, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliPosition2 $aliPosition2 Object to remove from the list of results
     *
     * @return $this|ChildAliPosition2Query The current query, for fluid interface
     */
    public function prune($aliPosition2 = null)
    {
        if ($aliPosition2) {
            $this->addUsingAlias(AliPosition2TableMap::COL_POSID, $aliPosition2->getPosid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_position2 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPosition2TableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliPosition2TableMap::clearInstancePool();
            AliPosition2TableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPosition2TableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliPosition2TableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliPosition2TableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliPosition2TableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliPosition2Query
