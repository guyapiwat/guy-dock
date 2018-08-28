<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTransfersaleDQuery as ChildAliTransfersaleDQuery;
use CciOrm\CciOrm\Map\AliTransfersaleDTableMap;
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
 * Base class that represents a row from the 'ali_transfersale_d' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliTransfersaleD implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliTransfersaleDTableMap';


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
     * The value for the sano field.
     *
     * @var        string
     */
    protected $sano;

    /**
     * The value for the sadate field.
     *
     * @var        DateTime
     */
    protected $sadate;

    /**
     * The value for the inv_code field.
     *
     * @var        string
     */
    protected $inv_code;

    /**
     * The value for the pcode field.
     *
     * @var        string
     */
    protected $pcode;

    /**
     * The value for the pdesc field.
     *
     * @var        string
     */
    protected $pdesc;

    /**
     * The value for the unit field.
     *
     * @var        string
     */
    protected $unit;

    /**
     * The value for the mcode field.
     *
     * @var        string
     */
    protected $mcode;

    /**
     * The value for the price field.
     *
     * @var        string
     */
    protected $price;

    /**
     * The value for the pv field.
     *
     * @var        string
     */
    protected $pv;

    /**
     * The value for the bv field.
     *
     * @var        string
     */
    protected $bv;

    /**
     * The value for the fv field.
     *
     * @var        string
     */
    protected $fv;

    /**
     * The value for the weight field.
     *
     * @var        string
     */
    protected $weight;

    /**
     * The value for the qty field.
     *
     * @var        string
     */
    protected $qty;

    /**
     * The value for the amt field.
     *
     * @var        string
     */
    protected $amt;

    /**
     * The value for the bprice field.
     *
     * @var        string
     */
    protected $bprice;

    /**
     * The value for the locationbase field.
     *
     * @var        int
     */
    protected $locationbase;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliTransfersaleD object.
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
     * Compares this with another <code>AliTransfersaleD</code> instance.  If
     * <code>obj</code> is an instance of <code>AliTransfersaleD</code>, delegates to
     * <code>equals(AliTransfersaleD)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliTransfersaleD The current object, for fluid interface
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
     * Get the [sano] column value.
     *
     * @return string
     */
    public function getSano()
    {
        return $this->sano;
    }

    /**
     * Get the [optionally formatted] temporal [sadate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSadate($format = NULL)
    {
        if ($format === null) {
            return $this->sadate;
        } else {
            return $this->sadate instanceof \DateTimeInterface ? $this->sadate->format($format) : null;
        }
    }

    /**
     * Get the [inv_code] column value.
     *
     * @return string
     */
    public function getInvCode()
    {
        return $this->inv_code;
    }

    /**
     * Get the [pcode] column value.
     *
     * @return string
     */
    public function getPcode()
    {
        return $this->pcode;
    }

    /**
     * Get the [pdesc] column value.
     *
     * @return string
     */
    public function getPdesc()
    {
        return $this->pdesc;
    }

    /**
     * Get the [unit] column value.
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
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
     * Get the [price] column value.
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the [pv] column value.
     *
     * @return string
     */
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * Get the [bv] column value.
     *
     * @return string
     */
    public function getBv()
    {
        return $this->bv;
    }

    /**
     * Get the [fv] column value.
     *
     * @return string
     */
    public function getFv()
    {
        return $this->fv;
    }

    /**
     * Get the [weight] column value.
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Get the [qty] column value.
     *
     * @return string
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Get the [amt] column value.
     *
     * @return string
     */
    public function getAmt()
    {
        return $this->amt;
    }

    /**
     * Get the [bprice] column value.
     *
     * @return string
     */
    public function getBprice()
    {
        return $this->bprice;
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
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [sano] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setSano($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano !== $v) {
            $this->sano = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_SANO] = true;
        }

        return $this;
    } // setSano()

    /**
     * Sets the value of [sadate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setSadate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sadate !== null || $dt !== null) {
            if ($this->sadate === null || $dt === null || $dt->format("Y-m-d") !== $this->sadate->format("Y-m-d")) {
                $this->sadate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTransfersaleDTableMap::COL_SADATE] = true;
            }
        } // if either are not null

        return $this;
    } // setSadate()

    /**
     * Set the value of [inv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setInvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_code !== $v) {
            $this->inv_code = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_INV_CODE] = true;
        }

        return $this;
    } // setInvCode()

    /**
     * Set the value of [pcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setPcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pcode !== $v) {
            $this->pcode = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_PCODE] = true;
        }

        return $this;
    } // setPcode()

    /**
     * Set the value of [pdesc] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setPdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pdesc !== $v) {
            $this->pdesc = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_PDESC] = true;
        }

        return $this;
    } // setPdesc()

    /**
     * Set the value of [unit] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setUnit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->unit !== $v) {
            $this->unit = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_UNIT] = true;
        }

        return $this;
    } // setUnit()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [price] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_PRICE] = true;
        }

        return $this;
    } // setPrice()

    /**
     * Set the value of [pv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setPv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pv !== $v) {
            $this->pv = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_PV] = true;
        }

        return $this;
    } // setPv()

    /**
     * Set the value of [bv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setBv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bv !== $v) {
            $this->bv = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_BV] = true;
        }

        return $this;
    } // setBv()

    /**
     * Set the value of [fv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setFv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fv !== $v) {
            $this->fv = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_FV] = true;
        }

        return $this;
    } // setFv()

    /**
     * Set the value of [weight] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setWeight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->weight !== $v) {
            $this->weight = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_WEIGHT] = true;
        }

        return $this;
    } // setWeight()

    /**
     * Set the value of [qty] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setQty($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->qty !== $v) {
            $this->qty = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_QTY] = true;
        }

        return $this;
    } // setQty()

    /**
     * Set the value of [amt] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setAmt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->amt !== $v) {
            $this->amt = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_AMT] = true;
        }

        return $this;
    } // setAmt()

    /**
     * Set the value of [bprice] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setBprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bprice !== $v) {
            $this->bprice = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_BPRICE] = true;
        }

        return $this;
    } // setBprice()

    /**
     * Set the value of [locationbase] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object (for fluent API support)
     */
    public function setLocationbase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->locationbase !== $v) {
            $this->locationbase = $v;
            $this->modifiedColumns[AliTransfersaleDTableMap::COL_LOCATIONBASE] = true;
        }

        return $this;
    } // setLocationbase()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliTransfersaleDTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliTransfersaleDTableMap::translateFieldName('Sano', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliTransfersaleDTableMap::translateFieldName('Sadate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->sadate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliTransfersaleDTableMap::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliTransfersaleDTableMap::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliTransfersaleDTableMap::translateFieldName('Pdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliTransfersaleDTableMap::translateFieldName('Unit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unit = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliTransfersaleDTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliTransfersaleDTableMap::translateFieldName('Price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliTransfersaleDTableMap::translateFieldName('Pv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliTransfersaleDTableMap::translateFieldName('Bv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliTransfersaleDTableMap::translateFieldName('Fv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliTransfersaleDTableMap::translateFieldName('Weight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->weight = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliTransfersaleDTableMap::translateFieldName('Qty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qty = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliTransfersaleDTableMap::translateFieldName('Amt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amt = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliTransfersaleDTableMap::translateFieldName('Bprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliTransfersaleDTableMap::translateFieldName('Locationbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locationbase = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 17; // 17 = AliTransfersaleDTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliTransfersaleD'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliTransfersaleDTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliTransfersaleDQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliTransfersaleD::setDeleted()
     * @see AliTransfersaleD::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransfersaleDTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliTransfersaleDQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransfersaleDTableMap::DATABASE_NAME);
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
                AliTransfersaleDTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliTransfersaleDTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliTransfersaleDTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_SANO)) {
            $modifiedColumns[':p' . $index++]  = 'sano';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_SADATE)) {
            $modifiedColumns[':p' . $index++]  = 'sadate';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_INV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'inv_code';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_PCODE)) {
            $modifiedColumns[':p' . $index++]  = 'pcode';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_PDESC)) {
            $modifiedColumns[':p' . $index++]  = 'pdesc';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_UNIT)) {
            $modifiedColumns[':p' . $index++]  = 'unit';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'price';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_PV)) {
            $modifiedColumns[':p' . $index++]  = 'pv';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_BV)) {
            $modifiedColumns[':p' . $index++]  = 'bv';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_FV)) {
            $modifiedColumns[':p' . $index++]  = 'fv';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_WEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'weight';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_QTY)) {
            $modifiedColumns[':p' . $index++]  = 'qty';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_AMT)) {
            $modifiedColumns[':p' . $index++]  = 'amt';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_BPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'bprice';
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_LOCATIONBASE)) {
            $modifiedColumns[':p' . $index++]  = 'locationbase';
        }

        $sql = sprintf(
            'INSERT INTO ali_transfersale_d (%s) VALUES (%s)',
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
                    case 'sano':
                        $stmt->bindValue($identifier, $this->sano, PDO::PARAM_STR);
                        break;
                    case 'sadate':
                        $stmt->bindValue($identifier, $this->sadate ? $this->sadate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'inv_code':
                        $stmt->bindValue($identifier, $this->inv_code, PDO::PARAM_STR);
                        break;
                    case 'pcode':
                        $stmt->bindValue($identifier, $this->pcode, PDO::PARAM_STR);
                        break;
                    case 'pdesc':
                        $stmt->bindValue($identifier, $this->pdesc, PDO::PARAM_STR);
                        break;
                    case 'unit':
                        $stmt->bindValue($identifier, $this->unit, PDO::PARAM_STR);
                        break;
                    case 'mcode':
                        $stmt->bindValue($identifier, $this->mcode, PDO::PARAM_STR);
                        break;
                    case 'price':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_STR);
                        break;
                    case 'pv':
                        $stmt->bindValue($identifier, $this->pv, PDO::PARAM_STR);
                        break;
                    case 'bv':
                        $stmt->bindValue($identifier, $this->bv, PDO::PARAM_STR);
                        break;
                    case 'fv':
                        $stmt->bindValue($identifier, $this->fv, PDO::PARAM_STR);
                        break;
                    case 'weight':
                        $stmt->bindValue($identifier, $this->weight, PDO::PARAM_STR);
                        break;
                    case 'qty':
                        $stmt->bindValue($identifier, $this->qty, PDO::PARAM_STR);
                        break;
                    case 'amt':
                        $stmt->bindValue($identifier, $this->amt, PDO::PARAM_STR);
                        break;
                    case 'bprice':
                        $stmt->bindValue($identifier, $this->bprice, PDO::PARAM_STR);
                        break;
                    case 'locationbase':
                        $stmt->bindValue($identifier, $this->locationbase, PDO::PARAM_INT);
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
        $pos = AliTransfersaleDTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getSano();
                break;
            case 2:
                return $this->getSadate();
                break;
            case 3:
                return $this->getInvCode();
                break;
            case 4:
                return $this->getPcode();
                break;
            case 5:
                return $this->getPdesc();
                break;
            case 6:
                return $this->getUnit();
                break;
            case 7:
                return $this->getMcode();
                break;
            case 8:
                return $this->getPrice();
                break;
            case 9:
                return $this->getPv();
                break;
            case 10:
                return $this->getBv();
                break;
            case 11:
                return $this->getFv();
                break;
            case 12:
                return $this->getWeight();
                break;
            case 13:
                return $this->getQty();
                break;
            case 14:
                return $this->getAmt();
                break;
            case 15:
                return $this->getBprice();
                break;
            case 16:
                return $this->getLocationbase();
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

        if (isset($alreadyDumpedObjects['AliTransfersaleD'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliTransfersaleD'][$this->hashCode()] = true;
        $keys = AliTransfersaleDTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getSano(),
            $keys[2] => $this->getSadate(),
            $keys[3] => $this->getInvCode(),
            $keys[4] => $this->getPcode(),
            $keys[5] => $this->getPdesc(),
            $keys[6] => $this->getUnit(),
            $keys[7] => $this->getMcode(),
            $keys[8] => $this->getPrice(),
            $keys[9] => $this->getPv(),
            $keys[10] => $this->getBv(),
            $keys[11] => $this->getFv(),
            $keys[12] => $this->getWeight(),
            $keys[13] => $this->getQty(),
            $keys[14] => $this->getAmt(),
            $keys[15] => $this->getBprice(),
            $keys[16] => $this->getLocationbase(),
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
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliTransfersaleDTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setSano($value);
                break;
            case 2:
                $this->setSadate($value);
                break;
            case 3:
                $this->setInvCode($value);
                break;
            case 4:
                $this->setPcode($value);
                break;
            case 5:
                $this->setPdesc($value);
                break;
            case 6:
                $this->setUnit($value);
                break;
            case 7:
                $this->setMcode($value);
                break;
            case 8:
                $this->setPrice($value);
                break;
            case 9:
                $this->setPv($value);
                break;
            case 10:
                $this->setBv($value);
                break;
            case 11:
                $this->setFv($value);
                break;
            case 12:
                $this->setWeight($value);
                break;
            case 13:
                $this->setQty($value);
                break;
            case 14:
                $this->setAmt($value);
                break;
            case 15:
                $this->setBprice($value);
                break;
            case 16:
                $this->setLocationbase($value);
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
        $keys = AliTransfersaleDTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setSano($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSadate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setInvCode($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPcode($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPdesc($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setUnit($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setMcode($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPrice($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPv($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setBv($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setFv($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setWeight($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setQty($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setAmt($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setBprice($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setLocationbase($arr[$keys[16]]);
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
     * @return $this|\CciOrm\CciOrm\AliTransfersaleD The current object, for fluid interface
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
        $criteria = new Criteria(AliTransfersaleDTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_ID)) {
            $criteria->add(AliTransfersaleDTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_SANO)) {
            $criteria->add(AliTransfersaleDTableMap::COL_SANO, $this->sano);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_SADATE)) {
            $criteria->add(AliTransfersaleDTableMap::COL_SADATE, $this->sadate);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_INV_CODE)) {
            $criteria->add(AliTransfersaleDTableMap::COL_INV_CODE, $this->inv_code);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_PCODE)) {
            $criteria->add(AliTransfersaleDTableMap::COL_PCODE, $this->pcode);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_PDESC)) {
            $criteria->add(AliTransfersaleDTableMap::COL_PDESC, $this->pdesc);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_UNIT)) {
            $criteria->add(AliTransfersaleDTableMap::COL_UNIT, $this->unit);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_MCODE)) {
            $criteria->add(AliTransfersaleDTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_PRICE)) {
            $criteria->add(AliTransfersaleDTableMap::COL_PRICE, $this->price);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_PV)) {
            $criteria->add(AliTransfersaleDTableMap::COL_PV, $this->pv);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_BV)) {
            $criteria->add(AliTransfersaleDTableMap::COL_BV, $this->bv);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_FV)) {
            $criteria->add(AliTransfersaleDTableMap::COL_FV, $this->fv);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_WEIGHT)) {
            $criteria->add(AliTransfersaleDTableMap::COL_WEIGHT, $this->weight);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_QTY)) {
            $criteria->add(AliTransfersaleDTableMap::COL_QTY, $this->qty);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_AMT)) {
            $criteria->add(AliTransfersaleDTableMap::COL_AMT, $this->amt);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_BPRICE)) {
            $criteria->add(AliTransfersaleDTableMap::COL_BPRICE, $this->bprice);
        }
        if ($this->isColumnModified(AliTransfersaleDTableMap::COL_LOCATIONBASE)) {
            $criteria->add(AliTransfersaleDTableMap::COL_LOCATIONBASE, $this->locationbase);
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
        $criteria = ChildAliTransfersaleDQuery::create();
        $criteria->add(AliTransfersaleDTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliTransfersaleD (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSano($this->getSano());
        $copyObj->setSadate($this->getSadate());
        $copyObj->setInvCode($this->getInvCode());
        $copyObj->setPcode($this->getPcode());
        $copyObj->setPdesc($this->getPdesc());
        $copyObj->setUnit($this->getUnit());
        $copyObj->setMcode($this->getMcode());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setPv($this->getPv());
        $copyObj->setBv($this->getBv());
        $copyObj->setFv($this->getFv());
        $copyObj->setWeight($this->getWeight());
        $copyObj->setQty($this->getQty());
        $copyObj->setAmt($this->getAmt());
        $copyObj->setBprice($this->getBprice());
        $copyObj->setLocationbase($this->getLocationbase());
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
     * @return \CciOrm\CciOrm\AliTransfersaleD Clone of current object.
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
        $this->sano = null;
        $this->sadate = null;
        $this->inv_code = null;
        $this->pcode = null;
        $this->pdesc = null;
        $this->unit = null;
        $this->mcode = null;
        $this->price = null;
        $this->pv = null;
        $this->bv = null;
        $this->fv = null;
        $this->weight = null;
        $this->qty = null;
        $this->amt = null;
        $this->bprice = null;
        $this->locationbase = null;
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
        return (string) $this->exportTo(AliTransfersaleDTableMap::DEFAULT_STRING_FORMAT);
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
