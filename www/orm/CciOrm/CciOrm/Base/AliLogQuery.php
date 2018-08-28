<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliLog as ChildAliLog;
use CciOrm\CciOrm\AliLogQuery as ChildAliLogQuery;
use CciOrm\CciOrm\Map\AliLogTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_log' table.
 *
 *
 *
 * @method     ChildAliLogQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliLogQuery orderBySysId($order = Criteria::ASC) Order by the sys_id column
 * @method     ChildAliLogQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method     ChildAliLogQuery orderByObject($order = Criteria::ASC) Order by the object column
 * @method     ChildAliLogQuery orderByDetail($order = Criteria::ASC) Order by the detail column
 * @method     ChildAliLogQuery orderByChkMobile($order = Criteria::ASC) Order by the chk_mobile column
 * @method     ChildAliLogQuery orderByChkIdCard($order = Criteria::ASC) Order by the chk_id_card column
 * @method     ChildAliLogQuery orderByChkSpCode($order = Criteria::ASC) Order by the chk_sp_code column
 * @method     ChildAliLogQuery orderByChkUpaCode($order = Criteria::ASC) Order by the chk_upa_code column
 * @method     ChildAliLogQuery orderByChkAccNo($order = Criteria::ASC) Order by the chk_acc_no column
 * @method     ChildAliLogQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     ChildAliLogQuery orderByLogdate($order = Criteria::ASC) Order by the logdate column
 * @method     ChildAliLogQuery orderByLogtime($order = Criteria::ASC) Order by the logtime column
 *
 * @method     ChildAliLogQuery groupById() Group by the id column
 * @method     ChildAliLogQuery groupBySysId() Group by the sys_id column
 * @method     ChildAliLogQuery groupBySubject() Group by the subject column
 * @method     ChildAliLogQuery groupByObject() Group by the object column
 * @method     ChildAliLogQuery groupByDetail() Group by the detail column
 * @method     ChildAliLogQuery groupByChkMobile() Group by the chk_mobile column
 * @method     ChildAliLogQuery groupByChkIdCard() Group by the chk_id_card column
 * @method     ChildAliLogQuery groupByChkSpCode() Group by the chk_sp_code column
 * @method     ChildAliLogQuery groupByChkUpaCode() Group by the chk_upa_code column
 * @method     ChildAliLogQuery groupByChkAccNo() Group by the chk_acc_no column
 * @method     ChildAliLogQuery groupByIp() Group by the ip column
 * @method     ChildAliLogQuery groupByLogdate() Group by the logdate column
 * @method     ChildAliLogQuery groupByLogtime() Group by the logtime column
 *
 * @method     ChildAliLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliLogQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliLogQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliLogQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliLog findOne(ConnectionInterface $con = null) Return the first ChildAliLog matching the query
 * @method     ChildAliLog findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliLog matching the query, or a new ChildAliLog object populated from the query conditions when no match is found
 *
 * @method     ChildAliLog findOneById(int $id) Return the first ChildAliLog filtered by the id column
 * @method     ChildAliLog findOneBySysId(string $sys_id) Return the first ChildAliLog filtered by the sys_id column
 * @method     ChildAliLog findOneBySubject(string $subject) Return the first ChildAliLog filtered by the subject column
 * @method     ChildAliLog findOneByObject(string $object) Return the first ChildAliLog filtered by the object column
 * @method     ChildAliLog findOneByDetail(string $detail) Return the first ChildAliLog filtered by the detail column
 * @method     ChildAliLog findOneByChkMobile(int $chk_mobile) Return the first ChildAliLog filtered by the chk_mobile column
 * @method     ChildAliLog findOneByChkIdCard(int $chk_id_card) Return the first ChildAliLog filtered by the chk_id_card column
 * @method     ChildAliLog findOneByChkSpCode(int $chk_sp_code) Return the first ChildAliLog filtered by the chk_sp_code column
 * @method     ChildAliLog findOneByChkUpaCode(int $chk_upa_code) Return the first ChildAliLog filtered by the chk_upa_code column
 * @method     ChildAliLog findOneByChkAccNo(int $chk_acc_no) Return the first ChildAliLog filtered by the chk_acc_no column
 * @method     ChildAliLog findOneByIp(string $ip) Return the first ChildAliLog filtered by the ip column
 * @method     ChildAliLog findOneByLogdate(string $logdate) Return the first ChildAliLog filtered by the logdate column
 * @method     ChildAliLog findOneByLogtime(string $logtime) Return the first ChildAliLog filtered by the logtime column *

 * @method     ChildAliLog requirePk($key, ConnectionInterface $con = null) Return the ChildAliLog by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLog requireOne(ConnectionInterface $con = null) Return the first ChildAliLog matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLog requireOneById(int $id) Return the first ChildAliLog filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLog requireOneBySysId(string $sys_id) Return the first ChildAliLog filtered by the sys_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLog requireOneBySubject(string $subject) Return the first ChildAliLog filtered by the subject column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLog requireOneByObject(string $object) Return the first ChildAliLog filtered by the object column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLog requireOneByDetail(string $detail) Return the first ChildAliLog filtered by the detail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLog requireOneByChkMobile(int $chk_mobile) Return the first ChildAliLog filtered by the chk_mobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLog requireOneByChkIdCard(int $chk_id_card) Return the first ChildAliLog filtered by the chk_id_card column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLog requireOneByChkSpCode(int $chk_sp_code) Return the first ChildAliLog filtered by the chk_sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLog requireOneByChkUpaCode(int $chk_upa_code) Return the first ChildAliLog filtered by the chk_upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLog requireOneByChkAccNo(int $chk_acc_no) Return the first ChildAliLog filtered by the chk_acc_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLog requireOneByIp(string $ip) Return the first ChildAliLog filtered by the ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLog requireOneByLogdate(string $logdate) Return the first ChildAliLog filtered by the logdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLog requireOneByLogtime(string $logtime) Return the first ChildAliLog filtered by the logtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLog[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliLog objects based on current ModelCriteria
 * @method     ChildAliLog[]|ObjectCollection findById(int $id) Return ChildAliLog objects filtered by the id column
 * @method     ChildAliLog[]|ObjectCollection findBySysId(string $sys_id) Return ChildAliLog objects filtered by the sys_id column
 * @method     ChildAliLog[]|ObjectCollection findBySubject(string $subject) Return ChildAliLog objects filtered by the subject column
 * @method     ChildAliLog[]|ObjectCollection findByObject(string $object) Return ChildAliLog objects filtered by the object column
 * @method     ChildAliLog[]|ObjectCollection findByDetail(string $detail) Return ChildAliLog objects filtered by the detail column
 * @method     ChildAliLog[]|ObjectCollection findByChkMobile(int $chk_mobile) Return ChildAliLog objects filtered by the chk_mobile column
 * @method     ChildAliLog[]|ObjectCollection findByChkIdCard(int $chk_id_card) Return ChildAliLog objects filtered by the chk_id_card column
 * @method     ChildAliLog[]|ObjectCollection findByChkSpCode(int $chk_sp_code) Return ChildAliLog objects filtered by the chk_sp_code column
 * @method     ChildAliLog[]|ObjectCollection findByChkUpaCode(int $chk_upa_code) Return ChildAliLog objects filtered by the chk_upa_code column
 * @method     ChildAliLog[]|ObjectCollection findByChkAccNo(int $chk_acc_no) Return ChildAliLog objects filtered by the chk_acc_no column
 * @method     ChildAliLog[]|ObjectCollection findByIp(string $ip) Return ChildAliLog objects filtered by the ip column
 * @method     ChildAliLog[]|ObjectCollection findByLogdate(string $logdate) Return ChildAliLog objects filtered by the logdate column
 * @method     ChildAliLog[]|ObjectCollection findByLogtime(string $logtime) Return ChildAliLog objects filtered by the logtime column
 * @method     ChildAliLog[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliLogQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliLogQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliLog', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliLogQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliLogQuery) {
            return $criteria;
        }
        $query = new ChildAliLogQuery();
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
     * @return ChildAliLog|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliLogTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliLogTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliLog A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, sys_id, subject, object, detail, chk_mobile, chk_id_card, chk_sp_code, chk_upa_code, chk_acc_no, ip, logdate, logtime FROM ali_log WHERE id = :p0';
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
            /** @var ChildAliLog $obj */
            $obj = new ChildAliLog();
            $obj->hydrate($row);
            AliLogTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliLog|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliLogTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliLogTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliLogTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliLogTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the sys_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySysId('fooValue');   // WHERE sys_id = 'fooValue'
     * $query->filterBySysId('%fooValue%', Criteria::LIKE); // WHERE sys_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sysId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterBySysId($sysId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sysId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogTableMap::COL_SYS_ID, $sysId, $comparison);
    }

    /**
     * Filter the query on the subject column
     *
     * Example usage:
     * <code>
     * $query->filterBySubject('fooValue');   // WHERE subject = 'fooValue'
     * $query->filterBySubject('%fooValue%', Criteria::LIKE); // WHERE subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subject The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterBySubject($subject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subject)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogTableMap::COL_SUBJECT, $subject, $comparison);
    }

    /**
     * Filter the query on the object column
     *
     * Example usage:
     * <code>
     * $query->filterByObject('fooValue');   // WHERE object = 'fooValue'
     * $query->filterByObject('%fooValue%', Criteria::LIKE); // WHERE object LIKE '%fooValue%'
     * </code>
     *
     * @param     string $object The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterByObject($object = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($object)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogTableMap::COL_OBJECT, $object, $comparison);
    }

    /**
     * Filter the query on the detail column
     *
     * Example usage:
     * <code>
     * $query->filterByDetail('fooValue');   // WHERE detail = 'fooValue'
     * $query->filterByDetail('%fooValue%', Criteria::LIKE); // WHERE detail LIKE '%fooValue%'
     * </code>
     *
     * @param     string $detail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterByDetail($detail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($detail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogTableMap::COL_DETAIL, $detail, $comparison);
    }

    /**
     * Filter the query on the chk_mobile column
     *
     * Example usage:
     * <code>
     * $query->filterByChkMobile(1234); // WHERE chk_mobile = 1234
     * $query->filterByChkMobile(array(12, 34)); // WHERE chk_mobile IN (12, 34)
     * $query->filterByChkMobile(array('min' => 12)); // WHERE chk_mobile > 12
     * </code>
     *
     * @param     mixed $chkMobile The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterByChkMobile($chkMobile = null, $comparison = null)
    {
        if (is_array($chkMobile)) {
            $useMinMax = false;
            if (isset($chkMobile['min'])) {
                $this->addUsingAlias(AliLogTableMap::COL_CHK_MOBILE, $chkMobile['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($chkMobile['max'])) {
                $this->addUsingAlias(AliLogTableMap::COL_CHK_MOBILE, $chkMobile['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogTableMap::COL_CHK_MOBILE, $chkMobile, $comparison);
    }

    /**
     * Filter the query on the chk_id_card column
     *
     * Example usage:
     * <code>
     * $query->filterByChkIdCard(1234); // WHERE chk_id_card = 1234
     * $query->filterByChkIdCard(array(12, 34)); // WHERE chk_id_card IN (12, 34)
     * $query->filterByChkIdCard(array('min' => 12)); // WHERE chk_id_card > 12
     * </code>
     *
     * @param     mixed $chkIdCard The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterByChkIdCard($chkIdCard = null, $comparison = null)
    {
        if (is_array($chkIdCard)) {
            $useMinMax = false;
            if (isset($chkIdCard['min'])) {
                $this->addUsingAlias(AliLogTableMap::COL_CHK_ID_CARD, $chkIdCard['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($chkIdCard['max'])) {
                $this->addUsingAlias(AliLogTableMap::COL_CHK_ID_CARD, $chkIdCard['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogTableMap::COL_CHK_ID_CARD, $chkIdCard, $comparison);
    }

    /**
     * Filter the query on the chk_sp_code column
     *
     * Example usage:
     * <code>
     * $query->filterByChkSpCode(1234); // WHERE chk_sp_code = 1234
     * $query->filterByChkSpCode(array(12, 34)); // WHERE chk_sp_code IN (12, 34)
     * $query->filterByChkSpCode(array('min' => 12)); // WHERE chk_sp_code > 12
     * </code>
     *
     * @param     mixed $chkSpCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterByChkSpCode($chkSpCode = null, $comparison = null)
    {
        if (is_array($chkSpCode)) {
            $useMinMax = false;
            if (isset($chkSpCode['min'])) {
                $this->addUsingAlias(AliLogTableMap::COL_CHK_SP_CODE, $chkSpCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($chkSpCode['max'])) {
                $this->addUsingAlias(AliLogTableMap::COL_CHK_SP_CODE, $chkSpCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogTableMap::COL_CHK_SP_CODE, $chkSpCode, $comparison);
    }

    /**
     * Filter the query on the chk_upa_code column
     *
     * Example usage:
     * <code>
     * $query->filterByChkUpaCode(1234); // WHERE chk_upa_code = 1234
     * $query->filterByChkUpaCode(array(12, 34)); // WHERE chk_upa_code IN (12, 34)
     * $query->filterByChkUpaCode(array('min' => 12)); // WHERE chk_upa_code > 12
     * </code>
     *
     * @param     mixed $chkUpaCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterByChkUpaCode($chkUpaCode = null, $comparison = null)
    {
        if (is_array($chkUpaCode)) {
            $useMinMax = false;
            if (isset($chkUpaCode['min'])) {
                $this->addUsingAlias(AliLogTableMap::COL_CHK_UPA_CODE, $chkUpaCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($chkUpaCode['max'])) {
                $this->addUsingAlias(AliLogTableMap::COL_CHK_UPA_CODE, $chkUpaCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogTableMap::COL_CHK_UPA_CODE, $chkUpaCode, $comparison);
    }

    /**
     * Filter the query on the chk_acc_no column
     *
     * Example usage:
     * <code>
     * $query->filterByChkAccNo(1234); // WHERE chk_acc_no = 1234
     * $query->filterByChkAccNo(array(12, 34)); // WHERE chk_acc_no IN (12, 34)
     * $query->filterByChkAccNo(array('min' => 12)); // WHERE chk_acc_no > 12
     * </code>
     *
     * @param     mixed $chkAccNo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterByChkAccNo($chkAccNo = null, $comparison = null)
    {
        if (is_array($chkAccNo)) {
            $useMinMax = false;
            if (isset($chkAccNo['min'])) {
                $this->addUsingAlias(AliLogTableMap::COL_CHK_ACC_NO, $chkAccNo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($chkAccNo['max'])) {
                $this->addUsingAlias(AliLogTableMap::COL_CHK_ACC_NO, $chkAccNo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogTableMap::COL_CHK_ACC_NO, $chkAccNo, $comparison);
    }

    /**
     * Filter the query on the ip column
     *
     * Example usage:
     * <code>
     * $query->filterByIp('fooValue');   // WHERE ip = 'fooValue'
     * $query->filterByIp('%fooValue%', Criteria::LIKE); // WHERE ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogTableMap::COL_IP, $ip, $comparison);
    }

    /**
     * Filter the query on the logdate column
     *
     * Example usage:
     * <code>
     * $query->filterByLogdate('2011-03-14'); // WHERE logdate = '2011-03-14'
     * $query->filterByLogdate('now'); // WHERE logdate = '2011-03-14'
     * $query->filterByLogdate(array('max' => 'yesterday')); // WHERE logdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $logdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterByLogdate($logdate = null, $comparison = null)
    {
        if (is_array($logdate)) {
            $useMinMax = false;
            if (isset($logdate['min'])) {
                $this->addUsingAlias(AliLogTableMap::COL_LOGDATE, $logdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($logdate['max'])) {
                $this->addUsingAlias(AliLogTableMap::COL_LOGDATE, $logdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogTableMap::COL_LOGDATE, $logdate, $comparison);
    }

    /**
     * Filter the query on the logtime column
     *
     * Example usage:
     * <code>
     * $query->filterByLogtime('2011-03-14'); // WHERE logtime = '2011-03-14'
     * $query->filterByLogtime('now'); // WHERE logtime = '2011-03-14'
     * $query->filterByLogtime(array('max' => 'yesterday')); // WHERE logtime > '2011-03-13'
     * </code>
     *
     * @param     mixed $logtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function filterByLogtime($logtime = null, $comparison = null)
    {
        if (is_array($logtime)) {
            $useMinMax = false;
            if (isset($logtime['min'])) {
                $this->addUsingAlias(AliLogTableMap::COL_LOGTIME, $logtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($logtime['max'])) {
                $this->addUsingAlias(AliLogTableMap::COL_LOGTIME, $logtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogTableMap::COL_LOGTIME, $logtime, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliLog $aliLog Object to remove from the list of results
     *
     * @return $this|ChildAliLogQuery The current query, for fluid interface
     */
    public function prune($aliLog = null)
    {
        if ($aliLog) {
            $this->addUsingAlias(AliLogTableMap::COL_ID, $aliLog->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_log table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliLogTableMap::clearInstancePool();
            AliLogTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliLogTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliLogTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliLogTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliLogQuery
