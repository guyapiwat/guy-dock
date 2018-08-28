<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliBinaryReport as ChildAliBinaryReport;
use CciOrm\CciOrm\AliBinaryReportQuery as ChildAliBinaryReportQuery;
use CciOrm\CciOrm\Map\AliBinaryReportTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_binary_report' table.
 *
 *
 *
 * @method     ChildAliBinaryReportQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliBinaryReportQuery orderByMdate($order = Criteria::ASC) Order by the mdate column
 * @method     ChildAliBinaryReportQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliBinaryReportQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliBinaryReportQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliBinaryReportQuery orderByFast($order = Criteria::ASC) Order by the fast column
 * @method     ChildAliBinaryReportQuery orderByWeakstrong($order = Criteria::ASC) Order by the weakstrong column
 * @method     ChildAliBinaryReportQuery orderByMatching($order = Criteria::ASC) Order by the matching column
 * @method     ChildAliBinaryReportQuery orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliBinaryReportQuery orderByUpaName($order = Criteria::ASC) Order by the upa_name column
 * @method     ChildAliBinaryReportQuery orderBySpCode($order = Criteria::ASC) Order by the sp_code column
 * @method     ChildAliBinaryReportQuery orderBySpName($order = Criteria::ASC) Order by the sp_name column
 * @method     ChildAliBinaryReportQuery orderByLv($order = Criteria::ASC) Order by the lv column
 * @method     ChildAliBinaryReportQuery orderByLvSp($order = Criteria::ASC) Order by the lv_sp column
 * @method     ChildAliBinaryReportQuery orderByLr($order = Criteria::ASC) Order by the lr column
 * @method     ChildAliBinaryReportQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliBinaryReportQuery orderByPosCur2($order = Criteria::ASC) Order by the pos_cur2 column
 * @method     ChildAliBinaryReportQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliBinaryReportQuery orderByTotpv($order = Criteria::ASC) Order by the totpv column
 * @method     ChildAliBinaryReportQuery orderByHpv($order = Criteria::ASC) Order by the hpv column
 * @method     ChildAliBinaryReportQuery orderByThismonth($order = Criteria::ASC) Order by the thismonth column
 * @method     ChildAliBinaryReportQuery orderByNextmonth($order = Criteria::ASC) Order by the nextmonth column
 *
 * @method     ChildAliBinaryReportQuery groupByMcode() Group by the mcode column
 * @method     ChildAliBinaryReportQuery groupByMdate() Group by the mdate column
 * @method     ChildAliBinaryReportQuery groupById() Group by the id column
 * @method     ChildAliBinaryReportQuery groupByNameT() Group by the name_t column
 * @method     ChildAliBinaryReportQuery groupByTotal() Group by the total column
 * @method     ChildAliBinaryReportQuery groupByFast() Group by the fast column
 * @method     ChildAliBinaryReportQuery groupByWeakstrong() Group by the weakstrong column
 * @method     ChildAliBinaryReportQuery groupByMatching() Group by the matching column
 * @method     ChildAliBinaryReportQuery groupByUpaCode() Group by the upa_code column
 * @method     ChildAliBinaryReportQuery groupByUpaName() Group by the upa_name column
 * @method     ChildAliBinaryReportQuery groupBySpCode() Group by the sp_code column
 * @method     ChildAliBinaryReportQuery groupBySpName() Group by the sp_name column
 * @method     ChildAliBinaryReportQuery groupByLv() Group by the lv column
 * @method     ChildAliBinaryReportQuery groupByLvSp() Group by the lv_sp column
 * @method     ChildAliBinaryReportQuery groupByLr() Group by the lr column
 * @method     ChildAliBinaryReportQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliBinaryReportQuery groupByPosCur2() Group by the pos_cur2 column
 * @method     ChildAliBinaryReportQuery groupByUid() Group by the uid column
 * @method     ChildAliBinaryReportQuery groupByTotpv() Group by the totpv column
 * @method     ChildAliBinaryReportQuery groupByHpv() Group by the hpv column
 * @method     ChildAliBinaryReportQuery groupByThismonth() Group by the thismonth column
 * @method     ChildAliBinaryReportQuery groupByNextmonth() Group by the nextmonth column
 *
 * @method     ChildAliBinaryReportQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliBinaryReportQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliBinaryReportQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliBinaryReportQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliBinaryReportQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliBinaryReportQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliBinaryReport findOne(ConnectionInterface $con = null) Return the first ChildAliBinaryReport matching the query
 * @method     ChildAliBinaryReport findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliBinaryReport matching the query, or a new ChildAliBinaryReport object populated from the query conditions when no match is found
 *
 * @method     ChildAliBinaryReport findOneByMcode(string $mcode) Return the first ChildAliBinaryReport filtered by the mcode column
 * @method     ChildAliBinaryReport findOneByMdate(string $mdate) Return the first ChildAliBinaryReport filtered by the mdate column
 * @method     ChildAliBinaryReport findOneById(string $id) Return the first ChildAliBinaryReport filtered by the id column
 * @method     ChildAliBinaryReport findOneByNameT(string $name_t) Return the first ChildAliBinaryReport filtered by the name_t column
 * @method     ChildAliBinaryReport findOneByTotal(string $total) Return the first ChildAliBinaryReport filtered by the total column
 * @method     ChildAliBinaryReport findOneByFast(string $fast) Return the first ChildAliBinaryReport filtered by the fast column
 * @method     ChildAliBinaryReport findOneByWeakstrong(string $weakstrong) Return the first ChildAliBinaryReport filtered by the weakstrong column
 * @method     ChildAliBinaryReport findOneByMatching(string $matching) Return the first ChildAliBinaryReport filtered by the matching column
 * @method     ChildAliBinaryReport findOneByUpaCode(string $upa_code) Return the first ChildAliBinaryReport filtered by the upa_code column
 * @method     ChildAliBinaryReport findOneByUpaName(string $upa_name) Return the first ChildAliBinaryReport filtered by the upa_name column
 * @method     ChildAliBinaryReport findOneBySpCode(string $sp_code) Return the first ChildAliBinaryReport filtered by the sp_code column
 * @method     ChildAliBinaryReport findOneBySpName(string $sp_name) Return the first ChildAliBinaryReport filtered by the sp_name column
 * @method     ChildAliBinaryReport findOneByLv(int $lv) Return the first ChildAliBinaryReport filtered by the lv column
 * @method     ChildAliBinaryReport findOneByLvSp(int $lv_sp) Return the first ChildAliBinaryReport filtered by the lv_sp column
 * @method     ChildAliBinaryReport findOneByLr(int $lr) Return the first ChildAliBinaryReport filtered by the lr column
 * @method     ChildAliBinaryReport findOneByPosCur(string $pos_cur) Return the first ChildAliBinaryReport filtered by the pos_cur column
 * @method     ChildAliBinaryReport findOneByPosCur2(string $pos_cur2) Return the first ChildAliBinaryReport filtered by the pos_cur2 column
 * @method     ChildAliBinaryReport findOneByUid(string $uid) Return the first ChildAliBinaryReport filtered by the uid column
 * @method     ChildAliBinaryReport findOneByTotpv(string $totpv) Return the first ChildAliBinaryReport filtered by the totpv column
 * @method     ChildAliBinaryReport findOneByHpv(string $hpv) Return the first ChildAliBinaryReport filtered by the hpv column
 * @method     ChildAliBinaryReport findOneByThismonth(string $thismonth) Return the first ChildAliBinaryReport filtered by the thismonth column
 * @method     ChildAliBinaryReport findOneByNextmonth(string $nextmonth) Return the first ChildAliBinaryReport filtered by the nextmonth column *

 * @method     ChildAliBinaryReport requirePk($key, ConnectionInterface $con = null) Return the ChildAliBinaryReport by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOne(ConnectionInterface $con = null) Return the first ChildAliBinaryReport matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBinaryReport requireOneByMcode(string $mcode) Return the first ChildAliBinaryReport filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByMdate(string $mdate) Return the first ChildAliBinaryReport filtered by the mdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneById(string $id) Return the first ChildAliBinaryReport filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByNameT(string $name_t) Return the first ChildAliBinaryReport filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByTotal(string $total) Return the first ChildAliBinaryReport filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByFast(string $fast) Return the first ChildAliBinaryReport filtered by the fast column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByWeakstrong(string $weakstrong) Return the first ChildAliBinaryReport filtered by the weakstrong column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByMatching(string $matching) Return the first ChildAliBinaryReport filtered by the matching column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByUpaCode(string $upa_code) Return the first ChildAliBinaryReport filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByUpaName(string $upa_name) Return the first ChildAliBinaryReport filtered by the upa_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneBySpCode(string $sp_code) Return the first ChildAliBinaryReport filtered by the sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneBySpName(string $sp_name) Return the first ChildAliBinaryReport filtered by the sp_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByLv(int $lv) Return the first ChildAliBinaryReport filtered by the lv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByLvSp(int $lv_sp) Return the first ChildAliBinaryReport filtered by the lv_sp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByLr(int $lr) Return the first ChildAliBinaryReport filtered by the lr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByPosCur(string $pos_cur) Return the first ChildAliBinaryReport filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByPosCur2(string $pos_cur2) Return the first ChildAliBinaryReport filtered by the pos_cur2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByUid(string $uid) Return the first ChildAliBinaryReport filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByTotpv(string $totpv) Return the first ChildAliBinaryReport filtered by the totpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByHpv(string $hpv) Return the first ChildAliBinaryReport filtered by the hpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByThismonth(string $thismonth) Return the first ChildAliBinaryReport filtered by the thismonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBinaryReport requireOneByNextmonth(string $nextmonth) Return the first ChildAliBinaryReport filtered by the nextmonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBinaryReport[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliBinaryReport objects based on current ModelCriteria
 * @method     ChildAliBinaryReport[]|ObjectCollection findByMcode(string $mcode) Return ChildAliBinaryReport objects filtered by the mcode column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByMdate(string $mdate) Return ChildAliBinaryReport objects filtered by the mdate column
 * @method     ChildAliBinaryReport[]|ObjectCollection findById(string $id) Return ChildAliBinaryReport objects filtered by the id column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByNameT(string $name_t) Return ChildAliBinaryReport objects filtered by the name_t column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByTotal(string $total) Return ChildAliBinaryReport objects filtered by the total column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByFast(string $fast) Return ChildAliBinaryReport objects filtered by the fast column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByWeakstrong(string $weakstrong) Return ChildAliBinaryReport objects filtered by the weakstrong column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByMatching(string $matching) Return ChildAliBinaryReport objects filtered by the matching column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliBinaryReport objects filtered by the upa_code column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByUpaName(string $upa_name) Return ChildAliBinaryReport objects filtered by the upa_name column
 * @method     ChildAliBinaryReport[]|ObjectCollection findBySpCode(string $sp_code) Return ChildAliBinaryReport objects filtered by the sp_code column
 * @method     ChildAliBinaryReport[]|ObjectCollection findBySpName(string $sp_name) Return ChildAliBinaryReport objects filtered by the sp_name column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByLv(int $lv) Return ChildAliBinaryReport objects filtered by the lv column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByLvSp(int $lv_sp) Return ChildAliBinaryReport objects filtered by the lv_sp column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByLr(int $lr) Return ChildAliBinaryReport objects filtered by the lr column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliBinaryReport objects filtered by the pos_cur column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByPosCur2(string $pos_cur2) Return ChildAliBinaryReport objects filtered by the pos_cur2 column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByUid(string $uid) Return ChildAliBinaryReport objects filtered by the uid column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByTotpv(string $totpv) Return ChildAliBinaryReport objects filtered by the totpv column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByHpv(string $hpv) Return ChildAliBinaryReport objects filtered by the hpv column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByThismonth(string $thismonth) Return ChildAliBinaryReport objects filtered by the thismonth column
 * @method     ChildAliBinaryReport[]|ObjectCollection findByNextmonth(string $nextmonth) Return ChildAliBinaryReport objects filtered by the nextmonth column
 * @method     ChildAliBinaryReport[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliBinaryReportQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliBinaryReportQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliBinaryReport', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliBinaryReportQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliBinaryReportQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliBinaryReportQuery) {
            return $criteria;
        }
        $query = new ChildAliBinaryReportQuery();
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
     * @return ChildAliBinaryReport|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliBinaryReportTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliBinaryReportTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliBinaryReport A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT mcode, mdate, id, name_t, total, fast, weakstrong, matching, upa_code, upa_name, sp_code, sp_name, lv, lv_sp, lr, pos_cur, pos_cur2, uid, totpv, hpv, thismonth, nextmonth FROM ali_binary_report WHERE id = :p0';
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
            /** @var ChildAliBinaryReport $obj */
            $obj = new ChildAliBinaryReport();
            $obj->hydrate($row);
            AliBinaryReportTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliBinaryReport|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByMdate($mdate = null, $comparison = null)
    {
        if (is_array($mdate)) {
            $useMinMax = false;
            if (isset($mdate['min'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_MDATE, $mdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mdate['max'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_MDATE, $mdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_MDATE, $mdate, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByFast($fast = null, $comparison = null)
    {
        if (is_array($fast)) {
            $useMinMax = false;
            if (isset($fast['min'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_FAST, $fast['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fast['max'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_FAST, $fast['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_FAST, $fast, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByWeakstrong($weakstrong = null, $comparison = null)
    {
        if (is_array($weakstrong)) {
            $useMinMax = false;
            if (isset($weakstrong['min'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_WEAKSTRONG, $weakstrong['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weakstrong['max'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_WEAKSTRONG, $weakstrong['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_WEAKSTRONG, $weakstrong, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByMatching($matching = null, $comparison = null)
    {
        if (is_array($matching)) {
            $useMinMax = false;
            if (isset($matching['min'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_MATCHING, $matching['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($matching['max'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_MATCHING, $matching['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_MATCHING, $matching, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_UPA_CODE, $upaCode, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByUpaName($upaName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_UPA_NAME, $upaName, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterBySpCode($spCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_SP_CODE, $spCode, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterBySpName($spName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_SP_NAME, $spName, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByLv($lv = null, $comparison = null)
    {
        if (is_array($lv)) {
            $useMinMax = false;
            if (isset($lv['min'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_LV, $lv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lv['max'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_LV, $lv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_LV, $lv, $comparison);
    }

    /**
     * Filter the query on the lv_sp column
     *
     * Example usage:
     * <code>
     * $query->filterByLvSp(1234); // WHERE lv_sp = 1234
     * $query->filterByLvSp(array(12, 34)); // WHERE lv_sp IN (12, 34)
     * $query->filterByLvSp(array('min' => 12)); // WHERE lv_sp > 12
     * </code>
     *
     * @param     mixed $lvSp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByLvSp($lvSp = null, $comparison = null)
    {
        if (is_array($lvSp)) {
            $useMinMax = false;
            if (isset($lvSp['min'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_LV_SP, $lvSp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lvSp['max'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_LV_SP, $lvSp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_LV_SP, $lvSp, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByLr($lr = null, $comparison = null)
    {
        if (is_array($lr)) {
            $useMinMax = false;
            if (isset($lr['min'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_LR, $lr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lr['max'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_LR, $lr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_LR, $lr, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_POS_CUR, $posCur, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByPosCur2($posCur2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_POS_CUR2, $posCur2, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByTotpv($totpv = null, $comparison = null)
    {
        if (is_array($totpv)) {
            $useMinMax = false;
            if (isset($totpv['min'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_TOTPV, $totpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totpv['max'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_TOTPV, $totpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_TOTPV, $totpv, $comparison);
    }

    /**
     * Filter the query on the hpv column
     *
     * Example usage:
     * <code>
     * $query->filterByHpv(1234); // WHERE hpv = 1234
     * $query->filterByHpv(array(12, 34)); // WHERE hpv IN (12, 34)
     * $query->filterByHpv(array('min' => 12)); // WHERE hpv > 12
     * </code>
     *
     * @param     mixed $hpv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByHpv($hpv = null, $comparison = null)
    {
        if (is_array($hpv)) {
            $useMinMax = false;
            if (isset($hpv['min'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_HPV, $hpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hpv['max'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_HPV, $hpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_HPV, $hpv, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByThismonth($thismonth = null, $comparison = null)
    {
        if (is_array($thismonth)) {
            $useMinMax = false;
            if (isset($thismonth['min'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_THISMONTH, $thismonth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thismonth['max'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_THISMONTH, $thismonth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_THISMONTH, $thismonth, $comparison);
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
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function filterByNextmonth($nextmonth = null, $comparison = null)
    {
        if (is_array($nextmonth)) {
            $useMinMax = false;
            if (isset($nextmonth['min'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_NEXTMONTH, $nextmonth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nextmonth['max'])) {
                $this->addUsingAlias(AliBinaryReportTableMap::COL_NEXTMONTH, $nextmonth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBinaryReportTableMap::COL_NEXTMONTH, $nextmonth, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliBinaryReport $aliBinaryReport Object to remove from the list of results
     *
     * @return $this|ChildAliBinaryReportQuery The current query, for fluid interface
     */
    public function prune($aliBinaryReport = null)
    {
        if ($aliBinaryReport) {
            $this->addUsingAlias(AliBinaryReportTableMap::COL_ID, $aliBinaryReport->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_binary_report table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBinaryReportTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliBinaryReportTableMap::clearInstancePool();
            AliBinaryReportTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBinaryReportTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliBinaryReportTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliBinaryReportTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliBinaryReportTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliBinaryReportQuery
