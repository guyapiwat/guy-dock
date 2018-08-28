<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliSupplier as ChildAliSupplier;
use CciOrm\CciOrm\AliSupplierQuery as ChildAliSupplierQuery;
use CciOrm\CciOrm\Map\AliSupplierTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_supplier' table.
 *
 *
 *
 * @method     ChildAliSupplierQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliSupplierQuery orderBySupCode($order = Criteria::ASC) Order by the sup_code column
 * @method     ChildAliSupplierQuery orderBySupDesc($order = Criteria::ASC) Order by the sup_desc column
 * @method     ChildAliSupplierQuery orderBySupType($order = Criteria::ASC) Order by the sup_type column
 * @method     ChildAliSupplierQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildAliSupplierQuery orderByDistrictid($order = Criteria::ASC) Order by the districtId column
 * @method     ChildAliSupplierQuery orderByAmphurid($order = Criteria::ASC) Order by the amphurId column
 * @method     ChildAliSupplierQuery orderByProvinceid($order = Criteria::ASC) Order by the provinceId column
 * @method     ChildAliSupplierQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     ChildAliSupplierQuery orderByUid($order = Criteria::ASC) Order by the uid column
 *
 * @method     ChildAliSupplierQuery groupById() Group by the id column
 * @method     ChildAliSupplierQuery groupBySupCode() Group by the sup_code column
 * @method     ChildAliSupplierQuery groupBySupDesc() Group by the sup_desc column
 * @method     ChildAliSupplierQuery groupBySupType() Group by the sup_type column
 * @method     ChildAliSupplierQuery groupByAddress() Group by the address column
 * @method     ChildAliSupplierQuery groupByDistrictid() Group by the districtId column
 * @method     ChildAliSupplierQuery groupByAmphurid() Group by the amphurId column
 * @method     ChildAliSupplierQuery groupByProvinceid() Group by the provinceId column
 * @method     ChildAliSupplierQuery groupByZip() Group by the zip column
 * @method     ChildAliSupplierQuery groupByUid() Group by the uid column
 *
 * @method     ChildAliSupplierQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliSupplierQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliSupplierQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliSupplierQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliSupplierQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliSupplierQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliSupplier findOne(ConnectionInterface $con = null) Return the first ChildAliSupplier matching the query
 * @method     ChildAliSupplier findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliSupplier matching the query, or a new ChildAliSupplier object populated from the query conditions when no match is found
 *
 * @method     ChildAliSupplier findOneById(int $id) Return the first ChildAliSupplier filtered by the id column
 * @method     ChildAliSupplier findOneBySupCode(string $sup_code) Return the first ChildAliSupplier filtered by the sup_code column
 * @method     ChildAliSupplier findOneBySupDesc(string $sup_desc) Return the first ChildAliSupplier filtered by the sup_desc column
 * @method     ChildAliSupplier findOneBySupType(int $sup_type) Return the first ChildAliSupplier filtered by the sup_type column
 * @method     ChildAliSupplier findOneByAddress(string $address) Return the first ChildAliSupplier filtered by the address column
 * @method     ChildAliSupplier findOneByDistrictid(int $districtId) Return the first ChildAliSupplier filtered by the districtId column
 * @method     ChildAliSupplier findOneByAmphurid(int $amphurId) Return the first ChildAliSupplier filtered by the amphurId column
 * @method     ChildAliSupplier findOneByProvinceid(int $provinceId) Return the first ChildAliSupplier filtered by the provinceId column
 * @method     ChildAliSupplier findOneByZip(string $zip) Return the first ChildAliSupplier filtered by the zip column
 * @method     ChildAliSupplier findOneByUid(int $uid) Return the first ChildAliSupplier filtered by the uid column *

 * @method     ChildAliSupplier requirePk($key, ConnectionInterface $con = null) Return the ChildAliSupplier by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSupplier requireOne(ConnectionInterface $con = null) Return the first ChildAliSupplier matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSupplier requireOneById(int $id) Return the first ChildAliSupplier filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSupplier requireOneBySupCode(string $sup_code) Return the first ChildAliSupplier filtered by the sup_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSupplier requireOneBySupDesc(string $sup_desc) Return the first ChildAliSupplier filtered by the sup_desc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSupplier requireOneBySupType(int $sup_type) Return the first ChildAliSupplier filtered by the sup_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSupplier requireOneByAddress(string $address) Return the first ChildAliSupplier filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSupplier requireOneByDistrictid(int $districtId) Return the first ChildAliSupplier filtered by the districtId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSupplier requireOneByAmphurid(int $amphurId) Return the first ChildAliSupplier filtered by the amphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSupplier requireOneByProvinceid(int $provinceId) Return the first ChildAliSupplier filtered by the provinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSupplier requireOneByZip(string $zip) Return the first ChildAliSupplier filtered by the zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSupplier requireOneByUid(int $uid) Return the first ChildAliSupplier filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSupplier[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliSupplier objects based on current ModelCriteria
 * @method     ChildAliSupplier[]|ObjectCollection findById(int $id) Return ChildAliSupplier objects filtered by the id column
 * @method     ChildAliSupplier[]|ObjectCollection findBySupCode(string $sup_code) Return ChildAliSupplier objects filtered by the sup_code column
 * @method     ChildAliSupplier[]|ObjectCollection findBySupDesc(string $sup_desc) Return ChildAliSupplier objects filtered by the sup_desc column
 * @method     ChildAliSupplier[]|ObjectCollection findBySupType(int $sup_type) Return ChildAliSupplier objects filtered by the sup_type column
 * @method     ChildAliSupplier[]|ObjectCollection findByAddress(string $address) Return ChildAliSupplier objects filtered by the address column
 * @method     ChildAliSupplier[]|ObjectCollection findByDistrictid(int $districtId) Return ChildAliSupplier objects filtered by the districtId column
 * @method     ChildAliSupplier[]|ObjectCollection findByAmphurid(int $amphurId) Return ChildAliSupplier objects filtered by the amphurId column
 * @method     ChildAliSupplier[]|ObjectCollection findByProvinceid(int $provinceId) Return ChildAliSupplier objects filtered by the provinceId column
 * @method     ChildAliSupplier[]|ObjectCollection findByZip(string $zip) Return ChildAliSupplier objects filtered by the zip column
 * @method     ChildAliSupplier[]|ObjectCollection findByUid(int $uid) Return ChildAliSupplier objects filtered by the uid column
 * @method     ChildAliSupplier[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliSupplierQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliSupplierQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliSupplier', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliSupplierQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliSupplierQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliSupplierQuery) {
            return $criteria;
        }
        $query = new ChildAliSupplierQuery();
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
     * @return ChildAliSupplier|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliSupplierTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliSupplierTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliSupplier A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, sup_code, sup_desc, sup_type, address, districtId, amphurId, provinceId, zip, uid FROM ali_supplier WHERE id = :p0';
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
            /** @var ChildAliSupplier $obj */
            $obj = new ChildAliSupplier();
            $obj->hydrate($row);
            AliSupplierTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliSupplier|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliSupplierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliSupplierTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliSupplierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliSupplierTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliSupplierQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliSupplierTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliSupplierTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSupplierTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the sup_code column
     *
     * Example usage:
     * <code>
     * $query->filterBySupCode('fooValue');   // WHERE sup_code = 'fooValue'
     * $query->filterBySupCode('%fooValue%', Criteria::LIKE); // WHERE sup_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $supCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSupplierQuery The current query, for fluid interface
     */
    public function filterBySupCode($supCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($supCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSupplierTableMap::COL_SUP_CODE, $supCode, $comparison);
    }

    /**
     * Filter the query on the sup_desc column
     *
     * Example usage:
     * <code>
     * $query->filterBySupDesc('fooValue');   // WHERE sup_desc = 'fooValue'
     * $query->filterBySupDesc('%fooValue%', Criteria::LIKE); // WHERE sup_desc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $supDesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSupplierQuery The current query, for fluid interface
     */
    public function filterBySupDesc($supDesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($supDesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSupplierTableMap::COL_SUP_DESC, $supDesc, $comparison);
    }

    /**
     * Filter the query on the sup_type column
     *
     * Example usage:
     * <code>
     * $query->filterBySupType(1234); // WHERE sup_type = 1234
     * $query->filterBySupType(array(12, 34)); // WHERE sup_type IN (12, 34)
     * $query->filterBySupType(array('min' => 12)); // WHERE sup_type > 12
     * </code>
     *
     * @param     mixed $supType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSupplierQuery The current query, for fluid interface
     */
    public function filterBySupType($supType = null, $comparison = null)
    {
        if (is_array($supType)) {
            $useMinMax = false;
            if (isset($supType['min'])) {
                $this->addUsingAlias(AliSupplierTableMap::COL_SUP_TYPE, $supType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($supType['max'])) {
                $this->addUsingAlias(AliSupplierTableMap::COL_SUP_TYPE, $supType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSupplierTableMap::COL_SUP_TYPE, $supType, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%', Criteria::LIKE); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSupplierQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSupplierTableMap::COL_ADDRESS, $address, $comparison);
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
     * @return $this|ChildAliSupplierQuery The current query, for fluid interface
     */
    public function filterByDistrictid($districtid = null, $comparison = null)
    {
        if (is_array($districtid)) {
            $useMinMax = false;
            if (isset($districtid['min'])) {
                $this->addUsingAlias(AliSupplierTableMap::COL_DISTRICTID, $districtid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($districtid['max'])) {
                $this->addUsingAlias(AliSupplierTableMap::COL_DISTRICTID, $districtid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSupplierTableMap::COL_DISTRICTID, $districtid, $comparison);
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
     * @return $this|ChildAliSupplierQuery The current query, for fluid interface
     */
    public function filterByAmphurid($amphurid = null, $comparison = null)
    {
        if (is_array($amphurid)) {
            $useMinMax = false;
            if (isset($amphurid['min'])) {
                $this->addUsingAlias(AliSupplierTableMap::COL_AMPHURID, $amphurid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amphurid['max'])) {
                $this->addUsingAlias(AliSupplierTableMap::COL_AMPHURID, $amphurid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSupplierTableMap::COL_AMPHURID, $amphurid, $comparison);
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
     * @return $this|ChildAliSupplierQuery The current query, for fluid interface
     */
    public function filterByProvinceid($provinceid = null, $comparison = null)
    {
        if (is_array($provinceid)) {
            $useMinMax = false;
            if (isset($provinceid['min'])) {
                $this->addUsingAlias(AliSupplierTableMap::COL_PROVINCEID, $provinceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($provinceid['max'])) {
                $this->addUsingAlias(AliSupplierTableMap::COL_PROVINCEID, $provinceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSupplierTableMap::COL_PROVINCEID, $provinceid, $comparison);
    }

    /**
     * Filter the query on the zip column
     *
     * Example usage:
     * <code>
     * $query->filterByZip('fooValue');   // WHERE zip = 'fooValue'
     * $query->filterByZip('%fooValue%', Criteria::LIKE); // WHERE zip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSupplierQuery The current query, for fluid interface
     */
    public function filterByZip($zip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSupplierTableMap::COL_ZIP, $zip, $comparison);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid(1234); // WHERE uid = 1234
     * $query->filterByUid(array(12, 34)); // WHERE uid IN (12, 34)
     * $query->filterByUid(array('min' => 12)); // WHERE uid > 12
     * </code>
     *
     * @param     mixed $uid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSupplierQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (is_array($uid)) {
            $useMinMax = false;
            if (isset($uid['min'])) {
                $this->addUsingAlias(AliSupplierTableMap::COL_UID, $uid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uid['max'])) {
                $this->addUsingAlias(AliSupplierTableMap::COL_UID, $uid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSupplierTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliSupplier $aliSupplier Object to remove from the list of results
     *
     * @return $this|ChildAliSupplierQuery The current query, for fluid interface
     */
    public function prune($aliSupplier = null)
    {
        if ($aliSupplier) {
            $this->addUsingAlias(AliSupplierTableMap::COL_ID, $aliSupplier->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_supplier table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSupplierTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliSupplierTableMap::clearInstancePool();
            AliSupplierTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSupplierTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliSupplierTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliSupplierTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliSupplierTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliSupplierQuery
