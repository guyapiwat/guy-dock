<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliPaymentType as ChildAliPaymentType;
use CciOrm\CciOrm\AliPaymentTypeQuery as ChildAliPaymentTypeQuery;
use CciOrm\CciOrm\Map\AliPaymentTypeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_payment_type' table.
 *
 *
 *
 * @method     ChildAliPaymentTypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliPaymentTypeQuery orderByPaymentId($order = Criteria::ASC) Order by the payment_id column
 * @method     ChildAliPaymentTypeQuery orderByPayDesc($order = Criteria::ASC) Order by the pay_desc column
 * @method     ChildAliPaymentTypeQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliPaymentTypeQuery orderByShows($order = Criteria::ASC) Order by the shows column
 *
 * @method     ChildAliPaymentTypeQuery groupById() Group by the id column
 * @method     ChildAliPaymentTypeQuery groupByPaymentId() Group by the payment_id column
 * @method     ChildAliPaymentTypeQuery groupByPayDesc() Group by the pay_desc column
 * @method     ChildAliPaymentTypeQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliPaymentTypeQuery groupByShows() Group by the shows column
 *
 * @method     ChildAliPaymentTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliPaymentTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliPaymentTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliPaymentTypeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliPaymentTypeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliPaymentTypeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliPaymentType findOne(ConnectionInterface $con = null) Return the first ChildAliPaymentType matching the query
 * @method     ChildAliPaymentType findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliPaymentType matching the query, or a new ChildAliPaymentType object populated from the query conditions when no match is found
 *
 * @method     ChildAliPaymentType findOneById(int $id) Return the first ChildAliPaymentType filtered by the id column
 * @method     ChildAliPaymentType findOneByPaymentId(int $payment_id) Return the first ChildAliPaymentType filtered by the payment_id column
 * @method     ChildAliPaymentType findOneByPayDesc(string $pay_desc) Return the first ChildAliPaymentType filtered by the pay_desc column
 * @method     ChildAliPaymentType findOneByInvCode(string $inv_code) Return the first ChildAliPaymentType filtered by the inv_code column
 * @method     ChildAliPaymentType findOneByShows(int $shows) Return the first ChildAliPaymentType filtered by the shows column *

 * @method     ChildAliPaymentType requirePk($key, ConnectionInterface $con = null) Return the ChildAliPaymentType by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPaymentType requireOne(ConnectionInterface $con = null) Return the first ChildAliPaymentType matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPaymentType requireOneById(int $id) Return the first ChildAliPaymentType filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPaymentType requireOneByPaymentId(int $payment_id) Return the first ChildAliPaymentType filtered by the payment_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPaymentType requireOneByPayDesc(string $pay_desc) Return the first ChildAliPaymentType filtered by the pay_desc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPaymentType requireOneByInvCode(string $inv_code) Return the first ChildAliPaymentType filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPaymentType requireOneByShows(int $shows) Return the first ChildAliPaymentType filtered by the shows column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPaymentType[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliPaymentType objects based on current ModelCriteria
 * @method     ChildAliPaymentType[]|ObjectCollection findById(int $id) Return ChildAliPaymentType objects filtered by the id column
 * @method     ChildAliPaymentType[]|ObjectCollection findByPaymentId(int $payment_id) Return ChildAliPaymentType objects filtered by the payment_id column
 * @method     ChildAliPaymentType[]|ObjectCollection findByPayDesc(string $pay_desc) Return ChildAliPaymentType objects filtered by the pay_desc column
 * @method     ChildAliPaymentType[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliPaymentType objects filtered by the inv_code column
 * @method     ChildAliPaymentType[]|ObjectCollection findByShows(int $shows) Return ChildAliPaymentType objects filtered by the shows column
 * @method     ChildAliPaymentType[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliPaymentTypeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliPaymentTypeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliPaymentType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliPaymentTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliPaymentTypeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliPaymentTypeQuery) {
            return $criteria;
        }
        $query = new ChildAliPaymentTypeQuery();
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
     * @return ChildAliPaymentType|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliPaymentTypeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliPaymentTypeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliPaymentType A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, payment_id, pay_desc, inv_code, shows FROM ali_payment_type WHERE id = :p0';
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
            /** @var ChildAliPaymentType $obj */
            $obj = new ChildAliPaymentType();
            $obj->hydrate($row);
            AliPaymentTypeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliPaymentType|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliPaymentTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliPaymentTypeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliPaymentTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliPaymentTypeTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliPaymentTypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliPaymentTypeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliPaymentTypeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTypeTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the payment_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentId(1234); // WHERE payment_id = 1234
     * $query->filterByPaymentId(array(12, 34)); // WHERE payment_id IN (12, 34)
     * $query->filterByPaymentId(array('min' => 12)); // WHERE payment_id > 12
     * </code>
     *
     * @param     mixed $paymentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPaymentTypeQuery The current query, for fluid interface
     */
    public function filterByPaymentId($paymentId = null, $comparison = null)
    {
        if (is_array($paymentId)) {
            $useMinMax = false;
            if (isset($paymentId['min'])) {
                $this->addUsingAlias(AliPaymentTypeTableMap::COL_PAYMENT_ID, $paymentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentId['max'])) {
                $this->addUsingAlias(AliPaymentTypeTableMap::COL_PAYMENT_ID, $paymentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTypeTableMap::COL_PAYMENT_ID, $paymentId, $comparison);
    }

    /**
     * Filter the query on the pay_desc column
     *
     * Example usage:
     * <code>
     * $query->filterByPayDesc('fooValue');   // WHERE pay_desc = 'fooValue'
     * $query->filterByPayDesc('%fooValue%', Criteria::LIKE); // WHERE pay_desc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $payDesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPaymentTypeQuery The current query, for fluid interface
     */
    public function filterByPayDesc($payDesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payDesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTypeTableMap::COL_PAY_DESC, $payDesc, $comparison);
    }

    /**
     * Filter the query on the inv_code column
     *
     * Example usage:
     * <code>
     * $query->filterByInvCode('fooValue');   // WHERE inv_code = 'fooValue'
     * $query->filterByInvCode('%fooValue%', Criteria::LIKE); // WHERE inv_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPaymentTypeQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTypeTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Filter the query on the shows column
     *
     * Example usage:
     * <code>
     * $query->filterByShows(1234); // WHERE shows = 1234
     * $query->filterByShows(array(12, 34)); // WHERE shows IN (12, 34)
     * $query->filterByShows(array('min' => 12)); // WHERE shows > 12
     * </code>
     *
     * @param     mixed $shows The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPaymentTypeQuery The current query, for fluid interface
     */
    public function filterByShows($shows = null, $comparison = null)
    {
        if (is_array($shows)) {
            $useMinMax = false;
            if (isset($shows['min'])) {
                $this->addUsingAlias(AliPaymentTypeTableMap::COL_SHOWS, $shows['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shows['max'])) {
                $this->addUsingAlias(AliPaymentTypeTableMap::COL_SHOWS, $shows['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTypeTableMap::COL_SHOWS, $shows, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliPaymentType $aliPaymentType Object to remove from the list of results
     *
     * @return $this|ChildAliPaymentTypeQuery The current query, for fluid interface
     */
    public function prune($aliPaymentType = null)
    {
        if ($aliPaymentType) {
            $this->addUsingAlias(AliPaymentTypeTableMap::COL_ID, $aliPaymentType->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_payment_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPaymentTypeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliPaymentTypeTableMap::clearInstancePool();
            AliPaymentTypeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPaymentTypeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliPaymentTypeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliPaymentTypeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliPaymentTypeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliPaymentTypeQuery
