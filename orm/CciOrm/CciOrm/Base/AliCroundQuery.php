<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliCround as ChildAliCround;
use CciOrm\CciOrm\AliCroundQuery as ChildAliCroundQuery;
use CciOrm\CciOrm\Map\AliCroundTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_cround' table.
 *
 *
 *
 * @method     ChildAliCroundQuery orderByRid($order = Criteria::ASC) Order by the rid column
 * @method     ChildAliCroundQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliCroundQuery orderByCstatus($order = Criteria::ASC) Order by the cstatus column
 * @method     ChildAliCroundQuery orderByRdate($order = Criteria::ASC) Order by the rdate column
 * @method     ChildAliCroundQuery orderByFsano($order = Criteria::ASC) Order by the fsano column
 * @method     ChildAliCroundQuery orderByTsano($order = Criteria::ASC) Order by the tsano column
 * @method     ChildAliCroundQuery orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliCroundQuery orderByCalc($order = Criteria::ASC) Order by the calc column
 * @method     ChildAliCroundQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliCroundQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliCroundQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliCroundQuery orderByFpdate($order = Criteria::ASC) Order by the fpdate column
 * @method     ChildAliCroundQuery orderByTpdate($order = Criteria::ASC) Order by the tpdate column
 * @method     ChildAliCroundQuery orderByTotalA($order = Criteria::ASC) Order by the total_a column
 * @method     ChildAliCroundQuery orderByTotalH($order = Criteria::ASC) Order by the total_h column
 * @method     ChildAliCroundQuery orderByFast($order = Criteria::ASC) Order by the fast column
 * @method     ChildAliCroundQuery orderByInvent($order = Criteria::ASC) Order by the invent column
 * @method     ChildAliCroundQuery orderByBinaryt($order = Criteria::ASC) Order by the binaryt column
 * @method     ChildAliCroundQuery orderByMatching($order = Criteria::ASC) Order by the matching column
 * @method     ChildAliCroundQuery orderByPool($order = Criteria::ASC) Order by the pool column
 * @method     ChildAliCroundQuery orderByAdjustBinary($order = Criteria::ASC) Order by the adjust_binary column
 * @method     ChildAliCroundQuery orderByAdjustMatching($order = Criteria::ASC) Order by the adjust_matching column
 * @method     ChildAliCroundQuery orderByAdjustPool($order = Criteria::ASC) Order by the adjust_pool column
 * @method     ChildAliCroundQuery orderByCalcDate($order = Criteria::ASC) Order by the calc_date column
 * @method     ChildAliCroundQuery orderByTimequery($order = Criteria::ASC) Order by the timequery column
 * @method     ChildAliCroundQuery orderByUid($order = Criteria::ASC) Order by the uid column
 *
 * @method     ChildAliCroundQuery groupByRid() Group by the rid column
 * @method     ChildAliCroundQuery groupByRcode() Group by the rcode column
 * @method     ChildAliCroundQuery groupByCstatus() Group by the cstatus column
 * @method     ChildAliCroundQuery groupByRdate() Group by the rdate column
 * @method     ChildAliCroundQuery groupByFsano() Group by the fsano column
 * @method     ChildAliCroundQuery groupByTsano() Group by the tsano column
 * @method     ChildAliCroundQuery groupByPaydate() Group by the paydate column
 * @method     ChildAliCroundQuery groupByCalc() Group by the calc column
 * @method     ChildAliCroundQuery groupByRemark() Group by the remark column
 * @method     ChildAliCroundQuery groupByFdate() Group by the fdate column
 * @method     ChildAliCroundQuery groupByTdate() Group by the tdate column
 * @method     ChildAliCroundQuery groupByFpdate() Group by the fpdate column
 * @method     ChildAliCroundQuery groupByTpdate() Group by the tpdate column
 * @method     ChildAliCroundQuery groupByTotalA() Group by the total_a column
 * @method     ChildAliCroundQuery groupByTotalH() Group by the total_h column
 * @method     ChildAliCroundQuery groupByFast() Group by the fast column
 * @method     ChildAliCroundQuery groupByInvent() Group by the invent column
 * @method     ChildAliCroundQuery groupByBinaryt() Group by the binaryt column
 * @method     ChildAliCroundQuery groupByMatching() Group by the matching column
 * @method     ChildAliCroundQuery groupByPool() Group by the pool column
 * @method     ChildAliCroundQuery groupByAdjustBinary() Group by the adjust_binary column
 * @method     ChildAliCroundQuery groupByAdjustMatching() Group by the adjust_matching column
 * @method     ChildAliCroundQuery groupByAdjustPool() Group by the adjust_pool column
 * @method     ChildAliCroundQuery groupByCalcDate() Group by the calc_date column
 * @method     ChildAliCroundQuery groupByTimequery() Group by the timequery column
 * @method     ChildAliCroundQuery groupByUid() Group by the uid column
 *
 * @method     ChildAliCroundQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliCroundQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliCroundQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliCroundQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliCroundQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliCroundQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliCround findOne(ConnectionInterface $con = null) Return the first ChildAliCround matching the query
 * @method     ChildAliCround findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliCround matching the query, or a new ChildAliCround object populated from the query conditions when no match is found
 *
 * @method     ChildAliCround findOneByRid(int $rid) Return the first ChildAliCround filtered by the rid column
 * @method     ChildAliCround findOneByRcode(int $rcode) Return the first ChildAliCround filtered by the rcode column
 * @method     ChildAliCround findOneByCstatus(int $cstatus) Return the first ChildAliCround filtered by the cstatus column
 * @method     ChildAliCround findOneByRdate(string $rdate) Return the first ChildAliCround filtered by the rdate column
 * @method     ChildAliCround findOneByFsano(string $fsano) Return the first ChildAliCround filtered by the fsano column
 * @method     ChildAliCround findOneByTsano(string $tsano) Return the first ChildAliCround filtered by the tsano column
 * @method     ChildAliCround findOneByPaydate(string $paydate) Return the first ChildAliCround filtered by the paydate column
 * @method     ChildAliCround findOneByCalc(string $calc) Return the first ChildAliCround filtered by the calc column
 * @method     ChildAliCround findOneByRemark(string $remark) Return the first ChildAliCround filtered by the remark column
 * @method     ChildAliCround findOneByFdate(string $fdate) Return the first ChildAliCround filtered by the fdate column
 * @method     ChildAliCround findOneByTdate(string $tdate) Return the first ChildAliCround filtered by the tdate column
 * @method     ChildAliCround findOneByFpdate(string $fpdate) Return the first ChildAliCround filtered by the fpdate column
 * @method     ChildAliCround findOneByTpdate(string $tpdate) Return the first ChildAliCround filtered by the tpdate column
 * @method     ChildAliCround findOneByTotalA(string $total_a) Return the first ChildAliCround filtered by the total_a column
 * @method     ChildAliCround findOneByTotalH(string $total_h) Return the first ChildAliCround filtered by the total_h column
 * @method     ChildAliCround findOneByFast(string $fast) Return the first ChildAliCround filtered by the fast column
 * @method     ChildAliCround findOneByInvent(string $invent) Return the first ChildAliCround filtered by the invent column
 * @method     ChildAliCround findOneByBinaryt(string $binaryt) Return the first ChildAliCround filtered by the binaryt column
 * @method     ChildAliCround findOneByMatching(string $matching) Return the first ChildAliCround filtered by the matching column
 * @method     ChildAliCround findOneByPool(string $pool) Return the first ChildAliCround filtered by the pool column
 * @method     ChildAliCround findOneByAdjustBinary(string $adjust_binary) Return the first ChildAliCround filtered by the adjust_binary column
 * @method     ChildAliCround findOneByAdjustMatching(string $adjust_matching) Return the first ChildAliCround filtered by the adjust_matching column
 * @method     ChildAliCround findOneByAdjustPool(string $adjust_pool) Return the first ChildAliCround filtered by the adjust_pool column
 * @method     ChildAliCround findOneByCalcDate(string $calc_date) Return the first ChildAliCround filtered by the calc_date column
 * @method     ChildAliCround findOneByTimequery(int $timequery) Return the first ChildAliCround filtered by the timequery column
 * @method     ChildAliCround findOneByUid(string $uid) Return the first ChildAliCround filtered by the uid column *

 * @method     ChildAliCround requirePk($key, ConnectionInterface $con = null) Return the ChildAliCround by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOne(ConnectionInterface $con = null) Return the first ChildAliCround matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCround requireOneByRid(int $rid) Return the first ChildAliCround filtered by the rid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByRcode(int $rcode) Return the first ChildAliCround filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByCstatus(int $cstatus) Return the first ChildAliCround filtered by the cstatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByRdate(string $rdate) Return the first ChildAliCround filtered by the rdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByFsano(string $fsano) Return the first ChildAliCround filtered by the fsano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByTsano(string $tsano) Return the first ChildAliCround filtered by the tsano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByPaydate(string $paydate) Return the first ChildAliCround filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByCalc(string $calc) Return the first ChildAliCround filtered by the calc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByRemark(string $remark) Return the first ChildAliCround filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByFdate(string $fdate) Return the first ChildAliCround filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByTdate(string $tdate) Return the first ChildAliCround filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByFpdate(string $fpdate) Return the first ChildAliCround filtered by the fpdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByTpdate(string $tpdate) Return the first ChildAliCround filtered by the tpdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByTotalA(string $total_a) Return the first ChildAliCround filtered by the total_a column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByTotalH(string $total_h) Return the first ChildAliCround filtered by the total_h column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByFast(string $fast) Return the first ChildAliCround filtered by the fast column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByInvent(string $invent) Return the first ChildAliCround filtered by the invent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByBinaryt(string $binaryt) Return the first ChildAliCround filtered by the binaryt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByMatching(string $matching) Return the first ChildAliCround filtered by the matching column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByPool(string $pool) Return the first ChildAliCround filtered by the pool column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByAdjustBinary(string $adjust_binary) Return the first ChildAliCround filtered by the adjust_binary column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByAdjustMatching(string $adjust_matching) Return the first ChildAliCround filtered by the adjust_matching column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByAdjustPool(string $adjust_pool) Return the first ChildAliCround filtered by the adjust_pool column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByCalcDate(string $calc_date) Return the first ChildAliCround filtered by the calc_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByTimequery(int $timequery) Return the first ChildAliCround filtered by the timequery column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround requireOneByUid(string $uid) Return the first ChildAliCround filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCround[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliCround objects based on current ModelCriteria
 * @method     ChildAliCround[]|ObjectCollection findByRid(int $rid) Return ChildAliCround objects filtered by the rid column
 * @method     ChildAliCround[]|ObjectCollection findByRcode(int $rcode) Return ChildAliCround objects filtered by the rcode column
 * @method     ChildAliCround[]|ObjectCollection findByCstatus(int $cstatus) Return ChildAliCround objects filtered by the cstatus column
 * @method     ChildAliCround[]|ObjectCollection findByRdate(string $rdate) Return ChildAliCround objects filtered by the rdate column
 * @method     ChildAliCround[]|ObjectCollection findByFsano(string $fsano) Return ChildAliCround objects filtered by the fsano column
 * @method     ChildAliCround[]|ObjectCollection findByTsano(string $tsano) Return ChildAliCround objects filtered by the tsano column
 * @method     ChildAliCround[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliCround objects filtered by the paydate column
 * @method     ChildAliCround[]|ObjectCollection findByCalc(string $calc) Return ChildAliCround objects filtered by the calc column
 * @method     ChildAliCround[]|ObjectCollection findByRemark(string $remark) Return ChildAliCround objects filtered by the remark column
 * @method     ChildAliCround[]|ObjectCollection findByFdate(string $fdate) Return ChildAliCround objects filtered by the fdate column
 * @method     ChildAliCround[]|ObjectCollection findByTdate(string $tdate) Return ChildAliCround objects filtered by the tdate column
 * @method     ChildAliCround[]|ObjectCollection findByFpdate(string $fpdate) Return ChildAliCround objects filtered by the fpdate column
 * @method     ChildAliCround[]|ObjectCollection findByTpdate(string $tpdate) Return ChildAliCround objects filtered by the tpdate column
 * @method     ChildAliCround[]|ObjectCollection findByTotalA(string $total_a) Return ChildAliCround objects filtered by the total_a column
 * @method     ChildAliCround[]|ObjectCollection findByTotalH(string $total_h) Return ChildAliCround objects filtered by the total_h column
 * @method     ChildAliCround[]|ObjectCollection findByFast(string $fast) Return ChildAliCround objects filtered by the fast column
 * @method     ChildAliCround[]|ObjectCollection findByInvent(string $invent) Return ChildAliCround objects filtered by the invent column
 * @method     ChildAliCround[]|ObjectCollection findByBinaryt(string $binaryt) Return ChildAliCround objects filtered by the binaryt column
 * @method     ChildAliCround[]|ObjectCollection findByMatching(string $matching) Return ChildAliCround objects filtered by the matching column
 * @method     ChildAliCround[]|ObjectCollection findByPool(string $pool) Return ChildAliCround objects filtered by the pool column
 * @method     ChildAliCround[]|ObjectCollection findByAdjustBinary(string $adjust_binary) Return ChildAliCround objects filtered by the adjust_binary column
 * @method     ChildAliCround[]|ObjectCollection findByAdjustMatching(string $adjust_matching) Return ChildAliCround objects filtered by the adjust_matching column
 * @method     ChildAliCround[]|ObjectCollection findByAdjustPool(string $adjust_pool) Return ChildAliCround objects filtered by the adjust_pool column
 * @method     ChildAliCround[]|ObjectCollection findByCalcDate(string $calc_date) Return ChildAliCround objects filtered by the calc_date column
 * @method     ChildAliCround[]|ObjectCollection findByTimequery(int $timequery) Return ChildAliCround objects filtered by the timequery column
 * @method     ChildAliCround[]|ObjectCollection findByUid(string $uid) Return ChildAliCround objects filtered by the uid column
 * @method     ChildAliCround[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliCroundQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliCroundQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliCround', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliCroundQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliCroundQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliCroundQuery) {
            return $criteria;
        }
        $query = new ChildAliCroundQuery();
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
     * @return ChildAliCround|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliCroundTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliCroundTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliCround A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT rid, rcode, cstatus, rdate, fsano, tsano, paydate, calc, remark, fdate, tdate, fpdate, tpdate, total_a, total_h, fast, invent, binaryt, matching, pool, adjust_binary, adjust_matching, adjust_pool, calc_date, timequery, uid FROM ali_cround WHERE rid = :p0';
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
            /** @var ChildAliCround $obj */
            $obj = new ChildAliCround();
            $obj->hydrate($row);
            AliCroundTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliCround|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliCroundTableMap::COL_RID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliCroundTableMap::COL_RID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the rid column
     *
     * Example usage:
     * <code>
     * $query->filterByRid(1234); // WHERE rid = 1234
     * $query->filterByRid(array(12, 34)); // WHERE rid IN (12, 34)
     * $query->filterByRid(array('min' => 12)); // WHERE rid > 12
     * </code>
     *
     * @param     mixed $rid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByRid($rid = null, $comparison = null)
    {
        if (is_array($rid)) {
            $useMinMax = false;
            if (isset($rid['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_RID, $rid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rid['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_RID, $rid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_RID, $rid, $comparison);
    }

    /**
     * Filter the query on the rcode column
     *
     * Example usage:
     * <code>
     * $query->filterByRcode(1234); // WHERE rcode = 1234
     * $query->filterByRcode(array(12, 34)); // WHERE rcode IN (12, 34)
     * $query->filterByRcode(array('min' => 12)); // WHERE rcode > 12
     * </code>
     *
     * @param     mixed $rcode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the cstatus column
     *
     * Example usage:
     * <code>
     * $query->filterByCstatus(1234); // WHERE cstatus = 1234
     * $query->filterByCstatus(array(12, 34)); // WHERE cstatus IN (12, 34)
     * $query->filterByCstatus(array('min' => 12)); // WHERE cstatus > 12
     * </code>
     *
     * @param     mixed $cstatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByCstatus($cstatus = null, $comparison = null)
    {
        if (is_array($cstatus)) {
            $useMinMax = false;
            if (isset($cstatus['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_CSTATUS, $cstatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cstatus['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_CSTATUS, $cstatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_CSTATUS, $cstatus, $comparison);
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
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByRdate($rdate = null, $comparison = null)
    {
        if (is_array($rdate)) {
            $useMinMax = false;
            if (isset($rdate['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_RDATE, $rdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rdate['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_RDATE, $rdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_RDATE, $rdate, $comparison);
    }

    /**
     * Filter the query on the fsano column
     *
     * Example usage:
     * <code>
     * $query->filterByFsano('fooValue');   // WHERE fsano = 'fooValue'
     * $query->filterByFsano('%fooValue%', Criteria::LIKE); // WHERE fsano LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fsano The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByFsano($fsano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fsano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_FSANO, $fsano, $comparison);
    }

    /**
     * Filter the query on the tsano column
     *
     * Example usage:
     * <code>
     * $query->filterByTsano('fooValue');   // WHERE tsano = 'fooValue'
     * $query->filterByTsano('%fooValue%', Criteria::LIKE); // WHERE tsano LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tsano The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByTsano($tsano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tsano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_TSANO, $tsano, $comparison);
    }

    /**
     * Filter the query on the paydate column
     *
     * Example usage:
     * <code>
     * $query->filterByPaydate('2011-03-14'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate('now'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate(array('max' => 'yesterday')); // WHERE paydate > '2011-03-13'
     * </code>
     *
     * @param     mixed $paydate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (is_array($paydate)) {
            $useMinMax = false;
            if (isset($paydate['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_PAYDATE, $paydate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paydate['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_PAYDATE, $paydate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_PAYDATE, $paydate, $comparison);
    }

    /**
     * Filter the query on the calc column
     *
     * Example usage:
     * <code>
     * $query->filterByCalc('fooValue');   // WHERE calc = 'fooValue'
     * $query->filterByCalc('%fooValue%', Criteria::LIKE); // WHERE calc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $calc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByCalc($calc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($calc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_CALC, $calc, $comparison);
    }

    /**
     * Filter the query on the remark column
     *
     * Example usage:
     * <code>
     * $query->filterByRemark('fooValue');   // WHERE remark = 'fooValue'
     * $query->filterByRemark('%fooValue%', Criteria::LIKE); // WHERE remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $remark The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the fpdate column
     *
     * Example usage:
     * <code>
     * $query->filterByFpdate('2011-03-14'); // WHERE fpdate = '2011-03-14'
     * $query->filterByFpdate('now'); // WHERE fpdate = '2011-03-14'
     * $query->filterByFpdate(array('max' => 'yesterday')); // WHERE fpdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $fpdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByFpdate($fpdate = null, $comparison = null)
    {
        if (is_array($fpdate)) {
            $useMinMax = false;
            if (isset($fpdate['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_FPDATE, $fpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fpdate['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_FPDATE, $fpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_FPDATE, $fpdate, $comparison);
    }

    /**
     * Filter the query on the tpdate column
     *
     * Example usage:
     * <code>
     * $query->filterByTpdate('2011-03-14'); // WHERE tpdate = '2011-03-14'
     * $query->filterByTpdate('now'); // WHERE tpdate = '2011-03-14'
     * $query->filterByTpdate(array('max' => 'yesterday')); // WHERE tpdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $tpdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByTpdate($tpdate = null, $comparison = null)
    {
        if (is_array($tpdate)) {
            $useMinMax = false;
            if (isset($tpdate['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_TPDATE, $tpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tpdate['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_TPDATE, $tpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_TPDATE, $tpdate, $comparison);
    }

    /**
     * Filter the query on the total_a column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalA(1234); // WHERE total_a = 1234
     * $query->filterByTotalA(array(12, 34)); // WHERE total_a IN (12, 34)
     * $query->filterByTotalA(array('min' => 12)); // WHERE total_a > 12
     * </code>
     *
     * @param     mixed $totalA The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByTotalA($totalA = null, $comparison = null)
    {
        if (is_array($totalA)) {
            $useMinMax = false;
            if (isset($totalA['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_TOTAL_A, $totalA['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalA['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_TOTAL_A, $totalA['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_TOTAL_A, $totalA, $comparison);
    }

    /**
     * Filter the query on the total_h column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalH(1234); // WHERE total_h = 1234
     * $query->filterByTotalH(array(12, 34)); // WHERE total_h IN (12, 34)
     * $query->filterByTotalH(array('min' => 12)); // WHERE total_h > 12
     * </code>
     *
     * @param     mixed $totalH The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByTotalH($totalH = null, $comparison = null)
    {
        if (is_array($totalH)) {
            $useMinMax = false;
            if (isset($totalH['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_TOTAL_H, $totalH['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalH['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_TOTAL_H, $totalH['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_TOTAL_H, $totalH, $comparison);
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
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByFast($fast = null, $comparison = null)
    {
        if (is_array($fast)) {
            $useMinMax = false;
            if (isset($fast['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_FAST, $fast['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fast['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_FAST, $fast['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_FAST, $fast, $comparison);
    }

    /**
     * Filter the query on the invent column
     *
     * Example usage:
     * <code>
     * $query->filterByInvent(1234); // WHERE invent = 1234
     * $query->filterByInvent(array(12, 34)); // WHERE invent IN (12, 34)
     * $query->filterByInvent(array('min' => 12)); // WHERE invent > 12
     * </code>
     *
     * @param     mixed $invent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByInvent($invent = null, $comparison = null)
    {
        if (is_array($invent)) {
            $useMinMax = false;
            if (isset($invent['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_INVENT, $invent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($invent['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_INVENT, $invent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_INVENT, $invent, $comparison);
    }

    /**
     * Filter the query on the binaryt column
     *
     * Example usage:
     * <code>
     * $query->filterByBinaryt(1234); // WHERE binaryt = 1234
     * $query->filterByBinaryt(array(12, 34)); // WHERE binaryt IN (12, 34)
     * $query->filterByBinaryt(array('min' => 12)); // WHERE binaryt > 12
     * </code>
     *
     * @param     mixed $binaryt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByBinaryt($binaryt = null, $comparison = null)
    {
        if (is_array($binaryt)) {
            $useMinMax = false;
            if (isset($binaryt['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_BINARYT, $binaryt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($binaryt['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_BINARYT, $binaryt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_BINARYT, $binaryt, $comparison);
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
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByMatching($matching = null, $comparison = null)
    {
        if (is_array($matching)) {
            $useMinMax = false;
            if (isset($matching['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_MATCHING, $matching['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($matching['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_MATCHING, $matching['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_MATCHING, $matching, $comparison);
    }

    /**
     * Filter the query on the pool column
     *
     * Example usage:
     * <code>
     * $query->filterByPool(1234); // WHERE pool = 1234
     * $query->filterByPool(array(12, 34)); // WHERE pool IN (12, 34)
     * $query->filterByPool(array('min' => 12)); // WHERE pool > 12
     * </code>
     *
     * @param     mixed $pool The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByPool($pool = null, $comparison = null)
    {
        if (is_array($pool)) {
            $useMinMax = false;
            if (isset($pool['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_POOL, $pool['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pool['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_POOL, $pool['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_POOL, $pool, $comparison);
    }

    /**
     * Filter the query on the adjust_binary column
     *
     * Example usage:
     * <code>
     * $query->filterByAdjustBinary(1234); // WHERE adjust_binary = 1234
     * $query->filterByAdjustBinary(array(12, 34)); // WHERE adjust_binary IN (12, 34)
     * $query->filterByAdjustBinary(array('min' => 12)); // WHERE adjust_binary > 12
     * </code>
     *
     * @param     mixed $adjustBinary The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByAdjustBinary($adjustBinary = null, $comparison = null)
    {
        if (is_array($adjustBinary)) {
            $useMinMax = false;
            if (isset($adjustBinary['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_ADJUST_BINARY, $adjustBinary['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adjustBinary['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_ADJUST_BINARY, $adjustBinary['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_ADJUST_BINARY, $adjustBinary, $comparison);
    }

    /**
     * Filter the query on the adjust_matching column
     *
     * Example usage:
     * <code>
     * $query->filterByAdjustMatching(1234); // WHERE adjust_matching = 1234
     * $query->filterByAdjustMatching(array(12, 34)); // WHERE adjust_matching IN (12, 34)
     * $query->filterByAdjustMatching(array('min' => 12)); // WHERE adjust_matching > 12
     * </code>
     *
     * @param     mixed $adjustMatching The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByAdjustMatching($adjustMatching = null, $comparison = null)
    {
        if (is_array($adjustMatching)) {
            $useMinMax = false;
            if (isset($adjustMatching['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_ADJUST_MATCHING, $adjustMatching['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adjustMatching['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_ADJUST_MATCHING, $adjustMatching['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_ADJUST_MATCHING, $adjustMatching, $comparison);
    }

    /**
     * Filter the query on the adjust_pool column
     *
     * Example usage:
     * <code>
     * $query->filterByAdjustPool(1234); // WHERE adjust_pool = 1234
     * $query->filterByAdjustPool(array(12, 34)); // WHERE adjust_pool IN (12, 34)
     * $query->filterByAdjustPool(array('min' => 12)); // WHERE adjust_pool > 12
     * </code>
     *
     * @param     mixed $adjustPool The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByAdjustPool($adjustPool = null, $comparison = null)
    {
        if (is_array($adjustPool)) {
            $useMinMax = false;
            if (isset($adjustPool['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_ADJUST_POOL, $adjustPool['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adjustPool['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_ADJUST_POOL, $adjustPool['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_ADJUST_POOL, $adjustPool, $comparison);
    }

    /**
     * Filter the query on the calc_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCalcDate('2011-03-14'); // WHERE calc_date = '2011-03-14'
     * $query->filterByCalcDate('now'); // WHERE calc_date = '2011-03-14'
     * $query->filterByCalcDate(array('max' => 'yesterday')); // WHERE calc_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $calcDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByCalcDate($calcDate = null, $comparison = null)
    {
        if (is_array($calcDate)) {
            $useMinMax = false;
            if (isset($calcDate['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_CALC_DATE, $calcDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($calcDate['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_CALC_DATE, $calcDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_CALC_DATE, $calcDate, $comparison);
    }

    /**
     * Filter the query on the timequery column
     *
     * Example usage:
     * <code>
     * $query->filterByTimequery(1234); // WHERE timequery = 1234
     * $query->filterByTimequery(array(12, 34)); // WHERE timequery IN (12, 34)
     * $query->filterByTimequery(array('min' => 12)); // WHERE timequery > 12
     * </code>
     *
     * @param     mixed $timequery The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByTimequery($timequery = null, $comparison = null)
    {
        if (is_array($timequery)) {
            $useMinMax = false;
            if (isset($timequery['min'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_TIMEQUERY, $timequery['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timequery['max'])) {
                $this->addUsingAlias(AliCroundTableMap::COL_TIMEQUERY, $timequery['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_TIMEQUERY, $timequery, $comparison);
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
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCroundTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliCround $aliCround Object to remove from the list of results
     *
     * @return $this|ChildAliCroundQuery The current query, for fluid interface
     */
    public function prune($aliCround = null)
    {
        if ($aliCround) {
            $this->addUsingAlias(AliCroundTableMap::COL_RID, $aliCround->getRid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_cround table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCroundTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliCroundTableMap::clearInstancePool();
            AliCroundTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCroundTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliCroundTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliCroundTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliCroundTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliCroundQuery
