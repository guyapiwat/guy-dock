<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliPosition as ChildAliPosition;
use CciOrm\CciOrm\AliPositionQuery as ChildAliPositionQuery;
use CciOrm\CciOrm\Map\AliPositionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_position' table.
 *
 *
 *
 * @method     ChildAliPositionQuery orderByPosid($order = Criteria::ASC) Order by the posid column
 * @method     ChildAliPositionQuery orderByPosshort($order = Criteria::ASC) Order by the posshort column
 * @method     ChildAliPositionQuery orderByPosname($order = Criteria::ASC) Order by the posname column
 * @method     ChildAliPositionQuery orderByPosimg($order = Criteria::ASC) Order by the posimg column
 * @method     ChildAliPositionQuery orderByPosavt($order = Criteria::ASC) Order by the posavt column
 * @method     ChildAliPositionQuery orderByPosutab($order = Criteria::ASC) Order by the posutab column
 * @method     ChildAliPositionQuery orderByPosdtab($order = Criteria::ASC) Order by the posdtab column
 * @method     ChildAliPositionQuery orderByPosdesc($order = Criteria::ASC) Order by the posdesc column
 * @method     ChildAliPositionQuery orderByUd($order = Criteria::ASC) Order by the ud column
 *
 * @method     ChildAliPositionQuery groupByPosid() Group by the posid column
 * @method     ChildAliPositionQuery groupByPosshort() Group by the posshort column
 * @method     ChildAliPositionQuery groupByPosname() Group by the posname column
 * @method     ChildAliPositionQuery groupByPosimg() Group by the posimg column
 * @method     ChildAliPositionQuery groupByPosavt() Group by the posavt column
 * @method     ChildAliPositionQuery groupByPosutab() Group by the posutab column
 * @method     ChildAliPositionQuery groupByPosdtab() Group by the posdtab column
 * @method     ChildAliPositionQuery groupByPosdesc() Group by the posdesc column
 * @method     ChildAliPositionQuery groupByUd() Group by the ud column
 *
 * @method     ChildAliPositionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliPositionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliPositionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliPositionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliPositionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliPositionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliPosition findOne(ConnectionInterface $con = null) Return the first ChildAliPosition matching the query
 * @method     ChildAliPosition findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliPosition matching the query, or a new ChildAliPosition object populated from the query conditions when no match is found
 *
 * @method     ChildAliPosition findOneByPosid(int $posid) Return the first ChildAliPosition filtered by the posid column
 * @method     ChildAliPosition findOneByPosshort(string $posshort) Return the first ChildAliPosition filtered by the posshort column
 * @method     ChildAliPosition findOneByPosname(string $posname) Return the first ChildAliPosition filtered by the posname column
 * @method     ChildAliPosition findOneByPosimg(string $posimg) Return the first ChildAliPosition filtered by the posimg column
 * @method     ChildAliPosition findOneByPosavt(string $posavt) Return the first ChildAliPosition filtered by the posavt column
 * @method     ChildAliPosition findOneByPosutab(string $posutab) Return the first ChildAliPosition filtered by the posutab column
 * @method     ChildAliPosition findOneByPosdtab(string $posdtab) Return the first ChildAliPosition filtered by the posdtab column
 * @method     ChildAliPosition findOneByPosdesc(string $posdesc) Return the first ChildAliPosition filtered by the posdesc column
 * @method     ChildAliPosition findOneByUd(string $ud) Return the first ChildAliPosition filtered by the ud column *

 * @method     ChildAliPosition requirePk($key, ConnectionInterface $con = null) Return the ChildAliPosition by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition requireOne(ConnectionInterface $con = null) Return the first ChildAliPosition matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPosition requireOneByPosid(int $posid) Return the first ChildAliPosition filtered by the posid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition requireOneByPosshort(string $posshort) Return the first ChildAliPosition filtered by the posshort column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition requireOneByPosname(string $posname) Return the first ChildAliPosition filtered by the posname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition requireOneByPosimg(string $posimg) Return the first ChildAliPosition filtered by the posimg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition requireOneByPosavt(string $posavt) Return the first ChildAliPosition filtered by the posavt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition requireOneByPosutab(string $posutab) Return the first ChildAliPosition filtered by the posutab column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition requireOneByPosdtab(string $posdtab) Return the first ChildAliPosition filtered by the posdtab column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition requireOneByPosdesc(string $posdesc) Return the first ChildAliPosition filtered by the posdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPosition requireOneByUd(string $ud) Return the first ChildAliPosition filtered by the ud column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPosition[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliPosition objects based on current ModelCriteria
 * @method     ChildAliPosition[]|ObjectCollection findByPosid(int $posid) Return ChildAliPosition objects filtered by the posid column
 * @method     ChildAliPosition[]|ObjectCollection findByPosshort(string $posshort) Return ChildAliPosition objects filtered by the posshort column
 * @method     ChildAliPosition[]|ObjectCollection findByPosname(string $posname) Return ChildAliPosition objects filtered by the posname column
 * @method     ChildAliPosition[]|ObjectCollection findByPosimg(string $posimg) Return ChildAliPosition objects filtered by the posimg column
 * @method     ChildAliPosition[]|ObjectCollection findByPosavt(string $posavt) Return ChildAliPosition objects filtered by the posavt column
 * @method     ChildAliPosition[]|ObjectCollection findByPosutab(string $posutab) Return ChildAliPosition objects filtered by the posutab column
 * @method     ChildAliPosition[]|ObjectCollection findByPosdtab(string $posdtab) Return ChildAliPosition objects filtered by the posdtab column
 * @method     ChildAliPosition[]|ObjectCollection findByPosdesc(string $posdesc) Return ChildAliPosition objects filtered by the posdesc column
 * @method     ChildAliPosition[]|ObjectCollection findByUd(string $ud) Return ChildAliPosition objects filtered by the ud column
 * @method     ChildAliPosition[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliPositionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliPositionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliPosition', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliPositionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliPositionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliPositionQuery) {
            return $criteria;
        }
        $query = new ChildAliPositionQuery();
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
     * @return ChildAliPosition|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliPositionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliPositionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliPosition A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT posid, posshort, posname, posimg, posavt, posutab, posdtab, posdesc, ud FROM ali_position WHERE posid = :p0';
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
            /** @var ChildAliPosition $obj */
            $obj = new ChildAliPosition();
            $obj->hydrate($row);
            AliPositionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliPosition|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliPositionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliPositionTableMap::COL_POSID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliPositionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliPositionTableMap::COL_POSID, $keys, Criteria::IN);
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
     * @return $this|ChildAliPositionQuery The current query, for fluid interface
     */
    public function filterByPosid($posid = null, $comparison = null)
    {
        if (is_array($posid)) {
            $useMinMax = false;
            if (isset($posid['min'])) {
                $this->addUsingAlias(AliPositionTableMap::COL_POSID, $posid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posid['max'])) {
                $this->addUsingAlias(AliPositionTableMap::COL_POSID, $posid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPositionTableMap::COL_POSID, $posid, $comparison);
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
     * @return $this|ChildAliPositionQuery The current query, for fluid interface
     */
    public function filterByPosshort($posshort = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posshort)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPositionTableMap::COL_POSSHORT, $posshort, $comparison);
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
     * @return $this|ChildAliPositionQuery The current query, for fluid interface
     */
    public function filterByPosname($posname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPositionTableMap::COL_POSNAME, $posname, $comparison);
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
     * @return $this|ChildAliPositionQuery The current query, for fluid interface
     */
    public function filterByPosimg($posimg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posimg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPositionTableMap::COL_POSIMG, $posimg, $comparison);
    }

    /**
     * Filter the query on the posavt column
     *
     * Example usage:
     * <code>
     * $query->filterByPosavt('fooValue');   // WHERE posavt = 'fooValue'
     * $query->filterByPosavt('%fooValue%', Criteria::LIKE); // WHERE posavt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posavt The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPositionQuery The current query, for fluid interface
     */
    public function filterByPosavt($posavt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posavt)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPositionTableMap::COL_POSAVT, $posavt, $comparison);
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
     * @return $this|ChildAliPositionQuery The current query, for fluid interface
     */
    public function filterByPosutab($posutab = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posutab)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPositionTableMap::COL_POSUTAB, $posutab, $comparison);
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
     * @return $this|ChildAliPositionQuery The current query, for fluid interface
     */
    public function filterByPosdtab($posdtab = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posdtab)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPositionTableMap::COL_POSDTAB, $posdtab, $comparison);
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
     * @return $this|ChildAliPositionQuery The current query, for fluid interface
     */
    public function filterByPosdesc($posdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPositionTableMap::COL_POSDESC, $posdesc, $comparison);
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
     * @return $this|ChildAliPositionQuery The current query, for fluid interface
     */
    public function filterByUd($ud = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ud)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPositionTableMap::COL_UD, $ud, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliPosition $aliPosition Object to remove from the list of results
     *
     * @return $this|ChildAliPositionQuery The current query, for fluid interface
     */
    public function prune($aliPosition = null)
    {
        if ($aliPosition) {
            $this->addUsingAlias(AliPositionTableMap::COL_POSID, $aliPosition->getPosid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_position table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPositionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliPositionTableMap::clearInstancePool();
            AliPositionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPositionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliPositionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliPositionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliPositionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliPositionQuery
