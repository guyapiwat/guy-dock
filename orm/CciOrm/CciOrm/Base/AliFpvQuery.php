<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliFpv as ChildAliFpv;
use CciOrm\CciOrm\AliFpvQuery as ChildAliFpvQuery;
use CciOrm\CciOrm\Map\AliFpvTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_fpv' table.
 *
 *
 *
 * @method     ChildAliFpvQuery orderByAid($order = Criteria::ASC) Order by the aid column
 * @method     ChildAliFpvQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliFpvQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliFpvQuery orderByTotalPv($order = Criteria::ASC) Order by the total_pv column
 * @method     ChildAliFpvQuery orderByMpos($order = Criteria::ASC) Order by the mpos column
 * @method     ChildAliFpvQuery orderByNpos($order = Criteria::ASC) Order by the npos column
 * @method     ChildAliFpvQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliFpvQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 *
 * @method     ChildAliFpvQuery groupByAid() Group by the aid column
 * @method     ChildAliFpvQuery groupByRcode() Group by the rcode column
 * @method     ChildAliFpvQuery groupByMcode() Group by the mcode column
 * @method     ChildAliFpvQuery groupByTotalPv() Group by the total_pv column
 * @method     ChildAliFpvQuery groupByMpos() Group by the mpos column
 * @method     ChildAliFpvQuery groupByNpos() Group by the npos column
 * @method     ChildAliFpvQuery groupByCrate() Group by the crate column
 * @method     ChildAliFpvQuery groupByLocationbase() Group by the locationbase column
 *
 * @method     ChildAliFpvQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliFpvQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliFpvQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliFpvQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliFpvQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliFpvQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliFpv findOne(ConnectionInterface $con = null) Return the first ChildAliFpv matching the query
 * @method     ChildAliFpv findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliFpv matching the query, or a new ChildAliFpv object populated from the query conditions when no match is found
 *
 * @method     ChildAliFpv findOneByAid(int $aid) Return the first ChildAliFpv filtered by the aid column
 * @method     ChildAliFpv findOneByRcode(int $rcode) Return the first ChildAliFpv filtered by the rcode column
 * @method     ChildAliFpv findOneByMcode(string $mcode) Return the first ChildAliFpv filtered by the mcode column
 * @method     ChildAliFpv findOneByTotalPv(string $total_pv) Return the first ChildAliFpv filtered by the total_pv column
 * @method     ChildAliFpv findOneByMpos(string $mpos) Return the first ChildAliFpv filtered by the mpos column
 * @method     ChildAliFpv findOneByNpos(string $npos) Return the first ChildAliFpv filtered by the npos column
 * @method     ChildAliFpv findOneByCrate(int $crate) Return the first ChildAliFpv filtered by the crate column
 * @method     ChildAliFpv findOneByLocationbase(int $locationbase) Return the first ChildAliFpv filtered by the locationbase column *

 * @method     ChildAliFpv requirePk($key, ConnectionInterface $con = null) Return the ChildAliFpv by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFpv requireOne(ConnectionInterface $con = null) Return the first ChildAliFpv matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliFpv requireOneByAid(int $aid) Return the first ChildAliFpv filtered by the aid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFpv requireOneByRcode(int $rcode) Return the first ChildAliFpv filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFpv requireOneByMcode(string $mcode) Return the first ChildAliFpv filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFpv requireOneByTotalPv(string $total_pv) Return the first ChildAliFpv filtered by the total_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFpv requireOneByMpos(string $mpos) Return the first ChildAliFpv filtered by the mpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFpv requireOneByNpos(string $npos) Return the first ChildAliFpv filtered by the npos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFpv requireOneByCrate(int $crate) Return the first ChildAliFpv filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFpv requireOneByLocationbase(int $locationbase) Return the first ChildAliFpv filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliFpv[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliFpv objects based on current ModelCriteria
 * @method     ChildAliFpv[]|ObjectCollection findByAid(int $aid) Return ChildAliFpv objects filtered by the aid column
 * @method     ChildAliFpv[]|ObjectCollection findByRcode(int $rcode) Return ChildAliFpv objects filtered by the rcode column
 * @method     ChildAliFpv[]|ObjectCollection findByMcode(string $mcode) Return ChildAliFpv objects filtered by the mcode column
 * @method     ChildAliFpv[]|ObjectCollection findByTotalPv(string $total_pv) Return ChildAliFpv objects filtered by the total_pv column
 * @method     ChildAliFpv[]|ObjectCollection findByMpos(string $mpos) Return ChildAliFpv objects filtered by the mpos column
 * @method     ChildAliFpv[]|ObjectCollection findByNpos(string $npos) Return ChildAliFpv objects filtered by the npos column
 * @method     ChildAliFpv[]|ObjectCollection findByCrate(int $crate) Return ChildAliFpv objects filtered by the crate column
 * @method     ChildAliFpv[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliFpv objects filtered by the locationbase column
 * @method     ChildAliFpv[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliFpvQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliFpvQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliFpv', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliFpvQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliFpvQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliFpvQuery) {
            return $criteria;
        }
        $query = new ChildAliFpvQuery();
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
     * @return ChildAliFpv|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliFpvTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliFpvTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliFpv A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT aid, rcode, mcode, total_pv, mpos, npos, crate, locationbase FROM ali_fpv WHERE aid = :p0';
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
            /** @var ChildAliFpv $obj */
            $obj = new ChildAliFpv();
            $obj->hydrate($row);
            AliFpvTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliFpv|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliFpvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliFpvTableMap::COL_AID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliFpvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliFpvTableMap::COL_AID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the aid column
     *
     * Example usage:
     * <code>
     * $query->filterByAid(1234); // WHERE aid = 1234
     * $query->filterByAid(array(12, 34)); // WHERE aid IN (12, 34)
     * $query->filterByAid(array('min' => 12)); // WHERE aid > 12
     * </code>
     *
     * @param     mixed $aid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFpvQuery The current query, for fluid interface
     */
    public function filterByAid($aid = null, $comparison = null)
    {
        if (is_array($aid)) {
            $useMinMax = false;
            if (isset($aid['min'])) {
                $this->addUsingAlias(AliFpvTableMap::COL_AID, $aid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aid['max'])) {
                $this->addUsingAlias(AliFpvTableMap::COL_AID, $aid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFpvTableMap::COL_AID, $aid, $comparison);
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
     * @return $this|ChildAliFpvQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliFpvTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliFpvTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFpvTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliFpvQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFpvTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the total_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalPv(1234); // WHERE total_pv = 1234
     * $query->filterByTotalPv(array(12, 34)); // WHERE total_pv IN (12, 34)
     * $query->filterByTotalPv(array('min' => 12)); // WHERE total_pv > 12
     * </code>
     *
     * @param     mixed $totalPv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFpvQuery The current query, for fluid interface
     */
    public function filterByTotalPv($totalPv = null, $comparison = null)
    {
        if (is_array($totalPv)) {
            $useMinMax = false;
            if (isset($totalPv['min'])) {
                $this->addUsingAlias(AliFpvTableMap::COL_TOTAL_PV, $totalPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPv['max'])) {
                $this->addUsingAlias(AliFpvTableMap::COL_TOTAL_PV, $totalPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFpvTableMap::COL_TOTAL_PV, $totalPv, $comparison);
    }

    /**
     * Filter the query on the mpos column
     *
     * Example usage:
     * <code>
     * $query->filterByMpos('fooValue');   // WHERE mpos = 'fooValue'
     * $query->filterByMpos('%fooValue%', Criteria::LIKE); // WHERE mpos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mpos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFpvQuery The current query, for fluid interface
     */
    public function filterByMpos($mpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFpvTableMap::COL_MPOS, $mpos, $comparison);
    }

    /**
     * Filter the query on the npos column
     *
     * Example usage:
     * <code>
     * $query->filterByNpos('fooValue');   // WHERE npos = 'fooValue'
     * $query->filterByNpos('%fooValue%', Criteria::LIKE); // WHERE npos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $npos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFpvQuery The current query, for fluid interface
     */
    public function filterByNpos($npos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($npos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFpvTableMap::COL_NPOS, $npos, $comparison);
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
     * @return $this|ChildAliFpvQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliFpvTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliFpvTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFpvTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliFpvQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliFpvTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliFpvTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFpvTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliFpv $aliFpv Object to remove from the list of results
     *
     * @return $this|ChildAliFpvQuery The current query, for fluid interface
     */
    public function prune($aliFpv = null)
    {
        if ($aliFpv) {
            $this->addUsingAlias(AliFpvTableMap::COL_AID, $aliFpv->getAid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_fpv table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliFpvTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliFpvTableMap::clearInstancePool();
            AliFpvTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliFpvTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliFpvTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliFpvTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliFpvTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliFpvQuery
