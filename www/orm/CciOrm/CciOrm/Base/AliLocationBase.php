<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliLocationBaseQuery as ChildAliLocationBaseQuery;
use CciOrm\CciOrm\Map\AliLocationBaseTableMap;
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

/**
 * Base class that represents a row from the 'ali_location_base' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliLocationBase implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliLocationBaseTableMap';


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
     * The value for the cid field.
     *
     * @var        int
     */
    protected $cid;

    /**
     * The value for the cshort field.
     *
     * @var        string
     */
    protected $cshort;

    /**
     * The value for the cname field.
     *
     * @var        string
     */
    protected $cname;

    /**
     * The value for the csending field.
     *
     * @var        string
     */
    protected $csending;

    /**
     * The value for the ctax field.
     *
     * @var        string
     */
    protected $ctax;

    /**
     * The value for the ctax1 field.
     *
     * @var        string
     */
    protected $ctax1;

    /**
     * The value for the com_stockist field.
     *
     * @var        string
     */
    protected $com_stockist;

    /**
     * The value for the crate field.
     *
     * @var        string
     */
    protected $crate;

    /**
     * The value for the pcode_register field.
     *
     * @var        string
     */
    protected $pcode_register;

    /**
     * The value for the pcode_extend field.
     *
     * @var        string
     */
    protected $pcode_extend;

    /**
     * The value for the pcode_charge field.
     *
     * @var        string
     */
    protected $pcode_charge;

    /**
     * The value for the smssending field.
     *
     * @var        int
     */
    protected $smssending;

    /**
     * The value for the currcode field.
     *
     * @var        string
     */
    protected $currcode;

    /**
     * The value for the lang field.
     *
     * @var        string
     */
    protected $lang;

    /**
     * The value for the timediff field.
     *
     * @var        int
     */
    protected $timediff;

    /**
     * The value for the regis_transfer field.
     *
     * @var        string
     */
    protected $regis_transfer;

    /**
     * The value for the regis_success field.
     *
     * @var        string
     */
    protected $regis_success;

    /**
     * The value for the regis_fail field.
     *
     * @var        string
     */
    protected $regis_fail;

    /**
     * The value for the regis_cancel field.
     *
     * @var        string
     */
    protected $regis_cancel;

    /**
     * The value for the main_inv_code field.
     *
     * @var        string
     */
    protected $main_inv_code;

    /**
     * The value for the com_transfer_chagre field.
     *
     * @var        string
     */
    protected $com_transfer_chagre;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliLocationBase object.
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
     * Compares this with another <code>AliLocationBase</code> instance.  If
     * <code>obj</code> is an instance of <code>AliLocationBase</code>, delegates to
     * <code>equals(AliLocationBase)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliLocationBase The current object, for fluid interface
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
     * Get the [cid] column value.
     *
     * @return int
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Get the [cshort] column value.
     *
     * @return string
     */
    public function getCshort()
    {
        return $this->cshort;
    }

    /**
     * Get the [cname] column value.
     *
     * @return string
     */
    public function getCname()
    {
        return $this->cname;
    }

    /**
     * Get the [csending] column value.
     *
     * @return string
     */
    public function getCsending()
    {
        return $this->csending;
    }

    /**
     * Get the [ctax] column value.
     *
     * @return string
     */
    public function getCtax()
    {
        return $this->ctax;
    }

    /**
     * Get the [ctax1] column value.
     *
     * @return string
     */
    public function getCtax1()
    {
        return $this->ctax1;
    }

    /**
     * Get the [com_stockist] column value.
     *
     * @return string
     */
    public function getComStockist()
    {
        return $this->com_stockist;
    }

    /**
     * Get the [crate] column value.
     *
     * @return string
     */
    public function getCrate()
    {
        return $this->crate;
    }

    /**
     * Get the [pcode_register] column value.
     *
     * @return string
     */
    public function getPcodeRegister()
    {
        return $this->pcode_register;
    }

    /**
     * Get the [pcode_extend] column value.
     *
     * @return string
     */
    public function getPcodeExtend()
    {
        return $this->pcode_extend;
    }

    /**
     * Get the [pcode_charge] column value.
     *
     * @return string
     */
    public function getPcodeCharge()
    {
        return $this->pcode_charge;
    }

    /**
     * Get the [smssending] column value.
     *
     * @return int
     */
    public function getSmssending()
    {
        return $this->smssending;
    }

    /**
     * Get the [currcode] column value.
     *
     * @return string
     */
    public function getCurrcode()
    {
        return $this->currcode;
    }

    /**
     * Get the [lang] column value.
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Get the [timediff] column value.
     *
     * @return int
     */
    public function getTimediff()
    {
        return $this->timediff;
    }

    /**
     * Get the [regis_transfer] column value.
     *
     * @return string
     */
    public function getRegisTransfer()
    {
        return $this->regis_transfer;
    }

    /**
     * Get the [regis_success] column value.
     *
     * @return string
     */
    public function getRegisSuccess()
    {
        return $this->regis_success;
    }

    /**
     * Get the [regis_fail] column value.
     *
     * @return string
     */
    public function getRegisFail()
    {
        return $this->regis_fail;
    }

    /**
     * Get the [regis_cancel] column value.
     *
     * @return string
     */
    public function getRegisCancel()
    {
        return $this->regis_cancel;
    }

    /**
     * Get the [main_inv_code] column value.
     *
     * @return string
     */
    public function getMainInvCode()
    {
        return $this->main_inv_code;
    }

    /**
     * Get the [com_transfer_chagre] column value.
     *
     * @return string
     */
    public function getComTransferChagre()
    {
        return $this->com_transfer_chagre;
    }

    /**
     * Set the value of [cid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setCid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cid !== $v) {
            $this->cid = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_CID] = true;
        }

        return $this;
    } // setCid()

    /**
     * Set the value of [cshort] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setCshort($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cshort !== $v) {
            $this->cshort = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_CSHORT] = true;
        }

        return $this;
    } // setCshort()

    /**
     * Set the value of [cname] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setCname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cname !== $v) {
            $this->cname = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_CNAME] = true;
        }

        return $this;
    } // setCname()

    /**
     * Set the value of [csending] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setCsending($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->csending !== $v) {
            $this->csending = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_CSENDING] = true;
        }

        return $this;
    } // setCsending()

    /**
     * Set the value of [ctax] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setCtax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ctax !== $v) {
            $this->ctax = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_CTAX] = true;
        }

        return $this;
    } // setCtax()

    /**
     * Set the value of [ctax1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setCtax1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ctax1 !== $v) {
            $this->ctax1 = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_CTAX1] = true;
        }

        return $this;
    } // setCtax1()

    /**
     * Set the value of [com_stockist] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setComStockist($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->com_stockist !== $v) {
            $this->com_stockist = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_COM_STOCKIST] = true;
        }

        return $this;
    } // setComStockist()

    /**
     * Set the value of [crate] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setCrate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->crate !== $v) {
            $this->crate = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_CRATE] = true;
        }

        return $this;
    } // setCrate()

    /**
     * Set the value of [pcode_register] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setPcodeRegister($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pcode_register !== $v) {
            $this->pcode_register = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_PCODE_REGISTER] = true;
        }

        return $this;
    } // setPcodeRegister()

    /**
     * Set the value of [pcode_extend] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setPcodeExtend($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pcode_extend !== $v) {
            $this->pcode_extend = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_PCODE_EXTEND] = true;
        }

        return $this;
    } // setPcodeExtend()

    /**
     * Set the value of [pcode_charge] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setPcodeCharge($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pcode_charge !== $v) {
            $this->pcode_charge = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_PCODE_CHARGE] = true;
        }

        return $this;
    } // setPcodeCharge()

    /**
     * Set the value of [smssending] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setSmssending($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->smssending !== $v) {
            $this->smssending = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_SMSSENDING] = true;
        }

        return $this;
    } // setSmssending()

    /**
     * Set the value of [currcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setCurrcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->currcode !== $v) {
            $this->currcode = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_CURRCODE] = true;
        }

        return $this;
    } // setCurrcode()

    /**
     * Set the value of [lang] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setLang($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lang !== $v) {
            $this->lang = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_LANG] = true;
        }

        return $this;
    } // setLang()

    /**
     * Set the value of [timediff] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setTimediff($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->timediff !== $v) {
            $this->timediff = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_TIMEDIFF] = true;
        }

        return $this;
    } // setTimediff()

    /**
     * Set the value of [regis_transfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setRegisTransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->regis_transfer !== $v) {
            $this->regis_transfer = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_REGIS_TRANSFER] = true;
        }

        return $this;
    } // setRegisTransfer()

    /**
     * Set the value of [regis_success] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setRegisSuccess($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->regis_success !== $v) {
            $this->regis_success = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_REGIS_SUCCESS] = true;
        }

        return $this;
    } // setRegisSuccess()

    /**
     * Set the value of [regis_fail] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setRegisFail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->regis_fail !== $v) {
            $this->regis_fail = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_REGIS_FAIL] = true;
        }

        return $this;
    } // setRegisFail()

    /**
     * Set the value of [regis_cancel] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setRegisCancel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->regis_cancel !== $v) {
            $this->regis_cancel = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_REGIS_CANCEL] = true;
        }

        return $this;
    } // setRegisCancel()

    /**
     * Set the value of [main_inv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setMainInvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->main_inv_code !== $v) {
            $this->main_inv_code = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_MAIN_INV_CODE] = true;
        }

        return $this;
    } // setMainInvCode()

    /**
     * Set the value of [com_transfer_chagre] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object (for fluent API support)
     */
    public function setComTransferChagre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->com_transfer_chagre !== $v) {
            $this->com_transfer_chagre = $v;
            $this->modifiedColumns[AliLocationBaseTableMap::COL_COM_TRANSFER_CHAGRE] = true;
        }

        return $this;
    } // setComTransferChagre()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliLocationBaseTableMap::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliLocationBaseTableMap::translateFieldName('Cshort', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cshort = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliLocationBaseTableMap::translateFieldName('Cname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliLocationBaseTableMap::translateFieldName('Csending', TableMap::TYPE_PHPNAME, $indexType)];
            $this->csending = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliLocationBaseTableMap::translateFieldName('Ctax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ctax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliLocationBaseTableMap::translateFieldName('Ctax1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ctax1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliLocationBaseTableMap::translateFieldName('ComStockist', TableMap::TYPE_PHPNAME, $indexType)];
            $this->com_stockist = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliLocationBaseTableMap::translateFieldName('Crate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->crate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliLocationBaseTableMap::translateFieldName('PcodeRegister', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pcode_register = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliLocationBaseTableMap::translateFieldName('PcodeExtend', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pcode_extend = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliLocationBaseTableMap::translateFieldName('PcodeCharge', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pcode_charge = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliLocationBaseTableMap::translateFieldName('Smssending', TableMap::TYPE_PHPNAME, $indexType)];
            $this->smssending = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliLocationBaseTableMap::translateFieldName('Currcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->currcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliLocationBaseTableMap::translateFieldName('Lang', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lang = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliLocationBaseTableMap::translateFieldName('Timediff', TableMap::TYPE_PHPNAME, $indexType)];
            $this->timediff = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliLocationBaseTableMap::translateFieldName('RegisTransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regis_transfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliLocationBaseTableMap::translateFieldName('RegisSuccess', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regis_success = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliLocationBaseTableMap::translateFieldName('RegisFail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regis_fail = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliLocationBaseTableMap::translateFieldName('RegisCancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regis_cancel = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliLocationBaseTableMap::translateFieldName('MainInvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->main_inv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliLocationBaseTableMap::translateFieldName('ComTransferChagre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->com_transfer_chagre = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 21; // 21 = AliLocationBaseTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliLocationBase'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliLocationBaseTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliLocationBaseQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliLocationBase::setDeleted()
     * @see AliLocationBase::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLocationBaseTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliLocationBaseQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLocationBaseTableMap::DATABASE_NAME);
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
                AliLocationBaseTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliLocationBaseTableMap::COL_CID] = true;
        if (null !== $this->cid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliLocationBaseTableMap::COL_CID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CID)) {
            $modifiedColumns[':p' . $index++]  = 'cid';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CSHORT)) {
            $modifiedColumns[':p' . $index++]  = 'cshort';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CNAME)) {
            $modifiedColumns[':p' . $index++]  = 'cname';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CSENDING)) {
            $modifiedColumns[':p' . $index++]  = 'csending';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CTAX)) {
            $modifiedColumns[':p' . $index++]  = 'ctax';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CTAX1)) {
            $modifiedColumns[':p' . $index++]  = 'ctax1';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_COM_STOCKIST)) {
            $modifiedColumns[':p' . $index++]  = 'com_stockist';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CRATE)) {
            $modifiedColumns[':p' . $index++]  = 'crate';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_PCODE_REGISTER)) {
            $modifiedColumns[':p' . $index++]  = 'pcode_register';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_PCODE_EXTEND)) {
            $modifiedColumns[':p' . $index++]  = 'pcode_extend';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_PCODE_CHARGE)) {
            $modifiedColumns[':p' . $index++]  = 'pcode_charge';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_SMSSENDING)) {
            $modifiedColumns[':p' . $index++]  = 'smssending';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CURRCODE)) {
            $modifiedColumns[':p' . $index++]  = 'currcode';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_LANG)) {
            $modifiedColumns[':p' . $index++]  = 'lang';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_TIMEDIFF)) {
            $modifiedColumns[':p' . $index++]  = 'timediff';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_REGIS_TRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'regis_transfer';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_REGIS_SUCCESS)) {
            $modifiedColumns[':p' . $index++]  = 'regis_success';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_REGIS_FAIL)) {
            $modifiedColumns[':p' . $index++]  = 'regis_fail';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_REGIS_CANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'regis_cancel';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_MAIN_INV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'main_inv_code';
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_COM_TRANSFER_CHAGRE)) {
            $modifiedColumns[':p' . $index++]  = 'com_transfer_chagre';
        }

        $sql = sprintf(
            'INSERT INTO ali_location_base (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'cid':
                        $stmt->bindValue($identifier, $this->cid, PDO::PARAM_INT);
                        break;
                    case 'cshort':
                        $stmt->bindValue($identifier, $this->cshort, PDO::PARAM_STR);
                        break;
                    case 'cname':
                        $stmt->bindValue($identifier, $this->cname, PDO::PARAM_STR);
                        break;
                    case 'csending':
                        $stmt->bindValue($identifier, $this->csending, PDO::PARAM_STR);
                        break;
                    case 'ctax':
                        $stmt->bindValue($identifier, $this->ctax, PDO::PARAM_STR);
                        break;
                    case 'ctax1':
                        $stmt->bindValue($identifier, $this->ctax1, PDO::PARAM_STR);
                        break;
                    case 'com_stockist':
                        $stmt->bindValue($identifier, $this->com_stockist, PDO::PARAM_STR);
                        break;
                    case 'crate':
                        $stmt->bindValue($identifier, $this->crate, PDO::PARAM_STR);
                        break;
                    case 'pcode_register':
                        $stmt->bindValue($identifier, $this->pcode_register, PDO::PARAM_STR);
                        break;
                    case 'pcode_extend':
                        $stmt->bindValue($identifier, $this->pcode_extend, PDO::PARAM_STR);
                        break;
                    case 'pcode_charge':
                        $stmt->bindValue($identifier, $this->pcode_charge, PDO::PARAM_STR);
                        break;
                    case 'smssending':
                        $stmt->bindValue($identifier, $this->smssending, PDO::PARAM_INT);
                        break;
                    case 'currcode':
                        $stmt->bindValue($identifier, $this->currcode, PDO::PARAM_STR);
                        break;
                    case 'lang':
                        $stmt->bindValue($identifier, $this->lang, PDO::PARAM_STR);
                        break;
                    case 'timediff':
                        $stmt->bindValue($identifier, $this->timediff, PDO::PARAM_INT);
                        break;
                    case 'regis_transfer':
                        $stmt->bindValue($identifier, $this->regis_transfer, PDO::PARAM_STR);
                        break;
                    case 'regis_success':
                        $stmt->bindValue($identifier, $this->regis_success, PDO::PARAM_STR);
                        break;
                    case 'regis_fail':
                        $stmt->bindValue($identifier, $this->regis_fail, PDO::PARAM_STR);
                        break;
                    case 'regis_cancel':
                        $stmt->bindValue($identifier, $this->regis_cancel, PDO::PARAM_STR);
                        break;
                    case 'main_inv_code':
                        $stmt->bindValue($identifier, $this->main_inv_code, PDO::PARAM_STR);
                        break;
                    case 'com_transfer_chagre':
                        $stmt->bindValue($identifier, $this->com_transfer_chagre, PDO::PARAM_STR);
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
        $this->setCid($pk);

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
        $pos = AliLocationBaseTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getCid();
                break;
            case 1:
                return $this->getCshort();
                break;
            case 2:
                return $this->getCname();
                break;
            case 3:
                return $this->getCsending();
                break;
            case 4:
                return $this->getCtax();
                break;
            case 5:
                return $this->getCtax1();
                break;
            case 6:
                return $this->getComStockist();
                break;
            case 7:
                return $this->getCrate();
                break;
            case 8:
                return $this->getPcodeRegister();
                break;
            case 9:
                return $this->getPcodeExtend();
                break;
            case 10:
                return $this->getPcodeCharge();
                break;
            case 11:
                return $this->getSmssending();
                break;
            case 12:
                return $this->getCurrcode();
                break;
            case 13:
                return $this->getLang();
                break;
            case 14:
                return $this->getTimediff();
                break;
            case 15:
                return $this->getRegisTransfer();
                break;
            case 16:
                return $this->getRegisSuccess();
                break;
            case 17:
                return $this->getRegisFail();
                break;
            case 18:
                return $this->getRegisCancel();
                break;
            case 19:
                return $this->getMainInvCode();
                break;
            case 20:
                return $this->getComTransferChagre();
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

        if (isset($alreadyDumpedObjects['AliLocationBase'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliLocationBase'][$this->hashCode()] = true;
        $keys = AliLocationBaseTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCid(),
            $keys[1] => $this->getCshort(),
            $keys[2] => $this->getCname(),
            $keys[3] => $this->getCsending(),
            $keys[4] => $this->getCtax(),
            $keys[5] => $this->getCtax1(),
            $keys[6] => $this->getComStockist(),
            $keys[7] => $this->getCrate(),
            $keys[8] => $this->getPcodeRegister(),
            $keys[9] => $this->getPcodeExtend(),
            $keys[10] => $this->getPcodeCharge(),
            $keys[11] => $this->getSmssending(),
            $keys[12] => $this->getCurrcode(),
            $keys[13] => $this->getLang(),
            $keys[14] => $this->getTimediff(),
            $keys[15] => $this->getRegisTransfer(),
            $keys[16] => $this->getRegisSuccess(),
            $keys[17] => $this->getRegisFail(),
            $keys[18] => $this->getRegisCancel(),
            $keys[19] => $this->getMainInvCode(),
            $keys[20] => $this->getComTransferChagre(),
        );
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
     * @return $this|\CciOrm\CciOrm\AliLocationBase
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliLocationBaseTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliLocationBase
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setCid($value);
                break;
            case 1:
                $this->setCshort($value);
                break;
            case 2:
                $this->setCname($value);
                break;
            case 3:
                $this->setCsending($value);
                break;
            case 4:
                $this->setCtax($value);
                break;
            case 5:
                $this->setCtax1($value);
                break;
            case 6:
                $this->setComStockist($value);
                break;
            case 7:
                $this->setCrate($value);
                break;
            case 8:
                $this->setPcodeRegister($value);
                break;
            case 9:
                $this->setPcodeExtend($value);
                break;
            case 10:
                $this->setPcodeCharge($value);
                break;
            case 11:
                $this->setSmssending($value);
                break;
            case 12:
                $this->setCurrcode($value);
                break;
            case 13:
                $this->setLang($value);
                break;
            case 14:
                $this->setTimediff($value);
                break;
            case 15:
                $this->setRegisTransfer($value);
                break;
            case 16:
                $this->setRegisSuccess($value);
                break;
            case 17:
                $this->setRegisFail($value);
                break;
            case 18:
                $this->setRegisCancel($value);
                break;
            case 19:
                $this->setMainInvCode($value);
                break;
            case 20:
                $this->setComTransferChagre($value);
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
        $keys = AliLocationBaseTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setCid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCshort($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCname($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCsending($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCtax($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCtax1($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setComStockist($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCrate($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPcodeRegister($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPcodeExtend($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setPcodeCharge($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setSmssending($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCurrcode($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setLang($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setTimediff($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setRegisTransfer($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setRegisSuccess($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setRegisFail($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setRegisCancel($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setMainInvCode($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setComTransferChagre($arr[$keys[20]]);
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
     * @return $this|\CciOrm\CciOrm\AliLocationBase The current object, for fluid interface
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
        $criteria = new Criteria(AliLocationBaseTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CID)) {
            $criteria->add(AliLocationBaseTableMap::COL_CID, $this->cid);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CSHORT)) {
            $criteria->add(AliLocationBaseTableMap::COL_CSHORT, $this->cshort);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CNAME)) {
            $criteria->add(AliLocationBaseTableMap::COL_CNAME, $this->cname);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CSENDING)) {
            $criteria->add(AliLocationBaseTableMap::COL_CSENDING, $this->csending);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CTAX)) {
            $criteria->add(AliLocationBaseTableMap::COL_CTAX, $this->ctax);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CTAX1)) {
            $criteria->add(AliLocationBaseTableMap::COL_CTAX1, $this->ctax1);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_COM_STOCKIST)) {
            $criteria->add(AliLocationBaseTableMap::COL_COM_STOCKIST, $this->com_stockist);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CRATE)) {
            $criteria->add(AliLocationBaseTableMap::COL_CRATE, $this->crate);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_PCODE_REGISTER)) {
            $criteria->add(AliLocationBaseTableMap::COL_PCODE_REGISTER, $this->pcode_register);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_PCODE_EXTEND)) {
            $criteria->add(AliLocationBaseTableMap::COL_PCODE_EXTEND, $this->pcode_extend);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_PCODE_CHARGE)) {
            $criteria->add(AliLocationBaseTableMap::COL_PCODE_CHARGE, $this->pcode_charge);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_SMSSENDING)) {
            $criteria->add(AliLocationBaseTableMap::COL_SMSSENDING, $this->smssending);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_CURRCODE)) {
            $criteria->add(AliLocationBaseTableMap::COL_CURRCODE, $this->currcode);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_LANG)) {
            $criteria->add(AliLocationBaseTableMap::COL_LANG, $this->lang);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_TIMEDIFF)) {
            $criteria->add(AliLocationBaseTableMap::COL_TIMEDIFF, $this->timediff);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_REGIS_TRANSFER)) {
            $criteria->add(AliLocationBaseTableMap::COL_REGIS_TRANSFER, $this->regis_transfer);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_REGIS_SUCCESS)) {
            $criteria->add(AliLocationBaseTableMap::COL_REGIS_SUCCESS, $this->regis_success);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_REGIS_FAIL)) {
            $criteria->add(AliLocationBaseTableMap::COL_REGIS_FAIL, $this->regis_fail);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_REGIS_CANCEL)) {
            $criteria->add(AliLocationBaseTableMap::COL_REGIS_CANCEL, $this->regis_cancel);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_MAIN_INV_CODE)) {
            $criteria->add(AliLocationBaseTableMap::COL_MAIN_INV_CODE, $this->main_inv_code);
        }
        if ($this->isColumnModified(AliLocationBaseTableMap::COL_COM_TRANSFER_CHAGRE)) {
            $criteria->add(AliLocationBaseTableMap::COL_COM_TRANSFER_CHAGRE, $this->com_transfer_chagre);
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
        $criteria = ChildAliLocationBaseQuery::create();
        $criteria->add(AliLocationBaseTableMap::COL_CID, $this->cid);

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
        $validPk = null !== $this->getCid();

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
        return $this->getCid();
    }

    /**
     * Generic method to set the primary key (cid column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setCid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getCid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliLocationBase (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCshort($this->getCshort());
        $copyObj->setCname($this->getCname());
        $copyObj->setCsending($this->getCsending());
        $copyObj->setCtax($this->getCtax());
        $copyObj->setCtax1($this->getCtax1());
        $copyObj->setComStockist($this->getComStockist());
        $copyObj->setCrate($this->getCrate());
        $copyObj->setPcodeRegister($this->getPcodeRegister());
        $copyObj->setPcodeExtend($this->getPcodeExtend());
        $copyObj->setPcodeCharge($this->getPcodeCharge());
        $copyObj->setSmssending($this->getSmssending());
        $copyObj->setCurrcode($this->getCurrcode());
        $copyObj->setLang($this->getLang());
        $copyObj->setTimediff($this->getTimediff());
        $copyObj->setRegisTransfer($this->getRegisTransfer());
        $copyObj->setRegisSuccess($this->getRegisSuccess());
        $copyObj->setRegisFail($this->getRegisFail());
        $copyObj->setRegisCancel($this->getRegisCancel());
        $copyObj->setMainInvCode($this->getMainInvCode());
        $copyObj->setComTransferChagre($this->getComTransferChagre());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setCid(NULL); // this is a auto-increment column, so set to default value
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
     * @return \CciOrm\CciOrm\AliLocationBase Clone of current object.
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
        $this->cid = null;
        $this->cshort = null;
        $this->cname = null;
        $this->csending = null;
        $this->ctax = null;
        $this->ctax1 = null;
        $this->com_stockist = null;
        $this->crate = null;
        $this->pcode_register = null;
        $this->pcode_extend = null;
        $this->pcode_charge = null;
        $this->smssending = null;
        $this->currcode = null;
        $this->lang = null;
        $this->timediff = null;
        $this->regis_transfer = null;
        $this->regis_success = null;
        $this->regis_fail = null;
        $this->regis_cancel = null;
        $this->main_inv_code = null;
        $this->com_transfer_chagre = null;
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
        return (string) $this->exportTo(AliLocationBaseTableMap::DEFAULT_STRING_FORMAT);
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
