<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliIstockh as ChildAliIstockh;
use CciOrm\CciOrm\AliIstockhQuery as ChildAliIstockhQuery;
use CciOrm\CciOrm\Map\AliIstockhTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_istockh' table.
 *
 *
 *
 * @method     ChildAliIstockhQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliIstockhQuery orderBySano1($order = Criteria::ASC) Order by the sano1 column
 * @method     ChildAliIstockhQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliIstockhQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliIstockhQuery orderByInvCoden($order = Criteria::ASC) Order by the inv_coden column
 * @method     ChildAliIstockhQuery orderByInvRef($order = Criteria::ASC) Order by the inv_ref column
 * @method     ChildAliIstockhQuery orderByInvRefn($order = Criteria::ASC) Order by the inv_refn column
 * @method     ChildAliIstockhQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliIstockhQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliIstockhQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliIstockhQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliIstockhQuery orderBySaMtype($order = Criteria::ASC) Order by the sa_mtype column
 * @method     ChildAliIstockhQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliIstockhQuery orderByUidRef($order = Criteria::ASC) Order by the uid_ref column
 * @method     ChildAliIstockhQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliIstockhQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliIstockhQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method     ChildAliIstockhQuery orderBySenderDate($order = Criteria::ASC) Order by the sender_date column
 * @method     ChildAliIstockhQuery orderByReceive($order = Criteria::ASC) Order by the receive column
 * @method     ChildAliIstockhQuery orderByReceiveDate($order = Criteria::ASC) Order by the receive_date column
 * @method     ChildAliIstockhQuery orderByUidReceive($order = Criteria::ASC) Order by the uid_receive column
 * @method     ChildAliIstockhQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliIstockhQuery orderByPrint($order = Criteria::ASC) Order by the print column
 * @method     ChildAliIstockhQuery orderByRccode($order = Criteria::ASC) Order by the rccode column
 * @method     ChildAliIstockhQuery orderByUpdateDate($order = Criteria::ASC) Order by the update_date column
 * @method     ChildAliIstockhQuery orderByMappingCode($order = Criteria::ASC) Order by the mapping_code column
 * @method     ChildAliIstockhQuery orderByRrcode($order = Criteria::ASC) Order by the rrcode column
 *
 * @method     ChildAliIstockhQuery groupBySano() Group by the sano column
 * @method     ChildAliIstockhQuery groupBySano1() Group by the sano1 column
 * @method     ChildAliIstockhQuery groupBySadate() Group by the sadate column
 * @method     ChildAliIstockhQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliIstockhQuery groupByInvCoden() Group by the inv_coden column
 * @method     ChildAliIstockhQuery groupByInvRef() Group by the inv_ref column
 * @method     ChildAliIstockhQuery groupByInvRefn() Group by the inv_refn column
 * @method     ChildAliIstockhQuery groupByTotal() Group by the total column
 * @method     ChildAliIstockhQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliIstockhQuery groupById() Group by the id column
 * @method     ChildAliIstockhQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliIstockhQuery groupBySaMtype() Group by the sa_mtype column
 * @method     ChildAliIstockhQuery groupByUid() Group by the uid column
 * @method     ChildAliIstockhQuery groupByUidRef() Group by the uid_ref column
 * @method     ChildAliIstockhQuery groupByCancel() Group by the cancel column
 * @method     ChildAliIstockhQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliIstockhQuery groupBySender() Group by the sender column
 * @method     ChildAliIstockhQuery groupBySenderDate() Group by the sender_date column
 * @method     ChildAliIstockhQuery groupByReceive() Group by the receive column
 * @method     ChildAliIstockhQuery groupByReceiveDate() Group by the receive_date column
 * @method     ChildAliIstockhQuery groupByUidReceive() Group by the uid_receive column
 * @method     ChildAliIstockhQuery groupByStatus() Group by the status column
 * @method     ChildAliIstockhQuery groupByPrint() Group by the print column
 * @method     ChildAliIstockhQuery groupByRccode() Group by the rccode column
 * @method     ChildAliIstockhQuery groupByUpdateDate() Group by the update_date column
 * @method     ChildAliIstockhQuery groupByMappingCode() Group by the mapping_code column
 * @method     ChildAliIstockhQuery groupByRrcode() Group by the rrcode column
 *
 * @method     ChildAliIstockhQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliIstockhQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliIstockhQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliIstockhQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliIstockhQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliIstockhQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliIstockh findOne(ConnectionInterface $con = null) Return the first ChildAliIstockh matching the query
 * @method     ChildAliIstockh findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliIstockh matching the query, or a new ChildAliIstockh object populated from the query conditions when no match is found
 *
 * @method     ChildAliIstockh findOneBySano(string $sano) Return the first ChildAliIstockh filtered by the sano column
 * @method     ChildAliIstockh findOneBySano1(string $sano1) Return the first ChildAliIstockh filtered by the sano1 column
 * @method     ChildAliIstockh findOneBySadate(string $sadate) Return the first ChildAliIstockh filtered by the sadate column
 * @method     ChildAliIstockh findOneByInvCode(string $inv_code) Return the first ChildAliIstockh filtered by the inv_code column
 * @method     ChildAliIstockh findOneByInvCoden(string $inv_coden) Return the first ChildAliIstockh filtered by the inv_coden column
 * @method     ChildAliIstockh findOneByInvRef(string $inv_ref) Return the first ChildAliIstockh filtered by the inv_ref column
 * @method     ChildAliIstockh findOneByInvRefn(string $inv_refn) Return the first ChildAliIstockh filtered by the inv_refn column
 * @method     ChildAliIstockh findOneByTotal(string $total) Return the first ChildAliIstockh filtered by the total column
 * @method     ChildAliIstockh findOneByTotPv(string $tot_pv) Return the first ChildAliIstockh filtered by the tot_pv column
 * @method     ChildAliIstockh findOneById(int $id) Return the first ChildAliIstockh filtered by the id column
 * @method     ChildAliIstockh findOneBySaType(string $sa_type) Return the first ChildAliIstockh filtered by the sa_type column
 * @method     ChildAliIstockh findOneBySaMtype(string $sa_mtype) Return the first ChildAliIstockh filtered by the sa_mtype column
 * @method     ChildAliIstockh findOneByUid(string $uid) Return the first ChildAliIstockh filtered by the uid column
 * @method     ChildAliIstockh findOneByUidRef(string $uid_ref) Return the first ChildAliIstockh filtered by the uid_ref column
 * @method     ChildAliIstockh findOneByCancel(int $cancel) Return the first ChildAliIstockh filtered by the cancel column
 * @method     ChildAliIstockh findOneByTxtoption(string $txtoption) Return the first ChildAliIstockh filtered by the txtoption column
 * @method     ChildAliIstockh findOneBySender(string $sender) Return the first ChildAliIstockh filtered by the sender column
 * @method     ChildAliIstockh findOneBySenderDate(string $sender_date) Return the first ChildAliIstockh filtered by the sender_date column
 * @method     ChildAliIstockh findOneByReceive(int $receive) Return the first ChildAliIstockh filtered by the receive column
 * @method     ChildAliIstockh findOneByReceiveDate(string $receive_date) Return the first ChildAliIstockh filtered by the receive_date column
 * @method     ChildAliIstockh findOneByUidReceive(string $uid_receive) Return the first ChildAliIstockh filtered by the uid_receive column
 * @method     ChildAliIstockh findOneByStatus(int $status) Return the first ChildAliIstockh filtered by the status column
 * @method     ChildAliIstockh findOneByPrint(int $print) Return the first ChildAliIstockh filtered by the print column
 * @method     ChildAliIstockh findOneByRccode(string $rccode) Return the first ChildAliIstockh filtered by the rccode column
 * @method     ChildAliIstockh findOneByUpdateDate(string $update_date) Return the first ChildAliIstockh filtered by the update_date column
 * @method     ChildAliIstockh findOneByMappingCode(string $mapping_code) Return the first ChildAliIstockh filtered by the mapping_code column
 * @method     ChildAliIstockh findOneByRrcode(string $rrcode) Return the first ChildAliIstockh filtered by the rrcode column *

 * @method     ChildAliIstockh requirePk($key, ConnectionInterface $con = null) Return the ChildAliIstockh by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOne(ConnectionInterface $con = null) Return the first ChildAliIstockh matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliIstockh requireOneBySano(string $sano) Return the first ChildAliIstockh filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneBySano1(string $sano1) Return the first ChildAliIstockh filtered by the sano1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneBySadate(string $sadate) Return the first ChildAliIstockh filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByInvCode(string $inv_code) Return the first ChildAliIstockh filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByInvCoden(string $inv_coden) Return the first ChildAliIstockh filtered by the inv_coden column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByInvRef(string $inv_ref) Return the first ChildAliIstockh filtered by the inv_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByInvRefn(string $inv_refn) Return the first ChildAliIstockh filtered by the inv_refn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByTotal(string $total) Return the first ChildAliIstockh filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByTotPv(string $tot_pv) Return the first ChildAliIstockh filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneById(int $id) Return the first ChildAliIstockh filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneBySaType(string $sa_type) Return the first ChildAliIstockh filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneBySaMtype(string $sa_mtype) Return the first ChildAliIstockh filtered by the sa_mtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByUid(string $uid) Return the first ChildAliIstockh filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByUidRef(string $uid_ref) Return the first ChildAliIstockh filtered by the uid_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByCancel(int $cancel) Return the first ChildAliIstockh filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByTxtoption(string $txtoption) Return the first ChildAliIstockh filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneBySender(string $sender) Return the first ChildAliIstockh filtered by the sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneBySenderDate(string $sender_date) Return the first ChildAliIstockh filtered by the sender_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByReceive(int $receive) Return the first ChildAliIstockh filtered by the receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByReceiveDate(string $receive_date) Return the first ChildAliIstockh filtered by the receive_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByUidReceive(string $uid_receive) Return the first ChildAliIstockh filtered by the uid_receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByStatus(int $status) Return the first ChildAliIstockh filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByPrint(int $print) Return the first ChildAliIstockh filtered by the print column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByRccode(string $rccode) Return the first ChildAliIstockh filtered by the rccode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByUpdateDate(string $update_date) Return the first ChildAliIstockh filtered by the update_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByMappingCode(string $mapping_code) Return the first ChildAliIstockh filtered by the mapping_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockh requireOneByRrcode(string $rrcode) Return the first ChildAliIstockh filtered by the rrcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliIstockh[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliIstockh objects based on current ModelCriteria
 * @method     ChildAliIstockh[]|ObjectCollection findBySano(string $sano) Return ChildAliIstockh objects filtered by the sano column
 * @method     ChildAliIstockh[]|ObjectCollection findBySano1(string $sano1) Return ChildAliIstockh objects filtered by the sano1 column
 * @method     ChildAliIstockh[]|ObjectCollection findBySadate(string $sadate) Return ChildAliIstockh objects filtered by the sadate column
 * @method     ChildAliIstockh[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliIstockh objects filtered by the inv_code column
 * @method     ChildAliIstockh[]|ObjectCollection findByInvCoden(string $inv_coden) Return ChildAliIstockh objects filtered by the inv_coden column
 * @method     ChildAliIstockh[]|ObjectCollection findByInvRef(string $inv_ref) Return ChildAliIstockh objects filtered by the inv_ref column
 * @method     ChildAliIstockh[]|ObjectCollection findByInvRefn(string $inv_refn) Return ChildAliIstockh objects filtered by the inv_refn column
 * @method     ChildAliIstockh[]|ObjectCollection findByTotal(string $total) Return ChildAliIstockh objects filtered by the total column
 * @method     ChildAliIstockh[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliIstockh objects filtered by the tot_pv column
 * @method     ChildAliIstockh[]|ObjectCollection findById(int $id) Return ChildAliIstockh objects filtered by the id column
 * @method     ChildAliIstockh[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliIstockh objects filtered by the sa_type column
 * @method     ChildAliIstockh[]|ObjectCollection findBySaMtype(string $sa_mtype) Return ChildAliIstockh objects filtered by the sa_mtype column
 * @method     ChildAliIstockh[]|ObjectCollection findByUid(string $uid) Return ChildAliIstockh objects filtered by the uid column
 * @method     ChildAliIstockh[]|ObjectCollection findByUidRef(string $uid_ref) Return ChildAliIstockh objects filtered by the uid_ref column
 * @method     ChildAliIstockh[]|ObjectCollection findByCancel(int $cancel) Return ChildAliIstockh objects filtered by the cancel column
 * @method     ChildAliIstockh[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliIstockh objects filtered by the txtoption column
 * @method     ChildAliIstockh[]|ObjectCollection findBySender(string $sender) Return ChildAliIstockh objects filtered by the sender column
 * @method     ChildAliIstockh[]|ObjectCollection findBySenderDate(string $sender_date) Return ChildAliIstockh objects filtered by the sender_date column
 * @method     ChildAliIstockh[]|ObjectCollection findByReceive(int $receive) Return ChildAliIstockh objects filtered by the receive column
 * @method     ChildAliIstockh[]|ObjectCollection findByReceiveDate(string $receive_date) Return ChildAliIstockh objects filtered by the receive_date column
 * @method     ChildAliIstockh[]|ObjectCollection findByUidReceive(string $uid_receive) Return ChildAliIstockh objects filtered by the uid_receive column
 * @method     ChildAliIstockh[]|ObjectCollection findByStatus(int $status) Return ChildAliIstockh objects filtered by the status column
 * @method     ChildAliIstockh[]|ObjectCollection findByPrint(int $print) Return ChildAliIstockh objects filtered by the print column
 * @method     ChildAliIstockh[]|ObjectCollection findByRccode(string $rccode) Return ChildAliIstockh objects filtered by the rccode column
 * @method     ChildAliIstockh[]|ObjectCollection findByUpdateDate(string $update_date) Return ChildAliIstockh objects filtered by the update_date column
 * @method     ChildAliIstockh[]|ObjectCollection findByMappingCode(string $mapping_code) Return ChildAliIstockh objects filtered by the mapping_code column
 * @method     ChildAliIstockh[]|ObjectCollection findByRrcode(string $rrcode) Return ChildAliIstockh objects filtered by the rrcode column
 * @method     ChildAliIstockh[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliIstockhQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliIstockhQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliIstockh', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliIstockhQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliIstockhQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliIstockhQuery) {
            return $criteria;
        }
        $query = new ChildAliIstockhQuery();
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
     * @return ChildAliIstockh|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliIstockhTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliIstockhTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliIstockh A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, sano1, sadate, inv_code, inv_coden, inv_ref, inv_refn, total, tot_pv, id, sa_type, sa_mtype, uid, uid_ref, cancel, txtoption, sender, sender_date, receive, receive_date, uid_receive, status, print, rccode, update_date, mapping_code, rrcode FROM ali_istockh WHERE id = :p0';
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
            /** @var ChildAliIstockh $obj */
            $obj = new ChildAliIstockh();
            $obj->hydrate($row);
            AliIstockhTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliIstockh|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliIstockhTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliIstockhTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_SANO, $sano, $comparison);
    }

    /**
     * Filter the query on the sano1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySano1('fooValue');   // WHERE sano1 = 'fooValue'
     * $query->filterBySano1('%fooValue%', Criteria::LIKE); // WHERE sano1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sano1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterBySano1($sano1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_SANO1, $sano1, $comparison);
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
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Filter the query on the inv_coden column
     *
     * Example usage:
     * <code>
     * $query->filterByInvCoden('fooValue');   // WHERE inv_coden = 'fooValue'
     * $query->filterByInvCoden('%fooValue%', Criteria::LIKE); // WHERE inv_coden LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invCoden The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByInvCoden($invCoden = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCoden)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_INV_CODEN, $invCoden, $comparison);
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
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByInvRef($invRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_INV_REF, $invRef, $comparison);
    }

    /**
     * Filter the query on the inv_refn column
     *
     * Example usage:
     * <code>
     * $query->filterByInvRefn('fooValue');   // WHERE inv_refn = 'fooValue'
     * $query->filterByInvRefn('%fooValue%', Criteria::LIKE); // WHERE inv_refn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invRefn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByInvRefn($invRefn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRefn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_INV_REFN, $invRefn, $comparison);
    }

    /**
     * Filter the query on the total column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal(1234); // WHERE total = 1234
     * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
     * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
     * </code>
     *
     * @param     mixed $total The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the tot_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotPv(1234); // WHERE tot_pv = 1234
     * $query->filterByTotPv(array(12, 34)); // WHERE tot_pv IN (12, 34)
     * $query->filterByTotPv(array('min' => 12)); // WHERE tot_pv > 12
     * </code>
     *
     * @param     mixed $totPv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_TOT_PV, $totPv, $comparison);
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
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the sa_type column
     *
     * Example usage:
     * <code>
     * $query->filterBySaType('fooValue');   // WHERE sa_type = 'fooValue'
     * $query->filterBySaType('%fooValue%', Criteria::LIKE); // WHERE sa_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_SA_TYPE, $saType, $comparison);
    }

    /**
     * Filter the query on the sa_mtype column
     *
     * Example usage:
     * <code>
     * $query->filterBySaMtype('fooValue');   // WHERE sa_mtype = 'fooValue'
     * $query->filterBySaMtype('%fooValue%', Criteria::LIKE); // WHERE sa_mtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saMtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterBySaMtype($saMtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saMtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_SA_MTYPE, $saMtype, $comparison);
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
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Filter the query on the uid_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByUidRef('fooValue');   // WHERE uid_ref = 'fooValue'
     * $query->filterByUidRef('%fooValue%', Criteria::LIKE); // WHERE uid_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uidRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByUidRef($uidRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_UID_REF, $uidRef, $comparison);
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
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_CANCEL, $cancel, $comparison);
    }

    /**
     * Filter the query on the txtoption column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtoption('fooValue');   // WHERE txtoption = 'fooValue'
     * $query->filterByTxtoption('%fooValue%', Criteria::LIKE); // WHERE txtoption LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtoption The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_TXTOPTION, $txtoption, $comparison);
    }

    /**
     * Filter the query on the sender column
     *
     * Example usage:
     * <code>
     * $query->filterBySender('fooValue');   // WHERE sender = 'fooValue'
     * $query->filterBySender('%fooValue%', Criteria::LIKE); // WHERE sender LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sender The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterBySender($sender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_SENDER, $sender, $comparison);
    }

    /**
     * Filter the query on the sender_date column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderDate('2011-03-14'); // WHERE sender_date = '2011-03-14'
     * $query->filterBySenderDate('now'); // WHERE sender_date = '2011-03-14'
     * $query->filterBySenderDate(array('max' => 'yesterday')); // WHERE sender_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $senderDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterBySenderDate($senderDate = null, $comparison = null)
    {
        if (is_array($senderDate)) {
            $useMinMax = false;
            if (isset($senderDate['min'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_SENDER_DATE, $senderDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($senderDate['max'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_SENDER_DATE, $senderDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_SENDER_DATE, $senderDate, $comparison);
    }

    /**
     * Filter the query on the receive column
     *
     * Example usage:
     * <code>
     * $query->filterByReceive(1234); // WHERE receive = 1234
     * $query->filterByReceive(array(12, 34)); // WHERE receive IN (12, 34)
     * $query->filterByReceive(array('min' => 12)); // WHERE receive > 12
     * </code>
     *
     * @param     mixed $receive The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByReceive($receive = null, $comparison = null)
    {
        if (is_array($receive)) {
            $useMinMax = false;
            if (isset($receive['min'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_RECEIVE, $receive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receive['max'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_RECEIVE, $receive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_RECEIVE, $receive, $comparison);
    }

    /**
     * Filter the query on the receive_date column
     *
     * Example usage:
     * <code>
     * $query->filterByReceiveDate('2011-03-14'); // WHERE receive_date = '2011-03-14'
     * $query->filterByReceiveDate('now'); // WHERE receive_date = '2011-03-14'
     * $query->filterByReceiveDate(array('max' => 'yesterday')); // WHERE receive_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $receiveDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByReceiveDate($receiveDate = null, $comparison = null)
    {
        if (is_array($receiveDate)) {
            $useMinMax = false;
            if (isset($receiveDate['min'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_RECEIVE_DATE, $receiveDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiveDate['max'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_RECEIVE_DATE, $receiveDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_RECEIVE_DATE, $receiveDate, $comparison);
    }

    /**
     * Filter the query on the uid_receive column
     *
     * Example usage:
     * <code>
     * $query->filterByUidReceive('fooValue');   // WHERE uid_receive = 'fooValue'
     * $query->filterByUidReceive('%fooValue%', Criteria::LIKE); // WHERE uid_receive LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uidReceive The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByUidReceive($uidReceive = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidReceive)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_UID_RECEIVE, $uidReceive, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the print column
     *
     * Example usage:
     * <code>
     * $query->filterByPrint(1234); // WHERE print = 1234
     * $query->filterByPrint(array(12, 34)); // WHERE print IN (12, 34)
     * $query->filterByPrint(array('min' => 12)); // WHERE print > 12
     * </code>
     *
     * @param     mixed $print The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByPrint($print = null, $comparison = null)
    {
        if (is_array($print)) {
            $useMinMax = false;
            if (isset($print['min'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_PRINT, $print['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($print['max'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_PRINT, $print['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_PRINT, $print, $comparison);
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
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByRccode($rccode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rccode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_RCCODE, $rccode, $comparison);
    }

    /**
     * Filter the query on the update_date column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateDate('2011-03-14'); // WHERE update_date = '2011-03-14'
     * $query->filterByUpdateDate('now'); // WHERE update_date = '2011-03-14'
     * $query->filterByUpdateDate(array('max' => 'yesterday')); // WHERE update_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $updateDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByUpdateDate($updateDate = null, $comparison = null)
    {
        if (is_array($updateDate)) {
            $useMinMax = false;
            if (isset($updateDate['min'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_UPDATE_DATE, $updateDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateDate['max'])) {
                $this->addUsingAlias(AliIstockhTableMap::COL_UPDATE_DATE, $updateDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_UPDATE_DATE, $updateDate, $comparison);
    }

    /**
     * Filter the query on the mapping_code column
     *
     * Example usage:
     * <code>
     * $query->filterByMappingCode('fooValue');   // WHERE mapping_code = 'fooValue'
     * $query->filterByMappingCode('%fooValue%', Criteria::LIKE); // WHERE mapping_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mappingCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByMappingCode($mappingCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mappingCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_MAPPING_CODE, $mappingCode, $comparison);
    }

    /**
     * Filter the query on the rrcode column
     *
     * Example usage:
     * <code>
     * $query->filterByRrcode('fooValue');   // WHERE rrcode = 'fooValue'
     * $query->filterByRrcode('%fooValue%', Criteria::LIKE); // WHERE rrcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rrcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function filterByRrcode($rrcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rrcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockhTableMap::COL_RRCODE, $rrcode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliIstockh $aliIstockh Object to remove from the list of results
     *
     * @return $this|ChildAliIstockhQuery The current query, for fluid interface
     */
    public function prune($aliIstockh = null)
    {
        if ($aliIstockh) {
            $this->addUsingAlias(AliIstockhTableMap::COL_ID, $aliIstockh->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_istockh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliIstockhTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliIstockhTableMap::clearInstancePool();
            AliIstockhTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliIstockhTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliIstockhTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliIstockhTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliIstockhTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliIstockhQuery
