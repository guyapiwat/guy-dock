<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\District as ChildDistrict;
use CciOrm\CciOrm\DistrictQuery as ChildDistrictQuery;
use CciOrm\CciOrm\Map\DistrictTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'district' table.
 *
 *
 *
 * @method     ChildDistrictQuery orderByDistrictid($order = Criteria::ASC) Order by the districtId column
 * @method     ChildDistrictQuery orderByDistrictname($order = Criteria::ASC) Order by the districtName column
 * @method     ChildDistrictQuery orderByDistrictnameeng($order = Criteria::ASC) Order by the districtNameEng column
 * @method     ChildDistrictQuery orderByAmphurid($order = Criteria::ASC) Order by the amphurId column
 * @method     ChildDistrictQuery orderByProvinceid($order = Criteria::ASC) Order by the provinceId column
 * @method     ChildDistrictQuery orderByZipcode($order = Criteria::ASC) Order by the zipcode column
 *
 * @method     ChildDistrictQuery groupByDistrictid() Group by the districtId column
 * @method     ChildDistrictQuery groupByDistrictname() Group by the districtName column
 * @method     ChildDistrictQuery groupByDistrictnameeng() Group by the districtNameEng column
 * @method     ChildDistrictQuery groupByAmphurid() Group by the amphurId column
 * @method     ChildDistrictQuery groupByProvinceid() Group by the provinceId column
 * @method     ChildDistrictQuery groupByZipcode() Group by the zipcode column
 *
 * @method     ChildDistrictQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDistrictQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDistrictQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDistrictQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDistrictQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDistrictQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDistrict findOne(ConnectionInterface $con = null) Return the first ChildDistrict matching the query
 * @method     ChildDistrict findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDistrict matching the query, or a new ChildDistrict object populated from the query conditions when no match is found
 *
 * @method     ChildDistrict findOneByDistrictid(int $districtId) Return the first ChildDistrict filtered by the districtId column
 * @method     ChildDistrict findOneByDistrictname(string $districtName) Return the first ChildDistrict filtered by the districtName column
 * @method     ChildDistrict findOneByDistrictnameeng(string $districtNameEng) Return the first ChildDistrict filtered by the districtNameEng column
 * @method     ChildDistrict findOneByAmphurid(int $amphurId) Return the first ChildDistrict filtered by the amphurId column
 * @method     ChildDistrict findOneByProvinceid(int $provinceId) Return the first ChildDistrict filtered by the provinceId column
 * @method     ChildDistrict findOneByZipcode(string $zipcode) Return the first ChildDistrict filtered by the zipcode column *

 * @method     ChildDistrict requirePk($key, ConnectionInterface $con = null) Return the ChildDistrict by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistrict requireOne(ConnectionInterface $con = null) Return the first ChildDistrict matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDistrict requireOneByDistrictid(int $districtId) Return the first ChildDistrict filtered by the districtId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistrict requireOneByDistrictname(string $districtName) Return the first ChildDistrict filtered by the districtName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistrict requireOneByDistrictnameeng(string $districtNameEng) Return the first ChildDistrict filtered by the districtNameEng column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistrict requireOneByAmphurid(int $amphurId) Return the first ChildDistrict filtered by the amphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistrict requireOneByProvinceid(int $provinceId) Return the first ChildDistrict filtered by the provinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistrict requireOneByZipcode(string $zipcode) Return the first ChildDistrict filtered by the zipcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDistrict[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDistrict objects based on current ModelCriteria
 * @method     ChildDistrict[]|ObjectCollection findByDistrictid(int $districtId) Return ChildDistrict objects filtered by the districtId column
 * @method     ChildDistrict[]|ObjectCollection findByDistrictname(string $districtName) Return ChildDistrict objects filtered by the districtName column
 * @method     ChildDistrict[]|ObjectCollection findByDistrictnameeng(string $districtNameEng) Return ChildDistrict objects filtered by the districtNameEng column
 * @method     ChildDistrict[]|ObjectCollection findByAmphurid(int $amphurId) Return ChildDistrict objects filtered by the amphurId column
 * @method     ChildDistrict[]|ObjectCollection findByProvinceid(int $provinceId) Return ChildDistrict objects filtered by the provinceId column
 * @method     ChildDistrict[]|ObjectCollection findByZipcode(string $zipcode) Return ChildDistrict objects filtered by the zipcode column
 * @method     ChildDistrict[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DistrictQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\DistrictQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\District', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDistrictQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDistrictQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDistrictQuery) {
            return $criteria;
        }
        $query = new ChildDistrictQuery();
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
     * @return ChildDistrict|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DistrictTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DistrictTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDistrict A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT districtId, districtName, districtNameEng, amphurId, provinceId, zipcode FROM district WHERE districtId = :p0';
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
            /** @var ChildDistrict $obj */
            $obj = new ChildDistrict();
            $obj->hydrate($row);
            DistrictTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDistrict|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDistrictQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DistrictTableMap::COL_DISTRICTID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDistrictQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DistrictTableMap::COL_DISTRICTID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the districtId column
     *
     * Example usage:
     * <code>
     * $query->filterByDistrictid(1234); // WHERE districtId = 1234
     * $query->filterByDistrictid(array(12, 34)); // WHERE districtId IN (12, 34)
     * $query->filterByDistrictid(array('min' => 12)); // WHERE districtId > 12
     * </code>
     *
     * @param     mixed $districtid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDistrictQuery The current query, for fluid interface
     */
    public function filterByDistrictid($districtid = null, $comparison = null)
    {
        if (is_array($districtid)) {
            $useMinMax = false;
            if (isset($districtid['min'])) {
                $this->addUsingAlias(DistrictTableMap::COL_DISTRICTID, $districtid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($districtid['max'])) {
                $this->addUsingAlias(DistrictTableMap::COL_DISTRICTID, $districtid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DistrictTableMap::COL_DISTRICTID, $districtid, $comparison);
    }

    /**
     * Filter the query on the districtName column
     *
     * Example usage:
     * <code>
     * $query->filterByDistrictname('fooValue');   // WHERE districtName = 'fooValue'
     * $query->filterByDistrictname('%fooValue%', Criteria::LIKE); // WHERE districtName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $districtname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDistrictQuery The current query, for fluid interface
     */
    public function filterByDistrictname($districtname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($districtname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DistrictTableMap::COL_DISTRICTNAME, $districtname, $comparison);
    }

    /**
     * Filter the query on the districtNameEng column
     *
     * Example usage:
     * <code>
     * $query->filterByDistrictnameeng('fooValue');   // WHERE districtNameEng = 'fooValue'
     * $query->filterByDistrictnameeng('%fooValue%', Criteria::LIKE); // WHERE districtNameEng LIKE '%fooValue%'
     * </code>
     *
     * @param     string $districtnameeng The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDistrictQuery The current query, for fluid interface
     */
    public function filterByDistrictnameeng($districtnameeng = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($districtnameeng)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DistrictTableMap::COL_DISTRICTNAMEENG, $districtnameeng, $comparison);
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
     * @return $this|ChildDistrictQuery The current query, for fluid interface
     */
    public function filterByAmphurid($amphurid = null, $comparison = null)
    {
        if (is_array($amphurid)) {
            $useMinMax = false;
            if (isset($amphurid['min'])) {
                $this->addUsingAlias(DistrictTableMap::COL_AMPHURID, $amphurid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amphurid['max'])) {
                $this->addUsingAlias(DistrictTableMap::COL_AMPHURID, $amphurid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DistrictTableMap::COL_AMPHURID, $amphurid, $comparison);
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
     * @return $this|ChildDistrictQuery The current query, for fluid interface
     */
    public function filterByProvinceid($provinceid = null, $comparison = null)
    {
        if (is_array($provinceid)) {
            $useMinMax = false;
            if (isset($provinceid['min'])) {
                $this->addUsingAlias(DistrictTableMap::COL_PROVINCEID, $provinceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($provinceid['max'])) {
                $this->addUsingAlias(DistrictTableMap::COL_PROVINCEID, $provinceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DistrictTableMap::COL_PROVINCEID, $provinceid, $comparison);
    }

    /**
     * Filter the query on the zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByZipcode('fooValue');   // WHERE zipcode = 'fooValue'
     * $query->filterByZipcode('%fooValue%', Criteria::LIKE); // WHERE zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zipcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDistrictQuery The current query, for fluid interface
     */
    public function filterByZipcode($zipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zipcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DistrictTableMap::COL_ZIPCODE, $zipcode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDistrict $district Object to remove from the list of results
     *
     * @return $this|ChildDistrictQuery The current query, for fluid interface
     */
    public function prune($district = null)
    {
        if ($district) {
            $this->addUsingAlias(DistrictTableMap::COL_DISTRICTID, $district->getDistrictid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the district table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DistrictTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DistrictTableMap::clearInstancePool();
            DistrictTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DistrictTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DistrictTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DistrictTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DistrictTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DistrictQuery
