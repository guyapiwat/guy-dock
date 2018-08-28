<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliBankNew as ChildAliBankNew;
use CciOrm\CciOrm\AliBankNewQuery as ChildAliBankNewQuery;
use CciOrm\CciOrm\Map\AliBankNewTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_bank_new' table.
 *
 *
 *
 * @method     ChildAliBankNewQuery orderByBankcode($order = Criteria::ASC) Order by the bankcode column
 * @method     ChildAliBankNewQuery orderByBankname($order = Criteria::ASC) Order by the bankname column
 * @method     ChildAliBankNewQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildAliBankNewQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliBankNewQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 *
 * @method     ChildAliBankNewQuery groupByBankcode() Group by the bankcode column
 * @method     ChildAliBankNewQuery groupByBankname() Group by the bankname column
 * @method     ChildAliBankNewQuery groupByCode() Group by the code column
 * @method     ChildAliBankNewQuery groupByUid() Group by the uid column
 * @method     ChildAliBankNewQuery groupByLocationbase() Group by the locationbase column
 *
 * @method     ChildAliBankNewQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliBankNewQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliBankNewQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliBankNewQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliBankNewQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliBankNewQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliBankNew findOne(ConnectionInterface $con = null) Return the first ChildAliBankNew matching the query
 * @method     ChildAliBankNew findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliBankNew matching the query, or a new ChildAliBankNew object populated from the query conditions when no match is found
 *
 * @method     ChildAliBankNew findOneByBankcode(int $bankcode) Return the first ChildAliBankNew filtered by the bankcode column
 * @method     ChildAliBankNew findOneByBankname(string $bankname) Return the first ChildAliBankNew filtered by the bankname column
 * @method     ChildAliBankNew findOneByCode(string $code) Return the first ChildAliBankNew filtered by the code column
 * @method     ChildAliBankNew findOneByUid(string $uid) Return the first ChildAliBankNew filtered by the uid column
 * @method     ChildAliBankNew findOneByLocationbase(int $locationbase) Return the first ChildAliBankNew filtered by the locationbase column *

 * @method     ChildAliBankNew requirePk($key, ConnectionInterface $con = null) Return the ChildAliBankNew by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBankNew requireOne(ConnectionInterface $con = null) Return the first ChildAliBankNew matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBankNew requireOneByBankcode(int $bankcode) Return the first ChildAliBankNew filtered by the bankcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBankNew requireOneByBankname(string $bankname) Return the first ChildAliBankNew filtered by the bankname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBankNew requireOneByCode(string $code) Return the first ChildAliBankNew filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBankNew requireOneByUid(string $uid) Return the first ChildAliBankNew filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBankNew requireOneByLocationbase(int $locationbase) Return the first ChildAliBankNew filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBankNew[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliBankNew objects based on current ModelCriteria
 * @method     ChildAliBankNew[]|ObjectCollection findByBankcode(int $bankcode) Return ChildAliBankNew objects filtered by the bankcode column
 * @method     ChildAliBankNew[]|ObjectCollection findByBankname(string $bankname) Return ChildAliBankNew objects filtered by the bankname column
 * @method     ChildAliBankNew[]|ObjectCollection findByCode(string $code) Return ChildAliBankNew objects filtered by the code column
 * @method     ChildAliBankNew[]|ObjectCollection findByUid(string $uid) Return ChildAliBankNew objects filtered by the uid column
 * @method     ChildAliBankNew[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliBankNew objects filtered by the locationbase column
 * @method     ChildAliBankNew[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliBankNewQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliBankNewQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliBankNew', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliBankNewQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliBankNewQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliBankNewQuery) {
            return $criteria;
        }
        $query = new ChildAliBankNewQuery();
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
     * @return ChildAliBankNew|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliBankNewTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliBankNewTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliBankNew A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT bankcode, bankname, code, uid, locationbase FROM ali_bank_new WHERE bankcode = :p0';
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
            /** @var ChildAliBankNew $obj */
            $obj = new ChildAliBankNew();
            $obj->hydrate($row);
            AliBankNewTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliBankNew|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliBankNewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliBankNewTableMap::COL_BANKCODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliBankNewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliBankNewTableMap::COL_BANKCODE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the bankcode column
     *
     * Example usage:
     * <code>
     * $query->filterByBankcode(1234); // WHERE bankcode = 1234
     * $query->filterByBankcode(array(12, 34)); // WHERE bankcode IN (12, 34)
     * $query->filterByBankcode(array('min' => 12)); // WHERE bankcode > 12
     * </code>
     *
     * @param     mixed $bankcode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBankNewQuery The current query, for fluid interface
     */
    public function filterByBankcode($bankcode = null, $comparison = null)
    {
        if (is_array($bankcode)) {
            $useMinMax = false;
            if (isset($bankcode['min'])) {
                $this->addUsingAlias(AliBankNewTableMap::COL_BANKCODE, $bankcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bankcode['max'])) {
                $this->addUsingAlias(AliBankNewTableMap::COL_BANKCODE, $bankcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBankNewTableMap::COL_BANKCODE, $bankcode, $comparison);
    }

    /**
     * Filter the query on the bankname column
     *
     * Example usage:
     * <code>
     * $query->filterByBankname('fooValue');   // WHERE bankname = 'fooValue'
     * $query->filterByBankname('%fooValue%', Criteria::LIKE); // WHERE bankname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBankNewQuery The current query, for fluid interface
     */
    public function filterByBankname($bankname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBankNewTableMap::COL_BANKNAME, $bankname, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%', Criteria::LIKE); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBankNewQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBankNewTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid('fooValue');   // WHERE uid = 'fooValue'
     * $query->filterByUid('%fooValue%', Criteria::LIKE); // WHERE uid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBankNewQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBankNewTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliBankNewQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliBankNewTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliBankNewTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBankNewTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliBankNew $aliBankNew Object to remove from the list of results
     *
     * @return $this|ChildAliBankNewQuery The current query, for fluid interface
     */
    public function prune($aliBankNew = null)
    {
        if ($aliBankNew) {
            $this->addUsingAlias(AliBankNewTableMap::COL_BANKCODE, $aliBankNew->getBankcode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_bank_new table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBankNewTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliBankNewTableMap::clearInstancePool();
            AliBankNewTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBankNewTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliBankNewTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliBankNewTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliBankNewTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliBankNewQuery
