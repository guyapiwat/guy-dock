<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliLogChange as ChildAliLogChange;
use CciOrm\CciOrm\AliLogChangeQuery as ChildAliLogChangeQuery;
use CciOrm\CciOrm\Map\AliLogChangeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_log_change' table.
 *
 *
 *
 * @method     ChildAliLogChangeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliLogChangeQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliLogChangeQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliLogChangeQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliLogChangeQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliLogChangeQuery orderByMpos($order = Criteria::ASC) Order by the mpos column
 * @method     ChildAliLogChangeQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliLogChangeQuery orderByPvb($order = Criteria::ASC) Order by the pvb column
 * @method     ChildAliLogChangeQuery orderByPvh($order = Criteria::ASC) Order by the pvh column
 * @method     ChildAliLogChangeQuery orderByFob($order = Criteria::ASC) Order by the fob column
 * @method     ChildAliLogChangeQuery orderByCycle($order = Criteria::ASC) Order by the cycle column
 * @method     ChildAliLogChangeQuery orderByAmbonus2($order = Criteria::ASC) Order by the ambonus2 column
 * @method     ChildAliLogChangeQuery orderByFmbonus($order = Criteria::ASC) Order by the fmbonus column
 * @method     ChildAliLogChangeQuery orderByUnilevel($order = Criteria::ASC) Order by the unilevel column
 * @method     ChildAliLogChangeQuery orderByAdjust($order = Criteria::ASC) Order by the adjust column
 * @method     ChildAliLogChangeQuery orderByAutoship($order = Criteria::ASC) Order by the autoship column
 * @method     ChildAliLogChangeQuery orderByEwalletWithdraw($order = Criteria::ASC) Order by the ewallet_withdraw column
 * @method     ChildAliLogChangeQuery orderByTotTax($order = Criteria::ASC) Order by the tot_tax column
 * @method     ChildAliLogChangeQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliLogChangeQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliLogChangeQuery orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliLogChangeQuery orderByDateChange($order = Criteria::ASC) Order by the date_change column
 * @method     ChildAliLogChangeQuery orderByComTransferChagre($order = Criteria::ASC) Order by the com_transfer_chagre column
 * @method     ChildAliLogChangeQuery orderByUid($order = Criteria::ASC) Order by the uid column
 *
 * @method     ChildAliLogChangeQuery groupById() Group by the id column
 * @method     ChildAliLogChangeQuery groupByRcode() Group by the rcode column
 * @method     ChildAliLogChangeQuery groupByFdate() Group by the fdate column
 * @method     ChildAliLogChangeQuery groupByTdate() Group by the tdate column
 * @method     ChildAliLogChangeQuery groupByMcode() Group by the mcode column
 * @method     ChildAliLogChangeQuery groupByMpos() Group by the mpos column
 * @method     ChildAliLogChangeQuery groupByStatus() Group by the status column
 * @method     ChildAliLogChangeQuery groupByPvb() Group by the pvb column
 * @method     ChildAliLogChangeQuery groupByPvh() Group by the pvh column
 * @method     ChildAliLogChangeQuery groupByFob() Group by the fob column
 * @method     ChildAliLogChangeQuery groupByCycle() Group by the cycle column
 * @method     ChildAliLogChangeQuery groupByAmbonus2() Group by the ambonus2 column
 * @method     ChildAliLogChangeQuery groupByFmbonus() Group by the fmbonus column
 * @method     ChildAliLogChangeQuery groupByUnilevel() Group by the unilevel column
 * @method     ChildAliLogChangeQuery groupByAdjust() Group by the adjust column
 * @method     ChildAliLogChangeQuery groupByAutoship() Group by the autoship column
 * @method     ChildAliLogChangeQuery groupByEwalletWithdraw() Group by the ewallet_withdraw column
 * @method     ChildAliLogChangeQuery groupByTotTax() Group by the tot_tax column
 * @method     ChildAliLogChangeQuery groupByPv() Group by the pv column
 * @method     ChildAliLogChangeQuery groupByTotal() Group by the total column
 * @method     ChildAliLogChangeQuery groupByPaydate() Group by the paydate column
 * @method     ChildAliLogChangeQuery groupByDateChange() Group by the date_change column
 * @method     ChildAliLogChangeQuery groupByComTransferChagre() Group by the com_transfer_chagre column
 * @method     ChildAliLogChangeQuery groupByUid() Group by the uid column
 *
 * @method     ChildAliLogChangeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliLogChangeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliLogChangeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliLogChangeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliLogChangeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliLogChangeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliLogChange findOne(ConnectionInterface $con = null) Return the first ChildAliLogChange matching the query
 * @method     ChildAliLogChange findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliLogChange matching the query, or a new ChildAliLogChange object populated from the query conditions when no match is found
 *
 * @method     ChildAliLogChange findOneById(int $id) Return the first ChildAliLogChange filtered by the id column
 * @method     ChildAliLogChange findOneByRcode(int $rcode) Return the first ChildAliLogChange filtered by the rcode column
 * @method     ChildAliLogChange findOneByFdate(string $fdate) Return the first ChildAliLogChange filtered by the fdate column
 * @method     ChildAliLogChange findOneByTdate(string $tdate) Return the first ChildAliLogChange filtered by the tdate column
 * @method     ChildAliLogChange findOneByMcode(string $mcode) Return the first ChildAliLogChange filtered by the mcode column
 * @method     ChildAliLogChange findOneByMpos(string $mpos) Return the first ChildAliLogChange filtered by the mpos column
 * @method     ChildAliLogChange findOneByStatus(string $status) Return the first ChildAliLogChange filtered by the status column
 * @method     ChildAliLogChange findOneByPvb(string $pvb) Return the first ChildAliLogChange filtered by the pvb column
 * @method     ChildAliLogChange findOneByPvh(string $pvh) Return the first ChildAliLogChange filtered by the pvh column
 * @method     ChildAliLogChange findOneByFob(string $fob) Return the first ChildAliLogChange filtered by the fob column
 * @method     ChildAliLogChange findOneByCycle(string $cycle) Return the first ChildAliLogChange filtered by the cycle column
 * @method     ChildAliLogChange findOneByAmbonus2(string $ambonus2) Return the first ChildAliLogChange filtered by the ambonus2 column
 * @method     ChildAliLogChange findOneByFmbonus(string $fmbonus) Return the first ChildAliLogChange filtered by the fmbonus column
 * @method     ChildAliLogChange findOneByUnilevel(string $unilevel) Return the first ChildAliLogChange filtered by the unilevel column
 * @method     ChildAliLogChange findOneByAdjust(string $adjust) Return the first ChildAliLogChange filtered by the adjust column
 * @method     ChildAliLogChange findOneByAutoship(string $autoship) Return the first ChildAliLogChange filtered by the autoship column
 * @method     ChildAliLogChange findOneByEwalletWithdraw(string $ewallet_withdraw) Return the first ChildAliLogChange filtered by the ewallet_withdraw column
 * @method     ChildAliLogChange findOneByTotTax(string $tot_tax) Return the first ChildAliLogChange filtered by the tot_tax column
 * @method     ChildAliLogChange findOneByPv(int $pv) Return the first ChildAliLogChange filtered by the pv column
 * @method     ChildAliLogChange findOneByTotal(string $total) Return the first ChildAliLogChange filtered by the total column
 * @method     ChildAliLogChange findOneByPaydate(string $paydate) Return the first ChildAliLogChange filtered by the paydate column
 * @method     ChildAliLogChange findOneByDateChange(string $date_change) Return the first ChildAliLogChange filtered by the date_change column
 * @method     ChildAliLogChange findOneByComTransferChagre(int $com_transfer_chagre) Return the first ChildAliLogChange filtered by the com_transfer_chagre column
 * @method     ChildAliLogChange findOneByUid(string $uid) Return the first ChildAliLogChange filtered by the uid column *

 * @method     ChildAliLogChange requirePk($key, ConnectionInterface $con = null) Return the ChildAliLogChange by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOne(ConnectionInterface $con = null) Return the first ChildAliLogChange matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLogChange requireOneById(int $id) Return the first ChildAliLogChange filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByRcode(int $rcode) Return the first ChildAliLogChange filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByFdate(string $fdate) Return the first ChildAliLogChange filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByTdate(string $tdate) Return the first ChildAliLogChange filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByMcode(string $mcode) Return the first ChildAliLogChange filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByMpos(string $mpos) Return the first ChildAliLogChange filtered by the mpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByStatus(string $status) Return the first ChildAliLogChange filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByPvb(string $pvb) Return the first ChildAliLogChange filtered by the pvb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByPvh(string $pvh) Return the first ChildAliLogChange filtered by the pvh column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByFob(string $fob) Return the first ChildAliLogChange filtered by the fob column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByCycle(string $cycle) Return the first ChildAliLogChange filtered by the cycle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByAmbonus2(string $ambonus2) Return the first ChildAliLogChange filtered by the ambonus2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByFmbonus(string $fmbonus) Return the first ChildAliLogChange filtered by the fmbonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByUnilevel(string $unilevel) Return the first ChildAliLogChange filtered by the unilevel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByAdjust(string $adjust) Return the first ChildAliLogChange filtered by the adjust column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByAutoship(string $autoship) Return the first ChildAliLogChange filtered by the autoship column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByEwalletWithdraw(string $ewallet_withdraw) Return the first ChildAliLogChange filtered by the ewallet_withdraw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByTotTax(string $tot_tax) Return the first ChildAliLogChange filtered by the tot_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByPv(int $pv) Return the first ChildAliLogChange filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByTotal(string $total) Return the first ChildAliLogChange filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByPaydate(string $paydate) Return the first ChildAliLogChange filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByDateChange(string $date_change) Return the first ChildAliLogChange filtered by the date_change column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByComTransferChagre(int $com_transfer_chagre) Return the first ChildAliLogChange filtered by the com_transfer_chagre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogChange requireOneByUid(string $uid) Return the first ChildAliLogChange filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLogChange[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliLogChange objects based on current ModelCriteria
 * @method     ChildAliLogChange[]|ObjectCollection findById(int $id) Return ChildAliLogChange objects filtered by the id column
 * @method     ChildAliLogChange[]|ObjectCollection findByRcode(int $rcode) Return ChildAliLogChange objects filtered by the rcode column
 * @method     ChildAliLogChange[]|ObjectCollection findByFdate(string $fdate) Return ChildAliLogChange objects filtered by the fdate column
 * @method     ChildAliLogChange[]|ObjectCollection findByTdate(string $tdate) Return ChildAliLogChange objects filtered by the tdate column
 * @method     ChildAliLogChange[]|ObjectCollection findByMcode(string $mcode) Return ChildAliLogChange objects filtered by the mcode column
 * @method     ChildAliLogChange[]|ObjectCollection findByMpos(string $mpos) Return ChildAliLogChange objects filtered by the mpos column
 * @method     ChildAliLogChange[]|ObjectCollection findByStatus(string $status) Return ChildAliLogChange objects filtered by the status column
 * @method     ChildAliLogChange[]|ObjectCollection findByPvb(string $pvb) Return ChildAliLogChange objects filtered by the pvb column
 * @method     ChildAliLogChange[]|ObjectCollection findByPvh(string $pvh) Return ChildAliLogChange objects filtered by the pvh column
 * @method     ChildAliLogChange[]|ObjectCollection findByFob(string $fob) Return ChildAliLogChange objects filtered by the fob column
 * @method     ChildAliLogChange[]|ObjectCollection findByCycle(string $cycle) Return ChildAliLogChange objects filtered by the cycle column
 * @method     ChildAliLogChange[]|ObjectCollection findByAmbonus2(string $ambonus2) Return ChildAliLogChange objects filtered by the ambonus2 column
 * @method     ChildAliLogChange[]|ObjectCollection findByFmbonus(string $fmbonus) Return ChildAliLogChange objects filtered by the fmbonus column
 * @method     ChildAliLogChange[]|ObjectCollection findByUnilevel(string $unilevel) Return ChildAliLogChange objects filtered by the unilevel column
 * @method     ChildAliLogChange[]|ObjectCollection findByAdjust(string $adjust) Return ChildAliLogChange objects filtered by the adjust column
 * @method     ChildAliLogChange[]|ObjectCollection findByAutoship(string $autoship) Return ChildAliLogChange objects filtered by the autoship column
 * @method     ChildAliLogChange[]|ObjectCollection findByEwalletWithdraw(string $ewallet_withdraw) Return ChildAliLogChange objects filtered by the ewallet_withdraw column
 * @method     ChildAliLogChange[]|ObjectCollection findByTotTax(string $tot_tax) Return ChildAliLogChange objects filtered by the tot_tax column
 * @method     ChildAliLogChange[]|ObjectCollection findByPv(int $pv) Return ChildAliLogChange objects filtered by the pv column
 * @method     ChildAliLogChange[]|ObjectCollection findByTotal(string $total) Return ChildAliLogChange objects filtered by the total column
 * @method     ChildAliLogChange[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliLogChange objects filtered by the paydate column
 * @method     ChildAliLogChange[]|ObjectCollection findByDateChange(string $date_change) Return ChildAliLogChange objects filtered by the date_change column
 * @method     ChildAliLogChange[]|ObjectCollection findByComTransferChagre(int $com_transfer_chagre) Return ChildAliLogChange objects filtered by the com_transfer_chagre column
 * @method     ChildAliLogChange[]|ObjectCollection findByUid(string $uid) Return ChildAliLogChange objects filtered by the uid column
 * @method     ChildAliLogChange[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliLogChangeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliLogChangeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliLogChange', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliLogChangeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliLogChangeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliLogChangeQuery) {
            return $criteria;
        }
        $query = new ChildAliLogChangeQuery();
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
     * @return ChildAliLogChange|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliLogChangeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliLogChangeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliLogChange A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, fdate, tdate, mcode, mpos, status, pvb, pvh, fob, cycle, ambonus2, fmbonus, unilevel, adjust, autoship, ewallet_withdraw, tot_tax, pv, total, paydate, date_change, com_transfer_chagre, uid FROM ali_log_change WHERE id = :p0';
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
            /** @var ChildAliLogChange $obj */
            $obj = new ChildAliLogChange();
            $obj->hydrate($row);
            AliLogChangeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliLogChange|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliLogChangeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliLogChangeTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the mpos column
     *
     * Example usage:
     * <code>
     * $query->filterByMpos('fooValue');   // WHERE mpos = 'fooValue'
     * $query->filterByMpos('%fooValue%', Criteria::LIKE); // WHERE mpos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mpos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByMpos($mpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_MPOS, $mpos, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the pvb column
     *
     * Example usage:
     * <code>
     * $query->filterByPvb(1234); // WHERE pvb = 1234
     * $query->filterByPvb(array(12, 34)); // WHERE pvb IN (12, 34)
     * $query->filterByPvb(array('min' => 12)); // WHERE pvb > 12
     * </code>
     *
     * @param     mixed $pvb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByPvb($pvb = null, $comparison = null)
    {
        if (is_array($pvb)) {
            $useMinMax = false;
            if (isset($pvb['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_PVB, $pvb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvb['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_PVB, $pvb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_PVB, $pvb, $comparison);
    }

    /**
     * Filter the query on the pvh column
     *
     * Example usage:
     * <code>
     * $query->filterByPvh(1234); // WHERE pvh = 1234
     * $query->filterByPvh(array(12, 34)); // WHERE pvh IN (12, 34)
     * $query->filterByPvh(array('min' => 12)); // WHERE pvh > 12
     * </code>
     *
     * @param     mixed $pvh The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByPvh($pvh = null, $comparison = null)
    {
        if (is_array($pvh)) {
            $useMinMax = false;
            if (isset($pvh['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_PVH, $pvh['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvh['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_PVH, $pvh['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_PVH, $pvh, $comparison);
    }

    /**
     * Filter the query on the fob column
     *
     * Example usage:
     * <code>
     * $query->filterByFob(1234); // WHERE fob = 1234
     * $query->filterByFob(array(12, 34)); // WHERE fob IN (12, 34)
     * $query->filterByFob(array('min' => 12)); // WHERE fob > 12
     * </code>
     *
     * @param     mixed $fob The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByFob($fob = null, $comparison = null)
    {
        if (is_array($fob)) {
            $useMinMax = false;
            if (isset($fob['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_FOB, $fob['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fob['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_FOB, $fob['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_FOB, $fob, $comparison);
    }

    /**
     * Filter the query on the cycle column
     *
     * Example usage:
     * <code>
     * $query->filterByCycle(1234); // WHERE cycle = 1234
     * $query->filterByCycle(array(12, 34)); // WHERE cycle IN (12, 34)
     * $query->filterByCycle(array('min' => 12)); // WHERE cycle > 12
     * </code>
     *
     * @param     mixed $cycle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByCycle($cycle = null, $comparison = null)
    {
        if (is_array($cycle)) {
            $useMinMax = false;
            if (isset($cycle['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_CYCLE, $cycle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cycle['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_CYCLE, $cycle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_CYCLE, $cycle, $comparison);
    }

    /**
     * Filter the query on the ambonus2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAmbonus2(1234); // WHERE ambonus2 = 1234
     * $query->filterByAmbonus2(array(12, 34)); // WHERE ambonus2 IN (12, 34)
     * $query->filterByAmbonus2(array('min' => 12)); // WHERE ambonus2 > 12
     * </code>
     *
     * @param     mixed $ambonus2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByAmbonus2($ambonus2 = null, $comparison = null)
    {
        if (is_array($ambonus2)) {
            $useMinMax = false;
            if (isset($ambonus2['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_AMBONUS2, $ambonus2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ambonus2['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_AMBONUS2, $ambonus2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_AMBONUS2, $ambonus2, $comparison);
    }

    /**
     * Filter the query on the fmbonus column
     *
     * Example usage:
     * <code>
     * $query->filterByFmbonus(1234); // WHERE fmbonus = 1234
     * $query->filterByFmbonus(array(12, 34)); // WHERE fmbonus IN (12, 34)
     * $query->filterByFmbonus(array('min' => 12)); // WHERE fmbonus > 12
     * </code>
     *
     * @param     mixed $fmbonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByFmbonus($fmbonus = null, $comparison = null)
    {
        if (is_array($fmbonus)) {
            $useMinMax = false;
            if (isset($fmbonus['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_FMBONUS, $fmbonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fmbonus['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_FMBONUS, $fmbonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_FMBONUS, $fmbonus, $comparison);
    }

    /**
     * Filter the query on the unilevel column
     *
     * Example usage:
     * <code>
     * $query->filterByUnilevel(1234); // WHERE unilevel = 1234
     * $query->filterByUnilevel(array(12, 34)); // WHERE unilevel IN (12, 34)
     * $query->filterByUnilevel(array('min' => 12)); // WHERE unilevel > 12
     * </code>
     *
     * @param     mixed $unilevel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByUnilevel($unilevel = null, $comparison = null)
    {
        if (is_array($unilevel)) {
            $useMinMax = false;
            if (isset($unilevel['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_UNILEVEL, $unilevel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unilevel['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_UNILEVEL, $unilevel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_UNILEVEL, $unilevel, $comparison);
    }

    /**
     * Filter the query on the adjust column
     *
     * Example usage:
     * <code>
     * $query->filterByAdjust(1234); // WHERE adjust = 1234
     * $query->filterByAdjust(array(12, 34)); // WHERE adjust IN (12, 34)
     * $query->filterByAdjust(array('min' => 12)); // WHERE adjust > 12
     * </code>
     *
     * @param     mixed $adjust The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByAdjust($adjust = null, $comparison = null)
    {
        if (is_array($adjust)) {
            $useMinMax = false;
            if (isset($adjust['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_ADJUST, $adjust['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adjust['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_ADJUST, $adjust['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_ADJUST, $adjust, $comparison);
    }

    /**
     * Filter the query on the autoship column
     *
     * Example usage:
     * <code>
     * $query->filterByAutoship(1234); // WHERE autoship = 1234
     * $query->filterByAutoship(array(12, 34)); // WHERE autoship IN (12, 34)
     * $query->filterByAutoship(array('min' => 12)); // WHERE autoship > 12
     * </code>
     *
     * @param     mixed $autoship The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByAutoship($autoship = null, $comparison = null)
    {
        if (is_array($autoship)) {
            $useMinMax = false;
            if (isset($autoship['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_AUTOSHIP, $autoship['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($autoship['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_AUTOSHIP, $autoship['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_AUTOSHIP, $autoship, $comparison);
    }

    /**
     * Filter the query on the ewallet_withdraw column
     *
     * Example usage:
     * <code>
     * $query->filterByEwalletWithdraw(1234); // WHERE ewallet_withdraw = 1234
     * $query->filterByEwalletWithdraw(array(12, 34)); // WHERE ewallet_withdraw IN (12, 34)
     * $query->filterByEwalletWithdraw(array('min' => 12)); // WHERE ewallet_withdraw > 12
     * </code>
     *
     * @param     mixed $ewalletWithdraw The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByEwalletWithdraw($ewalletWithdraw = null, $comparison = null)
    {
        if (is_array($ewalletWithdraw)) {
            $useMinMax = false;
            if (isset($ewalletWithdraw['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_EWALLET_WITHDRAW, $ewalletWithdraw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewalletWithdraw['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_EWALLET_WITHDRAW, $ewalletWithdraw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_EWALLET_WITHDRAW, $ewalletWithdraw, $comparison);
    }

    /**
     * Filter the query on the tot_tax column
     *
     * Example usage:
     * <code>
     * $query->filterByTotTax(1234); // WHERE tot_tax = 1234
     * $query->filterByTotTax(array(12, 34)); // WHERE tot_tax IN (12, 34)
     * $query->filterByTotTax(array('min' => 12)); // WHERE tot_tax > 12
     * </code>
     *
     * @param     mixed $totTax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByTotTax($totTax = null, $comparison = null)
    {
        if (is_array($totTax)) {
            $useMinMax = false;
            if (isset($totTax['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_TOT_TAX, $totTax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totTax['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_TOT_TAX, $totTax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_TOT_TAX, $totTax, $comparison);
    }

    /**
     * Filter the query on the pv column
     *
     * Example usage:
     * <code>
     * $query->filterByPv(1234); // WHERE pv = 1234
     * $query->filterByPv(array(12, 34)); // WHERE pv IN (12, 34)
     * $query->filterByPv(array('min' => 12)); // WHERE pv > 12
     * </code>
     *
     * @param     mixed $pv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (is_array($paydate)) {
            $useMinMax = false;
            if (isset($paydate['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_PAYDATE, $paydate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paydate['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_PAYDATE, $paydate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_PAYDATE, $paydate, $comparison);
    }

    /**
     * Filter the query on the date_change column
     *
     * Example usage:
     * <code>
     * $query->filterByDateChange('2011-03-14'); // WHERE date_change = '2011-03-14'
     * $query->filterByDateChange('now'); // WHERE date_change = '2011-03-14'
     * $query->filterByDateChange(array('max' => 'yesterday')); // WHERE date_change > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateChange The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByDateChange($dateChange = null, $comparison = null)
    {
        if (is_array($dateChange)) {
            $useMinMax = false;
            if (isset($dateChange['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_DATE_CHANGE, $dateChange['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateChange['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_DATE_CHANGE, $dateChange['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_DATE_CHANGE, $dateChange, $comparison);
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
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByComTransferChagre($comTransferChagre = null, $comparison = null)
    {
        if (is_array($comTransferChagre)) {
            $useMinMax = false;
            if (isset($comTransferChagre['min'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_COM_TRANSFER_CHAGRE, $comTransferChagre['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($comTransferChagre['max'])) {
                $this->addUsingAlias(AliLogChangeTableMap::COL_COM_TRANSFER_CHAGRE, $comTransferChagre['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_COM_TRANSFER_CHAGRE, $comTransferChagre, $comparison);
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
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogChangeTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliLogChange $aliLogChange Object to remove from the list of results
     *
     * @return $this|ChildAliLogChangeQuery The current query, for fluid interface
     */
    public function prune($aliLogChange = null)
    {
        if ($aliLogChange) {
            $this->addUsingAlias(AliLogChangeTableMap::COL_ID, $aliLogChange->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_log_change table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogChangeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliLogChangeTableMap::clearInstancePool();
            AliLogChangeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogChangeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliLogChangeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliLogChangeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliLogChangeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliLogChangeQuery
