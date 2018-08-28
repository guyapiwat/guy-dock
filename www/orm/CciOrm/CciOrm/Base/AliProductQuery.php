<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliProduct as ChildAliProduct;
use CciOrm\CciOrm\AliProductQuery as ChildAliProductQuery;
use CciOrm\CciOrm\Map\AliProductTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_product' table.
 *
 *
 *
 * @method     ChildAliProductQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliProductQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method     ChildAliProductQuery orderByPdesc($order = Criteria::ASC) Order by the pdesc column
 * @method     ChildAliProductQuery orderByUnit($order = Criteria::ASC) Order by the unit column
 * @method     ChildAliProductQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildAliProductQuery orderByVat($order = Criteria::ASC) Order by the vat column
 * @method     ChildAliProductQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliProductQuery orderByPersonelPrice($order = Criteria::ASC) Order by the personel_price column
 * @method     ChildAliProductQuery orderByCustomerPrice($order = Criteria::ASC) Order by the customer_price column
 * @method     ChildAliProductQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliProductQuery orderByBv($order = Criteria::ASC) Order by the bv column
 * @method     ChildAliProductQuery orderByFv($order = Criteria::ASC) Order by the fv column
 * @method     ChildAliProductQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildAliProductQuery orderByUd($order = Criteria::ASC) Order by the ud column
 * @method     ChildAliProductQuery orderBySync($order = Criteria::ASC) Order by the sync column
 * @method     ChildAliProductQuery orderByWeb($order = Criteria::ASC) Order by the web column
 * @method     ChildAliProductQuery orderBySt($order = Criteria::ASC) Order by the st column
 * @method     ChildAliProductQuery orderBySst($order = Criteria::ASC) Order by the sst column
 * @method     ChildAliProductQuery orderByBf($order = Criteria::ASC) Order by the bf column
 * @method     ChildAliProductQuery orderBySh($order = Criteria::ASC) Order by the sh column
 * @method     ChildAliProductQuery orderByPcodeStock($order = Criteria::ASC) Order by the pcode_stock column
 * @method     ChildAliProductQuery orderBySupCode($order = Criteria::ASC) Order by the sup_code column
 * @method     ChildAliProductQuery orderByWeight($order = Criteria::ASC) Order by the weight column
 * @method     ChildAliProductQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliProductQuery orderByBarcode($order = Criteria::ASC) Order by the barcode column
 * @method     ChildAliProductQuery orderByPicture($order = Criteria::ASC) Order by the picture column
 * @method     ChildAliProductQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliProductQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliProductQuery orderBySaTypeA($order = Criteria::ASC) Order by the sa_type_a column
 * @method     ChildAliProductQuery orderBySaTypeH($order = Criteria::ASC) Order by the sa_type_h column
 * @method     ChildAliProductQuery orderByQtyr($order = Criteria::ASC) Order by the qtyr column
 * @method     ChildAliProductQuery orderByAto($order = Criteria::ASC) Order by the ato column
 * @method     ChildAliProductQuery orderByProductImg($order = Criteria::ASC) Order by the product_img column
 *
 * @method     ChildAliProductQuery groupByPcode() Group by the pcode column
 * @method     ChildAliProductQuery groupByGroupId() Group by the group_id column
 * @method     ChildAliProductQuery groupByPdesc() Group by the pdesc column
 * @method     ChildAliProductQuery groupByUnit() Group by the unit column
 * @method     ChildAliProductQuery groupByPrice() Group by the price column
 * @method     ChildAliProductQuery groupByVat() Group by the vat column
 * @method     ChildAliProductQuery groupByBprice() Group by the bprice column
 * @method     ChildAliProductQuery groupByPersonelPrice() Group by the personel_price column
 * @method     ChildAliProductQuery groupByCustomerPrice() Group by the customer_price column
 * @method     ChildAliProductQuery groupByPv() Group by the pv column
 * @method     ChildAliProductQuery groupByBv() Group by the bv column
 * @method     ChildAliProductQuery groupByFv() Group by the fv column
 * @method     ChildAliProductQuery groupByQty() Group by the qty column
 * @method     ChildAliProductQuery groupByUd() Group by the ud column
 * @method     ChildAliProductQuery groupBySync() Group by the sync column
 * @method     ChildAliProductQuery groupByWeb() Group by the web column
 * @method     ChildAliProductQuery groupBySt() Group by the st column
 * @method     ChildAliProductQuery groupBySst() Group by the sst column
 * @method     ChildAliProductQuery groupByBf() Group by the bf column
 * @method     ChildAliProductQuery groupBySh() Group by the sh column
 * @method     ChildAliProductQuery groupByPcodeStock() Group by the pcode_stock column
 * @method     ChildAliProductQuery groupBySupCode() Group by the sup_code column
 * @method     ChildAliProductQuery groupByWeight() Group by the weight column
 * @method     ChildAliProductQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliProductQuery groupByBarcode() Group by the barcode column
 * @method     ChildAliProductQuery groupByPicture() Group by the picture column
 * @method     ChildAliProductQuery groupByFdate() Group by the fdate column
 * @method     ChildAliProductQuery groupByTdate() Group by the tdate column
 * @method     ChildAliProductQuery groupBySaTypeA() Group by the sa_type_a column
 * @method     ChildAliProductQuery groupBySaTypeH() Group by the sa_type_h column
 * @method     ChildAliProductQuery groupByQtyr() Group by the qtyr column
 * @method     ChildAliProductQuery groupByAto() Group by the ato column
 * @method     ChildAliProductQuery groupByProductImg() Group by the product_img column
 *
 * @method     ChildAliProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliProductQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliProductQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliProductQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliProduct findOne(ConnectionInterface $con = null) Return the first ChildAliProduct matching the query
 * @method     ChildAliProduct findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliProduct matching the query, or a new ChildAliProduct object populated from the query conditions when no match is found
 *
 * @method     ChildAliProduct findOneByPcode(string $pcode) Return the first ChildAliProduct filtered by the pcode column
 * @method     ChildAliProduct findOneByGroupId(int $group_id) Return the first ChildAliProduct filtered by the group_id column
 * @method     ChildAliProduct findOneByPdesc(string $pdesc) Return the first ChildAliProduct filtered by the pdesc column
 * @method     ChildAliProduct findOneByUnit(string $unit) Return the first ChildAliProduct filtered by the unit column
 * @method     ChildAliProduct findOneByPrice(int $price) Return the first ChildAliProduct filtered by the price column
 * @method     ChildAliProduct findOneByVat(string $vat) Return the first ChildAliProduct filtered by the vat column
 * @method     ChildAliProduct findOneByBprice(string $bprice) Return the first ChildAliProduct filtered by the bprice column
 * @method     ChildAliProduct findOneByPersonelPrice(string $personel_price) Return the first ChildAliProduct filtered by the personel_price column
 * @method     ChildAliProduct findOneByCustomerPrice(string $customer_price) Return the first ChildAliProduct filtered by the customer_price column
 * @method     ChildAliProduct findOneByPv(int $pv) Return the first ChildAliProduct filtered by the pv column
 * @method     ChildAliProduct findOneByBv(string $bv) Return the first ChildAliProduct filtered by the bv column
 * @method     ChildAliProduct findOneByFv(string $fv) Return the first ChildAliProduct filtered by the fv column
 * @method     ChildAliProduct findOneByQty(int $qty) Return the first ChildAliProduct filtered by the qty column
 * @method     ChildAliProduct findOneByUd(string $ud) Return the first ChildAliProduct filtered by the ud column
 * @method     ChildAliProduct findOneBySync(string $sync) Return the first ChildAliProduct filtered by the sync column
 * @method     ChildAliProduct findOneByWeb(string $web) Return the first ChildAliProduct filtered by the web column
 * @method     ChildAliProduct findOneBySt(int $st) Return the first ChildAliProduct filtered by the st column
 * @method     ChildAliProduct findOneBySst(int $sst) Return the first ChildAliProduct filtered by the sst column
 * @method     ChildAliProduct findOneByBf(int $bf) Return the first ChildAliProduct filtered by the bf column
 * @method     ChildAliProduct findOneBySh(string $sh) Return the first ChildAliProduct filtered by the sh column
 * @method     ChildAliProduct findOneByPcodeStock(string $pcode_stock) Return the first ChildAliProduct filtered by the pcode_stock column
 * @method     ChildAliProduct findOneBySupCode(string $sup_code) Return the first ChildAliProduct filtered by the sup_code column
 * @method     ChildAliProduct findOneByWeight(string $weight) Return the first ChildAliProduct filtered by the weight column
 * @method     ChildAliProduct findOneByLocationbase(int $locationbase) Return the first ChildAliProduct filtered by the locationbase column
 * @method     ChildAliProduct findOneByBarcode(string $barcode) Return the first ChildAliProduct filtered by the barcode column
 * @method     ChildAliProduct findOneByPicture(string $picture) Return the first ChildAliProduct filtered by the picture column
 * @method     ChildAliProduct findOneByFdate(string $fdate) Return the first ChildAliProduct filtered by the fdate column
 * @method     ChildAliProduct findOneByTdate(string $tdate) Return the first ChildAliProduct filtered by the tdate column
 * @method     ChildAliProduct findOneBySaTypeA(int $sa_type_a) Return the first ChildAliProduct filtered by the sa_type_a column
 * @method     ChildAliProduct findOneBySaTypeH(int $sa_type_h) Return the first ChildAliProduct filtered by the sa_type_h column
 * @method     ChildAliProduct findOneByQtyr(int $qtyr) Return the first ChildAliProduct filtered by the qtyr column
 * @method     ChildAliProduct findOneByAto(int $ato) Return the first ChildAliProduct filtered by the ato column
 * @method     ChildAliProduct findOneByProductImg(string $product_img) Return the first ChildAliProduct filtered by the product_img column *

 * @method     ChildAliProduct requirePk($key, ConnectionInterface $con = null) Return the ChildAliProduct by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOne(ConnectionInterface $con = null) Return the first ChildAliProduct matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliProduct requireOneByPcode(string $pcode) Return the first ChildAliProduct filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByGroupId(int $group_id) Return the first ChildAliProduct filtered by the group_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByPdesc(string $pdesc) Return the first ChildAliProduct filtered by the pdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByUnit(string $unit) Return the first ChildAliProduct filtered by the unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByPrice(int $price) Return the first ChildAliProduct filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByVat(string $vat) Return the first ChildAliProduct filtered by the vat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByBprice(string $bprice) Return the first ChildAliProduct filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByPersonelPrice(string $personel_price) Return the first ChildAliProduct filtered by the personel_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByCustomerPrice(string $customer_price) Return the first ChildAliProduct filtered by the customer_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByPv(int $pv) Return the first ChildAliProduct filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByBv(string $bv) Return the first ChildAliProduct filtered by the bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByFv(string $fv) Return the first ChildAliProduct filtered by the fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByQty(int $qty) Return the first ChildAliProduct filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByUd(string $ud) Return the first ChildAliProduct filtered by the ud column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneBySync(string $sync) Return the first ChildAliProduct filtered by the sync column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByWeb(string $web) Return the first ChildAliProduct filtered by the web column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneBySt(int $st) Return the first ChildAliProduct filtered by the st column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneBySst(int $sst) Return the first ChildAliProduct filtered by the sst column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByBf(int $bf) Return the first ChildAliProduct filtered by the bf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneBySh(string $sh) Return the first ChildAliProduct filtered by the sh column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByPcodeStock(string $pcode_stock) Return the first ChildAliProduct filtered by the pcode_stock column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneBySupCode(string $sup_code) Return the first ChildAliProduct filtered by the sup_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByWeight(string $weight) Return the first ChildAliProduct filtered by the weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByLocationbase(int $locationbase) Return the first ChildAliProduct filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByBarcode(string $barcode) Return the first ChildAliProduct filtered by the barcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByPicture(string $picture) Return the first ChildAliProduct filtered by the picture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByFdate(string $fdate) Return the first ChildAliProduct filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByTdate(string $tdate) Return the first ChildAliProduct filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneBySaTypeA(int $sa_type_a) Return the first ChildAliProduct filtered by the sa_type_a column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneBySaTypeH(int $sa_type_h) Return the first ChildAliProduct filtered by the sa_type_h column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByQtyr(int $qtyr) Return the first ChildAliProduct filtered by the qtyr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByAto(int $ato) Return the first ChildAliProduct filtered by the ato column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProduct requireOneByProductImg(string $product_img) Return the first ChildAliProduct filtered by the product_img column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliProduct[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliProduct objects based on current ModelCriteria
 * @method     ChildAliProduct[]|ObjectCollection findByPcode(string $pcode) Return ChildAliProduct objects filtered by the pcode column
 * @method     ChildAliProduct[]|ObjectCollection findByGroupId(int $group_id) Return ChildAliProduct objects filtered by the group_id column
 * @method     ChildAliProduct[]|ObjectCollection findByPdesc(string $pdesc) Return ChildAliProduct objects filtered by the pdesc column
 * @method     ChildAliProduct[]|ObjectCollection findByUnit(string $unit) Return ChildAliProduct objects filtered by the unit column
 * @method     ChildAliProduct[]|ObjectCollection findByPrice(int $price) Return ChildAliProduct objects filtered by the price column
 * @method     ChildAliProduct[]|ObjectCollection findByVat(string $vat) Return ChildAliProduct objects filtered by the vat column
 * @method     ChildAliProduct[]|ObjectCollection findByBprice(string $bprice) Return ChildAliProduct objects filtered by the bprice column
 * @method     ChildAliProduct[]|ObjectCollection findByPersonelPrice(string $personel_price) Return ChildAliProduct objects filtered by the personel_price column
 * @method     ChildAliProduct[]|ObjectCollection findByCustomerPrice(string $customer_price) Return ChildAliProduct objects filtered by the customer_price column
 * @method     ChildAliProduct[]|ObjectCollection findByPv(int $pv) Return ChildAliProduct objects filtered by the pv column
 * @method     ChildAliProduct[]|ObjectCollection findByBv(string $bv) Return ChildAliProduct objects filtered by the bv column
 * @method     ChildAliProduct[]|ObjectCollection findByFv(string $fv) Return ChildAliProduct objects filtered by the fv column
 * @method     ChildAliProduct[]|ObjectCollection findByQty(int $qty) Return ChildAliProduct objects filtered by the qty column
 * @method     ChildAliProduct[]|ObjectCollection findByUd(string $ud) Return ChildAliProduct objects filtered by the ud column
 * @method     ChildAliProduct[]|ObjectCollection findBySync(string $sync) Return ChildAliProduct objects filtered by the sync column
 * @method     ChildAliProduct[]|ObjectCollection findByWeb(string $web) Return ChildAliProduct objects filtered by the web column
 * @method     ChildAliProduct[]|ObjectCollection findBySt(int $st) Return ChildAliProduct objects filtered by the st column
 * @method     ChildAliProduct[]|ObjectCollection findBySst(int $sst) Return ChildAliProduct objects filtered by the sst column
 * @method     ChildAliProduct[]|ObjectCollection findByBf(int $bf) Return ChildAliProduct objects filtered by the bf column
 * @method     ChildAliProduct[]|ObjectCollection findBySh(string $sh) Return ChildAliProduct objects filtered by the sh column
 * @method     ChildAliProduct[]|ObjectCollection findByPcodeStock(string $pcode_stock) Return ChildAliProduct objects filtered by the pcode_stock column
 * @method     ChildAliProduct[]|ObjectCollection findBySupCode(string $sup_code) Return ChildAliProduct objects filtered by the sup_code column
 * @method     ChildAliProduct[]|ObjectCollection findByWeight(string $weight) Return ChildAliProduct objects filtered by the weight column
 * @method     ChildAliProduct[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliProduct objects filtered by the locationbase column
 * @method     ChildAliProduct[]|ObjectCollection findByBarcode(string $barcode) Return ChildAliProduct objects filtered by the barcode column
 * @method     ChildAliProduct[]|ObjectCollection findByPicture(string $picture) Return ChildAliProduct objects filtered by the picture column
 * @method     ChildAliProduct[]|ObjectCollection findByFdate(string $fdate) Return ChildAliProduct objects filtered by the fdate column
 * @method     ChildAliProduct[]|ObjectCollection findByTdate(string $tdate) Return ChildAliProduct objects filtered by the tdate column
 * @method     ChildAliProduct[]|ObjectCollection findBySaTypeA(int $sa_type_a) Return ChildAliProduct objects filtered by the sa_type_a column
 * @method     ChildAliProduct[]|ObjectCollection findBySaTypeH(int $sa_type_h) Return ChildAliProduct objects filtered by the sa_type_h column
 * @method     ChildAliProduct[]|ObjectCollection findByQtyr(int $qtyr) Return ChildAliProduct objects filtered by the qtyr column
 * @method     ChildAliProduct[]|ObjectCollection findByAto(int $ato) Return ChildAliProduct objects filtered by the ato column
 * @method     ChildAliProduct[]|ObjectCollection findByProductImg(string $product_img) Return ChildAliProduct objects filtered by the product_img column
 * @method     ChildAliProduct[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliProductQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliProductQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliProduct', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliProductQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliProductQuery) {
            return $criteria;
        }
        $query = new ChildAliProductQuery();
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
     * @return ChildAliProduct|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliProductTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliProductTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliProduct A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT pcode, group_id, pdesc, unit, price, vat, bprice, personel_price, customer_price, pv, bv, fv, qty, ud, sync, web, st, sst, bf, sh, pcode_stock, sup_code, weight, locationbase, barcode, picture, fdate, tdate, sa_type_a, sa_type_h, qtyr, ato, product_img FROM ali_product WHERE pcode = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAliProduct $obj */
            $obj = new ChildAliProduct();
            $obj->hydrate($row);
            AliProductTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliProduct|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliProductTableMap::COL_PCODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliProductTableMap::COL_PCODE, $keys, Criteria::IN);
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
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_PCODE, $pcode, $comparison);
    }

    /**
     * Filter the query on the group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupId(1234); // WHERE group_id = 1234
     * $query->filterByGroupId(array(12, 34)); // WHERE group_id IN (12, 34)
     * $query->filterByGroupId(array('min' => 12)); // WHERE group_id > 12
     * </code>
     *
     * @param     mixed $groupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (is_array($groupId)) {
            $useMinMax = false;
            if (isset($groupId['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_GROUP_ID, $groupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupId['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_GROUP_ID, $groupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_GROUP_ID, $groupId, $comparison);
    }

    /**
     * Filter the query on the pdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByPdesc('fooValue');   // WHERE pdesc = 'fooValue'
     * $query->filterByPdesc('%fooValue%', Criteria::LIKE); // WHERE pdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByPdesc($pdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_PDESC, $pdesc, $comparison);
    }

    /**
     * Filter the query on the unit column
     *
     * Example usage:
     * <code>
     * $query->filterByUnit('fooValue');   // WHERE unit = 'fooValue'
     * $query->filterByUnit('%fooValue%', Criteria::LIKE); // WHERE unit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unit The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByUnit($unit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_UNIT, $unit, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the vat column
     *
     * Example usage:
     * <code>
     * $query->filterByVat(1234); // WHERE vat = 1234
     * $query->filterByVat(array(12, 34)); // WHERE vat IN (12, 34)
     * $query->filterByVat(array('min' => 12)); // WHERE vat > 12
     * </code>
     *
     * @param     mixed $vat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByVat($vat = null, $comparison = null)
    {
        if (is_array($vat)) {
            $useMinMax = false;
            if (isset($vat['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_VAT, $vat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vat['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_VAT, $vat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_VAT, $vat, $comparison);
    }

    /**
     * Filter the query on the bprice column
     *
     * Example usage:
     * <code>
     * $query->filterByBprice(1234); // WHERE bprice = 1234
     * $query->filterByBprice(array(12, 34)); // WHERE bprice IN (12, 34)
     * $query->filterByBprice(array('min' => 12)); // WHERE bprice > 12
     * </code>
     *
     * @param     mixed $bprice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_BPRICE, $bprice, $comparison);
    }

    /**
     * Filter the query on the personel_price column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonelPrice(1234); // WHERE personel_price = 1234
     * $query->filterByPersonelPrice(array(12, 34)); // WHERE personel_price IN (12, 34)
     * $query->filterByPersonelPrice(array('min' => 12)); // WHERE personel_price > 12
     * </code>
     *
     * @param     mixed $personelPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByPersonelPrice($personelPrice = null, $comparison = null)
    {
        if (is_array($personelPrice)) {
            $useMinMax = false;
            if (isset($personelPrice['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_PERSONEL_PRICE, $personelPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personelPrice['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_PERSONEL_PRICE, $personelPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_PERSONEL_PRICE, $personelPrice, $comparison);
    }

    /**
     * Filter the query on the customer_price column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerPrice(1234); // WHERE customer_price = 1234
     * $query->filterByCustomerPrice(array(12, 34)); // WHERE customer_price IN (12, 34)
     * $query->filterByCustomerPrice(array('min' => 12)); // WHERE customer_price > 12
     * </code>
     *
     * @param     mixed $customerPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByCustomerPrice($customerPrice = null, $comparison = null)
    {
        if (is_array($customerPrice)) {
            $useMinMax = false;
            if (isset($customerPrice['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_CUSTOMER_PRICE, $customerPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerPrice['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_CUSTOMER_PRICE, $customerPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_CUSTOMER_PRICE, $customerPrice, $comparison);
    }

    /**
     * Filter the query on the pv column
     *
     * Example usage:
     * <code>
     * $query->filterByPv(1234); // WHERE pv = 1234
     * $query->filterByPv(array(12, 34)); // WHERE pv IN (12, 34)
     * $query->filterByPv(array('min' => 12)); // WHERE pv > 12
     * </code>
     *
     * @param     mixed $pv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_PV, $pv, $comparison);
    }

    /**
     * Filter the query on the bv column
     *
     * Example usage:
     * <code>
     * $query->filterByBv(1234); // WHERE bv = 1234
     * $query->filterByBv(array(12, 34)); // WHERE bv IN (12, 34)
     * $query->filterByBv(array('min' => 12)); // WHERE bv > 12
     * </code>
     *
     * @param     mixed $bv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByBv($bv = null, $comparison = null)
    {
        if (is_array($bv)) {
            $useMinMax = false;
            if (isset($bv['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_BV, $bv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bv['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_BV, $bv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_BV, $bv, $comparison);
    }

    /**
     * Filter the query on the fv column
     *
     * Example usage:
     * <code>
     * $query->filterByFv(1234); // WHERE fv = 1234
     * $query->filterByFv(array(12, 34)); // WHERE fv IN (12, 34)
     * $query->filterByFv(array('min' => 12)); // WHERE fv > 12
     * </code>
     *
     * @param     mixed $fv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByFv($fv = null, $comparison = null)
    {
        if (is_array($fv)) {
            $useMinMax = false;
            if (isset($fv['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_FV, $fv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fv['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_FV, $fv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_FV, $fv, $comparison);
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
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_QTY, $qty, $comparison);
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
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByUd($ud = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ud)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_UD, $ud, $comparison);
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
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterBySync($sync = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sync)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_SYNC, $sync, $comparison);
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
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByWeb($web = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($web)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_WEB, $web, $comparison);
    }

    /**
     * Filter the query on the st column
     *
     * Example usage:
     * <code>
     * $query->filterBySt(1234); // WHERE st = 1234
     * $query->filterBySt(array(12, 34)); // WHERE st IN (12, 34)
     * $query->filterBySt(array('min' => 12)); // WHERE st > 12
     * </code>
     *
     * @param     mixed $st The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterBySt($st = null, $comparison = null)
    {
        if (is_array($st)) {
            $useMinMax = false;
            if (isset($st['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_ST, $st['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($st['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_ST, $st['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_ST, $st, $comparison);
    }

    /**
     * Filter the query on the sst column
     *
     * Example usage:
     * <code>
     * $query->filterBySst(1234); // WHERE sst = 1234
     * $query->filterBySst(array(12, 34)); // WHERE sst IN (12, 34)
     * $query->filterBySst(array('min' => 12)); // WHERE sst > 12
     * </code>
     *
     * @param     mixed $sst The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterBySst($sst = null, $comparison = null)
    {
        if (is_array($sst)) {
            $useMinMax = false;
            if (isset($sst['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_SST, $sst['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sst['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_SST, $sst['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_SST, $sst, $comparison);
    }

    /**
     * Filter the query on the bf column
     *
     * Example usage:
     * <code>
     * $query->filterByBf(1234); // WHERE bf = 1234
     * $query->filterByBf(array(12, 34)); // WHERE bf IN (12, 34)
     * $query->filterByBf(array('min' => 12)); // WHERE bf > 12
     * </code>
     *
     * @param     mixed $bf The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByBf($bf = null, $comparison = null)
    {
        if (is_array($bf)) {
            $useMinMax = false;
            if (isset($bf['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_BF, $bf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bf['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_BF, $bf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_BF, $bf, $comparison);
    }

    /**
     * Filter the query on the sh column
     *
     * Example usage:
     * <code>
     * $query->filterBySh('fooValue');   // WHERE sh = 'fooValue'
     * $query->filterBySh('%fooValue%', Criteria::LIKE); // WHERE sh LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sh The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterBySh($sh = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sh)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_SH, $sh, $comparison);
    }

    /**
     * Filter the query on the pcode_stock column
     *
     * Example usage:
     * <code>
     * $query->filterByPcodeStock('fooValue');   // WHERE pcode_stock = 'fooValue'
     * $query->filterByPcodeStock('%fooValue%', Criteria::LIKE); // WHERE pcode_stock LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pcodeStock The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByPcodeStock($pcodeStock = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcodeStock)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_PCODE_STOCK, $pcodeStock, $comparison);
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
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterBySupCode($supCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($supCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_SUP_CODE, $supCode, $comparison);
    }

    /**
     * Filter the query on the weight column
     *
     * Example usage:
     * <code>
     * $query->filterByWeight(1234); // WHERE weight = 1234
     * $query->filterByWeight(array(12, 34)); // WHERE weight IN (12, 34)
     * $query->filterByWeight(array('min' => 12)); // WHERE weight > 12
     * </code>
     *
     * @param     mixed $weight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByWeight($weight = null, $comparison = null)
    {
        if (is_array($weight)) {
            $useMinMax = false;
            if (isset($weight['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_WEIGHT, $weight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weight['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_WEIGHT, $weight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_WEIGHT, $weight, $comparison);
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
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Filter the query on the barcode column
     *
     * Example usage:
     * <code>
     * $query->filterByBarcode('fooValue');   // WHERE barcode = 'fooValue'
     * $query->filterByBarcode('%fooValue%', Criteria::LIKE); // WHERE barcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $barcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByBarcode($barcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($barcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_BARCODE, $barcode, $comparison);
    }

    /**
     * Filter the query on the picture column
     *
     * Example usage:
     * <code>
     * $query->filterByPicture('fooValue');   // WHERE picture = 'fooValue'
     * $query->filterByPicture('%fooValue%', Criteria::LIKE); // WHERE picture LIKE '%fooValue%'
     * </code>
     *
     * @param     string $picture The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByPicture($picture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($picture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_PICTURE, $picture, $comparison);
    }

    /**
     * Filter the query on the fdate column
     *
     * Example usage:
     * <code>
     * $query->filterByFdate('2011-03-14'); // WHERE fdate = '2011-03-14'
     * $query->filterByFdate('now'); // WHERE fdate = '2011-03-14'
     * $query->filterByFdate(array('max' => 'yesterday')); // WHERE fdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $fdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_FDATE, $fdate, $comparison);
    }

    /**
     * Filter the query on the tdate column
     *
     * Example usage:
     * <code>
     * $query->filterByTdate('2011-03-14'); // WHERE tdate = '2011-03-14'
     * $query->filterByTdate('now'); // WHERE tdate = '2011-03-14'
     * $query->filterByTdate(array('max' => 'yesterday')); // WHERE tdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $tdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the sa_type_a column
     *
     * Example usage:
     * <code>
     * $query->filterBySaTypeA(1234); // WHERE sa_type_a = 1234
     * $query->filterBySaTypeA(array(12, 34)); // WHERE sa_type_a IN (12, 34)
     * $query->filterBySaTypeA(array('min' => 12)); // WHERE sa_type_a > 12
     * </code>
     *
     * @param     mixed $saTypeA The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterBySaTypeA($saTypeA = null, $comparison = null)
    {
        if (is_array($saTypeA)) {
            $useMinMax = false;
            if (isset($saTypeA['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_SA_TYPE_A, $saTypeA['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saTypeA['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_SA_TYPE_A, $saTypeA['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_SA_TYPE_A, $saTypeA, $comparison);
    }

    /**
     * Filter the query on the sa_type_h column
     *
     * Example usage:
     * <code>
     * $query->filterBySaTypeH(1234); // WHERE sa_type_h = 1234
     * $query->filterBySaTypeH(array(12, 34)); // WHERE sa_type_h IN (12, 34)
     * $query->filterBySaTypeH(array('min' => 12)); // WHERE sa_type_h > 12
     * </code>
     *
     * @param     mixed $saTypeH The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterBySaTypeH($saTypeH = null, $comparison = null)
    {
        if (is_array($saTypeH)) {
            $useMinMax = false;
            if (isset($saTypeH['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_SA_TYPE_H, $saTypeH['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saTypeH['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_SA_TYPE_H, $saTypeH['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_SA_TYPE_H, $saTypeH, $comparison);
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
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByQtyr($qtyr = null, $comparison = null)
    {
        if (is_array($qtyr)) {
            $useMinMax = false;
            if (isset($qtyr['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_QTYR, $qtyr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyr['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_QTYR, $qtyr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_QTYR, $qtyr, $comparison);
    }

    /**
     * Filter the query on the ato column
     *
     * Example usage:
     * <code>
     * $query->filterByAto(1234); // WHERE ato = 1234
     * $query->filterByAto(array(12, 34)); // WHERE ato IN (12, 34)
     * $query->filterByAto(array('min' => 12)); // WHERE ato > 12
     * </code>
     *
     * @param     mixed $ato The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByAto($ato = null, $comparison = null)
    {
        if (is_array($ato)) {
            $useMinMax = false;
            if (isset($ato['min'])) {
                $this->addUsingAlias(AliProductTableMap::COL_ATO, $ato['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ato['max'])) {
                $this->addUsingAlias(AliProductTableMap::COL_ATO, $ato['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_ATO, $ato, $comparison);
    }

    /**
     * Filter the query on the product_img column
     *
     * Example usage:
     * <code>
     * $query->filterByProductImg('fooValue');   // WHERE product_img = 'fooValue'
     * $query->filterByProductImg('%fooValue%', Criteria::LIKE); // WHERE product_img LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productImg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function filterByProductImg($productImg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productImg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductTableMap::COL_PRODUCT_IMG, $productImg, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliProduct $aliProduct Object to remove from the list of results
     *
     * @return $this|ChildAliProductQuery The current query, for fluid interface
     */
    public function prune($aliProduct = null)
    {
        if ($aliProduct) {
            $this->addUsingAlias(AliProductTableMap::COL_PCODE, $aliProduct->getPcode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliProductTableMap::clearInstancePool();
            AliProductTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliProductTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliProductTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliProductTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliProductQuery
