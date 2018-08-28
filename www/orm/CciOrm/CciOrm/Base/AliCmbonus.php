<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliCmbonusQuery as ChildAliCmbonusQuery;
use CciOrm\CciOrm\Map\AliCmbonusTableMap;
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
 * Base class that represents a row from the 'ali_cmbonus' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliCmbonus implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliCmbonusTableMap';


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
     * The value for the status_pv field.
     *
     * @var        string
     */
    protected $status_pv;

    /**
     * The value for the rcode field.
     *
     * @var        int
     */
    protected $rcode;

    /**
     * The value for the mcode field.
     *
     * @var        string
     */
    protected $mcode;

    /**
     * The value for the status field.
     *
     * @var        string
     */
    protected $status;

    /**
     * The value for the pv field.
     *
     * @var        string
     */
    protected $pv;

    /**
     * The value for the pvb field.
     *
     * @var        string
     */
    protected $pvb;

    /**
     * The value for the pvh field.
     *
     * @var        string
     */
    protected $pvh;

    /**
     * The value for the ewallet field.
     *
     * @var        string
     */
    protected $ewallet;

    /**
     * The value for the fob field.
     *
     * @var        string
     */
    protected $fob;

    /**
     * The value for the cycle field.
     *
     * @var        string
     */
    protected $cycle;

    /**
     * The value for the smb field.
     *
     * @var        string
     */
    protected $smb;

    /**
     * The value for the matching field.
     *
     * @var        string
     */
    protected $matching;

    /**
     * The value for the onetime field.
     *
     * @var        string
     */
    protected $onetime;

    /**
     * The value for the atoship field.
     *
     * @var        string
     */
    protected $atoship;

    /**
     * The value for the ecom field.
     *
     * @var        string
     */
    protected $ecom;

    /**
     * The value for the ecom_round field.
     *
     * @var        string
     */
    protected $ecom_round;

    /**
     * The value for the ecomtranfer field.
     *
     * @var        string
     */
    protected $ecomtranfer;

    /**
     * The value for the total field.
     *
     * @var        string
     */
    protected $total;

    /**
     * The value for the totaly field.
     *
     * @var        string
     */
    protected $totaly;

    /**
     * The value for the tot_vat field.
     *
     * @var        string
     */
    protected $tot_vat;

    /**
     * The value for the tot_tax field.
     *
     * @var        string
     */
    protected $tot_tax;

    /**
     * The value for the title field.
     *
     * @var        string
     */
    protected $title;

    /**
     * The value for the mdate field.
     *
     * @var        DateTime
     */
    protected $mdate;

    /**
     * The value for the month_pv field.
     *
     * @var        string
     */
    protected $month_pv;

    /**
     * The value for the mpos field.
     *
     * @var        string
     */
    protected $mpos;

    /**
     * The value for the c_note1 field.
     *
     * @var        string
     */
    protected $c_note1;

    /**
     * The value for the c_note2 field.
     *
     * @var        string
     */
    protected $c_note2;

    /**
     * The value for the c_note3 field.
     *
     * @var        string
     */
    protected $c_note3;

    /**
     * The value for the c_note4 field.
     *
     * @var        string
     */
    protected $c_note4;

    /**
     * The value for the c_note5 field.
     *
     * @var        string
     */
    protected $c_note5;

    /**
     * The value for the c_transfer field.
     *
     * @var        string
     */
    protected $c_transfer;

    /**
     * The value for the c_remark field.
     *
     * @var        string
     */
    protected $c_remark;

    /**
     * The value for the sms_credits field.
     *
     * @var        int
     */
    protected $sms_credits;

    /**
     * The value for the paydate field.
     *
     * @var        string
     */
    protected $paydate;

    /**
     * The value for the locationbase field.
     *
     * @var        int
     */
    protected $locationbase;

    /**
     * The value for the crate field.
     *
     * @var        string
     */
    protected $crate;

    /**
     * The value for the voucher field.
     *
     * @var        string
     */
    protected $voucher;

    /**
     * The value for the mtype field.
     *
     * @var        int
     */
    protected $mtype;

    /**
     * The value for the com_transfer_chagre field.
     *
     * @var        string
     */
    protected $com_transfer_chagre;

    /**
     * The value for the name_f field.
     *
     * @var        string
     */
    protected $name_f;

    /**
     * The value for the name_t field.
     *
     * @var        string
     */
    protected $name_t;

    /**
     * The value for the id_card field.
     *
     * @var        string
     */
    protected $id_card;

    /**
     * The value for the id_tax field.
     *
     * @var        string
     */
    protected $id_tax;

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
     * The value for the bankcode field.
     *
     * @var        string
     */
    protected $bankcode;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliCmbonus object.
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
     * Compares this with another <code>AliCmbonus</code> instance.  If
     * <code>obj</code> is an instance of <code>AliCmbonus</code>, delegates to
     * <code>equals(AliCmbonus)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliCmbonus The current object, for fluid interface
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
     * Get the [status_pv] column value.
     *
     * @return string
     */
    public function getStatusPv()
    {
        return $this->status_pv;
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
     * Get the [mcode] column value.
     *
     * @return string
     */
    public function getMcode()
    {
        return $this->mcode;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
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
     * Get the [pvb] column value.
     *
     * @return string
     */
    public function getPvb()
    {
        return $this->pvb;
    }

    /**
     * Get the [pvh] column value.
     *
     * @return string
     */
    public function getPvh()
    {
        return $this->pvh;
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
     * Get the [fob] column value.
     *
     * @return string
     */
    public function getFob()
    {
        return $this->fob;
    }

    /**
     * Get the [cycle] column value.
     *
     * @return string
     */
    public function getCycle()
    {
        return $this->cycle;
    }

    /**
     * Get the [smb] column value.
     *
     * @return string
     */
    public function getSmb()
    {
        return $this->smb;
    }

    /**
     * Get the [matching] column value.
     *
     * @return string
     */
    public function getMatching()
    {
        return $this->matching;
    }

    /**
     * Get the [onetime] column value.
     *
     * @return string
     */
    public function getOnetime()
    {
        return $this->onetime;
    }

    /**
     * Get the [atoship] column value.
     *
     * @return string
     */
    public function getAtoship()
    {
        return $this->atoship;
    }

    /**
     * Get the [ecom] column value.
     *
     * @return string
     */
    public function getEcom()
    {
        return $this->ecom;
    }

    /**
     * Get the [ecom_round] column value.
     *
     * @return string
     */
    public function getEcomRound()
    {
        return $this->ecom_round;
    }

    /**
     * Get the [ecomtranfer] column value.
     *
     * @return string
     */
    public function getEcomtranfer()
    {
        return $this->ecomtranfer;
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
     * Get the [totaly] column value.
     *
     * @return string
     */
    public function getTotaly()
    {
        return $this->totaly;
    }

    /**
     * Get the [tot_vat] column value.
     *
     * @return string
     */
    public function getTotVat()
    {
        return $this->tot_vat;
    }

    /**
     * Get the [tot_tax] column value.
     *
     * @return string
     */
    public function getTotTax()
    {
        return $this->tot_tax;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [optionally formatted] temporal [mdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getMdate($format = NULL)
    {
        if ($format === null) {
            return $this->mdate;
        } else {
            return $this->mdate instanceof \DateTimeInterface ? $this->mdate->format($format) : null;
        }
    }

    /**
     * Get the [month_pv] column value.
     *
     * @return string
     */
    public function getMonthPv()
    {
        return $this->month_pv;
    }

    /**
     * Get the [mpos] column value.
     *
     * @return string
     */
    public function getMpos()
    {
        return $this->mpos;
    }

    /**
     * Get the [c_note1] column value.
     *
     * @return string
     */
    public function getCNote1()
    {
        return $this->c_note1;
    }

    /**
     * Get the [c_note2] column value.
     *
     * @return string
     */
    public function getCNote2()
    {
        return $this->c_note2;
    }

    /**
     * Get the [c_note3] column value.
     *
     * @return string
     */
    public function getCNote3()
    {
        return $this->c_note3;
    }

    /**
     * Get the [c_note4] column value.
     *
     * @return string
     */
    public function getCNote4()
    {
        return $this->c_note4;
    }

    /**
     * Get the [c_note5] column value.
     *
     * @return string
     */
    public function getCNote5()
    {
        return $this->c_note5;
    }

    /**
     * Get the [c_transfer] column value.
     *
     * @return string
     */
    public function getCTransfer()
    {
        return $this->c_transfer;
    }

    /**
     * Get the [c_remark] column value.
     *
     * @return string
     */
    public function getCRemark()
    {
        return $this->c_remark;
    }

    /**
     * Get the [sms_credits] column value.
     *
     * @return int
     */
    public function getSmsCredits()
    {
        return $this->sms_credits;
    }

    /**
     * Get the [paydate] column value.
     *
     * @return string
     */
    public function getPaydate()
    {
        return $this->paydate;
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
     * Get the [crate] column value.
     *
     * @return string
     */
    public function getCrate()
    {
        return $this->crate;
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
     * Get the [mtype] column value.
     *
     * @return int
     */
    public function getMtype()
    {
        return $this->mtype;
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
     * Get the [name_f] column value.
     *
     * @return string
     */
    public function getNameF()
    {
        return $this->name_f;
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
     * Get the [id_card] column value.
     *
     * @return string
     */
    public function getIdCard()
    {
        return $this->id_card;
    }

    /**
     * Get the [id_tax] column value.
     *
     * @return string
     */
    public function getIdTax()
    {
        return $this->id_tax;
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
     * Get the [bankcode] column value.
     *
     * @return string
     */
    public function getBankcode()
    {
        return $this->bankcode;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [status_pv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setStatusPv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status_pv !== $v) {
            $this->status_pv = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_STATUS_PV] = true;
        }

        return $this;
    } // setStatusPv()

    /**
     * Set the value of [rcode] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setRcode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rcode !== $v) {
            $this->rcode = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_RCODE] = true;
        }

        return $this;
    } // setRcode()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [pv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setPv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pv !== $v) {
            $this->pv = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_PV] = true;
        }

        return $this;
    } // setPv()

    /**
     * Set the value of [pvb] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setPvb($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pvb !== $v) {
            $this->pvb = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_PVB] = true;
        }

        return $this;
    } // setPvb()

    /**
     * Set the value of [pvh] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setPvh($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pvh !== $v) {
            $this->pvh = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_PVH] = true;
        }

        return $this;
    } // setPvh()

    /**
     * Set the value of [ewallet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setEwallet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet !== $v) {
            $this->ewallet = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_EWALLET] = true;
        }

        return $this;
    } // setEwallet()

    /**
     * Set the value of [fob] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setFob($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fob !== $v) {
            $this->fob = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_FOB] = true;
        }

        return $this;
    } // setFob()

    /**
     * Set the value of [cycle] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setCycle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cycle !== $v) {
            $this->cycle = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_CYCLE] = true;
        }

        return $this;
    } // setCycle()

    /**
     * Set the value of [smb] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setSmb($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->smb !== $v) {
            $this->smb = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_SMB] = true;
        }

        return $this;
    } // setSmb()

    /**
     * Set the value of [matching] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setMatching($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->matching !== $v) {
            $this->matching = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_MATCHING] = true;
        }

        return $this;
    } // setMatching()

    /**
     * Set the value of [onetime] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setOnetime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->onetime !== $v) {
            $this->onetime = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_ONETIME] = true;
        }

        return $this;
    } // setOnetime()

    /**
     * Set the value of [atoship] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setAtoship($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->atoship !== $v) {
            $this->atoship = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_ATOSHIP] = true;
        }

        return $this;
    } // setAtoship()

    /**
     * Set the value of [ecom] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setEcom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ecom !== $v) {
            $this->ecom = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_ECOM] = true;
        }

        return $this;
    } // setEcom()

    /**
     * Set the value of [ecom_round] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setEcomRound($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ecom_round !== $v) {
            $this->ecom_round = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_ECOM_ROUND] = true;
        }

        return $this;
    } // setEcomRound()

    /**
     * Set the value of [ecomtranfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setEcomtranfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ecomtranfer !== $v) {
            $this->ecomtranfer = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_ECOMTRANFER] = true;
        }

        return $this;
    } // setEcomtranfer()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [totaly] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setTotaly($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->totaly !== $v) {
            $this->totaly = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_TOTALY] = true;
        }

        return $this;
    } // setTotaly()

    /**
     * Set the value of [tot_vat] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setTotVat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_vat !== $v) {
            $this->tot_vat = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_TOT_VAT] = true;
        }

        return $this;
    } // setTotVat()

    /**
     * Set the value of [tot_tax] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setTotTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_tax !== $v) {
            $this->tot_tax = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_TOT_TAX] = true;
        }

        return $this;
    } // setTotTax()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Sets the value of [mdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setMdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->mdate !== null || $dt !== null) {
            if ($this->mdate === null || $dt === null || $dt->format("Y-m-d") !== $this->mdate->format("Y-m-d")) {
                $this->mdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliCmbonusTableMap::COL_MDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setMdate()

    /**
     * Set the value of [month_pv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setMonthPv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->month_pv !== $v) {
            $this->month_pv = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_MONTH_PV] = true;
        }

        return $this;
    } // setMonthPv()

    /**
     * Set the value of [mpos] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setMpos($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mpos !== $v) {
            $this->mpos = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_MPOS] = true;
        }

        return $this;
    } // setMpos()

    /**
     * Set the value of [c_note1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setCNote1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_note1 !== $v) {
            $this->c_note1 = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_C_NOTE1] = true;
        }

        return $this;
    } // setCNote1()

    /**
     * Set the value of [c_note2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setCNote2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_note2 !== $v) {
            $this->c_note2 = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_C_NOTE2] = true;
        }

        return $this;
    } // setCNote2()

    /**
     * Set the value of [c_note3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setCNote3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_note3 !== $v) {
            $this->c_note3 = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_C_NOTE3] = true;
        }

        return $this;
    } // setCNote3()

    /**
     * Set the value of [c_note4] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setCNote4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_note4 !== $v) {
            $this->c_note4 = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_C_NOTE4] = true;
        }

        return $this;
    } // setCNote4()

    /**
     * Set the value of [c_note5] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setCNote5($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_note5 !== $v) {
            $this->c_note5 = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_C_NOTE5] = true;
        }

        return $this;
    } // setCNote5()

    /**
     * Set the value of [c_transfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setCTransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_transfer !== $v) {
            $this->c_transfer = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_C_TRANSFER] = true;
        }

        return $this;
    } // setCTransfer()

    /**
     * Set the value of [c_remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setCRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->c_remark !== $v) {
            $this->c_remark = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_C_REMARK] = true;
        }

        return $this;
    } // setCRemark()

    /**
     * Set the value of [sms_credits] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setSmsCredits($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sms_credits !== $v) {
            $this->sms_credits = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_SMS_CREDITS] = true;
        }

        return $this;
    } // setSmsCredits()

    /**
     * Set the value of [paydate] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setPaydate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->paydate !== $v) {
            $this->paydate = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_PAYDATE] = true;
        }

        return $this;
    } // setPaydate()

    /**
     * Set the value of [locationbase] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setLocationbase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->locationbase !== $v) {
            $this->locationbase = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_LOCATIONBASE] = true;
        }

        return $this;
    } // setLocationbase()

    /**
     * Set the value of [crate] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setCrate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->crate !== $v) {
            $this->crate = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_CRATE] = true;
        }

        return $this;
    } // setCrate()

    /**
     * Set the value of [voucher] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setVoucher($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->voucher !== $v) {
            $this->voucher = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_VOUCHER] = true;
        }

        return $this;
    } // setVoucher()

    /**
     * Set the value of [mtype] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setMtype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->mtype !== $v) {
            $this->mtype = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_MTYPE] = true;
        }

        return $this;
    } // setMtype()

    /**
     * Set the value of [com_transfer_chagre] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setComTransferChagre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->com_transfer_chagre !== $v) {
            $this->com_transfer_chagre = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_COM_TRANSFER_CHAGRE] = true;
        }

        return $this;
    } // setComTransferChagre()

    /**
     * Set the value of [name_f] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setNameF($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_f !== $v) {
            $this->name_f = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_NAME_F] = true;
        }

        return $this;
    } // setNameF()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Set the value of [id_card] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setIdCard($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->id_card !== $v) {
            $this->id_card = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_ID_CARD] = true;
        }

        return $this;
    } // setIdCard()

    /**
     * Set the value of [id_tax] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setIdTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->id_tax !== $v) {
            $this->id_tax = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_ID_TAX] = true;
        }

        return $this;
    } // setIdTax()

    /**
     * Sets the value of [fdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setFdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fdate !== null || $dt !== null) {
            if ($this->fdate === null || $dt === null || $dt->format("Y-m-d") !== $this->fdate->format("Y-m-d")) {
                $this->fdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliCmbonusTableMap::COL_FDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFdate()

    /**
     * Sets the value of [tdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setTdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tdate !== null || $dt !== null) {
            if ($this->tdate === null || $dt === null || $dt->format("Y-m-d") !== $this->tdate->format("Y-m-d")) {
                $this->tdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliCmbonusTableMap::COL_TDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setTdate()

    /**
     * Set the value of [bankcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object (for fluent API support)
     */
    public function setBankcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bankcode !== $v) {
            $this->bankcode = $v;
            $this->modifiedColumns[AliCmbonusTableMap::COL_BANKCODE] = true;
        }

        return $this;
    } // setBankcode()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliCmbonusTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliCmbonusTableMap::translateFieldName('StatusPv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_pv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliCmbonusTableMap::translateFieldName('Rcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliCmbonusTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliCmbonusTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliCmbonusTableMap::translateFieldName('Pv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliCmbonusTableMap::translateFieldName('Pvb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pvb = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliCmbonusTableMap::translateFieldName('Pvh', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pvh = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliCmbonusTableMap::translateFieldName('Ewallet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliCmbonusTableMap::translateFieldName('Fob', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fob = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliCmbonusTableMap::translateFieldName('Cycle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cycle = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliCmbonusTableMap::translateFieldName('Smb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->smb = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliCmbonusTableMap::translateFieldName('Matching', TableMap::TYPE_PHPNAME, $indexType)];
            $this->matching = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliCmbonusTableMap::translateFieldName('Onetime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->onetime = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliCmbonusTableMap::translateFieldName('Atoship', TableMap::TYPE_PHPNAME, $indexType)];
            $this->atoship = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliCmbonusTableMap::translateFieldName('Ecom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ecom = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliCmbonusTableMap::translateFieldName('EcomRound', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ecom_round = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliCmbonusTableMap::translateFieldName('Ecomtranfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ecomtranfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliCmbonusTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliCmbonusTableMap::translateFieldName('Totaly', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totaly = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliCmbonusTableMap::translateFieldName('TotVat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_vat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliCmbonusTableMap::translateFieldName('TotTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliCmbonusTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliCmbonusTableMap::translateFieldName('Mdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->mdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliCmbonusTableMap::translateFieldName('MonthPv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->month_pv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliCmbonusTableMap::translateFieldName('Mpos', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mpos = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : AliCmbonusTableMap::translateFieldName('CNote1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_note1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : AliCmbonusTableMap::translateFieldName('CNote2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_note2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : AliCmbonusTableMap::translateFieldName('CNote3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_note3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : AliCmbonusTableMap::translateFieldName('CNote4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_note4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : AliCmbonusTableMap::translateFieldName('CNote5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_note5 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : AliCmbonusTableMap::translateFieldName('CTransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_transfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : AliCmbonusTableMap::translateFieldName('CRemark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->c_remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : AliCmbonusTableMap::translateFieldName('SmsCredits', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sms_credits = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : AliCmbonusTableMap::translateFieldName('Paydate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->paydate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : AliCmbonusTableMap::translateFieldName('Locationbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locationbase = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : AliCmbonusTableMap::translateFieldName('Crate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->crate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : AliCmbonusTableMap::translateFieldName('Voucher', TableMap::TYPE_PHPNAME, $indexType)];
            $this->voucher = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : AliCmbonusTableMap::translateFieldName('Mtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mtype = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : AliCmbonusTableMap::translateFieldName('ComTransferChagre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->com_transfer_chagre = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : AliCmbonusTableMap::translateFieldName('NameF', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_f = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : AliCmbonusTableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : AliCmbonusTableMap::translateFieldName('IdCard', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_card = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : AliCmbonusTableMap::translateFieldName('IdTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : AliCmbonusTableMap::translateFieldName('Fdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : AliCmbonusTableMap::translateFieldName('Tdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->tdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : AliCmbonusTableMap::translateFieldName('Bankcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bankcode = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 47; // 47 = AliCmbonusTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliCmbonus'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliCmbonusTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliCmbonusQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliCmbonus::setDeleted()
     * @see AliCmbonus::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCmbonusTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliCmbonusQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCmbonusTableMap::DATABASE_NAME);
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
                AliCmbonusTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliCmbonusTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliCmbonusTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_STATUS_PV)) {
            $modifiedColumns[':p' . $index++]  = 'status_pv';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_RCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rcode';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_PV)) {
            $modifiedColumns[':p' . $index++]  = 'pv';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_PVB)) {
            $modifiedColumns[':p' . $index++]  = 'pvb';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_PVH)) {
            $modifiedColumns[':p' . $index++]  = 'pvh';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_EWALLET)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_FOB)) {
            $modifiedColumns[':p' . $index++]  = 'fob';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_CYCLE)) {
            $modifiedColumns[':p' . $index++]  = 'cycle';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_SMB)) {
            $modifiedColumns[':p' . $index++]  = 'smb';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_MATCHING)) {
            $modifiedColumns[':p' . $index++]  = 'matching';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ONETIME)) {
            $modifiedColumns[':p' . $index++]  = 'onetime';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ATOSHIP)) {
            $modifiedColumns[':p' . $index++]  = 'atoship';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ECOM)) {
            $modifiedColumns[':p' . $index++]  = 'ecom';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ECOM_ROUND)) {
            $modifiedColumns[':p' . $index++]  = 'ecom_round';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ECOMTRANFER)) {
            $modifiedColumns[':p' . $index++]  = 'ecomtranfer';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_TOTALY)) {
            $modifiedColumns[':p' . $index++]  = 'totaly';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_TOT_VAT)) {
            $modifiedColumns[':p' . $index++]  = 'tot_vat';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_TOT_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'tot_tax';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_MDATE)) {
            $modifiedColumns[':p' . $index++]  = 'mdate';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_MONTH_PV)) {
            $modifiedColumns[':p' . $index++]  = 'month_pv';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_MPOS)) {
            $modifiedColumns[':p' . $index++]  = 'mpos';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_NOTE1)) {
            $modifiedColumns[':p' . $index++]  = 'c_note1';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_NOTE2)) {
            $modifiedColumns[':p' . $index++]  = 'c_note2';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_NOTE3)) {
            $modifiedColumns[':p' . $index++]  = 'c_note3';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_NOTE4)) {
            $modifiedColumns[':p' . $index++]  = 'c_note4';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_NOTE5)) {
            $modifiedColumns[':p' . $index++]  = 'c_note5';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_TRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'c_transfer';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'c_remark';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_SMS_CREDITS)) {
            $modifiedColumns[':p' . $index++]  = 'sms_credits';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_PAYDATE)) {
            $modifiedColumns[':p' . $index++]  = 'paydate';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_LOCATIONBASE)) {
            $modifiedColumns[':p' . $index++]  = 'locationbase';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_CRATE)) {
            $modifiedColumns[':p' . $index++]  = 'crate';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_VOUCHER)) {
            $modifiedColumns[':p' . $index++]  = 'voucher';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_MTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'mtype';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_COM_TRANSFER_CHAGRE)) {
            $modifiedColumns[':p' . $index++]  = 'com_transfer_chagre';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_NAME_F)) {
            $modifiedColumns[':p' . $index++]  = 'name_f';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ID_CARD)) {
            $modifiedColumns[':p' . $index++]  = 'id_card';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ID_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'id_tax';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_FDATE)) {
            $modifiedColumns[':p' . $index++]  = 'fdate';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_TDATE)) {
            $modifiedColumns[':p' . $index++]  = 'tdate';
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_BANKCODE)) {
            $modifiedColumns[':p' . $index++]  = 'bankcode';
        }

        $sql = sprintf(
            'INSERT INTO ali_cmbonus (%s) VALUES (%s)',
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
                    case 'status_pv':
                        $stmt->bindValue($identifier, $this->status_pv, PDO::PARAM_STR);
                        break;
                    case 'rcode':
                        $stmt->bindValue($identifier, $this->rcode, PDO::PARAM_INT);
                        break;
                    case 'mcode':
                        $stmt->bindValue($identifier, $this->mcode, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'pv':
                        $stmt->bindValue($identifier, $this->pv, PDO::PARAM_STR);
                        break;
                    case 'pvb':
                        $stmt->bindValue($identifier, $this->pvb, PDO::PARAM_STR);
                        break;
                    case 'pvh':
                        $stmt->bindValue($identifier, $this->pvh, PDO::PARAM_STR);
                        break;
                    case 'ewallet':
                        $stmt->bindValue($identifier, $this->ewallet, PDO::PARAM_STR);
                        break;
                    case 'fob':
                        $stmt->bindValue($identifier, $this->fob, PDO::PARAM_STR);
                        break;
                    case 'cycle':
                        $stmt->bindValue($identifier, $this->cycle, PDO::PARAM_STR);
                        break;
                    case 'smb':
                        $stmt->bindValue($identifier, $this->smb, PDO::PARAM_STR);
                        break;
                    case 'matching':
                        $stmt->bindValue($identifier, $this->matching, PDO::PARAM_STR);
                        break;
                    case 'onetime':
                        $stmt->bindValue($identifier, $this->onetime, PDO::PARAM_STR);
                        break;
                    case 'atoship':
                        $stmt->bindValue($identifier, $this->atoship, PDO::PARAM_STR);
                        break;
                    case 'ecom':
                        $stmt->bindValue($identifier, $this->ecom, PDO::PARAM_STR);
                        break;
                    case 'ecom_round':
                        $stmt->bindValue($identifier, $this->ecom_round, PDO::PARAM_STR);
                        break;
                    case 'ecomtranfer':
                        $stmt->bindValue($identifier, $this->ecomtranfer, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'totaly':
                        $stmt->bindValue($identifier, $this->totaly, PDO::PARAM_STR);
                        break;
                    case 'tot_vat':
                        $stmt->bindValue($identifier, $this->tot_vat, PDO::PARAM_STR);
                        break;
                    case 'tot_tax':
                        $stmt->bindValue($identifier, $this->tot_tax, PDO::PARAM_STR);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'mdate':
                        $stmt->bindValue($identifier, $this->mdate ? $this->mdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'month_pv':
                        $stmt->bindValue($identifier, $this->month_pv, PDO::PARAM_STR);
                        break;
                    case 'mpos':
                        $stmt->bindValue($identifier, $this->mpos, PDO::PARAM_STR);
                        break;
                    case 'c_note1':
                        $stmt->bindValue($identifier, $this->c_note1, PDO::PARAM_STR);
                        break;
                    case 'c_note2':
                        $stmt->bindValue($identifier, $this->c_note2, PDO::PARAM_STR);
                        break;
                    case 'c_note3':
                        $stmt->bindValue($identifier, $this->c_note3, PDO::PARAM_STR);
                        break;
                    case 'c_note4':
                        $stmt->bindValue($identifier, $this->c_note4, PDO::PARAM_STR);
                        break;
                    case 'c_note5':
                        $stmt->bindValue($identifier, $this->c_note5, PDO::PARAM_STR);
                        break;
                    case 'c_transfer':
                        $stmt->bindValue($identifier, $this->c_transfer, PDO::PARAM_STR);
                        break;
                    case 'c_remark':
                        $stmt->bindValue($identifier, $this->c_remark, PDO::PARAM_STR);
                        break;
                    case 'sms_credits':
                        $stmt->bindValue($identifier, $this->sms_credits, PDO::PARAM_INT);
                        break;
                    case 'paydate':
                        $stmt->bindValue($identifier, $this->paydate, PDO::PARAM_STR);
                        break;
                    case 'locationbase':
                        $stmt->bindValue($identifier, $this->locationbase, PDO::PARAM_INT);
                        break;
                    case 'crate':
                        $stmt->bindValue($identifier, $this->crate, PDO::PARAM_STR);
                        break;
                    case 'voucher':
                        $stmt->bindValue($identifier, $this->voucher, PDO::PARAM_STR);
                        break;
                    case 'mtype':
                        $stmt->bindValue($identifier, $this->mtype, PDO::PARAM_INT);
                        break;
                    case 'com_transfer_chagre':
                        $stmt->bindValue($identifier, $this->com_transfer_chagre, PDO::PARAM_STR);
                        break;
                    case 'name_f':
                        $stmt->bindValue($identifier, $this->name_f, PDO::PARAM_STR);
                        break;
                    case 'name_t':
                        $stmt->bindValue($identifier, $this->name_t, PDO::PARAM_STR);
                        break;
                    case 'id_card':
                        $stmt->bindValue($identifier, $this->id_card, PDO::PARAM_STR);
                        break;
                    case 'id_tax':
                        $stmt->bindValue($identifier, $this->id_tax, PDO::PARAM_STR);
                        break;
                    case 'fdate':
                        $stmt->bindValue($identifier, $this->fdate ? $this->fdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tdate':
                        $stmt->bindValue($identifier, $this->tdate ? $this->tdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'bankcode':
                        $stmt->bindValue($identifier, $this->bankcode, PDO::PARAM_STR);
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
        $pos = AliCmbonusTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getStatusPv();
                break;
            case 2:
                return $this->getRcode();
                break;
            case 3:
                return $this->getMcode();
                break;
            case 4:
                return $this->getStatus();
                break;
            case 5:
                return $this->getPv();
                break;
            case 6:
                return $this->getPvb();
                break;
            case 7:
                return $this->getPvh();
                break;
            case 8:
                return $this->getEwallet();
                break;
            case 9:
                return $this->getFob();
                break;
            case 10:
                return $this->getCycle();
                break;
            case 11:
                return $this->getSmb();
                break;
            case 12:
                return $this->getMatching();
                break;
            case 13:
                return $this->getOnetime();
                break;
            case 14:
                return $this->getAtoship();
                break;
            case 15:
                return $this->getEcom();
                break;
            case 16:
                return $this->getEcomRound();
                break;
            case 17:
                return $this->getEcomtranfer();
                break;
            case 18:
                return $this->getTotal();
                break;
            case 19:
                return $this->getTotaly();
                break;
            case 20:
                return $this->getTotVat();
                break;
            case 21:
                return $this->getTotTax();
                break;
            case 22:
                return $this->getTitle();
                break;
            case 23:
                return $this->getMdate();
                break;
            case 24:
                return $this->getMonthPv();
                break;
            case 25:
                return $this->getMpos();
                break;
            case 26:
                return $this->getCNote1();
                break;
            case 27:
                return $this->getCNote2();
                break;
            case 28:
                return $this->getCNote3();
                break;
            case 29:
                return $this->getCNote4();
                break;
            case 30:
                return $this->getCNote5();
                break;
            case 31:
                return $this->getCTransfer();
                break;
            case 32:
                return $this->getCRemark();
                break;
            case 33:
                return $this->getSmsCredits();
                break;
            case 34:
                return $this->getPaydate();
                break;
            case 35:
                return $this->getLocationbase();
                break;
            case 36:
                return $this->getCrate();
                break;
            case 37:
                return $this->getVoucher();
                break;
            case 38:
                return $this->getMtype();
                break;
            case 39:
                return $this->getComTransferChagre();
                break;
            case 40:
                return $this->getNameF();
                break;
            case 41:
                return $this->getNameT();
                break;
            case 42:
                return $this->getIdCard();
                break;
            case 43:
                return $this->getIdTax();
                break;
            case 44:
                return $this->getFdate();
                break;
            case 45:
                return $this->getTdate();
                break;
            case 46:
                return $this->getBankcode();
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

        if (isset($alreadyDumpedObjects['AliCmbonus'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliCmbonus'][$this->hashCode()] = true;
        $keys = AliCmbonusTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getStatusPv(),
            $keys[2] => $this->getRcode(),
            $keys[3] => $this->getMcode(),
            $keys[4] => $this->getStatus(),
            $keys[5] => $this->getPv(),
            $keys[6] => $this->getPvb(),
            $keys[7] => $this->getPvh(),
            $keys[8] => $this->getEwallet(),
            $keys[9] => $this->getFob(),
            $keys[10] => $this->getCycle(),
            $keys[11] => $this->getSmb(),
            $keys[12] => $this->getMatching(),
            $keys[13] => $this->getOnetime(),
            $keys[14] => $this->getAtoship(),
            $keys[15] => $this->getEcom(),
            $keys[16] => $this->getEcomRound(),
            $keys[17] => $this->getEcomtranfer(),
            $keys[18] => $this->getTotal(),
            $keys[19] => $this->getTotaly(),
            $keys[20] => $this->getTotVat(),
            $keys[21] => $this->getTotTax(),
            $keys[22] => $this->getTitle(),
            $keys[23] => $this->getMdate(),
            $keys[24] => $this->getMonthPv(),
            $keys[25] => $this->getMpos(),
            $keys[26] => $this->getCNote1(),
            $keys[27] => $this->getCNote2(),
            $keys[28] => $this->getCNote3(),
            $keys[29] => $this->getCNote4(),
            $keys[30] => $this->getCNote5(),
            $keys[31] => $this->getCTransfer(),
            $keys[32] => $this->getCRemark(),
            $keys[33] => $this->getSmsCredits(),
            $keys[34] => $this->getPaydate(),
            $keys[35] => $this->getLocationbase(),
            $keys[36] => $this->getCrate(),
            $keys[37] => $this->getVoucher(),
            $keys[38] => $this->getMtype(),
            $keys[39] => $this->getComTransferChagre(),
            $keys[40] => $this->getNameF(),
            $keys[41] => $this->getNameT(),
            $keys[42] => $this->getIdCard(),
            $keys[43] => $this->getIdTax(),
            $keys[44] => $this->getFdate(),
            $keys[45] => $this->getTdate(),
            $keys[46] => $this->getBankcode(),
        );
        if ($result[$keys[23]] instanceof \DateTimeInterface) {
            $result[$keys[23]] = $result[$keys[23]]->format('c');
        }

        if ($result[$keys[44]] instanceof \DateTimeInterface) {
            $result[$keys[44]] = $result[$keys[44]]->format('c');
        }

        if ($result[$keys[45]] instanceof \DateTimeInterface) {
            $result[$keys[45]] = $result[$keys[45]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliCmbonus
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliCmbonusTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliCmbonus
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setStatusPv($value);
                break;
            case 2:
                $this->setRcode($value);
                break;
            case 3:
                $this->setMcode($value);
                break;
            case 4:
                $this->setStatus($value);
                break;
            case 5:
                $this->setPv($value);
                break;
            case 6:
                $this->setPvb($value);
                break;
            case 7:
                $this->setPvh($value);
                break;
            case 8:
                $this->setEwallet($value);
                break;
            case 9:
                $this->setFob($value);
                break;
            case 10:
                $this->setCycle($value);
                break;
            case 11:
                $this->setSmb($value);
                break;
            case 12:
                $this->setMatching($value);
                break;
            case 13:
                $this->setOnetime($value);
                break;
            case 14:
                $this->setAtoship($value);
                break;
            case 15:
                $this->setEcom($value);
                break;
            case 16:
                $this->setEcomRound($value);
                break;
            case 17:
                $this->setEcomtranfer($value);
                break;
            case 18:
                $this->setTotal($value);
                break;
            case 19:
                $this->setTotaly($value);
                break;
            case 20:
                $this->setTotVat($value);
                break;
            case 21:
                $this->setTotTax($value);
                break;
            case 22:
                $this->setTitle($value);
                break;
            case 23:
                $this->setMdate($value);
                break;
            case 24:
                $this->setMonthPv($value);
                break;
            case 25:
                $this->setMpos($value);
                break;
            case 26:
                $this->setCNote1($value);
                break;
            case 27:
                $this->setCNote2($value);
                break;
            case 28:
                $this->setCNote3($value);
                break;
            case 29:
                $this->setCNote4($value);
                break;
            case 30:
                $this->setCNote5($value);
                break;
            case 31:
                $this->setCTransfer($value);
                break;
            case 32:
                $this->setCRemark($value);
                break;
            case 33:
                $this->setSmsCredits($value);
                break;
            case 34:
                $this->setPaydate($value);
                break;
            case 35:
                $this->setLocationbase($value);
                break;
            case 36:
                $this->setCrate($value);
                break;
            case 37:
                $this->setVoucher($value);
                break;
            case 38:
                $this->setMtype($value);
                break;
            case 39:
                $this->setComTransferChagre($value);
                break;
            case 40:
                $this->setNameF($value);
                break;
            case 41:
                $this->setNameT($value);
                break;
            case 42:
                $this->setIdCard($value);
                break;
            case 43:
                $this->setIdTax($value);
                break;
            case 44:
                $this->setFdate($value);
                break;
            case 45:
                $this->setTdate($value);
                break;
            case 46:
                $this->setBankcode($value);
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
        $keys = AliCmbonusTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setStatusPv($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setRcode($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setMcode($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setStatus($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPv($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPvb($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPvh($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setEwallet($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setFob($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCycle($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setSmb($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setMatching($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setOnetime($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setAtoship($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setEcom($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setEcomRound($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setEcomtranfer($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setTotal($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setTotaly($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setTotVat($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setTotTax($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setTitle($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setMdate($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setMonthPv($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setMpos($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setCNote1($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setCNote2($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setCNote3($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setCNote4($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setCNote5($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setCTransfer($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setCRemark($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setSmsCredits($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setPaydate($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setLocationbase($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setCrate($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setVoucher($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setMtype($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setComTransferChagre($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setNameF($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setNameT($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setIdCard($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setIdTax($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setFdate($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setTdate($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setBankcode($arr[$keys[46]]);
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
     * @return $this|\CciOrm\CciOrm\AliCmbonus The current object, for fluid interface
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
        $criteria = new Criteria(AliCmbonusTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliCmbonusTableMap::COL_ID)) {
            $criteria->add(AliCmbonusTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_STATUS_PV)) {
            $criteria->add(AliCmbonusTableMap::COL_STATUS_PV, $this->status_pv);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_RCODE)) {
            $criteria->add(AliCmbonusTableMap::COL_RCODE, $this->rcode);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_MCODE)) {
            $criteria->add(AliCmbonusTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_STATUS)) {
            $criteria->add(AliCmbonusTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_PV)) {
            $criteria->add(AliCmbonusTableMap::COL_PV, $this->pv);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_PVB)) {
            $criteria->add(AliCmbonusTableMap::COL_PVB, $this->pvb);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_PVH)) {
            $criteria->add(AliCmbonusTableMap::COL_PVH, $this->pvh);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_EWALLET)) {
            $criteria->add(AliCmbonusTableMap::COL_EWALLET, $this->ewallet);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_FOB)) {
            $criteria->add(AliCmbonusTableMap::COL_FOB, $this->fob);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_CYCLE)) {
            $criteria->add(AliCmbonusTableMap::COL_CYCLE, $this->cycle);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_SMB)) {
            $criteria->add(AliCmbonusTableMap::COL_SMB, $this->smb);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_MATCHING)) {
            $criteria->add(AliCmbonusTableMap::COL_MATCHING, $this->matching);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ONETIME)) {
            $criteria->add(AliCmbonusTableMap::COL_ONETIME, $this->onetime);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ATOSHIP)) {
            $criteria->add(AliCmbonusTableMap::COL_ATOSHIP, $this->atoship);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ECOM)) {
            $criteria->add(AliCmbonusTableMap::COL_ECOM, $this->ecom);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ECOM_ROUND)) {
            $criteria->add(AliCmbonusTableMap::COL_ECOM_ROUND, $this->ecom_round);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ECOMTRANFER)) {
            $criteria->add(AliCmbonusTableMap::COL_ECOMTRANFER, $this->ecomtranfer);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_TOTAL)) {
            $criteria->add(AliCmbonusTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_TOTALY)) {
            $criteria->add(AliCmbonusTableMap::COL_TOTALY, $this->totaly);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_TOT_VAT)) {
            $criteria->add(AliCmbonusTableMap::COL_TOT_VAT, $this->tot_vat);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_TOT_TAX)) {
            $criteria->add(AliCmbonusTableMap::COL_TOT_TAX, $this->tot_tax);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_TITLE)) {
            $criteria->add(AliCmbonusTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_MDATE)) {
            $criteria->add(AliCmbonusTableMap::COL_MDATE, $this->mdate);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_MONTH_PV)) {
            $criteria->add(AliCmbonusTableMap::COL_MONTH_PV, $this->month_pv);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_MPOS)) {
            $criteria->add(AliCmbonusTableMap::COL_MPOS, $this->mpos);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_NOTE1)) {
            $criteria->add(AliCmbonusTableMap::COL_C_NOTE1, $this->c_note1);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_NOTE2)) {
            $criteria->add(AliCmbonusTableMap::COL_C_NOTE2, $this->c_note2);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_NOTE3)) {
            $criteria->add(AliCmbonusTableMap::COL_C_NOTE3, $this->c_note3);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_NOTE4)) {
            $criteria->add(AliCmbonusTableMap::COL_C_NOTE4, $this->c_note4);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_NOTE5)) {
            $criteria->add(AliCmbonusTableMap::COL_C_NOTE5, $this->c_note5);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_TRANSFER)) {
            $criteria->add(AliCmbonusTableMap::COL_C_TRANSFER, $this->c_transfer);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_C_REMARK)) {
            $criteria->add(AliCmbonusTableMap::COL_C_REMARK, $this->c_remark);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_SMS_CREDITS)) {
            $criteria->add(AliCmbonusTableMap::COL_SMS_CREDITS, $this->sms_credits);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_PAYDATE)) {
            $criteria->add(AliCmbonusTableMap::COL_PAYDATE, $this->paydate);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_LOCATIONBASE)) {
            $criteria->add(AliCmbonusTableMap::COL_LOCATIONBASE, $this->locationbase);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_CRATE)) {
            $criteria->add(AliCmbonusTableMap::COL_CRATE, $this->crate);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_VOUCHER)) {
            $criteria->add(AliCmbonusTableMap::COL_VOUCHER, $this->voucher);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_MTYPE)) {
            $criteria->add(AliCmbonusTableMap::COL_MTYPE, $this->mtype);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_COM_TRANSFER_CHAGRE)) {
            $criteria->add(AliCmbonusTableMap::COL_COM_TRANSFER_CHAGRE, $this->com_transfer_chagre);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_NAME_F)) {
            $criteria->add(AliCmbonusTableMap::COL_NAME_F, $this->name_f);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_NAME_T)) {
            $criteria->add(AliCmbonusTableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ID_CARD)) {
            $criteria->add(AliCmbonusTableMap::COL_ID_CARD, $this->id_card);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_ID_TAX)) {
            $criteria->add(AliCmbonusTableMap::COL_ID_TAX, $this->id_tax);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_FDATE)) {
            $criteria->add(AliCmbonusTableMap::COL_FDATE, $this->fdate);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_TDATE)) {
            $criteria->add(AliCmbonusTableMap::COL_TDATE, $this->tdate);
        }
        if ($this->isColumnModified(AliCmbonusTableMap::COL_BANKCODE)) {
            $criteria->add(AliCmbonusTableMap::COL_BANKCODE, $this->bankcode);
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
        $criteria = ChildAliCmbonusQuery::create();
        $criteria->add(AliCmbonusTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliCmbonus (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setStatusPv($this->getStatusPv());
        $copyObj->setRcode($this->getRcode());
        $copyObj->setMcode($this->getMcode());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setPv($this->getPv());
        $copyObj->setPvb($this->getPvb());
        $copyObj->setPvh($this->getPvh());
        $copyObj->setEwallet($this->getEwallet());
        $copyObj->setFob($this->getFob());
        $copyObj->setCycle($this->getCycle());
        $copyObj->setSmb($this->getSmb());
        $copyObj->setMatching($this->getMatching());
        $copyObj->setOnetime($this->getOnetime());
        $copyObj->setAtoship($this->getAtoship());
        $copyObj->setEcom($this->getEcom());
        $copyObj->setEcomRound($this->getEcomRound());
        $copyObj->setEcomtranfer($this->getEcomtranfer());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setTotaly($this->getTotaly());
        $copyObj->setTotVat($this->getTotVat());
        $copyObj->setTotTax($this->getTotTax());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setMdate($this->getMdate());
        $copyObj->setMonthPv($this->getMonthPv());
        $copyObj->setMpos($this->getMpos());
        $copyObj->setCNote1($this->getCNote1());
        $copyObj->setCNote2($this->getCNote2());
        $copyObj->setCNote3($this->getCNote3());
        $copyObj->setCNote4($this->getCNote4());
        $copyObj->setCNote5($this->getCNote5());
        $copyObj->setCTransfer($this->getCTransfer());
        $copyObj->setCRemark($this->getCRemark());
        $copyObj->setSmsCredits($this->getSmsCredits());
        $copyObj->setPaydate($this->getPaydate());
        $copyObj->setLocationbase($this->getLocationbase());
        $copyObj->setCrate($this->getCrate());
        $copyObj->setVoucher($this->getVoucher());
        $copyObj->setMtype($this->getMtype());
        $copyObj->setComTransferChagre($this->getComTransferChagre());
        $copyObj->setNameF($this->getNameF());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setIdCard($this->getIdCard());
        $copyObj->setIdTax($this->getIdTax());
        $copyObj->setFdate($this->getFdate());
        $copyObj->setTdate($this->getTdate());
        $copyObj->setBankcode($this->getBankcode());
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
     * @return \CciOrm\CciOrm\AliCmbonus Clone of current object.
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
        $this->status_pv = null;
        $this->rcode = null;
        $this->mcode = null;
        $this->status = null;
        $this->pv = null;
        $this->pvb = null;
        $this->pvh = null;
        $this->ewallet = null;
        $this->fob = null;
        $this->cycle = null;
        $this->smb = null;
        $this->matching = null;
        $this->onetime = null;
        $this->atoship = null;
        $this->ecom = null;
        $this->ecom_round = null;
        $this->ecomtranfer = null;
        $this->total = null;
        $this->totaly = null;
        $this->tot_vat = null;
        $this->tot_tax = null;
        $this->title = null;
        $this->mdate = null;
        $this->month_pv = null;
        $this->mpos = null;
        $this->c_note1 = null;
        $this->c_note2 = null;
        $this->c_note3 = null;
        $this->c_note4 = null;
        $this->c_note5 = null;
        $this->c_transfer = null;
        $this->c_remark = null;
        $this->sms_credits = null;
        $this->paydate = null;
        $this->locationbase = null;
        $this->crate = null;
        $this->voucher = null;
        $this->mtype = null;
        $this->com_transfer_chagre = null;
        $this->name_f = null;
        $this->name_t = null;
        $this->id_card = null;
        $this->id_tax = null;
        $this->fdate = null;
        $this->tdate = null;
        $this->bankcode = null;
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
        return (string) $this->exportTo(AliCmbonusTableMap::DEFAULT_STRING_FORMAT);
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
