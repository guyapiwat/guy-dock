<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliReportMember as ChildAliReportMember;
use CciOrm\CciOrm\AliReportMemberQuery as ChildAliReportMemberQuery;
use CciOrm\CciOrm\Map\AliReportMemberTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_report_member' table.
 *
 *
 *
 * @method     ChildAliReportMemberQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliReportMemberQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliReportMemberQuery orderByMdate($order = Criteria::ASC) Order by the mdate column
 * @method     ChildAliReportMemberQuery orderByExpdate($order = Criteria::ASC) Order by the expdate column
 * @method     ChildAliReportMemberQuery orderByPvdate($order = Criteria::ASC) Order by the pvdate column
 * @method     ChildAliReportMemberQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliReportMemberQuery orderByPosCur4($order = Criteria::ASC) Order by the pos_cur4 column
 * @method     ChildAliReportMemberQuery orderByPosCur2($order = Criteria::ASC) Order by the pos_cur2 column
 * @method     ChildAliReportMemberQuery orderByPosCur1($order = Criteria::ASC) Order by the pos_cur1 column
 * @method     ChildAliReportMemberQuery orderByNewMember($order = Criteria::ASC) Order by the new_member column
 * @method     ChildAliReportMemberQuery orderByNewSup($order = Criteria::ASC) Order by the new_sup column
 * @method     ChildAliReportMemberQuery orderByNewEx($order = Criteria::ASC) Order by the new_ex column
 * @method     ChildAliReportMemberQuery orderBySupEx($order = Criteria::ASC) Order by the sup_ex column
 * @method     ChildAliReportMemberQuery orderByPvmonth($order = Criteria::ASC) Order by the pvmonth column
 * @method     ChildAliReportMemberQuery orderByAutoTot($order = Criteria::ASC) Order by the auto_tot column
 * @method     ChildAliReportMemberQuery orderByPvL($order = Criteria::ASC) Order by the pv_l column
 * @method     ChildAliReportMemberQuery orderByPvC($order = Criteria::ASC) Order by the pv_c column
 * @method     ChildAliReportMemberQuery orderByTposCur($order = Criteria::ASC) Order by the tpos_cur column
 * @method     ChildAliReportMemberQuery orderBySpCode($order = Criteria::ASC) Order by the sp_code column
 * @method     ChildAliReportMemberQuery orderBySpName($order = Criteria::ASC) Order by the sp_name column
 * @method     ChildAliReportMemberQuery orderByLr($order = Criteria::ASC) Order by the lr column
 * @method     ChildAliReportMemberQuery orderByReport1($order = Criteria::ASC) Order by the report1 column
 * @method     ChildAliReportMemberQuery orderByStatusAto($order = Criteria::ASC) Order by the status_ato column
 * @method     ChildAliReportMemberQuery orderByStatusMember($order = Criteria::ASC) Order by the status_member column
 *
 * @method     ChildAliReportMemberQuery groupByMcode() Group by the mcode column
 * @method     ChildAliReportMemberQuery groupByNameT() Group by the name_t column
 * @method     ChildAliReportMemberQuery groupByMdate() Group by the mdate column
 * @method     ChildAliReportMemberQuery groupByExpdate() Group by the expdate column
 * @method     ChildAliReportMemberQuery groupByPvdate() Group by the pvdate column
 * @method     ChildAliReportMemberQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliReportMemberQuery groupByPosCur4() Group by the pos_cur4 column
 * @method     ChildAliReportMemberQuery groupByPosCur2() Group by the pos_cur2 column
 * @method     ChildAliReportMemberQuery groupByPosCur1() Group by the pos_cur1 column
 * @method     ChildAliReportMemberQuery groupByNewMember() Group by the new_member column
 * @method     ChildAliReportMemberQuery groupByNewSup() Group by the new_sup column
 * @method     ChildAliReportMemberQuery groupByNewEx() Group by the new_ex column
 * @method     ChildAliReportMemberQuery groupBySupEx() Group by the sup_ex column
 * @method     ChildAliReportMemberQuery groupByPvmonth() Group by the pvmonth column
 * @method     ChildAliReportMemberQuery groupByAutoTot() Group by the auto_tot column
 * @method     ChildAliReportMemberQuery groupByPvL() Group by the pv_l column
 * @method     ChildAliReportMemberQuery groupByPvC() Group by the pv_c column
 * @method     ChildAliReportMemberQuery groupByTposCur() Group by the tpos_cur column
 * @method     ChildAliReportMemberQuery groupBySpCode() Group by the sp_code column
 * @method     ChildAliReportMemberQuery groupBySpName() Group by the sp_name column
 * @method     ChildAliReportMemberQuery groupByLr() Group by the lr column
 * @method     ChildAliReportMemberQuery groupByReport1() Group by the report1 column
 * @method     ChildAliReportMemberQuery groupByStatusAto() Group by the status_ato column
 * @method     ChildAliReportMemberQuery groupByStatusMember() Group by the status_member column
 *
 * @method     ChildAliReportMemberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliReportMemberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliReportMemberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliReportMemberQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliReportMemberQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliReportMemberQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliReportMember findOne(ConnectionInterface $con = null) Return the first ChildAliReportMember matching the query
 * @method     ChildAliReportMember findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliReportMember matching the query, or a new ChildAliReportMember object populated from the query conditions when no match is found
 *
 * @method     ChildAliReportMember findOneByMcode(string $mcode) Return the first ChildAliReportMember filtered by the mcode column
 * @method     ChildAliReportMember findOneByNameT(string $name_t) Return the first ChildAliReportMember filtered by the name_t column
 * @method     ChildAliReportMember findOneByMdate(string $mdate) Return the first ChildAliReportMember filtered by the mdate column
 * @method     ChildAliReportMember findOneByExpdate(string $expdate) Return the first ChildAliReportMember filtered by the expdate column
 * @method     ChildAliReportMember findOneByPvdate(string $pvdate) Return the first ChildAliReportMember filtered by the pvdate column
 * @method     ChildAliReportMember findOneByPosCur(string $pos_cur) Return the first ChildAliReportMember filtered by the pos_cur column
 * @method     ChildAliReportMember findOneByPosCur4(string $pos_cur4) Return the first ChildAliReportMember filtered by the pos_cur4 column
 * @method     ChildAliReportMember findOneByPosCur2(string $pos_cur2) Return the first ChildAliReportMember filtered by the pos_cur2 column
 * @method     ChildAliReportMember findOneByPosCur1(string $pos_cur1) Return the first ChildAliReportMember filtered by the pos_cur1 column
 * @method     ChildAliReportMember findOneByNewMember(int $new_member) Return the first ChildAliReportMember filtered by the new_member column
 * @method     ChildAliReportMember findOneByNewSup(int $new_sup) Return the first ChildAliReportMember filtered by the new_sup column
 * @method     ChildAliReportMember findOneByNewEx(int $new_ex) Return the first ChildAliReportMember filtered by the new_ex column
 * @method     ChildAliReportMember findOneBySupEx(int $sup_ex) Return the first ChildAliReportMember filtered by the sup_ex column
 * @method     ChildAliReportMember findOneByPvmonth(int $pvmonth) Return the first ChildAliReportMember filtered by the pvmonth column
 * @method     ChildAliReportMember findOneByAutoTot(string $auto_tot) Return the first ChildAliReportMember filtered by the auto_tot column
 * @method     ChildAliReportMember findOneByPvL(int $pv_l) Return the first ChildAliReportMember filtered by the pv_l column
 * @method     ChildAliReportMember findOneByPvC(int $pv_c) Return the first ChildAliReportMember filtered by the pv_c column
 * @method     ChildAliReportMember findOneByTposCur(string $tpos_cur) Return the first ChildAliReportMember filtered by the tpos_cur column
 * @method     ChildAliReportMember findOneBySpCode(string $sp_code) Return the first ChildAliReportMember filtered by the sp_code column
 * @method     ChildAliReportMember findOneBySpName(string $sp_name) Return the first ChildAliReportMember filtered by the sp_name column
 * @method     ChildAliReportMember findOneByLr(int $lr) Return the first ChildAliReportMember filtered by the lr column
 * @method     ChildAliReportMember findOneByReport1(string $report1) Return the first ChildAliReportMember filtered by the report1 column
 * @method     ChildAliReportMember findOneByStatusAto(string $status_ato) Return the first ChildAliReportMember filtered by the status_ato column
 * @method     ChildAliReportMember findOneByStatusMember(string $status_member) Return the first ChildAliReportMember filtered by the status_member column *

 * @method     ChildAliReportMember requirePk($key, ConnectionInterface $con = null) Return the ChildAliReportMember by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOne(ConnectionInterface $con = null) Return the first ChildAliReportMember matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliReportMember requireOneByMcode(string $mcode) Return the first ChildAliReportMember filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByNameT(string $name_t) Return the first ChildAliReportMember filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByMdate(string $mdate) Return the first ChildAliReportMember filtered by the mdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByExpdate(string $expdate) Return the first ChildAliReportMember filtered by the expdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByPvdate(string $pvdate) Return the first ChildAliReportMember filtered by the pvdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByPosCur(string $pos_cur) Return the first ChildAliReportMember filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByPosCur4(string $pos_cur4) Return the first ChildAliReportMember filtered by the pos_cur4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByPosCur2(string $pos_cur2) Return the first ChildAliReportMember filtered by the pos_cur2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByPosCur1(string $pos_cur1) Return the first ChildAliReportMember filtered by the pos_cur1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByNewMember(int $new_member) Return the first ChildAliReportMember filtered by the new_member column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByNewSup(int $new_sup) Return the first ChildAliReportMember filtered by the new_sup column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByNewEx(int $new_ex) Return the first ChildAliReportMember filtered by the new_ex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneBySupEx(int $sup_ex) Return the first ChildAliReportMember filtered by the sup_ex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByPvmonth(int $pvmonth) Return the first ChildAliReportMember filtered by the pvmonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByAutoTot(string $auto_tot) Return the first ChildAliReportMember filtered by the auto_tot column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByPvL(int $pv_l) Return the first ChildAliReportMember filtered by the pv_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByPvC(int $pv_c) Return the first ChildAliReportMember filtered by the pv_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByTposCur(string $tpos_cur) Return the first ChildAliReportMember filtered by the tpos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneBySpCode(string $sp_code) Return the first ChildAliReportMember filtered by the sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneBySpName(string $sp_name) Return the first ChildAliReportMember filtered by the sp_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByLr(int $lr) Return the first ChildAliReportMember filtered by the lr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByReport1(string $report1) Return the first ChildAliReportMember filtered by the report1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByStatusAto(string $status_ato) Return the first ChildAliReportMember filtered by the status_ato column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliReportMember requireOneByStatusMember(string $status_member) Return the first ChildAliReportMember filtered by the status_member column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliReportMember[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliReportMember objects based on current ModelCriteria
 * @method     ChildAliReportMember[]|ObjectCollection findByMcode(string $mcode) Return ChildAliReportMember objects filtered by the mcode column
 * @method     ChildAliReportMember[]|ObjectCollection findByNameT(string $name_t) Return ChildAliReportMember objects filtered by the name_t column
 * @method     ChildAliReportMember[]|ObjectCollection findByMdate(string $mdate) Return ChildAliReportMember objects filtered by the mdate column
 * @method     ChildAliReportMember[]|ObjectCollection findByExpdate(string $expdate) Return ChildAliReportMember objects filtered by the expdate column
 * @method     ChildAliReportMember[]|ObjectCollection findByPvdate(string $pvdate) Return ChildAliReportMember objects filtered by the pvdate column
 * @method     ChildAliReportMember[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliReportMember objects filtered by the pos_cur column
 * @method     ChildAliReportMember[]|ObjectCollection findByPosCur4(string $pos_cur4) Return ChildAliReportMember objects filtered by the pos_cur4 column
 * @method     ChildAliReportMember[]|ObjectCollection findByPosCur2(string $pos_cur2) Return ChildAliReportMember objects filtered by the pos_cur2 column
 * @method     ChildAliReportMember[]|ObjectCollection findByPosCur1(string $pos_cur1) Return ChildAliReportMember objects filtered by the pos_cur1 column
 * @method     ChildAliReportMember[]|ObjectCollection findByNewMember(int $new_member) Return ChildAliReportMember objects filtered by the new_member column
 * @method     ChildAliReportMember[]|ObjectCollection findByNewSup(int $new_sup) Return ChildAliReportMember objects filtered by the new_sup column
 * @method     ChildAliReportMember[]|ObjectCollection findByNewEx(int $new_ex) Return ChildAliReportMember objects filtered by the new_ex column
 * @method     ChildAliReportMember[]|ObjectCollection findBySupEx(int $sup_ex) Return ChildAliReportMember objects filtered by the sup_ex column
 * @method     ChildAliReportMember[]|ObjectCollection findByPvmonth(int $pvmonth) Return ChildAliReportMember objects filtered by the pvmonth column
 * @method     ChildAliReportMember[]|ObjectCollection findByAutoTot(string $auto_tot) Return ChildAliReportMember objects filtered by the auto_tot column
 * @method     ChildAliReportMember[]|ObjectCollection findByPvL(int $pv_l) Return ChildAliReportMember objects filtered by the pv_l column
 * @method     ChildAliReportMember[]|ObjectCollection findByPvC(int $pv_c) Return ChildAliReportMember objects filtered by the pv_c column
 * @method     ChildAliReportMember[]|ObjectCollection findByTposCur(string $tpos_cur) Return ChildAliReportMember objects filtered by the tpos_cur column
 * @method     ChildAliReportMember[]|ObjectCollection findBySpCode(string $sp_code) Return ChildAliReportMember objects filtered by the sp_code column
 * @method     ChildAliReportMember[]|ObjectCollection findBySpName(string $sp_name) Return ChildAliReportMember objects filtered by the sp_name column
 * @method     ChildAliReportMember[]|ObjectCollection findByLr(int $lr) Return ChildAliReportMember objects filtered by the lr column
 * @method     ChildAliReportMember[]|ObjectCollection findByReport1(string $report1) Return ChildAliReportMember objects filtered by the report1 column
 * @method     ChildAliReportMember[]|ObjectCollection findByStatusAto(string $status_ato) Return ChildAliReportMember objects filtered by the status_ato column
 * @method     ChildAliReportMember[]|ObjectCollection findByStatusMember(string $status_member) Return ChildAliReportMember objects filtered by the status_member column
 * @method     ChildAliReportMember[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliReportMemberQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliReportMemberQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliReportMember', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliReportMemberQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliReportMemberQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliReportMemberQuery) {
            return $criteria;
        }
        $query = new ChildAliReportMemberQuery();
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
     * @return ChildAliReportMember|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliReportMember object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliReportMember object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliReportMember object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliReportMember object has no primary key');
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
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByMdate($mdate = null, $comparison = null)
    {
        if (is_array($mdate)) {
            $useMinMax = false;
            if (isset($mdate['min'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_MDATE, $mdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mdate['max'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_MDATE, $mdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_MDATE, $mdate, $comparison);
    }

    /**
     * Filter the query on the expdate column
     *
     * Example usage:
     * <code>
     * $query->filterByExpdate('2011-03-14'); // WHERE expdate = '2011-03-14'
     * $query->filterByExpdate('now'); // WHERE expdate = '2011-03-14'
     * $query->filterByExpdate(array('max' => 'yesterday')); // WHERE expdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $expdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByExpdate($expdate = null, $comparison = null)
    {
        if (is_array($expdate)) {
            $useMinMax = false;
            if (isset($expdate['min'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_EXPDATE, $expdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expdate['max'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_EXPDATE, $expdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_EXPDATE, $expdate, $comparison);
    }

    /**
     * Filter the query on the pvdate column
     *
     * Example usage:
     * <code>
     * $query->filterByPvdate('2011-03-14'); // WHERE pvdate = '2011-03-14'
     * $query->filterByPvdate('now'); // WHERE pvdate = '2011-03-14'
     * $query->filterByPvdate(array('max' => 'yesterday')); // WHERE pvdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $pvdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByPvdate($pvdate = null, $comparison = null)
    {
        if (is_array($pvdate)) {
            $useMinMax = false;
            if (isset($pvdate['min'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_PVDATE, $pvdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvdate['max'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_PVDATE, $pvdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_PVDATE, $pvdate, $comparison);
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
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Filter the query on the pos_cur4 column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur4('fooValue');   // WHERE pos_cur4 = 'fooValue'
     * $query->filterByPosCur4('%fooValue%', Criteria::LIKE); // WHERE pos_cur4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByPosCur4($posCur4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_POS_CUR4, $posCur4, $comparison);
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
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByPosCur2($posCur2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_POS_CUR2, $posCur2, $comparison);
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
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByPosCur1($posCur1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_POS_CUR1, $posCur1, $comparison);
    }

    /**
     * Filter the query on the new_member column
     *
     * Example usage:
     * <code>
     * $query->filterByNewMember(1234); // WHERE new_member = 1234
     * $query->filterByNewMember(array(12, 34)); // WHERE new_member IN (12, 34)
     * $query->filterByNewMember(array('min' => 12)); // WHERE new_member > 12
     * </code>
     *
     * @param     mixed $newMember The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByNewMember($newMember = null, $comparison = null)
    {
        if (is_array($newMember)) {
            $useMinMax = false;
            if (isset($newMember['min'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_NEW_MEMBER, $newMember['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($newMember['max'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_NEW_MEMBER, $newMember['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_NEW_MEMBER, $newMember, $comparison);
    }

    /**
     * Filter the query on the new_sup column
     *
     * Example usage:
     * <code>
     * $query->filterByNewSup(1234); // WHERE new_sup = 1234
     * $query->filterByNewSup(array(12, 34)); // WHERE new_sup IN (12, 34)
     * $query->filterByNewSup(array('min' => 12)); // WHERE new_sup > 12
     * </code>
     *
     * @param     mixed $newSup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByNewSup($newSup = null, $comparison = null)
    {
        if (is_array($newSup)) {
            $useMinMax = false;
            if (isset($newSup['min'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_NEW_SUP, $newSup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($newSup['max'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_NEW_SUP, $newSup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_NEW_SUP, $newSup, $comparison);
    }

    /**
     * Filter the query on the new_ex column
     *
     * Example usage:
     * <code>
     * $query->filterByNewEx(1234); // WHERE new_ex = 1234
     * $query->filterByNewEx(array(12, 34)); // WHERE new_ex IN (12, 34)
     * $query->filterByNewEx(array('min' => 12)); // WHERE new_ex > 12
     * </code>
     *
     * @param     mixed $newEx The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByNewEx($newEx = null, $comparison = null)
    {
        if (is_array($newEx)) {
            $useMinMax = false;
            if (isset($newEx['min'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_NEW_EX, $newEx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($newEx['max'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_NEW_EX, $newEx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_NEW_EX, $newEx, $comparison);
    }

    /**
     * Filter the query on the sup_ex column
     *
     * Example usage:
     * <code>
     * $query->filterBySupEx(1234); // WHERE sup_ex = 1234
     * $query->filterBySupEx(array(12, 34)); // WHERE sup_ex IN (12, 34)
     * $query->filterBySupEx(array('min' => 12)); // WHERE sup_ex > 12
     * </code>
     *
     * @param     mixed $supEx The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterBySupEx($supEx = null, $comparison = null)
    {
        if (is_array($supEx)) {
            $useMinMax = false;
            if (isset($supEx['min'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_SUP_EX, $supEx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($supEx['max'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_SUP_EX, $supEx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_SUP_EX, $supEx, $comparison);
    }

    /**
     * Filter the query on the pvmonth column
     *
     * Example usage:
     * <code>
     * $query->filterByPvmonth(1234); // WHERE pvmonth = 1234
     * $query->filterByPvmonth(array(12, 34)); // WHERE pvmonth IN (12, 34)
     * $query->filterByPvmonth(array('min' => 12)); // WHERE pvmonth > 12
     * </code>
     *
     * @param     mixed $pvmonth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByPvmonth($pvmonth = null, $comparison = null)
    {
        if (is_array($pvmonth)) {
            $useMinMax = false;
            if (isset($pvmonth['min'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_PVMONTH, $pvmonth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvmonth['max'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_PVMONTH, $pvmonth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_PVMONTH, $pvmonth, $comparison);
    }

    /**
     * Filter the query on the auto_tot column
     *
     * Example usage:
     * <code>
     * $query->filterByAutoTot(1234); // WHERE auto_tot = 1234
     * $query->filterByAutoTot(array(12, 34)); // WHERE auto_tot IN (12, 34)
     * $query->filterByAutoTot(array('min' => 12)); // WHERE auto_tot > 12
     * </code>
     *
     * @param     mixed $autoTot The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByAutoTot($autoTot = null, $comparison = null)
    {
        if (is_array($autoTot)) {
            $useMinMax = false;
            if (isset($autoTot['min'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_AUTO_TOT, $autoTot['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($autoTot['max'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_AUTO_TOT, $autoTot['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_AUTO_TOT, $autoTot, $comparison);
    }

    /**
     * Filter the query on the pv_l column
     *
     * Example usage:
     * <code>
     * $query->filterByPvL(1234); // WHERE pv_l = 1234
     * $query->filterByPvL(array(12, 34)); // WHERE pv_l IN (12, 34)
     * $query->filterByPvL(array('min' => 12)); // WHERE pv_l > 12
     * </code>
     *
     * @param     mixed $pvL The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByPvL($pvL = null, $comparison = null)
    {
        if (is_array($pvL)) {
            $useMinMax = false;
            if (isset($pvL['min'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_PV_L, $pvL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvL['max'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_PV_L, $pvL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_PV_L, $pvL, $comparison);
    }

    /**
     * Filter the query on the pv_c column
     *
     * Example usage:
     * <code>
     * $query->filterByPvC(1234); // WHERE pv_c = 1234
     * $query->filterByPvC(array(12, 34)); // WHERE pv_c IN (12, 34)
     * $query->filterByPvC(array('min' => 12)); // WHERE pv_c > 12
     * </code>
     *
     * @param     mixed $pvC The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByPvC($pvC = null, $comparison = null)
    {
        if (is_array($pvC)) {
            $useMinMax = false;
            if (isset($pvC['min'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_PV_C, $pvC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvC['max'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_PV_C, $pvC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_PV_C, $pvC, $comparison);
    }

    /**
     * Filter the query on the tpos_cur column
     *
     * Example usage:
     * <code>
     * $query->filterByTposCur('fooValue');   // WHERE tpos_cur = 'fooValue'
     * $query->filterByTposCur('%fooValue%', Criteria::LIKE); // WHERE tpos_cur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tposCur The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByTposCur($tposCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tposCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_TPOS_CUR, $tposCur, $comparison);
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
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterBySpCode($spCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_SP_CODE, $spCode, $comparison);
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
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterBySpName($spName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_SP_NAME, $spName, $comparison);
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
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByLr($lr = null, $comparison = null)
    {
        if (is_array($lr)) {
            $useMinMax = false;
            if (isset($lr['min'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_LR, $lr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lr['max'])) {
                $this->addUsingAlias(AliReportMemberTableMap::COL_LR, $lr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_LR, $lr, $comparison);
    }

    /**
     * Filter the query on the report1 column
     *
     * Example usage:
     * <code>
     * $query->filterByReport1('fooValue');   // WHERE report1 = 'fooValue'
     * $query->filterByReport1('%fooValue%', Criteria::LIKE); // WHERE report1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $report1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByReport1($report1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($report1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_REPORT1, $report1, $comparison);
    }

    /**
     * Filter the query on the status_ato column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusAto('fooValue');   // WHERE status_ato = 'fooValue'
     * $query->filterByStatusAto('%fooValue%', Criteria::LIKE); // WHERE status_ato LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statusAto The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByStatusAto($statusAto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statusAto)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_STATUS_ATO, $statusAto, $comparison);
    }

    /**
     * Filter the query on the status_member column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusMember('fooValue');   // WHERE status_member = 'fooValue'
     * $query->filterByStatusMember('%fooValue%', Criteria::LIKE); // WHERE status_member LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statusMember The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function filterByStatusMember($statusMember = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statusMember)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliReportMemberTableMap::COL_STATUS_MEMBER, $statusMember, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliReportMember $aliReportMember Object to remove from the list of results
     *
     * @return $this|ChildAliReportMemberQuery The current query, for fluid interface
     */
    public function prune($aliReportMember = null)
    {
        if ($aliReportMember) {
            throw new LogicException('AliReportMember object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_report_member table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportMemberTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliReportMemberTableMap::clearInstancePool();
            AliReportMemberTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportMemberTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliReportMemberTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliReportMemberTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliReportMemberTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliReportMemberQuery
