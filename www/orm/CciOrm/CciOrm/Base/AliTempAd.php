<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTempAdQuery as ChildAliTempAdQuery;
use CciOrm\CciOrm\Map\AliTempAdTableMap;
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
 * Base class that represents a row from the 'ali_temp_ad' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliTempAd implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliTempAdTableMap';


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
     * The value for the bdate field.
     *
     * @var        DateTime
     */
    protected $bdate;

    /**
     * The value for the lr1 field.
     *
     * @var        string
     */
    protected $lr1;

    /**
     * The value for the rcode_l field.
     *
     * @var        string
     */
    protected $rcode_l;

    /**
     * The value for the level_l field.
     *
     * @var        string
     */
    protected $level_l;

    /**
     * The value for the mcode_l field.
     *
     * @var        string
     */
    protected $mcode_l;

    /**
     * The value for the sano_l field.
     *
     * @var        string
     */
    protected $sano_l;

    /**
     * The value for the rcode_r field.
     *
     * @var        string
     */
    protected $rcode_r;

    /**
     * The value for the level_r field.
     *
     * @var        string
     */
    protected $level_r;

    /**
     * The value for the mcode_r field.
     *
     * @var        string
     */
    protected $mcode_r;

    /**
     * The value for the sano_r field.
     *
     * @var        string
     */
    protected $sano_r;

    /**
     * The value for the total field.
     *
     * @var        string
     */
    protected $total;

    /**
     * The value for the flag field.
     *
     * @var        string
     */
    protected $flag;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliTempAd object.
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
     * Compares this with another <code>AliTempAd</code> instance.  If
     * <code>obj</code> is an instance of <code>AliTempAd</code>, delegates to
     * <code>equals(AliTempAd)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliTempAd The current object, for fluid interface
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
     * Get the [optionally formatted] temporal [bdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBdate($format = NULL)
    {
        if ($format === null) {
            return $this->bdate;
        } else {
            return $this->bdate instanceof \DateTimeInterface ? $this->bdate->format($format) : null;
        }
    }

    /**
     * Get the [lr1] column value.
     *
     * @return string
     */
    public function getLr1()
    {
        return $this->lr1;
    }

    /**
     * Get the [rcode_l] column value.
     *
     * @return string
     */
    public function getRcodeL()
    {
        return $this->rcode_l;
    }

    /**
     * Get the [level_l] column value.
     *
     * @return string
     */
    public function getLevelL()
    {
        return $this->level_l;
    }

    /**
     * Get the [mcode_l] column value.
     *
     * @return string
     */
    public function getMcodeL()
    {
        return $this->mcode_l;
    }

    /**
     * Get the [sano_l] column value.
     *
     * @return string
     */
    public function getSanoL()
    {
        return $this->sano_l;
    }

    /**
     * Get the [rcode_r] column value.
     *
     * @return string
     */
    public function getRcodeR()
    {
        return $this->rcode_r;
    }

    /**
     * Get the [level_r] column value.
     *
     * @return string
     */
    public function getLevelR()
    {
        return $this->level_r;
    }

    /**
     * Get the [mcode_r] column value.
     *
     * @return string
     */
    public function getMcodeR()
    {
        return $this->mcode_r;
    }

    /**
     * Get the [sano_r] column value.
     *
     * @return string
     */
    public function getSanoR()
    {
        return $this->sano_r;
    }

    /**
     * Get the [total] column value.
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the [flag] column value.
     *
     * @return string
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliTempAdTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliTempAdTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Sets the value of [bdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setBdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->bdate !== null || $dt !== null) {
            if ($this->bdate === null || $dt === null || $dt->format("Y-m-d") !== $this->bdate->format("Y-m-d")) {
                $this->bdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTempAdTableMap::COL_BDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setBdate()

    /**
     * Set the value of [lr1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setLr1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lr1 !== $v) {
            $this->lr1 = $v;
            $this->modifiedColumns[AliTempAdTableMap::COL_LR1] = true;
        }

        return $this;
    } // setLr1()

    /**
     * Set the value of [rcode_l] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setRcodeL($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rcode_l !== $v) {
            $this->rcode_l = $v;
            $this->modifiedColumns[AliTempAdTableMap::COL_RCODE_L] = true;
        }

        return $this;
    } // setRcodeL()

    /**
     * Set the value of [level_l] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setLevelL($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->level_l !== $v) {
            $this->level_l = $v;
            $this->modifiedColumns[AliTempAdTableMap::COL_LEVEL_L] = true;
        }

        return $this;
    } // setLevelL()

    /**
     * Set the value of [mcode_l] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setMcodeL($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode_l !== $v) {
            $this->mcode_l = $v;
            $this->modifiedColumns[AliTempAdTableMap::COL_MCODE_L] = true;
        }

        return $this;
    } // setMcodeL()

    /**
     * Set the value of [sano_l] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setSanoL($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano_l !== $v) {
            $this->sano_l = $v;
            $this->modifiedColumns[AliTempAdTableMap::COL_SANO_L] = true;
        }

        return $this;
    } // setSanoL()

    /**
     * Set the value of [rcode_r] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setRcodeR($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rcode_r !== $v) {
            $this->rcode_r = $v;
            $this->modifiedColumns[AliTempAdTableMap::COL_RCODE_R] = true;
        }

        return $this;
    } // setRcodeR()

    /**
     * Set the value of [level_r] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setLevelR($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->level_r !== $v) {
            $this->level_r = $v;
            $this->modifiedColumns[AliTempAdTableMap::COL_LEVEL_R] = true;
        }

        return $this;
    } // setLevelR()

    /**
     * Set the value of [mcode_r] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setMcodeR($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode_r !== $v) {
            $this->mcode_r = $v;
            $this->modifiedColumns[AliTempAdTableMap::COL_MCODE_R] = true;
        }

        return $this;
    } // setMcodeR()

    /**
     * Set the value of [sano_r] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setSanoR($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano_r !== $v) {
            $this->sano_r = $v;
            $this->modifiedColumns[AliTempAdTableMap::COL_SANO_R] = true;
        }

        return $this;
    } // setSanoR()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[AliTempAdTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [flag] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object (for fluent API support)
     */
    public function setFlag($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->flag !== $v) {
            $this->flag = $v;
            $this->modifiedColumns[AliTempAdTableMap::COL_FLAG] = true;
        }

        return $this;
    } // setFlag()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliTempAdTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliTempAdTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliTempAdTableMap::translateFieldName('Bdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->bdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliTempAdTableMap::translateFieldName('Lr1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lr1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliTempAdTableMap::translateFieldName('RcodeL', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode_l = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliTempAdTableMap::translateFieldName('LevelL', TableMap::TYPE_PHPNAME, $indexType)];
            $this->level_l = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliTempAdTableMap::translateFieldName('McodeL', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode_l = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliTempAdTableMap::translateFieldName('SanoL', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano_l = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliTempAdTableMap::translateFieldName('RcodeR', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode_r = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliTempAdTableMap::translateFieldName('LevelR', TableMap::TYPE_PHPNAME, $indexType)];
            $this->level_r = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliTempAdTableMap::translateFieldName('McodeR', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode_r = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliTempAdTableMap::translateFieldName('SanoR', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano_r = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliTempAdTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliTempAdTableMap::translateFieldName('Flag', TableMap::TYPE_PHPNAME, $indexType)];
            $this->flag = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 14; // 14 = AliTempAdTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliTempAd'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliTempAdTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliTempAdQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliTempAd::setDeleted()
     * @see AliTempAd::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTempAdTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliTempAdQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTempAdTableMap::DATABASE_NAME);
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
                AliTempAdTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliTempAdTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliTempAdTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliTempAdTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_BDATE)) {
            $modifiedColumns[':p' . $index++]  = 'bdate';
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_LR1)) {
            $modifiedColumns[':p' . $index++]  = 'lr1';
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_RCODE_L)) {
            $modifiedColumns[':p' . $index++]  = 'rcode_l';
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_LEVEL_L)) {
            $modifiedColumns[':p' . $index++]  = 'level_l';
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_MCODE_L)) {
            $modifiedColumns[':p' . $index++]  = 'mcode_l';
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_SANO_L)) {
            $modifiedColumns[':p' . $index++]  = 'sano_l';
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_RCODE_R)) {
            $modifiedColumns[':p' . $index++]  = 'rcode_r';
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_LEVEL_R)) {
            $modifiedColumns[':p' . $index++]  = 'level_r';
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_MCODE_R)) {
            $modifiedColumns[':p' . $index++]  = 'mcode_r';
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_SANO_R)) {
            $modifiedColumns[':p' . $index++]  = 'sano_r';
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_FLAG)) {
            $modifiedColumns[':p' . $index++]  = 'flag';
        }

        $sql = sprintf(
            'INSERT INTO ali_temp_ad (%s) VALUES (%s)',
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
                    case 'bdate':
                        $stmt->bindValue($identifier, $this->bdate ? $this->bdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'lr1':
                        $stmt->bindValue($identifier, $this->lr1, PDO::PARAM_STR);
                        break;
                    case 'rcode_l':
                        $stmt->bindValue($identifier, $this->rcode_l, PDO::PARAM_STR);
                        break;
                    case 'level_l':
                        $stmt->bindValue($identifier, $this->level_l, PDO::PARAM_STR);
                        break;
                    case 'mcode_l':
                        $stmt->bindValue($identifier, $this->mcode_l, PDO::PARAM_STR);
                        break;
                    case 'sano_l':
                        $stmt->bindValue($identifier, $this->sano_l, PDO::PARAM_STR);
                        break;
                    case 'rcode_r':
                        $stmt->bindValue($identifier, $this->rcode_r, PDO::PARAM_STR);
                        break;
                    case 'level_r':
                        $stmt->bindValue($identifier, $this->level_r, PDO::PARAM_STR);
                        break;
                    case 'mcode_r':
                        $stmt->bindValue($identifier, $this->mcode_r, PDO::PARAM_STR);
                        break;
                    case 'sano_r':
                        $stmt->bindValue($identifier, $this->sano_r, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'flag':
                        $stmt->bindValue($identifier, $this->flag, PDO::PARAM_STR);
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
        $pos = AliTempAdTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getBdate();
                break;
            case 3:
                return $this->getLr1();
                break;
            case 4:
                return $this->getRcodeL();
                break;
            case 5:
                return $this->getLevelL();
                break;
            case 6:
                return $this->getMcodeL();
                break;
            case 7:
                return $this->getSanoL();
                break;
            case 8:
                return $this->getRcodeR();
                break;
            case 9:
                return $this->getLevelR();
                break;
            case 10:
                return $this->getMcodeR();
                break;
            case 11:
                return $this->getSanoR();
                break;
            case 12:
                return $this->getTotal();
                break;
            case 13:
                return $this->getFlag();
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

        if (isset($alreadyDumpedObjects['AliTempAd'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliTempAd'][$this->hashCode()] = true;
        $keys = AliTempAdTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getMcode(),
            $keys[2] => $this->getBdate(),
            $keys[3] => $this->getLr1(),
            $keys[4] => $this->getRcodeL(),
            $keys[5] => $this->getLevelL(),
            $keys[6] => $this->getMcodeL(),
            $keys[7] => $this->getSanoL(),
            $keys[8] => $this->getRcodeR(),
            $keys[9] => $this->getLevelR(),
            $keys[10] => $this->getMcodeR(),
            $keys[11] => $this->getSanoR(),
            $keys[12] => $this->getTotal(),
            $keys[13] => $this->getFlag(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliTempAd
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliTempAdTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliTempAd
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
                $this->setBdate($value);
                break;
            case 3:
                $this->setLr1($value);
                break;
            case 4:
                $this->setRcodeL($value);
                break;
            case 5:
                $this->setLevelL($value);
                break;
            case 6:
                $this->setMcodeL($value);
                break;
            case 7:
                $this->setSanoL($value);
                break;
            case 8:
                $this->setRcodeR($value);
                break;
            case 9:
                $this->setLevelR($value);
                break;
            case 10:
                $this->setMcodeR($value);
                break;
            case 11:
                $this->setSanoR($value);
                break;
            case 12:
                $this->setTotal($value);
                break;
            case 13:
                $this->setFlag($value);
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
        $keys = AliTempAdTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setMcode($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setBdate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setLr1($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setRcodeL($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setLevelL($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setMcodeL($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setSanoL($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setRcodeR($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setLevelR($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setMcodeR($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setSanoR($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setTotal($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setFlag($arr[$keys[13]]);
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
     * @return $this|\CciOrm\CciOrm\AliTempAd The current object, for fluid interface
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
        $criteria = new Criteria(AliTempAdTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliTempAdTableMap::COL_ID)) {
            $criteria->add(AliTempAdTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_MCODE)) {
            $criteria->add(AliTempAdTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_BDATE)) {
            $criteria->add(AliTempAdTableMap::COL_BDATE, $this->bdate);
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_LR1)) {
            $criteria->add(AliTempAdTableMap::COL_LR1, $this->lr1);
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_RCODE_L)) {
            $criteria->add(AliTempAdTableMap::COL_RCODE_L, $this->rcode_l);
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_LEVEL_L)) {
            $criteria->add(AliTempAdTableMap::COL_LEVEL_L, $this->level_l);
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_MCODE_L)) {
            $criteria->add(AliTempAdTableMap::COL_MCODE_L, $this->mcode_l);
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_SANO_L)) {
            $criteria->add(AliTempAdTableMap::COL_SANO_L, $this->sano_l);
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_RCODE_R)) {
            $criteria->add(AliTempAdTableMap::COL_RCODE_R, $this->rcode_r);
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_LEVEL_R)) {
            $criteria->add(AliTempAdTableMap::COL_LEVEL_R, $this->level_r);
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_MCODE_R)) {
            $criteria->add(AliTempAdTableMap::COL_MCODE_R, $this->mcode_r);
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_SANO_R)) {
            $criteria->add(AliTempAdTableMap::COL_SANO_R, $this->sano_r);
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_TOTAL)) {
            $criteria->add(AliTempAdTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(AliTempAdTableMap::COL_FLAG)) {
            $criteria->add(AliTempAdTableMap::COL_FLAG, $this->flag);
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
        $criteria = ChildAliTempAdQuery::create();
        $criteria->add(AliTempAdTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliTempAd (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMcode($this->getMcode());
        $copyObj->setBdate($this->getBdate());
        $copyObj->setLr1($this->getLr1());
        $copyObj->setRcodeL($this->getRcodeL());
        $copyObj->setLevelL($this->getLevelL());
        $copyObj->setMcodeL($this->getMcodeL());
        $copyObj->setSanoL($this->getSanoL());
        $copyObj->setRcodeR($this->getRcodeR());
        $copyObj->setLevelR($this->getLevelR());
        $copyObj->setMcodeR($this->getMcodeR());
        $copyObj->setSanoR($this->getSanoR());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setFlag($this->getFlag());
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
     * @return \CciOrm\CciOrm\AliTempAd Clone of current object.
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
        $this->bdate = null;
        $this->lr1 = null;
        $this->rcode_l = null;
        $this->level_l = null;
        $this->mcode_l = null;
        $this->sano_l = null;
        $this->rcode_r = null;
        $this->level_r = null;
        $this->mcode_r = null;
        $this->sano_r = null;
        $this->total = null;
        $this->flag = null;
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
        return (string) $this->exportTo(AliTempAdTableMap::DEFAULT_STRING_FORMAT);
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
