<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\TblActivityTh as ChildTblActivityTh;
use CciOrm\CciOrm\TblActivityThQuery as ChildTblActivityThQuery;
use CciOrm\CciOrm\Map\TblActivityThTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tbl_activity_th' table.
 *
 *
 *
 * @method     ChildTblActivityThQuery orderByActId($order = Criteria::ASC) Order by the act_id column
 * @method     ChildTblActivityThQuery orderByShort($order = Criteria::ASC) Order by the short column
 * @method     ChildTblActivityThQuery orderByActName($order = Criteria::ASC) Order by the act_name column
 * @method     ChildTblActivityThQuery orderByDescS($order = Criteria::ASC) Order by the desc_s column
 * @method     ChildTblActivityThQuery orderByDescL($order = Criteria::ASC) Order by the desc_l column
 * @method     ChildTblActivityThQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildTblActivityThQuery orderByImageslide($order = Criteria::ASC) Order by the imageSlide column
 * @method     ChildTblActivityThQuery orderByStartDate($order = Criteria::ASC) Order by the start_date column
 * @method     ChildTblActivityThQuery orderByEndDate($order = Criteria::ASC) Order by the end_date column
 * @method     ChildTblActivityThQuery orderBySlideshow($order = Criteria::ASC) Order by the slideshow column
 *
 * @method     ChildTblActivityThQuery groupByActId() Group by the act_id column
 * @method     ChildTblActivityThQuery groupByShort() Group by the short column
 * @method     ChildTblActivityThQuery groupByActName() Group by the act_name column
 * @method     ChildTblActivityThQuery groupByDescS() Group by the desc_s column
 * @method     ChildTblActivityThQuery groupByDescL() Group by the desc_l column
 * @method     ChildTblActivityThQuery groupByImage() Group by the image column
 * @method     ChildTblActivityThQuery groupByImageslide() Group by the imageSlide column
 * @method     ChildTblActivityThQuery groupByStartDate() Group by the start_date column
 * @method     ChildTblActivityThQuery groupByEndDate() Group by the end_date column
 * @method     ChildTblActivityThQuery groupBySlideshow() Group by the slideshow column
 *
 * @method     ChildTblActivityThQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblActivityThQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblActivityThQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblActivityThQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblActivityThQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblActivityThQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblActivityTh findOne(ConnectionInterface $con = null) Return the first ChildTblActivityTh matching the query
 * @method     ChildTblActivityTh findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblActivityTh matching the query, or a new ChildTblActivityTh object populated from the query conditions when no match is found
 *
 * @method     ChildTblActivityTh findOneByActId(int $act_id) Return the first ChildTblActivityTh filtered by the act_id column
 * @method     ChildTblActivityTh findOneByShort(string $short) Return the first ChildTblActivityTh filtered by the short column
 * @method     ChildTblActivityTh findOneByActName(string $act_name) Return the first ChildTblActivityTh filtered by the act_name column
 * @method     ChildTblActivityTh findOneByDescS(string $desc_s) Return the first ChildTblActivityTh filtered by the desc_s column
 * @method     ChildTblActivityTh findOneByDescL(string $desc_l) Return the first ChildTblActivityTh filtered by the desc_l column
 * @method     ChildTblActivityTh findOneByImage(string $image) Return the first ChildTblActivityTh filtered by the image column
 * @method     ChildTblActivityTh findOneByImageslide(string $imageSlide) Return the first ChildTblActivityTh filtered by the imageSlide column
 * @method     ChildTblActivityTh findOneByStartDate(string $start_date) Return the first ChildTblActivityTh filtered by the start_date column
 * @method     ChildTblActivityTh findOneByEndDate(string $end_date) Return the first ChildTblActivityTh filtered by the end_date column
 * @method     ChildTblActivityTh findOneBySlideshow(string $slideshow) Return the first ChildTblActivityTh filtered by the slideshow column *

 * @method     ChildTblActivityTh requirePk($key, ConnectionInterface $con = null) Return the ChildTblActivityTh by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityTh requireOne(ConnectionInterface $con = null) Return the first ChildTblActivityTh matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblActivityTh requireOneByActId(int $act_id) Return the first ChildTblActivityTh filtered by the act_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityTh requireOneByShort(string $short) Return the first ChildTblActivityTh filtered by the short column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityTh requireOneByActName(string $act_name) Return the first ChildTblActivityTh filtered by the act_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityTh requireOneByDescS(string $desc_s) Return the first ChildTblActivityTh filtered by the desc_s column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityTh requireOneByDescL(string $desc_l) Return the first ChildTblActivityTh filtered by the desc_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityTh requireOneByImage(string $image) Return the first ChildTblActivityTh filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityTh requireOneByImageslide(string $imageSlide) Return the first ChildTblActivityTh filtered by the imageSlide column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityTh requireOneByStartDate(string $start_date) Return the first ChildTblActivityTh filtered by the start_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityTh requireOneByEndDate(string $end_date) Return the first ChildTblActivityTh filtered by the end_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityTh requireOneBySlideshow(string $slideshow) Return the first ChildTblActivityTh filtered by the slideshow column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblActivityTh[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblActivityTh objects based on current ModelCriteria
 * @method     ChildTblActivityTh[]|ObjectCollection findByActId(int $act_id) Return ChildTblActivityTh objects filtered by the act_id column
 * @method     ChildTblActivityTh[]|ObjectCollection findByShort(string $short) Return ChildTblActivityTh objects filtered by the short column
 * @method     ChildTblActivityTh[]|ObjectCollection findByActName(string $act_name) Return ChildTblActivityTh objects filtered by the act_name column
 * @method     ChildTblActivityTh[]|ObjectCollection findByDescS(string $desc_s) Return ChildTblActivityTh objects filtered by the desc_s column
 * @method     ChildTblActivityTh[]|ObjectCollection findByDescL(string $desc_l) Return ChildTblActivityTh objects filtered by the desc_l column
 * @method     ChildTblActivityTh[]|ObjectCollection findByImage(string $image) Return ChildTblActivityTh objects filtered by the image column
 * @method     ChildTblActivityTh[]|ObjectCollection findByImageslide(string $imageSlide) Return ChildTblActivityTh objects filtered by the imageSlide column
 * @method     ChildTblActivityTh[]|ObjectCollection findByStartDate(string $start_date) Return ChildTblActivityTh objects filtered by the start_date column
 * @method     ChildTblActivityTh[]|ObjectCollection findByEndDate(string $end_date) Return ChildTblActivityTh objects filtered by the end_date column
 * @method     ChildTblActivityTh[]|ObjectCollection findBySlideshow(string $slideshow) Return ChildTblActivityTh objects filtered by the slideshow column
 * @method     ChildTblActivityTh[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblActivityThQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\TblActivityThQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\TblActivityTh', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblActivityThQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblActivityThQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblActivityThQuery) {
            return $criteria;
        }
        $query = new ChildTblActivityThQuery();
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
     * @return ChildTblActivityTh|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblActivityThTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblActivityThTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblActivityTh A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT act_id, short, act_name, desc_s, desc_l, image, imageSlide, start_date, end_date, slideshow FROM tbl_activity_th WHERE act_id = :p0';
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
            /** @var ChildTblActivityTh $obj */
            $obj = new ChildTblActivityTh();
            $obj->hydrate($row);
            TblActivityThTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblActivityTh|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblActivityThQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblActivityThTableMap::COL_ACT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblActivityThQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblActivityThTableMap::COL_ACT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the act_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActId(1234); // WHERE act_id = 1234
     * $query->filterByActId(array(12, 34)); // WHERE act_id IN (12, 34)
     * $query->filterByActId(array('min' => 12)); // WHERE act_id > 12
     * </code>
     *
     * @param     mixed $actId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityThQuery The current query, for fluid interface
     */
    public function filterByActId($actId = null, $comparison = null)
    {
        if (is_array($actId)) {
            $useMinMax = false;
            if (isset($actId['min'])) {
                $this->addUsingAlias(TblActivityThTableMap::COL_ACT_ID, $actId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actId['max'])) {
                $this->addUsingAlias(TblActivityThTableMap::COL_ACT_ID, $actId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityThTableMap::COL_ACT_ID, $actId, $comparison);
    }

    /**
     * Filter the query on the short column
     *
     * Example usage:
     * <code>
     * $query->filterByShort('fooValue');   // WHERE short = 'fooValue'
     * $query->filterByShort('%fooValue%', Criteria::LIKE); // WHERE short LIKE '%fooValue%'
     * </code>
     *
     * @param     string $short The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityThQuery The current query, for fluid interface
     */
    public function filterByShort($short = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($short)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityThTableMap::COL_SHORT, $short, $comparison);
    }

    /**
     * Filter the query on the act_name column
     *
     * Example usage:
     * <code>
     * $query->filterByActName('fooValue');   // WHERE act_name = 'fooValue'
     * $query->filterByActName('%fooValue%', Criteria::LIKE); // WHERE act_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityThQuery The current query, for fluid interface
     */
    public function filterByActName($actName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityThTableMap::COL_ACT_NAME, $actName, $comparison);
    }

    /**
     * Filter the query on the desc_s column
     *
     * Example usage:
     * <code>
     * $query->filterByDescS('fooValue');   // WHERE desc_s = 'fooValue'
     * $query->filterByDescS('%fooValue%', Criteria::LIKE); // WHERE desc_s LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descS The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityThQuery The current query, for fluid interface
     */
    public function filterByDescS($descS = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descS)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityThTableMap::COL_DESC_S, $descS, $comparison);
    }

    /**
     * Filter the query on the desc_l column
     *
     * Example usage:
     * <code>
     * $query->filterByDescL('fooValue');   // WHERE desc_l = 'fooValue'
     * $query->filterByDescL('%fooValue%', Criteria::LIKE); // WHERE desc_l LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descL The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityThQuery The current query, for fluid interface
     */
    public function filterByDescL($descL = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descL)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityThTableMap::COL_DESC_L, $descL, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%', Criteria::LIKE); // WHERE image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityThQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityThTableMap::COL_IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the imageSlide column
     *
     * Example usage:
     * <code>
     * $query->filterByImageslide('fooValue');   // WHERE imageSlide = 'fooValue'
     * $query->filterByImageslide('%fooValue%', Criteria::LIKE); // WHERE imageSlide LIKE '%fooValue%'
     * </code>
     *
     * @param     string $imageslide The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityThQuery The current query, for fluid interface
     */
    public function filterByImageslide($imageslide = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imageslide)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityThTableMap::COL_IMAGESLIDE, $imageslide, $comparison);
    }

    /**
     * Filter the query on the start_date column
     *
     * Example usage:
     * <code>
     * $query->filterByStartDate('fooValue');   // WHERE start_date = 'fooValue'
     * $query->filterByStartDate('%fooValue%', Criteria::LIKE); // WHERE start_date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $startDate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityThQuery The current query, for fluid interface
     */
    public function filterByStartDate($startDate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($startDate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityThTableMap::COL_START_DATE, $startDate, $comparison);
    }

    /**
     * Filter the query on the end_date column
     *
     * Example usage:
     * <code>
     * $query->filterByEndDate('fooValue');   // WHERE end_date = 'fooValue'
     * $query->filterByEndDate('%fooValue%', Criteria::LIKE); // WHERE end_date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $endDate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityThQuery The current query, for fluid interface
     */
    public function filterByEndDate($endDate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($endDate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityThTableMap::COL_END_DATE, $endDate, $comparison);
    }

    /**
     * Filter the query on the slideshow column
     *
     * Example usage:
     * <code>
     * $query->filterBySlideshow('fooValue');   // WHERE slideshow = 'fooValue'
     * $query->filterBySlideshow('%fooValue%', Criteria::LIKE); // WHERE slideshow LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slideshow The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityThQuery The current query, for fluid interface
     */
    public function filterBySlideshow($slideshow = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slideshow)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityThTableMap::COL_SLIDESHOW, $slideshow, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblActivityTh $tblActivityTh Object to remove from the list of results
     *
     * @return $this|ChildTblActivityThQuery The current query, for fluid interface
     */
    public function prune($tblActivityTh = null)
    {
        if ($tblActivityTh) {
            $this->addUsingAlias(TblActivityThTableMap::COL_ACT_ID, $tblActivityTh->getActId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tbl_activity_th table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblActivityThTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblActivityThTableMap::clearInstancePool();
            TblActivityThTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblActivityThTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblActivityThTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblActivityThTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblActivityThTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblActivityThQuery
