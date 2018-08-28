<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliProductQuery as ChildAliProductQuery;
use CciOrm\CciOrm\Map\AliProductTableMap;
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
 * Base class that represents a row from the 'ali_product' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliProduct implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliProductTableMap';


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
     * The value for the pcode field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $pcode;

    /**
     * The value for the group_id field.
     *
     * @var        int
     */
    protected $group_id;

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
     * The value for the price field.
     *
     * @var        int
     */
    protected $price;

    /**
     * The value for the vat field.
     *
     * @var        string
     */
    protected $vat;

    /**
     * The value for the bprice field.
     *
     * @var        string
     */
    protected $bprice;

    /**
     * The value for the personel_price field.
     *
     * @var        string
     */
    protected $personel_price;

    /**
     * The value for the customer_price field.
     *
     * @var        string
     */
    protected $customer_price;

    /**
     * The value for the pv field.
     *
     * @var        int
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
     * The value for the qty field.
     *
     * @var        int
     */
    protected $qty;

    /**
     * The value for the ud field.
     *
     * @var        string
     */
    protected $ud;

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
     * The value for the st field.
     *
     * @var        int
     */
    protected $st;

    /**
     * The value for the sst field.
     *
     * @var        int
     */
    protected $sst;

    /**
     * The value for the bf field.
     *
     * @var        int
     */
    protected $bf;

    /**
     * The value for the sh field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sh;

    /**
     * The value for the pcode_stock field.
     *
     * @var        string
     */
    protected $pcode_stock;

    /**
     * The value for the sup_code field.
     *
     * @var        string
     */
    protected $sup_code;

    /**
     * The value for the weight field.
     *
     * @var        string
     */
    protected $weight;

    /**
     * The value for the locationbase field.
     *
     * @var        int
     */
    protected $locationbase;

    /**
     * The value for the barcode field.
     *
     * @var        string
     */
    protected $barcode;

    /**
     * The value for the picture field.
     *
     * @var        string
     */
    protected $picture;

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
     * The value for the sa_type_a field.
     *
     * @var        int
     */
    protected $sa_type_a;

    /**
     * The value for the sa_type_h field.
     *
     * @var        int
     */
    protected $sa_type_h;

    /**
     * The value for the qtyr field.
     *
     * @var        int
     */
    protected $qtyr;

    /**
     * The value for the ato field.
     *
     * @var        int
     */
    protected $ato;

    /**
     * The value for the product_img field.
     *
     * @var        string
     */
    protected $product_img;

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
        $this->pcode = '';
        $this->sh = '';
    }

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliProduct object.
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
     * Compares this with another <code>AliProduct</code> instance.  If
     * <code>obj</code> is an instance of <code>AliProduct</code>, delegates to
     * <code>equals(AliProduct)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliProduct The current object, for fluid interface
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
     * Get the [pcode] column value.
     *
     * @return string
     */
    public function getPcode()
    {
        return $this->pcode;
    }

    /**
     * Get the [group_id] column value.
     *
     * @return int
     */
    public function getGroupId()
    {
        return $this->group_id;
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
     * Get the [price] column value.
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the [vat] column value.
     *
     * @return string
     */
    public function getVat()
    {
        return $this->vat;
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
     * Get the [personel_price] column value.
     *
     * @return string
     */
    public function getPersonelPrice()
    {
        return $this->personel_price;
    }

    /**
     * Get the [customer_price] column value.
     *
     * @return string
     */
    public function getCustomerPrice()
    {
        return $this->customer_price;
    }

    /**
     * Get the [pv] column value.
     *
     * @return int
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
     * Get the [qty] column value.
     *
     * @return int
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Get the [ud] column value.
     *
     * @return string
     */
    public function getUd()
    {
        return $this->ud;
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
     * Get the [st] column value.
     *
     * @return int
     */
    public function getSt()
    {
        return $this->st;
    }

    /**
     * Get the [sst] column value.
     *
     * @return int
     */
    public function getSst()
    {
        return $this->sst;
    }

    /**
     * Get the [bf] column value.
     *
     * @return int
     */
    public function getBf()
    {
        return $this->bf;
    }

    /**
     * Get the [sh] column value.
     *
     * @return string
     */
    public function getSh()
    {
        return $this->sh;
    }

    /**
     * Get the [pcode_stock] column value.
     *
     * @return string
     */
    public function getPcodeStock()
    {
        return $this->pcode_stock;
    }

    /**
     * Get the [sup_code] column value.
     *
     * @return string
     */
    public function getSupCode()
    {
        return $this->sup_code;
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
     * Get the [locationbase] column value.
     *
     * @return int
     */
    public function getLocationbase()
    {
        return $this->locationbase;
    }

    /**
     * Get the [barcode] column value.
     *
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Get the [picture] column value.
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
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
     * Get the [sa_type_a] column value.
     *
     * @return int
     */
    public function getSaTypeA()
    {
        return $this->sa_type_a;
    }

    /**
     * Get the [sa_type_h] column value.
     *
     * @return int
     */
    public function getSaTypeH()
    {
        return $this->sa_type_h;
    }

    /**
     * Get the [qtyr] column value.
     *
     * @return int
     */
    public function getQtyr()
    {
        return $this->qtyr;
    }

    /**
     * Get the [ato] column value.
     *
     * @return int
     */
    public function getAto()
    {
        return $this->ato;
    }

    /**
     * Get the [product_img] column value.
     *
     * @return string
     */
    public function getProductImg()
    {
        return $this->product_img;
    }

    /**
     * Set the value of [pcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setPcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pcode !== $v) {
            $this->pcode = $v;
            $this->modifiedColumns[AliProductTableMap::COL_PCODE] = true;
        }

        return $this;
    } // setPcode()

    /**
     * Set the value of [group_id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setGroupId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->group_id !== $v) {
            $this->group_id = $v;
            $this->modifiedColumns[AliProductTableMap::COL_GROUP_ID] = true;
        }

        return $this;
    } // setGroupId()

    /**
     * Set the value of [pdesc] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setPdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pdesc !== $v) {
            $this->pdesc = $v;
            $this->modifiedColumns[AliProductTableMap::COL_PDESC] = true;
        }

        return $this;
    } // setPdesc()

    /**
     * Set the value of [unit] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setUnit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->unit !== $v) {
            $this->unit = $v;
            $this->modifiedColumns[AliProductTableMap::COL_UNIT] = true;
        }

        return $this;
    } // setUnit()

    /**
     * Set the value of [price] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[AliProductTableMap::COL_PRICE] = true;
        }

        return $this;
    } // setPrice()

    /**
     * Set the value of [vat] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setVat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vat !== $v) {
            $this->vat = $v;
            $this->modifiedColumns[AliProductTableMap::COL_VAT] = true;
        }

        return $this;
    } // setVat()

    /**
     * Set the value of [bprice] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setBprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bprice !== $v) {
            $this->bprice = $v;
            $this->modifiedColumns[AliProductTableMap::COL_BPRICE] = true;
        }

        return $this;
    } // setBprice()

    /**
     * Set the value of [personel_price] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setPersonelPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->personel_price !== $v) {
            $this->personel_price = $v;
            $this->modifiedColumns[AliProductTableMap::COL_PERSONEL_PRICE] = true;
        }

        return $this;
    } // setPersonelPrice()

    /**
     * Set the value of [customer_price] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setCustomerPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->customer_price !== $v) {
            $this->customer_price = $v;
            $this->modifiedColumns[AliProductTableMap::COL_CUSTOMER_PRICE] = true;
        }

        return $this;
    } // setCustomerPrice()

    /**
     * Set the value of [pv] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setPv($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pv !== $v) {
            $this->pv = $v;
            $this->modifiedColumns[AliProductTableMap::COL_PV] = true;
        }

        return $this;
    } // setPv()

    /**
     * Set the value of [bv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setBv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bv !== $v) {
            $this->bv = $v;
            $this->modifiedColumns[AliProductTableMap::COL_BV] = true;
        }

        return $this;
    } // setBv()

    /**
     * Set the value of [fv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setFv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fv !== $v) {
            $this->fv = $v;
            $this->modifiedColumns[AliProductTableMap::COL_FV] = true;
        }

        return $this;
    } // setFv()

    /**
     * Set the value of [qty] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setQty($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->qty !== $v) {
            $this->qty = $v;
            $this->modifiedColumns[AliProductTableMap::COL_QTY] = true;
        }

        return $this;
    } // setQty()

    /**
     * Set the value of [ud] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setUd($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ud !== $v) {
            $this->ud = $v;
            $this->modifiedColumns[AliProductTableMap::COL_UD] = true;
        }

        return $this;
    } // setUd()

    /**
     * Set the value of [sync] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setSync($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sync !== $v) {
            $this->sync = $v;
            $this->modifiedColumns[AliProductTableMap::COL_SYNC] = true;
        }

        return $this;
    } // setSync()

    /**
     * Set the value of [web] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setWeb($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->web !== $v) {
            $this->web = $v;
            $this->modifiedColumns[AliProductTableMap::COL_WEB] = true;
        }

        return $this;
    } // setWeb()

    /**
     * Set the value of [st] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setSt($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->st !== $v) {
            $this->st = $v;
            $this->modifiedColumns[AliProductTableMap::COL_ST] = true;
        }

        return $this;
    } // setSt()

    /**
     * Set the value of [sst] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setSst($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sst !== $v) {
            $this->sst = $v;
            $this->modifiedColumns[AliProductTableMap::COL_SST] = true;
        }

        return $this;
    } // setSst()

    /**
     * Set the value of [bf] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setBf($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->bf !== $v) {
            $this->bf = $v;
            $this->modifiedColumns[AliProductTableMap::COL_BF] = true;
        }

        return $this;
    } // setBf()

    /**
     * Set the value of [sh] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setSh($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sh !== $v) {
            $this->sh = $v;
            $this->modifiedColumns[AliProductTableMap::COL_SH] = true;
        }

        return $this;
    } // setSh()

    /**
     * Set the value of [pcode_stock] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setPcodeStock($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pcode_stock !== $v) {
            $this->pcode_stock = $v;
            $this->modifiedColumns[AliProductTableMap::COL_PCODE_STOCK] = true;
        }

        return $this;
    } // setPcodeStock()

    /**
     * Set the value of [sup_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setSupCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sup_code !== $v) {
            $this->sup_code = $v;
            $this->modifiedColumns[AliProductTableMap::COL_SUP_CODE] = true;
        }

        return $this;
    } // setSupCode()

    /**
     * Set the value of [weight] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setWeight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->weight !== $v) {
            $this->weight = $v;
            $this->modifiedColumns[AliProductTableMap::COL_WEIGHT] = true;
        }

        return $this;
    } // setWeight()

    /**
     * Set the value of [locationbase] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setLocationbase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->locationbase !== $v) {
            $this->locationbase = $v;
            $this->modifiedColumns[AliProductTableMap::COL_LOCATIONBASE] = true;
        }

        return $this;
    } // setLocationbase()

    /**
     * Set the value of [barcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setBarcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->barcode !== $v) {
            $this->barcode = $v;
            $this->modifiedColumns[AliProductTableMap::COL_BARCODE] = true;
        }

        return $this;
    } // setBarcode()

    /**
     * Set the value of [picture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setPicture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->picture !== $v) {
            $this->picture = $v;
            $this->modifiedColumns[AliProductTableMap::COL_PICTURE] = true;
        }

        return $this;
    } // setPicture()

    /**
     * Sets the value of [fdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setFdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fdate !== null || $dt !== null) {
            if ($this->fdate === null || $dt === null || $dt->format("Y-m-d") !== $this->fdate->format("Y-m-d")) {
                $this->fdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliProductTableMap::COL_FDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFdate()

    /**
     * Sets the value of [tdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setTdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tdate !== null || $dt !== null) {
            if ($this->tdate === null || $dt === null || $dt->format("Y-m-d") !== $this->tdate->format("Y-m-d")) {
                $this->tdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliProductTableMap::COL_TDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setTdate()

    /**
     * Set the value of [sa_type_a] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setSaTypeA($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sa_type_a !== $v) {
            $this->sa_type_a = $v;
            $this->modifiedColumns[AliProductTableMap::COL_SA_TYPE_A] = true;
        }

        return $this;
    } // setSaTypeA()

    /**
     * Set the value of [sa_type_h] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setSaTypeH($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sa_type_h !== $v) {
            $this->sa_type_h = $v;
            $this->modifiedColumns[AliProductTableMap::COL_SA_TYPE_H] = true;
        }

        return $this;
    } // setSaTypeH()

    /**
     * Set the value of [qtyr] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setQtyr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->qtyr !== $v) {
            $this->qtyr = $v;
            $this->modifiedColumns[AliProductTableMap::COL_QTYR] = true;
        }

        return $this;
    } // setQtyr()

    /**
     * Set the value of [ato] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setAto($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ato !== $v) {
            $this->ato = $v;
            $this->modifiedColumns[AliProductTableMap::COL_ATO] = true;
        }

        return $this;
    } // setAto()

    /**
     * Set the value of [product_img] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProduct The current object (for fluent API support)
     */
    public function setProductImg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->product_img !== $v) {
            $this->product_img = $v;
            $this->modifiedColumns[AliProductTableMap::COL_PRODUCT_IMG] = true;
        }

        return $this;
    } // setProductImg()

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
            if ($this->pcode !== '') {
                return false;
            }

            if ($this->sh !== '') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliProductTableMap::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliProductTableMap::translateFieldName('GroupId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->group_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliProductTableMap::translateFieldName('Pdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliProductTableMap::translateFieldName('Unit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unit = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliProductTableMap::translateFieldName('Price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliProductTableMap::translateFieldName('Vat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliProductTableMap::translateFieldName('Bprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliProductTableMap::translateFieldName('PersonelPrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->personel_price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliProductTableMap::translateFieldName('CustomerPrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customer_price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliProductTableMap::translateFieldName('Pv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pv = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliProductTableMap::translateFieldName('Bv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliProductTableMap::translateFieldName('Fv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliProductTableMap::translateFieldName('Qty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qty = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliProductTableMap::translateFieldName('Ud', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ud = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliProductTableMap::translateFieldName('Sync', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sync = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliProductTableMap::translateFieldName('Web', TableMap::TYPE_PHPNAME, $indexType)];
            $this->web = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliProductTableMap::translateFieldName('St', TableMap::TYPE_PHPNAME, $indexType)];
            $this->st = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliProductTableMap::translateFieldName('Sst', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sst = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliProductTableMap::translateFieldName('Bf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bf = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliProductTableMap::translateFieldName('Sh', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sh = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliProductTableMap::translateFieldName('PcodeStock', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pcode_stock = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliProductTableMap::translateFieldName('SupCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sup_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliProductTableMap::translateFieldName('Weight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->weight = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliProductTableMap::translateFieldName('Locationbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locationbase = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliProductTableMap::translateFieldName('Barcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->barcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliProductTableMap::translateFieldName('Picture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->picture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : AliProductTableMap::translateFieldName('Fdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : AliProductTableMap::translateFieldName('Tdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->tdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : AliProductTableMap::translateFieldName('SaTypeA', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sa_type_a = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : AliProductTableMap::translateFieldName('SaTypeH', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sa_type_h = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : AliProductTableMap::translateFieldName('Qtyr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qtyr = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : AliProductTableMap::translateFieldName('Ato', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ato = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : AliProductTableMap::translateFieldName('ProductImg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->product_img = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 33; // 33 = AliProductTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliProduct'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliProductTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliProductQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliProduct::setDeleted()
     * @see AliProduct::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliProductQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductTableMap::DATABASE_NAME);
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
                AliProductTableMap::addInstanceToPool($this);
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliProductTableMap::COL_PCODE)) {
            $modifiedColumns[':p' . $index++]  = 'pcode';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_GROUP_ID)) {
            $modifiedColumns[':p' . $index++]  = 'group_id';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PDESC)) {
            $modifiedColumns[':p' . $index++]  = 'pdesc';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_UNIT)) {
            $modifiedColumns[':p' . $index++]  = 'unit';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'price';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_VAT)) {
            $modifiedColumns[':p' . $index++]  = 'vat';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_BPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'bprice';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PERSONEL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'personel_price';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_CUSTOMER_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'customer_price';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PV)) {
            $modifiedColumns[':p' . $index++]  = 'pv';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_BV)) {
            $modifiedColumns[':p' . $index++]  = 'bv';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_FV)) {
            $modifiedColumns[':p' . $index++]  = 'fv';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_QTY)) {
            $modifiedColumns[':p' . $index++]  = 'qty';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_UD)) {
            $modifiedColumns[':p' . $index++]  = 'ud';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_SYNC)) {
            $modifiedColumns[':p' . $index++]  = 'sync';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_WEB)) {
            $modifiedColumns[':p' . $index++]  = 'web';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_ST)) {
            $modifiedColumns[':p' . $index++]  = 'st';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_SST)) {
            $modifiedColumns[':p' . $index++]  = 'sst';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_BF)) {
            $modifiedColumns[':p' . $index++]  = 'bf';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_SH)) {
            $modifiedColumns[':p' . $index++]  = 'sh';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PCODE_STOCK)) {
            $modifiedColumns[':p' . $index++]  = 'pcode_stock';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_SUP_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'sup_code';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_WEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'weight';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_LOCATIONBASE)) {
            $modifiedColumns[':p' . $index++]  = 'locationbase';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_BARCODE)) {
            $modifiedColumns[':p' . $index++]  = 'barcode';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PICTURE)) {
            $modifiedColumns[':p' . $index++]  = 'picture';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_FDATE)) {
            $modifiedColumns[':p' . $index++]  = 'fdate';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_TDATE)) {
            $modifiedColumns[':p' . $index++]  = 'tdate';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_SA_TYPE_A)) {
            $modifiedColumns[':p' . $index++]  = 'sa_type_a';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_SA_TYPE_H)) {
            $modifiedColumns[':p' . $index++]  = 'sa_type_h';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_QTYR)) {
            $modifiedColumns[':p' . $index++]  = 'qtyr';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_ATO)) {
            $modifiedColumns[':p' . $index++]  = 'ato';
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PRODUCT_IMG)) {
            $modifiedColumns[':p' . $index++]  = 'product_img';
        }

        $sql = sprintf(
            'INSERT INTO ali_product (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'pcode':
                        $stmt->bindValue($identifier, $this->pcode, PDO::PARAM_STR);
                        break;
                    case 'group_id':
                        $stmt->bindValue($identifier, $this->group_id, PDO::PARAM_INT);
                        break;
                    case 'pdesc':
                        $stmt->bindValue($identifier, $this->pdesc, PDO::PARAM_STR);
                        break;
                    case 'unit':
                        $stmt->bindValue($identifier, $this->unit, PDO::PARAM_STR);
                        break;
                    case 'price':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_INT);
                        break;
                    case 'vat':
                        $stmt->bindValue($identifier, $this->vat, PDO::PARAM_STR);
                        break;
                    case 'bprice':
                        $stmt->bindValue($identifier, $this->bprice, PDO::PARAM_STR);
                        break;
                    case 'personel_price':
                        $stmt->bindValue($identifier, $this->personel_price, PDO::PARAM_STR);
                        break;
                    case 'customer_price':
                        $stmt->bindValue($identifier, $this->customer_price, PDO::PARAM_STR);
                        break;
                    case 'pv':
                        $stmt->bindValue($identifier, $this->pv, PDO::PARAM_INT);
                        break;
                    case 'bv':
                        $stmt->bindValue($identifier, $this->bv, PDO::PARAM_STR);
                        break;
                    case 'fv':
                        $stmt->bindValue($identifier, $this->fv, PDO::PARAM_STR);
                        break;
                    case 'qty':
                        $stmt->bindValue($identifier, $this->qty, PDO::PARAM_INT);
                        break;
                    case 'ud':
                        $stmt->bindValue($identifier, $this->ud, PDO::PARAM_STR);
                        break;
                    case 'sync':
                        $stmt->bindValue($identifier, $this->sync, PDO::PARAM_STR);
                        break;
                    case 'web':
                        $stmt->bindValue($identifier, $this->web, PDO::PARAM_STR);
                        break;
                    case 'st':
                        $stmt->bindValue($identifier, $this->st, PDO::PARAM_INT);
                        break;
                    case 'sst':
                        $stmt->bindValue($identifier, $this->sst, PDO::PARAM_INT);
                        break;
                    case 'bf':
                        $stmt->bindValue($identifier, $this->bf, PDO::PARAM_INT);
                        break;
                    case 'sh':
                        $stmt->bindValue($identifier, $this->sh, PDO::PARAM_STR);
                        break;
                    case 'pcode_stock':
                        $stmt->bindValue($identifier, $this->pcode_stock, PDO::PARAM_STR);
                        break;
                    case 'sup_code':
                        $stmt->bindValue($identifier, $this->sup_code, PDO::PARAM_STR);
                        break;
                    case 'weight':
                        $stmt->bindValue($identifier, $this->weight, PDO::PARAM_STR);
                        break;
                    case 'locationbase':
                        $stmt->bindValue($identifier, $this->locationbase, PDO::PARAM_INT);
                        break;
                    case 'barcode':
                        $stmt->bindValue($identifier, $this->barcode, PDO::PARAM_STR);
                        break;
                    case 'picture':
                        $stmt->bindValue($identifier, $this->picture, PDO::PARAM_STR);
                        break;
                    case 'fdate':
                        $stmt->bindValue($identifier, $this->fdate ? $this->fdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tdate':
                        $stmt->bindValue($identifier, $this->tdate ? $this->tdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'sa_type_a':
                        $stmt->bindValue($identifier, $this->sa_type_a, PDO::PARAM_INT);
                        break;
                    case 'sa_type_h':
                        $stmt->bindValue($identifier, $this->sa_type_h, PDO::PARAM_INT);
                        break;
                    case 'qtyr':
                        $stmt->bindValue($identifier, $this->qtyr, PDO::PARAM_INT);
                        break;
                    case 'ato':
                        $stmt->bindValue($identifier, $this->ato, PDO::PARAM_INT);
                        break;
                    case 'product_img':
                        $stmt->bindValue($identifier, $this->product_img, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

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
        $pos = AliProductTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getPcode();
                break;
            case 1:
                return $this->getGroupId();
                break;
            case 2:
                return $this->getPdesc();
                break;
            case 3:
                return $this->getUnit();
                break;
            case 4:
                return $this->getPrice();
                break;
            case 5:
                return $this->getVat();
                break;
            case 6:
                return $this->getBprice();
                break;
            case 7:
                return $this->getPersonelPrice();
                break;
            case 8:
                return $this->getCustomerPrice();
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
                return $this->getQty();
                break;
            case 13:
                return $this->getUd();
                break;
            case 14:
                return $this->getSync();
                break;
            case 15:
                return $this->getWeb();
                break;
            case 16:
                return $this->getSt();
                break;
            case 17:
                return $this->getSst();
                break;
            case 18:
                return $this->getBf();
                break;
            case 19:
                return $this->getSh();
                break;
            case 20:
                return $this->getPcodeStock();
                break;
            case 21:
                return $this->getSupCode();
                break;
            case 22:
                return $this->getWeight();
                break;
            case 23:
                return $this->getLocationbase();
                break;
            case 24:
                return $this->getBarcode();
                break;
            case 25:
                return $this->getPicture();
                break;
            case 26:
                return $this->getFdate();
                break;
            case 27:
                return $this->getTdate();
                break;
            case 28:
                return $this->getSaTypeA();
                break;
            case 29:
                return $this->getSaTypeH();
                break;
            case 30:
                return $this->getQtyr();
                break;
            case 31:
                return $this->getAto();
                break;
            case 32:
                return $this->getProductImg();
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

        if (isset($alreadyDumpedObjects['AliProduct'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliProduct'][$this->hashCode()] = true;
        $keys = AliProductTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPcode(),
            $keys[1] => $this->getGroupId(),
            $keys[2] => $this->getPdesc(),
            $keys[3] => $this->getUnit(),
            $keys[4] => $this->getPrice(),
            $keys[5] => $this->getVat(),
            $keys[6] => $this->getBprice(),
            $keys[7] => $this->getPersonelPrice(),
            $keys[8] => $this->getCustomerPrice(),
            $keys[9] => $this->getPv(),
            $keys[10] => $this->getBv(),
            $keys[11] => $this->getFv(),
            $keys[12] => $this->getQty(),
            $keys[13] => $this->getUd(),
            $keys[14] => $this->getSync(),
            $keys[15] => $this->getWeb(),
            $keys[16] => $this->getSt(),
            $keys[17] => $this->getSst(),
            $keys[18] => $this->getBf(),
            $keys[19] => $this->getSh(),
            $keys[20] => $this->getPcodeStock(),
            $keys[21] => $this->getSupCode(),
            $keys[22] => $this->getWeight(),
            $keys[23] => $this->getLocationbase(),
            $keys[24] => $this->getBarcode(),
            $keys[25] => $this->getPicture(),
            $keys[26] => $this->getFdate(),
            $keys[27] => $this->getTdate(),
            $keys[28] => $this->getSaTypeA(),
            $keys[29] => $this->getSaTypeH(),
            $keys[30] => $this->getQtyr(),
            $keys[31] => $this->getAto(),
            $keys[32] => $this->getProductImg(),
        );
        if ($result[$keys[26]] instanceof \DateTimeInterface) {
            $result[$keys[26]] = $result[$keys[26]]->format('c');
        }

        if ($result[$keys[27]] instanceof \DateTimeInterface) {
            $result[$keys[27]] = $result[$keys[27]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliProduct
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliProductTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliProduct
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setPcode($value);
                break;
            case 1:
                $this->setGroupId($value);
                break;
            case 2:
                $this->setPdesc($value);
                break;
            case 3:
                $this->setUnit($value);
                break;
            case 4:
                $this->setPrice($value);
                break;
            case 5:
                $this->setVat($value);
                break;
            case 6:
                $this->setBprice($value);
                break;
            case 7:
                $this->setPersonelPrice($value);
                break;
            case 8:
                $this->setCustomerPrice($value);
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
                $this->setQty($value);
                break;
            case 13:
                $this->setUd($value);
                break;
            case 14:
                $this->setSync($value);
                break;
            case 15:
                $this->setWeb($value);
                break;
            case 16:
                $this->setSt($value);
                break;
            case 17:
                $this->setSst($value);
                break;
            case 18:
                $this->setBf($value);
                break;
            case 19:
                $this->setSh($value);
                break;
            case 20:
                $this->setPcodeStock($value);
                break;
            case 21:
                $this->setSupCode($value);
                break;
            case 22:
                $this->setWeight($value);
                break;
            case 23:
                $this->setLocationbase($value);
                break;
            case 24:
                $this->setBarcode($value);
                break;
            case 25:
                $this->setPicture($value);
                break;
            case 26:
                $this->setFdate($value);
                break;
            case 27:
                $this->setTdate($value);
                break;
            case 28:
                $this->setSaTypeA($value);
                break;
            case 29:
                $this->setSaTypeH($value);
                break;
            case 30:
                $this->setQtyr($value);
                break;
            case 31:
                $this->setAto($value);
                break;
            case 32:
                $this->setProductImg($value);
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
        $keys = AliProductTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setPcode($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setGroupId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPdesc($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setUnit($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPrice($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setVat($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setBprice($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPersonelPrice($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setCustomerPrice($arr[$keys[8]]);
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
            $this->setQty($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setUd($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setSync($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setWeb($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setSt($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setSst($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setBf($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setSh($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setPcodeStock($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setSupCode($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setWeight($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setLocationbase($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setBarcode($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setPicture($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setFdate($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setTdate($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setSaTypeA($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setSaTypeH($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setQtyr($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setAto($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setProductImg($arr[$keys[32]]);
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
     * @return $this|\CciOrm\CciOrm\AliProduct The current object, for fluid interface
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
        $criteria = new Criteria(AliProductTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliProductTableMap::COL_PCODE)) {
            $criteria->add(AliProductTableMap::COL_PCODE, $this->pcode);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_GROUP_ID)) {
            $criteria->add(AliProductTableMap::COL_GROUP_ID, $this->group_id);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PDESC)) {
            $criteria->add(AliProductTableMap::COL_PDESC, $this->pdesc);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_UNIT)) {
            $criteria->add(AliProductTableMap::COL_UNIT, $this->unit);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PRICE)) {
            $criteria->add(AliProductTableMap::COL_PRICE, $this->price);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_VAT)) {
            $criteria->add(AliProductTableMap::COL_VAT, $this->vat);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_BPRICE)) {
            $criteria->add(AliProductTableMap::COL_BPRICE, $this->bprice);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PERSONEL_PRICE)) {
            $criteria->add(AliProductTableMap::COL_PERSONEL_PRICE, $this->personel_price);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_CUSTOMER_PRICE)) {
            $criteria->add(AliProductTableMap::COL_CUSTOMER_PRICE, $this->customer_price);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PV)) {
            $criteria->add(AliProductTableMap::COL_PV, $this->pv);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_BV)) {
            $criteria->add(AliProductTableMap::COL_BV, $this->bv);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_FV)) {
            $criteria->add(AliProductTableMap::COL_FV, $this->fv);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_QTY)) {
            $criteria->add(AliProductTableMap::COL_QTY, $this->qty);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_UD)) {
            $criteria->add(AliProductTableMap::COL_UD, $this->ud);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_SYNC)) {
            $criteria->add(AliProductTableMap::COL_SYNC, $this->sync);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_WEB)) {
            $criteria->add(AliProductTableMap::COL_WEB, $this->web);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_ST)) {
            $criteria->add(AliProductTableMap::COL_ST, $this->st);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_SST)) {
            $criteria->add(AliProductTableMap::COL_SST, $this->sst);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_BF)) {
            $criteria->add(AliProductTableMap::COL_BF, $this->bf);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_SH)) {
            $criteria->add(AliProductTableMap::COL_SH, $this->sh);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PCODE_STOCK)) {
            $criteria->add(AliProductTableMap::COL_PCODE_STOCK, $this->pcode_stock);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_SUP_CODE)) {
            $criteria->add(AliProductTableMap::COL_SUP_CODE, $this->sup_code);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_WEIGHT)) {
            $criteria->add(AliProductTableMap::COL_WEIGHT, $this->weight);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_LOCATIONBASE)) {
            $criteria->add(AliProductTableMap::COL_LOCATIONBASE, $this->locationbase);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_BARCODE)) {
            $criteria->add(AliProductTableMap::COL_BARCODE, $this->barcode);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PICTURE)) {
            $criteria->add(AliProductTableMap::COL_PICTURE, $this->picture);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_FDATE)) {
            $criteria->add(AliProductTableMap::COL_FDATE, $this->fdate);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_TDATE)) {
            $criteria->add(AliProductTableMap::COL_TDATE, $this->tdate);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_SA_TYPE_A)) {
            $criteria->add(AliProductTableMap::COL_SA_TYPE_A, $this->sa_type_a);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_SA_TYPE_H)) {
            $criteria->add(AliProductTableMap::COL_SA_TYPE_H, $this->sa_type_h);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_QTYR)) {
            $criteria->add(AliProductTableMap::COL_QTYR, $this->qtyr);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_ATO)) {
            $criteria->add(AliProductTableMap::COL_ATO, $this->ato);
        }
        if ($this->isColumnModified(AliProductTableMap::COL_PRODUCT_IMG)) {
            $criteria->add(AliProductTableMap::COL_PRODUCT_IMG, $this->product_img);
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
        $criteria = ChildAliProductQuery::create();
        $criteria->add(AliProductTableMap::COL_PCODE, $this->pcode);

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
        $validPk = null !== $this->getPcode();

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
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getPcode();
    }

    /**
     * Generic method to set the primary key (pcode column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPcode($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getPcode();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliProduct (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPcode($this->getPcode());
        $copyObj->setGroupId($this->getGroupId());
        $copyObj->setPdesc($this->getPdesc());
        $copyObj->setUnit($this->getUnit());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setVat($this->getVat());
        $copyObj->setBprice($this->getBprice());
        $copyObj->setPersonelPrice($this->getPersonelPrice());
        $copyObj->setCustomerPrice($this->getCustomerPrice());
        $copyObj->setPv($this->getPv());
        $copyObj->setBv($this->getBv());
        $copyObj->setFv($this->getFv());
        $copyObj->setQty($this->getQty());
        $copyObj->setUd($this->getUd());
        $copyObj->setSync($this->getSync());
        $copyObj->setWeb($this->getWeb());
        $copyObj->setSt($this->getSt());
        $copyObj->setSst($this->getSst());
        $copyObj->setBf($this->getBf());
        $copyObj->setSh($this->getSh());
        $copyObj->setPcodeStock($this->getPcodeStock());
        $copyObj->setSupCode($this->getSupCode());
        $copyObj->setWeight($this->getWeight());
        $copyObj->setLocationbase($this->getLocationbase());
        $copyObj->setBarcode($this->getBarcode());
        $copyObj->setPicture($this->getPicture());
        $copyObj->setFdate($this->getFdate());
        $copyObj->setTdate($this->getTdate());
        $copyObj->setSaTypeA($this->getSaTypeA());
        $copyObj->setSaTypeH($this->getSaTypeH());
        $copyObj->setQtyr($this->getQtyr());
        $copyObj->setAto($this->getAto());
        $copyObj->setProductImg($this->getProductImg());
        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return \CciOrm\CciOrm\AliProduct Clone of current object.
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
        $this->pcode = null;
        $this->group_id = null;
        $this->pdesc = null;
        $this->unit = null;
        $this->price = null;
        $this->vat = null;
        $this->bprice = null;
        $this->personel_price = null;
        $this->customer_price = null;
        $this->pv = null;
        $this->bv = null;
        $this->fv = null;
        $this->qty = null;
        $this->ud = null;
        $this->sync = null;
        $this->web = null;
        $this->st = null;
        $this->sst = null;
        $this->bf = null;
        $this->sh = null;
        $this->pcode_stock = null;
        $this->sup_code = null;
        $this->weight = null;
        $this->locationbase = null;
        $this->barcode = null;
        $this->picture = null;
        $this->fdate = null;
        $this->tdate = null;
        $this->sa_type_a = null;
        $this->sa_type_h = null;
        $this->qtyr = null;
        $this->ato = null;
        $this->product_img = null;
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
        return (string) $this->exportTo(AliProductTableMap::DEFAULT_STRING_FORMAT);
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
