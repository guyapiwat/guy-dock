<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliBbuy as ChildAliBbuy;
use CciOrm\CciOrm\AliBbuyQuery as ChildAliBbuyQuery;
use CciOrm\CciOrm\Map\AliBbuyTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_bbuy' table.
 *
 *
 *
 * @method     ChildAliBbuyQuery orderByBbuyId($order = Criteria::ASC) Order by the bbuy_ID column
 * @method     ChildAliBbuyQuery orderByBbuyDate($order = Criteria::ASC) Order by the bbuy_Date column
 * @method     ChildAliBbuyQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliBbuyQuery orderByBbuyQua($order = Criteria::ASC) Order by the bbuy_Qua column
 * @method     ChildAliBbuyQuery orderByBbuyBalance($order = Criteria::ASC) Order by the bbuy_Balance column
 * @method     ChildAliBbuyQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 *
 * @method     ChildAliBbuyQuery groupByBbuyId() Group by the bbuy_ID column
 * @method     ChildAliBbuyQuery groupByBbuyDate() Group by the bbuy_Date column
 * @method     ChildAliBbuyQuery groupByPcode() Group by the pcode column
 * @method     ChildAliBbuyQuery groupByBbuyQua() Group by the bbuy_Qua column
 * @method     ChildAliBbuyQuery groupByBbuyBalance() Group by the bbuy_Balance column
 * @method     ChildAliBbuyQuery groupByTxtoption() Group by the txtoption column
 *
 * @method     ChildAliBbuyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliBbuyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliBbuyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliBbuyQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliBbuyQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliBbuyQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliBbuy findOne(ConnectionInterface $con = null) Return the first ChildAliBbuy matching the query
 * @method     ChildAliBbuy findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliBbuy matching the query, or a new ChildAliBbuy object populated from the query conditions when no match is found
 *
 * @method     ChildAliBbuy findOneByBbuyId(int $bbuy_ID) Return the first ChildAliBbuy filtered by the bbuy_ID column
 * @method     ChildAliBbuy findOneByBbuyDate(string $bbuy_Date) Return the first ChildAliBbuy filtered by the bbuy_Date column
 * @method     ChildAliBbuy findOneByPcode(string $pcode) Return the first ChildAliBbuy filtered by the pcode column
 * @method     ChildAliBbuy findOneByBbuyQua(int $bbuy_Qua) Return the first ChildAliBbuy filtered by the bbuy_Qua column
 * @method     ChildAliBbuy findOneByBbuyBalance(int $bbuy_Balance) Return the first ChildAliBbuy filtered by the bbuy_Balance column
 * @method     ChildAliBbuy findOneByTxtoption(string $txtoption) Return the first ChildAliBbuy filtered by the txtoption column *

 * @method     ChildAliBbuy requirePk($key, ConnectionInterface $con = null) Return the ChildAliBbuy by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBbuy requireOne(ConnectionInterface $con = null) Return the first ChildAliBbuy matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBbuy requireOneByBbuyId(int $bbuy_ID) Return the first ChildAliBbuy filtered by the bbuy_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBbuy requireOneByBbuyDate(string $bbuy_Date) Return the first ChildAliBbuy filtered by the bbuy_Date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBbuy requireOneByPcode(string $pcode) Return the first ChildAliBbuy filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBbuy requireOneByBbuyQua(int $bbuy_Qua) Return the first ChildAliBbuy filtered by the bbuy_Qua column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBbuy requireOneByBbuyBalance(int $bbuy_Balance) Return the first ChildAliBbuy filtered by the bbuy_Balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBbuy requireOneByTxtoption(string $txtoption) Return the first ChildAliBbuy filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBbuy[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliBbuy objects based on current ModelCriteria
 * @method     ChildAliBbuy[]|ObjectCollection findByBbuyId(int $bbuy_ID) Return ChildAliBbuy objects filtered by the bbuy_ID column
 * @method     ChildAliBbuy[]|ObjectCollection findByBbuyDate(string $bbuy_Date) Return ChildAliBbuy objects filtered by the bbuy_Date column
 * @method     ChildAliBbuy[]|ObjectCollection findByPcode(string $pcode) Return ChildAliBbuy objects filtered by the pcode column
 * @method     ChildAliBbuy[]|ObjectCollection findByBbuyQua(int $bbuy_Qua) Return ChildAliBbuy objects filtered by the bbuy_Qua column
 * @method     ChildAliBbuy[]|ObjectCollection findByBbuyBalance(int $bbuy_Balance) Return ChildAliBbuy objects filtered by the bbuy_Balance column
 * @method     ChildAliBbuy[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliBbuy objects filtered by the txtoption column
 * @method     ChildAliBbuy[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliBbuyQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliBbuyQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliBbuy', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliBbuyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliBbuyQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliBbuyQuery) {
            return $criteria;
        }
        $query = new ChildAliBbuyQuery();
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
     * @return ChildAliBbuy|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliBbuyTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliBbuyTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliBbuy A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT bbuy_ID, bbuy_Date, pcode, bbuy_Qua, bbuy_Balance, txtoption FROM ali_bbuy WHERE bbuy_ID = :p0';
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
            /** @var ChildAliBbuy $obj */
            $obj = new ChildAliBbuy();
            $obj->hydrate($row);
            AliBbuyTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliBbuy|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliBbuyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliBbuyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the bbuy_ID column
     *
     * Example usage:
     * <code>
     * $query->filterByBbuyId(1234); // WHERE bbuy_ID = 1234
     * $query->filterByBbuyId(array(12, 34)); // WHERE bbuy_ID IN (12, 34)
     * $query->filterByBbuyId(array('min' => 12)); // WHERE bbuy_ID > 12
     * </code>
     *
     * @param     mixed $bbuyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBbuyQuery The current query, for fluid interface
     */
    public function filterByBbuyId($bbuyId = null, $comparison = null)
    {
        if (is_array($bbuyId)) {
            $useMinMax = false;
            if (isset($bbuyId['min'])) {
                $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_ID, $bbuyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bbuyId['max'])) {
                $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_ID, $bbuyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_ID, $bbuyId, $comparison);
    }

    /**
     * Filter the query on the bbuy_Date column
     *
     * Example usage:
     * <code>
     * $query->filterByBbuyDate('2011-03-14'); // WHERE bbuy_Date = '2011-03-14'
     * $query->filterByBbuyDate('now'); // WHERE bbuy_Date = '2011-03-14'
     * $query->filterByBbuyDate(array('max' => 'yesterday')); // WHERE bbuy_Date > '2011-03-13'
     * </code>
     *
     * @param     mixed $bbuyDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBbuyQuery The current query, for fluid interface
     */
    public function filterByBbuyDate($bbuyDate = null, $comparison = null)
    {
        if (is_array($bbuyDate)) {
            $useMinMax = false;
            if (isset($bbuyDate['min'])) {
                $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_DATE, $bbuyDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bbuyDate['max'])) {
                $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_DATE, $bbuyDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_DATE, $bbuyDate, $comparison);
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
     * @return $this|ChildAliBbuyQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBbuyTableMap::COL_PCODE, $pcode, $comparison);
    }

    /**
     * Filter the query on the bbuy_Qua column
     *
     * Example usage:
     * <code>
     * $query->filterByBbuyQua(1234); // WHERE bbuy_Qua = 1234
     * $query->filterByBbuyQua(array(12, 34)); // WHERE bbuy_Qua IN (12, 34)
     * $query->filterByBbuyQua(array('min' => 12)); // WHERE bbuy_Qua > 12
     * </code>
     *
     * @param     mixed $bbuyQua The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBbuyQuery The current query, for fluid interface
     */
    public function filterByBbuyQua($bbuyQua = null, $comparison = null)
    {
        if (is_array($bbuyQua)) {
            $useMinMax = false;
            if (isset($bbuyQua['min'])) {
                $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_QUA, $bbuyQua['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bbuyQua['max'])) {
                $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_QUA, $bbuyQua['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_QUA, $bbuyQua, $comparison);
    }

    /**
     * Filter the query on the bbuy_Balance column
     *
     * Example usage:
     * <code>
     * $query->filterByBbuyBalance(1234); // WHERE bbuy_Balance = 1234
     * $query->filterByBbuyBalance(array(12, 34)); // WHERE bbuy_Balance IN (12, 34)
     * $query->filterByBbuyBalance(array('min' => 12)); // WHERE bbuy_Balance > 12
     * </code>
     *
     * @param     mixed $bbuyBalance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBbuyQuery The current query, for fluid interface
     */
    public function filterByBbuyBalance($bbuyBalance = null, $comparison = null)
    {
        if (is_array($bbuyBalance)) {
            $useMinMax = false;
            if (isset($bbuyBalance['min'])) {
                $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_BALANCE, $bbuyBalance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bbuyBalance['max'])) {
                $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_BALANCE, $bbuyBalance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_BALANCE, $bbuyBalance, $comparison);
    }

    /**
     * Filter the query on the txtoption column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtoption('fooValue');   // WHERE txtoption = 'fooValue'
     * $query->filterByTxtoption('%fooValue%', Criteria::LIKE); // WHERE txtoption LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtoption The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBbuyQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBbuyTableMap::COL_TXTOPTION, $txtoption, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliBbuy $aliBbuy Object to remove from the list of results
     *
     * @return $this|ChildAliBbuyQuery The current query, for fluid interface
     */
    public function prune($aliBbuy = null)
    {
        if ($aliBbuy) {
            $this->addUsingAlias(AliBbuyTableMap::COL_BBUY_ID, $aliBbuy->getBbuyId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_bbuy table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBbuyTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliBbuyTableMap::clearInstancePool();
            AliBbuyTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBbuyTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliBbuyTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliBbuyTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliBbuyTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliBbuyQuery
