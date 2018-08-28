<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliGmbonusQuery as ChildAliGmbonusQuery;
use CciOrm\CciOrm\Map\AliGmbonusTableMap;
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
 * Base class that represents a row from the 'ali_gmbonus' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliGmbonus implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliGmbonusTableMap';


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
     * The value for the name_t field.
     *
     * @var        string
     */
    protected $name_t;

    /**
     * The value for the fast_bonus field.
     *
     * @var        string
     */
    protected $fast_bonus;

    /**
     * The value for the cycle_bonus field.
     *
     * @var        string
     */
    protected $cycle_bonus;

    /**
     * The value for the matching_bonus field.
     *
     * @var        string
     */
    protected $matching_bonus;

    /**
     * The value for the key_bonus field.
     *
     * @var        string
     */
    protected $key_bonus;

    /**
     * The value for the autoship field.
     *
     * @var        string
     */
    protected $autoship;

    /**
     * The value for the rcode field.
     *
     * @var        int
     */
    protected $rcode;

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
     * The value for the beatoship field.
     *
     * @var        string
     */
    protected $beatoship;

    /**
     * The value for the bvoucher field.
     *
     * @var        string
     */
    protected $bvoucher;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliGmbonus object.
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
     * Compares this with another <code>AliGmbonus</code> instance.  If
     * <code>obj</code> is an instance of <code>AliGmbonus</code>, delegates to
     * <code>equals(AliGmbonus)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliGmbonus The current object, for fluid interface
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
     * Get the [name_t] column value.
     *
     * @return string
     */
    public function getNameT()
    {
        return $this->name_t;
    }

    /**
     * Get the [fast_bonus] column value.
     *
     * @return string
     */
    public function getFastBonus()
    {
        return $this->fast_bonus;
    }

    /**
     * Get the [cycle_bonus] column value.
     *
     * @return string
     */
    public function getCycleBonus()
    {
        return $this->cycle_bonus;
    }

    /**
     * Get the [matching_bonus] column value.
     *
     * @return string
     */
    public function getMatchingBonus()
    {
        return $this->matching_bonus;
    }

    /**
     * Get the [key_bonus] column value.
     *
     * @return string
     */
    public function getKeyBonus()
    {
        return $this->key_bonus;
    }

    /**
     * Get the [autoship] column value.
     *
     * @return string
     */
    public function getAutoship()
    {
        return $this->autoship;
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
     * Get the [beatoship] column value.
     *
     * @return string
     */
    public function getBeatoship()
    {
        return $this->beatoship;
    }

    /**
     * Get the [bvoucher] column value.
     *
     * @return string
     */
    public function getBvoucher()
    {
        return $this->bvoucher;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliGmbonusTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliGmbonusTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliGmbonusTableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Set the value of [fast_bonus] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object (for fluent API support)
     */
    public function setFastBonus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fast_bonus !== $v) {
            $this->fast_bonus = $v;
            $this->modifiedColumns[AliGmbonusTableMap::COL_FAST_BONUS] = true;
        }

        return $this;
    } // setFastBonus()

    /**
     * Set the value of [cycle_bonus] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object (for fluent API support)
     */
    public function setCycleBonus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cycle_bonus !== $v) {
            $this->cycle_bonus = $v;
            $this->modifiedColumns[AliGmbonusTableMap::COL_CYCLE_BONUS] = true;
        }

        return $this;
    } // setCycleBonus()

    /**
     * Set the value of [matching_bonus] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object (for fluent API support)
     */
    public function setMatchingBonus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->matching_bonus !== $v) {
            $this->matching_bonus = $v;
            $this->modifiedColumns[AliGmbonusTableMap::COL_MATCHING_BONUS] = true;
        }

        return $this;
    } // setMatchingBonus()

    /**
     * Set the value of [key_bonus] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object (for fluent API support)
     */
    public function setKeyBonus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->key_bonus !== $v) {
            $this->key_bonus = $v;
            $this->modifiedColumns[AliGmbonusTableMap::COL_KEY_BONUS] = true;
        }

        return $this;
    } // setKeyBonus()

    /**
     * Set the value of [autoship] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object (for fluent API support)
     */
    public function setAutoship($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->autoship !== $v) {
            $this->autoship = $v;
            $this->modifiedColumns[AliGmbonusTableMap::COL_AUTOSHIP] = true;
        }

        return $this;
    } // setAutoship()

    /**
     * Set the value of [rcode] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object (for fluent API support)
     */
    public function setRcode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rcode !== $v) {
            $this->rcode = $v;
            $this->modifiedColumns[AliGmbonusTableMap::COL_RCODE] = true;
        }

        return $this;
    } // setRcode()

    /**
     * Sets the value of [fdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object (for fluent API support)
     */
    public function setFdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fdate !== null || $dt !== null) {
            if ($this->fdate === null || $dt === null || $dt->format("Y-m-d") !== $this->fdate->format("Y-m-d")) {
                $this->fdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliGmbonusTableMap::COL_FDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFdate()

    /**
     * Sets the value of [tdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object (for fluent API support)
     */
    public function setTdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tdate !== null || $dt !== null) {
            if ($this->tdate === null || $dt === null || $dt->format("Y-m-d") !== $this->tdate->format("Y-m-d")) {
                $this->tdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliGmbonusTableMap::COL_TDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setTdate()

    /**
     * Set the value of [beatoship] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object (for fluent API support)
     */
    public function setBeatoship($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->beatoship !== $v) {
            $this->beatoship = $v;
            $this->modifiedColumns[AliGmbonusTableMap::COL_BEATOSHIP] = true;
        }

        return $this;
    } // setBeatoship()

    /**
     * Set the value of [bvoucher] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object (for fluent API support)
     */
    public function setBvoucher($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bvoucher !== $v) {
            $this->bvoucher = $v;
            $this->modifiedColumns[AliGmbonusTableMap::COL_BVOUCHER] = true;
        }

        return $this;
    } // setBvoucher()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliGmbonusTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliGmbonusTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliGmbonusTableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliGmbonusTableMap::translateFieldName('FastBonus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fast_bonus = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliGmbonusTableMap::translateFieldName('CycleBonus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cycle_bonus = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliGmbonusTableMap::translateFieldName('MatchingBonus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->matching_bonus = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliGmbonusTableMap::translateFieldName('KeyBonus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->key_bonus = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliGmbonusTableMap::translateFieldName('Autoship', TableMap::TYPE_PHPNAME, $indexType)];
            $this->autoship = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliGmbonusTableMap::translateFieldName('Rcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliGmbonusTableMap::translateFieldName('Fdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliGmbonusTableMap::translateFieldName('Tdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->tdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliGmbonusTableMap::translateFieldName('Beatoship', TableMap::TYPE_PHPNAME, $indexType)];
            $this->beatoship = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliGmbonusTableMap::translateFieldName('Bvoucher', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bvoucher = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 13; // 13 = AliGmbonusTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliGmbonus'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliGmbonusTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliGmbonusQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliGmbonus::setDeleted()
     * @see AliGmbonus::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliGmbonusTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliGmbonusQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliGmbonusTableMap::DATABASE_NAME);
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
                AliGmbonusTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliGmbonusTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliGmbonusTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliGmbonusTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_FAST_BONUS)) {
            $modifiedColumns[':p' . $index++]  = 'fast_bonus';
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_CYCLE_BONUS)) {
            $modifiedColumns[':p' . $index++]  = 'cycle_bonus';
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_MATCHING_BONUS)) {
            $modifiedColumns[':p' . $index++]  = 'matching_bonus';
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_KEY_BONUS)) {
            $modifiedColumns[':p' . $index++]  = 'key_bonus';
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_AUTOSHIP)) {
            $modifiedColumns[':p' . $index++]  = 'autoship';
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_RCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rcode';
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_FDATE)) {
            $modifiedColumns[':p' . $index++]  = 'fdate';
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_TDATE)) {
            $modifiedColumns[':p' . $index++]  = 'tdate';
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_BEATOSHIP)) {
            $modifiedColumns[':p' . $index++]  = 'beatoship';
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_BVOUCHER)) {
            $modifiedColumns[':p' . $index++]  = 'bvoucher';
        }

        $sql = sprintf(
            'INSERT INTO ali_gmbonus (%s) VALUES (%s)',
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
                    case 'name_t':
                        $stmt->bindValue($identifier, $this->name_t, PDO::PARAM_STR);
                        break;
                    case 'fast_bonus':
                        $stmt->bindValue($identifier, $this->fast_bonus, PDO::PARAM_STR);
                        break;
                    case 'cycle_bonus':
                        $stmt->bindValue($identifier, $this->cycle_bonus, PDO::PARAM_STR);
                        break;
                    case 'matching_bonus':
                        $stmt->bindValue($identifier, $this->matching_bonus, PDO::PARAM_STR);
                        break;
                    case 'key_bonus':
                        $stmt->bindValue($identifier, $this->key_bonus, PDO::PARAM_STR);
                        break;
                    case 'autoship':
                        $stmt->bindValue($identifier, $this->autoship, PDO::PARAM_STR);
                        break;
                    case 'rcode':
                        $stmt->bindValue($identifier, $this->rcode, PDO::PARAM_INT);
                        break;
                    case 'fdate':
                        $stmt->bindValue($identifier, $this->fdate ? $this->fdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tdate':
                        $stmt->bindValue($identifier, $this->tdate ? $this->tdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'beatoship':
                        $stmt->bindValue($identifier, $this->beatoship, PDO::PARAM_STR);
                        break;
                    case 'bvoucher':
                        $stmt->bindValue($identifier, $this->bvoucher, PDO::PARAM_STR);
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
        $pos = AliGmbonusTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getNameT();
                break;
            case 3:
                return $this->getFastBonus();
                break;
            case 4:
                return $this->getCycleBonus();
                break;
            case 5:
                return $this->getMatchingBonus();
                break;
            case 6:
                return $this->getKeyBonus();
                break;
            case 7:
                return $this->getAutoship();
                break;
            case 8:
                return $this->getRcode();
                break;
            case 9:
                return $this->getFdate();
                break;
            case 10:
                return $this->getTdate();
                break;
            case 11:
                return $this->getBeatoship();
                break;
            case 12:
                return $this->getBvoucher();
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

        if (isset($alreadyDumpedObjects['AliGmbonus'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliGmbonus'][$this->hashCode()] = true;
        $keys = AliGmbonusTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getMcode(),
            $keys[2] => $this->getNameT(),
            $keys[3] => $this->getFastBonus(),
            $keys[4] => $this->getCycleBonus(),
            $keys[5] => $this->getMatchingBonus(),
            $keys[6] => $this->getKeyBonus(),
            $keys[7] => $this->getAutoship(),
            $keys[8] => $this->getRcode(),
            $keys[9] => $this->getFdate(),
            $keys[10] => $this->getTdate(),
            $keys[11] => $this->getBeatoship(),
            $keys[12] => $this->getBvoucher(),
        );
        if ($result[$keys[9]] instanceof \DateTimeInterface) {
            $result[$keys[9]] = $result[$keys[9]]->format('c');
        }

        if ($result[$keys[10]] instanceof \DateTimeInterface) {
            $result[$keys[10]] = $result[$keys[10]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliGmbonus
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliGmbonusTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliGmbonus
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
                $this->setNameT($value);
                break;
            case 3:
                $this->setFastBonus($value);
                break;
            case 4:
                $this->setCycleBonus($value);
                break;
            case 5:
                $this->setMatchingBonus($value);
                break;
            case 6:
                $this->setKeyBonus($value);
                break;
            case 7:
                $this->setAutoship($value);
                break;
            case 8:
                $this->setRcode($value);
                break;
            case 9:
                $this->setFdate($value);
                break;
            case 10:
                $this->setTdate($value);
                break;
            case 11:
                $this->setBeatoship($value);
                break;
            case 12:
                $this->setBvoucher($value);
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
        $keys = AliGmbonusTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setMcode($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setNameT($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setFastBonus($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCycleBonus($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setMatchingBonus($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setKeyBonus($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setAutoship($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setRcode($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setFdate($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setTdate($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setBeatoship($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setBvoucher($arr[$keys[12]]);
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
     * @return $this|\CciOrm\CciOrm\AliGmbonus The current object, for fluid interface
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
        $criteria = new Criteria(AliGmbonusTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliGmbonusTableMap::COL_ID)) {
            $criteria->add(AliGmbonusTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_MCODE)) {
            $criteria->add(AliGmbonusTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_NAME_T)) {
            $criteria->add(AliGmbonusTableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_FAST_BONUS)) {
            $criteria->add(AliGmbonusTableMap::COL_FAST_BONUS, $this->fast_bonus);
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_CYCLE_BONUS)) {
            $criteria->add(AliGmbonusTableMap::COL_CYCLE_BONUS, $this->cycle_bonus);
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_MATCHING_BONUS)) {
            $criteria->add(AliGmbonusTableMap::COL_MATCHING_BONUS, $this->matching_bonus);
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_KEY_BONUS)) {
            $criteria->add(AliGmbonusTableMap::COL_KEY_BONUS, $this->key_bonus);
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_AUTOSHIP)) {
            $criteria->add(AliGmbonusTableMap::COL_AUTOSHIP, $this->autoship);
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_RCODE)) {
            $criteria->add(AliGmbonusTableMap::COL_RCODE, $this->rcode);
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_FDATE)) {
            $criteria->add(AliGmbonusTableMap::COL_FDATE, $this->fdate);
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_TDATE)) {
            $criteria->add(AliGmbonusTableMap::COL_TDATE, $this->tdate);
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_BEATOSHIP)) {
            $criteria->add(AliGmbonusTableMap::COL_BEATOSHIP, $this->beatoship);
        }
        if ($this->isColumnModified(AliGmbonusTableMap::COL_BVOUCHER)) {
            $criteria->add(AliGmbonusTableMap::COL_BVOUCHER, $this->bvoucher);
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
        $criteria = ChildAliGmbonusQuery::create();
        $criteria->add(AliGmbonusTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliGmbonus (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMcode($this->getMcode());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setFastBonus($this->getFastBonus());
        $copyObj->setCycleBonus($this->getCycleBonus());
        $copyObj->setMatchingBonus($this->getMatchingBonus());
        $copyObj->setKeyBonus($this->getKeyBonus());
        $copyObj->setAutoship($this->getAutoship());
        $copyObj->setRcode($this->getRcode());
        $copyObj->setFdate($this->getFdate());
        $copyObj->setTdate($this->getTdate());
        $copyObj->setBeatoship($this->getBeatoship());
        $copyObj->setBvoucher($this->getBvoucher());
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
     * @return \CciOrm\CciOrm\AliGmbonus Clone of current object.
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
        $this->name_t = null;
        $this->fast_bonus = null;
        $this->cycle_bonus = null;
        $this->matching_bonus = null;
        $this->key_bonus = null;
        $this->autoship = null;
        $this->rcode = null;
        $this->fdate = null;
        $this->tdate = null;
        $this->beatoship = null;
        $this->bvoucher = null;
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
        return (string) $this->exportTo(AliGmbonusTableMap::DEFAULT_STRING_FORMAT);
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
