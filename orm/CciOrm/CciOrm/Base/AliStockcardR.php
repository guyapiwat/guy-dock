<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliStockcardRQuery as ChildAliStockcardRQuery;
use CciOrm\CciOrm\Map\AliStockcardRTableMap;
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
 * Base class that represents a row from the 'ali_stockcard_r' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliStockcardR implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliStockcardRTableMap';


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
     * The value for the inv_code field.
     *
     * @var        string
     */
    protected $inv_code;

    /**
     * The value for the inv_ref field.
     *
     * @var        string
     */
    protected $inv_ref;

    /**
     * The value for the inv_action field.
     *
     * @var        string
     */
    protected $inv_action;

    /**
     * The value for the sano field.
     *
     * @var        string
     */
    protected $sano;

    /**
     * The value for the sano_ref field.
     *
     * @var        string
     */
    protected $sano_ref;

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
     * The value for the in_qty field.
     *
     * @var        int
     */
    protected $in_qty;

    /**
     * The value for the in_price field.
     *
     * @var        string
     */
    protected $in_price;

    /**
     * The value for the in_amount field.
     *
     * @var        string
     */
    protected $in_amount;

    /**
     * The value for the out_qty field.
     *
     * @var        int
     */
    protected $out_qty;

    /**
     * The value for the out_price field.
     *
     * @var        string
     */
    protected $out_price;

    /**
     * The value for the out_amount field.
     *
     * @var        string
     */
    protected $out_amount;

    /**
     * The value for the sadate field.
     *
     * @var        DateTime
     */
    protected $sadate;

    /**
     * The value for the rdate field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $rdate;

    /**
     * The value for the rccode field.
     *
     * @var        string
     */
    protected $rccode;

    /**
     * The value for the yokma field.
     *
     * @var        int
     */
    protected $yokma;

    /**
     * The value for the balance field.
     *
     * @var        int
     */
    protected $balance;

    /**
     * The value for the price field.
     *
     * @var        string
     */
    protected $price;

    /**
     * The value for the amount field.
     *
     * @var        string
     */
    protected $amount;

    /**
     * The value for the uid field.
     *
     * @var        string
     */
    protected $uid;

    /**
     * The value for the action field.
     *
     * @var        string
     */
    protected $action;

    /**
     * The value for the cancel field.
     *
     * @var        int
     */
    protected $cancel;

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
     * Initializes internal state of CciOrm\CciOrm\Base\AliStockcardR object.
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
     * Compares this with another <code>AliStockcardR</code> instance.  If
     * <code>obj</code> is an instance of <code>AliStockcardR</code>, delegates to
     * <code>equals(AliStockcardR)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliStockcardR The current object, for fluid interface
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
     * Get the [inv_code] column value.
     *
     * @return string
     */
    public function getInvCode()
    {
        return $this->inv_code;
    }

    /**
     * Get the [inv_ref] column value.
     *
     * @return string
     */
    public function getInvRef()
    {
        return $this->inv_ref;
    }

    /**
     * Get the [inv_action] column value.
     *
     * @return string
     */
    public function getInvAction()
    {
        return $this->inv_action;
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
     * Get the [sano_ref] column value.
     *
     * @return string
     */
    public function getSanoRef()
    {
        return $this->sano_ref;
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
     * Get the [in_qty] column value.
     *
     * @return int
     */
    public function getInQty()
    {
        return $this->in_qty;
    }

    /**
     * Get the [in_price] column value.
     *
     * @return string
     */
    public function getInPrice()
    {
        return $this->in_price;
    }

    /**
     * Get the [in_amount] column value.
     *
     * @return string
     */
    public function getInAmount()
    {
        return $this->in_amount;
    }

    /**
     * Get the [out_qty] column value.
     *
     * @return int
     */
    public function getOutQty()
    {
        return $this->out_qty;
    }

    /**
     * Get the [out_price] column value.
     *
     * @return string
     */
    public function getOutPrice()
    {
        return $this->out_price;
    }

    /**
     * Get the [out_amount] column value.
     *
     * @return string
     */
    public function getOutAmount()
    {
        return $this->out_amount;
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
     * Get the [optionally formatted] temporal [rdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
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
     * Get the [rccode] column value.
     *
     * @return string
     */
    public function getRccode()
    {
        return $this->rccode;
    }

    /**
     * Get the [yokma] column value.
     *
     * @return int
     */
    public function getYokma()
    {
        return $this->yokma;
    }

    /**
     * Get the [balance] column value.
     *
     * @return int
     */
    public function getBalance()
    {
        return $this->balance;
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
     * Get the [amount] column value.
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
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
     * Get the [action] column value.
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Get the [cancel] column value.
     *
     * @return int
     */
    public function getCancel()
    {
        return $this->cancel;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Set the value of [inv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setInvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_code !== $v) {
            $this->inv_code = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_INV_CODE] = true;
        }

        return $this;
    } // setInvCode()

    /**
     * Set the value of [inv_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setInvRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_ref !== $v) {
            $this->inv_ref = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_INV_REF] = true;
        }

        return $this;
    } // setInvRef()

    /**
     * Set the value of [inv_action] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setInvAction($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_action !== $v) {
            $this->inv_action = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_INV_ACTION] = true;
        }

        return $this;
    } // setInvAction()

    /**
     * Set the value of [sano] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setSano($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano !== $v) {
            $this->sano = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_SANO] = true;
        }

        return $this;
    } // setSano()

    /**
     * Set the value of [sano_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setSanoRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano_ref !== $v) {
            $this->sano_ref = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_SANO_REF] = true;
        }

        return $this;
    } // setSanoRef()

    /**
     * Set the value of [pcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setPcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pcode !== $v) {
            $this->pcode = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_PCODE] = true;
        }

        return $this;
    } // setPcode()

    /**
     * Set the value of [pdesc] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setPdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pdesc !== $v) {
            $this->pdesc = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_PDESC] = true;
        }

        return $this;
    } // setPdesc()

    /**
     * Set the value of [in_qty] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setInQty($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->in_qty !== $v) {
            $this->in_qty = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_IN_QTY] = true;
        }

        return $this;
    } // setInQty()

    /**
     * Set the value of [in_price] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setInPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->in_price !== $v) {
            $this->in_price = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_IN_PRICE] = true;
        }

        return $this;
    } // setInPrice()

    /**
     * Set the value of [in_amount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setInAmount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->in_amount !== $v) {
            $this->in_amount = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_IN_AMOUNT] = true;
        }

        return $this;
    } // setInAmount()

    /**
     * Set the value of [out_qty] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setOutQty($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->out_qty !== $v) {
            $this->out_qty = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_OUT_QTY] = true;
        }

        return $this;
    } // setOutQty()

    /**
     * Set the value of [out_price] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setOutPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->out_price !== $v) {
            $this->out_price = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_OUT_PRICE] = true;
        }

        return $this;
    } // setOutPrice()

    /**
     * Set the value of [out_amount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setOutAmount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->out_amount !== $v) {
            $this->out_amount = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_OUT_AMOUNT] = true;
        }

        return $this;
    } // setOutAmount()

    /**
     * Sets the value of [sadate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setSadate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sadate !== null || $dt !== null) {
            if ($this->sadate === null || $dt === null || $dt->format("Y-m-d") !== $this->sadate->format("Y-m-d")) {
                $this->sadate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliStockcardRTableMap::COL_SADATE] = true;
            }
        } // if either are not null

        return $this;
    } // setSadate()

    /**
     * Sets the value of [rdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setRdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->rdate !== null || $dt !== null) {
            if ($this->rdate === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->rdate->format("Y-m-d H:i:s.u")) {
                $this->rdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliStockcardRTableMap::COL_RDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setRdate()

    /**
     * Set the value of [rccode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setRccode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rccode !== $v) {
            $this->rccode = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_RCCODE] = true;
        }

        return $this;
    } // setRccode()

    /**
     * Set the value of [yokma] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setYokma($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->yokma !== $v) {
            $this->yokma = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_YOKMA] = true;
        }

        return $this;
    } // setYokma()

    /**
     * Set the value of [balance] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setBalance($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->balance !== $v) {
            $this->balance = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_BALANCE] = true;
        }

        return $this;
    } // setBalance()

    /**
     * Set the value of [price] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_PRICE] = true;
        }

        return $this;
    } // setPrice()

    /**
     * Set the value of [amount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_AMOUNT] = true;
        }

        return $this;
    } // setAmount()

    /**
     * Set the value of [uid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

    /**
     * Set the value of [action] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setAction($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->action !== $v) {
            $this->action = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_ACTION] = true;
        }

        return $this;
    } // setAction()

    /**
     * Set the value of [cancel] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object (for fluent API support)
     */
    public function setCancel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cancel !== $v) {
            $this->cancel = $v;
            $this->modifiedColumns[AliStockcardRTableMap::COL_CANCEL] = true;
        }

        return $this;
    } // setCancel()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliStockcardRTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliStockcardRTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliStockcardRTableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliStockcardRTableMap::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliStockcardRTableMap::translateFieldName('InvRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliStockcardRTableMap::translateFieldName('InvAction', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_action = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliStockcardRTableMap::translateFieldName('Sano', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliStockcardRTableMap::translateFieldName('SanoRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano_ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliStockcardRTableMap::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliStockcardRTableMap::translateFieldName('Pdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliStockcardRTableMap::translateFieldName('InQty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->in_qty = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliStockcardRTableMap::translateFieldName('InPrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->in_price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliStockcardRTableMap::translateFieldName('InAmount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->in_amount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliStockcardRTableMap::translateFieldName('OutQty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->out_qty = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliStockcardRTableMap::translateFieldName('OutPrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->out_price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliStockcardRTableMap::translateFieldName('OutAmount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->out_amount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliStockcardRTableMap::translateFieldName('Sadate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->sadate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliStockcardRTableMap::translateFieldName('Rdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->rdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliStockcardRTableMap::translateFieldName('Rccode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rccode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliStockcardRTableMap::translateFieldName('Yokma', TableMap::TYPE_PHPNAME, $indexType)];
            $this->yokma = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliStockcardRTableMap::translateFieldName('Balance', TableMap::TYPE_PHPNAME, $indexType)];
            $this->balance = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliStockcardRTableMap::translateFieldName('Price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliStockcardRTableMap::translateFieldName('Amount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliStockcardRTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliStockcardRTableMap::translateFieldName('Action', TableMap::TYPE_PHPNAME, $indexType)];
            $this->action = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliStockcardRTableMap::translateFieldName('Cancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cancel = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 26; // 26 = AliStockcardRTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliStockcardR'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliStockcardRTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliStockcardRQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliStockcardR::setDeleted()
     * @see AliStockcardR::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStockcardRTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliStockcardRQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStockcardRTableMap::DATABASE_NAME);
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
                AliStockcardRTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliStockcardRTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliStockcardRTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliStockcardRTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_INV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'inv_code';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_INV_REF)) {
            $modifiedColumns[':p' . $index++]  = 'inv_ref';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_INV_ACTION)) {
            $modifiedColumns[':p' . $index++]  = 'inv_action';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_SANO)) {
            $modifiedColumns[':p' . $index++]  = 'sano';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_SANO_REF)) {
            $modifiedColumns[':p' . $index++]  = 'sano_ref';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_PCODE)) {
            $modifiedColumns[':p' . $index++]  = 'pcode';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_PDESC)) {
            $modifiedColumns[':p' . $index++]  = 'pdesc';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_IN_QTY)) {
            $modifiedColumns[':p' . $index++]  = 'in_qty';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_IN_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'in_price';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_IN_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'in_amount';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_OUT_QTY)) {
            $modifiedColumns[':p' . $index++]  = 'out_qty';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_OUT_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'out_price';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_OUT_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'out_amount';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_SADATE)) {
            $modifiedColumns[':p' . $index++]  = 'sadate';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_RDATE)) {
            $modifiedColumns[':p' . $index++]  = 'rdate';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_RCCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rccode';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_YOKMA)) {
            $modifiedColumns[':p' . $index++]  = 'yokma';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_BALANCE)) {
            $modifiedColumns[':p' . $index++]  = 'balance';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'price';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'amount';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_ACTION)) {
            $modifiedColumns[':p' . $index++]  = 'action';
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_CANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'cancel';
        }

        $sql = sprintf(
            'INSERT INTO ali_stockcard_r (%s) VALUES (%s)',
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
                    case 'inv_code':
                        $stmt->bindValue($identifier, $this->inv_code, PDO::PARAM_STR);
                        break;
                    case 'inv_ref':
                        $stmt->bindValue($identifier, $this->inv_ref, PDO::PARAM_STR);
                        break;
                    case 'inv_action':
                        $stmt->bindValue($identifier, $this->inv_action, PDO::PARAM_STR);
                        break;
                    case 'sano':
                        $stmt->bindValue($identifier, $this->sano, PDO::PARAM_STR);
                        break;
                    case 'sano_ref':
                        $stmt->bindValue($identifier, $this->sano_ref, PDO::PARAM_STR);
                        break;
                    case 'pcode':
                        $stmt->bindValue($identifier, $this->pcode, PDO::PARAM_STR);
                        break;
                    case 'pdesc':
                        $stmt->bindValue($identifier, $this->pdesc, PDO::PARAM_STR);
                        break;
                    case 'in_qty':
                        $stmt->bindValue($identifier, $this->in_qty, PDO::PARAM_INT);
                        break;
                    case 'in_price':
                        $stmt->bindValue($identifier, $this->in_price, PDO::PARAM_STR);
                        break;
                    case 'in_amount':
                        $stmt->bindValue($identifier, $this->in_amount, PDO::PARAM_STR);
                        break;
                    case 'out_qty':
                        $stmt->bindValue($identifier, $this->out_qty, PDO::PARAM_INT);
                        break;
                    case 'out_price':
                        $stmt->bindValue($identifier, $this->out_price, PDO::PARAM_STR);
                        break;
                    case 'out_amount':
                        $stmt->bindValue($identifier, $this->out_amount, PDO::PARAM_STR);
                        break;
                    case 'sadate':
                        $stmt->bindValue($identifier, $this->sadate ? $this->sadate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'rdate':
                        $stmt->bindValue($identifier, $this->rdate ? $this->rdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'rccode':
                        $stmt->bindValue($identifier, $this->rccode, PDO::PARAM_STR);
                        break;
                    case 'yokma':
                        $stmt->bindValue($identifier, $this->yokma, PDO::PARAM_INT);
                        break;
                    case 'balance':
                        $stmt->bindValue($identifier, $this->balance, PDO::PARAM_INT);
                        break;
                    case 'price':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_STR);
                        break;
                    case 'amount':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_STR);
                        break;
                    case 'uid':
                        $stmt->bindValue($identifier, $this->uid, PDO::PARAM_STR);
                        break;
                    case 'action':
                        $stmt->bindValue($identifier, $this->action, PDO::PARAM_STR);
                        break;
                    case 'cancel':
                        $stmt->bindValue($identifier, $this->cancel, PDO::PARAM_INT);
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
        $pos = AliStockcardRTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getInvCode();
                break;
            case 4:
                return $this->getInvRef();
                break;
            case 5:
                return $this->getInvAction();
                break;
            case 6:
                return $this->getSano();
                break;
            case 7:
                return $this->getSanoRef();
                break;
            case 8:
                return $this->getPcode();
                break;
            case 9:
                return $this->getPdesc();
                break;
            case 10:
                return $this->getInQty();
                break;
            case 11:
                return $this->getInPrice();
                break;
            case 12:
                return $this->getInAmount();
                break;
            case 13:
                return $this->getOutQty();
                break;
            case 14:
                return $this->getOutPrice();
                break;
            case 15:
                return $this->getOutAmount();
                break;
            case 16:
                return $this->getSadate();
                break;
            case 17:
                return $this->getRdate();
                break;
            case 18:
                return $this->getRccode();
                break;
            case 19:
                return $this->getYokma();
                break;
            case 20:
                return $this->getBalance();
                break;
            case 21:
                return $this->getPrice();
                break;
            case 22:
                return $this->getAmount();
                break;
            case 23:
                return $this->getUid();
                break;
            case 24:
                return $this->getAction();
                break;
            case 25:
                return $this->getCancel();
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

        if (isset($alreadyDumpedObjects['AliStockcardR'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliStockcardR'][$this->hashCode()] = true;
        $keys = AliStockcardRTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getMcode(),
            $keys[2] => $this->getNameT(),
            $keys[3] => $this->getInvCode(),
            $keys[4] => $this->getInvRef(),
            $keys[5] => $this->getInvAction(),
            $keys[6] => $this->getSano(),
            $keys[7] => $this->getSanoRef(),
            $keys[8] => $this->getPcode(),
            $keys[9] => $this->getPdesc(),
            $keys[10] => $this->getInQty(),
            $keys[11] => $this->getInPrice(),
            $keys[12] => $this->getInAmount(),
            $keys[13] => $this->getOutQty(),
            $keys[14] => $this->getOutPrice(),
            $keys[15] => $this->getOutAmount(),
            $keys[16] => $this->getSadate(),
            $keys[17] => $this->getRdate(),
            $keys[18] => $this->getRccode(),
            $keys[19] => $this->getYokma(),
            $keys[20] => $this->getBalance(),
            $keys[21] => $this->getPrice(),
            $keys[22] => $this->getAmount(),
            $keys[23] => $this->getUid(),
            $keys[24] => $this->getAction(),
            $keys[25] => $this->getCancel(),
        );
        if ($result[$keys[16]] instanceof \DateTimeInterface) {
            $result[$keys[16]] = $result[$keys[16]]->format('c');
        }

        if ($result[$keys[17]] instanceof \DateTimeInterface) {
            $result[$keys[17]] = $result[$keys[17]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliStockcardR
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliStockcardRTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliStockcardR
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
                $this->setInvCode($value);
                break;
            case 4:
                $this->setInvRef($value);
                break;
            case 5:
                $this->setInvAction($value);
                break;
            case 6:
                $this->setSano($value);
                break;
            case 7:
                $this->setSanoRef($value);
                break;
            case 8:
                $this->setPcode($value);
                break;
            case 9:
                $this->setPdesc($value);
                break;
            case 10:
                $this->setInQty($value);
                break;
            case 11:
                $this->setInPrice($value);
                break;
            case 12:
                $this->setInAmount($value);
                break;
            case 13:
                $this->setOutQty($value);
                break;
            case 14:
                $this->setOutPrice($value);
                break;
            case 15:
                $this->setOutAmount($value);
                break;
            case 16:
                $this->setSadate($value);
                break;
            case 17:
                $this->setRdate($value);
                break;
            case 18:
                $this->setRccode($value);
                break;
            case 19:
                $this->setYokma($value);
                break;
            case 20:
                $this->setBalance($value);
                break;
            case 21:
                $this->setPrice($value);
                break;
            case 22:
                $this->setAmount($value);
                break;
            case 23:
                $this->setUid($value);
                break;
            case 24:
                $this->setAction($value);
                break;
            case 25:
                $this->setCancel($value);
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
        $keys = AliStockcardRTableMap::getFieldNames($keyType);

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
            $this->setInvCode($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setInvRef($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setInvAction($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setSano($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setSanoRef($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPcode($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPdesc($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setInQty($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setInPrice($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setInAmount($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setOutQty($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setOutPrice($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setOutAmount($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setSadate($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setRdate($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setRccode($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setYokma($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setBalance($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setPrice($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setAmount($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setUid($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setAction($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setCancel($arr[$keys[25]]);
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
     * @return $this|\CciOrm\CciOrm\AliStockcardR The current object, for fluid interface
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
        $criteria = new Criteria(AliStockcardRTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliStockcardRTableMap::COL_ID)) {
            $criteria->add(AliStockcardRTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_MCODE)) {
            $criteria->add(AliStockcardRTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_NAME_T)) {
            $criteria->add(AliStockcardRTableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_INV_CODE)) {
            $criteria->add(AliStockcardRTableMap::COL_INV_CODE, $this->inv_code);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_INV_REF)) {
            $criteria->add(AliStockcardRTableMap::COL_INV_REF, $this->inv_ref);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_INV_ACTION)) {
            $criteria->add(AliStockcardRTableMap::COL_INV_ACTION, $this->inv_action);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_SANO)) {
            $criteria->add(AliStockcardRTableMap::COL_SANO, $this->sano);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_SANO_REF)) {
            $criteria->add(AliStockcardRTableMap::COL_SANO_REF, $this->sano_ref);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_PCODE)) {
            $criteria->add(AliStockcardRTableMap::COL_PCODE, $this->pcode);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_PDESC)) {
            $criteria->add(AliStockcardRTableMap::COL_PDESC, $this->pdesc);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_IN_QTY)) {
            $criteria->add(AliStockcardRTableMap::COL_IN_QTY, $this->in_qty);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_IN_PRICE)) {
            $criteria->add(AliStockcardRTableMap::COL_IN_PRICE, $this->in_price);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_IN_AMOUNT)) {
            $criteria->add(AliStockcardRTableMap::COL_IN_AMOUNT, $this->in_amount);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_OUT_QTY)) {
            $criteria->add(AliStockcardRTableMap::COL_OUT_QTY, $this->out_qty);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_OUT_PRICE)) {
            $criteria->add(AliStockcardRTableMap::COL_OUT_PRICE, $this->out_price);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_OUT_AMOUNT)) {
            $criteria->add(AliStockcardRTableMap::COL_OUT_AMOUNT, $this->out_amount);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_SADATE)) {
            $criteria->add(AliStockcardRTableMap::COL_SADATE, $this->sadate);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_RDATE)) {
            $criteria->add(AliStockcardRTableMap::COL_RDATE, $this->rdate);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_RCCODE)) {
            $criteria->add(AliStockcardRTableMap::COL_RCCODE, $this->rccode);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_YOKMA)) {
            $criteria->add(AliStockcardRTableMap::COL_YOKMA, $this->yokma);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_BALANCE)) {
            $criteria->add(AliStockcardRTableMap::COL_BALANCE, $this->balance);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_PRICE)) {
            $criteria->add(AliStockcardRTableMap::COL_PRICE, $this->price);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_AMOUNT)) {
            $criteria->add(AliStockcardRTableMap::COL_AMOUNT, $this->amount);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_UID)) {
            $criteria->add(AliStockcardRTableMap::COL_UID, $this->uid);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_ACTION)) {
            $criteria->add(AliStockcardRTableMap::COL_ACTION, $this->action);
        }
        if ($this->isColumnModified(AliStockcardRTableMap::COL_CANCEL)) {
            $criteria->add(AliStockcardRTableMap::COL_CANCEL, $this->cancel);
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
        $criteria = ChildAliStockcardRQuery::create();
        $criteria->add(AliStockcardRTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliStockcardR (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMcode($this->getMcode());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setInvCode($this->getInvCode());
        $copyObj->setInvRef($this->getInvRef());
        $copyObj->setInvAction($this->getInvAction());
        $copyObj->setSano($this->getSano());
        $copyObj->setSanoRef($this->getSanoRef());
        $copyObj->setPcode($this->getPcode());
        $copyObj->setPdesc($this->getPdesc());
        $copyObj->setInQty($this->getInQty());
        $copyObj->setInPrice($this->getInPrice());
        $copyObj->setInAmount($this->getInAmount());
        $copyObj->setOutQty($this->getOutQty());
        $copyObj->setOutPrice($this->getOutPrice());
        $copyObj->setOutAmount($this->getOutAmount());
        $copyObj->setSadate($this->getSadate());
        $copyObj->setRdate($this->getRdate());
        $copyObj->setRccode($this->getRccode());
        $copyObj->setYokma($this->getYokma());
        $copyObj->setBalance($this->getBalance());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setUid($this->getUid());
        $copyObj->setAction($this->getAction());
        $copyObj->setCancel($this->getCancel());
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
     * @return \CciOrm\CciOrm\AliStockcardR Clone of current object.
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
        $this->inv_code = null;
        $this->inv_ref = null;
        $this->inv_action = null;
        $this->sano = null;
        $this->sano_ref = null;
        $this->pcode = null;
        $this->pdesc = null;
        $this->in_qty = null;
        $this->in_price = null;
        $this->in_amount = null;
        $this->out_qty = null;
        $this->out_price = null;
        $this->out_amount = null;
        $this->sadate = null;
        $this->rdate = null;
        $this->rccode = null;
        $this->yokma = null;
        $this->balance = null;
        $this->price = null;
        $this->amount = null;
        $this->uid = null;
        $this->action = null;
        $this->cancel = null;
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
        return (string) $this->exportTo(AliStockcardRTableMap::DEFAULT_STRING_FORMAT);
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
