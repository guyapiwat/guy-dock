<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliMyPv as ChildAliMyPv;
use CciOrm\CciOrm\AliMyPvQuery as ChildAliMyPvQuery;
use CciOrm\CciOrm\Map\AliMyPvTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_my_pv' table.
 *
 *
 *
 * @method     ChildAliMyPvQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliMyPvQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliMyPvQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliMyPvQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliMyPvQuery orderByPvExp($order = Criteria::ASC) Order by the pv_exp column
 * @method     ChildAliMyPvQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliMyPvQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliMyPvQuery orderByPmonth($order = Criteria::ASC) Order by the pmonth column
 *
 * @method     ChildAliMyPvQuery groupById() Group by the id column
 * @method     ChildAliMyPvQuery groupByRcode() Group by the rcode column
 * @method     ChildAliMyPvQuery groupByMcode() Group by the mcode column
 * @method     ChildAliMyPvQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliMyPvQuery groupByPvExp() Group by the pv_exp column
 * @method     ChildAliMyPvQuery groupByPv() Group by the pv column
 * @method     ChildAliMyPvQuery groupByStatus() Group by the status column
 * @method     ChildAliMyPvQuery groupByPmonth() Group by the pmonth column
 *
 * @method     ChildAliMyPvQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliMyPvQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliMyPvQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliMyPvQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliMyPvQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliMyPvQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliMyPv findOne(ConnectionInterface $con = null) Return the first ChildAliMyPv matching the query
 * @method     ChildAliMyPv findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliMyPv matching the query, or a new ChildAliMyPv object populated from the query conditions when no match is found
 *
 * @method     ChildAliMyPv findOneById(int $id) Return the first ChildAliMyPv filtered by the id column
 * @method     ChildAliMyPv findOneByRcode(int $rcode) Return the first ChildAliMyPv filtered by the rcode column
 * @method     ChildAliMyPv findOneByMcode(string $mcode) Return the first ChildAliMyPv filtered by the mcode column
 * @method     ChildAliMyPv findOneByPosCur(string $pos_cur) Return the first ChildAliMyPv filtered by the pos_cur column
 * @method     ChildAliMyPv findOneByPvExp(string $pv_exp) Return the first ChildAliMyPv filtered by the pv_exp column
 * @method     ChildAliMyPv findOneByPv(string $pv) Return the first ChildAliMyPv filtered by the pv column
 * @method     ChildAliMyPv findOneByStatus(string $status) Return the first ChildAliMyPv filtered by the status column
 * @method     ChildAliMyPv findOneByPmonth(string $pmonth) Return the first ChildAliMyPv filtered by the pmonth column *

 * @method     ChildAliMyPv requirePk($key, ConnectionInterface $con = null) Return the ChildAliMyPv by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMyPv requireOne(ConnectionInterface $con = null) Return the first ChildAliMyPv matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMyPv requireOneById(int $id) Return the first ChildAliMyPv filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMyPv requireOneByRcode(int $rcode) Return the first ChildAliMyPv filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMyPv requireOneByMcode(string $mcode) Return the first ChildAliMyPv filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMyPv requireOneByPosCur(string $pos_cur) Return the first ChildAliMyPv filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMyPv requireOneByPvExp(string $pv_exp) Return the first ChildAliMyPv filtered by the pv_exp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMyPv requireOneByPv(string $pv) Return the first ChildAliMyPv filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMyPv requireOneByStatus(string $status) Return the first ChildAliMyPv filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMyPv requireOneByPmonth(string $pmonth) Return the first ChildAliMyPv filtered by the pmonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMyPv[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliMyPv objects based on current ModelCriteria
 * @method     ChildAliMyPv[]|ObjectCollection findById(int $id) Return ChildAliMyPv objects filtered by the id column
 * @method     ChildAliMyPv[]|ObjectCollection findByRcode(int $rcode) Return ChildAliMyPv objects filtered by the rcode column
 * @method     ChildAliMyPv[]|ObjectCollection findByMcode(string $mcode) Return ChildAliMyPv objects filtered by the mcode column
 * @method     ChildAliMyPv[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliMyPv objects filtered by the pos_cur column
 * @method     ChildAliMyPv[]|ObjectCollection findByPvExp(string $pv_exp) Return ChildAliMyPv objects filtered by the pv_exp column
 * @method     ChildAliMyPv[]|ObjectCollection findByPv(string $pv) Return ChildAliMyPv objects filtered by the pv column
 * @method     ChildAliMyPv[]|ObjectCollection findByStatus(string $status) Return ChildAliMyPv objects filtered by the status column
 * @method     ChildAliMyPv[]|ObjectCollection findByPmonth(string $pmonth) Return ChildAliMyPv objects filtered by the pmonth column
 * @method     ChildAliMyPv[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliMyPvQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliMyPvQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliMyPv', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliMyPvQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliMyPvQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliMyPvQuery) {
            return $criteria;
        }
        $query = new ChildAliMyPvQuery();
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
     * @return ChildAliMyPv|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliMyPvTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliMyPvTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliMyPv A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, mcode, pos_cur, pv_exp, pv, status, pmonth FROM ali_my_pv WHERE id = :p0';
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
            /** @var ChildAliMyPv $obj */
            $obj = new ChildAliMyPv();
            $obj->hydrate($row);
            AliMyPvTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliMyPv|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliMyPvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliMyPvTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliMyPvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliMyPvTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliMyPvQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliMyPvTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliMyPvTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMyPvTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliMyPvQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliMyPvTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliMyPvTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMyPvTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliMyPvQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMyPvTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the pos_cur column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur('fooValue');   // WHERE pos_cur = 'fooValue'
     * $query->filterByPosCur('%fooValue%', Criteria::LIKE); // WHERE pos_cur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMyPvQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMyPvTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Filter the query on the pv_exp column
     *
     * Example usage:
     * <code>
     * $query->filterByPvExp(1234); // WHERE pv_exp = 1234
     * $query->filterByPvExp(array(12, 34)); // WHERE pv_exp IN (12, 34)
     * $query->filterByPvExp(array('min' => 12)); // WHERE pv_exp > 12
     * </code>
     *
     * @param     mixed $pvExp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMyPvQuery The current query, for fluid interface
     */
    public function filterByPvExp($pvExp = null, $comparison = null)
    {
        if (is_array($pvExp)) {
            $useMinMax = false;
            if (isset($pvExp['min'])) {
                $this->addUsingAlias(AliMyPvTableMap::COL_PV_EXP, $pvExp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvExp['max'])) {
                $this->addUsingAlias(AliMyPvTableMap::COL_PV_EXP, $pvExp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMyPvTableMap::COL_PV_EXP, $pvExp, $comparison);
    }

    /**
     * Filter the query on the pv column
     *
     * Example usage:
     * <code>
     * $query->filterByPv(1234); // WHERE pv = 1234
     * $query->filterByPv(array(12, 34)); // WHERE pv IN (12, 34)
     * $query->filterByPv(array('min' => 12)); // WHERE pv > 12
     * </code>
     *
     * @param     mixed $pv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMyPvQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliMyPvTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliMyPvTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMyPvTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliMyPvQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMyPvTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the pmonth column
     *
     * Example usage:
     * <code>
     * $query->filterByPmonth('fooValue');   // WHERE pmonth = 'fooValue'
     * $query->filterByPmonth('%fooValue%', Criteria::LIKE); // WHERE pmonth LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pmonth The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMyPvQuery The current query, for fluid interface
     */
    public function filterByPmonth($pmonth = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pmonth)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMyPvTableMap::COL_PMONTH, $pmonth, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliMyPv $aliMyPv Object to remove from the list of results
     *
     * @return $this|ChildAliMyPvQuery The current query, for fluid interface
     */
    public function prune($aliMyPv = null)
    {
        if ($aliMyPv) {
            $this->addUsingAlias(AliMyPvTableMap::COL_ID, $aliMyPv->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_my_pv table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMyPvTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliMyPvTableMap::clearInstancePool();
            AliMyPvTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMyPvTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliMyPvTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliMyPvTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliMyPvTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliMyPvQuery
