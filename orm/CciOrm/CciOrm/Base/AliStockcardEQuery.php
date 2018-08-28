<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliStockcardE as ChildAliStockcardE;
use CciOrm\CciOrm\AliStockcardEQuery as ChildAliStockcardEQuery;
use CciOrm\CciOrm\Map\AliStockcardETableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_stockcard_e' table.
 *
 *
 *
 * @method     ChildAliStockcardEQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliStockcardEQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliStockcardEQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliStockcardEQuery orderByInvRef($order = Criteria::ASC) Order by the inv_ref column
 * @method     ChildAliStockcardEQuery orderByInvAction($order = Criteria::ASC) Order by the inv_action column
 * @method     ChildAliStockcardEQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliStockcardEQuery orderBySanoRef($order = Criteria::ASC) Order by the sano_ref column
 * @method     ChildAliStockcardEQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliStockcardEQuery orderByPdesc($order = Criteria::ASC) Order by the pdesc column
 * @method     ChildAliStockcardEQuery orderByInAmount($order = Criteria::ASC) Order by the in_amount column
 * @method     ChildAliStockcardEQuery orderByOutAmount($order = Criteria::ASC) Order by the out_amount column
 * @method     ChildAliStockcardEQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliStockcardEQuery orderByRdate($order = Criteria::ASC) Order by the rdate column
 * @method     ChildAliStockcardEQuery orderByRccode($order = Criteria::ASC) Order by the rccode column
 * @method     ChildAliStockcardEQuery orderByYokma($order = Criteria::ASC) Order by the yokma column
 * @method     ChildAliStockcardEQuery orderByBalance($order = Criteria::ASC) Order by the balance column
 * @method     ChildAliStockcardEQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildAliStockcardEQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildAliStockcardEQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliStockcardEQuery orderByAction($order = Criteria::ASC) Order by the action column
 *
 * @method     ChildAliStockcardEQuery groupById() Group by the id column
 * @method     ChildAliStockcardEQuery groupByMcode() Group by the mcode column
 * @method     ChildAliStockcardEQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliStockcardEQuery groupByInvRef() Group by the inv_ref column
 * @method     ChildAliStockcardEQuery groupByInvAction() Group by the inv_action column
 * @method     ChildAliStockcardEQuery groupBySano() Group by the sano column
 * @method     ChildAliStockcardEQuery groupBySanoRef() Group by the sano_ref column
 * @method     ChildAliStockcardEQuery groupByPcode() Group by the pcode column
 * @method     ChildAliStockcardEQuery groupByPdesc() Group by the pdesc column
 * @method     ChildAliStockcardEQuery groupByInAmount() Group by the in_amount column
 * @method     ChildAliStockcardEQuery groupByOutAmount() Group by the out_amount column
 * @method     ChildAliStockcardEQuery groupBySadate() Group by the sadate column
 * @method     ChildAliStockcardEQuery groupByRdate() Group by the rdate column
 * @method     ChildAliStockcardEQuery groupByRccode() Group by the rccode column
 * @method     ChildAliStockcardEQuery groupByYokma() Group by the yokma column
 * @method     ChildAliStockcardEQuery groupByBalance() Group by the balance column
 * @method     ChildAliStockcardEQuery groupByPrice() Group by the price column
 * @method     ChildAliStockcardEQuery groupByAmount() Group by the amount column
 * @method     ChildAliStockcardEQuery groupByUid() Group by the uid column
 * @method     ChildAliStockcardEQuery groupByAction() Group by the action column
 *
 * @method     ChildAliStockcardEQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliStockcardEQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliStockcardEQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliStockcardEQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliStockcardEQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliStockcardEQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliStockcardE findOne(ConnectionInterface $con = null) Return the first ChildAliStockcardE matching the query
 * @method     ChildAliStockcardE findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliStockcardE matching the query, or a new ChildAliStockcardE object populated from the query conditions when no match is found
 *
 * @method     ChildAliStockcardE findOneById(int $id) Return the first ChildAliStockcardE filtered by the id column
 * @method     ChildAliStockcardE findOneByMcode(string $mcode) Return the first ChildAliStockcardE filtered by the mcode column
 * @method     ChildAliStockcardE findOneByInvCode(string $inv_code) Return the first ChildAliStockcardE filtered by the inv_code column
 * @method     ChildAliStockcardE findOneByInvRef(string $inv_ref) Return the first ChildAliStockcardE filtered by the inv_ref column
 * @method     ChildAliStockcardE findOneByInvAction(string $inv_action) Return the first ChildAliStockcardE filtered by the inv_action column
 * @method     ChildAliStockcardE findOneBySano(string $sano) Return the first ChildAliStockcardE filtered by the sano column
 * @method     ChildAliStockcardE findOneBySanoRef(string $sano_ref) Return the first ChildAliStockcardE filtered by the sano_ref column
 * @method     ChildAliStockcardE findOneByPcode(string $pcode) Return the first ChildAliStockcardE filtered by the pcode column
 * @method     ChildAliStockcardE findOneByPdesc(string $pdesc) Return the first ChildAliStockcardE filtered by the pdesc column
 * @method     ChildAliStockcardE findOneByInAmount(string $in_amount) Return the first ChildAliStockcardE filtered by the in_amount column
 * @method     ChildAliStockcardE findOneByOutAmount(string $out_amount) Return the first ChildAliStockcardE filtered by the out_amount column
 * @method     ChildAliStockcardE findOneBySadate(string $sadate) Return the first ChildAliStockcardE filtered by the sadate column
 * @method     ChildAliStockcardE findOneByRdate(string $rdate) Return the first ChildAliStockcardE filtered by the rdate column
 * @method     ChildAliStockcardE findOneByRccode(string $rccode) Return the first ChildAliStockcardE filtered by the rccode column
 * @method     ChildAliStockcardE findOneByYokma(int $yokma) Return the first ChildAliStockcardE filtered by the yokma column
 * @method     ChildAliStockcardE findOneByBalance(int $balance) Return the first ChildAliStockcardE filtered by the balance column
 * @method     ChildAliStockcardE findOneByPrice(string $price) Return the first ChildAliStockcardE filtered by the price column
 * @method     ChildAliStockcardE findOneByAmount(string $amount) Return the first ChildAliStockcardE filtered by the amount column
 * @method     ChildAliStockcardE findOneByUid(string $uid) Return the first ChildAliStockcardE filtered by the uid column
 * @method     ChildAliStockcardE findOneByAction(string $action) Return the first ChildAliStockcardE filtered by the action column *

 * @method     ChildAliStockcardE requirePk($key, ConnectionInterface $con = null) Return the ChildAliStockcardE by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOne(ConnectionInterface $con = null) Return the first ChildAliStockcardE matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStockcardE requireOneById(int $id) Return the first ChildAliStockcardE filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByMcode(string $mcode) Return the first ChildAliStockcardE filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByInvCode(string $inv_code) Return the first ChildAliStockcardE filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByInvRef(string $inv_ref) Return the first ChildAliStockcardE filtered by the inv_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByInvAction(string $inv_action) Return the first ChildAliStockcardE filtered by the inv_action column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneBySano(string $sano) Return the first ChildAliStockcardE filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneBySanoRef(string $sano_ref) Return the first ChildAliStockcardE filtered by the sano_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByPcode(string $pcode) Return the first ChildAliStockcardE filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByPdesc(string $pdesc) Return the first ChildAliStockcardE filtered by the pdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByInAmount(string $in_amount) Return the first ChildAliStockcardE filtered by the in_amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByOutAmount(string $out_amount) Return the first ChildAliStockcardE filtered by the out_amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneBySadate(string $sadate) Return the first ChildAliStockcardE filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByRdate(string $rdate) Return the first ChildAliStockcardE filtered by the rdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByRccode(string $rccode) Return the first ChildAliStockcardE filtered by the rccode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByYokma(int $yokma) Return the first ChildAliStockcardE filtered by the yokma column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByBalance(int $balance) Return the first ChildAliStockcardE filtered by the balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByPrice(string $price) Return the first ChildAliStockcardE filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByAmount(string $amount) Return the first ChildAliStockcardE filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByUid(string $uid) Return the first ChildAliStockcardE filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardE requireOneByAction(string $action) Return the first ChildAliStockcardE filtered by the action column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStockcardE[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliStockcardE objects based on current ModelCriteria
 * @method     ChildAliStockcardE[]|ObjectCollection findById(int $id) Return ChildAliStockcardE objects filtered by the id column
 * @method     ChildAliStockcardE[]|ObjectCollection findByMcode(string $mcode) Return ChildAliStockcardE objects filtered by the mcode column
 * @method     ChildAliStockcardE[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliStockcardE objects filtered by the inv_code column
 * @method     ChildAliStockcardE[]|ObjectCollection findByInvRef(string $inv_ref) Return ChildAliStockcardE objects filtered by the inv_ref column
 * @method     ChildAliStockcardE[]|ObjectCollection findByInvAction(string $inv_action) Return ChildAliStockcardE objects filtered by the inv_action column
 * @method     ChildAliStockcardE[]|ObjectCollection findBySano(string $sano) Return ChildAliStockcardE objects filtered by the sano column
 * @method     ChildAliStockcardE[]|ObjectCollection findBySanoRef(string $sano_ref) Return ChildAliStockcardE objects filtered by the sano_ref column
 * @method     ChildAliStockcardE[]|ObjectCollection findByPcode(string $pcode) Return ChildAliStockcardE objects filtered by the pcode column
 * @method     ChildAliStockcardE[]|ObjectCollection findByPdesc(string $pdesc) Return ChildAliStockcardE objects filtered by the pdesc column
 * @method     ChildAliStockcardE[]|ObjectCollection findByInAmount(string $in_amount) Return ChildAliStockcardE objects filtered by the in_amount column
 * @method     ChildAliStockcardE[]|ObjectCollection findByOutAmount(string $out_amount) Return ChildAliStockcardE objects filtered by the out_amount column
 * @method     ChildAliStockcardE[]|ObjectCollection findBySadate(string $sadate) Return ChildAliStockcardE objects filtered by the sadate column
 * @method     ChildAliStockcardE[]|ObjectCollection findByRdate(string $rdate) Return ChildAliStockcardE objects filtered by the rdate column
 * @method     ChildAliStockcardE[]|ObjectCollection findByRccode(string $rccode) Return ChildAliStockcardE objects filtered by the rccode column
 * @method     ChildAliStockcardE[]|ObjectCollection findByYokma(int $yokma) Return ChildAliStockcardE objects filtered by the yokma column
 * @method     ChildAliStockcardE[]|ObjectCollection findByBalance(int $balance) Return ChildAliStockcardE objects filtered by the balance column
 * @method     ChildAliStockcardE[]|ObjectCollection findByPrice(string $price) Return ChildAliStockcardE objects filtered by the price column
 * @method     ChildAliStockcardE[]|ObjectCollection findByAmount(string $amount) Return ChildAliStockcardE objects filtered by the amount column
 * @method     ChildAliStockcardE[]|ObjectCollection findByUid(string $uid) Return ChildAliStockcardE objects filtered by the uid column
 * @method     ChildAliStockcardE[]|ObjectCollection findByAction(string $action) Return ChildAliStockcardE objects filtered by the action column
 * @method     ChildAliStockcardE[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliStockcardEQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliStockcardEQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliStockcardE', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliStockcardEQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliStockcardEQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliStockcardEQuery) {
            return $criteria;
        }
        $query = new ChildAliStockcardEQuery();
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
     * @return ChildAliStockcardE|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliStockcardETableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliStockcardETableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliStockcardE A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, inv_code, inv_ref, inv_action, sano, sano_ref, pcode, pdesc, in_amount, out_amount, sadate, rdate, rccode, yokma, balance, price, amount, uid, action FROM ali_stockcard_e WHERE id = :p0';
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
            /** @var ChildAliStockcardE $obj */
            $obj = new ChildAliStockcardE();
            $obj->hydrate($row);
            AliStockcardETableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliStockcardE|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliStockcardETableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliStockcardETableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Filter the query on the inv_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByInvRef('fooValue');   // WHERE inv_ref = 'fooValue'
     * $query->filterByInvRef('%fooValue%', Criteria::LIKE); // WHERE inv_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByInvRef($invRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_INV_REF, $invRef, $comparison);
    }

    /**
     * Filter the query on the inv_action column
     *
     * Example usage:
     * <code>
     * $query->filterByInvAction('fooValue');   // WHERE inv_action = 'fooValue'
     * $query->filterByInvAction('%fooValue%', Criteria::LIKE); // WHERE inv_action LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invAction The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByInvAction($invAction = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invAction)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_INV_ACTION, $invAction, $comparison);
    }

    /**
     * Filter the query on the sano column
     *
     * Example usage:
     * <code>
     * $query->filterBySano('fooValue');   // WHERE sano = 'fooValue'
     * $query->filterBySano('%fooValue%', Criteria::LIKE); // WHERE sano LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sano The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_SANO, $sano, $comparison);
    }

    /**
     * Filter the query on the sano_ref column
     *
     * Example usage:
     * <code>
     * $query->filterBySanoRef('fooValue');   // WHERE sano_ref = 'fooValue'
     * $query->filterBySanoRef('%fooValue%', Criteria::LIKE); // WHERE sano_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sanoRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterBySanoRef($sanoRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sanoRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_SANO_REF, $sanoRef, $comparison);
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
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_PCODE, $pcode, $comparison);
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
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByPdesc($pdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_PDESC, $pdesc, $comparison);
    }

    /**
     * Filter the query on the in_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByInAmount(1234); // WHERE in_amount = 1234
     * $query->filterByInAmount(array(12, 34)); // WHERE in_amount IN (12, 34)
     * $query->filterByInAmount(array('min' => 12)); // WHERE in_amount > 12
     * </code>
     *
     * @param     mixed $inAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByInAmount($inAmount = null, $comparison = null)
    {
        if (is_array($inAmount)) {
            $useMinMax = false;
            if (isset($inAmount['min'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_IN_AMOUNT, $inAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inAmount['max'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_IN_AMOUNT, $inAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_IN_AMOUNT, $inAmount, $comparison);
    }

    /**
     * Filter the query on the out_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByOutAmount(1234); // WHERE out_amount = 1234
     * $query->filterByOutAmount(array(12, 34)); // WHERE out_amount IN (12, 34)
     * $query->filterByOutAmount(array('min' => 12)); // WHERE out_amount > 12
     * </code>
     *
     * @param     mixed $outAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByOutAmount($outAmount = null, $comparison = null)
    {
        if (is_array($outAmount)) {
            $useMinMax = false;
            if (isset($outAmount['min'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_OUT_AMOUNT, $outAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outAmount['max'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_OUT_AMOUNT, $outAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_OUT_AMOUNT, $outAmount, $comparison);
    }

    /**
     * Filter the query on the sadate column
     *
     * Example usage:
     * <code>
     * $query->filterBySadate('2011-03-14'); // WHERE sadate = '2011-03-14'
     * $query->filterBySadate('now'); // WHERE sadate = '2011-03-14'
     * $query->filterBySadate(array('max' => 'yesterday')); // WHERE sadate > '2011-03-13'
     * </code>
     *
     * @param     mixed $sadate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_SADATE, $sadate, $comparison);
    }

    /**
     * Filter the query on the rdate column
     *
     * Example usage:
     * <code>
     * $query->filterByRdate('2011-03-14'); // WHERE rdate = '2011-03-14'
     * $query->filterByRdate('now'); // WHERE rdate = '2011-03-14'
     * $query->filterByRdate(array('max' => 'yesterday')); // WHERE rdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $rdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByRdate($rdate = null, $comparison = null)
    {
        if (is_array($rdate)) {
            $useMinMax = false;
            if (isset($rdate['min'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_RDATE, $rdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rdate['max'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_RDATE, $rdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_RDATE, $rdate, $comparison);
    }

    /**
     * Filter the query on the rccode column
     *
     * Example usage:
     * <code>
     * $query->filterByRccode('fooValue');   // WHERE rccode = 'fooValue'
     * $query->filterByRccode('%fooValue%', Criteria::LIKE); // WHERE rccode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rccode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByRccode($rccode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rccode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_RCCODE, $rccode, $comparison);
    }

    /**
     * Filter the query on the yokma column
     *
     * Example usage:
     * <code>
     * $query->filterByYokma(1234); // WHERE yokma = 1234
     * $query->filterByYokma(array(12, 34)); // WHERE yokma IN (12, 34)
     * $query->filterByYokma(array('min' => 12)); // WHERE yokma > 12
     * </code>
     *
     * @param     mixed $yokma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByYokma($yokma = null, $comparison = null)
    {
        if (is_array($yokma)) {
            $useMinMax = false;
            if (isset($yokma['min'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_YOKMA, $yokma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($yokma['max'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_YOKMA, $yokma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_YOKMA, $yokma, $comparison);
    }

    /**
     * Filter the query on the balance column
     *
     * Example usage:
     * <code>
     * $query->filterByBalance(1234); // WHERE balance = 1234
     * $query->filterByBalance(array(12, 34)); // WHERE balance IN (12, 34)
     * $query->filterByBalance(array('min' => 12)); // WHERE balance > 12
     * </code>
     *
     * @param     mixed $balance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByBalance($balance = null, $comparison = null)
    {
        if (is_array($balance)) {
            $useMinMax = false;
            if (isset($balance['min'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_BALANCE, $balance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($balance['max'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_BALANCE, $balance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_BALANCE, $balance, $comparison);
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
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount > 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(AliStockcardETableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid('fooValue');   // WHERE uid = 'fooValue'
     * $query->filterByUid('%fooValue%', Criteria::LIKE); // WHERE uid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Filter the query on the action column
     *
     * Example usage:
     * <code>
     * $query->filterByAction('fooValue');   // WHERE action = 'fooValue'
     * $query->filterByAction('%fooValue%', Criteria::LIKE); // WHERE action LIKE '%fooValue%'
     * </code>
     *
     * @param     string $action The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function filterByAction($action = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($action)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardETableMap::COL_ACTION, $action, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliStockcardE $aliStockcardE Object to remove from the list of results
     *
     * @return $this|ChildAliStockcardEQuery The current query, for fluid interface
     */
    public function prune($aliStockcardE = null)
    {
        if ($aliStockcardE) {
            $this->addUsingAlias(AliStockcardETableMap::COL_ID, $aliStockcardE->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_stockcard_e table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStockcardETableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliStockcardETableMap::clearInstancePool();
            AliStockcardETableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStockcardETableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliStockcardETableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliStockcardETableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliStockcardETableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliStockcardEQuery
