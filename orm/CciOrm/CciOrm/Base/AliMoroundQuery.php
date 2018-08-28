<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliMoround as ChildAliMoround;
use CciOrm\CciOrm\AliMoroundQuery as ChildAliMoroundQuery;
use CciOrm\CciOrm\Map\AliMoroundTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_moround' table.
 *
 *
 *
 * @method     ChildAliMoroundQuery orderByRid($order = Criteria::ASC) Order by the rid column
 * @method     ChildAliMoroundQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliMoroundQuery orderByRdate($order = Criteria::ASC) Order by the rdate column
 * @method     ChildAliMoroundQuery orderByFsano($order = Criteria::ASC) Order by the fsano column
 * @method     ChildAliMoroundQuery orderByTsano($order = Criteria::ASC) Order by the tsano column
 * @method     ChildAliMoroundQuery orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliMoroundQuery orderByCalc($order = Criteria::ASC) Order by the calc column
 * @method     ChildAliMoroundQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 *
 * @method     ChildAliMoroundQuery groupByRid() Group by the rid column
 * @method     ChildAliMoroundQuery groupByRcode() Group by the rcode column
 * @method     ChildAliMoroundQuery groupByRdate() Group by the rdate column
 * @method     ChildAliMoroundQuery groupByFsano() Group by the fsano column
 * @method     ChildAliMoroundQuery groupByTsano() Group by the tsano column
 * @method     ChildAliMoroundQuery groupByPaydate() Group by the paydate column
 * @method     ChildAliMoroundQuery groupByCalc() Group by the calc column
 * @method     ChildAliMoroundQuery groupByRemark() Group by the remark column
 *
 * @method     ChildAliMoroundQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliMoroundQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliMoroundQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliMoroundQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliMoroundQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliMoroundQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliMoround findOne(ConnectionInterface $con = null) Return the first ChildAliMoround matching the query
 * @method     ChildAliMoround findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliMoround matching the query, or a new ChildAliMoround object populated from the query conditions when no match is found
 *
 * @method     ChildAliMoround findOneByRid(int $rid) Return the first ChildAliMoround filtered by the rid column
 * @method     ChildAliMoround findOneByRcode(string $rcode) Return the first ChildAliMoround filtered by the rcode column
 * @method     ChildAliMoround findOneByRdate(string $rdate) Return the first ChildAliMoround filtered by the rdate column
 * @method     ChildAliMoround findOneByFsano(string $fsano) Return the first ChildAliMoround filtered by the fsano column
 * @method     ChildAliMoround findOneByTsano(string $tsano) Return the first ChildAliMoround filtered by the tsano column
 * @method     ChildAliMoround findOneByPaydate(string $paydate) Return the first ChildAliMoround filtered by the paydate column
 * @method     ChildAliMoround findOneByCalc(string $calc) Return the first ChildAliMoround filtered by the calc column
 * @method     ChildAliMoround findOneByRemark(string $remark) Return the first ChildAliMoround filtered by the remark column *

 * @method     ChildAliMoround requirePk($key, ConnectionInterface $con = null) Return the ChildAliMoround by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMoround requireOne(ConnectionInterface $con = null) Return the first ChildAliMoround matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMoround requireOneByRid(int $rid) Return the first ChildAliMoround filtered by the rid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMoround requireOneByRcode(string $rcode) Return the first ChildAliMoround filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMoround requireOneByRdate(string $rdate) Return the first ChildAliMoround filtered by the rdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMoround requireOneByFsano(string $fsano) Return the first ChildAliMoround filtered by the fsano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMoround requireOneByTsano(string $tsano) Return the first ChildAliMoround filtered by the tsano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMoround requireOneByPaydate(string $paydate) Return the first ChildAliMoround filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMoround requireOneByCalc(string $calc) Return the first ChildAliMoround filtered by the calc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMoround requireOneByRemark(string $remark) Return the first ChildAliMoround filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMoround[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliMoround objects based on current ModelCriteria
 * @method     ChildAliMoround[]|ObjectCollection findByRid(int $rid) Return ChildAliMoround objects filtered by the rid column
 * @method     ChildAliMoround[]|ObjectCollection findByRcode(string $rcode) Return ChildAliMoround objects filtered by the rcode column
 * @method     ChildAliMoround[]|ObjectCollection findByRdate(string $rdate) Return ChildAliMoround objects filtered by the rdate column
 * @method     ChildAliMoround[]|ObjectCollection findByFsano(string $fsano) Return ChildAliMoround objects filtered by the fsano column
 * @method     ChildAliMoround[]|ObjectCollection findByTsano(string $tsano) Return ChildAliMoround objects filtered by the tsano column
 * @method     ChildAliMoround[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliMoround objects filtered by the paydate column
 * @method     ChildAliMoround[]|ObjectCollection findByCalc(string $calc) Return ChildAliMoround objects filtered by the calc column
 * @method     ChildAliMoround[]|ObjectCollection findByRemark(string $remark) Return ChildAliMoround objects filtered by the remark column
 * @method     ChildAliMoround[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliMoroundQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliMoroundQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliMoround', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliMoroundQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliMoroundQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliMoroundQuery) {
            return $criteria;
        }
        $query = new ChildAliMoroundQuery();
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
     * @return ChildAliMoround|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliMoroundTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliMoroundTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliMoround A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT rid, rcode, rdate, fsano, tsano, paydate, calc, remark FROM ali_moround WHERE rid = :p0';
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
            /** @var ChildAliMoround $obj */
            $obj = new ChildAliMoround();
            $obj->hydrate($row);
            AliMoroundTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliMoround|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliMoroundQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliMoroundTableMap::COL_RID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliMoroundQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliMoroundTableMap::COL_RID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the rid column
     *
     * Example usage:
     * <code>
     * $query->filterByRid(1234); // WHERE rid = 1234
     * $query->filterByRid(array(12, 34)); // WHERE rid IN (12, 34)
     * $query->filterByRid(array('min' => 12)); // WHERE rid > 12
     * </code>
     *
     * @param     mixed $rid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMoroundQuery The current query, for fluid interface
     */
    public function filterByRid($rid = null, $comparison = null)
    {
        if (is_array($rid)) {
            $useMinMax = false;
            if (isset($rid['min'])) {
                $this->addUsingAlias(AliMoroundTableMap::COL_RID, $rid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rid['max'])) {
                $this->addUsingAlias(AliMoroundTableMap::COL_RID, $rid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMoroundTableMap::COL_RID, $rid, $comparison);
    }

    /**
     * Filter the query on the rcode column
     *
     * Example usage:
     * <code>
     * $query->filterByRcode('fooValue');   // WHERE rcode = 'fooValue'
     * $query->filterByRcode('%fooValue%', Criteria::LIKE); // WHERE rcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMoroundQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMoroundTableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the rdate column
     *
     * Example usage:
     * <code>
     * $query->filterByRdate('2011-03-14'); // WHERE rdate = '2011-03-14'
     * $query->filterByRdate('now'); // WHERE rdate = '2011-03-14'
     * $query->filterByRdate(array('max' => 'yesterday')); // WHERE rdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $rdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMoroundQuery The current query, for fluid interface
     */
    public function filterByRdate($rdate = null, $comparison = null)
    {
        if (is_array($rdate)) {
            $useMinMax = false;
            if (isset($rdate['min'])) {
                $this->addUsingAlias(AliMoroundTableMap::COL_RDATE, $rdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rdate['max'])) {
                $this->addUsingAlias(AliMoroundTableMap::COL_RDATE, $rdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMoroundTableMap::COL_RDATE, $rdate, $comparison);
    }

    /**
     * Filter the query on the fsano column
     *
     * Example usage:
     * <code>
     * $query->filterByFsano('fooValue');   // WHERE fsano = 'fooValue'
     * $query->filterByFsano('%fooValue%', Criteria::LIKE); // WHERE fsano LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fsano The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMoroundQuery The current query, for fluid interface
     */
    public function filterByFsano($fsano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fsano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMoroundTableMap::COL_FSANO, $fsano, $comparison);
    }

    /**
     * Filter the query on the tsano column
     *
     * Example usage:
     * <code>
     * $query->filterByTsano('fooValue');   // WHERE tsano = 'fooValue'
     * $query->filterByTsano('%fooValue%', Criteria::LIKE); // WHERE tsano LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tsano The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMoroundQuery The current query, for fluid interface
     */
    public function filterByTsano($tsano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tsano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMoroundTableMap::COL_TSANO, $tsano, $comparison);
    }

    /**
     * Filter the query on the paydate column
     *
     * Example usage:
     * <code>
     * $query->filterByPaydate('2011-03-14'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate('now'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate(array('max' => 'yesterday')); // WHERE paydate > '2011-03-13'
     * </code>
     *
     * @param     mixed $paydate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMoroundQuery The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (is_array($paydate)) {
            $useMinMax = false;
            if (isset($paydate['min'])) {
                $this->addUsingAlias(AliMoroundTableMap::COL_PAYDATE, $paydate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paydate['max'])) {
                $this->addUsingAlias(AliMoroundTableMap::COL_PAYDATE, $paydate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMoroundTableMap::COL_PAYDATE, $paydate, $comparison);
    }

    /**
     * Filter the query on the calc column
     *
     * Example usage:
     * <code>
     * $query->filterByCalc('fooValue');   // WHERE calc = 'fooValue'
     * $query->filterByCalc('%fooValue%', Criteria::LIKE); // WHERE calc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $calc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMoroundQuery The current query, for fluid interface
     */
    public function filterByCalc($calc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($calc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMoroundTableMap::COL_CALC, $calc, $comparison);
    }

    /**
     * Filter the query on the remark column
     *
     * Example usage:
     * <code>
     * $query->filterByRemark('fooValue');   // WHERE remark = 'fooValue'
     * $query->filterByRemark('%fooValue%', Criteria::LIKE); // WHERE remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $remark The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMoroundQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMoroundTableMap::COL_REMARK, $remark, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliMoround $aliMoround Object to remove from the list of results
     *
     * @return $this|ChildAliMoroundQuery The current query, for fluid interface
     */
    public function prune($aliMoround = null)
    {
        if ($aliMoround) {
            $this->addUsingAlias(AliMoroundTableMap::COL_RID, $aliMoround->getRid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_moround table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMoroundTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliMoroundTableMap::clearInstancePool();
            AliMoroundTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMoroundTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliMoroundTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliMoroundTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliMoroundTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliMoroundQuery
