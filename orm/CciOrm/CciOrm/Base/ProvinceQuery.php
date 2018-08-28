<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\Province as ChildProvince;
use CciOrm\CciOrm\ProvinceQuery as ChildProvinceQuery;
use CciOrm\CciOrm\Map\ProvinceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'province' table.
 *
 *
 *
 * @method     ChildProvinceQuery orderByProvinceid($order = Criteria::ASC) Order by the provinceId column
 * @method     ChildProvinceQuery orderByProvincename($order = Criteria::ASC) Order by the provinceName column
 * @method     ChildProvinceQuery orderByProvincenameeng($order = Criteria::ASC) Order by the provinceNameEng column
 * @method     ChildProvinceQuery orderByRegion($order = Criteria::ASC) Order by the region column
 *
 * @method     ChildProvinceQuery groupByProvinceid() Group by the provinceId column
 * @method     ChildProvinceQuery groupByProvincename() Group by the provinceName column
 * @method     ChildProvinceQuery groupByProvincenameeng() Group by the provinceNameEng column
 * @method     ChildProvinceQuery groupByRegion() Group by the region column
 *
 * @method     ChildProvinceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProvinceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProvinceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProvinceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProvinceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProvinceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProvince findOne(ConnectionInterface $con = null) Return the first ChildProvince matching the query
 * @method     ChildProvince findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProvince matching the query, or a new ChildProvince object populated from the query conditions when no match is found
 *
 * @method     ChildProvince findOneByProvinceid(int $provinceId) Return the first ChildProvince filtered by the provinceId column
 * @method     ChildProvince findOneByProvincename(string $provinceName) Return the first ChildProvince filtered by the provinceName column
 * @method     ChildProvince findOneByProvincenameeng(string $provinceNameEng) Return the first ChildProvince filtered by the provinceNameEng column
 * @method     ChildProvince findOneByRegion(string $region) Return the first ChildProvince filtered by the region column *

 * @method     ChildProvince requirePk($key, ConnectionInterface $con = null) Return the ChildProvince by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvince requireOne(ConnectionInterface $con = null) Return the first ChildProvince matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProvince requireOneByProvinceid(int $provinceId) Return the first ChildProvince filtered by the provinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvince requireOneByProvincename(string $provinceName) Return the first ChildProvince filtered by the provinceName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvince requireOneByProvincenameeng(string $provinceNameEng) Return the first ChildProvince filtered by the provinceNameEng column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvince requireOneByRegion(string $region) Return the first ChildProvince filtered by the region column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProvince[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProvince objects based on current ModelCriteria
 * @method     ChildProvince[]|ObjectCollection findByProvinceid(int $provinceId) Return ChildProvince objects filtered by the provinceId column
 * @method     ChildProvince[]|ObjectCollection findByProvincename(string $provinceName) Return ChildProvince objects filtered by the provinceName column
 * @method     ChildProvince[]|ObjectCollection findByProvincenameeng(string $provinceNameEng) Return ChildProvince objects filtered by the provinceNameEng column
 * @method     ChildProvince[]|ObjectCollection findByRegion(string $region) Return ChildProvince objects filtered by the region column
 * @method     ChildProvince[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ProvinceQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\ProvinceQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\Province', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProvinceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProvinceQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildProvinceQuery) {
            return $criteria;
        }
        $query = new ChildProvinceQuery();
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
     * @return ChildProvince|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProvinceTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ProvinceTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildProvince A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT provinceId, provinceName, provinceNameEng, region FROM province WHERE provinceId = :p0';
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
            /** @var ChildProvince $obj */
            $obj = new ChildProvince();
            $obj->hydrate($row);
            ProvinceTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildProvince|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProvinceTableMap::COL_PROVINCEID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProvinceTableMap::COL_PROVINCEID, $keys, Criteria::IN);
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
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByProvinceid($provinceid = null, $comparison = null)
    {
        if (is_array($provinceid)) {
            $useMinMax = false;
            if (isset($provinceid['min'])) {
                $this->addUsingAlias(ProvinceTableMap::COL_PROVINCEID, $provinceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($provinceid['max'])) {
                $this->addUsingAlias(ProvinceTableMap::COL_PROVINCEID, $provinceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinceTableMap::COL_PROVINCEID, $provinceid, $comparison);
    }

    /**
     * Filter the query on the provinceName column
     *
     * Example usage:
     * <code>
     * $query->filterByProvincename('fooValue');   // WHERE provinceName = 'fooValue'
     * $query->filterByProvincename('%fooValue%', Criteria::LIKE); // WHERE provinceName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $provincename The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByProvincename($provincename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($provincename)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinceTableMap::COL_PROVINCENAME, $provincename, $comparison);
    }

    /**
     * Filter the query on the provinceNameEng column
     *
     * Example usage:
     * <code>
     * $query->filterByProvincenameeng('fooValue');   // WHERE provinceNameEng = 'fooValue'
     * $query->filterByProvincenameeng('%fooValue%', Criteria::LIKE); // WHERE provinceNameEng LIKE '%fooValue%'
     * </code>
     *
     * @param     string $provincenameeng The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByProvincenameeng($provincenameeng = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($provincenameeng)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinceTableMap::COL_PROVINCENAMEENG, $provincenameeng, $comparison);
    }

    /**
     * Filter the query on the region column
     *
     * Example usage:
     * <code>
     * $query->filterByRegion('fooValue');   // WHERE region = 'fooValue'
     * $query->filterByRegion('%fooValue%', Criteria::LIKE); // WHERE region LIKE '%fooValue%'
     * </code>
     *
     * @param     string $region The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function filterByRegion($region = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($region)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinceTableMap::COL_REGION, $region, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildProvince $province Object to remove from the list of results
     *
     * @return $this|ChildProvinceQuery The current query, for fluid interface
     */
    public function prune($province = null)
    {
        if ($province) {
            $this->addUsingAlias(ProvinceTableMap::COL_PROVINCEID, $province->getProvinceid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the province table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProvinceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProvinceTableMap::clearInstancePool();
            ProvinceTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ProvinceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProvinceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProvinceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProvinceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ProvinceQuery
