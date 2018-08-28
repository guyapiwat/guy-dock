<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliRsalehQuery as ChildAliRsalehQuery;
use CciOrm\CciOrm\Map\AliRsalehTableMap;
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
 * Base class that represents a row from the 'ali_rsaleh' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliRsaleh implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliRsalehTableMap';


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
     * The value for the sano field.
     *
     * @var        string
     */
    protected $sano;

    /**
     * The value for the sano1 field.
     *
     * @var        string
     */
    protected $sano1;

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
     * The value for the inv_ref field.
     *
     * @var        string
     */
    protected $inv_ref;

    /**
     * The value for the mcode field.
     *
     * @var        string
     */
    protected $mcode;

    /**
     * The value for the total field.
     *
     * @var        string
     */
    protected $total;

    /**
     * The value for the tot_pv field.
     *
     * @var        string
     */
    protected $tot_pv;

    /**
     * The value for the tot_bv field.
     *
     * @var        string
     */
    protected $tot_bv;

    /**
     * The value for the tot_fv field.
     *
     * @var        string
     */
    protected $tot_fv;

    /**
     * The value for the usercode field.
     *
     * @var        string
     */
    protected $usercode;

    /**
     * The value for the remark field.
     *
     * @var        string
     */
    protected $remark;

    /**
     * The value for the trnf field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $trnf;

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the sa_type field.
     *
     * @var        string
     */
    protected $sa_type;

    /**
     * The value for the uid field.
     *
     * @var        string
     */
    protected $uid;

    /**
     * The value for the dl field.
     *
     * @var        string
     */
    protected $dl;

    /**
     * The value for the cancel field.
     *
     * @var        int
     */
    protected $cancel;

    /**
     * The value for the send field.
     *
     * @var        int
     */
    protected $send;

    /**
     * The value for the txtoption field.
     *
     * @var        string
     */
    protected $txtoption;

    /**
     * The value for the chkcash field.
     *
     * @var        string
     */
    protected $chkcash;

    /**
     * The value for the chkfuture field.
     *
     * @var        string
     */
    protected $chkfuture;

    /**
     * The value for the chktransfer field.
     *
     * @var        string
     */
    protected $chktransfer;

    /**
     * The value for the chkcredit1 field.
     *
     * @var        string
     */
    protected $chkcredit1;

    /**
     * The value for the chkcredit2 field.
     *
     * @var        string
     */
    protected $chkcredit2;

    /**
     * The value for the chkcredit3 field.
     *
     * @var        string
     */
    protected $chkcredit3;

    /**
     * The value for the chkinternet field.
     *
     * @var        string
     */
    protected $chkinternet;

    /**
     * The value for the chkdiscount field.
     *
     * @var        string
     */
    protected $chkdiscount;

    /**
     * The value for the chkother field.
     *
     * @var        string
     */
    protected $chkother;

    /**
     * The value for the txtcash field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $txtcash;

    /**
     * The value for the txtfuture field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $txtfuture;

    /**
     * The value for the txttransfer field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $txttransfer;

    /**
     * The value for the ewallet field.
     *
     * @var        string
     */
    protected $ewallet;

    /**
     * The value for the txtcredit1 field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $txtcredit1;

    /**
     * The value for the txtcredit2 field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $txtcredit2;

    /**
     * The value for the txtcredit3 field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $txtcredit3;

    /**
     * The value for the txtinternet field.
     *
     * @var        string
     */
    protected $txtinternet;

    /**
     * The value for the txtdiscount field.
     *
     * @var        string
     */
    protected $txtdiscount;

    /**
     * The value for the txtother field.
     *
     * @var        string
     */
    protected $txtother;

    /**
     * The value for the optioncash field.
     *
     * @var        string
     */
    protected $optioncash;

    /**
     * The value for the optionfuture field.
     *
     * @var        string
     */
    protected $optionfuture;

    /**
     * The value for the optiontransfer field.
     *
     * @var        string
     */
    protected $optiontransfer;

    /**
     * The value for the optioncredit1 field.
     *
     * @var        string
     */
    protected $optioncredit1;

    /**
     * The value for the optioncredit2 field.
     *
     * @var        string
     */
    protected $optioncredit2;

    /**
     * The value for the optioncredit3 field.
     *
     * @var        string
     */
    protected $optioncredit3;

    /**
     * The value for the optioninternet field.
     *
     * @var        string
     */
    protected $optioninternet;

    /**
     * The value for the optiondiscount field.
     *
     * @var        string
     */
    protected $optiondiscount;

    /**
     * The value for the optionother field.
     *
     * @var        string
     */
    protected $optionother;

    /**
     * The value for the asend field.
     *
     * @var        int
     */
    protected $asend;

    /**
     * The value for the asend_date field.
     *
     * @var        DateTime
     */
    protected $asend_date;

    /**
     * The value for the discount field.
     *
     * @var        string
     */
    protected $discount;

    /**
     * The value for the print field.
     *
     * @var        int
     */
    protected $print;

    /**
     * The value for the ewallet_before field.
     *
     * @var        string
     */
    protected $ewallet_before;

    /**
     * The value for the ewallet_after field.
     *
     * @var        string
     */
    protected $ewallet_after;

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
        $this->trnf = 0;
        $this->txtcash = '0';
        $this->txtfuture = '0';
        $this->txttransfer = '0';
        $this->txtcredit1 = '0';
        $this->txtcredit2 = '0';
        $this->txtcredit3 = '0';
    }

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliRsaleh object.
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
     * Compares this with another <code>AliRsaleh</code> instance.  If
     * <code>obj</code> is an instance of <code>AliRsaleh</code>, delegates to
     * <code>equals(AliRsaleh)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliRsaleh The current object, for fluid interface
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
     * Get the [sano] column value.
     *
     * @return string
     */
    public function getSano()
    {
        return $this->sano;
    }

    /**
     * Get the [sano1] column value.
     *
     * @return string
     */
    public function getSano1()
    {
        return $this->sano1;
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
     * Get the [inv_ref] column value.
     *
     * @return string
     */
    public function getInvRef()
    {
        return $this->inv_ref;
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
     * Get the [total] column value.
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the [tot_pv] column value.
     *
     * @return string
     */
    public function getTotPv()
    {
        return $this->tot_pv;
    }

    /**
     * Get the [tot_bv] column value.
     *
     * @return string
     */
    public function getTotBv()
    {
        return $this->tot_bv;
    }

    /**
     * Get the [tot_fv] column value.
     *
     * @return string
     */
    public function getTotFv()
    {
        return $this->tot_fv;
    }

    /**
     * Get the [usercode] column value.
     *
     * @return string
     */
    public function getUsercode()
    {
        return $this->usercode;
    }

    /**
     * Get the [remark] column value.
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Get the [trnf] column value.
     *
     * @return int
     */
    public function getTrnf()
    {
        return $this->trnf;
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
     * Get the [sa_type] column value.
     *
     * @return string
     */
    public function getSaType()
    {
        return $this->sa_type;
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
     * Get the [dl] column value.
     *
     * @return string
     */
    public function getDl()
    {
        return $this->dl;
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
     * Get the [send] column value.
     *
     * @return int
     */
    public function getSend()
    {
        return $this->send;
    }

    /**
     * Get the [txtoption] column value.
     *
     * @return string
     */
    public function getTxtoption()
    {
        return $this->txtoption;
    }

    /**
     * Get the [chkcash] column value.
     *
     * @return string
     */
    public function getChkcash()
    {
        return $this->chkcash;
    }

    /**
     * Get the [chkfuture] column value.
     *
     * @return string
     */
    public function getChkfuture()
    {
        return $this->chkfuture;
    }

    /**
     * Get the [chktransfer] column value.
     *
     * @return string
     */
    public function getChktransfer()
    {
        return $this->chktransfer;
    }

    /**
     * Get the [chkcredit1] column value.
     *
     * @return string
     */
    public function getChkcredit1()
    {
        return $this->chkcredit1;
    }

    /**
     * Get the [chkcredit2] column value.
     *
     * @return string
     */
    public function getChkcredit2()
    {
        return $this->chkcredit2;
    }

    /**
     * Get the [chkcredit3] column value.
     *
     * @return string
     */
    public function getChkcredit3()
    {
        return $this->chkcredit3;
    }

    /**
     * Get the [chkinternet] column value.
     *
     * @return string
     */
    public function getChkinternet()
    {
        return $this->chkinternet;
    }

    /**
     * Get the [chkdiscount] column value.
     *
     * @return string
     */
    public function getChkdiscount()
    {
        return $this->chkdiscount;
    }

    /**
     * Get the [chkother] column value.
     *
     * @return string
     */
    public function getChkother()
    {
        return $this->chkother;
    }

    /**
     * Get the [txtcash] column value.
     *
     * @return string
     */
    public function getTxtcash()
    {
        return $this->txtcash;
    }

    /**
     * Get the [txtfuture] column value.
     *
     * @return string
     */
    public function getTxtfuture()
    {
        return $this->txtfuture;
    }

    /**
     * Get the [txttransfer] column value.
     *
     * @return string
     */
    public function getTxttransfer()
    {
        return $this->txttransfer;
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
     * Get the [txtcredit1] column value.
     *
     * @return string
     */
    public function getTxtcredit1()
    {
        return $this->txtcredit1;
    }

    /**
     * Get the [txtcredit2] column value.
     *
     * @return string
     */
    public function getTxtcredit2()
    {
        return $this->txtcredit2;
    }

    /**
     * Get the [txtcredit3] column value.
     *
     * @return string
     */
    public function getTxtcredit3()
    {
        return $this->txtcredit3;
    }

    /**
     * Get the [txtinternet] column value.
     *
     * @return string
     */
    public function getTxtinternet()
    {
        return $this->txtinternet;
    }

    /**
     * Get the [txtdiscount] column value.
     *
     * @return string
     */
    public function getTxtdiscount()
    {
        return $this->txtdiscount;
    }

    /**
     * Get the [txtother] column value.
     *
     * @return string
     */
    public function getTxtother()
    {
        return $this->txtother;
    }

    /**
     * Get the [optioncash] column value.
     *
     * @return string
     */
    public function getOptioncash()
    {
        return $this->optioncash;
    }

    /**
     * Get the [optionfuture] column value.
     *
     * @return string
     */
    public function getOptionfuture()
    {
        return $this->optionfuture;
    }

    /**
     * Get the [optiontransfer] column value.
     *
     * @return string
     */
    public function getOptiontransfer()
    {
        return $this->optiontransfer;
    }

    /**
     * Get the [optioncredit1] column value.
     *
     * @return string
     */
    public function getOptioncredit1()
    {
        return $this->optioncredit1;
    }

    /**
     * Get the [optioncredit2] column value.
     *
     * @return string
     */
    public function getOptioncredit2()
    {
        return $this->optioncredit2;
    }

    /**
     * Get the [optioncredit3] column value.
     *
     * @return string
     */
    public function getOptioncredit3()
    {
        return $this->optioncredit3;
    }

    /**
     * Get the [optioninternet] column value.
     *
     * @return string
     */
    public function getOptioninternet()
    {
        return $this->optioninternet;
    }

    /**
     * Get the [optiondiscount] column value.
     *
     * @return string
     */
    public function getOptiondiscount()
    {
        return $this->optiondiscount;
    }

    /**
     * Get the [optionother] column value.
     *
     * @return string
     */
    public function getOptionother()
    {
        return $this->optionother;
    }

    /**
     * Get the [asend] column value.
     *
     * @return int
     */
    public function getAsend()
    {
        return $this->asend;
    }

    /**
     * Get the [optionally formatted] temporal [asend_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getAsendDate($format = NULL)
    {
        if ($format === null) {
            return $this->asend_date;
        } else {
            return $this->asend_date instanceof \DateTimeInterface ? $this->asend_date->format($format) : null;
        }
    }

    /**
     * Get the [discount] column value.
     *
     * @return string
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Get the [print] column value.
     *
     * @return int
     */
    public function getPrint()
    {
        return $this->print;
    }

    /**
     * Get the [ewallet_before] column value.
     *
     * @return string
     */
    public function getEwalletBefore()
    {
        return $this->ewallet_before;
    }

    /**
     * Get the [ewallet_after] column value.
     *
     * @return string
     */
    public function getEwalletAfter()
    {
        return $this->ewallet_after;
    }

    /**
     * Set the value of [sano] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setSano($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano !== $v) {
            $this->sano = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_SANO] = true;
        }

        return $this;
    } // setSano()

    /**
     * Set the value of [sano1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setSano1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano1 !== $v) {
            $this->sano1 = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_SANO1] = true;
        }

        return $this;
    } // setSano1()

    /**
     * Sets the value of [sadate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setSadate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sadate !== null || $dt !== null) {
            if ($this->sadate === null || $dt === null || $dt->format("Y-m-d") !== $this->sadate->format("Y-m-d")) {
                $this->sadate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliRsalehTableMap::COL_SADATE] = true;
            }
        } // if either are not null

        return $this;
    } // setSadate()

    /**
     * Set the value of [inv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setInvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_code !== $v) {
            $this->inv_code = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_INV_CODE] = true;
        }

        return $this;
    } // setInvCode()

    /**
     * Set the value of [inv_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setInvRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_ref !== $v) {
            $this->inv_ref = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_INV_REF] = true;
        }

        return $this;
    } // setInvRef()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [tot_pv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTotPv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_pv !== $v) {
            $this->tot_pv = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TOT_PV] = true;
        }

        return $this;
    } // setTotPv()

    /**
     * Set the value of [tot_bv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTotBv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_bv !== $v) {
            $this->tot_bv = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TOT_BV] = true;
        }

        return $this;
    } // setTotBv()

    /**
     * Set the value of [tot_fv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTotFv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_fv !== $v) {
            $this->tot_fv = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TOT_FV] = true;
        }

        return $this;
    } // setTotFv()

    /**
     * Set the value of [usercode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setUsercode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->usercode !== $v) {
            $this->usercode = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_USERCODE] = true;
        }

        return $this;
    } // setUsercode()

    /**
     * Set the value of [remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->remark !== $v) {
            $this->remark = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_REMARK] = true;
        }

        return $this;
    } // setRemark()

    /**
     * Set the value of [trnf] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTrnf($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trnf !== $v) {
            $this->trnf = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TRNF] = true;
        }

        return $this;
    } // setTrnf()

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [sa_type] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setSaType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sa_type !== $v) {
            $this->sa_type = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_SA_TYPE] = true;
        }

        return $this;
    } // setSaType()

    /**
     * Set the value of [uid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

    /**
     * Set the value of [dl] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setDl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dl !== $v) {
            $this->dl = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_DL] = true;
        }

        return $this;
    } // setDl()

    /**
     * Set the value of [cancel] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setCancel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cancel !== $v) {
            $this->cancel = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_CANCEL] = true;
        }

        return $this;
    } // setCancel()

    /**
     * Set the value of [send] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setSend($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->send !== $v) {
            $this->send = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_SEND] = true;
        }

        return $this;
    } // setSend()

    /**
     * Set the value of [txtoption] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTxtoption($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtoption !== $v) {
            $this->txtoption = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TXTOPTION] = true;
        }

        return $this;
    } // setTxtoption()

    /**
     * Set the value of [chkcash] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setChkcash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcash !== $v) {
            $this->chkcash = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_CHKCASH] = true;
        }

        return $this;
    } // setChkcash()

    /**
     * Set the value of [chkfuture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setChkfuture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkfuture !== $v) {
            $this->chkfuture = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_CHKFUTURE] = true;
        }

        return $this;
    } // setChkfuture()

    /**
     * Set the value of [chktransfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setChktransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chktransfer !== $v) {
            $this->chktransfer = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_CHKTRANSFER] = true;
        }

        return $this;
    } // setChktransfer()

    /**
     * Set the value of [chkcredit1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setChkcredit1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcredit1 !== $v) {
            $this->chkcredit1 = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_CHKCREDIT1] = true;
        }

        return $this;
    } // setChkcredit1()

    /**
     * Set the value of [chkcredit2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setChkcredit2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcredit2 !== $v) {
            $this->chkcredit2 = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_CHKCREDIT2] = true;
        }

        return $this;
    } // setChkcredit2()

    /**
     * Set the value of [chkcredit3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setChkcredit3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcredit3 !== $v) {
            $this->chkcredit3 = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_CHKCREDIT3] = true;
        }

        return $this;
    } // setChkcredit3()

    /**
     * Set the value of [chkinternet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setChkinternet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkinternet !== $v) {
            $this->chkinternet = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_CHKINTERNET] = true;
        }

        return $this;
    } // setChkinternet()

    /**
     * Set the value of [chkdiscount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setChkdiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkdiscount !== $v) {
            $this->chkdiscount = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_CHKDISCOUNT] = true;
        }

        return $this;
    } // setChkdiscount()

    /**
     * Set the value of [chkother] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setChkother($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkother !== $v) {
            $this->chkother = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_CHKOTHER] = true;
        }

        return $this;
    } // setChkother()

    /**
     * Set the value of [txtcash] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTxtcash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcash !== $v) {
            $this->txtcash = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TXTCASH] = true;
        }

        return $this;
    } // setTxtcash()

    /**
     * Set the value of [txtfuture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTxtfuture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtfuture !== $v) {
            $this->txtfuture = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TXTFUTURE] = true;
        }

        return $this;
    } // setTxtfuture()

    /**
     * Set the value of [txttransfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTxttransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txttransfer !== $v) {
            $this->txttransfer = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TXTTRANSFER] = true;
        }

        return $this;
    } // setTxttransfer()

    /**
     * Set the value of [ewallet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setEwallet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet !== $v) {
            $this->ewallet = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_EWALLET] = true;
        }

        return $this;
    } // setEwallet()

    /**
     * Set the value of [txtcredit1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTxtcredit1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcredit1 !== $v) {
            $this->txtcredit1 = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TXTCREDIT1] = true;
        }

        return $this;
    } // setTxtcredit1()

    /**
     * Set the value of [txtcredit2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTxtcredit2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcredit2 !== $v) {
            $this->txtcredit2 = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TXTCREDIT2] = true;
        }

        return $this;
    } // setTxtcredit2()

    /**
     * Set the value of [txtcredit3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTxtcredit3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcredit3 !== $v) {
            $this->txtcredit3 = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TXTCREDIT3] = true;
        }

        return $this;
    } // setTxtcredit3()

    /**
     * Set the value of [txtinternet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTxtinternet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtinternet !== $v) {
            $this->txtinternet = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TXTINTERNET] = true;
        }

        return $this;
    } // setTxtinternet()

    /**
     * Set the value of [txtdiscount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTxtdiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtdiscount !== $v) {
            $this->txtdiscount = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TXTDISCOUNT] = true;
        }

        return $this;
    } // setTxtdiscount()

    /**
     * Set the value of [txtother] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setTxtother($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtother !== $v) {
            $this->txtother = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_TXTOTHER] = true;
        }

        return $this;
    } // setTxtother()

    /**
     * Set the value of [optioncash] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setOptioncash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncash !== $v) {
            $this->optioncash = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_OPTIONCASH] = true;
        }

        return $this;
    } // setOptioncash()

    /**
     * Set the value of [optionfuture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setOptionfuture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optionfuture !== $v) {
            $this->optionfuture = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_OPTIONFUTURE] = true;
        }

        return $this;
    } // setOptionfuture()

    /**
     * Set the value of [optiontransfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setOptiontransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optiontransfer !== $v) {
            $this->optiontransfer = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_OPTIONTRANSFER] = true;
        }

        return $this;
    } // setOptiontransfer()

    /**
     * Set the value of [optioncredit1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setOptioncredit1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncredit1 !== $v) {
            $this->optioncredit1 = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_OPTIONCREDIT1] = true;
        }

        return $this;
    } // setOptioncredit1()

    /**
     * Set the value of [optioncredit2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setOptioncredit2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncredit2 !== $v) {
            $this->optioncredit2 = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_OPTIONCREDIT2] = true;
        }

        return $this;
    } // setOptioncredit2()

    /**
     * Set the value of [optioncredit3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setOptioncredit3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncredit3 !== $v) {
            $this->optioncredit3 = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_OPTIONCREDIT3] = true;
        }

        return $this;
    } // setOptioncredit3()

    /**
     * Set the value of [optioninternet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setOptioninternet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioninternet !== $v) {
            $this->optioninternet = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_OPTIONINTERNET] = true;
        }

        return $this;
    } // setOptioninternet()

    /**
     * Set the value of [optiondiscount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setOptiondiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optiondiscount !== $v) {
            $this->optiondiscount = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_OPTIONDISCOUNT] = true;
        }

        return $this;
    } // setOptiondiscount()

    /**
     * Set the value of [optionother] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setOptionother($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optionother !== $v) {
            $this->optionother = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_OPTIONOTHER] = true;
        }

        return $this;
    } // setOptionother()

    /**
     * Set the value of [asend] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setAsend($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->asend !== $v) {
            $this->asend = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_ASEND] = true;
        }

        return $this;
    } // setAsend()

    /**
     * Sets the value of [asend_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setAsendDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->asend_date !== null || $dt !== null) {
            if ($this->asend_date === null || $dt === null || $dt->format("Y-m-d") !== $this->asend_date->format("Y-m-d")) {
                $this->asend_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliRsalehTableMap::COL_ASEND_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setAsendDate()

    /**
     * Set the value of [discount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setDiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->discount !== $v) {
            $this->discount = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_DISCOUNT] = true;
        }

        return $this;
    } // setDiscount()

    /**
     * Set the value of [print] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setPrint($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->print !== $v) {
            $this->print = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_PRINT] = true;
        }

        return $this;
    } // setPrint()

    /**
     * Set the value of [ewallet_before] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setEwalletBefore($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet_before !== $v) {
            $this->ewallet_before = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_EWALLET_BEFORE] = true;
        }

        return $this;
    } // setEwalletBefore()

    /**
     * Set the value of [ewallet_after] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object (for fluent API support)
     */
    public function setEwalletAfter($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet_after !== $v) {
            $this->ewallet_after = $v;
            $this->modifiedColumns[AliRsalehTableMap::COL_EWALLET_AFTER] = true;
        }

        return $this;
    } // setEwalletAfter()

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
            if ($this->trnf !== 0) {
                return false;
            }

            if ($this->txtcash !== '0') {
                return false;
            }

            if ($this->txtfuture !== '0') {
                return false;
            }

            if ($this->txttransfer !== '0') {
                return false;
            }

            if ($this->txtcredit1 !== '0') {
                return false;
            }

            if ($this->txtcredit2 !== '0') {
                return false;
            }

            if ($this->txtcredit3 !== '0') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliRsalehTableMap::translateFieldName('Sano', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliRsalehTableMap::translateFieldName('Sano1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliRsalehTableMap::translateFieldName('Sadate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->sadate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliRsalehTableMap::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliRsalehTableMap::translateFieldName('InvRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliRsalehTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliRsalehTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliRsalehTableMap::translateFieldName('TotPv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_pv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliRsalehTableMap::translateFieldName('TotBv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_bv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliRsalehTableMap::translateFieldName('TotFv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_fv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliRsalehTableMap::translateFieldName('Usercode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->usercode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliRsalehTableMap::translateFieldName('Remark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliRsalehTableMap::translateFieldName('Trnf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trnf = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliRsalehTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliRsalehTableMap::translateFieldName('SaType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sa_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliRsalehTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliRsalehTableMap::translateFieldName('Dl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliRsalehTableMap::translateFieldName('Cancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cancel = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliRsalehTableMap::translateFieldName('Send', TableMap::TYPE_PHPNAME, $indexType)];
            $this->send = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliRsalehTableMap::translateFieldName('Txtoption', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtoption = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliRsalehTableMap::translateFieldName('Chkcash', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcash = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliRsalehTableMap::translateFieldName('Chkfuture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkfuture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliRsalehTableMap::translateFieldName('Chktransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chktransfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliRsalehTableMap::translateFieldName('Chkcredit1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcredit1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliRsalehTableMap::translateFieldName('Chkcredit2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcredit2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliRsalehTableMap::translateFieldName('Chkcredit3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcredit3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : AliRsalehTableMap::translateFieldName('Chkinternet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkinternet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : AliRsalehTableMap::translateFieldName('Chkdiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkdiscount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : AliRsalehTableMap::translateFieldName('Chkother', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkother = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : AliRsalehTableMap::translateFieldName('Txtcash', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcash = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : AliRsalehTableMap::translateFieldName('Txtfuture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtfuture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : AliRsalehTableMap::translateFieldName('Txttransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txttransfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : AliRsalehTableMap::translateFieldName('Ewallet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : AliRsalehTableMap::translateFieldName('Txtcredit1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcredit1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : AliRsalehTableMap::translateFieldName('Txtcredit2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcredit2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : AliRsalehTableMap::translateFieldName('Txtcredit3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcredit3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : AliRsalehTableMap::translateFieldName('Txtinternet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtinternet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : AliRsalehTableMap::translateFieldName('Txtdiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtdiscount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : AliRsalehTableMap::translateFieldName('Txtother', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtother = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : AliRsalehTableMap::translateFieldName('Optioncash', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncash = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : AliRsalehTableMap::translateFieldName('Optionfuture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optionfuture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : AliRsalehTableMap::translateFieldName('Optiontransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optiontransfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : AliRsalehTableMap::translateFieldName('Optioncredit1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncredit1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : AliRsalehTableMap::translateFieldName('Optioncredit2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncredit2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : AliRsalehTableMap::translateFieldName('Optioncredit3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncredit3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : AliRsalehTableMap::translateFieldName('Optioninternet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioninternet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : AliRsalehTableMap::translateFieldName('Optiondiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optiondiscount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 47 + $startcol : AliRsalehTableMap::translateFieldName('Optionother', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optionother = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 48 + $startcol : AliRsalehTableMap::translateFieldName('Asend', TableMap::TYPE_PHPNAME, $indexType)];
            $this->asend = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 49 + $startcol : AliRsalehTableMap::translateFieldName('AsendDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->asend_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 50 + $startcol : AliRsalehTableMap::translateFieldName('Discount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->discount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 51 + $startcol : AliRsalehTableMap::translateFieldName('Print', TableMap::TYPE_PHPNAME, $indexType)];
            $this->print = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 52 + $startcol : AliRsalehTableMap::translateFieldName('EwalletBefore', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet_before = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 53 + $startcol : AliRsalehTableMap::translateFieldName('EwalletAfter', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet_after = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 54; // 54 = AliRsalehTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliRsaleh'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliRsalehTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliRsalehQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliRsaleh::setDeleted()
     * @see AliRsaleh::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliRsalehTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliRsalehQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliRsalehTableMap::DATABASE_NAME);
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
                AliRsalehTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliRsalehTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliRsalehTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliRsalehTableMap::COL_SANO)) {
            $modifiedColumns[':p' . $index++]  = 'sano';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_SANO1)) {
            $modifiedColumns[':p' . $index++]  = 'sano1';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_SADATE)) {
            $modifiedColumns[':p' . $index++]  = 'sadate';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_INV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'inv_code';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_INV_REF)) {
            $modifiedColumns[':p' . $index++]  = 'inv_ref';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TOT_PV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_pv';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TOT_BV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_bv';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TOT_FV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_fv';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_USERCODE)) {
            $modifiedColumns[':p' . $index++]  = 'usercode';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'remark';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TRNF)) {
            $modifiedColumns[':p' . $index++]  = 'trnf';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_SA_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'sa_type';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_DL)) {
            $modifiedColumns[':p' . $index++]  = 'dl';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'cancel';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_SEND)) {
            $modifiedColumns[':p' . $index++]  = 'send';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTOPTION)) {
            $modifiedColumns[':p' . $index++]  = 'txtoption';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKCASH)) {
            $modifiedColumns[':p' . $index++]  = 'chkCash';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKFUTURE)) {
            $modifiedColumns[':p' . $index++]  = 'chkFuture';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKTRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'chkTransfer';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKCREDIT1)) {
            $modifiedColumns[':p' . $index++]  = 'chkCredit1';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKCREDIT2)) {
            $modifiedColumns[':p' . $index++]  = 'chkCredit2';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKCREDIT3)) {
            $modifiedColumns[':p' . $index++]  = 'chkCredit3';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKINTERNET)) {
            $modifiedColumns[':p' . $index++]  = 'chkInternet';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKDISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'chkDiscount';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKOTHER)) {
            $modifiedColumns[':p' . $index++]  = 'chkOther';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTCASH)) {
            $modifiedColumns[':p' . $index++]  = 'txtCash';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTFUTURE)) {
            $modifiedColumns[':p' . $index++]  = 'txtFuture';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTTRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'txtTransfer';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_EWALLET)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTCREDIT1)) {
            $modifiedColumns[':p' . $index++]  = 'txtCredit1';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTCREDIT2)) {
            $modifiedColumns[':p' . $index++]  = 'txtCredit2';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTCREDIT3)) {
            $modifiedColumns[':p' . $index++]  = 'txtCredit3';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTINTERNET)) {
            $modifiedColumns[':p' . $index++]  = 'txtInternet';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTDISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'txtDiscount';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTOTHER)) {
            $modifiedColumns[':p' . $index++]  = 'txtOther';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONCASH)) {
            $modifiedColumns[':p' . $index++]  = 'optionCash';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONFUTURE)) {
            $modifiedColumns[':p' . $index++]  = 'optionFuture';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONTRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'optionTransfer';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONCREDIT1)) {
            $modifiedColumns[':p' . $index++]  = 'optionCredit1';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONCREDIT2)) {
            $modifiedColumns[':p' . $index++]  = 'optionCredit2';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONCREDIT3)) {
            $modifiedColumns[':p' . $index++]  = 'optionCredit3';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONINTERNET)) {
            $modifiedColumns[':p' . $index++]  = 'optionInternet';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONDISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'optionDiscount';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONOTHER)) {
            $modifiedColumns[':p' . $index++]  = 'optionOther';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_ASEND)) {
            $modifiedColumns[':p' . $index++]  = 'asend';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_ASEND_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'asend_date';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_DISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'discount';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_PRINT)) {
            $modifiedColumns[':p' . $index++]  = 'print';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_EWALLET_BEFORE)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet_before';
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_EWALLET_AFTER)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet_after';
        }

        $sql = sprintf(
            'INSERT INTO ali_rsaleh (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'sano':
                        $stmt->bindValue($identifier, $this->sano, PDO::PARAM_INT);
                        break;
                    case 'sano1':
                        $stmt->bindValue($identifier, $this->sano1, PDO::PARAM_INT);
                        break;
                    case 'sadate':
                        $stmt->bindValue($identifier, $this->sadate ? $this->sadate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'inv_code':
                        $stmt->bindValue($identifier, $this->inv_code, PDO::PARAM_STR);
                        break;
                    case 'inv_ref':
                        $stmt->bindValue($identifier, $this->inv_ref, PDO::PARAM_STR);
                        break;
                    case 'mcode':
                        $stmt->bindValue($identifier, $this->mcode, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'tot_pv':
                        $stmt->bindValue($identifier, $this->tot_pv, PDO::PARAM_STR);
                        break;
                    case 'tot_bv':
                        $stmt->bindValue($identifier, $this->tot_bv, PDO::PARAM_STR);
                        break;
                    case 'tot_fv':
                        $stmt->bindValue($identifier, $this->tot_fv, PDO::PARAM_STR);
                        break;
                    case 'usercode':
                        $stmt->bindValue($identifier, $this->usercode, PDO::PARAM_STR);
                        break;
                    case 'remark':
                        $stmt->bindValue($identifier, $this->remark, PDO::PARAM_STR);
                        break;
                    case 'trnf':
                        $stmt->bindValue($identifier, $this->trnf, PDO::PARAM_INT);
                        break;
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'sa_type':
                        $stmt->bindValue($identifier, $this->sa_type, PDO::PARAM_STR);
                        break;
                    case 'uid':
                        $stmt->bindValue($identifier, $this->uid, PDO::PARAM_STR);
                        break;
                    case 'dl':
                        $stmt->bindValue($identifier, $this->dl, PDO::PARAM_STR);
                        break;
                    case 'cancel':
                        $stmt->bindValue($identifier, $this->cancel, PDO::PARAM_INT);
                        break;
                    case 'send':
                        $stmt->bindValue($identifier, $this->send, PDO::PARAM_INT);
                        break;
                    case 'txtoption':
                        $stmt->bindValue($identifier, $this->txtoption, PDO::PARAM_STR);
                        break;
                    case 'chkCash':
                        $stmt->bindValue($identifier, $this->chkcash, PDO::PARAM_STR);
                        break;
                    case 'chkFuture':
                        $stmt->bindValue($identifier, $this->chkfuture, PDO::PARAM_STR);
                        break;
                    case 'chkTransfer':
                        $stmt->bindValue($identifier, $this->chktransfer, PDO::PARAM_STR);
                        break;
                    case 'chkCredit1':
                        $stmt->bindValue($identifier, $this->chkcredit1, PDO::PARAM_STR);
                        break;
                    case 'chkCredit2':
                        $stmt->bindValue($identifier, $this->chkcredit2, PDO::PARAM_STR);
                        break;
                    case 'chkCredit3':
                        $stmt->bindValue($identifier, $this->chkcredit3, PDO::PARAM_STR);
                        break;
                    case 'chkInternet':
                        $stmt->bindValue($identifier, $this->chkinternet, PDO::PARAM_STR);
                        break;
                    case 'chkDiscount':
                        $stmt->bindValue($identifier, $this->chkdiscount, PDO::PARAM_STR);
                        break;
                    case 'chkOther':
                        $stmt->bindValue($identifier, $this->chkother, PDO::PARAM_STR);
                        break;
                    case 'txtCash':
                        $stmt->bindValue($identifier, $this->txtcash, PDO::PARAM_STR);
                        break;
                    case 'txtFuture':
                        $stmt->bindValue($identifier, $this->txtfuture, PDO::PARAM_STR);
                        break;
                    case 'txtTransfer':
                        $stmt->bindValue($identifier, $this->txttransfer, PDO::PARAM_STR);
                        break;
                    case 'ewallet':
                        $stmt->bindValue($identifier, $this->ewallet, PDO::PARAM_STR);
                        break;
                    case 'txtCredit1':
                        $stmt->bindValue($identifier, $this->txtcredit1, PDO::PARAM_STR);
                        break;
                    case 'txtCredit2':
                        $stmt->bindValue($identifier, $this->txtcredit2, PDO::PARAM_STR);
                        break;
                    case 'txtCredit3':
                        $stmt->bindValue($identifier, $this->txtcredit3, PDO::PARAM_STR);
                        break;
                    case 'txtInternet':
                        $stmt->bindValue($identifier, $this->txtinternet, PDO::PARAM_STR);
                        break;
                    case 'txtDiscount':
                        $stmt->bindValue($identifier, $this->txtdiscount, PDO::PARAM_STR);
                        break;
                    case 'txtOther':
                        $stmt->bindValue($identifier, $this->txtother, PDO::PARAM_STR);
                        break;
                    case 'optionCash':
                        $stmt->bindValue($identifier, $this->optioncash, PDO::PARAM_STR);
                        break;
                    case 'optionFuture':
                        $stmt->bindValue($identifier, $this->optionfuture, PDO::PARAM_STR);
                        break;
                    case 'optionTransfer':
                        $stmt->bindValue($identifier, $this->optiontransfer, PDO::PARAM_STR);
                        break;
                    case 'optionCredit1':
                        $stmt->bindValue($identifier, $this->optioncredit1, PDO::PARAM_STR);
                        break;
                    case 'optionCredit2':
                        $stmt->bindValue($identifier, $this->optioncredit2, PDO::PARAM_STR);
                        break;
                    case 'optionCredit3':
                        $stmt->bindValue($identifier, $this->optioncredit3, PDO::PARAM_STR);
                        break;
                    case 'optionInternet':
                        $stmt->bindValue($identifier, $this->optioninternet, PDO::PARAM_STR);
                        break;
                    case 'optionDiscount':
                        $stmt->bindValue($identifier, $this->optiondiscount, PDO::PARAM_STR);
                        break;
                    case 'optionOther':
                        $stmt->bindValue($identifier, $this->optionother, PDO::PARAM_STR);
                        break;
                    case 'asend':
                        $stmt->bindValue($identifier, $this->asend, PDO::PARAM_INT);
                        break;
                    case 'asend_date':
                        $stmt->bindValue($identifier, $this->asend_date ? $this->asend_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'discount':
                        $stmt->bindValue($identifier, $this->discount, PDO::PARAM_STR);
                        break;
                    case 'print':
                        $stmt->bindValue($identifier, $this->print, PDO::PARAM_INT);
                        break;
                    case 'ewallet_before':
                        $stmt->bindValue($identifier, $this->ewallet_before, PDO::PARAM_STR);
                        break;
                    case 'ewallet_after':
                        $stmt->bindValue($identifier, $this->ewallet_after, PDO::PARAM_STR);
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
        $pos = AliRsalehTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getSano();
                break;
            case 1:
                return $this->getSano1();
                break;
            case 2:
                return $this->getSadate();
                break;
            case 3:
                return $this->getInvCode();
                break;
            case 4:
                return $this->getInvRef();
                break;
            case 5:
                return $this->getMcode();
                break;
            case 6:
                return $this->getTotal();
                break;
            case 7:
                return $this->getTotPv();
                break;
            case 8:
                return $this->getTotBv();
                break;
            case 9:
                return $this->getTotFv();
                break;
            case 10:
                return $this->getUsercode();
                break;
            case 11:
                return $this->getRemark();
                break;
            case 12:
                return $this->getTrnf();
                break;
            case 13:
                return $this->getId();
                break;
            case 14:
                return $this->getSaType();
                break;
            case 15:
                return $this->getUid();
                break;
            case 16:
                return $this->getDl();
                break;
            case 17:
                return $this->getCancel();
                break;
            case 18:
                return $this->getSend();
                break;
            case 19:
                return $this->getTxtoption();
                break;
            case 20:
                return $this->getChkcash();
                break;
            case 21:
                return $this->getChkfuture();
                break;
            case 22:
                return $this->getChktransfer();
                break;
            case 23:
                return $this->getChkcredit1();
                break;
            case 24:
                return $this->getChkcredit2();
                break;
            case 25:
                return $this->getChkcredit3();
                break;
            case 26:
                return $this->getChkinternet();
                break;
            case 27:
                return $this->getChkdiscount();
                break;
            case 28:
                return $this->getChkother();
                break;
            case 29:
                return $this->getTxtcash();
                break;
            case 30:
                return $this->getTxtfuture();
                break;
            case 31:
                return $this->getTxttransfer();
                break;
            case 32:
                return $this->getEwallet();
                break;
            case 33:
                return $this->getTxtcredit1();
                break;
            case 34:
                return $this->getTxtcredit2();
                break;
            case 35:
                return $this->getTxtcredit3();
                break;
            case 36:
                return $this->getTxtinternet();
                break;
            case 37:
                return $this->getTxtdiscount();
                break;
            case 38:
                return $this->getTxtother();
                break;
            case 39:
                return $this->getOptioncash();
                break;
            case 40:
                return $this->getOptionfuture();
                break;
            case 41:
                return $this->getOptiontransfer();
                break;
            case 42:
                return $this->getOptioncredit1();
                break;
            case 43:
                return $this->getOptioncredit2();
                break;
            case 44:
                return $this->getOptioncredit3();
                break;
            case 45:
                return $this->getOptioninternet();
                break;
            case 46:
                return $this->getOptiondiscount();
                break;
            case 47:
                return $this->getOptionother();
                break;
            case 48:
                return $this->getAsend();
                break;
            case 49:
                return $this->getAsendDate();
                break;
            case 50:
                return $this->getDiscount();
                break;
            case 51:
                return $this->getPrint();
                break;
            case 52:
                return $this->getEwalletBefore();
                break;
            case 53:
                return $this->getEwalletAfter();
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

        if (isset($alreadyDumpedObjects['AliRsaleh'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliRsaleh'][$this->hashCode()] = true;
        $keys = AliRsalehTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSano(),
            $keys[1] => $this->getSano1(),
            $keys[2] => $this->getSadate(),
            $keys[3] => $this->getInvCode(),
            $keys[4] => $this->getInvRef(),
            $keys[5] => $this->getMcode(),
            $keys[6] => $this->getTotal(),
            $keys[7] => $this->getTotPv(),
            $keys[8] => $this->getTotBv(),
            $keys[9] => $this->getTotFv(),
            $keys[10] => $this->getUsercode(),
            $keys[11] => $this->getRemark(),
            $keys[12] => $this->getTrnf(),
            $keys[13] => $this->getId(),
            $keys[14] => $this->getSaType(),
            $keys[15] => $this->getUid(),
            $keys[16] => $this->getDl(),
            $keys[17] => $this->getCancel(),
            $keys[18] => $this->getSend(),
            $keys[19] => $this->getTxtoption(),
            $keys[20] => $this->getChkcash(),
            $keys[21] => $this->getChkfuture(),
            $keys[22] => $this->getChktransfer(),
            $keys[23] => $this->getChkcredit1(),
            $keys[24] => $this->getChkcredit2(),
            $keys[25] => $this->getChkcredit3(),
            $keys[26] => $this->getChkinternet(),
            $keys[27] => $this->getChkdiscount(),
            $keys[28] => $this->getChkother(),
            $keys[29] => $this->getTxtcash(),
            $keys[30] => $this->getTxtfuture(),
            $keys[31] => $this->getTxttransfer(),
            $keys[32] => $this->getEwallet(),
            $keys[33] => $this->getTxtcredit1(),
            $keys[34] => $this->getTxtcredit2(),
            $keys[35] => $this->getTxtcredit3(),
            $keys[36] => $this->getTxtinternet(),
            $keys[37] => $this->getTxtdiscount(),
            $keys[38] => $this->getTxtother(),
            $keys[39] => $this->getOptioncash(),
            $keys[40] => $this->getOptionfuture(),
            $keys[41] => $this->getOptiontransfer(),
            $keys[42] => $this->getOptioncredit1(),
            $keys[43] => $this->getOptioncredit2(),
            $keys[44] => $this->getOptioncredit3(),
            $keys[45] => $this->getOptioninternet(),
            $keys[46] => $this->getOptiondiscount(),
            $keys[47] => $this->getOptionother(),
            $keys[48] => $this->getAsend(),
            $keys[49] => $this->getAsendDate(),
            $keys[50] => $this->getDiscount(),
            $keys[51] => $this->getPrint(),
            $keys[52] => $this->getEwalletBefore(),
            $keys[53] => $this->getEwalletAfter(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        if ($result[$keys[49]] instanceof \DateTimeInterface) {
            $result[$keys[49]] = $result[$keys[49]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliRsaleh
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliRsalehTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliRsaleh
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSano($value);
                break;
            case 1:
                $this->setSano1($value);
                break;
            case 2:
                $this->setSadate($value);
                break;
            case 3:
                $this->setInvCode($value);
                break;
            case 4:
                $this->setInvRef($value);
                break;
            case 5:
                $this->setMcode($value);
                break;
            case 6:
                $this->setTotal($value);
                break;
            case 7:
                $this->setTotPv($value);
                break;
            case 8:
                $this->setTotBv($value);
                break;
            case 9:
                $this->setTotFv($value);
                break;
            case 10:
                $this->setUsercode($value);
                break;
            case 11:
                $this->setRemark($value);
                break;
            case 12:
                $this->setTrnf($value);
                break;
            case 13:
                $this->setId($value);
                break;
            case 14:
                $this->setSaType($value);
                break;
            case 15:
                $this->setUid($value);
                break;
            case 16:
                $this->setDl($value);
                break;
            case 17:
                $this->setCancel($value);
                break;
            case 18:
                $this->setSend($value);
                break;
            case 19:
                $this->setTxtoption($value);
                break;
            case 20:
                $this->setChkcash($value);
                break;
            case 21:
                $this->setChkfuture($value);
                break;
            case 22:
                $this->setChktransfer($value);
                break;
            case 23:
                $this->setChkcredit1($value);
                break;
            case 24:
                $this->setChkcredit2($value);
                break;
            case 25:
                $this->setChkcredit3($value);
                break;
            case 26:
                $this->setChkinternet($value);
                break;
            case 27:
                $this->setChkdiscount($value);
                break;
            case 28:
                $this->setChkother($value);
                break;
            case 29:
                $this->setTxtcash($value);
                break;
            case 30:
                $this->setTxtfuture($value);
                break;
            case 31:
                $this->setTxttransfer($value);
                break;
            case 32:
                $this->setEwallet($value);
                break;
            case 33:
                $this->setTxtcredit1($value);
                break;
            case 34:
                $this->setTxtcredit2($value);
                break;
            case 35:
                $this->setTxtcredit3($value);
                break;
            case 36:
                $this->setTxtinternet($value);
                break;
            case 37:
                $this->setTxtdiscount($value);
                break;
            case 38:
                $this->setTxtother($value);
                break;
            case 39:
                $this->setOptioncash($value);
                break;
            case 40:
                $this->setOptionfuture($value);
                break;
            case 41:
                $this->setOptiontransfer($value);
                break;
            case 42:
                $this->setOptioncredit1($value);
                break;
            case 43:
                $this->setOptioncredit2($value);
                break;
            case 44:
                $this->setOptioncredit3($value);
                break;
            case 45:
                $this->setOptioninternet($value);
                break;
            case 46:
                $this->setOptiondiscount($value);
                break;
            case 47:
                $this->setOptionother($value);
                break;
            case 48:
                $this->setAsend($value);
                break;
            case 49:
                $this->setAsendDate($value);
                break;
            case 50:
                $this->setDiscount($value);
                break;
            case 51:
                $this->setPrint($value);
                break;
            case 52:
                $this->setEwalletBefore($value);
                break;
            case 53:
                $this->setEwalletAfter($value);
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
        $keys = AliRsalehTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSano($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setSano1($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSadate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setInvCode($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setInvRef($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setMcode($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setTotal($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setTotPv($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setTotBv($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTotFv($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setUsercode($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setRemark($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setTrnf($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setId($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setSaType($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setUid($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setDl($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setCancel($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setSend($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setTxtoption($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setChkcash($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setChkfuture($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setChktransfer($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setChkcredit1($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setChkcredit2($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setChkcredit3($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setChkinternet($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setChkdiscount($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setChkother($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setTxtcash($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setTxtfuture($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setTxttransfer($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setEwallet($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setTxtcredit1($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setTxtcredit2($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setTxtcredit3($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setTxtinternet($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setTxtdiscount($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setTxtother($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setOptioncash($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setOptionfuture($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setOptiontransfer($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setOptioncredit1($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setOptioncredit2($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setOptioncredit3($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setOptioninternet($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setOptiondiscount($arr[$keys[46]]);
        }
        if (array_key_exists($keys[47], $arr)) {
            $this->setOptionother($arr[$keys[47]]);
        }
        if (array_key_exists($keys[48], $arr)) {
            $this->setAsend($arr[$keys[48]]);
        }
        if (array_key_exists($keys[49], $arr)) {
            $this->setAsendDate($arr[$keys[49]]);
        }
        if (array_key_exists($keys[50], $arr)) {
            $this->setDiscount($arr[$keys[50]]);
        }
        if (array_key_exists($keys[51], $arr)) {
            $this->setPrint($arr[$keys[51]]);
        }
        if (array_key_exists($keys[52], $arr)) {
            $this->setEwalletBefore($arr[$keys[52]]);
        }
        if (array_key_exists($keys[53], $arr)) {
            $this->setEwalletAfter($arr[$keys[53]]);
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
     * @return $this|\CciOrm\CciOrm\AliRsaleh The current object, for fluid interface
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
        $criteria = new Criteria(AliRsalehTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliRsalehTableMap::COL_SANO)) {
            $criteria->add(AliRsalehTableMap::COL_SANO, $this->sano);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_SANO1)) {
            $criteria->add(AliRsalehTableMap::COL_SANO1, $this->sano1);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_SADATE)) {
            $criteria->add(AliRsalehTableMap::COL_SADATE, $this->sadate);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_INV_CODE)) {
            $criteria->add(AliRsalehTableMap::COL_INV_CODE, $this->inv_code);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_INV_REF)) {
            $criteria->add(AliRsalehTableMap::COL_INV_REF, $this->inv_ref);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_MCODE)) {
            $criteria->add(AliRsalehTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TOTAL)) {
            $criteria->add(AliRsalehTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TOT_PV)) {
            $criteria->add(AliRsalehTableMap::COL_TOT_PV, $this->tot_pv);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TOT_BV)) {
            $criteria->add(AliRsalehTableMap::COL_TOT_BV, $this->tot_bv);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TOT_FV)) {
            $criteria->add(AliRsalehTableMap::COL_TOT_FV, $this->tot_fv);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_USERCODE)) {
            $criteria->add(AliRsalehTableMap::COL_USERCODE, $this->usercode);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_REMARK)) {
            $criteria->add(AliRsalehTableMap::COL_REMARK, $this->remark);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TRNF)) {
            $criteria->add(AliRsalehTableMap::COL_TRNF, $this->trnf);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_ID)) {
            $criteria->add(AliRsalehTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_SA_TYPE)) {
            $criteria->add(AliRsalehTableMap::COL_SA_TYPE, $this->sa_type);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_UID)) {
            $criteria->add(AliRsalehTableMap::COL_UID, $this->uid);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_DL)) {
            $criteria->add(AliRsalehTableMap::COL_DL, $this->dl);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CANCEL)) {
            $criteria->add(AliRsalehTableMap::COL_CANCEL, $this->cancel);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_SEND)) {
            $criteria->add(AliRsalehTableMap::COL_SEND, $this->send);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTOPTION)) {
            $criteria->add(AliRsalehTableMap::COL_TXTOPTION, $this->txtoption);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKCASH)) {
            $criteria->add(AliRsalehTableMap::COL_CHKCASH, $this->chkcash);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKFUTURE)) {
            $criteria->add(AliRsalehTableMap::COL_CHKFUTURE, $this->chkfuture);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKTRANSFER)) {
            $criteria->add(AliRsalehTableMap::COL_CHKTRANSFER, $this->chktransfer);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKCREDIT1)) {
            $criteria->add(AliRsalehTableMap::COL_CHKCREDIT1, $this->chkcredit1);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKCREDIT2)) {
            $criteria->add(AliRsalehTableMap::COL_CHKCREDIT2, $this->chkcredit2);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKCREDIT3)) {
            $criteria->add(AliRsalehTableMap::COL_CHKCREDIT3, $this->chkcredit3);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKINTERNET)) {
            $criteria->add(AliRsalehTableMap::COL_CHKINTERNET, $this->chkinternet);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKDISCOUNT)) {
            $criteria->add(AliRsalehTableMap::COL_CHKDISCOUNT, $this->chkdiscount);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_CHKOTHER)) {
            $criteria->add(AliRsalehTableMap::COL_CHKOTHER, $this->chkother);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTCASH)) {
            $criteria->add(AliRsalehTableMap::COL_TXTCASH, $this->txtcash);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTFUTURE)) {
            $criteria->add(AliRsalehTableMap::COL_TXTFUTURE, $this->txtfuture);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTTRANSFER)) {
            $criteria->add(AliRsalehTableMap::COL_TXTTRANSFER, $this->txttransfer);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_EWALLET)) {
            $criteria->add(AliRsalehTableMap::COL_EWALLET, $this->ewallet);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTCREDIT1)) {
            $criteria->add(AliRsalehTableMap::COL_TXTCREDIT1, $this->txtcredit1);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTCREDIT2)) {
            $criteria->add(AliRsalehTableMap::COL_TXTCREDIT2, $this->txtcredit2);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTCREDIT3)) {
            $criteria->add(AliRsalehTableMap::COL_TXTCREDIT3, $this->txtcredit3);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTINTERNET)) {
            $criteria->add(AliRsalehTableMap::COL_TXTINTERNET, $this->txtinternet);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTDISCOUNT)) {
            $criteria->add(AliRsalehTableMap::COL_TXTDISCOUNT, $this->txtdiscount);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_TXTOTHER)) {
            $criteria->add(AliRsalehTableMap::COL_TXTOTHER, $this->txtother);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONCASH)) {
            $criteria->add(AliRsalehTableMap::COL_OPTIONCASH, $this->optioncash);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONFUTURE)) {
            $criteria->add(AliRsalehTableMap::COL_OPTIONFUTURE, $this->optionfuture);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONTRANSFER)) {
            $criteria->add(AliRsalehTableMap::COL_OPTIONTRANSFER, $this->optiontransfer);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONCREDIT1)) {
            $criteria->add(AliRsalehTableMap::COL_OPTIONCREDIT1, $this->optioncredit1);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONCREDIT2)) {
            $criteria->add(AliRsalehTableMap::COL_OPTIONCREDIT2, $this->optioncredit2);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONCREDIT3)) {
            $criteria->add(AliRsalehTableMap::COL_OPTIONCREDIT3, $this->optioncredit3);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONINTERNET)) {
            $criteria->add(AliRsalehTableMap::COL_OPTIONINTERNET, $this->optioninternet);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONDISCOUNT)) {
            $criteria->add(AliRsalehTableMap::COL_OPTIONDISCOUNT, $this->optiondiscount);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_OPTIONOTHER)) {
            $criteria->add(AliRsalehTableMap::COL_OPTIONOTHER, $this->optionother);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_ASEND)) {
            $criteria->add(AliRsalehTableMap::COL_ASEND, $this->asend);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_ASEND_DATE)) {
            $criteria->add(AliRsalehTableMap::COL_ASEND_DATE, $this->asend_date);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_DISCOUNT)) {
            $criteria->add(AliRsalehTableMap::COL_DISCOUNT, $this->discount);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_PRINT)) {
            $criteria->add(AliRsalehTableMap::COL_PRINT, $this->print);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_EWALLET_BEFORE)) {
            $criteria->add(AliRsalehTableMap::COL_EWALLET_BEFORE, $this->ewallet_before);
        }
        if ($this->isColumnModified(AliRsalehTableMap::COL_EWALLET_AFTER)) {
            $criteria->add(AliRsalehTableMap::COL_EWALLET_AFTER, $this->ewallet_after);
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
        $criteria = ChildAliRsalehQuery::create();
        $criteria->add(AliRsalehTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliRsaleh (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSano($this->getSano());
        $copyObj->setSano1($this->getSano1());
        $copyObj->setSadate($this->getSadate());
        $copyObj->setInvCode($this->getInvCode());
        $copyObj->setInvRef($this->getInvRef());
        $copyObj->setMcode($this->getMcode());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setTotPv($this->getTotPv());
        $copyObj->setTotBv($this->getTotBv());
        $copyObj->setTotFv($this->getTotFv());
        $copyObj->setUsercode($this->getUsercode());
        $copyObj->setRemark($this->getRemark());
        $copyObj->setTrnf($this->getTrnf());
        $copyObj->setSaType($this->getSaType());
        $copyObj->setUid($this->getUid());
        $copyObj->setDl($this->getDl());
        $copyObj->setCancel($this->getCancel());
        $copyObj->setSend($this->getSend());
        $copyObj->setTxtoption($this->getTxtoption());
        $copyObj->setChkcash($this->getChkcash());
        $copyObj->setChkfuture($this->getChkfuture());
        $copyObj->setChktransfer($this->getChktransfer());
        $copyObj->setChkcredit1($this->getChkcredit1());
        $copyObj->setChkcredit2($this->getChkcredit2());
        $copyObj->setChkcredit3($this->getChkcredit3());
        $copyObj->setChkinternet($this->getChkinternet());
        $copyObj->setChkdiscount($this->getChkdiscount());
        $copyObj->setChkother($this->getChkother());
        $copyObj->setTxtcash($this->getTxtcash());
        $copyObj->setTxtfuture($this->getTxtfuture());
        $copyObj->setTxttransfer($this->getTxttransfer());
        $copyObj->setEwallet($this->getEwallet());
        $copyObj->setTxtcredit1($this->getTxtcredit1());
        $copyObj->setTxtcredit2($this->getTxtcredit2());
        $copyObj->setTxtcredit3($this->getTxtcredit3());
        $copyObj->setTxtinternet($this->getTxtinternet());
        $copyObj->setTxtdiscount($this->getTxtdiscount());
        $copyObj->setTxtother($this->getTxtother());
        $copyObj->setOptioncash($this->getOptioncash());
        $copyObj->setOptionfuture($this->getOptionfuture());
        $copyObj->setOptiontransfer($this->getOptiontransfer());
        $copyObj->setOptioncredit1($this->getOptioncredit1());
        $copyObj->setOptioncredit2($this->getOptioncredit2());
        $copyObj->setOptioncredit3($this->getOptioncredit3());
        $copyObj->setOptioninternet($this->getOptioninternet());
        $copyObj->setOptiondiscount($this->getOptiondiscount());
        $copyObj->setOptionother($this->getOptionother());
        $copyObj->setAsend($this->getAsend());
        $copyObj->setAsendDate($this->getAsendDate());
        $copyObj->setDiscount($this->getDiscount());
        $copyObj->setPrint($this->getPrint());
        $copyObj->setEwalletBefore($this->getEwalletBefore());
        $copyObj->setEwalletAfter($this->getEwalletAfter());
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
     * @return \CciOrm\CciOrm\AliRsaleh Clone of current object.
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
        $this->sano = null;
        $this->sano1 = null;
        $this->sadate = null;
        $this->inv_code = null;
        $this->inv_ref = null;
        $this->mcode = null;
        $this->total = null;
        $this->tot_pv = null;
        $this->tot_bv = null;
        $this->tot_fv = null;
        $this->usercode = null;
        $this->remark = null;
        $this->trnf = null;
        $this->id = null;
        $this->sa_type = null;
        $this->uid = null;
        $this->dl = null;
        $this->cancel = null;
        $this->send = null;
        $this->txtoption = null;
        $this->chkcash = null;
        $this->chkfuture = null;
        $this->chktransfer = null;
        $this->chkcredit1 = null;
        $this->chkcredit2 = null;
        $this->chkcredit3 = null;
        $this->chkinternet = null;
        $this->chkdiscount = null;
        $this->chkother = null;
        $this->txtcash = null;
        $this->txtfuture = null;
        $this->txttransfer = null;
        $this->ewallet = null;
        $this->txtcredit1 = null;
        $this->txtcredit2 = null;
        $this->txtcredit3 = null;
        $this->txtinternet = null;
        $this->txtdiscount = null;
        $this->txtother = null;
        $this->optioncash = null;
        $this->optionfuture = null;
        $this->optiontransfer = null;
        $this->optioncredit1 = null;
        $this->optioncredit2 = null;
        $this->optioncredit3 = null;
        $this->optioninternet = null;
        $this->optiondiscount = null;
        $this->optionother = null;
        $this->asend = null;
        $this->asend_date = null;
        $this->discount = null;
        $this->print = null;
        $this->ewallet_before = null;
        $this->ewallet_after = null;
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
        return (string) $this->exportTo(AliRsalehTableMap::DEFAULT_STRING_FORMAT);
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
