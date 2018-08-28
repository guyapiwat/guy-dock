<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTmbonus1Query as ChildAliTmbonus1Query;
use CciOrm\CciOrm\Map\AliTmbonus1TableMap;
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
 * Base class that represents a row from the 'ali_tmbonus1' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliTmbonus1 implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliTmbonus1TableMap';


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
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the mcode field.
     *
     * @var        string
     */
    protected $mcode;

    /**
     * The value for the name_f field.
     *
     * @var        string
     */
    protected $name_f;

    /**
     * The value for the name_t field.
     *
     * @var        string
     */
    protected $name_t;

    /**
     * The value for the rcode field.
     *
     * @var        int
     */
    protected $rcode;

    /**
     * The value for the smallbig field.
     *
     * @var        int
     */
    protected $smallbig;

    /**
     * The value for the point field.
     *
     * @var        string
     */
    protected $point;

    /**
     * The value for the seats field.
     *
     * @var        int
     */
    protected $seats;

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
     * The value for the locationbase field.
     *
     * @var        int
     */
    protected $locationbase;

    /**
     * The value for the firstseatpoint field.
     *
     * @var        string
     */
    protected $firstseatpoint;

    /**
     * The value for the secondseatpoint field.
     *
     * @var        string
     */
    protected $secondseatpoint;

    /**
     * The value for the function_count field.
     *
     * @var        int
     */
    protected $function_count;

    /**
     * The value for the groupvp field.
     *
     * @var        int
     */
    protected $groupvp;

    /**
     * The value for the couple field.
     *
     * @var        int
     */
    protected $couple;

    /**
     * The value for the pos_cur field.
     *
     * @var        string
     */
    protected $pos_cur;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliTmbonus1 object.
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
     * Compares this with another <code>AliTmbonus1</code> instance.  If
     * <code>obj</code> is an instance of <code>AliTmbonus1</code>, delegates to
     * <code>equals(AliTmbonus1)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliTmbonus1 The current object, for fluid interface
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
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [mcode] column value.
     *
     * @return string
     */
    public function getMcode()
    {
        return $this->mcode;
    }

    /**
     * Get the [name_f] column value.
     *
     * @return string
     */
    public function getNameF()
    {
        return $this->name_f;
    }

    /**
     * Get the [name_t] column value.
     *
     * @return string
     */
    public function getNameT()
    {
        return $this->name_t;
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
     * Get the [smallbig] column value.
     *
     * @return int
     */
    public function getSmallbig()
    {
        return $this->smallbig;
    }

    /**
     * Get the [point] column value.
     *
     * @return string
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Get the [seats] column value.
     *
     * @return int
     */
    public function getSeats()
    {
        return $this->seats;
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
     * Get the [locationbase] column value.
     *
     * @return int
     */
    public function getLocationbase()
    {
        return $this->locationbase;
    }

    /**
     * Get the [firstseatpoint] column value.
     *
     * @return string
     */
    public function getFirstseatpoint()
    {
        return $this->firstseatpoint;
    }

    /**
     * Get the [secondseatpoint] column value.
     *
     * @return string
     */
    public function getSecondseatpoint()
    {
        return $this->secondseatpoint;
    }

    /**
     * Get the [function_count] column value.
     *
     * @return int
     */
    public function getFunctionCount()
    {
        return $this->function_count;
    }

    /**
     * Get the [groupvp] column value.
     *
     * @return int
     */
    public function getGroupvp()
    {
        return $this->groupvp;
    }

    /**
     * Get the [couple] column value.
     *
     * @return int
     */
    public function getCouple()
    {
        return $this->couple;
    }

    /**
     * Get the [pos_cur] column value.
     *
     * @return string
     */
    public function getPosCur()
    {
        return $this->pos_cur;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [name_f] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setNameF($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_f !== $v) {
            $this->name_f = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_NAME_F] = true;
        }

        return $this;
    } // setNameF()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Set the value of [rcode] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setRcode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rcode !== $v) {
            $this->rcode = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_RCODE] = true;
        }

        return $this;
    } // setRcode()

    /**
     * Set the value of [smallbig] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setSmallbig($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->smallbig !== $v) {
            $this->smallbig = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_SMALLBIG] = true;
        }

        return $this;
    } // setSmallbig()

    /**
     * Set the value of [point] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setPoint($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->point !== $v) {
            $this->point = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_POINT] = true;
        }

        return $this;
    } // setPoint()

    /**
     * Set the value of [seats] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setSeats($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->seats !== $v) {
            $this->seats = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_SEATS] = true;
        }

        return $this;
    } // setSeats()

    /**
     * Sets the value of [fdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setFdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fdate !== null || $dt !== null) {
            if ($this->fdate === null || $dt === null || $dt->format("Y-m-d") !== $this->fdate->format("Y-m-d")) {
                $this->fdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTmbonus1TableMap::COL_FDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFdate()

    /**
     * Sets the value of [tdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setTdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tdate !== null || $dt !== null) {
            if ($this->tdate === null || $dt === null || $dt->format("Y-m-d") !== $this->tdate->format("Y-m-d")) {
                $this->tdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTmbonus1TableMap::COL_TDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setTdate()

    /**
     * Set the value of [locationbase] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setLocationbase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->locationbase !== $v) {
            $this->locationbase = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_LOCATIONBASE] = true;
        }

        return $this;
    } // setLocationbase()

    /**
     * Set the value of [firstseatpoint] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setFirstseatpoint($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->firstseatpoint !== $v) {
            $this->firstseatpoint = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_FIRSTSEATPOINT] = true;
        }

        return $this;
    } // setFirstseatpoint()

    /**
     * Set the value of [secondseatpoint] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setSecondseatpoint($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->secondseatpoint !== $v) {
            $this->secondseatpoint = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_SECONDSEATPOINT] = true;
        }

        return $this;
    } // setSecondseatpoint()

    /**
     * Set the value of [function_count] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setFunctionCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->function_count !== $v) {
            $this->function_count = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_FUNCTION_COUNT] = true;
        }

        return $this;
    } // setFunctionCount()

    /**
     * Set the value of [groupvp] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setGroupvp($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->groupvp !== $v) {
            $this->groupvp = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_GROUPVP] = true;
        }

        return $this;
    } // setGroupvp()

    /**
     * Set the value of [couple] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setCouple($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->couple !== $v) {
            $this->couple = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_COUPLE] = true;
        }

        return $this;
    } // setCouple()

    /**
     * Set the value of [pos_cur] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object (for fluent API support)
     */
    public function setPosCur($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur !== $v) {
            $this->pos_cur = $v;
            $this->modifiedColumns[AliTmbonus1TableMap::COL_POS_CUR] = true;
        }

        return $this;
    } // setPosCur()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliTmbonus1TableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliTmbonus1TableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliTmbonus1TableMap::translateFieldName('NameF', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_f = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliTmbonus1TableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliTmbonus1TableMap::translateFieldName('Rcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliTmbonus1TableMap::translateFieldName('Smallbig', TableMap::TYPE_PHPNAME, $indexType)];
            $this->smallbig = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliTmbonus1TableMap::translateFieldName('Point', TableMap::TYPE_PHPNAME, $indexType)];
            $this->point = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliTmbonus1TableMap::translateFieldName('Seats', TableMap::TYPE_PHPNAME, $indexType)];
            $this->seats = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliTmbonus1TableMap::translateFieldName('Fdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliTmbonus1TableMap::translateFieldName('Tdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->tdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliTmbonus1TableMap::translateFieldName('Locationbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locationbase = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliTmbonus1TableMap::translateFieldName('Firstseatpoint', TableMap::TYPE_PHPNAME, $indexType)];
            $this->firstseatpoint = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliTmbonus1TableMap::translateFieldName('Secondseatpoint', TableMap::TYPE_PHPNAME, $indexType)];
            $this->secondseatpoint = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliTmbonus1TableMap::translateFieldName('FunctionCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->function_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliTmbonus1TableMap::translateFieldName('Groupvp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->groupvp = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliTmbonus1TableMap::translateFieldName('Couple', TableMap::TYPE_PHPNAME, $indexType)];
            $this->couple = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliTmbonus1TableMap::translateFieldName('PosCur', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 17; // 17 = AliTmbonus1TableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliTmbonus1'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliTmbonus1TableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliTmbonus1Query::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliTmbonus1::setDeleted()
     * @see AliTmbonus1::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTmbonus1TableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliTmbonus1Query::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTmbonus1TableMap::DATABASE_NAME);
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
                AliTmbonus1TableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliTmbonus1TableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliTmbonus1TableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_NAME_F)) {
            $modifiedColumns[':p' . $index++]  = 'name_f';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_RCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rcode';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_SMALLBIG)) {
            $modifiedColumns[':p' . $index++]  = 'smallbig';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_POINT)) {
            $modifiedColumns[':p' . $index++]  = 'point';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_SEATS)) {
            $modifiedColumns[':p' . $index++]  = 'seats';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_FDATE)) {
            $modifiedColumns[':p' . $index++]  = 'fdate';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_TDATE)) {
            $modifiedColumns[':p' . $index++]  = 'tdate';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_LOCATIONBASE)) {
            $modifiedColumns[':p' . $index++]  = 'locationbase';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_FIRSTSEATPOINT)) {
            $modifiedColumns[':p' . $index++]  = 'firstseatpoint';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_SECONDSEATPOINT)) {
            $modifiedColumns[':p' . $index++]  = 'secondseatpoint';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_FUNCTION_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'function_count';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_GROUPVP)) {
            $modifiedColumns[':p' . $index++]  = 'groupvp';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_COUPLE)) {
            $modifiedColumns[':p' . $index++]  = 'couple';
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_POS_CUR)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur';
        }

        $sql = sprintf(
            'INSERT INTO ali_tmbonus1 (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'mcode':
                        $stmt->bindValue($identifier, $this->mcode, PDO::PARAM_STR);
                        break;
                    case 'name_f':
                        $stmt->bindValue($identifier, $this->name_f, PDO::PARAM_STR);
                        break;
                    case 'name_t':
                        $stmt->bindValue($identifier, $this->name_t, PDO::PARAM_STR);
                        break;
                    case 'rcode':
                        $stmt->bindValue($identifier, $this->rcode, PDO::PARAM_INT);
                        break;
                    case 'smallbig':
                        $stmt->bindValue($identifier, $this->smallbig, PDO::PARAM_INT);
                        break;
                    case 'point':
                        $stmt->bindValue($identifier, $this->point, PDO::PARAM_STR);
                        break;
                    case 'seats':
                        $stmt->bindValue($identifier, $this->seats, PDO::PARAM_INT);
                        break;
                    case 'fdate':
                        $stmt->bindValue($identifier, $this->fdate ? $this->fdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tdate':
                        $stmt->bindValue($identifier, $this->tdate ? $this->tdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'locationbase':
                        $stmt->bindValue($identifier, $this->locationbase, PDO::PARAM_INT);
                        break;
                    case 'firstseatpoint':
                        $stmt->bindValue($identifier, $this->firstseatpoint, PDO::PARAM_STR);
                        break;
                    case 'secondseatpoint':
                        $stmt->bindValue($identifier, $this->secondseatpoint, PDO::PARAM_STR);
                        break;
                    case 'function_count':
                        $stmt->bindValue($identifier, $this->function_count, PDO::PARAM_INT);
                        break;
                    case 'groupvp':
                        $stmt->bindValue($identifier, $this->groupvp, PDO::PARAM_INT);
                        break;
                    case 'couple':
                        $stmt->bindValue($identifier, $this->couple, PDO::PARAM_INT);
                        break;
                    case 'pos_cur':
                        $stmt->bindValue($identifier, $this->pos_cur, PDO::PARAM_STR);
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
        $this->setId($pk);

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
        $pos = AliTmbonus1TableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getId();
                break;
            case 1:
                return $this->getMcode();
                break;
            case 2:
                return $this->getNameF();
                break;
            case 3:
                return $this->getNameT();
                break;
            case 4:
                return $this->getRcode();
                break;
            case 5:
                return $this->getSmallbig();
                break;
            case 6:
                return $this->getPoint();
                break;
            case 7:
                return $this->getSeats();
                break;
            case 8:
                return $this->getFdate();
                break;
            case 9:
                return $this->getTdate();
                break;
            case 10:
                return $this->getLocationbase();
                break;
            case 11:
                return $this->getFirstseatpoint();
                break;
            case 12:
                return $this->getSecondseatpoint();
                break;
            case 13:
                return $this->getFunctionCount();
                break;
            case 14:
                return $this->getGroupvp();
                break;
            case 15:
                return $this->getCouple();
                break;
            case 16:
                return $this->getPosCur();
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

        if (isset($alreadyDumpedObjects['AliTmbonus1'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliTmbonus1'][$this->hashCode()] = true;
        $keys = AliTmbonus1TableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getMcode(),
            $keys[2] => $this->getNameF(),
            $keys[3] => $this->getNameT(),
            $keys[4] => $this->getRcode(),
            $keys[5] => $this->getSmallbig(),
            $keys[6] => $this->getPoint(),
            $keys[7] => $this->getSeats(),
            $keys[8] => $this->getFdate(),
            $keys[9] => $this->getTdate(),
            $keys[10] => $this->getLocationbase(),
            $keys[11] => $this->getFirstseatpoint(),
            $keys[12] => $this->getSecondseatpoint(),
            $keys[13] => $this->getFunctionCount(),
            $keys[14] => $this->getGroupvp(),
            $keys[15] => $this->getCouple(),
            $keys[16] => $this->getPosCur(),
        );
        if ($result[$keys[8]] instanceof \DateTimeInterface) {
            $result[$keys[8]] = $result[$keys[8]]->format('c');
        }

        if ($result[$keys[9]] instanceof \DateTimeInterface) {
            $result[$keys[9]] = $result[$keys[9]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliTmbonus1
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliTmbonus1TableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliTmbonus1
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setMcode($value);
                break;
            case 2:
                $this->setNameF($value);
                break;
            case 3:
                $this->setNameT($value);
                break;
            case 4:
                $this->setRcode($value);
                break;
            case 5:
                $this->setSmallbig($value);
                break;
            case 6:
                $this->setPoint($value);
                break;
            case 7:
                $this->setSeats($value);
                break;
            case 8:
                $this->setFdate($value);
                break;
            case 9:
                $this->setTdate($value);
                break;
            case 10:
                $this->setLocationbase($value);
                break;
            case 11:
                $this->setFirstseatpoint($value);
                break;
            case 12:
                $this->setSecondseatpoint($value);
                break;
            case 13:
                $this->setFunctionCount($value);
                break;
            case 14:
                $this->setGroupvp($value);
                break;
            case 15:
                $this->setCouple($value);
                break;
            case 16:
                $this->setPosCur($value);
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
        $keys = AliTmbonus1TableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setMcode($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setNameF($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setNameT($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setRcode($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setSmallbig($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPoint($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setSeats($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setFdate($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTdate($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setLocationbase($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setFirstseatpoint($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setSecondseatpoint($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setFunctionCount($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setGroupvp($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCouple($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setPosCur($arr[$keys[16]]);
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
     * @return $this|\CciOrm\CciOrm\AliTmbonus1 The current object, for fluid interface
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
        $criteria = new Criteria(AliTmbonus1TableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliTmbonus1TableMap::COL_ID)) {
            $criteria->add(AliTmbonus1TableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_MCODE)) {
            $criteria->add(AliTmbonus1TableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_NAME_F)) {
            $criteria->add(AliTmbonus1TableMap::COL_NAME_F, $this->name_f);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_NAME_T)) {
            $criteria->add(AliTmbonus1TableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_RCODE)) {
            $criteria->add(AliTmbonus1TableMap::COL_RCODE, $this->rcode);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_SMALLBIG)) {
            $criteria->add(AliTmbonus1TableMap::COL_SMALLBIG, $this->smallbig);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_POINT)) {
            $criteria->add(AliTmbonus1TableMap::COL_POINT, $this->point);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_SEATS)) {
            $criteria->add(AliTmbonus1TableMap::COL_SEATS, $this->seats);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_FDATE)) {
            $criteria->add(AliTmbonus1TableMap::COL_FDATE, $this->fdate);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_TDATE)) {
            $criteria->add(AliTmbonus1TableMap::COL_TDATE, $this->tdate);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_LOCATIONBASE)) {
            $criteria->add(AliTmbonus1TableMap::COL_LOCATIONBASE, $this->locationbase);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_FIRSTSEATPOINT)) {
            $criteria->add(AliTmbonus1TableMap::COL_FIRSTSEATPOINT, $this->firstseatpoint);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_SECONDSEATPOINT)) {
            $criteria->add(AliTmbonus1TableMap::COL_SECONDSEATPOINT, $this->secondseatpoint);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_FUNCTION_COUNT)) {
            $criteria->add(AliTmbonus1TableMap::COL_FUNCTION_COUNT, $this->function_count);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_GROUPVP)) {
            $criteria->add(AliTmbonus1TableMap::COL_GROUPVP, $this->groupvp);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_COUPLE)) {
            $criteria->add(AliTmbonus1TableMap::COL_COUPLE, $this->couple);
        }
        if ($this->isColumnModified(AliTmbonus1TableMap::COL_POS_CUR)) {
            $criteria->add(AliTmbonus1TableMap::COL_POS_CUR, $this->pos_cur);
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
        $criteria = ChildAliTmbonus1Query::create();
        $criteria->add(AliTmbonus1TableMap::COL_ID, $this->id);

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
        $validPk = null !== $this->getId();

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
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliTmbonus1 (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMcode($this->getMcode());
        $copyObj->setNameF($this->getNameF());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setRcode($this->getRcode());
        $copyObj->setSmallbig($this->getSmallbig());
        $copyObj->setPoint($this->getPoint());
        $copyObj->setSeats($this->getSeats());
        $copyObj->setFdate($this->getFdate());
        $copyObj->setTdate($this->getTdate());
        $copyObj->setLocationbase($this->getLocationbase());
        $copyObj->setFirstseatpoint($this->getFirstseatpoint());
        $copyObj->setSecondseatpoint($this->getSecondseatpoint());
        $copyObj->setFunctionCount($this->getFunctionCount());
        $copyObj->setGroupvp($this->getGroupvp());
        $copyObj->setCouple($this->getCouple());
        $copyObj->setPosCur($this->getPosCur());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \CciOrm\CciOrm\AliTmbonus1 Clone of current object.
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
        $this->id = null;
        $this->mcode = null;
        $this->name_f = null;
        $this->name_t = null;
        $this->rcode = null;
        $this->smallbig = null;
        $this->point = null;
        $this->seats = null;
        $this->fdate = null;
        $this->tdate = null;
        $this->locationbase = null;
        $this->firstseatpoint = null;
        $this->secondseatpoint = null;
        $this->function_count = null;
        $this->groupvp = null;
        $this->couple = null;
        $this->pos_cur = null;
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
        return (string) $this->exportTo(AliTmbonus1TableMap::DEFAULT_STRING_FORMAT);
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
