<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliBc as ChildAliBc;
use CciOrm\CciOrm\AliBcQuery as ChildAliBcQuery;
use CciOrm\CciOrm\Map\AliBcTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_bc' table.
 *
 *
 *
 * @method     ChildAliBcQuery orderByBid($order = Criteria::ASC) Order by the bid column
 * @method     ChildAliBcQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliBcQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliBcQuery orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliBcQuery orderByRolL($order = Criteria::ASC) Order by the rol_l column
 * @method     ChildAliBcQuery orderByRolR($order = Criteria::ASC) Order by the rol_r column
 *
 * @method     ChildAliBcQuery groupByBid() Group by the bid column
 * @method     ChildAliBcQuery groupByRcode() Group by the rcode column
 * @method     ChildAliBcQuery groupByMcode() Group by the mcode column
 * @method     ChildAliBcQuery groupByUpaCode() Group by the upa_code column
 * @method     ChildAliBcQuery groupByRolL() Group by the rol_l column
 * @method     ChildAliBcQuery groupByRolR() Group by the rol_r column
 *
 * @method     ChildAliBcQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliBcQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliBcQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliBcQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliBcQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliBcQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliBc findOne(ConnectionInterface $con = null) Return the first ChildAliBc matching the query
 * @method     ChildAliBc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliBc matching the query, or a new ChildAliBc object populated from the query conditions when no match is found
 *
 * @method     ChildAliBc findOneByBid(int $bid) Return the first ChildAliBc filtered by the bid column
 * @method     ChildAliBc findOneByRcode(int $rcode) Return the first ChildAliBc filtered by the rcode column
 * @method     ChildAliBc findOneByMcode(string $mcode) Return the first ChildAliBc filtered by the mcode column
 * @method     ChildAliBc findOneByUpaCode(string $upa_code) Return the first ChildAliBc filtered by the upa_code column
 * @method     ChildAliBc findOneByRolL(string $rol_l) Return the first ChildAliBc filtered by the rol_l column
 * @method     ChildAliBc findOneByRolR(string $rol_r) Return the first ChildAliBc filtered by the rol_r column *

 * @method     ChildAliBc requirePk($key, ConnectionInterface $con = null) Return the ChildAliBc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBc requireOne(ConnectionInterface $con = null) Return the first ChildAliBc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBc requireOneByBid(int $bid) Return the first ChildAliBc filtered by the bid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBc requireOneByRcode(int $rcode) Return the first ChildAliBc filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBc requireOneByMcode(string $mcode) Return the first ChildAliBc filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBc requireOneByUpaCode(string $upa_code) Return the first ChildAliBc filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBc requireOneByRolL(string $rol_l) Return the first ChildAliBc filtered by the rol_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBc requireOneByRolR(string $rol_r) Return the first ChildAliBc filtered by the rol_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliBc objects based on current ModelCriteria
 * @method     ChildAliBc[]|ObjectCollection findByBid(int $bid) Return ChildAliBc objects filtered by the bid column
 * @method     ChildAliBc[]|ObjectCollection findByRcode(int $rcode) Return ChildAliBc objects filtered by the rcode column
 * @method     ChildAliBc[]|ObjectCollection findByMcode(string $mcode) Return ChildAliBc objects filtered by the mcode column
 * @method     ChildAliBc[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliBc objects filtered by the upa_code column
 * @method     ChildAliBc[]|ObjectCollection findByRolL(string $rol_l) Return ChildAliBc objects filtered by the rol_l column
 * @method     ChildAliBc[]|ObjectCollection findByRolR(string $rol_r) Return ChildAliBc objects filtered by the rol_r column
 * @method     ChildAliBc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliBcQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliBcQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliBc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliBcQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliBcQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliBcQuery) {
            return $criteria;
        }
        $query = new ChildAliBcQuery();
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
     * @return ChildAliBc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliBcTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliBcTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliBc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT bid, rcode, mcode, upa_code, rol_l, rol_r FROM ali_bc WHERE bid = :p0';
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
            /** @var ChildAliBc $obj */
            $obj = new ChildAliBc();
            $obj->hydrate($row);
            AliBcTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliBc|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliBcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliBcTableMap::COL_BID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliBcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliBcTableMap::COL_BID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the bid column
     *
     * Example usage:
     * <code>
     * $query->filterByBid(1234); // WHERE bid = 1234
     * $query->filterByBid(array(12, 34)); // WHERE bid IN (12, 34)
     * $query->filterByBid(array('min' => 12)); // WHERE bid > 12
     * </code>
     *
     * @param     mixed $bid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBcQuery The current query, for fluid interface
     */
    public function filterByBid($bid = null, $comparison = null)
    {
        if (is_array($bid)) {
            $useMinMax = false;
            if (isset($bid['min'])) {
                $this->addUsingAlias(AliBcTableMap::COL_BID, $bid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bid['max'])) {
                $this->addUsingAlias(AliBcTableMap::COL_BID, $bid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBcTableMap::COL_BID, $bid, $comparison);
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
     * @return $this|ChildAliBcQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliBcTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliBcTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBcTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliBcQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBcTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the upa_code column
     *
     * Example usage:
     * <code>
     * $query->filterByUpaCode('fooValue');   // WHERE upa_code = 'fooValue'
     * $query->filterByUpaCode('%fooValue%', Criteria::LIKE); // WHERE upa_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $upaCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBcQuery The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBcTableMap::COL_UPA_CODE, $upaCode, $comparison);
    }

    /**
     * Filter the query on the rol_l column
     *
     * Example usage:
     * <code>
     * $query->filterByRolL(1234); // WHERE rol_l = 1234
     * $query->filterByRolL(array(12, 34)); // WHERE rol_l IN (12, 34)
     * $query->filterByRolL(array('min' => 12)); // WHERE rol_l > 12
     * </code>
     *
     * @param     mixed $rolL The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBcQuery The current query, for fluid interface
     */
    public function filterByRolL($rolL = null, $comparison = null)
    {
        if (is_array($rolL)) {
            $useMinMax = false;
            if (isset($rolL['min'])) {
                $this->addUsingAlias(AliBcTableMap::COL_ROL_L, $rolL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rolL['max'])) {
                $this->addUsingAlias(AliBcTableMap::COL_ROL_L, $rolL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBcTableMap::COL_ROL_L, $rolL, $comparison);
    }

    /**
     * Filter the query on the rol_r column
     *
     * Example usage:
     * <code>
     * $query->filterByRolR(1234); // WHERE rol_r = 1234
     * $query->filterByRolR(array(12, 34)); // WHERE rol_r IN (12, 34)
     * $query->filterByRolR(array('min' => 12)); // WHERE rol_r > 12
     * </code>
     *
     * @param     mixed $rolR The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBcQuery The current query, for fluid interface
     */
    public function filterByRolR($rolR = null, $comparison = null)
    {
        if (is_array($rolR)) {
            $useMinMax = false;
            if (isset($rolR['min'])) {
                $this->addUsingAlias(AliBcTableMap::COL_ROL_R, $rolR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rolR['max'])) {
                $this->addUsingAlias(AliBcTableMap::COL_ROL_R, $rolR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBcTableMap::COL_ROL_R, $rolR, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliBc $aliBc Object to remove from the list of results
     *
     * @return $this|ChildAliBcQuery The current query, for fluid interface
     */
    public function prune($aliBc = null)
    {
        if ($aliBc) {
            $this->addUsingAlias(AliBcTableMap::COL_BID, $aliBc->getBid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_bc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBcTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliBcTableMap::clearInstancePool();
            AliBcTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBcTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliBcTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliBcTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliBcTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliBcQuery
