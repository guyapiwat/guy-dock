<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliPairbonus as ChildAliPairbonus;
use CciOrm\CciOrm\AliPairbonusQuery as ChildAliPairbonusQuery;
use CciOrm\CciOrm\Map\AliPairbonusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_pairbonus' table.
 *
 *
 *
 * @method     ChildAliPairbonusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliPairbonusQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliPairbonusQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliPairbonusQuery orderByPair($order = Criteria::ASC) Order by the pair column
 * @method     ChildAliPairbonusQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliPairbonusQuery orderByTax($order = Criteria::ASC) Order by the tax column
 * @method     ChildAliPairbonusQuery orderByBonus($order = Criteria::ASC) Order by the bonus column
 *
 * @method     ChildAliPairbonusQuery groupById() Group by the id column
 * @method     ChildAliPairbonusQuery groupByRcode() Group by the rcode column
 * @method     ChildAliPairbonusQuery groupByMcode() Group by the mcode column
 * @method     ChildAliPairbonusQuery groupByPair() Group by the pair column
 * @method     ChildAliPairbonusQuery groupByTotal() Group by the total column
 * @method     ChildAliPairbonusQuery groupByTax() Group by the tax column
 * @method     ChildAliPairbonusQuery groupByBonus() Group by the bonus column
 *
 * @method     ChildAliPairbonusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliPairbonusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliPairbonusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliPairbonusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliPairbonusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliPairbonusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliPairbonus findOne(ConnectionInterface $con = null) Return the first ChildAliPairbonus matching the query
 * @method     ChildAliPairbonus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliPairbonus matching the query, or a new ChildAliPairbonus object populated from the query conditions when no match is found
 *
 * @method     ChildAliPairbonus findOneById(int $id) Return the first ChildAliPairbonus filtered by the id column
 * @method     ChildAliPairbonus findOneByRcode(int $rcode) Return the first ChildAliPairbonus filtered by the rcode column
 * @method     ChildAliPairbonus findOneByMcode(string $mcode) Return the first ChildAliPairbonus filtered by the mcode column
 * @method     ChildAliPairbonus findOneByPair(string $pair) Return the first ChildAliPairbonus filtered by the pair column
 * @method     ChildAliPairbonus findOneByTotal(string $total) Return the first ChildAliPairbonus filtered by the total column
 * @method     ChildAliPairbonus findOneByTax(string $tax) Return the first ChildAliPairbonus filtered by the tax column
 * @method     ChildAliPairbonus findOneByBonus(string $bonus) Return the first ChildAliPairbonus filtered by the bonus column *

 * @method     ChildAliPairbonus requirePk($key, ConnectionInterface $con = null) Return the ChildAliPairbonus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPairbonus requireOne(ConnectionInterface $con = null) Return the first ChildAliPairbonus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPairbonus requireOneById(int $id) Return the first ChildAliPairbonus filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPairbonus requireOneByRcode(int $rcode) Return the first ChildAliPairbonus filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPairbonus requireOneByMcode(string $mcode) Return the first ChildAliPairbonus filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPairbonus requireOneByPair(string $pair) Return the first ChildAliPairbonus filtered by the pair column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPairbonus requireOneByTotal(string $total) Return the first ChildAliPairbonus filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPairbonus requireOneByTax(string $tax) Return the first ChildAliPairbonus filtered by the tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPairbonus requireOneByBonus(string $bonus) Return the first ChildAliPairbonus filtered by the bonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPairbonus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliPairbonus objects based on current ModelCriteria
 * @method     ChildAliPairbonus[]|ObjectCollection findById(int $id) Return ChildAliPairbonus objects filtered by the id column
 * @method     ChildAliPairbonus[]|ObjectCollection findByRcode(int $rcode) Return ChildAliPairbonus objects filtered by the rcode column
 * @method     ChildAliPairbonus[]|ObjectCollection findByMcode(string $mcode) Return ChildAliPairbonus objects filtered by the mcode column
 * @method     ChildAliPairbonus[]|ObjectCollection findByPair(string $pair) Return ChildAliPairbonus objects filtered by the pair column
 * @method     ChildAliPairbonus[]|ObjectCollection findByTotal(string $total) Return ChildAliPairbonus objects filtered by the total column
 * @method     ChildAliPairbonus[]|ObjectCollection findByTax(string $tax) Return ChildAliPairbonus objects filtered by the tax column
 * @method     ChildAliPairbonus[]|ObjectCollection findByBonus(string $bonus) Return ChildAliPairbonus objects filtered by the bonus column
 * @method     ChildAliPairbonus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliPairbonusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliPairbonusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliPairbonus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliPairbonusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliPairbonusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliPairbonusQuery) {
            return $criteria;
        }
        $query = new ChildAliPairbonusQuery();
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
     * @return ChildAliPairbonus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliPairbonusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliPairbonusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliPairbonus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, mcode, pair, total, tax, bonus FROM ali_pairbonus WHERE id = :p0';
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
            /** @var ChildAliPairbonus $obj */
            $obj = new ChildAliPairbonus();
            $obj->hydrate($row);
            AliPairbonusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliPairbonus|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliPairbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliPairbonusTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliPairbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliPairbonusTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliPairbonusQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliPairbonusTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliPairbonusTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPairbonusTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliPairbonusQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliPairbonusTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliPairbonusTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPairbonusTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliPairbonusQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPairbonusTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the pair column
     *
     * Example usage:
     * <code>
     * $query->filterByPair(1234); // WHERE pair = 1234
     * $query->filterByPair(array(12, 34)); // WHERE pair IN (12, 34)
     * $query->filterByPair(array('min' => 12)); // WHERE pair > 12
     * </code>
     *
     * @param     mixed $pair The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPairbonusQuery The current query, for fluid interface
     */
    public function filterByPair($pair = null, $comparison = null)
    {
        if (is_array($pair)) {
            $useMinMax = false;
            if (isset($pair['min'])) {
                $this->addUsingAlias(AliPairbonusTableMap::COL_PAIR, $pair['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pair['max'])) {
                $this->addUsingAlias(AliPairbonusTableMap::COL_PAIR, $pair['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPairbonusTableMap::COL_PAIR, $pair, $comparison);
    }

    /**
     * Filter the query on the total column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal(1234); // WHERE total = 1234
     * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
     * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
     * </code>
     *
     * @param     mixed $total The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPairbonusQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliPairbonusTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliPairbonusTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPairbonusTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the tax column
     *
     * Example usage:
     * <code>
     * $query->filterByTax(1234); // WHERE tax = 1234
     * $query->filterByTax(array(12, 34)); // WHERE tax IN (12, 34)
     * $query->filterByTax(array('min' => 12)); // WHERE tax > 12
     * </code>
     *
     * @param     mixed $tax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPairbonusQuery The current query, for fluid interface
     */
    public function filterByTax($tax = null, $comparison = null)
    {
        if (is_array($tax)) {
            $useMinMax = false;
            if (isset($tax['min'])) {
                $this->addUsingAlias(AliPairbonusTableMap::COL_TAX, $tax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tax['max'])) {
                $this->addUsingAlias(AliPairbonusTableMap::COL_TAX, $tax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPairbonusTableMap::COL_TAX, $tax, $comparison);
    }

    /**
     * Filter the query on the bonus column
     *
     * Example usage:
     * <code>
     * $query->filterByBonus(1234); // WHERE bonus = 1234
     * $query->filterByBonus(array(12, 34)); // WHERE bonus IN (12, 34)
     * $query->filterByBonus(array('min' => 12)); // WHERE bonus > 12
     * </code>
     *
     * @param     mixed $bonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPairbonusQuery The current query, for fluid interface
     */
    public function filterByBonus($bonus = null, $comparison = null)
    {
        if (is_array($bonus)) {
            $useMinMax = false;
            if (isset($bonus['min'])) {
                $this->addUsingAlias(AliPairbonusTableMap::COL_BONUS, $bonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bonus['max'])) {
                $this->addUsingAlias(AliPairbonusTableMap::COL_BONUS, $bonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPairbonusTableMap::COL_BONUS, $bonus, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliPairbonus $aliPairbonus Object to remove from the list of results
     *
     * @return $this|ChildAliPairbonusQuery The current query, for fluid interface
     */
    public function prune($aliPairbonus = null)
    {
        if ($aliPairbonus) {
            $this->addUsingAlias(AliPairbonusTableMap::COL_ID, $aliPairbonus->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_pairbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPairbonusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliPairbonusTableMap::clearInstancePool();
            AliPairbonusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPairbonusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliPairbonusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliPairbonusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliPairbonusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliPairbonusQuery
