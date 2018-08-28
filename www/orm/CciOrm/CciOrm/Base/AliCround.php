<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliCroundQuery as ChildAliCroundQuery;
use CciOrm\CciOrm\Map\AliCroundTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'ali_cround' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliCround implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliCroundTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the rid field.
     *
     * @var        int
     */
    protected $rid;

    /**
     * The value for the rcode field.
     *
     * @var        int
     */
    protected $rcode;

    /**
     * The value for the cstatus field.
     *
     * @var        int
     */
    protected $cstatus;

    /**
     * The value for the rdate field.
     *
     * @var        DateTime
     */
    protected $rdate;

    /**
     * The value for the fsano field.
     *
     * @var        string
     */
    protected $fsano;

    /**
     * The value for the tsano field.
     *
     * @var        string
     */
    protected $tsano;

    /**
     * The value for the paydate field.
     *
     * @var        DateTime
     */
    protected $paydate;

    /**
     * The value for the calc field.
     *
     * @var        string
     */
    protected $calc;

    /**
     * The value for the remark field.
     *
     * @var        string
     */
    protected $remark;

    /**
     * The value for the fdate field.
     *
     * @var        DateTime
     */
    protected $fdate;

    /**
     * The value for the tdate field.
     *
     * @var        DateTime
     */
    protected $tdate;

    /**
     * The value for the fpdate field.
     *
     * @var        DateTime
     */
    protected $fpdate;

    /**
     * The value for the tpdate field.
     *
     * @var        DateTime
     */
    protected $tpdate;

    /**
     * The value for the total_a field.
     *
     * @var        string
     */
    protected $total_a;

    /**
     * The value for the total_h field.
     *
     * @var        string
     */
    protected $total_h;

    /**
     * The value for the fast field.
     *
     * @var        string
     */
    protected $fast;

    /**
     * The value for the invent field.
     *
     * @var        string
     */
    protected $invent;

    /**
     * The value for the binaryt field.
     *
     * @var        string
     */
    protected $binaryt;

    /**
     * The value for the matching field.
     *
     * @var        string
     */
    protected $matching;

    /**
     * The value for the pool field.
     *
     * @var        string
     */
    protected $pool;

    /**
     * The value for the adjust_binary field.
     *
     * @var        string
     */
    protected $adjust_binary;

    /**
     * The value for the adjust_matching field.
     *
     * @var        string
     */
    protected $adjust_matching;

    /**
     * The value for the adjust_pool field.
     *
     * @var        string
     */
    protected $adjust_pool;

    /**
     * The value for the calc_date field.
     *
     * @var        DateTime
     */
    protected $calc_date;

    /**
     * The value for the timequery field.
     *
     * @var        int
     */
    protected $timequery;

    /**
     * The value for the uid field.
     *
     * @var        string
     */
    protected $uid;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliCround object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>AliCround</code> instance.  If
     * <code>obj</code> is an instance of <code>AliCround</code>, delegates to
     * <code>equals(AliCround)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|AliCround The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [rid] column value.
     *
     * @return int
     */
    public function getRid()
    {
        return $this->rid;
    }

    /**
     * Get the [rcode] column value.
     *
     * @return int
     */
    public function getRcode()
    {
        return $this->rcode;
    }

    /**
     * Get the [cstatus] column value.
     *
     * @return int
     */
    public function getCstatus()
    {
        return $this->cstatus;
    }

    /**
     * Get the [optionally formatted] temporal [rdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getRdate($format = NULL)
    {
        if ($format === null) {
            return $this->rdate;
        } else {
            return $this->rdate instanceof \DateTimeInterface ? $this->rdate->format($format) : null;
        }
    }

    /**
     * Get the [fsano] column value.
     *
     * @return string
     */
    public function getFsano()
    {
        return $this->fsano;
    }

    /**
     * Get the [tsano] column value.
     *
     * @return string
     */
    public function getTsano()
    {
        return $this->tsano;
    }

    /**
     * Get the [optionally formatted] temporal [paydate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPaydate($format = NULL)
    {
        if ($format === null) {
            return $this->paydate;
        } else {
            return $this->paydate instanceof \DateTimeInterface ? $this->paydate->format($format) : null;
        }
    }

    /**
     * Get the [calc] column value.
     *
     * @return string
     */
    public function getCalc()
    {
        return $this->calc;
    }

    /**
     * Get the [remark] column value.
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Get the [optionally formatted] temporal [fdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFdate($format = NULL)
    {
        if ($format === null) {
            return $this->fdate;
        } else {
            return $this->fdate instanceof \DateTimeInterface ? $this->fdate->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [tdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTdate($format = NULL)
    {
        if ($format === null) {
            return $this->tdate;
        } else {
            return $this->tdate instanceof \DateTimeInterface ? $this->tdate->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [fpdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFpdate($format = NULL)
    {
        if ($format === null) {
            return $this->fpdate;
        } else {
            return $this->fpdate instanceof \DateTimeInterface ? $this->fpdate->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [tpdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTpdate($format = NULL)
    {
        if ($format === null) {
            return $this->tpdate;
        } else {
            return $this->tpdate instanceof \DateTimeInterface ? $this->tpdate->format($format) : null;
        }
    }

    /**
     * Get the [total_a] column value.
     *
     * @return string
     */
    public function getTotalA()
    {
        return $this->total_a;
    }

    /**
     * Get the [total_h] column value.
     *
     * @return string
     */
    public function getTotalH()
    {
        return $this->total_h;
    }

    /**
     * Get the [fast] column value.
     *
     * @return string
     */
    public function getFast()
    {
        return $this->fast;
    }

    /**
     * Get the [invent] column value.
     *
     * @return string
     */
    public function getInvent()
    {
        return $this->invent;
    }

    /**
     * Get the [binaryt] column value.
     *
     * @return string
     */
    public function getBinaryt()
    {
        return $this->binaryt;
    }

    /**
     * Get the [matching] column value.
     *
     * @return string
     */
    public function getMatching()
    {
        return $this->matching;
    }

    /**
     * Get the [pool] column value.
     *
     * @return string
     */
    public function getPool()
    {
        return $this->pool;
    }

    /**
     * Get the [adjust_binary] column value.
     *
     * @return string
     */
    public function getAdjustBinary()
    {
        return $this->adjust_binary;
    }

    /**
     * Get the [adjust_matching] column value.
     *
     * @return string
     */
    public function getAdjustMatching()
    {
        return $this->adjust_matching;
    }

    /**
     * Get the [adjust_pool] column value.
     *
     * @return string
     */
    public function getAdjustPool()
    {
        return $this->adjust_pool;
    }

    /**
     * Get the [optionally formatted] temporal [calc_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCalcDate($format = NULL)
    {
        if ($format === null) {
            return $this->calc_date;
        } else {
            return $this->calc_date instanceof \DateTimeInterface ? $this->calc_date->format($format) : null;
        }
    }

    /**
     * Get the [timequery] column value.
     *
     * @return int
     */
    public function getTimequery()
    {
        return $this->timequery;
    }

    /**
     * Get the [uid] column value.
     *
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set the value of [rid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setRid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rid !== $v) {
            $this->rid = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_RID] = true;
        }

        return $this;
    } // setRid()

    /**
     * Set the value of [rcode] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setRcode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rcode !== $v) {
            $this->rcode = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_RCODE] = true;
        }

        return $this;
    } // setRcode()

    /**
     * Set the value of [cstatus] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setCstatus($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cstatus !== $v) {
            $this->cstatus = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_CSTATUS] = true;
        }

        return $this;
    } // setCstatus()

    /**
     * Sets the value of [rdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setRdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->rdate !== null || $dt !== null) {
            if ($this->rdate === null || $dt === null || $dt->format("Y-m-d") !== $this->rdate->format("Y-m-d")) {
                $this->rdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliCroundTableMap::COL_RDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setRdate()

    /**
     * Set the value of [fsano] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setFsano($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fsano !== $v) {
            $this->fsano = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_FSANO] = true;
        }

        return $this;
    } // setFsano()

    /**
     * Set the value of [tsano] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setTsano($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tsano !== $v) {
            $this->tsano = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_TSANO] = true;
        }

        return $this;
    } // setTsano()

    /**
     * Sets the value of [paydate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setPaydate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->paydate !== null || $dt !== null) {
            if ($this->paydate === null || $dt === null || $dt->format("Y-m-d") !== $this->paydate->format("Y-m-d")) {
                $this->paydate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliCroundTableMap::COL_PAYDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setPaydate()

    /**
     * Set the value of [calc] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setCalc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->calc !== $v) {
            $this->calc = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_CALC] = true;
        }

        return $this;
    } // setCalc()

    /**
     * Set the value of [remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->remark !== $v) {
            $this->remark = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_REMARK] = true;
        }

        return $this;
    } // setRemark()

    /**
     * Sets the value of [fdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setFdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fdate !== null || $dt !== null) {
            if ($this->fdate === null || $dt === null || $dt->format("Y-m-d") !== $this->fdate->format("Y-m-d")) {
                $this->fdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliCroundTableMap::COL_FDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFdate()

    /**
     * Sets the value of [tdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setTdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tdate !== null || $dt !== null) {
            if ($this->tdate === null || $dt === null || $dt->format("Y-m-d") !== $this->tdate->format("Y-m-d")) {
                $this->tdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliCroundTableMap::COL_TDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setTdate()

    /**
     * Sets the value of [fpdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setFpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fpdate !== null || $dt !== null) {
            if ($this->fpdate === null || $dt === null || $dt->format("Y-m-d") !== $this->fpdate->format("Y-m-d")) {
                $this->fpdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliCroundTableMap::COL_FPDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFpdate()

    /**
     * Sets the value of [tpdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setTpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tpdate !== null || $dt !== null) {
            if ($this->tpdate === null || $dt === null || $dt->format("Y-m-d") !== $this->tpdate->format("Y-m-d")) {
                $this->tpdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliCroundTableMap::COL_TPDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setTpdate()

    /**
     * Set the value of [total_a] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setTotalA($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_a !== $v) {
            $this->total_a = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_TOTAL_A] = true;
        }

        return $this;
    } // setTotalA()

    /**
     * Set the value of [total_h] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setTotalH($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_h !== $v) {
            $this->total_h = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_TOTAL_H] = true;
        }

        return $this;
    } // setTotalH()

    /**
     * Set the value of [fast] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setFast($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fast !== $v) {
            $this->fast = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_FAST] = true;
        }

        return $this;
    } // setFast()

    /**
     * Set the value of [invent] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setInvent($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->invent !== $v) {
            $this->invent = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_INVENT] = true;
        }

        return $this;
    } // setInvent()

    /**
     * Set the value of [binaryt] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setBinaryt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->binaryt !== $v) {
            $this->binaryt = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_BINARYT] = true;
        }

        return $this;
    } // setBinaryt()

    /**
     * Set the value of [matching] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setMatching($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->matching !== $v) {
            $this->matching = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_MATCHING] = true;
        }

        return $this;
    } // setMatching()

    /**
     * Set the value of [pool] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setPool($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pool !== $v) {
            $this->pool = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_POOL] = true;
        }

        return $this;
    } // setPool()

    /**
     * Set the value of [adjust_binary] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setAdjustBinary($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->adjust_binary !== $v) {
            $this->adjust_binary = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_ADJUST_BINARY] = true;
        }

        return $this;
    } // setAdjustBinary()

    /**
     * Set the value of [adjust_matching] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setAdjustMatching($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->adjust_matching !== $v) {
            $this->adjust_matching = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_ADJUST_MATCHING] = true;
        }

        return $this;
    } // setAdjustMatching()

    /**
     * Set the value of [adjust_pool] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setAdjustPool($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->adjust_pool !== $v) {
            $this->adjust_pool = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_ADJUST_POOL] = true;
        }

        return $this;
    } // setAdjustPool()

    /**
     * Sets the value of [calc_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setCalcDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->calc_date !== null || $dt !== null) {
            if ($this->calc_date === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->calc_date->format("Y-m-d H:i:s.u")) {
                $this->calc_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliCroundTableMap::COL_CALC_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setCalcDate()

    /**
     * Set the value of [timequery] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setTimequery($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->timequery !== $v) {
            $this->timequery = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_TIMEQUERY] = true;
        }

        return $this;
    } // setTimequery()

    /**
     * Set the value of [uid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCround The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[AliCroundTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliCroundTableMap::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliCroundTableMap::translateFieldName('Rcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliCroundTableMap::translateFieldName('Cstatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cstatus = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliCroundTableMap::translateFieldName('Rdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->rdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliCroundTableMap::translateFieldName('Fsano', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fsano = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliCroundTableMap::translateFieldName('Tsano', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tsano = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliCroundTableMap::translateFieldName('Paydate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->paydate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliCroundTableMap::translateFieldName('Calc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->calc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliCroundTableMap::translateFieldName('Remark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliCroundTableMap::translateFieldName('Fdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliCroundTableMap::translateFieldName('Tdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->tdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliCroundTableMap::translateFieldName('Fpdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fpdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliCroundTableMap::translateFieldName('Tpdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->tpdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliCroundTableMap::translateFieldName('TotalA', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_a = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliCroundTableMap::translateFieldName('TotalH', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_h = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliCroundTableMap::translateFieldName('Fast', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fast = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliCroundTableMap::translateFieldName('Invent', TableMap::TYPE_PHPNAME, $indexType)];
            $this->invent = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliCroundTableMap::translateFieldName('Binaryt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->binaryt = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliCroundTableMap::translateFieldName('Matching', TableMap::TYPE_PHPNAME, $indexType)];
            $this->matching = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliCroundTableMap::translateFieldName('Pool', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pool = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliCroundTableMap::translateFieldName('AdjustBinary', TableMap::TYPE_PHPNAME, $indexType)];
            $this->adjust_binary = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliCroundTableMap::translateFieldName('AdjustMatching', TableMap::TYPE_PHPNAME, $indexType)];
            $this->adjust_matching = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliCroundTableMap::translateFieldName('AdjustPool', TableMap::TYPE_PHPNAME, $indexType)];
            $this->adjust_pool = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliCroundTableMap::translateFieldName('CalcDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->calc_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliCroundTableMap::translateFieldName('Timequery', TableMap::TYPE_PHPNAME, $indexType)];
            $this->timequery = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliCroundTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 26; // 26 = AliCroundTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliCround'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliCroundTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliCroundQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see AliCround::setDeleted()
     * @see AliCround::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCroundTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliCroundQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCroundTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                AliCroundTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[AliCroundTableMap::COL_RID] = true;
        if (null !== $this->rid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliCroundTableMap::COL_RID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliCroundTableMap::COL_RID)) {
            $modifiedColumns[':p' . $index++]  = 'rid';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_RCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rcode';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_CSTATUS)) {
            $modifiedColumns[':p' . $index++]  = 'cstatus';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_RDATE)) {
            $modifiedColumns[':p' . $index++]  = 'rdate';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_FSANO)) {
            $modifiedColumns[':p' . $index++]  = 'fsano';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_TSANO)) {
            $modifiedColumns[':p' . $index++]  = 'tsano';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_PAYDATE)) {
            $modifiedColumns[':p' . $index++]  = 'paydate';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_CALC)) {
            $modifiedColumns[':p' . $index++]  = 'calc';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'remark';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_FDATE)) {
            $modifiedColumns[':p' . $index++]  = 'fdate';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_TDATE)) {
            $modifiedColumns[':p' . $index++]  = 'tdate';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_FPDATE)) {
            $modifiedColumns[':p' . $index++]  = 'fpdate';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_TPDATE)) {
            $modifiedColumns[':p' . $index++]  = 'tpdate';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_TOTAL_A)) {
            $modifiedColumns[':p' . $index++]  = 'total_a';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_TOTAL_H)) {
            $modifiedColumns[':p' . $index++]  = 'total_h';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_FAST)) {
            $modifiedColumns[':p' . $index++]  = 'fast';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_INVENT)) {
            $modifiedColumns[':p' . $index++]  = 'invent';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_BINARYT)) {
            $modifiedColumns[':p' . $index++]  = 'binaryt';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_MATCHING)) {
            $modifiedColumns[':p' . $index++]  = 'matching';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_POOL)) {
            $modifiedColumns[':p' . $index++]  = 'pool';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_ADJUST_BINARY)) {
            $modifiedColumns[':p' . $index++]  = 'adjust_binary';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_ADJUST_MATCHING)) {
            $modifiedColumns[':p' . $index++]  = 'adjust_matching';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_ADJUST_POOL)) {
            $modifiedColumns[':p' . $index++]  = 'adjust_pool';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_CALC_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'calc_date';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_TIMEQUERY)) {
            $modifiedColumns[':p' . $index++]  = 'timequery';
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }

        $sql = sprintf(
            'INSERT INTO ali_cround (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'rid':
                        $stmt->bindValue($identifier, $this->rid, PDO::PARAM_INT);
                        break;
                    case 'rcode':
                        $stmt->bindValue($identifier, $this->rcode, PDO::PARAM_INT);
                        break;
                    case 'cstatus':
                        $stmt->bindValue($identifier, $this->cstatus, PDO::PARAM_INT);
                        break;
                    case 'rdate':
                        $stmt->bindValue($identifier, $this->rdate ? $this->rdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'fsano':
                        $stmt->bindValue($identifier, $this->fsano, PDO::PARAM_STR);
                        break;
                    case 'tsano':
                        $stmt->bindValue($identifier, $this->tsano, PDO::PARAM_STR);
                        break;
                    case 'paydate':
                        $stmt->bindValue($identifier, $this->paydate ? $this->paydate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'calc':
                        $stmt->bindValue($identifier, $this->calc, PDO::PARAM_STR);
                        break;
                    case 'remark':
                        $stmt->bindValue($identifier, $this->remark, PDO::PARAM_STR);
                        break;
                    case 'fdate':
                        $stmt->bindValue($identifier, $this->fdate ? $this->fdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tdate':
                        $stmt->bindValue($identifier, $this->tdate ? $this->tdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'fpdate':
                        $stmt->bindValue($identifier, $this->fpdate ? $this->fpdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tpdate':
                        $stmt->bindValue($identifier, $this->tpdate ? $this->tpdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'total_a':
                        $stmt->bindValue($identifier, $this->total_a, PDO::PARAM_STR);
                        break;
                    case 'total_h':
                        $stmt->bindValue($identifier, $this->total_h, PDO::PARAM_STR);
                        break;
                    case 'fast':
                        $stmt->bindValue($identifier, $this->fast, PDO::PARAM_STR);
                        break;
                    case 'invent':
                        $stmt->bindValue($identifier, $this->invent, PDO::PARAM_STR);
                        break;
                    case 'binaryt':
                        $stmt->bindValue($identifier, $this->binaryt, PDO::PARAM_STR);
                        break;
                    case 'matching':
                        $stmt->bindValue($identifier, $this->matching, PDO::PARAM_STR);
                        break;
                    case 'pool':
                        $stmt->bindValue($identifier, $this->pool, PDO::PARAM_STR);
                        break;
                    case 'adjust_binary':
                        $stmt->bindValue($identifier, $this->adjust_binary, PDO::PARAM_STR);
                        break;
                    case 'adjust_matching':
                        $stmt->bindValue($identifier, $this->adjust_matching, PDO::PARAM_STR);
                        break;
                    case 'adjust_pool':
                        $stmt->bindValue($identifier, $this->adjust_pool, PDO::PARAM_STR);
                        break;
                    case 'calc_date':
                        $stmt->bindValue($identifier, $this->calc_date ? $this->calc_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'timequery':
                        $stmt->bindValue($identifier, $this->timequery, PDO::PARAM_INT);
                        break;
                    case 'uid':
                        $stmt->bindValue($identifier, $this->uid, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setRid($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliCroundTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getRid();
                break;
            case 1:
                return $this->getRcode();
                break;
            case 2:
                return $this->getCstatus();
                break;
            case 3:
                return $this->getRdate();
                break;
            case 4:
                return $this->getFsano();
                break;
            case 5:
                return $this->getTsano();
                break;
            case 6:
                return $this->getPaydate();
                break;
            case 7:
                return $this->getCalc();
                break;
            case 8:
                return $this->getRemark();
                break;
            case 9:
                return $this->getFdate();
                break;
            case 10:
                return $this->getTdate();
                break;
            case 11:
                return $this->getFpdate();
                break;
            case 12:
                return $this->getTpdate();
                break;
            case 13:
                return $this->getTotalA();
                break;
            case 14:
                return $this->getTotalH();
                break;
            case 15:
                return $this->getFast();
                break;
            case 16:
                return $this->getInvent();
                break;
            case 17:
                return $this->getBinaryt();
                break;
            case 18:
                return $this->getMatching();
                break;
            case 19:
                return $this->getPool();
                break;
            case 20:
                return $this->getAdjustBinary();
                break;
            case 21:
                return $this->getAdjustMatching();
                break;
            case 22:
                return $this->getAdjustPool();
                break;
            case 23:
                return $this->getCalcDate();
                break;
            case 24:
                return $this->getTimequery();
                break;
            case 25:
                return $this->getUid();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['AliCround'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliCround'][$this->hashCode()] = true;
        $keys = AliCroundTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRid(),
            $keys[1] => $this->getRcode(),
            $keys[2] => $this->getCstatus(),
            $keys[3] => $this->getRdate(),
            $keys[4] => $this->getFsano(),
            $keys[5] => $this->getTsano(),
            $keys[6] => $this->getPaydate(),
            $keys[7] => $this->getCalc(),
            $keys[8] => $this->getRemark(),
            $keys[9] => $this->getFdate(),
            $keys[10] => $this->getTdate(),
            $keys[11] => $this->getFpdate(),
            $keys[12] => $this->getTpdate(),
            $keys[13] => $this->getTotalA(),
            $keys[14] => $this->getTotalH(),
            $keys[15] => $this->getFast(),
            $keys[16] => $this->getInvent(),
            $keys[17] => $this->getBinaryt(),
            $keys[18] => $this->getMatching(),
            $keys[19] => $this->getPool(),
            $keys[20] => $this->getAdjustBinary(),
            $keys[21] => $this->getAdjustMatching(),
            $keys[22] => $this->getAdjustPool(),
            $keys[23] => $this->getCalcDate(),
            $keys[24] => $this->getTimequery(),
            $keys[25] => $this->getUid(),
        );
        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        if ($result[$keys[6]] instanceof \DateTimeInterface) {
            $result[$keys[6]] = $result[$keys[6]]->format('c');
        }

        if ($result[$keys[9]] instanceof \DateTimeInterface) {
            $result[$keys[9]] = $result[$keys[9]]->format('c');
        }

        if ($result[$keys[10]] instanceof \DateTimeInterface) {
            $result[$keys[10]] = $result[$keys[10]]->format('c');
        }

        if ($result[$keys[11]] instanceof \DateTimeInterface) {
            $result[$keys[11]] = $result[$keys[11]]->format('c');
        }

        if ($result[$keys[12]] instanceof \DateTimeInterface) {
            $result[$keys[12]] = $result[$keys[12]]->format('c');
        }

        if ($result[$keys[23]] instanceof \DateTimeInterface) {
            $result[$keys[23]] = $result[$keys[23]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\CciOrm\CciOrm\AliCround
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliCroundTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliCround
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setRid($value);
                break;
            case 1:
                $this->setRcode($value);
                break;
            case 2:
                $this->setCstatus($value);
                break;
            case 3:
                $this->setRdate($value);
                break;
            case 4:
                $this->setFsano($value);
                break;
            case 5:
                $this->setTsano($value);
                break;
            case 6:
                $this->setPaydate($value);
                break;
            case 7:
                $this->setCalc($value);
                break;
            case 8:
                $this->setRemark($value);
                break;
            case 9:
                $this->setFdate($value);
                break;
            case 10:
                $this->setTdate($value);
                break;
            case 11:
                $this->setFpdate($value);
                break;
            case 12:
                $this->setTpdate($value);
                break;
            case 13:
                $this->setTotalA($value);
                break;
            case 14:
                $this->setTotalH($value);
                break;
            case 15:
                $this->setFast($value);
                break;
            case 16:
                $this->setInvent($value);
                break;
            case 17:
                $this->setBinaryt($value);
                break;
            case 18:
                $this->setMatching($value);
                break;
            case 19:
                $this->setPool($value);
                break;
            case 20:
                $this->setAdjustBinary($value);
                break;
            case 21:
                $this->setAdjustMatching($value);
                break;
            case 22:
                $this->setAdjustPool($value);
                break;
            case 23:
                $this->setCalcDate($value);
                break;
            case 24:
                $this->setTimequery($value);
                break;
            case 25:
                $this->setUid($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = AliCroundTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setRid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRcode($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCstatus($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setRdate($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFsano($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setTsano($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPaydate($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCalc($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setRemark($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setFdate($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setTdate($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setFpdate($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setTpdate($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setTotalA($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setTotalH($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setFast($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setInvent($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setBinaryt($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setMatching($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setPool($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setAdjustBinary($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setAdjustMatching($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setAdjustPool($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setCalcDate($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setTimequery($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setUid($arr[$keys[25]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\CciOrm\CciOrm\AliCround The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AliCroundTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliCroundTableMap::COL_RID)) {
            $criteria->add(AliCroundTableMap::COL_RID, $this->rid);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_RCODE)) {
            $criteria->add(AliCroundTableMap::COL_RCODE, $this->rcode);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_CSTATUS)) {
            $criteria->add(AliCroundTableMap::COL_CSTATUS, $this->cstatus);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_RDATE)) {
            $criteria->add(AliCroundTableMap::COL_RDATE, $this->rdate);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_FSANO)) {
            $criteria->add(AliCroundTableMap::COL_FSANO, $this->fsano);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_TSANO)) {
            $criteria->add(AliCroundTableMap::COL_TSANO, $this->tsano);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_PAYDATE)) {
            $criteria->add(AliCroundTableMap::COL_PAYDATE, $this->paydate);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_CALC)) {
            $criteria->add(AliCroundTableMap::COL_CALC, $this->calc);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_REMARK)) {
            $criteria->add(AliCroundTableMap::COL_REMARK, $this->remark);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_FDATE)) {
            $criteria->add(AliCroundTableMap::COL_FDATE, $this->fdate);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_TDATE)) {
            $criteria->add(AliCroundTableMap::COL_TDATE, $this->tdate);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_FPDATE)) {
            $criteria->add(AliCroundTableMap::COL_FPDATE, $this->fpdate);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_TPDATE)) {
            $criteria->add(AliCroundTableMap::COL_TPDATE, $this->tpdate);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_TOTAL_A)) {
            $criteria->add(AliCroundTableMap::COL_TOTAL_A, $this->total_a);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_TOTAL_H)) {
            $criteria->add(AliCroundTableMap::COL_TOTAL_H, $this->total_h);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_FAST)) {
            $criteria->add(AliCroundTableMap::COL_FAST, $this->fast);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_INVENT)) {
            $criteria->add(AliCroundTableMap::COL_INVENT, $this->invent);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_BINARYT)) {
            $criteria->add(AliCroundTableMap::COL_BINARYT, $this->binaryt);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_MATCHING)) {
            $criteria->add(AliCroundTableMap::COL_MATCHING, $this->matching);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_POOL)) {
            $criteria->add(AliCroundTableMap::COL_POOL, $this->pool);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_ADJUST_BINARY)) {
            $criteria->add(AliCroundTableMap::COL_ADJUST_BINARY, $this->adjust_binary);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_ADJUST_MATCHING)) {
            $criteria->add(AliCroundTableMap::COL_ADJUST_MATCHING, $this->adjust_matching);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_ADJUST_POOL)) {
            $criteria->add(AliCroundTableMap::COL_ADJUST_POOL, $this->adjust_pool);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_CALC_DATE)) {
            $criteria->add(AliCroundTableMap::COL_CALC_DATE, $this->calc_date);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_TIMEQUERY)) {
            $criteria->add(AliCroundTableMap::COL_TIMEQUERY, $this->timequery);
        }
        if ($this->isColumnModified(AliCroundTableMap::COL_UID)) {
            $criteria->add(AliCroundTableMap::COL_UID, $this->uid);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildAliCroundQuery::create();
        $criteria->add(AliCroundTableMap::COL_RID, $this->rid);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getRid();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getRid();
    }

    /**
     * Generic method to set the primary key (rid column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setRid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getRid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliCround (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRcode($this->getRcode());
        $copyObj->setCstatus($this->getCstatus());
        $copyObj->setRdate($this->getRdate());
        $copyObj->setFsano($this->getFsano());
        $copyObj->setTsano($this->getTsano());
        $copyObj->setPaydate($this->getPaydate());
        $copyObj->setCalc($this->getCalc());
        $copyObj->setRemark($this->getRemark());
        $copyObj->setFdate($this->getFdate());
        $copyObj->setTdate($this->getTdate());
        $copyObj->setFpdate($this->getFpdate());
        $copyObj->setTpdate($this->getTpdate());
        $copyObj->setTotalA($this->getTotalA());
        $copyObj->setTotalH($this->getTotalH());
        $copyObj->setFast($this->getFast());
        $copyObj->setInvent($this->getInvent());
        $copyObj->setBinaryt($this->getBinaryt());
        $copyObj->setMatching($this->getMatching());
        $copyObj->setPool($this->getPool());
        $copyObj->setAdjustBinary($this->getAdjustBinary());
        $copyObj->setAdjustMatching($this->getAdjustMatching());
        $copyObj->setAdjustPool($this->getAdjustPool());
        $copyObj->setCalcDate($this->getCalcDate());
        $copyObj->setTimequery($this->getTimequery());
        $copyObj->setUid($this->getUid());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setRid(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \CciOrm\CciOrm\AliCround Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->rid = null;
        $this->rcode = null;
        $this->cstatus = null;
        $this->rdate = null;
        $this->fsano = null;
        $this->tsano = null;
        $this->paydate = null;
        $this->calc = null;
        $this->remark = null;
        $this->fdate = null;
        $this->tdate = null;
        $this->fpdate = null;
        $this->tpdate = null;
        $this->total_a = null;
        $this->total_h = null;
        $this->fast = null;
        $this->invent = null;
        $this->binaryt = null;
        $this->matching = null;
        $this->pool = null;
        $this->adjust_binary = null;
        $this->adjust_matching = null;
        $this->adjust_pool = null;
        $this->calc_date = null;
        $this->timequery = null;
        $this->uid = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AliCroundTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
