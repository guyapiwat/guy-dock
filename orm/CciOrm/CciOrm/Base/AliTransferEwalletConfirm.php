<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTransferEwalletConfirmQuery as ChildAliTransferEwalletConfirmQuery;
use CciOrm\CciOrm\Map\AliTransferEwalletConfirmTableMap;
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
 * Base class that represents a row from the 'ali_transfer_ewallet_confirm' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliTransferEwalletConfirm implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliTransferEwalletConfirmTableMap';


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
     * The value for the pay_type field.
     *
     * @var        string
     */
    protected $pay_type;

    /**
     * The value for the sadate field.
     *
     * @var        DateTime
     */
    protected $sadate;

    /**
     * The value for the sctime field.
     *
     * @var        string
     */
    protected $sctime;

    /**
     * The value for the total field.
     *
     * @var        string
     */
    protected $total;

    /**
     * The value for the img_pay field.
     *
     * @var        string
     */
    protected $img_pay;

    /**
     * The value for the approved_uid field.
     *
     * @var        string
     */
    protected $approved_uid;

    /**
     * The value for the approved_sctime field.
     *
     * @var        DateTime
     */
    protected $approved_sctime;

    /**
     * The value for the approved_status field.
     *
     * @var        int
     */
    protected $approved_status;

    /**
     * The value for the cancel_uid field.
     *
     * @var        string
     */
    protected $cancel_uid;

    /**
     * The value for the cancel_sctime field.
     *
     * @var        DateTime
     */
    protected $cancel_sctime;

    /**
     * The value for the cancel_status field.
     *
     * @var        int
     */
    protected $cancel_status;

    /**
     * The value for the last_sctime field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $last_sctime;

    /**
     * The value for the sano_ref field.
     *
     * @var        string
     */
    protected $sano_ref;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
    }

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliTransferEwalletConfirm object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
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
     * Compares this with another <code>AliTransferEwalletConfirm</code> instance.  If
     * <code>obj</code> is an instance of <code>AliTransferEwalletConfirm</code>, delegates to
     * <code>equals(AliTransferEwalletConfirm)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliTransferEwalletConfirm The current object, for fluid interface
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
     * Get the [pay_type] column value.
     *
     * @return string
     */
    public function getPayType()
    {
        return $this->pay_type;
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
     * Get the [sctime] column value.
     *
     * @return string
     */
    public function getSctime()
    {
        return $this->sctime;
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
     * Get the [img_pay] column value.
     *
     * @return string
     */
    public function getImgPay()
    {
        return $this->img_pay;
    }

    /**
     * Get the [approved_uid] column value.
     *
     * @return string
     */
    public function getApprovedUid()
    {
        return $this->approved_uid;
    }

    /**
     * Get the [optionally formatted] temporal [approved_sctime] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getApprovedSctime($format = NULL)
    {
        if ($format === null) {
            return $this->approved_sctime;
        } else {
            return $this->approved_sctime instanceof \DateTimeInterface ? $this->approved_sctime->format($format) : null;
        }
    }

    /**
     * Get the [approved_status] column value.
     *
     * @return int
     */
    public function getApprovedStatus()
    {
        return $this->approved_status;
    }

    /**
     * Get the [cancel_uid] column value.
     *
     * @return string
     */
    public function getCancelUid()
    {
        return $this->cancel_uid;
    }

    /**
     * Get the [optionally formatted] temporal [cancel_sctime] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCancelSctime($format = NULL)
    {
        if ($format === null) {
            return $this->cancel_sctime;
        } else {
            return $this->cancel_sctime instanceof \DateTimeInterface ? $this->cancel_sctime->format($format) : null;
        }
    }

    /**
     * Get the [cancel_status] column value.
     *
     * @return int
     */
    public function getCancelStatus()
    {
        return $this->cancel_status;
    }

    /**
     * Get the [optionally formatted] temporal [last_sctime] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastSctime($format = NULL)
    {
        if ($format === null) {
            return $this->last_sctime;
        } else {
            return $this->last_sctime instanceof \DateTimeInterface ? $this->last_sctime->format($format) : null;
        }
    }

    /**
     * Get the [sano_ref] column value.
     *
     * @return string
     */
    public function getSanoRef()
    {
        return $this->sano_ref;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [pay_type] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setPayType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pay_type !== $v) {
            $this->pay_type = $v;
            $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_PAY_TYPE] = true;
        }

        return $this;
    } // setPayType()

    /**
     * Sets the value of [sadate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setSadate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sadate !== null || $dt !== null) {
            if ($this->sadate === null || $dt === null || $dt->format("Y-m-d") !== $this->sadate->format("Y-m-d")) {
                $this->sadate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_SADATE] = true;
            }
        } // if either are not null

        return $this;
    } // setSadate()

    /**
     * Set the value of [sctime] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setSctime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sctime !== $v) {
            $this->sctime = $v;
            $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_SCTIME] = true;
        }

        return $this;
    } // setSctime()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [img_pay] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setImgPay($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->img_pay !== $v) {
            $this->img_pay = $v;
            $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_IMG_PAY] = true;
        }

        return $this;
    } // setImgPay()

    /**
     * Set the value of [approved_uid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setApprovedUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->approved_uid !== $v) {
            $this->approved_uid = $v;
            $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_APPROVED_UID] = true;
        }

        return $this;
    } // setApprovedUid()

    /**
     * Sets the value of [approved_sctime] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setApprovedSctime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->approved_sctime !== null || $dt !== null) {
            if ($this->approved_sctime === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->approved_sctime->format("Y-m-d H:i:s.u")) {
                $this->approved_sctime = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_APPROVED_SCTIME] = true;
            }
        } // if either are not null

        return $this;
    } // setApprovedSctime()

    /**
     * Set the value of [approved_status] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setApprovedStatus($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->approved_status !== $v) {
            $this->approved_status = $v;
            $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_APPROVED_STATUS] = true;
        }

        return $this;
    } // setApprovedStatus()

    /**
     * Set the value of [cancel_uid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setCancelUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cancel_uid !== $v) {
            $this->cancel_uid = $v;
            $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_CANCEL_UID] = true;
        }

        return $this;
    } // setCancelUid()

    /**
     * Sets the value of [cancel_sctime] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setCancelSctime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->cancel_sctime !== null || $dt !== null) {
            if ($this->cancel_sctime === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->cancel_sctime->format("Y-m-d H:i:s.u")) {
                $this->cancel_sctime = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_CANCEL_SCTIME] = true;
            }
        } // if either are not null

        return $this;
    } // setCancelSctime()

    /**
     * Set the value of [cancel_status] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setCancelStatus($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cancel_status !== $v) {
            $this->cancel_status = $v;
            $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_CANCEL_STATUS] = true;
        }

        return $this;
    } // setCancelStatus()

    /**
     * Sets the value of [last_sctime] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setLastSctime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_sctime !== null || $dt !== null) {
            if ($this->last_sctime === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->last_sctime->format("Y-m-d H:i:s.u")) {
                $this->last_sctime = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_LAST_SCTIME] = true;
            }
        } // if either are not null

        return $this;
    } // setLastSctime()

    /**
     * Set the value of [sano_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object (for fluent API support)
     */
    public function setSanoRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano_ref !== $v) {
            $this->sano_ref = $v;
            $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_SANO_REF] = true;
        }

        return $this;
    } // setSanoRef()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('PayType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pay_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('Sadate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->sadate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('Sctime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sctime = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('ImgPay', TableMap::TYPE_PHPNAME, $indexType)];
            $this->img_pay = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('ApprovedUid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->approved_uid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('ApprovedSctime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->approved_sctime = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('ApprovedStatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->approved_status = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('CancelUid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cancel_uid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('CancelSctime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->cancel_sctime = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('CancelStatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cancel_status = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('LastSctime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->last_sctime = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliTransferEwalletConfirmTableMap::translateFieldName('SanoRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano_ref = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = AliTransferEwalletConfirmTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliTransferEwalletConfirm'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliTransferEwalletConfirmTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliTransferEwalletConfirmQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliTransferEwalletConfirm::setDeleted()
     * @see AliTransferEwalletConfirm::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransferEwalletConfirmTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliTransferEwalletConfirmQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransferEwalletConfirmTableMap::DATABASE_NAME);
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
                AliTransferEwalletConfirmTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliTransferEwalletConfirmTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliTransferEwalletConfirmTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_PAY_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'pay_type';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_SADATE)) {
            $modifiedColumns[':p' . $index++]  = 'sadate';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_SCTIME)) {
            $modifiedColumns[':p' . $index++]  = 'sctime';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_IMG_PAY)) {
            $modifiedColumns[':p' . $index++]  = 'img_pay';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_APPROVED_UID)) {
            $modifiedColumns[':p' . $index++]  = 'approved_uid';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_APPROVED_SCTIME)) {
            $modifiedColumns[':p' . $index++]  = 'approved_sctime';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_APPROVED_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'approved_status';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_CANCEL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'cancel_uid';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_CANCEL_SCTIME)) {
            $modifiedColumns[':p' . $index++]  = 'cancel_sctime';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_CANCEL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'cancel_status';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_LAST_SCTIME)) {
            $modifiedColumns[':p' . $index++]  = 'last_sctime';
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_SANO_REF)) {
            $modifiedColumns[':p' . $index++]  = 'sano_ref';
        }

        $sql = sprintf(
            'INSERT INTO ali_transfer_ewallet_confirm (%s) VALUES (%s)',
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
                    case 'pay_type':
                        $stmt->bindValue($identifier, $this->pay_type, PDO::PARAM_STR);
                        break;
                    case 'sadate':
                        $stmt->bindValue($identifier, $this->sadate ? $this->sadate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'sctime':
                        $stmt->bindValue($identifier, $this->sctime, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'img_pay':
                        $stmt->bindValue($identifier, $this->img_pay, PDO::PARAM_STR);
                        break;
                    case 'approved_uid':
                        $stmt->bindValue($identifier, $this->approved_uid, PDO::PARAM_STR);
                        break;
                    case 'approved_sctime':
                        $stmt->bindValue($identifier, $this->approved_sctime ? $this->approved_sctime->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'approved_status':
                        $stmt->bindValue($identifier, $this->approved_status, PDO::PARAM_INT);
                        break;
                    case 'cancel_uid':
                        $stmt->bindValue($identifier, $this->cancel_uid, PDO::PARAM_STR);
                        break;
                    case 'cancel_sctime':
                        $stmt->bindValue($identifier, $this->cancel_sctime ? $this->cancel_sctime->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'cancel_status':
                        $stmt->bindValue($identifier, $this->cancel_status, PDO::PARAM_INT);
                        break;
                    case 'last_sctime':
                        $stmt->bindValue($identifier, $this->last_sctime ? $this->last_sctime->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'sano_ref':
                        $stmt->bindValue($identifier, $this->sano_ref, PDO::PARAM_STR);
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
        $pos = AliTransferEwalletConfirmTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getPayType();
                break;
            case 3:
                return $this->getSadate();
                break;
            case 4:
                return $this->getSctime();
                break;
            case 5:
                return $this->getTotal();
                break;
            case 6:
                return $this->getImgPay();
                break;
            case 7:
                return $this->getApprovedUid();
                break;
            case 8:
                return $this->getApprovedSctime();
                break;
            case 9:
                return $this->getApprovedStatus();
                break;
            case 10:
                return $this->getCancelUid();
                break;
            case 11:
                return $this->getCancelSctime();
                break;
            case 12:
                return $this->getCancelStatus();
                break;
            case 13:
                return $this->getLastSctime();
                break;
            case 14:
                return $this->getSanoRef();
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

        if (isset($alreadyDumpedObjects['AliTransferEwalletConfirm'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliTransferEwalletConfirm'][$this->hashCode()] = true;
        $keys = AliTransferEwalletConfirmTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getMcode(),
            $keys[2] => $this->getPayType(),
            $keys[3] => $this->getSadate(),
            $keys[4] => $this->getSctime(),
            $keys[5] => $this->getTotal(),
            $keys[6] => $this->getImgPay(),
            $keys[7] => $this->getApprovedUid(),
            $keys[8] => $this->getApprovedSctime(),
            $keys[9] => $this->getApprovedStatus(),
            $keys[10] => $this->getCancelUid(),
            $keys[11] => $this->getCancelSctime(),
            $keys[12] => $this->getCancelStatus(),
            $keys[13] => $this->getLastSctime(),
            $keys[14] => $this->getSanoRef(),
        );
        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        if ($result[$keys[8]] instanceof \DateTimeInterface) {
            $result[$keys[8]] = $result[$keys[8]]->format('c');
        }

        if ($result[$keys[11]] instanceof \DateTimeInterface) {
            $result[$keys[11]] = $result[$keys[11]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliTransferEwalletConfirmTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm
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
                $this->setPayType($value);
                break;
            case 3:
                $this->setSadate($value);
                break;
            case 4:
                $this->setSctime($value);
                break;
            case 5:
                $this->setTotal($value);
                break;
            case 6:
                $this->setImgPay($value);
                break;
            case 7:
                $this->setApprovedUid($value);
                break;
            case 8:
                $this->setApprovedSctime($value);
                break;
            case 9:
                $this->setApprovedStatus($value);
                break;
            case 10:
                $this->setCancelUid($value);
                break;
            case 11:
                $this->setCancelSctime($value);
                break;
            case 12:
                $this->setCancelStatus($value);
                break;
            case 13:
                $this->setLastSctime($value);
                break;
            case 14:
                $this->setSanoRef($value);
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
        $keys = AliTransferEwalletConfirmTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setMcode($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPayType($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setSadate($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setSctime($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setTotal($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setImgPay($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setApprovedUid($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setApprovedSctime($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setApprovedStatus($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCancelUid($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setCancelSctime($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCancelStatus($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setLastSctime($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setSanoRef($arr[$keys[14]]);
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
     * @return $this|\CciOrm\CciOrm\AliTransferEwalletConfirm The current object, for fluid interface
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
        $criteria = new Criteria(AliTransferEwalletConfirmTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_ID)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_MCODE)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_PAY_TYPE)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_PAY_TYPE, $this->pay_type);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_SADATE)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_SADATE, $this->sadate);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_SCTIME)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_SCTIME, $this->sctime);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_TOTAL)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_IMG_PAY)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_IMG_PAY, $this->img_pay);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_APPROVED_UID)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_APPROVED_UID, $this->approved_uid);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_APPROVED_SCTIME)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_APPROVED_SCTIME, $this->approved_sctime);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_APPROVED_STATUS)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_APPROVED_STATUS, $this->approved_status);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_CANCEL_UID)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_CANCEL_UID, $this->cancel_uid);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_CANCEL_SCTIME)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_CANCEL_SCTIME, $this->cancel_sctime);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_CANCEL_STATUS)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_CANCEL_STATUS, $this->cancel_status);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_LAST_SCTIME)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_LAST_SCTIME, $this->last_sctime);
        }
        if ($this->isColumnModified(AliTransferEwalletConfirmTableMap::COL_SANO_REF)) {
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_SANO_REF, $this->sano_ref);
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
        $criteria = ChildAliTransferEwalletConfirmQuery::create();
        $criteria->add(AliTransferEwalletConfirmTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliTransferEwalletConfirm (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMcode($this->getMcode());
        $copyObj->setPayType($this->getPayType());
        $copyObj->setSadate($this->getSadate());
        $copyObj->setSctime($this->getSctime());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setImgPay($this->getImgPay());
        $copyObj->setApprovedUid($this->getApprovedUid());
        $copyObj->setApprovedSctime($this->getApprovedSctime());
        $copyObj->setApprovedStatus($this->getApprovedStatus());
        $copyObj->setCancelUid($this->getCancelUid());
        $copyObj->setCancelSctime($this->getCancelSctime());
        $copyObj->setCancelStatus($this->getCancelStatus());
        $copyObj->setLastSctime($this->getLastSctime());
        $copyObj->setSanoRef($this->getSanoRef());
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
     * @return \CciOrm\CciOrm\AliTransferEwalletConfirm Clone of current object.
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
        $this->pay_type = null;
        $this->sadate = null;
        $this->sctime = null;
        $this->total = null;
        $this->img_pay = null;
        $this->approved_uid = null;
        $this->approved_sctime = null;
        $this->approved_status = null;
        $this->cancel_uid = null;
        $this->cancel_sctime = null;
        $this->cancel_status = null;
        $this->last_sctime = null;
        $this->sano_ref = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
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
        return (string) $this->exportTo(AliTransferEwalletConfirmTableMap::DEFAULT_STRING_FORMAT);
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
