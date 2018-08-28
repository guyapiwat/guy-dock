<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliLocationBase as ChildAliLocationBase;
use CciOrm\CciOrm\AliLocationBaseQuery as ChildAliLocationBaseQuery;
use CciOrm\CciOrm\Map\AliLocationBaseTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_location_base' table.
 *
 *
 *
 * @method     ChildAliLocationBaseQuery orderByCid($order = Criteria::ASC) Order by the cid column
 * @method     ChildAliLocationBaseQuery orderByCshort($order = Criteria::ASC) Order by the cshort column
 * @method     ChildAliLocationBaseQuery orderByCname($order = Criteria::ASC) Order by the cname column
 * @method     ChildAliLocationBaseQuery orderByCsending($order = Criteria::ASC) Order by the csending column
 * @method     ChildAliLocationBaseQuery orderByCtax($order = Criteria::ASC) Order by the ctax column
 * @method     ChildAliLocationBaseQuery orderByCtax1($order = Criteria::ASC) Order by the ctax1 column
 * @method     ChildAliLocationBaseQuery orderByComStockist($order = Criteria::ASC) Order by the com_stockist column
 * @method     ChildAliLocationBaseQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliLocationBaseQuery orderByPcodeRegister($order = Criteria::ASC) Order by the pcode_register column
 * @method     ChildAliLocationBaseQuery orderByPcodeExtend($order = Criteria::ASC) Order by the pcode_extend column
 * @method     ChildAliLocationBaseQuery orderByPcodeCharge($order = Criteria::ASC) Order by the pcode_charge column
 * @method     ChildAliLocationBaseQuery orderBySmssending($order = Criteria::ASC) Order by the smssending column
 * @method     ChildAliLocationBaseQuery orderByCurrcode($order = Criteria::ASC) Order by the currcode column
 * @method     ChildAliLocationBaseQuery orderByLang($order = Criteria::ASC) Order by the lang column
 * @method     ChildAliLocationBaseQuery orderByTimediff($order = Criteria::ASC) Order by the timediff column
 * @method     ChildAliLocationBaseQuery orderByRegisTransfer($order = Criteria::ASC) Order by the regis_transfer column
 * @method     ChildAliLocationBaseQuery orderByRegisSuccess($order = Criteria::ASC) Order by the regis_success column
 * @method     ChildAliLocationBaseQuery orderByRegisFail($order = Criteria::ASC) Order by the regis_fail column
 * @method     ChildAliLocationBaseQuery orderByRegisCancel($order = Criteria::ASC) Order by the regis_cancel column
 * @method     ChildAliLocationBaseQuery orderByMainInvCode($order = Criteria::ASC) Order by the main_inv_code column
 * @method     ChildAliLocationBaseQuery orderByComTransferChagre($order = Criteria::ASC) Order by the com_transfer_chagre column
 *
 * @method     ChildAliLocationBaseQuery groupByCid() Group by the cid column
 * @method     ChildAliLocationBaseQuery groupByCshort() Group by the cshort column
 * @method     ChildAliLocationBaseQuery groupByCname() Group by the cname column
 * @method     ChildAliLocationBaseQuery groupByCsending() Group by the csending column
 * @method     ChildAliLocationBaseQuery groupByCtax() Group by the ctax column
 * @method     ChildAliLocationBaseQuery groupByCtax1() Group by the ctax1 column
 * @method     ChildAliLocationBaseQuery groupByComStockist() Group by the com_stockist column
 * @method     ChildAliLocationBaseQuery groupByCrate() Group by the crate column
 * @method     ChildAliLocationBaseQuery groupByPcodeRegister() Group by the pcode_register column
 * @method     ChildAliLocationBaseQuery groupByPcodeExtend() Group by the pcode_extend column
 * @method     ChildAliLocationBaseQuery groupByPcodeCharge() Group by the pcode_charge column
 * @method     ChildAliLocationBaseQuery groupBySmssending() Group by the smssending column
 * @method     ChildAliLocationBaseQuery groupByCurrcode() Group by the currcode column
 * @method     ChildAliLocationBaseQuery groupByLang() Group by the lang column
 * @method     ChildAliLocationBaseQuery groupByTimediff() Group by the timediff column
 * @method     ChildAliLocationBaseQuery groupByRegisTransfer() Group by the regis_transfer column
 * @method     ChildAliLocationBaseQuery groupByRegisSuccess() Group by the regis_success column
 * @method     ChildAliLocationBaseQuery groupByRegisFail() Group by the regis_fail column
 * @method     ChildAliLocationBaseQuery groupByRegisCancel() Group by the regis_cancel column
 * @method     ChildAliLocationBaseQuery groupByMainInvCode() Group by the main_inv_code column
 * @method     ChildAliLocationBaseQuery groupByComTransferChagre() Group by the com_transfer_chagre column
 *
 * @method     ChildAliLocationBaseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliLocationBaseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliLocationBaseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliLocationBaseQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliLocationBaseQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliLocationBaseQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliLocationBase findOne(ConnectionInterface $con = null) Return the first ChildAliLocationBase matching the query
 * @method     ChildAliLocationBase findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliLocationBase matching the query, or a new ChildAliLocationBase object populated from the query conditions when no match is found
 *
 * @method     ChildAliLocationBase findOneByCid(int $cid) Return the first ChildAliLocationBase filtered by the cid column
 * @method     ChildAliLocationBase findOneByCshort(string $cshort) Return the first ChildAliLocationBase filtered by the cshort column
 * @method     ChildAliLocationBase findOneByCname(string $cname) Return the first ChildAliLocationBase filtered by the cname column
 * @method     ChildAliLocationBase findOneByCsending(string $csending) Return the first ChildAliLocationBase filtered by the csending column
 * @method     ChildAliLocationBase findOneByCtax(string $ctax) Return the first ChildAliLocationBase filtered by the ctax column
 * @method     ChildAliLocationBase findOneByCtax1(string $ctax1) Return the first ChildAliLocationBase filtered by the ctax1 column
 * @method     ChildAliLocationBase findOneByComStockist(string $com_stockist) Return the first ChildAliLocationBase filtered by the com_stockist column
 * @method     ChildAliLocationBase findOneByCrate(string $crate) Return the first ChildAliLocationBase filtered by the crate column
 * @method     ChildAliLocationBase findOneByPcodeRegister(string $pcode_register) Return the first ChildAliLocationBase filtered by the pcode_register column
 * @method     ChildAliLocationBase findOneByPcodeExtend(string $pcode_extend) Return the first ChildAliLocationBase filtered by the pcode_extend column
 * @method     ChildAliLocationBase findOneByPcodeCharge(string $pcode_charge) Return the first ChildAliLocationBase filtered by the pcode_charge column
 * @method     ChildAliLocationBase findOneBySmssending(int $smssending) Return the first ChildAliLocationBase filtered by the smssending column
 * @method     ChildAliLocationBase findOneByCurrcode(string $currcode) Return the first ChildAliLocationBase filtered by the currcode column
 * @method     ChildAliLocationBase findOneByLang(string $lang) Return the first ChildAliLocationBase filtered by the lang column
 * @method     ChildAliLocationBase findOneByTimediff(int $timediff) Return the first ChildAliLocationBase filtered by the timediff column
 * @method     ChildAliLocationBase findOneByRegisTransfer(string $regis_transfer) Return the first ChildAliLocationBase filtered by the regis_transfer column
 * @method     ChildAliLocationBase findOneByRegisSuccess(string $regis_success) Return the first ChildAliLocationBase filtered by the regis_success column
 * @method     ChildAliLocationBase findOneByRegisFail(string $regis_fail) Return the first ChildAliLocationBase filtered by the regis_fail column
 * @method     ChildAliLocationBase findOneByRegisCancel(string $regis_cancel) Return the first ChildAliLocationBase filtered by the regis_cancel column
 * @method     ChildAliLocationBase findOneByMainInvCode(string $main_inv_code) Return the first ChildAliLocationBase filtered by the main_inv_code column
 * @method     ChildAliLocationBase findOneByComTransferChagre(string $com_transfer_chagre) Return the first ChildAliLocationBase filtered by the com_transfer_chagre column *

 * @method     ChildAliLocationBase requirePk($key, ConnectionInterface $con = null) Return the ChildAliLocationBase by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOne(ConnectionInterface $con = null) Return the first ChildAliLocationBase matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLocationBase requireOneByCid(int $cid) Return the first ChildAliLocationBase filtered by the cid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByCshort(string $cshort) Return the first ChildAliLocationBase filtered by the cshort column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByCname(string $cname) Return the first ChildAliLocationBase filtered by the cname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByCsending(string $csending) Return the first ChildAliLocationBase filtered by the csending column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByCtax(string $ctax) Return the first ChildAliLocationBase filtered by the ctax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByCtax1(string $ctax1) Return the first ChildAliLocationBase filtered by the ctax1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByComStockist(string $com_stockist) Return the first ChildAliLocationBase filtered by the com_stockist column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByCrate(string $crate) Return the first ChildAliLocationBase filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByPcodeRegister(string $pcode_register) Return the first ChildAliLocationBase filtered by the pcode_register column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByPcodeExtend(string $pcode_extend) Return the first ChildAliLocationBase filtered by the pcode_extend column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByPcodeCharge(string $pcode_charge) Return the first ChildAliLocationBase filtered by the pcode_charge column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneBySmssending(int $smssending) Return the first ChildAliLocationBase filtered by the smssending column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByCurrcode(string $currcode) Return the first ChildAliLocationBase filtered by the currcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByLang(string $lang) Return the first ChildAliLocationBase filtered by the lang column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByTimediff(int $timediff) Return the first ChildAliLocationBase filtered by the timediff column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByRegisTransfer(string $regis_transfer) Return the first ChildAliLocationBase filtered by the regis_transfer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByRegisSuccess(string $regis_success) Return the first ChildAliLocationBase filtered by the regis_success column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByRegisFail(string $regis_fail) Return the first ChildAliLocationBase filtered by the regis_fail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByRegisCancel(string $regis_cancel) Return the first ChildAliLocationBase filtered by the regis_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByMainInvCode(string $main_inv_code) Return the first ChildAliLocationBase filtered by the main_inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLocationBase requireOneByComTransferChagre(string $com_transfer_chagre) Return the first ChildAliLocationBase filtered by the com_transfer_chagre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLocationBase[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliLocationBase objects based on current ModelCriteria
 * @method     ChildAliLocationBase[]|ObjectCollection findByCid(int $cid) Return ChildAliLocationBase objects filtered by the cid column
 * @method     ChildAliLocationBase[]|ObjectCollection findByCshort(string $cshort) Return ChildAliLocationBase objects filtered by the cshort column
 * @method     ChildAliLocationBase[]|ObjectCollection findByCname(string $cname) Return ChildAliLocationBase objects filtered by the cname column
 * @method     ChildAliLocationBase[]|ObjectCollection findByCsending(string $csending) Return ChildAliLocationBase objects filtered by the csending column
 * @method     ChildAliLocationBase[]|ObjectCollection findByCtax(string $ctax) Return ChildAliLocationBase objects filtered by the ctax column
 * @method     ChildAliLocationBase[]|ObjectCollection findByCtax1(string $ctax1) Return ChildAliLocationBase objects filtered by the ctax1 column
 * @method     ChildAliLocationBase[]|ObjectCollection findByComStockist(string $com_stockist) Return ChildAliLocationBase objects filtered by the com_stockist column
 * @method     ChildAliLocationBase[]|ObjectCollection findByCrate(string $crate) Return ChildAliLocationBase objects filtered by the crate column
 * @method     ChildAliLocationBase[]|ObjectCollection findByPcodeRegister(string $pcode_register) Return ChildAliLocationBase objects filtered by the pcode_register column
 * @method     ChildAliLocationBase[]|ObjectCollection findByPcodeExtend(string $pcode_extend) Return ChildAliLocationBase objects filtered by the pcode_extend column
 * @method     ChildAliLocationBase[]|ObjectCollection findByPcodeCharge(string $pcode_charge) Return ChildAliLocationBase objects filtered by the pcode_charge column
 * @method     ChildAliLocationBase[]|ObjectCollection findBySmssending(int $smssending) Return ChildAliLocationBase objects filtered by the smssending column
 * @method     ChildAliLocationBase[]|ObjectCollection findByCurrcode(string $currcode) Return ChildAliLocationBase objects filtered by the currcode column
 * @method     ChildAliLocationBase[]|ObjectCollection findByLang(string $lang) Return ChildAliLocationBase objects filtered by the lang column
 * @method     ChildAliLocationBase[]|ObjectCollection findByTimediff(int $timediff) Return ChildAliLocationBase objects filtered by the timediff column
 * @method     ChildAliLocationBase[]|ObjectCollection findByRegisTransfer(string $regis_transfer) Return ChildAliLocationBase objects filtered by the regis_transfer column
 * @method     ChildAliLocationBase[]|ObjectCollection findByRegisSuccess(string $regis_success) Return ChildAliLocationBase objects filtered by the regis_success column
 * @method     ChildAliLocationBase[]|ObjectCollection findByRegisFail(string $regis_fail) Return ChildAliLocationBase objects filtered by the regis_fail column
 * @method     ChildAliLocationBase[]|ObjectCollection findByRegisCancel(string $regis_cancel) Return ChildAliLocationBase objects filtered by the regis_cancel column
 * @method     ChildAliLocationBase[]|ObjectCollection findByMainInvCode(string $main_inv_code) Return ChildAliLocationBase objects filtered by the main_inv_code column
 * @method     ChildAliLocationBase[]|ObjectCollection findByComTransferChagre(string $com_transfer_chagre) Return ChildAliLocationBase objects filtered by the com_transfer_chagre column
 * @method     ChildAliLocationBase[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliLocationBaseQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliLocationBaseQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliLocationBase', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliLocationBaseQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliLocationBaseQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliLocationBaseQuery) {
            return $criteria;
        }
        $query = new ChildAliLocationBaseQuery();
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
     * @return ChildAliLocationBase|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliLocationBaseTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliLocationBaseTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliLocationBase A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT cid, cshort, cname, csending, ctax, ctax1, com_stockist, crate, pcode_register, pcode_extend, pcode_charge, smssending, currcode, lang, timediff, regis_transfer, regis_success, regis_fail, regis_cancel, main_inv_code, com_transfer_chagre FROM ali_location_base WHERE cid = :p0';
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
            /** @var ChildAliLocationBase $obj */
            $obj = new ChildAliLocationBase();
            $obj->hydrate($row);
            AliLocationBaseTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliLocationBase|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_CID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_CID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the cid column
     *
     * Example usage:
     * <code>
     * $query->filterByCid(1234); // WHERE cid = 1234
     * $query->filterByCid(array(12, 34)); // WHERE cid IN (12, 34)
     * $query->filterByCid(array('min' => 12)); // WHERE cid > 12
     * </code>
     *
     * @param     mixed $cid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByCid($cid = null, $comparison = null)
    {
        if (is_array($cid)) {
            $useMinMax = false;
            if (isset($cid['min'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_CID, $cid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cid['max'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_CID, $cid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_CID, $cid, $comparison);
    }

    /**
     * Filter the query on the cshort column
     *
     * Example usage:
     * <code>
     * $query->filterByCshort('fooValue');   // WHERE cshort = 'fooValue'
     * $query->filterByCshort('%fooValue%', Criteria::LIKE); // WHERE cshort LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cshort The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByCshort($cshort = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cshort)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_CSHORT, $cshort, $comparison);
    }

    /**
     * Filter the query on the cname column
     *
     * Example usage:
     * <code>
     * $query->filterByCname('fooValue');   // WHERE cname = 'fooValue'
     * $query->filterByCname('%fooValue%', Criteria::LIKE); // WHERE cname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByCname($cname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_CNAME, $cname, $comparison);
    }

    /**
     * Filter the query on the csending column
     *
     * Example usage:
     * <code>
     * $query->filterByCsending('fooValue');   // WHERE csending = 'fooValue'
     * $query->filterByCsending('%fooValue%', Criteria::LIKE); // WHERE csending LIKE '%fooValue%'
     * </code>
     *
     * @param     string $csending The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByCsending($csending = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($csending)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_CSENDING, $csending, $comparison);
    }

    /**
     * Filter the query on the ctax column
     *
     * Example usage:
     * <code>
     * $query->filterByCtax(1234); // WHERE ctax = 1234
     * $query->filterByCtax(array(12, 34)); // WHERE ctax IN (12, 34)
     * $query->filterByCtax(array('min' => 12)); // WHERE ctax > 12
     * </code>
     *
     * @param     mixed $ctax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByCtax($ctax = null, $comparison = null)
    {
        if (is_array($ctax)) {
            $useMinMax = false;
            if (isset($ctax['min'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_CTAX, $ctax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ctax['max'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_CTAX, $ctax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_CTAX, $ctax, $comparison);
    }

    /**
     * Filter the query on the ctax1 column
     *
     * Example usage:
     * <code>
     * $query->filterByCtax1(1234); // WHERE ctax1 = 1234
     * $query->filterByCtax1(array(12, 34)); // WHERE ctax1 IN (12, 34)
     * $query->filterByCtax1(array('min' => 12)); // WHERE ctax1 > 12
     * </code>
     *
     * @param     mixed $ctax1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByCtax1($ctax1 = null, $comparison = null)
    {
        if (is_array($ctax1)) {
            $useMinMax = false;
            if (isset($ctax1['min'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_CTAX1, $ctax1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ctax1['max'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_CTAX1, $ctax1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_CTAX1, $ctax1, $comparison);
    }

    /**
     * Filter the query on the com_stockist column
     *
     * Example usage:
     * <code>
     * $query->filterByComStockist(1234); // WHERE com_stockist = 1234
     * $query->filterByComStockist(array(12, 34)); // WHERE com_stockist IN (12, 34)
     * $query->filterByComStockist(array('min' => 12)); // WHERE com_stockist > 12
     * </code>
     *
     * @param     mixed $comStockist The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByComStockist($comStockist = null, $comparison = null)
    {
        if (is_array($comStockist)) {
            $useMinMax = false;
            if (isset($comStockist['min'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_COM_STOCKIST, $comStockist['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($comStockist['max'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_COM_STOCKIST, $comStockist['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_COM_STOCKIST, $comStockist, $comparison);
    }

    /**
     * Filter the query on the crate column
     *
     * Example usage:
     * <code>
     * $query->filterByCrate(1234); // WHERE crate = 1234
     * $query->filterByCrate(array(12, 34)); // WHERE crate IN (12, 34)
     * $query->filterByCrate(array('min' => 12)); // WHERE crate > 12
     * </code>
     *
     * @param     mixed $crate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_CRATE, $crate, $comparison);
    }

    /**
     * Filter the query on the pcode_register column
     *
     * Example usage:
     * <code>
     * $query->filterByPcodeRegister('fooValue');   // WHERE pcode_register = 'fooValue'
     * $query->filterByPcodeRegister('%fooValue%', Criteria::LIKE); // WHERE pcode_register LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pcodeRegister The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByPcodeRegister($pcodeRegister = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcodeRegister)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_PCODE_REGISTER, $pcodeRegister, $comparison);
    }

    /**
     * Filter the query on the pcode_extend column
     *
     * Example usage:
     * <code>
     * $query->filterByPcodeExtend('fooValue');   // WHERE pcode_extend = 'fooValue'
     * $query->filterByPcodeExtend('%fooValue%', Criteria::LIKE); // WHERE pcode_extend LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pcodeExtend The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByPcodeExtend($pcodeExtend = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcodeExtend)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_PCODE_EXTEND, $pcodeExtend, $comparison);
    }

    /**
     * Filter the query on the pcode_charge column
     *
     * Example usage:
     * <code>
     * $query->filterByPcodeCharge('fooValue');   // WHERE pcode_charge = 'fooValue'
     * $query->filterByPcodeCharge('%fooValue%', Criteria::LIKE); // WHERE pcode_charge LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pcodeCharge The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByPcodeCharge($pcodeCharge = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcodeCharge)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_PCODE_CHARGE, $pcodeCharge, $comparison);
    }

    /**
     * Filter the query on the smssending column
     *
     * Example usage:
     * <code>
     * $query->filterBySmssending(1234); // WHERE smssending = 1234
     * $query->filterBySmssending(array(12, 34)); // WHERE smssending IN (12, 34)
     * $query->filterBySmssending(array('min' => 12)); // WHERE smssending > 12
     * </code>
     *
     * @param     mixed $smssending The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterBySmssending($smssending = null, $comparison = null)
    {
        if (is_array($smssending)) {
            $useMinMax = false;
            if (isset($smssending['min'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_SMSSENDING, $smssending['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($smssending['max'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_SMSSENDING, $smssending['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_SMSSENDING, $smssending, $comparison);
    }

    /**
     * Filter the query on the currcode column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrcode('fooValue');   // WHERE currcode = 'fooValue'
     * $query->filterByCurrcode('%fooValue%', Criteria::LIKE); // WHERE currcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $currcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByCurrcode($currcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($currcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_CURRCODE, $currcode, $comparison);
    }

    /**
     * Filter the query on the lang column
     *
     * Example usage:
     * <code>
     * $query->filterByLang('fooValue');   // WHERE lang = 'fooValue'
     * $query->filterByLang('%fooValue%', Criteria::LIKE); // WHERE lang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lang The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByLang($lang = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lang)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_LANG, $lang, $comparison);
    }

    /**
     * Filter the query on the timediff column
     *
     * Example usage:
     * <code>
     * $query->filterByTimediff(1234); // WHERE timediff = 1234
     * $query->filterByTimediff(array(12, 34)); // WHERE timediff IN (12, 34)
     * $query->filterByTimediff(array('min' => 12)); // WHERE timediff > 12
     * </code>
     *
     * @param     mixed $timediff The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByTimediff($timediff = null, $comparison = null)
    {
        if (is_array($timediff)) {
            $useMinMax = false;
            if (isset($timediff['min'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_TIMEDIFF, $timediff['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timediff['max'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_TIMEDIFF, $timediff['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_TIMEDIFF, $timediff, $comparison);
    }

    /**
     * Filter the query on the regis_transfer column
     *
     * Example usage:
     * <code>
     * $query->filterByRegisTransfer('fooValue');   // WHERE regis_transfer = 'fooValue'
     * $query->filterByRegisTransfer('%fooValue%', Criteria::LIKE); // WHERE regis_transfer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regisTransfer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByRegisTransfer($regisTransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regisTransfer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_REGIS_TRANSFER, $regisTransfer, $comparison);
    }

    /**
     * Filter the query on the regis_success column
     *
     * Example usage:
     * <code>
     * $query->filterByRegisSuccess('fooValue');   // WHERE regis_success = 'fooValue'
     * $query->filterByRegisSuccess('%fooValue%', Criteria::LIKE); // WHERE regis_success LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regisSuccess The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByRegisSuccess($regisSuccess = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regisSuccess)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_REGIS_SUCCESS, $regisSuccess, $comparison);
    }

    /**
     * Filter the query on the regis_fail column
     *
     * Example usage:
     * <code>
     * $query->filterByRegisFail('fooValue');   // WHERE regis_fail = 'fooValue'
     * $query->filterByRegisFail('%fooValue%', Criteria::LIKE); // WHERE regis_fail LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regisFail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByRegisFail($regisFail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regisFail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_REGIS_FAIL, $regisFail, $comparison);
    }

    /**
     * Filter the query on the regis_cancel column
     *
     * Example usage:
     * <code>
     * $query->filterByRegisCancel('fooValue');   // WHERE regis_cancel = 'fooValue'
     * $query->filterByRegisCancel('%fooValue%', Criteria::LIKE); // WHERE regis_cancel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regisCancel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByRegisCancel($regisCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regisCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_REGIS_CANCEL, $regisCancel, $comparison);
    }

    /**
     * Filter the query on the main_inv_code column
     *
     * Example usage:
     * <code>
     * $query->filterByMainInvCode('fooValue');   // WHERE main_inv_code = 'fooValue'
     * $query->filterByMainInvCode('%fooValue%', Criteria::LIKE); // WHERE main_inv_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mainInvCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByMainInvCode($mainInvCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mainInvCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_MAIN_INV_CODE, $mainInvCode, $comparison);
    }

    /**
     * Filter the query on the com_transfer_chagre column
     *
     * Example usage:
     * <code>
     * $query->filterByComTransferChagre(1234); // WHERE com_transfer_chagre = 1234
     * $query->filterByComTransferChagre(array(12, 34)); // WHERE com_transfer_chagre IN (12, 34)
     * $query->filterByComTransferChagre(array('min' => 12)); // WHERE com_transfer_chagre > 12
     * </code>
     *
     * @param     mixed $comTransferChagre The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function filterByComTransferChagre($comTransferChagre = null, $comparison = null)
    {
        if (is_array($comTransferChagre)) {
            $useMinMax = false;
            if (isset($comTransferChagre['min'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_COM_TRANSFER_CHAGRE, $comTransferChagre['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($comTransferChagre['max'])) {
                $this->addUsingAlias(AliLocationBaseTableMap::COL_COM_TRANSFER_CHAGRE, $comTransferChagre['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLocationBaseTableMap::COL_COM_TRANSFER_CHAGRE, $comTransferChagre, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliLocationBase $aliLocationBase Object to remove from the list of results
     *
     * @return $this|ChildAliLocationBaseQuery The current query, for fluid interface
     */
    public function prune($aliLocationBase = null)
    {
        if ($aliLocationBase) {
            $this->addUsingAlias(AliLocationBaseTableMap::COL_CID, $aliLocationBase->getCid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_location_base table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLocationBaseTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliLocationBaseTableMap::clearInstancePool();
            AliLocationBaseTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLocationBaseTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliLocationBaseTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliLocationBaseTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliLocationBaseTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliLocationBaseQuery
