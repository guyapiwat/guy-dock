<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliGlobal as ChildAliGlobal;
use CciOrm\CciOrm\AliGlobalQuery as ChildAliGlobalQuery;
use CciOrm\CciOrm\Map\AliGlobalTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_global' table.
 *
 *
 *
 * @method     ChildAliGlobalQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliGlobalQuery orderByNumofchild($order = Criteria::ASC) Order by the numofchild column
 * @method     ChildAliGlobalQuery orderByTreeformat($order = Criteria::ASC) Order by the treeformat column
 * @method     ChildAliGlobalQuery orderByNumoflevel($order = Criteria::ASC) Order by the numoflevel column
 * @method     ChildAliGlobalQuery orderByStatusformat($order = Criteria::ASC) Order by the statusformat column
 * @method     ChildAliGlobalQuery orderByStatusMember($order = Criteria::ASC) Order by the status_member column
 * @method     ChildAliGlobalQuery orderByStatusMemberRemark($order = Criteria::ASC) Order by the status_member_remark column
 * @method     ChildAliGlobalQuery orderByStatusRegisMb($order = Criteria::ASC) Order by the status_regis_mb column
 * @method     ChildAliGlobalQuery orderByStatusRegisMbRemark($order = Criteria::ASC) Order by the status_regis_mb_remark column
 * @method     ChildAliGlobalQuery orderByStatusSaleMb($order = Criteria::ASC) Order by the status_sale_mb column
 * @method     ChildAliGlobalQuery orderByStatusSaleMbRemark($order = Criteria::ASC) Order by the status_sale_mb_remark column
 * @method     ChildAliGlobalQuery orderByStatusSwapMb($order = Criteria::ASC) Order by the status_swap_mb column
 * @method     ChildAliGlobalQuery orderByStatusSwapMbRemark($order = Criteria::ASC) Order by the status_swap_mb_remark column
 * @method     ChildAliGlobalQuery orderByStatusHoldMb($order = Criteria::ASC) Order by the status_hold_mb column
 * @method     ChildAliGlobalQuery orderByStatusHoldMbRemark($order = Criteria::ASC) Order by the status_hold_mb_remark column
 * @method     ChildAliGlobalQuery orderByStatusRemark($order = Criteria::ASC) Order by the status_remark column
 * @method     ChildAliGlobalQuery orderByStatusewallet($order = Criteria::ASC) Order by the statusewallet column
 * @method     ChildAliGlobalQuery orderByVipExp($order = Criteria::ASC) Order by the vip_exp column
 * @method     ChildAliGlobalQuery orderByStatusCron($order = Criteria::ASC) Order by the status_cron column
 *
 * @method     ChildAliGlobalQuery groupById() Group by the id column
 * @method     ChildAliGlobalQuery groupByNumofchild() Group by the numofchild column
 * @method     ChildAliGlobalQuery groupByTreeformat() Group by the treeformat column
 * @method     ChildAliGlobalQuery groupByNumoflevel() Group by the numoflevel column
 * @method     ChildAliGlobalQuery groupByStatusformat() Group by the statusformat column
 * @method     ChildAliGlobalQuery groupByStatusMember() Group by the status_member column
 * @method     ChildAliGlobalQuery groupByStatusMemberRemark() Group by the status_member_remark column
 * @method     ChildAliGlobalQuery groupByStatusRegisMb() Group by the status_regis_mb column
 * @method     ChildAliGlobalQuery groupByStatusRegisMbRemark() Group by the status_regis_mb_remark column
 * @method     ChildAliGlobalQuery groupByStatusSaleMb() Group by the status_sale_mb column
 * @method     ChildAliGlobalQuery groupByStatusSaleMbRemark() Group by the status_sale_mb_remark column
 * @method     ChildAliGlobalQuery groupByStatusSwapMb() Group by the status_swap_mb column
 * @method     ChildAliGlobalQuery groupByStatusSwapMbRemark() Group by the status_swap_mb_remark column
 * @method     ChildAliGlobalQuery groupByStatusHoldMb() Group by the status_hold_mb column
 * @method     ChildAliGlobalQuery groupByStatusHoldMbRemark() Group by the status_hold_mb_remark column
 * @method     ChildAliGlobalQuery groupByStatusRemark() Group by the status_remark column
 * @method     ChildAliGlobalQuery groupByStatusewallet() Group by the statusewallet column
 * @method     ChildAliGlobalQuery groupByVipExp() Group by the vip_exp column
 * @method     ChildAliGlobalQuery groupByStatusCron() Group by the status_cron column
 *
 * @method     ChildAliGlobalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliGlobalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliGlobalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliGlobalQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliGlobalQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliGlobalQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliGlobal findOne(ConnectionInterface $con = null) Return the first ChildAliGlobal matching the query
 * @method     ChildAliGlobal findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliGlobal matching the query, or a new ChildAliGlobal object populated from the query conditions when no match is found
 *
 * @method     ChildAliGlobal findOneById(int $id) Return the first ChildAliGlobal filtered by the id column
 * @method     ChildAliGlobal findOneByNumofchild(int $numofchild) Return the first ChildAliGlobal filtered by the numofchild column
 * @method     ChildAliGlobal findOneByTreeformat(string $treeformat) Return the first ChildAliGlobal filtered by the treeformat column
 * @method     ChildAliGlobal findOneByNumoflevel(int $numoflevel) Return the first ChildAliGlobal filtered by the numoflevel column
 * @method     ChildAliGlobal findOneByStatusformat(string $statusformat) Return the first ChildAliGlobal filtered by the statusformat column
 * @method     ChildAliGlobal findOneByStatusMember(int $status_member) Return the first ChildAliGlobal filtered by the status_member column
 * @method     ChildAliGlobal findOneByStatusMemberRemark(string $status_member_remark) Return the first ChildAliGlobal filtered by the status_member_remark column
 * @method     ChildAliGlobal findOneByStatusRegisMb(int $status_regis_mb) Return the first ChildAliGlobal filtered by the status_regis_mb column
 * @method     ChildAliGlobal findOneByStatusRegisMbRemark(string $status_regis_mb_remark) Return the first ChildAliGlobal filtered by the status_regis_mb_remark column
 * @method     ChildAliGlobal findOneByStatusSaleMb(int $status_sale_mb) Return the first ChildAliGlobal filtered by the status_sale_mb column
 * @method     ChildAliGlobal findOneByStatusSaleMbRemark(string $status_sale_mb_remark) Return the first ChildAliGlobal filtered by the status_sale_mb_remark column
 * @method     ChildAliGlobal findOneByStatusSwapMb(int $status_swap_mb) Return the first ChildAliGlobal filtered by the status_swap_mb column
 * @method     ChildAliGlobal findOneByStatusSwapMbRemark(string $status_swap_mb_remark) Return the first ChildAliGlobal filtered by the status_swap_mb_remark column
 * @method     ChildAliGlobal findOneByStatusHoldMb(int $status_hold_mb) Return the first ChildAliGlobal filtered by the status_hold_mb column
 * @method     ChildAliGlobal findOneByStatusHoldMbRemark(string $status_hold_mb_remark) Return the first ChildAliGlobal filtered by the status_hold_mb_remark column
 * @method     ChildAliGlobal findOneByStatusRemark(string $status_remark) Return the first ChildAliGlobal filtered by the status_remark column
 * @method     ChildAliGlobal findOneByStatusewallet(string $statusewallet) Return the first ChildAliGlobal filtered by the statusewallet column
 * @method     ChildAliGlobal findOneByVipExp(int $vip_exp) Return the first ChildAliGlobal filtered by the vip_exp column
 * @method     ChildAliGlobal findOneByStatusCron(int $status_cron) Return the first ChildAliGlobal filtered by the status_cron column *

 * @method     ChildAliGlobal requirePk($key, ConnectionInterface $con = null) Return the ChildAliGlobal by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOne(ConnectionInterface $con = null) Return the first ChildAliGlobal matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliGlobal requireOneById(int $id) Return the first ChildAliGlobal filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByNumofchild(int $numofchild) Return the first ChildAliGlobal filtered by the numofchild column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByTreeformat(string $treeformat) Return the first ChildAliGlobal filtered by the treeformat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByNumoflevel(int $numoflevel) Return the first ChildAliGlobal filtered by the numoflevel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusformat(string $statusformat) Return the first ChildAliGlobal filtered by the statusformat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusMember(int $status_member) Return the first ChildAliGlobal filtered by the status_member column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusMemberRemark(string $status_member_remark) Return the first ChildAliGlobal filtered by the status_member_remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusRegisMb(int $status_regis_mb) Return the first ChildAliGlobal filtered by the status_regis_mb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusRegisMbRemark(string $status_regis_mb_remark) Return the first ChildAliGlobal filtered by the status_regis_mb_remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusSaleMb(int $status_sale_mb) Return the first ChildAliGlobal filtered by the status_sale_mb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusSaleMbRemark(string $status_sale_mb_remark) Return the first ChildAliGlobal filtered by the status_sale_mb_remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusSwapMb(int $status_swap_mb) Return the first ChildAliGlobal filtered by the status_swap_mb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusSwapMbRemark(string $status_swap_mb_remark) Return the first ChildAliGlobal filtered by the status_swap_mb_remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusHoldMb(int $status_hold_mb) Return the first ChildAliGlobal filtered by the status_hold_mb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusHoldMbRemark(string $status_hold_mb_remark) Return the first ChildAliGlobal filtered by the status_hold_mb_remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusRemark(string $status_remark) Return the first ChildAliGlobal filtered by the status_remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusewallet(string $statusewallet) Return the first ChildAliGlobal filtered by the statusewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByVipExp(int $vip_exp) Return the first ChildAliGlobal filtered by the vip_exp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGlobal requireOneByStatusCron(int $status_cron) Return the first ChildAliGlobal filtered by the status_cron column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliGlobal[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliGlobal objects based on current ModelCriteria
 * @method     ChildAliGlobal[]|ObjectCollection findById(int $id) Return ChildAliGlobal objects filtered by the id column
 * @method     ChildAliGlobal[]|ObjectCollection findByNumofchild(int $numofchild) Return ChildAliGlobal objects filtered by the numofchild column
 * @method     ChildAliGlobal[]|ObjectCollection findByTreeformat(string $treeformat) Return ChildAliGlobal objects filtered by the treeformat column
 * @method     ChildAliGlobal[]|ObjectCollection findByNumoflevel(int $numoflevel) Return ChildAliGlobal objects filtered by the numoflevel column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusformat(string $statusformat) Return ChildAliGlobal objects filtered by the statusformat column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusMember(int $status_member) Return ChildAliGlobal objects filtered by the status_member column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusMemberRemark(string $status_member_remark) Return ChildAliGlobal objects filtered by the status_member_remark column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusRegisMb(int $status_regis_mb) Return ChildAliGlobal objects filtered by the status_regis_mb column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusRegisMbRemark(string $status_regis_mb_remark) Return ChildAliGlobal objects filtered by the status_regis_mb_remark column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusSaleMb(int $status_sale_mb) Return ChildAliGlobal objects filtered by the status_sale_mb column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusSaleMbRemark(string $status_sale_mb_remark) Return ChildAliGlobal objects filtered by the status_sale_mb_remark column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusSwapMb(int $status_swap_mb) Return ChildAliGlobal objects filtered by the status_swap_mb column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusSwapMbRemark(string $status_swap_mb_remark) Return ChildAliGlobal objects filtered by the status_swap_mb_remark column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusHoldMb(int $status_hold_mb) Return ChildAliGlobal objects filtered by the status_hold_mb column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusHoldMbRemark(string $status_hold_mb_remark) Return ChildAliGlobal objects filtered by the status_hold_mb_remark column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusRemark(string $status_remark) Return ChildAliGlobal objects filtered by the status_remark column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusewallet(string $statusewallet) Return ChildAliGlobal objects filtered by the statusewallet column
 * @method     ChildAliGlobal[]|ObjectCollection findByVipExp(int $vip_exp) Return ChildAliGlobal objects filtered by the vip_exp column
 * @method     ChildAliGlobal[]|ObjectCollection findByStatusCron(int $status_cron) Return ChildAliGlobal objects filtered by the status_cron column
 * @method     ChildAliGlobal[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliGlobalQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliGlobalQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliGlobal', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliGlobalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliGlobalQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliGlobalQuery) {
            return $criteria;
        }
        $query = new ChildAliGlobalQuery();
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
     * @return ChildAliGlobal|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliGlobalTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliGlobalTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliGlobal A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, numofchild, treeformat, numoflevel, statusformat, status_member, status_member_remark, status_regis_mb, status_regis_mb_remark, status_sale_mb, status_sale_mb_remark, status_swap_mb, status_swap_mb_remark, status_hold_mb, status_hold_mb_remark, status_remark, statusewallet, vip_exp, status_cron FROM ali_global WHERE id = :p0';
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
            /** @var ChildAliGlobal $obj */
            $obj = new ChildAliGlobal();
            $obj->hydrate($row);
            AliGlobalTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliGlobal|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliGlobalTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliGlobalTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the numofchild column
     *
     * Example usage:
     * <code>
     * $query->filterByNumofchild(1234); // WHERE numofchild = 1234
     * $query->filterByNumofchild(array(12, 34)); // WHERE numofchild IN (12, 34)
     * $query->filterByNumofchild(array('min' => 12)); // WHERE numofchild > 12
     * </code>
     *
     * @param     mixed $numofchild The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByNumofchild($numofchild = null, $comparison = null)
    {
        if (is_array($numofchild)) {
            $useMinMax = false;
            if (isset($numofchild['min'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_NUMOFCHILD, $numofchild['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numofchild['max'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_NUMOFCHILD, $numofchild['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_NUMOFCHILD, $numofchild, $comparison);
    }

    /**
     * Filter the query on the treeformat column
     *
     * Example usage:
     * <code>
     * $query->filterByTreeformat('fooValue');   // WHERE treeformat = 'fooValue'
     * $query->filterByTreeformat('%fooValue%', Criteria::LIKE); // WHERE treeformat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $treeformat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByTreeformat($treeformat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($treeformat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_TREEFORMAT, $treeformat, $comparison);
    }

    /**
     * Filter the query on the numoflevel column
     *
     * Example usage:
     * <code>
     * $query->filterByNumoflevel(1234); // WHERE numoflevel = 1234
     * $query->filterByNumoflevel(array(12, 34)); // WHERE numoflevel IN (12, 34)
     * $query->filterByNumoflevel(array('min' => 12)); // WHERE numoflevel > 12
     * </code>
     *
     * @param     mixed $numoflevel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByNumoflevel($numoflevel = null, $comparison = null)
    {
        if (is_array($numoflevel)) {
            $useMinMax = false;
            if (isset($numoflevel['min'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_NUMOFLEVEL, $numoflevel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numoflevel['max'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_NUMOFLEVEL, $numoflevel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_NUMOFLEVEL, $numoflevel, $comparison);
    }

    /**
     * Filter the query on the statusformat column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusformat('fooValue');   // WHERE statusformat = 'fooValue'
     * $query->filterByStatusformat('%fooValue%', Criteria::LIKE); // WHERE statusformat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statusformat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusformat($statusformat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statusformat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUSFORMAT, $statusformat, $comparison);
    }

    /**
     * Filter the query on the status_member column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusMember(1234); // WHERE status_member = 1234
     * $query->filterByStatusMember(array(12, 34)); // WHERE status_member IN (12, 34)
     * $query->filterByStatusMember(array('min' => 12)); // WHERE status_member > 12
     * </code>
     *
     * @param     mixed $statusMember The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusMember($statusMember = null, $comparison = null)
    {
        if (is_array($statusMember)) {
            $useMinMax = false;
            if (isset($statusMember['min'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_MEMBER, $statusMember['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusMember['max'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_MEMBER, $statusMember['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_MEMBER, $statusMember, $comparison);
    }

    /**
     * Filter the query on the status_member_remark column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusMemberRemark('fooValue');   // WHERE status_member_remark = 'fooValue'
     * $query->filterByStatusMemberRemark('%fooValue%', Criteria::LIKE); // WHERE status_member_remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statusMemberRemark The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusMemberRemark($statusMemberRemark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statusMemberRemark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_MEMBER_REMARK, $statusMemberRemark, $comparison);
    }

    /**
     * Filter the query on the status_regis_mb column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusRegisMb(1234); // WHERE status_regis_mb = 1234
     * $query->filterByStatusRegisMb(array(12, 34)); // WHERE status_regis_mb IN (12, 34)
     * $query->filterByStatusRegisMb(array('min' => 12)); // WHERE status_regis_mb > 12
     * </code>
     *
     * @param     mixed $statusRegisMb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusRegisMb($statusRegisMb = null, $comparison = null)
    {
        if (is_array($statusRegisMb)) {
            $useMinMax = false;
            if (isset($statusRegisMb['min'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_REGIS_MB, $statusRegisMb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusRegisMb['max'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_REGIS_MB, $statusRegisMb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_REGIS_MB, $statusRegisMb, $comparison);
    }

    /**
     * Filter the query on the status_regis_mb_remark column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusRegisMbRemark('fooValue');   // WHERE status_regis_mb_remark = 'fooValue'
     * $query->filterByStatusRegisMbRemark('%fooValue%', Criteria::LIKE); // WHERE status_regis_mb_remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statusRegisMbRemark The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusRegisMbRemark($statusRegisMbRemark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statusRegisMbRemark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_REGIS_MB_REMARK, $statusRegisMbRemark, $comparison);
    }

    /**
     * Filter the query on the status_sale_mb column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusSaleMb(1234); // WHERE status_sale_mb = 1234
     * $query->filterByStatusSaleMb(array(12, 34)); // WHERE status_sale_mb IN (12, 34)
     * $query->filterByStatusSaleMb(array('min' => 12)); // WHERE status_sale_mb > 12
     * </code>
     *
     * @param     mixed $statusSaleMb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusSaleMb($statusSaleMb = null, $comparison = null)
    {
        if (is_array($statusSaleMb)) {
            $useMinMax = false;
            if (isset($statusSaleMb['min'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_SALE_MB, $statusSaleMb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusSaleMb['max'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_SALE_MB, $statusSaleMb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_SALE_MB, $statusSaleMb, $comparison);
    }

    /**
     * Filter the query on the status_sale_mb_remark column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusSaleMbRemark('fooValue');   // WHERE status_sale_mb_remark = 'fooValue'
     * $query->filterByStatusSaleMbRemark('%fooValue%', Criteria::LIKE); // WHERE status_sale_mb_remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statusSaleMbRemark The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusSaleMbRemark($statusSaleMbRemark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statusSaleMbRemark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_SALE_MB_REMARK, $statusSaleMbRemark, $comparison);
    }

    /**
     * Filter the query on the status_swap_mb column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusSwapMb(1234); // WHERE status_swap_mb = 1234
     * $query->filterByStatusSwapMb(array(12, 34)); // WHERE status_swap_mb IN (12, 34)
     * $query->filterByStatusSwapMb(array('min' => 12)); // WHERE status_swap_mb > 12
     * </code>
     *
     * @param     mixed $statusSwapMb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusSwapMb($statusSwapMb = null, $comparison = null)
    {
        if (is_array($statusSwapMb)) {
            $useMinMax = false;
            if (isset($statusSwapMb['min'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_SWAP_MB, $statusSwapMb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusSwapMb['max'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_SWAP_MB, $statusSwapMb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_SWAP_MB, $statusSwapMb, $comparison);
    }

    /**
     * Filter the query on the status_swap_mb_remark column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusSwapMbRemark('fooValue');   // WHERE status_swap_mb_remark = 'fooValue'
     * $query->filterByStatusSwapMbRemark('%fooValue%', Criteria::LIKE); // WHERE status_swap_mb_remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statusSwapMbRemark The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusSwapMbRemark($statusSwapMbRemark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statusSwapMbRemark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_SWAP_MB_REMARK, $statusSwapMbRemark, $comparison);
    }

    /**
     * Filter the query on the status_hold_mb column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusHoldMb(1234); // WHERE status_hold_mb = 1234
     * $query->filterByStatusHoldMb(array(12, 34)); // WHERE status_hold_mb IN (12, 34)
     * $query->filterByStatusHoldMb(array('min' => 12)); // WHERE status_hold_mb > 12
     * </code>
     *
     * @param     mixed $statusHoldMb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusHoldMb($statusHoldMb = null, $comparison = null)
    {
        if (is_array($statusHoldMb)) {
            $useMinMax = false;
            if (isset($statusHoldMb['min'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_HOLD_MB, $statusHoldMb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusHoldMb['max'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_HOLD_MB, $statusHoldMb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_HOLD_MB, $statusHoldMb, $comparison);
    }

    /**
     * Filter the query on the status_hold_mb_remark column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusHoldMbRemark('fooValue');   // WHERE status_hold_mb_remark = 'fooValue'
     * $query->filterByStatusHoldMbRemark('%fooValue%', Criteria::LIKE); // WHERE status_hold_mb_remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statusHoldMbRemark The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusHoldMbRemark($statusHoldMbRemark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statusHoldMbRemark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_HOLD_MB_REMARK, $statusHoldMbRemark, $comparison);
    }

    /**
     * Filter the query on the status_remark column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusRemark('fooValue');   // WHERE status_remark = 'fooValue'
     * $query->filterByStatusRemark('%fooValue%', Criteria::LIKE); // WHERE status_remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statusRemark The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusRemark($statusRemark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statusRemark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_REMARK, $statusRemark, $comparison);
    }

    /**
     * Filter the query on the statusewallet column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusewallet('fooValue');   // WHERE statusewallet = 'fooValue'
     * $query->filterByStatusewallet('%fooValue%', Criteria::LIKE); // WHERE statusewallet LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statusewallet The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusewallet($statusewallet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statusewallet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUSEWALLET, $statusewallet, $comparison);
    }

    /**
     * Filter the query on the vip_exp column
     *
     * Example usage:
     * <code>
     * $query->filterByVipExp(1234); // WHERE vip_exp = 1234
     * $query->filterByVipExp(array(12, 34)); // WHERE vip_exp IN (12, 34)
     * $query->filterByVipExp(array('min' => 12)); // WHERE vip_exp > 12
     * </code>
     *
     * @param     mixed $vipExp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByVipExp($vipExp = null, $comparison = null)
    {
        if (is_array($vipExp)) {
            $useMinMax = false;
            if (isset($vipExp['min'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_VIP_EXP, $vipExp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vipExp['max'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_VIP_EXP, $vipExp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_VIP_EXP, $vipExp, $comparison);
    }

    /**
     * Filter the query on the status_cron column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusCron(1234); // WHERE status_cron = 1234
     * $query->filterByStatusCron(array(12, 34)); // WHERE status_cron IN (12, 34)
     * $query->filterByStatusCron(array('min' => 12)); // WHERE status_cron > 12
     * </code>
     *
     * @param     mixed $statusCron The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function filterByStatusCron($statusCron = null, $comparison = null)
    {
        if (is_array($statusCron)) {
            $useMinMax = false;
            if (isset($statusCron['min'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_CRON, $statusCron['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusCron['max'])) {
                $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_CRON, $statusCron['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGlobalTableMap::COL_STATUS_CRON, $statusCron, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliGlobal $aliGlobal Object to remove from the list of results
     *
     * @return $this|ChildAliGlobalQuery The current query, for fluid interface
     */
    public function prune($aliGlobal = null)
    {
        if ($aliGlobal) {
            $this->addUsingAlias(AliGlobalTableMap::COL_ID, $aliGlobal->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_global table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliGlobalTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliGlobalTableMap::clearInstancePool();
            AliGlobalTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliGlobalTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliGlobalTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliGlobalTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliGlobalTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliGlobalQuery
