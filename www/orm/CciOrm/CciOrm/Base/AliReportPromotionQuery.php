<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliReportPromotion as ChildAliReportPromotion;
use CciOrm\CciOrm\AliReportPromotionQuery as ChildAliReportPromotionQuery;
use CciOrm\CciOrm\Map\AliReportPromotionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_report_promotion' table.
 *
 *
 *
 * @method     ChildAliReportPromotionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliReportPromotionQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliReportPromotionQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliReportPromotionQuery orderBySpCode($order = Criteria::ASC) Order by the sp_code column
 * @method     ChildAliReportPromotionQuery orderBySpName($order = Criteria::ASC) Order by the sp_name column
 * @method     ChildAliReportPromotionQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliReportPromotionQuery orderByPosCur2($order = Criteria::ASC) Order by the pos_cur2 column
 * @method     ChildAliReportPromotionQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliReportPromotionQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliReportPromotionQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 *
 * @method     ChildAliReportPromotionQuery groupById() Group by the id column
 * @method     ChildAliReportPromotionQuery groupByMcode() Group by the mcode column
 * @method     ChildAliReportPromotionQuery groupByNameT() Group by the name_t column
 * @method     ChildAliReportPromotionQuery groupBySpCode() Group by the sp_code column
 * @method     ChildAliReportPromotionQuery groupBySpName() Group by the sp_name column
 * @method     ChildAliReportPromotionQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliReportPromotionQuery groupByPosCur2() Group by the pos_cur2 column
 * @method     ChildAliReportPromotionQuery groupByFdate() Group by the fdate column
 * @method     ChildAliReportPromotionQuery groupByTdate() Group by the tdate column
 * @method     ChildAliReportPromotionQuery groupByTotPv() Group by the tot_pv column
 *
 * @method     ChildAliReportPromotionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliReportPromotionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliReportPromotionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliReportPromotionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliReportPromotionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliReportPromotionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliReportPromotion findOne(ConnectionInterface $con = null) Return the first ChildAliReportPromotion matching the query
 * @method     ChildAliReportPromotion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliReportPromotion matching the query, or a new ChildAliReportPromotion object populated from the query conditions when no match is found
 *
 * @method     ChildAliReportPromotion findOneById(int $id) Return the first ChildAliReportPromotion filtered by the id column
 * @method     ChildAliReportPromotion findOneByMcode(string $mcode) Return the first ChildAliReportPromotion filtered by the mcode column
 * @method     ChildAliReportPromotion findOneByNameT(string $name_t) Return the first ChildAliReportPromotion filtered by the name_t column
 * @method     ChildAliReportPromotion findOneBySpCode(string $sp_code) Return the first ChildAliReportPromotion filtered by the sp_code column
 * @method     ChildAliReportPromotion findOneBySpName(string $sp_name) Return the first ChildAliReportPromotion filtered by the sp_name column
 * @method     ChildAliReportPromotion findOneByPosCur(string $pos_cur) Return the first ChildAliReportPromotion filtered by the pos_cur column
 * @method     ChildAliReportPromotion findOneByPosCur2(string $pos_cur2) Return the first ChildAliReportPromotion filtered by the pos_cur2 column
 * @method     ChildAliReportPromotion findOneByFdate(string $fdate) Return the first ChildAliReportPromotion filtered by the fdate column
 * @method     ChildAliReportPromotion findOneByTdate(string $tdate) Return the first ChildAliReportPromotion filtered by the tdate column
 * @method     ChildAliReportPromotion findOneByTotPv(int $tot_pv) Return the first ChildAliReportPromotion filtered by the tot_pv column *

 * @method     ChildAliReportPromotion requirePk($key, ConnectionInterface $con = null) Return the ChildAliReportPromotion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPromotion requireOne(ConnectionInterface $con = null) Return the first ChildAliReportPromotion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliReportPromotion requireOneById(int $id) Return the first ChildAliReportPromotion filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPromotion requireOneByMcode(string $mcode) Return the first ChildAliReportPromotion filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPromotion requireOneByNameT(string $name_t) Return the first ChildAliReportPromotion filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPromotion requireOneBySpCode(string $sp_code) Return the first ChildAliReportPromotion filtered by the sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPromotion requireOneBySpName(string $sp_name) Return the first ChildAliReportPromotion filtered by the sp_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPromotion requireOneByPosCur(string $pos_cur) Return the first ChildAliReportPromotion filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPromotion requireOneByPosCur2(string $pos_cur2) Return the first ChildAliReportPromotion filtered by the pos_cur2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPromotion requireOneByFdate(string $fdate) Return the first ChildAliReportPromotion filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPromotion requireOneByTdate(string $tdate) Return the first ChildAliReportPromotion filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportPromotion requireOneByTotPv(int $tot_pv) Return the first ChildAliReportPromotion filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliReportPromotion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliReportPromotion objects based on current ModelCriteria
 * @method     ChildAliReportPromotion[]|ObjectCollection findById(int $id) Return ChildAliReportPromotion objects filtered by the id column
 * @method     ChildAliReportPromotion[]|ObjectCollection findByMcode(string $mcode) Return ChildAliReportPromotion objects filtered by the mcode column
 * @method     ChildAliReportPromotion[]|ObjectCollection findByNameT(string $name_t) Return ChildAliReportPromotion objects filtered by the name_t column
 * @method     ChildAliReportPromotion[]|ObjectCollection findBySpCode(string $sp_code) Return ChildAliReportPromotion objects filtered by the sp_code column
 * @method     ChildAliReportPromotion[]|ObjectCollection findBySpName(string $sp_name) Return ChildAliReportPromotion objects filtered by the sp_name column
 * @method     ChildAliReportPromotion[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliReportPromotion objects filtered by the pos_cur column
 * @method     ChildAliReportPromotion[]|ObjectCollection findByPosCur2(string $pos_cur2) Return ChildAliReportPromotion objects filtered by the pos_cur2 column
 * @method     ChildAliReportPromotion[]|ObjectCollection findByFdate(string $fdate) Return ChildAliReportPromotion objects filtered by the fdate column
 * @method     ChildAliReportPromotion[]|ObjectCollection findByTdate(string $tdate) Return ChildAliReportPromotion objects filtered by the tdate column
 * @method     ChildAliReportPromotion[]|ObjectCollection findByTotPv(int $tot_pv) Return ChildAliReportPromotion objects filtered by the tot_pv column
 * @method     ChildAliReportPromotion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliReportPromotionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliReportPromotionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliReportPromotion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliReportPromotionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliReportPromotionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliReportPromotionQuery) {
            return $criteria;
        }
        $query = new ChildAliReportPromotionQuery();
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
     * @return ChildAliReportPromotion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliReportPromotionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliReportPromotionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliReportPromotion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, name_t, sp_code, sp_name, pos_cur, pos_cur2, fdate, tdate, tot_pv FROM ali_report_promotion WHERE id = :p0';
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
            /** @var ChildAliReportPromotion $obj */
            $obj = new ChildAliReportPromotion();
            $obj->hydrate($row);
            AliReportPromotionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliReportPromotion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliReportPromotionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliReportPromotionTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliReportPromotionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliReportPromotionTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliReportPromotionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliReportPromotionTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliReportPromotionTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPromotionTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliReportPromotionQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPromotionTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliReportPromotionQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPromotionTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliReportPromotionQuery The current query, for fluid interface
     */
    public function filterBySpCode($spCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPromotionTableMap::COL_SP_CODE, $spCode, $comparison);
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
     * @return $this|ChildAliReportPromotionQuery The current query, for fluid interface
     */
    public function filterBySpName($spName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPromotionTableMap::COL_SP_NAME, $spName, $comparison);
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
     * @return $this|ChildAliReportPromotionQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPromotionTableMap::COL_POS_CUR, $posCur, $comparison);
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
     * @return $this|ChildAliReportPromotionQuery The current query, for fluid interface
     */
    public function filterByPosCur2($posCur2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPromotionTableMap::COL_POS_CUR2, $posCur2, $comparison);
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
     * @return $this|ChildAliReportPromotionQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliReportPromotionTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliReportPromotionTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPromotionTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliReportPromotionQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliReportPromotionTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliReportPromotionTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPromotionTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliReportPromotionQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliReportPromotionTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliReportPromotionTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportPromotionTableMap::COL_TOT_PV, $totPv, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliReportPromotion $aliReportPromotion Object to remove from the list of results
     *
     * @return $this|ChildAliReportPromotionQuery The current query, for fluid interface
     */
    public function prune($aliReportPromotion = null)
    {
        if ($aliReportPromotion) {
            $this->addUsingAlias(AliReportPromotionTableMap::COL_ID, $aliReportPromotion->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_report_promotion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportPromotionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliReportPromotionTableMap::clearInstancePool();
            AliReportPromotionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportPromotionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliReportPromotionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliReportPromotionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliReportPromotionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliReportPromotionQuery
