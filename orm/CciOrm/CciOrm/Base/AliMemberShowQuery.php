<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliMemberShow as ChildAliMemberShow;
use CciOrm\CciOrm\AliMemberShowQuery as ChildAliMemberShowQuery;
use CciOrm\CciOrm\Map\AliMemberShowTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_member_show' table.
 *
 *
 *
 * @method     ChildAliMemberShowQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliMemberShowQuery orderByMdate($order = Criteria::ASC) Order by the mdate column
 * @method     ChildAliMemberShowQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliMemberShowQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliMemberShowQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliMemberShowQuery orderByFast($order = Criteria::ASC) Order by the fast column
 * @method     ChildAliMemberShowQuery orderByWeakstrong($order = Criteria::ASC) Order by the weakstrong column
 * @method     ChildAliMemberShowQuery orderByMatching($order = Criteria::ASC) Order by the matching column
 * @method     ChildAliMemberShowQuery orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliMemberShowQuery orderByUpaName($order = Criteria::ASC) Order by the upa_name column
 * @method     ChildAliMemberShowQuery orderBySpCode($order = Criteria::ASC) Order by the sp_code column
 * @method     ChildAliMemberShowQuery orderBySpName($order = Criteria::ASC) Order by the sp_name column
 * @method     ChildAliMemberShowQuery orderByLv($order = Criteria::ASC) Order by the lv column
 * @method     ChildAliMemberShowQuery orderByLr($order = Criteria::ASC) Order by the lr column
 * @method     ChildAliMemberShowQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliMemberShowQuery orderByPosCur1($order = Criteria::ASC) Order by the pos_cur1 column
 * @method     ChildAliMemberShowQuery orderByPosCur2($order = Criteria::ASC) Order by the pos_cur2 column
 * @method     ChildAliMemberShowQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliMemberShowQuery orderByTotpv($order = Criteria::ASC) Order by the totpv column
 * @method     ChildAliMemberShowQuery orderByThismonth($order = Criteria::ASC) Order by the thismonth column
 * @method     ChildAliMemberShowQuery orderByNextmonth($order = Criteria::ASC) Order by the nextmonth column
 * @method     ChildAliMemberShowQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliMemberShowQuery orderByOkok($order = Criteria::ASC) Order by the okok column
 *
 * @method     ChildAliMemberShowQuery groupByMcode() Group by the mcode column
 * @method     ChildAliMemberShowQuery groupByMdate() Group by the mdate column
 * @method     ChildAliMemberShowQuery groupById() Group by the id column
 * @method     ChildAliMemberShowQuery groupByNameT() Group by the name_t column
 * @method     ChildAliMemberShowQuery groupByTotal() Group by the total column
 * @method     ChildAliMemberShowQuery groupByFast() Group by the fast column
 * @method     ChildAliMemberShowQuery groupByWeakstrong() Group by the weakstrong column
 * @method     ChildAliMemberShowQuery groupByMatching() Group by the matching column
 * @method     ChildAliMemberShowQuery groupByUpaCode() Group by the upa_code column
 * @method     ChildAliMemberShowQuery groupByUpaName() Group by the upa_name column
 * @method     ChildAliMemberShowQuery groupBySpCode() Group by the sp_code column
 * @method     ChildAliMemberShowQuery groupBySpName() Group by the sp_name column
 * @method     ChildAliMemberShowQuery groupByLv() Group by the lv column
 * @method     ChildAliMemberShowQuery groupByLr() Group by the lr column
 * @method     ChildAliMemberShowQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliMemberShowQuery groupByPosCur1() Group by the pos_cur1 column
 * @method     ChildAliMemberShowQuery groupByPosCur2() Group by the pos_cur2 column
 * @method     ChildAliMemberShowQuery groupByUid() Group by the uid column
 * @method     ChildAliMemberShowQuery groupByTotpv() Group by the totpv column
 * @method     ChildAliMemberShowQuery groupByThismonth() Group by the thismonth column
 * @method     ChildAliMemberShowQuery groupByNextmonth() Group by the nextmonth column
 * @method     ChildAliMemberShowQuery groupBySadate() Group by the sadate column
 * @method     ChildAliMemberShowQuery groupByOkok() Group by the okok column
 *
 * @method     ChildAliMemberShowQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliMemberShowQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliMemberShowQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliMemberShowQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliMemberShowQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliMemberShowQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliMemberShow findOne(ConnectionInterface $con = null) Return the first ChildAliMemberShow matching the query
 * @method     ChildAliMemberShow findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliMemberShow matching the query, or a new ChildAliMemberShow object populated from the query conditions when no match is found
 *
 * @method     ChildAliMemberShow findOneByMcode(string $mcode) Return the first ChildAliMemberShow filtered by the mcode column
 * @method     ChildAliMemberShow findOneByMdate(string $mdate) Return the first ChildAliMemberShow filtered by the mdate column
 * @method     ChildAliMemberShow findOneById(string $id) Return the first ChildAliMemberShow filtered by the id column
 * @method     ChildAliMemberShow findOneByNameT(string $name_t) Return the first ChildAliMemberShow filtered by the name_t column
 * @method     ChildAliMemberShow findOneByTotal(string $total) Return the first ChildAliMemberShow filtered by the total column
 * @method     ChildAliMemberShow findOneByFast(string $fast) Return the first ChildAliMemberShow filtered by the fast column
 * @method     ChildAliMemberShow findOneByWeakstrong(string $weakstrong) Return the first ChildAliMemberShow filtered by the weakstrong column
 * @method     ChildAliMemberShow findOneByMatching(string $matching) Return the first ChildAliMemberShow filtered by the matching column
 * @method     ChildAliMemberShow findOneByUpaCode(string $upa_code) Return the first ChildAliMemberShow filtered by the upa_code column
 * @method     ChildAliMemberShow findOneByUpaName(string $upa_name) Return the first ChildAliMemberShow filtered by the upa_name column
 * @method     ChildAliMemberShow findOneBySpCode(string $sp_code) Return the first ChildAliMemberShow filtered by the sp_code column
 * @method     ChildAliMemberShow findOneBySpName(string $sp_name) Return the first ChildAliMemberShow filtered by the sp_name column
 * @method     ChildAliMemberShow findOneByLv(int $lv) Return the first ChildAliMemberShow filtered by the lv column
 * @method     ChildAliMemberShow findOneByLr(int $lr) Return the first ChildAliMemberShow filtered by the lr column
 * @method     ChildAliMemberShow findOneByPosCur(string $pos_cur) Return the first ChildAliMemberShow filtered by the pos_cur column
 * @method     ChildAliMemberShow findOneByPosCur1(string $pos_cur1) Return the first ChildAliMemberShow filtered by the pos_cur1 column
 * @method     ChildAliMemberShow findOneByPosCur2(string $pos_cur2) Return the first ChildAliMemberShow filtered by the pos_cur2 column
 * @method     ChildAliMemberShow findOneByUid(string $uid) Return the first ChildAliMemberShow filtered by the uid column
 * @method     ChildAliMemberShow findOneByTotpv(string $totpv) Return the first ChildAliMemberShow filtered by the totpv column
 * @method     ChildAliMemberShow findOneByThismonth(string $thismonth) Return the first ChildAliMemberShow filtered by the thismonth column
 * @method     ChildAliMemberShow findOneByNextmonth(string $nextmonth) Return the first ChildAliMemberShow filtered by the nextmonth column
 * @method     ChildAliMemberShow findOneBySadate(string $sadate) Return the first ChildAliMemberShow filtered by the sadate column
 * @method     ChildAliMemberShow findOneByOkok(int $okok) Return the first ChildAliMemberShow filtered by the okok column *

 * @method     ChildAliMemberShow requirePk($key, ConnectionInterface $con = null) Return the ChildAliMemberShow by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOne(ConnectionInterface $con = null) Return the first ChildAliMemberShow matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMemberShow requireOneByMcode(string $mcode) Return the first ChildAliMemberShow filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByMdate(string $mdate) Return the first ChildAliMemberShow filtered by the mdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneById(string $id) Return the first ChildAliMemberShow filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByNameT(string $name_t) Return the first ChildAliMemberShow filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByTotal(string $total) Return the first ChildAliMemberShow filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByFast(string $fast) Return the first ChildAliMemberShow filtered by the fast column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByWeakstrong(string $weakstrong) Return the first ChildAliMemberShow filtered by the weakstrong column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByMatching(string $matching) Return the first ChildAliMemberShow filtered by the matching column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByUpaCode(string $upa_code) Return the first ChildAliMemberShow filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByUpaName(string $upa_name) Return the first ChildAliMemberShow filtered by the upa_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneBySpCode(string $sp_code) Return the first ChildAliMemberShow filtered by the sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneBySpName(string $sp_name) Return the first ChildAliMemberShow filtered by the sp_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByLv(int $lv) Return the first ChildAliMemberShow filtered by the lv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByLr(int $lr) Return the first ChildAliMemberShow filtered by the lr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByPosCur(string $pos_cur) Return the first ChildAliMemberShow filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByPosCur1(string $pos_cur1) Return the first ChildAliMemberShow filtered by the pos_cur1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByPosCur2(string $pos_cur2) Return the first ChildAliMemberShow filtered by the pos_cur2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByUid(string $uid) Return the first ChildAliMemberShow filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByTotpv(string $totpv) Return the first ChildAliMemberShow filtered by the totpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByThismonth(string $thismonth) Return the first ChildAliMemberShow filtered by the thismonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByNextmonth(string $nextmonth) Return the first ChildAliMemberShow filtered by the nextmonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneBySadate(string $sadate) Return the first ChildAliMemberShow filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberShow requireOneByOkok(int $okok) Return the first ChildAliMemberShow filtered by the okok column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMemberShow[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliMemberShow objects based on current ModelCriteria
 * @method     ChildAliMemberShow[]|ObjectCollection findByMcode(string $mcode) Return ChildAliMemberShow objects filtered by the mcode column
 * @method     ChildAliMemberShow[]|ObjectCollection findByMdate(string $mdate) Return ChildAliMemberShow objects filtered by the mdate column
 * @method     ChildAliMemberShow[]|ObjectCollection findById(string $id) Return ChildAliMemberShow objects filtered by the id column
 * @method     ChildAliMemberShow[]|ObjectCollection findByNameT(string $name_t) Return ChildAliMemberShow objects filtered by the name_t column
 * @method     ChildAliMemberShow[]|ObjectCollection findByTotal(string $total) Return ChildAliMemberShow objects filtered by the total column
 * @method     ChildAliMemberShow[]|ObjectCollection findByFast(string $fast) Return ChildAliMemberShow objects filtered by the fast column
 * @method     ChildAliMemberShow[]|ObjectCollection findByWeakstrong(string $weakstrong) Return ChildAliMemberShow objects filtered by the weakstrong column
 * @method     ChildAliMemberShow[]|ObjectCollection findByMatching(string $matching) Return ChildAliMemberShow objects filtered by the matching column
 * @method     ChildAliMemberShow[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliMemberShow objects filtered by the upa_code column
 * @method     ChildAliMemberShow[]|ObjectCollection findByUpaName(string $upa_name) Return ChildAliMemberShow objects filtered by the upa_name column
 * @method     ChildAliMemberShow[]|ObjectCollection findBySpCode(string $sp_code) Return ChildAliMemberShow objects filtered by the sp_code column
 * @method     ChildAliMemberShow[]|ObjectCollection findBySpName(string $sp_name) Return ChildAliMemberShow objects filtered by the sp_name column
 * @method     ChildAliMemberShow[]|ObjectCollection findByLv(int $lv) Return ChildAliMemberShow objects filtered by the lv column
 * @method     ChildAliMemberShow[]|ObjectCollection findByLr(int $lr) Return ChildAliMemberShow objects filtered by the lr column
 * @method     ChildAliMemberShow[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliMemberShow objects filtered by the pos_cur column
 * @method     ChildAliMemberShow[]|ObjectCollection findByPosCur1(string $pos_cur1) Return ChildAliMemberShow objects filtered by the pos_cur1 column
 * @method     ChildAliMemberShow[]|ObjectCollection findByPosCur2(string $pos_cur2) Return ChildAliMemberShow objects filtered by the pos_cur2 column
 * @method     ChildAliMemberShow[]|ObjectCollection findByUid(string $uid) Return ChildAliMemberShow objects filtered by the uid column
 * @method     ChildAliMemberShow[]|ObjectCollection findByTotpv(string $totpv) Return ChildAliMemberShow objects filtered by the totpv column
 * @method     ChildAliMemberShow[]|ObjectCollection findByThismonth(string $thismonth) Return ChildAliMemberShow objects filtered by the thismonth column
 * @method     ChildAliMemberShow[]|ObjectCollection findByNextmonth(string $nextmonth) Return ChildAliMemberShow objects filtered by the nextmonth column
 * @method     ChildAliMemberShow[]|ObjectCollection findBySadate(string $sadate) Return ChildAliMemberShow objects filtered by the sadate column
 * @method     ChildAliMemberShow[]|ObjectCollection findByOkok(int $okok) Return ChildAliMemberShow objects filtered by the okok column
 * @method     ChildAliMemberShow[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliMemberShowQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliMemberShowQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliMemberShow', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliMemberShowQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliMemberShowQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliMemberShowQuery) {
            return $criteria;
        }
        $query = new ChildAliMemberShowQuery();
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
     * @return ChildAliMemberShow|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliMemberShowTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliMemberShowTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliMemberShow A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT mcode, mdate, id, name_t, total, fast, weakstrong, matching, upa_code, upa_name, sp_code, sp_name, lv, lr, pos_cur, pos_cur1, pos_cur2, uid, totpv, thismonth, nextmonth, sadate, okok FROM ali_member_show WHERE id = :p0';
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
            /** @var ChildAliMemberShow $obj */
            $obj = new ChildAliMemberShow();
            $obj->hydrate($row);
            AliMemberShowTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliMemberShow|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliMemberShowTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliMemberShowTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the mdate column
     *
     * Example usage:
     * <code>
     * $query->filterByMdate('2011-03-14'); // WHERE mdate = '2011-03-14'
     * $query->filterByMdate('now'); // WHERE mdate = '2011-03-14'
     * $query->filterByMdate(array('max' => 'yesterday')); // WHERE mdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $mdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByMdate($mdate = null, $comparison = null)
    {
        if (is_array($mdate)) {
            $useMinMax = false;
            if (isset($mdate['min'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_MDATE, $mdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mdate['max'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_MDATE, $mdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_MDATE, $mdate, $comparison);
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
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the fast column
     *
     * Example usage:
     * <code>
     * $query->filterByFast(1234); // WHERE fast = 1234
     * $query->filterByFast(array(12, 34)); // WHERE fast IN (12, 34)
     * $query->filterByFast(array('min' => 12)); // WHERE fast > 12
     * </code>
     *
     * @param     mixed $fast The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByFast($fast = null, $comparison = null)
    {
        if (is_array($fast)) {
            $useMinMax = false;
            if (isset($fast['min'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_FAST, $fast['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fast['max'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_FAST, $fast['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_FAST, $fast, $comparison);
    }

    /**
     * Filter the query on the weakstrong column
     *
     * Example usage:
     * <code>
     * $query->filterByWeakstrong(1234); // WHERE weakstrong = 1234
     * $query->filterByWeakstrong(array(12, 34)); // WHERE weakstrong IN (12, 34)
     * $query->filterByWeakstrong(array('min' => 12)); // WHERE weakstrong > 12
     * </code>
     *
     * @param     mixed $weakstrong The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByWeakstrong($weakstrong = null, $comparison = null)
    {
        if (is_array($weakstrong)) {
            $useMinMax = false;
            if (isset($weakstrong['min'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_WEAKSTRONG, $weakstrong['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weakstrong['max'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_WEAKSTRONG, $weakstrong['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_WEAKSTRONG, $weakstrong, $comparison);
    }

    /**
     * Filter the query on the matching column
     *
     * Example usage:
     * <code>
     * $query->filterByMatching(1234); // WHERE matching = 1234
     * $query->filterByMatching(array(12, 34)); // WHERE matching IN (12, 34)
     * $query->filterByMatching(array('min' => 12)); // WHERE matching > 12
     * </code>
     *
     * @param     mixed $matching The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByMatching($matching = null, $comparison = null)
    {
        if (is_array($matching)) {
            $useMinMax = false;
            if (isset($matching['min'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_MATCHING, $matching['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($matching['max'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_MATCHING, $matching['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_MATCHING, $matching, $comparison);
    }

    /**
     * Filter the query on the upa_code column
     *
     * Example usage:
     * <code>
     * $query->filterByUpaCode('fooValue');   // WHERE upa_code = 'fooValue'
     * $query->filterByUpaCode('%fooValue%', Criteria::LIKE); // WHERE upa_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $upaCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_UPA_CODE, $upaCode, $comparison);
    }

    /**
     * Filter the query on the upa_name column
     *
     * Example usage:
     * <code>
     * $query->filterByUpaName('fooValue');   // WHERE upa_name = 'fooValue'
     * $query->filterByUpaName('%fooValue%', Criteria::LIKE); // WHERE upa_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $upaName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByUpaName($upaName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_UPA_NAME, $upaName, $comparison);
    }

    /**
     * Filter the query on the sp_code column
     *
     * Example usage:
     * <code>
     * $query->filterBySpCode('fooValue');   // WHERE sp_code = 'fooValue'
     * $query->filterBySpCode('%fooValue%', Criteria::LIKE); // WHERE sp_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterBySpCode($spCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_SP_CODE, $spCode, $comparison);
    }

    /**
     * Filter the query on the sp_name column
     *
     * Example usage:
     * <code>
     * $query->filterBySpName('fooValue');   // WHERE sp_name = 'fooValue'
     * $query->filterBySpName('%fooValue%', Criteria::LIKE); // WHERE sp_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterBySpName($spName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_SP_NAME, $spName, $comparison);
    }

    /**
     * Filter the query on the lv column
     *
     * Example usage:
     * <code>
     * $query->filterByLv(1234); // WHERE lv = 1234
     * $query->filterByLv(array(12, 34)); // WHERE lv IN (12, 34)
     * $query->filterByLv(array('min' => 12)); // WHERE lv > 12
     * </code>
     *
     * @param     mixed $lv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByLv($lv = null, $comparison = null)
    {
        if (is_array($lv)) {
            $useMinMax = false;
            if (isset($lv['min'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_LV, $lv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lv['max'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_LV, $lv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_LV, $lv, $comparison);
    }

    /**
     * Filter the query on the lr column
     *
     * Example usage:
     * <code>
     * $query->filterByLr(1234); // WHERE lr = 1234
     * $query->filterByLr(array(12, 34)); // WHERE lr IN (12, 34)
     * $query->filterByLr(array('min' => 12)); // WHERE lr > 12
     * </code>
     *
     * @param     mixed $lr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByLr($lr = null, $comparison = null)
    {
        if (is_array($lr)) {
            $useMinMax = false;
            if (isset($lr['min'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_LR, $lr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lr['max'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_LR, $lr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_LR, $lr, $comparison);
    }

    /**
     * Filter the query on the pos_cur column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur('fooValue');   // WHERE pos_cur = 'fooValue'
     * $query->filterByPosCur('%fooValue%', Criteria::LIKE); // WHERE pos_cur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Filter the query on the pos_cur1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur1('fooValue');   // WHERE pos_cur1 = 'fooValue'
     * $query->filterByPosCur1('%fooValue%', Criteria::LIKE); // WHERE pos_cur1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByPosCur1($posCur1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_POS_CUR1, $posCur1, $comparison);
    }

    /**
     * Filter the query on the pos_cur2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur2('fooValue');   // WHERE pos_cur2 = 'fooValue'
     * $query->filterByPosCur2('%fooValue%', Criteria::LIKE); // WHERE pos_cur2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByPosCur2($posCur2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_POS_CUR2, $posCur2, $comparison);
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
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Filter the query on the totpv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotpv(1234); // WHERE totpv = 1234
     * $query->filterByTotpv(array(12, 34)); // WHERE totpv IN (12, 34)
     * $query->filterByTotpv(array('min' => 12)); // WHERE totpv > 12
     * </code>
     *
     * @param     mixed $totpv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByTotpv($totpv = null, $comparison = null)
    {
        if (is_array($totpv)) {
            $useMinMax = false;
            if (isset($totpv['min'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_TOTPV, $totpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totpv['max'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_TOTPV, $totpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_TOTPV, $totpv, $comparison);
    }

    /**
     * Filter the query on the thismonth column
     *
     * Example usage:
     * <code>
     * $query->filterByThismonth(1234); // WHERE thismonth = 1234
     * $query->filterByThismonth(array(12, 34)); // WHERE thismonth IN (12, 34)
     * $query->filterByThismonth(array('min' => 12)); // WHERE thismonth > 12
     * </code>
     *
     * @param     mixed $thismonth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByThismonth($thismonth = null, $comparison = null)
    {
        if (is_array($thismonth)) {
            $useMinMax = false;
            if (isset($thismonth['min'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_THISMONTH, $thismonth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thismonth['max'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_THISMONTH, $thismonth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_THISMONTH, $thismonth, $comparison);
    }

    /**
     * Filter the query on the nextmonth column
     *
     * Example usage:
     * <code>
     * $query->filterByNextmonth(1234); // WHERE nextmonth = 1234
     * $query->filterByNextmonth(array(12, 34)); // WHERE nextmonth IN (12, 34)
     * $query->filterByNextmonth(array('min' => 12)); // WHERE nextmonth > 12
     * </code>
     *
     * @param     mixed $nextmonth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByNextmonth($nextmonth = null, $comparison = null)
    {
        if (is_array($nextmonth)) {
            $useMinMax = false;
            if (isset($nextmonth['min'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_NEXTMONTH, $nextmonth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nextmonth['max'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_NEXTMONTH, $nextmonth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_NEXTMONTH, $nextmonth, $comparison);
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
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_SADATE, $sadate, $comparison);
    }

    /**
     * Filter the query on the okok column
     *
     * Example usage:
     * <code>
     * $query->filterByOkok(1234); // WHERE okok = 1234
     * $query->filterByOkok(array(12, 34)); // WHERE okok IN (12, 34)
     * $query->filterByOkok(array('min' => 12)); // WHERE okok > 12
     * </code>
     *
     * @param     mixed $okok The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function filterByOkok($okok = null, $comparison = null)
    {
        if (is_array($okok)) {
            $useMinMax = false;
            if (isset($okok['min'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_OKOK, $okok['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($okok['max'])) {
                $this->addUsingAlias(AliMemberShowTableMap::COL_OKOK, $okok['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberShowTableMap::COL_OKOK, $okok, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliMemberShow $aliMemberShow Object to remove from the list of results
     *
     * @return $this|ChildAliMemberShowQuery The current query, for fluid interface
     */
    public function prune($aliMemberShow = null)
    {
        if ($aliMemberShow) {
            $this->addUsingAlias(AliMemberShowTableMap::COL_ID, $aliMemberShow->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_member_show table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberShowTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliMemberShowTableMap::clearInstancePool();
            AliMemberShowTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberShowTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliMemberShowTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliMemberShowTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliMemberShowTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliMemberShowQuery
