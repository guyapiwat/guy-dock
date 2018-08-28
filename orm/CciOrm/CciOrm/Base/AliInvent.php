<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliInventQuery as ChildAliInventQuery;
use CciOrm\CciOrm\Map\AliInventTableMap;
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
 * Base class that represents a row from the 'ali_invent' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliInvent implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliInventTableMap';


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
     * The value for the inv_code field.
     *
     * @var        string
     */
    protected $inv_code;

    /**
     * The value for the inv_desc field.
     *
     * @var        string
     */
    protected $inv_desc;

    /**
     * The value for the inv_type field.
     *
     * @var        int
     */
    protected $inv_type;

    /**
     * The value for the code_ref field.
     *
     * @var        string
     */
    protected $code_ref;

    /**
     * The value for the address field.
     *
     * @var        string
     */
    protected $address;

    /**
     * The value for the districtid field.
     *
     * @var        int
     */
    protected $districtid;

    /**
     * The value for the amphurid field.
     *
     * @var        int
     */
    protected $amphurid;

    /**
     * The value for the provinceid field.
     *
     * @var        int
     */
    protected $provinceid;

    /**
     * The value for the zip field.
     *
     * @var        string
     */
    protected $zip;

    /**
     * The value for the home_t field.
     *
     * @var        string
     */
    protected $home_t;

    /**
     * The value for the uid field.
     *
     * @var        int
     */
    protected $uid;

    /**
     * The value for the sync field.
     *
     * @var        string
     */
    protected $sync;

    /**
     * The value for the web field.
     *
     * @var        string
     */
    protected $web;

    /**
     * The value for the ewallet field.
     *
     * @var        string
     */
    protected $ewallet;

    /**
     * The value for the voucher field.
     *
     * @var        string
     */
    protected $voucher;

    /**
     * The value for the bewallet field.
     *
     * @var        string
     */
    protected $bewallet;

    /**
     * The value for the bvoucher field.
     *
     * @var        string
     */
    protected $bvoucher;

    /**
     * The value for the discount field.
     *
     * @var        int
     */
    protected $discount;

    /**
     * The value for the locationbase field.
     *
     * @var        int
     */
    protected $locationbase;

    /**
     * The value for the bill_ref field.
     *
     * @var        string
     */
    protected $bill_ref;

    /**
     * The value for the fax field.
     *
     * @var        string
     */
    protected $fax;

    /**
     * The value for the no_tax field.
     *
     * @var        string
     */
    protected $no_tax;

    /**
     * The value for the type field.
     *
     * @var        int
     */
    protected $type;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliInvent object.
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
     * Compares this with another <code>AliInvent</code> instance.  If
     * <code>obj</code> is an instance of <code>AliInvent</code>, delegates to
     * <code>equals(AliInvent)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliInvent The current object, for fluid interface
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
     * Get the [inv_code] column value.
     *
     * @return string
     */
    public function getInvCode()
    {
        return $this->inv_code;
    }

    /**
     * Get the [inv_desc] column value.
     *
     * @return string
     */
    public function getInvDesc()
    {
        return $this->inv_desc;
    }

    /**
     * Get the [inv_type] column value.
     *
     * @return int
     */
    public function getInvType()
    {
        return $this->inv_type;
    }

    /**
     * Get the [code_ref] column value.
     *
     * @return string
     */
    public function getCodeRef()
    {
        return $this->code_ref;
    }

    /**
     * Get the [address] column value.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the [districtid] column value.
     *
     * @return int
     */
    public function getDistrictid()
    {
        return $this->districtid;
    }

    /**
     * Get the [amphurid] column value.
     *
     * @return int
     */
    public function getAmphurid()
    {
        return $this->amphurid;
    }

    /**
     * Get the [provinceid] column value.
     *
     * @return int
     */
    public function getProvinceid()
    {
        return $this->provinceid;
    }

    /**
     * Get the [zip] column value.
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Get the [home_t] column value.
     *
     * @return string
     */
    public function getHomeT()
    {
        return $this->home_t;
    }

    /**
     * Get the [uid] column value.
     *
     * @return int
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Get the [sync] column value.
     *
     * @return string
     */
    public function getSync()
    {
        return $this->sync;
    }

    /**
     * Get the [web] column value.
     *
     * @return string
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Get the [ewallet] column value.
     *
     * @return string
     */
    public function getEwallet()
    {
        return $this->ewallet;
    }

    /**
     * Get the [voucher] column value.
     *
     * @return string
     */
    public function getVoucher()
    {
        return $this->voucher;
    }

    /**
     * Get the [bewallet] column value.
     *
     * @return string
     */
    public function getBewallet()
    {
        return $this->bewallet;
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
     * Get the [discount] column value.
     *
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
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
     * Get the [bill_ref] column value.
     *
     * @return string
     */
    public function getBillRef()
    {
        return $this->bill_ref;
    }

    /**
     * Get the [fax] column value.
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Get the [no_tax] column value.
     *
     * @return string
     */
    public function getNoTax()
    {
        return $this->no_tax;
    }

    /**
     * Get the [type] column value.
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliInventTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [inv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setInvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_code !== $v) {
            $this->inv_code = $v;
            $this->modifiedColumns[AliInventTableMap::COL_INV_CODE] = true;
        }

        return $this;
    } // setInvCode()

    /**
     * Set the value of [inv_desc] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setInvDesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_desc !== $v) {
            $this->inv_desc = $v;
            $this->modifiedColumns[AliInventTableMap::COL_INV_DESC] = true;
        }

        return $this;
    } // setInvDesc()

    /**
     * Set the value of [inv_type] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setInvType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->inv_type !== $v) {
            $this->inv_type = $v;
            $this->modifiedColumns[AliInventTableMap::COL_INV_TYPE] = true;
        }

        return $this;
    } // setInvType()

    /**
     * Set the value of [code_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setCodeRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->code_ref !== $v) {
            $this->code_ref = $v;
            $this->modifiedColumns[AliInventTableMap::COL_CODE_REF] = true;
        }

        return $this;
    } // setCodeRef()

    /**
     * Set the value of [address] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address !== $v) {
            $this->address = $v;
            $this->modifiedColumns[AliInventTableMap::COL_ADDRESS] = true;
        }

        return $this;
    } // setAddress()

    /**
     * Set the value of [districtid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setDistrictid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->districtid !== $v) {
            $this->districtid = $v;
            $this->modifiedColumns[AliInventTableMap::COL_DISTRICTID] = true;
        }

        return $this;
    } // setDistrictid()

    /**
     * Set the value of [amphurid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setAmphurid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->amphurid !== $v) {
            $this->amphurid = $v;
            $this->modifiedColumns[AliInventTableMap::COL_AMPHURID] = true;
        }

        return $this;
    } // setAmphurid()

    /**
     * Set the value of [provinceid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setProvinceid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->provinceid !== $v) {
            $this->provinceid = $v;
            $this->modifiedColumns[AliInventTableMap::COL_PROVINCEID] = true;
        }

        return $this;
    } // setProvinceid()

    /**
     * Set the value of [zip] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setZip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->zip !== $v) {
            $this->zip = $v;
            $this->modifiedColumns[AliInventTableMap::COL_ZIP] = true;
        }

        return $this;
    } // setZip()

    /**
     * Set the value of [home_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setHomeT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->home_t !== $v) {
            $this->home_t = $v;
            $this->modifiedColumns[AliInventTableMap::COL_HOME_T] = true;
        }

        return $this;
    } // setHomeT()

    /**
     * Set the value of [uid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[AliInventTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

    /**
     * Set the value of [sync] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setSync($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sync !== $v) {
            $this->sync = $v;
            $this->modifiedColumns[AliInventTableMap::COL_SYNC] = true;
        }

        return $this;
    } // setSync()

    /**
     * Set the value of [web] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setWeb($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->web !== $v) {
            $this->web = $v;
            $this->modifiedColumns[AliInventTableMap::COL_WEB] = true;
        }

        return $this;
    } // setWeb()

    /**
     * Set the value of [ewallet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setEwallet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet !== $v) {
            $this->ewallet = $v;
            $this->modifiedColumns[AliInventTableMap::COL_EWALLET] = true;
        }

        return $this;
    } // setEwallet()

    /**
     * Set the value of [voucher] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setVoucher($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->voucher !== $v) {
            $this->voucher = $v;
            $this->modifiedColumns[AliInventTableMap::COL_VOUCHER] = true;
        }

        return $this;
    } // setVoucher()

    /**
     * Set the value of [bewallet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setBewallet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bewallet !== $v) {
            $this->bewallet = $v;
            $this->modifiedColumns[AliInventTableMap::COL_BEWALLET] = true;
        }

        return $this;
    } // setBewallet()

    /**
     * Set the value of [bvoucher] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setBvoucher($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bvoucher !== $v) {
            $this->bvoucher = $v;
            $this->modifiedColumns[AliInventTableMap::COL_BVOUCHER] = true;
        }

        return $this;
    } // setBvoucher()

    /**
     * Set the value of [discount] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setDiscount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->discount !== $v) {
            $this->discount = $v;
            $this->modifiedColumns[AliInventTableMap::COL_DISCOUNT] = true;
        }

        return $this;
    } // setDiscount()

    /**
     * Set the value of [locationbase] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setLocationbase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->locationbase !== $v) {
            $this->locationbase = $v;
            $this->modifiedColumns[AliInventTableMap::COL_LOCATIONBASE] = true;
        }

        return $this;
    } // setLocationbase()

    /**
     * Set the value of [bill_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setBillRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bill_ref !== $v) {
            $this->bill_ref = $v;
            $this->modifiedColumns[AliInventTableMap::COL_BILL_REF] = true;
        }

        return $this;
    } // setBillRef()

    /**
     * Set the value of [fax] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setFax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fax !== $v) {
            $this->fax = $v;
            $this->modifiedColumns[AliInventTableMap::COL_FAX] = true;
        }

        return $this;
    } // setFax()

    /**
     * Set the value of [no_tax] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setNoTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->no_tax !== $v) {
            $this->no_tax = $v;
            $this->modifiedColumns[AliInventTableMap::COL_NO_TAX] = true;
        }

        return $this;
    } // setNoTax()

    /**
     * Set the value of [type] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliInvent The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[AliInventTableMap::COL_TYPE] = true;
        }

        return $this;
    } // setType()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliInventTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliInventTableMap::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliInventTableMap::translateFieldName('InvDesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_desc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliInventTableMap::translateFieldName('InvType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_type = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliInventTableMap::translateFieldName('CodeRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->code_ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliInventTableMap::translateFieldName('Address', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliInventTableMap::translateFieldName('Districtid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->districtid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliInventTableMap::translateFieldName('Amphurid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amphurid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliInventTableMap::translateFieldName('Provinceid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->provinceid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliInventTableMap::translateFieldName('Zip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->zip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliInventTableMap::translateFieldName('HomeT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->home_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliInventTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliInventTableMap::translateFieldName('Sync', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sync = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliInventTableMap::translateFieldName('Web', TableMap::TYPE_PHPNAME, $indexType)];
            $this->web = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliInventTableMap::translateFieldName('Ewallet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliInventTableMap::translateFieldName('Voucher', TableMap::TYPE_PHPNAME, $indexType)];
            $this->voucher = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliInventTableMap::translateFieldName('Bewallet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bewallet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliInventTableMap::translateFieldName('Bvoucher', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bvoucher = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliInventTableMap::translateFieldName('Discount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->discount = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliInventTableMap::translateFieldName('Locationbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locationbase = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliInventTableMap::translateFieldName('BillRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bill_ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliInventTableMap::translateFieldName('Fax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliInventTableMap::translateFieldName('NoTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->no_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliInventTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 24; // 24 = AliInventTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliInvent'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliInventTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliInventQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliInvent::setDeleted()
     * @see AliInvent::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliInventTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliInventQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliInventTableMap::DATABASE_NAME);
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
                AliInventTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliInventTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliInventTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliInventTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_INV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'inv_code';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_INV_DESC)) {
            $modifiedColumns[':p' . $index++]  = 'inv_desc';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_INV_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'inv_type';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_CODE_REF)) {
            $modifiedColumns[':p' . $index++]  = 'code_ref';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'address';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_DISTRICTID)) {
            $modifiedColumns[':p' . $index++]  = 'districtId';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_AMPHURID)) {
            $modifiedColumns[':p' . $index++]  = 'amphurId';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_PROVINCEID)) {
            $modifiedColumns[':p' . $index++]  = 'provinceId';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_ZIP)) {
            $modifiedColumns[':p' . $index++]  = 'zip';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_HOME_T)) {
            $modifiedColumns[':p' . $index++]  = 'home_t';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_SYNC)) {
            $modifiedColumns[':p' . $index++]  = 'sync';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_WEB)) {
            $modifiedColumns[':p' . $index++]  = 'web';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_EWALLET)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_VOUCHER)) {
            $modifiedColumns[':p' . $index++]  = 'voucher';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_BEWALLET)) {
            $modifiedColumns[':p' . $index++]  = 'bewallet';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_BVOUCHER)) {
            $modifiedColumns[':p' . $index++]  = 'bvoucher';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_DISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'discount';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_LOCATIONBASE)) {
            $modifiedColumns[':p' . $index++]  = 'locationbase';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_BILL_REF)) {
            $modifiedColumns[':p' . $index++]  = 'bill_ref';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_FAX)) {
            $modifiedColumns[':p' . $index++]  = 'fax';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_NO_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'no_tax';
        }
        if ($this->isColumnModified(AliInventTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'type';
        }

        $sql = sprintf(
            'INSERT INTO ali_invent (%s) VALUES (%s)',
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
                    case 'inv_code':
                        $stmt->bindValue($identifier, $this->inv_code, PDO::PARAM_STR);
                        break;
                    case 'inv_desc':
                        $stmt->bindValue($identifier, $this->inv_desc, PDO::PARAM_STR);
                        break;
                    case 'inv_type':
                        $stmt->bindValue($identifier, $this->inv_type, PDO::PARAM_INT);
                        break;
                    case 'code_ref':
                        $stmt->bindValue($identifier, $this->code_ref, PDO::PARAM_STR);
                        break;
                    case 'address':
                        $stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);
                        break;
                    case 'districtId':
                        $stmt->bindValue($identifier, $this->districtid, PDO::PARAM_INT);
                        break;
                    case 'amphurId':
                        $stmt->bindValue($identifier, $this->amphurid, PDO::PARAM_INT);
                        break;
                    case 'provinceId':
                        $stmt->bindValue($identifier, $this->provinceid, PDO::PARAM_INT);
                        break;
                    case 'zip':
                        $stmt->bindValue($identifier, $this->zip, PDO::PARAM_STR);
                        break;
                    case 'home_t':
                        $stmt->bindValue($identifier, $this->home_t, PDO::PARAM_STR);
                        break;
                    case 'uid':
                        $stmt->bindValue($identifier, $this->uid, PDO::PARAM_INT);
                        break;
                    case 'sync':
                        $stmt->bindValue($identifier, $this->sync, PDO::PARAM_STR);
                        break;
                    case 'web':
                        $stmt->bindValue($identifier, $this->web, PDO::PARAM_STR);
                        break;
                    case 'ewallet':
                        $stmt->bindValue($identifier, $this->ewallet, PDO::PARAM_STR);
                        break;
                    case 'voucher':
                        $stmt->bindValue($identifier, $this->voucher, PDO::PARAM_STR);
                        break;
                    case 'bewallet':
                        $stmt->bindValue($identifier, $this->bewallet, PDO::PARAM_STR);
                        break;
                    case 'bvoucher':
                        $stmt->bindValue($identifier, $this->bvoucher, PDO::PARAM_STR);
                        break;
                    case 'discount':
                        $stmt->bindValue($identifier, $this->discount, PDO::PARAM_INT);
                        break;
                    case 'locationbase':
                        $stmt->bindValue($identifier, $this->locationbase, PDO::PARAM_INT);
                        break;
                    case 'bill_ref':
                        $stmt->bindValue($identifier, $this->bill_ref, PDO::PARAM_STR);
                        break;
                    case 'fax':
                        $stmt->bindValue($identifier, $this->fax, PDO::PARAM_STR);
                        break;
                    case 'no_tax':
                        $stmt->bindValue($identifier, $this->no_tax, PDO::PARAM_STR);
                        break;
                    case 'type':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_INT);
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
        $pos = AliInventTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getInvCode();
                break;
            case 2:
                return $this->getInvDesc();
                break;
            case 3:
                return $this->getInvType();
                break;
            case 4:
                return $this->getCodeRef();
                break;
            case 5:
                return $this->getAddress();
                break;
            case 6:
                return $this->getDistrictid();
                break;
            case 7:
                return $this->getAmphurid();
                break;
            case 8:
                return $this->getProvinceid();
                break;
            case 9:
                return $this->getZip();
                break;
            case 10:
                return $this->getHomeT();
                break;
            case 11:
                return $this->getUid();
                break;
            case 12:
                return $this->getSync();
                break;
            case 13:
                return $this->getWeb();
                break;
            case 14:
                return $this->getEwallet();
                break;
            case 15:
                return $this->getVoucher();
                break;
            case 16:
                return $this->getBewallet();
                break;
            case 17:
                return $this->getBvoucher();
                break;
            case 18:
                return $this->getDiscount();
                break;
            case 19:
                return $this->getLocationbase();
                break;
            case 20:
                return $this->getBillRef();
                break;
            case 21:
                return $this->getFax();
                break;
            case 22:
                return $this->getNoTax();
                break;
            case 23:
                return $this->getType();
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

        if (isset($alreadyDumpedObjects['AliInvent'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliInvent'][$this->hashCode()] = true;
        $keys = AliInventTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getInvCode(),
            $keys[2] => $this->getInvDesc(),
            $keys[3] => $this->getInvType(),
            $keys[4] => $this->getCodeRef(),
            $keys[5] => $this->getAddress(),
            $keys[6] => $this->getDistrictid(),
            $keys[7] => $this->getAmphurid(),
            $keys[8] => $this->getProvinceid(),
            $keys[9] => $this->getZip(),
            $keys[10] => $this->getHomeT(),
            $keys[11] => $this->getUid(),
            $keys[12] => $this->getSync(),
            $keys[13] => $this->getWeb(),
            $keys[14] => $this->getEwallet(),
            $keys[15] => $this->getVoucher(),
            $keys[16] => $this->getBewallet(),
            $keys[17] => $this->getBvoucher(),
            $keys[18] => $this->getDiscount(),
            $keys[19] => $this->getLocationbase(),
            $keys[20] => $this->getBillRef(),
            $keys[21] => $this->getFax(),
            $keys[22] => $this->getNoTax(),
            $keys[23] => $this->getType(),
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
     * @return $this|\CciOrm\CciOrm\AliInvent
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliInventTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliInvent
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setInvCode($value);
                break;
            case 2:
                $this->setInvDesc($value);
                break;
            case 3:
                $this->setInvType($value);
                break;
            case 4:
                $this->setCodeRef($value);
                break;
            case 5:
                $this->setAddress($value);
                break;
            case 6:
                $this->setDistrictid($value);
                break;
            case 7:
                $this->setAmphurid($value);
                break;
            case 8:
                $this->setProvinceid($value);
                break;
            case 9:
                $this->setZip($value);
                break;
            case 10:
                $this->setHomeT($value);
                break;
            case 11:
                $this->setUid($value);
                break;
            case 12:
                $this->setSync($value);
                break;
            case 13:
                $this->setWeb($value);
                break;
            case 14:
                $this->setEwallet($value);
                break;
            case 15:
                $this->setVoucher($value);
                break;
            case 16:
                $this->setBewallet($value);
                break;
            case 17:
                $this->setBvoucher($value);
                break;
            case 18:
                $this->setDiscount($value);
                break;
            case 19:
                $this->setLocationbase($value);
                break;
            case 20:
                $this->setBillRef($value);
                break;
            case 21:
                $this->setFax($value);
                break;
            case 22:
                $this->setNoTax($value);
                break;
            case 23:
                $this->setType($value);
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
        $keys = AliInventTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setInvCode($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setInvDesc($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setInvType($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCodeRef($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setAddress($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDistrictid($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setAmphurid($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setProvinceid($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setZip($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setHomeT($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setUid($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setSync($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setWeb($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setEwallet($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setVoucher($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setBewallet($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setBvoucher($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setDiscount($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setLocationbase($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setBillRef($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setFax($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setNoTax($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setType($arr[$keys[23]]);
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
     * @return $this|\CciOrm\CciOrm\AliInvent The current object, for fluid interface
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
        $criteria = new Criteria(AliInventTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliInventTableMap::COL_ID)) {
            $criteria->add(AliInventTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_INV_CODE)) {
            $criteria->add(AliInventTableMap::COL_INV_CODE, $this->inv_code);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_INV_DESC)) {
            $criteria->add(AliInventTableMap::COL_INV_DESC, $this->inv_desc);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_INV_TYPE)) {
            $criteria->add(AliInventTableMap::COL_INV_TYPE, $this->inv_type);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_CODE_REF)) {
            $criteria->add(AliInventTableMap::COL_CODE_REF, $this->code_ref);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_ADDRESS)) {
            $criteria->add(AliInventTableMap::COL_ADDRESS, $this->address);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_DISTRICTID)) {
            $criteria->add(AliInventTableMap::COL_DISTRICTID, $this->districtid);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_AMPHURID)) {
            $criteria->add(AliInventTableMap::COL_AMPHURID, $this->amphurid);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_PROVINCEID)) {
            $criteria->add(AliInventTableMap::COL_PROVINCEID, $this->provinceid);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_ZIP)) {
            $criteria->add(AliInventTableMap::COL_ZIP, $this->zip);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_HOME_T)) {
            $criteria->add(AliInventTableMap::COL_HOME_T, $this->home_t);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_UID)) {
            $criteria->add(AliInventTableMap::COL_UID, $this->uid);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_SYNC)) {
            $criteria->add(AliInventTableMap::COL_SYNC, $this->sync);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_WEB)) {
            $criteria->add(AliInventTableMap::COL_WEB, $this->web);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_EWALLET)) {
            $criteria->add(AliInventTableMap::COL_EWALLET, $this->ewallet);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_VOUCHER)) {
            $criteria->add(AliInventTableMap::COL_VOUCHER, $this->voucher);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_BEWALLET)) {
            $criteria->add(AliInventTableMap::COL_BEWALLET, $this->bewallet);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_BVOUCHER)) {
            $criteria->add(AliInventTableMap::COL_BVOUCHER, $this->bvoucher);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_DISCOUNT)) {
            $criteria->add(AliInventTableMap::COL_DISCOUNT, $this->discount);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_LOCATIONBASE)) {
            $criteria->add(AliInventTableMap::COL_LOCATIONBASE, $this->locationbase);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_BILL_REF)) {
            $criteria->add(AliInventTableMap::COL_BILL_REF, $this->bill_ref);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_FAX)) {
            $criteria->add(AliInventTableMap::COL_FAX, $this->fax);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_NO_TAX)) {
            $criteria->add(AliInventTableMap::COL_NO_TAX, $this->no_tax);
        }
        if ($this->isColumnModified(AliInventTableMap::COL_TYPE)) {
            $criteria->add(AliInventTableMap::COL_TYPE, $this->type);
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
        $criteria = ChildAliInventQuery::create();
        $criteria->add(AliInventTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliInvent (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setInvCode($this->getInvCode());
        $copyObj->setInvDesc($this->getInvDesc());
        $copyObj->setInvType($this->getInvType());
        $copyObj->setCodeRef($this->getCodeRef());
        $copyObj->setAddress($this->getAddress());
        $copyObj->setDistrictid($this->getDistrictid());
        $copyObj->setAmphurid($this->getAmphurid());
        $copyObj->setProvinceid($this->getProvinceid());
        $copyObj->setZip($this->getZip());
        $copyObj->setHomeT($this->getHomeT());
        $copyObj->setUid($this->getUid());
        $copyObj->setSync($this->getSync());
        $copyObj->setWeb($this->getWeb());
        $copyObj->setEwallet($this->getEwallet());
        $copyObj->setVoucher($this->getVoucher());
        $copyObj->setBewallet($this->getBewallet());
        $copyObj->setBvoucher($this->getBvoucher());
        $copyObj->setDiscount($this->getDiscount());
        $copyObj->setLocationbase($this->getLocationbase());
        $copyObj->setBillRef($this->getBillRef());
        $copyObj->setFax($this->getFax());
        $copyObj->setNoTax($this->getNoTax());
        $copyObj->setType($this->getType());
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
     * @return \CciOrm\CciOrm\AliInvent Clone of current object.
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
        $this->inv_code = null;
        $this->inv_desc = null;
        $this->inv_type = null;
        $this->code_ref = null;
        $this->address = null;
        $this->districtid = null;
        $this->amphurid = null;
        $this->provinceid = null;
        $this->zip = null;
        $this->home_t = null;
        $this->uid = null;
        $this->sync = null;
        $this->web = null;
        $this->ewallet = null;
        $this->voucher = null;
        $this->bewallet = null;
        $this->bvoucher = null;
        $this->discount = null;
        $this->locationbase = null;
        $this->bill_ref = null;
        $this->fax = null;
        $this->no_tax = null;
        $this->type = null;
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
        return (string) $this->exportTo(AliInventTableMap::DEFAULT_STRING_FORMAT);
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
