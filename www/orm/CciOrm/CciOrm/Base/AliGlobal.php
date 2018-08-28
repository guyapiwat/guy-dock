<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliGlobalQuery as ChildAliGlobalQuery;
use CciOrm\CciOrm\Map\AliGlobalTableMap;
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
 * Base class that represents a row from the 'ali_global' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliGlobal implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliGlobalTableMap';


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
     * The value for the numofchild field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $numofchild;

    /**
     * The value for the treeformat field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $treeformat;

    /**
     * The value for the numoflevel field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $numoflevel;

    /**
     * The value for the statusformat field.
     *
     * Note: this column has a database default value of: 'close'
     * @var        string
     */
    protected $statusformat;

    /**
     * The value for the status_member field.
     *
     * @var        int
     */
    protected $status_member;

    /**
     * The value for the status_member_remark field.
     *
     * @var        string
     */
    protected $status_member_remark;

    /**
     * The value for the status_regis_mb field.
     *
     * @var        int
     */
    protected $status_regis_mb;

    /**
     * The value for the status_regis_mb_remark field.
     *
     * @var        string
     */
    protected $status_regis_mb_remark;

    /**
     * The value for the status_sale_mb field.
     *
     * @var        int
     */
    protected $status_sale_mb;

    /**
     * The value for the status_sale_mb_remark field.
     *
     * @var        string
     */
    protected $status_sale_mb_remark;

    /**
     * The value for the status_swap_mb field.
     *
     * @var        int
     */
    protected $status_swap_mb;

    /**
     * The value for the status_swap_mb_remark field.
     *
     * @var        string
     */
    protected $status_swap_mb_remark;

    /**
     * The value for the status_hold_mb field.
     *
     * @var        int
     */
    protected $status_hold_mb;

    /**
     * The value for the status_hold_mb_remark field.
     *
     * @var        string
     */
    protected $status_hold_mb_remark;

    /**
     * The value for the status_remark field.
     *
     * @var        string
     */
    protected $status_remark;

    /**
     * The value for the statusewallet field.
     *
     * @var        string
     */
    protected $statusewallet;

    /**
     * The value for the vip_exp field.
     *
     * @var        int
     */
    protected $vip_exp;

    /**
     * The value for the status_cron field.
     *
     * @var        int
     */
    protected $status_cron;

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
        $this->numofchild = 0;
        $this->treeformat = '';
        $this->numoflevel = 0;
        $this->statusformat = 'close';
    }

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliGlobal object.
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
     * Compares this with another <code>AliGlobal</code> instance.  If
     * <code>obj</code> is an instance of <code>AliGlobal</code>, delegates to
     * <code>equals(AliGlobal)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliGlobal The current object, for fluid interface
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
     * Get the [numofchild] column value.
     *
     * @return int
     */
    public function getNumofchild()
    {
        return $this->numofchild;
    }

    /**
     * Get the [treeformat] column value.
     *
     * @return string
     */
    public function getTreeformat()
    {
        return $this->treeformat;
    }

    /**
     * Get the [numoflevel] column value.
     *
     * @return int
     */
    public function getNumoflevel()
    {
        return $this->numoflevel;
    }

    /**
     * Get the [statusformat] column value.
     *
     * @return string
     */
    public function getStatusformat()
    {
        return $this->statusformat;
    }

    /**
     * Get the [status_member] column value.
     *
     * @return int
     */
    public function getStatusMember()
    {
        return $this->status_member;
    }

    /**
     * Get the [status_member_remark] column value.
     *
     * @return string
     */
    public function getStatusMemberRemark()
    {
        return $this->status_member_remark;
    }

    /**
     * Get the [status_regis_mb] column value.
     *
     * @return int
     */
    public function getStatusRegisMb()
    {
        return $this->status_regis_mb;
    }

    /**
     * Get the [status_regis_mb_remark] column value.
     *
     * @return string
     */
    public function getStatusRegisMbRemark()
    {
        return $this->status_regis_mb_remark;
    }

    /**
     * Get the [status_sale_mb] column value.
     *
     * @return int
     */
    public function getStatusSaleMb()
    {
        return $this->status_sale_mb;
    }

    /**
     * Get the [status_sale_mb_remark] column value.
     *
     * @return string
     */
    public function getStatusSaleMbRemark()
    {
        return $this->status_sale_mb_remark;
    }

    /**
     * Get the [status_swap_mb] column value.
     *
     * @return int
     */
    public function getStatusSwapMb()
    {
        return $this->status_swap_mb;
    }

    /**
     * Get the [status_swap_mb_remark] column value.
     *
     * @return string
     */
    public function getStatusSwapMbRemark()
    {
        return $this->status_swap_mb_remark;
    }

    /**
     * Get the [status_hold_mb] column value.
     *
     * @return int
     */
    public function getStatusHoldMb()
    {
        return $this->status_hold_mb;
    }

    /**
     * Get the [status_hold_mb_remark] column value.
     *
     * @return string
     */
    public function getStatusHoldMbRemark()
    {
        return $this->status_hold_mb_remark;
    }

    /**
     * Get the [status_remark] column value.
     *
     * @return string
     */
    public function getStatusRemark()
    {
        return $this->status_remark;
    }

    /**
     * Get the [statusewallet] column value.
     *
     * @return string
     */
    public function getStatusewallet()
    {
        return $this->statusewallet;
    }

    /**
     * Get the [vip_exp] column value.
     *
     * @return int
     */
    public function getVipExp()
    {
        return $this->vip_exp;
    }

    /**
     * Get the [status_cron] column value.
     *
     * @return int
     */
    public function getStatusCron()
    {
        return $this->status_cron;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [numofchild] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setNumofchild($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->numofchild !== $v) {
            $this->numofchild = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_NUMOFCHILD] = true;
        }

        return $this;
    } // setNumofchild()

    /**
     * Set the value of [treeformat] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setTreeformat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->treeformat !== $v) {
            $this->treeformat = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_TREEFORMAT] = true;
        }

        return $this;
    } // setTreeformat()

    /**
     * Set the value of [numoflevel] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setNumoflevel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->numoflevel !== $v) {
            $this->numoflevel = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_NUMOFLEVEL] = true;
        }

        return $this;
    } // setNumoflevel()

    /**
     * Set the value of [statusformat] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusformat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->statusformat !== $v) {
            $this->statusformat = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUSFORMAT] = true;
        }

        return $this;
    } // setStatusformat()

    /**
     * Set the value of [status_member] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusMember($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_member !== $v) {
            $this->status_member = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUS_MEMBER] = true;
        }

        return $this;
    } // setStatusMember()

    /**
     * Set the value of [status_member_remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusMemberRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status_member_remark !== $v) {
            $this->status_member_remark = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUS_MEMBER_REMARK] = true;
        }

        return $this;
    } // setStatusMemberRemark()

    /**
     * Set the value of [status_regis_mb] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusRegisMb($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_regis_mb !== $v) {
            $this->status_regis_mb = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUS_REGIS_MB] = true;
        }

        return $this;
    } // setStatusRegisMb()

    /**
     * Set the value of [status_regis_mb_remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusRegisMbRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status_regis_mb_remark !== $v) {
            $this->status_regis_mb_remark = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUS_REGIS_MB_REMARK] = true;
        }

        return $this;
    } // setStatusRegisMbRemark()

    /**
     * Set the value of [status_sale_mb] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusSaleMb($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_sale_mb !== $v) {
            $this->status_sale_mb = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUS_SALE_MB] = true;
        }

        return $this;
    } // setStatusSaleMb()

    /**
     * Set the value of [status_sale_mb_remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusSaleMbRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status_sale_mb_remark !== $v) {
            $this->status_sale_mb_remark = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUS_SALE_MB_REMARK] = true;
        }

        return $this;
    } // setStatusSaleMbRemark()

    /**
     * Set the value of [status_swap_mb] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusSwapMb($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_swap_mb !== $v) {
            $this->status_swap_mb = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUS_SWAP_MB] = true;
        }

        return $this;
    } // setStatusSwapMb()

    /**
     * Set the value of [status_swap_mb_remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusSwapMbRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status_swap_mb_remark !== $v) {
            $this->status_swap_mb_remark = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUS_SWAP_MB_REMARK] = true;
        }

        return $this;
    } // setStatusSwapMbRemark()

    /**
     * Set the value of [status_hold_mb] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusHoldMb($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_hold_mb !== $v) {
            $this->status_hold_mb = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUS_HOLD_MB] = true;
        }

        return $this;
    } // setStatusHoldMb()

    /**
     * Set the value of [status_hold_mb_remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusHoldMbRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status_hold_mb_remark !== $v) {
            $this->status_hold_mb_remark = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUS_HOLD_MB_REMARK] = true;
        }

        return $this;
    } // setStatusHoldMbRemark()

    /**
     * Set the value of [status_remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status_remark !== $v) {
            $this->status_remark = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUS_REMARK] = true;
        }

        return $this;
    } // setStatusRemark()

    /**
     * Set the value of [statusewallet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusewallet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->statusewallet !== $v) {
            $this->statusewallet = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUSEWALLET] = true;
        }

        return $this;
    } // setStatusewallet()

    /**
     * Set the value of [vip_exp] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setVipExp($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->vip_exp !== $v) {
            $this->vip_exp = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_VIP_EXP] = true;
        }

        return $this;
    } // setVipExp()

    /**
     * Set the value of [status_cron] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object (for fluent API support)
     */
    public function setStatusCron($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_cron !== $v) {
            $this->status_cron = $v;
            $this->modifiedColumns[AliGlobalTableMap::COL_STATUS_CRON] = true;
        }

        return $this;
    } // setStatusCron()

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
            if ($this->numofchild !== 0) {
                return false;
            }

            if ($this->treeformat !== '') {
                return false;
            }

            if ($this->numoflevel !== 0) {
                return false;
            }

            if ($this->statusformat !== 'close') {
                return false;
            }

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliGlobalTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliGlobalTableMap::translateFieldName('Numofchild', TableMap::TYPE_PHPNAME, $indexType)];
            $this->numofchild = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliGlobalTableMap::translateFieldName('Treeformat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->treeformat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliGlobalTableMap::translateFieldName('Numoflevel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->numoflevel = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliGlobalTableMap::translateFieldName('Statusformat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->statusformat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliGlobalTableMap::translateFieldName('StatusMember', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_member = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliGlobalTableMap::translateFieldName('StatusMemberRemark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_member_remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliGlobalTableMap::translateFieldName('StatusRegisMb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_regis_mb = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliGlobalTableMap::translateFieldName('StatusRegisMbRemark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_regis_mb_remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliGlobalTableMap::translateFieldName('StatusSaleMb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_sale_mb = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliGlobalTableMap::translateFieldName('StatusSaleMbRemark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_sale_mb_remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliGlobalTableMap::translateFieldName('StatusSwapMb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_swap_mb = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliGlobalTableMap::translateFieldName('StatusSwapMbRemark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_swap_mb_remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliGlobalTableMap::translateFieldName('StatusHoldMb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_hold_mb = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliGlobalTableMap::translateFieldName('StatusHoldMbRemark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_hold_mb_remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliGlobalTableMap::translateFieldName('StatusRemark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliGlobalTableMap::translateFieldName('Statusewallet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->statusewallet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliGlobalTableMap::translateFieldName('VipExp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vip_exp = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliGlobalTableMap::translateFieldName('StatusCron', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_cron = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 19; // 19 = AliGlobalTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliGlobal'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliGlobalTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliGlobalQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliGlobal::setDeleted()
     * @see AliGlobal::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliGlobalTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliGlobalQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliGlobalTableMap::DATABASE_NAME);
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
                AliGlobalTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliGlobalTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliGlobalTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliGlobalTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_NUMOFCHILD)) {
            $modifiedColumns[':p' . $index++]  = 'numofchild';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_TREEFORMAT)) {
            $modifiedColumns[':p' . $index++]  = 'treeformat';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_NUMOFLEVEL)) {
            $modifiedColumns[':p' . $index++]  = 'numoflevel';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUSFORMAT)) {
            $modifiedColumns[':p' . $index++]  = 'statusformat';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_MEMBER)) {
            $modifiedColumns[':p' . $index++]  = 'status_member';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_MEMBER_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'status_member_remark';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_REGIS_MB)) {
            $modifiedColumns[':p' . $index++]  = 'status_regis_mb';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_REGIS_MB_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'status_regis_mb_remark';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_SALE_MB)) {
            $modifiedColumns[':p' . $index++]  = 'status_sale_mb';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_SALE_MB_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'status_sale_mb_remark';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_SWAP_MB)) {
            $modifiedColumns[':p' . $index++]  = 'status_swap_mb';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_SWAP_MB_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'status_swap_mb_remark';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_HOLD_MB)) {
            $modifiedColumns[':p' . $index++]  = 'status_hold_mb';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_HOLD_MB_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'status_hold_mb_remark';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'status_remark';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUSEWALLET)) {
            $modifiedColumns[':p' . $index++]  = 'statusewallet';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_VIP_EXP)) {
            $modifiedColumns[':p' . $index++]  = 'vip_exp';
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_CRON)) {
            $modifiedColumns[':p' . $index++]  = 'status_cron';
        }

        $sql = sprintf(
            'INSERT INTO ali_global (%s) VALUES (%s)',
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
                    case 'numofchild':
                        $stmt->bindValue($identifier, $this->numofchild, PDO::PARAM_INT);
                        break;
                    case 'treeformat':
                        $stmt->bindValue($identifier, $this->treeformat, PDO::PARAM_STR);
                        break;
                    case 'numoflevel':
                        $stmt->bindValue($identifier, $this->numoflevel, PDO::PARAM_INT);
                        break;
                    case 'statusformat':
                        $stmt->bindValue($identifier, $this->statusformat, PDO::PARAM_STR);
                        break;
                    case 'status_member':
                        $stmt->bindValue($identifier, $this->status_member, PDO::PARAM_INT);
                        break;
                    case 'status_member_remark':
                        $stmt->bindValue($identifier, $this->status_member_remark, PDO::PARAM_STR);
                        break;
                    case 'status_regis_mb':
                        $stmt->bindValue($identifier, $this->status_regis_mb, PDO::PARAM_INT);
                        break;
                    case 'status_regis_mb_remark':
                        $stmt->bindValue($identifier, $this->status_regis_mb_remark, PDO::PARAM_STR);
                        break;
                    case 'status_sale_mb':
                        $stmt->bindValue($identifier, $this->status_sale_mb, PDO::PARAM_INT);
                        break;
                    case 'status_sale_mb_remark':
                        $stmt->bindValue($identifier, $this->status_sale_mb_remark, PDO::PARAM_STR);
                        break;
                    case 'status_swap_mb':
                        $stmt->bindValue($identifier, $this->status_swap_mb, PDO::PARAM_INT);
                        break;
                    case 'status_swap_mb_remark':
                        $stmt->bindValue($identifier, $this->status_swap_mb_remark, PDO::PARAM_STR);
                        break;
                    case 'status_hold_mb':
                        $stmt->bindValue($identifier, $this->status_hold_mb, PDO::PARAM_INT);
                        break;
                    case 'status_hold_mb_remark':
                        $stmt->bindValue($identifier, $this->status_hold_mb_remark, PDO::PARAM_STR);
                        break;
                    case 'status_remark':
                        $stmt->bindValue($identifier, $this->status_remark, PDO::PARAM_STR);
                        break;
                    case 'statusewallet':
                        $stmt->bindValue($identifier, $this->statusewallet, PDO::PARAM_STR);
                        break;
                    case 'vip_exp':
                        $stmt->bindValue($identifier, $this->vip_exp, PDO::PARAM_INT);
                        break;
                    case 'status_cron':
                        $stmt->bindValue($identifier, $this->status_cron, PDO::PARAM_INT);
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
        $pos = AliGlobalTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getNumofchild();
                break;
            case 2:
                return $this->getTreeformat();
                break;
            case 3:
                return $this->getNumoflevel();
                break;
            case 4:
                return $this->getStatusformat();
                break;
            case 5:
                return $this->getStatusMember();
                break;
            case 6:
                return $this->getStatusMemberRemark();
                break;
            case 7:
                return $this->getStatusRegisMb();
                break;
            case 8:
                return $this->getStatusRegisMbRemark();
                break;
            case 9:
                return $this->getStatusSaleMb();
                break;
            case 10:
                return $this->getStatusSaleMbRemark();
                break;
            case 11:
                return $this->getStatusSwapMb();
                break;
            case 12:
                return $this->getStatusSwapMbRemark();
                break;
            case 13:
                return $this->getStatusHoldMb();
                break;
            case 14:
                return $this->getStatusHoldMbRemark();
                break;
            case 15:
                return $this->getStatusRemark();
                break;
            case 16:
                return $this->getStatusewallet();
                break;
            case 17:
                return $this->getVipExp();
                break;
            case 18:
                return $this->getStatusCron();
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

        if (isset($alreadyDumpedObjects['AliGlobal'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliGlobal'][$this->hashCode()] = true;
        $keys = AliGlobalTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNumofchild(),
            $keys[2] => $this->getTreeformat(),
            $keys[3] => $this->getNumoflevel(),
            $keys[4] => $this->getStatusformat(),
            $keys[5] => $this->getStatusMember(),
            $keys[6] => $this->getStatusMemberRemark(),
            $keys[7] => $this->getStatusRegisMb(),
            $keys[8] => $this->getStatusRegisMbRemark(),
            $keys[9] => $this->getStatusSaleMb(),
            $keys[10] => $this->getStatusSaleMbRemark(),
            $keys[11] => $this->getStatusSwapMb(),
            $keys[12] => $this->getStatusSwapMbRemark(),
            $keys[13] => $this->getStatusHoldMb(),
            $keys[14] => $this->getStatusHoldMbRemark(),
            $keys[15] => $this->getStatusRemark(),
            $keys[16] => $this->getStatusewallet(),
            $keys[17] => $this->getVipExp(),
            $keys[18] => $this->getStatusCron(),
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
     * @return $this|\CciOrm\CciOrm\AliGlobal
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliGlobalTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliGlobal
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setNumofchild($value);
                break;
            case 2:
                $this->setTreeformat($value);
                break;
            case 3:
                $this->setNumoflevel($value);
                break;
            case 4:
                $this->setStatusformat($value);
                break;
            case 5:
                $this->setStatusMember($value);
                break;
            case 6:
                $this->setStatusMemberRemark($value);
                break;
            case 7:
                $this->setStatusRegisMb($value);
                break;
            case 8:
                $this->setStatusRegisMbRemark($value);
                break;
            case 9:
                $this->setStatusSaleMb($value);
                break;
            case 10:
                $this->setStatusSaleMbRemark($value);
                break;
            case 11:
                $this->setStatusSwapMb($value);
                break;
            case 12:
                $this->setStatusSwapMbRemark($value);
                break;
            case 13:
                $this->setStatusHoldMb($value);
                break;
            case 14:
                $this->setStatusHoldMbRemark($value);
                break;
            case 15:
                $this->setStatusRemark($value);
                break;
            case 16:
                $this->setStatusewallet($value);
                break;
            case 17:
                $this->setVipExp($value);
                break;
            case 18:
                $this->setStatusCron($value);
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
        $keys = AliGlobalTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNumofchild($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setTreeformat($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setNumoflevel($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setStatusformat($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setStatusMember($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setStatusMemberRemark($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setStatusRegisMb($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setStatusRegisMbRemark($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setStatusSaleMb($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setStatusSaleMbRemark($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setStatusSwapMb($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setStatusSwapMbRemark($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setStatusHoldMb($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setStatusHoldMbRemark($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setStatusRemark($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setStatusewallet($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setVipExp($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setStatusCron($arr[$keys[18]]);
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
     * @return $this|\CciOrm\CciOrm\AliGlobal The current object, for fluid interface
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
        $criteria = new Criteria(AliGlobalTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliGlobalTableMap::COL_ID)) {
            $criteria->add(AliGlobalTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_NUMOFCHILD)) {
            $criteria->add(AliGlobalTableMap::COL_NUMOFCHILD, $this->numofchild);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_TREEFORMAT)) {
            $criteria->add(AliGlobalTableMap::COL_TREEFORMAT, $this->treeformat);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_NUMOFLEVEL)) {
            $criteria->add(AliGlobalTableMap::COL_NUMOFLEVEL, $this->numoflevel);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUSFORMAT)) {
            $criteria->add(AliGlobalTableMap::COL_STATUSFORMAT, $this->statusformat);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_MEMBER)) {
            $criteria->add(AliGlobalTableMap::COL_STATUS_MEMBER, $this->status_member);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_MEMBER_REMARK)) {
            $criteria->add(AliGlobalTableMap::COL_STATUS_MEMBER_REMARK, $this->status_member_remark);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_REGIS_MB)) {
            $criteria->add(AliGlobalTableMap::COL_STATUS_REGIS_MB, $this->status_regis_mb);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_REGIS_MB_REMARK)) {
            $criteria->add(AliGlobalTableMap::COL_STATUS_REGIS_MB_REMARK, $this->status_regis_mb_remark);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_SALE_MB)) {
            $criteria->add(AliGlobalTableMap::COL_STATUS_SALE_MB, $this->status_sale_mb);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_SALE_MB_REMARK)) {
            $criteria->add(AliGlobalTableMap::COL_STATUS_SALE_MB_REMARK, $this->status_sale_mb_remark);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_SWAP_MB)) {
            $criteria->add(AliGlobalTableMap::COL_STATUS_SWAP_MB, $this->status_swap_mb);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_SWAP_MB_REMARK)) {
            $criteria->add(AliGlobalTableMap::COL_STATUS_SWAP_MB_REMARK, $this->status_swap_mb_remark);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_HOLD_MB)) {
            $criteria->add(AliGlobalTableMap::COL_STATUS_HOLD_MB, $this->status_hold_mb);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_HOLD_MB_REMARK)) {
            $criteria->add(AliGlobalTableMap::COL_STATUS_HOLD_MB_REMARK, $this->status_hold_mb_remark);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_REMARK)) {
            $criteria->add(AliGlobalTableMap::COL_STATUS_REMARK, $this->status_remark);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUSEWALLET)) {
            $criteria->add(AliGlobalTableMap::COL_STATUSEWALLET, $this->statusewallet);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_VIP_EXP)) {
            $criteria->add(AliGlobalTableMap::COL_VIP_EXP, $this->vip_exp);
        }
        if ($this->isColumnModified(AliGlobalTableMap::COL_STATUS_CRON)) {
            $criteria->add(AliGlobalTableMap::COL_STATUS_CRON, $this->status_cron);
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
        $criteria = ChildAliGlobalQuery::create();
        $criteria->add(AliGlobalTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliGlobal (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNumofchild($this->getNumofchild());
        $copyObj->setTreeformat($this->getTreeformat());
        $copyObj->setNumoflevel($this->getNumoflevel());
        $copyObj->setStatusformat($this->getStatusformat());
        $copyObj->setStatusMember($this->getStatusMember());
        $copyObj->setStatusMemberRemark($this->getStatusMemberRemark());
        $copyObj->setStatusRegisMb($this->getStatusRegisMb());
        $copyObj->setStatusRegisMbRemark($this->getStatusRegisMbRemark());
        $copyObj->setStatusSaleMb($this->getStatusSaleMb());
        $copyObj->setStatusSaleMbRemark($this->getStatusSaleMbRemark());
        $copyObj->setStatusSwapMb($this->getStatusSwapMb());
        $copyObj->setStatusSwapMbRemark($this->getStatusSwapMbRemark());
        $copyObj->setStatusHoldMb($this->getStatusHoldMb());
        $copyObj->setStatusHoldMbRemark($this->getStatusHoldMbRemark());
        $copyObj->setStatusRemark($this->getStatusRemark());
        $copyObj->setStatusewallet($this->getStatusewallet());
        $copyObj->setVipExp($this->getVipExp());
        $copyObj->setStatusCron($this->getStatusCron());
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
     * @return \CciOrm\CciOrm\AliGlobal Clone of current object.
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
        $this->numofchild = null;
        $this->treeformat = null;
        $this->numoflevel = null;
        $this->statusformat = null;
        $this->status_member = null;
        $this->status_member_remark = null;
        $this->status_regis_mb = null;
        $this->status_regis_mb_remark = null;
        $this->status_sale_mb = null;
        $this->status_sale_mb_remark = null;
        $this->status_swap_mb = null;
        $this->status_swap_mb_remark = null;
        $this->status_hold_mb = null;
        $this->status_hold_mb_remark = null;
        $this->status_remark = null;
        $this->statusewallet = null;
        $this->vip_exp = null;
        $this->status_cron = null;
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
        return (string) $this->exportTo(AliGlobalTableMap::DEFAULT_STRING_FORMAT);
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
