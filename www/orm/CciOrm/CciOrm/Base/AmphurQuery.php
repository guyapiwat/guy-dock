<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\Amphur as ChildAmphur;
use CciOrm\CciOrm\AmphurQuery as ChildAmphurQuery;
use CciOrm\CciOrm\Map\AmphurTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'amphur' table.
 *
 *
 *
 * @method     ChildAmphurQuery orderByAmphurid($order = Criteria::ASC) Order by the amphurId column
 * @method     ChildAmphurQuery orderByAmphurname($order = Criteria::ASC) Order by the amphurName column
 * @method     ChildAmphurQuery orderByAmphurnameeng($order = Criteria::ASC) Order by the amphurNameEng column
 * @method     ChildAmphurQuery orderByProvinceid($order = Criteria::ASC) Order by the provinceId column
 *
 * @method     ChildAmphurQuery groupByAmphurid() Group by the amphurId column
 * @method     ChildAmphurQuery groupByAmphurname() Group by the amphurName column
 * @method     ChildAmphurQuery groupByAmphurnameeng() Group by the amphurNameEng column
 * @method     ChildAmphurQuery groupByProvinceid() Group by the provinceId column
 *
 * @method     ChildAmphurQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAmphurQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAmphurQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAmphurQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAmphurQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAmphurQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAmphur findOne(ConnectionInterface $con = null) Return the first ChildAmphur matching the query
 * @method     ChildAmphur findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAmphur matching the query, or a new ChildAmphur object populated from the query conditions when no match is found
 *
 * @method     ChildAmphur findOneByAmphurid(int $amphurId) Return the first ChildAmphur filtered by the amphurId column
 * @method     ChildAmphur findOneByAmphurname(string $amphurName) Return the first ChildAmphur filtered by the amphurName column
 * @method     ChildAmphur findOneByAmphurnameeng(string $amphurNameEng) Return the first ChildAmphur filtered by the amphurNameEng column
 * @method     ChildAmphur findOneByProvinceid(int $provinceId) Return the first ChildAmphur filtered by the provinceId column *

 * @method     ChildAmphur requirePk($key, ConnectionInterface $con = null) Return the ChildAmphur by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAmphur requireOne(ConnectionInterface $con = null) Return the first ChildAmphur matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAmphur requireOneByAmphurid(int $amphurId) Return the first ChildAmphur filtered by the amphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAmphur requireOneByAmphurname(string $amphurName) Return the first ChildAmphur filtered by the amphurName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAmphur requireOneByAmphurnameeng(string $amphurNameEng) Return the first ChildAmphur filtered by the amphurNameEng column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAmphur requireOneByProvinceid(int $provinceId) Return the first ChildAmphur filtered by the provinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAmphur[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAmphur objects based on current ModelCriteria
 * @method     ChildAmphur[]|ObjectCollection findByAmphurid(int $amphurId) Return ChildAmphur objects filtered by the amphurId column
 * @method     ChildAmphur[]|ObjectCollection findByAmphurname(string $amphurName) Return ChildAmphur objects filtered by the amphurName column
 * @method     ChildAmphur[]|ObjectCollection findByAmphurnameeng(string $amphurNameEng) Return ChildAmphur objects filtered by the amphurNameEng column
 * @method     ChildAmphur[]|ObjectCollection findByProvinceid(int $provinceId) Return ChildAmphur objects filtered by the provinceId column
 * @method     ChildAmphur[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AmphurQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AmphurQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\Amphur', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAmphurQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAmphurQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAmphurQuery) {
            return $criteria;
        }
        $query = new ChildAmphurQuery();
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
     * @return ChildAmphur|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AmphurTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AmphurTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAmphur A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT amphurId, amphurName, amphurNameEng, provinceId FROM amphur WHERE amphurId = :p0';
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
            /** @var ChildAmphur $obj */
            $obj = new ChildAmphur();
            $obj->hydrate($row);
            AmphurTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAmphur|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAmphurQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AmphurTableMap::COL_AMPHURID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAmphurQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AmphurTableMap::COL_AMPHURID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the amphurId column
     *
     * Example usage:
     * <code>
     * $query->filterByAmphurid(1234); // WHERE amphurId = 1234
     * $query->filterByAmphurid(array(12, 34)); // WHERE amphurId IN (12, 34)
     * $query->filterByAmphurid(array('min' => 12)); // WHERE amphurId > 12
     * </code>
     *
     * @param     mixed $amphurid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmphurQuery The current query, for fluid interface
     */
    public function filterByAmphurid($amphurid = null, $comparison = null)
    {
        if (is_array($amphurid)) {
            $useMinMax = false;
            if (isset($amphurid['min'])) {
                $this->addUsingAlias(AmphurTableMap::COL_AMPHURID, $amphurid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amphurid['max'])) {
                $this->addUsingAlias(AmphurTableMap::COL_AMPHURID, $amphurid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AmphurTableMap::COL_AMPHURID, $amphurid, $comparison);
    }

    /**
     * Filter the query on the amphurName column
     *
     * Example usage:
     * <code>
     * $query->filterByAmphurname('fooValue');   // WHERE amphurName = 'fooValue'
     * $query->filterByAmphurname('%fooValue%', Criteria::LIKE); // WHERE amphurName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $amphurname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmphurQuery The current query, for fluid interface
     */
    public function filterByAmphurname($amphurname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($amphurname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AmphurTableMap::COL_AMPHURNAME, $amphurname, $comparison);
    }

    /**
     * Filter the query on the amphurNameEng column
     *
     * Example usage:
     * <code>
     * $query->filterByAmphurnameeng('fooValue');   // WHERE amphurNameEng = 'fooValue'
     * $query->filterByAmphurnameeng('%fooValue%', Criteria::LIKE); // WHERE amphurNameEng LIKE '%fooValue%'
     * </code>
     *
     * @param     string $amphurnameeng The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmphurQuery The current query, for fluid interface
     */
    public function filterByAmphurnameeng($amphurnameeng = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($amphurnameeng)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AmphurTableMap::COL_AMPHURNAMEENG, $amphurnameeng, $comparison);
    }

    /**
     * Filter the query on the provinceId column
     *
     * Example usage:
     * <code>
     * $query->filterByProvinceid(1234); // WHERE provinceId = 1234
     * $query->filterByProvinceid(array(12, 34)); // WHERE provinceId IN (12, 34)
     * $query->filterByProvinceid(array('min' => 12)); // WHERE provinceId > 12
     * </code>
     *
     * @param     mixed $provinceid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmphurQuery The current query, for fluid interface
     */
    public function filterByProvinceid($provinceid = null, $comparison = null)
    {
        if (is_array($provinceid)) {
            $useMinMax = false;
            if (isset($provinceid['min'])) {
                $this->addUsingAlias(AmphurTableMap::COL_PROVINCEID, $provinceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($provinceid['max'])) {
                $this->addUsingAlias(AmphurTableMap::COL_PROVINCEID, $provinceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AmphurTableMap::COL_PROVINCEID, $provinceid, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAmphur $amphur Object to remove from the list of results
     *
     * @return $this|ChildAmphurQuery The current query, for fluid interface
     */
    public function prune($amphur = null)
    {
        if ($amphur) {
            $this->addUsingAlias(AmphurTableMap::COL_AMPHURID, $amphur->getAmphurid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the amphur table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AmphurTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AmphurTableMap::clearInstancePool();
            AmphurTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AmphurTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AmphurTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AmphurTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AmphurTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AmphurQuery
