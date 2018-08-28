<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliPromotionQuery as ChildAliPromotionQuery;
use CciOrm\CciOrm\Map\AliPromotionTableMap;
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
 * Base class that represents a row from the 'ali_promotion' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliPromotion implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliPromotionTableMap';


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
     * The value for the name field.
     *
     * @var        string
     */
    protected $name;

    /**
     * The value for the rdate field.
     *
     * @var        DateTime
     */
    protected $rdate;

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
     * The value for the rtype field.
     *
     * @var        int
     */
    protected $rtype;

    /**
     * The value for the firstseat field.
     *
     * @var        string
     */
    protected $firstseat;

    /**
     * The value for the secondseat field.
     *
     * @var        string
     */
    protected $secondseat;

    /**
     * The value for the rincrease field.
     *
     * @var        string
     */
    protected $rincrease;

    /**
     * The value for the rurl field.
     *
     * @var        string
     */
    protected $rurl;

    /**
     * The value for the calc_date field.
     *
     * @var        DateTime
     */
    protected $calc_date;

    /**
     * The value for the tshow field.
     *
     * @var        int
     */
    protected $tshow;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliPromotion object.
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
     * Compares this with another <code>AliPromotion</code> instance.  If
     * <code>obj</code> is an instance of <code>AliPromotion</code>, delegates to
     * <code>equals(AliPromotion)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliPromotion The current object, for fluid interface
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
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * Get the [rtype] column value.
     *
     * @return int
     */
    public function getRtype()
    {
        return $this->rtype;
    }

    /**
     * Get the [firstseat] column value.
     *
     * @return string
     */
    public function getFirstseat()
    {
        return $this->firstseat;
    }

    /**
     * Get the [secondseat] column value.
     *
     * @return string
     */
    public function getSecondseat()
    {
        return $this->secondseat;
    }

    /**
     * Get the [rincrease] column value.
     *
     * @return string
     */
    public function getRincrease()
    {
        return $this->rincrease;
    }

    /**
     * Get the [rurl] column value.
     *
     * @return string
     */
    public function getRurl()
    {
        return $this->rurl;
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
     * Get the [tshow] column value.
     *
     * @return int
     */
    public function getTshow()
    {
        return $this->tshow;
    }

    /**
     * Set the value of [rid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setRid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rid !== $v) {
            $this->rid = $v;
            $this->modifiedColumns[AliPromotionTableMap::COL_RID] = true;
        }

        return $this;
    } // setRid()

    /**
     * Set the value of [rcode] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setRcode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rcode !== $v) {
            $this->rcode = $v;
            $this->modifiedColumns[AliPromotionTableMap::COL_RCODE] = true;
        }

        return $this;
    } // setRcode()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[AliPromotionTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Sets the value of [rdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setRdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->rdate !== null || $dt !== null) {
            if ($this->rdate === null || $dt === null || $dt->format("Y-m-d") !== $this->rdate->format("Y-m-d")) {
                $this->rdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliPromotionTableMap::COL_RDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setRdate()

    /**
     * Set the value of [calc] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setCalc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->calc !== $v) {
            $this->calc = $v;
            $this->modifiedColumns[AliPromotionTableMap::COL_CALC] = true;
        }

        return $this;
    } // setCalc()

    /**
     * Set the value of [remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->remark !== $v) {
            $this->remark = $v;
            $this->modifiedColumns[AliPromotionTableMap::COL_REMARK] = true;
        }

        return $this;
    } // setRemark()

    /**
     * Sets the value of [fdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setFdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fdate !== null || $dt !== null) {
            if ($this->fdate === null || $dt === null || $dt->format("Y-m-d") !== $this->fdate->format("Y-m-d")) {
                $this->fdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliPromotionTableMap::COL_FDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFdate()

    /**
     * Sets the value of [tdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setTdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tdate !== null || $dt !== null) {
            if ($this->tdate === null || $dt === null || $dt->format("Y-m-d") !== $this->tdate->format("Y-m-d")) {
                $this->tdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliPromotionTableMap::COL_TDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setTdate()

    /**
     * Set the value of [rtype] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setRtype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rtype !== $v) {
            $this->rtype = $v;
            $this->modifiedColumns[AliPromotionTableMap::COL_RTYPE] = true;
        }

        return $this;
    } // setRtype()

    /**
     * Set the value of [firstseat] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setFirstseat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->firstseat !== $v) {
            $this->firstseat = $v;
            $this->modifiedColumns[AliPromotionTableMap::COL_FIRSTSEAT] = true;
        }

        return $this;
    } // setFirstseat()

    /**
     * Set the value of [secondseat] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setSecondseat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->secondseat !== $v) {
            $this->secondseat = $v;
            $this->modifiedColumns[AliPromotionTableMap::COL_SECONDSEAT] = true;
        }

        return $this;
    } // setSecondseat()

    /**
     * Set the value of [rincrease] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setRincrease($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rincrease !== $v) {
            $this->rincrease = $v;
            $this->modifiedColumns[AliPromotionTableMap::COL_RINCREASE] = true;
        }

        return $this;
    } // setRincrease()

    /**
     * Set the value of [rurl] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setRurl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rurl !== $v) {
            $this->rurl = $v;
            $this->modifiedColumns[AliPromotionTableMap::COL_RURL] = true;
        }

        return $this;
    } // setRurl()

    /**
     * Sets the value of [calc_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setCalcDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->calc_date !== null || $dt !== null) {
            if ($this->calc_date === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->calc_date->format("Y-m-d H:i:s.u")) {
                $this->calc_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliPromotionTableMap::COL_CALC_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setCalcDate()

    /**
     * Set the value of [tshow] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object (for fluent API support)
     */
    public function setTshow($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tshow !== $v) {
            $this->tshow = $v;
            $this->modifiedColumns[AliPromotionTableMap::COL_TSHOW] = true;
        }

        return $this;
    } // setTshow()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliPromotionTableMap::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliPromotionTableMap::translateFieldName('Rcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliPromotionTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliPromotionTableMap::translateFieldName('Rdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->rdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliPromotionTableMap::translateFieldName('Calc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->calc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliPromotionTableMap::translateFieldName('Remark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliPromotionTableMap::translateFieldName('Fdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliPromotionTableMap::translateFieldName('Tdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->tdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliPromotionTableMap::translateFieldName('Rtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rtype = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliPromotionTableMap::translateFieldName('Firstseat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->firstseat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliPromotionTableMap::translateFieldName('Secondseat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->secondseat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliPromotionTableMap::translateFieldName('Rincrease', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rincrease = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliPromotionTableMap::translateFieldName('Rurl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rurl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliPromotionTableMap::translateFieldName('CalcDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->calc_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliPromotionTableMap::translateFieldName('Tshow', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tshow = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = AliPromotionTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliPromotion'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliPromotionTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliPromotionQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliPromotion::setDeleted()
     * @see AliPromotion::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPromotionTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliPromotionQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPromotionTableMap::DATABASE_NAME);
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
                AliPromotionTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliPromotionTableMap::COL_RID] = true;
        if (null !== $this->rid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliPromotionTableMap::COL_RID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliPromotionTableMap::COL_RID)) {
            $modifiedColumns[':p' . $index++]  = 'rid';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_RCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rcode';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_RDATE)) {
            $modifiedColumns[':p' . $index++]  = 'rdate';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_CALC)) {
            $modifiedColumns[':p' . $index++]  = 'calc';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'remark';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_FDATE)) {
            $modifiedColumns[':p' . $index++]  = 'fdate';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_TDATE)) {
            $modifiedColumns[':p' . $index++]  = 'tdate';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_RTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'rtype';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_FIRSTSEAT)) {
            $modifiedColumns[':p' . $index++]  = 'firstseat';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_SECONDSEAT)) {
            $modifiedColumns[':p' . $index++]  = 'secondseat';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_RINCREASE)) {
            $modifiedColumns[':p' . $index++]  = 'rincrease';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_RURL)) {
            $modifiedColumns[':p' . $index++]  = 'rurl';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_CALC_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'calc_date';
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_TSHOW)) {
            $modifiedColumns[':p' . $index++]  = 'tshow';
        }

        $sql = sprintf(
            'INSERT INTO ali_promotion (%s) VALUES (%s)',
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
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'rdate':
                        $stmt->bindValue($identifier, $this->rdate ? $this->rdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
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
                    case 'rtype':
                        $stmt->bindValue($identifier, $this->rtype, PDO::PARAM_INT);
                        break;
                    case 'firstseat':
                        $stmt->bindValue($identifier, $this->firstseat, PDO::PARAM_STR);
                        break;
                    case 'secondseat':
                        $stmt->bindValue($identifier, $this->secondseat, PDO::PARAM_STR);
                        break;
                    case 'rincrease':
                        $stmt->bindValue($identifier, $this->rincrease, PDO::PARAM_STR);
                        break;
                    case 'rurl':
                        $stmt->bindValue($identifier, $this->rurl, PDO::PARAM_STR);
                        break;
                    case 'calc_date':
                        $stmt->bindValue($identifier, $this->calc_date ? $this->calc_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tshow':
                        $stmt->bindValue($identifier, $this->tshow, PDO::PARAM_INT);
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
        $pos = AliPromotionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getName();
                break;
            case 3:
                return $this->getRdate();
                break;
            case 4:
                return $this->getCalc();
                break;
            case 5:
                return $this->getRemark();
                break;
            case 6:
                return $this->getFdate();
                break;
            case 7:
                return $this->getTdate();
                break;
            case 8:
                return $this->getRtype();
                break;
            case 9:
                return $this->getFirstseat();
                break;
            case 10:
                return $this->getSecondseat();
                break;
            case 11:
                return $this->getRincrease();
                break;
            case 12:
                return $this->getRurl();
                break;
            case 13:
                return $this->getCalcDate();
                break;
            case 14:
                return $this->getTshow();
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

        if (isset($alreadyDumpedObjects['AliPromotion'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliPromotion'][$this->hashCode()] = true;
        $keys = AliPromotionTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRid(),
            $keys[1] => $this->getRcode(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getRdate(),
            $keys[4] => $this->getCalc(),
            $keys[5] => $this->getRemark(),
            $keys[6] => $this->getFdate(),
            $keys[7] => $this->getTdate(),
            $keys[8] => $this->getRtype(),
            $keys[9] => $this->getFirstseat(),
            $keys[10] => $this->getSecondseat(),
            $keys[11] => $this->getRincrease(),
            $keys[12] => $this->getRurl(),
            $keys[13] => $this->getCalcDate(),
            $keys[14] => $this->getTshow(),
        );
        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        if ($result[$keys[6]] instanceof \DateTimeInterface) {
            $result[$keys[6]] = $result[$keys[6]]->format('c');
        }

        if ($result[$keys[7]] instanceof \DateTimeInterface) {
            $result[$keys[7]] = $result[$keys[7]]->format('c');
        }

        if ($result[$keys[13]] instanceof \DateTimeInterface) {
            $result[$keys[13]] = $result[$keys[13]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliPromotion
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliPromotionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliPromotion
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
                $this->setName($value);
                break;
            case 3:
                $this->setRdate($value);
                break;
            case 4:
                $this->setCalc($value);
                break;
            case 5:
                $this->setRemark($value);
                break;
            case 6:
                $this->setFdate($value);
                break;
            case 7:
                $this->setTdate($value);
                break;
            case 8:
                $this->setRtype($value);
                break;
            case 9:
                $this->setFirstseat($value);
                break;
            case 10:
                $this->setSecondseat($value);
                break;
            case 11:
                $this->setRincrease($value);
                break;
            case 12:
                $this->setRurl($value);
                break;
            case 13:
                $this->setCalcDate($value);
                break;
            case 14:
                $this->setTshow($value);
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
        $keys = AliPromotionTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setRid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRcode($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setName($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setRdate($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCalc($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setRemark($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setFdate($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setTdate($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setRtype($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setFirstseat($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSecondseat($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setRincrease($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setRurl($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCalcDate($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setTshow($arr[$keys[14]]);
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
     * @return $this|\CciOrm\CciOrm\AliPromotion The current object, for fluid interface
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
        $criteria = new Criteria(AliPromotionTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliPromotionTableMap::COL_RID)) {
            $criteria->add(AliPromotionTableMap::COL_RID, $this->rid);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_RCODE)) {
            $criteria->add(AliPromotionTableMap::COL_RCODE, $this->rcode);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_NAME)) {
            $criteria->add(AliPromotionTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_RDATE)) {
            $criteria->add(AliPromotionTableMap::COL_RDATE, $this->rdate);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_CALC)) {
            $criteria->add(AliPromotionTableMap::COL_CALC, $this->calc);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_REMARK)) {
            $criteria->add(AliPromotionTableMap::COL_REMARK, $this->remark);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_FDATE)) {
            $criteria->add(AliPromotionTableMap::COL_FDATE, $this->fdate);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_TDATE)) {
            $criteria->add(AliPromotionTableMap::COL_TDATE, $this->tdate);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_RTYPE)) {
            $criteria->add(AliPromotionTableMap::COL_RTYPE, $this->rtype);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_FIRSTSEAT)) {
            $criteria->add(AliPromotionTableMap::COL_FIRSTSEAT, $this->firstseat);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_SECONDSEAT)) {
            $criteria->add(AliPromotionTableMap::COL_SECONDSEAT, $this->secondseat);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_RINCREASE)) {
            $criteria->add(AliPromotionTableMap::COL_RINCREASE, $this->rincrease);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_RURL)) {
            $criteria->add(AliPromotionTableMap::COL_RURL, $this->rurl);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_CALC_DATE)) {
            $criteria->add(AliPromotionTableMap::COL_CALC_DATE, $this->calc_date);
        }
        if ($this->isColumnModified(AliPromotionTableMap::COL_TSHOW)) {
            $criteria->add(AliPromotionTableMap::COL_TSHOW, $this->tshow);
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
        $criteria = ChildAliPromotionQuery::create();
        $criteria->add(AliPromotionTableMap::COL_RID, $this->rid);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliPromotion (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRcode($this->getRcode());
        $copyObj->setName($this->getName());
        $copyObj->setRdate($this->getRdate());
        $copyObj->setCalc($this->getCalc());
        $copyObj->setRemark($this->getRemark());
        $copyObj->setFdate($this->getFdate());
        $copyObj->setTdate($this->getTdate());
        $copyObj->setRtype($this->getRtype());
        $copyObj->setFirstseat($this->getFirstseat());
        $copyObj->setSecondseat($this->getSecondseat());
        $copyObj->setRincrease($this->getRincrease());
        $copyObj->setRurl($this->getRurl());
        $copyObj->setCalcDate($this->getCalcDate());
        $copyObj->setTshow($this->getTshow());
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
     * @return \CciOrm\CciOrm\AliPromotion Clone of current object.
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
        $this->name = null;
        $this->rdate = null;
        $this->calc = null;
        $this->remark = null;
        $this->fdate = null;
        $this->tdate = null;
        $this->rtype = null;
        $this->firstseat = null;
        $this->secondseat = null;
        $this->rincrease = null;
        $this->rurl = null;
        $this->calc_date = null;
        $this->tshow = null;
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
        return (string) $this->exportTo(AliPromotionTableMap::DEFAULT_STRING_FORMAT);
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
