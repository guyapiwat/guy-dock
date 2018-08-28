<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliOstockh as ChildAliOstockh;
use CciOrm\CciOrm\AliOstockhQuery as ChildAliOstockhQuery;
use CciOrm\CciOrm\Map\AliOstockhTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_ostockh' table.
 *
 *
 *
 * @method     ChildAliOstockhQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliOstockhQuery orderBySano1($order = Criteria::ASC) Order by the sano1 column
 * @method     ChildAliOstockhQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliOstockhQuery orderBySctime($order = Criteria::ASC) Order by the sctime column
 * @method     ChildAliOstockhQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliOstockhQuery orderByInvCoden($order = Criteria::ASC) Order by the inv_coden column
 * @method     ChildAliOstockhQuery orderByInvRef($order = Criteria::ASC) Order by the inv_ref column
 * @method     ChildAliOstockhQuery orderByInvRefn($order = Criteria::ASC) Order by the inv_refn column
 * @method     ChildAliOstockhQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliOstockhQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliOstockhQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliOstockhQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliOstockhQuery orderBySaMtype($order = Criteria::ASC) Order by the sa_mtype column
 * @method     ChildAliOstockhQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliOstockhQuery orderByUidRef($order = Criteria::ASC) Order by the uid_ref column
 * @method     ChildAliOstockhQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliOstockhQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliOstockhQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method     ChildAliOstockhQuery orderBySenderDate($order = Criteria::ASC) Order by the sender_date column
 * @method     ChildAliOstockhQuery orderByReceive($order = Criteria::ASC) Order by the receive column
 * @method     ChildAliOstockhQuery orderByReceiveDate($order = Criteria::ASC) Order by the receive_date column
 * @method     ChildAliOstockhQuery orderByUidReceive($order = Criteria::ASC) Order by the uid_receive column
 * @method     ChildAliOstockhQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliOstockhQuery orderByPrint($order = Criteria::ASC) Order by the print column
 * @method     ChildAliOstockhQuery orderByRccode($order = Criteria::ASC) Order by the rccode column
 * @method     ChildAliOstockhQuery orderByUpdateDate($order = Criteria::ASC) Order by the update_date column
 * @method     ChildAliOstockhQuery orderByMappingCode($order = Criteria::ASC) Order by the mapping_code column
 * @method     ChildAliOstockhQuery orderByRrcode($order = Criteria::ASC) Order by the rrcode column
 * @method     ChildAliOstockhQuery orderByAuto($order = Criteria::ASC) Order by the auto column
 *
 * @method     ChildAliOstockhQuery groupBySano() Group by the sano column
 * @method     ChildAliOstockhQuery groupBySano1() Group by the sano1 column
 * @method     ChildAliOstockhQuery groupBySadate() Group by the sadate column
 * @method     ChildAliOstockhQuery groupBySctime() Group by the sctime column
 * @method     ChildAliOstockhQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliOstockhQuery groupByInvCoden() Group by the inv_coden column
 * @method     ChildAliOstockhQuery groupByInvRef() Group by the inv_ref column
 * @method     ChildAliOstockhQuery groupByInvRefn() Group by the inv_refn column
 * @method     ChildAliOstockhQuery groupByTotal() Group by the total column
 * @method     ChildAliOstockhQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliOstockhQuery groupById() Group by the id column
 * @method     ChildAliOstockhQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliOstockhQuery groupBySaMtype() Group by the sa_mtype column
 * @method     ChildAliOstockhQuery groupByUid() Group by the uid column
 * @method     ChildAliOstockhQuery groupByUidRef() Group by the uid_ref column
 * @method     ChildAliOstockhQuery groupByCancel() Group by the cancel column
 * @method     ChildAliOstockhQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliOstockhQuery groupBySender() Group by the sender column
 * @method     ChildAliOstockhQuery groupBySenderDate() Group by the sender_date column
 * @method     ChildAliOstockhQuery groupByReceive() Group by the receive column
 * @method     ChildAliOstockhQuery groupByReceiveDate() Group by the receive_date column
 * @method     ChildAliOstockhQuery groupByUidReceive() Group by the uid_receive column
 * @method     ChildAliOstockhQuery groupByStatus() Group by the status column
 * @method     ChildAliOstockhQuery groupByPrint() Group by the print column
 * @method     ChildAliOstockhQuery groupByRccode() Group by the rccode column
 * @method     ChildAliOstockhQuery groupByUpdateDate() Group by the update_date column
 * @method     ChildAliOstockhQuery groupByMappingCode() Group by the mapping_code column
 * @method     ChildAliOstockhQuery groupByRrcode() Group by the rrcode column
 * @method     ChildAliOstockhQuery groupByAuto() Group by the auto column
 *
 * @method     ChildAliOstockhQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliOstockhQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliOstockhQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliOstockhQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliOstockhQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliOstockhQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliOstockh findOne(ConnectionInterface $con = null) Return the first ChildAliOstockh matching the query
 * @method     ChildAliOstockh findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliOstockh matching the query, or a new ChildAliOstockh object populated from the query conditions when no match is found
 *
 * @method     ChildAliOstockh findOneBySano(string $sano) Return the first ChildAliOstockh filtered by the sano column
 * @method     ChildAliOstockh findOneBySano1(string $sano1) Return the first ChildAliOstockh filtered by the sano1 column
 * @method     ChildAliOstockh findOneBySadate(string $sadate) Return the first ChildAliOstockh filtered by the sadate column
 * @method     ChildAliOstockh findOneBySctime(string $sctime) Return the first ChildAliOstockh filtered by the sctime column
 * @method     ChildAliOstockh findOneByInvCode(string $inv_code) Return the first ChildAliOstockh filtered by the inv_code column
 * @method     ChildAliOstockh findOneByInvCoden(string $inv_coden) Return the first ChildAliOstockh filtered by the inv_coden column
 * @method     ChildAliOstockh findOneByInvRef(string $inv_ref) Return the first ChildAliOstockh filtered by the inv_ref column
 * @method     ChildAliOstockh findOneByInvRefn(string $inv_refn) Return the first ChildAliOstockh filtered by the inv_refn column
 * @method     ChildAliOstockh findOneByTotal(string $total) Return the first ChildAliOstockh filtered by the total column
 * @method     ChildAliOstockh findOneByTotPv(string $tot_pv) Return the first ChildAliOstockh filtered by the tot_pv column
 * @method     ChildAliOstockh findOneById(int $id) Return the first ChildAliOstockh filtered by the id column
 * @method     ChildAliOstockh findOneBySaType(string $sa_type) Return the first ChildAliOstockh filtered by the sa_type column
 * @method     ChildAliOstockh findOneBySaMtype(string $sa_mtype) Return the first ChildAliOstockh filtered by the sa_mtype column
 * @method     ChildAliOstockh findOneByUid(string $uid) Return the first ChildAliOstockh filtered by the uid column
 * @method     ChildAliOstockh findOneByUidRef(string $uid_ref) Return the first ChildAliOstockh filtered by the uid_ref column
 * @method     ChildAliOstockh findOneByCancel(int $cancel) Return the first ChildAliOstockh filtered by the cancel column
 * @method     ChildAliOstockh findOneByTxtoption(string $txtoption) Return the first ChildAliOstockh filtered by the txtoption column
 * @method     ChildAliOstockh findOneBySender(string $sender) Return the first ChildAliOstockh filtered by the sender column
 * @method     ChildAliOstockh findOneBySenderDate(string $sender_date) Return the first ChildAliOstockh filtered by the sender_date column
 * @method     ChildAliOstockh findOneByReceive(int $receive) Return the first ChildAliOstockh filtered by the receive column
 * @method     ChildAliOstockh findOneByReceiveDate(string $receive_date) Return the first ChildAliOstockh filtered by the receive_date column
 * @method     ChildAliOstockh findOneByUidReceive(string $uid_receive) Return the first ChildAliOstockh filtered by the uid_receive column
 * @method     ChildAliOstockh findOneByStatus(int $status) Return the first ChildAliOstockh filtered by the status column
 * @method     ChildAliOstockh findOneByPrint(int $print) Return the first ChildAliOstockh filtered by the print column
 * @method     ChildAliOstockh findOneByRccode(string $rccode) Return the first ChildAliOstockh filtered by the rccode column
 * @method     ChildAliOstockh findOneByUpdateDate(string $update_date) Return the first ChildAliOstockh filtered by the update_date column
 * @method     ChildAliOstockh findOneByMappingCode(string $mapping_code) Return the first ChildAliOstockh filtered by the mapping_code column
 * @method     ChildAliOstockh findOneByRrcode(string $rrcode) Return the first ChildAliOstockh filtered by the rrcode column
 * @method     ChildAliOstockh findOneByAuto(string $auto) Return the first ChildAliOstockh filtered by the auto column *

 * @method     ChildAliOstockh requirePk($key, ConnectionInterface $con = null) Return the ChildAliOstockh by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOne(ConnectionInterface $con = null) Return the first ChildAliOstockh matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliOstockh requireOneBySano(string $sano) Return the first ChildAliOstockh filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneBySano1(string $sano1) Return the first ChildAliOstockh filtered by the sano1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneBySadate(string $sadate) Return the first ChildAliOstockh filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneBySctime(string $sctime) Return the first ChildAliOstockh filtered by the sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByInvCode(string $inv_code) Return the first ChildAliOstockh filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByInvCoden(string $inv_coden) Return the first ChildAliOstockh filtered by the inv_coden column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByInvRef(string $inv_ref) Return the first ChildAliOstockh filtered by the inv_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByInvRefn(string $inv_refn) Return the first ChildAliOstockh filtered by the inv_refn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByTotal(string $total) Return the first ChildAliOstockh filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByTotPv(string $tot_pv) Return the first ChildAliOstockh filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneById(int $id) Return the first ChildAliOstockh filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneBySaType(string $sa_type) Return the first ChildAliOstockh filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneBySaMtype(string $sa_mtype) Return the first ChildAliOstockh filtered by the sa_mtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByUid(string $uid) Return the first ChildAliOstockh filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByUidRef(string $uid_ref) Return the first ChildAliOstockh filtered by the uid_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByCancel(int $cancel) Return the first ChildAliOstockh filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByTxtoption(string $txtoption) Return the first ChildAliOstockh filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneBySender(string $sender) Return the first ChildAliOstockh filtered by the sender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneBySenderDate(string $sender_date) Return the first ChildAliOstockh filtered by the sender_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByReceive(int $receive) Return the first ChildAliOstockh filtered by the receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByReceiveDate(string $receive_date) Return the first ChildAliOstockh filtered by the receive_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByUidReceive(string $uid_receive) Return the first ChildAliOstockh filtered by the uid_receive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByStatus(int $status) Return the first ChildAliOstockh filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByPrint(int $print) Return the first ChildAliOstockh filtered by the print column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByRccode(string $rccode) Return the first ChildAliOstockh filtered by the rccode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByUpdateDate(string $update_date) Return the first ChildAliOstockh filtered by the update_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByMappingCode(string $mapping_code) Return the first ChildAliOstockh filtered by the mapping_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByRrcode(string $rrcode) Return the first ChildAliOstockh filtered by the rrcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOstockh requireOneByAuto(string $auto) Return the first ChildAliOstockh filtered by the auto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliOstockh[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliOstockh objects based on current ModelCriteria
 * @method     ChildAliOstockh[]|ObjectCollection findBySano(string $sano) Return ChildAliOstockh objects filtered by the sano column
 * @method     ChildAliOstockh[]|ObjectCollection findBySano1(string $sano1) Return ChildAliOstockh objects filtered by the sano1 column
 * @method     ChildAliOstockh[]|ObjectCollection findBySadate(string $sadate) Return ChildAliOstockh objects filtered by the sadate column
 * @method     ChildAliOstockh[]|ObjectCollection findBySctime(string $sctime) Return ChildAliOstockh objects filtered by the sctime column
 * @method     ChildAliOstockh[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliOstockh objects filtered by the inv_code column
 * @method     ChildAliOstockh[]|ObjectCollection findByInvCoden(string $inv_coden) Return ChildAliOstockh objects filtered by the inv_coden column
 * @method     ChildAliOstockh[]|ObjectCollection findByInvRef(string $inv_ref) Return ChildAliOstockh objects filtered by the inv_ref column
 * @method     ChildAliOstockh[]|ObjectCollection findByInvRefn(string $inv_refn) Return ChildAliOstockh objects filtered by the inv_refn column
 * @method     ChildAliOstockh[]|ObjectCollection findByTotal(string $total) Return ChildAliOstockh objects filtered by the total column
 * @method     ChildAliOstockh[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliOstockh objects filtered by the tot_pv column
 * @method     ChildAliOstockh[]|ObjectCollection findById(int $id) Return ChildAliOstockh objects filtered by the id column
 * @method     ChildAliOstockh[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliOstockh objects filtered by the sa_type column
 * @method     ChildAliOstockh[]|ObjectCollection findBySaMtype(string $sa_mtype) Return ChildAliOstockh objects filtered by the sa_mtype column
 * @method     ChildAliOstockh[]|ObjectCollection findByUid(string $uid) Return ChildAliOstockh objects filtered by the uid column
 * @method     ChildAliOstockh[]|ObjectCollection findByUidRef(string $uid_ref) Return ChildAliOstockh objects filtered by the uid_ref column
 * @method     ChildAliOstockh[]|ObjectCollection findByCancel(int $cancel) Return ChildAliOstockh objects filtered by the cancel column
 * @method     ChildAliOstockh[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliOstockh objects filtered by the txtoption column
 * @method     ChildAliOstockh[]|ObjectCollection findBySender(string $sender) Return ChildAliOstockh objects filtered by the sender column
 * @method     ChildAliOstockh[]|ObjectCollection findBySenderDate(string $sender_date) Return ChildAliOstockh objects filtered by the sender_date column
 * @method     ChildAliOstockh[]|ObjectCollection findByReceive(int $receive) Return ChildAliOstockh objects filtered by the receive column
 * @method     ChildAliOstockh[]|ObjectCollection findByReceiveDate(string $receive_date) Return ChildAliOstockh objects filtered by the receive_date column
 * @method     ChildAliOstockh[]|ObjectCollection findByUidReceive(string $uid_receive) Return ChildAliOstockh objects filtered by the uid_receive column
 * @method     ChildAliOstockh[]|ObjectCollection findByStatus(int $status) Return ChildAliOstockh objects filtered by the status column
 * @method     ChildAliOstockh[]|ObjectCollection findByPrint(int $print) Return ChildAliOstockh objects filtered by the print column
 * @method     ChildAliOstockh[]|ObjectCollection findByRccode(string $rccode) Return ChildAliOstockh objects filtered by the rccode column
 * @method     ChildAliOstockh[]|ObjectCollection findByUpdateDate(string $update_date) Return ChildAliOstockh objects filtered by the update_date column
 * @method     ChildAliOstockh[]|ObjectCollection findByMappingCode(string $mapping_code) Return ChildAliOstockh objects filtered by the mapping_code column
 * @method     ChildAliOstockh[]|ObjectCollection findByRrcode(string $rrcode) Return ChildAliOstockh objects filtered by the rrcode column
 * @method     ChildAliOstockh[]|ObjectCollection findByAuto(string $auto) Return ChildAliOstockh objects filtered by the auto column
 * @method     ChildAliOstockh[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliOstockhQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliOstockhQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliOstockh', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliOstockhQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliOstockhQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliOstockhQuery) {
            return $criteria;
        }
        $query = new ChildAliOstockhQuery();
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
     * @return ChildAliOstockh|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliOstockhTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliOstockhTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliOstockh A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sano, sano1, sadate, sctime, inv_code, inv_coden, inv_ref, inv_refn, total, tot_pv, id, sa_type, sa_mtype, uid, uid_ref, cancel, txtoption, sender, sender_date, receive, receive_date, uid_receive, status, print, rccode, update_date, mapping_code, rrcode, auto FROM ali_ostockh WHERE id = :p0';
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
            /** @var ChildAliOstockh $obj */
            $obj = new ChildAliOstockh();
            $obj->hydrate($row);
            AliOstockhTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliOstockh|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliOstockhTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliOstockhTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterBySano1($sano1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_SANO1, $sano1, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_SADATE, $sadate, $comparison);
    }

    /**
     * Filter the query on the sctime column
     *
     * Example usage:
     * <code>
     * $query->filterBySctime('2011-03-14'); // WHERE sctime = '2011-03-14'
     * $query->filterBySctime('now'); // WHERE sctime = '2011-03-14'
     * $query->filterBySctime(array('max' => 'yesterday')); // WHERE sctime > '2011-03-13'
     * </code>
     *
     * @param     mixed $sctime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterBySctime($sctime = null, $comparison = null)
    {
        if (is_array($sctime)) {
            $useMinMax = false;
            if (isset($sctime['min'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_SCTIME, $sctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sctime['max'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_SCTIME, $sctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_SCTIME, $sctime, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByInvCoden($invCoden = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCoden)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_INV_CODEN, $invCoden, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByInvRef($invRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_INV_REF, $invRef, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByInvRefn($invRefn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRefn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_INV_REFN, $invRefn, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_TOT_PV, $totPv, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterBySaMtype($saMtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saMtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_SA_MTYPE, $saMtype, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByUidRef($uidRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_UID_REF, $uidRef, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_CANCEL, $cancel, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_TXTOPTION, $txtoption, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterBySender($sender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_SENDER, $sender, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterBySenderDate($senderDate = null, $comparison = null)
    {
        if (is_array($senderDate)) {
            $useMinMax = false;
            if (isset($senderDate['min'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_SENDER_DATE, $senderDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($senderDate['max'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_SENDER_DATE, $senderDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_SENDER_DATE, $senderDate, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByReceive($receive = null, $comparison = null)
    {
        if (is_array($receive)) {
            $useMinMax = false;
            if (isset($receive['min'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_RECEIVE, $receive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receive['max'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_RECEIVE, $receive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_RECEIVE, $receive, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByReceiveDate($receiveDate = null, $comparison = null)
    {
        if (is_array($receiveDate)) {
            $useMinMax = false;
            if (isset($receiveDate['min'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_RECEIVE_DATE, $receiveDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiveDate['max'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_RECEIVE_DATE, $receiveDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_RECEIVE_DATE, $receiveDate, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByUidReceive($uidReceive = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidReceive)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_UID_RECEIVE, $uidReceive, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByPrint($print = null, $comparison = null)
    {
        if (is_array($print)) {
            $useMinMax = false;
            if (isset($print['min'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_PRINT, $print['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($print['max'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_PRINT, $print['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_PRINT, $print, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByRccode($rccode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rccode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_RCCODE, $rccode, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByUpdateDate($updateDate = null, $comparison = null)
    {
        if (is_array($updateDate)) {
            $useMinMax = false;
            if (isset($updateDate['min'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_UPDATE_DATE, $updateDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateDate['max'])) {
                $this->addUsingAlias(AliOstockhTableMap::COL_UPDATE_DATE, $updateDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_UPDATE_DATE, $updateDate, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByMappingCode($mappingCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mappingCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_MAPPING_CODE, $mappingCode, $comparison);
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
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByRrcode($rrcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rrcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_RRCODE, $rrcode, $comparison);
    }

    /**
     * Filter the query on the auto column
     *
     * Example usage:
     * <code>
     * $query->filterByAuto('fooValue');   // WHERE auto = 'fooValue'
     * $query->filterByAuto('%fooValue%', Criteria::LIKE); // WHERE auto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $auto The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function filterByAuto($auto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($auto)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOstockhTableMap::COL_AUTO, $auto, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliOstockh $aliOstockh Object to remove from the list of results
     *
     * @return $this|ChildAliOstockhQuery The current query, for fluid interface
     */
    public function prune($aliOstockh = null)
    {
        if ($aliOstockh) {
            $this->addUsingAlias(AliOstockhTableMap::COL_ID, $aliOstockh->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_ostockh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliOstockhTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliOstockhTableMap::clearInstancePool();
            AliOstockhTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliOstockhTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliOstockhTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliOstockhTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliOstockhTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliOstockhQuery
