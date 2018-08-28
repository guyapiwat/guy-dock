<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliStockcardR as ChildAliStockcardR;
use CciOrm\CciOrm\AliStockcardRQuery as ChildAliStockcardRQuery;
use CciOrm\CciOrm\Map\AliStockcardRTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_stockcard_r' table.
 *
 *
 *
 * @method     ChildAliStockcardRQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliStockcardRQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliStockcardRQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliStockcardRQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliStockcardRQuery orderByInvRef($order = Criteria::ASC) Order by the inv_ref column
 * @method     ChildAliStockcardRQuery orderByInvAction($order = Criteria::ASC) Order by the inv_action column
 * @method     ChildAliStockcardRQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliStockcardRQuery orderBySanoRef($order = Criteria::ASC) Order by the sano_ref column
 * @method     ChildAliStockcardRQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliStockcardRQuery orderByPdesc($order = Criteria::ASC) Order by the pdesc column
 * @method     ChildAliStockcardRQuery orderByInQty($order = Criteria::ASC) Order by the in_qty column
 * @method     ChildAliStockcardRQuery orderByInPrice($order = Criteria::ASC) Order by the in_price column
 * @method     ChildAliStockcardRQuery orderByInAmount($order = Criteria::ASC) Order by the in_amount column
 * @method     ChildAliStockcardRQuery orderByOutQty($order = Criteria::ASC) Order by the out_qty column
 * @method     ChildAliStockcardRQuery orderByOutPrice($order = Criteria::ASC) Order by the out_price column
 * @method     ChildAliStockcardRQuery orderByOutAmount($order = Criteria::ASC) Order by the out_amount column
 * @method     ChildAliStockcardRQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliStockcardRQuery orderByRdate($order = Criteria::ASC) Order by the rdate column
 * @method     ChildAliStockcardRQuery orderByRccode($order = Criteria::ASC) Order by the rccode column
 * @method     ChildAliStockcardRQuery orderByYokma($order = Criteria::ASC) Order by the yokma column
 * @method     ChildAliStockcardRQuery orderByBalance($order = Criteria::ASC) Order by the balance column
 * @method     ChildAliStockcardRQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildAliStockcardRQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildAliStockcardRQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliStockcardRQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method     ChildAliStockcardRQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 *
 * @method     ChildAliStockcardRQuery groupById() Group by the id column
 * @method     ChildAliStockcardRQuery groupByMcode() Group by the mcode column
 * @method     ChildAliStockcardRQuery groupByNameT() Group by the name_t column
 * @method     ChildAliStockcardRQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliStockcardRQuery groupByInvRef() Group by the inv_ref column
 * @method     ChildAliStockcardRQuery groupByInvAction() Group by the inv_action column
 * @method     ChildAliStockcardRQuery groupBySano() Group by the sano column
 * @method     ChildAliStockcardRQuery groupBySanoRef() Group by the sano_ref column
 * @method     ChildAliStockcardRQuery groupByPcode() Group by the pcode column
 * @method     ChildAliStockcardRQuery groupByPdesc() Group by the pdesc column
 * @method     ChildAliStockcardRQuery groupByInQty() Group by the in_qty column
 * @method     ChildAliStockcardRQuery groupByInPrice() Group by the in_price column
 * @method     ChildAliStockcardRQuery groupByInAmount() Group by the in_amount column
 * @method     ChildAliStockcardRQuery groupByOutQty() Group by the out_qty column
 * @method     ChildAliStockcardRQuery groupByOutPrice() Group by the out_price column
 * @method     ChildAliStockcardRQuery groupByOutAmount() Group by the out_amount column
 * @method     ChildAliStockcardRQuery groupBySadate() Group by the sadate column
 * @method     ChildAliStockcardRQuery groupByRdate() Group by the rdate column
 * @method     ChildAliStockcardRQuery groupByRccode() Group by the rccode column
 * @method     ChildAliStockcardRQuery groupByYokma() Group by the yokma column
 * @method     ChildAliStockcardRQuery groupByBalance() Group by the balance column
 * @method     ChildAliStockcardRQuery groupByPrice() Group by the price column
 * @method     ChildAliStockcardRQuery groupByAmount() Group by the amount column
 * @method     ChildAliStockcardRQuery groupByUid() Group by the uid column
 * @method     ChildAliStockcardRQuery groupByAction() Group by the action column
 * @method     ChildAliStockcardRQuery groupByCancel() Group by the cancel column
 *
 * @method     ChildAliStockcardRQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliStockcardRQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliStockcardRQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliStockcardRQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliStockcardRQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliStockcardRQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliStockcardR findOne(ConnectionInterface $con = null) Return the first ChildAliStockcardR matching the query
 * @method     ChildAliStockcardR findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliStockcardR matching the query, or a new ChildAliStockcardR object populated from the query conditions when no match is found
 *
 * @method     ChildAliStockcardR findOneById(int $id) Return the first ChildAliStockcardR filtered by the id column
 * @method     ChildAliStockcardR findOneByMcode(string $mcode) Return the first ChildAliStockcardR filtered by the mcode column
 * @method     ChildAliStockcardR findOneByNameT(string $name_t) Return the first ChildAliStockcardR filtered by the name_t column
 * @method     ChildAliStockcardR findOneByInvCode(string $inv_code) Return the first ChildAliStockcardR filtered by the inv_code column
 * @method     ChildAliStockcardR findOneByInvRef(string $inv_ref) Return the first ChildAliStockcardR filtered by the inv_ref column
 * @method     ChildAliStockcardR findOneByInvAction(string $inv_action) Return the first ChildAliStockcardR filtered by the inv_action column
 * @method     ChildAliStockcardR findOneBySano(string $sano) Return the first ChildAliStockcardR filtered by the sano column
 * @method     ChildAliStockcardR findOneBySanoRef(string $sano_ref) Return the first ChildAliStockcardR filtered by the sano_ref column
 * @method     ChildAliStockcardR findOneByPcode(string $pcode) Return the first ChildAliStockcardR filtered by the pcode column
 * @method     ChildAliStockcardR findOneByPdesc(string $pdesc) Return the first ChildAliStockcardR filtered by the pdesc column
 * @method     ChildAliStockcardR findOneByInQty(int $in_qty) Return the first ChildAliStockcardR filtered by the in_qty column
 * @method     ChildAliStockcardR findOneByInPrice(string $in_price) Return the first ChildAliStockcardR filtered by the in_price column
 * @method     ChildAliStockcardR findOneByInAmount(string $in_amount) Return the first ChildAliStockcardR filtered by the in_amount column
 * @method     ChildAliStockcardR findOneByOutQty(int $out_qty) Return the first ChildAliStockcardR filtered by the out_qty column
 * @method     ChildAliStockcardR findOneByOutPrice(string $out_price) Return the first ChildAliStockcardR filtered by the out_price column
 * @method     ChildAliStockcardR findOneByOutAmount(string $out_amount) Return the first ChildAliStockcardR filtered by the out_amount column
 * @method     ChildAliStockcardR findOneBySadate(string $sadate) Return the first ChildAliStockcardR filtered by the sadate column
 * @method     ChildAliStockcardR findOneByRdate(string $rdate) Return the first ChildAliStockcardR filtered by the rdate column
 * @method     ChildAliStockcardR findOneByRccode(string $rccode) Return the first ChildAliStockcardR filtered by the rccode column
 * @method     ChildAliStockcardR findOneByYokma(int $yokma) Return the first ChildAliStockcardR filtered by the yokma column
 * @method     ChildAliStockcardR findOneByBalance(int $balance) Return the first ChildAliStockcardR filtered by the balance column
 * @method     ChildAliStockcardR findOneByPrice(string $price) Return the first ChildAliStockcardR filtered by the price column
 * @method     ChildAliStockcardR findOneByAmount(string $amount) Return the first ChildAliStockcardR filtered by the amount column
 * @method     ChildAliStockcardR findOneByUid(string $uid) Return the first ChildAliStockcardR filtered by the uid column
 * @method     ChildAliStockcardR findOneByAction(string $action) Return the first ChildAliStockcardR filtered by the action column
 * @method     ChildAliStockcardR findOneByCancel(int $cancel) Return the first ChildAliStockcardR filtered by the cancel column *

 * @method     ChildAliStockcardR requirePk($key, ConnectionInterface $con = null) Return the ChildAliStockcardR by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOne(ConnectionInterface $con = null) Return the first ChildAliStockcardR matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStockcardR requireOneById(int $id) Return the first ChildAliStockcardR filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByMcode(string $mcode) Return the first ChildAliStockcardR filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByNameT(string $name_t) Return the first ChildAliStockcardR filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByInvCode(string $inv_code) Return the first ChildAliStockcardR filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByInvRef(string $inv_ref) Return the first ChildAliStockcardR filtered by the inv_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByInvAction(string $inv_action) Return the first ChildAliStockcardR filtered by the inv_action column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneBySano(string $sano) Return the first ChildAliStockcardR filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneBySanoRef(string $sano_ref) Return the first ChildAliStockcardR filtered by the sano_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByPcode(string $pcode) Return the first ChildAliStockcardR filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByPdesc(string $pdesc) Return the first ChildAliStockcardR filtered by the pdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByInQty(int $in_qty) Return the first ChildAliStockcardR filtered by the in_qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByInPrice(string $in_price) Return the first ChildAliStockcardR filtered by the in_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByInAmount(string $in_amount) Return the first ChildAliStockcardR filtered by the in_amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByOutQty(int $out_qty) Return the first ChildAliStockcardR filtered by the out_qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByOutPrice(string $out_price) Return the first ChildAliStockcardR filtered by the out_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByOutAmount(string $out_amount) Return the first ChildAliStockcardR filtered by the out_amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneBySadate(string $sadate) Return the first ChildAliStockcardR filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByRdate(string $rdate) Return the first ChildAliStockcardR filtered by the rdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByRccode(string $rccode) Return the first ChildAliStockcardR filtered by the rccode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByYokma(int $yokma) Return the first ChildAliStockcardR filtered by the yokma column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByBalance(int $balance) Return the first ChildAliStockcardR filtered by the balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByPrice(string $price) Return the first ChildAliStockcardR filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByAmount(string $amount) Return the first ChildAliStockcardR filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByUid(string $uid) Return the first ChildAliStockcardR filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByAction(string $action) Return the first ChildAliStockcardR filtered by the action column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStockcardR requireOneByCancel(int $cancel) Return the first ChildAliStockcardR filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStockcardR[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliStockcardR objects based on current ModelCriteria
 * @method     ChildAliStockcardR[]|ObjectCollection findById(int $id) Return ChildAliStockcardR objects filtered by the id column
 * @method     ChildAliStockcardR[]|ObjectCollection findByMcode(string $mcode) Return ChildAliStockcardR objects filtered by the mcode column
 * @method     ChildAliStockcardR[]|ObjectCollection findByNameT(string $name_t) Return ChildAliStockcardR objects filtered by the name_t column
 * @method     ChildAliStockcardR[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliStockcardR objects filtered by the inv_code column
 * @method     ChildAliStockcardR[]|ObjectCollection findByInvRef(string $inv_ref) Return ChildAliStockcardR objects filtered by the inv_ref column
 * @method     ChildAliStockcardR[]|ObjectCollection findByInvAction(string $inv_action) Return ChildAliStockcardR objects filtered by the inv_action column
 * @method     ChildAliStockcardR[]|ObjectCollection findBySano(string $sano) Return ChildAliStockcardR objects filtered by the sano column
 * @method     ChildAliStockcardR[]|ObjectCollection findBySanoRef(string $sano_ref) Return ChildAliStockcardR objects filtered by the sano_ref column
 * @method     ChildAliStockcardR[]|ObjectCollection findByPcode(string $pcode) Return ChildAliStockcardR objects filtered by the pcode column
 * @method     ChildAliStockcardR[]|ObjectCollection findByPdesc(string $pdesc) Return ChildAliStockcardR objects filtered by the pdesc column
 * @method     ChildAliStockcardR[]|ObjectCollection findByInQty(int $in_qty) Return ChildAliStockcardR objects filtered by the in_qty column
 * @method     ChildAliStockcardR[]|ObjectCollection findByInPrice(string $in_price) Return ChildAliStockcardR objects filtered by the in_price column
 * @method     ChildAliStockcardR[]|ObjectCollection findByInAmount(string $in_amount) Return ChildAliStockcardR objects filtered by the in_amount column
 * @method     ChildAliStockcardR[]|ObjectCollection findByOutQty(int $out_qty) Return ChildAliStockcardR objects filtered by the out_qty column
 * @method     ChildAliStockcardR[]|ObjectCollection findByOutPrice(string $out_price) Return ChildAliStockcardR objects filtered by the out_price column
 * @method     ChildAliStockcardR[]|ObjectCollection findByOutAmount(string $out_amount) Return ChildAliStockcardR objects filtered by the out_amount column
 * @method     ChildAliStockcardR[]|ObjectCollection findBySadate(string $sadate) Return ChildAliStockcardR objects filtered by the sadate column
 * @method     ChildAliStockcardR[]|ObjectCollection findByRdate(string $rdate) Return ChildAliStockcardR objects filtered by the rdate column
 * @method     ChildAliStockcardR[]|ObjectCollection findByRccode(string $rccode) Return ChildAliStockcardR objects filtered by the rccode column
 * @method     ChildAliStockcardR[]|ObjectCollection findByYokma(int $yokma) Return ChildAliStockcardR objects filtered by the yokma column
 * @method     ChildAliStockcardR[]|ObjectCollection findByBalance(int $balance) Return ChildAliStockcardR objects filtered by the balance column
 * @method     ChildAliStockcardR[]|ObjectCollection findByPrice(string $price) Return ChildAliStockcardR objects filtered by the price column
 * @method     ChildAliStockcardR[]|ObjectCollection findByAmount(string $amount) Return ChildAliStockcardR objects filtered by the amount column
 * @method     ChildAliStockcardR[]|ObjectCollection findByUid(string $uid) Return ChildAliStockcardR objects filtered by the uid column
 * @method     ChildAliStockcardR[]|ObjectCollection findByAction(string $action) Return ChildAliStockcardR objects filtered by the action column
 * @method     ChildAliStockcardR[]|ObjectCollection findByCancel(int $cancel) Return ChildAliStockcardR objects filtered by the cancel column
 * @method     ChildAliStockcardR[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliStockcardRQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliStockcardRQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliStockcardR', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliStockcardRQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliStockcardRQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliStockcardRQuery) {
            return $criteria;
        }
        $query = new ChildAliStockcardRQuery();
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
     * @return ChildAliStockcardR|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliStockcardRTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliStockcardRTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliStockcardR A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, name_t, inv_code, inv_ref, inv_action, sano, sano_ref, pcode, pdesc, in_qty, in_price, in_amount, out_qty, out_price, out_amount, sadate, rdate, rccode, yokma, balance, price, amount, uid, action, cancel FROM ali_stockcard_r WHERE id = :p0';
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
            /** @var ChildAliStockcardR $obj */
            $obj = new ChildAliStockcardR();
            $obj->hydrate($row);
            AliStockcardRTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliStockcardR|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliStockcardRTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliStockcardRTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the name_t column
     *
     * Example usage:
     * <code>
     * $query->filterByNameT('fooValue');   // WHERE name_t = 'fooValue'
     * $query->filterByNameT('%fooValue%', Criteria::LIKE); // WHERE name_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameT The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByInvRef($invRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_INV_REF, $invRef, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByInvAction($invAction = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invAction)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_INV_ACTION, $invAction, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterBySanoRef($sanoRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sanoRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_SANO_REF, $sanoRef, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_PCODE, $pcode, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByPdesc($pdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_PDESC, $pdesc, $comparison);
    }

    /**
     * Filter the query on the in_qty column
     *
     * Example usage:
     * <code>
     * $query->filterByInQty(1234); // WHERE in_qty = 1234
     * $query->filterByInQty(array(12, 34)); // WHERE in_qty IN (12, 34)
     * $query->filterByInQty(array('min' => 12)); // WHERE in_qty > 12
     * </code>
     *
     * @param     mixed $inQty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByInQty($inQty = null, $comparison = null)
    {
        if (is_array($inQty)) {
            $useMinMax = false;
            if (isset($inQty['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_IN_QTY, $inQty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inQty['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_IN_QTY, $inQty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_IN_QTY, $inQty, $comparison);
    }

    /**
     * Filter the query on the in_price column
     *
     * Example usage:
     * <code>
     * $query->filterByInPrice(1234); // WHERE in_price = 1234
     * $query->filterByInPrice(array(12, 34)); // WHERE in_price IN (12, 34)
     * $query->filterByInPrice(array('min' => 12)); // WHERE in_price > 12
     * </code>
     *
     * @param     mixed $inPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByInPrice($inPrice = null, $comparison = null)
    {
        if (is_array($inPrice)) {
            $useMinMax = false;
            if (isset($inPrice['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_IN_PRICE, $inPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inPrice['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_IN_PRICE, $inPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_IN_PRICE, $inPrice, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByInAmount($inAmount = null, $comparison = null)
    {
        if (is_array($inAmount)) {
            $useMinMax = false;
            if (isset($inAmount['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_IN_AMOUNT, $inAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inAmount['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_IN_AMOUNT, $inAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_IN_AMOUNT, $inAmount, $comparison);
    }

    /**
     * Filter the query on the out_qty column
     *
     * Example usage:
     * <code>
     * $query->filterByOutQty(1234); // WHERE out_qty = 1234
     * $query->filterByOutQty(array(12, 34)); // WHERE out_qty IN (12, 34)
     * $query->filterByOutQty(array('min' => 12)); // WHERE out_qty > 12
     * </code>
     *
     * @param     mixed $outQty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByOutQty($outQty = null, $comparison = null)
    {
        if (is_array($outQty)) {
            $useMinMax = false;
            if (isset($outQty['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_OUT_QTY, $outQty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outQty['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_OUT_QTY, $outQty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_OUT_QTY, $outQty, $comparison);
    }

    /**
     * Filter the query on the out_price column
     *
     * Example usage:
     * <code>
     * $query->filterByOutPrice(1234); // WHERE out_price = 1234
     * $query->filterByOutPrice(array(12, 34)); // WHERE out_price IN (12, 34)
     * $query->filterByOutPrice(array('min' => 12)); // WHERE out_price > 12
     * </code>
     *
     * @param     mixed $outPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByOutPrice($outPrice = null, $comparison = null)
    {
        if (is_array($outPrice)) {
            $useMinMax = false;
            if (isset($outPrice['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_OUT_PRICE, $outPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outPrice['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_OUT_PRICE, $outPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_OUT_PRICE, $outPrice, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByOutAmount($outAmount = null, $comparison = null)
    {
        if (is_array($outAmount)) {
            $useMinMax = false;
            if (isset($outAmount['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_OUT_AMOUNT, $outAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outAmount['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_OUT_AMOUNT, $outAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_OUT_AMOUNT, $outAmount, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByRdate($rdate = null, $comparison = null)
    {
        if (is_array($rdate)) {
            $useMinMax = false;
            if (isset($rdate['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_RDATE, $rdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rdate['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_RDATE, $rdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_RDATE, $rdate, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByRccode($rccode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rccode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_RCCODE, $rccode, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByYokma($yokma = null, $comparison = null)
    {
        if (is_array($yokma)) {
            $useMinMax = false;
            if (isset($yokma['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_YOKMA, $yokma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($yokma['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_YOKMA, $yokma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_YOKMA, $yokma, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByBalance($balance = null, $comparison = null)
    {
        if (is_array($balance)) {
            $useMinMax = false;
            if (isset($balance['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_BALANCE, $balance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($balance['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_BALANCE, $balance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_BALANCE, $balance, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_PRICE, $price, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_AMOUNT, $amount, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByAction($action = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($action)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_ACTION, $action, $comparison);
    }

    /**
     * Filter the query on the cancel column
     *
     * Example usage:
     * <code>
     * $query->filterByCancel(1234); // WHERE cancel = 1234
     * $query->filterByCancel(array(12, 34)); // WHERE cancel IN (12, 34)
     * $query->filterByCancel(array('min' => 12)); // WHERE cancel > 12
     * </code>
     *
     * @param     mixed $cancel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliStockcardRTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStockcardRTableMap::COL_CANCEL, $cancel, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliStockcardR $aliStockcardR Object to remove from the list of results
     *
     * @return $this|ChildAliStockcardRQuery The current query, for fluid interface
     */
    public function prune($aliStockcardR = null)
    {
        if ($aliStockcardR) {
            $this->addUsingAlias(AliStockcardRTableMap::COL_ID, $aliStockcardR->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_stockcard_r table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStockcardRTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliStockcardRTableMap::clearInstancePool();
            AliStockcardRTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStockcardRTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliStockcardRTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliStockcardRTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliStockcardRTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliStockcardRQuery
