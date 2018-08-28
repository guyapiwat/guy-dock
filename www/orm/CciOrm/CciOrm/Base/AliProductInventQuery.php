<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliProductInvent as ChildAliProductInvent;
use CciOrm\CciOrm\AliProductInventQuery as ChildAliProductInventQuery;
use CciOrm\CciOrm\Map\AliProductInventTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_product_invent' table.
 *
 *
 *
 * @method     ChildAliProductInventQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliProductInventQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildAliProductInventQuery orderByQtys($order = Criteria::ASC) Order by the qtys column
 * @method     ChildAliProductInventQuery orderByQtyr($order = Criteria::ASC) Order by the qtyr column
 * @method     ChildAliProductInventQuery orderByQtyd($order = Criteria::ASC) Order by the qtyd column
 * @method     ChildAliProductInventQuery orderByUd($order = Criteria::ASC) Order by the ud column
 * @method     ChildAliProductInventQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 *
 * @method     ChildAliProductInventQuery groupByPcode() Group by the pcode column
 * @method     ChildAliProductInventQuery groupByQty() Group by the qty column
 * @method     ChildAliProductInventQuery groupByQtys() Group by the qtys column
 * @method     ChildAliProductInventQuery groupByQtyr() Group by the qtyr column
 * @method     ChildAliProductInventQuery groupByQtyd() Group by the qtyd column
 * @method     ChildAliProductInventQuery groupByUd() Group by the ud column
 * @method     ChildAliProductInventQuery groupByInvCode() Group by the inv_code column
 *
 * @method     ChildAliProductInventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliProductInventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliProductInventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliProductInventQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliProductInventQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliProductInventQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliProductInvent findOne(ConnectionInterface $con = null) Return the first ChildAliProductInvent matching the query
 * @method     ChildAliProductInvent findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliProductInvent matching the query, or a new ChildAliProductInvent object populated from the query conditions when no match is found
 *
 * @method     ChildAliProductInvent findOneByPcode(string $pcode) Return the first ChildAliProductInvent filtered by the pcode column
 * @method     ChildAliProductInvent findOneByQty(int $qty) Return the first ChildAliProductInvent filtered by the qty column
 * @method     ChildAliProductInvent findOneByQtys(int $qtys) Return the first ChildAliProductInvent filtered by the qtys column
 * @method     ChildAliProductInvent findOneByQtyr(int $qtyr) Return the first ChildAliProductInvent filtered by the qtyr column
 * @method     ChildAliProductInvent findOneByQtyd(int $qtyd) Return the first ChildAliProductInvent filtered by the qtyd column
 * @method     ChildAliProductInvent findOneByUd(string $ud) Return the first ChildAliProductInvent filtered by the ud column
 * @method     ChildAliProductInvent findOneByInvCode(string $inv_code) Return the first ChildAliProductInvent filtered by the inv_code column *

 * @method     ChildAliProductInvent requirePk($key, ConnectionInterface $con = null) Return the ChildAliProductInvent by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInvent requireOne(ConnectionInterface $con = null) Return the first ChildAliProductInvent matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliProductInvent requireOneByPcode(string $pcode) Return the first ChildAliProductInvent filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInvent requireOneByQty(int $qty) Return the first ChildAliProductInvent filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInvent requireOneByQtys(int $qtys) Return the first ChildAliProductInvent filtered by the qtys column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInvent requireOneByQtyr(int $qtyr) Return the first ChildAliProductInvent filtered by the qtyr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInvent requireOneByQtyd(int $qtyd) Return the first ChildAliProductInvent filtered by the qtyd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInvent requireOneByUd(string $ud) Return the first ChildAliProductInvent filtered by the ud column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInvent requireOneByInvCode(string $inv_code) Return the first ChildAliProductInvent filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliProductInvent[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliProductInvent objects based on current ModelCriteria
 * @method     ChildAliProductInvent[]|ObjectCollection findByPcode(string $pcode) Return ChildAliProductInvent objects filtered by the pcode column
 * @method     ChildAliProductInvent[]|ObjectCollection findByQty(int $qty) Return ChildAliProductInvent objects filtered by the qty column
 * @method     ChildAliProductInvent[]|ObjectCollection findByQtys(int $qtys) Return ChildAliProductInvent objects filtered by the qtys column
 * @method     ChildAliProductInvent[]|ObjectCollection findByQtyr(int $qtyr) Return ChildAliProductInvent objects filtered by the qtyr column
 * @method     ChildAliProductInvent[]|ObjectCollection findByQtyd(int $qtyd) Return ChildAliProductInvent objects filtered by the qtyd column
 * @method     ChildAliProductInvent[]|ObjectCollection findByUd(string $ud) Return ChildAliProductInvent objects filtered by the ud column
 * @method     ChildAliProductInvent[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliProductInvent objects filtered by the inv_code column
 * @method     ChildAliProductInvent[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliProductInventQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliProductInventQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliProductInvent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliProductInventQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliProductInventQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliProductInventQuery) {
            return $criteria;
        }
        $query = new ChildAliProductInventQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$pcode, $inv_code] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAliProductInvent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliProductInventTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliProductInventTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildAliProductInvent A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT pcode, qty, qtys, qtyr, qtyd, ud, inv_code FROM ali_product_invent WHERE pcode = :p0 AND inv_code = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAliProductInvent $obj */
            $obj = new ChildAliProductInvent();
            $obj->hydrate($row);
            AliProductInventTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildAliProductInvent|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildAliProductInventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(AliProductInventTableMap::COL_PCODE, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(AliProductInventTableMap::COL_INV_CODE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliProductInventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(AliProductInventTableMap::COL_PCODE, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(AliProductInventTableMap::COL_INV_CODE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildAliProductInventQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventTableMap::COL_PCODE, $pcode, $comparison);
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
     * @return $this|ChildAliProductInventQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliProductInventTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliProductInventTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Filter the query on the qtys column
     *
     * Example usage:
     * <code>
     * $query->filterByQtys(1234); // WHERE qtys = 1234
     * $query->filterByQtys(array(12, 34)); // WHERE qtys IN (12, 34)
     * $query->filterByQtys(array('min' => 12)); // WHERE qtys > 12
     * </code>
     *
     * @param     mixed $qtys The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductInventQuery The current query, for fluid interface
     */
    public function filterByQtys($qtys = null, $comparison = null)
    {
        if (is_array($qtys)) {
            $useMinMax = false;
            if (isset($qtys['min'])) {
                $this->addUsingAlias(AliProductInventTableMap::COL_QTYS, $qtys['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtys['max'])) {
                $this->addUsingAlias(AliProductInventTableMap::COL_QTYS, $qtys['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventTableMap::COL_QTYS, $qtys, $comparison);
    }

    /**
     * Filter the query on the qtyr column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyr(1234); // WHERE qtyr = 1234
     * $query->filterByQtyr(array(12, 34)); // WHERE qtyr IN (12, 34)
     * $query->filterByQtyr(array('min' => 12)); // WHERE qtyr > 12
     * </code>
     *
     * @param     mixed $qtyr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductInventQuery The current query, for fluid interface
     */
    public function filterByQtyr($qtyr = null, $comparison = null)
    {
        if (is_array($qtyr)) {
            $useMinMax = false;
            if (isset($qtyr['min'])) {
                $this->addUsingAlias(AliProductInventTableMap::COL_QTYR, $qtyr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyr['max'])) {
                $this->addUsingAlias(AliProductInventTableMap::COL_QTYR, $qtyr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventTableMap::COL_QTYR, $qtyr, $comparison);
    }

    /**
     * Filter the query on the qtyd column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyd(1234); // WHERE qtyd = 1234
     * $query->filterByQtyd(array(12, 34)); // WHERE qtyd IN (12, 34)
     * $query->filterByQtyd(array('min' => 12)); // WHERE qtyd > 12
     * </code>
     *
     * @param     mixed $qtyd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductInventQuery The current query, for fluid interface
     */
    public function filterByQtyd($qtyd = null, $comparison = null)
    {
        if (is_array($qtyd)) {
            $useMinMax = false;
            if (isset($qtyd['min'])) {
                $this->addUsingAlias(AliProductInventTableMap::COL_QTYD, $qtyd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyd['max'])) {
                $this->addUsingAlias(AliProductInventTableMap::COL_QTYD, $qtyd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventTableMap::COL_QTYD, $qtyd, $comparison);
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
     * @return $this|ChildAliProductInventQuery The current query, for fluid interface
     */
    public function filterByUd($ud = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ud)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventTableMap::COL_UD, $ud, $comparison);
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
     * @return $this|ChildAliProductInventQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliProductInvent $aliProductInvent Object to remove from the list of results
     *
     * @return $this|ChildAliProductInventQuery The current query, for fluid interface
     */
    public function prune($aliProductInvent = null)
    {
        if ($aliProductInvent) {
            $this->addCond('pruneCond0', $this->getAliasedColName(AliProductInventTableMap::COL_PCODE), $aliProductInvent->getPcode(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(AliProductInventTableMap::COL_INV_CODE), $aliProductInvent->getInvCode(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_product_invent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductInventTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliProductInventTableMap::clearInstancePool();
            AliProductInventTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductInventTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliProductInventTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliProductInventTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliProductInventTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliProductInventQuery
