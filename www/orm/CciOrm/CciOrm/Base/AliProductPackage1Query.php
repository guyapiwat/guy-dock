<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliProductPackage1 as ChildAliProductPackage1;
use CciOrm\CciOrm\AliProductPackage1Query as ChildAliProductPackage1Query;
use CciOrm\CciOrm\Map\AliProductPackage1TableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_product_package1' table.
 *
 *
 *
 * @method     ChildAliProductPackage1Query orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliProductPackage1Query orderByPackage($order = Criteria::ASC) Order by the package column
 * @method     ChildAliProductPackage1Query orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliProductPackage1Query orderByPdesc($order = Criteria::ASC) Order by the pdesc column
 * @method     ChildAliProductPackage1Query orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildAliProductPackage1Query orderByMdate($order = Criteria::ASC) Order by the mdate column
 *
 * @method     ChildAliProductPackage1Query groupById() Group by the id column
 * @method     ChildAliProductPackage1Query groupByPackage() Group by the package column
 * @method     ChildAliProductPackage1Query groupByPcode() Group by the pcode column
 * @method     ChildAliProductPackage1Query groupByPdesc() Group by the pdesc column
 * @method     ChildAliProductPackage1Query groupByQty() Group by the qty column
 * @method     ChildAliProductPackage1Query groupByMdate() Group by the mdate column
 *
 * @method     ChildAliProductPackage1Query leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliProductPackage1Query rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliProductPackage1Query innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliProductPackage1Query leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliProductPackage1Query rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliProductPackage1Query innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliProductPackage1 findOne(ConnectionInterface $con = null) Return the first ChildAliProductPackage1 matching the query
 * @method     ChildAliProductPackage1 findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliProductPackage1 matching the query, or a new ChildAliProductPackage1 object populated from the query conditions when no match is found
 *
 * @method     ChildAliProductPackage1 findOneById(int $id) Return the first ChildAliProductPackage1 filtered by the id column
 * @method     ChildAliProductPackage1 findOneByPackage(string $package) Return the first ChildAliProductPackage1 filtered by the package column
 * @method     ChildAliProductPackage1 findOneByPcode(string $pcode) Return the first ChildAliProductPackage1 filtered by the pcode column
 * @method     ChildAliProductPackage1 findOneByPdesc(string $pdesc) Return the first ChildAliProductPackage1 filtered by the pdesc column
 * @method     ChildAliProductPackage1 findOneByQty(int $qty) Return the first ChildAliProductPackage1 filtered by the qty column
 * @method     ChildAliProductPackage1 findOneByMdate(string $mdate) Return the first ChildAliProductPackage1 filtered by the mdate column *

 * @method     ChildAliProductPackage1 requirePk($key, ConnectionInterface $con = null) Return the ChildAliProductPackage1 by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage1 requireOne(ConnectionInterface $con = null) Return the first ChildAliProductPackage1 matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliProductPackage1 requireOneById(int $id) Return the first ChildAliProductPackage1 filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage1 requireOneByPackage(string $package) Return the first ChildAliProductPackage1 filtered by the package column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage1 requireOneByPcode(string $pcode) Return the first ChildAliProductPackage1 filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage1 requireOneByPdesc(string $pdesc) Return the first ChildAliProductPackage1 filtered by the pdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage1 requireOneByQty(int $qty) Return the first ChildAliProductPackage1 filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage1 requireOneByMdate(string $mdate) Return the first ChildAliProductPackage1 filtered by the mdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliProductPackage1[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliProductPackage1 objects based on current ModelCriteria
 * @method     ChildAliProductPackage1[]|ObjectCollection findById(int $id) Return ChildAliProductPackage1 objects filtered by the id column
 * @method     ChildAliProductPackage1[]|ObjectCollection findByPackage(string $package) Return ChildAliProductPackage1 objects filtered by the package column
 * @method     ChildAliProductPackage1[]|ObjectCollection findByPcode(string $pcode) Return ChildAliProductPackage1 objects filtered by the pcode column
 * @method     ChildAliProductPackage1[]|ObjectCollection findByPdesc(string $pdesc) Return ChildAliProductPackage1 objects filtered by the pdesc column
 * @method     ChildAliProductPackage1[]|ObjectCollection findByQty(int $qty) Return ChildAliProductPackage1 objects filtered by the qty column
 * @method     ChildAliProductPackage1[]|ObjectCollection findByMdate(string $mdate) Return ChildAliProductPackage1 objects filtered by the mdate column
 * @method     ChildAliProductPackage1[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliProductPackage1Query extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliProductPackage1Query object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliProductPackage1', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliProductPackage1Query object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliProductPackage1Query
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliProductPackage1Query) {
            return $criteria;
        }
        $query = new ChildAliProductPackage1Query();
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
     * @return ChildAliProductPackage1|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliProductPackage1TableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliProductPackage1TableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliProductPackage1 A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, package, pcode, pdesc, qty, mdate FROM ali_product_package1 WHERE id = :p0';
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
            /** @var ChildAliProductPackage1 $obj */
            $obj = new ChildAliProductPackage1();
            $obj->hydrate($row);
            AliProductPackage1TableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliProductPackage1|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliProductPackage1Query The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliProductPackage1TableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliProductPackage1Query The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliProductPackage1TableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliProductPackage1Query The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliProductPackage1TableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliProductPackage1TableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackage1TableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the package column
     *
     * Example usage:
     * <code>
     * $query->filterByPackage('fooValue');   // WHERE package = 'fooValue'
     * $query->filterByPackage('%fooValue%', Criteria::LIKE); // WHERE package LIKE '%fooValue%'
     * </code>
     *
     * @param     string $package The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackage1Query The current query, for fluid interface
     */
    public function filterByPackage($package = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($package)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackage1TableMap::COL_PACKAGE, $package, $comparison);
    }

    /**
     * Filter the query on the pcode column
     *
     * Example usage:
     * <code>
     * $query->filterByPcode('fooValue');   // WHERE pcode = 'fooValue'
     * $query->filterByPcode('%fooValue%', Criteria::LIKE); // WHERE pcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackage1Query The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackage1TableMap::COL_PCODE, $pcode, $comparison);
    }

    /**
     * Filter the query on the pdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByPdesc('fooValue');   // WHERE pdesc = 'fooValue'
     * $query->filterByPdesc('%fooValue%', Criteria::LIKE); // WHERE pdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackage1Query The current query, for fluid interface
     */
    public function filterByPdesc($pdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackage1TableMap::COL_PDESC, $pdesc, $comparison);
    }

    /**
     * Filter the query on the qty column
     *
     * Example usage:
     * <code>
     * $query->filterByQty(1234); // WHERE qty = 1234
     * $query->filterByQty(array(12, 34)); // WHERE qty IN (12, 34)
     * $query->filterByQty(array('min' => 12)); // WHERE qty > 12
     * </code>
     *
     * @param     mixed $qty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackage1Query The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliProductPackage1TableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliProductPackage1TableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackage1TableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Filter the query on the mdate column
     *
     * Example usage:
     * <code>
     * $query->filterByMdate('2011-03-14'); // WHERE mdate = '2011-03-14'
     * $query->filterByMdate('now'); // WHERE mdate = '2011-03-14'
     * $query->filterByMdate(array('max' => 'yesterday')); // WHERE mdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $mdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackage1Query The current query, for fluid interface
     */
    public function filterByMdate($mdate = null, $comparison = null)
    {
        if (is_array($mdate)) {
            $useMinMax = false;
            if (isset($mdate['min'])) {
                $this->addUsingAlias(AliProductPackage1TableMap::COL_MDATE, $mdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mdate['max'])) {
                $this->addUsingAlias(AliProductPackage1TableMap::COL_MDATE, $mdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackage1TableMap::COL_MDATE, $mdate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliProductPackage1 $aliProductPackage1 Object to remove from the list of results
     *
     * @return $this|ChildAliProductPackage1Query The current query, for fluid interface
     */
    public function prune($aliProductPackage1 = null)
    {
        if ($aliProductPackage1) {
            $this->addUsingAlias(AliProductPackage1TableMap::COL_ID, $aliProductPackage1->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_product_package1 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductPackage1TableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliProductPackage1TableMap::clearInstancePool();
            AliProductPackage1TableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductPackage1TableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliProductPackage1TableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliProductPackage1TableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliProductPackage1TableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliProductPackage1Query
