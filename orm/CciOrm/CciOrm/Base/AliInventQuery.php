<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliInvent as ChildAliInvent;
use CciOrm\CciOrm\AliInventQuery as ChildAliInventQuery;
use CciOrm\CciOrm\Map\AliInventTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_invent' table.
 *
 *
 *
 * @method     ChildAliInventQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliInventQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliInventQuery orderByInvDesc($order = Criteria::ASC) Order by the inv_desc column
 * @method     ChildAliInventQuery orderByInvType($order = Criteria::ASC) Order by the inv_type column
 * @method     ChildAliInventQuery orderByCodeRef($order = Criteria::ASC) Order by the code_ref column
 * @method     ChildAliInventQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildAliInventQuery orderByDistrictid($order = Criteria::ASC) Order by the districtId column
 * @method     ChildAliInventQuery orderByAmphurid($order = Criteria::ASC) Order by the amphurId column
 * @method     ChildAliInventQuery orderByProvinceid($order = Criteria::ASC) Order by the provinceId column
 * @method     ChildAliInventQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     ChildAliInventQuery orderByHomeT($order = Criteria::ASC) Order by the home_t column
 * @method     ChildAliInventQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliInventQuery orderBySync($order = Criteria::ASC) Order by the sync column
 * @method     ChildAliInventQuery orderByWeb($order = Criteria::ASC) Order by the web column
 * @method     ChildAliInventQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliInventQuery orderByVoucher($order = Criteria::ASC) Order by the voucher column
 * @method     ChildAliInventQuery orderByBewallet($order = Criteria::ASC) Order by the bewallet column
 * @method     ChildAliInventQuery orderByBvoucher($order = Criteria::ASC) Order by the bvoucher column
 * @method     ChildAliInventQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildAliInventQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliInventQuery orderByBillRef($order = Criteria::ASC) Order by the bill_ref column
 * @method     ChildAliInventQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method     ChildAliInventQuery orderByNoTax($order = Criteria::ASC) Order by the no_tax column
 * @method     ChildAliInventQuery orderByType($order = Criteria::ASC) Order by the type column
 *
 * @method     ChildAliInventQuery groupById() Group by the id column
 * @method     ChildAliInventQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliInventQuery groupByInvDesc() Group by the inv_desc column
 * @method     ChildAliInventQuery groupByInvType() Group by the inv_type column
 * @method     ChildAliInventQuery groupByCodeRef() Group by the code_ref column
 * @method     ChildAliInventQuery groupByAddress() Group by the address column
 * @method     ChildAliInventQuery groupByDistrictid() Group by the districtId column
 * @method     ChildAliInventQuery groupByAmphurid() Group by the amphurId column
 * @method     ChildAliInventQuery groupByProvinceid() Group by the provinceId column
 * @method     ChildAliInventQuery groupByZip() Group by the zip column
 * @method     ChildAliInventQuery groupByHomeT() Group by the home_t column
 * @method     ChildAliInventQuery groupByUid() Group by the uid column
 * @method     ChildAliInventQuery groupBySync() Group by the sync column
 * @method     ChildAliInventQuery groupByWeb() Group by the web column
 * @method     ChildAliInventQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliInventQuery groupByVoucher() Group by the voucher column
 * @method     ChildAliInventQuery groupByBewallet() Group by the bewallet column
 * @method     ChildAliInventQuery groupByBvoucher() Group by the bvoucher column
 * @method     ChildAliInventQuery groupByDiscount() Group by the discount column
 * @method     ChildAliInventQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliInventQuery groupByBillRef() Group by the bill_ref column
 * @method     ChildAliInventQuery groupByFax() Group by the fax column
 * @method     ChildAliInventQuery groupByNoTax() Group by the no_tax column
 * @method     ChildAliInventQuery groupByType() Group by the type column
 *
 * @method     ChildAliInventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliInventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliInventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliInventQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliInventQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliInventQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliInvent findOne(ConnectionInterface $con = null) Return the first ChildAliInvent matching the query
 * @method     ChildAliInvent findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliInvent matching the query, or a new ChildAliInvent object populated from the query conditions when no match is found
 *
 * @method     ChildAliInvent findOneById(int $id) Return the first ChildAliInvent filtered by the id column
 * @method     ChildAliInvent findOneByInvCode(string $inv_code) Return the first ChildAliInvent filtered by the inv_code column
 * @method     ChildAliInvent findOneByInvDesc(string $inv_desc) Return the first ChildAliInvent filtered by the inv_desc column
 * @method     ChildAliInvent findOneByInvType(int $inv_type) Return the first ChildAliInvent filtered by the inv_type column
 * @method     ChildAliInvent findOneByCodeRef(string $code_ref) Return the first ChildAliInvent filtered by the code_ref column
 * @method     ChildAliInvent findOneByAddress(string $address) Return the first ChildAliInvent filtered by the address column
 * @method     ChildAliInvent findOneByDistrictid(int $districtId) Return the first ChildAliInvent filtered by the districtId column
 * @method     ChildAliInvent findOneByAmphurid(int $amphurId) Return the first ChildAliInvent filtered by the amphurId column
 * @method     ChildAliInvent findOneByProvinceid(int $provinceId) Return the first ChildAliInvent filtered by the provinceId column
 * @method     ChildAliInvent findOneByZip(string $zip) Return the first ChildAliInvent filtered by the zip column
 * @method     ChildAliInvent findOneByHomeT(string $home_t) Return the first ChildAliInvent filtered by the home_t column
 * @method     ChildAliInvent findOneByUid(int $uid) Return the first ChildAliInvent filtered by the uid column
 * @method     ChildAliInvent findOneBySync(string $sync) Return the first ChildAliInvent filtered by the sync column
 * @method     ChildAliInvent findOneByWeb(string $web) Return the first ChildAliInvent filtered by the web column
 * @method     ChildAliInvent findOneByEwallet(string $ewallet) Return the first ChildAliInvent filtered by the ewallet column
 * @method     ChildAliInvent findOneByVoucher(string $voucher) Return the first ChildAliInvent filtered by the voucher column
 * @method     ChildAliInvent findOneByBewallet(string $bewallet) Return the first ChildAliInvent filtered by the bewallet column
 * @method     ChildAliInvent findOneByBvoucher(string $bvoucher) Return the first ChildAliInvent filtered by the bvoucher column
 * @method     ChildAliInvent findOneByDiscount(int $discount) Return the first ChildAliInvent filtered by the discount column
 * @method     ChildAliInvent findOneByLocationbase(int $locationbase) Return the first ChildAliInvent filtered by the locationbase column
 * @method     ChildAliInvent findOneByBillRef(string $bill_ref) Return the first ChildAliInvent filtered by the bill_ref column
 * @method     ChildAliInvent findOneByFax(string $fax) Return the first ChildAliInvent filtered by the fax column
 * @method     ChildAliInvent findOneByNoTax(string $no_tax) Return the first ChildAliInvent filtered by the no_tax column
 * @method     ChildAliInvent findOneByType(int $type) Return the first ChildAliInvent filtered by the type column *

 * @method     ChildAliInvent requirePk($key, ConnectionInterface $con = null) Return the ChildAliInvent by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOne(ConnectionInterface $con = null) Return the first ChildAliInvent matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliInvent requireOneById(int $id) Return the first ChildAliInvent filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByInvCode(string $inv_code) Return the first ChildAliInvent filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByInvDesc(string $inv_desc) Return the first ChildAliInvent filtered by the inv_desc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByInvType(int $inv_type) Return the first ChildAliInvent filtered by the inv_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByCodeRef(string $code_ref) Return the first ChildAliInvent filtered by the code_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByAddress(string $address) Return the first ChildAliInvent filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByDistrictid(int $districtId) Return the first ChildAliInvent filtered by the districtId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByAmphurid(int $amphurId) Return the first ChildAliInvent filtered by the amphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByProvinceid(int $provinceId) Return the first ChildAliInvent filtered by the provinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByZip(string $zip) Return the first ChildAliInvent filtered by the zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByHomeT(string $home_t) Return the first ChildAliInvent filtered by the home_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByUid(int $uid) Return the first ChildAliInvent filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneBySync(string $sync) Return the first ChildAliInvent filtered by the sync column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByWeb(string $web) Return the first ChildAliInvent filtered by the web column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByEwallet(string $ewallet) Return the first ChildAliInvent filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByVoucher(string $voucher) Return the first ChildAliInvent filtered by the voucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByBewallet(string $bewallet) Return the first ChildAliInvent filtered by the bewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByBvoucher(string $bvoucher) Return the first ChildAliInvent filtered by the bvoucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByDiscount(int $discount) Return the first ChildAliInvent filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByLocationbase(int $locationbase) Return the first ChildAliInvent filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByBillRef(string $bill_ref) Return the first ChildAliInvent filtered by the bill_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByFax(string $fax) Return the first ChildAliInvent filtered by the fax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByNoTax(string $no_tax) Return the first ChildAliInvent filtered by the no_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInvent requireOneByType(int $type) Return the first ChildAliInvent filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliInvent[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliInvent objects based on current ModelCriteria
 * @method     ChildAliInvent[]|ObjectCollection findById(int $id) Return ChildAliInvent objects filtered by the id column
 * @method     ChildAliInvent[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliInvent objects filtered by the inv_code column
 * @method     ChildAliInvent[]|ObjectCollection findByInvDesc(string $inv_desc) Return ChildAliInvent objects filtered by the inv_desc column
 * @method     ChildAliInvent[]|ObjectCollection findByInvType(int $inv_type) Return ChildAliInvent objects filtered by the inv_type column
 * @method     ChildAliInvent[]|ObjectCollection findByCodeRef(string $code_ref) Return ChildAliInvent objects filtered by the code_ref column
 * @method     ChildAliInvent[]|ObjectCollection findByAddress(string $address) Return ChildAliInvent objects filtered by the address column
 * @method     ChildAliInvent[]|ObjectCollection findByDistrictid(int $districtId) Return ChildAliInvent objects filtered by the districtId column
 * @method     ChildAliInvent[]|ObjectCollection findByAmphurid(int $amphurId) Return ChildAliInvent objects filtered by the amphurId column
 * @method     ChildAliInvent[]|ObjectCollection findByProvinceid(int $provinceId) Return ChildAliInvent objects filtered by the provinceId column
 * @method     ChildAliInvent[]|ObjectCollection findByZip(string $zip) Return ChildAliInvent objects filtered by the zip column
 * @method     ChildAliInvent[]|ObjectCollection findByHomeT(string $home_t) Return ChildAliInvent objects filtered by the home_t column
 * @method     ChildAliInvent[]|ObjectCollection findByUid(int $uid) Return ChildAliInvent objects filtered by the uid column
 * @method     ChildAliInvent[]|ObjectCollection findBySync(string $sync) Return ChildAliInvent objects filtered by the sync column
 * @method     ChildAliInvent[]|ObjectCollection findByWeb(string $web) Return ChildAliInvent objects filtered by the web column
 * @method     ChildAliInvent[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliInvent objects filtered by the ewallet column
 * @method     ChildAliInvent[]|ObjectCollection findByVoucher(string $voucher) Return ChildAliInvent objects filtered by the voucher column
 * @method     ChildAliInvent[]|ObjectCollection findByBewallet(string $bewallet) Return ChildAliInvent objects filtered by the bewallet column
 * @method     ChildAliInvent[]|ObjectCollection findByBvoucher(string $bvoucher) Return ChildAliInvent objects filtered by the bvoucher column
 * @method     ChildAliInvent[]|ObjectCollection findByDiscount(int $discount) Return ChildAliInvent objects filtered by the discount column
 * @method     ChildAliInvent[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliInvent objects filtered by the locationbase column
 * @method     ChildAliInvent[]|ObjectCollection findByBillRef(string $bill_ref) Return ChildAliInvent objects filtered by the bill_ref column
 * @method     ChildAliInvent[]|ObjectCollection findByFax(string $fax) Return ChildAliInvent objects filtered by the fax column
 * @method     ChildAliInvent[]|ObjectCollection findByNoTax(string $no_tax) Return ChildAliInvent objects filtered by the no_tax column
 * @method     ChildAliInvent[]|ObjectCollection findByType(int $type) Return ChildAliInvent objects filtered by the type column
 * @method     ChildAliInvent[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliInventQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliInventQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliInvent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliInventQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliInventQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliInventQuery) {
            return $criteria;
        }
        $query = new ChildAliInventQuery();
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
     * @return ChildAliInvent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliInventTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliInventTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliInvent A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, inv_code, inv_desc, inv_type, code_ref, address, districtId, amphurId, provinceId, zip, home_t, uid, sync, web, ewallet, voucher, bewallet, bvoucher, discount, locationbase, bill_ref, fax, no_tax, type FROM ali_invent WHERE id = :p0';
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
            /** @var ChildAliInvent $obj */
            $obj = new ChildAliInvent();
            $obj->hydrate($row);
            AliInventTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliInvent|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliInventTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliInventTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliInventTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliInventTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Filter the query on the inv_desc column
     *
     * Example usage:
     * <code>
     * $query->filterByInvDesc('fooValue');   // WHERE inv_desc = 'fooValue'
     * $query->filterByInvDesc('%fooValue%', Criteria::LIKE); // WHERE inv_desc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invDesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByInvDesc($invDesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invDesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_INV_DESC, $invDesc, $comparison);
    }

    /**
     * Filter the query on the inv_type column
     *
     * Example usage:
     * <code>
     * $query->filterByInvType(1234); // WHERE inv_type = 1234
     * $query->filterByInvType(array(12, 34)); // WHERE inv_type IN (12, 34)
     * $query->filterByInvType(array('min' => 12)); // WHERE inv_type > 12
     * </code>
     *
     * @param     mixed $invType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByInvType($invType = null, $comparison = null)
    {
        if (is_array($invType)) {
            $useMinMax = false;
            if (isset($invType['min'])) {
                $this->addUsingAlias(AliInventTableMap::COL_INV_TYPE, $invType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($invType['max'])) {
                $this->addUsingAlias(AliInventTableMap::COL_INV_TYPE, $invType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_INV_TYPE, $invType, $comparison);
    }

    /**
     * Filter the query on the code_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByCodeRef('fooValue');   // WHERE code_ref = 'fooValue'
     * $query->filterByCodeRef('%fooValue%', Criteria::LIKE); // WHERE code_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codeRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByCodeRef($codeRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codeRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_CODE_REF, $codeRef, $comparison);
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
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_ADDRESS, $address, $comparison);
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
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByDistrictid($districtid = null, $comparison = null)
    {
        if (is_array($districtid)) {
            $useMinMax = false;
            if (isset($districtid['min'])) {
                $this->addUsingAlias(AliInventTableMap::COL_DISTRICTID, $districtid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($districtid['max'])) {
                $this->addUsingAlias(AliInventTableMap::COL_DISTRICTID, $districtid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_DISTRICTID, $districtid, $comparison);
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
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByAmphurid($amphurid = null, $comparison = null)
    {
        if (is_array($amphurid)) {
            $useMinMax = false;
            if (isset($amphurid['min'])) {
                $this->addUsingAlias(AliInventTableMap::COL_AMPHURID, $amphurid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amphurid['max'])) {
                $this->addUsingAlias(AliInventTableMap::COL_AMPHURID, $amphurid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_AMPHURID, $amphurid, $comparison);
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
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByProvinceid($provinceid = null, $comparison = null)
    {
        if (is_array($provinceid)) {
            $useMinMax = false;
            if (isset($provinceid['min'])) {
                $this->addUsingAlias(AliInventTableMap::COL_PROVINCEID, $provinceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($provinceid['max'])) {
                $this->addUsingAlias(AliInventTableMap::COL_PROVINCEID, $provinceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_PROVINCEID, $provinceid, $comparison);
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
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByZip($zip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_ZIP, $zip, $comparison);
    }

    /**
     * Filter the query on the home_t column
     *
     * Example usage:
     * <code>
     * $query->filterByHomeT('fooValue');   // WHERE home_t = 'fooValue'
     * $query->filterByHomeT('%fooValue%', Criteria::LIKE); // WHERE home_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $homeT The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByHomeT($homeT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($homeT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_HOME_T, $homeT, $comparison);
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
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (is_array($uid)) {
            $useMinMax = false;
            if (isset($uid['min'])) {
                $this->addUsingAlias(AliInventTableMap::COL_UID, $uid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uid['max'])) {
                $this->addUsingAlias(AliInventTableMap::COL_UID, $uid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Filter the query on the sync column
     *
     * Example usage:
     * <code>
     * $query->filterBySync('fooValue');   // WHERE sync = 'fooValue'
     * $query->filterBySync('%fooValue%', Criteria::LIKE); // WHERE sync LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sync The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterBySync($sync = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sync)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_SYNC, $sync, $comparison);
    }

    /**
     * Filter the query on the web column
     *
     * Example usage:
     * <code>
     * $query->filterByWeb('fooValue');   // WHERE web = 'fooValue'
     * $query->filterByWeb('%fooValue%', Criteria::LIKE); // WHERE web LIKE '%fooValue%'
     * </code>
     *
     * @param     string $web The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByWeb($web = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($web)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_WEB, $web, $comparison);
    }

    /**
     * Filter the query on the ewallet column
     *
     * Example usage:
     * <code>
     * $query->filterByEwallet(1234); // WHERE ewallet = 1234
     * $query->filterByEwallet(array(12, 34)); // WHERE ewallet IN (12, 34)
     * $query->filterByEwallet(array('min' => 12)); // WHERE ewallet > 12
     * </code>
     *
     * @param     mixed $ewallet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliInventTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliInventTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_EWALLET, $ewallet, $comparison);
    }

    /**
     * Filter the query on the voucher column
     *
     * Example usage:
     * <code>
     * $query->filterByVoucher(1234); // WHERE voucher = 1234
     * $query->filterByVoucher(array(12, 34)); // WHERE voucher IN (12, 34)
     * $query->filterByVoucher(array('min' => 12)); // WHERE voucher > 12
     * </code>
     *
     * @param     mixed $voucher The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByVoucher($voucher = null, $comparison = null)
    {
        if (is_array($voucher)) {
            $useMinMax = false;
            if (isset($voucher['min'])) {
                $this->addUsingAlias(AliInventTableMap::COL_VOUCHER, $voucher['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($voucher['max'])) {
                $this->addUsingAlias(AliInventTableMap::COL_VOUCHER, $voucher['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_VOUCHER, $voucher, $comparison);
    }

    /**
     * Filter the query on the bewallet column
     *
     * Example usage:
     * <code>
     * $query->filterByBewallet(1234); // WHERE bewallet = 1234
     * $query->filterByBewallet(array(12, 34)); // WHERE bewallet IN (12, 34)
     * $query->filterByBewallet(array('min' => 12)); // WHERE bewallet > 12
     * </code>
     *
     * @param     mixed $bewallet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByBewallet($bewallet = null, $comparison = null)
    {
        if (is_array($bewallet)) {
            $useMinMax = false;
            if (isset($bewallet['min'])) {
                $this->addUsingAlias(AliInventTableMap::COL_BEWALLET, $bewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bewallet['max'])) {
                $this->addUsingAlias(AliInventTableMap::COL_BEWALLET, $bewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_BEWALLET, $bewallet, $comparison);
    }

    /**
     * Filter the query on the bvoucher column
     *
     * Example usage:
     * <code>
     * $query->filterByBvoucher(1234); // WHERE bvoucher = 1234
     * $query->filterByBvoucher(array(12, 34)); // WHERE bvoucher IN (12, 34)
     * $query->filterByBvoucher(array('min' => 12)); // WHERE bvoucher > 12
     * </code>
     *
     * @param     mixed $bvoucher The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByBvoucher($bvoucher = null, $comparison = null)
    {
        if (is_array($bvoucher)) {
            $useMinMax = false;
            if (isset($bvoucher['min'])) {
                $this->addUsingAlias(AliInventTableMap::COL_BVOUCHER, $bvoucher['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bvoucher['max'])) {
                $this->addUsingAlias(AliInventTableMap::COL_BVOUCHER, $bvoucher['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_BVOUCHER, $bvoucher, $comparison);
    }

    /**
     * Filter the query on the discount column
     *
     * Example usage:
     * <code>
     * $query->filterByDiscount(1234); // WHERE discount = 1234
     * $query->filterByDiscount(array(12, 34)); // WHERE discount IN (12, 34)
     * $query->filterByDiscount(array('min' => 12)); // WHERE discount > 12
     * </code>
     *
     * @param     mixed $discount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByDiscount($discount = null, $comparison = null)
    {
        if (is_array($discount)) {
            $useMinMax = false;
            if (isset($discount['min'])) {
                $this->addUsingAlias(AliInventTableMap::COL_DISCOUNT, $discount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($discount['max'])) {
                $this->addUsingAlias(AliInventTableMap::COL_DISCOUNT, $discount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_DISCOUNT, $discount, $comparison);
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
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliInventTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliInventTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Filter the query on the bill_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByBillRef('fooValue');   // WHERE bill_ref = 'fooValue'
     * $query->filterByBillRef('%fooValue%', Criteria::LIKE); // WHERE bill_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByBillRef($billRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_BILL_REF, $billRef, $comparison);
    }

    /**
     * Filter the query on the fax column
     *
     * Example usage:
     * <code>
     * $query->filterByFax('fooValue');   // WHERE fax = 'fooValue'
     * $query->filterByFax('%fooValue%', Criteria::LIKE); // WHERE fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByFax($fax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_FAX, $fax, $comparison);
    }

    /**
     * Filter the query on the no_tax column
     *
     * Example usage:
     * <code>
     * $query->filterByNoTax('fooValue');   // WHERE no_tax = 'fooValue'
     * $query->filterByNoTax('%fooValue%', Criteria::LIKE); // WHERE no_tax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noTax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByNoTax($noTax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noTax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_NO_TAX, $noTax, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType(1234); // WHERE type = 1234
     * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
     * $query->filterByType(array('min' => 12)); // WHERE type > 12
     * </code>
     *
     * @param     mixed $type The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(AliInventTableMap::COL_TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(AliInventTableMap::COL_TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliInvent $aliInvent Object to remove from the list of results
     *
     * @return $this|ChildAliInventQuery The current query, for fluid interface
     */
    public function prune($aliInvent = null)
    {
        if ($aliInvent) {
            $this->addUsingAlias(AliInventTableMap::COL_ID, $aliInvent->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_invent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliInventTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliInventTableMap::clearInstancePool();
            AliInventTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliInventTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliInventTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliInventTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliInventTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliInventQuery
